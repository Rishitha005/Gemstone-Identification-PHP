-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemstone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gemstones`
--

CREATE TABLE `gemstones` (
  `Gemstone` varchar(20) DEFAULT NULL,
  `Refractive_Index_Start` double DEFAULT NULL,
  `Refractive_Index_End` double DEFAULT NULL,
  `DRefraction_Start` double DEFAULT NULL,
  `DRefraction_End` double DEFAULT NULL,
  `Density_Start` double DEFAULT NULL,
  `Density_End` double DEFAULT NULL,
  `Hardness_Start` double DEFAULT NULL,
  `Hardness_End` double DEFAULT NULL,
  `Colors` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gemstones`
--

INSERT INTO `gemstones` (`Gemstone`, `Refractive_Index_Start`, `Refractive_Index_End`, `DRefraction_Start`, `DRefraction_End`, `Density_Start`, `Density_End`, `Hardness_Start`, `Hardness_End`, `Colors`) VALUES
('Hematite', 2.94, 3.22, 0.287, 0.287, 5.12, 5.28, 5.5, 6.5, 'Red'),
('Cinnabar', 2.91, 2.905, 0.351, 0.351, 8, 8.2, 2, 2.5, 'Green'),
('Proustite', 2.881, 3.084, 0.203, 0.203, 5.51, 5.64, 2.5, 2.5, 'Pink'),
('Pyrargyrite', 2.88, 2.88, 0.2, 0.2, 5.85, 5.85, 2.5, 3, 'Colorless'),
('Cuprite', 2.849, 2.849, 0, 0, 5.85, 6.15, 3.5, 4, 'Purple'),
('Rutile', 2.616, 2.903, 0.287, 0.287, 4.2, 4.3, 6, 6.5, 'Blue'),
('Brookite', 2.616, 2.903, 0.117, 0.117, 4.08, 4.18, 5.5, 6, 'Colorless'),
('Anatase', 2.488, 2.564, 0.046, 0.067, 3.82, 3.97, 5.5, 6, 'Blue'),
('Diamond', 2.417, 2.419, 0, 0, 3.5, 3.53, 10, 10, 'Colorless');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
