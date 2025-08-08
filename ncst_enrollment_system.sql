-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 06:29 PM
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
-- Database: `ncst_enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminNo` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT '$2y$10$6Ua73bA98Dbu3jBQvRNUleYym1FQdW4upZjGO5W5ihsMWKDUiMYMO',
  `firstName` varchar(100) DEFAULT NULL,
  `midName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `suffix` varchar(50) NOT NULL DEFAULT '-',
  `birthDate` date NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `user_role` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNo`, `email`, `password`, `firstName`, `midName`, `lastName`, `suffix`, `birthDate`, `dateCreated`, `user_role`, `department`, `status`) VALUES
(1, '2025-00001', 'poldo@ncstadmin.com', '$2y$10$6Ua73bA98Dbu3jBQvRNUleYym1FQdW4upZjGO5W5ihsMWKDUiMYMO', 'Sophia Denise', '-', 'Poldo', '-', '2004-10-30', '2025-07-28 20:49:22', 'admin', 'Administration Office', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educ_reg_info`
--

CREATE TABLE `educ_reg_info` (
  `studentID` int(11) NOT NULL,
  `primarySchool` varchar(255) NOT NULL,
  `primaryYear` varchar(100) NOT NULL,
  `secondarySchool` varchar(255) NOT NULL,
  `secondaryYear` varchar(100) NOT NULL,
  `tertiarySchool` varchar(255) DEFAULT '-',
  `tertiaryYear` varchar(100) DEFAULT '-',
  `courseGraduated` varchar(100) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educ_reg_info`
--

INSERT INTO `educ_reg_info` (`studentID`, `primarySchool`, `primaryYear`, `secondarySchool`, `secondaryYear`, `tertiarySchool`, `tertiaryYear`, `courseGraduated`) VALUES
(1, 'Neogan Elementary School', '2011-2017', 'Tagaytay City National High School - Integrated Senior High School', '2022-2023', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `employeeNo` varchar(50) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `midName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `suffix` varchar(50) NOT NULL DEFAULT '-',
  `birthDate` date NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` varchar(100) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `employeeNo`, `firstName`, `midName`, `lastName`, `suffix`, `birthDate`, `email`, `password`, `user_role`, `department`, `dateCreated`, `status`) VALUES
(1, '2025-00002', 'Rodrigo', 'Batinggal', 'Galauran', 'Jr.', '2005-01-01', 'galauran_registrar@ncst.com', '$2y$10$IxaptD0r4O6nSwEcKQY/DOsizs1SQ6gzeRUJ6mH2el6Hsx4wyglOq', 'registrar', 'Registrar Office', '2025-07-31 19:54:23', 1),
(2, '2025-00003', 'Fatima', '', 'Terrado', '', '2004-06-28', 'terrado@ncsttreasury.com', '$2y$10$PUzSuTZPfo2GY4K904o26ujKR/kez6NXA9moJrEEF0lqU61mdHU1C', 'treasury', 'Treasury Office', '2025-08-08 20:26:33', 1),
(3, '2025-00004', 'Maria Sarah', '', 'Rebate', '', '2006-01-31', 'rebate@ncstrecords.com', '$2y$10$L/bZ.L7YyCuaqvhCajLFq.dueZIagPropvopNJrMXIbOpCpczk6/K', 'records', 'Records Office', '2025-08-08 21:19:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents_reg_info`
--

CREATE TABLE `parents_reg_info` (
  `studentID` int(11) NOT NULL,
  `fatherFirstName` varchar(100) NOT NULL,
  `fatherMidName` varchar(50) DEFAULT '-',
  `fatherLastName` varchar(100) NOT NULL,
  `fatherSuffix` varchar(20) DEFAULT '-',
  `fatherAddress` varchar(255) NOT NULL,
  `fatherPhone` varchar(11) NOT NULL,
  `fatherOccupation` varchar(100) DEFAULT 'NA',
  `motherFirstName` varchar(100) NOT NULL,
  `motherMidName` varchar(50) DEFAULT '-',
  `motherLastName` varchar(100) NOT NULL,
  `motherAddress` varchar(255) NOT NULL,
  `motherPhone` varchar(11) NOT NULL,
  `motherOccupation` varchar(100) DEFAULT 'NA',
  `guardianFirstName` varchar(100) NOT NULL,
  `guardianMidName` varchar(50) DEFAULT '-',
  `guardianLastName` varchar(100) NOT NULL,
  `guardianSuffix` varchar(20) DEFAULT '-',
  `guardianAddress` varchar(255) NOT NULL,
  `guardianPhone` varchar(11) NOT NULL,
  `guardianOccupation` varchar(100) DEFAULT 'NA',
  `guardianRelationship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents_reg_info`
--

INSERT INTO `parents_reg_info` (`studentID`, `fatherFirstName`, `fatherMidName`, `fatherLastName`, `fatherSuffix`, `fatherAddress`, `fatherPhone`, `fatherOccupation`, `motherFirstName`, `motherMidName`, `motherLastName`, `motherAddress`, `motherPhone`, `motherOccupation`, `guardianFirstName`, `guardianMidName`, `guardianLastName`, `guardianSuffix`, `guardianAddress`, `guardianPhone`, `guardianOccupation`, `guardianRelationship`) VALUES
(1, 'N/A', 'N/A', 'N/A', '', 'N/A', 'N/A', 'N/A', 'Ruby-Ann', 'Caigoy', 'Terrado', 'Paliparan 3, Dasmarinas, Cavite', '09987654321', 'N/A', 'Jennylyn', 'Terrado', 'Dinwoodie', '', 'Blk 5 Lot 6 Palm Avenue Ph C, Tagaytay Country Homes 2 Tagaytay City, Cavite', '09135792468', 'Housewife', 'Aunt');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentNo` varchar(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `yearLevel` int(11) DEFAULT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentNo`, `fullName`, `email`, `password`, `role`, `course`, `yearLevel`, `dateCreated`) VALUES
(1, '2025-00001', 'Fatima  Terrado ', 'fatimaterrado4@gmail.com', 'Terrado', 'student', 'BSIT', 1, '2025-08-08 23:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `stud_reg_info`
--

CREATE TABLE `stud_reg_info` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `midName` varchar(50) DEFAULT '-',
  `lastName` varchar(100) NOT NULL,
  `suffix` varchar(20) DEFAULT '-',
  `address` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `civilStatus` enum('Single','Married','Widowed','Divorced') NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birthDate` date NOT NULL,
  `birthPlace` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `employer` varchar(100) DEFAULT 'NA',
  `position` varchar(100) DEFAULT 'NA',
  `course` varchar(100) NOT NULL,
  `yearLevel` varchar(50) NOT NULL,
  `houseHeroes` varchar(100) NOT NULL,
  `nstp` varchar(100) NOT NULL,
  `dateSubmitted` timestamp NOT NULL DEFAULT current_timestamp(),
  `isApproved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_reg_info`
--

INSERT INTO `stud_reg_info` (`studentID`, `firstName`, `midName`, `lastName`, `suffix`, `address`, `zip`, `phone`, `gender`, `civilStatus`, `nationality`, `birthDate`, `birthPlace`, `email`, `religion`, `employer`, `position`, `course`, `yearLevel`, `houseHeroes`, `nstp`, `dateSubmitted`, `isApproved`) VALUES
(1, 'Fatima', '', 'Terrado', '', 'Blk 5 Lot 6 Palm Avenue Ph C, Tagaytay Country Homes 2 Tagaytay City, Cavite', '4120', '09301971568', 'Female', 'Single', 'Filipino', '2004-06-28', 'Dasmarinas, Cavite', 'fatimaterrado4@gmail.com', 'Catholic', '', '', 'BSIT', '1st Year', 'Makabayan', 'CWTS', '2025-08-08 08:45:55', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `educ_reg_info`
--
ALTER TABLE `educ_reg_info`
  ADD KEY `fk_educ_student` (`studentID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `parents_reg_info`
--
ALTER TABLE `parents_reg_info`
  ADD KEY `fk_parents_student` (`studentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `stud_reg_info`
--
ALTER TABLE `stud_reg_info`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2029;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud_reg_info`
--
ALTER TABLE `stud_reg_info`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educ_reg_info`
--
ALTER TABLE `educ_reg_info`
  ADD CONSTRAINT `fk_educ_student` FOREIGN KEY (`studentID`) REFERENCES `stud_reg_info` (`studentID`) ON DELETE CASCADE;

--
-- Constraints for table `parents_reg_info`
--
ALTER TABLE `parents_reg_info`
  ADD CONSTRAINT `fk_parents_student` FOREIGN KEY (`studentID`) REFERENCES `stud_reg_info` (`studentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
