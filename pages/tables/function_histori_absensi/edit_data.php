<?php
require 'function.php';

//ambil data dari url
$id = $_GET["id_scan"];

//query data pegawai berdasarkan id
$pgw = query("SELECT * FROM table_scan WHERE id_scan = $id")[0];

//cek tombol submit apakh udah ditekan
if( isset($_POST["submit"] ) ) {

//cek apakah dta berhasil di ubah
	if  (edit($_POST)>0) {
    echo "
	<script>
		alert ('Edit berhasil');
		document.location.href = '../histori_absensi.php';
	</script> 
	
	";
	
  } else {
    echo "
	 <script>
		alert ('Edit gagal');
		
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

    <title>Edit Data</title>
  </head>
<body>
<section class="content">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<div class="container-fluid">
		<div class="card text-center">
			<div class="card-header">
				<h2>Edit Data Pegawai</h2>
			</div>
			
		

		
		
				<div class="card-body">
					<form action="" method= "POST">
					
					<input type="hidden" name="id_scan" class="form-control" id="id_scan" required value="<?=$pgw['id_scan']; ?>">
					
					<div class="mb-3 row">
						<label for="Nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
							
							<input type="text" name="Nama" class="form-control" id="Nama" required value="<?=$pgw['Nama']; ?>">
							</div>
					</div>
					
					
					<div class="mb-3 row">
						<label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
							<input type="date" name="Tanggal" class="form-control" id="Tanggal" required value="<?=$pgw['Tanggal']; ?>">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jam masuk" class="col-sm-2 col-form-label">Jam masuk</label>
							<div class="col-sm-10">
							<input type="text" name="Jam masuk" class="form-control" id="Jam masuk" value="<?=$pgw['Jam_masuk']; ?>">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Jam keluar" class="col-sm-2 col-form-label">Jam keluar</label>
							<div class="col-sm-10">
							<input type="text" name="Jam keluar" class="form-control" id="Jam keluar"  value="<?=$pgw['Jam_keluar']; ?>">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Kehadiran" class="col-sm-2 col-form-label">Kehadiran</label>
							<div class="col-sm-10">
							<select type="text" name="Kehadiran" class="form-control" id="Kehadiran"  value="<?=$pgw['Kehadiran']; ?>">
							<option selected disabled value="<?=$pgw['Kehadiran']; ?>"><?=$pgw['Kehadiran']; ?></option>
							<option value="S">S</option>
							<option value="I">I</option>
							<option value="A">A</option>
							<option value="DTK">DTK</option>
							<option value="PCK">PCK</option>
							<option value="DT">DT</option>
							<option value="PC">PC</option>
							<select>
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col-sm-10">
							<input type="text" name="Keterangan" class="form-control" id="Keterangan"  value="<?=$pgw['Keterangan']; ?>">
							</div>
					</div>
					
					<div class="mb-3 row">
						<label for="Status" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
							<input type="text" name="Status" class="form-control" id="Status" value="<?=$pgw['Status']; ?>">
							</div>
					</div>
					
					
					<div>
						<button class="btn btn-primary" type="submit" name="submit">Simpan</button>
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
