<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_indicators extends Model
{
    use HasFactory;
    protected $table = 'ckpi_indicators';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'quarter_id',
        'perspective_id',
        'group_id',
        'app_id',

        'indicator_quarter',
        'indicator_perspective',
        'indicator_group',
        'indicator_indicator',
        'indicator_status',

        'indicator_completed',

        'indicator_created_by_name',
        'indicator_created_by_email',
        'indicator_created_by_date',
        'indicator_created_remark',

        'indicator_updated_status',
        'indicator_updated_count',
        'indicator_updated_by_name',
        'indicator_updated_by_email',
        'indicator_updated_by_date',
        'indicator_updated_remark'
    ];
}
