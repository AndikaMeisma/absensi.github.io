<?php
//conect ke database

$conn = mysqli_connect("127.0.0.1", "root", "","absensi");

//function query

function query($query) {
		global $conn;	
		$result = mysqli_query($conn,$query);
		$row = [];
		while( $row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
			
		}
		return $rows;
	}

//function tambah data

function tambah($data) {
		global $conn;	
	
	// ambil data dari tiap elemen dalam form
	

	$Nama = htmlspecialchars ($data ["Nama"]);
	$Nik = htmlspecialchars ($data ["Nik"]);
	$Departemen = htmlspecialchars ($data ["Departemen"]);
	$Jabatan = htmlspecialchars ($data ["Jabatan"]);
	$No_Wa = htmlspecialchars ($data ["No_Wa"]);
	
		//upoad foto
		
		$Foto = upload();
		if ( !$Foto){
			return false;
			}
	
		//query insert data
	$query = "INSERT INTO semua_pegawai
				VALUES
			('', '$Foto','$Nama',  '$Nik', '$Departemen', '$Jabatan', '$No_Wa')";
			
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	}
	
//fugsi upload foto
	
	function upload(){
	
	$nameFile = $_FILES['Foto']['name'];
	$ukuranFile = $_FILES['Foto']['size'];
	$error = $_FILES['Foto']['error'];
	$tmpName = $_FILES['Foto']['tmp_name'];
	
	
	
	//cek apakah tidak ada gambar yg diupload
	
	if($error === 5 ){
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
				</script>";
				return false;
	}
	
	//cek apakah yg diupload adalah gambar
	$fotovalid =['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.',$nameFile);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if( !in_array ($ekstensifoto, $fotovalid) ){
		echo "<script>
				alert('yang anda upload bukan gambar!');
				</script>";
		return false;
	}

		if($ukuranFile > 5000000){
		echo "<script>
				alert('yang anda upload bukan gambar!');
				</script>";
		return false;
		}
		
		//generate nama baru
		$nameFileBaru = uniqid();
		$nameFileBaru .='.';
		$nameFileBaru .= $ekstensifoto;
		
		//lolos pengecekan gambar siap uploadd
		move_uploaded_file($tmpName, 'img/' . $nameFileBaru);
		return $nameFileBaru;
	
}
	


// function edit data
function edit($data) {
		global $conn;	
	
	// ambil data dari tiap elemen dalam form
	
	$id =  ($data ["Id_pegawai"]);
	
	//cek apakah user pilih gambar baru atau tidak
	$fotoLama = htmlspecialchars ($data ["fotoLama"]);
	if($_FILES['Foto']['error']=== 4){
		$Foto = $fotoLama;
	}else {
		$Foto = upload();
	}
	

	$Nama = htmlspecialchars ($data ["Nama"]);
	$Nik = htmlspecialchars ($data ["Nik"]);
	$Departemen = htmlspecialchars ($data ["Departemen"]);
	$Jabatan = htmlspecialchars ($data ["Jabatan"]);
	$No_Wa = htmlspecialchars ($data ["No_Wa"]);
	
		//query insert data
	$query = "UPDATE semua_pegawai SET 
				Foto='$Foto', Nama='$Nama', Nik='$Nik', Departemen='$Departemen', Jabatan='$Jabatan', No_Wa='$No_Wa' WHERE Id_pegawai=$id";
			
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	}

	
//function search

function search($search){
global $conn;
	$query ="SELECT * FROM semua_pegawai
	WHERE 
	Nama LIKE '%$search%' OR
	Nik LIKE '%$search%' OR
	Departemen LIKE '%$search%' OR
	Jabatan LIKE '%$search%' 
	";
	
	return mysqli_query($conn,$query);
}

?>