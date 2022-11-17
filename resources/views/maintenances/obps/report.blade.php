@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Report</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>  
                    <li class="breadcrumb-item">OBP</li>
                    <li class="breadcrumb-item">Maintenance</li>
                    <li class="breadcrumb-item active">Report</li>
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
                                    <h4 class="card-title m-b-0">Report</h4> 

                                </div>
                                <div class="card-body collapse show">   

                                    <form id='form-task' class="form-task" action="" method="post">
                                    @csrf 
                                        <div class="table-responsive"> 
                                            <table id="table-report" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead style="background-color:#5b626b; color:#ffffff;"> 
                                                    
                                                    <tr>
                                                        <th style="vertical-align:top;" rowspan="2">Staff No</th>  
                                                        <th style="vertical-align:top;" rowspan="2">Staff Name / Assigned By</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Month</th>     
                                                        <th style="vertical-align:top;" rowspan="2">Key Deliverables/Descriptions</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Planned Completion Date</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Actual Completion Date</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Planning Time</th>     
                                                        <th style="vertical-align:top; text-align:center;" colspan="3">Person in charge</th>   
                                                        <th style="vertical-align:top;" rowspan="2">Status</th>    
                                                        <th style="vertical-align:top;" rowspan="2">Remarks / Notes</th>    
                                                    </tr>
                                                    <tr> 
                                                        <th style="background-color:#7e8997; color:#ffffff;">Assignee 1</th>    
                                                        <th style="background-color:#7e8997; color:#ffffff;">Assignee 2</th>        
                                                        <th style="background-color:#7e8997; color:#ffffff;">Assignee 3</th>         
                                                    </tr>     
                                                </thead> 
                                                <tbody>  
                                                    <?php 
                                                        $counter = 1;
                                                        foreach ($arr as $ar) 
                                                        {?>
                                                            <tr>
                                                                <td><?php echo $ar['staff_staffno']; ?></td>     
                                                                <td><?php echo $ar['staff_staffname']; ?></td>     
                                                                <td><?php echo $ar['month']; ?></td>     
                                                                <td><?php echo $ar['key_deli']; ?></td>     
                                                                <td><?php echo $ar['due_dt2']; ?></td>     
                                                                <td><?php echo $ar['act_dt2']; ?></td>     
                                                                <td><?php echo $ar['due_time']; ?></td>     
                                                                <td><?php echo $ar['l3_name']; ?></td>     
                                                                <td><?php echo $ar['l4_name']; ?></td>     
                                                                <td><?php echo $ar['l5_name']; ?></td>     
                                                                <td><?php echo $ar['stat']; ?></td>     
                                                                <td><?php echo $ar['remark']; ?></td>     
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

<script>
    $(document).ready(function(){ 
            var table = $('#table-report').DataTable({
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

</script>

@endsection