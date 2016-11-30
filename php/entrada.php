<?php

include_once('./connect.php');
class entrada{
	//clase con la cual se realiza la inserción de un nuevo registro invocando la conexión para una entrada al parquedero

	 static function insert($nombre, $telefono, $id, $placa, $combustible, $color, $marca, $modelo){
		$connect=conexion::conectar();
		$qwery="insert into registro (nombre, telefono, id, placa, combustible, color, marca, modelo) values ('$nombre','$telefono','$id','$placa','$combustible','$color','$marca', '$modelo')";
		$file = __FILE__;
		$message = " [{$file}] insercion de una entrada	".PHP_EOL;//mensaje al log
		error_log($message);
		mysqli_query($connect,$qwery);
		mysqli_close($connect);
	}
}

?>
