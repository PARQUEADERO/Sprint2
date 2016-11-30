<?php
    error_reporting(0);
	include("./connect.php");
	class frmEditarOK{
		static function existe($usu,$pas){
			$cnx=conexion::conectar();
			$q = "select * from usuario where usr= '". $usu ."' and pwd ='". $pas . "'";
			$r=mysqli_query($cnx,$q);
			if(mysqli_num_rows($r)==0){


		/*		 print '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inicio de sesión</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href=".././css/login.css" rel="stylesheet">


  </head>
  <body >

	 <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1 >Ingreso de cuenta</h1><br>
				  <form name="frmLogin" method="POST" action="../php/login.php">
					<input type="text" name="usr" placeholder="Usuario">
					<input type="password" name="pwd" placeholder="Contraseña">
					<input type="submit" name="btnLogin" class="login loginmodal-submit" value="Ingresar">
				  </form>

				  <div class="login-help">
			<!--		<center><a href="#">¿Olvidaste la contraseña?</a> </center> -->
				  </div>
				</div>
			</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     src="js/bootstrap.min.js">

	</script>
	<script>
	alert("USUARIO O CONTRASEÑA INCORRECTA");
	</script>
  </body>
</html>';*/
echo '<script>window.location.href="../html/login.html";</script>';


				}else{
					include("../html/menu_admin.html");

				}
			mysqli_close($cnx);
		}
	}
	$u=$_POST['usr'];
	$p=$_POST['pwd'];

	frmEditarOK::existe($u,$p);
	?>
