<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Ckpi_gls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GroupListController extends Controller
{
    public function index(Request $request){
       
        $gls = Ckpi_gls::orderBy('gl_id','asc')
            ->get();
           // ->toArray();

        return view('maintenances.ckpis.group',
                [
                    'gls'      => $gls
                ]
            );

    }

    public function add(Request $request){

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));  

        $name                   = htmlentities($request->get('name_add_new'));
        $description            = htmlentities($request->get('description_add'));
        $remark                 = htmlentities($request->get('remark_add'));  
 
        $checks = Ckpi_gls::where('gl_value','=',$name)
            ->get();
           // ->toArray();
        if(count($checks) > 0){

            return back()->with('group_duplicated', 'Group name already exists in the list.'); 

        } else {

            $gls = Ckpi_gls::insert(
                [    
                    'gl_value'               => strtoupper($name),
                    'gl_description'         => $description,
                    'gl_created_by_name'     => strtoupper($staff_name), 
                    'gl_created_by_email'    => $email,
                    'gl_created_by_date'     => Carbon::Now(),
                    'gl_created_remark'      => $remark,
                    'gl_updated_status'      => 'N',
                    'gl_updated_count'       => '0' 
                ]
            );
            return back()->with('group_added', 'New group registered.'); 

        } 
    }

    public function fetch(Request $request){

        $gl_id             = htmlentities($request->get('gl_id'));

        $gls = Ckpi_gls::where('gl_id','=',$gl_id)
                    ->get();
        return json_encode($gls);
    }

    public function edit(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $gl_id                  = htmlentities($request->get('id_edit'));
        $name                   = htmlentities($request->get('name_edit_new'));
         
        $description            = htmlentities($request->get('description_edit')); 
        $remark                 = htmlentities($request->get('remark_edit'));  

        $gls = Ckpi_gls::where('gl_id',$gl_id)
                    ->update(
                                [   
                                    'gl_value'               => strtoupper($name),
                                    'gl_description'         => $description, 
                                    'gl_updated_status'      => 'Y', 
                                    'gl_updated_count'       => DB::raw('gl_updated_count+1'), 
                                    'gl_updated_by_name'     => strtoupper($staff_name), 
                                    'gl_updated_by_email'    => $email,
                                    'gl_updated_by_date'     => Carbon::Now(),
                                    'gl_updated_remark'      => $remark 
                                ]
                );  
        return back()->with('group_edited', 'Group updated.'); 
    }

    public function delete(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $gl_id                = htmlentities($request->get('id_delete')); 

        $gls = Ckpi_gls::where('gl_id',$gl_id)
                    ->delete();  
        return back()->with('group_deleted', 'Group deleted.'); 
    }
}
