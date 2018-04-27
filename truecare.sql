-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2017 at 02:37 PM
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
-- Database: `truecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_appointment`
--

DROP TABLE IF EXISTS `add_appointment`;
CREATE TABLE IF NOT EXISTS `add_appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `date` varchar(15) NOT NULL,
  `disease` varchar(300) NOT NULL,
  `problems` varchar(300) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(200) NOT NULL,
  `symptoms` varchar(500) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_appointment`
--

INSERT INTO `add_appointment` (`appointment_id`, `patient_id`, `p_name`, `date`, `disease`, `problems`, `doc_id`, `doc_name`, `symptoms`) VALUES
(1, 1, 'gamseng', '2017-11-08', 'games', 'playing day and night', 1, 'mahmood hussain', 'no study like me'),
(2, 1, 'gamseng', '2017-11-08', 'games', 'playing day and night', 1, 'mahmood hussain', 'no study like me'),
(3, 1, 'gamseng', '2017-11-08', 'games', 'playing day and night', 1, 'mahmood hussain', 'no study like me'),
(4, 1, 'gamseng', '2017-11-08', 'games', 'playing day and night', 1, 'mahmood hussain', 'no study like me'),
(5, 2, 'Mahmood Hussain Bhat', '2017-11-11', 'e', 'dsf', 6, 'kai', 'df'),
(6, 2, 'Mahmood Hussain Bhat', '2017-11-11', 'e', 'dsf', 6, 'kai', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `add_medicine`
--

DROP TABLE IF EXISTS `add_medicine`;
CREATE TABLE IF NOT EXISTS `add_medicine` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `medicine` varchar(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `dosage` varchar(400) NOT NULL,
  `services` varchar(200) NOT NULL,
  `remarks` varchar(400) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_medicine`
--

INSERT INTO `add_medicine` (`m_id`, `patient_id`, `doc_id`, `medicine`, `quantity`, `dosage`, `services`, `remarks`) VALUES
(1, 1, 0, 'penicellin', '2', '2 times in day', '', 'take with warm water'),
(2, 1, 0, 'penicellin', '2', '2 times in day', '', 'take with warm water'),
(3, 2, 6, 'amoxicillin', '2', '3 in a day', '', 'with cold wate'),
(4, 2, 6, 'amoxicillin', '2', '3 in a day', '', 'with cold wate'),
(5, 103, 7, 'amm', '2', '4', 'wheel chair', 'dfsf'),
(6, 103, 7, 'amm', '2', '4', 'wheel chair', 'dfsf'),
(7, 103, 7, 'amm', '2', '4', 'wheel chair', 'dfsf'),
(8, 103, 7, 'amm', '2', '4', 'wheel chair', 'dfsf');

-- --------------------------------------------------------

--
-- Table structure for table `opd_billing`
--

DROP TABLE IF EXISTS `opd_billing`;
CREATE TABLE IF NOT EXISTS `opd_billing` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `checkup` varchar(300) NOT NULL,
  `collected` varchar(200) NOT NULL,
  `date` varchar(15) NOT NULL,
  `charges` int(11) NOT NULL,
  `ocharges` int(11) NOT NULL,
  `t_charges` int(11) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd_billing`
--

INSERT INTO `opd_billing` (`report_id`, `patient_id`, `p_name`, `checkup`, `collected`, `date`, `charges`, `ocharges`, `t_charges`) VALUES
(1, 6, 'ali', 'dfs', 'kjsf', '2017-11-01', 1200, 0, 1200),
(2, 1, 'gg', 'iu', 'iug', '2017-11-01', 1000, 0, 1000),
(3, 1, 'gamseng', 'dfs', 'dsi', '2017-11-07', 1500, 0, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  `price` varchar(10) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `price`, `patient_id`, `service_id`) VALUES
(1, '05/10/2017', '1200', 100, 9),
(2, '05/09/2017', '1500', 100, 4);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `birthday` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `room` varchar(225) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `birthday`, `gender`, `address`, `phone`, `img`, `email`, `room`) VALUES
(1, 'mahmood hussain', '25/03/1997', ' male', 'kashmir', '7780859899', '', 'mahmoodbhat3135@gmail.com', '100'),
(2, 'mahmood hussain', '2017-11-08', 'Male', 'sdgs', '546', '', 'mahmoodbhat3135@gmail.com', '44'),
(102, 'sdgdfs', '2017-11-04', 'Male', 'sdfsdg', '7780859899', 'WIN_20170909_11_07_07_Pro.jpg', 'mahmoodbhat3135@gmail.com', '441'),
(103, 'sdgdfs', '2017-11-04', 'Male', 'sdfsdg', '7780859899', 'WIN_20170909_11_07_07_Pro.jpg', 'mahmoodbhat3135@gmail.com', '441'),
(104, 'sdgdfs', '2017-11-04', 'Male', 'sdfsdg', '7780859899', 'WIN_20170909_11_07_07_Pro.jpg', 'mahmoodbhat3135@gmail.com', '441'),
(105, 'bhat mahmood hussain', '1997-03-25', 'Male', 'kripal pora payeen', '7780859899', 'WIN_20170904_10_52_42_Pro.jpg', 'mahmoodbhat3135@gmail.com', '329'),
(106, 'UMAR SAMAD', '1997-01-04', 'Male', 'Qazigund', '7006503281', 'WIN_20171010_13_56_10_Pro.jpg', 'umarsamad26@gmail.com', '328'),
(107, 'mahmood hussain bhat', '1997-03-25', 'Male', 'Kripal pora payeen pattan baramulla kashmir', '7780859899', 'IMG_20161203_123548.jpg', 'mahmoodbhat3135@gmail.com', '329'),
(108, 'shahid hamid', '0006-05-04', 'Male', 'anantnag', '4564654678', 'mahmood.jpg', 'shahidhamid2@gmail.com', '329'),
(109, 'bilal', '1997-11-05', 'Male', 'hjguj', '86786', 'IMG_20170518_180901.jpg', 'b@b.com', '329'),
(110, 'aqib ali bhat', '2010-02-12', 'Male', 'kripal pora payeen', '778085995', '', 'aqibali@gmail.com', '45'),
(111, 'akash', '11997-02-10', 'Male', 'delhi', '77855584', '', 'mahmoodbhat3135@gmail.com', '456');

-- --------------------------------------------------------

--
-- Table structure for table `physicians`
--

DROP TABLE IF EXISTS `physicians`;
CREATE TABLE IF NOT EXISTS `physicians` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(150) NOT NULL,
  `name` varchar(300) NOT NULL,
  `type` varchar(30) NOT NULL,
  `address` varchar(350) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `duty` varchar(30) NOT NULL,
  `offday` varchar(50) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physicians`
--

INSERT INTO `physicians` (`doc_id`, `img`, `name`, `type`, `address`, `specialization`, `experience`, `duty`, `offday`, `regdate`, `gender`, `phone`, `email`) VALUES
(6, 'WIN_20171010_13_55_45_Pro.jpg', 'mahmood hussain bhat', 'regular', 'pattan', 'ortho', '4 Years', 'Noon', 'Sunday', '2017-11-02', 'Male', '8767896', 'mahmoodbhat3135@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `category`, `description`, `price`) VALUES
(1, 'wheel chair', '', 'this is service', '500'),
(2, 'wheel chair', '', 'this is service', '500'),
(3, 'hello', 'Services', 'hello', '4000'),
(4, 'gsd', 'Laboratory', 'dsg', '10'),
(5, 'gsdg', 'Laboratory', 'sgdg', '1000'),
(6, 'sdgds', 'Services', 'dhtrdh', '4000'),
(7, 'sgd', 'Laboratory', 'sdg', '465'),
(8, 'cook', 'Utilities', 'this is cooking service', '1400'),
(9, 'wheel chair with person', 'Services', 'addition of person', '1200'),
(10, 'cofee', 'Utilities', 'lkdhfklsdjf', '200');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'mahmood', 'mahmood');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
