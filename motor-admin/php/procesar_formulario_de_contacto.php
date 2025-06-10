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
$sql = "SELECT * FROM mensajes";
$result = mysqli_query($connection,$sql);

echo "<h1>Mensajes de usarios recibidos</h1>";
echo '<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Asunto</th>
      <th scope="col">Mensaje</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
';//CABEZERA DE LA TABLA

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>".$row['email']."</td>
    <td>".$row['nombre']."</td>
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
