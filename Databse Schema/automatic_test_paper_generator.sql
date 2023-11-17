-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 01:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automatic_test_paper_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `stream_id`, `departments_id`, `degree_id`, `class_name`) VALUES
(1, 2, 1, 1, 'First Year (FY)'),
(2, 2, 1, 1, 'Second Year (SY)'),
(3, 2, 1, 1, 'Third Year (TY)');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `stream_id`, `departments_id`, `degree_name`) VALUES
(1, 2, 1, 'Bachelor of Science in Information and Technology (BScIT)'),
(2, 2, 1, 'Master of Science in Information & Technology (MScIT)');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `stream_id`, `dept_name`) VALUES
(1, 2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `fill_in_the_blank_based_question`
--

CREATE TABLE `fill_in_the_blank_based_question` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `five_marks_question`
--

CREATE TABLE `five_marks_question` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `four_marks_question`
--

CREATE TABLE `four_marks_question` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_based_question`
--

CREATE TABLE `mcq_based_question` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `mcq_question` text NOT NULL,
  `answer_A` varchar(255) NOT NULL,
  `answer_B` varchar(255) NOT NULL,
  `answer_C` varchar(255) NOT NULL,
  `answer_D` varchar(255) NOT NULL,
  `correct_answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `one_marks_question`
--

CREATE TABLE `one_marks_question` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_formate`
--

CREATE TABLE `question_paper_formate` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `paper_name` varchar(100) DEFAULT NULL,
  `time` varchar(50) NOT NULL,
  `maximum_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_paper_formate`
--

INSERT INTO `question_paper_formate` (`id`, `stream_id`, `departments_id`, `degree_id`, `class_id`, `semester_id`, `subject_id`, `institute_name`, `course_code`, `paper_name`, `time`, `maximum_marks`) VALUES
(1, 2, 1, 1, 1, 1, 1, 'SIES CE', 'BSCIT-01', 'Communication Skills', '2 Hours', 60),
(2, 2, 1, 1, 1, 1, 2, 'SIES CE', 'BSCIT-02', 'Digital Electronics', '2 Hours', 60),
(3, 2, 1, 1, 1, 1, 3, 'SIES CE', 'BSCIT-03', 'Discrete Mathematics', '2 Hours', 60),
(4, 2, 1, 1, 1, 1, 4, 'SIES CE', 'BSCIT-04', 'Imperative Programming', '2 Hours', 60),
(5, 2, 1, 1, 1, 1, 5, 'SIES CE', 'BSCIT-05', 'Operating System', '2 Hours', 60),
(6, 2, 1, 1, 1, 2, 6, 'SIES CE', 'BSCIT-06', 'Green Computing', '2 Hours', 60),
(7, 2, 1, 1, 1, 2, 7, 'SIES CE', 'BSCIT-07', 'Microprocessor Architecture', '2 Hours', 60),
(8, 2, 1, 1, 1, 2, 8, 'SIES CE', 'BSCIT-08', 'Numerical and Statistical Methods', '2 Hours', 60),
(9, 2, 1, 1, 1, 2, 9, 'SIES CE', 'BSCIT-09', 'Object Oriented Programming', '2 Hours', 60),
(10, 2, 1, 1, 1, 2, 10, 'SIES CE', 'BSCIT-10', 'Web Programming', '2 Hours', 60),
(11, 2, 1, 1, 2, 3, 11, 'SIES CE', 'BSCIT-11', 'Computer Networks', '2 Hours', 60),
(12, 2, 1, 1, 2, 3, 12, 'SIES CE', 'BSCIT-12', 'Computer Oriented Statistical Techniques', '2 Hours', 60),
(13, 2, 1, 1, 2, 3, 13, 'SIES CE', 'BSCIT-13', 'Data Structures', '2 Hours', 60),
(14, 2, 1, 1, 2, 3, 14, 'SIES CE', 'BSCIT-14', 'Database Management Systems', '2 Hours', 60),
(15, 2, 1, 1, 2, 3, 15, 'SIES CE', 'BSCIT-15', 'Python Programming', '2 Hours', 60),
(16, 2, 1, 1, 2, 4, 16, 'SIES CE', 'BSCIT-16', 'Applied Mathematics', '2 Hours', 60),
(17, 2, 1, 1, 2, 4, 17, 'SIES CE', 'BSCIT-17', 'Computer Graphics and Animation', '2 Hours', 60),
(18, 2, 1, 1, 2, 4, 18, 'SIES CE', 'BSCIT-18', 'Core Java', '2 Hours', 60),
(19, 2, 1, 1, 2, 4, 19, 'SIES CE', 'BSCIT-19', 'Embedded System', '2 Hours', 60),
(20, 2, 1, 1, 2, 4, 20, 'SIES CE', 'BSCIT-20', 'Software Engineering', '2 Hours', 60),
(21, 2, 1, 1, 3, 5, 21, 'SIES CE', 'BSCIT-21', 'Advance Web Programming', '2 Hours', 60),
(22, 2, 1, 1, 3, 5, 22, 'SIES CE', 'BSCIT-22', 'Internet of Things', '2 Hours', 60),
(23, 2, 1, 1, 3, 5, 23, 'SIES CE', 'BSCIT-23', 'Linux System Administration', '2 Hours', 60),
(24, 2, 1, 1, 3, 5, 24, 'SIES CE', 'BSCIT-24', 'Next Generation Technologies', '2 Hours', 60),
(25, 2, 1, 1, 3, 5, 25, 'SIES CE', 'BSCIT-25', 'Software Project Management', '2 Hours', 60),
(26, 2, 1, 1, 3, 6, 26, 'SIES CE', 'BSCIT-26', 'Business Intelligence', '2 Hours', 60),
(27, 2, 1, 1, 3, 6, 27, 'SIES CE', 'BSCIT-27', 'IT Service Management', '2 Hours', 60),
(28, 2, 1, 1, 3, 6, 28, 'SIES CE', 'BSCIT-28', 'Security in Computing', '2 Hours', 60),
(29, 2, 1, 1, 3, 6, 29, 'SIES CE', 'BSCIT-29', 'Software Quality Assurance', '2 Hours', 60),
(30, 2, 1, 1, 3, 6, 30, 'SIES CE', 'BSCIT-30', 'Final Year Project', '2 Hours', 60);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `stream_id`, `departments_id`, `degree_id`, `class_id`, `semester_name`) VALUES
(1, 2, 1, 1, 1, 'Semester 1'),
(2, 2, 1, 1, 1, 'Semester 2'),
(3, 2, 1, 1, 2, 'Semester 3'),
(4, 2, 1, 1, 2, 'Semester 4'),
(5, 2, 1, 1, 3, 'Semester 5'),
(6, 2, 1, 1, 3, 'Semester 6');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `stream_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `stream_name`) VALUES
(1, 'Arts'),
(2, 'Science'),
(3, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `stream_id`, `departments_id`, `degree_id`, `class_id`, `semester_id`, `subject_name`) VALUES
(1, 2, 1, 1, 1, 1, 'Communication Skills'),
(2, 2, 1, 1, 1, 1, 'Digital electronics'),
(3, 2, 1, 1, 1, 1, 'Discrete Mathematics'),
(4, 2, 1, 1, 1, 1, 'Imperative Programming'),
(5, 2, 1, 1, 1, 1, 'Operating System'),
(6, 2, 1, 1, 1, 2, 'Green Computing'),
(7, 2, 1, 1, 1, 2, 'Microprocessor Architecture'),
(8, 2, 1, 1, 1, 2, 'Numerical and Statistical Methods'),
(9, 2, 1, 1, 1, 2, 'Object Oriented Programming'),
(10, 2, 1, 1, 1, 2, 'Web Programming'),
(11, 2, 1, 1, 2, 3, 'Computer Networks'),
(12, 2, 1, 1, 2, 3, 'Computer Oriented Statistical Techniques'),
(13, 2, 1, 1, 2, 3, 'Data Structures'),
(14, 2, 1, 1, 2, 3, 'Database Management Systems'),
(15, 2, 1, 1, 2, 3, 'Python Programming'),
(16, 2, 1, 2, 2, 4, 'Applied Mathematics'),
(17, 2, 1, 1, 2, 4, 'Computer Graphics and Animation'),
(18, 2, 1, 1, 2, 4, 'Core Java'),
(19, 2, 1, 1, 2, 4, 'Embedded System'),
(20, 2, 1, 1, 2, 4, 'Software Engineering'),
(21, 2, 1, 1, 3, 5, 'Advance Web Programming'),
(22, 2, 1, 1, 3, 5, 'Internet of Things'),
(23, 2, 1, 1, 3, 5, 'Linux System Administration'),
(24, 2, 1, 1, 3, 5, 'Next Generation Technologies'),
(25, 2, 1, 1, 3, 5, 'Software Project Management'),
(26, 2, 1, 1, 3, 6, 'Business Intelligence'),
(27, 2, 1, 1, 3, 6, 'IT Service Management'),
(28, 2, 1, 1, 3, 6, 'Security in Computing'),
(29, 2, 1, 1, 3, 6, 'Software Quality Assurance'),
(30, 2, 1, 1, 3, 6, 'Final Year Project');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `stream_id`, `departments_id`, `degree_id`, `class_id`, `semester_id`, `subject_id`, `unit_name`) VALUES
(1, 2, 1, 1, 1, 1, 1, 'Unit 1'),
(2, 2, 1, 1, 1, 1, 1, 'Unit 2'),
(3, 2, 1, 1, 1, 1, 1, 'Unit 3'),
(4, 2, 1, 1, 1, 1, 1, 'Unit 4'),
(5, 2, 1, 1, 1, 1, 1, 'Unit 5'),
(6, 2, 1, 1, 1, 1, 2, 'Unit 1'),
(7, 2, 1, 1, 1, 1, 2, 'Unit 2'),
(8, 2, 1, 1, 1, 1, 2, 'Unit 3'),
(9, 2, 1, 1, 1, 1, 2, 'Unit 4'),
(10, 2, 1, 1, 1, 1, 2, 'Unit 5'),
(11, 2, 1, 1, 1, 1, 3, 'Unit 1'),
(12, 2, 1, 1, 1, 1, 3, 'Unit 2'),
(13, 2, 1, 1, 1, 1, 3, 'Unit 3'),
(14, 2, 1, 1, 1, 1, 3, 'Unit 4'),
(15, 2, 1, 1, 1, 1, 3, 'Unit 5'),
(16, 2, 1, 1, 1, 1, 4, 'Unit 1'),
(17, 2, 1, 1, 1, 1, 4, 'Unit 2'),
(18, 2, 1, 1, 1, 1, 4, 'Unit 3'),
(19, 2, 1, 1, 1, 1, 4, 'Unit 4'),
(20, 2, 1, 1, 1, 1, 4, 'Unit 5'),
(21, 2, 1, 1, 1, 1, 5, 'Unit 1'),
(22, 2, 1, 1, 1, 1, 5, 'Unit 2'),
(23, 2, 1, 1, 1, 1, 5, 'Unit 3'),
(24, 2, 1, 1, 1, 1, 5, 'Unit 4'),
(25, 2, 1, 1, 1, 1, 5, 'Unit 5'),
(26, 2, 1, 1, 1, 2, 6, 'Unit 1'),
(27, 2, 1, 1, 1, 2, 6, 'Unit 2'),
(28, 2, 1, 1, 1, 2, 6, 'Unit 3'),
(29, 2, 1, 1, 1, 2, 6, 'Unit 4'),
(30, 2, 1, 1, 1, 2, 6, 'Unit 5'),
(31, 2, 1, 1, 1, 2, 7, 'Unit 1'),
(32, 2, 1, 1, 1, 2, 7, 'Unit 2'),
(33, 2, 1, 1, 1, 2, 7, 'Unit 3'),
(34, 2, 1, 1, 1, 2, 7, 'Unit 4'),
(35, 2, 1, 1, 1, 2, 7, 'Unit 5'),
(36, 2, 1, 1, 1, 2, 8, 'Unit 1'),
(37, 2, 1, 1, 1, 2, 8, 'Unit 2'),
(38, 2, 1, 1, 1, 2, 8, 'Unit 3'),
(39, 2, 1, 1, 1, 2, 8, 'Unit 4'),
(40, 2, 1, 1, 1, 2, 8, 'Unit 5'),
(41, 2, 1, 1, 1, 2, 9, 'Unit 1'),
(42, 2, 1, 1, 1, 2, 9, 'Unit 2'),
(43, 2, 1, 1, 1, 2, 9, 'Unit 3'),
(44, 2, 1, 1, 1, 2, 9, 'Unit 4'),
(45, 2, 1, 1, 1, 2, 9, 'Unit 5'),
(46, 2, 1, 1, 1, 2, 10, 'Unit 1'),
(47, 2, 1, 1, 1, 2, 10, 'Unit 2'),
(48, 2, 1, 1, 1, 2, 10, 'Unit 3'),
(49, 2, 1, 1, 1, 2, 10, 'Unit 4'),
(50, 2, 1, 1, 1, 2, 10, 'Unit 5'),
(51, 2, 1, 1, 2, 3, 11, 'Unit 1'),
(52, 2, 1, 1, 2, 3, 11, 'Unit 2'),
(53, 2, 1, 1, 2, 3, 11, 'Unit 3'),
(54, 2, 1, 1, 2, 3, 11, 'Unit 4'),
(55, 2, 1, 1, 2, 3, 11, 'Unit 5'),
(56, 2, 1, 1, 2, 3, 12, 'Unit 1'),
(57, 2, 1, 1, 2, 3, 12, 'Unit 2'),
(58, 2, 1, 1, 2, 3, 12, 'Unit 3'),
(59, 2, 1, 1, 2, 3, 12, 'Unit 4'),
(60, 2, 1, 1, 2, 3, 12, 'Unit 5'),
(61, 2, 1, 1, 2, 3, 13, 'Unit 1'),
(62, 2, 1, 1, 2, 3, 13, 'Unit 2'),
(63, 2, 1, 1, 2, 3, 13, 'Unit 3'),
(64, 2, 1, 1, 2, 3, 13, 'Unit 4'),
(65, 2, 1, 1, 2, 3, 13, 'Unit 5'),
(66, 2, 1, 1, 2, 3, 14, 'Unit 1'),
(67, 2, 1, 1, 2, 3, 14, 'Unit 2'),
(68, 2, 1, 1, 2, 3, 14, 'Unit 3'),
(69, 2, 1, 1, 2, 3, 14, 'Unit 4'),
(70, 2, 1, 1, 2, 3, 14, 'Unit 5'),
(71, 2, 1, 1, 2, 3, 15, 'Unit 1'),
(72, 2, 1, 1, 2, 3, 15, 'Unit 2'),
(73, 2, 1, 1, 2, 3, 15, 'Unit 3'),
(74, 2, 1, 1, 2, 3, 15, 'Unit 4'),
(75, 2, 1, 1, 2, 3, 15, 'Unit 5'),
(76, 2, 1, 1, 2, 4, 16, 'Unit 1'),
(77, 2, 1, 1, 2, 4, 16, 'Unit 2'),
(78, 2, 1, 1, 2, 4, 16, 'Unit 3'),
(79, 2, 1, 1, 2, 4, 16, 'Unit 4'),
(80, 2, 1, 1, 2, 4, 16, 'Unit 5'),
(81, 2, 1, 1, 2, 4, 17, 'Unit 1'),
(82, 2, 1, 1, 2, 4, 17, 'Unit 2'),
(83, 2, 1, 1, 2, 4, 17, 'Unit 3'),
(84, 2, 1, 1, 2, 4, 17, 'Unit 4'),
(85, 2, 1, 1, 2, 4, 17, 'Unit 5'),
(86, 2, 1, 1, 2, 4, 18, 'Unit 1'),
(87, 2, 1, 1, 2, 4, 18, 'Unit 2'),
(88, 2, 1, 1, 2, 4, 18, 'Unit 3'),
(89, 2, 1, 1, 2, 4, 18, 'Unit 4'),
(90, 2, 1, 1, 2, 4, 18, 'Unit 5'),
(91, 2, 1, 1, 2, 4, 19, 'Unit 1'),
(92, 2, 1, 1, 2, 4, 19, 'Unit 2'),
(93, 2, 1, 1, 2, 4, 19, 'Unit 3'),
(94, 2, 1, 1, 2, 4, 19, 'Unit 4'),
(95, 2, 1, 1, 2, 4, 19, 'Unit 5'),
(96, 2, 1, 1, 2, 4, 20, 'Unit 1'),
(97, 2, 1, 1, 2, 4, 20, 'Unit 2'),
(98, 2, 1, 1, 2, 4, 20, 'Unit 3'),
(99, 2, 1, 1, 2, 4, 20, 'Unit 4'),
(100, 2, 1, 1, 2, 4, 20, 'Unit 5'),
(101, 2, 1, 1, 3, 5, 21, 'Unit 1'),
(102, 2, 1, 1, 3, 5, 21, 'Unit 2'),
(103, 2, 1, 1, 3, 5, 21, 'Unit 3'),
(104, 2, 1, 1, 3, 5, 21, 'Unit 4'),
(105, 2, 1, 1, 3, 5, 21, 'Unit 5'),
(106, 2, 1, 1, 3, 5, 22, 'Unit 1'),
(107, 2, 1, 1, 3, 5, 22, 'Unit 2'),
(108, 2, 1, 1, 3, 5, 22, 'Unit 3'),
(109, 2, 1, 1, 3, 5, 22, 'Unit 4'),
(110, 2, 1, 1, 3, 5, 22, 'Unit 5'),
(111, 2, 1, 1, 3, 5, 23, 'Unit 1'),
(112, 2, 1, 1, 3, 5, 23, 'Unit 2'),
(113, 2, 1, 1, 3, 5, 23, 'Unit 3'),
(114, 2, 1, 1, 3, 5, 23, 'Unit 4'),
(115, 2, 1, 1, 3, 5, 23, 'Unit 5'),
(116, 2, 1, 1, 3, 5, 24, 'Unit 1'),
(117, 2, 1, 1, 3, 5, 24, 'Unit 2'),
(118, 2, 1, 1, 3, 5, 24, 'Unit 3'),
(119, 2, 1, 1, 3, 5, 24, 'Unit 4'),
(120, 2, 1, 1, 3, 5, 24, 'Unit 5'),
(121, 2, 1, 1, 3, 5, 25, 'Unit 1'),
(122, 2, 1, 1, 3, 5, 25, 'Unit 2'),
(123, 2, 1, 1, 3, 5, 25, 'Unit 3'),
(124, 2, 1, 1, 3, 5, 25, 'Unit 4'),
(125, 2, 1, 1, 3, 5, 25, 'Unit 5'),
(126, 2, 1, 1, 3, 6, 26, 'Unit 1'),
(127, 2, 1, 1, 3, 6, 26, 'Unit 2'),
(128, 2, 1, 1, 3, 6, 26, 'Unit 3'),
(129, 2, 1, 1, 3, 6, 26, 'Unit 4'),
(130, 2, 1, 1, 3, 6, 26, 'Unit 5'),
(131, 2, 1, 1, 3, 6, 27, 'Unit 1'),
(132, 2, 1, 1, 3, 6, 27, 'Unit 2'),
(133, 2, 1, 1, 3, 6, 27, 'Unit 3'),
(134, 2, 1, 1, 3, 6, 27, 'Unit 4'),
(135, 2, 1, 1, 3, 6, 27, 'Unit 5'),
(136, 2, 1, 1, 3, 6, 28, 'Unit 1'),
(137, 2, 1, 1, 3, 6, 28, 'Unit 2'),
(138, 2, 1, 1, 3, 6, 28, 'Unit 3'),
(139, 2, 1, 1, 3, 6, 28, 'Unit 4'),
(140, 2, 1, 1, 3, 6, 28, 'Unit 5'),
(141, 2, 1, 1, 3, 6, 29, 'Unit 1'),
(142, 2, 1, 1, 3, 6, 29, 'Unit 2'),
(143, 2, 1, 1, 3, 6, 29, 'Unit 3'),
(144, 2, 1, 1, 3, 6, 29, 'Unit 4'),
(145, 2, 1, 1, 3, 6, 29, 'Unit 5'),
(146, 2, 1, 1, 3, 6, 30, 'Unit 1'),
(147, 2, 1, 1, 3, 6, 30, 'Unit 2'),
(148, 2, 1, 1, 3, 6, 30, 'Unit 3'),
(149, 2, 1, 1, 3, 6, 30, 'Unit 4'),
(150, 2, 1, 1, 3, 6, 30, 'Unit 5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'hod', 'hod'),
(3, 'teacher', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `fill_in_the_blank_based_question`
--
ALTER TABLE `fill_in_the_blank_based_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `five_marks_question`
--
ALTER TABLE `five_marks_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `four_marks_question`
--
ALTER TABLE `four_marks_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `mcq_based_question`
--
ALTER TABLE `mcq_based_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `one_marks_question`
--
ALTER TABLE `one_marks_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `question_paper_formate`
--
ALTER TABLE `question_paper_formate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fill_in_the_blank_based_question`
--
ALTER TABLE `fill_in_the_blank_based_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `five_marks_question`
--
ALTER TABLE `five_marks_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `four_marks_question`
--
ALTER TABLE `four_marks_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_based_question`
--
ALTER TABLE `mcq_based_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `one_marks_question`
--
ALTER TABLE `one_marks_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_paper_formate`
--
ALTER TABLE `question_paper_formate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`);

--
-- Constraints for table `degree`
--
ALTER TABLE `degree`
  ADD CONSTRAINT `degree_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `degree_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`);

--
-- Constraints for table `fill_in_the_blank_based_question`
--
ALTER TABLE `fill_in_the_blank_based_question`
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_5` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_6` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `fill_in_the_blank_based_question_ibfk_7` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `five_marks_question`
--
ALTER TABLE `five_marks_question`
  ADD CONSTRAINT `five_marks_question_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `five_marks_question_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `five_marks_question_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `five_marks_question_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `five_marks_question_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `five_marks_question_ibfk_6` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `four_marks_question`
--
ALTER TABLE `four_marks_question`
  ADD CONSTRAINT `four_marks_question_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `four_marks_question_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `four_marks_question_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `four_marks_question_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `four_marks_question_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `four_marks_question_ibfk_6` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `mcq_based_question`
--
ALTER TABLE `mcq_based_question`
  ADD CONSTRAINT `mcq_based_question_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `mcq_based_question_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `mcq_based_question_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `mcq_based_question_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `mcq_based_question_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `mcq_based_question_ibfk_6` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `one_marks_question`
--
ALTER TABLE `one_marks_question`
  ADD CONSTRAINT `one_marks_question_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `one_marks_question_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `one_marks_question_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `one_marks_question_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `one_marks_question_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `one_marks_question_ibfk_6` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `question_paper_formate`
--
ALTER TABLE `question_paper_formate`
  ADD CONSTRAINT `question_paper_formate_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `question_paper_formate_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `question_paper_formate_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `question_paper_formate_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `question_paper_formate_ibfk_5` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `question_paper_formate_ibfk_6` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `semester_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `semester_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `subjects_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `subjects_ibfk_5` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`),
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `units_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `units_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `units_ibfk_5` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `units_ibfk_6` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
