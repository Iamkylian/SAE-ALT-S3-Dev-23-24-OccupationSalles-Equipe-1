-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 10 jan. 2024 à 09:45
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
(29, 'AM107-26', 'E003', 0, 'E');

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
  `illumination` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Index pour les tables déchargées
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Donnes`
--
ALTER TABLE `Donnes`
  ADD CONSTRAINT `Donnes_fk_idDevice` FOREIGN KEY (`idDevice`) REFERENCES `Device` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
