@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Create Using System</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">Task</li>
                    <li class="breadcrumb-item active">Create Using System</li>
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
 
                    <div class="col-lg-12">

                        <!-- Session -->
                            @if(Session::has('empty_staff'))
                                <div class="alert alert-danger alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('empty_staff')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 
                        <!-- Session -->
                        

                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Create Using System</h4>
                            </div>
                            <div class="card-body">
                                
                                <form id='form-add' class="form-add" name="form-add" action="{{url('/obps/systems/add')}}" method="post"> 
                                @csrf  

                                    <div class="form-body"> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Month</label> 
                                                    <input type="month" id="example-month-input" class="form-control month" name="month" value="">  
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Key Deliverables/Description</label>
                                                    <input type="text" onkeydown="upperCaseF(this)" id="key_deliver" class="form-control key_deliver" name="key_deliver" value="" placeholder="">
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Planned Completion Date</label>
                                                    <input type="date" id="completion_date" class="form-control completion_date" name="completion_date" value="" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Planned Completion Time</label>
                                                    <input type="time" id="completion_time" class="form-control completion_time" name="completion_time" value="" placeholder="">
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Person In Charge</label>
                                                    <select id="pic" class="form-control custom-select pic" name="pic" data-placeholder="Choose Type" tabindex="1">
                                                        <option value="" selected="selected">Please choose</option> 
                                                        <option value="MYSELF">Myself</option> 
                                                        <option value="TEAM">Team</option> 
                                                    </select>
                                                </div>
                                            </div> 
                                        </div>  

                                        <div class="row" id="pic_type" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Team</label> 
                                                    <select id="team" class="select2 m-b-10 select2-multiple team" name="team[]" style="width: 100%" multiple="multiple" data-placeholder="Tap and type staff name (please wait until list appear)">
                                                         
                                                    </select>
                                                </div>
                                            </div> 
                                        </div> 
                                        
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id="info_add"> <i class="fa fa-check"></i> Confirm</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>  

                                </form>

                            </div>
                        </div>
                    </div> 
                   
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
    $( document ).ready(function() {
 
    });


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

    // Add  
        // Team On Change
            $(document).ready(function(){

                var selected_pic_type = "";
                $('#pic').change(function(){ 

                    selected_pic_type = $(this).val(); 

                    if(selected_pic_type === ''){

                        $('#pic_type').hide(); 

                    }
                    else if(selected_pic_type == 'MYSELF'){

                        Swal.fire(
                            'Warning!',
                            'By selecting yourself, this task will be locked to your name and cant be pass down to other team member. <br/>By selecting team, this task will be locked to the selected team and cant be pass down to other team member.',
                            'warning'
                        ) 

                        $('#pic_type').hide(); 
                    } 
                    else if(selected_pic_type == 'TEAM')
                    {
                        Swal.fire(
                            'Warning!',
                            'By selecting yourself, this task will be locked to your name and cant be pass down to other team member. <br/>By selecting team, this task will be locked to the selected team and cant be pass down to other team member.',
                            'warning'
                        ) 

                         

                        $('#pic_type').show(); 	 
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
                            $('#team').append(_options);
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
                        month:              { required: true },   
                        key_deliver:        { required: true },      
                        completion_date:    { required: true },       
                        completion_time:    { required: true },       
                        pic:                { required: true },       
                    },
                    messages: { 
                        month:              { required: "<font color='red'>* Cannot be empty</font>" },  
                        key_deliver:        { required: "<font color='red'>* Cannot be empty</font>" },         
                        completion_date:    { required: "<font color='red'>* Cannot be empty</font>" },         
                        completion_time:    { required: "<font color='red'>* Cannot be empty</font>" },         
                        pic:                { required: "<font color='red'>* Cannot be empty</font>" },         
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
                        title:'Confirm Submission ?',
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

</script>


@endsection