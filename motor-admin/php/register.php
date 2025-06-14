<?php
include("../connection.php");
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$DNI=$_POST["DNI"];
$contrasenia=$_POST["contrasenia"];

mysqli_query($connection,"INSERT INTO usuario(NOMBRE,APELLIDO,EMAIL,DNI,CONTRASENIA) VALUES('$nombre','$apellido','$email','$DNI','$contrasenia')");
header("Location: ../index.php");

?>