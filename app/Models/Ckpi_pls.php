<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_pls extends Model
{
    use HasFactory;
    protected $table = 'ckpi_pls';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
      'pl_id',
      'pl_code',
      'pl_value',
      'pl_description',

      'pl_created_by_name',
      'pl_created_by_email',
      'pl_created_by_date',
      'pl_created_remark',
      'pl_updated_status',
      'pl_updated_count',
      'pl_updated_by_name',
      'pl_updated_by_email',
      'pl_updated_by_date',
      'pl_updated_remark'
    ];
}
