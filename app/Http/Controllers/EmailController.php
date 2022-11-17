<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ConfigController;

class EmailController extends Controller
{ 
    // OBPXCESS
        // OBP Myself
        public static function taskSendMyself($staff_name,$semail,$key_deliver){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - New task assigned by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>New task <strong><u>".$key_deliver."</u></strong> has been assigned to yourself. You may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($semail, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        // OBP Team
        public static function taskSend($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - New task assigned by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>New task <strong><u>".$key_deliver."</u></strong> has been assigned to you. You may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$hod_email.",".$supervisor_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($semail_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        // Task Updated
        public static function taskUpdated($staff_name,$semail,$key_deliver,$l2_id,$l2_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - Task has been completed by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>Task <strong><u>".$key_deliver."</u></strong> has been completed and need you to verify and you may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($l2_id, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        // Task Concurred
        public static function taskConcurred($staff_name,$semail,$key_deliver,$l3_id_new,$l4_id_new_2,$l5_id_new_2){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - Task has been concurred by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>Task <strong><u>".$key_deliver."</u></strong> has been concurred and you may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($l3_id_new, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        // Task Assignor Updated
        public static function taskAssignorUpdated($staff_name,$semail,$key_deliver,$l3_id_new,$l4_id_new_2,$l5_id_new_2){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - Task has been updated by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>Task <strong><u>".$key_deliver."</u></strong> status has been updated and you may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($l3_id_new, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        // Task Reassign
        public static function taskReassign($staff_name,$key_deliver,$hod_email,$supervisor_email,$semail_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = "".$title." Notificaton - New task reassigned by ".$staff_name."";
            $message = "";
            $message = "
                        <html>
                            <head>
                                <title>".$subject."</title>
                            </head>
                            <body>    
                                <p>Task <strong><u>".$key_deliver."</u></strong> has been reassigned to you. You may login into <a href='".url("/home")."'>".$title."</a> to view the task.</p> 
                                <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                                <p>Regards.</p> 
                            </body>
                        </html>
                        "; 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$hod_email.",".$supervisor_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($semail_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }
    // OBPXCESS

    // CKPI
        public static function adminDeclare($semail,$staff_name,$app_endorser_by_email,$app_endorser_by_name,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - New Corporate KPI Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$app_endorser_by_name.",</p> 

                    <p>".$staff_name." has submitted new Corporate KPI title <strong><u>".$app_name."</u></strong> for your review.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($app_endorser_by_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function adminRework($semail,$staff_name,$app_endorser_by_email,$app_endorser_by_name,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc(); 
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Rework';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$app_endorser_by_name.",</p> 

                    <p>".$staff_name." has rework his/her Corporate KPI title <strong><u>".$app_name."</u></strong> for your review.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($app_endorser_by_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function endorseDeclare($semail,$app_created_by_name,$app_created_by_email,$kpi_owner_email,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - New Corporate KPI';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear all KPI Owners,</p> 

                    <p>New Corporate KPI title <strong><u>".$app_name."</u></strong> has been submitted for your action.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$app_created_by_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($kpi_owner_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function endorseRework($semail,$app_created_by_name,$app_created_by_email,$app_endorsed_by_name,$app_endorsed_by_email,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Rework';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$app_created_by_name.",</p> 

                    <p>".$app_endorsed_by_name." has requested you to rework Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($app_created_by_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function kpiownerAssign($semail,$staff_name,$assignee_name,$assignee_email,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - KPI Owner nominate';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$assignee_name.",</p> 

                    <p>".$staff_name." has nominated you for KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($assignee_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function assigneeResult($semail,$staff_name,$app_name,$kpi_owner_name,$kpi_owner_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Assignee update YTD Target & YTD Achievement';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$kpi_owner_name.",</p> 

                    <p>".$staff_name." has updated YTD target & YTD achievement for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($kpi_owner_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }    

        public static function reviewDeclare($semail,$staff_name,$assignee_name,$assignee_email,$app_name,$checker_email,$admin_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - YTD Target & YTD Achievement Approved';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$assignee_name.",</p> 

                    <p>".$staff_name." has approved YTD target & YTD achievement for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$checker_email.",".$admin_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($assignee_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function reviewDeclareAll($staff_name,$semail,$kpi_owner_email,$assignee_email2, $checker_name,$checker_email,$admin_name, $admin_email, $app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - YTD Target & YTD Achievement Approved by all KPI Owner';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear Corporate KPI Admins (Checker),</p> 

                    <p>All KPI Owner has approved their YTD target & YTD achievement for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>"; 
            $headers .= "\r\n" . "Cc:".$admin_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($checker_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function reviewRework($semail,$kpi_owner_name,$kpi_owner_email,$assignee_name,$assignee_email,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - YTD Target & YTD Achievement Rework Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$assignee_name.",</p> 

                    <p>".$kpi_owner_name." has requested you to rework YTD target & YTD achievement for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($assignee_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function checkerRequestRework($semail,$staff_name, $kpi_owner_email,$assignee_name,$assignee_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Rework Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear ".$assignee_name.",</p> 

                    <p>".$staff_name." request you to rework your Corporate KPI.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$kpi_owner_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($assignee_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function checkerDeclare($staff_name, $semail, $staffname,$email_address,$app_name,$app_created_by_email){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Review Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear 1st Level Approver,</p> 

                    <p>".$staff_name." has checked KPI title <strong><u>".$app_name."</u></strong> and awaiting for your review.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$app_created_by_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($email_address, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }
        
        public static function reviewerDeclare($staff_name, $semail, $staffname, $email_address, $checker_name, $checker_email, $app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Review Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear CKPI Final Approver,</p> 

                    <p>".$staff_name." has reviewed Corporate KPI title <strong><u>".$app_name."</u></strong> and awaiting for your approval.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$checker_email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($email_address, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function reviewerRework($staff_name,$semail,$staffname,$email_address,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Rework Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear CKPI Admin Checker,</p> 

                    <p>".$staff_name." has requested you to rework for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($email_address, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function approverDeclare($staff_name,$semail,$staffname,$email_address,$kpi_owner_email,$assignee_email,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Approved';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear all,</p> 

                    <p>Corporate KPI title <strong><u>".$app_name."</u></strong>has been approved.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail.",".$email_address."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail("".$kpi_owner_email.",".$assignee_email."" , $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function approverRework($staff_name,$semail,$staffname,$email_address,$app_name){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - Corporate KPI Rework Request';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>Dear CKPI Admin Checker,</p> 

                    <p>".$staff_name." has requested you to rework for Corporate KPI title <strong><u>".$app_name."</u></strong>.</p>

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$semail."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($email_address, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }

        public static function reminderSend($email,$semail_email,$subject_new,$description_new){

            $title      = ConfigController::getTitle();
            $bcc_email  = ConfigController::getBcc();
            $insert_text= ConfigController::insertTestText();
            $helpdesk   = ConfigController::helpDeskLink();

            $subject = ''.$title.' - '.$subject_new.'';
            $message = "";
            $message = "
            <html>
                <head>
                    <title>".$subject."</title>
                </head>
                <body>
                    <p>".$description_new."</p>  

                    <p>For your action, you may login into <a href='".url("/home")."'>".$title."</a> to view the request.</p>
                    <p>Any query on the usage of ".$title." may be submitted via <a href='".$helpdesk."'>e-Helpdesk</a>.</p>
                    <p>Regards.</p>
                </body>
            </html>
            ";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: ".$title." <noreply@smebank.com.my>";
            $headers .= "\r\n" . "Cc:".$email."";
            $headers .= "\r\n" . "Bcc:".$bcc_email."";
            $result = mail($semail_email, $subject, $message, $headers, "-f noreply@smebank.com.my");
            return $result;

        }
    // CKPI
}
