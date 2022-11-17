@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        @forelse($tl_apps as $tl_app)
        @empty
        @endforelse

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Table [Edit]</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">Table</li>
                    <li class="breadcrumb-item active">Edit</li>
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

            <!-- 2nd Row -->
                <div class="row">

                    <input type="hidden" id="application_id" class="form-control application_id" name='application_id' value="<?php echo htmlentities($tl_app->id); ?>" placeholder="" readonly="readonly">    

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail" role="tab">General Details</a> </li>  
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#table" role="tab"><font color="red">*</font> Table</a>  </li>   
                                </ul>
                            <!-- Nav tabs --> 

                            <div class="tab-content">
                                
                                <!-- First Tab -->
                                    <div class="tab-pane" id="detail" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Code </small>
                                            <h6>{{$tl_app->tl_code}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Name </small>
                                            <h6>{{$tl_app->gl_value}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Created By / Date Time </small>
                                            <h6>{{$tl_app->tl_created_by_name}} - {{$tl_app->tl_created_by_date2}}</h6>

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Updated By / Date Time </small>
                                            <h6>{{$tl_app->tl_updated_by_name}} - {{$tl_app->tl_updated_by_date2}}</h6>             
                                            
                                        </div>
                                    </div>
                                <!-- First Tab --> 

                                <!-- Second Tab -->
                                    <div class="tab-pane active" id="table" role="tabpanel">
                                        <div class="card-body"> 
  
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <div class="card-actions">
                                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                    </div>
                                                    <h4 class="card-title m-b-0">Table List</h4>  
                                                </div>
                                                <div class="card-body collapse show">  

                                                    <form id='form-table2' class="form-table2" name="form-table2" action="" method="post">
                                                    @csrf 
 
                                                        <button type="button" class="btn btn-xs btn-warning updateTables"  name="updateTables" id="updateTables">Update</button>  
                                                        <br/><br/> 

                                                        <div class="table-responsive"> 
                                                            <table id="table-table2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                                    <tr>         
                                                                        <th style="vertical-align:top;">Rating</th>       
                                                                        <th style="vertical-align:top;">Val</th>        
                                                                    </tr>  
                                                                </thead> 
                                                                <tbody>   
                                                                    <?php
                                                                        foreach($tl_apps as $tl_app){
                                                                            // print_r($tl_app->tl_code);?>
                                                                            
                                                                            <tr>
                                                                                <input type="hidden" id="tl_value_id<?php echo $tl_app->tl_value_item_id; ?>" class="form-control tl_value_id<?php echo $tl_app->tl_value_item_id; ?>" name="tl_value_id[]" value="<?php echo $tl_app->tl_value_item_id; ?>"/>
                                                                                <td><?php echo $tl_app->tlv_rating; ?></td>
                                                                                <td><input type="text" id="tlv_value<?php echo $tl_app->tl_value_item_id; ?>" class="form-control tlv_value<?php echo $tl_app->tl_value_item_id; ?>" name="tlv_value[]" value="<?php echo $tl_app->tlv_value; ?>"/></td>
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
                                <!-- Second Tab -->   

                            </div>

                            
                        </div>
                    </div>

                </div>
            <!-- 2nd Row -->

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
                $("#table-table2").dataTable({ 
                    scrollX: false, 
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

    // Tables
        // Update
            $('#updateTables').click(function(){ 

                $(".loader").show();

                const swalWithBootstrapButtons = Swal.mixin({
                customClass: { 
                    cancelButton: 'btn btn-danger',
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false,
                })
                swalWithBootstrapButtons.fire({
                title:'Update info ?',
                text: "Important Note : Once you click on [Update] button. Kindly wait for the system to finish loading. Do not close the browser tab or refresh the page while its loading.",
                type: 'warning',
                showCancelButton: true, 
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Update',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: '<?php echo url("/ckpis/tables/updateTables"); ?>',
                        type: 'POST', 
                        data: $("#form-table2").serialize(),
                        beforeSend: function(){  
                            $(".loader").show();
                        },
                        success: function(data){ 
                            if(data=="false")
                            { 
                                Swal.fire(
                                    'Empty selection!',
                                    'You need to update at least one data',
                                    'warning'
                                )  
                            } 
                            else if(data=="true")
                            {
                                Swal.fire(
                                    'Table successfully updated!',
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
        // Update 
    // Tables

 

</script>
@endsection