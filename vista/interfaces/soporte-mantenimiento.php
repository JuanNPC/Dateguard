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
    
    if (empty($_POST['tecnico']) || empty($_POST['fechamantenimiento']) || empty($_POST['placa']) || empty($_POST['tipomantenimiento']) || empty($_POST['ambiente'])) {
        die("Error: todos los campos son obligatorios.");
    }

    
    $tecnico = $_POST['tecnico'];
    $fechamantenimiento = $_POST['fechamantenimiento'];
    $placa = $_POST['placa'];
    $tipomantenimiento = $_POST['tipomantenimiento'];
    $ambiente = $_POST['ambiente'];

    
    switch ($tipomantenimiento) {
        case "fallointernet":
            $tipomantenimiento_texto = "Fallo Internet";
            break;
        case "actualizacion":
            $tipomantenimiento_texto = "Actualización";
            break;
        case "software":
            $tipomantenimiento_texto = "Software";
            break;
        default:
            $tipomantenimiento_texto = "";
    }

    
    $sql = "INSERT INTO registro_mantenimiento (tecnico, fecha_mantenimiento, placa, mantenimiento, ambiente) VALUES ('$tecnico', '$fechamantenimiento', '$placa', '$tipomantenimiento_texto', '$ambiente')";

    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro de mantenimiento exitoso"); window.location.href="soporte-mantenimiento.php";</script>';
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
  <title>soporte-mantenimiento</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/soporte-mantenimiento.css">
</head>
<body>

  <header>
    <h1><em>REGISTRO MANTENIMIENTO</em></h1>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a class="btn btn-secondary" href="soporte-novedades.php">REGISTRO<br>NOVEDADES</a>
        <a class="btn btn-secondary">REGISTRO<br> MANTENIMIENTO</a>
        <a href="soportetecnico.php" class="btn btn-primary">Ir al inicio</a>
      </nav>
      <main class="col-md-10 d-flex align-items-center justify-content-center">
        <div class="form-container">
          <h2 class="text-center mb-4">Registro de mantenimiento</h2>
          <form action="###" method="POST">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>TECNICO</th>
                  <th>FECHA</th>
                  <th>PLACA</th>
                  <th> MANTENIMIENTO</th>
                  <th>AMBIENTE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" id="tecnico" name="tecnico" required></td>
                  <td><input type="date" id="fechamantenimiento" name="fechamantenimiento" required></td>
                  <td><input type="text" id="placa" name="placa" required></td>
                  <td>
                    <select name="tipomantenimiento" required>
                      <option value="" disabled selected>Seleccionar</option>
                      <option value="fallointernet">Fallo Internet</option>
                      <option value="actualizacion">Actualización</option>
                      <option value="software">Software</option>
                    </select>
                  </td>
                  <td><input type="number" id="ambiiente" name="ambiente" required></td>
                </tr>
              </tbody>
            </table>
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
