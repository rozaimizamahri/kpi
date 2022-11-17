<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiIlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_ils', function (Blueprint $table) {
            $table->bigIncrements('il_id'); 
            $table->text('il_code')->nullable(); 
            $table->text('il_value')->nullable();
            $table->text('il_description')->nullable();  

            $table->text('il_created_by_name')->nullable(); 
            $table->text('il_created_by_email')->nullable(); 
            $table->datetime('il_created_by_date')->nullable()->default(null); 
            $table->text('il_created_remark')->nullable(); 
            $table->text('il_updated_status')->nullable(); 
            $table->integer('il_updated_count')->nullable()->default(null); 
            $table->text('il_updated_by_name')->nullable(); 
            $table->text('il_updated_by_email')->nullable(); 
            $table->datetime('il_updated_by_date')->nullable()->default(null); 
            $table->text('il_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_ils');
    }
}
