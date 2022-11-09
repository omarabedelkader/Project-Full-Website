-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 12 mars 2022 à 09:00
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `secondaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Structure de la table `attn`
--

DROP TABLE IF EXISTS `attn`;
CREATE TABLE IF NOT EXISTS `attn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `st_id` int NOT NULL,
  `atten` varchar(50) NOT NULL,
  `at_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attn`
--

INSERT INTO `attn` (`id`, `st_id`, `atten`, `at_date`) VALUES
(246, 12103072, 'present', '2021-12-06'),
(247, 13103072, 'present', '2021-12-06'),
(248, 13203072, 'present', '2021-12-06'),
(249, 14103053, 'absent', '2021-12-06'),
(250, 14203072, 'present', '2021-12-06'),
(251, 1454540, 'present', '2021-12-06'),
(252, 17699619, 'absent', '2021-12-06'),
(253, 12103072, 'absent', '2021-12-14'),
(254, 13103072, 'absent', '2021-12-14'),
(255, 13203072, 'present', '2021-12-14'),
(256, 14103053, 'absent', '2021-12-14'),
(257, 14203072, 'present', '2021-12-14'),
(258, 1454540, 'absent', '2021-12-14'),
(259, 17699619, 'absent', '2021-12-14'),
(260, 12103072, 'absent', '2022-02-08'),
(261, 13103072, 'present', '2022-02-08'),
(262, 13203072, 'absent', '2022-02-08'),
(263, 14103053, 'absent', '2022-02-08'),
(264, 14203072, 'present', '2022-02-08'),
(265, 1454540, 'present', '2022-02-08'),
(266, 17699619, 'absent', '2022-02-08');

-- --------------------------------------------------------

--
-- Structure de la table `at_student`
--

DROP TABLE IF EXISTS `at_student`;
CREATE TABLE IF NOT EXISTS `at_student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `st_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `at_student`
--

INSERT INTO `at_student` (`id`, `name`, `st_id`) VALUES
(29, 'Robert Speer', 12103072),
(30, 'Mariea Moore', 13103072),
(31, 'Pamela A Reed', 13203072),
(32, 'Stephen D Skaggs', 14103053),
(33, 'Evelyn K Ambrose', 14203072),
(34, 'Bruno Den', 1454540),
(35, 'Amy Billington', 17699619);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id`, `username`, `password`, `name`, `email`, `birthday`, `gender`, `education`, `contact`, `address`) VALUES
(1, 'robinson', '202cb962ac59075b964b07152d234b70', 'Terry Robinson', 'terryr@gmail.com', '1986-04-01', 'Male', 'BIT, MIT', 900248750, '3962  Elk Rd Little'),
(2, 'will', '202cb962ac59075b964b07152d234b70', 'Will Williams', 'will@gmail.com', '1985-12-12', 'Male', 'MIT, PhD', 124785450, '3308  Valley Drive');

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` int NOT NULL AUTO_INCREMENT,
  `st_id` int NOT NULL,
  `marks` int NOT NULL,
  `sub` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `result`
--

INSERT INTO `result` (`id`, `st_id`, `marks`, `sub`, `semester`) VALUES
(88, 15103033, 33, 'English', '2nd');

-- --------------------------------------------------------

--
-- Structure de la table `st_info`
--

DROP TABLE IF EXISTS `st_info`;
CREATE TABLE IF NOT EXISTS `st_info` (
  `st_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `st_info`
--

INSERT INTO `st_info` (`st_id`, `name`, `password`, `email`, `bday`, `program`, `contact`, `gender`, `address`, `img`) VALUES
(15103033, 'Sam Wilson', '202cb962ac59075b964b07152d234b70', 'wilsons@mail.com', '1996-08-09', 'MIT', '2145785550', 'Male', '292  Canis Heights Drive', 'C6F031D6-2249-4CDC-B513-DC16D9F2325E.png'),
(15103053, 'Thomas Bryant', '202cb962ac59075b964b07152d234b70', 'thoyant@mail.com', '1996-08-09', 'BIT', '1547854555', 'Male', '1937  Chapmans Lane', ''),
(15103057, 'Timothy Wilcher', '347602146a923872538f3803eb5f3cef', 'timothy@gmail.com', '1996-04-12', 'BIT', '7547854650', 'Male', '3435  Cabell Avenue', '0AD69827-DDEF-485F-8721-E18F29C9A1DE.png'),
(15103058, 'Bruno Den', '202cb962ac59075b964b07152d234b70', 'brunoden@gmail.com', '1996-10-28', 'MIT', '3124578450', 'Male', '919  Winding Way', '94E5BBB2-A0FF-4F19-BA12-C07F0C4C617A.png'),
(16303053, 'Emma Farrell', '202cb962ac59075b964b07152d234b70', 'emmafck6@mail.com', '1996-08-09', 'MIT', '7531598520', 'female', '431  Clover Drive', 'F6417D01-7D58-406A-B781-867ED93BACC0.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
