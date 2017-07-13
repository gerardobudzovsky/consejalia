-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2017 a las 15:35:09
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consejalia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE `actuacion` (
  `idactuacion` int(11) NOT NULL,
  `idexpediente` int(11) NOT NULL,
  `nombreproy` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fin` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`idactuacion`, `idexpediente`, `nombreproy`, `fin`, `tipo`) VALUES
(3, 9, 'Salud para el municipio.', 'Aprobar la construcción de 100 metros de cloacas para el barrio Lomas del Mirador.', 'Instrumento'),
(6, 5, 'Un proyecto', 'Un fin', 'Pase'),
(7, 2, 'otro proyecto', 'otro fin', 'Informe de terceros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombre`) VALUES
(1, 'EQUIPO DE PROYECTO'),
(3, ' SECRETARIA'),
(4, 'EQUIPO TERRITORIAL DEL BLOQUE'),
(5, 'EQUIPO CCPA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `idexpediente` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`idexpediente`, `titulo`, `numero`, `area`, `resena`, `estado`, `fecha`) VALUES
(2, 'Expediente Nuevo', '0003/2017', 'Secretaria', 'bla bla bla bla', 'Ingresado', '2017-01-01'),
(3, 'Un expediente', '0057/2017', 'Un area', 'una reseña', 'En tratamiento', '2017-06-20'),
(4, 'Otro expediente', '0043/2016', 'Otra area', 'otra reseña', 'Para firma', '2016-12-14'),
(5, 'Expediente nuevecito', '0010/2016', 'Area nuevecita', 'asjfaklñasdjfk alñkfjasñlkf a klñasdfjasdf klñasfjads klafjasdf', 'Archivado', '2016-05-19'),
(9, 'S/ Construcción de cloaclas', '0002/2017', 'Equipo de Proyecto', 'Ante la necesidad de salubridad y mejoría en la calidad de vida, este honorable consejo debe tratar este proyecto de contrucción de 10 mil metros de cloaca.', 'Ingresado', '2017-01-02'),
(13, 'Otro expediente nuevo', '0112/2017', 'Equipo de Proyecto', 'hola hola hola hola hola hola hola hola hola chau chau chau chau chau chau chau chau chau chau chau chau chau chau', 'En tratamiento', '2017-03-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD PRIMARY KEY (`idactuacion`,`idexpediente`),
  ADD KEY `FK_actuacion` (`idexpediente`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`idexpediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  MODIFY `idactuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idexpediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD CONSTRAINT `FK_actuacion` FOREIGN KEY (`idexpediente`) REFERENCES `expediente` (`idexpediente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
