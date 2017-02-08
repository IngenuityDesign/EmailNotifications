-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2017 at 11:11 AM
-- Server version: 5.6.34-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ingenuit_lb-comms`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `open` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `created`, `open`, `name`) VALUES
(1, '2017-02-08 12:42:11', 1, 'test campaign');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `campaign_id` int(30) NOT NULL,
  `response` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `ip`, `created`, `campaign_id`, `response`) VALUES
(1, '127.0.0.1', '2017-02-08 12:42:24', 1, 'test'),
(2, '96.57.255.242', '2017-02-08 13:01:03', 1, 'test'),
(3, '96.57.255.242', '2017-02-08 13:01:11', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `response_type` int(10) unsigned NOT NULL,
  `feedback_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `created`, `response_type`, `feedback_id`) VALUES
(1, '2017-02-08 13:01:29', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `response_comments`
--

CREATE TABLE IF NOT EXISTS `response_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `feedback_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `response_comments`
--

INSERT INTO `response_comments` (`id`, `created`, `comment`, `feedback_id`) VALUES
(1, '2017-02-08 13:01:29', 'testing ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `response_types`
--

CREATE TABLE IF NOT EXISTS `response_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL,
  `clarifies` varchar(5) NOT NULL,
  `label` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `response_order` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `response_types`
--

INSERT INTO `response_types` (`id`, `created`, `active`, `clarifies`, `label`, `message`, `response_order`) VALUES
(1, '2017-02-08 12:42:02', 1, 'no', 'test', 'test message', 0),
(2, '2017-02-08 13:00:50', 1, 'no', 'testing', 'tes test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`) VALUES
(1, 'admin@aol.com', '$2a$07$NAtbw6uhwuNt34XijAHrqOmLa1pvviL/oWUkHwUE8EfesRk9ITghK', 'admin', '2017-02-08 15:01:54'),
(3, 'info@ingenuitydesign.com', '$2a$07$NAtbw6uhwuNt34XijAHrqOmLa1pvviL/oWUkHwUE8EfesRk9ITghK', 'admin', '2017-02-08 15:44:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
