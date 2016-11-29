<?php
class conexion{
	static function  conectar(){
		$con= mysqli_connect("localhost","root","","parqueadero");
		
		return $con;
	}
}

?>