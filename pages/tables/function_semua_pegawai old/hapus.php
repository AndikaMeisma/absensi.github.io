<?php
//conect ke database

require 'function.php';

//menangkap data id yang di kirim

$id = $_GET["Id_pegawai"];


//menghapus data dari database

$query="DELETE FROM semua_pegawai WHERE Id_pegawai=$id";

$hapus=mysqli_query($conn,$query);

//alert

if($hapus) {
	 echo "
	<script>
		alert ('berhasil dihapus');
		document.location.href = '../semua_pegawai.php';
	</script> 
	
	"; 
}else{
	 echo "
	<script>
		alert ('gagal');
	</script> 
	
	";
	}
	


?>


