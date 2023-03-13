<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Indicadores</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
            border-radius: 20px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .pagination li {
            list-style-type: none;
            margin-right: 0.5rem;
            border-radius: 20px;
        }

        .pagination li.active a {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            border-radius: 20px;
        }

        .pagination li a {
            color: #007bff;
            border: 1px solid #007bff;
            padding: 0.3rem 0.5rem;
            border-radius: 20px;
        }

        .pagination li.disabled a {
            color: #ccc;
            cursor: default;
            border-radius: 20px;
        }
    </style>

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
        <nav aria-label="...">
          <ul class="pagination justify-content-center rounded">
            <?= $pager->links() ?>
          </ul>
        </nav>
    </div>

    <script
