<?php

//conect ke database

require 'conn.php';


//function tambah

	if($_GET['act']== 'tambahp'){
    $id = $_POST['id_keputusan'];
    $Nama = $_POST['Nama'];

    //query
    $querytambah =  mysqli_query($conn, "INSERT INTO table_keputusan VALUES('$id','$Nama')");

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
    $id_karyawan = $_POST['id_karyawan'];
    $Nama = $_POST['Nama'];

	
    //query update
    $queryupdate = mysqli_query($conn, "UPDATE table_karyawan SET Nama='$Nama' WHERE id_karyawan='$id_karyawan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:./rank.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($conn);
    }
}

elseif ($_GET['act'] == 'deletep'){
    $id_karyawan= $_GET['id_karyawan'];
	

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM table_karyawan WHERE id_karyawan = '$id_karyawan'");

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