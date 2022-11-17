<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_tl_apps;
use App\Models\Ckpi_assignees;
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

class EndorseListingController extends Controller
{
    public function endorse(Request $request, $appId){

        // $tl_apps = Ckpi_tl_apps::select(
                                
                                            
        //                 'ckpi_tl_apps.*',
        //                 'ckpi_tl_apps.id as tl_app_item_id',

        //                 'ckpi_gls.*'
                    

        //     )
        //     ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
        //     ->orderBy('ckpi_tl_apps.id','asc')
        //     ->get();
        
        // echo '<pre>';
        // print_r($tl_apps);
        // echo '</pre>';
        // exit; 


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
                  //  ->toArray(); 
                if(count($curr_assignees) > 0){

                    $quarter_arrs       = array();  
                    $group_arrs         = array();  
                    $i                  = 0;  
                    $count = 1;

                    $perspective_arrs   = array();
                    $group_sum_arrs     = array();   
                    $j                  = 0;  

                    foreach($curr_assignees as $curr_assignee)
                    {   
                        $group_arrs[$i]                 = array();   

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
                                                //->toArray();
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
                                                //->toArray(); 
                                if(count($perspective_dashboards) > 0){  

                                    foreach($perspective_dashboards as $perspective_dashboard) { 

                                        $perspective_arrs[$j]   = array();
                                        $group_sum_arrs[$j]     = array();   

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
                                                       // ->toArray(); 
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
                                                $arr2s[] = $perspective_2_dashboard->main_target_type; // 18
                                                $perspective_arrs[$j][] = $arr2s;  

                                            }

                                            // weightage
                                                $total_sums_weightage = DB::connection('pgsql')
                                                                        ->table('ckpi_assignees')
                                                                        ->select(
                                                                                    DB::raw(
                                                                                                'sum(weightage) as weightage'
                                                                                    )             
                                                                        )
                                                                        ->where(
                                                                            [
                                                                                ['ckpi_assignees.group_id',     '=' , $g_id ],
                                                                                ['ckpi_assignees.quarter_id',   '=' , $quarter_id ],
                                                                                ['ckpi_assignees.include_is',   '=' , 'Y' ], 
                                                                            ]
                                                                        )->first();   
                                            // weightage

                                            // weightage Score
                                                $total_sums_weightage_score = DB::connection('pgsql')
                                                                        ->table('ckpi_assignees')
                                                                        ->select(
                                                                                    DB::raw(
                                                                                                'sum(weightage_score) as weightage_score'
                                                                                            )
                                                                                )
                                                                        ->where(
                                                                            [
                                                                                ['ckpi_assignees.group_id',     '=' , $g_id ],
                                                                                ['ckpi_assignees.quarter_id',   '=' , $quarter_id ],
                                                                                ['ckpi_assignees.include_is',   '=' , 'Y' ], 
                                                                            ]
                                                                        )->first(); 
                                            // weightage Score
                                            
                                            // MOF Achievement
                                                $total_sums_mof_achievement = DB::connection('pgsql')
                                                                        ->table('ckpi_assignees')
                                                                        ->select(
                                                                                    DB::raw(
                                                                                                'sum(mof_achievement) as mof_achievement'
                                                                                            )
                                                                                )
                                                                        ->where(
                                                                            [
                                                                                ['ckpi_assignees.group_id',     '=' , $g_id ],
                                                                                ['ckpi_assignees.quarter_id',   '=' , $quarter_id ],
                                                                                ['ckpi_assignees.mof_include',  '=' , 'Y' ], 
                                                                            ]
                                                                        )->first(); 
                                            // MOF Achievement

                                            // sum Score 
                                                $weightage            = $total_sums_weightage->weightage;
                                                $weightage_score      = $total_sums_weightage_score->weightage_score;
                                                $mof_achievement      = $total_sums_mof_achievement->mof_achievement; 

                                                $total_weightage_score = 0;

                                                if($weightage == 0 || $weightage_score == 0 || $mof_achievement == 0){
                                                    $total_weightage_score = 0;
                                                    $total_mof_achievement = 0;
                                                } else {
                                                    $total_weightage_score = ($weightage_score / $weightage) * 100;
                                                    $total_mof_achievement = $total_sums_mof_achievement->mof_achievement;
                                                }  
                                                
                                                $group_sum_2_arrs     = array();  
                                                $group_sum_2_arrs[]   = $total_sums_weightage->weightage;                   // 0   
                                                $group_sum_2_arrs[]   = $total_sums_weightage_score->weightage_score;       // 1
                                                $group_sum_2_arrs[]   = $total_weightage_score;                             // 2
                                                $group_sum_2_arrs[]   = $total_mof_achievement;                             // 3

                                                
                                                $group_sum_arrs[$j][] = $group_sum_2_arrs;
                                            // sum Score

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

            // Populate TL_APPS
                $tl_apps = Ckpi_tl_apps::select(
                      
                                
                                    'ckpi_tl_apps.*',
                                    'ckpi_tl_apps.id as tl_app_item_id',

                                    'ckpi_gls.*'
                                
                       
                )
                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                ->orderBy('ckpi_tl_apps.id','asc')
                ->get();
               // ->toArray();
            // Populate TL_APPS

            // Display Table
                $curr_tables = Ckpi_tl_apps::select('id','tl_group') 
                    ->groupBy('id','tl_group') 
                    ->orderBy('id','asc') 
                    ->get();
                  //  ->toArray(); 
                if(count($curr_tables) > 0){

                    $tl_app_arrs    = array();
                    $tl_value_arrs  = array();
                    $tl_value_4_arrs  = array();
                    $j              = 0;  
                    $k              = 0;  

                    foreach($curr_tables as $curr_table){

                        $tl_id      = $curr_table->id;
                        $tl_group   = $curr_table->tl_group;

                        $tl_app_1_dashboards = Ckpi_tl_apps::select(
                                                           
                                                                    
                                                                        'ckpi_tl_apps.*',
                                                                        'ckpi_tl_apps.id as tl_app_item_id',

                                                                        'ckpi_gls.*'
                                                                    
                                                             
                                                    )
                                                    ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                                                    ->where(
                                                            [
                                                                ['ckpi_tl_apps.id',      '=', $tl_id ]
                                                            ] 
                                                    )->first();

                        $tl_app_2_arrs          = array(); 
                        $tl_app_2_arrs[]        = $tl_app_1_dashboards->id;                           
                        $tl_app_2_arrs[]        = $tl_app_1_dashboards->tl_code;
                        $tl_app_2_arrs[]        = $tl_app_1_dashboards->tl_group;   
                        $tl_app_2_arrs[]        = $tl_app_1_dashboards->tl_value;   
                        $tl_app_2_arrs[]        = $tl_app_1_dashboards->gl_value;   
                        $tl_app_arrs[]          = $tl_app_2_arrs; 


                        $tl_app_2_dashboards = Ckpi_tl_apps::select(
                                                            
                                                                        
                                                                            'ckpi_tl_apps.*',
                                                                            'ckpi_tl_apps.id as tl_app_item_id',

                                                                            'ckpi_tl_values.*',
                                                                            'ckpi_tl_values.id as value_item_id',

                                                                            'ckpi_gls.*'
                                                                        
                                                           
                                                )
                                                ->join('ckpi_tl_values','ckpi_tl_apps.id','=','ckpi_tl_values.tl_id')
                                                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                                                ->where('ckpi_tl_apps.id','=',$tl_id)
                                                ->orderBy('ckpi_tl_values.id','asc')
                                                ->get();
                                                //->toArray();
                        if(count($tl_app_2_dashboards) > 0){

                            foreach($tl_app_2_dashboards as $tl_app_2_dashboard){

                                $tl_value_arrs[$j]      = array(); 
                                $tl_value_arrs[$k]      = array(); 

                                $tl_value_2_arrs        = array();
                                $tl_value_2_arrs[]      = $tl_app_2_dashboard->tl_app_item_id; // 0 
                                $tl_value_2_arrs[]      = $tl_app_2_dashboard->tl_group; // 0 
                                $tl_value_2_arrs[]      = $tl_app_2_dashboard->gl_value; // 0 
                                $tl_value_2_arrs[]      = $tl_app_2_dashboard->tl_value; // 0 
                                $tl_value_arrs[$j][]    = $tl_value_2_arrs;  


                                // TL Value
                                    $tl_app_item_id_val     = $tl_app_2_dashboard->tl_app_item_id;
                                    $tl_id_val              = $tl_app_2_dashboard->tl_id; 

                                    $tl_app_3_dashboards = Ckpi_tl_apps::select(
                                                            
                                                                        
                                                                            'ckpi_tl_apps.*',
                                                                            'ckpi_tl_apps.id as tl_app_item_id',

                                                                            'ckpi_tl_values.*',
                                                                            'ckpi_tl_values.id as value_item_id',

                                                                            'ckpi_gls.*'
                                                                        
                                                            
                                                )
                                                ->join('ckpi_tl_values','ckpi_tl_apps.id','=','ckpi_tl_values.tl_id')
                                                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                                                ->where('ckpi_tl_values.tl_id','=',$tl_id_val)
                                                ->orderBy('ckpi_tl_values.id','asc')
                                                ->get();
                                                //->toArray();
                                    if(count($tl_app_3_dashboards) > 0){

                                        foreach($tl_app_3_dashboards as $tl_app_3_dashboard){ 

                                            $tl_value_3_arrs        = array();
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tl_id;               // 0 
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tl_app_item_id;      // 1
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tl_group;            // 2 
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->gl_value;            // 3 
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tl_value;            // 4 
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tlv_rating;          // 5 
                                            $tl_value_3_arrs[]      = $tl_app_3_dashboard->tlv_value;           // 6 
                                            $tl_value_4_arrs[$k][]    = $tl_value_3_arrs;   

                                        }

                                    }
                                // TL Value

                                $k++;
                                $j++;

                            }

                        }




                    }

                }
            // Display Table

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            return view('lists.endorse',
                    [
                        'apps'              => $apps, 
                        'staffs'            => $staffs,

                        'tl_app_arrs'       => $tl_app_arrs, 
                        'tl_value_arrs'     => $tl_value_arrs,
                        'tl_value_4_arrs'   => $tl_value_4_arrs,

                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs,

                        'group_sum_arrs'    => $group_sum_arrs,
                            
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
        $remark                 = htmlentities($request->get('remark'));

        // Find Email Creator
            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $app_name               = '';
            $app_created_by_name    = '';
            $app_created_by_email   = '';

            $app_endorsed_by_name   = '';
            $app_endorsed_by_email  = '';

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

        // Find Email KPI Owner 
            $pool_apps = Ckpi_assignees::select(
                             
                                        
                                            'ckpi_assignees.app_id',
                                            'ckpi_assignees.kpi_owner_email'
                                        
                            
                )
                ->groupBy('app_id','kpi_owner_email') 
                ->where('app_id','=',$app_id) 
                ->where('is_active','=','Y')
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $kpi_owner_email        = ''; 
            foreach ($pool_apps as $pool_app) { 
                if($i==0){   
                    $kpi_owner_email    = ''.$insert_text.''.$pool_app->kpi_owner_email;      
                }
                else{  
                    // $kpi_owner_email    = $kpi_owner_email.',<br/>'.$insert_text.''.$pool_app->kpi_owner_email;     
                    $kpi_owner_email    = $kpi_owner_email.','.$insert_text.''.$pool_app->kpi_owner_email;     
                }
                $i++;
            } 
        // Find Email KPI Owner

        // echo '<pre>';
        // print_r($kpi_owner_email);
        // echo '</pre>';
        // exit;

        $result = EmailController::endorseDeclare($semail,$app_created_by_name,$app_created_by_email,$kpi_owner_email,$app_name);
        if(!$result) {   
            return back()->with('email_failed', 'SMTP email failed.');           
        } else {
            
            $applications = Ckpi_apps::where('id',$app_id)
                ->update(
                    [
                        'app_status'            => 'ASSIGNED', 
                        'app_stage'             => '4',  
                        'app_endorsed_is'       => 'Y',
                        'app_endorsed_by_name'  => $staff_name,
                        'app_endorsed_by_email' => $semail2,
                        'app_endorsed_by_date'  => Carbon::Now(),
                        'app_endorsed_remark'   => $remark  
                    ]
                ); 

            $assignees = Ckpi_assignees::where('app_id',$app_id)
                ->update(
                    [
                        'assign_is'            => 'Y' 
                    ]
                ); 

            return redirect('/home')->with('endorser_declare', 'Corporate KPI successfully endorse and submitted to all KPI owner for review.');

        } 
    }

    public function rework(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $app_id                 = htmlentities($request->get('rework_id'));
        $remark                 = htmlentities($request->get('remark'));

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


        $result = EmailController::endorseRework($semail,$app_created_by_name,$app_created_by_email,$app_endorsed_by_name,$app_endorsed_by_email,$app_name);
        if(!$result) {   
            return back()->with('email_failed', 'SMTP email failed.');           
        } else {
            
            $applications = Ckpi_apps::where('id',$app_id)
                ->update(
                    [
                        'app_status'            => 'REWORKUSER', 
                        'app_stage'             => '3',  
                        'app_endorsed_remark'   => $remark  
                    ]
                ); 

            return redirect('/home')->with('endorser_rework', 'Request to rework has been submitted.');

        } 
    }
}
