-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 avr. 2019 à 04:17
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbase`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cocody Angre'),
(2, 'Benegosso vers ou on coupe tete'),
(3, 'Abraham'),
(4, 'Quatier Elephant'),
(5, 'Village Rasta'),
(6, 'Abobo vers le port'),
(7, 'Yamoussoukro'),
(8, 'Assinie Mafia'),
(9, 'Kinkasha');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(36, 'Jorge Dupont', 'Terrain en vente a Yamoussoukro jolie quartier ebenezer avec tous les papiers au complet', 1500000, 'img1.jpg', 7),
(37, 'Soro Ibrahim', 'Assinie Mafia vente un Jolie Terrain 650m2 en bordure d\'eau', 500000, 'img2.jpg', 8),
(38, 'Oumar Ibn Al-kattab', 'vente Jolie terrain a deux pas du Golf', 2500000, 'img3.jpg', 1),
(39, 'Keffadi', 'Terrain a 100 metre de NaN', 3500000, 'img4.jpg', 1),
(40, 'Rafou', 'Terrain pour les djonkis', 2500000, 'img3.jpg', 2),
(42, 'Kone Tiemoman', 'Jolie propriete avec maison, dependances et plus de 5ha de terrain a 15 minutes de UVCI', 540000, 'img6.jpg', 5),
(43, 'Tarpilga Youssouf', ' terrain en vent a yamoussoukro jolie quartier', 405000, 'img7.jpg', 7),
(44, 'Chiguinanpe Chiguinapan', 'Joli terrain en vente avec tous les condiments au complet', 150000000, 'img8.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone` int(11) NOT NULL,
  `commune` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `age`, `email`, `password`, `phone`, `commune`) VALUES
(7, 'Ouattara', 'Adaman', 10, 'adaman@gmail.com', '25f9e794323b453885f5181f1b624d0b', 40087541, 'port bouet'),
(9, 'Ouattara', 'Moussa', 25, 'moussa.ouattara@uvci.edu.ci', '708210e0fddc3dceddb288eae9490e54', 89346465, 'port bouet');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
