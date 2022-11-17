<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Ckpi_reminders;
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

class ReminderController extends Controller
{
    public function reminders(Request $request){

        $reminders  = Ckpi_reminders::orderBy('ckpi_reminders.reminder_id','desc') 
                ->get();
                //->toArray(); 

        return view('maintenances.ckpis.reminder',
                        [
                            'applications'              => 'applications',
                            'reminders'                 => $reminders,
                                
                        ]
                    );

    }

    public function fetchStaffs(Request $request){

        $row = LifeXcessController::all();
        return json_encode($row, true);

    }

    public function add(Request $request){

        $insert_text            = ConfigController::insertTestText();

        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = ''.$insert_text.''.htmlentities($request->session()->get('email'));

        $semail2                = htmlentities($request->session()->get('email'));
 
        $subject_new            = htmlentities($request->get('subject_new')); 
        $description_new        = htmlentities($request->get('description_new')); 

        $remark                 = htmlentities($request->get('remark'));  
        $teams                  = $request->input('staff');

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
                        $result1 = LifeXcessController::staffno($team11);
                        foreach($result1 as $row1){  
                            $dataset1[] = $row1->STAFFNO;  
                        }   
                    }  
                    $staffno = implode("|",$dataset1);
                // STAFFNO

                // STAFNAME
                    $team2 = explode("|", $team);
                    foreach($team2 as $team22){
                        $result2 = LifeXcessController::staffno($team22);
                        foreach($result2 as $row2){  
                            $dataset2[] = $row2->STAFFNAME;  
                        }   
                    }  
                    $assignee_name = implode("|",$dataset2);
                // STAFNAME 

                // SEMAIL
                    $team3 = explode("|", $team);
                    foreach($team3 as $team33){
                        $result3 = LifeXcessController::staffno($team33);
                        foreach($result3 as $row3){  
                            $dataset3[] = $insert_text.''.$row3->SEMAIL;  
                        }   
                    }  

                    $assignee_email = implode("|",$dataset3); 
                    $semail_email   = implode(",",$dataset3); // For email sent
                // SEMAIL  

            }

            // echo $email.'<br/>';
            // echo $semail_email.'<br/>';
            // echo $subject_new.'<br/>';
            // echo $description_new.'<br/>';
            // exit;

            // Send Email
                $result = EmailController::reminderSend($email,$semail_email,$subject_new,$description_new);
                if(!$result) {   
                    return back()->with('email_failed', 'SMTP email failed.');           
                } else { 

                    $tasks = Ckpi_reminders::insert(
                        [     
                            'reminder_subject'          => $subject_new,
                            'reminder_description'      => $description_new,
                            'reminder_type'             => 'USER',
                            'reminder_sent_by_name'     => $staff_name,
                            'reminder_sent_by_email'    => $semail2,
                            'reminder_sent_by_date'     => Carbon::Now(),
                            'reminder_sent_remark'      => $remark 
                        ]
                    );  

                    return json_encode(true);
                    // return redirect('/home')->with('task_created', 'Task successfully created.'); 

                } 
            // Send Email 


        } else {
            return back()->with('empty_staff', 'Please select at least one staff'); 
        }


    }
}
