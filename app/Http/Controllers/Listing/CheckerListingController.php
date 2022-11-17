<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_tl_apps;
use App\Models\Ckpi_tl_values;
use App\Models\Ckpi_assignees;
use App\Models\Users;
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

class CheckerListingController extends Controller
{
    public function checker(Request $request, $appId){

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

            // Assignees (Active Quarter)   
                $assignees2 = Ckpi_assignees::select(
                              
                                           
                                            'ckpi_assignees.*',
                                            'ckpi_assignees.id as assignee_item_id',

                                            'ckpi_indicators.*',
                                            'ckpi_indicators.id as indicator_item_id',

                                            'ckpi_perspectives.*',
                                            'ckpi_perspectives.id as perspective_item_id',

                                            'ckpi_groups.*',
                                            'ckpi_groups.id as group_item_id',

                                            'ckpi_files.*',
                                            'ckpi_files.file_id as file_item_id'                                           

                                 
                    )   
                    ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                    ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                    ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')

                    ->join('ckpi_files','ckpi_assignees.id','=','ckpi_files.assignee_id')

                    ->where('ckpi_assignees.app_id','=',$app_id) 
                    ->where('ckpi_assignees.is_active','=','Y') 
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                    //->toArray(); 
            // Assignees (Active Quarter)

            // All Staff in LifeXcess
                $staffs = LifeXcessController::allNew();
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                // $staffs_l2 = LifeXcessController::L2();
                $staffs_l2 = LifeXcessController::L2_semua();
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                $staffs6 = LifeXcessController::allCurrent();
                // $staffs6 = LifeXcessController::L2_semua();
            // All Staff in LifeXcess 

            // Populate TL_APPS
                $tl_apps = Ckpi_tl_apps::select(
                                    
                                            
                                                'ckpi_tl_apps.*',
                                                'ckpi_tl_apps.id as tl_app_item_id',

                                                'ckpi_gls.*'
                                            
                                    
                            )
                            ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
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

            return view('lists.checker',
                    [
                        'apps'              => $apps,  
                        'assignees2'        => $assignees2,
                        'staffs'            => $staffs,
                        'staffs_l2'         => $staffs_l2,
                        'staffs6'           => $staffs6,
                        'tl_apps'           => $tl_apps,

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

    public function tl_apps(Request $request){
        $tl_apps = Ckpi_tl_apps::orderBy('id','asc')
                ->get();
        return json_encode($tl_apps);
    }

    public function getTLVALUES(Request $request){
        $tl_app_id                    = $request->input('tl_app_id');  // ID002471 
        $tl_apps = Ckpi_tl_values::where('tl_id','=',$tl_app_id)
                ->orderBy('id','asc')
                ->get();
        return json_encode($tl_apps);
    }

    public function updateCurrentAssignee(Request $request){

        $insert_text                = ConfigController::insertTestText();

        $staff_name                 = htmlentities($request->session()->get('staff_name'));
        $semail                     = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                    = htmlentities($request->session()->get('email'));

        $selects                    = $request->input('assignee_item_id_val1');

        $kpi_owner_staffnos_txt     = $request->input('kpi_owner_staffno1');  // ID002471 
        $assignee_staffnos_txt      = $request->input('assignee_staffno1');  // ID002471 

        $table_type                 = $request->input('table_type1'); 
        $ordering_rating            = $request->input('ordering_rating1'); 
        $formula                    = $request->input('formula1'); 
        $include_is                 = $request->input('include_is1'); 

        $main_target                = $request->input('main_target1'); 
        $ytd_target                 = $request->input('ytd_target1'); 
        $ytd_achievement            = $request->input('ytd_achievement1'); 
        $achievement                = $request->input('achievement1'); 
        $rating                     = $request->input('rating1');  
        $weightage                  = $request->input('weightage1');  
        $weightage_score            = $request->input('weightage_score1'); 

        $mof_formula                = $request->input('mof_formula1');  
        $mof_include                = $request->input('mof_include1');  
        $mof_achievement            = $request->input('mof_achievement1');  

        $assignee_approved_is       = $request->input('assignee_approved_is1');  

        // KPI Owner
            $kpi_owner_names             = array();
            $kpi_owner_semails           = array();
            $kpi_owner_staffnos          = array();
            foreach($kpi_owner_staffnos_txt as $kpi_owner_staffno_txt1){

                // Staff Name
                    $kpi_owner_staffno1 = explode("|", $kpi_owner_staffno_txt1);
                    $dataset_kpi_owner_1 = array();
                    foreach($kpi_owner_staffno1 as $staffno_kpi1){
                        $result = LifeXcessController::staffno($staffno_kpi1);
                        foreach($result as $row){  
                            $dataset_kpi_owner_1[] = $row->STAFFNAME;  
                        }   
                    }   

                    $dataset_kpi_owner_2 = array();
                    foreach($dataset_kpi_owner_1 as $dt){
                        $dataset_kpi_owner_2[] = $dt;
                    }

                    $kpi_owner_name = implode("|",$dataset_kpi_owner_2); 
                    $kpi_owner_names[] = $kpi_owner_name;
                // Staff Name

                // Email
                    $kpi_owner_staffno2 = explode("|", $kpi_owner_staffno_txt1);
                    $dataset_kpi_owner_3 = array();
                    foreach($kpi_owner_staffno2 as $staffno_kpi2){
                        $result2 = LifeXcessController::staffno($staffno_kpi2);
                        foreach($result2 as $row){  
                            $dataset_kpi_owner_3[] = $row->SEMAIL;  
                        }   
                    }   

                    $dataset_kpi_owner_4 = array();
                    foreach($dataset_kpi_owner_3 as $dt){
                        $dataset_kpi_owner_4[] = $dt;
                    }

                    $kpi_owner_semail = implode("|",$dataset_kpi_owner_4); 
                    $kpi_owner_semails[] = $kpi_owner_semail;
                // Email

                // Staffno
                    $kpi_owner_staffno3 = explode("|", $kpi_owner_staffno_txt1);
                    $dataset_kpi_owner_5 = array();
                    foreach($kpi_owner_staffno3 as $staffno_kpi3){
                        $result3 = LifeXcessController::staffno($staffno_kpi3);
                        foreach($result3 as $row){  
                            $dataset_kpi_owner_5[] = $row->STAFFNO;  
                        }   
                    }   

                    $dataset_kpi_owner_6 = array();
                    foreach($dataset_kpi_owner_5 as $dt){
                        $dataset_kpi_owner_6[] = $dt;
                    }

                    $kpi_owner_staffno = implode("|",$dataset_kpi_owner_6); 
                    $kpi_owner_staffnos[] = $kpi_owner_staffno;
                // Staffno
                    
            }
        // KPI Owner

        // Assignee
            $assignee_names             = array();
            $assignee_semails           = array();
            $assignee_staffnos          = array();
            foreach($assignee_staffnos_txt as $assignee_staffno_txt1){

                // Staff Name
                    $assignee_staffno1 = explode("|", $assignee_staffno_txt1);
                    $dataset1 = array();
                    foreach($assignee_staffno1 as $staffno){
                        $result = LifeXcessController::staffno($staffno);
                        foreach($result as $row){  
                            $dataset1[] = $row->STAFFNAME;  
                        }   
                    }   

                    $dataset2 = array();
                    foreach($dataset1 as $dt){
                        $dataset2[] = $dt;
                    }

                    $assignee_name = implode("|",$dataset2); 
                    $assignee_names[] = $assignee_name;
                // Staff Name

                // Email
                    $assignee_staffno2 = explode("|", $assignee_staffno_txt1);
                    $dataset3 = array();
                    foreach($assignee_staffno2 as $staffno2){
                        $result2 = LifeXcessController::staffno($staffno2);
                        foreach($result2 as $row){  
                            $dataset3[] = $row->SEMAIL;  
                        }   
                    }   

                    $dataset4 = array();
                    foreach($dataset3 as $dt){
                        $dataset4[] = $dt;
                    }

                    $assignee_semail = implode("|",$dataset4); 
                    $assignee_semails[] = $assignee_semail;
                // Email

                // Staffno
                    $assignee_staffno3 = explode("|", $assignee_staffno_txt1);
                    $dataset5 = array();
                    foreach($assignee_staffno3 as $staffno3){
                        $result3 = LifeXcessController::staffno($staffno3);
                        foreach($result3 as $row){  
                            $dataset5[] = $row->STAFFNO;  
                        }   
                    }   

                    $dataset6 = array();
                    foreach($dataset5 as $dt){
                        $dataset6[] = $dt;
                    }

                    $assignee_staffno = implode("|",$dataset6); 
                    $assignee_staffnos[] = $assignee_staffno;
                // Staffno
                    
            } 
        // Assignee 
        
        foreach ((array) $selects as $index => $select) {

            $assignees = Ckpi_assignees::whereIn('id',[$select])
                    ->update(
                                [    
                                    'kpi_owner_staffno'             => $kpi_owner_staffnos[$index],
                                    'kpi_owner_name'                => $kpi_owner_names[$index],
                                    'kpi_owner_email'               => $kpi_owner_semails[$index],
                                    
                                    'assignee_staffno'              => $assignee_staffnos[$index],
                                    'assignee_name'                 => $assignee_names[$index],
                                    'assignee_email'                => $assignee_semails[$index],

                                    'table_type'                    => $table_type[$index],
                                    'ordering_rating'               => $ordering_rating[$index],
                                    'formula'                       => $formula[$index],
                                    'include_is'                    => $include_is[$index], 

                                    'main_target'                   => $main_target[$index],
                                    'ytd_target'                    => $ytd_target[$index],
                                    'ytd_achievement'               => $ytd_achievement[$index],
                                    'achievement'                   => $achievement[$index],
                                    'rating'                        => $rating[$index], 
                                    'weightage'                     => $weightage[$index],
                                    'weightage_score'               => $weightage_score[$index],

                                    'mof_formula'                   => $mof_formula[$index], 
                                    'mof_include'                   => $mof_include[$index], 
                                    'mof_achievement'               => $mof_achievement[$index],

                                    'assignee_completed'            => $assignee_approved_is[$index],
                                    'assignee_approved_is'          => $assignee_approved_is[$index]
                                ]
            );  
        }  

        // return json_encode(true);
        return back()->with('checker_current_assignee', 'Active Quarter has been updated.');
        
    }

    public function sendRework(Request $request){

        $insert_text                = ConfigController::insertTestText();

        $staff_name                 = htmlentities($request->session()->get('staff_name'));
        $semail                     = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                    = htmlentities($request->session()->get('email'));

        $app_id                     = htmlentities($request->get('app_id_val_email'));  

        $sql = Ckpi_assignees::where('app_id','=',$app_id)
                ->where('is_active','=','Y')
                ->where('assignee_completed','=','N')
                ->where('assignee_approved_is','=','N')
                ->get();
        if(count($sql) >  0){

            $kpi_owner_email = "";
            $assignee_name   = "";
            $assignee_email  = "";

            foreach($sql as $row){

                $kpi_owner_email = ''.$insert_text.''.$row->kpi_owner_email;
                $assignee_name  = ''.$insert_text.''.$row->assignee_name;
                $assignee_email  = ''.$insert_text.''.$row->assignee_email;

                $result = EmailController::checkerRequestRework($semail,$staff_name, $kpi_owner_email,$assignee_name,$assignee_email);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else {

                    return back()->with('checker_current_assignee_rework', 'Request to rework has been successfully sent via email.'); 

                }

            }
        }

        // print_r($sql);
        exit;



        


    }

    public function declare(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $app_id                 = htmlentities($request->get('declare_id'));
        $quarter_id             = htmlentities($request->get('quarter_id'));
        $remark                 = htmlentities($request->get('remark_declare'));

        // Check if all KPI Owner Approve Or Not
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

                // Find Email Creator
                        $pool_apps = Ckpi_apps::where('id','=',$app_id)
                        ->get();
                        //->toArray();  
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

                // Find 1st Level Approver CKPI
                    $pool_users = Users::where('approver_access','=','2') 
                        ->get();
                        //->toArray();  
                    $i                    = 0; 
                    $staffname            = '';
                    $email_address        = ''; 
                    foreach ($pool_users as $pool_user) { 
                        if($i==0){   
                            $staffname        = $pool_user->staff_name;      
                            $email_address    = ''.$insert_text.''.$pool_user->email_address;      
                        }
                        else{  
                            $staffname        = $staffname.','.$pool_user->staff_name;     
                            $email_address    = $email_address.','.$insert_text.''.$pool_user->email_address;     
                        }
                        $i++;
                    } 
                // Find 1st Level Approver CKPI

                $result = EmailController::checkerDeclare($staff_name, $semail, $staffname,$email_address,$app_name,$app_created_by_email);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else {
                    
                    $applications = Ckpi_apps::where('id',$app_id)
                        ->update(
                            [
                                'app_status'           => 'APPROVAL', 
                                'app_stage'            => '10',  

                                'app_checked_is'       => 'Y',
                                'app_checked_by_name'  => $staff_name,
                                'app_checked_by_email' => $semail2,
                                'app_checked_by_date'  => Carbon::Now(),
                                'app_checked_remark'   => $remark  
                            ]
                        ); 

                    return redirect('/home')->with('checker_declare', 'Corporate KPI successfully checked and submitted to 1st level approver for review.');

                } 

            } else {

                return back()->with('not_approved', 'Please makesure all indicator approved by KPI owner.');

            }
        // Check if all KPI Owner Approve Or Not 
        
    }
}
