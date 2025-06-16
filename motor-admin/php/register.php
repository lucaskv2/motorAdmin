<?php
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $connection->real_escape_string($_POST['nombre']);
    $email = $connection->real_escape_string($_POST['email']);
    $dni = $connection->real_escape_string($_POST['dni']);
    $patente = $connection->real_escape_string($_POST['patente']);
    $modelo = $connection->real_escape_string($_POST['modelo']);
    $contrasena = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT); 
    
    $sql = "INSERT INTO usuarios (nombre, email, dni, patente, modelo, contrasena) 
<<<<<<< HEAD
            VALUES ('$nombre', '$email', '$dni', '$patente', '$modelo', '$contrasenia')";
=======
            VALUES ('$nombre', '$email', '$dni', '$patente', '$modelo', '$contrasena')";
>>>>>>> 34e368ade43c68cd400fffad110c966a84c1930b

    if ($connection->query($sql) === TRUE) {
        echo json_encode([
            'success' => true,
            'message' => "Registro exitoso"
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => "Error al registrar el usuario"
        ]);
    }
    exit();
}

<<<<<<< HEAD
header("Location: ../index.php");

=======
>>>>>>> 34e368ade43c68cd400fffad110c966a84c1930b
?>