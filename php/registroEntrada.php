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
                $entrada=date("d") .date("m").date("Y");
                $split=split(““,$pas);
                for($i=0; $i<count($split);$i++){
                }
                  if ($split[$i-1]==$aux) {
                    echo "<script>alert('posee pico y placa');</script>";

                  }else{

                        if (strcmp ($sitio , "vegas" ) == 0) {
                           if (strcmp ($vehiculo, "moto" )== 0) {
                                  $q = "select * from lugar where  disponible ='"s"' and zona ='".$sitio."'";
                                  $r=mysqli_query($cnx,$q);

                                  if (mysqli_num_rows($r)==0) {
                                    echo "<script>alert('ocupados');</script>";

                                  }else {
                                    $q = "select * from lugar where disponible ='"s"' and zona ='".$sitio."'";
                                    $r=mysqli_query($cnx,$q);
                                    while ($actor = $r->fetch_assoc()) {
                                            if (strcmp ($actor['disponible'] , "s" ) == 0) {
                                              $zone=$actor['zona'];
                                              $numero=$actor['numero'];

                                              $qwery="insert into entrada (id, placa, fecha,zona,numero) values ('$nombre','$telefono','$id','$placa','$combustible')";
                                              mysqli_query($cnx,$qwery);
                                              mysqli_close($cnx);
                                              break;
                                            }
                                      }
                                      echo "<script>alert('Registrado en la zona ".$zone." en el lugar ".$numero."');</script>";




                                  }


                           }else {
                             echo "<script>alert('No se pueden registrar carros en este sitio');</script>";
                           }



                        }else if (strcmp ($sitio , "regional1" ) == 0) {
                          if (strcmp ($vehiculo, "carro" )== 0) {



                          }else {
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                          }

                        }else {

                          if (strcmp ($vehiculo, "carro" )== 0) {



                          }else {
                            echo "<script>alert('No se pueden registrar motos en este sitio');</script>";
                          }


                        }




                  }



              }else{

                echo "<script>alert('ya  esta regsitrado');</script>";
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
