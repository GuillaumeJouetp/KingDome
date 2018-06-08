-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 juin 2018 à 07:21
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

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
  `device_type_name` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(20000) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `catalog`
--

INSERT INTO `catalog` (`id`, `device_type_name`, `name`, `url`) VALUES
(1, 'Humidité', 'Rouge', '../res/images/Catalogue/Humidité_5b17abd29841b.png'),
(2, 'Humidité', '2 bras', '../res/images/Catalogue/Humidité_5b17abd7c3cbf.png'),
(6, 'Luminosité', 'Bleu', '../res/images/Catalogue/Luminosité_5b17ac039f311.png'),
(5, 'Humidité', 'Bleu', '../res/images/Catalogue/Humidité_5b17abfa52e13.png'),
(7, 'Luminosité', '2 bras', '../res/images/Catalogue/Luminosité_5b17ac0944a6a.png'),
(8, 'Luminosité', 'Noir', '../res/images/Catalogue/Luminosité_5b17ac121315e.png'),
(9, 'Température', '2 bras', '../res/images/Catalogue/Température_5b17ac1aba82b.png'),
(10, 'Température', '3 bras', '../res/images/Catalogue/Température_5b17ac20dae20.png'),
(11, 'Température', '3 bras motif 2', '../res/images/Catalogue/Température_5b17ac268dfb0.png'),
(12, 'Moteur', 'Petit moteur', '../res/images/Catalogue/Moteur_5b17ac328d55d.png'),
(13, 'Lampe', 'LED', '../res/images/Catalogue/Lampe_5b17ac3d6d4f8.png'),
(14, 'Lampe', 'LED rgb', '../res/images/Catalogue/Lampe_5b17ac446fa9a.png'),
(15, 'Présence', 'Infrarouge', '../res/images/Catalogue/Présence_5b17ac51a87aa.png'),
(16, 'Présence', 'Infrarouge modele 2', '../res/images/Catalogue/Présence_5b17ac59198e4.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cemacs`
--

INSERT INTO `cemacs` (`id`, `ref`, `state`, `name`, `room_id`) VALUES
(1, 0, 1, 0, 1),
(6, 0, 1, 0, 6),
(14, 0, 1, 0, 14),
(13, 0, 1, 0, 13),
(15, 0, 1, 0, 15),
(16, 0, 1, 0, 16);

-- --------------------------------------------------------

--
-- Structure de la table `conso_mois`
--

DROP TABLE IF EXISTS `conso_mois`;
CREATE TABLE IF NOT EXISTS `conso_mois` (
  `id_user` int(11) NOT NULL,
  `conso` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conso_mois`
--

INSERT INTO `conso_mois` (`id_user`, `conso`, `date`, `id`) VALUES
(15, 320, '2017-06-01', 1),
(15, 340, '2017-07-01', 2),
(15, 310, '2017-08-01', 3),
(15, 305, '2017-09-01', 4),
(15, 310, '2017-09-01', 5),
(15, 300, '2017-10-01', 6),
(15, 340, '2017-11-01', 7),
(15, 350, '2017-12-01', 8),
(15, 320, '2018-01-01', 9),
(15, 310, '2018-02-01', 10),
(15, 295, '2018-03-01', 11),
(15, 280, '2018-04-01', 12),
(15, 290, '2018-05-01', 13),
(15, 275, '2018-06-01', 14),
(14, 320, '2017-06-01', 15),
(14, 340, '2017-07-01', 16),
(14, 310, '2017-08-01', 17),
(14, 305, '2017-09-01', 18),
(14, 310, '2017-09-01', 19),
(14, 300, '2017-10-01', 20),
(14, 340, '2017-11-01', 21),
(14, 350, '2017-12-01', 22),
(14, 320, '2018-01-01', 23),
(14, 310, '2018-02-01', 24),
(14, 295, '2018-03-01', 25),
(14, 280, '2018-04-01', 26),
(14, 290, '2018-05-01', 27),
(14, 275, '2018-06-01', 28);

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float NOT NULL,
  `num_trame` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `type_trame` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `type_requete` int(11) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `datas`
--

INSERT INTO `datas` (`id`, `value`, `num_trame`, `device_id`, `type_trame`, `objet`, `type_requete`, `checksum`, `timestamp`) VALUES
(3, 1234, 0, 1, 1, '7896', 1, '5e', '2018-06-06 11:52:29'),
(4, 1234, 1, 2, 1, '7896', 1, '66', '2018-06-06 11:57:38'),
(5, 1234, 2, 3, 1, '7896', 1, '66', '2018-06-06 12:04:00');

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
  `last_activation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `device_type_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devices`
--

INSERT INTO `devices` (`id`, `sens_or_eff`, `name`, `state`, `last_activation_date`, `device_type_id`, `room_id`) VALUES
(105, 0, 'Température Salon', 0, '2018-05-31 08:42:44', 1, 19),
(106, 0, 'Température', 1, '2018-06-05 08:42:44', 1, 19),
(107, 0, 'Humidité', 1, '2018-06-05 08:42:44', 2, 19);

-- --------------------------------------------------------

--
-- Structure de la table `device_types`
--

DROP TABLE IF EXISTS `device_types`;
CREATE TABLE IF NOT EXISTS `device_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type_capteur_trame` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `device_types`
--

INSERT INTO `device_types` (`id`, `name`, `type_capteur_trame`) VALUES
(1, 'Humidité', '4'),
(2, 'Luminosité', '5'),
(3, 'Température', '3'),
(4, 'Moteur', 'a'),
(5, 'Lampe', '5'),
(6, 'Présence', '7');

-- --------------------------------------------------------

--
-- Structure de la table `homes`
--

DROP TABLE IF EXISTS `homes`;
CREATE TABLE IF NOT EXISTS `homes` (
  `name_home` varchar(100) NOT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `homes`
--

INSERT INTO `homes` (`name_home`, `city`, `zip_code`, `adress`, `id`) VALUES
('Casa de papel', 'Orly', 94310, '90 rue Normandie Niemen', 1),
('NDL', 'Issy', 92130, '1 rue de Vanves', 3),
('ETGJFGF', 'gghgj', 94310, '2 hjhg', 4),
('NDC', 'Paris', 75, '2 rue ndc', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `own_home`
--

INSERT INTO `own_home` (`id`, `user_id`, `house_id`) VALUES
(1, 14, 1),
(6, 15, 1),
(7, 14, 3),
(10, 15, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `home_id`) VALUES
(14, 'Salle à manger', 3),
(15, 'Bureau', 3),
(16, 'Chambre enfant', 5),
(17, 'Chambre parents', 5),
(18, 'Salle de jeu', 5),
(19, 'Toilette', 1),
(20, 'APP', 4),
(21, 'Cuisine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `updatable_content`
--

DROP TABLE IF EXISTS `updatable_content`;
CREATE TABLE IF NOT EXISTS `updatable_content` (
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `updatable_content`
--

INSERT INTO `updatable_content` (`name`, `content`, `date`, `id`) VALUES
('catalogue', 'Vous trouverez ici les différents capteurs vendus par DOMISEP.\r\nPour plus d\'informations n\'hésitez pas à nous contacter directement, vous trouverez nos coordonnées en bas de la page.\r\nATTENTION : Il ne s\'agit pas d\'une platforme de vente en ligne, vous ne pourrez donc pas acheter les capteurs directement sur le site.    ', '2018-06-06', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_firstname`, `user_name`, `civility`, `birth_date`, `adress`, `city`, `zip_code`, `email`, `password`, `tel`, `registration_state`, `registration_date`, `avatar`, `user_type_id`, `child_id`) VALUES
(9, 'Adrien', 'Rabiot', 'Mr', '1997-02-12', '20 rue du parc', 'Paris', 75009, 'adrien.rabiot@isep.fr', '$2y$10$DuT09paQRyFACZcM4wbhG.ftwBxiCt8buQRUF1lVCCyy190Y7byjK', 656679976, 0, '2018-04-20 17:37:29', NULL, '2', NULL),
(11, 'Guillaume', 'test1', 'Mr', '2018-04-04', 'Adresse test', 'Ville test', 11111, 'primaryuser1@test.fr', '$2y$10$x7uNtousmXvMzvEcy7w4.O1eANld3aYwWP0tt.WyfiAzM7cRVTAJa', 606060606, 0, '2018-04-26 11:27:52', NULL, '2', NULL),
(13, 'Guillaume', 'JOUET-PASTRE', 'Mr', '1997-04-01', 'Adresse de Guillaume', 'LCSC', 78170, 'guillaume.jouet-pastre@isep.fr', '$2y$10$CvqRLGck3HLqO9HxMo/Uj..8WgrFLX3Q/3pR0/F5jIi3O4ARsi/bi', 678987654, 0, '2018-04-26 14:28:08', NULL, '1', NULL),
(14, 'Olfa', 'Lamti', 'Mme', '1997-08-12', '02 rue Normandie Niemen', 'Orly', 94310, 'olfa.lamti@isep.fr', '$2y$10$V/F79W.wLAQ9zcktpcy.WOXoy24XNjpVmpylS68Ch96RL1SjIGEWm', 618760947, 0, '2018-05-01 13:13:31', NULL, '2', NULL),
(15, 'Olfa', 'Lamti', 'Mme', '1997-08-12', '10 rue de Vanves', 'Issy', 92130, 'olfalamti@gmail.com', '$2y$10$I5R1xWJ2AdgD4WCVfrh0KuOxS54i74RbuLfEcGkNAQTA7FxAObGy2', 600000000, 0, '2018-05-10 11:00:42', NULL, '2', NULL);

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

-- --------------------------------------------------------

--
-- Structure de la table `visites_jour`
--

DROP TABLE IF EXISTS `visites_jour`;
CREATE TABLE IF NOT EXISTS `visites_jour` (
  `visites` mediumint(9) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visites_jour`
--

INSERT INTO `visites_jour` (`visites`, `date`) VALUES
(20, '2018-05-22'),
(12, '2018-05-28'),
(17, '2018-05-29'),
(8, '2018-06-03'),
(52, '2018-06-04'),
(29, '2018-06-05'),
(79, '2018-06-06'),
(1, '2018-06-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
