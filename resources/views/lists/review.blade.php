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
                <h3 class="text-themecolor">Review</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">Review</li>
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

                            @if(Session::has('assessment_failed'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('assessment_failed')}}

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
                                                            // echo "active";
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
                                                        if(($stage == 5) || ($stage == 7)){
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

                    <input type="hidden" id="application_id" class="form-control application_id" name='application_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">    

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meeting" role="tab">General Details</a> </li>  
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quarter" role="tab">Quarter</a>  </li> 
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#declare" role="tab"><font color="red">*</font> Approve / Rework</a>  </li>   
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

                                <!-- Second Tab : Quarter -->
                                    <div class="tab-pane" id="quarter" role="tabpanel">
                                        <div class="card-body"> 
                                            <?php
                                                if(count($quarter_arrs) != 0)
                                                {
                                                    $a              = 0;
                                                    $group          = 0; 
                                                    $count          = 1;
                                                    $z              = 0;
                                                    $perspective    = 0;

                                                    foreach($quarter_arrs as $quarter_arr)
                                                    {?> 
                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <div class="card-actions">
                                                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                </div>
                                                                <h4 class="card-title m-b-0">Q<?php echo $quarter_arr[3]; ?><?php if($quarter_arr[16] == 'Y'){ echo ' (Active)'; } else { echo ' (Inactive)'; } ?>
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
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner</th>
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee (Officer In Charge)</th>   
                                                                                                    <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;">Target <?php echo $application->app_year; ?></th>     
                                                                                                    <th style="vertical-align:top;">YTD Target</th>    
                                                                                                    <th style="vertical-align:top;">YTD Achievement</th>    
                                                                                                    <th style="vertical-align:top;">Achievement %</th>    
                                                                                                    <th style="vertical-align:top;">Rating</th>    
                                                                                                    <th style="vertical-align:top;">Weightage %</th>    
                                                                                                    <th style="vertical-align:top;">Weightage Score</th>    
                                                                                                    <th style="vertical-align:top;">MOF Achievement %</th>    
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
                                                                                                                <td><?php echo $perspective_arrs2[6]; ?></td>   
                                                                                                                <td><?php echo $perspective_arrs2[7]; ?></td>    

                                                                                                                <td><?php echo $perspective_arrs2[8]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[9]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[10]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[11]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[12]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[13]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[14]; ?></td>     
                                                                                                                <td><?php echo $perspective_arrs2[15]; ?></td>     

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
                                        </div>
                                    </div>
                                <!-- Second Tab : Quarter -->

                                <!-- Third Tab : Declare -->
                                    <div class="tab-pane active" id="declare" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Indicator Details</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <!-- <form id='form-assignee' class="form-assignee" name="form-assignee" action="{{url('/ckpis/submit/updateAssignee')}}" method="post" enctype="multipart/form-data"> -->
                                                        <form id='form-assignee' class="form-assignee" name="form-assignee" action="" method="post" enctype="multipart/form-data">
                                                        @csrf 

                                                        <input type="hidden" id="application_id123" class="form-control application_id123" name='application_id123' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">

                                                            <div class="table-responsive"> 
                                                                <table id="table-assignee" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                                        <tr> 
                                                                            <th style="vertical-align:top;" rowspan="2">No</th>   
                                                                            
                                                                            <th style="vertical-align:top;" rowspan="2">Group Name</th>   
                                                                            <th style="vertical-align:top;" rowspan="2">Quarter</th> 
                                                                            <th style="vertical-align:top;" rowspan="2">Perspective</th> 
                                                                            <th style="vertical-align:top;" rowspan="2">Indicators</th>  

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;" rowspan="2">KPI Owner</th>
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;" rowspan="2">Assignee</th>  

                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 100px;" rowspan="2">Target <?php echo $application->app_year; ?></th>    
                                                                             
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 100px;" rowspan="2">YTD Target</th>    
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 100px;" rowspan="2">YTD Achievement</th>    
                                                                            <th style="vertical-align:top;" rowspan="2">Achievement %</th>    
                                                                            <th style="vertical-align:top;" rowspan="2">Rating</th>    
                                                                            <th style="vertical-align:top;" rowspan="2">Weightage %</th>    
                                                                            <th style="vertical-align:top;" rowspan="2">Weightage Score</th>    
                                                                            <th style="vertical-align:top;">Remark From KPI Owner</th>    
                                                                            <th style="vertical-align:top;">Remark From Assignee</th>    
                                                                            <th style="vertical-align:top;">Supporting Document</th>    
                                                                        </tr>   
                                                                    </thead> 
                                                                    <tbody>   
                                                                        <?php
                                                                            $count = 1;  
                                                                            $semail     = "";
                                                                            $staffname  = "";
                                                                            $arr        = array();
                                                                            foreach($staffs as $staff){  
                                                                                $arr2 = array();
                                                                                $arr2[] = $staff;
                                                                                $arr[]  = $arr2;
                                                                            }   
                                                                            
                                                                            $parameter2 = "";

                                                                            foreach($assignees as $assignee){ 
                                                                                $parameter = $assignee->assignee_item_id;     
                                                                                $parameter2 = $assignee->assignee_item_id;     
                                                                            ?>  
                                                                                <tr>    
                                                                                    <td><?php echo $count++; ?></td>  
                                                                                    <td><?php echo $assignee->perspective_group; ?></td>
                                                                                    <td><?php echo $assignee->indicator_quarter; ?></td>
                                                                                    <td><?php echo $assignee->perspective_perspective; ?></td>
                                                                                    <td><?php echo $assignee->indicator_indicator; ?></td>
                                                                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo str_replace("|",",<br/>",$assignee->kpi_owner_name);  ?></td> 
                                                                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $assignee->assignee_name; ?></td>  
                                                                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 100px;"><?php echo $assignee->main_target; ?></td>  
                                                                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 100px;"><?php echo $assignee->ytd_target; ?></td> 
                                                                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 100px;"><?php echo $assignee->ytd_achievement; ?></td>    
                                                                                    <td><?php echo $assignee->achievement; ?></td>
                                                                                    <td><?php echo $assignee->rating; ?></td> 
                                                                                    <td><?php echo $assignee->weightage; ?></td>  
                                                                                    <td><?php echo $assignee->weightage_score; ?></td> 
                                                                                    <td><?php echo $assignee->assignee_approved_remark; ?></td> 
                                                                                    <td><?php echo $assignee->assignee_updated_remark; ?></td> 

                                                                                    <td> 
                                                                                        <a href="{{url('/ckpis/assessment/download')}}/<?php echo htmlentities($assignee->file_id); ?>/download"  class="">
                                                                                            <i class="mdi mdi-file-find"><?php echo $assignee->filename; ?></i>
                                                                                        </a>	 
                                                                                    </td> 
                                                                                </tr> 
                                                                            <?php
                                                                            }
                                                                        ?>   
                                                                    </tbody>   
                                                                </table> 
                                                            </div> 
                                                        </form>  
                                                        
                                                    </div>
                                                </div>  
                                            <!-- List -->  

                                            <!-- Approve -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Approve (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-declare' class="form-declare" name="form-declare" action="{{url('/ckpis/review/declare')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="declare_id" class="form-control declare_id" name='declare_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 
                                                            <input type="hidden" id="assignee_declare_id" class="form-control assignee_declare_id" name='assignee_declare_id' value="<?php echo htmlentities($parameter2); ?>" placeholder="" readonly="readonly"> 

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
                                                                    <label class="control-label text-right col-md-2">Remarks <font color="red">*</font></label>
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

                                            <!-- Request to Rework -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Request to rework (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-rework' class="form-rework" name="form-rework" action="{{url('/ckpis/review/rework')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="rework_id" class="form-control rework_id" name='rework_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 
                                                            <input type="hidden" id="assignee_rework_id" class="form-control assignee_rework_id" name='assignee_rework_id' value="<?php echo htmlentities($parameter2); ?>" placeholder="" readonly="readonly"> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">
                                                                        <input type="checkbox" id="md_checkbox_31" name="rework_btn" class="filled-in chk-col-green rework_btn" /> 
                                                                        <label for="md_checkbox_31"></label>
                                                                    </label>
                                                                    <div class="col-md-10">   
                                                                    <font color="red">*</font> I confirm the rework details
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">Reason <font color="red">*</font></label>
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
                                                                        <button type="button" class="btn btn-warning waves-effect text-left" id="rework_final" ><i class="mdi mdi-file-send"></i> Request to rework</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>  
    
                                                    </div>
                                                </div>
                                            <!-- Request to Rework --> 

                                        </div>
                                    </div>
                                <!-- Third Tab : Declare -->  

                            </div>

                            
                        </div>
                    </div>

                </div>
            <!-- 2nd Row -->

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

    // Table
        $(document).ready(function(){
            
            // Export  
                $("#table-perspective").dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 

                $("#table-indicator").dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 

                $("#table-assignee").dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 
            // Export

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
                            confirmButtonText: 'Approve',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) {  
                                $(".loader").show();
                                $( "#form-declare" ).submit();
                                $(".loader").hide(); 
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

                                $(".loader").show();
                                $( "#form-rework" ).submit();
                                $(".loader").hide();

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