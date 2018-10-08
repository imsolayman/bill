-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 01:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mf_bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `mf_data`
--

CREATE TABLE `mf_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `share` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mf_data`
--

INSERT INTO `mf_data` (`id`, `name`, `share`, `paid`, `due`, `month`, `year`) VALUES
(1, 'Alauddin Abir', 8, 5400, 0, 'July', 2018),
(2, 'Solayman Hossain', 8, 0, 5400, 'July', 2018),
(9, 'Nur Alam', 8, 5400, 0, 'July', 2018),
(10, 'Murad Hossain', 8, 5400, 0, 'July', 2018),
(11, 'Hannan Shahriar', 5, 3375, 0, 'July', 2018),
(12, 'Nabil Chowdhury', 4, 2700, 0, 'July', 2018),
(13, 'Md Alauddin', 4, 2700, 0, 'July', 2018),
(14, 'Zakir Hossain', 3, 2025, 0, 'July', 2018),
(15, 'Abbas Uddin', 6, 4050, 0, 'July', 2018),
(16, 'Anwar Hossain', 2, 1350, 0, 'July', 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mf_data`
--
ALTER TABLE `mf_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mf_data`
--
ALTER TABLE `mf_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
