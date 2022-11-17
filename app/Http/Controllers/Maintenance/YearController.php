<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Years;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class YearController extends Controller
{
    public function index(Request $request){
       
        $years = Years::orderBy('year_id','asc')
            ->get();
            //->toArray();

        return view('maintenances.ckpis.year',
                [
                    'years'      => $years
                ]
            );

    }

    public function add(Request $request){

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));  

        $name                   = htmlentities($request->get('name_add'));
        $description            = htmlentities($request->get('description_add'));
        $remark                 = htmlentities($request->get('remark_add'));  
 
        $checks = Years::where('year_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('year_duplicated', 'Year name already exists in the list.'); 

        } else {

            $years = Years::insert(
                [    
                    'year_value'               => strtoupper($name),
                    'year_description'         => $description,
                    'year_created_by_name'     => strtoupper($staff_name), 
                    'year_created_by_email'    => $email,
                    'year_created_by_date'     => Carbon::Now(),
                    'year_created_remark'      => $remark,
                    'year_updated_status'      => 'N',
                    'year_updated_count'       => '0' 
                ]
            );
            return back()->with('year_added', 'New year registered.'); 

        } 
    }

    public function fetch(Request $request){

        $year_id             = htmlentities($request->get('year_id'));

        $years = Years::where('year_id','=',$year_id)
                    ->get();
        return json_encode($years);
    }

    public function edit(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $year_id               = htmlentities($request->get('id_edit'));
        $name                   = htmlentities($request->get('name_edit')); 
        $description            = htmlentities($request->get('description_edit')); 
        $remark                 = htmlentities($request->get('remark_edit')); 
        
        $checks = Years::where('year_value','=',$name)
            ->get();
            //->toArray();
        if(count($checks) > 0){

            return back()->with('year_duplicated', 'Year name already exists in the list.'); 

        } else {

            $years = Years::where('year_id',$year_id)
                    ->update(
                                [   
                                    'year_value'               => strtoupper($name),
                                    'year_description'         => $description, 
                                    'year_updated_status'      => 'Y', 
                                    'year_updated_count'       => DB::raw('year_updated_count+1'), 
                                    'year_updated_by_name'     => strtoupper($staff_name), 
                                    'year_updated_by_email'    => $email,
                                    'year_updated_by_date'     => Carbon::Now(),
                                    'year_updated_remark'      => $remark 
                                ]
                );  
            return back()->with('year_edited', 'Year updated.'); 

        } 
        
    }

    public function delete(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $year_id                = htmlentities($request->get('id_delete')); 

        $years = Years::where('year_id',$year_id)
                    ->delete();  
        return back()->with('year_deleted', 'Year deleted.'); 
    }
}
