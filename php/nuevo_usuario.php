<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // Realiza la validación de los datos (puedes agregar más validaciones según tus necesidades)

    // Conecta a la base de datos 
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "pizzeria";

    $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Inserta los datos en la base de datos (debes tener una tabla "usuarios" con los campos correspondientes)
    $sql = "INSERT INTO usuarios (usuario, password, email, telefono) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email, $telefono);

    if ($stmt->execute()) {
        // Registro exitoso
        header("Location: /login.html"); // Redirige al usuario a la página de inicio de sesión
        exit;
    } else {
        // Error en el registro
        echo "Error al registrar el usuario.";
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Nuevo Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Registro de Nuevo Usuario</h1>
    </header>
    
    <main>
        <section id="registro-form">
            <h2>¡Regístrate!</h2>
            <form action="php/procesar_registro.php" method="post">
                <div class="campo">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="campo">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="campo">
                    <label for="telefono">Telefono:</label>
                    <input type="number" name="telefono" id="telefono" required>
                </div>
                <div class="boton">
                    <button type="submit" name="registrarse">Registrarse</button>
                </div>
            </form>
        </section>
    </main>
    
    <footer>
    <p>© 2023 Tito's Pizzería. Todos los derechos Reservados</p>
    </footer>
</body>
</html>