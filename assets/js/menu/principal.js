
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: Routing.generate('_ajaxPrincipal'),
        data: "user="+1,
        success: function(response){
            if (response==50) {

                bootbox.alert({
                    message: "Usuario sin Logear, debe logearse para utilizar el sistema",
                    callback: function () {
                        location.href="http://demo.datafact.com.ec/web/logout";
                    }
                })
            }else if(response==0){
                bootbox.alert({
                    message: "Sesi&oacute;n Expirada, cierre esta pesta&ntilde;a e ingrese al sistema nuevamente",
                    callback: function () {
                        location.href="http://demo.datafact.com.ec/web/logout";
                    }
                })
            }

        }
    });
    //alert('Activo');
});


function alertainfo(msj){
    if (msj==1) {
        alerta('Guardado con Exito  ', 'success');
    }else if (msj==2){
        alerta('Modificado con Exito  ', 'info');
    }else if (msj==0){
        alerta('Debe Ingresar Datos Validos ', 'danger');
    }else if (msj==3){
        alerta('Error al ingresar los datos ', 'danger');
    }else if (msj==4){
        alerta('No hay Registros que mostrar ', 'warning');
    }else if (msj==5){
        alerta('Debe Iniciar Sesion, no se guardaron los datos   ', 'danger');
    }else if (msj==6){
        alerta('Datos Actualizados  ', 'info');
    }else if (msj==7){
        alerta('Algunos Elementos de la consulta resultaron vacios, no se agregaron algunos de los pagos, por favor verifique', 'danger');
    }else if (msj==8){
        alerta('Debe Seleccionar un Libretin Valido', 'danger');
    }else if (msj==9){
        alerta('Gestiones realizadas con exito', 'success');
    }else if (msj==10){
        alerta('Error al realizar las gestiones seleccionadas', 'danger');
    }

}

function alertainfowithmsj(msj){
    if (msj!="") {
        alerta(msj, 'success');
    }
}

function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}


