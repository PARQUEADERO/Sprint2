<?php

include_once('./connect.php');
include_once('./crud.php');
//clase por la cual se realiza el registro de una nueva persona que puede ingresar a los parqueaderos
class registro
{
	static function getDatosRegistro()
	{

				$q="insert into registro (nombre,telefono,id,placa,combustible,color,marca,modelo) values ($nombre, $telefono, $id, $placa, $combustible, $color, $marca, $modelo)";
		$cnx=conexion::conectar();
				mysql_query($q,$cnx);
				mysql_close($cnx);
	}
	function getDatosLogin()
	{
		$usr = $_POST["usr"];
		$pwd = $_POST["pwd"];
	}
	function getDatoIngreso()
	{
		$usr   = $_POST["usr"];
		$placa = $_POST["placa"];
	}
}

 $nombre      = $_POST["nombre"];
	 	$telefono    = $_POST["telefono"];
		$id          = $_POST["id"];
		$combustible = $_POST["combustible"];
		$placa       = $_POST["placa"];
	 	$color       = $_POST["color"];
	 	$marca       = $_POST["marca"];
 	$modelo      = $_POST["modelo"];
	crud::insert($nombre, $telefono, $id, $placa, $combustible, $color, $marca, $modelo);
	$file = __FILE__;
	$message = " [{$file}] intento de registro	".PHP_EOL;//mensaje al log
	error_log($message);
//en caso de registrarse se retorna a la misma pantalla
 echo '<script>window.location.href="../html/registro.html";</script>';

?>
