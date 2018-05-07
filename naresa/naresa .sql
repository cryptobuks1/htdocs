-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2015 a las 01:05:46
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `naresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgtrabajo`
--

CREATE TABLE IF NOT EXISTS `imgtrabajo` (
`id_img` int(11) NOT NULL,
  `id_trab` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alt` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `imgtrabajo`
--

INSERT INTO `imgtrabajo` (`id_img`, `id_trab`, `imagen`, `alt`) VALUES
(7, 167, 'magenta1.jpg', ''),
(8, 167, 'magenta2.jpg', ''),
(9, 167, 'magenta3.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE IF NOT EXISTS `trabajos` (
`id_trab` int(100) NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `des_corta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `des` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=299 ;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trab`, `detalle`, `cliente`, `nombre`, `servicio`, `des_corta`, `des`, `enlace`, `imagen`, `alt`) VALUES
(270, '', '3er Planeta', '3erplaneta', 'Rótulos corpóreos', '', '', 'No', '3erplaneta.jpg', ''),
(271, 'a', 'Dolce', 'dolce', 'Rótulos corpóreos', 'a', 'a', 'No', 'dolce.jpg', 'a'),
(272, '', 'Smat Heladería & Cafetería', 'smat', 'Rótulos corpóreos', '', '', 'No', 'smat.jpg', 'b'),
(273, '', 'Taty', 'taty', 'Rótulos corpóreos', '', '', 'No', 'taty.jpg', 'a'),
(274, '', 'Yogurt Persa', 'youpersa', 'Rótulos corpóreos', '', '', 'No', 'youpersa.jpg', 'ok'),
(275, '', 'Rótulos Corpóreos (E)', 'e', 'Rotulos Corpóreos', '', '', 'No', 'e.jpg', 'bien'),
(276, '', 'May Jhos Boutique', 'mayjhos', 'Rotulos Corpóreos', '', '', 'No', 'mayjhos.jpg', 'm'),
(277, '', 'Avenue', 'aventure', 'Rotulos Corpóreos', '', '', 'No', 'aventure.jpg', 'av'),
(278, '', 'Yogurt Persa', 'youpersa', 'Rotulación', '', '', 'No', 'youpersa-r.jpg', '1'),
(279, '', 'Hordiplas', 'hordiplas', 'Rotulación', '', '', 'No', 'hordiplas-r.jpg', 'hp'),
(280, '', 'Hypnotic', 'hypnotiq', 'Rotulos Corpóreos', '', '', 'No', 'hypnotiq.jpg', 'hy'),
(281, '', 'Imptek Innovación Bienestar', 'imptek', 'Rotulos Corpóreos', '', '', 'No', 'imptek.jpg', 'im'),
(282, '', 'PETROECUADOR', 'petroecuador', 'Rotulación', '', '', 'No', 'petroecuador-r.jpg', 'Pe'),
(283, '', 'Ron 100fuegos', 'ron100', 'Rotulación', '', '', 'No', 'ron100-r.jpg', 'r100'),
(284, '', 'Taty', 'taty2', 'Rotulos Corpóreos', '', '', 'No', 'taty2.jpg', 't2'),
(285, '', 'All Parts', 'allparts', 'Vehículos', '', '', 'No', 'allparts-ve.jpg', 'veh'),
(286, '', 'Chibuleo', 'chibuleo', 'Vallas', '', '', 'No', 'chibuleo-v.jpg', 'Chibuleo'),
(287, '', 'Llantas Sierra', 'llantassierra', 'Vehículos', '', '', 'No', 'llantassierra-ve.jpg', 'Llantas Sierra'),
(288, '', 'Monterrey', 'monterrey', 'Vehículos', '', '', 'No', 'monterrey-ve.jpg', 'Monterrey'),
(289, '', 'Mushuc', 'mushuc', 'Vallas', '', '', 'No', 'mushuc-v.jpg', 'mushuc'),
(290, '', 'The bear', 'thebear', 'Rotulación', '', '', 'No', 'thebear-r.jpg', 'The bear'),
(291, '', 'Tracto Rep', 'tractorep', 'Rotulación', '', '', 'No', 'tractorep-r.jpg', 'Tracto Repuestos'),
(294, '', 'VIP', 'vip', 'Vehículos', '', '', 'No', 'vip-ve.jpg', 'VIP'),
(295, '', 'Imptek', 'i m p t e k', 'Rotulación', 'imptek', '', 'No', 'imptek-r.jpg', 'Imptek'),
(296, '', 'Escuela', 'Escuela', 'Rotulación', '', '', 'No', 'escuela-r.jpg', 'Escuela'),
(297, '', 'Cooperativa', 'cooperativa', 'Rotulación', '', '', 'No', 'cooperativa-r.jpg', 'cooperativa'),
(298, '', 'Cooperativa', 'cooperativa2', 'Rotulación', '', '', 'No', 'cooperativa2-r.jpg', 'cooperativa2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(100) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `priv` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre`, `user`, `pass`, `priv`) VALUES
(1, 'Daniela', 'dannysk', '123', 'admin'),
(0, 'Daniela', 'naresa', '123', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imgtrabajo`
--
ALTER TABLE `imgtrabajo`
 ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
 ADD PRIMARY KEY (`id_trab`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imgtrabajo`
--
ALTER TABLE `imgtrabajo`
MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
MODIFY `id_trab` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=299;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
