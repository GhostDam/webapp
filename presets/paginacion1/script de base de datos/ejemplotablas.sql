-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2015 a las 06:59:51
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ejemplotablas`
--
CREATE DATABASE IF NOT EXISTS `ejemplotablas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ejemplotablas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE IF NOT EXISTS `tabla1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidopaterno` varchar(50) NOT NULL,
  `apellidomaterno` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`id`, `nombre`, `apellidopaterno`, `apellidomaterno`) VALUES
(1, 'juan', 'perez', 'martinez'),
(2, 'eduardo', 'ruiz', 'mensoza'),
(3, 'marcos', 'romero', 'alcantara'),
(4, 'julio', 'gonzales', 'martinez'),
(5, 'alfredo', 'ortiz', 'mendoza'),
(6, 'joaquin', 'diaz', 'alvarado'),
(7, 'guillermo', 'montez', 'roma'),
(8, 'pedro', 'santos', 'cruz'),
(9, 'fernando', 'radilla', 'cortes'),
(10, 'tomas', 'flores', 'mendez'),
(11, 'alex', 'trujillo', 'Aurea'),
(12, 'Daniel', 'Rivas', 'Alevra'),
(13, 'Luis', 'Torres', 'Mendoza'),
(14, 'Daniel', 'Romay', 'Huerta'),
(15, 'Eva', 'Nieto', 'Garcia'),
(16, 'Jaime', 'Rojas', 'Cepeda'),
(17, 'Elias', 'Toledo', 'Carrillo'),
(18, 'Emilio', 'Andrada', 'Martinez'),
(19, 'Gustavo', 'Rios', 'Muñoz'),
(20, 'Luisa', 'Gamboa', 'Peralta');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
