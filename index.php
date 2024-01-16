<?php
include('conexion.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}else{
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}
$rolAdministrador = $_SESSION['usuario']['id_rol'];
$sql = "SELECT COUNT(id_usuario) AS total_usuarios FROM usuario";
$resultado = mysqli_query($con, $sql);
if (!$resultado) {
    echo "Error al ejecutar la consulta: " . mysqli_error($con);
} else {
    $row = mysqli_fetch_assoc($resultado);
    $totalUsuarios = $row['total_usuarios'];
}
$sql = "SELECT COUNT(id_proveedor) AS total_proveedor FROM proveedor";
$resultado1 = mysqli_query($con, $sql);
if (!$resultado1) {
    echo "Error al ejecutar la consulta: " . mysqli_error($con);
} else {
    $row = mysqli_fetch_assoc($resultado1);
    $totalproveedor = $row['total_proveedor'];
}
$sql = "SELECT COUNT(id_venta) AS total_venta FROM venta";
$resultado2 = mysqli_query($con, $sql);
if (!$resultado2) {
    echo "Error al ejecutar la consulta: " . mysqli_error($con);
} else {
    $row = mysqli_fetch_assoc($resultado2);
    $totalventa = $row['total_venta'];
}
$sql = "SELECT SUM(importe_total) AS ganancias_totales FROM venta";
$resultado3 = mysqli_query($con, $sql);
if (!$resultado3) {
    echo "Error al ejecutar la consulta: " . mysqli_error($con);
} else {
    $row = mysqli_fetch_assoc($resultado3);
    $ganancias = $row['ganancias_totales'];
}
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
    <label class="nomUser"><?php echo $nombreUsuario; ?></label>
    <div class="cajas-container">
        <div class="caja caja1">
            <i class="fa-solid fa-user"></i>
            <div class="text-container">
                <label class="text1">Usuarios</label>
                <label class="text2"><?php echo $totalUsuarios?></label>
            </div>
        </div>
        <div class="caja caja2">
            <i class="fa-solid fa-building"></i>
            <div class="text-container">
                <label class="text1">Proveedores</label>
                <label class="text2"><?php echo $totalproveedor?></label>
            </div>
        </div>
        <div class="caja caja3">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="text-container">
                <label class="text1">Ventas</label>
                <label class="text2"><?php echo $totalventa?></label>
            </div>
        </div>
        <div class="caja caja4">
            <i class="fa-solid fa-arrow-trend-up"></i>
            <div class="text-container">
                <label class="text1">Ganancias</label>
                <label class="text2"><?php echo '$'.number_format($ganancias, 2);?></label>
            </div>
        </div>
    </div>
</section>
</div>
</body>
</html>