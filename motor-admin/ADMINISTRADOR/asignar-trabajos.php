<?php 
if (!isset($_SESSION)) {
    session_start();
}
        if ($_SESSION['rol']!=='Admin')
        {
          header("Location:../PAGES/inicio.php");
        } 
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handsontable - Hoja de Cálculo Web</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
</head>
<body>
    <?php
        include("../UTILS/sidebar.php");
        include("../connection.php");
        // Obtener lista de clientes
        $clients = mysqli_query($connection, "SELECT id, nombre, patente, modelo FROM usuarios");
        // Obtener lista de empleados
        $employees = mysqli_query($connection, "SELECT id, nombre FROM empleado");
        $queryTrabajos = "
            SELECT 
                trabajos.id,
                usuarios.nombre AS nombre,
                usuarios.patente,
                usuarios.modelo,
                empleado.nombre AS nombre_empleado,
                trabajos.descripcion,
                trabajos.estado,
                trabajos.informe
            FROM trabajos
            JOIN usuarios ON trabajos.id_usuario = usuarios.id
            JOIN empleado ON trabajos.id_empleado = empleado.id
            ORDER BY trabajos.id DESC
        ";
        $resultUsuario = mysqli_query($connection, $queryTrabajos);

        $trabajosActivos = mysqli_query($connection, "
            SELECT trabajos.id, trabajos.id_usuario, trabajos.id_empleado, trabajos.estado, usuarios.patente
            FROM trabajos
            JOIN usuarios ON trabajos.id_usuario = usuarios.id
            WHERE trabajos.estado != 'Finalizado'
        ");

        $listaTrabajos = [];
        while($t = mysqli_fetch_assoc($trabajosActivos)) {
            $listaTrabajos[] = $t;
        }

    ?>
    
    
    <div class="container my-5">
        <h2>Asignar Nuevo Trabajo</h2>
        <form action="../php/guardar-trabajo.php" method="POST"  class="my-5">
            <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <select id="cliente" name="id_usuario" class="form-select" required>
                <option value="">– Seleccioná cliente –</option>
                <?php while($c = mysqli_fetch_assoc($clients)): ?>
                <option value="<?= $c['id'] ?>"
                    data-patente="<?= htmlspecialchars($c['patente']) ?>"
                    data-modelo="<?= htmlspecialchars($c['modelo']) ?>">
                    <?= htmlspecialchars($c['nombre']) ?>
                </option>
                <?php endwhile; ?>
            </select>
            </div>

            <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Patente</label>
                <input id="patente" type="text" class="form-control" readonly>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Modelo</label>
                <input id="modelo" type="text" class="form-control" readonly>
            </div>
            </div>

            <div class="mb-3">
            <label for="empleado" class="form-label">Empleado Asignado</label>
            <select id="empleado" name="id_empleado" class="form-select" required>
                <option value="">– Elegí empleado –</option>
                <?php while($e = mysqli_fetch_assoc($employees)): ?>
                <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
                <?php endwhile; ?>
            </select>
            </div>

            <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción del Trabajo</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Trabajo</button>
        </form>

        <table id="tabla-asignar-trabajo" class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Patente</th>
                    <th>Modelo</th>
                    <th>Empleado Asignado</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Informe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultUsuario)) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nombre']) ?></td>
                        <td><?= htmlspecialchars($row['patente']) ?></td>
                        <td><?= htmlspecialchars($row['modelo']) ?></td>
                        <td><?= htmlspecialchars($row['nombre_empleado']) ?></td>
                        <td><?= htmlspecialchars($row['descripcion']) ?></td>
                        <td>
                            <form method="POST" action="../php/actualizar-estado.php">
                                <input type="hidden" name="id_trabajo" value="<?= $row['id'] ?>">
                                <select name="estado" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="Pendiente" <?= $row['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                    <option value="En progreso" <?= $row['estado'] == 'En progreso' ? 'selected' : '' ?>>En progreso</option>
                                    <option value="Finalizado" <?= $row['estado'] == 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <button 
                                class="btn btn-info btn-sm" 
                                type="button" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalInforme"
                                onclick="abrirModalInforme(<?= $row['id'] ?>, `<?= htmlspecialchars($row['informe'], ENT_QUOTES) ?>`)"
                            >
                                Ver
                            </button>
                            <div class="collapse" id="informe<?= $row['id'] ?>">
                                <div class="card card-body mt-2"><?= nl2br(htmlspecialchars($row['informe'])) ?></div>
                            </div>
                        </td>
                        <td>
                            <a href="editar_trabajo.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_trabajo.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este trabajo?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modalInforme" tabindex="-1" aria-labelledby="modalInformeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form id="formInforme" method="POST" action="../php/guardar-informe.php">
                <div class="modal-header">
                <h5 class="modal-title" id="modalInformeLabel">Informe del Trabajo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id_trabajo" id="modalTrabajoId">
                <div class="mb-3">
                    <label for="informeTexto" class="form-label">Informe</label>
                    <textarea class="form-control" id="informeTexto" name="informe" rows="6" required></textarea>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
    // Llenar patente y modelo según cliente seleccionado
    document.getElementById('cliente').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('patente').value = selected.getAttribute('data-patente') || '';
    document.getElementById('modelo').value = selected.getAttribute('data-modelo') || '';
    });

    function abrirModalInforme(id, informe) {
        document.getElementById('modalTrabajoId').value = id;
        document.getElementById('informeTexto').value = informe;
    }

    const trabajosActivos = <?= json_encode($listaTrabajos) ?>;

    document.querySelector('form[action="../php/guardar-trabajo.php"]').addEventListener('submit', function(e) {
        const idEmpleado = document.getElementById('empleado').value;
        const selectCliente = document.getElementById('cliente');
        const idCliente = selectCliente.value;
        const patente = selectCliente.options[selectCliente.selectedIndex]?.getAttribute('data-patente');

        let empleadoAsignado = false;
        let vehiculoAsignado = false;

        trabajosActivos.forEach(trabajo => {
            if (trabajo.id_empleado === idEmpleado) {
                empleadoAsignado = true;
            }
            if (trabajo.patente === patente) {
                vehiculoAsignado = true;
            }
        });

        if (empleadoAsignado || vehiculoAsignado) {
            let mensaje = "Atención:\n";
            if (empleadoAsignado) mensaje += "- El empleado ya está asignado a un trabajo activo.\n";
            if (vehiculoAsignado) mensaje += "- El vehículo ya está asignado a un trabajo activo.\n";
            mensaje += "¿Deseás continuar de todas formas?";

            if (!confirm(mensaje)) {
                e.preventDefault(); // Cancelar envío
            }
        }
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabla-asignar-trabajo').DataTable({
            order: [[1, 'asc']],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
            });
        });
    </script>
</body>
</html>