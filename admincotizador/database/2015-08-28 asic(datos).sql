-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2015 a las 11:19:39
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

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'SERVIDORES', '', '2015-07-28 16:29:59', '2015-07-28 16:29:59'),
(2, 'ALMACENAMIENTO', '', NULL, '2015-07-28 23:02:49'),
(3, 'CUSTODIA Y TRASPORTE DE MEDIOS', '', '2015-07-28 23:03:15', '2015-07-28 23:03:15'),
(4, 'COMUNICACIONES', '', '2015-07-28 23:03:36', '2015-07-28 23:03:36'),
(5, 'MPLS', '', '2015-07-28 23:03:53', '2015-07-28 23:03:53'),
(6, 'BACKUPS', '', '2015-07-28 23:04:07', '2015-07-28 23:04:07'),
(7, 'MONITOREO', '', '2015-07-28 23:04:27', '2015-07-28 23:04:27'),
(8, 'SOFTWARE SPLA', '', '2015-07-28 23:04:46', '2015-07-28 23:04:46'),
(9, 'REPLICA', '', '2015-07-28 23:05:00', '2015-07-28 23:05:00'),
(10, 'OTROS', '', '2015-07-28 23:05:15', '2015-07-28 23:05:15'),
(11, 'ESPECIALISTAS', '', '2015-07-30 09:36:45', '2015-07-30 09:36:45'),
(12, 'FACILITIES', '', '2015-07-30 09:37:05', '2015-07-30 09:37:05'),
(13, 'ADMON SOPORTE', 'ADMINISTRACION SOPORTE', '2015-07-30 09:56:21', '2015-07-30 09:56:21');

--
-- Volcado de datos para la tabla `comunicaciones`
--

