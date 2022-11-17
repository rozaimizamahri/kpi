<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_tl_apps;
use App\Models\Users;
use App\Models\Ckpi_groups;
use App\Models\Ckpi_files;
use App\Models\Ckpi_pls;
use App\Models\Ckpi_gls;
use App\Models\Ckpi_assignees;
use App\Models\Ckpi_perspectives;
use App\Models\Years;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LifeXcessController;
use App\Http\Controllers\ConfigController;

class ReviewListingController extends Controller
{
    public function review(Request $request, $appId, $assigneeId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Quarters
                        $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                       // ->toArray(); 
                if(count($curr_assignees) > 0){

                    $quarter_arrs       = array();  
                    $group_arrs         = array();    
                    $i                  = 0;  
                    $count = 1;

                    $perspective_arrs   = array();
                    $j                  = 0;  

                    foreach($curr_assignees as $curr_assignee)
                    {   
                        $group_arrs[$i]         = array();  

                        // Quarter
                            $app_id             = $curr_assignee->app_id;
                            $quarter_id         = $curr_assignee->quarter_id; 
                            $quarter_1_dashboards = Ckpi_assignees::where(
                                                            [
                                                                ['app_id',      '=', $app_id ],
                                                                ['quarter_id',  '=', $quarter_id ]
                                                            ] 
                                                    )->first();

                            $test111 = $quarter_1_dashboards->group_id; 

                            $quarter_2_arrs   = array(); 
                            $quarter_2_arrs[] = $quarter_1_dashboards->id;                           
                            $quarter_2_arrs[] = $quarter_1_dashboards->indicator_id;
                            $quarter_2_arrs[] = $quarter_1_dashboards->perspective_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->quarter_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->group_id;         
                            $quarter_2_arrs[] = $quarter_1_dashboards->app_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->kpi_owner_name;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->assignee_name; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->main_target; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->ytd_target; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->ytd_achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->rating; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->weightage; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->weightage_score; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->mof_achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->is_active; 
                            $quarter_arrs[]   = $quarter_2_arrs;
                        // Quarter

                        $group_dashboards = Ckpi_assignees::select('app_id','group_id') 
                                        ->groupBy('app_id','group_id')
                                        ->where('app_id','=',$app_id) 
                                        ->orderBy('group_id','asc') 
                                        ->get();
                                       // ->toArray();
                        if(count($group_dashboards) > 0){ 

                            foreach($group_dashboards as $group_dashboard){   

                                // Group
                                    $g_id = $group_dashboard->group_id; 
                                    $group_2_dashboards = Ckpi_assignees::select(
                                                            
                                                                        
                                                                            'ckpi_assignees.*',
                                                                            'ckpi_assignees.id as assignee_item_id',

                                                                            'ckpi_groups.*'
                                                                        
                                                            
                                                )
                                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                ->where('ckpi_assignees.group_id','=',$g_id)
                                                ->orderBy('ckpi_assignees.id','asc')
                                                ->get();
                                              //  ->toArray();
                                    if(count($group_2_dashboards) > 0){
                                        
                                        $assignee_item_id           = ""; 
                                        $group_name                 = ""; 
                                        foreach($group_2_dashboards as $group_2_dashboard){
                                            $assignee_item_id       = $group_2_dashboard->assignee_item_id; 
                                            $group_name             = $group_2_dashboard->group_name; 
                                        }
                                    }

                                    $group_3_dashboards = Ckpi_assignees::where('ckpi_assignees.group_id','=',$g_id) 
                                            ->first();

                                    $group_2_arrs       = array();
                                    $group_2_arrs[]     = $g_id;                            // 0
                                    $group_2_arrs[]     = $group_name;                      // 1
                                    $group_2_arrs[]     = $assignee_item_id;                // 2
                                    $group_2_arrs[]     = $group_3_dashboards->is_active; // 3
                                    $group_arrs[$i][]   = $group_2_arrs;
                                // Group

                                $perspective_dashboards = Ckpi_assignees::select('app_id','quarter_id') 
                                                ->groupBy('app_id','quarter_id')
                                                ->where('app_id','=',$app_id) 
                                                ->where('quarter_id','=',$quarter_id)   
                                                ->get();
                                              //  ->toArray(); 
                                if(count($perspective_dashboards) > 0){  

                                    foreach($perspective_dashboards as $perspective_dashboard) { 

                                        $perspective_arrs[$j]   = array();

                                        $app_id_val             = $perspective_dashboard->app_id;
                                        $quarter_id_val         = $perspective_dashboard->quarter_id;   
                                        
                                        $perspective_2_dashboards = Ckpi_assignees::select(
                                                                   
                                                                            
                                                                                'ckpi_assignees.*',
                                                                                'ckpi_assignees.id as assignee_item_id',

                                                                                'ckpi_perspectives.*',
                                                                                'ckpi_perspectives.id as perspective_item_id',

                                                                                'ckpi_indicators.*',
                                                                                'ckpi_indicators.id as indicator_item_id',

                                                                                'ckpi_groups.*',
                                                                                'ckpi_groups.id as group_item_id',

                                                                                'ckpi_files.*',
                                                                                'ckpi_files.file_id as file_item_id'
                                                                            
                                                                    
                                                        )
                                                        ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                        ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                        ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                        ->join('ckpi_files','ckpi_assignees.id','=','ckpi_files.assignee_id')
                                                        ->where('ckpi_assignees.app_id','=',$app_id) 
                                                        ->where('ckpi_assignees.quarter_id','=',$quarter_id_val)    
                                                        ->where('ckpi_assignees.group_id','=',$g_id)    
                                                        ->orderBy('ckpi_assignees.id','asc')    
                                                        ->get();
                                                      //  ->toArray(); 
                                        if(count($perspective_2_dashboards) > 0){   

                                            foreach($perspective_2_dashboards as $perspective_2_dashboard) {  
                                                
                                                $arr2s = array();
                                                $arr2s[] = $perspective_2_dashboard->assignee_item_id; // 0
                                                $arr2s[] = $perspective_2_dashboard->indicator_indicator; // 1
                                                $arr2s[] = $perspective_2_dashboard->quarter_id; // 2
                                                $arr2s[] = $perspective_2_dashboard->perspective_perspective; // 3
                                                $arr2s[] = $perspective_2_dashboard->group_name; // 4
                                                $arr2s[] = $perspective_2_dashboard->app_id; // 5
                                                $arr2s[] = $perspective_2_dashboard->kpi_owner_name; // 6
                                                $arr2s[] = $perspective_2_dashboard->assignee_name; // 7

                                                $arr2s[] = $perspective_2_dashboard->main_target; // 8
                                                $arr2s[] = $perspective_2_dashboard->ytd_target; // 9
                                                $arr2s[] = $perspective_2_dashboard->ytd_achievement; // 10
                                                $arr2s[] = $perspective_2_dashboard->achievement; // 11
                                                $arr2s[] = $perspective_2_dashboard->rating; // 12
                                                $arr2s[] = $perspective_2_dashboard->weightage; // 13
                                                $arr2s[] = $perspective_2_dashboard->weightage_score; // 14
                                                $arr2s[] = $perspective_2_dashboard->mof_achievement; // 15
                                                $arr2s[] = $perspective_2_dashboard->file_id; // 16
                                                $arr2s[] = $perspective_2_dashboard->filename; // 17
                                                $perspective_arrs[$j][] = $arr2s; 

                                            }

                                        } 
                                        
                                        $j++; 

                                    }  

                                }                              

                            }

                        }  
                        $i++;   
                    } 

                } 
            // Quarters

            // Assignees    
                $assignees = Ckpi_perspectives::select(
                               
                                               
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id',
                                                'ckpi_assignees.app_id as assignee_app_id_item_id',

                                                'ckpi_files.*',
                                                'ckpi_files.file_id as file_item_id'
                                            
                                 
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                    ->join('ckpi_files','ckpi_assignees.id','=','ckpi_files.assignee_id')
                    // ->where('ckpi_assignees.kpi_owner_email','=',$email)   
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    // ->where('ckpi_assignees.is_active','=','Y')   
                    // ->where('ckpi_assignees.assignee_completed','=','Y')   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                    //->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            return view('lists.review',
                    [
                        'apps'              => $apps, 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 
                        'assignees'         => $assignees,
                        'staffs'            => $staffs
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }

    public function declare(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $app_id                 = htmlentities($request->get('declare_id'));
        $assignee_id            = htmlentities($request->get('assignee_declare_id'));
        $remark                 = htmlentities($request->get('remark_declare'));

        // Find Assignee
            $pool_assignees = Ckpi_assignees::where('id','=',$assignee_id)
                ->get();
               // ->toArray();  
            $i                = 0;  
            $quarter_id       = '';
            $assignee_name    = '';
            $assignee_email   = '';  

            foreach ($pool_assignees as $pool_assignees) { 
                if($i==0){  
                    $quarter_id   = $pool_assignees->quarter_id;     
                    
                    $assignee_name   = $pool_assignees->assignee_name;   
                    $assignee_email  = ''.$insert_text.''.$pool_assignees->assignee_email;   
                }
                else{    
                    $quarter_id   = $quarter_id.','.$pool_assignees->quarter_id;    

                    $assignee_name   = $assignee_name.','.$pool_assignees->assignee_name;  
                    $assignee_email  = $assignee_email.','.$insert_text.''.$pool_assignees->assignee_email;  
                }
                $i++;
            } 
        // Find Assignee

        // Find Email Creator
            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $app_name               = '';
            $app_created_by_name    = '';
            $app_created_by_email   = '';
            foreach ($pool_apps as $pool_app) { 
                if($i==0){  
                    $app_name               = $pool_app->app_name;   
                    $app_created_by_name    = $pool_app->app_created_by_name;   
                    $app_created_by_email   = ''.$insert_text.''.$pool_app->app_created_by_email;   
                }
                else{  
                    $app_name               = $app_name.','.$pool_app->app_name;  
                    $app_created_by_name    = $app_created_by_name.','.$pool_app->app_created_by_name;  
                    $app_created_by_email   = $app_created_by_email.','.$insert_text.''.$pool_app->app_created_by_email;  
                }
                $i++;
            } 
        // Find Email Creator

        // Find CKPI Admin (Checker)
                $pool_users = Users::whereIn('approver_access',['1'])
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $checker_name              = ''; 
            $checker_email          = ''; 

            foreach ($pool_users as $pool_user) { 
                if($i==0){   
                    $checker_name      = $pool_user->staff_name;   
                    $checker_email  = ''.$insert_text.''.$pool_user->email_address;   
                }
                else{   
                    $checker_name      = $checker_name.','.$pool_user->staff_name;  
                    $checker_email  = $checker_email.','.$insert_text.''.$pool_user->email_address;  
                }
                $i++;
            } 
        // Find CKPI Admin (Checker)

        // Find CKPI Admin (1st)
            $pool_admins = Users::whereIn('approver_access',['2'])
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $admin_name              = ''; 
            $admin_email          = ''; 

            foreach ($pool_admins as $pool_admin) { 
                if($i==0){   
                    $admin_name      = $pool_admin->staff_name;   
                    $admin_email  = ''.$insert_text.''.$pool_admin->email_address;   
                }
                else{   
                    $admin_name      = $admin_name.','.$pool_admin->staff_name;  
                    $admin_email  = $admin_email.','.$insert_text.''.$pool_admin->email_address;  
                }
                $i++;
            } 
        // Find CKPI Admin (1st) 

        $result = EmailController::reviewDeclare($semail,$staff_name,$assignee_name,$assignee_email,$app_name,$checker_email,$admin_email);
        if(!$result) {   
            return back()->with('email_failed', 'SMTP email failed.');           
        } else {
            
            $assignees = Ckpi_assignees::where('id',$assignee_id)
                ->update(
                    [  
                        'assignee_completed'            => 'Y',
                        'assignee_approved_is'          => 'Y',
                        'assignee_approved_by_name'     => $staff_name,
                        'assignee_approved_by_email'    => $semail2,
                        'assignee_approved_by_date'     => Carbon::Now(),
                        'assignee_approved_remark'      => $remark 
                    ]
                ); 

            // count All 
                $alls = Ckpi_assignees::select(DB::raw('count(*) as total_count')) 
                    ->where('ckpi_assignees.app_id','=',$app_id) 
                    ->where('ckpi_assignees.quarter_id','=',$quarter_id) 
                    ->get();
                    //->toArray();  
                $i                  = 0; 
                $all_count    = '';  
                foreach ($alls as $all) { 
                    if($i==0){  
                        $all_count    = $all->total_count; 
                    }
                    else {  
                        $all_count    = $all_count.','.$all->total_count; 
                    }
                    $i++;
                } 
            // count All

            // count Yes (Who completed the task) 
                $yess = Ckpi_assignees::select(DB::raw('count(*) as total_count'))
                    ->where('ckpi_assignees.app_id','=',$app_id) 
                    ->where('ckpi_assignees.quarter_id','=',$quarter_id)
                    ->where('ckpi_assignees.assignee_approved_is','=','Y')  
                    ->get();
                    //->toArray(); 
                $j                  = 0; 
                $count_approved    = '';  
                foreach ($yess as $yes) { 
                    if($j==0){  
                        $count_approved    = $yes->total_count; 
                    }
                    else {  
                        $count_approved    = $count_approved.','.$yes->total_count; 
                    }
                    $j++;
                } 
            // count Yes (Who completed the task) 

            $percentage = ($count_approved / $all_count) * 100; 
            if($percentage >= 100){

                // Find All KPI Owner
                    $pool_kpi_owners = Ckpi_assignees::select(
                                     
                                                
                                                    'ckpi_assignees.app_id',
                                                    'ckpi_assignees.quarter_id',
                                                    'ckpi_assignees.kpi_owner_email',
                                                    'ckpi_assignees.assignee_email'
                                                
                                    
                        )
                        ->groupBy('app_id','quarter_id','kpi_owner_email','assignee_email') 
                        ->where('app_id','=',$app_id) 
                        ->where('quarter_id','=',$quarter_id) 
                        ->get();
                       // ->toArray(); 
                    $i                          = 0;  
                    $kpi_owner_email            = ''; 

                    foreach ($pool_kpi_owners as $pool_kpi_owner) { 
                        if($i==0){      
                            $kpi_owner_email    = ''.$insert_text.''.$pool_kpi_owner->kpi_owner_email;   
                        }
                        else{    
                            $kpi_owner_email    = $kpi_owner_email.','.$insert_text.''.$pool_kpi_owner->kpi_owner_email;  
                        }
                        $i++;
                    } 
                // Find All KPI Owner

                // Find All Assignee
                    $pool_2_assignees = Ckpi_assignees::select(
                                     
                                                
                                                    'ckpi_assignees.app_id',
                                                    'ckpi_assignees.quarter_id',
                                                    'ckpi_assignees.assignee_email'
                                                
                                    
                        )
                        ->groupBy('app_id','quarter_id','assignee_email') 
                        ->where('app_id','=',$app_id) 
                        ->where('quarter_id','=',$quarter_id) 
                        ->get();
                       // ->toArray(); 
                    $i                          = 0;  
                    $assignee_email2            = ''; 

                    foreach ($pool_2_assignees as $pool_2_assignee) { 
                        if($i==0){      
                            $assignee_email2    = ''.$insert_text.''.$pool_2_assignee->assignee_email;   
                        }
                        else{    
                            $assignee_email2    = $assignee_email2.',<br/>'.$insert_text.''.$pool_2_assignee->assignee_email;  
                        }
                        $i++;
                    } 
                // Find All Assignee

                $result_2 = EmailController::reviewDeclareAll($staff_name,$semail,$kpi_owner_email,$assignee_email2, $checker_name,$checker_email,$admin_name, $admin_email, $app_name);
                if(!$result_2) {   
                    return back()->with('email_failed', 'SMTP email failed.');   
                } else {  

                    $applications = Ckpi_apps::where('id',$app_id)
                        ->update(
                            [
                                'q'.$quarter_id.''          => 'Y',
                                'app_status'                => 'CHECKED', 
                                'app_stage'                 => '8',

                                'app_assessment_is'         => 'Y',
                                'app_assessment_by_name'    => $staff_name,
                                'app_assessment_by_email'   => $semail2,
                                'app_assessment_by_date'    => Carbon::Now(),
                                'app_assessment_remark'     => $remark  
                            ]
                        ); 

                    return redirect('/home')->with('review_declare_all', 'All KPI Owner approved YTD Target & YTD Achievement.');

                }  

            } else { 

                return redirect('/home')->with('review_declare', 'Approved YTD Target & YTD Achievement.');

            }    

        } 
    }

    public function rework(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $app_id                 = htmlentities($request->get('rework_id'));
        $assignee_id            = htmlentities($request->get('assignee_rework_id'));
        $remark                 = htmlentities($request->get('remark_rework'));

        // Find KPI Owner & Assignee
            $pool_assignees = Ckpi_assignees::where('id','=',$assignee_id)
                ->get();
               // ->toArray();  
            $i                = 0;  
            $assignee_name    = '';
            $assignee_email   = ''; 
            $kpi_owner_name   = ''; 
            $kpi_owner_email  = ''; 

            foreach ($pool_assignees as $pool_assignees) { 
                if($i==0){  
                    $kpi_owner_name   = $pool_assignees->kpi_owner_name;   
                    $kpi_owner_email  = ''.$insert_text.''.$pool_assignees->kpi_owner_email;  
                    
                    $assignee_name   = $pool_assignees->assignee_name;   
                    $assignee_email  = ''.$insert_text.''.$pool_assignees->assignee_email;   
                }
                else{    
                    $kpi_owner_name   = $kpi_owner_name.','.$pool_assignees->kpi_owner_name;  
                    $kpi_owner_email  = $kpi_owner_email.','.$insert_text.''.$pool_assignees->kpi_owner_email;  

                    $assignee_name   = $assignee_name.','.$pool_assignees->assignee_name;  
                    $assignee_email  = $assignee_email.','.$insert_text.''.$pool_assignees->assignee_email;  
                }
                $i++;
            } 
        // Find KPI Owner & Assignee

        // Find Email Creator
            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $app_name               = '';

            $app_created_by_name    = '';
            $app_created_by_email   = '';

            $app_endorsed_by_name    = '';
            $app_endorsed_by_email   = '';

            foreach ($pool_apps as $pool_app) { 
                if($i==0){  
                    $app_name               = $pool_app->app_name;   
                    $app_created_by_name    = $pool_app->app_created_by_name;   
                    $app_created_by_email   = ''.$insert_text.''.$pool_app->app_created_by_email; 

                    $app_endorsed_by_name   = $pool_app->app_endorsed_by_name;   
                    $app_endorsed_by_email  = ''.$insert_text.''.$pool_app->app_endorsed_by_email;   
                }
                else{  
                    $app_name               = $app_name.','.$pool_app->app_name;  
                    $app_created_by_name    = $app_created_by_name.','.$pool_app->app_created_by_name;  
                    $app_created_by_email   = $app_created_by_email.','.$insert_text.''.$pool_app->app_created_by_email;  

                    $app_endorsed_by_name   = $app_endorsed_by_name.','.$pool_app->app_endorsed_by_name;  
                    $app_endorsed_by_email  = $app_endorsed_by_email.','.$insert_text.''.$pool_app->app_endorsed_by_email;  
                }
                $i++;
            } 
        // Find Email Creator

        $result = EmailController::reviewRework($semail,$kpi_owner_name,$kpi_owner_email,$assignee_name,$assignee_email,$app_name);
        if(!$result) {   
            return back()->with('email_failed', 'SMTP email failed.');           
        } else {
            
            $assignees = Ckpi_assignees::where('id',$assignee_id)
                ->update(
                    [  
                        'assignee_completed'        => 'N',
                        'assignee_approved_remark'  => Carbon::Now(),
                        'assignee_approved_remark'  => $remark
                    ]
                ); 

            return redirect('/home')->with('review_rework', 'Request to rework has been submitted.');

        } 
    }

    public function review_history(Request $request, $appId, $assigneeId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Quarters
                        $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                       // ->toArray(); 
                if(count($curr_assignees) > 0){

                    $quarter_arrs       = array();  
                    $group_arrs         = array();    
                    $i                  = 0;  
                    $count = 1;

                    $perspective_arrs   = array();
                    $j                  = 0;  

                    foreach($curr_assignees as $curr_assignee)
                    {   
                        $group_arrs[$i]         = array();  

                        // Quarter
                            $app_id             = $curr_assignee->app_id;
                            $quarter_id         = $curr_assignee->quarter_id; 
                            $quarter_1_dashboards = Ckpi_assignees::where(
                                                            [
                                                                ['app_id',      '=', $app_id ],
                                                                ['quarter_id',  '=', $quarter_id ]
                                                            ] 
                                                    )->first();

                            $test111 = $quarter_1_dashboards->group_id; 

                            $quarter_2_arrs   = array(); 
                            $quarter_2_arrs[] = $quarter_1_dashboards->id;                           
                            $quarter_2_arrs[] = $quarter_1_dashboards->indicator_id;
                            $quarter_2_arrs[] = $quarter_1_dashboards->perspective_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->quarter_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->group_id;         
                            $quarter_2_arrs[] = $quarter_1_dashboards->app_id;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->kpi_owner_name;   
                            $quarter_2_arrs[] = $quarter_1_dashboards->assignee_name; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->main_target; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->ytd_target; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->ytd_achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->rating; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->weightage; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->weightage_score; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->mof_achievement; 
                            $quarter_2_arrs[] = $quarter_1_dashboards->is_active; 
                            $quarter_arrs[]   = $quarter_2_arrs;
                        // Quarter

                        $group_dashboards = Ckpi_assignees::select('app_id','group_id') 
                                        ->groupBy('app_id','group_id')
                                        ->where('app_id','=',$app_id) 
                                        ->orderBy('group_id','asc') 
                                        ->get();
                                       // ->toArray();
                        if(count($group_dashboards) > 0){ 

                            foreach($group_dashboards as $group_dashboard){   

                                // Group
                                    $g_id = $group_dashboard->group_id; 
                                    $group_2_dashboards = Ckpi_assignees::select( 
                                                                        
                                                                            'ckpi_assignees.*',
                                                                            'ckpi_assignees.id as assignee_item_id',

                                                                            'ckpi_groups.*'
                                                                        
                                                            
                                                )
                                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                ->where('ckpi_assignees.group_id','=',$g_id)
                                                ->orderBy('ckpi_assignees.id','asc')
                                                ->get();
                                              //  ->toArray();
                                    if(count($group_2_dashboards) > 0){
                                        
                                        $assignee_item_id           = ""; 
                                        $group_name                 = ""; 
                                        foreach($group_2_dashboards as $group_2_dashboard){
                                            $assignee_item_id       = $group_2_dashboard->assignee_item_id; 
                                            $group_name             = $group_2_dashboard->group_name; 
                                        }
                                    }

                                    $group_3_dashboards = Ckpi_assignees::where('ckpi_assignees.group_id','=',$g_id) 
                                            ->first();

                                    $group_2_arrs       = array();
                                    $group_2_arrs[]     = $g_id;                            // 0
                                    $group_2_arrs[]     = $group_name;                      // 1
                                    $group_2_arrs[]     = $assignee_item_id;                // 2
                                    $group_2_arrs[]     = $group_3_dashboards->is_active; // 3
                                    $group_arrs[$i][]   = $group_2_arrs;
                                // Group

                                $perspective_dashboards = Ckpi_assignees::select('app_id','quarter_id') 
                                                ->groupBy('app_id','quarter_id')
                                                ->where('app_id','=',$app_id) 
                                                ->where('quarter_id','=',$quarter_id)   
                                                ->get();
                                              //  ->toArray(); 
                                if(count($perspective_dashboards) > 0){  

                                    foreach($perspective_dashboards as $perspective_dashboard) { 

                                        $perspective_arrs[$j]   = array();

                                        $app_id_val             = $perspective_dashboard->app_id;
                                        $quarter_id_val         = $perspective_dashboard->quarter_id;   
                                        
                                        $perspective_2_dashboards = Ckpi_assignees::select(
                                                                     
                                                                            
                                                                                'ckpi_assignees.*',
                                                                                'ckpi_assignees.id as assignee_item_id',

                                                                                'ckpi_perspectives.*',
                                                                                'ckpi_perspectives.id as perspective_item_id',

                                                                                'ckpi_indicators.*',
                                                                                'ckpi_indicators.id as indicator_item_id',

                                                                                'ckpi_groups.*',
                                                                                'ckpi_groups.id as group_item_id',

                                                                                'ckpi_files.*',
                                                                                'ckpi_files.file_id as file_item_id'
                                                                            
                                                                     
                                                        )
                                                        ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                        ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                        ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                        ->join('ckpi_files','ckpi_assignees.id','=','ckpi_files.assignee_id')
                                                        ->where('ckpi_assignees.app_id','=',$app_id) 
                                                        ->where('ckpi_assignees.quarter_id','=',$quarter_id_val)    
                                                        ->where('ckpi_assignees.group_id','=',$g_id)    
                                                        ->orderBy('ckpi_assignees.id','asc')    
                                                        ->get();
                                                      //  ->toArray(); 
                                        if(count($perspective_2_dashboards) > 0){   

                                            foreach($perspective_2_dashboards as $perspective_2_dashboard) {  
                                                
                                                $arr2s = array();
                                                $arr2s[] = $perspective_2_dashboard->assignee_item_id; // 0
                                                $arr2s[] = $perspective_2_dashboard->indicator_indicator; // 1
                                                $arr2s[] = $perspective_2_dashboard->quarter_id; // 2
                                                $arr2s[] = $perspective_2_dashboard->perspective_perspective; // 3
                                                $arr2s[] = $perspective_2_dashboard->group_name; // 4
                                                $arr2s[] = $perspective_2_dashboard->app_id; // 5
                                                $arr2s[] = $perspective_2_dashboard->kpi_owner_name; // 6
                                                $arr2s[] = $perspective_2_dashboard->assignee_name; // 7

                                                $arr2s[] = $perspective_2_dashboard->main_target; // 8
                                                $arr2s[] = $perspective_2_dashboard->ytd_target; // 9
                                                $arr2s[] = $perspective_2_dashboard->ytd_achievement; // 10
                                                $arr2s[] = $perspective_2_dashboard->achievement; // 11
                                                $arr2s[] = $perspective_2_dashboard->rating; // 12
                                                $arr2s[] = $perspective_2_dashboard->weightage; // 13
                                                $arr2s[] = $perspective_2_dashboard->weightage_score; // 14
                                                $arr2s[] = $perspective_2_dashboard->mof_achievement; // 15
                                                $arr2s[] = $perspective_2_dashboard->file_id; // 16
                                                $arr2s[] = $perspective_2_dashboard->filename; // 17
                                                $perspective_arrs[$j][] = $arr2s; 

                                            }

                                        } 
                                        
                                        $j++; 

                                    }  

                                }                              

                            }

                        }  
                        $i++;   
                    } 

                } 
            // Quarters

            // Assignees    
                $assignees = Ckpi_perspectives::select(
                                
                                               
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id',
                                                'ckpi_assignees.app_id as assignee_app_id_item_id',

                                                'ckpi_files.*',
                                                'ckpi_files.file_id as file_item_id'
                                            
                                 
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                    ->join('ckpi_files','ckpi_assignees.id','=','ckpi_files.assignee_id')
                    // ->where('ckpi_assignees.kpi_owner_email','=',$email)   
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    // ->where('ckpi_assignees.is_active','=','Y')   
                    // ->where('ckpi_assignees.assignee_completed','=','Y')   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                    //->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            return view('lists.review_history',
                    [
                        'apps'              => $apps, 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 
                        'assignees'         => $assignees,
                        'staffs'            => $staffs
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }
}
