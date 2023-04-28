-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 02:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

--
-- Table structure for table `user`
--



CREATE TABLE `user` (
  `IDnum` int AUTO_INCREMENT PRIMARY KEY,
  `Name` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDnum`, `Name`, `Category`, `Password`, `date_added`, `date_updated`) VALUES
('03261', 'Reign Yumang', 'admin', 'admin','2022-12-20 14:02:37', '2022-12-20 14:02:37'),
('03262', 'Reign Yumang', 'owner', 'admin','2022-12-20 14:02:37', '2022-12-20 14:02:37'),
('03263', 'Reign Yumang', 'employee', 'admin','2022-12-20 14:02:37', '2022-12-30 09:20:26');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
