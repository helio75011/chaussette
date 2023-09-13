-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 sep. 2023 à 12:50
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `admin_ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `name`) VALUES
(1, 'Nike'),
(2, 'Addidas'),
(3, 'Kappa'),
(4, 'Fila');

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `size_id` int(11) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `models`
--

INSERT INTO `models` (`id`, `marque_id`, `title`, `description`, `size_id`, `photo_path`) VALUES
(35, 3, 'mo', 'uj', 3, 'uploads/SMX_4663__6_.png');

-- --------------------------------------------------------

--
-- Structure de la table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`) VALUES
(1, '38'),
(2, '40'),
(3, '36'),
(4, '43');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`, `email`, `date_creation`) VALUES
(1, 'admin', NULL, '$2y$10$poyWDwitP6bqpStjPfcF9.2PLE6/I/vSlm6ta34UPYYkfRF9jrioy', 'admin@example.com', '2023-09-12 09:54:36'),
(2, 'hélio', NULL, '$2y$10$vKAkImnTkNiIsGwQ0oP3YOzIgHF12TGygOspL8OPsl27S13MPYqwy', 'test@gmail.com', '2023-09-12 10:21:58'),
(3, 'test', NULL, 'test', 'test@test.com', '2023-09-12 09:54:37'),
(4, 'toto', 'admin', 'toto', 'toto@toto.com', '2023-09-12 09:54:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`marque_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Index pour la table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_name` (`size_name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
