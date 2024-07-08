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

<?php
include '../../modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['tecnico']) || empty($_POST['tiponovedad']) || empty($_POST['fechanovedad']) || empty($_POST['ambiente']) || empty($_POST['novdescripcion'])) {
        die("Error: todos los campos son obligatorios.");
    }

    
    $tecnico = $_POST['tecnico'];
    $tiponovedad = $_POST['tiponovedad'];
    $fechanovedad = $_POST['fechanovedad'];
    $ambiente = $_POST['ambiente'];
    $novdescripcion = $_POST['novdescripcion'];

    
    $sql = "INSERT INTO registro_novedades (tecnico, tipo_novedad, fecha_novedad, ambiente, descripcion) VALUES ('$tecnico', '$tiponovedad', '$fechanovedad', '$ambiente', '$novdescripcion')";

    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro de novedad exitoso"); window.location.href="soporte-novedades.php";</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>soporte-novedades</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/soporte-novedades.css">
</head>
<body>

  <header>
    <h1><em>REGISTRO NOVEDADES</em></h1>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a class="btn btn-secondary">REGISTRO<br>NOVEDADES</a>
        <a class="btn btn-secondary" href="soporte-mantenimiento.php">REGISTRO<br> MANTENIMIENTO</a>
        <a href="soportetecnico.php" class="btn btn-primary">Ir al inicio</a>
      </nav>
      <main class="col-md-10 d-flex align-items-center justify-content-center">
        <div class="form-container">
          <h2 class="text-center mb-4">Registro de novedades</h2>
          <form action="" method="POST">
            <div class="row">
              <div class="col-md-6">
                <input type="text" id="tecnico" placeholder="TECNICO" name="tecnico" required>
                <select id="tiponovedad" name="tiponovedad" required>
                  <option value="">TIPO NOVEDAD</option>
                  <option value="MODERADO">MODERADO</option>
                  <option value="CRITICO">CRITICO</option>
                  <option value="IMPORTANTE">IMPORTANTE</option>
                </select>
                
                <label for="fechanovedad">Fecha de Novedad</label>
                <input type="date" id="fechanovedad" placeholder="FECHA NOVEDAD" name="fechanovedad" required>
                <input type="number" id="ambiente" placeholder="AMBIENTE" name="ambiente" required>
              </div>
              <div class="col-md-6">
                <textarea placeholder="describa la novedad brevemente" id="novdescripcion" name="novdescripcion" rows="4" class="descripcion-textarea" required></textarea>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
