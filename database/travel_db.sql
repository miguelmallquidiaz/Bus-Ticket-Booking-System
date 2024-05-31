-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2024 a las 03:28:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `travel_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_plate` varchar(6) NOT NULL,
  `bus_capacity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_plate`, `bus_capacity`) VALUES
(1, 'WH2145', 20),
(2, 'MN1975', 20),
(3, 'PQ5478', 20),
(4, 'RP7812', 20),
(5, 'TP3547', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `dri_id` int(11) NOT NULL,
  `dri_name` varchar(20) NOT NULL,
  `dri_flastname` varchar(20) NOT NULL,
  `dri_mlastname` varchar(20) NOT NULL,
  `dri_hire_date` date NOT NULL,
  `dri_phone` char(9) NOT NULL,
  `dri_category` char(1) NOT NULL,
  `dri_salary` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`dri_id`, `dri_name`, `dri_flastname`, `dri_mlastname`, `dri_hire_date`, `dri_phone`, `dri_category`, `dri_salary`) VALUES
(1, 'patricio', 'herrera', 'gonzalez', '1990-10-08', '945678567', 'f', 350.00),
(2, 'jorge', 'quispe', 'ramirez', '2001-04-07', '999678227', 'c', 200.00),
(3, 'edward', 'temple', 'lopez', '2005-04-11', '988123456', 'f', 450.00),
(4, 'elmer', 'morales', 'martinez', '1998-04-10', '977654321', 'f', 550.00),
(5, 'marcos', 'cueva', 'fernandez', '1995-04-12', '966789123', 'f', 650.00),
(6, 'luis', 'prieto', 'torres', '1998-04-12', '955432198', 'f', 350.00),
(7, 'eloy', 'lazo', 'jimenez', '2004-04-12', '944321987', 'f', 350.00),
(8, 'jaime', 'benavidez', 'sanchez', '2005-04-12', '933210876', 'f', 350.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `pa_id` int(11) NOT NULL,
  `pa_name` varchar(30) NOT NULL,
  `pa_flastname` varchar(30) NOT NULL,
  `pa_mlastname` varchar(30) NOT NULL,
  `pa_dni` char(8) NOT NULL,
  `pa_phone` char(9) NOT NULL,
  `pa_email` varchar(30) NOT NULL,
  `pa_seat` char(2) NOT NULL,
  `pa_type` char(1) NOT NULL,
  `pa_cost` decimal(5,2) NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `passengers`
--

INSERT INTO `passengers` (`pa_id`, `pa_name`, `pa_flastname`, `pa_mlastname`, `pa_dni`, `pa_phone`, `pa_email`, `pa_seat`, `pa_type`, `pa_cost`, `trip_id`) VALUES
(1, 'juan', 'garcía', 'lópez', '76522142', '976456345', 'juan@gmail.com', '1', 'e', 25.00, 3),
(2, 'maría', 'martínez', 'gómez', '78765432', '956789012', 'maria@gmail.com', '2', 'e', 25.00, 4),
(3, 'pedro', 'rodríguez', 'sánchez', '77654321', '945678901', 'pedro@gmail.com', '3', 'a', 50.00, 5),
(4, 'angel', 'mallqui', 'diaz', '77890654', '997654678', 'angel123@gmail.com', '11', 'e', 25.00, 3),
(8, 'melani', 'sanchez', 'casandra', '72162625', '962626272', 'melani@gmail.com', '10', 'e', 25.00, 3),
(18, 'juaquin', 'mallqui', 'diaz', '72525252', '928282822', 'juaquin@gmail.com', '16', 'e', 25.00, 3),
(19, 'carlos', 'sanchez', 'mendoza', '72162665', '928383822', 'carlos@gmail.com', '18', 'n', 15.00, 3),
(21, 'frank', 'maldonado', 'gutierrez', '72617399', '973737182', 'frank@gmail.com', '8', 'a', 50.00, 3),
(23, 'david', 'flores', 'sánchez', '68765432', '922345678', 'david.f@gmail.com', '15', 'e', 25.00, 3),
(24, 'diego', 'muñoz', 'alvarez', '62109876', '923454326', 'diego.m@gmail.com', '14', 'e', 25.00, 3),
(25, 'elena', 'sanchez', 'perez', '61098765', '923454327', 'elena.s@gmail.com', '4', 'e', 25.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `ro_id` int(11) NOT NULL,
  `ro_name` varchar(12) NOT NULL,
  `ro_cost` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `routes`
--

INSERT INTO `routes` (`ro_id`, `ro_name`, `ro_cost`) VALUES
(1, 'arequipa', 35.00),
(2, 'ayacucho', 170.00),
(3, 'chiclayo', 80.00),
(4, 'cusco', 50.00),
(5, 'huancavelica', 200.00),
(6, 'huanuco', 120.00),
(7, 'huaraz', 70.00),
(8, 'ica', 50.00),
(9, 'tacna', 300.00),
(10, 'trujillo', 15.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `trip_time` time NOT NULL,
  `trip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trips`
--

INSERT INTO `trips` (`trip_id`, `bus_id`, `route_id`, `driver_id`, `trip_time`, `trip_date`) VALUES
(1, 1, 1, 1, '10:30:00', '2023-02-10'),
(2, 2, 9, 2, '09:30:00', '2023-02-07'),
(3, 3, 4, 3, '20:30:00', '2024-06-13'),
(4, 2, 4, 2, '08:00:00', '2024-06-13'),
(5, 1, 8, 7, '13:30:00', '2024-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_email` varchar(40) NOT NULL,
  `usr_password` varchar(40) NOT NULL,
  `usr_name` varchar(30) NOT NULL,
  `usr_flastname` varchar(30) NOT NULL,
  `usr_mlastname` varchar(30) NOT NULL,
  `usr_phone` char(9) NOT NULL,
  `usr_role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usr_id`, `usr_email`, `usr_password`, `usr_name`, `usr_flastname`, `usr_mlastname`, `usr_phone`, `usr_role`) VALUES
(1, 'miguel@gmail.com', '088ef99bff55c67dc863f83980a66a9b', 'miguel', 'mallqui', 'diaz', '945678567', 'e'),
(2, 'diego@gmail.com', '91f5167c34c400758115c2a6826ec2e3', 'diego', 'lopez', 'sanchez', '999678227', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`),
  ADD UNIQUE KEY `bus_plate` (`bus_plate`);

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`dri_id`),
  ADD UNIQUE KEY `dri_phone` (`dri_phone`);

--
-- Indices de la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`pa_id`),
  ADD UNIQUE KEY `pa_email` (`pa_email`),
  ADD UNIQUE KEY `pa_dni_unique` (`pa_dni`),
  ADD UNIQUE KEY `pa_phone_unique` (`pa_phone`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indices de la tabla `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`ro_id`),
  ADD UNIQUE KEY `ro_name` (`ro_name`);

--
-- Indices de la tabla `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_email` (`usr_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `drivers`
--
ALTER TABLE `drivers`
  MODIFY `dri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `passengers`
--
ALTER TABLE `passengers`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `routes`
--
ALTER TABLE `routes`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`);

--
-- Filtros para la tabla `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `routes` (`ro_id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`dri_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
