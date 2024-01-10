-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 10 jan. 2024 à 08:54
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
  `room` varchar(10) NOT NULL,
  `floor` int NOT NULL,
  `building` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
