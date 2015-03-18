
--
-- Table structure for table `twilio`
--

CREATE TABLE IF NOT EXISTS `twilio` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memo` varchar(300) NOT NULL,
  `fromnum` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `twiliotest`
--

CREATE TABLE IF NOT EXISTS `twiliotest` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dump` varchar(40000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
