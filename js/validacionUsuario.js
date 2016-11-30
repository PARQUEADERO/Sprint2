

function validacion() {
  valor = document.getElementById("telefono").value;
  valor2 = document.getElementById("placa").value;
  valor3 = document.getElementById("id").value;
  valor4 = document.getElementById("nombre").value;
  valor6 = document.getElementById("color").value;
    var err = document.getElementById('error');



  if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ||
         valor2 == null || valor2.length == 0 || /^\s+$/.test(valor2) ||
        valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3) ||
       valor4 == null || valor4.length == 0 || /^\s+$/.test(valor4) ||
        valor6 == null || valor6.length == 0 || /^\s+$/.test(valor6) ) {
    // Si no se cumple la condicion...
    alert('Los campos no pueden ser vacios');


  }else if( isNaN(valor)){
    alert('Valores inválidos en el teléfono');


  }else if(!isNaN(valor6) || !isNaN(valor4) ){

    alert('Los campos de marca , nombre y color no pueden ser númericos');

  }

  else{

    document.frmRegistro.submit();


  }


}
