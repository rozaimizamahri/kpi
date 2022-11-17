<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifexcess extends Model
{
    use HasFactory;

    // UAT
        // protected $table = 'lifexcess';
        // protected $connection = 'pgsql';
    // UAT

    // Production
        protected $table = 'VEFORMSTAFFLISTING';
        protected $connection = 'sqlsrv';
    // Production

    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'PERSONGRADE',
        'POSTLVL',

        'STAFFNAME',
        'STAFFNO',
        'ICNEW',

        'JOINDATE',
        'JOBCODE',
        'TITLE',
        'STATUS',
        'SHANDPHONE',
        'SEMAIL',

        'LEVEL2',
        'LEVEL2NAME',
        'LEVEL3',
        'LEVEL3NAME',
        'LEVEL4',
        'LEVEL4NAME',
        'LEVEL5',
        'LEVEL5NAME',
        
        'REPORTING',
        'BSTAFFNANME',
        'BHANDPHONE',
        'BEMAIL',
        'DATELASTWORK',
        'OFFICIALLASTDAY'
    ];
}
