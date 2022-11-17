@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Email Reminder</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">Maintenance</li> 
                    <li class="breadcrumb-item active">Email Reminder</li>
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

                                        <!-- <form id='form-add' class="form-add" name="form-add" action="{{url('/ckpis/ils/add')}}" method="post">  -->
                                        <form id='form-add' class="form-add" name="form-add" action="" method="post"> 
                                        @csrf 

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Subject</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" id="subject" class="form-control subject" name='subject' value="" placeholder="">
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Description</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" id="description" class="form-control description" name='description' value="" placeholder="">
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Remarks / Notes</label>
                                                    <div class="col-md-9"> 
                                                        <textarea id="remark" class="form-control remark textarealah" name="remark" rows="2"></textarea> 
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font>Staff</label>
                                                    <div class="col-md-9"> 
                                                        <select id="staff" class="select2 m-b-10 select2-multiple staff" name="staff[]" style="width: 100%" multiple="multiple" data-placeholder="Please select name (please wait until list appear)">
                                                            
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

                    <!-- List -->
                        <div class="col-lg-12 col-md-12"> 
                            <div class="card card-default">
                                <div class="card-header"> 
                                    
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Email Reminder Log</h4>

                                    @if(Session::has('email_added'))
                                        <div class="alert alert-success alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('email_added')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                    @endif

                                    @if(Session::has('empty_staff'))
                                        <div class="alert alert-danger alert-rounded">
                                            <i class="fa fa-check-circle"></i>
                                            {{Session::get('empty_staff')}}

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

                                </div>
                                <div class="card-body collapse show">  

                                    <button type="button" class="btn btn-xs btn-success" onClick="addReminder('<?php echo htmlentities('1'); ?>');" ><i class="mdi mdi-library-plus"> New Reminder</i></button>   
                                    <br/>
                                    <br/>

                                    <form id='form-emailreminder' class="form-emailreminder" action="" method="post">
                                    @csrf 
                                        <div class="table-responsive"> 
                                            <table id="table-emailreminder" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                    <tr>
                                                        <th style="vertical-align:top;">No</th>   
                                                        <th style="vertical-align:top;">Subject</th>     
                                                        <th style="vertical-align:top;">Email content/description</th>      
                                                        <th style="vertical-align:top;">Sender Type</th>      
                                                        <th style="vertical-align:top;">Sent By</th>    
                                                        <th style="vertical-align:top;">Sent Date / Time</th>       
                                                        <th style="vertical-align:top;">Remarks / Notes</th>    
                                                    </tr>  
                                                </thead> 
                                                <tbody>  
                                                    <?php 
                                                        $counter = 1;
                                                        foreach ($reminders as $reminder) 
                                                        {?>
                                                            <tr> 
                                                                <td><?php echo $counter++; ?></td> 
                                                                <td><?php echo $reminder->reminder_subject; ?></td> 
                                                                <td><?php echo $reminder->reminder_description; ?></td> 
                                                                <td><?php echo $reminder->reminder_type; ?></td> 
                                                                <td><?php echo $reminder->reminder_sent_by_name; ?></td> 
                                                                <td><?php echo $reminder->reminder_sent_by_date2; ?></td> 
                                                                <td><?php echo $reminder->reminder_sent_remark; ?></td>  
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
            return String(str).replace(/&/g, 'and')
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
                $("#table-emailreminder").dataTable({ 
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
            function addReminder(id_old){
                var get_id = htmlEntities(id_old);  
                $('#id_add').val(get_id);
                $('#modal_add').modal({
                    show: true
                });  
            }
        // Modal

        // Populate All Staff
            $(document).ready(function(){ 
                $.ajax({
                    url: '<?php echo url("/ckpis/reminders/fetchStaffs"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"staffs": 'staffs'},
                    success: function(data)
                    {  
                        var ar              = data;   
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['STAFFNO'] + "'>["+ar[i]['STAFFNO']+"] - " + ar[i]['STAFFNAME']+ "</option>";
                            $('#staff').append(_options);
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
                $("#form-add").validate({
                    rules: {   
                        subject:           { required: true },   
                        description:       { required: true },       
                        remark:            { required: true },       
                    },
                    messages: { 
                        subject:           { required: "<font color='red'>* Cannot be empty</font>" },  
                        description:       { required: "<font color='red'>* Cannot be empty</font>" },         
                        remark:            { required: "<font color='red'>* Cannot be empty</font>" },         
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

                        var subject_old = $('#subject').val();
                        var subject     = htmlEntities(subject_old);

                        var description_old = $('#description').val();
                        var description     = htmlEntities(description_old);

                        const swalWithBootstrapButtons = Swal.mixin({
                        customClass: { 
                            cancelButton: 'btn btn-danger',
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false,
                        })
                        swalWithBootstrapButtons.fire({
                        title:'Send email reminder ?',
                        text: "Data will be added once you click on [Send] button.",
                        type: 'warning',
                        showCancelButton: true, 
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Send',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {

                            // $('#form-add').submit();
                            $.ajax({
                                url: '<?php echo url("/ckpis/reminders/add"); ?>',
                                type: 'POST',  
                                data: $("#form-add").serialize()+"&subject_new="+subject+"&description_new="+description,
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
</script>
@endsection