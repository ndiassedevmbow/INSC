-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 oct. 2023 à 22:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insc`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscript`
--

CREATE TABLE `inscript` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `code_confirmation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscript`
--

INSERT INTO `inscript` (`id`, `fullName`, `email`, `psw`, `code_confirmation`) VALUES
(1, '11111111111111', 'ndiasse.mbow@uvs.edu.sn', '$2y$10$2wKZWhzYk4CYkkiOVg82tO/A0Zq6UBtYTWn6wh.j0RgiMvOZKQYiK', ''),
(2, '11111111111111ff', 'ndiassedevmbow@gmail.com', '$2y$10$CVodH9vsxu5LWwUmyQ4lGuMHgmdtAUcX2O2jY8bXedAXAk9LXSvOW', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscript`
--
ALTER TABLE `inscript`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscript`
--
ALTER TABLE `inscript`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
