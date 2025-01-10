-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 11:27 PM
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
-- Database: `frost`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `username` varchar(55) NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `etime` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`username`, `eventname`, `edate`, `etime`, `uid`) VALUES
('Admin', 'football', '2025-01-05', '05:05', '677da4f65ba6c'),
('Hazard', 'Christmas Party', '2024-12-25', '12:00', '677da7daafcbc');

-- --------------------------------------------------------

--
-- Table structure for table `chairs`
--

CREATE TABLE `chairs` (
  `seat` varchar(1000) NOT NULL,
  `remain` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chairs`
--

INSERT INTO `chairs` (`seat`, `remain`) VALUES
('100', 0),
('seat', 200);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventitle` varchar(50) NOT NULL,
  `nos` varchar(50) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `etime` varchar(50) NOT NULL,
  `durations` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventitle`, `nos`, `edate`, `etime`, `durations`, `eid`) VALUES
('MARKET', '20', 'TUE', '12:30AM', '2', '2'),
('ceremony', '40', '20', '20:30', '4', '4'),
('Toyosi wedding', '500', '2024-12-31', '09:09', '5hr', '6760b93970deb'),
('Christmas Party', '10', '2024-12-25', '12:00', '4rh', '6760ba4ba9af4'),
('Bithday', '200', '2024-12-16', '04:04', '4', '6760c2904c80e'),
('football', '2', '2025-01-05', '05:05', '2hr', '677da91e10be1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password0` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `username`, `email`, `password0`, `uid`) VALUES
('micheal', 'micheal', 'micheal', 'micheal', ''),
('Oluwayinka Michael ', 'Marcxenstein ', 'oluwayinkamicheal@outlook.com', '1234', '6760b891932a6'),
('Eden Hazard', 'Hazard', 'Hazard', 'Hazard', '6760bdfd7e425'),
('Z', 'Z', 'Z', 'Z', '6760bfa6b1d95'),
('Seedhub', 'Seedhub', 'Seedhub', 'Seedhub', '6760c1a6a9ad9'),
('ben', 'ben', 'ben', 'ben', '6760cabd65e5c'),
('Administrator', 'Admin', 'admin@yahoo.com', 'Admin', '677da26c682f1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
