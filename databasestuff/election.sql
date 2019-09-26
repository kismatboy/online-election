-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 03:54 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidateid` int(11) NOT NULL,
  `candidatename` varchar(50) NOT NULL,
  `candidateemail` varchar(50) NOT NULL,
  `candidatephn` varchar(50) NOT NULL,
  `candidateadd` varchar(70) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(60) NOT NULL,
  `election_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidateid`, `candidatename`, `candidateemail`, `candidatephn`, `candidateadd`, `description`, `image`, `election_name`) VALUES
(1, ' kabbu', ' kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', '0'),
(2, ' kabbu', ' kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', 'Pradesh'),
(3, ' kabbu', ' kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', 'Pradesh'),
(4, ' kabbu', ' kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', 'Pradesh2'),
(5, ' kabbu', ' kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', 'Pradesh2'),
(6, ' kabbu', 'kabbu@gmail.com', ' 989989899', ' hello ', ' hello there  ', '1.PNG', 'Pradesh2'),
(7, ' sunil', 'sunil@gmail.com', ' 998989', ' hemja ', ' hello there ', '2.png', 'Pradesh2'),
(8, ' prachee', 'prachipoudel888@gmail.com', ' 9806666919', '  hemja', '  hello terer', '65258074_2618838438149715_1239451167042306048_o.jpg', 'college1');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `electionid` int(11) NOT NULL,
  `electiontitle` varchar(50) NOT NULL,
  `status` varchar(65) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`electionid`, `electiontitle`, `status`, `startdate`, `enddate`) VALUES
(1, 'pradesh', 'end', '2019-08-13', '0000-00-00'),
(2, 'college', 'end', '2019-08-07', '2019-08-22'),
(3, 'college1', 'end', '2019-08-07', '2019-08-19'),
(4, 'Chief Minister', 'end', '2019-08-14', '2019-08-19'),
(5, 'Pradesh2', 'end', '2019-08-19', '2019-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `voterid` int(11) NOT NULL,
  `candidateid` int(11) NOT NULL,
  `electionid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `election_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`time`, `voterid`, `candidateid`, `electionid`, `count`, `election_name`) VALUES
('2019-08-21 13:00:50', 1, 1, 1, 0, 'pradesh'),
('2019-08-21 13:46:48', 1, 2, 1, 0, 'pradesh'),
('2019-09-21 13:53:26', 1, 7, 5, 0, 'Pradesh2'),
('2019-09-21 13:53:50', 1, 4, 5, 0, 'Pradesh2'),
('2019-09-21 13:59:20', 1, 3, 1, 0, 'pradesh'),
('2019-09-21 14:00:33', 1, 6, 5, 0, 'Pradesh2'),
('2019-09-21 14:12:59', 2, 3, 1, 0, 'pradesh'),
('2019-09-21 14:13:33', 2, 6, 5, 0, 'Pradesh2'),
('2019-09-21 14:14:07', 2, 8, 3, 0, 'college1');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `voterid` int(11) NOT NULL,
  `votername` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permanentadd` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `citizenshipno` varchar(70) NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `image` varchar(60) NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`voterid`, `votername`, `password`, `permanentadd`, `phone`, `citizenshipno`, `dob`, `gender`, `image`, `election_id`) VALUES
(1, 'sunil sapkota', '12345', 'lampata', '123456', '23223', '1997-08-14', 0, '', 0),
(2, 'Sita', 'sita1', 'Chorepatan', '516413', '11111', '1987-08-14', 0, '', 0),
(4, 'Shyam', 'shyam1', 'Chauthe', '65431654', '5565165646', '2000-08-05', 0, '', 0),
(5, 'mayu', 'mayu1', 'Chorepatan', '1546465613', '154215', '1998-08-09', 0, '', 0),
(6, 'prachi', 'prachi', 'Chorepatan', '165132', '165132', '1998-08-09', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidateid`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`electionid`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voterid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `electionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `voterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
