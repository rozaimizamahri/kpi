<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_ils extends Model
{
    use HasFactory;
    protected $table = 'ckpi_ils';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'il_id',
        'il_code',
        'il_value',
        'il_description',

        'il_created_by_name',
        'il_created_by_email',
        'il_created_by_date',
        'il_created_remark',
        'il_updated_status',
        'il_updated_count',
        'il_updated_by_name',
        'il_updated_by_email',
        'il_updated_by_date',
        'il_updated_remark'
    ];
}
