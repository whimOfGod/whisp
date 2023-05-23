-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 21 mai 2023 à 21:56
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
(43, 'greg', 'thegragsatalieon', 'nikomok@gmail.com', '45478879', ''),
(44, 'aaron kolins', 'TheHybridddd', 'tillduskdawn@gmail.com', '65584984951616', ''),
(45, 'Damon salvatore', 'TheHybrid', 'vampirediairies@gmail.com', '26849889519849', ''),
(46, 'wellcrust', 'theWiewer', 'mickyklaus@gmail.com', '268488189+41', ''),
(47, 'aaron kolins', 'TheHybrid', 'deathstars@gmail.com', '7852752572', ''),
(48, 'mandalorian', 'panda', 'pandacrut@gmail.com', '151518918951', NULL),
(49, 'sherlock holmes', 'sherky', 'sherlockholmes@gmail.com', '1658+61651', NULL),
(50, 'mark landers', 'landers98', 'markyland@gmail.com', '21686151981603', '743387.png'),
(51, 'jack pearl', 'pearl harbor', 'pearlharbor45@gmail.com', '1681695198851+6', NULL),
(52, 'Damon salvatore', 'vampire98', 'thevampirediairies@gmail.com', '123', NULL),
(53, 'hasboul', 'hasboula78', 'hasba@gmail.com', '145', 'IMG_5311 2.JPG'),
(54, 'aaron kolins', '15', 'mickayklaus@gmail.com', '4484', '264254.jpg'),
(55, 'johnny helmet', 'quaterion', 'quaterion41@gmail.com', '12345', NULL),
(56, 'jack dwo', 'jackomiel', 'jackson@gmail.com', '12346', 'IMG_5311 2.JPG'),
(57, 'hercule', 'power74', 'powerduskdawn@gmail.com', '478965', '743387.png'),
(58, 'meugi', 'warano', 'warano12@gmail.com', '48965', '924242.jpg'),
(59, 'livai', 'slayer77', 'attackontitan@gmail.com', '12345788', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `whisps`
--

CREATE TABLE `whisps` (
  `whisps_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tweet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media` tinyblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `whisps`
--

INSERT INTO `whisps` (`whisps_id`, `user_id`, `tweet`, `date`, `media`) VALUES
(149, 47, 'ça va être une journée de folie', '2023-05-20 19:53:04', NULL),
(159, 44, 'tremblez de peur !!!!', '2023-05-20 20:45:16', 0x3633323535342e706e67),
(178, 59, 'la saison 2 de JJK va être un banger !! attention spoil ', '2023-05-21 23:28:54', NULL);

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
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `whisps`
--
ALTER TABLE `whisps`
  MODIFY `whisps_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
