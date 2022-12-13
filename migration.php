<?php 

$bdd->exec("CREATE TABLE IF NOT EXISTS `anne_scolaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `appro_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `qte` int(4) NOT NULL,
  `effectuer_par` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matr` varchar(30) NOT NULL,
  `promotion` varchar(20) NOT NULL,
  `categorie_classe` varchar(255) NOT NULL,
  `codep` varchar(20) NOT NULL,
  `annacad` varchar(15) NOT NULL,
  `date_inscripition` date NOT NULL,
  `categorie_eleve` varchar(60) NOT NULL,
  `mention` varchar(30) NOT NULL,
  `pourcentage` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `devise` varchar(3) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `section` varchar(30) NOT NULL,
  `compte` int(5) NOT NULL,
  `type` varchar(3) NOT NULL,
  `qte` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_article` (`nom_article`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `attribution_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeattr` varchar(10) NOT NULL,
  `codeens` varchar(10) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `annacad` varchar(10) NOT NULL,
  `nom` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `audrey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `validate` tinyint(1) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `id` (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `jeux_de_compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `numero_compte` int(5) NOT NULL,
  UNIQUE KEY `id` (`id`)
)");

$bdd->exec("CREATE TABLE IF NOT EXISTS `autre_frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(60) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `classe` varchar(6) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `devise` varchar(3) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `cdfact` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `bsituation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `nom_eleve` text NOT NULL,
  `classe` varchar(5) NOT NULL,
  `M_Sep` varchar(30) NOT NULL,
  `M_Octobre` varchar(30) NOT NULL,
  `M_Novembre` varchar(30) NOT NULL,
  `M_Decembre` varchar(30) NOT NULL,
  `M_Janvier` varchar(30) NOT NULL,
  `M_Fevrier` varchar(30) NOT NULL,
  `Mois_de_Mars` varchar(30) NOT NULL,
  `M_Avril` varchar(30) NOT NULL,
  `M_Mais` varchar(30) NOT NULL,
  `M_Juin` varchar(30) NOT NULL,
  `anneescolaire` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `categori_enfant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeclasse` varchar(10) NOT NULL,
  `nomclasse` varchar(15) NOT NULL,
  `user` int(15) NOT NULL,
  `frais_inscitpion` varchar(11) NOT NULL,
  `categorie_classe` varchar(255) NOT NULL,
  `capacite` int(2) NOT NULL,
  `niveau` int(11) NOT NULL,
  `compte` int(5) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compte` varchar(255) NOT NULL,
  `numero_de_compte` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `compte` (`compte`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `comptuer_facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `compt_inscription_reinscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `corbeille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motif` text NOT NULL,
  `montant` float NOT NULL,
  `date` datetime NOT NULL,
  `pour` varchar(20) NOT NULL,
  `codefacture` varchar(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `effectuer_par` varchar(30) NOT NULL,
  `supprimerpar` varchar(30) NOT NULL,
  `devise` varchar(3) NOT NULL,
  `annacad` varchar(10) NOT NULL,
  `datesup` date NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `depense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_sortie_s` varchar(6) NOT NULL,
  `montantusd_s` float NOT NULL,
  `montantcdf_s` float NOT NULL,
  `devise_s` varchar(3) NOT NULL,
  `motif_s` text NOT NULL,
  `date_s` date NOT NULL,
  `annee_acad_s` varchar(10) NOT NULL,
  `compte_s` varchar(255) NOT NULL,
  `nom_recepteur_s` varchar(250) NOT NULL,
  `statut_s` tinyint(1) NOT NULL COMMENT '1 pour Actif et zero pour suppression',
  `effectuer_par_s` varchar(30) NOT NULL,
  `numero_compte_s` int(5) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `derogation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `nom_eleve` varchar(70) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `mois` varchar(20) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` varchar(10) NOT NULL,
  `annee_academique` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");



$bdd->exec("CREATE TABLE IF NOT EXISTS `ecole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codecole` varchar(30) NOT NULL,
  `nom_ecole` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `adresse` text NOT NULL,
  `responsable` varchar(60) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `website` varchar(255) NOT NULL,
  `capacite` int(5) NOT NULL,
  `nombre_de_classe` int(5) NOT NULL,
  `date_creation` date NOT NULL,
  `logos` varchar(30) NOT NULL,
  PRIMARY KEY (`codecole`),
  UNIQUE KEY `id` (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `postnom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `daten` varchar(20) NOT NULL,
  `lieun` varchar(50) NOT NULL,
  `nation` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `promotion` varchar(20) NOT NULL,
  `codep` varchar(20) NOT NULL,
  `photo` varchar(15) NOT NULL,
  `annacad` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `date_insc` VARCHAR(15) NOT NULL,
  `categorie` varchar(15) NOT NULL,
  `categorie_classe` varchar(20) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `mention` varchar(15) NOT NULL,
  `pourcentage` float NOT NULL,
  `ecole_de_provenance` varchar(255) NOT NULL,
  `modePaiment` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeens` varchar(10) NOT NULL,
  `nomsens` varchar(30) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `age` varchar(6) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `annee_acad` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(60) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `classe_eleve` varchar(6) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montantusd` float NOT NULL,
  `montantcdf` float NOT NULL,
  `anne_acad` varchar(10) NOT NULL,
  `date_enreg` date NOT NULL,
  `devise` varchar(3) NOT NULL,
  `type` varchar(255) NOT NULL,
  `taux` int(3) NOT NULL,
  `cdfact` varchar(12) NOT NULL,
  `pidFrais` int(3) NOT NULL,
  `compte` int(5) NOT NULL,
  `pour_annee` varchar(12) NOT NULL,
  `qte_acheter` int(3) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `frais_insciption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `montant` float NOT NULL,
  `classe` varchar(20) NOT NULL,
  `annee_scolaire` varchar(9) NOT NULL,
  `date` date NOT NULL,
  `cdfact` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`matricule`),
  UNIQUE KEY `id` (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `infomin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codean` varchar(10) NOT NULL,
  `annacad` varchar(15) NOT NULL,
  `montantmensuel` float NOT NULL,
  `classe` varchar(10) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `compte` int(5) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `info_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteweb` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Entete` text NOT NULL,
  `Sloga` text NOT NULL,
  `par` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `info_autre_frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_frais` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `annee_acad` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `minerval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cdf` varchar(14) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `nom` text NOT NULL,
  `montant` int(11) NOT NULL,
  `mois` varchar(20) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `annacad` varchar(15) NOT NULL,
  `reste` int(11) NOT NULL,
  `date` date NOT NULL,
  `taux` int(3) NOT NULL,
  `devise` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `modepaiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modePaiement` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `mois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moisp` varchar(20) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `annee_acad` varchar(10) NOT NULL,
  `cdfact` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `options` (
  `options` tinyint(1) NOT NULL
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `options_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `options_section` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `palmaresse` (
  `mention` int(11) NOT NULL
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codep` varchar(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `postnom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `section` (
  `codesection` varchar(6) NOT NULL,
  `section` varchar(30) NOT NULL,
  PRIMARY KEY (`codesection`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `secure_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_access` varchar(4) NOT NULL,
  `pwd` varchar(4) NOT NULL,
  PRIMARY KEY (`numero_access`),
  UNIQUE KEY `id` (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `sortie_argent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monant` float NOT NULL,
  `motif` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
);");



$bdd->exec("CREATE TABLE IF NOT EXISTS `status_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `taux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taux` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `tempons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix_usd` float NOT NULL,
  `prix_cdf` float NOT NULL,
  `taux` int(4) NOT NULL,
  `qte` float NOT NULL,
  `date` date NOT NULL,
  `devise` varchar(3) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `nature` varchar(30) NOT NULL,
  `pid` int(1) NOT NULL,
  `compte` int(5) NOT NULL,
  `pour_annee` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
);");

$bdd->exec("CREATE TABLE IF NOT EXISTS `unique_frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `prix_usd` float NOT NULL,
  `prix_cdf` float NOT NULL,
  `section` varchar(25) NOT NULL,
  `annee_scolaiire` varchar(10) NOT NULL,
  `devise` varchar(3) NOT NULL,
  `specifiaction_classe` varchar(10) NOT NULL,
  `compte` int(5) NOT NULL,
  `annacad` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);");


$bdd->exec("CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomuser` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `motp` varchar(15) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
);");





















