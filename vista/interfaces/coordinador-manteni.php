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
  <title>coordinador-mantenis</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/coordinador-manteni.css">
</head>
<body>

  <header class="d-flex justify-content-center align-items-center">
    <h1 class="text-center w-100"><em>MANTENIMIENTOS</em></h1>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a class="btn btn-secondary" href="coordinador-acti-regis.php">ACTIVOS<br>REGISTRADOS</a>
        <a class="btn btn-secondary">MANTENIMIENTO</a>
        <a class="btn btn-primary" href="coordinador.php">INICIO</a>
      </nav>
      <main class="col-md-10">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Tecnicop</th>
                <th scope="col">Fecha mantenimiento</th>
                <th scope="col">Placa</th>
                <th scope="col">Mantenimiento</th>
                <th scope="col">Ambiente</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../../modelo/conexion.php';

              if (isset($conn) && $conn) {
                  $sql = "SELECT * FROM registro_mantenimiento";
                  $result = mysqli_query($conn, $sql);

                  if ($result) {
                      while($mostrar = mysqli_fetch_array($result)){
                          ?>
                          <tr>
                              <td><?php echo $mostrar['tecnico']; ?></td>
                              <td><?php echo $mostrar['fecha_mantenimiento']; ?></td>
                              <td><?php echo $mostrar['placa']; ?></td>
                              <td><?php echo $mostrar['mantenimiento']; ?></td>
                              <td><?php echo $mostrar['ambiente']; ?></td>
                          </tr>
                          <?php
                      }
                  } else {
                      echo '<tr><td colspan="5">Error en la consulta: ' . mysqli_error($conn) . '</td></tr>';
                  }

                  mysqli_close($conn);
              } else {
                  echo '<tr><td colspan="5">Error de Conexión (0)</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
