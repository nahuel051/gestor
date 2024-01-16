<?php
session_start();
include('conexion.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');
$passwordError = $emailError = $help = "";

if(isset($_POST['login'])){
    $email = $_POST['email']; 
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE mail = '$email'";
    $login_query = mysqli_query($con, $sql);
    $usuario = mysqli_fetch_assoc($login_query);

    if ($usuario) {
        if ($usuario['contra_user'] === $password) { 
            $_SESSION['usuario'] = $usuario;
            $id_usuario = $usuario['id_usuario']; 
            $fecha = date('Y-m-d'); 
            $hora_entrada = date('H:i:s');
            $sql_registro_sesion = "INSERT INTO sesion (id_usuario, fecha, hora_entrada) VALUES ('$id_usuario', '$fecha', '$hora_entrada')";
            $result_registro_sesion = mysqli_query($con, $sql_registro_sesion);
    
            if (!$result_registro_sesion) {
                echo "Error en la consulta de registro de sesión: " . mysqli_error($con);
            }
            header('Location: index.php');
            exit;
        } else {
            $passwordError = "Contraseña incorrecta";
        }
    } else {
        $emailError = "Email incorrecto";
    }
}
?>

<?php include("cabecera.php"); ?>
<body id="body-login">
    <form action="login.php" method="post" class="login-form" autocomplete="off">
        <i class="fa-solid fa-chart-simple"></i>
        <h1>Iniciar de Sesión</h1>
        <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ? $_POST['email']: '';?>">
        <span class="error-message"><?php  echo $emailError; ?></span>
        <br>
        <input type="password" placeholder="Contraseña" name="password" required>
        <span class="error-message"><?php  echo $passwordError; ?></span>
        <p id="help">¿Tienes problemas para iniciar sesión?</p>
        <div id="mostrarmensaje"></div>
        <input type="submit" name="login" value="Login">
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('help').addEventListener('click', function() {
                var mostrar = document.getElementById("mostrarmensaje")
                mostrar.innerHTML="Informar al administrador!"
                mostrar.style.color = "red"; 
            });
        });
    </script>
</body>
</html>