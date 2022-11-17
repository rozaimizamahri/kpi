@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Corporate KPI List</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">Corporate KPI</li> 
                    <li class="breadcrumb-item active">List</li>
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
                            @if(Session::has('list_added'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('list_added')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('list_edited'))
                                <div class="alert alert-warning alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('list_edited')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('list_deleted'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('list_deleted')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('list_duplicated'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('list_duplicated')}}

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
                                    <h4 class="card-title m-b-0">Corporate KPI Stages</h4>
                                </div>
                                <div class="card-body collapse show"> 
                                    <div class="card">
                                        <div class="card-body"> 

                                        <div class="md-stepper-horizontal green">
                                            
                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>1</span></div>
                                                <div class="md-step-title">Author</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>2</span></div>
                                                <div class="md-step-title">Endorser</div>
                                                <div class="md-step-optional">(Superior / Hod)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>3</span></div>
                                                <div class="md-step-title">Assign to staff</div>
                                                <div class="md-step-optional">(KPI Owner)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div> 

                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>4</span></div>
                                                <div class="md-step-title">Assignee</div>
                                                <div class="md-step-optional">(KPI Result)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>


                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>5</span></div>
                                                <div class="md-step-title">Approval</div>
                                                <div class="md-step-optional">(KPI Owner)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>


                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>6</span></div>
                                                <div class="md-step-title">Checker Review</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>7</span></div>
                                                <div class="md-step-title">1st Approver</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done">
                                                <div class="md-step-circle"><span>8</span></div>
                                                <div class="md-step-title">Final Approver</div>
                                                <div class="md-step-optional">(CKPI Admin)</div>
                                                <div class="md-step-bar-left"></div>
                                                <div class="md-step-bar-right"></div>
                                            </div>

                                            <div class="md-step done">
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

            <!-- 1st Row -->
                <div class="row"> 

                    <!-- Add -->
                        <div id="modal_add" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <form id='form-add' class="form-add" name="form-add" action="{{url('/ckpis/add')}}" method="post"> 
                                        @csrf 

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Name</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" onkeydown="upperCaseF(this)" id="name_add" class="form-control name_add" name='name_add' value="" placeholder="">
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Year</label>
                                                    <div class="col-md-9"> 
                                                        <select id="year_add" class="form-control select2 custom-select year_add" name="year_add" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Year</option>  
                                                        </select>
                                                        <small class="form-control-feedback"></small>   
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Remarks / Notes</label>
                                                    <div class="col-md-9"> 
                                                        <textarea id="remark_add" class="form-control remark_add textarealah" name="remark_add" rows="2"></textarea> 
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success waves-effect text-left" id="info_add" >Create</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>  
                            </div> 
                        </div> 
                    <!-- Add -->

                    <!-- Delete -->
                        <div id="modal_delete" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Data will be permanently deleted. Action cannot be undo.</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/ckpis/delete')}}" method="post"> 
                                        @csrf 

                                            <input type="hidden" id="id_delete" class="form-control id_delete" name="id_delete" value="" placeholder="" readonly="readonly">
  
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect text-left" id="info_delete" >Delete</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>  
                            </div> 
                        </div> 
                    <!-- Delete -->

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

                                    1. Please check maintenance (groups, perspectives, tables, indicators) before you create new Coroprate KPI.<br/>
                                    2. Go to sidebar menu on the left screen , CKPI Administrator > maintenances. <br/>
                                    3. Check each of the information on each category under maintenances. <br/>
                                    4. Any new Corporate KPI will auto populate value from the maintenance lists.<br/>

                                </div>
                            </div>
                        </div>
                    <!-- Instruction -->

                    <!-- List -->
                        <div class="col-lg-12 col-md-12"> 
                            <div class="card card-default">
                                <div class="card-header">  
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Corporate KPI List</h4>  
                                </div>
                                <div class="card-body collapse show">  

                                    <button type="button" class="btn btn-xs btn-success" onClick="addCKPI('<?php echo htmlentities('1'); ?>');" ><i class="mdi mdi-library-plus"> New Corporate KPI</i></button>   
                                    <br/>
                                    <br/>

                                    <form id='form-task' class="form-task" action="" method="post">
                                    @csrf 
                                        <div class="table-responsive"> 
                                            <table id="table-task" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" >
                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                    <tr>
                                                        <th style="vertical-align:top;" rowspan="2">No</th> 
                                                        <th style="vertical-align:top; text-align:center;" colspan="4">Action / Quarter</th>  
                                                        <th style="vertical-align:top; text-align:center;" colspan="4">Quarter</th> 
                                                        <th style="vertical-align:top;" rowspan="2">References Number</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Name</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Year</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Status</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Created By</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Created Date / Time</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Updated By</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Updated Date / Time</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Remarks / Notes</th>    
                                                    </tr>
                                                    <tr> 
                                                        <th style="background-color:#7e8997; color:#ffffff;">Create/Edit</th>    
                                                        <th style="background-color:#7e8997; color:#ffffff;">Rework</th>        
                                                        <th style="background-color:#7e8997; color:#ffffff;">Check/Edit</th>        
                                                        <th style="background-color:#7e8997; color:#ffffff;">View</th>       
                                                        <!-- <th style="background-color:#7e8997; color:#ffffff;">Delete</th>    -->
                                                         
                                                        <th style="background-color:#5D6D7E; color:#ffffff;">Q1</th>    
                                                        <th style="background-color:#5D6D7E; color:#ffffff;">Q2</th>        
                                                        <th style="background-color:#5D6D7E; color:#ffffff;">Q3</th>        
                                                        <th style="background-color:#5D6D7E; color:#ffffff;">Q4</th>    
                                                    </tr>   
                                                </thead> 
                                                <tbody>  
                                                    <?php 
                                                        $counter = 1;
                                                        foreach ($applications as $application) 
                                                        {      
                                                            $parameter= $application->id;       
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $counter++; ?></td>  
                                                                <?php

                                                                    if(   ($application->app_stage == '1') || ($application->app_stage == '12')  ){?>

                                                                        <td>
                                                                            <a href="{{url('/ckpis/submit')}}/<?php echo htmlentities($parameter); ?>/submit"  class="btn btn-xs btn-info text-white">
                                                                                <i class="mdi mdi-send">Create/Edit</i>
                                                                            </a>
                                                                        </td>  
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>  
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>  
                                                                        <td>
                                                                            <a href="{{url('/ckpis/view')}}/<?php echo htmlentities($parameter); ?>/view"  class="btn btn-xs btn-success text-white">
                                                                                <i class="mdi mdi-file-document-box">View</i>
                                                                            </a>
                                                                        </td> 
                                                                        <!-- <td>
                                                                            <a href="javascript:void(0)" onClick="deleteCKPI('<?php //echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                                <i class="mdi mdi-delete-circle">Delete</i>
                                                                            </a>
                                                                        </td>  -->

                                                                        <td><?php echo $application->q1_1_final; ?></td> 
                                                                        <td><?php echo $application->q2_2_final; ?></td> 
                                                                        <td><?php echo $application->q3_3_final; ?></td> 
                                                                        <td><?php echo $application->q4_4_final; ?></td> 

                                                                        <td><?php echo $application->ref_no; ?></td> 
                                                                        <td><?php echo $application->app_name; ?></td> 
                                                                        <td><?php echo $application->app_year; ?></td> 
                                                                        <td><?php echo $application->app_status2; ?></td> 
                                                                        <td><?php echo $application->app_created_by_name; ?></td> 
                                                                        <td><?php echo $application->app_created_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_name; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_created_remark; ?></td> 

                                                                    <?php
                                                                    } else if($application->app_stage == '3') {?>

                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td> 
                                                                        <td>
                                                                            <a href="{{url('/ckpis/rework')}}/<?php echo htmlentities($parameter); ?>/rework"  class="btn btn-xs btn-warning text-white">
                                                                                <i class="mdi mdi-undo-variant">Rework</i>
                                                                            </a>
                                                                        </td>  
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>     
                                                                        <td>
                                                                            <a href="{{url('/ckpis/view')}}/<?php echo htmlentities($parameter); ?>/view"  class="btn btn-xs btn-success text-white">
                                                                                <i class="mdi mdi-undo-variant">View</i>
                                                                            </a>
                                                                        </td>  
                                                                        <!-- <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>   -->

                                                                        <td><?php echo $application->q1_1_final; ?></td> 
                                                                        <td><?php echo $application->q2_2_final; ?></td> 
                                                                        <td><?php echo $application->q3_3_final; ?></td> 
                                                                        <td><?php echo $application->q4_4_final; ?></td> 
                                                                 

                                                                        <td><?php echo $application->ref_no; ?></td> 
                                                                        <td><?php echo $application->app_name; ?></td> 
                                                                        <td><?php echo $application->app_year; ?></td> 
                                                                        <td><?php echo $application->app_status2; ?></td> 
                                                                        <td><?php echo $application->app_created_by_name; ?></td> 
                                                                        <td><?php echo $application->app_created_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_name; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_created_remark; ?></td> 

                                                                    <?php
                                                                    } else if($application->app_stage == '9') {?>

                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td> 
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td> 
                                                                        <td>    
                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter); ?>/checker"  class="btn btn-xs btn-warning text-white">
                                                                                <i class="mdi mdi-undo-variant">Check/Edit</i>
                                                                            </a>
                                                                        </td>      
                                                                        <td>    
                                                                            <a href="{{url('/ckpis/view')}}/<?php echo htmlentities($parameter); ?>/view"  class="btn btn-xs btn-success text-white">
                                                                                <i class="mdi mdi-undo-variant">View</i>
                                                                            </a>
                                                                        </td>  
                                                                        <!-- <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>     -->

                                                                        <td><?php echo $application->q1_1_final; ?></td> 
                                                                        <td><?php echo $application->q2_2_final; ?></td> 
                                                                        <td><?php echo $application->q3_3_final; ?></td> 
                                                                        <td><?php echo $application->q4_4_final; ?></td> 
                                                                

                                                                        <td><?php echo $application->ref_no; ?></td> 
                                                                        <td><?php echo $application->app_name; ?></td> 
                                                                        <td><?php echo $application->app_year; ?></td> 
                                                                        <td><?php echo $application->app_status2; ?></td> 
                                                                        <td><?php echo $application->app_created_by_name; ?></td> 
                                                                        <td><?php echo $application->app_created_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_name; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_created_remark; ?></td> 

                                                                    <?php
                                                                    }  else {?> 
                                                                    
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td> 
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>  
                                                                        <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>    
                                                                        <td>     
                                                                            <a href="{{url('/ckpis/view')}}/<?php echo htmlentities($parameter); ?>/view"  class="btn btn-xs btn-success text-white">
                                                                                <i class="mdi mdi-undo-variant">View</i>
                                                                            </a>
                                                                        </td>  
                                                                        <!-- <td>
                                                                            <a href="javascript:void(0)"  class="btn btn-xs btn-default text-white">
                                                                                <i class="mdi mdi-undo-variant"></i>
                                                                            </a>
                                                                        </td>    -->

                                                                        <td><?php echo $application->q1_1_final; ?></td> 
                                                                        <td><?php echo $application->q2_2_final; ?></td> 
                                                                        <td><?php echo $application->q3_3_final; ?></td> 
                                                                        <td><?php echo $application->q4_4_final; ?></td> 


                                                                        <td><?php echo $application->ref_no; ?></td> 
                                                                        <td><?php echo $application->app_name; ?></td> 
                                                                        <td><?php echo $application->app_year; ?></td> 
                                                                        <td><?php echo $application->app_status2; ?></td> 
                                                                        <td><?php echo $application->app_created_by_name; ?></td> 
                                                                        <td><?php echo $application->app_created_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_name; ?></td> 
                                                                        <td><?php echo $application->app_updated_by_date2; ?></td> 
                                                                        <td><?php echo $application->app_created_remark; ?></td>


                                                                    <?php
                                                                    }
                                                                ?> 
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
                    <!-- List --> 
                   
                </div>
            <!-- 1st Row -->

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
                $("#table-task").dataTable({ 
                    scrollX: false, 
                    ordering: false,  
                    "sScrollXInner": "100%",

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

    // Add
        // Modal
            function addCKPI(id_old){
                var get_id = htmlEntities(id_old);  
                $('#id_add').val(get_id);
                $('#modal_add').modal({
                    show: true
                });  
            }
        // Modal

        // Populate  
            // Year
                $.ajax({
                    url: '<?php echo url("/ckpis/fetch_years"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"year": 'year'},
                    success: function(data)
                    {  
                        var ar              = data;  
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['year_value'] + "'>" + ar[i]['year_value']+ "</option>";
                            $('#year_add').append(_options);
                        } 	 

                        $(".loader").hide();
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                }); 
            // Year 
        // Populate

        // Checking 
            $(function() {
                $("#form-add").validate({
                    rules: {   
                        name_add:           { required: true },   
                        year_add:           { required: true },       
                    },
                    messages: { 
                        name_add:           { required: "<font color='red'>* Cannot be empty</font>" },  
                        year_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
                    }
                });
            });
        // Checking

        // Send Data 
            $(document).ready(function(){
                $('#info_add').click(function(){ 
                    if (!$('#form-add').valid()) 
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
                        title:'Create new CKPI ?',
                        text: "Data will be added once you click on [create] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Create',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            $('#form-add').submit(); 
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
        // Modal
            function deleteCKPI(getid_old)
            {   
                var app_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/ckpis/fetch"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"app_id": app_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var app_id       = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            app_id       = ar[i]['id'];          
                        }	 

                        $('#id_delete').val(app_id);   
                        
                        $('#modal_delete').modal({
                            show: true
                        });  
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });    
            } 
        // Modal

        // Edit Data
            $('#info_delete').click(function(){ 
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: { 
                    cancelButton: 'btn btn-danger',
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false,
                })
                swalWithBootstrapButtons.fire({
                title:'Confirm the details ?',
                text: "Action cannot be undo. Data will be permanently deleted",
                type: 'warning',
                showCancelButton: true, 
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    $( "#form-delete" ).submit();
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
            });
        // Edit Data
    // Delete
</script>
@endsection