<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Ckpi_pls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PerspectiveListController extends Controller
{
    public function index(Request $request){
       
        $pls = Ckpi_pls::orderBy('pl_id','asc')
            ->get();
            //->toArray();

        return view('maintenances.ckpis.perspective',
                [
                    'pls'      => $pls
                ]
            );

    }

    public function add(Request $request){

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));  

        $name                   = htmlentities($request->get('name_add_new'));
        $description            = htmlentities($request->get('description_add'));
        $remark                 = htmlentities($request->get('remark_add'));  
 
        $checks = Ckpi_pls::where('pl_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('perspective_duplicated', 'Perspective name already exists in the list.'); 

        } else {

            $pls = Ckpi_pls::insert(
                [    
                    'pl_value'               => strtoupper($name),
                    'pl_description'         => $description,
                    'pl_created_by_name'     => strtoupper($staff_name), 
                    'pl_created_by_email'    => $email,
                    'pl_created_by_date'     => Carbon::Now(),
                    'pl_created_remark'      => $remark,
                    'pl_updated_status'      => 'N',
                    'pl_updated_count'       => '0' 
                ]
            );
            return back()->with('perspective_added', 'New perspective registered.'); 

        } 
    }

    public function fetch(Request $request){

        $pl_id             = htmlentities($request->get('pl_id'));

        $pls = Ckpi_pls::where('pl_id','=',$pl_id)
                    ->get();
        return json_encode($pls);
    }

    public function edit(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $pl_id                  = htmlentities($request->get('id_edit'));
        $name                   = htmlentities($request->get('name_edit_new'));
         
        $description            = htmlentities($request->get('description_edit')); 
        $remark                 = htmlentities($request->get('remark_edit'));  

        $checks = Ckpi_pls::where('pl_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('perspective_duplicated', 'Perspective name already exists in the list.'); 

        } else {

            $pls = Ckpi_pls::where('pl_id',$pl_id)
                    ->update(
                                [   
                                    'pl_value'               => strtoupper($name),
                                    'pl_description'         => $description, 
                                    'pl_updated_status'      => 'Y', 
                                    'pl_updated_count'       => DB::raw('pl_updated_count+1'), 
                                    'pl_updated_by_name'     => strtoupper($staff_name), 
                                    'pl_updated_by_email'    => $email,
                                    'pl_updated_by_date'     => Carbon::Now(),
                                    'pl_updated_remark'      => $remark 
                                ]
                );  
            return back()->with('perspective_edited', 'Perspective updated.'); 
        }

        
    }

    public function delete(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $pl_id                = htmlentities($request->get('id_delete')); 

        $pls = Ckpi_pls::where('pl_id',$pl_id)
                    ->delete();  
        return back()->with('perspective_deleted', 'Perspective deleted.'); 
    }
}
