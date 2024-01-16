<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['usuario']['id_usuario'];
$rolAdministrador = $_SESSION['usuario']['id_rol'];
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

$mensaje_error = $mensaje_exito = $cliente_seleccionado = "";
$total_venta = 0; 

$sql_clientes = "SELECT id_cliente, nom_ape FROM cliente ORDER BY nom_ape ASC";
$resultado_clientes = mysqli_query($con, $sql_clientes);
$sqlproducto = "SELECT id_producto, nom_producto FROM producto ORDER BY nom_producto ASC";
$resultadoproducto = mysqli_query($con, $sqlproducto);

if (isset($_POST['quitar'])) {

    $indice_quitar = $_POST['indice_quitar'];
    if (isset($_SESSION['carrito'][$indice_quitar])) {
        unset($_SESSION['carrito'][$indice_quitar]);
    } else {
        $mensaje_error = "Error: Índice de producto no válido.";
    }
}

if (isset($_POST['agregarproducto'])) {
    if (empty($_POST['selectproducto'])) {
        $mensaje_error = "Error: Debes seleccionar un producto.";
    } elseif (empty($_POST['cantidadproducto']) || $_POST['cantidadproducto'] <= 0) {
        $mensaje_error = "Error: Debes ingresar una cantidad válida.";
    } else {
        $id_producto = $_POST['selectproducto'];
        $cantidad = $_POST['cantidadproducto'];

        $producto_existente = array_filter($_SESSION['carrito'], function ($item) use ($id_producto) {
            return $item['id_producto'] == $id_producto;
        });
        if (!empty($producto_existente)) {
            $mensaje_error = "Error: Este producto ya está en el carrito.";
        } else {
            $sql_precio_venta = "SELECT precio_venta FROM producto WHERE id_producto = '$id_producto'";
            $result_precio_venta = mysqli_query($con, $sql_precio_venta);
            $row_precio_venta = mysqli_fetch_assoc($result_precio_venta);
            $precio_venta = $row_precio_venta['precio_venta'];
            $importe_total = $cantidad * $precio_venta;
            $sql_stock = "SELECT stock FROM producto WHERE id_producto = '$id_producto'";
            $result_stock = mysqli_query($con, $sql_stock);
            $row_stock = mysqli_fetch_assoc($result_stock);
            $stock_actual = $row_stock['stock'];
            if ($stock_actual >= $cantidad) {
                $nuevo_stock = $stock_actual - $cantidad;
                $venta_actual = array(
                    'id_producto' => $id_producto,
                    'nom_producto' => obtenerNombreProducto($con, $id_producto),
                    'cantidad' => $cantidad,
                    'subtotal' => $importe_total
                );
                $_SESSION['carrito'][] = $venta_actual;

            } else {
                $mensaje_error = "No hay suficiente stock.";
            }
        }
    }
}

if (isset($_POST['finalizar'])) {
    $cliente_seleccionado = $_POST['selectcliente']; 
    if (empty($cliente_seleccionado)) { 
        $mensaje_error = "Error: Debes seleccionar un cliente antes de finalizar la venta.";
    } else {

        foreach ($_SESSION['carrito'] as $item) {
            $id_producto = $item['id_producto'];  
            $sql_update_stock = "UPDATE producto SET stock = stock - {$item['cantidad']} WHERE id_producto = '$id_producto'";
            mysqli_query($con, $sql_update_stock);
            $total_venta += $item['subtotal'];
        }
            $sql_insert_venta = "INSERT INTO venta (id_usuario, id_cliente, importe_total) VALUES ('$id_usuario', '$cliente_seleccionado', '$total_venta')";  
                if (mysqli_query($con, $sql_insert_venta)) {
                    $id_venta_insertado = mysqli_insert_id($con);
                    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (4, $id_usuario, $id_venta_insertado, 'venta')";
                    $guardar_movimiento = mysqli_query($con, $sql_movimiento);
                    if (!$guardar_movimiento) {
                        $mensaje_error = "Ha ocurrido un error al registrar el movimiento: " . mysqli_error($con);
                    } else {
                        unset($_SESSION['carrito']);
                        header("Location: venta.php");
                        exit();
                    }
                } else {
                    $mensaje_error = "Error al ejecutar la consulta: " . mysqli_error($con);
                }
    }
}


function obtenerNombreProducto($con, $id_producto){
    $sql = "SELECT nom_producto FROM producto WHERE id_producto = '$id_producto'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['nom_producto'];
}

if (isset($_POST['limpiar'])) {
    unset($_SESSION['carrito']);
}



?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<label class="nomUser"><?php echo $nombreUsuario; ?></label>
<h1>Ventas</h1>
<div id="formventas">
<form action="venta.php" method="post">
    <label>Producto</label><select name="selectproducto">
        <option value=""></option>
        <?php
        while ($rowproducto = mysqli_fetch_assoc($resultadoproducto)){
            $select = (isset($_POST['selectproducto']) && $_POST['selectproducto'] == $rowproducto['id_producto']) ? 'selected' : '';
            echo "<option value ='{$rowproducto['id_producto']}' $select>{$rowproducto['nom_producto']}</option>";
        }
        ?>
    </select>
    <div class="cantidad"><label>Cantidad</label><input type="number" name="cantidadproducto" min="1"></div>
    <input type="submit" id="subagregar" value="Agregar" name="agregarproducto">
    
    <a class="aventas" href="ventasrealizadas.php"><i class="fa-solid fa-cart-shopping"></i>Ventas</a>
</form>
</div>
<div class="error">
    <?php
    if (!empty($mensaje_error)) {
        echo $mensaje_error;
    }
    
    ?>
</div>
    <table class="table-user">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $indice => $item) {
                    echo "<tr>";
                    echo "<td>{$item['id_producto']}</td>";
                    echo "<td>{$item['nom_producto']}</td>"; 
                    echo "<td>{$item['cantidad']}</td>";
                    echo "<td>\$" . number_format($item['subtotal'], 2) . "</td>";
                    echo "<td>
                    <form action='venta.php' method='post'>
                        <input type='hidden' name='indice_quitar' value='$indice'>
                        <button type='submit' name='quitar'>
                             <i class='fa-solid fa-xmark'></i>
                        </button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
                $total_venta = array_sum(array_column($_SESSION['carrito'], 'subtotal'));
            }
            ?>
        </tbody>
    </table>

    <div class="formularioventas">
    <form action="venta.php" method="post">
        <label>Cliente</label> <select name="selectcliente">
            <option value=""></option>
            <?php
            while ($row_cliente = mysqli_fetch_assoc($resultado_clientes)) {
                echo "<option value ='{$row_cliente['id_cliente']}'>{$row_cliente['nom_ape']}</option>";
            }
            ?>
        </select>

        <input type="text" name="totalventa" value="<?php echo '$'. number_format($total_venta,2); ?>" readonly>
        <input type="submit" value="Finalizar" name="finalizar">
        <input type="submit" value="Limpiar" name="limpiar">
    </form>
    </div>
    <?php
$mensaje_error = "";
if (isset($_POST['finalizar'])) {
    if (empty($cliente_seleccionado)) {
        $mensaje_error = "Error: Debes seleccionar un cliente antes de finalizar la venta.";
    } else {

        unset($_SESSION['carrito']);
    }
} ?>

</section>
</div>
</body>
</html>
