<?php

namespace App\Http\Controllers\Task;

use App\Models\Tasks;
use App\Models\Remarks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\LifeXcessController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ConfigController;

class TaskController extends Controller
{
    // Systems
        public function systems(Request $request){
                        
            return view('tasks.system',
                        [
                            'applications'              => 'applications' 
                                
                        ]
                    );
        }

        public function fetchStaffs(Request $request){

            $row = LifeXcessController::all();
            return json_encode($row, true);

        }

        public function addsystems(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $semail2                = htmlentities($request->session()->get('email'));

            $month_old              = htmlentities($request->get('month')); // 2021-06 change into 06/2021
            $month                  = date("m/Y", strtotime($month_old));   

            $key_deliver            = htmlentities($request->get('key_deliver')); 


            $completion_date_old    = htmlentities($request->get('completion_date'));  
            $completion_date        = date("Y-m-d", strtotime($completion_date_old));

            $completion_time        = htmlentities($request->get('completion_time'));

            $pic                    = htmlentities($request->get('pic')); // MySelf | Team


            $level2name = "";
            $level3name = "";
            $level4name = "";
            $level5name = "";
            $results_2 = LifeXcessController::semail($semail2);
            foreach($results_2 as $result_2){
                $level2name = $result_2->level2name;
                $level3name = $result_2->level3name;
                $level4name = $result_2->level4name;
                $level5name = $result_2->level5name;
            }


            if($pic == 'MYSELF'){

                // Send Email
                    $result = EmailController::taskSendMyself($staff_name,$semail,$key_deliver);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else {  

                        $tasks = Tasks::insert(
                            [      
                                'create_dt'                 => Carbon::Now(),               
                                'level2name'                => $level2name,
                                'level3name'                => $level3name,
                                'level4name'                => $level4name,
                                'level5name'                => $level5name,
                                'stat'                      => 'NOT-STARTED',
                                'month'                     => $month,
                                'key_deli'                  => $key_deliver,
                                'due_dt'                    => $completion_date, 
                                'l2_id'                     => $semail2,
                                'l2_name'                   => $staff_name,  
                                'l3_id'                     => $semail2,
                                'l3_name'                   => $staff_name,  
                                'comp_pass'                 => 'YES',
                                'due_time'                  => $completion_time,
                                'is_approve'                => 'N',
                                'email_count'               => '0' 
                            ]
                        );  

                        return redirect('/home')->with('task_created', 'Task successfully created.'); 

                    } 
                // Send Email 

            } else if($pic == 'TEAM') {

                // Team  
                    $teams = $request->input('team');
                    if (!empty($teams)) { 

                        $dataset1           = array();
                        $dataset2           = array();
                        $dataset3           = array();
                        $dataset4           = array();
                        $dataset5           = array();
                        $dataset6           = array(); 
                        $semail_email       = "";
                        $supervisor_email   = ""; 
                        $hod_email          = ""; 
                        $assignee_name      = "";
                        $assignee_email     = "";

                        foreach($teams as $team){ 

                            // STAFFNO
                                $team1 = explode("|", $team);
                                foreach($team1 as $team11){
                                    $result1 = LifeXcessController::semail($team11);
                                    foreach($result1 as $row1){  
                                        $dataset1[] = $row1->STAFFNO;  
                                    }   
                                }  
                                
                                $staffno = implode("|",$dataset1);
                            // STAFFNO

                            // STAFNAME
                                $team2 = explode("|", $team);
                                foreach($team2 as $team22){
                                    $result2 = LifeXcessController::semail($team22);
                                    foreach($result2 as $row2){  
                                        $dataset2[] = $row2->STAFFNAME;  
                                    }   
                                }  

                                $assignee_name = implode("|",$dataset2);
                            // STAFNAME 

                            // SEMAIL
                                $team3 = explode("|", $team);
                                foreach($team3 as $team33){
                                    $result3 = LifeXcessController::semail($team33);
                                    foreach($result3 as $row3){  
                                        $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                                    }   
                                }  

                                $assignee_email         = implode("|",$dataset3); 
                                $semail_email   = implode(",",$dataset3); // For email sent
                            // SEMAIL  

                            // Cc Email : To Supervisor
                                $team4 = explode("|", $team);
                                foreach($team4 as $team44){
                                    $result4 = LifeXcessController::semail($team44); 
                                    foreach($result4 as $row4){  
                                        $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                                    }   
                                }   

                                $supervisor_email = implode(",",$dataset4); // For email sent
                            // Cc Email : To Supervisor

                            // LEVEL3 : HOD
                                $team5 = explode("|", $team);
                                foreach($team5 as $team55){
                                    $result5 = LifeXcessController::semail($team55);
                                    foreach($result5 as $row5){  
                                        $dataset5[] = $row5->LEVEL3;  
                                    }   
                                }  

                                $level3 = implode(",",$dataset5); // For email sent

                                $level6     = implode("|",$dataset5);   
			                    $level66    = explode("|", $level6);
                                foreach($level66 as $level666){
                                    $result6 = LifeXcessController::hod($level666);
                                    foreach($result6 as $row6){  
                                        $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                                    }   
                                }   

                                $hod_email = implode(",",$dataset6); // For email sent
                            // LEVEL3 : HOD

                        }

                        // Send Email
                            $result = EmailController::taskSend($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                            if(!$result) {   
                                return back()->with('email_failed', 'SMTP email failed.');           
                            } else { 

                                $tasks = Tasks::insert(
                                    [      
                                        'create_dt'                 => Carbon::Now(),               
                                        'level2name'                => $level2name,
                                        'level3name'                => $level3name,
                                        'level4name'                => $level4name,
                                        'level5name'                => $level5name,
                                        'stat'                      => 'NOT-STARTED',
                                        'month'                     => $month,
                                        'key_deli'                  => $key_deliver,
                                        'due_dt'                    => $completion_date, 
                                        'l2_id'                     => $semail2,
                                        'l2_name'                   => $staff_name, 
                                        'l3_id'                     => $assignee_email,
                                        'l3_name'                   => $assignee_name, 
                                        'comp_pass'                 => 'YES',
                                        'due_time'                  => $completion_time,
                                        'is_approve'                => 'N',
                                        'email_count'               => '0' 
                                    ]
                                );  

                                return redirect('/home')->with('task_created', 'Task successfully created.'); 

                            } 
                        // Send Email 


                    } else {
                        
                        // Cannot send
                        return back()->with('empty_staff', 'Person In Charge TEAM is empty. You have to pick at least one staff for person in charge.'); 

                    }
                // Team 

            } 
            
        }
    // Systems

    // Tasks
        public function fetchTasks(Request $request){

            $task_id             = htmlentities($request->get('task_id'));

            // $tasks = Tasks::select(
            //                         DB::raw(
                                            
            //                                     'tasks.*' 
                                            
            //                         )
            //             )
            //             ->where('id','=',$task_id)
            //             ->get();

            $tasks = Tasks::where('id','=',$task_id)
                    ->get();

            return json_encode($tasks);

        }

        public function fetchUserRemarks(Request $request){

            $task_id             = htmlentities($request->get('task_id'));

            $remarks = Remarks::where('type_apply','=','USER')
                        ->where('task_id','=',$task_id)
                        ->get();
            return json_encode($remarks);

        }

        public function fetchAssignorRemarks(Request $request){

            $task_id             = htmlentities($request->get('task_id'));

            $remarks = Remarks::where('type_apply','=','ASSIGNER')
                        ->where('task_id','=',$task_id)
                        ->get();
            return json_encode($remarks);

        }

        public function updateTasks(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $semail2                = htmlentities($request->session()->get('email'));

            
            $task_id                = htmlentities($request->get('task_id_update'));

            $month_old              = htmlentities($request->get('month_update')); // 2021-06 change into 06/2021
            $month                  = date("m/Y", strtotime($month_old));  

            $key_deliver            = htmlentities($request->get('key_deli_update'));

            $completion_date_old    = htmlentities($request->get('completion_date_update'));  
            $completion_date        = date("Y-m-d", strtotime($completion_date_old));

            $completion_time        = htmlentities($request->get('completion_time_update'));

            $pic                    = htmlentities($request->get('pic_update')); // MySelf | Team

            if($pic == 'MYSELF'){

                // Send Email
                    $result = EmailController::taskSendMyself($staff_name,$semail,$key_deliver);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                            ->update(
                                [  
                                    'month'                 => $month,
                                    'key_deli'              => $key_deliver,
                                    'due_dt'                => $completion_date,
                                    'due_time'              => $completion_time,

                                    'l2_id'                 => $semail2,
                                    'l2_name'               => $staff_name,  
                                    'l3_id'                 => $semail2,
                                    'l3_name'               => $staff_name,  
                                    'comp_pass'             => 'YES',

                                    'updater_id'            => $semail2,
                                    'updater_name'          => $staff_name, 
                                    'updater_dt'            => Carbon::Now() 
                                ]
                            );  

                        return redirect('/home')->with('task_created', 'Task successfully created.'); 

                    } 
                // Send Email 

            } else if($pic == 'TEAM') {

                // Team  
                    $teams = $request->input('team_update');
                    if (!empty($teams)) { 

                        $dataset1           = array();
                        $dataset2           = array();
                        $dataset3           = array();
                        $dataset4           = array();
                        $dataset5           = array();
                        $dataset6           = array(); 
                        $semail_email       = "";
                        $supervisor_email   = ""; 
                        $hod_email          = ""; 
                        $assignee_name      = "";
                        $assignee_email     = "";

                        foreach($teams as $team){ 

                            // STAFFNO
                                $team1 = explode("|", $team);
                                foreach($team1 as $team11){
                                    $result1 = LifeXcessController::semail($team11);
                                    foreach($result1 as $row1){  
                                        $dataset1[] = $row1->STAFFNO;  
                                    }   
                                }  
                                
                                $staffno = implode("|",$dataset1);
                            // STAFFNO

                            // STAFNAME
                                $team2 = explode("|", $team);
                                foreach($team2 as $team22){
                                    $result2 = LifeXcessController::semail($team22);
                                    foreach($result2 as $row2){  
                                        $dataset2[] = $row2->STAFFNAME;  
                                    }   
                                }  

                                $assignee_name = implode("|",$dataset2);
                            // STAFNAME 

                            // SEMAIL
                                $team3 = explode("|", $team);
                                foreach($team3 as $team33){
                                    $result3 = LifeXcessController::semail($team33);
                                    foreach($result3 as $row3){  
                                        $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                                    }   
                                }  

                                $assignee_email         = implode("|",$dataset3); 
                                $semail_email   = implode(",",$dataset3); // For email sent
                            // SEMAIL  

                            // Cc Email : To Supervisor
                                $team4 = explode("|", $team);
                                foreach($team4 as $team44){
                                    $result4 = LifeXcessController::semail($team44); 
                                    foreach($result4 as $row4){  
                                        $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                                    }   
                                }   

                                $supervisor_email = implode(",",$dataset4); // For email sent
                            // Cc Email : To Supervisor

                            // LEVEL3 : HOD
                                $team5 = explode("|", $team);
                                foreach($team5 as $team55){
                                    $result5 = LifeXcessController::semail($team55);
                                    foreach($result5 as $row5){  
                                        $dataset5[] = $row5->LEVEL3;  
                                    }   
                                }  

                                $level3 = implode(",",$dataset5); // For email sent

                                $level6     = implode("|",$dataset5);   
			                    $level66    = explode("|", $level6);
                                foreach($level66 as $level666){
                                    $result6 = LifeXcessController::hod($level666);
                                    foreach($result6 as $row6){  
                                        $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                                    }   
                                }   

                                $hod_email = implode(",",$dataset6); // For email sent
                            // LEVEL3 : HOD

                        }

                        // Send Email
                            $result = EmailController::taskSend($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                            if(!$result) {   
                                return back()->with('email_failed', 'SMTP email failed.');           
                            } else { 

                                $tasks = Tasks::where('id',$task_id)
                                    ->update(
                                        [  
                                            'month'                 => $month,
                                            'key_deli'              => $key_deliver,
                                            'due_dt'                => $completion_date,
                                            'due_time'              => $completion_time,

                                            'l2_id'                 => $semail2,
                                            'l2_name'               => $staff_name, 
                                            'l3_id'                 => $assignee_email,
                                            'l3_name'               => $assignee_name,  
                                            'comp_pass'             => 'YES',

                                            'updater_id'            => $semail2,
                                            'updater_name'          => $staff_name, 
                                            'updater_dt'            => Carbon::Now() 
                                        ]
                                    );   

                                return redirect('/home')->with('task_created', 'Task successfully created.'); 

                            } 
                        // Send Email 


                    } else {
                        
                        // Cannot send
                        return back()->with('empty_staff', 'Person In Charge TEAM is empty. You have to pick at least one staff for person in charge.'); 

                    }
                // Team 

            } 

        }

        public function editTasks(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $semail2                = htmlentities($request->session()->get('email'));

            $stat                   = htmlentities($request->get('stat_edit'));
            $remark                 = htmlentities($request->get('remark_edit'));
            $key_deliver            = htmlentities($request->get('key_deli_edit'));
            $task_id                = htmlentities($request->get('task_id_edit'));

            $stat_new               = null;
            if($stat == 'COMPLETED'){
                $stat_new = Carbon::Now();
            } else {
                $stat_new = null;
            }

            // echo $stat_new;
            // exit;

            if($stat == 'COMPLETED'){

                // Find Assignor
                    $group_tasks = Tasks::where('id','=',$task_id )  
                        ->get();
                       // ->toArray();  
                    $i               = 0; 
                    $l2_id              = '';  
                    $l2_name             = '';  
                    foreach ($group_tasks as $group_task) { 
                        if($i==0){    
                            $l2_name    = $group_task->l2_name;   
                            $l2_id      = ''.$insert_text.''.$group_task->l2_id;   
                        }
                        else{   
                            $l2_name    = $l2_name.','.$group_task->l2_name;  
                            $l2_id      = $l2_id.','.$insert_text.''.$group_task->l2_id;  
                        }
                        $i++;
                    }
                // Find Assignor

                $result = EmailController::taskUpdated($staff_name,$semail,$key_deliver,$l2_id,$l2_name);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else {

                    $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [
                                'stat'                  => $stat,  
                                'remark'                => $remark,  

                                'act_dt'                => Carbon::Now(),

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        ); 

                    $remarks = Remarks::insert(
                            [      
                                'task_id'                   => $task_id,
                                'remark'                    => $remark,
                                'by_id'                     => $semail2,
                                'by_name'                   => $staff_name,
                                'by_dt'                     => Carbon::Now(),
                                'status'                    => $stat,
                                'type_apply'                => 'USER' 
                            ]
                        ); 

                    return redirect('/home')->with('task_updated', 'Task updated.');

                }
                 
            } else {

                $tasks = Tasks::where('id',$task_id)
                    ->update(
                        [
                            'stat'                  => $stat,  
                            'remark'                => $remark,  

                            'act_dt'                => null,

                            'updater_id'            => $semail2,
                            'updater_name'          => $staff_name, 
                            'updater_dt'            => Carbon::Now() 
                        ]
                    ); 

                $remarks = Remarks::insert(
                        [      
                            'task_id'                   => $task_id,
                            'remark'                    => $remark,
                            'by_id'                     => $semail2,
                            'by_name'                   => $staff_name,
                            'by_dt'                     => Carbon::Now(),
                            'status'                    => $stat,
                            'type_apply'                => 'USER' 
                        ]
                    ); 

                return redirect('/home')->with('task_updated', 'Task updated.');


            } 

        }

        public function concurTasks(Request $request){

            $insert_text            = ConfigController::insertTestText();

            $staff_name             = htmlentities($request->session()->get('staff_name'));
            $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

            $semail2                = htmlentities($request->session()->get('email'));

            $stat                   = htmlentities($request->get('stat_concur'));
            $remark                 = htmlentities($request->get('remark_concur'));
            $key_deliver            = htmlentities($request->get('key_deli_concur'));
            $task_id                = htmlentities($request->get('task_id_concur'));

            $stat_new               = "";
            if($stat == 'COMPLETED'){
                $stat_new = Carbon::Now();
            } else {
                $stat_new = "";
            }

            // Find l3_id
                    $l3_ids = Tasks::where('id','=',$task_id )  
                    ->get();
                   // ->toArray();  
                $i               = 0; 
                $l3_id           = '';  
                $l3_name         = '';  
                foreach ($l3_ids as $l3_id) { 
                    if($i==0){    
                        $l3_name    = $l3_id->l3_name;   
                        $l3_id      = ''.$insert_text.''.$l3_id->l3_id;   
                    }
                    else{   
                        $l3_name    = $l3_name.','.$l3_id->l3_name;  
                        $l3_id      = $l3_id.','.$insert_text.''.$l3_id->l3_id;  
                    }
                    $i++;
                }
                $l3_id_new = str_replace("|",",",$l3_id); 
            // Find l3_id 

            // Find l4_id
                $l4_ids = Tasks::where('id','=',$task_id )  
                    ->get();
                   // ->toArray();  
                $i               = 0; 
                $l4_id           = '';  
                $l4_name         = '';  
                foreach ($l4_ids as $l4_id) { 
                    if($i==0){    
                        $l4_name    = $l4_id->l4_name;   
                        $l4_id      = ''.$insert_text.''.$l4_id->l4_id;   
                    }
                    else{   
                        $l4_name    = $l4_name.','.$l4_id->l4_name;  
                        $l4_id      = $l4_id.','.$insert_text.''.$l4_id->l4_id;  
                    }
                    $i++;
                }
                $l4_id_new = str_replace("|",",",$l4_id); 
                $l4_id_new_2 = "";
                if(empty($l4_id_new)){
                    $l4_id_new_2 = "";
                } else {
                    $l4_id_new_2 = str_replace("|",",",$l4_id);
                }
            // Find l4_id
            
            // Find l5_id
                $l5_ids = Tasks::where('id','=',$task_id )  
                    ->get();
                   // ->toArray();  
                $i               = 0; 
                $l5_id           = '';  
                $l5_name         = '';  
                foreach ($l5_ids as $l5_id) { 
                    if($i==0){    
                        $l5_name    = $l5_id->l5_name;   
                        $l5_id      = ''.$insert_text.''.$l5_id->l5_id;   
                    }
                    else{   
                        $l5_name    = $l5_name.','.$l5_id->l5_name;  
                        $l5_id      = $l5_id.','.$insert_text.''.$l5_id->l5_id;  
                    }
                    $i++;
                }
                $l5_id_new = str_replace("|",",",$l5_id); 
                $l5_id_new_2 = "";
                if(empty($l5_id_new)){
                    $l5_id_new_2 = "";
                } else {
                    $l5_id_new_2 = str_replace("|",",",$l5_id);
                } 
            // Find l5_id

            if($stat == 'COMPLETED'){ 

                $result = EmailController::taskConcurred($staff_name,$semail,$key_deliver,$l3_id_new,$l4_id_new_2,$l5_id_new_2);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else { 

                    $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [
                                'stat'                  => $stat, 
                                'is_approve'            => 'Y', 
                                'id_approve'            => $semail2,
                                'name_approve'          => $staff_name,
                                'date_approve'          => Carbon::Now(),
                                'remark_approve'        => $remark 
                            ]
                        ); 

                    $remarks = Remarks::insert(
                            [      
                                'task_id'                   => $task_id,
                                'remark'                    => $remark,
                                'by_id'                     => $semail2,
                                'by_name'                   => $staff_name,
                                'by_dt'                     => Carbon::Now(),
                                'status'                    => $stat,
                                'type_apply'                => 'ASSIGNER' 
                            ]
                        ); 

                    return redirect('/home')->with('task_concurred', 'Task concurred.');

                } 
                 
            } else {

                $result = EmailController::taskAssignorUpdated($staff_name,$semail,$key_deliver,$l3_id_new,$l4_id_new_2,$l5_id_new_2);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else { 

                    $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [
                                'stat'                  => $stat, 
                                'is_approve'            => 'N', 
                                'id_approve'            => $semail2,
                                'name_approve'          => $staff_name,
                                'date_approve'          => Carbon::Now(),
                                'remark_approve'        => $remark 
                            ]
                        ); 

                    $remarks = Remarks::insert(
                            [      
                                'task_id'                   => $task_id,
                                'remark'                    => $remark,
                                'by_id'                     => $semail2,
                                'by_name'                   => $staff_name,
                                'by_dt'                     => Carbon::Now(),
                                'status'                    => $stat,
                                'type_apply'                => 'ASSIGNER' 
                            ]
                        ); 

                    return redirect('/home')->with('task_updated', 'Task updated.');

                }  
            } 

        }
    // Tasks

    public function excels(Request $request){

        return view('tasks.excel',
                    [
                        'applications'              => 'applications' 
                            
                    ]
                );
        
    }

    public function reassigns(Request $request){
        

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $email                  = htmlentities($request->session()->get('email'));

        // $reassigns      = Tasks::select(
        //                         DB::raw(
        //                                 '
        //                                     tasks.*, 
        //                                 '
        //                         )
        //             ) 
        //             ->where('l2_id','=', $email)   
        //             ->orWhere('l3_id', 'like', '%' . $email . '%')  
        //             ->orWhere('l4_id', 'like', '%' . $email . '%')   
        //             ->orWhere('l5_id', 'like', '%' . $email . '%')   
        //             ->get();
        //            // ->toArray(); 

        $reassigns      = Tasks::where('l2_id','=', $email)   
                        ->orWhere('l3_id', 'like', '%' . $email . '%')  
                        ->orWhere('l4_id', 'like', '%' . $email . '%')   
                        ->orWhere('l5_id', 'like', '%' . $email . '%')   
                        ->get(); 


        return view('tasks.reassign',
                    [
                        'applications'              => 'applications', 
                        'reassigns'              => $reassigns, 
                            
                    ]
                );
        
    } 

    public function viewReassign(Request $request,$taskId){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $email                  = htmlentities($request->session()->get('email'));

        $l2_id   = "";
        $l2_name = "";
        $l3_id   = "";
        $l3_name = "";
        $l4_id   = "";
        $l4_name = "";
        $l5_id   = "";
        $l5_name = "";
        $reassigns      = Tasks::where('id','=', $taskId) 
                        ->get();
                       // ->toArray(); 
        if(count($reassigns) > 0){
                
            foreach($reassigns as $reassign){
                $l2_id   = $reassign->l2_id;
                $l2_name = $reassign->l2_name;

                $l3_id   = $reassign->l3_id;
                $l3_name = $reassign->l3_name;

                $l4_id   = $reassign->l4_id;
                $l4_name = $reassign->l4_name;

                $l5_id   = $reassign->l5_id;
                $l5_name = $reassign->l5_name;
            }

            $staffs = LifeXcessController::all();

            // Condition

                // 1 
                    if(
                        ( strpos($l3_name, "|") !== false ) &&   // L3 team
                        (empty($l4_name) === true) &&            // L4 empty
                        (empty($l5_name) === true)               // L5 empty
                    )    
                    {    
                        // echo '1. Xda staff. Open 1st Only';
                        // exit;

                        return view('tasks.reassign-view-1',
                            [
                                'applications'           => 'applications', 
                                'reassigns'              => $reassigns, 
                                'staffs'                 => $staffs, 
                                    
                            ]
                        );
                    } 
                // 1 
                
                // 2 , 3
                    else if(
                        (empty($l3_name) === false) &&         // L3 individual
                        (empty($l4_name) === true) &&          // L4 empty
                        (empty($l5_name) === true)             // L5 empty
                    )    
                    {

                        // echo '2. individual. check if staff have staff under <br/>';
                        // echo '2. if have staff. open 1st & 2nd level<br/>';
                        // echo '2. if dont have staff. open 1st level<br/>';
                        // exit;

                        $hrms_users = LifeXcessController::bemail($l3_id);
                        if(count($hrms_users) > 0){
                            
                            // echo '2. Ada staff. Open 1st & 2nd';
                            // exit;

                            return view('tasks.reassign-view-2',
                                [
                                    'applications'           => 'applications', 
                                    'reassigns'              => $reassigns, 
                                    'staffs'                 => $staffs, 
                                        
                                ]
                            ); 


                        } else {

                            // echo '3. Xda staff. Open 1st Only';
                            // exit;

                            return view('tasks.reassign-view-3',
                                [
                                    'applications'           => 'applications', 
                                    'reassigns'              => $reassigns, 
                                    'staffs'                 => $staffs, 
                                        
                                ]
                            ); 

                        }  

                    } 
                // 2 , 3

                // 4
                    else if(
                        (strpos($l4_name, "|") !== false) &&   // L4 team
                        (empty($l5_name) === true)             // L5 empty
                    )    
                    {
                        // echo '4. L4 team. open 1st & 2nd level<br/>';
                        // exit;

                        return view('tasks.reassign-view-4',
                            [
                                'applications'           => 'applications', 
                                'reassigns'              => $reassigns, 
                                'staffs'                 => $staffs, 
                                    
                            ]
                        );
                    }
                // 4

                // 5 , 6
                    else if(
                        (empty($l4_name) === false) &&         // L4 individual
                        (empty($l5_name) === true)             // L5 empty
                    )    
                    {
                        // echo '4. individual. check if staff have staff under <br/>';
                        // echo '4. if have staff. open 1st, 2nd & 3rd level<br/>';
                        // echo '4. if dont have staff. open 1st & 2nd level<br/>';
                        // exit;
                        
                        $hrms_users = LifeXcessController::bemail($l4_id);
                        if(count($hrms_users) > 0){
                            
                            // echo '5. Ada staff. 1st, 2nd & 3rd';
                            // exit;

                            return view('tasks.reassign-view-5',
                                [
                                    'applications'           => 'applications', 
                                    'reassigns'              => $reassigns, 
                                    'staffs'                 => $staffs, 
                                        
                                ]
                            ); 


                        } else {

                            // echo '6. Xda staff. 1st & 2nd';
                            // exit;

                            return view('tasks.reassign-view-6',
                                [
                                    'applications'           => 'applications', 
                                    'reassigns'              => $reassigns, 
                                    'staffs'                 => $staffs, 
                                        
                                ]
                            ); 

                        }  


                    } 
                // 5 , 6

                // 7
                    else if(
                        (empty($l3_name) === false) &&        // L3
                        (empty($l4_name) === false) &&        // L4 
                        (empty($l5_name) === false)           // L5 
                    )    
                    {

                        return view('tasks.reassign-view-7',
                            [
                                'applications'           => 'applications', 
                                'reassigns'              => $reassigns, 
                                'staffs'                 => $staffs, 
                                    
                            ]
                        ); 

                    }
                // 7
            // Condition


        } else {

        }                     
        
    }

    public function updateReassign1(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 
        
        $teams = $request->input('team');
        if (!empty($teams)) { 

            $dataset1           = array();
            $dataset2           = array();
            $dataset3           = array();
            $dataset4           = array();
            $dataset5           = array();
            $dataset6           = array(); 
            $semail_email       = "";
            $supervisor_email   = ""; 
            $hod_email          = ""; 
            $assignee_name      = "";
            $assignee_email     = "";

            foreach($teams as $team){ 

                // STAFFNO
                    $team1 = explode("|", $team);
                    foreach($team1 as $team11){
                        $result1 = LifeXcessController::semail($team11);
                        foreach($result1 as $row1){  
                            $dataset1[] = $row1->STAFFNO;  
                        }   
                    }  
                    
                    $staffno = implode("|",$dataset1);
                // STAFFNO

                // STAFNAME
                    $team2 = explode("|", $team);
                    foreach($team2 as $team22){
                        $result2 = LifeXcessController::semail($team22);
                        foreach($result2 as $row2){  
                            $dataset2[] = $row2->STAFFNAME;  
                        }   
                    }  

                    $assignee_name = implode("|",$dataset2);
                // STAFNAME 

                // SEMAIL
                    $team3 = explode("|", $team);
                    foreach($team3 as $team33){
                        $result3 = LifeXcessController::semail($team33);
                        foreach($result3 as $row3){  
                            $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                        }   
                    }  

                    $assignee_email         = implode("|",$dataset3); 
                    $semail_email   = implode(",",$dataset3); // For email sent
                // SEMAIL  

                // Cc Email : To Supervisor
                    $team4 = explode("|", $team);
                    foreach($team4 as $team44){
                        $result4 = LifeXcessController::semail($team44); 
                        foreach($result4 as $row4){  
                            $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                        }   
                    }   

                    $supervisor_email = implode(",",$dataset4); // For email sent
                // Cc Email : To Supervisor

                // LEVEL3 : HOD
                    $team5 = explode("|", $team);
                    foreach($team5 as $team55){
                        $result5 = LifeXcessController::semail($team55);
                        foreach($result5 as $row5){  
                            $dataset5[] = $row5->LEVEL3;  
                        }   
                    }  

                    $level3 = implode(",",$dataset5); // For email sent

                    $level6     = implode("|",$dataset5);   
                    $level66    = explode("|", $level6);
                    foreach($level66 as $level666){
                        $result6 = LifeXcessController::hod($level666);
                        foreach($result6 as $row6){  
                            $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                        }   
                    }   

                    $hod_email = implode(",",$dataset6); // For email sent
                // LEVEL3 : HOD

            }

            // Send Email
                $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else { 

                    $tasks = Tasks::where('id',$task_id)
                    ->update(
                        [     
                            'l3_id'                 => $assignee_email,
                            'l3_name'               => $assignee_name,  
                            'comp_pass'             => 'YES',

                            'updater_id'            => $semail2,
                            'updater_name'          => $staff_name, 
                            'updater_dt'            => Carbon::Now() 
                        ]
                    );  

                    return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [1].'); 

                } 
            // Send Email 

        } else {

            return back()->with('empty_staff', 'Please select at least one name.'); 
            
        }

    }

    public function updateReassign2(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 

        $level_select           = htmlentities($request->get('level_select')); 
        
        if($level_select == 'L1'){

            
            $teams = $request->input('team_1');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l3_id'                 => $assignee_email,
                                'l3_name'               => $assignee_name,  
                                'l4_id'                 => '',  
                                'l4_name'               => '',  
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [2].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L2'){

            $teams = $request->input('team_2');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l4_id'                 => $assignee_email,
                                'l4_name'               => $assignee_name,  
                                'l5_id'                 => '',  
                                'l5_name'               => '',  
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [2].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }

        }

    }

    public function updateReassign3(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 
        
        $teams = $request->input('team');
        if (!empty($teams)) { 

            $dataset1           = array();
            $dataset2           = array();
            $dataset3           = array();
            $dataset4           = array();
            $dataset5           = array();
            $dataset6           = array(); 
            $semail_email       = "";
            $supervisor_email   = ""; 
            $hod_email          = ""; 
            $assignee_name      = "";
            $assignee_email     = "";

            foreach($teams as $team){ 

                // STAFFNO
                    $team1 = explode("|", $team);
                    foreach($team1 as $team11){
                        $result1 = LifeXcessController::semail($team11);
                        foreach($result1 as $row1){  
                            $dataset1[] = $row1->STAFFNO;  
                        }   
                    }  
                    
                    $staffno = implode("|",$dataset1);
                // STAFFNO

                // STAFNAME
                    $team2 = explode("|", $team);
                    foreach($team2 as $team22){
                        $result2 = LifeXcessController::semail($team22);
                        foreach($result2 as $row2){  
                            $dataset2[] = $row2->STAFFNAME;  
                        }   
                    }  

                    $assignee_name = implode("|",$dataset2);
                // STAFNAME 

                // SEMAIL
                    $team3 = explode("|", $team);
                    foreach($team3 as $team33){
                        $result3 = LifeXcessController::semail($team33);
                        foreach($result3 as $row3){  
                            $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                        }   
                    }  

                    $assignee_email         = implode("|",$dataset3); 
                    $semail_email   = implode(",",$dataset3); // For email sent
                // SEMAIL  

                // Cc Email : To Supervisor
                    $team4 = explode("|", $team);
                    foreach($team4 as $team44){
                        $result4 = LifeXcessController::semail($team44); 
                        foreach($result4 as $row4){  
                            $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                        }   
                    }   

                    $supervisor_email = implode(",",$dataset4); // For email sent
                // Cc Email : To Supervisor

                // LEVEL3 : HOD
                    $team5 = explode("|", $team);
                    foreach($team5 as $team55){
                        $result5 = LifeXcessController::semail($team55);
                        foreach($result5 as $row5){  
                            $dataset5[] = $row5->LEVEL3;  
                        }   
                    }  

                    $level3 = implode(",",$dataset5); // For email sent

                    $level6     = implode("|",$dataset5);   
                    $level66    = explode("|", $level6);
                    foreach($level66 as $level666){
                        $result6 = LifeXcessController::hod($level666);
                        foreach($result6 as $row6){  
                            $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                        }   
                    }   

                    $hod_email = implode(",",$dataset6); // For email sent
                // LEVEL3 : HOD

            }

            // Send Email
                $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else { 

                    $tasks = Tasks::where('id',$task_id)
                    ->update(
                        [     
                            'l3_id'                 => $assignee_email,
                            'l3_name'               => $assignee_name,  
                            'comp_pass'             => 'YES',

                            'updater_id'            => $semail2,
                            'updater_name'          => $staff_name, 
                            'updater_dt'            => Carbon::Now() 
                        ]
                    );  

                    return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [3].'); 

                } 
            // Send Email 

        } else {

            return back()->with('empty_staff', 'Please select at least one name.'); 
            
        }

    }

    public function updateReassign4(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 

        $level_select           = htmlentities($request->get('level_select')); 
        
        if($level_select == 'L1'){

            
            $teams = $request->input('team_1');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l3_id'                 => $assignee_email,
                                'l3_name'               => $assignee_name,  
                                'l4_id'                 => '',  
                                'l4_name'               => '',  
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [4].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L2'){

            $teams = $request->input('team_2');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l4_id'                 => $assignee_email,
                                'l4_name'               => $assignee_name,  
                                'l5_id'                 => '',  
                                'l5_name'               => '',  
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [4].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }

        }

    }

    public function updateReassign5(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 

        $level_select           = htmlentities($request->get('level_select')); 
        
        if($level_select == 'L1'){

            
            $teams = $request->input('team_1');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l3_id'                 => $assignee_email,
                                'l3_name'               => $assignee_name,    
                                'l4_id'                 => '',  
                                'l4_name'               => '', 
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [5].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L2'){

            
            $teams = $request->input('team_2');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l4_id'                 => $assignee_email,
                                'l4_name'               => $assignee_name,    
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 2nd level [5].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L3'){

            $teams = $request->input('team_3');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l5_id'                 => $assignee_email,
                                'l5_name'               => $assignee_name,    
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 3rd level [5].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }

        }

    }

    public function updateReassign6(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 

        $level_select           = htmlentities($request->get('level_select')); 
        
        if($level_select == 'L2'){

            
            $teams = $request->input('team_2');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l4_id'                 => $assignee_email,
                                'l4_name'               => $assignee_name,    
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 2nd level [6].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L3'){

            $teams = $request->input('team_3');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l5_id'                 => $assignee_email,
                                'l5_name'               => $assignee_name,    
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 3rd level [6].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }

        }

    }

    public function updateReassign7(Request $request){

        $insert_text            = ConfigController::insertTestText();
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $semail                 = ''.$insert_text.''.htmlentities($request->session()->get('email'));
        $semail2                = htmlentities($request->session()->get('email'));

        $task_id                = htmlentities($request->get('task_id')); 
        $key_deliver            = htmlentities($request->get('key_deli')); 

        $level_select           = htmlentities($request->get('level_select')); 
        
        if($level_select == 'L1'){

            
            $teams = $request->input('team_1');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l3_id'                 => $assignee_email,
                                'l3_name'               => $assignee_name,    
                                'l4_id'                 => '',  
                                'l4_name'               => '', 
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 1st level [7].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L2'){

            
            $teams = $request->input('team_2');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l4_id'                 => $assignee_email,
                                'l4_name'               => $assignee_name,    
                                'l5_id'                 => '',  
                                'l5_name'               => '', 
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 2nd level [7].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }



        } else if($level_select == 'L3'){

            $teams = $request->input('team_3');
            if (!empty($teams)) { 

                $dataset1           = array();
                $dataset2           = array();
                $dataset3           = array();
                $dataset4           = array();
                $dataset5           = array();
                $dataset6           = array(); 
                $semail_email       = "";
                $supervisor_email   = ""; 
                $hod_email          = ""; 
                $assignee_name      = "";
                $assignee_email     = "";

                foreach($teams as $team){ 

                    // STAFFNO
                        $team1 = explode("|", $team);
                        foreach($team1 as $team11){
                            $result1 = LifeXcessController::semail($team11);
                            foreach($result1 as $row1){  
                                $dataset1[] = $row1->STAFFNO;  
                            }   
                        }  
                        
                        $staffno = implode("|",$dataset1);
                    // STAFFNO

                    // STAFNAME
                        $team2 = explode("|", $team);
                        foreach($team2 as $team22){
                            $result2 = LifeXcessController::semail($team22);
                            foreach($result2 as $row2){  
                                $dataset2[] = $row2->STAFFNAME;  
                            }   
                        }  

                        $assignee_name = implode("|",$dataset2);
                    // STAFNAME 

                    // SEMAIL
                        $team3 = explode("|", $team);
                        foreach($team3 as $team33){
                            $result3 = LifeXcessController::semail($team33);
                            foreach($result3 as $row3){  
                                $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                            }   
                        }  

                        $assignee_email         = implode("|",$dataset3); 
                        $semail_email   = implode(",",$dataset3); // For email sent
                    // SEMAIL  

                    // Cc Email : To Supervisor
                        $team4 = explode("|", $team);
                        foreach($team4 as $team44){
                            $result4 = LifeXcessController::semail($team44); 
                            foreach($result4 as $row4){  
                                $dataset4[] = $insert_text.''.$row4->BEMAIL;  
                            }   
                        }   

                        $supervisor_email = implode(",",$dataset4); // For email sent
                    // Cc Email : To Supervisor

                    // LEVEL3 : HOD
                        $team5 = explode("|", $team);
                        foreach($team5 as $team55){
                            $result5 = LifeXcessController::semail($team55);
                            foreach($result5 as $row5){  
                                $dataset5[] = $row5->LEVEL3;  
                            }   
                        }  

                        $level3 = implode(",",$dataset5); // For email sent

                        $level6     = implode("|",$dataset5);   
                        $level66    = explode("|", $level6);
                        foreach($level66 as $level666){
                            $result6 = LifeXcessController::hod($level666);
                            foreach($result6 as $row6){  
                                $dataset6[] = $insert_text.''.$row6->SEMAIL;  
                            }   
                        }   

                        $hod_email = implode(",",$dataset6); // For email sent
                    // LEVEL3 : HOD

                }

                // Send Email
                    $result = EmailController::taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email);
                    if(!$result) {   
                        return back()->with('email_failed', 'SMTP email failed.');           
                    } else { 

                        $tasks = Tasks::where('id',$task_id)
                        ->update(
                            [     
                                'l5_id'                 => $assignee_email,
                                'l5_name'               => $assignee_name,    
                                'comp_pass'             => 'YES',

                                'updater_id'            => $semail2,
                                'updater_name'          => $staff_name, 
                                'updater_dt'            => Carbon::Now() 
                            ]
                        );  

                        return redirect('/home')->with('task_reassign', 'Task successfully reassign on 3rd level [7].'); 

                    } 
                // Send Email 

            } else {

                return back()->with('empty_staff', 'Please select at least one name.'); 
                
            }

        }

    }
}
