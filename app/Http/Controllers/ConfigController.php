<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{ 
    public static function stageInfo(){

        /*
            1  - DRAFT 
            2  - ENDORSED
            3  - REWORKUSER
            4  - ASSIGNED       (PENDING AT L2 KPI OWNER) - TO ASSIGN STAFF
            5  - ASSESSMENT     (ASSIGNEE UPDATE KPI)
            6  - REWORKASSIGNEE (REWORK BY ASSIGNEE)
            7  - REVIEWED       (PENDING AT KPI OWNER FOR APPROVAL)
            8  - CHECKED        (PENDING AT CHECKED CKPI ADMIN)
            9  - REWORKCHECK    (REWORK BY CKPI ADMIN)
            10 - APPROVAL       (PENDING AT FIRST APPROVER)
            11 - FINALAPPROVAL  (PENDING AT FINAL APPROVER)
            12 - COMPLETED
            13 - REJECTED
            14 - KIV
            15 - AUTOCLOSED
        */ 

    }
    
    public static function getTitle(){
        $title = "OBPXcess [UAT]";
        // $title = "OBPXcess";
        return $title;
    }

    public static function getBcc(){
        // $bccemail = "rozaimi.zamahri@smebank.com.my, anis.hairuman@smebank.com.my, raihan@smebank.com.my, yusri_nabihah@smebank.com.my, zuhri@smebank.com.my, mohamad.sufian@smebank.com.my"; 
        $bccemail = ""; 
        return $bccemail;
    }

    public static function insertTestText(){
        $text_ = "";
        // $text_ = "";
        return $text_;
    }

    public static function helpDeskLink(){
        $cbs = "http://cbs-helpdesk.smebank.net";
        return $cbs;
    }
}
