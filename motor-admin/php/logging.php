<?php
header('Content-Type: application/json');
include("../connection.php");

try {
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $contrasenia = mysqli_real_escape_string($connection, $_POST["password"]);

    $result = mysqli_query($connection, "SELECT * FROM usuario WHERE EMAIL='$email' AND CONTRASENIA='$contrasenia'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['email'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'El email o contraseña son incorrectos']);
    }

    if(isset($_SESSION['valid'])) {
        header("Location: .....");// ... PAGINA DEL USUARIO
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}
?>