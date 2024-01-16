<?php
session_start();
include('conexion.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');
if (isset($_SESSION['usuario'])) {
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $hora_salida = date('H:i:s');
    $sql_actualizar_sesion = "UPDATE sesion SET hora_salida = '$hora_salida' WHERE id_usuario = '$id_usuario' AND hora_salida IS NULL";
    $result_actualizar_sesion = mysqli_query($con, $sql_actualizar_sesion);
    if (!$result_actualizar_sesion) {
        echo "Error hora de salida: " . mysqli_error($con);
    }
}
session_destroy();
header("location:login.php");
exit;
?>
