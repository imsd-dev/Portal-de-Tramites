var numero = 1;

function validarRUT00(obj, mostrar)
{

    vlrRUTCERO = new String('00000000000000');
    vlrRut = new String(obj.value);
    if (vlrRut.length > 0)
    {
        vlrRut = vlrRut.replace(/[.]+/g, "");    					//reemplaza puntos...
        vlrRut = vlrRut.replace(/[-]+/g, "");    					//reemplaza guiones...

        var lenRut = vlrRut.length;
        vlrRUTCERO = vlrRUTCERO.substr(0, lenRut);

        if (vlrRut == vlrRUTCERO)
        {
            if (mostrar == true)
                alert('RUT del destinatario ' + obj.value + ' no es valido.');

            obj.value = "";
            obj.focus();
            return false;
        }
    }
    return true;

}

function esRutTEF(campo, nombre, alertas, vacio, autofoco, version)
{
    campo.value = campo.value.replace(/[ ]+/g, "");    					//realiza un rtrim...
    campo.value = campo.value.replace(/[.]+/g, "");    					//reemplaza puntos...
    campo.value = campo.value.replace(/[-]+/g, "");    					//reemplaza guiones...

    if (campo.value == "" && !vacio) {
        return true;
    }

    if (campo.value == "") {
        if (alertas) {
            alert("Debe ingresar un valor en el campo " + nombre + ".");
        }
        if (autofoco)
            campo.focus();
        return false;
    }


    if (/^\d+(K)*$/.test(campo.value))	//valida el email
    {
        cuerpoRut = campo.value.substring(0, campo.value.length - 1);
        digitoVerificador = campo.value.substring(campo.value.length - 1, campo.value.length);
        if (esRutValido(cuerpoRut, digitoVerificador))
        {
            cuerpoRut = formateaMiles(cuerpoRut, '.');
            campo.value = cuerpoRut + "-" + digitoVerificador;
            return true;
        } else {

            if ((alertas) && (numero == 1)) {
                alert("Debe ingresar un " + nombre + " válido.");
                campo.focus();
                if (version != '0') {
                    numero++;
                }
                return false;
            }

            if ((numero == 2))
                numero = 1;
            //if (autofoco) campo.focus();
            //return false;
        }
    } else {
        if (alertas) {
            alert("Debe ingresar un " + nombre + " válido.");
            return false;
        }
        //if (autofoco) campo.focus();
        return false;
    }

}

function esRut(campo, nombre, alertas, vacio, autofoco)
{
    campo.value = campo.value.replace(/[ ]+/g, "");    					//realiza un rtrim...
    campo.value = campo.value.replace(/[.]+/g, "");    					//reemplaza puntos...
    campo.value = campo.value.replace(/[-]+/g, "");    					//reemplaza guiones...

    if (campo.value == "" && !vacio) {
        return true;
    }

    if (campo.value == "") {
        if (alertas)
        {
            alert("Debe ingresar un valor en el campo " + nombre + ".");
        }
        if (autofoco)
            campo.focus();
        return false;
    }

    if (/^\d+(K)*$/.test(campo.value)) {
        cuerpoRut = campo.value.substring(0, campo.value.length - 1);
        digitoVerificador = campo.value.substring(campo.value.length - 1, campo.value.length);
        if (esRutValido(cuerpoRut, digitoVerificador)) {
            cuerpoRut = formateaMiles(cuerpoRut, '.');
            campo.value = cuerpoRut + "-" + digitoVerificador;
            return true;
        } else {
            if (alertas) {
                alert("Debe ingresar un " + nombre + " válido.");
            }
            if (autofoco)
                campo.focus();
            return false;
        }
    } else {
        if (alertas) {
            alert("Debe ingresar un " + nombre + " válido.");
        }
        if (autofoco)
            campo.focus();
        return false;
    }
}

function esRutValido(cuerpo, digito) {
    intSuma = 0;
    intFactor = 2;

    for (i = (cuerpo.length - 1); i >= 0; i--) {
        intSuma = intSuma + cuerpo.charAt(i) * intFactor;
        if (intFactor == 7)
            intFactor = 2;
        else
            intFactor++;
    }

    intResto = intSuma % 11;
    if (intResto == 1)
        dvr = 'K';
    else if (intResto == 0)
        dvr = '0';
    else {
        dvi = 11 - intResto;
        dvr = dvi + "";
    }

    if (dvr == digito) {
        return true;
    } else {
        return false;
    }
}

function formateaMiles(numero, separador) {
    //alert('numero'+numero);

    if (separador == '') {
        return numero.replace(/[.]+/g, '');
    } else if (numero.length > 3) {
        return formateaMiles(numero.substring(0, numero.length - 3), separador) + separador + "" + numero.substring(numero.length - 3, numero.length);
    } else
        return numero;
}

function SoloDigito(caracter) {
    var aux = window.Event ? true : false;
    var key = aux ? caracter.which : caracter.keyCode;
    if ((key < 48 || key > 57) && key != 8 && key != 0 && key != 22 && key != 13) {
        return false;
    }
} 
