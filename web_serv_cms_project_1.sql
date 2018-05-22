-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 10:59 PM
-- Server version: 5.6.39
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_serv_cms_project_1`
--
DROP DATABASE IF EXISTS `web_serv_cms_project_1`;
CREATE DATABASE IF NOT EXISTS `web_serv_cms_project_1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web_serv_cms_project_1`;

-- --------------------------------------------------------

--
-- Table structure for table `anomalities_log`
--
-- Creation: May 20, 2018 at 07:03 AM
--

DROP TABLE IF EXISTS `anomalities_log`;
CREATE TABLE IF NOT EXISTS `anomalities_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remote_addr` char(255) NOT NULL,
  `event` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions_log`
--
-- Creation: May 21, 2018 at 07:31 PM
--

DROP TABLE IF EXISTS `sessions_log`;
CREATE TABLE IF NOT EXISTS `sessions_log` (
  `session_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `remote_addr` char(255) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_expiration` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_end` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_main`
--
-- Creation: May 22, 2018 at 10:35 AM
--

DROP TABLE IF EXISTS `users_main`;
CREATE TABLE IF NOT EXISTS `users_main` (
  `id` char(36) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `name` char(255) NOT NULL,
  `name_url_encoded` char(255) NOT NULL,
  `password_hash` char(60) NOT NULL,
  `email` char(255) NOT NULL,
  `zip_code` char(255) NOT NULL,
  `about_you` text NOT NULL,
  `annual_salary` decimal(10,0) NOT NULL,
  `dating_preference` tinyint(8) NOT NULL,
  `preferences` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name_url_encoded` (`name_url_encoded`),
  UNIQUE KEY `email` (`email`),
  KEY `zip_code` (`zip_code`),
  KEY `annual_salary` (`annual_salary`),
  KEY `dating_preference` (`dating_preference`),
  KEY `name` (`name`),
  KEY `gender` (`gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
