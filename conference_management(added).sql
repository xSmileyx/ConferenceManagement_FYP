-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 02:24 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingdetails`
--

CREATE TABLE `tblbookingdetails` (
  `booking_id` int(6) NOT NULL,
  `p_id` int(6) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL,
  `hotel_name` varchar(40) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount_paid` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingdetails`
--

INSERT INTO `tblbookingdetails` (`booking_id`, `p_id`, `p_firstname`, `p_surname`, `confpass_reference`, `hotel_name`, `start_date`, `end_date`, `amount_paid`) VALUES
(400752, 318499, 'Rayner', 'Paun', 299451, 'Hilton Hotel Kuching', '2016-05-25', '2016-05-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcaterer`
--

CREATE TABLE `tblcaterer` (
  `caterer_id` int(6) NOT NULL,
  `caterer_name` varchar(40) DEFAULT NULL,
  `caterer_phone` int(15) DEFAULT NULL,
  `caterer_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcaterer`
--

INSERT INTO `tblcaterer` (`caterer_id`, `caterer_name`, `caterer_phone`, `caterer_email`) VALUES
(100001, 'MB Caterers', 1231111111, ''),
(100002, 'Joyous Gourmet Catering', 146832151, ''),
(100003, 'SRC Catering', 597865489, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblconference`
--

CREATE TABLE `tblconference` (
  `conf_id` int(6) NOT NULL,
  `conf_name` varchar(50) DEFAULT NULL,
  `conf_startdate` date DEFAULT NULL,
  `conf_enddate` date DEFAULT NULL,
  `conf_numpass` int(4) DEFAULT NULL,
  `caterer_id` int(6) DEFAULT NULL,
  `venue_id` int(6) DEFAULT NULL,
  `em_id` int(6) DEFAULT NULL,
  `conf_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconference`
--

INSERT INTO `tblconference` (`conf_id`, `conf_name`, `conf_startdate`, `conf_enddate`, `conf_numpass`, `caterer_id`, `venue_id`, `em_id`, `conf_desc`) VALUES
(1, 'Autistic Children', '2016-05-17', '2016-05-19', 300, 100002, 200002, 1, 'Talk and learn on how to help autistic children!'),
(2, 'ads', '2015-10-13', '0000-00-00', 0, 100001, 200003, 1, 'asdasdad'),
(4, 'ads', '2015-10-13', '0000-00-00', 100, 100001, 200002, 1, 'asdfad');

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_participant`
--

CREATE TABLE `tblconf_participant` (
  `conf_id` int(6) DEFAULT NULL,
  `p_id` int(6) DEFAULT NULL,
  `confpass_reference` int(6) NOT NULL DEFAULT '0',
  `pass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_participant`
--

INSERT INTO `tblconf_participant` (`conf_id`, `p_id`, `confpass_reference`, `pass_id`) VALUES
(1, 318499, 253939, 1),
(1, 318499, 261586, 1),
(1, 318499, 299451, 3),
(1, 318499, 333312, 1),
(1, 318499, 498721, 1),
(1, 318499, 626311, 1),
(1, 318499, 862449, 1),
(1, 318499, 874145, 1),
(1, 318499, 919522, 1),
(1, 318499, 969517, 1),
(1, 318499, 989063, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_speaker`
--

CREATE TABLE `tblconf_speaker` (
  `cspeak_index` int(6) NOT NULL DEFAULT '0',
  `conf_id` int(6) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_sponsor`
--

CREATE TABLE `tblconf_sponsor` (
  `cs_index` int(6) NOT NULL,
  `sponsor_id` int(6) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `amount_provided` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_sponsor`
--

INSERT INTO `tblconf_sponsor` (`cs_index`, `sponsor_id`, `conf_id`, `amount_provided`) VALUES
(1, 1, 1, 100000),
(2, 3, 1, 50000),
(3, 3, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbleventmanager`
--

CREATE TABLE `tbleventmanager` (
  `em_id` int(6) NOT NULL,
  `em_username` varchar(15) DEFAULT NULL,
  `em_password` varchar(15) DEFAULT NULL,
  `em_firstname` varchar(15) DEFAULT NULL,
  `em_lastname` varchar(25) DEFAULT NULL,
  `em_phone` int(15) DEFAULT NULL,
  `em_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbleventmanager`
--

INSERT INTO `tbleventmanager` (`em_id`, `em_username`, `em_password`, `em_firstname`, `em_lastname`, `em_phone`, `em_email`) VALUES
(1, 'Samu', 'admin', 'Sadeiyen', 'Samu Pillai', 145689784, 'samu@swinburne.edu.my');

-- --------------------------------------------------------

--
-- Table structure for table `tblparticipant`
--

CREATE TABLE `tblparticipant` (
  `p_id` int(6) NOT NULL,
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

--
-- Dumping data for table `tblparticipant`
--

INSERT INTO `tblparticipant` (`p_id`, `p_username`, `p_password`, `p_firstname`, `p_surname`, `p_email`, `p_phone`, `p_dob`, `p_address`, `p_country`, `p_city`, `p_state`, `p_postalcode`, `p_newsletter`, `p_occupation`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd', 1234569787, '1993-05-11', 'asdasdasd', 'malaysia', 'kuching', 'sarawak', '93350', 1, 'student'),
(299846, 'sel', '456', 'Selven', 'Samu', 'sel@gmail.com', 16804760, '1994-08-07', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Jenjarom', 'Selangor', '89507', 0, 'Student'),
(318499, 'neko', '123', 'Rayner', 'Paun', 'neko.hart@yahoo.com', 168047360, '1994-12-02', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Kota Kinabalu', 'Sabah', '89507', 1, 'Student'),
(848611, 'deez', '456', 'John', 'Cena', 'neko.hart@gmail.com', 16987456, '2016-05-20', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Sandakan', 'Sabah', '89507', 0, 'Studsss');

-- --------------------------------------------------------

--
-- Table structure for table `tblpasstype`
--

CREATE TABLE `tblpasstype` (
  `pass_id` int(6) NOT NULL,
  `pass_type` varchar(25) DEFAULT NULL,
  `pass_desc` text,
  `pass_price` int(5) DEFAULT NULL,
  `pass_amount` int(4) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpasstype`
--

INSERT INTO `tblpasstype` (`pass_id`, `pass_type`, `pass_desc`, `pass_price`, `pass_amount`, `conf_id`) VALUES
(1, 'Early Bird', 'For the early birds.', 50, 100, 1),
(2, 'Normal', 'Effective after early bird period is over.', 100, 100, 1),
(3, 'VIP', 'For the VIP.', 150, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

CREATE TABLE `tblsession` (
  `session_id` int(6) NOT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL,
  `session_day` date DEFAULT NULL,
  `session_starttime` time DEFAULT NULL,
  `session_endtime` time DEFAULT NULL,
  `session_room` int(2) DEFAULT NULL,
  `session_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`session_id`, `conf_id`, `speaker_id`, `session_day`, `session_starttime`, `session_endtime`, `session_room`, `session_name`) VALUES
(1, 1, 1, '2016-05-17', '10:30:00', '11:00:00', 1, 'Helping autistic children.'),
(2, 1, 2, '2016-05-17', '10:30:00', '11:00:00', 2, 'Understanding autistic children.'),
(3, 1, 1, '2016-05-17', '11:00:00', '11:30:00', 1, 'Raising autistic children.'),
(8, 2, 3, '2016-10-18', '10:00:00', '11:00:00', 1, 'aasdasd'),
(9, 1, 3, '2016-10-18', '10:00:00', '11:00:00', 1, 'Speech about autistic children.');

-- --------------------------------------------------------

--
-- Table structure for table `tblspeaker`
--

CREATE TABLE `tblspeaker` (
  `speaker_id` int(6) NOT NULL,
  `speaker_firstname` varchar(30) DEFAULT NULL,
  `speaker_lastname` varchar(40) DEFAULT NULL,
  `speaker_details` text,
  `speaker_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspeaker`
--

INSERT INTO `tblspeaker` (`speaker_id`, `speaker_firstname`, `speaker_lastname`, `speaker_details`, `speaker_image`) VALUES
(1, 'Jonny', 'Test', 'Phd in something\r\nCurrent research: Bla Bla', ''),
(2, 'John', 'Snowy', '', ''),
(3, 'James', 'Cameron', 'Film maker\r\nCurrent research: Avatar', ''),
(4, 'Tony', 'Stark', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsponsor`
--

CREATE TABLE `tblsponsor` (
  `sponsor_id` int(6) NOT NULL,
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_email` varchar(50) DEFAULT NULL,
  `sponsor_phone` int(15) DEFAULT NULL,
  `sponsor_logo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsponsor`
--

INSERT INTO `tblsponsor` (`sponsor_id`, `sponsor_name`, `sponsor_email`, `sponsor_phone`, `sponsor_logo`) VALUES
(1, 'Swinburne', 'swin@swiburne.edu.my', 123658479, ''),
(3, 'KFC', 'kfc@hotmail.com', 1598631475, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltour`
--

CREATE TABLE `tbltour` (
  `tour_id` int(6) NOT NULL,
  `tour_name` varchar(50) DEFAULT NULL,
  `tour_location` varchar(50) NOT NULL,
  `tour_price` int(5) NOT NULL,
  `tour_duration` varchar(40) NOT NULL,
  `tour_starttime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltour`
--

INSERT INTO `tbltour` (`tour_id`, `tour_name`, `tour_location`, `tour_price`, `tour_duration`, `tour_starttime`) VALUES
(1, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', 280, '5-6', '7.30AM'),
(2, 'Amazing Rafflesia', 'Gunung Gading National Park, Kuching, Sarawak', 265, '5-8', '8.30AM'),
(3, 'Semenggoh Orangutans', 'Semenggoh Wildlife Centre, Kuching, Sarawak', 225, '3', '8.15AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourbookingdetails`
--

CREATE TABLE `tbltourbookingdetails` (
  `tourbooking_id` int(6) NOT NULL,
  `p_id` int(6) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL,
  `tour_name` varchar(40) DEFAULT NULL,
  `tour_location` varchar(50) DEFAULT NULL,
  `tour_duration` varchar(40) DEFAULT NULL,
  `tour_starttime` varchar(40) DEFAULT NULL,
  `tour_price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourbookingdetails`
--

INSERT INTO `tbltourbookingdetails` (`tourbooking_id`, `p_id`, `p_firstname`, `p_surname`, `confpass_reference`, `tour_name`, `tour_location`, `tour_duration`, `tour_starttime`, `tour_price`) VALUES
(416217, 318499, 'Rayner', 'Paun', 299451, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', '5-6', '7.30AM', 280);

-- --------------------------------------------------------

--
-- Table structure for table `tblvenue`
--

CREATE TABLE `tblvenue` (
  `venue_id` int(6) NOT NULL,
  `venue_name` varchar(50) DEFAULT NULL,
  `venue_address` varchar(80) DEFAULT NULL,
  `venue_nrooms` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvenue`
--

INSERT INTO `tblvenue` (`venue_id`, `venue_name`, `venue_address`, `venue_nrooms`) VALUES
(200002, 'Borneo Convention Center, Kuching', 'The Isthmus, Sejingkat, 93050 Kuching, Sarawak, Malaysia', 3),
(200003, 'BCCK2', 'Kuching', 10),
(200005, 'home', 'kuching', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `confpass_reference` (`confpass_reference`);

--
-- Indexes for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  ADD PRIMARY KEY (`caterer_id`);

--
-- Indexes for table `tblconference`
--
ALTER TABLE `tblconference`
  ADD PRIMARY KEY (`conf_id`),
  ADD KEY `em_id` (`em_id`),
  ADD KEY `caterer_id` (`caterer_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
  ADD PRIMARY KEY (`confpass_reference`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
  ADD PRIMARY KEY (`cspeak_index`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `speaker_id` (`speaker_id`);

--
-- Indexes for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  ADD PRIMARY KEY (`cs_index`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

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
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `conf_id_2` (`conf_id`);

--
-- Indexes for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `speaker_id` (`speaker_id`);

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
-- Indexes for table `tbltour`
--
ALTER TABLE `tbltour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbltourbookingdetails`
--
ALTER TABLE `tbltourbookingdetails`
  ADD PRIMARY KEY (`tourbooking_id`),
  ADD KEY `tbltourbookingdetails_ibfk_1` (`p_id`),
  ADD KEY `tbltourbookingdetails_ibfk_2` (`confpass_reference`);

--
-- Indexes for table `tblvenue`
--
ALTER TABLE `tblvenue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  MODIFY `booking_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=936403;
--
-- AUTO_INCREMENT for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  MODIFY `caterer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100004;
--
-- AUTO_INCREMENT for table `tblconference`
--
ALTER TABLE `tblconference`
  MODIFY `conf_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  MODIFY `cs_index` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbleventmanager`
--
ALTER TABLE `tbleventmanager`
  MODIFY `em_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblparticipant`
--
ALTER TABLE `tblparticipant`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=848612;
--
-- AUTO_INCREMENT for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  MODIFY `pass_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `session_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  MODIFY `speaker_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblsponsor`
--
ALTER TABLE `tblsponsor`
  MODIFY `sponsor_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblvenue`
--
ALTER TABLE `tblvenue`
  MODIFY `venue_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200006;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  ADD CONSTRAINT `tblbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
  ADD CONSTRAINT `tblbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconf_participant` (`confpass_reference`);

--
-- Constraints for table `tblconference`
--
ALTER TABLE `tblconference`
  ADD CONSTRAINT `tblconference_ibfk_1` FOREIGN KEY (`em_id`) REFERENCES `tbleventmanager` (`em_id`),
  ADD CONSTRAINT `tblconference_ibfk_2` FOREIGN KEY (`caterer_id`) REFERENCES `tblcaterer` (`caterer_id`),
  ADD CONSTRAINT `tblconference_ibfk_3` FOREIGN KEY (`venue_id`) REFERENCES `tblvenue` (`venue_id`);

--
-- Constraints for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
  ADD CONSTRAINT `tblconf_participant_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
  ADD CONSTRAINT `tblconf_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
  ADD CONSTRAINT `tblconf_participant_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `tblpasstype` (`pass_id`);

--
-- Constraints for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
  ADD CONSTRAINT `tblconf_speaker_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
  ADD CONSTRAINT `tblconf_speaker_ibfk_2` FOREIGN KEY (`speaker_id`) REFERENCES `tblspeaker` (`speaker_id`);

--
-- Constraints for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  ADD CONSTRAINT `tblconf_sponsor_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
  ADD CONSTRAINT `tblconf_sponsor_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `tblsponsor` (`sponsor_id`);

--
-- Constraints for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  ADD CONSTRAINT `tblpasstype_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`);

--
-- Constraints for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD CONSTRAINT `tblsession_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
  ADD CONSTRAINT `tblsession_ibfk_2` FOREIGN KEY (`speaker_id`) REFERENCES `tblspeaker` (`speaker_id`);

--
-- Constraints for table `tbltourbookingdetails`
--
ALTER TABLE `tbltourbookingdetails`
  ADD CONSTRAINT `tbltourbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
  ADD CONSTRAINT `tbltourbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconf_participant` (`confpass_reference`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
