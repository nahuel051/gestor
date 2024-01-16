<?php
include('conexion.php');
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}else{
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}
$rolAdministrador = $_SESSION['usuario']['id_rol'];


// Obtener el parámetro de orden desde la URL
$orden = isset($_GET['ordenar']) ? $_GET['ordenar'] : '';
$sql = "SELECT v.*, cl.dni_cuit
FROM venta v
JOIN cliente cl ON v.id_cliente = cl.id_cliente";
if ($orden === 'recientes') {
    $sql .= " ORDER BY v.id_venta DESC ";
}
if ($orden === 'ordenarpor') {
    $sql .= " ORDER BY v.id_venta ASC ";
}

// Ejecutar la consulta
$mostrar = mysqli_query($con, $sql);
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
    <label class="nomUser"><?php echo $nombreUsuario; ?></label>
    <h1>Ventas Realizadas</h1>
<form method="get">
            <div class="botones">
            <a href="venta.php"><i class="fa-solid fa-cart-shopping"></i>Realizar Venta</a>
                <select name="ordenar" onchange="this.form.submit()">
                    <option value="ordenarpor">Ordenar por</option>
                    <option value="recientes" <?php echo ($orden == 'recientes') ? 'selected' : ''; ?>>Recientes</option>
                </select>
                </div>
        </form>
    <table class="table-user">
        <thead>
        <tr>
        <th>#</td>
        <th>Fecha</th>
        <th>Usuario</th>
        <th>Cliente</th>
        <th>Importe Total</th>
        <th>Acción</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            while($row = mysqli_fetch_array($mostrar)){ ?>
            <tr>
                <td><?php echo $row['id_venta']?></td>
                <td><?php echo $row['fecha']?></td>
                <td><?php echo $row['id_usuario']?></td>
                <td><?php echo $row['dni_cuit']?></td>
                <td><?php echo '$' . number_format($row['importe_total'], 2)?></td>
                <td>
                <a href="javascript:void(0);" onclick="confirmarEliminarVenta(<?php echo $row['id_venta']; ?>)"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </section>
</div>
<script>
function confirmarEliminarVenta(id_venta) {
        var confirmacion = confirm("¿Estás seguro de que quieres eliminar esta venta?");
        if (confirmacion) {
            // Si el usuario hace clic en "Aceptar", redirige al script de eliminación.
            window.location.href = "deleteventa.php?id_venta=" + id_venta;
        }
        // Si el usuario hace clic en "Cancelar", no hace nada.
    }
</script>
</body>
</html>