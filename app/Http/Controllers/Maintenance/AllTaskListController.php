<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AllTaskListController extends Controller
{
    public function alltasklists(Request $request){

        return view('maintenances.obps.alltasklist',
                        [
                            'applications'              => 'applications' 
                                
                        ]
                    );

    }
}
