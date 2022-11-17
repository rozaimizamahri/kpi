<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_groups', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('app_id')->nullable()->default(null); 
            $table->text('group_name')->nullable();   

            $table->text('group_created_by_name')->nullable(); 
            $table->text('group_created_by_email')->nullable(); 
            $table->datetime('group_created_by_date')->nullable()->default(null); 
            $table->text('group_created_remark')->nullable(); 
            
            $table->text('group_updated_status')->nullable(); 
            $table->integer('group_updated_count')->nullable()->default(null); 
            $table->text('group_updated_by_name')->nullable(); 
            $table->text('group_updated_by_email')->nullable(); 
            $table->datetime('group_updated_by_date')->nullable()->default(null); 
            $table->text('group_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_groups');
    }
}
