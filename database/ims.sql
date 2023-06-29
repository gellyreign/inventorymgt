-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 11:29 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `sno` int(11) NOT NULL,
  `QRnum` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `cost_price` varchar(50) NOT NULL,
  `selling_price` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prescribe` varchar(255) NOT NULL,
  `supplier` varchar(40) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `exp_date` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`sno`, `QRnum`, `name`, `stock`, `quantity`, `cost_price`, `selling_price`, `description`, `prescribe`, `supplier`, `date`, `exp_date`, `image`) VALUES
(308, 0, 'Biogesic ', 25, '20', '5', '10', '500grams', 'Adult', 'Paracetamol', '2023-06-16', '2025-06-17', 'bg.png'),
(307, 0, 'Tiki-Tiki', 25, '20', '200', '250', '120ml', 'Child', 'Unilab', '2024-06-16', '2030-06-25', 'tikitiki.png'),
(312, 0, 'Bioflu', 25, '18', '10', '15', '500mg tablet', 'Adult', 'Unilab', '2023-06-17', '2028-10-06', 'bf.png'),
(311, 0, 'Neozep', 25, '20', '10', '12', '10mg/2mg/500mg tablet', 'Adult', 'Unilab', '2023-06-17', '2030-06-17', 'neozep.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `notif`
-- (See below for the actual view)
--
CREATE TABLE `notif` (
`supplier` varchar(40)
,`sno` int(11)
,`name` varchar(50)
,`exp_date` varchar(20)
,`message` varchar(99)
);

-- --------------------------------------------------------

--
-- Table structure for table `rec_list`
--

CREATE TABLE `rec_list` (
  `ID` int(11) NOT NULL,
  `tno` varchar(255) NOT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pics` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `tcost` varchar(255) NOT NULL,
  `dte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rec_list`
--

INSERT INTO `rec_list` (`ID`, `tno`, `sn`, `brand`, `description`, `pics`, `quantity`, `cost`, `tcost`, `dte`) VALUES
(2, 'P-0000002', '308', 'Paracetamol', '500grams', 'Biogesic', '5', '10', '5', '2023-04-18'),
(3, 'P-0000003', '307', 'Unilab', '120ml', 'Tiki-Tiki', '5', '250', '1', '2023-04-18'),
(4, 'P-0000004', '312', 'Unilab', '500mg tablet', 'Bioflu', '3', '15', '4', '2023-05-18'),
(5, 'P-0000004', '312', 'Unilab', '500mg tablet', 'Bioflu', '3', '15', '4', '2023-05-18'),
(6, 'P-0000006', '312', 'Unilab', '500mg tablet', 'Bioflu', '1', '15', '1', '2023-06-18'),
(7, 'P-0000007', '311', 'Unilab', '10mg/2mg/500mg tablet', 'Neozep', '5', '12', '6', '2023-06-18');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rp_view`
-- (See below for the actual view)
--
CREATE TABLE `rp_view` (
`stock` int(11)
,`capital` double
,`income` double
,`rs` double
,`cptl` double
,`sold` double
,`cp` varchar(50)
,`sp` varchar(20)
,`revenue` double
,`ID` int(11)
,`sn` varchar(255)
,`ordr` varchar(255)
,`name` varchar(255)
,`brand` varchar(255)
,`quantity` varchar(255)
,`tcost` varchar(255)
,`dte` date
,`mnth` varchar(9)
,`yr` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_tbl`
--

