<?php
if (!isset($_SESSION)) {
    session_start();
}
// Verificar si la sesión está activa y el rol es 'Admin'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Admin') {
    header("Location: ../PAGES/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén de Contactos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer+0wPthOhA8rsVjQerV_D3B3z_oB-4o5uG0i3F_M4hK2f" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/index.css">    
</head>

<body>
    <?php
    include '../connection.php';
    include("../UTILS/sidebar.php");
    // Buscar trabajos finalizados
    $queryTrabajosFinalizados = "SELECT t.id, u.nombre
            FROM trabajos t 
            JOIN usuarios u ON t.id_usuario = u.id 
            WHERE t.estado = 'Finalizado'";
    $resultTrabajosFinalizados = mysqli_query($connection, $queryTrabajosFinalizados);
    ?>
    <div class="container mt-5">
        <h2>Generar Nueva Factura</h2>
        <form action="../php/facturacion/guardar-factura.php" method="POST">
            <div class="mb-3">
                <label for="id_trabajo" class="form-label">Trabajo finalizado</label>
                <select class="form-select" name="id_trabajo" required>
                    <option value="">Seleccionar</option>
                    <?php while ($row = mysqli_fetch_assoc($resultTrabajosFinalizados)) { ?>
                        <option value="<?= $row['id'] ?>">
                            #<?= $row['id'] ?> - <?= $row['nombre']?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="subtotal" class="form-label">Subtotal</label>
                <input type="number" name="subtotal" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Emitir Factura</button>
        </form>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Facturas Emitidas</h2>
        <table id="tablaFacturas" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trabajo</th>
                    <th>Fecha de emisión</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Estado de pago</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM facturas";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['id_trabajo']}</td>
                            <td>{$row['fecha_emision']}</td>
                            <td>$ {$row['subtotal']}</td>
                            <td>$ {$row['iva']}</td>
                            <td>$ {$row['total']}</td>";

                    echo "<td>";
                    if ($row['estado_pago'] === 'Pendiente') {
                        echo "
                        <button type='button' class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#modalPago{$row['id']}'>
                            Marcar Pagado
                        </button>

                        <!-- Modal -->
                        <div class='modal fade' id='modalPago{$row['id']}' tabindex='-1' aria-labelledby='modalPagoLabel{$row['id']}' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <form action='../php/facturacion/cambiar-estado.php' method='POST'>
                                <div class='modal-header'>
                                <h5 class='modal-title' id='modalPagoLabel{$row['id']}'>Confirmar Pago</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                                </div>
                                <div class='modal-body'>
                                ¿Estás seguro que querés marcar como <strong>Pagada</strong> la factura <strong>#{$row['id']}</strong>?
                                </div>
                                <div class='modal-footer'>
                                <input type='hidden' name='id_factura' value='{$row['id']}'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                <button type='submit' class='btn btn-success'>Sí, marcar como pagada</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        ";
                    }
                    else {
                        echo "<span class='badge bg-success'>Pagado</span>";
                    }
                    echo "</td>";

                    echo "<td><a href='../facturas/{$row['archivo_pdf']}' target='_blank'>Ver PDF</a></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tablaFacturas').DataTable();
        });
    </script>
</body>
</html>



