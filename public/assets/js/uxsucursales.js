
$(document).ready(function () {
	$('#btn-guardar').on('click', function () {
		var SID=$('#xIdUxSucursal').val();
		if(SID>0){
			editaUxSucursal();
		}else{
			submitUxSucursal();
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

function submitUxSucursal() {
	
	const data = {
	guardarUxSucursal:1,
	xIdUxSucursal: $('#xIdUxSucursal').val(),
	xSuc: $('#xSuc').val().trim(),
	xUs: $('#xUs').val().trim(),
	xDef: $('#xDef').val().trim()
    };
	
    

    const errors = validateSucursal(data);

    if (errors.length > 0) {
        alerta(errors.join('<br>'), 'danger');
        return;
    }

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxUxSucursales'),
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

function editaUxSucursal() {
	
	const data = {
	editarUxSucursal:1,
	xIdUxSucursal: $('#xIdUxSucursal').val(),
	xSuc: $('#xSuc').val().trim(),
	xUs: $('#xUs').val().trim(),
	xDef: $('#xDef').val().trim()
    };
	
    

    const errors = validateSucursal(data);

    if (errors.length > 0) {
        alerta(errors.join('<br>'), 'danger');
        return;
    }

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxUxSucursales'),
        data: data,
        success: function (response) {

			if (response.success) {
				alerta('Usuario actualizado correctamente', 'success');
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

function borrarUxSucursal(id) {

    //if (!confirm('¿Está seguro de borrar esta sucursal?')) {
    //    return;
    //}

    $.ajax({
        method: 'POST',
        url: Routing.generate('ajaxUxSucursales'),
        data: {
            borrarUxSucursal: 1,
            xIdUxSucursal: id
        },
        success: function (response) {

            if (response.success) {
                alerta('Usuario eliminado correctamente', 'success');
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

    if (!data.xSuc) errors.push('La Sucursal es obligatoria');
    if (!data.xUs) errors.push('El Usuario es obligatorio');
    if (!data.xDef) errors.push('La Sucursal por defecto es obligatoria');

    return errors;
}
