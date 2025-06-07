<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorAdmin</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <?php
      include("../UTILS/header-pages.php");
    ?>
    <section class="historia-horizontal">
      <div class="historia-texto">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam non excepturi quis officiis voluptates...</p>
      </div>
      <div class="historia-imagen">
        <img src="../images/historia-taller.jpeg" alt="fotoAuto">
      </div>
    </section>
    
    <section id="historia">
      <div class="parallax-img">
        <img src="../images/quienes-somos.jpg" alt="fotoNosotros">
      </div>
      <div class="parallax-text">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, 
        nemo adipisci! Voluptas nobis fugit vero dicta commodi nulla consequuntur! Corrupti doloremque iste voluptatem culpa, ad omnis! Eius earum laborum voluptatum.</p>
      </div>
    </section>

    <section id="turnos">
      <div class="turnos-img">
        <img src="../images/mision-vision.jpg" alt="fotoCalendario">
      </div>
      <div class="turnos-text">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur in minus at molestiae doloremque fuga, blanditiis consectetur, illo recusandae enim optio harum non doloribus ullam quas nihil quidem suscipit aliquid?</p>
        <button>Reserva tu turno</button>
      </div>
    </section>

    <section id="servicios">
      <p>Nuestros Servicios</p>
      <div class="servicios-fila">
        <div class="servicio"><i class="ri-oil-line"></i><p>Chequeo y cambio de aceite, cambio liquido refrigerantea, rellenar el sapito</p></div>
        <div class="servicio"><i class="ri-tools-fill"></i><p>Cambio de ruedas, cambio de frenos</p></div>
        <div class="servicio"><i class="ri-steering-fill"></i><p>Dirección y alineacion, ajuste de balanceo</p></div>
        <div class="servicio"><i class="ri-car-fill"></i><p>Chequeos generales</p></div>
      </div>
    </section>

    <section id="contacto">
      <div class="contacto-img">
        <img src="../images/mision-vision.jpg" alt="fotoMaps">
      </div>
      <div class="contacto-text">
        <a href="www.googlemaps.com">googlemaps</a>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur accusamus ducimus asperiores mollitia, veniam vel cumque suscipit praesentium, veritatis alias perspiciatis similique nihil nemo pariatur blanditiis et laboriosam commodi quasi!</p>
        <button>Contactanos</button>
      </div>
    </section>

    <?php
      include("../UTILS/footer.php");
    ?>
    <script src="../JS/inicio.js"></script>
</body>