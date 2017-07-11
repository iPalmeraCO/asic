d-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-08-2015 a las 09:58:22
-- Versión del servidor: 5.6.25-0ubuntu0.15.04.1
-- Versión de PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(32) NOT NULL COMMENT 'Nombre paquete',
  `description` text NOT NULL COMMENT 'Desripción del paquete',
  `image` text NOT NULL COMMENT 'Imagen del paquete',
  `os_id` int(11) NOT NULL COMMENT 'Sistema operativo id',
  `technology_id` int(11) NOT NULL COMMENT 'Id del tipo de tecnlogía',
  `status_id` int(11) NOT NULL COMMENT 'Estado [0: Inactivo -  1: Activo]',
  `created` datetime NOT NULL COMMENT 'Hora creacion',
  `modified` datetime NOT NULL COMMENT 'Hora modificacion'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COMMENT='Tabla para almacer los paquetes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packages_elements`
--

CREATE TABLE IF NOT EXISTS `packages_elements` (
`id` int(11) NOT NULL COMMENT 'Id Primario',
  `packages_id` int(11) NOT NULL COMMENT 'Id Del Paquete',
  `elements_id` int(11) NOT NULL COMMENT 'Id Del elemento',
  `created` datetime NOT NULL COMMENT 'Hora Creación',
  `modified` datetime NOT NULL COMMENT 'Hora Modificacion'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `packages_elements`
--
ALTER TABLE `packages_elements`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `packages`
--
ALTER TABLE `packages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
--
-- AUTO_INCREMENT de la tabla `packages_elements`
--
ALTER TABLE `packages_elements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Primario';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
