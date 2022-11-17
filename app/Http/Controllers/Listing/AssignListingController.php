<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_groups;
use App\Models\Ckpi_assignees;
use App\Models\Ckpi_perspectives;
use App\Models\Ckpi_indicators;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LifeXcessController;

class AssignListingController extends Controller
{
    public function assign(Request $request, $appId, $assigneeId){

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Groups
                $groups = Ckpi_groups::where('app_id','=',$app_id)
                    ->orderBy('id','asc')
                    ->get();
                   // ->toArray();
            // Groups

            // Perspectives  
                $perspectives = Ckpi_perspectives::where('ckpi_perspectives.app_id','=',$app_id) 
                    ->orderBy('ckpi_perspectives.id','asc')
                    ->get();
                   // ->toArray(); 
            // Perspectives

            // Indicators  
                $indicators = Ckpi_indicators::where('ckpi_indicators.app_id','=',$app_id) 
                    ->orderBy('ckpi_indicators.id','asc')
                    ->get();
                   // ->toArray(); 
            // Indicators

            // Assignees   
                $assignees = Ckpi_perspectives::select(
                              
                                               
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id'
                                            
                              
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                   // ->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            // Quarters
                        $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                        //->toArray(); 
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
                                        //->toArray();
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
                                               // ->toArray();
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
                                               // ->toArray(); 
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
                                                        //->toArray(); 
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

            return view('lists.assign',
                    [
                        'apps'              => $apps,
                        'groups'            => $groups, 
                        'perspectives'      => $perspectives,
                        'indicators'        => $indicators,
                        'assignees'         => $assignees,
                        'staffs'            => $staffs,
 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 


                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }

    public function all(Request $request){ 

        $row = LifeXcessController::all();
        return json_encode($row, true);

    }

    public function declare(Request $request){ 
        
        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email')); 

        $app_id                 = htmlentities($request->get('declare_id'));
        $assignee_id            = htmlentities($request->get('assignee_id'));
        $assignee_staffno       = htmlentities($request->get('assignee_staffno'));
        $remark                 = htmlentities($request->get('remark'));

        // Find Email Creator
            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                ->get();
                //->toArray();  
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

        $assignee_name   = "";
        $assignee_email  = "";

        $assignee_name_db   = "";
        $assignee_email_db  = "";

        $result                 = LifeXcessController::staffno($assignee_staffno);
        foreach($result as $res){

            $assignee_name      = $res->STAFFNAME;
            $assignee_email     = ''.$insert_text.''.$res->SEMAIL;

            $assignee_name_db   = $res->STAFFNAME;
            $assignee_email_db  = $res->SEMAIL;
        }
    
        $result = EmailController::kpiownerAssign($semail,$staff_name,$assignee_name,$assignee_email,$app_name);
        if(!$result) {   
            return back()->with('email_failed', 'SMTP email failed.');           
        } else {

            $applications = Ckpi_apps::where('id',$app_id)
                    ->update(
                        [
                            'app_status'            => 'ASSESSMENT',
                            'app_stage'             => '5' 
                        ]
                    ); 
            
            $assignees = Ckpi_assignees::where('id',$assignee_id)
                    ->update(
                        [
                            'assignee_staffno'          => $assignee_staffno,
                            'assignee_name'             => $assignee_name_db,
                            'assignee_email'            => $assignee_email_db, 

                            'assignee_created_by_name'  => $staff_name, 
                            'assignee_created_by_email' => $semail2, 
                            'assignee_created_by_date'  => Carbon::Now(),
                            'assignee_created_remark'   => $remark, 

                            'assignee_updated_status'   => 'Y',
                            'assignee_updated_count'    => DB::raw('assignee_updated_count+1'),
                            'assignee_updated_by_name'  => $staff_name,
                            'assignee_updated_by_email' => $semail2,
                            'assignee_updated_by_date'  => Carbon::Now(),
                            'assignee_updated_remark'   => $remark,
                        ]
                    ); 

            return redirect('/home')->with('kpiowner_assign', 'You have successfully nominated staff.');

        } 




        // $assignees = Ckpi_assignees::where('id',$assignee_id)
        //         ->update(
        //             [
        //                 "assignee_name"         => 'REWORKUSER',
        //                 "assignee_email"        => 'REWORKUSER',

        //                 "app_status"            => 'REWORKUSER', 
        //                 "app_stage"             => '3', 

        //                 "app_endorsed_is"       => 'Y',
        //                 "app_endorsed_by_name"  => $staff_name,
        //                 "app_endorsed_by_email" => $semail,
        //                 "app_endorsed_by_date"  => Carbon::Now(),
        //                 "app_endorsed_remark"   => $remark  
        //             ]
        //         ); 

        //     return redirect('/home')->with('endorser_rework', 'Request to rework has been submitted.');

    }

    public function assign_history(Request $request, $appId, $assigneeId){

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Groups
                $groups = Ckpi_groups::where('app_id','=',$app_id)
                    ->orderBy('id','asc')
                    ->get();
                   // ->toArray();
            // Groups

            // Perspectives  
                $perspectives = Ckpi_perspectives::where('ckpi_perspectives.app_id','=',$app_id) 
                    ->orderBy('ckpi_perspectives.id','asc')
                    ->get();
                   // ->toArray(); 
            // Perspectives

            // Indicators  
                $indicators = Ckpi_indicators::where('ckpi_indicators.app_id','=',$app_id) 
                    ->orderBy('ckpi_indicators.id','asc')
                    ->get();
                   // ->toArray(); 
            // Indicators

            // Assignees   
                $assignees = Ckpi_perspectives::select(
                                
                                               
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id'
                                            
                               
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                   // ->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            // Quarters
                        $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                        //->toArray(); 
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
                                        //->toArray();
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
                                               // ->toArray();
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
                                               // ->toArray(); 
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
                                                        //->toArray(); 
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

            return view('lists.assign_history',
                    [
                        'apps'              => $apps,
                        'groups'            => $groups, 
                        'perspectives'      => $perspectives,
                        'indicators'        => $indicators,
                        'assignees'         => $assignees,
                        'staffs'            => $staffs,
 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 


                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }
}
