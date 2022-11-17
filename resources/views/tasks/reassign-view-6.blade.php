@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Reassign 6</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">Task</li>
                    <li class="breadcrumb-item active">Reassign 6 (Open 1st & 2nd)</li>
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
                                <h4 class="m-b-0 text-white">Reassign</h4>
                            </div>
                            <div class="card-body">
                                
                                <form id='form-reassign' class="form-reassign" name="form-reassign" action="{{url('/head/reassigns/updateReassign6')}}" method="post"> 
                                @csrf  

                                    <div class="form-body"> 

                                        @forelse($reassigns as $reassign)
                                        @empty
                                        @endforelse

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Key Deliverables / Description : {{$reassign->key_deli}}</label> 
                                                    <input type="hidden" id="task_id" class="form-control task_id" name="task_id" value="{{$reassign->id}}" readonly="readonly"/>
                                                    <input type="hidden" id="key_deli" class="form-control key_deli" name="key_deli" value="{{$reassign->key_deli}}" readonly="readonly"/>
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Assign By : {{$reassign->l2_name}}</label> 
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Assignee 1st Level : {{$reassign->l3_name}}</label> 
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Assignee 2nd Level : {{$reassign->l4_name}}</label> 
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Assignee 3rd Level : {{$reassign->l5_name}}</label> 
                                                </div>
                                            </div> 
                                        </div>   


                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-left col-md-3"><font color="red">*</font> Select Level</label>
                                                <div class="col-md-9"> 
                                                    <select id="level_select" class="form-control select2 custom-select level_select" name="level_select" style="width: 100%;"> 
                                                        <option value="" selected="selected">Select Level</option>  
                                                        <option value="L2">2nd Level</option>  
                                                        <option value="L3">3rd Level</option>  
                                                    </select>
                                                    <small class="form-control-feedback"></small>   
                                                </div>
                                            </div>
                                        </div>  

                                 

                                        <div class="row"  id="L2_type" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label class="control-label">2nd Level</label> 
                                                    <select id="team_2" class="select2 m-b-10 select2-multiple team_2" name="team_2[]" style="width: 100%" multiple="multiple" data-placeholder="Please select name (click on the dropdown and wait until list appear)">
                                                         
                                                    </select>
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="row"  id="L3_type" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label class="control-label">3rd Level</label> 
                                                    <select id="team_3" class="select2 m-b-10 select2-multiple team_3" name="team_3[]" style="width: 100%" multiple="multiple" data-placeholder="Please select name (click on the dropdown and wait until list appear)">
                                                         
                                                    </select>
                                                </div>
                                            </div> 
                                        </div> 


                                        
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id="info_add"> <i class="fa fa-check"></i> Confirm</button>
                                        <a href="{{url('/head/reassigns')}}"  class="btn btn-inverse">
                                            <i class="mdi mdi-file-find"> Back </i>
                                        </a>
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

                var selected_level = "";
                $('#level_select').change(function(){ 

                    selected_level = $(this).val(); 

                    if(selected_level === ''){

                        $('#L2_type').hide(); 
                        $('#L3_type').hide(); 

                    }
                    else if(selected_level == 'L2'){ 
                        $('#L2_type').show();
                        $('#L3_type').hide(); 
                    } 
                    else if(selected_level == 'L3')
                    {  
                        $('#L3_type').show(); 	
                        $('#L2_type').hide(); 
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
                            $('#team_2').append(_options);
                        } 	  
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });  
            });

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
                            $('#team_3').append(_options);
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
                $("#form-reassign").validate({
                    rules: {   
                        level_select:              { required: true },      
                    },
                    messages: { 
                        level_select:              { required: "<font color='red'>* Cannot be empty</font>" },         
                    }
                });
            });
        // Checking

        // Send Data 
            $(document).ready(function(){
                $('#info_add').click(function(){ 
                    if (!$('#form-reassign').valid()) 
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
                        confirmButtonText: 'Reassign',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            $('#form-reassign').submit(); 
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