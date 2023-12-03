<?php

session_start();
if($_SESSION["rol"] != "admin"){header("Location: ./login.html");}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagen"])) {
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root"; // Cambia esto por tu usuario de la base de datos
        $password = ""; // Cambia esto por tu contraseña de la base de datos
        $dbname = "pizzeria"; // Ajusta el nombre de tu base de datos

        $conexion = new mysqli($servername, $username, $password, $dbname);

        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }

        // Obtener los datos del formulario
        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
        $precio = floatval($_POST["precio"]);
        $nombreArchivo = $_FILES["imagen"]["name"];
        $ubicacionTemporal = $_FILES["imagen"]["tmp_name"];

        $directorioDestino = "../jpg/"; // Ajusta la ruta de destino a tu directorio
        $rutaDestino = $directorioDestino . $nombreArchivo;

        if (move_uploaded_file($ubicacionTemporal, $rutaDestino)) {
            // Guardar la información de la pizza generada en la base de datos
            $sql = "INSERT INTO pizzas_generadas (nombre, descripcion, precio, imagen_url) VALUES ('$nombre', '$descripcion', $precio, '$rutaDestino')";

            if ($conexion->query($sql) === true) {
                // Redirige al usuario a la página de menú
                header("Location: menu.php");
                exit;
            } else {
                echo "Error al guardar la información en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Error al cargar la imagen $nombreArchivo.";
        }

        $conexion->close();
    } else {
        echo "No se seleccionó ninguna imagen o hubo un error en la carga.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Carga de pizzas</title>
</head>
<body>
    <h1>Carga de pizzas</h1>
    <form action="upload_img.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>
        
        <button type="submit">Guardar Pizza</button>
    </form>
    <br>
    <br>
    <br>
    <button class= "cta-button"> <a href="logout.php">Cerrar Sesión</a> </button>
</body>
</html>
