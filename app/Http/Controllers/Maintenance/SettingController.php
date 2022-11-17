<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Settings;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function settings(Request $request){

        return view('maintenances.obps.setting',
                        [
                            'applications'              => 'applications' 
                                
                        ]
                    );

    }

    public function fetchSetting(Request $request){
                
        $settings = Settings::get();
        return json_encode($settings);

    }


    public function edit(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $enrolment_period       = htmlentities($request->get('enrolment_period')); 
        $remark                 = htmlentities($request->get('remark')); 

        $settings = Settings::where('setting_id','1')->update(
                            [       
                                'setting_value'             => $enrolment_period,
                                'setting_updated_status'    => 'Y', 
                                'setting_updated_count'     => DB::raw('setting_updated_count+1'), 
                                'setting_updated_by_name'   => strtoupper($staff_name), 
                                'setting_updated_by_email'  => $semail2, 
                                'setting_updated_by_date'   => Carbon::Now(), 
                                'setting_updated_remark'    => $remark  
                            ]
            );  

        return back()->with('enrolment_period_updated', 'Enrolment updated.'); 

    }

}
