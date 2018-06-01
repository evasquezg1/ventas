-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2018 a las 03:57:50
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sofpos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
`id_articulos` bigint(20) NOT NULL,
  `cantidadminima` int(11) DEFAULT '0',
  `codigobarras` varchar(100) DEFAULT NULL,
  `descripcioncomercial` varchar(100) DEFAULT NULL,
  `existencia` double DEFAULT '0',
  `fechaucompra` date DEFAULT NULL,
  `fechauventa` date DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `precioventa` int(11) DEFAULT NULL,
  `preciominimo` int(11) DEFAULT NULL,
  `porcentajeminimo` double DEFAULT NULL,
  `porcentajesuegerido` double DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `unidadesvendidas` double DEFAULT NULL,
  `vlrcosto` double DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `bodega` int(11) DEFAULT NULL,
  `estado_articulos` int(11) DEFAULT NULL,
  `tarifa_iva` double DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulos`, `cantidadminima`, `codigobarras`, `descripcioncomercial`, `existencia`, `fechaucompra`, `fechauventa`, `observaciones`, `precioventa`, `preciominimo`, `porcentajeminimo`, `porcentajesuegerido`, `tipo`, `unidadesvendidas`, `vlrcosto`, `grupo`, `marca`, `bodega`, `estado_articulos`, `tarifa_iva`, `ubicacion`) VALUES
(16, 2, '3829', 'BOLSAS PLASTICAS', 1, NULL, NULL, '', 1000, 1000, 25, 25, 1, NULL, 800, 1, 2, 1, 1, 19, 'ESTANTERIA'),
(18, 0, '879', 'ETIQUETAS', 0, NULL, NULL, '', 500, 500, 0, 0, 1, NULL, 500, 3, 1, 0, 1, 19, ''),
(19, 3, '3827', 'ALMENDRAS', 0, NULL, NULL, '', 25000, 24000, 26.32, 31.58, 1, NULL, 19000, 2, 1, 1, 1, 19, ''),
(22, 0, '4530', 'ALMENDRAS 500G', 0, NULL, NULL, '', 19000, 18000, 66.67, 75.93, 3, NULL, 10800, 2, 1, 1, 1, 19, 'VITRINA'),
(23, 0, '4531', 'ALMENDRAS 250G', 0, NULL, NULL, '', 12000, 11000, 81.82, 98.35, 3, NULL, 6050, 2, 1, 1, 1, 19, 'VITRINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articuloscombo`
--

CREATE TABLE IF NOT EXISTS `articuloscombo` (
`id_artc` int(11) NOT NULL,
  `codbar_artc` varchar(50) NOT NULL,
  `cant_artc` double NOT NULL,
  `code_artc` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `articuloscombo`
--

INSERT INTO `articuloscombo` (`id_artc`, `codbar_artc`, `cant_artc`, `code_artc`) VALUES
(7, '4530', 1, '879'),
(8, '4530', 1, '3829'),
(9, '4530', 0.5, '3827'),
(10, '4531', 1, '879'),
(11, '4531', 1, '3829'),
(12, '4531', 0.25, '3827');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE IF NOT EXISTS `bodegas` (
`id_bodegas` int(11) NOT NULL,
  `nombre_bodegas` varchar(40) NOT NULL,
  `estado_bodegas` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id_bodegas`, `nombre_bodegas`, `estado_bodegas`) VALUES
(1, 'PRINCIPAL', '1'),
(2, 'ZAPATOS', '1'),
(3, 'ROPA HOMBRE', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
`id_grupos` int(11) NOT NULL,
  `nombre_grupos` varchar(30) NOT NULL,
  `estado_grupos` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupos`, `nombre_grupos`, `estado_grupos`) VALUES
(1, 'BOLSAS', '1'),
(2, 'FRUTOS SECOS', '1'),
(3, 'ETIQUETAS', '1'),
(4, 'SIN GRUPO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
`id_marcas` int(11) NOT NULL,
  `nombre_marcas` varchar(30) NOT NULL,
  `estado_marcas` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marcas`, `nombre_marcas`, `estado_marcas`) VALUES
(1, 'SIN MARCA', '1'),
(2, 'VANIPLAST', '1'),
(3, 'TRONEX', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosinventario`
--

CREATE TABLE IF NOT EXISTS `movimientosinventario` (
`id_movi` int(11) NOT NULL,
  `fecha_movi` date NOT NULL,
  `cod_movi` varchar(6) NOT NULL,
  `nota_movi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usu` int(11) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `clave_usu` varchar(50) NOT NULL,
  `tipo_usu` varchar(2) NOT NULL,
  `estado_usu` varchar(1) NOT NULL,
  `permisos_usu` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `clave_usu`, `tipo_usu`, `estado_usu`, `permisos_usu`) VALUES
(1, 'eliecer.vasquez', '21232f297a57a5a743894a0e4a801fc3', '1', '1', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
 ADD PRIMARY KEY (`id_articulos`), ADD UNIQUE KEY `codigobarras` (`codigobarras`), ADD KEY `FK215DA6F860628F2B` (`marca`), ADD KEY `FK215DA6F873D80A9A` (`grupo`);

--
-- Indices de la tabla `articuloscombo`
--
ALTER TABLE `articuloscombo`
 ADD PRIMARY KEY (`id_artc`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
 ADD PRIMARY KEY (`id_bodegas`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
 ADD PRIMARY KEY (`id_grupos`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
 ADD PRIMARY KEY (`id_marcas`);

--
-- Indices de la tabla `movimientosinventario`
--
ALTER TABLE `movimientosinventario`
 ADD PRIMARY KEY (`id_movi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
MODIFY `id_articulos` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `articuloscombo`
--
ALTER TABLE `articuloscombo`
MODIFY `id_artc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
MODIFY `id_bodegas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
MODIFY `id_grupos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
MODIFY `id_marcas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `movimientosinventario`
--
ALTER TABLE `movimientosinventario`
MODIFY `id_movi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
