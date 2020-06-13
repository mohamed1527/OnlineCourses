-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2020 at 09:42 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `ID` int(11) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `CourseType` varchar(255) NOT NULL,
  `CourseCost` int(11) NOT NULL,
  `CourseDescription` varchar(255) NOT NULL,
  `CourseImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`ID`, `CourseName`, `CourseID`, `CourseType`, `CourseCost`, `CourseDescription`, `CourseImage`) VALUES
(9, 'English', '', 'Language', 300, 'It Will make Students Speaks Fluently', 'English.jpg'),
(42, 'Arabic', NULL, 'Literture', 250, 'It Will make Students Understand Enviroment', 'Arabic.jpg'),
(47, 'Algorithm I', NULL, 'Math', 200, 'It Will Make Students understand Algorithms', 'Math.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Course_Duration`
--

CREATE TABLE `Course_Duration` (
  `ID` int(11) NOT NULL,
  `CourseWeeks` int(11) NOT NULL,
  `CourseHours` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `End_Date` date NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course_Duration`
--

INSERT INTO `Course_Duration` (`ID`, `CourseWeeks`, `CourseHours`, `StartDate`, `End_Date`, `CourseID`, `CreatedDate`, `UpdatedDate`) VALUES
(5, 15, 25, '2020-05-27', '2020-06-27', 9, '2020-05-12 00:00:00', '2020-05-29 22:04:01'),
(7, 60, 29, '2020-05-13', '2020-06-06', 42, '2020-05-12 15:55:34', '2020-05-29 22:04:16'),
(16, 25, 60, '2020-06-13', '2020-06-17', 47, '2020-06-13 09:00:00', '2020-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `ID` int(11) NOT NULL,
  `Sender` varchar(255) NOT NULL,
  `Receiver` varchar(255) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`ID`, `Sender`, `Receiver`, `Message`) VALUES
(1, 'ayman@gmail.com', 'Admin', 'hello'),
(2, 'ayman@gmail.com', 'Admin', 'hello'),
(8, 'ayman@gmail.com', 'Admin', 'hi'),
(11, 'mohamed@gmail.com', 'Admin', 'Hey bitch'),
(13, 'ayman@gmail.com', 'Admin', 'hello'),
(14, 'ayman@gmail.com', 'Admin', 'hello'),
(15, 'ayman@gmail.com', 'Admin', 'hello'),
(16, 'ayman@gmail.com', 'Admin', 'hello'),
(17, 'ayman@gmail.com', 'Admin', 'hello'),
(18, 'ayman@gmail.com', 'Admin', 'hello'),
(19, 'ayman@gmail.com', 'Admin', 'hello'),
(20, 'ayman@gmail.com', 'Admin', 'hello'),
(21, 'ayman@gmail.com', 'Admin', 'hamm'),
(22, 'ayman@gmail.com', 'Admin', 'hello'),
(23, 'amrehab@yahoo.com', 'Admin', 'heelloo'),
(24, 'amrehab@yahoo.com', 'Admin', 'afd'),
(25, 'Ahmed@gmail.com', 'Admin', 'ana ahmed mn masr'),
(26, 'Ahmed@gmail.com', 'Admin', 'ana ahmed mn masr');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `ID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Tax` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE `Section` (
  `ID` int(11) NOT NULL,
  `SectionName` varchar(255) NOT NULL,
  `SectionTime` time NOT NULL,
  `SectionCost` int(11) NOT NULL,
  `SectionLink` varchar(255) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`ID`, `SectionName`, `SectionTime`, `SectionCost`, `SectionLink`, `CourseID`) VALUES
(7, 'Na7w', '12:00:00', 250, 'https', 9),
(10, 'Adab', '09:30:00', 155, 'https', 42),
(12, 'Depth-First-Search', '08:00:00', 320, 'https//www.facebook.com', 47),
(13, 'Breadth-First-Search', '09:00:00', 320, 'https//www.Instagram.com', 47);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`ID`, `Student_ID`, `Section_ID`, `Address`, `UpdatedDate`) VALUES
(3, 48, 7, '308 Tagmo3 ELkhamis', '2020-06-06 14:47:08'),
(7, 60, 10, 'Rehab', '2020-06-12 18:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `ID` int(11) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`ID`, `Teacher_ID`, `Career`, `Experience`, `Section_ID`, `UpdatedDate`) VALUES
(3, 50, 'Studied at cairo university and teaching for 10 years at bussiness adminstarion', '20 Year At Teaching Arabic', 7, '2020-05-27 16:31:26'),
(4, 65, 'Studied Math over 20 years and take bachalor from oxford', '2 years in america\r\n3 years in england', 10, '2020-06-01 00:00:00'),
(5, 68, 'Teaching in asyuit university but before it teaching at cairo university', 'Studied algorithms for 20 years from books and take bachelor from america', 12, '2020-06-13 09:24:00'),
(6, 69, 'Teaching in mansoura university but before it teaching at cairo university', 'Studied algorithms for 20 years from books and take bachelor from England', 13, '2020-06-13 09:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(13) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `Phone`, `Image`, `CreatedDate`) VALUES
(48, 'Mohamed', 'Ayman', 'ayman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1003153564, '', '2020-05-27 15:39:59'),
(49, 'Admin', 'Admin', 'admin@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1003153562, 'team-7.jpg', '2020-05-27 15:56:52'),
(50, 'Manar', 'Medhat', 'Manar@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 1154389672, 'manar.jpeg', '2020-05-27 15:58:05'),
(60, 'Amr', 'Ehab', 'amrehab@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 1023903532, '', '2020-05-29 21:12:57'),
(62, 'Abdo', 'Mido', 'Abdo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 103153562, 'team-6.jpg', '2020-05-29 21:22:52'),
(65, 'Marwa', 'Ahmed', 'Marwa@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1003153562, 'marwa.jpeg', '2020-06-06 18:13:08'),
(67, 'Moataz', 'Asharf', 'Moataz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1003153562, '', '2020-06-11 22:27:32'),
(68, 'Reham', 'Ahmed', 'reham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1023903532, 'reham.jpeg', '2020-06-13 09:21:28'),
(69, 'Reem', 'Mahmoud', 'reem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1003153562, 'reem.jpg', '2020-06-13 09:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `User_Type`
--

CREATE TABLE `User_Type` (
  `UserType` varchar(255) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Type`
--

INSERT INTO `User_Type` (`UserType`, `User_Id`) VALUES
('Student', 48),
('Admin', 49),
('Teacher', 50),
('Student', 60),
('Student', 62),
('Teacher', 65),
('Teacher', 67),
('Teacher', 68),
('Teacher', 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Course_Duration`
--
ALTER TABLE `Course_Duration`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_Id` (`Student_ID`),
  ADD KEY `Section_ID` (`Section_ID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User_ID` (`Teacher_ID`),
  ADD KEY `Section_ID` (`Section_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `User_Type`
--
ALTER TABLE `User_Type`
  ADD KEY `User_Id` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `Course_Duration`
--
ALTER TABLE `Course_Duration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Course_Duration`
--
ALTER TABLE `Course_Duration`
  ADD CONSTRAINT `Course_Duration_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`ID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `Student` (`Student_ID`);

--
-- Constraints for table `Section`
--
ALTER TABLE `Section`
  ADD CONSTRAINT `Section_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`ID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `User` (`ID`),
  ADD CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`Section_ID`) REFERENCES `Section` (`ID`);

--
-- Constraints for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `Teacher_ibfk_1` FOREIGN KEY (`Teacher_ID`) REFERENCES `User` (`ID`),
  ADD CONSTRAINT `Teacher_ibfk_2` FOREIGN KEY (`Section_ID`) REFERENCES `Section` (`ID`);

--
-- Constraints for table `User_Type`
--
ALTER TABLE `User_Type`
  ADD CONSTRAINT `User_Type_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `User` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
