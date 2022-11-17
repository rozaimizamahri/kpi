<!DOCTYPE html>
@extends('layouts.home-page')
@section('css')
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Users</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Super Administrator</li>
                    <li class="breadcrumb-item active">Users</li>
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
            <div class="row">
                <div class="col-lg-12 col-md-12"> 

                    <!-- Modal -->
                        <!-- Add -->
                            <div id="modal_add" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Fill in details (Fields <font color="red">*</font> asterisk required)</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-add' class="form-add" name="form-add" action="{{url('/superadministrators/add')}}" method="post"> 
                                            @csrf  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Select Staff</label>
                                                        <div class="col-md-9">  
                                                            <select id="full_name_add" class="form-control select2 custom-select full_name_add" name="full_name_add" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Staff</option>  
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Level Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="level_access_add" class="form-control select2 custom-select level_access_add" name="level_access_add" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Level</option>  
                                                                <option value="SUPERADMIN">Super Admin</option>  
                                                                <option value="ADMIN">Admin</option>  
                                                                <option value="USER">Standard User</option>  
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Module Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="module_access_add" class="form-control select2 custom-select module_access_add" name="module_access_add" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Module</option>  
                                                                <option value="OBP">OBPXcess</option>  
                                                                <option value="CKPI">Corporate KPI</option>  
                                                                <!-- <option value="OBP|CKPI">OBP & CKPI</option>    -->
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Approver Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="approver_access_add" class="form-control select2 custom-select approver_access_add" name="approver_access_add" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Access</option>  
                                                                <option value="1">Checker</option>  
                                                                <option value="2">1st Level Approver</option>  
                                                                <option value="3">Final Approver</option>   
                                                                <!-- <option value="4">Final Approver</option>    -->
                                                            </select>
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

                        <!-- Edit -->
                            <div id="modal_edit" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Fill in details (Fields <font color="red">*</font> asterisk required)</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-edit' class="form-edit" name="form-edit" action="{{url('/superadministrators/edit')}}" method="post"> 
                                            @csrf  

                                            <input type="hidden" id="user_id_edit" class="form-control user_id_edit" name='user_id_edit' value="" placeholder="" readonly="readonly">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Select Status</label>
                                                        <div class="col-md-9">  
                                                            <select id="active_edit" class="form-control select2 custom-select active_edit" name="active_edit" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Status</option>  
                                                                <option value="Y">Active</option>  
                                                                <option value="N">Inactive</option>  
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Level Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="level_access_edit" class="form-control select2 custom-select level_access_edit" name="level_access_edit" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Level</option>  
                                                                <option value="SUPERADMIN">Super Admin</option>  
                                                                <option value="ADMIN">Admin</option>  
                                                                <option value="USER">Standard User</option>  
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Module Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="module_access_edit" class="form-control select2 custom-select module_access_edit" name="module_access_edit" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Module</option>  
                                                                <option value="OBP">OBPXcess</option>  
                                                                <option value="CKPI">Corporate KPI</option>  
                                                                <!-- <option value="OBP|CKPI">OBP & CKPI</option>    -->
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Approver Access</label>
                                                        <div class="col-md-9">  
                                                            <select id="approver_access_edit" class="form-control select2 custom-select approver_access_edit" name="approver_access_edit" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Access</option>  
                                                                <option value="1">Checker</option>  
                                                                <option value="2">1st Level Approver</option>  
                                                                <option value="3">Final Approver</option>   
                                                                <!-- <option value="4">Final Approver</option>    -->
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div> 
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-warning waves-effect text-left" id="info_edit" >Update</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>  
                                </div> 
                            </div> 
                        <!-- Edit -->  

                        <!-- Delete -->
                            <div id="modal_delete" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/superadministrators/delete')}}" method="post"> 
                                            @csrf  

                                            <input type="hidden" id="user_id_delete" class="form-control user_id_delete" name='user_id_delete' value="" placeholder="" readonly="readonly">
 
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
                    <!-- Modal --> 

                    <!-- List -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">User List</h4>

                                @if(Session::has('user_added'))
                                    <div class="alert alert-success alert-rounded">
                                        <i class="fa fa-check-circle"></i>
                                        {{Session::get('user_added')}}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    </div>
                                @endif 

                                @if(Session::has('user_edited'))
                                    <div class="alert alert-success alert-rounded">
                                        <i class="fa fa-check-circle"></i>
                                        {{Session::get('user_edited')}}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    </div>
                                @endif 

                                @if(Session::has('user_deleted'))
                                    <div class="alert alert-success alert-rounded">
                                        <i class="fa fa-check-circle"></i>
                                        {{Session::get('user_deleted')}}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    </div>
                                @endif 

                                @if(Session::has('user_duplicated'))
                                    <div class="alert alert-danger alert-rounded">
                                        <i class="fa fa-check-circle"></i>
                                        {{Session::get('user_duplicated')}}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    </div>
                                @endif  

                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body"> 
                                        
                                        <button type="button" class="btn btn-xs btn-success" onClick="addUSERS('1');" ><i class="mdi mdi-library-plus"> New User</i></button>  
                                        <br/>
                                        <br/>

                                        <form id='form-user' class="form-user" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-user" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#5b626b; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;" rowspan="2">No</th> 
                                                            <th style="vertical-align:top; text-align:center;" colspan="2">Action</th>   
                                                            <th style="vertical-align:top;" rowspan="2">Name</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Email Address</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Status</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Level Access</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Module Access</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Approver Access</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Created By</th> 
                                                            <th style="vertical-align:top;" rowspan="2">Created Date/Time</th> 
                                                            <th style="vertical-align:top;" rowspan="2">Updated By</th> 
                                                            <th style="vertical-align:top;" rowspan="2">Last Updated Date/Time</th> 
                                                        </tr>
                                                        <tr style="background-color:#5b626b; color:#ffffff;">     
                                                            <th>Edit</th>      
                                                            <th>Delete</th>      
                                                        </tr>
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            if(count($users) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($users as $user)
                                                                { 
                                                                    $parameter= $user->user_id;   
                                                                ?>

                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td> 
                                                                            
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="editUSERS('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                <i class="mdi mdi-table-edit"></i>
                                                                            </a>	 
                                                                        </td>
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="deleteUSERS('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                                <i class="mdi mdi-table-edit"></i>
                                                                            </a>	 
                                                                        </td>
                                                                        <td><?php echo $user->staff_name; ?></td>  
                                                                        <td><?php echo $user->email_address; ?></td>  
                                                                        <td><?php echo $user->active; ?></td>  
                                                                        <td><?php echo $user->level_access; ?></td>       
                                                                        <td><?php echo $user->module_access; ?></td>       
                                                                        <td><?php echo $user->approver_access; ?></td>       

                                                                        <td><?php echo $user->created_by_name; ?></td>       
                                                                        <td><?php echo $user->created_by_date; ?></td> 

                                                                        <td><?php echo $user->updated_by_name; ?></td>       
                                                                        <td><?php echo $user->updated_by_date; ?></td>        
                                                                    </tr> 

                                                                <?php
                                                                }
                                                            }
                                                            else
                                                            {

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
                    <!-- List -->

                </div>
            </div>
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

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/plugins/vendors/moment/min/moment.min.js') }} "></script>
<script src="{{ asset('assets/plugins/vendors/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<!-- bootstrap-datetimepicker -->    
<script src="{{ asset('assets/plugins/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }} "></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/plugins/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }} "></script>

