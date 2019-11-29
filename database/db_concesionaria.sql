-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2019 a las 03:53:07
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(50) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `puntuacion` int(50) NOT NULL,
  `id_usuario_fk` int(50) NOT NULL,
  `id_vehiculo_fk` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `puntuacion`, `id_usuario_fk`, `id_vehiculo_fk`) VALUES
(1, 'El vehiculo se encuentra en excelentes condiciones', 4, 2, 1),
(4, 'Le falta dibujo al rodado', 3, 2, 14),
(5, 'Esta chocao el guadabarro', 2, 1, 22),
(6, 'El tapizado es genial', 4, 2, 43),
(7, 'No puedo creer que tengan esta joya aca', 5, 1, 23),
(12, 'HOLA', 1, 2, 22),
(15, 'Se ve que lo han cuidado', 5, 1, 8),
(16, 'excelente vehiculo', 3, 1, 8),
(18, 'Buen auto', 3, 1, 8),
(19, 'Mi caballo Paco corre mas rapido', 2, 2, 1),
(20, 'Que pinturita!', 3, 4, 1),
(22, 'Que lindo para ir a la playa @Marta!!', 5, 2, 29),
(23, 'Ya junte los bartulos.. cuando salimos??', 4, 5, 29),
(24, 'Planchalo al piso pa!', 2, 5, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `Id` int(55) NOT NULL,
  `id_vehiculo_fk` int(55) NOT NULL,
  `imagen_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`Id`, `id_vehiculo_fk`, `imagen_url`) VALUES
(85, 48, 'img/vehiculo/5dd94af938988.png'),
(86, 48, 'img/vehiculo/5dd94af93a819.png'),
(0, 1, 'img/vehiculo/5de081c5e7d0b.png'),
(0, 2, 'img/vehiculo/5de081f683a9e.png'),
(0, 8, 'img/vehiculo/5de08235b7d0d.png'),
(0, 11, 'img/vehiculo/5de0825f5d552.png'),
(0, 12, 'img/vehiculo/5de08294665fc.png'),
(0, 13, 'img/vehiculo/5de082c7f0ca1.png'),
(0, 14, 'img/vehiculo/5de082ff47655.png'),
(0, 15, 'img/vehiculo/5de08327050e5.png'),
(0, 22, 'img/vehiculo/5de08405e982c.png'),
(0, 22, 'img/vehiculo/5de0840602cc7.png'),
(0, 22, 'img/vehiculo/5de084060d8aa.png'),
(0, 23, 'img/vehiculo/5de0851bab78a.png'),
(0, 23, 'img/vehiculo/5de0851bb8e66.png'),
(0, 23, 'img/vehiculo/5de0851bc3a48.png'),
(0, 29, 'img/vehiculo/5de0862ec587a.png'),
(0, 29, 'img/vehiculo/5de0862ed5a4d.png'),
(0, 29, 'img/vehiculo/5de0862f0cf68.png'),
(0, 29, 'img/vehiculo/5de0862f2e2af.png');

-- --------------------------------------------------------

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

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Chery'),
(2, 'Chevrolet'),
(3, 'Volkswagen'),
(4, 'Toyota'),
(5, 'Ford'),
(6, 'Honda'),
(7, 'Fiat'),
(8, 'Renault'),
(9, 'JEEP'),
(10, 'Citroen'),
(17, 'video'),
(18, 'salado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `admin`) VALUES
(1, 'test1@test.com', '$2y$12$yhMVNmdzYTSeF7SWpEL0yux96UAXS67u2.wrR9Qs45//Pr90/alQ.', 0),
(2, 'test@test.com', '$2b$10$aT9mJkXfRz/hQjUh1DtCf.qdH/dfiieX1yYC5shJHhpSJdF2phl7e', 1),
(3, 'df@fdsa.com', '$2y$10$hi6LQWw8QcbOimPg6DBN7uyursUFEnlskSnFdP2TwXeXFi4O/j8U.', 0),
(4, 'carlos@carlos.com', '$2y$10$9jUyXlNibjZ9g/JNkvxzzuXCzBeeqCjwHlTbRh0aOVSFl8Sh5.Ikq', 0),
(5, 'marta@marta.com', '$2y$10$cfZI9pZkQd/41poYkLk3VOzEsJVSADIN22HffLivZonMQ9bJeFZsi', 0),
(6, 'mateo@mateo.com', '$2y$10$SisZ1Tb.lNXri0Bz9sxHyuuwOT8ePL3BjiUM862UVNk.MerPUTqlG', 0),
(7, 'tere@tere.com', '$2y$10$aiARtyNeypn6bRHpfGrPTe1UMDHqSiWSQxo3hoY7I5fJ7VSUUbFve', 0),
(14, 'walter@walter.com', '$2y$10$nPGIfid6jGwx7aqJbu7Q6uunDIlZ.5qYsX.6OrQj9xWqOH7TmKsA6', 0);

-- --------------------------------------------------------

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
  `vendido` tinyint(1) NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `nombre`, `combustible`, `color`, `precio`, `id_marca_fk`, `vendido`, `imagen_url`) VALUES
(1, 'QQ', 'Nafta', 'Blanco', 140000, 1, 0, 'img/vehiculo/5dd4999c0e6a1.jpg'),
(2, 'Corsa', 'Nafta', 'Azul', 180000, 2, 1, NULL),
(8, 'C3', 'Nafta', 'Negro', 240000, 10, 0, NULL),
(11, 'Siena', 'Nafta', 'Negro', 175000, 7, 0, NULL),
(12, 'Focus', 'Nafta', 'Blanco', 350000, 5, 0, NULL),
(13, 'Clio', 'Nafta', 'Champagne', 190000, 8, 0, NULL),
(14, 'Etios', 'Nafta', 'Gris', 250000, 4, 1, NULL),
(15, 'Golf R-32', 'Nafta', 'Azul', 210000, 3, 0, NULL),
(22, 'Siena', 'Gasoil', 'Rojo', 145000, 7, 0, NULL),
(23, 'UP', 'Nafta', 'Blanco', 500000, 3, 0, NULL),
(29, 'Renegade', 'Nafta', 'Naranja', 1200000, 9, 0, NULL),
(32, 'safdg', 'Nafta', 'Azul', 7575, 3, 0, NULL),
(42, 'safdg', '', 'Gris', 0, 18, 0, NULL),
(43, 'safdg', 'Nafta', 'Azul', 0, 18, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_vehiculo_fk` (`id_vehiculo_fk`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_vehiculo_fk`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
