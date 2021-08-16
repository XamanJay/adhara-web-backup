-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2017 a las 18:29:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gphoteles`
--
CREATE DATABASE IF NOT EXISTS `gphoteles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gphoteles`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` blob NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrators`
--

INSERT INTO `administrators` (`id`, `correo`, `password`, `nombre`, `isDeleted`) VALUES
(1, 'juan.alucard.02@gmail.com', 0x53953361de04400c2b16baf27eacc8f0, 'Juan Pablo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolarvalue`
--

CREATE TABLE `dolarvalue` (
  `id` int(5) NOT NULL,
  `dolar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `dolarvalue`
--

INSERT INTO `dolarvalue` (`id`, `dolar`) VALUES
(1, 17.85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) NOT NULL,
  `codigo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `nombre_grupo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hotel` int(10) NOT NULL,
  `habitacion` int(10) NOT NULL,
  `single` float NOT NULL,
  `doble` float NOT NULL,
  `triple` float NOT NULL,
  `cuadra` float NOT NULL,
  `extra` float NOT NULL,
  `meal_adult` float NOT NULL,
  `meal_kid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `codigo`, `startDate`, `endDate`, `nombre_grupo`, `hotel`, `habitacion`, `single`, `doble`, `triple`, `cuadra`, `extra`, `meal_adult`, `meal_kid`) VALUES
(2, 'test-2017', '2017-11-16', '2017-11-30', 'TablaVela', 1, 1, 10, 10, 10, 10, 10, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE `hotels` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Hotel Adhara Hacienda Cancún', 'Av nader', '23232342'),
(2, 'Hotel Margaritas Cancún', 'Av nader', '23232342');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE `huespedes` (
  `id` int(100) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comments` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `isClub` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `huespedes`
--

INSERT INTO `huespedes` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `pais`, `ciudad`, `comments`, `isClub`) VALUES
(260, 'test', 'adhara', 'arqsilanes@arqsilanes.com', '9981099736', 'MX', 'cancun', 'le doy la bendicion', 0),
(261, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '523434343434', 'MX', 'Cancun', '', 0),
(262, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(263, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(264, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '523434343434', 'MX', 'Cancun', '', 0),
(265, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '523434343434', 'MX', 'Cancun', 'Prueba', 0),
(266, '', '', '', '', '', '', '', 0),
(267, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(268, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(269, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(270, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(271, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(272, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(273, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(274, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(275, 'santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '9981099736', 'MX', 'cancun', '', 0),
(276, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(277, 'Gabriel', 'Contanzo', 'Ga@live.com', '8114233456', 'MX', 'Monterrey', '', 0),
(278, 'sonia', 'canche', 'paloma_y@hotmail.com', '', 'MX', 'monterrey', '', 0),
(279, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(280, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(281, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(282, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', 'PRUEBA', 0),
(283, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(284, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(285, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', 'prueba pruab', 0),
(286, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', 'prueba', 0),
(287, 'isela', 'vazquez', 'isela@hotmail.com', '529999196188', 'MX', 'MERIDA', '', 0),
(288, 'santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '8816500', 'YT', 'cancun', '', 0),
(289, 'santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '8816500', 'MX', 'cancun', '', 0),
(290, 'Ludwi', 'Meza', 'azem81@hotmail.com', '9611792386', 'MX', 'tuxtla', '', 0),
(291, 'Juan', 'Perez', 'jperez@hotmail.com', '50274367', 'MX', 'Mexico', '', 0),
(292, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(293, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(294, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(295, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(296, 'Sandra', 'Mejia', 'smejia@wyndham.com', '5552620844', 'MX', 'mexico', '', 0),
(297, 'JOSE LUIS', 'GONZALEZ ROMERO', 'joseluis@jaspe.com.mx', '9982679225', 'MX', 'Cancún', '', 0),
(298, 'Ss', 'S', 'S@gh.com', '', 'MX', 'Prueba', 'Uiyiyiyih', 0),
(299, 'test', 'test', 'hernandez.gd@gmail.com', '9982426815', 'MX', 'cancun', 'test, prueba, no reservar', 0),
(300, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(301, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(302, 'santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '9988816503', 'MX', 'cancun', '', 0),
(303, 'test', 'test', 'hernandez.gd@gmail.com', '', 'MX', 'Playa del Carmen', 'test', 0),
(304, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(305, 'antonio s', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '9988816503', 'MX', 'cancun', '', 0),
(306, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(307, 'Test', 'Test', 'test@gmail.com', '7777777777', 'MX', 'cancun', 'prueba', 0),
(308, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(309, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(310, 'prueba', 'prueba', 'katinka2122@hotmail.com', '', 'MX', 'cancun', '', 0),
(311, 'Test', 'Test', 'test@gmail.com', '7777777777', 'MX', 'cancun', 'test', 0),
(312, 'santiago', 'lopez desilanes', 'arqsilanes@arqsilanes.com', '9981099736', 'MX', 'cancun', '', 0),
(313, 'blanca', 'ortega', 'blanqi_ov@live.com.mx', '9988603328', 'MX', 'cancun', '', 0),
(314, 'prueb', '', '', '', '', '', '', 0),
(315, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(316, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(317, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(318, 'JOSE LUIS', 'GONZALEZ ROMERO', 'joseluis@jaspe.com.mx', '9981537432', 'MX', 'CANCUN', '', 0),
(319, 'Prueba', 'Prueba', 'alguien@gmail.com', '789955xxx555', 'AF', 'cancun', '', 0),
(320, 'Ramon', 'Cervantes', 'arqsilanes@arqsilanes.com', '529988816500', 'MX', 'cancun', '', 0),
(321, 'Ramon', 'Cervantes', 'arqsilanes@arqsilanes.com', '529988816500', 'MX', 'cancun', '', 0),
(322, '', '', '', '', '', '', '', 0),
(323, 'susana', 'maldonado', '', '', 'MX', 'villahermosa', '', 0),
(324, 'PRUEBA', 'PRUEBA', 'TEST@TEST.COM', '77777777', 'BS', 'TEST', '', 0),
(325, 'Ramon', 'Cervantes', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(326, 'jorge', 'razo', 'jorge@razo.com', '52998887654', 'MX', 'cancun', '', 0),
(327, 'Prueba', 'Prueba', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0),
(328, 'Alma ', 'Aguado Irazaba', 'almadennis@gmail.com', '9982322612', 'MX', 'cancun', '', 0),
(329, 'Alma ', 'Aguado Irazaba', 'almadennis@gmail.com', '9982322612', 'MX', 'cancun', '', 0),
(330, 'elisa', 'costa', 'makalanicancun@hotmail.com', '2522906', 'MX', 'cancun', '', 0),
(331, 'Elisa', 'Acosta', 'almadennis@gmail.com', '9982322612', 'MX', 'cancun', '', 0),
(332, 'Elisa', 'Acosta', 'almadennis@gmail.com', '9982322612', 'MX', 'cancun', '', 0),
(333, 'Elisa', 'Acosta', 'almadennis@gmail.com', '9982322612', 'MX', 'cancun', '', 0),
(334, 'Maria Jose ', 'Avila', 'x_auri_x@hotmail.com', '9982322612', 'MX', 'cancun', '', 0),
(335, '', '', '', '', '', '', '', 0),
(336, 'MAORDY', 'JAIMES', 'MAORDY.ALEXANDRA@GMAIL.COM', '04265751429', 'VE', 'SAN CRISTOBAL', 'Reciban un cordial saludo, el siguiente es para solicitar informaciï¿½n de la reserva con entrada el 27/05/2014 y salida el 05/06/2014, para dos personas (mi esposo y yo), me gustaria saber si tienen el servicio de todo incluido o con desayuno... otra pregunta si es con pago a la llegada al hotel. si el servicio de busqueda al aeropuerto esta incluido.\r\n\r\nAgradezco su atenciï¿½n\r\n\r\nMAordy JAimes', 0),
(337, 'Oscar', 'Prueba', 'ramon@negociostravel.com', '523434343434', 'MX', 'Cancun', 'Probando datos', 0),
(338, 'David', 'hernandez', 'correo@electronico.com', '55244440', 'MX', 'mexico', 'es correco que si contrato 4 noches solo pago 2??', 0),
(339, '', '', '', '', '', '', '', 0),
(340, 'Jorge ', 'Marin', 'jorge@correos.com', '9981864670', 'MX', 'Cancun', 'Camas dobles. ', 0),
(341, 'MAURICIO ', 'MARTINEZ', 'carolina19781@hotmail.com', '11055656', 'MX', 'MEXICO', '', 0),
(342, 'Ulises', 'Sarabia', 'ulisessarabia@gmail.com', '5513334669', 'MX', 'México', '', 0),
(343, '', '', '', '', '', '', '', 0),
(344, 'antonio santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '9981099736', 'MX', 'cancun', 'prueba', 0),
(345, 'antonio santiago', 'lopez de silanes', 'arqsilanes@arqsilanes.com', '9981099736', 'MX', 'cancun', '', 0),
(346, 'barbara', 'rodriguez', 'brby@hotmail.com', '99816786557', 'MX', 'cancun', '', 0),
(347, 'Gabriela', 'Zúñiga', 'grodriguez@hrhaic.com', '525590003083', 'MX', 'Cancún', '', 0),
(348, '', '', '', '', '', '', '', 0),
(349, 'Al ', 'Dove ', 'adove@georgiaaquarium.org', '1-404-581-4364', 'US', 'Atlanta ', 'necessito un balcon', 0),
(350, 'Al', 'Dove ', 'adove@georgiaaquarium.org', '404-581-4364', 'US', 'Atlanta ', 'necessito un balcon y dos camas', 0),
(351, 'JAVIER', 'NAVARRETE SALGADO', 'arpamesa@hotmail.com', '9991936890', 'MX', 'MERIDA', '', 0),
(352, 'PRUEBA JOSE LUIS', 'GONZALEZ ROMERO', 'joseluis@oktravel.mx', '52.19981537432', 'MX', 'CANCUN', 'PRUEBA', 0),
(353, 'PRUEBA JOSE LUIS', 'GONZALEZ ROMERO', 'joseluis@oktravel.mx', '52.1998537432', 'MX', 'CANCUN', '', 0),
(354, 'Al', 'Dove', 'adove@georgiaaquarium.org ', '1-404-581-4364', 'US', 'Atlanta ', 'necessitos dos camas y balcon', 0),
(355, 'Edgar Francisco', ' Alonso', 'avillalbamk@live.com.mx', '5529689556 ', 'MX', '', '', 0),
(356, 'Edgar Francisco', 'Alonso', 'avillalbamk@live.com.mx', '', '', '', '', 0),
(357, 'Oscar', 'Madrazo', 'oscar.madrazo@gmail.com', '8899472', 'MX', 'Cancun', 'Prueba', 0),
(358, 'Oscar', 'Madrazo', 'oscar.madrazo@gmail.com', '8899472', 'AG', 'Cancun', 'Prueba', 0),
(359, 'PRUEBA', 'PRUEBA', 'ramon@negociostravel.com', '529981000959', 'MX', 'Cancun', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagodestino`
--

CREATE TABLE `pagodestino` (
  `id` int(10) NOT NULL,
  `referencia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sitio` int(5) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagodestino`
--

INSERT INTO `pagodestino` (`id`, `referencia`, `sitio`, `startDate`, `endDate`, `isDeleted`) VALUES
(1, 'Navidad Test', 1, '2017-09-15', '2017-09-20', 0),
(2, 'Navidad Test', 1, '2017-09-16', '2017-09-23', 0),
(3, 'Navidad Test', 2, '2017-09-17', '2017-09-30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL,
  `idClient` int(10) NOT NULL DEFAULT '0',
  `idTransaction` int(10) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `rooms` int(10) NOT NULL,
  `detalles` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `notas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hotel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `idClient`, `idTransaction`, `dateFrom`, `dateTo`, `rooms`, `detalles`, `responsable`, `notas`, `servicio`, `hotel`, `isDeleted`) VALUES
(181, 260, 240, '2014-04-11', '2014-04-14', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotelo', 'Adhara Cancun', 0),
(182, 261, 241, '2014-04-23', '2014-04-25', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(183, 262, 242, '2014-04-21', '2014-04-23', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(184, 263, 243, '2014-04-21', '2014-04-22', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(185, 264, 244, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(186, 265, 245, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos,0 Menores (0 0 0)<br><st', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(187, 266, 246, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(188, 267, 247, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(189, 268, 248, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(190, 269, 249, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(191, 270, 250, '2014-01-15', '2014-01-18', 1, '<strong>Hotel:</strong>Hotel San Francisco León<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel San Francisco León', 0),
(192, 271, 251, '2014-01-15', '2014-01-18', 1, '<strong>Hotel:</strong>Hotel San Francisco León<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel San Francisco León', 0),
(193, 272, 252, '2014-01-15', '2014-01-18', 1, '<strong>Hotel:</strong>Hotel San Francisco León<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel San Francisco León', 0),
(194, 273, 253, '2014-01-08', '2014-01-10', 1, '<strong>Hotel:</strong>Terracaribe<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><str', 'admin@admin.com', 'no comentarios', 'hotel', 'Terracaribe', 0),
(195, 274, 254, '2014-02-14', '2014-02-15', 1, '<strong>Hotel:</strong>Hotel Hacienda de Castilla<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Hacienda de Castilla', 0),
(196, 275, 255, '2014-03-06', '2014-03-08', 1, '<strong>Hotel:</strong>Hotel Margaritas Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Margaritas Cancún', 0),
(197, 276, 256, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(198, 277, 257, '2014-01-24', '2014-01-27', 1, '<strong>Hotel:</strong>Le Blanc Spa Resort<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)', 'admin@admin.com', 'no comentarios', 'hotel', 'Le Blanc Spa Resort', 0),
(199, 278, 258, '2013-12-26', '2013-12-31', 1, '<strong>Hotel:</strong>Ocean Spa Hotel<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br>', 'admin@admin.com', 'no comentarios', 'hotel', 'Ocean Spa Hotel', 0),
(200, 279, 259, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(201, 280, 260, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(202, 281, 261, '1969-12-31', '1969-12-31', 1, '<strong>Hotel:</strong><br /><br><strong>Tipo de habitaci&oacute;n: </strong>-<br><strong>Plan de al', 'admin@admin.com', 'no comentarios', '', '', 0),
(203, 282, 262, '2014-01-22', '2014-01-25', 1, '<strong>Hotel:</strong>Hard Rock Hotel Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0', 'admin@admin.com', 'no comentarios', 'hotel', 'Hard Rock Hotel Cancún', 0),
(204, 283, 263, '2014-01-15', '2014-01-16', 1, '<strong>Hotel:</strong>Soberanis Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br', 'admin@admin.com', 'no comentarios', 'hotel', 'Soberanis Cancún', 0),
(205, 284, 264, '2014-01-15', '2014-01-16', 1, '<strong>Hotel:</strong>Soberanis Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br', 'admin@admin.com', 'no comentarios', 'hotel', 'Soberanis Cancún', 0),
(206, 285, 265, '2014-04-10', '2014-04-11', 1, '<strong>Hotel:</strong>Hotel Templo Mayor<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Templo Mayor', 0),
(207, 286, 266, '2014-05-05', '2014-05-09', 1, '<strong>Hotel:</strong>Hotel Hacienda de Castilla<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Hacienda de Castilla', 0),
(208, 287, 267, '2014-03-21', '2014-03-23', 1, '<strong>Hotel:</strong>Las Gaviotas Hotel and Suites<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menor', 'admin@admin.com', 'no comentarios', 'hotel', 'Las Gaviotas Hotel and Suites', 0),
(209, 288, 268, '2014-01-23', '2014-01-25', 1, '<strong>Hotel:</strong>Hotel Margaritas Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Margaritas Cancún', 0),
(210, 289, 269, '2014-01-24', '2014-01-25', 1, '<strong>Hotel:</strong>Hotel Margaritas Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Margaritas Cancún', 0),
(211, 290, 270, '2014-05-13', '2014-05-17', 1, '<strong>Hotel:</strong>Best Western Maya Yucatán<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (', 'admin@admin.com', 'no comentarios', 'hotel', 'Best Western Maya Yucatán', 0),
(212, 291, 271, '2014-03-24', '2014-03-27', 1, '<strong>Hotel:</strong>Presidente InterContinental Villa Mercedes<br /><strong>Hab. 1:</strong> 2 Ad', 'admin@admin.com', 'no comentarios', 'hotel', 'Presidente InterContinental Villa Mercedes', 0),
(213, 292, 272, '2014-03-11', '2014-03-12', 1, '<strong>Hotel:</strong>Soberanis Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br', 'admin@admin.com', 'no comentarios', 'hotel', 'Soberanis Cancún', 0),
(214, 293, 273, '2014-03-11', '2014-03-12', 1, '<strong>Hotel:</strong>Soberanis Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br', 'admin@admin.com', 'no comentarios', 'hotel', 'Soberanis Cancún', 0),
(215, 294, 274, '2014-03-11', '2014-03-12', 1, '<strong>Hotel:</strong>Soberanis Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br', 'admin@admin.com', 'no comentarios', 'hotel', 'Soberanis Cancún', 0),
(216, 295, 275, '2014-03-10', '2014-03-11', 1, '<strong>Hotel:</strong>Hotel Valle de México<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Valle de México', 0),
(217, 296, 276, '2014-01-27', '2014-01-30', 1, '<strong>Hotel:</strong>Wyndham Garden Polanco<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0', 'admin@admin.com', 'no comentarios', 'hotel', 'Wyndham Garden Polanco', 0),
(218, 297, 277, '2014-02-11', '2014-02-14', 1, '<strong>Hotel:</strong>Hotel Hacienda de Castilla<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Hacienda de Castilla', 0),
(219, 298, 278, '2014-02-06', '2014-02-07', 1, '<strong>Hotel:</strong>Hotel del Sol<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel del Sol', 0),
(220, 299, 279, '2014-02-19', '2014-02-20', 1, '<strong>Hotel:</strong>Hotel Plaza Kokai<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<b', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Plaza Kokai', 0),
(221, 300, 280, '2014-02-19', '2014-02-20', 1, '<strong>Hotel:</strong>City Express Mérida<br /><strong>Hab. 1:</strong> 3 Adultos,0 Menores (0 0 0)', 'admin@admin.com', 'no comentarios', 'hotel', 'City Express Mérida', 0),
(222, 301, 281, '2014-02-19', '2014-02-20', 1, '<strong>Hotel:</strong>Best Western Maya Yucatán<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (', 'admin@admin.com', 'no comentarios', 'hotel', 'Best Western Maya Yucatán', 0),
(223, 302, 282, '2014-02-20', '2014-02-21', 1, '<strong>Hotel:</strong>Presidente InterContinental Villa Mercedes<br /><strong>Hab. 1:</strong> 1 Ad', 'admin@admin.com', 'no comentarios', 'hotel', 'Presidente InterContinental Villa Mercedes', 0),
(224, 303, 283, '2014-02-28', '2014-03-01', 1, '<strong>Hotel:</strong>Hotel del Sol<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel del Sol', 0),
(225, 304, 284, '2014-02-24', '2014-02-25', 1, '<strong>Hotel:</strong>Hotel del Sol<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel del Sol', 0),
(226, 305, 285, '2014-02-20', '2014-02-21', 1, '<strong>Hotel:</strong>Presidente InterContinental Villa Mercedes<br /><strong>Hab. 1:</strong> 2 Ad', 'admin@admin.com', 'no comentarios', 'hotel', 'Presidente InterContinental Villa Mercedes', 0),
(227, 306, 286, '2014-02-25', '2014-02-26', 1, '<strong>Hotel:</strong>Hotel del Sol<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel del Sol', 0),
(228, 307, 287, '2014-04-23', '2014-04-27', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(229, 308, 288, '2014-04-21', '2014-04-23', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(230, 309, 289, '2014-04-14', '2014-04-16', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(231, 310, 290, '2014-04-15', '2014-04-16', 1, '<strong>Hotel:</strong>Bsea Cancún Plaza<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<b', 'admin@admin.com', 'no comentarios', 'hotel', 'Bsea Cancún Plaza', 0),
(232, 311, 291, '2014-04-15', '2014-04-16', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(233, 312, 292, '2014-05-08', '2014-05-10', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(234, 313, 293, '2014-04-16', '2014-04-17', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(235, 314, 294, '2014-05-13', '2014-05-15', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(236, 315, 295, '2014-05-14', '2014-05-16', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(237, 316, 296, '2014-04-23', '2014-04-26', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(238, 317, 297, '2014-04-29', '2014-04-30', 1, '<strong>Hotel:</strong>Zar Culiacán<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><st', 'admin@admin.com', 'no comentarios', 'hotel', 'Zar Culiacán', 0),
(239, 318, 298, '2014-05-16', '2014-05-20', 1, '<strong>Hotel:</strong>Hotel Margaritas Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Margaritas Cancún', 0),
(240, 319, 299, '2014-04-29', '2014-04-30', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<strong>Hab', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(241, 320, 300, '2014-05-20', '2014-05-22', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(242, 321, 301, '2014-05-05', '2014-05-06', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(243, 322, 302, '2014-05-08', '2014-05-09', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(244, 323, 303, '2014-07-04', '2014-07-08', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<strong>Hab', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(245, 324, 304, '2014-05-09', '2014-05-10', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(246, 325, 305, '2014-05-20', '2014-05-22', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(247, 326, 306, '2014-05-23', '2014-05-30', 1, '<strong>Hotel:</strong>Hotel Plaza Kokai Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,1 Menores (1', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Plaza Kokai Cancún', 0),
(248, 327, 307, '2014-05-21', '2014-05-30', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(249, 328, 308, '2014-05-02', '2014-05-04', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(250, 329, 309, '2014-05-02', '2014-05-04', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(251, 330, 310, '2014-05-02', '2014-05-04', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(252, 331, 311, '2014-05-02', '2014-05-03', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(253, 332, 312, '2014-05-02', '2014-05-03', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(254, 333, 313, '2014-05-02', '2014-05-03', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos, Menores (  )<br><strong', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(255, 334, 314, '2014-05-04', '2014-05-05', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos, 0 Menores<br><strong>T', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(256, 335, 315, '2014-05-13', '2014-05-20', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos,0 Menores (0 0 0)<br><st', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(257, 336, 316, '2014-05-27', '2014-06-05', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong>  Adultos,0 Menores (0 0 0)<br><st', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(258, 337, 317, '2014-05-20', '2014-05-21', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,1 Menores (2 0 0)<stron', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(259, 338, 318, '2014-05-22', '2014-05-24', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(260, 339, 319, '2014-06-05', '2014-06-13', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 3 Adultos,1 Menores (3 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(261, 340, 320, '2014-07-11', '2014-07-16', 1, '<strong>Hotel:</strong>Bel Air Collection Resort and Spa Cancún<br /><strong>Hab. 1:</strong> 2 Adul', 'admin@admin.com', 'no comentarios', 'hotel', 'Bel Air Collection Resort and Spa Cancún', 0),
(262, 341, 321, '2014-05-18', '2014-05-20', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 1 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(263, 342, 322, '2014-05-17', '2014-05-24', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(264, 343, 323, '2014-06-13', '2014-06-19', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,2 Menores (8 16 0)<br><', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(265, 344, 324, '2014-05-16', '2014-05-18', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(266, 345, 325, '2014-05-17', '2014-05-18', 1, '<strong>Hotel:</strong>Hotel Margaritas Cancún<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 ', 'admin@admin.com', 'no comentarios', 'hotel', 'Hotel Margaritas Cancún', 0),
(267, 346, 326, '2014-05-29', '2014-05-30', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,1 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(268, 347, 327, '2014-05-19', '2014-05-24', 1, '<strong>Hotel:</strong>NH Puebla<br /><strong>Hab. 1:</strong> 1 Adultos,0 Menores (0 0 0)<br><stron', 'admin@admin.com', 'no comentarios', 'hotel', 'NH Puebla', 0),
(269, 348, 328, '2014-05-19', '2014-05-20', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,1 Menores (7 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(270, 349, 329, '2014-06-23', '2014-07-02', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(271, 350, 330, '2014-06-23', '2014-07-02', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(272, 351, 331, '2014-05-23', '2014-05-27', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,1 Menores (12 0 0)<br><', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(273, 352, 332, '2014-06-02', '2014-06-10', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 1 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(274, 353, 333, '2014-06-06', '2014-06-08', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 1 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'CANCELADA PRUEBA', 'hotel', 'Adhara Cancun', 0),
(275, 354, 334, '2014-06-23', '2014-07-02', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(276, 355, 335, '2014-05-29', '2014-05-30', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,2 Menores (5 1 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(277, 356, 336, '2014-05-29', '2014-05-30', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,2 Menores (1 5 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(278, 357, 337, '2014-06-16', '2014-06-17', 1, '<strong>Hotel:</strong>Adhara Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<br><s', 'admin@admin.com', 'no comentarios', 'hotel', 'Adhara Cancun', 0),
(279, 358, 338, '2014-06-07', '2014-06-09', 1, '<strong>Hotel:</strong>Margaritas Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<b', 'admin@admin.com', 'no comentarios', 'hotel', 'Margaritas Cancun', 0),
(280, 359, 339, '2014-06-17', '2014-06-18', 1, '<strong>Hotel:</strong>Margaritas Cancun<br /><strong>Hab. 1:</strong> 2 Adultos,0 Menores (0 0 0)<s', 'admin@admin.com', 'no comentarios', 'hotel', 'Margaritas Cancun', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `idHotel` int(5) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ninguno',
  `nombre_en` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `capMax` int(2) NOT NULL,
  `type` enum('1','2','3','4','5','6','7','8','9') COLLATE utf8_spanish_ci NOT NULL,
  `category` enum('1','2','3') COLLATE utf8_spanish_ci NOT NULL,
  `priority` int(5) NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `kidsAllow` tinyint(1) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `idHotel`, `nombre`, `nombre_en`, `capMax`, `type`, `category`, `priority`, `description`, `quantity`, `kidsAllow`, `isDeleted`) VALUES
(1, 1, 'Solo Habitación', 'Room Only', 4, '1', '1', 1, 'Habitación EP (Adhara)', 10, 1, 0),
(2, 1, 'Desayuno Buffet', 'Breakfast Buffet', 4, '2', '1', 2, 'Habitación BB (Adhara)', 10, 1, 0),
(3, 1, 'Estandar no Reembolsable', 'Standard No Reembolsable', 4, '3', '1', 3, 'Habitación NR (Adhara)', 10, 1, 0),
(4, 1, 'Solo Habitación', 'Room Only', 2, '4', '2', 1, 'Habitación Superior (Adhara)', 10, 0, 0),
(5, 1, 'Solo Habitación', 'Room Only', 2, '7', '3', 1, 'Habitación Ejecutivo (Adhara)', 10, 0, 0),
(6, 2, 'Solo Habitación', 'Room Only', 4, '1', '1', 1, 'Habitación EP (Margaritas)', 10, 1, 0),
(7, 1, 'Desayuno Buffet', 'Breakfast Buffet', 2, '5', '2', 2, 'Habitación Superior BB (Adhara)', 10, 0, 0),
(8, 1, 'Superior no Reembolsable', 'Standard No Reembolsable', 2, '6', '2', 3, 'Habitación Superior NR (Adhara)', 10, 0, 0),
(9, 1, 'Desayuno Buffet', 'Breakfast Buffet', 2, '8', '3', 2, 'Habitación Ejecutivo BB (Adhara)', 10, 0, 0),
(10, 1, 'Ejecutivo no Reembolsable', 'Standard No Reembolsable', 2, '9', '3', 3, 'Habitación Ejecutivo NR (Adhara)', 10, 0, 0),
(11, 2, 'Estandar No Reembolsable', 'Standar No Reembolsable', 4, '3', '1', 3, 'Habitación NR (Margaritas)', 10, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasons`
--

CREATE TABLE `seasons` (
  `id` int(10) NOT NULL,
  `idRoom` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `single` float NOT NULL,
  `doble` float NOT NULL,
  `triple` float NOT NULL,
  `cuadra` float NOT NULL,
  `extra` float NOT NULL,
  `mealAdults` float NOT NULL DEFAULT '0',
  `mealKids` float NOT NULL DEFAULT '0',
  `kidsRate` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `minStay` int(10) NOT NULL,
  `idHotel` int(10) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seasons`
--

INSERT INTO `seasons` (`id`, `idRoom`, `startDate`, `endDate`, `single`, `doble`, `triple`, `cuadra`, `extra`, `mealAdults`, `mealKids`, `kidsRate`, `minStay`, `idHotel`, `isDeleted`) VALUES
(44, 1, '2017-10-01', '2017-10-10', 50, 50, 60, 70, 10, 0, 0, '0', 1, 1, 0),
(45, 2, '2017-10-01', '2017-10-10', 70, 80, 100, 120, 10, 10, 7, '7', 1, 1, 0),
(46, 3, '2017-10-01', '2017-10-10', 40, 40, 48, 56, 10, 0, 0, '0', 1, 1, 0),
(47, 4, '2017-10-01', '2017-10-10', 55, 55, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(48, 5, '2017-10-01', '2017-10-10', 60, 60, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(50, 1, '2017-10-11', '2017-10-20', 70, 70, 80, 90, 10, 0, 0, '0', 1, 1, 0),
(51, 2, '2017-10-11', '2017-10-20', 70, 80, 110, 130, 10, 10, 7, '7', 1, 1, 0),
(52, 3, '2017-10-11', '2017-10-20', 48, 48, 56, 64, 10, 0, 0, '0', 1, 1, 0),
(53, 4, '2017-10-11', '2017-10-20', 65, 65, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(54, 5, '2017-10-11', '2017-10-20', 70, 70, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(56, 6, '2017-10-12', '2017-10-31', 45, 45, 55, 65, 10, 0, 0, '0', 1, 2, 0),
(57, 11, '2017-10-12', '2017-10-31', 36, 36, 44, 52, 10, 0, 0, '0', 1, 2, 0),
(58, 1, '2017-10-23', '2017-10-31', 45, 45, 55, 65, 10, 0, 0, '0', 1, 1, 0),
(59, 2, '2017-10-23', '2017-10-31', 55, 65, 95, 115, 10, 10, 7, '7', 1, 1, 0),
(60, 3, '2017-10-23', '2017-10-31', 36, 36, 44, 52, 10, 0, 0, '0', 1, 1, 0),
(61, 4, '2017-10-23', '2017-10-31', 50, 50, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(62, 5, '2017-10-23', '2017-10-31', 55, 55, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(63, 1, '2017-11-01', '2017-11-30', 25, 25, 35, 45, 10, 0, 0, '0', 1, 1, 0),
(64, 2, '2017-11-01', '2017-11-30', 35, 45, 75, 95, 10, 10, 7, '7', 1, 1, 0),
(65, 3, '2017-11-01', '2017-11-30', 20, 20, 28, 36, 10, 0, 0, '0', 1, 1, 0),
(66, 4, '2017-11-01', '2017-11-30', 30, 30, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(67, 5, '2017-11-01', '2017-11-30', 35, 35, 0, 0, 10, 0, 0, '0', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasonspromo`
--

CREATE TABLE `seasonspromo` (
  `id` int(10) NOT NULL,
  `idRoom` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `single` float NOT NULL,
  `doble` float NOT NULL,
  `triple` float NOT NULL,
  `cuadra` float NOT NULL,
  `extra` float NOT NULL,
  `mealAdults` float NOT NULL DEFAULT '0',
  `mealKids` float NOT NULL DEFAULT '0',
  `kidsRate` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `minStay` int(10) NOT NULL,
  `idHotel` int(10) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seasonspromo`
--

INSERT INTO `seasonspromo` (`id`, `idRoom`, `startDate`, `endDate`, `single`, `doble`, `triple`, `cuadra`, `extra`, `mealAdults`, `mealKids`, `kidsRate`, `minStay`, `idHotel`, `isDeleted`) VALUES
(44, 3, '2017-11-16', '2017-11-17', 10, 10, 10, 10, 10, 0, 0, '0', 1, 1, 0),
(55, 3, '2017-11-25', '2017-11-26', 10, 10, 10, 10, 10, 0, 0, '', 0, 1, 0),
(56, 1, '2017-11-23', '2017-11-24', 10, 10, 10, 10, 10, 0, 0, '', 0, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stopsale`
--

CREATE TABLE `stopsale` (
  `id` int(10) NOT NULL,
  `idRoom` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stopsale`
--

INSERT INTO `stopsale` (`id`, `idRoom`, `startDate`, `endDate`, `isDeleted`) VALUES
(1, 1, '2017-09-08', '2017-09-23', 0),
(2, 2, '2017-09-10', '2017-09-24', 0),
(3, 3, '2017-09-23', '2017-09-26', 0),
(4, 5, '2017-09-28', '2017-09-30', 0),
(5, 4, '2017-09-28', '2017-09-30', 0),
(6, 4, '2017-09-28', '2017-09-30', 0),
(7, 1, '2017-10-06', '2017-10-08', 0),
(8, 6, '2017-09-16', '2017-09-24', 0),
(9, 1, '2017-11-16', '2017-11-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `price` double NOT NULL,
  `costoProv` double NOT NULL,
  `currency` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `formaPago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cardType` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(5) NOT NULL,
  `dateTransaction` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`id`, `price`, `costoProv`, `currency`, `formaPago`, `cardType`, `estatus`, `dateTransaction`) VALUES
(240, 3663.68, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(241, 2442.45, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(242, 2417.81, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(243, 1221.23, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(244, 4835.61, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(245, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(246, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(247, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(248, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(249, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(250, 2398.3498, 1875.834, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(251, 2398.3498, 1875.834, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(252, 2398.3498, 1875.834, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(253, 842.559, 674.3968, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(254, 404.018, 363.6111, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(255, 1557.012, 1219.53, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(256, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(257, 33180.2520348, 21986.67, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(258, 74772.8024355, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(259, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(260, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(261, 0, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(262, 20976.9804, 19050, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(263, 446.616, 343.9999, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(264, 446.616, 343.9999, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(265, 471.13, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(266, 1679.11, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(267, 2565.31, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(268, 1475.838, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(269, 737.92, 609.76, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(270, 2335.18, 1947, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(271, 6102.29, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(272, 419.77, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(273, 419.77, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(274, 419.77, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(275, 647.68, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(276, 8349.41, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(277, 1439.244, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(278, 513.732, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(279, 565.26, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(280, 1062.6224, 885.9223, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(281, 583.79, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(282, 1802.952, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(283, 513.732, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(284, 513.73, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(285, 1664.2584, 1386.879, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(286, 513.73, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(287, 5403.82, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(288, 2442.45, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(289, 2442.45, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(290, 1462.22, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(291, 0, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(292, 1035.3, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(293, 1221.23, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(294, 1021, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(295, 1021, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(296, 3188, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(297, 522.396, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(298, 2698.6106, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(299, 1024.95, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(300, 2010, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(301, 1624, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(302, 1454, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(303, 10519.44, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(304, 1024.947, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(305, 2320, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(306, 7288.94, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(307, 9045, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(308, 2049.89, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(309, 2049.89, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(310, 2166, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(311, 1024.95, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(312, 1024.95, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(313, 1024.95, 965.5029, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(314, 1024.95, 965.5029, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(315, 7035, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(316, 9045, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(317, 2475.17, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(318, 2010, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(319, 5260.16, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(320, 7778.7, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(321, 1005, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(322, 4020, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(323, 3945.12, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(324, 1005, 0, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(325, 648.58689, 540.735, 'MXP', 'credit card', 'Visa', 3, '2017-11-29 18:06:08'),
(326, 1005, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(327, 5423.1489, 0, 'MXP', 'credit card', 'Visa', 4, '2017-11-29 18:06:08'),
(328, 1206.66, 0, 'MXP', 'credit card', 'Visa', 2, '2017-11-29 18:06:08'),
(329, 6311.76, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(330, 6311.76, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(331, 2413.32, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(332, 4207.84, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(333, 1051.96, 0, 'MXP', 'credit card', 'Visa', 5, '2017-11-29 18:06:08'),
(334, 6403.84, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(335, 1361.36, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(336, 1361.36, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(337, 727, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(338, 1454, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08'),
(339, 1794.52, 0, 'MXP', 'credit card', 'Visa', 1, '2017-11-29 18:06:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dolarvalue`
--
ALTER TABLE `dolarvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `huespedes`
--
ALTER TABLE `huespedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagodestino`
--
ALTER TABLE `pagodestino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitio` (`sitio`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTransaccion` (`idTransaction`),
  ADD KEY `idCliente` (`idClient`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHotel` (`idHotel`);

--
-- Indices de la tabla `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCuarto` (`idRoom`);

--
-- Indices de la tabla `seasonspromo`
--
ALTER TABLE `seasonspromo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCuarto` (`idRoom`);

--
-- Indices de la tabla `stopsale`
--
ALTER TABLE `stopsale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCuarto` (`idRoom`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `huespedes`
--
ALTER TABLE `huespedes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT de la tabla `pagodestino`
--
ALTER TABLE `pagodestino`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `seasonspromo`
--
ALTER TABLE `seasonspromo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `stopsale`
--
ALTER TABLE `stopsale`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagodestino`
--
ALTER TABLE `pagodestino`
  ADD CONSTRAINT `pagodestino_ibfk_1` FOREIGN KEY (`sitio`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`idTransaction`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`idClient`) REFERENCES `huespedes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seasonspromo`
--
ALTER TABLE `seasonspromo`
  ADD CONSTRAINT `seasonspromo_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stopsale`
--
ALTER TABLE `stopsale`
  ADD CONSTRAINT `stopsale_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
