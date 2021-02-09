<?php

$user_id    = Auth::user()->id;
$user_role  = Auth::user()->role;

if ($user_id==1){      
      $sql2="a.role_id=".$user_role;
    }else{
      $sql2="a.role_id=".$user_role;
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard -> User: {{ Auth::user()->name }} </title>

    <!-- Bootstrap -->
    <link href="{{asset('public/gantela/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/gantela/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/gantela/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- date range -->
    <link href="{{asset('public/gantela/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
     <!-- bootstrap-datetimepicker -->
     <link href="{{asset('public/gantela/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
     <!-- bootstrap-datetimepicker -->    
   
    
    <!-- Custom Theme Style -->
    <link href="{{asset('public/gantela/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fab/css/jquery-fab-button.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/plugins/contextmenu/jquery.contextMenu.min.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('public/costum/global.css')}}">
    <!-- cos -->
    <link href="{{asset('public/css/icons.css')}}" rel="stylesheet">
    
    <link href="{{asset('public/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{asset('public/plugins/summernote/summernote.css')}}" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2-3.5.4/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('public/plugins/select2-3.5.4/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset ('public/plugins/icheck/all.css')}}" />
    <link href="{{asset('public/plugins/chart-js/Chart.min.css')}}" rel="stylesheet" />    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base-url" content="{{ url('/') }}" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <div class="width-logo" style="background-color:#fff ;text-align: center">
                        <a href="{{url('home')}}" class="logo">
                            <img src="{{asset('public/front2/')}}/images/parmusi.png" alt="logo" class="logo-lg" style="width:10%" />
                           
                        </a>
                    </div>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('public/img/users/default.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{ Auth::user()->name }}</span>
                <h2></h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
               
                    <li><a><i class="fa fa-home"></i>Halaman <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        
                        <li><a href="{{route('product')}}">Halaman Donasi</a></li>
                        <li><a href="{{route('acara')}}">Halaman Acara</a></li>
        
                      </ul>
                    </li>
                    
                </ul>
                <ul class="nav side-menu">
               
                  <li><a><i class="fa fa-shopping-bag"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="{{route('new_order')}}">Laporan Donatur</a></li>
      
                    </ul>
                  </li>
                  
              </ul>
              <ul class="nav side-menu">
               
                  <li><a><i class="fa fa-gears "></i>Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="{{route('user_table')}}">User</a></li>
      
                    </ul>
                  </li>
                  
              </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('public/img/users/default.png')}}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Logout
                        </a>  

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                        
                    </li>
                  </ul>
                </li>

              
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @if (session('error'))
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{ session('error') }}
              </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                {{ session('success') }}
              </div>
            @endif
           @yield('content')
        
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="#">Parmusi</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <script src="{{asset('public/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('public/costum/alert.js')}}"></script>
    <!-- date range -->
    <script src="{{asset('public/gantela/vendors/moment/moment.js')}}"></script>
    <script src="{{asset('public/gantela/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/gantela/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    
   

    
    <script src="{{asset('public/fab/js/jquery-fab-button.min.js')}}"></script>
    <script src="{{asset('public/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('public/pages/jquery.sweet-alert.init.js')}}"></script>
    <script src="{{asset('public/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('public/plugins/summernote/summernote.js')}}"></script>
    <script src="{{ asset ('public/plugins/icheck/icheck.js')}}"></script>
    <script src="{{ asset ('public/plugins/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('public/js/vue.js')}}"></script>
    <script src="{{asset('public/js/vuejs-datepicker.min.js')}}"></script>
    <script src="{{asset('public/js/accounting-js.js')}}"></script>
    <script src="{{asset('public/js/vue-numeric.min.js')}}"></script>
    <script src="{{asset('public/js/axios.min.js')}}"></script>
     <script src="{{asset('public/front/')}}/js/core/vue-clipboard.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('public/gantela/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/gantela/vendors/fastclick/lib/fastclick.js')}}"></script>
   
    <!-- iCheck -->
    <script src="{{asset('public/gantela/vendors/iCheck/icheck.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/gantela/build/js/custom.min.js')}}"></script>
    <script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/pages/jquery.datatables.init.js')}}"></script>

    
    <script src="{{asset('public/plugins/select2-3.5.4/select2.min.js')}}"></script>
    <script src="{{asset('public/plugins/select2-3.5.4/select2_locale_id.js')}}"></script>
  
    <script src="{{asset('public/plugins/contextmenu/jquery.contextMenu.js')}}"></script>
    <script src="{{asset('public/costum/globalscript.js')}}"></script>
    @yield('more_js')
    
  </body>
</html>