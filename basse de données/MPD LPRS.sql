DROP DATABASE IF EXISTS `Projet_Lprs`;
CREATE DATABASE IF NOT EXISTS `Projet_Lprs`DEFAULT CHARACTER SET Latin1 COLLATE Latin1_swedish_ci;
USE `Projet_Lprs`;

    DROP TABLE IF  EXISTS `utilisateur_eleves`;
    CREATE TABLE IF NOT EXISTS `utilisateur_eleves`(
        `id_eleves` int(11) NOT NULL AUTO_INCREMENT,
        `nom` varchar(50) NOT NULL,
        `prenom` varchar(50) NOT NULL,
        `email` varchar(50) NOT NULL,
        `valider` bit DEFAULT 0,
        `adresse` varchar(50) NOT NULL,
        `domaine_etudes` varchar(50) NOT NULL,
        `niveau_etudes` varchar(50) NOT NULL,
        `ref_admin` int(11) NOT NULL,
        PRIMARY KEY (`id_eleves`)

    )ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `utilisateur_entreprise`;
CREATE TABLE IF NOT EXISTS `utilisateur_entreprise`(
    `id_representant` int(11) NOT NULL AUTO_INCREMENT,
    `nom_entreprise` varchar(250) NOT NULL,
    `email` varchar(250) NOT NULL,
    `adresse` varchar(250) NOT NULL,
    `role_representant`varchar(250) NOT NULL,
    `valider` bit DEFAULT 0,
    `ref_admin` int(11) NOT NULL,
    PRIMARY KEY (`id_representant`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
    `id_event` int(11) NOT NULL AUTO_INCREMENT,
    `nom_event` varchar(250) NOT NULL,
    `description` varchar(250) NOT NULL,
    `date` date NOT NULL,
    `heure` time NOT NULL,
    `duree` time NOT NULL,
    `nombre_inscrit`int(250) NOT NULL,
    `autorise` bit DEFAULT 0,
    `ref_salle` int(11) NOT NULL,
    `ref_admin` int(11) NOT NULL,
    PRIMARY KEY (`id_event`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF  EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle`(
    `id_salle` int(11) NOT NULL AUTO_INCREMENT,
    `type_salle` varchar(250) NOT NULL,
    `nombre_place`int(200) NOT NULL,
    PRIMARY KEY (`id_salle`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre`(
    `id_offre` int(11) NOT NULL AUTO_INCREMENT,
    `titre_offre` varchar(250) NOT NULL,
    `description` varchar(220) NOT NULL,
    `date_publication`date NOT NULL,
    `type_contrat` varchar(200) NOT NULL,
    `dure_contrat` int(200),
    `pourvue` BIT DEFAULT 0,
    `ref_representant` int(11) NOT NULL,
    PRIMARY KEY (`id_offre`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous`(
    `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
    `date` date  NOT NULL,
    `heure` time NOT NULL,
    `ref_offre` int(11) NOT NULL,
    PRIMARY KEY (`id_rdv`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin`(
    `id_admin` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(200) NOT NULL,
    `prenom` varchar(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    PRIMARY KEY (`id_admin`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `logs`(
    `id_compte` int(11) NOT NULL,
    `date`date NOT NULL,
    `adresse_ip` varchar(200) NOT NULL,
    PRIMARY KEY (`id_compte`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `inscription_entreprise`(
    `ref_representant`int(11) NOT NULl,
    `ref_event` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `crea_entreprise`(
    `ref_representant` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `crea_eleves`(
    `ref_eleves` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `inscription_eleves`(
    `ref_representant` int(11) NOT NULL,
    `ref_event` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `presente`(
    `ref_eleves` int(11) NOT NULL,
    `ref_rdv` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `postule`(
    `ref_eleves` int(11) NOT NULL,
    `ref_offres` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `utilisateur_eleves`
ADD CONSTRAINT `fk_utilisateur_eleves_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin`(`id_admin`);

ALTER TABLE `utilisateur_entreprise`
ADD CONSTRAINT `fk_utilisateur_entreprise_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id_admin`);

ALTER TABLE `evenement`
ADD CONSTRAINT `fk_evenement_salle` FOREIGN KEY (`ref_salle`) REFERENCES `salle`(`id_salle`);
ALTER TABLE `evenement`
ADD CONSTRAINT `fk_evenement_admin` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id_admin`);

ALTER TABLE `offre`
ADD CONSTRAINT `fk_offre_representant`FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur_entreprise` (`id_representant`);

ALTER TABLE `rendez_vous`
    ADD CONSTRAINT `fk_rendez_vous_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`);

ALTER TABLE `presente`
    ADD CONSTRAINT `fk_presente_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);

ALTER TABLE `presente`
    ADD CONSTRAINT `fk_presente_rendez_vous` FOREIGN KEY (`ref_rdv`) REFERENCES `rendez_vous` (`id_rdv`);

ALTER TABLE `postule`
    ADD CONSTRAINT `fk_postule_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);
ALTER TABLE `postule`
    ADD CONSTRAINT `fk_postule_offre` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id_offre`);

ALTER TABLE `crea_eleves`
    ADD CONSTRAINT `fk_crea-eleves_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);
ALTER TABLE `crea_eleves`
    ADD CONSTRAINT `fk_crea_eleves_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

 ALTER TABLE `crea_entreprise`
    ADD CONSTRAINT `fk_crea-entreprise_utilisateur_entreprise` FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur-entreprise` (`id_representant`);
ALTER TABLE `crea_entreprise`
    ADD CONSTRAINT `fk_crea_entreprtise_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

ALTER TABLE `inscription_eleves`
    ADD CONSTRAINT `fk_inscription_eleves_utilisateur_eleves` FOREIGN KEY (`ref_eleves`) REFERENCES `utilisateur_eleves` (`id_eleves`);
ALTER TABLE `inscription_eleves`
    ADD CONSTRAINT `fk_inscription_eleves_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);

ALTER TABLE `inscription_entreprise`
    ADD CONSTRAINT `fk_inscription-entreprise_utilisateur_entreprise` FOREIGN KEY (`ref_representant`) REFERENCES `utilisateur-entreprise` (`id_representant`);
ALTER TABLE `inscription_entreprise`
    ADD CONSTRAINT `fk_inscription_entreprtise_evenement` FOREIGN KEY (`ref_event`) REFERENCES `evenement` (`id_event`);
