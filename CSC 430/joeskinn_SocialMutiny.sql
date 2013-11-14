-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2012 at 06:04 PM
-- Server version: 5.1.61
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joeskinn_SocialMutiny`
--

-- --------------------------------------------------------

--
-- Table structure for table `bannedUsers`
--

DROP TABLE IF EXISTS `bannedUsers`;
CREATE TABLE IF NOT EXISTS `bannedUsers` (
  `bannedID` int(10) NOT NULL AUTO_INCREMENT,
  `bannedEmail` text,
  PRIMARY KEY (`bannedID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventLink`
--

DROP TABLE IF EXISTS `eventLink`;
CREATE TABLE IF NOT EXISTS `eventLink` (
  `eventID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`eventID`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(10) NOT NULL AUTO_INCREMENT,
  `picturePath` text,
  `picture` text,
  `title` text,
  `subject` text,
  `dateOccur` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`feedbackID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `fID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `friendID` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`fID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fID`, `userID`, `friendID`, `date`) VALUES
(1, 3, 1, '2012-03-15 15:26:30'),
(4, 1, 7, '2012-03-19 19:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `groupLink`
--

DROP TABLE IF EXISTS `groupLink`;
CREATE TABLE IF NOT EXISTS `groupLink` (
  `groupID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(10) NOT NULL AUTO_INCREMENT,
  `name` text,
  `picturePath` text,
  `picture` text,
  `reason` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `inboxID` int(11) NOT NULL,
  `messageID` int(11) NOT NULL,
  PRIMARY KEY (`inboxID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landingRequest`
--

DROP TABLE IF EXISTS `landingRequest`;
CREATE TABLE IF NOT EXISTS `landingRequest` (
  `emailID` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`emailID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `landingRequest`
--

INSERT INTO `landingRequest` (`emailID`, `email`) VALUES
(1, 'josephskinner08@gmail.com'),
(4, 'megancohen.ny@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(10) NOT NULL AUTO_INCREMENT,
  `inboxID` varchar(11) NOT NULL,
  `senderID` int(10) DEFAULT NULL,
  `recipientID` int(10) DEFAULT NULL,
  `subject` text,
  `message` text,
  `date` datetime DEFAULT NULL,
  `unread` tinyint(1) NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `inboxID`, `senderID`, `recipientID`, `subject`, `message`, `date`, `unread`) VALUES
(54, '1_3', 1, 3, 'No Subject', 'think i forgot an apostrophe', '2012-03-27 16:51:55', 1),
(15, '1_3', 1, 3, 'No Subject', 'yoooo testing', '2012-03-27 13:28:01', 1),
(53, '1_3', 1, 3, 'No Subject', 'fuckk!', '2012-03-27 16:48:03', 1),
(52, '1_3', 1, 3, 'No Subject', 'here we go again', '2012-03-27 16:46:39', 1),
(51, '1_3', 1, 3, 'No Subject', 'one more try', '2012-03-27 16:45:02', 1),
(49, '1_3', 1, 3, 'No Subject', 'More tests', '2012-03-27 16:40:48', 1),
(50, '1_3', 1, 3, 'No Subject', 'it won''''t refresh', '2012-03-27 16:43:52', 1),
(31, '1_3', 1, 3, 'No Subject', 'here is another one', '2012-03-27 13:42:04', 1),
(47, '1_7', 1, 7, 'No Subject', 'hi again!!!', '2012-03-27 13:46:31', 1),
(46, '1_3', 1, 3, 'No Subject', 'here is another one', '2012-03-27 13:43:08', 1),
(55, '1_3', 3, 1, 'No Subject', 'mooooo', '2012-03-27 18:13:50', 1),
(56, '1_3', 3, 1, 'No Subject', 'moooooooooreeeeee test forrrrrrrrrrrrrrrrr a reallyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy\r\n\r\nloooooooooooooooooooooooooong messaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaageeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2012-04-01 17:14:53', 1),
(57, '1_3', 1, 3, 'No Subject', 'blaaaaaahhhhhasdhf;jas;lkdflkasjdflkjasdflkjasdkfjadsl;fkadsfjads;lasklfaklsdfj;adlskfjaskld;fjlkasdfj;alskfjsdkl;fjasl;kfgjiorngpqioerfgnoipqerfnoipqerngaokdjngdka;gna;skdflgjas;lkdfjas;lkdflaskdf;laskdflkasdfjl;aksfjl;sadkasdkfjasl;dkfjpoqwirfmpoqeirjgn;oqeirgj', '2012-04-05 17:13:05', 1),
(58, '1_3', 1, 3, 'No Subject', 'booo yaaaaaa', '2012-04-05 17:43:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `networkLink`
--

DROP TABLE IF EXISTS `networkLink`;
CREATE TABLE IF NOT EXISTS `networkLink` (
  `networkID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`networkID`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `networkRequest`
--

DROP TABLE IF EXISTS `networkRequest`;
CREATE TABLE IF NOT EXISTS `networkRequest` (
  `networkReqID` int(10) NOT NULL AUTO_INCREMENT,
  `networkName` text,
  `requestingUser` int(10) DEFAULT NULL,
  PRIMARY KEY (`networkReqID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `networkRequest`
--

INSERT INTO `networkRequest` (`networkReqID`, `networkName`, `requestingUser`) VALUES
(1, 'College of Staten Island', 0),
(2, 'College of Staten Island', 0),
(3, 'CCNY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

DROP TABLE IF EXISTS `networks`;
CREATE TABLE IF NOT EXISTS `networks` (
  `networkID` int(10) NOT NULL AUTO_INCREMENT,
  `networkName` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`networkID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pendingRequests`
--

DROP TABLE IF EXISTS `pendingRequests`;
CREATE TABLE IF NOT EXISTS `pendingRequests` (
  `pendingID` int(10) NOT NULL AUTO_INCREMENT,
  `requestingUserID` int(10) NOT NULL,
  `requestedUser` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`pendingID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `pictureComments`
--

DROP TABLE IF EXISTS `pictureComments`;
CREATE TABLE IF NOT EXISTS `pictureComments` (
  `pictureCommentID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `pictureID` int(10) NOT NULL,
  `postingUserID` int(10) NOT NULL,
  `post` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`pictureCommentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `pictureID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `name` text,
  `thumbnailName` text NOT NULL,
  `profilePicture` tinyint(1) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`pictureID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pictureID`, `userID`, `name`, `thumbnailName`, `profilePicture`, `date`) VALUES
(4, 1, 'Users/user1/1_0.jpg', 'Users/user1/thumbnails1/1_0.jpg', 0, '2012-03-14 19:39:04'),
(6, 1, 'Users/user1/1_1.jpg', 'Users/user1/thumbnails1/1_1.jpg', 0, '2012-03-14 19:43:27'),
(7, 1, 'Users/user1/1_2.jpg', 'Users/user1/thumbnails1/1_2.jpg', 0, '2012-03-15 12:51:20'),
(8, 1, 'Users/user1/1_3.jpg', 'Users/user1/thumbnails1/1_3.jpg', 1, '2012-03-15 12:51:31'),
(9, 4, 'Users/male.jpg', '', 1, '2012-03-15 14:25:21'),
(10, 5, 'Users/female.jpg', '', 1, '2012-03-15 17:11:08'),
(11, 3, 'Users/user3/3_0.jpg', '', 1, '2012-03-15 17:48:29'),
(12, 6, 'Users/female.jpg', '', 1, '2012-03-19 07:34:02'),
(13, 7, 'Users/female.jpg', '', 1, '2012-03-19 07:54:43'),
(14, 8, 'Users/male.jpg', '', 1, '2012-03-28 18:04:30'),
(17, 1, 'Users/user1/1_4.jpg', '', 0, '2012-03-29 18:42:38'),
(18, 9, 'Users/female.jpg', '', 1, '2012-04-05 16:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `theBoard`
--

DROP TABLE IF EXISTS `theBoard`;
CREATE TABLE IF NOT EXISTS `theBoard` (
  `boardID` int(10) NOT NULL AUTO_INCREMENT,
  `post` text,
  `type` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`boardID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `theBoard`
--

INSERT INTO `theBoard` (`boardID`, `post`, `type`, `sender`, `recipient`, `date`) VALUES
(1, 'Howdy', 'post', '1', '1', '2012-03-14 15:20:48'),
(2, 'Test', 'post', '3', '3', '2012-03-14 18:25:58'),
(3, 'changed their profile picture', 'picture', '1', '1', '2012-03-14 19:39:04'),
(4, 'changed their profile picture', 'picture', '1', '1', '2012-03-14 19:40:44'),
(5, 'changed their profile picture', 'picture', '1', '1', '2012-03-14 19:43:27'),
(6, 'added new photos', 'picture', '1', '1', '2012-03-15 12:51:20'),
(7, 'added new photos', 'picture', '1', '1', '2012-03-15 12:51:31'),
(8, NULL, 'friend', '1', '3', '2012-03-15 15:26:30'),
(9, 'Waddup homie!', 'post', '1', '3', '2012-03-15 18:44:41'),
(11, 'Gahhh!', 'post', '1', '1', '2012-03-19 14:42:32'),
(12, NULL, 'friend', '7', '1', '2012-03-19 19:02:40'),
(15, 'chicka chicka yea boyy', 'post', '1', '3', '2012-03-20 13:29:55'),
(16, 'hells Yeaaa', 'post', '1', '1', '2012-03-20 13:30:02'),
(17, 'pow chica wawa', 'post', '3', '3', '2012-03-20 16:40:15'),
(18, 'meow', 'post', '3', '3', '2012-03-20 17:29:21'),
(19, 'Blah Blah Blah', 'post', '1', '1', '2012-03-20 18:00:42'),
(20, 'Testing stuff', 'post', '1', '1', '2012-03-20 19:24:52'),
(21, 'Please work', 'post', '1', '1', '2012-03-20 19:25:33'),
(22, 'waddup', 'post', '1', '1', '2012-03-21 14:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstName` varchar(255) NOT NULL DEFAULT '',
  `lastName` varchar(255) NOT NULL DEFAULT '',
  `gender` char(1) DEFAULT '',
  `tv` text,
  `music` text,
  `movies` text,
  `books` text,
  `about` text,
  `month` varchar(25) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `firstName`, `lastName`, `gender`, `tv`, `music`, `movies`, `books`, `about`, `month`, `day`, `year`, `date`) VALUES
(1, 'josephskinner08@gmail.com', '04661acd5829c28d4adc202923df0085', 'Joe', 'Skinner', 'm', 'The Office, The Walking Dead, True Blood, Boardwalk Empire, Breaking Bad, The League, It''''s Always Sunny in Philadelphia, South Park, Family Guy', 'Muse, The Strokes, System of a Down, Blind Guardian, Gamma Ray, White Stripes, Dead Weather', 'Any Batman movie and most superhero movies', '1984, Dracula, Count of Monte Cristo, All of the Harry Potter Books', 'Hi I''''m Joe Skinner and I created this site!', 'December', 9, 1988, '2012-03-14 14:24:03'),
(3, 'A.m@csi.edu', '5583d13d6d0f717d94a8a060b6eb4d30', 'Ahmed', 'Mahmoud', 'm', NULL, NULL, NULL, NULL, NULL, 'May', 7, 1992, '2012-03-14 18:25:14'),
(7, 'megancohen.ny@gmail.com', '8ff32489f92f33416694be8fdc2d4c22', 'Megan', 'Cohen', 'f', NULL, NULL, NULL, NULL, NULL, 'May', 18, 1988, '2012-03-19 07:54:43'),
(8, 'kshari7@msn.com', '1da10fc948f027e6246aed2a2559e746', 'Travis', 'Khan', 'm', NULL, NULL, NULL, NULL, NULL, 'October', 11, 1990, '2012-03-28 18:04:30'),
(9, 'astefanese1215@gmail.com', '6209804952225ab3d14348307b5a4a27', 'A', 'S', 'f', NULL, NULL, NULL, NULL, NULL, 'December', 15, 1989, '2012-04-05 16:13:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
