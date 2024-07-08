-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2024 a las 04:50:27
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_activos`
--

CREATE TABLE `registro_activos` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) CHARACTER SET latin1 NOT NULL,
  `serial` varchar(20) CHARACTER SET latin1 NOT NULL,
  `placa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ano_adquisicion` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ambiente` varchar(5) CHARACTER SET latin1 NOT NULL,
  `tipo_activo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(10) CHARACTER SET latin1 NOT NULL,
  `responsable` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `registro_activos`
--

INSERT INTO `registro_activos` (`id`, `marca`, `serial`, `placa`, `ano_adquisicion`, `ambiente`, `tipo_activo`, `estado`, `responsable`) VALUES
(7, 'toshiba', '21323', 'nnnnnn', '2024-07-11', '302', 'portatil', 'bueno', 'margarita riveros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_mantenimiento`
--

CREATE TABLE `registro_mantenimiento` (
  `id` int(11) NOT NULL,
  `tecnico` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fecha_mantenimiento` varchar(15) CHARACTER SET latin1 NOT NULL,
  `placa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `mantenimiento` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ambiente` varchar(5) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `registro_mantenimiento`
--

INSERT INTO `registro_mantenimiento` (`id`, `tecnico`, `fecha_mantenimiento`, `placa`, `mantenimiento`, `ambiente`) VALUES
(2, 'martin castiblanco', '2024-08-08', '888', 'Fallo Internet', '302'),
(3, 'gonzalo ramirez', '2024-07-16', '12312x1x', 'Actualización', '302');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_novedades`
--

CREATE TABLE `registro_novedades` (
  `id` int(11) NOT NULL,
  `tecnico` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tipo_novedad` varchar(15) CHARACTER SET latin1 NOT NULL,
  `fecha_novedad` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ambiente` varchar(5) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `registro_novedades`
--

INSERT INTO `registro_novedades` (`id`, `tecnico`, `tipo_novedad`, `fecha_novedad`, `ambiente`, `descripcion`) VALUES
(1, 'pedro fernandez', 'MODERADO', '2024-05-12', '302', 'faltan dos mouse'),
(2, 'josefino cuellar', 'CRITICO', '2199-02-11', '108', 'no hay cables hdmi'),
(3, 'jhon edwar', 'MODERADO', '1990-09-09', '100', 'jhon esta muy gordo'),
(4, 'Dayanna castiblanco', 'MODERADO', '2000-09-05', '108', 'faltan muchos comput'),
(5, 'gonzalo ramirez', 'MODERADO', '2024-07-25', '302', 'en los años mil ceicientos un tirano mato tun tun tun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 NOT NULL,
  `correo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `usuario` varchar(15) CHARACTER SET latin1 NOT NULL,
  `contrasena` varchar(70) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `rol`, `usuario`, `contrasena`) VALUES
(25, 'santiago', 'santi@gmail.com', 'SOPORTE TECNICO', 'santi', '$2y$10$AHQLxR59Om1GIdsn7ajqheqoNSz/xY8oQZNfIZV6I/wFbegeX7SDy'),
(27, 'lulu', 'lulu@gmail.com', 'ADMINISTRADOR', 'lulu', '$2y$10$WD4/iDZ/Bf93/7ViZMDlu.s9Cy8mTl.SQ0LvbgT7TBa6s9qbSIB4W'),
(28, 'margarita riveros', 'marga@gmail.com', 'ADMINISTRADOR', 'margarita', '$2y$10$NVxx1gP7nZM6Q.Kj7I0.JeM/cUGPvuPG28iHPgBRC9iJjczPxcl6q'),
(29, 'evelyn', 'evelyn@gmail.com', 'SOPORTE TECNICO', 'mogolla', '$2y$10$Xj1qMWnbGkKXpj6H0Cs84eV2QDZHCYKuQ4MYIgSVq5YgwXCQOKBfa'),
(30, 'GONZALO', 'GONZALO@GMAIL.COM', 'COORDINADOR', 'GONZA', '$2y$10$37R3wEyyxP.yPYQgnSesguzxP.4FkrvgG39AU8OqESb/sjWo8LEaq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_activos`
--
ALTER TABLE `registro_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_mantenimiento`
--
ALTER TABLE `registro_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_novedades`
--
ALTER TABLE `registro_novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_activos`
--
ALTER TABLE `registro_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `registro_mantenimiento`
--
ALTER TABLE `registro_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro_novedades`
--
ALTER TABLE `registro_novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
