-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2011 a las 23:46:28
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdfamdd`
--
CREATE DATABASE `bdfamdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE bdfamdd;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `number_count_bank` varchar(45) NOT NULL,
  `type_count` varchar(20) NOT NULL,
  PRIMARY KEY (`bank_id`)
) TYPE=MyISAM;

--
-- Volcar la base de datos para la tabla `banks`
--

INSERT INTO `banks` (`bank_id`, `description`, `number_count_bank`, `type_count`) VALUES
(11, 'Banesco', '123456-987654-456127-123987', 'AHORRO'),
(13, 'Banco Provincial', '123456-954124-662315-745471', 'CORRIENTE'),
(14, 'Banco Mercantil', '123456-484145-652214-548845', 'AHORRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banks_bank_id_seq`
--

CREATE TABLE IF NOT EXISTS `banks_bank_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `banks_bank_id_seq`
--

INSERT INTO `banks_bank_id_seq` (`id`) VALUES
(14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL,
  `description_brand` varchar(45) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_id`),
  KEY `FK_brands_1` (`type_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `brands`
--

INSERT INTO `brands` (`brand_id`, `description_brand`, `visible`, `type_id`) VALUES
(0, 'Dell', 1, 3),
(1, 'Markvision', 1, 1),
(2, 'Genius', 1, 14),
(3, 'HP/Compaq', 1, 11),
(4, 'Toshiba', 1, 12),
(5, 'IBM', 1, 12),
(6, 'Toshiba', 1, 2),
(7, 'Acer', 1, 5),
(8, 'Gateway', 1, 12),
(9, 'Intel', 1, 7),
(10, 'Siemen', 1, 23),
(11, 'Nec', 1, 18),
(12, 'Liteon', 1, 12),
(13, 'Sony', 1, 11),
(14, 'Orion', 1, 16),
(15, 'Fujifsu', 1, 10),
(16, 'Samsung', 1, 13),
(17, 'ECG', 1, 25),
(18, 'Lenovo', 1, 3),
(37, 'RAM MAX', 1, 1),
(38, 'RAM MAX', 1, 9),
(39, 'Benq', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands_brand_id_seq`
--

CREATE TABLE IF NOT EXISTS `brands_brand_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=40 ;

--
-- Volcar la base de datos para la tabla `brands_brand_id_seq`
--

INSERT INTO `brands_brand_id_seq` (`id`) VALUES
(39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nom_cat`) VALUES
(1, 'PC'),
(2, 'Laptop'),
(3, 'Electrónica'),
(9, 'Telecomunicaciones'),
(10, 'Descargas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `description`, `visible`) VALUES
(1, 'PC', 1),
(2, 'Lapto', 1),
(3, 'Electronica', 1),
(9, 'Telecomunicaciones', 1),
(10, 'Descargas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_category_id_seq`
--

CREATE TABLE IF NOT EXISTS `categories_category_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `categories_category_id_seq`
--

INSERT INTO `categories_category_id_seq` (`id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citys`
--

CREATE TABLE IF NOT EXISTS `citys` (
  `city_id` int(4) NOT NULL,
  `id_state` int(4) NOT NULL,
  `description_city` varchar(80) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `FK_citys_1` (`id_state`)
) TYPE=InnoDB ROW_FORMAT=FIXED;

--
-- Volcar la base de datos para la tabla `citys`
--

INSERT INTO `citys` (`city_id`, `id_state`, `description_city`) VALUES
(1, 1, 'CARACAS'),
(2, 2, 'PUERTO AYACUCHO'),
(3, 15, 'LOS TEQUES'),
(4, 15, 'SAN ANTONIO DE LOS ALTOS'),
(5, 15, 'CHARALLAVE'),
(6, 15, 'GUARENAS'),
(7, 15, 'GUATIRE'),
(8, 15, 'OCUMARE DEL TUY'),
(9, 15, 'HIGUEROTE'),
(10, 15, 'SANTA TERESA'),
(11, 15, 'SANTA LUCIA'),
(12, 3, 'BARCELONA'),
(13, 3, 'PUERTO PIRITU'),
(14, 3, 'CLARINES'),
(15, 3, 'PUERTO LA CRUZ'),
(16, 5, 'MARACAY'),
(17, 5, 'LA VICTORIA'),
(18, 5, 'SAN MATEO'),
(19, 5, 'PALO NEGRO'),
(20, 5, 'CAGUA'),
(21, 5, 'MAGDALENO'),
(22, 5, 'SAN CASIMIRO'),
(23, 4, 'SAN FERNANDO DE APURE'),
(24, 4, 'EL ORZA'),
(25, 15, 'CUA'),
(26, 7, 'CIUDAD BOLIVAR'),
(27, 7, 'SAN FELIX'),
(28, 7, 'PUERTO ORDAZ'),
(29, 6, 'BARINAS'),
(30, 6, 'SANTA BARBARA DE BARINAS'),
(31, 8, 'VALENCIA'),
(32, 8, 'GUACARA'),
(33, 8, 'PUERTO CABELLO'),
(34, 3, 'VALLE GUANAPE'),
(35, 9, 'SAN CARLOS'),
(36, 9, 'TINACO'),
(37, 10, 'TUCUPITA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citys_city_id_seq`
--

CREATE TABLE IF NOT EXISTS `citys_city_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `citys_city_id_seq`
--

INSERT INTO `citys_city_id_seq` (`id`) VALUES
(37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_client` int(11) NOT NULL,
  `ced_client` varchar(9) DEFAULT NULL,
  `nom_client` varchar(20) NOT NULL DEFAULT '',
  `ape_client` varchar(20) NOT NULL DEFAULT '',
  `dir_client` varchar(255) DEFAULT NULL,
  `tlfcasa_client` varchar(20) DEFAULT NULL,
  `tlfcel_client` varchar(20) DEFAULT NULL,
  `email_client` varchar(75) DEFAULT NULL,
  `login_client` varchar(15) NOT NULL DEFAULT '',
  `clave_client` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_client`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_client`, `ced_client`, `nom_client`, `ape_client`, `dir_client`, `tlfcasa_client`, `tlfcel_client`, `email_client`, `login_client`, `clave_client`) VALUES
(13, '14165632', 'Maikel', 'Mota', 'Santa Teresa', '(0058)0212-4846578', '(0058)0416-2117246', 'motasistem@cantv.net', '14165632', '14165632');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(45) NOT NULL,
  `visible` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`company_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `companies`
--

INSERT INTO `companies` (`company_id`, `description`, `visible`) VALUES
(1, 'M.R.W', 1),
(2, 'D.H.L', 1),
(3, 'FEED', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies_company_id_seq`
--

CREATE TABLE IF NOT EXISTS `companies_company_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `companies_company_id_seq`
--

INSERT INTO `companies_company_id_seq` (`id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(60) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `countries`
--

INSERT INTO `countries` (`country_id`, `description`, `visible`) VALUES
(1, 'Afganistán', 1),
(2, 'Islas Gland', 1),
(3, 'Albania', 1),
(4, 'Alemania', 1),
(5, 'Andorra', 1),
(6, 'Angola', 1),
(7, 'Anguilla', 1),
(8, 'AntÃ¡rtida', 1),
(9, 'Antigua y Barbuda', 1),
(10, 'Antillas Holandesas', 1),
(11, 'Arabia SaudÃ­', 1),
(12, 'Argelia', 1),
(13, 'Argentina', 1),
(14, 'Armenia', 1),
(15, 'Aruba', 1),
(16, 'Australia', 1),
(17, 'Austria', 1),
(18, 'AzerbaiyÃ¡n', 1),
(19, 'Bahamas', 1),
(20, 'Bahréin', 1),
(21, 'Bangladesh', 1),
(22, 'Barbados', 1),
(23, 'Bielorrusia', 1),
(24, 'BÃ©lgica', 1),
(25, 'Belice', 1),
(26, 'Benin', 1),
(27, 'Bermudas', 1),
(28, 'Bhután', 1),
(29, 'Bolivia', 1),
(30, 'Bosnia y Herzegovina', 1),
(31, 'Botsuana', 1),
(32, 'Isla Bouvet', 1),
(33, 'Brasil', 1),
(34, 'Brunéi', 1),
(35, 'Bulgaria', 1),
(36, 'Burkina Faso', 1),
(37, 'Burundi', 1),
(38, 'Cabo Verde', 1),
(39, 'Islas Caimán', 1),
(40, 'Camboya', 1),
(41, 'CamerÃºn', 1),
(42, 'CanadÃ¡', 1),
(43, 'República Centroafricana', 1),
(44, 'Chad', 1),
(45, 'República Checa', 1),
(46, 'Chile', 1),
(47, 'China', 1),
(48, 'Chipre', 1),
(49, 'Isla de Navidad', 1),
(50, 'Ciudad del Vaticano', 1),
(51, 'Islas Cocos', 1),
(52, 'Colombia', 1),
(53, 'Comoras', 1),
(54, 'República Democrática del Congo', 1),
(55, 'Congo', 1),
(56, 'Islas Cook', 1),
(57, 'Corea del Norte', 1),
(58, 'Corea del Sur', 1),
(59, 'Costa de Marfil', 1),
(60, 'Costa Rica', 1),
(61, 'Croacia', 1),
(62, 'Cuba', 1),
(63, 'Dinamarca', 1),
(64, 'Dominica', 1),
(65, 'República Dominicana', 1),
(66, 'Ecuador', 1),
(67, 'Egipto', 1),
(68, 'El Salvador', 1),
(69, 'Emiratos Ãrabes Unidos', 1),
(70, 'Eritrea', 1),
(71, 'Eslovaquia', 1),
(72, 'Eslovenia', 1),
(73, 'España', 1),
(74, 'Islas ultramarinas de Estados Unidos', 1),
(75, 'Estados Unidos', 1),
(76, 'Estonia', 1),
(77, 'Etiopía', 1),
(78, 'Islas Feroe', 1),
(79, 'Filipinas', 1),
(80, 'Finlandia', 1),
(81, 'Fiyi', 1),
(82, 'Francia', 1),
(83, 'Gabón', 1),
(84, 'Gambia', 1),
(85, 'Georgia', 1),
(86, 'Islas Georgias del Sur y Sandwich del Sur', 1),
(87, 'Ghana', 1),
(88, 'Gibraltar', 1),
(89, 'Granada', 1),
(90, 'Grecia', 1),
(91, 'Groenlandia', 1),
(92, 'Guadalupe', 1),
(93, 'Guam', 1),
(94, 'Guatemala', 1),
(95, 'Guayana Francesa', 1),
(96, 'Guinea', 1),
(97, 'Guinea Ecuatorial', 1),
(98, 'Guinea-Bissau', 1),
(99, 'Guyana', 1),
(100, 'Haití', 1),
(101, 'Islas Heard y McDonald', 1),
(102, 'Honduras', 1),
(103, 'Hong Kong', 1),
(104, 'Hungría', 1),
(105, 'India', 1),
(106, 'Indonesia', 1),
(107, 'Irán', 1),
(108, 'Iraq', 1),
(109, 'Irlanda', 1),
(110, 'Islandia', 1),
(111, 'Israel', 1),
(112, 'Italia', 1),
(113, 'Jamaica', 1),
(114, 'Japón', 1),
(115, 'Jordania', 1),
(116, 'Kazajstán', 1),
(117, 'Kenia', 1),
(118, 'Kirguistán', 1),
(119, 'Kiribati', 1),
(120, 'Kuwait', 1),
(121, 'Laos', 1),
(122, 'Lesotho', 1),
(123, 'Letonia', 1),
(124, 'Líbano', 1),
(125, 'Liberia', 1),
(126, 'Libia', 1),
(127, 'Liechtenstein', 1),
(128, 'Lituania', 1),
(129, 'Luxemburgo', 1),
(130, 'Macao', 1),
(131, 'ARY Macedonia', 1),
(132, 'Madagascar', 1),
(133, 'Malasia', 1),
(134, 'Malawi', 1),
(135, 'Maldivas', 1),
(136, 'Malí', 1),
(137, 'Malta', 1),
(138, 'Islas Malvinas', 1),
(139, 'Islas Marianas del Norte', 1),
(140, 'Marruecos', 1),
(141, 'Islas Marshall', 1),
(142, 'Martinica', 1),
(143, 'Mauricio', 1),
(144, 'Mauritania', 1),
(145, 'Mayotte', 1),
(146, 'México', 1),
(147, 'Micronesia', 1),
(148, 'Moldavia', 1),
(149, 'Mónaco', 1),
(150, 'Mongolia', 1),
(151, 'Montserrat', 1),
(152, 'Mozambique', 1),
(153, 'Myanmar', 1),
(154, 'Namibia', 1),
(155, 'Nauru', 1),
(156, 'Nepal', 1),
(157, 'Nicaragua', 1),
(158, 'Níger', 1),
(159, 'Nigeria', 1),
(160, 'Niue', 1),
(161, 'Isla Norfolk', 1),
(162, 'Noruega', 1),
(163, 'Nueva Caledonia', 1),
(164, 'Nueva Zelanda', 1),
(165, 'Omán', 1),
(166, 'Países Bajos', 1),
(167, 'Pakistán', 1),
(168, 'Palau', 1),
(169, 'Palestina', 1),
(170, 'Panamá', 1),
(171, 'Papúa Nueva Guinea', 1),
(172, 'Paraguay', 1),
(173, 'Perú', 1),
(174, 'Islas Pitcairn', 1),
(175, 'Polinesia Francesa', 1),
(176, 'Polonia', 1),
(177, 'Portugal', 1),
(178, 'Puerto Rico', 1),
(179, 'Qatar', 1),
(180, 'Reino Unido', 1),
(181, 'Reunión', 1),
(182, 'Ruanda', 1),
(183, 'Rumania', 1),
(184, 'Rusia', 1),
(185, 'Sahara Occidental', 1),
(186, 'Islas Salomón', 1),
(187, 'Samoa', 1),
(188, 'Samoa Americana', 1),
(189, 'San Cristóbal y Nevis', 1),
(190, 'San Marino', 1),
(191, 'San Pedro y Miquelón', 1),
(192, 'San Vicente y las Granadinas', 1),
(193, 'Santa Helena', 1),
(194, 'Santa Lucía', 1),
(195, 'Santo Tomé y Príncipe', 1),
(196, 'Senegal', 1),
(197, 'Serbia y Montenegro', 1),
(198, 'Seychelles', 1),
(199, 'Sierra Leona', 1),
(200, 'Singapur', 1),
(201, 'Siria', 1),
(202, 'Somalia', 1),
(203, 'Sri Lanka', 1),
(204, 'Suazilandia', 1),
(205, 'SudÃ¡frica', 1),
(206, 'Sudán', 1),
(207, 'Suecia', 1),
(208, 'Suiza', 1),
(209, 'Surinam', 1),
(210, 'Svalbard y Jan Mayen', 1),
(211, 'Tailandia', 1),
(212, 'Taiwán', 1),
(213, 'Tanzania', 1),
(214, 'Tayikistán', 1),
(215, 'Territorio Británico del Océano Índico', 1),
(216, 'Territorios Australes Franceses', 1),
(217, 'Timor Oriental', 1),
(218, 'Togo', 1),
(219, 'Tokelau', 1),
(220, 'Tonga', 1),
(221, 'Trinidad y Tobago', 1),
(222, 'Túnez', 1),
(223, 'Islas Turcas y Caicos', 1),
(224, 'Turkmenistán', 1),
(225, 'Turquía', 1),
(226, 'Tuvalu', 1),
(227, 'Ucrania', 1),
(228, 'Uganda', 1),
(229, 'Uruguay', 1),
(230, 'UzbekistÃ¡n', 1),
(231, 'Vanuatu', 1),
(232, 'Venezuela', 1),
(233, 'Vietnam', 1),
(234, 'Islas Vírgenes Británicas', 1),
(235, 'Islas Vírgenes de los Estados Unidos', 1),
(236, 'Wallis y Futuna', 1),
(237, 'Yemen', 1),
(238, 'Yibuti', 1),
(239, 'Zambia', 1),
(240, 'Zimbabue', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries_country_id_seq`
--

CREATE TABLE IF NOT EXISTS `countries_country_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=245 ;

--
-- Volcar la base de datos para la tabla `countries_country_id_seq`
--

INSERT INTO `countries_country_id_seq` (`id`) VALUES
(241);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equip` int(10) unsigned NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `status_equip` varchar(15) NOT NULL DEFAULT '',
  `marca_equip` varchar(20) DEFAULT NULL,
  `caract_equip` text,
  `precio_equip` varchar(15) DEFAULT NULL,
  `img_equip` text,
  `vent_equip` char(2) DEFAULT NULL,
  `ppal_equip` char(2) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id_equip`),
  KEY `fi0` (`id_tp`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equip`, `id_tp`, `status_equip`, `marca_equip`, `caract_equip`, `precio_equip`, `img_equip`, `vent_equip`, `ppal_equip`) VALUES
(1, 8, 'Nuevo', 'Genius', 'Cornetas \r\nSP-E120\r\n', '50', 'cornetas.jpg', 'Si', 'Si'),
(2, 1, 'Nuevo', 'Markvision', 'DDR 400\r\n512Mb\r\n', '150', 'Logo.jpg', 'Si', 'Si'),
(3, 12, 'Nuevo', 'Toshiba', 'Toshiba 19V 6.3A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 6.3A\r\n\r\nPower: 120W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: PA3290U-2ACA PA3290E-2ACA\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nToshiba Satellite A60 series: A60-S156, A60-S1561, A60-S159, A60-S1591, A60-S1591ST, A60-S1592ST, A60-S166, A60-S1661, A60-S1662, A60-S1691ST.\r\n\r\nToshiba Satellite A65 series: A65-S1062, A65-S1063, A65-S1064, A65-S1065, A65-S1066, A65-S1067, A65-S109, A65-S1091, A65-S126, A65-S1261, A65-S136, A65-S1361, A65-S1362, A65-S1662, A65-S1762.\r\n\r\nToshiba Satellite A70 series: A70-S249, A70-S2491, A70-S2492ST, A70-S256, A70-S2561, A70-S259, A70-S2591, A70-S2362\r\n\r\nToshiba Satellite A75 series: A75-S206, A75-S2061, A75-S2091, A75-S211, A75-S2111, A75-S226, A75-S2261, A75-S229, A75-S2291, A75-S2292, A75-S2293, A75-S231, A75-S2311, A75-S276, A75-S2761, A75-S2762\r\n\r\nToshiba Satellite P30 series: P30-S6362ST, P30-S63623T, P30-S701TD\r\n\r\nToshiba Satellite P35 series: P35-S609, P35-S6091, P35-S611, P35-S6111, P35-S629, P35-S6291, P35-S6292, P35-S631, P35-S6311, P35-S7012.\r\n\r\nToshiba Satellite P25 series (Only the units Listed): P25-S607, P25-S608, P25-S609, P25-S670, P25-S676, P25-S6761. ', '220', '19v 6.3a.jpg', 'Si', 'Si'),
(4, 12, 'Nuevo', 'Toshiba', 'Toshiba 15V 8A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC15V 8A\r\n\r\nPower: 120W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size:  4-hole Tip\r\n\r\nReplace Part Number: PA3237U-1ACA, PA3237U\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nToshiba Satellite A20 series:  A20-S259\r\n  \r\nToshiba Satellite A25 series:  A25-S207, A25-S208, A25-S279, A25-S2791, A25-S2792, A25-S307, A25-S308 \r\n\r\nToshiba Satellite A40 series:  A40-S161, A40-S1611, A40-S200, A40-S200SM, A40-S2001, A40-S270, A40-S2701, A40-VH3 \r\n\r\nToshiba Satellite A45 series:  A45-S120, A45-S1201, A45-S1202, A45-S121, A45-S1211, A45-S130, A45-S1301, A45-S150, A45-S1501, A45-S151, A45-S1511, A45-S250, A45-S2501, A45-S2502  \r\n\r\nToshiba Qosmio G15 Series\r\nToshiba Qosmio G25 Series ', '260', '15v 8a.jpg', 'Si', 'Si'),
(5, 12, 'Nuevo', 'Toshiba', 'Toshiba 15V 6A AC Adapter (old type)\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC15V 6A\r\n\r\nPower: 90W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 3.0mm\r\n    External Diameter: 6.3mm\r\n\r\nReplace Part Number: PA2501U, PA2521U, PA3201U-1ACA\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nSatellite 1400 Series\r\nSatellite 1800 Series\r\nSatellite 2500 Series\r\nSatellite 5000 Series\r\nSatellite 5100 Series\r\nSatellite 5110 Series\r\nSatellite 2400 Series\r\nSatellite Pro 6000 Series\r\nSatellite Pro 6100 Series\r\nPortege 2000 Series\r\nPortege 3500 Series\r\nPortege 4000 Series\r\nTecra 9000 Series\r\nTecra 9100 Series ', '260', '15v 6a.jpg', 'No', 'No'),
(6, 12, 'Nuevo', 'Toshiba', 'Toshiba 15V 5A  AC Adapter (old type)\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC15V 5A\r\n\r\nPower: 75W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 3.0mm\r\n    External Diameter: 6.3mm\r\n\r\nReplace Part Number: PA3155U, PA3283U-2ACA, PA3201U, PA3215U-1ACA, PA3083U, PA3282Ut, PA2444Ut, PA3048U, PA2444U, PA2450U, PA3469U-1ACA, PA3083U-1ACA\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nToshiba Portege Series: 3500 Tablet PC, 3505 Tablet PC, 4000, 4005, 4010, M100, M200, M205, R100, R200, S100\r\n \r\nSatellte 1400 1410 1415Series: 1400, S1400-S151, 1400-S152, 1405-S151, 1405-S152, 1405-S171, 1405-S172 , 1410 - 1415 Series,  1410,  1410-S173, 1410-S174, 1415, 1415-S105,  1415-S106, 1415-S115, 1415-S173, 1415-S174\r\n\r\nSatellte 1800 1805 Series: 1800-S252, 1805-S203, 1805-S204, 1805-S253, 1805-S274  \r\n\r\nSatellite 2400 2500 2600 2800Series:\r\n2400,2400-S201,2400-S202 2405-S201 2410-S203 2410-S204 ¡¡¡¡¨¬¡¡¨¬                 \r\n2500 2500-2515 2500CDS 2500CDT\r\n2505CDS 2505CDT\r\n2510 2510CDS \r\n2515 2515CDS 2515CDT  2515CTS\r\n2530 2530CDS 2535 2535CDS 2535CDT\r\n2540 2540CD5000-204, 5000-A540, 5000-Z59\r\n5005-S504, 5005-S507, 5005-S507\r\n5100-201, 5100-501, 5100-503, 5100-S603, 5100-S607\r\n5105-S501, 5105-S502, 5105-S607, 5105-S608, 5105-S701, 5105-S90,  S 2540CDT 2545 2545CDS 2545CDT 2545xCDT\r\n2590CS 2590CDT 2590XDVD 2595CDS 2595CDT 2595XDVD\r\n2610DVD, 2615DVD, 2655XDVD, 2675DVD  2710XDVD \r\n2800, 2800-S201, 2800-S202, 2800-S210\r\n2805, 2805-S201, 2805-S202, 2805-S301, 2805-S302, 2805-S401, 2805-S402, 2805-S503\r\n \r\nSatellite 5000/ 5100 /5200 Series:\r\n5000-201, 5105-S702 5200\r\n5205-S503, 5205-S504, 5205-S505, 5205-S506, 5205-S703, 5205-S704, 5205-S705, 5205-SP505\r\n \r\nSatellite A/ M/ R Series:\r\nA10, A10-S127, A10-S128, A10-S129, A10-S1291, A10-S167, A10-S169, A10-S1691, A10-S177, A10-S178 A10\r\nA15,  A15-S127, A15-S128, A15-S129, A15-S151, A15-S157, A15-S158, A15-S1271, A15-S1291, A15-S1292, A15-S1692\r\nA50, A55, A55-S129, A55-S179, A55-S306, A55-S326, A55-S1291, A55-S1791, A55-S3061, A55-S3062, A55-S3063, A55-S3261\r\nM20,  M20-S257, M20-S257, M20-258 M30,  M30-S309, M30-S3091 M35,  M35-S320, M35-S359, M35-S456, M35-S3591, M35-S3592 M40, M45\r\nR10, R15 \r\n\r\nToshiba Satellite Pro: 6000, 6100, M10, M15\r\n\r\nToshiba Tecra 8000, 8100, 8200, 9000, 9100, A1, A2, A3, A4, M1, M2, M3, M4, M2V, S1, S2, TE2000, TE2100, TE2300', '220', '15.jpg', 'No', 'No'),
(7, 12, 'Nuevo', 'Toshiba', 'Toshiba 19V 4.74A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 4.74A\r\n\r\nPower: 90W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: PA3165U-1ACA, PA3380U-1ACA\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nToshiba Satellite 1100 Series: 1110-S153, 1115-S103, 1115-S104, 1115-S107, 1115-S1123, 1130-S155, 1130-S156, 1135-S125, 1135-S155, 1135-S156, 1100-DDR, 1100-S101, 1100-S1105, 1100-SDRAM, 1105, 1105-S101, 1105-1110, 1110-6MU, 1110-DSW, 1110-SP153, 1110-Z14, 1110-Z15, 1115-S103, 1115-S104,1115-S107, 1115-S123, 1115-SP153, 1130, 1130-5QG, 1130-S155, 1115-S156, 1115-SP155, 1130-Z24, 1130-Z25, 1130-Z29, 1130-Z30, 1135-S125, 1135-S155, 1135-S1551, 1135-S1552, 1135-S1553, 1135-S1554, 1135-S156, 1135-SP155.              \r\n\r\nToshiba Satellite 1900 Series: 1900-S305, 1905-S277, 1905-S301, 1905-S302, 1905-S303, 1905-S304,1900-000NJ, 1900-004EJ, 1900-101, 1900-102, 1900-203, 1900-303, 1900-305, 1900-503, 1900-603, 1900-703, 1900-704, 1900-803, 1900-824, 1900DDR, 1900-OFS, 1900-S301, 1900-S704, 1900-SDRAM, 1900-SP303, 1900-UWN, 1905, 1905-DDR, 1905-SDRAM, 1905-SP303, 1950, 1950-A630, 1950-A740, 1950-S801, 1950-S902, 1955, 1955-S301, 1955-S801, 1955-S802, 1955-S803, 1955-S804, 1955-S805, 1955-S806, 1955-S807, 1955-S808.\r\n\r\nToshiba Satellite 1600 Series: 1605CDS, 1620CDS, 1625CDT, 1640CDT, 1640CDT, 1675CDS, 1675CDT, 1690CDT, 1695CDT.\r\n\r\nToshiba Satellite 1700 Series: 1700, 1710CDS, 1710CT, 1715XCDS, 1730, 1730CDT, 1735, 1735XCDS, 1750, 1750CDT, 1755, 1755CDT, 1755XDVD.\r\n\r\nToshiba Satellite 3000 Series:  3000, 3000-100, 3000-214, 3000-400, 3000-504, 3000-514, 3000-601, 3000-A423, 3000-H200, 3000-Q65, 3000-S303, 3000-S304, 3000-S353, 3000-S403, 3000-S504, 3000-X4, 3005-A423, 3005-H200, 3005-S303, 3005-S304, 3005-S307, 3005-S308, 3005-S353, 3005-S403.\r\n\r\nToshiba Satellite 1955 Series: 1955-S801, 1955-S802, 1955-S803, 1955-S804, 1955-S805, 1955-S806, 1955-S807\r\n\r\nToshiba Satellite 2400 Series: 2430-S255, 2430-S256, 2435-S255, 2435-S256, 2400-A620, 2400-S201, 2400-S202, 2400-S251, 2400-S252, 2400-UJX, 2405, 2405-S201, 2405-S202, 2405-S221, 2410, 2410-303, 2410-304, 2410-304S, 2410-404, 2410-414, 2410-515, 2410-603, 2410-703, 2410-A631, 2410-A640, 2410-A741, 2410-CTX, 2410-S185, 2410-S203, 2410-S204, 2410-S205, 2410-S206, 2410-SP203, 2410-SP205, 2410-W9X, 2415-S205, 2415-S206, 2415-SP203, 2415-SP203, 2415-SP205, 2415-SP205, 2430, 2430-101, 2430-201, 2430-301, 2430-402, 2430-703, 2430-A620, 2430-A740, 2450-101, 2450-114, 2450-201, 2450-202, 2450-3DY, 2450-401, 2450-4PO, 2450-5DY, 2450-A740, 2450-A750, 2450-P40, 2450-S103, 2450-S203, 2450-S40, 2450-S402, 2450-SP295, 2450-TMG, 2455, 2455-S3001, 2455-S305, 2455-S306, 2455-SP295\r\n\r\nSmall Business Series: 1110, 1130, 1410, 2400, 2430', '240', '19v 4.74a.jpg', 'Si', 'Si'),
(8, 12, 'Nuevo', 'HP/Compaq', 'Original HP/Compaq 18.5V 6.5A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC18.5V 6.5A\r\n\r\nPower: 120W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm \r\n\r\nReplace Part Number:\r\nCompaq 316687-001 316687-002 316687-003 316688-001 316688-002 316688-003 309241-001 310925-001 317188-001 344895-001 344895-001 347438-001 350221-001 350775-001 370998-001\r\nHP HP-OW120F13 HP-OW121F13 PA-1121-02H PA-1121-12H PPP016L PPP017H PPP017L PA-1121-02H PA-1121-12H DC687A DC687A#ABA DC790A  F1454A F1781A F4814A\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nCOMPAQ BUSINESS SERIES: NX9100, NX9105, NX9110\r\n\r\nCOMPAQ R3000 SERIES:  R3000, R3000t, R3000z, R3001AP, R3001US, R3001XX R3002AP, R3002XX, R3003AP, R3003US, R3004AP, R3004US R3005AP, R3005US, R3006AP, R3007AP, R3009AP, R3011AP R3012AP,R3013AP, R3014AP, R3016AP, R3017AP, R3018AP R3019AP, 3019CL,R3020US, R3030US,R3038CL, R3045US R3050US, R3055US, R3056RS, R3060CA, R3060US, R3070US R3103US, R3120CA, R3120US, R3128RS, R3140CA, R3140US R3150US, R3160US, R3190US, R3200CA, R3202US, R3230US R3240US, R3247us, R3260US, R3290US\r\n\r\nCOMPAQ ZT SERIES: ZT3068, ZT3068CL, ZT3070US, ZT3080US\r\n\r\nHP ZV5000 SERIES:  ZV5000, ZV5000t, ZV5000z, ZV5001US, ZV5002US, ZV5004AP ZV5005AP, ZV5006AP, ZV5007AP, ZV5007LA, ZV5008AP, ZV5009AP ZV5010AP, ZV5011AP, ZV5012AP, ZV5013AP, ZV5014AP, ZV5015AP ZV5016AP, ZV5017AP, ZV5018AP, ZV5019AP, ZV5021AP, ZV5022AP ZV5023AP, ZV5024AP, ZV5030CA, ZV5030US, ZV5034US, ZV5037WM ZV5045EA, ZV5101US, ZV5102AP, ZV5103US, ZV5105US, ZV5120CA ZV5120US, ZV5160CA, ZV5160US, ZV5210us, ZV5247LA, ZV5255US ZV5257LA, ZV5270US, ZV5277LA\r\n\r\nHP ZX5000 SERIES:  ZX5001, ZX5001US, ZX5002, ZX5002U, SZX5002EA, ZX5003EA, ZX5005EA, ZX5008EA, ZX5010EA, ZX5011EA, ZX5012EA, ZX5020EA, ZX5022EA, ZX5030EA, ZX5035EA, ZX5037EA, ZX5038EA, ZX5039EA, ZX5040CA, ZX5040EA, ZX5040US, ZE5040CA, ZX5041EA, ZX5042EA, ZX5043EA, ZX5044EA, ZX5045EA, ZX5048EA, ZX5049EA, ZX5050EA, ZX5051EA, ZX5052EA, ZX5060US, ZX5065US, ZX5070US, ZX5078CL, ZX5180US, ZX5190US, ZX5280US\r\n\r\nHP ZD7000 SERIES:  ZD7000 ZD7001US ZD7005US ZD7010CA ZD7012EA ZD7015US ZD7020US ZD7030US ZD7058CL ZD7101US ZD7310CA, ZD7310CAF, ZD7310US, ZD7360US, ZD7380CA, ZD7380US\r\n\r\nHP D SERIES:  DC924A, DC924AR, DC925A, DC925AR, DG956A, DG956AR, DG958A, DG958AR, DG959A, DG959AR, DM788A DM788AR, DM790A, DM790AR, DM791A, DM791AR, DM793A, DM793AR, DN730AV, DP446U, DP447U, DP448U DP448UR, DP761E, DP762E, DP763E, DP764E, DP765E, DP766E, DP767E, DP768E, DP769E, DP770E, DR089U,DR089U RDR340U, DR761E, DR762E, DR768E, DR769E, DR770E, DT859U ', '260', '18.5v 6.5a.jpg', 'No', 'No'),
(9, 12, 'Nuevo', 'HP/Compaq', 'HP/Compaq 18.5V 3.5A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC18.5V 3.5A\r\n\r\nPower: 65W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  \r\n    Internal Diameter: 1.7mm\r\n    External Diameter: 4.8mm\r\n\r\nReplace Part Number: 101898-001. 101880-001, 146594-001, 159224-001, 163444-001, 179725-003, A265, AC-C14, 285288-001, LPACQ3, PA-1651-02C, PP1006, PPP002D, P-0K065B13, 239427-001, 239427-003, 239704-001, 239705-001, 265602-001387661-001, 209126-001, 209124-001, 120765-001, 338136-001, 386315-002\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nArmada:\r\n110, E500, E500s, E700, M300, M700, V300 ...\r\nN620c, tc1100, nc4000, nc4010, nc4200, tc4200, nx4800, nx5000, nx5100, nc6000, nc6100, nx6100, nc6105, nx6105, nc6110, nx6110, nc6115, nx6115, nc6120, nc6220, nx7000, nx7100, nc7200, nx7200, nc8000, nw8000 ...\r\n\r\nTablet PC: TC1000 - TM5800, TC1100, TC4200 ...\r\n\r\nEVO: N1000, N1000C, N1000V, N1005V, N1015, N1015v, N1020, N1020v, N1050, N1050v, N110, N150, N200, N400c, N410c, N600, N600c, N610c, N620c, N800, N800c, N800v, N800w\r\n\r\nPresario 900 Series: 900, 900US, 905, 905US, 910, 910US, 912, 912RSH, 918, 918RSH, 920, 920US...\r\nPresario 1500 Series:  1500 1500T 1500US 1501 1501CL 1505, 1510, 1510CA, 1510US, 1516 1516US, 1520, 1520CA 1520US, 1525, 1525CA 1525US ...\r\nPresario 2800, 2800CA, 2800T, 2800US, 2801CL, 2805US, X1000, X1015, X1015US, X1030, X1030US, X1040, X1040US ...\r\nPresario 2200XX SERIES, 2204US, V2000, V2030US, V2010US, V2100 ...\r\nPresario x1000, x1200, V2000, V4000, V5000 ...\r\n\r\nProsignia: 160,170 ...\r\n\r\nHP PAVILION DV1000, DV1010, DV1100, DV1130, DV1200, DV4000, DV5000, ZE2000, ze2300, ze2315, ze2315us, ze2308wm, ZT3000 Series, ZE4900, ZT3000, ZT3010US, ZT3020US, NW8000, DC895A, X1220US, X1000 ...\r\n\r\nBUSINESS NOTEBOOK:  NC4000, NC4010, NC4200, NC6000, NC6120,NC6220, NC6230, NC8000, NC8230, NW8000, NX5000, NX6110, NX6120, NX7000, NX7010, X90XX, NX9020, NX9030, NX9040, DD522AV, DH913U, DH914U, DH915U, DH930U, DJ254A, DJ255A, DJ256A,\r\nDJ257A, DJ299A, DJ311S, DJ323S, DJ3245S, DJ3265S, DJ330S, DJ333A, DJ333T, DP894A, DP895A, DQ880A, DQ882A, DS652C, DS794P, DS795P, DS796P, DS797P, DS798P, DS799P, DS800P, DS807P, DS808P, DS825C, DS847P, DS859P, DS860P, DT412C, DT483A, DT486A, DT610C, DT611C, DT636P, DV611P ...', '145', '18.5v 3.5a.jpg', 'Si', 'Si'),
(10, 11, 'Nuevo', 'HP/Compaq', 'HP F4809A battery\r\n\r\nValtage: 14.8V\r\n\r\nCapacity: 4400mAh\r\n\r\nCompatible Part Number:\r\n361742-001, 371785-001, 371786-001, 383615-001,\r\n916-2150, F4098A, F4809-60901, F4809A, F4812A\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nHP OmniBook xe4 Series;\r\nHP OmniBook xe4000 Series;\r\nHP OmniBook xe4100 Series;\r\nHP OmniBook xe4400 Series;\r\nHP OmniBook xe4400 BTO Base Model;\r\nHP OmniBook xe4400 BTO Special Series;\r\nHP OmniBook xe4500 Series;\r\nHP Pavilion xt1 Series;\r\nHP Pavilion xt2 Series;\r\nHP Pavilion xt3 Series;\r\nHP Pavilion xt4 Series\r\nHP Pavilion xt5 Series;\r\nHP Pavilion xt4300 Series;\r\nHP Pavilion xt5300 Series;\r\nHP Pavilion xt5400 Series;\r\nHP Pavilion ze4000 Series;\r\nHP Pavilion ze4100 Series;\r\nHP Pavilion ze4200 Series;\r\nHP Pavilion ze4300 Series;\r\nHP Pavilion ze4400 Series;\r\nHP Pavilion ze4500 Series;\r\nHP Pavilion ze4800 Series;\r\nHP Pavilion ze4900 Series;\r\nHP Pavilion ze5 Series;\r\nHP Pavilion ze5000 Series;\r\nHP Pavilion ze5100 Series;\r\nHP Pavilion ze5200 Series;\r\nHP Pavilion ze5300 Series;\r\nHP Pavilion ze5400 Series;\r\nHP Pavilion ze5500 Series\r\nHP Pavilion ze5600 Series;\r\nHP Pavilion ze5700 Series\r\nHP Business notebook nx9000 Series;\r\nHP Business notebook nx9005 Series;\r\nHP Business notebook nx9008 Series;\r\nHP Business notebook nx9010 Series\r\nHP Business notebook nx9020 Series;\r\nHP Business notebook nx9030 Series;\r\nHP Business notebook nx9040 Series;\r\nCompaq Evo Notebook N1010v\r\nCompaq Evo Notebook N1050V Series;\r\nCompaq Presario 100CA;\r\nCompaq Presario 1100 Series\r\nCompaq Presario 2100 Series\r\nCompaq Presario 2200 Series;\r\nCompaq Presario 2500 Series ', '395', 'f4809a.jpg', 'Si', 'Si'),
(11, 12, 'Nuevo', 'Acer', 'Acer 19V 3.42A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.42A\r\n\r\nPower: 65W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: PA-1700-02, ADP-65DB, LC-T2801-006, LC.T2801.006, LC.ADT01.001 or AP.T3503.002.\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nAcer Aspire: 1350, 1360,1500,1520, 1600, 1610, 1620,  1670, 1680, 2003, 2010, 2020, 3004, 3004LCI, 3004LMI, 3004WLMI, 3500, 3610, 5600 Series\r\n\r\nAcer Travelmate(TM): 210, 210T, 210TER, 211T, 212T, 212TE, 212TXV, 213T, 213TX, 213TXV, 220, 223X, 223XC, 225X, 225XC, 225XV-Pro, 230, 233XC, 260, 270, 270xv, 280, 290, 290E, 291LCI, 291LMI, 301XCI, 330, 330T, 340T, 341T, 342, 345T, 347T, 350, 350TE, 351TEV, 352TE, 352TE-N, 353TE, 353TEV, 354TE, 354TEV, 360, 521TE, 524TXV, 525TE, 525TXV, 528TE, 551XV, 360, 500, 506, 506DX, 520, 521T, 521TE, 521TXV, 522, 525, 525TXV, 527TXV, 529TXV, 530, 600, 600TER, 602, 602TER, 603, 603TER, 604TER, 610, 610TXV, 610TXVi, 610TXC, 611TXV, 611TXC, 612TXV, 612TXC, 613TXV, 613TXC, 620, 630, 650, 660, 730, 730TX, 730TXV, 732, 732TLV, 732TX, 734TL, 735TLV, 735TXV, 738TLV, 739TLV, 740, 800, a550, a551, Alpha 550, Alpha 551, 2000, 2100, 2500, 2600, 2700, 3000, 4000, 4100, 4100LCI, 4100LMI, 4100LWMI, 4650, 4650LCi, 4650LMi, 6000, 8000 Series ...\r\n\r\nAcer Ferrari : 3000, 3000LMI 3200 Series\r\n\r\nASUS laptop: Asus M3NP, Asus A6U, Asus M6N,  Asus M6BN,  Asus W1N,  Asus W3V,  Asus M6Ne,  Asus V6V,  Asus W5A,  Asus Z91,  Asus Z33,  Asus Z32,  Asus Z61A,  Asus Z71A/V \r\n\r\nGateway laptop: Gateway S-7200, S-7200C, S7200, S7200C Series, CX200, CX200S, CX200X Series, S-7500, S-7500N, S7500, S7500N, MX6420, MX6421, MX6423   ', '220', '19v 3.42a.jpg', 'Si', 'Si'),
(12, 12, 'Nuevo', 'Toshiba', 'Toshiba/Delta 19V 3.42A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.42A\r\n\r\nPower: 65W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: PA-1700-02, ADP-65DB, LC-T2801-006, LC.T2801.006, LC.ADT01.001 or AP.T3503.002.  PA3396U-1ACA  PA3467U-1ACA PA-1650-01 PA-1600-06D1  PA-1480-19Q\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nAcer Aspire: 1350, 1360,1500,1520, 1600, 1610, 1620,  1670, 1680, 2003, 2010, 2020, 3004, 3004LCI, 3004LMI, 3004WLMI, 3500, 3610, 5600 Series\r\n\r\nAcer Travelmate(TM): 210, 210T, 210TER, 211T, 212T, 212TE, 212TXV, 213T, 213TX, 213TXV, 220, 223X, 223XC, 225X, 225XC, 225XV-Pro, 230, 233XC, 260, 270, 270xv, 280, 290, 290E, 291LCI, 291LMI, 301XCI, 330, 330T, 340T, 341T, 342, 345T, 347T, 350, 350TE, 351TEV, 352TE, 352TE-N, 353TE, 353TEV, 354TE, 354TEV, 360, 521TE, 524TXV, 525TE, 525TXV, 528TE, 551XV, 360, 500, 506, 506DX, 520, 521T, 521TE, 521TXV, 522, 525, 525TXV, 527TXV, 529TXV, 530, 600, 600TER, 602, 602TER, 603, 603TER, 604TER, 610, 610TXV, 610TXVi, 610TXC, 611TXV, 611TXC, 612TXV, 612TXC, 613TXV, 613TXC, 620, 630, 650, 660, 730, 730TX, 730TXV, 732, 732TLV, 732TX, 734TL, 735TLV, 735TXV, 738TLV, 739TLV, 740, 800, a550, a551, Alpha 550, Alpha 551, 2000, 2100, 2500, 2600, 2700, 3000, 4000, 4100, 4100LCI, 4100LMI, 4100LWMI, 4650, 4650LCi, 4650LMi, 6000, 8000 Series ...\r\n\r\nAcer Ferrari : 3000, 3000LMI 3200 Series\r\n\r\nASUS laptop: Asus M3NP, Asus A6U, Asus M6N,  Asus M6BN,  Asus W1N,  Asus W3V,  Asus M6Ne,  Asus V6V,  Asus W5A,  Asus Z91,  Asus Z33,  Asus Z32,  Asus Z61A,  Asus Z71A/V \r\n\r\nGateway laptop: Gateway S-7200, S-7200C, S7200, S7200C Series, CX200, CX200S, CX200X Series, S-7500, S-7500N, S7500, S7500N, MX6420, MX6421, MX6423\r\n\r\nToshiba Satellite A85-Series: A85-S107 A85-S1071 A85-S1072 A85-SP107 A85-SP1072\r\n\r\nToshiba Satellite L10 Series: L10-SP104\r\n\r\nToshiba Satellite L15 Series: L15-S1041 L15-SP104\r\n\r\nToshiba Satellite L20 Series: L20-SP119\r\n\r\nToshiba Satellite L25 Series: L25-S119 L25-S1192 L25-S1193 L25-S1194 L25-S1195 L25-S1196 L25-SP129 L25-SP139\r\n\r\nToshiba Satellite M30X Series: M30X-40 M30X-60 M30X-80 M30X-S114 M30X-S1592ST M30X-1593ST M30X-S171ST M30X-S181 M30X-S191 M30X-214 M30X-S221 M30X-S234 M30X-SP114\r\n\r\nToshiba Satellite M35X Series: M35X-S109 M35X-S111 M35X-114 M35X-S1141 M35X-S1142 M35X-S1143 M35X-149 M35X-S1491 M35X-S1492 M35X-S161 M35X-S1611 M35X-S163 M35X-S1631 M35X-S309 M35X-S311 M35X-S3111 M35X-S3112 M35X-S329 M35X-S3291 M35X-S349 M35X-S3491 M35X-SP114 M35X-SP161 M35X-SP171 M35X-SP181 M35X-SP311\r\n\r\nToshiba Satellite M45 Series: M45-S165 M45-S1651 M45-S169 M45-S1681\r\n\r\nToshiba Satellite M55 Series: M55-S139 M55-S1391', '220', '19v 3.42a.jpg', 'Si', 'Si'),
(13, 12, 'Nuevo', 'Acer', 'Acer 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  \r\n    Internal Diameter: 2.1mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number:\r\nAcer 25.10064.04\r\nAcer 25.10064.041\r\nAcer 91.41Q28.002\r\nAcer 91.41Q28.003\r\nAcer 91.42S28.002\r\nAcer 91.48R28.003\r\nAcer 91.49V28.002\r\nAcer ADP-65DB\r\nAcer ADT-W61\r\nAcer AP.T3503.001\r\nAcer CAA0668A\r\nAcer HAP.0060.001\r\nAcer LC.ADT01.003\r\nAcer PA-1500-02\r\nAcer PA-1600-02\r\nCompaq 146594-001\r\nLiteOn PA-1480-19T\r\nSharp EA-871V\r\nSharp EA-905V\r\nSharp EA-M50V\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nAcer AcerNote 330T\r\nAcer Aspire 1200\r\nAcer TravelMate 210\r\nAcer TravelMate 210T\r\nAcer TravelMate 210TER\r\nAcer TravelMate 212T\r\nAcer TravelMate 212TE\r\nAcer TravelMate 212TXV\r\nAcer TravelMate 213T\r\nAcer TravelMate 213TXV\r\nAcer TravelMate 220\r\nAcer TravelMate 223X\r\nAcer TravelMate 223XC\r\nAcer TravelMate 225X\r\nAcer TravelMate 225XC\r\nAcer TravelMate 225XV-Pro\r\nAcer TravelMate 230\r\nAcer TravelMate 233XC\r\nAcer TravelMate 240\r\nAcer TravelMate 260\r\nAcer TravelMate 270\r\nAcer TravelMate 270xv\r\nAcer TravelMate 280\r\nAcer TravelMate 290\r\nAcer TravelMate 330\r\nAcer TravelMate 330T\r\nAcer TravelMate 340T\r\nAcer TravelMate 350\r\nAcer TravelMate 351TEV\r\nAcer TravelMate 360\r\nAcer TravelMate 500\r\nAcer TravelMate 506\r\nAcer TravelMate 506DX\r\nAcer TravelMate 520\r\nAcer TravelMate 521T\r\nAcer TravelMate 521TE\r\nAcer TravelMate 521TXV\r\nAcer TravelMate 522\r\nAcer TravelMate 525\r\nAcer TravelMate 525TXV\r\nAcer TravelMate 527TXV\r\nAcer TravelMate 529TXV\r\nAcer TravelMate 530\r\nAcer TravelMate 600\r\nAcer TravelMate 600TER\r\nAcer TravelMate 602\r\nAcer TravelMate 602TER\r\nAcer TravelMate 603\r\nAcer TravelMate 610\r\nAcer TravelMate 620\r\nAcer TravelMate 630\r\nAcer TravelMate 730\r\nAcer TravelMate 730TXV\r\nAcer TravelMate 732\r\nAcer TravelMate 732TLV\r\nAcer TravelMate 735TLV\r\nAcer TravelMate 735TXV\r\nAcer TravelMate 738TLV\r\nAcer TravelMate 739TLV\r\nAcer TravelMate 740\r\nAcer TravelMate a550\r\nAcer TravelMate a551\r\nAcer TravelMate Alpha 550\r\nAcer TravelMate Alpha 551\r\nSharp PC-9000\r\nSharp PC-9050\r\nSharp PC-9300D\r\nSharp PC-9300T\r\nSharp PC-9320T\r\nSharp PC-9330T\r\nSharp PC-9340T ', '165', '19v 3.16a.jpg', 'Si', 'No'),
(14, 12, 'Nuevo', 'HP/Compaq', 'Compaq 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm \r\n\r\nReplace Part Number:\r\n298238-001, 298239-001, 0950-3634, 177624-001, 177626-001, 180675-001, 180676-001, 198713-001, 198714-001, 208190-001, 222113-001, 298237-001, AC-C10, CQPS1200, F1454A, F1454A#ABA, F1781A, F4814A, ADP-75FB\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nHP OmniBook 2100\r\nHP OmniBook 2103\r\nHP OmniBook 2104\r\nHP OmniBook 2105\r\nHP OmniBook 2106\r\nHP OmniBook 2120\r\nHP OmniBook 2121\r\nHP OmniBook 2122\r\nHP OmniBook 2123\r\nHP OmniBook 2124\r\nHP OmniBook 2125\r\nHP OmniBook 2126\r\nHP OmniBook 2127\r\nHP OmniBook 3000\r\nHP OmniBook 3000CTX\r\nHP OmniBook 3100\r\nHP OmniBook 3101\r\nHP OmniBook 3102\r\nHP OmniBook 3250\r\nHP OmniBook 4100\r\nHP OmniBook 4101\r\nHP OmniBook 4102\r\nHP OmniBook 4103\r\nHP OmniBook 4104\r\nHP OmniBook 4105\r\nHP OmniBook 4106\r\nHP OmniBook 4107\r\nHP OmniBook 4108\r\nHP OmniBook 4110\r\nHP OmniBook 4111\r\nHP OmniBook 4150\r\nHP OmniBook 4150B\r\nHP OmniBook 500\r\nHP OmniBook 500B\r\nHP OmniBook 6000\r\nHP OmniBook 6000 series\r\nHP OmniBook 6000B\r\nHP OmniBook 6000C\r\nHP OmniBook 6100\r\nHP OmniBook 7000\r\nHP OmniBook 7100\r\nHP OmniBook 7103T\r\nHP OmniBook 7150\r\nHP OmniBook 900\r\nHP OmniBook XE\r\nHP OmniBook XE 4100\r\nHP OmniBook XE 4500\r\nHP OmniBook XE-DA\r\nHP OmniBook XE2\r\nHP OmniBook XE2-DA\r\nHP OmniBook XE2-DB\r\nHP OmniBook XE2-DC\r\nHP OmniBook XE2-DD\r\nHP OmniBook XE2-DE\r\nHP OmniBook XE2-DI\r\nHP OmniBook XE3\r\nHP OmniBook XE3L HP Pavilion 6000\r\nHP Pavilion N3000 series\r\nHP Pavilion N3100\r\nHP Pavilion N3110\r\nHP Pavilion N3150\r\nHP Pavilion N3190\r\nHP Pavilion N3210\r\nHP Pavilion N3215\r\nHP Pavilion N3250\r\nHP Pavilion N3270\r\nHP Pavilion N3290\r\nHP Pavilion N3295\r\nHP Pavilion N3310\r\nHP Pavilion N3330\r\nHP Pavilion N3350\r\nHP Pavilion N3370\r\nHP Pavilion N3390\r\nHP Pavilion N3400 series\r\nHP Pavilion N3402\r\nHP Pavilion N3410\r\nHP Pavilion N3438\r\nHP Pavilion N3478\r\nHP Pavilion N3490\r\nHP Pavilion N5000\r\nHP Pavilion N5100 series\r\nHP Pavilion N5125\r\nHP Pavilion N5130\r\nHP Pavilion N5150\r\nHP Pavilion N5170\r\nHP Pavilion N5190\r\nHP Pavilion N5195\r\nHP Pavilion N5200 series\r\nHP Pavilion N5210\r\nHP Pavilion N5210M\r\nHP Pavilion N5240\r\nHP Pavilion N5250\r\nHP Pavilion N5270\r\nHP Pavilion N5290\r\nHP Pavilion N5295\r\nHP Pavilion N5300 series\r\nHP Pavilion N5310\r\nHP Pavilion N5340\r\nHP Pavilion N5350\r\nHP Pavilion N5390\r\nHP Pavilion N5400 series\r\nHP Pavilion N5415\r\nHP Pavilion N5420L\r\nHP Pavilion N5421L\r\nHP Pavilion N5425\r\nHP Pavilion N5430\r\nHP Pavilion N5435\r\nHP Pavilion N5440\r\nHP Pavilion N5441\r\nHP Pavilion N5445\r\nHP Pavilion N5450\r\nHP Pavilion N5451\r\nHP Pavilion N5455\r\nHP Pavilion N5470  HP Pavilion N5474\r\nHP Pavilion N5475\r\nHP Pavilion N5490\r\nHP Pavilion N5491\r\nHP Pavilion N5495\r\nHP Pavilion N5500 series\r\nHP Pavilion N5511L\r\nHP Pavilion N5584\r\nHP Pavilion N6000 series\r\nHP Pavilion N6100\r\nHP Pavilion N6195\r\nHP Pavilion XH series\r\nHP Pavilion XH156\r\nHP Pavilion XH176\r\nHP Pavilion XH226\r\nHP Pavilion XH260\r\nHP Pavilion XH35\r\nHP Pavilion XH365\r\nHP Pavilion XH395\r\nHP Pavilion XH455\r\nHP Pavilion XH485\r\nHP Pavilion XH555\r\nHP Pavilion XH675\r\nHP Pavilion XT118\r\nHP Pavilion XT155\r\nHP Pavilion XT236\r\nHP Pavilion XZ series\r\nHP Pavilion XZ185\r\nHP Pavilion XZ275\r\nHP Pavilion XZ295\r\nHP Pavilion XZ355\r\nHP Pavilion ZE4210\r\nHP Pavilion ZE4240\r\nHP Pavilion ZT1114\r\nHP Pavilion ZT1121s\r\nHP Pavilion ZT1125\r\nHP Pavilion ZT1130\r\nHP Pavilion ZT1131s\r\nHP Pavilion ZT1135\r\nHP Pavilion ZT1141\r\nHP Pavilion ZT1145\r\nHP Pavilion ZT1150\r\nHP Pavilion ZT1151\r\nHP Pavilion ZT1152\r\nHP Pavilion ZT1155\r\nHP Pavilion ZT1161\r\nHP Pavilion ZT1162\r\nHP Pavilion ZT1170\r\nHP Pavilion ZT1171\r\nHP Pavilion ZT1175\r\nHP Pavilion ZT1180\r\nHP Pavilion ZT1185\r\nHP Pavilion ZT1190\r\nHP Pavilion ZT1195\r\nHP Pavilion ZT1201\r\nHP Pavilion ZT1250\r\nHP Pavilion ZT1260\r\nHP Pavilion ZT1290\r\nArmada 2940\r\nEvo N105\r\nEvo N115\r\nEvo N160\r\nEvo N180\r\nPresario 1000\r\nPresario 1010\r\nPresario 1020\r\nPresario 1030\r\nPresario 1040\r\nPresario 1050\r\nPresario 1060\r\nPresario 1065\r\nPresario 1070\r\nPresario 1075\r\nPresario 1080\r\nPresario 1081\r\nPresario 1090\r\nPresario 1090ES\r\nPresario 1200\r\nPresario 1200T\r\nPresario 1200US\r\nPresario 1200XL\r\nPresario 1200XL101\r\nPresario 1200XL102\r\nPresario 1200XL103\r\nPresario 1200XL104\r\nPresario 1200XL105\r\nPresario 1200XL106\r\nPresario 1200XL109\r\nPresario 1200XL110\r\nPresario 1200XL111\r\nPresario 1200XL118\r\nPresario 1200XL119\r\nPresario 1200XL125\r\nPresario 1200XL126\r\nPresario 1200XL127\r\nPresario 1200XL3\r\nPresario 1200XL300\r\nPresario 1200XL325\r\nPresario 1200XL401\r\nPresario 1200XL404\r\nPresario 1200XL406\r\nPresario 1200XL408\r\nPresario 1200XL409\r\nPresario 1200XL420\r\nPresario 1200XL423\r\nPresario 1200XL500\r\nPresario 1200XL505\r\nPresario 1200XL510\r\nPresario 1200XL515\r\nPresario 1200XL526\r\nPresario 1201AP\r\nPresario 1201Z\r\nPresario 1207\r\nPresario 1210\r\nPresario 1214\r\nPresario 1214SR\r\nPresario 1215\r\nPresario 1216\r\nPresario 1220\r\nPresario 1221\r\nPresario 1230\r\nPresario 1232\r\nPresario 1234\r\nPresario 1235\r\nPresario 1236\r\nPresario 1237\r\nPresario 1240  Presario 1242\r\nPresario 1244\r\nPresario 1245\r\nPresario 1246\r\nPresario 1247\r\nPresario 1250\r\nPresario 1255\r\nPresario 1256\r\nPresario 1260\r\nPresario 1262\r\nPresario 1266\r\nPresario 1267\r\nPresario 1270\r\nPresario 1272\r\nPresario 1273\r\nPresario 1274\r\nPresario 1275\r\nPresario 1277\r\nPresario 1278\r\nPresario 1279\r\nPresario 1280\r\nPresario 12XL\r\nPresario 12XL series\r\nPresario 12XL115\r\nPresario 12XL125\r\nPresario 12XL300\r\nPresario 12XL310\r\nPresario 12XL325\r\nPresario 12XL326\r\nPresario 12XL327\r\nPresario 12XL4\r\nPresario 12XL400\r\nPresario 12XL401\r\nPresario 12XL405\r\nPresario 12XL410\r\nPresario 12XL420\r\nPresario 12XL426\r\nPresario 12XL427\r\nPresario 12XL430\r\nPresario 12XL500\r\nPresario 12XL505\r\nPresario 12XL510\r\nPresario 1400\r\nPresario 1400 series\r\nPresario 1400T\r\nPresario 1456\r\nPresario 14XL series\r\nPresario 14XL240\r\nPresario 14XL245\r\nPresario 14XL340\r\nPresario 14XL345\r\nPresario 1600\r\nPresario 1600XL145\r\nPresario 1610\r\nPresario 1611\r\nPresario 1615\r\nPresario 1620\r\nPresario 1621\r\nPresario 1622\r\nPresario 1625\r\nPresario 1626\r\nPresario 1630\r\nPresario 1635\r\nPresario 1640\r\nPresario 1650\r\nPresario 1655\r\nPresario 1665\r\nPresario 1670\r\nPresario 1672  Presario 1675\r\nPresario 1680\r\nPresario 1681\r\nPresario 1682\r\nPresario 1685\r\nPresario 1687\r\nPresario 1688\r\nPresario 1690\r\nPresario 1692\r\nPresario 1693\r\nPresario 1694\r\nPresario 1700\r\nPresario 1700T\r\nPresario 1700XL573\r\nPresario 1710 (new version)\r\nPresario 1710LA\r\nPresario 1710SB (new version)\r\nPresario 1714EA\r\nPresario 1720US\r\nPresario 17XL series\r\nPresario 17XL265\r\nPresario 17XL275\r\nPresario 17XL360\r\nPresario 17XL362\r\nPresario 17XL365\r\nPresario 17XL375\r\nPresario 17XL460\r\nPresario 17XL465\r\nPresario 17XL475\r\nPresario 17XL570\r\nPresario 1800\r\nPresario 1800T\r\nPresario 1800T-800\r\nPresario 1800T-850\r\nPresario 1800XL\r\nPresario 1800XL190\r\nPresario 1800XL280\r\nPresario 1800XL380\r\nPresario 1800XL390\r\nPresario 1800XL481\r\nPresario 1805\r\nPresario 1810\r\nPresario 1825\r\nPresario 1827\r\nPresario 1830\r\nPresario 18XL series\r\nPresario 18XL280\r\nPresario 18XL380\r\nPresario 18XL390\r\nPresario 18XL580\r\nPresario 18XL590\r\nPresario 2700 series\r\nPresario 2700T\r\nPresario 700\r\nPresario 700 series\r\nPresario 700US\r\nPresario 700Z\r\nPresario 705\r\nPresario 705US\r\nPresario 710\r\nPresario 711cl\r\nPresario 715\r\nPresario 721CL\r\nPresario 723RSH\r\nPresario 725\r\nPresario 725US\r\nPresario 800\r\nPresario 800 series\r\nPresario 800XL\r\nPresario 80XL550 ', '165', '19v 3.16a.jpg', 'Si', 'No'),
(15, 12, 'Nuevo', 'Fujifsu', 'Fujitsu 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 4.4mm\r\n    External Diameter: 6.5mm\r\n    With pin inside\r\n\r\nReplace Part Number: FMV-AC312\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nFujitsu Lifebook C2010, C2110, C2111 ', '165', 'fujitsu 19v 3.16a.jpg', 'No', 'No'),
(16, 12, 'Nuevo', 'Nec', 'NEC 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm \r\n\r\nReplace Part Number: AC-C10, ADP64, PA-1600-001, PA-1600-05, OP-520-67501\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nNEC Ready 440T\r\nNEC Versa 2400\r\nNEC Versa 2400CD\r\nNEC Versa 2405\r\nNEC Versa 2405CD\r\nNEC Versa 2430\r\nNEC Versa 2430CD\r\nNEC Versa 2435CD\r\n\r\nNEC Versa 2435CD                                             \r\nNEC Versa 2500\r\nNEC Versa 2500CD\r\nNEC Versa 2505\r\nNEC Versa 2530\r\nNEC Versa 500\r\nNEC Versa 5000\r\n\r\nNEC Versa 5060\r\nNEC Versa 5060X\r\nNEC Versa 5080\r\nNEC Versa 5080X\r\nNEC Versa 550D\r\nNEC Versa SXI\r\nNEC Versa Note', '165', 'nec 19v 3.16a.jpg', 'Si', 'No');
INSERT INTO `equipos` (`id_equip`, `id_tp`, `status_equip`, `marca_equip`, `caract_equip`, `precio_equip`, `img_equip`, `vent_equip`, `ppal_equip`) VALUES
(17, 12, 'Nuevo', 'Liteon', 'Liteon 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size:\r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number:\r\nLiteon: PA-1600-02, PA-1600-05, PA-1600-07\r\n\r\nToshiba: PA3032U-1ACA, A3097U-1ACA, PA3032E-1ACA, PA3097E-1ACA\r\n\r\nCompaq: 298239-001, LE-9702A+, 177624-001, 177626-001, 180675-001, 180676-001, 198713-001, 198714-001, 208190-001, 222113-001, 298237-001, CQPS1200, ADP-45TB, ADP-60BB, ADP-60DB, ADP-9510-19A, API-7595, API-7629\r\n\r\nNEC: AC-C10, ADP64\r\n\r\nHP: F1454A, F1454A#ABA, F1781A, F4814A, ADP-75FB, 0950-3634, F1781A, F1454A, F4814A, ADP-75FB\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nAcbel Polytech AC Adapters\r\nAcer AcerNote 367D\r\nAcer AcerNote 367T\r\nAcer AcerNote 390\r\nAcer AcerNote 390A\r\nAcer AcerNote 391\r\nAcer AcerNote 392\r\nAcer AcerNote 393\r\nAcer AcerNote 394\r\nAcer AcerNote 395\r\nAcer Anywhere 1100LX\r\nAcer Anywhere 1120LX\r\nAcer Extensa 365\r\nAcer Extensa 366D\r\nAcer Extensa 367D\r\nAcer Extensa 368D\r\nAcer Extensa 390\r\nAcer Extensa 390C\r\nAcer Extensa 390CX\r\nAcer Extensa 393\r\nAcer Extensa 900\r\nAcer Extensa ESS3-391T\r\nAcom FT6000A\r\nAcom Patriot 8000 Acom Patriot 8800\r\nAct P-88T\r\nAEC Olympia LT386SX\r\nAIM Green 759\r\nAlcam D400\r\nAlcam Designer 400\r\nAltima Maestro P79R\r\nAltima P88T\r\nAMS Tech Rodeo 1000CT\r\nAMS Tech Rodeo 1000CX\r\nAMS Tech Rodeo 1010CT\r\nAMS Tech Rodeo 1010CX\r\nAMS Tech Rodeo 1010CXNT\r\nAMS Tech Rodeo 7000\r\nAMS Tech Rodeo 7030ECX\r\nAMS Tech Rodeo 7620\r\nAMS Tech Rodeo 7630ECXDNT\r\nAMS Tech Rodeo 7640XL\r\nAMS Tech TravelPro 180\r\nAMS Tech TravelPro 1900\r\nAPP 87\r\nAPT Green 795\r\nArgonaut Scout\r\nArm 1100\r\nArm ArmNote N30W\r\nArm Green 759\r\nArm TS30i2\r\nArm TS30W\r\nArm TS759\r\nArm TS795\r\nAspen 6200D\r\nAtasi 1100\r\nAtasi 1200\r\nAtasi 900\r\nBSI 6200D\r\nCanon InnovaBook 300P\r\nCanon InnovaBook 350CD\r\nCanon InnovaBook 360CD\r\nCanon InnovaBook 475CDS\r\nCanon InnovaBook 475CDT\r\nCanon InnovaBook 480CDS\r\nCanon InnovaBook 480CDT\r\nCanon InnovaBook 490CDS\r\nCanon InnovaBook 490CDT\r\nChaplet 1100\r\nChaplet iLufa 800\r\nChaplet iLufa 820\r\nChem USA ChemBook 1100\r\nChem USA ChemBook 6200D\r\nChem USA ChemBook N30W Chicony 6200\r\nClevo 86CE\r\nClevo 98\r\nClevo Model 862\r\nClevo Multimedia Model 98\r\nCommax 6200D\r\nCommax NB8600\r\nCommodore Featron 6000\r\nCommodore P100\r\nCompal N30B2\r\nCompal N30W\r\nCompal N32NC\r\nCompal TS30H\r\nCompal TS30I\r\nCompal TS30I3\r\nCompal TS30T\r\nCompal TS30T3\r\nCompal TS30W\r\nCompaq Armada 2940\r\nCompaq Evo N105\r\nCompaq Evo N115\r\nCompaq Evo N160\r\nCompaq Evo N180\r\nCompaq Presario 1000\r\nCompaq Presario 1010\r\nCompaq Presario 1020\r\nCompaq Presario 1030\r\nCompaq Presario 1040\r\nCompaq Presario 1050\r\nCompaq Presario 1060\r\nCompaq Presario 1065\r\nCompaq Presario 1070\r\nCompaq Presario 1075\r\nCompaq Presario 1080\r\nCompaq Presario 1081\r\nCompaq Presario 1090\r\nCompaq Presario 1090ES\r\nCompaq Presario 1200\r\nCompaq Presario 1200T\r\nCompaq Presario 1200US\r\nCompaq Presario 1200XL\r\nCompaq Presario 1200XL101\r\nCompaq Presario 1200XL102\r\nCompaq Presario 1200XL103\r\nCompaq Presario 1200XL104\r\nCompaq Presario 1200XL105\r\nCompaq Presario 1200XL106\r\nCompaq Presario 1200XL109\r\nCompaq Presario 1200XL110\r\nCompaq Presario 1200XL111 Compaq Presario 1200XL118\r\nCompaq Presario 1200XL119\r\nCompaq Presario 1200XL125\r\nCompaq Presario 1200XL126\r\nCompaq Presario 1200XL127\r\nCompaq Presario 1200XL3\r\nCompaq Presario 1200XL300\r\nCompaq Presario 1200XL325\r\nCompaq Presario 1200XL401\r\nCompaq Presario 1200XL404\r\nCompaq Presario 1200XL406\r\nCompaq Presario 1200XL408\r\nCompaq Presario 1200XL409\r\nCompaq Presario 1200XL420\r\nCompaq Presario 1200XL423\r\nCompaq Presario 1200XL500\r\nCompaq Presario 1200XL505\r\nCompaq Presario 1200XL510\r\nCompaq Presario 1200XL515\r\nCompaq Presario 1200XL526\r\nCompaq Presario 1201AP\r\nCompaq Presario 1201Z\r\nCompaq Presario 1207\r\nCompaq Presario 1210\r\nCompaq Presario 1214\r\nCompaq Presario 1214SR\r\nCompaq Presario 1215\r\nCompaq Presario 1216\r\nCompaq Presario 1220\r\nCompaq Presario 1221\r\nCompaq Presario 1230\r\nCompaq Presario 1232\r\nCompaq Presario 1234\r\nCompaq Presario 1235\r\nCompaq Presario 1236\r\nCompaq Presario 1237\r\nCompaq Presario 1240\r\nCompaq Presario 1242\r\nCompaq Presario 1244\r\nCompaq Presario 1245\r\nCompaq Presario 1246\r\nCompaq Presario 1247\r\nCompaq Presario 1250\r\nCompaq Presario 1255\r\nCompaq Presario 1256\r\nCompaq Presario 1260\r\nCompaq Presario 1262\r\nCompaq Presario 1266\r\nCompaq Presario 1267\r\nCompaq Presario 1270 Compaq Presario 1272\r\nCompaq Presario 1273\r\nCompaq Presario 1274\r\nCompaq Presario 1275\r\nCompaq Presario 1277\r\nCompaq Presario 1278\r\nCompaq Presario 1279\r\nCompaq Presario 1280\r\nCompaq Presario 12XL\r\nCompaq Presario 12XL series\r\nCompaq Presario 12XL115\r\nCompaq Presario 12XL125\r\nCompaq Presario 12XL300\r\nCompaq Presario 12XL310\r\nCompaq Presario 12XL325\r\nCompaq Presario 12XL326\r\nCompaq Presario 12XL327\r\nCompaq Presario 12XL4\r\nCompaq Presario 12XL400\r\nCompaq Presario 12XL401\r\nCompaq Presario 12XL405\r\nCompaq Presario 12XL410\r\nCompaq Presario 12XL420\r\nCompaq Presario 12XL426\r\nCompaq Presario 12XL427\r\nCompaq Presario 12XL430\r\nCompaq Presario 12XL500\r\nCompaq Presario 12XL505\r\nCompaq Presario 12XL510\r\nCompaq Presario 1400\r\nCompaq Presario 1400 series\r\nCompaq Presario 1400T\r\nCompaq Presario 1456\r\nCompaq Presario 14XL series\r\nCompaq Presario 14XL240\r\nCompaq Presario 14XL245\r\nCompaq Presario 14XL340\r\nCompaq Presario 14XL345\r\nCompaq Presario 1600\r\nCompaq Presario 1600XL145\r\nCompaq Presario 1610\r\nCompaq Presario 1611\r\nCompaq Presario 1615\r\nCompaq Presario 1620\r\nCompaq Presario 1621\r\nCompaq Presario 1622\r\nCompaq Presario 1625\r\nCompaq Presario 1626\r\nCompaq Presario 1630\r\nCompaq Presario 1635 Compaq Presario 1640\r\nCompaq Presario 1650\r\nCompaq Presario 1655\r\nCompaq Presario 1665\r\nCompaq Presario 1670\r\nCompaq Presario 1672\r\nCompaq Presario 1675\r\nCompaq Presario 1680\r\nCompaq Presario 1681\r\nCompaq Presario 1682\r\nCompaq Presario 1685\r\nCompaq Presario 1687\r\nCompaq Presario 1688\r\nCompaq Presario 1690\r\nCompaq Presario 1692\r\nCompaq Presario 1693\r\nCompaq Presario 1694\r\nCompaq Presario 1700\r\nCompaq Presario 1700T\r\nCompaq Presario 1700XL573\r\nCompaq Presario 1710 (new version)\r\nCompaq Presario 1710LA\r\nCompaq Presario 1710SB (new version)\r\nCompaq Presario 1714EA\r\nCompaq Presario 1720US\r\nCompaq Presario 17XL series\r\nCompaq Presario 17XL265\r\nCompaq Presario 17XL275\r\nCompaq Presario 17XL360\r\nCompaq Presario 17XL362\r\nCompaq Presario 17XL365\r\nCompaq Presario 17XL375\r\nCompaq Presario 17XL460\r\nCompaq Presario 17XL465\r\nCompaq Presario 17XL475\r\nCompaq Presario 17XL570\r\nCompaq Presario 1800\r\nCompaq Presario 1800T\r\nCompaq Presario 1800T-800\r\nCompaq Presario 1800T-850\r\nCompaq Presario 1800XL\r\nCompaq Presario 1800XL190\r\nCompaq Presario 1800XL280\r\nCompaq Presario 1800XL380\r\nCompaq Presario 1800XL390\r\nCompaq Presario 1800XL481\r\nCompaq Presario 1805\r\nCompaq Presario 1810\r\nCompaq Presario 1825\r\nCompaq Presario 1827 Compaq Presario 1830\r\nCompaq Presario 18XL series\r\nCompaq Presario 18XL280\r\nCompaq Presario 18XL380\r\nCompaq Presario 18XL390\r\nCompaq Presario 18XL580\r\nCompaq Presario 18XL590\r\nCompaq Presario 2700 series\r\nCompaq Presario 2700T\r\nCompaq Presario 700\r\nCompaq Presario 700 series\r\nCompaq Presario 700US\r\nCompaq Presario 700Z\r\nCompaq Presario 705\r\nCompaq Presario 705US\r\nCompaq Presario 710\r\nCompaq Presario 711cl\r\nCompaq Presario 715\r\nCompaq Presario 721CL\r\nCompaq Presario 723RSH\r\nCompaq Presario 725\r\nCompaq Presario 725US\r\nCompaq Presario 800\r\nCompaq Presario 800 series\r\nCompaq Presario 800XL\r\nCompaq Presario 80XL550\r\nCompaq Prosignia 150\r\nComputerBook 6200T\r\nConsul 98\r\nCTX 893-T-FK\r\nCTX EZBook 330F\r\nCTX EZBook 390T\r\nCTX EZBook 400\r\n CTX EZBook 486\r\nCTX EZBook 500\r\nCTX EZBook 600\r\nCTX EZBook 650CDT\r\nCTX EZBook 660CDT\r\nCTX EZBook 700\r\nCTX EZBook 700E\r\nCTX EZBook 700G\r\nCTX EZBook 700M\r\nCTX EZBook 730CS\r\nCTX EZBook 750CDT\r\nCTX EZBook 750CS\r\nCTX EZBook 750MS\r\nCTX EZBook 750MT\r\nCTX EZBook 760MS\r\nCTX EZBook 760MS-XJ\r\nCTX EZBook 760MS-XK CTX EZBook 760MTXK\r\nCTX EZBook 764MS-XK\r\nCTX EZBook 764MT\r\nCTX EZBook 764MT-XK\r\nCTX EZBook 770MS-XJ\r\nCTX EZBook 770MT-XJ\r\nCTX EZBook 772 MS-MK\r\nCTX EZBook 772MT-MK\r\nCTX EZBook 774 MTFK\r\nCTX EZBook 774MS-MK\r\nCTX EZBook 774MT-MK\r\nCTX EZBook 777MS-MK\r\nCTX EZBook 777MT-FK\r\nCTX EZBook 777MT-MK\r\nCTX EZBook 800\r\nCTX EZBook 891\r\nCTX EZBook 891E\r\nCTX EZBook 893-T-FK\r\nCTX EZBook CD\r\nCTX FC2A300\r\nCTX FC2A300A\r\nCTX FC3A300\r\nCTX MegaPro 486\r\nCTX V92C266\r\nDEC HiNote VP 700\r\nDEC HiNote VP 715\r\nDEC HiNote VP 717\r\nDEC HiNote VP 725\r\nDEC HiNote VP 735\r\nDEC HiNote VP 745\r\nDEC HiNote VP 745CT\r\nDEC HiNote VP 765\r\nDelcomp Allistra 6200D\r\nDell Inspiron 3000\r\nDell Inspiron 3200\r\nDell Inspiron 3500\r\nDell Inspiron 3500 D233XT\r\nDell Inspiron 3500 D266GT\r\nDell Inspiron 3500 D300GT\r\nDell Inspiron 7000\r\nDell Inspiron 7000 D266GT\r\nDell Inspiron 7000 D300LT\r\nDell Inspiron 7000 series\r\nDigiBook 1100\r\nDigiBook Wizard\r\nDTK Multimedia Model 86\r\nDTK Top-5A\r\nDual Technologies AIO-6200\r\nE-Machines Eslate 400K\r\nE-Machines eSlate 450K EPS P75\r\nEPS Pentium 120\r\nEpson ActionNote 800\r\nEpson ActionNote 866C\r\nEpson ActionNote 880C\r\nEpson ActionNote 880CX\r\nEpson ActionNote 890C\r\nEpson ActionNote 895C\r\nEpson ActionNote 895CX\r\nEpson ActionNote 910C\r\nEscom P100\r\nEurocom 6100T\r\nEurocom 7200-T4\r\nEverex 3500\r\nEverex ExpressNote 586\r\nEverex StepNote Plus\r\nEverex StepNote SR\r\nEvesham Micros Vale Voyager II\r\nFeatron FT6000E\r\nFIC A420\r\nFIC A430\r\nFIC A440\r\nFIC A450\r\nFosa 6200D\r\nFujitsu LifeBook A4170\r\nFujitsu LifeBook A4177\r\nFujitsu LifeBook A4178\r\nFujitsu LifeBook A4187\r\nFujitsu LifeBook A4190\r\nFujitsu Parts\r\nFutureTech 6200D\r\nHP Batteries\r\nHP Deskjet 450\r\nHP OmniBook 2100\r\nHP OmniBook 2103\r\nHP OmniBook 2104\r\nHP OmniBook 2105\r\nHP OmniBook 2106\r\nHP OmniBook 2120\r\nHP OmniBook 2121\r\nHP OmniBook 2122\r\nHP OmniBook 2123\r\nHP OmniBook 2124\r\nHP OmniBook 2125\r\nHP OmniBook 2126\r\nHP OmniBook 2127\r\nHP OmniBook 3000\r\nHP OmniBook 3000CTX\r\nHP OmniBook 3100\r\nHP OmniBook 3101 HP OmniBook 3102\r\nHP OmniBook 3250\r\nHP OmniBook 4100\r\nHP OmniBook 4101\r\nHP OmniBook 4102\r\nHP OmniBook 4103\r\nHP OmniBook 4104\r\nHP OmniBook 4105\r\nHP OmniBook 4106\r\nHP OmniBook 4107\r\nHP OmniBook 4108\r\nHP OmniBook 4110\r\nHP OmniBook 4111\r\nHP OmniBook 4150\r\nHP OmniBook 4150B\r\nHP OmniBook 500\r\nHP OmniBook 500B\r\nHP OmniBook 6000\r\nHP OmniBook 6000 series\r\nHP OmniBook 6000B\r\nHP OmniBook 6000C\r\nHP OmniBook 6100\r\nHP OmniBook 7000\r\nHP OmniBook 7100\r\nHP OmniBook 7103T\r\nHP OmniBook 7150\r\nHP OmniBook 900\r\nHP OmniBook XE\r\nHP OmniBook XE 4100\r\nHP OmniBook XE 4500\r\nHP OmniBook XE-DA\r\nHP OmniBook XE2\r\nHP OmniBook XE2-DA\r\nHP OmniBook XE2-DB\r\nHP OmniBook XE2-DC\r\nHP OmniBook XE2-DD\r\nHP OmniBook XE2-DE\r\nHP OmniBook XE2-DI\r\nHP OmniBook XE3\r\nHP OmniBook XE3L\r\nHP Pavilion 6000\r\nHP Pavilion N3000 series\r\nHP Pavilion N3100\r\nHP Pavilion N3110\r\nHP Pavilion N3150\r\nHP Pavilion N3190\r\nHP Pavilion N3210\r\nHP Pavilion N3215\r\nHP Pavilion N3250\r\nHP Pavilion N3270 HP Pavilion N3290\r\nHP Pavilion N3295\r\nHP Pavilion N3310\r\nHP Pavilion N3330\r\nHP Pavilion N3350\r\nHP Pavilion N3370\r\nHP Pavilion N3390\r\nHP Pavilion N3400 series\r\nHP Pavilion N3402\r\nHP Pavilion N3410\r\nHP Pavilion N3438\r\nHP Pavilion N3478\r\nHP Pavilion N3490\r\nHP Pavilion N5000\r\nHP Pavilion N5100 series\r\nHP Pavilion N5125\r\nHP Pavilion N5130\r\nHP Pavilion N5150\r\nHP Pavilion N5170\r\nHP Pavilion N5190\r\nHP Pavilion N5195\r\nHP Pavilion N5200 series\r\nHP Pavilion N5210\r\nHP Pavilion N5210M\r\nHP Pavilion N5240\r\nHP Pavilion N5250\r\nHP Pavilion N5270\r\nHP Pavilion N5290\r\nHP Pavilion N5295\r\nHP Pavilion N5300 series\r\nHP Pavilion N5310\r\nHP Pavilion N5340\r\nHP Pavilion N5350\r\nHP Pavilion N5390\r\nHP Pavilion N5400 series\r\nHP Pavilion N5415\r\nHP Pavilion N5420L\r\nHP Pavilion N5421L\r\nHP Pavilion N5425\r\nHP Pavilion N5430\r\nHP Pavilion N5435\r\nHP Pavilion N5440\r\nHP Pavilion N5441\r\nHP Pavilion N5445\r\nHP Pavilion N5450\r\nHP Pavilion N5451\r\nHP Pavilion N5455\r\nHP Pavilion N5470\r\nHP Pavilion N5474\r\nHP Pavilion N5475 HP Pavilion N5490\r\nHP Pavilion N5491\r\nHP Pavilion N5495\r\nHP Pavilion N5500 series\r\nHP Pavilion N5511L\r\nHP Pavilion N5584\r\nHP Pavilion N6000 series\r\nHP Pavilion N6100\r\nHP Pavilion N6195\r\nHP Pavilion XH series\r\nHP Pavilion XH156\r\nHP Pavilion XH176\r\nHP Pavilion XH226\r\nHP Pavilion XH260\r\nHP Pavilion XH35\r\nHP Pavilion XH365\r\nHP Pavilion XH395\r\nHP Pavilion XH455\r\nHP Pavilion XH485\r\nHP Pavilion XH555\r\nHP Pavilion XH675\r\nHP Pavilion XT118\r\nHP Pavilion XT155\r\nHP Pavilion XT236\r\nHP Pavilion XZ series\r\nHP Pavilion XZ185\r\nHP Pavilion XZ275\r\nHP Pavilion XZ295\r\nHP Pavilion XZ355\r\nHP Pavilion ZE4210\r\nHP Pavilion ZE4240\r\nHP Pavilion ZT1114\r\nHP Pavilion ZT1121s\r\nHP Pavilion ZT1125\r\nHP Pavilion ZT1130\r\nHP Pavilion ZT1131s\r\nHP Pavilion ZT1135\r\nHP Pavilion ZT1141\r\nHP Pavilion ZT1145\r\nHP Pavilion ZT1150\r\nHP Pavilion ZT1151\r\nHP Pavilion ZT1152\r\nHP Pavilion ZT1155\r\nHP Pavilion ZT1161\r\nHP Pavilion ZT1162\r\nHP Pavilion ZT1170\r\nHP Pavilion ZT1171\r\nHP Pavilion ZT1175\r\nHP Pavilion ZT1180\r\nHP Pavilion ZT1185 HP Pavilion ZT1190\r\nHP Pavilion ZT1195\r\nHP Pavilion ZT1201\r\nHP Pavilion ZT1250\r\nHP Pavilion ZT1260\r\nHP Pavilion ZT1290\r\nHitachi VisionBook\r\nHitachi VisionBook +\r\nHitachi VisionBook 133\r\nHitachi VisionBook 4000\r\nHitachi VisionBook 4000 series\r\nHitachi VisionBook 4140\r\nHitachi VisionBook 4140X\r\nHitachi VisionBook 4150\r\nHitachi VisionBook 4150X\r\nHitachi VisionBook 4350X\r\nHitachi VisionBook 4360X\r\nHitachi Visionbook Plus\r\nHitachi VisionBook Plus 4000\r\nHitachi VisionBook Plus 4140\r\nIDP 87\r\nIDP 910T\r\nIlan Tech AC Adapters\r\nImac Notebook\r\nInca Legend 60\r\nInfotel SW-15-T700\r\nIntergraph 6200AT\r\nInteva TS30H\r\nInteva TS30T\r\nIona 1100\r\nJetta JetBook 9100\r\nKapok 6100\r\nKapok 6300\r\nKapok 6400\r\nKapok 7600\r\nKapok 7800\r\nKDS Valiant 5000\r\nKDS Valiant 5340AS\r\nKDS Valiant 5347AS\r\nKDS Valiant 5350AS\r\n KDS Valiant 6370\r\nKDS Valiant 6370iPT\r\nKDS Valiant 6380iPTD\r\nKDS Valiant 6480iPTD\r\nKDS Valiant 6481CIPTD\r\nKDS Valiant 6530\r\nKDS Valiant 671DP\r\nKDS Valiant 671XH\r\nKDS Valient 6000\r\nKiwi OpenNote 281 Lap-Note 98\r\nLap-Note Z200\r\nLap-Note Z300\r\nLeo DESIGNote 5200 GT\r\nLeo DESIGNote 5600\r\nLG Electronics Tiger One\r\nLightspeed Technology 6200D\r\nLion Electronics 8600T\r\nM Tech 30W\r\nMagitronic 550\r\nMagitronic 800\r\nMagitronic 820T\r\nMagitronic 862\r\nMagitronic Multimedia Model 86\r\nMagitronic Pentium 86\r\nMaximus Green 759\r\nMedion MD9326\r\nMicon 6200D\r\nMicro Express NP8500\r\nMicro Express NP92DX4\r\nMicro International Mint 6200\r\nMicro International Mint 6200D\r\nMicro Quest P79\r\nMicro Quest P88TE\r\nMicroFlex FlexNote\r\nMicron TransPort Trek2\r\nMicron TransPort Trek2 233\r\nMicron TransPort Trek2 266\r\nMicron TransPort Trek2 300 DVD\r\nMicroStar 6200D\r\nMidwest Micro TS30SI\r\nMidwest Micro TS30ST\r\nMobile Computing Innovations @Book 1100\r\nMobile Computing Innovations @Book 900\r\nMPC M700\r\nMPC TouchNote 700\r\nMultimedia Notebook 6200AT\r\nMultimedia Notebook 6600\r\nMultimedia Notebook 862\r\nMultimedia Notebook 98\r\nMultimedia Notebook Model 86\r\nNEC Ready 440T\r\nNEC Versa 2400\r\nNEC Versa 2400CD\r\nNEC Versa 2405\r\nNEC Versa 2405CD\r\nNEC Versa 2430\r\nNEC Versa 2430CD\r\nNEC Versa 2435C\r\nNEC Versa 2435CD NEC Versa 2500\r\nNEC Versa 2500CD\r\nNEC Versa 2505\r\nNEC Versa 2530\r\nNEC Versa 500\r\nNEC Versa 5000\r\nNEC Versa 5060\r\nNEC Versa 5060X\r\nNEC Versa 5080\r\nNEC Versa 5080X\r\nNEC Versa 550D\r\nNEC Versa SXI\r\nNEC VersaNote\r\nNimantics 6200T\r\nNimantics HS166M\r\nNimantics Orion 10XL\r\nNimantics Orion HS166M\r\nNimantics P79\r\nNimantics Pentium SL86\r\nNorthgate NB86\r\nNova MultiMedia NoteBook 86\r\nNova NP8100\r\nNova NP8320\r\nNovatech MultiMedia Portable Computer 98\r\nNTK Submarine\r\nOlivetti Echos 1200L\r\nOlivetti Echos 910\r\nOlivetti Echos P100\r\nOlivetti Echos P100C\r\nOlivetti Echos P100D\r\nOlivetti Echos P100E\r\nOlivetti Echos P12\r\nOlivetti Echos P120\r\nOlivetti Echos P120E\r\nOlivetti Echos P133C\r\nOlivetti Echos P133S\r\nOlivetti Echos P1400C\r\nOlivetti Echos P90\r\nOlivetti Echos Pro\r\nOlivetti Echos Pro 150X\r\nOlivetti Echos Pro P133\r\nOlivetti Xtreme\r\nOlympia 386SX\r\nOlympia LT386SX\r\nOutbound 2000\r\nOutbound 2030\r\nOutbound 2030A\r\nPatriot 800\r\nPatriot 8000\r\nPatriot 860C Patriot 8890\r\nPatriot 9000 C86\r\nPatriot FT6000A\r\nPhilips NB470\r\nPhilips NB570\r\nPhilips TravelMate 570\r\nPico Consol 98\r\nPionex N30W\r\nPionex TS30i\r\nPrimeBook 900\r\nProScan 862\r\nProstar 7200\r\nProstar 86\r\nQuanson 862\r\nQuanson 87\r\nQuanson 98\r\nQuantex 1511-I\r\nQuantex I-1410\r\nQuantex N30W\r\nQuantex T-1401\r\nQuantex T-1410\r\nQuantex T1411\r\nQuantex TS30H\r\nQuantex TS30H-1331\r\nQuantex TS30I\r\nQuantex TS30I3\r\nQuantex TS30T\r\nQuantex W-1400\r\nQuantex W-1500\r\nQuantex W-1500 700\r\nQuantex W-1511\r\nQuintek i1401\r\nSager 6200\r\nSager 6200D\r\nSager 7200\r\nSager 8549 D20\r\nSager 86\r\nSager 862\r\nSager 87\r\nSager 8700\r\nSager 98\r\nSager Model 87\r\nSager Model 98\r\nSager NB8600\r\nSager NB8700\r\nSager NP8100\r\nSager NP8300\r\nSager NP8320\r\nSager NP8500\r\nSager NP8550 Sager NP8600\r\nSager NP8620\r\nSager NP8623\r\nSager NP8680\r\nSager NP8700\r\nSager Pentium 86\r\nSceptre N30W\r\nSceptre NB30B2\r\nSceptre S69002\r\nSceptre S69502\r\nSceptre SoundX S\r\nSceptre SoundX S5200T\r\nSceptre SoundX S5500T\r\nSceptre TS30H\r\nSceptre TS30W\r\nSharp PC-3010\r\nSharp PC-3020\r\nSharp PC-3050\r\nSharp PC-3060\r\nSharp PC-3150\r\nSmart-Tec NX-6000\r\nSmart-Tec NX-6600\r\nSotec Eagle X\r\nTagram 822\r\nTI Extensa 350\r\nTI Extensa 365\r\nTI Extensa 366\r\nTI Extensa 367\r\nTI Extensa 390\r\nTI Extensa 390CX\r\nTI Extensa 391\r\nTI Extensa 392\r\nTI Extensa 393\r\nTI Extensa 394\r\nTI Extensa 395\r\nTI Extensa 550\r\nTI Extensa 550CD\r\nTI Extensa 550CDT\r\nTI Extensa 555\r\nTI Extensa 555CD\r\nTI Extensa 555CDT\r\nTI Extensa 560\r\nTI Extensa 560CD\r\nTI Extensa 560CDT\r\nTI Extensa 565\r\nTI Extensa 565CD\r\nTI Extensa 565CDT\r\nTI Extensa 570\r\nTI Extensa 570CD\r\nTI Extensa 570CDT TI Extensa 570CDTSE\r\nTI Extensa 575\r\nTI Extensa 575CD\r\nTI Extensa 575CDT\r\nTI Extensa 900\r\nTI Extensa 900 series\r\nTI Extensa 900CDT\r\nTI Extensa 900T\r\nTiger Direct DESIGNote 5200\r\nTiger Direct DESIGNote 5200 GT\r\nTiger Direct GT\r\nTime 163NE14GB2 E500P AMD\r\nTime M700\r\nTime Traveller A430\r\nTiny A440\r\nTiny Model 440\r\nToshiba DynaBook SS425\r\nToshiba Satellite 1000\r\nToshiba Satellite 1000-Z2\r\nToshiba Satellite 1005\r\nToshiba Satellite 1005-S157\r\nToshiba Satellite 1100-S101\r\nToshiba Satellite 1200 series\r\nToshiba Satellite 1200-S121\r\nToshiba Satellite 1200-S122\r\nToshiba Satellite 1200-S252\r\nToshiba Satellite 1600 series\r\nToshiba Satellite 1605CDS\r\nToshiba Satellite 1620CDS\r\nToshiba Satellite 1625CDT\r\nToshiba Satellite 1640CDT\r\nToshiba Satellite 1670CDS\r\nToshiba Satellite 1675CDS\r\nToshiba Satellite 1690CDT\r\nToshiba Satellite 1695CDT\r\nToshiba Satellite 1700 series\r\nToshiba Satellite 1715XCDS\r\nToshiba Satellite 1730\r\nToshiba Satellite 1730CDT\r\nToshiba Satellite 1735XCDS\r\nToshiba Satellite 1755\r\nToshiba Satellite 1755CDT\r\nToshiba Satellite 1755CE\r\nToshiba Satellite 1755DVD\r\nToshiba Satellite 3000 series\r\nToshiba Satellite 3000-S304\r\nToshiba Satellite 3000-S353\r\nToshiba Satellite 3000-S514\r\nToshiba Satellite 3005-S303\r\nToshiba Satellite 3005-S304 Toshiba Satellite 3005-S403\r\nToshiba Satellite 3005-S504\r\nTripp Lite s\r\nTrogon E.3\r\nTrogon Green 759\r\nTrogon Green 795\r\nTrogon T.22\r\nTrogon TG-795\r\nTulip Motionline 5/90\r\nTwinhead P88\r\nTwinhead P88TE\r\nTwinhead SlimNote 910CV\r\nTwinhead SlimNote 9133TV\r\nTwinhead SlimNote 9133TZ\r\nTwinhead SlimNote 9150TZ\r\nTwinhead SlimNote 9166TZ\r\nTwinhead SlimNote VX\r\nTwinhead SlimNote VXE\r\nTwinhead SlimNote VXE3\r\nTwinhead SlimNote VXE500\r\nUltra A440-T14\r\nUmax ActionBook 300C\r\nUmax ActionBook 530T\r\nVeridata Megapro 486D\r\nWedge Technologies 6200D\r\nWinbook J1\r\nWinbook N\r\nWinbook X1, X2, X4, XLi, XP, Z\r\nWinbook Si\r\nWinbook Si 566/32\r\nWinbook Si 566/64\r\nWinbook Si 650 TFT\r\nWinbook Si 700\r\nWinbook Si 700M\r\nWinbook Si 800 TFT\r\nWinbook Si 800/128\r\nWinbook Si 800CD\r\nWinbook Si 800M\r\nWinbook Si 850\r\nWinbook Si 850DVD Winbook Si2 850\r\nWinbook Si2 series\r\nWinbook XL\r\nWinbook XL 300TFT\r\nWinbook XLI\r\nWinbook XP\r\nWinbook XP5\r\nWinbook Z1\r\nWinbook Z1 850\r\nWindrover N30W\r\nZenith ZDS VersaNote', '165', '19v 3.16a.jpg', 'Si', 'No'),
(18, 12, 'Nuevo', 'Toshiba', 'Toshiba 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: PA3032U-1ACA, TSPS1600, PA3097U-1ACA\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nDynaBook SS425\r\nSatellite 1000\r\nSatellite 1000-Z2\r\nSatellite 1000-S157\r\nSatellite 1005-S157\r\nSatellite 1000-S158\r\nSatellite 1005-S158\r\nSatellite 1600 series\r\nSatellite 1605CDS\r\nSatellite 1620CDS\r\nSatellite 1625CDT\r\nSatellite 1640CDT\r\nSatellite 1670CDS\r\nSatellite 1675CDT\r\nSatellite 1690CDT\r\nSatellite 1695CDT  Satellite 1700 series\r\nSatellite 1710CDS\r\nSatellite 1715XCDS\r\nSatellite 1730\r\nSatellite 1730CDT\r\nSatellite 1735\r\nSatellite 1735XCDS\r\nSatellite 1750\r\nSatellite 1750CDT\r\nSatellite 1755\r\nSatellite 1755CDT\r\nSatellite 1755CE\r\nSatellite 1755DVD\r\nSatellite 1955-S803\r\nSatellite 1955-S804\r\nSatellite 3000 514/214\r\nSatellite 3000 Q65 1.0 GHz\r\nSatellite 3000-400\r\nSatellite 3000-504\r\nSatellite 3000-S304/H2000 1.0 GHz\r\nSatellite 3000-S353/S303/S403/A423  ', '165', '19v 3.16a.jpg', 'Si', 'No'),
(19, 12, 'Nuevo', 'Sony', 'Sony 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 4.4mm\r\n    External Diameter: 6.5mm \r\n    With pin inside\r\n\r\nReplace Part Number: PCGA-AC19V, PCGA-AC19V, FMV-AC312\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nSONY VAIO PCG-700 Series: PCG-705, PCG-707, PCG-711, PCG-717, PCG-719 PCG-729, PCG-731, PCG-735, PCG-737, PCG-745, PCG-747, PCG-748, PCG-762\r\n\r\nSONY VAIO PCG-800 Series: PCG-808, PCG-812, PCG-818, PCG-838\r\n\r\nSONY VAIO F-Series: PCG-F150, PCG-F160, PCG-F180, PCG-F190, PCG-F200, PCG-F250, PCG-F270, PCG-F280, PCG-F290, PCG-F305, PCG-F340, PCG-F350, PCG-F360, PCG-F370, PCG-F390, PCG-F400, PCG-F403, PCG-F409, PCG-F420, PCG-F430, PCG-F450, PCG-F480, PCG-F480K, PCG-F490, PCG-F490K, PCG-F520, PCG-F540, PCG-F560, PCG-F560K, PCG-F570, PCG-F580, PCG-F580K, PCG-F590, PCG-F590K, PCG-F610, PCG-F630, PCG-F640, PCG-F650, PCG-F650K, PCG-676, PCG-F680, PCG-F690, PCG-F807K, PCG-F808, PCG-F809\r\n\r\nSONY VAIO PCG-FX Series: PCG-FX55, PCG-FX100, PCG-FX120, PCG-FX140, PCG-FX150, PCG-FX170, PCG-FX190, PCG-FX200, PCG-FX201, PCG-FX210, PCG FX215, PCG-FX220, PCG-FX240 PCG-FX250 PCG-FX250K PCG-FX270 PCG-FX275 PCG-FX290K, PCG-FX300, PCG-FX310, PCG-FX340, PCG-FX370, FX-370P, PCGFX390, PCG-FX400, PCG-FX410, PCG-FX430, PCG-FX700, PCG-FX770, PCG FX776, PCG-FX800, PCG-FX876, PCG-FX880, PCG-FX900, PCG-FX905\r\n\r\nSONY VAIO PCFG-FXA Series: PCG-FXA32, PCG-FXA33, PCG-FXA35, PCG FXA36, PCG-FXA47, PCG-FXA48, PCG-FXA49, PCG-FXA53, PCG-FXA59, PCG FXA63\r\n\r\nSONY VAIO PCG-R505 Series: PCG-R505, PCG-R505BF, PCG-R505D, PCG-R505DF, PCG R505DFK, PCG-R505DL, PCG-R505DLK, PCG-R505DS, PCG-R505DSK, PCG R505E, PCG-R505EC, PCG-R505ECK, PCG-R505EL, PCG-R505ELK, PCG-R505ESK, PCG-R505G, PCG-R505GC, PCG-R505GCK, PCG-R505GL, PCG-R505GLK, PCG R505JE, PCG-R505JEK, PCG-R505JL, PCG-R505JL, PCG-R505JLK, PCG-R505JS, PCG-R505JSK, PCG-R505JSP, PCG-R505TE, PCG-R505TEK, PCG-R505TL, PCG R505TLK, PCG-R505TS, PCG-R505TSK\r\n\r\nSONY VAIO PCG-XG Series: PCG-XG9, PCG-XG18 PCG-XG19 PCG-XG28 PCG-XG28K PCG XG29, PCG-XG500 PCG-XG700\r\n\r\nSONY VAIO PCG-Z505 Series: PCG-Z505, PCG-Z505HE PCG-Z505HS PCG-Z505HSK PCG Z505JE PCG-Z505JEK PCG-Z505JS PCG-Z505JSK PCG-Z505LE PCG-Z505LEK PCG-Z505LS PCG-Z505LSK PCG-Z505R PCG-Z505RX PCG-Z505S PCG-Z505SX\r\n\r\nFujitsu Lifebook C2010, C2110, C2111 ', '210', 'sony 19v 3.16a.jpg', 'No', 'No'),
(20, 12, 'Nuevo', 'Gateway', 'Gateway 19V 3.16A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19V 3.16A\r\n\r\nPower: 60W\r\n\r\nOutlet: 2-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 2.5mm\r\n    External Diameter: 5.5mm\r\n\r\nReplace Part Number: ADP-60MB ADP-60DH PA-1600-06\r\n \r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nGateway Solo 1200\r\nGateway Solo 1400\r\nGateway Solo 1450\r\nGateway Solo 2200\r\nGateway Solo 2300\r\nGateway Solo 2350\r\nGateway Solo 3100\r\nGateway Solo 3150\r\nGateway Solo 450\r\nGateway Solo 5350\r\nGateway Solo 600\r\nGateway Solo 9500\r\nGateway Solo 9550 ', '165', 'Gateway 19v 3.16a.jpg', 'Si', 'No'),
(21, 12, 'Nuevo', 'Dell', 'Original Dell 19.5V 4.62A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19.5V 4.62A\r\n\r\nPower: 90W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 5.0mm\r\n    External Diameter: 7.4mm\r\n    With pin inside\r\n\r\nReplace Part Number: PA-10, NADP-90KB, PA-1900-02D,  PA-1900-02D2, U7809, C2894, 9T215\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nDell Inspiron: 1150, 9200, 9300, 9400,\r\nDell Latitude: 100L, D800, D810, D820,\r\nDell Precision: M60,\r\nDell Inspiron: 1501, 300m, 500m, 510m, 600m, 600mcr, 630m, 640m, 6000, 6400, 700m, 710m, 8500, 8600, 8600CR,\r\nDell Latitude: D400, D410, D420, D500, D505, D510, D520, D600, D610, D620, X300,\r\nDell Precision: M20 ', '260', 'Dell 19.5v 4.62a.jpg', 'Si', 'Si'),
(22, 12, 'Nuevo', 'Dell', 'Original Dell 19.5V 6.7A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC19.5V 6.7A\r\n\r\nPower: 130W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size: \r\n    Internal Diameter: 5.0mm\r\n    External Diameter: 7.4mm\r\n    With pin inside\r\n\r\nReplace Part Number: 9Y819 PA-13\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nDELL INSPIRON 5150\r\nDELL INSPIRON 5160 ', '440', 'Dell 19.5v 6.7a.jpg', 'Si', 'No'),
(23, 12, 'Nuevo', 'Dell', 'Dell 20V 3.5A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC20V 3.5A\r\n\r\nPower: 70W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  Special 3 hole tip\r\n\r\nReplace Part Number: 9364U 4983d, 8725p, 8509t. PA-6\r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nDell Latitude: X200, C400, C500, C600, C800, C810, CP, CPi, CPiA, CPiD, CPiR, CPt, CPtC, CPtS, CPtV, CPxH, CPxJ, CS, CSR, & CSX\r\n\r\nDell Inspiron: 2500, 2600, 3700, 3800, 4000, 4100, 5000, 7500, 8000, & 8100 Dell C/Dock, C/Dock II, C/Port, C/Port II. ', '155', 'Dell 19.5v 3.5a.jpg', 'Si', 'No'),
(24, 12, 'Nuevo', 'Dell', 'Dell 20V 4.5A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC20V 4.5A\r\n\r\nPower: 90W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:  Special 3 hole tip\r\n\r\nReplace Part Number: PA-9, ADP-90FB, 3K360, 6G356, 9R733, 06G356, PA-1900-05D\r\n \r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\n\r\nDell Inspiron 8200\r\nDell Inspiron 5100\r\nDell Inspiron 4150\r\nDell Inspiron 2600\r\nDell Inspiron 2650\r\nDell Inspiron 1100\r\nDell Latitude C640\r\nDell Latitude C840\r\nDell Precision M50 ', '160', 'Dell 19.5v 4.5a.jpg', 'Si', 'No'),
(25, 12, 'Nuevo', 'IBM', 'IBM/Lenovo 20V 4.5A AC Adapter\r\n\r\nInput: AC100-240V (worldwide use)\r\n\r\nOutput: DC20V 4.5A\r\n\r\nPower: 90W\r\n\r\nOutlet: 3-prong\r\n\r\nConnecter size:\r\n    Internal Diameter: 5.5mm\r\n    External Diameter: 7.9mm\r\n    With pin inside\r\n\r\nReplace Part Number:\r\n40Y7659 40Y7660 40Y7661 40Y7662 40Y7663 40Y7664 40Y7665 40Y7666 40Y7667   \r\n92P1109 92P1111 92P1153 92P1155 92P1157 92P1159 93P5026              \r\n\r\n\r\nFit Laptop models(From SunvalleyTek.com):\r\nIBM ThinkPad T60 series\r\nIBM ThinkPad X60 series\r\nIBM ThinkPad Z60 series\r\nIBM ThinkPad R60 series\r\nLenovo C100\r\nLenovo V100\r\nLenovo N100\r\nLenovo 3000 ', '160', 'ibm 20v 4.5a.jpg', 'No', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `model_id` int(11) NOT NULL DEFAULT '0',
  `description_model` varchar(45) NOT NULL,
  `brand_id2` int(11) NOT NULL DEFAULT '0',
  `visible` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`model_id`),
  KEY `FK_models_1` (`brand_id2`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `models`
--

INSERT INTO `models` (`model_id`, `description_model`, `brand_id2`, `visible`) VALUES
(1, 'SP-E120', 2, 1),
(2, 'DDR 400', 1, 1),
(3, 'TO-500', 6, 1),
(4, 'HP F4809A ', 3, 1),
(5, 'IBM/Lenovo 20V', 5, 1),
(6, 'N300', 39, 1),
(7, 'SON-960', 16, 1),
(13, 'LM-45', 11, 1),
(14, 'Cisco-200', 10, 1),
(15, 'P-25', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models_model_id_seq`
--

CREATE TABLE IF NOT EXISTS `models_model_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `models_model_id_seq`
--

INSERT INTO `models_model_id_seq` (`id`) VALUES
(15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` varchar(500) NOT NULL,
  `id_brand` varchar(500) NOT NULL DEFAULT '0',
  `category_id3` varchar(500) NOT NULL DEFAULT '0',
  `model_id2` varchar(500) NOT NULL DEFAULT '0',
  `date_arrival` date DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `picture` text,
  `is_new` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `inventario` int(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `FK_products_3` (`model_id2`(255)),
  KEY `FK_products_1` (`category_id3`(255)),
  KEY `FK_products_2` (`id_brand`(255)),
  KEY `FK_products_6` (`type_id`(255))
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `type_id`, `id_brand`, `category_id3`, `model_id2`, `date_arrival`, `price`, `discount`, `picture`, `is_new`, `visible`, `description`, `inventario`) VALUES
(19, 'Accueil', 'HP', 'Accueil', '', '2011-09-27', '982.14', 0, 'http://localhost/prestashop/img/p/19-92-home.jpg', 1, 1, 'Pantalla para Mini Laptop LP089WS1 (TL)(A2) 8.9" WSVGA GLOSSY LCD SCREEN  40 pins de  8.9" pulgadas. ', 1),
(36, 'Home', 'LENOVO', 'Home', 'mini_20V2A_PA    ', '2011-09-27', '280.00', 0, 'http://localhost/prestashop/img/p/36-173-home.jpg', 1, 1, 'Cargador para mini laptop Lenovo 20V 2A', 1),
(37, 'Accueil', 'TOSHIBA', 'Accueil', 'Acer_19V3.95A_PA    ', '2011-09-27', '300.00', 0, 'http://localhost/prestashop/img/p/37-179-home.jpg', 1, 1, 'Cargador para Toshiba de  19V 3.95A 75W', 1),
(58, 'Accueil', 'HP', 'Accueil', '', '2011-09-27', '280.00', 0, 'http://localhost/prestashop/img/p/58-153-home.jpg', 1, 1, 'Cargador  Original HP  19V 3.42A 5.5x2.5mm', 1),
(74, 'Accueil', 'DELL', 'Accueil', 'D920sSP_silver', '2011-09-27', '250.00', 0, 'http://localhost/prestashop/img/p/74-189-home.jpg', 1, 1, 'DELL  1420 Plateado ONK764 D9K1E  Teclado en Espaï¿½ol', 3),
(76, 'Accueil', 'DELL', 'Accueil', 'D820', '2011-09-27', '270.00', 0, 'http://localhost/prestashop/img/p/76-194-home.jpg', 1, 1, 'DELL D820 D620  M62 Negro  Teclado en Ingles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_product_id_seq`
--

CREATE TABLE IF NOT EXISTS `products_product_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=106 ;

--
-- Volcar la base de datos para la tabla `products_product_id_seq`
--

INSERT INTO `products_product_id_seq` (`id`) VALUES
(105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(60) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`profile_id`, `description`, `level`, `visible`) VALUES
(1, 'Administrador', 10, 1),
(2, 'Distribuidor', 5, 1),
(3, 'Proveedor', 6, 1),
(4, 'Cliente', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles_profile_id_seq`
--

CREATE TABLE IF NOT EXISTS `profiles_profile_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `profiles_profile_id_seq`
--

INSERT INTO `profiles_profile_id_seq` (`id`) VALUES
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE IF NOT EXISTS `reparaciones` (
  `id_rep` int(11) NOT NULL,
  `id_client` int(11) NOT NULL DEFAULT '0',
  `id_tec` int(11) DEFAULT '1',
  `fecing_rep` date DEFAULT NULL,
  `fecret_rep` date DEFAULT '0000-00-00',
  `sintoma_rep` varchar(255) DEFAULT NULL,
  `caract_rep` text,
  `serialequip_rep` varchar(100) DEFAULT NULL,
  `prom_rep` varchar(20) DEFAULT NULL,
  `ubic_rep` varchar(25) DEFAULT NULL,
  `status_rep` varchar(25) DEFAULT 'Sin Asignar',
  `mont_rep` double DEFAULT '0',
  PRIMARY KEY (`id_rep`),
  KEY `IndexRep1` (`id_client`),
  KEY `FkRep2` (`id_tec`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `reparaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shippings`
--

CREATE TABLE IF NOT EXISTS `shippings` (
  `pedido_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gasto_envio` double DEFAULT NULL,
  `companie_id` int(11) NOT NULL DEFAULT '0',
  `number_guia` varchar(20) DEFAULT NULL,
  `date_close` date DEFAULT NULL,
  PRIMARY KEY (`pedido_id`)
) TYPE=InnoDB  AUTO_INCREMENT=1005 ;

--
-- Volcar la base de datos para la tabla `shippings`
--

INSERT INTO `shippings` (`pedido_id`, `gasto_envio`, `companie_id`, `number_guia`, `date_close`) VALUES
(3, 0, 2, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shippings_custom_id_seq`
--

CREATE TABLE IF NOT EXISTS `shippings_custom_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `shippings_custom_id_seq`
--

INSERT INTO `shippings_custom_id_seq` (`id`) VALUES
(22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id_state` int(11) NOT NULL DEFAULT '0',
  `description_state` varchar(40) NOT NULL,
  `id_countrie_state` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_state`),
  KEY `FK_state_1` (`id_countrie_state`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `states`
--

INSERT INTO `states` (`id_state`, `description_state`, `id_countrie_state`) VALUES
(1, 'DISTRITO CAPITAL', 232),
(2, 'AMAZONAS', 232),
(3, 'ANZOATEGUI', 232),
(4, 'APURE', 232),
(5, 'ARAGUA', 232),
(6, 'BARINAS', 232),
(7, 'BOLIVAR', 232),
(8, 'CARABOBO', 232),
(9, 'COJEDES', 232),
(10, 'DELTA AMACURO', 232),
(11, 'FALCON', 232),
(12, 'GUARICO', 232),
(13, 'LARA', 232),
(14, 'MÉRIDA', 232),
(15, 'MIRANDA ', 232),
(16, 'MONAGAS', 232),
(17, 'NUEVA ESPARTA', 232),
(18, 'PORTUGUESA', 232),
(19, 'SUCRE', 232),
(20, 'TACHIRA', 232),
(21, 'TRUJILLO', 232),
(22, 'YARACUY', 232),
(23, 'ZULIA', 232),
(24, 'VARGAS', 232),
(25, 'AMAZONAS', 52),
(26, 'ANTIOQUIA', 52),
(27, 'ARAUCA', 52),
(28, 'BOYACA', 52),
(29, 'CESAR', 52),
(30, 'CORDOBA', 52),
(31, 'TOLIMA', 52),
(32, 'GUAJIRA', 52),
(33, 'RISARALDA', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states_id_state_seq`
--

CREATE TABLE IF NOT EXISTS `states_id_state_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=35 ;

--
-- Volcar la base de datos para la tabla `states_id_state_seq`
--

INSERT INTO `states_id_state_seq` (`id`) VALUES
(34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_equipo_subpedido`
--

CREATE TABLE IF NOT EXISTS `tb_equipo_subpedido` (
  `codigoSubpedido` int(10) unsigned NOT NULL,
  `product_id` int(20) unsigned NOT NULL,
  `cantidad` int(10) NOT NULL,
  KEY `FK_tb_equipo_subpedido_2` (`product_id`),
  KEY `FK_tb_equipo_subpedido_1` (`codigoSubpedido`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tb_equipo_subpedido`
--

INSERT INTO `tb_equipo_subpedido` (`codigoSubpedido`, `product_id`, `cantidad`) VALUES
(3, 58, 1),
(3, 37, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido`
--

CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `codigoPedido` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `direccionEntrega` varchar(250) DEFAULT NULL,
  `montoAcumulado` decimal(20,2) NOT NULL,
  `cuentaBanc` varchar(45) DEFAULT NULL,
  `deposito` varchar(20) DEFAULT '',
  `status` varchar(40) NOT NULL,
  `fechaDeposito` datetime DEFAULT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `nroRefBancaria` int(15) unsigned DEFAULT '0',
  `responsableFacturador` varchar(20) DEFAULT NULL,
  `fechaApertura` datetime NOT NULL,
  `actualizacion` varchar(20) NOT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `montoDepositado` decimal(20,2) DEFAULT NULL,
  `modoPago` varchar(20) DEFAULT NULL,
  `observaciones` varchar(320) DEFAULT NULL,
  `fechaRepuesta` datetime DEFAULT NULL,
  `bancoOrigen` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigoPedido`),
  KEY `FK_tb_pedido_1` (`user_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tb_pedido`
--

INSERT INTO `tb_pedido` (`codigoPedido`, `user_id`, `direccionEntrega`, `montoAcumulado`, `cuentaBanc`, `deposito`, `status`, `fechaDeposito`, `fechaEntrega`, `nroRefBancaria`, `responsableFacturador`, `fechaApertura`, `actualizacion`, `banco`, `montoDepositado`, `modoPago`, `observaciones`, `fechaRepuesta`, `bancoOrigen`) VALUES
(3, 17, 'Casa de CADETE', '580.00', '123456-484145-652214-548845', '2200011', 'INICIANDO', '2011-09-07 00:00:00', '2011-09-27 00:00:00', 0, '', '2011-09-27 00:00:00', '', 'Banco Mercantil', '580.00', 'DEPOSITO', '', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido_codigoPedido_seq`
--

CREATE TABLE IF NOT EXISTS `tb_pedido_codigoPedido_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=1012 ;

--
-- Volcar la base de datos para la tabla `tb_pedido_codigoPedido_seq`
--

INSERT INTO `tb_pedido_codigoPedido_seq` (`id`) VALUES
(1011);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `rif` varchar(11) NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `colorFavorito` varchar(20) DEFAULT NULL,
  `nombreMascota` varchar(20) DEFAULT NULL,
  `anioNacimiento` int(10) unsigned DEFAULT NULL,
  `pregutaSeguridad` varchar(45) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `profile` int(10) unsigned NOT NULL DEFAULT '0',
  `seudonimo` varchar(45) DEFAULT NULL,
  `razonsocial` varchar(200) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Index_2` (`login`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tb_users`
--

INSERT INTO `tb_users` (`login`, `pass`, `telefono`, `nombres`, `apellidos`, `rif`, `cedula`, `email`, `colorFavorito`, `nombreMascota`, `anioNacimiento`, `pregutaSeguridad`, `celular`, `user_id`, `profile`, `seudonimo`, `razonsocial`, `ciudad`, `estado`) VALUES
('pmmoyapablo@hotmail.com', 'ae4654e72ae84b204814aa203e094100', '02123725216', 'PABLO', 'MOYA PIÑANGO', 'V-145264614', 'V14526461', 'pmmoyapablo@hotmail.com', '', '', 1978, 'Ano Nacimiento', '04167084373', 1, 1, 'C.A', 'Particular', 'San Antonio de los Atos', 'MIRANDA'),
('cliente@cliente.com', '4983a0ab83ed86e0e7213c8783940193', '021233311221', 'PERICO', 'MACONA', 'J-234569007', 'V21233223', 'cliente@cliente.com', '', 'ddssss', NULL, 'Nombre Mascota', '04169876543', 2, 3, 'C.A', 'TRAKI CA', 'LOS TEQUES', 'MIRANDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_zona`
--

CREATE TABLE IF NOT EXISTS `tb_zona` (
  `codigoZona1` int(10) unsigned NOT NULL,
  `estado1` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoZona1`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tb_zona`
--

INSERT INTO `tb_zona` (`codigoZona1`, `estado1`) VALUES
(1, 'ARAGUA'),
(2, 'APURE'),
(3, 'AMAZONAS'),
(4, 'ANZOATEGUI'),
(5, 'BARINAS'),
(6, 'BOLIVAR'),
(7, 'CARABOBO'),
(8, 'COJEDES'),
(9, 'DELTA AMACURO'),
(10, 'FALCON'),
(11, 'GUARICO'),
(12, 'PORTUGUESA'),
(13, 'MONAGAS'),
(14, 'DISTRITO CAPITAL'),
(15, 'VARGAS'),
(16, 'MERIDA'),
(17, 'TACHIRA'),
(18, 'TRUJILLO'),
(19, 'LARA'),
(20, 'ZULIA'),
(21, 'MIRANDA'),
(22, 'MONAGAS'),
(23, 'TRUJILLO'),
(24, 'SUCRE'),
(25, 'NUEVA ESPARTA'),
(26, 'YARACUY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE IF NOT EXISTS `tecnico` (
  `id_tec` int(11) NOT NULL,
  `ced_tec` varchar(9) DEFAULT NULL,
  `nom_tec` varchar(25) DEFAULT NULL,
  `ape_tec` varchar(25) DEFAULT NULL,
  `dir_tec` varchar(255) DEFAULT NULL,
  `tlfcasa_tec` varchar(20) DEFAULT NULL,
  `tlfcel_tec` varchar(20) DEFAULT NULL,
  `email_tec` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_tec`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tec`, `ced_tec`, `nom_tec`, `ape_tec`, `dir_tec`, `tlfcasa_tec`, `tlfcel_tec`, `email_tec`) VALUES
(0, '1234556', 'Julio', 'Berne', 'FFFFFFFFFF', '12112233', '4444544545', 'jul233gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tp` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `nom_tp` varchar(50) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tp`),
  KEY `fi0` (`id_cat`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tp`, `id_cat`, `nom_tp`, `visible`) VALUES
(1, 1, 'Memoria', 1),
(2, 1, 'Tarjeta de Video', 1),
(3, 1, 'Case', 1),
(4, 1, 'Tarjeta Madre', 1),
(5, 1, 'Monitor', 1),
(6, 1, 'Mouse', 1),
(7, 1, 'Procesador', 1),
(8, 1, 'Accesorios', 1),
(9, 2, 'Memoria', 1),
(10, 2, 'Disco Duro', 1),
(11, 2, 'Bateria', 1),
(12, 2, 'Adaptador de Corriente', 1),
(13, 2, 'Pantalla', 1),
(14, 2, 'Accesorios', 1),
(15, 3, 'CCD', 1),
(16, 3, 'Resistencias', 1),
(17, 3, 'Transistores', 1),
(18, 3, 'Circuitos Integrados', 1),
(19, 3, 'Condensadores', 1),
(20, 9, 'Modem', 1),
(21, 9, 'E1/T1', 1),
(22, 9, 'Enrutadores', 1),
(23, 9, 'Concentradores', 1),
(24, 9, 'Conector RJ45', 1),
(25, 10, 'Electronica Documentos', 1),
(26, 10, 'Controladores', 1),
(27, 10, 'Computacion Manuales', 1),
(28, 10, 'Programas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_id_tp_seq`
--

CREATE TABLE IF NOT EXISTS `tipo_id_tp_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `tipo_id_tp_seq`
--

INSERT INTO `tipo_id_tp_seq` (`id`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(120) NOT NULL,
  `city_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `address` varchar(120) NOT NULL,
  `visible` int(11) NOT NULL,
  `letterrif` varchar(1) NOT NULL,
  `rif` varchar(12) NOT NULL,
  `socialreason` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone_movil` varchar(100) NOT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `question_segurity` varchar(120) NOT NULL,
  `responce_segurity` varchar(120) NOT NULL,
  `word_verifyq` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  `state_id` int(11) NOT NULL DEFAULT '0',
  `seudonimo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Index_5` (`username`),
  KEY `FK_users_1` (`profile_id`),
  KEY `FK_users_2` (`city_id`),
  KEY `FK_users_4` (`state_id`),
  KEY `FK_users_3` (`country_id`)
) TYPE=InnoDB ROW_FORMAT=FIXED;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `city_id`, `profile_id`, `password`, `level`, `firstname`, `lastname`, `email`, `address`, `visible`, `letterrif`, `rif`, `socialreason`, `phone`, `phone_movil`, `pin`, `question_segurity`, `responce_segurity`, `word_verifyq`, `country_id`, `state_id`, `seudonimo`) VALUES
(1, 'admin', 3, 1, '21232f297a57a5a743894a0e4a801fc3', 10, 'Pablo', 'Moya', 'pmmoyapablo@hotmail.com', 'La Rosalesa Sur', 1, 'V', '14526461', 'PM', '02123725216', '04167084373', '2423211223', 'ï¿½Cual es tu mascota preferida?', 'indigena', 'Hgfat2', 232, 15, NULL),
(17, 'J369852000', 1, 4, 'J369852000', 3, 'Las Totumas S.A', 'Las Totumas S.A', 'mnpl52@hotmail.com', '', 1, 'J', '369852000', 'Las Totumas S.A', '2125533220', '2125533220', '2A22F015', 'ï?½Cual es tu mascota preferida?', 'Tu Identificador', '45sd1', 232, 15, NULL),
(20, 'perico', 2, 2, '591471ecdced3c942c0e0c9a2b0e53b2', 5, 'Cachapera Oriente C.A', 'Cachapera Oriente C.A', 'perico45@gmail.com', 'Calle 14, con esquina los pepes', 1, 'J', '658888754', 'Cachapera Oriente C.A', '02124445555', '04165231220', '225D8520', 'que pasa con?', '6c9a4bd5b9b94b2f662d7e6e871b97b7', 'h3gdf', 232, 2, NULL),
(38, 'selco', 28, 2, '11af711f7fa6c5ea56819e3b0207542f', 5, 'Grupo Selco C.A', 'Grupo Selco C.A', 'rich45@hotmail.com', 'Av Libertador', 1, 'J', '852321020', 'Grupo Selco C.A', '523122114', '04162223321', '22223344', 'ï¿½Cual es tu mascota preferida?', '58c16320a0afff99dc2af0aef4c2bd68', 'edf334', 232, 7, NULL),
(56, 'J444111222', 2, 4, 'J444111222', 3, 'Juan', 'MÃ©ndez', 'juanm@gmail.com', '', 1, 'J', '444111222', 'Naturalize C.A', '16102110', '16102110', '222244343434', 'ï?½Cual es tu mascota preferida?', 'Tu Identificador', '45sd1', 232, 2, 'Los Vergatarios'),
(63, 'servicah', 32, 2, 'ae4654e72ae84b204814aa203e094100', 5, 'Servicio de Cajas C.A', 'Servicio de Cajas C.A', 'pjim4@gmail.com', 'Calle Av 2', 1, 'J', '222330888', 'Servicio de Cajas C.A', '02415553322', '42455844411', '2ef22200', 'ï¿½Cual es tu mascota preferida?', '4591f6d8e0cf719e78e0f359f24c1922', 'fbe97', 232, 8, NULL),
(64, 'cliente2', 2, 3, '6dcd0e14f89d67e397b9f52bb63f5570', 5, 'gjgjgjgjf', 'gjgjgjgjf', 'fhfhfh@gmail.com', 'fhfhfhf', 1, 'J', '3434343', 'gjgjgjgjf', '47737373', '737373', '7733737', 'ï¿½Cual es tu mascota preferida?', '144f7f570a6cdb20f370d1614a6846bf', '3e5e1', 232, 2, NULL),
(65, 'armand_67@pos.tech', 1, 4, 'ae4654e72ae84b204814aa203e094100', 3, 'ARMANDO', 'CABEZAL', 'armand_67@pos.tech', 'Carretera La Toronja, calle 7.', 1, 'V', '005112121', 'Chocolates CaSucre S.A', '02123221156', '04142512651', '', 'Pelicula Favorita', 'itie', '21211', 232, 1, 'Choco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_user_id_seq`
--

CREATE TABLE IF NOT EXISTS `users_user_id_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=151 ;

--
-- Volcar la base de datos para la tabla `users_user_id_seq`
--

INSERT INTO `users_user_id_seq` (`id`) VALUES
(150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id_vis` int(11) NOT NULL,
  `cant_vis` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_vis`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id_vis`, `cant_vis`) VALUES
(1, 346);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`brand_id2`) REFERENCES `brands` (`brand_id`);

--
-- Filtros para la tabla `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `tb_pedido` (`codigoPedido`);

--
-- Filtros para la tabla `tb_equipo_subpedido`
--
ALTER TABLE `tb_equipo_subpedido`
  ADD CONSTRAINT `FK_tb_equipo_subpedido_1` FOREIGN KEY (`codigoSubpedido`) REFERENCES `tb_pedido` (`codigoPedido`),
  ADD CONSTRAINT `tb_equipo_subpedido_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Filtros para la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
