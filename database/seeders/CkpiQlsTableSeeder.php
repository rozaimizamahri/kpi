<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ckpi_qls;

class CkpiQlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ckpi_qls::insert(
          array(
              [
                  "ql_id" =>  1,
                  "ql_code" =>  "QUARTERCKPI001",
                  "ql_value" =>  "Q1",
                  "ql_description" =>  "None",
                  "ql_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "ql_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "ql_created_by_date" =>  "2021-06-21 00:00:00",
                  "ql_created_remark" =>  "",
                  "ql_updated_status" =>  "N",
                  "ql_updated_count" =>  0,
                  "ql_updated_by_name" =>  "",
                  "ql_updated_by_email" =>  "",
                  "ql_updated_by_date" =>  null,
                  "ql_updated_remark" =>  ""
                ],
                [
                  "ql_id" =>  2,
                  "ql_code" =>  "QUARTERCKPI002",
                  "ql_value" =>  "Q2",
                  "ql_description" =>  "None",
                  "ql_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "ql_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "ql_created_by_date" =>  "2021-06-21 00:00:00",
                  "ql_created_remark" =>  "",
                  "ql_updated_status" =>  "N",
                  "ql_updated_count" =>  0,
                  "ql_updated_by_name" =>  "",
                  "ql_updated_by_email" =>  "",
                  "ql_updated_by_date" =>  null,
                  "ql_updated_remark" =>  ""
                ],
                [
                  "ql_id" =>  3,
                  "ql_code" =>  "QUARTERCKPI003",
                  "ql_value" =>  "Q3",
                  "ql_description" =>  "None",
                  "ql_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "ql_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "ql_created_by_date" =>  "2021-06-21 00:00:00",
                  "ql_created_remark" =>  "",
                  "ql_updated_status" =>  "N",
                  "ql_updated_count" =>  0,
                  "ql_updated_by_name" =>  "",
                  "ql_updated_by_email" =>  "",
                  "ql_updated_by_date" =>  null,
                  "ql_updated_remark" =>  ""
                ],
                [
                  "ql_id" =>  4,
                  "ql_code" =>  "QUARTERCKPI004",
                  "ql_value" =>  "Q4",
                  "ql_description" =>  "None",
                  "ql_created_by_name" =>  "ANIS NUR AMIRAH BINTI HAIRUMAN",
                  "ql_created_by_email" =>  "anis.hairuman@smebank.com.my",
                  "ql_created_by_date" =>  "2021-06-21 00:00:00",
                  "ql_created_remark" =>  "",
                  "ql_updated_status" =>  "N",
                  "ql_updated_count" =>  0,
                  "ql_updated_by_name" =>  "",
                  "ql_updated_by_email" =>  "",
                  "ql_updated_by_date" =>  null,
                  "ql_updated_remark" =>  ""
                ]
          )
        );
    }
}
