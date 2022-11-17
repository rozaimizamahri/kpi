<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tasks', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('create_dt')->nullable()->default(null); 
            $table->text('level2name')->nullable()->default(null); 
            $table->text('level3name')->nullable()->default(null); 
            $table->text('level4name')->nullable()->default(null); 
            $table->text('level5name')->nullable()->default(null); 
            $table->text('month')->nullable()->default(null); 
            $table->text('key_deli')->nullable()->default(null); 
            $table->text('priority')->nullable()->default(null); 
            $table->datetime('due_dt')->nullable()->default(null); 
            $table->text('l2_id')->nullable()->default(null); 
            $table->text('l2_name')->nullable()->default(null); 
            $table->text('l3_id')->nullable()->default(null); 
            $table->text('l3_name')->nullable()->default(null); 
            $table->text('l4_id')->nullable()->default(null); 
            $table->text('l4_name')->nullable()->default(null); 
            $table->text('l5_id')->nullable()->default(null); 
            $table->text('l5_name')->nullable()->default(null); 
            $table->text('comp_pass')->nullable()->default(null); 
            $table->text('stat')->nullable()->default(null); 
            $table->text('remark')->nullable()->default(null); 
            $table->text('updater_id')->nullable()->default(null); 
            $table->text('updater_name')->nullable()->default(null); 
            $table->datetime('updater_dt')->nullable()->default(null); 
            $table->text('l2_staffno')->nullable()->default(null); 
            $table->text('l3_staffno')->nullable()->default(null); 
            $table->text('l4_staffno')->nullable()->default(null); 
            $table->text('l5_staffno')->nullable()->default(null); 
            $table->datetime('act_dt')->nullable()->default(null); 
            $table->text('key_desc')->nullable()->default(null); 
            $table->text('is_approve')->nullable()->default(null); 
            $table->text('id_approve')->nullable()->default(null); 
            $table->text('name_approve')->nullable()->default(null); 
            $table->datetime('date_approve')->nullable()->default(null); 
            $table->text('remark_approve')->nullable()->default(null); 
            $table->text('due_time')->nullable()->default(null); 
            $table->integer('email_count')->nullable()->default(null); 
            $table->datetime('email_dt')->nullable()->default(null); 
            $table->text('reassign_id')->nullable()->default(null); 
            $table->datetime('reassign_dt')->nullable()->default(null);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
