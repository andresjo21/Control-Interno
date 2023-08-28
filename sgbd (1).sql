-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-08-2023 a las 00:37:40
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create DATABASE sgbd;
use sgbd;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

DROP TABLE IF EXISTS `dominio`;
CREATE TABLE IF NOT EXISTS `dominio` (
  `id_dominio` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_dominio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`id_dominio`, `nombre`) VALUES
('0001', 'Planificación y Organización'),
('0002', 'Evaluación de Riesgos'),
('0003','Administracion de Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo_control`
--

DROP TABLE IF EXISTS `objetivo_control`;
CREATE TABLE IF NOT EXISTS `objetivo_control` (
  `id_objetivo_control` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pregunta` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_proceso` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_objetivo_control`),
  KEY `fkproceso` (`id_proceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetivo_control`
--

INSERT INTO `objetivo_control` (`id_objetivo_control`, `pregunta`, `id_proceso`) VALUES
('01', 'PO9.1: ¿La organización cuenta con un marco de trabajo de administración de riesgos de TI (Alineado al marco de trabajo de administración de riesgos de la organización)? ', '0P09'),
('02', 'PO9.2:¿La organización define el contexto interno y externo en el cual se aplica el marco de evaluación de riesgos de TI?', '0P09'),
('03', 'PO9.2:¿Se asegura que los resultados de la evaluación de riesgos sean apropiados dentro del contexto definido?', '0P09'),
('04', 'PO9.3: ¿La organización identifica eventos que puedan tener un impacto negativo en las metas de la organización?', '0P09'),
('05', 'PO9.3:¿Se mantiene un registro de riesgos de TI donde se registran y mantienen los riesgos identificados?', '0P09'),
('06', 'PO9.3:¿Se cuenta con un portafolio de riesgos de TI donde se tengan identificados y categorizados los riesgos?', '0P09'),
('07', 'PO9.4:¿La organización realiza evaluaciones recurrentes de la probabilidad e impacto de los riesgos identificados?', '0P09'),
('08', 'PO9.4:¿La organización utiliza métodos cualitativos y cuantitativos para evaluar la probabilidad e impacto de los riesgos?', '0P09'),
('09', 'PO9.4:¿Se determinan los riesgos inherentes y residuales de forma individual y por categoría según el portafolio?', '0P09'),
('10', 'PO9.5:¿La organización desarrolla y mantiene un proceso de respuesta a los riesgos de TI identificados?', '0P09'),
('11', 'PO9.5:¿El proceso de respuesta a riesgos considera estrategias como evitar, reducir, compartir o aceptar riesgos?', '0P09'),
('12', 'PO9.5:¿Se definen responsabilidades y niveles de tolerancia a riesgos en el proceso de respuesta?', '0P09'),
('13', 'DS11.1¿La organización verifica que todos los datos que se espera procesar se reciben y procesan completamente, de forma precisa y a tiempo, y que los resultados se entregan según lo requerido?', 'DS11'),
('14', 'DS11.2¿La organización ha definido y puesto en práctica procedimientos efectivos y eficientes para el archivo, almacenamiento y retención de los datos que cumplen con los objetivos de negocio y la política de seguridad de la organización?', 'DS11'),
('15', 'DS11.3¿La organización ha establecido procedimientos para mantener un inventario de medios de almacenamiento, asegurando su usabilidad e integridad?', 'DS11'),
('16', 'DS11.4¿La organización ha definido y aplicado procedimientos para garantizar que tanto los datos como el hardware sean eliminados o transferidos de manera segura, cumpliendo con los requisitos establecidos por la organización para la protección de datos sensitivos?', 'DS11'),
('17', 'DS11.5¿La organización cuenta con procedimientos de respaldo y restauración de sistemas, aplicaciones, datos y documentación (Alineados a los requerimientos de negocio y el plan de continuidad de la organización)?', 'DS11'),
('18', 'DS11.6¿La organización ha establecido políticas y procedimientos para aplicar los requerimientos de seguridad en el procesamiento, almacenamiento y salida de datos, de acuerdo con los objetivos de negocio, políticas de seguridad de la organización y requerimientos regulatorios?', 'DS11'),
('19', 'PO8.1¿La organización tiene establecido y mantiene un sistema de administración de calidad (QMS) que proporcione un enfoque estándar, formal y continuo, con respecto a la administración de la calidad, que esté alineado con los requerimientos de la organización?', '0P08'),
('20', 'PO8.2¿La organización identifica y mantiene estándares, procedimientos y prácticas para los procesos claves de TI para orientar a la misma organización hacia el cumplimiento del sistema de administración de calidad (QMS)?', '0P08'),
('21', 'PO8.3¿La organización adopta y mantiene estándares para todo desarrollo y adquisición que siga en ciclo de vida, hasta el último entregable e incluye la aprobación en puntos clave con base a criterios de aceptación acordados?', '0P08'),
('22', 'PO8.4¿La organización enfoca la administración de calidad en los clientes, determinando sus requerimientos y alineándolos con los estándares y prácticas de TI?', '0P08'),
('23', 'PO8.5¿La organización mantiene y comunica regularmente un plan global de calidad para promover la mejora continua?', '0P08'),
('24', 'PO8.6¿La organización define, plantea e implementa mediciones para monitorear el cumplimiento continuo de sistema de administración de calidad (QMS), así como el valor que este sistema proporciona?', '0P08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

DROP TABLE IF EXISTS `proceso`;
CREATE TABLE IF NOT EXISTS `proceso` (
  `id_proceso` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_dominio` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_proceso`),
  KEY `fkdominio` (`id_dominio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `nombre`, `id_dominio`) VALUES
('0P08', 'Administrar la Calidad', '0001'),
('0P09', 'Evaluación de Riesgos', '0002'),
('DS11', 'Administracion de Datos', '0003');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `objetivo_control`
--
ALTER TABLE `objetivo_control`
  ADD CONSTRAINT `objetivo_control_ibfk_1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
