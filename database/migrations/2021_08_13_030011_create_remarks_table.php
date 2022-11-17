<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('task_id')->nullable()->default(null); 
            $table->text('remark')->nullable();  

            $table->text('by_id')->nullable(); 
            $table->text('by_name')->nullable(); 
            $table->datetime('by_dt')->nullable()->default(null); 
            $table->text('status')->nullable(); 
            $table->text('type_apply')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remarks');
    }
}
