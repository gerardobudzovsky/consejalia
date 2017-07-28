-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2017 a las 18:41:15
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`idactuacion`, `idexpediente`, `numero`, `fin`, `fecha`, `resena`, `tipo`, `paseorigen`, `pasedestino`, `usuario`, `ultimamodif`) VALUES
(63, 9, '1234 1', 'un fin 11', '2017-01-01', 'una reseña 11', 'Pase', 'un origen 11', 'un destino 11', NULL, '2017-07-27 20:03:41'),
(64, 9, '4321 11', 'un fin 11', '2017-01-01', 'una reseña 11', 'Instrumento', '', '', NULL, '2017-07-27 20:04:57'),
(65, 5, 'ewewewe', 'ewewewe', '2017-07-04', 'wewewewe', 'Pase', 'wewewe', 'ewewewe', NULL, '2017-07-28 12:58:28'),
(68, NULL, '222222', '2222222222', '2017-07-07', '22222222222', 'Pase', '2222222222', '22222222', NULL, '2017-07-28 14:13:19');

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
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
(13, 'Otro expediente nuevo', '0112/2017', 'Equipo de Proyecto', 'hola hola hola hola hola hola hola hola hola chau chau chau chau chau chau chau chau chau chau chau chau chau hola', 'Ingresado', '2017-03-01', NULL, NULL);

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
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`idinstrumento`, `idactuacion`, `tipo`, `notaayn`, `notadni`, `notadireccion`, `notatelefono`, `resnumero`, `resndado`, `pdotipo`, `pdoconcejal`, `pdobarrio`, `pdotemas`, `pdotiposes`, `ordnumero`, `ordnumerores`, `ordndado`, `leynumero`, `declnumero`, `declndado`, `invitacionqi`, `oficionro`, `usuario`, `ultimamodif`) VALUES
(25, 64, 'Ley', '', 0, '', '', '', '', 'Ordenanza', '', '', '', 'Sesion Ordinaria', '', '', '', '27367', '', '', '', '', NULL, '2017-07-27 20:04:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`) VALUES
(1, 'maty', 'maty'),
(2, 'gerardo', 'gerardo');

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
  MODIFY `idactuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idexpediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `idinstrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
