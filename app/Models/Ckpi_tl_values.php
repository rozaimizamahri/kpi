<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_tl_values extends Model
{
    use HasFactory;
    protected $table = 'ckpi_tl_values';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tl_id',

        'tlv_rating',
        'tlv_value',
        'tlv_value_from',
        'tlv_value_to',
        'tlv_description',

        'tlv_created_by_name',
        'tlv_created_by_email',
        'tlv_created_by_date',
        'tlv_created_remark',
        'tlv_updated_status',
        'tlv_updated_count',
        'tlv_updated_by_name',
        'tlv_updated_by_email',
        'tlv_updated_by_date',
        'tlv_updated_remark'
    ];
}
