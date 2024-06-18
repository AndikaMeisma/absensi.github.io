<?php
require 'function.php';

//ambil data dari url
$id = $_GET["Id_pegawai"];

//query data pegawai berdasarkan id
$pgw = query("SELECT * FROM semua_pegawai WHERE Id_pegawai = $id")[0];

//cek tombol submit apakh udah ditekan
if( isset($_POST["submit"] ) ) {

//cek apakah dta berhasil di ubah
	if  (edit($_POST)>0) {
    echo "
	<script>
		alert ('Edit berhasil');
		document.location.href = '../semua_pegawai.php';
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

<style>

.bingkai{border:5px groove yellow};

</style>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!-- icon web -->
  <link rel="shortcut icon" href="../../../img/a.png">
  
  
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
			
		

		
		<div class="row">
				<div class="col-sm-15">
				<div class="card-body">
					<form action="" method= "POST" enctype="multipart/form-data">
					
					<input type="hidden" name="Id_pegawai" class="form-control" id="Id_pegawai" required value="<?=$pgw['Id_pegawai']; ?>">
					<input type="hidden" name="fotoLama" class="form-control" id="fotoLama" value="<?=$pgw['Foto']; ?>">
					
					
					<div class="mb-3 row">
						<div class=" col-sm-4">
						<div class="bingkai">
						<div class="col-sm-15 mb-3 mt-3 mr-3 ml-3" >
						
						<div class="mb-3  ">
						<img src="img/<?= $pgw['Foto']; ?>" width = "185px" height ="175px" class="rounded">
						<br></br>
						<h4><i><font face="Berlin Sans FB"><?=$pgw['Nama'];?></font></i></h4>
						</div>
						</div>
						</div>
						</div>
						
						
					<div class="col-sm-8">
					<div class="bingkai">
					<div class="col-sm-20 mb-3 mt-3 ml-3 mr-3 " >
						
						<div class="mb-2 row">
						<h1><font face="Berlin Sans FB">EDIT</font></h1>
						</div>
						
						<div class="mb-2  row">
						<label for="Foto" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">Foto</font></label>	
							<div class="col-sm-8">
							<input type="File" name="Foto" class="form-control" id="Foto" >
							</div>
						</div>
					
					<div class="mb-2 row">
						<label for="Nama" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">Nama</font></label>
							<div class="col-sm-8">
							
							<input type="text" name="Nama" class="form-control" id="Nama" required value="<?=$pgw['Nama']; ?>">
							</div>
					</div>
					
					<div class="mb-2 row">
						<label for="Nik" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">Nik</font></label>
							<div class="col-sm-8">
							
							<input type="number" name="Nik" class="form-control" id="Nik" required value="<?=$pgw['Nik']; ?>">
							</div>
					</div>
					
					<div class="mb-2 row">
						<label for="Departemen" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">Departemen</font></label>
							<div class="col-sm-8">
							<input type="text" name="Departemen" class="form-control" id="Departemen" required value="<?=$pgw['Departemen']; ?>">
							</div>
					</div>
					
					<div class="mb-2 row">
						<label for="Jabatan" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">Jabatan</font></label>
							<div class="col-sm-8">
							<input type="text" name="Jabatan" class="form-control" id="Jabatan" required value="<?=$pgw['Jabatan']; ?>">
							</div>
					</div>
					
					<div class="mb-2 row">
						<label for="No Wa" class="col-sm-3 col-form-label"><font face="Berlin Sans FB">No Wa</font></label>
							<div class="col-sm-8">
							<input type="number" name="No Wa" class="form-control" id="No Wa" required value="<?=$pgw['No_Wa']; ?>">
							</div>
					</div>
					
					
					<div>
						<button class="btn btn-primary" type="submit" name="submit">Simpan</button>
						<a href="../semua_pegawai.php" class="btn btn-danger" >Keluar</a>
					</div>
					</form>
				
				</div>
				</div>
				</div>
				
				</div>
				</div>	
			</div>
					<br></br>
			<div class="card-footer text-muted">
				OK
			</div>
			</div>
			</div>
		</div>
	</div>	
 </div>	
</section>
</body>
</html>
