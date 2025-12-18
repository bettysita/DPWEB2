-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2025 a las 15:52:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `venta_2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `detalle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `detalle`) VALUES
(1, 'mermelada 7777777777', 'mermeladaaaaaaaa'),
(2, '12', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `metodo_pago` varchar(20) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nro_identidad` varchar(11) NOT NULL,
  `razon_social` varchar(130) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `cod_postal` int(5) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `fecha_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nro_identidad`, `razon_social`, `telefono`, `correo`, `departamento`, `provincia`, `distrito`, `cod_postal`, `direccion`, `rol`, `password`, `estado`, `fecha_reg`) VALUES
(3, '12345679', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'cusco', 'Administrador', '$2y$10$HlwqYNKviYh2w4ypbbCzheMYHpjLl7X1yejS.J58q9gVcncmjPSCW', 1, '2025-09-28 18:49:17'),
(4, '87654329', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'cusco', 'user', '$2y$10$SS4KTOpRj6LgBV3PtoD28uZQ2LgbZu9624WWidWLhCw35yE/uT4ty', 1, '2025-09-28 18:50:48'),
(5, '87654321', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'cusco', 'user', '$2y$10$Hho/5NQcUdmqvbjDmIljue2Au/Nj/bGEZeryrtE9WPB.TuJ41a4li', 1, '2025-09-28 18:51:45'),
(6, '12345670', 'mendoza', '949889854', 'lan@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'cusco', 'admin', '$2y$10$p0LloDLG7l1dTIX8HFfpq.vU1ms4EAdPn9x8xlzAQqsF3XYcNYuKu', 1, '2025-09-28 18:55:15'),
(7, '09876543', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'lima', 'admin', '$2y$10$QAy87CPcHTc93C4y2C4zm.mKQB9UW.yiuQYtQAN.X8P2hB1ifiFHy', 1, '2025-09-28 18:56:02'),
(8, '89765432', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'lima', 'user', '$2y$10$PHMqHcIumeZ7zDSALKN2AuWRkc9lvhK.tKfYi.jOLQXBBW1kX3cr.', 1, '2025-09-28 19:13:27'),
(9, '98765432', 'kender', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'lima', 'user', '$2y$10$AW9xfYIfNfxl2GlscSaw6OAc7toW0krF7T/L7WMeHDfg.Z0FwTPOy', 1, '2025-09-28 19:14:01'),
(10, '76854937', 'betty', '949889854', 'kender@gmail.com', 'Ayacucho', 'Huanta', 'Huanta', 121, 'nazarenas', 'user', '$2y$10$9XmHQwqgGYXSAimfykcrFezNHbBvnGeyasg.YigCLZMFNogPTUQF.', 1, '2025-09-28 19:15:50'),
(13, '73353978', 'bettyYYYYYYYYYYYYYYYYYYYY', '987536472', 'bababa@gmail.com', 'DSAGDSHF', 'dgrer', 'dfg', 121, 'nazarenas', 'Proveedor', '$2y$10$4yTUl.rxbMVFJkirhUxAC.7AwBohcJOQ/zvk0pXWgE4QGrZ6M2pri', 1, '2025-10-13 22:04:07'),
(14, '73353979', 'bettyyyyyyyyyyyyyyy', '987536472', 'bababa@gmail.com', 'DSAGDSHF', 'dgrer', 'dfg', 121, 'nazarenas', 'Cliente', '$2y$10$lYYfrXEYpHnZ3OABIT5Kl.UvKSRm9gm96eQiyOklUimjf/hij4H4e', 1, '2025-10-13 22:07:13'),
(15, '12345674', 'Patricia', '989886543', 'paty@gmail.com', 'lima', 'lima', 'lima', 12345, 'lima', 'Cliente', '$2y$10$1wdbfkqrW6DuYsHBRXxzu.1vJbiTPbK2zsFTYsxZa5YOO0Acqs6f2', 1, '2025-10-13 22:59:25'),
(16, '89076548', 'Jorge luis', '987564753', 'luis@gmail.com', 'Huancayo', 'Huancayo', 'Huancayo', 87695, 'jr.lima', 'Cliente', '$2y$10$XkNGHh1qB5/hBHpzC23q4uZ9orqTqDnilrG33BGzXmtQ5tGllXHJC', 1, '2025-10-13 23:00:52'),
(17, '98765876', 'Jorge luisSSSSSSSSSSSS', '987564753', 'luis@gmail.com', 'Huancayo', 'Huancayo', 'Huancayo', 87695, 'jr.lima', 'Proveedor', '$2y$10$cJsuanzqleDYIEPchgMAEeWU1Crr9mBQiVf/uBica5ipZwdA5QKZS', 1, '2025-10-13 23:01:27'),
(18, '87656789', 'kender', '987564753', 'luis@gmail.com', 'Huancayo', 'Huancayo', 'Huancayo', 87695, 'jr.lima', 'Proveedor', '$2y$10$iZ8J0UErFNNHevongG9gAuFRaAU19Ep.i/Kv8BLp8dBSSAl8qTGWm', 1, '2025-10-13 23:02:04'),
(19, '87656788', 'Evelin', '987564753', 'luis@gmail.com', 'Huanta', 'Huanta', 'Huanta', 87695, 'jr.huanta', 'Proveedor', '$2y$10$y9nqWvAkZxVfFOBDuZU3neDK6pDFElL.qsJl7ImiHxk56TPbXUUhW', 1, '2025-10-13 23:03:10'),
(20, '87656785', 'kender', '987564753', 'luis@gmail.com', 'Huancayo', 'Huancayo', 'Huancayo', 87695, 'jr.lima', 'Cliente', '$2y$10$mZW587y22OrwYBVtRGDDCOKr5oF9nE3wtJafJIgblMk.ZzY6u27ly', 1, '2025-10-13 23:03:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `nombre`, `detalle`, `precio`, `stock`, `id_categoria`, `fecha_vencimiento`, `imagen`, `id_proveedor`) VALUES
(10, '7890', 'leche', 'leche', 10.00, 100, 2, '2029-08-07', 'uploads/productos/prod_6944124d3496b.jpeg', 19),
(11, '4', 'yogurt', 'yogurt', 10.00, 100, 2, '2029-08-07', 'uploads/productos/prod_6944125f430f8.png', 18),
(12, '5', 'galletas', 'galleta', 9999.99, 1, 2, '2025-11-18', 'uploads/productos/prod_690e2e4e7a91c.webp', 18),
(13, '6', 'frugos', 'frugos', 9999.99, 1, 2, '2025-11-18', 'uploads/productos/prod_690e2e6783d71.webp', 18),
(14, '7', 'gaseosa pepsi', 'gaseosa  pepsi', 9999.99, 1, 2, '2025-11-18', 'uploads/productos/prod_690e2f12dfba4.png', 19),
(15, '8', 'inka cola', 'inka cola', 9999.99, 1, 2, '2025-11-18', 'uploads/productos/prod_690e2f3e1fe21.webp', 19),
(16, '9', 'mantequilla', 'mantequilla', 9999.99, 1, 2, '2025-11-18', 'uploads/productos/prod_690e2f9262e5a.png', 18),
(17, '79', 'mermelada ', 'mermelda', 45.00, 100, 2, '2029-02-10', 'uploads/productos/prod_69120239d630e.webp', 18),
(18, '80', 'mermelada ', 'mermelda', 45.00, 100, 2, '2029-02-10', 'uploads/productos/prod_69120519c2664.png', 18),
(19, '100', 'gaseosa pepsi', 'gaseosa pepsi', 45.00, 100, 2, '2040-10-07', 'uploads/productos/prod_691b3ac99722e.png', 18),
(22, '54647', 'yogurt', 'yogurt', 10.00, 100, 1, '2029-08-07', 'uploads/productos/prod_6944128130b37.png', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `fecha_hora_inicio` datetime DEFAULT NULL,
  `fecha_hora_fin` datetime DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal_venta`
--

CREATE TABLE `temporal_venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `codigo`, `fecha_hora`, `id_cliente`, `id_vendedor`, `estado`) VALUES
(5, '1', '2025-12-18 15:52:00', 20, 3, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `temporal_venta`
--
ALTER TABLE `temporal_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal_venta`
--
ALTER TABLE `temporal_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
