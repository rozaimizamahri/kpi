<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_files', function (Blueprint $table) {
            $table->bigIncrements('file_id'); 
            $table->integer('assignee_id')->nullable()->default(null); 
            $table->integer('app_id')->nullable()->default(null); 

            $table->text('filename')->nullable(); 
            $table->text('filename_extension')->nullable(); 
            $table->text('filename_directory')->nullable(); 
            $table->text('filename_category')->nullable(); 
            $table->text('filename_folder')->nullable(); 

            $table->text('uploaded_by_name')->nullable(); 
            $table->text('uploaded_by_email')->nullable(); 
            $table->datetime('uploaded_by_date')->nullable()->default(null); 
            $table->text('uploaded_remark')->nullable();

            $table->text('uploaded_updated_status')->nullable(); 
            $table->integer('uploaded_updated_count')->nullable()->default(null); 
            $table->text('uploaded_updated_by_name')->nullable(); 
            $table->text('uploaded_updated_by_email')->nullable(); 
            $table->datetime('uploaded_updated_by_date')->nullable()->default(null); 
            $table->text('uploaded_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_files');
    }
}
