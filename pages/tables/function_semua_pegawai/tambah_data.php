<?php
require 'function.php';


if( isset($_POST["submit"] ) ) {



	if  (tambah($_POST) > 0) {
    echo "
	<script>
		alert ('Input berhasil');
		document.location.href = '../semua_pegawai.php';
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
					<form action="" method= "POST" enctype="multipart/form-data">
					
					
					<div class="mb-3 row">
						<label for="Foto" class="col-sm-2 col-form-label">Foto</label>
							<div class="col-sm-10">
							<input type="File" name="Foto" class="form-control" id="Foto" required>
							</div>
					</div>
					
					
					<div class="mb-3 row">
						<label for="Nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
							<input type="text" name="Nama" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Nik" class="col-sm-2 col-form-label">Nik</label>
							<div class="col-sm-10">
							<input type="number" name="Nik" class="form-control" id="number" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Ttl" class="col-sm-2 col-form-label">Tempat Tgl Lahir</label>
							<div class="col-sm-10">
							<input type="text" name="Ttl" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jenis_Kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-10">
							<input type="text" name="Jenis_Kelamin" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jalan" class="col-sm-2 col-form-label">Jalan/Dusun</label>
							<div class="col-sm-10">
							<input type="text" name="Jalan" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Rt_Rw" class="col-sm-2 col-form-label">RT/RW</label>
							<div class="col-sm-10">
							<input type="text" name="Rt_Rw" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Desa" class="col-sm-2 col-form-label">Desa</label>
							<div class="col-sm-10">
							<input type="text" name="Desa" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Departemen" class="col-sm-2 col-form-label">Departemen</label>
							<div class="col-sm-10">
							<input type="text" name="Departemen" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
							<div class="col-sm-10">
							<input type="text" name="Jabatan" class="form-control" id="text" required>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="No Wa" class="col-sm-2 col-form-label">No Wa</label>
							<div class="col-sm-10">
							<input type="number" name="No Wa" class="form-control" id="number" required>
							</div>
					</div>
					
					
					<div>
						<button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
						<a href="../semua_pegawai.php" class="btn btn-danger" >Keluar</a>
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
