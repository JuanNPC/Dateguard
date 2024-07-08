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
  <title>Novedades</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/admi-novedades.css">
</head>
<body>

  <header>
    <h1><em>NOVEDADES</em></h1>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar">
        <a class="btn btn-secondary" href="admi-registroactivo.php">REGISTRO ACTIVOS</a>
        <a class="btn btn-secondary" href="admi-elim-modi.php">ELIMINAR <br>ACTIVOS</a>
        <a class="btn btn-secondary">NOVEDADES</a>
        <a class="btn btn-secondary" href="admi-regis-manteni.php">REGISTRO MANTENIMIENTO</a>
        <a class="btn btn-primary" href="administrador.php">INICIO</a>
      </nav>
      <main class="col-md-10 d-flex align-items-start justify-content-center">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-dark"">
                <th scope="col">Id</th>
                <th scope="col">Técnico</th>
                <th scope="col">Tipo de novedad</th>
                <th scope="col">Fecha de novedad</th>
                <th scope="col">Ambiente</th>
                <th scope="col">Descripción</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include '../../modelo/conexion.php';

              if (isset($conn) && $conn) {
                  $sql = "SELECT * FROM registro_novedades";
                  $result = mysqli_query($conn, $sql);

                  if ($result) {
                      while($mostrar = mysqli_fetch_array($result)){
                          ?>
                          <tr>
                              <td><?php echo $mostrar['id']; ?></td>
                              <td><?php echo $mostrar['tecnico']; ?></td>
                              <td><?php echo $mostrar['tipo_novedad']; ?></td>
                              <td><?php echo $mostrar['fecha_novedad']; ?></td>
                              <td><?php echo $mostrar['ambiente']; ?></td>
                              <td><?php echo $mostrar['descripcion']; ?></td>                      
                          </tr>
                          <?php
                      }
                  } else {
                      echo '<tr><td colspan="6">Error en la consulta: ' . mysqli_error($conn) . '</td></tr>';
                  }

                  mysqli_close($conn);
              } else {
                  echo '<tr><td colspan="6">Error de Conexión</td></tr>';
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
