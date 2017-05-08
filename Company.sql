-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2017 at 09:12 AM
-- Server version: 5.7.17-0ubuntu0.16.10.1
-- PHP Version: 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `company`
--
create database company;
use company;
-- --------------------------------------------------------

--
-- Table structure for table `EmpApp`
--

CREATE TABLE `EmpApp` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `position` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `web` varchar(200) NOT NULL,
  `salary` int(7) NOT NULL,
  `hobbies` varchar(150) NOT NULL,
  `relocate` tinyint(1) NOT NULL,
  `reasons` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `rate` int(2) NOT NULL,
  `opinion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `idUser`, `rate`, `opinion`) VALUES
(1, 1, 5, 'desc1'),
(2, 2, 4, 'desc2'),
(3, 1, 3, 'desc3'),
(4, 3, 2, 'desc4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname1` varchar(150) NOT NULL,
  `nick` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `rol` varchar(40) NOT NULL,
  `address` varchar(150) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mail` varchar(150) NOT NULL,
  `birthDate` varchar(150) NOT NULL,
  `entryDate` varchar(150) NOT NULL,
  `dropOutDate` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname1`, `nick`, `password`, `rol`, `address`, `telephone`, `mail`, `birthDate`, `entryDate`, `dropOutDate`, `active`, `image`) VALUES
(1, 'Jhon', 'Peterson', 'user1', '123456', 'user', 'Address1', 933333333, 'r1@r.com', '1975-01-01', '2014-01-01', '0000-00-00', 1, 'images/usersImages/user1.jpeg'),
(2, 'Jhon1', 'Peterson1', 'user2', '123456', 'admin', 'Address2', 933333333, 'r2@r.com', '1975-01-01', '2014-01-01', '0000-00-00', 1, 'images/usersImages/user2.jpeg'),
(3, 'Jhon2', 'Peterson2', 'user3', '123456', 'user', 'Address3', 933333333, 'r3@r.com', '1975-01-01', '2014-01-01', '0000-00-00', 1, 'images/usersImages/user3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EmpApp`
--
ALTER TABLE `EmpApp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EmpApp`
--
ALTER TABLE `EmpApp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `EmpApp`
--
ALTER TABLE `EmpApp`
  ADD CONSTRAINT `FK_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;
