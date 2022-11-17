<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>OBPXcess</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
 

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon1.png') }} ">

        <link href="{{ asset('assets/login/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/login/css/metismenu.min.css') }} " rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/login/css/icons.css') }} " rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/login/css/style.css') }} " rel="stylesheet" type="text/css">
    </head>

    <body>

     
        
        <!-- Begin page -->
        <div class="accountbg"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo-dark.png') }} " height="100" alt="logo"></a>
                    </div>

                    <div class="p-3">
                        <h4 class="font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to OBPXcess System.</p>

                        <!-- <form class="form-horizontal" action=""> -->
                        <form class="form-horizontal m-t-30" action="{{url('/login/post')}}" method="post">
                        @csrf

                            @if(Session::has('msg_failed'))
                                <p style="color:#ff0000;">{{Session::get('msg_failed')}}</p>
                            @endif

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control username" name="username" value="" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" id="password" class="form-control password" name="password" value="" placeholder="Password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                         
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div> 

                        </form>

                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center"> 
                <p>© <?php echo date('Y'); ?> OBPXcess. <img src="{{ asset('assets/images/footer_gdtt.svg') }} " alt="user-img" class="" height="45px"></p>
            </div>

        </div>
        <!-- end wrapper-page -->

        <!-- jQuery  -->
        <script src="{{ asset('assets/login/js/jquery.min.js') }} "></script>
        <script src="{{ asset('assets/login/js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('assets/login/js/metisMenu.min.js') }} "></script>
        <script src="{{ asset('assets/login/js/jquery.slimscroll.js') }} "></script>
        <script src="{{ asset('assets/login/js/waves.min.js') }} "></script>

        <!-- App js -->
        <script src="{{ asset('assets/login/js/app.js') }} "></script>

    </body>

</html>