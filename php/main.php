<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"> <!-- Enlace al archivo CSS principal -->
    <link rel="stylesheet" href="css/menudesp.css"> <!-- Enlace a un archivo CSS adicional para el menú -->
    <title>Pizzería Tito's</title>
</head>
<body>
    <header>
        <!-- Encabezado de la página -->
        <div class="header-box">
            <br>
            <br>
            <!-- Botón para mostrar el menú -->
            <button id="menu-button" class="cta-button">Indice</button>
            <!-- Menú desplegable -->
            <div id="menu-dropdown" class="dropdown-content">
                <a href="../Pizzeria/php/menu.php">Ver Menú</a>
                <a href="../Pizzeria/php/pedido.php">Ordenar Ahora</a>
                <!-- <a href="upload_img.php">Solo personal autorizado</a> -->
                <a href="../Pizzeria/php/logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </header>
    <!-- División para mostrar una imagen -->
    <div class="imagen">
        <img src="jpg/SMP.png" alt="fondo" width="800px" height="50%">
    </div>  
    <!-- Pie de página -->
    <footer>
        <p>© 2023 Pizzería Tito's. Todos los derechos reservados.</p>
    </footer>

    <script src="menu.js"></script> <!-- Enlace al archivo JavaScript -->
</body>
</html>
