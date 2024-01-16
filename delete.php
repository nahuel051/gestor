<?php
include("conexion.php");

if (isset($_GET['id_usuario'])) {
    $id = $_GET['id_usuario'];
    $sql_delete_movimientos = "DELETE FROM `usermovimiento` WHERE `id_usuario` = $id";
    $resultado_delete_movimientos = mysqli_query($con, $sql_delete_movimientos);

    if (!$resultado_delete_movimientos) {
        echo "<script>alert('Error al eliminar movimientos');</script>";
    } else {
        $sql_delete_usuario = "DELETE FROM `usuario` WHERE `id_usuario` = $id";
        $resultado_delete_usuario = mysqli_query($con, $sql_delete_usuario);
        if (!$resultado_delete_usuario) {
            echo "<script>alert('Error al eliminar usuario');</script>";
        } else {
            header("Location: usuarios.php");
            exit();
        }
    }
}
?>