-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 08 fév. 2022 à 16:33
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `notes_gagnonannie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `code`, `titre`, `icone`) VALUES
(1, '420-2A4-VI', 'Développement Web 1', 'fas fa-keyboard'),
(2, '420-2A6-VI', 'Programmation 2', 'fas fa-laptop'),
(3, '420-2B4-VI', 'Bases de données 1', 'fas fa-database'),
(4, '420-2D4-VI', 'Support technique', 'fas fa-phone'),
(5, '420-2C4-VI', 'Réseautique', 'fas fa-server'),
(6, '601-101-MQ', 'Écriture et littérature', 'fas fa-book'),
(7, 'ANG-FGC-R4', 'Anglais Formation générale commune', 'fas fa-headphones');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calendrier` datetime DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `resultat` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `cours_id`, `titre`, `calendrier`, `ponderation`, `resultat`) VALUES
(1, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(2, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(3, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(4, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(5, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(6, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(7, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(8, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(9, 1, 'Examen 1', '2022-02-25 10:15:00', '25.00', NULL),
(10, 2, 'Examen 1', '2022-02-21 13:15:00', '10.00', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_cours` (`cours_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_cours` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;