-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 10:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist_account`
--

CREATE TABLE `artist_account` (
  `Name` varchar(20) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_Number` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Confirm_Password` varchar(20) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `Place` varchar(20) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `Charges` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Gender` varchar(20) DEFAULT NULL,
  `OTP` varchar(20) DEFAULT NULL,
  `Image` varchar(225) NOT NULL,
  `Video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist_account`
--

INSERT INTO `artist_account` (`Name`, `Username`, `Email`, `Mobile_Number`, `Password`, `Confirm_Password`, `Category`, `Place`, `job`, `Charges`, `Gender`, `OTP`, `Image`, `Video`) VALUES
('Atharva', 'atharva123', 'atharvasawant@gmail.com', '8569741238', 'atharva123456', 'atharva123456', 'Singer', 'Borivali', 'Part Time', '1500', 'Male', '856974', 'Uploads/Manthan.jpeg.jpg', 'upload/manthan.mp4'),
('Jagdish', 'jagdishmistry', 'jagdishmistry@gmail.com', '9874563218', '987654321', '987654321', 'Music Band', 'Kandivali', 'Part Time', '1800', 'Male', '163011', 'Uploads/violin.jpg', 'upload/jagdish mistry.mp4'),
('Kirti', 'kirti2003@', 'kirti@gmail.com', '9654123874', 'kirti2003', 'kirti2003', 'Singer', 'Borivali', 'Part Time', '1800', 'Female', '487735', 'Uploads/Kirti.jpeg.jpg', 'upload/kirti.mp4'),
('Taniya', 'taniya28', 'ts573285@gmail.com', '8456971235', 'taniya234', 'taniya234', 'Writer', 'Malad', 'Full Time', '2000', 'Female', '697568', 'Uploads/images.jpeg', 'upload/writer_video.mp4'),
('zeal', 'zeal29', 'zeal@gmail.com', '8523641789', 'zeal@123', 'zeal@123', 'Photographer', 'Borivali', 'Full Time', '1600', 'Female', '896771', 'Uploads/Zeal.jpeg.jpg', 'upload/Photographer-Video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Recruiter_Email_Id` varchar(200) NOT NULL,
  `Mobile_Number` varchar(20) NOT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Event_date` date NOT NULL,
  `Event_time` time(6) NOT NULL,
  `location` varchar(150) NOT NULL,
  `Artist_Email_Id` varchar(255) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`Id`, `Name`, `Recruiter_Email_Id`, `Mobile_Number`, `Event_name`, `Event_date`, `Event_time`, `location`, `Artist_Email_Id`, `Status`) VALUES
(17, 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'Birthday', '2023-05-24', '13:55:00.000000', 'Malad west', 'atharvasawant@gmail.com', ''),
(18, 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'Birthday', '2023-05-29', '13:07:00.000000', 'kandivali', 'ts573285@gmail.com', ''),
(19, 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'Birthday', '2023-05-30', '04:19:00.000000', 'kandivali', 'ts573285@gmail.com', ''),
(20, 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'Birthday', '2023-05-30', '04:19:00.000000', 'kandivali', 'ts573285@gmail.com', ''),
(21, 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'Birthday', '2023-05-24', '04:24:00.000000', 'Malad west', 'ts573285@gmail.com', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `Email_Id` varchar(225) NOT NULL,
  `OTP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_account`
--

CREATE TABLE `recruiter_account` (
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Mobile_Number` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Confirm_Password` varchar(50) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `OTP` varchar(10) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter_account`
--

INSERT INTO `recruiter_account` (`Name`, `Username`, `Email`, `Mobile_Number`, `Password`, `Confirm_Password`, `Place`, `Company_Name`, `Gender`, `OTP`, `Image`) VALUES
('Tanisha', 'tanisha24', 'tanishabhatt68@gmail.com', '7400354807', 'tanisha123', 'tanisha123', 'Malad', 'tanishq', 'Female', '685171', 'Uploads/tanisha.jpg'),
('Suraj', 'Suraj123', 'surajprajapati8520@gmail.com', '9568741235', 'suraj567', 'suraj567', 'Dahisar', 'Suraj', 'Male', '220229', 'Uploads/suraj.jpeg'),
('Nayan', 'nayan30', 'nayan@gmail.com', '7536895286', 'nayan098', 'nayan098', 'Kandivali', 'Sai Palace', 'Male', '609403', 'Uploads/nayan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Confirm_Password` varchar(20) DEFAULT NULL,
  `Email_Id` varchar(120) DEFAULT NULL,
  `Mobile_Number` varchar(20) DEFAULT NULL,
  `OTP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Name`, `Password`, `Confirm_Password`, `Email_Id`, `Mobile_Number`, `OTP`) VALUES
('Atharva', 'atharva123456', 'atharva123456', 'atharvasawant@gmail.com', '9569741238', '339654'),
('Jagdish', 'jagdishmistry', 'jagdishmistry', 'jagdishmistry@gmail.com', '9874563218', '976034'),
('Kirti', 'kirti2003', 'kirti2003', 'kirti@gmail.com', '9654123874', '620966'),
('Suraj', 'suraj567', 'suraj567', 'surajprajapati8520@gmail.com', '8456975239', '855283'),
('Nayan', 'nayan098', 'nayan098', 'nayan@gmail.com', '7569812358', '393386'),
('zeal', 'zeal@123', 'zeal@123', 'zeal@gmail.com', '8523641789', '472773'),
('Tanisha', 'tanisha456', 'tanisha456', 'tanishabhatt68@gmail.com', '7400354807', '309300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist_account`
--
ALTER TABLE `artist_account`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
