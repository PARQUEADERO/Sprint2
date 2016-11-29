<?php

include_once('./connect.php');
class crud{
	
	 static function insert($nombre, $telefono, $id, $placa, $combustible, $color, $marca, $modelo){
		$connect=conexion::conectar();
		$qwery="insert into registro (nombre, telefono, id, placa, combustible, color, marca, modelo) values ('$nombre','$telefono','$id','$placa','$combustible','$color','$marca', '$modelo')";
		
		mysqli_query($connect,$qwery);
		mysqli_close($connect);
	}
}
	
?>