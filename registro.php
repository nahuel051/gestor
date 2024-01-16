<?php
session_start();
include('conexion.php');
include('validaciones.php');

$mensaje = $mensajeDNI = $mensajeEmail = $mensajeTelefono = $mensajeNombre = $mensajeContraseña = $mensajeDNI2 =  $mensajeROL = "";
$rolAdministrador = (isset($_SESSION['usuario']["id_rol"]) ? $_SESSION['usuario']["id_rol"] : 0);
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

if($rolAdministrador == 1) {
if(isset($_POST['registrar'])){
    $nombre = $_POST['nom_ape'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $rol = (isset($_POST['roles'])) ? $_POST['roles'] : "";
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (empty($nombre) || empty($dni) || empty($email) || empty($telefono) || empty($rol) || empty($pass1) || empty($pass2)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
    if (!validarDNI($dni)){
        $mensajeDNI = "El DNI no es válido.";
    }
    if (!validarTelefono($telefono)){
        $mensajeTelefono = "El formato del telefono es incorrecto";
    }
    if (!validarNombreApellido($nombre)){
        $mensajeNombre = "El formato de nombre y apellido es incorrecto";
    }
    if (!validarContraseña($pass1)) {
        $mensajeContraseña = "La contraseña no cumple con los requisitos de seguridad.";
    } elseif ($pass1 !== $pass2) {
        $mensajeContraseña = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    }
        $sqlDNI = "SELECT * FROM usuario WHERE dni = '$dni'";
        $resultDNI = mysqli_query($con, $sqlDNI);
        if (mysqli_num_rows($resultDNI) > 0) {
            $mensajeDNI2 = "Este DNI ya está registrado.";
        }

        $sqlEmail = "SELECT * FROM usuario WHERE mail = '$email'";
        $resultEmail = mysqli_query($con, $sqlEmail);
        if (mysqli_num_rows($resultEmail) > 0) {
            $mensajeEmail = "Este correo electrónico ya está registrado.";
        }


    if (empty($mensajeDNI) && empty($mensajeEmail) && empty($mensajeTelefono) && empty($mensajeNombre) && empty($mensajeContraseña) && empty($mensajeDNI2) && empty($mensajeEmail) && empty($mensajeROL)) {
        $sql = "INSERT INTO usuario VALUES(null, '$nombre', '$dni', '$email', '$telefono', '$pass1', '$rol')";
        $guardar = mysqli_query($con, $sql);
        if ($guardar) {
            header('Location: usuarios.php');
            exit;
        } else {
            $mensaje = "Ha ocurrido un error al registrarse: " . mysqli_error($con);
        }
    }
}
}
}
?>

<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>
<section id="content-index">
<h2>Registrar Usuario</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
<form action="registro.php" method="post" autocomplete="off" autocomplete="off">
        <input type="text" placeholder="Nombre y Apellido" name="nom_ape" value="<?php echo isset($_POST['nom_ape']) ? $_POST['nom_ape'] : ''; ?>">
        <span><?php echo (!empty($mensajeNombre)) ? '<br>' . $mensajeNombre : ''; ?></span>
        <input type="number" placeholder="DNI" name="dni" value="<?php echo isset($_POST['dni']) ? $_POST['dni'] : ''; ?>">
        <span><?php echo (!empty($mensajeDNI)) ? '<br>' . $mensajeDNI : ''; ?></span>
        <span><?php echo (!empty($mensajeDNI2)) ? '<br>' . $mensajeDNI2 : ''; ?></span>
        <input type="email" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
        <input type="number" placeholder="Telefono" name="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>">
        <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
        <select name="roles">
            <option value="">Rol</option>
            <option value="1" <?php echo (isset($_POST['roles']) && $_POST['roles'] == '1') ? 'selected' : ''; ?>>Administrador</option>
            <option value="2" <?php echo (isset($_POST['roles']) && $_POST['roles'] == '2') ? 'selected' : ''; ?>>Usuario</option>
        <input placeholder="Contraseña "type="password" name="pass1">
        <span><?php echo (!empty($mensajeContraseña)) ? '<br>' . $mensajeContraseña: ''; ?></span>
        <input placeholder="Repetir Contraseña" type="password" name="pass2">
        <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
        <input type="submit" name="registrar" value="Registrar">
    </form>
</div>
</section>
</div>
</body>
</html>

