<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handsontable - Hoja de Cálculo Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
</head>
<body>
    <?php
        include("../UTILS/sidebar.php");
        include("../connection.php");
        $sql = "SELECT * FROM usuarios ORDER BY fecha_registro DESC";
        $result = mysqli_query($connection,$sql);
    ?>
    
    
    <div class="container my-5">
        <div class="mb-3">
            <label for="tablaSelect" class="form-label fw-bold">Seleccionar tabla:</label>
            <select class="form-select" id="tablaSelect">
                <option value="usuarios">Usuarios</option>
                <option value="empleados">Empleados</option>
                <option value="administradores">Administradores</option>
            </select>
        </div>
        <div id="tabla-usuarios" class="table-responsive tabla-content">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Patente</th>
                        <th>Modelo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['dni']) ?></td>
                            <td><?= htmlspecialchars($row['patente']) ?></td>
                            <td><?= htmlspecialchars($row['modelo']) ?></td>
                            <td><?= htmlspecialchars($row['rol']) ?></td>
                            <td><?= htmlspecialchars($row['fecha_registro']) ?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(<?= $row['id'] ?>, '<?= htmlspecialchars($row['nombre']) ?>')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div id="tabla-empleados" class="tabla-content d-none">
            <h4>Tabla de Empleados</h4>
            <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>101</td><td>María</td><td>Mecánico</td></tr>
                <tr><td>102</td><td>Carlos</td><td>Recepcionista</td></tr>
            </tbody>
            </table>
        </div>
    </div>
    <script>
    const tablaSelect = document.getElementById('tablaSelect');
    const tablas = document.querySelectorAll('.tabla-content');

    tablaSelect.addEventListener('change', () => {
        tablas.forEach(tabla => tabla.classList.add('d-none'));
        const tablaActiva = document.getElementById(`tabla-${tablaSelect.value}`);
        tablaActiva.classList.remove('d-none');
    });
    </script>
</body>
</html>