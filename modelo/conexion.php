<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

// Configurar el conjunto de caracteres a UTF-8
$conn->set_charset("utf8mb4");

// Aquí puedes continuar con tu lógica de aplicación
?>
