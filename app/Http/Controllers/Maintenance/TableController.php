<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Ckpi_tl_apps;
use App\Models\Ckpi_tl_values;
use App\Models\Ckpi_gls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TableController extends Controller
{
    // Index
        public function index(Request $request){
        
            $tables = Ckpi_tl_apps::select( 
                                
                            'ckpi_tl_apps.*', 
                            'ckpi_gls.gl_value'
                    
                )    
                ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                ->orderBy('ckpi_tl_apps.id','desc')
                ->get();

            // echo '<pre>';
            // print_r($tables);
            // echo '</pre>';
            // exit;

            return view('maintenances.ckpis.table',
                    [
                        'tables'      => $tables
                    ]
                );

        }

        public function fetch_groups(Request $request){
                    
            $gls = Ckpi_gls::orderBy('gl_id','asc')
                        ->get();
            return json_encode($gls);

        }

        public function add(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));  

            $group                  = htmlentities($request->get('group_add'));
            $name                   = htmlentities($request->get('name_add_new'));
            $description            = htmlentities($request->get('description_add'));
            $remark                 = htmlentities($request->get('remark_add'));  
    
            $checks = Ckpi_tl_apps::where('tl_group','=',$group)
                ->where('tl_value','=',$name)
                ->get();
                //->toArray();
            if(count($checks) > 0){

                return back()->with('table_duplicated', 'Group already exists in the list.'); 

            } else {

                $tl_apps = Ckpi_tl_apps::insertGetId(
                    [    
                        'tl_group'               => $group,
                        'tl_value'               => strtoupper($name),
                        'tl_description'         => $description,
                        'tl_created_by_name'     => strtoupper($staff_name), 
                        'tl_created_by_email'    => $email,
                        'tl_created_by_date'     => Carbon::Now(),
                        'tl_created_remark'      => $remark,
                        'tl_updated_status'      => 'N',
                        'tl_updated_count'      => '0' 
                    ]
                );


                // Rating 1
                    $tl_values_1 = Ckpi_tl_values::insert(
                        [   
                            'tl_id'                 => $tl_apps,
                            'tlv_rating'            => '1',
                            'tlv_value'             => '0.00',
                            'tlv_description'       => 'Auto created',
                            'tlv_created_by_name'   => $staff_name,
                            'tlv_created_by_email'  => $email,
                            'tlv_created_by_date'   => Carbon::Now(),
                            'tlv_created_remark'    => '' 
                        ]
                    );
                // Rating 1

                // Rating 2
                    $tl_values_2 = Ckpi_tl_values::insert(
                        [   
                            'tl_id'                 => $tl_apps,
                            'tlv_rating'            => '2',
                            'tlv_value'             => '0.00',
                            'tlv_description'       => 'Auto created',
                            'tlv_created_by_name'   => $staff_name,
                            'tlv_created_by_email'  => $email,
                            'tlv_created_by_date'   => Carbon::Now(),
                            'tlv_created_remark'    => '' 
                        ]
                    );
                // Rating 2

                // Rating 3
                    $tl_values_3 = Ckpi_tl_values::insert(
                        [   
                            'tl_id'                 => $tl_apps,
                            'tlv_rating'            => '3',
                            'tlv_value'             => '0.00',
                            'tlv_description'       => 'Auto created',
                            'tlv_created_by_name'   => $staff_name,
                            'tlv_created_by_email'  => $email,
                            'tlv_created_by_date'   => Carbon::Now(),
                            'tlv_created_remark'    => '' 
                        ]
                    );
                // Rating 3

                // Rating 4
                    $tl_values_4 = Ckpi_tl_values::insert(
                        [   
                            'tl_id'                 => $tl_apps,
                            'tlv_rating'            => '4',
                            'tlv_value'             => '0.00',
                            'tlv_description'       => 'Auto created',
                            'tlv_created_by_name'   => $staff_name,
                            'tlv_created_by_email'  => $email,
                            'tlv_created_by_date'   => Carbon::Now(),
                            'tlv_created_remark'    => '' 
                        ]
                    );
                // Rating 4

                // Rating 5
                    $tl_values_4 = Ckpi_tl_values::insert(
                        [   
                            'tl_id'                 => $tl_apps,
                            'tlv_rating'            => '5',
                            'tlv_value'             => '0.00',
                            'tlv_description'       => 'Auto created',
                            'tlv_created_by_name'   => $staff_name,
                            'tlv_created_by_email'  => $email,
                            'tlv_created_by_date'   => Carbon::Now(),
                            'tlv_created_remark'    => '' 
                        ]
                    );
                // Rating 5 


                return back()->with('table_added', 'New table registered.'); 

            } 
        }

        public function fetch(Request $request){

            $tl_id             = htmlentities($request->get('tl_id'));

            $tl_apps = Ckpi_tl_apps::where('id','=',$tl_id)
                        ->get();
            return json_encode($tl_apps);
        }

        public function edit(Request $request){
    
            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));
    
            $tl_id                  = htmlentities($request->get('id_edit'));
            $group                  = htmlentities($request->get('group_edit')); 
            $name                   = htmlentities($request->get('name_edit_new')); 
            $description            = htmlentities($request->get('description_edit')); 
            $remark                 = htmlentities($request->get('remark_edit')); 
            
            $checks = Ckpi_tl_apps::where('tl_group','=',$group)
                ->where('tl_value','=',$name)
                ->get();
                //->toArray();
            if(count($checks) > 0){

                return back()->with('table_duplicated', 'Table name already exists in the list.'); 

            } else {

                $tl_apps = Ckpi_tl_apps::where('id',$tl_id)
                        ->update(
                                    [   
                                        'tl_group'               => $group,
                                        'tl_value'               => strtoupper($name),
                                        'tl_description'         => $description, 
                                        'tl_updated_status'      => 'Y', 
                                        'tl_updated_count'       => DB::raw('tl_updated_count+1'), 
                                        'tl_updated_by_name'     => strtoupper($staff_name), 
                                        'tl_updated_by_email'    => $email,
                                        'tl_updated_by_date'     => Carbon::Now(),
                                        'tl_updated_remark'      => $remark 
                                    ]
                    );  
                return back()->with('table_edited', 'Table updated.'); 

            } 
            
        }

        public function delete(Request $request){
    
            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));
    
            $tl_id                = htmlentities($request->get('id_delete')); 

            $tl_apps = Ckpi_tl_apps::where('id',$tl_id)
                        ->delete();  

            $tl_values = Ckpi_tl_values::where('tl_id',$tl_id)
                        ->delete();  

            return back()->with('table_deleted', 'Table deleted.'); 
        }
    // Index

    // View
        public function table(Request $request, $appId){

            $tl_apps = Ckpi_tl_apps::select(
                     
                                    
                                        'ckpi_tl_apps.*',
                                        'ckpi_tl_apps.id as tl_app_item_id',

                                        'ckpi_tl_values.*', 
                                        'ckpi_tl_values.id as tl_value_item_id',

                                        'ckpi_gls.*'
                                    
                        
                    )     
                    ->join('ckpi_tl_values','ckpi_tl_apps.id','=','ckpi_tl_values.tl_id')
                    // ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_id')
                    ->join('ckpi_gls','ckpi_tl_apps.tl_group','=','ckpi_gls.gl_value')
                    ->where('ckpi_tl_apps.id','=',$appId)
                    ->orderBy('ckpi_tl_values.id','asc')
                    ->get();
                    //->toArray();

            // echo '<pre>';
            // print_r($tl_apps);
            // echo '</pre>';
            // exit;

            if(count($tl_apps) > 0){ 

                return view('maintenances.ckpis.table_view',
                        [
                            'tl_apps'              => $tl_apps 
                                
                        ]
                    );

            } else {

                return redirect('home');

            }
        }

        public function updateTables(Request $request){

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $email                  = htmlentities($request->session()->get('email'));

            $tl_value_ids           = $request->input('tl_value_id');  
            $tlv_value              = $request->input('tlv_value');       

            foreach ((array) $tl_value_ids as $index => $select) {

                $tl_values = Ckpi_tl_values::where('id',$tl_value_ids[$index])
                        ->update(
                                [       
                                    'tlv_value'             => $tlv_value[$index],
                                    // 'tlv_value_from'        => $tlv_value_from[$index],
                                    // 'tlv_value_to'          => $tlv_value_to[$index],
                                    'tlv_updated_status'    => 'Y',
                                    'tlv_updated_count'     => DB::raw("tlv_updated_count+1"),
                                    'tlv_updated_by_name'   => $staff_name,
                                    'tlv_updated_by_email'  => $email,
                                    'tlv_updated_by_date'   => Carbon::Now(),
                                    'tlv_updated_remark'    => '',
                                ]
                         ); 

            } 

            return json_encode(true); 
            
        }
    // View
}
