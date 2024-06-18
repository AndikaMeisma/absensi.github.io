<?php
require 'function_rank/conn.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ranking</title>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
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
  <!-- datapicker -->
  <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css">
  <!-- jquery 3.4.1 -->
  <link rel="stylesheet" href="../../js/jquery-3.4.1.min.js">
    <!-- icon web -->
  <link rel="shortcut icon" href="../../img/a.png">
   <style>
	@media print{
		.tambah, {
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
                <a href="../../index.php" class="nav-link active">
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
          <div class="col-sm-6">
            <h1>Perangkingan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perangkingan</li>
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
         
			
			
			<!-- card 1 -->
			<div class="card">
              <div class="card-header">
			  <h3  class="card-title"><a href="perangkingan.php"><b> Data Perangkingan </b></a></h3>
			<br></br>
		
			</div>
			
			  
			  <!-- card 1 -->
			<div  class="card">
			
			  <div id="" class="card-header ">
                <h3 class="card-title">Hasil Data Absensi</h3>
              </div>
			
			 <div class="card-header">
             <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#tambahpr"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
			
			<div id="tambahpr" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah perangkingan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
			<form action="function_rank/function_perangkingan.php?act=tambahpr" method="POST" role="form">
            <div class="modal-body">
			
              <div class="row">
                  <div class="col-sm-12">
				  
                    <div class="form-group">
					
						<label for="id_keputusan">Nama </label>
						<div class="col-sm-12">
						
						<select id="id_keputusan" name="id_keputusan" class="form-control">
						
								<option selected disabled >-PILIH-</option>
								<option value='1'>NARDI</option>
								<option value='2'>M.Dafiq Arifin</option>
								<option value='3'>Andika Meisma p</option>
								<option value='4'>SUPRAPTO</option>
								<option value='5'>Slamet Riadi</option>
								<option value='6'>Sony Harsono</option>
								<option value='7'>M.Adi Rohmanan</option>
								<option value='8'>Septian Ulung P</option>
								<option value='9'>Syamsul Hadi</option>
								<option value='10'>Dera Rof ul C</option>
								<option value='11'>Nurul Fadila</option>
						
						</select>
					</div>
					
					<div class="form-group">  
					 </div>
					 <label>Kriteria</label>
					  <div class="col-sm-12">
                        
                         <select id="id_kriteria" name="id_kriteria" class="form-control">
						
								<option selected disabled >-PILIH-</option>
								<option value='1'>S</option>
								<option value='2'>I</option>
								<option value='3'>A</option>
								<option value='4'>DTK</option>
								<option value='5'>DT</option>
								<option value='6'>PCK</option>
								<option value='7'>PC</option>
						
						</select>
						
					 </div>
					 </div>
					 
					 <div class="form-group"> 
					   <div class="col-sm-12">
                        <label>Jumlah</label>
                          <input type="hidden" name="id_perangkingan" id="id_perangkingan" required="required" value="<?php echo $id; ?>" readonly>
						<input type="text " class="form-control" id="Hasil" name="Hasil"  required="required">
					 </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
			 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
				  
                    <th><font face="Berlin Sans FBc">No</font></th>
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">Kriteria</font></th>
                    <th><font face="Berlin Sans FBc">Jumlah</font></th>
					<th><font face="Berlin Sans FBc">Action</font></th>
					
                  </tr>
				</thead>
				<tbody>
			
				<?php
			
				$tampil = mysqli_query($conn,"SELECT * FROM table_perangkingan 
				INNER JOIN table_keputusan
				ON table_perangkingan.id_keputusan = table_keputusan.id_keputusan
				INNER JOIN table_preferensi
				ON table_perangkingan.id_kriteria = table_preferensi.id_kriteria"); 
				$No =  1;  

				while($d = mysqli_fetch_array($tampil)){
				?>
				<tr>
					<td><font face="Berlin Sans FBc"><?php echo $No++; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Nama']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Nama_kriteria']; ?></font></td>
					<td><font face="Berlin Sans FBc"><?php echo $d['Hasil']; ?></font></td>
					<td>
					<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updatepr<?php echo $d['id_perangkingan']; ?>"><i class="fas fa-edit"></i></a>
					<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletepr<?php echo $d['id_perangkingan']; ?>"><i class="fas fa-trash"></i></a>
						
						 <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletepr<?php echo $d['id_perangkingan']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                               <h4 class="modal-title">Hapus </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <p>apakah Anda yakin menghapus data  <b><?php echo $d['id_perangkingan'];?></b> ?</p>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="function_rank/function_perangkingan.php?act=deletepr&id_perangkingan=<?php echo $d['id_perangkingan']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updatepr<?php echo $d['id_perangkingan']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                             
                                <form action="function_rank/function_perangkingan.php?act=updatepr" method="post" role="form">
                                  <?php
                                  $id = $d['id_perangkingan'];
                                  $query = "SELECT * FROM table_perangkingan 
											INNER JOIN table_keputusan
											ON table_perangkingan.id_keputusan = table_keputusan.id_keputusan
											INNER JOIN table_preferensi
											ON table_perangkingan.id_kriteria = table_preferensi.id_kriteria WHERE id_perangkingan='$id'";
                                  $result = mysqli_query($conn, $query);
                                  while ($d = mysqli_fetch_array($result)) {
                                  ?>
                                  <div class="modal-body">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <div class="col-sm-12">
												
			
                                              <input type="hidden" name="id_perangkingan" id="id_perangkingan" required="required" value="<?php echo $d['id_perangkingan']; ?>" readonly>
												<label>Nama </label>
												 <select id="id_keputusan" name="id_keputusan" class="form-control">
													<option value="<?php echo $d['id_keputusan']; ?>"><?php echo $d['Nama']; ?></option>
												</select>
											  
											  <label>Kriteria </label>
											   <select id="id_kriteria" name="id_kriteria" class="form-control">
													
													<option value="<?php echo $d['id_kriteria']; ?>"required><?php echo $d['Nama_kriteria']; ?></option>
													
												</select>
											  <label>Jumlah</label>
											  <input type="text" class="form-control" id="Hasil" name="Hasil" value="<?php echo $d['Hasil']; ?> "required>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                  <input type="submit" name="submit" class="btn btn-success" value="Update">
                                </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                          
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->
					</td>
				</tr>
				<?php
				
				}
				?>
					</tbody>
                </table>
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
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
 <!-- datapicker -->
<script rel="stylesheet" href="../../css/bootstrap-datepicker.min.css"></script>
  <!-- jquery 3.4.1 -->
<script rel="stylesheet" href="../../js/script.js"></script>
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
