<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Realizar la consulta para eliminar el registro con el ID proporcionado
    $sql = "DELETE FROM registro_activos WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Mostrar alerta y recargar la página
        echo '<script>alert("Registro eliminado correctamente."); window.location.href = "../vista/interfaces/admi-elim-modi.php";</script>';
    } else {
        echo '<script>alert("Error al intentar eliminar el registro: ' . mysqli_error($conn) . '"); window.location.href = "admi-elim-mod.php";</script>';
    }

    mysqli_close($conn);
} else {
    echo '<script>alert("ID de registro no especificado."); window.location.href = "admi-elim-mod.php";</script>';
}
?>
