<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ckpi_groups;

class CkpiGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ckpi_groups::insert(
            array(
                [
                    "id" =>  1,
                    "app_id" =>  1,
                    "group_name" =>  "BANK CKPI",
                    "group_created_by_name" =>  "ANIS NUR AMIRAH HAIRUMAN",
                    "group_created_by_email" =>  "anis.hairuman@smebank.com.my",
                    "group_created_by_date" =>  "2021-07-03 17:06:41",
                    "group_created_remark" =>  "created via create list",
                    "group_updated_status" =>  "N",
                    "group_updated_count" =>  0,
                    "group_updated_by_name" =>  "",
                    "group_updated_by_email" =>  "",
                    "group_updated_by_date" =>  null,
                    "group_updated_remark" =>  ""
                ],
                [
                    "id" =>  2,
                    "app_id" =>  1,
                    "group_name" =>  "GROUP CKPI",
                    "group_created_by_name" =>  "ANIS NUR AMIRAH HAIRUMAN",
                    "group_created_by_email" =>  "anis.hairuman@smebank.com.my",
                    "group_created_by_date" =>  "2021-07-03 17:06:41",
                    "group_created_remark" =>  "created via create list",
                    "group_updated_status" =>  "N",
                    "group_updated_count" =>  0,
                    "group_updated_by_name" =>  "",
                    "group_updated_by_email" =>  "",
                    "group_updated_by_date" =>  null,
                    "group_updated_remark" =>  ""
                ],
                [
                    "id" =>  3,
                    "app_id" =>  1,
                    "group_name" =>  "CEDAR CKPI",
                    "group_created_by_name" =>  "ANIS NUR AMIRAH HAIRUMAN",
                    "group_created_by_email" =>  "anis.hairuman@smebank.com.my",
                    "group_created_by_date" =>  "2021-07-03 17:06:41",
                    "group_created_remark" =>  "created via create list",
                    "group_updated_status" =>  "N",
                    "group_updated_count" =>  0,
                    "group_updated_by_name" =>  "",
                    "group_updated_by_email" =>  "",
                    "group_updated_by_date" =>  null,
                    "group_updated_remark" =>  ""
                ],
                [
                    "id" =>  4,
                    "app_id" =>  1,
                    "group_name" =>  "SAM CKPI",
                    "group_created_by_name" =>  "ANIS NUR AMIRAH HAIRUMAN",
                    "group_created_by_email" =>  "anis.hairuman@smebank.com.my",
                    "group_created_by_date" =>  "2021-07-03 17:06:41",
                    "group_created_remark" =>  "created via create list",
                    "group_updated_status" =>  "N",
                    "group_updated_count" =>  0,
                    "group_updated_by_name" =>  "",
                    "group_updated_by_email" =>  "",
                    "group_updated_by_date" =>  null,
                    "group_updated_remark" =>  ""
                ]
            )
        );
    }
}
