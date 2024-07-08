<?php
session_start();

include '../../modelo/conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $password = $_POST['password'];

        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

           
            $stored_password = $row['contrasena'];

            
            if (password_verify($password, $stored_password)) {
               
                $_SESSION['usuario'] = $usuario;
                $_SESSION['rol'] = $row['rol'];


                switch ($row['rol']) {
                    case 'ADMINISTRADOR':
                        header("Location: administrador.php");
                        exit();
                    case 'SOPORTE TECNICO':
                        header("Location: soportetecnico.php");
                        exit();
                    case 'COORDINADOR':
                        header("Location: coordinador.php");
                        exit();
                    default:
                        
                        header("Location: error.html");
                        exit();
                }
            } else {
                
                echo "<script>alert('Contraseña incorrecta');</script>";
            }
        } else {
            
            echo "<script>alert('Usuario no encontrado');</script>";
        }
    } else {
        
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/login.css">
    <style>
        .recupera-link {
            text-decoration: none;
            margin-top: 20px;
            display: block;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-cover" style="background-image: url('../img/login.jpg');">

    <div class="container p-4 rounded" style="max-width: 400px;">
        <form action="" method="POST" class="form-container text-center">
            <h2 class="text-center mb-4">LOGIN</h2>
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="USERNAME" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">CONTRASEÑA</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" autocomplete="off" required>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <button type="submit" class="btn btn-primary me-2">INGRESA</button>
                <a href="formulario-registro.php" class="btn btn-secondary ms-2">REGISTRATE</a>
            </div>
            <a href="recovery.php" class="recupera-link">Recupera tu contraseña</a>
            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-primary" role="alert">
                    <?php
                    switch ($_GET['message']) {
                        case 'ok':
                            echo 'Por favor revisa tu correo electrónico';
                            break;
                        case 'success_password':
                            echo 'Inicia sesión con tu nueva contraseña';
                            break;
                        default:
                            echo 'Algo salió mal, intenta de nuevo';
                            break;
                    }
                    ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
