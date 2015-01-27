-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2015 a las 16:19:21
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
USE `redinmo`;

-- --------------------------------------------------------

--
-- Paises
--

INSERT INTO `redinmo`.`paises` (`id`, `codigo`, `nombre`, `prefijo_tel`) VALUES
  (NULL, 'AR', 'Argentina', '+54'),
  (NULL, 'BR', 'Brasil', '+55'),
  (NULL, 'CL', 'Chile', '+56'),
  (NULL, 'VE', 'Venezuela', '+58'),
  (NULL, 'BO', 'Bolivia', '+591'),
  (NULL, 'EC', 'Ecuador', '+593'),
  (NULL, 'PY', 'Paraguay', '+595');