@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
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
                            @if(Session::has('task_created'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('task_created')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('task_updated'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('task_updated')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('task_concurred'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('task_concurred')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('task_reassign'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('task_reassign')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('admin_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('admin_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('admin_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('admin_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif

                            @if(Session::has('endorser_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('endorser_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('endorser_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('endorser_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('kpiowner_assign'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('kpiowner_assign')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('assignee_result'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('assignee_result')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('review_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('review_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('review_declare_all'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('review_declare_all')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  

                            @if(Session::has('review_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('review_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif   

                            @if(Session::has('checker_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('checker_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('checker_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('checker_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif   

                            @if(Session::has('reviewer_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('reviewer_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('reviewer_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('reviewer_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif   

                            @if(Session::has('approver_declare'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('approver_declare')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 

                            @if(Session::has('approver_rework'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('approver_rework')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif  
                        <!-- Session -->

                    </div>
                   
                    <!-- OBP  : left Column --> 
                        <!-- Modal -->
                            <!-- Edit -->
                                <div id="modal_edit" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                                <button type="button" class="btn btn-xs close" id="info_task_close2" aria-hidden="true">Close Popup</button>
                                            </div>
                                            <div class="modal-body">

                                                <form id='form-task-edit' class="form-task-edit" name="form-task-edit" action="{{url('/obps/tasks/edit')}}" method="post">  
                                                @csrf 

                                                    <input type="hidden" id="task_id_edit" class="form-control task_id_edit" name='task_id_edit' value="" placeholder="" readonly="readonly">

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">DETAILS INFORMATION</label> 
                                                        </div>
                                                    </div>   

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Month</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="month_edit" class="form-control month_edit" name='month_edit' value="" placeholder="" readonly="readonly">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Key Deliverables / Description</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="key_deli_edit" class="form-control key_deli_edit" name='key_deli_edit' value="" placeholder="" readonly="readonly">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Status</label>
                                                            <div class="col-md-9"> 

                                                                <select id="stat_edit" class="form-control select2 custom-select stat_edit" name="stat_edit" style="width: 100%;"> 
                                                                    <option value='' selected="selected">Please select status</option>
                                                                    <option value='COMPLETED'>Completed</option>
                                                                    <option value='INCOMPLETE'>Cancelled/Incomplete</option> 
                                                                    <option value='ON-GOING'>On-going</option> 
                                                                    <option value='NOT-STARTED'>Not-started</option>  
                                                                </select> 

                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Remarks / Notes</label>
                                                            <div class="col-md-9"> 
                                                                <textarea id="remark_edit" class="form-control remark_edit textarealah" name="remark_edit" rows="2"></textarea> 
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect text-left" id="info_task_close">Cancel</button>
                                                        <button type="button" class="btn btn-warning waves-effect text-left" id="info_task_edit" >Update</button>
                                                    </div>

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row"> 
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Updated By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Date Update</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_user_list">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div>   
                                                        </div>
                                                    </div> 

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Assigner Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Concurred By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Concurred Date</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_assignor_list">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div> 
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>  
                                    </div> 
                                </div>
                            <!-- Edit --> 

                            <!-- Update Task Info --> 
                                <div id="modal_update" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                                <button type="button" class="btn btn-xs close" id="info_task_close6" aria-hidden="true">Close Popup</button>
                                            </div>
                                            <div class="modal-body">

                                                <form id='form-task-update' class="form-task-update" name="form-task-update" action="{{url('/obps/tasks/update')}}" method="post">  
                                                @csrf 

                                                    <input type="hidden" id="task_id_update" class="form-control task_id_update" name='task_id_update' value="" placeholder="" readonly="readonly">

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">DETAILS INFORMATION</label> 
                                                        </div>
                                                    </div>   

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Month</label>
                                                            <div class="col-md-9">  
                                                                <input type="month" id="example-month-input" class="form-control month_update" name="month_update" value="">  
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Key Deliverables / Description</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" onkeydown="upperCaseF(this)"  id="key_deli_update" class="form-control key_deli_update" name='key_deli_update' value="" placeholder="">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Planned Completion Date</label>
                                                            <div class="col-md-9"> 
                                                                <input type="date" id="completion_date_update" class="form-control completion_date_update" name="completion_date_update" value="">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Planned Completion Time</label>
                                                            <div class="col-md-9"> 
                                                                <input type="time" id="completion_time_update" class="form-control completion_time_update" name="completion_time_update" value="">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row"> 
                                                            <label class="control-label text-left col-md-3">Person In Charge</label>
                                                            <div class="col-md-9"> 
                                                                <select id="pic_update" class="form-control custom-select pic_update" name="pic_update" data-placeholder="Choose Type" tabindex="1">
                                                                    <option value="" selected="selected">Please choose</option> 
                                                                    <option value="MYSELF">Myself</option> 
                                                                    <option value="TEAM">Team</option> 
                                                                </select>
                                                            </div> 
                                                        </div>
                                                    </div>   

                                                    <div class="col-md-12" id="pic_type_update" style="display:none;">
                                                        <div class="form-group row"> 
                                                            <label class="control-label text-left col-md-3">Team</label>
                                                            <div class="col-md-9"> 
                                                                <select id="team_update" class="select2 m-b-10 select2-multiple team_update" name="team_update[]" style="width: 100%" multiple="multiple" data-placeholder="Tap and type staff name (please wait until list appear)">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    <!-- <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Remarks / Notes</label>
                                                            <div class="col-md-9"> 
                                                                <textarea id="remark_update" class="form-control remark_update textarealah" name="remark_update" rows="2"></textarea> 
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>   -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect text-left" id="info_task_close7">Cancel</button>
                                                        <button type="button" class="btn btn-warning waves-effect text-left" id="info_task_update" >Update</button>
                                                    </div> 

                                                </form>

                                            </div>
                                        </div>  
                                    </div> 
                                </div>
                            <!-- Update Task Info --> 

                            <!-- Concur -->
                                <div id="modal_concur" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                                <button type="button" class="btn btn-xs close" id="info_task_close4" aria-hidden="true">Close Popup</button>
                                            </div>
                                            <div class="modal-body">

                                                <form id='form-task-concur' class="form-task-concur" name="form-task-concur" action="{{url('/obps/tasks/concur')}}" method="post">  
                                                @csrf 

                                                    <input type="hidden" id="task_id_concur" class="form-control task_id_concur" name='task_id_concur' value="" placeholder="" readonly="readonly">

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">DETAILS INFORMATION</label> 
                                                        </div>
                                                    </div>   

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Month</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="month_concur" class="form-control month_concur" name='month_concur' value="" placeholder="" readonly="readonly">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Key Deliverables / Description</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="key_deli_concur" class="form-control key_deli_concur" name='key_deli_concur' value="" placeholder="" readonly="readonly">
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Status</label>
                                                            <div class="col-md-9"> 

                                                                <select id="stat_concur" class="form-control select2 custom-select stat_concur" name="stat_concur" style="width: 100%;"> 
                                                                    <option value='' selected="selected">Please select status</option>
                                                                    <option value='COMPLETED'>Concurred</option>
                                                                    <option value='INCOMPLETE'>Cancelled/Incomplete</option> 
                                                                    <option value='ON-GOING'>On-going</option> 
                                                                    <option value='NOT-STARTED'>Not-started</option>  
                                                                </select> 

                                                            </div>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Assignor Remark / Notes</label>
                                                            <div class="col-md-9"> 
                                                                <textarea id="remark_concur" class="form-control remark_concur textarealah" name="remark_concur" rows="2"></textarea> 
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect text-left" id="info_task_close5">Cancel</button>
                                                        <button type="button" class="btn btn-warning waves-effect text-left" id="info_task_concur" >Confirm</button>  
                                                    </div>

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row"> 
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark555" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Updated By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Date Update</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_user_list_concur">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div>   
                                                        </div>
                                                    </div> 

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Assigner Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Concurred By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Concurred Date</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_assignor_list_concur">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div> 
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>  
                                    </div> 
                                </div>
                            <!-- Concur --> 

                            <!-- View -->
                                <div id="modal_view" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                                <button type="button" class="btn btn-xs close" id="info_task_close3" aria-hidden="true">Close Popup</button>
                                            </div>
                                            <div class="modal-body">

                                                <form id='form-task-view' class="form-task-view" name="form-task-view" action="{{url('/obps/tasks/view')}}" method="post">  
                                                @csrf 

                                                    <input type="hidden" id="task_id_view" class="form-control task_id_view" name='task_id_view' value="" placeholder="" readonly="readonly">

                                                

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">DETAILS INFORMATION</label> 
                                                        </div>
                                                    </div>   

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Month</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="month_view" class="form-control month_view" name='month_view' value="" placeholder="" disabled>
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Key Deliverables / Description</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="key_deli_view" class="form-control key_deli_view" name='key_deli_view' value="" placeholder="" disabled>
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Status</label>
                                                            <div class="col-md-9"> 
                                                                <input type="text" id="stat_view" class="form-control stat_view" name='stat_view' value="" placeholder="" disabled>
                                                                <small class="form-control-feedback"></small> 
                                                            </div>
                                                        </div>
                                                    </div>     

                                                    <hr>

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row"> 
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Updated By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Date Update</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_user_list_view">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div>   
                                                        </div>
                                                    </div> 

                                                    <hr>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-9">Assigner Remark / Notes Change Log</label>  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                <table id="table-remark1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                        <tr>         
                                                                            <th>#</th>          
                                                                            <th>Concurred By</th>          
                                                                            <th>Status</th>          
                                                                            <th>Remarks / Notes</th>          
                                                                            <th>Concurred Date</th>           
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="remark_assignor_list_view">   
                                                                    </tbody>    
                                                                </table> 
                                                            </div> 
                                                        </div>
                                                    </div> 

                                                </form>

                                            </div>
                                        </div>  
                                    </div> 
                                </div>
                            <!-- View --> 
                        <!-- Modal -->

                        <!-- List -->
                            <div class="col-lg-6 col-xlg-6 col-md-6">  
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                        <h4 class="card-title m-b-0">OBPXcess</h4>
                                    </div>
                                    <div class="card-body collapse show"> 
                                        
                                        <!-- Tab panes -->
                                            <ul class="nav nav-tabs profile-tab" role="tablist">   
                                                <?php
                                                    if(session()->get('head') == 'YES'){?>
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#obp_concur" role="tab">Pending Concur</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#obp_subordinate" role="tab">Subordinate's Task</a></li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#obp_task" role="tab">My Task</a></li>   
                                                    <?php
                                                    } else if(session()->get('head') == 'NO') { 

                                                        if(count($pending_tasks)!=0 )
                                                        {?>

                                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#obp_concur" role="tab">Pending Concur</a> </li>
                                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#obp_task" role="tab">My Task</a></li> 
                                                        
                                                        <?php
                                                        } else {?>
                                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#obp_task" role="tab">My Task</a></li> 
                                                        <?php
                                                        } 

                                                    }
                                                ?>    
                                            </ul>
                                        <!-- Tab panes -->

                                        <!-- Content -->
                                            <div class="tab-content">  

                                                <?php
                                                    if(session()->get('head') == 'YES'){?> 
                                                        
                                                        <!-- First Tab -->
                                                            <div class="tab-pane active" id="obp_concur" role="tabpanel">   
                                                                
                                                                <?php
                                                                    if(count($pending_tasks)!=0 )
                                                                    {?>

                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-concurred" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody>  
                                                                                        <?php
                                                                                            foreach ($pending_tasks as $pending_task) 
                                                                                            {    
                                                                                                $parameter= $pending_task->id; ?> 

                                                                                                <tr> 
                                                                                                    <td>
                                                                                                        <a href="javascript:void(0)" onClick="concurTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                                            <i class="mdi mdi-table-edit">Concur</i>
                                                                                                        </a>
                                                                                                    </td>  
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->month; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->key_deli; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->l2_name; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->l3_name; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->stat; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->is_approve; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->name_approve; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->date_approve; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->remark_approve; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->due_dt; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->due_time; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->act_dt; ?></td>
                                                                                                    <td style="color:#32CD32;"><?php echo $pending_task->remark; ?></td>
                                                                                                </tr> 

                                                                                            <?php
                                                                                            }
                                                                                        ?> 
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div>

                                                                    <?php
                                                                    } else {?>

                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-concurred" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody> 
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div>

                                                                    <?php
                                                                    } 
                                                                ?>

                                                            </div>
                                                        <!-- First Tab --> 

                                                        <!-- Second Tab -->
                                                            <div class="tab-pane" id="obp_subordinate" role="tabpanel">

                                                                <!-- Division -->
                                                                    <?php
                                                                        if(count($division_arrs)!=0 ){?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-subordinate-division" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Staff (Subordinate)</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>   
                                                                                            <?php 
                                                                                                foreach($division_arrs as $division_arr)
                                                                                                {
                                                                                                    if(empty($division_arr)){} 
                                                                                                    else 
                                                                                                    { 
                                                                                                        $parameter = $division_arr['task_id']; 
                                                                                                        ?>

                                                                                                        <tr> 
                                                                                                            <td>
                                                                                                                <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                    <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                </a>
                                                                                                            </td>  
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['staff_staffname']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['month']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['key_deli']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['l2_name']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['l3_name']; ?><?php echo $division_arr['l4_name']; ?><?php echo $division_arr['l5_name']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['stat']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['is_approve']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['name_approve']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['date_approve']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['remark_approve']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['due_dt']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['due_time']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['act_dt']; ?></td>
                                                                                                            <td <?php if($division_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($division_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $division_arr['remark']; ?></td>
                                                                                                        </tr> 

                                                                                                    <?php
                                                                                                    }  
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>

                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Division -->

                                                                <!-- Department -->
                                                                    <?php
                                                                        if(count($department_arrs)!=0 ){?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-subordinate-department" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Staff (Subordinate)</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>   
                                                                                            <?php 
                                                                                                foreach($department_arrs as $department_arr)
                                                                                                {
                                                                                                    if(empty($department_arr)){} 
                                                                                                    else 
                                                                                                    { 
                                                                                                        $parameter = $department_arr['task_id']; 
                                                                                                        ?>

                                                                                                        <tr> 
                                                                                                            <td>
                                                                                                                <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                    <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                </a>
                                                                                                            </td>  
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['staff_staffname']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['month']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['key_deli']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['l2_name']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['l3_name']; ?><?php echo $department_arr['l4_name']; ?><?php echo $department_arr['l5_name']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['stat']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['is_approve']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['name_approve']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['date_approve']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['remark_approve']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['due_dt']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['due_time']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['act_dt']; ?></td>
                                                                                                            <td <?php if($department_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($department_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $department_arr['remark']; ?></td>
                                                                                                        </tr> 

                                                                                                    <?php
                                                                                                    }  
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>

                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Department -->

                                                                <!-- Section -->
                                                                    <?php
                                                                        if(count($section_arrs)!=0 ){?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-subordinate-section" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Staff (Subordinate)</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>   
                                                                                            <?php 
                                                                                                foreach($section_arrs as $section_arr){

                                                                                                    if(empty($section_arr)){}
                                                                                                    else 
                                                                                                    {
                                                                                                        $parameter= $section_arr['task_id'];  
                                                                                                        ?>

                                                                                                        <tr> 
                                                                                                            <td>
                                                                                                                <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                    <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                </a>
                                                                                                            </td>  
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['staff_staffname']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['month']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['key_deli']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['l2_name']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['l3_name']; ?><?php echo $section_arr['l4_name']; ?><?php echo $section_arr['l5_name']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['stat']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['is_approve']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['name_approve']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['date_approve']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['remark_approve']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['due_dt']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['due_time']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['act_dt']; ?></td>
                                                                                                            <td <?php if($section_arr['stat'] == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else if($section_arr['stat'] == 'COMPLETED'){ echo 'style="color:#32CD32;"'; }else{} ?>><?php echo $section_arr['remark']; ?></td>
                                                                                                        </tr> 

                                                                                                    <?php
                                                                                                    }  
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>

                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Section -->
                                                                
                                                            </div>
                                                        <!-- Second Tab -->    

                                                        <!-- Third Tab -->
                                                            <div class="tab-pane" id="obp_task" role="tabpanel">

                                                                <?php
                                                                    if(count($my_tasks)!=0 )
                                                                    {?>

                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-mytask1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody>  
                                                                                        <?php
                                                                                            foreach ($my_tasks as $my_task) 
                                                                                            {    
                                                                                                $parameter= $my_task->id;  

                                                                                                if($my_task->stat == 'COMPLETED'){?>

                                                                                                    <tr> 
                                                                                                        <?php
                                                                                                            if(session()->get('enrol') === 'YES'){?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td> 

                                                                                                            <?php
                                                                                                            } else {?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td> 

                                                                                                            <?php
                                                                                                            }
                                                                                                        ?> 
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->month; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->key_deli; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->l2_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->l3_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->stat; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->is_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->name_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->date_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->remark_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->due_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->due_time; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->act_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->remark; ?></td>
                                                                                                    </tr> 
                                                                                                    
                                                                                                <?php
                                                                                                } 
                                                                                                else {?>

                                                                                                    <tr>  
                                                                                                        <?php
                                                                                                            if(session()->get('enrol') === 'YES'){?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="editCurrentTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-primary">
                                                                                                                        <i class="mdi mdi-table-edit">Edit</i>
                                                                                                                    </a>

                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td>  

                                                                                                            <?php
                                                                                                            } else {?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="editTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                                                        <i class="mdi mdi-table-edit">Update Task</i>
                                                                                                                    </a>

                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td>  

                                                                                                            <?php
                                                                                                            }
                                                                                                        ?> 

                                                                                                        
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->month; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->key_deli; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l2_name; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l3_name; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->stat; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->is_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->name_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->date_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_dt; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_time; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->act_dt; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark; ?></td>
                                                                                                    </tr> 

                                                                                                <?php
                                                                                                } 
                                                                                            }
                                                                                        ?> 
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div>

                                                                    <?php
                                                                    } else {?>

                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-mytask1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody> 
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div>

                                                                    <?php
                                                                    } 
                                                                ?> 

                                                            </div>
                                                        <!-- Third Tab --> 

                                                    <?php
                                                    } else if(session()->get('head') == 'NO') { 
                                                        
                                                        if(count($pending_tasks)!=0 )
                                                        {?>

                                                            <!-- First Tab -->
                                                                <div class="tab-pane active" id="obp_concur" role="tabpanel">   
                                                                    
                                                                    <?php
                                                                        if(count($pending_tasks)!=0 )
                                                                        {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-concurred" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($pending_tasks as $pending_task) 
                                                                                                {    
                                                                                                    $parameter= $pending_task->id; ?> 

                                                                                                    <tr> 
                                                                                                        <td>
                                                                                                            <a href="javascript:void(0)" onClick="concurTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-table-edit">Concur</i>
                                                                                                            </a>
                                                                                                        </td>  
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->month; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->key_deli; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->l2_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->l3_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->stat; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->is_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->name_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->date_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->remark_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->due_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->due_time; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->act_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $pending_task->remark; ?></td>
                                                                                                    </tr> 

                                                                                                <?php
                                                                                                }
                                                                                            ?> 
                                                                                        </tbody>    
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-concurred" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody> 
                                                                                        </tbody>    
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } 
                                                                    ?>

                                                                </div>
                                                            <!-- First Tab -->  

                                                            <!-- Third Tab -->
                                                                <div class="tab-pane" id="obp_task" role="tabpanel">

                                                                <?php
                                                                    if(count($my_tasks)!=0 )
                                                                    {?>

                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-mytask2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody>  
                                                                                        <?php
                                                                                            foreach ($my_tasks as $my_task) 
                                                                                            {    
                                                                                                $parameter= $my_task->id; 

                                                                                                if($my_task->stat == 'COMPLETED'){?>

                                                                                                    <tr> 
                                                                                                        <?php
                                                                                                            if(session()->get('enrol') === 'YES'){?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td> 

                                                                                                            <?php
                                                                                                            } else {?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td> 

                                                                                                            <?php
                                                                                                            }
                                                                                                        ?> 

                                                                                                         
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->month; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->key_deli; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->l2_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->l3_name; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->stat; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->is_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->name_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->date_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->remark_approve; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->due_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->due_time; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->act_dt; ?></td>
                                                                                                        <td style="color:#32CD32;"><?php echo $my_task->remark; ?></td>
                                                                                                    </tr> 
                                                                                                    
                                                                                                <?php
                                                                                                } else {?>

                                                                                                    <tr> 
                                                                                                        <?php
                                                                                                            if(session()->get('enrol') === 'YES'){?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="editCurrentTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-primary">
                                                                                                                        <i class="mdi mdi-table-edit">Edit</i>
                                                                                                                    </a>

                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td>  

                                                                                                            <?php
                                                                                                            } else {?>

                                                                                                                <td>
                                                                                                                    <a href="javascript:void(0)" onClick="editTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                                                        <i class="mdi mdi-table-edit">Update Task</i>
                                                                                                                    </a>

                                                                                                                    <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                        <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                    </a>
                                                                                                                </td>  

                                                                                                            <?php
                                                                                                            }
                                                                                                        ?>  
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->month; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->key_deli; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l2_name; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l3_name; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->stat; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->is_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->name_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->date_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark_approve; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_dt; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_time; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->act_dt; ?></td>
                                                                                                        <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark; ?></td>
                                                                                                    </tr> 

                                                                                                <?php
                                                                                                } 
                                                                                            }
                                                                                        ?> 
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div>

                                                                    <?php
                                                                    } else {?> 
                                                                    
                                                                        <div class="card-body">  
                                                                            <div class="table-responsive" style="overflow:auto;">  
                                                                                <table id="table-obp-mytask2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                    <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                        <tr>         
                                                                                            <th>Action</th>          
                                                                                            <th>Month</th>          
                                                                                            <th>Key Deliverables</th>          
                                                                                            <th>Assign By</th>          
                                                                                            <th>Assign To</th>          
                                                                                            <th>Status</th>          
                                                                                            <th>Concurred</th>          
                                                                                            <th>Concurred By</th>          
                                                                                            <th>Concurred Date</th>          
                                                                                            <th>Concurred Remark</th>          
                                                                                            <th>Planned Completion Date</th>          
                                                                                            <th>Planned Completion Time</th>          
                                                                                            <th>Actual Completion Date</th>          
                                                                                            <th>Remarks / Notes</th>          
                                                                                        </tr> 
                                                                                    </thead> 
                                                                                    <tbody>   
                                                                                    </tbody>    
                                                                                </table> 
                                                                            </div> 
                                                                        </div> 

                                                                    <?php
                                                                    } 
                                                                ?> 
                                                                </div>
                                                            <!-- Third Tab --> 

                                                        <?php
                                                        } else {?> 

                                                            <!-- Third Tab -->
                                                                <div class="tab-pane active" id="obp_task" role="tabpanel">

                                                                    <?php
                                                                        if(count($my_tasks)!=0 )
                                                                        {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-mytask2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($my_tasks as $my_task) 
                                                                                                {    
                                                                                                    $parameter= $my_task->id; 

                                                                                                    if($my_task->stat == 'COMPLETED'){?>

                                                                                                        <tr> 
                                                                                                            <?php
                                                                                                                if(session()->get('enrol') === 'YES'){?>

                                                                                                                    <td>
                                                                                                                        <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                            <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                        </a>
                                                                                                                    </td> 

                                                                                                                <?php
                                                                                                                } else {?>

                                                                                                                    <td>
                                                                                                                        <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                            <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                        </a>
                                                                                                                    </td> 

                                                                                                                <?php
                                                                                                                }
                                                                                                            ?> 
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->month; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->key_deli; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->l2_name; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->l3_name; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->stat; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->is_approve; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->name_approve; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->date_approve; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->remark_approve; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->due_dt; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->due_time; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->act_dt; ?></td>
                                                                                                            <td style="color:#32CD32;"><?php echo $my_task->remark; ?></td>
                                                                                                        </tr> 
                                                                                                        
                                                                                                    <?php
                                                                                                    } else {?>

                                                                                                        <tr> 
                                                                                                            <?php
                                                                                                                if(session()->get('enrol') === 'YES'){?>

                                                                                                                    <td>
                                                                                                                        <a href="javascript:void(0)" onClick="editCurrentTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-primary">
                                                                                                                            <i class="mdi mdi-table-edit">Edit</i>
                                                                                                                        </a>

                                                                                                                        <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                            <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                        </a>
                                                                                                                    </td>  

                                                                                                                <?php
                                                                                                                } else {?>

                                                                                                                    <td>
                                                                                                                        <a href="javascript:void(0)" onClick="editTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                                                            <i class="mdi mdi-table-edit">Update Task</i>
                                                                                                                        </a>

                                                                                                                        <a href="javascript:void(0)" onClick="viewTask('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-info">
                                                                                                                            <i class="mdi mdi-table-edit">View Task</i>
                                                                                                                        </a>
                                                                                                                    </td>  

                                                                                                                <?php
                                                                                                                }
                                                                                                            ?>  
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->month; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->key_deli; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l2_name; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->l3_name; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->stat; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->is_approve; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->name_approve; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->date_approve; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark_approve; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_dt; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->due_time; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->act_dt; ?></td>
                                                                                                            <td <?php if($my_task->stat == 'DELAYED'){ echo 'style="color:#FF0000;"'; }else{} ?>><?php echo $my_task->remark; ?></td>
                                                                                                        </tr> 

                                                                                                    <?php
                                                                                                    } 
                                                                                                }
                                                                                            ?> 
                                                                                        </tbody>    
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?> 
                                                                        
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive" style="overflow:auto;">  
                                                                                    <table id="table-obp-mytask2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>         
                                                                                                <th>Action</th>          
                                                                                                <th>Month</th>          
                                                                                                <th>Key Deliverables</th>          
                                                                                                <th>Assign By</th>          
                                                                                                <th>Assign To</th>          
                                                                                                <th>Status</th>          
                                                                                                <th>Concurred</th>          
                                                                                                <th>Concurred By</th>          
                                                                                                <th>Concurred Date</th>          
                                                                                                <th>Concurred Remark</th>          
                                                                                                <th>Planned Completion Date</th>          
                                                                                                <th>Planned Completion Time</th>          
                                                                                                <th>Actual Completion Date</th>          
                                                                                                <th>Remarks / Notes</th>          
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>   
                                                                                        </tbody>    
                                                                                    </table> 
                                                                                </div> 
                                                                            </div> 

                                                                        <?php
                                                                        } 
                                                                    ?> 
                                                                    </div>
                                                            <!-- Third Tab --> 

                                                        <?php
                                                        } 

                                                    }
                                                ?> 

                                                

                                            </div>
                                        <!-- Content -->

                                    </div>
                                </div> 
                            </div>
                        <!-- List -->
                    <!-- OBP  : left Column -->

                    <!-- CKPI : Right Column --> 
                            <div class="col-lg-6 col-xlg-6 col-md-6">  

                                <div class="card card-default"> 
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                        <h4 class="card-title m-b-0">Corporate KPI Dashboard</h4>
                                    </div>
                                    <div class="card-body collapse show"> 
            
                                        <!-- Dashboard -->
                                            <?php
                                                if(count($completed_ckpis)!=0 )
                                                {?>

                                                    <div class="card-body">  
                                                        <div class="table-responsive"> 
                                                            <table id="table-ckpi-dashboard" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                    <tr>
                                                                        <th width="10%" rowspan="2">Action</th>  
                                                                        <th width="10%" rowspan="2">Title</th>  
                                                                        <th width="50%" rowspan="2">Year</th>       
                                                                        <th width="50%" colspan="4">Quarter</th>       
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Q1</th>
                                                                        <th>Q2</th>
                                                                        <th>Q3</th>
                                                                        <th>Q4</th>
                                                                    </tr>
                                                                </thead> 
                                                                <tbody>  
                                                                    <?php
                                                                        foreach ($completed_ckpis as $completed_ckpi) 
                                                                        {    
                                                                            $parameter= $completed_ckpi->id; 
                                                                        ?>
                                                                            <tr> 
                                                                                <td> 
                                                                                    <a href="{{url('/ckpis/dashboard')}}/<?php echo htmlentities($parameter); ?>/dashboard"  class="btn btn-xs btn-success">
                                                                                        <i class="mdi mdi-file-find"> View Dashboard </i>
                                                                                    </a>	 
                                                                                </td>
                                                                                <td><?php echo $completed_ckpi->app_name; ?></td>
                                                                                <td><?php echo $completed_ckpi->app_year; ?></td>
                                                                                <td><?php echo $completed_ckpi->q1_1_final; ?></td>
                                                                                <td><?php echo $completed_ckpi->q2_2_final; ?></td>
                                                                                <td><?php echo $completed_ckpi->q3_3_final; ?></td>
                                                                                <td><?php echo $completed_ckpi->q4_4_final; ?></td>
                                                                            </tr> 
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </tbody>   
                                                            </table> 
                                                        </div> 
                                                    </div>

                                                <?php
                                                } else {?>


                                                <?php
                                                }
                                            ?> 
                                        <!-- Dashboard -->
                                         
                                    </div> 
                                </div>
                                
                                <div class="card card-default"> 
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                        <h4 class="card-title m-b-0">Corporate KPI (Task)</h4>
                                    </div>
                                    <div class="card-body collapse show"> 
                                        
                                        <!-- Tab panes -->
                                            <ul class="nav nav-tabs profile-tab" role="tablist">

                                                <!-- OBP | CKPI Administrator -->
                                                    <?php
                                                        if(
                                                            (
                                                                (request()->session()->get('level')=='ADMIN')
                                                            ) && 

                                                            (strpos((request()->session()->get('module')),'CKPI')!== false) || 
                                                            (strpos((request()->session()->get('module')),'OBP')!== false)  
                                                        )
                                                        {?>  
                                                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ckpi_pending" role="tab">Pending <button href="javascript:void(0)" class="btn btn-xs btn-warning"><?php //echo $count_pending_endorsers; ?></button></a></li>   -->

                                                            <?php 
                                                                $count_pending = "";
                                                                foreach($count_pending_endorsers as $count1){ 
                                                                    $count_pending = $count1->pending_item; 
                                                                } 

                                                                if($count_pending == '0'){?>
                                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ckpi_pending" role="tab">Pending </a></li>
                                                                <?php
                                                                } else {?>
                                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ckpi_pending" role="tab">Pending <button href="javascript:void(0)" class="btn btn-xs btn-warning"><?php echo $count_pending; ?></button></a></li>
                                                                <?php
                                                                }
                                                            ?>


                                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ckpi_history" role="tab">History</a></li>  
                                                        <?php
                                                        }
                                                    ?>
                                                <!-- OBP | CKPI Administrator --> 
                                                    
                                                <!-- Super Administrator -->
                                                    <?php
                                                        if(
                                                            (
                                                                (request()->session()->get('level')=='SUPERADMIN')
                                                            )  
                                                        )
                                                        {?>   

                                                            <?php 
                                                                $count_pending = "";
                                                                foreach($count_pending_endorsers as $count1){ 
                                                                    $count_pending = $count1->pending_item; 
                                                                } 

                                                                if($count_pending == '0'){?>
                                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ckpi_pending" role="tab">Pending </a></li>
                                                                <?php
                                                                } else {?>
                                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ckpi_pending" role="tab">Pending <button href="javascript:void(0)" class="btn btn-xs btn-warning"><?php echo $count_pending; ?></button></a></li>
                                                                <?php
                                                                }
                                                            ?>

                                            
                                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ckpi_history" role="tab">History</a></li>  
                                                        <?php
                                                        }
                                                    ?>
                                                <!-- Super Administrator -->  

                                                <!-- User -->
                                                    <?php
                                                        if(
                                                            (
                                                                (request()->session()->get('level')=='USER')
                                                            )  
                                                        )
                                                        {?>     
                                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ckpi_pending" role="tab">Pending </a></li>
                                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ckpi_history" role="tab">Task</a></li>  
                                                        <?php
                                                        }
                                                    ?>
                                                <!-- User -->                                                 

                                            </ul>
                                        <!-- Tab panes -->

                                        <!-- Content -->
                                            <div class="tab-content">

                                                <?php
                                                    if(
                                                        (
                                                            (request()->session()->get('level')=='ADMIN')
                                                        ) && 

                                                        (strpos((request()->session()->get('module')),'CKPI')!== false) || 
                                                        (strpos((request()->session()->get('module')),'OBP')!== false) 
                                                    )
                                                    {?>

                                                        <!-- First Tab -->
                                                            <div class="tab-pane active" id="ckpi_pending" role="tabpanel">

                                                                <!-- Pending Create/Edit From User -->
                                                                    <?php
                                                                        if(count($submit_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($submit_users as $submit_user) 
                                                                                                {    
                                                                                                    $parameter= $submit_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/submit')}}/<?php echo htmlentities($parameter); ?>/submit"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Create/Edit </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $submit_user->app_name; ?></td>
                                                                                                        <td><?php echo $submit_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Create/Edit From User -->

                                                                <!-- Pending Endorse From Superior -->
                                                                    <?php
                                                                        if(count($pending_endorsers)!=0 )
                                                                        {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-endorse" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($pending_endorsers as $pending_endorser) 
                                                                                                {    
                                                                                                    $parameter= $pending_endorser->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/endorse')}}/<?php echo htmlentities($parameter); ?>/endorse"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Endorse </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $pending_endorser->app_name; ?></td>
                                                                                                        <td><?php echo $pending_endorser->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Endorse From Superior -->

                                                                <!-- Pending Rework From User -->
                                                                    <?php
                                                                        if(count($rework_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($rework_users as $rework_user) 
                                                                                                {    
                                                                                                    $parameter= $rework_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/rework')}}/<?php echo htmlentities($parameter); ?>/rework"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $rework_user->app_name; ?></td>
                                                                                                        <td><?php echo $rework_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework From User -->

                                                                <!-- Pending KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_assigns as $kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assign </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Assign -->   

                                                                <!-- Pending Assignee -->
                                                                    <?php
                                                                        if(count($assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($assignee_assessments as $assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assessment </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Assignee -->    

                                                                <!-- Pending KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_reviews as $kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Approval -->   

                                                                <!-- Pending Checkers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_checkers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checker" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checkers as $ckpi_admin_checker) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker->app_item_id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Check </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Checkers -->   

                                                                <!-- Pending Rework Checkers --> 
                                                                    <?php
                                                                        if(count($ckpi_admin_checker_reworks)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checkerrework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checker_reworks as $ckpi_admin_checker_rework) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker_rework->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework Checkers --> 

                                                                <!-- Pending Reviewers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_reviewers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-reviewer" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_reviewers as $ckpi_admin_reviewer) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_reviewer->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/reviewer')}}/<?php echo htmlentities($parameter1); ?>/reviewer"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Reviewers --> 

                                                                <!-- Pending Approvers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_approvers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-approver" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_approvers as $ckpi_admin_approver) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_approver->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/approver')}}/<?php echo htmlentities($parameter1); ?>/approver"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Approve </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_approver->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_approver->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr>  
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Approvers -->                                   

                                                            </div>
                                                        <!-- First Tab -->  

                                                        <!-- Second Tab -->
                                                            <div class="tab-pane" id="ckpi_history" role="tabpanel">
                                                                        
                                                                <!-- Approved KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_assigns as $approved_kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assign History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Assign -->   

                                                                <!-- Approved Assignee -->
                                                                    <?php
                                                                        if(count($approved_assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_assignee_assessments as $approved_assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $approved_assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assessment History </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $approved_assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved Assignee -->    

                                                                <!-- Approved KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_reviews as $approved_kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Review History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Approval --> 

                                                            </div>
                                                        <!-- Second Tab --> 

                                                    <?php 
                                                    }    
                                                ?> 

                                                <?php
                                                    if(
                                                        (
                                                            (request()->session()->get('level')=='SUPERADMIN')
                                                        ) && 

                                                        (strpos((request()->session()->get('module')),'CKPI')!== false)  
                                                    )
                                                    {?>

                                                        <!-- First Tab -->
                                                            <div class="tab-pane active" id="ckpi_pending" role="tabpanel">

                                                                <!-- Pending Create/Edit From User -->
                                                                    <?php
                                                                        if(count($submit_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($submit_users as $submit_user) 
                                                                                                {    
                                                                                                    $parameter= $submit_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/submit')}}/<?php echo htmlentities($parameter); ?>/submit"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Create/Edit </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $submit_user->app_name; ?></td>
                                                                                                        <td><?php echo $submit_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Create/Edit From User -->

                                                                <!-- Pending Endorse From Superior -->
                                                                    <?php
                                                                        if(count($pending_endorsers)!=0 )
                                                                        {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-endorse" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($pending_endorsers as $pending_endorser) 
                                                                                                {    
                                                                                                    $parameter= $pending_endorser->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/endorse')}}/<?php echo htmlentities($parameter); ?>/endorse"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Endorse </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $pending_endorser->app_name; ?></td>
                                                                                                        <td><?php echo $pending_endorser->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Endorse From Superior -->

                                                                <!-- Pending Rework From User -->
                                                                    <?php
                                                                        if(count($rework_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($rework_users as $rework_user) 
                                                                                                {    
                                                                                                    $parameter= $rework_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/rework')}}/<?php echo htmlentities($parameter); ?>/rework"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $rework_user->app_name; ?></td>
                                                                                                        <td><?php echo $rework_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework From User -->

                                                                <!-- Pending KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_assigns as $kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assign </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Assign -->   

                                                                <!-- Pending Assignee -->
                                                                    <?php
                                                                        if(count($assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($assignee_assessments as $assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assessment </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Assignee -->    

                                                                <!-- Pending KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_reviews as $kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Approval -->   

                                                                <!-- Pending Checkers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_checkers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checker" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checkers as $ckpi_admin_checker) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker->app_item_id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Check </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Checkers -->   

                                                                <!-- Pending Rework Checkers --> 
                                                                    <?php
                                                                        if(count($ckpi_admin_checker_reworks)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checkerrework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checker_reworks as $ckpi_admin_checker_rework) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker_rework->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework Checkers --> 

                                                                <!-- Pending Reviewers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_reviewers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-reviewer" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_reviewers as $ckpi_admin_reviewer) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_reviewer->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/reviewer')}}/<?php echo htmlentities($parameter1); ?>/reviewer"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Reviewers --> 

                                                                <!-- Pending Approvers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_approvers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-approver" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_approvers as $ckpi_admin_approver) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_approver->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/approver')}}/<?php echo htmlentities($parameter1); ?>/approver"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Approve </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_approver->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_approver->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr>  
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Approvers -->                                   

                                                            </div>
                                                        <!-- First Tab -->  

                                                        <!-- Second Tab -->
                                                            <div class="tab-pane" id="ckpi_history" role="tabpanel">

                                                                <!-- Approved KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_assigns as $approved_kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assign History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Assign -->   

                                                                <!-- Approved Assignee -->
                                                                    <?php
                                                                        if(count($approved_assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_assignee_assessments as $approved_assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $approved_assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assessment History </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $approved_assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved Assignee -->    

                                                                <!-- Approved KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_reviews as $approved_kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Review History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Approval --> 

                                                            </div>
                                                        <!-- Second Tab --> 

                                                    <?php 
                                                    }    
                                                ?> 

                                                <?php
                                                    if((request()->session()->get('level')=='USER'))
                                                    {?>

                                                        <!-- First Tab -->
                                                            <div class="tab-pane active" id="ckpi_pending" role="tabpanel">

                                                                <!-- Pending Create/Edit From User -->
                                                                    <?php
                                                                        if(count($submit_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($submit_users as $submit_user) 
                                                                                                {    
                                                                                                    $parameter= $submit_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/submit')}}/<?php echo htmlentities($parameter); ?>/submit"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Create/Edit </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $submit_user->app_name; ?></td>
                                                                                                        <td><?php echo $submit_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Create/Edit From User -->

                                                                <!-- Pending Endorse From Superior -->
                                                                    <?php
                                                                        if(count($pending_endorsers)!=0 )
                                                                        {?>

                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-endorse" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($pending_endorsers as $pending_endorser) 
                                                                                                {    
                                                                                                    $parameter= $pending_endorser->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/endorse')}}/<?php echo htmlentities($parameter); ?>/endorse"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Endorse </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $pending_endorser->app_name; ?></td>
                                                                                                        <td><?php echo $pending_endorser->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Endorse From Superior -->

                                                                <!-- Pending Rework From User -->
                                                                    <?php
                                                                        if(count($rework_users)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-rework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="50%">Year</th>       
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($rework_users as $rework_user) 
                                                                                                {    
                                                                                                    $parameter= $rework_user->id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/rework')}}/<?php echo htmlentities($parameter); ?>/rework"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $rework_user->app_name; ?></td>
                                                                                                        <td><?php echo $rework_user->app_year; ?></td>
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework From User -->

                                                                <!-- Pending KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_assigns as $kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assign </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Assign -->   

                                                                <!-- Pending Assignee -->
                                                                    <?php
                                                                        if(count($assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($assignee_assessments as $assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Assessment </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Assignee -->    

                                                                <!-- Pending KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($kpi_owner_reviews as $kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending KPI Owner Approval -->   

                                                                <!-- Pending Checkers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_checkers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checker" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checkers as $ckpi_admin_checker) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker->app_item_id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Check </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Checkers -->   

                                                                <!-- Pending Rework Checkers --> 
                                                                    <?php
                                                                        if(count($ckpi_admin_checker_reworks)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-checkerrework" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_checker_reworks as $ckpi_admin_checker_rework) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_checker_rework->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/checker')}}/<?php echo htmlentities($parameter1); ?>/checker"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Rework </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_checker_rework->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Rework Checkers --> 

                                                                <!-- Pending Reviewers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_reviewers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-reviewer" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_reviewers as $ckpi_admin_reviewer) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_reviewer->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/reviewer')}}/<?php echo htmlentities($parameter1); ?>/reviewer"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Review </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_reviewer->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Reviewers --> 

                                                                <!-- Pending Approvers -->
                                                                    <?php
                                                                        if(count($ckpi_admin_approvers)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-approver" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th width="10%">Action</th>  
                                                                                                <th width="10%">Title</th>  
                                                                                                <th width="10%">Year</th>      
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($ckpi_admin_approvers as $ckpi_admin_approver) 
                                                                                                {    
                                                                                                    $parameter1 = $ckpi_admin_approver->id;   
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/approver')}}/<?php echo htmlentities($parameter1); ?>/approver"  class="btn btn-xs btn-warning">
                                                                                                                <i class="mdi mdi-file-find"> Approve </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $ckpi_admin_approver->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $ckpi_admin_approver->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr>  
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Pending Approvers -->                                   

                                                            </div>
                                                        <!-- First Tab -->  

                                                        <!-- Second Tab -->
                                                            <div class="tab-pane" id="ckpi_history" role="tabpanel">

                                                                <!-- Approved KPI Owner Assign -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_assigns)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assign" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%"> 
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_assigns as $approved_kpi_owner_assign) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_assign->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_assign->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/assign_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assign_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assign History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_assign->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_assign->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_assign->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_assign->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_assign->app_year; ?></td> <!-- app_year --> 
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Assign -->   

                                                                <!-- Approved Assignee -->
                                                                    <?php
                                                                        if(count($approved_assignee_assessments)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">    
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-assessment" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_assignee_assessments as $approved_assignee_assessment) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_assignee_assessment->assignee_item_id; 
                                                                                                    $parameter2 = $approved_assignee_assessment->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td style="vertical-align:top;"> 
                                                                                                            <a href="{{url('/ckpis/assessment_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/assessment_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Assessment History </i>
                                                                                                            </a>	 
                                                                                                        </td>  
                                                                                                        <td><?php echo $approved_assignee_assessment->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_assignee_assessment->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_assignee_assessment->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_assignee_assessment->indicator_indicator; ?></td>
                                                                                                        
                                                                                                        <td><?php echo $approved_assignee_assessment->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_assignee_assessment->app_year; ?></td> <!-- app_year -->  
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved Assignee -->    

                                                                <!-- Approved KPI Owner Approval -->
                                                                    <?php
                                                                        if(count($approved_kpi_owner_reviews)!=0 )
                                                                        {?> 
                                                                            <div class="card-body">  
                                                                                <div class="table-responsive"> 
                                                                                    <table id="table-ckpi-review" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                        <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                                                            <tr>
                                                                                                <th style="vertical-align:top;">Action</th>  
                                                                                                <th style="vertical-align:top;">Group</th>  
                                                                                                <th style="vertical-align:top;">Quarter</th>   
                                                                                                <th style="vertical-align:top;">Perspective</th> 
                                                                                                <th style="vertical-align:top; word-wrap: break-word;min-width: 200px;max-width: 200px;">Indicator</th>   
                                                                                                <th style="vertical-align:top;">Title</th>  
                                                                                                <th style="vertical-align:top;">Year</th>    
                                                                                            </tr> 
                                                                                        </thead> 
                                                                                        <tbody>  
                                                                                            <?php
                                                                                                foreach ($approved_kpi_owner_reviews as $approved_kpi_owner_review) 
                                                                                                {    
                                                                                                    $parameter1 = $approved_kpi_owner_review->assignee_item_id; 
                                                                                                    $parameter2 = $approved_kpi_owner_review->app_item_id; 
                                                                                                ?>
                                                                                                    <tr> 
                                                                                                        <td> 
                                                                                                            <a href="{{url('/ckpis/review_history')}}/<?php echo htmlentities($parameter2); ?>/<?php echo htmlentities($parameter1); ?>/review_history"  class="btn btn-xs btn-success">
                                                                                                                <i class="mdi mdi-file-find"> Review History </i>
                                                                                                            </a>	 
                                                                                                        </td>
                                                                                                        <td><?php echo $approved_kpi_owner_review->group_name; ?></td>
                                                                                                        <td><?php echo 'Q'.$approved_kpi_owner_review->quarter_id; ?></td> 
                                                                                                        <td><?php echo $approved_kpi_owner_review->perspective_perspective; ?></td>
                                                                                                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;"><?php echo $approved_kpi_owner_review->indicator_indicator; ?></td>
                                                                                                    
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_name; ?></td> <!-- app_name -->
                                                                                                        <td><?php echo $approved_kpi_owner_review->app_year; ?></td> <!-- app_year -->   
                                                                                                    </tr> 
                                                                                                <?php
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>   
                                                                                    </table> 
                                                                                </div> 
                                                                            </div>

                                                                        <?php
                                                                        } else {?>


                                                                        <?php
                                                                        }
                                                                    ?> 
                                                                <!-- Approved KPI Owner Approval --> 

                                                            </div>
                                                        <!-- Second Tab --> 

                                                    <?php 
                                                    }    
                                                ?>  
                                                
                                            </div>
                                        <!-- Content -->
                                    </div> 
                                </div>  

                            </div> 

                        
                    <!-- CKPI : Right Column --> 
                   
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
            return String(str).replace(/&/g, 'AND')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '')
                                .replace(/'/g, '') 
                                ; 
        }
    // HTML entities

    // Datatable
        $(document).ready(function(){ 

            // DataTable
                var table = $('#table-obp-concurred').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });

                var table = $('#table-obp-mytask1').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });

                var table = $('#table-obp-mytask2').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });
            // DataTable

            // DataTable
                var table = $('#table-obp-subordinate').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });

                var table = $('#table-obp-subordinate-division').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });

                var table = $('#table-obp-subordinate-department').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });

                var table = $('#table-obp-subordinate-section').DataTable({
                    scrollX: false, 
                    ordering: false, 
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                }); 
            // DataTable

            // DataTable
                var table = $('#table-obp-pending').DataTable({
                    scrollX: false, 
                    ordering: false,  
                    searching: true,
                    dom: 'Blfrtip',
                    // pagingType: "simple",
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true }, 
                    ], 
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]] 
                });
            // DataTable

        });
    // Datatable

    // Edit
        // Modal
            function editTask(getid_old)
            {    
                $('#modal_edit').modal({backdrop: 'static', keyboard: false});

                var task_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/obps/fetchTasks"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"task_id": task_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   
                        var task_id             = "";       
                        var month               = "";       
                        var key_deli            = "";        
                        var stat                = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            task_id             = ar[i]['id'];          
                            month               = ar[i]['month'];          
                            key_deli            = ar[i]['key_deli'];                    
                            stat                = ar[i]['stat'];                    
                        }	 

                        $('#task_id_edit').val(task_id);  

                        $('#month_edit').val(month);   
                        $('#key_deli_edit').val(key_deli);  
                        
                        if(stat == 'DELAYED')
                            $('#stat_edit').val("ON-GOING").change(); 
                        else 
                            $('#stat_edit').val(stat).change();  

                        // REMARKS
                            $.ajax({ 
                                url: '<?php echo url("/obps/fetchUserRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_user_list').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });

                            $.ajax({ 

                                url: '<?php echo url("/obps/fetchAssignorRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_assignor_list').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });
                        // REMARKS
                        
                        $('#modal_edit').modal({
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

        // Checking 
            $(function() {
                $("#form-task-edit").validate({
                    rules: {   
                        stat_edit:           { required: true },   
                        remark_edit:         { required: true },           
                    },
                    messages: { 
                        stat_edit:           { required: "<font color='red'>* Cannot be empty</font>" },  
                        remark_edit:         { required: "<font color='red'>* Cannot be empty</font>" },           
                    }
                });
            });
        // Checking

        // Edit Data 
            $(document).ready(function(){
                $('#info_task_edit').click(function(){ 
                    if (!$('#form-task-edit').valid()) 
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
                        title:'Confirm task update ?',
                        text: "Data will be added once you click on [update] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Update',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            $('#form-task-edit').submit(); 
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
        // Edit Data   
    // Edit

    // Update Task Info
        // Modal
            function editCurrentTask(getid_old)
            {    
                $('#modal_update').modal({backdrop: 'static', keyboard: false});

                var task_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/obps/fetchTasks"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"task_id": task_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   

                        var task_id             = "";         
                        var month               = "";       
                        var key_deli            = "";       
                        var due_dt2             = "";       
                        var due_time            = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            task_id             = ar[i]['id'];             
                            month               = ar[i]['month'];                     
                            key_deli            = ar[i]['key_deli'];                     
                            due_dt2             = ar[i]['due_dt2'];                     
                            due_time            = ar[i]['due_time'];                     
                        }	 

                        $('#task_id_update').val(task_id);  

                        var month_mm   = month.substr(0, 2); // 08/2021 : 08
                        var month_yyyy = month.substr(3, 4); // 08/2021 : 2021

                        var new_month = month_yyyy+'-'+month_mm; 
   
                        $('.month_update').val(new_month);  
                        $('#key_deli_update').val(key_deli);  
                        $('#completion_date_update').val(due_dt2);  
                        $('#completion_time_update').val(due_time);  
                        
                        $('#modal_update').modal({
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

        // Team On Change
            $(document).ready(function(){

                var selected_pic_type = "";
                $('#pic_update').change(function(){ 

                    selected_pic_type = $(this).val(); 

                    if(selected_pic_type === ''){

                        $('#pic_type_update').hide(); 

                    }
                    else if(selected_pic_type == 'MYSELF'){

                        Swal.fire(
                            'Warning!',
                            'By selecting yourself, this task will be locked to your name and cant be pass down to other team member. <br/>By selecting team, this task will be locked to the selected team and cant be pass down to other team member.',
                            'warning'
                        ) 

                        $('#pic_type_update').hide(); 
                    } 
                    else if(selected_pic_type == 'TEAM')
                    {
                        Swal.fire(
                            'Warning!',
                            'By selecting yourself, this task will be locked to your name and cant be pass down to other team member. <br/>By selecting team, this task will be locked to the selected team and cant be pass down to other team member.',
                            'warning'
                        ) 

                        

                        $('#pic_type_update').show(); 	 
                    }
                });
            });
        // Team On Change

        // Populate All Staff
            $(document).ready(function(){ 
                $.ajax({
                    url: '<?php echo url("/obps/fetchStaffs"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"staffs": 'staffs'},
                    success: function(data)
                    {  
                        var ar              = data;   
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['SEMAIL'] + "'>["+ar[i]['STAFFNO']+"] - " + ar[i]['STAFFNAME']+ "</option>";
                            $('#team_update').append(_options);
                        } 	  
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });  
            });
        // Populate All Staff

        // Checking 
            $(function() {
                $("#form-task-update").validate({
                    rules: {   
                        month_update:              { required: true },   
                        key_deliver_update:        { required: true },      
                        completion_date_update:    { required: true },       
                        completion_time_update:    { required: true },       
                        pic_update:                { required: true },       
                    },
                    messages: { 
                        month_update:              { required: "<font color='red'>* Cannot be empty</font>" },  
                        key_deliver_update:        { required: "<font color='red'>* Cannot be empty</font>" },         
                        completion_date_update:    { required: "<font color='red'>* Cannot be empty</font>" },         
                        completion_time_update:    { required: "<font color='red'>* Cannot be empty</font>" },         
                        pic_update:                { required: "<font color='red'>* Cannot be empty</font>" },         
                    }
                });
            });
        // Checking

        // Send Data 
            $(document).ready(function(){
                $('#info_task_update').click(function(){ 
                    if (!$('#form-task-update').valid()) 
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
                        title:'Confirm update ?',
                        text: "Data will be added once you click on [update] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Update',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            $('#form-task-update').submit(); 
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
    // Update Task Info

    // Concur
        // Modal
            function concurTask(getid_old)
            {    
                $('#modal_concur').modal({backdrop: 'static', keyboard: false});

                var task_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/obps/fetchTasks"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"task_id": task_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   
                        var task_id             = "";       
                        var month               = "";       
                        var key_deli            = "";        
                        var stat                = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            task_id             = ar[i]['id'];          
                            month               = ar[i]['month'];          
                            key_deli            = ar[i]['key_deli'];                    
                            stat                = ar[i]['stat'];                    
                        }	 

                        $('#task_id_concur').val(task_id);  

                        $('#month_concur').val(month);   
                        $('#key_deli_concur').val(key_deli);  
                        
                        if(stat == 'COMPLETED')
                            $('#stat_concur').val("COMPLETED").change(); 
                        else 
                            $('#stat_concur').val(stat).change();  

                        // REMARKS
                            $.ajax({ 
                                url: '<?php echo url("/obps/fetchUserRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_user_list_concur').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });

                            $.ajax({ 

                                url: '<?php echo url("/obps/fetchAssignorRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_assignor_list_concur').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });
                        // REMARKS
                        
                        $('#modal_concur').modal({
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

        // Checking 
            $(function() {
                $("#form-task-concur").validate({
                    rules: {       
                        stat_concur:         { required: true },           
                        remark_concur:         { required: true },           
                    },
                    messages: {   
                        stat_concur:         { required: "<font color='red'>* Cannot be empty</font>" },           
                        remark_concur:         { required: "<font color='red'>* Cannot be empty</font>" },           
                    }
                });
            });
        // Checking

        // Concur Data 
            $(document).ready(function(){
                $('#info_task_concur').click(function(){ 
                    if (!$('#form-task-concur').valid()) 
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
                        title:'Confirm ?',
                        text: "Data will be added once you click on [Confirm] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Confirm',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            $('#form-task-concur').submit(); 
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
        // Concur Data   
    // Concur

    // View
        // Modal
            function viewTask(getid_old)
            {   
                $('#modal_view').modal({backdrop: 'static', keyboard: false});

                var task_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/obps/fetchTasks"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"task_id": task_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   
                        var task_id             = "";       
                        var month               = "";       
                        var key_deli            = "";        
                        var stat                = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            task_id             = ar[i]['id'];          
                            month               = ar[i]['month'];          
                            key_deli            = ar[i]['key_deli'];                    
                            stat                = ar[i]['stat'];                    
                        }	 

                        $('#task_id_view').val(task_id);  

                        $('#month_view').val(month);   
                        $('#key_deli_view').val(key_deli);  
                        
                        $('#stat_view').val(stat);

                        // REMARKS
                            $.ajax({ 
                                url: '<?php echo url("/obps/fetchUserRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_user_list_view').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });

                            $.ajax({ 

                                url: '<?php echo url("/obps/fetchAssignorRemarks"); ?>' ,
                                type: "GET",
                                dataType: "json",
                                data: {"task_id": task_id_val},
                                success: function(data)
                                {  
                                    var ar          = data;     
                                    var _options    = "";   
                                    var counter     = 1;

                                    for (var i = 0; i < ar.length; i++)
                                    {   
                                        _options =
                                        "<tr>" +   					
                                            "<td>" + counter++ + "</td>" +    					
                                            "<td>" + ar[i]['by_name'] + "</td>" +    					
                                            "<td>" + ar[i]['status'] + "</td>" +    					
                                            "<td>" + ar[i]['remark'] + "</td>" +    					
                                            "<td>" + ar[i]['by_dt'] + "</td>" +    		    					     					
                                        "</tr>";
                                        $('#remark_assignor_list_view').append(_options);  
                                    }

                                },
                                error: function(error){
                                    console.log("Error:");
                                    console.log(error);
                                }
                            });
                        // REMARKS
                              
                        
                        $('#modal_view').modal({
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
    // View

    // Clear Data 
        $(document).ready(function(){
            $('#info_task_close').click(function(){ 
                location.reload();
            });
        }); 

        $(document).ready(function(){
            $('#info_task_close2').click(function(){ 
                location.reload();
            });
        }); 

        $(document).ready(function(){
            $('#info_task_close3').click(function(){ 
                location.reload();
            });
        });

        $(document).ready(function(){
            $('#info_task_close4').click(function(){ 
                location.reload();
            });
        });

        $(document).ready(function(){
            $('#info_task_close5').click(function(){ 
                location.reload();
            });
        });

        $(document).ready(function(){
            $('#info_task_close6').click(function(){ 
                location.reload();
            });
        });

        $(document).ready(function(){
            $('#info_task_close7').click(function(){ 
                location.reload();
            });
        });
    // Clear Data
</script>



@endsection