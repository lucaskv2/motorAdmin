<?php
include("../connection.php");

    $nombre = $_POST["Nombre"];
    $marca = $_POST["Marca"];
    $cantidad = $_POST["Cantidad"];
    $precio = $_POST["Precio"];
    
    mysqli_query($connection,"INSERT INTO stock (nombre_producto, marca, cantidad, precio_unitario) VALUES ('$nombre', '$marca', '$cantidad', '$precio')");

    header("location:../ADMINISTRADOR/control-stock.php");

?>