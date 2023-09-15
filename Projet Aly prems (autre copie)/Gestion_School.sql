-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 08 juin 2023 à 18:28
-- Version du serveur : 8.0.33-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Gestion School`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`username`, `password`) VALUES
('elzo', 'domerame');

-- --------------------------------------------------------

--
-- Structure de la table `Annees_Scolaires`
--

CREATE TABLE `Annees_Scolaires` (
  `id_annee_scolaire` int NOT NULL,
  `annee_scolaire` varchar(9) DEFAULT NULL,
  `actif` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Annees_Scolaires`
--

INSERT INTO `Annees_Scolaires` (`id_annee_scolaire`, `annee_scolaire`, `actif`) VALUES
(6, '2020-2021', 'non'),
(7, '2021-2022', 'non'),
(8, '2022-2023', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `Classes`
--

CREATE TABLE `Classes` (
  `id_classe` int NOT NULL,
  `nom_classe` varchar(50) NOT NULL,
  `id_niveau` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Classes`
--

INSERT INTO `Classes` (`id_classe`, `nom_classe`, `id_niveau`) VALUES
(1, 'CI A', 1),
(2, 'CP', 1),
(3, 'CE1', 1),
(4, 'CE2', 1),
(5, 'CM1', 1),
(6, 'CM2 A', 1),
(7, '6e', 2),
(8, '5e', 2),
(9, '4e', 2),
(10, '3e', 2),
(11, '2nd', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ClassesDisciplines`
--

CREATE TABLE `ClassesDisciplines` (
  `id_classe` int NOT NULL,
  `id_discipline` int NOT NULL,
  `ressource` int DEFAULT '10',
  `examen` int DEFAULT '20',
  `id_annee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Discipline`
--

CREATE TABLE `Discipline` (
  `id_discipline` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_groupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Eleves`
--

CREATE TABLE `Eleves` (
  `id` int NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(20) NOT NULL,
  `date_born` varchar(20) NOT NULL,
  `lieu_born` varchar(30) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `type_eleve` enum('Interne','Externe') NOT NULL,
  `sexe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Groupe_Disciplines`
--

CREATE TABLE `Groupe_Disciplines` (
  `id_groupe` int NOT NULL,
  `libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Inscription`
--

CREATE TABLE `Inscription` (
  `id_inscription` int NOT NULL,
  `id_eleve` int NOT NULL,
  `id_niveau` int NOT NULL,
  `id_classe` int NOT NULL,
  `id_annee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Niveaux`
--

CREATE TABLE `Niveaux` (
  `id_niveau` int NOT NULL,
  `nom_niveau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Niveaux`
--

INSERT INTO `Niveaux` (`id_niveau`, `nom_niveau`) VALUES
(1, 'Primaire'),
(2, 'Collège'),
(3, 'Lycée');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Annees_Scolaires`
--
ALTER TABLE `Annees_Scolaires`
  ADD PRIMARY KEY (`id_annee_scolaire`);

--
-- Index pour la table `Classes`
--
ALTER TABLE `Classes`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `niveau` (`id_niveau`);

--
-- Index pour la table `ClassesDisciplines`
--
ALTER TABLE `ClassesDisciplines`
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_discipline` (`id_discipline`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Index pour la table `Discipline`
--
ALTER TABLE `Discipline`
  ADD PRIMARY KEY (`id_discipline`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Index pour la table `Eleves`
--
ALTER TABLE `Eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Groupe_Disciplines`
--
ALTER TABLE `Groupe_Disciplines`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `Inscription`
--
ALTER TABLE `Inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_annee` (`id_annee`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_niveau` (`id_niveau`);

--
-- Index pour la table `Niveaux`
--
ALTER TABLE `Niveaux`
  ADD PRIMARY KEY (`id_niveau`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Annees_Scolaires`
--
ALTER TABLE `Annees_Scolaires`
  MODIFY `id_annee_scolaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Classes`
--
ALTER TABLE `Classes`
  MODIFY `id_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Discipline`
--
ALTER TABLE `Discipline`
  MODIFY `id_discipline` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Eleves`
--
ALTER TABLE `Eleves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Groupe_Disciplines`
--
ALTER TABLE `Groupe_Disciplines`
  MODIFY `id_groupe` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Inscription`
--
ALTER TABLE `Inscription`
  MODIFY `id_inscription` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Niveaux`
--
ALTER TABLE `Niveaux`
  MODIFY `id_niveau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Classes`
--
ALTER TABLE `Classes`
  ADD CONSTRAINT `Classes_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `Niveaux` (`id_niveau`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `ClassesDisciplines`
--
ALTER TABLE `ClassesDisciplines`
  ADD CONSTRAINT `ClassesDisciplines_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `Classes` (`id_classe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ClassesDisciplines_ibfk_2` FOREIGN KEY (`id_discipline`) REFERENCES `Discipline` (`id_discipline`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ClassesDisciplines_ibfk_3` FOREIGN KEY (`id_annee`) REFERENCES `Annees_Scolaires` (`id_annee_scolaire`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Discipline`
--
ALTER TABLE `Discipline`
  ADD CONSTRAINT `Discipline_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `Groupe_Disciplines` (`id_groupe`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Inscription`
--
ALTER TABLE `Inscription`
  ADD CONSTRAINT `Inscription_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `Annees_Scolaires` (`id_annee_scolaire`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Inscription_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `Classes` (`id_classe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Inscription_ibfk_3` FOREIGN KEY (`id_eleve`) REFERENCES `Eleves` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Inscription_ibfk_4` FOREIGN KEY (`id_niveau`) REFERENCES `Niveaux` (`id_niveau`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
