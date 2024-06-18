<?php
session_start();

require 'function_scan/function.php';
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
  <title>Admin Kantor</title>

  <!-- Scan Qr Code instascan -->

	<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> 
	<!--<script type="text/javascript" src="instascan.min.js"></script> -->
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
		<a class="nav-link" ><span  id="date_time"></span></a>
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
      <span class="brand-text font-weight-light">Admin Kantor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
   

 

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
            <a href="scan_qrcode.php" class="nav-link">
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
          <div class="col-sm-6">
            <h1>Scan QR Code</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
           
		   <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <video id="preview" width="100%"></video>
					<?php
						if(isset($_SESSION['ERROR'])){
							echo"
								<div class='alert alert-danger'>
								<h4>ERROR!</h4>
								".$_SESSION['ERROR']."
								</div>
							";
							
						}
						
						
						if(isset($_SESSION['SUCCESS'])){
							echo"
								<div class='alert alert-primary'>
								<h4>SUCCESS!</h4>
								".$_SESSION['SUCCESS']."
								</div>
							";
							
						}
						
					?>
			   </div>
                <div class="col-md-6">
				
                    <a href="scan_qrcode.php"><label>SCAN QR CODE</label></a>
					<form action="scan_qrcode.php" method="POST" class="form-horizontal">
                    <input type="text" name="Nama" id="Nama" readonyy="" placeholder="scan qrcode" class="form-control" >
					
					</form>
					 <!-- /.card-body -->
		
              <div class="card-body table-responsive p-0">
                <table  class="table table-bordered "  >
                  <thead>
                  <tr>
					<th><font face="Berlin Sans FBc">No</font></th>
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">Tanggal</font></th>
                    <th><font face="Berlin Sans FBc">Jam_masuk</font></th>
                    <th><font face="Berlin Sans FBc">Jam_keluar</font></th>	
					<th><font face="Berlin Sans FBc">Status</font></th>		
					<th><font face="Berlin Sans FBc">Action</font></th>	
				
		
                  </tr>
				    
                  </thead>
					<tbody>
					<?php
						require 'function_scan/conn.php';
						$date = date('Y-m-d');
						$sql = "SELECT id_scan, Nama,Tanggal,Jam_masuk,Jam_keluar,Status FROM table_scan WHERE Tanggal='$date' ORDER BY id_scan DESC ";
						$query = $conn->query($sql);
						$No = +1;
						while($row=$query->fetch_assoc()){
					?>
					<tr>
						<td><font face="Berlin Sans FBc"><?php echo $No++ ;?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Nama'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Tanggal'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Jam_masuk'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Jam_keluar'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Status'];?></font></td>
						
						<td>
						
						<a class="mb-1 btn btn-warning btn-sm" href="function_scan/hapus.php?id_scan=<?php echo $row['id_scan']; ?>" onclick="return confirm('Yakin Hapus')" >HAPUS</a>
						
						</td>
					</tr>
					<?php
					}
					?>
					</tbody>
                </table>
		
              </div>
			  
			  
			   </div>
            </div>
        </div>
	
		
           <script>
		   
		   
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
				   $('[name="options"]').on('change',function(){
					if($(this).val()==1){
						if(cameras[0]!=""){
							scanner.start(cameras[0]);
						}else{
							alert('No front cameras found');
						}
					}else if($(this).val()==2){
						if(cameras[1]!=""){
							scanner.start(cameras[1]);
						}else{
							alert('No back cameras found');
						}
					}
					});
               } else{
					console.error ('No cameras found');
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
			   alert(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('Nama').value=c;
			   document.forms[0].submit();
           });
		   
		   

        </script>
		
		<div class="btn-group btn-group-toggle mb-5" data-toogle="buttons">
			<label class="btn bttn-primary active">
				<input type="radio" name="options" value="1" autocomplete="off" checked>Front Camera
			</label>
			<label class="btn bttn-secondary ">
				<input type="radio" name="options" value="2" autocomplete="off" >Back Camera
			</label>
		</div>
        
		
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
     </section>
    <!-- /.content -->


	
	<br></br>
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

<!-- Date Time-->
<script type="text/javascript">window.onload = date_time('date_time');</script>


</body>
</html>

