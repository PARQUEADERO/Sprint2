-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2016 a las 20:32:18
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueadero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

DROP TABLE IF EXISTS `entrada`;
CREATE TABLE IF NOT EXISTS `entrada` (
  `id` varchar(20) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `zona` varchar(1) NOT NULL,
  `numero` varchar(2) NOT NULL,
  `entrada` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id`, `placa`, `fecha`, `zona`, `numero`, `entrada`, `hora`) VALUES
('1', '1', '28/11/2016', 'G', '1', 'regional1', '12:47'),
('a', 'a', '28/11/2016', 'A', '1', 'vegas', '20:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

DROP TABLE IF EXISTS `lugar`;
CREATE TABLE IF NOT EXISTS `lugar` (
  `zona` varchar(1) NOT NULL,
  `numero` varchar(2) NOT NULL,
  `disponible` varchar(1) NOT NULL,
  `id` varchar(2) NOT NULL,
  `entrada` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`zona`, `numero`, `disponible`, `id`, `entrada`) VALUES
('G', '1', 'n', '1', 'regional1'),
('A', '1', 'n', '2', 'vegas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id` varchar(15) CHARACTER SET utf8 NOT NULL,
  `placa` varchar(10) CHARACTER SET utf8 NOT NULL,
  `combustible` varchar(10) CHARACTER SET utf8 NOT NULL,
  `color` varchar(20) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(20) CHARACTER SET utf8 NOT NULL,
  `modelo` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `telefono`, `id`, `placa`, `combustible`, `color`, `marca`, `modelo`) VALUES
('', '', '', '', '', '', '', ''),
('1', '1', '1', '1', 'corriente', '1', '1', '2'),
('hola', '123jkjkjk', '1234', 'jtg321', 'extra', 'rojo', 'honda', '2015'),
('juan', '222', '22', 'fd', 'corriente', 'ee', 'ee', 'eee'),
('a', 'a', 'a', 'a', 'corriente', 'a', 'a', 'a'),
('jj', 'jj', 'jj', 'jj', 'corriente', 'jj', 'jj', 'jj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usr` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pwd` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usr`, `pwd`) VALUES
('admin', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
