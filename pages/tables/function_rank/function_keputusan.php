<?php

//conect ke database

require 'conn.php';


//function tambah

	if($_GET['act']== 'tambahkeputusan'){
    $id = $_POST['id_keputusan'];
    $Nama = $_POST['Nama'];
	$S = $_POST['S'];
	$I = $_POST['I'];
	$A = $_POST['A'];
	$DTK = $_POST['DTK'];
	$DT = $_POST['DT'];
	$PCK = $_POST['PCK'];
	$PC = $_POST['PC'];
    //query
    $querytambah =  mysqli_query($conn, "INSERT INTO table_keputusan VALUES('$id','$Nama','$S','$I','$A','$DTK','$DT','$PCK','$PC')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../rank.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
	mysqli_close($conn);
}

elseif($_GET['act']=='updatek'){
    $id_keputusan = $_POST['id_keputusan'];
    $Nama = $_POST['Nama'];
	$S = $_POST['S'];
	$I = $_POST['I'];
	$A = $_POST['A'];
	$DTK = $_POST['DTK'];
	$DT = $_POST['DT'];
	$PCK = $_POST['PCK'];
	$PC = $_POST['PC'];

	
    //query update
    $queryupdate = mysqli_query($conn, "UPDATE table_keputusan SET Nama='$Nama',S='$S',I='$I',A='$A',DTK='$DTK',DT='$DT',PCK='$PCK',PC='$PC' WHERE id_keputusan='$id_keputusan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../rank.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($conn);
    }
}

elseif ($_GET['act'] == 'deletekeputusan'){
    $id_keputusan= $_GET['id_keputusan'];
	

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM table_keputusan WHERE id_keputusan = '$id_keputusan'");

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