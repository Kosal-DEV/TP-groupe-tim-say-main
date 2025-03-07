-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 fév. 2025 à 22:27
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cities`
--

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city_country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city_capital` tinyint(1) NOT NULL,
  `city_nationality` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id_city`, `city_name`, `city_country`, `city_capital`, `city_nationality`) VALUES
(1, 'Bruxelles', 'Belgique', 1, 'Belge'),
(2, 'Amsterdam', 'Pays-Bas', 1, 'Néerlandais·e'),
(3, 'Tokyo', 'Japon', 1, 'Japonais·e'),
(4, 'Arlon', 'Belgique', 0, 'Arlonnais·e'),
(5, 'Christchurch', 'Nouvelle-Zélande', 0, 'Noé-Zélandais·e'),
(6, 'Vientiane', 'Laos', 1, 'Lao'),
(7, 'Barcelone', 'Espagne', 0, 'Espagnole'),
(8, 'Rome', 'Italie', 1, 'Italien·ne'),
(9, 'Zurich', 'Suisse', 1, 'Suisse·sse'),
(10, 'Berlin', 'Allemagne', 1, 'Allemand·e'),
(11, 'Lisbonne', 'Portugal', 1, 'Portugais·e');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_nickname` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_date_of_birth` date NOT NULL,
  `id_city` int DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `Users_Cities_FK` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_firstname`, `user_nickname`, `user_password`, `user_date_of_birth`, `id_city`) VALUES
(1, 'Stockmans', 'Viensay', 'Say', '$2y$10$nhWIdiyYcO7ChEA6VvZxquOM5zlUcIZm/BMgw9iDmm3HYEME/gpQi', '1992-09-29', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_Cities_FK` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
