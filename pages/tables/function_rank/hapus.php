<?php
//conect ke database

require'conn.php';


//menangkap data id yang di kirim

$id = $_GET["id_kriteria"];


//menghapus data dari database

$query="DELETE FROM table_preferensi WHERE id_kriteria=$id";

$hapus=mysqli_query($conn,$query);

//alert

if($hapus) {
	 echo "
	<script>
		alert ('berhasil dihapus');
		document.location.href = '../rank.php';
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


