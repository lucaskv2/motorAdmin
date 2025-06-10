<?php

include("../connection.php");
    $nombre=mysqli_real_escape_string($connection,$_POST["Nombre"]);
    $email = mysqli_real_escape_string($connection,$_POST["Email"]);
    $asunto = mysqli_real_escape_string($connection,$_POST["Asunto"]);
    $telefono = mysqli_real_escape_string($connection,$_POST["Telefono"]);
    $mensaje = mysqli_real_escape_string($connection,$_POST["Mensaje"]);

    $sql = "INSERT INTO mensajes (nombre,email,asunto,telefono, mensaje) VALUES ('$nombre','$email', '$asunto','$telefono', '$mensaje')";
    mysqli_query($connection,$sql);
   // header("Location: ../PAGES/contacto.php");



?>
