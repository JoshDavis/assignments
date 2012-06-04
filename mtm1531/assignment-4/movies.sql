-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2012 at 07:32 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `davi0582`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_title`, `release_date`, `director`) VALUES
(6, 'gladiator', '2012-05-05', 'ridley scott'),
(7, 'catch me if you can', '2003-01-02', 'steven spielberg'),
(8, 'fight club', '1999-10-15', 'david fincher'),
(9, 'schindlers list', '1993-12-25', 'steven spielberg'),
(10, 'the pianist', '2003-01-24', 'roman polanski');
