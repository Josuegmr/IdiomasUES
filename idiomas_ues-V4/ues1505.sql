-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2018 a las 18:31:54
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uesdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fechaTutoria` ()  NO SQL
UPDATE tutoria
SET estadoId = 8
WHERE CURRENT_DATE BETWEEN fechaInicioTutoria AND fechaFinTutoria$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoxpost`
--

CREATE TABLE `archivoxpost` (
  `archivoXPostId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `nombreArchivo` varchar(50) NOT NULL,
  `urlArhivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `asignaturaId` int(11) NOT NULL,
  `asignatura` varchar(50) NOT NULL,
  `cicloId` int(11) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asignaturaId`, `asignatura`, `cicloId`, `estadoId`) VALUES
(1, 'Métodos de Estudio a Distancia e Investigación', 1, 1),
(2, 'Sociología de la Educación', 1, 1),
(3, 'Psicología del Niño en Edad Escolar', 1, 1),
(4, 'Instituciones Educativas: Teorías y Concepciones', 1, 1),
(5, 'Conversación Inglesa I', 2, 1),
(6, 'Gramática Inglesa I', 2, 1),
(7, 'Fonética Inglesa I', 2, 1),
(8, 'Planeamiento Didáctico', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante`
--

CREATE TABLE `aspirante` (
  `aspiranteId` int(11) NOT NULL,
  `nombresAspirante` varchar(50) NOT NULL,
  `apellidosAspirante` varchar(50) NOT NULL,
  `correoAspirante` varchar(50) NOT NULL,
  `telefonoAspirante` varchar(50) NOT NULL,
  `fotoAspirante` varchar(50) NOT NULL,
  `DUIAspirante` varchar(9) NOT NULL,
  `CVAspirante` varchar(50) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `cicloId` int(11) NOT NULL,
  `ciclo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`cicloId`, `ciclo`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII'),
(9, 'IX'),
(10, 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `estadoId` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `tipoEstadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`estadoId`, `estado`, `tipoEstadoId`) VALUES
(1, 'Activo', 1),
(2, 'Inactivo', 1),
(3, 'Recibido', 2),
(4, 'En Revisió', 2),
(5, 'Procesado', 2),
(6, 'Anulado', 2),
(7, 'A Iniciar', 3),
(8, 'En Desarol', 3),
(9, 'Finalizado', 3),
(10, 'Anulado', 3),
(11, 'Pre-Inscri', 4),
(12, 'Inscrito', 4),
(13, 'Anulado', 4),
(14, 'Pendiente', 5),
(15, 'Realizada', 5),
(16, 'Anulada', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `evaluacionId` int(11) NOT NULL,
  `nombreEvaluacion` varchar(50) NOT NULL,
  `tipoEvaluacionId` int(11) NOT NULL,
  `tutoriaId` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaEvaluacion` time NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeria`
--

CREATE TABLE `mensajeria` (
  `mensajeriaId` int(11) NOT NULL,
  `usuarioIdRemitente` int(11) NOT NULL,
  `usuarioIdDetinatario` int(11) NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  `fechaMensajeria` date NOT NULL,
  `horaMensajeria` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `tituloPost` varchar(50) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `tipoPostId` int(11) NOT NULL,
  `tutoriaId` int(11) NOT NULL,
  `fechaPost` date NOT NULL,
  `horaPost` time NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `sedeId` int(11) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`sedeId`, `sede`, `estadoId`) VALUES
(1, 'San Salvador', 1),
(2, 'Santa Tecla', 1),
(3, 'Santa Ana', 1),
(4, 'San Vicente', 1),
(5, 'San Miguel', 1),
(6, 'Virtual', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoestado`
--

CREATE TABLE `tipoestado` (
  `tipoEstadoId` int(11) NOT NULL,
  `tipoEstado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoestado`
--

INSERT INTO `tipoestado` (`tipoEstadoId`, `tipoEstado`) VALUES
(1, 'Mantenimie'),
(2, 'Aspirante'),
(3, 'Tutoria'),
(4, 'TutoriaXEs'),
(5, 'Evaluación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevaluacion`
--

CREATE TABLE `tipoevaluacion` (
  `tipoEvaluacionId` int(11) NOT NULL,
  `tipoEvaluacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoevaluacion`
--

INSERT INTO `tipoevaluacion` (`tipoEvaluacionId`, `tipoEvaluacion`) VALUES
(1, 'Parcial'),
(2, 'Práctica'),
(3, 'Laboratori'),
(4, 'Avance'),
(5, 'Control de'),
(6, 'Trabajo'),
(7, 'Tarea Ex-A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopost`
--

CREATE TABLE `tipopost` (
  `tipoPostId` int(11) NOT NULL,
  `tipoPost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopost`
--

INSERT INTO `tipopost` (`tipoPostId`, `tipoPost`) VALUES
(1, 'Informativ'),
(2, 'Notificaci'),
(3, 'Aviso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotutoria`
--

CREATE TABLE `tipotutoria` (
  `tipoTutoriaId` int(11) NOT NULL,
  `tipoTutoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipotutoria`
--

INSERT INTO `tipotutoria` (`tipoTutoriaId`, `tipoTutoria`) VALUES
(1, 'Presencial'),
(2, 'Virtual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `tipoUsuarioId` int(11) NOT NULL,
  `tipoUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`tipoUsuarioId`, `tipoUsuario`) VALUES
(1, 'Coordinado'),
(2, 'Coordinado'),
(3, 'Tutor Cont'),
(4, 'Tutor Doce'),
(5, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoria`
--

CREATE TABLE `tutoria` (
  `tutoriaId` int(11) NOT NULL,
  `asignaturaId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `diaTutoria` varchar(6) NOT NULL,
  `horaInicioTutoria` time NOT NULL,
  `horaFinTutoria` time NOT NULL,
  `fechaInicioTutoria` date NOT NULL,
  `fechaFinTutoria` date NOT NULL,
  `sedeId` int(11) NOT NULL,
  `tipoTutoriaId` int(11) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutoria`
--

INSERT INTO `tutoria` (`tutoriaId`, `asignaturaId`, `usuarioId`, `diaTutoria`, `horaInicioTutoria`, `horaFinTutoria`, `fechaInicioTutoria`, `fechaFinTutoria`, `sedeId`, `tipoTutoriaId`, `estadoId`) VALUES
(1, 1, 3, 'Lunes', '10:00:00', '12:00:00', '2018-05-15', '2018-12-21', 1, 1, 8),
(2, 2, 4, 'Martes', '07:00:00', '09:00:00', '2018-01-15', '2018-06-15', 2, 1, 8);

--
-- Disparadores `tutoria`
--
DELIMITER $$
CREATE TRIGGER `estadoTutoria` AFTER UPDATE ON `tutoria` FOR EACH ROW call fechaTutoria()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriaxestudiante`
--

CREATE TABLE `tutoriaxestudiante` (
  `tutoriaXEstudianteId` int(11) NOT NULL,
  `tutoriaId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuarioId` int(11) NOT NULL,
  `nombresUsuario` varchar(50) NOT NULL,
  `apellidosUsurio` varchar(50) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `contrasenaUsuario` varchar(100) NOT NULL,
  `telefonoUsuario` varchar(50) NOT NULL,
  `fotoUsuario` varchar(50) DEFAULT NULL,
  `DUIUsuario` varchar(9) NOT NULL,
  `CVEmpleado` varchar(50) DEFAULT NULL,
  `DUEstudiante` varchar(7) NOT NULL,
  `sedeId` int(11) NOT NULL,
  `tipoUsuarioId` int(11) NOT NULL,
  `estadoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `nombresUsuario`, `apellidosUsurio`, `correoUsuario`, `contrasenaUsuario`, `telefonoUsuario`, `fotoUsuario`, `DUIUsuario`, `CVEmpleado`, `DUEstudiante`, `sedeId`, `tipoUsuarioId`, `estadoId`) VALUES
(1, 'Kevin Leonardo', 'Henríquez Martínez', 'kevin.henriquez@ues.edu.sv', '0000', '2222-2222 / 7777-7777', 'RUTA', '201602650', 'RUTA', 'NULL', 1, 1, 1),
(2, 'Alexandra Marina', 'Castillo Méndez', 'alexandra.castillo@ues.edu.sv', '0000', '2222-2222 / 7777-7777', 'RUTA', '201600920', 'RUTA', 'NULL', 1, 2, 1),
(3, 'Eduardo Josué', 'García Ortíz', 'eduardo.garcia@ues.edu.sv', '0000', '2222-2222 / 7777-7777', 'RUTA', '201402030', 'RUTA', 'NULL', 2, 3, 1),
(4, 'Luis Roberto', 'Nerio Rivas', 'luis.nerio@ues.edu.sv', '0000', '2222-2222 / 7777-7777', 'RUTA', '201401870', 'RUTA', 'NULL', 3, 4, 1),
(5, 'Geovany Fernando', 'Godinez López', 'geovany.godinez@ues.edu.sv', '0000', '2222-2222 / 7777-7777', 'RUTA', '201602460', 'NULL', '2014GL1', 4, 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivoxpost`
--
ALTER TABLE `archivoxpost`
  ADD PRIMARY KEY (`archivoXPostId`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`asignaturaId`);

--
-- Indices de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD PRIMARY KEY (`aspiranteId`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`cicloId`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estadoId`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`evaluacionId`);

--
-- Indices de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD PRIMARY KEY (`mensajeriaId`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`sedeId`);

--
-- Indices de la tabla `tipoestado`
--
ALTER TABLE `tipoestado`
  ADD PRIMARY KEY (`tipoEstadoId`);

--
-- Indices de la tabla `tipoevaluacion`
--
ALTER TABLE `tipoevaluacion`
  ADD PRIMARY KEY (`tipoEvaluacionId`);

--
-- Indices de la tabla `tipopost`
--
ALTER TABLE `tipopost`
  ADD PRIMARY KEY (`tipoPostId`);

--
-- Indices de la tabla `tipotutoria`
--
ALTER TABLE `tipotutoria`
  ADD PRIMARY KEY (`tipoTutoriaId`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`tipoUsuarioId`);

--
-- Indices de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD PRIMARY KEY (`tutoriaId`);

--
-- Indices de la tabla `tutoriaxestudiante`
--
ALTER TABLE `tutoriaxestudiante`
  ADD PRIMARY KEY (`tutoriaXEstudianteId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivoxpost`
--
ALTER TABLE `archivoxpost`
  MODIFY `archivoXPostId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `asignaturaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  MODIFY `aspiranteId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  MODIFY `cicloId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `estadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `evaluacionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  MODIFY `mensajeriaId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `sedeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipoestado`
--
ALTER TABLE `tipoestado`
  MODIFY `tipoEstadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipoevaluacion`
--
ALTER TABLE `tipoevaluacion`
  MODIFY `tipoEvaluacionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipopost`
--
ALTER TABLE `tipopost`
  MODIFY `tipoPostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipotutoria`
--
ALTER TABLE `tipotutoria`
  MODIFY `tipoTutoriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `tipoUsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  MODIFY `tutoriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tutoriaxestudiante`
--
ALTER TABLE `tutoriaxestudiante`
  MODIFY `tutoriaXEstudianteId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
