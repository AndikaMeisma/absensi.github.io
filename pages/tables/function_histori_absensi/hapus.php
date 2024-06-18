<?php
//conect ke database

require 'function.php';

//menangkap data id yang di kirim

$id = $_GET["id_scan"];


//menghapus data dari database

$query="DELETE FROM table_scan WHERE id_scan=$id";

$hapus=mysqli_query($conn,$query);

//alert

if($hapus) {
	 echo "
	<script>
		alert ('berhasil dihapus');
		document.location.href = '../histori_absensi.php';
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


