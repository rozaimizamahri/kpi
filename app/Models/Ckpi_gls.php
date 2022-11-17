<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_gls extends Model
{
    use HasFactory;
    protected $table = 'ckpi_gls';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
      'gl_id',
      'gl_code',
      'gl_value',
      'gl_description',

      'gl_created_by_name',
      'gl_created_by_email',
      'gl_created_by_date',
      'gl_created_remark',
      'gl_updated_status',
      'gl_updated_count',
      'gl_updated_by_name',
      'gl_updated_by_email',
      'gl_updated_by_date',
      'gl_updated_remark'
    ];
}
