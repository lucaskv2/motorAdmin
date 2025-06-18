-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 16-06-2025 a las 22:22:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_mecanico`
--
CREATE DATABASE taller_mecanico;
USE taller_mecanico;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `servicio`, `mensaje`, `fecha`) VALUES
(1, 'juan', 'juandavila@gmail.com', 'Cambio de Aceite', 'hola', '2025-06-16 20:06:29'),
(2, 'juan', 'juandavila@gmail.com', 'Cambio de Aceite', 'Quiero hacer el cambio de aceite esta semana', '2025-06-16 20:12:27'),
(3, 'laura', 'laurasanchez@gmail.com', 'Cambio de ruedas', 'Noté desgaste irregular en las cubiertas, necesito revisar.', '2025-06-16 20:12:56'),
(4, 'martin', 'martinvenegas@gmail.com', 'Cambio de frenos', '¿Podrían revisar mis frenos? Están haciendo ruido.', '2025-06-16 20:13:41'),
(5, 'monica', 'monicagonzalez@gmail.com', 'Chequeo General', 'Quiero un control completo del vehículo antes de viajar.', '2025-06-16 20:14:16'),
(6, 'jose', 'josefernandez@gmail.com', 'otro', 'Tengo un problema con el cierre centralizado.', '2025-06-16 20:14:57'),
(7, 'milagros', 'milagrosbenitez@gmail.com', 'Cambio de Aceite', '¿Qué tipo de aceite utilizan en su taller?', '2025-06-16 20:15:26'),
(8, 'lucas', 'lucvazz@gmail.com', 'Chequeo General', 'El auto vibra mucho, me gustaría hacerle un chequeo.', '2025-06-16 20:15:54'),
(9, 'Tomas', 'tomasgimenez@gmail.com', 'Cambio de ruedas', '¿Tienen neumáticos en stock para una EcoSport 2018?', '2025-06-16 20:16:42'),
(10, 'Kevin', 'cumbialomonaco@gmail.com', 'Cambio de frenos', 'El pedal del freno está muy blando.', '2025-06-16 20:17:23'),
(11, 'peter', 'peterparker@gmail.com', 'otro', '¿Realizan cambio de batería?', '2025-06-16 20:17:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `email`, `dni`, `telefono`, `direccion`, `especialidad`, `fecha`) VALUES
(1, 'Juan Pérez', 'juan.perez@taller.com', '20333444', '1123456789', 'Av. Rivadavia 1234', 'Mecánica', '2025-06-16 19:15:00'),
(2, 'Lucía Gómez', 'lucia.gomez@taller.com', '30445566', '1134567890', 'Calle Mitre 234', 'Electricidad', '2025-06-16 19:15:00'),
(3, 'Carlos Ruiz', 'carlos.ruiz@taller.com', '25333222', '1145678901', 'Av. San Martín 567', 'Pintura', '2025-06-16 19:15:00'),
(4, 'Martina López', 'martina.lopez@taller.com', '30776655', '1156789012', 'Las Heras 890', 'Mecánica', '2025-06-16 19:15:00'),
(5, 'Daniel Fernández', 'daniel.fernandez@taller.com', '22334411', '1167890123', 'Belgrano 910', 'Chapa', '2025-06-16 19:15:00'),
(6, 'Sofía Romero', 'sofia.romero@taller.com', '33112233', '1178901234', 'Castelli 444', 'Electricidad', '2025-06-16 19:15:00'),
(7, 'Tomás Morales', 'tomas.morales@taller.com', '28990011', '1189012345', 'Tucumán 1200', 'Alineación', '2025-06-16 19:15:00'),
(8, 'Carla Méndez', 'carla.mendez@taller.com', '30332211', '1190123456', 'Independencia 321', 'Mecánica', '2025-06-16 19:15:00'),
(9, 'Diego Navarro', 'diego.navarro@taller.com', '32445678', '1112345678', 'Lavalle 777', 'Electricidad', '2025-06-16 19:15:00'),
(10, 'Valeria Díaz', 'valeria.diaz@taller.com', '31224466', '1123456780', 'Corrientes 456', 'Chapa', '2025-06-16 19:15:00'),
(11, 'Leandro Torres', 'leandro.torres@taller.com', '29334455', '1134567891', 'Aráoz 567', 'Pintura', '2025-06-16 19:15:00'),
(12, 'Florencia Ríos', 'florencia.rios@taller.com', '31998877', '1145678902', 'Billinghurst 789', 'Mecánica', '2025-06-16 19:15:00'),
(13, 'Fernando Herrera', 'fernando.herrera@taller.com', '28001122', '1156789013', 'Pueyrredón 321', 'Electricidad', '2025-06-16 19:15:00'),
(14, 'Julieta Castro', 'julieta.castro@taller.com', '30113455', '1167890124', 'Medrano 1100', 'Chapa', '2025-06-16 19:15:00'),
(15, 'Matías Varela', 'matias.varela@taller.com', '27558899', '1178901235', 'Azcuénaga 850', 'Alineación', '2025-06-16 19:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `asunto` varchar(150) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `telefono`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'Javier', 'javiaugusto@gmail.com', '1189876543', 'consulta', 'Hola queria hacer una consulta sobre un presupuesto', '2025-06-16 19:23:59'),
(5, 'ricardo', 'ricarditogorosito@gmail.com', '1189785432', 'consulta general', 'Quisiera saber los horarios de atencion', '2025-06-16 19:29:44'),
(6, 'marta', 'martasanchez@gmail.com', '1189756433', 'presupuesto', 'Necesito cotización para revisión completa del auto', '2025-06-16 19:32:18'),
(7, 'juliana', 'juli07@gmail.com', '1127096433', 'urgente', 'Necesito cotización para revisión completa del auto', '2025-06-16 19:34:18'),
(8, 'nicolas', 'nicomartinez1@gmail.com', '1127854333', 'servicio tecnico', '¿Cuánto cuesta el cambio de aceite y filtro?', '2025-06-16 19:35:47'),
(9, 'matias', 'matiaslopez54@gmail.com', '1127987412', 'Turno', 'Quiero sacar un turno para el miercoles', '2025-06-16 19:37:20'),
(10, 'sebastian', 'sebitacarp912@gmail.com', '1165489012', 'Repuestos', '¿Venden repuestos originales para Ford Focus?', '2025-06-16 19:38:58'),
(11, 'juana', 'juanitamarquez69@gmail.com', '1112568976', 'Consulta', '¿Hacen alineación y balanceo?', '2025-06-16 19:40:03'),
(12, 'lucas', 'lucvazz@gmail.com', '1108768943', 'Problemas electricos', 'Tengo fallas con las luces del tablero.', '2025-06-16 19:41:04'),
(13, 'seba', 'sebycapobernal@gmail.com', '1134567612', 'Frenos', 'Siento ruidos al frenar, necesito revisión.', '2025-06-16 19:42:00'),
(14, 'milagros', 'milagrosbenitez@gmail.com', '1190654371', 'Atencion', 'Quiero saber si trabajan los sábados.', '2025-06-16 19:43:09'),
(15, 'melina', 'meligalvan48@gmail.com', '1176121398', 'Cambio de ruedas', '¿Qué marca de neumáticos usan?', '2025-06-16 19:44:19'),
(16, 'leo', 'leoparedes@gmail.com', '1176124380', 'Consulta general', '¿Cuánto tarda un chequeo completo?', '2025-06-16 19:45:21'),
(17, 'carlos', 'carloscastro@gmail.com', '1173165092', 'Servicios', '¿Incluyen escaneo computarizado en sus servicios?', '2025-06-16 19:46:10'),
(18, 'pablo', 'pabloperez@gmail.com', '1165900103', 'Garantia', '¿Tienen garantía por los trabajos realizados?', '2025-06-16 19:47:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `nombre_producto`, `marca`, `cantidad`, `precio_unitario`) VALUES
(1, 'Filtro de aceite', 'Mopar', 12, 8500.00),
(2, 'Pastillas de freno delanteras', 'Brembo', 6, 22000.00),
(3, 'Bujías de encendido Iridium', 'NGK', 20, 4500.00),
(4, 'Correa de distribución', 'Gates', 4, 35000.00),
(5, 'Bobina de encendido', 'Bosch', 10, 18000.00),
(6, 'Amortiguador delantero izquierdo', 'Monroe', 3, 40000.00),
(7, 'Sensor de oxígeno', 'Denso', 7, 15500.00),
(8, 'Aceite sintético 5W30 1L', 'Liqui Moly', 25, 9800.00),
(9, 'Termostato de motor', 'Mopar', 5, 12000.00),
(10, 'Juego de juntas tapa de cilindros', 'Illinois', 2, 48000.00),
(11, 'Kit embrague completo', 'Luk', 3, 95000.00),
(12, 'Radiador de agua', 'Valeo', 2, 70000.00),
(13, 'Alternador 120A', 'Bosch', 1, 135000.00),
(14, 'Módulo de ABS', 'Mopar', 1, 160000.00),
(15, 'Faro delantero izquierdo', 'Magneti Marelli', 2, 82000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('Pendiente','En progreso','Finalizado') NOT NULL DEFAULT 'Pendiente',
  `informe` text DEFAULT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `id_usuario`, `id_empleado`, `descripcion`, `estado`, `informe`, `fecha_asignacion`) VALUES
(1, 2, 1, '🔧 Revisión completa del sistema de frenos y cambio de pastillas delanteras.', 'Pendiente', NULL, '2025-06-16 19:35:00'),
(2, 3, 2, '💡 Diagnóstico y reparación del sistema de encendido electrónico que presenta fallas al arrancar.', 'Pendiente', NULL, '2025-06-16 19:35:17'),
(3, 9, 3, '🎨 Reparación de rayones en puerta delantera izquierda y repintado del panel con color original.', 'Pendiente', NULL, '2025-06-16 19:35:44'),
(4, 8, 4, '🛠 Cambio de correa de distribución y revisión del sistema de refrigeración.', 'Pendiente', NULL, '2025-06-16 19:35:56'),
(5, 11, 5, '🧰 Reparación de abolladura en guardabarros trasero izquierdo y alineación de puertas.', 'Pendiente', NULL, '2025-06-16 19:36:10'),
(6, 11, 6, '🔌 Instalación de sistema de sensores de estacionamiento y prueba de luces traseras.', 'Pendiente', NULL, '2025-06-16 19:36:31'),
(7, 13, 7, '🚗 Alineación y balanceo de las cuatro ruedas para corregir vibraciones a alta velocidad.', 'Pendiente', NULL, '2025-06-16 19:37:04'),
(8, 4, 8, '🔧 Mantenimiento preventivo: cambio de aceite, filtro de aire y filtro de combustible.', 'Pendiente', NULL, '2025-06-16 19:37:32'),
(9, 10, 9, '⚡ Revisión del sistema de carga: alternador y batería con baja tensión detectada.', 'Pendiente', NULL, '2025-06-16 19:37:43'),
(10, 6, 10, '🔨 Reparación de daño en paragolpes delantero tras leve colisión.', 'Pendiente', NULL, '2025-06-16 19:38:01'),
(11, 12, 11, '🎨 Pulido general de carrocería y aplicación de cera protectora.', 'Pendiente', NULL, '2025-06-16 19:38:33'),
(12, 2, 12, '🛠 Cambio de amortiguadores delanteros y revisión del tren delantero.', 'Pendiente', NULL, '2025-06-16 19:38:52'),
(13, 12, 13, '💡 Instalación de luces LED interiores y revisión de fusibles quemados.', 'En progreso', NULL, '2025-06-16 19:39:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `patente` varchar(20) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `rol` varchar(20) DEFAULT 'Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `dni`, `patente`, `modelo`, `contrasenia`, `fecha_registro`, `rol`) VALUES
(1, 'Admin', 'admin@gmail.com', '23404004', 'ABC444', 'BMW', '$2y$10$Qrpzg/OKHBLl.vLuV6PeLecxSsxr.jqo4NttxkrbNBEgSR4fUm25q', '2025-06-16 15:47:34', 'Admin'),
(2, 'Valentina Ríos', 'valen.rios@gmail.com', '38245123', 'ACB134', 'Toyota Corolla', '$2y$10$a7d9mjrSJFdBVY5fMVqAfuxNx6D2D70UMlgoxeuoxTQZTBQ2SsF96', '2025-06-16 15:50:10', 'Cliente'),
(3, 'Nicolás Fernández', 'nico.fernandez@gmail.com', '41728954', 'BCD981', 'Peugeot 208', '$2y$10$gFmoqksKeYPjr/i20U34WeWktKgvZzkIxAwX2RYGIwD91zMzopAYS', '2025-06-16 15:51:08', 'Cliente'),
(4, 'Camila González', 'cami.gon@gmail.com', '39671285', 'XYZ552', 'Ford Ka', '$2y$10$OjZ7T0rFJvpM4y0iW4vi0Of/ZP00b6V/XhGIppF3kjfeu82fqKqJC', '2025-06-16 15:51:32', 'Cliente'),
(5, 'Martín López', 'martin.lopez@hotmail.com', '40325689', 'LOP768', 'Volkswagen Gol', '$2y$10$Lg0D64Y69CDDkr0FdevA0eynl32PqGZ27Wv2VTjL4FK3G0uHNLKyK', '2025-06-16 15:52:02', 'Cliente'),
(6, 'Carla Méndez', 'carla.mendez@yahoo.com', '37451246', 'MEN333', 'Fiat Argo', '$2y$10$wZBz2nx/DPYYw5JhBFKB2O7o.oUpfuVHB24KNErYT3ut4a39HX.36', '2025-06-16 15:52:33', 'Cliente'),
(7, 'Diego Sosa', 'diego.sosa@gmail.com', '41258975', 'SOS789', 'Renault Logan', '$2y$10$o7.IQO0Dz/HCpM5PsDG7pum6YTBBRvHkcyXu2NsGGHcEjab8gdLXW', '2025-06-16 15:53:04', 'Cliente'),
(8, 'Julieta Ramírez', 'juli.ramirez@gmail.com', '38945213', 'RAM951', 'Honda Fit', '$2y$10$H6nN3q59399TG2VGRdXiIeg45OQbg3.07NOtXh3IE8wNOQPhoVxmC', '2025-06-16 15:53:29', 'Cliente'),
(9, 'Tomás Herrera', 'tomi.herrera@gmail.com', '40578912', 'HER672', 'Chevrolet Onix', '$2y$10$Kb2NbxWhISVjV7pwb5vMx.P4rxHolvQwjyriyRFLy2S.jfe2./oje', '2025-06-16 15:54:08', 'Cliente'),
(10, 'Lucía Benítez', 'lucia.benitez@gmail.com', '38672145', 'BEN487', 'Nissan March', '$2y$10$rG6O76OCeMc9CDwR2DlNiO2WrukelPt0h42c9mKJxVi/nVahoDzMi', '2025-06-16 15:54:39', 'Cliente'),
(11, 'Facundo Díaz', 'facu.diaz@gmail.com', '39258146', 'DIA258', 'Citroën C3', '$2y$10$X85zsKuK1SCIUKvMpgEq.eMf7IGRfO9okNvgXQETLh9SUITw3r8Mq', '2025-06-16 15:55:07', 'Cliente'),
(12, 'Antonella Ruiz', 'anto.ruiz@gmail.com', '40215879', 'RUI741', 'Toyota Yaris', '$2y$10$29LXeqA6omllS9icXr7WA.6t4bQrTkfc3/35qH9K05NmHEKdTvcsm', '2025-06-16 15:55:30', 'Cliente'),
(13, 'Bruno Castro', 'bruno.castro@gmail.com', '38471652', 'CAS963', 'Ford Focus', '$2y$10$.VvMxdXwsFbqk3sm4ZNVA.z0f4AsR1UoX9E7gkRg9wexNu8VKx3Vu', '2025-06-16 15:55:52', 'Cliente'),
(14, 'Lucas Vergara', 'admin@motormanager.com', '30245678', 'ADM001', 'AdminCar', '$2y$10$AF4sMcL8KFPSsy7S70EMUO2eiQfm5pOgSGoLlVEOHZyisysyaqbi2', '2025-06-16 15:58:19', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
