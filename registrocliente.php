<?php
session_start();
include('conexion.php');
include('validaciones.php');

$mensajeDNI = $mensajeEmail = $mensajeTelefono = $mensajeNombre = $mensajeContraseña = $mensajelocalidad = $mensajedireccion = $mensajeDNI2 = "";
$rolAdministrador = $_SESSION['usuario']['id_rol'];
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

if(isset($_POST['registrar'])){
    $nombre = $_POST['nom_ape'];
    $dni_cuit = $_POST['dni_cuit'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    if (empty($nombre) || empty($dni_cuit) || empty($email) || empty($telefono) || empty($direccion) || empty($localidad)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
    if (!validarDocumento($dni_cuit)){
        $mensajeDNI = "El DNI/CUIT no es válido.";
    }
    if (!validarTelefono($telefono)){
        $mensajeTelefono = "El formato del telefono es incorrecto";
    }
    if (!validarNombreApellido($nombre)){
        $mensajeNombre = "El formato de nombre y apellido es incorrecto";
    }
    if (!validarLocalidad($localidad)){
        $mensajelocalidad = "El formato de localidad es incorrecto";
    }
    if (!validarDireccion($direccion)){
        $mensajedireccion = "El formato de dirección es incorrecto";
    }
    $sqlDNI = "SELECT * FROM cliente WHERE dni_cuit = '$dni_cuit'";
    $resultDNI = mysqli_query($con, $sqlDNI);
    if (mysqli_num_rows($resultDNI) > 0) {
        $mensajeDNI2 = "Este DNI/CUIT ya está registrado.";
    }

    $sqlEmail = "SELECT * FROM cliente WHERE email = '$email'";
    $resultEmail = mysqli_query($con, $sqlEmail);
    if (mysqli_num_rows($resultEmail) > 0) {
        $mensajeEmail = "Este correo electrónico ya está registrado.";
    }

    if (empty($mensajeDNI) && empty($mensajeEmail) && empty($mensajeTelefono) && empty($mensajeNombre) && empty($mensajelocalidad) && empty($mensajedireccion) && empty($mensajeDNI2) && empty($mensajeEmail)) {
        $sql = "INSERT INTO cliente VALUES(null, '$nombre', '$dni_cuit', '$email', '$telefono', '$direccion', '$localidad')";
        $guardar = mysqli_query($con, $sql);
        if ($guardar) {
            $id_cliente = mysqli_insert_id($con);       
            $id_usuario = $_SESSION['usuario']['id_usuario']; 
            $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (1, $id_usuario, $id_cliente, 'cliente')";
            $guardar_movimiento = mysqli_query($con, $sql_movimiento);
            if ($guardar_movimiento) {
                header('Location: cliente.php');
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
<h2>Registrar Cliente</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
<form action="registrocliente.php" method="post" autocomplete="off">
        <input type="text" placeholder="Nombre y Apellido" name="nom_ape" value="<?php echo isset($_POST['nom_ape']) ? $_POST['nom_ape'] : ''; ?>">
        <span><?php echo (!empty($mensajeNombre)) ? '<br>' . $mensajeNombre : ''; ?></span>
        <input type="number" placeholder="DNI/CUIT" name="dni_cuit" value="<?php echo isset($_POST['dni_cuit']) ? $_POST['dni_cuit'] : ''; ?>">
        <span><?php echo (!empty($mensajeDNI)) ? '<br>' . $mensajeDNI : ''; ?></span>
        <span><?php echo (!empty($mensajeDNI2)) ? '<br>' . $mensajeDNI2 : ''; ?></span>
        <input type="email" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
        <input type="number" placeholder="Telefono" name="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>">
        <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
        <input type="text" placeholder="Dirección" name="direccion" value="<?php echo isset($_POST['direccion']) ? $_POST['direccion'] : ''; ?>">
        <span><?php echo (!empty($mensajedireccion)) ? '<br>' . $mensajedireccion : ''; ?></span>
        <input type="text" placeholder="Localidad" name="localidad" value="<?php echo isset($_POST['localidad']) ? $_POST['localidad'] : ''; ?>">
        <span><?php echo (!empty($mensajelocalidad)) ? '<br>' . $mensajelocalidad : ''; ?></span>
        <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
        <input type="submit" name="registrar" value="Registrar">
    </form>
    </div>
    </section>
    </div>
    </body>
</html>

