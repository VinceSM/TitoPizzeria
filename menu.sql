-- Crear una base de datos si aún no existe
CREATE DATABASE IF NOT EXISTS menu;

-- Usar la base de datos
USE menu;

-- Crear una tabla para almacenar pizzas
CREATE TABLE pizzas_generadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen_url VARCHAR(255) NOT NULL
);

-- Otorgar permisos para la tabla pizzas
GRANT ALL PRIVILEGES ON menu.pizzas TO 'nombre_de_usuario'@'localhost' IDENTIFIED BY 'tu_contraseña';
