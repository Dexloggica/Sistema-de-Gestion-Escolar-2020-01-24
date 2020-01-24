-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2018 a las 02:50:31
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `20181020_version1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `Cargo_idCargo` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `AsignaturaDesc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`Cargo_idCargo`, `idAsignatura`, `AsignaturaDesc`) VALUES
(1, 1, 'Materias de Grado'),
(2, 2, 'Materias de Grado'),
(3, 3, 'Materia Especial'),
(3, 4, 'Materia Especial'),
(4, 5, 'Matematica'),
(4, 6, 'Matematica'),
(5, 7, 'Literatura'),
(6, 8, 'Literatura'),
(7, 9, 'Tarea Administrativa'),
(7, 10, 'Tarea Administrativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `AutorDesc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `AutorDesc`) VALUES
(1, 'Liliana Bodoc'),
(2, 'John Katzenbach');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificaciones` int(11) NOT NULL,
  `1erTrimestre` int(11) DEFAULT NULL,
  `2doTrimestre` int(11) DEFAULT NULL,
  `3erTrimestre` int(11) DEFAULT NULL,
  `Anio` year(4) DEFAULT NULL,
  `idDocenteResponsable` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificaciones`, `1erTrimestre`, `2doTrimestre`, `3erTrimestre`, `Anio`, `idDocenteResponsable`, `idAsignatura`, `idAlumno`) VALUES
