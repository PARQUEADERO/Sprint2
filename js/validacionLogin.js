

function validacion() {
  valor = document.getElementById("usr").value;
  valor2 = document.getElementById("pwd").value;




  if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ||
         valor2 == null || valor2.length == 0 || /^\s+$/.test(valor2) ) {
    // Si no se cumple la condicion...
    alert('Los campos no pueden ser vacios');


  }

  else{

    document.frmLogin.submit();


  }


}
