<?php

namespace App\Http\Controllers\Maintenance;


use App\Models\Ckpi_ils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class IndicatorListController extends Controller
{
    public function index(Request $request){
       
        $ils = Ckpi_ils::orderBy('il_id','asc')
            ->get();
            //->toArray();

        return view('maintenances.ckpis.indicator',
                [
                    'ils'      => $ils
                ]
            );

    }

    public function add(Request $request){

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));  

        // $name                   = htmlentities($request->get('name_add')); 
        $name                   = htmlentities($request->get('name_add_new')); 


        $description            = htmlentities($request->get('description_add'));
        $remark                 = htmlentities($request->get('remark_add'));  
 
        $checks = Ckpi_ils::where('il_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('indicator_duplicated', 'Indicator name already exists in the list.'); 

        } else {

            $ils = Ckpi_ils::insert(
                [    
                    'il_value'               => $name,
                    'il_description'         => $description,
                    'il_created_by_name'     => strtoupper($staff_name), 
                    'il_created_by_email'    => $email,
                    'il_created_by_date'     => Carbon::Now(),
                    'il_created_remark'      => $remark,
                    'il_updated_status'      => 'N',
                    'il_updated_count'       => '0' 
                ]
            );
            return back()->with('indicator_added', 'New indicator registered.'); 

        } 
    }

    public function fetch(Request $request){

        $il_id             = htmlentities($request->get('il_id'));

        $ils = Ckpi_ils::where('il_id','=',$il_id)
                    ->get();
        return json_encode($ils);
    }

    public function edit(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $il_id                  = htmlentities($request->get('id_edit')); 
        $name                   = htmlentities($request->get('name_edit_new'));  

        $description            = htmlentities($request->get('description_edit')); 
        $remark                 = htmlentities($request->get('remark_edit'));  

        $checks = Ckpi_ils::where('il_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('indicator_duplicated', 'Indicator name already exists in the list.'); 

        } else {

            $ils = Ckpi_ils::where('il_id',$il_id)
                    ->update(
                                [   
                                    'il_value'               => $name,
                                    'il_description'         => $description, 
                                    'il_updated_status'      => 'Y', 
                                    'il_updated_count'       => DB::raw('il_updated_count+1'), 
                                    'il_updated_by_name'     => strtoupper($staff_name), 
                                    'il_updated_by_email'    => $email,
                                    'il_updated_by_date'     => Carbon::Now(),
                                    'il_updated_remark'      => $remark 
                                ]
                );  
            return back()->with('indicator_edited', 'Indicator updated.'); 
        }

        
    }

    public function delete(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $il_id                = htmlentities($request->get('id_delete')); 

        $ils = Ckpi_ils::where('il_id',$il_id)
                    ->delete();  
        return back()->with('indicator_deleted', 'Indicator deleted.'); 
    }
}
