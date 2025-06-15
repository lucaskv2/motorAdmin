<?php
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    
    // Primero verificamos si el empleado existe
    $sql_select = "SELECT nombre FROM empleado WHERE id = ?";
    $stmt = $connection->prepare($sql_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header("Location: ../ADMINISTRADOR/tabla-usuarios.php?tabla=empleados&error=1");
        exit();
    }
    
    // Eliminamos el empleado
    $sql_delete = "DELETE FROM empleado WHERE id = ?";
    $stmt = $connection->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ../ADMINISTRADOR/tabla-usuarios.php?tabla=empleados&success=1");
    } else {
        header("Location: ../ADMINISTRADOR/tabla-usuarios.php?tabla=empleados&error=1");
    }
    exit();
}

// Si se accede directamente a este archivo sin POST, redirigir a la página principal
header("Location: ../ADMINISTRADOR/tabla-usuarios.php");
exit();
?> 