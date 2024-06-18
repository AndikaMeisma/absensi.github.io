<?php
//conect ke database

$conn = mysqli_connect("127.0.0.1", "root", "","absensi");



//function registrasi admin

function registrasi($data) {
		global $conn;	
	
	// ambil data dari tiap elemen dalam form
	
	$username = strtolower(stripslashes($data ["username"]));
	$password = mysqli_real_escape_string ($conn, $data ["password"]);
	$password2 = mysqli_real_escape_string ($conn, $data ["password2"]);
	

	
	//cek konfirm password
	if($password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				</script>";
		return false;
		
	
	}



	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	//tambah admin baru ke database
	mysqli_query($conn, "INSERT INTO admin VALUES('','$username', '$password')");
	
	return mysqli_affected_rows($conn);
	}
?>