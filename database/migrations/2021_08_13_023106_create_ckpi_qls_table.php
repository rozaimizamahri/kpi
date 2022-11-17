<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiQlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_qls', function (Blueprint $table) {
            $table->bigIncrements('ql_id'); 
            $table->text('ql_code')->nullable();
            $table->text('ql_value')->nullable();
            $table->text('ql_description')->nullable();  

            $table->text('ql_created_by_name')->nullable(); 
            $table->text('ql_created_by_email')->nullable(); 
            $table->datetime('ql_created_by_date')->nullable()->default(null); 
            $table->text('ql_created_remark')->nullable(); 
            $table->text('ql_updated_status')->nullable(); 
            $table->integer('ql_updated_count')->nullable()->default(null); 
            $table->text('ql_updated_by_name')->nullable(); 
            $table->text('ql_updated_by_email')->nullable(); 
            $table->datetime('ql_updated_by_date')->nullable()->default(null); 
            $table->text('ql_updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_qls');
    }
}
