-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 02:51:23
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicarh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pases_aprobados`
--

CREATE TABLE `pases_aprobados` (
  `id_solicitud` int(11) NOT NULL,
  `tipo_pase` int(11) NOT NULL,
  `id_usuario_solicito` int(11) NOT NULL,
  `id_usuario_aprobo` int(11) NOT NULL,
  `fecha_aplicacion_pase` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `nombre_puesto` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_area_adscripcion`
--

CREATE TABLE `tbl_area_adscripcion` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(100) CHARACTER SET utf8 NOT NULL,
  `encargado_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_encargados_area`
--

CREATE TABLE `tbl_encargados_area` (
  `id_encargado` int(11) NOT NULL,
  `mum_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_pase`
--

CREATE TABLE `tbl_estado_pase` (
  `id_estado` int(11) NOT NULL,
  `estado_pase` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estado_pase`
--

INSERT INTO `tbl_estado_pase` (`id_estado`, `estado_pase`) VALUES
(1, 'ACEPTADO'),
(2, 'RECHAZADO'),
(3, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud`
--

CREATE TABLE `tbl_solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `tipo_pase` int(11) NOT NULL,
  `id_usuario_solicito` int(11) NOT NULL,
  `id_usuario_aprobo` int(11) NOT NULL,
  `fecha_aplicacion_pase` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `asunto` varchar(200) CHARACTER SET utf8 NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pase`
--

CREATE TABLE `tbl_tipo_pase` (
  `id_tipo_pase` int(11) NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_pase`
--

INSERT INTO `tbl_tipo_pase` (`id_tipo_pase`, `tipo`) VALUES
(1, 'LABORAL'),
(2, 'PERSONAL'),
(3, 'IMSS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `id_tipo` int(11) NOT NULL,
  `tipo_de_usuario` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`id_tipo`, `tipo_de_usuario`) VALUES
(1, 'usuario'),
(2, 'encargado de area'),
(3, 'super administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `num_personal` int(11) NOT NULL,
  `apellido_paterno` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apellido_materno` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `area_adscripcion` int(11) NOT NULL,
  `puesto` int(11) NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pases_aprobados`
--
ALTER TABLE `pases_aprobados`
  ADD KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `tipo_pase` (`tipo_pase`),
  ADD KEY `id_usuario_solicito` (`id_usuario_solicito`),
  ADD KEY `id_usuario_aprobo` (`id_usuario_aprobo`),
  ADD KEY `fecha_aplicacion_pase` (`fecha_aplicacion_pase`),
  ADD KEY `hora_salida` (`hora_salida`),
  ADD KEY `hora_llegada` (`hora_llegada`),
  ADD KEY `asunto` (`asunto`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `tbl_area_adscripcion`
--
ALTER TABLE `tbl_area_adscripcion`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `encargado_area` (`encargado_area`);

--
-- Indices de la tabla `tbl_encargados_area`
--
ALTER TABLE `tbl_encargados_area`
  ADD PRIMARY KEY (`id_encargado`),
  ADD KEY `mum_personal` (`mum_personal`);

--
-- Indices de la tabla `tbl_estado_pase`
--
ALTER TABLE `tbl_estado_pase`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usuario_solicito` (`id_usuario_solicito`),
  ADD KEY `id_usuario_aprobo` (`id_usuario_aprobo`),
  ADD KEY `estado` (`estado`),
  ADD KEY `tipo_pase` (`tipo_pase`);

--
-- Indices de la tabla `tbl_tipo_pase`
--
ALTER TABLE `tbl_tipo_pase`
  ADD PRIMARY KEY (`id_tipo_pase`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`num_personal`),
  ADD KEY `puesto` (`puesto`),
  ADD KEY `puesto_2` (`puesto`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `puesto_3` (`puesto`),
  ADD KEY `area_adscripcion` (`area_adscripcion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_area_adscripcion`
--
ALTER TABLE `tbl_area_adscripcion`
  ADD CONSTRAINT `tbl_area_adscripcion_ibfk_1` FOREIGN KEY (`encargado_area`) REFERENCES `tbl_encargados_area` (`id_encargado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_encargados_area`
--
ALTER TABLE `tbl_encargados_area`
  ADD CONSTRAINT `encargados-usuarios` FOREIGN KEY (`mum_personal`) REFERENCES `usuarios` (`num_personal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD CONSTRAINT `solicitud-estado` FOREIGN KEY (`estado`) REFERENCES `tbl_estado_pase` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud-tipo` FOREIGN KEY (`tipo_pase`) REFERENCES `tbl_tipo_pase` (`id_tipo_pase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud-usuarios` FOREIGN KEY (`id_usuario_solicito`) REFERENCES `usuarios` (`num_personal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario-area_adscripcion` FOREIGN KEY (`area_adscripcion`) REFERENCES `tbl_area_adscripcion` (`id_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios-puesto` FOREIGN KEY (`puesto`) REFERENCES `puesto` (`id_puesto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios-tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_usuarios` (`id_tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
