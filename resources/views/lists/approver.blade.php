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
                <h3 class="text-themecolor">CKPI List [Approver]</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">Approver</li>
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
                            @if(Session::has('email_failed'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('email_failed')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('perspective_added'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('perspective_added')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('perspective_edited'))
                                <div class="alert alert-warning alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('perspective_edited')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('perspective_deleted'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('perspective_deleted')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('perspective_duplicated'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('perspective_duplicated')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif



                            @if(Session::has('indicator_added'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('indicator_added')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('indicator_edited'))
                                <div class="alert alert-warning alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('indicator_edited')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('indicator_deleted'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('indicator_deleted')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('indicator_duplicated'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('indicator_duplicated')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('assignee_edited'))
                                <div class="alert alert-warning alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('assignee_edited')}}

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
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meeting" role="tab">General Details</a> </li>   
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#table" role="tab">Table </a>  </li>  
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#quarter" role="tab">Quarter </a>  </li>  
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#declare" role="tab"><font color="red">*</font> Declare </a>  </li> 
                                </ul>
                            <!-- Nav tabs --> 

                            <div class="tab-content">
                                
                                <!-- First Tab -->
                                    <div class="tab-pane" id="meeting" role="tabpanel">
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
                                <!-- First Tab -->  

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
                                    <div class="tab-pane active" id="quarter" role="tabpanel">
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

                                <!-- Fourth Tab -->
                                    <div class="tab-pane" id="declare" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- Approve -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Review / Submit (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-declare' class="form-declare" name="form-declare" action="{{url('/ckpis/approver/declare')}}" method="post">
                                                        @csrf 
                                                            <?php
                                                                $quarter_id = "";
                                                                foreach($assignees as $assignee){ 
                                                                    $quarter_id = $assignee->quarter_id;
                                                                }
                                                            ?>
                                                            <input type="hidden" id="declare_id" class="form-control declare_id" name='declare_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 
                                                            <input type="hidden" id="quarter_id" class="form-control quarter_id" name='quarter_id' value="<?php echo htmlentities($quarter_id); ?>" placeholder="" readonly="readonly"> 

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
                                            <!-- Approve -->

                                            <!-- Rework -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Request to rework (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-rework' class="form-rework" name="form-rework" action="{{url('/ckpis/approver/rework')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="rework_id" class="form-control rework_id" name='rework_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">
                                                                        <input type="checkbox" id="md_checkbox_31" name="rework_btn" class="filled-in chk-col-green rework_btn" /> 
                                                                        <label for="md_checkbox_31"></label>
                                                                    </label>
                                                                    <div class="col-md-10">   
                                                                    <font color="red">*</font> To rework
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">Remarks / Note</label>
                                                                    <div class="col-md-10">  
                                                                        <textarea id="remark_rework" class="form-control remark_rework textarealah" name="remark_rework" rows="2"></textarea> 
                                                                        <small class="form-control-feedback"></small> 
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2"></label>
                                                                    <div class="col-md-10">   
                                                                        <button type="button" class="btn btn-warning waves-effect text-left" id="rework_final" ><i class="mdi mdi-file-send"></i> Request to Rework</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>  
    
                                                    </div>
                                                </div>
                                            <!-- Rework --> 

                                        </div>
                                    </div>
                                <!-- Fourth Tab -->

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

    // Count Overall Rating
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

        var count_ws = $('#count_ws').val();
        for(var k=0; k<=count_ws; k++){

            $('.sum_weightage_score'+k).each(function(index){

                sum_weightage_score1 = $(this).val();   

            });

            var table_type2 = 1; // 1 is ID number in OBP_CKPI_TL_APPS table. change it if you want to refer to another table ID 

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

    // Table
        $(document).ready(function(){

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
                            title:'Approve application ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Submit',
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

    // Rework
        $(document).ready(function(){ 

            // Checking
                $(function() {
                    $("#form-rework").validate({
                        rules: {
                            remark_rework: {
                            required: true
                            },   
                        },
                        messages: {
                            remark_rework: {
                            required: "<font color='red'>* Cannot be empty</font>"
                            },   
                        }
                    });
                }); 
            // Checking

            // Send
                $('#rework_final').click(function(){ 
                    if (!$('#form-rework').valid()) 
                    {
                        e.preventDefault()
                    }
                    else 
                    {
                        if($(".rework_btn").prop("checked") == true)
                        {    
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Rework application ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Request to rework',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) { 
                                $( "#form-rework" ).submit();
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
                        else if($(".rework_btn").prop("checked") == false)
                        {
                            Swal.fire(
                                'Empty !',
                                'Please tick on checkbox.',
                                'warning'
                            )
                        } 
                    }
                });
            // Send

        });
    // Rework
</script>
@endsection