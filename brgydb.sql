-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 10:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `auth_type` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `address`, `birthday`, `gender`, `contactnum`, `auth_type`) VALUES
(1, 'steph@gmail.com', 'pass', 'Stephanie Rivera', 'Ligid, Tipas, Taguig City', '2000-07-18', 'Female', '09112304912', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date_submitted` datetime NOT NULL DEFAULT current_timestamp(),
  `state_condition` text NOT NULL,
  `apt_date` date NOT NULL,
  `apt_time` varchar(100) NOT NULL,
  `apt_action` varchar(100) DEFAULT NULL,
  `action_date` varchar(100) DEFAULT NULL,
  `action_remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `date_submitted`, `state_condition`, `apt_date`, `apt_time`, `apt_action`, `action_date`, `action_remarks`) VALUES
(1, 1, '2021-09-12 12:57:04', 'Covid', '2021-09-22', '14:30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL DEFAULT 'Doctor',
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `unique_id`, `email`, `password`, `name`, `address`, `birthday`, `gender`, `contactnum`, `specialization`, `auth_type`, `status`) VALUES
(1, 0, 'jaj@gmail.com', '123', 'Zee Kae', '#00-D Trinidad Lontoc St. Calzada, Tipas', '1998-04-17', 'Female', '09438285735', 'Dentist', 'Doctor', ''),
(5, 1182677226, 'basil.darrow@email.com', 'basilleaf', 'Basil Darrow', 'Buting, Pasig City', '1989-06-12', 'Male', '09161234567', 'Pediatrician', 'Doctor', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reg`
--

CREATE TABLE `doctor_reg` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL DEFAULT 'Doctor',
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `auth_type` varchar(255) NOT NULL DEFAULT 'Patient',
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `unique_id`, `email`, `password`, `name`, `address`, `birthday`, `gender`, `contactnum`, `auth_type`, `status`) VALUES
(1, 0, 'avila.zyrah@gmail.com', '123', 'Zyrah Avila', '#00-D Trinidad Lontoc St. Calzada, Tipas', '2000-07-08', 'Female', '09438285735', 'Patient', ''),
(5, 193619935, 'maisie.mutton@email.com', 'cornsheep', 'Maisie Mutton', 'A. Mabini Campus, Anonas Street, Santa Mesa, Maynila', '2000-02-29', 'Female', '09391234567', 'Patient', 'Active now'),
(6, 311234403, 'camellia.darrow@email.com', 'pinktiger', 'Camellia Darrow', 'Buting, Pasig City', '1989-06-12', 'Female', '09291234567', 'Patient', 'Active now');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment patient` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
