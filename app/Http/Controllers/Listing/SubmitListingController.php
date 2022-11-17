<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_groups;
use App\Models\Ckpi_files;
use App\Models\Ckpi_pls;
use App\Models\Ckpi_ils;
use App\Models\Ckpi_qls;
use App\Models\Ckpi_assignees;
use App\Models\Ckpi_perspectives;
use App\Models\Ckpi_indicators;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\LifeXcessController;

class SubmitListingController extends Controller
{
    public function submit(Request $request, $appId){

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            
        if(count($apps) > 0){

            $app_id     = "";
            $app_stage  = "";
            foreach($apps as $app){
                $app_id     = $app->id;
                $app_stage  = $app->app_stage;
            }

            // Groups
                $groups = Ckpi_groups::where('app_id','=',$app_id)
                    ->orderBy('id','asc')
                    ->get();
                    
            // Groups

            // Perspectives  
                $perspectives = Ckpi_perspectives::where('ckpi_perspectives.app_id','=',$app_id) 
                    ->orderBy('ckpi_perspectives.id','asc')
                    ->get();
                     
            // Perspectives

            // Indicators  
                $indicators = Ckpi_indicators::where('ckpi_indicators.app_id','=',$app_id) 
                    ->orderBy('ckpi_indicators.id','asc')
                    ->get();
                     
            // Indicators

            // Assignees   
                $assignees = Ckpi_assignees::select( 
                                           
                                            'ckpi_assignees.*',
                                            'ckpi_assignees.id as assignee_item_id',

                                            'ckpi_indicators.*',
                                            'ckpi_indicators.id as indicator_item_id',

                                            'ckpi_perspectives.*',
                                            'ckpi_perspectives.id as perspective_item_id',

                                            'ckpi_groups.*',
                                            'ckpi_groups.id as group_item_id' 
                    )   
                    ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                    ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                    ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')

                    ->where('ckpi_assignees.app_id','=',$app_id) 
                    // ->where('ckpi_assignees.is_active','=','Y') 
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                     

                // $assignees = DB::connection('oracle')
                //     ->table('ckpi_perspectives')  
                //     ->select(
                //                 DB::raw(
                //                             "   
                //                                 ckpi_perspectives.*,
                //                                 ckpi_perspectives.id as perspective_item_id,

                //                                 ckpi_indicators.*,
                //                                 ckpi_indicators.id as indicator_item_id,

                //                                 ckpi_assignees.*,
                //                                 ckpi_assignees.id as assignee_item_id,

                //                                 ckpi_groups.*,
                //                                 ckpi_groups.id as group_item_id,

                //                                 ckpi_qls.*

                //                             "
                //                 )
                //     )
                //     ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                //     ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                //     ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                //     ->join('ckpi_qls','ckpi_assignees.quarter_id','=','ckpi_qls.QL_ID')
                //     ->where('ckpi_assignees.app_id','=',$app_id) 
                //     ->orderBy('ckpi_assignees.id','asc')
                //     ->get()
                //     ->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                // $staffs = LifeXcessController::allNew();
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                // $staffs_alls = LifeXcessController::allNew();
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                // $staffs_l2 = LifeXcessController::L2_semua();
                $staffs_l2 = LifeXcessController::all_new();
            // All Staff in LifeXcess

            // echo '<pre>';
            // print_r($staffs_l2);
            // echo '</pre>';
            // exit;

            return view('lists.submit',
                    [
                        'apps'              => $apps,
                        'groups'            => $groups, 
                        'perspectives'      => $perspectives,
                        'indicators'        => $indicators,
                        'assignees'         => $assignees,
                        // 'staffs'            => $staffs,
                        'staffs_l2'         => $staffs_l2 
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }

    public function reworkv(Request $request, $appId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            
        if(count($apps) > 0){

            $app_id     = "";
            $app_stage  = "";
            foreach($apps as $app){
                $app_id     = $app->id;
                $app_stage  = $app->app_stage;
            }

            // Groups
                $groups = Ckpi_groups::where('app_id','=',$app_id)
                    ->orderBy('id','asc')
                    ->get();
                    
            // Groups

            // Perspectives  
                $perspectives = Ckpi_perspectives::where('ckpi_perspectives.app_id','=',$app_id) 
                    ->orderBy('ckpi_perspectives.id','asc')
                    ->get();
                     
            // Perspectives

            // Indicators  
                $indicators = Ckpi_indicators::where('ckpi_indicators.app_id','=',$app_id) 
                    ->orderBy('ckpi_indicators.id','asc')
                    ->get();
                     
            // Indicators

            // Assignees   
                $assignees = Ckpi_assignees::select( 
                                           
                                            'ckpi_assignees.*',
                                            'ckpi_assignees.id as assignee_item_id',

                                            'ckpi_indicators.*',
                                            'ckpi_indicators.id as indicator_item_id',

                                            'ckpi_perspectives.*',
                                            'ckpi_perspectives.id as perspective_item_id',

                                            'ckpi_groups.*',
                                            'ckpi_groups.id as group_item_id'

                                        
                                 
                    )   
                    ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                    ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                    ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')

                    ->where('ckpi_assignees.app_id','=',$app_id) 
                    // ->where('ckpi_assignees.is_active','=','Y') 
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                     


                // $assignees = DB::connection('oracle')
                //     ->table('ckpi_perspectives')  
                //     ->select(
                //                 DB::raw(
                //                             "   
                //                                 ckpi_perspectives.*,
                //                                 ckpi_perspectives.id as perspective_item_id,

                //                                 ckpi_indicators.*,
                //                                 ckpi_indicators.id as indicator_item_id,

                //                                 ckpi_assignees.*,
                //                                 ckpi_assignees.id as assignee_item_id,

                //                                 ckpi_groups.*,
                //                                 ckpi_groups.id as group_item_id,

                //                                 ckpi_qls.*

                //                             "
                //                 )
                //     )
                //     ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                //     ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                //     ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                //     ->join('ckpi_qls','ckpi_assignees.quarter_id','=','ckpi_qls.QL_ID')
                //     ->where('ckpi_assignees.app_id','=',$app_id) 
                //     ->orderBy('ckpi_assignees.id','asc')
                //     ->get()
                //     ->toArray(); 
            // Assignees

            // All Staff in LifeXcess
                // $staffs = LifeXcessController::allNew();
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                // $staffs_alls = LifeXcessController::allNew();
            // All Staff in LifeXcess

             // All Staff in LifeXcess 
                $staff2s = LifeXcessController::endorser($semail2);
            // All Staff in LifeXcess

            // All Staff in LifeXcess
                $staffs_l2 = LifeXcessController::L2_semua();
                $staffs_all = LifeXcessController::all();
            // All Staff in LifeXcess

            // echo '<pre>';
            // print_r($staffs_l2);
            // echo '</pre>';
            // exit;

            return view('lists.rework',
                    [
                        'apps'              => $apps,
                        'groups'            => $groups, 
                        'perspectives'      => $perspectives,
                        'indicators'        => $indicators,
                        'assignees'         => $assignees,
                        // 'staffs'            => $staffs,
                        'staffs_l2'         => $staffs_l2,
                        'staff2s'           => $staff2s,
                        'staffs_all'           => $staffs_all
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }

    // Rework ORI
            // public function reworkv(Request $request, $appId){

            //     $staff_name             = htmlentities($request->session()->get('staff_name'));
            //     $semail                  = htmlentities($request->session()->get('email'));

            //     $apps = DB::connection('oracle')
            //         ->table('ckpi_apps')
            //         ->select(
            //             DB::raw(
            //                         "
            //                             ckpi_apps.*,
            //                             to_char(ckpi_apps.APP_CREATED_BY_DATE,'DD MON YYYY - HH:MI AM') as APP_CREATED_BY_DATE2,  
            //                             to_char(ckpi_apps.app_updated_by_date,'DD MON YYYY - HH:MI AM') as APP_UPDATED_BY_DATE2,   

            //                             DECODE(ckpi_apps.app_status,
            //                                     'DRAFT',            'Save as draft',  
            //                                     'ENDORSED',         'Pending from Superior (HOD)',   
            //                                     'REWORKUSER',       'Admin Rework',   
            //                                     'ASSIGNED',         'Pending assign by KPI owner',
            //                                     'ASSESSMENT',       'Pending assessment from assignee',
            //                                     'REWORKASSIGNEE',   'Rework by assignee',
            //                                     'REVIEWED',         'Pending review by KPI owner',
            //                                     'CHECKED',          'Pending by admin (checker)',
            //                                     'REWORKCHECK',      'Rework by admin (checker)',
            //                                     'APPROVAL',         'Pending admin (1st approver)',
            //                                     'FINALAPPROVAL',    'Pending admin (Final approver)',
            //                                     'COMPLETED',        'Completed',
            //                                     'REJECTED',         'Rejected',
            //                                     'KIV',              'Keep In View (KIV)',
            //                                     'AUTOCLOSED',       'Auto Closed'
            //                             ) APP_STATUS2,

            //                             DECODE(ckpi_apps.app_stage,
            //                                     '1',      'Save as draft',  
            //                                     '2',      'Pending from Superior (HOD)',   
            //                                     '3',      'Admin Rework',   
            //                                     '4',      'Pending assign by KPI owner',
            //                                     '5',      'Pending assessment from assignee',
            //                                     '6',      'Rework by assignee',
            //                                     '7',      'Pending review by KPI owner',
            //                                     '8',      'Pending by admin (checker)',
            //                                     '9',      'Rework by admin (checker)',
            //                                     '10',     'Pending admin (1st approver)',
            //                                     '11',     'Pending admin (Final approver)',
            //                                     '12',     'Completed',
            //                                     '13',     'Rejected',
            //                                     '14',     'Keep In View (KIV)',
            //                                     '15',     'Auto Closed'
            //                             ) APP_STAGE2
            //                         "
            //             )
            //         ) 
            //         ->where('id','=',$appId)
            //         ->orderBy('id','desc')
            //         ->get()
            //         ->toArray();
            //     if(count($apps) > 0){

            //         $app_id     = "";
            //         $app_stage  = "";
            //         foreach($apps as $app){
            //             $app_id     = $app->id;
            //             $app_stage  = $app->app_stage;
            //         }

            //         // Groups
            //             $groups = DB::connection('oracle')
            //                 ->table('ckpi_groups')
            //                 ->where('app_id','=',$app_id)
            //                 ->orderBy('id','asc')
            //                 ->get()
            //                 ->toArray();
            //         // Groups

            //         // Perspectives  
            //             $perspectives = DB::connection('oracle')
            //                 ->table('ckpi_perspectives') 
            //                 ->where('ckpi_perspectives.app_id','=',$app_id) 
            //                 ->orderBy('ckpi_perspectives.id','asc')
            //                 ->get()
            //                 ->toArray(); 
            //         // Perspectives

            //         // Indicators  
            //             $indicators = DB::connection('oracle')
            //                 ->table('ckpi_indicators')  
            //                 ->where('ckpi_indicators.app_id','=',$app_id) 
            //                 ->orderBy('ckpi_indicators.id','asc')
            //                 ->get()
            //                 ->toArray(); 
            //         // Indicators

            //         // Assignees   
            //             // $assignees = DB::connection('oracle')
            //             //     ->table('ckpi_perspectives')  
            //             //     ->select(
            //             //                 DB::raw(
            //             //                             "   
            //             //                                 ckpi_perspectives.*,
            //             //                                 ckpi_perspectives.id as perspective_item_id,

            //             //                                 ckpi_indicators.*,
            //             //                                 ckpi_indicators.id as indicator_item_id,

            //             //                                 ckpi_assignees.*,
            //             //                                 ckpi_assignees.id as assignee_item_id
            //             //                             "
            //             //                 )
            //             //     )
            //             //     ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
            //             //     ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
            //             //     ->where('ckpi_assignees.app_id','=',$app_id) 
            //             //     ->orderBy('ckpi_assignees.id','asc')
            //             //     ->get()
            //             //     ->toArray(); 

            //             $assignees = DB::connection('oracle')
            //                 ->table('ckpi_perspectives')  
            //                 ->select(
            //                             DB::raw(
            //                                         "   
            //                                             ckpi_perspectives.*,
            //                                             ckpi_perspectives.id as perspective_item_id,

            //                                             ckpi_indicators.*,
            //                                             ckpi_indicators.id as indicator_item_id,

            //                                             ckpi_assignees.*,
            //                                             ckpi_assignees.id as assignee_item_id,

            //                                             ckpi_groups.*,
            //                                             ckpi_groups.id as group_item_id,

            //                                             ckpi_qls.*

            //                                         "
            //                             )
            //                 )
            //                 ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
            //                 ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
            //                 ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
            //                 ->join('ckpi_qls','ckpi_assignees.quarter_id','=','ckpi_qls.QL_ID')
            //                 ->where('ckpi_assignees.app_id','=',$app_id) 
            //                 ->orderBy('ckpi_assignees.id','asc')
            //                 ->get()
            //                 ->toArray();
            //         // Assignees

            //         // All Staff in LifeXcess
            //             $staffs = LifeXcessController::all();
            //             $staff2s = LifeXcessController::endorser($semail);
            //         // All Staff in LifeXcess

            //         // All Staff in LifeXcess
            //             // $staffs_l2 = LifeXcessController::L2();
            //             $staffs_l2 = LifeXcessController::L2_semua();
            //         // All Staff in LifeXcess

            //         return view('lists.rework',
            //                 [
            //                     'apps'              => $apps,
            //                     'groups'            => $groups, 
            //                     'perspectives'      => $perspectives,
            //                     'indicators'        => $indicators,
            //                     'assignees'         => $assignees,
            //                     'staffs'            => $staffs,
            //                     'staff2s'           => $staff2s,
            //                     'staffs_l2'         => $staffs_l2
                                    
            //                 ]
            //             );

            //     } else {

            //         return redirect('home');

            //     }
            // }
    // Rework ORI
    
    // Perspective
        public function group(Request $request){

            $app_id             = htmlentities($request->get('app_id'));

            $groups = Ckpi_groups::where('app_id','=',$app_id)
                        ->orderBy('id','asc')
                        ->get();
            return json_encode($groups);

        }

        public function perspective(Request $request){

            $pls = Ckpi_pls::orderBy('pl_id','asc')
                        ->get();
            return json_encode($pls);

        }

        public function addPerspective(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $app_id                 = htmlentities($request->get('app_id_perspective_add')); 

            // Check if indicator already exist 
                $check_indicators = Ckpi_assignees::where('app_id','=',$app_id )  
                    ->get();
                     
                if(count($check_indicators) > 0){

                    return back()->with('indicator_existed', 'Indicator already existed. You cannot add/delete perspective just like that. You need to clear all indicator first, only then new perspective can be created.');

                } else {

                    $group       = htmlentities($request->get('group_perspective_add'));   // group_id
                    $group_pools = Ckpi_groups::where('id','=',$group )  
                        ->get();
                          
                    $i               = 0; 
                    $group_name              = '';  
                    foreach ($group_pools as $group_pool) { 
                        if($i==0){  
                            $group_name    = $group_pool->group_name; 
                        }
                        else{  
                            $group_name    = $group_name.','.$group_pool->group_name; 
                        }
                            $i++;
                    }

                    $perspective_perspective= htmlentities($request->get('perspective_add')); 
                    $remark                 = htmlentities($request->get('remark_perspective_add'));

                    $checks = Ckpi_perspectives::where('app_id','=',$app_id)
                        ->where('perspective_group','=',$group_name) 
                        ->where('perspective_perspective','=',$perspective_perspective)
                        ->get();
                        
                    if(count($checks) > 0){

                        return back()->with('perspective_duplicated', 'Perspective already exists in the list.'); 

                    } else {

                        $perspectives = Ckpi_perspectives::insertGetId(
                            [    
                                'group_id'                      => $group,
                                'app_id'                        => $app_id,
                                'perspective_group'             => $group_name, 
                                'perspective_perspective'       => $perspective_perspective, 
                                'perspective_created_by_name'   => strtoupper($staff_name),
                                'perspective_created_by_email'  => $email,
                                'perspective_created_by_date'   => Carbon::Now(),
                                'perspective_created_remark'    => $remark,
                                'perspective_updated_status'    => 'N',
                                'perspective_updated_count'     => '0'   
                            ]
                        ); 

                        // $qls_pools = DB::connection('oracle')
                        //     ->table('ckpi_qls')    
                        //     ->get()
                        //     ->toArray();  
                        // if(count($qls_pools) > 0){
                        //     foreach($qls_pools as $qls_pool){  

                        //         $perspectives = Ckpi_perspectives::insertGetId(
                        //             [    
                        //                 "group_id"                      => $group,
                        //                 "app_id"                        => $app_id,
                        //                 "perspective_group"             => $group_name, 
                        //                 "perspective_perspective"       => $perspective_perspective, 
                        //                 "perspective_created_by_name"   => strtoupper($staff_name),
                        //                 "perspective_created_by_email"  => $email,
                        //                 "perspective_created_by_date"   => Carbon::Now(),
                        //                 "perspective_created_remark"    => $remark,
                        //                 "perspective_updated_status"    => 'N',
                        //                 "perspective_updated_count"     => '0'   
                        //             ]
                        //         ); 

                        //     }
                        // } else {}

                        return back()->with('perspective_added', 'New perspective added.');

                    } 

                }
            // Check if indicator already exist

        }

        public function perspectiveEditDelete(Request $request){

            $perspective_id             = htmlentities($request->get('perspective_id'));

            $perspectives = Ckpi_perspectives::where('id','=',$perspective_id) 
                    ->get();
            return json_encode($perspectives);

        }

        public function editPerspective(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $perspective_id         = htmlentities($request->get('id_perspective_edit'));
            $app_id                 = htmlentities($request->get('app_id_perspective_edit')); 


            $group                  = htmlentities($request->get('group_perspective_edit'));   // TYPE_ID
            $group_pools = Ckpi_groups::where('id','=',$group )  
                ->get();
                  
            $i               = 0; 
            $group_name              = '';  
            foreach ($group_pools as $group_pool) { 
                if($i==0){  
                    $group_name    = $group_pool->group_name; 
                }
                else{  
                    $group_name    = $group_name.','.$group_pool->group_name; 
                }
                    $i++;
            } 

            $quarter                = htmlentities($request->get('quarter_perspective_edit')); // quarter_id
            $quarter_pools = DB::connection('oracle')
                ->table('ckpi_quarters')  
                ->where('id','=',$quarter )  
                ->get();
                  
            $i               = 0; 
            $quarter_name              = '';  
            foreach ($quarter_pools as $quarter_pool) { 
                if($i==0){  
                    $quarter_name    = $quarter_pool->quarter_name; 
                }
                else{  
                    $quarter_name    = $quarter_name.','.$quarter_pool->quarter_name; 
                }
                    $i++;
            }  

            $perspective            = htmlentities($request->get('perspective_edit')); 
            $remark                 = htmlentities($request->get('remark_perspective_edit'));

            $checks = Ckpi_perspectives::where('app_id','=',$app_id) 
                ->where('perspective_group','=',$group_name)
                ->where('perspective_quarter','=',$quarter_name)
                ->where('perspective_perspective','=',$perspective)
                ->get();
                
            if(count($checks) > 0){

                return back()->with('perspective_duplicated', 'Perspective already exists in the list.'); 

            } else {

                $perspectives = Ckpi_perspectives::where('id',$perspective_id)
                        ->update(
                                    [      
                                        'quarter_id'                    => $quarter,
                                        'group_id'                      => $group,
                                        'perspective_group'             => $group_name,
                                        'perspective_quarter'           => $quarter_name,
                                        'perspective_perspective'       => $perspective, 
                                        'perspective_updated_status'    => 'Y', 
                                        'perspective_updated_count'     => DB::raw('perspective_updated_count+1'), 
                                        'perspective_updated_by_name'   => strtoupper($staff_name), 
                                        'perspective_updated_by_email'  => $email, 
                                        'perspective_updated_by_date'   => Carbon::Now(), 
                                        'perspective_updated_remark'    => $remark 
                                    ]
                    );  

                return back()->with('perspective_edited', 'Perspective updated.'); 

            }  

            

        }

        public function deletePerspective(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $app_id                 = htmlentities($request->get('application_id')); 

            $check_indicators = Ckpi_assignees::where('app_id','=',$app_id )  
                ->get();
                 
            if(count($check_indicators) > 0){

                // return back()->with('indicator_existed', 'Indicator already existed. You cannot add/delete perspective just like that. You need to clear all indicator first, only then new perspective can be created.');
                return json_encode(false);

            } else {

                if(empty($request->get('selection'))){
                    return json_encode(false);
                } else { 
                    $selects = $request->get('selection');
                    foreach($selects as $select){ 
                        $perspectives = Ckpi_perspectives::where('id',$select)
                            ->delete(); 
    
                        $indicators = Ckpi_indicators::where('perspective_id',$select)
                            ->delete();
                    }
                    return json_encode(true);
                } 
            }

        }
    // Perspective

    // Indicator
        public function indicator(Request $request){

            $ils = Ckpi_ils::orderBy('il_id','asc')
                        ->get();
            return json_encode($ils);

        }

        public function groupList_groups(Request $request){ 

            $app_id             = htmlentities($request->get('app_id'));

            $groups = Ckpi_perspectives::select('group_id','app_id','perspective_group')
            ->groupBy('group_id','app_id','perspective_group') 
            ->where('app_id','=',$app_id)  
            ->get();
            return json_encode($groups);

        }

        public function perspectiveList_perspectives(Request $request){ 

            $group_id             = htmlentities($request->get('group_id'));
            $app_id             = htmlentities($request->get('app_id'));

            $perspectives = Ckpi_perspectives::where('group_id','=',$group_id)   
            ->where('app_id','=',$app_id)   
            ->get();
            return json_encode($perspectives);

        }

        public function addIndicator(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $app_id                 = htmlentities($request->get('app_id_indicator_add'));
            
            // Group
                // Get Group Name
                    $group_id          = htmlentities($request->get('group_indicator_add')); 
                    $group_pools = Ckpi_groups::where('id','=',$group_id )  
                        ->get();
                          
                    $i               = 0; 
                    $group_name              = '';  
                    foreach ($group_pools as $group_pool) { 
                        if($i==0){  
                            $group_name    = $group_pool->group_name; 
                        }
                        else{  
                            $group_name    = $group_name.','.$group_pool->group_name; 
                        }
                            $i++;
                    } 
                // Get Group Name
                
                // Get Perspective Name
                    $perspective_id    = htmlentities($request->get('perspective_indicator_add')); 
                    $perspective_pools = Ckpi_perspectives::where('id','=',$perspective_id )  
                        ->get();
                          
                    $i               = 0; 
                    $perspective_perspective              = '';  
                    foreach ($perspective_pools as $perspective_pool) { 
                        if($i==0){  
                            $perspective_perspective    = $perspective_pool->perspective_perspective; 
                        }
                        else{  
                            $perspective_perspective    = $perspective_perspective.','.$perspective_pool->perspective_perspective; 
                        }
                            $i++;
                    } 
                // Get Perspective Name
                
                $indicator                  = htmlentities($request->get('indicator_add')); 
                $remark                     = htmlentities($request->get('remark_indicator_add')); 

                $qls_pools = Ckpi_qls::get();
                      
                if(count($qls_pools) > 0){
                    foreach($qls_pools as $qls_pool){  

                        $indicators = Ckpi_indicators::insertGetId(
                            [     
                                'quarter_id'                    => $qls_pool->ql_id,
                                'perspective_id'                => $perspective_id, 
                                'group_id'                      => $group_id,
                                'app_id'                        => $app_id,
                                'indicator_quarter'             => $qls_pool->ql_value,
                                'indicator_perspective'         => $perspective_perspective, 
                                'indicator_group'               => $group_name,
                                'indicator_indicator'           => $indicator, 
                                'indicator_completed'           => 'N', 
                                'indicator_created_by_name'     => strtoupper($staff_name),
                                'indicator_created_by_email'    => $email,
                                'indicator_created_by_date'     => Carbon::Now(),
                                'indicator_created_remark'      => $remark,
                                'indicator_updated_status'      => 'N',
                                'indicator_updated_count'       => '0',
                                'indicator_updated_by_name'     => '',
                                'indicator_updated_by_email'    => '',     
                                'indicator_updated_by_date'     => null,
                                'indicator_updated_remark'      => ''  
                            ]
                        );    

                        $kpi_owner_semails_1             = $request->input('kpi_owner_indicator_add');  

                        $main_target_type              = htmlentities($request->get('target_indicator_add'));
                        $target_number                 = htmlentities($request->get('number_indicator_add'));
                        $target_percentage             = htmlentities($request->get('percentage_indicator_add'));
                        $target_text                   = htmlentities($request->get('text_indicator_add'));
                        $weightage                     = htmlentities($request->get('weightage_indicator_add'));

                        // To get Bank Rep Name
                            $kpi_owner_semails = explode("|", $kpi_owner_semails_1); 
                            $arr = array();
                            foreach ($kpi_owner_semails as $kpi_owner_semail_new) { 
                            
                                $result = LifeXcessController::semail($kpi_owner_semail_new); 
                                
                                $kpi_owner_staffno = "";
                                $kpi_owner_name = "";
                                $kpi_owner_email    = ""; 
                                foreach($result as $ass){ 
                                    $kpi_owner_staffno = $ass->STAFFNO;
                                    $kpi_owner_name = $ass->STAFFNAME;
                                    $kpi_owner_email = $ass->SEMAIL; 
                                } 

                                $assignees = Ckpi_assignees::insertGetId(
                                    [      
                                        'indicator_id'              => $indicators,
                                        'perspective_id'            => $perspective_id,
                                        'quarter_id'                => $qls_pool->ql_id,
                                        'group_id'                  => $group_id,
                                        'app_id'                    => $app_id,
                                        'kpi_owner_staffno'         => $kpi_owner_staffno,
                                        'kpi_owner_name'            => $kpi_owner_name,
                                        'kpi_owner_email'           => $kpi_owner_email,
                                        'assignee_name'             => '',
                                        'assignee_email'            => '',
                                        'main_target_type'          => $main_target_type,
                                        'main_target'               => ''.$target_number.''.$target_percentage.''.$target_text.'',
                                        'ytd_target'                => '0',
                                        'ytd_achievement'           => '0',
                                        'achievement'               => '0',
                                        'rating'                    => '0',
                                        'weightage'                 => $weightage,
                                        'weightage_score'           => '0',
                                        'mof_achievement'           => '0',

                                        'table_type'                => '2', // Bank CKPI General
                                        'include_is'                => 'Y',
                                        'formula'                   => '1',
                                        'is_active'                 => 'N',
                                        'ordering_rating'           => 'ASCENDING',

                                        'assignee_completed'        => 'N',
                                        'assignee_created_by_name'  => strtoupper($staff_name),
                                        'assignee_created_by_email' => $email,
                                        'assignee_created_by_date'  => Carbon::Now(),
                                        'assignee_created_remark'   => $remark,
                                        'assignee_updated_status'   => 'N',
                                        'assignee_updated_count'    => '0',
                                        
                                        'assignee_approved_is'      => 'N',
                                        'mof_formula'               => '1',
                                        'mof_include'               => 'Y',
                                        'assign_is'                 => 'N',
                                        'approver'                  => 'N'
                                    ]
                                ); 

                                // ckpi_files
                                $files = Ckpi_files::insert(
                                    [      
                                        'assignee_id'                   => $assignees,
                                        'app_id'                        => $app_id,
                                        'filename'                      => '',
                                        'filename_extension'            => '',
                                        'filename_directory'            => '',
                                        'filename_category'             => '',
                                        'filename_folder'               => '',

                                        'uploaded_by_name'              => $staff_name,
                                        'uploaded_by_email'             => $email,
                                        'uploaded_by_date'              => Carbon::Now(),
                                        'uploaded_remark'               => 'Created via adding indicator',

                                        'uploaded_updated_status'       => 'N',
                                        'uploaded_updated_count'        => '0',
                                        'uploaded_updated_by_name'      => '',
                                        'uploaded_updated_by_email'     => '',
                                        'uploaded_updated_by_date'      => null,
                                        'uploaded_updated_remark'       => ''  
                                    ]
                                ); 
                                
                            }   
                        // To get Bank Rep Name

                    }
                } else { 
                }  

                return back()->with('indicator_added', 'New indicator added.');
            // Group
        }

        public function indicatorEditDelete(Request $request){

            $indicator_id             = htmlentities($request->get('indicator_id'));

            $indicators = Ckpi_indicators::where('id','=',$indicator_id)->get();
            return json_encode($indicators);

        }

        public function deleteIndicator(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            if(empty($request->get('selection2'))){
                return json_encode(false);
            } else { 
                $selects = $request->get('selection2');
                foreach($selects as $select){ 
                    $indicators = Ckpi_indicators::where('id',$select)
                        ->delete(); 
                }
                return json_encode(true);
            } 

            // $staff_name             = htmlentities($request->session()->get('staff_name'));
            // $email                  = htmlentities($request->session()->get('email'));

            // $indicator_id           = htmlentities($request->get('id_indicator_delete'));  

            // $indicators = DB::connection('oracle')->table('ckpi_indicators')
            //         ->where('id',$indicator_id)
            //         ->delete(); 
                    
            // $assignees = DB::connection('oracle')->table('ckpi_assignees')
            //         ->where('indicator_id',$indicator_id)
            //         ->delete();  

            // return back()->with('indicator_deleted', 'Indicator permanently deleted.'); 
            
        }
    // Indicator

    // Assignee
        public function updateAssignee(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $selects                    = $request->input('assignee_item_id_val');  

            $kpi_owner_staffnos_txt     = $request->input('kpi_owner_staffno');  // ID002471 
            $assignee_staffnos_txt      = $request->input('assignee_staffno');  // ID002471 

            $main_target                = $request->input('main_target'); 
            $weightage                  = $request->input('weightage');  

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

                        // echo $kpi_owner_name;
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

            foreach ($selects as $index => $select) {

                $assignees = Ckpi_assignees::whereIn('id',[$select])
                    ->update(
                                [      
                                    'kpi_owner_staffno'             => $kpi_owner_staffnos[$index],
                                    'kpi_owner_name'                => $kpi_owner_names[$index],
                                    'kpi_owner_email'               => $kpi_owner_semails[$index],
                                    
                                    'assignee_staffno'              => $assignee_staffnos[$index],
                                    'assignee_name'                 => $assignee_names[$index],
                                    'assignee_email'                => $assignee_semails[$index],
                                    'main_target'                   => $main_target[$index],
                                    'weightage'                     => $weightage[$index]
                                ]
                ); 

            }   

            return back()->with('info_updated', 'Information has been updated.');
            
        }
    // Assignee

    public function kpiowner(Request $request){

        // $row = LifeXcessController::L2_semua();
        $row = LifeXcessController::all_new();
        return json_encode($row, true);

    }

    public function assignee(Request $request){

        $row = LifeXcessController::all();
        return json_encode($row, true);

    }

    // Declare
        public function endorser(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = htmlentities($request->session()->get('email'));

            $row = LifeXcessController::endorser($semail);
            return json_encode($row, true);

        }

        public function declare(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $app_id                 = htmlentities($request->get('declare_id'));
            $staffno                = htmlentities($request->get('endorser_staffno')); // endorser staffno
            $remark                 = htmlentities($request->get('remark_declare')); // endorser staffno

            // Check if assignees exists or not
                $check_assignees = Ckpi_assignees::where('app_id','=',$app_id)->get();
                                
                if(count($check_assignees) > 0){

                    // Find Email Creator
                        $pool_apps = Ckpi_apps::where('id','=',$app_id)->get();
                             
                        $i                      = 0; 
                        $app_name               = '';

                        $app_created_by_name    = '';
                        $app_created_by_email   = ''; 

                        foreach ($pool_apps as $pool_app) { 
                            if($i==0){  
                                $app_name               = $pool_app->app_name;   
                                $app_created_by_name    = $pool_app->app_created_by_name;   
                                $app_created_by_email   = $pool_app->app_created_by_email;    
                            }
                            else{  
                                $app_name               = $app_name.','.$pool_app->app_name;  
                                $app_created_by_name    = $app_created_by_name.','.$pool_app->app_created_by_name;  
                                $app_created_by_email   = $app_created_by_email.','.$pool_app->app_created_by_email;    
                            }
                            $i++;
                        } 
                    // Find Email Creator

                    // Send
                        $app_endorser_by_name   = "";
                        $app_endorser_by_email  = "";

                        $app_endorser_by_name_db    = "";
                        $app_endorser_by_email_db   = "";

                        $result                 = LifeXcessController::staffno($staffno);
                        foreach($result as $res){
                            $app_endorser_by_name       = $res->STAFFNAME;
                            $app_endorser_by_email      = $insert_text.''.$res->SEMAIL;

                            $app_endorser_by_name_db    = $res->STAFFNAME;
                            $app_endorser_by_email_db   = $res->SEMAIL;
                        }
                    
                        $result = EmailController::adminDeclare($semail,$staff_name,$app_endorser_by_email,$app_endorser_by_name,$app_name);
                        if(!$result) {   
                            return back()->with('email_failed', 'SMTP email failed.');           
                        } else {

                            $applications = Ckpi_apps::where('id',$app_id)
                                ->update(
                                    [
                                        'app_status'            => 'ENDORSED', 
                                        'app_stage'             => '2',
                                        
                                        'app_submitted_is'      => 'Y',
                                        'app_submitted_by_name' => $app_created_by_name,
                                        'app_submitted_by_email'=> $app_created_by_email,
                                        'app_submitted_by_date' => Carbon::Now(),
                                        'app_submitted_remark'  => $remark,

                                        'app_endorsed_is'       => 'N',
                                        'app_endorsed_by_name'  => $app_endorser_by_name_db,
                                        'app_endorsed_by_email' => $app_endorser_by_email_db,
                                        'app_endorsed_by_date'  => Carbon::Now(),
                                        'app_endorsed_remark'   => ''  
                                    ]
                                );

                            // Check Quarter
                                $checks = Ckpi_apps::where('id',$app_id)
                                    ->get();
                                   
                                if(count($checks) > 0){

                                    $q1 = "";
                                    $q2 = "";
                                    $q3 = "";
                                    $q4 = "";

                                    foreach($checks as $check){

                                        $q1 = $check->q1;
                                        $q2 = $check->q2;
                                        $q3 = $check->q3;
                                        $q4 = $check->q4;

                                    }

                                    if($q1 == 'N'){

                                        $apps = Ckpi_apps::where('id',$app_id) 
                                            ->update(
                                                [
                                                    'q1'             => 'Y'   
                                                ]
                                            );

                                        $assignees = Ckpi_assignees::where('app_id',$app_id)
                                            ->where('quarter_id','=','1') 
                                            ->update(
                                                [
                                                    'is_active'             => 'Y'   
                                                ]
                                            );

                                    } else {

                                        if($q2 == 'N'){

                                            $apps = Ckpi_apps::where('id',$app_id) 
                                                ->update(
                                                    [
                                                        'q2'             => 'Y'   
                                                    ]
                                                );

                                            $assignees = Ckpi_assignees::where('app_id',$app_id)
                                                ->where('quarter_id','=','2') 
                                                ->update(
                                                    [
                                                        'is_active'             => 'Y'   
                                                    ]
                                                );

                                        } else {

                                            if($q3 == 'N'){

                                                $apps = Ckpi_apps::where('id',$app_id) 
                                                    ->update(
                                                        [
                                                            'q3'             => 'Y'   
                                                        ]
                                                    );

                                                $assignees = Ckpi_assignees::where('app_id',$app_id)
                                                    ->where('quarter_id','=','3') 
                                                    ->update(
                                                        [
                                                            'is_active'             => 'Y'   
                                                        ]
                                                    );

                                            } else {

                                                if($q4 == 'N'){

                                                    $apps = Ckpi_apps::where('id',$app_id) 
                                                        ->update(
                                                            [
                                                                'q4'             => 'Y'   
                                                            ]
                                                        );

                                                    $assignees = Ckpi_assignees::where('app_id',$app_id)
                                                        ->where('quarter_id','=','4') 
                                                        ->update(
                                                            [
                                                                'is_active'             => 'Y'   
                                                            ]
                                                        );

                                                } else {} 

                                            } 
                                        } 
                                    } 
                                } else {} 
                            // Check Quarter

                            return redirect('/home')->with('admin_declare', 'Corporate KPI successfully submitted to endorser for review.');

                        } 
                    // Send

                } else {

                    return back()->with('assignee_empty', 'Please register your indicator before submit to endorser.');

                }
            // Check if assignees exists or not

        }

        public function rework(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $app_id                 = htmlentities($request->get('declare_id'));
            $staffno                = htmlentities($request->get('endorser_staffno')); // Email Address
            $remark                 = htmlentities($request->get('remark_declare')); // endorser staffno

            // Check if assignees exists or not
                $check_assignees = Ckpi_assignees::where('app_id','=',$app_id)
                            ->get();
                           
                if(count($check_assignees) > 0){

                    // Find Email Creator
                            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                            ->get();
                             
                        $i                              = 0; 
                        $app_name                       = '';

                        $app_created_by_name            = '';
                        $app_created_by_email           = ''; 

                        foreach ($pool_apps as $pool_app) { 
                            if($i==0){  
                                $app_name               = $pool_app->app_name;   
                                $app_created_by_name    = $pool_app->app_created_by_name;   
                                $app_created_by_email   = $pool_app->app_created_by_email;    
                            }
                            else{  
                                $app_name               = $app_name.','.$pool_app->app_name;  
                                $app_created_by_name    = $app_created_by_name.','.$pool_app->app_created_by_name;  
                                $app_created_by_email   = $app_created_by_email.','.$pool_app->app_created_by_email;    
                            }
                            $i++;
                        } 
                    // Find Email Creator 

                    // Send
                        $app_endorser_by_name   = "";
                        $app_endorser_by_email  = "";

                        $app_endorser_by_name_db    = "";
                        $app_endorser_by_email_db   = "";

                        $result                 = LifeXcessController::semail($staffno);
                        foreach($result as $res){
                            $app_endorser_by_name       = $res->STAFFNAME;
                            $app_endorser_by_email      = $insert_text.''.$res->SEMAIL;

                            $app_endorser_by_name_db    = $res->STAFFNAME;
                            $app_endorser_by_email_db   = $res->SEMAIL;
                        }

                        // echo ''.$app_endorser_by_name_db.'<br/>';
                        // echo ''.$app_endorser_by_email_db.'<br/>';
                        // exit;
                
                        $result = EmailController::adminRework($semail,$staff_name,$app_endorser_by_email,$app_endorser_by_name,$app_name);
                        if(!$result) {   
                            return back()->with('email_failed', 'SMTP email failed.');           
                        } else {

                            $applications = Ckpi_apps::where('id',$app_id)
                                ->update(
                                    [
                                        'app_status'            => 'ENDORSED', 
                                        'app_stage'             => '2', 

                                        'app_updated_status'    => 'Y',
                                        'app_updated_count'     => DB::raw('app_updated_count+1'),
                                        'app_updated_by_name'   => $app_created_by_name,
                                        'app_updated_by_email'  => $app_created_by_email,
                                        'app_updated_by_date'   => Carbon::Now(),
                                        'app_updated_remark'    => $remark,

                                        'app_endorsed_is'       => 'N',
                                        'app_endorsed_by_name'  => $app_endorser_by_name_db,
                                        'app_endorsed_by_email' => $app_endorser_by_email_db,
                                        'app_endorsed_by_date'  => Carbon::Now(),
                                        'app_endorsed_remark'   => ''  
                                    ]
                                ); 

                            return redirect('/home')->with('admin_rework', 'Corporate KPI successfully submitted to endorser for review [rework].');

                        } 
                    // Send

                } else {

                    return back()->with('assignee_empty', 'Please register your indicator before submit to endorser.');
                    
                }
            // Check if assignees exists or not

            
        }
    // Declare    

}
