<?php
session_start();
include("conexion.php");
if(isset($_GET['id_producto'])){
    $id = $_GET['id_producto'];
    $sql = "DELETE FROM  `producto` WHERE `id_producto` = $id";
    $resultado = mysqli_query($con, $sql);
    $id_producto_delete = $id;
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (9, $id_usuario, $id_producto_delete, 'producto')";
    $guardar_movimiento = mysqli_query($con, $sql_movimiento);
    if(!$resultado){
        echo "<script>alert('Error!');</script>";
    }else{
        header("Location: producto.php");
        exit();
    }
}
?>