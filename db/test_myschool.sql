-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 11:57 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(8) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(32) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `price`, `teacher_id`, `created_on`) VALUES
(1, 'Potions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis turpis nec neque tempus tincidunt. Sed quis arcu efficitur, ornare sapien ac, sollicitudin nunc. Duis porta, diam a porttitor aliquam, lorem turpis venenatis ante, vitae viverra ante sapien eu augue. \r\n\r\nMon-Fri: 10am-12pm', '100000', 1, '2022-02-08 08:03:44'),
(2, 'Transfiguration', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis turpis nec neque tempus tincidunt. Sed quis arcu efficitur, ornare sapien ac, sollicitudin nunc. Duis porta, diam a porttitor aliquam, lorem turpis venenatis ante, vitae viverra ante sapien eu augue. \r\n\r\nSat-Sun: 10am-12pm', '100000', 2, '2022-02-08 08:05:50'),
(3, 'Defense Against The Dark Arts', 'Quisque sit amet semper nunc. Sed in sodales neque, id mollis leo. Maecenas ut aliquam tortor, eu suscipit neque. Sed ex enim, molestie quis tortor vehicula, sagittis luctus nisi. Ut elit sapien, hendrerit venenatis nibh non, mollis lacinia ipsum. Duis in elementum leo. Morbi vel lacus dolor. Pellentesque ac euismod dolor. Etiam ac odio nec mauris lobortis rutrum eget pretium ipsum. Nullam lacinia vestibulum orci venenatis rhoncus. Praesent aliquet felis nisl, a interdum odio elementum eget. Sed id tincidunt sapien. Sed quis massa felis. Duis accumsan eros eget odio dignissim ornare. Nam eget hendrerit nisl, id blandit lacus. Integer posuere dapibus purus at egestas.\r\n\r\nMon-Fri: 12pm-2pm', '200000', 3, '2022-02-11 05:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `payment` varchar(8) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `register_date`, `payment`, `student_id`, `course_id`, `created_on`) VALUES
(2, '2022-02-08', 'unpaid', 1, 1, '2022-02-08 08:51:26'),
(3, '2022-02-08', 'unpaid', 1, 2, '2022-02-08 08:51:54'),
(4, '2022-02-11', 'unpaid', 3, 3, '2022-02-11 05:23:04'),
(5, '2022-02-11', 'unpaid', 3, 2, '2022-02-11 05:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `url`, `description`, `course_id`, `teacher_id`, `created_on`) VALUES
(1, 'google drive', 'sample code', 1, 1, '2022-02-08 09:17:21'),
(2, 'wikipedia.com', 'to read', 1, 1, '2022-02-08 09:27:21'),
(3, 'https://drive.google.com/file/d/1nvgbtLnNWiGSeQAZYrfy7P_mCEPWi2RF/view?usp=sharing', 'sample code', 3, 3, '2022-02-11 05:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `address`, `password`, `created_on`) VALUES
(1, 'Harry Potter', '33333333', 'Hogwarts', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-08 08:13:21'),
(2, 'Hermione Granger', '44444444', 'Hogwarts', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-08 08:13:47'),
(3, 'Oak Gar', '66666666', 'Yangon', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-11 05:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone`, `address`, `password`, `created_on`) VALUES
(1, 'Severus Snape', '11111111', 'Hogwarts', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-08 07:51:46'),
(2, 'Minerva McGonagall', '22222222', 'Hogwarts', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-08 07:52:31'),
(3, 'Professor Quirinus Quirrell', '55555555', 'Hogwarts', 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-11 05:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
