<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historic Value of UF</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/customize-css/styles.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center mt-3 mb-5">Valor histórico de la UF</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <h1>Indicadores</h1>
                <div class="col-md-12">
                    <button class="btn btn-primary mb-3"  id="show-form-btn">Agregar UF</button>
                </div>
                <div class="col-md-12 mt-3" id="add-form-section" style="display:none;">
                    <h1>Create Indicador</h1>
                    <form id="add-form">
                        <div class="form-group">
                            <label for="nombreIndicador">Nombre Indicador</label>
                            <input type="text" class="form-control" id="nombreIndicador" name="nombreIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="codigoIndicador">Código Indicador</label>
                            <input type="text" class="form-control" id="codigoIndicador" name="codigoIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="unidadMedidaIndicador">Unidad de Medida</label>
                            <input type="text" class="form-control" id="unidadMedidaIndicador" name="unidadMedidaIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="valorIndicador">Valor Indicador</label>
                            <input type="number" class="form-control" id="valorIndicador" name="valorIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaIndicador">Fecha Indicador</label>
                            <input type="date" class="form-control" id="fechaIndicador" name="fechaIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="tiempoIndicador">Tiempo Indicador</label>
                            <input type="text" class="form-control" id="tiempoIndicador" name="tiempoIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="origenIndicador">Origen Indicador</label>
                            <input type="text" class="form-control" id="origenIndicador" name="origenIndicador" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear Indicador</button>
                    </form>
                </div>
                
                <table class="table table-bordered table-hover" id="table-body">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Unidad de Medida</th>
                            <th>Valor</th>
                            <th>Fecha</th>
                            <th>Tiempo</th>
                            <th>Origen</th>
                            <th>Modificar</th> <!-- Edit button column -->
                            <th>Borrar</th> <!-- Delete button column -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($indicators as $row) { ?>
                            <tr>
                                <td><?php echo $row['nombreIndicador']; ?></td>
                                <td><?php echo $row['codigoIndicador']; ?></td>
                                <td><?php echo $row['unidadMedidaIndicador']; ?></td>
                                <td><?php echo $row['valorIndicador']; ?></td>
                                <td><?php echo $row['fechaIndicador']; ?></td>
                                <td><?php echo ($row['tiempoIndicador'] == null ? '-' : $row['tiempoIndicador']); ?></td>
                                <td><?php echo $row['origenIndicador']; ?></td>
                                <td><button class="btn btn-warning edit-btn" data-id="<?php echo $row['id']; ?>">Editar</button></td>
                                <td>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this)">
                                        <i class="fas fa-trash">Borrar</i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="edit-row" style="display:none;">
                                <td colspan="8">
                                    <form class="edit-form" data-id="<?php echo $row['id']; ?>">
                                        <input type="text" name="nombreIndicador" value="<?php echo $row['nombreIndicador']; ?>">
                                        <input type="text" name="codigoIndicador" value="<?php echo $row['codigoIndicador']; ?>">
                                        <input type="text" name="unidadMedidaIndicador" value="<?php echo $row['unidadMedidaIndicador']; ?>">
                                        <input type="text" name="valorIndicador" value="<?php echo $row['valorIndicador']; ?>">
                                        <input type="text" name="fechaIndicador" value="<?php echo $row['fechaIndicador']; ?>">
                                        <input type="text" name="tiempoIndicador" value="<?php echo $row['tiempoIndicador']; ?>">
                                        <input type="text" name="origenIndicador" value="<?php echo $row['origenIndicador']; ?>">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary cancel-btn">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination justify-content-center rounded">
                        <?= $pager->links() ?>
                    </ul>
                </nav>
			</div>
		</div>
	</div>

    <script>
        $(document).ready(function() {
            // Show add form section when button is clicked
            $('#show-form-btn').click(function() {
                $('#add-form-section').toggle();
            });            
        });


        $(document).ready(function() {
            // Add client-side validation to the form
            $('#add-form').validate({
                rules: {
                    nombreIndicador: {
                        required: true,
                        maxlength: 37
                    },
                    codigoIndicador: {
                        required: true,
                        maxlength: 14
                    },
                    unidadMedidaIndicador: {
                        required: true,
                        maxlength: 10
                    },
                    valorIndicador: {
                        required: true,
                        number: true
                    },
                    fechaIndicador: {
                        required: true,
                        date: true
                    },
                    tiempoIndicador: {
                        maxlength: 30
                    },
                    origenIndicador: {
                        required: true,
                        maxlength: 13
                    }
                },
                messages: {
                    nombreIndicador: {
                        required: "Por favor ingrese el nombre del indicador",
                        maxlength: "El nombre del indicador debe tener menos de 37 caracteres"
                    },
                    codigoIndicador: {
                        required: "Por favor ingrese el código del indicador",
                        maxlength: "El código del indicador debe tener menos de 14 caracteres"
                    },
                    unidadMedidaIndicador: {
                        required: "Por favor ingrese la unidad de medida",
                        maxlength: "La unidad de medida debe tener menos de 10 caracteres"
                    },
                    valorIndicador: {
                        required: "Por favor ingrese el valor del indicador",
                        number: "El valor del indicador debe ser un número"
                    },
                    fechaIndicador: {
                        required: "Por favor ingrese la fecha del indicador",
                        date: "La fecha del indicador debe tener el formato yyyy-mm-dd"
                    },
                    tiempoIndicador: {
                        maxlength: "El tiempo del indicador debe tener menos de 30 caracteres"
                    },
                    origenIndicador: {
                        required: "Por favor ingrese el origen del indicador",
                        maxlength: "El origen del indicador debe tener menos de 13 caracteres"
                    }
                },
                // Submit the form using Ajax if client-side validation passes
                submitHandler: function(form) {
                    $.ajax({
                        type: "POST",
                        url: '/Home/create/',
                        dataType: "json",
                        data: $('#add-form').serialize(),
                        success: function(response) {
                            if (response.success) {
                                alert("Indicador creado exitosamente.");
                                location.reload();
                            } else {
                                alert("Error al crear el indicador.");
                            }
                        },
                        error: function() {
                            alert("Error al crear el indicador.");
                        }
                    });
                }
            });
        });


        $(document).ready(function() {
            var form;

            $('.edit-btn').on('click', function() {
                $(this).closest('tr').next('.edit-row').slideToggle();
            });

            $('.edit-form').submit(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var data = $(this).serialize();
                form = $(this); // Store the form element in the higher scope
                $.ajax({
                    url: '/Home/update/' + id,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        alert('An error occurred while updating the row.');
                    }
                });
            });

            $('.cancel-btn').on('click', function() {
                var form = $(this).closest('form');
                var id = form.data('id');
                var displayRow = $('tr[data-id="' + id + '"]').prev();
                displayRow.toggle();
                form.closest('tr').toggle();
            });
        });

        function confirmDelete(button) {
            if (confirm("Are you sure you want to delete this record?")) {
                let id = button.getAttribute("data-id");
                $.ajax({
                type: "POST",
                url: '/Home/delete/' + id,
                success: function() {
                    window.location.reload();
                },
                error: function() {
                    alert("An error occurred while deleting the record.");
                }
                });
            }
        }
    </script>
</body>
    

    

