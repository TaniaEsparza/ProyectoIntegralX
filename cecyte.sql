-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2019 a las 01:10:46
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cecyte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellido_paterno` tinytext CHARACTER SET utf8 NOT NULL,
  `apellido_materno` tinytext CHARACTER SET utf8,
  `nombre` tinytext NOT NULL,
  `rfc` tinytext,
  `curp` tinytext NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_sangre` tinytext NOT NULL,
  `lugar_nacimiento` tinytext NOT NULL,
  `nss` tinytext NOT NULL,
  `correo_electronico` tinytext,
  `telefono_casa` tinytext NOT NULL,
  `telefono_celular` tinytext NOT NULL,
  `colonia` tinytext NOT NULL,
  `calle` tinytext NOT NULL,
  `numero_domicilio` tinytext NOT NULL,
  `codigo_postal` tinytext NOT NULL,
  `municipio` tinytext NOT NULL,
  `estado` tinytext NOT NULL,
  `numero_empleado` tinytext NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estatus` tinytext NOT NULL,
  `departamento` tinytext NOT NULL,
  `puesto` tinytext NOT NULL,
  `horas` float NOT NULL,
  `ultimo_grado_estudios` tinytext,
  `carrera_especialidad` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `apellido_paterno`, `apellido_materno`, `nombre`, `rfc`, `curp`, `fecha_nacimiento`, `tipo_sangre`, `lugar_nacimiento`, `nss`, `correo_electronico`, `telefono_casa`, `telefono_celular`, `colonia`, `calle`, `numero_domicilio`, `codigo_postal`, `municipio`, `estado`, `numero_empleado`, `fecha_ingreso`, `estatus`, `departamento`, `puesto`, `horas`, `ultimo_grado_estudios`, `carrera_especialidad`) VALUES
(1, 'Rosales', 'Saldaña', 'Salvador', 'ROSA741117CD3', 'ROSA741117HZSTRN00', '1996-11-17', 'O+', 'Rio Grande', '66159604868', 'Rosales.Salvador@live.com', '9825243', '4981096432', 'Centro', 'Reforma', '5', '98400', 'Rio Grande', 'Zacatecas', '230', '2019-01-01', 'Empleado Base', 'Finanzas', 'Jefe de Finanzas', 2, '', ''),
(3, 'Ramirez', 'CastaÃ±eda', 'Jose', 'ABCDEGD', 'asdfkjlsd', '1999-10-18', 'b2', 'fresnillo', '654156', 'jose@mail.com', '49351564564', '498456156', 'Centro', 'Rio Grande', '66', '98355', 'Rio Grande', 'Zacatecas', '656', '2018-10-17', 'Empleado Base', 'Finanzas', 'SubDirector de Finanzas', 16, '3', 'Educacion Fisic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE IF NOT EXISTS `egresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` tinytext NOT NULL,
  `detalle` text,
  `costo` float NOT NULL,
  `fecha_egreso` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha_incidencia` tinytext NOT NULL,
  `clausula` tinytext NOT NULL,
  `asunto` tinytext NOT NULL,
  `documentacion` tinytext NOT NULL,
  `motivos` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_empleado`, `fecha_incidencia`, `clausula`, `asunto`, `documentacion`, `motivos`) VALUES
(1, 3, '16 17 y 18 de Marzo', '654', 'Comision', 'Acta de Comision', '16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellido_paterno` tinytext,
  `apellido_materno` tinytext,
  `nombre` tinytext NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `grado` int(10) unsigned NOT NULL,
  `grupo` tinytext NOT NULL,
  `semestre` tinytext NOT NULL,
  `carrera` tinytext NOT NULL,
  `concepto` int(11) NOT NULL,
  `costo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `apellido_paterno`, `apellido_materno`, `nombre`, `fecha_ingreso`, `grado`, `grupo`, `semestre`, `carrera`, `concepto`, `costo`) VALUES
(10, 'QUIRINO', 'ADAME', 'JOSE CARLOS', '2019-07-06', 6, 'A', 'Febrero-Julio', 'Enfermeria General', 8, 300),
(11, 'BATRES', 'JUAREZ', 'JUAN LUIS', '2019-07-12', 6, 'B', 'Febrero-Julio', 'Soporte y Matenimiento al Equipo de Computo', 3, 25),
(12, 'Jose Manuel', 'Figueroa', 'Sanchez', '2020-08-26', 6, 'B', 'Febrero-Julio', 'Enfermeria General', 9, 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_conceptos`
--

