<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;

    // protected $guarded      = [];

    protected $fillable = [
        'setting_id',
        'setting_value',
        'setting_description',

        'setting_created_by_name',
        'setting_created_by_email',
        'setting_created_by_date',
        'setting_created_remark',
        'setting_updated_status',
        'setting_updated_count',
        'setting_updated_by_name',
        'setting_updated_by_email',
        'setting_updated_by_date',
        'setting_updated_remark'
    ];
}
