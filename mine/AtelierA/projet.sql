-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 mai 2021 à 23:03
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `titrearticle` varchar(500) CHARACTER SET utf8 NOT NULL,
  `descarticle` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `imagearticle` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`idarticle`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `titrearticle`, `descarticle`, `imagearticle`) VALUES
(24, 'Thameur Mejri et lâ€™exorcisme sÃ©culaire', 'Depuis 2017, Thameur Mejri se distingue avec des expositions personnelles et collectives qui lui ont permis de prÃ©senter ses oeuvres dans plusieurs pays. Aux Ã‰mirats arabes unis, au Ghana, aux Ã‰tats-unis dâ€™AmÃ©rique, en Ã‰gypte ou en Tunisie, cet artiste rencontre un succÃ¨s grandissant.  Vivant et travaillant Ã  Nabeul, Thameur Mejri exposera prochainement sa nouvelle collection Ã  la station dâ€™art B7L9 Ã  Bhar Lazreg sous les auspices de la Fondation Kamel Lazaar.  IntitulÃ©e Â« States of Exception Â», cette exposition aura pour commissaire Matthieu LeliÃ¨vre, historien de lâ€™art et conseiller artistique du musÃ©e dâ€™art contemporain de Lyon. Lâ€™exposition sera inaugurÃ©e le jeudi 25 mars et se poursuivra jusquâ€™au 2 mai prochain.', 'Cahhpture.PNG'),
(23, 'EpopÃ©e Ù…Ù„Ø­Ù…Ø©', 'Exposition collective d\"arts plastiques Ã  l\'Espace Ain jusqu\'au14 juin 2021 du Mardi Ã  Dimanche et de 15h00 Ã  19h00 avec la participation de: Abdelmalek Allani,Alia Ksouri,Fadhel Ghedira,FÃ©rid Arfaoui,Ghaida Mzid,Islam Haj Rahouma,Banour Machfar,Nadia Hmani,Nozha Boukhris.', 'Caainpture.PNG'),
(25, 'Exposition collective Â«Lâ€™espace du dedans, livres dâ€™artistesÂ»', 'Un livre dâ€™artiste est une Å“uvre dâ€™art Ã  part entiÃ¨re qui Ã©pouse la forme ou lâ€™esprit dâ€™un livre. Un concept qui a toujours Ã©tÃ© adoptÃ© par les artistes et qui a connu ses premiÃ¨res envolÃ©es en Europe. Progressivement, le livre dâ€™artiste sâ€™est affirmÃ© comme un mÃ©dium dâ€™expression multidisciplinaire Ã  part entiÃ¨re oÃ¹ sont employÃ©es diffÃ©rentes techniques (arts graphiques, peinture, photographie, etc.). Inclassable, se prÃ©sentant comme un multiple, un agencement de signes et de graphismes, dont le papier, le livre dâ€™artiste cristallise la vision singuliÃ¨re de son auteur.', 'espace-du-dedans-1.webp');

-- --------------------------------------------------------

--
-- Structure de la table `cartefidalite`
--

