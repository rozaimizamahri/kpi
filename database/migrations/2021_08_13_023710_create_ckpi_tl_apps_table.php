<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiTlAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_tl_apps', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->text('tl_code')->nullable();
            $table->text('tl_group')->nullable();
            $table->text('tl_value')->nullable();
            $table->text('tl_description')->nullable();  

            $table->text('tl_created_by_name')->nullable(); 
            $table->text('tl_created_by_email')->nullable(); 
            $table->datetime('tl_created_by_date')->nullable()->default(null); 
            $table->text('tl_created_remark')->nullable(); 
            $table->text('tl_updated_status')->nullable(); 
            $table->integer('tl_updated_count')->nullable()->default(null); 
            $table->text('tl_updated_by_name')->nullable(); 
            $table->text('tl_updated_by_email')->nullable(); 
            $table->datetime('tl_updated_by_date')->nullable()->default(null); 
            $table->text('tl_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_tl_apps');
    }
}
