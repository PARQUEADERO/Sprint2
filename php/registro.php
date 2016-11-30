<?php

include_once('./connect.php');
include_once('./crud.php');
class registro
{
	static function getDatosRegistro()
	{
		// $nombre      = $_POST["nombre"];
	// 	$telefono    = $_POST["telefono"];
	// 	$id          = $_POST["id"];
	// 	$combustible = $_POST["combustible"];
	// // 	$placa       = $_POST["placa"];
	// 	$color       = $_POST["color"];
	// 	$marca       = $_POST["marca"];
	// 	$modelo      = $_POST["modelo"];

	// 	crud::insert($nombre, $telefono, $id, $placa, $combustible, $color, $marca, $modelo);




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
/*	print '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registro de usuario</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body background=".././img/SAM_3370.jpg">
   <div class="container-fluid">
		<section class="container">
			<div class="container-page">
				<div class="col-md-6">
					<h3 class="dark-grey">Registro</h3>
					<form name="frmRegistro" method="POST" action="../php/registro.php" >
						<div class="form-group col-lg-12">
							<label>Nombre completo</label>
							<input type="text" name="nombre" class="form-control" id="nombre" value="" placeholder="Nombre completo" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label>Teléfono</label>
							<input type="text" name="telefono" class="form-control" id="telefono" value="" placeholder="Número telefónico" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label>Identificación</label>
							<input type="text" name="id" class="form-control" id="id" value="" placeholder="Número de identificación" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label>Placa</label>
							<input type="text" name="placa" class="form-control" id="placa" value="" placeholder="Placa" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label for="sel1">Tipo de combustible</label>
							<select class="form-control" id="sel1" name="combustible">
							  <option value="corriente">Corriente</option>
							  <option value="extra">Extra</option>
							  <option value="gnv">GNV</option>
							  <option value="acpm">ACPM</option>
							</select>
						</div>

						<div class="form-group col-lg-6">
							<label>Color</label>
							<input type="text" name="color" class="form-control" id="color" value="" placeholder="Color del vehículo" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label>Marca</label>
							<input type="text" name="marca" class="form-control" id="marca" value="" placeholder="Marca del vehículo" autofocus required>
						</div>

						<div class="form-group col-lg-6">
							<label>Modelo</label>
							<input type="text" name="modelo" class="form-control" id="modelo" value="" placeholder="Modelo del vehículo" autofocus required>
						</div>
						<div class="form-group col-lg-6" style="margin-top:24px">
						<input type="button" class="btn btn-primary"value="Registrar" onclick="validacion()" />

						</div>
					</form>
				</div>

				<div class="col-md-6">
					<h3 class="dark-grey">Tenga en cuenta estas indicaciones antes de diligenciar el registro</h3>
					<p>
						La información aquí suministrada solo se utilizara para una mayor agilidad a la hora de ingresar al parqueadero.Evite
						brindar información erronea.
					</p>

					</div>
			</div>
		</section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
		<script src="../js/validacionUsuario.js"></script>

	<script>
	alert("Registro exitoso");
	</script>
  </body>
</html>
';

*/
 echo '<script>window.location.href="../html/registro.html";</script>';

?>
