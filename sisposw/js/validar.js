


function validar() {
    var documento, pass, nombre,expresionC, expresionLetras;
    documento = document.getElementById("documento").value;
    pass = document.getElementById("pass").value;
   // nombre=document.getElementById("nombre").value;
    expresionC=/\w+@+\w+\.+[a-z]/;
    expresionLetras=/[a-z]/;
    
    if (documento === "" || pass === "") {
        alert("El campo esta vacio");
        return false;

    }
    else if (pass.length > 20) {
        alert("Clave Invalida");
        return false;
    }
    else if (documento.length > 11 ||isNaN(documento)) {
        alert(" Documento Invalido ");
        return false;
    }
   /* else if (nombre === "") {
        alert("El nombre esta vacio");
        return false;

    }
    else if (nombre.length >20 || isNaN(documento)) {
        alert("El nombre invalido");
        return false;

    }
    else if(!expresionLetras.test(nombre)){
        alert("El nombre invalido");
        return false;
    }
    */




}

