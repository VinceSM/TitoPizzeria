<?php
// Inicializar variables para mensajes de éxito y error
$success_message = $error_message = "";

// Verificar si el formulario de pedido se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoPizza = $_POST["tipo-pizza"];
    $cantidad = $_POST["cantidad"];
    $direccionEntrega = $_POST["direccion"];
    $totalPedido = 0;

    // Conectar a la base de datos (ajusta los detalles de conexión según tu configuración)
    $conexion = mysqli_connect("localhost", "root", "", "pizzeria");
    $conexion2 = mysqli_connect("localhost", "root", "", "pizzeria");

    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Obtener el precio de la pizza desde la tabla pizzas_generadas
    $sql_pizza = "SELECT precio FROM pizzas_generadas WHERE nombre = '$tipoPizza'";
    $result_pizza = mysqli_query($conexion2, $sql_pizza);

    if ($result_pizza && mysqli_num_rows($result_pizza) > 0) {
        $row_pizza = mysqli_fetch_assoc($result_pizza);
        $precioPizza = $row_pizza["precio"];

        // Calcular el total del pedido multiplicando el precio por la cantidad
        $totalPedido = $precioPizza * $cantidad;

        // Preparar la consulta SQL para insertar el pedido
        $sql_pedido = "INSERT INTO pedidos (tipo_pizza, cantidad, direccion_entrega, total_pedido) 
        VALUES ('$tipoPizza', $cantidad, '$direccionEntrega', $totalPedido)";

        if (mysqli_query($conexion, $sql_pedido)) {
            $success_message = "Pedido realizado con éxito. Total: $" . $totalPedido;
        } else {
            $error_message = "Error al realizar el pedido: " . mysqli_error($conexion);
        }
    } else {
        $error_message = "No se encontró el precio de la pizza en la base de datos.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pedido.css">
    <title>Realizar Pedido</title>
</head>
<body>
    <header>
        <div class="header-box">
            <h1>Realizar Pedido</h1>
        </div>
            <ul>
                <a href="main.html" id="volver" class="cta-button">Volver</a>
            </ul>
    </header>

    <section class="order-form">
        <form action="" method="post">
            <label for="tipo-pizza">Tipo de Pizza:</label>
            <select name="tipo-pizza" id="tipo-pizza">
                <option value="">Eligir Pizza</option>
                <option value="margarita">Pizza Margarita</option>
                <option value="pepperoni">Pizza Pepperoni</option>
                <option value="hawaiana">Pizza Hawaiana</option>
                <option value="cuatro quesos">Pizza Cuatro Quesos</option>
                <option value="vegetariana">Pizza Vegetariana</option>
                <option value="mozzarella">Pizza Mozzarella</option>
                <option value="napolitana">Pizza Napolitana</option>
                <option value="calzone">Pizza Calzone</option>
                <option value="bbq_chicken">Pizza BBQ_Chicken</option>
                <option value="mexicana">Pizza Mexicana</option>
                <option value="hawaiana_deluxe">Pizza Hawaiana_Deluxe</option>
            </select>
            <br><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" value="0">
            <br><br>

            <label for="direccion">Dirección de Entrega:</label>
            <input type="text" name="direccion" id="direccion" required>
            <br><br>

            <button type="submit" class="cta-button">Realizar Pedido</button>
        </form>
        <br>
        <br>
        <?php
        // Mostrar mensajes de éxito y error
        if (!empty($success_message)) {
            echo '<div class="success-message">' . $success_message . '</div>';
        }
        if (!empty($error_message)) {
            echo '<div class="error-message">' . $error_message . '</div>';
        }
        ?>
    </section>

    <footer>
        <p>© 2023 Pizzería Tito's. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
