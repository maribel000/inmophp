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
TRUNCATE TABLE `redinmo`.`paises`;
INSERT INTO `redinmo`.`paises` (`id`, `codigo`, `nombre`) VALUES
  (NULL, 'AR', 'Argentina'),
  (NULL, 'BO', 'Bolivia'),
  (NULL, 'PY', 'Paraguay');

--
-- Provincias
--
TRUNCATE TABLE `redinmo`.`provincias`;
INSERT INTO `redinmo`.`provincias` (`id`, `nombre`, `id_pais`) VALUES
-- Provincias de Argentina
  (NULL, 'Buenos Aires', 1),
  (NULL, 'Catamarca', 1),
  (NULL, 'Chaco', 1),
  (NULL, 'Chubut', 1),
  (NULL, 'Córdoba', 1),
  (NULL, 'Corrientes', 1),
  (NULL, 'Entre Rios', 1),
  (NULL, 'Formosa', 1),
  (NULL, 'Jujuy', 1),
  (NULL, 'La Pampa', 1),
  (NULL, 'La Rioja', 1),
  (NULL, 'Mendoza', 1),
  (NULL, 'Misiones', 1),
  (NULL, 'Neuquén', 1),
  (NULL, 'Río Negro', 1),
  (NULL, 'Salta', 1),
  (NULL, 'San Juan', 1),
  (NULL, 'San Luis', 1),
  (NULL, 'Santa Cruz', 1),
  (NULL, 'Santa Fe', 1),
  (NULL, 'Santiago del Estero', 1),
  (NULL, 'Tierra del Fuego', 1),
  (NULL, 'Tucumán', 1),

-- Provincias de Bolivia
  (NULL, 'Beni', 2),
  (NULL, 'Chuquisaca', 2),
  (NULL, 'Cochabamba', 2),
  (NULL, 'La Paz', 2),
  (NULL, 'Oruro', 2),
  (NULL, 'Pando', 2),
  (NULL, 'Potosí', 2),
  (NULL, 'Santa Cruz', 2),
  (NULL, 'Tarija', 2),

-- Provincias de Paraguay
  (NULL, 'Asunción', 3),
  (NULL, 'San Pedro', 3),
  (NULL, 'Cordillera ', 3),
  (NULL, 'Guairá', 3),
  (NULL, 'Caaguazú', 3),
  (NULL, 'Caazapá', 3),
  (NULL, 'Itapúa', 3),
  (NULL, 'Misiones', 3),
  (NULL, 'Paraguarí', 3),
  (NULL, 'Alto Paraná', 3),
  (NULL, 'Central', 3),
  (NULL, 'Ñeembucú', 3),
  (NULL, 'Amambay', 3),
  (NULL, 'Canindeyú', 3),
  (NULL, 'Presidente Hayes', 3),
  (NULL, 'Alto Paraguay', 3),
  (NULL, 'Boquerón', 3);

