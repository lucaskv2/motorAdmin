<?php
include '../../connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
    $stmt = $connection->prepare("INSERT INTO especialidades (nombre) VALUES (?)");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
}
header("Location: ../../ADMINISTRADOR/ABM-especialidades.php");
exit;

?>