<?php
    error_reporting(0);
	include("./connect.php");
  //clase con la cual se se verifica la existencia del usuario administrador
	class frmEditarOK{
		static function existe($usu,$pas){
			$cnx=conexion::conectar();
			$q = "select * from usuario where usr= '". $usu ."' and pwd ='". $pas . "'";
			$r=mysqli_query($cnx,$q);
			if(mysqli_num_rows($r)==0){
        $file = __FILE__;
    		$message = " [{$file}] no se loggeo correctamente	".PHP_EOL;//mensaje al log
    		error_log($message);

echo '<script>window.location.href="../html/login.html";</script>';


				}else{
          //en caso de que se loggee bien se dirigira a la pantalla del menu de administrador
          $file = __FILE__;
      		$message = " [{$file}] se dirigio a al menu administrador	".PHP_EOL;//mensaje al log
      		error_log($message);
					include("../html/menu_admin.html");

				}
			mysqli_close($cnx);
		}
	}
	$u=$_POST['usr'];
	$p=$_POST['pwd'];

	frmEditarOK::existe($u,$p);
	?>
