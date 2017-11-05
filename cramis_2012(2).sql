-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 17, 2012 at 08:48 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cramis_2012`
-- 
CREATE DATABASE `cramis_2012` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cramis_2012`;

-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL auto_increment,
  `tid` text NOT NULL,
  `datein` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `comment`
-- 

INSERT INTO `comment` (`cid`, `tid`, `datein`, `author`, `body`) VALUES 
(1, '1', '2012-03-17', 'admin', 'good paint job.'),
(2, '1', '2012-03-17', 'admin', 'interesting...'),
(3, '2', '2012-03-17', 'admin', 'its more than a number'),
(4, '2', '2012-03-17', 'bis/20003/82/df', 'dont care'),
(5, '1', '2012-03-17', 'bis/20003/82/df', 'they are woow..'),
(6, '1', '2012-03-17', 'bis/20003/82/df', 'would say..i love it..');

-- --------------------------------------------------------

-- 
-- Table structure for table `complain`
-- 

CREATE TABLE `complain` (
  `cid` int(11) NOT NULL auto_increment,
  `regno` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `datein` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `cunit` varchar(50) NOT NULL,
  `lecturer` varchar(50) NOT NULL,
  `year` varchar(2) NOT NULL,
  `sem` varchar(2) NOT NULL,
  `xmonth` varchar(5) NOT NULL,
  `xyear` varchar(5) NOT NULL,
  `room` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `markscat` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `complain`
-- 

INSERT INTO `complain` (`cid`, `regno`, `category`, `datein`, `course`, `cunit`, `lecturer`, `year`, `sem`, `xmonth`, `xyear`, `room`, `details`, `markscat`, `user`) VALUES 
(1, 'bis/20003/82/df', 'result complaint', '2012-03-17', 'BIS', 'IT3203', 'james41', '3', '2', 'may', '2009', '', '', 'coursework and exam', 'bis/20003/82/df'),
(2, 'bis/20003/82/df', 'lecturer complaint', '2012-03-17', 'BIS', 'CI2202', 'jane23', '2', '2', '', '', 'nb 456', 'hhj hjh hhgt ggtf hytr ttrd ffddg gfdd', '', 'bis/20003/82/df');

-- --------------------------------------------------------

-- 
-- Table structure for table `lecturer`
-- 

CREATE TABLE `lecturer` (
  `lectid` int(11) NOT NULL auto_increment,
  `names` varchar(50) NOT NULL,
  `experience` text NOT NULL,
  `education` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `word1` text NOT NULL,
  `picture` text NOT NULL,
  `datein` date NOT NULL,
  `lastedit` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY  (`lectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `lecturer`
-- 

INSERT INTO `lecturer` (`lectid`, `names`, `experience`, `education`, `tel`, `email`, `username`, `password`, `word1`, `picture`, `datein`, `lastedit`, `gender`) VALUES 
(1, 'james byaruhanga', '12', 'phd, masters', '0789545432', 'jamesbya@yahoo.com', 'james41', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVxg2diZlSWJVbxcFZwAXWW5Gau1Eba9UZHFDVNdUOHR1VGtmYGZVMTpmQTZ1aaVUW6JkSiZlWU90VxY1YxoEdWZEcXJmROdlWGp1ViJjUzZ1akNnVsFUP', '', 'uploads/default.gif', '2012-03-15', '2012-03-15', 'male'),
(2, 'janes mkabwa', '3', 'masters,degree', '0983423232', 'janes34@yahoo.com', 'jane23', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVxg2diZlSWJVbxcFZwAXWW5Gau1Eba9UZHFDVNdUOHR1VGtmYGZVMTpmQTZ1aaVUW6JkSiZlWU90VxY1YxoEdWZEcXJmROdlWGp1ViJjUzZ1akNnVsFUP', '', 'uploads/default.gif', '2012-03-15', '2012-03-15', 'femal');

-- --------------------------------------------------------

-- 
-- Table structure for table `poll`
-- 

CREATE TABLE `poll` (
  `pid` int(11) NOT NULL auto_increment,
  `topic` text NOT NULL,
  `choice1` varchar(50) NOT NULL,
  `choice2` varchar(50) NOT NULL,
  `choice3` varchar(50) NOT NULL,
  `choice4` varchar(50) NOT NULL,
  `datein` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `poll`
-- 

INSERT INTO `poll` (`pid`, `topic`, `choice1`, `choice2`, `choice3`, `choice4`, `datein`, `author`, `category`) VALUES 
(1, 'he/she is clean and neat?', 'agree', 'disagree', '', '', '2012-03-15', 'admin', 'lecturer polls'),
(2, 'how good is your lecturer in teaching?', 'fair', 'good', 'quite good', 'very good', '2012-03-15', 'admin', 'lecturer polls'),
(3, 'he/she is a time keeper?', 'yes', 'no', 'not even close', 'terrible', '2012-03-16', 'admin', 'lecturer polls');

-- --------------------------------------------------------

-- 
-- Table structure for table `response`
-- 

CREATE TABLE `response` (
  `rid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL,
  `datein` date NOT NULL,
  `body` text NOT NULL,
  `author` varchar(50) NOT NULL,
  PRIMARY KEY  (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `response`
-- 

INSERT INTO `response` (`rid`, `cid`, `datein`, `body`, `author`) VALUES 
(1, 2, '2012-03-17', 'we will meet next week', 'jane23');

-- --------------------------------------------------------

-- 
-- Table structure for table `topic`
-- 

CREATE TABLE `topic` (
  `tid` int(11) NOT NULL auto_increment,
  `datein` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `approved` varchar(5) NOT NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `topic`
-- 

INSERT INTO `topic` (`tid`, `datein`, `author`, `body`, `approved`) VALUES 
(1, '2012-03-17', 'admin', 'whats your take on the latest decorations on the KIU buildings?', 'yes'),
(2, '2012-03-17', 'admin', 'is age a number?', 'yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `names` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `course` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `doe` varchar(50) NOT NULL,
  `moe` varchar(50) NOT NULL,
  `duration` varchar(5) NOT NULL,
  `picture` text NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `word1` text NOT NULL,
  `word2` text NOT NULL,
  `datein` date NOT NULL,
  `lastedit` date NOT NULL,
  `cat` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`id`, `names`, `gender`, `regno`, `password`, `course`, `dob`, `doe`, `moe`, `duration`, `picture`, `faculty`, `tel`, `email`, `word1`, `word2`, `datein`, `lastedit`, `cat`) VALUES 
(1, 'josiah ngige', 'male', 'bis/20003/82/df', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVxg2diZlSWJVbxcFZwAXWW5Gau1Eba9UZHFDVNdUOHR1VGtmYGZVMTpmQTZ1aaVUW6JkSiZlWU90VxY1YxoEdWZEcXJmROdlWGp1ViJjUzZ1akNnVsFUP', 'BIS', '14 Jan 1990', '23 Mar 2009', 'access program', '', 'uploads/34-2.jpg', 'computer school', '0715447407', 'josina08@gmail.com', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVyA3UhFjSUdVb45UVwAXdW5mTrZFMx80VtRHWNZEbzZVbGtWTWZ1RPVFZsd1aaVlV6J1SiVUMTNGROZFZFplNWZFcvZFbFJjWGp1VhJjU1dVVkNnVsFUP', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVyAXYhFDZoZVb4xmUxoUdWxGZT1UbG9kWHh3UiBDczlVV0tWTWZ1RPVFZsd1aaVlVzgmSWtWMzclbwZFZFplNWZFcvZFbFJzVthXaUJjU1dVVkNnVsFUP', '2012-03-11', '2012-03-15', 'regular'),
(2, 'josiah ngige', 'male', 'admin', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVxg2diZlSWJVbxcFZwAXWW5Gau1Eba9UZHFDVNdUOHR1VGtmYGZVMTpmQTZ1aaVUW6JkSiZlWU90VxY1YxoEdWZEcXJmROdlWGp1ViJjUzZ1akNnVsFUP', '', '', '', '', '', 'uploads/34.jpg', '', '', 'josiahngige@yahoo.com', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVyA3UhFjSUdVb45UVwAXdW5mTrZFMx80VtRHWNZEbzZVbGtWTWZ1RPVFZsd1aaVlV6J1SiVUMTNGROZFZFplNWZFcvZFbFJjWGp1VhJjU1dVVkNnVsFUP', 'VZlWzV1aoFmYHpkdjZkVaV2R5ckVyAXYhFDZoZVb4xmUxoUdWxGZT1UbG9kWHh3UiBDczlVV0tWTWZ1RPVFZsd1aaVlVzgmSWtWMzclbwZFZFplNWZFcvZFbFJzVthXaUJjU1dVVkNnVsFUP', '2012-03-15', '2012-03-15', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `vote`
-- 

CREATE TABLE `vote` (
  `vid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `lectid` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `vote` varchar(50) NOT NULL,
  `datein` date NOT NULL,
  `sem` varchar(50) NOT NULL,
  `yr` varchar(50) NOT NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `vote`
-- 

INSERT INTO `vote` (`vid`, `pid`, `lectid`, `userid`, `vote`, `datein`, `sem`, `yr`) VALUES 
(1, 1, '1', 'bis/20003/82/df', 'disagree', '2012-03-15', '', ''),
(2, 2, '1', 'bis/20003/82/df', 'very good', '2012-03-15', '', ''),
(3, 2, '2', 'bis/20003/82/df', 'quite good', '2012-03-15', '', ''),
(4, 1, '2', 'bis/20003/82/df', 'agree', '2012-03-15', '', ''),
(5, 1, '1', 'bis/20003/82/df', 'agree', '2012-03-15', '', ''),
(6, 1, '1', 'bis/20003/82/df', 'agree', '2012-03-15', '', ''),
(7, 1, '1', 'bis/20003/82/df', 'disagree', '2012-03-15', '', ''),
(8, 1, '1', 'bis/20003/82/df', 'disagree', '2012-03-15', '', ''),
(9, 2, '1', 'bis/20003/82/df', 'good', '2012-03-15', '', ''),
(10, 2, '1', 'bis/20003/82/df', 'fair', '2012-03-15', '', ''),
(11, 2, '1', 'bis/20003/82/df', 'fair', '2012-03-15', '', ''),
(12, 2, '1', 'bis/20003/82/df', 'quite good', '2012-03-15', '', ''),
(13, 2, '1', 'bis/20003/82/df', 'quite good', '2012-03-15', '', ''),
(14, 2, '2', 'bis/20003/82/df', 'very good', '2012-03-15', '', ''),
(15, 2, '2', 'bis/20003/82/df', 'very good', '2012-03-15', '', ''),
(16, 1, '2', 'bis/20003/82/df', 'disagree', '2012-03-15', '', ''),
(17, 1, '2', 'bis/20003/82/df', 'disagree', '2012-03-15', '', ''),
(18, 1, '2', 'bis/20003/82/df', 'disagree', '2012-03-16', '', ''),
(19, 1, '2', 'bis/20003/82/df', 'disagree', '2012-03-16', '', ''),
(20, 1, '2', 'bis/20003/82/df', 'agree', '2012-03-16', '', ''),
(21, 1, '2', 'bis/20003/82/df', 'agree', '2012-03-16', '', ''),
(22, 2, '2', 'bis/20003/82/df', 'good', '2012-03-16', '', ''),
(23, 2, '2', 'bis/20003/82/df', 'fair', '2012-03-16', '', ''),
(24, 2, '2', 'bis/20003/82/df', 'quite good', '2012-03-16', '', ''),
(25, 2, '2', 'bis/20003/82/df', 'very good', '2012-03-16', '', ''),
(26, 2, '2', 'bis/20003/82/df', 'very good', '2012-03-16', '', ''),
(27, 2, '2', 'bis/20003/82/df', 'good', '2012-03-16', '', ''),
(28, 2, '2', 'bis/20003/82/df', 'good', '2012-03-16', '', ''),
(29, 2, '2', 'bis/20003/82/df', 'fair', '2012-03-16', '', ''),
(30, 3, '1', 'bis/20003/82/df', 'yes', '2012-03-17', '', '');