INSERT INTO `comunicaciones` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'Internet Dedicado en Data Center de Bogotá / 4 Megas ', '4 M', 4, 900, 15, 135, 1035, 0, 0, 0, 0, 0, 4, NULL, '2015-08-10 15:53:08'),
(2, 'Internet Compartido en Data Center de Bogotá / Megas ', '1 M', 1, 200, 50, 100, 300, 0, 0, 0, 0, 0, 4, NULL, '2015-08-10 15:53:24'),
(3, 'Canal dedicado MPLS depende la ultima milla', 'Mega', 4, 140, 20, 28, 168, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 16:45:23'),
(4, 'Puertos de Lan  hasta 1 Giga -', 'mb', 1, 10, 20, 2, 12, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 16:45:41'),
(5, 'Crossconexion 10-100 1000 Megas (1 Giga) ', 'mb', 1, 412, 20, 82.4, 494.4, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 16:46:06'),
(6, 'Pago unico  activacion cross conexión', ' mb', 1, 1300, 20, 260, 1560, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 16:46:22'),
(7, 'Canal Compartido Replica entre datacenter Triara y Terremark', '2 megas', 1, 600, 20, 120, 720, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 16:46:35');

--
-- Volcado de datos para la tabla `configurador`
--

INSERT INTO `configurador` (`id`, `element_id`, `unit_cost`, `margin`, `total_sale_price`, `tier1`, `tier2`, `tier3`, `tier4`, `observations`, `status_id`, `created`, `modified`) VALUES
(1, 1, 56, 24, 69, 6, 4, 5, 6, 'Observacion', 1, '2015-08-26 14:13:26', '2015-08-27 14:39:29'),
(2, 2, 567, 100, 1134, 3, 4, 4, 5, 'Observaciones', 1, '2015-08-26 14:13:41', '2015-08-27 14:39:19');

--
-- Volcado de datos para la tabla `costos_generales`
--

INSERT INTO `costos_generales` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA X86 - Recursos sin Licenciamiento por un core (1 core = 4 vcpu) ', 'Cores', 1, 24, 32, 7.68, 31.68, 1, 31.68, 4, 126.72, 158.4, 1, NULL, '2015-07-30 15:01:48'),
(2, 'Servidor Fisico (bareMetal cores 16) sin memoria, 2 hbas un puerto, 4 ptos LAN', 'server', 1, 244, 32, 78.08, 322.08, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:03:26'),
(3, 'PLATAFORMA X86 - Paquete de Recursos Memoria', 'Gigas', 1, 3, 50, 1.5, 4.5, 1, 4.5, 4, 18, 22.5, 1, NULL, '2015-07-30 15:03:36'),
(4, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:03:42'),
(5, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:03:49'),
(6, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:04:45'),
(7, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:04:51'),
(8, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:04:57'),
(9, 'PLATAFORMA SPARC Core de recursos 1  CPU Sistema Operativo Base', 'CPU', 1, 70, 20, 14, 84, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:05:03'),
(10, 'PLATAFORMA SPARC Paquete de Recursos memoria', 'Gigas', 1, 5, 20, 1, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:05:09'),
(11, 'PLATAFORMA HANA Procesamiento en tiempo real. 1  Tera ', 'Tera', 0.5, 80, 20, 16, 96, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 15:05:30'),
(12, 'Almacenamiento Empresarial (Alto Desempeño HHD)-  solid state 200 GB    ', 'GB', 1, 0.63, 50, 0.315, 0.945, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 15:06:16'),
(13, 'Almacenamiento General (Datos )- 15k de 300 GB   ', 'GB', 1, 0.19, 50, 0.095, 0.285, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 15:06:34'),
(14, 'Almacenamiento  7.2k de 1TB  ', 'GB', 1, 0.09, 50, 0.045, 0.135, 100, 13.5, 0, 0, 13.5, 2, NULL, '2015-07-30 15:06:48'),
(15, 'lto5 venta', 'medio', 1, 60, 12, 7.2, 67.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 15:07:04'),
(16, 'Valor Mensual Alquiler Libreía LTO5 costo dedicada un driver', 'driver', 1, 241, 20, 48.2, 289.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 15:07:24'),
(17, 'Valor Mensual Alquiler Libreía LTO5 costo Compartida un driver', 'driver', 1, 100, 20, 20, 120, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 15:07:55'),
(18, 'Internet Dedicado en Data Center de Bogotá / 4 Megas ', '4 M', 4, 900, 15, 135, 1035, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 15:08:09'),
(19, 'Internet Compartido en Data Center de Bogotá / Megas ', '1 M', 1, 200, 50, 100, 300, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 15:08:24'),
(20, 'Canal dedicado MPLS depende la ultima milla', 'Mega', 4, 140, 20, 28, 168, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 15:08:36'),
(21, 'Puertos de Lan  hasta 1 Giga -', 'mb', 1, 10, 20, 2, 12, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 15:09:07'),
(22, 'Crossconexion 10-100 1000 Megas (1 Giga) ', 'mb', 1, 412, 20, 82.4, 494.4, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 15:09:43'),
(23, 'Pago unico  activacion cross conexión', ' cross', 1, 1300, 20, 260, 1560, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 15:11:50'),
(24, 'Canal Compartido Replica entre datacenter Triara y Terremark', '2 megas', 1, 600, 20, 120, 720, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 15:12:06'),
(25, 'Backup - X86-VmWare Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.1, 50, 0.05, 0.15, 50, 7.5, 0, 0, 7.5, 6, NULL, '2015-07-30 15:12:44'),
(26, 'Backup - POWER  AIX_LINUX  Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 15:25:00'),
(27, 'Backup - A Cinta Retención mes  ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 15:25:17'),
(29, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(30, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(31, 'san', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 'Costo Monitoreo por Servidore (CPU,Mmoria,disco y red)', 'server', 1, 10, 50, 5, 15, 0, 0, 0, 0, 0, 7, NULL, '2015-07-30 15:26:10'),
(33, 'Costos Servidor adicional parametros adicionales 10 parametos', 'server', 1, 15, 50, 7.5, 22.5, 1, 22.5, 0, 0, 22.5, 7, NULL, '2015-07-30 15:26:33'),
(34, 'Especialista Intel LINUX –WINDOWS Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 15:26:51'),
(35, 'Especialista Power AIX, ISERIES  Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 150, 0, 0, 150, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 15:27:27'),
(36, 'Manos Inteligentes especialistas – Servicio adicional una vez superada la línea Base no acumulables', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 15:27:45'),
(37, 'Manos remotas – Servicio Linea Base', 'Hora', 1, 50, 30, 15, 65, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 15:29:30'),
(38, 'Sistema Operativo Windows 2008-2012 lic x cpu  datacenter', 'spla', 1, 125.714, 15, 18.8571, 144.571, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:30:14'),
(39, 'OfficeStd ALNG LicSAPk MVL SAL', 'spla', 1, 16.7429, 50, 8.37145, 25.1143, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:30:26'),
(40, 'PrjctPro ALNG LicSAPk MVL SAL w1PrjctSvrCAL', 'spla', 1, 40.1857, 50, 20.0928, 60.2785, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:30:46'),
(41, 'WinSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 5.82857, 50, 2.91428, 8.74286, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:31:01'),
(42, 'SQLSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 21.0571, 50, 10.5286, 31.5856, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:31:21'),
(43, 'WinSvrStd ALNG LicSAPk MVL SAL  win 7', 'spla', 0, 5.82857, 50, 2.91428, 8.74286, 1, 8.74286, 0, 0, 8.74286, 8, NULL, '2015-07-30 15:31:46'),
(44, 'Linux SuSe, Ubuntu, Red Hat, Debian y Centos', 'Soporte', 1, 47.619, 50, 23.8095, 71.4285, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 15:32:49'),
(45, 'Veeam Backup and replication enterprice plus for vmware', 'CPU', 1, 11.65, 25, 2.9125, 14.5625, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 15:33:17'),
(46, 'Mimix Minimo 2000 cpw', 'cpw', 1, 0.08, 32, 0.0256, 0.1056, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 15:33:48'),
(47, 'Doble take', 'server', 1, 48.1, 32, 15.392, 63.492, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 15:34:34'),
(48, 'Antivirus Kaspersky', 'SO', 1, 2.86, 32, 0.9152, 3.7752, 1, 3.7752, 0, 0, 3.7752, 10, NULL, '2015-07-30 15:34:59'),
(49, 'Firewall Hardware', 'puerto', 1, 10, 32, 3.2, 13.2, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 15:35:29'),
(50, 'Licencia de VmWare', 'Giga ram', 1, 9, 20, 1.8, 10.8, 1, 10.8, 0, 0, 10.8, 10, NULL, '2015-07-30 15:35:55'),
(51, 'P.U.C. (Punto Unico de Contacto) Mesa de Ayuda basica inicia con 30 llamas al mes ', 'llamadas', 30, 60, 80, 48, 108, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 15:36:27'),
(52, 'PUC llamada adicional', 'llamada', 1, 1, 50, 0.5, 1.5, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 15:36:51'),
(54, 'Horas de Intalacion  de Infraestructura', 'Hora', 1, 50, 20, 10, 60, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 15:37:43'),
(55, 'Unidad de Rack datacenter', 'U', 1, 115, 20, 23, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 15:38:05'),
(56, 'Manos remotas dc Triara paquete maximo de 20 solicitudes al mes', 'Solicitud', 1, 120, 15, 18, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 15:38:30');

--
-- Volcado de datos para la tabla `costos_intel_linux`
--

INSERT INTO `costos_intel_linux` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA X86 - Recursos sin Licenciamiento por un core (1 core = 4 vcpu) ', 'Cores', 1, 24, 32, 7.68, 31.68, 1, 31.68, 4, 126.72, 158.4, 1, NULL, '2015-07-30 10:59:14'),
(2, 'Servidor Fisico (bareMetal cores 16) sin memoria, 2 hbas un puerto, 4 ptos LAN', 'server', 1, 244, 32, 78.08, 322.08, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:01:50'),
(3, 'PLATAFORMA X86 - Paquete de Recursos Memoria', 'Gigas', 1, 3, 50, 1.5, 4.5, 1, 4.5, 4, 18, 22.5, 1, NULL, '2015-07-30 11:02:22'),
(4, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:02:31'),
(5, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:02:38'),
(6, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:02:46'),
(7, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:02:56'),
(8, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:03:03'),
(9, 'PLATAFORMA SPARC Core de recursos 1  CPU Sistema Operativo Base', 'CPU', 1, 70, 20, 14, 84, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:03:09'),
(10, 'PLATAFORMA SPARC Paquete de Recursos memoria', 'Gigas', 1, 5, 20, 1, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:03:15'),
(11, 'PLATAFORMA HANA Procesamiento en tiempo real. 1  Tera ', 'Tera', 0.5, 80, 20, 16, 96, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 11:03:25'),
(12, 'Almacenamiento Empresarial (Alto Desempeño HHD)-  solid state 200 GB    ', 'GB', 1, 0.63, 50, 0.315, 0.945, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 11:03:40'),
(13, 'Almacenamiento General (Datos )- 15k de 300 GB   ', 'GB', 1, 0.19, 50, 0.095, 0.285, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 11:04:00'),
(14, 'Almacenamiento  7.2k de 1TB  ', 'GB', 1, 0.09, 50, 0.045, 0.135, 100, 13.5, 0, 0, 13.5, 2, NULL, '2015-07-30 11:04:17'),
(15, 'lto5 venta', 'medio', 1, 60, 12, 7.2, 67.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:04:43'),
(16, 'custodia de medios', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:05:31'),
(17, 'Valor Mensual Alquiler Libreía LTO5 costo dedicada un driver', 'driver', 1, 241, 20, 48.2, 289.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:05:45'),
(18, 'Valor Mensual Alquiler Libreía LTO5 costo Compartida un driver', 'driver', 1, 100, 20, 20, 120, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:06:05'),
(19, 'Internet Dedicado en Data Center de Bogotá / 4 Megas ', '4 M', 4, 900, 15, 135, 1035, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 11:06:19'),
(20, 'Internet Compartido en Data Center de Bogotá / Megas ', '1 M', 1, 200, 50, 100, 300, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 11:06:34'),
(21, 'Canal dedicado MPLS depende la ultima milla', 'Mega', 4, 140, 20, 28, 168, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:07:10'),
(22, 'Puertos de Lan  hasta 1 Giga -', 'gb', 1, 10, 20, 2, 12, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:07:56'),
(23, 'Crossconexion 10-100 1000 Megas (1 Giga) ', 'gb', 1, 412, 20, 82.4, 494.4, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:09:04'),
(24, 'Pago unico  activacion cross conexión', ' gb', 1, 1300, 20, 260, 1560, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:09:35'),
(25, 'Canal Compartido Replica entre datacenter Triara y Terremark', '2 megas', 1, 600, 20, 120, 720, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:10:13'),
(26, 'Backup - X86-VmWare Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.1, 50, 0.05, 0.15, 50, 7.5, 0, 0, 7.5, 6, NULL, '2015-07-30 11:10:57'),
(27, 'Backup - POWER  AIX_LINUX  Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 11:11:40'),
(28, 'Backup - A Cinta Retención mes  ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 11:11:56'),
(29, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(30, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(31, 'san', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 'Costos Servidor adicional parametros adicionales 10 parametos', 'server', 1, 15, 50, 7.5, 22.5, 1, 22.5, 0, 0, 22.5, 7, NULL, '2015-07-30 11:13:31'),
(33, 'Especialista Intel LINUX –WINDOWS Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 11:14:09'),
(34, 'Especialista Power AIX, ISERIES  Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 150, 0, 0, 150, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 11:14:52'),
(35, 'Manos Inteligentes especialistas – Servicio adicional una vez superada la línea Base no acumulables', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 11:15:21'),
(36, 'Manos remotas – Servicio Linea Base', 'Hora', 1, 50, 30, 15, 65, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 11:16:20'),
(37, 'Sistema Operativo Windows 2008-2012 lic x cpu  datacenter', 'spla', 1, 125.714, 15, 18.8571, 144.571, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:16:56'),
(38, 'OfficeStd ALNG LicSAPk MVL SAL', 'spla', 1, 16.7429, 50, 8.37145, 25.1143, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:17:21'),
(39, 'PrjctPro ALNG LicSAPk MVL SAL w1PrjctSvrCAL', 'spla', 1, 40.1857, 50, 20.0928, 60.2785, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:17:33'),
(40, 'WinSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 5.82857, 50, 2.91428, 8.74286, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:17:48'),
(41, 'SQLSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 21.0571, 50, 10.5286, 31.5856, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:18:05'),
(42, 'WinSvrStd ALNG LicSAPk MVL SAL  win 7', 'spla', 0, 5.82857, 50, 2.91428, 8.74286, 1, 8.74286, 0, 0, 8.74286, 8, NULL, '2015-07-30 11:18:18'),
(43, 'Linux SuSe, Ubuntu, Red Hat, Debian y Centos', 'Soporte', 1, 47.619, 50, 23.8095, 71.4285, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:18:33'),
(44, 'Veeam Backup and replication enterprice plus for vmware', 'CPU', 1, 11.65, 25, 2.9125, 14.5625, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:19:31'),
(45, 'Mimix Minimo 2000 cpw', 'cpw', 1, 0.08, 32, 0.0256, 0.1056, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:20:09'),
(46, 'Doble take', 'server', 1, 48.1, 32, 15.392, 63.492, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:20:30'),
(47, 'Antivirus Kaspersky', 'SO', 1, 2.86, 32, 0.9152, 3.7752, 1, 3.7752, 0, 0, 3.7752, 10, NULL, '2015-07-30 11:20:46'),
(48, 'Firewall Hardware', 'puerto', 1, 10, 32, 3.2, 13.2, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 11:21:16'),
(49, 'Licencia de VmWare', 'Giga ram', 1, 9, 20, 1.8, 10.8, 1, 10.8, 0, 0, 10.8, 10, NULL, '2015-07-30 11:21:31'),
(50, 'P.U.C. (Punto Unico de Contacto) Mesa de Ayuda basica inicia con 30 llamas al mes ', 'llamadas', 30, 60, 80, 48, 108, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 11:22:10'),
(51, 'PUC llamada adicional', 'llamada', 1, 1, 50, 0.5, 1.5, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 11:22:33'),
(53, 'Horas de Intalacion  de Infraestructura', 'Hora', 1, 50, 20, 10, 60, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 11:23:03'),
(54, 'Unidad de Rack datacenter', 'U', 1, 115, 20, 23, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 11:23:30'),
(55, 'Manos remotas dc Triara paquete maximo de 20 solicitudes al mes', 'Solicitud', 1, 120, 15, 18, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 11:23:41');

--
-- Volcado de datos para la tabla `costos_intel_windows`
--

INSERT INTO `costos_intel_windows` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA X86 - Recursos sin Licenciamiento por un core (1 core = 4 vcpu) ', 'Cores', 1, 24, 32, 7.68, 31.68, 1, 31.68, 4, 126.72, 158.4, 1, NULL, '2015-07-30 09:20:00'),
(2, 'Servidor Fisico (bareMetal cores 16) sin memoria. 2 hbas un puerto. 4 ptos LAN', 'server', 1, 244, 32, 78.08, 322.08, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 09:20:51'),
(3, 'PLATAFORMA X86 - Paquete de Recursos Memoria', 'Gigas', 1, 3, 50, 1.5, 4.5, 1, 4.5, 4, 18, 22.5, 1, NULL, '2015-07-30 09:20:59'),
(4, 'Backup - X86-VmWare Retención mes adicional en disco / Vr. GB 1.00   ', 'Giga', 1, 0.1, 50, 0.05, 0.15, 50, 7.5, 0, 0, 7.5, 6, NULL, '2015-07-30 09:21:13'),
(5, 'Backup - POWER  AIX_LINUX  Retención mes adicional en disco / Vr. GB 1.00   ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 09:21:34'),
(6, 'Disponibilidad drivers LTO4-5 y LTO6 (lecturas)', 'L', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 09:32:08'),
(7, 'Backup - A Cinta Retención mes  ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 09:32:20'),
(8, 'Puertos', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(9, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(10, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(11, 'san', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(12, 'Costo Monitoreo por Servidore (CPU.Mmoria.disco y red)', 'server', 1, 10, 0, 0, 10, 0, 0, 0, 0, 0, 7, NULL, '2015-07-30 09:33:14'),
(13, 'Costos Servidor adicional parametros adicionales 10 parametos', 'server', 1, 15, 50, 7.5, 22.5, 1, 22.5, 0, 0, 22.5, 7, NULL, '2015-07-30 09:33:41'),
(14, 'Especialista Intel LINUX –WINDOWS Implementador-Soporte Vr. Hora 1.00   ', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 09:40:40'),
(15, 'Especialista Power AIX. ISERIES  Implementador-Soporte Vr. Hora 1.00   ', 'Hora', 1, 150, 0, 0, 150, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 09:40:59'),
(16, 'Manos Inteligentes especialistas – Servicio adicional una vez superada la línea Base no acumulables', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 09:41:21'),
(17, 'Manos remotas – Servicio Linea Base', 'Hora', 1, 50, 30, 15, 65, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 09:42:20'),
(18, 'Sistema Operativo Windows 2008-2012 lic x cpu  datacenter', 'spla', 1, 125.714, 15, 18.8571, 144.571, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:43:05'),
(19, 'OfficeStd ALNG LicSAPk MVL SAL', 'spla', 1, 16.7429, 50, 8.37143, 25.1143, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:44:40'),
(20, 'PrjctPro ALNG LicSAPk MVL SAL w1PrjctSvrCAL', 'spla', 1, 40.1857, 50, 20.0929, 60.2786, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:45:36'),
(21, 'WinSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 5.82857, 50, 2.91429, 8.74286, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:47:24'),
(22, 'SQLSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 21.0571, 50, 10.5286, 31.5857, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:49:15'),
(23, 'WinSvrStd ALNG LicSAPk MVL SAL  win 7', 'spla', 0, 5.82857, 50, 2.91429, 8.74286, 1, 8.74286, 0, 0, 8.74286, 8, NULL, '2015-07-30 09:50:03'),
(24, 'Linux SuSe. Ubuntu. Red Hat. Debian y Centos', 'Soporte', 1, 47.619, 50, 23.8095, 71.4286, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 09:51:04'),
(25, 'Veeam Backup and replication enterprice plus for vmware', 'CPU', 1, 11.65, 25, 2.9125, 14.5625, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 09:51:33'),
(26, 'Mimix Minimo 2000 cpw', 'cpw', 1, 0.08, 32, 0.0256, 0.1056, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 09:51:56'),
(27, 'Doble take', 'server', 1, 48.1, 32, 15.392, 63.492, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 09:52:20'),
(28, 'Antivirus Kaspersky', 'SO', 1, 2.86, 32, 0.9152, 3.7752, 1, 3.7752, 0, 0, 3.7752, 10, NULL, '2015-07-30 09:52:37'),
(29, 'Firewall Hardware', 'puerto', 1, 10, 32, 3.2, 13.2, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 09:52:55'),
(30, 'Licencia de VmWare', 'Giga ram', 1, 9, 20, 1.8, 10.8, 1, 10.8, 0, 0, 10.8, 10, NULL, '2015-07-30 09:53:45'),
(31, 'P.U.C. (Punto Unico de Contacto) Mesa de Ayuda basica inicia con 30 llamas al mes ', 'llamadas', 30, 60, 80, 48, 108, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 09:54:25'),
(32, 'PUC llamada adicional', 'llamada', 1, 1, 50, 0.5, 1.5, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 09:55:13'),
(34, 'Horas de Intalacion  de Infraestructura', 'Hora', 1, 50, 20, 10, 60, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 09:57:35'),
(35, 'Unidad de Rack datacenter', 'U', 1, 115, 20, 23, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 09:57:49'),
(36, 'Manos remotas dc Triara paquete maximo de 20 solicitudes al mes', 'Solicitud', 1, 120, 15, 18, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 09:58:18');

--
-- Volcado de datos para la tabla `costos_power_aix`
--

INSERT INTO `costos_power_aix` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, NULL),
(2, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:51:44'),
(3, 'Licencia de Sistema Operativo (Incliuida)', 'N/A', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:51:48');

--
-- Volcado de datos para la tabla `costos_power_iseries`
--

INSERT INTO `costos_power_iseries` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `created`, `modified`, `category_id`) VALUES
(1, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, NULL, '2015-07-29 16:33:05', 1),
(2, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, NULL, '2015-07-29 16:33:15', 1),
(3, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, NULL, '2015-07-29 16:33:21', 1),
(4, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, NULL, '2015-07-29 16:33:31', 1);

--
-- Volcado de datos para la tabla `costos_power_linux`
--

INSERT INTO `costos_power_linux` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:26:53'),
(2, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:26:58'),
(3, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:27:04'),
(4, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:27:26'),
(5, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-29 17:27:34');

--
-- Volcado de datos para la tabla `costos_sparc`
--

INSERT INTO `costos_sparc` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA X86 - Recursos sin Licenciamiento por un core (1 core = 4 vcpu) ', 'Cores', 1, 24, 32, 7.68, 31.68, 1, 31.68, 4, 126.72, 158.4, 1, NULL, NULL),
(2, 'Servidor Fisico (bareMetal cores 16) sin memoria, 2 hbas un puerto, 4 ptos LAN', 'server', 1, 244, 32, 78.08, 322.08, 0, 0, 0, 0, 0, 1, NULL, NULL),
(3, 'PLATAFORMA X86 - Paquete de Recursos Memoria', 'Gigas', 1, 3, 50, 1.5, 4.5, 1, 4.5, 4, 18, 22.5, 1, NULL, NULL),
(4, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, 1, NULL, NULL),
(5, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, 1, NULL, NULL),
(6, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, 1, NULL, NULL),
(7, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, NULL),
(8, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, NULL),
(9, 'PLATAFORMA SPARC Core de recursos 1  CPU Sistema Operativo Base', 'CPU', 1, 70, 20, 14, 84, 0, 0, 0, 0, 0, 1, NULL, NULL),
(10, 'PLATAFORMA SPARC Paquete de Recursos memoria', 'Gigas', 1, 5, 20, 1, 6, 0, 0, 0, 0, 0, 1, NULL, NULL),
(11, 'PLATAFORMA HANA Procesamiento en tiempo real. 1  Tera ', 'Tera', 0.5, 80, 20, 16, 96, 0, 0, 0, 0, 0, 1, NULL, NULL),
(12, 'Almacenamiento Empresarial (Alto Desempeño HHD)-  solid state 200 GB    ', 'GB', 1, 0.63, 50, 0.315, 0.945, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 11:42:04'),
(13, 'Almacenamiento General (Datos )- 15k de 300 GB   ', 'GB', 1, 0.19, 50, 0.095, 0.285, 0, 0, 0, 0, 0, 2, NULL, '2015-07-30 11:42:19'),
(14, 'Almacenamiento  7.2k de 1TB  ', 'GB', 1, 0.09, 50, 0.045, 0.135, 100, 13.5, 0, 0, 13.5, 2, NULL, '2015-07-30 11:42:32'),
(15, 'lto5 venta', 'medio', 1, 60, 12, 7.2, 67.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:43:24'),
(17, 'Valor Mensual Alquiler Libreía LTO5 costo dedicada un driver', 'driver', 1, 241, 20, 48.2, 289.2, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:44:53'),
(18, 'Valor Mensual Alquiler Libreía LTO5 costo Compartida un driver', 'driver', 1, 100, 20, 20, 120, 0, 0, 0, 0, 0, 3, NULL, '2015-07-30 11:45:03'),
(19, 'Internet Dedicado en Data Center de Bogotá / 4 Megas ', '4 M', 4, 900, 15, 135, 1035, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 11:45:17'),
(20, 'Internet Compartido en Data Center de Bogotá / Megas ', '1 M', 1, 200, 50, 100, 300, 0, 0, 0, 0, 0, 4, NULL, '2015-07-30 11:45:38'),
(21, 'Canal dedicado MPLS depende la ultima milla', 'Mega', 4, 140, 20, 28, 168, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:45:49'),
(22, 'Puertos de Lan  hasta 1 Giga -', 'gb', 1, 10, 20, 2, 12, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:46:22'),
(23, 'Crossconexion 10-100 1000 Megas (1 Giga) ', 'mb', 1, 412, 20, 82.4, 494.4, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:47:13'),
(24, 'Pago unico  activacion cross conexión', ' ', 1, 1300, 20, 260, 1560, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:47:42'),
(25, 'Canal Compartido Replica entre datacenter Triara y Terremark', '2 megas', 1, 600, 20, 120, 720, 0, 0, 0, 0, 0, 5, NULL, '2015-07-30 11:48:01'),
(26, 'Backup - X86-VmWare Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.1, 50, 0.05, 0.15, 50, 7.5, 0, 0, 7.5, 6, NULL, '2015-07-30 11:49:19'),
(27, 'Backup - POWER  AIX_LINUX  Retención mes adicional en disco / Vr. GB 1,00   ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 11:49:47'),
(28, 'Backup - A Cinta Retención mes  ', 'Giga', 1, 0.5, 20, 0.1, 0.6, 0, 0, 0, 0, 0, 6, NULL, '2015-07-30 11:50:15'),
(29, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(30, 'lan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(31, 'san', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 'Costos Servidor adicional parametros adicionales 10 parametos', 'server', 1, 15, 50, 7.5, 22.5, 1, 22.5, 0, 0, 22.5, 7, NULL, '2015-07-30 11:51:10'),
(33, 'Especialista Intel LINUX –WINDOWS Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 11:51:30'),
(34, 'Especialista Power AIX, ISERIES  Implementador-Soporte Vr. Hora 1,00   ', 'Hora', 1, 150, 0, 0, 150, 0, 0, 0, 0, 0, 11, NULL, '2015-07-30 11:52:02'),
(35, 'Manos Inteligentes especialistas – Servicio adicional una vez superada la línea Base no acumulables', 'Hora', 1, 100, 0, 0, 100, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 11:53:34'),
(36, 'Manos remotas – Servicio Linea Base', 'Hora', 1, 50, 30, 15, 65, 0, 0, 0, 0, 0, 12, NULL, '2015-07-30 11:54:12'),
(37, 'Sistema Operativo Windows 2008-2012 lic x cpu  datacenter', 'spla', 1, 125.714, 15, 18.8571, 144.571, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:55:10'),
(38, 'OfficeStd ALNG LicSAPk MVL SAL', 'spla', 1, 16.7429, 50, 8.37145, 25.1143, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:55:36'),
(39, 'PrjctPro ALNG LicSAPk MVL SAL w1PrjctSvrCAL', 'spla', 1, 40.1857, 50, 20.0928, 60.2785, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:55:47'),
(40, 'WinSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 5.82857, 50, 2.91428, 8.74286, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:55:59'),
(41, 'SQLSvrStd ALNG LicSAPk MVL SAL', 'spla', 1, 21.0571, 50, 10.5286, 31.5856, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:56:12'),
(42, 'WinSvrStd ALNG LicSAPk MVL SAL  win 7', 'spla', 0, 5.82857, 50, 2.91428, 8.74286, 1, 8.74286, 0, 0, 8.74286, 8, NULL, '2015-07-30 11:56:28'),
(43, 'Linux SuSe, Ubuntu, Red Hat, Debian y Centos', 'Soporte', 1, 47.619, 50, 23.8095, 71.4285, 0, 0, 0, 0, 0, 8, NULL, '2015-07-30 11:56:47'),
(44, 'Veeam Backup and replication enterprice plus for vmware', 'CPU', 1, 11.65, 25, 2.9125, 14.5625, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:57:29'),
(45, 'Mimix Minimo 2000 cpw', 'cpw', 1, 0.08, 32, 0.0256, 0.1056, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:58:38'),
(46, 'Doble take', 'server', 1, 48.1, 32, 15.392, 63.492, 0, 0, 0, 0, 0, 9, NULL, '2015-07-30 11:58:58'),
(47, 'Antivirus Kaspersky', 'SO', 1, 2.86, 32, 0.9152, 3.7752, 1, 3.7752, 0, 0, 3.7752, 10, NULL, '2015-07-30 11:59:40'),
(48, 'Firewall Hardware', 'puerto', 1, 10, 32, 3.2, 13.2, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 12:00:02'),
(49, 'Licencia de VmWare', 'Giga ram', 1, 9, 20, 1.8, 10.8, 1, 10.8, 0, 0, 10.8, 10, NULL, '2015-07-30 12:00:13'),
(50, 'P.U.C. (Punto Unico de Contacto) Mesa de Ayuda basica inicia con 30 llamas al mes ', 'llamadas', 30, 60, 80, 48, 108, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 12:00:27'),
(51, 'PUC llamada adicional', 'llamada', 1, 1, 50, 0.5, 1.5, 0, 0, 0, 0, 0, 10, NULL, '2015-07-30 12:00:56'),
(53, 'Horas de Intalacion  de Infraestructura', 'Hora', 1, 50, 20, 10, 60, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 12:02:14'),
(54, 'Unidad de Rack datacenter', 'U', 1, 115, 20, 23, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 12:02:34'),
(55, 'Manos remotas dc Triara paquete maximo de 20 solicitudes al mes', 'Solicitud', 1, 120, 15, 18, 138, 0, 0, 0, 0, 0, 13, NULL, '2015-07-30 12:01:57');

--
-- Volcado de datos para la tabla `disco_externo`
--

INSERT INTO `disco_externo` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'Almacenamiento Empresarial (Alto Desempeño HHD)-  solid state 200 GB    ', 'GB', 1, 0.63, 50, 0.315, 0.945, 0, 0, 0, 0, 0, 2, NULL, '2015-07-29 14:36:07'),
(2, 'Almacenamiento General (Datos )- 15k de 300 GB   ', 'GB', 1, 0.19, 50, 0.095, 0.285, 0, 0, 0, 0, 0, 2, NULL, '2015-07-29 14:40:32'),
(3, 'Almacenamiento  7.2k de 1TB  ', 'GB', 1, 0.09, 50, 0.045, 0.135, 100, 13.5, 0, 0, 13.5, 2, NULL, '2015-07-29 15:05:01');

--
-- Volcado de datos para la tabla `elements`
--

INSERT INTO `elements` (`id`, `name`, `description`, `category_id`, `technology_id`, `Unity_measure_id`, `status_id`, `created`, `modified`) VALUES
(1, 'Disco', 'Disco duro 100 GB', 2, 1, 2, 1, '2015-08-26 14:13:26', '2015-08-26 14:13:26'),
(2, 'Servidores', 'asdfsadf', 4, 2, 1, 1, '2015-08-26 14:13:41', '2015-08-26 14:13:41');

--
-- Volcado de datos para la tabla `interfaces`
--

INSERT INTO `interfaces` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'sdf', 'edfsd', 1, 23, 45, 10.35, 33.35, 2, 66.7, 3, 100.05, 166.75, 1, '2015-07-30 14:25:04', '2015-07-30 14:25:04');

--
-- Volcado de datos para la tabla `licencia_os`
--

INSERT INTO `licencia_os` (`id`, `supported_oss`, `quantity`, `license_cost_x_vCPUs`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `created`, `modified`) VALUES
(1, 'AIX 5.3', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(2, 'AIX 6.1', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(3, 'AIX 7.1', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(4, 'AS/400 5', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(5, 'AS/400 6', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(6, 'AS/400 7', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(7, 'Linux RHEL 5 for Power', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(8, 'Linux RHEL 6 for Power', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(9, 'Linux RHEL 7 for Power', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(10, 'Linux SUSE 10 for Power', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(11, 'Linux SUSE 11 for Power', 1, 0, 20, 0, 0, 1, 0, 1, 0, 0, NULL, NULL),
(12, 'Linux RHEL 5 for X86_64', 1, 47.619, 20, 9.52381, 57.1429, 1, 57.1429, 1, 57.1429, 114.286, NULL, NULL),
(13, 'Linux RHEL 6 for X86_64', 1, 47.619, 20, 9.52381, 57.1429, 1, 57.1429, 1, 57.1429, 114.286, NULL, NULL),
(14, 'Linux RHEL 7 for X86_64', 1, 47.619, 20, 9.52381, 57.1429, 1, 57.1429, 1, 57.1429, 114.286, NULL, NULL),
(15, 'Linux SUSE 10 for X86_64', 1, 47.619, 20, 9.52381, 57.1429, 1, 57.1429, 1, 57.1429, 114.286, NULL, NULL),
(16, 'Linux SUSE 11 for X86_64', 1, 47.619, 20, 9.52381, 57.1429, 1, 57.1429, 1, 57.1429, 114.286, NULL, NULL),
(17, 'Windows 2003 Std 32Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(18, 'Windows 2003 Std 64Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(19, 'Windows 2003 Ent 32Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(20, 'Windows 2003 Ent 64Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(21, 'Windows 2008 Std 32Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(22, 'Windows 2008 R2 Std 64Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL),
(23, 'Windows 2008 R2 Ent 64Bits', 1, 125.714, 20, 25.1429, 150.857, 1, 150.857, 1, 150.857, 301.714, NULL, NULL);

--
-- Volcado de datos para la tabla `technology`
--

INSERT INTO `technology` (`id`, `name`, `description`, `status_id`, `created`, `modified`) VALUES
(1, 'Intel', 'Intel', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'IBM', 'IBM', 1, '2015-08-25 16:47:38', '2015-08-25 16:48:58');

--
-- Volcado de datos para la tabla `tipo_servidores`
--

INSERT INTO `tipo_servidores` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'PLATAFORMA X86 - Recursos sin Licenciamiento por un core (1 core = 4 vcpu) ', 'Cores', 1, 24, 32, 7.68, 31.68, 1, 31.68, 4, 126.72, 158.4, 1, NULL, '2015-07-30 12:35:08'),
(2, 'Servidor Fisico (bareMetal cores 16) sin memoria, 2 hbas un puerto, 4 ptos LAN', 'server', 1, 244, 32, 78.08, 322.08, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:36:38'),
(3, 'PLATAFORMA X86 - Paquete de Recursos Memoria', 'Gigas', 1, 3, 50, 1.5, 4.5, 1, 4.5, 4, 18, 22.5, 1, NULL, '2015-07-30 12:36:45'),
(4, 'PLATAFORMA POWER.  cpws  iseries Incluye Sistema Operativo Base (minimo 700)', 'Cpw', 1, 0.2, 55, 0.11, 0.31, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:36:52'),
(5, 'PLATAFORMA POWER i. BASE.  cpws  iseries Incluye Sistema Operativo Base Minimo 2000  cpws)', 'Cpw', 1, 0.39, 55, 0.2145, 0.6045, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:36:58'),
(6, 'PLATAFORMA POWER. Adicional a la Base cpws  iseries Incluye Sistema Operativo Base (Despues de 2000  cpws)', 'Cpw', 1, 0.19, 40, 0.076, 0.266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:37:04'),
(7, 'PLATAFORMA POWER. (Rperf) 1 AIX-LINUX  0,1 unidad de cpu Incluye Sistema Operativo Base', 'cpu', 1, 190, 40, 76, 266, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:37:10'),
(8, 'PLATAFORMA POWER.   Paquete de Recursos memoria(Base  8 gigas)', 'Gigas', 1, 4, 50, 2, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:39:39'),
(9, 'PLATAFORMA SPARC Core de recursos 1  CPU Sistema Operativo Base', 'CPU', 1, 70, 20, 14, 84, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:39:47'),
(10, 'PLATAFORMA SPARC Paquete de Recursos memoria', 'Gigas', 1, 5, 20, 1, 6, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:39:56'),
(11, 'PLATAFORMA HANA Procesamiento en tiempo real. 1  Tera ', 'Tera', 0.5, 80, 20, 16, 96, 0, 0, 0, 0, 0, 1, NULL, '2015-07-30 12:40:07');

--
-- Volcado de datos para la tabla `unitymeasure`
--

INSERT INTO `unitymeasure` (`id`, `name`, `description`, `status_id`, `created`, `modified`) VALUES
(1, 'MB', 'Megabyte', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'GB', 'GigaByte', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `status_id`, `created`, `modified`) VALUES
(1, 'Linktic', 'Linktic', 'linktic@linktic.com', 'linktic@linktic.com', '$2y$10$sAg/rVQHgyqKKkwAHx.1J.zi/3kUa90xnuU1yRfa2Rwz9EoQpVhvW', 1, '0000-00-00 00:00:00', '2015-08-25 14:33:50'),
(2, 'Juan', 'Garcia', 'juan.garcia@asicamericas.com', 'juan.garcia@asicamericas.com', '$2y$10$ISCcxgpI6Q28CzWZDD0dke0gKvqwNXoNOhY8JoD5Qz41qxS/vgFge', 1, '0000-00-00 00:00:00', '2015-08-25 14:33:50'),

--
-- Volcado de datos para la tabla `vcpu_de_cpu`
--

INSERT INTO `vcpu_de_cpu` (`id`, `description_resource_units`, `measure`, `quantity`, `cost_dollars`, `margin`, `sale`, `sale2`, `quantity2`, `total_value`, `quantity3`, `total_value2`, `sale_total`, `category_id`, `created`, `modified`) VALUES
(1, 'f', '2', 8, 89, 99, 88.11, 177.11, 9, 1593.99, 9, 1593.99, 3187.98, 1, '2015-07-30 14:38:20', '2015-07-30 14:42:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
