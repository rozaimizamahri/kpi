@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        @forelse($apps as $application)
        @empty
        @endforelse
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">CKPI List [Checker]</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">Checker</li>
                </ol>
            </div>
            <div>
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== --> 


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
        <div class="container-fluid">

            <!-- 1st Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12"> 

                        <!-- Session -->                             
                            @if(Session::has('not_approved'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('not_approved')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 
                        
                            @if(Session::has('checker_current_assignee'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('checker_current_assignee')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('checker_current_assignee_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('checker_current_assignee_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif
                        <!-- Session -->

                        <!-- List -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">CKPI Stages</h4>
                                </div>
                                <div class="card-body collapse show"> 
                                    <div class="card">
                                        <div class="card-body"> 

                                        <div class="md-stepper-horizontal green">
                                            
                                            <div class="md-step done
                                                    <?php 
                                                        $stage = $application->app_stage; 
                                                        if(($stage == 1) || ($stage == 3)){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?>
                                                ">
                                                <div class="md-step-circle"><span>1</span></div>
                                                <div class="md-step-title">Author</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done 
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if($stage == 2){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>2</span></div>
                                                <div class="md-step-title">Endorser</div>
                                                <div class="md-step-optional">(Superior / Hod)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if($stage == 4){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>3</span></div>
                                                <div class="md-step-title">Assign to staff</div>
                                                <div class="md-step-optional">(KPI Owner)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div> 

                                            <div class="md-step done
                                                    <?php 
                                                        $stage = $application->app_stage; 
                                                        if(($stage == 5) || ($stage == 6)){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>4</span></div>
                                                <div class="md-step-title">Assignee</div>
                                                <div class="md-step-optional">(KPI Result)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>


                                            <div class="md-step done
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if($stage == 7){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>5</span></div>
                                                <div class="md-step-title">Approval</div>
                                                <div class="md-step-optional">(KPI Owner)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>


                                            <div class="md-step done 
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if(($stage == 8) || ($stage == 9)){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>6</span></div>
                                                <div class="md-step-title">Checker Review</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done 
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if($stage == 10){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>7</span></div>
                                                <div class="md-step-title">1st Approver</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done 
                                                    <?php 
                                                        $stage = $application->app_stage;
                                                        if($stage == 11){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>8</span></div>
                                                <div class="md-step-title">Final Approver</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done 
                                                    <?php 
                                                        $stage = $application->app_stage; 
                                                        if(($stage == 12) || ($stage == 13) || ($stage == 14) || ($stage == 15)){
                                                            echo "active";
                                                        } else {

                                                        }
                                                    ?> 
                                                ">
                                                <div class="md-step-circle"><span>9</span></div>
                                                <div class="md-step-title">Completed</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>
                                        </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        <!-- List -->

                    </div>
                </div>
            <!-- 1st Row -->

            <!-- 2nd Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12"> 
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#checker" role="tab">Checker Comment</a> </li>     
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviewer" role="tab">Reviewer Comment</a> </li>     
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#approver" role="tab">Approver Comment</a>  </li>  
                                </ul>
                            <!-- Nav tabs -->

                            <div class="tab-content">

                                <!-- First Tab (Reviewer) -->
                                    <div class="tab-pane active" id="checker" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Checker By </small>
                                            <h6>{{$application->app_checked_by_name}}</h6>   

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Checker Date/Time </small>
                                            <h6>{{$application->app_checked_by_date}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Checker Remark </small>
                                            <h6>{{$application->app_checked_remark}}</h6>          
                                            
                                        </div>
                                    </div>
                                <!-- First Tab (Reviewer) -->

                                <!-- Second Tab (Reviewer) -->
                                    <div class="tab-pane" id="reviewer" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Reviewer By </small>
                                            <h6>{{$application->app_reviewed_by_name}}</h6>   

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Reviewer Date/Time </small>
                                            <h6>{{$application->app_reviewed_by_date}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Reviewer Remark </small>
                                            <h6>{{$application->app_reviewed_remark}}</h6>          
                                            
                                        </div>
                                    </div>
                                <!-- Second Tab (Reviewer) -->

                                <!-- Third Tab (Approver) -->
                                    <div class="tab-pane" id="approver" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Approver By </small>
                                            <h6>{{$application->app_approved_by_name}}</h6>   

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Approver Date/Time </small>
                                            <h6>{{$application->app_approved_by_date}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Approver Remark </small>
                                            <h6>{{$application->app_approved_remark}}</h6>          
                                            
                                        </div>
                                    </div>
                                <!-- Third Tab (Approver) -->

                            </div> 

                        </div> 
                    </div>
                </div>
            <!-- 2nd Row -->

            <!-- 3rd Row -->
                <div class="row">

                    <input type="hidden" id="application_id" class="form-control application_id" name='application_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">    

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail" role="tab">General Details</a> </li>     
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#table" role="tab">Table</a>  </li> 
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quarter" role="tab">Quarter</a>  </li> 
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#curassignee" role="tab"><font color="red">*</font>Active Quarter (Review & Edit)</a>  </li> 
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#declare" role="tab"><font color="red">*</font> Declare </a>  </li> 
                                </ul>
                            <!-- Nav tabs --> 

                            <div class="tab-content">
                                
                                <!-- First Tab (Detail) -->  
                                    <div class="tab-pane" id="detail" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> References Number </small>
                                            <h6>{{$application->ref_no}}</h6>   

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> CKPI Name </small>
                                            <h6>{{$application->app_name}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Status </small>
                                            <h6>{{$application->app_status}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Stage </small>
                                            <h6>{{$application->app_stage}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Year </small>
                                            <h6>{{$application->app_year}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Created By / Date Time </small>
                                            <h6>{{$application->app_created_by_name}} - {{$application->app_created_by_date}}</h6>

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Updated By / Date Time </small>
                                            <h6>{{$application->app_updated_by_name}} - {{$application->app_updated_by_date}}</h6>         
                                            
                                        </div>
                                    </div>
                                <!-- First Tab (Detail) -->   

                                <!-- Second Tab (Table) -->
                                    <div class="tab-pane" id="table" role="tabpanel">
                                        <div class="card-body"> 

                                            <?php
                                                if(count($tl_app_arrs) != 0)
                                                {
                                                    $tl_app = 0;
                                                    $tl_value = 1;
                                                    $count_table = 0; 

                                                    $count_table_rating = count($tl_app_arrs);

                                                    foreach($tl_app_arrs as $tl_app_arr)
                                                    {?> 

                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <div class="card-actions">
                                                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                </div>
                                                                <h4 class="card-title m-b-0"><?php echo $tl_app_arr[4]; ?> (<?php echo $tl_app_arr[3]; ?>)
                                                                </h4>
                                                            </div>
                                                            <div class="card-body collapse show">

                                                                <?php
                                                                    

                                                                    foreach($tl_value_arrs[$tl_app] as $tl_value_arr){
                                                                        
                                                                        // echo $count_table;
                                                                        
                                                                        ?>

                                                                        <div class="table-responsive">  
                                                                            <table id="table-tlapp<?php echo $tl_app_arr[0]; ?>" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                                                    <tr>   
                                                                                        <th style="vertical-align:top;">Group</th>    
                                                                                        <th style="vertical-align:top;">Name</th> 
                                                                                        <th style="vertical-align:top;">Rating</th>      
                                                                                        <th style="vertical-align:top;">Value</th>       
                                                                                    </tr>   
                                                                                </thead> 
                                                                                <tbody>  
                                                                                    <?php
                                                                                        $tl_value2 = 0;
 
                                                                                        foreach($tl_value_4_arrs[$tl_value] as $tl_value_4_arr){
                                                                                            
                                                                                        ?>
                                                                                            <tr> 
                                                                                                <td>
                                                                                                    <span id="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[3]; ?></span>
                                                                                                    <input type="hidden" id="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tl_group[]" value="<?php echo $tl_value_4_arr[3]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[4]; ?></span>
                                                                                                    <input type="hidden" id="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tl_value[]" value="<?php echo $tl_value_4_arr[4]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[5]; ?></span>
                                                                                                    <input type="hidden" id="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tlv_rating[]" value="<?php echo $tl_value_4_arr[5]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[6]; ?></span>
                                                                                                    <input type="hidden" id="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tlv_value[]" value="<?php echo $tl_value_4_arr[6]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td>  
                                                                                            </tr>                                                                                            
                                                                                        <?php
                                                                                            $tl_value++; 
                                                                                            $tl_value2++;
                                                                                        } 
                                                                                    ?>     
                                                                                </tbody>   
                                                                            </table> 
                                                                        </div>  

                                                                    <?php
                                                                        $count_table++; 
                                                                    }
                                                                ?>


                                                            </div>
                                                        </div>

                                                    <?php 
                                                        $tl_app++;
                                                    } ?>

                                                    <input type="hidden" id="count_table_rating" class="count_table_rating" name="count_table_rating[]" value="<?php echo $count_table_rating; ?>">

                                                <?php
                                                }
                                            ?> 

                                        </div>
                                    </div>
                                <!-- Second Tab (Table) -->

                                <!-- Third Tab (Quarter) -->
                                    <div class="tab-pane" id="quarter" role="tabpanel">
                                        <div class="card-body"> 
                                            <?php
                                                if(count($quarter_arrs) != 0)
                                                {
                                                    $a                          = 0;
                                                    $group                      = 0; 
                                                    $count                      = 1;
                                                    $z                          = 0;
                                                    $perspective                = 0;
                                                    $count_sum_weigtage_score   = 0;

                                                    $count_perspective2 = count($perspective_arrs);
                                                    // echo $count_perspective2;

                                                    foreach($quarter_arrs as $quarter_arr)
                                                    {?> 
                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <div class="card-actions">
                                                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                </div>
                                                                <h4 class="card-title m-b-0">Q<?php echo $quarter_arr[3]; ?><?php if($quarter_arr[16] == 'Y'){ echo ' (Active) <i class="mdi mdi-checkbox-marked-circle text-success"></i>  '; } else { echo ' (Inactive) <i class="mdi mdi-pencil-circle text-warning"></i>'; } ?>
                                                                </h4>
                                                            </div>
                                                            <div class="card-body collapse <?php if($quarter_arr[16] == 'Y'){ echo 'show'; } else { echo ''; } ?>">

                                                                <?php    
                                                                    

                                                                    foreach($group_arrs[$group] as $group_arr){?>

                                                                        <div class="card card-default">
                                                                            <div class="card-header">
                                                                                <div class="card-actions">
                                                                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                                </div>
                                                                                <h4 class="card-title m-b-0"><?php echo $group_arr[1]; ?>
                                                                                </h4>
                                                                            </div>
                                                                            <div class="card-body collapse show">

                                                                                <!-- START -->  
                                                                                    <div class="table-responsive">  
                                                                                        <table id="table-assignee<?php echo $perspective; ?>" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                            <thead style="background-color:#5b626b; color:#ffffff;">
                                                                                                <tr>  
                                                                                                    <th style="vertical-align:top;">No</th>   
                                                                                                    <!-- <th style="vertical-align:top;">Group</th>    -->
                                                                                                    <!-- <th style="vertical-align:top;">Quarter</th>    -->
                                                                                                    <th style="vertical-align:top;">Perspective</th> 
                                                                                                    <th style="vertical-align:top;">Indicators</th>   
                                                                                                    <th style="vertical-align:top;">Unit(Number/Percentage)</th>  
                                                                                                    
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;">Target <?php echo $application->app_year; ?></th>     
                                                                                                    <th style="vertical-align:top;">YTD Target</th>    
                                                                                                    <th style="vertical-align:top;">YTD Achievement</th>    
                                                                                                    <th style="vertical-align:top;">Achievement %</th>    
                                                                                                    <th style="vertical-align:top;">Rating</th>    
                                                                                                    <th style="vertical-align:top;">Weightage %</th>    
                                                                                                    <th style="vertical-align:top;">Weightage Score</th>    
                                                                                                    <th style="vertical-align:top;">MOF Achievement %</th>    

                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner</th>
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee (Officer In Charge)</th> 
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Supporting Document</th> 
                                                                                                </tr>   
                                                                                            </thead> 
                                                                                            <tbody> 
                                                                                                <?php 
                                                                                                    $count_1 = 1;
                                                                                                    foreach($perspective_arrs[$perspective] as $perspective_arrs2){  
                                                                                                        ?> 
                                                                                                            <tr>  
                                                                                                                <td><?php echo $count_1++; ?></td> 
                                                                                                                <!-- <td><?php // echo $perspective_arrs2[4]; ?></td>    -->
                                                                                                                <!-- <td><?php // echo $perspective_arrs2[2]; ?></td>    -->
                                                                                                                <td><?php echo $perspective_arrs2[3]; ?></td>   
                                                                                                                <td><?php echo $perspective_arrs2[1]; ?></td>   
                                                                                                                <td><?php echo $perspective_arrs2[18]; ?></td>   
                                                                                                                

                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[8]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[9]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[10]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[11]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[12]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[13]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[14]; ?></td>     
                                                                                                                <td style="text-align:right;"><?php echo $perspective_arrs2[15]; ?></td>   

                                                                                                                <td><?php echo $perspective_arrs2[6]; ?></td>   
                                                                                                                <td><?php echo $perspective_arrs2[7]; ?></td>   

                                                                                                                <td> 
                                                                                                                    <a href="{{url('/ckpis/assessment/download')}}/<?php echo htmlentities($perspective_arrs2[16]); ?>/download"  class="">
                                                                                                                        <i class="mdi mdi-file-find"><?php echo $perspective_arrs2[17]; ?></i>
                                                                                                                    </a>	 
                                                                                                                </td> 
                                                                                                            </tr> 
                                                                                                        <?php   
                                                                                                    }
                                                                                                ?>
                                                                                            </tbody>    
                                                                                            <tfoot>
                                                                                                <?php  
                                                                                                    foreach($group_sum_arrs[$perspective] as $group_sum_arr){

                                                                                                        // echo ''.$group_sum_arr[0].'<br/>';
                                                                                                        // echo ''.$group_sum_arr[1].'<br/>';
                                                                                                        // echo ''.$group_sum_arr[2].'<br/>';
                                                                                                        // echo ''.$group_sum_arr[3].'<br/><br/>';

                                                                                                        $total = ($group_sum_arr[1]) / ($group_sum_arr[0]); 
                                                                                                        $total2 = $total * 100;
                                                                                                        
                                                                                                    
                                                                                                    ?> 

                                                                                                        <input type="hidden" id="sum_weightage_score<?php echo $count_sum_weigtage_score; ?>" class="form-control sum_weightage_score<?php echo $count_sum_weigtage_score; ?>" name="sum_weightage_score[]" value="<?php echo $total2; ?>" />

                                                                                                        <tr style="background-color:#5b626b; color:#ffffff;">
                                                                                                            <td style="text-align:center;" colspan="9"><strong>Overall Score</strong><br/> Overall Rating</td> 
                                                                                                            <td style="text-align:right;"><?php echo number_format($group_sum_arr[0], 2, '.', ','); ?></td> 
                                                                                                            <td style="text-align:right;"><?php echo number_format($total2, 2, '.', ','); ?> <br/> <span id="sum_rating<?php echo $count_sum_weigtage_score; ?>" class="sum_rating<?php echo $count_sum_weigtage_score; ?>"></span> </td> 
                                                                                                            <td style="text-align:right;"><?php echo number_format($group_sum_arr[3], 2, '.', ','); ?></td>  
                                                                                                            <td style="text-align:right;" colspan="3"></td>  
                                                                                                        </tr> 

                                                                                                    <?php     
                                                                                                        $count_sum_weigtage_score++;
                                                                                                    }
                                                                                                ?>

                                            
                                                                                                
                                                                                            </tfoot> 
                                                                                            
                                                                                        </table> 
                                                                                    </div>  

                                                                                    <input type="hidden" id="table_assignee<?php echo $z; ?>" class="table_assignee_test table_assignee<?php echo $z; ?>" name="table_assignee<?php echo $z; ?>" value="<?php echo $z; ?>">
                                                                                <!-- END -->

                                                                            </div>
                                                                        </div>  
                                                                    <?php 
                                                                        $z++;
                                                                        $perspective++;
                                                                    }
                                                                ?> 
                                                                
                                                            </div>
                                                        </div> 
                                                    <?php 
                                                        
                                                        $group++;
                                                    
                                                    }

                                                } 
                                            ?>  

                                            <input type="hidden" id="count_ws" class="count_ws_test count_ws" name="count_ws[]" value="<?php echo $count_perspective2; ?>">
                                            <input type="hidden" id="count_export" class="count_ws_test count_export" name="count_export[]" value="<?php echo $count_perspective2; ?>">
                                        </div>
                                    </div>
                                <!-- Third Tab (Quarter) -->

                                <!-- Fourth Tab (Current Quarter) -->
                                    <div class="tab-pane active" id="curassignee" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <?php
                                                            $current_active_quarter = "";
                                                            foreach($assignees2 as $assignee2_title){
                                                                $current_active_quarter = $assignee2_title->quarter_id;
                                                            }
                                                        ?>
                                                        <h4 class="card-title m-b-0">Current Quarter (Q<?php echo $current_active_quarter; ?>)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">   

                                                        <form id='form-current-quarter' class="form-current-quarter" name="form-current-quarter" action="{{url('/ckpis/checker/updateCurrentAssignee')}}" method="post" enctype="multipart/form-data">
                                                        @csrf    

                                                            <div class="table-responsive"> 
                                                                <table id="table-curassignee" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                                        <tr>
                                                                            <th style="vertical-align:top;">No</th>     
                                                                            <th style="vertical-align:top;" >Group Name</th>    
                                                                            <th style="vertical-align:top;" >Perspective</th> 
                                                                            <th style="vertical-align:top;" >Indicators</th>   

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Rating Table References</th> 
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Rating Ordering</th> 
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 400px;max-width: 400px;" >Formula <br/> (To get Achievement % / Rating / Weightage Score) </th>  
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;" >Include this <br/> into total ?</th>  

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Target <?php echo $application->app_year; ?></th>    
                                                                             
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >YTD Target</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >YTD <br/>Achievement</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Achievement %</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Rating</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Weightage %</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >Weightage <br/>Score</th>  
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;" >Formula <br/> (To get MOF Achivement%) </th> 
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;" >Include this <br/> for MOF total ?</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;" >MOF <br/>Achievement</th>   

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;" >KPI Owner</th>
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;" >KPI Owner Approve / Rework ?</th>   

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;" >Assignee</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;" >Supporting Document</th>    
                                                                        </tr>   
                                                                    </thead> 
                                                                    <tbody>   
                                                                        <?php 
                                                                        
                                                                            $arr3       = array();
                                                                            foreach($staffs_l2 as $staff3){    
                                                                                $arr4   = array();
                                                                                $arr4[] = $staff3;
                                                                                $arr3[] = $arr4;  
                                                                            }   
                                                                        

                                                                            $arr5        = array();
                                                                            foreach($staffs6 as $staff6){    
                                                                                $arr6 = array(); 
                                                                                $arr6[] = $staff6;
                                                                                $arr5[]  = $arr6; 
                                                                            }   

                                                                            $arr7        = array();
                                                                            foreach($tl_apps as $tl_app){    
                                                                                $arr8 = array(); 
                                                                                $arr8[] = $tl_app;
                                                                                $arr7[]  = $arr8;   
                                                                            } 
                                                                            
                                                                            $count_assignees2 = count($assignees2);

                                                                            $i_count2 = 1;
                                                                            foreach($assignees2 as $assignee2){?>
                                                                                
                                                                                <tr>
                                                                                    <input type="hidden" id="assignee_item_id_val1<?php echo $assignee2->assignee_item_id; ?>" class="form-control assignee_item_id_val1<?php echo $assignee2->assignee_item_id; ?>" name="assignee_item_id_val1[]" value="<?php echo $assignee2->assignee_item_id; ?>"/>
                                                                                    <td><?php echo $i_count2; ?></td>
                                                                                    <td><?php echo $assignee2->group_name;?></td> 
                                                                                    <td><?php echo $assignee2->perspective_perspective;?></td>
                                                                                    <td><?php echo $assignee2->indicator_indicator;?></td> 
                                                                                    <td>
                                                                                        <select id="table_type1<?php echo $i_count2; ?>" class="form-control select2 custom-select table_type1<?php echo $i_count2; ?>" name="table_type1[]" style="width: 100%;"> 
                                                                                            <?php  
                                                                                                foreach($arr7 as $table_type){?>
                                                                                                    <option value="<?php echo $table_type[0]->tl_app_item_id; ?>" <?php echo ($table_type[0]->tl_app_item_id == $assignee2->table_type) ? 'selected':'';?>>[<?php echo $table_type[0]->gl_value; ?>] - <?php echo $table_type[0]->tl_value; ?></option>     
                                                                                                <?php
                                                                                                }
                                                                                            ?> 
                                                                                        </select> 
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="ordering_rating1<?php echo $i_count2; ?>" class="form-control select2 custom-select ordering_rating1<?php echo $i_count2; ?>" name="ordering_rating1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->ordering_rating; ?>" <?php echo ($assignee2->ordering_rating === $assignee2->ordering_rating) ? 'selected':'';?>><?php echo $assignee2->ordering_rating; ?></option> 
                                                                                            <option value="ASCENDING">ASCENDING</option> 
                                                                                            <option value="DESCENDING">DESCENDING</option>   
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="formula1<?php echo $i_count2; ?>" class="form-control select2 custom-select formula1<?php echo $i_count2; ?>" name="formula1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->formula; ?>" <?php echo ($assignee2->formula === $assignee2->formula) ? 'selected':'';?>><?php if($assignee2->formula == '1'){ echo '[Formula 1] - YTD Target Positive'; }else if($assignee2->formula == '2'){ echo '[Formula 2] - YTD Target Negative'; }else if($assignee2->formula == '3'){ echo '[Formula 3] - GIR ,CTI & Capping'; }else if($$assignee2->formula == '4'){ echo '[Formula 4] - SAM (3 Decimal Places'; } ?></option> 
                                                                                            <option value="1"> [Formula 1] - YTD Target Positive</option> 
                                                                                            <option value="2"> [Formula 2] - YTD Target Negative</option> 
                                                                                            <option value="3"> [Formula 3] - GIR ,CTI & Capping</option>    
                                                                                            <option value="4"> [Formula 4] - SAM (3 Decimal Places</option>    
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="include_is1<?php echo $i_count2; ?>" class="form-control select2 custom-select include_is1<?php echo $i_count2; ?>" name="include_is1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->include_is; ?>" <?php echo ($assignee2->include_is === $assignee2->include_is) ? 'selected':'';?>><?php if($assignee2->include_is == 'Y'){ echo 'Include'; }else{ echo 'Not Include'; } ?></option> 
                                                                                            <option value="Y">Include</option> 
                                                                                            <option value="N">Not Include</option>   
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="main_target1<?php echo $i_count2; ?>" class="form-control textarealah main_target1<?php echo $i_count2; ?>" name="main_target1[]" rows="1"><?php echo $assignee2->main_target; ?></textarea> 
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="ytd_target1<?php echo $i_count2; ?>" class="form-control textarealah ytd_target1<?php echo $i_count2; ?>" name="ytd_target1[]" rows="1"><?php echo $assignee2->ytd_target; ?></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="ytd_achievement1<?php echo $i_count2; ?>" class="form-control textarealah ytd_achievement1<?php echo $i_count2; ?>" name="ytd_achievement1[]" rows="1"><?php echo $assignee2->ytd_achievement; ?></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="achievement1<?php echo $i_count2; ?>" class="form-control textarealah achievement1<?php echo $i_count2; ?>" name="achievement1[]" rows="1"><?php // echo $assignee2->achievement; ?></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="rating1<?php echo $i_count2; ?>" class="form-control textarealah rating1<?php echo $i_count2; ?>" name="rating1[]" rows="1"><?php // echo $assignee2->rating; ?></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="weightage1<?php echo $i_count2; ?>" class="form-control textarealah weightage1<?php echo $i_count2; ?>" name="weightage1[]" rows="1"><?php echo $assignee2->weightage; ?></textarea> 
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="weightage_score1<?php echo $i_count2; ?>" class="form-control textarealah weightage_score1<?php echo $i_count2; ?>" name="weightage_score1[]" rows="1"><?php // echo $assignee2->weightage_score; ?></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="mof_formula1<?php echo $i_count2; ?>" class="form-control select2 custom-select mof_formula1<?php echo $i_count2; ?>" name="mof_formula1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->mof_formula; ?>" <?php echo ($assignee2->mof_formula === $assignee2->mof_formula) ? 'selected':'';?>><?php if($assignee2->mof_formula == '1'){ echo "[Formula 1] - Positive Relation"; }else{ echo "[Formula 2] - Negative Relation"; } ?></option> 
                                                                                            <option value="1"> [Formula 1] - Positive Relation</option> 
                                                                                            <option value="2"> [Formula 2] - Negative Relation</option>  
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="mof_include1<?php echo $i_count2; ?>" class="form-control select2 custom-select mof_include1<?php echo $i_count2; ?>" name="mof_include1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->mof_include; ?>" <?php echo ($assignee2->mof_include === $assignee2->mof_include) ? 'selected':'';?>><?php if($assignee2->mof_include == 'Y'){ echo 'Include'; }else{ echo 'Not Include'; } ?></option> 
                                                                                            <option value="Y">Include</option> 
                                                                                            <option value="N">Not Include</option>   
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea id="mof_achievement1<?php echo $i_count2; ?>" class="form-control textarealah mof_achievement1<?php echo $i_count2; ?>" name="mof_achievement1[]" rows="1"><?php // echo $assignee2->mof_achievement; ?></textarea>
                                                                                    </td>

                                                                                    
                                                                                    <td>
                                                                                        <select id="kpi_owner_staffno1<?php echo $i_count2; ?>" class="form-control select2 custom-select kpi_owner_staffno1<?php echo $i_count2; ?>" name="kpi_owner_staffno1[]" style="width: 100%;"> 
                                                                                            <?php  
                                                                                                foreach($arr3 as $kpi_owner_staffno){?>
                                                                                                    <option value="<?php echo $kpi_owner_staffno[0]->STAFFNO; ?>" <?php echo ($kpi_owner_staffno[0]->STAFFNO === $assignee2->kpi_owner_staffno) ? 'selected':'';?>><?php echo $kpi_owner_staffno[0]->STAFFNAME; ?></option> 
                                                                                                <?php
                                                                                                }
                                                                                            ?> 
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select id="assignee_approved_is1<?php echo $i_count2; ?>" class="form-control select2 custom-select assignee_approved_is1<?php echo $i_count2; ?>" name="assignee_approved_is1[]" style="width: 100%;"> 
                                                                                            <option value="<?php echo $assignee2->assignee_approved_is; ?>" <?php echo ($assignee2->assignee_approved_is === $assignee2->assignee_approved_is) ? 'selected':'';?>><?php if($assignee2->assignee_approved_is == 'Y'){ echo 'Approved'; }else{ echo 'Request to rework'; } ?></option> 
                                                                                            <option value="Y">Approved</option> 
                                                                                            <option value="N">Request to rework</option>   
                                                                                        </select>
                                                                                    </td>

                                                                                    <td>
                                                                                        <select id="assignee_staffno1<?php echo $i_count2; ?>" class="form-control select2 custom-select assignee_staffno1<?php echo $i_count2; ?>" name="assignee_staffno1[]" style="width: 100%;"> 
                                                                                            <option value="">Please select name</option>
                                                                                            <?php  
                                                                                                foreach($arr5 as $assignee_staffno){?>
                                                                                                    <option value="<?php echo $assignee_staffno[0]->STAFFNO; ?>" <?php echo ($assignee_staffno[0]->STAFFNO === $assignee2->assignee_staffno) ? 'selected':'';?>><?php echo $assignee_staffno[0]->STAFFNAME; ?></option> 
                                                                                                <?php
                                                                                                }
                                                                                            ?> 
                                                                                        </select> 
                                                                                    </td> 

                                                                                    <td> 
                                                                                        <a href="{{url('/ckpis/assessment/download')}}/<?php echo htmlentities($assignee2->file_id); ?>/download"  class="">
                                                                                            <i class="mdi mdi-file-find"><?php echo $assignee2->filename; ?></i>
                                                                                        </a>	 
                                                                                    </td>

                                                                                </tr>
                                                                                <?php
                                                                                // echo ''.$i_count2.''.$assignee2->kpi_owner_name.'<br/>';

                                                                                $i_count2++; 
                                                                            }
                                                                        ?> 
                                                                            <input type="hidden" id="count_assignee2" class="form-control count_assignee2" name="count_assignee2" value="<?php echo $count_assignees2; ?>"/> 
                                                                    </tbody>   
                                                                </table> 
                                                            </div> 

                                                            <br/><br/>
                                                            <button type="button" class="btn btn-primary generateOutput"  name="generateOutput" id="generateOutput">Generate Result</button>  
                                                            <button type="button" class="btn btn-default clearOutput"  name="clearOutput" id="clearOutput">Clear Result</button>   
                                                            <button type="submit" class="btn btn-success updateCurrentQuarters"  name="updateCurrentQuarters" id="updateCurrentQuarters">Save data into Database</button>  
                                                            
                                                            <br/><br/>

                                                        </form>  

                                                        <form id='form-current-quarter' class="form-current-quarter" name="form-current-quarter" action="{{url('/ckpis/checker/sendRework')}}" method="post" enctype="multipart/form-data">
                                                        @csrf   
                                                                            
                                                            <?php 
                                                                $rework_app_id = "";
                                                                foreach($assignees2 as $assignee_email){ 
                                                                    $rework_app_id = $assignee_email->app_id;
                                                                }
                                                            ?>

                                                            <input type="hidden" id="app_id_val_email" class="form-control app_id_val_email" name="app_id_val_email" value="<?php echo $rework_app_id; ?>" readonly="readonly"/>
                                                            <button type="submit" class="btn btn-info sendRework"  name="sendRework" id="sendRework">Send Email to assignees to rework</button>  
                                                        </form>
                                                        
                                                    </div>
                                                </div>  
                                            <!-- List --> 

                                        </div>
                                    </div>
                                <!-- Fourth Tab (Current Quarter) -->

                                <!-- Fifth Tab (Declare) -->
                                    <div class="tab-pane" id="declare" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Declare / Submit (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-declare' class="form-declare" name="form-declare" action="{{url('/ckpis/checker/declare')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="declare_id" class="form-control declare_id" name='declare_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 
                                                            <input type="hidden" id="quarter_id" class="form-control quarter_id" name='quarter_id' value="<?php echo $current_active_quarter; ?>" placeholder="" readonly="readonly"> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">
                                                                        <input type="checkbox" id="md_checkbox_30" name="agree_btn" class="filled-in chk-col-green agree_btn" /> 
                                                                        <label for="md_checkbox_30"></label>
                                                                    </label>
                                                                    <div class="col-md-10">   
                                                                    <font color="red">*</font> I hereby acknowledge all the information is correct
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2"><font color="red">*</font> Remarks / Note</label>
                                                                    <div class="col-md-10">  
                                                                        <textarea id="remark_declare" class="form-control remark_declare textarealah" name="remark_declare" rows="2"></textarea> 
                                                                        <small class="form-control-feedback"></small> 
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2"></label>
                                                                    <div class="col-md-10">   
                                                                        <button type="button" class="btn btn-success waves-effect text-left" id="declare_final" ><i class="mdi mdi-file-send"></i> Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>  
    
                                                    </div>
                                                </div>
                                            <!-- List -->
                                                           
                                        </div>
                                    </div>
                                <!-- Fifth Tab (Declare) -->

                            </div>

                            
                        </div>
                    </div>

                </div>
            <!-- 3rd Row -->

        </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

@endsection

@section('js')

<!-- This is data table -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }} "></script>

<!-- start - This is for export functionality only -->
<script src="{{ asset('assets/plugins/datatables/cdn/dataTables.buttons.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.flash.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/jszip.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/pdfmake.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/vfs_fonts.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.html5.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.print.min.js') }} "></script>
<!-- end - This is for export functionality only -->

<!-- Manipulate Datetime in Javascript -->
<script src="{{ asset('assets/plugins/moment/cdn/moment-with-locales.min.js') }} "></script>
<script src="{{ asset('assets/plugins/moment/cdn/moment.min.js') }} "></script>

<!-- Validate -->
<script src="{{ asset('assets/plugins/validate/1.14.0/jquery.validate.min.js') }} "></script>

<script>
    // HTML entities
        function htmlEntities(str) {
            return String(str).replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/'/g, '&quot;') 
                                ; 
        }
    // HTML entities 

    // Calculate
        $(document).ready(function(){ 

            // Variable
                var table_type1      = 0;
                var ordering_rating1 = "";
                var formula1         = 0;
                var include1         = "";

                var main_target1     = 0;
                var ytd_target1      = 0;
                var ytd_achievement1 = 0;
                var achievement1     = 0;
                var rating1          = 0;
                var weightage1       = 0;
                var weightage_score1 = 0;
                var mof_achievement1 = 0;

                var total1           = 0;
                var total2           = 0;
                var total3           = 0;
                var total4           = 0;
                var total5           = 0;
                var total6           = 0;
                var total7           = 0;
                var total8           = 0;
                var total9           = 0;
                var total10          = 0;
                var total11          = 0;
                var total12          = 0;
                var total13          = 0; 

                var total14          = 0; 
                var total15          = 0; 
                var total16          = 0; 

                var total_zero       = 0;
                var total_zero_1     = 0;

                var total_zero2      = 0;
                var total_zero_2     = 0;
        
                var tl_group         = "";
                var tl_name          = ""; 

                var tlv_rating       = 0;
                var tlv_rating_0     = 0;
                var tlv_rating_1     = 0;
                var tlv_rating_2     = 0;
                var tlv_rating_3     = 0;
                var tlv_rating_4     = 0;

                var tlv_value        = 0;
                var tlv_value_0      = 0;
                var tlv_value_1      = 0;
                var tlv_value_2      = 0;
                var tlv_value_3      = 0;
                var tlv_value_4      = 0; 

                var cur_assignee1    = 0;
            // Variable

            // Var : Count Overall Rating
                var sum_weightage_score1 = 0;   

                var b_tlv_rating_0     = 0;
                var b_tlv_rating_1     = 0;
                var b_tlv_rating_2     = 0;
                var b_tlv_rating_3     = 0;
                var b_tlv_rating_4     = 0; 

                var b_tlv_value_0      = 0;
                var b_tlv_value_1      = 0;
                var b_tlv_value_2      = 0;
                var b_tlv_value_3      = 0;
                var b_tlv_value_4      = 0;

                var count_ws           = $('#count_ws').val();
                var table_type2        = 1; // 1 is ID number in OBP_CKPI_TL_APPS table. change it if you want to refer to another table ID 
            // Var : Count Overall Rating

            // Auto Generate
                cur_assignee1 = $('#count_assignee2').val(); 
                for(var i=1; i<=cur_assignee1; i++){

                    // To find Achievement %
                        $('.ytd_target1'+i).each(function(index){

                            ytd_target1 = $(this).val();   
                            // console.log('check',ytd_target1);

                        });

                        $('.ytd_achievement1'+i).each(function(index){

                            ytd_achievement1 = $(this).val();   

                        });

                        $('.formula1'+i).each(function(index){

                            formula1 = $(this).val();  
                            
                            if(formula1 == 1){

                                if( (ytd_target1 == 0) && (ytd_achievement1 == 0) ){

                                    total_zero_1 = parseFloat(total_zero).toFixed(2);
                                    $('.achievement1'+i).val(total_zero_1);

                                } else {

                                    total1 = ytd_achievement1 / ytd_target1;
                                    total2 = total1 * 100;

                                    total3 = parseFloat(total2).toFixed(2);

                                    $('.achievement1'+i).val(total3);

                                } 

                            } else if(formula1 == 2) {

                                if( (ytd_target1 == 0) && (ytd_achievement1 == 0) ){

                                    total_zero_1 = parseFloat(total_zero).toFixed(2);
                                    $('.achievement1'+i).val(total_zero_1);

                                } else {

                                    total4 = (parseFloat(ytd_target1)) - (parseFloat(ytd_achievement1));
                                    total5 = total4 / parseFloat(ytd_target1);
                                    total6 = total5 * 100;

                                    total7 = parseFloat(total6).toFixed(2);

                                    $('.achievement1'+i).val(total7);

                                } 

                            } else if(formula1 == 3) {

                                $('.achievement1'+i).val("0.00"); 

                            }  else if(formula1 == 4) {
                                
                                total14 = ytd_achievement1 / ytd_target1;
                                total15 = -(total14 * 100); 

                                total16 = parseFloat(total15).toFixed(2);

                                $('.achievement1'+i).val(total16);

                            }  

                        }); 
                    // To find Achievement %

                    // To find Rating
                        $('.achievement1'+i).each(function(index){
                            achievement1 = $(this).val();   
                        });

                        $('.ordering_rating1'+i).each(function(index){
                            ordering_rating1 = $(this).val(); 
                            // console.log('check',ordering_rating1); 
                        });

                        $('.table_type1'+i).each(function(index){
                            
                            table_type1 = $(this).val(); // 78,1,1,1,1
                            // console.log('check',table_type1);

                            
                            
                            // TLV Rating
                                $('.tlv_rating_'+table_type1+'_0').each(function(index){
                                    tlv_rating_0 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type1+'_1').each(function(index){
                                    tlv_rating_1 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type1+'_2').each(function(index){
                                    tlv_rating_2 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type1+'_3').each(function(index){
                                    tlv_rating_3 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type1+'_4').each(function(index){
                                    tlv_rating_4 = $(this).val();  
                                }); 
                            // TLV Rating

                            // TLV Value
                                $('.tlv_value_'+table_type1+'_0').each(function(index){
                                    tlv_value_0 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type1+'_1').each(function(index){
                                    tlv_value_1 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type1+'_2').each(function(index){
                                    tlv_value_2 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type1+'_3').each(function(index){
                                    tlv_value_3 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type1+'_4').each(function(index){
                                    tlv_value_4 = $(this).val();  
                                });
                            // TLV Value
        
                            // Condition Reverse / Falldown
                            // if(parseFloat(achievement1) === 0.00){
                            //     $('.rating1'+i).val("0");

                            // } else {

                                if(ordering_rating1 == 'DESCENDING'){ 

                                    if(formula1 == 1 || formula1 == 2 || formula1 == 4){

                                        if(parseFloat(achievement1) === 0.00){
                                            $('.rating1'+i).val("0");

                                        } else {

                                            if( parseFloat(achievement1) < parseFloat(tlv_value_4) ){ // < 13.70 -- 12.00 ...

                                                $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                            } else {

                                                if( parseFloat(achievement1) >= parseFloat(tlv_value_4) && parseFloat(achievement1) <= parseFloat(tlv_value_3) ) { // >= 13.70 && <= 14.30

                                                    $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                } else {

                                                    if( parseFloat(achievement1) >= parseFloat(tlv_value_3) && parseFloat(achievement1) < parseFloat(tlv_value_1) ) { // > 14.30 && < 15.10

                                                        $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                    } else {

                                                        if( parseFloat(achievement1) >= parseFloat(tlv_value_1) && parseFloat(achievement1) < parseFloat(tlv_value_0) ) { // >= 15.10 && <= 18.80

                                                            $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                        } else {

                                                            if( parseFloat(achievement1) > parseFloat(tlv_value_0) ) { // > 0.78

                                                                $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                            } else { 

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                        }

                                    } else if(formula1 == 3) { // if formula 3

                                        if( parseFloat(ytd_achievement1) < parseFloat(tlv_value_4) ){ // < 13.70 -- 12.00 ...

                                            $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                        } else {

                                            if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_4) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_3) ) { // >= 13.70 && <= 14.30

                                                $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                            } else {

                                                if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_3) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_1) ) { // > 14.30 && < 15.10

                                                    $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                } else {

                                                    if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_1) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_0) ) { // >= 15.10 && <= 18.80

                                                        $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                    } else {

                                                        if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_0) ) { // > 0.78

                                                            $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                        } else { 

                                                        }

                                                    }

                                                }

                                            }

                                        }

                                    } 
                                
                                } 
                                
                                else if(ordering_rating1 == 'ASCENDING'){ // ASCENDING

                                    if(formula1 == 1 || formula1 == 2 || formula1 == 4){

                                        if(parseFloat(achievement1) === 0.00){
                                            $('.rating1'+i).val("0");

                                        } else {

                                            if( parseFloat(achievement1) > parseFloat(tlv_value_4) ){ // > 115.01

                                                $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                            } else {

                                                if( parseFloat(achievement1) > parseFloat(tlv_value_3) && parseFloat(achievement1) <= parseFloat(tlv_value_4) ) {  // > 100.10 && <= 115.00
                                                    
                                                    $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                } else {

                                                    if( parseFloat(achievement1) > parseFloat(tlv_value_1) && parseFloat(achievement1) <= parseFloat(tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                    
                                                        $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                    } else {

                                                        if( parseFloat(achievement1) >= parseFloat(tlv_value_0) && parseFloat(achievement1) < parseFloat(tlv_value_1) ) {  // >= 80.00 && <= 95.00
                                                
                                                            $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                        } else {

                                                            if( parseFloat(achievement1) < parseFloat(tlv_value_0) ) { // < 80.00 (79.99 and below)
                                                
                                                                $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                            } else {

                                                            }

                                                        }

                                                    }

                                                }  
                                            } 

                                        }

                                    } else if(formula1 == 3) { // if formula 3

                                        if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_4) ){ // > 115.01

                                            $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                        } else {

                                            if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_3) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_4) ) {  // > 100.10 && <= 115.00
                                                
                                                $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                            } else {

                                                if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_1) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                
                                                    $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                } else {

                                                    if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_0) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_1) ) {  // >= 80.00 && <= 95.00

                                                        $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                    } else {

                                                        if( parseFloat(ytd_achievement1) < parseFloat(tlv_value_0) ) { // < 80.00 (79.99 and below)

                                                            $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                        } else {

                                                        }

                                                    }

                                                }

                                            }  

                                        } 

                                    }  

                                } 

                            // }         
                            // Condition Reverse / Falldown

                        });  
                    // To find Rating

                    // To find Weightage Score
                        $('.rating1'+i).each(function(index){

                            rating1 = $(this).val();   

                        });

                        $('.weightage1'+i).each(function(index){

                            weightage1 = $(this).val();   

                        });

                        $('.weightage_score1'+i).each(function(index){

                            total8 = rating1 / 5;
                            total9 = total8 * weightage1; 

                            total10 = parseFloat(total9).toFixed(2);

                           
                            // if(parseFloat(total10) === 0.00)
                            //     $('.rating1'+i).val("0");

                            $('.weightage_score1'+i).val(total10);
                            
                            

                        });
                    // To find Weightage Score

                    // To find MOF Achievement 
                        $('.main_target1'+i).each(function(index){

                            main_target1 = $(this).val();   

                        });

                        $('.mof_formula1'+i).each(function(index){

                            mof_formula1 = $(this).val();   

                            if(mof_formula1 == 1){

                                if( (ytd_target1 == 0) && (main_target1 == 0) ){

                                    total_zero_2 = parseFloat(total_zero2).toFixed(2);
                                    $('.mof_achievement1'+i).val(total_zero_2);

                                } else {

                                    total11 = parseFloat(ytd_achievement1) / parseFloat(main_target1);
                                    total12 = total11 * parseFloat(weightage1);

                                    total13 = parseFloat(total12).toFixed(2); // 3.78 

                                    if(total13 > parseFloat(weightage1) ){

                                        $('.mof_achievement1'+i).val(weightage1); 

                                    } else if(total13 < parseFloat(total_zero_2) ){

                                        $('.mof_achievement1'+i).val("0.00"); 

                                    } else if(isNaN(total13)){

                                        $('.mof_achievement1'+i).val("0.00"); 

                                    } else {

                                        $('.mof_achievement1'+i).val(total13); 

                                    } 

                                } 

                            } 
                            
                            else if(mof_formula1 == 2) {

                                if( (ytd_target1 == 0) && (main_target1 == 0) ){

                                    total_zero_2 = parseFloat(total_zero2).toFixed(2);
                                    $('.mof_achievement1'+i).val(total_zero_2);

                                } else {

                                    total11 = parseFloat(main_target1) / parseFloat(ytd_achievement1);
                                    total12 = total11 * parseFloat(weightage1);

                                    total13 = parseFloat(total12).toFixed(2);

                                    if(total13 > parseFloat(weightage1)){

                                        $('.mof_achievement1'+i).val(weightage1); 

                                    } else if(total13 < parseFloat(total_zero_2) ){

                                        $('.mof_achievement1'+i).val("0.00"); 

                                    } else if(isNaN(total13)){

                                        $('.mof_achievement1'+i).val("0.00"); 

                                    } else {

                                        $('.mof_achievement1'+i).val(total13);
                                        
                                    }

                                    

                                } 

                            } 

                        }); 
                    // To find MOF Achievement

                } 

                // Count Overall Rating
                    for(var k=0; k<=count_ws; k++){

                        $('.sum_weightage_score'+k).each(function(index){

                            sum_weightage_score1 = $(this).val();   

                        });

                        // TLV Rating
                            $('.tlv_rating_'+table_type2+'_0').each(function(index){
                                b_tlv_rating_0 = $(this).val();  
                            }); 
                            $('.tlv_rating_'+table_type2+'_1').each(function(index){
                                b_tlv_rating_1 = $(this).val();  
                            }); 
                            $('.tlv_rating_'+table_type2+'_2').each(function(index){
                                b_tlv_rating_2 = $(this).val();  
                            }); 
                            $('.tlv_rating_'+table_type2+'_3').each(function(index){
                                b_tlv_rating_3 = $(this).val();  
                            }); 
                            $('.tlv_rating_'+table_type2+'_4').each(function(index){
                                b_tlv_rating_4 = $(this).val();  
                            }); 
                        // TLV Rating

                        // TLV Value
                            $('.tlv_value_'+table_type2+'_0').each(function(index){
                                b_tlv_value_0 = $(this).val();  
                            });
                            $('.tlv_value_'+table_type2+'_1').each(function(index){
                                b_tlv_value_1 = $(this).val();  
                            });
                            $('.tlv_value_'+table_type2+'_2').each(function(index){
                                b_tlv_value_2 = $(this).val();  
                            });
                            $('.tlv_value_'+table_type2+'_3').each(function(index){
                                b_tlv_value_3 = $(this).val();  
                            });
                            $('.tlv_value_'+table_type2+'_4').each(function(index){
                                b_tlv_value_4 = $(this).val();  
                            });
                        // TLV Value

                        if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_4) ){ // > 115.00

                            // $('.sum_rating'+k).val(b_tlv_rating_4); // Rating : 5
                            $('.sum_rating'+k).html(b_tlv_rating_4); // Rating : 5

                        } else {

                            if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_3) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_4) ) {  // > 80.00 && <= 115.00
                                                
                                // $('.sum_rating'+k).val(b_tlv_rating_3); // Rating : 4
                                $('.sum_rating'+k).html(b_tlv_rating_3); // Rating : 4

                            } else {

                                if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_1) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                
                                    // $('.sum_rating'+k).val(b_tlv_rating_2); // Rating : 3
                                    $('.sum_rating'+k).html(b_tlv_rating_2); // Rating : 3

                                } else {

                                    if( parseFloat(sum_weightage_score1) >= parseFloat(b_tlv_value_0) && parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_1) ) {  // >= 80.00 && <= 95.00
                                            
                                        // $('.sum_rating'+k).val(b_tlv_rating_1); // Rating : 2
                                        $('.sum_rating'+k).html(b_tlv_rating_1); // Rating : 2

                                    } else {

                                        if( parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_0) ) { // < 80.00 (79.99 and below)
                                            
                                            // $('.sum_rating'+k).val(b_tlv_rating_0); // Rating : 1
                                            $('.sum_rating'+k).html(b_tlv_rating_0); // Rating : 1

                                        } else {

                                        }

                                    }

                                }

                            }

                        }
                        
                    }
                // Count Overall Rating 
            // Auto Generate

            // Generate Output
                $('#generateOutput').click(function(){ 

                    console.log(cur_assignee1);

                    for(var i=1; i<=cur_assignee1; i++){

                        // To find Achievement %
                            $('.ytd_target1'+i).each(function(index){

                                ytd_target1 = $(this).val();   

                            });

                            $('.ytd_achievement1'+i).each(function(index){

                                ytd_achievement1 = $(this).val();   

                            });

                            $('.formula1'+i).each(function(index){

                                formula1 = $(this).val();  
                                
                                if(formula1 == 1){

                                    if( (ytd_target1 == 0) && (ytd_achievement1 == 0) ){

                                        total_zero_1 = parseFloat(total_zero).toFixed(2);
                                        $('.achievement1'+i).val(total_zero_1);

                                    } else {

                                        total1 = ytd_achievement1 / ytd_target1;
                                        total2 = total1 * 100;

                                        total3 = parseFloat(total2).toFixed(2);

                                        $('.achievement1'+i).val(total3);

                                    } 

                                } else if(formula1 == 2) {

                                    if( (ytd_target1 == 0) && (ytd_achievement1 == 0) ){

                                        total_zero_1 = parseFloat(total_zero).toFixed(2);
                                        $('.achievement1'+i).val(total_zero_1);

                                    } else {

                                        total4 = (parseFloat(ytd_target1)) - (parseFloat(ytd_achievement1));
                                        total5 = total4 / parseFloat(ytd_target1);
                                        total6 = total5 * 100;

                                        total7 = parseFloat(total6).toFixed(2);

                                        $('.achievement1'+i).val(total7);

                                    } 

                                } else if(formula1 == 3) {

                                    $('.achievement1'+i).val("0.00"); 

                                }  else if(formula1 == 4) {
                                    
                                    total14 = ytd_achievement1 / ytd_target1;
                                    total15 = -(total14 * 100); 

                                    total16 = parseFloat(total15).toFixed(2);

                                    $('.achievement1'+i).val(total16);

                                }  

                            }); 
                        // To find Achievement %

                        // To find Rating
                            $('.achievement1'+i).each(function(index){
                                achievement1 = $(this).val();   
                            });

                            $('.ordering_rating1'+i).each(function(index){
                                ordering_rating1 = $(this).val();  
                            });

                            $('.table_type1'+i).each(function(index){

                                table_type1 = $(this).val(); // 78,1,1,1,1
                                
                                // TLV Rating
                                    $('.tlv_rating_'+table_type1+'_0').each(function(index){
                                        tlv_rating_0 = $(this).val();  
                                    }); 
                                    $('.tlv_rating_'+table_type1+'_1').each(function(index){
                                        tlv_rating_1 = $(this).val();  
                                    }); 
                                    $('.tlv_rating_'+table_type1+'_2').each(function(index){
                                        tlv_rating_2 = $(this).val();  
                                    }); 
                                    $('.tlv_rating_'+table_type1+'_3').each(function(index){
                                        tlv_rating_3 = $(this).val();  
                                    }); 
                                    $('.tlv_rating_'+table_type1+'_4').each(function(index){
                                        tlv_rating_4 = $(this).val();  
                                    }); 
                                // TLV Rating

                                // TLV Value
                                    $('.tlv_value_'+table_type1+'_0').each(function(index){
                                        tlv_value_0 = $(this).val();  
                                    });
                                    $('.tlv_value_'+table_type1+'_1').each(function(index){
                                        tlv_value_1 = $(this).val();  
                                    });
                                    $('.tlv_value_'+table_type1+'_2').each(function(index){
                                        tlv_value_2 = $(this).val();  
                                    });
                                    $('.tlv_value_'+table_type1+'_3').each(function(index){
                                        tlv_value_3 = $(this).val();  
                                    });
                                    $('.tlv_value_'+table_type1+'_4').each(function(index){
                                        tlv_value_4 = $(this).val();  
                                    });
                                // TLV Value
            
                                // Condition Reverse / Falldown
                                // if(parseFloat(achievement1) === 0.00){
                                //     $('.rating1'+i).val("0");

                                //  } else {

                                    if(ordering_rating1 == 'DESCENDING'){ 

                                        if(formula1 == 1 || formula1 == 2 || formula1 == 4){

                                            if(parseFloat(achievement1) === 0.00){
                                                $('.rating1'+i).val("0");

                                            } else {

                                                if( parseFloat(achievement1) < parseFloat(tlv_value_4) ){ // < 13.70 -- 12.00 ...

                                                    $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                                } else {

                                                    if( parseFloat(achievement1) >= parseFloat(tlv_value_4) && parseFloat(achievement1) <= parseFloat(tlv_value_3) ) { // >= 13.70 && <= 14.30

                                                        $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                    } else {

                                                        if( parseFloat(achievement1) >= parseFloat(tlv_value_3) && parseFloat(achievement1) < parseFloat(tlv_value_1) ) { // > 14.30 && < 15.10

                                                            $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                        } else {

                                                            if( parseFloat(achievement1) >= parseFloat(tlv_value_1) && parseFloat(achievement1) < parseFloat(tlv_value_0) ) { // >= 15.10 && <= 18.80

                                                                $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                            } else {

                                                                if( parseFloat(achievement1) > parseFloat(tlv_value_0) ) { // > 0.78 

                                                                    $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                                } else { 
                                                                    
                                                                }

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                        } else if(formula1 == 3) { // if formula 3

                                            if( parseFloat(ytd_achievement1) < parseFloat(tlv_value_4) ){ // < 13.70 -- 12.00 ...

                                                $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                            } else {

                                                if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_4) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_3) ) { // >= 13.70 && <= 14.30

                                                    $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                } else {

                                                    if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_3) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_1) ) { // > 14.30 && < 15.10

                                                        $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                    } else {

                                                        if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_1) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_0) ) { // >= 15.10 && <= 18.80

                                                            $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                        } else {

                                                            if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_0) ) { // > 0.78

                                                                $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                            } else { 

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                        } 
                                    
                                    } 
                                    
                                    else if(ordering_rating1 == 'ASCENDING'){ // ASCENDING

                                        if(formula1 == 1 || formula1 == 2 || formula1 == 4){

                                            if(parseFloat(achievement1) === 0.00){
                                                $('.rating1'+i).val("0");

                                            } else {

                                                if( parseFloat(achievement1) > parseFloat(tlv_value_4) ){ // > 115.01

                                                    $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                                } else {

                                                    if( parseFloat(achievement1) > parseFloat(tlv_value_3) && parseFloat(achievement1) <= parseFloat(tlv_value_4) ) {  // > 100.10 && <= 115.00
                                                        
                                                        $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                    } else {

                                                        if( parseFloat(achievement1) > parseFloat(tlv_value_1) && parseFloat(achievement1) <= parseFloat(tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                        
                                                            $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                        } else {

                                                            if( parseFloat(achievement1) >= parseFloat(tlv_value_0) && parseFloat(achievement1) < parseFloat(tlv_value_1) ) {  // >= 80.00 && <= 95.00
                                                    
                                                                $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                            } else {

                                                                if( parseFloat(achievement1) < parseFloat(tlv_value_0) ) { // < 80.00 (79.99 and below)
                                                    
                                                                    $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                                } else {

                                                                }

                                                            }

                                                        }

                                                    }  
                                                } 

                                            }

                                        } else if(formula1 == 3) { // if formula 3

                                            if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_4) ){ // > 115.01

                                                $('.rating1'+i).val(tlv_rating_4); // Rating : 5

                                            } else {

                                                if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_3) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_4) ) {  // > 100.10 && <= 115.00
                                                    
                                                    $('.rating1'+i).val(tlv_rating_3); // Rating : 4

                                                } else {

                                                    if( parseFloat(ytd_achievement1) > parseFloat(tlv_value_1) && parseFloat(ytd_achievement1) <= parseFloat(tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                    
                                                        $('.rating1'+i).val(tlv_rating_2); // Rating : 3

                                                    } else {

                                                        if( parseFloat(ytd_achievement1) >= parseFloat(tlv_value_0) && parseFloat(ytd_achievement1) < parseFloat(tlv_value_1) ) {  // >= 80.00 && <= 95.00

                                                            $('.rating1'+i).val(tlv_rating_1); // Rating : 2

                                                        } else {

                                                            if( parseFloat(ytd_achievement1) < parseFloat(tlv_value_0) ) { // < 80.00 (79.99 and below)

                                                                $('.rating1'+i).val(tlv_rating_0); // Rating : 1

                                                            } else {

                                                            }

                                                        }

                                                    }

                                                }  

                                            } 

                                        }  

                                    } 
                                    
                                // }
                                // Condition Reverse / Falldown

                            });  
                        // To find Rating

                        // To find Weightage Score
                            $('.rating1'+i).each(function(index){

                                rating1 = $(this).val();   

                            });

                            $('.weightage1'+i).each(function(index){

                                weightage1 = $(this).val();   

                            });

                            $('.weightage_score1'+i).each(function(index){

                                total8 = rating1 / 5;
                                total9 = total8 * weightage1; 

                                total10 = parseFloat(total9).toFixed(2);

                                // if(parseFloat(total10) === 0.00)
                                //     $('.rating1'+i).val("0");

                                $('.weightage_score1'+i).val(total10);

                            });
                        // To find Weightage Score

                        // To find MOF Achievement 
                            $('.main_target1'+i).each(function(index){

                                main_target1 = $(this).val();   

                            });

                            $('.mof_formula1'+i).each(function(index){

                                mof_formula1 = $(this).val();   

                                if(mof_formula1 == 1){

                                    if( (ytd_target1 == 0) && (main_target1 == 0) ){

                                        total_zero_2 = parseFloat(total_zero2).toFixed(2);
                                        $('.mof_achievement1'+i).val(total_zero_2);

                                    } else {

                                        total11 = parseFloat(ytd_achievement1) / parseFloat(main_target1);
                                        total12 = total11 * parseFloat(weightage1);

                                        total13 = parseFloat(total12).toFixed(2); // 3.78 

                                        if(total13 > parseFloat(weightage1) ){

                                            $('.mof_achievement1'+i).val(weightage1); 

                                        } else if(total13 < parseFloat(total_zero_2) ){

                                            $('.mof_achievement1'+i).val("0.00"); 

                                        } else if(isNaN(total13)){

                                            $('.mof_achievement1'+i).val("0.00"); 

                                        }  else {

                                            $('.mof_achievement1'+i).val(total13); 

                                        } 

                                    } 

                                } 
                                
                                else if(mof_formula1 == 2) {

                                    if( (ytd_target1 == 0) && (main_target1 == 0) ){

                                        total_zero_2 = parseFloat(total_zero2).toFixed(2);
                                        $('.mof_achievement1'+i).val(total_zero_2);

                                    } else {

                                        total11 = parseFloat(main_target1) / parseFloat(ytd_achievement1);
                                        total12 = total11 * parseFloat(weightage1);

                                        total13 = parseFloat(total12).toFixed(2);

                                        if(total13 > parseFloat(weightage1)){

                                            $('.mof_achievement1'+i).val(weightage1); 

                                        } else if(total13 < parseFloat(total_zero_2) ){

                                            $('.mof_achievement1'+i).val("0.00"); 

                                        } else if(isNaN(total13)){

                                            $('.mof_achievement1'+i).val("0.00"); 

                                        } else {

                                            $('.mof_achievement1'+i).val(total13);
                                            
                                        }

                                        

                                    } 

                                } 

                            }); 
                        // To find MOF Achievement

                    } 

                    // Count Overall Rating
                        for(var k=0; k<=count_ws; k++){

                            $('.sum_weightage_score'+k).each(function(index){

                                sum_weightage_score1 = $(this).val();   

                            });

                            // TLV Rating
                                $('.tlv_rating_'+table_type2+'_0').each(function(index){
                                    b_tlv_rating_0 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type2+'_1').each(function(index){
                                    b_tlv_rating_1 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type2+'_2').each(function(index){
                                    b_tlv_rating_2 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type2+'_3').each(function(index){
                                    b_tlv_rating_3 = $(this).val();  
                                }); 
                                $('.tlv_rating_'+table_type2+'_4').each(function(index){
                                    b_tlv_rating_4 = $(this).val();  
                                }); 
                            // TLV Rating

                            // TLV Value
                                $('.tlv_value_'+table_type2+'_0').each(function(index){
                                    b_tlv_value_0 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type2+'_1').each(function(index){
                                    b_tlv_value_1 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type2+'_2').each(function(index){
                                    b_tlv_value_2 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type2+'_3').each(function(index){
                                    b_tlv_value_3 = $(this).val();  
                                });
                                $('.tlv_value_'+table_type2+'_4').each(function(index){
                                    b_tlv_value_4 = $(this).val();  
                                });
                            // TLV Value

                            if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_4) ){ // > 115.00

                                // $('.sum_rating'+k).val(b_tlv_rating_4); // Rating : 5
                                $('.sum_rating'+k).html(b_tlv_rating_4); // Rating : 5

                            } else {

                                if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_3) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_4) ) {  // > 80.00 && <= 115.00
                                                    
                                    // $('.sum_rating'+k).val(b_tlv_rating_3); // Rating : 4
                                    $('.sum_rating'+k).html(b_tlv_rating_3); // Rating : 4

                                } else {

                                    if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_1) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_3) ) {  // > 95.00 && <= 100.00
                                                    
                                        // $('.sum_rating'+k).val(b_tlv_rating_2); // Rating : 3
                                        $('.sum_rating'+k).html(b_tlv_rating_2); // Rating : 3

                                    } else {

                                        if( parseFloat(sum_weightage_score1) >= parseFloat(b_tlv_value_0) && parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_1) ) {  // >= 80.00 && <= 95.00
                                                
                                            // $('.sum_rating'+k).val(b_tlv_rating_1); // Rating : 2
                                            $('.sum_rating'+k).html(b_tlv_rating_1); // Rating : 2

                                        } else {

                                            if( parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_0) ) { // < 80.00 (79.99 and below)
                                                
                                                // $('.sum_rating'+k).val(b_tlv_rating_0); // Rating : 1
                                                $('.sum_rating'+k).html(b_tlv_rating_0); // Rating : 1

                                            } else {

                                            }

                                        }

                                    }

                                }

                            }
                            
                        }
                    // Count Overall Rating 

                });
            // Generate Output

            // Clear Output
                var cur_assignee2   = 0;
                cur_assignee2       = $('#count_assignee2').val(); 

                $('#clearOutput').click(function(){ 

                    for(var v=1; v<=cur_assignee2; v++){

                        $('.achievement1'+v).each(function(index){

                            $('.achievement1'+v).val("");  

                        });

                        $('.rating1'+v).each(function(index){

                            $('.rating1'+v).val("");  

                        });

                        $('.weightage_score1'+v).each(function(index){

                            $('.weightage_score1'+v).val("");  

                        });

                        $('.mof_achievement1'+v).each(function(index){

                            $('.mof_achievement1'+v).val("");  

                        });

                    }

                });
            // Clear Output

        });
    // Calculate

    // Table
        $(document).ready(function(){

            
            $("#table-curassignee").dataTable({ 
                scrollX: false, 
                ordering: false, 
                dom: 'Blfrtip',
                buttons: [ 
                    { extend: 'excelHtml5', footer: true },
                    { extend: 'csvHtml5', footer: true } 
                ], 
                "lengthMenu": [[100, 300, 500, -1], [100, 300, 500, "All"]] 
            }); 

            var count_export = $('#count_export').val();
            for(var m=0; m<=count_export; m++){

                $("#table-assignee"+m).dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 
            } 

            var count_table_rating = $('#count_table_rating').val(); 
            for(var n=1; n<=count_table_rating; n++){

                $("#table-tlapp"+n).dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 
            }  

        });
    // Table

    // Declare
        $(document).ready(function(){ 

            // Checking
                $(function() {
                    $("#form-declare").validate({
                        rules: {
                            remark_declare: {
                            required: true
                            },   
                        },
                        messages: {
                            remark_declare: {
                            required: "<font color='red'>* Cannot be empty</font>"
                            },   
                        }
                    });
                }); 
            // Checking

            // Send
                $('#declare_final').click(function(){ 
                    if (!$('#form-declare').valid()) 
                    {
                        e.preventDefault()
                    }
                    else 
                    {
                        if($(".agree_btn").prop("checked") == true)
                        {    
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Finalize your data ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Declare',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) { 
                                $( "#form-declare" ).submit();
                            } else if ( 
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Record has not been saved.',
                                'error'
                                )
                            }
                            })  
                        }
                        else if($(".agree_btn").prop("checked") == false)
                        {
                            Swal.fire(
                                'Empty !',
                                'Please tick on agree checkbox.',
                                'warning'
                            )
                        } 
                    }
                });
            // Send

        });
    // Declare

</script>
@endsection