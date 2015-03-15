-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: www.cambrian3940.net
-- Generation Time: Mar 14, 2015 at 05:31 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `llhosts_ericbuhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `twilio`
--

CREATE TABLE IF NOT EXISTS `twilio` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memo` varchar(300) NOT NULL,
  `fromnum` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twilio`
--

INSERT INTO `twilio` (`ts`, `memo`, `fromnum`) VALUES
('2015-03-11 22:45:56', 'Test', '+16124120947'),
('2015-03-11 22:46:28', 'Hell yeah', '+16517951229'),
('2015-03-11 22:46:31', 'Seis752 in class demo!:-)', '+16514852663'),
('2015-03-11 22:46:39', 'Hi', '+16122146795'),
('2015-03-11 22:46:40', 'Justin testing Twilio', '+16125903270'),
('2015-03-11 22:47:01', 'Test from Google Voice', '+16513212347'),
('2015-03-11 22:51:14', 'Second test using the correct nbr this time ', '+16512858434'),
('2015-03-11 23:37:57', 'test 6', '+16122341615');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