CREATE TABLE `transfer_tbl` (
  `ID` int(11) NOT NULL,
  `tno` varchar(255) DEFAULT NULL,
  `tfrom` varchar(255) DEFAULT NULL,
  `tfpos` varchar(255) DEFAULT NULL,
  `office` varchar(255) NOT NULL,
  `tto` varchar(255) DEFAULT NULL,
  `ttopos` varchar(255) DEFAULT NULL,
  `sector` varchar(255) NOT NULL,
  `dte` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `quantity` int(50) NOT NULL,
  `tcost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_tbl`
--

INSERT INTO `transfer_tbl` (`ID`, `tno`, `tfrom`, `tfpos`, `office`, `tto`, `ttopos`, `sector`, `dte`, `status`, `quantity`, `tcost`) VALUES
(2, 'P-0000002', 'Juan', '1992-03-25', '---', 'Dela Cruz', '---', 'Manila', '2023-04-18', 1, 0, '50.00'),
(3, 'P-0000003', 'Joaquin', '2000-06-25', '---', 'Dimaguiba', '---', 'Manila', '2023-04-18', 1, 0, '1250.00'),
(4, 'P-0000004', 'Gerald', '2001-08-22', '---', 'Napoles', '---', 'Manila', '2023-05-18', 1, 0, '45.00'),
(5, 'P-0000004', 'Gerald', '2001-08-22', '---', 'Napoles', '---', 'Manila', '2023-05-18', 1, 0, '45.00'),
(6, 'P-0000006', 'Ben', '1990-05-02', '---', 'Lazaro', '---', 'Manila', '2023-06-18', 1, 0, '15.00'),
(7, 'P-0000007', 'Kevin', '1998-04-28', '---', 'Levin', '---', 'Manila', '2023-06-18', 1, 0, '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDnum` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `uname` varchar(50) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Activate',
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDnum`, `fname`, `lname`, `mid`, `Category`, `uname`, `Password`, `status`, `date_added`) VALUES
(3273, 'Reign', 'Yumang', '--', 'Owner', 'owner', 'owner', 'Activate', '2023-06-18'),
(3274, 'Karlo', 'Nachor', '--', 'Admin', 'admin', 'admin', 'Activate', '2023-06-18'),
(3275, 'Lyka', 'Lucas', '--', 'Cashier', 'cashier', 'cashier', 'Activate', '2023-06-18'),
(3276, 'Marivic', 'Ramos', '--', 'Employee', 'employee', 'employee', 'Activate', '2023-06-18');

-- --------------------------------------------------------

--
-- Structure for view `notif`
--
DROP TABLE IF EXISTS `notif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notif`  AS SELECT `items`.`supplier` AS `supplier`, `items`.`sno` AS `sno`, `items`.`name` AS `name`, `items`.`exp_date` AS `exp_date`, CASE WHEN `items`.`exp_date` <= curdate() - interval 30 day THEN concat('Product ',`items`.`name`,' is expiring within 30 days') WHEN `items`.`exp_date` <= curdate() - interval 30 day AND `items`.`quantity` <= 9 THEN concat('Product ',`items`.`name`,' is Expiring Soon And Almost out of stock') WHEN `items`.`quantity` <= 9 THEN concat('Product ',`items`.`name`,' is Almost out of stock') WHEN `items`.`quantity` = 0 THEN concat('Product ',`items`.`name`,' is out of stock') WHEN `items`.`exp_date` <= curdate() THEN concat('Product ',`items`.`name`,' is expired') END AS `message` FROM `items` ;

-- --------------------------------------------------------

--
-- Structure for view `rp_view`
--
DROP TABLE IF EXISTS `rp_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rp_view`  AS SELECT `items`.`stock` AS `stock`, `items`.`selling_price`- `items`.`cost_price` AS `capital`, (`items`.`selling_price` - `items`.`cost_price`) * sum(`rec_list`.`quantity`) AS `income`, `items`.`stock`- `rec_list`.`quantity` AS `rs`, (`items`.`stock` - `items`.`quantity`) * `items`.`cost_price` AS `cptl`, sum(`rec_list`.`quantity`) AS `sold`, `items`.`cost_price` AS `cp`, `items`.`selling_price` AS `sp`, (`items`.`stock` - `items`.`quantity`) * `items`.`selling_price` AS `revenue`, `rec_list`.`ID` AS `ID`, `rec_list`.`sn` AS `sn`, `rec_list`.`tno` AS `ordr`, `rec_list`.`pics` AS `name`, `rec_list`.`brand` AS `brand`, `rec_list`.`quantity` AS `quantity`, `rec_list`.`tcost` AS `tcost`, `rec_list`.`dte` AS `dte`, monthname(`rec_list`.`dte`) AS `mnth`, year(`rec_list`.`dte`) AS `yr` FROM (`items` join `rec_list` on(`items`.`sno` = `rec_list`.`sn`)) GROUP BY `rec_list`.`dte`, `rec_list`.`sn` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `rec_list`
--
ALTER TABLE `rec_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transfer_tbl`
--
ALTER TABLE `transfer_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `rec_list`
--
ALTER TABLE `rec_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer_tbl`
--
ALTER TABLE `transfer_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3277;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
