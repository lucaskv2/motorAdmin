<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("../UTILS/header-pages.php");
    ?>
    <section class="container text-center my-5">
        <h2 class="display-5 fw-bold">Nuestros Servicios</h2>
    </section>
    <section class="container my-5">
        <div class="row g-4">
            <!-- Tarjeta 1 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100 text-center">
                <img src="../images/cambio-de-aceite.jpg" class="card-img-top" alt="Servicio 1">
                <div class="card-body">
                    <h5 class="card-title">Cambio de Aceite</h5>
                    <p class="card-text">Renueva el aceite de tu motor con productos de alta calidad. Mejoramos el rendimiento de tu vehículo y prolongamos la vida útil del motor con un servicio rápido y seguro.</p>
                </div>
            </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100 text-center">
                <img src="../images/cambio-ruedas.jpeg" class="card-img-top" alt="Servicio 2">
                <div class="card-body">
                    <h5 class="card-title">Cambio de Ruedas</h5>
                    <p class="card-text">Reemplazo y balanceo de ruedas para garantizar una conducción estable y segura. Utilizamos herramientas de precisión para lograr el mejor agarre y desgaste uniforme.</p>
                </div>
            </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100 text-center">
                <img src="../images/cambio-frenos.jpg" class="card-img-top" alt="Servicio 3">
                <div class="card-body">
                    <h5 class="card-title">Cambio de frenos</h5>
                    <p class="card-text">Inspeccionamos y reemplazamos pastillas, discos y otros componentes clave para asegurar una frenada eficaz y sin ruidos. Tu seguridad es nuestra prioridad.</p>
                </div>
            </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100 text-center">
                <img src="../images/control-auto.jpg" class="card-img-top" alt="Servicio 4">
                <div class="card-body">
                    <h5 class="card-title">Chequeo general del vehiculo</h5>
                    <p class="card-text">Revisión completa del sistema mecánico, eléctrico y de fluidos. Detectamos a tiempo posibles fallas para evitar problemas mayores y asegurar el correcto funcionamiento de tu vehículo.</p>
                </div>
            </div>
            </div>
        </div>
    </section>

    <?php
        include("../UTILS/footer.php");
    ?>
</body>
</html>