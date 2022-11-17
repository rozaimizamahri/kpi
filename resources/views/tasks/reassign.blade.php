@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Reassign</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>  
                    <li class="breadcrumb-item">Task</li> 
                    <li class="breadcrumb-item active">Reassign</li>
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

                    <!-- List -->
                        <div class="col-lg-12 col-md-12"> 
                            <div class="card card-default">
                                <div class="card-header"> 
                                    
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Reassign</h4> 

                                </div>

                                <div class="card-body">  
                                    <div class="table-responsive" style="overflow:auto;">  
                                        <table id="table-reassign" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead style="background-color:#5b626b; color:#ffffff;" width="100%">
                                                <tr>         
                                                    <th rowspan="2">Action</th>          
                                                    <th rowspan="2">Month</th>          
                                                    <th rowspan="2">Key Deliverables</th>          
                                                    <th rowspan="2">Assign By</th>          
                                                    <th colspan="3" style="text-align:center;">Assign To</th>          
                                                    <th rowspan="2">Status</th>          
                                                    <th rowspan="2">Concurred</th>          
                                                    <th rowspan="2">Concurred By</th>          
                                                    <th rowspan="2">Concurred Date</th>          
                                                    <th rowspan="2">Concurred Remark</th>          
                                                    <th rowspan="2">Planned Completion Date</th>          
                                                    <th rowspan="2">Planned Completion Time</th>          
                                                    <th rowspan="2">Actual Completion Date</th>          
                                                    <th rowspan="2">Remarks / Notes</th>          
                                                </tr> 
                                                <tr>
                                                    <th style="background-color:#8b96a5; color:#ffffff;">Assignee 1</th>
                                                    <th style="background-color:#8b96a5; color:#ffffff;">Assignee 2</th>
                                                    <th style="background-color:#8b96a5; color:#ffffff;">Assignee 3</th>
                                                </tr>
                                            </thead> 
                                            <tbody>  
                                                <?php
                                                    foreach ($reassigns as $reassign) 
                                                    {    
                                                        $parameter= $reassign->id; ?> 

                                                        <tr> 
                                                            <td> 
                                                                <a href="{{url('/head/reassigns')}}/<?php echo htmlentities($parameter); ?>/view"  class="btn btn-xs btn-success">
                                                                    <i class="mdi mdi-file-find"> Reassign </i>
                                                                </a>	 
                                                            </td> 
                                                            <td style="color:#32CD32;"><?php echo $reassign->month; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->key_deli; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->l2_name; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->l3_name; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->l4_name; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->l5_name; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->stat; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->is_approve2; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->name_approve; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->date_approve2; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->remark_approve; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->due_dt2; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->due_time; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->act_dt2; ?></td>
                                                            <td style="color:#32CD32;"><?php echo $reassign->remark; ?></td>
                                                        </tr> 

                                                    <?php
                                                    }
                                                ?> 
                                            </tbody>    
                                        </table> 
                                    </div> 
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

<script>
    $(document).ready(function(){ 
        var table = $('#table-reassign').DataTable({
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
    });


    // Reassign
        // Modal
            function reassignTask(getid_old)
            {    
                $('#modal_reassign').modal({backdrop: 'static', keyboard: false});

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

        // Reassign Data 
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
        // Reassign Data   
    // Reassign


</script>

@endsection