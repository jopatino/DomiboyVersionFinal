-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2018 a las 00:21:00
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `domiboy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
`Id_Carrito` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`Id_Carrito`, `Id_Usuario`, `Total`) VALUES
(1, 1, '20000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_carrito`
--

CREATE TABLE IF NOT EXISTS `detalle_carrito` (
`Id_DetalleCarrito` int(11) NOT NULL,
  `Id_Carrito` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE IF NOT EXISTS `negocio` (
`Id_Negocio` int(11) NOT NULL,
  `Nombre_Negocio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`Id_Negocio`, `Nombre_Negocio`, `Descripcion`) VALUES
(1, 'Pizza Nostra', 'Calle 25 # 19-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`Id_Producto` int(11) NOT NULL,
  `Id_Negocio` int(11) NOT NULL,
  `Nombre_Producto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Id_Negocio`, `Nombre_Producto`, `Precio`) VALUES
(3, 1, 'Pizza Persona', 8000),
(4, 1, 'Pizza Mediana', 20000),
(5, 1, 'Pizza Familiar', 35000),
(6, 1, 'Lasagna', 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`Id_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Domicilio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre_Usuario`, `Password`, `Nombres`, `Apellidos`, `Celular`, `Email`, `Domicilio`) VALUES
(1, 'jopatino', 'hacker825', 'Jose Oliverio', 'Patiño Castaño', '', '0', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
 ADD PRIMARY KEY (`Id_Carrito`), ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
 ADD PRIMARY KEY (`Id_DetalleCarrito`), ADD KEY `Id_Carrito` (`Id_Carrito`,`Id_Producto`), ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
 ADD PRIMARY KEY (`Id_Negocio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`Id_Producto`), ADD KEY `Id_Negocio` (`Id_Negocio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
MODIFY `Id_Carrito` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
MODIFY `Id_DetalleCarrito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
MODIFY `Id_Negocio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
ADD CONSTRAINT `detalle_carrito_ibfk_1` FOREIGN KEY (`Id_Carrito`) REFERENCES `carrito` (`Id_Carrito`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detalle_carrito_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_Negocio`) REFERENCES `negocio` (`Id_Negocio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
