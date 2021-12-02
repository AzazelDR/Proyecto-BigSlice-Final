-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-12-2021 a las 00:53:58
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17888289_bigslice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id` int(11) NOT NULL,
  `categoria` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id`, `categoria`) VALUES
(1, 'Papas'),
(2, 'Alitas'),
(3, 'Entradas'),
(4, 'Bebidas'),
(5, 'Alcohol'),
(6, 'Pizzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id`, `Estado`) VALUES
(1, 'Activo'),
(2, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `Id` int(11) NOT NULL,
  `Tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`Id`, `Tipo`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Pedido` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` decimal(11,2) NOT NULL,
  `Envio` tinyint(1) NOT NULL,
  `fecha_pedido` varchar(40) NOT NULL,
  `idPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Id`, `idUser`, `Pedido`, `Cantidad`, `Total`, `Envio`, `fecha_pedido`, `idPago`) VALUES
(1, 1, 'Papas', 3, 6.00, 1, '15/11/2021', 2),
(2, 10, 'Pizza Calzone', 2, 3.50, 0, '16/11/2021', 2),
(22, 7, 'Six Wings', 5, 1.00, 0, '20/11/21', 2),
(29, 11, 'Cheddar con Bacon', 5, 22.50, 0, '20/11/21', 2),
(44, 10, 'Six Wings', 2, 11.98, 1, '20/11/21', 1),
(45, 1, 'Te de Jamaica - Sencillo', 2, 4.00, 1, '23/11/21', 1),
(46, 1, 'Te de Jamaica - Doble', 5, 17.50, 1, '23/11/21', 1),
(47, 1, 'Cheddar con Bacon', 5, 22.50, 1, '23/11/21', 1),
(48, 1, 'Papas Voladoras', 5, 44.95, 0, '23/11/21', 1),
(49, 7, 'Te de Jamaica - Sencillo', 5, 10.00, 0, '23/11/21', 2),
(50, 7, 'Papas Voladoras', 5, 44.95, 0, '23/11/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Precio` decimal(11,2) NOT NULL,
  `IdCatg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id`, `Nombre`, `Precio`, `IdCatg`) VALUES
(1, 'Six Wings', 5.99, 2),
(2, 'Papas Voladoras', 8.99, 2),
(24, 'Papas Tradicionales', 2.75, 1),
(25, 'Papas Tradicionales', 2.75, 1),
(26, 'Cheddar con Bacon', 4.50, 2),
(27, 'Papas Pizza', 5.75, 1),
(28, 'Papas Hot Cheddar Bacon', 5.99, 1),
(29, 'Nuditos', 3.95, 3),
(30, 'Nuditos Supremos', 5.25, 3),
(31, 'Pan con Ajo', 3.95, 3),
(32, 'Mozzarella Stickis', 3.95, 3),
(33, 'Te de Jamaica - Sencillo', 2.00, 4),
(34, 'Te de Jamaica - Doble', 3.50, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Rol`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `dui` varchar(100) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `telf` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` longtext NOT NULL,
  `fecha_regist` varchar(50) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `dui`, `nit`, `telf`, `mail`, `pass`, `edad`, `direccion`, `fecha_regist`, `rol`, `estado`) VALUES
(1, 'User', 'Main', '003', '003', 70000000, 'user@mail', '1234', 18, 'La Libertad', '16/11/2021', 1, 1),
(7, 'Admin', 'Admin', '001', '001', 75073131, 'admin@mail', '1234', 20, 'La Paz', '16/11/21', 2, 1),
(10, 'Axel ', 'Reyes', '002', '002', 75073131, 'AzazelDR@outlook.com', '1234', 18, 'Avenida Juan Bertis, Residencial Villas de Paleca', '16/11/21', 1, 1),
(11, 'Brayan', 'Urrutia', '004', '004', 7000, 'brackjr@gmail.com', '1234', 20, 'Cabañas', '20/11/21', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPago` (`idPago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdCatg` (`IdCatg`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `IdState` (`estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idPago`) REFERENCES `pago` (`Id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdCatg`) REFERENCES `categoria` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `roles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
