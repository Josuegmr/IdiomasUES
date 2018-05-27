-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 09:25:05
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ues-e2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoxpost`
--

CREATE TABLE `archivoxpost` (
  `idAxP` int(11) NOT NULL,
  `nombreArchivo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urlArchivo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL,
  `asignatura` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idCiclo` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante`
--

CREATE TABLE `aspirante` (
  `idAspirante` int(11) NOT NULL,
  `nombreAspirante` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoAspirante` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correoAspirante` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonoAspirante` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fotoAspirante` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `duiAspirante` int(10) NOT NULL,
  `cvAspirante` int(50) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `idCiclo` int(11) NOT NULL,
  `ciclo` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `idEvaluacion` int(11) NOT NULL,
  `nombreEvaluacion` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaEvaluacion` date NOT NULL,
  `horaInicioEvaluacion` time NOT NULL,
  `horaFinEvaluacion` time NOT NULL,
  `idTipoEvaluacion` int(11) NOT NULL,
  `idTutoria` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL,
  `tituloPost` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `post` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaPost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idTipoPost` int(11) NOT NULL,
  `idTutoria` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `idSede` int(11) NOT NULL,
  `sede` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevaluaciones`
--

CREATE TABLE `tipoevaluaciones` (
  `idTipoEvaluacion` int(11) NOT NULL,
  `tipoEvaluacion` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoposts`
--

CREATE TABLE `tipoposts` (
  `idTipoPost` int(11) NOT NULL,
  `tipoPost` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotutorias`
--

CREATE TABLE `tipotutorias` (
  `idTipoTutoria` int(11) NOT NULL,
  `tipoTutoria` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idTipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias`
--

CREATE TABLE `tutorias` (
  `idTutoria` int(11) NOT NULL,
  `nombreTutoria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `diaTuroria` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaInicioTutoria` date NOT NULL,
  `horaInicioTutoria` time NOT NULL,
  `horaFinTutoria` time NOT NULL,
  `contraTutoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idSede` int(11) NOT NULL,
  `idTipoTutoria` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriaxestudiante`
--

CREATE TABLE `tutoriaxestudiante` (
  `idTxE` int(11) NOT NULL,
  `idTutoria` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoUsuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraUsuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correoUsuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonoUsuario` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fotoUsuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `duiUsuario` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cvEmpleado` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dueEstudiante` varchar(7) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivoxpost`
--
ALTER TABLE `archivoxpost`
  ADD PRIMARY KEY (`idAxP`),
  ADD KEY `idPost` (`idPost`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`idAsignatura`),
  ADD UNIQUE KEY `asignatura` (`asignatura`),
  ADD KEY `idCiclo` (`idCiclo`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD PRIMARY KEY (`idAspirante`),
  ADD UNIQUE KEY `correoAspirante` (`correoAspirante`),
  ADD UNIQUE KEY `duiAspirante` (`duiAspirante`),
  ADD UNIQUE KEY `telefonoAspirante` (`telefonoAspirante`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`idCiclo`),
  ADD UNIQUE KEY `ciclo` (`ciclo`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`idEvaluacion`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idTipoEvaluacion` (`idTipoEvaluacion`),
  ADD KEY `idTutoria` (`idTutoria`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idTipoPost` (`idTipoPost`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idTutoria` (`idTutoria`) USING BTREE;

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`idSede`),
  ADD UNIQUE KEY `sede` (`sede`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `tipoevaluaciones`
--
ALTER TABLE `tipoevaluaciones`
  ADD PRIMARY KEY (`idTipoEvaluacion`),
  ADD UNIQUE KEY `tipoEvaluacion` (`tipoEvaluacion`);

--
-- Indices de la tabla `tipoposts`
--
ALTER TABLE `tipoposts`
  ADD PRIMARY KEY (`idTipoPost`),
  ADD UNIQUE KEY `tipoPost` (`tipoPost`);

--
-- Indices de la tabla `tipotutorias`
--
ALTER TABLE `tipotutorias`
  ADD PRIMARY KEY (`idTipoTutoria`),
  ADD UNIQUE KEY `tipoTutoria` (`tipoTutoria`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idTipoUsuario`),
  ADD UNIQUE KEY `tipoUsuario` (`tipoUsuario`);

--
-- Indices de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD PRIMARY KEY (`idTutoria`),
  ADD UNIQUE KEY `nombreTutoria` (`nombreTutoria`),
  ADD KEY `idAsignatura` (`idAsignatura`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idSede` (`idSede`),
  ADD KEY `idTipoTutoria` (`idTipoTutoria`);

--
-- Indices de la tabla `tutoriaxestudiante`
--
ALTER TABLE `tutoriaxestudiante`
  ADD KEY `idTutoria` (`idTutoria`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correoUsuario` (`correoUsuario`),
  ADD UNIQUE KEY `dueEstudiante` (`dueEstudiante`),
  ADD UNIQUE KEY `duiUsuario` (`duiUsuario`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivoxpost`
--
ALTER TABLE `archivoxpost`
  MODIFY `idAxP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `idCiclo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `idSede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoevaluaciones`
--
ALTER TABLE `tipoevaluaciones`
  MODIFY `idTipoEvaluacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoposts`
--
ALTER TABLE `tipoposts`
  MODIFY `idTipoPost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipotutorias`
--
ALTER TABLE `tipotutorias`
  MODIFY `idTipoTutoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  MODIFY `idTutoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivoxpost`
--
ALTER TABLE `archivoxpost`
  ADD CONSTRAINT `archivoxpost_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`idPost`);

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`idCiclo`) REFERENCES `ciclos` (`idCiclo`),
  ADD CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD CONSTRAINT `aspirante_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`),
  ADD CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`idTipoEvaluacion`) REFERENCES `tipoevaluaciones` (`idTipoEvaluacion`),
  ADD CONSTRAINT `evaluaciones_ibfk_3` FOREIGN KEY (`idTutoria`) REFERENCES `tutorias` (`idTutoria`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idTipoPost`) REFERENCES `tipoposts` (`idTipoPost`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idTutoria`) REFERENCES `tutorias` (`idTutoria`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD CONSTRAINT `tutorias_ibfk_1` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  ADD CONSTRAINT `tutorias_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`),
  ADD CONSTRAINT `tutorias_ibfk_3` FOREIGN KEY (`idSede`) REFERENCES `sedes` (`idSede`),
  ADD CONSTRAINT `tutorias_ibfk_4` FOREIGN KEY (`idTipoTutoria`) REFERENCES `tipotutorias` (`idTipoTutoria`);

--
-- Filtros para la tabla `tutoriaxestudiante`
--
ALTER TABLE `tutoriaxestudiante`
  ADD CONSTRAINT `tutoriaxestudiante_ibfk_1` FOREIGN KEY (`idTutoria`) REFERENCES `tutorias` (`idTutoria`),
  ADD CONSTRAINT `tutoriaxestudiante_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`),
  ADD CONSTRAINT `tutoriaxestudiante_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuarios` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
