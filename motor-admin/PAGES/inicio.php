<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorAdmin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <?php
      include("../UTILS/header-pages.php");
    ?>
    <h1 class="text-center fw-bold display-4 my-4">
      <span style="color: #12344D;">Motor</span><span class="text-danger">Admin</span>
    </h1>
    <section class="py-5 animate__animated animate__fadeInUp">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-3 mb-md-0">
            <h3>Historia</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam non excepturi quis officiis voluptates...</p>
          </div>
          <div class="col-md-6 text-center">
            <img src="../images/historia-taller.jpeg" alt="fotoAuto" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </section>
    
    <section class="py-5 animate__animated animate__fadeInUp">
      <div class="container">
        <div class="row align-items-center flex-column flex-md-row">
          <div class="col-md-6 mb-3 mb-md-0 text-center">
            <img src="../images/quienes-somos.jpg" alt="fotoNosotros" class="img-fluid rounded w-100">
          </div>
          <div class="col-md-6">
            <h3>¿Quiénes somos?</h3>
            <p>11Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, 
              nemo adipisci! Voluptas nobis fugit vero dicta commodi nulla consequuntur! Corrupti doloremque iste voluptatem culpa, ad omnis! Eius earum laborum voluptatum.</p>
          </div>
        </div>
      </div>
    </section>


    <section class="py-5 animate__animated animate__fadeInUp">
      <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
          <div class="col-md-6 mt-3 mt-md-0">
            <h3>Misión y Visión</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur in minus at molestiae doloremque fuga, blanditiis consectetur, illo recusandae enim optio harum non doloribus ullam quas nihil quidem suscipit aliquid?</p>
            <a href="./turnos.php"><button class="btn btn-primary mt-2">Reserva tu turno</button></a>
          </div>
          <div class="col-md-6 text-center">
            <img src="../images/mision-vision.jpg" alt="fotoCalendario" class="img-fluid rounded w-100">
          </div>
        </div>
      </div>
    </section>


    <section id="servicios" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="row text-center">
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="servicio p-3 border rounded h-100">
              <i class="ri-oil-line display-4 mb-2"></i>
              <p>Chequeo y cambio de aceite, líquido refrigerante, rellenado del sapito</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="servicio p-3 border rounded h-100">
              <i class="ri-tools-fill display-4 mb-2"></i>
              <p>Cambio de ruedas, cambio de frenos</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="servicio p-3 border rounded h-100">
              <i class="ri-steering-fill display-4 mb-2"></i>
              <p>Dirección y alineación, ajuste de balanceo</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="servicio p-3 border rounded h-100">
              <i class="ri-car-fill display-4 mb-2"></i>
              <p>Chequeos generales</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="contacto" class="py-5">
      <div class="container">
        <div class="row align-items-center flex-column flex-md-row">
          <div class="col-md-6 contacto-img text-center mb-3 mb-md-0">
            <img src="../images/mision-vision.jpg" alt="fotoMaps" class="img-fluid rounded w-100">
          </div>
          <div class="col-md-6 contacto-text">
            <a href="https://www.google.com/maps" target="_blank">Google Maps</a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur accusamus ducimus asperiores mollitia, veniam vel cumque suscipit praesentium, veritatis alias perspiciatis similique nihil nemo pariatur blanditiis et laboriosam commodi quasi!</p>
            <a href="./contacto.php"><button class="btn btn-primary mt-2">Contactanos</button></a>
          </div>
        </div>
      </div>

    </section>

    <?php
      include("../UTILS/footer.php");
    ?>
    <script src="../JS/inicio.js"></script>
</body>