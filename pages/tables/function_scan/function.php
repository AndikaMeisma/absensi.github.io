<?php

//conect ke database

require 'conn.php';


//function scan

	
if (isset($_POST['Nama'])){
	//$voice=new com("SAPI.SpVoice");
	$Nama = $_POST['Nama'];
	$date = date('Y-m-d');
	
	$pesan = "hay" .$Nama. "anda berhasil absen masuk. terima kasih";
	$pesan_pulang = "hay" .$Nama. "anda berhasil absen pulang. terima kasih";

	$sql ="SELECT*FROM table_scan WHERE Nama='$Nama' AND Tanggal='$date' AND Status='masuk'";
	$query=$conn->query($sql);
	if($query->num_rows>0){
		$sql ="UPDATE table_scan SET Jam_keluar=NOW(),Status='pulang' WHERE Nama='$Nama' AND Tanggal='$date'";
		$query=$conn->query($sql);

		//$voice->speak($pesan_pulang);
		$_SESSION['SUCCESS']='Berhasil Absen Pulang';
		header("location: scan_qrcode.php");
	}else{
	$sql = "INSERT INTO table_scan(Nama,Jam_masuk,Tanggal,Status) VALUES('$Nama',NOW(),'$date','masuk')";
	if($conn->query($sql)===TRUE){

		//$voice->speak($pesan); 
		$_SESSION['SUCCESS']= 'Berhasil Absen Masuk';
		header("location: scan_qrcode.php");
		
	}else{
		$_SESSION['ERROR']= $conn->error;
	}
	
	}	

	}else{
		$_SESSION['error']='tolong scan qrcode';
		
		}
		

$conn ->close();



?>