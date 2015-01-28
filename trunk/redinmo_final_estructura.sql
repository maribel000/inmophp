-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2015 a las 16:02:30
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
  `id_tipo_inmueble` tinyint(4) NOT NULL,
  `tipo_op` tinyint(4) NOT NULL,
  `id_barrio` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `metros_cuadrados` int(11) NOT NULL,
  `cant_ambientes` int(11) NOT NULL,
  `cant_dormitorios` int(11) NOT NULL,
  `cant_banios` int(11) NOT NULL,
  `estado_inmueble` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  `detalles` text NOT NULL,
  `precio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado_aviso` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_fotos`
--

DROP TABLE IF EXISTS `aviso_fotos`;
CREATE TABLE IF NOT EXISTS `aviso_fotos` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `url` varchar(90) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

DROP TABLE IF EXISTS `barrios`;
CREATE TABLE IF NOT EXISTS `barrios` (
`id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_localidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enviado_mail`
--

DROP TABLE IF EXISTS `enviado_mail`;
CREATE TABLE IF NOT EXISTS `enviado_mail` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_caracteristicas`
--

DROP TABLE IF EXISTS `inmuebles_caracteristicas`;
CREATE TABLE IF NOT EXISTS `inmuebles_caracteristicas` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

DROP TABLE IF EXISTS `localidades`;
CREATE TABLE IF NOT EXISTS `localidades` (
`id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `mensaje` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
`id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE IF NOT EXISTS `provincias` (
`id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_inmuebles`
--

DROP TABLE IF EXISTS `tipos_inmuebles`;
CREATE TABLE IF NOT EXISTS `tipos_inmuebles` (
`id` int(11) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_inmuebles_caracteristicas`
--

DROP TABLE IF EXISTS `tipos_inmuebles_caracteristicas`;
CREATE TABLE IF NOT EXISTS `tipos_inmuebles_caracteristicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `activo` tinyint(1) unsigned DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `nro_tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_busquedas`
--

DROP TABLE IF EXISTS `usuario_busquedas`;
CREATE TABLE IF NOT EXISTS `usuario_busquedas` (
  `id_usuario` int(11) unsigned NOT NULL,
  `id_busqueda` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `cadena` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_favoritos`
--

DROP TABLE IF EXISTS `usuario_favoritos`;
CREATE TABLE IF NOT EXISTS `usuario_favoritos` (
  `id_usuario` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pedidos`
--

DROP TABLE IF EXISTS `usuario_pedidos`;
CREATE TABLE IF NOT EXISTS `usuario_pedidos` (
  `id_usuario` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_tipo_inmueble` tinyint(4) NOT NULL,
  `tipo_op` tinyint(4) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `precio_min` int(11) NOT NULL,
  `precio_max` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ver_datos`
--

DROP TABLE IF EXISTS `ver_datos`;
CREATE TABLE IF NOT EXISTS `ver_datos` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visualizaciones`
--

DROP TABLE IF EXISTS `visualizaciones`;
CREATE TABLE IF NOT EXISTS `visualizaciones` (
  `id` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `ip_address` int(15) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aviso_fotos`
--
ALTER TABLE `aviso_fotos`
 ADD PRIMARY KEY (`id`,`id_aviso`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
 ADD PRIMARY KEY (`id`), ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `enviado_mail`
--
ALTER TABLE `enviado_mail`
 ADD PRIMARY KEY (`id`,`id_aviso`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmuebles_caracteristicas`
--
ALTER TABLE `inmuebles_caracteristicas`
 ADD PRIMARY KEY (`id`,`id_aviso`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
 ADD PRIMARY KEY (`id`), ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`id`,`id_aviso`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_codigo` (`codigo`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `tipos_inmuebles`
--
ALTER TABLE `tipos_inmuebles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_inmuebles_caracteristicas`
--
ALTER TABLE `tipos_inmuebles_caracteristicas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indices de la tabla `usuario_busquedas`
--
ALTER TABLE `usuario_busquedas`
 ADD PRIMARY KEY (`id_busqueda`,`id_usuario`), ADD UNIQUE KEY `id_usuario_3` (`id_busqueda`), ADD UNIQUE KEY `id_usuario_4` (`id_busqueda`), ADD UNIQUE KEY `id_busqueda` (`id_busqueda`), ADD UNIQUE KEY `id_usuario_6` (`id_busqueda`), ADD UNIQUE KEY `id_busqueda_2` (`id_busqueda`,`id_usuario`), ADD UNIQUE KEY `id_busqueda_3` (`id_busqueda`), ADD KEY `id_usuario` (`id_busqueda`), ADD KEY `id_usuario_2` (`id_usuario`), ADD KEY `id_busqueda_4` (`id_busqueda`);

--
-- Indices de la tabla `usuario_favoritos`
--
ALTER TABLE `usuario_favoritos`
 ADD PRIMARY KEY (`id_usuario`,`id_aviso`);

--
-- Indices de la tabla `usuario_pedidos`
--
ALTER TABLE `usuario_pedidos`
 ADD PRIMARY KEY (`id_usuario`,`id_pedido`);

--
-- Indices de la tabla `ver_datos`
--
ALTER TABLE `ver_datos`
 ADD PRIMARY KEY (`id`,`id_aviso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_inmuebles`
--
ALTER TABLE `tipos_inmuebles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrios`
--
ALTER TABLE `barrios`
ADD CONSTRAINT `barrios_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
ADD CONSTRAINT `localidades_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id`);

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_busquedas`
--
ALTER TABLE `usuario_busquedas`
ADD CONSTRAINT `usuario_busquedas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
