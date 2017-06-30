function check(persona,mod) {
    var cedula = document.getElementById('ced'+persona+'').value;
    var fecha = document.getElementById('fechaEmpleado');
    if(mod){
        cedula = document.getElementById('cedMod'+persona+'').value;
        fecha = document.getElementById('fechaModEmpleado');
    }
    if(persona==='Empleado'){
        var fechaEscogida = "" + fecha.value;
        var valFecha = fechaEscogida.split("-");
        var fechaActual = new Date();
        var x=new Date();
        x.setFullYear(valFecha[0],valFecha[1]-1,valFecha[2]);
        if(x>fechaActual || valFecha[0]<2000){
            $.toaster({ priority : 'danger', title : 'Error', message : 'Fecha mayor a la actual o menor al año 2000'});
            return false;
        }
    }
    var cedulaValida = verificarCedula(cedula + "");
    if (!cedulaValida) {
        $.toaster({ priority : 'danger', title : 'Error', message : 'Cédula / RUC Inválido'});
        return false;
    }
    return true;
}

function esDigito() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(cod);
    if (caracter >= 0 && caracter <= 9 && caracter!==" ") {
        return true;
    }
    return false;
}

function esLetra() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(cod);
    if (caracter >= 'a' && caracter <= 'z' || caracter >= 'A' && caracter <= 'Z' || caracter==='ñ' || caracter==='Ñ' || caracter===" "
           || caracter==='Á' || caracter==='É' || caracter==='Í' || caracter==='Ó' || caracter==='Ú' || caracter==='á' || caracter==='é'
           || caracter==='í' || caracter==='ó' || caracter==='ú') {
        return true;
    }
    return false;
}

function verificarCedula(cedula) {
    var digitos = cedula.split("");
    var a = new Array();
    var c1 = 0, c2 = 0, d, e, f = 0;
    for (var i = 0; i < 9; i++) {
        a[i] = parseInt(digitos[i]);
        if (i % 2 === 0) {
            d = a[i] * 2;
            if (d < 9) {
                c1 += d;
            } else {
                c1 += d - 9;
            }
        } else {
            d = a[i];
            c2 += d;
        }
    }
    e = c1 + c2;
    for (var j = 10; j <= 60; j = j + 10) {
        if (e <= j) {
            f = j - e;
            break;
        }
    }
    
    if(digitos.length===10){
        return parseInt(digitos[9]) === f;
    }else if(digitos.length===13){
        return parseInt(digitos[9])===f && digitos[10]==='0' && digitos[11]==='0' && digitos[12]==='1';
    }
    return parseInt(digitos[9]) === f;
}