<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Operator</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{url('public/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="{{url('public/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{url('public/css/horizontal-admin.css')}}" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="{{url('public/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    @yield('css')

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="{{url('public/img/logo/logo.png')}}" />
                </a>

            </div>

            <div class="right-div">
                <a href="#" class="btn btn-info pull-right" onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOG ME OUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{url('operator')}}" @yield('dashboard-active') ><i class="fa fa-graduation-cap"></i> DASHBOARD</a></li>
                            <li><a href="{{url('operator/user')}}" @yield('user-active') ><i class="fa fa-user"></i> User</a></li>
                            <li><a href="{{url('operator/class')}}" @yield('class-active') ><i class="fa fa-trophy"></i> Class</a></li>
                            <li><a href="{{url('operator/student')}}" @yield('student-active') ><i class="fa fa-users"></i> Student</a></li>
                            {{-- <li><a href="{{url('operator/statistic')}}" @yield('statistic-active') >Statistic</a></li> --}}

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
    @yield('content')
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; 2014 asegaf@ymail.com |<a href="http://www.facebook.com/zulham.achmad" target="_blank"  > Design Edited by : Zulham Azwar Achmad with Love</a> 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="{{url('public/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{url('public/js/bootstrap.min.js')}}"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="{{url('public/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{url('public/js/dataTables/dataTables.bootstrap.js')}}"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="{{url('public/js/horizontal-admin.js')}}"></script>
    <script src="{{url('public/js/Chart.min.js')}}"></script>
    @yield('script')
</body>
</html>
