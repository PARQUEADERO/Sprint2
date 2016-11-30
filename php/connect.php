<?php
class conexion{
	static function  conectar(){
		//conexión a la base de datos via mysqli
		$con= mysqli_connect("localhost","root","","parqueadero");


		$file = __FILE__;
		$message = " [{$file}] conexion a la base de datos	".PHP_EOL;//mensaje al log
		error_log($message);
		return $con;
	}
}

?>
