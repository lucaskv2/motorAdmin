<?php
//header('Content-Type: application/json');
include("../connection.php");

$email = mysqli_real_escape_string($connection, $_POST["email"]);
$contrasenia = mysqli_real_escape_string($connection, $_POST["password"]);
$consulta=mysqli_query($connection, "SELECT *FROM usuario where NOMBRE='$email'");

$resultado=mysqli_num_rows($consulta);


    if($resultado!=0){
	$respuesta=mysqli_fetch_array($consulta);
	$_SESSION['valid'] = $row['rol'];
	$_SESSION['nombre']=$respuesta['nombre'];
	$_SESSION['apellido']=$respuesta['apellido'];
		
		echo "Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."<br />";	
        if(isset($_SESSION['valid'])) {
        $rol=$_SESSION['valid'];
        switch($rol= 'cliente'){
            case'cliente':
                header("Location: .....");
                breaK;
            case'empleado':
                header("Location: .....");
                breaK;
            case'admin':
                header("Location:../ADMINISTRADOR/almacen-resenia.php");
                breaK;
        }
        header("Location: .....");// ... PAGINA DEL USUARIO
    }

}
    
   
    /*if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['rol'];
        echo  $_SESSION['valid'];
        //echo json_encode(['success' => true]);
    } else {
        //echo json_encode(['success' => false, 'message' => 'El email o contraseña son incorrectos']);
    }

    
    
*/
?>