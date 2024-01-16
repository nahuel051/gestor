<?php
session_start();
include("conexion.php");
if(isset($_GET['id_venta'])){
    $id = $_GET['id_venta'];
    $sql = "DELETE FROM  `venta` WHERE `id_venta` = $id";
    $resultado = mysqli_query($con, $sql);
    $id_venta_delete = $id;
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (11, $id_usuario, $id_venta_delete, 'venta')";
    $guardar_movimiento = mysqli_query($con, $sql_movimiento);
    if(!$resultado){
        echo "<script>alert('Error!');</script>";
    }else{
        header("Location: ventasrealizadas.php");
        exit();
    }
}
?>