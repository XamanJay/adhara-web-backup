-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2017 a las 18:54:00
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
CREATE DATABASE IF NOT EXISTS `adharaca_gphoteles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adharaca_gphoteles`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) NOT NULL,
  `correo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `password` blob NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `idClient` int(10) NOT NULL,
  `idTransaction` int(10) NOT NULL,
  `idRoom` int(10) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `Rooms` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `isClub` int(1) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `idHotel` int(5) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ninguno',
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

INSERT INTO `rooms` (`id`, `idHotel`, `nombre`, `capMax`, `type`, `category`, `priority`, `description`, `quantity`, `kidsAllow`, `isDeleted`) VALUES
(1, 1, 'Solo Habitación', 4, '1', '1', 1, 'Habitación EP (Adhara)', 10, 1, 0),
(2, 1, 'Desayuno Buffet', 4, '2', '1', 2, 'Habitación BB (Adhara)', 10, 1, 0),
(3, 1, 'Estandar no Reembolsable', 4, '3', '1', 3, 'Habitación NR (Adhara)', 10, 1, 0),
(4, 1, 'Solo Habitación', 2, '4', '2', 1, 'Habitación Superior (Adhara)', 10, 0, 0),
(5, 1, 'Solo Habitación', 2, '7', '3', 1, 'Habitación Ejecutivo (Adhara)', 10, 0, 0),
(6, 2, 'Solo Habitación', 4, '1', '1', 1, 'Habitación EP (Margaritas)', 10, 1, 0),
(7, 1, 'Desayuno Buffet', 2, '5', '2', 2, 'Habitación Superior BB (Adhara)', 10, 0, 0),
(8, 1, 'Superior no Reembolsable', 2, '6', '2', 3, 'Habitación Superior NR (Adhara)', 10, 0, 0),
(9, 1, 'Desayuno Buffet', 2, '8', '3', 2, 'Habitación Ejecutivo BB (Adhara)', 10, 0, 0),
(10, 1, 'Ejecutivo no Reembolsable', 2, '9', '3', 3, 'Habitación Ejecutivo NR (Adhara)', 10, 0, 0);

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
(49, 6, '2017-10-01', '2017-10-10', 50, 50, 60, 70, 10, 0, 0, '0', 1, 2, 0),
(50, 1, '2017-10-11', '2017-10-20', 70, 70, 80, 90, 10, 0, 0, '0', 1, 1, 0),
(51, 2, '2017-10-11', '2017-10-20', 70, 80, 110, 130, 10, 10, 7, '7', 1, 1, 0),
(52, 3, '2017-10-11', '2017-10-20', 48, 48, 56, 64, 10, 0, 0, '0', 1, 1, 0),
(53, 4, '2017-10-11', '2017-10-20', 65, 65, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(54, 5, '2017-10-11', '2017-10-20', 70, 70, 0, 0, 10, 0, 0, '0', 1, 1, 0),
(55, 6, '2017-10-11', '2017-10-20', 25, 25, 35, 45, 10, 0, 0, '0', 1, 2, 0);

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
(8, 6, '2017-09-16', '2017-09-24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `price` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `formaPago` int(5) NOT NULL,
  `cardType` int(5) NOT NULL,
  `estatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
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
  ADD KEY `idCliente` (`idClient`),
  ADD KEY `idHotel` (`idRoom`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagodestino`
--
ALTER TABLE `pagodestino`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `stopsale`
--
ALTER TABLE `stopsale`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `stopsale`
--
ALTER TABLE `stopsale`
  ADD CONSTRAINT `stopsale_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
