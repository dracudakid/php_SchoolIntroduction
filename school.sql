-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2016 at 03:12 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`name`, `password`, `role`, `created`) VALUES
('admin', 'admin', 1, '2016-05-07 00:00:00'),
('tandat', 'tandat', 0, '2016-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `image`) VALUES
('cb01', 'Guitar', '', ''),
('cb02', 'Dance', '', ''),
('cb03', 'Karate', '', ''),
('cb04', 'Extreme Sport', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `founding` date DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dean_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `founding`, `image`, `dean_id`) VALUES
('dp01', 'Math', NULL, '1990-09-22', NULL, 'st04'),
('dp02', 'Physics', NULL, '1990-01-10', NULL, NULL),
('dp03', 'CHemistry', NULL, '1990-02-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `creator_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created`, `creator_id`) VALUES
('n01', 'State Bound - One Act Play', 'Come, support and enjoy a public performance of Academy High School''s One Act Play: EPIC PROPORTIONS at the CAC (Address is 3011 N. 3rd St., Temple) on Thursday, April 28th @ 6:30 pm! \r\nTicket prices: adults $5, students $3\r\nAlso...in case you didn''t hear the screams from Brenham on Friday...AHS OAP will be heading to STATE on May 25th.\r\n\r\n#STATEBOUND', NULL, '2016-05-06 00:00:00', NULL),
('n02', 'Summer Meal Program', 'Summer Meal Program\r\nDo you need a little extra help getting food for your family during the summer? Here are three sites that serve summer meals that are close to our community.\r\n\r\nOr call USDA National Hunger Hotline at: 1-866-3-HUNGRY\r\n\r\nSITE NAME: Salvation Army\r\n\r\nADDRESS: 55 Whittlesey Ave. Norwalk, OH 44857\r\n\r\nSTART DATE: 6/6/16\r\n\r\nEND DATE: 8/19/16\r\n\r\nDAYS OF OPERATION: Monday, Tuesday, Wednesday, Thursday, Friday\r\n\r\nLUNCH TIME: 11:00 – 1:00 (closed on holidays)\r\n\r\n\r\nSITE NAME: Willard Depot - Salvation Army\r\n\r\nADDRESS: 561 W Laural St. Willard, OH 44890\r\n\r\nSTART DATE: 5/31/16\r\n\r\nEND DATE: 8/19/16\r\n\r\nDAYS OF OPERATION: Monday, Tuesday, Wednesday, Thursday, Friday\r\n\r\nBREAKFAST TIME: 10:00 – 12:00\r\n\r\nLUNCH TIME: 1:15 – 2:00\r\n\r\n\r\nSITE NAME: Spray Park - Ashland Salvation Army RJKCCC\r\n\r\nADDRESS: 527 E. Liberty St. Ashland, OH 44805\r\n\r\nSTART DATE: 6/13/16\r\n\r\nEND DATE: 8/26/16\r\n\r\nDAYS OF OPERATION: Monday, Tuesday, Wednesday, Thursday, Friday\r\n\r\nLUNCH TIME: 11:00– 12:00\r\n\r\nP.M. SNACK TIME: 2:15 – 2:45', NULL, '2016-05-06 00:00:00', 'tandat'),
('n03', 'Cycling official John McDonnell honoured for services to the sport', 'John McDonnell (Deputy Principal at Cambridge High School) has held nearly every role imaginable at Cycling New Zealand.\r\nA former councillor, board member, international delegate, president and vice president, technical advisor and more, McDonnell has been made an Officer of the New Zealand Order of Merit for services to cycling.\r\nMcDonnell''s involvement in cycling began in the late 1960s as a young rider, and in the early ''90s he took his first role behind the scenes at Cycling New Zealand.\r\nMcDonnell is an accomplished Commissaire of more than 20 years, having been to competitions such as the World Championships, Olympic Games and Commonwealth Games. He has officiated at more than 100 international UCI events.\r\nAlthough McDonnell is often in the background when New Zealand''s top cyclists are seen at the big events, he also holds that job at a local level, helping officiate at youth events every week in his home of Cambridge.\r\nHis dedication to sport has earned a place on the New Year''s Honours list.\r\n"I certainly didn''t see this coming," McDonnell said. "It was actually Gordon Sharrock, a former New Zealand selector and president, he told me I had to make a decision on what I would do after riding.\r\n"He was a man with a lot of wisdom. He said you need to decide what to do, be it coaching or whatever. That''s when I decided I wanted to be a Commissaire, to help give back to the sport, really."\r\nSince 1990, when McDonnell became qualified to officiate international events, he has been to more than 100 meets around the globe, including the 2004 Athens Olympics and the recent 2014 Commonwealth Games in Glasgow.\r\nHe says the work at the Avantidrome in Cambridge, where he helps youth riders two or three nights per week, is what he feels especially privileged to do, however.\r\nMcDonnell said his family would get a shock when they find out about the honour, and thanked his wife in particular for "putting up with all the time I spend" working in cycling.\r\nArticle : Ben Strang\r\nPhoto: Jeremy Smith, Fairfax NZ\r\n', NULL, '2016-05-06 00:00:00', 'tandat');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `dob`, `email`, `degree`, `image`, `position`, `department_id`) VALUES
('st01', 'John Flanagan', '1994-09-07', 'john@flanagan.com', 'Doctor', NULL, 'Principal', NULL),
('st02', 'Steven Gerrard', '1980-09-22', 'steven@gerrard.com', 'Doctor', NULL, 'Vice Principal', NULL),
('st03', 'Jurgen Kloop', '1989-10-27', 'jurgen@kloop.com', 'Doctor', NULL, 'Vice Principal', NULL),
('st04', 'Emre Can', '1990-10-02', 'emre20can@liverpool.com', 'Master', NULL, 'Teacher', NULL),
('st05', 'Philipe Coutinho', '1992-01-10', 'philipe@coutinho.com', 'Master', NULL, 'Teacher', NULL),
('st06', 'Emma Watson', '1993-02-01', 'emma@watson.com', 'Master', NULL, 'Teacher', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dean_id` (`dean_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`dean_id`) REFERENCES `staffs` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `accounts` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
