-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 28 nov. 2022 à 10:00
-- Version du serveur : 10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet_lprs`
--

-- --------------------------------------------------------

--
-- Structure de la table `crea_utilisateur`
--

CREATE TABLE `crea_utilisateur` (
                                    `ref_utilisateur` int(11) NOT NULL,
                                    `ref_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
                             `id_event` int(11) NOT NULL,
                             `nom_event` varchar(250) NOT NULL,
                             `description` varchar(250) NOT NULL,
                             `date` date NOT NULL,
                             `heure` time NOT NULL,
                             `duree` time NOT NULL,
                             `nombre_inscrit` int(250) NOT NULL,
                             `autorise` bit(1) DEFAULT b'0',
                             `ref_salle` int(11) NOT NULL,
                             `ref_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
                               `ref_utilisateur` int(11) NOT NULL,
                               `ref_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
                        `id_compte` int(11) NOT NULL,
                        `date` date NOT NULL,
                        `heure` time NOT NULL,
                        `adresse_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
                         `id_offre` int(11) NOT NULL,
                         `titre_offre` varchar(250) NOT NULL,
                         `description` varchar(220) NOT NULL,
                         `date_publication` date NOT NULL,
                         `type_contrat` varchar(200) NOT NULL,
                         `dure_contrat` int(200) DEFAULT NULL,
                         `pourvue` bit(1) DEFAULT b'0',
                         `valider` tinyint(1) DEFAULT NULL,
                         `ref_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

CREATE TABLE `postule` (
                           `ref_utilisateur` int(11) NOT NULL,
                           `ref_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presente`
--

CREATE TABLE `presente` (
                            `ref_utilisateur` int(11) NOT NULL,
                            `ref_rdv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
                               `id_rdv` int(11) NOT NULL,
                               `date` date NOT NULL,
                               `heure` time NOT NULL,
                               `ref_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
                         `id_salle` int(11) NOT NULL,
                         `nom_salle` varchar(250) NOT NULL,
                         `nombre_place` int(200) NOT NULL,
                         `adresse` varchar(50) NOT NULL,
                         `cp` varchar(50) NOT NULL,
                         `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
                               `id_utilisateur` int(11) NOT NULL,
                               `nom` varchar(50) NOT NULL,
                               `prenom` varchar(50) DEFAULT NULL,
                               `email` varchar(50) NOT NULL,
                               `valider` tinyint(1) DEFAULT NULL,
                               `adresse` varchar(50) NOT NULL,
                               `cp` varchar(50) NOT NULL,
                               `ville` varchar(50) NOT NULL,
                               `dommaine_etudes` varchar(50) DEFAULT NULL,
                               `niveau_etudes` varchar(50) DEFAULT NULL,
                               `role` varchar(50) DEFAULT NULL,
                               `logo` varchar(50) DEFAULT NULL,
                               `poste` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crea_utilisateur`
--
ALTER TABLE `crea_utilisateur`
    ADD KEY `fk_crea-eleves_utilisateur` (`ref_utilisateur`),
  ADD KEY `fk_crea_eleves_evenement` (`ref_event`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
    ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_evenement_salle` (`ref_salle`),
  ADD KEY `fk_evenement_utilisateur` (`ref_utilisateur`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
    ADD KEY `fk_inscription_eleves_utilisateur` (`ref_utilisateur`),
  ADD KEY `fk_inscription_eleves_evenement` (`ref_event`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
    ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
    ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fk_offre_utilisateur` (`ref_utilisateur`);

--
-- Index pour la table `postule`
--
ALTER TABLE `postule`
    ADD KEY `fk_postule_utilisateur` (`ref_utilisateur`),
  ADD KEY `fk_postule_offre` (`ref_offre`);

--
-- Index pour la table `presente`
--
ALTER TABLE `presente`
    ADD KEY `fk_presente_utilisateur` (`ref_utilisateur`),
  ADD KEY `fk_presente_rendez_vous` (`ref_rdv`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
    ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `fk_rendez_vous_offre` (`ref_offre`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
    ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
    MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
    MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
    MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
    MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `crea_utilisateur`
--
ALTER TABLE `crea_utilisateur`
    ADD CONSTRAINT `fk_crea-utilisateur_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `fk_crea_utilisateur_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
    ADD CONSTRAINT `fk_evenement_salle` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `fk_evenement_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
    ADD CONSTRAINT `fk_inscription_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`),
  ADD CONSTRAINT `fk_inscription_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
    ADD CONSTRAINT `fk_offre_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `postule`
--
ALTER TABLE `postule`
    ADD CONSTRAINT `fk_postule_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`),
  ADD CONSTRAINT `fk_postule_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `presente`
--
ALTER TABLE `presente`
    ADD CONSTRAINT `fk_presente_rendez_vous` FOREIGN KEY (`ref_rdv`) REFERENCES `rendez_vous` (`id_rdv`),
  ADD CONSTRAINT `fk_presente_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
    ADD CONSTRAINT `fk_rendez_vous_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;