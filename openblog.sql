-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2014 at 04:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openblog`
--
CREATE DATABASE IF NOT EXISTS `openblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `openblog`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `blog_body` text NOT NULL,
  `tags` text NOT NULL,
  `arrival` varchar(10) NOT NULL,
  `varified` int(11) NOT NULL,
  `no_likes` int(11) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `uid`, `title`, `blog_body`, `tags`, `arrival`, `varified`, `no_likes`, `categories`, `created_at`, `updated_at`) VALUES
(6, 3, 'title of my blog', '<p>This &nbsp;is a body text to test my blog content</p>\n', 'test', 'new', 1, 1, 'Testing Content', '2014-01-26 15:12:12', '2014-01-26 09:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentby` int(11) NOT NULL,
  `commentbody` text NOT NULL,
  `forwhichpost` int(11) NOT NULL,
  `varified` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('chinmoym2004@gmail.com', '9d37e8d2f548d739d51987ce89df7241ee023887', '2013-12-26 05:44:09'),
('chinmoym2004@gmail.com', 'c4cbe51bbb5bc1957b0ce9d9ef7bae6ee68bfbd9', '2013-12-26 05:45:22'),
('chinmoym2004@gmail.com', '83556bf2d252517ed7de7e19de3563561a26b90d', '2013-12-26 05:45:52'),
('chinmoym2004@gmail.com', '8e82708ce6eced47af88c34dde7724aa5bdb0796', '2013-12-26 05:47:39'),
('chinmoym2004@gmail.com', '94621090c33e6638cd26ffbbd92286d4c43b1474', '2013-12-26 05:48:19'),
('chinmoym2004@gmail.com', 'a3f7df91d3da99c08868c733be26ddd2c12eb906', '2013-12-26 07:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL,
  `sub_email` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `sub_email`, `active`, `created_at`, `updated_at`) VALUES
(0, 'chinmoym2004@gmi.com', 1, '1414-01-04 00:00:00', '2014-01-04 12:56:11'),
(0, 'chinmoym2004@gmail.com', 1, '1414-01-04 00:00:00', '2014-01-04 12:56:41'),
(0, 'chinmoym2004@gmail.com', 1, '1414-01-04 00:00:00', '2014-01-04 13:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL COMMENT '1-super admin,2 admin  3 editor , else user',
  `active` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `admin`, `active`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'chinmoym2004@rediffmail.com', '$2y$08$SuuCkCeCSzqyDimwewXkzOac8x3DhpZwXow1xb6FBO1zM7CcuuzGe', 1, 0, '2013-12-27 08:58:51', '2013-12-27 08:59:09'),
(3, 'Chinmoy', 'Maity', 'chinmoym2004@gmail.com', '$2y$10$xak9tuRsH1ymYUwzfc6ylOAQqkh3pXRUrqAa6.ZVk7dzIPz0to8lm', 0, 0, '2014-01-26 15:10:02', '2014-01-26 09:40:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
