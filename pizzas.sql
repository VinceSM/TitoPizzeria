-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 20:24:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas_generadas`
--

CREATE TABLE `pizzas_generadas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pizzas_generadas`
--

INSERT INTO `pizzas_generadas` (`id`, `nombre`, `descripcion`, `precio`, `imagen_url`) VALUES
(4, 'Napolitana', 'Salsa de tomate, mozzarella fresca de búfala, tomates cherry, anchoas, aceitunas y albahaca fresca.', 3500.00, '../jpg/pizza_napolitana.jpg'),
(5, 'Margarita', 'Salsa de tomate, mozzarella fresca, albahaca y un toque de aceite de oliva.', 3500.00, '../jpg/pizza_margarita.jpg'),
(6, 'Pepperoni', 'Deliciosa pizza con salsa de tomate, generosas rodajas de pepperoni y queso fundido.', 3000.00, '../jpg/pizza_pepperoni.jpg'),
(7, 'Hawaiana', 'Una combinación perfecta de piña, jamón, salsa de tomate y queso derretido.', 2500.00, '../jpg/pizza_hawaiana.jpg'),
(8, 'BBQ Chicken', 'Una pizza con salsa barbacoa, pollo a la parrilla y queso.', 5000.00, '../jpg/pizza_bbq_chicken.jpg'),
(9, 'Cuatro Quesos', 'Mezcla de quesos como mozzarella, parmesano, roquefort y provolone sobre una base de salsa de tomate.', 4000.00, '../jpg/pizza_cuatro_quesos.jpg'),
(10, 'Vegetariana', 'Variedad de verduras frescas como pimientos, champiñones, cebolla, tomate y aceitunas sobre una base de salsa de tomate.', 3500.00, '../jpg/pizza_vegetariana.jpg'),
(11, 'Mexicana', 'Carne molida sazonada, jalapeños picantes, y salsa de tomate con queso cheddar.', 5000.00, '../jpg/pizza_mexicana.jpg'),
(12, 'Carnivora', 'Una mezcla de carnes como pepperoni, jamón, salchicha, carne de res y salsa de tomate con queso.', 4000.00, '../jpg/pizza_carnivora.jpg'),
(13, 'Calzone', 'Salsa de tomate, mozzarella, jamón, champiñones y pepperoni', 3000.00, '../jpg/pizza_calzone.jpg'),
(14, 'Mozzarella', 'Una pizza clásica con salsa de tomate, mozzarella, un chorrito de aceite de oliva y orégano', 2500.00, '../jpg/pizza_mozzarella.jpg'),
(15, 'Marinera', 'Combina mariscos frescos como camarones, mejillones y calamares con salsa de tomate y queso.', 4500.00, '../jpg/pizza_marinera.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pizzas_generadas`
--
ALTER TABLE `pizzas_generadas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pizzas_generadas`
--
ALTER TABLE `pizzas_generadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
