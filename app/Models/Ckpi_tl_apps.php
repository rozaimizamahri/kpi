<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_tl_apps extends Model
{
    use HasFactory;
    protected $table = 'ckpi_tl_apps';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tl_code',
        'tl_group',
        'tl_value',
        'tl_description',

        'tl_created_by_name',
        'tl_created_by_email',
        'tl_created_by_date',
        'tl_created_remark',
        'tl_updated_status',
        'tl_updated_count',
        'tl_updated_by_name',
        'tl_updated_by_email',
        'tl_updated_by_date',
        'tl_updated_remark'
    ];
}
