<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

class CkpiSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert(
            array(
                [ 
                    'setting_id'               => '1',
                    'setting_value'            => 'NO',
                    'setting_description'      => 'Enrolment period close if NO, otherwise open',  
                    'setting_created_by_name'  => 'ROZAIMI BIN ZAMAHRI',
                    'setting_created_by_email' => 'rozaimi.zamahri@smebank.com.my',
                    'setting_created_by_date'  => null,
                    'setting_created_remark'   => 'default remark',
                    'setting_updated_status'   => 'N',
                    'setting_updated_count'    => '0',
                    'setting_updated_by_name'  => 'ROZAIMI BIN ZAMAHRI',
                    'setting_updated_by_email' => 'rozaimi.zamahri@smebank.com.my',
                    'setting_updated_by_date'  => null,
                    'setting_updated_remark'   => 'default remark'
                    
                ]
            )
        );
    }
}
