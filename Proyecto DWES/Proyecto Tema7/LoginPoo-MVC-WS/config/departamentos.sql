-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2018 a las 22:55:30
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw204_loginmvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `Departamentos` (
  `codDepartamento` varchar(3) NOT NULL,
  `descDepartamento` varchar(255) NOT NULL,
  `altaDepartamento` date NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Creador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `Departamentos` (`codDepartamento`, `descDepartamento`, `altaDepartamento`, `Capacidad`, `Creador`) VALUES
('AAA', 'Primer Departamento', '2018-01-27', 100, 'admin'),
('AAB', 'Segundo Departamento', '2018-01-27', 45, 'rodrigo'),
('AAC', 'Tercer Departamento', '2018-01-27', 78, 'rodrigo'),
('AAD', 'Cuarto Departamento', '2018-01-27', 32, 'admin'),
('AAE', 'Quinto Departamento', '2018-01-27', 26, 'luismi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `Departamentos`
  ADD PRIMARY KEY (`codDepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
