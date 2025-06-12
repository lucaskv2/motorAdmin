<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/presupuesto.css">
</head>
<body>
    <?php include("../UTILS/header-pages.php"); ?>

    <section class="container text-center my-5 seccion-presupuestos">
        <h2 class="mb-5">Solicitar presupuesto</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5 animate__animated animate__pulse">
        <div class="col">
            <div class="card h-100 text-center p-3">
            <i class="ri-oil-line fs-1 text-primary"></i>
            <p class="mt-2">Chequeo y cambio de aceite, cambio líquido refrigerante, rellenar el sapito</p>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-center p-3">
            <i class="ri-tools-fill fs-1 text-success"></i>
            <p class="mt-2">Cambio de ruedas, cambio de frenos</p>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-center p-3">
            <i class="ri-steering-fill fs-1 text-warning"></i>
            <p class="mt-2">Dirección y alineación, ajuste de balanceo</p>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-center p-3">
            <i class="ri-car-fill fs-1 text-danger"></i>
            <p class="mt-2">Chequeos generales</p>
            </div>
        </div>
        </div>

        <form action="procesar.php" method="POST" class="mx-auto container animate__animated animate__fadeInUp" style="max-width: 600px;">
            <div class="mb-3 text-start">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3 text-start">
                <label for="servicio" class="form-label">Servicio:</label>
                <select id="pais" name="pais" class="form-select" required>
                <option value="">-- Selecciona el servicio --</option>
                <option value="arg">Cambio de aceite</option>
                <option value="mex">Cambio de ruedas</option>
                <option value="col">Cambio de frenos</option>
                <option value="esp">Chequeo general</option>
                <option value="otro">Otro</option>
                </select>
            </div>

            <div class="mb-3 text-start">
                <label for="mensaje" class="form-label">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" class="form-control" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section>

    <?php
        include("../UTILS/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>