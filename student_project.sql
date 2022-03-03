-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 04:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `password`, `name`, `usertype`) VALUES
('vikram123', 'jnu123', 'Vikram Sir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `teacher_id` int(100) NOT NULL,
  `dateofsub` varchar(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `teacher_id`, `dateofsub`, `description`, `file`) VALUES
(10, 'IMPS', 1, '2022-03-06', 'Create a project ....', 'Post Assignment'),
(11, 'IMPS', 1, '2022-03-06', 'Create a project ....', ''),
(12, 'LOL', 1, '2022-03-05', 'Oops Project', 'resume.docx'),
(13, 'LOL', 1, '2022-03-05', 'wdfwefwefqgrerghrthrthe', 'Doc1.docx'),
(14, 'LOL', 1, '2022-03-05', 'wdfwefwefqgrerghrthrthe', 'Doc1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `result_data`
--

CREATE TABLE `result_data` (
  `id` int(11) NOT NULL,
  `result_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_data`
--

INSERT INTO `result_data` (`id`, `result_id`, `subject_id`, `marks`) VALUES
(6, 2, 1, '50'),
(7, 2, 2, '60'),
(8, 2, 3, '70'),
(9, 2, 4, '90'),
(10, 2, 5, '100'),
(11, 3, 1, '10'),
(12, 3, 2, '30'),
(13, 3, 3, '40'),
(14, 3, 4, '50'),
(15, 3, 5, '60'),
(16, 4, 1, '50'),
(17, 4, 2, '60'),
(18, 4, 3, '70'),
(19, 4, 4, '80'),
(20, 4, 5, '90');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `project` varchar(50) NOT NULL,
  `leader` varchar(50) NOT NULL,
  `mem1` varchar(50) NOT NULL,
  `mem2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `project`, `leader`, `mem1`, `mem2`) VALUES
(1, 'Masterdebaters', 'Project Management System', 'Sagar Sharma', 'Vaibhav Latta', 'Sarvesh Kumar'),
(2, 'BTS Army', 'Bhaang Bhosda Management System', 'Yogita Sharma', 'Anshika Khandelwal', 'Palak Tiwari');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `team_id`, `name`, `email`, `password`, `usertype`, `created_at`) VALUES
(1, 0, 'Teacher 1', 'teacher1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2019-11-04 00:00:00'),
(2, 0, 'Student 1', 'student1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, '2019-11-04 00:00:00'),
(4, 0, 'Student 2', 'student2@gmail.com', '213ee683360d88249109c2f92789dbc3', 2, '2019-11-04 08:15:45'),
(5, 0, 'Student 3', 'student3@gmail.com', '8e4947690532bc44a8e41e9fb365b76a', 2, '2019-11-04 08:16:09'),
(6, 3, 'Kartik', 'kartik@gmail.com', 'jnu123', 2, '2022-03-01 16:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `usertypes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `usertypes`) VALUES
(1, 'Teacher'),
(2, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_data`
--
ALTER TABLE `result_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `result_data`
--
ALTER TABLE `result_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
