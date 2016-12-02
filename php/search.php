<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <style>

    		body{
    		background: url(../img/img2.jpg) no-repeat center center fixed;
    		-webkit-background-size: cover;
    		-moz-background-size: cover;
    		-o-background-size: cover;
    		background-size: cover;
    		}
        img{
      //  margin-left: 350px;

        }
        h3{
          margin-bottom: 20px;
          color: orange;
        }
        th{
          background-color: black;
          color:white;
        }
        td{
          color:black;
        }
        table{

          border-radius: 20px;
        }

        </style>
</head>

<body >
  <?php
  //se reciben los datos de la consulta
  error_reporting(0);
  include_once('./connect.php');
  $cnx=conexion::conectar();

  if (isset($_POST['date'])) {
    $date = $_POST['date'];
  }
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
  }
  if (isset($_POST['placa'])) {
    $placa = $_POST['placa'];
  }
  if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
  }



  ?>
<div class="container">
    <form action="search.php" class="form-horizontal"  name="frmConsulta" method="POST" role="form">
        <fieldset>
          <center>  <legend><font color="black"><div class="page-header">
  <h1>Reportes</small></h1>
</div></font></legend></center>

			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label"><font color="white">Fecha</font></label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="date" id="date" value="" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Escriba su id"  name ="id" id="id" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">Id</span>
            </div>
            <br>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Escriba su placa" name="placa" id="placa" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">Placa</span>
            </div>
            <br>
          <center>  <label for="sel1"><font color="black">Tipo de busqueda</font></label></center>
              <select class="form-control" id="busqueda" name="busqueda">
                <option value="Reporte de ingreso de una persona en un día">Reporte de ingreso de una persona en un día</option>
                <option value="Reporte de ingreso de varias personas en un día">Reporte de ingreso de varias personas en un día</option>
                <option value="cantidad vehículos en un día">cantidad vehículos en un día</option>
              </select>
              <br>
              <center><input type="button" class="btn btn-primary" value="Buscar" onclick="validacion()" /></center>
              <br>

        </fieldset>
    </form>

<?php
//se valida que tipo de busqueda se desea hacer para mostrar diferentes datos
if (strcmp ($busqueda , "Reporte de ingreso de una persona en un día" )== 0) {
  $file = __FILE__;
  $message = " [{$file}] Reporte de ingreso de una persona en un día	".PHP_EOL;//mensaje al log
  error_log($message);
       $q = "select * from entrada where  id ='".$id."' and placa ='".$placa."'  and fecha = '".$date."' ";
       $r=mysqli_query($cnx,$q);
       while ($actor = $r->fetch_assoc()) {
                 echo '<div class="row"> <table class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>Id</th>
                      <th>Placa</th>
                      <th>Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                 ';
                 echo '<tr>';
                 echo '<td>'. $actor['id'] . '</td>';
                 echo '<td>'. $actor['placa'] . '</td>';
                 echo '<td>'. $actor['hora'] . '</td>';
                echo '</tr>';

                echo '</tbody>
            </table> </div>';
         }

     }else if (strcmp ($busqueda , "Reporte de ingreso de varias personas en un día" )== 0) {
       $file = __FILE__;
       $message = " [{$file}] Reporte de ingreso de varias personas en un día".PHP_EOL;//mensaje al log
       error_log($message);
       $q = "select * from entrada where fecha = '".$date."' ";
       $r=mysqli_query($cnx,$q);
       while ($actor = $r->fetch_assoc()) {
                 echo '<div class="row"> <table class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>Id</th>
                      <th>Placa</th>
                      <th>Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                 ';
                 echo '<tr>';
                 echo '<td>'. $actor['id'] . '</td>';
                 echo '<td>'. $actor['placa'] . '</td>';
                 echo '<td>'. $actor['hora'] . '</td>';
                echo '</tr>';

                echo '</tbody>
            </table> </div>';
         }
     }else if (strcmp ($busqueda , "cantidad vehículos en un día" )== 0) {
       $file = __FILE__;
       $message = " [{$file}] cantidad vehículos en un día".PHP_EOL;//mensaje al log
       error_log($message);
       $q = "select * from entrada where   fecha = '".$date."' ";
       $r=mysqli_query($cnx,$q);

       $row_cnt = mysqli_num_rows($r);

       echo '<center><div class="page-header">
  <h1>Número de vehiculos:'.$row_cnt.'</h1>
      </div></center>';
     }



 ?>


</div>

<script type="text/javascript" src="../js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/validacionConsulta.js"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

</body>
</html>
