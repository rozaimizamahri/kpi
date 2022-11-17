<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiPlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_pls', function (Blueprint $table) {
            $table->bigIncrements('pl_id'); 
            $table->text('pl_code')->nullable();
            $table->text('pl_value')->nullable();
            $table->text('pl_description')->nullable();  

            $table->text('pl_created_by_name')->nullable(); 
            $table->text('pl_created_by_email')->nullable(); 
            $table->datetime('pl_created_by_date')->nullable()->default(null); 
            $table->text('pl_created_remark')->nullable(); 
            $table->text('pl_updated_status')->nullable(); 
            $table->integer('pl_updated_count')->nullable()->default(null); 
            $table->text('pl_updated_by_name')->nullable(); 
            $table->text('pl_updated_by_email')->nullable(); 
            $table->datetime('pl_updated_by_date')->nullable()->default(null); 
            $table->text('pl_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_pls');
    }
}
