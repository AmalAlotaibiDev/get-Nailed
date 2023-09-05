-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 02:11 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getnailed_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Ahad', 'a@a.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `id_customer`, `message`) VALUES
(1, 1, 'Nice Website, you are the best'),
(2, 1, 'Feel Free To Contact us With Your Suggestion\r\n'),
(3, 1, 'Tnx For This Site'),
(4, 1, 'Tnx For This Site'),
(5, 1, 'Tnx For This Site');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mobile` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pass`, `mobile`) VALUES
(1, 'Ahad', 'a@a.com', 'a0f1490a20d0211c997b44bc357e1972deab8ae3', 545671234),
(2, 'Taha', 'a@a.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 547864567);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_salon` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_customer`, `id_salon`, `comment`) VALUES
(1, 1, 2, 'So calm and feeling luxurious.'),
(2, 2, 2, 'I can rank it as the best spa in Riyadh, technicans take their time and never rush.'),
(5, 2, 2, 'Great services, very clean, friendly staff.'),
(6, 2, 3, 'Great atmosphere, good vibes, their technicans were so welcoming.'),
(7, 1, 3, 'One of the best spas in Riyadh.'),
(8, 1, 3, 'Interior and service is more than amazing, highly recommended!'),
(9, 1, 4, 'Lovely staff and great service!'),
(10, 1, 4, 'The atmosphere is wonderful.'),
(11, 2, 4, 'Super talented technicans in nail art.'),
(12, 1, 5, 'Loved the massage and scrub treatment.'),
(13, 2, 5, 'Loved the place and atmosphere!'),
(14, 1, 5, 'Very neat and relaxing nail spa, loved how professional the technicans were.');

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

CREATE TABLE `salon` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`id`, `name`, `description`, `logo`, `location`, `mobile`) VALUES
(2, 'Fourspa', 'Four spa has 3 branches around Riyadh city: 1- Diplomatic Quarter 2- Al Aqiq 3- Al Takhasussi They provide many services such as manicure, pedicure and massage.', '738_fourspa.jpg', 'Riyadh', 53),
(3, 'Kafiki', 'Kafiki Spa is a luxury Spa boutique located in Riyadh city. They provide Beauty, Cosmetics and Personal Care.', '297_kafiki.jpg', 'Riyadh', 53),
(4, 'khedab', 'Khedab is a modern spa located in Riyadh city near to Al Narjis neighberhood. \r\nThey specialized in manicure and pedicure services.', '214_khedab.jpg', 'Jadaa', 123),
(5, 'klar', 'Klar Spa is located in Riyadh city. They provide Manicure, Pedicure, Massage, Facial services. In addition they are specialized in nail art.\r\nYou can book you desired services from their website.', '546_klar.jpg', 'Jadaa', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon`
--
ALTER TABLE `salon`
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
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
