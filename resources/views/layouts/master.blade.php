<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>DCFI | ORMS</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">

  <style>
    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      max-width: 75%;
      height: 120px;
    }

    div.user-center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    nav.custom-color {

      background-color: #B40000;
      color: white;
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }

    /* Thick red border */
    hr.border1 {
      border: 1px solid grey;
    }
/*
    th {
      text-align: left;
      color:white;
      background-color:black;
    }   


    tr:nth-child(odd) {
      background-color: #ADD8E6;
    }

    td.first
    {
        background-color: #ffe9ec ;
        color: black;
    }
    td.second
    {
        background-color: white;
        color: black;
    } */

  

    .list-text-color {
      color:green
    }


  </style>

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        
            <li class="nav-item dropdown">
              
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name) }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>        
    </ul> 

  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/images/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light user-center">DCFI-SRMS </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="image">
        <a href="#" class="brand-link">
          <img src="/images/profile.png" class="img-circle elevation-2" alt="User Image">
          <h5 class="text-white" style="text-align:center"> {{ucwords(Auth::user()->first_name .' '.Auth::user()->last_name ) }} </h5>
        </a>  
      </div>
      <hr style="">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-center" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard           
              </p>
            </a>
          </li>

          @can('isProspectiveStudent')
          <li class="nav-item">
            <a href="/student" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Student Profile          
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{route('enroll_index')}}" class="nav-link">
            <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Enrollment          
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('grade.index')}}" class="nav-link">
            
            <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Grades          
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/account" class="nav-link">
            <i class="nav-icon  fas fa-file-invoice-dollar"></i>
              <p>
                Account Tracking          
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/upload" class="nav-link">
            <i class="nav-icon fas fa-upload"></i>
              <p>
                Upload Requirements          
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/payment" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Upload Proof of Payment          
              </p>
            </a>
          </li>

          @endcan

          @can('isBFO')
          <li class="nav-item">
            <a href="{{ route('searchForm') }}" class="nav-link">
            <i class="nav-icon  fas fa-file-invoice-dollar"></i>
              <p>
                View Payments          
              </p>
            </a>
          </li>
          @endcan

          @can('isRegistrar')
          <li class="nav-item">
            <a href="{{ route('searchFormRequirements') }}" class="nav-link">
            <i class="nav-icon  fas fa-file-invoice-dollar"></i>
              <p>
                View Student Requirements          
              </p>
            </a>
          </li>
          @endcan


          @can('isAdmin')
          <li class="nav-item ">
            <a href="{{ route('users.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users         
              </p>
            </a>
          </li>
         
          @endcan

          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off red"></i>
                    <p>
                        {{ __('Logout') }}
                    </p>
                 </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      @yield('main_content')
      <!-- <div class="container-fluid">
            <div class="row m-0">  --> 
                
            <!-- </div> --><!-- /.row -->
        
      <!-- </div> --><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <!-- Anything you want -->
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://www.dcfi.edu.ph">Dansalan College Foundation, Inc</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth

<script src="/js/app.js"></script>


@stack('scripts')

</body>
</html>
