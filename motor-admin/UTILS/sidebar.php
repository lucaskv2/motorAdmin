<?php 
if (!isset($_SESSION)) {
    session_start();
}
        if (isset($_SESSION['nombre']))
        {
          $nombre=$_SESSION['nombre'];
          $apellido=$_SESSION['apellido'];
        } 
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
    <img src="../images/img_admin.png" alt="Admin" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
    <h5 class="offcanvas-title fw-bold" id="adminSidebarLabel"><?php echo htmlspecialchars($nombre); ?></h5>
    <span class="azul-panel mb-3">Admin</span>  
  </div>

  <div class="offcanvas-body d-flex flex-column justify-content-between">
    <!-- Opciones del menú -->
    <ul class="list-group mb-3">
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/tabla-usuarios.php" class="sidebar-link text-dark">
              <i class="bi bi-people-fill me-2"></i>Tabla de Usuarios y Empleados
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/control-stock.php" class="sidebar-link text-dark">
              <i class="bi bi-box-seam me-2"></i>Control de Stock
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/almacen-resenia.php" class="sidebar-link text-dark">
              <i class="bi bi-journal-text me-2"></i>Almacén de Contactos
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/asignar-trabajos.php" class="sidebar-link text-dark">
              <i class="bi bi-person-workspace me-2"></i>Asignar Trabajos
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/solicitud-presupuesto.php" class="sidebar-link text-dark">
              <i class="bi bi-receipt me-2"></i>Tabla de Consultas y Presupuestos
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/ABM-servicios.php" class="sidebar-link text-dark">
              <i class="bi bi-award-fill me-2"></i>ABM Servicios
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/ABM-especialidades.php" class="sidebar-link text-dark">
              <i class="bi bi-award-fill me-2"></i>ABM Especialidades
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/facturacion.php" class="sidebar-link text-dark">
              <i class="bi bi-award-fill me-2"></i>Facturas
          </a>
      </li>
      <li class="list-group-item border-0">
          <a href="../ADMINISTRADOR/generar-factura.php" class="sidebar-link text-dark">
              <i class="bi bi-award-fill me-2"></i>Generar Facturas
          </a>
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
</body>
</html>
