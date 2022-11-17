<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\Tasks;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LifeXcessController;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function obp_reports(Request $request){


        $reports = Tasks::orderBy('id','desc')
            ->get();
            //->toArray();
        if(count($reports) > 0){

            $l2_id_1 = "";
            $staffname_1 = "";
            $staffno_1 = "";

            $arr = array();
            foreach($reports as $report){

                $task_id        = $report->id;                   
                $create_dt2     = $report->create_dt2;
                $level2name     = $report->level2name;
                $level3name     = $report->level3name;
                $level4name     = $report->level4name;
                $level5name     = $report->level5name;

                $month          = $report->month;
                $key_deli       = $report->key_deli;
                $priority       = $report->priority;

                $due_dt2        = $report->due_dt2;

                $l2_id          = $report->l2_id;
                $l2_name        = $report->l2_name;
                $l3_id          = $report->l3_id;
                $l3_name        = $report->l3_name;
                $l4_id          = $report->l4_id;
                $l4_name        = $report->l4_name;
                $l5_id          = $report->l5_id;
                $l5_name        = $report->l5_name;

                $comp_pass      = $report->comp_pass;
                $stat           = $report->stat;
                $remark         = $report->remark;

                $updater_id     = $report->updater_id;
                $updater_name   = $report->updater_name;
                $updater_dt2    = $report->updater_dt2;

                $l2_staffno     = $report->l2_staffno;
                $l3_staffno     = $report->l3_staffno;
                $l4_staffno     = $report->l4_staffno;
                $l5_staffno     = $report->l5_staffno;

                $act_dt2        = $report->act_dt2;
                $key_desc       = $report->key_desc;

                $is_approve     = $report->is_approve;
                $is_approve2    = $report->is_approve2; 
                $id_approve     = $report->id_approve;
                $name_approve   = $report->name_approve;
                $date_approve2  = $report->date_approve2;
                $remark_approve = $report->remark_approve;

                $due_time       = $report->due_time;
                $email_count    = $report->email_count;
                $email_dt2      = $report->email_dt2;
                $reassign_id    = $report->reassign_id;
                $reassign_dt2   = $report->reassign_dt2;
                
                $l2_id_1            = $report->l2_id;   
                $staff_staffnames   = LifeXcessController::semail($l2_id_1);
                foreach($staff_staffnames as $staff_staffname){
                    $staffname_1 = $staff_staffname->STAFFNAME;
                    $staffno_1 = $staff_staffname->STAFFNO;
                }  

                $arr2 = array( 
                                'staff_staffname' => $staffname_1, 
                                'staff_staffno'   => $staffno_1, 
                                'task_id'         => $task_id,

                                'create_dt2'      => $create_dt2,
                                'level2name'      => $level2name,
                                'level3name'      => $level3name,
                                'level4name'      => $level4name,
                                'level5name'      => $level5name,

                                'month'           => $month,
                                'key_deli'        => $key_deli,
                                'priority'        => $priority,

                                'due_dt2'         => $due_dt2,

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
                                'updater_dt2'     => $updater_dt2,

                                'l2_staffno'      => $l2_staffno,
                                'l3_staffno'      => $l3_staffno,
                                'l4_staffno'      => $l4_staffno,
                                'l5_staffno'      => $l5_staffno,

                                'act_dt2'         => $act_dt2,
                                'key_desc'        => $key_desc,

                                'is_approve'      => $is_approve,
                                'is_approve2'     => $is_approve2, 
                                'id_approve'      => $id_approve,
                                'name_approve'    => $name_approve,
                                'date_approve2'   => $date_approve2,
                                'remark_approve'  => $remark_approve,

                                'due_time'        => $due_time,
                                'email_count'     => $email_count,
                                'email_dt2'       => $email_dt2,
                                'reassign_id'     => $reassign_id,
                                'reassign_dt2'    => $reassign_dt2
                ); 
                $arr[]  = $arr2;
                

            }

            // echo '<pre>';
            // print_r($arr);
            // echo '</pre>';

            // exit;


             


            return view('maintenances.obps.report',
                        [
                            'applications'              => 'applications',
                            'reports'              => $reports,
                            'arr'              => $arr,
                                
                        ]
                    );

        } else {

            return redirect('/home');

        }

        

    }

    public function ckpi_reports(Request $request){

        return view('maintenances.ckpis.report',
                        [
                            'applications'              => 'applications' 
                                
                        ]
                    );

    }

 
}
