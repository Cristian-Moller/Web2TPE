-- phpMyAdmin SQL Dump

-- version 4.8.3

-- https://www.phpmyadmin.net/

--
-- Servidor: 127.0.0.1

-- Tiempo de generación: 01-10-2019 a las 01:53:32

-- Versión del servidor: 10.1.37-MariaDB

-- Versión de PHP: 7.2.12


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;
START TRANSACTION;

SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;


--
-- Base de datos: `db_concesionaria`
--

-- 
--------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--
CREATE TABLE `marca` (
  
	`id` int(11) NOT NULL,
  
	`nombre` varchar(50) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Volcado de datos para la tabla `marca`
--


INSERT INTO `marca` (`id`, `nombre`) 
VALUES
(1, 'Chery'),
(2, 'Chevrolet'),
(3, 'Volkswagen'),
(4, 'Toyota'),
(5, 'Ford'),
(6, 'Honda'),
(7, 'Fiat'),
(8, 'Renault'),
(9, 'JEEP'),
(10, 'Citroen');


-- 
--------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--


CREATE TABLE `vehiculo` (
  
	`id` int(11) NOT NULL,
  
	`nombre` varchar(50) NOT NULL,
  	
	`combustible` varchar(50) NOT NULL,
 
	`color` varchar(50) NOT NULL,
  
	`precio` int(11) NOT NULL,
  
	`id_marca_fk` int(11) NOT NULL,
  
	`vendido` tinyint(1) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Volcado de datos para la tabla `vehiculo`
--


INSERT INTO `vehiculo` (`id`, `nombre`, `combustible`, `color`, `precio`, `id_marca_fk`, `vendido`) 
VALUES	
(1, 'QQ', 'Nafta', 'Blanco', 140000, 1, 0),
	
(2, 'Corsa', 'Nafta', 'Azul', 180000, 2, 0),

	(8, 'QQ', 'Nafta', 'Gris', 1234, 1, 1),
	
(11, 'Corsa', 'Nafta', 'Azul', 175000, 2, 0),
	
(12, 'C3', 'Nafta', 'Negro', 240000, 10, 0),
	
(13, 'Siena', 'Nafta', 'Negro', 190000, 7, 0),

	(14, 'Golf R-32', 'Nafta', 'Verde', 250000, 3, 1),

	(15, 'Golf R-32', 'Nafta', 'Azul', 210000, 3, 0);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--

ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `vehiculo`
--

ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Marca` (`id_marca_fk`,`nombre`);


--
-- AUTO_INCREMENT de las tablas volcadas
--

--

-- AUTO_INCREMENT de la tabla `marca`
--

ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


--
-- AUTO_INCREMENT de la tabla `vehiculo`
--

ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculo`
--

ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marca` (`id`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
