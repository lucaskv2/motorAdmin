<?php
include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $stmt = $connection->prepare("UPDATE servicios SET nombre = ? WHERE id = ?");
    $stmt->bind_param("si", $nombre, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: ../../ADMINISTRADOR/ABM-servicios.php");
    exit();
}
?>

