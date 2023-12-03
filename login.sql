
-- Usar la base de datos
USE pizzeria;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50),
    password VARCHAR(255),
    email VARCHAR(100),
    telefono VARCHAR(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;