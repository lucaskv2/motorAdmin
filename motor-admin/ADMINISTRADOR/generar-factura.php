<?php
include("../connection.php");

// Buscar trabajos finalizados
$query = "SELECT t.id, u.nombre
          FROM trabajos t 
          JOIN usuarios u ON t.id_usuario = u.id 
          WHERE t.estado = 'Finalizado'";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Generar Nueva Factura</h2>
        <form action="guardar-factura.php" method="POST">
            <div class="mb-3">
                <label for="id_trabajo" class="form-label">Trabajo finalizado</label>
                <select class="form-select" name="id_trabajo" required>
                    <option value="">Seleccionar</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
</body>
</html>
