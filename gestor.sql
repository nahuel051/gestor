-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2024 a las 18:30:33
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nom_ape` text NOT NULL,
  `dni_cuit` bigint(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` bigint(25) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_ape`, `dni_cuit`, `email`, `telefono`, `direccion`, `localidad`) VALUES
(166, 'Cliente Cliente', 11111166666, 'cliente76@dominio.com', 67718758179, 'Dirección 76', 'Localidad'),
(168, 'Cliente78', 9223372036854775807, 'cliente78@dominio.com', 16412221394, 'Dirección78', 'Localidad78'),
(169, 'Cliente79', 9223372036854775807, 'cliente79@dominio.com', 91151748178, 'Dirección79', 'Localidad79'),
(170, 'Cliente80', 9223372036854775807, 'cliente80@dominio.com', 54173247752, 'Dirección80', 'Localidad80'),
(171, 'Cliente81', 9223372036854775807, 'cliente81@dominio.com', 28925998582, 'Dirección81', 'Localidad81'),
(172, 'Cliente82', 9223372036854775807, 'cliente82@dominio.com', 62034768184, 'Dirección82', 'Localidad82'),
(173, 'Cliente83', 9223372036854775807, 'cliente83@dominio.com', 18326633161, 'Dirección83', 'Localidad83'),
(174, 'Cliente84', 9223372036854775807, 'cliente84@dominio.com', 59893141295, 'Dirección84', 'Localidad84'),
(175, 'Cliente85', 9223372036854775807, 'cliente85@dominio.com', 73030011059, 'Dirección85', 'Localidad85'),
(176, 'Cliente86', 9223372036854775807, 'cliente86@dominio.com', 38531963385, 'Dirección86', 'Localidad86'),
(177, 'Cliente87', 9223372036854775807, 'cliente87@dominio.com', 74837229684, 'Dirección87', 'Localidad87'),
(178, 'Cliente88', 9223372036854775807, 'cliente88@dominio.com', 85119718428, 'Dirección88', 'Localidad88'),
(179, 'Cliente89', 9223372036854775807, 'cliente89@dominio.com', 43739607896, 'Dirección89', 'Localidad89'),
(180, 'Cliente90', 9223372036854775807, 'cliente90@dominio.com', 64975109057, 'Dirección90', 'Localidad90'),
(181, 'Cliente91', 9223372036854775807, 'cliente91@dominio.com', 30870625936, 'Dirección91', 'Localidad91'),
(182, 'Cliente92', 9223372036854775807, 'cliente92@dominio.com', 91765936157, 'Dirección92', 'Localidad92'),
(183, 'Cliente93', 9223372036854775807, 'cliente93@dominio.com', 25717178476, 'Dirección93', 'Localidad93'),
(184, 'Cliente94', 9223372036854775807, 'cliente94@dominio.com', 22732990526, 'Dirección94', 'Localidad94'),
(185, 'Cliente95', 9223372036854775807, 'cliente95@dominio.com', 20472238604, 'Dirección95', 'Localidad95'),
(186, 'Cliente96', 9223372036854775807, 'cliente96@dominio.com', 94375643640, 'Dirección96', 'Localidad96'),
(187, 'Cliente97', 9223372036854775807, 'cliente97@dominio.com', 78887106634, 'Dirección97', 'Localidad97'),
(188, 'Cliente98', 9223372036854775807, 'cliente98@dominio.com', 19474258198, 'Dirección98', 'Localidad98'),
(189, 'Cliente99', 9223372036854775807, 'cliente99@dominio.com', 20026970952, 'Dirección99', 'Localidad99'),
(190, 'Cliente100', 9223372036854775807, 'cliente100@dominio.com', 25244149207, 'Dirección100', 'Localidad100'),
(191, 'Cliente101', 9223372036854775807, 'cliente101@dominio.com', 29396121259, 'Dirección101', 'Localidad101'),
(192, 'Cliente102', 9223372036854775807, 'cliente102@dominio.com', 61328985952, 'Dirección102', 'Localidad102'),
(193, 'Cliente103', 9223372036854775807, 'cliente103@dominio.com', 90685666668, 'Dirección103', 'Localidad103'),
(194, 'Cliente104', 9223372036854775807, 'cliente104@dominio.com', 91066818041, 'Dirección104', 'Localidad104'),
(195, 'Cliente105', 9223372036854775807, 'cliente105@dominio.com', 14098567677, 'Dirección105', 'Localidad105'),
(196, 'Cliente106', 9223372036854775807, 'cliente106@dominio.com', 78271448386, 'Dirección106', 'Localidad106'),
(197, 'Cliente107', 9223372036854775807, 'cliente107@dominio.com', 10270435149, 'Dirección107', 'Localidad107'),
(198, 'Cliente108', 9223372036854775807, 'cliente108@dominio.com', 30695257243, 'Dirección108', 'Localidad108'),
(199, 'Cliente109', 9223372036854775807, 'cliente109@dominio.com', 40775996176, 'Dirección109', 'Localidad109'),
(200, 'Cliente110', 9223372036854775807, 'cliente110@dominio.com', 48486637070, 'Dirección110', 'Localidad110'),
(201, 'Cliente111', 9223372036854775807, 'cliente111@dominio.com', 14262163652, 'Dirección111', 'Localidad111'),
(202, 'Cliente112', 9223372036854775807, 'cliente112@dominio.com', 14601400647, 'Dirección112', 'Localidad112'),
(203, 'Cliente113', 9223372036854775807, 'cliente113@dominio.com', 59067164332, 'Dirección113', 'Localidad113'),
(204, 'Cliente114', 9223372036854775807, 'cliente114@dominio.com', 90863541383, 'Dirección114', 'Localidad114'),
(205, 'Cliente115', 9223372036854775807, 'cliente115@dominio.com', 24802832197, 'Dirección115', 'Localidad115'),
(206, 'Cliente116', 9223372036854775807, 'cliente116@dominio.com', 13481964202, 'Dirección116', 'Localidad116'),
(207, 'Cliente117', 9223372036854775807, 'cliente117@dominio.com', 32931854950, 'Dirección117', 'Localidad117'),
(208, 'Cliente118', 9223372036854775807, 'cliente118@dominio.com', 54367591146, 'Dirección118', 'Localidad118'),
(209, 'Cliente119', 9223372036854775807, 'cliente119@dominio.com', 16597562121, 'Dirección119', 'Localidad119'),
(210, 'Cliente120', 9223372036854775807, 'cliente120@dominio.com', 96045384886, 'Dirección120', 'Localidad120'),
(211, 'Cliente121', 9223372036854775807, 'cliente121@dominio.com', 55484278663, 'Dirección121', 'Localidad121'),
(212, 'Cliente122', 9223372036854775807, 'cliente122@dominio.com', 99792855511, 'Dirección122', 'Localidad122'),
(213, 'Cliente123', 9223372036854775807, 'cliente123@dominio.com', 46705771653, 'Dirección123', 'Localidad123'),
(214, 'Cliente124', 9223372036854775807, 'cliente124@dominio.com', 79273986703, 'Dirección124', 'Localidad124'),
(215, 'Cliente125', 9223372036854775807, 'cliente125@dominio.com', 95853827386, 'Dirección125', 'Localidad125'),
(216, 'Lionel Messi', 10101010, 'leo@gmail.com', 101010, 'Barcelona 2010', 'Rosario'),
(217, 'Luis Suarez', 99999999999, 'luis@gmail.com', 99999, 'Uruguay 9999', 'Montevideo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_cliente` text NOT NULL,
  `dni_cuit` int(11) NOT NULL,
  `nombre_producto` int(11) NOT NULL,
  `unidades` int(20) NOT NULL,
  `importe_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nom_producto` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT curdate(),
  `precio_compra` int(20) NOT NULL,
  `precio_venta` int(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nom_producto`, `stock`, `fecha`, `precio_compra`, `precio_venta`, `descripcion`, `id_proveedor`) VALUES
(62, 'Iphone 12', 102, '2024-01-16', 200000, 750000, 'Lanzamiento 2020', 18),
(63, 'Iphone 13', 76, '2024-01-16', 250000, 800000, 'Lanzamiento 2021', 18),
(64, 'Iphone 14', 95, '2024-01-16', 300000, 1005000, 'Lanzamiento 2022', 18),
(65, 'Samsung S21', 65, '2024-01-16', 150000, 800000, 'Lanzamiento 2021', 19),
(67, 'Redmi Note 11', 61, '2024-01-16', 65000, 180000, '2021', 20),
(69, 'Samsung A21', 255, '2024-01-16', 60000, 200000, 'Lanzamiento 2020', 19),
(70, 'Iphone 12', 59, '2024-01-16', 120000, 800000, 'Lanzamiento 2021', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `cuit` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `razon_social`, `cuit`, `email`, `telefono`, `direccion`, `localidad`) VALUES
(18, 'Apple', 11111111112, 'apple@gmail.com', 11111, 'California 1111', 'California'),
(19, 'Samsung', 11111111113, 'samsung@gmail.com', 22222, 'Suwon 123', 'Suwon Seúl '),
(20, 'Xiaomi', 11111111114, 'xiaomi@gmail.com', 111155, 'China 222', 'Haidian Pekín '),
(22, 'LG', 11111111115, 'lg@gmail.com', 11111, 'Twin Towers 1111', 'Yeongdeungpo Seúl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_sesion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id_sesion`, `id_usuario`, `fecha`, `hora_entrada`, `hora_salida`) VALUES
(2, 1, '2023-12-29', '20:36:58', '20:39:11'),
(4, 1, '2023-12-29', '20:37:57', '20:39:11'),
(6, 1, '2023-12-29', '20:39:39', '20:39:53'),
(7, 1, '2023-12-29', '21:08:56', '14:45:57'),
(8, 1, '2024-01-02', '14:45:09', '14:45:57'),
(9, 1, '2024-01-02', '14:46:10', '02:48:12'),
(10, 1, '2024-01-02', '14:48:19', '02:48:40'),
(12, 1, '2024-01-02', '14:48:56', '10:54:04'),
(13, 1, '2024-01-02', '14:56:34', '10:58:25'),
(14, 1, '2024-01-02', '10:58:30', '11:48:28'),
(16, 1, '2024-01-02', '12:56:12', '19:08:47'),
(18, 1, '2024-01-03', '10:59:20', '11:45:47'),
(20, 1, '2024-01-03', '11:46:16', '11:46:49'),
(21, 1, '2024-01-03', '11:46:56', '14:42:01'),
(24, 1, '2024-01-03', '14:48:19', '14:48:25'),
(25, 1, '2024-01-03', '14:48:31', '14:50:21'),
(26, 1, '2024-01-03', '15:12:29', '15:12:31'),
(28, 1, '2024-01-03', '15:37:53', '17:35:39'),
(29, 1, '2024-01-04', '11:44:50', '17:35:39'),
(31, 1, '2024-01-04', '17:43:14', '17:46:08'),
(32, 1, '2024-01-04', '17:46:14', '15:31:10'),
(33, 1, '2024-01-05', '11:15:17', '15:31:10'),
(34, 1, '2024-01-05', '15:31:15', '15:46:11'),
(35, 1, '2024-01-05', '15:46:28', '15:52:40'),
(36, 1, '2024-01-05', '15:56:58', '14:13:36'),
(37, 1, '2024-01-06', '14:13:34', '14:13:36'),
(38, 1, '2024-01-06', '14:20:15', '14:20:17'),
(39, 1, '2024-01-06', '14:21:48', '14:21:50'),
(40, 1, '2024-01-06', '14:22:48', '14:54:49'),
(41, 1, '2024-01-06', '14:54:56', '14:55:32'),
(42, 1, '2024-01-06', '14:55:37', '16:35:58'),
(44, 1, '2024-01-06', '16:36:28', '16:57:25'),
(45, 1, '2024-01-06', '16:58:34', '16:58:36'),
(46, 1, '2024-01-06', '16:58:49', '17:01:48'),
(47, 1, '2024-01-06', '17:01:56', '17:04:03'),
(48, 1, '2024-01-06', '17:05:59', '17:06:00'),
(49, 1, '2024-01-06', '17:09:13', '17:17:59'),
(50, 1, '2024-01-06', '17:18:10', '17:18:38'),
(51, 1, '2024-01-06', '17:18:54', '17:32:33'),
(52, 1, '2024-01-06', '17:32:39', '17:35:08'),
(54, 1, '2024-01-06', '17:36:00', '17:36:36'),
(55, 1, '2024-01-07', '13:55:53', '14:01:40'),
(56, 1, '2024-01-07', '14:01:49', '14:03:37'),
(57, 1, '2024-01-07', '14:02:19', '14:03:37'),
(58, 1, '2024-01-07', '14:04:05', '14:17:27'),
(59, 1, '2024-01-07', '14:17:45', '12:24:30'),
(60, 1, '2024-01-08', '11:03:21', '12:24:30'),
(61, 1, '2024-01-08', '12:24:36', '13:46:13'),
(62, 1, '2024-01-08', '13:46:23', '13:49:07'),
(63, 1, '2024-01-08', '13:49:18', '17:33:56'),
(64, 1, '2024-01-08', '17:28:53', '17:33:56'),
(65, 1, '2024-01-08', '17:34:06', '18:19:03'),
(66, 1, '2024-01-08', '18:19:08', '19:19:07'),
(68, 1, '2024-01-08', '19:19:54', '19:27:53'),
(70, 1, '2024-01-08', '19:31:19', '19:31:24'),
(72, 1, '2024-01-08', '19:36:32', '19:37:01'),
(74, 1, '2024-01-08', '19:37:35', '22:24:46'),
(75, 1, '2024-01-08', '22:24:51', '22:33:51'),
(76, 1, '2024-01-08', '22:34:04', '22:38:39'),
(78, 1, '2024-01-09', '11:17:29', '11:22:22'),
(79, 1, '2024-01-09', '11:22:31', '11:57:28'),
(81, 1, '2024-01-09', '15:35:43', '16:29:20'),
(82, 1, '2024-01-09', '16:29:25', '16:29:26'),
(83, 1, '2024-01-09', '16:29:35', '17:10:56'),
(84, 1, '2024-01-09', '17:11:10', '17:33:07'),
(85, 1, '2024-01-09', '17:33:14', '12:33:34'),
(86, 1, '2024-01-10', '11:08:09', '12:33:34'),
(87, 1, '2024-01-10', '13:08:08', '12:33:34'),
(88, 1, '2024-01-10', '13:09:15', '12:33:34'),
(89, 1, '2024-01-10', '18:25:25', '12:33:34'),
(90, 1, '2024-01-11', '10:54:26', '12:33:34'),
(92, 1, '2024-01-11', '12:34:05', '12:38:07'),
(93, 1, '2024-01-11', '12:38:15', '12:41:58'),
(94, 1, '2024-01-11', '12:42:13', '12:44:18'),
(95, 1, '2024-01-11', '12:45:18', '12:48:23'),
(96, 1, '2024-01-11', '12:46:18', '12:48:23'),
(97, 1, '2024-01-11', '12:46:49', '12:48:23'),
(98, 1, '2024-01-11', '12:48:43', '16:12:42'),
(100, 1, '2024-01-11', '16:13:49', '16:14:19'),
(101, 1, '2024-01-11', '18:29:48', '18:32:47'),
(102, 1, '2024-01-12', '11:51:06', '12:32:43'),
(103, 1, '2024-01-12', '12:32:54', '17:31:17'),
(104, 1, '2024-01-12', '17:31:30', '17:37:26'),
(106, 1, '2024-01-12', '17:38:41', '12:50:45'),
(107, 1, '2024-01-13', '15:22:12', '12:50:45'),
(108, 1, '2024-01-15', '09:50:45', '12:50:45'),
(109, 1, '2024-01-15', '12:51:12', '12:52:04'),
(110, 1, '2024-01-15', '12:52:15', '16:27:44'),
(111, 1, '2024-01-15', '16:47:03', '16:47:05'),
(112, 1, '2024-01-15', '16:50:06', '17:44:55'),
(113, 1, '2024-01-15', '18:34:30', '18:51:02'),
(114, 1, '2024-01-15', '18:51:22', '11:40:35'),
(115, 1, '2024-01-16', '11:40:47', '12:19:54'),
(116, 1, '2024-01-16', '12:20:22', '12:20:26'),
(117, 56, '2024-01-16', '12:20:45', '12:21:32'),
(118, 1, '2024-01-16', '12:21:54', '12:36:08'),
(119, 1, '2024-01-16', '13:59:51', '14:15:37'),
(120, 1, '2024-01-16', '14:15:47', '14:20:44'),
(121, 1, '2024-01-16', '14:21:45', '14:26:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimientos`
--

CREATE TABLE `tipomovimientos` (
  `id_tipomovimiento` int(11) NOT NULL,
  `descripcion_mov` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipomovimientos`
--

INSERT INTO `tipomovimientos` (`id_tipomovimiento`, `descripcion_mov`) VALUES
(1, 'Registrar Cliente'),
(2, 'Registrar Producto'),
(3, 'Registrar Proveedor'),
(4, 'Realizar Venta'),
(5, 'Editar cliente'),
(6, 'Editar Producto'),
(7, 'Editar Proveedor'),
(8, 'Eliminar Cliente'),
(9, 'Eliminar Producto'),
(10, 'Eliminar Proveedor'),
(11, 'Eliminar Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usermovimiento`
--

CREATE TABLE `usermovimiento` (
  `id_movimiento` int(11) NOT NULL,
  `tipo_movimiento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_relacion` int(11) DEFAULT NULL,
  `tipo_relacion` enum('cliente','producto','proveedor','venta') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usermovimiento`
--

INSERT INTO `usermovimiento` (`id_movimiento`, `tipo_movimiento`, `id_usuario`, `hora`, `id_relacion`, `tipo_relacion`) VALUES
(83, 4, 1, '2024-01-04 17:57:28', 108, 'venta'),
(85, 8, 1, '2024-01-04 20:28:11', 23, 'cliente'),
(86, 8, 1, '2024-01-04 21:18:24', 22, 'cliente'),
(87, 5, 1, '2024-01-04 21:18:32', 21, 'cliente'),
(88, 5, 1, '2024-01-04 21:21:58', 21, 'cliente'),
(89, 1, 1, '2024-01-04 21:23:15', 25, 'cliente'),
(90, 3, 1, '2024-01-04 21:28:47', 14, 'proveedor'),
(91, 9, 1, '2024-01-04 21:30:18', 22, 'producto'),
(92, 7, 1, '2024-01-04 21:37:04', 2, 'proveedor'),
(93, 10, 1, '2024-01-04 21:38:14', 11, 'proveedor'),
(94, 10, 1, '2024-01-04 21:38:18', 10, 'proveedor'),
(95, 6, 1, '2024-01-04 21:45:33', 21, 'producto'),
(96, 2, 1, '2024-01-04 21:47:20', 24, 'producto'),
(97, 4, 1, '2024-01-04 21:51:23', 109, 'venta'),
(98, 2, 1, '2024-01-05 14:16:14', 25, 'producto'),
(99, 4, 1, '2024-01-05 15:05:51', 110, 'venta'),
(100, 4, 1, '2024-01-05 15:08:04', 111, 'venta'),
(101, 4, 1, '2024-01-05 15:08:29', 112, 'venta'),
(102, 4, 1, '2024-01-05 15:08:43', 113, 'venta'),
(103, 4, 1, '2024-01-05 15:09:06', 114, 'venta'),
(104, 4, 1, '2024-01-05 16:00:13', 115, 'venta'),
(105, 4, 1, '2024-01-05 16:00:25', 116, 'venta'),
(106, 4, 1, '2024-01-05 16:01:01', 117, 'venta'),
(107, 4, 1, '2024-01-05 16:01:44', 118, 'venta'),
(108, 4, 1, '2024-01-05 16:14:39', 119, 'venta'),
(109, 4, 1, '2024-01-05 16:20:48', 120, 'venta'),
(110, 4, 1, '2024-01-06 20:34:49', 121, 'venta'),
(111, 8, 1, '2024-01-08 22:17:28', 25, 'cliente'),
(114, 4, 1, '2024-01-09 19:18:48', 124, 'venta'),
(115, 1, 1, '2024-01-10 14:42:10', 26, 'cliente'),
(116, 3, 1, '2024-01-10 14:56:03', 15, 'proveedor'),
(117, 1, 1, '2024-01-10 14:58:05', 27, 'cliente'),
(118, 3, 1, '2024-01-10 15:13:16', 16, 'proveedor'),
(119, 3, 1, '2024-01-10 15:18:16', 17, 'proveedor'),
(120, 2, 1, '2024-01-10 15:51:07', 26, 'producto'),
(121, 5, 1, '2024-01-10 17:47:53', 2, 'cliente'),
(122, 7, 1, '2024-01-10 17:56:30', 1, 'proveedor'),
(123, 6, 1, '2024-01-10 18:06:48', 17, 'producto'),
(124, 8, 1, '2024-01-10 18:26:30', 27, 'cliente'),
(125, 8, 1, '2024-01-10 18:26:39', 26, 'cliente'),
(126, 8, 1, '2024-01-10 18:29:26', 21, 'cliente'),
(127, 9, 1, '2024-01-10 18:54:46', 21, 'producto'),
(128, 11, 1, '2024-01-10 19:03:05', 123, 'venta'),
(129, 11, 1, '2024-01-10 19:03:10', 122, 'venta'),
(130, 4, 1, '2024-01-10 19:10:08', 125, 'venta'),
(131, 2, 1, '2024-01-10 21:44:35', 27, 'producto'),
(132, 2, 1, '2024-01-11 17:56:36', 28, 'producto'),
(133, 4, 1, '2024-01-12 20:33:17', 126, 'venta'),
(134, 11, 1, '2024-01-12 20:39:53', 125, 'venta'),
(135, 4, 1, '2024-01-15 16:35:16', 127, 'venta'),
(136, 4, 1, '2024-01-15 19:22:40', 128, 'venta'),
(137, 2, 1, '2024-01-15 19:25:23', 29, 'producto'),
(138, 9, 1, '2024-01-15 21:35:02', 29, 'producto'),
(139, 11, 1, '2024-01-15 21:35:11', 118, 'venta'),
(140, 9, 1, '2024-01-15 21:35:21', 28, 'producto'),
(141, 9, 1, '2024-01-15 21:38:44', 18, 'producto'),
(142, 9, 1, '2024-01-15 21:38:46', 27, 'producto'),
(143, 9, 1, '2024-01-15 21:38:48', 26, 'producto'),
(144, 11, 1, '2024-01-15 21:39:01', 107, 'venta'),
(145, 11, 1, '2024-01-15 21:39:03', 105, 'venta'),
(146, 11, 1, '2024-01-15 21:39:05', 108, 'venta'),
(147, 11, 1, '2024-01-15 21:39:06', 110, 'venta'),
(148, 11, 1, '2024-01-15 21:39:08', 111, 'venta'),
(149, 11, 1, '2024-01-15 21:39:10', 112, 'venta'),
(150, 11, 1, '2024-01-15 21:39:12', 115, 'venta'),
(151, 11, 1, '2024-01-15 21:39:14', 116, 'venta'),
(152, 11, 1, '2024-01-15 21:39:16', 117, 'venta'),
(153, 11, 1, '2024-01-15 21:39:18', 119, 'venta'),
(154, 11, 1, '2024-01-15 21:39:20', 120, 'venta'),
(155, 11, 1, '2024-01-15 21:39:22', 126, 'venta'),
(156, 11, 1, '2024-01-15 21:39:23', 127, 'venta'),
(157, 11, 1, '2024-01-15 21:39:25', 128, 'venta'),
(158, 8, 1, '2024-01-15 21:42:48', 17, 'cliente'),
(159, 8, 1, '2024-01-15 21:42:50', 14, 'cliente'),
(160, 8, 1, '2024-01-15 21:42:52', 13, 'cliente'),
(161, 8, 1, '2024-01-15 21:42:54', 2, 'cliente'),
(162, 8, 1, '2024-01-15 21:42:55', 3, 'cliente'),
(163, 8, 1, '2024-01-15 21:42:57', 7, 'cliente'),
(164, 8, 1, '2024-01-15 21:42:59', 9, 'cliente'),
(165, 8, 1, '2024-01-15 21:43:01', 11, 'cliente'),
(166, 3, 1, '2024-01-15 22:24:45', 18, 'proveedor'),
(167, 3, 1, '2024-01-15 22:25:45', 19, 'proveedor'),
(168, 3, 1, '2024-01-15 22:26:41', 20, 'proveedor'),
(169, 3, 1, '2024-01-16 14:42:47', 21, 'proveedor'),
(170, 2, 1, '2024-01-16 14:51:17', 62, 'producto'),
(171, 2, 1, '2024-01-16 14:51:49', 63, 'producto'),
(172, 2, 1, '2024-01-16 14:52:32', 64, 'producto'),
(173, 2, 1, '2024-01-16 14:53:40', 65, 'producto'),
(174, 2, 1, '2024-01-16 14:54:23', 66, 'producto'),
(175, 6, 1, '2024-01-16 14:54:35', 66, 'producto'),
(176, 2, 1, '2024-01-16 14:55:21', 67, 'producto'),
(177, 2, 1, '2024-01-16 14:56:14', 68, 'producto'),
(178, 4, 1, '2024-01-16 14:57:41', 129, 'venta'),
(179, 4, 1, '2024-01-16 14:58:56', 130, 'venta'),
(180, 4, 1, '2024-01-16 14:59:17', 131, 'venta'),
(181, 4, 1, '2024-01-16 15:02:57', 132, 'venta'),
(182, 4, 1, '2024-01-16 15:04:46', 133, 'venta'),
(183, 4, 1, '2024-01-16 15:05:16', 134, 'venta'),
(184, 4, 1, '2024-01-16 15:06:36', 135, 'venta'),
(185, 4, 1, '2024-01-16 15:07:19', 136, 'venta'),
(186, 4, 1, '2024-01-16 15:11:40', 137, 'venta'),
(187, 4, 1, '2024-01-16 15:11:45', 138, 'venta'),
(188, 4, 1, '2024-01-16 15:11:57', 139, 'venta'),
(189, 4, 1, '2024-01-16 15:12:18', 140, 'venta'),
(190, 4, 1, '2024-01-16 15:12:42', 141, 'venta'),
(191, 4, 1, '2024-01-16 15:13:37', 142, 'venta'),
(192, 4, 1, '2024-01-16 15:13:46', 143, 'venta'),
(193, 4, 1, '2024-01-16 15:18:07', 144, 'venta'),
(194, 4, 1, '2024-01-16 15:18:59', 145, 'venta'),
(195, 5, 1, '2024-01-16 15:28:04', 166, 'cliente'),
(196, 8, 1, '2024-01-16 15:28:11', 167, 'cliente'),
(197, 1, 1, '2024-01-16 15:29:51', 217, 'cliente'),
(198, 7, 1, '2024-01-16 15:31:04', 21, 'proveedor'),
(199, 3, 1, '2024-01-16 15:31:43', 22, 'proveedor'),
(200, 6, 1, '2024-01-16 15:32:25', 66, 'producto'),
(201, 9, 1, '2024-01-16 15:32:49', 66, 'producto'),
(202, 2, 1, '2024-01-16 15:33:29', 69, 'producto'),
(203, 4, 1, '2024-01-16 15:34:35', 146, 'venta'),
(204, 4, 1, '2024-01-16 15:35:20', 147, 'venta'),
(205, 4, 1, '2024-01-16 15:35:59', 148, 'venta'),
(206, 4, 1, '2024-01-16 17:00:17', 149, 'venta'),
(207, 4, 1, '2024-01-16 17:17:29', 150, 'venta'),
(208, 2, 1, '2024-01-16 17:24:59', 70, 'producto'),
(209, 4, 1, '2024-01-16 17:25:33', 151, 'venta'),
(210, 4, 1, '2024-01-16 17:25:53', 152, 'venta'),
(211, 11, 1, '2024-01-16 17:25:59', 152, 'venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nom_ape` text NOT NULL,
  `dni` int(8) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `contra_user` varchar(255) NOT NULL,
  `id_rol` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nom_ape`, `dni`, `mail`, `telefono`, `contra_user`, `id_rol`) VALUES
(1, 'admin', 11111, 'admin@gmail.com', 11111, 'admin', 1),
(56, 'usuario', 11111, 'usuario@gmail.com', 11111, 'usuario', 2),
(58, 'Leo Messi', 10101010, 'leo@gmail.com', 101010, 'Leomessi.10', 2),
(59, 'Rodrigo Aliendro', 29292929, 'rodrigo29@gmail.com', 292929, 'pETY.2929', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `importe_total` decimal(10,2) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `id_usuario`, `importe_total`, `id_cliente`) VALUES
(144, '2024-01-16 15:18:07', 1, '1500000.00', 216),
(145, '2024-01-16 15:18:59', 1, '1780000.00', 195),
(146, '2024-01-16 15:34:35', 1, '0.00', 166),
(147, '2024-01-16 15:35:20', 1, '750000.00', 217),
(148, '2024-01-16 15:35:59', 1, '800000.00', 187),
(149, '2024-01-16 17:00:17', 1, '1860000.00', 166),
(150, '2024-01-16 17:17:29', 1, '930000.00', 216),
(151, '2024-01-16 17:25:33', 1, '2350000.00', 217);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `sesion_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `tipomovimientos`
--
ALTER TABLE `tipomovimientos`
  ADD PRIMARY KEY (`id_tipomovimiento`);

--
-- Indices de la tabla `usermovimiento`
--
ALTER TABLE `usermovimiento`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `usermovimiento_ibfk_1` (`tipo_movimiento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol_descripcion` (`id_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `idx_fk_venta_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `tipomovimientos`
--
ALTER TABLE `tipomovimientos`
  MODIFY `id_tipomovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usermovimiento`
--
ALTER TABLE `usermovimiento`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usermovimiento`
--
ALTER TABLE `usermovimiento`
  ADD CONSTRAINT `usermovimiento_ibfk_1` FOREIGN KEY (`tipo_movimiento`) REFERENCES `tipomovimientos` (`id_tipomovimiento`),
  ADD CONSTRAINT `usermovimiento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
