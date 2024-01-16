<?php
session_start();
include('conexion.php');
if (isset($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];
    $sql = "DELETE FROM `cliente` WHERE `id_cliente` = $id";
    $resultado = mysqli_query($con, $sql);
    $id_cliente_delete = $id;
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (8, $id_usuario, $id_cliente_delete, 'cliente')";
    $guardar_movimiento = mysqli_query($con, $sql_movimiento);
    if (!$resultado) {
        echo "<script>alert('Error!');</script>";
    } else {
        header("Location: cliente.php");
        exit();
    }
}
?>