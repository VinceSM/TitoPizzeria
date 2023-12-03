<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['usuarios'])) {
    header("Location: ../Pizzeria/php/main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>Menú de Pizzas</title>
</head>
<body>
    <header>
        <div class="header-box">
            <h1>Nuestras Pizzas</h1>
            <h2>Menú de Pizzas</h2>
        </div>
        <ul>
            <a href="../Pizzeria/php/main.php" id="volver" class="cta-button">Volver</a>
            <a href="../Pizzeria/php/pedido.php" class="cta-button">Ordenar Ahora</a>
        </ul>
    </header>  
    <section class="pizza-list">
    <?php

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "pizzeria"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pizzas_generadas"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["nombre"];
            $descripcion = $row["descripcion"];
            $precio = $row["precio"];
            $imagen_url = $row["imagen_url"];

            echo "<div class='pizza-item'>";
            echo "<img src='" . $imagen_url . "' alt='" . $nombre . "' width='275' height='183'>";
            echo "<h3>" . $nombre . "</h3>";
            echo "<p>" . $descripcion . "</p>";
            echo "<p>Precio: $" . $precio . "</p>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron pizzas generadas en la base de datos."; // Actualizado para mostrar pizzas generadas
    }

    $conn->close();
    ?>

    </section>
    <br>
    <br>
    <br>
    <footer>
        <p>© 2023 Pizzería Tito's. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
