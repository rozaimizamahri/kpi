<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_qls extends Model
{
    use HasFactory;
    protected $table = 'ckpi_qls';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'ql_id',
        'ql_code',
        'ql_value',
        'ql_description',

        'ql_created_by_name',
        'ql_created_by_email',
        'ql_created_by_date',
        'ql_created_remark',
        'ql_updated_status',
        'ql_updated_count',
        'ql_updated_by_name',
        'ql_updated_by_email',
        'ql_updated_by_date',
        'ql_updated_remark'
    ];
}
