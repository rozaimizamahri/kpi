@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Setting</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">OBP</li>
                    <li class="breadcrumb-item">Maintenance</li>
                    <li class="breadcrumb-item active">Setting</li>
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
                            @if(Session::has('enrolment_period_updated'))
                                <div class="alert alert-success alert-rounded">
                                    <i class="fa fa-check-circle"></i>
                                    {{Session::get('enrolment_period_updated')}}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                            @endif 
                        <!-- Session -->
                        

                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Setting</h4>
                            </div>
                            <div class="card-body">
                                
                                <form id='form-add' class="form-add" name="form-add" action="{{url('/obps/settings/edit')}}" method="post"> 
                                @csrf  

                                    <div class="form-body">   
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><font color="red">*</font> Enrolment Period</label>
                                                    <select id="enrolment_period" class="form-control custom-select enrolment_period" name="enrolment_period" data-placeholder="" tabindex="1">
                                                        <option value="" selected="selected">Please Select Enrolment Period</option> 
                                                        <option value="YES">On</option> 
                                                        <option value="NO">Off</option> 
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>   

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><font color="red">*</font> Remarks / Notes</label>
                                                    <div class="col-md-12"> 
                                                        <textarea id="remark" class="form-control remark textarealah" name="remark" rows="5"></textarea> 
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>

                                        
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id="info_add"> <i class="fa fa-check"></i> Confirm</button> 
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
        // Fetch
            $(document).ready(function(){ 
                $.ajax({
                    url: '<?php echo url("/obps/fetchSetting"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"setting": 'setting'},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var setting_value       = "";       
                        var setting_updated_remark       = "";       

                        for (var i = 0; i < ar.length; i++) 
                        {
                            setting_value       = ar[i]['setting_value'];          
                            setting_updated_remark       = ar[i]['setting_updated_remark'];          
                        }	 

                        $('#enrolment_period').val(setting_value).change();   
                        $('#remark').val(setting_updated_remark);   
                        
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });  
            });
        // Fetch

        // Checking 
            $(function() {
                $("#form-add").validate({
                    rules: {   
                        enrolment_period:              { required: true },        
                    },
                    messages: { 
                        enrolment_period:              { required: "<font color='red'>* Cannot be empty</font>" },          
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