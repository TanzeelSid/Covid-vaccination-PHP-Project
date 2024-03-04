-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 06:16 PM
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
-- Database: `vc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'admin', 'admin', 'admin.jpg'),
(14, 'Tanzeel', '123', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `vaccine` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_booked` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `firstname`, `lastname`, `email`, `phone`, `appointment_date`, `vaccine`, `status`, `date_booked`) VALUES
(1, 'Bruce', 'Wayne', 'batman@gmail.com', 2147483647, '2024-02-20', 'Covaxin', 'Vaccinated', '2024-02-20 02:12:32'),
(2, 'Bruce', 'Wayne', 'batman@gmail.com', 2147483647, '2024-02-21', 'Pfizer-BioNTech', 'Vaccinated', '2024-02-20 12:56:22'),
(3, 'Tom', 'Bhai', 'tom@gmail.com', 987654321, '2024-02-20', 'Test Covid', 'Vaccinated', '2024-02-20 14:16:31'),
(4, 'Bruce', 'Wayne', 'batman@gmail.com', 2147483647, '2024-02-20', 'Covaxin', 'Vaccinated', '2024-02-20 19:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `data_reg` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `phonenumber` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `firstname`, `lastname`, `email`, `password`, `price`, `data_reg`, `status`, `profile`, `phonenumber`) VALUES
(10, 'Aga Khan', 'Hospital', 'agk@gmail.com', '123', 500, '2024-02-19 11:24:10', 'Approved', 'team-1.jpg', 2147483647),
(11, 'Zia Uddin', 'Hospital', 'zuh@gmail.com', '12345', 0, '2024-02-20 14:11:02', 'Approved', 'team-2.jpg', 199002025),
(12, 'South City', 'Hospital', 'south@gmail.com', '12345', 200, '2024-02-20 20:49:08', 'Approved', 'doctor.jpg', 907650321);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(50) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `patient` varchar(50) NOT NULL,
  `date_vaccination` varchar(50) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `hospital`, `patient`, `date_vaccination`, `amount_paid`, `description`) VALUES
(4, 'Aga Khan', 'Bruce', '2024-02-20 12:00:36', '500', 'have medicines daily'),
(5, 'Aga Khan', 'Bruce', '2024-02-20 13:00:00', '500', 'Good Luck'),
(6, 'Zia Uddin', 'Tom', '2024-02-20 14:19:50', '250', 'You are okay'),
(7, 'Aga Khan', 'Bruce', '2024-02-20 19:15:01', '200', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_reg` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `phonenumber`, `email`, `password`, `date_reg`, `profile`) VALUES
(2, 'Bruce', 'Wayne', 2147483647, 'batman@gmail.com', '123', '2024-02-19 22:06:46', 'batman.jpg'),
(3, 'Tom', 'Bhai', 987654321, 'tom@gmail.com', 'qwe', '2024-02-20 14:15:10', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `date_send` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title`, `message`, `firstname`, `date_send`) VALUES
(1, 'Send Report ', 'the invoice I received is too much ', 'Bruce', '2024-02-19 22:56:12'),
(2, 'Send Report ', 'the invoice I received is too much ', 'Bruce', '2024-02-19 23:08:16'),
(3, 'Send Report ', 'the invoice I received is too much ', 'Bruce', '2024-02-19 23:08:23'),
(4, 'Send Report ', ';D', 'Tom', '2024-02-20 14:18:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
