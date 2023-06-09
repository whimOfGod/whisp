-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 30 juin 2023 à 11:49
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `whisp_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `my_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `nom`, `pseudo`, `mail`, `my_password`, `avatar`) VALUES
(44, 'aaron kolins', 'TheHybridddd', 'tillduskdawn@gmail.com', '65584984951616', ''),
(45, 'Damon salvatore', 'TheHybrid', 'vampirediairies@gmail.com', '26849889519849', ''),
(59, 'livai', 'slayer77', 'attackontitan@gmail.com', '12345788', NULL),
(62, 'joseph jotaro', 'jojo', 'joestar@gmail.com', '012345', NULL),
(63, 'loly brook', 'brooklyn', 'brooky@gmail.com', '12345kgb', '02.jpg'),
(64, 'mirai', 'Daizen', 'lescrotdugame@gmail.com', '0000<à', '264254.jpg'),
(65, 'mandalorian', 'themandalorian', 'manda@gmail.com', '$2y$10$sW1Egil7obPWQS8tpIooauDXIcz2Mde7PXtZ4703gsTnrzTHJxxEy', 'IMG_5310.JPG'),
(66, 'Michael KLAUS', 'furyroad', 'mickyklaus@gmail.com', '$2y$10$Y6C9QY9J72NKyKNXeRiPvOZjIbDD3t9eevYZ6XxbIOvObYxKGEldq', 'IMG_5324.JPG'),
(67, 'adidas', 'yeezy', 'yeezy@gmail.com', '$2y$10$nGSEBv8BJjzrWwpluOP9wu9wyPO2/wJQ8GlnbyesD6iZq2bpWy/Lq', 'Group.png'),
(68, 'hulk', 'hulk', 'marvel@gmail.com', '$2y$10$.eM0rrDPFYbIGRSeA9MJDuP//X5EfGPEzO9vge0QXSpOC/R4DnuBu', 'IMG_5312.JPG'),
(69, 'ddd', 'dddddd', 'ddd@gmail.cpm', '$2y$10$jqBFGeKiFfXGnOs2C6xDs.DRTMDgAaZta23dfEeYVSycRnzYZEbGe', NULL),
(70, 'Jhon wick', 'babayaga', 'wick@gmail.com', '$2y$10$6RsUilCyBtcQf.Uus515..YTao1CFhZA7SLNM2nsU5z0CC9.7eViO', NULL),
(71, 'Regis', 'narrow_path', 'narrow@gmail.com', '$2y$10$wuZOQmrE1S2n1ZpI15dsBujk3J2ez4OBwb6MqHFX.DbUA0NkAXWWu', '264254.jpg'),
(72, 'a', 'azzfg', 'ngfnf@lug.com', '$2y$10$gOOB0a58LVmbl7APySMZnu3.dJkiGJsEgTi0lmuaHipzF21Lwyhsq', NULL),
(73, 'emma', 'Emma_aigrie', 'emmaaig@gmail.com', '$2y$10$IbHtZQnJYv/Gaye5SNUxWuUoTq0EUFwozwWYx6oPshoT44h1hYXoa', NULL),
(74, 'Michael KLAUS', 'lordff', 'lorf@gmail.com', '$2y$10$KGc4cXX1.l/jbgXIEBLxu.H9N7tqYXO.T7kkXiqqGrPPQWKYHL1OK', NULL),
(75, 'yung jin', 'OniMask', 'onimask@gmail.com', '$2y$10$syBbU5H5paYxq4XzJElaZ.w0RPvJhR6zcRts0sdjB4vAKmdez3p5y', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `whisps`
--

CREATE TABLE `whisps` (
  `whisps_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tweet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media` tinyblob,
  `tag` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `whisps`
--

INSERT INTO `whisps` (`whisps_id`, `user_id`, `tweet`, `date`, `media`, `tag`) VALUES
(187, 63, 'Unlimited Blade : hollow parade ! c\'est dope ', '2023-06-18 10:16:36', 0x3738353432352e706e67, ''),
(188, 63, 'Mais les autres suites qu\'ils ont sortis ne sont pas si dope que ça , à part Fate zero qui est un banger de fou furieux ', '2023-06-18 10:17:56', NULL, ''),
(190, 63, 'The hypest vilain in the world of anime ', '2023-06-18 10:35:04', 0x3937353136352e6a7067, ''),
(191, 63, 'La saison 2 est bientôt là, vous n\'êtes pas prêt les gars, lisez les scans wesh !!!!', '2023-06-18 10:37:38', 0x313135303639342e6a7067, ''),
(195, 67, 'One punch ', '2023-06-18 20:33:18', 0x3932343234322e6a7067, NULL),
(196, 67, 'domain expansion !', '2023-06-18 20:49:46', 0x313330313136352e6a7067, 'red'),
(199, 63, 'bjjjj', '2023-06-19 14:01:42', NULL, 'red'),
(201, 69, 'Jujutsu Kaizen c\'est le feeeeuuuu', '2023-06-19 14:24:14', 0x494d475f3533313120322e4a5047, 'green'),
(202, 70, 'mon dernier fou rire', '2023-06-19 14:32:16', 0x494d475f3533313120322e4a5047, 'blue'),
(206, 70, 'bonjour', '2023-06-19 14:53:01', 0x3236343235342e6a7067, 'red'),
(207, 70, 'green', '2023-06-19 14:53:39', 0x494d475f3533313120322e4a5047, 'green'),
(208, 72, 'actuellement en train de faire du saut en parachute :))))', '2023-06-21 12:28:02', NULL, 'red'),
(209, 73, 'j\'ai faim ', '2023-06-23 15:27:27', 0x313030303935382e6a7067, 'red'),
(250, 75, 'jj j iuono ninin ininii', '2023-06-30 08:04:51', NULL, 'green'),
(257, 75, 'ihoihiu buu iggiu buibk', '2023-06-30 08:11:54', 0x3139323078313038302d31303234783537362e706e67, 'blue');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Index pour la table `whisps`
--
ALTER TABLE `whisps`
  ADD PRIMARY KEY (`whisps_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `whisps`
--
ALTER TABLE `whisps`
  MODIFY `whisps_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
