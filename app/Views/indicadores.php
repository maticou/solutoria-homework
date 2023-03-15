<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historic Value of UF</title>
    <meta name="description" content="Historic Value of UF">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/customize-css/styles.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <div class="col-md-12">
                    <button class="btn btn-primary mb-3 me-3" id="show-form-btn">Agregar UF</button>
                    <button class="btn btn-outline-primary mb-3 me-3" id="show-graph-btn">Generar gráfico</button>
                    <form id="add-graph-section" action="/submit-graph" style="display:none;">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Desde</span>
                        <input type="date" class="form-control me-3" id="start-date" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Hasta</span>
                        <input type="date" class="form-control me-3" id="end-date" value="<?= date('Y-m-d') ?>">
                    </div>
                        <button class="btn btn-primary mb-3 me-3" id="submit-btn" type="submit">Crear</button>
                    </form>
                </div>
                <div id="graph-container" style="display: none;">
                    <canvas id="graph"></canvas>
                </div>
                <div class="col-md-12 mt-3" id="add-form-section" style="display:none;">
                    <h2 style="color:#343a40;">Añadir nuevo indicador</h2>
                    <h6 style="color:#6c757d;">¡Recuerde que solo se muestran indicadores con el código UF, los demás se crean y almacenan en la base de datos, pero no se muestran aquí!</h6>
                    <form id="add-form">
                        <div class="form-group">
                            <label for="nombreIndicador" style="color:#343a40;">Nombre Indicador</label>
                            <input type="text" class="form-control" id="nombreIndicador" name="nombreIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="codigoIndicador" style="color:#343a40;">Código Indicador</label>
                            <input type="text" class="form-control" id="codigoIndicador" name="codigoIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="unidadMedidaIndicador" style="color:#343a40;">Unidad de Medida</label>
                            <input type="text" class="form-control" id="unidadMedidaIndicador" name="unidadMedidaIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="valorIndicador" style="color:#343a40;">Valor Indicador</label>
                            <input type="number" class="form-control" id="valorIndicador" step=0.01  name="valorIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaIndicador" style="color:#343a40;">Fecha Indicador</label>
                            <input type="date" class="form-control" id="fechaIndicador" name="fechaIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="tiempoIndicador" style="color:#343a40;">Tiempo Indicador</label>
                            <input type="text" class="form-control" id="tiempoIndicador" name="tiempoIndicador" required>
                        </div>
                        <div class="form-group">
                            <label for="origenIndicador" style="color:#343a40;">Origen Indicador</label>
                            <input type="text" class="form-control" id="origenIndicador" name="origenIndicador" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 my-2">Crear Indicador</button>
                        <button type="button" class="btn btn-secondary my-2" id="show-form-cancel-btn">Cancelar</button>
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
                            <th>Modificar</th>
                            <th>Borrar</th>
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
            
            // Hide add form section when cancel button is clicked
            $('#show-form-cancel-btn').click(function() {
                $('#add-form-section').hide();
            });

            // Show add form section when button is clicked
            $('#show-graph-btn').click(function() {
                $('#add-graph-section').toggle();
            }); 
        });


        $(document).ready(function() {
            // Bind an event listener to the form's submit event
            $('#add-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from being submitted via a page refresh

                // Submit the form using Ajax if client-side validation passes
                $.ajax({
                    type: "POST",
                    url: '/Home/create/',
                    dataType: "json",
                    data: $(this).serialize(),
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

        $(document).ready(function() {
            $('#submit-btn').click(function(event) {
                event.preventDefault(); // prevent form submission

                // get date range from form
                var startDate = $('#start-date').val();
                var endDate = $('#end-date').val();

                // send AJAX request to get data for graph
                $.ajax({
                url: '/Home/graph/' + startDate + '/' + endDate,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var graphData = {
                        labels: data.labels,
                        datasets: [{
                            label: 'UF',
                            data: data.datasets[0].data,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    };
                    var graphOptions = {
                    scales: {
                        y: {
                        beginAtZero: false
                        }
                    }
                    };

                    var graph = new Chart($('#graph'), {
                    type: 'line',
                    data: graphData,
                    options: graphOptions
                    });

                    // show graph and toggle button
                    $('#graph-container').show();
                    $('#submit-btn').show();
                },
                error: function() {
                    alert('An error occurred while fetching data for the graph.');
                }
                });
            });

            // add click event listener to toggle button
            $('#submit-btn').click(function() {
                $('#graph-container').toggle();
            });
        });




    </script>
</body>
    

    

