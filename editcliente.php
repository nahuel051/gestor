<?php
session_start();
include("conexion.php");
include('validaciones.php');
$mensajeDNI = $mensajeEmail = $mensajeTelefono = $mensajeNombre = $mensajeContraseña = $mensajelocalidad = $mensajedireccion = $mensajeDNI2 = $mensaje = "";
$rolAdministrador = $_SESSION['usuario']['id_rol'];
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    $nombreUsuario = $_SESSION['usuario']['nom_ape'];
}

if(isset($_GET['id_cliente'])){
    $id = $_GET['id_cliente'];
    $sql = "SELECT * FROM `cliente` WHERE `id_cliente` = $id";
    $resultado = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $nombre = $row['nom_ape'];
        $dni = $row['dni_cuit'];
        $email = $row['email'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $localidad = $row['localidad'];
    }
}

if(isset($_POST['guardar'])){
    $id = $_GET['id_cliente'];
    $nombre = $_POST['nom_ape'];
    $dni_cuit = $_POST['dni_cuit'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];

   if (empty($nombre) || empty($dni_cuit) || empty($email) || empty($telefono) || empty($direccion) || empty($localidad)) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
   $sqlDNI = "SELECT * FROM cliente WHERE dni_cuit = '$dni_cuit' AND id_cliente <> $id";
   $resultDNI = mysqli_query($con, $sqlDNI);
   if (mysqli_num_rows($resultDNI) > 0) {
       $mensajeDNI2 = "Este DNI/CUIT ya está registrado.";
   }

   $sqlEmail = "SELECT * FROM cliente WHERE email = '$email' AND id_cliente <> $id";
   $resultEmail = mysqli_query($con, $sqlEmail);
   if (mysqli_num_rows($resultEmail) > 0) {
       $mensajeEmail = "Este correo electrónico ya está registrado.";
   }
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

    if(empty($mensajeDNI) && empty($mensajeEmail) && empty($mensajeTelefono) && empty($mensajeNombre) && empty($mensajelocalidad) && empty($mensajedireccion) && empty($mensajeDNI2) && empty($mensajeEmail)){
        $sql = "UPDATE `cliente` SET nom_ape = '$nombre', dni_cuit = '$dni_cuit', email = '$email', telefono = '$telefono', localidad = '$localidad', direccion = '$direccion' WHERE id_cliente = $id";
        $guardar = mysqli_query($con, $sql);
        if($guardar){
            $id_cliente_actualizado = $id;
            $id_usuario = $_SESSION['usuario']['id_usuario'];
            $sql_movimiento = "INSERT INTO usermovimiento (tipo_movimiento, id_usuario, id_relacion, tipo_relacion) VALUES (5, $id_usuario, $id_cliente_actualizado, 'cliente')";
            $guardar_movimiento = mysqli_query($con, $sql_movimiento);
            if($guardar_movimiento){
                header("location: cliente.php");
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
<h2>Editar Cliente</h2>
<label class="nomUser1"><?php echo $nombreUsuario; ?></label>
<div class="formulario">
    <form action="editcliente.php?id_cliente=<?php echo $_GET['id_cliente'];?>" method="POST" autocomplete="off">
    <input type="text" name="nom_ape" value="<?php echo $nombre ?>">
    <span><?php echo (!empty($mensajeNombre)) ? '<br>' . $mensajeNombre : ''; ?></span>
    <input type="number" name="dni_cuit" value="<?php echo $dni ?>">
    <span><?php echo (!empty($mensajeDNI)) ? '<br>' . $mensajeDNI : ''; ?></span>
    <span><?php echo (!empty($mensajeDNI2)) ? '<br>' . $mensajeDNI2 : ''; ?></span>
    <input type="email" name="email" value="<?php echo $email ?>">
    <span><?php echo (!empty($mensajeEmail)) ? '<br>' . $mensajeEmail : ''; ?></span>
    <input type="number" name="telefono" value="<?php echo $telefono ?>">
    <span><?php echo (!empty($mensajeTelefono)) ? '<br>' . $mensajeTelefono : ''; ?></span>
    <input type="text" name="direccion" value="<?php echo $direccion ?>">
    <span><?php echo (!empty($mensajedireccion)) ? '<br>' . $mensajedireccion : ''; ?></span>
    <input type="text" name="localidad" value="<?php echo $localidad ?>">
    <span><?php echo (!empty($mensajelocalidad)) ? '<br>' . $mensajelocalidad : ''; ?></span>
    <span><?php echo (!empty($mensaje)) ? '<br>' . $mensaje : ''; ?></span>
    <input type="submit" name="guardar" value="Guardar">
    </form>
    </div>
    </section>
    </div>
</body>
</html>