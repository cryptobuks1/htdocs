-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2015 a las 18:05:38
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `espigal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE IF NOT EXISTS `adicionales` (
`id_adicional` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` decimal(30,2) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `grupo` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `adicionales`
--

INSERT INTO `adicionales` (`id_adicional`, `nombre`, `valor`, `imagen`, `grupo`, `descripcion`) VALUES
(1, 'Champiñones', '0.75', 'champ.jpg', 'adicional', 'adicional descrip'),
(5, 'Papas + Cola', '1.50', 'cat5.jpg', 'combos', 'Combos'),
(8, 'Pickles', '0.75', 'pollo.jpg', 'adicional', 'Esta es una porsión de pollo'),
(9, 'Coca Cola', '0.00', 'coca.jpg', 'zbebidas', 'Coca Cola'),
(10, 'Pepsi', '0.00', 'pepsi.jpg', 'zbebidas', ''),
(11, 'Sprite', '0.00', 'sprite.jpg', 'zbebidas', ''),
(12, 'Fanta', '0.00', 'fanta.jpg', 'zbebidas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicional_producto`
--

CREATE TABLE IF NOT EXISTS `adicional_producto` (
`id_ad_prod` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_adicional` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `adicional_producto`
--

INSERT INTO `adicional_producto` (`id_ad_prod`, `id_producto`, `id_adicional`) VALUES
(15, 1, 1),
(19, 16, 1),
(27, 16, 5),
(28, 16, 9),
(29, 16, 10),
(30, 16, 11),
(31, 16, 12),
(32, 16, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id_cat` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre`, `imagen`, `posicion`) VALUES
(5, 'Productos Estrella', 'estrella.jpg', 1),
(6, 'Sanduches', 'tradicional-cat.jpg', 2),
(7, 'Entradas / Picaditas', 'mixta-grande-cat.jpg', 3),
(8, 'Ensaladas', 'ensalada-cesar-cat.jpg', 4),
(9, 'Desayunos', 'desayuno.jpg', 5),
(10, 'Platters Sanduches Fiesta', 'platters-cat.jpg', 6),
(11, 'Bebidas / Jumbos', 'jugos-cat.jpg', 7),
(12, 'Cafés / Frozen Cafés', 'frozen-cat.jpg', 8),
(13, 'Postres', 'tiramisu-cat.jpg', 9),
(14, 'Combos', 'combos-cat.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgproductos`
--

CREATE TABLE IF NOT EXISTS `imgproductos` (
`id_img` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `alt` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `imgproductos`
--

INSERT INTO `imgproductos` (`id_img`, `id_prod`, `imagen`, `alt`) VALUES
(1, 1, 'imagen1', 1),
(2, 1, 'imagen1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `detalle` varchar(350) NOT NULL,
  `valor` decimal(30,2) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_cat`, `nombre`, `detalle`, `valor`, `imagen`) VALUES
(16, 5, 'Tradicional', 'Pan de Frances, jamón, aceite de oliva, tomates deshidratados, queso mozzarella y albahaca. ', '3.50', 'sand-tradicional.jpg'),
(17, 5, 'BBQ', 'Champignones y queso holandés y/o aceitunas al ajillo.', '3.75', 'BBQ.jpg'),
(18, 5, 'Deluxe', 'Jamón americano, queso holandés, salame cervecero y salsa casera.', '3.00', 'Deluxe.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_user` int(11) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `tipo_user` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dir` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(200) NOT NULL,
  `referencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `ci`, `tipo_user`, `nombre`, `dir`, `tel`, `mail`, `referencia`, `pass`, `url`) VALUES
(1, '2', 'admin', 'Julian Agudelo', 'La peninsula -  Calle Bogotá y Edmonton', '24', 'lupaproyectos@gmail.com', '100 mts antes del conjunto portal de la viña', '3ea9c5e0161629166a0e', ''),
(4, '1', '', 'David Escobedo', 'Centro - mercado modelo', '099', 'david@gmail.com', 'En la y de la 12', '', ''),
(5, '94506', '', 'Julian', 'Centro', '244574', 'lupaproyectos@gmail.com', 'Al lado de', '3ea9c5e0161629166a0e', ''),
(6, '94506025', '', 'Oscar agudelo', 'La peninsula', '456', 'fjsdlfj@fjsdljk.com', 'Al lado de', '', ''),
(7, '175', '', 'Andrea Moreno', 'Ambato', '2445475', 'andream43@hotmail.com', 'Dentro de ', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adicionales`
--
ALTER TABLE `adicionales`
 ADD PRIMARY KEY (`id_adicional`);

--
-- Indices de la tabla `adicional_producto`
--
ALTER TABLE `adicional_producto`
 ADD PRIMARY KEY (`id_ad_prod`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
 ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adicionales`
--
ALTER TABLE `adicionales`
MODIFY `id_adicional` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `adicional_producto`
--
ALTER TABLE `adicional_producto`
MODIFY `id_ad_prod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
