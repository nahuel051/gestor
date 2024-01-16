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
<h1>Sesiones Registradas</h1>
<div class="botones">
<a href="movimientos.php"><i class="fa-solid fa-user-gear"></i>Movimientos</a>
<select name="ordenar">
    <option value="">Ordenar por</option>
    <option value="">Recientes</option>
    <option value="">Id</option>
    <option value="">Fecha</option>
</select>
</div>
<table class="table-user">
    <thead>
        <th>ID Sesión</th>
        <th>ID Usuario</th>
        <th>Fecha</th>
        <th>Hora Entrada</th>
        <th>Hora Salida</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM sesion";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "Error en la consulta: " . mysqli_error($con);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_sesion'] . "</td>";
                echo "<td>" . $row['id_usuario'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "<td>" . $row['hora_entrada'] . "</td>";
                echo "<td>" . $row['hora_salida'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</section>
</div>
</body>
</html>