-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2014 at 06:42 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gclh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(200) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `eadd` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `student_status` varchar(200) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fname`, `lname`, `eadd`, `password`, `status`, `student_status`) VALUES
(4, 'Aaron', 'Augusto', 'aaron@ga.com', 'aaron', 'Approved', 'S'),
(5, 'Chat', 'Pabriga', 'chat@chat.com', 'chat', 'Approved', 'S'),
(8, 'Nikki', 'Sandigan', 'niki@gmail.com', 'niki', 'Deleted', 'S'),
(10, 'Nora', 'Augusto', 'nora@gmail.com', 'nora', 'Approved', 'S'),
(11, 'Ariel', 'Augusto', 'mctnko@gmail.com', 'ariel', 'Pending', 'S'),
(12, 'Dean', 'Diana', 'deanmar@yahoo.com', 'dean', 'Pending', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `eadd` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `lname`, `fname`, `mname`, `eadd`, `password`, `status`) VALUES
(1, 'Tero', 'Joan', 'A', 'joantero@gmail.com', 'joan', 's'),
(2, 'Avenido', 'Maricel', 'M', 'maricel@yahoo.com', 'maricel', 's'),
(13, 'Vitor', 'Charmaine', 'A', 'charmaine@gmail.com', 'charmaine', 's');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(24) NOT NULL,
  `first_name` varchar(24) NOT NULL,
  `status` varchar(1) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `last_name`, `first_name`, `status`, `username`, `password`) VALUES
(1, 'Namocatcat', 'Sandra', 'a', 'admin', 'admin'),
(5, 'Pabriga', 'Chatty', 's', 'chat@chat.com', 'chat'),
(10, 'Diana', 'Dean Mar', 's', 'dean@gmail.com', 'dean');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
