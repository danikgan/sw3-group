-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2017 at 05:08 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpsons`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher_id`) VALUES
(10001, 'Computer Science 142', 1234),
(10002, 'Computer Science 143', 5678),
(10003, 'Computer Science 190M', 9012),
(10004, 'Informatics 100', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`student_id`, `course_id`, `grade`) VALUES
(123, 10001, 'B-'),
(123, 10002, 'C'),
(456, 10001, 'B+'),
(888, 10002, 'A+'),
(888, 10003, 'A+'),
(404, 10004, 'D+'),
(404, 10002, 'B'),
(456, 10002, 'D-');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `snippet` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `text_colour` varchar(7) NOT NULL DEFAULT '#000000',
  `background_colour` varchar(7) NOT NULL DEFAULT '#ffffff',
  `web_url` varchar(50) NOT NULL DEFAULT 'http://www.google.co.uk'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `snippet`, `is_admin`, `img_url`, `text_colour`, `background_colour`, `web_url`) VALUES
(123, 'Bart', 'bart@fox.com', 'bartman', 'I''m bart, I''m 8 years old', 0, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(404, 'Ralph', 'ralph@fox.com', 'catfood', 'I''m ralph, I''m 9 years old', 0, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(456, 'Milhouse', 'milhouse@fox.com', 'fallout', 'I''m milhouse, I''m 11 years old', 0, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(888, 'Lisa', 'lisa@fox.com', 'vegan', 'I''m lisa, I''m 10 years old', 0, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(889, 'artem', 'artem', 'artem', 'Hello My Name is', 0, NULL, '#000000', '#ffffff', 'http://www.google.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `snippet` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT '#000000',
  `text_colour` varchar(7) NOT NULL DEFAULT '#000000',
  `background_colour` varchar(7) NOT NULL DEFAULT '#ffffff',
  `web_url` varchar(50) NOT NULL DEFAULT 'http://www.google.co.uk'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `password`, `snippet`, `is_admin`, `img_url`, `text_colour`, `background_colour`, `web_url`) VALUES
(1234, 'Krabappel', NULL, NULL, 1, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(5678, 'Hoover', NULL, NULL, 1, NULL, '#000000', '#ffffff', 'http://www.google.co.uk'),
(9012, 'Stepp', NULL, NULL, 1, NULL, '#000000', '#ffffff', 'http://www.google.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `fk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=890;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9013;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
