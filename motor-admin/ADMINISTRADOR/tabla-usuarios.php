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
        $sqlUsuario = "SELECT * FROM usuarios ORDER BY fecha_registro DESC";
        $resultUsuario = mysqli_query($connection,$sqlUsuario);

        $sqlEmpleado = "SELECT * FROM empleado ORDER BY fecha DESC";
        $resultEmpleado = mysqli_query($connection,$sqlEmpleado);
    ?>
    
    
    <div class="container my-5">
        <div class="mb-3">
            <label for="tablaSelect" class="form-label fw-bold">Seleccionar tabla:</label>
            <select class="form-select" id="tablaSelect">
                <option value="usuarios">Usuarios</option>
                <option value="empleados">Empleados</option>
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
                        <th>Fecha de Registro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultUsuario)) : ?>
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
            <h4 class="mb-3">Registrar nuevo empleado</h4>
            <div class="container my-4">
                <form method="POST" action="../php/register-empleado.php" class="row g-3">
                    <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="col-md-6">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-md-4">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>

                    <div class="col-md-4">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="col-md-4">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>

                    <div class="col-md-6">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                    </div>

                    <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar empleado</button>
                    </div>
                </form>
            </div>
            
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Especialidad</th>
                        <th>Fecha de Registro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultEmpleado)) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['dni']) ?></td>
                            <td><?= htmlspecialchars($row['telefono']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                            <td><?= htmlspecialchars($row['especialidad']) ?></td>
                            <td><?= htmlspecialchars($row['fecha']) ?></td>
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