<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ckpi_gls;

class CkpiGlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ckpi_gls::insert(
          array(
              [
                  "gl_id" =>  1,
                  "gl_code" =>  "GROUPCKPI001",
                  "gl_value" =>  "BANK CKPI",
                  "gl_description" =>  "None",
                  "gl_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "gl_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "gl_created_by_date" =>  "2021-06-21 00:00:00",
                  "gl_created_remark" =>  "",
                  "gl_updated_status" =>  "N",
                  "gl_updated_count" =>  0,
                  "gl_updated_by_name" =>  "",
                  "gl_updated_by_email" =>  "",
                  "gl_updated_by_date" =>  null,
                  "gl_updated_remark" =>  ""
                ],
                [
                  "gl_id" =>  2,
                  "gl_code" =>  "GROUPCKPI002",
                  "gl_value" =>  "GROUP CKPI",
                  "gl_description" =>  "None",
                  "gl_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "gl_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "gl_created_by_date" =>  "2021-06-21 00:00:00",
                  "gl_created_remark" =>  "",
                  "gl_updated_status" =>  "N",
                  "gl_updated_count" =>  0,
                  "gl_updated_by_name" =>  "",
                  "gl_updated_by_email" =>  "",
                  "gl_updated_by_date" =>  null,
                  "gl_updated_remark" =>  ""
                ],
                [
                  "gl_id" =>  3,
                  "gl_code" =>  "GROUPCKPI003",
                  "gl_value" =>  "CEDAR CKPI",
                  "gl_description" =>  "None",
                  "gl_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "gl_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "gl_created_by_date" =>  "2021-06-21 00:00:00",
                  "gl_created_remark" =>  "",
                  "gl_updated_status" =>  "N",
                  "gl_updated_count" =>  0,
                  "gl_updated_by_name" =>  "",
                  "gl_updated_by_email" =>  "",
                  "gl_updated_by_date" =>  null,
                  "gl_updated_remark" =>  ""
                ],
                [
                  "gl_id" =>  4,
                  "gl_code" =>  "GROUPCKPI004",
                  "gl_value" =>  "SAM CKPI",
                  "gl_description" =>  "None",
                  "gl_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "gl_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "gl_created_by_date" =>  "2021-06-21 00:00:00",
                  "gl_created_remark" =>  "",
                  "gl_updated_status" =>  "N",
                  "gl_updated_count" =>  0,
                  "gl_updated_by_name" =>  "",
                  "gl_updated_by_email" =>  "",
                  "gl_updated_by_date" =>  null,
                  "gl_updated_remark" =>  ""
                ]
          )
        );
    }
}
