-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2021 at 11:36 AM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes_list`
--

CREATE TABLE `classes_list` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `block` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes_list`
--

INSERT INTO `classes_list` (`id`, `course`, `year`, `block`, `date`) VALUES
(2, 'BSCS', '1st', '1', '2021-03-05 12:52:17'),
(4, 'BSCS', '2nd', '1', '2021-03-05 18:49:53'),
(5, 'BSCS', '3rd', '1', '2021-03-05 20:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `criteria_id`, `criteria`, `date`) VALUES
(1, 1, 'Mastery of the subject matter', '2021-03-11 11:02:19'),
(2, 2, 'Teaching skills and class management', '2021-03-11 11:03:13'),
(3, 3, 'Personal traits and professional qualities', '2021-03-11 11:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `teacher` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `qid`, `rating`, `teacher`) VALUES
(1, 0, 4, 'Joshua'),
(2, 0, 1, ''),
(3, 0, 4, 'Joshua'),
(4, 0, 0, ''),
(5, 0, 0, ''),
(6, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `new_student`
--

CREATE TABLE `new_student` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `block` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `images` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_student`
--

INSERT INTO `new_student` (`id`, `school_id`, `firstname`, `lastname`, `course`, `year`, `block`, `email`, `password`, `images`, `date`) VALUES
(1, 222222, 'Josh', 'Oooo', 'BSCS', '1st', '1', 'joshua@gmail.com', 'josh1', 'images (1).jpeg', '2021-03-03 22:19:15'),
(2, 222222, 'Josh', 'Josh', 'BSCS', '2nd', '2', 'admin@gmail.com', 'joshua', '2684.jpg', '2021-03-03 22:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `id` int(50) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `criteria_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`id`, `questions`, `criteria_id`) VALUES
(4, 'Show interest and enthusiasm in teaching the subject matter.       ', 1),
(5, 'Explains the subject matter clearly. ', 1),
(6, 'Cites up-to-date/current information on the subject matter. ', 1),
(7, 'Show evidence of breadth and depth of knowledge of the subject matter. ', 1),
(8, 'Emphasize important points of the lesson. ', 1),
(9, 'Relates the lesson to real life situation. ', 1),
(13, 'Talks authoritatively on the subject matter ', 1),
(14, 'Answers students questions with clarity and thoroughness. ', 1),
(15, 'Comes to class prepared and seldom read his/her lectures and notes', 1),
(16, 'Gives explanation in addition to what is found in the book.', 1),
(17, 'Provides students with a course syllabus and explains the objective of the course/orients students on the grading system and requirements of the course/subject', 2),
(18, 'Motivates students to arouse thier interest in subject matter and relates present lesson to the past lessons', 2),
(19, 'Utilizes instructional aids/device for example and illustration of the subject matter', 2),
(20, 'Encourages students to react, discuss, seek clarification and ask questions', 2),
(21, 'Summarizes the lesson at the end of then class', 2),
(22, 'Implements effectiveness teaching methods and appropriate learning activities and assigns challenging learning task and encourage the use of library and other resources', 2),
(23, 'Spends time judiciously discussing relevant relevant subject matter', 2),
(24, 'Uses sufficient bases (quizzes, recitations, test, laboratory exercises, etc.) In computing grades', 2),
(25, 'Maintains classroom discipline and discourages cheating in class', 2),
(26, 'Returns corrected test papers to students', 2),
(27, 'Dresses appropriately and neatly', 3),
(28, 'Accommodates students questions with confidence in his/her statement', 3),
(29, 'Allows difference in viewpoints/opinions of students', 3),
(30, 'Makes him/herself available to students for assistance and counseling', 3),
(31, 'Keeps proper balance of humor to maintain students interest and attention', 3),
(32, 'Comes to class regularly and on-time', 3),
(33, 'Deals with students fairly and does not use his/her position to take advantage of the students', 3),
(34, 'Respects the privacy of students', 3),
(35, 'Possesses a well-modulated voice', 3),
(36, 'Never harasses students ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_list`
--

CREATE TABLE `teacher_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `images` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_list`
--

INSERT INTO `teacher_list` (`id`, `school_id`, `firstname`, `lastname`, `email`, `password`, `images`, `date`) VALUES
(1, 222222, 'Josh', 'Oooo12', 'joshua@gmail.com', '1234', 'images (2).jpeg', '2021-03-03 22:41:05'),
(2, 222222, 'Josh', 'Hehehehhe', 'admin@admin', '12345', '', '2021-03-03 22:41:58'),
(7, 222222, 'Josh', 'Jahajhahahah', 'admin@admin.com', '123456', '', '2021-03-05 17:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `images` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `school_id`, `firstname`, `lastname`, `email`, `password`, `images`, `date`) VALUES
(1, 2222225, 'Joshua', 'Viernes', 'joshua@gmail.com', '1234', 'images.png', '2021-03-05 09:56:38'),
(2, 222222, 'Josh', 'Jahajhahahah', 'admin@admin', '123456', '', '2021-03-05 17:06:41'),
(3, 1234, 'Qeerdd', 'As scccc', 'afd@adx', '123', '', '2021-03-07 21:03:18'),
(4, 1234, 'Qeerdd', 'As scccc', 'afd@adx', '1234', '2684.jpg', '2021-03-07 21:18:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes_list`
--
ALTER TABLE `classes_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_student`
--
ALTER TABLE `new_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions` (`questions`);

--
-- Indexes for table `teacher_list`
--
ALTER TABLE `teacher_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes_list`
--
ALTER TABLE `classes_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `new_student`
--
ALTER TABLE `new_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teacher_list`
--
ALTER TABLE `teacher_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
