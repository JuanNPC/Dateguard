<?php
include '../../modelo/conexion.php';


function quitar_tildes_y_especiales($cadena) {
    
    $cadena = str_replace(
        array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'),
        array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'),
        $cadena
    );

    
    $cadena = preg_replace('/[^a-zA-Z0-9\s]/', '', $cadena);

    return $cadena;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol']; 
    $rol_normalizado = quitar_tildes_y_especiales($rol); 
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    
    if (empty($nombre) || empty($correo) || empty($rol) || empty($usuario) || empty($_POST['password'])) {
        die("Error: Todos los campos son obligatorios.");
    }

    
    $sql = "INSERT INTO usuarios (nombre, correo, rol, usuario, contrasena) VALUES ('$nombre', '$correo', UPPER('$rol_normalizado'), '$usuario', '$password')";

    
    if ($conn->query($sql) === TRUE) {
        
        echo '<script>alert("Registro exitoso"); window.location.replace("login.php");</script>';
        exit; 
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/formulario-registro.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-cover" style="background-image: url('../img/login.jpg'); background-repeat: no-repeat; background-size: cover;">

<div class="container-registro">
    <h2 class="titulo2 mb-4">REGISTRO</h2>
    <form action="" method="POST"  accept-charset="UTF-8">
        <input type="text" class="form-control input2" id="nombre" name="nombre" placeholder="NOMBRE" autocomplete="off">
        <input type="email" class="form-control input2" id="correo" name="correo" placeholder="CORREO" autocomplete="off">
        <select class="form-control input2" id="rol" name="rol">
            <option value="" disabled selected>SELECCIONA ROL</option>
            <option value="Administrador">ADMINISTRADOR</option>
            <option value="Coordinador">COORDINADOR</option>
            <option value="Soporte técnico">SOPORTE TECNICO</option>
        </select>
        <input type="text" class="form-control input2" id="usuario" name="usuario" placeholder="USUARIO" autocomplete="off">
        <input type="password" class="form-control input2" id="password" name="password" placeholder="CONTRASEÑA" autocomplete="off">
        <button type="submit" class="btn btn-primary btn-block">REGISTRARME</button>
    </form>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>
