@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Table</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">Maintenance</li> 
                    <li class="breadcrumb-item active">Table</li>
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

                    <!-- Add -->
                        <div id="modal_add" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- <form id='form-add' class="form-add" name="form-add" action="{{url('/ckpis/tables/add')}}" method="post">  -->
                                        <form id='form-add' class="form-add" name="form-add" action="" method="post"> 
                                        @csrf 

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Group</label>
                                                    <div class="col-md-9"> 
                                                        <select id="group_add" class="form-control select2 custom-select group_add" name="group_add" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Group</option>  
                                                        </select>
                                                        <small class="form-control-feedback"></small>   
                                                    </div>
                                                </div>
                                            </div>   

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Name</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" onkeydown="upperCaseF(this)" id="name_add" class="form-control name_add" name='name_add' value="" placeholder="i.e Gross Impact Ratio">
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Description</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" id="description_add" class="form-control description_add" name='description_add' value="" placeholder="">
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

                    <!-- Edit -->
                        <div id="modal_edit" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Confirm Details (Fields <font color="red">*</font> asterisk required)</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <form id='form-edit' class="form-edit" name="form-edit" action="{{url('/ckpis/years/edit')}}" method="post"> 
                                        @csrf 

                                        <input type="hidden" id="id_edit" class="form-control id_edit" name='id_edit' value="" placeholder="" readonly="readonly">


                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Group</label>
                                                    <div class="col-md-9"> 
                                                        <select id="group_edit" class="form-control select2 custom-select group_edit" name="group_edit" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Group</option>  
                                                        </select>
                                                        <small class="form-control-feedback"></small>   
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Name</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" onkeydown="upperCaseF(this)" id="name_edit" class="form-control name_edit" name='name_edit' value="" placeholder="i.e 2021">
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Descriptions</label>
                                                    <div class="col-md-9"> 
                                                        <textarea id="description_edit" class="form-control description_edit textarealah" name="description_edit" rows="2"></textarea> 
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Remarks / Notes</label>
                                                    <div class="col-md-9"> 
                                                        <textarea id="remark_edit" class="form-control remark_edit textarealah" name="remark_edit" rows="2"></textarea> 
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

                                        <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/ckpis/tables/delete')}}" method="post"> 
                                        @csrf 

                                        <input type="hidden" id="id_delete" class="form-control id_delete" name='id_delete' value="" placeholder="" readonly="readonly">
  

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

                    <!-- List -->
                        <div class="col-lg-12 col-md-12"> 
                            <div class="card card-default">
                                <div class="card-header"> 
                                    
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Table List</h4>

                                    @if(Session::has('table_added'))
                                        <div class="alert alert-success alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('table_added')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                    @endif

                                    @if(Session::has('table_edited'))
                                        <div class="alert alert-warning alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('table_edited')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                    @endif  

                                    @if(Session::has('table_deleted'))
                                        <div class="alert alert-danger alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('table_deleted')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                    @endif 

                                    @if(Session::has('table_duplicated'))
                                        <div class="alert alert-danger alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('table_duplicated')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                    @endif 

                                </div>
                                <div class="card-body collapse show">  

                                    <button type="button" class="btn btn-xs btn-success" onClick="addTable('<?php echo htmlentities('1'); ?>');" ><i class="mdi mdi-library-plus"> New Table</i></button>   
                                    <br/>
                                    <br/>

                                    <form id='form-table' class="form-table" action="" method="post">
                                    @csrf 
                                        <div class="table-responsive"> 
                                            <table id="table-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                    <tr>
                                                        <th style="vertical-align:top;" rowspan="2">No</th> 
                                                        <th style="vertical-align:top; text-align:center;" colspan="2">Action</th>  
                                                        <th style="vertical-align:top;" rowspan="2">Group</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Name</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Description</th>      
                                                        <th style="vertical-align:top;" rowspan="2">Created By</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Created Date / Time</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Updated By</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Updated Date / Time</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Remarks / Notes</th>    
                                                    </tr>
                                                    <tr>            
                                                        <th style="background-color:#7e8997; color:#ffffff;">View Details</th>       
                                                        <th style="background-color:#7e8997; color:#ffffff;">Edit</th>       
                                                        <!-- <th style="background-color:#7e8997; color:#ffffff;">Delete</th>       -->
                                                    </tr>  
                                                </thead> 
                                                <tbody>  
                                                    <?php 
                                                        $counter = 1;
                                                        foreach ($tables as $table) 
                                                        {      
                                                            $parameter= $table->id;       
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $counter++; ?></td>
                                                                <td>
                                                                    <a href="{{url('/ckpis/tables')}}/<?php echo htmlentities($parameter); ?>/tables"  class="btn btn-xs btn-info text-white">
                                                                        <i class="mdi mdi-send">Edit Table</i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)" onClick="editTable('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                        <i class="mdi mdi-table-edit">Edit</i>
                                                                    </a>
                                                                </td>  
                                                                <!-- <td>
                                                                    <a href="javascript:void(0)" onClick="deleteTable('<?php //echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                        <i class="mdi mdi-delete-circle">Delete</i>
                                                                    </a>
                                                                </td>  -->
                                                                <td><?php echo $table->tl_group; ?></td> 
                                                                <td><?php echo $table->tl_value; ?></td> 
                                                                <td><?php echo $table->tl_description; ?></td> 
                                                                <td><?php echo $table->tl_created_by_name; ?></td> 
                                                                <td><?php echo $table->tl_created_by_date2; ?></td> 
                                                                <td><?php echo $table->tl_updated_by_name; ?></td> 
                                                                <td><?php echo $table->tl_updated_by_date2; ?></td> 
                                                                <td><?php echo $table->tl_created_remark; ?></td> 
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
            return String(str).replace(/&/g, 'AND')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '')
                                .replace(/'/g, '') 
                                ; 
        }
    // HTML entities

    // Table
        $(document).ready(function(){
            
            // Export
                $("#table-table").dataTable({ 
                    scrollX: true, 
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

    // Add
        // Modal
            function addTable(id_old){
                var get_id = htmlEntities(id_old);  
                $('#id_add').val(get_id);
                $('#modal_add').modal({
                    show: true
                });  
            }
        // Modal

        // Populate  
            // Group
                $.ajax({
                    url: '<?php echo url("/ckpis/fetch_groups"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"gls": 'gls'},
                    success: function(data)
                    {  
                        var ar              = data;  
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['gl_value'] + "'>" + ar[i]['gl_value']+ "</option>";
                            $('#group_add').append(_options);
                        } 	 

                        $(".loader").hide();
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                }); 
            // Group 
        // Populate

        // Checking 
            $(function() {
                $("#form-add").validate({
                    rules: {   
                        group_add:          { required: true },   
                        name_add:           { required: true },       
                    },
                    messages: { 
                        group_add:          { required: "<font color='red'>* Cannot be empty</font>" },  
                        name_add:           { required: "<font color='red'>* Cannot be empty</font>" },         
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

                        var name_add_old = $('#name_add').val();
                        var name_add     = htmlEntities(name_add_old); 

                        const swalWithBootstrapButtons = Swal.mixin({
                        customClass: { 
                            cancelButton: 'btn btn-danger',
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false,
                        })
                        swalWithBootstrapButtons.fire({
                        title:'Create new table ?',
                        text: "Data will be added once you click on [Create] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Create',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {

                            $.ajax({
                                url: '<?php echo url("/ckpis/tables/add"); ?>',
                                type: 'POST',  
                                data: $("#form-add").serialize()+"&name_add_new="+name_add,
                                beforeSend: function(){ 
                                    $('#modal_add').modal('hide');
                                    $(".loader").show();
                                },
                                success: function(data){  
                                    location.reload();
                                },
                                complete:function(data){ 
                                    $(".loader").hide();
                                }
                            }); 

                            //$('#form-add').submit(); 

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

    // Edit
        // Modal
            function editTable(getid_old)
            {   
                var table_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/ckpis/tables/fetch"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"tl_id": table_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   
                        var tl_id               = "";       
                        var tl_group            = "";       
                        var tl_value            = "";       
                        var tl_description      = "";         

                        for (var i = 0; i < ar.length; i++) 
                        {
                            tl_id               = ar[i]['id'];          
                            tl_group            = ar[i]['tl_group'];          
                            tl_value            = ar[i]['tl_value'];          
                            tl_description      = ar[i]['tl_description'];           
                        }	 

                        $('#id_edit').val(tl_id);   
                        $('#group_edit').val(tl_group).change();   
                        $('#name_edit').val(tl_value);   
                        $('#description_edit').val(tl_description);   
                        
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

        // Populate  
            // Group
                $.ajax({
                    url: '<?php echo url("/ckpis/fetch_groups"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"gls": 'gls'},
                    success: function(data)
                    {  
                        var ar              = data;  
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['gl_value'] + "'>" + ar[i]['gl_value']+ "</option>";
                            $('#group_edit').append(_options);
                        } 	 

                        $(".loader").hide();
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                }); 
            // Group 
        // Populate

        // Checking 
            $(function() {
                $("#form-edit").validate({
                    rules: {   
                        group_edit:         { required: true },   
                        name_edit:          { required: true },   
                        description_edit:   { required: true },        
                        remark_edit:        { required: true },        
                    },
                    messages: { 
                        group_edit:         { required: "<font color='red'>* Cannot be empty</font>" },  
                        name_edit:          { required: "<font color='red'>* Cannot be empty</font>" },         
                        description_edit:   { required: "<font color='red'>* Cannot be empty</font>" },         
                        remark_edit:        { required: "<font color='red'>* Cannot be empty</font>" },         
                    }
                });
            });
        // Checking

        // Edit Data 
            $(document).ready(function(){
                $('#info_edit').click(function(){ 
                    if (!$('#form-edit').valid()) 
                    {
                        e.preventDefault()
                    }
                    else 
                    { 
                        var name_edit_old = $('#name_edit').val();
                        var name_edit     = htmlEntities(name_edit_old);

                        const swalWithBootstrapButtons = Swal.mixin({
                        customClass: { 
                            cancelButton: 'btn btn-danger',
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false,
                        })
                        swalWithBootstrapButtons.fire({
                        title:'Update Year ?',
                        text: "Data will be added once you click on [Update] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Update',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {

                            $.ajax({
                                url: '<?php echo url("/ckpis/tables/edit"); ?>',
                                type: 'POST',  
                                data: $("#form-edit").serialize()+"&name_edit_new="+name_edit,
                                beforeSend: function(){ 
                                    $('#modal_edit').modal('hide');
                                    $(".loader").show();
                                },
                                success: function(data){  
                                    location.reload();
                                },
                                complete:function(data){ 
                                    $(".loader").hide();
                                }
                            }); 

                            // $('#form-edit').submit(); 
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

    // Delete
        // Modal
            function deleteTable(getid_old)
            {   
                var table_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/ckpis/tables/fetch"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"tl_id": table_id_val},
                    success: function(data)
                    {  
                        var ar                  = data;   
                        var tl_id               = "";       
                        var tl_group            = "";       
                        var tl_value            = "";       
                        var tl_description      = "";         

                        for (var i = 0; i < ar.length; i++) 
                        {
                            tl_id               = ar[i]['id'];          
                            tl_group            = ar[i]['tl_group'];          
                            tl_value            = ar[i]['tl_value'];          
                            tl_description      = ar[i]['tl_description'];           
                        }	 

                        $('#id_delete').val(tl_id);   
                        $('#group_delete').val(tl_group).change();   
                        $('#name_delete').val(tl_value);   
                        $('#description_delete').val(tl_description);   
                        
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
                text: "Action cannot be undo. Data will be permanently deleted.",
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