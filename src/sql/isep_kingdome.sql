-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 juin 2018 à 09:48
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
-- Structure de la table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `content` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`content`, `url`) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar elementum dolor vitae luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut vel sollicitudin purus, vitae dapibus mauris. Sed finibus magna a varius sodales. Maecenas faucibus, arcu porttitor dignissim accumsan, nisi nibh maximus eros, ultricies cursus ipsum tellus porta nisi. Phasellus volutpat dignissim dignissim. Nullam sodales ornare nisl, sed sagittis risus euismod sed. \r\nSed dolor mauris, rhoncus a sem eu, dignissim gravida augue. Quisque tempus tempus iaculis. Vivamus interdum nunc lacus, vitae pharetra leo fringilla nec. Donec suscipit nisl quis enim viverra, nec facilisis odio pharetra. Integer pulvinar tellus sit amet consectetur mattis. Aenean vel finibus elit, in vulputate lacus. Etiam sagittis, massa in finibus fringilla, tortor lectus eleifend massa, non rhoncus turpis magna fermentum metus. Mauris dapibus ligula ac mauris imperdiet dapibus. Nulla ultricies, risus eget varius congue, libero arcu ornare risus, sit amet aliquam justo nibh id lacus. Nulla rutrum aliquam tempus. In eu neque semper, scelerisque eros nec, imperdiet nisl. Nam et leo sollicitudin, ornare mauris sit amet, tempor urna. Nam dignissim augue ut aliquam commodo. Praesent euismod diam nec tellus blandit finibus.', 'https://www.youtube.com/embed/_oHR59FbnOA');

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
(14, 300, '2017-10-01', 20),
(14, 340, '2017-11-01', 21),
(14, 350, '2017-12-01', 22),
(14, 320, '2018-01-01', 23),
(14, 310, '2018-02-01', 24),
(14, 295, '2018-03-01', 25),
(14, 280, '2018-04-01', 26),
(14, 290, '2018-05-01', 27),
(14, 206, '2018-06-01', 28);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  `name` varchar(30) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `on_time` int(11) NOT NULL,
  `last_activation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `device_type_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devices`
--

INSERT INTO `devices` (`id`, `name`, `state`, `on_time`, `last_activation_date`, `device_type_id`, `room_id`, `ref`) VALUES
(170, 'a', 1, 44, '2018-06-11 08:23:04', 1, 19, 1),
(172, 'a', 1, 64, '2018-06-11 08:23:04', 1, 19, 1),
(177, 'a', 1, 44, '2018-06-11 08:23:04', 1, 19, 1),
(181, 'a', 1, 54, '2018-06-11 08:23:04', 1, 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `device_types`
--

DROP TABLE IF EXISTS `device_types`;
CREATE TABLE IF NOT EXISTS `device_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type_capteur_trame` varchar(255) DEFAULT NULL,
  `sens_or_eff` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `device_types`
--

INSERT INTO `device_types` (`id`, `name`, `type_capteur_trame`, `sens_or_eff`) VALUES
(1, 'Humidité', '4', 0),
(2, 'Luminosité', '5', 0),
(3, 'Température', '3', 0),
(4, 'Moteur', 'a', 1),
(5, 'Lampe', '5', 1),
(6, 'Présence', '7', 0);

-- --------------------------------------------------------

--
-- Structure de la table `footer`
--

DROP TABLE IF EXISTS `footer`;
CREATE TABLE IF NOT EXISTS `footer` (
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `mail_address` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `footer`
--

INSERT INTO `footer` (`address`, `phone_number`, `mail_address`, `postal_code`, `city`) VALUES
('2 Place Normandie Niemen', '0606060606', 'olfa.lamti@isep.fr', 94310, 'Orly');

-- --------------------------------------------------------

--
-- Structure de la table `homes`
--

DROP TABLE IF EXISTS `homes`;
CREATE TABLE IF NOT EXISTS `homes` (
  `name_home` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `flat_number` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `homes`
--

INSERT INTO `homes` (`name_home`, `country`, `town`, `zip_code`, `street`, `flat_number`, `id`) VALUES
('Casa de papel', 'Fr', 'Orly', 94310, 'rue Normandie Niemen', 90, 1),
('NDL', 'Fr', 'Issy', 92130, 'rue de Vanves', 1, 3),
('ETGJFGF', 'Fr', 'gghgj', 94310, 'hjhg', 2, 4),
('NDC', 'Fr', 'Paris', 75, 'rue ndc', 2, 5);

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
-- Structure de la table `incoming_messages_panne`
--

DROP TABLE IF EXISTS `incoming_messages_panne`;
CREATE TABLE IF NOT EXISTS `incoming_messages_panne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `nom_capt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `home_id`) VALUES
(22, 'Cuisine', 3),
(16, 'Chambre enfant', 5),
(17, 'Chambre parents', 5),
(18, 'Salle de jeu', 5),
(19, 'Toilette', 1),
(20, 'APP', 4),
(21, 'Cuisine', 1),
(23, 'Salle à manger', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `updatable_content`
--

INSERT INTO `updatable_content` (`name`, `content`, `date`, `id`) VALUES
('catalogue', 'Vous trouverez ici les différents capteurs vendus par DOMISEP.\r\nPour plus d\'informations n\'hésitez pas à nous contacter directement, vous trouverez nos coordonnées en bas de la page.\r\nATTENTION : Il ne s\'agit pas d\'une platforme de vente en ligne, vous ne pourrez donc pas acheter les capteurs directement sur le site.    ', '2018-06-06', 1),
('cgu', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\nPost haec indumentum regale quaerebatur et ministris fucandae purpurae tortis confessisque pectoralem tuniculam sine manicis textam, Maras nomine quidam inductus est ut appellant Christiani diaconus, cuius prolatae litterae scriptae Graeco sermone ad Tyrii textrini praepositum celerari speciem perurgebant quam autem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.\r\nNec minus feminae quoque calamitatum participes fuere similium. nam ex hoc quoque sexu peremptae sunt originis altae conplures, adulteriorum flagitiis obnoxiae vel stuprorum. inter quas notiores fuere Claritas et Flaviana, quarum altera cum duceretur ad mortem, indumento, quo vestita erat, abrepto, ne velemen quidem secreto membrorum sufficiens retinere permissa est. ideoque carnifex nefas admisisse convictus inmane, vivus exustus est.\r\nEt quia Mesopotamiae tractus omnes crebro inquietari sueti praetenturis et stationibus servabantur agrariis, laevorsum flexo itinere Osdroenae subsederat extimas partes, novum parumque aliquando temptatum commentum adgressus. quod si impetrasset, fulminis modo cuncta vastarat. erat autem quod cogitabat huius modi.\r\nQuare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.\r\nProinde die funestis interrogationibus praestituto imaginarius iudex equitum resedit magister adhibitis aliis iam quae essent agenda praedoctis, et adsistebant hinc inde notarii, quid quaesitum esset, quidve responsum, cursim ad Caesarem perferentes, cuius imperio truci, stimulis reginae exsertantis aurem subinde per aulaeum, nec diluere obiecta permissi nec defensi periere conplures.\r\nEmensis itaque difficultatibus multis et nive obrutis callibus plurimis ubi prope Rauracum ventum est ad supercilia fluminis Rheni, resistente multitudine Alamanna pontem suspendere navium conpage Romani vi nimia vetabantur ritu grandinis undique convolantibus telis, et cum id inpossibile videretur, imperator cogitationibus magnis attonitus, quid capesseret ambigebat.\r\nQuam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.\r\nQuod si rectum statuerimus vel concedere amicis, quidquid velint, vel impetrare ab iis, quidquid velimus, perfecta quidem sapientia si simus, nihil habeat res vitii; sed loquimur de iis amicis qui ante oculos sunt, quos vidimus aut de quibus memoriam accepimus, quos novit vita communis. Ex hoc numero nobis exempla sumenda sunt, et eorum quidem maxime qui ad sapientiam proxime accedunt.\r\nTantum autem cuique tribuendum, primum quantum ipse efficere possis, deinde etiam quantum ille quem diligas atque adiuves, sustinere. Non enim neque tu possis, quamvis excellas, omnes tuos ad honores amplissimos perducere, ut Scipio P. Rupilium potuit consulem efficere, fratrem eius L. non potuit. Quod si etiam possis quidvis deferre ad alterum, videndum est tamen, quid ille possit sustinere.\r\nCirca hos dies Lollianus primae lanuginis adulescens, Lampadi filius ex praefecto, exploratius causam Maximino spectante, convictus codicem noxiarum artium nondum per aetatem firmato consilio descripsisse, exulque mittendus, ut sperabatur, patris inpulsu provocavit ad principem, et iussus ad eius comitatum duci, de fumo, ut aiunt, in flammam traditus Phalangio Baeticae consulari cecidit funesti carnificis manu.\r\nUt enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.\r\nOportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.\r\nAuxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.\r\n  ', '2018-06-08', 2),
('mentions légales', 'Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.\r\nNec vox accusatoris ulla licet subditicii in his malorum quaerebatur acervis ut saltem specie tenus crimina praescriptis legum committerentur, quod aliquotiens fecere principes saevi: sed quicquid Caesaris implacabilitati sedisset, id velut fas iusque perpensum confestim urgebatur impleri.\r\nQuanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\nMensarum enim voragines et varias voluptatum inlecebras, ne longius progrediar, praetermitto illuc transiturus quod quidam per ampla spatia urbis subversasque silices sine periculi metu properantes equos velut publicos signatis quod dicitur calceis agitant, familiarium agmina tamquam praedatorios globos post terga trahentes ne Sannione quidem, ut ait comicus, domi relicto. quos imitatae matronae complures opertis capitibus et basternis per latera civitatis cuncta discurrunt.\r\nApud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, equorum adiumento pernicium graciliumque camelorum per diversa se raptantes, in tranquillis vel turbidis rebus: nec eorum quisquam aliquando stivam adprehendit vel arborem colit aut arva subigendo quaeritat victum, sed errant semper per spatia longe lateque distenta sine lare sine sedibus fixis aut legibus: nec idem perferunt diutius caelum aut tractus unius soli illis umquam placet.\r\nIllud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.\r\nHaec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.\r\nPrincipium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.\r\nEt olim licet otiosae sint tribus pacataeque centuriae et nulla suffragiorum certamina set Pompiliani redierit securitas temporis, per omnes tamen quotquot sunt partes terrarum, ut domina suscipitur et regina et ubique patrum reverenda cum auctoritate canities populique Romani nomen circumspectum et verecundum.\r\nHanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\r\nCyprum itidem insulam procul a continenti discretam et portuosam inter municipia crebra urbes duae faciunt claram Salamis et Paphus, altera Iovis delubris altera Veneris templo insignis. tanta autem tamque multiplici fertilitate abundat rerum omnium eadem Cyprus ut nullius externi indigens adminiculi indigenis viribus a fundamento ipso carinae ad supremos usque carbasos aedificet onerariam navem omnibusque armamentis instructam mari committat.\r\nPost haec indumentum regale quaerebatur et ministris fucandae purpurae tortis confessisque pectoralem tuniculam sine manicis textam, Maras nomine quidam inductus est ut appellant Christiani diaconus, cuius prolatae litterae scriptae Graeco sermone ad Tyrii textrini praepositum celerari speciem perurgebant quam autem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.\r\nSaraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\nConstituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.\r\n', '2018-06-08', 3);

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
(14, 'Olfa', 'Lamti', 'Mme', '1997-08-12', '02 rue Normandie Niemen', 'Orly', 94310, 'olfa.lamti@isep.fr', '$2y$10$V/F79W.wLAQ9zcktpcy.WOXoy24XNjpVmpylS68Ch96RL1SjIGEWm', 618760947, 0, '2018-05-01 13:13:31', NULL, '1', NULL),
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
(44, '2018-06-08'),
(1298, '2018-06-10'),
(215, '2018-06-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
