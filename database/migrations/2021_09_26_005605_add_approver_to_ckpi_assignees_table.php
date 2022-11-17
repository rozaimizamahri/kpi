<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApproverToCkpiAssigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ckpi_assignees', function (Blueprint $table) {
            $table->text('approver')->nullable()->default(null); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ckpi_assignees', function (Blueprint $table) {
            $table->dropColumn('approver');
        }); 
    }
}
