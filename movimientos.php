<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}else{
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}
$rolAdministrador = $_SESSION['usuario']['id_rol']
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<label class="nomUser"><?php echo $nombreUsuario; ?></label>
<h1>Movimientos Registrados</h1>
<div class="botones">
<a href="sesiones.php"><i class="fa-solid fa-right-to-bracket"></i>Sesiones</a>
<select name="ordenar">
    <option value="">Ordenar por</option>
    <option value="">Recientes</option>
</select>
</div>
<table class="table-user">
    <thead>
        <th>ID Movimiento</th>
        <th>Tipo de Movimiento</th>
        <th>Usuario</th>
        <th>Modificado</th>
        <th>Hora</th>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT um.id_movimiento, tm.descripcion_mov AS tipo_movimiento, u.nom_ape AS usuario, um.hora,
    CASE 
        WHEN um.tipo_relacion = 'cliente' THEN COALESCE(c.nom_ape, 'Cliente eliminado')
        WHEN um.tipo_relacion = 'producto' THEN COALESCE(p.nom_producto, 'Producto eliminado')
        WHEN um.tipo_relacion = 'proveedor' THEN COALESCE(pr.razon_social, 'Proveedor eliminado')
        WHEN um.tipo_relacion = 'venta' THEN  COALESCE(v.id_venta, 'Venta eliminada')
        ELSE ''
    END AS relacionado
FROM usermovimiento um
INNER JOIN tipomovimientos tm ON um.tipo_movimiento = tm.id_tipomovimiento
INNER JOIN usuario u ON um.id_usuario = u.id_usuario
LEFT JOIN cliente c ON um.tipo_relacion = 'cliente' AND um.id_relacion = c.id_cliente
LEFT JOIN producto p ON um.tipo_relacion = 'producto' AND um.id_relacion = p.id_producto
LEFT JOIN proveedor pr ON um.tipo_relacion = 'proveedor' AND um.id_relacion = pr.id_proveedor
LEFT JOIN venta v ON um.tipo_relacion = 'venta' AND um.id_relacion = v.id_venta";

        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_movimiento'] . "</td>";
            echo "<td>" . $row['tipo_movimiento'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['relacionado'] . "</td>";
            echo "<td>" . $row['hora'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</section>
</div>
</body>
</html>