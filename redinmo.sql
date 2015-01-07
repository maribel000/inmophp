-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2015 a las 16:17:20
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redinmo`
--
CREATE DATABASE IF NOT EXISTS `redinmo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `redinmo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

DROP TABLE IF EXISTS `avisos`;
CREATE TABLE IF NOT EXISTS `avisos` (
`id` int(11) NOT NULL,
  `tipo_op` tinyint(4) NOT NULL,
  `tipo_inm` tinyint(4) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `barrio` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ambientes` int(11) NOT NULL,
  `dormitorios` int(11) NOT NULL,
  `banios` int(11) NOT NULL,
  `metros2` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `detalles` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id`, `tipo_op`, `tipo_inm`, `provincia`, `ciudad`, `barrio`, `direccion`, `ambientes`, `dormitorios`, `banios`, `metros2`, `estado`, `anio`, `precio`, `detalles`) VALUES
(1, 0, 0, 'Santa Fe', 'ciudad 123456', 'barrio', 'direccion', 1, 2, 3, 4, '5', 6, 7777, 'detallessss'),
(2, 1, 2, 'Santa Fe', 'rosario', 'empalme', 'cavour 554', 0, 0, 0, 0, '', 0, 450, 'muy buena cochera!'),
(3, 1, 2, 'Santa Fe', 'baigorria', 'empalme', 'cavour 554', 0, 0, 0, 0, '', 0, 450, 'muy buena cochera!'),
(4, 0, 0, 'Santa Fe', '', '', '', 0, 0, 0, 0, '', 0, 0, 'deta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'inmobiliarias', 'grupo para las inmobiliarias'),
(4, 'particulares', 'grupo para los particulares'),
(5, 'clientes', 'grupo para los clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1419890475, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'lucas blanco', '0', NULL, 'lucasblanco@gmail.com', NULL, NULL, NULL, NULL, 1419629701, NULL, 1, 'Lucas', 'Blanco', 'bscnet', '4303030'),
(3, '127.0.0.1', 'ds fds', '0', NULL, 'nada@nada.com', NULL, NULL, NULL, NULL, 1419630619, NULL, 1, 'ds', 'fds', 'fdsf', '123'),
(4, '127.0.0.1', 'fdsfds fdsfs', '0', NULL, 'fdsfdsfsd@fds.com', NULL, NULL, NULL, NULL, 1419630679, NULL, 1, 'fdsfds', 'fdsfs', 'fdsfs', '4556115'),
(5, '127.0.0.1', 'gfdgfd gfdgfdg', '0', NULL, 'gfd@fds.com', NULL, NULL, NULL, NULL, 1419630891, NULL, 1, 'gfdgfd', 'gfdgfdg', 'gfdgfd', '45641'),
(6, '127.0.0.1', 'test test', '$2y$08$QVX4c5ZpTsZTXjC.zKprTO.sNWdhAFEoAEKoYadyIMmHlZkl9kbu6', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1419632969, NULL, 1, 'test', 'test', 'test', '446'),
(7, '::1', 'testa testa', '$2y$08$ihndjNKdqvXqWF8SmJhfm.caAkjQ3RjEul05bVSymBwgHf.py.hTK', NULL, 'testaa@test.com', NULL, NULL, NULL, NULL, 1419890726, NULL, 1, 'testa', 'testa', 'testa', '1'),
(8, '::1', 'inmo1 ape1', '$2y$08$SQSHkKXb0O0B93QYLtje2upyxy0mLQrwREAmDbhZFk439TzUI854C', NULL, 'lala@sa.com', NULL, NULL, NULL, NULL, 1419891636, NULL, 1, 'inmo1', 'ape1', 'sarasa', '15641651'),
(9, '::1', 'gfdgd gfdgfd', '$2y$08$ABCLUTkEBbdmgjeCHbcWr.9E9LgpJ.K0leAo.6mRQKuOITXBhMKAG', NULL, 'gfd@fdsf.com', NULL, NULL, NULL, NULL, 1419891949, NULL, 1, 'gfdgd', 'gfdgfd', 'gfdgfd', '15616'),
(10, '::1', 'gfdgdafds fds', '$2y$08$Xul1S38I8uc0c7.8BmrK4eZv9jTMZZv6BGDVy2G1WUr0NzVrDREVq', NULL, 'fdsfasdsf@fds.com', NULL, NULL, NULL, NULL, 1419893746, NULL, 1, 'gfdgdafds', 'fds', 'fds', '123132'),
(11, '::1', 'nombre appelido', '$2y$08$fEtBQ2ZgFsA..t2gs3MnzexkpVq6Uzo1dAmFuLS78GECKMTiN0pS.', NULL, 'dsfsf1dsfsd6@sa.com', NULL, NULL, NULL, NULL, 1419896451, NULL, 1, 'nombre', 'appelido', 'sada', '152'),
(12, '::1', 'pepe gomez', '$2y$08$1NzISC4N9uzCEBMpDPTCgONTBKGfApD9Iq/kWdaRTzQKEHDa03Hh.', NULL, 'lala@sasa.com', NULL, NULL, NULL, NULL, 1419896741, NULL, 1, 'pepe', 'gomez', 'bscnet', '123456789'),
(13, '::1', 'asasadsa dsadsads', '$2y$08$THzNXDD/KP35vnjf/t0INeY.K9CA55bjMwvj1nZvXrZVBBV9/k5qm', NULL, 'dsadsadsadsa@fds.com', NULL, NULL, NULL, NULL, 1419896764, NULL, 1, 'asasadsa', 'dsadsads', 'adsadsadsa', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2),
(8, 6, 2),
(9, 7, 2),
(10, 8, 2),
(11, 9, 2),
(12, 10, 3),
(13, 11, 4),
(14, 12, 3),
(15, 13, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
