<?php
session_start();
include("conexion.php");

if(isset($_GET['id_proveedor'])){
    $id = $_GET['id_proveedor'];
    $sql_eliminar_productos = "DELETE FROM `producto` WHERE `id_proveedor` = $id";
    $resultado_eliminar_productos = mysqli_query($con, $sql_eliminar_productos);
    if (!$resultado_eliminar_productos) {
        echo "<script>alert('Error al eliminar productos relacionados con el proveedor');</script>";
    }
    $sql_eliminar_proveedor = "DELETE FROM `proveedor` WHERE `id_proveedor` = $id";
    $resultado_eliminar_proveedor = mysqli_query($con, $sql_eliminar_proveedor);
    if(!$resultado_eliminar_proveedor){
        echo "<script>alert('Error al eliminar el proveedor');</script>";
    } else {
        header("Location: proveedores.php");
        exit();
    }
}
?>