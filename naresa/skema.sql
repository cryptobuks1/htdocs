-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2014 a las 15:08:47
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `skema`
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
  `subcat` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estilo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cat` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `des_corta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `des` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=266 ;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trab`, `subcat`, `estilo`, `detalle`, `cliente`, `nombre`, `servicio`, `cat`, `des_corta`, `des`, `enlace`, `imagen`, `alt`) VALUES
(1, 'Dormitorios', 'Contemporáneos', '', 'Casa Lurdes', 'Dormitorio doble', 'Equipamiento', 'Hogar', '', '', 'Si', 'dormitorio.jpg', 'Dormitorio dos ambientes'),
(2, 'Cocinas', 'Contemporáneas', '', 'Ministerio', 'Cocinas moderna', 'Equipamiento', 'Hogar', '', '', 'Si', 'cocina.jpg', 'Cocina moderna'),
(3, 'Divisiones de ambiente', '', '', 'Pichincha', 'División vidrio aluminio', 'Equipamiento', 'Oficina', '', '', 'No', '3.jpg', 'División en vidrio y Aluminio'),
(4, 'Baños', 'Contemporáneos', 'Equipamiento', 'Baño moderno rojo', 'Baño moderno rojo', 'Equipamiento', 'Hogar', 'Baño de diseño contemporaneo', '', 'No', 'banorojo.jpg', 'Baño Contemporáneo rojo'),
(5, 'Closets', 'Contemporáneos', 'Equipamiento', '', 'Closets Cerezo', 'Equipamiento', 'Hogar', 'Closet cerezo de tres cuerpos', '', 'No', 'closet.jpg', ''),
(9, 'Estaciones de trabajo', 'Sistemas', 'Equipamiento', 'Oficina', 'Estaciones de trabajo', 'Equipamiento', 'Oficina', '', '', 'No', 'oficianplomo.jpg', 'Estación de trabajo plomo contemporanea que constrasta con colores fuertes como el naranja'),
(10, 'Cafeterías y Restaurantes', '', 'Equipamiento', 'Comercial', 'Cafeterías y Restaurantes', 'Equipamiento', 'Comercial', '', '', 'No', 'cafeteria1.jpg', 'Cafetería Contemporánea Clásica con poltronas '),
(22, 'Mesas', 'Estudiantil', 'Tablero Negro, patas metálicas', 'julian', 'Mesas escolares negras', 'Equipamiento', 'Educacional', '', '', 'No', 'mesasescolares1.jpg', 'Mesa en tablero negro patas metálicas y son acoplables para formar una sola mesa. '),
(23, 'Taburetes', '', 'Cromados, tapizados negros y negros, con apoya pies y sistema para subir y bajar  ', '', 'Taburetes cromados', 'Equipamiento', 'Hogar', '', '', 'No', 'taburetesblanconegro.jpg', 'Taburetes Cromados blancos y negros con apoya pies'),
(24, 'Vestidores', 'Contemporáneos', '', '', 'Vestidor flotante', 'Equipamiento', 'Hogar', '', '', 'No', 'closet00.jpg', 'Vestidor moderno con paneles y cajones cerrados con vidrio'),
(25, '', '', '', 'Avipaz', 'Rodarchivo', 'Proyectos', '', 'Equipamiento de la oficina de contabilidad de AVipaz', '', 'Si', 'rodarchivo.jpg', 'Rodarchivo color cerezo con estructura metálica interna negra'),
(26, 'Sillonería', 'Presidente', '', '', 'Sillón Canciller 1127', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonCanciller11-27.jpg', 'Sillón tapizado en cuerina y apolla brazos en madera, Canciller'),
(27, 'Sillonería', 'Presidente', '', '', 'Sillón Canciller 1165', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonCanciller11-65.jpg', 'Sillón canciller tapizado en cuerina con apolla brazos de madera'),
(28, 'Sillonería', 'Presidente', '', '', 'Sillón Canciller 1070', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonCanciller1070.jpg', 'Sillón canciller tapizado en cuerina con apolla brazos de madera'),
(29, 'Sillonería', 'Confidente', '', '', 'Sillón 8078 Malla Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonCon 8078MallaEcoBaseCrom.jpg', 'Sillón con malla y base cromada'),
(30, 'Sillonería', 'Confidente', '', '', 'Sillon 8012', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConf8012BrCrom.jpg', 'Sillón con base cromada y tapizado con cuerina'),
(31, 'Sillonería', 'Confidente', '', '', 'Sillón Eco 1101', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfEcoCrom1101.jpg', 'Sillón con base cromada y tapizado con cuerina'),
(32, 'Sillonería', 'Confidente', '', '', 'Sillón malla Eco 1101-1', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfEcoMallaCrom1101-1.jpg', 'Sillón con base cromada y tapizado con cuerina'),
(33, 'Sillonería', 'Confidente', '', '', 'Sillon Confidente 11-90', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfident 11-90(02).jpg', 'Sillón canciller tapizado en cuerina con apolla brazos de madera'),
(34, 'Sillonería', 'Confidente', '', '', 'Sillón Confidente 11-58', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfidente11-58.jpg', 'Sillón con base cromada y tapizado con cuerina'),
(35, 'Sillonería', 'Confidente', '', '', 'Sillón Confidente 70-10(02E)', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfidente70-10(02E).jpg', 'Sillón con base cromada y tapizado con cuerina'),
(36, 'Sillonería', 'Confidente', '', '', 'Sillón Confidente 8028', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfidente8028.jpg', 'Sillón con base cromada y tapizado con cuerina'),
(37, 'Sillonería', 'Confidente', '', '', 'Sillón Confidente B02E', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonConfidenteB02E.jpg', 'Sillón confidente base cromada color blanco'),
(38, 'Sillonería', 'Operativas', '', '', 'Sillón Ejecutivo 472', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonEjecutivo472.jpg', 'Silla ejecutiva con malla base plastica'),
(39, 'Sillonería', 'Ejecutivas', '', '', 'Sillón Ejecutivo 9031', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonEjecutivo9031Malla.jpg', 'Silla ejecutiva con malla base plastica'),
(40, 'Sillonería', 'Ejecutivas', '', '', 'Sillón Ejecutivo 6072', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonEjecutivoAlto6072.jpg', 'Silla ejecutiva base plastica'),
(41, 'Sillonería', 'Presidente', '', '', 'Sillón Euforia 01 Presidente', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonEuforia01PteCuerina.jpg', 'Sillón presidente apoya brazos plasticos'),
(42, 'Sillonería', 'Ejecutivas', '', '', 'Sillón Euforia 07 Gerente', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonEuforia07Gte.jpg', 'Sillón gerente en cuerina y apoya brazos plasticos'),
(43, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente 11-58', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente11-58.jpg', 'Sillón con brazos y base cromados'),
(44, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente 70-10 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente70-10(02E).jpg', 'Sillón brazos y base cromados con espaldar de malla'),
(45, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente 1102', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente1102Crom.jpg', 'Sillón gerente brazos plásticos y base cromada'),
(46, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente 1102 NY', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente1102Ny.jpg', 'Sillón gerente brazos y base plástica'),
(47, 'Estaciones de trabajo', 'Sistemas', '', '', 'Estación de trabajo biblioteca', 'Equipamiento', 'Oficina', '', '', 'No', 'escritoriobiblioteca.jpg', 'Estación de trabajo de madera con biblioteca'),
(49, 'Archivación', 'Archivadores', '', '', 'Archivador aéreo', 'Equipamiento', 'Oficina', '', '', 'No', 'archivador_aereo.jpg', 'Archivador aéreo'),
(50, 'Archivación', 'Archivadores', '', '', 'Archivador carpetas colgantes', 'Equipamiento', 'Oficina', '', '', 'No', 'Armario_para_archivadores_colgantes_.jpg', 'Archivar de piso cuatro cajones para carpetas colgantes'),
(51, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca oficina Jesper', 'Equipamiento', 'Oficina', '', '', 'No', 'biblioteca-para-oficinas-jesper-office.jpg', 'Biblioteca para oficina café de 2 cuerpos y 4 puertas'),
(52, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca', 'Equipamiento', 'Oficina', '', '', 'No', 'biblioteca-plomo.jpg', 'Biblioteca grande con con muchas divisiones'),
(53, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca altas oficina', 'Equipamiento', 'Oficina', '', '', 'No', 'bibliotecas-altas-oficina.jpg', 'Biblioteca plomo con divisiones y sin puerta central y puestas al rededor'),
(54, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca grade madera', 'Equipamiento', 'Oficina', '', '', 'No', 'bibliotecas-oficina.jpg', 'Biblioteca grande de madera para oficina'),
(55, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca un cuerpo', 'Equipamiento', 'Oficina', '', '', 'No', 'biblioteca-uncuerpo.jpg', 'Bibliotecas altas de un solo cuerpo'),
(56, 'Counter', 'Recto', '', '', 'Counter lineal', 'Equipamiento', 'Oficina', '', '', 'No', 'design-reception-counter-z2-italy.jpg', 'Counter lineal blanco con café'),
(57, 'Counter', 'Curvo', '', '', 'Counter oficina completa', 'Equipamiento', 'Oficina', '', '', 'No', 'counter-recepcion-oficinas.jpg', 'Counter largo para oficina completa color rojo'),
(58, 'Counter', 'Curvo', '', '', 'Counter CT', 'Equipamiento', 'Oficina', '', '', 'No', 'COUNTER CT 001.jpg', 'Counter curvo con terminado metalizado'),
(59, 'Counter', 'Recto', '', '', 'Counter recto vidrio', 'Equipamiento', 'Oficina', '', '', 'No', 'counter- recepcion-vidrio.jpg', 'Counter recto con vidrio'),
(60, 'Counter', 'Recto', '', '', 'Counter recto 2 niveles', 'Equipamiento', 'Oficina', '', '', 'No', 'counter-003.jpg', 'Counter recto con vidrio en 2 niveles e incrustaciones metalizadas'),
(61, 'Counter', 'Curvo', '', '', 'Counter curvo', 'Equipamiento', 'Oficina', '', '', 'No', 'counter-curvo.jpg', 'Counter curvo grande'),
(62, 'Counter', 'Curvo', '', '', 'Counter semi curvo', 'Equipamiento', 'Oficina', '', '', 'No', 'counter-curvo-blanco.jpg', 'Counter semicurvo blanco'),
(65, 'Sillonería', 'Confidente', '', '', 'Butaca Canciller 328 Cuerina', 'Equipamiento', 'Oficina', '', '', 'No', 'ButacaCanciller328Cuerina.jpg', 'Silla confidente tipo canciller con brazos de madera y tapizado en cuerina'),
(66, 'Sillonería', 'Confidente', '', '', 'Silla 203', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla203.jpg', 'Silla confidente en colores, plástica y estructura metalica'),
(67, 'Sillonería', 'Confidente', '', '', 'Silla 203 Cuerina', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla203TapzCuer.jpg', 'Silla confidente tapizada con cuerina estructura metalica'),
(68, 'Sillonería', 'Operativas', '', '', 'Silla 206', 'Equipamiento', 'Oficina', '', '', 'No', 'silla206.jpg', 'Silla operativa con brazos y base plástica en cuerina'),
(69, 'Sillonería', 'Confidente', '', '', 'Silla 209 Guarderia', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla209Guarderia.jpg', 'Silla Plástica diferentes colores con estructura metalica'),
(70, 'Sillonería', 'Confidente', '', '', 'Silla 238', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla238.jpg', 'Silla en confidente en cuerina estructura metalica'),
(71, 'Sillonería', 'Ejecutivas', '', '', 'Silla 601 EcoC B Tapz', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla601EcoCBTapz.jpg', 'Silla en cuerina con brazos y basepálstica con doble palanca'),
(72, 'Sillonería', 'Operativas', '', '', 'Silla 603 Eco CB Tapz', 'Equipamiento', 'Oficina', '', '', 'No', 'Silla603EcoCBTapz.jpg', 'Silla en cuerina con brazos y base plástica operativa'),
(73, 'Sillonería', 'Ejecutivas', '', '', 'Silla Ejecutiva 153PU', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEjecutiva153PU.jpg', 'Silla ejecutiva con brazos y base plástica'),
(74, 'Sillonería', 'Ejecutivas', '', '', 'Silla Ejecutiva 959 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEjecutiva959Malla.jpg', 'Silla ejecutiva con brazos y base plástica con espaldar de malla'),
(75, 'Sillonería', 'Ejecutivas', '', '', 'Silla Ejecutiva 1203 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEjecutiva1203Malla.jpg', 'Silla ejecutiva con brazos y base plástica con espaldar de malla'),
(76, 'Sillonería', 'Ejecutivas', '', '', 'Silla Ejecutiva 8335 Malla Oval', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEjecutiva8335MallaOval.jpg', 'Silla ejecutiva con brazos y base plástica con espaldar ovalado de malla'),
(77, 'Sillonería', 'Ejecutivas', '', '', 'Silla Ejecutiva 8369', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEjecutiva8369.jpg', 'Silla ejecutiva con brazos plástica y base cromada con espaldar de malla'),
(78, 'Sillonería', 'Operativas', '', '', 'Silla Estudiante 052 Malla Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaEstudiante052MallaEco.jpg', 'Silla operativa sin brasos base plástica con espaldar de malla'),
(79, 'Sillonería', 'Operativas', '', '', 'Silla focus', 'Equipamiento', 'Oficina', '', '', 'No', 'sillafocus.jpg', 'Silla operativa con brazos y base plástica en cuerina'),
(80, 'Sillonería', 'Operativas', '', '', 'Silla Giratoria 406 Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaGiratoria406Eco.jpg', 'Silla operativa plástica en colores sin brazos y base plástica'),
(81, 'Sillonería', 'Operativas', '', '', 'Silla Giratoria Atlanta Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaGiratoriaAtlantaEco.jpg', 'Silla operativa plástica negra sin brazos y base plástica'),
(82, 'Sillonería', 'Confidente', '', '', 'Silla Graffit iEco C-B tapizada', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaGraffitiEcoC-Btapizada.jpg', 'Silla confidente tapizada'),
(83, 'Sillonería', 'Confidente', '', '', 'Silla ISO Estr Neg-Alum', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaISOEstrNeg-Alum.jpg', 'Silla confidente plástica con estructura en aluminio'),
(84, 'Sillonería', 'Confidente', '', '', 'Silla Madera 002T053T', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaMadera002T053T.jpg', 'Silla madera estructura tubo cromado'),
(85, 'Sillonería', 'Confidente', '', '', 'Silla Madera 007T Haya', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaMadera007THaya.jpg', 'Silla madera dolores estructura tubo cromado'),
(86, 'Sillonería', 'Confidente', '', '', 'Silla Madera 013T', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaMadera013T.jpg', 'Silla madera estructura tubo cromado'),
(87, 'Sillonería', 'Confidente', '', '', 'Silla Madera 046T', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaMadera046T.jpg', 'Silla madera estructura tubo cromado'),
(88, 'Sillonería', 'Confidente', '', '', 'Silla MALBAE strCrom', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaMALBAEstrCrom.jpg', 'Silla plástica con estructura cromada'),
(89, 'Sillonería', 'Ejecutivas', '', '', 'Silla Operativa 006 Hard', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaOperativa006Hard.jpg', 'Silla ejecutiva brazos y base cromadas '),
(90, 'Sillonería', 'Operativas', '', '', 'Silla Operativa 2319 C-B CromHG', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaOperativa2319C-BCromHG.jpg', 'Silla operativa con brazos plásticos y base cromada con espaldar en malla'),
(91, 'Taburetes', '', '', '', 'Silla para Bar 1019 Cuer Neg', 'Equipamiento', 'Hogar', '', '', 'No', 'SillaparaBar1019CuerNeg.jpg', 'Taburete para bar en cuero'),
(92, 'Taburetes', '', '', '', 'Silla para Bar 1019 ', 'Equipamiento', 'Hogar', '', '', 'No', 'SillaparaBar1019PlastVariosColores.jpg', 'Silla para bar plástica varios colores'),
(93, 'Taburetes', '', '', '', 'Silla para Bar 1212 Alta', 'Equipamiento', 'Hogar', '', '', 'No', 'SillaparaBar1212AltaPlastVariosColores.jpg', 'Silla para bar plástica varios colores'),
(94, 'Sillonería', 'Operativas', '', '', 'Silla pilot med', 'Equipamiento', 'Oficina', '', '', 'No', 'sillapilotmed.jpg', 'Silla operativa brazos y base plásticos tapizado en tela'),
(95, 'Sillonería', 'Confidente', '', '', 'Silla Plegable 107', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaPlegable107.jpg', 'Silla confidente tapizada plegable'),
(96, 'Sillonería', 'Confidente', '', '', 'Silla Prisma ECO ', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaPrismaECOEstrRYCrom.jpg', 'Silla confidente plástica estructura metalica'),
(97, 'Sillonería', 'Confidente', '', '', 'Silla Prisma Inter', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaPrismaInter.jpg', 'Silla confidente plástica estructura metalica'),
(98, 'Sillonería', 'Confidente', '', '', 'Silla Prisma Ital3 pcs ', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaPrismaItal3pcsEstrNeg-Alum.jpg', 'Silla plástica estructura aluminio'),
(99, 'Sillonería', 'Operativas', '', '', 'Silla Secretaria 8348 Malla Eco C-B', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaSecretaria8348MallaEcoC-B.jpg', 'Silla para secretaria con espaldar de malla brazos y base plásticas'),
(100, 'Sillonería', 'Operativas', '', '', 'Silla Secretaria B4AC-B Negra', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaSecretariaB4AC-BNegra.jpg', 'Silla operativa encuerina brazos y base plásticas'),
(101, 'Sillonería', 'Confidente', '', '', 'Silla Visita 05SB Pintura', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisita05SBPintura.jpg', 'Silla confidente espaldar en malla con estructura metálica pintada'),
(102, 'Sillonería', 'Confidente', '', '', 'Silla Visita 37 Hard PVC Crom', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisita37HardPVCCrom.jpg', 'Silla con brazos y estructura cromada'),
(103, 'Sillonería', 'Confidente', '', '', 'Silla Visita 716 Pintura', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisita716Pintura.jpg', 'Silla confidente plástica con estructura pintada'),
(104, 'Sillonería', 'Confidente', '', '', 'Silla Visita 3028A', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisita3028A.jpg', 'Silla confidente plástica con estructura pintada'),
(105, 'Sillonería', 'Confidente', '', '', 'Silla Visita 3041', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisita3041.jpg', 'Silla confidente plástica con estructura pintada'),
(106, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 1F1 ', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco1F1HardPVCCromC-B.jpg', 'Silla confidente en PVC con brazos y estructura cromada'),
(107, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 3R', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco3RHardPVCCrom.jpg', 'Silla confidente en PVC sin brazos y estructura cromada'),
(108, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 114', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco114Crom.jpg', 'Silla sin brazos en tapizada estructura cromada'),
(109, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 117', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco117Crom.jpg', 'Silla confidente sin brazos tapizada estructura metálica'),
(110, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 214', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco214.jpg', 'Silla plástica estructura metálica sin brazos'),
(111, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco 1202', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEco1202Crom.jpg', 'Silla confidente tapizada con cuerina estructura metalica'),
(112, 'Sillonería', 'Confidente', '', '', 'Silla Visita Eco Iso 3028', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaEcoIsoMallaCrom3028.jpg', 'Silla sin brazos y estructura cromada'),
(113, 'Sillonería', 'Confidente', '', '', 'Silla Visita Iso Eco Esp', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaIsoEcoEsp.jpg', 'Silla confidente plástica estructura metalica'),
(114, 'Sillonería', 'Confidente', '', '', 'Silla Visita Iso EcoTapizada', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaIsoEcoTapizada.jpg', 'Silla confidente tapizada con cuerina estructura metalica'),
(115, 'Sillonería', 'Confidente', '', '', 'Silla Visita Prisma Eco 616EW', 'Equipamiento', 'Oficina', '', '', 'No', 'SillaVisitaPrismaEco616EW.jpg', 'Silla confidente plástica estructura metalica'),
(116, 'Sillonería', 'Presidente', '', '', 'Sillon Gerente 1216 CHL', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente1216CHL.jpg', 'Sillón presidente con brazos y base cromados tapizada en cuerina'),
(117, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente 9032 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerente9032Malla.jpg', 'Silla ejecutiva con brazos y base espaldar en malla'),
(118, 'Sillonería', 'Presidente', '', '', 'Sillón Gerente B02E', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerenteB02E.jpg', 'Silla brazos y base  cromada tapiz color blanco'),
(119, 'Sillonería', 'Ejecutivas', '', '', 'Sillón Gerente Malla 059', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGerenteMalla059.jpg', 'Silla con espaldar de malla y brazos y base plástica'),
(120, 'Sillonería', 'Presidente', '', '', 'Sillón Gte 8012', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGte8012.jpg', 'Sillón Gerente tapizado '),
(121, 'Sillonería', 'Presidente', '', '', 'Sillón Gte 8078 ', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGte8078CuerinaEcoBaseCrom.jpg', 'Sillón gerente tapizado base cromada'),
(122, 'Sillonería', 'Presidente', '', '', 'Sillon Gte 8078 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGte8078MallaEcoBaseCrom.jpg', 'Sillón con base cromada y espaldar en malla'),
(123, 'Sillonería', 'Presidente', '', '', 'Sillón Gte BramaII 8012', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonGteBramaII8012.jpg', 'Sillón gerente brazos en madera base plástica'),
(124, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 11-58', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente11-58.jpg', 'Sillón presidente con brazos y base cromados tapizada en cuerina'),
(125, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 11-90(02)', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente70-10(02E).jpg', 'Sillón presidente con brazos y base cromados en malla'),
(126, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 236HG', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente236HG.jpg', 'Sillón presidente con brazos y base plásticas tapizado en cuerina con apollacabeza'),
(127, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 531HG', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente531HG.jpg', 'Sillón tapizado en cuerina con brazos plásticos y base cromada'),
(128, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 588', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente588.jpg', 'Sillón presidente tapizada brazos plomo plásticos y base cromada'),
(129, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 603', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente603.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(130, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 604H', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente604H.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(131, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 621', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente621.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(132, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 623', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente623.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado en cuaerina'),
(133, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 952', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente952.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado en cuaerina'),
(134, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 1161', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente8038.jpg', 'Sillón presidente brazos y base plásticos, tapizado cuerina color '),
(135, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 7001 Cont', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente7001Cont.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado en cuaerina'),
(136, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 8028', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente9021.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado cuerina'),
(137, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 8038', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente8038.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado en cuerina color'),
(138, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 8040', 'Equipamiento', 'Oficina', '', '', 'No', 'sillonPresidente8040.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(139, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente 9021', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidente9021.jpg', 'Sillón presidente brazos y base plásticos plateado, tapizado en cuerina'),
(140, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente Malla 059', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidenteMalla059.jpg', 'Sillón presidente brazos y base plásticos, en malla con apollacabeza'),
(141, 'Sillonería', 'Presidente', '', '', 'Sillón Presidente V1', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPresidenteV1.jpg', 'Sillón presidente con brazos plásticos plateados y base cromada'),
(142, 'Sillonería', 'Presidente', '', '', 'Sillón Pte 6037 Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPte6037EcoBaseCrom.jpg', 'Sillón presidente brazos plásticos y base cromada'),
(143, 'Sillonería', 'Presidente', '', '', 'Sillón Pte 8011', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPte8011.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(144, 'Sillonería', 'Presidente', '', '', 'Sillón Pte 8011', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPte8011.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(145, 'Sillonería', 'Presidente', '', '', 'Sillón Pte 8025 Eco', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPte8025Eco.jpg', 'Sillón presidente brazos y base plásticas tapizado cuerina'),
(146, 'Sillonería', 'Presidente', '', '', 'Sillon Pte 8035 Malla', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonPte8035MallaEcoBaseCrom.jpg', 'Sillón presidente brazos y base cromadas en malla'),
(147, 'Sillonería', 'Presidente', '', '', 'Sillón Viera Gerente 701-1', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonVieraGerente701-1.jpg', 'Sillón Gerente espaldar malla base y brazos plássticos'),
(148, 'Sillonería', 'Presidente', '', '', 'Sillón Viera Presidente 701', 'Equipamiento', 'Oficina', '', '', 'No', 'SillonVieraPresidente701.jpg', 'Sillón presidente brazos plásticos y base cromada, aerodinamica'),
(149, 'Sillonería', 'Tandems', '', '', 'Sofade Espera Bip Canciller', 'Equipamiento', 'Oficina', '', '', 'No', 'SofadeEsperaBipCanciller.jpg', 'Sofá canciller de espera de 2 puestos en cuerina'),
(150, 'Sillonería', 'Tandems', '', '', 'Sofá de Espera Trip Canciller', 'Equipamiento', 'Oficina', '', '', 'No', 'SofadeEsperaTripCanciller.jpg', 'Sofá canciller de espera de 3 puestos en cuerina'),
(151, 'Sillonería', 'Tandems', '', '', 'Sofade Espera Unip Canciller', 'Equipamiento', 'Oficina', '', '', 'No', 'SofadeEsperaUnipCanciller.jpg', 'Sofá canciller de espera de 1 puesto'),
(152, 'Sillonería', 'Tandems', '', '', 'Sofá Relax 6085', 'Equipamiento', 'Oficina', '', '', 'No', 'SofaRelax6085.jpg', 'Sofá relax de cuerina'),
(153, 'Sillonería', 'Tandems', '', '', 'Tandem 203 ECO', 'Equipamiento', 'Oficina', '', '', 'No', 'Tandem203ECO.jpg', 'Tandem plástico estructura metálica 3 puestos'),
(154, 'Sillonería', 'Tandems', '', '', 'Tandem 203ECO Bi', 'Equipamiento', 'Oficina', '', '', 'No', 'Tandem203ECOBi-PTapzCuerNeg.jpg', 'Tandem tapizado estructura metálica bipersonal'),
(155, 'Sillonería', 'Tandems', '', '', 'Tandem 238 ECO', 'Equipamiento', 'Oficina', '', '', 'No', 'Tandem238ECOBi-PTapz.jpg', 'Tandem tapizado estructura metálica pintada'),
(156, 'Sillonería', 'Tandems', '', '', 'Tandem 406 ECO', 'Equipamiento', 'Oficina', '', '', 'No', 'Tandem406ECO.jpg', 'Tandem plástico con estructura metálica tripersonal'),
(157, 'Sillonería', 'Tandems', '', '', 'Tandem Aeropuerto G Crom', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemAeropuertoGCrom.jpg', 'Tandem cromado bipersonal'),
(158, 'Sillonería', 'Tandems', '', '', 'Tandem Aeropuerto G CromT', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemAeropuertoGCromT.jpg', 'Tandem tripersonal cromado con tapizado'),
(159, 'Sillonería', 'Tandems', '', '', 'Tandem ATLANTA', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemATLANTA.jpg', 'Tandem plástico con estructura metálica pintada'),
(160, 'Sillonería', 'Tandems', '', '', 'Tandem ATLANTA ECO', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemATLANTAECO.jpg', 'Tandem plástico con estructura metálica pintada bipersonal'),
(161, 'Sillonería', 'Tandems', '', '', 'Tandem BIO', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemBIO.jpg', 'Tandem plástico con estructura metálica pintada'),
(162, 'Sillonería', 'Tandems', '', '', 'Tandem Butterfly 605', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemButterfly605.jpg', 'Tanem plástico con estructura cromada'),
(163, 'Sillonería', 'Tandems', '', '', 'Tandem MOVIE', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemMOVIE.jpg', 'Tandem plástico estructura cromada bipersonal'),
(164, 'Sillonería', 'Tandems', '', '', 'Tandem MOVIE tapiz', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemMOVIEtapiz.jpg', 'Tandem tapizado con estructura cromada'),
(165, 'Sillonería', 'Tandems', '', '', 'Tandem PRISMA ECO', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemPRISMAECO.jpg', 'Tandem plástico con estructura metálica pintada'),
(166, 'Sillonería', 'Tandems', '', '', 'Tandem PRISMA ITAL', 'Equipamiento', 'Oficina', '', '', 'No', 'TandemPRISMAITAL.jpg', 'Tandem tapizado con estructura metálica pintada'),
(167, '', '', 'Tablero color blanco y magenta y vidrio', 'Magenta', 'Isla para Mall', 'Proyectos', '', 'Esta es una Isla que fue diseñada para la venta de accesorios', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T', 'Si', 'magenta.jpg', 'Isla para accesorios en tablero magenta y blanco con aviso'),
(169, 'Estaciones de trabajo', 'Escritorios', '', '', 'Escritorio Plus Operativo', 'Equipamiento', 'Oficina', '', '', 'No', 'escritorio-plus-oparativo.jpg', 'Escritorio en tablero aglomerado con cajones'),
(170, 'Estaciones de trabajo', 'Sistemas', '', '', 'Escritorio madera', 'Equipamiento', 'Oficina', '', '', 'No', 'escritoriomadera.jpg', 'Sistema en tablero aglomerado con credenza con repisas en laterales'),
(171, 'Estaciones de trabajo', 'Sistemas', '', '', 'Escritorio negro con plata', 'Equipamiento', 'Oficina', '', '', 'No', 'escritorionegroconplata.jpg', 'Sistema lineal con Apliques en aluminio'),
(172, 'Estaciones de trabajo', 'Sistemas', '', '', 'Escritorio plomo base metal', 'Equipamiento', 'Oficina', '', '', 'No', 'escritorioplomobasemetal.jpg', 'Sistema elaborado en tablero aglomerado de efecto aluminio'),
(173, 'Estaciones de trabajo', 'Escritorios', '', '', 'Escritorio plomo', 'Equipamiento', 'Oficina', '', '', 'No', 'escritoriplomo.jpg', 'Escritorio frontal con tablero aglomerado de efecto aluminio.'),
(174, 'Estaciones de trabajo', 'Escritorios', '', '', 'Estudiantil', 'Equipamiento', 'Oficina', '', '', 'No', 'Estudiantil.jpg', 'Escritorio tradicional estudiantil con dos cajones de servicio'),
(175, 'Estaciones de trabajo', 'Escritorios', '', '', 'Gerencial-duo', 'Equipamiento', 'Oficina', '', '', 'No', 'gerencial-duo.jpg', 'Escritorio de doble uso, para oficina y tambien como centro de entretenimiento'),
(176, 'Estaciones de trabajo', 'Escritorios', '', '', 'Gerencial premium', 'Equipamiento', 'Oficina', '', '', 'No', 'gerencial-premium.jpg', 'Escritorio lineal con protector para el tablero y accesorios cromados'),
(177, 'Estaciones de trabajo', 'Escritorios', '', '', 'Operativo doble nivel', 'Equipamiento', 'Oficina', '', '', 'No', 'operativo-doblenivel.jpg', 'Escritorio con doble nivel, tablero mixto'),
(178, 'Estaciones de trabajo', 'Escritorios', '', '', 'Escritorio Operativo Agatha', 'Equipamiento', 'Oficina', '', '', 'No', 'operativo-escritorio-agatha.jpg', 'Escritorio en tablero blanco brillante con accesorios cromados'),
(179, 'Estaciones de trabajo', 'Escritorios', '', '', 'Operativo Rojo Formica', 'Equipamiento', 'Oficina', '', '', 'No', 'operativo-rojoformica.jpg', 'Escritorio lineal en formica para un acabado brillante con cajones'),
(181, 'Archivación', 'Archivadores', '', '', 'Archivador 8 gavetas', 'Equipamiento', 'Oficina', '', '', 'No', 'archivador-8gabetas-carpeta-colgante.jpg', 'Archivador de 8 gavetas elaborado en tablero aglomerado, para carpeta colgante'),
(182, 'Archivación', 'Archivadores', '', '', 'Archivadores Verticales', 'Equipamiento', 'Oficina', '', '', 'No', 'archivadores-metalicos-verticales.jpg', 'Archivadores metalicos verticales con pintura electrostática a elección'),
(184, 'Archivación', 'Archivadores', '', '', 'Archivadores para planos', 'Equipamiento', 'Oficina', '', '', 'No', 'archivadores-para-planos-01.jpg', 'Archivador metalico con llave de seguridad para almacenamiento de planos'),
(187, 'Archivación', 'Archivadores', '', '', 'Arturito', 'Equipamiento', 'Oficina', '', '', 'No', 'arturito.jpg', 'Arcivador de 3 gavetas en lamina acerada'),
(188, 'Archivación', 'Archivadores', '', '', 'Archivador de 4 Gavetas', 'Equipamiento', 'Oficina', '', '', 'No', 'archivador_cuatro_gavetas_gris-rieldeextension.jpg', 'Archivador metalico de 4 gavetas con riel de extensión'),
(189, 'Archivación', 'Archivadores', '', '', 'Archivador de 3 gavetas', 'Equipamiento', 'Oficina', '', '', 'No', 'archivar-3gavetas-frentetablero.jpg', 'Archivador de 3 Gavetas con estructura metalica y frente en tablero aglomerado'),
(191, 'Archivación', 'Archivadores', '', '', 'Archivador 4 Gavetas - Tablero', 'Equipamiento', 'Oficina', '', '', 'No', '4 gav. tablero.jpg', 'Archivador de 4 gavetas con estructura metalica y puertas en tablero'),
(192, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca Loft', 'Equipamiento', 'Oficina', '', '', 'No', 'biblioteca-loft-91.jpg', 'Biblioteca estilo loft, elaborada en tablero aglomerado mixto'),
(193, 'Archivación', 'Bibliotecas', '', '', 'Biblioteca Moderna -Panel Vidrio', 'Equipamiento', 'Oficina', '', '', 'No', 'biblioteca-moderna-paneles-vidrio-4427-6293303.jpg', 'Biblioteca con paneles de vidrio'),
(195, 'Divisiones de ambiente', '', '', '', 'Division Modular - Acero Inoxidable', 'Equipamiento', 'Oficina', '', '', 'No', 'descarga.jpg', 'Division modular en acero inoxidable y tablero'),
(196, 'Divisiones de ambiente', '', '', '', 'Division Modular - Aluminio Mixto', 'Equipamiento', 'Oficina', '', '', 'No', 'division-ambiente-aluminio-bicolor.jpg', 'Division modular en aluminio bicolor'),
(197, 'Divisiones de ambiente', '', '', '', 'Division Modular - Cristal y Aluminio', 'Equipamiento', 'Oficina', '', '', 'No', 'division-de-ambiente-en-cristal-y-aluminio-4939-MLA3954855479_032013-O.jpg', 'Division modular en Cristal de color y Aluminio'),
(198, 'Divisiones de ambiente', '', '', '', 'Division Modular - Vidrio Esmerilado', 'Equipamiento', 'Oficina', '', '', 'No', 'images (2).jpg', 'Division modular en vidrio esmerilado total, acabados en aluminio'),
(199, 'Archivación', 'Rodarchivo', '', '', 'Rodarchivo carp colgante ', 'Equipamiento', 'Oficina', '', '', 'No', 'rodarchivo-carpetacolganteyfolder.jpg', 'Rodarchivo para carpeta y folder colgante'),
(203, 'Divisiones de ambiente', '', '', '', 'División tablero mixta', 'Equipamiento', 'Oficina', '', '', 'No', 'images (4).jpg', 'División tablero mixta'),
(204, 'Divisiones de ambiente', '', '', '', 'Paneleria a media atura', 'Equipamiento', 'Oficina', '', '', 'No', 'paneleria-a-medialatura.jpg', 'División media altura tablero'),
(205, 'Divisiones de ambiente', '', '', '', 'Paneleria combinada tablero vidrio', 'Equipamiento', 'Oficina', '', '', 'No', 'paneleria-combinada-tablero-vidrio.jpg', 'Paneleria dividida tablero vidrio'),
(208, 'Divisiones de ambiente', '', '', '', 'Paneleria mixta textil', 'Equipamiento', 'Oficina', '', '', 'No', 'paneleria-mixta-textil.jpg', 'Paneleria mixta textil'),
(210, 'Divisiones de ambiente', '', '', '', 'Panelería vidrio arenado', 'Equipamiento', 'Oficina', '', '', 'No', 'paneleria-vidrio-arenado.jpg', 'Panelería vidrio arenado'),
(211, 'Mesas', 'De centro', '', '', 'Mesa dse-3', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-3.jpg', 'Mesa de centro de vidrio 3 niveles'),
(212, 'Mesas', 'De centro', '', '', 'Mesa dse-3b', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-3b.jpg', 'Mesa de centro de vidrio 3 niveles'),
(213, 'Mesas', 'De centro', '', '', 'Mesa dse-5-1', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-5-1.jpg', 'Mesa de centro de vidrio 2 niveles'),
(214, 'Mesas', 'De centro', '', '', 'Mesa dse-5-m', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-5-m.jpg', 'Mesa 3 niveles primeros niveles madera'),
(215, 'Mesas', 'Reunión', '', '', 'Amelia-nd-17a', 'Equipamiento', 'Oficina', '', '', 'No', 'amelia-nd-17a.jpg', 'Mesa vidrio patas negras'),
(216, 'Mesas', 'Reunión', '', '', 'Beer-s-033', 'Equipamiento', 'Oficina', '', '', 'No', 'beer-s-033.jpg', 'Mesa tres patas de pasta redonda'),
(217, 'Mesas', 'Reunión', '', '', 'Cassia rdt 011', 'Equipamiento', 'Oficina', '', '', 'No', 'cassia-rdt-011.jpg', 'Mesa de vidrio negro con base metálica rectangular'),
(218, 'Mesas', 'Reunión', '', '', 'Dali-nd-12', 'Equipamiento', 'Oficina', '', '', 'No', 'dali-nd-12.jpg', 'Mesa vidrio base metálica curva'),
(219, 'Mesas', 'Reunión', '', '', 'Dse-c123', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-c123.jpg', 'Mesa de vidrio doble fondo patas negras'),
(220, 'Mesas', 'Reunión', '', '', 'Dse-f170', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-f170.jpg', 'Mesa ovalada de vidrio doble fondo patas metálicas'),
(221, 'Mesas', 'Reunión', '', '', 'Dse-nd01c', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-nd01c.jpg', 'Mesas de vidrio doble fondo patas cromadas'),
(222, 'Mesas', 'Reunión', '', '', 'Dse-nd15', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-nd15.jpg', 'Mesa de vidrio esmerilado patas negras'),
(223, 'Mesas', 'Reunión', '', '', 'Dse-nd39', 'Equipamiento', 'Oficina', '', '', 'No', 'dse-nd39.jpg', 'Mesa de vidrio doble fondo patas cromadas'),
(224, 'Mesas', 'Reunión', '', '', 'Ice-rdt-037', 'Equipamiento', 'Oficina', '', '', 'No', 'ice-rdt-037.jpg', 'Mesas de vidrio doble fondo patas negras'),
(225, 'Mesas', 'Reunión', '', '', 'Jsj-9832', 'Equipamiento', 'Oficina', '', '', 'No', 'jsj-9832.jpg', 'Mesa de tablero base metálica'),
(226, 'Mesas', 'Reunión', '', '', 'Jsj-b9833', 'Equipamiento', 'Oficina', '', '', 'No', 'jsj-b9833.jpg', 'Mesa de tablero base metálica'),
(227, 'Mesas', 'Reunión', '', '', 'Jsj-b9836', 'Equipamiento', 'Oficina', '', '', 'No', 'jsj-b9836.jpg', 'Mesa de tablero base metálica expandible'),
(228, 'Mesas', 'Reunión', '', '', 'Jsj-b9842', 'Equipamiento', 'Oficina', '', '', 'No', 'jsj-b9842.jpg', 'Mesas en tablero base metálica'),
(229, 'Mesas', 'Reunión', '', '', 'Jsj-b9847', 'Equipamiento', 'Oficina', '', '', 'No', 'jsj-b9847.jpg', 'Mesa en tablero base metálica'),
(230, 'Mesas', 'Reunión', '', '', 'Lotto-dse-nd50', 'Equipamiento', 'Oficina', '', '', 'No', 'lotto-dse-nd50.jpg', 'Mesas de vidrio centro negro con patas negras'),
(231, 'Mesas', 'Reunión', '', '', 'Mesa de Bar 757 Chocolate', 'Equipamiento', 'Oficina', '', '', 'No', 'Mesa de Bar 757 Chocolate.jpg', 'Mesa redonda acero'),
(232, 'Mesas', 'Reunión', '', '', 'Mesa para Bar ABS Blanca', 'Equipamiento', 'Oficina', '', '', 'No', 'Mesa para Bar ABS Blanca.jpg', 'Mesa de pasta base cromada'),
(233, 'Mesas', 'Reunión', '', '', 'Mesa para Bar ABS Negra', 'Equipamiento', 'Oficina', '', '', 'No', 'Mesa para Bar ABS Negra.jpg', 'Mesa de pasta negra base cromada'),
(234, 'Mesas', 'Reunión', '', '', 'Mesa Vidrio Templado', 'Equipamiento', 'Oficina', '', '', 'No', 'Mesa Vidrio Templado.jpg', 'Mesa redonda de vidrio base cromada'),
(235, 'Mesas', 'Reunión', '', '', 'mesa de reunión flow', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-de-reunion_flow.jpg', 'Mesa reunión tres puntas en tablero'),
(236, 'Mesas', 'Reunión', '', '', 'Mesa de reunión equinox', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-de-reunion-equinox.jpg', 'Mesa en tablero rectangular con base metálica'),
(237, 'Mesas', 'Reunión', '', '', 'Mesa reunión cuatro', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-reunion-cuatro.jpg', 'Mesa blanca en tablero con patas metalicas'),
(238, 'Mesas', 'Reunión', '', '', 'Mesa reuniones citterio', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-reuniones-citterio.jpg', 'Mesa de reuniones toda en tablero'),
(239, 'Mesas', 'Reunión', '', '', 'Mesa reuniones clásica', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-reuniones-clasica.jpg', 'Mesa de reuniones clásica en tablero'),
(240, 'Mesas', 'Reunión', '', '', 'Mesa reuniones plegables', 'Equipamiento', 'Oficina', '', '', 'No', 'mesa-reuniones-plegables.jpg', 'Mesa en tablero plegable'),
(241, 'Mesas', 'Reunión', '', '', 'Mesas reuniones curve', 'Equipamiento', 'Oficina', '', '', 'No', 'mesas-reuniones-curve.jpg', 'Mesa tablero base metálica'),
(242, 'Mesas', 'Reunión', '', '', 'Mesas reunion prodotti', 'Equipamiento', 'Oficina', '', '', 'No', 'mesas-reunion-prodotti.jpg', 'Mesa reuniones en tablero y base metálica '),
(243, 'Mesas', 'Reunión', '', '', 'Romana-rdt-021', 'Equipamiento', 'Oficina', '', '', 'No', 'romana-rdt-021.jpg', 'Mesa de vidrio negra con base metalica y vidrio'),
(244, 'Mesas', 'Reunión', '', '', 'Twist-rdt-059', 'Equipamiento', 'Oficina', '', '', 'No', 'twist-rdt-059.jpg', 'Mesa de vidrio redonda base cromada'),
(245, 'Archivación', 'Rodarchivo', '', '', 'Rodarchivo future', 'Equipamiento', 'Oficina', '', '', 'No', 'rodarchivo-future.jpg', 'Rodarchivo gris con manijas negras'),
(246, 'Archivación', 'Rodarchivo', '', '', 'Rodarchivo para carpeta-folder', 'Equipamiento', 'Oficina', '', '', 'No', 'rodarchivo-para-carpeta-folder.jpg', 'Rodarchivo dos colores para carpeta y folder'),
(247, 'Archivación', 'Rodarchivo', '', '', 'Rodarchivo tablero', 'Equipamiento', 'Oficina', '', '', 'No', 'rodarchivo-tablero.jpg', 'Rodarchivo en tablero de dos colores'),
(248, 'Taburetes', '', '', '', 'Taburete desayunador', 'Equipamiento', 'Hogar', '', '', 'No', 'banqueta-taburete-silla-ecocuero-regulable-desayunador-bar_MLA-O-3223817850_102012.jpg', 'Taburete en cuero regulable para bar, desayuno'),
(249, 'Taburetes', '', '', '', 'Taburete tapizada color', 'Equipamiento', 'Hogar', '', '', 'No', 'images (2).jpg', 'TAburete tapizada con cuerina abana y regulable'),
(250, 'Taburetes', '', '', '', 'Taburete negro tapiz', 'Equipamiento', 'Hogar', '', '', 'No', 'images.jpg', 'Taburete tapizado en negro base cromada regulable con apoya pies'),
(251, 'Taburetes', '', '', '', 'Taburete cocina', 'Equipamiento', 'Hogar', '', '', 'No', 'silla-taburete-bar-cafeteria-cocina-stand-peluqueria-4-20487-MEC20191726202_112014-O.jpg', 'Taburete en pasta con apolla pies en varios colores base cromada'),
(252, 'Taburetes', '', '', '', 'Taburete lit-rojo', 'Equipamiento', 'Hogar', '', '', 'No', 'taburete-lit-rojo-2-uds.jpg', 'Taburete colores de pasta base cromada regulable'),
(253, 'Taburetes', '', '', '', 'taburete luxus', 'Equipamiento', 'Hogar', '', '', 'No', 'taburete-luxus-pack-de-2-taburetes.jpg', 'Taburete en cuero blanco base cormada'),
(254, 'Taburetes', '', '', '', 'Taburetes copa de vino', 'Equipamiento', 'Hogar', '', '', 'No', 'taburetes-de-la-cocina-12.jpg', 'Taburete en pasta varios colores con base cromada'),
(255, 'Vestidores', 'Contemporáneos', '', '', 'Vestidor mesa centro', 'Equipamiento', 'Hogar', '', '', 'No', 'closet.jpg', 'Vestidor blanco con joyero en el centro'),
(256, 'Vestidores', 'Contemporáneos', '', '', 'CLOSET MADERA 1', 'Equipamiento', 'Hogar', '', '', 'No', 'CLOSET-MADERA1.jpg', 'Vestidor de madera blanco'),
(257, 'Closets', 'Contemporáneos', '', '', 'Closets 10', 'Equipamiento', 'Hogar', '', '', 'No', 'closets10.jpg', 'Closet puertas tablero corredizas rojo'),
(258, 'Vestidores', 'Contemporáneos', '', '', 'Guarda carteras cristal', 'Equipamiento', 'Hogar', '', '', 'No', 'carterera.jpg', 'Guardador de carteras con puertas en vidrio'),
(259, 'Vestidores', 'Clásicos', '', '', 'Vestidor clasic', 'Equipamiento', 'Hogar', '', '', 'No', 'Instalacion-de-closets.jpg', 'Vestidor en madera natural abierto'),
(261, 'Vestidores', 'Clásicos', '', '', 'Closet traditional', 'Equipamiento', 'Hogar', '', '', 'No', 'traditional-closet.jpg', 'Vestidor clásico de madera de pino con un mesón de granito'),
(262, 'Vestidores', 'Contemporáneos', '', '', 'Vestidor table', 'Equipamiento', 'Hogar', '', '', 'No', 'vestidor 1.jpg', 'Vestidor en tablero claro muchos cajones'),
(263, 'Vestidores', 'Clásicos', '', '', 'Vestidor clasic A10', 'Equipamiento', 'Hogar', '', '', 'No', 'vestidor 3.jpg', 'Vestidor sencillo clásico en madera'),
(264, 'Vestidores', 'Clásicos', '', '', 'Vestidor clasic B', 'Equipamiento', 'Hogar', '', '', 'No', 'vestidor 4.jpg', 'Vestidor clásico claro media ahbitación'),
(265, 'Vestidores', 'Contemporáneos', '', '', 'Vestidor moderno ultra', 'Equipamiento', 'Hogar', '', '', 'No', 'vestidor 7.jpg', 'Vestidor moderno en tlabero blanco con cajones y herrajes muy elegantes');

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
(1, 'Daniela', 'dannysk', '123', 'admin');

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
MODIFY `id_trab` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=266;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
