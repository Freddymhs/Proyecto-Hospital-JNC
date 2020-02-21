-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 08:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `computador`
--

CREATE TABLE `computador` (
  `SERIALCOMPUTADOR` char(100) NOT NULL,
  `MODELOCOMP` char(100) DEFAULT NULL,
  `NETBIOS` char(60) DEFAULT NULL,
  `DIRECCIONMAC` char(60) DEFAULT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL,
  `FINARRIENDOPC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `computadormodelo`
--

CREATE TABLE `computadormodelo` (
  `MODELOCOMP` char(100) NOT NULL,
  `DISCODUROPRIM` char(60) DEFAULT NULL,
  `DISCODUROSEC` char(60) DEFAULT NULL,
  `PROCESADOR` char(60) DEFAULT NULL,
  `MEMORIARAM` char(60) DEFAULT NULL,
  `SO` char(60) DEFAULT NULL,
  `MARCA` char(60) DEFAULT NULL,
  `IMAGEN` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `RUT` char(100) NOT NULL,
  `NOMBREROL` char(100) DEFAULT NULL,
  `NOMBRES` char(60) DEFAULT NULL,
  `PASSWORD` char(60) DEFAULT NULL,
  `CORREOELECTRONICO` char(60) DEFAULT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`RUT`, `NOMBREROL`, `NOMBRES`, `PASSWORD`, `CORREOELECTRONICO`, `DISPONIBILIDAD`) VALUES
('140280933', 'superadmin', 'Pablo Leiva Gajardo', '140280933', 'pablo.leiva@hjnc.cl', 1),
('183140159', 'superadmin', 'Freddy Marcos Huaylla Silvestre', 'sup', 'fmarcosdev@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historial_modificacion`
--

CREATE TABLE `historial_modificacion` (
  `ID_MODIFICACION` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `impresora`
--

CREATE TABLE `impresora` (
  `SERIALIMPRESORA` char(100) NOT NULL,
  `MODELOIMP` char(100) DEFAULT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL,
  `FINARRIENDOIMP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `impresoramodelo`
--

CREATE TABLE `impresoramodelo` (
  `MODELOIMP` char(100) NOT NULL,
  `TIPOFUNCIONALIDADES` char(60) DEFAULT NULL,
  `DURABILIDAD` char(60) DEFAULT NULL,
  `MARCA` char(60) DEFAULT NULL,
  `IMAGEN` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventario_soporte_hjnc`
--

CREATE TABLE `inventario_soporte_hjnc` (
  `ID_INVENTARIO` int(100) NOT NULL,
  `SERIALCOMPUTADOR` char(100) DEFAULT NULL,
  `NOMBREUNIDAD` char(100) DEFAULT NULL,
  `RUT` char(100) DEFAULT NULL,
  `SERIALIMPRESORA` char(100) DEFAULT NULL,
  `NROANEXO` char(60) DEFAULT NULL,
  `SERIALUPS` char(100) DEFAULT NULL,
  `SERIALMONITOR` char(100) DEFAULT NULL,
  `DIRECCIONIPV4` char(100) DEFAULT NULL,
  `DIRECCIONIPV6` char(100) DEFAULT NULL,
  `RED` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `SERIALMONITOR` char(100) NOT NULL,
  `MODELOMON` char(100) DEFAULT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL,
  `FINARRIENDOMONITOR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monitormodelo`
--

CREATE TABLE `monitormodelo` (
  `MODELOMON` char(100) NOT NULL,
  `TIPOFUNCIONALIDADES` char(60) DEFAULT NULL,
  `RESOLUCION` char(60) DEFAULT NULL,
  `PULGADAS` char(60) DEFAULT NULL,
  `MARCA` char(60) DEFAULT NULL,
  `DURABILIDAD` char(60) DEFAULT NULL,
  `IMAGEN` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `NOMBREROL` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`NOMBREROL`) VALUES
('admin'),
('basico'),
('superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE `telefono` (
  `NROANEXO` char(60) NOT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unidad`
--

CREATE TABLE `unidad` (
  `NOMBREUNIDAD` char(100) NOT NULL,
  `UBICACIONACTUAL` char(60) DEFAULT NULL,
  `UBICACIONANTERIOR` char(60) DEFAULT NULL,
  `ESPECIFICACION` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ups`
--

CREATE TABLE `ups` (
  `SERIALUPS` char(100) NOT NULL,
  `MODELOUPS` char(100) DEFAULT NULL,
  `DISPONIBILIDAD` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `upsmodelo`
--

CREATE TABLE `upsmodelo` (
  `MODELOUPS` char(100) NOT NULL,
  `CAPACIDAD` char(60) DEFAULT NULL,
  `TIPOFUNCIONALIDAD` char(60) DEFAULT NULL,
  `DURABILIDAD` char(60) DEFAULT NULL,
  `MARCA` char(60) DEFAULT NULL,
  `IMAGEN` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`SERIALCOMPUTADOR`),
  ADD KEY `FK_RELATIONSHIP_14` (`MODELOCOMP`);

--
-- Indexes for table `computadormodelo`
--
ALTER TABLE `computadormodelo`
  ADD PRIMARY KEY (`MODELOCOMP`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`RUT`),
  ADD KEY `FK_USA` (`NOMBREROL`);

--
-- Indexes for table `historial_modificacion`
--
ALTER TABLE `historial_modificacion`
  ADD PRIMARY KEY (`ID_MODIFICACION`);

--
-- Indexes for table `impresora`
--
ALTER TABLE `impresora`
  ADD PRIMARY KEY (`SERIALIMPRESORA`),
  ADD KEY `FK_RELATIONSHIP_13` (`MODELOIMP`);

--
-- Indexes for table `impresoramodelo`
--
ALTER TABLE `impresoramodelo`
  ADD PRIMARY KEY (`MODELOIMP`);

--
-- Indexes for table `inventario_soporte_hjnc`
--
ALTER TABLE `inventario_soporte_hjnc`
  ADD PRIMARY KEY (`ID_INVENTARIO`),
  ADD KEY `FK_RELATIONSHIP_11` (`NROANEXO`),
  ADD KEY `FK_RELATIONSHIP_12` (`RUT`),
  ADD KEY `FK_RELATIONSHIP_17` (`NOMBREUNIDAD`),
  ADD KEY `FK_RELATIONSHIP_18` (`SERIALCOMPUTADOR`),
  ADD KEY `FK_RELATIONSHIP_6` (`SERIALIMPRESORA`),
  ADD KEY `FK_RELATIONSHIP_8` (`SERIALMONITOR`),
  ADD KEY `FK_RESPONSABLE_INSERCION` (`SERIALUPS`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`SERIALMONITOR`),
  ADD KEY `FK_RELATIONSHIP_15` (`MODELOMON`);

--
-- Indexes for table `monitormodelo`
--
ALTER TABLE `monitormodelo`
  ADD PRIMARY KEY (`MODELOMON`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`NOMBREROL`);

--
-- Indexes for table `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`NROANEXO`);

--
-- Indexes for table `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`NOMBREUNIDAD`);

--
-- Indexes for table `ups`
--
ALTER TABLE `ups`
  ADD PRIMARY KEY (`SERIALUPS`),
  ADD KEY `FK_RELATIONSHIP_16` (`MODELOUPS`);

--
-- Indexes for table `upsmodelo`
--
ALTER TABLE `upsmodelo`
  ADD PRIMARY KEY (`MODELOUPS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventario_soporte_hjnc`
--
ALTER TABLE `inventario_soporte_hjnc`
  MODIFY `ID_INVENTARIO` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computador`
--
ALTER TABLE `computador`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`MODELOCOMP`) REFERENCES `computadormodelo` (`MODELOCOMP`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `FK_USA` FOREIGN KEY (`NOMBREROL`) REFERENCES `roles` (`NOMBREROL`);

--
-- Constraints for table `impresora`
--
ALTER TABLE `impresora`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`MODELOIMP`) REFERENCES `impresoramodelo` (`MODELOIMP`);

--
-- Constraints for table `inventario_soporte_hjnc`
--
ALTER TABLE `inventario_soporte_hjnc`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`NROANEXO`) REFERENCES `telefono` (`NROANEXO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`RUT`) REFERENCES `empleados` (`RUT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`NOMBREUNIDAD`) REFERENCES `unidad` (`NOMBREUNIDAD`),
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`SERIALCOMPUTADOR`) REFERENCES `computador` (`SERIALCOMPUTADOR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`SERIALIMPRESORA`) REFERENCES `impresora` (`SERIALIMPRESORA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`SERIALMONITOR`) REFERENCES `monitor` (`SERIALMONITOR`),
  ADD CONSTRAINT `FK_RESPONSABLE_INSERCION` FOREIGN KEY (`SERIALUPS`) REFERENCES `ups` (`SERIALUPS`);

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`MODELOMON`) REFERENCES `monitormodelo` (`MODELOMON`);

--
-- Constraints for table `ups`
--
ALTER TABLE `ups`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`MODELOUPS`) REFERENCES `upsmodelo` (`MODELOUPS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
