-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2021 at 02:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pot`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_s`
--

DROP TABLE IF EXISTS `car_s`;
CREATE TABLE IF NOT EXISTS `car_s` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_brand_ar` varchar(45) DEFAULT NULL,
  `car_brand_eng` varchar(45) DEFAULT NULL,
  `car_model_id` int(11) DEFAULT NULL,
  `car_model_ar` varchar(45) DEFAULT NULL,
  `car_model_eng` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_s`
--

INSERT INTO `car_s` (`car_id`, `car_brand_ar`, `car_brand_eng`, `car_model_id`, `car_model_ar`, `car_model_eng`) VALUES
(1, 'كورولا', 'corola', NULL, NULL, NULL),
(2, 'نيسان', 'Nissan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries_of_origin`
--

DROP TABLE IF EXISTS `countries_of_origin`;
CREATE TABLE IF NOT EXISTS `countries_of_origin` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name_ar` varchar(45) DEFAULT NULL,
  `country_name_en` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cus_invoice`
--

DROP TABLE IF EXISTS `cus_invoice`;
CREATE TABLE IF NOT EXISTS `cus_invoice` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci_date` date DEFAULT NULL,
  `ci_serial_num` varchar(45) DEFAULT NULL,
  `serial_ref` varchar(45) DEFAULT NULL,
  `ci_item_quan` int(11) DEFAULT NULL,
  `ci_total` float DEFAULT NULL,
  `ci_tax_id` int(11) DEFAULT NULL,
  `ci_due` float DEFAULT NULL,
  `ci_note` varchar(100) DEFAULT NULL,
  `ci_customer_id` varchar(45) DEFAULT NULL,
  `invoice_status` int(11) NOT NULL,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_invoice`
--

INSERT INTO `cus_invoice` (`ci_id`, `ci_date`, `ci_serial_num`, `serial_ref`, `ci_item_quan`, `ci_total`, `ci_tax_id`, `ci_due`, `ci_note`, `ci_customer_id`, `invoice_status`) VALUES
(2, '2021-08-27', 'PO112', NULL, 4, 1690, 46, 1690, NULL, 'علي', 0),
(3, '2021-08-03', 'PO112', NULL, 2, 1992, 1328, 1992, NULL, 'سشيبش', 0),
(4, '2020-10-09', 'PO112', NULL, 2, 760.92, 154, 760.92, NULL, 'ي', 0),
(5, '2021-08-15', 'PO112', NULL, 2, 493, 23, 493, NULL, 'علي محمود', 0),
(6, '2021-08-28', 'PO112', NULL, 3, 4067, 4067, 4067, NULL, 'طارق', 0),
(7, '2021-09-01', 'PO112', NULL, 3, 1508, 17763, 1508, NULL, 'محمود', 0),
(8, '2021-08-31', 'PO112', NULL, 1, 910, 910, 910, NULL, 'tarek', 0),
(9, '2021-08-31', 'PO112', NULL, 1, 154.27, 154, 154.27, NULL, 'tarek', 0),
(10, '2021-08-31', 'PO112', NULL, 1, 1819.95, 2760, 1819.95, NULL, 'sarea', 0),
(11, '2021-08-31', 'PO112', NULL, 1, 488, 488, 488, NULL, 'mustafa', 0),
(12, '2021-08-31', 'PO21083100904', NULL, 1, 455, 699, 455, NULL, 'da', 0),
(13, '2021-08-31', 'PO21083101005', NULL, 2, 1237.41, 1237, 1237.41, NULL, 'test', 0),
(14, '2021-09-01', 'PO21090100000', NULL, 2, 2914.6, 2915, 2914.6, NULL, 'فادي', 0),
(15, '2021-09-01', 'PO21090100101', NULL, 2, 800, 800, 800, NULL, 'فوزي', 0),
(16, '2021-09-01', 'PO21090100303', NULL, 2, 2339.64, 2340, 2339.64, NULL, 'سعودي', 0),
(17, '2021-09-01', 'PO21090100505', NULL, 2, 493, 493, 493, NULL, 'tsts', 0),
(18, '2021-09-01', 'PO21090100606', NULL, 3, 583.83, 584, 583.83, NULL, 'ali', 0),
(19, '2021-09-01', 'PO21090100707', NULL, 2, 499.27, 499, 499.27, NULL, 'ببب', 0),
(20, '2021-09-01', 'SI21090100808', NULL, 1, 23, 23, 23, NULL, 'daf', 0),
(21, '2021-09-01', 'SI21090100909', NULL, 2, 398.27, 244, 398.27, NULL, 'بيشب', 0),
(22, '2021-09-02', 'SI21090201001', NULL, 2, 855, 910, 855, NULL, 'tafdaf', 0),
(23, '2021-09-03', 'SI21090201102', NULL, 2, 917.81, 1683, 917.81, NULL, 'tah', 0),
(24, '2021-09-02', 'SI21090201203', NULL, 2, 177.27, 177, 177.27, NULL, 'سعودي', 0),
(25, '2021-09-02', 'SI21090201304', NULL, 2, 478, 478, 478, NULL, 'شس', 0),
(26, '2021-09-03', 'SI21090301402', NULL, 2, 800, 800, 800, NULL, 'ttt', 0),
(27, '2021-09-03', 'SI21090301503', NULL, 2, 687, 687, 687, NULL, 'dfaf', 0),
(28, '2021-08-03', 'SI21090301604', NULL, 1, 23, 23, 23, NULL, 'fff', 0),
(29, '2021-09-08', 'SI21090801601', NULL, 2, 687, 687, 687, NULL, '3d', 0),
(30, '2021-09-17', 'SI21091701701', NULL, 1, 154.27, 154, 154.27, NULL, 'fazz', 0),
(31, '2021-09-02', 'SI21101300201', NULL, 2, 0, 0, 0, NULL, 'شس', 0),
(32, '2021-10-20', 'SI21102000201', NULL, 2, 690, 690, 690, NULL, 'محسن', 0),
(33, '2021-11-05', 'SI21110500101', 'SI21102000201', 1, 240, 0, 240, NULL, NULL, 1),
(34, '2021-11-05', 'SI21110500202', NULL, 1, 455, 455, 455, NULL, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cus_items`
--

DROP TABLE IF EXISTS `cus_items`;
CREATE TABLE IF NOT EXISTS `cus_items` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_item_id` int(11) DEFAULT NULL,
  `cus_item_quantity` int(11) DEFAULT NULL,
  `cus_unit_price` float DEFAULT NULL,
  `cus_discount` int(11) DEFAULT NULL,
  `cus_invoice_id` int(11) DEFAULT NULL,
  `is_refund` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_items`
--

INSERT INTO `cus_items` (`cus_id`, `cus_item_id`, `cus_item_quantity`, `cus_unit_price`, `cus_discount`, `cus_invoice_id`, `is_refund`) VALUES
(1, 3, 2, 23, NULL, 1, 0),
(2, 3, 2, 23, NULL, 2, 0),
(3, 6, 2, 664, NULL, 3, 0),
(4, 3, 1, 23, NULL, 5, 0),
(5, 3, 2, 23, NULL, 6, 0),
(6, 5, 3, 455, NULL, 6, 0),
(9, 2, 1, 154, NULL, 7, 0),
(10, 6, 1, 664, NULL, 7, 0),
(16, 11, 2, 345, NULL, 7, 0),
(18, 4, 2, 244, NULL, 2, 0),
(19, 12, 3, 252, NULL, 2, 0),
(20, 10, 2, 200, NULL, 2, 0),
(21, 13, 1, 470, NULL, 5, 0),
(22, 6, 1, 664, NULL, 3, 0),
(23, 5, 2, 455, NULL, 8, 0),
(24, 2, 1, 154.27, NULL, 9, 0),
(25, 20, 3, 606.65, NULL, 10, 0),
(27, 4, 2, 244, NULL, 11, 0),
(28, 5, 1, 455, NULL, 12, 0),
(30, 6, 1, 664, NULL, 13, 0),
(31, 21, 1, 573.41, NULL, 13, 0),
(32, 4, 2, 244, NULL, 14, 0),
(33, 20, 4, 606.65, NULL, 14, 0),
(34, 5, 1, 455, NULL, 15, 0),
(35, 18, 1, 345, NULL, 15, 0),
(36, 3, 2, 23, NULL, 16, 0),
(37, 21, 4, 573.41, NULL, 16, 0),
(38, 2, 1, 154.27, NULL, 4, 0),
(39, 20, 1, 606.65, NULL, 4, 0),
(40, 3, 1, 23, NULL, 17, 0),
(41, 13, 1, 470, NULL, 17, 0),
(42, 4, 1, 244, NULL, 18, 0),
(43, 1, 1, 185.56, NULL, 18, 0),
(44, 2, 1, 154.27, NULL, 18, 0),
(45, 2, 1, 154.27, NULL, 19, 0),
(46, 11, 1, 345, NULL, 19, 0),
(47, 3, 1, 23, NULL, 20, 0),
(48, 4, 1, 244, NULL, 21, 0),
(49, 5, 1, 455, NULL, 22, 0),
(51, 10, 2, 200, NULL, 22, 0),
(52, 2, 1, 154.27, NULL, 21, 0),
(53, 2, 3, 154.27, NULL, 23, 0),
(55, 3, 1, 23, NULL, 24, 0),
(56, 2, 1, 154.27, NULL, 24, 0),
(57, 3, 1, 23, NULL, 25, 0),
(58, 5, 1, 455, NULL, 25, 0),
(59, 5, 1, 455, NULL, 26, 0),
(60, 11, 1, 345, NULL, 26, 0),
(61, 3, 1, 23, NULL, 27, 0),
(62, 6, 1, 664, NULL, 27, 0),
(65, 5, 1, 455, NULL, 23, 0),
(66, 3, 1, 23, NULL, 28, 0),
(67, 3, 1, 23, NULL, 29, 0),
(68, 6, 1, 664, NULL, 29, 0),
(69, 2, 1, 154.27, NULL, 30, 0),
(70, 3, 1, 23, NULL, 31, 0),
(71, 5, 1, 455, NULL, 31, 0),
(72, 11, 1, 345, NULL, 32, 0),
(73, 18, 1, 345, NULL, 32, 0),
(74, 5, 1, 455, NULL, 34, 0),
(75, 2, 1, 154.27, NULL, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_payments`
--

DROP TABLE IF EXISTS `invoices_payments`;
CREATE TABLE IF NOT EXISTS `invoices_payments` (
  `invoicespay_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_inv_id` int(11) DEFAULT NULL,
  `invoice_payment_date` date DEFAULT NULL,
  `invoice_payment_amount` int(11) DEFAULT NULL,
  `invoices_payment_memo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`invoicespay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items_refund`
--

DROP TABLE IF EXISTS `items_refund`;
CREATE TABLE IF NOT EXISTS `items_refund` (
  `items_refund_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_invoice_id` int(11) NOT NULL,
  `items_refund_item` int(11) NOT NULL,
  `items_refund_quantity` int(11) NOT NULL,
  `items_refund_tax` float DEFAULT NULL,
  `items_refund_price` float NOT NULL,
  `items_refund_total` float NOT NULL,
  PRIMARY KEY (`items_refund_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_refund`
--

INSERT INTO `items_refund` (`items_refund_id`, `ref_invoice_id`, `items_refund_item`, `items_refund_quantity`, `items_refund_tax`, `items_refund_price`, `items_refund_total`) VALUES
(7, 40, 3, 1, 0, 23, 23),
(8, 41, 0, 0, 0, 0, 0),
(9, 42, 4, 1, 0, 244, 244),
(10, 43, 11, 1, 0, 345, 345),
(11, 44, 4, 1, 0, 244, 244),
(13, 45, 2, 1, 0, 154.27, 154.27),
(27, 51, 4, 1, 0, 244, 244),
(28, 51, 1, 1, 0, 185.56, 185.56),
(29, 51, 2, 1, 0, 154.27, 154.27);

-- --------------------------------------------------------

--
-- Table structure for table `item_s`
--

DROP TABLE IF EXISTS `item_s`;
CREATE TABLE IF NOT EXISTS `item_s` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_cost_price` float DEFAULT NULL,
  `item_unit_price` float DEFAULT NULL,
  `part_number` varchar(45) DEFAULT NULL,
  `item_serial` varchar(45) DEFAULT NULL,
  `item_discount_id` int(11) DEFAULT NULL,
  `item_prop_id` int(11) DEFAULT NULL,
  `profit_margin` float DEFAULT NULL,
  `country_of_origin` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_s`
--

INSERT INTO `item_s` (`item_id`, `item_name`, `item_quantity`, `item_cost_price`, `item_unit_price`, `part_number`, `item_serial`, `item_discount_id`, `item_prop_id`, `profit_margin`, `country_of_origin`) VALUES
(1, 'قاعده ماتور يمين 2 مسمار', 2, 127.95, 185.56, 'Q2G90250348', 'be22', NULL, 3, NULL, NULL),
(2, 'قاعده ماتور سفلي  شمال 2 مسمار', 2, 118.67, 154.27, 'Q2G90250437', 'be11', NULL, 3, NULL, NULL),
(3, 'قاعده فتيس خلفي 1 مسمار ', 4, 156.29, 23, 'Q2G96227422', 'bss22', NULL, 2, NULL, NULL),
(4, 'قاعده شمال الومنيوم', 5, 153.63, 244, 'Q2G96292097', 'bb34', NULL, 4, NULL, NULL),
(5, 'قاعده خلفي ', 37, 15.12, 455, 'Q2G96299103', 'da33', NULL, 2, NULL, NULL),
(6, 'بطاحه امامي يمين', 33, 120.6, 664, 'Q2G96444919', '4dag', NULL, 3, NULL, NULL),
(10, 'فلتر هوا', 121, 551.5, 200, 'Q4KAF MR552951', '', NULL, 5, NULL, NULL),
(11, 'فلتر بنزين', 2, 511, 345, 'QA 31112-1R022', NULL, NULL, 8, NULL, NULL),
(12, 'فلتر بنزين', 11, 221, 252, 'QA 31112-3R000', NULL, NULL, 5, NULL, NULL),
(13, 'طقم دبرياج كامل', 3, 512.3, 470, 'QA KTTDWK-004', NULL, NULL, 4, NULL, NULL),
(14, 'فلتر تكيف ', 12, 800, 896, ' 97133-2E250', '', 0, NULL, 12, NULL),
(15, 'فلتر تكيف ', 3, 21.2, 1000, ' 97133-2F000', NULL, NULL, 3, NULL, NULL),
(17, 'بطاحه امامي شمال ', 33, 155.65, 7546, 'Q2G 96444920', NULL, NULL, 3, NULL, NULL),
(18, 'تيل امامي ', 2, 153.12, 345, 'Q2SSP1047', NULL, NULL, 6, NULL, NULL),
(19, 'فلتر هوا', 121, 60.5, 3543, 'Q4KAF 96553450', NULL, NULL, 5, NULL, NULL),
(20, 'فلتر هوا', 121, 551.5, 606.65, 'Q4KAF MR552951', '', 0, NULL, 10, NULL),
(21, 'فلتر بنزين', 2, 511.97, 573.41, 'QA 31112-1R000', '', 0, NULL, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refund_invoices`
--

DROP TABLE IF EXISTS `refund_invoices`;
CREATE TABLE IF NOT EXISTS `refund_invoices` (
  `refund_id` int(11) NOT NULL AUTO_INCREMENT,
  `refund_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `refund_invoice_id` int(11) DEFAULT NULL,
  `refund_total` float DEFAULT NULL,
  `refund_tax` float DEFAULT NULL,
  `refund_note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`refund_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refund_invoices`
--

INSERT INTO `refund_invoices` (`refund_id`, `refund_date`, `refund_invoice_id`, `refund_total`, `refund_tax`, `refund_note`) VALUES
(40, '2021-10-27 23:09:22', 28, 23, NULL, NULL),
(42, '2021-10-28 16:32:54', 21, 244, NULL, NULL),
(43, '2021-10-28 16:38:22', 19, 345, NULL, NULL),
(44, '2021-10-28 16:39:31', 21, 244, NULL, NULL),
(45, '2021-10-28 16:42:58', 19, 154.27, NULL, NULL),
(51, '2021-10-28 17:47:09', 18, 583.83, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_s`
--

DROP TABLE IF EXISTS `supplier_s`;
CREATE TABLE IF NOT EXISTS `supplier_s` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_company` varchar(45) DEFAULT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `supplier_add` varchar(100) DEFAULT NULL,
  `supplier_phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_s`
--

INSERT INTO `supplier_s` (`supplier_id`, `supplier_company`, `supplier_name`, `supplier_add`, `supplier_phone`) VALUES
(1, 'الشركه الهندسيه ', 'علي يوسف', '20 شارع الخزان', '01017339162'),
(2, 'NAKAMOTO', 'شريف ', 'شارع الفايدي', '0102343505'),
(3, 'المتحده', 'علي محمود', '16-شارع عباس العقاد', '010203003'),
(4, 'الشركه الهندسية لقطع الغيارات', 'محمود حلمي', 'اكتوبر -الحي الرابع - مجاورة خامسه -عماره 334', '01014010203'),
(5, 'الشركه الهندسيه ', 'محمود عوض', 'الوكاله', '334332423'),
(6, 'الشركه العربيه المتحده', 'هارون', '10 - السبتيه - بجوار مطعم', '0112340550'),
(7, 'الفايدي', 'سيد فاروق', 'الحي الثالث', '010020200');

-- --------------------------------------------------------

--
-- Table structure for table `sup_invoice`
--

DROP TABLE IF EXISTS `sup_invoice`;
CREATE TABLE IF NOT EXISTS `sup_invoice` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT,
  `si_date_auto` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `si_serial_num` varchar(45) DEFAULT NULL,
  `p_item_quantity` int(11) DEFAULT NULL,
  `si_item_total` float DEFAULT NULL,
  `si_tax_id` int(11) DEFAULT NULL,
  `si_paid` float DEFAULT NULL,
  `si_supplier_id` int(11) DEFAULT NULL,
  `si_note` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_status` int(11) DEFAULT NULL,
  `invoice_payments_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sup_invoice`
--

INSERT INTO `sup_invoice` (`si_id`, `si_date_auto`, `si_serial_num`, `p_item_quantity`, `si_item_total`, `si_tax_id`, `si_paid`, `si_supplier_id`, `si_note`, `invoice_num`, `is_active`, `invoice_date`, `invoice_status`, `invoice_payments_id`) VALUES
(1, '2021-08-12 18:04:17', NULL, NULL, 9, 0, 9, 4, NULL, '3fdafff', NULL, '2021-08-13', 2, NULL),
(2, '2021-08-25 16:59:44', NULL, NULL, 5945, 0, 5945, 2, NULL, 'xs22323', NULL, '2021-08-19', 2, NULL),
(27, '2021-08-07 20:02:38', NULL, NULL, 2068, 0, 2068, 2, NULL, 'ff233334444444', NULL, '2021-08-11', 1, NULL),
(28, '2021-08-11 16:08:50', NULL, NULL, 11127, 0, 11127, 2, NULL, 'DF5445-2333', NULL, '2021-08-04', 2, NULL),
(29, '2021-08-08 15:45:32', NULL, NULL, 30537, 0, 30537, 1, NULL, 'xf3233423', NULL, '2021-08-12', 1, NULL),
(30, '2021-08-08 15:47:20', NULL, NULL, 2645, 0, 2645, 2, NULL, '3ff11222', NULL, '2021-08-03', 1, NULL),
(31, '2021-08-11 11:02:11', NULL, NULL, 838, 0, 838, 0, NULL, 'ff23dafa', NULL, '0000-00-00', 2, NULL),
(32, '2021-08-10 16:58:32', NULL, NULL, 1592, 0, 1592, 2, NULL, 'ff23dafa', NULL, '2021-08-20', 2, NULL),
(33, '2021-08-09 18:12:44', NULL, NULL, 2645, 0, 2645, 0, NULL, '3ff11222', NULL, '2021-08-03', 1, NULL),
(34, '2021-08-09 18:26:03', NULL, NULL, 3388, 0, 3388, 0, NULL, 'xf121212', NULL, '2021-08-12', 1, NULL),
(35, '2021-08-09 18:29:59', NULL, NULL, 484, 0, 484, 0, NULL, 'ww11212', NULL, '2021-08-28', 1, NULL),
(39, '2021-08-30 21:10:06', NULL, NULL, 925, 0, 925, 1, NULL, '212111111111', NULL, '2021-08-30', 2, NULL),
(40, '2021-08-09 19:04:50', NULL, NULL, 736, 0, 736, 1, NULL, '232df', NULL, '2021-08-11', 1, NULL),
(41, '2021-08-09 20:17:42', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(42, '2021-08-09 20:21:51', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(44, '2021-08-09 20:50:56', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(45, '2021-08-09 20:51:21', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(46, '2021-08-09 20:51:25', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(47, '2021-08-09 20:51:41', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(48, '2021-08-09 20:52:17', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(49, '2021-08-30 17:06:30', NULL, NULL, 396, 0, 396, 2, NULL, 'xxxxx33444', NULL, '2021-08-29', 2, NULL),
(50, '2021-08-09 20:55:16', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(51, '2021-08-09 20:55:17', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(52, '2021-08-09 20:55:18', NULL, NULL, 16, 0, 16, 2, NULL, '3333333444', NULL, '2021-08-29', 1, NULL),
(53, '2021-08-09 20:55:29', NULL, NULL, 2645, 0, 2645, 2, NULL, '3ff11222', NULL, '2021-08-03', 1, NULL),
(54, '2021-08-09 20:55:30', NULL, NULL, 2645, 0, 2645, 2, NULL, '3ff11222', NULL, '2021-08-03', 1, NULL),
(55, '2021-08-09 20:55:30', NULL, NULL, 2645, 0, 2645, 2, NULL, '3ff11222', NULL, '2021-08-03', 1, NULL),
(56, '2021-08-09 21:07:17', NULL, NULL, 18, 0, 18, 0, NULL, '', NULL, '0000-00-00', 1, NULL),
(57, '2021-08-09 21:07:25', NULL, NULL, 18, 0, 18, 0, NULL, '', NULL, '0000-00-00', 1, NULL),
(58, '2021-08-09 21:07:26', NULL, NULL, 18, 0, 18, 0, NULL, '', NULL, '0000-00-00', 1, NULL),
(59, '2021-08-10 05:31:46', NULL, NULL, 1221, 0, 1221, 1, NULL, '3223232', NULL, '2021-08-11', 1, NULL),
(60, '2021-08-10 05:31:51', NULL, NULL, 1221, 0, 1221, 1, NULL, '3223232', NULL, '2021-08-11', 2, NULL),
(61, '2021-08-11 16:15:38', NULL, NULL, 4895, 0, 4895, 1, NULL, '3223232', NULL, '2021-08-11', 2, NULL),
(62, '2021-08-26 19:07:45', NULL, NULL, 10989, 0, 10989, 1, NULL, '34343', NULL, '2021-07-27', 2, NULL),
(63, '2021-08-10 05:34:31', NULL, NULL, 10989, 0, 10989, 1, NULL, '34343', NULL, '2021-07-27', 2, NULL),
(64, '2021-08-10 05:34:33', NULL, NULL, 10989, 0, 10989, 1, NULL, '34343', NULL, '2021-07-27', 2, NULL),
(65, '2021-08-10 05:36:04', NULL, NULL, 10989, 0, 10989, 1, NULL, '34343', NULL, '2021-07-27', 2, NULL),
(66, '2021-08-10 05:45:10', NULL, NULL, 275, 0, 275, 1, NULL, 'xxxxxxxxxx', NULL, '2021-08-12', 2, NULL),
(67, '2021-08-10 17:28:25', NULL, NULL, 4390, 0, 4390, 2, NULL, 'vvvvvvvvvvvvvv', NULL, '2021-08-12', 2, NULL),
(68, '2021-08-11 16:13:41', NULL, NULL, 71, 0, 71, 2, NULL, '3f3f2dddddd', NULL, '2021-08-12', 2, NULL),
(69, '2021-08-11 16:14:30', NULL, NULL, 10505, 0, 10505, 2, NULL, '3xxxxx', NULL, '2021-08-13', 1, NULL),
(70, '2021-08-26 15:56:22', NULL, NULL, 42311, 0, 42311, 6, NULL, '32323ddd', NULL, '2021-08-11', 2, NULL),
(71, '2021-08-25 16:35:37', NULL, NULL, 1793, 0, 1793, 3, NULL, 'xxxsss', NULL, '2021-08-09', 2, NULL),
(72, '2021-08-26 19:04:30', NULL, NULL, 3300, 0, 3300, 3, NULL, '020dd3', NULL, '2021-08-12', 2, NULL),
(73, '2021-08-27 17:39:03', NULL, NULL, 0, 0, 0, 0, NULL, '', NULL, '0000-00-00', 1, NULL),
(74, '2021-09-01 05:47:05', NULL, NULL, 18, 0, 18, 2, NULL, '345fadf', NULL, '2021-09-06', 2, NULL),
(75, '2021-09-01 05:45:20', NULL, NULL, 578, 0, 578, 5, NULL, '54354353', NULL, '2021-09-01', 2, NULL),
(76, '2021-09-01 05:41:27', NULL, NULL, 334, NULL, 45, NULL, NULL, '53434fd', NULL, NULL, NULL, NULL),
(77, '2021-09-02 18:29:08', '', 2, 1727, 0, 1727, 4, NULL, '354343', NULL, '2021-09-01', 2, NULL),
(78, '2021-09-02 18:28:57', 'SO21090100505', 2, 2696, 0, 2696, 4, NULL, '43433434', NULL, '2021-09-01', 2, NULL),
(79, '2021-09-02 18:28:39', 'SO21090100606', 2, 490, 0, 490, 4, NULL, '76475', NULL, '2021-09-01', 2, NULL),
(80, '2021-09-02 12:32:00', 'PO21090200701', 3, 366, 0, 366, 5, NULL, '434', NULL, '2021-09-02', 2, NULL),
(81, '2021-09-02 18:29:02', 'PO21090200802', 2, 20.44, 0, 20.44, 4, NULL, '354234', NULL, '2021-09-02', 2, NULL),
(82, '2021-09-02 13:21:37', 'PO21090200903', 2, 5345.47, 0, 5345.47, 7, NULL, '42231', NULL, '2021-09-02', 2, NULL),
(83, '2021-09-02 14:26:06', 'PO21090201004', 1, 9, 0, 9, 4, NULL, '3232', NULL, '2021-09-02', 1, NULL),
(84, '2021-09-02 14:26:46', 'PO21090201105', 1, 135, 0, 135, 6, NULL, '434', NULL, '2021-09-02', 1, NULL),
(85, '2021-10-28 17:58:47', 'PO21102800101', 1, 12, 0, 12, 3, NULL, '', NULL, '2021-10-28', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sup_items`
--

DROP TABLE IF EXISTS `sup_items`;
CREATE TABLE IF NOT EXISTS `sup_items` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_item_id` int(11) DEFAULT NULL,
  `sup_item_quantity` int(11) DEFAULT NULL,
  `sup_cost_price` float DEFAULT NULL,
  `sup_unit_price` float DEFAULT NULL,
  `sup_invoice_id` int(11) DEFAULT NULL,
  `sup_inv_discount` int(11) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sup_items`
--

INSERT INTO `sup_items` (`sup_id`, `sup_item_id`, `sup_item_quantity`, `sup_cost_price`, `sup_unit_price`, `sup_invoice_id`, `sup_inv_discount`) VALUES
(1, 3, 4, 4, NULL, 14, 0),
(2, 3, 55, 55, NULL, 14, NULL),
(3, 3, 4, 4, NULL, 15, 0),
(4, 3, 55, 55, NULL, 15, NULL),
(5, 3, 4, 4, NULL, 16, 0),
(6, 3, 55, 55, NULL, 16, NULL),
(7, 3, 4, 4, NULL, 19, 0),
(8, 3, 55, 55, NULL, 19, NULL),
(9, 3, 4, 4, NULL, 20, NULL),
(10, 3, 55, 55, NULL, 20, NULL),
(11, 11, 44, 33, NULL, 25, NULL),
(12, 21, 3, 4, NULL, 25, NULL),
(13, 4, 3, 4, NULL, 25, NULL),
(14, 9, 3, 4, NULL, 25, NULL),
(15, 17, 3, 4, NULL, 25, NULL),
(16, 11, 44, 33, NULL, 26, NULL),
(17, 21, 3, 4, NULL, 26, NULL),
(18, 4, 3, 4, NULL, 26, NULL),
(19, 9, 3, 4, NULL, 26, NULL),
(20, 17, 3, 4, NULL, 26, NULL),
(21, 3, 3, 44, NULL, 27, NULL),
(22, 14, 44, 44, NULL, 27, NULL),
(23, 1, 12, 50, NULL, 28, NULL),
(25, 3, 3, 4, NULL, 29, NULL),
(26, 6, 555, 55, NULL, 29, NULL),
(27, 4, 55, 44, NULL, 30, NULL),
(28, 22, 45, 5, NULL, 30, NULL),
(34, 11, 44, 33, NULL, 32, NULL),
(35, 21, 23, 4, NULL, 32, NULL),
(36, 4, 3, 4, NULL, 32, NULL),
(37, 9, 3, 4, NULL, 32, NULL),
(38, 17, 6, 4, NULL, 32, NULL),
(39, 4, 55, 44, NULL, 33, NULL),
(40, 22, 45, 5, NULL, 33, NULL),
(41, 4, 33, 44, NULL, 34, NULL),
(42, 15, 44, 44, NULL, 34, NULL),
(43, 11, 22, 22, NULL, 35, NULL),
(44, 2, 3, 3, NULL, 38, NULL),
(45, 5, 22, 22, NULL, 39, NULL),
(46, 20, 21, 21, NULL, 39, NULL),
(47, 3, 23, 32, NULL, 40, NULL),
(48, 3, 4, 4, NULL, 41, NULL),
(49, 3, 4, 4, NULL, 42, NULL),
(50, 3, 3, 3, NULL, 56, NULL),
(51, 4, 3, 3, NULL, 56, NULL),
(52, 6, 33, 33, NULL, 59, NULL),
(53, 6, 33, 4, NULL, 59, NULL),
(54, 4, 333, 33, NULL, 62, NULL),
(55, 4, 44, 4, NULL, 66, NULL),
(56, 3, 3, 33, NULL, 66, NULL),
(57, 4, 3, 3, NULL, 67, NULL),
(58, 5, 5, 5, NULL, 67, NULL),
(60, 1, 33, 44, NULL, 28, NULL),
(61, 17, 88, 88, NULL, 28, NULL),
(63, 18, 22, 22, NULL, 28, NULL),
(64, 3, 3, 3, NULL, 68, NULL),
(65, 22, 4, 5, NULL, 68, NULL),
(66, 17, 6, 7, NULL, 68, NULL),
(67, 1, 44, 5, NULL, 69, NULL),
(68, 9, 66, 66, NULL, 69, NULL),
(69, 4, 77, 77, NULL, 69, NULL),
(70, 2, 66, 66, NULL, 61, NULL),
(71, 4, 77, 7, NULL, 61, NULL),
(72, 2, 3, 3, NULL, 1, NULL),
(73, 6, 4, 4, NULL, 2, NULL),
(74, 3, 20, 2045, NULL, 70, NULL),
(77, 2, 20, 12, NULL, 70, NULL),
(78, 5, 45, 25, NULL, 70, NULL),
(80, 15, 33, 33, NULL, 71, NULL),
(82, 2, 32, 22, NULL, 71, NULL),
(83, 5, 66, 50, NULL, 72, NULL),
(84, 3, 4, 4, NULL, 70, NULL),
(85, 5, 5, 6, NULL, 70, NULL),
(86, 21, 0, 0, NULL, 2, NULL),
(87, 9, 77, 77, NULL, 2, NULL),
(88, 5, 0, 0, NULL, 73, NULL),
(89, 3, 2, 3, NULL, 49, NULL),
(90, 5, 5, 78, NULL, 49, NULL),
(91, 3, 3, 2, NULL, 74, NULL),
(92, 3, 4, 3, NULL, 74, NULL),
(93, 3, 4, 77, NULL, 75, NULL),
(94, 21, 5, 54, NULL, 75, NULL),
(95, 2, 4, 3, NULL, 77, NULL),
(96, 5, 5, 343, NULL, 77, NULL),
(97, 3, 5, 4, NULL, 78, NULL),
(98, 21, 6, 446, NULL, 78, NULL),
(99, 3, 7, 6, NULL, 79, NULL),
(100, 6, 8, 56, NULL, 79, NULL),
(101, 3, 4, 4, NULL, 80, NULL),
(102, 17, 5, 66, NULL, 80, NULL),
(103, 3, 4, 5, NULL, 80, NULL),
(104, 1, 3, 3.44, NULL, 81, NULL),
(105, 4, 4, 2.53, NULL, 81, NULL),
(106, 4, 33, 20.15, NULL, 82, NULL),
(107, 5, 52, 90.01, NULL, 82, NULL),
(108, 3, 3, 3, NULL, 83, NULL),
(109, 4, 3, 45, NULL, 84, NULL),
(110, 3, 6, 2, NULL, 85, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_s`
--

DROP TABLE IF EXISTS `tax_s`;
CREATE TABLE IF NOT EXISTS `tax_s` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(45) DEFAULT NULL,
  `tax_percent` int(11) DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
