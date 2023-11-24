-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2023 at 11:18 PM
-- Server version: 8.0.35-0ubuntu0.20.04.1
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `idp` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `about` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idp`, `nom`, `prenom`, `about`, `photo`) VALUES
(2, 'Bob', 'Johnson', 'UX Designer', 'https://www.google.com/images/Bob.jpg'),
(3, 'Eva', 'Williams', 'Data Scientist', 'https://www.google.com/images/Eva.jpg'),
(4, 'Mike', 'Brown', 'Project Manager', 'https://www.google.com/images/Mike.jpg'),
(5, 'Sophie', 'Miller', 'Marketing Specialist', 'https://www.google.com/images/Sophie.jpg'),
(6, 'Chris', 'Davis', 'Mobile Developer', 'https://www.google.com/images/Chris.jpg'),
(7, 'Olivia', 'Jones', 'UI Designer', 'https://www.google.com/images/Olivia.jpg'),
(8, 'Daniel', 'Taylor', 'Frontend Developer', 'https://www.google.com/images/Daniel.jpg'),
(11, 'bobo', 'Johnson', 'UX Designer', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `idp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
