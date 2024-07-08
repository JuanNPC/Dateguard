<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['usuario'])) {
    // Redirige al usuario a la página de login si no está logueado
    header("Location: login.php");
    exit;
}

// Asegúrate de que la página no se almacene en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>soporte-tecnico</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/soportetecnico.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <h1><em>HOLA SOPORTE TECNICO</em></h1>
    <a href="../../modelo/cerrarsesion.php" class="btn btn-outline-light">Cerrar sesion</a>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a  class="btn btn-secondary" href="soporte-novedades.php">REGISTRO<br>NOVEDADES</a>
        <a  class="btn btn-secondary" href="soporte-mantenimiento.php">REGISTRO MANTENIMIENTO</a>
      </nav>
      <main class="col-md-10 d-flex align-items-center justify-content-center">
        
      </main>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
