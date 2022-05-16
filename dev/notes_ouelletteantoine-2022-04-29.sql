-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 avr. 2022 à 13:50
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `notes_ouelletteantoine`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courriel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `nom`, `courriel`, `sujet`, `message`) VALUES
(1, 'Paul', 'paul@yahoo.ca', 'Hello World', 'Hello World!'),
(2, 'Jean', 'jean@yahoo.ca', 'Hey', 'Bonjour!');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
(7, 'ANG-FGC-R4', 'Anglais', 'fas fa-headphones');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int NOT NULL,
  `cours_id` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure de la table `formatifs`
--

CREATE TABLE `formatifs` (
  `id` int NOT NULL,
  `cours_id` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateevaluation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formatifs`
--

INSERT INTO `formatifs` (`id`, `cours_id`, `titre`, `dateevaluation`) VALUES
(1, 1, 'Formatif pour l\'examen 1', '2022-02-08 13:15:00'),
(2, 2, 'Test de connaissances', '2022-01-26 10:15:00'),
(3, 1, 'Quizz semaine 5', '2022-02-21 13:15:00'),
(4, 2, 'Formatif examen 1', '2022-02-17 10:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `periodes`
--

CREATE TABLE `periodes` (
  `id` int NOT NULL,
  `cours_id` int NOT NULL,
  `jour` int NOT NULL,
  `heuredebut` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `heurefin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `periodes`
--

INSERT INTO `periodes` (`id`, `cours_id`, `jour`, `heuredebut`, `heurefin`) VALUES
(1, 1, 1, '08:15', '10:05');

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nomfamille` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dernieracces` datetime DEFAULT NULL,
  `actif` tinyint(1) NOT NULL,
  `estadmin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `usagers`
--

INSERT INTO `usagers` (`id`, `code`, `prenom`, `nomfamille`, `courriel`, `motdepasse`, `photo`, `dernieracces`, `actif`, `estadmin`) VALUES
(1, '1234', 'mononcle', 'miguel', 'mononcle_miguel@hotmail.com', '$2y$10$t0/BFiOFo93JyfEWPwIK5ec5WlZy4ODf.gjH1VCs7LKMjpd.BvnMO', NULL, '2022-04-29 00:39:26', 1, 0);

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
-- Index pour la table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usagers_code_unique` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
