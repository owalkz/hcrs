-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 09:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applications`
--

CREATE TABLE `tbl_applications` (
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `caretaker_id` int(11) NOT NULL,
  `application_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applications`
--

INSERT INTO `tbl_applications` (`property_id`, `owner_id`, `caretaker_id`, `application_status`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 0),
(2, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caretakers`
--

CREATE TABLE `tbl_caretakers` (
  `caretaker_id` int(11) NOT NULL,
  `caretaker_name` text NOT NULL,
  `email_address` text NOT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `caretaker_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_caretakers`
--

INSERT INTO `tbl_caretakers` (`caretaker_id`, `caretaker_name`, `email_address`, `password`, `location`, `caretaker_status`) VALUES
(1, 'John Berkely', 'jberkely@gmail.com', '12345678', 'Lodwar', 0),
(2, 'Oleksandr Zinchenko', 'achenko@gmail.com', 'abcd', 'Kakamega', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_owners`
--

CREATE TABLE `tbl_home_owners` (
  `owner_id` int(11) NOT NULL,
  `owner_name` text NOT NULL,
  `email_address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_home_owners`
--

INSERT INTO `tbl_home_owners` (`owner_id`, `owner_name`, `email_address`, `password`) VALUES
(1, 'Ilkay Gundogan', 'igundogan@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_properties`
--

CREATE TABLE `tbl_properties` (
  `property_id` int(11) NOT NULL,
  `property_name` text NOT NULL,
  `property_size` int(20) NOT NULL,
  `property_owner` int(11) NOT NULL,
  `property_location` text NOT NULL,
  `property_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_properties`
--

INSERT INTO `tbl_properties` (`property_id`, `property_name`, `property_size`, `property_owner`, `property_location`, `property_status`) VALUES
(1, 'Dairy Farm', 2, 1, 'Nyeri', 1),
(2, 'PropA', 5, 1, 'Kiambu', 0),
(3, 'Gundogans Farm', 2, 1, 'Busia', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD PRIMARY KEY (`property_id`,`owner_id`,`caretaker_id`);

--
-- Indexes for table `tbl_caretakers`
--
ALTER TABLE `tbl_caretakers`
  ADD PRIMARY KEY (`caretaker_id`);

--
-- Indexes for table `tbl_home_owners`
--
ALTER TABLE `tbl_home_owners`
  ADD PRIMARY KEY (`owner_id`),
  ADD UNIQUE KEY `owner_id` (`owner_id`);

--
-- Indexes for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_owner_constraint` (`property_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_caretakers`
--
ALTER TABLE `tbl_caretakers`
  MODIFY `caretaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_home_owners`
--
ALTER TABLE `tbl_home_owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD CONSTRAINT `caretaker_constraint` FOREIGN KEY (`caretaker_id`) REFERENCES `tbl_caretakers` (`caretaker_id`),
  ADD CONSTRAINT `property_constraint` FOREIGN KEY (`property_id`) REFERENCES `tbl_properties` (`property_id`);

--
-- Constraints for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  ADD CONSTRAINT `property_owner_constraint` FOREIGN KEY (`property_owner`) REFERENCES `tbl_home_owners` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
