-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2021 a las 15:38:32
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calculadorapro`
--
CREATE DATABASE IF NOT EXISTS `calculadorapro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calculadorapro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculos`
--

CREATE TABLE `calculos` (
  `IdCalculo` int(11) NOT NULL,
  `numero1` int(11) NOT NULL,
  `numero2` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `resultado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calculos`
--

INSERT INTO `calculos` (`IdCalculo`, `numero1`, `numero2`, `fecha`, `IdUsuario`, `resultado`) VALUES
(11, 87, 1, '2021-08-24', 7, 88),
(12, 34, 1, '2021-08-24', 5, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `username`, `pass`) VALUES
(5, 'cerman', '$2y$10$l5pEvhYakoUETSkL4VjPHeqh7xKVuiD0/tK9FKbpKy0/VBgOGkS6S'),
(6, 'tito jackson', '$2y$10$tjS9WUbgcmoSe3/tzZgoye.62RC42PpVvTQ808azr3yYmlIw08M4y'),
(7, 'www', '$2y$10$FPJ3NoBnSdTRsj3D3e5GieD8SymiRMN3jqfjURW01R.jlcRfXzM0G');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calculos`
--
ALTER TABLE `calculos`
  ADD PRIMARY KEY (`IdCalculo`),
  ADD KEY `calculoUsuario` (`IdUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calculos`
--
ALTER TABLE `calculos`
  MODIFY `IdCalculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calculos`
--
ALTER TABLE `calculos`
  ADD CONSTRAINT `calculoUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
