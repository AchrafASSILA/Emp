-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 juin 2022 à 17:26
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leave_staff`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`emp_id`, `FirstName`, `LastName`, `UserName`, `Password`, `Gender`, `Dob`, `Address`, `Phonenumber`, `Status`, `location`) VALUES
(1, 'achraf', 'assila', 'achrafassila', '12345', 'Male', '31 01 2022', 'maroc casa', '0634328147', 1, 'NO-IMAGE-AVAILABLE.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `CreationDate`) VALUES
(12, 'E-marketing', 'E-m', '2022-05-29 19:18:08');

-- --------------------------------------------------------

--
-- Structure de la table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `start_job` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Gender`, `Dob`, `Department`, `Address`, `Phonenumber`, `Status`, `RegDate`, `role`, `location`, `salary`, `start_job`) VALUES
(21, 'taha', 'assila', 'taha@gmail.com', 'male', '01 June 2022', 'E-m', 'casa', '0634328148', 1, '2022-06-01 11:53:11', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '4000', '14 February 1999'),
(22, 'ali', 'berrada', 'ali@gmail.com', 'male', '12 February 1997', 'E-m', 'rabat', '0745326188', 1, '2022-06-01 12:04:03', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '7500', '01 June 2022'),
(23, 'mahdi', 'nachi', 'mahdi@gmail.com', 'male', '01 June 2022', 'E-m', 'casa', '06543215', 1, '2022-06-01 12:05:02', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '3000', '31 May 2022'),
(26, 'mohammed', 'alamis', 'alami.mohamed@gmail.com', 'male', '08 February 1984', 'E-m', 'maroc casa ', '0634328147', 1, '2022-06-01 15:16:00', 'Head', 'NO-IMAGE-AVAILABLE.jpg', '40000', '09 February 1994');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
