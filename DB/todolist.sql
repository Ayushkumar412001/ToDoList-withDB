-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Apr 01, 2022 at 01:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `sno` int(11) NOT NULL,
  `task` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_name`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'Ayush Kumar', 'ayush8987408380@gmail.com', '$2y$10$4woKLFnPHAEo/IgDL8J43e4jbDYWrf9cVwlJBVTFuk8sm3dBPr9ei', '2021-12-03 18:23:08'),
(2, 'reshu', 'ayushkumar412001@gmail.com', '$2y$10$UQYyQzww1kfnnJ30V./oN.no6CCG5EMX/rl5D2F.qxci/RVI3PLEi', '2021-12-03 18:27:50'),
(3, 'Aman', 'aman34@gmail.com', '$2y$10$UbG7jPTuCQeSflIMjzvNJ.RztSH0DxZ/9h1pYyb4omnQ1On0eW28q', '2021-12-04 17:36:00'),
(4, 'Sneha', 'snehasharma@gmail.com', '$2y$10$WiPL7ca15odm1sT4xyz/nerZ1JVlhylNdgmHuC8Vk4HS4tDW/IV3C', '2021-12-05 11:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
