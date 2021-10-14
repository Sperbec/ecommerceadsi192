-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 22:38:45
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

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
(1, 17, 2000.00, 'tubo PBC1', '00001', 1, 'Inactivo', ''),
(2, 17, 2000.00, 'tubo PBC2', '00001', 1, 'Inactivo', ''),
(3, 17, 2000.00, 'tubo PBC 3', '00001', 1, 'Inactivo', ''),
(4, 100, 1000.00, 'Koalas del Himalaya', '00001', 1, 'Activo', 'Koala.jpg'),
(5, 8, 2323.00, 'Flores del jardÃ­n', '00001', 1, 'Activo', 'Tulips.jpg'),
(6, 56, 100.00, 'Pinguinos de asia', '00001', 1, 'Activo', 'Penguins.jpg'),
(7, 76, 89000.00, 'Meteroritos del espacio', '00001', 1, 'Activo', 'Jellyfish.jpg'),
(8, 89, 10000.00, 'Casa de pepe', '00001', 1, 'Activo', 'Lighthouse.jpg'),
(9, 2, 5400.00, 'CaÃ±ones del desierto ', '00001', 1, 'Activo', 'Desert.jpg'),
(10, 23, 1000.00, 'Eucalito navideÃ±o', '00001', 1, 'Activo', 'noticia-beneficios-de-la-hoja-de-coca.jpg'),
(11, 67, 20.00, 'Juan carlos hembra', '00001', 1, 'Activo', 'descarga.jpg');

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
(1, 'Jefe', 'Pendiente de los empleados'),
(2, 'Empleado', 'Estar Pendiente del producto');

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
('1', 'cali', '1'),
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
('00001', 1, 1, 'Luisa', ' Dim 3', 'F', '2018-11-11', 'calle 56', 'luisa@gmail.com', '2', '1', 'Activo');

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
(1, 1, 5.00, 500.00, 5000.00);

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
('761209128', 'emanuel', 2, 'F', 1, 2, 1, 1, 'colinas del sur', 'Activo');

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
(1, '2018-11-24', 12736, 1, '00001', '761209128', 'Activo');

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
(1, '0800', '1600', 'Escoja este'),
(2, '1400', '2200', 'Nocturno');

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
(1, 'Ferreteria'),
(2, 'Hogar'),
(3, 'hola'),
(4, 'hola2');

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
('00001', 1010, 'Distribuidora S.A.', '1', 'cr1', 'distr@gmail.com', 'Activo');

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
(2, '1192761341', 'tiago', 'santiago velasco', 'Activo', 1);

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
(1, 'tobos', 1),
(2, 'manguera', 2);

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
('5228712', '00001');

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
('3197620909', '00001');

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
(1, 'Cedula de '),
(2, 'Tarjeta de'),
(3, 'Cedula'),
(4, 'T.I');

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
  MODIFY `ArtCod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `CarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `FacCod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horariolaboral`
--
ALTER TABLE `horariolaboral`
  MODIFY `HlaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lineaproducto`
--
ALTER TABLE `lineaproducto`
  MODIFY `LprID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `RepId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `RolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sublineaproducto`
--
ALTER TABLE `sublineaproducto`
  MODIFY `SLproId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoidentidad`
--
ALTER TABLE `tipoidentidad`
  MODIFY `TideId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
