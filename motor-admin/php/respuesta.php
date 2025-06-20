<?php
include("../connection.php");
    $email = mysqli_real_escape_string($connection,$_POST["email"]);
    $asunto = mysqli_real_escape_string($connection,$_POST["asunto"]);
    $mensaje = mysqli_real_escape_string($connection,$_POST["mensaje"]);
    $respuesta = mysqli_real_escape_string($connection,$_POST["respuesta"]);

    $sql = "INSERT INTO mensajes_respondidos (email,asunto, mensaje,respuesta) VALUES ('$email', '$asunto', '$mensaje','$respuesta')";
    mysqli_query($connection,$sql);

    header("Location: ../ADMINISTRADOR/almacen-resenia.php");
?>