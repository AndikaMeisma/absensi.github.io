<?php
session_start();
require 'function_rekap_absensi/function.php';


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
  <title>Data Absensi</title>

   <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
 
  <style>
	@media print{
		.tambah, .action, .halaman, .card-footer, .nama, .filter{
			display:none;
		}
	
	}
  
  </style>
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- icon web -->
  <link rel="shortcut icon" href="../../img/a.png">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
       </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
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
    <a href="../../index.php" class="brand-link">
      <img src="../../img/a.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Absensi Pegawai</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Admin</p>
                </a>
              </li>
            </ul>
          </li>
         
         
         <li class="nav-header">Menu</li>
		     <li class="nav-item">
            <a href="semua_pegawai.php" class="nav-link">
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
                <a href="buat_qrcode.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat QR Code</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a href="scan_qrcode.php" class="nav-link">
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
                <a href="histori_absensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Histori Absensi</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a href="rekap_absensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Absensi</p>
                </a>
              </li>
         
            </ul>
          </li>
		  
		   <li class="nav-item">
            <a href="rank.php" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Rangking
               
              </p>
            </a>
           
          </li>
		  
		  <li class="nav-header">Lainnya</li>
		  
			 <li class="nav-item">
            <a href= "../login/register.php"  class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Registrasi
              </p>
            </a>
      
          </li>
		  
		     <li class="nav-item">
            <a href= "../login/logout.php"  onclick="return confirm('Yakin Ingin Keluar')" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div id="atas" class="col-sm-6">
            <h1><i>Data Absensi</i></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="rekap_absensi.php"><b>Rekap Absensi</b></a></h3>
				 <br></br>
			
		
				
				<H6><B class="nama">EXPORT DATA ABSENSI :</B></H6>
				<form action="" class="tambah" method="POST">
					
					<a class="btn btn-danger "  href="function_rekap_absensi/cetak_pdf.php" target="_blank" >PDF</a>
					<a class="btn btn-success " href="function_rekap_absensi/cetak_excel2.php" >EXCEL</a>
					<a class="btn btn-info " href="function_rekap_absensi/cetak_word.php">WORD</a>
				</form>
				
				<form method="POST" class="filter table-responsive p-0"><b class="nama">FILTER DATA ABSENSI :</b>
					<table width="80%" class= "filter table-striped" >
					<tr>
						
						<th>Dari Tanggal</th>
						<th><input type="date" name="dari_tgl" required></th>
						<th>Sampai Tanggal</th>
						<th><input type="date" name="sampai_tgl" required></th>
						<th><input type="submit" class="btn btn-primary" name="filter" value="filter"></th>
					</tr>
					</table>
				</form>
				<br></br>
				
		
				
				<?php
					if (isset($_POST['filter'])){
						$dari_tanggal = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
						$sampai_tanggal = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
						echo "Data Absensi Dari Tanggal", "($dari_tanggal).", "Sampai tanggal", "($sampai_tanggal)";
					}
				?>
				
              </div>
			  <!-- /.card-header -->
			  
              <!-- /.card-body -->
              <div class="card-body table-responsive p-0">
                <table id="example1" action="histori_absensi.php" method="get" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><font face="Berlin Sans FBc">No</font></th>
				
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">Tanggal</font></th>
                    <th><font face="Berlin Sans FBc">Jam masuk</font></th>
                    <th><font face="Berlin Sans FBc">Jam keluar</font></th>	
					<th><font face="Berlin Sans FBc">Kehadiran</font></th>	
					<th><font face="Berlin Sans FBc">Keterangan</font></th>
					<th><font face="Berlin Sans FBc">Status</font></th>					
		
		
                  </tr>
				  </thead>
				  <tbody>
				<?php
	
				$data = mysqli_query($conn,"SELECT * FROM table_scan");
				$jumlah_data = mysqli_num_rows($data);

				$No = 1;
				
				if(isset($_POST['filter'])) {
					$dari_tanggal = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
					$sampai_tanggal = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
					$tampil = mysqli_query($conn,"SELECT * FROM table_scan WHERE Tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal' ORDER BY Jam_masuk ASC");
				}else{	
					$tampil = mysqli_query($conn,"SELECT * FROM table_scan ORDER BY id_scan DESC ");
				}
				
				
				while($d = mysqli_fetch_array($tampil)){
				?>
				<tr>
					<td><font face="Berlin Sans FBc"><?php echo $No++; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Nama']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Tanggal']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Jam_masuk']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Jam_keluar']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Kehadiran']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Keterangan']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d ['Status']; ?></font></td>
					
	
				</tr>
				<?php
				
				}
				?>

				  
                  </body>
                </table>
				
				<br></br>
		
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			<br></br>
			
			
			
			
			
			
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    
	</section>
    <!-- /.content -->
  
 
  <br></br>
  <footer align="center" class="card-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div >
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
 </footer>
  
  
</div>
 <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!--Date time-->
<script type="text/javascript">window.onload = date_time('date_time');</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




</body>
</html>

