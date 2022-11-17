<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ckpi_assignees;

class AddApproverToCkpiAssigneesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ckpi_assignees::where('quarter_id',1)
        ->update(
            [
                'approver' => "N"
                ]
        );

        Ckpi_assignees::where('quarter_id',2)
        ->update(
            [
                'approver' => "Y"
                ]
        );

        Ckpi_assignees::where('quarter_id',3)
        ->update(
            [
                'approver' => "N"
                ]
        );

        Ckpi_assignees::where('quarter_id',4)
        ->update(
            [
                'approver' => "N"
                ]
        );

    }
}
