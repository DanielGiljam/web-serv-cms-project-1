-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 05:48 AM
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
CREATE DATABASE IF NOT EXISTS `web_serv_cms_project_1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web_serv_cms_project_1`;

-- --------------------------------------------------------

--
-- Table structure for table `users_main`
--
-- Creation: May 02, 2018 at 07:06 PM
--

CREATE TABLE IF NOT EXISTS `users_main` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `name_url_encoded` char(255) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `zip_code` char(255) NOT NULL,
  `about_you` mediumtext NOT NULL,
  `annual_salary` decimal(10,0) NOT NULL,
  `dating_preference` char(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name_url_encoded` (`name_url_encoded`),
  UNIQUE KEY `email` (`email`),
  KEY `namn` (`name`),
  KEY `arslon` (`annual_salary`),
  KEY `soker` (`dating_preference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
