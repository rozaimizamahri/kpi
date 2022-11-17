<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_perspectives;
use App\Models\Ckpi_indicators;
use App\Models\Ckpi_groups;
use App\Models\Ckpi_files;
use App\Models\Ckpi_pls;
use App\Models\Ckpi_gls;
use App\Models\Ckpi_assignees;
use App\Models\Years;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ListingController extends Controller
{ 
    public function ckpi_list(Request $request){

        $applications = Ckpi_apps::orderBy('id','desc')
            ->get();
            //->toArray();
                
        return view('lists.list',
                    [
                        'applications'              => $applications 
                            
                    ]
                );
    }

    public function ckpi_fetch_year(Request $request){
                
        $years = Years::orderBy('year_id','asc')
                    ->get();
        return json_encode($years);

    }

    public function ckpi_add(Request $request){
        
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $name                   = htmlentities($request->get('name_add'));
        $year                   = htmlentities($request->get('year_add'));
        $remark                 = htmlentities($request->get('remark_add'));

        $checks = Ckpi_apps::where('app_year','=',$year)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('list_duplicated', 'Year already exists in the list.'); 

        } else {

            // Applications
                $applications = Ckpi_apps::insertGetId(
                    [  
                        'app_name'              => $name,
                        'app_status'            => 'DRAFT',
                        'app_stage'             => '1',
                        'app_year'              => $year,  
                        'app_created_by_name'   => strtoupper($staff_name), 
                        'app_created_by_email'  => $email,
                        'app_created_by_date'   => Carbon::Now(),
                        'app_created_remark'    => $remark,
                        'app_updated_status'    => 'N',
                        'app_updated_count'     => '0',
                        'app_submitted_is'      => 'N',
                        'app_endorsed_is'       => 'N',
                        'app_assigned_is'       => 'N',
                        'app_assessment_is'     => 'N',
                        'app_checked_is'        => 'N',
                        'app_reviewed_is'       => 'N',
                        'app_approved_is'       => 'N',
                        'q1'                    => 'N',
                        'q2'                    => 'N',
                        'q3'                    => 'N',
                        'q4'                    => 'N',
                        'app_module_access'     => 'CKPI',
                        'q1_final'              => 'N',
                        'q2_final'              => 'N',
                        'q3_final'              => 'N',
                        'q4_final'              => 'N'

                    ]
                );
            // Applications

            // Groups 
                $gls = Ckpi_gls::get();
                    //->toArray();
                if(count($gls) > 0){ 
                    foreach($gls as $gl){  
                        $groups = Ckpi_groups::insertGetId(
                            [   
                                'app_id'                 => $applications,
                                'group_name'             => $gl->gl_value,
                                'group_created_by_name'  => strtoupper($staff_name), 
                                'group_created_by_email' => $email,
                                'group_created_by_date'  => Carbon::Now(),
                                'group_created_remark'   => 'created via create list',
                                'group_updated_status'   => 'N',
                                'group_updated_count'    => '0'    
                            ]
                        ); 

                        // Perspectives
                            $pls = Ckpi_pls::get();
                              //  ->toArray();
                            if(count($pls) > 0){

                                foreach($pls as $pl){
                                    
                                    $perspectives = Ckpi_perspectives::insertGetId(
                                        [     
                                            'group_id'                      => $groups,
                                            'app_id'                        => $applications,
                                            'perspective_group'             => $gl->gl_value, 
                                            'perspective_perspective'       => $pl->pl_value,
                                            'perspective_created_by_name'   => strtoupper($staff_name),
                                            'perspective_created_by_email'  => $email,
                                            'perspective_created_by_date'   => Carbon::Now(),
                                            'perspective_created_remark'    => 'created via create list application',
                                            'perspective_updated_status'    => 'N',
                                            'perspective_updated_count'     => '0'    
                                        ]
                                    );

                                }

                            } else {}
                        // Perspectives 

                    } 
                } else {} 
            // Groups 

            return back()->with('list_added', 'New Corporate KPI registered.'); 

        }  

    }

    public function ckpi_fetch(Request $request){
        
        $app_id                 = htmlentities($request->get('app_id')); 

        $apps = Ckpi_apps::where('id','=',$app_id)
            ->get();

        return json_encode($apps);
         
    }

    public function ckpi_delete(Request $request){
        
        $app_id               = htmlentities($request->get('id_delete'));   

        $apps = Ckpi_apps::where('id',$app_id)
                    ->delete();  

        $groups = Ckpi_groups::where('app_id',$app_id)
                    ->delete();

        $perspectives = Ckpi_perspectives::where('app_id',$app_id)
                    ->delete();

        $indicators = Ckpi_indicators::where('app_id',$app_id)
                    ->delete();

        $assignees = Ckpi_assignees::where('app_id',$app_id)
                    ->delete();

        $files = Ckpi_files::where('app_id',$app_id)
                    ->delete();

        return back()->with('list_deleted', 'Corporate KPI successfully deleted.');
         
    } 
}
