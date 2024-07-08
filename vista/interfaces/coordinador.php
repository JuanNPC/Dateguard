<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    
    header("Location: login.php");
    exit;
}


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coordinador</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/coordinador.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <h1><em>HOLA COORDINADOR</em></h1>
    <a href="../../modelo/cerrarsesion.php" class="btn btn-outline-light">Cerrar sesion</a>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a  class="btn btn-secondary" href="coordinador-acti-regis.php">ACTIVOS<br>REGISTRADOS</a>
        <a  class="btn btn-secondary" href="coordinador-manteni.php">MANTENIMIENTO</a>
      </nav>
      <main class="col-md-10 d-flex align-items-center justify-content-center">
        
      </main>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
