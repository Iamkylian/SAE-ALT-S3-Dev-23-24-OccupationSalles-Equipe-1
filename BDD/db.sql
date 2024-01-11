-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 11 jan. 2024 à 15:51
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `capteursDB`
--
CREATE DATABASE IF NOT EXISTS `capteursDB` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `capteursDB`;

-- --------------------------------------------------------

--
-- Structure de la table `Battery`
--

CREATE TABLE `Battery` (
  `deviceId` int NOT NULL,
  `batteryLevel` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `Device`
--

CREATE TABLE `Device` (
  `id` int NOT NULL,
  `deviceName` varchar(50) NOT NULL,
  `room` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `floor` int NOT NULL,
  `building` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Device`
--

INSERT INTO `Device` (`id`, `deviceName`, `room`, `floor`, `building`) VALUES
(12, 'AM107-43', 'Salle-conseil', 1, 'A'),
(13, 'AM107-16', 'B109', 1, 'B'),
(14, 'AM107-31', 'E101', 1, 'E'),
(15, 'AM107-3', 'B111', 1, 'B'),
(16, 'AM107-42', 'E210', 2, 'E'),
(17, 'AM107-2', 'B110', 1, 'B'),
(18, 'AM107-37', 'E100', 1, 'E'),
(19, 'AM107-30', 'E007', 0, 'E'),
(20, 'AM107-6', 'B203', 2, 'B'),
(21, 'AM107-9', 'B003', 0, 'B'),
(22, 'AM107-15', 'B108', 1, 'B'),
(23, 'AM107-29', 'E006', 0, 'E'),
(24, 'AM107-23', 'C004', 0, 'C'),
(25, 'AM107-28', 'E001', 0, 'E'),
(26, 'AM107-5', 'B202', 2, 'B'),
(27, 'AM107-27', 'E004', 0, 'E'),
(28, 'AM107-24', 'C006', 0, 'C'),
(29, 'AM107-26', 'E003', 0, 'E'),
(30, 'AM107-41', 'E207', 2, 'E'),
(31, 'AM107-32', 'E102', 1, 'E'),
(32, 'AM107-33', 'E103', 1, 'E'),
(33, 'AM107-18', 'B113', 1, 'B'),
(34, 'AM107-12', 'B103', 1, 'B'),
(35, 'AM107-20', 'B217', 2, 'B'),
(36, 'AM107-19', 'B212', 2, 'B'),
(37, 'AM107-40', 'E206', 2, 'E'),
(38, 'AM107-35', 'E105', 1, 'E'),
(39, 'AM107-17', 'B112', 1, 'B'),
(40, 'AM107-38', 'E208', 2, 'E'),
(41, 'AM107-49', 'hall-entrée-principale', 0, 'A'),
(42, 'AM107-34', 'E104', 1, 'E');

-- --------------------------------------------------------

--
-- Structure de la table `Donnes`
--

CREATE TABLE `Donnes` (
  `idDevice` int NOT NULL,
  `temperature` decimal(10,0) NOT NULL,
  `humidity` decimal(10,0) NOT NULL,
  `activity` int NOT NULL,
  `co2` int NOT NULL,
  `tvoc` int NOT NULL,
  `illumination` int NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Donnes`
--

INSERT INTO `Donnes` (`idDevice`, `temperature`, `humidity`, `activity`, `co2`, `tvoc`, `illumination`, `time`) VALUES
(24, 19, 41, 0, 1255, 283, 2, '2024-01-11 09:53:43'),
(25, 17, 42, 245, 699, 346, 60, '2024-01-11 09:54:37'),
(26, 20, 35, 0, 589, 78, 2, '2024-01-11 09:54:44'),
(27, 17, 39, 0, 544, 315, 27, '2024-01-11 09:54:44'),
(28, 18, 37, 38, 665, 125, 123, '2024-01-11 09:54:44'),
(29, 17, 42, 266, 1109, 570, 67, '2024-01-11 09:55:14'),
(20, 20, 37, 0, 697, 137, 2, '2024-01-11 16:10:14'),
(21, 22, 33, 230, 657, 179, 9, '2024-01-11 16:10:45'),
(22, 20, 34, 0, 748, 123, 2, '2024-01-11 16:12:16'),
(23, 18, 35, 0, 446, 193, 26, '2024-01-11 16:13:25'),
(24, 19, 38, 0, 651, 142, 4, '2024-01-11 16:13:41'),
(30, 19, 34, 0, 524, 211, 191, '2024-01-11 16:16:41'),
(32, 20, 36, 198, 906, 371, 50, '2024-01-11 16:16:44'),
(33, 21, 39, 0, 1160, 203, 3, '2024-01-11 16:17:10'),
(34, 22, 32, 0, 2085, 174, 0, '2024-01-11 16:17:13'),
(35, 19, 38, 0, 686, 200, 4, '2024-01-11 16:17:15'),
(36, 18, 41, 0, 728, 207, 42, '2024-01-11 16:17:16'),
(37, 20, 33, 0, 480, 381, 1, '2024-01-11 16:38:41'),
(38, 20, 34, 0, 695, 235, 2, '2024-01-11 16:38:41'),
(39, 20, 33, 0, 436, 151, 4, '2024-01-11 16:38:42'),
(30, 19, 34, 0, 513, 207, 113, '2024-01-11 15:46:42'),
(32, 19, 37, 95, 815, 341, 39, '2024-01-11 15:46:44'),
(40, 19, 35, 0, 537, 281, 4, '2024-01-11 15:48:17'),
(41, 21, 31, 6, 500, 170, 12, '2024-01-11 15:48:28'),
(42, 20, 34, 23, 623, 234, 15, '2024-01-11 15:49:11'),
(12, 23, 29, 0, 567, 244, 30, '2024-01-11 15:49:38'),
(15, 21, 33, 0, 493, 160, 8, '2024-01-11 15:49:40'),
(14, 20, 36, 38, 1010, 1063, 6, '2024-01-11 15:49:41'),
(13, 17, 37, 0, 516, 76, 9, '2024-01-11 15:49:41'),
(17, 20, 34, 0, 528, 272, 7, '2024-01-11 15:49:44'),
(16, 9, 65, 0, 554, 845, 45, '2024-01-11 15:49:46'),
(17, 20, 34, 0, 528, 272, 7, '2024-01-11 15:49:46'),
(18, 25, 26, 0, 701, 107, 34, '2024-01-11 15:49:54'),
(19, 18, 36, 0, 546, 217, 9, '2024-01-11 15:49:58'),
(20, 20, 36, 0, 664, 135, 1, '2024-01-11 15:50:14'),
(21, 22, 35, 240, 1035, 245, 41, '2024-01-11 15:50:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Battery`
--
ALTER TABLE `Battery`
  ADD KEY `Battery_fk_deviceId` (`deviceId`);

--
-- Index pour la table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Donnes`
--
ALTER TABLE `Donnes`
  ADD KEY `Donnes_fk_idDevice` (`idDevice`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Device`
--
ALTER TABLE `Device`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Battery`
--
ALTER TABLE `Battery`
  ADD CONSTRAINT `Battery_fk_deviceId` FOREIGN KEY (`deviceId`) REFERENCES `Device` (`id`);

--
-- Contraintes pour la table `Donnes`
--
ALTER TABLE `Donnes`
  ADD CONSTRAINT `Donnes_fk_idDevice` FOREIGN KEY (`idDevice`) REFERENCES `Device` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
