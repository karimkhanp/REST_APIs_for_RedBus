-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2014 at 06:51 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saffari`
--

-- --------------------------------------------------------

--
-- Table structure for table `fruit`
--

CREATE TABLE IF NOT EXISTS `fruit` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `fruit` varchar(255) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fruit`
--

INSERT INTO `fruit` (`sno`, `fruit`, `variety`, `name`) VALUES
(1, 'Apple', 'Apple', 'Apple'),
(2, 'Apple', 'Apple', 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `varstatus` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `username`, `password`, `city`, `varstatus`, `date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'All', 'Active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agentpayment`
--

CREATE TABLE IF NOT EXISTS `tbl_agentpayment` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `agenttype` varchar(255) NOT NULL,
  `agentid` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_agentpayment`
--

INSERT INTO `tbl_agentpayment` (`sno`, `agenttype`, `agentid`, `agent_name`, `amount`, `date`, `remarks`, `payment_type`) VALUES
(1, 'PR', '6', 'parandhagan', 13000, '2014-03-27', 'view', 'Cheque'),
(9, 'PR', '8', 'prakash', 25000, '2014-03-04', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agentseatallotment`
--

CREATE TABLE IF NOT EXISTS `tbl_agentseatallotment` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `cutt_time` varchar(255) NOT NULL,
  `agent_id` varchar(255) NOT NULL,
  `tot_alloted_seats` varchar(255) NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_agentseatallotment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_blockservices`
--

CREATE TABLE IF NOT EXISTS `tbl_blockservices` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `varstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_blockservices`
--

INSERT INTO `tbl_blockservices` (`sno`, `service_name`, `from_date`, `to_date`, `varstatus`) VALUES
(2, '1', '3/3/2014', '3/5/2014', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boardingpoint`
--

CREATE TABLE IF NOT EXISTS `tbl_boardingpoint` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `station` varchar(255) NOT NULL,
  `boardingpointname` varchar(255) NOT NULL,
  `boardingpointsname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_boardingpoint`
--

INSERT INTO `tbl_boardingpoint` (`sno`, `station`, `boardingpointname`, `boardingpointsname`, `address`, `landmark`, `status`) VALUES
(3, '14', 'avinashi busstand', 'avinashi busstand', 'gfgggf ', '12345', ''),
(4, '14', 'aravind hospital', 'near', 'sdff fsffs sfsffsfs', 'sffs', ''),
(5, '15', 'cental', 'dfdfd', 'cental', 'cental', ''),
(6, '15', 'CMBT', 'CMBT', 'CMBT', 'CMBT', ''),
(7, '15', 'yesso bpo', 'yesso bpo', 'yesso bpo', 'yesso bpo', ''),
(8, '16', 'cinniyampalayam', 'cinniyampalayam', 'cinniyampalayam', 'cinniyampalayam', ''),
(9, '16', 'SITRA', 'SITRA', 'SITRA', 'SITRA', ''),
(10, '16', 'Pellamedu', 'Pellamedu', 'Pellamedu', 'NEAR PSG COLLEGE', ''),
(11, '16', 'GANDHIPURAM', 'GANDHIPURAM', 'GANDHIPURAM', 'GANDHIPURAM', ''),
(12, '12', 'OLD BUSTAND', 'OLD BUSTAND', 'OLD BUSTAND', 'OLD BUSTAND', ''),
(13, '12', 'NEW BUSSTAND', 'NEW BUSSTAND', 'NEW BUSSTAND', 'NEW BUSSTAND', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branceoffice`
--

CREATE TABLE IF NOT EXISTS `tbl_branceoffice` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `branchofficename` varchar(255) NOT NULL,
  `branchofficecode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_branceoffice`
--

INSERT INTO `tbl_branceoffice` (`sno`, `division`, `branch`, `branchofficename`, `branchofficecode`, `status`) VALUES
(3, '2', '2', 'SAFFARI TRAVELS', 'gfgbhghfhf', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`sno`, `division`, `branch`, `status`) VALUES
(2, '2', 'fghhfh', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bustype`
--

CREATE TABLE IF NOT EXISTS `tbl_bustype` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `bustype` varchar(255) NOT NULL,
  `bustype_sname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_bustype`
--

INSERT INTO `tbl_bustype` (`sno`, `bustype`, `bustype_sname`, `category`, `status`) VALUES
(4, 'test1', 'test3', '9', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE IF NOT EXISTS `tbl_cancel` (
  `sno` int(120) NOT NULL AUTO_INCREMENT,
  `way` varchar(120) NOT NULL,
  `from` varchar(120) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `seat` varchar(200) NOT NULL,
  `board` varchar(200) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `age` int(120) NOT NULL,
  `mobile` bigint(120) NOT NULL,
  `seesion_id` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bookeddate` date NOT NULL,
  `bookedfrom` varchar(255) NOT NULL,
  `bookeduser` varchar(255) NOT NULL,
  `ticketnumber` varchar(255) NOT NULL,
  `returnamount` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_cancel`
--

INSERT INTO `tbl_cancel` (`sno`, `way`, `from`, `to`, `date1`, `seat`, `board`, `amount`, `name`, `gender`, `age`, `mobile`, `seesion_id`, `service_id`, `email`, `bookeddate`, `bookedfrom`, `bookeduser`, `ticketnumber`, `returnamount`) VALUES
(1, 'one', '15', '16', '2014-03-01', ',1', '5', '127', 'parandhagan', '', 0, 9976422215, '', 1, '', '2014-02-28', '', '', 'SA0007', ''),
(2, 'one', '15', '16', '2014-02-28', ',13', '', '127', 'parandhagan', '', 0, 9976422216, '', 1, '', '2014-02-28', '', '', 'SA000', ''),
(3, 'one', '15', '16', '2014-03-07', ',3', '5', '122', 'parandhagan', '', 0, 9976422215, '', 2, '', '2014-03-01', '', '', 'SA00019', '110'),
(4, 'one', '15', '16', '2014-03-07', ',2', '5', '122', 'parandhagan', '', 0, 9976422215, '', 2, '', '2014-03-01', '', '', 'SA00018', '110'),
(5, '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', 0, '', '2014-03-01', '', '', '', '0'),
(6, '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', 0, '', '2014-03-01', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  `catsname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`sno`, `catname`, `catsname`, `status`) VALUES
(9, 'new', 'new1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confirmed`
--

CREATE TABLE IF NOT EXISTS `tbl_confirmed` (
  `sno` int(120) NOT NULL AUTO_INCREMENT,
  `way` varchar(120) NOT NULL,
  `from` varchar(120) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `seat` varchar(200) NOT NULL,
  `board` varchar(200) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `age` int(120) NOT NULL,
  `mobile` bigint(120) NOT NULL,
  `seesion_id` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bookeddate` date NOT NULL,
  `bookedfrom` varchar(255) NOT NULL,
  `bookeduser` varchar(255) NOT NULL,
  `ticketnumber` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_confirmed`
--

INSERT INTO `tbl_confirmed` (`sno`, `way`, `from`, `to`, `date1`, `seat`, `board`, `amount`, `name`, `gender`, `age`, `mobile`, `seesion_id`, `service_id`, `email`, `bookeddate`, `bookedfrom`, `bookeduser`, `ticketnumber`) VALUES
(1, 'one', '15', '16', '2014-03-08', ',31,32', '', '254', 'parandhagan', '', 0, 9976422215, '', 1, '', '2014-03-08', '', '', 'SA000'),
(2, 'one', '15', '16', '2014-03-08', ',1', '', '127', 'fgfg', '', 0, 0, '', 1, '', '2014-03-08', '', '', 'SA0001'),
(3, 'one', '15', '16', '2014-03-08', ',2', '', '127', 'parandhagan', '', 0, 9976422215, '', 1, '', '2014-03-08', '', '', 'SA0002'),
(4, 'one', '15', '16', '2014-03-10', ',1,2', '', '254', 'parandhagan', '', 0, 9976422215, '', 1, '', '2014-03-10', '', '', 'SA0003'),
(5, 'one', '15', '16', '2014-03-11', ',4,34', '', '1270', 'parandhagan', '', 0, 9976422215, '', 4, '', '2014-03-11', '', '', 'SA0004');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE IF NOT EXISTS `tbl_division` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`sno`, `division_name`, `status`) VALUES
(2, 'dfgggg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fair`
--

CREATE TABLE IF NOT EXISTS `tbl_fair` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `seat_fare` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `reach_time` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_fair`
--

INSERT INTO `tbl_fair` (`sno`, `source`, `destination`, `seat_fare`, `start_time`, `reach_time`, `day`, `service_id`, `from_date`, `to_date`, `status`) VALUES
(1, '15', '13', '123', '11:50 PM', '10:50 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(2, '15', '12', '125', '11:50 PM', '09:40 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(3, '15', '16', '127', '11:50 PM', '09:55 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(4, '13', '12', '128', '10:50 AM', '09:40 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(5, '13', '16', '129', '10:50 AM', '09:55 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(6, '12', '16', '130', '09:40 AM', '09:55 AM', '0', 1, '0000-00-00', '0000-00-00', ''),
(7, '15', '12', '121', '02:10 AM', '01:05 AM', '1', 2, '0000-00-00', '0000-00-00', ''),
(8, '15', '16', '122', '02:10 AM', '02:10 AM', '1', 2, '0000-00-00', '0000-00-00', ''),
(9, '12', '16', '123', '01:05 AM', '02:10 AM', '1', 2, '0000-00-00', '0000-00-00', ''),
(10, '', '', '', '', '', '', 3, '0000-00-00', '0000-00-00', ''),
(11, '15', '16', '635', '10:00 PM', '04:25 AM', '1', 4, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE IF NOT EXISTS `tbl_guest` (
  `sno` int(120) NOT NULL AUTO_INCREMENT,
  `way` varchar(120) NOT NULL,
  `from` varchar(120) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `seat` varchar(200) NOT NULL,
  `board` varchar(200) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `age` int(120) NOT NULL,
  `mobile` bigint(120) NOT NULL,
  `seesion_id` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `traveller_name` varchar(255) NOT NULL,
  `traveller_phone` varchar(255) NOT NULL,
  `bookeddate` date NOT NULL,
  `bookedfrom` varchar(255) NOT NULL,
  `bookeduser` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_guest`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_layout`
--

CREATE TABLE IF NOT EXISTS `tbl_layout` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL,
  `lower1` varchar(255) NOT NULL,
  `lower2` varchar(255) NOT NULL,
  `lower3` varchar(255) NOT NULL,
  `lower4` varchar(255) NOT NULL,
  `lower5` varchar(255) NOT NULL,
  `lower6` varchar(255) NOT NULL,
  `lower7` varchar(255) NOT NULL,
  `lower8` varchar(255) NOT NULL,
  `lower9` varchar(255) NOT NULL,
  `lower10` varchar(255) NOT NULL,
  `lower11` varchar(255) NOT NULL,
  `lower12` varchar(255) NOT NULL,
  `lower13` varchar(255) NOT NULL,
  `lower14` varchar(255) NOT NULL,
  `lower15` varchar(255) NOT NULL,
  `lower16` varchar(255) NOT NULL,
  `lower17` varchar(255) NOT NULL,
  `lower18` varchar(255) NOT NULL,
  `upper1` varchar(255) NOT NULL,
  `upper2` varchar(255) NOT NULL,
  `upper3` varchar(255) NOT NULL,
  `upper4` varchar(255) NOT NULL,
  `upper5` varchar(255) NOT NULL,
  `upper6` varchar(255) NOT NULL,
  `upper7` varchar(255) NOT NULL,
  `upper8` varchar(255) NOT NULL,
  `upper9` varchar(255) NOT NULL,
  `upper10` varchar(255) NOT NULL,
  `upper11` varchar(255) NOT NULL,
  `upper12` varchar(255) NOT NULL,
  `upper13` varchar(255) NOT NULL,
  `upper14` varchar(255) NOT NULL,
  `upper15` varchar(255) NOT NULL,
  `upper16` varchar(255) NOT NULL,
  `upper17` varchar(255) NOT NULL,
  `upper18` varchar(255) NOT NULL,
  `bustype` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `l_capacity` int(11) NOT NULL,
  `l_rows` int(11) NOT NULL,
  `l_coloumns` int(11) NOT NULL,
  `l_divider_rows` int(11) NOT NULL,
  `l_birth_rows` varchar(255) NOT NULL,
  `u_capacity` varchar(255) NOT NULL,
  `u_rows` varchar(255) NOT NULL,
  `u_coloumns` varchar(255) NOT NULL,
  `u_divider_rows` varchar(255) NOT NULL,
  `u_birth_rows` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_layout`
--

INSERT INTO `tbl_layout` (`sno`, `lname`, `lower1`, `lower2`, `lower3`, `lower4`, `lower5`, `lower6`, `lower7`, `lower8`, `lower9`, `lower10`, `lower11`, `lower12`, `lower13`, `lower14`, `lower15`, `lower16`, `lower17`, `lower18`, `upper1`, `upper2`, `upper3`, `upper4`, `upper5`, `upper6`, `upper7`, `upper8`, `upper9`, `upper10`, `upper11`, `upper12`, `upper13`, `upper14`, `upper15`, `upper16`, `upper17`, `upper18`, `bustype`, `seat`, `birth`, `l_capacity`, `l_rows`, `l_coloumns`, `l_divider_rows`, `l_birth_rows`, `u_capacity`, `u_rows`, `u_coloumns`, `u_divider_rows`, `u_birth_rows`, `status`) VALUES
(2, 'CHENNAI TO COIMBATORE', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leftmainmenu`
--

CREATE TABLE IF NOT EXISTS `tbl_leftmainmenu` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `mainmenu` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_leftmainmenu`
--

INSERT INTO `tbl_leftmainmenu` (`sno`, `mainmenu`) VALUES
(1, 'BUS MANAGEMENT'),
(2, 'TRANSACTION REPORTS'),
(3, ' MASTER REPORTS'),
(4, 'MISCELLANEOUS'),
(5, 'LUGGAGE MENU'),
(6, 'REPORTS MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leftsubmenu`
--

CREATE TABLE IF NOT EXISTS `tbl_leftsubmenu` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `submenu` varchar(100) NOT NULL,
  `menuid` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_leftsubmenu`
--

INSERT INTO `tbl_leftsubmenu` (`sno`, `submenu`, `menuid`) VALUES
(1, 'BUS CATEGORIES', '1'),
(2, 'BUS TYPE', '1'),
(3, 'BUS LAYOUT', '1'),
(4, 'BUS STATIONS', '1'),
(5, 'BUS BOARDING POINTS', '1'),
(6, 'BUS ROUTE', '1'),
(7, 'PICK-UP CHART', '2'),
(8, 'PASSENGER REPORT', '2'),
(9, 'BOARDING PASSENGER REPORT', '2'),
(10, 'COLLECTION REPORT', '2'),
(11, 'STATIONS LIST', '3'),
(12, 'BOARDING POINTS LIST', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lower`
--

CREATE TABLE IF NOT EXISTS `tbl_lower` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `lowtotcapacity` int(40) NOT NULL,
  `lowtotalrows` int(30) NOT NULL,
  `lowtotalcolumns` int(50) NOT NULL,
  `lowdividerrow` int(50) NOT NULL,
  `lowberthrows` varchar(50) NOT NULL,
  `uptotcapacity` int(50) NOT NULL,
  `uptotalrows` int(50) NOT NULL,
  `uptotalcolumns` int(50) NOT NULL,
  `updividerrow` int(50) NOT NULL,
  `upberthrows` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_lower`
--

INSERT INTO `tbl_lower` (`sno`, `name`, `type`, `lowtotcapacity`, `lowtotalrows`, `lowtotalcolumns`, `lowdividerrow`, `lowberthrows`, `uptotcapacity`, `uptotalrows`, `uptotalcolumns`, `updividerrow`, `upberthrows`) VALUES
(2, 'dffdffd', '4', 37, 4, 12, 3, '1,2,4', 37, 4, 12, 3, '1,2,4'),
(13, 'SEMISLEEPER UST', '4', 37, 4, 12, 3, '1,2,4', 37, 4, 12, 3, '1,2,4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `memberid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobileno` varchar(200) NOT NULL,
  `landlineno` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `area` varchar(255) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `peraddress` text NOT NULL,
  `tempaddress` varchar(200) NOT NULL,
  `shipname` varchar(200) NOT NULL,
  `shipmobile` varchar(200) NOT NULL,
  `shipaddr` text NOT NULL,
  `oauth_provider` varchar(150) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`memberid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`memberid`, `name`, `lastname`, `email`, `password`, `mobileno`, `landlineno`, `country`, `area`, `state`, `city`, `zip`, `peraddress`, `tempaddress`, `shipname`, `shipmobile`, `shipaddr`, `oauth_provider`, `status`) VALUES
(14, 'parandhagan', '', 'sacpara21@gmail.com', '123456', '9976422215', '', '', 'fdffd', '', 'df', 'dfdfdf', 'fffdfdfd dfdf dffdfdfd', '', '', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newbusroute`
--

CREATE TABLE IF NOT EXISTS `tbl_newbusroute` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `routename` varchar(100) NOT NULL,
  `routeshortname` varchar(100) NOT NULL,
  `halts` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_newbusroute`
--

INSERT INTO `tbl_newbusroute` (`sno`, `source`, `destination`, `routename`, `routeshortname`, `halts`, `status`) VALUES
(10, '15', '16', 'newpara', 'para', ',13,12,11,', 'active'),
(9, '15', '16', 'Chennai to Coimbatore', 'che to cbe', ',12,13,14,', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newlayout`
--

CREATE TABLE IF NOT EXISTS `tbl_newlayout` (
  `sno` int(25) NOT NULL AUTO_INCREMENT,
  `layoutid` int(50) NOT NULL,
  `filedname` varchar(50) NOT NULL,
  `seatno` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

--
-- Dumping data for table `tbl_newlayout`
--

INSERT INTO `tbl_newlayout` (`sno`, `layoutid`, `filedname`, `seatno`, `type`) VALUES
(80, 2, 'cell11', '1', 'lower'),
(81, 2, 'cell13', '2', 'lower'),
(82, 2, 'cell15', '3', 'lower'),
(83, 2, 'cell17', '4', 'lower'),
(84, 2, 'cell19', '5', 'lower'),
(85, 2, 'cell111', '6', 'lower'),
(86, 2, 'cell21', '7', 'lower'),
(87, 2, 'cell23', '8', 'lower'),
(88, 2, 'cell25', '9', 'lower'),
(89, 2, 'cell27', '10', 'lower'),
(90, 2, 'cell29', '11', 'lower'),
(91, 2, 'cell211', '12', 'lower'),
(92, 2, 'cell312', '', 'lower'),
(93, 2, 'cell41', '13', 'lower'),
(94, 2, 'cell43', '14', 'lower'),
(95, 2, 'cell45', '15', 'lower'),
(96, 2, 'cell47', '16', 'lower'),
(97, 2, 'cell49', '17', 'lower'),
(98, 2, 'cell411', '18', 'lower'),
(99, 2, 'cell113', '19', 'upper'),
(100, 2, 'cell115', '20', 'upper'),
(101, 2, 'cell117', '21', 'upper'),
(102, 2, 'cell119', '22', 'upper'),
(103, 2, 'cell121', '23', 'upper'),
(104, 2, 'cell123', '24', 'upper'),
(105, 2, 'cell213', '25', 'upper'),
(106, 2, 'cell215', '26', 'upper'),
(107, 2, 'cell217', '27', 'upper'),
(108, 2, 'cell219', '28', 'upper'),
(109, 2, 'cell221', '29', 'upper'),
(110, 2, 'cell223', '30', 'upper'),
(111, 2, 'cell324', '', 'upper'),
(112, 2, 'cell413', '31', 'upper'),
(113, 2, 'cell415', '32', 'upper'),
(114, 2, 'cell417', '33', 'upper'),
(115, 2, 'cell419', '34', 'upper'),
(145, 13, 'cell13', '2', 'lower'),
(144, 13, 'cell11', '1', 'lower'),
(143, 2, 'cell421', '35', 'upper'),
(142, 2, 'cell423', '36', 'upper'),
(146, 13, 'cell15', '3', 'lower'),
(147, 13, 'cell17', '4', 'lower'),
(148, 13, 'cell19', '5', 'lower'),
(149, 13, 'cell111', '6', 'lower'),
(150, 13, 'cell21', '7', 'lower'),
(151, 13, 'cell23', '8', 'lower'),
(152, 13, 'cell25', '9', 'lower'),
(153, 13, 'cell27', '10', 'lower'),
(154, 13, 'cell29', '11', 'lower'),
(155, 13, 'cell211', '12', 'lower'),
(156, 13, 'cell312', '', 'lower'),
(157, 13, 'cell41', '13', 'lower'),
(158, 13, 'cell43', '14', 'lower'),
(159, 13, 'cell45', '15', 'lower'),
(160, 13, 'cell47', '16', 'lower'),
(161, 13, 'cell49', '17', 'lower'),
(162, 13, 'cell411', '18', 'lower'),
(163, 13, 'cell113', '19', 'upper'),
(164, 13, 'cell115', '20', 'upper'),
(165, 13, 'cell117', '21', 'upper'),
(166, 13, 'cell119', '22', 'upper'),
(167, 13, 'cell121', '23', 'upper'),
(168, 13, 'cell123', '24', 'upper'),
(169, 13, 'cell213', '25', 'upper'),
(170, 13, 'cell215', '26', 'upper'),
(171, 13, 'cell217', '27', 'upper'),
(172, 13, 'cell219', '28', 'upper'),
(173, 13, 'cell221', '29', 'upper'),
(174, 13, 'cell223', '30', 'upper'),
(175, 13, 'cell324', '', 'upper'),
(176, 13, 'cell413', '31', 'upper'),
(177, 13, 'cell415', '32', 'upper'),
(178, 13, 'cell417', '33', 'upper'),
(179, 13, 'cell419', '34', 'upper'),
(180, 13, 'cell421', '35', 'upper'),
(181, 13, 'cell423', '36', 'upper');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newstation`
--

CREATE TABLE IF NOT EXISTS `tbl_newstation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `stationname` varchar(255) NOT NULL,
  `stationsname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_newstation`
--

INSERT INTO `tbl_newstation` (`sno`, `stationname`, `stationsname`, `status`) VALUES
(17, 'Trichy', 'Trichy', 'active'),
(16, 'Coimbatore', 'CBE', 'active'),
(15, 'Chennai', 'MAS', 'active'),
(14, 'Avinashi', 'Avinashi', 'active'),
(13, 'Erode', 'Erode', 'active'),
(11, 'villupuram', 'VILU', 'active'),
(12, 'Salem', 'Salem', 'active'),
(18, 'madurai', 'Madurai', 'active'),
(19, 'virudunagar', 'virudunagar', 'active'),
(20, 'Tirunelveli', 'Tirunelveli', 'active'),
(21, 'Kanyakumari', 'Kanyakumari', 'active'),
(22, 'Nagarkovil', 'Nagarkovil', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `service_number` varchar(255) NOT NULL,
  `cutoff_time` varchar(255) NOT NULL,
  `service_desc` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  `book_from` date NOT NULL,
  `book_to` date NOT NULL,
  `travel_from` date NOT NULL,
  `travel_to` date NOT NULL,
  `online_days` varchar(255) NOT NULL,
  `agent_days` varchar(255) NOT NULL,
  `employee_days` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `service_mode` varchar(255) NOT NULL,
  `stop_name` varchar(255) NOT NULL,
  `dep_hour` varchar(255) NOT NULL,
  `dep_min` varchar(255) NOT NULL,
  `dep_am` varchar(255) NOT NULL,
  `dep_day` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`sno`, `service_name`, `service_number`, `cutoff_time`, `service_desc`, `layout`, `seat_no`, `book_from`, `book_to`, `travel_from`, `travel_to`, `online_days`, `agent_days`, `employee_days`, `route`, `service_mode`, `stop_name`, `dep_hour`, `dep_min`, `dep_am`, `dep_day`, `day`, `status`) VALUES
(1, 'chennai to coimbatore', '12679', '12:30', 'chennai est', '2', ',1s,2d,3,4,5,6,19,20,21,22,23,24,7,8,9,10,11,12,25,26,27,28,29,30,13,14,15,16,17,18,31,32,33,34,35,36', '2014-02-12', '2014-02-14', '2014-02-25', '2014-03-31', '12', '12', '21', '9', 'D', ',15,13,12,16', ',11,10,09,09', ',50,50,40,55', ',AM,AM,AM,AM', ',0,0,0,0', '', 'active'),
(2, 'dfdffd', '3730', 'fddf', 'fdfdfdfd', '2', ',1,2,3,4,5,6,19,20,21,22,23,24,7,8,9,10,11,12,25,26,27,28,29,30,13,14,15,16,17,18,31,32,33,34,35,36', '2014-02-18', '2014-02-22', '2014-02-28', '2014-03-28', '12', '12', 'dfdfdf', '9', 'D', ',15,12,16', ',02,01,02', ',10,05,10', ',AM,AM,AM', ',1,1,1', '', 'active'),
(4, 'kpn', '1346789', '2', 'sdds', '2', ',1,2,3,4,19,20,21,22,23,24,7,8,9,10,11,12,25,26,27,28,29,30,13,14,15,16,17,18,31,32,33,34,35,36', '2014-03-10', '2014-03-31', '2014-03-10', '2014-03-31', '12', '12', 'dfdfdf', '9', 'D', ',15,16', ',10,04', ',00,25', ',PM,AM', ',0,1', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_boarding`
--

CREATE TABLE IF NOT EXISTS `tbl_service_boarding` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `servic_id` varchar(255) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `boarding_points` varchar(255) NOT NULL,
  `halt_name` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `seq_no` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_service_boarding`
--

INSERT INTO `tbl_service_boarding` (`sno`, `servic_id`, `station_name`, `boarding_points`, `halt_name`, `landmark`, `seq_no`) VALUES
(1, '1', '', '', '', '', ''),
(2, '2', '15', '5', '12', '87175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(3, '2', '15', '6', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(4, '2', '15', '7', '10', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(5, '2', '12', '12', '11', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(6, '2', '12', '13', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(7, '3', '', '', '', '', ''),
(8, '4', '15', '5', '1', '87175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(9, '4', '15', '6', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(10, '4', '15', '7', '1', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_droping`
--

CREATE TABLE IF NOT EXISTS `tbl_service_droping` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `servic_id` varchar(255) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `boarding_points` varchar(255) NOT NULL,
  `halt_name` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `seq_no` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_service_droping`
--

INSERT INTO `tbl_service_droping` (`sno`, `servic_id`, `station_name`, `boarding_points`, `halt_name`, `landmark`, `seq_no`) VALUES
(1, '1', '', '', '', '', ''),
(2, '2', '12', '12', '12', '87175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(3, '2', '12', '13', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(4, '2', '16', '8', '11', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(5, '2', '16', '9', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', '3'),
(6, '2', '16', '10', 'asasasa', 'hhghgh', '3'),
(7, '2', '16', '11', 'hg', 'hgh', '3'),
(8, '3', '', '', '', '', ''),
(9, '4', '16', '8', '12', '87175500 Opp:Lakshmi Jewellery Near H.P pump', ''),
(10, '4', '16', '9', '12', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', ''),
(11, '4', '16', '10', '10', '9387175500 Opp:Lakshmi Jewellery Near H.P pump', ''),
(12, '4', '16', '11', '01:10', '9388795500', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stops`
--

CREATE TABLE IF NOT EXISTS `tbl_stops` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `service_no` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stop_name` varchar(255) NOT NULL,
  `dep_time1` varchar(255) NOT NULL,
  `dep_time2` varchar(255) NOT NULL,
  `dep_time3` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_stops`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_systemconfig`
--

CREATE TABLE IF NOT EXISTS `tbl_systemconfig` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `cutofftime` varchar(100) NOT NULL,
  `futureonline` int(50) NOT NULL,
  `futureagent` int(50) NOT NULL,
  `futureemployee` int(50) NOT NULL,
  `transfee` float NOT NULL,
  `agentcomm` float NOT NULL,
  `cancelcutoff` int(100) NOT NULL,
  `cancelemployee` int(50) NOT NULL,
  `cancelagent` int(50) NOT NULL,
  `cancelonline` int(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_systemconfig`
--

INSERT INTO `tbl_systemconfig` (`sno`, `cutofftime`, `futureonline`, `futureagent`, `futureemployee`, `transfee`, `agentcomm`, `cancelcutoff`, `cancelemployee`, `cancelagent`, `cancelonline`) VALUES
(1, '', 0, 0, 0, 0, 0, 1, 40, 40, 40),
(2, '', 0, 0, 0, 0, 0, 2, 30, 30, 30),
(3, '', 0, 0, 0, 0, 0, 3, 20, 20, 20),
(4, '', 0, 0, 0, 0, 0, 4, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_systemconfig2`
--

CREATE TABLE IF NOT EXISTS `tbl_systemconfig2` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `cutofftime` varchar(100) NOT NULL,
  `futureonline` int(50) NOT NULL,
  `futureagent` int(50) NOT NULL,
  `futureemployee` int(50) NOT NULL,
  `transfee` float NOT NULL,
  `agentcomm` float NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_systemconfig2`
--

INSERT INTO `tbl_systemconfig2` (`sno`, `cutofftime`, `futureonline`, `futureagent`, `futureemployee`, `transfee`, `agentcomm`, `status`) VALUES
(1, '1', 2, 3, 4, 5, 6, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `sno` int(11) NOT NULL,
  `way` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `seat` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_usermgt`
--

CREATE TABLE IF NOT EXISTS `tbl_usermgt` (
  `sno` int(150) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(200) NOT NULL,
  `userfirstname` varchar(200) NOT NULL,
  `userlastname` varchar(100) NOT NULL,
  `userloginid` varchar(100) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `userpassconfirm` varchar(255) NOT NULL,
  `useremail` varchar(150) NOT NULL,
  `usermainaddress` text NOT NULL,
  `usercellphone` bigint(100) NOT NULL,
  `userlandline` bigint(100) NOT NULL,
  `agnttype` varchar(100) NOT NULL,
  `totalcredit` int(100) NOT NULL,
  `agent_comm_type` varchar(50) NOT NULL,
  `comm_fixed_per` varchar(50) NOT NULL,
  `agentcommission` int(150) NOT NULL,
  `book_priv` varchar(50) NOT NULL,
  `agnt_book_priv` varchar(50) NOT NULL,
  `printtype` varchar(50) NOT NULL,
  `hintquestion` varchar(200) NOT NULL,
  `userhintanswer` varchar(250) NOT NULL,
  `divisionid` varchar(250) NOT NULL,
  `branchaddr` varchar(250) NOT NULL,
  `bookingoffice` varchar(200) NOT NULL,
  `con_per_name` varchar(200) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `con_phone_number` bigint(100) NOT NULL,
  `userstatus` varchar(20) NOT NULL,
  `busmngtprev` text NOT NULL,
  `transprev` varchar(200) NOT NULL,
  `masterprev` varchar(200) NOT NULL,
  `miscprev` varchar(200) NOT NULL,
  `parcelprev` varchar(200) NOT NULL,
  `bookprev` varchar(200) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_usermgt`
--

INSERT INTO `tbl_usermgt` (`sno`, `usertype`, `userfirstname`, `userlastname`, `userloginid`, `userpassword`, `userpassconfirm`, `useremail`, `usermainaddress`, `usercellphone`, `userlandline`, `agnttype`, `totalcredit`, `agent_comm_type`, `comm_fixed_per`, `agentcommission`, `book_priv`, `agnt_book_priv`, `printtype`, `hintquestion`, `userhintanswer`, `divisionid`, `branchaddr`, `bookingoffice`, `con_per_name`, `branch_name`, `con_phone_number`, `userstatus`, `busmngtprev`, `transprev`, `masterprev`, `miscprev`, `parcelprev`, `bookprev`) VALUES
(1, 'E', 'parandhagan', 'thalapathi', 'para3730', '0', '0', 'sacpara21@gmail.com', 'sdsdds', 9976422215, 4346246148, '', 0, 'C', 'F', 0, ',C,P,A,BL,', ',CN,M,', 'A4', 'Who are Your Favourite Travels?', 'cxcxcxcx', '2', '2', '3', '', '', 0, 'A', '', '', '', '', '', ''),
(8, 'A', 'prakash', 'priyadharsan', 'football', 'football3730', 'football3730', 'sacpara21@gmail.com', '21/15,kvkstreet,alandur,chennai', 9976422215, 4346246148, 'PR', 25000, 'C', 'F', 0, ',C,P,A,BL,', ',CN,M,', 'A4', 'Who are Your Favourite Travels?', 'cxcxcxcx', '2', '2', '3', 'dffdfd', 'fdfdfd', 0, 'A', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `bustype` varchar(255) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `regnumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`sno`, `bustype`, `vehicletype`, `regnumber`, `status`) VALUES
(2, '2', 'ssasa', 'saassa', 'active');
