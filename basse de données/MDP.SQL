CREATE  DATABASE IF NOT EXISTS 'Projet_Lprs' DEFAULT CHARACTER SET latin1 COLLATE latin_swedish_ci;

USE 'Projet_Lprs';

DROP TABLE 'utilisateur';
CREATE TABLE IF NOT EXISTS 'utilisateur'(
    'id_user' int(11) NOT NULL AUTO_INCREMENT,
    'nom' varchar (20) NOT NULL,
    'prenom' varchar (20),
    'email' varchar(20) NOT NULL,
    'valider' tinyint(1) DEFAULT NULL,
    'adresse' varchar (20) NOT NULL,
    'domaine_etude' varchar (20),
    'niveau_etude' varchar (20),
    'role' varchar (20),
    PRIMARY KEY ('id_user')
)ENGINE=InnoDB DEFAULT CHARSET=Latin1;

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
    `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
    `date` date NOT NULL,
    `heure` time NOT NULL,
    `ref_offre` int(11) NOT NULL,
    PRIMARY KEY (`id_rdv`),
    KEY `fk_rendez_vous_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    `ref_user` int(11) NOT NULL,
    PRIMARY KEY (`id_event`),
    KEY `fk_evenement_salle` (`ref_salle`),
    KEY `fk_evenement_user` (`ref_user`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `presente`;
CREATE TABLE IF NOT EXISTS `presente` (
    `ref_user` int(11) NOT NULL,
    `ref_rdv` int(11) NOT NULL,
    KEY `fk_presente_utilisateur_user` (`ref_euser`),
    KEY `fk_presente_rendez_vous` (`ref_rdv`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `inscription_event`;
CREATE TABLE IF NOT EXISTS `inscription_event` (
    `ref_user` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL,
    KEY `fk_inscription-entreprise_utilisateur_entreprise` (`ref_representant`),
    KEY `fk_inscription_entreprtise_evenement` (`ref_event`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
    `id_salle` int(11) NOT NULL AUTO_INCREMENT,
    `type_salle` varchar(250) NOT NULL,
    `nombre_place` int(200) NOT NULL,
    PRIMARY KEY (`id_salle`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
    `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
    `date` date NOT NULL,
    `heure` time NOT NULL,
    `ref_offre` int(11) NOT NULL,
    PRIMARY KEY (`id_rdv`),
    KEY `fk_rendez_vous_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `presente`;
CREATE TABLE IF NOT EXISTS `presente` (
    `ref_user` int(11) NOT NULL,
    `ref_rdv` int(11) NOT NULL,
    KEY `fk_presente_utilisateur` ('ref_user'),
    KEY `fk_presente_rendez_vous` ('ref_rdv')
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `postule`;
CREATE TABLE IF NOT EXISTS `postule` (
    `ref_eleves` int(11) NOT NULL,
    `ref_offre` int(11) NOT NULL,
    KEY `fk_postule_utilisateur` (`ref_user`),
    KEY `fk_postule_offre` (`ref_offre`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
    `id_compte` int(11) NOT NULL,
    `date` date NOT NULL,
    `adresse_ip` varchar(200) NOT NULL,
    PRIMARY KEY (`id_compte`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `evenement`
    ADD CONSTRAINT `fk_evenement_user` FOREIGN KEY (`ref_user`) REFERENCES `admin` (`id_user`),
  ADD CONSTRAINT `fk_evenement_salle` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`);

ALTER TABLE `crea_event`
    ADD CONSTRAINT `fk_crea_eleves_utilisateur` FOREIGN KEY (`ref_user`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `fk_crea_eleves_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

ALTER TABLE `offre`
    ADD CONSTRAINT `fk_offre_representant` FOREIGN KEY (`ref_user`) REFERENCES `utilisateur` (`id_user`);

ALTER TABLE `postule`
    ADD CONSTRAINT `fk_postule_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`),
  ADD CONSTRAINT `fk_postule_utilisateur` FOREIGN KEY (`ref_user') REFERENCES `utilisateur` (`id_user`);

ALTER TABLE `presente`
    ADD CONSTRAINT `fk_presente_rendez_vous` FOREIGN KEY (`ref_rdv`) REFERENCES `rendez_vous` (`id_rdv`),
  ADD CONSTRAINT `fk_presente_utilisateur` FOREIGN KEY (`ref_user`) REFERENCES `utilisateur` (`id_eleves`);

ALTER TABLE `rendez_vous`
    ADD CONSTRAINT `fk_rendez_vous_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`);
