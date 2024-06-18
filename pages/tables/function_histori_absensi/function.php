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
	$Tanggal = htmlspecialchars ($data ["Tanggal"]);
	$Jam_masuk = htmlspecialchars ($data ["Jam_masuk"]);
	$Jam_keluar = htmlspecialchars ($data ["Jam_keluar"]);
	$Kehadiran = htmlspecialchars ($data ["Kehadiran"]);
	$Keterangan = htmlspecialchars ($data ["Keterangan"]);
	$Status = htmlspecialchars ($data ["Status"]);
	
		//query insert data
	$query = "INSERT INTO table_scan
				VALUES
			('', '$Nama', '$Tanggal', '$Jam_masuk', '$Jam_keluar', '$Kehadiran', '$Keterangan', '$Status')";
			
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	}

// function edit data
function edit($data) {
		global $conn;	
	
	// ambil data dari tiap elemen dalam form
	
	$id =  ($data ["id_scan"]);
	$Nama = htmlspecialchars ($data ["Nama"]);
	$Tanggal = htmlspecialchars ($data ["Tanggal"]);
	$Jam_masuk = htmlspecialchars ($data ["Jam_masuk"]);
	$Jam_keluar = htmlspecialchars ($data ["Jam_keluar"]);
	$Kehadiran = htmlspecialchars ($data ["Kehadiran"]);
	$Keterangan = htmlspecialchars ($data ["Keterangan"]);
	$Status = htmlspecialchars ($data ["Status"]);
	
		//query edit data
	$query = ("UPDATE table_scan SET 
				Nama='$Nama',  Tanggal='$Tanggal', Jam_masuk='$Jam_masuk', Jam_keluar='$Jam_keluar', Kehadiran='$Kehadiran', Keterangan='$Keterangan', Status='$Status' WHERE id_scan=$id");
			
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	}

	
//function search

function search($search){
global $conn;
	$query ="SELECT * FROM table_scan
	WHERE 
	Nama LIKE '%$search%' OR
	Kehadiran LIKE '%$search%' OR
	Keterangan LIKE '%$search%' OR
	Status LIKE '%$search%' 


	";
	
	return mysqli_query($conn,$query);
}
?>