
-- Usar la base de datos
USE pizzeria;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    rol VARCHAR (255) NOT NULL DEFAULT 'custom'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;