<?php
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $connection->real_escape_string($_POST['nombre']);
    $email = $connection->real_escape_string($_POST['email']);
    $dni = $connection->real_escape_string($_POST['dni']);
    $telefono = $connection->real_escape_string($_POST['telefono']);
    $direccion = $connection->real_escape_string($_POST['direccion']);
    $especialidad = $connection->real_escape_string($_POST['especialidad']);
    
    
    $sql = "INSERT INTO empleado (nombre, email, dni, telefono, direccion, especialidad) 
            VALUES ('$nombre', '$email', '$dni', '$telefono', '$direccion', '$especialidad')";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../../motor-admin/ADMINISTRADOR/tabla-usuarios.php?tabla=empleados");
        exit();
    }

    $connection->close();
}


?>