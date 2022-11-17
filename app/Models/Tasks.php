<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'create_dt',
        'level2name',
        'level3name',
        'level4name',
        'level5name',
        'month',
        'key_deli',
        'priority',
        'due_dt',
        'l2_id',
        'l2_name',
        'l3_id',
        'l3_name',
        'l4_id',
        'l4_name',
        'l5_id',
        'l5_name',
        'comp_pass',
        'stat',
        'remark',
        'updater_id',
        'updater_name',
        'updater_dt',
        'l2_staffno',
        'l3_staffno',
        'l4_staffno',
        'l5_staffno',
        'act_dt',
        'key_desc',
        'is_approve',
        'id_approve',
        'name_approve',
        'date_approve',
        'remark_approve',
        'due_time',
        'email_count',
        'email_dt',
        'reassign_id',
        'reassign_dt'
    ];
}
