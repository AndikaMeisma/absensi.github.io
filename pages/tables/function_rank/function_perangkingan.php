<?php

//conect ke database

require 'conn.php';



//function tambah

if($_GET['act']== 'tambahpr'){
    $id = $_POST['id_perangkingan'];
    $id_keputusan = $_POST['id_keputusan'];
	$id_kriteria = $_POST['id_kriteria'];
	$Hasil = $_POST['Hasil'];


    //query
    $querytambah =  mysqli_query($conn, "INSERT INTO table_perangkingan VALUES('$id','$id_keputusan','$id_kriteria','$Hasil')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../perangkingan.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
	mysqli_close($conn);
}

elseif($_GET['act']=='updatepr'){
    $id = $_POST['id_perangkingan'];
    $id_keputusan = $_POST['id_keputusan'];
	$id_kriteria = $_POST['id_kriteria'];
	$Hasil = $_POST['Hasil'];

	
    //query update
    $queryupdate = mysqli_query($conn, "UPDATE table_perangkingan SET id_keputusan='$id_keputusan',id_kriteria='$id_kriteria',Hasil='$Hasil' WHERE id_perangkingan='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../perangkingan.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($conn);
    }
}

elseif ($_GET['act'] == 'deletepr'){
    $id_perangkingan= $_GET['id_perangkingan'];
	

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM table_perangkingan WHERE id_perangkingan = '$id_perangkingan'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../perangkingan.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($conn);
    }

    mysqli_close($conn);
}




?>