CREATE TABLE IF NOT EXISTS `ingresos_conceptos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `concepto` tinytext NOT NULL,
  `costo` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `ingresos_conceptos`
--

INSERT INTO `ingresos_conceptos` (`id`, `concepto`, `costo`) VALUES
(1, 'Certificado', 100),
(2, 'Reposición o Duplicado de Certificados', 250),
(3, 'Constancia de estudios', 25),
(4, 'Expedición de títulos de técnico CECyTEZ', 250),
(5, 'Reposición de credencial', 100),
(6, 'Evaluación de extraordinario', 100),
(7, 'Curso intersemestral', 150),
(8, 'Recursamiento de asignatura', 300),
(9, 'Cuotas voluntarias', 600),
(10, 'Credencial', 30),
(11, 'Cuotas Voluntarias con 50% de condonación', 300),
(12, 'Cuotas Voluntarias con 100% de condonación', 0),
(13, 'Cooperación para material de exámenes', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `articulo` tinytext NOT NULL,
  `descripcion` tinytext NOT NULL,
  `precio` float NOT NULL,
  `cantidad` float NOT NULL,
  `proveedores` tinytext NOT NULL,
  `origenes` tinytext NOT NULL,
  `serie` tinytext NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `tipo` tinytext NOT NULL,
  `fecha_registro` date NOT NULL,
  `estatus` tinytext NOT NULL,
  `marca` tinytext NOT NULL,
  `modelo` tinytext NOT NULL,
  `mes` tinytext NOT NULL,
  `ano` tinytext NOT NULL,
  `imagen` tinytext,
  `categorias` tinytext NOT NULL,
  `estado` tinytext NOT NULL,
  `area` tinytext NOT NULL,
  `ubicacion` tinytext NOT NULL,
  `empleado` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `articulo`, `descripcion`, `precio`, `cantidad`, `proveedores`, `origenes`, `serie`, `fecha_ingreso`, `tipo`, `fecha_registro`, `estatus`, `marca`, `modelo`, `mes`, `ano`, `imagen`, `categorias`, `estado`, `area`, `ubicacion`, `empleado`) VALUES
(1, 'Computadora', 'Laptop', 3800, 1, 'Dell', 'Guadalajara', '123', '2019-10-10', 'Computo', '2019-09-09', 'Activo', 'Dell', 'axsd', '1', '2019', '1a25776eb209e6631f478842b8b04ef1.png', 'Laptop', '1', 'Finanzas', 'RÃ­o Grande', 'Jose'),
(2, 'Escritorio', 'Escritorio para oficina', 3500, 1, 'Printform', 'frenillo', 'a546', '2019-07-07', 'Mobiliario', '2019-06-06', 'Activo', 'Tamagochi', 'a5469', '3', '2019', '0cf7ffc26e9293c0aa8e4e4efca5d075.png', 'Escritorio', '3', 'Gestion', 'Rio Grande', 'Arturo Hernandez'),
(3, 'Sillas', 'sillas para aula', 280, 8, 'DMO', 'zacatecas', '23465rl', '2019-05-10', '10', '2019-05-12', '10', 'Neiva', 'N92RDH', '3', '2019', '8cc226e602a0aed16a708e5e949ea66c.png', 'Muebleria de oficina', '1', 'Aula 3', 'Planta alta', 'Fco Javier Ceniceros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` tinytext NOT NULL,
  `correo` tinytext NOT NULL,
  `contrasena` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$iy.VKG1COXeTtLCl6t7qRu/j0bgjxdthDi7lSe6daA1iTU1kMIj1q');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
