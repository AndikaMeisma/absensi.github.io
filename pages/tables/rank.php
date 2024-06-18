<?php
require 'function_rank/conn.php';

$query = $pdo->prepare('SELECT id_kriteria, Nama_kriteria, Atribut, Bobot
FROM table_preferensi');
$query->execute();
// $query->setFetchMode(PDO::FETCH_ASSOC);
$kriterias = $query->fetchAll(PDO::FETCH_ASSOC);


$query2 = $pdo->prepare('SELECT id_keputusan, Nama FROM table_keputusan');
$query2->execute();			
// $query2->setFetchMode(PDO::FETCH_ASSOC);
$karyawans = $query2->fetchAll(PDO::FETCH_ASSOC);

$matriks_x = array();
$list_kriteria = array();
foreach($kriterias as $kriteria):
    $list_kriteria[$kriteria['id_kriteria']] = $kriteria;
    foreach($karyawans as $karyawan):
       
        $id_keputusan = $karyawan['id_keputusan'];
        $id_kriteria = $kriteria['id_kriteria'];
        
        // Fetch nilai dari db
        $query3 = $pdo->prepare('SELECT Hasil FROM table_perangkingan
            WHERE id_keputusan = :id_keputusan AND id_kriteria = :id_kriteria');
        $query3->execute(array(
            'id_keputusan' => $id_keputusan,
            'id_kriteria' => $id_kriteria,
        ));			
        $query3->setFetchMode(PDO::FETCH_ASSOC);
        if($nilai_karyawan = $query3->fetch()) {
            // Jika ada nilai kriterianya
            $matriks_x[$id_kriteria][$id_keputusan] = $nilai_karyawan['Hasil'];
        } else {			
            $matriks_x[$id_kriteria][$id_keputusan] = 0;
        }

    endforeach;
endforeach;



//menghitung normalisasi
$matriks_r = array();
foreach($matriks_x as $id_kriteria => $nilai_karyawans):
	
	$tipe = $list_kriteria[$id_kriteria]['Atribut'];
	foreach($nilai_karyawans as $id_alternatif => $nilai ) {
		if($tipe == 'BENEFIT') {
			$nilai_normal = $nilai / max($nilai_karyawans);
		} elseif($tipe  == 'COST') {
			$nilai_normal = min($nilai_karyawans ) / $nilai ;
		}
		
		$matriks_r[$id_kriteria][$id_alternatif] = $nilai_normal  ;
	}
	
endforeach;

//menghitung rangking
$ranks = array();
foreach($karyawans as $karyawan):

	$total_nilai = 0;
	foreach($list_kriteria as $kriteria) {
	
		$bobot = $kriteria['Bobot'];
		$id_keputusan = $karyawan['id_keputusan'];
		$id_kriteria = $kriteria['id_kriteria'];
		
		$nilai_r = $matriks_r[$id_kriteria][$id_keputusan];
		$total_nilai = $total_nilai + ($bobot * $nilai_r );

	}
	
	$ranks[$karyawan['id_keputusan']]['id_keputusan'] = $karyawan['id_keputusan'];
	$ranks[$karyawan['id_keputusan']]['Nama'] = $karyawan['Nama'];
	$ranks[$karyawan['id_keputusan']]['Hasil'] = $total_nilai;
	
endforeach;
	
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
    <!-- icon web -->
  <link rel="shortcut icon" href="../../img/a.png">
  <style>
	@media print{
		.tambah,.filter {
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
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="#keputusan" class="nav-link">Keputusan(X)</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="#preferensi" class="nav-link">Preferensi(W)</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="#normalisasi" class="nav-link">Normalisasi(R)</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="#perangkingan" class="nav-link">Perangkingan(V)</a>
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
            <h1>Rangking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rangking</li>
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
			  <h3  class="card-title"><a href="rank.php"><b>Hasil Data Absensi ِ</b></a></h3>
			<br></br>
				
			<form method="POST" class="filter table-responsive p-0"><b class="nama">FILTER DATA ABSENSI :</b>
					<table width="80%" class= "filter table-striped" >
					<tr>
						
						<th>Dari Tanggal</th>
						<th><input type="date" name="dari_tgl" required></th>
						<th>Sampai Tanggal</th>
						<th><input type="date" name="sampai_tgl" required></th>
						<th><input type="submit" class="btn btn-primary" name="fil" value="filter"></th>
					</tr>
					</table>
				</form>
				
					<?php
					if (isset($_POST['fil'])){
						$dari_tanggal = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
						$sampai_tanggal = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
						echo "Data Absensi Dari Tanggal", "($dari_tanggal).", "Sampai tanggal", "($sampai_tanggal)";
					}
					?>
					
			</div>
			
			  
			  <!-- card 1 -->
			<div  class="card tambah">
			
			  <div id="" class="card-header">
                <h3 class="card-title">Hasil Data Absensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
				  
                    <th><font face="Berlin Sans FBc">No</font></th>
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">S</font></th>
                    <th><font face="Berlin Sans FBc">I</font></th>
                    <th><font face="Berlin Sans FBc">A</font></th>	
					<th><font face="Berlin Sans FBc">DTK</font></th>	
					<th><font face="Berlin Sans FBc">DT</font></th>
					<th><font face="Berlin Sans FBc">PCK</font></th>
					<th><font face="Berlin Sans FBc">PC</font></th>
					
                  </tr>
				</thead>
				<tbody>
					<?php
						
	
					$No = +1;
						
					if(isset($_POST['fil'])) {
					$dari_tanggal = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
					$sampai_tanggal = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
					$tampil = mysqli_query($conn,"SELECT Nama,count(IF(Kehadiran='S',1,NULL)) as S, count(IF(Kehadiran='I',1,NULL)) as I,count(IF(Kehadiran='A',1,NULL)) as A ,count(IF(Kehadiran='DTK',1,NULL)) as DTK,count(IF(Kehadiran='DT',1,NULL)) as DT,count(IF(Kehadiran='PCK',1,NULL)) as PCK,count(IF(Kehadiran='PC',1,NULL)) as PC 
					FROM table_scan  WHERE Tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal' GROUP BY Nama ORDER BY Tanggal ASC");
					}else{	
					$tampil = mysqli_query($conn,"SELECT Nama,count(IF(Kehadiran='S',1,NULL)) as S, count(IF(Kehadiran='I',1,NULL)) as I,count(IF(Kehadiran='A',1,NULL)) as A ,count(IF(Kehadiran='DTK',1,NULL)) as DTK,count(IF(Kehadiran='DT',1,NULL)) as DT,count(IF(Kehadiran='PCK',1,NULL)) as PCK ,count(IF(Kehadiran='PC',1,NULL)) as PC
					FROM table_scan 
					GROUP BY Nama ");
					}
						
					while($row= mysqli_fetch_array($tampil)){
					?>
					<tr>
					<form action="" method="POST" >
						<td><font face="Berlin Sans FBc" ><?php echo $No++ ;?></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="Nama1" name="Nama1" style="min-width:200px;" required disabled value="<?php echo $row['Nama'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="S1" name="S1" required disabled value="<?php echo $row['S'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="I1" name="I1" required disabled value="<?php echo $row['I'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="A1" name="A1" required disabled value="<?php echo $row['A'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="DTK1" name="DTK1" required disabled value="<?php echo $row['DTK'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="DT1" name="DT1" required disabled value="<?php echo $row['DT'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="PCK1" name="PCK1" required disabled value="<?php echo $row['PCK'];?>"></font></td>
						<td><font face="Berlin Sans FBc" ><input type="text" class="form-control" id="PC1" name="PC1" required disabled value="<?php echo $row['PC'];?>"></font></td>
						
						</form>
			
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
			
			
	
			  
	
    
			  
			    <div class="card-header tambah">
				<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#tambahp"><i class="fas fa-plus"></i> Tambah Data</a>
				<a class="btn btn-primary" href="perangkingan.php"><i class="fas fa-plus"></i> Masukkan Data Perangkingan</a>
				</div>
			
			<div id="tambahp" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="function_rank/function_pegawai.php?act=tambahp" method="POST" role="form">
            <div class="modal-body">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label>Nama Pegawai</label>
                          <input type="hidden" name="id_keputusan" id="id_keputusan" required="required" value="<?php echo $id; ?>" readonly>
                          <input type="text" class="form-control" id="Nama" name="Nama" required="required">
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
	  
		
	
				  <!-- card 1 -->
			<div  class="card tambah">
			

			  <div id="keputusan" class="card-header">
                <h3 class="card-title">STEP 1 : Matriks Keputusan (X)</h3>
              </div>
			  
			
					  
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Nama Karyawan</th>
					
			
					<?php foreach($kriterias as $kriteria ): ?>
						<th><?php echo $kriteria['Nama_kriteria']; ?></th>
						
					<?php endforeach; ?>
						
				</tr>
				</thead>
				<tbody>
				<?php
						
	
					$No = +1;
			
					?>
					
					<?php foreach($karyawans as $karyawan): ?>
					<tr>
						<td><?php echo $No++ ;?></font></td>
						<td><?php echo $karyawan['Nama']; ?></td>
						<?php						
						foreach($kriterias as $kriteria):
							$id_keputusan = $karyawan['id_keputusan'];
							$id_kriteria = $kriteria['id_kriteria'];
							echo '<td>';
							echo $matriks_x[$id_kriteria][$id_keputusan];
							echo '</td>';
						endforeach;
						?>
						<!-- <td>
						<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updatek<?php echo $karyawan['id_keputusan']; ?>"><i class="fas fa-edit"></i></a>
						<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletekeputusan<?php echo $karyawan['id_keputusan']; ?>"><i class="fas fa-trash"></i></a>

						 <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletekeputusan<?php echo $karyawan['id_keputusan']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                               <h4 class="modal-title">Hapus </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <p>apakah Anda yakin menghapus data  <b><?php echo $karyawan['id_keputusan'];?></b> ?</p>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="function_keputusan.php?act=deletekeputusan&id_keputusan=<?php echo $karyawan['id_keputusan']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updatek<?php echo $karyawan['id_keputusan']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                             
                                <form action="function_keputusan.php?act=updatek" method="post" role="form">
                                  <?php
                                  $id_keputusan = $karyawan['id_keputusan'];
                                  $query = "SELECT * FROM table_keputusan WHERE id_keputusan='$id_keputusan'";
                                  $result = mysqli_query($conn, $query);
                                  while ($karyawan = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="modal-body">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <div class="col-sm-12">
                  
                                              <input type="hidden" name="id_keputusan" id="id_keputusan" required="required" value="<?php echo $karyawan['id_keputusan']; ?>" readonly>
											  <label>Nama Karyawan </label>
											  <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $karyawan['Nama']; ?>"required>
	
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
				<?php endforeach; ?>
					</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
				
			
			
			<!-- card 2 -->
			<div class="card tambah">
			
              <div id="preferensi" class="card-header">
                <h3 class="card-title">STEP 2 : Bobot Preferensi (W)</h3>
              </div>
			  
			  	</div>
			  <div class="card-header tambah">
             <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#tambahpreferensi"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
			
		<div id="tambahpreferensi" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Preferensi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="function_rank/function.php?act=tambahpreferensi" method="POST" role="form">
            <div class="modal-body">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label>Nama Kriteria</label>
                          <input type="hidden" name="id_kriteria" id="id_kriteria" required="required" value="<?php echo $id; ?>" readonly>
                          <input type="text" class="form-control" id="Nama_kriteria" name="Nama_kriteria" required="required">
					 </div>
					  <div class="col-sm-12">
                        <label>Atribut</label>
                          <input type="hidden" name="id_kriteria" id="id_kriteria" required="required" value="<?php echo $id; ?>" readonly>
						<input type="text" class="form-control" id="Atribut" name="Atribut"  required="required">
					 </div>
					   <div class="col-sm-12">
                        <label>Bobot</label>
                          <input type="hidden" name="id_kriteria" id="id_kriteria" required="required" value="<?php echo $id; ?>" readonly>
						<input type="text " class="form-control" id="Bobot" name="Bobot"  required="required">
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
              <div class="card-body tambah">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <th><font face="Berlin Sans FBc">Nama Kriteria</font></th>
                    <th><font face="Berlin Sans FBc">Atribut</font></th>
                    <th><font face="Berlin Sans FBc">Bobot</font></th>
					<th><font face="Berlin Sans FBc">Action</font></th>

                  </tr>
				</thead>
				<tbody>
					<?php foreach($kriterias as $hasil): ?>
					<tr>
						<td><?php echo $hasil['Nama_kriteria']; ?></td>
						<td>
						<?php
						if($hasil['Atribut'] == 'BENEFIT') {
							echo 'BENEFIT';
						} elseif($hasil['Atribut'] == 'COST') {
							echo 'COST';
						}							
						?>
						</td>
						<td><?php echo $hasil['Bobot']; ?></td>
						
						<td>
						<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updatep<?php echo $hasil['id_kriteria']; ?>"><i class="fas fa-edit"></i></a>
						<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletep<?php echo $hasil['id_kriteria']; ?>"><i class="fas fa-trash"></i></a>
						
						 <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletep<?php echo $hasil['id_kriteria']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                               <h4 class="modal-title">Hapus </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <p>apakah Anda yakin menghapus data  <b><?php echo $hasil['id_kriteria'];?></b> ?</p>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="function.php?act=deletep&id_kriteria=<?php echo $hasil['id_kriteria']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updatep<?php echo $hasil['id_kriteria']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                             
                                <form action="function.php?act=updatep" method="post" role="form">
                                  <?php
                                  $id_kriteria = $hasil['id_kriteria'];
                                  $query = "SELECT * FROM table_preferensi WHERE id_kriteria='$id_kriteria'";
                                  $result = mysqli_query($conn, $query);
                                  while ($hasil = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="modal-body">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <div class="col-sm-12">
												<label>Nama Kriteria </label>
			
                                              <input type="hidden" name="id_kriteria" id="id_kriteria" required="required" value="<?php echo $hasil['id_kriteria']; ?>" readonly>

											  <input type="text" class="form-control" id="Nama_kriteria" name="Nama_kriteria" value="<?php echo $hasil['Nama_kriteria']; ?>"required>
											  <label>Atribut </label>
											  <input type="text" class="form-control" id="Atribut" name="Atribut" value="<?php echo $hasil['Atribut']; ?> "required >
											  <label>Bobot </label>
											  <input type="text" class="form-control" id="Bobot" name="Bobot" value="<?php echo $hasil['Bobot']; ?> "required>
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
				<?php endforeach; ?>
					</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			
			<!-- card 3 -->
			<div class="card tambah">
              <div id="normalisasi" class="card-header">
                <h3 class="card-title">STEP 3 : Martiks Ternormalisasi (R)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">S</font></th>
                    <th><font face="Berlin Sans FBc">I</font></th>
                    <th><font face="Berlin Sans FBc">A</font></th>	
					<th><font face="Berlin Sans FBc">DTK</font></th>	
					<th><font face="Berlin Sans FBc">DT</font></th>
					<th><font face="Berlin Sans FBc">PCK</font></th>
					<th><font face="Berlin Sans FBc">PC</font></th>

                  </tr>
				</thead>
				<tbody>
				
				<?php foreach($karyawans as $karyawan): ?>
					<tr>
						

						<td><?php echo $karyawan['Nama']; ?></td>
						<?php						
						foreach($kriterias as $kriteria):
							$id_keputusan  = $karyawan['id_keputusan'];
							$id_kriteria = $kriteria['id_kriteria'];
							echo '<td>';
							echo round($matriks_r[$id_kriteria][$id_keputusan], 2);
							echo '</td>';
							
						endforeach;
						?>
						
						</tr> 
						<?php endforeach; ?>
				
				</tbody>
                </table>
				
					   <?php
        $sorted_ranks = $ranks;		
		// Sorting
		if(function_exists('array_multisort')):
			$nama = array();
			$nilai = array();
			foreach ($sorted_ranks as $key => $row) {
				$nama[$key]  = $row['Nama'];
				$nilai[$key] = $row['Hasil'];
			}
			array_multisort($nilai, SORT_DESC, $nama, SORT_ASC, $sorted_ranks);
		endif;
		?>
				
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			
			
		
			
			<!-- card 4 -->
			<div class="card">
              <div id="perangkingan" class="card-header">
                <h3 class="card-title">STEP 4 : Perangkingan (V)</h3>
              </div>
    
			  
			  
			  
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th><font face="Berlin Sans FBc">Nama</font></th>
					<th><font face="Berlin Sans FBc">Hasil Perhitungan</font></th>					
					<th><font face="Berlin Sans FBc">Rangking</font></th>
		
                  </tr>
				</thead>
				<tbody>
				
				<?php $No = 1; foreach($sorted_ranks as $karyawan ): ?>
					<tr>
			
						<td><?php echo $karyawan['Nama']; ?></td>
						<td><?php echo round($karyawan['Hasil'], 2); ?></td>
						<td><?php echo $No++; ?></td>
						
					</tr>
				<?php endforeach; ?>
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
  <footer class="main-footer tambah">
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