--
-- Localidades
--
TRUNCATE TABLE `redinmo`.`localidades`;
INSERT INTO `redinmo`.`localidades` (`id`, `nombre`, `id_localidad`) VALUES
-- Localidades de Buenos Aires
  (NULL, 'Adolfo Gonzales Chaves', 1),
  (NULL, 'Aguas Verdes', 1),
  (NULL, 'Alberti', 1),
  (NULL, 'Arenas Verdes', 1),
  (NULL, 'Arrecifes', 1),
  (NULL, 'Ayacucho', 1),
  (NULL, 'Azul', 1),
  (NULL, 'Bahia Blanca', 1),
  (NULL, 'Bahia San Blas', 1),
  (NULL, 'Balcarce', 1),
  (NULL, 'Balneario San Cayetano', 1),
  (NULL, 'Baradero', 1),
  (NULL, 'Benito Juarez', 1),
  (NULL, 'Berisso', 1),
  (NULL, 'Bolivar', 1),
  (NULL, 'Bragado', 1),
  (NULL, 'Brandsen', 1),
  (NULL, 'Campana', 1),
  (NULL, 'Cañuelas', 1),
  (NULL, 'Capilla del Señor', 1),
  (NULL, 'Capitan Sarmiento', 1),
  (NULL, 'Carhue', 1),
  (NULL, 'Carilo', 1),
  (NULL, 'Carlos Casares', 1),
  (NULL, 'Carlos Keen', 1),
  (NULL, 'Carlos Tejedor', 1),
  (NULL, 'Carmen de Areco', 1),
  (NULL, 'Carmen de Patagones', 1),
  (NULL, 'Castelli', 1),
  (NULL, 'Chacabuco', 1),
  (NULL, 'Chapadmalal', 1),
  (NULL, 'Chascomus', 1),
  (NULL, 'Chivilcoy', 1),
  (NULL, 'Ciudad de Buenos Aires', 1),
  (NULL, 'Claromeco', 1),
  (NULL, 'Colon', 1),
  (NULL, 'Coronel Dorrego', 1),
  (NULL, 'Coronel Pringles', 1),
  (NULL, 'Coronel Suarez', 1),
  (NULL, 'Coronel Vidal', 1),
  (NULL, 'Costa Azul', 1),
  (NULL, 'Costa Chica', 1),
  (NULL, 'Costa del Este', 1),
  (NULL, 'Costa Esmeralda', 1),
  (NULL, 'Daireaux', 1),
  (NULL, 'Dolores', 1),
  (NULL, 'Ensenada', 1),
  (NULL, 'Escobar', 1),
  (NULL, 'Exaltación de la Cruz', 1),
  (NULL, 'Ezeiza', 1),
  (NULL, 'Florentino Ameghino', 1),
  (NULL, 'General Belgrano', 1),
  (NULL, 'General Lamadrid', 1),
  (NULL, 'General Las Heras', 1),
  (NULL, 'General Lavalle', 1),
  (NULL, 'General Madariaga', 1),
  (NULL, 'General Pinto', 1),
  (NULL, 'General Rodriguez', 1),
  (NULL, 'General Villegas', 1),
  (NULL, 'Guaminí', 1),
  (NULL, 'Huanguelen', 1),
  (NULL, 'Junin', 1),
  (NULL, 'La Lucila del Mar', 1),
  (NULL, 'La Plata', 1),
  (NULL, 'Las Flores', 1),
  (NULL, 'Las Gaviotas', 1),
  (NULL, 'Las Toninas', 1),
  (NULL, 'Lincoln', 1),
  (NULL, 'Lobería', 1),
  (NULL, 'Lobos', 1),
  (NULL, 'Los Toldos', 1),
  (NULL, 'Lujan', 1),
  (NULL, 'Magdalena', 1),
  (NULL, 'Maipu', 1),
  (NULL, 'Mar Azul', 1),
  (NULL, 'Mar Chiquita', 1),
  (NULL, 'Mar de Ajo', 1),
  (NULL, 'Mar de Cobo', 1),
  (NULL, 'Mar de las Pampas', 1),
  (NULL, 'Mar del Plata', 1),
  (NULL, 'Mar del Sur', 1),
  (NULL, 'Mar del Tuyu', 1),
  (NULL, 'Marisol', 1),
  (NULL, 'Medanos', 1),
  (NULL, 'Mercedes', 1),
  (NULL, 'Miramar', 1),
  (NULL, 'Monte Hermoso', 1),
  (NULL, 'Navarro', 1),
  (NULL, 'Necochea', 1),
  (NULL, 'Nueva Atlantis', 1),
  (NULL, 'Nueve de Julio', 1),
  (NULL, 'Olavarria', 1),
  (NULL, 'Orense', 1),
  (NULL, 'Oriente', 1),
  (NULL, 'Ostende', 1),
  (NULL, 'Pedro Luro', 1),
  (NULL, 'Pehuajo', 1),
  (NULL, 'Pehuen Co', 1),
  (NULL, 'Pergamino', 1),
  (NULL, 'Pigüé', 1),
  (NULL, 'Pilar', 1),
  (NULL, 'Pinamar', 1),
  (NULL, 'Pinar del Sol', 1),
  (NULL, 'Pipinas', 1),
  (NULL, 'Puan', 1),
  (NULL, 'Punta Alta', 1),
  (NULL, 'Punta Indio', 1),
  (NULL, 'Punta Medanos', 1),
  (NULL, 'Quequen', 1),
  (NULL, 'Quilmes', 1),
  (NULL, 'Ramallo', 1),
  (NULL, 'Ranchos', 1),
  (NULL, 'Rauch', 1),
  (NULL, 'Reta', 1),
  (NULL, 'Rivadavia', 1),
  (NULL, 'Rojas', 1),
  (NULL, 'Roque Perez', 1),
  (NULL, 'Saavedra', 1),
  (NULL, 'Saladillo', 1),
  (NULL, 'Saldungaray', 1),
  (NULL, 'Salto', 1),
  (NULL, 'San Andres de Giles', 1),
  (NULL, 'San Antonio de Areco', 1),
  (NULL, 'San Bernardo', 1),
  (NULL, 'San Cayetano', 1),
  (NULL, 'San Clemente del Tuyu', 1),
  (NULL, 'San Fernando', 1),
  (NULL, 'San Isidro', 1),
  (NULL, 'San Miguel del Monte', 1),
  (NULL, 'San Nicolas', 1),
  (NULL, 'San Pedro', 1),
  (NULL, 'Santa Clara del Mar', 1),
  (NULL, 'Santa Teresita', 1),
  (NULL, 'Sierra de la Ventana', 1),
  (NULL, 'Sierra de los Padres', 1),
  (NULL, 'Sierras Bayas', 1),
  (NULL, 'Suipacha', 1),
  (NULL, 'Tandil', 1),
  (NULL, 'Tapalque', 1),
  (NULL, 'Tigre', 1),
  (NULL, 'Tomas Jofre', 1),
  (NULL, 'Tornquist', 1),
  (NULL, 'Treinta de Agosto', 1),
  (NULL, 'Trenque Lauquen', 1),
  (NULL, 'Tres Arroyos', 1),
  (NULL, 'Valeria del Mar', 1),
  (NULL, 'Vedia', 1),
  (NULL, 'Veinticinco de Mayo', 1),
  (NULL, 'Verónica', 1),
  (NULL, 'Vicente Casares', 1),
  (NULL, 'Villa Gesell', 1),
  (NULL, 'Villa La Arcadia', 1),
  (NULL, 'Villa Serrana La Gruta', 1),
  (NULL, 'Villa Ventana', 1),
  (NULL, 'Villalonga', 1),
  (NULL, 'Zarate', 1),

