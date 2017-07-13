-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2017 a las 15:38:51
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
-- Base de datos: `consejelia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE `actuacion` (
  `idactuacion` int(11) NOT NULL DEFAULT '0',
  `idexpediente` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mensaje` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`idactuacion`, `idexpediente`, `titulo`, `mensaje`) VALUES
(1, 2, 'Un titulo de actuación', 'Un mensaje de actuacion.'),
(2, 2, 'Otro mensaje de actuacion.', 'Otro mensaje de actuacion.'),
(0, 3, 'titulo de una actuación', 'mensaje de una actuacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `idexpediente` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ente` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `ultima_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`idexpediente`, `titulo`, `numero`, `ente`, `area`, `resena`, `estado`, `fecha`, `ultima_edicion`) VALUES
(1, 'gola', '', 'gola', 'gola', 'gola gola ggggoooollllaaaa', 'Ingresado', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'Expediente Nuevo', '12345', 'Un ente', 'Un área de algo', '\"bla bla bla bla bla bla\"', 'Ingresado', '0000-00-00', '2017-07-12 04:16:23'),
(3, 'Un expediente', '5321234', 'El ente', 'El área', 'una reseña', 'En tratamiento', NULL, '0000-00-00 00:00:00'),
(4, 'Otro expediente', '14247826', 'Otro ente', 'Otra area', 'fkasjfakñsljfakñslfjasñ sjfaskñfj a fkñasdjfasl.', 'Para firma', NULL, '0000-00-00 00:00:00'),
(5, 'Expediente nuevecito', '40123741284', 'Ente nuevecito', 'Area nuevecita', '\"asjfaklñasdjfk alñkfjasñlkf a klñasdfjasdf klñasfjads klafjasdf\"', 'Archivado', '0000-00-00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD PRIMARY KEY (`idexpediente`,`idactuacion`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`idexpediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idexpediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD CONSTRAINT `FK_ActuacionExp` FOREIGN KEY (`idexpediente`) REFERENCES `expediente` (`idexpediente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
