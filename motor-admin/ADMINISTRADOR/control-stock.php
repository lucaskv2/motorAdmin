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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"], $_POST["cantidad"])) {
    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];
    $sql_update = "UPDATE stock SET cantidad = ? WHERE id = ?";
    $stmt = $connection->prepare($sql_update);
    $stmt->bind_param("ii", $cantidad, $id);
    $stmt->execute();
}

$sql = "SELECT * FROM stock ORDER BY id ASC";
$result = mysqli_query($connection, $sql);
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Stock de Productos</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Producto</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['nombre_producto']) ?></td>
                        <td><?= htmlspecialchars($row['marca']) ?></td>
                        <td>
                            <form method="POST" class="d-flex align-items-center">
                                <input type="number" name="cantidad" class="form-control me-2" value="<?= $row['cantidad'] ?>" min="0">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                            </form>
                        </td>
                        <td>$<?= number_format($row['precio_unitario'], 2, ',', '.') ?></td>
                        <td>
                            <form method="POST" action="../php/eliminar_producto.php" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>