(1, 7, 0, 0, 2018, 1, 1, 9),
(2, 7, 9, 0, 2018, 1, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `TipoCargo` int(11) DEFAULT NULL,
  `Escuela` varchar(45) DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `DecretoDesignacion` varchar(45) DEFAULT NULL,
  `SituaciondeRevistaDesc` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `CantidadHorasCatedra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `TipoCargo`, `Escuela`, `Categoria`, `FechaInicio`, `FechaFin`, `DecretoDesignacion`, `SituaciondeRevistaDesc`, `Persona_idPersona`, `CantidadHorasCatedra`) VALUES
(1, 8, 'Mariano Moreno', 'Primera', '1910-12-31', '0000-00-00', 'abc-123', 'Titular', 2, NULL),
(2, 8, 'Mariano Moreno', 'Primera', '2003-12-31', '0000-00-00', 'abc-123', 'Titular', 3, NULL),
(3, 8, 'Mariano Moreno', 'Primera', '2016-04-25', '0000-00-00', 'abc-123', 'Suplente', 4, NULL),
(4, 8, 'Mariano Moreno', 'Primera', '2018-12-31', '0000-00-00', '', 'Interino', 5, NULL),
(5, 8, 'Mariano Moreno', 'Primera', '2016-12-31', '0000-00-00', 'abc-123', 'Titular', 6, NULL),
(6, 8, 'Mariano Moreno', 'Primera', '2017-01-31', '0000-00-00', '', 'Titular', 7, NULL),
(7, 5, 'Mariano Moreno', 'Primera', '2018-10-25', '2018-12-31', 'abc-123', 'Suplente', 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_has_horarioactividad`
--

CREATE TABLE `cargo_has_horarioactividad` (
  `Cargo_idCargo` int(11) NOT NULL,
  `HorarioActividad_idHorarioActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_has_nivel`
--

CREATE TABLE `cargo_has_nivel` (
  `Cargo_idCargo` int(11) NOT NULL,
  `Nivel_idNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo_has_nivel`
--

INSERT INTO `cargo_has_nivel` (`Cargo_idCargo`, `Nivel_idNivel`) VALUES
(1, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 3),
(4, 4),
(5, 3),
(6, 4),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ceduladocente`
--

CREATE TABLE `ceduladocente` (
  `idCedulaDocente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `idControl` int(11) NOT NULL,
  `NombreTablaEditada` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`idControl`, `NombreTablaEditada`, `Fecha`, `Hora`, `idUsuario`) VALUES
(1, 'Acceso al Sistema', '2018-10-28', '12:15:12', 1),
(2, 'Nivel', '2018-10-28', '12:20:34', 1),
(3, 'Nivel', '2018-10-28', '12:20:46', 1),
(4, 'Nivel', '2018-10-28', '12:20:54', 1),
(5, 'Nivel', '2018-10-28', '12:21:10', 1),
(6, 'Persona', '2018-10-28', '12:27:05', 1),
(7, 'FechaNacimiento', '2018-10-28', '12:27:05', 1),
(8, 'DatosPersonales', '2018-10-28', '12:27:05', 1),
(9, 'Domicilio', '2018-10-28', '12:27:05', 1),
(10, 'DatosContacto', '2018-10-28', '12:27:05', 1),
(11, 'Estudios', '2018-10-28', '12:27:05', 1),
(12, 'Tecnologia', '2018-10-28', '12:27:05', 1),
(13, 'Deportes', '2018-10-28', '12:27:05', 1),
(14, 'Discapacidad', '2018-10-28', '12:27:05', 1),
(15, 'Cargo', '2018-10-28', '12:27:05', 1),
(16, 'Persona', '2018-10-28', '12:29:27', 1),
(17, 'FechaNacimiento', '2018-10-28', '12:29:27', 1),
(18, 'DatosPersonales', '2018-10-28', '12:29:27', 1),
(19, 'Domicilio', '2018-10-28', '12:29:27', 1),
(20, 'DatosContacto', '2018-10-28', '12:29:27', 1),
(21, 'Estudios', '2018-10-28', '12:29:27', 1),
(22, 'Tecnologia', '2018-10-28', '12:29:27', 1),
(23, 'Deportes', '2018-10-28', '12:29:27', 1),
(24, 'Discapacidad', '2018-10-28', '12:29:27', 1),
(25, 'Cargo', '2018-10-28', '12:29:27', 1),
(26, 'Persona', '2018-10-28', '12:35:38', 1),
(27, 'FechaNacimiento', '2018-10-28', '12:35:38', 1),
(28, 'DatosPersonales', '2018-10-28', '12:35:38', 1),
(29, 'Domicilio', '2018-10-28', '12:35:38', 1),
(30, 'DatosContacto', '2018-10-28', '12:35:38', 1),
(31, 'Estudios', '2018-10-28', '12:35:38', 1),
(32, 'Tecnologia', '2018-10-28', '12:35:38', 1),
(33, 'Deportes', '2018-10-28', '12:35:38', 1),
(34, 'Discapacidad', '2018-10-28', '12:35:38', 1),
(35, 'Cargo', '2018-10-28', '12:35:38', 1),
(36, 'Persona', '2018-10-28', '12:38:44', 1),
(37, 'FechaNacimiento', '2018-10-28', '12:38:44', 1),
(38, 'DatosPersonales', '2018-10-28', '12:38:44', 1),
(39, 'Domicilio', '2018-10-28', '12:38:44', 1),
(40, 'DatosContacto', '2018-10-28', '12:38:44', 1),
(41, 'Estudios', '2018-10-28', '12:38:44', 1),
(42, 'Tecnologia', '2018-10-28', '12:38:44', 1),
(43, 'Deportes', '2018-10-28', '12:38:44', 1),
(44, 'Discapacidad', '2018-10-28', '12:38:44', 1),
(45, 'Cargo', '2018-10-28', '12:38:44', 1),
(46, 'Persona', '2018-10-28', '12:40:24', 1),
(47, 'FechaNacimiento', '2018-10-28', '12:40:24', 1),
(48, 'DatosPersonales', '2018-10-28', '12:40:24', 1),
(49, 'Domicilio', '2018-10-28', '12:40:24', 1),
(50, 'DatosContacto', '2018-10-28', '12:40:24', 1),
(51, 'Estudios', '2018-10-28', '12:40:24', 1),
(52, 'Tecnologia', '2018-10-28', '12:40:24', 1),
(53, 'Deportes', '2018-10-28', '12:40:24', 1),
(54, 'Discapacidad', '2018-10-28', '12:40:24', 1),
(55, 'Cargo', '2018-10-28', '12:40:24', 1),
(56, 'Persona', '2018-10-28', '12:42:18', 1),
(57, 'FechaNacimiento', '2018-10-28', '12:42:18', 1),
(58, 'DatosPersonales', '2018-10-28', '12:42:18', 1),
(59, 'Domicilio', '2018-10-28', '12:42:18', 1),
(60, 'DatosContacto', '2018-10-28', '12:42:18', 1),
(61, 'Estudios', '2018-10-28', '12:42:18', 1),
(62, 'Tecnologia', '2018-10-28', '12:42:18', 1),
(63, 'Deportes', '2018-10-28', '12:42:18', 1),
(64, 'Discapacidad', '2018-10-28', '12:42:18', 1),
(65, 'Cargo', '2018-10-28', '12:42:18', 1),
(66, 'Persona', '2018-10-28', '12:45:18', 1),
(67, 'FechaNacimiento', '2018-10-28', '12:45:18', 1),
(68, 'DatosPersonales', '2018-10-28', '12:45:18', 1),
(69, 'Domicilio', '2018-10-28', '12:45:18', 1),
(70, 'DatosContacto', '2018-10-28', '12:45:18', 1),
(71, 'Estudios', '2018-10-28', '12:45:18', 1),
(72, 'Tecnologia', '2018-10-28', '12:45:18', 1),
(73, 'Deportes', '2018-10-28', '12:45:18', 1),
(74, 'Discapacidad', '2018-10-28', '12:45:18', 1),
(75, 'Cargo', '2018-10-28', '12:45:18', 1),
(76, 'Acceso al Sistema', '2018-10-29', '21:37:23', 1),
(77, 'Acceso al Sistema', '2018-10-29', '22:05:30', 2),
(78, 'Acceso al Sistema', '2018-10-29', '22:06:17', 1),
(79, 'Permisos', '2018-10-29', '22:06:35', 1),
(80, 'Permisos', '2018-10-29', '22:06:39', 1),
(81, 'Acceso al Sistema', '2018-10-29', '22:07:08', 2),
(82, 'Acceso al Sistema', '2018-10-29', '22:07:33', 1),
(83, 'Cargo_has_Nivel', '2018-10-29', '22:18:28', 1),
(84, 'Cargo_has_Nivel', '2018-10-29', '22:18:42', 1),
(85, 'Cargo_has_Nivel', '2018-10-29', '22:18:53', 1),
(86, 'Cargo_has_Nivel', '2018-10-29', '22:18:59', 1),
(87, 'Cargo_has_Nivel', '2018-10-29', '22:19:21', 1),
(88, 'Cargo_has_Nivel', '2018-10-29', '22:19:25', 1),
(89, 'Cargo_has_Nivel', '2018-10-29', '22:19:32', 1),
(90, 'Cargo_has_Nivel', '2018-10-29', '22:19:41', 1),
(91, 'Cargo_has_Nivel', '2018-10-29', '22:19:54', 1),
(92, 'Cargo_has_Nivel', '2018-10-29', '22:19:58', 1),
(93, 'Acceso al Sistema', '2018-11-22', '09:40:54', 1),
(94, 'Acceso al Sistema', '2018-11-22', '09:52:07', 1),
(95, 'Permisos', '2018-11-22', '09:52:57', 1),
(96, 'Permisos', '2018-11-22', '09:53:09', 1),
(97, 'Acceso al Sistema', '2018-11-24', '19:58:38', 1),
(98, 'Acceso al Sistema', '2018-11-25', '22:30:43', 1),
(99, 'Genero', '2018-11-25', '22:40:45', 1),
(100, 'Genero', '2018-11-25', '22:40:45', 1),
(101, 'Autor', '2018-11-25', '22:40:45', 1),
(102, 'Pais', '2018-11-25', '22:40:45', 1),
(103, 'Editorial', '2018-11-25', '22:40:45', 1),
(104, 'Libro', '2018-11-25', '22:40:45', 1),
(105, 'Libro_has_Genero', '2018-11-25', '22:40:45', 1),
(106, 'Libro_has_Genero', '2018-11-25', '22:40:45', 1),
(107, 'Libro_has_Autor', '2018-11-25', '22:40:46', 1),
(108, 'Genero', '2018-11-25', '22:47:59', 1),
(109, 'Genero', '2018-11-25', '22:47:59', 1),
(110, 'Autor', '2018-11-25', '22:47:59', 1),
(111, 'Pais', '2018-11-25', '22:47:59', 1),
(112, 'Editorial', '2018-11-25', '22:48:00', 1),
(113, 'Libro', '2018-11-25', '22:48:00', 1),
(114, 'Libro_has_Genero', '2018-11-25', '22:48:00', 1),
(115, 'Libro_has_Genero', '2018-11-25', '22:48:00', 1),
(116, 'Libro_has_Autor', '2018-11-25', '22:48:00', 1),
(117, 'Acceso al Sistema', '2018-11-26', '10:03:29', 1),
(118, 'Observaciones', '2018-11-26', '13:25:39', 1),
(119, 'Libro', '2018-11-26', '19:29:24', 1),
(120, 'Libro_has_Genero', '2018-11-26', '19:29:24', 1),
(121, 'Libro_has_Genero', '2018-11-26', '19:29:24', 1),
(122, 'Libro_has_Autor', '2018-11-26', '19:29:24', 1),
(123, 'Libro', '2018-11-26', '20:17:26', 1),
(124, 'Libro_has_Genero', '2018-11-26', '20:17:26', 1),
(125, 'Libro_has_Genero', '2018-11-26', '20:17:26', 1),
(126, 'Libro_has_Autor', '2018-11-26', '20:17:26', 1),
(127, 'Acceso al Sistema', '2018-11-27', '01:16:17', 1),
(128, 'Acceso al Sistema', '2018-11-27', '13:43:14', 1),
(129, 'DatosContacto', '2018-11-27', '13:51:17', 1),
(130, 'Acceso al Sistema', '2018-11-27', '18:31:06', 1),
(131, 'Discapacidad', '2018-11-27', '19:20:34', 1),
(132, 'Localidad_idLocalidad', '2018-11-27', '19:22:47', 1),
(133, 'FechaNacimiento', '2018-11-27', '19:24:57', 1),
(134, 'DatosPersonales', '2018-11-27', '19:25:07', 1),
(135, 'Domicilio', '2018-11-27', '19:25:17', 1),
(136, 'DatosContacto', '2018-11-27', '19:25:33', 1),
(137, 'Estudios', '2018-11-27', '19:26:29', 1),
(138, 'Tecnologia', '2018-11-27', '19:26:45', 1),
(139, 'Deportes', '2018-11-27', '19:26:55', 1),
(140, 'Idioma', '2018-11-27', '19:27:07', 1),
(141, 'Persona', '2018-11-27', '19:29:00', 1),
(142, 'FechaNacimiento', '2018-11-27', '19:31:43', 1),
(143, 'DatosPersonales', '2018-11-27', '19:34:39', 1),
(144, 'Persona', '2018-11-27', '19:36:22', 1),
(145, 'Persona', '2018-11-27', '19:39:04', 1),
(146, 'DatosPersonales', '2018-11-27', '19:40:12', 1),
(147, 'Domicilio', '2018-11-27', '19:40:39', 1),
(148, 'DatosContacto', '2018-11-27', '19:40:56', 1),
(149, 'Estudios', '2018-11-27', '19:42:04', 1),
(150, 'Estudios', '2018-11-27', '19:43:25', 1),
(151, 'Estudios', '2018-11-27', '19:48:54', 1),
(152, 'Tecnologia', '2018-11-27', '19:50:04', 1),
(153, 'Deportes', '2018-11-27', '19:50:33', 1),
(154, 'Idioma', '2018-11-27', '19:50:51', 1),
(155, 'Discapacidad', '2018-11-27', '19:51:16', 1),
(156, 'Localidad_idLocalidad', '2018-11-27', '19:51:34', 1),
(157, 'Observaciones', '2018-11-27', '19:53:40', 1),
(158, 'Acceso al Sistema', '2018-11-27', '19:55:24', 2),
(159, 'Calificaciones', '2018-11-27', '19:55:54', 2),
(160, 'Calificaciones', '2018-11-27', '19:56:45', 2),
(161, 'Acceso al Sistema', '2018-11-27', '19:57:28', 9),
(162, 'Acceso al Sistema', '2018-11-27', '19:57:45', 10),
(163, 'FechaNacimiento', '2018-11-27', '20:00:25', 10),
(164, 'FechaNacimiento', '2018-11-27', '20:00:38', 10),
(165, 'FechaNacimiento', '2018-11-27', '20:00:52', 10),
(166, 'Acceso al Sistema', '2018-11-27', '20:02:48', 9),
(167, 'Permisos', '2018-11-27', '20:02:58', 9),
(168, 'Permisos', '2018-11-27', '20:02:59', 9),
(169, 'Permisos', '2018-11-27', '20:02:59', 9),
(170, 'Permisos', '2018-11-27', '20:03:00', 9),
(171, 'Permisos', '2018-11-27', '20:03:00', 9),
(172, 'Permisos', '2018-11-27', '20:03:02', 9),
(173, 'Permisos', '2018-11-27', '20:03:03', 9),
(174, 'Permisos', '2018-11-27', '20:03:03', 9),
(175, 'Permisos', '2018-11-27', '20:03:04', 9),
(176, 'Permisos', '2018-11-27', '20:03:04', 9),
(177, 'Acceso al Sistema', '2018-11-27', '20:07:14', 1),
(178, 'FechaNacimiento', '2018-11-27', '22:14:31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoscontacto`
--

CREATE TABLE `datoscontacto` (
  `idDatosContacto` int(11) NOT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `telefono3` varchar(45) DEFAULT NULL,
  `telefono4` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datoscontacto`
--

INSERT INTO `datoscontacto` (`idDatosContacto`, `telefono1`, `telefono2`, `telefono3`, `telefono4`, `email`, `Persona_idPersona`) VALUES
(1, '265715562192', '', '', '', 'foxmulder2018@gmail.com', 2),
(2, '2657562192', '', '', '', '', 3),
(3, '2657562192', '', '', '', '', 4),
(4, '2657562192', '', '', '', '', 5),
(5, '2657562192', '', '', '', '', 6),
(6, '2657562192', '', '', '', '', 7),
(7, '2657562192', '', '', '', '', 8),
(8, '265715562192', '', '', '', '', 9),
(9, '265715562192', '', '', '', '', 11),
(10, '265715562192', '', '', '', '', 12),
(11, '265715562192', '', '', '', '', 14),
(12, '265715562192', '', '', '', '', 16),
(13, '265715562192', '', '', '', '', 18),
(14, '265715562192', '', '', '', '', 19),
(15, '265715562192', '', '', '', '', 21),
(16, '265715562192', '', '', '', 'dexloggica@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `idDatosPersonales` int(11) NOT NULL,
  `EstadoCivil` varchar(45) DEFAULT NULL,
  `CantidadHijos` int(11) DEFAULT NULL,
  `SituacionPadre` varchar(45) DEFAULT NULL,
  `SituacionMadre` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`idDatosPersonales`, `EstadoCivil`, `CantidadHijos`, `SituacionPadre`, `SituacionMadre`, `Persona_idPersona`) VALUES
(1, 'Divorciado', 0, 'Vive', 'Vive', 2),
(2, '--', 0, 'Vive', 'Vive', 3),
(3, 'Divorciado', 0, 'Vive', 'Vive', 4),
(4, 'Casado', 0, 'Vive', 'Vive', 5),
(5, '--', 0, 'Vive', 'Vive', 6),
(6, '--', 0, 'Vive', 'Desconoce', 7),
(7, 'Casado', 0, 'Vive', 'Vive', 8),
(8, NULL, NULL, 'Vive', 'Vive', 9),
(9, NULL, NULL, 'Vive', 'Vive', 11),
(10, NULL, NULL, 'Vive', 'Vive', 12),
(11, NULL, NULL, 'Vive', 'Vive', 14),
(12, NULL, NULL, 'Vive', 'Vive', 16),
(13, NULL, NULL, 'Vive', 'Vive', 18),
(14, NULL, NULL, 'Vive', 'Vive', 19),
(15, NULL, NULL, 'Vive', 'Vive', 21),
(16, '', 0, 'Vive', 'Vive', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `idDeportes` int(11) NOT NULL,
  `PracticaDeportesSiNo` int(11) DEFAULT NULL,
  `DeporteDescripcion` varchar(200) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`idDeportes`, `PracticaDeportesSiNo`, `DeporteDescripcion`, `Persona_idPersona`) VALUES
(1, 1, 'Wing Chun', 2),
(2, 0, '', 3),
(3, 0, '', 4),
(4, 0, '', 5),
(5, 0, '', 6),
(6, 0, '', 7),
(7, 0, '', 8),
(8, 1, '', 9),
(9, 1, '', 11),
(10, 1, '', 12),
(11, 1, '', 14),
(12, 0, '', 16),
(13, 0, '', 18),
(14, 1, '', 19),
(15, 1, '', 21),
(16, 1, 'Wing Chun', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidad`
--

CREATE TABLE `discapacidad` (
  `idDiscapacidad` int(11) NOT NULL,
  `DiscapacidadDesc` varchar(200) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discapacidad`
--

INSERT INTO `discapacidad` (`idDiscapacidad`, `DiscapacidadDesc`, `Persona_idPersona`) VALUES
(1, 'Deficit de atenciÃ³n por hiperactividad', 2),
(2, '-', 3),
(3, '-', 4),
(4, '-', 5),
(5, '-', 6),
(6, '-', 7),
(7, '-', 8),
(8, '-', 9),
(9, '-', 11),
(10, '-', 12),
(11, '-', 14),
(12, 'TDA', 16),
(13, '-', 18),
(14, '-', 19),
(15, '-', 21),
(16, 'TDAH', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `idDomicilio` int(11) NOT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Piso` varchar(45) DEFAULT NULL,
  `Departamento` varchar(45) DEFAULT NULL,
  `Unidad` varchar(45) DEFAULT NULL,
  `Barrio` varchar(45) DEFAULT NULL,
  `TipodeVivienda` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`idDomicilio`, `Calle`, `Numero`, `Piso`, `Departamento`, `Unidad`, `Barrio`, `TipodeVivienda`, `Persona_idPersona`) VALUES
(1, 'incierta', 200, '', '', '', '', 'Pension/Residencia', 2),
(2, 'falsa', 101, '', '', '', '', '--', 3),
(3, 'falsa', 102, '', '', '', '', '--', 4),
(4, 'falsa', 103, '', '', '', '', '--', 5),
(5, 'falsa', 104, '', '', '', '', '--', 6),
(6, 'falsa', 105, '', '', '', '', '--', 7),
(7, 'falsa', 106, '', '', '', '', '--', 8),
(8, 'incierta', 200, '', '', '', '', 'Casa', 9),
(9, 'incierta', 200, '', '', '', '', 'Casa', 11),
(10, 'incierta', 201, '', '', '', '', 'Departamento', 12),
(11, 'dementira', 202, '', '', '', '', 'Casa', 14),
(12, 'dementira', 201, '', '', '', '', 'Pension/Residencia', 16),
(13, 'dementira', 204, '', '', '', '', 'Departamento', 18),
(14, 'dementira', 202, '', '', '', '', 'Casa', 19),
(15, 'dementira', 203, '', '', '', '', 'Casa', 21),
(16, 'Betbeder', 744, '', '', '', '', 'Casa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `EditorialDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `EditorialDesc`) VALUES
(1, 'Punto De Lectura'),
(2, 'Ediciones B, S.a.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `idEstudios` int(11) NOT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
  `Institucion` varchar(45) DEFAULT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`idEstudios`, `Nivel`, `Institucion`, `Titulo`, `Fecha`, `Persona_idPersona`) VALUES
(1, 'Posgrado', 'University Helsinki', 'Magister en FilosofÃ­a y Letras', '2015-12-14', 2),
(2, 'Posgrado', '', '-', '0000-00-00', 3),
(3, 'Universitario', '', '-', '0000-00-00', 4),
(4, 'Superior', '', '-', '0000-00-00', 5),
(5, 'Posgrado', '', '-', '0000-00-00', 6),
(6, 'Universitario', '', '-', '0000-00-00', 7),
(7, 'Secundario', '', '-', '0000-00-00', 8),
(8, 'Universitario', 'UNViMe', 'Programador Universitario de Sistemas', '2018-11-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechanacimiento`
--

CREATE TABLE `fechanacimiento` (
  `idFechaNacimiento` int(11) NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fechanacimiento`
--

INSERT INTO `fechanacimiento` (`idFechaNacimiento`, `FechaNacimiento`, `Persona_idPersona`) VALUES
(1, '1997-04-02', 2),
(2, '1976-12-31', 3),
(3, '1985-03-14', 4),
(4, '0000-00-00', 5),
(5, '1987-12-31', 6),
(6, '1975-12-31', 7),
(7, '1980-03-14', 8),
(8, '2010-04-17', 9),
(9, '2009-04-16', 11),
(10, '1910-12-31', 12),
(11, '1910-12-31', 14),
(12, '1910-12-31', 16),
(13, '1910-12-31', 18),
(14, '1925-12-31', 19),
(15, '1910-12-31', 21),
(16, '1988-03-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichasociobiblioteca`
--

CREATE TABLE `fichasociobiblioteca` (
  `idFichaSocioBiblioteca` int(11) NOT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `TipoSocio` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fichasociobiblioteca`
--

INSERT INTO `fichasociobiblioteca` (`idFichaSocioBiblioteca`, `FechaInicio`, `FechaFin`, `TipoSocio`, `Persona_idPersona`) VALUES
(8, '2018-11-26', '2019-11-26', 'Administrador', 1),
(19, '2018-11-26', '2019-11-26', 'docente', 2),
(20, '2018-11-27', '2019-11-27', 'docente', 5),
(21, '2018-11-27', '2019-11-27', 'docente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichatutoralumno`
--

CREATE TABLE `fichatutoralumno` (
  `idFichaTutorAlumno` int(11) NOT NULL,
  `idTutor` int(11) DEFAULT NULL,
  `idAlumno` int(11) DEFAULT NULL,
  `RelacionDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fichatutoralumno`
--

INSERT INTO `fichatutoralumno` (`idFichaTutorAlumno`, `idTutor`, `idAlumno`, `RelacionDesc`) VALUES
(1, 10, 9, 'hijo'),
(2, 10, 11, 'hija'),
(3, 13, 12, 'hija'),
(4, 15, 14, 'hijo'),
(5, 17, 16, 'hijo'),
(6, 17, 18, 'hija'),
(7, 20, 19, 'hermana'),
(8, 22, 21, 'hijo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `GeneroDesc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `GeneroDesc`) VALUES
(1, 'FicciÃ³n'),
(2, ' Alta FantasÃ­a'),
(3, 'Novela De Suspenso'),
(4, 'Thriller PsicolÃ³gico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioactividaddocente`
--

CREATE TABLE `horarioactividaddocente` (
  `idHorarioActividadDocente` int(11) NOT NULL,
  `DiaSemana` varchar(45) DEFAULT NULL,
  `HorarioInicio` time DEFAULT NULL,
  `HorarioFin` time DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioactividadnivel`
--

CREATE TABLE `horarioactividadnivel` (
  `idHorarioActividadNivel` int(11) NOT NULL,
  `DiaSemana` varchar(45) DEFAULT NULL,
  `HorarioInicio` time DEFAULT NULL,
  `HorarioFin` time DEFAULT NULL,
  `Nivel_idNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `idIdioma` int(11) NOT NULL,
  `Ingles` varchar(45) DEFAULT NULL,
  `Aleman` varchar(45) DEFAULT NULL,
  `Frances` varchar(45) DEFAULT NULL,
  `Italiano` varchar(45) DEFAULT NULL,
  `Portugues` varchar(45) DEFAULT NULL,
  `Chino` varchar(45) DEFAULT NULL,
  `Otros` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`idIdioma`, `Ingles`, `Aleman`, `Frances`, `Italiano`, `Portugues`, `Chino`, `Otros`, `Persona_idPersona`) VALUES
(1, 'Basico', '--', '--', '--', '--', '--', '', 1),
(2, 'Muy Bueno', '--', '--', '--', '--', 'Muy Bueno', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `InscripcionFecha` date DEFAULT NULL,
  `Nivel_idNivel` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idInscripcion`, `InscripcionFecha`, `Nivel_idNivel`, `Persona_idPersona`) VALUES
(1, '2018-10-29', 1, 9),
(2, '2018-10-29', 2, 11),
(3, '2018-10-29', 1, 12),
(4, '2018-10-29', 2, 14),
(5, '2018-10-29', 3, 16),
(6, '2018-10-29', 4, 18),
(7, '2018-10-29', 3, 19),
(8, '2018-10-29', 4, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Paginas` int(11) DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `ISBN` varchar(45) DEFAULT NULL,
  `LinkImagen` varchar(200) DEFAULT NULL,
  `LinkDescarga` varchar(200) DEFAULT NULL,
  `Pais_idPais` int(11) NOT NULL,
  `Editorial_idEditorial` int(11) NOT NULL,
  `CantidadVecesPedidas` int(11) DEFAULT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `Titulo`, `Numero`, `Paginas`, `FechaPublicacion`, `ISBN`, `LinkImagen`, `LinkDescarga`, `Pais_idPais`, `Editorial_idEditorial`, `CantidadVecesPedidas`, `Estado`) VALUES
(3, 'Los dÃ­as del venado', 1, 336, '2012-12-01', '9789875781870', 'https://www.cuspide.com/content/cover/large/9789875781870_1.jpg?id_com=1113', 'https://play.google.com/store/books/details/Liliana_Bodoc_Los_dÃ­as_del_venado_La_Saga_de_los_C?id=qP33dngUWjoC&hl=es-419', 1, 1, 0, 1),
(4, 'El Piscoanalista', 1, 574, '2002-02-13', ' 9506494924', 'https://books.google.com/books/content/images/frontcover/iqI4AwAAQBAJ?fife=w200-h300', 'https://play.google.com/store/books/details/John_Katzenbach_El_Psicoanalista?id=iqI4AwAAQBAJ&hl=es-419', 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_has_autor`
--

CREATE TABLE `libro_has_autor` (
  `Libro_idLibro` int(11) NOT NULL,
  `Autor_idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_has_autor`
--

INSERT INTO `libro_has_autor` (`Libro_idLibro`, `Autor_idAutor`) VALUES
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_has_genero`
--

CREATE TABLE `libro_has_genero` (
  `Libro_idLibro` int(11) NOT NULL,
  `Genero_idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_has_genero`
--

INSERT INTO `libro_has_genero` (`Libro_idLibro`, `Genero_idGenero`) VALUES
(3, 1),
(3, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `idLicencia` int(11) NOT NULL,
  `LicenciaDesc` varchar(45) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idLocalidad` int(11) NOT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  `CodigoPostal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `Ciudad`, `Provincia`, `Pais`, `CodigoPostal`) VALUES
(1, 'villa mercedes', 'san luis', 'argentina', 5730);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `GradoCurso` varchar(45) DEFAULT NULL,
  `Division` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `GradoCurso`, `Division`) VALUES
(1, '5to', 'A'),
(2, '6to', 'A'),
(3, '1ro', 'I'),
(4, '2do', 'II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_has_asignatura`
--

CREATE TABLE `nivel_has_asignatura` (
  `Nivel_idNivel` int(11) NOT NULL,
  `Asignatura_idAsignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_has_asignatura`
--

INSERT INTO `nivel_has_asignatura` (`Nivel_idNivel`, `Asignatura_idAsignatura`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 4),
(3, 5),
(3, 7),
(3, 9),
(4, 6),
(4, 8),
(4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `idObservaciones` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(10) DEFAULT NULL,
  `ObservacionDesc` varchar(200) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`idObservaciones`, `Fecha`, `Hora`, `ObservacionDesc`, `Persona_idPersona`) VALUES
(1, '2018-11-27', '19:53:40', 'No cumple con los tiempos administrativos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `PaisDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `PaisDesc`) VALUES
(1, 'Argentina'),
(2, 'EspaÃ±a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermisos` int(11) NOT NULL,
  `PermisoEditarSusDatosPersonales` int(11) DEFAULT NULL,
  `PermisoEditarDatosPersonalesOtros` int(11) DEFAULT NULL,
  `PermisoEditarObservacionesOtros` int(11) DEFAULT NULL,
  `PermisoVerObservacionesOtros` int(11) DEFAULT NULL,
  `PermisoEditarCalificacionesSusAlumnos` int(11) DEFAULT NULL,
  `PermisoEditarDatosPersonalesAlumnoaCargo` int(11) DEFAULT NULL,
  `PermisoVerCalificacionesAlumnoaCargo` int(11) DEFAULT NULL,
  `PermisoVerSusCalificaciones` int(11) DEFAULT NULL,
  `PermisoGestionarEscuela` int(11) DEFAULT NULL,
  `PermisoInscribirAlumno` int(11) DEFAULT NULL,
  `PermisoInscribirDocente` int(11) DEFAULT NULL,
  `PermisoGestionarBiblioteca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermisos`, `PermisoEditarSusDatosPersonales`, `PermisoEditarDatosPersonalesOtros`, `PermisoEditarObservacionesOtros`, `PermisoVerObservacionesOtros`, `PermisoEditarCalificacionesSusAlumnos`, `PermisoEditarDatosPersonalesAlumnoaCargo`, `PermisoVerCalificacionesAlumnoaCargo`, `PermisoVerSusCalificaciones`, `PermisoGestionarEscuela`, `PermisoInscribirAlumno`, `PermisoInscribirDocente`, `PermisoGestionarBiblioteca`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(11, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Sexo` varchar(15) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `cuil` varchar(15) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Localidad_idLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `Apellido`, `Sexo`, `dni`, `cuil`, `Usuario_idUsuario`, `Localidad_idLocalidad`) VALUES
(1, 'dex ', 'loggica', 'Masculino', 33702649, '20337026495', 1, 1),
(2, 'Ayelen', 'Lucero', 'Femenino', 33000000, '20330000000', 2, 1),
(3, ' MarÃ­a Guadalupe', 'Tejada MuÃ±oz', 'Femenino', 33000001, '20330000001', 3, 1),
(4, 'Maximo Orlando', 'Escudero Portalay', 'Masculino', 33000002, '20330000002', 4, 1),
(5, 'Daira NoemÃ­', 'Urquiza', 'Femenino', 33000003, '20330000003', 5, 1),
(6, 'Alfonzo Rodrigo Javier', 'Merlo', 'Masculino', 33000004, '20330000004', 6, 1),
(7, 'Thiago Emanuel', 'Barroso Mendez', 'Masculino', 33000005, '20330000005', 7, 1),
(8, 'Carlos AgustÃ­n', 'Palacio', 'Masculino', 33000006, '20330000006', 8, 1),
(9, 'Juan Ignacio', 'Barroso', 'Masculino', 20000000, '20200000000', 9, 1),
(10, 'Ana Nazarena', 'Aguilera', 'Femenino', 40000000, '2040000000', 10, 1),
(11, 'Fatima SofÃ­a', 'Pettiti', 'Femenino', 20000003, '20200000003', 11, 1),
(12, 'Delfina', 'Olivari Machado', 'Femenino', 20000001, '20200000001', 12, 1),
(13, 'Lourdes Victoria', 'Arce', 'Femenino', 40000001, '2040000001', 13, 1),
(14, 'Fabian Alejandro', 'Donaire', 'Masculino', 20000002, '20200000002', 14, 1),
(15, 'Abril', 'Caporusso', 'Femenino', 40000002, '2040000002', 15, 1),
(16, ' Leonel ElÃ­an', 'Echegaray', 'Masculino', 20000004, '20200000004', 16, 1),
(17, 'Candela Agostina', 'Chirino', 'Femenino', 40000003, '2040000003', 17, 1),
(18, 'Milagros Guadalupe', 'Romero', 'Femenino', 20000007, '20200000007', 18, 1),
(19, 'Martina Victoria', 'Sombra', 'Femenino', 20000005, '20200000005', 19, 1),
(20, 'Bianca Lourdes', 'Sombra', 'Femenino', 40000004, '2040000004', 20, 1),
(21, 'Bruno', 'Espinillo', 'Masculino', 20000006, '20200000006', 21, 1),
(22, 'Agostina', 'Soria', 'Femenino', 40000005, '2040000005', 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_tipobeca`
--

CREATE TABLE `persona_has_tipobeca` (
  `Persona_idPersona` int(11) NOT NULL,
  `TipoBeca_idTipoBeca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `FechaPrestamo` date DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `FechaDevolucion` date DEFAULT NULL,
  `idFichaSocioBiblioteca` int(11) NOT NULL,
  `idDocenteResponsable` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idPrestamo`, `FechaPrestamo`, `FechaEntrega`, `FechaDevolucion`, `idFichaSocioBiblioteca`, `idDocenteResponsable`, `idLibro`) VALUES
(24, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(25, '2018-11-27', '2018-11-27', '0000-00-00', 20, 1, 3),
(26, '2018-11-27', '2018-11-27', '0000-00-00', 20, 1, 4),
(27, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 4),
(28, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(29, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(30, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(31, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 4),
(32, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(33, '2018-11-27', '2018-11-27', '0000-00-00', 19, 1, 3),
(34, '2018-11-27', '0000-00-00', '0000-00-00', 19, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperaciones`
--

CREATE TABLE `recuperaciones` (
  `idRecuperaciones` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `RecuperacionesDesc` varchar(45) DEFAULT NULL,
  `idTipoRecuperacion` int(11) NOT NULL,
  `idCalificaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologia`
--

CREATE TABLE `tecnologia` (
  `idTecnologia` int(11) NOT NULL,
  `DisponePc` int(11) DEFAULT NULL,
  `AccesoInternet` int(11) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tecnologia`
--

INSERT INTO `tecnologia` (`idTecnologia`, `DisponePc`, `AccesoInternet`, `Persona_idPersona`) VALUES
(1, 1, 0, 2),
(2, 1, 1, 3),
(3, 1, 1, 4),
(4, 1, 1, 5),
(5, 1, 0, 6),
(6, 0, 0, 7),
(7, 1, 1, 8),
(8, 1, 1, 9),
(9, 1, 1, 11),
(10, 1, 1, 12),
(11, 1, 1, 14),
(12, 0, 0, 16),
(13, 1, 1, 18),
(14, 1, 1, 19),
(15, 1, 1, 21),
(16, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobeca`
--

CREATE TABLE `tipobeca` (
  `idTipoBeca` int(11) NOT NULL,
  `BecaDesc` varchar(45) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoperfil`
--

CREATE TABLE `tipoperfil` (
  `idTipoPerfil` int(11) NOT NULL,
  `PerfilDesc` varchar(45) DEFAULT NULL,
  `Permisos_idPermisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoperfil`
--

INSERT INTO `tipoperfil` (`idTipoPerfil`, `PerfilDesc`, `Permisos_idPermisos`) VALUES
(1, 'Administrador', 1),
(2, 'director', 2),
(3, 'vicedirector', 3),
(4, 'regente', 4),
(5, 'preceptor', 5),
(6, 'secretario', 6),
(7, 'docente cambio de funciones', 7),
(8, 'docente', 8),
(9, 'bibliotecario', 9),
(10, 'tutor', 10),
(11, 'alumno', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporecuperacion`
--

CREATE TABLE `tiporecuperacion` (
  `idTipoRecuperacion` int(11) NOT NULL,
  `TipoRecuperacionDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `TipoPerfil_idTipoPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `username`, `password`, `TipoPerfil_idTipoPerfil`) VALUES
(1, 'admin', 'admin', 1),
(2, '33000000', '33000000', 8),
(3, '33000001', '33000001', 8),
(4, '33000002', '33000002', 8),
(5, '33000003', '33000003', 8),
(6, '33000004', '33000004', 8),
(7, '33000005', '33000005', 8),
(8, '33000006', '33000006', 5),
(9, '20000000', '20000000', 11),
(10, '40000000', '40000000', 10),
(11, '20000003', '20000003', 11),
(12, '20000001', '20000001', 11),
(13, '40000001', '40000001', 10),
(14, '20000002', '20000002', 11),
(15, '40000002', '40000002', 10),
(16, '20000004', '20000004', 11),
(17, '40000003', '40000003', 10),
(18, '20000007', '20000007', 11),
(19, '20000005', '20000005', 11),
(20, '40000004', '40000004', 10),
(21, '20000006', '20000006', 11),
(22, '40000005', '40000005', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAsignatura`),
  ADD KEY `fk_Asignatura_Cargo1_idx` (`Cargo_idCargo`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idCalificaciones`),
  ADD KEY `fk_Calificaciones_Persona1_idx` (`idAlumno`),
  ADD KEY `fk_Calificaciones_Cargo1_idx` (`idDocenteResponsable`),
  ADD KEY `fk_Calificaciones_Asignatura1_idx` (`idAsignatura`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`),
  ADD KEY `fk_Cargo_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `cargo_has_horarioactividad`
--
ALTER TABLE `cargo_has_horarioactividad`
  ADD PRIMARY KEY (`Cargo_idCargo`,`HorarioActividad_idHorarioActividad`),
  ADD KEY `fk_Cargo_has_HorarioActividad_HorarioActividad1_idx` (`HorarioActividad_idHorarioActividad`),
  ADD KEY `fk_Cargo_has_HorarioActividad_Cargo1_idx` (`Cargo_idCargo`);

--
-- Indices de la tabla `cargo_has_nivel`
--
ALTER TABLE `cargo_has_nivel`
  ADD PRIMARY KEY (`Cargo_idCargo`,`Nivel_idNivel`),
  ADD KEY `fk_Cargo_has_Nivel1_Nivel1_idx` (`Nivel_idNivel`),
  ADD KEY `fk_Cargo_has_Nivel1_Cargo1_idx` (`Cargo_idCargo`);

--
-- Indices de la tabla `ceduladocente`
--
ALTER TABLE `ceduladocente`
  ADD PRIMARY KEY (`idCedulaDocente`),
  ADD KEY `fk_CedulaDocente_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`idControl`);

--
-- Indices de la tabla `datoscontacto`
--
ALTER TABLE `datoscontacto`
  ADD PRIMARY KEY (`idDatosContacto`),
  ADD KEY `fk_DatosContacto_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`idDatosPersonales`),
  ADD KEY `fk_DatosPersonales_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`idDeportes`),
  ADD KEY `fk_DeportesdePersona_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  ADD PRIMARY KEY (`idDiscapacidad`),
  ADD KEY `fk_DiscapacidaddePersona_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`idDomicilio`),
  ADD KEY `fk_Domicilio_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`idEstudios`),
  ADD KEY `fk_Estudios_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `fechanacimiento`
--
ALTER TABLE `fechanacimiento`
  ADD PRIMARY KEY (`idFechaNacimiento`),
  ADD KEY `fk_FechaNacimientoPersona_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `fichasociobiblioteca`
--
ALTER TABLE `fichasociobiblioteca`
  ADD PRIMARY KEY (`idFichaSocioBiblioteca`),
  ADD KEY `fk_FichaSocioBiblioteca_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `fichatutoralumno`
--
ALTER TABLE `fichatutoralumno`
  ADD PRIMARY KEY (`idFichaTutorAlumno`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `horarioactividaddocente`
--
ALTER TABLE `horarioactividaddocente`
  ADD PRIMARY KEY (`idHorarioActividadDocente`),
  ADD KEY `fk_HorarioActividad_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `horarioactividadnivel`
--
ALTER TABLE `horarioactividadnivel`
  ADD PRIMARY KEY (`idHorarioActividadNivel`),
  ADD KEY `fk_HorarioActividadNivel_Nivel1_idx` (`Nivel_idNivel`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`idIdioma`),
  ADD KEY `fk_IdiomadePersona_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `fk_Inscripcion_Persona1_idx` (`Persona_idPersona`),
  ADD KEY `fk_Inscripcion_Nivel1_idx` (`Nivel_idNivel`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `fk_Libro_Pais1_idx` (`Pais_idPais`),
  ADD KEY `fk_Libro_Editorial1_idx` (`Editorial_idEditorial`);

--
-- Indices de la tabla `libro_has_autor`
--
ALTER TABLE `libro_has_autor`
  ADD PRIMARY KEY (`Libro_idLibro`,`Autor_idAutor`),
  ADD KEY `fk_Libro_has_Autor_Autor1_idx` (`Autor_idAutor`),
  ADD KEY `fk_Libro_has_Autor_Libro1_idx` (`Libro_idLibro`);

--
-- Indices de la tabla `libro_has_genero`
--
ALTER TABLE `libro_has_genero`
  ADD PRIMARY KEY (`Libro_idLibro`,`Genero_idGenero`),
  ADD KEY `fk_Libro_has_Genero_Genero1_idx` (`Genero_idGenero`),
  ADD KEY `fk_Libro_has_Genero_Libro1_idx` (`Libro_idLibro`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`idLicencia`),
  ADD KEY `fk_Licencia_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `nivel_has_asignatura`
--
ALTER TABLE `nivel_has_asignatura`
  ADD PRIMARY KEY (`Nivel_idNivel`,`Asignatura_idAsignatura`),
  ADD KEY `fk_Nivel_has_Asignatura_Asignatura1_idx` (`Asignatura_idAsignatura`),
  ADD KEY `fk_Nivel_has_Asignatura_Nivel1_idx` (`Nivel_idNivel`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`idObservaciones`),
  ADD KEY `fk_Observaciones_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermisos`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_Persona_Localidad1_idx` (`Localidad_idLocalidad`),
  ADD KEY `fk_Persona_Usuario1_idx` (`Usuario_idUsuario`);

--
-- Indices de la tabla `persona_has_tipobeca`
--
ALTER TABLE `persona_has_tipobeca`
  ADD PRIMARY KEY (`Persona_idPersona`,`TipoBeca_idTipoBeca`),
  ADD KEY `fk_Persona_has_TipoBeca_TipoBeca1_idx` (`TipoBeca_idTipoBeca`),
  ADD KEY `fk_Persona_has_TipoBeca_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_Prestamo_Cargo1_idx` (`idDocenteResponsable`),
  ADD KEY `fk_Prestamo_FichaSocioBiblioteca1_idx` (`idFichaSocioBiblioteca`),
  ADD KEY `fk_Prestamo_Libro1_idx` (`idLibro`);

--
-- Indices de la tabla `recuperaciones`
--
ALTER TABLE `recuperaciones`
  ADD PRIMARY KEY (`idRecuperaciones`),
  ADD KEY `fk_Recuperaciones_Calificaciones1_idx` (`idCalificaciones`),
  ADD KEY `fk_Recuperaciones_TipoRecuperacion1_idx` (`idTipoRecuperacion`);

--
-- Indices de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD PRIMARY KEY (`idTecnologia`),
  ADD KEY `fk_TecnologiadePersona_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `tipobeca`
--
ALTER TABLE `tipobeca`
  ADD PRIMARY KEY (`idTipoBeca`);

--
-- Indices de la tabla `tipoperfil`
--
ALTER TABLE `tipoperfil`
  ADD PRIMARY KEY (`idTipoPerfil`),
  ADD KEY `fk_TipoPerfil_Permisos1_idx` (`Permisos_idPermisos`);

--
-- Indices de la tabla `tiporecuperacion`
--
ALTER TABLE `tiporecuperacion`
  ADD PRIMARY KEY (`idTipoRecuperacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_TipoPerfil1_idx` (`TipoPerfil_idTipoPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idCalificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cargo_has_nivel`
--
ALTER TABLE `cargo_has_nivel`
  MODIFY `Cargo_idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ceduladocente`
--
ALTER TABLE `ceduladocente`
  MODIFY `idCedulaDocente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `idControl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT de la tabla `datoscontacto`
--
ALTER TABLE `datoscontacto`
  MODIFY `idDatosContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `idDatosPersonales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `idDeportes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  MODIFY `idDiscapacidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `idDomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `idEstudios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fechanacimiento`
--
ALTER TABLE `fechanacimiento`
  MODIFY `idFechaNacimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `fichasociobiblioteca`
--
ALTER TABLE `fichasociobiblioteca`
  MODIFY `idFichaSocioBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `fichatutoralumno`
--
ALTER TABLE `fichatutoralumno`
  MODIFY `idFichaTutorAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horarioactividaddocente`
--
ALTER TABLE `horarioactividaddocente`
  MODIFY `idHorarioActividadDocente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarioactividadnivel`
--
ALTER TABLE `horarioactividadnivel`
  MODIFY `idHorarioActividadNivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `idIdioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `idLicencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nivel_has_asignatura`
--
ALTER TABLE `nivel_has_asignatura`
  MODIFY `Nivel_idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `idObservaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `recuperaciones`
--
ALTER TABLE `recuperaciones`
  MODIFY `idRecuperaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  MODIFY `idTecnologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipobeca`
--
ALTER TABLE `tipobeca`
  MODIFY `idTipoBeca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiporecuperacion`
--
ALTER TABLE `tiporecuperacion`
  MODIFY `idTipoRecuperacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_Asignatura_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_Calificaciones_Asignatura1` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Calificaciones_Cargo1` FOREIGN KEY (`idDocenteResponsable`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Calificaciones_Persona1` FOREIGN KEY (`idAlumno`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_Cargo_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo_has_horarioactividad`
--
ALTER TABLE `cargo_has_horarioactividad`
  ADD CONSTRAINT `fk_Cargo_has_HorarioActividad_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cargo_has_HorarioActividad_HorarioActividad1` FOREIGN KEY (`HorarioActividad_idHorarioActividad`) REFERENCES `horarioactividaddocente` (`idHorarioActividadDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo_has_nivel`
--
ALTER TABLE `cargo_has_nivel`
  ADD CONSTRAINT `fk_Cargo_has_Nivel1_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cargo_has_Nivel1_Nivel1` FOREIGN KEY (`Nivel_idNivel`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ceduladocente`
--
ALTER TABLE `ceduladocente`
  ADD CONSTRAINT `fk_CedulaDocente_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datoscontacto`
--
ALTER TABLE `datoscontacto`
  ADD CONSTRAINT `fk_DatosContacto_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD CONSTRAINT `fk_DatosPersonales_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD CONSTRAINT `fk_DeportesdePersona_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  ADD CONSTRAINT `fk_DiscapacidaddePersona_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_Domicilio_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `fk_Estudios_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fechanacimiento`
--
ALTER TABLE `fechanacimiento`
  ADD CONSTRAINT `fk_FechaNacimientoPersona_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fichasociobiblioteca`
--
ALTER TABLE `fichasociobiblioteca`
  ADD CONSTRAINT `fk_FichaSocioBiblioteca_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horarioactividaddocente`
--
ALTER TABLE `horarioactividaddocente`
  ADD CONSTRAINT `fk_HorarioActividad_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horarioactividadnivel`
--
ALTER TABLE `horarioactividadnivel`
  ADD CONSTRAINT `fk_HorarioActividadNivel_Nivel1` FOREIGN KEY (`Nivel_idNivel`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD CONSTRAINT `fk_IdiomadePersona_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_Inscripcion_Nivel1` FOREIGN KEY (`Nivel_idNivel`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Inscripcion_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_Libro_Editorial1` FOREIGN KEY (`Editorial_idEditorial`) REFERENCES `editorial` (`idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Libro_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_has_autor`
--
ALTER TABLE `libro_has_autor`
  ADD CONSTRAINT `fk_Libro_has_Autor_Autor1` FOREIGN KEY (`Autor_idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Libro_has_Autor_Libro1` FOREIGN KEY (`Libro_idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_has_genero`
--
ALTER TABLE `libro_has_genero`
  ADD CONSTRAINT `fk_Libro_has_Genero_Genero1` FOREIGN KEY (`Genero_idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Libro_has_Genero_Libro1` FOREIGN KEY (`Libro_idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD CONSTRAINT `fk_Licencia_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nivel_has_asignatura`
--
ALTER TABLE `nivel_has_asignatura`
  ADD CONSTRAINT `fk_Nivel_has_Asignatura_Asignatura1` FOREIGN KEY (`Asignatura_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nivel_has_Asignatura_Nivel1` FOREIGN KEY (`Nivel_idNivel`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `fk_Observaciones_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Localidad1` FOREIGN KEY (`Localidad_idLocalidad`) REFERENCES `localidad` (`idLocalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_tipobeca`
--
ALTER TABLE `persona_has_tipobeca`
  ADD CONSTRAINT `fk_Persona_has_TipoBeca_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_has_TipoBeca_TipoBeca1` FOREIGN KEY (`TipoBeca_idTipoBeca`) REFERENCES `tipobeca` (`idTipoBeca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_Prestamo_Cargo1` FOREIGN KEY (`idDocenteResponsable`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamo_FichaSocioBiblioteca1` FOREIGN KEY (`idFichaSocioBiblioteca`) REFERENCES `fichasociobiblioteca` (`idFichaSocioBiblioteca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamo_Libro1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recuperaciones`
--
ALTER TABLE `recuperaciones`
  ADD CONSTRAINT `fk_Recuperaciones_Calificaciones1` FOREIGN KEY (`idCalificaciones`) REFERENCES `calificaciones` (`idCalificaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recuperaciones_TipoRecuperacion1` FOREIGN KEY (`idTipoRecuperacion`) REFERENCES `tiporecuperacion` (`idTipoRecuperacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD CONSTRAINT `fk_TecnologiadePersona_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipoperfil`
--
ALTER TABLE `tipoperfil`
  ADD CONSTRAINT `fk_TipoPerfil_Permisos1` FOREIGN KEY (`Permisos_idPermisos`) REFERENCES `permisos` (`idPermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_TipoPerfil1` FOREIGN KEY (`TipoPerfil_idTipoPerfil`) REFERENCES `tipoperfil` (`idTipoPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
