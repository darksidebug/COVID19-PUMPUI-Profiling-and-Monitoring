-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 11:26 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pum`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_list`
--

CREATE TABLE IF NOT EXISTS `check_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `am` varchar(5) NOT NULL,
  `pm` varchar(5) NOT NULL,
  `day` varchar(10) NOT NULL,
  `temp` varchar(10) NOT NULL,
  `symptoms` text NOT NULL,
  `date_time_checked` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `check_list`
--

INSERT INTO `check_list` (`id`, `info_id`, `am`, `pm`, `day`, `temp`, `symptoms`, `date_time_checked`) VALUES
(2, 5, 'am', '', '1', '37 C', 'no-symptoms', '2020-03-22 09:08:40'),
(4, 5, 'am', '', '2', '39 C', 'no-symptoms', '2020-03-22 11:53:30'),
(5, 5, '', 'pm', '1', '39 C', 'no-symptoms', '2020-03-23 01:23:47'),
(6, 5, '', 'pm', '2', '40 C', 'runny-nose', '2020-03-23 03:49:20'),
(8, 5, 'am', '', '3', '36 C', 'cough', '2020-03-23 09:58:49'),
(9, 5, '', 'pm', '3', '23 C', 'sore-throat', '2020-03-23 10:43:46'),
(10, 5, '', 'pm', '1', '23 C', 'sore-throat', '2020-03-23 10:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_code` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `strt_purok` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `home_tel` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `person_code`, `age`, `gender`, `strt_purok`, `brgy`, `municipal`, `prov`, `home_tel`, `mobile`) VALUES
(5, 'SGD3PUM', 3, 'Male', 'Kasagbutan', 'Tagu-anan', 'Sogod', 'Southern Leyte', 'czxv', 'zcv'),
(6, 'SGD6PUM', 40, 'Male', 'Kalibunan', 'Nasaag', 'Sogod', 'Southern Leyte', '4534', '35634653');

-- --------------------------------------------------------

--
-- Table structure for table `travel_history`
--

CREATE TABLE IF NOT EXISTS `travel_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `travel_ask` varchar(5) NOT NULL,
  `port_exit` varchar(100) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `no` varchar(100) NOT NULL,
  `departure` varchar(50) DEFAULT NULL,
  `arrival` varchar(50) NOT NULL,
  `start_q` varchar(50) NOT NULL,
  `end_q` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `travel_history`
--

INSERT INTO `travel_history` (`id`, `info_id`, `travel_ask`, `port_exit`, `vehicle`, `no`, `departure`, `arrival`, `start_q`, `end_q`) VALUES
(4, 5, 'no', 'Port of Sogod', 'zcv', 'zcv', '2020-03-21', '2020-03-21', '2020-03-24', '2020-04-7'),
(5, 6, 'yes', 'Port of Bato', 'Patakag Sa', 'BusNo.-235f', '2020-03-14', '2020-03-15', '2020-03-16', '2020-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `user_pass` text NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `info_id`, `username`, `user_pass`, `user_type`) VALUES
(2, 5, 'zcxv', '$2y$10$BUoFCVxkRWkBHOc2JIiTWOBXErWIOpkH7nFp55lEwExLu.mGy/UHq', 'Client'),
(3, 6, 'nousername', '$2y$10$nCf/G7nRngSdPtUmYRSFOeJ/MzGNSvZwVu6J.whXAFZz4.qopP26S', 'Client'),
(4, 0, 'nobeginmasob@gmail.com', '$2y$10$eO9jpqzvc5YyjEu7QDwiseVuxVYrHxN7d7dncb32mjTUvra/kgD.6', 'Admin'),
(10, 0, 'nobeginmasob@gmail.c', '$2y$10$bn5RZ455c7kJgPnIm9I5W.CfUAvdeoiK/q6zdoRtxrFfjeMdDlR3q', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
