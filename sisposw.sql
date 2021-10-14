-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2018 a las 02:33:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisposw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `ArtCod` int(11) NOT NULL,
  `ArtCant` int(70) NOT NULL,
  `ArtPre` double(12,2) NOT NULL,
  `ArtDes` varchar(90) NOT NULL,
  `ProNdo` char(11) NOT NULL,
  `SLproId` int(11) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`ArtCod`, `ArtCant`, `ArtPre`, `ArtDes`, `ProNdo`, `SLproId`, `Estado`, `archivo`) VALUES
(1, 20, 2000.00, 'tubo PBC1', '00001', 1, 'Inactivo', ''),
(12, 16, 8987.00, 'Atornillador', '00001', 1, 'Activo', 'destornillador.jpg'),
(13, 92, 28000.00, 'Linterna', '00001', 1, 'Activo', 'linterna.png'),
(14, 141, 58000.00, 'Juego de llaves', '00001', 1, 'Activo', 'llaves.jpg'),
(15, 100, 11100.00, 'Martillo', '00001', 1, 'Activo', 'martillo.jpg'),
(16, 97, 165000.00, 'Taladro', '00001', 1, 'Activo', 'taladro.jpg'),
(17, 96, 500.00, 'Tornillo', '00001', 1, 'Activo', 'tornillo.jpg'),
(18, 100, 3000.00, 'Brocha', '00001', 1, 'Activo', 'brocha.jpg'),
(19, 100, 20000.00, 'Metro', '00001', 1, 'Activo', 'metro.jpg'),
(20, 100, 150000.00, 'Pulidora', '00001', 1, 'Activo', 'pulidora.jpg'),
(22, 24, 6000.00, 'Aceite', '00001', 1, 'Activo', 'aceite.jpg'),
(23, 100, 4000.00, 'Bombillo', '00001', 1, 'Activo', 'bombillo.jpg'),
(24, 100, 2000.00, 'Candado', '00001', 1, 'Activo', 'candado.jpg'),
(25, 100, 65000.00, 'Carretilla', '00001', 1, 'Activo', 'carretilla.jpg'),
(26, 100, 74000.00, 'Casco', '00001', 1, 'Activo', 'casco.jpg'),
(27, 100, 3000.00, 'Cinta negra', '00001', 1, 'Activo', 'cintanegra.jpg'),
(29, 100, 8000.00, 'CortafrÃ­o', '00001', 1, 'Activo', 'cortafrio.jpg'),
(30, 100, 4000.00, 'EspÃ¡tula', '00001', 1, 'Activo', 'espatula.jpg'),
(31, 20, 32000.00, 'Guantes', '00001', 1, 'Activo', 'guantes.jpg'),
(32, 21, 50000.00, 'Taburete', '00001', 1, 'Activo', 'taburete.jpg'),
(33, 45, 15000.00, 'Serrucho', '10516932', 7, 'Activo', 'serrucho.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `IdAuditoria` int(11) NOT NULL,
  `AudFecha` date NOT NULL,
  `AudUsuario` char(11) NOT NULL,
  `AudDatOld` varchar(50) NOT NULL,
  `AudDatNew` varchar(50) NOT NULL,
  `Accion` enum('Insertar','Actualizar','C_estado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `BarId` char(11) NOT NULL,
  `BarNom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`BarId`, `BarNom`) VALUES
('1', 'Colinas del Sur'),
('1101', 'Junin'),
('1102', 'Ciudad jardin'),
('1103', 'Siloe'),
('1104', 'Las acacias'),
('1105', 'Caney'),
('1106', 'Salomia'),
('1107', 'El ingenio'),
('1108', 'Valle del lili'),
('2', 'Brisas de los andes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `CajCod` int(11) NOT NULL,
  `CajUbi` varchar(40) NOT NULL,
  `CajDes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`CajCod`, `CajUbi`, `CajDes`) VALUES
(1, 'Cali', 'Caja'),
(2, 'Madellin', 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `CarId` int(11) NOT NULL,
  `CarNom` varchar(30) NOT NULL,
  `CarDes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`CarId`, `CarNom`, `CarDes`) VALUES
(1, 'Administrador', 'Manejar el sistema\r\n'),
(2, 'Surtidor', 'Estar Pendiente del producto'),
(3, 'Cajero ', 'Encargado de caja '),
(5, 'Gerente ', 'cabeza principal de la empresa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(11) NOT NULL,
  `sesion_id` varchar(100) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carrito_id`, `sesion_id`, `producto_id`, `cantidad`, `estado`) VALUES
(53, 'rccvrdcsmc2kt4f1uqgvc78e1o', 16, '3', 0),
(54, 'rccvrdcsmc2kt4f1uqgvc78e1o', 14, '5', 0),
(56, 'q12d43sdleorhe7iv04gulro0k', 13, '8', 0),
(57, 'q12d43sdleorhe7iv04gulro0k', 17, '4', 0),
(58, 'q12d43sdleorhe7iv04gulro0k', 12, '5', 0);

--
-- Disparadores `carrito`
--
DELIMITER $$
CREATE TRIGGER `suminv` AFTER UPDATE ON `carrito` FOR EACH ROW UPDATE articulo
set ArtCant = ArtCant+old.cantidad-new.cantidad
where ArtCod = new. producto_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `udpinv` AFTER INSERT ON `carrito` FOR EACH ROW UPDATE articulo
set ArtCant = ArtCant-new.cantidad
where ArtCod = new. producto_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `CiuCod` char(3) NOT NULL,
  `CiuNom` varchar(40) NOT NULL,
  `CodDpt` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`CiuCod`, `CiuNom`, `CodDpt`) VALUES
