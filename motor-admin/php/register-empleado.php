<?php
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $connection->real_escape_string($_POST['nombre']);
    $email = $connection->real_escape_string($_POST['email']);
    $dni = $connection->real_escape_string($_POST['dni']);
    $telefono = $connection->real_escape_string($_POST['telefono']);
    $direccion = $connection->real_escape_string($_POST['direccion']);
    $especialidad = $connection->real_escape_string($_POST['especialidad']);
    $valor_hora = $_POST['valor_hora'];
    
    $sql = "INSERT INTO empleado (nombre, email, dni, telefono, direccion, especialidad, valor_hora) 
            VALUES ('$nombre', '$email', '$dni', '$telefono', '$direccion', '$especialidad', '$valor_hora')";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../../motor-admin/ADMINISTRADOR/tabla-usuarios.php?tabla=empleados");
        exit();
    }

    $connection->close();
}


?>