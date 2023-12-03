<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos (asegúrate de que 'conexion.php' esté correctamente configurado)
    require_once '/php/conexion.php';

    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Validar los datos (puedes agregar más validaciones según tus requerimientos)

    if (empty($username) || empty($password) || empty($email)) {
        // Manejar el caso en que falten campos
        echo "Por favor, completa todos los campos.";
    } else {
        // Insertar los datos en la base de datos
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (usuario, password, email, telefono) ";
        $sql .= "VALUES ('$username', '$passwordHash', '$email', '$telefono')";
        

        if ($conexion->query($sql) === TRUE) {
            // Registro exitoso, redirigir a la página de inicio de sesión
            header("Location: login.html");
        } else {
            // Error al registrar, redirigir a una página de error o mostrar un mensaje de error
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Redirigir si se accede directamente a este archivo sin enviar el formulario
    header("Location: /php/nuevo-usuario.php");
}
?>
