-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 03:38 PM
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
-- Database: `jobfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--
-- Creation: Dec 28, 2020 at 07:19 AM
-- Last update: Dec 29, 2020 at 01:15 PM
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(500) NOT NULL,
  `job_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `application`:
--   `company_id`
--       `user` -> `id`
--

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `company_id`, `job_title`, `job_description`) VALUES
(1, 8, 'job1', 'des1'),
(3, 8, 'job3', 'des3');

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--
-- Creation: Dec 29, 2020 at 01:07 PM
-- Last update: Dec 29, 2020 at 01:59 PM
--

CREATE TABLE `applied` (
  `application_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `applied`:
--   `application_id`
--       `application` -> `id`
--   `student_id`
--       `user` -> `id`
--

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`application_id`, `student_id`, `status`) VALUES
(1, 9, 'applied'),
(1, 10, 'selected'),
(1, 11, 'selected'),
(3, 10, 'selected');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--
-- Creation: Dec 28, 2020 at 07:07 AM
-- Last update: Dec 29, 2020 at 12:00 PM
--

CREATE TABLE `company_details` (
  `user_id_c` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `company_details`:
--   `user_id_c`
--       `user` -> `id`
--

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`user_id_c`, `address`, `details`) VALUES
(8, 'new', 'new ');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--
-- Creation: Dec 28, 2020 at 07:04 AM
-- Last update: Dec 29, 2020 at 11:43 AM
--

CREATE TABLE `student_details` (
  `user_id_s` int(11) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `education` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_details`:
--   `user_id_s`
--       `user` -> `id`
--

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`user_id_s`, `bio`, `education`, `contact`) VALUES
(9, 'as2sd', 'asdds', 'sadsda'),
(10, '                                                                        this is my bio   edited                                                         ', '                                                                        2nd puc     edited                                                       ', '               lol working                                                         hi@gmail.com                                                            ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Dec 28, 2020 at 07:12 AM
-- Last update: Dec 29, 2020 at 01:23 PM
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(8, 'company1', 'company1@gmail.com', '123', 'company'),
(9, 'student1', 'student1@gmail.com', '123', 'student'),
(10, 'student2', 'student2@gmail.com', '123', 'student'),
(11, 'student3', 'student3@gmail.com', '123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD UNIQUE KEY `application_id` (`application_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`user_id_c`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`user_id_s`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `applied_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`),
  ADD CONSTRAINT `applied_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `company_details`
--
ALTER TABLE `company_details`
  ADD CONSTRAINT `company_details_ibfk_1` FOREIGN KEY (`user_id_c`) REFERENCES `user` (`id`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`user_id_s`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
