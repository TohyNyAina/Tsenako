-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juil. 2024 à 15:58
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
-- Base de données : `pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `medicament` varchar(950) NOT NULL,
  `total_prix` varchar(20) NOT NULL,
  `acheteur` varchar(250) NOT NULL,
  `id_acheteur` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `medicament`, `total_prix`, `acheteur`, `id_acheteur`) VALUES
(11, '5', '24000', 'kevin', 13),
(12, '7', '20000', 'kevin', 13),
(13, '8', '35000', 'Rabr', 14);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prix` int(10) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  `nombre` int(10) NOT NULL,
  `ordonance` varchar(6) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id`, `nom`, `prix`, `categorie`, `nombre`, `ordonance`, `photo`) VALUES
(5, 'Amoxi', 3000, 'Gélule', 8, '0', 'amoxi.jpg'),
(7, 'Ferevex', 20000, 'Comprimé', 2, '0', 'fervex.jpg'),
(8, 'Doliprane', 5000, 'Comprimé', 10, '0', 'doli.jpg'),
(9, 'Hélicidine', 30000, 'Sirop', 7, '0', 'helicidine.jpg'),
(10, 'Motrine', 6000, 'Gélule', 4, '0', 'motrin-gels-fr.png'),
(12, 'onja', 4, 'Pomade', 54, '1', 'motrin-gels-fr.png');

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
(14, 'Rabr', 'rabe@gmail.com', '$2y$10$yzqYW5Nph35sk.oa2ut0e.cyUr0PsDmMI2ZVoDBnGandvFIr5trlm', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
