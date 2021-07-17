-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 03:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbltasks`
--

DROP TABLE IF EXISTS `tbltasks`;
CREATE TABLE IF NOT EXISTS `tbltasks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Task ID - Prim Key',
  `title` varchar(255) NOT NULL COMMENT 'Tasks Title',
  `description` mediumtext COMMENT 'Tasks Description',
  `deadline` datetime DEFAULT NULL COMMENT 'Tasks Deadline',
  `completed` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Task Completion Status',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='Tasks table';

--
-- Dumping data for table `tbltasks`
--

INSERT INTO `tbltasks` (`id`, `title`, `description`, `deadline`, `completed`) VALUES
(8, 'Title 8', 'Description 8', NULL, 'N'),
(2, 'Title 2', 'Description 2', NULL, 'N'),
(3, 'Title 3', 'Description 3', NULL, 'N'),
(4, 'Title 4', 'Description 4', '2021-07-02 22:49:17', 'Y'),
(5, 'Title 5', 'Description 5', '2021-07-05 22:49:44', 'Y'),
(6, 'Title 6', 'Description 6', NULL, 'N'),
(7, 'Title 7', 'Description 7', NULL, 'N'),
(9, 'Christian is the Man', 'This is Christian\'s Description', NULL, 'N'),
(10, 'Title 10', 'Description 10', NULL, 'N'),
(11, 'Title 10', 'Description 10', NULL, 'N'),
(12, 'Title 11', 'Description 11', NULL, 'N'),
(13, 'Title 12', 'Description 12', NULL, 'N'),
(14, 'Title 11', 'Description 11', NULL, 'N'),
(15, 'Title 12', 'Description 12', NULL, 'N'),
(16, 'Title 13', 'Description 13', NULL, 'N'),
(17, 'Title 14', 'Description 14', NULL, 'N'),
(18, 'Title 15', 'Description 15', NULL, 'N'),
(19, 'Title 16', 'Description 16', NULL, 'N'),
(20, 'Title 17', 'Description 17', NULL, 'N'),
(21, 'Title 18', 'Description 18', NULL, 'N'),
(22, 'Title 19', 'Description 19', NULL, 'N'),
(23, 'Title 20', 'Description 20', NULL, 'N'),
(24, 'Title 1', 'Description 1', NULL, 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
