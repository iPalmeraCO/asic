-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-09-2015 a las 14:49:41
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
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(50) NOT NULL COMMENT 'Nombre de ciudad',
  `departament_id` int(11) NOT NULL COMMENT 'Departamento ID',
  `created` datetime NOT NULL COMMENT 'Creado',
  `modified` datetime NOT NULL COMMENT 'Modificado'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(50) NOT NULL COMMENT 'Nombre empresa',
  `nit` int(11) NOT NULL COMMENT 'NIT de la empresa',
  `created` datetime NOT NULL COMMENT 'Creado',
  `modified` datetime NOT NULL COMMENT 'Modificado'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL COMMENT 'Indice',
  `name` varchar(50) NOT NULL COMMENT 'Nombre',
  `surname` varchar(50) NOT NULL COMMENT 'Apellido',
  `email` varchar(50) NOT NULL COMMENT 'Correo Electronico',
  `phone_number` int(11) NOT NULL COMMENT 'Numero de telefono',
  `department_id` int(11) NOT NULL COMMENT 'Departamento',
  `city_id` int(11) NOT NULL COMMENT 'Ciudad',
  `address` text NOT NULL COMMENT 'Direccion',
  `company_id` int(11) NOT NULL COMMENT 'empresa id',
  `created` datetime NOT NULL COMMENT 'Fecha Creacion',
  `modified` datetime NOT NULL COMMENT 'Fecha Modificacion'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(50) NOT NULL COMMENT 'Nombre Departamento',
  `created` datetime NOT NULL COMMENT 'Creacion',
  `modified` datetime NOT NULL COMMENT 'Modificado'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Indice';
--
-- AUTO_INCREMENT de la tabla `department`
--
ALTER TABLE `department`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
