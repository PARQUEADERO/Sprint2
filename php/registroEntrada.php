<?php
    error_reporting(0);
	include("./connect.php");
	class frmEntrada{
		static function existe($usu,$pas,$sitio,$vehiculo){
      //mirar si esta regsitrado el vshiculo
			$cnx=conexion::conectar();
			$q = "select * from registro where id= '". $usu ."' and placa ='". $pas . "'";
			$r=mysqli_query($cnx,$q);
      $aux=2;
			if(mysqli_num_rows($r)==0){

        echo '<script>window.location.href="../html/registro.html";</script>';


				}else{
          //mirar si ya se encuentra regisrado en la entrada
              $cnx=conexion::conectar();
              $q = "select * from entrada where id= '". $usu ."' and placa ='". $pas . "'";
              $r=mysqli_query($cnx,$q);

              if (mysqli_num_rows($r)==0) {
                $entrada=date("d") .'/'.date("m").'/'.date("Y");

                $hour=date("H:i");

                $split=split(““,$pas);
                for($i=0; $i<count($split);$i++){
                }
                  if ($split[$i-1]==$aux) {
                    echo "<script>alert('posee pico y placa');</script>";
                    echo '<script>window.location.href="../html/registro.html";</script>';

                  }else{

                        if (strcmp ($sitio , "regional1" ) == 0) {
                           if (strcmp ($vehiculo, "moto" )== 0) {
                                  $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                                  $r=mysqli_query($cnx,$q);

                                  if (mysqli_num_rows($r)==0) {
                                    echo "<script>alert('ocupados');</script>";
                                    echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                                  }else {
                                    $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                                    $r=mysqli_query($cnx,$q);
                                    while ($actor = $r->fetch_assoc()) {
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

                                              mysqli_close($cnx);
                                              break;
                                            }
                                      }
                                      echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                      echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                                  }


                           }else {
                             echo "<script>alert('No se pueden registrar carros en este sitio');</script>";
                             echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                           }



                        }else if (strcmp ($sitio , "regional2" ) == 0) {
                          if (strcmp ($vehiculo, "carro" )== 0) {
                            $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                            $r=mysqli_query($cnx,$q);

                            if (mysqli_num_rows($r)==0) {
                              echo "<script>alert('ocupados');</script>";
                              echo '<script>window.location.href="../html/registroEntrada.html";</script>';


                            }else {
                              $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                              $r=mysqli_query($cnx,$q);
                              while ($actor = $r->fetch_assoc()) {
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

                                        mysqli_close($cnx);
                                        break;
                                      }
                                }
                                echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                            }


                          }else {
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                            echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                          }

                        }else {

                          if (strcmp ($vehiculo, "carro" )== 0) {

                            $q = "select * from lugar where  disponible ='s' and entrada ='".$sitio."'";
                            $r=mysqli_query($cnx,$q);

                            if (mysqli_num_rows($r)==0) {
                              echo "<script>alert('ocupados');</script>";
                              echo '<script>window.location.href="../html/registroEntrada.html";</script>';


                            }else {
                              $q = "select * from lugar where disponible ='s' and entrada ='".$sitio."'";
                              $r=mysqli_query($cnx,$q);
                              while ($actor = $r->fetch_assoc()) {
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

                                        mysqli_close($cnx);
                                        break;
                                      }
                                }
                                echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";
                                echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                            }

                          }else {
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                            echo '<script>window.location.href="../html/registroEntrada.html";</script>';

                          }


                        }




                  }



              }else{

                echo "<script>alert('no  esta regsitrado');</script>";
                echo '<script>window.location.href="../html/registroEntrada.html";</script>';


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
