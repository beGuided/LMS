-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 07:31 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(14) NOT NULL,
  `user_role` varchar(25) NOT NULL DEFAULT 'admin',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `user_role`, `image`) VALUES
(1, 'Mona', 'adejoh', 'adejoh382@gmail.com', '1234', 'admin', 'Akoma family.jpg'),
(4, 'wisdom', 'oriero', 'wisdon@email.com', '1234', 'admin', 'EMMA LOGO.jpg'),
(6, 'john`', 'matt', '123', '1234', 'admin', '0i=.png');

-- --------------------------------------------------------

--
-- Table structure for table `assesment`
--

CREATE TABLE `assesment` (
  `id` int(9) NOT NULL,
  `author` varchar(14) NOT NULL,
  `title` varchar(25) NOT NULL,
  `deadline` varchar(25) NOT NULL,
  `asse_class_id` varchar(9) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assesment`
--

INSERT INTO `assesment` (`id`, `author`, `title`, `deadline`, `asse_class_id`, `file`) VALUES
(1, '1', 'mid week assessment', '15-02-2023', 'JSS2', 'note fro software engineering.txt'),
(2, '1', 'weekend assessment', 'to be submited 02-02-2023', 'JSS2', 'note fro software engineering.txt'),
(3, '3', '1st test', '', 'JSS1', 'proposal (student Affair).docx'),
(4, '5', 'second test', 'to be submited 05-05-2023', 'JSS1', 'projection_test_question.docx'),
(5, '4', '@nd test', '', 'JSS2', 'note fro software engineering.txt'),
(6, '1', 'Project work', '', 'JSS1', 'Joshua adejoh cv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(9) NOT NULL,
  `class_teacher_id` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(9) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_role` varchar(9) NOT NULL DEFAULT 'guidian',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `first_name`, `last_name`, `email`, `password`, `user_role`, `image`) VALUES
(2, 'James', 'Martins', '123@email.com', '123', 'guidian', '0'),
(4, 'john', 'doe', 'doe@email.com', '1234', 'guidian', 'canva-photo-editor.png');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(9) NOT NULL,
  `filename` varchar(25) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `std_class_id` varchar(9) NOT NULL,
  `teacher_id` int(9) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `filename`, `student_id`, `std_class_id`, `teacher_id`, `file`) VALUES
(1, 'first term reult', '1', 'JSS1', 1, 'cover letter f.docx'),
(2, 'first term reult', '2', 'JSS3', 1, 'ADEJOH JACOB CV.pdf'),
(3, 'Second Term Result', '3', 'JSS1', 1, 'projection_test_question.docx'),
(4, '3 term exam result', '2', 'JSS2', 1, 'Joshua adejoh cv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(9) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` int(14) NOT NULL,
  `std_class_id` varchar(9) NOT NULL,
  `std_parent_id` int(9) NOT NULL,
  `user_role` varchar(9) NOT NULL DEFAULT 'student',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `email`, `password`, `std_class_id`, `std_parent_id`, `user_role`, `image`) VALUES
(2, 'joy', 'Mitana', 'adejoh382@gmail.com', 123, 'JSS2', 2, 'student', ''),
(3, 'lock', 'john', 'adejoh382@email.com', 123, 'JSS2', 2, 'student', ''),
(4, 'jonas', 'philip', 'jonas@email.com', 123, 'JSS1 ', 4, 'student', ''),
(5, 'mark', 'stone', 'mark@email.com', 123, 'JSS1  ', 2, 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(9) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user_role` varchar(9) NOT NULL DEFAULT 'teacher',
  `class_id` varchar(9) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `email`, `password`, `user_role`, `class_id`, `image`) VALUES
(1, 'Mary', 'Loveth', '123@email.com', '1234', 'teacher', 'JSS1', ''),
(2, 'joan', 'Akan', 'Akan@email.com', '123', 'teacher', 'JSS2', ''),
(3, 'Felix', 'Uzor', 'Uzor@email.com', '123', 'teacher', 'JSS1', ''),
(4, 'Felix', 'Uzor', 'Uzor@email.com', '123', 'teacher', 'JSS1', ''),
(5, 'john', 'mary', '123@example.com', '123', 'teacher', 'JSS2', '1.png'),
(6, 'john', 'mary', 'adejoh382@gmail.com', '123', 'teacher', 'JSS3', 'mrs matesun.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assesment`
--
ALTER TABLE `assesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assesment`
--
ALTER TABLE `assesment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
