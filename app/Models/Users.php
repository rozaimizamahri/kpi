<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
       'user_id',
       'pw',
       'staff_name',
       'email_address',
       'ext_no',
       'token_jwt',
       'level_access',
       'module_access',
       'approver_access',

       'active',
       'last_login',
       'last_logout',

       'created_by_name',
       'created_by_email',
       'created_by_date',
       'created_remark',
       'updated_status',
       'updated_count',
       'updated_by_name',
       'updated_by_email',
       'updated_by_date',
       'updated_remark'
    ];
}
