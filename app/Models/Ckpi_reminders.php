<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ckpi_reminders extends Model
{
    use HasFactory;
    protected $table = 'ckpi_reminders';
    protected $connection = 'pgsql';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'reminder_id',
        'reminder_subject',
        'reminder_description',
        'reminder_type',

        'reminder_sent_by_name',
        'reminder_sent_by_email',
        'reminder_sent_by_date',
        'reminder_sent_remark'
    ];
}
