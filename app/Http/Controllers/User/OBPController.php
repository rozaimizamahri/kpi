<?php

namespace App\Http\Controllers\User;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\LifeXcessController;

class OBPController extends Controller
{
    public function index(Request $request){
       
        $users = Users::whereNotIn('email_address', ['rozaimi.zamahri@smebank.com.my'])
            ->where('module_access','=','OBP')
            ->orderBy('user_id','desc')
            ->get();
           // ->toArray();

        return view('users.obp',
                [
                    'users'      => $users
                ]
            );

    }

    public function fetch(Request $request){

        $row = LifeXcessController::all();
        return json_encode($row, true);

    }

    public function add(Request $request){

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));  

        $staff_no               = htmlentities($request->get('full_name_add')); 
 
        $hrms_users = LifeXcessController::staffno($staff_no);
        $semail     = "";
        $staffname  = "";
        foreach($hrms_users as $hrms_user){
            $semail     = $hrms_user->SEMAIL;
            $staffname  = $hrms_user->STAFFNAME;
        }

        $checks = Users::where('email_address','=',$semail)
            ->get();
           // ->toArray();
        if(count($checks) > 0){

            return back()->with('user_duplicated', 'User already exists in the list.'); 

        } else {

            $users = Users::insert(
                [  
                    'staff_name'        => strtoupper($staffname),
                    'email_address'     => $semail,
                    'ext_no'            => '',
                    'level_access'      => 'ADMIN',
                    'module_access'     => 'OBP',
                    'approver_access'   => '',
                    'active'            => 'Y', 
                    'created_by_name'   => strtoupper($staff_name), 
                    'created_by_email'  => $email,
                    'created_by_date'   => Carbon::Now(),
                    'created_remark'    => 'Created via system',
                    'updated_status'    => 'N',
                    'updated_count'    => '0'  
                ]
            );
            return back()->with('user_added', 'New user registered.'); 

        } 

    }

    public function fetchEditDelete(Request $request){

        $user_id             = htmlentities($request->get('user_id'));

        $users = Users::where('user_id','=',$user_id)
                    ->get();
        return json_encode($users);
    }

    public function edit(Request $request){
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
 
        $user_id                = htmlentities($request->get('user_id_edit'));
        $active                 = htmlentities($request->get('active_edit'));  

        $users = Users::where('user_id',$user_id)
                    ->update(
                                [   
                                    'active'            => $active, 
                                    'updated_status'    => 'Y', 
                                    'updated_count'     => DB::raw('updated_count+1'), 
                                    'updated_by_name'   => strtoupper($staff_name), 
                                    'updated_by_email'  => $email, 
                                    'updated_by_date'   => Carbon::Now(), 
                                    'updated_remark'    => 'Updated company name using system'
                                ]
                );  
        return back()->with('user_edited', 'User updated.'); 
    }
}
