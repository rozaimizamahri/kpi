<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_groups extends Model
{
    use HasFactory;
    protected $table = 'ckpi_groups';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
       'id',
       'app_id',
       'group_name',

       'group_created_by_name',
       'group_created_by_email',
       'group_created_by_date',
       'group_created_remark',

       'group_updated_status',
       'group_updated_count',
       'group_updated_by_name',
       'group_updated_by_email',
       'group_updated_by_date',
       'group_updated_remark'
    ];
}
