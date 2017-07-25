-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2017 a las 00:04:25
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

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
  `ultimamodif` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`idactuacion`, `idexpediente`, `numero`, `fin`, `fecha`, `resena`, `tipo`, `paseorigen`, `pasedestino`, `usuario`, `ultimamodif`) VALUES
(3, 9, NULL, 'Aprobar la construcción de 100 metros de cloacas para el barrio Lomas del Mirador.', NULL, NULL, 'Instrumento', NULL, NULL, NULL, NULL),
(6, 5, NULL, 'Un fin', NULL, NULL, 'Pase', NULL, NULL, NULL, NULL),
(7, 2, NULL, 'otro fin', NULL, NULL, 'Instrumento', NULL, NULL, NULL, NULL),
(8, 13, NULL, 'un fin', NULL, NULL, 'Pase', NULL, NULL, NULL, NULL),
(10, 9, NULL, 'otro finnnnn', NULL, 'una reseña de actuacion', 'Pase', NULL, NULL, NULL, NULL),
(56, 9, '1234 2', 'un fin 2', '2017-07-02', 'una reseña 2', 'Pase', 'un origen de pase 2', 'un destino de pase 2', NULL, NULL);

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
  `ultimamodif` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`idexpediente`, `titulo`, `numero`, `area`, `resena`, `estado`, `fecha`, `usuario`, `ultimamodif`) VALUES
(2, 'Expediente Nuevo', '0003/2017', 'Secretaria', 'bla bla bla bla', 'Ingresado', '2017-01-01', NULL, NULL),
(3, 'Un expediente', '0057/2017', 'Un area', 'una reseña', 'En tratamiento', '2017-06-20', NULL, NULL),
(4, 'Otro expediente', '0043/2016', 'Otra area', 'otra reseña', 'Para firma', '2016-12-14', NULL, NULL),
(5, 'Expediente nuevecito', '0010/2016', 'Area nuevecita', 'asjfaklñasdjfk alñkfjasñlkf a klñasdfjasdf klñasfjads klafjasdf', 'Archivado', '2016-05-19', NULL, NULL),
(9, 'S/ Construcción de cloaclas', '0002/2017', 'Equipo de Proyecto', 'Ante la necesidad de salubridad y mejoría en la calidad de vida, este honorable consejo debe tratar este proyecto de contrucción de 10 mil metros de cloaca.', 'Ingresado', '2017-01-02', NULL, NULL),
(13, 'Otro expediente nuevo', '0112/2017', 'Equipo de Proyecto', 'hola hola hola hola hola hola hola hola hola chau chau chau chau chau chau chau chau chau chau chau chau chau', 'Ingresado', '2017-03-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

CREATE TABLE `instrumento` (
  `idinstrumento` int(11) NOT NULL,
  `idactuacion` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notaayn` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `notadni` int(10) DEFAULT NULL,
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
  `ultimamodif` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  MODIFY `idactuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idexpediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `idinstrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
