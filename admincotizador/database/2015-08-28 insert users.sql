-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2015 a las 14:28:44
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `status_id`, `created`, `modified`) VALUES
(1, 'Linktic', 'Linktic', 'linktic@linktic.com', 'linktic@linktic.com', '$2y$10$sAg/rVQHgyqKKkwAHx.1J.zi/3kUa90xnuU1yRfa2Rwz9EoQpVhvW', 1, '0000-00-00 00:00:00', '2015-08-25 14:33:50'),
(2, 'Juan', 'Garcia', 'juan.garcia@asicamericas.com', 'juan.garcia@asicamericas.com', '$2y$10$ISCcxgpI6Q28CzWZDD0dke0gKvqwNXoNOhY8JoD5Qz41qxS/vgFge', 1, '2015-08-18 08:45:01', '2015-08-28 12:22:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
