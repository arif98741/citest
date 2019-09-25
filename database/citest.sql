-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 03:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `serial` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`serial`, `customer_id`, `customer_name`, `address`, `contact_no`, `email`, `discount`) VALUES
(1, '1250', 'Ariful Islam', 'Dhaka, Bangladesh', '01750840217', 'arif@gmail.com', 0),
(2, '12345', 'Kamrul islam', 'Elenga , Tangail', '01733499574', 'arif@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `updateby` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`groupid`, `groupname`, `updateby`) VALUES
(1, 'Book', NULL),
(2, 'Garments', NULL),
(3, 'T-shirt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `serial` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_discount` float(8,2) NOT NULL DEFAULT '0.00',
  `invoice_tax` float(8,2) NOT NULL,
  `invoice_paid` float(8,2) DEFAULT NULL,
  `invoice_due` float(8,2) DEFAULT NULL,
  `invoice_grand_total` float(8,2) NOT NULL,
  `invoice_total` float(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`serial`, `invoice_number`, `customer_id`, `quantity`, `invoice_discount`, `invoice_tax`, `invoice_paid`, `invoice_due`, `invoice_grand_total`, `invoice_total`, `date`, `status`) VALUES
(3, '000001', 1, 623, 0.00, 0.00, 0.00, 567.00, 7121.66, 65757.00, '2019-09-24 21:30:59', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_products`
--

CREATE TABLE `tbl_invoice_products` (
  `serial_no` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) DEFAULT NULL,
  `discount` float(10,2) NOT NULL DEFAULT '0.00',
  `total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_products`
--

INSERT INTO `tbl_invoice_products` (`serial_no`, `invoice_number`, `product_id`, `quantity`, `price`, `discount`, `total`) VALUES
(1, '000001', '11', 567, 12.50, 657.00, 5708.50),
(2, '000001', '12', 56, 25.36, 7.00, 1413.16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `serial` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `sale_price` double NOT NULL DEFAULT '0',
  `purchase_price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`serial`, `product_id`, `product_name`, `sale_price`, `purchase_price`) VALUES
(7, '11', 'First Pro', 12.5, 200),
(8, '12', 'Second Pro', 25.36, 220),
(9, '13', 'Third PRo', 65.84, 450);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell`
--

CREATE TABLE `tbl_sell` (
  `serial` int(11) NOT NULL,
  `sell_id` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `dlcharge` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `grand_total` float NOT NULL,
  `paid` float NOT NULL,
  `payable` float(10,2) NOT NULL,
  `due` float NOT NULL,
  `previous_balance` float(8,2) NOT NULL,
  `status` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sell`
--

INSERT INTO `tbl_sell` (`serial`, `sell_id`, `customer_id`, `seller`, `sub_total`, `dlcharge`, `discount`, `vat`, `grand_total`, `paid`, `payable`, `due`, `previous_balance`, `status`, `date`, `updateby`) VALUES
(1, '1904280001', 1250, 1, 16250, 0, 0, 0, 16250, 1000, 16250.00, 15250, 12500.00, 0, '2019-04-27 21:06:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell_products`
--

CREATE TABLE `tbl_sell_products` (
  `serial_no` int(11) NOT NULL,
  `sell_id` varchar(20) NOT NULL,
  `product_serial` varchar(10) DEFAULT NULL,
  `customer_id` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `product_piece` int(5) DEFAULT NULL,
  `unit_price` double NOT NULL,
  `purchase_price` double(8,2) NOT NULL,
  `discount` varchar(5) NOT NULL DEFAULT 'null',
  `warranty_expire` date DEFAULT NULL,
  `subtotal` double NOT NULL,
  `updateby` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sell_products`
--

INSERT INTO `tbl_sell_products` (`serial_no`, `sell_id`, `product_serial`, `customer_id`, `product_id`, `quantity`, `product_piece`, `unit_price`, `purchase_price`, `discount`, `warranty_expire`, `subtotal`, `updateby`, `status`) VALUES
(1, '1904280001', '65', 1250, 125, 5, NULL, 250, 200.00, 'null', '2019-05-05', 1250, '1', 1),
(2, '1904280001', '456', 1250, 222, 6, NULL, 2500, 230.00, 'null', '2019-06-12', 15000, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `tbl_invoice_products`
--
ALTER TABLE `tbl_invoice_products`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `tbl_sell`
--
ALTER TABLE `tbl_sell`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `tbl_sell_products`
--
ALTER TABLE `tbl_sell_products`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_invoice_products`
--
ALTER TABLE `tbl_invoice_products`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sell`
--
ALTER TABLE `tbl_sell`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sell_products`
--
ALTER TABLE `tbl_sell_products`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
