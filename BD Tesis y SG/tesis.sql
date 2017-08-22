-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2015 a las 18:22:27
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`id` int(11) NOT NULL COMMENT '2',
  `cantidad` int(11) NOT NULL COMMENT '5'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `cantidad`) VALUES
(1, 45),
(2, 5),
(3, 852),
(4, 85),
(5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_echos`
--

CREATE TABLE IF NOT EXISTS `eventos_echos` (
  `nombre` varchar(40) NOT NULL,
  `profesor` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `reservaciones` varchar(40) NOT NULL,
  `asistentes` varchar(40) NOT NULL,
`id_evento` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `eventos_echos`
--

INSERT INTO `eventos_echos` (`nombre`, `profesor`, `fecha`, `reservaciones`, `asistentes`, `id_evento`) VALUES
('Mantener a Nuestros Clientes', 'Francisco J. Mosquera R', '2014-12-03', '5', '7', 1),
('Sicad y Sicad 2', 'Martin Herrera', '2014-12-04', '7', '10', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilitadores`
--

CREATE TABLE IF NOT EXISTS `facilitadores` (
`id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tipo_eventos` varchar(11) NOT NULL,
  `id_pais` varchar(200) NOT NULL,
  `ciudad` varchar(11) NOT NULL,
  `honorarios` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `facilitadores`
--

INSERT INTO `facilitadores` (`id`, `nombre`, `apellido`, `cedula`, `numero`, `email`, `tipo_eventos`, `id_pais`, `ciudad`, `honorarios`) VALUES
(1, 'Martin', 'Herrera', '0', '04167324499', 'mhvalor@hotmail.com', 'Importacion', '1', 'Valencia', '1200 p/h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`) VALUES
('1', '<img src="http://gerenciales.com/img/icons/flags32/ve.png">'),
('2', '<img src="http://gerenciales.com/img/icons/flags32/pa.png">'),
('3', '<img src="http://gerenciales.com/img/icons/flags32/rd.png">');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `nombre` varchar(40) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `eventos` int(11) NOT NULL,
  `salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`nombre`, `cedula`, `telefono`, `eventos`, `salario`) VALUES
('Victor Leon', '', '', 0, 0),
('Martin Herrera', '11465823', '04167324499', 16, 4000),
('Emma Garcia', '12453918', '04265165625', 7, 6900),
('Franklin Rangel', '5963254', '04248521364', 19, 5700),
('Carlos Gamero', '7546987', '04269511397', 32, 6000),
('Carlos Acosta', '7596321', '04144330142', 7, 6100),
('Amelia Belloso', '8951753', '04144278872', 9, 4900),
('Francisco Mosquera', '9485813', '04144952861', 5, 5800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id_proveedor` int(6) NOT NULL,
  `nombre_empresa` varchar(40) NOT NULL,
  `id_pais` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `nombre_persona` varchar(40) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `tipo_pago` varchar(40) NOT NULL,
  `tipo_servicio` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_empresa`, `id_pais`, `ciudad`, `nombre_persona`, `telefono`, `mail`, `cargo`, `tipo_pago`, `tipo_servicio`) VALUES
(1, 'Netuno', '1', 'Valencia', 'Savino Leone', '042447483647', 'savleo@gmail.com', 'Gerente General', 'Intercambio/Pago', 'Publicidad'),
(2, 'Auvision', '1', 'Caracas', 'Fran Barreto', '04267483647', 'franrreto@hotmail.com', 'Presidente', 'Intercambio/Pago', 'Audiovisual'),
(3, 'Consolitex', '1', 'Valencia', 'Ana Tejeda', '04244973719', 'antej@consolitex.com', 'Gerente de Mercadeo', 'Intercambio/Pago', 'Articulos POP, Agua y Revistas.'),
(4, 'Consolitex', '1', 'Caracas', 'Elsa Gutierrez', '04121594862', 'elsg@consolitex.com', 'Asistente de la Gerencia', 'Intercambio/Pago', 'Articulos POP, Agua y Revistas.'),
(8, 'DELCOP', '1', 'Caracas', 'Vanessa Prall', '02129490800', 'vanessa.prall@delcop.com', 'Gerente de Mercadeo', 'Intercambio', 'Impresion Material');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `clave` varchar(12) NOT NULL,
  `nivel` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nivel`) VALUES
(1, 'rober', 'r2069', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos_echos`
--
ALTER TABLE `eventos_echos`
 ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `facilitadores`
--
ALTER TABLE `facilitadores`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '2',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `eventos_echos`
--
ALTER TABLE `eventos_echos`
MODIFY `id_evento` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `facilitadores`
--
ALTER TABLE `facilitadores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id_proveedor` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
