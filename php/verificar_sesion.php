<?php
// Verificar si el usuario no está autenticado
if (!isset($_SESSION['usuarios'])) {
    header("Location: /php/main.php");
    exit();
}
?>
