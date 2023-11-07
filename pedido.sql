
USE pizzeria;

-- Crear una tabla para almacenar pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_pizza VARCHAR(255) NOT NULL,
    cantidad INT NOT NULL,
    direccion_entrega VARCHAR(255) NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado_pedido ENUM('en_proceso', 'enviado', 'cancelado', 'entregado') DEFAULT 'en_proceso',
    total_pedido DECIMAL (10, 2) NOT NULL
);

GRANT ALL PRIVILEGES ON pedidos.* TO 'nombre_de_usuario'@'localhost' IDENTIFIED BY 'tu_contraseña';
