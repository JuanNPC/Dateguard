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
  <title>Eliminar o Modificar</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/admi-elim-mod.css">
</head>
<body>

<header>
  <h1><em>ACTIVOS REGISTRADOS</em></h1>
</header>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 bg-light sidebar">
      <a class="btn btn-secondary btn-block mb-4" href="admi-registroactivo.php">REGISTRO ACTIVOS</a>
      <a class="btn btn-secondary btn-block mb-4">ELIMINAR <br>ACTIVOS</a>
      <a class="btn btn-secondary btn-block mb-4" href="admi-novedades.php">NOVEDADES</a>
      <a class="btn btn-secondary btn-block mb-4" href="admi-regis-manteni.php">REGISTRO MANTENIMIENTO</a>
      <a class="btn btn-primary btn-block" href="administrador.php">INICIO</a>
    </nav>
    <main class="col-md-10">

      <table class="table">
        <thead class="table-dark"> <!-- Clase table-dark solo para el encabezado -->
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Marca</th>
            <th scope="col">Serial</th>
            <th scope="col">Placa</th>
            <th scope="col">Año de adquisición</th>
            <th scope="col">Ambiente</th>
            <th scope="col">Tipo de activo</th>
            <th scope="col">Estado</th>
            <th scope="col">Responsable</th>
            <th scope="col">Acciones</th>
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
                          <td><?php echo $mostrar['id']; ?></td>
                          <td><?php echo $mostrar['marca']; ?></td>
                          <td><?php echo $mostrar['serial']; ?></td>
                          <td><?php echo $mostrar['placa']; ?></td>
                          <td><?php echo $mostrar['ano_adquisicion']; ?></td>
                          <td><?php echo $mostrar['ambiente']; ?></td>
                          <td><?php echo $mostrar['tipo_activo']; ?></td>
                          <td><?php echo $mostrar['estado']; ?></td>
                          <td><?php echo $mostrar['responsable']; ?></td>
                          <td>
                              <a href="../../modelo/eliminar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                              <!-- Aquí puedes añadir el enlace para modificar -->
                          </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo '<tr><td colspan="10">Error en la consulta: ' . mysqli_error($conn) . '</td></tr>';
              }

              mysqli_close($conn);
          } else {
              echo '<tr><td colspan="10">Error de Conexión (0)</td></tr>';
          }
          ?>
        </tbody>
      </table>
      
    </main>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
