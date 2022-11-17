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
                <h3 class="text-themecolor">CKPI List [Rework]</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">Rework</li>
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
                            @if(Session::has('assignee_empty'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('assignee_empty')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('indicator_existed'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('indicator_existed')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('info_updated'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('info_updated')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

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

                    <!-- Instruction -->
                        <div class="col-lg-12 col-md-12"> 
                            <div class="card card-default">
                                <div class="card-header"> 
                                    
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Instruction / Information <font color="red">*</font> (Read First)</h4> 

                                </div>
                                <div class="card-body collapse show">  

                                    1. Check your perpectives for each group in perspectives tab, delete unnecessary perspective before you register new indicator.<br/> 
                                    2. When you create new indicator, system will automatically register the new indicator for Q1,Q2,Q3,Q4.<br/>
                                    3. System not allow to add/delete perspectives once indicator exist in the list. You need to clear all indicator first before you can add/delete perspectives.<br/>
                                    4. In "Review/Edit" tab, please makesure that all information are correct and LOV for KPI owner are not empty. <br/>
                                
                                </div>
                            </div>
                        </div>
                    <!-- Instruction -->

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
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#group" role="tab">Group</a>  </li>  
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#perspective" role="tab"> Perspective </a>  </li> 
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#indicator" role="tab"> Indicator </a>  </li> 
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#assignee" role="tab"><font color="red">*</font> Rework / Edit </a>  </li> 
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#declare" role="tab"><font color="red">*</font> Rework / Submit </a>  </li> 
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
                                            <h6>{{$application->app_status2}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Stage </small>
                                            <h6>{{$application->app_stage2}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Year </small>
                                            <h6>{{$application->app_year}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Created By / Date Time </small>
                                            <h6>{{$application->app_created_by_name}} - {{$application->app_created_by_date2}}</h6>

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Updated By / Date Time </small>
                                            <h6>{{$application->app_updated_by_name}} - {{$application->app_updated_by_date2}}</h6>         
                                            
                                        </div>
                                    </div>
                                <!-- First Tab --> 

                                <!-- Second Tab : Group -->
                                    <div class="tab-pane" id="group" role="tabpanel">
                                        <div class="card-body"> 
  
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <div class="card-actions">
                                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                    </div>
                                                    <h4 class="card-title m-b-0">Group List</h4>  
                                                </div>
                                                <div class="card-body collapse show">  

                                                    <form id='form-group' class="form-group" action="" method="post">
                                                    @csrf 
                                                        <div class="table-responsive"> 
                                                            <table id="table-group" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                                    <tr>
                                                                        <th style="vertical-align:top;" rowspan="2">No</th>  
                                                                        <th style="vertical-align:top;" rowspan="2">Group</th>       
                                                                    </tr>  
                                                                </thead> 
                                                                <tbody>   
                                                                    <?php
                                                                        $count = 1;
                                                                        foreach($groups as $group){?>
                                                                            <tr> 
                                                                                <td><?php echo $count++; ?></td>   
                                                                                <td><?php echo $group->group_name; ?></td>        
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

                                        </div>
                                    </div>
                                <!-- Second Tab : Group -->  

                                <!-- Third Tab : Perspective -->
                                    <div class="tab-pane" id="perspective" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- Add -->
                                                <div id="modal_perspective_add" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form id='form-perspective-add' class="form-perspective-add" name="form-perspective-add" action="{{url('/ckpis/submit/addPerspective')}}" method="post"> 
                                                                @csrf 
 
                                                                    <input type="hidden" id="app_id_perspective_add" class="form-control app_id_perspective_add" name='app_id_perspective_add' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> Group</label>
                                                                            <div class="col-md-9"> 
                                                                                <select id="group_perspective_add" class="form-control select2 custom-select group_perspective_add" name="group_perspective_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select Group</option>  
                                                                                </select>
                                                                                <small class="form-control-feedback"></small>   
                                                                            </div>
                                                                        </div>
                                                                    </div>  

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> Perspective</label>
                                                                            <div class="col-md-9"> 
                                                                                <select id="perspective_add" class="form-control select2 custom-select perspective_add" name="perspective_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select Perspective</option>  
                                                                                </select>
                                                                                <small class="form-control-feedback"></small>   
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3">Remarks / Notes</label>
                                                                            <div class="col-md-9"> 
                                                                                <textarea id="remark_perspective_add" class="form-control remark_perspective_add textarealah" name="remark_perspective_add" rows="2"></textarea> 
                                                                                <small class="form-control-feedback"></small> 
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-success waves-effect text-left" id="info_perspective_add" >Create</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>  
                                                    </div> 
                                                </div> 
                                            <!-- Add -->
  
                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Perspective List</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <button type="button" class="btn btn-xs btn-success" onClick="addPerspective('1');" ><i class="mdi mdi-library-plus"> New Perspective</i></button>  
                                                        <br/>
                                                        <br/>


                                                        Checkbox Selected :  
                                                        <button type="button" class="btn btn-xs btn-danger deletePerspectives"  name="deletePerspectives" id="deletePerspectives">Delete</button>  

                                                        <br/><br/>

                                                        <form id='form-perspective' class="form-perspective" name="form-perspective" action="" method="post">
                                                        @csrf 
                                                            <div class="table-responsive"> 
                                                                <table id="table-perspective" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                                        <tr>
                                                                            <th style="vertical-align:top;" rowspan="2">No</th> 
                                                                            <th style="vertical-align:top; text-align:center;" colspan="1">Selection</th> 
                                                                             
                                                                            <th style="vertical-align:top;" rowspan="2">Group Name</th>   
                                                                            <th style="vertical-align:top;" rowspan="2">Perspective</th>  
                                                                        </tr>  
                                                                        <tr style="background-color:#5b626b; color:#ffffff;">       
                                                                            <th style="background-color:#5b626b; color:#ffffff;">
                                                                                <input type="checkbox" id="selection_all" class="filled-in chk-col-green selection_all" name="selection_all[]" value=""/>
                                                                                <label for="selection_all"></label>
                                                                            </th>         
                                                                        </tr>
                                                                    </thead> 
                                                                    <tbody>   
                                                                        <?php
                                                                            $count = 1; 
                                                                            foreach($perspectives as $perspective){ 
                                                                                $parameter = $perspective->id;     
                                                                            ?>
                                                                                <tr> 
                                                                                    <td><?php echo $count++; ?></td> 
                                                                                    <td>  
                                                                                        <input 
                                                                                                type="checkbox" 
                                                                                                id="selection<?php echo $perspective->id; ?>" 
                                                                                                class="filled-in chk-col-green selection_test selection<?php echo $perspective->id; ?>" 
                                                                                                name="selection[]" 
                                                                                                value="<?php echo $perspective->id; ?>
                                                                                        "/>
                                                                                        <label for="selection<?php echo $perspective->id; ?>"></label>
                                                                                    </td>    
                                                                                    <td><?php echo $perspective->perspective_group; ?></td>  
                                                                                    <td><?php echo $perspective->perspective_perspective; ?></td> 
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

                                        </div>
                                    </div>
                                <!-- Third Tab : Perspective --> 

                                <!-- Fourth Tab : Indicator -->
                                    <div class="tab-pane" id="indicator" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- Add -->
                                                <div id="modal_indicator_add" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form id='form-indicator-add' class="form-indicator-add" name="form-indicator-add" action="{{url('/ckpis/submit/addIndicator')}}" method="post"> 
                                                                @csrf 
 
                                                                    <input type="hidden" id="app_id_indicator_add" class="form-control app_id_indicator_add" name='app_id_indicator_add' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> Group</label>
                                                                            <div class="col-md-9"> 
                                                                                <select id="group_indicator_add" class="form-control select2 custom-select group_indicator_add" name="group_indicator_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select Group</option>  
                                                                                </select>
                                                                                <small class="form-control-feedback"></small>   
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> Perspective</label>
                                                                            <div class="col-md-9"> 
                                                                                <select id="perspective_indicator_add" class="form-control select2 custom-select perspective_indicator_add" name="perspective_indicator_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select Perspective</option>  
                                                                                </select>
                                                                                <small class="form-control-feedback"></small>   
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> Indicator</label>
                                                                            <div class="col-md-9"> 
                                                                                <select id="indicator_add" class="form-control select2 custom-select indicator_add" name="indicator_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select Indicator</option>  
                                                                                </select>
                                                                                <small class="form-control-feedback"></small>   
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <!-- <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> KPI Owners</label>
                                                                            <div class="col-md-9"> 

                                                                                <select id="kpi_owner_indicator_add" class="select2 m-b-10 select2-multiple kpi_owner_indicator_add" name="kpi_owner_indicator_add[]" style="width: 100%" multiple="multiple" data-placeholder="Please select or type staff name">
                                                                                    <option value=""></option>   
                                                                                </select>

                                                                                <small class="form-control-feedback"></small> 
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3"><font color="red">*</font> KPI Owners</label>
                                                                            <div class="col-md-9"> 

                                                                                <select id="kpi_owner_indicator_add" class="form-control select2 custom-select kpi_owner_indicator_add" name="kpi_owner_indicator_add" style="width: 100%;"> 
                                                                                    <option value="" selected="selected">Select KPI Owner</option>
                                                                                </select>

                                                                                <small class="form-control-feedback"></small> 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Target -->
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="control-label text-right col-md-3"><font color="red">*</font> Main Target</label>
                                                                                <div class="col-md-9"> 
                                                                                    <select id="target_indicator_add" class="form-control select2 custom-select target_indicator_add" name="target_indicator_add" style="width: 100%;"> 
                                                                                        <option value="" selected="selected">Select Main Target</option>  
                                                                                        <option value="NUMBER">Number</option>  
                                                                                        <option value="PERCENTAGE">Percentage (%)</option>  
                                                                                        <!-- <option value="TEXT">Text</option>   -->
                                                                                    </select>
                                                                                    <small class="form-control-feedback"></small>   
                                                                                </div>
                                                                            </div>
                                                                        </div>  

                                                                        <div id='number_indicator_code_add' class="col-md-12 number_indicator_code_add" style='display:none;'>
                                                                            <div class="form-group row">
                                                                                <label class="control-label text-right col-md-3">Number</label>
                                                                                <div class="col-md-9">   
                                                                                    <input type="text" id="number_indicator_add" class="form-control number_indicator_add input_thousand_separator" name='number_indicator_add' value="" placeholder="i.e 25.01 (2 decimal place)">
                                                                                    <small class="form-control-feedback"></small> 
                                                                                </div>
                                                                            </div>
                                                                        </div> 

                                                                        <div id='percentage_indicator_code_add' class="col-md-12 percentage_indicator_code_add" style='display:none;'>
                                                                            <div class="form-group row">
                                                                                <label class="control-label text-right col-md-3">Percentage</label>
                                                                                <div class="col-md-9">   
                                                                                    <input type="text" id="percentage_indicator_add" class="form-control percentage_indicator_add input_percentage" name='percentage_indicator_add' value="" placeholder="i.e 52.01 without % symbol (2 decimal place)">
                                                                                    <small class="form-control-feedback"></small> 
                                                                                </div>
                                                                            </div>
                                                                        </div> 

                                                                        <div id='text_indicator_code_add' class="col-md-12 text_indicator_code_add" style='display:none;'>
                                                                            <div class="form-group row">
                                                                                <label class="control-label text-right col-md-3">Text</label>
                                                                                <div class="col-md-9">   
                                                                                    <input type="text" onkeydown="upperCaseF(this)" id="text_indicator_add" class="form-control text_indicator_add" name='text_indicator_add' value="" placeholder="i.e 200 achievements">
                                                                                    <small class="form-control-feedback"></small> 
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    <!-- Target --> 

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3">Weightage</label>
                                                                            <div class="col-md-9">   
                                                                                <input type="text" id="weightage_indicator_add" class="form-control weightage_indicator_add input_percentage" name='weightage_indicator_add' value="" placeholder="i.e 10.01 without % symbol (2 decimal place)">
                                                                                <small class="form-control-feedback"></small> 
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="control-label text-right col-md-3">Remarks / Notes</label>
                                                                            <div class="col-md-9"> 
                                                                                <textarea id="remark_indicator_add" class="form-control remark_indicator_add textarealah" name="remark_indicator_add" rows="2"></textarea> 
                                                                                <small class="form-control-feedback"></small> 
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-success waves-effect text-left" id="info_indicator_add" >Create</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>  
                                                    </div> 
                                                </div> 
                                            <!-- Add --> 
  
                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Indicator List</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <button type="button" class="btn btn-xs btn-success" onClick="addIndicator('1');" ><i class="mdi mdi-library-plus">New Indicator</i></button>  
                                                        <br/>
                                                        <br/>

                                                        Checkbox Selected :  
                                                        <button type="button" class="btn btn-xs btn-danger deleteIndicators"  name="deleteIndicators" id="deleteIndicators">Delete</button>  

                                                        <br/><br/>

                                                        <form id='form-indicator' class="form-indicator" action="" method="post">
                                                        @csrf 
                                                            <div class="table-responsive"> 
                                                                <table id="table-indicator" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                                        <tr>
                                                                            <th style="vertical-align:top;" rowspan="2">No</th>  
                                                                            <th style="vertical-align:top; text-align:center;" colspan="1">Action</th> 
                                                                            <th style="vertical-align:top;" rowspan="2">Group Name</th>   
                                                                            <th style="vertical-align:top;" rowspan="2">Quarter</th> 
                                                                            <th style="vertical-align:top;" rowspan="2">Perspective</th> 
                                                                            <th style="vertical-align:top;" rowspan="2">Indicators</th>   
                                                                        </tr>  
                                                                        <tr style="background-color:#5b626b; color:#ffffff;"> 
                                                                            <th style="background-color:#5b626b; color:#ffffff;">
                                                                                <input type="checkbox" id="selection_all2" class="filled-in chk-col-green selection_all2" name="selection_all2[]" value=""/>
                                                                                <label for="selection_all2"></label>
                                                                            </th> 
                                                                        </tr>
                                                                    </thead> 
                                                                    <tbody>   
                                                                        <?php
                                                                            $count = 1; 
                                                                            foreach($indicators as $indicator){ 
                                                                                $parameter = $indicator->id;     
                                                                            ?>
                                                                                <tr> 
                                                                                    <td><?php echo $count++; ?></td>
                                                                                    <td>  
                                                                                        <input 
                                                                                                type="checkbox" 
                                                                                                id="selection2<?php echo $indicator->id; ?>" 
                                                                                                class="filled-in chk-col-green selection_test2 selection2<?php echo $indicator->id; ?>" 
                                                                                                name="selection2[]" 
                                                                                                value="<?php echo $indicator->id; ?>
                                                                                        "/>
                                                                                        <label for="selection2<?php echo $indicator->id; ?>"></label>
                                                                                    </td> 
                                                                                    <td><?php echo $indicator->indicator_group; ?></td>   
                                                                                    <td><?php echo $indicator->indicator_quarter; ?></td>  
                                                                                    <td><?php echo $indicator->indicator_perspective; ?></td> 
                                                                                    <td><?php echo $indicator->indicator_indicator; ?></td>  
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

                                        </div>
                                    </div>
                                <!-- Fourth Tab : Indicator -->

                                <!-- Fifth Tab : Review & Edit -->
                                    <div class="tab-pane active" id="assignee" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Review/Edit List</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">   
                                                        
                                                        <form id='form-assignee' class="form-assignee" name="form-assignee" action="{{url('/ckpis/submit/updateAssignee')}}" method="post" enctype="multipart/form-data">
                                                        @csrf 

                                                        <input type="hidden" id="application_id123" class="form-control application_id123" name='application_id123' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">

                                                            <p>Edit value first , then click update button [yellow button]</p>
                                                            <br/>

                                                            <!-- Checkbox Selected :    -->
                                                            <button type="submit" class="btn btn-xs btn-warning updateAssignees"  name="updateAssignees" id="updateAssignees">Update</button>  

                                                            <br/><br/> 

                                                            <div class="table-responsive"> 
                                                                <table id="table-assignee2" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                                        <tr>
                                                                            <th style="vertical-align:top;">No</th>   
                                                                            <th style="vertical-align:top;">Group Name</th>   
                                                                            <th style="vertical-align:top;">Quarter</th> 
                                                                            <th style="vertical-align:top;">Perspective</th> 
                                                                            <th style="vertical-align:top;">Indicators</th>   
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner</th>
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee</th>   
                                                                            <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;">Target <?php echo $application->app_year; ?></th>     
                                                                            <th style="vertical-align:top;">YTD Target</th>    
                                                                            <th style="vertical-align:top;">YTD Achievement</th>    
                                                                            <th style="vertical-align:top;">Achievement %</th>    
                                                                            <th style="vertical-align:top;">Rating</th>    
                                                                            <th style="vertical-align:top;">Weightage %</th>    
                                                                            <th style="vertical-align:top;">Weightage Score</th>    
                                                                            <th style="vertical-align:top;">MOF Achievement %</th>    
                                                                        </tr>   
                                                                    </thead> 
                                                                    <tbody>   
                                                                        <?php
                                                                            $count = 1;  
                                                                            $semail     = "";
                                                                            $staffname  = "";

                                                                            // $arr_all        = array(); 
                                                                            // foreach($staffs_alls as $staffs_all){  
                                                                            //     $arr_2_all = array();
                                                                            //     $arr_2_all[] = $staffs_all;
                                                                            //     $arr_all[]  = $arr_2_all;
                                                                            // } 
                                                                            
                                                                            $arr_l2        = array(); 
                                                                            foreach($staffs_l2 as $staff_l2){  
                                                                                $arr2_l2 = array();
                                                                                $arr2_l2[] = $staff_l2;
                                                                                $arr_l2[]  = $arr2_l2;
                                                                            } 
                                                                            
                                                                            foreach($assignees as $assignee){ 
                                                                                $parameter = $assignee->assignee_item_id;     
                                                                            ?>  
                                                                                <tr>    
                                                                                    <input type="hidden" id="assignee_item_id_val<?php echo $assignee->assignee_item_id; ?>" class="form-control assignee_item_id_val<?php echo $assignee->assignee_item_id; ?>" name="assignee_item_id_val[]" value="<?php echo $assignee->assignee_item_id; ?>"/>
                                                                                    
                                                                                    
                                                                                    <td><?php echo $count++; ?></td> 
                                                                                    <td><?php echo $assignee->group_name; ?></td>
                                                                                    <td><?php echo $assignee->quarter_id; ?></td>
                                                                                    <td><?php echo $assignee->perspective_perspective; ?></td>
                                                                                    <td><?php echo $assignee->indicator_indicator; ?></td>
                                                                                    <td style="word-wrap: break-word;min-width: 300px;max-width: 300px;"> 
                                                                                        <select id="kpi_owner_staffno<?php echo $assignee->assignee_item_id; ?>" class="form-control select2 custom-select kpi_owner_staffno<?php echo $assignee->assignee_item_id; ?>" name="kpi_owner_staffno[]" style="width: 100%;"> 
                                                                                            <option value="">Please select name</option>
                                                                                            <?php  
                                                                                                foreach($arr_l2 as $abcd){?> 
                                                                                                    <option value="<?php echo $abcd[0]->STAFFNO; ?>" <?php echo ($abcd[0]->STAFFNO === $assignee->kpi_owner_staffno) ? 'selected':'';?>><?php //echo $abcd[0]->STAFFNO; ?> <?php echo $abcd[0]->STAFFNAME; ?></option> 
                                                                                                <?php }
                                                                                            ?> 
                                                                                        </select> 
                                                                                    </td> 
                                                                                    <td style="word-wrap: break-word;min-width: 300px;max-width: 300px;">   
                                                                                        <select id="assignee_staffno<?php echo $assignee->assignee_item_id; ?>" class="form-control select2 custom-select assignee_staffno<?php echo $assignee->assignee_item_id; ?>" name="assignee_staffno[]" style="width: 100%;"> 
                                                                                            <option value="">Please select name</option>
                                                                                            <?php  
                                                                                                foreach($arr_l2 as $hhh){?> 
                                                                                                    <option value="<?php echo $hhh[0]->STAFFNO; ?>" <?php echo ($hhh[0]->STAFFNO === $assignee->assignee_staffno) ? 'selected':'';?>><?php //echo $abc[0]->STAFFNO; ?> <?php echo $hhh[0]->STAFFNAME; ?></option> 
                                                                                                <?php }
                                                                                            ?> 
                                                                                        </select>
                                                                                    </td>  
                                                                                    <td>
                                                                                        <textarea id="main_target<?php echo $assignee->assignee_item_id; ?>" class="form-control textarealah main_target<?php echo $assignee->assignee_item_id; ?>" name="main_target[]" rows="1"><?php echo $assignee->main_target; ?></textarea> 
                                                                                    </td>  
                                                                                    <td style="word-wrap: break-word;min-width: 150px;max-width: 150px;"><?php echo $assignee->ytd_target; ?></td>
                                                                                    <td><?php echo $assignee->ytd_achievement; ?></td>
                                                                                    <td><?php echo $assignee->achievement; ?></td>
                                                                                    <td><?php echo $assignee->rating; ?></td> 
                                                                                    <td> 
                                                                                        <textarea id="weightage<?php echo $assignee->assignee_item_id; ?>" class="form-control textarealah weightage<?php echo $assignee->assignee_item_id; ?>" name="weightage[]" rows="1"><?php echo $assignee->weightage; ?></textarea> 
                                                                                    </td> 
                                                                                    <td><?php echo $assignee->weightage_score; ?></td> 
                                                                                    <td><?php echo $assignee->mof_achievement; ?></td> 
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

                                        </div>
                                    </div>
                                <!-- Fifth Tab : Review & Edit -->

                                <!-- Sixth Tab -->
                                    <div class="tab-pane" id="declare" role="tabpanel">
                                        <div class="card-body"> 

                                            <!-- List -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <div class="card-actions">
                                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                        </div>
                                                        <h4 class="card-title m-b-0">Rework / Submit (Fields <font color="red">*</font> asterisk required)</h4>  
                                                    </div>
                                                    <div class="card-body collapse show">  

                                                        <form id='form-declare' class="form-declare" name="form-declare" action="{{url('/ckpis/submit/rework')}}" method="post">
                                                        @csrf 

                                                            <input type="hidden" id="declare_id" class="form-control declare_id" name='declare_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly"> 

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

                                                                    <?php
                                                                        $arr_endorser        = array(); 
                                                                        foreach($staff2s as $staff2){  
                                                                            $arr_2_endorser     = array();
                                                                            $arr_2_endorser[]   = $staff2;
                                                                            $arr_endorser[]     = $arr_2_endorser;
                                                                        } 
                                                                    ?>

                                                                    <label class="control-label text-right col-md-2">Endorser <font color="red">*</font></label>
                                                                    <div class="col-md-10">   
                                                                        <!-- <select class="form-control select2 endorser_staffno" id="endorser_staffno" name="endorser_staffno" style="width:100%;">
                                                                            <option value="" selected>Please </option>  
                                                                        </select> -->

                                                                        <!-- <select id="endorser_staffno" class="form-control select2 custom-select endorser_staffno" name="endorser_staffno" style="width: 100%;"> 
                                                                            <option value="" selected="selected">Please select endorser</option> 
                                                                        </select> -->

                                                                        <select id="endorser_staffno" class="form-control select2 custom-select endorser_staffno" name="endorser_staffno" style="width: 100%;"> 
                                                                            <option value=""></option>
                                                                            <?php  
                                                                                foreach($arr_endorser as $endorser){?> 
                                                                                    <option value="<?php echo $endorser[0]->SEMAIL; ?>" <?php echo ($endorser[0]->SEMAIL === $application->app_endorsed_by_email) ? 'selected':'';?>>[<?php echo $endorser[0]->STAFFNO; ?>] <?php echo $endorser[0]->STAFFNAME; ?></option> 
                                                                                <?php }
                                                                            ?> 
                                                                        </select>


                                                                        <small class="form-control-feedback"></small> 
                                                                    </div>
                                                                </div>
                                                            </div>   

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2"><font color="red">*</font> Remarks / Note</label>
                                                                    <div class="col-md-10">  
                                                                        <textarea id="remark_declare" class="form-control remark_declare textarealah" name="remark_declare" rows="2"><?php echo $application->app_submitted_remark; ?></textarea> 
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
                                <!-- Sixth Tab -->

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
                    searching: true,
                    paging: true,
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

    // Perspectives
        // Add
            // Modal
            function addPerspective(id_old){
                    var get_id = htmlEntities(id_old);  
                    $('#id_add').val(get_id);
                    $('#modal_perspective_add').modal({
                        show: true
                    });  
                }
            // Modal

            // Populate Group
                $(document).ready(function(){
                    
                    var app_id_val = $('#application_id').val();
                    var app_id = htmlEntities(app_id_val);

                    $.ajax({
                        url: '<?php echo url("/ckpis/groupLists"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"groups": "groups", "app_id":app_id },
                        success: function(data)
                        {  
                            var ar              = data;  
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                var _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['group_name']+ "</option>";
                                $('#group_perspective_add').append(_options);
                            } 	 

                            $(".loader").hide();
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    });  
                });
            // Populate Group

            // Populate Perspective
                $(document).ready(function(){ 
                    $.ajax({
                        url: '<?php echo url("/ckpis/perspectiveLists"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"app_id": "app_id"},
                        success: function(data)
                        {  
                            var ar              = data;  
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                var _options = "<option value='" + ar[i]['pl_value'] + "'>" + ar[i]['pl_value']+ "</option>";
                                $('#perspective_add').append(_options);
                            } 	 

                            $(".loader").hide();
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    });  
                });
            // Populate Perspective

            // Checking 
                $(function() {
                    $("#form-perspective-add").validate({
                        rules: {   
                            group_perspective_add:  { required: true },         
                            perspective_add:        { required: true },       
                                  
                        },
                        messages: { 
                            group_perspective_add:  { required: "<font color='red'>* Cannot be empty</font>" },           
                            perspective_add:        { required: "<font color='red'>* Cannot be empty</font>" },         
                                     
                        }
                    });
                });
            // Checking

            // Send Data 
                $(document).ready(function(){
                    $('#info_perspective_add').click(function(){ 
                        if (!$('#form-perspective-add').valid()) 
                        {
                            e.preventDefault()
                        }
                        else 
                        { 
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Create new perspective ?',
                            text: "Data will be added once you click on [Create] button.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Create',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) {
                                $('#form-perspective-add').submit(); 
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
                    });
                }); 
            // Send Data
        // Add

        // Delete
            $('#deletePerspectives').click(function(){ 

                $(".loader").show();

                var app_id_val = $('#application_id').val();
                var app_id_new = htmlEntities(app_id_val);

                const swalWithBootstrapButtons = Swal.mixin({
                customClass: { 
                    cancelButton: 'btn btn-danger',
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false,
                })
                swalWithBootstrapButtons.fire({
                title:'Delete selected perspective ?',
                text: "Important Note : Once you click on [delete] button. Kindly wait for the system to finish loading. Do not close the browser tab or refresh the page while its loading.",
                type: 'warning',
                showCancelButton: true, 
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: '<?php echo url("/ckpis/submit/deletePerspective"); ?>',
                        type: 'POST', 
                        // data: $("#form-perspective").serialize(),
                        data: $('#form-perspective').serialize()+"&application_id="+app_id_new,
                        beforeSend: function(){  
                            $(".loader").show();
                        },
                        success: function(data){ 
                            if(data=="false")
                            { 
                                Swal.fire(
                                    'Empty selection or indicator already existed',
                                    'You need to select at least one perspective before you delete / Indicator already existed. You need to clear all indicator before add / delete perspective. Because perspective is a parent of indicator.',
                                    'warning'
                                )  
                            }  
                            else if(data=="true")
                            {
                                Swal.fire(
                                    'Perspective successfully deleted!',
                                    'Thank you',
                                    'success'
                                ) 
                                location.reload();
                            }  
                        },
                        complete:function(data){ 
                            $(".loader").hide();
                        }
                    });

                } else if ( 
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Record has not been saved.',
                    'error'
                    )
                    $(".loader").hide();
                }
                })  
            });
        // Delete
    // Perspectives

    // Indicators
        // Add
            // Modal
            function addIndicator(id_old){
                    var get_id = htmlEntities(id_old);  
                    $('#id_add').val(get_id);
                    $('#modal_indicator_add').modal({
                        show: true
                    });  
                }
            // Modal 

            // On Change Target
                $(document).ready(function(){
                    var target_add_select = "";
                    $('#target_indicator_add').change(function(){

                        $('#number_indicator_add').val("").change();    
                        $('#percentage_indicator_add').val("").change();    
                        $('#text_indicator_add').val("").change();    

                        target_add_select = $(this).val();

                        if(target_add_select == ''){
                            $('.number_indicator_code_add').hide();
                            $('#number_indicator_add').val("").change(); 

                            $('.percentage_indicator_code_add').hide();
                            $('#percentage_indicator_add').val("").change(); 

                            $('.text_indicator_code_add').hide();
                            $('#text_indicator_add').val("").change(); 
                        }
                        else if(target_add_select =='NUMBER')
                        {
                            $('.number_indicator_code_add').show(); 
                            $('.percentage_indicator_code_add').hide(); 
                            $('.text_indicator_code_add').hide(); 
                            $('#percentage_indicator_add').val("").change(); 
                            $('#text_indicator_add').val("").change(); 
                        }
                        else if(target_add_select == 'PERCENTAGE')
                        {
                            $('.percentage_indicator_code_add').show(); 
                            $('.number_indicator_code_add').hide(); 
                            $('.text_indicator_code_add').hide(); 
                            $('#number_indicator_add').val("").change(); 	 
                            $('#text_indicator_add').val("").change(); 	 
                        }
                        else if(target_add_select == 'TEXT')
                        {
                            $('.text_indicator_code_add').show(); 
                            $('.number_indicator_code_add').hide(); 
                            $('.percentage_indicator_code_add').hide(); 
                            $('#number_indicator_add').val("").change(); 	 
                            $('#percentage_indicator_add').val("").change(); 	 
                        }
                    });
                }); 
            // On Change Target

            // Populate Group 
                $(document).ready(function(){  
                    var app_id_val1 = $('#application_id').val();
                    var app_id1 = htmlEntities(app_id_val1); 
                    $.ajax({
                        url: '<?php echo url("/ckpis/groupList_groups"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"app_id": app_id1},
                        success: function(data)
                        {  
                            var ar              = data; 
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                var _options = "<option value='" + ar[i]['group_id'] + "'>" + ar[i]['perspective_group']+ "</option>";
                                $('#group_indicator_add').append(_options);
                            } 	 

                            $(".loader").hide();
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    });   
                });
            // Populate Group

            // Populate Perspective Based on Group
                function get_perspectives(group_new_old,app_id2){

                    $.ajax({
                        url: '<?php echo url("/ckpis/perspectiveList_perspectives"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"group_id": group_new_old, "app_id": app_id2},
                        success: function(data)
                        {  
                            var ar              = data;    
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['perspective_perspective']+ "</option>";
                                $('#perspective_indicator_add').append(_options);
                            } 	  
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    }); 

                }

                $(document).ready(function(){

                    var app_id_val2 = $('#application_id').val();
                    var app_id2 = htmlEntities(app_id_val2); 

                    var group_new = "";
                    $('#group_indicator_add').change(function(){   

                        $('#perspective_indicator_add').val("").change();    
                        $('#perspective_indicator_add').html("");    

                        group_new_old = $(this).val(); 

                        if(group_new_old == ''){ 
                            $('#perspective_indicator_add').val("").change(); 
                            $('#perspective_indicator_add').html("");  
                        }
                        else {  
                            get_perspectives(group_new_old,app_id2);
                            $('#perspective_indicator_add').val("").change();
                            $('#perspective_indicator_add').html("");

                        }     

                    });

                });
            // Populate Perspective Based on Group

            // Populate Indicator
                $(document).ready(function(){ 
                    $.ajax({
                        url: '<?php echo url("/ckpis/indicatorLists"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"indicators": 'indicators'},
                        success: function(data)
                        {  
                            var ar              = data;  
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                var _options = "<option value='" + ar[i]['il_value'] + "'>" + ar[i]['il_value']+ "</option>";
                                $('#indicator_add').append(_options);
                            } 	 

                            $(".loader").hide();
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    });  
                });
            // Populate Indicator

            // Populate KPI Owner L2 Level Only
                $(document).ready(function(){ 
                    $.ajax({
                        url: '<?php echo url("/ckpis/kpiowners"); ?>' ,
                        type: "GET",
                        dataType: "json",
                        data: {"kpiowners": 'kpiowners'},
                        success: function(data)
                        {  
                            var ar              = data;  
                            var _options = "";
                            for (var i = 0; i < ar.length; i++) 
                            {	
                                var _options = "<option value='" + ar[i]['SEMAIL'] + "'>["+ar[i]['STAFFNO']+"] - " + ar[i]['STAFFNAME']+ "</option>";
                                $('#kpi_owner_indicator_add').append(_options);
                            } 	 

                            $(".loader").hide();
                        },
                        error: function(error){
                            console.log("Error:");
                            console.log(error);
                        }
                    });  
                });
            // Populate KPI Owner L2 Level Only

            // Checking 
                $(function() {
                    $("#form-indicator-add").validate({
                        rules: {   
                            group_indicator_add:           { required: true },   
                            quarter_indicator_add:           { required: true },       
                            perspective_indicator_add:           { required: true },       
                            indicator_add:           { required: true },       
                            kpi_owner_indicator_add:           { required: true },       
                            target_indicator_add:           { required: true },       
                            // weightage_indicator_add:           { required: true },       
                        },
                        messages: { 
                            group_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },  
                            quarter_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                            perspective_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                            indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                            kpi_owner_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                            target_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                            // weightage_indicator_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                        }
                    });
                });
            // Checking

            // Send Data 
                $(document).ready(function(){
                    $('#info_indicator_add').click(function(){ 
                        if (!$('#form-indicator-add').valid()) 
                        {
                            e.preventDefault()
                        }
                        else 
                        { 
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Create new indicator ?',
                            text: "Data will be added once you click on [Create] button.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Create',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) {
                                $('#form-indicator-add').submit(); 
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
                    });
                }); 
            // Send Data
        // Add

        // Delete
            $('#deleteIndicators').click(function(){ 

                $(".loader").show();

                const swalWithBootstrapButtons = Swal.mixin({
                customClass: { 
                    cancelButton: 'btn btn-danger',
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false,
                })
                swalWithBootstrapButtons.fire({
                title:'Delete selected indicators ?',
                text: "Important Note : Once you click on [delete] button. Kindly wait for the system to finish loading. Do not close the browser tab or refresh the page while its loading.",
                type: 'warning',
                showCancelButton: true, 
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: '<?php echo url("/ckpis/submit/deleteIndicator"); ?>',
                        type: 'POST', 
                        data: $("#form-indicator").serialize(),
                        beforeSend: function(){  
                            $(".loader").show();
                        },
                        success: function(data){ 
                            if(data=="false")
                            { 
                                Swal.fire(
                                    'Empty selection!',
                                    'You need to select at least one indicator',
                                    'warning'
                                )  
                            } 
                            else if(data=="true")
                            {
                                Swal.fire(
                                    'Indicator successfully deleted!',
                                    'Thank you',
                                    'success'
                                ) 
                                location.reload();
                            }  
                        },
                        complete:function(data){ 
                            $(".loader").hide();
                        }
                    });

                } else if ( 
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Record has not been saved.',
                    'error'
                    )
                    $(".loader").hide();
                }
                })  
            });
        // Delete
    // Indicators

    // Declare
        $(document).ready(function(){ 

            // Populate Endorser  
                $.ajax({
                    url: '<?php echo url("/ckpis/submit/endorsers"); ?>' ,
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
                            $('#endorser_staffno').append(_options);
                        }  
                        $(".loader").hide();
                    },
                    complete:function(data){ 
                        $(".loader").hide();
                    }
                });  
            // Populate Endorser

            // Checking
                $(function() {
                    $("#form-declare").validate({
                        rules: {
                            endorser_staffno: {
                            required: true
                            },   
                        },
                        messages: {
                            endorser_staffno: {
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