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
include("../UTILS/header-pages.php");
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
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar nuevo producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="agregar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="agregar">Agregar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="../php/agregar_producto.php" method="POST">
            <div class="col-md-6">
                <input name="Nombre" type="text" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input name="Marca" type="text" class="form-control" placeholder="Marca" required>
            </div>
            <div class="col-md-6">
                <input name="Cantidad" type="number" class="form-control" placeholder="Cantidad">
            </div>
            <div class="col-md-6">
                <input name="Precio" type="number" class="form-control" placeholder="Precio">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5">Enviar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
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

<?php include("../UTILS/footer.php"); ?>


<script>
    const btnAbrir=document.querySelector("btnAbrir");
    btnAbrir.addEventListener("click",()=>{})
</script>
</body>
</html>