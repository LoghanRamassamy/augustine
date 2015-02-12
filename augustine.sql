-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 05 Février 2015 à 09:29
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `augustine`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `timePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `title`, `timePost`, `texte`) VALUES
(6, 'Une actualite.', '2014-01-09 08:18:11', 'actualité bidon'),
(7, 'Nouvelle actualité qui tue.', '2014-01-09 08:16:39', 'Premier projet réalisé par le Lycée Léonard de Vinci; toujours en partenariat avec le Lycée Diderot'),
(8, 'La dernière actualite visible.', '2014-01-09 08:20:20', 'Voici la dernière actualité visible sur le site d''Augustine 2');

-- --------------------------------------------------------

--
-- Structure de la table `augustine2_user`
--

CREATE TABLE IF NOT EXISTS `augustine2_user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `authlevel` int(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `augustine2_user`
--

INSERT INTO `augustine2_user` (`id`, `name`, `pass`, `authlevel`) VALUES
(1, 'superadmin', 'admin', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `dateCom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` tinyint(3) unsigned NOT NULL,
  `ip` varchar(255) NOT NULL,
  `idActu` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `texte`, `dateCom`, `note`, `ip`, `idActu`) VALUES
(8, 'Test', 'Test des nouveaux commentaires.\r\nC&#039;est très bien !', '2014-01-09 07:57:20', 4, '127.0.0.1', 4),
(9, 'Pseudonyme2', 'C&#039;est super !', '2014-01-09 08:19:43', 5, '127.0.0.1', 7),
(10, 'Pseudonymesd', 'tetegege', '2014-01-09 08:46:20', 3, '127.0.0.1', 7);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(10) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `objet` varchar(40) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
