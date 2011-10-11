-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2011 at 05:21 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digimall`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  PRIMARY KEY (`account_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `account_type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `dist_id` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `dist_id` (`dist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `brand`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'processor'),
(2, 'motherboard');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(255) NOT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`dist_id`, `dist_name`, `contact_number`, `email`) VALUES
(2, 'shitto', 1321231, ''),
(4, 'dist', 123456, ''),
(5, 'test', 1234, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `graphics`
--

CREATE TABLE `graphics` (
  `graphics_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `graphics_model` varchar(255) NOT NULL,
  `graphics_capacity` int(11) NOT NULL,
  `graphics_ram_type` varchar(255) DEFAULT NULL,
  `graphics_bit` int(11) NOT NULL,
  PRIMARY KEY (`graphics_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `graphics`
--


-- --------------------------------------------------------

--
-- Table structure for table `harddisk`
--

CREATE TABLE `harddisk` (
  `hdd_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `hdd_type` varchar(255) NOT NULL,
  `hdd_model` varchar(255) NOT NULL,
  `hdd_capacity` int(11) NOT NULL,
  PRIMARY KEY (`hdd_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `harddisk`
--


-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `disp_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `disp_size` int(11) NOT NULL,
  `disp_type` varchar(255) DEFAULT NULL,
  `disp_refresh` int(11) DEFAULT NULL,
  `disp_contrast` varchar(255) DEFAULT NULL,
  `disp_resolution` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`disp_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `monitor`
--


-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `mb_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `mb_model` varchar(255) NOT NULL,
  `mb_socket` int(11) NOT NULL,
  `mb_chipset` varchar(255) NOT NULL,
  `mb_graphics` varchar(255) DEFAULT NULL,
  `mb_ram_slot` int(11) DEFAULT NULL,
  `mb_pcie_slot` int(11) DEFAULT NULL,
  PRIMARY KEY (`mb_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `motherboard`
--


-- --------------------------------------------------------

--
-- Table structure for table `optical_rom`
--

CREATE TABLE `optical_rom` (
  `rom_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `rom_type` varchar(255) NOT NULL,
  `rom_model` varchar(255) NOT NULL,
  PRIMARY KEY (`rom_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `optical_rom`
--


-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `proc_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `proc_name` varchar(255) NOT NULL,
  `proc_model` varchar(255) NOT NULL,
  `proc_speed` int(11) NOT NULL,
  PRIMARY KEY (`proc_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `processor`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product`
--


-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `ram_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `ram_type` varchar(255) NOT NULL,
  `ram_capacity` int(11) NOT NULL,
  `ram_speed` int(11) NOT NULL,
  PRIMARY KEY (`ram_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ram`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `account_type_id` (`account_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `account_type_id`, `username`, `password`, `email`, `name`) VALUES
(1, 1, 'digimall', 'digimall', 'digimall@digimall.com', 'digimall'),
(2, 2, 'jason', 'jason', 'jason@jason.com', 'Jason'),
(7, 2, 'test', 'test', 'test@test.com', 'test');
