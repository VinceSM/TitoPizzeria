<?php
// Incluimos el script de conexión
require_once 'conexion.php';
session_start(); 

// Tomamos los datos del formulario
$username = $conexion->real_escape_string($_POST['username']);
$password = $conexion->real_escape_string($_POST['password']);
$email = $conexion->real_escape_string($_POST['email']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$telefono = $conexion->real_escape_string($_POST['telefono']);

// Usamos password_hash() para crear un nuevo hash de contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Creamos la consulta INSERT con las variables obtenidas del formulario
$sql = "INSERT INTO usuarios (username, password, email, nombre, telefono) VALUES (?, ?, ?, ?, ?)";

// Preparamos la consulta SQL
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $username, $passwordHash, $email, $nombre, $telefono);

// Ejecutamos la consulta
if ($stmt->execute()) {
    // Registro exitoso, redirigir a la página de inicio de sesión
    header("Location: ../login.html");
} else {
    // Error en el registro
    echo "Error al registrar el usuario: " . $conexion->error;
}

// Cerramos la conexión a la base de datos
$stmt->close();
$conexion->close();
?>
