-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 26 avr. 2018 à 17:33
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `isep_kingdome`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cemacs`
--

DROP TABLE IF EXISTS `cemacs`;
CREATE TABLE IF NOT EXISTS `cemacs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `name` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float NOT NULL,
  `device_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sens_or_eff` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `device_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `device_types`
--

DROP TABLE IF EXISTS `device_types`;
CREATE TABLE IF NOT EXISTS `device_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `homes`
--

DROP TABLE IF EXISTS `homes`;
CREATE TABLE IF NOT EXISTS `homes` (
  `country` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `flat_number` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `incoming_messages`
--

DROP TABLE IF EXISTS `incoming_messages`;
CREATE TABLE IF NOT EXISTS `incoming_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `object` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `incoming_messages`
--

INSERT INTO `incoming_messages` (`id`, `mail`, `object`, `content`) VALUES
(4, 'adresse1@test.fr', 'Test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere libero neque, vel semper quam ornare et. Nulla ullamcorper est et ex auctor blandit. Vivamus quis sollicitudin risus. Mauris imperdiet ipsum nec orci eleifend pulvinar. Praesent malesuada lorem id elit porta, non gravida odio auctor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis lectus vel neque elementum fringilla nec non nibh. Duis et eros arcu. Fusce dapibus, mi vel fringilla accumsan, diam ligula blandit odio, ut ornare eros turpis ac ex. Nam posuere interdum magna blandit ornare. Suspendisse eu iaculis lorem, vitae faucibus arcu. Quisque ex augue, cursus sit amet est eu, tempus pretium mi. Aenean a purus consequat, tempus nibh id, hendrerit quam. Pellentesque dictum, ligula a posuere aliquet, tortor lectus venenatis nunc, eu dapibus neque ligula nec lectus. Quisque egestas pretium lorem, eu laoreet turpis gravida vitae.'),
(5, 'adresse2@test.fr', 'Test 2', 'Sed euismod consequat interdum. Nam aliquet lacinia cursus. Nam facilisis finibus tempus. Nam neque nisl, vestibulum sit amet dolor tincidunt, tincidunt tincidunt justo. Nunc ornare mollis erat at pellentesque. Donec posuere, odio eu elementum facilisis, risus risus malesuada urna, hendrerit sodales augue dui vel turpis. Nullam semper, neque quis porta vulputate, augue orci accumsan ligula, ultrices tristique augue est vitae nisl. Fusce malesuada, ligula sit amet aliquet porttitor, ipsum felis blandit felis, in commodo sapien arcu consequat justo. Mauris molestie varius nisi ut laoreet. Pellentesque mattis volutpat enim, nec tincidunt libero pulvinar ut.'),
(6, 'adresse3@test.fr', 'Test 3', 'Nam tempor odio nec dolor commodo, non luctus purus pulvinar. Quisque quis interdum dui, eu finibus libero. Aliquam eget sem mi. Nunc et viverra nibh. In consequat lacus sed massa sodales, aliquam tempus velit maximus. Suspendisse est neque, aliquam mollis posuere at, aliquam dapibus nisi. Nulla mollis, arcu id mollis ullamcorper, tellus libero semper sapien, et porta lorem risus sit amet nibh. Sed ligula felis, auctor a pulvinar vel, lacinia non est. Curabitur viverra at lectus et condimentum. Duis sed ligula neque. Sed varius mi nisi, at euismod metus porttitor sit amet. Quisque ante elit, dictum quis blandit nec, rutrum cursus purus. Vivamus sagittis semper condimentum. Nulla pellentesque sapien et arcu faucibus, non commodo neque lobortis.');

-- --------------------------------------------------------

--
-- Structure de la table `own_home`
--

DROP TABLE IF EXISTS `own_home`;
CREATE TABLE IF NOT EXISTS `own_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `probems_reports`
--

DROP TABLE IF EXISTS `probems_reports`;
CREATE TABLE IF NOT EXISTS `probems_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `home_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `updatable_content`
--

DROP TABLE IF EXISTS `updatable_content`;
CREATE TABLE IF NOT EXISTS `updatable_content` (
  `name` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `civility` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `registration_state` tinyint(1) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `user_type_id` varchar(100) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_firstname`, `user_name`, `civility`, `birth_date`, `adress`, `city`, `zip_code`, `email`, `password`, `tel`, `registration_state`, `registration_date`, `avatar`, `user_type_id`, `child_id`) VALUES
(9, 'Adrien', 'Rabiot', 'Mr', '1997-02-12', '20 rue du parc', 'Paris', 75009, 'adrien.rabiot@isep.fr', '$2y$10$DuT09paQRyFACZcM4wbhG.ftwBxiCt8buQRUF1lVCCyy190Y7byjK', 656679976, 0, '2018-04-20 17:37:29', NULL, '2', NULL),
(11, 'Guillaume', 'test1', 'Mr', '2018-04-04', 'Adresse test', 'Ville test', 11111, 'primaryuser1@test.fr', '$2y$10$x7uNtousmXvMzvEcy7w4.O1eANld3aYwWP0tt.WyfiAzM7cRVTAJa', 606060606, 0, '2018-04-26 11:27:52', NULL, '2', NULL),
(13, 'Guillaume', 'JOUET-PASTRE', 'Mr', '1997-04-01', 'Adresse de Guillaume', 'LCSC', 78170, 'guillaume.jouet-pastre@isep.fr', '$2y$10$CvqRLGck3HLqO9HxMo/Uj..8WgrFLX3Q/3pR0/F5jIi3O4ARsi/bi', 678987654, 0, '2018-04-26 14:28:08', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'primary_user'),
(3, 'secondary_user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
