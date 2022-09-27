-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 sep. 2022 à 09:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
    `id_admin` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(200) NOT NULL,
    `prenom` varchar(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    `motdepasse` varchar(200) NOT NULL,
    PRIMARY KEY (`id_admin`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `crea_eleves`
--

DROP TABLE IF EXISTS `crea_eleves`;
CREATE TABLE IF NOT EXISTS `crea_eleves` (
    `ref_eleves` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_crea-eleves_utilisateur_eleves` (`ref_eleves`),
    KEY `fk_crea_eleves_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `crea_entreprise`
--

DROP TABLE IF EXISTS `crea_entreprise`;
CREATE TABLE IF NOT EXISTS `crea_entreprise` (
    `ref_representant` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_crea-entreprise_utilisateur_entreprise` (`ref_representant`),
    KEY `fk_crea_entreprtise_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
    `id_event` int(11) NOT NULL AUTO_INCREMENT,
    `nom_event` varchar(250) NOT NULL,
    `description` varchar(250) NOT NULL,
    `date` date NOT NULL,
    `heure` time NOT NULL,
    `duree` time NOT NULL,
    `nombre_inscrit` int(250) NOT NULL,
    `autorise` bit(1) DEFAULT b'0',
    `ref_salle` int(11) NOT NULL,
    `ref_admin` int(11) NOT NULL,
    PRIMARY KEY (`id_event`),
    KEY `fk_evenement_salle` (`ref_salle`),
    KEY `fk_evenement_admin` (`ref_admin`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_eleves`
--

DROP TABLE IF EXISTS `inscription_eleves`;
CREATE TABLE IF NOT EXISTS `inscription_eleves` (
    `ref_eleves` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_inscription_eleves_utilisateur_eleves` (`ref_eleves`),
    KEY `fk_inscription_eleves_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_entreprise`
--

DROP TABLE IF EXISTS `inscription_entreprise`;
CREATE TABLE IF NOT EXISTS `inscription_entreprise` (
    `ref_representant` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_inscription-entreprise_utilisateur_entreprise` (`ref_representant`),
    KEY `fk_inscription_entreprtise_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
    `id_compte` int(11) NOT NULL,
    `date` date NOT NULL,
    `adresse_ip` varchar(200) NOT NULL,
    PRIMARY KEY (`id_compte`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
    `id_offre` int(11) NOT NULL AUTO_INCREMENT,
    `titre_offre` varchar(250) NOT NULL,
    `description` varchar(220) NOT NULL,
    `date_publication` date NOT NULL,
    `type_contrat` varchar(200) NOT NULL,
    `dure_contrat` int(200) DEFAULT NULL,
    `pourvue` bit(1) DEFAULT b'0',
    `ref_representant` int(11) NOT NULL,
    PRIMARY KEY (`id_offre`),
    KEY `fk_offre_representant` (`ref_representant`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

DROP TABLE IF EXISTS `postule`;
CREATE TABLE IF NOT EXISTS `postule` (
    `ref_eleves` int(11) NOT NULL,
    `ref_offre` int(11) NOT NULL,
    KEY `fk_postule_utilisateur_eleves` (`ref_eleves`),
    KEY `fk_postule_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presente`
--

DROP TABLE IF EXISTS `presente`;
CREATE TABLE IF NOT EXISTS `presente` (
    `ref_eleves` int(11) NOT NULL,
    `ref_rdv` int(11) NOT NULL,
    KEY `fk_presente_utilisateur_eleves` (`ref_eleves`),
    KEY `fk_presente_rendez_vous` (`ref_rdv`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
    `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
    `date` date NOT NULL,
    `heure` time NOT NULL,
    `ref_offre` int(11) NOT NULL,
    PRIMARY KEY (`id_rdv`),
    KEY `fk_rendez_vous_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
    `id_salle` int(11) NOT NULL AUTO_INCREMENT,
    `type_salle` varchar(250) NOT NULL,
    `nombre_place` int(200) NOT NULL,
    PRIMARY KEY (`id_salle`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_eleves`
--

DROP TABLE IF EXISTS `utilisateur_eleves`;
CREATE TABLE IF NOT EXISTS `utilisateur_eleves` (
    `id_eleves` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `prenom` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `motdepasse` varchar(50) NOT NULL,
    `valider` tinyint(1) DEFAULT NULL,
    `adresse` varchar(50) NOT NULL,
    `domaine_etudes` varchar(50) NOT NULL,
    `niveau_etudes` varchar(50) NOT NULL,
    `ref_admin` int(11) DEFAULT NULL,
    PRIMARY KEY (`id_eleves`),
    KEY `fk_utilisateur_eleves_admin` (`ref_admin`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur_eleves`
--

INSERT INTO `utilisateur_eleves` (`id_eleves`, `nom`, `prenom`, `email`, `motdepasse`, `valider`, `adresse`, `domaine_etudes`, `niveau_etudes`, `ref_admin`) VALUES
    (1, 'Arnaud', 'Louisy', 'a.louisy@lprs.fr', 'arnaud', 1, '50 rue de paris', 'informatique', 'bts', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_entreprise`
--

DROP TABLE IF EXISTS `utilisateur_entreprise`;
CREATE TABLE IF NOT EXISTS `utilisateur_entreprise` (
    `id_representant` int(11) NOT NULL AUTO_INCREMENT,
    `nom_entreprise` varchar(250) NOT NULL,
    `email` varchar(250) NOT NULL,
    `motdepasse` varchar(250) NOT NULL,
    `adresse` varchar(250) NOT NULL,
    `role_representant` varchar(250) NOT NULL,
    `valider` tinyint(1) DEFAULT NULL,
    `ref_admin` int(11) NOT NULL,
    PRIMARY KEY (`id_representant`),
    KEY `fk_utilisateur_entreprise_admin` (`ref_admin`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `crea_eleves`
--
ALTER TABLE `crea_eleves`
    ADD CONSTRAINT `fk_crea-eleves_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`),
  ADD CONSTRAINT `fk_crea_eleves_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

--
-- Contraintes pour la table `crea_entreprise`
--
ALTER TABLE `crea_entreprise`
    ADD CONSTRAINT `fk_crea-entreprise_utilisateur_entreprise` FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur_entreprise` (`id_representant`),
  ADD CONSTRAINT `fk_crea_entreprtise_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
    ADD CONSTRAINT `fk_evenement_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_evenement_salle` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`);

--
-- Contraintes pour la table `inscription_eleves`
--
ALTER TABLE `inscription_eleves`
    ADD CONSTRAINT `fk_inscription_eleves_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`),
  ADD CONSTRAINT `fk_inscription_eleves_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);

--
-- Contraintes pour la table `inscription_entreprise`
--
ALTER TABLE `inscription_entreprise`
    ADD CONSTRAINT `fk_inscription-entreprise_utilisateur_entreprise` FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur_entreprise` (`id_representant`),
  ADD CONSTRAINT `fk_inscription_entreprtise_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
    ADD CONSTRAINT `fk_offre_representant` FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur_entreprise` (`id_representant`);

--
-- Contraintes pour la table `postule`
--
ALTER TABLE `postule`
    ADD CONSTRAINT `fk_postule_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`),
  ADD CONSTRAINT `fk_postule_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);

--
-- Contraintes pour la table `presente`
--
ALTER TABLE `presente`
    ADD CONSTRAINT `fk_presente_rendez_vous` FOREIGN KEY (`ref_rdv`) REFERENCES `rendez_vous` (`id_rdv`),
  ADD CONSTRAINT `fk_presente_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
    ADD CONSTRAINT `fk_rendez_vous_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`);

--
-- Contraintes pour la table `utilisateur_eleves`
--
ALTER TABLE `utilisateur_eleves`
    ADD CONSTRAINT `fk_utilisateur_eleves_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id_admin`);

--
-- Contraintes pour la table `utilisateur_entreprise`
--
ALTER TABLE `utilisateur_entreprise`
    ADD CONSTRAINT `fk_utilisateur_entreprise_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
