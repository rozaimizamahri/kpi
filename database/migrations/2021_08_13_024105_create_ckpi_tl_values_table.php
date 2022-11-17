<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiTlValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_tl_values', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('tl_id')->nullable()->default(null); 

            $table->text('tlv_rating')->nullable();
            $table->text('tlv_value')->nullable(); 
            
            $table->text('tlv_description')->nullable();  

            $table->text('tlv_created_by_name')->nullable(); 
            $table->text('tlv_created_by_email')->nullable(); 
            $table->datetime('tlv_created_by_date')->nullable()->default(null); 
            $table->text('tlv_created_remark')->nullable(); 
            $table->text('tlv_updated_status')->nullable(); 
            $table->integer('tlv_updated_count')->nullable()->default(null); 
            $table->text('tlv_updated_by_name')->nullable(); 
            $table->text('tlv_updated_by_email')->nullable(); 
            $table->datetime('tlv_updated_by_date')->nullable()->default(null); 
            $table->text('tlv_updated_remark')->nullable(); 

            $table->text('tlv_value_from')->nullable(); 
            $table->text('tlv_value_to')->nullable(); 
       
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_tl_values');
    }
}
