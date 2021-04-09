-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 07:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `adminroles`
--

CREATE TABLE `adminroles` (
  `id` int(11) NOT NULL,
  `title` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminroles`
--

INSERT INTO `adminroles` (`id`, `title`) VALUES
(1, 'super admin'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `phone` char(150) NOT NULL,
  `image` char(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `phone`, `image`, `role`, `created_at`) VALUES
(8, 'malekkk', 'dofecekus@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'vulehovyby', '01001323340', '1617811799a3.jpg', 1, '2021-04-07 16:09:59'),
(11, 'sxdcfvgbh', 'aszdxfcgvbjnkm', 'zdxfcgvbjnkm', 'dwzesxdrcfvgbhn', '4147402571', '', 5, '2021-04-27 00:06:54'),
(14, 'ciduh', 'zacawet@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'vatarefu', '01001323340', '1617847930a3.jpg', 5, '2021-04-08 02:11:46'),
(16, 'amira', 'superadmin@gmail.com', '29c3eea3f305d6b823f562ac4be35217', 'Dara Simpson', '01001323340', '1617963511a3.jpg', 1, '2021-04-09 10:18:31'),
(17, 'salma', 'admin@gmail.com', '29c3eea3f305d6b823f562ac4be35217', 'vyheda', '01001323340', '1617963559a1.jpg', 5, '2021-04-09 10:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(2, 'web design'),
(3, 'php'),
(7, 'node js');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` char(150) NOT NULL,
  `password` char(150) NOT NULL,
  `address` char(150) NOT NULL,
  `phone` char(20) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `name`, `email`, `password`, `address`, `phone`, `image`, `dep_id`) VALUES
(7, 'jack', 'jack@hotmail.com', '02514932', 'alex', '02541369874', '', 2),
(8, 'dfcghj', 'xdcfvgbhnj', 'zzxdcfvgbhnj', 'zxdcfvgbhnj', 'zxecrvtbynu', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `prof_stu`
--

CREATE TABLE `prof_stu` (
  `id` int(11) NOT NULL,
  `stu_is` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prof_stu`
--

INSERT INTO `prof_stu` (`id`, `stu_is`, `prof_id`) VALUES
(2, 44, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` char(100) CHARACTER SET utf8 NOT NULL,
  `last_name` char(100) CHARACTER SET utf8 NOT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `nationality` char(50) CHARACTER SET utf8 NOT NULL,
  `mobile` char(50) CHARACTER SET utf8 NOT NULL,
  `email` char(150) CHARACTER SET utf8 NOT NULL,
  `secondary_school` char(50) CHARACTER SET utf8 NOT NULL,
  `grade_per` int(11) NOT NULL,
  `start_year` int(11) NOT NULL,
  `grade_year` int(11) NOT NULL,
  `gender` enum('0','1','','') CHARACTER SET utf8 NOT NULL,
  `user_name` char(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `date_of_birth`, `nationality`, `mobile`, `email`, `secondary_school`, `grade_per`, `start_year`, `grade_year`, `gender`, `user_name`, `password`, `image`, `comment`, `dep_id`) VALUES
(42, 'amira', 'roshdy', '1998-05-03', 'Veritatis', '01001323345', 'zoguf@mailinator.com', 'Labore do quia volup', 2015, 251, 2018, '', 'Etsdfghjkdfg', '1228bd847fa009ed118f2799bcfb5301', '1617888499a2.jpg', 'Molestiae necessitat', 3),
(43, 'Clinton Thomas', 'Drew Adkins', '2012-09-24', 'Beatae', '01001323340', 'noraw@mailinator.com', 'Culpa explicabo Si', 2007, 222, 202, '', 'Quisas', '83e7be4598ec983e309b7311676755ef', '1617906276a3.jpg', 'Ut ex ut repudiandae', 7),
(44, 'Ariana Mathis', 'Gabriel Espinoza', '1987-11-25', 'Cumque', '01236478952', 'ravelema@mailinator.com', 'Vero aut voluptate', 95, 25, 62, '', 'Dolore dolore ipsa', '787289c5012ed1529f8bf340af884188', '1617910943a1.jpg', 'Quam fugit eos sun', 2),
(46, 'z cvbnm,', 'zxcvbnm', '2021-04-14', 'eygption', '', 'zxcvbnm,', 'elsanweya school', 90, 2015, 2020, '', 'amira2020', 'dsfggjk', '', 'zxcvbnn', 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_sub`
--

CREATE TABLE `student_sub` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_sub`
--

INSERT INTO `student_sub` (`id`, `user_id`, `sub_id`) VALUES
(4, 42, 5),
(5, 44, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_name` char(50) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_name`, `dep_id`) VALUES
(4, 'css', 2),
(5, 'html', 2),
(6, 'laravel', 3),
(9, 'oop', 3),
(10, 'cfvgbhnjm', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminroles`
--
ALTER TABLE `adminroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `prof_stu`
--
ALTER TABLE `prof_stu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stu_is` (`stu_is`),
  ADD KEY `prof_id` (`prof_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `student_sub`
--
ALTER TABLE `student_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminroles`
--
ALTER TABLE `adminroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prof_stu`
--
ALTER TABLE `prof_stu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student_sub`
--
ALTER TABLE `student_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`role`) REFERENCES `adminroles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_ibfk_2` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof_stu`
--
ALTER TABLE `prof_stu`
  ADD CONSTRAINT `prof_stu_ibfk_1` FOREIGN KEY (`stu_is`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prof_stu_ibfk_2` FOREIGN KEY (`prof_id`) REFERENCES `professors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_sub`
--
ALTER TABLE `student_sub`
  ADD CONSTRAINT `student_sub_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_sub_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
