<?php
session_start();
include("conexion.php");
include('validaciones.php');
$mensajers = $mensajeCUIT = $mensajeTelefono = $mensajedireccion = $mensajelocalidad = $mensajeCUIT2 = $mensajeEmail = "";
$rolAdministrador = $_SESSION['usuario']['id_rol'];
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

if(isset($_GET['id_proveedor'])){
    $id = $_GET['id_proveedor'];
    $sql = "SELECT * FROM `proveedor` WHERE `id_proveedor` = $id";
    $resultado = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $razonsocial = $row['razon_social'];
        $cuit = $row['cuit'];
        $email = $row['email'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $localidad = $row['localidad'];
    }
}

if(isset($_POST['guardar'])){
    $id = $_GET['id_proveedor'];
    $razonsocial = $_POST['razon_social'];
    $cuit = $_POST['cuit'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];

    if (empty($razonsocial) || empty($cuit) || empty($email) || empty($telefono) || empty($direccion) || empty($localidad)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
    $sqlcuit = "SELECT * FROM proveedor WHERE cuit = '$cuit' AND id_proveedor <> $id";
    $repiteCUIT = mysqli_query($con, $sqlcuit);
    if(mysqli_num_rows($repiteCUIT) > 0){
        $mensajeCUIT2 = "Este CUIT ya esta registrado";
    }

    $sqlEmail = "SELECT * FROM proveedor WHERE email = '$email' AND id_proveedor <> $id";
    $repiteEMAIL = mysqli_query($con, $sqlEmail);
    if(mysqli_num_rows($repiteEMAIL) > 0){
        $mensajeEmail = "Este correo electronico ya esta registrado";
    }

    
    if(!validarRazonSocial($razonsocial)){
        $mensajers = "El formato de razon social no es valido";
    }
    if(!validarCUIT($cuit)){
        $mensajeCUIT = "El formatod de CUIT no es valido";
    }
    if(!validarTelefono($telefono)){
        $mensajeTelefono = "El formato de telefono no es valido";
    }
    if(!validarDireccion($direccion)){
        $mensajedireccion = "El foramto de direccion no es valido";
    }
    if(!validarLocalidad($localidad)){
        $mensajelocalidad = "El formato de localidad no es valido";
    }
    if(empty($mensajers) && empty($mensajeCUIT) && empty($mensajeTelefono) && empty($mensajedireccion) && empty($mensajelocalidad) && empty($mensajeCUIT2) && empty($mensajeEmail)){
        $sql = "UPDATE `proveedor` SET razon_social = '$razonsocial', cuit = '$cuit', email = '$email', telefono = '$telefono', localidad = '$localidad', direccion = '$direccion' WHERE id_proveedor = $id";
        $guardar = mysqli_query($con, $sql);

        if($guardar){
            $id_proveedor_actualizado = $id;
            $id_usuario = $_SESSION['usuario']['id_usuario'];
            $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (7, $id_usuario, $id_proveedor_actualizado, 'proveedor')";
            $guardar_movimiento = mysqli_query($con, $sql_movimiento);

            if($guardar_movimiento){
                header("location: proveedores.php");
                exit;
            }else{
                $mensaje = "Ha ocurrido un error al registrar el movimiento ". mysqli_error($con);
            }
        }else{
            $mensaje = "Ha ocurrido un error al registrarse ". mysqli_error($con);
        }       
    }    
    }
}

?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<h2>Editar Proveedor</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
    <form action="editproveedor.php?id_proveedor=<?php echo $_GET['id_proveedor'];?>" method="POST" autocomplete="off">
    <input type="text" name="razon_social" value="<?php echo $razonsocial?>">
    <span><?php echo (!empty($mensajers)) ? '<br>' . $mensajers : ''; ?></span>
    <input type="number" name="cuit" value="<?php echo $cuit?>">
    <span><?php echo (!empty($mensajeCUIT)) ? '<br>' . $mensajeCUIT : ''; ?></span>
    <span><?php echo (!empty($mensajeCUIT2)) ? '<br>' . $mensajeCUIT2 : ''; ?></span>
    <input type="email" name="email" value="<?php echo $email?>">
    <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
    <input type="number" name="telefono" value="<?php echo $telefono?>">
    <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
    <input type="text" name="direccion" value="<?php echo $direccion ?>">
    <span><?php echo (!empty($mensajedireccion)) ? '<br>' . $mensajedireccion : ''; ?></span>
    <input type="text" name="localidad" value="<?php echo $localidad?>">
    <span><?php echo $mensajelocalidad?></span>
    <span><?php echo (!empty($mensajelocalidad)) ? '<br>' . $mensajelocalidad : ''; ?></span>
    <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
    <input type="submit" value="Guardar" name="guardar">
    </form>
    </div>
    </section>
    </div>
</body>
</html>