<?php include_once('auth.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">PHP CRUD</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="d-flex gap-4">

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/acerca">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tareas">Lista de tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/agregar">Agregar tarea</a>
          </li>
        </ul>
      </div>
      <?php if (isLoggedIn()): ?>
        <div class="d-flex align-items-center">
          <span class="text-light me-3">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
          <a href="/logout" class="btn btn-outline-light btn-sm d-inline-flex align-items-center">Cerrar Sesión</a>
        </div>
      <?php else: ?>
        <div class="d-flex gap-2">
          <a href="/login" class="btn btn-outline-light btn-sm d-inline-flex align-items-center">Iniciar Sesión</a>
          <a href="/register" class="btn btn-light btn-sm d-inline-flex align-items-center">Registrarse</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>