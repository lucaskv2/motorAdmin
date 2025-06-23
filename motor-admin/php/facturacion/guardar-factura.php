<?php
include("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trabajo = intval($_POST['id_trabajo']);
    $subtotal = floatval($_POST['subtotal']);
    $iva = $subtotal * 0.21;
    $total = $subtotal + $iva;
    $fecha_emision = date('Y-m-d');

    $query = "INSERT INTO facturas (id_trabajo, fecha_emision, subtotal, iva, total, estado_pago)
              VALUES (?, ?, ?, ?, ?, 'Pendiente')";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("issdd", $id_trabajo, $fecha_emision, $subtotal, $iva, $total);
    $stmt->execute();

    header("Location: ../../ADMINISTRADOR/facturacion.php?success=1");
    exit();
}
?>
