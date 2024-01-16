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
$sql = "SELECT * FROM `proveedor`";
if ($orden === 'alfabetico') {
    $sql .= " ORDER BY razon_social";
}
if ($orden === 'recientes') {
    $sql .= " ORDER BY id_proveedor DESC ";
}
$mostrar = mysqli_query($con, $sql);
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
    <label class="nomUser"><?php echo $nombreUsuario; ?></label>
    <h1>Proveedores</h1>
<form method="get">
            <div class="botones">
            <a href="registrarproveedores.php"><i class="fa-solid fa-building-circle-arrow-right"></i>Registar</a>
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
            <th>Razon Social</th>
            <th>Cuit</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Localidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        while($row = mysqli_fetch_array($mostrar)){
        ?>
        <tr>
            <td><?php echo $row['id_proveedor']?></td>
            <td><?php echo $row['razon_social']?></td>
            <td><?php echo $row['cuit']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['telefono']?></td>
            <td><?php echo $row['direccion']?></td>
            <td><?php echo $row['localidad']?></td>
            <td>
            <a href="javascript:void(0);" onclick="confirmarEliminarProveedor(<?php echo $row['id_proveedor']; ?>)"><i class="fa-solid fa-trash"></i></a>
            <a href="editproveedor.php?id_proveedor=<?php echo $row['id_proveedor']?>"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</section>
</div>
<script>
function confirmarEliminarProveedor(id_proveedor) {
        var confirmacion = confirm("¿Estás seguro de que quieres eliminar este proveedor? Perderas los productos registrados con este proveedor!");
        if (confirmacion) {
            window.location.href = "deleteproveedor.php?id_proveedor=" + id_proveedor;
        }
    }
</script>
</body>
</html>