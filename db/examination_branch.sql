-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination_branch`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `hallticket` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL,
  `certificate_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`hallticket`, `name`, `status`, `certificate_number`) VALUES
('215670959L', 'vishwas', '2', ''),
('20567T0945', 'Rahul Puppala', '3', ''),
('1234', 'rab', '2', ''),
('205655215', 'ravin', '4', ''),
('215670958L', 'Sushma', '4', 'ert24567'),
('215670966L', 'anusha', '2', ''),
('20567T913', '', '--Select Status--', ''),
('20567T0913', '', '2', ''),
('215', 'hrlo', '3', ''),
('2123', 'ramu', '4', ''),
('2123', 'ramu', '4', ''),
('21234', 'ramuu', '4', 'Ocz12345'),
('215670955L', 'Revanth Reddy Abbati', '4', 'O215654'),
('215670958L', 'Sushma', '4', 'O123456');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `course_type` text NOT NULL,
  `course` text NOT NULL,
  `hallticket` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `month` text NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`course_type`, `course`, `hallticket`, `name`, `month`, `year`) VALUES
('Professional', 'b.Ed', '1234', 'rab', 'July', 2024),
('Professional', 'b.TECH', '12345', 'ram', 'May', 2024),
('Professional', 'b.TECH', '205655215', 'ravin', 'June', 2024),
('Under Graduation', 'b.Li.Sc', '2056708T58', 'random', 'April', 2020),
('Professional', 'b.TECH', '20567T0913', 'ajay', 'April', 2024),
('Professional', 'b.TECH', '20567T0945', 'Rahul Puppala', 'June', 2024),
('Professional', 'b.TECH', '2123', 'ramu', 'June', 2024),
('Professional', 'b.TECH', '21234', 'ramuu', 'June', 2024),
('Post Graduation', 'm.COM', '215', 'hrlo', 'May', 2024),
('Professional', 'b.TECH', '2156709', 'ramesh', 'June', 2024),
('Professional', 'b.TECH', '215670955L', 'Revanth Reddy Abbati', 'April', 2024),
('Professional', 'b.TECH', '215670958L', 'Sushma', 'May', 2024),
('Post Graduation', 'm.Sc', '215670959L', 'vishwas', 'September', 2024),
('Post Graduation', 'm.Sc', '25645123S42', 'Ram', 'May', 2024);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`hallticket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
