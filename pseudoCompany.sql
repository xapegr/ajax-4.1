-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2013 at 02:54 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5



--
-- Database: `videoClub`
--

CREATE DATABASE `company`;

USE `company`;

-- --------------------------------------------------------

--
-- Table structure for table `filmTypes`
--

--
-- Dumping data for table `filmTypes`


-- --------------------------------------------------------

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Table structure for table `EmpApp`
--

CREATE TABLE IF NOT EXISTS `EmpApp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `position` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `web` varchar(200) NOT NULL,
  `hobbies` varchar(150) NOT NULL,
  `relocate`  BOOLEAN NOT NULL,
  `reasons`  varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `films`
--
--TODO CHANGE that
INSERT INTO `EmpApp` (`id`, `idUser`, `position`, `startDate`, `web`, `hobbies`, `relocate`, `reasons`) VALUES
(1, 4, "CEO", '12/11/99', "http", 'sing', true, "none"),
(2, 3, "CEE", '12/11/99', "", 'dance', false, true),
(3, 1, "CCOO", '12/11/99', "", 'stop cars in road', false, "making better myself"),
(4, 4, "Syn", '12/11/99', "", 'jump', false, "false"),
(5, 1, "fountain", '12/11/99', "", 'talk', false, "nothing"),
(6, 2, "Boss", '12/11/99', "", 'draw', true, "im the best");


--
-- Table structure for table `clients`
--



--
-- Dumping data for table `clients`
--

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `surname1` varchar(150) NOT NULL,
  `nick` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `rol` varchar(40) NOT NULL,
  `address` varchar(150) NOT NULL,
  `telephone` int(11),
  `mail` varchar(150) NOT NULL,
  `birthDate` varchar(150) NOT NULL,
  `entryDate` varchar(150) NOT NULL,
  `dropOutDate` varchar(150) NOT NULL,
  `active` boolean NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `surname1`, `nick`, `password`,`rol`, `address`, `telephone`, `mail`, `birthDate`, `entryDate`, `dropOutDate`, `active`, `image`) VALUES
(1, 'Jhon', 'Peterson', 'user1', '123456','user', 'Address1', 933333333, 'r1@r.com', '1975-01-01', '2014-01-01', '0000-00-00', true, 'images/usersImages/user1.jpeg'),
(2, 'Jhon1', 'Peterson1', 'user2', '123456','admin','Address2', 933333333, 'r2@r.com', '1975-01-01', '2014-01-01', '0000-00-00', true, 'images/usersImages/user2.jpeg'),
(3, 'Jhon2', 'Peterson2', 'user3', '123456','user', 'Address3', 933333333, 'r3@r.com', '1975-01-01', '2014-01-01', '0000-00-00', true, 'images/usersImages/user3.jpeg');



--
-- Table structure for table `renting`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `rate` int(2) NOT NULL,
  `opinion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

--
-- Dumping data for table `renting`
--

INSERT INTO `review` (`id`, `idUser`, `rate`, `opinion`) VALUES
(1, 1,5,'desc1'),
(2, 2,4,'desc2'),
(3, 1,3,'desc3'),
(4, 3,2,'desc4');
--
-- Constraints for dumped tables
--

--
-- Constraints for table `films`
--
ALTER TABLE `EmpApp`
	ADD CONSTRAINT `FK_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;
