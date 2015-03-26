-- phpMyAdmin SQL Dump
-- version 4.0.10.8
-- http://www.phpmyadmin.net
--
-- Host: 10.113.211.9
-- Generation Time: Mar 26, 2015 at 04:08 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.3.3

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
  `balance` int(10) DEFAULT NULL,
  `fa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `twitter` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Twitter username',
  `imageName` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'default.png' COMMENT 'Image',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis` (`nis`),
  KEY `fa` (`fa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=260 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `gender`, `dateOfBirth`, `nis`, `phoneNo`, `address`, `balance`, `fa`, `created`, `modified`, `twitter`, `imageName`) VALUES
(104, 'John Smith', 'F', '2006-02-03', '637126389', '123123', 'dasdasdas', 23424, 'pe70', '2015-03-12 18:37:07', '2015-03-12 18:37:07', NULL, NULL),
(197, 'Finlay Reynolds', 'm', '1932-05-05', '8057354', '7979878979', 'Heriot-Watt', 999999, 'Duis', '2015-03-15 15:48:33', '2015-03-15 15:48:33', '13Finster', NULL),
(8, 'Kitra Hubbard', 'M', '2013-11-13', 'JZ-75-64-72-99 B', '01115781703', 'Ap #885-8859 Pellentesque Rd.', 1276, 'pe70', '2015-09-18 03:40:20', '2015-03-26 15:58:46', 'camieac', ''),
(198, 'Jack Doe', 'F', '2004-08-05', 'JZ 55 77 66 99 z', '92830921', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:14:19', '2015-03-17 14:15:17', 'camieac', NULL),
(10, 'Nicole Dickerson', 'M', '2001-10-14', 'JZ-93-41-16-26 B', '01911500592', '252-4987 Eu, St.', 73953, 'pe70', '2014-10-18 01:09:02', '2014-11-24 00:35:24', NULL, NULL),
(11, 'Ariana Cabrera', 'F', '2003-01-16', 'JZ-62-32-42-66 B', '01916114216', '626-5263 Sed Rd.', 24545, 'er49', '2015-08-04 05:55:21', '2015-07-26 03:49:27', NULL, NULL),
(12, 'Isabella Herrera', 'M', '2016-10-15', 'JZ-72-49-19-69 B', '01615292430', '7740 Elit, St.', 67859, 'pe70', '2015-01-12 09:29:47', '2015-03-20 17:37:21', 'isabella', NULL),
(13, 'Jamalia Hess', 'F', '2027-02-15', 'JZ-43-15-20-64 B', '01617951285', 'P.O. Box 202, 2024 Elit Rd.', 86010, 'er49', '2015-09-07 05:46:38', '2014-08-12 07:44:34', NULL, NULL),
(14, 'Jade Mcpherson', 'M', '2021-02-15', 'JZ-18-53-68-60 B', '01819699925', '702-1948 Vitae, Ave', 34757, 'pe70', '2015-07-08 22:53:44', '2015-03-20 17:35:49', 'camieac', NULL),
(15, 'Patrick Watkins', 'F', '2003-09-14', 'JZ-83-20-91-19 B', '01613291117', 'P.O. Box 953, 6619 Ridiculus Road', 90891, 'er49', '2014-04-06 19:52:12', '2014-04-21 15:42:49', NULL, NULL),
(16, 'Hayden Boyer', 'M', '2017-03-15', 'JZ-01-01-65-24 B', '01914510019', 'P.O. Box 615, 6632 Justo Av.', 18235, 'pe70', '2015-07-04 08:25:48', '2014-11-27 04:31:30', NULL, NULL),
(17, 'Amethyst Guy', 'F', '2002-04-15', 'JZ-92-52-16-38 B', '01810210822', '524-2278 Quis Avenue', 9488, 'er49', '2016-02-26 14:09:32', '2014-05-30 04:41:08', NULL, NULL),
(18, 'Rhiannon Mcfadden', 'M', '2027-05-15', 'JZ-39-10-52-64 B', '01915777563', 'Ap #864-4851 At, Av.', 50060, 'pe70', '2014-04-11 04:01:43', '2014-09-14 19:02:02', NULL, NULL),
(19, 'Sydnee Allen', 'F', '2016-07-14', 'JZ-76-18-68-28 B', '01612073147', 'P.O. Box 950, 4193 Dui St.', 58185, 'er49', '2015-04-29 16:15:07', '2015-02-25 22:36:11', NULL, NULL),
(20, 'Natalie Middleton', 'M', '2015-11-14', 'JZ-08-55-51-82 B', '01710242273', 'P.O. Box 221, 978 Consectetuer St.', 36782, 'pe70', '2014-08-25 05:08:39', '2015-05-05 10:31:36', NULL, NULL),
(21, 'Yvonne Barr', 'F', '2024-07-15', 'JZ-89-55-61-24 B', '01113698864', '5764 Cursus St.', 87819, 'er49', '2015-01-17 18:11:08', '2015-09-15 22:05:18', NULL, NULL),
(22, 'Hakeem Atkinson', 'M', '2025-03-15', 'JZ-80-35-92-72 B', '01217797689', 'Ap #767-5932 Eleifend, St.', 5380, 'pe70', '2015-01-12 11:00:00', '2014-05-19 10:35:33', NULL, NULL),
(23, 'Jerry Dominguez', 'F', '2019-09-14', 'JZ-26-67-48-21 B', '01710422005', 'Ap #190-2575 Mauris, St.', 93384, 'er49', '2015-07-30 21:01:04', '2014-09-25 20:21:56', NULL, NULL),
(24, 'Samson Wells', 'M', '2029-08-14', 'JZ-25-67-54-86 B', '01212348102', 'P.O. Box 360, 5109 Sollicitudin Street', 22894, 'pe70', '2015-11-22 14:41:19', '2014-08-27 12:35:35', NULL, NULL),
(25, 'Jescie Duffy', 'F', '2016-04-14', 'JZ-70-30-25-13 B', '01911263588', '109-485 Nunc Rd.', 65252, 'er49', '2016-02-15 19:19:44', '2014-07-01 04:13:08', NULL, NULL),
(26, 'Kelsie Branch', 'M', '2019-02-16', 'JZ-94-45-25-54 B', '01715300396', 'P.O. Box 803, 4921 Nulla Rd.', 91392, 'pe70', '2016-02-19 03:01:40', '2015-08-09 14:10:27', NULL, NULL),
(27, 'Owen Rosario', 'F', '2013-01-16', 'JZ-91-32-55-38 B', '01818053291', 'P.O. Box 712, 4453 Gravida Street', 39133, 'er49', '2015-02-25 20:01:50', '2015-09-23 03:18:07', NULL, NULL),
(28, 'Miranda Gillespie', 'M', '2019-05-14', 'JZ-31-22-73-95 B', '01910180441', '4272 Molestie Ave', 52782, 'pe70', '2015-01-19 06:42:25', '2015-05-11 13:48:37', NULL, NULL),
(29, 'Penelope Key', 'F', '2015-09-15', 'JZ-33-29-46-92 B', '01814087610', 'P.O. Box 539, 9808 Tortor, Av.', 35861, 'er49', '2015-12-06 18:55:33', '2015-06-17 21:05:07', NULL, NULL),
(30, 'Boris Erickson', 'M', '2003-11-15', 'JZ-22-87-27-14 B', '01115436922', '814-4659 Risus. Rd.', 54119, 'pe70', '2015-01-29 23:33:05', '2014-06-05 14:21:14', NULL, NULL),
(31, 'Baker Boyd', 'F', '2025-04-15', 'JZ-33-05-16-49 B', '01718872862', 'P.O. Box 641, 5231 Ante Av.', 62223, 'er49', '2014-12-16 19:50:51', '2015-05-27 20:04:06', NULL, NULL),
(32, 'Hedley Gregory', 'M', '2011-01-16', 'JZ-40-84-80-47 B', '01212699452', '6921 Arcu. St.', 37385, 'pe70', '2014-11-03 20:41:31', '2015-10-18 17:22:33', NULL, NULL),
(33, 'Chelsea Mcdaniel', 'F', '2025-06-14', 'JZ-36-37-17-11 B', '01014249635', '7400 Est. St.', 62602, 'er49', '2015-12-27 07:49:20', '2015-04-29 05:37:13', NULL, NULL),
(34, 'Murphy Beck', 'M', '2011-06-14', 'JZ-43-22-90-64 B', '01411738254', 'P.O. Box 145, 6909 Id Rd.', 24028, 'pe70', '2016-02-12 02:18:37', '2014-05-03 06:22:41', NULL, NULL),
(36, 'Brendan Peterson', 'M', '2025-06-14', 'JZ-00-49-90-59 B', '01312774248', '7204 Elit. St.', 97152, 'pe70', '2015-03-14 16:09:06', '2014-07-22 02:36:41', NULL, NULL),
(37, 'Kadeem Cobb', 'F', '2018-05-14', 'JZ-38-99-38-12 B', '01912719215', 'P.O. Box 146, 1009 Tristique Road', 13619, 'er49', '2014-12-11 03:07:11', '2015-01-13 04:56:06', NULL, NULL),
(38, 'Carly Little', 'M', '2014-05-15', 'JZ-37-16-86-46 B', '01811902969', 'Ap #192-9069 Tristique Ave', 8026, 'pe70', '2015-10-13 06:53:58', '2014-11-14 07:29:25', NULL, NULL),
(39, 'Kieran Buchanan', 'F', '2016-03-16', 'JZ-76-36-38-92 B', '01818651231', 'P.O. Box 440, 6100 Erat St.', 50363, 'er49', '2015-01-23 15:37:37', '2015-01-13 10:28:18', NULL, NULL),
(40, 'Denise Hess', 'M', '2001-03-16', 'JZ-96-43-10-22 B', '01816610777', 'P.O. Box 145, 161 Sit Street', 74141, 'pe70', '2016-03-07 16:54:42', '2015-02-09 04:18:23', NULL, NULL),
(41, 'Ivan Fischer', 'F', '2001-11-14', 'JZ-03-91-55-35 B', '01010718922', 'P.O. Box 953, 9723 Eget Street', 16502, 'er49', '2015-06-23 12:25:38', '2014-08-23 20:44:16', NULL, NULL),
(42, 'Jared Harper', 'M', '2018-03-14', 'JZ-07-53-00-06 B', '01611776922', 'P.O. Box 906, 8241 Vestibulum. St.', 69460, 'pe70', '2015-10-01 02:14:40', '2015-11-05 22:21:51', NULL, NULL),
(43, 'Rooney Wallace', 'F', '2022-04-15', 'JZ-48-61-47-75 B', '01512719028', 'Ap #483-163 Faucibus Street', 73316, 'er49', '2014-12-31 12:42:37', '2015-03-24 04:18:23', NULL, NULL),
(44, 'Jaquelyn Herman', 'M', '2020-03-16', 'JZ-59-57-45-55 B', '01719358940', '8730 Egestas Ave', 24768, 'pe70', '2015-11-17 17:09:15', '2015-05-27 15:26:33', NULL, NULL),
(45, 'Ethan Carroll', 'F', '2004-08-14', 'JZ-80-07-81-46 B', '01716221111', '623-6608 Id, Ave', 7441, 'er49', '2015-08-22 03:35:17', '2014-12-20 19:32:29', NULL, NULL),
(46, 'Sloane Kaufman', 'M', '2024-03-15', 'JZ-77-62-23-16 B', '01713249651', 'Ap #862-7514 Nisl. St.', 18582, 'pe70', '2015-08-28 09:22:11', '2016-03-06 04:17:38', NULL, NULL),
(47, 'Luke Woods', 'F', '2016-04-15', 'JZ-75-63-50-60 B', '01214039257', '278-9543 Parturient Ave', 37249, 'er49', '2016-01-28 14:25:58', '2015-08-31 08:30:37', NULL, NULL),
(48, 'Brynn Berry', 'M', '2015-07-14', 'JZ-95-62-95-86 B', '01415617044', '255-1521 Pellentesque Rd.', 43932, 'pe70', '2015-06-26 15:29:43', '2014-09-23 07:49:33', NULL, NULL),
(49, 'Gemma Ingram', 'F', '2013-01-15', 'JZ-51-04-16-93 B', '01711189083', 'Ap #644-9938 Vivamus Avenue', 70453, 'er49', '2015-06-26 08:12:58', '2016-01-16 22:31:53', NULL, NULL),
(50, 'Kane Farmer', 'M', '2019-12-14', 'JZ-37-56-33-99 B', '01615564488', '2394 Porttitor St.', 57218, 'pe70', '2014-10-25 05:10:06', '2014-08-21 23:30:37', NULL, NULL),
(51, 'Teagan Pate', 'F', '2014-03-14', 'JZ-25-21-74-18 B', '01311830181', '7201 Suspendisse Ave', 52512, 'er49', '2015-03-28 09:32:18', '2014-07-18 15:56:23', NULL, NULL),
(52, 'Sandra Oconnor', 'M', '2028-08-15', 'JZ-92-58-28-25 B', '01816231389', '858-8529 Mi, Rd.', 40862, 'pe70', '2014-06-17 16:15:16', '2015-12-07 02:34:09', NULL, NULL),
(53, 'Alisa Sweet', 'F', '2011-10-14', 'JZ-14-26-54-92 B', '01416459468', '2052 Sem St.', 51776, 'er49', '2015-10-04 13:59:44', '2014-07-14 17:21:47', NULL, NULL),
(54, 'Pearl Byrd', 'M', '2024-05-14', 'JZ-33-85-84-15 B', '01716474878', 'Ap #943-6717 Lobortis, St.', 91755, 'pe70', '2014-10-12 21:33:43', '2014-04-20 08:50:54', NULL, NULL),
(55, 'Len Faulkner', 'F', '2007-12-15', 'JZ-73-37-04-34 B', '01816125714', '138-6415 Quam, St.', 30198, 'er49', '2015-03-03 00:26:05', '2014-07-04 10:40:49', NULL, NULL),
(56, 'Alisa Sampson', 'M', '2005-10-14', 'JZ-72-39-99-00 B', '01119642049', 'Ap #774-6667 Scelerisque Street', 2688, 'pe70', '2015-09-19 05:08:42', '2016-02-16 23:40:38', NULL, NULL),
(57, 'Dustin Bradshaw', 'F', '2010-08-14', 'JZ-91-29-21-14 B', '01717644663', 'P.O. Box 341, 2590 Pede. Street', 76664, 'er49', '2015-04-13 01:02:22', '2014-10-05 22:54:49', NULL, NULL),
(58, 'Ahmed Merrill', 'M', '2018-05-14', 'JZ-89-08-51-68 B', '01815509781', '206-6766 Orci, St.', 87383, 'pe70', '2015-05-30 10:21:09', '2014-09-30 17:31:28', NULL, NULL),
(59, 'Charissa Blake', 'F', '2016-01-15', 'JZ-74-75-97-11 B', '01715458921', 'P.O. Box 900, 7540 Urna Ave', 40061, 'er49', '2015-09-09 19:42:35', '2014-08-11 14:12:34', NULL, NULL),
(60, 'Cassandra Cline', 'M', '2024-12-14', 'JZ-42-78-65-70 B', '01810675658', '410-2419 Molestie Ave', 78692, 'pe70', '2014-10-06 15:24:11', '2015-06-01 19:39:18', NULL, NULL),
(61, 'Teegan Burt', 'F', '2031-12-15', 'JZ-05-79-39-29 B', '01715102117', 'Ap #146-1290 Arcu Avenue', 37397, 'er49', '2014-08-24 21:57:48', '2016-02-15 11:00:26', NULL, NULL),
(62, 'Xenos Bradley', 'M', '2007-04-14', 'JZ-74-98-32-70 B', '01911952213', 'Ap #122-7913 Felis St.', 11445, 'pe70', '2015-05-27 10:00:08', '2016-02-02 02:29:09', NULL, NULL),
(63, 'Kirby Kramer', 'F', '2003-07-14', 'JZ-86-51-44-49 B', '01411131113', 'P.O. Box 980, 7835 Varius Road', 27195, 'er49', '2014-09-21 14:09:02', '2015-04-17 11:02:24', NULL, NULL),
(64, 'Lana Ingram', 'M', '2021-03-15', 'JZ-29-22-01-16 B', '01516478318', '520-5777 Aliquam Road', 22846, 'pe70', '2015-02-08 11:20:33', '2016-01-18 22:54:59', NULL, NULL),
(65, 'Isabelle Curry', 'F', '2008-11-14', 'JZ-35-25-77-62 B', '01216731713', '352-9899 Tempus, St.', 17894, 'er49', '2015-12-22 08:27:04', '2014-07-21 11:17:22', NULL, NULL),
(66, 'Bert Blevins', 'M', '2026-11-15', 'JZ-47-43-55-10 B', '01718816011', '770-2495 Morbi Ave', 90888, 'pe70', '2014-06-16 10:12:04', '2014-04-28 22:31:59', NULL, NULL),
(67, 'Rinah Bradshaw', 'F', '2011-08-14', 'JZ-71-04-78-53 B', '01710104541', 'Ap #834-6340 Et Ave', 89553, 'er49', '2015-01-02 21:01:24', '2014-11-08 13:04:35', NULL, NULL),
(68, 'Nasim Velez', 'M', '2028-02-15', 'JZ-88-72-32-20 B', '01816957141', 'P.O. Box 546, 7670 Luctus St.', 3043, 'pe70', '2014-12-16 21:19:07', '2015-03-30 03:14:54', NULL, NULL),
(69, 'Brody Kerr', 'F', '2023-09-14', 'JZ-50-49-72-29 B', '01714057629', '4511 Diam Street', 46807, 'er49', '2014-04-13 03:55:26', '2015-07-15 13:35:46', NULL, NULL),
(70, 'Lee Wilkinson', 'M', '2020-12-14', 'JZ-81-85-82-17 B', '01315031332', '601-2457 Gravida Road', 21024, 'pe70', '2014-06-23 20:12:56', '2014-09-27 12:35:47', NULL, NULL),
(71, 'Leilani Waller', 'F', '2006-01-16', 'JZ-19-28-16-37 B', '01015420395', '538-468 Lacinia Avenue', 21611, 'er49', '2014-12-17 17:59:15', '2015-01-16 09:28:20', NULL, NULL),
(72, 'Ferris Hahn', 'M', '2007-07-14', 'JZ-85-53-59-50 B', '01618618476', '2053 Mus. St.', 35529, 'pe70', '2014-03-14 13:35:33', '2014-03-23 06:19:07', NULL, NULL),
(73, 'Astra Leon', 'F', '2009-12-15', 'JZ-15-49-41-40 B', '01311093134', '268-6629 Malesuada Rd.', 74475, 'er49', '2015-09-08 02:10:00', '2014-04-18 08:57:16', NULL, NULL),
(74, 'Adria Knapp', 'M', '2022-06-14', 'JZ-90-60-06-37 B', '01114747865', 'Ap #478-9324 Lacus. Rd.', 44112, 'pe70', '2015-12-30 08:26:51', '2015-03-23 11:35:09', 'camieac', NULL),
(75, 'Ignatius Russo', 'F', '2002-08-15', 'JZ-16-06-97-57 B', '01217359156', 'P.O. Box 925, 6787 Vel, Rd.', 3028, 'er49', '2014-05-29 06:21:40', '2015-11-16 04:07:48', NULL, NULL),
(76, 'Merrill Flores', 'M', '2024-09-14', 'JZ-24-95-05-27 B', '01712077563', 'P.O. Box 649, 1047 Pharetra Rd.', 66771, 'pe70', '2016-01-09 23:53:15', '2015-04-30 07:48:26', NULL, NULL),
(77, 'Kessie Reid', 'F', '2002-01-16', 'JZ-63-61-14-70 B', '01418744662', 'Ap #821-1432 Etiam Street', 89909, 'er49', '2014-09-03 18:57:28', '2016-02-10 01:27:56', NULL, NULL),
(78, 'Indira Pacheco', 'M', '2002-01-16', 'JZ-70-33-44-66 B', '01914260847', 'Ap #434-7284 Erat Road', 31923, 'pe70', '2014-04-07 08:35:43', '2015-08-24 01:56:51', NULL, NULL),
(79, 'Sage Oconnor', 'F', '2009-09-15', 'JZ-94-05-23-34 B', '01314888231', '748-8731 Lacus, Av.', 94772, 'er49', '2015-07-06 19:37:05', '2015-09-03 17:12:05', NULL, NULL),
(80, 'Brandon Thornton', 'M', '2025-02-15', 'JZ-51-16-38-47 B', '01615967287', 'Ap #256-6978 Quis, Avenue', 56505, 'pe70', '2014-08-29 16:20:02', '2015-06-12 13:44:08', NULL, NULL),
(81, 'Ira Mclean', 'F', '2001-06-15', 'JZ-22-93-16-33 B', '01819859427', 'Ap #212-9610 A Rd.', 8105, 'er49', '2015-11-01 08:38:04', '2014-08-12 03:31:53', NULL, NULL),
(82, 'Moana Lang', 'M', '2024-12-15', 'JZ-97-97-38-85 B', '01213137471', 'P.O. Box 715, 9527 Nibh. Avenue', 18898, 'pe70', '2016-01-26 08:28:53', '2015-12-09 23:48:27', NULL, NULL),
(83, 'Graham Frost', 'F', '2026-10-14', 'JZ-95-78-02-85 B', '01015251037', 'Ap #809-3288 Est Rd.', 13660, 'er49', '2014-07-04 07:07:55', '2015-01-14 04:41:18', NULL, NULL),
(84, 'Jena Jennings', 'M', '2027-11-14', 'JZ-40-36-37-11 B', '01911944907', '5148 Dolor St.', 2997, 'pe70', '2014-04-26 11:24:05', '2014-07-17 07:22:44', NULL, NULL),
(85, 'Maggie Estes', 'F', '2012-09-14', 'JZ-69-10-27-35 B', '01712557758', '263-8189 Egestas Street', 36297, 'er49', '2015-12-10 15:14:15', '2015-08-28 12:20:16', NULL, NULL),
(86, 'Michelle Baxter', 'M', '2028-11-15', 'JZ-74-29-29-89 B', '01516908433', '1785 Eu, Ave', 17514, 'pe70', '2015-02-28 11:26:32', '2015-04-29 08:22:58', NULL, NULL),
(87, 'May Russell', 'F', '2002-03-16', 'JZ-63-94-65-11 B', '01911098289', 'Ap #881-6868 Sit Rd.', 33921, 'er49', '2015-08-26 19:23:09', '2015-02-07 04:34:16', NULL, NULL),
(88, 'Tad Alvarez', 'M', '2016-06-14', 'JZ-16-76-47-84 B', '01215872865', 'Ap #979-3949 Eros Avenue', 6285, 'pe70', '2015-08-20 08:03:51', '2015-02-10 00:03:38', NULL, NULL),
(89, 'Yoshio Chaney', 'F', '2026-12-14', 'JZ-60-99-44-35 B', '01014409546', '596 Rhoncus. Avenue', 18837, 'er49', '2015-04-15 08:49:01', '2014-04-04 21:49:14', NULL, NULL),
(90, 'Geraldine Hyde', 'M', '2009-01-15', 'JZ-40-68-23-00 B', '01916706869', 'P.O. Box 996, 9779 Nostra, Av.', 44627, 'pe70', '2014-07-07 10:42:58', '2015-10-18 19:55:41', NULL, NULL),
(91, 'Brielle Donaldson', 'F', '2019-04-15', 'JZ-87-44-11-42 B', '01718689870', '7994 Aenean Ave', 17097, 'er49', '2015-05-02 03:04:37', '2014-09-04 15:46:04', NULL, NULL),
(92, 'Jakeem Ray', 'M', '2021-03-16', 'JZ-45-28-80-88 B', '01418340396', 'Ap #898-8723 Euismod Av.', 15156, 'pe70', '2014-10-01 07:51:02', '2014-06-29 13:37:16', NULL, NULL),
(93, 'Melyssa Stuart', 'F', '2029-09-14', 'JZ-35-39-19-29 B', '01317586617', 'P.O. Box 329, 9134 Scelerisque Ave', 11150, 'er49', '2014-11-06 22:21:34', '2015-06-19 13:24:21', NULL, NULL),
(94, 'Megan Buckner', 'M', '2007-10-15', 'JZ-41-58-05-22 B', '01812633000', '7012 Sed St.', 84582, 'pe70', '2014-12-03 11:22:56', '2015-10-18 23:30:07', NULL, NULL),
(95, 'Hilary Odonnell', 'F', '2004-08-15', 'JZ-11-43-56-59 B', '01619946589', 'Ap #179-9190 Tristique Road', 74279, 'er49', '2015-12-06 21:44:39', '2015-12-07 05:20:56', NULL, NULL),
(96, 'Kasper Reilly', 'M', '2016-10-14', 'JZ-86-09-78-69 B', '01112497110', '486-2057 Nec, Rd.', 89704, 'pe70', '2014-08-20 18:46:21', '2014-07-07 18:38:09', NULL, NULL),
(97, 'Matthew Conley', 'F', '2015-07-14', 'JZ-21-34-32-24 B', '01417450017', '231-1289 Euismod Rd.', 90752, 'er49', '2016-01-14 01:03:50', '2015-11-19 17:15:12', NULL, NULL),
(98, 'Whoopi Walker', 'M', '2002-11-15', 'JZ-05-87-94-92 B', '01815439486', 'Ap #462-9085 Nunc Road', 26972, 'pe70', '2015-12-20 04:41:28', '2015-10-23 14:14:47', NULL, NULL),
(99, 'Pascale Rogers', 'F', '2007-03-15', 'JZ-42-10-74-83 B', '01219909848', '238-1885 Purus Av.', 86724, 'er49', '2014-05-26 09:13:18', '2014-12-24 21:34:22', NULL, NULL),
(100, 'Gisela Spencer', 'M', '2007-08-14', 'JZ-70-09-50-10 B', '01914911477', '985-820 Ornare Av.', 55702, 'pe70', '2015-09-22 04:39:55', '2015-09-24 09:51:56', NULL, NULL),
(101, 'Aphrodite Kemp', 'F', '2022-10-14', 'JZ-41-34-35-83 B', '01310241273', 'P.O. Box 700, 2729 Nulla Rd.', 9249, 'er49', '2014-08-11 12:36:33', '2015-03-20 11:17:18', NULL, NULL),
(102, 'Bruce Baldwin', 'M', '2005-11-14', 'JZ-35-24-68-88 B', '01514517989', '6105 Augue Rd.', 59598, 'pe70', '2014-08-04 23:08:59', '2015-10-06 20:18:11', NULL, NULL),
(103, 'Sonia Slater', 'F', '2008-01-16', 'JZ-31-84-19-51 B', '01212087534', 'Ap #659-5322 Parturient Road', 63566, 'er49', '2015-04-01 20:11:28', '2014-09-30 17:04:37', NULL, NULL),
(106, 'Cameron Craig', 'm', '2004-02-05', 'JZ 55 77 66 99 k', '+447712255272', '83 Inveresk Road', 999, 'pe70', '2015-03-12 20:11:59', '2015-03-12 20:11:59', NULL, NULL),
(109, 'David Parker', 'm', '2001-03-03', 'JZ 55 77 66 99 p', '56456546', 'Football Steet', 999999, 'er49', '2015-03-12 21:28:57', '2015-03-12 21:28:57', NULL, NULL),
(110, 'Cameron Craig', 'M', '2005-02-04', '1234567', '07712255272', '83 Inveresk Road', 9999, 'pe70', '2015-03-13 11:11:04', '2015-03-13 11:11:04', NULL, NULL),
(111, 'Cameron Craig', 'M', '2006-01-02', '5345345', '+447712255272', '83 Inveresk Road', 345, 'pe70', '2015-03-13 11:25:33', '2015-03-13 11:25:33', NULL, NULL),
(112, 'Cameron Alexander Craig', 'M', '2005-04-06', '312312312', '+447712255272', '83 Inveresk Road', 21312, 'pe70', '2015-03-13 11:33:13', '2015-03-13 11:33:13', NULL, NULL),
(113, 'Cameron Alexander Craig', 'M', '2004-02-03', 't45345', '+447712255272', '83 Inveresk Road', 3422, 'pe70', '2015-03-13 11:33:51', '2015-03-13 11:33:51', NULL, NULL),
(114, 'Cameron Alexander Craig', 'M', '2005-03-02', '345345', '+447712255272', '83 Inveresk Road', 323, 'pe70', '2015-03-13 11:44:05', '2015-03-13 11:44:05', NULL, NULL),
(115, 'Cameron Alexander Craig', 'M', '2005-03-02', '3453453', '+447712255272', '83 Inveresk Road', 323, 'pe70', '2015-03-13 11:51:32', '2015-03-13 11:51:32', NULL, NULL),
(116, 'Cameron Craig', 'm', '2005-01-02', '53453455', '+447712255272', '83 Inveresk Road', 345, 'pe70', '2015-03-13 11:57:46', '2015-03-13 11:57:46', NULL, NULL),
(117, 'Cameron Alexander Craig', 'm', '2004-02-03', '5345466', '+447712255272', '83 Inveresk Road', 35345, 'pe70', '2015-03-13 12:03:21', '2015-03-13 12:03:21', NULL, NULL),
(118, 'Fraser Smith', 'M', '2005-01-02', '8979787', '789789', 'gfjfjb', 47657, 'pe70', '2015-03-13 12:08:40', '2015-03-13 12:08:40', NULL, NULL),
(188, 'fdsf', 'm', '2004-02-03', '45345', '345345', '345345', 34534, 'pe70', '2015-03-14 14:52:10', '2015-03-14 14:52:10', NULL, NULL),
(186, 'Cameron Alexander Craig', 'M', '2005-02-03', '231213', '+447712255272', '83 Inveresk Road', 1212, 'pe70', '2015-03-13 14:36:48', '2015-03-15 15:52:55', 'camieac', NULL),
(187, 'gg', 'm', '2004-01-01', 'fgfg', '545', '454', 454, 'pe70', '2015-03-14 13:33:32', '2015-03-14 13:33:32', NULL, NULL),
(189, 'Dupe NIS', 'F', '2004-03-03', 'AC F5 EK PL 2', '8989', 'DUPE NIS', 232, 'pe70', '2015-03-14 21:26:02', '2015-03-14 21:26:02', NULL, NULL),
(190, 'Cameron Alexander Craig', 'F', '2005-02-03', '8888888', '+447712255272', '83 Inveresk Road', 54545, 'pe70', '2015-03-14 21:33:31', '2015-03-14 21:35:58', 'camieac', NULL),
(191, 'Scarlett Johansson', 'F', '1992-06-03', '597328', '5245435', 'Hollywood', 999999, 'neque.', '2015-03-14 22:35:42', '2015-03-14 22:35:42', 'ScarlettJ', NULL),
(192, 'Scarlett Johansson', 'F', '1992-06-03', '5973281', '5245435', 'Hollywood', 999999, 'neque.', '2015-03-14 22:37:48', '2015-03-14 22:37:48', 'ScarlettJ', NULL),
(193, 'Scarlett Johansson', 'F', '1992-06-03', '59732810', '5245435', 'Hollywood', 999999, 'neque.', '2015-03-14 22:40:25', '2015-03-14 22:40:25', 'ScarlettJ', NULL),
(194, 'Scarlett Johansson', 'F', '1992-06-03', '507565', '5245435', 'Hollywood', 999999, 'neque.', '2015-03-14 22:47:50', '2015-03-14 22:47:50', 'ScarlettJ', NULL),
(195, 'Scarlett Johansson', 'F', '1992-06-03', '90905673', '5245435', 'Hollywood', 999999, 'neque.', '2015-03-14 22:48:52', '2015-03-14 22:48:52', 'ScarlettJ', NULL),
(201, 'Image Image', 'F', '2004-08-05', 'ghkjhjb', '92830921', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:16:02', '2015-03-16 21:16:02', 'camieac', NULL),
(202, 'Image Image', 'F', '2004-08-05', 'lmkplm', '92830921', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:34:23', '2015-03-16 21:34:23', 'camieac', NULL),
(203, 'Image Image', 'F', '2004-08-05', '567567', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:40:35', '2015-03-16 21:40:35', 'camieac', NULL),
(204, 'Image Image', 'F', '2004-08-05', '354380-', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:40:52', '2015-03-16 21:40:52', 'camieac', NULL),
(205, 'Image Image', 'F', '2004-08-05', '354380-4', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:42:20', '2015-03-16 21:42:20', 'camieac', NULL),
(206, 'Image Image', 'F', '2004-08-05', '90678f', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:44:45', '2015-03-16 21:44:45', 'camieac', NULL),
(207, 'Image Image', 'F', '2004-08-05', '9fdgdf', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:50:22', '2015-03-16 21:50:22', 'camieac', NULL),
(259, 'Cameron Craig', 'M', '2015-03-10', 'JB555555555', '3123123', 'sdasdasd', 12312, 'sad', '2015-03-26 15:50:24', '2015-03-26 15:50:24', 'camieac', ''),
(209, 'Image Image', 'F', '2004-08-05', '9fdgdfda', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:52:22', '2015-03-16 21:52:22', 'camieac', NULL),
(210, 'Image Image', 'F', '2004-08-05', '9fdgdfddgf', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:54:00', '2015-03-16 21:54:00', 'camieac', NULL),
(211, 'Image Image', 'F', '2004-08-05', 'fxcxzc', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:54:59', '2015-03-16 21:54:59', 'camieac', NULL),
(212, 'Image Image', 'F', '2004-08-05', 'bcvb', '709809', 'PHP Avenue', 34, 'pede.', '2015-03-16 21:57:18', '2015-03-16 21:57:18', 'camieac', NULL),
(256, 'Bob Boogie', 'M', '1988-09-12', 'aaaaasdasd', '34345345', 'dfgsdfgxzdf', 1001, 'pe70', '2015-03-23 13:38:56', '2015-03-24 00:50:43', 'jam', 'da9eeca5481cf32e98ca9f8ebd3a5af08bd83c1f.jpg'),
(226, 'Gerard Butler', 'M', '2002-01-02', 'n54645645', '6456456', 'fgdfg', 3453, 'er49', '2015-03-17 10:50:43', '2015-03-17 10:50:43', 'harrypotter', ''),
(227, 'Gerard Butler', 'M', '2002-01-02', 'n546456456', '6456456', 'fgdfg', 3453, 'er49', '2015-03-17 10:59:14', '2015-03-17 10:59:14', 'harrypotter', ''),
(228, 'Gerard Butler', 'M', '2002-01-02', 'n546456456a', '6456456', 'fgdfg', 3453, 'er49', '2015-03-17 11:02:51', '2015-03-17 11:02:51', 'harrypotter', ''),
(236, 'Image Image', 'M', '2015-03-10', 'AC F5 EK PL', '35453454', 'desfdsfdsf', 999999, 'Proin', '2015-03-19 21:09:27', '2015-03-26 12:05:13', 'eevblog', 'hashed value of nis goes here'),
(255, 'Stuart Thain', 'M', '1991-10-31', 'JG 48 97 96 B', '767867868', 'b n nbvnjvgj', 856758, 'Proin', '2015-03-23 11:37:12', '2015-03-23 11:37:12', 'camieac', 'cae2f34755296b9ffc83125e51aa6808950073ea.png'),
(251, 'Cameron Alexander Craig', 'M', '2015-03-02', 'fd54rdrg', '+447712255272', '83 Inveresk Road', 5345, 'pe70', '2015-03-20 17:46:37', '2015-03-20 17:46:37', 'camieac', '13ef214c519ff0629c5cacb5d5f6d8efe6dda3b7.png'),
(252, 'Cameron Alexander Craig', 'M', '2015-03-02', 'fd54rdrgs', '+447712255272', '83 Inveresk Road', 5345, 'pe70', '2015-03-20 17:47:08', '2015-03-20 17:47:08', 'camieac', 'b29525061c16efbf4abed35b6d3d4428c7362b3b.png'),
(253, 'Cameron Alexander Craig', 'M', '2015-03-02', 'fd54rdrgsd', '+447712255272', '83 Inveresk Road', 3640, 'pe70', '2015-03-20 17:50:55', '2015-03-20 17:50:55', 'camieac', '9d8663339abbbeb1271d3f0e0811c21cdf15f02d.png'),
(254, 'Cameron Alexander Craig', 'M', '2015-03-10', 'fge54gfd', '+447712255272', '83 Inveresk Road', 3423, 'pe70', '2015-03-20 18:05:37', '2015-03-20 18:06:39', 'camieac', 'cf17850457dda2f4b3e95605531e232333a05692.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `customer`, `fa`, `created`, `modified`, `event_type_id`, `start`, `end`, `all_day`, `status`, `active`) VALUES
(37, 'James Bond Meeting', 'Specre front-row seats', 7, 'sed', '2015-03-20 23:00:41', '2015-03-25 14:39:37', 1, '2015-03-10 22:00:00', '2015-03-20 11:00:00', 0, 'Scheduled', 1),
(38, 'Meeting with Mr Parker', 'Discussing savings ', 101, 'pe70', '2015-03-23 09:18:23', '2015-03-25 17:15:50', 0, '2015-03-24 09:30:00', '1970-01-01 01:00:00', 1, 'Scheduled', 1);

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

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(1, 'Meeting', 'Blue'),
(2, 'Dinner', 'Red'),
(3, 'Raving', 'Orange');

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
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  KEY `stock` (`stock`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `stock`, `customer`, `quantity`, `price`, `created`, `modified`) VALUES
(1, 3, 1, 10, '45.58', '2015-02-23 13:41:06', NULL),
(2, 1, 1, 2, '540.49', '2015-02-23 13:41:06', NULL),
(7, 1, 18, 100, '0', '2015-03-14 19:45:55', '2015-03-14 19:45:55'),
(8, 1, 18, 100, '0', '2015-03-14 19:50:47', '2015-03-14 19:50:47'),
(5, 2, 1, 6, '0', '2015-03-12 18:02:58', '2015-03-12 18:02:58'),
(6, 1, 110, 66, '0', '2015-03-13 11:15:43', '2015-03-13 11:15:43'),
(9, 5, 18, 77, '0', '2015-03-14 19:51:02', '2015-03-14 19:51:02'),
(10, 1, 8, 9, '4925.88', '2015-03-16 18:40:28', '2015-03-16 18:40:28'),
(11, 1, 8, 90, '49258.8', '2015-03-16 18:40:56', '2015-03-16 18:40:56'),
(12, 1, 8, 6, '3327.06', '2015-03-17 18:54:35', '2015-03-17 18:54:35'),
(13, 3, 8, 2, '83.39', '2015-03-18 14:39:17', '2015-03-18 14:39:17'),
(15, 1, 10, 2, '1101.68', '2015-03-18 14:44:24', '2015-03-18 14:44:24'),
(16, 2, 10, 5, '218.9', '2015-03-18 14:44:29', '2015-03-18 14:44:29'),
(17, 7, 10, 7, '128.8', '2015-03-18 14:44:34', '2015-03-18 14:44:34'),
(18, 7, 10, 7, '128.8', '2015-03-18 14:44:34', '2015-03-18 14:44:34'),
(19, 4, 253, 9, '1147.5', '2015-03-20 18:03:05', '2015-03-20 18:03:05'),
(20, 1, 253, 1, '557.99', '2015-03-20 18:04:19', '2015-03-20 18:04:19'),
(21, 1, 35, 1, '557.99', '2015-03-20 18:20:11', '2015-03-20 18:20:11'),
(22, 316, 256, 1, '8.68', '2015-03-24 00:52:12', '2015-03-24 00:52:12'),
(23, 316, 256, 1, '8.68', '2015-03-24 00:54:16', '2015-03-24 00:54:16'),
(24, 318, 256, 1, '68.55', '2015-03-24 00:54:42', '2015-03-24 00:54:42'),
(26, 1067, 256, 1, '558.81', '2015-03-24 14:35:13', '2015-03-24 14:35:13'),
(27, 1067, 256, 1, '558.81', '2015-03-24 14:35:18', '2015-03-24 14:35:18'),
(28, 1067, 8, 3, '2850.95', '2015-03-25 13:07:42', '2015-03-25 15:19:14'),
(29, 1067, 8, 7, '3991.33', '2015-03-25 13:07:55', '2015-03-25 13:07:55'),
(30, 1067, 8, 5, '2850.95', '2015-03-25 13:08:25', '2015-03-25 13:08:25'),
(31, 1067, 8, 1, '570.19', '2015-03-25 13:08:55', '2015-03-25 13:08:55'),
(32, 1067, 258, 200, '114038', '2015-03-26 10:48:19', '2015-03-26 10:48:19'),
(33, 1067, 16, 45, '25145.1', '2015-03-26 16:02:50', '2015-03-26 16:02:50');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `symbol` (`symbol`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1070 ;

--
-- Dumping data for table `stocklists`
--

INSERT INTO `stocklists` (`id`, `symbol`, `created`, `name`, `exchange`, `category`) VALUES
(1067, 'GOOG', '2015-03-24 10:29:03', NULL, NULL, NULL),
(1068, 'INTC', '2015-03-24 10:29:17', NULL, NULL, NULL),
(1069, 'APPL', '2015-03-24 18:00:01', NULL, NULL, NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `index1`, `index2`, `index3`, `index4`, `home_twitter`, `name`) VALUES
(1, 'admin', '$2a$10$ZZkkXB1O.K1/n.DvgHsKg.4.fKIREBZQxk60cztBR0J9H8wYy6IKO', 'admin', '2015-02-23 13:37:48', '2015-03-25 16:45:40', 'AAPL', 'GOOG', 'YHOO', 'INTC', 'Finance', NULL),
(2, 'pe70', '$2a$10$rIAVfHNlL6apdvPRlyp17uRybio6aGOZXYMSyaN03UFT16Z1STc1m', 'fa', '2015-02-23 13:38:04', '2015-02-23 13:38:04', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'er49', '$2a$10$eAYK8./J3IDU5wMcHlMfx.6tIE/i1/zB63bRjKPR1DswBjTPHRRqO', 'fa', '2015-02-23 13:38:12', '2015-02-23 13:38:12', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'admin', '$2a$10$jqbmAGsvknh4MnsG9JKLquq9IiZ3DCrii1vlGighR0h09NZ7bJLde', 'admin', '2015-03-09 14:35:49', '2015-03-09 14:35:49', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'admin', '$2a$10$0OKLuTdlB2z/7W7yjceFjOGOVEevoQob7weKDKaj06AU5nS/rXwfm', 'admin', '2015-03-09 14:38:49', '2015-03-09 14:38:49', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'admin', '$2a$10$q1JaliqOnL5JJxlq8w9bOuu/tPJ63wDjGKkRbg..c5fZaRmIx/nbe', 'admin', '2015-03-09 14:38:57', '2015-03-09 14:38:57', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'admin', '$2a$10$mj6FIVVP2swIgAUUoyJjHeq6JKPX2C1lXhPmyUNioW.4BQKS1B0PS', 'admin', '2015-03-09 14:40:07', '2015-03-09 14:40:07', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'admin1', '$2a$10$xDVQXkeLjGssMDIcVmWlNepMwLYHWAvbVLfqs6HvQvNWk8bqM11Ja', 'admin', '2015-03-16 13:19:30', '2015-03-16 13:19:30', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'camieac', '$2a$10$16qmx5vBsoD07ziyju6uPeaSXRs5GIC7GGFyfUbdPHtlYiXmvF0HG', 'admin', '2015-03-24 14:05:45', '2015-03-24 15:06:30', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Morbi', '$2a$10$q5wD/BULwwEcgjYg.q3NfemSnKzmLpWWnN4UpuzJiNqYXReYjVCHy', 'admin', '2015-03-25 12:13:53', '2015-03-25 12:13:53', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'camieac', '$2a$10$4cDD8UNucTkYVQu1D/7B7OVbBXJZoQB2Fy0Mrp2pyxrgu1Psgnx3W', 'admin', '2015-03-26 14:38:07', '2015-03-26 14:38:07', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Em123', '$2a$10$eaLp3omZ/Vn4B4CQpgjYOOcJTSZHAg1YZTpqc5zTTUbTRtgaCB0NS', 'fa', '2015-03-26 14:48:01', '2015-03-26 14:48:01', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'cac30', '$2a$10$7Ye6u52/hroNPPRN35HMFeEaNNBPkVLHB2DUAlv0HtBWHAnliUlGy', 'admin', '2015-03-26 14:58:21', '2015-03-26 14:58:21', NULL, NULL, NULL, NULL, NULL, 'Cameron Alexander Craig'),
(14, 'Camron', '$2a$10$o2KX7T/2bFHurIFaDvB8h.yZiPXhhc64WDcxaKhN7fo1pxOFtun/y', 'admin', '2015-03-26 15:01:23', '2015-03-26 15:01:23', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'Camron '),
(15, 'asd', '$2a$10$trUeWN2X6LbEJKyId7IVGOQ.7AM.BHK4LEtkIaaSnjc0N9TsI1tba', 'admin', '2015-03-26 15:06:47', '2015-03-26 15:06:47', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'Caasdasdsa'),
(16, 'asd', '$2a$10$eBQXfpf7qHZ2Rsi6336Js.iDPa/Nk2N0vW1bxAkb7gzuA5babaNTO', 'admin', '2015-03-26 15:09:33', '2015-03-26 15:09:33', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'Caasdasdsa'),
(17, 'cas', '$2a$10$xIlLwDbOAROIsESvwvLkR.lIo5xnCvfgZueXgIEXOFV3LJUm13WjG', 'admin', '2015-03-26 15:10:40', '2015-03-26 15:10:40', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'Caasasasasasasasasasasasasasasasasas'),
(18, 'a', '$2a$10$pqZfK3xqapk1XMs2u5cApOCOHkBowzC82uga1e.1UV4EMBHbCA0Cq', 'admin', '2015-03-26 15:14:27', '2015-03-26 15:14:27', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(19, 'fa', '$2a$10$vyk2gB4n3/mHcgIatwvnZeA71Gg9T6YO5vpBtWDwwVa8gJnFtXfhS', 'fa', '2015-03-26 15:20:32', '2015-03-26 15:20:32', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'FA'),
(20, 'sad', '$2a$10$kKod7eB.0156SjYdkhWt..P08bduklFulSvHc7iJxku9QOD97lhiW', 'fa', '2015-03-26 15:38:45', '2015-03-26 15:38:45', 'AAPL', 'GOOG', 'INTC', 'YHOO', NULL, 'sasa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
