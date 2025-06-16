<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Admin') {
    header("Location: ../PAGES/inicio.php");
    exit();
}
?>
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
        $sqlEmpleado = "SELECT * FROM empleado ORDER BY fecha DESC";
        $resultEmpleado = mysqli_query($connection,$sqlEmpleado);

        $sqlUsuario = "SELECT * FROM usuarios ORDER BY fecha_registro DESC";
        $resultUsuario = mysqli_query($connection,$sqlUsuario);
    ?>
    
    
    <div class="container my-5">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                El empleado ha sido eliminado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ha ocurrido un error al eliminar el empleado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="tablaSelect" class="form-label fw-bold">Seleccionar tabla:</label>
            <select class="form-select" id="tablaSelect">
                <option value="usuarios">Usuarios</option>
                <option value="empleados">Empleados</option>
            </select>
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
            
            <table class="table table-bordered table-hover align-middle" id="tabla-empleado">
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
                                        onclick="confirmDelete(<?= $row['id'] ?>, '<?= htmlspecialchars($row['nombre']) ?>', 'empleado')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="tabla-usuarios" class="table-responsive tabla-content">
            <table id="tabla-usuario" class="table table-bordered table-hover align-middle">
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
                                        onclick="confirmDelete(<?= $row['id'] ?>, '<?= htmlspecialchars($row['nombre']) ?>', 'user')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteEmpleado()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="successMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.reload()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    const tablaSelect = document.getElementById('tablaSelect');
    const tablas = document.querySelectorAll('.tabla-content');

    tablaSelect.addEventListener('change', () => {
        tablas.forEach(tabla => tabla.classList.add('d-none'));
        const tablaActiva = document.getElementById(`tabla-${tablaSelect.value}`);
        tablaActiva.classList.remove('d-none');
    });
        $(document).ready(function () {
            $('#tabla-usuario').DataTable({
            order: [[1, 'asc']], 
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
            });
        });

        $(document).ready(function () {
            $('#tabla-empleado').DataTable({
            order: [[1, 'asc']], 
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
            });
        });
    </script>

    

    <script>
    let currentDeleteId = null;
    let currentDeleteName = null;
    let isUser = false;

    function confirmDelete(id, nombre, type) {
        currentDeleteId = id;
        currentDeleteName = nombre;
        isUser = type === 'user';
        document.getElementById('deleteMessage').textContent = `¿Desea quitar a ${nombre} de esta lista?`;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    function deleteEmpleado() {
        if (!currentDeleteId) return;

        const formData = new FormData();
        formData.append('id', currentDeleteId);

        const url = isUser ? '../php/eliminar_usuario.php' : '../php/eliminar_empleado.php';

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Cerrar el modal de confirmación
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            deleteModal.hide();

            // Mostrar el modal de éxito
            document.getElementById('successMessage').textContent = isUser ? 
                "El usuario ha sido eliminado correctamente" : 
                data.message;
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar');
        });
    }
    </script>
</body>
</html>