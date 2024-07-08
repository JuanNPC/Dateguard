<?php
// Inicia la sesión
session_start();

// Elimina todas las variables de sesión
$_SESSION = array();

// Borra la cookie de sesión si está definida
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruye la sesión
session_destroy();

// Asegura que no se pueda hacer clic en Atrás y volver a la página anterior con la sesión aún activa
header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

// Redirige al usuario al inicio
header("Location: ../index.html");
exit;
?>
