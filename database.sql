-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- Host: 10.113.211.9
-- Generation Time: Apr 02, 2015 at 09:28 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.5.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ff`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `nis` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `fa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `twitter` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Twitter username',
  `imageName` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default.png' COMMENT 'Image',
  `email` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis` (`nis`),
  KEY `fa` (`fa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=489 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` int(10) unsigned DEFAULT NULL,
  `fa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `event_type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'For calendar',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'For calendar',
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Scheduled' COMMENT 'For calendar',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  KEY `fa` (`fa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `client_id` int(11) DEFAULT NULL,
  `stock_symbol` varchar(20) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_price` double NOT NULL,
  `type` varchar(6) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock` int(10) unsigned DEFAULT NULL,
  `customer` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` varchar(6) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Is it bought or sold',
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  KEY `stock` (`stock`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=391 ;

-- --------------------------------------------------------

--
-- Table structure for table `stocklists`
--

CREATE TABLE IF NOT EXISTS `stocklists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name of company',
  `exchange` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name of exchange',
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Category of stock',
  `current` double DEFAULT '0' COMMENT 'Current',
  `open` double DEFAULT '0' COMMENT 'Current',
  `close` double DEFAULT '0' COMMENT 'Current',
  `high` double DEFAULT '0' COMMENT 'Current',
  `low` double DEFAULT '0' COMMENT 'Current',
  `date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `change` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `symbol` (`symbol`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1114 ;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) DEFAULT NULL,
  `symbol` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company` (`company`),
  KEY `company_3` (`company`),
  KEY `company_4` (`company`),
  KEY `company_5` (`company`),
  KEY `company_6` (`company`),
  KEY `company_7` (`company`),
  KEY `company_8` (`company`),
  KEY `company_9` (`company`),
  KEY `company_10` (`company`),
  FULLTEXT KEY `company_2` (`company`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='To store all known stock symbols and company names' AUTO_INCREMENT=3709 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `index1` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'AAPL' COMMENT 'Home page index display',
  `index2` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'GOOG' COMMENT 'Home page index display',
  `index3` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'INTC' COMMENT 'Home page index display',
  `index4` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'YHOO' COMMENT 'Home page index display',
  `home_twitter` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hashtag for twitter home page',
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name of user',
  `indexDisplay` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
