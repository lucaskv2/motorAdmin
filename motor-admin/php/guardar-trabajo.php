<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_usuario = intval($_POST['id_usuario']);
  $id_empleado = intval($_POST['id_empleado']);
  $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);

  $sql = "INSERT INTO trabajos (id_usuario, id_empleado, descripcion)
          VALUES ($id_usuario, $id_empleado, '$descripcion')";

  if (mysqli_query($connection, $sql)) {
    header("Location: ../ADMINISTRADOR/asignar-trabajos.php");
    exit;
  } else {
    echo "Error: " . mysqli_error($connection);
  }
}
?>
