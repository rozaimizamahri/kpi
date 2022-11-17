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
                <h3 class="text-themecolor">Assign Assignee</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item active">Assign Assignee</li>  
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

                    <input type="hidden" id="application_id" class="form-control application_id" name='application_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">    

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meeting" role="tab">General Details</a> </li>  
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quarter" role="tab">Quarter</a>  </li>  
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#declare" role="tab"><font color="red">*</font> Nominate  </a>  </li> 
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

                                                                                                                <td> 
                                                                                                                     
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

                                <!-- Second Tab -->
                                    <div class="tab-pane active" id="declare" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- Indicator -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Indicator Details</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <?php 
                                                            foreach($assignees as $assignee){?>

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Group </small>
                                                                <h6><?php echo $assignee->perspective_group; ?></h6>   

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Perspective </small>
                                                                <h6><?php echo $assignee->perspective_perspective; ?></h6>  

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Quarter </small>
                                                                <h6><?php echo $assignee->indicator_quarter; ?></h6>    

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Indicator </small>
                                                                <h6><?php echo $assignee->indicator_indicator; ?></h6> 

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Target </small>
                                                                <h6><?php echo $assignee->main_target; ?></h6>   

                                                                <small class="text-muted"><i class="mdi mdi-format-title"></i> Weightage </small>
                                                                <h6><?php echo $assignee->weightage; ?> %</h6>   

                                                            <?php
                                                            }
                                                        ?> 
                                                    </div>
                                                </div>
                                            <!-- Assign --> 

                                            <!-- Assign -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Nominate Staff (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-declare' class="form-declare" name="form-declare" action="{{url('/ckpis/assign/declare')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="declare_id" class="form-control declare_id" name='declare_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 
                                                            <input type="hidden" id="assignee_id" class="form-control assignee_id" name='assignee_id' value="<?php echo htmlentities($assignee->id); ?>" placeholder="" readonly="readonly"> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">
                                                                        <input type="checkbox" id="md_checkbox_30" name="agree_btn" class="filled-in chk-col-green agree_btn" /> 
                                                                        <label for="md_checkbox_30"></label>
                                                                    </label>
                                                                    <div class="col-md-10">   
                                                                    <font color="red">*</font> I hereby confirm the nominate detail are correct
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">Staff Nomination <font color="red">*</font></label>
                                                                    <div class="col-md-10">   
                                                                        <select class="form-control select2 assignee_staffno" id="assignee_staffno" name="assignee_staffno" style="width:100%;">
                                                                            <option value="" selected>Please select name</option>  
                                                                        </select>
                                                                        <small class="form-control-feedback"></small> 
                                                                    </div>
                                                                </div>
                                                            </div>   

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">Remarks <font color="red">*</font></label>
                                                                    <div class="col-md-10">  
                                                                        <textarea id="remark" class="form-control remark textarealah" name="remark" rows="2"></textarea> 
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
                                            <!-- Assign --> 
                                                        
                                        </div>
                                    </div>
                                <!-- Second Tab -->

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

            // Populate All Staff  
                $.ajax({
                    url: '<?php echo url("/ckpis/assign/all"); ?>' ,
                    type: 'GET', 
                    dataType: "json",
                    data: {"staff_email": "staff_email"}, 
                    // data: $("#form-brs-add").serialize(),
                    beforeSend: function(){  
                        $(".loader").show();
                    },
                    success: function(data){  
                        var ar       = data;    
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['STAFFNO'] + "'>[" + ar[i]['STAFFNO'] + "] " + ar[i]['STAFFNAME']+ "</option>";
                            $('#assignee_staffno').append(_options);
                        }  
                        $(".loader").hide();
                    },
                    complete:function(data){ 
                        $(".loader").hide();
                    }
                });  
            // Populate All Staff  

            // Checking
                $(function() {
                    $("#form-declare").validate({
                        rules: { 
                            assignee_staffno: {
                            required: true
                            },  
                            remark: {
                            required: true
                            },   
                        },
                        messages: {
                            assignee_staffno: {
                            required: "<font color='red'>* Cannot be empty</font>"
                            }, 
                            remark: {
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
                            title:'Nominate staff ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Nominate',
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