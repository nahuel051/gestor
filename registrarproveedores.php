<?php
session_start();
include('conexion.php');
include('validaciones.php');

$mensajers = $mensajeCUIT = $mensajeTelefono = $mensajedireccion = $mensajelocalidad = $mensajeCUIT2 = $mensajeEmail = $mensaje = "";
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}
$rolAdministrador = $_SESSION['usuario']['id_rol'];

if(isset($_POST['registrar'])){
    $razonsocial = $_POST['razon_social'];
    $cuit = $_POST['cuit'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];

    if (empty($razonsocial) || empty($cuit) || empty($email) || empty($telefono) || empty($direccion) || empty($localidad)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
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
        $mensajedireccion = "El formato de direccion no es valido";
    }

    if(!validarLocalidad($localidad)){
        $mensajelocalidad = "El formato de localidad no es valido";
    }

    $sqlcuit = "SELECT * FROM proveedor WHERE cuit = '$cuit'";
    $repiteCUIT = mysqli_query($con, $sqlcuit);
    if(mysqli_num_rows($repiteCUIT) > 0){
        $mensajeCUIT2 = "Este CUIT ya esta registrado";
    }

    $sqlEmail = "SELECT * FROM proveedor WHERE email = '$email'";
    $repiteEMAIL = mysqli_query($con, $sqlEmail);
    if(mysqli_num_rows($repiteEMAIL) > 0){
        $mensajeEmail = "Este correo electronico ya esta registrado";
    }

    if(empty($mensajers) && empty($mensajeCUIT) && empty($mensajeTelefono) && empty($mensajedireccion) && empty($mensajelocalidad) && empty($mensajeCUIT2) && empty($mensajeEmail)){
        $sql = "INSERT INTO proveedor VALUES(null, '$razonsocial', '$cuit', '$email', '$telefono', '$direccion', '$localidad')";
        $guardar = mysqli_query($con, $sql);

       if ($guardar) {
    $id_proveedor = mysqli_insert_id($con); 
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (3, $id_usuario, $id_proveedor, 'proveedor')";
    $guardar_movimiento = mysqli_query($con, $sql_movimiento);

    if ($guardar_movimiento) {
        header('Location: proveedores.php');
        exit;
    } else {
        $mensaje = "Ha ocurrido un error al registrar el movimiento: " . mysqli_error($con);
    }
} else {
    $mensaje = "Ha ocurrido un error al registrarse: " . mysqli_error($con);
}
}
}
}
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<h2>Registrar Proveedor</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
    <form action="registrarproveedores.php" method="post" autocomplete="off">
    <input type="text" placeholder="Razon Social" name="razon_social" value="<?php echo isset($_POST['razon_social']) ? $_POST['razon_social'] : ''; ?>">
    <span><?php echo (!empty($mensajers)) ? '<br>' . $mensajers : ''; ?></span>
    <input type="number" placeholder="CUIT" name="cuit" value="<?php echo isset($_POST['cuit']) ? $_POST['cuit']: '';?>">
    <span><?php echo (!empty($mensajeCUIT)) ? '<br>' . $mensajeCUIT : ''; ?></span>
    <span><?php echo (!empty($mensajeCUIT2)) ? '<br>' . $mensajeCUIT2 : ''; ?></span>
    <input type="email" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email']: '';?>">
    <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
    <input type="number" placeholder="Telefono" name="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono']: '';?>">
    <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
    <input type="text" placeholder="Dirección" name="direccion" value="<?php echo isset($_POST['direccion']) ? $_POST['direccion']: ''; ?>">
    <span><?php echo (!empty($mensajedireccion)) ? '<br>' . $mensajedireccion : ''; ?></span>
    <input type="text" placeholder="Localidad" name="localidad" value="<?php echo isset($_POST['localidad']) ? $_POST['localidad']: '';?>">
    <span><?php echo (!empty($mensajelocalidad)) ? '<br>' . $mensajelocalidad : ''; ?></span>
    <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
    <input type="submit" value="Registrar" name="registrar">
    </form>
    </div>
    </section>
    </div>
</body>
</html>