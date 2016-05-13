-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 12:08 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingdetails`
--

CREATE TABLE IF NOT EXISTS `tblbookingdetails` (
  `booking_id` int(6) NOT NULL DEFAULT '0',
  `p_id` int(6) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL,
  `hotel_name` varchar(40) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcaterer`
--

CREATE TABLE IF NOT EXISTS `tblcaterer` (
  `caterer_id` int(6) NOT NULL DEFAULT '0',
  `caterer_name` varchar(40) DEFAULT NULL,
  `caterer_phone` int(15) DEFAULT NULL,
  `caterer_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblconference`
--

CREATE TABLE IF NOT EXISTS `tblconference` (
  `conf_id` int(6) NOT NULL DEFAULT '0',
  `conf_name` varchar(50) DEFAULT NULL,
  `conf_startdate` date DEFAULT NULL,
  `conf_enddate` date DEFAULT NULL,
  `conf_numpass` int(4) DEFAULT NULL,
  `caterer_id` int(6) DEFAULT NULL,
  `venue_id` int(6) DEFAULT NULL,
  `em_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblconfpass`
--

CREATE TABLE IF NOT EXISTS `tblconfpass` (
  `confpass_reference` int(6) NOT NULL DEFAULT '0',
  `conf_id` int(6) DEFAULT NULL,
  `pass_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_participant`
--

CREATE TABLE IF NOT EXISTS `tblconf_participant` (
  `cp_index` int(5) NOT NULL DEFAULT '0',
  `conf_id` int(6) DEFAULT NULL,
  `p_id` int(6) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_sponsor`
--

CREATE TABLE IF NOT EXISTS `tblconf_sponsor` (
  `sponsor_id` int(6) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `amountprovided` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbleventmanager`
--

CREATE TABLE IF NOT EXISTS `tbleventmanager` (
  `em_id` int(6) NOT NULL DEFAULT '0',
  `em_username` varchar(15) DEFAULT NULL,
  `em_password` varchar(15) DEFAULT NULL,
  `em_firstname` varchar(15) DEFAULT NULL,
  `em_lastname` varchar(25) DEFAULT NULL,
  `em_phone` int(15) DEFAULT NULL,
  `em_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblparticipant`
--

CREATE TABLE IF NOT EXISTS `tblparticipant` (
  `p_id` int(6) NOT NULL DEFAULT '0',
  `p_username` varchar(20) DEFAULT NULL,
  `p_password` varchar(15) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `p_email` varchar(50) DEFAULT NULL,
  `p_phone` int(15) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_address` varchar(50) DEFAULT NULL,
  `p_country` varchar(30) DEFAULT NULL,
  `p_city` varchar(30) DEFAULT NULL,
  `p_state` varchar(30) DEFAULT NULL,
  `p_postalcode` varchar(10) DEFAULT NULL,
  `p_newsletter` tinyint(1) DEFAULT NULL,
  `p_occupation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpasstype`
--

CREATE TABLE IF NOT EXISTS `tblpasstype` (
  `pass_id` int(6) NOT NULL DEFAULT '0',
  `pass_type` varchar(25) DEFAULT NULL,
  `pass_price` int(5) DEFAULT NULL,
  `pass_amount` int(4) DEFAULT NULL,
  `pass_sponsor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsessions`
--

CREATE TABLE IF NOT EXISTS `tblsessions` (
  `session_id` int(6) NOT NULL DEFAULT '0',
  `session_day` date DEFAULT NULL,
  `session_starttime` time DEFAULT NULL,
  `sesson_endtime` time DEFAULT NULL,
  `session_room` int(2) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblspeaker`
--

CREATE TABLE IF NOT EXISTS `tblspeaker` (
  `speaker_id` int(6) NOT NULL DEFAULT '0',
  `speaker_firstname` varchar(30) DEFAULT NULL,
  `speaker_lastname` varchar(40) DEFAULT NULL,
  `speaker_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsponsor`
--

CREATE TABLE IF NOT EXISTS `tblsponsor` (
  `sponsor_id` int(6) NOT NULL DEFAULT '0',
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_email` varchar(50) DEFAULT NULL,
  `sponsor_phone` int(15) DEFAULT NULL,
  `sponsor_logo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblvenue`
--

CREATE TABLE IF NOT EXISTS `tblvenue` (
  `venue_id` int(6) NOT NULL DEFAULT '0',
  `venue_name` varchar(50) DEFAULT NULL,
  `venue_address` varchar(80) DEFAULT NULL,
  `venue_nrooms` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  ADD PRIMARY KEY (`booking_id`), ADD KEY `p_id` (`p_id`), ADD KEY `confpass_reference` (`confpass_reference`);

--
-- Indexes for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  ADD PRIMARY KEY (`caterer_id`);

--
-- Indexes for table `tblconference`
--
ALTER TABLE `tblconference`
  ADD PRIMARY KEY (`conf_id`), ADD KEY `caterer_id` (`caterer_id`), ADD KEY `venue_id` (`venue_id`), ADD KEY `em_id` (`em_id`);

--
-- Indexes for table `tblconfpass`
--
ALTER TABLE `tblconfpass`
  ADD PRIMARY KEY (`confpass_reference`), ADD KEY `conf_id` (`conf_id`), ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
  ADD PRIMARY KEY (`cp_index`), ADD KEY `conf_id` (`conf_id`), ADD KEY `p_id` (`p_id`), ADD KEY `confpass_reference` (`confpass_reference`);

--
-- Indexes for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  ADD KEY `conf_id` (`conf_id`), ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `tbleventmanager`
--
ALTER TABLE `tbleventmanager`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tblparticipant`
--
ALTER TABLE `tblparticipant`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `tblsessions`
--
ALTER TABLE `tblsessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `speaker_id` (`speaker_id`), ADD KEY `conf_id` (`conf_id`);

--
-- Indexes for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  ADD PRIMARY KEY (`speaker_id`);

--
-- Indexes for table `tblsponsor`
--
ALTER TABLE `tblsponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `tblvenue`
--
ALTER TABLE `tblvenue`
  ADD PRIMARY KEY (`venue_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
ADD CONSTRAINT `tblbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
ADD CONSTRAINT `tblbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconfpass` (`confpass_reference`);

--
-- Constraints for table `tblconference`
--
ALTER TABLE `tblconference`
ADD CONSTRAINT `em_id` FOREIGN KEY (`em_id`) REFERENCES `tbleventmanager` (`em_id`),
ADD CONSTRAINT `tblconference_ibfk_1` FOREIGN KEY (`caterer_id`) REFERENCES `tblcaterer` (`caterer_id`),
ADD CONSTRAINT `tblconference_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `tblvenue` (`venue_id`);

--
-- Constraints for table `tblconfpass`
--
ALTER TABLE `tblconfpass`
ADD CONSTRAINT `tblconfpass_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconfpass_ibfk_2` FOREIGN KEY (`pass_id`) REFERENCES `tblpasstype` (`pass_id`);

--
-- Constraints for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
ADD CONSTRAINT `tblconf_participant_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconf_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
ADD CONSTRAINT `tblconf_participant_ibfk_3` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconfpass` (`confpass_reference`);

--
-- Constraints for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
ADD CONSTRAINT `tblconf_sponsor_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconf_sponsor_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `tblsponsor` (`sponsor_id`);

--
-- Constraints for table `tblsessions`
--
ALTER TABLE `tblsessions`
ADD CONSTRAINT `tblsessions_ibfk_1` FOREIGN KEY (`speaker_id`) REFERENCES `tblspeaker` (`speaker_id`),
ADD CONSTRAINT `tblsessions_ibfk_2` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
