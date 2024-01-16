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
$orden = isset($_GET['ordenar']) ? $_GET['ordenar'] : '';

$sql = "SELECT p.*, pr.razon_social 
FROM producto p 
JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor";
if ($orden === 'alfabetico') {
    $sql .= " ORDER BY p.nom_producto";
}
if ($orden === 'recientes') {
    $sql .= " ORDER BY p.id_producto DESC ";
}
$mostrar = mysqli_query($con, $sql);
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
    <label class="nomUser"><?php echo $nombreUsuario; ?></label>
    <h1>Productos</h1>
    <form method="get">
            <div class="botones">
            <a href="registrarproducto.php"><i class="fa-solid fa-box"></i>Registar</a>
                <select name="ordenar" onchange="this.form.submit()">
                    <option value="">Ordenar por</option>
                    <option value="alfabetico" <?php echo ($orden == 'alfabetico') ? 'selected' : ''; ?>>Orden alfabético</option>
                    <option value="recientes" <?php echo ($orden == 'recientes') ? 'selected' : ''; ?>>Recientes</option>
                </select>
                </div>
        </form>
    <table class="table-user">
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Stock</th>
                <th>Fecha</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Descripcion</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($mostrar)){ ?>
            <tr>
                <td><?php echo $row['id_producto']?></td>
                <td><?php echo $row['nom_producto']?></td>
                <td><?php echo $row['stock']?></td>
                <td><?php echo $row['fecha']?></td>
                <td><?php echo '$' . number_format($row['precio_compra'], 2)?></td>
                <td><?php echo '$' . number_format($row['precio_venta'], 2)?></td>
                <td><?php echo $row['descripcion']?></td>
                <td><?php echo $row['razon_social']?></td>
                <td>
                <a href="javascript:void(0);" onclick="confirmarEliminarProducto(<?php echo $row['id_producto']; ?>)"><i class="fa-solid fa-trash"></i></a>
                <a href="editproducto.php?id_producto=<?php echo $row['id_producto']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </section>
</div>
<script>
function confirmarEliminarProducto(id_producto) {
        var confirmacion = confirm("¿Estás seguro de que quieres eliminar este producto?");
        if (confirmacion) {
            window.location.href = "deleteproducto.php?id_producto=" + id_producto;
        }
    }
</script>
</body>
</html>