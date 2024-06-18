  <?php
  session_start();
require 'function_semua_pegawai/function.php';

require '../../date_time.php';

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
  <title>Daftar Pegawai</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- icon web -->
  <link rel="shortcut icon" href="../../img/a.png">
  
  <style>
@media print{
		.tambah, .action, .halaman, .card-footer{
			display:none;
		}
	
	}

</style>
  

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
      <!-- Sidebar user (optional) -->
   

 

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
          <div class="col-sm-6">
            <h1><i>Daftar Pegawai</i></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pegawai</li>
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
                <h3 class="card-title"><a href="semua_pegawai.php"><b>Semua Pegawai</b></a></h3>
				 <br></br>
			
				 
					<form class="tambah" action=""  method="POST">
					<a class="btn btn-primary" href="function_semua_pegawai/tambah_data.php">Tambah Data</a>
					<input style="float:right;" type="text" name="cari" placeholder="Cari">
					<button style="float:right;" type="submit" name="submit">Search</button>
					</form>
					
					<form action="" class="tambah" method="POST">
					<H6><B class="nama">EXPORT SEMUA DATA PEGAWAI :</B></H6>
					<a class="btn btn-danger "  href="function_semua_pegawai/cetak_pdf.php" target="_blank" >PDF</a>
					<a class="btn btn-success " href="function_semua_pegawai/cetak_excel2.php" >EXCEL</a>
					<a class="btn btn-info " href="function_semua_pegawai/cetak_word.php">WORD</a>
					</form>
			
			
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table action="semua_pegawai.php" method="get" id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
					<th>Foto</th>
                    <th>Nama</th>
					<th>Nik</th>
					<th>Tempat Tgl Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Jalan/Dusun</th>
					<th>RT/RW</th>
					<th>Desa</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>No Wa</th>		
					<th class="action">Action </th>
		
                  </tr>
				  
				<?php
				
				$batas = 5;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($conn,"SELECT * FROM semua_pegawai ");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);  
				$No = $halaman_awal + 1;
				$tampil = mysqli_query($conn,"SELECT * FROM semua_pegawai ORDER BY Id_pegawai DESC LIMIT $halaman_awal, $batas ");
				
				//function search
				if(isset($_POST["submit"])) {
				$tampil = search($_POST["cari"]);
				}
				
				while($d = mysqli_fetch_array($tampil)){
				?>
				<tr>
					<td><?php echo $No++; ?></td>
					<td><img src="function_semua_pegawai/img/<?php echo $d['Foto']; ?>"width="50"></td>
					<td><?php echo $d['Nama']; ?></td>
					<td><?php echo $d['Nik']; ?></td>
					<td><?php echo $d['Ttl']; ?></td>
					<td><?php echo $d['Jenis_Kelamin']; ?></td>
					<td><?php echo $d['Jalan']; ?></td>
					<td><?php echo $d['Rt_Rw']; ?></td>
					<td><?php echo $d['Desa']; ?></td>
					<td><?php echo $d['Departemen']; ?></td>
					<td><?php echo $d['Jabatan']; ?></td>
					<td><?php echo $d['No_Wa']; ?></td>
					
					<td class="action">
						
						<a class="mb-1 btn btn-info btn-sm" href="function_semua_pegawai/lihat_data.php?Id_pegawai=<?php echo $d['Id_pegawai']; ?>">DETAIL</a> 
				
						<a class="mb-1 btn btn-danger btn-sm" href="function_semua_pegawai/edit_data.php?Id_pegawai=<?php echo $d['Id_pegawai']; ?>">EDIT </a>
				
						<a class="mb-1 btn btn-warning btn-sm" href="function_semua_pegawai/hapus.php?Id_pegawai=<?php echo $d['Id_pegawai']; ?>" onclick="return confirm('Yakin Hapus')" >HAPUS</a>
						
						<a class="mb-1 btn btn-success btn-sm" href="function_semua_pegawai/send-wa.php?Id_pegawai=<?php echo $d['Id_pegawai']; ?>">WA </a>
					
					</td>
				
				</tr>
				<?php
				
				}
				?>

				  
                  </thead>
                </table>
				
				<br></br>
				<ul class="pagination justify-content-left">
					<li class="halaman page-item">
						<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
					</li>
					<?php 
						for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="halaman page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
					}
					?>				
					<li class="halaman page-item">
						<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
					</li>
				</ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
    </div>
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
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!--Date time-->
<script type="text/javascript">window.onload = date_time('date_time');</script>

</body>
</html>

