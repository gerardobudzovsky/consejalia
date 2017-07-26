-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-07-2017 a las 03:10:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consejalia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE IF NOT EXISTS `actuacion` (
  `idactuacion` int(11) NOT NULL AUTO_INCREMENT,
  `idexpediente` int(11) DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fin` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paseorigen` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pasedestino` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idactuacion`) USING BTREE,
  KEY `fk_actuacion` (`idexpediente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`idactuacion`, `idexpediente`, `numero`, `fin`, `fecha`, `resena`, `tipo`, `paseorigen`, `pasedestino`, `usuario`, `ultimamodif`) VALUES
(3, 9, NULL, 'Aprobar la construcción de 100 metros de cloacas para el barrio Lomas del Mirador.', NULL, NULL, 'Instrumento', NULL, NULL, NULL, NULL),
(6, 5, NULL, 'Un fin', NULL, NULL, 'Pase', NULL, NULL, NULL, NULL),
(7, 2, NULL, 'otro fin', NULL, NULL, 'Instrumento', NULL, NULL, NULL, NULL),
(8, 13, NULL, 'un fin', NULL, NULL, 'Pase', NULL, NULL, NULL, NULL),
(10, 9, NULL, 'otro finnnnn', NULL, 'una reseña de actuacion', 'Pase', NULL, NULL, NULL, NULL),
(56, 9, '1234 2', 'un fin 2', '2017-07-02', 'una reseña 2', 'Pase', 'un origen de pase 2', 'un destino de pase 2', NULL, NULL),
(60, 2, '19nuevo', 'peronismo', '2017-07-13', 'peronico', 'Instrumento', '', '', NULL, '2017-07-26 02:08:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
  `idexpediente` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resena` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idexpediente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

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

CREATE TABLE IF NOT EXISTS `instrumento` (
  `idinstrumento` int(11) NOT NULL AUTO_INCREMENT,
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
  `ultimamodif` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idinstrumento`),
  UNIQUE KEY `instrumento_unique_actuacion` (`idactuacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`idinstrumento`, `idactuacion`, `tipo`, `notaayn`, `notadni`, `notadireccion`, `notatelefono`, `resnumero`, `resndado`, `pdotipo`, `pdoconcejal`, `pdobarrio`, `pdotemas`, `pdotiposes`, `ordnumero`, `ordnumerores`, `ordndado`, `leynumero`, `declnumero`, `declndado`, `invitacionqi`, `oficionro`, `usuario`, `ultimamodif`) VALUES
(23, 60, 'Resolucion', '', 0, '', '', '18', '19nuevo', 'Ordenanza', '', '', '', 'Sesion Ordinaria', '', '', '', '', '', '', '', '', NULL, '2017-07-26 02:08:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`) VALUES
(1, 'maty', 'maty'),
(2, 'gerardo', 'gerardo');

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
