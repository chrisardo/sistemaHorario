-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-07-2023 a las 23:09:22
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemahorario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_academica`
--

DROP TABLE IF EXISTS `carga_academica`;
CREATE TABLE IF NOT EXISTS `carga_academica` (
  `id_carga` int NOT NULL AUTO_INCREMENT,
  `id_docente` int NOT NULL,
  `id_curso` int NOT NULL,
  `id_ciclo` int NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_semestre` int NOT NULL,
  PRIMARY KEY (`id_carga`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `carga_academica`
--

INSERT INTO `carga_academica` (`id_carga`, `id_docente`, `id_curso`, `id_ciclo`, `fecha_registro`, `id_semestre`) VALUES
(19, 1, 9, 2, '2023-07-27', 2),
(18, 1, 10, 8, '2023-07-27', 2),
(17, 2, 8, 6, '2023-07-27', 1),
(16, 4, 8, 6, '2023-07-27', 1),
(15, 2, 9, 2, '2023-07-27', 2),
(14, 5, 8, 6, '2023-07-27', 1),
(13, 1, 7, 1, '2023-07-27', 1),
(20, 1, 8, 6, '2023-07-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
CREATE TABLE IF NOT EXISTS `ciclo` (
  `id_ciclo` int NOT NULL AUTO_INCREMENT,
  `nivel_ciclo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_semestre` int NOT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`id_ciclo`, `nivel_ciclo`, `id_semestre`) VALUES
(1, '1er ciclo', 1),
(2, '2do ciclo', 1),
(3, '3er ciclo', 3),
(4, '4to ciclo', 3),
(5, '5to ciclo', 2),
(6, '6to ciclo', 1),
(7, '7mo ciclo', 1),
(8, '8vo ciclo', 2),
(9, '9no ciclo', 3),
(10, '10mo ciclo', 3),
(11, '11ciclo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `codigo_curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `credit_curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_ciclo` int NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `codigo_curso`, `credit_curso`, `id_ciclo`) VALUES
(11, 'Inteligencia de negocios', '001', '04', 9),
(10, 'Marketing digital', '004', '04', 8),
(9, 'Lenguaje de programacion', '003', '02', 2),
(8, 'Inteligencia artificial', '002', '03', 6),
(7, 'Algebra Lineal', '001', '04', 1),
(12, 'Electronica', '007', '04', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int NOT NULL AUTO_INCREMENT,
  `dni_docente` int NOT NULL,
  `Nombre_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `apellido_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `celular_docente` int NOT NULL,
  `correo_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `grado_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `categoria_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `condicion_docente` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `dedicacion_docente` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `autoridad` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `dni_docente`, `Nombre_docente`, `apellido_docente`, `celular_docente`, `correo_docente`, `grado_docente`, `categoria_docente`, `condicion_docente`, `dedicacion_docente`, `autoridad`, `fecha_nacimiento`) VALUES
(1, 12345678, 'ing Palacios', 'saasd', 987654321, 'a@', 'Maestria', 'Principal', 'Nombrado', 'TiempoCompleto', 'si', '2023-07-17'),
(2, 76543218, 'b', 'bb', 987654321, 'c@', 'Doctorado', 'Asociado', 'Contratado', 'Parcial', 'si', '2023-07-17'),
(3, 12345678, 'Angel', 'Lopez', 987654321, 'd@', 'Bachiller', 'Auxiliar', 'Contratado', 'Exclusiva', 'no', '2023-07-17'),
(4, 76543218, 'Ing. Ronald', 'Melchor', 987654321, 'r@', 'Maestria', 'Principal', 'Nombrado', 'TiempoCompleto', 'si', '2023-07-21'),
(5, 78654321, 'ing. Carlos', 'Gonzales', 912345678, 'g@', 'Doctorado', 'Principal', 'Nombrado', 'TiempoCompleto', 'si', '2023-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_academico`
--

DROP TABLE IF EXISTS `horario_academico`;
CREATE TABLE IF NOT EXISTS `horario_academico` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `dia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_local` int NOT NULL,
  `id_semestre` int NOT NULL,
  `id_carga` int NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `horario_academico`
--

INSERT INTO `horario_academico` (`id_horario`, `dia`, `hora`, `id_local`, `id_semestre`, `id_carga`) VALUES
(1, 'Lunes', '7:00-8:00', 1, 1, 16),
(2, 'Martes', '8:00-9:00', 2, 2, 15),
(3, 'Miercoles', '9:00-10:00', 3, 3, 14),
(4, 'Jueves', '8:00-9:00\n', 3, 1, 13),
(5, 'Viernes', '10:00-11:00', 4, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

DROP TABLE IF EXISTS `locales`;
CREATE TABLE IF NOT EXISTS `locales` (
  `id_local` int NOT NULL AUTO_INCREMENT,
  `nombre_local` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id_local`, `nombre_local`) VALUES
(1, 'Aula1'),
(2, 'Aula 2'),
(3, 'Aula 3'),
(4, 'Aula 4'),
(5, 'Aula 5'),
(6, 'Aula 6'),
(7, 'Aula 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

DROP TABLE IF EXISTS `semestres`;
CREATE TABLE IF NOT EXISTS `semestres` (
  `id_semestre` int NOT NULL AUTO_INCREMENT,
  `nombre_semestre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `nombre_semestre`) VALUES
(1, '2015 - II'),
(2, '2018-I'),
(3, '2019-I'),
(4, '2021-II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombre_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellido_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `dni_usuario` int NOT NULL,
  `direccion_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `celular_usuario` int NOT NULL,
  `correo_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `contrasena` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `estado` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_usuario`, `nombre_usuario`, `apellido_usuario`, `dni_usuario`, `direccion_usuario`, `celular_usuario`, `correo_usuario`, `username`, `contrasena`, `estado`) VALUES
(1, 'Administrador', 'a', 'aa', 123456789, 'Vivo al lado de mi vecina', 987654321, 'a@', 'a', 'a', 'completed'),
(2, 'Alumno', 'b', 'bb', 76543221, 'Vivo al lado de mi vecina', 987654321, 'b@', 'b', 'b', 'pending'),
(3, 'Docente', 'c', 'cc', 1234554, 'Vivo al lado de mi vecina', 987654321, 'c@', 'c', 'c', 'process');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
