-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 09:54 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fa`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`, `status`) VALUES
(1, 2, 1, 'yes'),
(2, 10, 2, 'yes'),
(3, 10, 1, 'yes'),
(4, 1, 9, 'yes'),
(5, 14, 1, 'yes'),
(6, 10, 9, 'yes'),
(7, 13, 9, 'yes'),
(8, 12, 9, 'yes'),
(9, 14, 13, 'yes'),
(10, 12, 13, 'yes'),
(11, 1, 12, 'yes'),
(12, 13, 1, 'yes'),
(13, 2, 12, 'yes'),
(14, 12, 10, 'yes'),
(15, 2, 9, 'yes'),
(16, 6, 2, 'yes'),
(17, 13, 10, 'yes'),
(18, 11, 10, 'No'),
(19, 11, 1, 'No'),
(20, 1, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `conversationstart`
--

CREATE TABLE `conversationstart` (
  `csid` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `fid` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `friendadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `relation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`fid`, `user_two`, `user_one`, `friendadd`, `relation`) VALUES
(1, 12, 1, '2017-11-12 15:22:21', 'Friend'),
(2, 12, 9, '2017-11-12 15:23:57', 'Friend Request Send'),
(3, 1, 10, '2017-11-12 15:24:21', 'Friend'),
(4, 10, 12, '2017-11-12 15:26:02', 'Friend Request Send'),
(5, 9, 1, '2017-11-12 15:38:27', 'Friend Request Send'),
(6, 1, 2, '2017-11-12 15:38:42', 'Friend'),
(7, 9, 2, '2017-11-12 15:38:52', 'Friend'),
(8, 2, 10, '2017-11-12 15:39:29', 'Friend'),
(9, 9, 10, '2017-11-13 09:50:48', 'Friend Request Send');

-- --------------------------------------------------------

--
-- Table structure for table `friendcheck`
--

CREATE TABLE `friendcheck` (
  `fcid` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `friendadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `relation` varchar(20) NOT NULL DEFAULT 'Add Friend'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendcheck`
--

INSERT INTO `friendcheck` (`fcid`, `user_two`, `user_one`, `send_id`, `rec_id`, `ip`, `friendadd`, `relation`) VALUES
(1, 12, 1, 12, 1, '::1', '2017-11-12 15:21:16', 'Friend'),
(2, 12, 9, 12, 0, '::1', '2017-11-12 15:23:55', 'Friend Request Send'),
(3, 1, 10, 1, 10, '::1', '2017-11-12 15:24:19', 'Friend'),
(4, 10, 12, 10, 0, '::1', '2017-11-12 15:25:59', 'Friend Request Send'),
(5, 9, 1, 9, 0, '::1', '2017-11-12 15:38:25', 'Friend Request Send'),
(6, 1, 2, 1, 2, '::1', '2017-11-12 15:38:40', 'Friend'),
(7, 9, 2, 9, 2, '::1', '2017-11-12 15:38:50', 'Friend'),
(8, 2, 10, 2, 10, '::1', '2017-11-12 15:39:27', 'Friend'),
(9, 2, 6, 0, 0, '', '2017-11-12 16:08:28', 'Add Friend'),
(10, 10, 9, 9, 0, '::1', '2017-11-13 09:50:34', 'Friend Request Send'),
(11, 10, 13, 0, 0, '', '2017-11-13 11:58:33', 'Add Friend'),
(12, 13, 14, 0, 0, '', '2017-11-13 12:12:52', 'Add Friend'),
(13, 10, 11, 0, 0, '', '2017-11-30 23:48:54', 'Add Friend'),
(14, 1, 11, 0, 0, '', '2017-12-19 05:32:59', 'Add Friend'),
(15, 0, 1, 0, 0, '', '2018-01-27 02:10:02', 'Add Friend');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imgid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `privacy` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `lid` int(11) NOT NULL,
  `lpid` int(11) NOT NULL,
  `luid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`lid`, `lpid`, `luid`) VALUES
(1, 3, 1),
(2, 2, 1),
(3, 12, 2),
(5, 41, 9),
(6, 31, 9),
(7, 30, 9),
(8, 31, 10),
(9, 46, 1),
(10, 47, 1),
(11, 47, 10);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `loginId` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `loginId`, `time`, `active`) VALUES
(165, '1', 1525247687, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `cid` varchar(50) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `user_from`, `user_to`, `message`, `cid`, `ip`, `time`) VALUES
(1, 'alauddin020', 1, 10, 'hi', '3', '::1', '2017-11-10 12:26:33'),
(2, 'alisha', 10, 1, 'whats up', '3', '::1', '2017-11-10 12:27:00'),
(3, 'alisha', 10, 1, 'hi', '3', '::1', '2017-11-10 12:35:28'),
(4, 'alauddin020', 1, 10, 'how are you', '3', '::1', '2017-11-10 12:36:00'),
(5, 'alauddin020', 1, 10, 'good', '3', '::1', '2017-11-10 12:36:09'),
(6, 'alisha', 10, 1, 'good', '3', '::1', '2017-11-10 12:36:14'),
(7, 'alauddin020', 1, 2, 'hi', '1', '::1', '2017-11-10 12:43:41'),
(8, 'alauddin', 2, 10, 'hi', '2', '::1', '2017-11-11 06:10:25'),
(9, 'alisha', 10, 2, 'whats up', '2', '::1', '2017-11-11 06:10:49'),
(10, 'alisha', 10, 1, 'Use on a limited basis and avoid creating entirely different versions of the same site. Instead, use them to complement each device\'s presentation. Responsive utilities should not be used with tables, and as such are not supported.', '3', '::1', '2017-11-11 10:46:00'),
(11, 'alisha', 10, 1, 'If you were to ask me for the top five words that should describe any JavaScript framework, one of them would be flexible.  The Dojo Toolkit is ultra-flexible in just about every way, using customizable classes and dojo-namespaced objects to to allow for maximal flexibility.  One of those dojo-namespaced objects, dojo.contentHandlers, is an object containing key->value pairs for handling the result of AJAX requests.  Let me show you how to use these content handlers and how you can create your own!\n\ndojo.xhr and handleAs\nMaking AJAX requests is done with Dojo\'s dojo.xhr methods.  Sending a basic GET request would look like:\n\ndojo.xhrGet({\n	url: \"/ajax.php\",\n	load: function(result) {\n		// Do something with the result here\n	}\n});\nThe request above assumes that the response should be handled as plain text, as you would expect.  Dojo\'s dojo.xhr methods all accept an object with properties for handling the request, and one property you can add is handleAs.  The handleAs property should be a string representing the type of parsing that should be done to the result before its passed to the load method or deferred callback.  Values for the handleAs property could be json, javascript, xml, or other variants of json.  If I want my request to be handled as JSON, I\'d code:\n\ndojo.xhrGet({\n	url: \"/ajax.php\",\n	handleAs: \"json\",\n	load: function(result) { // result is a JS object\n		// Do something with the result here\n	}\n});\nThe resulting object provided to the load handler is text parsed into JavaScript object.  Likewise, if I want the result to be handled as XML, I\'d code:\n\ndojo.xhrGet({\n	url: \"/ajax.php\",\n	handleAs: \"xml\",\n	load: function(result) { // result is a XMLDocument object\n		// Do something with the result here\n	}\n});\nThe load callback is provided a XMLDocument object.  One simple parameter changes the way the request response is parsed.  So how is this possible, and how can you create custom handleAs methods?  Simple!\n\ndojo.contentHandlers\nThe dojo.contentHandlers object acts as dictionary for ajax request parsing.  The handleAs parameter you  supply maps to the key within dojo.contentHandlers.  The dojo.contentHandlers object comes with the following content handlers:  javascript, json, json-comment-filtered, json-comment-optional, text, and xml.  Here\'s a snippet containing those \"parsers\":', '3', '::1', '2017-11-11 10:48:24'),
(12, 'alisha', 10, 9, 'hi', '6', '::1', '2017-11-12 12:43:51'),
(13, 'mofazzal', 13, 10, 'hi', '17', '::1', '2017-11-13 11:59:10'),
(14, 'rasel', 14, 13, 'hi', '9', '::1', '2017-11-13 12:12:58'),
(15, 'masum', 9, 1, 'hi', '4', '::1', '2017-12-02 10:50:20'),
(16, 'alauddin020', 1, 10, 'hi', '3', '::1', '2017-12-19 05:34:47'),
(17, 'alisha', 10, 1, 'whats up', '3', '::1', '2017-12-19 05:35:15'),
(18, 'ikbal', 12, 1, 'hi', '11', '::1', '2018-01-06 03:04:35'),
(19, 'alisha', 10, 1, 'hello alisha', '3', '::1', '2018-01-27 02:15:55'),
(20, 'alauddin020', 1, 10, 'hi vaiya', '3', '::1', '2018-01-27 02:16:21'),
(21, 'alauddin020', 1, 10, 'whats up', '3', '::1', '2018-01-27 02:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `pinformation`
--

CREATE TABLE `pinformation` (
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `study` varchar(100) NOT NULL,
  `studyw` varchar(100) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `live` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinformation`
--

INSERT INTO `pinformation` (`iid`, `uid`, `job`, `study`, `studyw`, `relation`, `live`) VALUES
(1, 1, '', 'B. Sc in Computer Science & Engineering (CSE)', 'Department of CSE, University of Asia Pacific', 'Single', 'Dhaka,Bangladesh'),
(2, 2, '', 'B. Sc in Computer Science & Engineering (CSE)', 'Department of CSE, University of Asia Pacific', '', 'Dhaka,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `commentid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `commentuid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `commenttext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`commentid`, `postid`, `commentuid`, `time`, `commenttext`) VALUES
(5, 31, 10, 1510597656, 'very nice'),
(6, 6, 1, 1512233831, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `pdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `udetails` (
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

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `uusername` varchar(50) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `privacy` varchar(30) NOT NULL DEFAULT 'Friends',
  `uphoto` varchar(50) NOT NULL DEFAULT '../images/demo.png',
  `ucover` varchar(50) NOT NULL,
  `ujoindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utype` varchar(30) NOT NULL DEFAULT 'user',
  `ustatus` varchar(30) NOT NULL DEFAULT 'Active',
  `verified` varchar(2) NOT NULL DEFAULT '0',
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uusername`, `uemail`, `upass`, `privacy`, `uphoto`, `ucover`, `ujoindate`, `utype`, `ustatus`, `verified`, `last_activity`) VALUES
(1, 'Alauddin F-a', 'alauddin020', 'alauddin020@gmail.com', '123', 'Public', '../images/alauddin020.jpg', '', '2017-09-30 16:30:16', 'admin', 'Active', '1', '2018-01-27 02:11:44'),
(2, 'Alauddin Alal', 'alauddin', 'alauddin@gmail.com', '123', 'Public', '../images/alauddin.jpg', '', '2017-09-30 16:30:16', 'user', 'Active', '1', '2017-11-08 05:03:30'),
(3, 'Alauddin F-a', 'alauddin2', 'alauddin56@gmail.com', '12345678', 'Friends', '../images/demo.png', '', '2017-10-24 12:30:06', 'user', 'Active', '0', '2017-11-05 05:32:29'),
(4, 'Another', 'another', 'another@gmail.com', '12345678', 'Friends', '../images/demo.png', '', '2017-10-24 12:33:57', 'user', 'Active', '0', '2017-11-05 05:32:33'),
(5, 'testing', 'testing', 'testing@gmail.com', '12345678', 'Friends', '../images/demo.png', '', '2017-10-24 12:40:23', 'user', 'Active', '0', '2017-11-05 05:32:37'),
(6, 'testing', 'a1234', 'alauddin0201@gmail.com', '12345678', 'Friends', '../images/demo.png', '', '2017-10-24 13:02:27', 'user', 'Active', '0', '2017-11-08 06:54:51'),
(7, 'testing', 'testing1', 'testing@ymail.com', '12345678', 'Public', '../images/demo.png', '', '2017-10-25 08:20:02', 'user', 'Active', '0', '2017-11-05 05:32:44'),
(8, 'Alauddin', 'testing2', 'testing@ymail.com3', '12345678', 'Friends', '../images/demo.png', '', '2017-10-25 09:22:34', 'user', 'Active', '0', '2017-11-05 05:32:48'),
(9, 'Md Masum', 'masum', 'masum@gmail.com', '123', 'Public', '../images/masum.jpg', '', '2017-11-07 07:38:44', 'user', 'Active', '0', '2017-11-10 13:06:18'),
(10, 'Alisha Jaman', 'alisha', 'alisha@gmail.com', '123', 'Public', '../images/alisha.jpg', '', '2017-11-07 07:44:15', 'user', 'Active', '1', '2017-11-20 08:55:01'),
(11, 'Md Ohidul', 'ohid', 'ohid@gmail.com', '123', 'Friends', '../images/ohid.jpg', '', '2017-11-07 07:44:15', 'user', 'Active', '0', '2017-11-07 07:44:15'),
(12, 'Ikbal Hasan', 'ikbal', 'ikbal@gmail.com', '123', 'Friends', '../images/demo.png', '', '2017-11-09 15:39:14', 'user', 'Active', '0', '2017-11-12 12:47:14'),
(13, 'Mofazzal', 'mofazzal', 'mofazzal@gmail.com', '123', 'Friends', '../images/demo.png', '', '2017-11-09 15:42:32', 'user', 'Active', '0', '2017-11-12 12:47:20'),
(14, 'Rasel Rana', 'rasel', 'rasel@gmail.com', '123', 'Friends', '../images/demo.png', '', '2017-11-09 15:44:12', 'user', 'Active', '0', '2017-11-12 12:47:26'),
(15, 'Arko Uchaas', 'uchaas', 'arkouchaas@gmail.com', '564+48+98+94', 'Friends', '../images/demo.png', '', '2017-11-09 15:48:48', 'user', 'Active', '0', '2017-11-09 15:48:48'),
(16, 'Foysul Islam', 'foysul', 'foysul@gmail.com', '123456781', 'Friends', '../images/demo.png', '', '2017-12-11 03:24:22', 'user', 'Active', '0', '2017-12-11 03:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE `userpost` (
  `pid` int(11) NOT NULL,
  `pcontent` text NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pdate` bigint(20) NOT NULL,
  `cdate` varchar(30) NOT NULL,
  `pprivacy` varchar(30) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpost`
--

INSERT INTO `userpost` (`pid`, `pcontent`, `pimage`, `pdate`, `cdate`, `pprivacy`, `ip`, `likes`, `uid`) VALUES
(1, '', 'uploads/8610.jpg', 1510404347, 'Nov 11 at 10:50 pm', 'Public', '::1', 0, 1),
(2, 'its 3 year', 'uploads/8810.jpg', 1510404538, '', 'Public', '::1', 1, 10),
(3, '2014', 'uploads/14799.jpg', 1510404692, '', 'Public', '::1', 1, 10),
(6, 'mysqli_real_escape_string($con, ', '', 1510419019, 'Nov 11 at 10:50 pm', 'Public', '::1', 0, 1),
(7, 'If you were to ask me for the top five words that should describe any JavaScript framework, one of them would be flexible.  The Dojo Toolkit is ultra-flexible in just about every way, using customizable classes and dojo-namespaced', '', 1510419083, 'Nov 11 at 10:51 pm', 'Public', '::1', 0, 1),
(8, 'PHP is one of the easy handling languages which makes developers be comfortable to work with. On the other hand, it is easy to hack the code from outside. Since web applications accept data from outsiders spread among the world, we need to validate such data, before allowing it to our PHP application, for security [â€¦] This tutorial was added to PHP.', '', 1510424914, 'Nov 12 at 12:28 am', 'Public', '::1', 0, 10),
(9, 'PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.', '', 1510425276, 'Nov 12 at 12:34 am', 'Public', '::1', 0, 10),
(10, 'Just now  \n\n \nPHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nPHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.', '', 1510425337, 'Nov 12 at 12:35 am', 'Public', '::1', 0, 10),
(11, 'Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nJust Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nJust Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nJust Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nJust Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\nJust Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.\n', '', 1510425370, 'Nov 12 at 12:36 am', 'Public', '::1', 0, 10),
(12, 'Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. Just Now PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP. PHP Is One Of The Easy Handling Languages Which Makes Developers Be Comfortable To Work With. On The Other Hand, It Is Easy To Hack The Code From Outside. Since Web Applications Accept Data From Outsiders Spread Among The World, We Need To Validate Such Data, Before Allowing It To Our PHP Application, For Security [â€¦] This Tutorial Was Added To PHP.', 'uploads/21093.jpg', 1510425425, '', 'Public', '::1', 1, 1),
(24, 'hi', 'uploads/2014-12-13 15.09.14.jpg', 0, '', '', '', 0, 0),
(30, '', 'uploads/2014-12-13 15.09.14.jpg', 1510510092, '', 'Public', '::1', 1, 1),
(31, 'University of Asia Pacific', 'uploads/2014-12-13 15.08.48.jpg', 1510510125, '', 'Public', '::1', 2, 1),
(41, '', 'uploads/2014-12-30 10.06.54.jpg', 1510511330, '', 'Friends', '::1', 1, 10),
(44, 'This could be quite simple and I am sure I could write a function to do it, but I am pretty sure \nthere has to be an already made PHP function to take care of it the right way.\nand other thing is updated\n', '', 1510511499, '', 'Public', '::1', 0, 10),
(46, '', 'uploads/2015-05-17 16.01.43.jpg', 1510512325, '', 'Public', '::1', 1, 9),
(47, 'After long time this will be happen', '', 1513614556, 'Dec 18 at 10:29 pm', 'Public', '::1', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversationstart`
--
ALTER TABLE `conversationstart`
  ADD PRIMARY KEY (`csid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `friendcheck`
--
ALTER TABLE `friendcheck`
  ADD PRIMARY KEY (`fcid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`lid`);

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
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udetails`
--
ALTER TABLE `udetails`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uusername` (`uusername`),
  ADD UNIQUE KEY `uemai` (`uemail`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `conversationstart`
--
ALTER TABLE `conversationstart`
  MODIFY `csid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `friendcheck`
--
ALTER TABLE `friendcheck`
  MODIFY `fcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pinformation`
--
ALTER TABLE `pinformation`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `udetails`
--
ALTER TABLE `udetails`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `udetails`
--
ALTER TABLE `udetails`
  ADD CONSTRAINT `udetails_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
