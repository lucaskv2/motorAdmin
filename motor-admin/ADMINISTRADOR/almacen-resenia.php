<?php
if (!isset($_SESSION)) {
    session_start();
}
// Verificar si la sesión está activa y el rol es 'Admin'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Admin') {
    header("Location: ../PAGES/inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén de Contactos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer+0wPthOhA8rsVjQerV_D3B3z_oB-4o5uG0i3F_M4hK2f" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/turnos.css">
    
</head>

<body>
    <?php
    include("../UTILS/sidebar.php");
    include("../connection.php");
    $sql = "SELECT * FROM mensajes ORDER BY fecha DESC";
    $result = mysqli_query($connection,$sql);
    
    echo'<div class="container my-5">
        <h2 class="text-center mb-4">Contactos</h2>
        <div class="table-responsive">
            <table id="tabla-contactos" class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Télefono</th>
                <th scope="col">Asunto</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>';

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        
        <td>".$row['nombre']."</td>
        <td>".$row['email']."</td>
        <td>".$row['telefono']."</td>
        <td>".$row['asunto']."</td>
        <td>".$row['mensaje']."</td>
        <td>".$row['fecha']."</td>
        </tr>";
    }
    echo " 
    </tbody>
    </table>";
    ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabla-contactos').DataTable({
        order: [[1, 'asc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
        });
    });
</script>
</body>
</html>



