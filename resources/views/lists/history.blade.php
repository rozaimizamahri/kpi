@extends('layouts.home-page')
@section('css')
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        @forelse($apps as $application)
        @empty
        @endforelse

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">CKPI History</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    <li class="breadcrumb-item">CKPI</li> 
                    <li class="breadcrumb-item">History</li> 
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

            <!-- 3rd Row -->
                <div class="row">

                    <input type="hidden" id="application_id" class="form-control application_id" name='application_id' value="<?php echo htmlentities($application->id); ?>" placeholder="" readonly="readonly">    

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">  

                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meeting" role="tab">General Details</a> </li>   
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#table" role="tab">Table </a>  </li>   -->
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#quarter" role="tab">Dashboard </a>  </li>   
                                </ul>
                            <!-- Nav tabs --> 

                            <div class="tab-content">
                                
                                <!-- First Tab -->
                                    <div class="tab-pane" id="meeting" role="tabpanel">
                                        <div class="card-body">

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> References Number </small>
                                            <h6>{{$application->ref_no}}</h6>   

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> CKPI Name </small>
                                            <h6>{{$application->app_name}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Status </small>
                                            <h6>{{$application->app_status2}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Stage </small>
                                            <h6>{{$application->app_stage2}}</h6> 

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Year </small>
                                            <h6>{{$application->app_year}}</h6>  

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Created By / Date Time </small>
                                            <h6>{{$application->app_created_by_name}} - {{$application->app_created_by_date2}}</h6>

                                            <small class="text-muted"><i class="mdi mdi-format-title"></i> Updated By / Date Time </small>
                                            <h6>{{$application->app_updated_by_name}} - {{$application->app_updated_by_date2}}</h6>         
                                            
                                        </div>
                                    </div>
                                <!-- First Tab -->  

                                <!-- Second Tab (Table) -->
                                    <div class="tab-pane" id="table" role="tabpanel">
                                        <div class="card-body"> 

                                            <?php
                                                if(count($tl_app_arrs) != 0)
                                                {
                                                    $tl_app = 0;
                                                    $tl_value = 1;
                                                    $count_table = 0; 

                                                    $count_table_rating = count($tl_app_arrs);

                                                    foreach($tl_app_arrs as $tl_app_arr)
                                                    {?> 

                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <div class="card-actions">
                                                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                </div>
                                                                <h4 class="card-title m-b-0"><?php echo $tl_app_arr[4]; ?> (<?php echo $tl_app_arr[3]; ?>)
                                                                </h4>
                                                            </div>
                                                            <div class="card-body collapse show">

                                                                <?php
                                                                    

                                                                    foreach($tl_value_arrs[$tl_app] as $tl_value_arr){
                                                                        
                                                                        // echo $count_table;
                                                                        
                                                                        ?>

                                                                        <div class="table-responsive">  
                                                                            <table id="table-tlapp<?php echo $tl_app_arr[0]; ?>" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                                                    <tr>   
                                                                                        <th style="vertical-align:top;">Group</th>    
                                                                                        <th style="vertical-align:top;">Name</th> 
                                                                                        <th style="vertical-align:top;">Rating</th>      
                                                                                        <th style="vertical-align:top;">Value</th>       
                                                                                    </tr>   
                                                                                </thead> 
                                                                                <tbody>  
                                                                                    <?php
                                                                                        $tl_value2 = 0;
 
                                                                                        foreach($tl_value_4_arrs[$tl_value] as $tl_value_4_arr){
                                                                                            
                                                                                        ?>
                                                                                            <tr> 
                                                                                                <td>
                                                                                                    <span id="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[3]; ?></span>
                                                                                                    <input type="hidden" id="tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tl_group_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tl_group[]" value="<?php echo $tl_value_4_arr[3]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[4]; ?></span>
                                                                                                    <input type="hidden" id="tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tl_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tl_value[]" value="<?php echo $tl_value_4_arr[4]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[5]; ?></span>
                                                                                                    <input type="hidden" id="tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tlv_rating_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tlv_rating[]" value="<?php echo $tl_value_4_arr[5]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td> 
                                                                                                <td>
                                                                                                    <span id="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>"><?php echo $tl_value_4_arr[6]; ?></span>
                                                                                                    <input type="hidden" id="tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" class="form-control tlv_value_<?php echo $tl_app_arr[0]; ?>_<?php echo $tl_value2; ?>" name="tlv_value[]" value="<?php echo $tl_value_4_arr[6]; ?>" placeholder="" readonly="readonly"/>
                                                                                                </td>  
                                                                                            </tr>                                                                                            
                                                                                        <?php
                                                                                            $tl_value++; 
                                                                                            $tl_value2++;
                                                                                        } 
                                                                                    ?>     
                                                                                </tbody>   
                                                                            </table> 
                                                                        </div>  

                                                                    <?php
                                                                        $count_table++; 
                                                                    }
                                                                ?>


                                                            </div>
                                                        </div>

                                                    <?php

                                                        $tl_app++;
                                                    } ?>

                                                    <input type="hidden" id="count_table_rating" class="count_table_rating" name="count_table_rating[]" value="<?php echo $count_table_rating; ?>">

                                                <?php
                                                }
                                            ?> 

                                        </div>
                                    </div>
                                <!-- Second Tab (Table) -->

                                <!-- Third Tab (Quarter) -->
                                    <div class="tab-pane active" id="quarter" role="tabpanel">
                                        <div class="card-body"> 
                                            <?php
                                                if(count($quarter_arrs) != 0)
                                                {
                                                    $a                          = 0;
                                                    $group                      = 0; 
                                                    $count                      = 1;
                                                    $z                          = 0;
                                                    $perspective                = 0;
                                                    $count_sum_weigtage_score   = 0;

                                                    $assignee_updated_status    = "";

                                                    $count_perspective2 = count($perspective_arrs);
                                                    // echo $count_perspective2;

                                                    foreach($quarter_arrs as $quarter_arr)
                                                    {
                                                        // $assignee_completed = $quarter_arr[17];
                                                        $assignee_updated_status = $quarter_arr[18];
                                                        if($assignee_updated_status == 'Y'){?>

                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <div class="card-actions">
                                                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                    </div>
                                                                    <h4 class="card-title m-b-0">Quarter <?php echo $quarter_arr[3]; ?>
                                                                    </h4>
                                                                </div>
                                                                <div class="card-body collapse show">

                                                                    <?php    
                                                                        

                                                                        foreach($group_arrs[$group] as $group_arr){?>

                                                                            <div class="card card-default">
                                                                                <div class="card-header">
                                                                                    <div class="card-actions">
                                                                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                                                    </div>
                                                                                    <h4 class="card-title m-b-0"><?php echo $group_arr[1]; ?>
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="card-body collapse show">

                                                                                    <!-- START -->  
                                                                                        <div class="table-responsive">  
                                                                                            <table id="table-assignee<?php echo $perspective; ?>" class="display wrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                                                <thead style="background-color:#5b626b; color:#ffffff;">
                                                                                                    <tr>  
                                                                                                        <th style="vertical-align:top;">No</th>   
                                                                                                        <!-- <th style="vertical-align:top;">Group</th>    -->
                                                                                                        <!-- <th style="vertical-align:top;">Quarter</th>    -->
                                                                                                        <th style="vertical-align:top;">Perspective</th> 
                                                                                                        <th style="vertical-align:top;">Indicators</th>   
                                                                                                        
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 150px;max-width: 150px;">Target <?php echo $application->app_year; ?></th>     
                                                                                                        <th style="vertical-align:top;">YTD Target</th>    
                                                                                                        <th style="vertical-align:top;">YTD Achievement</th>    
                                                                                                        <th style="vertical-align:top;">Achievement %</th>    
                                                                                                        <th style="vertical-align:top;">Rating</th>    
                                                                                                        <th style="vertical-align:top;">Weightage %</th>    
                                                                                                        <th style="vertical-align:top;">Weightage Score</th>       

                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner</th>
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner (Approved Date / Time)</th>
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">KPI Owner (Remarks)</th>
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee (Officer In Charge)</th> 
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee (Assessment Date / Time)</th> 
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Assignee (Remarks)</th> 
                                                                                                        <th style="vertical-align:top; word-wrap: break-word;min-width: 300px;max-width: 300px;">Supporting Document</th> 
                                                                                                    </tr>   
                                                                                                </thead> 
                                                                                                <tbody> 
                                                                                                    <?php 
                                                                                                        $count_1 = 1;
                                                                                                        foreach($perspective_arrs[$perspective] as $perspective_arrs2){  
                                                                                                            ?> 
                                                                                                                <tr>  
                                                                                                                    <td><?php echo $count_1++; ?></td> 
                                                                                                                    <!-- <td><?php // echo $perspective_arrs2[4]; ?></td>    -->
                                                                                                                    <!-- <td><?php // echo $perspective_arrs2[2]; ?></td>    -->
                                                                                                                    <td><?php echo $perspective_arrs2[3]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[1]; ?></td>   
                                                                                                                    

                                                                                                                    <td style="text-align:right;"><?php echo $perspective_arrs2[8]; ?></td>     
                                                                                                                    <td style="text-align:right;"><?php echo $perspective_arrs2[9]; ?></td>     
                                                                                                                    <td style="text-align:right;"><?php echo $perspective_arrs2[10]; ?></td> 

                                                                                                                    <td style="text-align:right;"><?php //echo $perspective_arrs2[11]; ?></td>     
                                                                                                                    <td style="text-align:right;"><?php //echo $perspective_arrs2[12]; ?></td>     
                                                                                                                    <td style="text-align:right;"><?php //echo $perspective_arrs2[13]; ?></td>     
                                                                                                                    <td style="text-align:right;"><?php //echo $perspective_arrs2[14]; ?></td>     

                                                                                                                    <td><?php echo $perspective_arrs2[6]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[18]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[19]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[7]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[16]; ?></td>   
                                                                                                                    <td><?php echo $perspective_arrs2[17]; ?></td>   

                                                                                                                    <td> 
                                                                                                                        <?php 
                                                                                                                            if(empty($perspective_arrs2[21])){
                                                                                                                                echo 'No supporting document yet';
                                                                                                                            } else {?>

                                                                                                                                <a href="{{url('/ckpis/assessment/download')}}/<?php echo htmlentities($perspective_arrs2[20]); ?>/download"  class="">
                                                                                                                                    <i class="mdi mdi-file-find"><?php echo $perspective_arrs2[21]; ?></i>
                                                                                                                                </a>

                                                                                                                            <?php
                                                                                                                            }
                                                                                                                        ?> 	 
                                                                                                                    </td> 
                                                                                                                </tr> 
                                                                                                            <?php   
                                                                                                        }
                                                                                                    ?>
                                                                                                </tbody>    
                                                                                                <tfoot> 

                                                
                                                                                                    
                                                                                                </tfoot> 
                                                                                                
                                                                                            </table> 
                                                                                        </div>  

                                                                                        <input type="hidden" id="table_assignee<?php echo $z; ?>" class="table_assignee_test table_assignee<?php echo $z; ?>" name="table_assignee<?php echo $z; ?>" value="<?php echo $z; ?>">
                                                                                    <!-- END -->

                                                                                </div>
                                                                            </div>  
                                                                        <?php 
                                                                            $z++;
                                                                            $perspective++;
                                                                        }
                                                                    ?> 
                                                                    
                                                                </div>
                                                            </div> 

                                                        <?php
                                                        } else {

                                                        }
                                                        
                                                    ?> 
                                                        
                                                    <?php 
                                                        
                                                        $group++;
                                                    
                                                    }

                                                } 
                                            ?>  

                                            <input type="hidden" id="count_ws" class="count_ws_test count_ws" name="count_ws[]" value="<?php echo $count_perspective2; ?>">
                                            <input type="hidden" id="count_export" class="count_ws_test count_export" name="count_export[]" value="<?php echo $count_perspective2; ?>">
                                        </div>
                                    </div>
                                <!-- Third Tab (Quarter) --> 

                            </div>

                            
                        </div>
                    </div>

                </div>
            <!-- 3rd Row -->

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

    // Count Overall Rating
        var sum_weightage_score1 = 0;   

        var b_tlv_rating_0     = 0;
        var b_tlv_rating_1     = 0;
        var b_tlv_rating_2     = 0;
        var b_tlv_rating_3     = 0;
        var b_tlv_rating_4     = 0; 

        var b_tlv_value_0      = 0;
        var b_tlv_value_1      = 0;
        var b_tlv_value_2      = 0;
        var b_tlv_value_3      = 0;
        var b_tlv_value_4      = 0;

        var count_ws = $('#count_ws').val();
        for(var k=0; k<=count_ws; k++){

            $('.sum_weightage_score'+k).each(function(index){

                sum_weightage_score1 = $(this).val();   

            });

            var table_type2 = 1; // 1 is ID number in OBP_CKPI_TL_APPS table. change it if you want to refer to another table ID 

            // TLV Rating
                $('.tlv_rating_'+table_type2+'_0').each(function(index){
                    b_tlv_rating_0 = $(this).val();  
                }); 
                $('.tlv_rating_'+table_type2+'_1').each(function(index){
                    b_tlv_rating_1 = $(this).val();  
                }); 
                $('.tlv_rating_'+table_type2+'_2').each(function(index){
                    b_tlv_rating_2 = $(this).val();  
                }); 
                $('.tlv_rating_'+table_type2+'_3').each(function(index){
                    b_tlv_rating_3 = $(this).val();  
                }); 
                $('.tlv_rating_'+table_type2+'_4').each(function(index){
                    b_tlv_rating_4 = $(this).val();  
                }); 
            // TLV Rating

            // TLV Value
                $('.tlv_value_'+table_type2+'_0').each(function(index){
                    b_tlv_value_0 = $(this).val();  
                });
                $('.tlv_value_'+table_type2+'_1').each(function(index){
                    b_tlv_value_1 = $(this).val();  
                });
                $('.tlv_value_'+table_type2+'_2').each(function(index){
                    b_tlv_value_2 = $(this).val();  
                });
                $('.tlv_value_'+table_type2+'_3').each(function(index){
                    b_tlv_value_3 = $(this).val();  
                });
                $('.tlv_value_'+table_type2+'_4').each(function(index){
                    b_tlv_value_4 = $(this).val();  
                });
            // TLV Value

            if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_4) ){ // > 115.00

                // $('.sum_rating'+k).val(b_tlv_rating_4); // Rating : 5
                $('.sum_rating'+k).html(b_tlv_rating_4); // Rating : 5

            } else {

                if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_3) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_4) ) {  // > 80.00 && <= 115.00
                                    
                    // $('.sum_rating'+k).val(b_tlv_rating_3); // Rating : 4
                    $('.sum_rating'+k).html(b_tlv_rating_3); // Rating : 4

                } else {

                    if( parseFloat(sum_weightage_score1) > parseFloat(b_tlv_value_1) && parseFloat(sum_weightage_score1) <= parseFloat(b_tlv_value_3) ) {  // > 95.00 && <= 100.00
                                    
                        // $('.sum_rating'+k).val(b_tlv_rating_2); // Rating : 3
                        $('.sum_rating'+k).html(b_tlv_rating_2); // Rating : 3

                    } else {

                        if( parseFloat(sum_weightage_score1) >= parseFloat(b_tlv_value_0) && parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_1) ) {  // >= 80.00 && <= 95.00
                                
                            // $('.sum_rating'+k).val(b_tlv_rating_1); // Rating : 2
                            $('.sum_rating'+k).html(b_tlv_rating_1); // Rating : 2

                        } else {

                            if( parseFloat(sum_weightage_score1) < parseFloat(b_tlv_value_0) ) { // < 80.00 (79.99 and below)
                                
                                // $('.sum_rating'+k).val(b_tlv_rating_0); // Rating : 1
                                $('.sum_rating'+k).html(b_tlv_rating_0); // Rating : 1

                            } else {

                            }

                        }

                    }

                }

            }




            
        }
    // Count Overall Rating

    // Table
        $(document).ready(function(){

            var count_export = $('#count_export').val();
            for(var m=0; m<=count_export; m++){

                $("#table-assignee"+m).dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 
            } 

            var count_table_rating = $('#count_table_rating').val(); 
            for(var n=1; n<=count_table_rating; n++){

                $("#table-tlapp"+n).dataTable({ 
                    scrollX: false, 
                    ordering: false, 
                    dom: 'Blfrtip',
                    buttons: [ 
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true } 
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
                }); 
            }  

        });
    // Table
   
    // Declare
        $(document).ready(function(){ 

            // Checking
                $(function() {
                    $("#form-declare").validate({
                        rules: {
                            remark_declare: {
                            required: true
                            },   
                        },
                        messages: {
                            remark_declare: {
                            required: "<font color='red'>* Cannot be empty</font>"
                            },   
                        }
                    });
                }); 
            // Checking

            // Send
                $('#declare_final').click(function(){ 
                    if (!$('#form-declare').valid()) 
                    {
                        e.preventDefault()
                    }
                    else 
                    {
                        if($(".agree_btn").prop("checked") == true)
                        {    
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Approve application ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Submit',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) { 
                                $( "#form-declare" ).submit();
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
                        else if($(".agree_btn").prop("checked") == false)
                        {
                            Swal.fire(
                                'Empty !',
                                'Please tick on agree checkbox.',
                                'warning'
                            )
                        } 
                    }
                });
            // Send

        });
    // Declare

    // Rework
        $(document).ready(function(){ 

            // Checking
                $(function() {
                    $("#form-rework").validate({
                        rules: {
                            remark_rework: {
                            required: true
                            },   
                        },
                        messages: {
                            remark_rework: {
                            required: "<font color='red'>* Cannot be empty</font>"
                            },   
                        }
                    });
                }); 
            // Checking

            // Send
                $('#rework_final').click(function(){ 
                    if (!$('#form-rework').valid()) 
                    {
                        e.preventDefault()
                    }
                    else 
                    {
                        if($(".rework_btn").prop("checked") == true)
                        {    
                            const swalWithBootstrapButtons = Swal.mixin({
                            customClass: { 
                                cancelButton: 'btn btn-danger',
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false,
                            })
                            swalWithBootstrapButtons.fire({
                            title:'Rework application ?',
                            text: "Action cannot be undo.",
                            type: 'warning',
                            showCancelButton: true, 
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Request to rework',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) { 
                                $( "#form-rework" ).submit();
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
                        else if($(".rework_btn").prop("checked") == false)
                        {
                            Swal.fire(
                                'Empty !',
                                'Please tick on checkbox.',
                                'warning'
                            )
                        } 
                    }
                });
            // Send

        });
    // Rework
</script>
@endsection