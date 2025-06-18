<?php
include("../connection.php"); // Asegurate que este archivo tenga tu conexión a la BD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $connection->real_escape_string($_POST['nombre']);
    $email = $connection->real_escape_string($_POST['email']);
    $servicio = $connection->real_escape_string($_POST['servicio']);
    $mensaje = $connection->real_escape_string($_POST['mensaje']);
    
    $sql = "INSERT INTO consultas (nombre, email, servicio, mensaje) 
            VALUES ('$nombre', '$email', '$servicio', '$mensaje')";

    if ($connection->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Mensaje enviado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al enviar el mensaje']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
