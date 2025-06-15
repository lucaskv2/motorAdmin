<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_usuario = intval($_POST['id_usuario']);
  $id_empleado = intval($_POST['id_empleado']);
  $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);
  $estado = mysqli_real_escape_string($connection, $_POST['estado']);

  $sql = "INSERT INTO trabajos (id_usuario, id_empleado, descripcion, estado)
          VALUES ($id_usuario, $id_empleado, '$descripcion', '$estado')";

  if (mysqli_query($connection, $sql)) {
    header("Location: ../ADMINISTRADOR/asignar-trabajos.php");
    exit;
  } else {
    echo "Error: " . mysqli_error($connection);
  }
}
?>
