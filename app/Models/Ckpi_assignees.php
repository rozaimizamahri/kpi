<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_assignees extends Model
{
    use HasFactory;
    protected $table = 'ckpi_assignees';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'indicator_id',
        'quarter_id',
        'perspective_id',
        'group_id',
        'app_id',

        'quarter_completed',

        'kpi_owner_staffno',
        'kpi_owner_name',
        'kpi_owner_email',
        'assignee_staffno',
        'assignee_name',
        'assignee_email',

        'include_is',
        'formula',
        'is_active',
        'table_type',
        'ordering_rating',
        'mof_formula',
        'mof_include',
        'assign_is',

        'main_target_type',
        'main_target',
        'ytd_target',
        'ytd_achievement',
        'achievement',
        'rating',
        'weightage',
        'weightage_score',
        'mof_achievement',

        'assignee_completed',
        'assignee_created_by_name',
        'assignee_created_by_email',
        'assignee_created_by_date',
        'assignee_created_remark',

        'assignee_updated_status',
        'assignee_updated_count',
        'assignee_updated_by_name',
        'assignee_updated_by_email',
        'assignee_updated_by_date',
        'assignee_updated_remark',

        'assignee_approved_is',
        'assignee_approved_by_name',
        'assignee_approved_by_email',
        'assignee_approved_by_date',
        'assignee_approved_remark',
        'approver'
    ];
}
