-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2015 a las 11:18:29
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
-- Estructura de tabla para la tabla `canales`
--

CREATE TABLE IF NOT EXISTS `canales` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `description` text COMMENT 'Descripcion',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0  DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicaciones`
--

CREATE TABLE IF NOT EXISTS `comunicaciones` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configurador`
--

CREATE TABLE IF NOT EXISTS `configurador` (
`id` int(10) NOT NULL COMMENT 'Identificador',
  `element_id` int(11) NOT NULL COMMENT 'Id del elemento',
  `unit_cost` int(11) NOT NULL COMMENT 'Costo Unitario Elemento',
  `margin` smallint(6) NOT NULL COMMENT 'Margen %',
  `total_sale_price` int(11) NOT NULL COMMENT 'Precio de venta total (Costo Unitario * margen) + costo unitario',
  `tier1` int(11) DEFAULT NULL COMMENT 'Costo tier 1 depende del datacenter',
  `tier2` int(11) DEFAULT NULL COMMENT 'Costo tier 2 depende del datacenter',
  `tier3` int(11) DEFAULT NULL COMMENT 'Costo tier 3 depende del datacenter',
  `tier4` int(11) DEFAULT NULL COMMENT 'Costo tier 4 depende del datacenter',
  `observations` varchar(600) DEFAULT NULL COMMENT 'Observaciones',
  `status_id` int(11) NOT NULL COMMENT '1 Activo 0 Inactivo',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_generales`
--

CREATE TABLE IF NOT EXISTS `costos_generales` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_intel_linux`
--

CREATE TABLE IF NOT EXISTS `costos_intel_linux` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_intel_windows`
--

CREATE TABLE IF NOT EXISTS `costos_intel_windows` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_power_aix`
--

CREATE TABLE IF NOT EXISTS `costos_power_aix` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_power_iseries`
--

CREATE TABLE IF NOT EXISTS `costos_power_iseries` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_power_linux`
--

CREATE TABLE IF NOT EXISTS `costos_power_linux` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_sparc`
--

CREATE TABLE IF NOT EXISTS `costos_sparc` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco_externo`
--

CREATE TABLE IF NOT EXISTS `disco_externo` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
`id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT 'Nombre del elemento',
  `description` text NOT NULL COMMENT 'Descripción del elemento',
  `category_id` int(11) NOT NULL COMMENT 'Id de la categoria',
  `technology_id` int(11) NOT NULL COMMENT 'id de tipo de tecnologia',
  `Unity_measure_id` int(11) NOT NULL COMMENT 'id de la unidad de medida del elemento',
  `status_id` int(11) NOT NULL COMMENT 'Id del elemento',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfaces`
--

CREATE TABLE IF NOT EXISTS `interfaces` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia_os`
--

CREATE TABLE IF NOT EXISTS `licencia_os` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `supported_oss` TEXT DEFAULT NULL COMMENT 'Versiones de Sistemas Operativos Soportados',
  `quantity` int(10) DEFAULT NULL COMMENT 'Cantidad',
  `license_cost_x_vCPUs` float DEFAULT NULL COMMENT 'Costo de Licencia x vCPU  ',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen %',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` int(10) DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` int(10) DEFAULT NULL COMMENT 'Valor Total Ppal',
  `total_value2` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technology`
--

CREATE TABLE IF NOT EXISTS `technology` (
`id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT 'Nombre del tipo de tecnlogia',
  `description` varchar(150) NOT NULL COMMENT 'Descripción de la tecnlogia',
  `status_id` int(11) NOT NULL COMMENT 'Estado del tipo de tecnlogia (0: Inactivo 1: Activo)',
  `created` datetime NOT NULL COMMENT 'Hora de creación',
  `modified` datetime NOT NULL COMMENT 'Hora de Modificado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servidores`
--

CREATE TABLE IF NOT EXISTS `tipo_servidores` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unitymeasure`
--

CREATE TABLE IF NOT EXISTS `unitymeasure` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT 'Nombre Unidad de medida',
  `description` varchar(150) NOT NULL COMMENT 'Descripción Unidad de medida',
  `status_id` int(11) NOT NULL COMMENT 'Estado Unidad de mida (0: Inactivo 1: Activo)',
  `created` datetime NOT NULL COMMENT 'Hora de creación',
  `modified` datetime NOT NULL COMMENT 'Hora de Modificado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT 'Nombre',
  `surname` varchar(32) NOT NULL COMMENT 'Apellido',
  `email` varchar(120) NOT NULL COMMENT 'Correo Electronico',
  `username` varchar(32) NOT NULL COMMENT 'Nombre de usuario',
  `password` varchar(100) NOT NULL COMMENT 'Clave',
  `status_id` int(10) NOT NULL COMMENT 'Estado Id (0=Inactivo ; 1=Activo)',
  `created` datetime NOT NULL COMMENT 'Fecha Cracion',
  `modified` datetime NOT NULL COMMENT 'Fecha Modificado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcpu_de_cpu`
--

CREATE TABLE IF NOT EXISTS `vcpu_de_cpu` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
  `description_resource_units` TEXT DEFAULT NULL COMMENT 'Descripcion Unidad de recursos',
  `measure` varchar(100) DEFAULT NULL COMMENT 'Medida',
  `quantity` float DEFAULT NULL COMMENT 'Cantidad',
  `cost_dollars` float DEFAULT NULL COMMENT 'Costo Dolares',
  `margin` int(10) DEFAULT NULL COMMENT 'Margen',
  `sale` float DEFAULT NULL COMMENT 'Venta (Margen)',
  `sale2` float DEFAULT NULL COMMENT 'Venta (Costo + Margen)',
  `quantity2` float DEFAULT NULL COMMENT 'Cantidad Ppal',
  `total_value` float DEFAULT NULL COMMENT 'Valor Total Ppal',
  `quantity3` float DEFAULT NULL COMMENT 'Cantidad Ctg',
  `total_value2` float DEFAULT NULL COMMENT 'Valor Total Ctg',
  `sale_total` float DEFAULT NULL COMMENT 'Total Venta',
  `category_id` int(11) NOT NULL COMMENT 'Id Categoria',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;