-- Localidades de Catamarca
  (NULL, 'Adolfo Gonzales Chaves', 2),

-- Localidades de Chaco
  (NULL, 'Adolfo Gonzales Chaves', 3),

-- Localidades de Chubut
  (NULL, 'Adolfo Gonzales Chaves', 4),

-- Localidades de Córdoba
  (NULL, 'Adolfo Gonzales Chaves', 5),

-- Localidades de Corrientes
  (NULL, 'Adolfo Gonzales Chaves', 6),

-- Localidades de Entre Rios
  (NULL, 'Adolfo Gonzales Chaves', 7),

-- Localidades de Formosa
  (NULL, 'Adolfo Gonzales Chaves', 8),

-- Localidades de Jujuy
  (NULL, 'Adolfo Gonzales Chaves', 9),

-- Localidades de La Pampa
  (NULL, 'Adolfo Gonzales Chaves', 10),

-- Localidades de La Rioja
  (NULL, 'Adolfo Gonzales Chaves', 11),

-- Localidades de Mendoza
  (NULL, 'Adolfo Gonzales Chaves', 12),

-- Localidades de Misiones
  (NULL, 'Adolfo Gonzales Chaves', 13),

-- Localidades de Neuquén
  (NULL, 'Adolfo Gonzales Chaves', 14),

-- Localidades de Río Negro
  (NULL, 'Adolfo Gonzales Chaves', 15),

-- Localidades de Salta
  (NULL, 'Adolfo Gonzales Chaves', 16),

-- Localidades de San Juan
  (NULL, 'Adolfo Gonzales Chaves', 17),

-- Localidades de San Luis
  (NULL, 'Adolfo Gonzales Chaves', 18),

-- Localidades de Santa Cruz
  (NULL, 'Adolfo Gonzales Chaves', 19),

-- Localidades de Santa Fe
  (NULL, 'Adolfo Gonzales Chaves', 20),

-- Localidades de Santiago del Estero
  (NULL, 'Adolfo Gonzales Chaves', 21),

-- Localidades de Tierra del Fuego
  (NULL, 'Adolfo Gonzales Chaves', 22),

-- Localidades de Tucumán
  (NULL, 'Adolfo Gonzales Chaves', 23),



