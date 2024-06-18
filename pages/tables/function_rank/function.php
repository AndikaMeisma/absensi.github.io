<?php

//conect ke database

require 'conn.php';


//function tambah preferensi

	if($_GET['act']== 'tambahpreferensi'){
    $id = $_POST['id_kriteria'];
	$Nama_kriteria = $_POST['Nama_kriteria'];
    $Atribut = $_POST['Atribut'];
	$Bobot = $_POST['Bobot'];

    //query
    $querytambah =  mysqli_query($conn, "INSERT INTO table_preferensi VALUES('$id','$Nama_kriteria','$Atribut','$Bobot')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../rank.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
	mysqli_close($conn);
}
elseif($_GET['act']=='updatep'){
    $id_kriteria = $_POST['id_kriteria'];
    $Nama_kriteria = $_POST['Nama_kriteria'];
	$Atribut = $_POST['Atribut'];
	$Bobot = $_POST['Bobot'];

	
    //query update
    $queryupdate = mysqli_query($conn, "UPDATE table_preferensi SET Nama_kriteria='$Nama_kriteria',Atribut='$Atribut',Bobot='$Bobot' WHERE id_kriteria='$id_kriteria' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../rank.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($conn);
    }
}
elseif ($_GET['act'] == 'deletep'){
    $id_kriteria= $_GET['id_kriteria'];
	

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM table_preferensi WHERE id_kriteria = '$id_kriteria'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../rank.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($conn);
    }

    mysqli_close($conn);
}



?>