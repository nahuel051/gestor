<?php
session_start();
include("conexion.php");
include("validaciones.php");
$mensajeCAMPOS = $mensaje = "";
$rolAdministrador = $_SESSION['usuario']['id_rol'];
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

$sqlProveedores = "SELECT id_proveedor, razon_social FROM proveedor ORDER BY razon_social ASC";
$resultadoProveedores = mysqli_query($con, $sqlProveedores);

if(isset($_POST['registrar'])){
    $nom_producto = $_POST['nom_producto'];
    $stock = $_POST['stock'];
    $preciocompra = $_POST['precio_compra'];
    $precioventa = $_POST['precio_venta'];
    $descripcion = $_POST['descripcion'];
    $proveedor = $_POST['proveedor'];

    if (empty($nom_producto) || empty($stock) || empty($preciocompra) || empty($precioventa) || empty($descripcion) || empty($proveedor)) {
        $mensajeCAMPOS = "Todos los campos son obligatorios";
    } else{
    $sql = "INSERT INTO producto (nom_producto, stock, precio_compra, precio_venta, descripcion, id_proveedor) 
            VALUES ('$nom_producto', '$stock', '$preciocompra', '$precioventa', '$descripcion', '$proveedor')";
   $guardar = mysqli_query($con, $sql);

   if ($guardar) {
    $id_producto = mysqli_insert_id($con); 
    $id_usuario = $_SESSION['usuario']['id_usuario']; 
    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (2, $id_usuario, $id_producto, 'producto')";
    $guardar_movimiento = mysqli_query($con, $sql_movimiento);
    if ($guardar_movimiento) {
        header('Location: producto.php');
        exit;
    } else {
        $mensaje = "Ha ocurrido un error al registrar el movimiento: " . mysqli_error($con);
    }
} else {
    $mensaje = "Ha ocurrido un error al registrarse: " . mysqli_error($con);
}
}
}
?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<h2>Registrar Producto</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
    <form action="registrarproducto.php" method="post" autocomplete="off">
        <input type="text" placeholder="Producto" name="nom_producto" value="<?php echo isset($_POST['nom_producto']) ? $_POST['nom_producto']: ''; ?>">
        <input type="number" placeholder="Stock" name="stock" value="<?php echo isset($_POST['stock']) ? $_POST['stock']: ''; ?>">
        <input type="number" placeholder="Precio de compra" name="precio_compra" value="<?php echo isset($_POST['precio_compra']) ? $_POST['precio_compra']: ''; ?>">
        <input type="number" placeholder="Precio de venta" name="precio_venta" value="<?php echo isset($_POST['precio_venta']) ? $_POST['precio_venta']: ''; ?>">
        <input type="text" placeholder="Descripción" name="descripcion" value="<?php echo isset($_POST['descripcion']) ? $_POST['descripcion']: ''; ?>">
        <select name="proveedor">
            <option value="">Proveedor</option>
        <?php
            while ($rowProveedor = mysqli_fetch_assoc($resultadoProveedores)) {
                $select = (isset($_POST['proveedor']) && $_POST['proveedor'] == $rowProveedor['id_proveedor']) ? 'selected' : '';
                echo "<option value='" . $rowProveedor['id_proveedor'] . "' $select>" . $rowProveedor['razon_social'] . "</option>";
            }
        ?>
        </select>
        <span><?php echo (!empty($mensajeCAMPOS)) ? '<br>' . $mensajeCAMPOS: ''; ?></span>
        <input type="submit" value="Registrar" name="registrar">
    </form>
    </div>
    </section>
    </div>
</body>
</html>