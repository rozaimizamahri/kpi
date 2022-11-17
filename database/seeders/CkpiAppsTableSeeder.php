<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ckpi_apps;

class CkpiAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ckpi_apps::insert(
            array(
                [
                    "id" => 1,
                    "ref_no" => "",
                    "app_name" => "2021 CORPORATE KPI",
                    "app_status" => "CHECKED",
                    "app_stage" => 8,
                    "app_year" => 2021,
                    "app_module_access" => "CKPI",
                    "q1" => "Y",
                    "q2" => "Y",
                    "q3" => "N",
                    "q4" => "N",
                    "q1_final" => "Y",
                    "q2_final" => "N",
                    "q3_final" => "N",
                    "q4_final" => "N",
                    "app_created_by_name" => "ANIS NUR AMIRAH HAIRUMAN",
                    "app_created_by_email" => "anis.hairuman@smebank.com.my",
                    "app_created_by_date" => "2021-07-03 17:06:41",
                    "app_created_remark" => "",
                    "app_updated_status" => "Y",
                    "app_updated_count" => 1,
                    "app_updated_by_name" => "ANIS NUR AMIRAH HAIRUMAN",
                    "app_updated_by_email" => "anis.hairuman@smebank.com.my",
                    "app_updated_by_date" => "2021-07-06 14:32:30",
                    "app_updated_remark" => "Submitted",
                    "app_submitted_is" => "Y",
                    "app_submitted_by_name" => "ANIS NUR AMIRAH HAIRUMAN",
                    "app_submitted_by_email" => "anis.hairuman@smebank.com.my",
                    "app_submitted_by_date" => "2021-07-06 08:34:39",
                    "app_submitted_remark" => "Submitted",
                    "app_endorsed_is" => "Y",
                    "app_endorsed_by_name" => "Raihan Aida Ismail",
                    "app_endorsed_by_email" => "raihan@smebank.com.my",
                    "app_endorsed_by_date" => "2021-07-06 16:15:29",
                    "app_endorsed_remark" => "",
                    "app_assigned_is" => "Y",
                    "app_assigned_by_name" => "",
                    "app_assigned_by_email" => "",
                    "app_assigned_by_date" => null,
                    "app_assigned_remark" => "",
                    "app_assessment_is" => "Y",
                    "app_assessment_by_name" => "Raihan Aida Ismail",
                    "app_assessment_by_email" => "raihan@smebank.com.my",
                    "app_assessment_by_date" => "2021-07-28 11:47:14",
                    "app_assessment_remark" => "Result for Compliance Index is compiled from Compliance and Audit Result (11a-c). Same result for Bank, Group, SAM and CEDAR.",
                    "app_checked_is" => "Y",
                    "app_checked_by_name" => "ANIS NUR AMIRAH HAIRUMAN",
                    "app_checked_by_email" => "anis.hairuman@smebank.com.my",
                    "app_checked_by_date" => "2021-07-05 23:26:07",
                    "app_checked_remark" => "checked",
                    "app_reviewed_is" => "Y",
                    "app_reviewed_by_name" => "RAIHAN AIDA ISMAIL",
                    "app_reviewed_by_email" => "raihan@smebank.com.my",
                    "app_reviewed_by_date" => "2021-07-05 23:25:25",
                    "app_reviewed_remark" => "reviewed",
                    "app_approved_is" => "Y",
                    "app_approved_by_name" => "AZLAN SHAHARUDDIN",
                    "app_approved_by_email" => "azlan@smebank.com.my",
                    "app_approved_by_date" => "2021-07-05 23:25:01",
                    "app_approved_remark" => "approved"
                ]
            )
        );
    }
}
