<?php
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $connection->real_escape_string($_POST['nombre']);
    $email = $connection->real_escape_string($_POST['email']);
    $dni = $connection->real_escape_string($_POST['dni']);
    $patente = $connection->real_escape_string($_POST['patente']);
    $modelo = $connection->real_escape_string($_POST['modelo']);
    $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT); 
    
    $sql = "INSERT INTO usuarios (nombre, email, dni, patente, modelo, contrasenia) 
            VALUES ('$nombre', '$email', '$dni', '$patente', '$modelo', '$contrasenia')";

    if ($connection->query($sql) === TRUE) {
        // Redireccionar
        header("Location: ../PAGES/inicio.php?registro=exitoso");
        exit();
    }

    $conn->close();
}

<<<<<<< HEAD
mysqli_query($connection,"INSERT INTO usuario(NOMBRE,APELLIDO,EMAIL,DNI,CONTRASENIA) VALUES('$nombre','$apellido','$email','$DNI','$contrasenia')");
header("Location: ../index.php");
=======
>>>>>>> f8ed796a06b88b3d2261ddf74dfe5022298ae8dc

?>