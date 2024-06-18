<?php
require 'function.php';

//ambil data dari url
$id = $_GET["Id_pegawai"];

//query data pegawai berdasarkan id
$pgw = query("SELECT * FROM semua_pegawai WHERE Id_pegawai = $id")[0];

//send wa
if(isset($_POST['submit'])){
	$nohape  = $_POST['No_Wa']; 
	$isi     = $_POST['text'];

	echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$nohape&text=$isi&source=&data='</script>";

}
				
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send to Whatsapp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<!-- icon web -->
	<link rel="shortcut icon" href="../../../img/a.png">
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
              
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Send To Whatsapp <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron vertical-center">
    <div class="container center">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-6">
                <h2>Send Message to Whatsapp</h2>
							
				
                <form method="POST" action="">
							
				
                    <div class="form-group">
                        <label for="No_Wa">Phone number</label>
                        <input type="number" name="No_Wa" id="No_Wa" class="form-control" placeholder="No Whathapp" required value="<?=$pgw['No_Wa']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea class="form-control" name="text" id="text"></textarea>
                    </div>
			
                    <button type="submit" name="submit" class="btn btn-primary" >Send</button>
					<a href="../semua_pegawai.php" class="btn btn-danger" >Keluar</a>
			   </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</html>
