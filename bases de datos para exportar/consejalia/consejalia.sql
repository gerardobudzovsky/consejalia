-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2017 a las 06:53:32
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
  `idexpediente` int(11) DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fin` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paseorigen` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pasedestino` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `idexpediente` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

CREATE TABLE `instrumento` (
  `idinstrumento` int(11) NOT NULL,
  `idactuacion` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notaayn` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notadni` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notadireccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notatelefono` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `resnumero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `resndado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdotipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdoconcejal` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdobarrio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdotemas` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdotiposes` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordnumero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordnumerores` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordndado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `leynumero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `declnumero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `declndado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `invitacionqi` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `oficionro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`) VALUES
(1, 'admin', 'greenland'),
(4, 'hlincuiz', 'hl789hl'),
(5, 'jfrias', '32729008'),
(6, 'mbrest', '37479162'),
(7, 'afrias', '22594807'),
(8, 'afrias', '22594807'),
(9, 'mcortes', '0507');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD PRIMARY KEY (`idactuacion`) USING BTREE,
  ADD KEY `fk_actuacion` (`idexpediente`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`idexpediente`);

--
-- Indices de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`idinstrumento`),
  ADD UNIQUE KEY `instrumento_unique_actuacion` (`idactuacion`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  MODIFY `idactuacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idexpediente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `idinstrumento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD CONSTRAINT `fk_actuacion` FOREIGN KEY (`idexpediente`) REFERENCES `expediente` (`idexpediente`);

--
-- Filtros para la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `fk_instrumento` FOREIGN KEY (`idactuacion`) REFERENCES `actuacion` (`idactuacion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
