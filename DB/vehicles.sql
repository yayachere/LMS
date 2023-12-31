-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2022 at 02:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `users_account`;
CREATE TABLE IF NOT EXISTS `users_account` (
  `user_id` varchar(30) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `pro_image` varchar(200) DEFAULT NULL,
  `about_me` varchar(10000) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`user_id`, `f_name`, `m_name`, `l_name`, `user_type`, `e_mail`, `phone_no`, `pro_image`, `about_me`, `password`, `status`, `created_by`) VALUES
('ADMINER1212', 'Tibebu', 'M', 'Mekasha', 'Admin', 'chereyaya123@gmail.com', 937805596, 'img_avatar1.png', 'am administrator', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', ''),
('EM1816941198', 'Medihanet', 'Mitku', 'Masala', 'employee', 'chereyaya12@gmail.com', 34567654, 'download (5).jfif', 'sfdd', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('EM32045', 'Melaku', 'B', 'M', 'employee', 'mak@gmail.com', 34567654, 'winery-sunrise646.jpg', 'I am a policeman', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('EM865055183', 'Habib', 'Mohammed', 'Usens', 'employee', 'chereyaya3@gmail.com', 34567654, 'download (5).jfif', 'I am traffic police at sodo city TPA', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('EM912602114', 'Feven', 'T', 'N', 'employee', 'feven@gmail.com', 914368721, 'ima.jpg', 'she is lecture to programming', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('Emp1232463548', 'Endshaw', 'wolde', 'w', 'employee', 'endashawwolde@gmail.com', 915231423, 'download (7).jfif', 'senior lecture', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('Emp13084', 'Girma', 'Yohannes', 'M', 'employee', 'girma@gmail.com', 937805596, '20220126_205039.jpg', 'i am an employee', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212'),
('Emp1573704490', 'Temesgen', 'M', 'T', 'employee', 'temesgenm@gmail.com', 935231234, 'document-22.png', 'instructor of cs', '81dc9bdb52d04dc20036dbd8313ed055', 'De-Active', 'ADMINER1212'),
('takele3', 'Takele', 'kuti', 'odo', 'customer', 'chereyaya14@gmail.com', 937805596, 'bg.jpg', 'customer', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 'ADMINER1212');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(50) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `Phone_no` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `profile_image` varchar(150) NOT NULL,
  `about_me` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `f_name`, `m_name`, `l_name`, `email`, `Phone_no`, `age`, `profile_image`, `about_me`) VALUES
(1, 'ADMIN2', 'Bogale', 'Nasero', 'N', 'bogalen@gmail.com', '0943836500', 33, 'male.PNG', 'new administrator'),
(2, 'ADMIN3', 'Akalu', 'Gebre', 'G', 'akalug@gmail.com', '0923935436', 27, 'women.PNG', 'another administrator');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appoint_on` timestamp(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `fname`, `lname`, `date`, `time`, `appoint_on`) VALUES
(13, 'takele3', 'Takele', 'odo', '2022-09-18', '02:00:00', '2022-09-17 18:18:47.000000'),
(12, 'takele3', 'chere', 'odo', '2022-07-01', '11:30:00', '2022-07-01 18:13:04.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customer_signup`
--

DROP TABLE IF EXISTS `customer_signup`;
CREATE TABLE IF NOT EXISTS `customer_signup` (
  `cust_id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `kebele_id` varchar(255) NOT NULL,
  `status` int(6) NOT NULL DEFAULT '0',
  `signup_on` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_signup`
--

INSERT INTO `customer_signup` (`cust_id`, `fname`, `mname`, `lname`, `address`, `email`, `phone`, `age`, `gender`, `kebele_id`, `status`, `signup_on`) VALUES
(35, 'Yaya', 'Chere', 'Milkano', 'Sodo', 'makarsa11@gmail.com', '0937805596', 23, 'Male', 'la.jpg', 0, '2022-07-26 16:53:12.000000'),
(3, 'takele', 'kuti', 'odo', 'Areka', 'fts@gmail.com', '0937805596', 24, 'Female', 'women.png', 1, '2022-06-20 11:02:00.000000'),
(36, 'Takele', 'Yaya', 'Waza', 'Boditi', 'abcd@gmail.com', '0937805596', 23, 'Female', 'fakereal.jpg', 0, '2022-09-05 15:38:17.000000'),
(37, 'Bizuayehu', 'Beyene', 'Waza', 'Sodo', 'buza@gmail.com', '0937805596', 23, 'Male', 'la.jpg', 0, '2022-09-17 14:30:29.000000'),
(38, 'Alemu', 'Ginjo', 'GG', 'Soddo', 'tt@gmail.com', '913241500', 31, 'Female', 'la.jpg', 0, '2022-09-17 15:38:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(30) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `Phone_no` varchar(15) NOT NULL,
  `profile_image` varchar(150) NOT NULL,
  `age` int(2) NOT NULL,
  `about_me` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `f_name`, `m_name`, `l_name`, `email`, `Phone_no`, `profile_image`, `age`, `about_me`) VALUES
(1, 'emp5338', 'yaya', 'ubulu', 'chere', 'chereyaya16@gmail.com', '924740111', 'male.png', 27, 'it is me'),
(2, 'emp5858', 'Mesele', 'Gebre', 'paulos', 'ubulu@gmail.com', '939538339', 'tt2.jpeg', 33, 'yeah this is me');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `content`, `date`) VALUES
(33, 'mesele', 'makarsa11@gmail.com', 'here is my message', '22:03:11'),
(40, 'yonatan', 'fts@gmail.com', 'hey there\r\n', '22:03:18'),
(44, 'tyjndg', 'abcd@gmail.com', 'yu jnhbdf', '22:03:21'),
(45, 'mesele', 'chereyaya16@gmail.com', 'hre htask', '22:04:13'),
(46, 'chere', 'chereyaya16@gmail.com', 'is this page fully functioning?', '22:04:19'),
(47, 'mesele', 'chereyaya16@gmail.com', 'what is this?\r\n', '22:05:29'),
(49, 'mesele', 'chereyaya16@gmail.com', 'hello there', '22:06:17'),
(50, 'chere', 'abcd@gmail.com', 'guess what this page is doing what i want  i love it.', '22:06:22'),
(51, 'chere', 'chereyaya16@gmail.com', 'dfjgjhkgjkg', '22:06:24'),
(52, 'Mesele', 'chereyaya16@gmail.com', 'szfxgcvnhngfzxc', '22:07:14'),
(53, 'Chere', 'abcd@gmail.com', 'hey there\r\n', '22:08:20'),
(54, 'Mesele', 'chereyaya16@gmail.com', 'new message', '22:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `en_mission` longtext NOT NULL,
  `en_vission` longtext NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `en_mission`, `en_vission`, `user_id`, `status`) VALUES
(11, 'Our mission is to ensure the provision of a modern, integrated and safe road transport services to meet the needs of all the communities for strong and unitary economic and political system in Ethiopia', 'Our vision is to ensure the provision of a modern, integrated and safe road transport services to meet the needs of all the communities for strong and unitary economic and political system in Ethiopia', 'ADMINER1212', 'Off'),
(12, 'This is new mission ', 'This one is new vision', 'ADMINER1212', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(255) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `posted_to` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL DEFAULT 'from sodo city road transport authority',
  `posted_on` timestamp(6) NOT NULL,
  `updated_on` datetime(6) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `expire` date DEFAULT NULL,
  `admin_id` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `header`, `message`, `posted_to`, `posted_by`, `posted_on`, `updated_on`, `type`, `expire`, `admin_id`) VALUES
(26, 'Vehicle Registration Date', 'All customers of the organization know that the organization register\'s vehicle from 05-11-2022 up to 30-11-2022. Register your vehicles on time by coming to the office with your vehicle.', 'customer', 'from sodo city road transport authority', '2022-07-06 21:05:52.000000', NULL, 'info', '2022-08-06', 'ADMINER1212'),
(27, 'To employees those come too late to work', 'Those employees who came to work by getting late will face the consequences of their doing and this kind of doing can get them fired from their work. Be aware don\'t come late to work.', 'employee', 'from sodo city road transport authority', '2022-07-06 21:09:02.000000', NULL, 'warning', '2022-09-06', 'ADMINER1212'),
(28, 'To Customers who are not updated their vehicle information', 'All customers who are not updated their vehicle information will be punished and this kind of actions can get the owners in to serious problems. Please update your vehicle information on time.', 'customer', 'from sodo city road transport authority', '2022-07-06 21:19:32.000000', '2022-08-20 15:02:06.000000', 'warning', '2022-10-20', 'ADMINER1212'),
(39, 'Over time work', 'This is to inform you all the employees of the organization who want the over time work, if you want to work over time work please apply for it by coming to the administrator office up to 5 working days after this new is posted.', 'employee', 'from sodo city road transport authority', '2022-08-20 21:59:42.000000', NULL, 'info', '2022-08-27', 'ADMINER1212'),
(40, 'Vehilce update', 'Update your vehicle information until january 30 2022', 'customer', 'from sodo city road transport authority', '2022-09-17 14:39:23.000000', '2022-09-17 07:40:13.000000', 'info', '2022-10-01', 'ADMINER1212');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `slide_1` varchar(4000) NOT NULL,
  `slide_2` varchar(4000) NOT NULL,
  `slide_3` varchar(4000) NOT NULL,
  `slide_4` varchar(4000) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `slide_1`, `slide_2`, `slide_3`, `slide_4`, `user_id`, `status`) VALUES
(16, 'tt2.jpeg', 'tt1.jpeg', 'tt3.jpeg', 'tt4.jpeg', 'ADMINER1212', 'Off'),
(34, 'newlogo.png', 'tt4.jpeg', 't6.jpg', 'tt1.jpeg', 'ADMINER1212', 'Off'),
(36, '1.jpg', '2.jpg', '3.jpg', '4.jpg', 'ADMINER1212', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `date` date NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `cid` varchar(200) NOT NULL,
  `regnum` int(100) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `wheel` varchar(255) NOT NULL,
  `up` date NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `driven_kms` int(255) NOT NULL,
  `axel` varchar(255) NOT NULL,
  PRIMARY KEY (`regnum`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`date`, `f_name`, `l_name`, `cid`, `regnum`, `model`, `brand`, `wheel`, `up`, `emp_id`, `driven_kms`, `axel`) VALUES
('2022-04-18', 'Buza', 'Beye', '58393', 164, 'Y54S', 'YARIS', '3', '2022-07-27', '', 5464, '7456c5'),
('2014-06-16', 'ekele', 'oasango', '54939', 165, 'V843', 'Volvo', '4WD', '2014-06-16', '', 0, 'erdt454'),
('2022-04-19', 'chere', 'oasango', '96753', 166, 'R44v', 'Revo', '4WD', '2022-04-19', '', 130, 'jgkuuh4545'),
('2022-06-30', 'tafese', 'Solomon', '93385', 169, 'vsl43', 'V8', '4WD', '2022-06-30', 'Emp13084', 150, '566e45k'),
('2022-07-01', 'takele;', 'odo.', '54848', 170, 'V432o', 'Volvo', '6WD', '2022-07-01', 'Emp13084', 0, '456e4fvxc'),
('2022-07-29', 'Takele', 'Odo', '66422', 171, 'V843', 'Volvo', '4WD', '2022-08-31', 'Emp13084', 542, '56fxvvd'),
('2022-08-31', 'STUD', 'Odo', '23459', 172, 'Y54S', 'YARIS', '4WD', '2022-08-31', 'Emp13084', 1142, '45646gsdf65'),
('2022-09-17', 'Takele', 'Tafese', '34545', 173, 'V843', 'Revo', '4WD', '2022-09-17', 'Emp13084', 100, '56e4tgdfg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
