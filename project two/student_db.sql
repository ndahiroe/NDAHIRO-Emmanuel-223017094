-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2026 at 09:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `class_x_board` varchar(100) DEFAULT NULL,
  `class_x_percentage` decimal(5,2) DEFAULT NULL,
  `class_x_year` varchar(10) DEFAULT NULL,
  `class_xii_board` varchar(100) DEFAULT NULL,
  `class_xii_percentage` decimal(5,2) DEFAULT NULL,
  `class_xii_year` varchar(10) DEFAULT NULL,
  `graduation_board` varchar(100) DEFAULT NULL,
  `graduation_percentage` decimal(5,2) DEFAULT NULL,
  `graduation_year` varchar(10) DEFAULT NULL,
  `masters_board` varchar(100) DEFAULT NULL,
  `masters_percentage` decimal(5,2) DEFAULT NULL,
  `masters_year` varchar(10) DEFAULT NULL,
  `course_applied` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `dob`, `email`, `mobile`, `gender`, `address`, `city`, `pin_code`, `state`, `country`, `hobbies`, `class_x_board`, `class_x_percentage`, `class_x_year`, `class_xii_board`, `class_xii_percentage`, `class_xii_year`, `graduation_board`, `graduation_percentage`, `graduation_year`, `masters_board`, `masters_percentage`, `masters_year`, `course_applied`, `created_at`) VALUES
(1, 'NDAHIRO', 'Emmanuel', '1995-05-04', 'ndahiroemmanuel100@gmail.com', '0787549324', 'Male', 'Kigali', 'kigali', '123', 'kigali', 'Rwanda', 'Singing', 'hghjg', 65.00, '2005', '', 0.00, '', '', 0.00, '', '', 0.00, '', 'B.Com', '2026-04-20 19:04:40'),
(2, 'NDAHIRO', 'Emmanuel', '0000-00-00', 'ndahiroemmanuel100@gmail.com', '0787549324', '', 'Kigali', 'kigali', 'jhhj', 'kigali', 'Rwanda', '', '', 0.00, '', '', 0.00, '', '', 0.00, '', '', 0.00, '', 'BCA', '2026-04-20 19:17:29'),
(3, 'NDAHIRO', 'Emmanuel', '0000-00-00', 'ndahiroemmanuel100@gmail.com', '0787549324', '', 'Kigali', 'kigali', '', '', 'Rwanda', '', '', 0.00, '', '', 0.00, '', '', 0.00, '', '', 0.00, '', 'BCA', '2026-04-20 19:21:04'),
(4, 'NDAHIRO', 'Emmanuel', '0000-00-00', 'ndahiroemmanuel100@gmail.com', '0787549324', '', 'Kigali', 'kigali', '', '', 'Rwanda', '', '', 0.00, '', '', 0.00, '', '', 0.00, '', '', 0.00, '', 'BCA', '2026-04-20 19:22:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
