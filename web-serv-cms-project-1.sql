-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 12:11 PM
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
-- Database: `web-serv-cms-project-1`
--
CREATE DATABASE IF NOT EXISTS `web-serv-cms-project-1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web-serv-cms-project-1`;

-- --------------------------------------------------------

--
-- Table structure for table `users_main`
--
-- Creation: Apr 12, 2018 at 11:40 AM
--

CREATE TABLE IF NOT EXISTS `users_main` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `namn` char(255) NOT NULL,
  `losenord` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `postnummer` char(255) NOT NULL,
  `annonstext` mediumtext NOT NULL,
  `arslon` decimal(10,0) NOT NULL,
  `soker` char(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `namn` (`namn`),
  KEY `arslon` (`arslon`),
  KEY `soker` (`soker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
