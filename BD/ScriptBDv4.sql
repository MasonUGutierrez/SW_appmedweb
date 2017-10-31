-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2017 a las 21:43:39
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmedweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbareamedica`
--

CREATE TABLE `tbareamedica` (
  `IdAreaMedica` int(11) NOT NULL,
  `AreaMedica` varchar(100) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbareamedica`
--

INSERT INTO `tbareamedica` (`IdAreaMedica`, `AreaMedica`, `FechaIngreso`, `Estado`) VALUES
(1, 'Pediatria', '2017-08-29 09:34:16', 1),
(2, 'Medicina Interna', '2017-08-29 09:34:42', 1),
(3, 'Ginecologia', '2017-08-29 09:34:52', 1),
(4, 'Neurologia', '2017-08-29 09:35:04', 1),
(5, 'Otorrinolaringologia', '2017-08-29 09:36:08', 1),
(6, 'Endocrinologia', '2017-08-29 09:36:17', 1),
(7, 'Cardiologia', '2017-08-29 09:36:26', 1),
(8, 'Nutricion', '2017-08-29 09:36:51', 1),
(9, 'Medicina General', '2017-08-29 09:37:54', 1),
(10, 'Cirugia', '2017-08-29 09:38:07', 1),
(11, 'Dermatologia', '2017-08-29 09:38:22', 1),
(12, 'Urologia', '2017-08-29 09:38:32', 1),
(13, 'Gastroenterologia', '2017-08-29 09:39:26', 1),
(14, 'Psiquiatria', '2017-08-29 09:39:35', 1),
(15, 'Psicologia', '2017-08-29 09:39:43', 1),
(16, 'Ortopedia', '2017-08-29 09:39:50', 1),
(17, 'Oftalmologia', '2017-08-29 09:40:30', 1),
(18, 'Fisiatria', '2017-08-29 09:41:33', 1),
(19, 'Area Aleatoria', '2017-08-31 11:14:00', 0),
(20, 'Oncologia', '2017-08-31 12:43:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcita`
--

CREATE TABLE `tbcita` (
  `IdCita` int(11) NOT NULL,
  `IdMedico` int(11) NOT NULL,
  `IdExpediente` int(11) NOT NULL,
  `FechaCita` date DEFAULT NULL,
  `EstadoCita` varchar(1) NOT NULL DEFAULT 'P',
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcita`
--

INSERT INTO `tbcita` (`IdCita`, `IdMedico`, `IdExpediente`, `FechaCita`, `EstadoCita`, `FechaIngreso`, `Estado`) VALUES
(3, 3, 2, '2017-10-15', 'C', '2017-10-15 16:10:27', 1),
(4, 4, 2, '2017-10-31', 'R', '2017-10-15 19:06:15', 1),
(5, 3, 2, '2017-10-20', 'P', '2017-10-15 21:17:01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclinica`
--

CREATE TABLE `tbclinica` (
  `IdClinica` int(11) NOT NULL,
  `Ruc` varchar(255) NOT NULL,
  `NombreClinica` varchar(100) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Url` varchar(50) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclinica`
--

INSERT INTO `tbclinica` (`IdClinica`, `Ruc`, `NombreClinica`, `Telefono`, `Direccion`, `Correo`, `Url`, `FechaIngreso`, `Estado`) VALUES
(1, '201456321568', 'Clinica Aleatoria', '22563591', 'Bello Horizonte, Managua', 'miclinica@outlook.com', 'www.miclinicaaleatoria.com', '2017-09-15 16:23:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconsulta`
--

CREATE TABLE `tbconsulta` (
  `IdConsulta` int(11) NOT NULL,
  `IdMedico` int(11) NOT NULL,
  `IdExpediente` int(11) NOT NULL,
  `Peso` varchar(10) DEFAULT NULL,
  `Presion` varchar(10) DEFAULT NULL,
  `Padecimiento` varchar(500) DEFAULT NULL,
  `Tratamiento` varchar(500) DEFAULT NULL,
  `Examenes` varchar(500) DEFAULT NULL,
  `FechaConsulta` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbconsulta`
--

INSERT INTO `tbconsulta` (`IdConsulta`, `IdMedico`, `IdExpediente`, `Peso`, `Presion`, `Padecimiento`, `Tratamiento`, `Examenes`, `FechaConsulta`, `Estado`) VALUES
(1, 3, 2, '150', '25', 'Dolor en articulaciones', 'Acetominofen', 'Sangre', '2017-10-17 10:33:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconsultaenfermedad`
--

CREATE TABLE `tbconsultaenfermedad` (
  `IdConsultaEnfermedad` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdEnfermedad` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbconsultaenfermedad`
--

INSERT INTO `tbconsultaenfermedad` (`IdConsultaEnfermedad`, `IdConsulta`, `IdEnfermedad`, `Estado`) VALUES
(1, 1, 1, 1),
(2, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdia`
--

CREATE TABLE `tbdia` (
  `IdDia` int(11) NOT NULL,
  `Dia` varchar(9) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdia`
--

INSERT INTO `tbdia` (`IdDia`, `Dia`, `Estado`) VALUES
(1, 'Lunes', 1),
(2, 'Martes', 1),
(3, 'Miércoles', 1),
(4, 'Jueves', 1),
(5, 'Viernes', 1),
(6, 'Sábado', 1),
(7, 'Domingo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdiamedico`
--

CREATE TABLE `tbdiamedico` (
  `IdDiasMedico` int(11) NOT NULL,
  `IdDia` int(11) NOT NULL,
  `IdMedico` int(11) NOT NULL,
  `HoraInicio` int(4) DEFAULT NULL,
  `HoraFin` int(4) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdiamedico`
--

INSERT INTO `tbdiamedico` (`IdDiasMedico`, `IdDia`, `IdMedico`, `HoraInicio`, `HoraFin`, `Estado`) VALUES
(2, 1, 2, 7, 18, 0),
(12, 1, 3, 8, 16, 1),
(13, 2, 3, 8, 16, 1),
(15, 3, 4, 7, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbenfermedad`
--

CREATE TABLE `tbenfermedad` (
  `IdEnfermedad` int(11) NOT NULL,
  `Enfermedad` varchar(250) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbenfermedad`
--

INSERT INTO `tbenfermedad` (`IdEnfermedad`, `Enfermedad`, `FechaIngreso`, `Estado`) VALUES
(1, 'Conjuntivitis', '2017-08-27 21:03:34', 1),
(2, 'Cancer de Mama', '2017-08-27 21:04:03', 1),
(3, 'Neumonia', '2017-08-27 21:04:03', 1),
(4, 'Amigdalitis', '2017-08-27 21:05:36', 1),
(5, 'Faringitis Granulosa', '2017-08-27 21:05:36', 1),
(6, 'Gastritis', '2017-08-27 21:06:19', 1),
(7, 'Tuberculosis', '2017-08-27 21:06:19', 1),
(8, 'Miocarditis', '2017-08-27 21:07:07', 1),
(9, 'Asma Bronquial', '2017-08-27 21:07:07', 1),
(10, 'Diabetes', '2017-08-27 21:08:11', 1),
(11, 'Hipertensión arterial', '2017-08-27 21:08:11', 1),
(12, 'Cancer Terminal', '2017-08-27 21:08:34', 1),
(13, 'Insuficiencia Venosa', '2017-08-27 21:08:34', 1),
(14, 'Enfisema Pulmonar', '2017-08-27 23:05:19', 1),
(15, 'Dislipidemia', '2017-08-27 23:05:19', 1),
(16, 'Malaria', '2017-08-27 23:05:19', 1),
(17, 'Otitis', '2017-08-27 23:05:19', 1),
(18, 'Hipoacusia', '2017-08-27 23:05:19', 1),
(19, 'Ulcera Gastrica', '2017-08-27 23:05:19', 1),
(20, 'Duodenitis', '2017-08-27 23:05:19', 1),
(21, 'Pancreatitis', '2017-08-27 23:05:19', 1),
(22, 'Cataratas', '2017-08-27 23:05:19', 1),
(23, 'Vaginitis', '2017-08-27 23:05:19', 1),
(24, 'Cirrosis', '2017-08-27 23:05:19', 1),
(25, 'Hepatitis A', '2017-08-27 23:05:19', 1),
(26, 'Hepatitis B', '2017-08-27 23:05:19', 1),
(27, 'Hepatitis C', '2017-08-27 23:05:19', 1),
(28, 'Leusemia', '2017-08-27 23:05:19', 1),
(29, 'Cancer en la piel', '2017-08-28 02:05:07', 0),
(30, 'Una Enfermedad Incurable', '2017-08-28 11:59:27', 0),
(31, 'Enfermedad X', '2017-08-29 00:55:17', 0),
(32, 'Contusión arterial', '2017-08-29 03:18:14', 0),
(33, 'Enfermedad Y', '2017-08-31 12:42:47', 1),
(34, 'Otra Enfermedad', '2017-09-15 19:59:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbexpediente`
--

CREATE TABLE `tbexpediente` (
  `IdExpediente` int(11) NOT NULL,
  `Nombres` varchar(120) DEFAULT NULL,
  `Apellidos` varchar(120) DEFAULT NULL,
  `Edad` int(2) NOT NULL,
  `Ocupacion` varchar(1) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `TipoSangre` varchar(3) DEFAULT NULL,
  `Alergias` varchar(250) DEFAULT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `ContactoEmergencia` varchar(120) DEFAULT NULL,
  `ParentezcoContacto` varchar(120) DEFAULT NULL,
  `TelefonoContacto` varchar(15) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbexpediente`
--

INSERT INTO `tbexpediente` (`IdExpediente`, `Nombres`, `Apellidos`, `Edad`, `Ocupacion`, `Sexo`, `TipoSangre`, `Alergias`, `Direccion`, `Correo`, `Telefono`, `ContactoEmergencia`, `ParentezcoContacto`, `TelefonoContacto`, `FechaIngreso`, `Estado`) VALUES
(2, 'Mason Ernesto', 'Urbina Gutierrez', 21, 'E', 'M', 'B+', 'Ninguna', 'Managua', 'mason@gmail.com', '88171183', 'Jose Urbina', 'F', '48563586', '2017-10-14 22:21:41', 1),
(3, 'asdfg', 'sdfg', 21, 'E', 'F', 'A+', 'dsfgh', 'sadfg', 'asdfg@adsfff.com', '2248-3887', 'xsdfg', 'F', 'adsfghj', '2017-10-17 01:29:32', 0),
(4, 'Ernesto', 'Gutierrez', 21, 'O', 'M', 'B+', 'ninguna', 'managua', 'ernesto@gmail.com', '88456532', 'Alfredo', 'F', '22486593', '2017-10-17 12:47:40', 1),
(5, 'Celeste', 'Aleman', 24, 'E', 'F', 'A+', 'ninguna', 'Managua', 'celal@outlook.com', '88271183', 'Martin Juarez', 'C', '22649535', '2017-10-17 13:02:06', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmedico`
--

CREATE TABLE `tbmedico` (
  `IdMedico` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdAreaMedica` int(11) DEFAULT NULL,
  `CodMinsa` varchar(255) NOT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `SubEspecialidad` varchar(100) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmedico`
--

INSERT INTO `tbmedico` (`IdMedico`, `IdPersona`, `IdAreaMedica`, `CodMinsa`, `Especialidad`, `SubEspecialidad`, `FechaIngreso`, `Estado`) VALUES
(2, 16, 1, 'adfasdfs', NULL, 'adfdafsd', '2017-09-16 14:48:32', 1),
(3, 17, 2, '254635', 'Medicina Interna', 'Maternidad', '2017-09-16 17:40:37', 1),
(4, 18, 1, '256485', 'Medicina Interna', 'Nutrición', '2017-09-16 23:46:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

CREATE TABLE `tbpersona` (
  `IdPersona` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Cedula` varchar(16) DEFAULT NULL,
  `Nombres` varchar(120) DEFAULT NULL,
  `Apellidos` varchar(120) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpersona`
--

INSERT INTO `tbpersona` (`IdPersona`, `IdUsuario`, `Cedula`, `Nombres`, `Apellidos`, `Sexo`, `Telefono`, `Direccion`, `Correo`, `FechaIngreso`, `Estado`) VALUES
(1, 1, '0010503960016T', 'Mason Ernesto', 'Urbina Gutiérrez', 'M', '88171183', 'Managua, Nicaragua', 'msn.guti5395@gmail.com', '2017-08-31 10:23:19', 1),
(2, 3, '0010503960026D', 'Ernesto Antonio', 'Gutiérrez Gaitán', 'M', '88159463', 'managua, nicaragua', 'ernesto@gmail.com', '2017-09-05 11:00:28', 1),
(3, 4, '0013005930015D', 'Jose Antonio', 'Urbina Gutiérrez', 'M', '88159462', 'managua, nicaragua', 'joseantonio@gmail.com', '2017-09-05 11:03:32', 1),
(5, 6, '0010212930015T', 'Pedro', 'Gutiérrez', 'M', '88159462', 'managua, nicaragua', 'pedro@outlook.com', '2017-09-05 11:24:02', 1),
(6, 7, '0013005930015D', 'Matilde', 'Rojas', 'F', '55216354', 'managua, nicaragua', 'matilda@gmail.com', '2017-09-05 11:34:24', 1),
(8, 9, '0013005930016D', 'Jose Antonio', 'Urbina Gutierrez', 'M', '82653435', 'Managua, Nicaragua', 'antonio@gmail.com', '2017-09-08 01:04:18', 1),
(9, 10, '0012506950025D', 'Admin Prueba', 'Admin Prueba', 'M', '88546213', 'Managua, Nicaragua', 'admin@gmail.com', '2017-09-09 22:13:37', 0),
(10, 11, '0010212920051T', 'Usuario Admin', 'Admin Usuario', 'F', '22456951', 'managua, nicaragua', 'usuarioadmin@gmail.com', '2017-09-10 23:10:55', 0),
(11, 12, '0010503960016T', 'Mason Ernesto', 'Urbina Gutiérrez', 'M', '22483887', 'Managua, Nicaragua', 'msn.guti5395@outlook.com', '2017-09-13 01:05:26', 1),
(12, 13, '0012512930025D', 'Andrew Ernesto', 'Garcia Martinez', 'M', '22563421', 'managua, nicaragua', 'andrew@gmail.com', '2017-09-14 23:40:59', 1),
(13, 14, '0810506960015D', 'Usuario', 'Usuario', 'F', '22563521', 'managua, nicaragua', 'usuario.usuario@gmail.com', '2017-09-15 20:03:53', 0),
(16, 17, 'asdfasdf', 'asdfadfs', 'asdsfasfd', 'F', 'adfadf', 'asdsfadf', 'asdafsd', '2017-09-16 14:48:32', 0),
(17, 18, '0012412960053R', 'UsuarioM', 'UsuarioM', 'M', '72546352', 'managua, nicaragua', 'usuariom@gmail.com', '2017-09-16 17:40:37', 1),
(18, 19, '0812506950052F', 'OtroUsuarioM', 'OtroUsuarioM', 'F', '22569865', 'managua, nicaragua', 'usuario@usuario.com', '2017-09-16 23:46:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `IdUsuario` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `Rol` varchar(1) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`IdUsuario`, `name`, `password`, `Rol`, `FechaIngreso`, `remember_token`, `Estado`) VALUES
(1, 'MasonAdmin', '$2y$10$5ykdAJtCfZaDhBHblJUq/.8YbYUY3rFRgeQ2DAMURTpydExukVWIO', 'A', '2017-08-31 10:22:04', '3elOvBmVGH3PEPmoeth0830MmGbz6CfH7HuDTSFbPtN6O255aFutt1czSkCD', 1),
(3, 'ErnestoAdmin', '$2y$10$7pPPvLF5b2pyqSLYr9qVUursKSPkRL5vZGPhsTSYQ3L6Loscid7sS', 'A', '2017-09-05 11:00:28', '', 1),
(4, 'JoseAdmin', '$2y$10$GXkv52Vev.sXJo7LzMYiZ.mJHoeVJElp8/oWH4hQ40ciJm/geKDV2', 'A', '2017-09-05 11:03:32', 'EdztBt4beO9oONuhK8lxiNxbebQsaehKld7Rcd0mHfly1uIWlXnBisZ4pNTO', 1),
(6, 'PedroAdmin', '$2y$10$AXyKnsafPYMyBf12KgCCx.X5Cr9w4z57CPuhcWGlo9URyKxtv.qpu', 'A', '2017-09-05 11:24:02', '', 1),
(7, 'MatildeAdmin', '$2y$10$IlZPjuZPVhCgbPk04Calie6zuVy2FqWhU8qoJl3LWVDyxBWsWISCu', 'A', '2017-09-05 11:34:24', '', 1),
(9, 'AntonioPA', '$2y$10$ODIC6dEoVn/ptkxHQ2cm7OuAfLm9E1cyYJPagWMJzZ.0bBTAXckt2', 'P', '2017-09-08 01:04:18', 'b2MgvfA7xlxL28aNB0df9uOVwCxT6NzeosIz1aoRSl8ZdeFXd2cOk3h77H8e', 1),
(10, 'AdminPrueba', '123456789', 'A', '2017-09-09 22:13:37', '', 0),
(11, 'AdminUser', '123456', 'A', '2017-09-10 23:10:55', '', 0),
(12, 'MeiAdmin', '$2y$10$K5b1jnS2CKOt.zjyt3EAP.xXI5q63Cf7ehEHnr5VpBBgWt97IPz22', 'A', '2017-09-13 01:05:26', 'cCjwOKQ9lt4FPkW4bWqGUN1C91EElFcmLYsCKDMiIgFz8VhKL06g8TPMwk8D', 1),
(13, 'AndrewPA', '$2y$10$3qdm41N7SYbSfYdt2emM0.siO0/goBTnwNFiPNau0I3JnBXO3uTJi', 'P', '2017-09-14 23:40:59', 'uQ4wupmu0tFykuVZxG0by3Z8nhb9wXTAC2wIz6xgkXnmzFlV4Uo4tKH7erst', 1),
(14, 'UsuarioPA', '$2y$10$TeRYraTw3sNZElTlOK57Re.wjIZXXt5lKvQ66o8AG.aFwJ.P7PB6e', 'P', '2017-09-15 20:03:53', NULL, 0),
(17, 'adfadf', '$2y$10$jfexAJPzXe//tFGaqS3kTO5QNmX17UrCUOyPeo960Y02LTl54BreK', 'M', '2017-09-16 14:48:31', NULL, 0),
(18, 'UsuarioM', '$2y$10$3EoV1DcAr1Gf0hfIsVil2ul3cW99bkVJ9Yd9Jz39GXB1HGaFWc8jy', 'M', '2017-09-16 17:40:37', 'SYLL40jfsjtGdHQnJYI3EmPICk594gJeFRc7unpWUI4OfGQ1KtbqHqXLfZZs', 1),
(19, 'OtroUsuarioM', '$2y$10$vitqcCeYoMODY5RwKBEIKeM.c8JoquW3t5ErUjWGEaS3Y1SUo/pHu', 'M', '2017-09-16 23:46:23', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbareamedica`
--
ALTER TABLE `tbareamedica`
  ADD PRIMARY KEY (`IdAreaMedica`);

--
-- Indices de la tabla `tbcita`
--
ALTER TABLE `tbcita`
  ADD PRIMARY KEY (`IdCita`),
  ADD KEY `FK_TbMedico3` (`IdMedico`),
  ADD KEY `FK_TbExpediente2` (`IdExpediente`);

--
-- Indices de la tabla `tbclinica`
--
ALTER TABLE `tbclinica`
  ADD PRIMARY KEY (`IdClinica`);

--
-- Indices de la tabla `tbconsulta`
--
ALTER TABLE `tbconsulta`
  ADD PRIMARY KEY (`IdConsulta`),
  ADD KEY `FK_TbMedico2` (`IdMedico`),
  ADD KEY `FK_TbExpediente` (`IdExpediente`);

--
-- Indices de la tabla `tbconsultaenfermedad`
--
ALTER TABLE `tbconsultaenfermedad`
  ADD PRIMARY KEY (`IdConsultaEnfermedad`),
  ADD KEY `FK_TbConsulta` (`IdConsulta`),
  ADD KEY `FK_TbEnfermedad` (`IdEnfermedad`);

--
-- Indices de la tabla `tbdia`
--
ALTER TABLE `tbdia`
  ADD PRIMARY KEY (`IdDia`);

--
-- Indices de la tabla `tbdiamedico`
--
ALTER TABLE `tbdiamedico`
  ADD PRIMARY KEY (`IdDiasMedico`),
  ADD KEY `FK_TbDia` (`IdDia`),
  ADD KEY `FK_TbMedico` (`IdMedico`);

--
-- Indices de la tabla `tbenfermedad`
--
ALTER TABLE `tbenfermedad`
  ADD PRIMARY KEY (`IdEnfermedad`);

--
-- Indices de la tabla `tbexpediente`
--
ALTER TABLE `tbexpediente`
  ADD PRIMARY KEY (`IdExpediente`);

--
-- Indices de la tabla `tbmedico`
--
ALTER TABLE `tbmedico`
  ADD PRIMARY KEY (`IdMedico`),
  ADD KEY `FK_TbPersona` (`IdPersona`),
  ADD KEY `FK_TbAreaMedica` (`IdAreaMedica`);

--
-- Indices de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`IdPersona`),
  ADD KEY `FK_TbUsuario` (`IdUsuario`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbareamedica`
--
ALTER TABLE `tbareamedica`
  MODIFY `IdAreaMedica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tbcita`
--
ALTER TABLE `tbcita`
  MODIFY `IdCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbclinica`
--
ALTER TABLE `tbclinica`
  MODIFY `IdClinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbconsulta`
--
ALTER TABLE `tbconsulta`
  MODIFY `IdConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbconsultaenfermedad`
--
ALTER TABLE `tbconsultaenfermedad`
  MODIFY `IdConsultaEnfermedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbdia`
--
ALTER TABLE `tbdia`
  MODIFY `IdDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbdiamedico`
--
ALTER TABLE `tbdiamedico`
  MODIFY `IdDiasMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbenfermedad`
--
ALTER TABLE `tbenfermedad`
  MODIFY `IdEnfermedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `tbexpediente`
--
ALTER TABLE `tbexpediente`
  MODIFY `IdExpediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbmedico`
--
ALTER TABLE `tbmedico`
  MODIFY `IdMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcita`
--
ALTER TABLE `tbcita`
  ADD CONSTRAINT `FK_TbExpediente2` FOREIGN KEY (`IdExpediente`) REFERENCES `tbexpediente` (`IdExpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TbMedico3` FOREIGN KEY (`IdMedico`) REFERENCES `tbmedico` (`IdMedico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbconsulta`
--
ALTER TABLE `tbconsulta`
  ADD CONSTRAINT `FK_TbExpediente` FOREIGN KEY (`IdExpediente`) REFERENCES `tbexpediente` (`IdExpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TbMedico2` FOREIGN KEY (`IdMedico`) REFERENCES `tbmedico` (`IdMedico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbconsultaenfermedad`
--
ALTER TABLE `tbconsultaenfermedad`
  ADD CONSTRAINT `FK_TbConsulta` FOREIGN KEY (`IdConsulta`) REFERENCES `tbconsulta` (`IdConsulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TbEnfermedad` FOREIGN KEY (`IdEnfermedad`) REFERENCES `tbenfermedad` (`IdEnfermedad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbdiamedico`
--
ALTER TABLE `tbdiamedico`
  ADD CONSTRAINT `FK_TbDia` FOREIGN KEY (`IdDia`) REFERENCES `tbdia` (`IdDia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TbMedico` FOREIGN KEY (`IdMedico`) REFERENCES `tbmedico` (`IdMedico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbmedico`
--
ALTER TABLE `tbmedico`
  ADD CONSTRAINT `FK_TbAreaMedica` FOREIGN KEY (`IdAreaMedica`) REFERENCES `tbareamedica` (`IdAreaMedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TbPersona` FOREIGN KEY (`IdPersona`) REFERENCES `tbpersona` (`IdPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD CONSTRAINT `FK_TbUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `tbusuario` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
