-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 avr. 2021 à 21:03
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'grabs'),
(4, 'rotations'),
(5, 'flips'),
(6, 'slids'),
(7, 'One Foot Tricks');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trick_id` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CB281BE2E` (`trick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210316144833', '2021-03-16 14:48:56', 180),
('DoctrineMigrations\\Version20210316152059', '2021-03-16 15:21:32', 37),
('DoctrineMigrations\\Version20210316152113', '2021-03-16 15:31:30', 39),
('DoctrineMigrations\\Version20210316153042', '2021-03-16 15:31:30', 32),
('DoctrineMigrations\\Version20210316155647', '2021-03-16 15:56:51', 40),
('DoctrineMigrations\\Version20210317112224', '2021-03-17 11:22:59', 186),
('DoctrineMigrations\\Version20210317164408', '2021-03-17 16:44:27', 146),
('DoctrineMigrations\\Version20210317172321', '2021-03-17 17:23:31', 97),
('DoctrineMigrations\\Version20210317175853', '2021-03-17 17:59:00', 134),
('DoctrineMigrations\\Version20210319082709', '2021-03-19 08:27:20', 823),
('DoctrineMigrations\\Version20210319160129', '2021-03-19 16:01:57', 130),
('DoctrineMigrations\\Version20210322103632', '2021-03-22 10:36:51', 206),
('DoctrineMigrations\\Version20210322104102', '2021-03-22 10:41:10', 43),
('DoctrineMigrations\\Version20210322104835', '2021-03-22 10:48:58', 86),
('DoctrineMigrations\\Version20210322111816', '2021-03-22 11:18:53', 118),
('DoctrineMigrations\\Version20210322164027', '2021-03-22 16:40:36', 585),
('DoctrineMigrations\\Version20210323093919', '2021-03-23 09:52:39', 56),
('DoctrineMigrations\\Version20210323100049', '2021-03-23 10:00:54', 113),
('DoctrineMigrations\\Version20210324173555', '2021-03-24 17:36:11', 257),
('DoctrineMigrations\\Version20210325092023', '2021-03-25 09:20:32', 112),
('DoctrineMigrations\\Version20210329140147', '2021-03-29 14:02:02', 542),
('DoctrineMigrations\\Version20210414145501', '2021-04-14 14:55:16', 89),
('DoctrineMigrations\\Version20210414145652', '2021-04-14 14:56:57', 52),
('DoctrineMigrations\\Version20210414151327', '2021-04-14 15:13:33', 72);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trick_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E01FBE6AB281BE2E` (`trick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `filename`, `trick_id`) VALUES
(43, '9fb37136f04aea5269cdc41914543c59.jpg', 326),
(44, '8a686e8010b9e3fec5b9f10619d7a1ce.jpg', 327),
(45, 'b0d64da7dc9b35e6263956517671c622.jpg', 327),
(46, 'cb58fc36d1be65170af4d6bf5e58983a.jpg', 328),
(47, 'db8cd25894c6615f38f3451d6cae97ef.webp', 329),
(48, 'ac8c0ac9aed440edea05c3bd078b6d55.jpg', 330),
(49, '0f924a4173dfb7974d62ed1ad6f70129.jpg', 331),
(50, '1f765949c8c6dc0eb16bce09bab976dd.webp', 332),
(51, 'f55f5ed63fb95e25317a27eaac292c2a.jpg', 333),
(52, '2358fde8f826bcfd8dbce94416647709.webp', 334),
(53, '068fe878cb0016c3645d36f343376104.jpg', 335),
(54, '8788b48cc7ba07fef4b862490615f2e4.webp', 336),
(55, '10648cfdacd8d8f94b7fa25f8aea04c8.jpg', 337),
(56, '84cb32a1e124e07417067ebb0de62dd3.webp', 338),
(57, 'bfd7b8a17b57fe0f1a2914f30f897f64.jpg', 339);

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

DROP TABLE IF EXISTS `trick`;
CREATE TABLE IF NOT EXISTS `trick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `create_date` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_update` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8F0A91E12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `name`, `description`, `category_id`, `create_date`, `date_update`) VALUES
(326, 'mute', 'saisie de la carre frontside de la planche entre les deux pieds avec la main avant', 3, '21-04-2021', '21-04-2021'),
(327, 'sad', 'Aussi appelé melancholie ou style week, saisie de la carre backside de la planche, entre les deux pieds, avec la main avant', 3, '21-04-2021', '21-04-2021'),
(328, 'indy', 'saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière', 3, '21-04-2021', '21-04-2021'),
(329, '180', 'un 180 désigne un demi-tour, soit 180 degrés d\'angle', 4, '21-04-2021', '21-04-2021'),
(330, '360', 'trois six pour un tour complet', 4, '21-04-2021', '21-04-2021'),
(331, 'front flips', 'Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière.\r\n\r\nIl est possible de faire plusieurs flips à la suite, et d\'ajouter un grab à la rotation.\r\n\r\nLes flips agrémentés d\'une vrille existent aussi (Mac Twist, Hakon Flip...), mais de manière beaucoup plus rare, et se confondent souvent avec certaines rotations horizontales désaxées.\r\n\r\nNéanmoins, en dépit de la difficulté technique relative d\'une telle figure, le danger de retomber sur la tête ou la nuque est réel et conduit certaines stations de ski à interdire de telles figures dans ses snowparks.', 5, '21-04-2021', '21-04-2021'),
(332, 'Les rotations désaxées', 'Une rotation désaxée est une rotation initialement horizontale mais lancée avec un mouvement des épaules particulier qui désaxe la rotation. Il existe différents types de rotations désaxées (corkscrew ou cork, rodeo, misty, etc.) en fonction de la manière dont est lancé le buste. Certaines de ces rotations, bien qu\'initialement horizontales, font passer la tête en bas.\r\n\r\nBien que certaines de ces rotations soient plus faciles à faire sur un certain nombre de tours (ou de demi-tours) que d\'autres, il est en théorie possible de d\'attérir n\'importe quelle rotation désaxée avec n\'importe quel nombre de tours, en jouant sur la quantité de désaxage afin de se retrouver à la position verticale au moment voulu.\r\n\r\nIl est également possible d\'agrémenter une rotation désaxée par un grab.', 4, '21-04-2021', '21-04-2021'),
(333, 'slides', 'Un slide consiste à glisser sur une barre de slide. Le slide se fait soit avec la planche dans l\'axe de la barre, soit perpendiculaire, soit plus ou moins désaxé.\r\n\r\nOn peut slider avec la planche centrée par rapport à la barre (celle-ci se situe approximativement au-dessous des pieds du rideur), mais aussi en nose slide, c\'est-à-dire l\'avant de la planche sur la barre, ou en tail slide, l\'arrière de la planche sur la barre.', 6, '21-04-2021', '21-04-2021'),
(334, 'Les one foot tricks', 'Figures réalisée avec un pied décroché de la fixation, afin de tendre la jambe correspondante pour mettre en évidence le fait que le pied n\'est pas fixé. Ce type de figure est extrêmement dangereuse pour les ligaments du genou en cas de mauvaise réception.', 7, '21-04-2021', '21-04-2021'),
(335, 'stalefish', 'saisie de la carre backside de la planche entre les deux pieds avec la main arrière', 3, '21-04-2021', '21-04-2021'),
(336, 'tail grab', 'saisie de la partie arrière de la planche, avec la main arrière', 3, '21-04-2021', '21-04-2021'),
(337, 'nose grab', 'saisie de la partie avant de la planche, avec la main avant', 3, '21-04-2021', '21-04-2021'),
(338, 'japan air', 'saisie de l\'avant de la planche, avec la main avant, du côté de la carre frontside', 3, '21-04-2021', '21-04-2021'),
(339, 'seat belt', 'saisie du carre frontside à l\'arrière avec la main avant', 3, '21-04-2021', '21-04-2021');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `activation_token`, `reset_token`) VALUES
(19, 'tristan.meillat28@gmail.com', '[]', '$2y$13$SlJyeC39pIXpvRAxzCdEWOwu5s3VIBrjh/qrWva7nDOInIlJhF6jy', 'elfepee', NULL, 'u_Rqi2oVtoT7mPFTD-xTGmNbcU8SjnOLTvuHTKrUd94');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trick_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29AA6432B281BE2E` (`trick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `trick_id`, `url`) VALUES
(29, 327, '<iframe src=\"//www.youtube.com/embed/KEdFwJ4SWq4\" allowfullscreen></iframe>'),
(30, 328, '<iframe src=\"//www.youtube.com/embed/6yA3XqjTh_w\" allowfullscreen></iframe>'),
(31, 329, '<iframe src=\"//www.youtube.com/embed/NQ1MERtpFLQ\" allowfullscreen></iframe>'),
(32, 330, '<iframe src=\"//www.youtube.com/embed/JJy39dO_PPE\" allowfullscreen></iframe>'),
(48, 326, '<iframe src=\"//www.youtube.com/embed/jm19nEvmZgM\" allowfullscreen></iframe>'),
(49, 331, '<iframe src=\"//www.youtube.com/embed/xhvqu2XBvI0\" allowfullscreen></iframe>'),
(50, 331, '<iframe src=\"//www.youtube.com/embed/xhvqu2XBvI0\" allowfullscreen></iframe>');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_E01FBE6AB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `trick`
--
ALTER TABLE `trick`
  ADD CONSTRAINT `FK_D8F0A91E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `FK_29AA6432B281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
