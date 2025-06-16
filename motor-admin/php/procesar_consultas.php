<?php
include("../connection.php"); // Asegurate que este archivo tenga tu conexión a la BD

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $servicio = trim($_POST["pais"]);
    $mensaje = trim($_POST["mensaje"]);

    if (!empty($nombre) && !empty($email) && !empty($servicio) && !empty($mensaje)) {
        $sql = "INSERT INTO consultas (nombre, email, servicio, mensaje) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $email, $servicio, $mensaje);

        if ($stmt->execute()) {
            header("Location: gracias.html");
            exit;
        } else {
            echo "Error al guardar los datos.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
?>
