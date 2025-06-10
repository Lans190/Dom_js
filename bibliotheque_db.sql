-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 juin 2025 à 16:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `annee_publication` int(11) DEFAULT NULL,
  `categories` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `annee_publication`, `categories`, `image`) VALUES
(1, 'Le Mystère des Sables', 'Jean Dupont', 1999, '	Roman', 'livre.jpg'),
(2, 'Les Secrets de l\'Océan', 'Marie Claire', 2018, 'Aventure', 'livre2.jpg'),
(3, 'Voyage au-delà des Étoiles', 'Alain Durand', 2022, 'Science-fiction', 'livre3.jpg'),
(4, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 1943, 'Conte', 'le_petit_prince.jpg'),
(5, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 1997, 'Fantastique', 'hp1.jpg'),
(6, 'Le Da Vinci Code', 'Dan Brown', 2003, 'Thriller', 'da_vinci_code.jpg'),
(7, 'Les Misérables', 'Victor Hugo', 1862, 'Roman historique', 'les_miserables.jpg'),
(8, 'L\'Alchimiste', 'Paulo Coelho', 1988, 'Roman philosophique', 'alchimiste.jpg'),
(9, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 1943, 'Conte', 'le_petit_prince.jpg'),
(10, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 1997, 'Fantastique', 'hp1.jpg'),
(11, 'Le Da Vinci Code', 'Dan Brown', 2003, 'Thriller', 'da_vinci_code.jpg'),
(12, 'Les Misérables', 'Victor Hugo', 1862, 'Roman historique', 'les_miserables.jpg'),
(13, 'L\'Alchimiste', 'Paulo Coelho', 1988, 'Roman philosophique', 'alchimiste.jpg'),
(14, 'Pride and Prejudice', 'Jane Austen', 1813, 'Roman classique', 'pride_prejudice.jpg'),
(15, '1984', 'George Orwell', 1949, 'Science-fiction', '1984.jpg'),
(16, 'Le Seigneur des Anneaux', 'J.R.R. Tolkien', 1954, 'Fantasy', 'lord_of_the_rings.jpg'),
(17, 'To Kill a Mockingbird', 'Harper Lee', 1960, 'Roman', 'to_kill_a_mockingbird.jpg'),
(18, 'Moby Dick', 'Herman Melville', 1851, 'Aventure', 'moby_dick.jpg'),
(19, 'Germinal', 'Émile Zola', 1885, 'Roman social', 'germinal.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
