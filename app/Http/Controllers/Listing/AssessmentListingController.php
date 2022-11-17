<?php

namespace App\Http\Controllers\Listing;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_files;
use App\Models\Ckpi_assignees;
use App\Models\Ckpi_perspectives;
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

class AssessmentListingController extends Controller
{
    public function assessment(Request $request, $appId, $assigneeId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Quarters
                $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                      //  ->toArray(); 
                if(count($curr_assignees) > 0){

                    $quarter_arrs       = array();  
                    $group_arrs         = array();    
                    $i                  = 0;  
                    $count = 1;

                    $perspective_arrs   = array();
                    $j                  = 0;  

                    foreach($curr_assignees as $curr_assignee)
                    {   
                        $group_arrs[$i]         = array();  

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
                                              //  ->toArray();
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
                                              //  ->toArray(); 
                                if(count($perspective_dashboards) > 0){  

                                    foreach($perspective_dashboards as $perspective_dashboard) { 

                                        $perspective_arrs[$j]   = array();

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
                                                                                'ckpi_groups.id as group_item_id'
                                                                            
                                                                   
                                                        )
                                                        ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                        ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                        ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
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
                                                $perspective_arrs[$j][] = $arr2s; 

                                            }

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

            // Assignees  
                $assignees = Ckpi_perspectives::select(
                                
                                               
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id',
                                                'ckpi_assignees.app_id as assignee_app_id_item_id'
                                            
                                
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                  
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    ->where('ckpi_assignees.is_active','=','Y')   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                   // ->toArray(); 
            // Assignees

            // Files
                $files = Ckpi_files::where('ckpi_files.assignee_id','=',$assigneeId)   
                    ->orderBy('ckpi_files.file_id','asc')
                    ->get();
                   // ->toArray(); 
            // Files

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            return view('lists.assessment',
                    [
                        'apps'              => $apps, 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 
                        'assignees'         => $assignees,
                        'staffs'            => $staffs,
                        'files'             => $files
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }

    public function updateAssignee(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $selects                    = $request->input('assignee_item_id_val');  

        $ytd_target1                = $request->input('ytd_target'); 
        $ytd_target                 = str_replace(",", "", $ytd_target1);

        $ytd_achievement1           = $request->input('ytd_achievement'); 
        $ytd_achievement            = str_replace(",", "", $ytd_achievement1);  
        
        foreach ((array) $selects as $index => $select) {

            $assignees = Ckpi_assignees::whereIn('id',[$select])
                ->update(
                            [        
                                'ytd_target'                => $ytd_target[$index],
                                'ytd_achievement'           => $ytd_achievement[$index],

                                'assignee_updated_status'   => 'Y',
                                'assignee_updated_count'    => DB::raw('assignee_updated_count+1'), 
                                'assignee_updated_by_name'  => $staff_name,
                                'assignee_updated_by_email' => $email,
                                'assignee_updated_by_date'  => Carbon::Now(),
                                'assignee_updated_remark'   => ''
                            ]
            ); 

        } 

        return json_encode(true); 
            
        
    }

    public function fetchFile(Request $request){

        $file_id             = htmlentities($request->get('file_id'));

        $files = Ckpi_files::where('file_id','=',$file_id)
                    ->orderBy('file_id','asc')
                    ->get();
        return json_encode($files);

    }

    public function fileUpload(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $file_id                = htmlentities($request->get('file_id_upload'));  
        $assignee_id            = htmlentities($request->get('assignee_id_upload'));  
        $app_id                 = htmlentities($request->get('app_id_upload'));  

        $encrypted              = htmlentities($request->get('encrypted_upload'));  

        if($request->hasFile('fileUser'))
        {      
            $pdf      = $request->file('fileUser');  //$request->file('file')->getSize();

            $pdf_size = $pdf->getSize();  
            $pdf_ext  = $pdf->getClientOriginalExtension();
            $new_pdf  = $encrypted.'_'.rand(123456,999999).".".$pdf_ext; 
            
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            // shuffle the result
            $string = str_shuffle($pin);

            if($pdf_size > 9388608)
            {
                return back()->with('upload_maxsize', 'Format exceed 10MB.');  
            }
            else if($pdf_ext != 'pdf')
            {
                return back()->with('upload_format', 'Format in PDF only.');  
            }
            else
            { 
                // FOR UPLOADS 
                    // Create folder based on version
                        $new_folder = public_path('/uploads/'.$string); 
                        if (!file_exists($new_folder)) {
                            // path does not exist
                            File::makeDirectory($new_folder);
                        }
                    // Create folder based on version

                    // Upload file
                        $destination_path = public_path('/uploads/'.$string);
                        $pdf->move($destination_path, $new_pdf); 
                    // Upload file

                    // Update to DB
                        $files = Ckpi_files::where('file_id',$file_id)
                                ->update(
                                            [    
                                                'assignee_id'                   => $assignee_id,
                                                'app_id'                        => $app_id,
                                                'filename'                      => $encrypted,
                                                'filename_extension'            => $new_pdf,
                                                'filename_directory'            => 'uploads/'.$string.'/'.$new_pdf,
                                                'filename_category'             => 'ASSIGNEE',
                                                'filename_folder'               => $string,

                                                'uploaded_by_name'              => '',
                                                'uploaded_by_email'             => '',
                                                'uploaded_by_date'              => null,
                                                'uploaded_remark'               => '',

                                                'uploaded_updated_status'       => 'Y',
                                                'uploaded_updated_count'        => DB::raw('uploaded_updated_count+1'),
                                                'uploaded_updated_by_name'      => $staff_name,
                                                'uploaded_updated_by_email'     => $semail2,
                                                'uploaded_updated_by_date'      => Carbon::Now(),
                                                'uploaded_updated_remark'       => '' 
                                            ]
                            );   
                    // Update to DB
                // FOR UPLOADS  

                return back()->with('upload_success', 'Supporting document successfully uploaded.');   
            } 
        }
        else
        {
            return json_encode(false);
        } 

    }

    function downloadFile(Request $request, $fileId)
    { 

        // $files = '3-Work-From-Home-Checklist_571716.pdf';
        // $string = '339093W07891745';
        // return response()->download(storage_path('/app/public/'.$string.'/'.$files.''));

        // $item_id = htmlentities(Crypt::decrypt($itemId));

        $filename_extension = "";
        $filename_folder = "";

        $files   = Ckpi_files::where('file_id','=',$fileId)
                ->get();
               // ->toArray();
        if(count($files) > 0){
            foreach($files as $file){
                $filename_extension = $file->filename_extension;
                $filename_folder = $file->filename_folder;
            }

            return response()->download(public_path('/uploads/'.$filename_folder.'/'.$filename_extension.''));

        } else {

        } 
        // exit;

        // $url = storage_path();
        // print_r($url);
        // exit; 

        //$files = 'sample.pdf';
        //return response()->download(storage_path('/app/public/author/'.$files.''));
    }

    public function declare(Request $request){ 
        
        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));

        $app_id                 = htmlentities($request->get('declare_id'));
        $assignee_id            = htmlentities($request->get('assignee_id')); 
        $remark                 = htmlentities($request->get('remark_declare'));

        // Find Email Creator
            $pool_apps = Ckpi_apps::where('id','=',$app_id)
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $app_name               = '';

            $app_created_by_name    = '';
            $app_created_by_email   = '';

            $app_endorsed_by_name    = '';
            $app_endorsed_by_email   = '';

            foreach ($pool_apps as $pool_app) { 
                if($i==0){  
                    $app_name               = $pool_app->app_name;   
                    $app_created_by_name    = $pool_app->app_created_by_name;   
                    $app_created_by_email   = ''.$insert_text.''.$pool_app->app_created_by_email; 

                    $app_endorsed_by_name   = $pool_app->app_endorsed_by_name;   
                    $app_endorsed_by_email  = ''.$insert_text.''.$pool_app->app_endorsed_by_email;   
                }
                else{  
                    $app_name               = $app_name.','.$pool_app->app_name;  
                    $app_created_by_name    = $app_created_by_name.','.$pool_app->app_created_by_name;  
                    $app_created_by_email   = $app_created_by_email.','.$insert_text.''.$pool_app->app_created_by_email;  

                    $app_endorsed_by_name   = $app_endorsed_by_name.','.$pool_app->app_endorsed_by_name;  
                    $app_endorsed_by_email  = $app_endorsed_by_email.','.$insert_text.''.$pool_app->app_endorsed_by_email;  
                }
                $i++;
            } 
        // Find Email Creator

        // Find KPI Owner
            $pool_assignees = Ckpi_assignees::where('id','=',$assignee_id)
                ->get();
               // ->toArray();  
            $i                      = 0; 
            $kpi_owner_name         = '';  
            $kpi_owner_email        = '';  
            foreach ($pool_assignees as $pool_assignee) { 
                if($i==0){    
                    $kpi_owner_name   = $pool_assignee->kpi_owner_name;   
                    $kpi_owner_email  = ''.$insert_text.''.$pool_assignee->kpi_owner_email;   
                }
                else{   

                    $kpi_owner_name   = $kpi_owner_name.','.$pool_assignee->kpi_owner_name;  
                    $kpi_owner_email  = $kpi_owner_email.','.$insert_text.''.$pool_assignee->kpi_owner_email;  
                }
                $i++;
            } 
        // Find KPI Owner

        $check = Ckpi_assignees::where('id','=',$assignee_id) 
            ->get();
            //->toArray();
        if(count($check) > 0){

            $ytd_target         = "";
            $ytd_achievement    = "";
            foreach($check as $row){
                $ytd_target         = $row->ytd_target;
                $ytd_achievement    = $row->ytd_achievement;
            }
            
            if( (empty($ytd_target) === true) || (empty($ytd_achievement) === true) ){

                return back()->with('assessment_failed', 'Please fill in YTD Target & YTD Achievement.'); 
                
            } else {

                // Check if files uploaded or not
                    $check_files = Ckpi_files::where('assignee_id','=',$assignee_id)
                                ->where('uploaded_updated_status','=','Y')
                                ->get();
                              //  ->toArray();
                    if(count($check_files) > 0){

                        $result = EmailController::assigneeResult($semail,$staff_name,$app_name,$kpi_owner_name,$kpi_owner_email);
                        if(!$result) {   
                            return back()->with('email_failed', 'SMTP email failed.');           
                        } else {
                            
                            $assignees = Ckpi_assignees::where('id',$assignee_id)
                                    ->update(
                                        [ 
                                            'assignee_completed'        => 'Y',  
                                            'assignee_updated_status'   => 'Y',
                                            'assignee_updated_count'    => DB::raw('assignee_updated_count+1'), 
                                            'assignee_updated_by_name'  => $staff_name,
                                            'assignee_updated_by_email' => $semail2,
                                            'assignee_updated_by_date'  => Carbon::Now(),
                                            'assignee_updated_remark'   => $remark  
                                        ]
                                    ); 
        
                            return redirect('/home')->with('assignee_result', 'You have successfully submitted your YTD target & YTD achievement for KPI owner review.');
        
                        } 

                    } else {

                        return back()->with('file_empty', 'Please upload supporting document.');

                    }

                // Check if files uploaded or not

                
                
                
            }  
        } else { 
        }  

    }

    public function assessment_history(Request $request, $appId, $assigneeId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));

        $apps = Ckpi_apps::where('id','=',$appId)
            ->orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($apps) > 0){

            $app_id = "";
            foreach($apps as $app){
                $app_id = $app->id;
            }

            // Quarters
                $curr_assignees = Ckpi_assignees::select('app_id','quarter_id') 
                        ->groupBy('app_id','quarter_id')
                        ->where('app_id','=',$app_id) 
                        ->orderBy('quarter_id','asc') 
                        ->get();
                      //  ->toArray(); 
                if(count($curr_assignees) > 0){

                    $quarter_arrs       = array();  
                    $group_arrs         = array();    
                    $i                  = 0;  
                    $count = 1;

                    $perspective_arrs   = array();
                    $j                  = 0;  

                    foreach($curr_assignees as $curr_assignee)
                    {   
                        $group_arrs[$i]         = array();  

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
                                              //  ->toArray();
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
                                              //  ->toArray(); 
                                if(count($perspective_dashboards) > 0){  

                                    foreach($perspective_dashboards as $perspective_dashboard) { 

                                        $perspective_arrs[$j]   = array();

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
                                                                                'ckpi_groups.id as group_item_id'
                                                                  
                                                        )
                                                        ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                        ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                        ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
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
                                                $perspective_arrs[$j][] = $arr2s; 

                                            }

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

            // Assignees  
                $assignees = Ckpi_perspectives::select(
                               
                                              
                                                'ckpi_perspectives.*',
                                                'ckpi_perspectives.id as perspective_item_id',

                                                'ckpi_indicators.*',
                                                'ckpi_indicators.id as indicator_item_id',

                                                'ckpi_assignees.*',
                                                'ckpi_assignees.id as assignee_item_id',
                                                'ckpi_assignees.app_id as assignee_app_id_item_id'
                                            
                                
                    )
                    ->join('ckpi_indicators','ckpi_perspectives.id','=','ckpi_indicators.perspective_id')
                    ->join('ckpi_assignees','ckpi_indicators.id','=','ckpi_assignees.indicator_id')
                  
                    ->where('ckpi_assignees.id','=',$assigneeId)   
                    ->where('ckpi_assignees.is_active','=','Y')   
                    ->orderBy('ckpi_assignees.id','asc')
                    ->get();
                   // ->toArray(); 
            // Assignees

            // Files
                $files = Ckpi_files::where('ckpi_files.assignee_id','=',$assigneeId)   
                    ->orderBy('ckpi_files.file_id','asc')
                    ->get();
                   // ->toArray(); 
            // Files

            // All Staff in LifeXcess
                $staffs = LifeXcessController::all();
            // All Staff in LifeXcess

            return view('lists.assessment_history',
                    [
                        'apps'              => $apps, 
                        'quarter_arrs'      => $quarter_arrs,
                        'group_arrs'        => $group_arrs,
                        'perspective_arrs'  => $perspective_arrs, 
                        'assignees'         => $assignees,
                        'staffs'            => $staffs,
                        'files'             => $files
                            
                    ]
                );

        } else {

            return redirect('home');

        }
    }
}
