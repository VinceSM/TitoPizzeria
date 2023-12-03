<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/menudesp.css">
    <title>Pizzería Tito's</title>
</head>
<body>
    <header>
        <div class="header-box">
            <br>
            <br>
            <button id="menu-button" class="cta-button">Indice</button>
            <div id="menu-dropdown" class="dropdown-content">
                <a href="php/menu.php">Ver Menú</a>
                <a href="php/pedido.php">Ordenar Ahora</a>
                <!-- <a href="upload_img.php">Solo personal autorizado</a> -->
                <a href="php/logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </header>
    <div class="imagen">
        <img src="../jpg/SMP.png" alt="fondo" width="800px" height="50%">
    </div>  
    <footer>
        <p>© 2023 Pizzería Tito's. Todos los derechos reservados.</p>
    </footer>

    <script src="/menu.js"></script>
</body>
</html>