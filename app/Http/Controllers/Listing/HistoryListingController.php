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

class HistoryListingController extends Controller
{
    public function history(Request $request, $appId){

        echo $appId;
        exit;

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id     = "";
            $app_stage  = "";
            foreach($apps as $app){
                $app_id     = $app->id;
                $app_stage  = $app->app_stage;
            } 

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
                            $quarter_2_arrs[] = $quarter_1_dashboards->assignee_completed; // 17  
                            $quarter_2_arrs[] = $quarter_1_dashboards->assignee_updated_status;  // 18
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

                                                $arr2s[] = $perspective_2_dashboard->assignee_updated_by_date2; // 16
                                                $arr2s[] = $perspective_2_dashboard->assignee_updated_remark; // 17
                                                $arr2s[] = $perspective_2_dashboard->assignee_approved_by_date2; // 18
                                                $arr2s[] = $perspective_2_dashboard->assignee_approved_remark; // 19

                                                $arr2s[] = $perspective_2_dashboard->file_id; // 20
                                                $arr2s[] = $perspective_2_dashboard->filename; // 21
                                                
                                                $perspective_arrs[$j][] = $arr2s;  

                                            }

                                            // weightage
                                                $total_sums_weightage = Ckpi_assignees::select(DB::raw('sum(weightage) as weightage'))
                                                    ->where(
                                                        [
                                                            ['ckpi_assignees.group_id',     '=' , $g_id ],
                                                            ['ckpi_assignees.quarter_id',   '=' , $quarter_id ],
                                                            ['ckpi_assignees.include_is',   '=' , 'Y' ], 
                                                        ]
                                                    )->first();  
                                            // weightage

                                            // weightage Score
                                                $total_sums_weightage_score =Ckpi_assignees::select(DB::raw('sum(weightage_score) as weightage_score'))
                                                        ->where(
                                                            [
                                                                ['ckpi_assignees.group_id',     '=' , $g_id ],
                                                                ['ckpi_assignees.quarter_id',   '=' , $quarter_id ],
                                                                ['ckpi_assignees.include_is',   '=' , 'Y' ], 
                                                            ]
                                                        )->first(); 
                                            // weightage Score
                                            
                                            // MOF Achievement
                                                $total_sums_mof_achievement =Ckpi_assignees::select(DB::raw('sum(mof_achievement) as mof_achievement'))
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
                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_id')
                ->orderBy('ckpi_tl_apps.id','asc')
                ->get();
                //->toArray();
            // Populate TL_APPS

            // Display Table
                $curr_tables = Ckpi_tl_apps::select('id','tl_group') 
                    ->groupBy('id','tl_group') 
                    ->orderBy('id','asc') 
                    ->get();
                    //->toArray(); 
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
                                                                        'ckpi_tl_apps.id tl_app_item_id',

                                                                        'ckpi_gls.*'
                                                                    
                                                            
                                                    )
                                                    ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_id')
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
                                                                            'ckpi_tl_apps.id tl_app_item_id',

                                                                            'ckpi_tl_values.*',
                                                                            'ckpi_tl_values.id value_item_id',

                                                                            'ckpi_gls.*'
                                                                        
                                                           
                                                )
                                                ->join('ckpi_tl_values','ckpi_tl_apps.id','=','ckpi_tl_values.tl_id')
                                                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_id')
                                                ->where('ckpi_tl_apps.id','=',$tl_id)
                                                ->orderBy('ckpi_tl_values.id','asc')
                                                ->get();
                                               // ->toArray();
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
                                                                            'ckpi_tl_apps.id tl_app_item_id',

                                                                            'ckpi_tl_values.*',
                                                                            'ckpi_tl_values.id value_item_id',

                                                                            'ckpi_gls.*'
                                                                        
                                                            
                                                )
                                                ->join('ckpi_tl_values','ckpi_tl_apps.id','=','ckpi_tl_values.tl_id')
                                                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_id')
                                                ->where('ckpi_tl_values.tl_id','=',$tl_id_val)
                                                ->orderBy('ckpi_tl_values.id','asc')
                                                ->get();
                                               // ->toArray();
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

            return view('lists.history',
                    [
                        'apps'              => $apps,  

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
}
