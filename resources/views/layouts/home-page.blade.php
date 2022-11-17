<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon --> 
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon1.png') }} ">
    <title>OBPXcess</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/css/colors/blue.css') }} " id="theme" rel="stylesheet">

    <!-- Sweet Alert 2 Js -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/css/sweetalert2.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/css/sweetalert2.min.css') }} ">


    <!-- Select 2 --> 
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }} " rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }} " rel="stylesheet" /> 
    <link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }} " rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .textarealah{  
        display: block;
        box-sizing: padding-box;
        overflow: hidden;
        resize: vertical;
        padding: 5px 8px;
        font-size: 11px;
        border-radius: 0;
        border: 1px solid #ccc;
        width:100%;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        min-height: 30px;
      }  

      .loader {
            position:fixed;
            z-index: 99;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            opacity:0.8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader > img {
            width: 100px;
        }

        .loader.hidden {
            animation: fadeOut 1s;
            animation-fill-mode: forwards;
        }

        @keyframes fadeOut {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }

        html {
            -webkit-font-smoothing: antialiased!important;
            -moz-osx-font-smoothing: grayscale!important;
            -ms-font-smoothing: antialiased!important;
        }
        body {
        font-family: 'Open Sans', sans-serif;
        font-size:16px;
        color:#555555; 
        }
        .md-stepper-horizontal {
            display:table;
            width:100%;
            margin:0 auto;
            background-color:#FFFFFF;
            box-shadow: 0 3px 8px -6px rgba(0,0,0,.50);
        }
        .md-stepper-horizontal .md-step {
            display:table-cell;
            position:relative;
            padding:24px;
        }
        .md-stepper-horizontal .md-step:hover,
        .md-stepper-horizontal .md-step:active {
            background-color:rgba(0,0,0,0.04);
        }
        .md-stepper-horizontal .md-step:active {
            border-radius: 15% / 75%;
        }
        .md-stepper-horizontal .md-step:first-child:active {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .md-stepper-horizontal .md-step:last-child:active {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .md-stepper-horizontal .md-step:hover .md-step-circle {
            background-color:#757575;
        }
        .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
        .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
            display:none;
        }
        .md-stepper-horizontal .md-step .md-step-circle {
            width:30px;
            height:30px;
            margin:0 auto;
            background-color:#999999;
            border-radius: 50%;
            text-align: center;
            line-height:30px;
            font-size: 16px;
            font-weight: 600;
            color:#FFFFFF;
        }
        .md-stepper-horizontal.green .md-step.active .md-step-circle {
            background-color:#00AE4D;
        }
        .md-stepper-horizontal.orange .md-step.active .md-step-circle {
            background-color:#F96302;
        }
        .md-stepper-horizontal .md-step.active .md-step-circle {
            background-color: rgb(33,150,243);
        }
        .md-stepper-horizontal .md-step.done .md-step-circle:before {
            font-family:'FontAwesome';
            font-weight:100;
            content: "\f00c";
        }
        .md-stepper-horizontal .md-step.done .md-step-circle *,
        .md-stepper-horizontal .md-step.editable .md-step-circle * {
            display:none;
        }
        .md-stepper-horizontal .md-step.editable .md-step-circle {
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
        .md-stepper-horizontal .md-step.editable .md-step-circle:before {
            font-family:'FontAwesome';
            font-weight:100;
            content: "\f040";
        }
        .md-stepper-horizontal .md-step .md-step-title {
            margin-top:16px;
            font-size:16px;
            font-weight:600;
        }
        .md-stepper-horizontal .md-step .md-step-title,
        .md-stepper-horizontal .md-step .md-step-optional {
            text-align: center;
            color:rgba(0,0,0,.26);
        }
        .md-stepper-horizontal .md-step.active .md-step-title {
            font-weight: 600;
            color:rgba(0,0,0,.87);
        }
        .md-stepper-horizontal .md-step.active.done .md-step-title,
        .md-stepper-horizontal .md-step.active.editable .md-step-title {
            font-weight:600;
        }
        .md-stepper-horizontal .md-step .md-step-optional {
            font-size:12px;
        }
        .md-stepper-horizontal .md-step.active .md-step-optional {
            color:rgba(0,0,0,.54);
        }
        .md-stepper-horizontal .md-step .md-step-bar-left,
        .md-stepper-horizontal .md-step .md-step-bar-right {
            position:absolute;
            top:36px;
            height:1px;
            border-top:1px solid #DDDDDD;
        }
        .md-stepper-horizontal .md-step .md-step-bar-right {
            right:0;
            left:50%;
            margin-left:20px;
        }
        .md-stepper-horizontal .md-step .md-step-bar-left {
            left:0;
            right:50%;
            margin-right:20px;
        } 
    </style>

    @yield('css')
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="loader">
        <img src="{{ asset('assets/images/giphy.gif') }}" alt="loading.....">
    </div>

    <div id="loaderpage" class="loader" style='display: none;'>
        <img src="{{ asset('assets/images/giphy.gif') }}" alt="loading.....">
    </div>
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="javascript:void(0)">
                                <!-- Logo icon --><b>
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <!-- <img src="{{ asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" /> -->
                                    <!-- Light Logo icon -->
                                    <img src="{{ asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="{{ asset('assets/images/logo-text2.png')}}" alt="homepage" class="dark-logo" width="150" />
                                <!-- Light Logo text -->    
                                <img src="{{ asset('assets/images/logo-light-text2.png')}}" class="light-logo" alt="homepage" /></span> 
                            </a>
                        </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0"> 
                            
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-my"></i></a>
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo Session::get('staff_name'); ?></a>
                                <div class="dropdown-menu dropdown-menu-right scale-up">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                
                                                <div class="u-img">
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode(Session::get('dp')); ?>" alt="user">
                                                </div> 
                                                
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li> 
                                        <li><a href="javascript:void(0)"><i class="mdi mdi-account-box"></i> {{Session::get('staff_name')}}</a></li>  
                                        <li><a href="javascript:void(0)"><i class="mdi mdi-email-variant"></i> <span style="font-size:12px;">{{Session::get('email')}} </span> </a></li>   
                                        <li role="separator" class="divider"></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                        
                    <!-- User profile -->
                        <div class="user-profile">
                            <!-- User profile image -->
                            <div class="profile-img"> <img src="data:image/jpeg;base64,<?php echo base64_encode(Session::get('dp')); ?>" alt="user" />
                                <!-- this is blinking heartbit-->
                                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </div>
                            <!-- User profile text-->
                            <div class="profile-text">
                                Welcome
                                <h5>{{Session::get('staff_name')}}</h5>            
                                <!-- [{{Session::get('level')}}] -->
                                <!-- [{{Session::get('email')}}] -->
                            </div>
                        </div>
                    <!-- End User profile text-->

                    <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li class="nav-devider"></li>
                                <li class="nav-small-cap">MAIN</li>

                                <!-- HOME -->
                                    <li> 
                                        <a class="waves-effect waves-dark" href="{{url('/home')}}" aria-expanded="false">
                                        <i class="mdi mdi-home-variant"></i>
                                            <span class="hide-menu">Dashboard  
                                            </span>
                                        </a> 
                                    </li> 
                                <!-- HOME -->

                                <!-- TASK (HEAD ONLY) -->
                                    <?php
                                        if(session()->get('head') == 'YES'){?>
                                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Task</span></a>
                                                <ul aria-expanded="false" class="collapse">
                                                    <li><a href="{{url('/head/systems')}}">Create Using System</a></li> 
                                                    <!-- <li><a href="{{url('/head/excels')}}">Create Using Excel</a></li>    -->
                                                    <li><a href="{{url('/head/reassigns')}}">Reassign</a></li> 
                                                </ul>
                                            </li> 
                                        <?php
                                        } else {?> 

                                        <?php
                                        }
                                    ?>      
                                <!-- TASK (HEAD ONLY) --> 

                                <!-- ADMIN OBP (INCLUDE SPECIAL) -->
                                    <?php
                                        if(
                                            (
                                                (request()->session()->get('level')=='ADMIN')
                                            ) && 

                                            (strpos((request()->session()->get('module')),'OBP')!== false)  
                                        )
                                        {?>    
                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">[OBP] Administrator</span></a>
                                                <ul aria-expanded="false" class="collapse">
                                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Task</span></a>
                                                        <ul aria-expanded="false" class="collapse">
                                                            <li><a href="{{url('/obps/systems')}}">Create Using System</a></li> 
                                                            <!-- <li><a href="{{url('/obps/excels')}}">Create Using Excel</a></li>  -->
                                                            <li><a href="{{url('/obps/reassigns')}}">Reassign</a></li>  
                                                        </ul>
                                                    </li>   
                                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Maintenance</span></a>
                                                        <ul aria-expanded="false" class="collapse">
                                                            <!-- <li><a href="{{url('/obps/alltasklists')}}">All Task List</a></li>  -->
                                                            <li><a href="{{url('/obps/settings')}}">Setting</a></li> 
                                                            <li><a href="{{url('/obps/reports')}}">Report</a></li> 
                                                            <li><a href="{{url('/obps/users')}}">User</a></li>  
                                                        </ul>
                                                    </li> 
                                                </ul>
                                            </li>  
                                        <?php
                                        }
                                    ?>
                                <!-- ADMIN OBP (INCLUDE SPECIAL) -->

                                <!-- ADMIN CKPI (INCLUDE SPECIAL) -->
                                    <?php
                                        if(
                                            (
                                                (request()->session()->get('level')=='ADMIN')
                                            ) && 

                                            (strpos((request()->session()->get('module')),'CKPI')!== false)  
                                        )
                                        {?>   
                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">[CKPI] Administrator</span></a>
                                                <ul aria-expanded="false" class="collapse"> 
                                                    <li> 
                                                        <a class="waves-effect waves-dark" href="{{url('/ckpis/lists')}}" aria-expanded="false"><span class="hide-menu">Corporate KPI List</span></a> 
                                                    </li>   
                                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Maintenance</span></a>
                                                        <ul aria-expanded="false" class="collapse"> 
                                                            <li><a href="{{url('/ckpis/groups')}}">Group</a></li> 
                                                            <li><a href="{{url('/ckpis/perspectives')}}">Perspective</a></li> 
                                                            <li><a href="{{url('/ckpis/indicators')}}">Indicator</a></li> 
                                                            <li><a href="{{url('/ckpis/years')}}">Year</a></li> 
                                                            <li><a href="{{url('/ckpis/tables')}}">Table</a></li>  
                                                            <li><a href="{{url('/ckpis/users')}}">User</a></li>  
                                                            <li><a href="{{url('/ckpis/reminders')}}">Email Reminder</a></li>  
                                                        </ul>
                                                    </li>  
                                                </ul>
                                            </li>  
                                        <?php
                                        }
                                    ?>
                                <!-- ADMIN CKPI (INCLUDE SPECIAL) -->

                                <!-- SUPERADMIN (ALL) -->
                                    <?php
                                        if(
                                            (
                                                (request()->session()->get('level')=='SUPERADMIN')
                                            )  
                                        )
                                        {?>   
                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Super Administrator</span></a>
                                                <ul aria-expanded="false" class="collapse">

                                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">OBP</span></a>
                                                        <ul aria-expanded="false" class="collapse"> 
                                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Task</span></a>
                                                                <ul aria-expanded="false" class="collapse">
                                                                    <li><a href="{{url('/obps/systems')}}">Create Using System</a></li> 
                                                                    <!-- <li><a href="{{url('/obps/excels')}}">Create Using Excel</a></li>  -->
                                                                    <li><a href="{{url('/obps/reassigns')}}">Reassign</a></li>  
                                                                </ul>
                                                            </li> 
                                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Maintenance</span></a>
                                                                <ul aria-expanded="false" class="collapse">
                                                                    <!-- <li><a href="{{url('/obps/alltasklists')}}">All Task List</a></li>  -->
                                                                    <li><a href="{{url('/obps/settings')}}">Setting</a></li> 
                                                                    <li><a href="{{url('/obps/reports')}}">Report</a></li>  
                                                                </ul>
                                                            </li>  
                                                        </ul>
                                                    </li> 

                                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">CKPI</span></a>
                                                        <ul aria-expanded="false" class="collapse">  
                                                            <li> 
                                                                <a class="waves-effect waves-dark" href="{{url('/ckpis/lists')}}" aria-expanded="false"><span class="hide-menu">Corporate KPI List</span></a> 
                                                            </li>  
                                                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Maintenance</span></a>
                                                                <ul aria-expanded="false" class="collapse"> 
                                                                    <li><a href="{{url('/ckpis/groups')}}">Group</a></li> 
                                                                    <li><a href="{{url('/ckpis/perspectives')}}">Perspective</a></li> 
                                                                    <li><a href="{{url('/ckpis/indicators')}}">Indicator</a></li> 
                                                                    <li><a href="{{url('/ckpis/years')}}">Year</a></li>  
                                                                    <li><a href="{{url('/ckpis/tables')}}">Table</a></li>  
                                                                    <li><a href="{{url('/ckpis/reminders')}}">Email Reminder</a></li>    
                                                                </ul>
                                                            </li>  
                                                        </ul>
                                                    </li>    

                                                    <li><a href="{{url('/superadministrators')}}">User</a></li> 

                                                </ul>
                                            </li>  
                                        <?php
                                        }
                                    ?>
                                <!-- SUPERADMIN (ALL) -->

                                <!-- LOGOUT -->
                                    <li> 
                                        <form id="form_logout" action="{{url('/logout/post')}}" method="post">
                                            @csrf 
                                        </form>

                                        <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" onclick="document.getElementById('form_logout').submit();">
                                        <i class="mdi mdi-logout-variant"></i>
                                            <span class="hide-menu">Logout  
                                            </span>
                                        </a> 
                                    </li> 
                                <!-- LOGOUT -->

                            </ul>
                        </nav>
                    <!-- End Sidebar navigation -->

                </div>
                <!-- End Sidebar scroll-->
            </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @yield('content')
 
            <!-- ============================================================== --> 
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                                
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                    <div class="right-sidebar">
                        <div class="slimscrollright">
                            <div class="rpanel-title"> Technology Project <span><i class="ti-close right-side-toggle"></i></span> </div>
                            <div class="r-panel-body">
                                <ul class="m-t-20 chatonline">
                                    <li><b>Team Members</b></li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Khairul Faizal Ariffin<small class="text-success">Ext : 2025</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Hasnulazma Yaakub<small class="text-success">Ext : 2941</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Mohd Huzaimi Hashim<small class="text-warning">Ext : 3993</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Roswandy Abd Wahab<small class="text-success">Ext : 7448</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Rozaimi Zamahri<small class="text-danger">Ext : 2108</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.png') }} " alt="user-img" class="img-circle"> <span>Wan Fadli Hazrimi<small class="text-success">Ext : 3917</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.jpg') }} " alt="user-img" class="img-circle"> <span>Haziq Hakim<small class="text-success">Ext : 4340</small></span></a>
                                    </li> 
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/ditp/rozaimi.jpg') }} " alt="user-img" class="img-circle"> <span>Nur Iman Nazirah<small class="text-success">Ext : 4360</small></span></a>
                                    </li> 
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © <?php echo date('Y'); ?> OBPXcess <img src="{{ asset('assets/images/footer_gdtt.svg') }} " alt="user-img" class="" height="45px"></footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
   
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }} "></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }} "></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }} "></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }} "></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js') }} "></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }} "></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.min.js') }} "></script>
    <!-- ============================================================== -->
    
    <!-- Select 2 -->
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }} " type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }} " type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }} "></script>

    <!-- Sweet Alert 2 Js -->
    <script src="{{ asset('assets/plugins/sweetalert2/js/sweetalert2.js') }} "></script>
    <script src="{{ asset('assets/plugins/sweetalert2/js/sweetalert2.min.js') }} "></script>


    <!-- Style switcher --> 
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }} "></script>
    <script src="{{ asset('assets/plugins/switchery/dist/switchery.min.js') }} "></script>
                                    

    <script>
        /* Uppercase */
            function upperCaseF(a){
                setTimeout(function(){
                    a.value = a.value.toUpperCase();
                }, 1);
            }
        /* Uppercase */

        $(document).ready(function(){
            $(".select2").select2();

            // Number & Text
                $(".input_number_text").keypress(function(event){
                    var ew = event.which;
                    if(48 <= ew && ew <= 57)
                        return true;
                    if(65 <= ew && ew <= 90)
                        return true;
                    if(97 <= ew && ew <= 122)
                        return true;
                    return false;
                });
            // Number & Text
            
            // Number Only Without Thousand Separator
                $(".input_number").on("keypress keyup blur",function (event) {    
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
                }); 
            // Number Only Without Thousand Separator

            // Thousand Separator With Comas
                $('input.input_thousand_separator').keyup(function(event) {
                    // skip for arrow keys
                    if(event.which >= 37 && event.which <= 40) return;

                    // format number
                    $(this).val(function(index, value) {
                    return value
                    // Allow separator with 2 decimals point but this code can allow user to add multiple dot line.
                    // .replace(/[^\d.]/g, "")
                    // .replace(/\.(\d{2})\d+/, '.$1')
                    // .replace(/\B(?=(\d{3})+(?!\d))/g, ",")

                    // Keep only digits and decimal points:
                    .replace(/[^\d.]/g, "")
                    // Remove duplicated decimal point, if one exists:
                    .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
                    // Keep only two digits past the decimal point:
                    .replace(/\.(\d{2})\d+/, '.$1')
                    // Add thousands separators:
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")

                    ;
                    });
                }); 

                $('textarea.input_thousand_separator').keyup(function(event) {
                    // skip for arrow keys
                    if(event.which >= 37 && event.which <= 40) return;

                    // format number
                    $(this).val(function(index, value) {
                    return value
                    // Allow separator with 2 decimals point but this code can allow user to add multiple dot line.
                    // .replace(/[^\d.]/g, "")
                    // .replace(/\.(\d{2})\d+/, '.$1')
                    // .replace(/\B(?=(\d{3})+(?!\d))/g, ",")

                    // Keep only digits and decimal points:
                    .replace(/[^\d.]/g, "")
                    // Remove duplicated decimal point, if one exists:
                    .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
                    // Keep only two digits past the decimal point:
                    .replace(/\.(\d{2})\d+/, '.$1')
                    // Add thousands separators:
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")

                    ;
                    });
                }); 
            // Thousand Separator With Comas

            // Percentage value with decimal point
                var pastValue, pastSelectionStart, pastSelectionEnd;
                $(".input_percentage").on("keydown", function() {
                    pastValue          = this.value;
                    pastSelectionStart = this.selectionStart;
                    pastSelectionEnd   = this.selectionEnd;
                }).on("input", function() {
                    var regex = /^(100(\.0{0,2})?|(\d|[1-9]\d)(\.\d{0,2})?)$/;
                                    
                    if (this.value.length > 0 && !regex.test(this.value)) {
                        this.value          = pastValue;
                        this.selectionStart = pastSelectionStart;
                        this.selectionEnd   = pastSelectionEnd;
                    }
                });
            // Percentage value with decimal point



        });
    </script>

    

    <script type="text/javascript">
        window.addEventListener("load", function(){
            const loader = document.querySelector(".loader");
            loader.className += " hidden";
        });
    </script>

    @yield('js')



</body>
</html>

