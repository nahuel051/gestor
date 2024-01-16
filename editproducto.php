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
$sqlProveedores = "SELECT id_proveedor, razon_social FROM proveedor";
$resultadoProveedores = mysqli_query($con, $sqlProveedores);

if(isset($_GET['id_producto'])){
    $id = $_GET['id_producto'];
    $sql = "SELECT * FROM `producto` WHERE `id_producto` = $id";
    $resultado = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $nom_producto = $row['nom_producto'];
        $stock = $row['stock'];
        $preciocompra = $row['precio_compra'];
        $precioventa = $row['precio_venta'];
        $descripcion = $row['descripcion'];
        $proveedor = $row['id_proveedor'];
    }
}

if(isset($_POST['guardar'])){
    $id = $_GET['id_producto'];
    $nom_producto = $_POST['nom_producto'];
    $stock = $_POST['stock'];
    $preciocompra = $_POST['precio_compra'];
    $precioventa = $_POST['precio_venta'];
    $descripcion = $_POST['descripcion'];
    $proveedor = $_POST['proveedor'];
    if (empty($nom_producto) || empty($stock) || empty($preciocompra) || empty($precioventa) || empty($descripcion) || empty($proveedor)) {
        $mensajeCAMPOS = "Todos los campos son obligatorios";
    } else{
    $sql = "UPDATE `producto` SET nom_producto = '$nom_producto', stock = '$stock', precio_compra = '$preciocompra', precio_venta = '$precioventa', descripcion = '$descripcion', id_proveedor = '$proveedor' WHERE id_producto = $id";
    $guardar = mysqli_query($con, $sql);

    if($guardar){
        $id_producto_actualizado = $id;
        $id_usuario = $_SESSION['usuario']['id_usuario'];
        $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (6, $id_usuario, $id_producto_actualizado, 'producto')";
        $guardar_movimiento = mysqli_query($con, $sql_movimiento);

        if($guardar_movimiento){
            header("location: producto.php");
            exit;
        }else{
            $mensaje = "Ha ocurrido un error al registrar el movimiento ". mysqli_error($con);
        }
    }else{
        $mensaje = "Ha ocurrido un error al registrarse ". mysqli_error($con);
    }
}
}
?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<h2>Editar Producto</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
<form action="editproducto.php?id_producto=<?php echo $_GET['id_producto'];?>" method="POST" autocomplete="off">       
        <input type="text" name="nom_producto" value="<?php echo $nom_producto?>">
        <input type="number" name="stock" value="<?php echo $stock?>">
        <input type="number" name="precio_compra" value="<?php echo $preciocompra ?>">
        <input type="number" name="precio_venta" value="<?php echo  $precioventa ?>">
        <input type="text" name="descripcion" value="<?php echo $descripcion ?>">
        <select name="proveedor">
            <option value=""></option>
        <?php
            while ($rowProveedor = mysqli_fetch_assoc($resultadoProveedores)) {
                $select = ($proveedor == $rowProveedor['id_proveedor']) ? 'selected' : '';
                echo "<option value='" . $rowProveedor['id_proveedor'] . "' $select>" . $rowProveedor['razon_social'] . "</option>";
            }
        ?>
        </select>
        <span><?php echo (!empty($mensajeCAMPOS)) ? '<br>' . $mensajeCAMPOS: ''; ?></span>
        <input type="submit" value="Registrar" name="guardar">
        </form>
    </div>
    </section>
    </div>
</body>
</html>