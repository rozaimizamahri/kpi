<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->bigIncrements('year_id'); 
            $table->text('year_value')->nullable();
            $table->text('year_description')->nullable();  

            $table->text('year_created_by_name')->nullable(); 
            $table->text('year_created_by_email')->nullable(); 
            $table->datetime('year_created_by_date')->nullable()->default(null); 
            $table->text('year_created_remark')->nullable(); 
            $table->text('year_updated_status')->nullable(); 
            $table->integer('year_updated_count')->nullable()->default(null); 
            $table->text('year_updated_by_name')->nullable(); 
            $table->text('year_updated_by_email')->nullable(); 
            $table->datetime('year_updated_by_date')->nullable()->default(null); 
            $table->text('year_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('years');
    }
}
