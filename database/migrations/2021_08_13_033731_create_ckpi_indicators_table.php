<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_indicators', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('quarter_id')->nullable()->default(null); 
            $table->integer('perspective_id')->nullable()->default(null); 
            $table->integer('group_id')->nullable()->default(null); 
            $table->integer('app_id')->nullable()->default(null); 

            $table->text('indicator_quarter')->nullable(); 
            $table->text('indicator_perspective')->nullable();  
            $table->text('indicator_group')->nullable();  
            $table->text('indicator_indicator')->nullable();
            $table->text('indicator_status')->nullable();

            $table->text('indicator_completed')->nullable(); 

            $table->text('indicator_created_by_name')->nullable(); 
            $table->text('indicator_created_by_email')->nullable(); 
            $table->datetime('indicator_created_by_date')->nullable()->default(null); 
            $table->text('indicator_created_remark')->nullable(); 
            
            $table->text('indicator_updated_status')->nullable(); 
            $table->integer('indicator_updated_count')->nullable()->default(null); 
            $table->text('indicator_updated_by_name')->nullable(); 
            $table->text('indicator_updated_by_email')->nullable(); 
            $table->datetime('indicator_updated_by_date')->nullable()->default(null); 
            $table->text('indicator_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_indicators');
    }
}
