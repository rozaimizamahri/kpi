<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_reminders', function (Blueprint $table) {
            $table->bigIncrements('reminder_id'); 
            $table->text('reminder_subject')->nullable(); 
            $table->text('reminder_description')->nullable();
            $table->text('reminder_type')->nullable();  

            $table->text('reminder_sent_by_name')->nullable(); 
            $table->text('reminder_sent_by_email')->nullable(); 
            $table->datetime('reminder_sent_by_date')->nullable()->default(null); 
            $table->text('reminder_sent_remark')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_reminders');
    }
}
