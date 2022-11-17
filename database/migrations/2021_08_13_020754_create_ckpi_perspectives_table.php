<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiPerspectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_perspectives', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->integer('group_id')->nullable()->default(null); 
            $table->integer('app_id')->nullable()->default(null); 

            $table->text('perspective_group')->nullable();  
            $table->text('perspective_perspective')->nullable();   

            $table->text('perspective_created_by_name')->nullable(); 
            $table->text('perspective_created_by_email')->nullable(); 
            $table->datetime('perspective_created_by_date')->nullable()->default(null); 
            $table->text('perspective_created_remark')->nullable(); 
            
            $table->text('perspective_updated_status')->nullable(); 
            $table->integer('perspective_updated_count')->nullable()->default(null); 
            $table->text('perspective_updated_by_name')->nullable(); 
            $table->text('perspective_updated_by_email')->nullable(); 
            $table->datetime('perspective_updated_by_date')->nullable()->default(null); 
            $table->text('perspective_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_perspectives');
    }
}
