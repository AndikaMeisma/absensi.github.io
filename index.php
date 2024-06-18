
<?php
session_start();

require 'pages/login/function.php';
require 'date_time.php';


	if($_SESSION["login"]=="") {
		header("location:pages/login/login.php");
	
	exit;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absensi Pegawai | Dashboard</title>
  
  
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- icon web -->
  <link rel="shortcut icon" href="img/a.png">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/a.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
      

		<li class="nav-item">
		<a class="nav-link"><span  id="date_time"></span></a>
		</li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/a.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Absensi Pegawai</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

    
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Admin</p>
                </a>
              </li>
         
            </ul>
          </li>
         
          <li class="nav-header">Menu</li>
		     <li class="nav-item">
            <a href="pages/tables/semua_pegawai.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Daftar Pegawai
               
              </p>
            </a>
           
          </li>
		  
		   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                QR Code
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/buat_qrcode.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat QR Code</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a href="pages/tables/scan_qrcode.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scan QR Code</p>
                </a>
              </li>
         
            </ul>
          </li>
		  
		  
		  	   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Data Absensi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/histori_absensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Histori Absensi</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a href="pages/tables/rekap_absensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Absensi</p>
                </a>
              </li>
			  
            </ul>
          </li>
		  
		    <li class="nav-item">
            <a href="pages/tables/rank.php" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Rangking
               
              </p>
            </a>
           
          </li>
		  
		  <li class="nav-header">Lainnya</li>
		  
			 <li class="nav-item">
            <a href= "pages/login/register.php"  class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Registrasi
              </p>
            </a>
      
          </li>
		  
		     <li class="nav-item">
            <a href= "pages/login/logout.php"  onclick="return confirm('Yakin Ingin Keluar')" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
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
            <h1 class="m-0"><i>Selamat Datang Admin</i> </h1>
			
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
	
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
	  
	 

 <div class="content-header">
   <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i>Menu</i> </h1>
	
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
	  </div>

	  
	  
	    <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
				<?php
				// mengambil data pegawai
				$data_pegawai = mysqli_query($conn,"SELECT * FROM semua_pegawai");
                // menghitung data pegawai
				$jumlah_pegawai = mysqli_num_rows($data_pegawai);
				
				?>
				<h3><?php echo $jumlah_pegawai; ?></h3>

                <p>Daftar Pegawai</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
             
				<a href="pages/tables/semua_pegawai.php" class="small-box-footer text-light">Semua Pegawai <i class="fas fa-arrow-circle-right"></i></a>
		   </div>
          </div>

   			
			 <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3>-</h3>
				
				<p>Scan QR Code</p>
				<div class="icon">
                <i class="fas fa-qrcode"></i>
              </div>
				</div>
			<a href="pages/tables/scan_qrcode.php" class="small-box-footer text-light">Scan QR Code <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			</div>
			
			<div class="col-lg-4 col-6">
			<!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>-</h3>
				
				<p>Buat QR Code</p>
				<div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
				</div>
			<a href="pages/tables/buat_qrcode.php" class="small-box-footer text-light">Buat QR Code <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			</div>
			
				<div class="col-lg-4 col-6">
			<!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
				// mengambil data pegawai
				$data_pegawai = mysqli_query($conn,"SELECT * FROM table_scan");
                // menghitung data pegawai
				$jumlah_pegawai = mysqli_num_rows($data_pegawai);
				
				?>
				<h3><?php echo $jumlah_pegawai; ?></h3>
				
				<p>Histori Absensi</p>
				<div class="icon">
                <i class="fas fa-book"></i>
              </div>
				</div>
			<a href="pages/tables/histori_absensi.php" class="small-box-footer text-light">Histori Absensi <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			</div>
			
				<div class="col-lg-4 col-6">
			<!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
				// mengambil data pegawai
				$data_pegawai = mysqli_query($conn,"SELECT * FROM table_scan");
                // menghitung data pegawai
				$jumlah_pegawai = mysqli_num_rows($data_pegawai);
				
				?>
				<h3><?php echo $jumlah_pegawai; ?></h3>
				
				<p>Rekap Absensi</p>
				<div class="icon">
                <i class="fas fa-book-open"></i>
              </div>
				</div>
			<a href="pages/tables/rekap_absensi.php"  class="small-box-footer text-light">Rekap Absensi <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			</div>
			
			
			<div class="col-lg-4 col-6">
			<!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>-</h3>
				
				<p>Rangking</p>
				<div class="icon">
                <i class="fas fa-newspaper"></i>
              </div>
				</div>
			<a href="pages/tables/rank.php"  class="small-box-footer text-light">rangking <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			</div>
			
			
			
			
   
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
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Admin Kantor</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
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



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--Date time-->
<script type="text/javascript">window.onload = date_time('date_time');</script>
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
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
