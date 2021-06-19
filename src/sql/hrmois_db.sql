-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 11:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ATTENDANCE_ID`, `EMP_ID`, `TIME_IN`, `TIME_OUT`, `DATE`) VALUES
(6, 2, '20:54:19', '11:50:01', '2021-07-10'),
(7, 2, '20:57:33', '00:00:00', '2021-06-12'),
(8, 2, '21:28:39', '00:00:00', '2021-06-23'),
(9, 2, '21:32:14', '00:00:00', '2021-06-15'),
(10, 2, '21:35:42', '00:00:00', '2021-05-30'),
(11, 2, '11:43:10', '12:40:55', '2021-06-16'),
(12, 2, '11:56:22', '00:00:00', '2021-07-07'),
(13, 2, '12:20:06', '00:00:00', '2021-06-22'),
(14, 2, '12:20:14', '00:00:00', '2021-06-28'),
(15, 1, '12:39:22', '12:40:12', '2021-06-16'),
(16, 1, '12:58:17', '12:58:38', '2021-06-28'),
(17, 1, '17:26:29', '00:00:00', '2021-06-30'),
(18, 2, '21:19:46', '21:20:12', '2021-06-17'),
(19, 2, '22:07:42', '22:09:12', '2021-06-18'),
(20, 2, '22:12:43', '00:00:00', '2021-06-30'),
(21, 2, '15:12:01', '00:00:00', '2021-06-19'),
(22, 2, '15:12:07', '15:12:46', '2021-06-20'),
(23, 1, '15:14:00', '00:00:00', '2021-06-04'),
(24, 2, '15:17:32', '00:00:00', '2022-02-16');

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
(6, 'College of Science');

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
  `EMAIL` varchar(50) NOT NULL,
  `CIVIL_STATUS` enum('SINGLE','MARRIED','WIDOWED','DIVORCED') NOT NULL,
  `DESIGNATION` varchar(50) NOT NULL,
  `COLLEGE_ID` int(11) NOT NULL,
  `CAMPUS_ID` int(11) NOT NULL,
  `WORK_STATUS` enum('REGULAR','PART-TIME','SUSPENDED','RESIGNED OR FIRED') NOT NULL,
  `HIRED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `FNAME`, `MNAME`, `LNAME`, `OFFICE_ID`, `ADDRESS`, `SEX`, `DOB`, `PLACE_OF_BIRTH`, `TEL_NO`, `EMAIL`, `CIVIL_STATUS`, `DESIGNATION`, `COLLEGE_ID`, `CAMPUS_ID`, `WORK_STATUS`, `HIRED_DATE`) VALUES
(1, 'Jesus Rodrigo', 'F.', 'Torres', 2, 'Ayala Blvd, Ermita, Manila, 1000 Metro Manila', 'MALE', '1973-09-16', 'Manila', '(+63) 9054687742', 'jesus@tup.edu.ph', 'MARRIED', 'President', 1, 1, 'REGULAR', '2019-06-11'),
(2, 'Lorna', 'S.', 'Santos', 14, 'Manila', 'FEMALE', '1980-05-11', 'Cavite', '(+63) 9751447832', 'lorna@tup.edu.ph', 'SINGLE', 'Human Resource', 1, 1, 'REGULAR', '2021-05-11'),
(35, 'Juan', 'Dela', 'Cruz', 5, 'Manila', 'MALE', '2021-06-19', 'Manila', '09876351736', 'juan@tup.edu.ph', 'MARRIED', 'Human Resource', 1, 1, 'REGULAR', '2021-06-19'),
(36, 'Jefferson', 'B.', 'Salvador', 9, 'Cavite', 'MALE', '2021-06-19', 'Cavite', '09876351736', 'jep@gmail.com', 'SINGLE', 'Human Resource', 3, 1, 'REGULAR', '2021-06-19');

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
  `WORKING_HOURS` int(11) NOT NULL,
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

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`PR_ID`, `EMP_ID`, `DATE`, `WORKING_HOURS`, `BASIC_PAY`, `GROSS_PAY`, `CASH_ADVANCE`, `SSS`, `PHILHEALTH`, `PAGIBIG`, `OTHERS`, `DEDUCTION`, `NET_PAY`) VALUES
(14, 35, '2021-06-19', 0, 250, 10000, 0, 130, 160, 150, 0, 0, 8000),
(15, 36, '2021-06-19', 0, 250, 10000, 0, 130, 160, 150, 0, 0, 8000);

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
  `ITEM_NUM` varchar(50) NOT NULL DEFAULT 'TUPB-0000-00-0000',
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

INSERT INTO `position` (`POS_ID`, `POSITION`, `OFFICE_ID`, `CAMPUS_ID`, `NUM_OF_VACANCIES`, `SALARY_GRADE`, `ITEM_NUM`, `QUALIFICATION`, `EXPERIENCE`, `TRAINING`, `ELIGIBILITY`, `DEADLINE`, `REQ`) VALUES
(1, 'Administrative Aide VI - Clerk III', 15, 1, 1, 6, 'TUPB-0000-00-0000', 'Completion of two years in college.', 'None Required', 'None Required', 'Career Service Subprofessional', '2021-05-22', '1. Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph; 2. Performance rating in the last rating period (if applicable); 3. Photocopy of certificate of eligibility/rating/license; and 4. Photocopy of Transcript of Records.'),
(3, '	Administrative Officer V - Cashier III', 17, 1, 1, 18, 'TUPB-ADOF5-9-2004', 'Bachelor&#39;s degree', 'Two (2) years of relevant experience', 'Eight (8) hours of relevant training', 'Career Service Professional', '2021-07-10', '1. Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph;\r\n2. Performance rating in the last rating period (if applicable);\r\n3. Photocopy of certificate of eligibility/rating/license; and\r\n4. Photocopy of Transcript of Records.'),
(4, 'Science Research Assistant', 11, 1, 1, 18, 'TUPB-ADOF5-9-2004', 'Bachelor&#39;s degree', 'Two (2) years of relevant experience', 'Eight (8) hours of relevant training', 'Career Service Professional', '2021-08-20', '1. Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph;\r\n2. Performance rating in the last rating period (if applicable);\r\n3. Photocopy of certificate of eligibility/rating/license; and\r\n4. Photocopy of Transcript of Records.');

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
(1, 'lorna@hr', 'hr1234', 2),
(2, 'rodrigo@employee', 'employee1234', 1);

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
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `OFFICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
