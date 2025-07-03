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

<<<<<<< HEAD:php/register.php
mysqli_query($connection,"INSERT INTO usuario(NOMBRE,APELLIDO,EMAIL,DNI,CONTRASENIA) VALUES('$nombre','$apellido','$email','$DNI','$contrasenia')") or die("Erroe Occured");
=======
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

>>>>>>> main:motor-admin/php/register.php
header("Location: ../index.php");

?>