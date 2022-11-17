<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiGlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_gls', function (Blueprint $table) {
            $table->bigIncrements('gl_id'); 
            $table->text('gl_code')->nullable();
            $table->text('gl_value')->nullable();
            $table->text('gl_description')->nullable();  

            $table->text('gl_created_by_name')->nullable(); 
            $table->text('gl_created_by_email')->nullable(); 
            $table->datetime('gl_created_by_date')->nullable()->default(null); 
            $table->text('gl_created_remark')->nullable(); 
            $table->text('gl_updated_status')->nullable(); 
            $table->integer('gl_updated_count')->nullable()->default(null); 
            $table->text('gl_updated_by_name')->nullable(); 
            $table->text('gl_updated_by_email')->nullable(); 
            $table->datetime('gl_updated_by_date')->nullable()->default(null); 
            $table->text('gl_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_gls');
    }
}
