-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2020 at 06:33 PM
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
  `CourseDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`ID`, `CourseName`, `CourseID`, `CourseType`, `CourseCost`, `CourseDescription`) VALUES
(9, 'English', '', 'Language', 210, 'It Will make Students Speaks Fluently'),
(42, 'Arabic', NULL, 'Literture', 250, 'It Will make Students Understand Enviroment');

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
(5, 15, 25, '2020-05-12', '2020-05-30', 9, '2020-05-12 00:00:00', '2020-05-12 15:13:41'),
(7, 60, 29, '2020-05-13', '2020-06-06', 42, '2020-05-12 15:55:34', '2020-05-12 15:56:41');

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

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `ID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Discount` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` datetime NOT NULL
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
(5, 'math', '11:00:00', 200, 'https', 9),
(7, 'Arabic', '12:00:00', 250, 'https', 9),
(10, 'Adab', '09:30:00', 155, 'https', 42);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `Attendence` int(11) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`ID`, `Student_ID`, `Section_ID`, `Attendence`, `UpdatedDate`) VALUES
(1, 25, 5, 12, '2020-05-12 00:14:02'),
(2, 7, 10, 12, '2020-05-12 00:00:00');

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
(1, 16, 'Teaching English St.Fatima Language School', 'Learning English for more than 20 yeaars', 5, '2020-05-12 04:26:47');

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
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `Phone`, `Image`, `CreatedDate`, `UpdatedDate`) VALUES
(7, 'Mohamed', 'Osama', 'mika@gmail.com', '123456', 1023903532, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Admin', 'Admin', 'admin@hotmail.com', '123456', 1003153562, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Teacher', 'Teacher', 'Teacher@gmail.com', '123456', 1003153563, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Zeiad', 'Hossam', 'Zoz@gmail.com', '123456', 1154389678, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Moataz', 'Lasheen', 'Weza@yahoo.com', '123456', 1023903537, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Hanan', 'Medhat', 'hanan@gmail.com', '123456', 1154389678, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Tarek', 'Medhat', 'maged@gmail.com', '123456', 103153562, NULL, '2020-05-11 22:53:15', '0000-00-00 00:00:00'),
(38, 'Mohamed', 'Ayman', 'Ayman@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1003153562, NULL, '2020-05-12 13:24:58', '2020-05-12 15:11:27'),
(39, 'Amr', 'Ehab', 'amrehab@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1023903532, NULL, '2020-05-12 15:47:25', NULL);

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
('Student', 7),
('Admin', 15),
('Teacher', 16),
('Admin', 17),
('Student', 18),
('Student', 25),
('Student', 38),
('Student', 39);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `Course_Duration`
--
ALTER TABLE `Course_Duration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
