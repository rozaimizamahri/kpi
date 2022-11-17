<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Years extends Model
{
    use HasFactory;
    protected $table = 'years';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
       'year_id',
       'year_value',
       'year_description',

       'year_created_by_name',
       'year_created_by_email',
       'year_created_by_date',
       'year_created_remark',
       'year_updated_status',
       'year_updated_count',
       'year_updated_by_name',
       'year_updated_by_email',
       'year_updated_by_date',
       'year_updated_remark'
    ];
}
