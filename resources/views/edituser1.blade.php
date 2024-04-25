<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RevolutPay | Recharge Airtime</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
               

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"><img src="{{ asset('img/logo1.png')}}" width="100%"/></span>
    </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
              

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->











               <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/subscribers" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Subscribers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/fundmanual" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Fund Wallet Manually</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/transactions" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Transactions</p>
            </a>
          </li>

  
         
          <li class="nav-item">
            <a href="/analysis" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Sales Analysis</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/readmail" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Mails
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/readmail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read Mail</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="/sendmail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Mail</p>
                </a>
              </li>
            </ul>
          </li>
      
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">


          <div class="card col-lg-2 col-2">
</div>

            <div class="card col-lg-10 col-10">

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Edit User Information</h3>

                      <div class="card-tools">
                        
                      </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body table-responsive p-0">

                    <form method="POST" action="{{ url('/updates') }}">
                                @csrf


                                <input type="hidden" name="username" id="username" value="revolutpay"><br>


                                <input type="hidden" name="password" id="password" value="revolutpay123"><br>

                                <input type="hidden" name="id" value="{{$user->id}}" ><br><br>

                                <label for="name">Name:</label>
                                <br>
                                <input type="text" name="name" value="{{$user->name}}" ><br><br>

                                <label for="email">Email:</label>
                                <br>
                                <input type="email" name="email" value="{{$user->email}}" ><br><br>

                                <label for="wallet_address">Wallet Address:</label>
                                <br>
                                <input type="text" name="wallet_address" value="{{$user->wallet_address}}" ><br><br>

                             

                                <label for="pin">PIN:</label>
                                <br>
                               
                                <input type="text" name="pin" value="{{$user->pin}}" ><br><br>

                                <label for="phone">Phone:</label>
                                <br>
                               
                                <input type="text" name="phone" value="{{$user->phone}}" ><br><br>

                                <label for="address">Address:</label>
                                <br>
                               
                                <input type="text" name="address" value="{{$user->address}}" ><br><br>

                               

                                <label >BVN Status: <font color="red">{{$user->bvn_status}}</font></label>
                                <br>
                                <select name="bvn_status" >
                                    <option name="bvn_status" value="unverified">Unverified</option>
                                    <option name="bvn_status" value="verified">Verified</option>
                                  
                                </select><br><br>

                                <label >Status:</label>
                                <br>
                                <select name="status" >
                                    <option name="satus" value="suspend">Suspend</option>
                                    <option name="satus" value="active">Active</option>
                                  
                                </select><br><br>



                               
                                <button type="submit">Submit</button>
                            </form>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

            </div>

          </div>
          <br>
          <!-- Small boxes (Stat box) -->

          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map card -->

              <!-- /.card -->


              <!-- /.card -->
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2024 <a href="https://revolutpay.ng">RevolutPay</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>