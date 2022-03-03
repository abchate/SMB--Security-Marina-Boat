-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 31 oct. 2021 à 22:18
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smb`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateaux`
--

DROP TABLE IF EXISTS `bateaux`;
CREATE TABLE IF NOT EXISTS `bateaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `addby` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ile_depart` varchar(255) NOT NULL,
  `port_depart` varchar(255) NOT NULL,
  `date_depart` datetime NOT NULL,
  `ile_arrive` varchar(255) NOT NULL,
  `port_arrive` varchar(255) NOT NULL,
  `date_arrive` datetime NOT NULL,
  `passagers` varchar(150) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bateaux`
--

INSERT INTO `bateaux` (`id`, `nom`, `numero`, `addby`, `phone`, `ile_depart`, `port_depart`, `date_depart`, `ile_arrive`, `port_arrive`, `date_arrive`, `passagers`, `pid`, `date_add`) VALUES
(1, 'Masiwa 1', '15456SD', '887392616c64caa36f21523809', '', 'Ngazidja', 'Moroni', '2021-10-27 22:37:00', 'Mohéli', 'Moheli', '2021-10-29 22:37:00', '12/20', '757742616ca6538b4434525589', '2021-10-17 22:40:19'),
(2, 'kwassa kwassa', '2021', '887392616c64caa36f21523809', '', 'Anjouan', 'mutsamudu', '2021-10-19 01:37:00', 'Ngazidja', 'chindini', '2021-10-19 04:40:00', '10', '459355616cc240479ee4313632', '2021-10-18 00:39:28'),
(3, '', '', '887392616c64caa36f21523809', '', 'Ngazidja', '', '2021-10-18 09:16:00', 'Ngazidja', '', '2021-10-18 09:16:00', '', '322777616d3c2d260dc1023092', '2021-10-18 09:19:41'),
(4, 'rapide one', 'nga123', '887392616c64caa36f21523809', '3323019', 'Ngazidja', 'moroni', '2021-10-29 10:45:00', 'Mohéli', 'fomboni', '2021-10-29 12:47:00', '10', '20604361790327c2be61120759', '2021-10-27 07:43:35');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_nom` varchar(255) NOT NULL,
  `c_prenom` varchar(255) NOT NULL,
  `c_nin` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `c_pid` varchar(255) NOT NULL,
  `c_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`c_id`, `c_nom`, `c_prenom`, `c_nin`, `c_phone`, `c_pass`, `c_pid`, `c_blocked`, `c_date`) VALUES
(1, 'abchate', 'ali', '123', '+2693582728', '2000', '8821436172fa05096f73461768', 0, '2021-10-22 17:51:01');

-- --------------------------------------------------------

--
-- Structure de la table `iles`
--

DROP TABLE IF EXISTS `iles`;
CREATE TABLE IF NOT EXISTS `iles` (
  `id` int(11) NOT NULL,
  `nom_ile` varchar(250) NOT NULL,
  `img_ile` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nombateau` varchar(255) NOT NULL,
  `ile_depart` varchar(255) NOT NULL,
  `port_depart` varchar(255) NOT NULL,
  `date_depart` datetime NOT NULL,
  `ile_arrive` varchar(255) NOT NULL,
  `port_arrive` varchar(255) NOT NULL,
  `date_arrive` datetime NOT NULL,
  `nbrenfant_10` varchar(255) DEFAULT NULL,
  `nbrenfant_14` varchar(255) DEFAULT NULL,
  `prix` varchar(255) NOT NULL,
  `reserver_par` varchar(255) NOT NULL,
  `ajout_par` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `nom`, `prenom`, `phone`, `matricule`, `nombateau`, `ile_depart`, `port_depart`, `date_depart`, `ile_arrive`, `port_arrive`, `date_arrive`, `nbrenfant_10`, `nbrenfant_14`, `prix`, `reserver_par`, `ajout_par`, `u_phone`, `etat`, `pid`, `create_at`) VALUES
(9, 'abchate', 'ali', '+2693582728', '2021', 'kwassa kwassa', 'Anjouan', 'mutsamudu', '2021-10-19 01:37:00', 'Ngazidja', 'chindini', '2021-10-19 04:40:00', '1', '1', '32500', '', '887392616c64caa36f21523809', '', 'Payé', '8512896177a9dd306254911192', '2021-10-26 07:10:21'),
(17, 'abchate', 'ali', '+2693582728', 'nga123', 'rapide one', 'Ngazidja', 'moroni', '2021-10-29 10:45:00', 'Mohéli', 'fomboni', '2021-10-29 12:47:00', '1', '2', '42500', '8821436172fa05096f73461768', '887392616c64caa36f21523809', '3323019', 'Non Payé', '74653761791bd5a08bd3868082', '2021-10-27 09:28:53'),
(18, 'abchate', 'ali', '+2693582728', 'nga123', 'rapide one', 'Ngazidja', 'moroni', '2021-10-29 10:45:00', 'Mohéli', 'fomboni', '2021-10-29 12:47:00', '1', '1', '32500', '8821436172fa05096f73461768', '887392616c64caa36f21523809', '3323019', 'Non Payé', '50100661791dd04f72f3059370', '2021-10-27 09:37:20'),
(19, 'abchate', 'ali', '+2693582728', 'nga123', 'rapide one', 'Ngazidja', 'moroni', '2021-10-29 10:45:00', 'Mohéli', 'fomboni', '2021-10-29 12:47:00', '0', '0', '15000', '8821436172fa05096f73461768', '887392616c64caa36f21523809', '3323019', 'Non Payé', '490785617d340378fec7934690', '2021-10-30 12:01:07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_nom` varchar(255) NOT NULL,
  `u_prenom` varchar(255) NOT NULL,
  `u_nin` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `u_pid` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_date` datetime NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`u_id`, `u_nom`, `u_prenom`, `u_nin`, `u_phone`, `u_blocked`, `u_pid`, `u_pass`, `u_date`) VALUES
(1, 'Admin', 'Root', 'UI152346', '3323019', 0, '887392616c64caa36f21523809', 'sha21-e10adc3949ba59abbe56e057f20f883e', '2021-10-17 18:00:42'),
(8, 'Ibrahim', 'Abchate', '123', '3582728', 0, '203241616eb334d00187786021', 'sha21-76f93c1ed4d5d4143f70e1b79badeb8e', '2021-10-19 11:59:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
