<?php
session_start();
include("conexion.php");
include('validaciones.php');
$mensajeDNI = $mensajeEmail = $mensajeTelefono = $mensajeNombre = $mensajeContraseña = $mensajeDNI2 = "";
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}
$rolAdministrador = $_SESSION['usuario']['id_rol'];

if(isset($_GET['id_usuario'])){
    $id = $_GET['id_usuario'];
    $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = $id";
    $resultado = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $nombre = $row['nom_ape'];
        $dni = $row['dni'];
        $email = $row['mail'];
        $telefono = $row['telefono'];
        $rol = $row['id_rol'];
        $pass1 = $row['contra_user'];
    }
}


if(isset($_POST['guardar'])){
    $id = $_GET['id_usuario'];
    $nombre = $_POST['nom_ape'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['roles'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (empty($nombre) || empty($dni) || empty($email) || empty($telefono) || empty($rol) || empty($pass1) || empty($pass2)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
            $sqlDNI = "SELECT * FROM usuario WHERE dni = '$dni' AND id_usuario <> $id";
            $resultDNI = mysqli_query($con, $sqlDNI);
            if (mysqli_num_rows($resultDNI) > 0) {
                $mensajeDNI2 = "Este DNI ya está registrado.";
            }
    
            $sqlEmail = "SELECT * FROM usuario WHERE mail = '$email' AND id_usuario <> $id";
            $resultEmail = mysqli_query($con, $sqlEmail);
            if (mysqli_num_rows($resultEmail) > 0) {
                $mensajeEmail = "Este correo electrónico ya está registrado.";
            }

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
    
    if (empty($mensajeDNI) && empty($mensajeEmail) && empty($mensajeTelefono) && empty($mensajeNombre) && empty($mensajeContraseña) && empty($mensajeDNI2) && empty($mensajeEmail)) {
        $sql = "UPDATE `usuario` SET nom_ape = '$nombre', dni = '$dni', mail = '$email', telefono = '$telefono', contra_user = '$pass1', id_rol = '$rol' WHERE id_usuario = $id";
        $guardar = mysqli_query($con, $sql);
        if($guardar){
            header("location: usuarios.php");
            exit;
        }else{
            $mensaje = "Ha ocurrido un error al editar: " . mysqli_error($con);
        }
    }
}
}

?>
<?php include("cabecera.php"); ?>
<body>
<?php include("lateral.php"); ?>

<section id="content-index">
<h2>Editar Usuario</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">

<form action="edit.php?id_usuario=<?php echo $_GET['id_usuario'];?>" method="POST" autocomplete="off">
    <input type="text" placeholder="Nombre y Apellido" name="nom_ape" value="<?php echo $nombre?>">
    <span><?php echo (!empty($mensajeNombre)) ? '<br>' . $mensajeNombre : ''; ?></span>
    <input type="number" placeholder="DNI" name="dni" value="<?php echo $dni?>">
    <span><?php echo (!empty($mensajeDNI)) ? '<br>' . $mensajeDNI : ''; ?></span>
    <span><?php echo (!empty($mensajeDNI2)) ? '<br>' . $mensajeDNI2 : ''; ?></span>
    <input type="email" placeholder="Email" name="email" value="<?php echo $email?>">
    <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
    <input type="number" placeholder="Telefono" name="telefono" value="<?php echo $telefono?>">
    <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
    <select name="roles">
    <option value="1" <?php echo ($rol == '1') ? 'selected' : ''; ?> >Administrador</option>
    <option value="2" <?php echo ($rol == '2') ? 'selected' : ''; ?>>Usuario</option>
    </select>
    <input placeholder="Contraseña" type="password" name="pass1" value="<?php echo $pass1?>">
    <span><?php echo (!empty($mensajeContraseña)) ? '<br>' . $mensajeContraseña: ''; ?></span>
    <input placeholder="Repetir Contraseña" type="password" name="pass2">
    <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
    <input type="submit" name="guardar" value="Guardar Cambios">
    </form>
    </div>
</section>
</div>
</body>
</html>