<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .azul-panel{
    color: #0d6efd;
  }
  .sidebar-link {
    transition: background-color 0.3s, color 0.3s;
    padding: 10px 15px;
    border-radius: 8px;
    display: block;
    text-decoration: none;        /* quita subrayado */
  }

  .sidebar-link:hover {
    background-color: #0d6efd;    /* azul oscuro tipo Bootstrap primary */
    color: #fff !important;       /* texto blanco */
  }

  .list-group-item {
    background-color: transparent;
  }
</style>

</head>
<body>

<!-- Botón para abrir el sidebar -->
<nav class="navbar bg-dark text-white">
  <div class="container-fluid">
    <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
      ☰ Menú
    </button>
    <span class="navbar-brand mb-0 h1 text-white">Panel de Administración</span>
  </div>
</nav>

<!-- Sidebar Offcanvas -->
<div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
  <div class="offcanvas-header d-flex flex-column align-items-start">
    <!-- Imagen de perfil -->
     <button type="button" class="btn-close align-self-end" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    <img src="ruta/a/tu/imagen.png" alt="Admin" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
    <h5 class="offcanvas-title fw-bold" id="adminSidebarLabel">Karthi Madesh</h5>
    <span class="azul-panel mb-3">Admin</span>
    
  </div>

  <div class="offcanvas-body d-flex flex-column justify-content-between">
    <!-- Opciones del menú -->
    <ul class="list-group mb-3">
        <li class="list-group-item border-0">
            <a href="../ADMINISTRADOR/tabla-usuarios.php" class="sidebar-link text-dark">📦 Tabla de Usuarios</a>
        </li>
        <li class="list-group-item border-0">
            <a href="../ADMINISTRADOR/control-stock.php" class="sidebar-link text-dark">📦 Control de Stock</a>
        </li>
        <li class="list-group-item border-0">
            <a href="../ADMINISTRADOR/almacen-resenia.php" class="sidebar-link text-dark">📁 Almacén de Contactos</a>
        </li>
    </ul>


    <!-- Botón Logout -->
    <div class="mt-auto">
      <a href="../php/logout.php" class="btn btn-outline-danger w-100">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var sidebar = new bootstrap.Offcanvas(document.getElementById('adminSidebar'));
    sidebar.show(); // abre automáticamente el offcanvas al cargar
  });
</script>
</body>
</html>
