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
$sql = "SELECT u.*, rl.descripcion
        FROM usuario u JOIN rol rl ON u.id_rol = rl.id_rol";
if ($orden === 'alfabetico') {
    $sql .= " ORDER BY u.nom_ape";
}
if ($orden === 'recientes') {
    $sql .= " ORDER BY id_usuario DESC ";
}

$mostrar = mysqli_query($con, $sql);
?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
        <section id="content-index">
        <label class="nomUser"><?php echo $nombreUsuario; ?></label>
            <h1>Usuarios</h1>
            <form method="get">
            <div class="botones">
                <a href="registro.php"><i class="fa-solid fa-user-plus"> </i>Registar</a>
                <a href="movimientos.php"><i class="fa-solid fa-user-gear"></i>Movimientos</a>
                <select class="selectus" name="ordenar" onchange="this.form.submit()">
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
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($mostrar)){ ?>
                    <tr>
                        <td><?php echo $row['id_usuario'] ?></td>
                        <td><?php echo $row['nom_ape'] ?></td>
                        <td><?php echo $row['dni'] ?></td>
                        <td><?php echo $row['mail'] ?></td>
                        <td><?php echo $row['telefono'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmarEliminarUsuario(<?php echo $row['id_usuario']; ?>)"><i class="fa-solid fa-trash"></i></a>
                            <a href="edit.php?id_usuario=<?php echo $row['id_usuario']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>
    <script>
        function confirmarEliminarUsuario(id_usuario) {
            var confirmacion = confirm("¿Estás seguro de que quieres eliminar este usuario?");
            if (confirmacion) {
                window.location.href = "delete.php?id_usuario=" + id_usuario;
            }
        }
    </script>
</body>

</html>