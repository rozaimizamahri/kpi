<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id'); 
            $table->text('pw')->nullable();
            $table->text('staff_name')->nullable();
            $table->text('email_address')->nullable();
            $table->text('ext_no')->nullable();
            $table->text('token_jwt')->nullable();  
            $table->text('level_access')->nullable(); 
            $table->text('module_access')->nullable(); 
            $table->text('approver_access')->nullable(); 

            $table->text('active')->nullable(); 
            $table->datetime('last_login')->nullable()->default(null); 
            $table->datetime('last_logout')->nullable()->default(null); 

            $table->text('created_by_name')->nullable(); 
            $table->text('created_by_email')->nullable(); 
            $table->datetime('created_by_date')->nullable()->default(null); 
            $table->text('created_remark')->nullable(); 
            $table->text('updated_status')->nullable(); 
            $table->integer('updated_count')->nullable()->default(null); 
            $table->text('updated_by_name')->nullable(); 
            $table->text('updated_by_email')->nullable(); 
            $table->datetime('updated_by_date')->nullable()->default(null); 
            $table->text('updated_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
