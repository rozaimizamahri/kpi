<?php

namespace App\Http\Controllers;

use App\Models\Ckpi_apps;
use App\Models\Ckpi_assignees;
use App\Models\Tasks;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\LifeXcessController;
use App\Http\Controllers\ConfigController;

class HomeController extends Controller
{
    public function index(Request $request){

        $insert_text            = ConfigController::insertTestText();
 
        $staff_name             = htmlentities($request->session()->get('staff_name'));
        $email                  = htmlentities($request->session()->get('email'));
        $level                  = htmlentities($request->session()->get('level'));
        $module                 = htmlentities($request->session()->get('module'));

        // OBP
            // Pending Concurred
                $pending_tasks      = Tasks::where('l2_id','=', $email)     
                                    ->where('stat','=', 'COMPLETED')     
                                    ->where('is_approve','=', 'N')     
                                    ->get();
                   // ->toArray(); 
            // Pending Concurred

            // Subordinate Task
                // Get Level2 Value [DIVISION]
                    $level2 = ""; 
                    $level2s = LifeXcessController::level2($email);
                    foreach($level2s as $level2){
                        $level2  = $level2->LEVEL2; 
                    } 
                // Get Level2 Value [DIVISION]

                // Get Level3 Value [DEPARTMENT]
                    $level3 = ""; 
                    $level3s = LifeXcessController::level3($email);
                    foreach($level3s as $level3){
                        $level3  = $level3->LEVEL3; 
                    } 
                // Get Level3 Value [DEPARTMENT]

                // Get Level4 Value [SECTION]
                    $level4 = ""; 
                    $level4s = LifeXcessController::level4($email);
                    foreach($level4s as $level4){
                        $level4  = $level4->LEVEL4; 
                    } 
                // Get Level3 Value [SECTION]

                // Get POSTLVL
                    $postlvl = ""; 
                    $postlvls = LifeXcessController::postlvl($email);
                    foreach($postlvls as $postlvl){
                        $postlvl  = $postlvl->POSTLVL; 
                    } 
                // Get POSTLVL 

                $division_arrs      = array();
                $division_i         = 0;

                $department_arrs    = array();
                $department_i       = 0;

                $section_arrs       = array(); 
                $section_i          = 0;
                 
                if($postlvl == 'L1')
                {
                    // Get All Staff Under Division (Level2) 
                        $staffname_1= ""; 
                        $semail_1   = ""; 
                        $divisions   = LifeXcessController::bemail($email); 

                        foreach($divisions as $division)
                        {  
                            // Email
                            $semail_1 = $division->SEMAIL;
                            $semail_2 = explode("|", $semail_1); 

                            foreach($semail_2 as $semail_3)
                            { 
                                $staff_staffnames   = LifeXcessController::semail($semail_3);
                                foreach($staff_staffnames as $staff_staffname){
                                    $staffname_1 = $staff_staffname->STAFFNAME;
                                }  

                                $division_arrs[$division_i]     = array();

                                $task_id        = 0;
                                    
                                $create_dt      = "";
                                $level2name     = "";
                                $level3name     = "";
                                $level4name     = "";
                                $level5name     = "";

                                $month          = "";
                                $key_deli       = "";
                                $priority       = "";

                                $due_dt         = "";

                                $l2_id          = "";
                                $l2_name        = "";
                                $l3_id          = "";
                                $l3_name        = "";
                                $l4_id          = "";
                                $l4_name        = "";
                                $l5_id          = "";
                                $l5_name        = "";

                                $comp_pass      = "";
                                $stat           = "";
                                $remark         = "";

                                $updater_id     = "";
                                $updater_name   = "";
                                $updater_dt     = "";

                                $l2_staffno     = "";
                                $l3_staffno     = "";
                                $l4_staffno     = "";
                                $l5_staffno     = "";

                                $act_dt         = "";
                                $key_desc       = "";

                                $is_approve     = ""; 
                                $id_approve     = "";
                                $name_approve   = "";
                                $date_approve   = "";
                                $remark_approve = "";

                                $due_time       = "";
                                $email_count    = "";
                                $email_dt       = "";
                                $reassign_id    = "";
                                $reassign_dt    = ""; 

                                $subordinate_tasks      = Tasks::where('l2_id','=', $semail_3)  
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '%')  
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '%')  

                                                        ->orWhere('l3_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l4_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l5_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->get();
                                if(count($subordinate_tasks) > 0)
                                {
                                    foreach($subordinate_tasks as $subordinate_task)
                                    {
                                        $task_id        = $subordinate_task->id;
                                        
                                        $create_dt      = $subordinate_task->create_dt;
                                        $level2name     = $subordinate_task->level2name;
                                        $level3name     = $subordinate_task->level3name;
                                        $level4name     = $subordinate_task->level4name;
                                        $level5name     = $subordinate_task->level5name;

                                        $month          = $subordinate_task->month;
                                        $key_deli       = $subordinate_task->key_deli;
                                        $priority       = $subordinate_task->priority;

                                        $due_dt         = $subordinate_task->due_dt;

                                        $l2_id          = $subordinate_task->l2_id;
                                        $l2_name        = $subordinate_task->l2_name;
                                        $l3_id          = $subordinate_task->l3_id;
                                        $l3_name        = $subordinate_task->l3_name;
                                        $l4_id          = $subordinate_task->l4_id;
                                        $l4_name        = $subordinate_task->l4_name;
                                        $l5_id          = $subordinate_task->l5_id;
                                        $l5_name        = $subordinate_task->l5_name;

                                        $comp_pass      = $subordinate_task->comp_pass;
                                        $stat           = $subordinate_task->stat;
                                        $remark         = $subordinate_task->remark;

                                        $updater_id     = $subordinate_task->updater_id;
                                        $updater_name   = $subordinate_task->updater_name;
                                        $updater_dt     = $subordinate_task->updater_dt;

                                        $l2_staffno     = $subordinate_task->l2_staffno;
                                        $l3_staffno     = $subordinate_task->l3_staffno;
                                        $l4_staffno     = $subordinate_task->l4_staffno;
                                        $l5_staffno     = $subordinate_task->l5_staffno;

                                        $act_dt         = $subordinate_task->act_dt;
                                        $key_desc       = $subordinate_task->key_desc;

                                        $is_approve     = $subordinate_task->is_approve;  
                                        $id_approve     = $subordinate_task->id_approve;
                                        $name_approve   = $subordinate_task->name_approve;
                                        $date_approve   = $subordinate_task->date_approve;
                                        $remark_approve = $subordinate_task->remark_approve;

                                        $due_time       = $subordinate_task->due_time;
                                        $email_count    = $subordinate_task->email_count;
                                        $email_dt       = $subordinate_task->email_dt;
                                        $reassign_id    = $subordinate_task->reassign_id;
                                        $reassign_dt    = $subordinate_task->reassign_dt;  

                                        $division_2_arrs     = array(   
                                                                        'staff_staffname'         => $staffname_1,
                                                                        'staff_email_address'         => $semail_3,
                                                                        'task_id'         => $task_id,
                                        
                                                                        'create_dt'       => $create_dt,
                                                                        'level2name'      => $level2name,
                                                                        'level3name'      => $level3name,
                                                                        'level4name'      => $level4name,
                                                                        'level5name'      => $level5name,
                                
                                                                        'month'           => $month,
                                                                        'key_deli'        => $key_deli,
                                                                        'priority'        => $priority,
                                
                                                                        'due_dt'          => $due_dt,
                                
                                                                        'l2_id'           => $l2_id,
                                                                        'l2_name'         => $l2_name,
                                                                        'l3_id'           => $l3_id,
                                                                        'l3_name'         => $l3_name,
                                                                        'l4_id'           => $l4_id,
                                                                        'l4_name'         => $l4_name,
                                                                        'l5_id'           => $l5_id,
                                                                        'l5_name'         => $l5_name,
                                
                                                                        'comp_pass'       => $comp_pass,
                                                                        'stat'            => $stat,
                                                                        'remark'          => $remark,
                                
                                                                        'updater_id'      => $updater_id,
                                                                        'updater_name'    => $updater_name,
                                                                        'updater_dt'      => $updater_dt,
                                
                                                                        'l2_staffno'      => $l2_staffno,
                                                                        'l3_staffno'      => $l3_staffno,
                                                                        'l4_staffno'      => $l4_staffno,
                                                                        'l5_staffno'      => $l5_staffno,
                                
                                                                        'act_dt'          => $act_dt,
                                                                        'key_desc'        => $key_desc,
                                
                                                                        'is_approve'      => $is_approve, 
                                                                        'id_approve'      => $id_approve,
                                                                        'name_approve'    => $name_approve,
                                                                        'date_approve'    => $date_approve,
                                                                        'remark_approve'  => $remark_approve,
                                
                                                                        'due_time'        => $due_time,
                                                                        'email_count'     => $email_count,
                                                                        'email_dt'        => $email_dt,
                                                                        'reassign_id'     => $reassign_id,
                                                                        'reassign_dt'     => $reassign_dt

                                        );  
                                        $division_arrs[$division_i]     = $division_2_arrs; 
                                        $division_i++;
                                        
                                    } 
                                }  
                            }

                        } 
                    // Get All Staff Under Division (Level2)  
                } 
                else if($postlvl == 'L2')
                {    
                    // Get All Staff Under Department (Level3) 
                        $staffname_1= ""; 
                        $semail_1   = ""; 
                        $departments   = LifeXcessController::bemail($email); 

                        foreach($departments as $department)
                        {  
                            // Email
                            $semail_1 = $department->SEMAIL;
                            $semail_2 = explode("|", $semail_1); 

                            foreach($semail_2 as $semail_3)
                            { 
                                $staff_staffnames   = LifeXcessController::semail($semail_3);
                                foreach($staff_staffnames as $staff_staffname){
                                    $staffname_1 = $staff_staffname->STAFFNAME;
                                }  

                                $department_arrs[$department_i]     = array();

                                $task_id        = 0;
                                    
                                $create_dt      = "";
                                $level2name     = "";
                                $level3name     = "";
                                $level4name     = "";
                                $level5name     = "";

                                $month          = "";
                                $key_deli       = "";
                                $priority       = "";

                                $due_dt         = "";

                                $l2_id          = "";
                                $l2_name        = "";
                                $l3_id          = "";
                                $l3_name        = "";
                                $l4_id          = "";
                                $l4_name        = "";
                                $l5_id          = "";
                                $l5_name        = "";

                                $comp_pass      = "";
                                $stat           = "";
                                $remark         = "";

                                $updater_id     = "";
                                $updater_name   = "";
                                $updater_dt     = "";

                                $l2_staffno     = "";
                                $l3_staffno     = "";
                                $l4_staffno     = "";
                                $l5_staffno     = "";

                                $act_dt         = "";
                                $key_desc       = "";

                                $is_approve     = ""; 
                                $id_approve     = "";
                                $name_approve   = "";
                                $date_approve   = "";
                                $remark_approve = "";

                                $due_time       = "";
                                $email_count    = "";
                                $email_dt       = "";
                                $reassign_id    = "";
                                $reassign_dt    = ""; 

                                $subordinate_tasks      = Tasks::where('l2_id','=', $semail_3)  
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '%')  
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '%')  

                                                        ->orWhere('l3_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l4_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l5_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->get();
                                 //   ->toArray(); 
                                if(count($subordinate_tasks) > 0)
                                {
                                    foreach($subordinate_tasks as $subordinate_task)
                                    {
                                        $task_id        = $subordinate_task->id;
                                        
                                        $create_dt      = $subordinate_task->create_dt;
                                        $level2name     = $subordinate_task->level2name;
                                        $level3name     = $subordinate_task->level3name;
                                        $level4name     = $subordinate_task->level4name;
                                        $level5name     = $subordinate_task->level5name;

                                        $month          = $subordinate_task->month;
                                        $key_deli       = $subordinate_task->key_deli;
                                        $priority       = $subordinate_task->priority;

                                        $due_dt         = $subordinate_task->due_dt;

                                        $l2_id          = $subordinate_task->l2_id;
                                        $l2_name        = $subordinate_task->l2_name;
                                        $l3_id          = $subordinate_task->l3_id;
                                        $l3_name        = $subordinate_task->l3_name;
                                        $l4_id          = $subordinate_task->l4_id;
                                        $l4_name        = $subordinate_task->l4_name;
                                        $l5_id          = $subordinate_task->l5_id;
                                        $l5_name        = $subordinate_task->l5_name;

                                        $comp_pass      = $subordinate_task->comp_pass;
                                        $stat           = $subordinate_task->stat;
                                        $remark         = $subordinate_task->remark;

                                        $updater_id     = $subordinate_task->updater_id;
                                        $updater_name   = $subordinate_task->updater_name;
                                        $updater_dt     = $subordinate_task->updater_dt;

                                        $l2_staffno     = $subordinate_task->l2_staffno;
                                        $l3_staffno     = $subordinate_task->l3_staffno;
                                        $l4_staffno     = $subordinate_task->l4_staffno;
                                        $l5_staffno     = $subordinate_task->l5_staffno;

                                        $act_dt         = $subordinate_task->act_dt;
                                        $key_desc       = $subordinate_task->key_desc;

                                        $is_approve     = $subordinate_task->is_approve; 
                                        $id_approve     = $subordinate_task->id_approve;
                                        $name_approve   = $subordinate_task->name_approve;
                                        $date_approve   = $subordinate_task->date_approve;
                                        $remark_approve = $subordinate_task->remark_approve;

                                        $due_time       = $subordinate_task->due_time;
                                        $email_count    = $subordinate_task->email_count;
                                        $email_dt       = $subordinate_task->email_dt;
                                        $reassign_id    = $subordinate_task->reassign_id;
                                        $reassign_dt    = $subordinate_task->reassign_dt;  

                                        $department_2_arrs     = array(   
                                                                        'staff_staffname'         => $staffname_1,
                                                                        'staff_email_address'         => $semail_3,
                                                                        'task_id'         => $task_id,
                                        
                                                                        'create_dt'       => $create_dt,
                                                                        'level2name'      => $level2name,
                                                                        'level3name'      => $level3name,
                                                                        'level4name'      => $level4name,
                                                                        'level5name'      => $level5name,
                                
                                                                        'month'           => $month,
                                                                        'key_deli'        => $key_deli,
                                                                        'priority'        => $priority,
                                
                                                                        'due_dt'          => $due_dt,
                                
                                                                        'l2_id'           => $l2_id,
                                                                        'l2_name'         => $l2_name,
                                                                        'l3_id'           => $l3_id,
                                                                        'l3_name'         => $l3_name,
                                                                        'l4_id'           => $l4_id,
                                                                        'l4_name'         => $l4_name,
                                                                        'l5_id'           => $l5_id,
                                                                        'l5_name'         => $l5_name,
                                
                                                                        'comp_pass'       => $comp_pass,
                                                                        'stat'            => $stat,
                                                                        'remark'          => $remark,
                                
                                                                        'updater_id'      => $updater_id,
                                                                        'updater_name'    => $updater_name,
                                                                        'updater_dt'      => $updater_dt,
                                
                                                                        'l2_staffno'      => $l2_staffno,
                                                                        'l3_staffno'      => $l3_staffno,
                                                                        'l4_staffno'      => $l4_staffno,
                                                                        'l5_staffno'      => $l5_staffno,
                                
                                                                        'act_dt'          => $act_dt,
                                                                        'key_desc'        => $key_desc,
                                
                                                                        'is_approve'      => $is_approve,  
                                                                        'id_approve'      => $id_approve,
                                                                        'name_approve'    => $name_approve,
                                                                        'date_approve'    => $date_approve,
                                                                        'remark_approve'  => $remark_approve,
                                
                                                                        'due_time'        => $due_time,
                                                                        'email_count'     => $email_count,
                                                                        'email_dt'        => $email_dt,
                                                                        'reassign_id'     => $reassign_id,
                                                                        'reassign_dt'     => $reassign_dt

                                        );  
                                        $department_arrs[$department_i]     = $department_2_arrs; 
                                        $department_i++;
                                        
                                    } 
                                }  
                            }

                        } 
                    // Get All Staff Under Department (Level3)   
                } 
                else if($postlvl == 'L3')
                {  
                    // Get All Staff Under Section (Level4) 
                        $staffname_1= ""; 
                        $semail_1   = ""; 
                        $sections   = LifeXcessController::bemail($email);
                        foreach($sections as $section)
                        {  
                            // Email
                            $semail_1 = $section->SEMAIL;
                            $semail_2 = explode("|", $semail_1); 

                            

                            foreach($semail_2 as $semail_3)
                            { 

                                $staff_staffnames   = LifeXcessController::semail($semail_3);
                                foreach($staff_staffnames as $staff_staffname){
                                    $staffname_1 = $staff_staffname->STAFFNAME;
                                }


                                $section_arrs[$section_i]     = array();

                                $task_id        = 0;
                                    
                                $create_dt      = "";
                                $level2name     = "";
                                $level3name     = "";
                                $level4name     = "";
                                $level5name     = "";

                                $month          = "";
                                $key_deli       = "";
                                $priority       = "";

                                $due_dt         = "";

                                $l2_id          = "";
                                $l2_name        = "";
                                $l3_id          = "";
                                $l3_name        = "";
                                $l4_id          = "";
                                $l4_name        = "";
                                $l5_id          = "";
                                $l5_name        = "";

                                $comp_pass      = "";
                                $stat           = "";
                                $remark         = "";

                                $updater_id     = "";
                                $updater_name   = "";
                                $updater_dt     = "";

                                $l2_staffno     = "";
                                $l3_staffno     = "";
                                $l4_staffno     = "";
                                $l5_staffno     = "";

                                $act_dt         = "";
                                $key_desc       = "";

                                $is_approve     = ""; 
                                $id_approve     = "";
                                $name_approve   = "";
                                $date_approve   = "";
                                $remark_approve = "";

                                $due_time       = "";
                                $email_count    = "";
                                $email_dt       = "";
                                $reassign_id    = "";
                                $reassign_dt    = ""; 

                                $subordinate_tasks      = Tasks::where('l2_id','=', $semail_3)  
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '%')  
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '%')  

                                                        ->orWhere('l3_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l3_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l4_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l4_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->orWhere('l5_id', 'like', '%|' . $semail_3 . '%')   
                                                        ->orWhere('l5_id', 'like', '%'  . $semail_3 . '|%')   
                                                        ->get();
                                 //   ->toArray(); 
                                if(count($subordinate_tasks) > 0)
                                {
                                    foreach($subordinate_tasks as $subordinate_task)
                                    {
                                        $task_id        = $subordinate_task->id;
                                        
                                        $create_dt      = $subordinate_task->create_dt;
                                        $level2name     = $subordinate_task->level2name;
                                        $level3name     = $subordinate_task->level3name;
                                        $level4name     = $subordinate_task->level4name;
                                        $level5name     = $subordinate_task->level5name;

                                        $month          = $subordinate_task->month;
                                        $key_deli       = $subordinate_task->key_deli;
                                        $priority       = $subordinate_task->priority;

                                        $due_dt         = $subordinate_task->due_dt;

                                        $l2_id          = $subordinate_task->l2_id;
                                        $l2_name        = $subordinate_task->l2_name;
                                        $l3_id          = $subordinate_task->l3_id;
                                        $l3_name        = $subordinate_task->l3_name;
                                        $l4_id          = $subordinate_task->l4_id;
                                        $l4_name        = $subordinate_task->l4_name;
                                        $l5_id          = $subordinate_task->l5_id;
                                        $l5_name        = $subordinate_task->l5_name;

                                        $comp_pass      = $subordinate_task->comp_pass;
                                        $stat           = $subordinate_task->stat;
                                        $remark         = $subordinate_task->remark;

                                        $updater_id     = $subordinate_task->updater_id;
                                        $updater_name   = $subordinate_task->updater_name;
                                        $updater_dt     = $subordinate_task->updater_dt;

                                        $l2_staffno     = $subordinate_task->l2_staffno;
                                        $l3_staffno     = $subordinate_task->l3_staffno;
                                        $l4_staffno     = $subordinate_task->l4_staffno;
                                        $l5_staffno     = $subordinate_task->l5_staffno;

                                        $act_dt         = $subordinate_task->act_dt;
                                        $key_desc       = $subordinate_task->key_desc;

                                        $is_approve     = $subordinate_task->is_approve; 
                                        $id_approve     = $subordinate_task->id_approve;
                                        $name_approve   = $subordinate_task->name_approve;
                                        $date_approve   = $subordinate_task->date_approve;
                                        $remark_approve = $subordinate_task->remark_approve;

                                        $due_time       = $subordinate_task->due_time;
                                        $email_count    = $subordinate_task->email_count;
                                        $email_dt       = $subordinate_task->email_dt;
                                        $reassign_id    = $subordinate_task->reassign_id;
                                        $reassign_dt    = $subordinate_task->reassign_dt;  

                                        $section_2_arrs     = array(   
                                                                        'staff_staffname'         => $staffname_1,
                                                                        'staff_email_address'         => $semail_3,
                                                                        'task_id'         => $task_id,
                                        
                                                                        'create_dt'       => $create_dt,
                                                                        'level2name'      => $level2name,
                                                                        'level3name'      => $level3name,
                                                                        'level4name'      => $level4name,
                                                                        'level5name'      => $level5name,
                                
                                                                        'month'           => $month,
                                                                        'key_deli'        => $key_deli,
                                                                        'priority'        => $priority,
                                
                                                                        'due_dt'          => $due_dt,
                                
                                                                        'l2_id'           => $l2_id,
                                                                        'l2_name'         => $l2_name,
                                                                        'l3_id'           => $l3_id,
                                                                        'l3_name'         => $l3_name,
                                                                        'l4_id'           => $l4_id,
                                                                        'l4_name'         => $l4_name,
                                                                        'l5_id'           => $l5_id,
                                                                        'l5_name'         => $l5_name,
                                
                                                                        'comp_pass'       => $comp_pass,
                                                                        'stat'            => $stat,
                                                                        'remark'          => $remark,
                                
                                                                        'updater_id'      => $updater_id,
                                                                        'updater_name'    => $updater_name,
                                                                        'updater_dt'      => $updater_dt,
                                
                                                                        'l2_staffno'      => $l2_staffno,
                                                                        'l3_staffno'      => $l3_staffno,
                                                                        'l4_staffno'      => $l4_staffno,
                                                                        'l5_staffno'      => $l5_staffno,
                                
                                                                        'act_dt'          => $act_dt,
                                                                        'key_desc'        => $key_desc,
                            
                                                                        'is_approve'      => $is_approve, 
                                                                        'id_approve'      => $id_approve,
                                                                        'name_approve'    => $name_approve,
                                                                        'date_approve'    => $date_approve,
                                                                        'remark_approve'  => $remark_approve,
                                
                                                                        'due_time'        => $due_time,
                                                                        'email_count'     => $email_count,
                                                                        'email_dt'        => $email_dt,
                                                                        'reassign_id'     => $reassign_id,
                                                                        'reassign_dt'     => $reassign_dt

                                        );  
                                        $section_arrs[$section_i]     = $section_2_arrs; 
                                        $section_i++;
                                        
                                    } 
                                }  
                            }

                        } 
                    // Get All Staff Under Section (Level4)
                } 
                else
                {  

                    $subordinate_tasks      = Tasks::where('l2_id','=', $email)  
                                            ->orWhere('l3_id', 'like', '%' . $email . '%')  
                                            ->orWhere('l4_id', 'like', '%' . $email . '%')   
                                            ->orWhere('l5_id', 'like', '%' . $email . '%')   
                                            ->get(); 

                }           
            // Subordinate Task

            // My Task
                $my_tasks      = Tasks::where('l2_id','=', $email)  
                                ->orWhere('l3_id', 'like', '%' . $email . '%')  
                                ->orWhere('l4_id', 'like', '%' . $email . '%')   
                                ->orWhere('l5_id', 'like', '%' . $email . '%')   
                                ->get();
                   // ->toArray();  
            // My Task
        // OBP

        // CKPI MODULE
            // PENDING
                // Create/Edit User
                    $submit_users      = Ckpi_apps::where('app_stage','=','1') 
                        ->where('app_created_by_email','=',$email)
                        ->get();
                       // ->toArray(); 
                // Create/Edit User

                // Pending Endorse
                    $pending_endorsers      = Ckpi_apps::where('app_stage','=','2')
                                                ->where('app_endorsed_is','=','N')
                                                ->where('app_endorsed_by_email','=',$email)
                                                ->get();
                                               // ->toArray();

                    $count_pending_endorsers = Ckpi_apps::select(DB::raw('count(*) as pending_item'))
                                                ->where('app_stage','=','2')
                                                ->where('app_endorsed_is','=','N')
                                                ->where('app_endorsed_by_email','=',$email)
                                                ->get();
                                               // ->toArray(); 
                // Pending Endorse

                // Rework User
                    $rework_users      = Ckpi_apps::where('app_stage','=','3') 
                                                ->where('app_created_by_email','=',$email)
                                                ->get();
                                               // ->toArray();
                // Rework User
                                            
                // Pending KPI Owner Assign    
                    $kpi_owner_assigns      = Ckpi_assignees::select(
                                                  
                                                            
                                                                'ckpi_assignees.*',
                                                                'ckpi_assignees.id as assignee_item_id',

                                                                'ckpi_perspectives.*',
                                                                'ckpi_perspectives.id as perspective_item_id',

                                                                'ckpi_indicators.*',
                                                                'ckpi_indicators.id as indicator_item_id',

                                                                'ckpi_groups.*',
                                                                'ckpi_groups.id as group_item_id',

                                                                'ckpi_apps.*',
                                                                'ckpi_apps.id as app_item_id'
                                                            
                                                    
                                        )
                                        ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                        ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                        ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                        ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id') 

                                        // ->where('ckpi_apps.app_stage','=',4)

                                        ->where('ckpi_assignees.kpi_owner_email','=',$email)
                                        ->where('ckpi_assignees.assignee_updated_status','=','N')
                                        ->where('ckpi_assignees.assignee_completed','=','N') 
                                        ->where('ckpi_assignees.assign_is','=','Y') 
                                        ->where('ckpi_assignees.is_active','=','Y')
                                        ->orderBy('ckpi_assignees.id','asc')

                                        ->get();
                                        //->toArray();                                 
                // Pending KPI Owner Assign   
                
                // Pending Assessment
                    $assignee_assessments   = Ckpi_assignees::select(
                                                            
                                                                    
                                                                        'ckpi_assignees.*',
                                                                        'ckpi_assignees.id as assignee_item_id',

                                                                        'ckpi_perspectives.*',
                                                                        'ckpi_perspectives.id as perspective_item_id',

                                                                        'ckpi_indicators.*',
                                                                        'ckpi_indicators.id as indicator_item_id',

                                                                        'ckpi_groups.*',
                                                                        'ckpi_groups.id as group_item_id',

                                                                        'ckpi_apps.*',
                                                                        'ckpi_apps.id as app_item_id'
                                                                    
                                                            
                                                )
                                                ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id') 

                                                ->where('ckpi_assignees.assignee_email','=',$email)
                                                ->where('ckpi_assignees.assignee_updated_status','=','Y')
                                                ->where('ckpi_assignees.assignee_completed','=','N')
                                                ->where('ckpi_assignees.is_active','=','Y')
                                                ->orderBy('ckpi_assignees.id','asc')
                                                ->get();
                                               // ->toArray();
                // Pending Assessment
                
                // Pending KPI Owner Review
                    $kpi_owner_reviews      = Ckpi_assignees::select(
                                                             
                                                                    
                                                                        'ckpi_assignees.*',
                                                                        'ckpi_assignees.id as assignee_item_id',

                                                                        'ckpi_perspectives.*',
                                                                        'ckpi_perspectives.id as perspective_item_id',

                                                                        'ckpi_indicators.*',
                                                                        'ckpi_indicators.id as indicator_item_id',

                                                                        'ckpi_groups.*',
                                                                        'ckpi_groups.id as group_item_id',

                                                                        'ckpi_apps.*',
                                                                        'ckpi_apps.id as app_item_id'
                                                                    
                                                           
                                                )
                                                ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                                ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                                ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id')   

                                                ->where('ckpi_assignees.kpi_owner_email','=',$email)
                                                ->where('ckpi_assignees.assignee_completed','=','Y')
                                                ->where('ckpi_assignees.assignee_approved_is','=','N')
                                                ->where('ckpi_assignees.is_active','=','Y')
                                                ->orderBy('ckpi_assignees.id','asc')
                                                ->get();
                                               // ->toArray();
                // Pending KPI Owner Review
                
                // Pending Checker
                    $ckpi_admin_checkers      = Ckpi_apps::select(
                                                            
                                                                         
                                                                            'ckpi_apps.*',
                                                                            'ckpi_apps.id as app_item_id',
                                                                            'users.*'
                                                                        
                                                           
                                                )    
                                                ->join('users','ckpi_apps.app_module_access','=','users.module_access') 
                                                ->whereIn('users.approver_access',['1'])
                                                ->whereIn('users.email_address',[$email])
                                                ->where('users.active','=','Y') 
                                                ->where('ckpi_apps.app_stage','=','8') 
                                                ->get();
                                               // ->toArray();
                // Pending Checker
                
                // Pending Checker Rework   
                    $ckpi_admin_checker_reworks      = Ckpi_apps::select(
                                                            
                                                                         
                                                                            'ckpi_apps.*',
                                                                            'users.*'
                                                                        
                                                            
                                                )    
                                                ->join('users','ckpi_apps.app_module_access','=','users.module_access') 
                                                ->whereIn('users.approver_access',['1'])
                                                ->whereIn('users.email_address',[$email])
                                                ->where('users.active','=','Y') 
                                                ->where('ckpi_apps.app_stage','=','9') 
                                                ->get();
                                               // ->toArray();                                          
                // Pending Checker Rework                                             

                // Pending 1st Level Approver
                    $ckpi_admin_reviewers      = Ckpi_apps::select(
                                                        
                                                                     
                                                                        'ckpi_apps.*',
                                                                        'users.*'
                                                                    
                                                        
                                            )    
                                            ->join('users','ckpi_apps.app_module_access','=','users.module_access') 
                                            ->whereIn('users.approver_access',['2'])
                                            ->whereIn('users.email_address',[$email])
                                            ->where('users.active','=','Y') 
                                            ->where('ckpi_apps.app_stage','=','10') 
                                            ->get();
                                          //  ->toArray();
                // Pending 1st Level Approver
            
                // Pending Final Approver
                    $ckpi_admin_approvers      = Ckpi_apps::select(
                                                            
                                                                         
                                                                            'ckpi_apps.*',
                                                                            'users.*'
                                                                        
                                                           
                                                )    
                                                ->join('users','ckpi_apps.app_module_access','=','users.module_access') 
                                                ->whereIn('users.approver_access',['3'])
                                                ->whereIn('users.email_address',[$email])
                                                ->where('users.active','=','Y') 
                                                ->where('ckpi_apps.app_stage','=','11') 
                                                ->get();
                                               // ->toArray();
                // Pending Final Approver
            // PENDING

            // APPROVED    
                // Approved KPI Owner Assign    
                    $approved_kpi_owner_assigns      = Ckpi_assignees::select(
                                            
                                                    
                                                        'ckpi_assignees.*',
                                                        'ckpi_assignees.id as assignee_item_id',

                                                        'ckpi_perspectives.*',
                                                        'ckpi_perspectives.id as perspective_item_id',

                                                        'ckpi_indicators.*',
                                                        'ckpi_indicators.id as indicator_item_id',

                                                        'ckpi_groups.*',
                                                        'ckpi_groups.id as group_item_id',

                                                        'ckpi_apps.*',
                                                        'ckpi_apps.id as app_item_id'
                                                    
                                            
                                )
                                ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id') 

                                ->where('ckpi_assignees.kpi_owner_email','=',$email)
                                ->where('ckpi_assignees.assignee_updated_status','=','Y')
                                ->where('ckpi_assignees.assignee_completed','=','N') 
                                ->where('ckpi_assignees.assign_is','=','Y') 

                                ->where('ckpi_assignees.is_active','=','Y')
                                ->orderBy('ckpi_assignees.id','asc')
                                ->get();
                                //->toArray();                                 
                // Approved KPI Owner Assign  

                // Approved Assessment
                    $approved_assignee_assessments   = Ckpi_assignees::select(
                                            
                                                    
                                                        'ckpi_assignees.*',
                                                        'ckpi_assignees.id as assignee_item_id',

                                                        'ckpi_perspectives.*',
                                                        'ckpi_perspectives.id as perspective_item_id',

                                                        'ckpi_indicators.*',
                                                        'ckpi_indicators.id as indicator_item_id',

                                                        'ckpi_groups.*',
                                                        'ckpi_groups.id as group_item_id',

                                                        'ckpi_apps.*',
                                                        'ckpi_apps.id as app_item_id'
                                                    
                                            
                                )
                                ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id') 

                                ->where('ckpi_assignees.assignee_email','=',$email)
                                ->where('ckpi_assignees.assignee_updated_status','=','Y')
                                ->where('ckpi_assignees.assignee_completed','=','Y')
                                ->where('ckpi_assignees.is_active','=','Y')
                                ->orderBy('ckpi_assignees.id','asc')
                                ->get();
                                //->toArray();
                // Approved Assessment

                // Approved KPI Owner Review
                    $approved_kpi_owner_reviews      = Ckpi_assignees::select(
                                            
                                                    
                                                        'ckpi_assignees.*',
                                                        'ckpi_assignees.id as assignee_item_id',

                                                        'ckpi_perspectives.*',
                                                        'ckpi_perspectives.id as perspective_item_id',

                                                        'ckpi_indicators.*',
                                                        'ckpi_indicators.id as indicator_item_id',

                                                        'ckpi_groups.*',
                                                        'ckpi_groups.id as group_item_id',

                                                        'ckpi_apps.*',
                                                        'ckpi_apps.id as app_item_id'
                                                    
                                          
                                )
                                ->join('ckpi_perspectives','ckpi_assignees.perspective_id','=','ckpi_perspectives.id')
                                ->join('ckpi_indicators','ckpi_assignees.indicator_id','=','ckpi_indicators.id')
                                ->join('ckpi_groups','ckpi_assignees.group_id','=','ckpi_groups.id')
                                ->join('ckpi_apps','ckpi_assignees.app_id','=','ckpi_apps.id')   

                                ->where('ckpi_assignees.kpi_owner_email','=',$email)
                                ->where('ckpi_assignees.assignee_completed','=','Y')
                                ->where('ckpi_assignees.assignee_approved_is','=','Y')
                                ->where('ckpi_assignees.is_active','=','Y')
                                ->orderBy('ckpi_assignees.id','asc')
                                ->get();
                                //->toArray();
                // Approved KPI Owner Review
            // APPROVED

            // CKPI Dashboard
                $completed_ckpis  = Ckpi_apps::orWhere([
                                                ['q1_final', '=', 'Y'], 
                                        ])
                                ->orWhere([
                                                ['q2_final', '=', 'Y'],  
                                        ])
                                ->orWhere([
                                                ['q3_final', '=', 'Y'],  
                                        ])
                                ->orWhere([
                                                ['q4_final', '=', 'Y'],  
                                        ])
                                ->get();
                //->toArray(); 

                // $completed_ckpis  = DB::connection('oracle')
                //                 ->table('ckpi_apps')
                //                 ->select(
                //                             DB::raw(
                //                                         "
                //                                             ckpi_apps.*,

                //                                             DECODE(ckpi_apps.Q1,
                //                                                         'Y',         'Completed',  
                //                                                         'N',         '' 
                //                                             ) Q1_1,

                //                                             DECODE(ckpi_apps.Q2,
                //                                                         'Y',         'Completed',  
                //                                                         'N',         ''  
                //                                             ) Q2_2,

                //                                             DECODE(ckpi_apps.Q3,
                //                                                         'Y',         'Completed',  
                //                                                         'N',         ''  
                //                                             ) Q3_3,

                //                                             DECODE(ckpi_apps.Q2,
                //                                                         'Y',         'Completed',  
                //                                                         'N',         '' 
                //                                             ) Q4_4
                //                                         "
                //                                     )
                //                         )
                //             ->orWhere([
                //                             ['Q1', '=', 'Y'], 
                //                     ])
                //             ->orWhere([
                //                             ['Q2', '=', 'Y'],  
                //                     ])
                //             ->orWhere([
                //                             ['Q3', '=', 'Y'],  
                //                     ])
                //             ->orWhere([
                //                             ['Q4', '=', 'Y'],  
                //                     ])
                //             ->get()
                //             ->toArray(); 
            // CKPI Dashboard
        // CKPI MODULE

        return view('home',
                    [
                        'applications'                      => 'applications',

                        // OBP
                        'pending_tasks'                     => $pending_tasks,
                        'subordinate_tasks'                 => $subordinate_tasks,
                        'division_arrs'                     => $division_arrs,
                        'department_arrs'                   => $department_arrs,
                        'section_arrs'                      => $section_arrs,
                        'my_tasks'                          => $my_tasks,

                        // CKPI
                        'submit_users'                      => $submit_users,
                        'pending_endorsers'                 => $pending_endorsers,
                        'count_pending_endorsers'           => $count_pending_endorsers,
                        'rework_users'                      => $rework_users,
                        'kpi_owner_assigns'                 => $kpi_owner_assigns,
                        'assignee_assessments'              => $assignee_assessments,
                        'kpi_owner_reviews'                 => $kpi_owner_reviews,
                        'ckpi_admin_checkers'               => $ckpi_admin_checkers,
                        'ckpi_admin_checker_reworks'        => $ckpi_admin_checker_reworks,
                        'ckpi_admin_reviewers'              => $ckpi_admin_reviewers,
                        'ckpi_admin_approvers'              => $ckpi_admin_approvers,
                        'completed_ckpis'                   => $completed_ckpis,
                        'approved_kpi_owner_assigns'        => $approved_kpi_owner_assigns,
                        'approved_assignee_assessments'     => $approved_assignee_assessments,
                        'approved_kpi_owner_reviews'        => $approved_kpi_owner_reviews,
                        // 'approved_ckpis'                 => $approved_ckpis
                    ]
                );
    }
}
