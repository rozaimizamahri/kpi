<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_apps', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->text('ref_no')->nullable();
            $table->text('app_name')->nullable();
            $table->text('app_status')->nullable();
            $table->text('app_stage')->nullable();  
            $table->text('app_year')->nullable(); 
            $table->text('app_module_access')->nullable(); 

            $table->text('q1')->nullable();  
            $table->text('q2')->nullable();  
            $table->text('q3')->nullable();  
            $table->text('q4')->nullable();  

            $table->text('q1_final')->nullable();  
            $table->text('q2_final')->nullable();  
            $table->text('q3_final')->nullable();  
            $table->text('q4_final')->nullable();  

            $table->text('app_created_by_name')->nullable(); 
            $table->text('app_created_by_email')->nullable(); 
            $table->datetime('app_created_by_date')->nullable()->default(null); 
            $table->text('app_created_remark')->nullable(); 
            
            $table->text('app_updated_status')->nullable(); 
            $table->integer('app_updated_count')->nullable()->default(null); 
            $table->text('app_updated_by_name')->nullable(); 
            $table->text('app_updated_by_email')->nullable(); 
            $table->datetime('app_updated_by_date')->nullable()->default(null); 
            $table->text('app_updated_remark')->nullable(); 

            $table->text('app_submitted_is')->nullable(); 
            $table->text('app_submitted_by_name')->nullable(); 
            $table->text('app_submitted_by_email')->nullable(); 
            $table->datetime('app_submitted_by_date')->nullable()->default(null); 
            $table->text('app_submitted_remark')->nullable(); 

            $table->text('app_endorsed_is')->nullable(); 
            $table->text('app_endorsed_by_name')->nullable(); 
            $table->text('app_endorsed_by_email')->nullable(); 
            $table->datetime('app_endorsed_by_date')->nullable()->default(null); 
            $table->text('app_endorsed_remark')->nullable(); 

            $table->text('app_assigned_is')->nullable(); 
            $table->text('app_assigned_by_name')->nullable(); 
            $table->text('app_assigned_by_email')->nullable(); 
            $table->datetime('app_assigned_by_date')->nullable()->default(null); 
            $table->text('app_assigned_remark')->nullable(); 

            $table->text('app_assessment_is')->nullable(); 
            $table->text('app_assessment_by_name')->nullable(); 
            $table->text('app_assessment_by_email')->nullable(); 
            $table->datetime('app_assessment_by_date')->nullable()->default(null); 
            $table->text('app_assessment_remark')->nullable(); 

            $table->text('app_checked_is')->nullable(); 
            $table->text('app_checked_by_name')->nullable(); 
            $table->text('app_checked_by_email')->nullable(); 
            $table->datetime('app_checked_by_date')->nullable()->default(null); 
            $table->text('app_checked_remark')->nullable(); 

            $table->text('app_reviewed_is')->nullable(); 
            $table->text('app_reviewed_by_name')->nullable(); 
            $table->text('app_reviewed_by_email')->nullable(); 
            $table->datetime('app_reviewed_by_date')->nullable()->default(null); 
            $table->text('app_reviewed_remark')->nullable(); 

            $table->text('app_approved_is')->nullable(); 
            $table->text('app_approved_by_name')->nullable(); 
            $table->text('app_approved_by_email')->nullable(); 
            $table->datetime('app_approved_by_date')->nullable()->default(null); 
            $table->text('app_approved_remark')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_apps');
    }
}
