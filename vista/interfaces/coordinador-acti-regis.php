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
  <title>ACTIVOS REGISTRADOS</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/coordinador-acti-regis.css">
</head>
<body>

<header class="d-flex justify-content-between align-items-center">
  <h1 class="text-center w-100"><em>ACTIVOS REGISTRADOS</em></h1>
</header>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 sidebar">
      <a class="btn btn-secondary">ACTIVOS<br>REGISTRADOS</a>
      <a class="btn btn-secondary" href="coordinador-manteni.php">MANTENIMIENTO</a>
      <a class="btn btn-primary" href="coordinador.php">INICIO</a>
    </nav>
    <main class="col-md-10">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Marca</th>
              <th scope="col">Serial</th>
              <th scope="col">Placa</th>
              <th scope="col">Año de adquisición</th>
              <th scope="col">Ambiente</th>
              <th scope="col">Tipo de activo</th>
              <th scope="col">Estado</th>
              <th scope="col">Responsable</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../../modelo/conexion.php';

            if (isset($conn) && $conn) {
                $sql = "SELECT * FROM registro_activos";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['marca']; ?></td>
                            <td><?php echo $mostrar['serial']; ?></td>
                            <td><?php echo $mostrar['placa']; ?></td>
                            <td><?php echo $mostrar['ano_adquisicion']; ?></td>
                            <td><?php echo $mostrar['ambiente']; ?></td>
                            <td><?php echo $mostrar['tipo_activo']; ?></td>
                            <td><?php echo $mostrar['estado']; ?></td>
                            <td><?php echo $mostrar['responsable']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="8">Error en la consulta: ' . mysqli_error($conn) . '</td></tr>';
                }

                mysqli_close($conn);
            } else {
                echo '<tr><td colspan="8">Error de Conexión (0)</td></tr>';
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
