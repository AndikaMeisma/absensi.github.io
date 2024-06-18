<?php

session_start();




require 'function.php';

if( isset($_POST["login"]) )  {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	
	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
	
	//cek username
	if(mysqli_num_rows($result) === 1 ){
	
	
		//cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"])){
		

				$_SESSION['login'] = true;
		
				
				// alihkan ke halaman dashboard admin
				header("location:../../index.php");
 
				

			exit;
			
		
		}
	
		
	}
	$error=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Kantor | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- icon web -->
  <link rel="shortcut icon" href="../../img/a.png">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="."><b>Absensi</b>Kantor</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><i>Silahkan login terlebih dahulu</i></p>
	  
	  <?php if(isset($error)) :  ?>
		<p style="color:red; font-style: italic;">username / password salah</p>
	  <?php endif; ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		<i><a class="text-left" style="float:right" href="register.php">Registrasi</a></i>
		
        <div class="row">
   
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
