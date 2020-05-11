-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2020 at 10:40 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Isbn` int(3) NOT NULL,
  `Title` varchar(35) DEFAULT NULL,
  `Author` varchar(20) DEFAULT NULL,
  `Price` int(5) DEFAULT NULL,
  `Publisher` varchar(4) DEFAULT NULL,
  `copies` int(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Isbn`, `Title`, `Author`, `Price`, `Publisher`, `copies`, `created_at`, `updated_at`) VALUES
(100, 'Introduction to Algorithms', 'THOMAS H.CORMEN', 300, 'xyz', 10, NULL, NULL),
(101, 'Introduction to Database', 'ALMASRI', 200, 'abc', 20, NULL, NULL),
(102, 'Introduction to Computer Theory', 'DANIEL I.A.COHEN', 200, 'abc', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cafes`
--

CREATE TABLE `cafes` (
  `CafeId` int(1) NOT NULL,
  `Cafename` varchar(20) DEFAULT NULL,
  `Cafelocation` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafes`
--

INSERT INTO `cafes` (`CafeId`, `Cafename`, `Cafelocation`, `created_at`, `updated_at`) VALUES
(1, 'Main Café', 'Near Front Office', NULL, NULL),
(2, 'Food Street', 'Near Library', NULL, NULL),
(3, 'Good Times cafe', 'Near Food Streat', NULL, '2020-05-03 14:29:25'),
(6, 'Symposium2', 'std', '2020-05-10 20:02:32', '2020-05-10 20:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `code` int(2) NOT NULL,
  `coursetitle` varchar(30) DEFAULT NULL,
  `crdhr` int(1) DEFAULT NULL,
  `pid` int(1) DEFAULT NULL,
  `coursetype` varchar(10) DEFAULT NULL,
  `courseprereq` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`code`, `coursetitle`, `crdhr`, `pid`, `coursetype`, `courseprereq`, `created_at`, `updated_at`) VALUES
(1, 'Database', 4, 1, 'Core', 'OOP', NULL, NULL),
(2, 'Analysis of Alogrithms', 3, 1, 'Core', 'OOP', NULL, '2020-05-09 03:08:08'),
(3, 'Digital Logic', 3, 1, 'Core', 'Electronics', NULL, NULL),
(4, 'Programming', 4, 1, 'Core', 'ths', NULL, NULL),
(5, 'Object Oriented', 4, 3, 'Core', 'PF', NULL, NULL),
(6, 'English-1', 3, 3, 'Hum', NULL, NULL, NULL),
(7, 'Islamiyat', 3, 3, 'Hum', NULL, NULL, NULL),
(8, 'Assembly Lang', 4, 1, 'cs-core', 'DLD', NULL, NULL),
(9, 'Operating System', 3, 2, 'core', NULL, NULL, NULL),
(10, 'Software Engineering', 3, 2, 'Core', 'DB', NULL, NULL),
(11, 'Web Engineering', 3, 1, 'Elec', 'WAD', NULL, NULL),
(12, 'Mobile App', 3, 1, 'Elec', 'JAVA', NULL, NULL),
(13, 'Data Network', 3, 2, 'Elec', NULL, NULL, NULL),
(14, 'Artificial Intlignc', 4, 2, 'Core', 'AA', NULL, '2020-05-09 03:46:21'),
(15, 'Automata Theory', 3, 2, 'Core', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_03_161643_add_timestamps_to_cafe', 2),
(4, '2020_05_04_014240_add_timestamps_to_societies', 3),
(5, '2020_05_07_003327_add_timestamp_to_programs', 4),
(6, '2020_05_07_003508_add_timestamp_to_sessions', 4),
(7, '2020_05_07_003523_add_timestamp_toteachers', 4),
(8, '2020_05_07_003546_add_timestamp_tobooks', 4),
(9, '2020_05_07_003602_add_timestamp_topage', 4),
(10, '2020_05_07_003619_add_timestamp_totype', 4),
(11, '2020_05_07_004604_add_timestamp_to_sessions', 5),
(12, '2020_05_07_004613_add_timestamp_to_teachers', 5),
(13, '2020_05_07_004622_add_timestamp_to_books', 5),
(14, '2020_05_07_004641_add_timestamp_to_programs', 6),
(15, '2020_05_07_004656_add_timestamp_to_type', 6),
(16, '2020_05_07_005101_add_timestamp_to_pages', 6),
(17, '2020_05_08_102524_create_productsincaves_table', 7),
(27, '2020_05_08_102831_add_timestamp_to_productsincafe', 8),
(28, '2020_05_08_102904_add_timestamp_to_student', 8),
(29, '2020_05_08_102928_add_timestamp_to_purchase', 9),
(30, '2020_05_08_102950_add_timestamp_to_course', 9),
(31, '2020_05_08_103005_add_timestamp_to_register', 9),
(32, '2020_05_08_103029_add_timestamp_to_teacherissue', 9),
(33, '2020_05_08_103041_add_timestamp_to_user', 9),
(34, '2020_05_08_103141_add_timestamp_to_pageusertype', 9),
(36, '2020_05_08_103922_add_timestamp_to_participate', 10),
(37, '2020_05_09_051607_create_pages_types_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pid` int(11) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pid`, `pname`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, NULL),
(2, 'Register', NULL, NULL),
(3, 'Transcript', NULL, NULL),
(4, 'login', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pageusertype`
--

CREATE TABLE `pageusertype` (
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageusertype`
--

INSERT INTO `pageusertype` (`pid`, `tid`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(2, 1, NULL, NULL),
(3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `joindate` varchar(15) NOT NULL,
  `sid` int(2) NOT NULL,
  `socid` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participate`
--

INSERT INTO `participate` (`joindate`, `sid`, `socid`, `created_at`, `updated_at`) VALUES
('April', 8, 3, NULL, NULL),
('August', 5, 1, NULL, NULL),
('January', 1, 2, NULL, NULL),
('July', 1, 1, NULL, NULL),
('June', 2, 2, NULL, NULL),
('March', 10, 1, NULL, NULL),
('May', 3, 2, NULL, NULL),
('May', 3, 3, NULL, NULL),
('September', 12, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Productid` varchar(2) NOT NULL,
  `Productname` varchar(15) DEFAULT NULL,
  `Price` int(3) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Productid`, `Productname`, `Price`, `updated_at`, `created_at`) VALUES
('p1', 'Burger', 100, '2020-05-03 00:42:44', '2020-05-03 00:42:44'),
('p2', 'Fries', 50, '2020-05-03 13:06:54', '2020-05-03 00:42:44'),
('p3', '7up', 40, '2020-05-03 10:40:03', '2020-05-03 00:42:44'),
('p4', 'Sandwitch', 80, '2020-05-07 06:53:54', '2020-05-07 06:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `productsincafe`
--

CREATE TABLE `productsincafe` (
  `Cafeid` int(1) NOT NULL,
  `Productid` varchar(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsincafe`
--

INSERT INTO `productsincafe` (`Cafeid`, `Productid`, `created_at`, `updated_at`) VALUES
(1, 'p1', NULL, NULL),
(1, 'p2', NULL, NULL),
(2, 'p1', NULL, NULL),
(2, 'p2', NULL, NULL),
(2, 'p3', NULL, NULL),
(3, 'p2', NULL, NULL),
(3, 'p3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `pid` int(1) NOT NULL,
  `ptitle` varchar(3) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`pid`, `ptitle`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'BCS', '4 Years', NULL, NULL),
(2, 'BSE', '4 years', NULL, '2020-05-06 21:25:37'),
(3, 'CSS', '2 years', NULL, '2020-05-06 21:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Sid` int(2) NOT NULL,
  `Productid` varchar(3) NOT NULL,
  `Cafeid` int(1) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Sid`, `Productid`, `Cafeid`, `Quantity`, `created_at`, `updated_at`) VALUES
(1, 'p1', 1, 3, NULL, NULL),
(1, 'p2', 1, 3, NULL, NULL),
(2, 'p2', 2, 1, NULL, NULL),
(2, 'p3', 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `sid` int(2) NOT NULL,
  `code` int(2) NOT NULL,
  `Grade` varchar(2) NOT NULL,
  `sesid` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`sid`, `code`, `Grade`, `sesid`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 1, NULL, NULL),
(1, 2, 'A', 1, NULL, NULL),
(2, 2, 'C', 1, NULL, NULL),
(2, 4, 'A', 1, NULL, NULL),
(3, 2, 'A', 1, NULL, NULL),
(4, 6, 'D', 1, NULL, NULL),
(5, 5, 'B', 1, NULL, NULL),
(5, 6, 'B-', 1, NULL, NULL),
(6, 8, 'C', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sid` int(2) NOT NULL,
  `stitle` varchar(4) DEFAULT NULL,
  `sdate` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sid`, `stitle`, `sdate`, `created_at`, `updated_at`) VALUES
(1, 'S12', 'March', NULL, NULL),
(2, 'F12', 'September', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `socid` int(1) NOT NULL,
  `socname` varchar(15) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`socid`, `socname`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Usher', 'General', NULL, NULL),
(2, 'Sacs', 'ComputerScience', NULL, NULL),
(3, 'Dramatic', 'Drama', NULL, NULL),
(4, 'IEEE', 'Science', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(2) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  `dob` int(4) DEFAULT NULL,
  `pid` int(1) DEFAULT NULL,
  `gpa` int(3) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `sname`, `fname`, `address`, `dob`, `pid`, `gpa`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Arslan Elahi', 'Bahsir Ahmed', 'Lahore', 1992, 2, 3, 'Male', NULL, NULL),
(2, 'Ahmed Razzaq', 'Abdul Razzaq', 'Karachi', 1993, 2, 3, 'Male', NULL, NULL),
(3, 'Farooq Bukhari', 'Fahim Bikhari', 'Islamabad', 1992, 2, 3, 'Male', NULL, '2020-05-08 22:38:58'),
(4, 'Najam Saleem', 'Saleem Butt', 'Islamabad', 1989, 3, 4, 'Female', NULL, NULL),
(5, 'Amna Javed', 'Javed Akhtar', 'Islamabad', 1990, 2, 3, 'Female', NULL, NULL),
(6, 'Shoaib Subhani', 'Sarwar Ali', 'Peshawar', 1991, 2, 3, 'Male', NULL, NULL),
(7, 'Javad Ahmed', 'Mujtabha Butt', 'Quetta', 1991, 3, 4, 'Male', NULL, NULL),
(8, 'Ahmed Rabbani', 'Babar Rabbani', 'Lahore', 1983, 1, 2, 'Male', NULL, NULL),
(9, 'Javad Ahmed', 'Mahmood Khan', 'Peshawar', 1985, 1, 3, 'Male', NULL, NULL),
(10, 'Zeeshan Ahmed', 'Ahmed Sohail', 'Karachi', 1992, 1, 3, 'Male', NULL, NULL),
(11, 'Ali Muneer Khan', 'Muneer Khan', 'Peshawar', 1987, 2, 4, 'Male', NULL, NULL),
(12, 'Nimra Razzaq', 'Abdul Razzaq', 'Karachi', 1982, 2, 4, 'Female', NULL, NULL),
(13, 'Ali Kazmi', 'Saleem Kazmi', 'Multan', 1986, 3, 4, 'Male', NULL, NULL),
(14, 'Jawad Ahmed', 'Yousaf Ali', 'Karachi', 1992, 1, 4, 'Male', NULL, NULL),
(15, 'Tabsum Zafar', 'Nazir Bhatti', 'Multan', 1994, 3, 4, 'Female', NULL, NULL),
(16, 'Mariyam', 'Abid', 'Chichawatni', 1990, 2, 4, 'Female', NULL, NULL),
(17, 'Habiba', 'Habib', 'Lahore', 1997, 1, 4, 'Female', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `code` int(2) NOT NULL,
  `Tid` int(1) NOT NULL,
  `section` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach`
--

INSERT INTO `teach` (`code`, `Tid`, `section`) VALUES
(1, 1, 'A'),
(2, 3, 'A'),
(4, 2, 'C'),
(5, 2, 'A'),
(6, 6, 'F'),
(8, 4, 'A'),
(9, 4, 'A'),
(11, 1, 'B'),
(13, 5, 'B'),
(15, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `teacherissue`
--

CREATE TABLE `teacherissue` (
  `Tid` int(1) NOT NULL,
  `Isbn` int(3) NOT NULL,
  `Issuedate` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherissue`
--

INSERT INTO `teacherissue` (`Tid`, `Isbn`, `Issuedate`, `returndate`, `created_at`, `updated_at`) VALUES
(2, 102, '2012-02-13', '2012-06-15', NULL, NULL),
(3, 100, '2012-02-13', '2012-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TId` int(1) NOT NULL,
  `Firstname` varchar(10) DEFAULT NULL,
  `Lastname` varchar(10) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  `Experience` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TId`, `Firstname`, `Lastname`, `Designation`, `Experience`, `created_at`, `updated_at`) VALUES
(1, 'Shoaib', 'Farooq', 'Professor', '15 years', NULL, NULL),
(2, 'Nabeel', 'Sabir', 'Ast Professor', '10 years', NULL, NULL),
(3, 'Adnan', 'Shahzada', 'Lecturer', '3 years', NULL, NULL),
(4, 'Yasir', 'Danial', 'Professor', '12 years', NULL, NULL),
(5, 'Fakhar', 'Abbas', 'Ast Professor', '10 years', NULL, NULL),
(6, 'Imtiaz', 'Riaz', 'Ast Professor', '8 years', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `tid` int(11) NOT NULL,
  `tname` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`tid`, `tname`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, NULL),
(2, 'Teacher', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `password` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `tid`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin123', NULL, NULL),
(2, 1, 'test123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Isbn`);

--
-- Indexes for table `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`CafeId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `pageusertype`
--
ALTER TABLE `pageusertype`
  ADD PRIMARY KEY (`pid`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`joindate`,`sid`,`socid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `socid` (`socid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Productid`);

--
-- Indexes for table `productsincafe`
--
ALTER TABLE `productsincafe`
  ADD PRIMARY KEY (`Cafeid`,`Productid`),
  ADD KEY `Productid` (`Productid`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Sid`,`Productid`,`Cafeid`,`Quantity`),
  ADD KEY `Cafeid` (`Cafeid`),
  ADD KEY `Productid` (`Productid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`sid`,`code`,`Grade`,`sesid`),
  ADD KEY `code` (`code`),
  ADD KEY `sesid` (`sesid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`socid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`code`,`Tid`,`section`),
  ADD KEY `Tid` (`Tid`);

--
-- Indexes for table `teacherissue`
--
ALTER TABLE `teacherissue`
  ADD PRIMARY KEY (`Tid`,`Isbn`),
  ADD KEY `Isbn` (`Isbn`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TId`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `programs` (`pid`);

--
-- Constraints for table `pageusertype`
--
ALTER TABLE `pageusertype`
  ADD CONSTRAINT `pageusertype_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `pages` (`pid`),
  ADD CONSTRAINT `pageusertype_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `types` (`tid`);

--
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`),
  ADD CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`socid`) REFERENCES `societies` (`socid`);

--
-- Constraints for table `productsincafe`
--
ALTER TABLE `productsincafe`
  ADD CONSTRAINT `productsincafe_ibfk_1` FOREIGN KEY (`Cafeid`) REFERENCES `cafes` (`CafeId`),
  ADD CONSTRAINT `productsincafe_ibfk_2` FOREIGN KEY (`Productid`) REFERENCES `products` (`Productid`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `students` (`sid`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`Cafeid`) REFERENCES `cafes` (`CafeId`),
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`Productid`) REFERENCES `products` (`Productid`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`code`) REFERENCES `courses` (`code`),
  ADD CONSTRAINT `register_ibfk_3` FOREIGN KEY (`sesid`) REFERENCES `sessions` (`sid`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `programs` (`pid`);

--
-- Constraints for table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`Tid`) REFERENCES `teachers` (`TId`),
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`code`) REFERENCES `courses` (`code`);

--
-- Constraints for table `teacherissue`
--
ALTER TABLE `teacherissue`
  ADD CONSTRAINT `teacherissue_ibfk_1` FOREIGN KEY (`Tid`) REFERENCES `teachers` (`TId`),
  ADD CONSTRAINT `teacherissue_ibfk_2` FOREIGN KEY (`Isbn`) REFERENCES `books` (`Isbn`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `types` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
