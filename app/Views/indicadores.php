<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Indicadores</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <!-- CONTENT -->
        <button class="btn btn-primary">Click me</button>

        <h1>Indicadores</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Unidad de Medida</th>
                <th>Valor</th>
                <th>Fecha</th>
                <th>Tiempo</th>
                <th>Origen</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($indicators as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombreIndicador']; ?></td>
                    <td><?php echo $row['codigoIndicador']; ?></td>
                    <td><?php echo $row['unidadMedidaIndicador']; ?></td>
                    <td><?php echo $row['valorIndicador']; ?></td>
                    <td><?php echo $row['fechaIndicador']; ?></td>
                    <td><?php echo $row['tiempoIndicador']; ?></td>
                    <td><?php echo $row['origenIndicador']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>

