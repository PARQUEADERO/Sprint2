<?php
    error_reporting(0);
	include("./connect.php");
  //clase para el registro de un vehículo al establecimiento
	class frmEntrada{
		static function existe($usu,$pas,$sitio,$vehiculo){
      //mirar si esta regsitrado el vshiculo
      $file = __FILE__;
			$cnx=conexion::conectar();
			$q = "select * from registro where id= '". $usu ."' and placa ='". $pas . "'";
			$r=mysqli_query($cnx,$q);
      $aux=2;//Está vairable quemada sería el pico y placa por defecto
			if(mysqli_num_rows($r)==0){//verificación de la existencia de un registro de esta persona
        $message = " [{$file}] redireccion por no estar registrado	".PHP_EOL;//mensaje al log
        error_log($message);
        echo '<script>window.location.href="../html/registro.html";</script>';//en caso de que no se envia a la pagina de registro


				}else{
          //mirar si ya se encuentra regisrado en la entrada
              $cnx=conexion::conectar();
              $q = "select * from entrada where id= '". $usu ."' and placa ='". $pas . "'";
              $r=mysqli_query($cnx,$q);

              if (mysqli_num_rows($r)==0) {//se verifica que  ya haya entrado o no
                $entrada=date("d") .'/'.date("m").'/'.date("Y");//Guardado de la fecha

                $hour=date("H:i");//Guardado de la hora

                $split=split(““,$pas);//se divide la placa para obtener el número que está al final de ésta
                for($i=0; $i<count($split);$i++){
                }
                  if ($split[$i-1]==$aux) {//en caso de que tenga pico y placa se devuelve a la página en la que se encontraba
                    $message = " [{$file}] posee pico y placa	".PHP_EOL;//mensaje al log
                		error_log($message);
                    echo "<script>alert('posee pico y placa');</script>";
                    echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                  }else{

                        if (strcmp ($sitio , "regional1" ) == 0) {//se constata la entrada por la cual se desea entrar
                           if (strcmp ($vehiculo, "moto" )== 0) {//se verifica que por esta si se pueda ingresar el tipo de vehículo
                                  $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                                  $r=mysqli_query($cnx,$q);

                                  if (mysqli_num_rows($r)==0) {//busqueda en caso de que no hayan puestos
                                    $message = " [{$file}] puestos ocupados	".PHP_EOL;//mensaje al log
                                		error_log($message);
                                    echo "<script>alert('ocupados');</script>";
                                    echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                                  }else {
                                    $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                                    $r=mysqli_query($cnx,$q);
                                    while ($actor = $r->fetch_assoc()) {//En caso de que haya se encuentra el primero disponible
                                            if (strcmp ($actor['disponible'] , "s" ) == 0) {
                                              $zone=$actor['zona'];
                                              $numero=$actor['numero'];
                                              $place=$actor['entrada'];
                                              //inserta la entrada con la fecha el id la placa y el lugar
                                              $qwery="insert into entrada (id, placa, fecha,zona,numero,entrada,hora) values ('$usu','$pas','$entrada','$zone','$numero','$place','$hour')";
                                              mysqli_query($cnx,$qwery);
                                              //cambia el estado de la zona en la que ya entro a no disponible la cual se identifica con "n"
                                              $qwery="update lugar set disponible ='n' where zona='".$zone."' and numero='".$numero."'";
                                              mysqli_query($cnx,$qwery);
                                              $message = " [{$file}] insercion y actualizacion de la base de datos al ingresar el vehiculo	".PHP_EOL;//mensaje al log
                                          		error_log($message);
                                              mysqli_close($cnx);
                                              break;
                                            }
                                      }
                                      echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                      echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                                  }


                           }else {//mensaje por si no se puede entrar el vehículo por la entrada designada
                             $message = " [{$file}] vehiculo erroneo segun la entrada	".PHP_EOL;//mensaje al log
                         		error_log($message);
                             echo "<script>alert('No se pueden registrar carros en este sitio');</script>";
                             echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                           }



                        }else if (strcmp ($sitio , "regional2" ) == 0) {//se constata la entrada por la cual se desea entrar
                          if (strcmp ($vehiculo, "carro" )== 0) {//se verifica que por esta si se pueda ingresar el tipo de vehículo
                            $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                            $r=mysqli_query($cnx,$q);

                            if (mysqli_num_rows($r)==0) {//busqueda en caso de que no hayan puestos
                              $message = " [{$file}] puestos ocupados	".PHP_EOL;//mensaje al log
                              error_log($message);
                              echo "<script>alert('ocupados');</script>";
                              echo '<script>window.location.href="../html/registroEntrada.html";</script>';


                            }else {
                              $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                              $r=mysqli_query($cnx,$q);
                              while ($actor = $r->fetch_assoc()) {//En caso de que haya se encuentra el primero disponible
                                      if (strcmp ($actor['disponible'] , "s" ) == 0) {
                                        $zone=$actor['zona'];
                                        $numero=$actor['numero'];
                                        $place=$actor['entrada'];
                                        //inserta la entrada con la fecha el id la placa y el lugar
                                        $qwery="insert into entrada (id, placa, fecha,zona,numero,entrada,hora) values ('$usu','$pas','$entrada','$zone','$numero','$place','$hour')";
                                        mysqli_query($cnx,$qwery);
                                        //cambia el estado de la zona en la que ya entro a no disponible la cual se identifica con "n"
                                        $qwery="update lugar set disponible ='n' where zona='".$zone."' and numero='".$numero."'";
                                        mysqli_query($cnx,$qwery);
                                        $message = " [{$file}] insercion y actualizacion de la base de datos al ingresar el vehiculo	".PHP_EOL;//mensaje al log
                                        error_log($message);
                                        mysqli_close($cnx);
                                        break;
                                      }
                                }
                                echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                            }


                          }else {//mensaje por si no se puede entrar el vehículo por la entrada designada
                            $message = " [{$file}] vehiculo erroneo segun la entrada	".PHP_EOL;//mensaje al log
                           error_log($message);
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                            echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                          }

                        }else {//se constata la entrada por la cual se desea entrar

                          if (strcmp ($vehiculo, "carro" )== 0) {//se verifica que por esta si se pueda ingresar el tipo de vehículo

                            $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                            $r=mysqli_query($cnx,$q);

                            if (mysqli_num_rows($r)==0) {//busqueda en caso de que no hayan puestos
                              $message = " [{$file}] puestos ocupados	".PHP_EOL;//mensaje al log
                              error_log($message);
                              echo "<script>alert('ocupados');</script>";
                              echo '<script>window.location.href="../html/registroEntrada.html";</script>';


                            }else {
                              $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                              $r=mysqli_query($cnx,$q);
                              while ($actor = $r->fetch_assoc()) {//En caso de que haya se encuentra el primero disponible
                                      if (strcmp ($actor['disponible'] , "s" ) == 0) {
                                        $zone=$actor['zona'];
                                        $numero=$actor['numero'];
                                        $place=$actor['entrada'];
                                        //inserta la entrada con la fecha el id la placa y el lugar
                                        $qwery="insert into entrada (id, placa, fecha,zona,numero,entrada,hora) values ('$usu','$pas','$entrada','$zone','$numero','$place','$hour')";
                                        mysqli_query($cnx,$qwery);
                                        //cambia el estado de la zona en la que ya entro a no disponible la cual se identifica con "n"
                                        $qwery="update lugar set disponible ='n' where zona='".$zone."' and numero='".$numero."'";
                                        mysqli_query($cnx,$qwery);
                                        $message = " [{$file}] insercion y actualizacion de la base de datos al ingresar el vehiculo	".PHP_EOL;//mensaje al log
                                        error_log($message);
                                        mysqli_close($cnx);
                                        break;
                                      }
                                }
                                echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                            }

                          }else {//mensaje por si no se puede entrar el vehículo por la entrada designada
                            $message = " [{$file}] vehiculo erroneo segun la entrada	".PHP_EOL;//mensaje al log
                           error_log($message);
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                            echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                          }


                        }




                  }



              }else{//se envía al registro en caso de que ya este registrado
                $message = " [{$file}] ya se encuentra registrado	".PHP_EOL;//mensaje al log
                error_log($message);
                echo "<script>alert('ya está registrado');</script>";
                echo '<script>window.location.href="../html/registro.html";</script>';


              }





				}
			mysqli_close($cnx);
		}
	}
	$u=$_POST['usr'];
	$p=$_POST['pwd'];
  $m=$_POST['sitio'];
  $n=$_POST['vehiculo'];

	frmEntrada::existe($u,$p,$m,$n);
	?>
