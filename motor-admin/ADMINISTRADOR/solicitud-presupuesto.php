<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handsontable - Hoja de Cálculo Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?php
    include("../UTILS/sidebar.php");
    include("../connection.php");

    $sql = "SELECT * FROM consultas ORDER BY fecha DESC";
    $result = $connection->query($sql);
    
    ?>
    <div class="container my-5">
    <h2 class="text-center mb-4">Consultas Recibidas</h2>
    <div class="table-responsive">
        <table id="tabla-consultas" class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Servicio</th>
            <th>Mensaje</th>
            <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["nombre"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["servicio"]) ?></td>
                <td><?= nl2br(htmlspecialchars($row["mensaje"])) ?></td>
                <td><?= $row["fecha"] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    </div>

    <!-- DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#tabla-consultas').DataTable({
        order: [[1, 'asc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
        });
    });
    </script>
</body>
</html>