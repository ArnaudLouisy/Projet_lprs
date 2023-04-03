-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 avr. 2023 à 12:25
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_lprs`
--

-- --------------------------------------------------------

--
-- Structure de la table `crea_utilisateur`
--

DROP TABLE IF EXISTS `crea_utilisateur`;
CREATE TABLE IF NOT EXISTS `crea_utilisateur` (
  `ref_utilisateur` int NOT NULL,
  `ref_event` int NOT NULL,
  KEY `fk_crea-eleves_utilisateur` (`ref_utilisateur`),
  KEY `fk_crea_eleves_evenement` (`ref_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `nom_event` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` time NOT NULL,
  `nombre_inscrit` int DEFAULT NULL,
  `autorise` bit(1) DEFAULT b'0',
  `ref_salle` int DEFAULT NULL,
  `ref_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `fk_evenement_salle` (`ref_salle`),
  KEY `fk_evenement_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom_event`, `description`, `date`, `heure`, `duree`, `nombre_inscrit`, `autorise`, `ref_salle`, `ref_utilisateur`) VALUES
(1, 'Zeven', 'jus', '2023-01-12', '19:15:00', '01:00:00', 50, b'1', 1, 4),
(2, 'Pomo', 'jeux', '2023-01-21', '19:15:00', '03:10:00', 86, b'1', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `ref_utilisateur` int NOT NULL,
  `ref_event` int NOT NULL,
  KEY `fk_inscription_eleves_utilisateur` (`ref_utilisateur`),
  KEY `fk_inscription_eleves_evenement` (`ref_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`ref_utilisateur`, `ref_event`) VALUES
(4, 2),
(4, 2),
(4, 2),
(4, 2),
(4, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id_logs` int NOT NULL AUTO_INCREMENT,
  `ref_compte` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresse_ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id_logs`),
  KEY `fk_logs_utilisateur` (`ref_compte`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id_logs`, `ref_compte`, `date`, `adresse_ip`) VALUES
(1, 1, '2022-12-25 07:50:52', '::1'),
(2, 1, '2022-12-25 07:52:21', '::1'),
(4, 1, '2022-12-26 02:39:56', '::1'),
(5, 1, '2022-12-26 02:41:08', '::1'),
(8, 1, '2022-12-27 00:05:51', '::1'),
(9, 1, '2022-12-27 00:06:40', '::1'),
(10, 1, '2022-12-27 00:06:53', '::1'),
(11, 1, '2022-12-28 13:05:34', '::1'),
(12, 5, '2022-12-29 01:45:05', '::1'),
(13, 5, '2022-12-29 01:52:07', '::1'),
(14, 5, '2022-12-29 01:56:17', '::1'),
(15, 1, '2022-12-29 02:16:17', '::1'),
(16, 1, '2023-01-01 18:40:18', '::1'),
(17, 1, '2023-01-01 18:40:51', '::1'),
(18, 1, '2023-01-02 13:29:45', '::1'),
(19, 1, '2023-01-02 13:30:17', '::1'),
(20, 5, '2023-01-02 16:49:44', '::1'),
(21, 1, '2023-01-02 17:10:43', '::1'),
(22, 4, '2023-01-02 18:06:42', '::1'),
(23, 4, '2023-01-02 18:10:20', '::1'),
(24, 1, '2023-01-03 09:51:31', '::1'),
(25, 1, '2023-01-03 21:55:27', '::1'),
(26, 1, '2023-01-05 21:51:51', '::1'),
(27, 5, '2023-01-06 21:37:30', '::1'),
(28, 1, '2023-01-07 17:12:12', '::1'),
(29, 1, '2023-01-07 17:15:25', '::1'),
(30, 1, '2023-01-07 17:17:40', '::1'),
(31, 5, '2023-01-07 17:17:56', '::1'),
(32, 5, '2023-01-08 03:59:42', '::1'),
(33, 5, '2023-01-09 00:37:21', '::1'),
(34, 1, '2023-01-09 00:50:29', '::1'),
(35, 5, '2023-01-09 19:22:56', '::1'),
(36, 4, '2023-01-09 19:35:18', '::1'),
(37, 4, '2023-01-09 19:35:34', '::1'),
(38, 4, '2023-01-09 19:35:54', '::1'),
(39, 4, '2023-01-09 19:39:38', '::1'),
(40, 4, '2023-01-09 20:10:13', '::1'),
(41, 4, '2023-01-09 20:14:07', '::1'),
(42, 4, '2023-01-09 21:11:41', '::1'),
(43, 5, '2023-01-09 21:49:12', '::1'),
(44, 4, '2023-01-09 23:02:51', '::1'),
(45, 1, '2023-01-12 21:42:56', '::1'),
(46, 5, '2023-01-12 21:43:21', '::1'),
(47, 5, '2023-01-12 21:43:36', '::1'),
(48, 5, '2023-01-12 21:43:53', '::1'),
(49, 4, '2023-01-12 22:01:43', '::1'),
(50, 5, '2023-01-13 14:58:39', '::1'),
(51, 1, '2023-01-16 10:23:18', '::1'),
(52, 5, '2023-01-16 10:35:44', '::1'),
(53, 1, '2023-01-16 11:04:44', '::1'),
(54, 5, '2023-01-16 12:09:58', '::1'),
(55, 4, '2023-01-16 12:11:08', '::1'),
(56, 1, '2023-01-16 12:12:13', '::1'),
(57, 1, '2023-01-18 16:09:18', '::1'),
(58, 5, '2023-01-18 16:09:41', '::1'),
(59, 4, '2023-01-18 16:25:06', '::1'),
(60, 5, '2023-01-18 16:26:18', '::1'),
(61, 4, '2023-01-18 22:53:43', '::1'),
(62, 4, '2023-01-20 20:58:35', '::1'),
(63, 4, '2023-01-28 14:16:54', '::1'),
(64, 4, '2023-01-28 14:17:06', '::1'),
(65, 4, '2023-02-02 18:15:57', '::1'),
(66, 1, '2023-02-11 12:34:23', '::1'),
(67, 7, '2023-02-11 12:34:43', '::1'),
(68, 1, '2023-02-11 12:35:56', '::1'),
(69, 7, '2023-02-11 12:36:35', '::1'),
(70, 4, '2023-03-08 12:58:42', '::1'),
(71, 4, '2023-03-08 12:58:48', '::1'),
(72, 4, '2023-03-08 12:58:57', '::1'),
(73, 4, '2023-03-08 12:59:05', '::1'),
(74, 7, '2023-03-08 12:59:10', '::1'),
(75, 4, '2023-03-08 13:00:02', '::1'),
(76, 4, '2023-03-08 13:00:16', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id_offre` int NOT NULL AUTO_INCREMENT,
  `titre_offre` varchar(250) NOT NULL,
  `description` varchar(220) NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_contrat` varchar(200) NOT NULL,
  `dure_contrat` int DEFAULT NULL,
  `pourvue` bit(1) DEFAULT b'0',
  `valider` tinyint(1) DEFAULT NULL,
  `ref_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_offre`),
  KEY `fk_offre_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `titre_offre`, `description`, `date_publication`, `type_contrat`, `dure_contrat`, `pourvue`, `valider`, `ref_utilisateur`) VALUES
(1, 'Marketing ', 'Commercial', '2022-12-01 13:24:42', 'CDD', 2, b'0', 1, 4),
(2, 'Web designer', 'Makette', '2023-01-09 23:09:31', 'CDD', 2, b'0', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

DROP TABLE IF EXISTS `postule`;
CREATE TABLE IF NOT EXISTS `postule` (
  `ref_utilisateur` int NOT NULL,
  `ref_offre` int NOT NULL,
  KEY `fk_postule_utilisateur` (`ref_utilisateur`),
  KEY `fk_postule_offre` (`ref_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postule`
--

INSERT INTO `postule` (`ref_utilisateur`, `ref_offre`) VALUES
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `presente`
--

DROP TABLE IF EXISTS `presente`;
CREATE TABLE IF NOT EXISTS `presente` (
  `ref_utilisateur` int NOT NULL,
  `ref_rdv` int NOT NULL,
  KEY `fk_presente_utilisateur` (`ref_utilisateur`),
  KEY `fk_presente_rendez_vous` (`ref_rdv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `ref_offre` int NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `fk_rendez_vous_offre` (`ref_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(250) NOT NULL,
  `nombre_place` int NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `nombre_place`, `adresse`, `cp`, `ville`) VALUES
(1, 'Cinema jack ', 50, '12 Rue Edouard du Coq', '75016', 'Paris'),
(2, 'McAfee', 90, '9 Rue Edouard le Corbusier', '95140', 'Garges-lès-Gonesse'),
(3, 'test', 56, '9 Rue Edouard le Corbusier', '95140', 'Garges-lès-Gonesse');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `valider` tinyint(1) DEFAULT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `domaine_etude` varchar(50) DEFAULT NULL,
  `niveau_etude` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `motdepasse`, `valider`, `adresse`, `cp`, `ville`, `domaine_etude`, `niveau_etude`, `role`, `logo`, `poste`) VALUES
(1, 'ZAKOU', 'Marguau', 'marguau@gmail.com', '$2y$10$4qEr5J8sMDhhhl6UZ0nbheef45eBFeKCpoGBshqHndsoOZoZ/8Lp6', 1, '9 Rue Édouard Le Corbusier', '95140', 'Garges-lès-Gonesse', '', '', 'Admin', NULL, NULL),
(2, 'TEST', 'Test', 'jawad@m.com', '$2y$10$Eckd/emuYpjaBykrtSXQ.O3tAgKkd/D..FsfUwMcw8tk3Zlkw5Sza', 1, '5', '5', '5', 'F', 'F', 'Eleve', NULL, NULL),
(4, 'VALBERG', NULL, 'max@lprs.fr', '$2y$10$3mc6flQTtp/D51G7s4VMR.6MkWl90cFwy3cqvN2Po9yBxPyFbi1CK', 1, '9 Rue Edouard le Corbusier', '95150', 'Garges-lès-Gonesse', '', '', 'Entreprise', 'photo/d5e76a2427983cee360fea7fd19baa42.jpg', 'DRH'),
(5, 'LOPEZ', 'Maria', 'maria@gmail.com', '$2y$10$SdFGbwokh.0XVCXMQwBRNedKCq7VCMA.pMhYOvQQ/Rc0uZKzs1Wp6', 1, '9 Rue Edouard le Corbusier', '75016', 'Paris', 'Mode', 'MASTER', 'Eleve', 'photo/9c9039fab8f892d1e1c45e2bdd1f6974.jpg', NULL),
(6, 'SAMA', 'Franck', 'franck@gmail.com', '$2y$10$2wsaTUqaC8frbt3oAgMYzeGExdbiTyMYrU0/3CHovdKYhZuT2zvKG', 1, '78 Rue Lecourbe 75015 Paris', '75115', 'Paris', 'Sport', 'BAC + 4', 'Eleve', NULL, NULL),
(7, 'FRANCISCO', 'Benjamin', 'admine@gmail.com', '$2y$10$7hvvGWItyqhe.7RqadJv/uSAkWf3zf/tgidxIgt8umMoBjTHOu2RW', 1, '3 Rue Paul Cézanne 93600 Aulnay-sous-Bois', '93600', 'Aulnay-sous-Bois', 'Informatique', 'BAC + 2', 'Eleve', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_utilisateur` FOREIGN KEY (`ref_compte`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
