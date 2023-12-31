<?php
session_start();

// Inicializa la variable de mensaje de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
   
   // Conectar a la base de datos (ajusta los detalles de conexión según tu configuración)
    $conexion = mysqli_connect("localhost", "root", "", "pizzeria");
   
   if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }
   
   // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$correo'";
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"];

        // if ($_SESSION["rol"] == "admin") {
        //     header("Location: upload_img.php"); // Página de administrador
        // } else {
        //     header("Location: main.php"); // Página para usuarios normales
        // }

        if (password_verify($contrasena, $hashed_password)) {
            // Inicio de sesión exitoso
            $_SESSION["usuarios"] = $row["usuario"];
            $_SESSION["rol"] = $row["rol"]; // Almacena el rol del usuario
            if ($_SESSION["rol"] == "admin") {
                header("Location: upload_img.php"); // Página de administrador
            } else {
                header("Location: main.php"); // Página para usuarios normales
            }
            mysqli_close($conexion);
            $success_message = "Inicio de sesión exitoso. Redirigiendo...";
            
            // Puedes usar una redirección meta o JavaScript para redirigir al usuario después de unos segundos
            echo '<meta http-equiv="refresh" content="2;url=main.php">';
            exit; // Salir del script
        } else {
            $error_message = "Contraseña o Correo incorrectos. Por favor, inténtelo de nuevo.";
        }
    } else {
        $error_message = "Usuario no encontrado.";
    }
    
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header id="main-header">
        <h1>Iniciar Sesión</h1>
    </header>
    <main>
        <form action="" method="POST"> 
        <div class="campo">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" required><br>
        </div>
        <div class="campo">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>
        </div>
        <div class="boton">
            <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
        </div>
        </form>
        <p>¿No tienes cuenta? <a href="nuevo_usuario.php">Regístrate aquí</a></p>
        
        <!-- Mostrar mensaje de error si existe -->
        <div id="error-message">
            <?php echo $error_message; ?>
        </div>
    </main>

    <footer id="main-footer">
        <p>© 2023 Tito's Pizzería. Todos los derechos Reservados</p>
    </footer>
</body>
</html>