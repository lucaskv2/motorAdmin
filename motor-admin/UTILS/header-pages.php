<?php
session_start();
?>
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../CSS/index.css" rel="stylesheet" type="text/css">
  <link href="../CSS/pages-style.css" rel="stylesheet" type="text/css">
  <title>MotorAdmin</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
      <a class="navbar-brand" href="../PAGES/inicio.php"><img src="../images/motorAdmin-logo.png" alt="Logo" style="width: 50px; height: auto;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse bg-light" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/sobre-nosotros.php">Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/turnos.php">Turnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/servicios.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/resenia.php">Reseña</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../PAGES/contacto.php">Contacto</a>
          </li>
        </ul>
        <div class="d-flex">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar</button>
        </div>
      </div>
    </nav>
  </header>

  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        <?php
        include("./connection.php");

        if(isset($_POST["submit"])){
          $email=mysqli_real_escape_string($connection,$_POST["email"]);
          $password=mysqli_real_escape_string($connection,$_POST["password"]);

          $result = mysqli_query($connection,"SELECT * FROM usuario WHERE email='$email' AND password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                  $_SESSION['valid'] = $row['email'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
                  /** NECESARIO AGEGAR UN MODAL PARA DECIR QUE EL USUARIO 
                   * O EL PASSORD NO ES CORRECTO
                   */
                }


                if(isset($_SESSION['valid']))
                {
                  header("Location: .....");// ... PAGINA DEL USUARIO
                }
        }
        ?>
          <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Contraseña</label>
              <input type="password" name="password" class="form-control" id="loginPassword">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>
          <div class="mt-3 text-center">
            ¿No tienes una cuenta? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Regístrate aquí</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Crear Cuenta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="registerName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="registerName">
            </div>
            <div class="mb-3">
              <label for="registerLastname" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="registerLastname">
            </div>
            <div class="mb-3">
              <label for="registerEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="registerEmail">
            </div>
            <div class="mb-3">
              <label for="registerDNI" class="form-label">DNI</label>
              <input type="text" class="form-control" id="registerDNI">
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="registerPassword">
            </div>
            <button type="submit" class="btn btn-success">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>