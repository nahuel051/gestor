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
$sql = "SELECT * FROM `cliente`";
if ($orden === 'alfabetico') {
    $sql .= " ORDER BY nom_ape";
}
if ($orden === 'recientes') {
    $sql .= " ORDER BY id_cliente DESC ";
}
$mostrar = mysqli_query($con, $sql);
?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<label class="nomUser"><?php echo $nombreUsuario; ?></label>
<h1>Clientes</h1>
        <form method="get">
            <div class="botones">
            <a href="registrocliente.php"><i class="fa-solid fa-user-plus"> </i>Registar</a>
                <select name="ordenar" onchange="this.form.submit()">
                    <option value="">Ordenar por</option>
                    <option value="alfabetico" <?php echo ($orden == 'alfabetico') ? 'selected' : ''; ?>>Orden alfabético</option>
                    <option value="recientes" <?php echo ($orden == 'recientes') ? 'selected' : ''; ?>>Recientes</option>
                </select>
                </div>
        </form>
<table class="table-user">
        <thead>
            <th>#</th>
            <th>Nombre/Apellido</th>
            <th>DNI/CUIT</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Localidad</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($mostrar)){ ?>
            <tr>
                <td><?php echo $row['id_cliente'] ?></td>
                <td><?php echo $row['nom_ape'] ?></td>
                <td><?php echo $row['dni_cuit'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['telefono'] ?></td>
                <td><?php echo $row['direccion'] ?></td>
                <td><?php echo $row['localidad'] ?></td>
                <td>
                <a href="javascript:void(0);" onclick="confirmarEliminarCliente(<?php echo $row['id_cliente']; ?>)"><i class="fa-solid fa-trash"></i></a>
                <a href="editcliente.php?id_cliente=<?php echo $row['id_cliente']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>

           <?php } ?>
        </tbody>
    </table>
    </section>
</div>
<script>
function confirmarEliminarCliente(id_cliente) {
        var confirmacion = confirm("¿Estás seguro de que quieres eliminar este cliente?");
        if (confirmacion) {
            window.location.href = "deletecliente.php?id_cliente=" + id_cliente;
        }
    }
</script>
</body>
</html>

