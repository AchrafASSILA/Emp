-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 juin 2022 à 20:29
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
-- Base de données : `emp`
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
(1, 'admin', ' ', 'achrafassila', '12345', 'Male', '31 January 2002', 'maroc casa', '0634328147', 1, 'NO-IMAGE-AVAILABLE.jpg');

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
(12, 'E-marketing', 'E-m', '2022-05-29 19:18:08'),
(13, 'Dev Web', 'DW', '2022-06-01 17:25:59'),
(14, 'Finance et Quentabilte', 'FQ', '2022-06-01 21:10:36');

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
(26, 'mohammed', 'alami', 'alami.mohamed@gmail.com', 'male', '08 February 1984', 'E-m', 'maroc casablanca el maarif', '0676895342', 1, '2022-06-01 15:16:00', 'Head', 'NO-IMAGE-AVAILABLE.jpg', '12000', '03 February 2010'),
(27, 'mustapha ', 'assila', 'mustapha.as@gmail.com', 'male', '18 February 1980', 'DW', 'maroc casa Hay el massira', '0734552198', 1, '2022-06-02 18:46:03', 'Head', 'NO-IMAGE-AVAILABLE.jpg', '15000', '02 February 2011'),
(28, 'laila', 'slami', 'lailaslami234@gmail.com', 'female', '13 May 1990', 'FQ', 'maroc casa anfa', '0752617899', 1, '2022-06-02 18:51:07', 'Head', 'NO-IMAGE-AVAILABLE.jpg', '9000', '12 May 2013'),
(29, 'anas', 'saber', 'anas.ue2098@gmail.com', 'male', '21 May 1997', 'E-m', 'maroc casa derb soultan', '0677329187', 1, '2022-06-02 19:27:41', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '6000', '15 July 2020'),
(30, 'achraf', 'elwasta', 'achraf.el@gmail.com', 'male', '17 February 1999', 'E-m', 'maroc casablanca hay rajaa', '0654129876', 1, '2022-06-02 19:29:14', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '7500', '07 March 2021'),
(31, 'sanaa', 'halimi', 'sanaahalimi1999@gmail.com', 'female', '22 October 1998', 'DW', 'maroc casa elbernoussi', '0754663241', 1, '2022-06-02 19:31:04', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '7000', '15 July 2019'),
(32, 'mahdi', 'benalla', 'mahdi.ben1996@gmail.com', 'male', '12 August 1996', 'DW', 'maroc casa nour city', '0754662134', 1, '2022-06-03 11:18:58', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '4000', '08 April 2020'),
(33, 'souad', 'motaki', 'souad2000@gmail.com', 'female', '02 February 2000', 'FQ', 'maroc casa centre ville', '0750942134', 1, '2022-06-03 11:47:53', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '5500', '19 May 2019'),
(34, 'hanaa', 'latifi', 'hanaalatifi777@gmail.com', 'female', '10 September 1995', 'FQ', 'maroc casa hay mohhamadi', '07654388760', 1, '2022-06-03 11:52:07', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '7500', '23 July 2015'),
(35, 'mohammed', 'kamal', 'kamal9987@gmail.com', 'male', '09 May 1999', 'E-m', 'maroc casa hay rajaa', '0754336787', 1, '2022-06-03 15:23:08', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '6500', '12 August 2018'),
(36, 'ali', 'nejjari', 'ali.ue1987@gmail.com', 'male', '16 July 1997', 'E-m', 'casablanca hay al massira', '0643225674', 1, '2022-06-03 15:25:44', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '4000', '08 May 2016'),
(38, 'karim', 'nachiti', 'karimgr@gmail.com', 'male', '13 October 1999', 'E-m', 'maroc casablanca bournazile', '0798325167', 1, '2022-06-04 14:08:01', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '3500', '23 October 2019'),
(39, 'halima', 'saadi', 'halimasaadi@gmail.com', 'female', '10 August 1997', 'E-m', 'maroc casablanca ', '0643237765', 1, '2022-06-04 14:09:11', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '5500', '07 June 2020'),
(40, 'mouad', 'naji', 'mouad.naji@gmail.com', 'male', '14 August 1988', 'DW', 'maroc casablanca', '0645213387', 1, '2022-06-06 15:03:56', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '20000', '16 July 2014');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
