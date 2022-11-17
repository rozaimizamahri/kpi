<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpiAssigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckpi_assignees', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('indicator_id')->nullable()->default(null); 
            $table->integer('quarter_id')->nullable()->default(null); 
            $table->integer('perspective_id')->nullable()->default(null); 
            $table->integer('group_id')->nullable()->default(null); 
            $table->integer('app_id')->nullable()->default(null); 

            $table->text('quarter_completed')->nullable(); 

            $table->text('kpi_owner_staffno')->nullable(); 
            $table->text('kpi_owner_name')->nullable(); 
            $table->text('kpi_owner_email')->nullable(); 
            $table->text('assignee_staffno')->nullable(); 
            $table->text('assignee_name')->nullable(); 
            $table->text('assignee_email')->nullable();   

            $table->text('include_is')->nullable();   
            $table->text('formula')->nullable();   
            $table->text('is_active')->nullable();   
            $table->text('table_type')->nullable();   
            $table->text('ordering_rating')->nullable();   
            $table->text('mof_formula')->nullable();   
            $table->text('mof_include')->nullable();   
            $table->text('assign_is')->nullable();  
    
            
            $table->text('main_target_type')->nullable();   
            $table->double('main_target', 8, 3)->nullable()->default(null); 
            $table->double('ytd_target', 8, 2)->nullable()->default(null); 
            $table->double('ytd_achievement', 8, 2)->nullable()->default(null); 
            $table->double('achievement', 8, 2)->nullable()->default(null); 
            $table->double('rating', 8, 2)->nullable()->default(null); 
            $table->double('weightage', 8, 2)->nullable()->default(null); 
            $table->double('weightage_score', 8, 2)->nullable()->default(null); 
            $table->double('mof_achievement', 8, 2)->nullable()->default(null); 

            $table->text('assignee_completed')->nullable();  
            $table->text('assignee_created_by_name')->nullable(); 
            $table->text('assignee_created_by_email')->nullable(); 
            $table->datetime('assignee_created_by_date')->nullable()->default(null); 
            $table->text('assignee_created_remark')->nullable(); 
            
            $table->text('assignee_updated_status')->nullable(); 
            $table->integer('assignee_updated_count')->nullable()->default(null);  
            $table->text('assignee_updated_by_name')->nullable(); 
            $table->text('assignee_updated_by_email')->nullable(); 
            $table->datetime('assignee_updated_by_date')->nullable()->default(null); 
            $table->text('assignee_updated_remark')->nullable();  

            $table->text('assignee_approved_is')->nullable();  
            $table->text('assignee_approved_by_name')->nullable(); 
            $table->text('assignee_approved_by_email')->nullable(); 
            $table->datetime('assignee_approved_by_date')->nullable()->default(null); 
            $table->text('assignee_approved_remark')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpi_assignees');
    }
}
