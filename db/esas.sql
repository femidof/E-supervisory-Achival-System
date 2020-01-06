-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2019 at 08:03 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `idAdmins` int(11) NOT NULL,
  `uidAdmins` tinytext NOT NULL,
  `emailAdmins` tinytext NOT NULL,
  `pwdAdmins` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`idAdmins`, `uidAdmins`, `emailAdmins`, `pwdAdmins`) VALUES
(1, 'femidof', 'femi@duro.com', '$2y$10$8tOlxX.LlKOT9NHzvgBcneeBIlrcSKVTtevlknoMYl0gGOZGrvFVK'),
(2, 'john', 'john@akinde.com', '$2y$10$//XnNg0kUXFmyuwvkv/5u.HyrelRbpeoVi.gv1gupyhlLk/wlYXuq');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(200) NOT NULL,
  `project_department` varchar(200) NOT NULL,
  `proj_supervisors` varchar(30) NOT NULL DEFAULT 'No Supervisor',
  `proj_users` varchar(30) NOT NULL DEFAULT 'No Reqest',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_department`, `proj_supervisors`, `proj_users`) VALUES
(4, 'Solar Detector', 'Computer Science', 'No Supervisor', 'No Reqest'),
(5, 'Metal Plan', 'Computer Science', 'No Supervisor', 'No Reqest'),
(7, 'Jet Engine', 'Computer Science', 'No Supervisor', 'No Reqest'),
(8, 'Home Works', 'Computer Science', 'No Supervisor', 'No Reqest'),
(9, 'Nano Particles', 'Computer Science', 'No Supervisor', 'No Reqest'),
(12, 'Delivery System', 'Computer Science', 'No Supervisor', 'No Reqest');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(30) NOT NULL,
  `project_department` varchar(30) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `proj_supervisors` varchar(30) NOT NULL DEFAULT 'No Supervisor',
  `status` varchar(30) NOT NULL DEFAULT 'Processing',
  `submitted` varchar(10) NOT NULL DEFAULT 'No',
  `super_id` int(11) DEFAULT NULL,
  `stud_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `super_id` (`super_id`),
  KEY `stud_id` (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `project_name`, `project_department`, `requested_by`, `proj_supervisors`, `status`, `submitted`, `super_id`, `stud_id`) VALUES
(21, 'Metal Plan', 'Computer Science', 'john', '4', 'Approved', 'No', 4, 2),
(24, 'Delivery System', 'Computer Science', 'femidof', '1', 'Approved', 'Yes', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

DROP TABLE IF EXISTS `submission`;
CREATE TABLE IF NOT EXISTS `submission` (
  `submission_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(30) NOT NULL,
  `project_department` varchar(30) NOT NULL,
  `submitted_by` varchar(30) NOT NULL,
  `super_id` int(11) DEFAULT NULL,
  `report` text,
  `status` varchar(30) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`submission_id`),
  KEY `super_id` (`super_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submission_id`, `project_name`, `project_department`, `submitted_by`, `super_id`, `report`, `status`, `id`) VALUES
(10, 'Delivery System', 'Computer Science', 'femidof', 1, 'This Project Has been duly organized and is ready for upload', 'Approved', 24);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

DROP TABLE IF EXISTS `supervisors`;
CREATE TABLE IF NOT EXISTS `supervisors` (
  `super_id` int(11) NOT NULL AUTO_INCREMENT,
  `super_user` tinytext NOT NULL,
  `super_email` tinytext NOT NULL,
  `super_pass` longtext NOT NULL,
  `super_fullname` varchar(200) NOT NULL,
  `super_department` varchar(200) NOT NULL,
  `super_nationality` varchar(200) NOT NULL,
  `stateoforigin` varchar(200) NOT NULL,
  PRIMARY KEY (`super_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`super_id`, `super_user`, `super_email`, `super_pass`, `super_fullname`, `super_department`, `super_nationality`, `stateoforigin`) VALUES
(1, 'superman', 'super@man.com', '$2y$10$r56rLpQu1/xZFyZyR7UiMOKKygLIUrmbCGBawsknhlpCSTuGMFZs6', 'Super Man', 'Computer Science', 'Nigeria', 'Lagos'),
(4, 'Isaac Olaolu', 'isaacolaolu10@gmail.com', '$2y$10$r56rLpQu1/xZFyZyR7UiMOKKygLIUrmbCGBawsknhlpCSTuGMFZs6', 'Isaac Olaolu', 'Computer Science', 'Nigeria', 'Rivers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `stateoforigin` varchar(200) NOT NULL,
  `profileext` varchar(10) NOT NULL DEFAULT 'n/a',
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `firstname`, `lastname`, `middlename`, `department`, `course`, `nationality`, `stateoforigin`, `profileext`) VALUES
(1, 'femidof', 'femi@duro.com', '$2y$10$8tOlxX.LlKOT9NHzvgBcneeBIlrcSKVTtevlknoMYl0gGOZGrvFVK', 'OLORUNFEMI', 'DUROSINMI', 'JOSHUA', 'COMPUTER SCIENCE', 'COMPUTER SCIENCE', 'NIGERIAN', 'OGUN STATE', 'n/a'),
(2, 'john', 'john@akinde.com', '$2y$10$//XnNg0kUXFmyuwvkv/5u.HyrelRbpeoVi.gv1gupyhlLk/wlYXuq', '', '', '', '', '', '', '', 'n/a'),
(3, 'Jerry', 'jerry@ope.com', '$2y$10$QMB26VYE/Yz1jw7n0Gd3QuZYJ4w28YbeRHnm//IXqDdqXp63tQyvu', '', '', '', '', '', '', '', 'n/a');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`super_id`) REFERENCES `supervisors` (`super_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`super_id`) REFERENCES `supervisors` (`super_id`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