<!-- Validate -->
<script src="{{ asset('assets/plugins/validate/1.14.0/jquery.validate.min.js') }} "></script>


<script> 
    // Function HTML Entities
		function htmlEntities(str) {
            return String(str).replace(/&/g, 'AND')
                              .replace(/</g, '&lt;')
                              .replace(/>/g, '&gt;')
                              .replace(/"/g, '')
                              .replace(/'/g, '') 
                              ; 
		}
	// Function HTML Entities

    $(document).ready(function(){
        $("#table-user").dataTable({ 
            scrollX: true, 
            ordering: false, 
            dom: 'Blfrtip',
            buttons: [ 
                { extend: 'excelHtml5', footer: true },
                { extend: 'csvHtml5', footer: true } 
            ], 
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
        });
    });  

    // Add
        // Modal
            function addUSERS(getid_old)
            {    
                $('#modal_add').modal({
                    show: true
                });   
            } 
        // Modal

        // Populate Staff 
            $.ajax({
                url: '<?php echo url("/superadministrators/fetch"); ?>' ,
                type: "GET",
                dataType: "json",
                data: {"staff_no": 'staff_no'},
                success: function(data)
                {  
                    var ar              = data; 
                    var _options = "";
                    for (var i = 0; i < ar.length; i++) 
                    {	
                        var _options = "<option value='" + ar[i]['STAFFNO'] + "'>["+ar[i]['STAFFNO']+"] - " + ar[i]['STAFFNAME']+ "</option>";
                        $('#full_name_add').append(_options);
                    } 	 
                },
                error: function(error){
                    console.log("Error:");
                    console.log(error);
                }
            });  
        // Populate Staff

        // Checking 
            $(function() {
                $("#form-add").validate({
                    rules: {
                        full_name_add: {
                        required: true
                        }, 
                        level_access_add: {
                        required: true
                        },
                        // module_access_add: {
                        // required: true
                        // },   
                    },
                    messages: {
                        full_name_add: {
                        required: "<font color='red'>* Cannot be empty</font>"
                        },  
                        level_access_add: {
                        required: "<font color='red'>* Cannot be empty</font>"
                        },  
                        // module_access_add: {
                        // required: "<font color='red'>* Cannot be empty</font>"
                        // },  
                    }
                });
            });
        // Checking 

        // Create Data
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
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Confirm',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        
                        $( "#form-add" ).submit();

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
        // Create Data
    // Add

    // Edit
        // Modal
            function editUSERS(getid_old)
            {   
                var user_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/superadministrators/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"user_id": user_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var user_id       = "";    
                        var active        = "";    
                        var level_access        = "";    
                        var module_access        = "";    
                        var approver_access        = "";    

                        for (var i = 0; i < ar.length; i++) 
                        {
                            user_id       = ar[i]['user_id'];          
                            active        = ar[i]['active'];          
                            level_access        = ar[i]['level_access'];          
                            module_access        = ar[i]['module_access'];          
                            approver_access        = ar[i]['approver_access'];          
                        }	 

                        $('#user_id_edit').val(user_id);  
                        $('#active_edit').val(active).change();  
                        $('#level_access_edit').val(level_access).change();  
                        $('#module_access_edit').val(module_access).change();  
                        $('#approver_access_edit').val(approver_access).change();  
                        
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
                $("#form-edit").validate({
                    rules: {
                        active_edit: {
                        required: true
                        },  
                        level_access_edit: {
                        required: true
                        },
                        // module_access_edit: {
                        // required: true
                        // },   
                    },
                    messages: {
                        active_edit: {
                        required: "<font color='red'>* Cannot be empty</font>"
                        },  
                        level_access_edit: {
                        required: "<font color='red'>* Cannot be empty</font>"
                        },  
                        // module_access_edit: {
                        // required: "<font color='red'>* Cannot be empty</font>"
                        // }, 
                    }
                });
            });
        // Checking

        // Edit Data
            $('#info_edit').click(function(){ 
                if (!$('#form-edit').valid()) 
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
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Update',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        $( "#form-edit" ).submit();
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
        // Edit Data
    // Edit

    // Delete
        // Modal
            function deleteUSERS(getid_old)
            {   
                var user_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/superadministrators/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"user_id": user_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var user_id       = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            user_id       = ar[i]['user_id'];          
                        }	 

                        $('#user_id_delete').val(user_id);   
                        
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
                text: "Action cannot be undo.",
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
    // Edit

</script> 
@endsection