DROP TABLE IF EXISTS `cartefidalite`;
CREATE TABLE IF NOT EXISTS `cartefidalite` (
  `id_cartefidalite` int(55) NOT NULL AUTO_INCREMENT,
  `nom_cartefidalite` varchar(55) NOT NULL,
  `prenom_cartefidalite` varchar(55) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `num_cartefidalite` int(55) NOT NULL,
  `date_cartefidalite` date NOT NULL,
  PRIMARY KEY (`id_cartefidalite`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartefidalite`
--

INSERT INTO `cartefidalite` (`id_cartefidalite`, `nom_cartefidalite`, `prenom_cartefidalite`, `num_cartefidalite`, `date_cartefidalite`) VALUES
(3, 'AA', 'ZZ', 12345678, '2021-04-29');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(250) NOT NULL,
  PRIMARY KEY (`id_categorie`,`nom_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Peinture Acrylique'),
(3, 'Peinture a Verre'),
(11, 'Peinture a huile');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `codelivraison` int(6) NOT NULL AUTO_INCREMENT,
  `regionlivraison` varchar(200) NOT NULL,
  `adresselivraison` varchar(200) NOT NULL,
  `codepostallivraison` int(11) NOT NULL,
  PRIMARY KEY (`codelivraison`)
) ENGINE=InnoDB AUTO_INCREMENT=955 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`codelivraison`, `regionlivraison`, `adresselivraison`, `codepostallivraison`) VALUES
(944, 'Sousse', 'khez', 6789),
(945, 'GrandTunis', 'Ariana', 5461),
(946, 'Mourouj', 'momo', 2345),
(947, 'manar', 'aaaaaaaa', 1200),
(948, 'Bardo', 'aaaaaaaaaa', 6666),
(949, 'Bardo', 'aaaaaaaaaa', 6666),
(950, 'Bardo', 'aaaaaaaaaa', 6666),
(951, 'Bardo', 'aaaaaaaaaa', 6666),
(952, 'Bardo', 'aaaaaaaaaa', 6666),
(954, 'Mourouj', ' bis aven', 2092);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `idlivreur` int(11) NOT NULL AUTO_INCREMENT,
  `nomlivreur` varchar(50) NOT NULL,
  `prenomlivreur` varchar(50) NOT NULL,
  `zonelivreur` varchar(50) NOT NULL,
  `vehiculelivreur` varchar(50) NOT NULL,
  PRIMARY KEY (`idlivreur`,`zonelivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idlivreur`, `nomlivreur`, `prenomlivreur`, `zonelivreur`, `vehiculelivreur`) VALUES
(1, 'Souissi', 'Aziz', 'Mourouj', 'Fiat punto'),
(2, 'Benna', 'Mehdi', 'Bardo', 'polo'),
(3, 'jamoussi', 'aziz', 'manar', 'ibiza'),
(5, 'Rgaya', 'Amine', 'Mourouj 1', 'Mercedes sprinter'),
(6, 'lotfi', 'aa', 'az', 'aa');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duree` varchar(55) CHARACTER SET utf8mb4 NOT NULL,
  `remise` varchar(55) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `duree`, `remise`) VALUES
(1, '123', '12');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(250) NOT NULL,
  `image_produit` varchar(250) NOT NULL,
  `description_produit` varchar(500) NOT NULL,
  `prix_produit` float NOT NULL,
  `categorie_produit` varchar(250) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_categorie` (`categorie_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `image_produit`, `description_produit`, `prix_produit`, `categorie_produit`) VALUES
(70, 'di vinci ', 'acrylique1.jpg', 'il est magnifique', 8456, 'Peinture Acrylique'),
(69, 'di caprio ', 'acrylique1.jpg', 'il est beau ', 3265, 'Peinture Acrylique'),
(68, 'tableauA', 'acrylique.jpg', 'ce tableau ', 3214, 'Peinture a huile'),
(67, 'hbib', '6.jpg', 'ok', 5555, 'Peinture a Verre'),
(71, 'Clooney ', 'huile.jpg', 'huile est beau ', 3224, 'Peinture a huile'),
(72, 'Pitt', 'huile1.jpg', 'waaaaw', 5541, 'Peinture a huile'),
(73, 'verdeau', '5.jpg', 'wonderful', 9874, 'Peinture a Verre');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `pourcentage` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `titre`, `pourcentage`, `image`) VALUES
(12, 'tabof', '200%', 'banner-04.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `numreclamation` int(55) NOT NULL AUTO_INCREMENT,
  `emailreclamation` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `messagereclamation` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`numreclamation`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`numreclamation`, `emailreclamation`, `messagereclamation`) VALUES
(11, 'aziz', 'aslema'),
(12, 'mozi', 'beslema');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomutilisateur` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `prenomutilisateur` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `telephoneutilisateur` int(11) NOT NULL,
  `dateutilisateur` date NOT NULL,
  `loginutilisateur` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `mdputilisateur` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nomutilisateur`, `prenomutilisateur`, `telephoneutilisateur`, `dateutilisateur`, `loginutilisateur`, `mdputilisateur`, `token`) VALUES
(38, 'admin', 'admin', 0, '2021-04-01', 'admin', 'admin', '0'),
(42, 'jamoussi', 'Mohamed aziz', 52447610, '2001-01-23', 'azizjamoussi23@gmail.com', 'aziz', NULL),
(43, 'smida', 'yosra', 99339076, '2000-01-14', 'f@gmail.com', 'za', NULL),
(45, 'Battia', 'Mehdi', 12345678, '2000-05-17', 'mahdi@gmail.com', 'm', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
