<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifexcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifexcess', function (Blueprint $table) {
            $table->bigIncrements('ID'); 
  
            $table->text('PERSONGRADE',3000)->nullable();
            $table->text('POSTLVL',3000)->nullable();

            $table->text('STAFFNAME',3000)->nullable();  
            $table->text('STAFFNO',3000)->nullable();  
            $table->text('ICNEW',3000)->nullable();  

            $table->datetime('JOINDATE')->nullable();  
            $table->text('JOBCODE',3000)->nullable();  
            $table->text('TITLE',3000)->nullable();  
            $table->text('STATUS',3000)->nullable();  
            $table->text('SHANDPHONE',3000)->nullable(); 

            $table->text('SEMAIL',3000)->nullable();  

            $table->text('LEVEL2',3000)->nullable();  
            $table->text('LEVEL2NAME',3000)->nullable();  
            $table->text('LEVEL3',3000)->nullable();  
            $table->text('LEVEL3NAME',3000)->nullable();  
            $table->text('LEVEL4',3000)->nullable();  
            $table->text('LEVEL4NAME',3000)->nullable();  
            $table->text('LEVEL5',3000)->nullable();  
            $table->text('LEVEL5NAME',3000)->nullable();  

            $table->text('REPORTING',3000)->nullable();  
            $table->text('BSTAFFNANME',3000)->nullable();  
            $table->text('BHANDPHONE',3000)->nullable();  
            $table->text('BEMAIL',3000)->nullable();  
            $table->datetime('DATELASTWORK')->nullable();  
            $table->datetime('OFFICIALLASTDAY')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lifexcess');
    }
}
