<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_apps extends Model
{
    use HasFactory;
    protected $table = 'ckpi_apps';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
       'id',
       'ref_no',
       'app_name',
       'app_status',
       'app_stage',
       'app_year',
       'app_module_access',

       'q1',
       'q2',
       'q3',
       'q4',

       'q1_final',
       'q2_final',
       'q3_final',
       'q4_final',

       'app_created_by_name',
       'app_created_by_email',
       'app_created_by_date',
       'app_created_remark',

       'app_updated_status',
       'app_updated_count',
       'app_updated_by_name',
       'app_updated_by_email',
       'app_updated_by_date',
       'app_updated_remark',

       'app_submitted_is',
       'app_submitted_by_name',
       'app_submitted_by_email',
       'app_submitted_by_date',
       'app_submitted_remark',

       'app_endorsed_is',
       'app_endorsed_by_name',
       'app_endorsed_by_email',
       'app_endorsed_by_date',
       'app_endorsed_remark',

       'app_assigned_is',
       'app_assigned_by_name',
       'app_assigned_by_email',
       'app_assigned_by_date',
       'app_assigned_remark',

       'app_assessment_is',
       'app_assessment_by_name',
       'app_assessment_by_email',
       'app_assessment_by_date',
       'app_assessment_remark',

       'app_checked_is',
       'app_checked_by_name',
       'app_checked_by_email',
       'app_checked_by_date',
       'app_checked_remark',

       'app_reviewed_is',
       'app_reviewed_by_name',
       'app_reviewed_by_email',
       'app_reviewed_by_date',
       'app_reviewed_remark',

       'app_approved_is',
       'app_approved_by_name',
       'app_approved_by_email',
       'app_approved_by_date',
       'app_approved_remark'
    ];
}
