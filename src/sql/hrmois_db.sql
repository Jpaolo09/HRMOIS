-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 02:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrmois_db`
--
CREATE DATABASE IF NOT EXISTS hrmios_db;
USE hrmios_db;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ATTENDANCE_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `TIME_IN` time NOT NULL,
  `TIME_OUT` time NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `CAMPUS_ID` int(11) NOT NULL,
  `CAMPUS_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`CAMPUS_ID`, `CAMPUS_NAME`) VALUES
(1, 'Manila'),
(2, 'Taguig'),
(3, 'Visayas');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `COLLEGE_ID` int(11) NOT NULL,
  `COLLEGE_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`COLLEGE_ID`, `COLLEGE_NAME`) VALUES
(1, 'College of Architecture and Fine Arts'),
(2, 'College of Engineering'),
(3, 'College of Industrial Education'),
(4, 'College of Industrial Technology'),
(5, 'College of Liberal Arts'),
(6, 'College of Science'),
(7, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMP_ID` int(11) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `OFFICE_ID` int(11) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `SEX` enum('MALE','FEMALE','','') NOT NULL,
  `DOB` date NOT NULL,
  `PLACE_OF_BIRTH` varchar(100) NOT NULL,
  `TEL_NO` varchar(30) NOT NULL,
  `CIVIL_STATUS` enum('SINGLE','MARRIED','WIDOWED','DIVORCED') NOT NULL,
  `DESIGNATION` varchar(50) NOT NULL,
  `COLLEGE_ID` int(11) NOT NULL,
  `CAMPUS_ID` int(11) NOT NULL,
  `WORK_STATUS` enum('REGULAR','PART-TIME','SUSPENDED','') NOT NULL,
  `HIRED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `FNAME`, `MNAME`, `LNAME`, `OFFICE_ID`, `ADDRESS`, `SEX`, `DOB`, `PLACE_OF_BIRTH`, `TEL_NO`, `CIVIL_STATUS`, `DESIGNATION`, `COLLEGE_ID`, `CAMPUS_ID`, `WORK_STATUS`, `HIRED_DATE`) VALUES
(1, 'Jesus Rodrigo', 'F.', 'Torres', 2, 'Ayala Blvd, Ermita, Manila, 1000 Metro Manila', 'MALE', '1973-09-16', 'Manila', '(+63) 9054687742', 'MARRIED', 'President', 7, 1, 'REGULAR', '2019-06-11'),
(2, 'Lorna', 'S.', 'Santos', 14, 'Manila', 'FEMALE', '1980-05-11', 'Cavite', '(+63) 9751447832', 'SINGLE', 'Human Resource', 7, 1, 'REGULAR', '2021-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `OFFICE_ID` int(11) NOT NULL,
  `OFFICE_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`OFFICE_ID`, `OFFICE_NAME`) VALUES
(1, 'Board of Regents'),
(2, 'Office of the President'),
(3, 'Vice President - Research and Extension'),
(4, 'Vice President - Administration and Finance'),
(5, 'Vice President - Academic Affairs'),
(6, 'Vice President - Planning and Development'),
(7, 'Faculty Association'),
(8, 'Alumni Association'),
(9, 'University Accreditation Center'),
(10, 'University Learning Resource Center'),
(11, 'Integrated Research and Training Center'),
(12, 'Office of Admission'),
(13, 'Office of Student Affairs'),
(14, 'University Registrar'),
(15, 'University Medical and Dental Clinic'),
(16, 'Industrial Relations and Job Placement Office'),
(17, 'University Information Technology Center'),
(18, 'University Library');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `PR_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `ATTENDANCE_ID` int(11) NOT NULL,
  `BASIC_PAY` int(11) NOT NULL,
  `GROSS_PAY` int(11) NOT NULL,
  `CASH_ADVANCE` int(11) NOT NULL,
  `SSS` int(11) NOT NULL,
  `PHILHEALTH` int(11) NOT NULL,
  `PAGIBIG` int(11) NOT NULL,
  `OTHERS` int(11) NOT NULL,
  `DEDUCTION` int(11) NOT NULL,
  `NET_PAY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `POS_ID` int(11) NOT NULL,
  `POSITION` varchar(100) NOT NULL,
  `OFFICE_ID` int(11) NOT NULL,
  `CAMPUS_ID` int(11) NOT NULL,
  `NUM_OF_VACANCIES` int(11) NOT NULL,
  `SALARY_GRADE` int(11) NOT NULL,
  `QUALIFICATION` varchar(100) NOT NULL,
  `EXPERIENCE` varchar(100) NOT NULL DEFAULT 'None Required',
  `TRAINING` varchar(100) NOT NULL DEFAULT 'None Required',
  `ELIGIBILITY` varchar(100) NOT NULL DEFAULT 'None Required',
  `DEADLINE` date NOT NULL DEFAULT current_timestamp(),
  `REQ` text NOT NULL DEFAULT 'None Required'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`POS_ID`, `POSITION`, `OFFICE_ID`, `CAMPUS_ID`, `NUM_OF_VACANCIES`, `SALARY_GRADE`, `QUALIFICATION`, `EXPERIENCE`, `TRAINING`, `ELIGIBILITY`, `DEADLINE`, `REQ`) VALUES
(1, 'Administrative Aide VI - Clerk III', 15, 1, 1, 6, 'Completion of two years in college.', 'None Required', 'None Required', 'Career Service Subprofessional', '2021-05-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `PASSWORD`, `EMP_ID`) VALUES
(1, 'lorna@hr', 'hr1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ATTENDANCE_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`CAMPUS_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`COLLEGE_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `CAMPUS_ID` (`CAMPUS_ID`),
  ADD KEY `COLLEGE_ID` (`COLLEGE_ID`),
  ADD KEY `OFFICE_ID` (`OFFICE_ID`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`OFFICE_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `ATTENDANCE_ID` (`ATTENDANCE_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`POS_ID`),
  ADD KEY `CAMPUS_ID` (`CAMPUS_ID`),
  ADD KEY `OFFICE_ID` (`OFFICE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `CAMPUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `COLLEGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `OFFICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`CAMPUS_ID`) REFERENCES `campus` (`CAMPUS_ID`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`COLLEGE_ID`) REFERENCES `college` (`COLLEGE_ID`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`OFFICE_ID`) REFERENCES `offices` (`OFFICE_ID`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`ATTENDANCE_ID`) REFERENCES `attendance` (`ATTENDANCE_ID`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`CAMPUS_ID`) REFERENCES `campus` (`CAMPUS_ID`),
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`OFFICE_ID`) REFERENCES `offices` (`OFFICE_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
