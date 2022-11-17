<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_perspectives extends Model
{
    use HasFactory;
    protected $table = 'ckpi_perspectives';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
       'id',
       'group_id',
       'app_id',

       'perspective_group',
       'perspective_perspective',

       'perspective_created_by_name',
       'perspective_created_by_email',
       'perspective_created_by_date',
       'perspective_created_remark',

       'perspective_updated_status',
       'perspective_updated_count',
       'perspective_updated_by_name',
       'perspective_updated_by_email',
       'perspective_updated_by_date',
       'perspective_updated_remark'
    ];
}
