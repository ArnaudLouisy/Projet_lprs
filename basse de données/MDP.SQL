-- --------------------------------------------------------

--
-- Structure de la table `crea_utilisateur`
--

DROP TABLE IF EXISTS `crea_utilisateur`;
CREATE TABLE IF NOT EXISTS `crea_utilisateur` (
    `ref_utilisateur` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_crea-eleves_utilisateur` (`ref_utilisateur`),
    KEY `fk_crea_eleves_evenement` (`ref_event`)
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
    `ref_utilisateur` int(11) NOT NULL,
    PRIMARY KEY (`id_event`),
    KEY `fk_evenement_salle` (`ref_salle`),
    KEY `fk_evenement_utilisateur` (`ref_utilisateur`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
    `ref_utilisateur` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_inscription_eleves_utilisateur` (`ref_utilisateur`),
    KEY `fk_inscription_eleves_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
    `id_compte` int(11) NOT NULL,
    `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
    `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `type_contrat` varchar(200) NOT NULL,
    `dure_contrat` int(200) DEFAULT NULL,
    `pourvue` bit(1) DEFAULT b'0',
    `valider` tinyint(1) DEFAULT NULL,
    `ref_utilisateur` int(11) DEFAULT NULL,
    PRIMARY KEY (`id_offre`),
    KEY `fk_offre_utilisateur` (`ref_utilisateur`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `titre_offre`, `description`, `date_publication`, `type_contrat`, `dure_contrat`, `pourvue`, `valider`, `ref_utilisateur`) VALUES
    (1, 'Striptiseuse', 'Faire des danse sensuelle a des client', '2022-12-01 13:24:42', 'CDD', 2, b'0', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

DROP TABLE IF EXISTS `postule`;
CREATE TABLE IF NOT EXISTS `postule` (
    `ref_utilisateur` int(11) NOT NULL,
    `ref_offre` int(11) NOT NULL,
    KEY `fk_postule_utilisateur` (`ref_utilisateur`),
    KEY `fk_postule_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `presente`
--

DROP TABLE IF EXISTS `presente`;
CREATE TABLE IF NOT EXISTS `presente` (
    `ref_utilisateur` int(11) NOT NULL,
    `ref_rdv` int(11) NOT NULL,
    KEY `fk_presente_utilisateur` (`ref_utilisateur`),
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
    `nom_salle` varchar(250) NOT NULL,
    `nombre_place` int(200) NOT NULL,
    `adresse` varchar(50) NOT NULL,
    `cp` varchar(50) NOT NULL,
    `ville` varchar(50) NOT NULL,
    PRIMARY KEY (`id_salle`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
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
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `motdepasse`, `valider`, `adresse`, `cp`, `ville`, `domaine_etude`, `niveau_etude`, `role`, `logo`, `poste`) VALUES
                                                                                                                                                                                        (1, 'ZAKOU', 'Marguau', 'marguau@gmail.com', 'azerty', 1, '9 Rue Édouard Le Corbusier', '95140', 'Garges-lès-Gonesse', '', '', 'Admin', NULL, NULL),

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
