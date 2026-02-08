
$(document).ready(function () {
	$('#btn-guardar').on('click', function () {
		var SID=$('#xIdSucursal').val();
		if(SID>0){
			editaSucursal();
		}else{
			submitSucursal();
		}
        
    });
    $('#tablaSucursales').DataTable({
        language: {
            url: Routing.getBaseUrl() + '/assets/js/es.json'
        },
        pageLength: 10,
        ordering: true,
        responsive: true
    });
});

function submitSucursal() {
	
	const data = {
	guardarSucursal:1,
	xIdSucursal: $('#xIdSucursal').val(),
	xEmisor: $('#emisor').val().trim(),
	xRuc: $('#ruc').val().trim(),
	xMatriz: $('#matriz').val().trim(),
	xSucursal: $('#sucursal').val().trim(),
	xCorreo: $('#correo').val().trim(),
	xTelefono: $('#telefono').val().trim(),
	xContabilidad: $('#lleva_cont').val(),
	xEstado: $('#estado').val()
    };
	
    

    const errors = validateSucursal(data);

    if (errors.length > 0) {
        alerta(errors.join('<br>'), 'danger');
        return;
    }

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxSucursales'),
        data: data,
        success: function (response) {

			if (response.success) {
				alerta(response.message, 'success');
				location.reload();
			} else {
				alerta(response.message || 'Error inesperado', 'danger');
			}

		},
        error: function () {
            alerta('Error de comunicación con el servidor', 'danger');
        }
    });
}

function editaSucursal() {
	
	const data = {
	editarSucursal:1,
	xIdSucursal: $('#xIdSucursal').val(),
	xEmisor: $('#emisor').val().trim(),
	xRuc: $('#ruc').val().trim(),
	xMatriz: $('#matriz').val().trim(),
	xSucursal: $('#sucursal').val().trim(),
	xCorreo: $('#correo').val().trim(),
	xTelefono: $('#telefono').val().trim(),
	xContabilidad: $('#lleva_cont').val(),
	xEstado: $('#estado').val()
    };
	
    

    const errors = validateSucursal(data);

    if (errors.length > 0) {
        alerta(errors.join('<br>'), 'danger');
        return;
    }

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxSucursales'),
        data: data,
        success: function (response) {

			if (response.success) {
				alerta('Sucursal actualizada correctamente', 'success');
				window.open(response.message, "_self");
			} else {
				alerta(response.message || 'Error inesperado', 'danger');
			}

		},
        error: function () {
            alerta('Error de comunicación con el servidor', 'danger');
        }
    });
}

function borrarSucursal(id) {

    //if (!confirm('¿Está seguro de borrar esta sucursal?')) {
    //    return;
    //}

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxSucursales'),
        data: {
            borrarSucursal: 1,
            xIdSucursal: id
        },
        success: function (response) {

            if (response.success) {
                alerta('Sucursal eliminada correctamente', 'success');
                location.reload();
            } else {
                alerta(response.message || 'Error inesperado', 'danger');
            }

        },
        error: function () {
            alerta('Error de comunicación con el servidor', 'danger');
        }
    });
}


function validateSucursal(data) {
    let errors = [];

    if (!data.xEmisor) errors.push('El emisor es obligatorio');
    if (!data.xRuc) errors.push('El RUC es obligatorio');
    if (!data.xSucursal) errors.push('El nombre de la sucursal es obligatorio');

    if (data.xCorreo && !data.xCorreo.includes('@')) {
        errors.push('Correo electrónico inválido');
    }

    return errors;
}
