-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 06:06 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cm_mapping`
--

CREATE TABLE `cm_mapping` (
  `map_tid` varchar(10) NOT NULL,
  `map_sname` varchar(15) NOT NULL,
  `map_clsname` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_mapping`
--

INSERT INTO `cm_mapping` (`map_tid`, `map_sname`, `map_clsname`) VALUES
('5', 'English', 8),
('3', 'Science', 0),
('2', 'Math', 0),
('1', 'Hindi', 6),
('2', 'Math', 7),
('2', 'Marathi', 10),
('2', 'Marathi', 1),
('1', 'Social Studies', 7),
('5', 'Science', 12),
('5', 'English', 8),
('3', 'Social Studies', 9);

-- --------------------------------------------------------

--
-- Table structure for table `cm_student_details`
--

CREATE TABLE `cm_student_details` (
  `student_roll_no` varchar(20) NOT NULL,
  `student_name` varchar(256) NOT NULL,
  `student_gender` char(10) NOT NULL COMMENT 'M= MALE, F=FEMALE, O=OTHERS',
  `student_class` int(15) NOT NULL COMMENT 'class must be 1-12std',
  `student_phone_no` bigint(20) NOT NULL,
  `student_mailid` text NOT NULL COMMENT 'require user@abc.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_student_details`
--

INSERT INTO `cm_student_details` (`student_roll_no`, `student_name`, `student_gender`, `student_class`, `student_phone_no`, `student_mailid`) VALUES
('', '', '', 0, 654754151, ''),
('102', 'Gauri Tayade', 'Female', 12, 2147483647, 'gauri@gmail.com'),
('104', 'Manoj Bhosale', 'Male', 7, 2147483647, 'many@gmail.com'),
('105', 'Rukhmini Salve', 'Female', 7, 2147483647, 'ruku@gmail.com'),
('131649', 'Anu Kohad', 'Female', 7, 2147483647, 'anu@gmail.com'),
('200145', 'Nikhil Mitkari', 'Male', 10, 1234567890, 'nikhil@gmail.com'),
('201245', 'Akansha Khushwah', 'Female', 9, 2147483647, 'akansha@gmail.com'),
('201703064', 'Kunal Mandekar', 'Male', 7, 2147483647, 'kunal@gmail.com'),
('201703154', 'Pragati rekhate', 'Female', 12, 2147483647, 'sachi@gmail.com'),
('201703157', 'Nitesh Narkhede ', 'Male', 1, 89812225, 'ncs@gmail.com'),
('201703191', 'Anjum Mujawar', 'Female', 12, 123458, 'jam@ac.in'),
('204', 'Abhshant Admane', 'Male', 8, 2147483647, 'abhi@gmail.com'),
('46254', 'Sujith Subramaniyan', 'Male', 8, 2147483647, 'sujith@gmail.com'),
('502', 'Mayuri Malviya ', 'Female', 10, 2147483647, 'mayuri@gmail.com'),
('6455897', 'Vishnavi Kadam', 'Male', 10, 65789458, 'vaish@gmail.com'),
('6587', 'Vaishnavi Gadhwe', 'Male', 6, 2147483647, 'minu@gmail.com'),
('95478', 'Ankit Honrao', 'Male', 7, 546978, 'ankit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cm_subject`
--

CREATE TABLE `cm_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_subject`
--

INSERT INTO `cm_subject` (`sub_id`, `sub_name`) VALUES
(1, 'English'),
(2, 'Hindi'),
(3, 'Marathi'),
(4, 'Math'),
(5, 'Science'),
(6, 'Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `cm_teacher_details`
--

CREATE TABLE `cm_teacher_details` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_qualification` text NOT NULL,
  `t_experience` int(50) NOT NULL COMMENT 'experience is in years',
  `t_phone_no` bigint(12) NOT NULL,
  `t_mail_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_teacher_details`
--

INSERT INTO `cm_teacher_details` (`t_id`, `t_name`, `t_gender`, `t_qualification`, `t_experience`, `t_phone_no`, `t_mail_id`) VALUES
(1, 'Gajanan Mate', 'Male', 'B. Ed', 8, 2147483647, 'gajju@gmail.com'),
(2, 'Mahendra Dhanaskar ', 'Male', 'MA', 15, 548797548, 'dhanno@gmail.com'),
(3, 'Pratiksha Wrhade', 'Female', 'B.Com', 6, 2147483647, 'patiksha@gmail.com'),
(5, 'Snehal Gaikwad', 'Female', 'PhD, Mtech, Btech', 18, 2147483647, 'snehal@gmail.com'),
(7, 'Mahesh Kendre', 'Male', 'Btech', 8, 8087898470, 'mahesh@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cm_student_details`
--
ALTER TABLE `cm_student_details`
  ADD PRIMARY KEY (`student_roll_no`) USING BTREE,
  ADD UNIQUE KEY `student_roll_no` (`student_roll_no`);

--
-- Indexes for table `cm_subject`
--
ALTER TABLE `cm_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `cm_teacher_details`
--
ALTER TABLE `cm_teacher_details`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cm_subject`
--
ALTER TABLE `cm_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cm_teacher_details`
--
ALTER TABLE `cm_teacher_details`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
