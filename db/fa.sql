-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 07:24 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fa`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`) VALUES
(1, 7, 2),
(2, 1, 2),
(3, 7, 1),
(4, 6, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `fid` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL DEFAULT 'Add Friend',
  `incoming` int(11) NOT NULL,
  `outgoing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `imgid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `privacy` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `last_activity` bigint(20) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `uid`, `last_activity`, `active`) VALUES
(1, '1', 1509733867, 1),
(2, '1', 1509733867, 1),
(3, '0', 0, 0),
(4, '1', 1509733867, 1),
(5, '0', 0, 0),
(6, '0', 0, 0),
(7, '1', 1509733867, 1),
(8, '1', 1509733867, 1),
(9, '1', 1509733867, 1),
(10, '1', 1509733867, 1),
(11, '1', 1509733867, 1),
(12, '1', 1509733867, 1),
(13, '1', 1509733867, 1),
(14, '1', 1509733867, 1),
(15, '1', 1509733867, 1),
(16, '1', 1509733867, 1),
(17, 'testing1', 0, 0),
(18, '1', 1509733867, 1),
(19, '1', 1509733867, 1),
(20, '1', 1509733867, 1),
(21, '1', 1509733867, 1),
(22, 'testing2', 0, 0),
(23, '1', 1509733867, 1),
(24, '1', 1509733867, 1),
(25, '1', 1509733867, 1),
(26, '1', 1509733867, 1),
(27, '1', 1509733867, 1),
(28, '1', 1509733867, 1),
(29, '1', 1509733867, 1),
(30, '1', 1509733867, 1),
(31, '1', 1509733867, 1),
(32, '1', 1509733867, 1),
(33, '1', 1509733867, 1),
(34, '1', 0, 0),
(35, '1', 0, 0),
(36, '1', 0, 0),
(37, '1', 0, 0),
(38, '1', 0, 0),
(39, '1', 0, 0),
(40, '1', 0, 0),
(41, '1', 0, 0),
(42, '1', 0, 0),
(43, '1', 0, 0),
(44, '1', 0, 0),
(45, '1', 0, 0),
(46, '1', 0, 0),
(47, '1', 0, 0),
(48, '1', 0, 0),
(49, '1', 0, 0),
(50, '1', 0, 0),
(51, '1', 0, 0),
(52, '1', 0, 0),
(53, '1', 0, 0),
(54, '1', 0, 0),
(55, '1', 0, 0),
(56, '1', 0, 0),
(57, '1', 0, 0),
(58, '1', 0, 0),
(59, '1', 0, 0),
(60, '1', 0, 0),
(61, '1', 0, 0),
(62, '1', 0, 0),
(63, '1', 0, 0),
(64, '1', 0, 0),
(65, '1', 0, 0),
(66, '1', 0, 0),
(67, '1', 0, 0),
(68, '1', 0, 0),
(69, '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `cid` varchar(50) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `user_from`, `user_to`, `message`, `cid`, `ip`, `time`) VALUES
(1, 'alauddin020', 1, 2, 'hi', '2', '::1', '2017-11-05 06:07:02'),
(2, 'alauddin', 2, 1, 'hello', '2', '::1', '2017-11-05 06:07:07'),
(3, 'alauddin', 2, 1, 'whats up', '2', '::1', '2017-11-05 06:07:16'),
(4, 'alauddin', 2, 1, 'is it good', '2', '::1', '2017-11-05 06:07:23'),
(5, 'alauddin020', 1, 2, 'yes everything is fine', '2', '::1', '2017-11-05 06:07:44'),
(6, 'alauddin2', 3, 1, 'hei man', '5', '::1', '2017-11-05 06:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `pinformation`
--

CREATE TABLE IF NOT EXISTS `pinformation` (
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `study` varchar(100) NOT NULL,
  `studyw` varchar(100) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `live` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinformation`
--

INSERT INTO `pinformation` (`iid`, `uid`, `job`, `study`, `studyw`, `relation`, `live`) VALUES
(1, 1, '', 'B. Sc in Computer Science & Engineering (CSE)', 'Department of CSE, University of Asia Pacific', 'Single', 'Dhaka,Bangladesh'),
(2, 2, '', 'B. Sc in Computer Science & Engineering (CSE)', 'Department of CSE, University of Asia Pacific', '', 'Dhaka,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `pdate` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `pdate`) VALUES
(1, '', ''),
(2, 'hi', 'Oct 22 at 12:55 pm'),
(3, 'hello there is a problem', 'Oct 22 at 12:56 pm'),
(4, 'hi', 'Oct 22 at 12:58 pm'),
(5, 'there is no thing', 'Oct 22 at 12:58 pm'),
(6, 'hi', 'Oct 22 at 12:59 pm'),
(7, 'whats up', 'Oct 22 at 12:59 pm'),
(8, '1:00 PM', 'Oct 22 at 1:04 pm'),
(9, 'Alauddin F-a', 'Oct 22 at 1:11 pm'),
(10, 'hi', 'Oct 23 at 12:35 am');

-- --------------------------------------------------------

--
-- Table structure for table `udetails`
--

CREATE TABLE IF NOT EXISTS `udetails` (
  `did` int(11) NOT NULL,
  `ulast` text NOT NULL,
  `urelation` varchar(100) NOT NULL,
  `uschool` varchar(100) NOT NULL,
  `ucollege` varchar(100) NOT NULL,
  `uuniversity` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `uusername` varchar(50) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `privacy` varchar(30) NOT NULL DEFAULT 'Friends',
  `uphoto` varchar(50) NOT NULL,
  `ucover` varchar(50) NOT NULL,
  `ujoindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utype` varchar(30) NOT NULL DEFAULT 'user',
  `ustatus` varchar(30) NOT NULL DEFAULT 'Active',
  `verified` varchar(2) NOT NULL DEFAULT '0',
  `last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uusername`, `uemail`, `upass`, `privacy`, `uphoto`, `ucover`, `ujoindate`, `utype`, `ustatus`, `verified`, `last_activity`) VALUES
(1, 'Alauddin F-a', 'alauddin020', 'alauddin020@gmail.com', '123', 'Public', '../images/alauddin020.jpg', '', '2017-09-30 22:30:16', 'admin', 'Active', '1', '2017-11-05 12:14:46'),
(2, 'Alauddin Alal', 'alauddin', 'alauddin@gmail.com', '123', 'Public', '../images/alauddin.jpg', '', '2017-09-30 22:30:16', 'user', 'Active', '1', '2017-11-02 02:03:03'),
(3, 'Alauddin F-a', 'alauddin2', 'alauddin56@gmail.com', '12345678', 'Friends', '', '', '2017-10-24 18:30:06', 'user', 'Active', '0', '2017-10-25 00:30:06'),
(4, 'Another', 'another', 'another@gmail.com', '12345678', 'Friends', '', '', '2017-10-24 18:33:57', 'user', 'Active', '0', '2017-10-25 00:33:57'),
(5, 'testing', 'testing', 'testing@gmail.com', '12345678', 'Friends', '', '', '2017-10-24 18:40:23', 'user', 'Active', '0', '2017-11-05 03:19:44'),
(6, 'testing', 'a1234', 'alauddin0201@gmail.com', '12345678', 'Friends', '', '', '2017-10-24 19:02:27', 'user', 'Active', '0', '2017-10-25 01:02:27'),
(7, 'testing', 'testing1', 'testing@ymail.com', '12345678', 'Public', '', '', '2017-10-25 14:20:02', 'user', 'Active', '0', '2017-11-05 03:15:07'),
(8, 'Alauddin', 'testing2', 'testing@ymail.com3', '12345678', 'Friends', '', '', '2017-10-25 15:22:34', 'user', 'Active', '0', '2017-10-25 21:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE IF NOT EXISTS `userpost` (
  `pid` int(11) NOT NULL,
  `pcontent` varchar(10000) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pdate` bigint(20) NOT NULL,
  `cdate` varchar(30) NOT NULL,
  `pprivacy` varchar(30) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpost`
--

INSERT INTO `userpost` (`pid`, `pcontent`, `pimage`, `pdate`, `cdate`, `pprivacy`, `ip`, `uid`) VALUES
(1, 'hi whats up', '', 1508761173, 'Oct 23 at 6:19 pm', 'Public', '::1', 1),
(2, 'demo testing edited', '', 1508761292, 'Oct 23 at 6:21 pm', 'Public', '::1', 1),
(3, 'only me', '', 1508761813, 'Oct 23 at 6:30 pm', 'Public', '::1', 1),
(4, 'friends', '', 1508761901, 'Oct 23 at 6:31 pm', 'OnlyMe', '::1', 1),
(5, 'only me', '', 1508761912, 'Oct 23 at 6:31 pm', 'OnlyMe', '::1', 1),
(6, 'friends', '', 1508761927, 'Oct 23 at 6:32 pm', 'OnlyMe', '::1', 1),
(7, 'hi', '', 1508762075, 'Oct 23 at 6:34 pm', 'Friends', '::1', 1),
(8, 'hi', '', 1508762091, 'Oct 23 at 6:34 pm', 'Friends', '::1', 1),
(9, 'df', '', 1508762216, 'Oct 23 at 6:36 pm', 'Public', '::1', 1),
(10, 'dfkljvkld\n\nfdgfgf', '', 1508762227, 'Oct 23 at 6:37 pm', 'Public', '::1', 1),
(11, 'public', '', 1508762797, 'Oct 23 at 6:46 pm', 'Public', '::1', 1),
(12, 'onlyme', '', 1508762806, 'Oct 23 at 6:46 pm', 'OnlyMe', '::1', 1),
(13, 'nothing', '', 1508762819, 'Oct 23 at 6:46 pm', 'Friends', '::1', 1),
(14, 'this is public', '', 1508762876, 'Oct 23 at 6:47 pm', 'Public', '::1', 1),
(15, 'this is friends', '', 1508762891, 'Oct 23 at 6:48 pm', 'Friends', '::1', 1),
(16, 'only for friends', '', 1508763113, 'Oct 23 at 6:51 pm', 'Friends', '::1', 2),
(17, 'this is public', '', 1508763128, 'Oct 23 at 6:52 pm', 'Public', '::1', 2),
(18, 'hi', '', 1508792113, 'Oct 24 at 2:55 am', 'Public', '::1', 1),
(19, 'hi', '', 1508792279, 'Oct 24 at 2:57 am', 'Public', '::1', 1),
(20, 'its working', '', 1508792305, 'Oct 24 at 2:58 am', 'Friends', '::1', 1),
(21, 'hi its working', '', 1508792329, 'Oct 24 at 2:58 am', 'Public', '::1', 2),
(22, 'hi', '', 1508792711, 'Oct 24 at 3:05 am', 'Public', '::1', 1),
(23, 'we will back', '', 1509697151, 'Nov 3 at 2:19 pm', 'Public', '::1', 1),
(24, 'chatting System is ready', '', 1509862193, 'Nov 5 at 12:09 pm', 'Public', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinformation`
--
ALTER TABLE `pinformation`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udetails`
--
ALTER TABLE `udetails`
  ADD PRIMARY KEY (`did`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `uusername` (`uusername`), ADD UNIQUE KEY `uemai` (`uemail`);

--
-- Indexes for table `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pinformation`
--
ALTER TABLE `pinformation`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `udetails`
--
ALTER TABLE `udetails`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `udetails`
--
ALTER TABLE `udetails`
ADD CONSTRAINT `udetails_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
