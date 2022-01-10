-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 jan. 2022 à 06:28
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agenceimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartements`
--

CREATE TABLE `appartements` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `titre` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `ville` varchar(55) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `numero_etage` int(11) NOT NULL,
  `nombre_pieces` int(11) NOT NULL,
  `a_vendre` tinyint(1) NOT NULL DEFAULT 0,
  `meuble` tinyint(1) NOT NULL DEFAULT 0,
  `ascensseur` tinyint(1) NOT NULL DEFAULT 0,
  `terasse` tinyint(1) NOT NULL DEFAULT 0,
  `balcon` tinyint(1) NOT NULL DEFAULT 0,
  `date_publication` date NOT NULL,
  `une` tinyint(1) NOT NULL DEFAULT 0,
  `main_image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartements`
--

INSERT INTO `appartements` (`id`, `prix`, `superficie`, `titre`, `description`, `adresse`, `ville`, `code_postal`, `numero_etage`, `nombre_pieces`, `a_vendre`, `meuble`, `ascensseur`, `terasse`, `balcon`, `date_publication`, `une`, `main_image`) VALUES
(12, 300, 20, 'Studio Beaulieu', 'Studio pour étudiant bien équipé situé pas loin du campus de Beaulieu', '8 Avenue Pierre Donzelot', 'Rennes', '35700', 3, 1, 1, 1, 0, 0, 1, '2022-01-03', 0, 'studio1.jpg'),
(13, 300000, 46, 'Appartement à vendre, Villejean', 'Vend appartement spacieux et neuf à vendre, nous contacter pour eventuelle visite', '2 rue d\'Alasace', 'Rennes', '35000', 2, 3, 1, 1, 1, 0, 1, '2022-01-07', 1, 'appartement1.jpg'),
(14, 750, 54, 'Appartement tout neuf à louer', 'appartement neuf et lumineux parfait pour jeune couple ', '16 rue Pierre Martin', 'Rennes', '35000', 1, 3, 1, 1, 0, 0, 1, '2022-01-07', 1, 'appartement2.jpg'),
(15, 1950, 89, 'Luxieux 5 pièces à louer', 'Loue appartement remis à neuf recemment, cuisine dernier cris, 3 chambres et dispose d\'une terrasse, disponible dès maintenant', '137 Bd de l\'Hopital', 'Paris', '75013', 0, 5, 1, 1, 0, 1, 0, '2022-01-05', 0, 'appartement3.jpg'),
(16, 275000, 35, 'T2 plein centre à vendre', 'Appartement 2 pièces à vendre, à proximité de tout, neuf et lumineux', '34 rue Jean Guéhenno', 'Rennes', '35000', 5, 2, 1, 1, 1, 0, 0, '2022-01-04', 1, 'appartement4.jpg'),
(17, 520000, 56, 'Appartement moderne à vendre', 'Appartement remis à neuf, situé au nord de Rennes, cuisine, salle de bain bien équipé, 2 chambres', '5 rue du Blavet', 'Rennes', '35000', 2, 3, 1, 1, 0, 0, 0, '2022-01-07', 1, 'appartement5.jpg'),
(18, 280, 19, 'Studio étudiant meublé', 'Studio pour étudiant meublé et équipé d\'une kitchenette', '3 rue Jean Jacques Rousseau', 'Rennes', '35000', 3, 1, 0, 1, 0, 0, 0, '2022-01-09', 0, 'studio2.jpg'),
(19, 1200, 89, 'Luxieux 5 pièces à louer', 'Loue appartement remis à neuf recemment, cuisine dernier cris, 3 chambres et dispose d\'une terrasse, disponible dès maintenant', '78 rue de Jihan', 'Rennes', '75000', 0, 5, 1, 1, 0, 1, 0, '2022-01-05', 1, 'appartement3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `facebook` varchar(55) NOT NULL,
  `instagram` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`facebook`, `instagram`, `mail`, `telephone`) VALUES
('https://www.facebook.com/', 'https://www.instagram.com/?hl=fr', 'tridentimmobilier@gmail.com', '0222468159');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `taille_img` int(11) DEFAULT NULL,
  `nom_img` varchar(55) DEFAULT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id`, `taille_img`, `nom_img`, `description`) VALUES
(1, 102, 'agence.jpg', 'Trident immobilier oeuvre depuis plus de 30 ans pour vous aider à trouver l\'appartement de vos rêves. D\'abords affaire familiale nous nous sommes développé dans toute le France et sommes présent dans une dizaine de ville pour vous accompagné ou que vous êtes.'),
(2, 94, 'agent.jpg', 'Nos agents immobiliers sont formés pour vous accompagner du mieux possible lors de vos recherches et seront toujours à l\'écoute pour vous aider à la moindre difficulté. n\'hésiter pas à leur poser des questions ils seront ravis de discuter avec vous.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `mail` varchar(55) DEFAULT NULL,
  `username` varchar(55) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `pass_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `username`, `is_admin`, `pass_hash`) VALUES
(1, 'Perrier', 'Julien', NULL, 'jperrier', 1, '$2y$10$16Vr8OacMxA/byxdkMsvdu6Z3tHHDO1PsK8d77RcuD70nA7/pzE2K'),
(2, 'Dupont', 'Jean', NULL, 'jeanjean', 0, '$2y$10$URac3WlhAsp79ocObFv9ieqnApJv9Oo5yMF2ITdRo7iucWlO1nITu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartements`
--
ALTER TABLE `appartements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appartements`
--
ALTER TABLE `appartements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
