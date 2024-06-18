<?php
require 'function.php';


if( isset($_POST["submit"] ) ) {

	if  (tambah($_POST) > 0) {
    echo "
	<script>
		alert ('Input berhasil');
		document.location.href = '../histori_absensi.php';
	</script> 
	
	";
	
  } else {
    echo "
	 <script>
		alert ('Input gagal');
	 </script> 
	 ";
  }
	
}


	
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Tambah Data</title>
  </head>
<body>
<section class="content">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<div class="container-fluid">
		<div class="card text-center">
			<div class="card-header">
				<h2>Tambah Data Pegawai</h2>
			</div>
				<div class="card-body">
					<form action="" method= "POST">
					
					
					<div class="mb-3 row">
						<label for="Nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
							<input type="text" name="Nama" class="form-control" id="text" required>
							</div>
					</div>
					
					
					<div class="mb-3 row">
						<label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
							<input type="date" name="Tanggal" class="form-control" id="Tanggal" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jam masuk" class="col-sm-2 col-form-label">Jam masuk</label>
							<div class="col-sm-10">
							<input type="text" name="Jam masuk" class="form-control" id="Jam masuk"  >
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jam keluar" class="col-sm-2 col-form-label">Jam keluar</label>
							<div class="col-sm-10">
							<input type="text" name="Jam keluar" class="form-control" id="Jam keluar">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Kehadiran" class="col-sm-2 col-form-label">Kehadiran</label>
							
							<div class="col-sm-10 ">
							<select class="form-control" name="Kehadiran" id="combo1" >
							<option selected disabled>Please Choose...</option>
							<option value="S">S</option>
							<option value="I">I</option>
							<option value="A">A</option>
							<option value="DT">DT</option>
							<option value="PC">PC</option>
							</select>
							
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col-sm-10">
							<input type="text" name="Keterangan" class="form-control" id="text">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Status" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
							<input type="text" name="Status" class="form-control" id="text">
							</div>
					</div>
					
					
					<div>
						<button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
						<a href="../histori_absensi.php" class="btn btn-danger" >Keluar</a>
					</div>
					</form>
					<br></br>
			<div class="card-footer text-muted">
				OK
			</div>
			</div>
		</div>
	</div>	
 </div>	
</section>
</body>
</html>
