-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 sep. 2024 à 18:12
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tsenako`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `produit` varchar(950) NOT NULL,
  `total_prix` varchar(20) NOT NULL,
  `acheteur` varchar(250) NOT NULL,
  `id_acheteur` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `produit`, `total_prix`, `acheteur`, `id_acheteur`) VALUES
(14, 'Motrine', '12000', 'Client', 11),
(15, 'Doliprane', '50000', 'Client', 11),
(16, 'PlayStation 5', '20000000', 'Client', 11),
(17, 'Spider-Man \"Miles Morales\"', '5000', 'Client', 11),
(18, 'Grand Theft Auto V', '10000', 'Client', 11),
(19, 'iPhone 11', '10000000', 'Client', 11),
(20, 'Lapoaly', '100000', 'Client', 11),
(21, 'PlayStation 5', '60000000', 'Client', 11);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prix` int(10) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  `nombre` int(10) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `categorie`, `nombre`, `photo`) VALUES
(14, 'Lapoaly', 20000, 'Cuisine', 0, 'image-1688443938790-406336751.jpg'),
(15, 'PlayStation 5', 4000000, 'Technologie', 15, 'image-1686032942996-911874293.jpg'),
(16, 'Spider-Man \"Miles Morales\"', 5000, 'Jeux vidéo', 24, 'image-1688735541781-869753677.jpg'),
(17, 'Grand Theft Auto V', 10000, 'Jeux vidéo', 14, 'image-1688735581511-313288000.jpg'),
(18, 'Mac Book Pro ', 4000000, 'Technologie', 8, 'image-1686032399843-677914959.jpg'),
(19, 'iPhone 11', 2000000, 'Technologie', 0, 'image-1686032735672-310610576.jpg'),
(20, 'PlayStation 2', 150000, 'Technologie', 2, 'image-1688735804248-980182344.jpg'),
(21, 'Vilany', 20000, 'Cuisine', 50, 'image-1688736119168-892599823.jpg'),
(22, 'Acer Predator', 4000000, 'Technologie', 9, 'image-1688735974257-55826025.jpg'),
(23, 'Redmi Note 10', 700000, 'Technologie', 24, 'image-1688736006937-910271658.jpg'),
(24, 'Air Jordan One', 90000, 'Chausure', 8, 'image-1689016747731-537337875.jpg'),
(25, 'fond', 10000, 'Technologie', 14, 'Capture d\'écran 2024-05-14 160846.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `password`, `role`) VALUES
(5, 'Admin', 'admin@admin.com', '$2y$10$HFlHddMwbP9CyJm23PjEnu8e4Wwdb2sUr0W26NNsiW0iGZWBE7c1.', 'admin'),
(11, 'Client', 'client@gmail.com', '$2y$10$nBPx7K2fB6wMxL453Ey8r.9zDBLey0sV/WMvixELfV6GHsawT6rF6', 'client'),
(12, 'Koto', 'koto@gmail.com', '$2y$10$4yemAgJq2KkplddP4i2ErO7M.SbWA7XYKcjzGM/DJPFahXGsqWTSa', 'client'),
(14, 'Rabr', 'rabe@gmail.com', '$2y$10$yzqYW5Nph35sk.oa2ut0e.cyUr0PsDmMI2ZVoDBnGandvFIr5trlm', 'client'),
(15, 'Paracetamole', 'para@gmail.com', '$2y$10$rHV0bkggUETbY7drbR1RjOe0cQuu5E2.XzQUWIG8hp24UFrBX/Ux.', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
