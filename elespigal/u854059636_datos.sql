
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-09-2015 a las 04:22:31
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u854059636_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE IF NOT EXISTS `adicionales` (
  `id_adicional` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `valor` decimal(30,2) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `grupo` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_adicional`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `adicionales`
--

INSERT INTO `adicionales` (`id_adicional`, `nombre`, `valor`, `imagen`, `grupo`, `descripcion`) VALUES
(1, 'Champiñones', '0.75', 'champ.jpg', 'adicional', 'adicional descrip'),
(5, 'Papas + Cola', '1.50', 'cat5.jpg', 'combos', 'Combos'),
(8, 'Pickles', '0.75', 'pollo.jpg', 'adicional', 'Esta es una porsión de pollo'),
(9, 'Coca Cola', '0.00', 'coca.jpg', 'zbebidas', 'Coca Cola'),
(10, 'Fiora', '0.00', 'pepsi.jpg', 'zbebidas', ''),
(11, 'Sprite', '0.00', 'sprite.jpg', 'zbebidas', ''),
(12, 'Fanta', '0.00', 'fanta.jpg', 'zbebidas', ''),
(13, 'Crema', '0.50', 'Sin título.jpg', 'adicional', 'CREMA PARA LOS CAFéS'),
(14, 'Mora', '0.00', '', 'sabores', ''),
(15, 'Tomate', '0.00', '', 'sabores', ''),
(16, 'Fresa', '0.00', '', 'sabores', ''),
(17, 'Guanabana', '0.00', '', 'sabores', ''),
(18, 'Maracuyá', '0.00', '', 'sabores', ''),
(19, 'Tamarindo', '0.00', '', 'sabores', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicional_producto`
--

CREATE TABLE IF NOT EXISTS `adicional_producto` (
  `id_ad_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_adicional` int(11) NOT NULL,
  PRIMARY KEY (`id_ad_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

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
(32, 16, 8),
(33, 22, 1),
(34, 22, 8),
(35, 22, 5),
(36, 22, 9),
(37, 22, 10),
(38, 22, 11),
(39, 22, 12),
(40, 23, 1),
(41, 23, 8),
(42, 23, 5),
(43, 23, 9),
(44, 23, 10),
(45, 23, 11),
(46, 23, 12),
(47, 27, 1),
(48, 27, 8),
(49, 27, 5),
(50, 27, 9),
(51, 27, 10),
(52, 27, 11),
(53, 27, 12),
(54, 29, 1),
(55, 29, 8),
(56, 29, 5),
(57, 29, 9),
(58, 29, 10),
(59, 29, 11),
(60, 29, 12),
(68, 31, 1),
(69, 31, 8),
(70, 31, 5),
(71, 31, 9),
(72, 31, 10),
(73, 31, 11),
(74, 31, 12),
(75, 32, 1),
(76, 32, 8),
(77, 32, 5),
(78, 32, 9),
(79, 32, 10),
(80, 32, 11),
(81, 32, 12),
(82, 33, 1),
(83, 33, 8),
(84, 33, 5),
(85, 33, 9),
(86, 33, 10),
(87, 33, 11),
(88, 33, 12),
(89, 34, 1),
(90, 34, 8),
(91, 34, 5),
(92, 34, 9),
(93, 34, 10),
(94, 34, 11),
(95, 34, 12),
(96, 35, 1),
(97, 35, 8),
(98, 35, 5),
(99, 35, 9),
(100, 35, 10),
(101, 35, 11),
(102, 35, 12),
(103, 36, 1),
(104, 36, 8),
(105, 36, 5),
(106, 36, 9),
(107, 36, 10),
(108, 36, 11),
(109, 36, 12),
(110, 37, 1),
(111, 37, 8),
(112, 37, 5),
(113, 37, 9),
(114, 37, 10),
(115, 37, 11),
(116, 37, 12),
(117, 38, 1),
(118, 38, 8),
(119, 38, 5),
(120, 38, 9),
(121, 38, 10),
(122, 38, 11),
(123, 38, 12),
(124, 39, 1),
(125, 39, 8),
(126, 39, 5),
(127, 39, 9),
(128, 39, 10),
(129, 39, 11),
(130, 39, 12),
(131, 40, 1),
(132, 40, 8),
(133, 40, 5),
(134, 40, 9),
(135, 40, 10),
(136, 40, 11),
(137, 40, 12),
(188, 49, 12),
(187, 49, 11),
(186, 49, 10),
(185, 49, 9),
(152, 55, 13),
(153, 56, 13),
(154, 57, 13),
(155, 58, 13),
(156, 59, 13),
(157, 60, 13),
(158, 61, 13),
(159, 64, 13),
(160, 65, 13),
(161, 66, 13),
(168, 30, 1),
(169, 30, 8),
(170, 30, 5),
(171, 30, 9),
(172, 30, 10),
(173, 30, 11),
(174, 30, 12),
(175, 78, 1),
(189, 25, 13),
(177, 68, 14),
(178, 68, 15),
(179, 68, 16),
(180, 68, 17),
(181, 69, 14),
(182, 69, 15),
(183, 69, 16),
(184, 69, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `posicion` int(11) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre`, `imagen`, `posicion`) VALUES
(5, 'Productos Estrella', 'estrella-01.jpg', 1),
(6, 'Sanduches', 'tradicional-cat.jpg', 3),
(7, 'Entradas / Picaditas', 'mixta-grande-cat.jpg', 4),
(8, 'Ensaladas', 'ensalada-cesar-cat.jpg', 5),
(9, 'Desayunos', 'desayuno.jpg', 6),
(10, 'Platters Sanduches Fiesta', 'platters-cat.jpg', 7),
(11, 'Bebidas / Jumbos', 'jugos-cat.jpg', 8),
(12, 'Cafés / Frozen Cafés', 'cafes-01.jpg', 9),
(13, 'Postres', 'tiramisu-cat.jpg', 10),
(14, 'Combos', 'combos-cat.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgproductos`
--

CREATE TABLE IF NOT EXISTS `imgproductos` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `alt` int(11) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `imgproductos`
--

INSERT INTO `imgproductos` (`id_img`, `id_prod`, `imagen`, `alt`) VALUES
(1, 1, 'imagen1', 1),
(2, 1, 'imagen1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produ`
--

CREATE TABLE IF NOT EXISTS `produ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `pos` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(350) NOT NULL,
  `valor` decimal(30,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_cat`, `pos`, `nombre`, `titulo`, `detalle`, `valor`, `imagen`) VALUES
(23, 5, 1, 'Javierino', '<strong>Un ICONO de la casa !</strong>', 'En 20 cm de Baguette, Jamón, queso, salami, pollo, tocino, lechuga, tomate, cebollas, y crema Espigal.', '4.99', 'Sanduche javierino.jpg'),
(24, 5, 3, 'Tropical Fruit', '<strong>El GIGANTE más colorido !</strong>', 'Nada mejor  que cuando se une la mora con la guanábana.', '3.50', 'Tropical fruit.JPG'),
(25, 5, 4, 'Chocolate Ambateño', 'El PREFERIDO de Ambato!', 'Un clásico ambateño con nuestro toque  inigualable de sabor.', '2.50', 'Chocolateamba.jpg'),
(26, 5, 5, 'Frozen Oreo', 'Sin duda IRRESISTIBLE!', 'Perfecta combinación granizada de helado de chocolate con  galletas  OREO más crema, rodeada de jarabe y chispitas de chocolate.', '3.50', 'frosenoreo.jpg'),
(27, 5, 2, 'Mexicano', 'Sabor Mexicano SIN PICANTE!', 'En 20cm de baguette, Pollo, queso, jamón, nachos, guacamole, lechuga, tomate, cebollas, crema Espigal.', '4.99', 'mexicano.jpg'),
(28, 5, 6, 'Mouse Maracuyá', 'El postre que debes PROBAR!', 'El toque acido del maracuyá con la textura y sabor único.', '1.25', 'mousse.jpg'),
(29, 6, 0, 'Tradicional', '(15 cm)', 'Jamón, salami, queso, lechuga, tomate, cebolla, crema El Espigal.  ', '2.50', 'Tradicional el espa_iol.JPG'),
(30, 6, 0, 'Pollo', '(15 cm) ', 'Pollo, queso, lechuga, tomate, crema El Espigal', '3.50', 'Tradicional de pollo.JPG'),
(31, 6, 0, 'Light', '(15 cm)', 'Doble porción de queso, champiñones, lechuga, tomate.', '3.25', 'Sanduche light.JPG'),
(32, 6, 0, 'BBQ', '(15 cm)', 'Tocino, pollo, queso, salsa BBQ, lechuga, tomate, crema El Espigal', '3.99', 'Sanduche BBQ.JPG'),
(33, 6, 0, 'Deluxe', '(15 cm)', 'Jamón, doble porción de queso, champiñones, lechuga, tomate, crema El Espigal.', '3.75', 'Sanduche deluxe.JPG'),
(34, 6, 0, ' Estudiantil', '(15 cm)', 'Jamón, queso, lechuga, tomate, crema El Espigal.', '2.00', 'estudiantil.jpg'),
(35, 6, 0, 'Javierino', '(20 cm)', 'Jamón, queso, salami, pollo, tocino, lechuga, tomate, crema El Espigal.', '4.99', 'Sanduche javierino.jpg'),
(36, 6, 0, 'Mexicano', '(20 cm)', 'Pollo, queso, jamón, nachos, guacamole, lechuga, tomate, crema El Espigal.', '4.99', 'mexicano.jpg'),
(37, 6, 0, 'Cubano', '(20 cm)', 'Jamón, queso, salami, pollo, lechuga, tomate, crema El Espigal.', '4.50', 'Sanduche cubano.JPG'),
(38, 6, 0, 'Pizza Italiano', '(20 cm)', 'Peperoni, queso, jamón, orégano, lechuga, tomate, crema El Espigal. ', '4.99', 'italiano.jpg'),
(40, 6, 0, 'Submarino', '(20 cm)', 'Doble porción de jamón, salami, queso, lechuga, tomate, crema El Espigal.', '3.99', 'Submarino el espa_iol.JPG'),
(41, 7, 0, 'Nachos con guacamole', '', 'Deliciosos nachos acompañados de guacamole', '3.50', 'Nachos-con-guacamole.jpg'),
(42, 7, 0, 'Picadita mixxta', '(GRANDE)', 'Combinación de embutidos acompañado de encurtidos, vegetales y crema Espigal.', '9.99', 'mixtagrande.jpg'),
(43, 7, 0, 'Picadita mixta', '(PEQUEÑA)', 'Combinación de embutidos acompañado de encurtidos, vegetales y crema Espigal.', '4.99', 'mixtapeque.jpg'),
(44, 8, 0, 'Ensalada César (Pollo)', '', 'Ensalada fresca con pollo, trozos de tocino, crutones, lechuga, tomate y nuestra deliciosa vinagreta de yogurt Cesar.', '4.99', 'ensaladacesar.jpg'),
(45, 8, 0, 'Ensalada Espigal', '', 'Acompañada de jamón, queso, lechuga, tomate, encurtidos, y nuestra inigualable crema Espigal.', '4.99', 'Ensaladaelespigal.jpg'),
(46, 13, 0, 'Mouse maracuyá', '', 'El Toque Acido Del Maracuyá Con La Textura Y Sabor Único.', '1.25', 'mousse.jpg'),
(47, 13, 0, 'Paleta de chocolate', '', 'Paleta', '0.50', 'paleta_chocolate.jpg'),
(48, 14, 0, 'Combo Espigal', '', 'Sanduche Tradicional + Nestea preparado+ Mouse maracuyá + Papas Chips', '5.50', 'Comboelespigal.jpg'),
(49, 14, 0, 'Combo Familiar', '', '4 sanduches tradicionales + 4 papas chips o mouse maracuyá + 1 Bebida grande.', '14.99', 'combos-06.jpg'),
(50, 9, 0, 'Desayuno Tradicional', '', 'Sanduche Estudiantil + Huevos Revueltos + Jugo naranja + Café Americano.', '5.50', 'des_tradicional.jpg'),
(51, 9, 0, 'Desayuno Ambateño', '', 'Chocolate + Tostada mixta (jamón y queso) + Huevos revueltos.', '4.99', 'des_ambateno.jpg'),
(52, 10, 0, 'Platter Ejecutivo', '(8 a 10 Personas)', '(Incluye 18 mini sanduches + 2 papas chips+ 1 bebida grande + 1 mousse)\r\nMini sanduches incluidos son: Javierino, Mexicano, BBQ, Deluxe, Submarino.\r\n*La variedad de mini sanduches no se pueden cambiar', '25.00', 'platerejecutivo.jpg'),
(53, 10, 0, 'Platter Amigos', '(3 a 5 Personas)', '(Incluye 10  mini sanduches + 1 papas chips + 3 jugos del valle)\r\nMini sanduches incluidos son: Tradicional, Pollo, Mexicano.\r\n*La variedad de mini sanduches no se pueden cambiar', '12.50', 'plattersamigo.jpg'),
(54, 10, 0, 'Platter Fiestón', '(6 a 8 personas)', '(Incluye 12  mini sanduches+ Nachos con guacamole + 1 Bebida Grande+ 1 mouse)\r\nMini sanduches incluidos son: Javierino, Mexicano, Submarino.\r\n*La variedad de mini sanduches no se pueden cambiar', '20.00', 'platter-fieston.jpg'),
(55, 12, 0, 'Cappuccino', '', 'Cappuccino', '2.00', 'cappuccino.jpg'),
(56, 12, 0, 'Chocolate Ambateño', '', 'Chocolate Ambateño', '2.50', 'Chocolateamba.jpg'),
(58, 12, 0, 'Cappuccino Vainilla ', '', 'Cappuccino Vainilla ', '2.50', 'capuccino-vainilla.jpg'),
(59, 12, 0, 'Mocachino', '', 'Mocachino', '2.50', 'Mocachino.JPG'),
(62, 12, 0, 'Café', '', 'Café', '1.25', 'Cafe.JPG'),
(63, 12, 0, 'Aromatica', '', 'Aromatica', '1.25', 'aromatica.jpg'),
(64, 12, 0, 'Café en Leche', '', 'Café en Leche', '1.75', 'cafeleche.jpg'),
(65, 12, 0, 'Frozen OREO', '', 'Granizado de helado de chocolate con las inigualables \r\ngalletas OREO(logo) con crema, rodeada de jarabe y chispitas de chocolate.', '3.50', 'frosenoreo.jpg'),
(66, 12, 0, 'Frapuccino', '', 'Granizado de café mezclado con helado de vainilla \r\ny crema, rodeada con jarabe de caramelo y canela', '3.50', 'Frappuccino.JPG'),
(67, 11, 0, 'Jugo Naranja', '', 'Jugos Naranja', '1.50', 'Jugo de naranja.jpg'),
(68, 11, 0, 'Jugos', '', 'Jugos', '1.90', 'jugomora.jpg'),
(69, 11, 0, 'Batidos', '', 'Batidos', '2.50', 'Batido2.jpg'),
(70, 11, 0, 'Gaseosas', '', 'Gaseosas', '1.00', 'cola.jpg'),
(71, 11, 0, 'Aguas', '', 'Aguas', '1.00', 'botellaagua.jpg'),
(72, 11, 0, 'Nestea', '(Preparado)', 'Nestea', '1.50', 'Nestea.JPG'),
(73, 11, 0, 'Fuze Tea', '(Botella)', 'Fuze Tea Botella', '1.50', 'fuseteabotella.jpg'),
(74, 11, 0, 'Jumbo Passion Fruit', '', 'Mezcla de fresa con naranja.', '3.50', 'passion fruit.JPG'),
(75, 11, 0, 'Jumbo Tropical Fruit', '', 'Mezcla de Mora con guanábana.', '3.50', 'Tropical fruit.JPG'),
(76, 11, 0, 'Jumbo Naranja', '', 'Jumbo Naranja', '3.50', 'JumboNaranja.jpg'),
(77, 11, 0, 'Jumbo Nestea', '', 'Jumbo Nestea', '3.00', 'fusetea.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(50) NOT NULL,
  `inicial` int(11) NOT NULL,
  `velt` int(11) NOT NULL,
  `vel` int(11) NOT NULL,
  `cortes` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `fil` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_slider`, `imagen`, `inicial`, `velt`, `vel`, `cortes`, `col`, `fil`, `tipo`) VALUES
(4, 'todoslosdias.jpg', 0, 0, 0, 0, 0, 0, 'desktop'),
(5, 'productosestrella.jpg', 0, 0, 0, 0, 0, 0, 'desktop'),
(10, 'desayuno.jpg', 0, 0, 0, 0, 0, 0, 'desktop'),
(11, 'slide1movil.jpg', 0, 0, 0, 0, 0, 0, 'movil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(100) NOT NULL,
  `tipo_user` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dir` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(200) NOT NULL,
  `referencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `ci`, `tipo_user`, `nombre`, `dir`, `tel`, `mail`, `referencia`, `pass`, `url`) VALUES
(1, '301270', 'admin', 'Julian Agudelo', 'La peninsula -  Calle Bogotá y Edmonton', '2445473', 'lupaclick@gmail.com', '100 mts antes del conjunto portal de ', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(2, '1805280300', '', '	emilia garces', 'ficoa', '032820710', 'ducbcbuewcbb@hotmail.com', 'frente a mutualista', '', ''),
(6, '1803972601', '', 'Javier Garces', 'Ovitos y Almandras Ficoa', '0995684101', 'jgraces15@hotmail.com', 'Atras del hotel la fornace al fondo de los ovitos calle sin salida', '', ''),
(12, '1803832789', '', 'Gabriel Barriga', 'Martinez 01-53 y Perez de Anda', '0995610853', 'gabobarriga@hotmail.com', 'Frente Casa musical', '', ''),
(42, '1752686459', '', 'juan David Agudelo', 'Portal de la viña / La peninsula', '4', 'david@hotmail.com', 'En la peninsula', '', ''),
(43, '1', '', 'julian', 'la', '4', 'j@jdsf.com', 'dsaj', '', ''),
(44, '7852', '', 'ju', 'ty', '1', 'j@jdsf.com', 'er', '', ''),
(45, '7946113', '', 'juli', 'dsfjasl', '4', 'j@jdsf.com', 'sdjfalj', '', ''),
(46, '159', '', 'Pedro', 'Ficoa', '1', '', 'djal', '', ''),
(47, '1801927151', '', 'Javiet Garces', 'Av. Cevallos y Lalama', '032820710', 'confort.tr@hotmail.com', 'Alado de imporcalza', '', ''),
(48, '1802283687', '', 'sandra  apraez', 'almendras', '032425022', 'sandraapraez@hotmail.com', 'tras hotel fornace', '', ''),
(49, '1804728747', '', 'JESSICA VILLACRES', 'MANUELITA SAENZ Y VICTOR HUGO', '0984424308', 'jessy.mvt15@gmail.com', 'DIAGONAL AL COLEGIO INDIAMERICA - JUNTO AL TERRENO BALDIO ESQUINERO CASA DE DOS PISOS Y TEJA', '', ''),
(50, '1804393062', '', 'maria fernanda hidal', 'ficoa los quindes tamarindo y maracuya 01-86', '2822752', 'fernihidalgo@hotmail.com', 'calle colegio de medicos vereda blanca', '', ''),
(51, '1804411252', '', 'Jose Ullco', 'Juan B. Vela y Martinez', '0983263909', 'ullcojose@gmail.com', 'El Rondador', '', ''),
(52, '1804257564', '', 'ESTHER MARIA', 'UNIVERSIDAD TECNICA DE AMBATO', '0967183598', 'maria_esther_j@hotmail.es', 'TANQUE DE CEPE', '', ''),
(53, '1802784908', '', 'Santiago Carranza', 'Guanabanas y cerezas esq. Ficoa', '032424835', 'scarranza@genimag.com', 'A 1 cuadra del parque los Quindes', '', ''),
(54, '1708459829', '', 'Héctor Echevarria Er', 'Los Colorados y Quingalumba', '0987986971', 'hfrancis_81@hotmail.com', 'Diagonal Cnt Natalia Vaca', '', ''),
(55, '1803372992', '', 'Gaby flores', 'Atahualpa y villacres', '2841835', '', 'Junto escuela pestalozzi', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
