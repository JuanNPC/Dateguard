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

<?php
include '../../modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $marca = $_POST['marca'];
    $serial = $_POST['serial'];
    $placa = $_POST['placa'];
    $año_adquisicion = $_POST['añoadquisicion'];
    $ambiente = $_POST['ambiente'];
    $tipo_activo = $_POST['tipodeactivo'];
    $estado = $_POST['estado'];
    $responsable = $_POST['responsable'];

    // Validar que los datos no estén vacíos
    if (empty($marca) || empty($serial) || empty($placa) || empty($año_adquisicion) || empty($ambiente) || empty($tipo_activo) || empty($estado) || empty($responsable)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Crear la consulta SQL para insertar los datos
    $sql = "INSERT INTO registro_activos (marca, serial, placa, ano_adquisicion, ambiente, tipo_activo, estado, responsable) VALUES ('$marca', '$serial', '$placa', '$año_adquisicion', '$ambiente', '$tipo_activo', '$estado', '$responsable')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Mostrar alerta de registro exitoso y redireccionar
        echo '<script>alert("Registro de activo exitoso"); window.location.replace("admi-registroactivo.php");</script>';
        exit; // Terminar el script para evitar cualquier salida adicional
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RegistroActi</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/admi-registroacti.css">
</head>
<body>

  <header>
    <h1><em>REGISTRO DE ACTIVOS</em></h1>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a class="btn btn-secondary">REGISTRO ACTIVOS</a>
        <a class="btn btn-secondary" href="admi-elim-modi.php">ELIMINAR <br>ACTIVOS</a>
        <a class="btn btn-secondary" href="admi-novedades.php">NOVEDADES</a>
        <a class="btn btn-secondary" href="admi-regis-manteni.php">REGISTRO MANTENIMIENTO</a>
        <a href="administrador.php" class="btn btn-primary">Ir al inicio</a>
      </nav>
      <main class="col-md-10 d-flex align-items-center justify-content-center">
        <div class="form-container">
          <h2 class="text-center mb-4">Registro de Activos</h2>
          <form action="" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <input type="text" id="marca" name="marca" placeholder="Marca" required>
                </div>
                <div class="form-group">
                  <label for="serial">Serial</label>
                  <input type="text" id="serial" name="serial" placeholder="Serial" required>
                </div>
                <div class="form-group">
                  <label for="placa">Placa</label>
                  <input type="text" id="placa" name="placa" placeholder="Placa" required>
                </div>
                <div class="form-group">
                  <label for="añoadquisicion">Año de Adquisición</label>
                  <input type="date" id="añoadquisicion" name="añoadquisicion" placeholder="Año Adquisición" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ambiente">Ambiente</label>
                  <input type="number" id="ambiente" name="ambiente" placeholder="Ambiente" required>
                </div>
                <div class="form-group">
                  <label for="tipodeactivo">Tipo de Activo</label>
                  <input type="text" id="tipoactivo" name="tipodeactivo" placeholder="Tipo de Activo" required>
                </div>
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <input type="text" id="estado" name="estado" placeholder="Estado" required>
                </div>
                <div class="form-group">
                  <label for="responsable">Responsable</label>
                  <input type="text" id="responsable" name="responsable" placeholder="Responsable" required>
                </div>
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
