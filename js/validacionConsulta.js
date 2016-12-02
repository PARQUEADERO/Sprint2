

function validacion() {
  valor = document.getElementById("id").value;
  valor2 = document.getElementById("placa").value;
  valor3 = document.getElementById("date").value;
  valor4 = document.getElementById("busqueda").value;


if (valor4=="Reporte de ingreso de una persona en un día") {
  if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ||
         valor2 == null || valor2.length == 0 || /^\s+$/.test(valor2)
         || valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3)) {
    // Si no se cumple la condicion...
    alert('Los campos no pueden ser vacios');


  }  else{

      document.frmConsulta.submit();


    }


}else if (valor4=="Reporte de ingreso de varias personas en un día") {
  if ( valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3)) {
    // Si no se cumple la condicion...
    alert('La fecha es necesaria');


  }  else{

      document.frmConsulta.submit();


    }
}else if (valor4=="cantidad vehículos en un día") {
  if ( valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3)) {
    // Si no se cumple la condicion...
    alert('La fecha es necesaria');


  }  else{

      document.frmConsulta.submit();


    }
}







}