('1', 'Cali', '1'),
('102', 'Cali', '130'),
('103', 'Palmira', '130'),
('104', 'Buga', '130'),
('105', 'Tulua', '124'),
('106', 'Cartago', '125'),
('107', 'Jamundí', '130'),
('108', 'Yumbo', '130'),
('109', 'Candelaria', '130'),
('110', 'Neiva', '129'),
('111', 'Calima', '130'),
('2', 'Medellin', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CliNdo` char(11) NOT NULL,
  `TideId` int(11) NOT NULL,
  `RolId` int(1) NOT NULL,
  `CliNom` varchar(30) NOT NULL,
  `CliApe` varchar(30) NOT NULL,
  `CliGen` char(1) NOT NULL,
  `CliFec` date NOT NULL,
  `CliDir` varchar(20) NOT NULL,
  `CliEma` varchar(40) NOT NULL,
  `BarId` char(11) NOT NULL,
  `CiuCod` char(3) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CliNdo`, `TideId`, `RolId`, `CliNom`, `CliApe`, `CliGen`, `CliFec`, `CliDir`, `CliEma`, `BarId`, `CiuCod`, `Estado`) VALUES
('00001', 1, 3, 'Luisa', 'Fernandez', 'F', '2018-11-11', 'calle 56', 'luisa@gmail.com', '2', '1', 'Activo'),
('1101435463', 1, 3, 'Juan', 'Borelly', 'M', '2018-12-16', 'Cll 13a 18-32', 'juanborely@gmail.com', '1101', '102', 'Activo'),
('1102435234', 1, 3, 'Ange', 'Giraldo', 'F', '2018-12-17', 'Cll 6  22-66', 'angiegiraldo@gmail.com', '1106', '102', 'Activo'),
('1106374562', 2, 3, 'Cristian ', 'tabares', 'M', '2018-12-17', 'Cll 12 39-04 ', 'christiantabares@gmail.com', '1104', '102', 'Activo'),
('1107529478', 1, 3, 'Felipe', 'Aponza', 'M', '2018-12-10', 'Cra 1 Cll 56', 'felipeaponza@gmail.com', '1105', '102', 'Activo'),
('1107529643', 1, 3, 'Camilo', 'Puentes', 'M', '2018-12-09', 'Av 4 9N 77', 'camilopuentes@gmail.com', '1102', '102', 'Activo'),
('1108456372', 2, 3, 'Brayan', 'Muelas', 'M', '2018-12-17', 'Cll 62 2b-32', 'brayanmuelas@gmail.com', '1101', '102', 'Activo'),
('1109801702', 1, 3, 'Armando', 'Ruiz', 'M', '2018-12-02', 'Av 7 12-33', 'armandoruiz@gmail.com', '1107', '102', 'Activo'),
('1116757432', 2, 3, 'Angelica', 'Agudelo', 'F', '2018-12-29', 'Cll 11 31-11', 'angelicaagudelo@gmail.com', '1105', '102', 'Activo'),
('6645437789', 1, 3, 'Gustavo ', 'Espinosa', 'M', '2018-12-02', 'Cll 56 IB 06', 'gustavoespinosa@gmail.com', '1108', '102', 'Activo'),
('6669074324', 1, 3, 'Alex', 'Ubago', 'M', '2018-12-18', 'Av 3 norte 32-49', 'alexubago@gmail.com', '1103', '102', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `CodDpt` char(3) NOT NULL,
  `DptNom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`CodDpt`, `DptNom`) VALUES
('1', 'Valle del cauca'),
('123', 'Amazonas'),
('124', 'Antioquia'),
('125', 'Arauca'),
('126', 'Atlántico'),
('127', 'Bolivar'),
('128', 'Boyaca'),
('129', 'Caldas'),
('130', 'Valle del Cauca'),
('131', 'Quindio'),
('132', 'Huila'),
('2', 'Antioquia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `DveId` int(11) NOT NULL,
  `DveCod` int(11) NOT NULL,
  `DveCan` double(12,2) NOT NULL,
  `DveIva` double(12,2) NOT NULL,
  `DveTot` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`DveId`, `DveCod`, `DveCan`, `DveIva`, `DveTot`) VALUES
(1, 1, 5.00, 500.00, 5000.00),
(2, 1, 3.00, 2000.00, 45000.00),
(3, 12, 5.00, 3500.00, 100000.00),
(4, 13, 1.00, 5500.00, 17000.00),
(5, 14, 6.00, 6500.00, 180000.00),
(6, 15, 4.00, 4000.00, 64000.00),
(7, 16, 9.00, 4500.00, 171000.00),
(8, 17, 1.00, 6000.00, 25000.00),
(9, 18, 2.00, 8500.00, 44000.00),
(10, 19, 3.00, 10000.00, 30000.00),
(11, 20, 4.00, 3000.00, 60000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `EmpNdo` char(11) NOT NULL,
  `EmpNom` varchar(30) NOT NULL,
  `RolId` int(11) NOT NULL,
  `EmpGen` char(1) NOT NULL,
  `TideId` int(11) NOT NULL,
  `CarId` int(11) NOT NULL,
  `CajCod` int(11) NOT NULL,
  `HlaId` int(11) NOT NULL,
  `EmpDir` varchar(50) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`EmpNdo`, `EmpNom`, `RolId`, `EmpGen`, `TideId`, `CarId`, `CajCod`, `HlaId`, `EmpDir`, `Estado`) VALUES
('1017152334', 'Monica', 2, 'F', 1, 2, 2, 2, 'Cll 4 Cra 94', 'Activo'),
('1128387054', 'Erika', 2, 'F', 1, 2, 1, 1, 'Cra 23 No 120-00', 'Activo'),
('1128475566', 'Daniel', 2, 'M', 1, 2, 2, 2, 'Cra A 72B-86', 'Activo'),
('1152185625', 'Martha', 2, 'F', 1, 3, 2, 2, 'Cll 72p Cra 28f', 'Activo'),
('32205026', 'Jair', 2, 'M', 1, 3, 1, 1, 'Av 6 oeste No 19-72', 'Activo'),
('43081586', 'Sergio', 2, 'M', 1, 1, 1, 1, 'Cll 13N No 4n-62', 'Activo'),
('43536415', 'Jaime', 2, 'M', 1, 1, 1, 1, 'Cll 15 13-43', 'Activo'),
('43616779', 'Ender', 2, 'M', 1, 1, 1, 1, 'Cll 38 Cra 41h', 'Activo'),
('43756174', 'Johan', 2, 'M', 1, 2, 2, 2, 'Cra 41B Cll 50', 'Activo'),
('70661470', 'Cecilia', 2, 'F', 1, 2, 2, 2, 'Cra 8n No 70A-16', 'Activo'),
('761209128', 'Emmanuel', 2, 'F', 1, 2, 1, 1, 'colinas del sur', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `FacCod` int(11) NOT NULL,
  `FacFec` date NOT NULL,
  `FacHor` int(10) NOT NULL,
  `CajCod` int(11) NOT NULL,
  `CliNdo` char(11) NOT NULL,
  `EmpNdo` char(11) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`FacCod`, `FacFec`, `FacHor`, `CajCod`, `CliNdo`, `EmpNdo`, `Estado`) VALUES
(1, '2018-11-24', 12736, 1, '00001', '761209128', 'Activo'),
(2, '2018-11-20', 1600, 1, '1101435463', '43536415', 'Activo'),
(3, '2018-11-21', 2000, 2, '1107529643', '1128475566', 'Activo'),
(4, '2018-11-22', 1800, 1, '6669074324', '32205026', 'Activo'),
(5, '2018-11-23', 1400, 2, '1106374562', '1152185625', 'Activo'),
(6, '2018-11-24', 600, 1, '1116757432', '43081586', 'Activo'),
(7, '2018-11-25', 1900, 2, '1102435234', '1017152334', 'Activo'),
(8, '2018-11-26', 500, 1, '1109801702', '1128387054', 'Activo'),
(9, '2018-11-27', 600, 2, '6645437789', '43756174', 'Activo'),
(10, '2018-11-28', 1200, 1, '1108456372', '43616779', 'Activo'),
(11, '2018-11-29', 1100, 2, '1107529478', '70661470', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariolaboral`
--

CREATE TABLE `horariolaboral` (
  `HlaId` int(11) NOT NULL,
  `HlaIni` char(5) NOT NULL,
  `HlaFin` char(5) NOT NULL,
  `HlaDes` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horariolaboral`
--

INSERT INTO `horariolaboral` (`HlaId`, `HlaIni`, `HlaFin`, `HlaDes`) VALUES
(1, '0800', '1600', 'horario laboral del empleado diario obligatorio son de 11 horas'),
(2, '1400', '2200', 'horario laboral del empleado diario obligatorio son de 11 horas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaproducto`
--

CREATE TABLE `lineaproducto` (
  `LprID` int(11) NOT NULL,
  `LprDes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineaproducto`
--

INSERT INTO `lineaproducto` (`LprID`, `LprDes`) VALUES
(1, 'Ferreteria1'),
(2, 'Hogar'),
(3, 'Limpieza'),
(4, 'Cocina'),
(12, 'Sierras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProNdo` char(11) NOT NULL,
  `ProNit` int(11) NOT NULL,
  `ProNom` varchar(30) NOT NULL,
  `CiuCod` char(3) NOT NULL,
  `ProDir` varchar(30) NOT NULL,
  `ProEma` varchar(35) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ProNdo`, `ProNit`, `ProNom`, `CiuCod`, `ProDir`, `ProEma`, `Estado`) VALUES
('00001', 1010, 'Distribuidora S.A.', '1', 'cr1 #34-98', 'distri@gmail.com', 'Activo'),
('10516932', 107, 'Santiago Osuna', '102', 'Cll 5 Cra 15', 'santiagoosuna@gmail.com', 'Activo'),
('10537683', 114, 'Miguel Correa', '102', 'Cll 37 No 12-07', 'miguelcorrea@gmail.com', 'Activo'),
('10539634', 105, 'Mario Cruz', '102', 'Cra 31 No 35', 'mariocruz@gmail.com', 'Activo'),
('34531725', 110, 'James Moreno', '103', 'Cll 14 No 24-63', 'jamesmoreno@gmail.com', 'Activo'),
('34532270', 108, 'Alejandra Camacho', '102', 'Cll 23 No 24-66', 'alejandracamacho@gmail.com', 'Activo'),
('42870562', 112, 'Duvan Benites', '103', 'Cll 10 No 46-45', 'duvanbenites@gmail.com', 'Activo'),
('75076432', 113, 'David Duque', '108', 'Cll 13 No 45-32', 'davidduque@gmail.com', 'Activo'),
('76305729', 111, 'Viviana Rodriguez', '107', 'Av 8 No 35b', 'vivianarodriguez@gmail.com', 'Activo'),
('76307332', 106, 'Dayana Velez', '102', 'Trans 22-07', 'dayanavelez@gmail.com', 'Activo'),
('76323459', 109, 'Brayan Vidal', '102', 'Cll 13a 18a09 ', 'brayanvidal@gmail.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `Id` int(11) NOT NULL,
  `Documento` char(11) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Id`, `Documento`, `Clave`, `Nombre`, `Estado`, `Tipo`) VALUES
(1, '1010107814', '123456', 'JohanC', 'Activo', 1),
(17, '51555555', '51555', 'Lao', 'Activo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `RepId` int(11) NOT NULL,
  `EmpNdo` char(11) NOT NULL,
  `RepFec` date NOT NULL,
  `RepMor` varchar(80) NOT NULL,
  `RepDes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`RepId`, `EmpNdo`, `RepFec`, `RepMor`, `RepDes`) VALUES
(1, '1128475566', '2018-11-27', 'cuentas pendientes por pagar', 'el reporte se vencera el proximo 27/11/2019'),
(2, '43616779', '2018-11-20', 'cuentas pendientes por pagar', 'el reporte se vencera el proximo 20/11/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `RolId` int(11) NOT NULL,
  `RolNom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`RolId`, `RolNom`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sublineaproducto`
--

CREATE TABLE `sublineaproducto` (
  `SLproId` int(11) NOT NULL,
  `SlproDes` varchar(70) NOT NULL,
  `LprID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sublineaproducto`
--

INSERT INTO `sublineaproducto` (`SLproId`, `SlproDes`, `LprID`) VALUES
(1, 'Tubos', 1),
(2, 'Mangueras', 2),
(4, 'Cables\r\n', 1),
(5, 'Martillos', 1),
(6, 'LLaves', 2),
(7, 'Serruchos', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonocliente`
--

CREATE TABLE `telefonocliente` (
  `TelCliNum` char(11) NOT NULL,
  `CliNdo` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonocliente`
--

INSERT INTO `telefonocliente` (`TelCliNum`, `CliNdo`) VALUES
('3156571232', '00001'),
('5228712', '00001'),
('3334563', '1101435463'),
('7658955', '1102435234'),
('6665437', '1106374562'),
('6578876', '1107529478'),
('3277685', '1107529643'),
('5646557', '1108456372'),
('3225643', '1109801702'),
('5435466', '1116757432'),
('9096754', '6645437789'),
('6549985', '6669074324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoempleado`
--

CREATE TABLE `telefonoempleado` (
  `TelEmpNum` char(11) NOT NULL,
  `EmpNdo` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonoempleado`
--

INSERT INTO `telefonoempleado` (`TelEmpNum`, `EmpNdo`) VALUES
('3177964423', '1017152334'),
('3185468753', '1128387054'),
('3226574433', '1128475566'),
('3155438765', '1152185625'),
('3146547689', '32205026'),
('3214564457', '43081586'),
('3115367734', '43536415'),
('3112349086', '43616779'),
('3106340263', '43756174'),
('3124567341', '70661470'),
('3126921551', '761209128');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoproveedor`
--

CREATE TABLE `telefonoproveedor` (
  `TelProNum` char(11) NOT NULL,
  `ProNdo` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonoproveedor`
--

INSERT INTO `telefonoproveedor` (`TelProNum`, `ProNdo`) VALUES
('3179827642', '00001'),
('3197620909', '00001'),
('3456786576', '10516932'),
('7767546', '10516932'),
('6347374', '10537683'),
('3427654', '10539634'),
('6574854', '34531725'),
('6578835', '34532270'),
('3036574', '42870562'),
('7706574', '75076432'),
('9096547', '76305729'),
('5468347', '76307332'),
('7658843', '76323459');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentidad`
--

CREATE TABLE `tipoidentidad` (
  `TideId` int(11) NOT NULL,
  `TidDes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoidentidad`
--

INSERT INTO `tipoidentidad` (`TideId`, `TidDes`) VALUES
(1, 'C.C'),
(2, 'T.I.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`ArtCod`),
  ADD KEY `sublineaproducto` (`SLproId`),
  ADD KEY `proveedores` (`ProNdo`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`IdAuditoria`);

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`BarId`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`CajCod`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`CarId`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`CiuCod`,`CodDpt`) USING BTREE,
  ADD KEY `departamento` (`CodDpt`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CliNdo`),
  ADD KEY `tipoidentidad` (`TideId`),
  ADD KEY `barrio` (`BarId`),
  ADD KEY `ciudad` (`CiuCod`),
  ADD KEY `rol` (`RolId`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodDpt`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`DveId`),
  ADD KEY `articulo` (`DveCod`),
  ADD KEY `factura` (`DveId`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EmpNdo`),
  ADD KEY `rol` (`RolId`),
  ADD KEY `tipoidentidad` (`TideId`),
  ADD KEY `cargos` (`CarId`),
  ADD KEY `horariolaboral` (`HlaId`),
  ADD KEY `caja` (`CajCod`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`FacCod`),
  ADD KEY `caja` (`CajCod`),
  ADD KEY `cliente` (`CliNdo`),
  ADD KEY `empleados` (`EmpNdo`);

--
-- Indices de la tabla `horariolaboral`
--
ALTER TABLE `horariolaboral`
  ADD PRIMARY KEY (`HlaId`);

--
-- Indices de la tabla `lineaproducto`
--
ALTER TABLE `lineaproducto`
  ADD PRIMARY KEY (`LprID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProNdo`),
  ADD KEY `ciudad` (`CiuCod`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`RepId`),
  ADD KEY `empleados` (`EmpNdo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`RolId`);

--
-- Indices de la tabla `sublineaproducto`
--
ALTER TABLE `sublineaproducto`
  ADD PRIMARY KEY (`SLproId`),
  ADD KEY `lineaproducto` (`LprID`);

--
-- Indices de la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD PRIMARY KEY (`TelCliNum`),
  ADD KEY `cliente` (`CliNdo`);

--
-- Indices de la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD PRIMARY KEY (`TelEmpNum`),
  ADD KEY `empleados` (`EmpNdo`);

--
-- Indices de la tabla `telefonoproveedor`
--
ALTER TABLE `telefonoproveedor`
  ADD PRIMARY KEY (`TelProNum`),
  ADD KEY `proveedores` (`ProNdo`);

--
-- Indices de la tabla `tipoidentidad`
--
ALTER TABLE `tipoidentidad`
  ADD PRIMARY KEY (`TideId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `ArtCod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `IdAuditoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `CajCod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `CarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `FacCod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `horariolaboral`
--
ALTER TABLE `horariolaboral`
  MODIFY `HlaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lineaproducto`
--
ALTER TABLE `lineaproducto`
  MODIFY `LprID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `RepId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `RolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sublineaproducto`
--
ALTER TABLE `sublineaproducto`
  MODIFY `SLproId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoidentidad`
--
ALTER TABLE `tipoidentidad`
  MODIFY `TideId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`SLproId`) REFERENCES `sublineaproducto` (`SLproId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`ProNdo`) REFERENCES `proveedores` (`ProNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`CodDpt`) REFERENCES `departamento` (`CodDpt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`TideId`) REFERENCES `tipoidentidad` (`TideId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`BarId`) REFERENCES `barrio` (`BarId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`CiuCod`) REFERENCES `ciudad` (`CiuCod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_ibfk_4` FOREIGN KEY (`RolId`) REFERENCES `rol` (`RolId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`DveCod`) REFERENCES `articulo` (`ArtCod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`DveId`) REFERENCES `factura` (`FacCod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`RolId`) REFERENCES `rol` (`RolId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`TideId`) REFERENCES `tipoidentidad` (`TideId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`CarId`) REFERENCES `cargos` (`CarId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`HlaId`) REFERENCES `horariolaboral` (`HlaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleados_ibfk_5` FOREIGN KEY (`CajCod`) REFERENCES `caja` (`CajCod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`CajCod`) REFERENCES `caja` (`CajCod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`CliNdo`) REFERENCES `cliente` (`CliNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`EmpNdo`) REFERENCES `empleados` (`EmpNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`CiuCod`) REFERENCES `ciudad` (`CiuCod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`EmpNdo`) REFERENCES `empleados` (`EmpNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sublineaproducto`
--
ALTER TABLE `sublineaproducto`
  ADD CONSTRAINT `sublineaproducto_ibfk_1` FOREIGN KEY (`LprID`) REFERENCES `lineaproducto` (`LprID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD CONSTRAINT `telefonocliente_ibfk_1` FOREIGN KEY (`CliNdo`) REFERENCES `cliente` (`CliNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD CONSTRAINT `telefonoempleado_ibfk_1` FOREIGN KEY (`EmpNdo`) REFERENCES `empleados` (`EmpNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefonoproveedor`
--
ALTER TABLE `telefonoproveedor`
  ADD CONSTRAINT `telefonoproveedor_ibfk_1` FOREIGN KEY (`ProNdo`) REFERENCES `proveedores` (`ProNdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
