-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: www.cambrian3940.net
-- Generation Time: Mar 14, 2015 at 05:33 PM
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
-- Table structure for table `twiliotest`
--

CREATE TABLE IF NOT EXISTS `twiliotest` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dump` varchar(40000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twiliotest`
--

INSERT INTO `twiliotest` (`ts`, `dump`) VALUES
('2015-03-11 22:45:56', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM73fcf6540d8dfcfb55fe69cbd8f5be41\nNumMedia=0\nToCity=ORLANDO\nFromZip=55415\nSmsSid=SM73fcf6540d8dfcfb55fe69cbd8f5be41\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Test\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM73fcf6540d8dfcfb55fe69cbd8f5be41\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16124120947\nApiVersion=2010-04-01\n'),
('2015-03-11 22:45:56', '+16124120947'),
('2015-03-11 22:46:28', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM2db0f7af0f6dee9edae894f19d23d0bf\nNumMedia=0\nToCity=ORLANDO\nFromZip=55112\nSmsSid=SM2db0f7af0f6dee9edae894f19d23d0bf\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Hell yeah\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM2db0f7af0f6dee9edae894f19d23d0bf\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16517951229\nApiVersion=2010-04-01\n'),
('2015-03-11 22:46:28', '+16517951229'),
('2015-03-11 22:46:31', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM9df6f856c5ecacc6470646144edd2901\nNumMedia=0\nToCity=ORLANDO\nFromZip=55128\nSmsSid=SM9df6f856c5ecacc6470646144edd2901\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Seis752 in class demo!:-)\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM9df6f856c5ecacc6470646144edd2901\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16514852663\nApiVersion=2010-04-01\n'),
('2015-03-11 22:46:31', '+16514852663'),
('2015-03-11 22:46:39', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM36704326f4b5e63b7a100d48005cab4b\nNumMedia=0\nToCity=ORLANDO\nFromZip=55421\nSmsSid=SM36704326f4b5e63b7a100d48005cab4b\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Hi\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM36704326f4b5e63b7a100d48005cab4b\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16122146795\nApiVersion=2010-04-01\n'),
('2015-03-11 22:46:39', '+16122146795'),
('2015-03-11 22:46:40', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM9d89b907b031fe9c5cc84be72a9695ea\nNumMedia=0\nToCity=ORLANDO\nFromZip=55449\nSmsSid=SM9d89b907b031fe9c5cc84be72a9695ea\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Justin testing Twilio\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM9d89b907b031fe9c5cc84be72a9695ea\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16125903270\nApiVersion=2010-04-01\n'),
('2015-03-11 22:46:40', '+16125903270'),
('2015-03-11 22:47:01', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM0492b220d85bc6c654a80a735f103447\nNumMedia=0\nToCity=ORLANDO\nFromZip=55043\nSmsSid=SM0492b220d85bc6c654a80a735f103447\nFromState=MN\nSmsStatus=received\nFromCity=ST CROIX BEACH\nBody=Test from Google Voice\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM0492b220d85bc6c654a80a735f103447\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16513212347\nApiVersion=2010-04-01\n'),
('2015-03-11 22:47:01', '+16513212347'),
('2015-03-11 22:51:14', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM6b456aec1e623b6eb22c177e091c91bb\nNumMedia=0\nToCity=ORLANDO\nFromZip=55421\nSmsSid=SM6b456aec1e623b6eb22c177e091c91bb\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=Second test using the correct nbr this time \nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM6b456aec1e623b6eb22c177e091c91bb\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16512858434\nApiVersion=2010-04-01\n'),
('2015-03-11 22:51:14', '+16512858434'),
('2015-03-11 23:37:57', 'ToCountry=US\nToState=FL\nSmsMessageSid=SM9e3edd4926796c475a464b7c628de9a9\nNumMedia=0\nToCity=ORLANDO\nFromZip=55415\nSmsSid=SM9e3edd4926796c475a464b7c628de9a9\nFromState=MN\nSmsStatus=received\nFromCity=MINNEAPOLIS\nBody=test 6\nFromCountry=US\nTo=+13214222456\nToZip=32824\nMessageSid=SM9e3edd4926796c475a464b7c628de9a9\nAccountSid=ACaf5659b2142c8674fde13fe40549d111\nFrom=+16122341615\nApiVersion=2010-04-01\n'),
('2015-03-11 23:37:57', '+16122341615');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
