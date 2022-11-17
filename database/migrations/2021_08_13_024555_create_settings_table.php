<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('setting_id'); 
            $table->text('setting_value')->nullable();
            $table->text('setting_description')->nullable();  

            $table->text('setting_created_by_name')->nullable(); 
            $table->text('setting_created_by_email')->nullable(); 
            $table->datetime('setting_created_by_date')->nullable()->default(null); 
            $table->text('setting_created_remark')->nullable(); 
            $table->text('setting_updated_status')->nullable(); 
            $table->integer('setting_updated_count')->nullable()->default(null); 
            $table->text('setting_updated_by_name')->nullable(); 
            $table->text('setting_updated_by_email')->nullable(); 
            $table->datetime('setting_updated_by_date')->nullable()->default(null); 
            $table->text('setting_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
