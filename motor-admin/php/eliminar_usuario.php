<?php
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    
    // Primero verificamos si el usuario existe
    $sql_select = "SELECT nombre FROM usuarios WHERE id = ?";
    $stmt = $connection->prepare($sql_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode([
            'success' => false,
            'message' => "Error: Usuario no encontrado"
        ]);
        exit();
    }
    
    // Eliminamos el usuario
    $sql_delete = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $connection->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => "El usuario ha sido eliminado correctamente"
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => "Error al eliminar el usuario"
        ]);
    }
    exit();
}

// Si se accede directamente a este archivo sin POST, redirigir a la página principal
header("Location: ../ADMINISTRADOR/tabla-usuarios.php");
exit();
?> 