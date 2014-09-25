-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2014 at 03:49 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'hr', 'manager'),
(4, 'super_admin', 'super administer');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_description` text NOT NULL,
  `meta_data` text NOT NULL,
  `meta_description` text NOT NULL,
  `added_date` date NOT NULL,
  `order` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `sub_page` varchar(100) NOT NULL,
  `parent_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_id`, `page_description`, `meta_data`, `meta_description`, `added_date`, `order`, `image`, `page_slug`, `page_title`, `status`, `sub_page`, `parent_id`) VALUES
(1, 'We wana give u a better service', 'google', 'gheolkdk', '2014-10-24', 8, '10697366_10203719070432151_8949440175240904047_o.jpg', 'about-us', 'About us', 'active', '', 0),
(2, 'A better surrounding environmennt', 'homies', 'hompies', '2014-10-24', 5, '10697366_10203719070432151_8949440175240904047_o1.jpg', 'home', 'Home ', 'active', '', 0),
(3, 'dfdkfs', 'kfdkdf', ' dkdfkd', '0000-00-00', 4, '', '', 'dfk', 'active', '', 0),
(4, 'view all photos', 'djfjdf', 'dkjfdhj', '2014-10-24', 3, 'mmm.jpg', 'gallery', 'Gallery', 'active', '', 0),
(13, 'U need to contact us for more information', 'contact', 'dfkjjkdfsjdjk', '2014-10-24', 3, '10488022_809618075738456_3608086426381041776_n1.jpg', 'contact-us', 'Contact us', 'active', '', 0),
(14, '', '', '', '0000-00-00', 0, '', '', '', 'active', '', 0),
(15, '', '', '', '0000-00-00', 0, '', '', '', 'active', '', 0),
(16, '', '', '', '0000-00-00', 0, '', '', '', 'active', 'google', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `group_id`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, NULL, NULL, NULL, 1268889823, 1411650297, 1, 'Admin', 'istrator', 'ADMIN', '0', 0),
(2, '::1', 'samina tuladhar', '$2a$08$Gn3KpEx2/Ctvzu5Eu5r2TOWzcuwsr.N8.M4CRoeqYlvMFJhd2rfg2', '', 'samina_tuladhar@yahoo.com', NULL, 'GVEUnCjzLpcCqHtr5kPi0ec2114bb44ab104ed4e', 1411449389, NULL, 1411208945, 1411372851, 1, 'samina', 'Tuladhar', 'samakhusi', '9808939399', 3),
(3, '::1', 'raju dangol', '$2a$08$eZdGhNFygIjaRjiU3SSGveRGkzhr4avVaSFx0apEeYle8OpgsR2tS', '', 'raju@gmail.com', NULL, '45-nVdlBtiwqKtztJMkmHe068e87912b68af49b1', 1411353598, NULL, 1411279157, 1411353558, 1, 'raju', 'Dangol', 'samakhusi', '94545784387', 2),
(4, '::1', 'ravi kumar', '$2a$08$zr8NP4NyCqcykv5XpBR9COHfvF7tii4vVEFbctgCNEVpwSj48ZQ16', 'lh.uNJ8U8.IGWNFvbOaZMu', 'ravi@gmail.com', NULL, 'ASM2U.dtx1igfuZLyDX1ge174b930ca80af77b90', 1411294143, NULL, 1411280258, 1411280258, 1, 'Ravi', 'kumar', 'sitapaila', '9888484', 2),
(5, '::1', 'himani shakya', '$2a$08$Bbubu6.duqdt9sbK1x9r4elv2yE4TjB.0O7lZ0f2nCzTSPztaeqIm', 'YLFxZ2zd669o4TJgLf0AUO', 'himani@gmail.com', NULL, 'Nn9yRBHqQ1n9NaWalvrlU.2daff187dad1c897ab', 1411294068, NULL, 1411293767, 1411293767, 1, 'himani', 'shakya', 'salyan', '98877666', 2),
(6, '::1', 'saru dhungana', '$2a$08$OzoQ99XMiyGkwQSLPwuMT.zF986e/yN2EMJRo2wgWERO0Hwfz1Dcu', '0pbt2Te98Y2VteDudA8hvO', 'saru@gmail.com', '409d416db6096037fc881e2691d7ed749d70bba7', NULL, NULL, NULL, 1411296923, 1411355965, 0, 'saru', 'dhungana', 'sitapaila', '845847433', 3),
(7, '::1', 'utsav bhetu', '$2a$08$.xv2rrAbCRnhbXg9GMr6nOd9UNtgaAFwwRN6Gq/Z3Z32Veq9rok6S', 'sEHVdw1aUnxRlnph8rChk.', 'utsav@gmail.com', '37341be74c4f788934045d87aa96a910c4a5fd64', NULL, NULL, NULL, 1411354171, 1411354171, 0, 'utsav', 'bhetu', 'thamel', '6789op', 1),
(8, '::1', 'sarina tuladhar', '$2a$08$eQjpTnkKUNO50Kg.qprkdOwD5shWOh08SccbJoVDCdETf1Yr0Dt5i', '', 'samina.tuladhar7@gmail.com', NULL, 'BnzCZyqYyjpdoHfKMgLQMea14cca0b9cb5d9c113', 1411449404, NULL, 1411373749, 1411373749, 1, 'sarina', 'Tuladhar', 'samakhusi', '98877666', 2),
(9, '::1', 'iona sitaula', '$2a$08$wkL6uKOWL1Efb8shCKUEzuUGHfKAutorWbfkp5j4Wkkw5xHnyPWy.', '', 'iona.ek64@gmail.com', NULL, 'ASUpOQglcC81Zkj1Lj0cAO3b397eb0287cf05257', 1411473050, NULL, 1411385164, 1411385164, 1, 'iona', 'sitaula', 'lalitpur', '98878767667', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
