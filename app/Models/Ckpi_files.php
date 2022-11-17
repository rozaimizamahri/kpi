<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_files extends Model
{
    use HasFactory;
    protected $table = 'ckpi_files';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'file_id',
        'assignee_id',
        'app_id',

        'filename',
        'filename_extension',
        'filename_directory',
        'filename_category',
        'filename_folder',

        'uploaded_by_name',
        'uploaded_by_email',
        'uploaded_by_date',
        'uploaded_remark',

        'uploaded_updated_status',
        'uploaded_updated_count',
        'uploaded_updated_by_name',
        'uploaded_updated_by_email',
        'uploaded_updated_by_date',
        'uploaded_updated_remark'
    ];
}
