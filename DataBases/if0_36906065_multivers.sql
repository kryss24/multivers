-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql110.infinityfree.com
-- Généré le :  ven. 18 avr. 2025 à 13:45
-- Version du serveur :  10.11.9-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_36906065_multivers`
--
CREATE DATABASE multivers;
USE multivers;
-- --------------------------------------------------------

--
-- Structure de la table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register` varchar(50) NOT NULL,
  `idroot` varchar(50) NOT NULL,
  `categories` varchar(10) NOT NULL,
  `profileUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `phone`, `mail`, `password`, `register`, `idroot`, `categories`, `profileUrl`) VALUES
(1, 'NGUETSA DONKA JOLY KRYSS', 697102596, 'mrnguetsa@gmail.com', 'root', 'SuperRoot', '0', 'SuperRoot', 'admin_mrnguetsa@gmail.com.png'),
(2, 'NINTEDEM OCEANNE NATHEL', 697102596, 'ocnath@gmail.com', '$2y$10$RUh5Ab8l4QvVAJ8EIG1ZhuzeqE0FRNPyDMKNkhhlpCK0rAbJOxAoy', 'metoo', '1', 'root', 'admin_ocnath@gmail.com.png'),
(5, 'Nguetsa', 444444444, 'msfolowersnguepang@gmail.com', '$2y$10$/tW0w8RbFc2ZtWKEfqEnZ.rYkVTLA9PeG7RnCbIMRxcHPRex5NaTi', 'root1042024', '1', 'root', 'admin_msfolowersnguepang@gmail.com.png'),
(6, 'Lyne', 444444444, 'lyne@gmail.com', '$2y$10$Zok/nPglV2IqQ0GLBZqq6eQh.fUm3GMtbTJbbAvzpsAfFNSIS192G', 'root2042024', '5', 'root', 'L.png'),
(7, 'kryss', 697102596, 'msfolowersnguepang@gmail.com', '$2y$10$ZZIZyP1EmS9sOJ4JNYLbJuxhAv9XEMmtj0g.3iV9M7XRvsVacohMq', 'root2042024660bc51627ce4', '5', 'root', 'K.png'),
(8, 'NINTEDEM DONGMO OCEANNE NATHEL', 444444444, 'mrnguetsadonka@gmail.com', '$2y$10$9.llbX7kQgmTK0ceZySkBO5VSEyfPy1kPFKmdnYTC0PxUPvZZZonK', 'root2042024root660bc551d63fc', '5', 'root', 'N.png'),
(9, 'Minkow', 697102596, 'asdf@qwert.com', '$2y$10$mhPxUhyshbv7pUFlq6IWPOvotujO1VoKlFG7IycJkrl..u7L/Wgxq', 'root660d76cfbeab6', '5', 'root', 'M.png'),
(10, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$hWB5MIr7VRU8UzpDPKJk8Ouxz5TyzbQDXWJjMstq.mF/BaN8FOPwG', 'root660d82642b98c', '5', 'root', 'L.png'),
(11, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$bPECN6beFlMp.dPOZg/FSu7vCDt1dZjhPpIToqJcPeaOx96HIKQKC', 'root660d83abb6a05', '5', 'root', 'L.png'),
(12, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$ZQBmqxCZeChlpRZJ./ElpOM0P7rxsL0s9FK7Z1zNqB/jtoHuO0Goa', 'root660d83b4ab55b', '5', 'root', 'L.png'),
(13, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$gAwz4M1a/YzI2yo431bpmeuHksQe/e3.XBfcdr7FqA6pcNJqhU38S', 'root660d83bd7eb06', '5', 'root', 'L.png'),
(14, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$V0X37MXAKWgPopmkTt85wOWTebsj5XbMrqFtrmWM6ciyN8ZnQXbqm', 'root660d83c55c8ea', '5', 'root', 'L.png'),
(15, 'LYNE', 465, 'junior@hjkj.com', '$2y$10$6WVDflVssEJ2mBBKW3BqkuNPV6WErh0uJlhdTMvZ8SvL88nMTuGqi', 'root660d83cf07bc9', '5', 'root', 'L.png'),
(17, 'Lune', 697102596, 'lyne@gmail.com', '$2y$10$Se2G4fGakjxZ.YSBAo2JquVKfQtqxyXxBPGSswk0qJ0nP7r.Vawca', 'kryss', '5', 'root', 'admin_lyne@gmail.com.png');

-- --------------------------------------------------------

--
-- Structure de la table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pieces` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categories` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pay` varchar(50) NOT NULL,
  `contactProprio` varchar(15) NOT NULL,
  `nomProprio` varchar(50) NOT NULL,
  `note` int(11) NOT NULL,
  `logitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `house`
--

INSERT INTO `house` (`id`, `title`, `pieces`, `price`, `image`, `description`, `categories`, `etat`, `ville`, `pay`, `contactProprio`, `nomProprio`, `note`, `logitude`, `latitude`) VALUES
(1, 'Fils de Dieu', 7, 350000, 'image_multivers/IMG-20240423-WA0012.jpg', 'Toutes les pieces sont tres spacieux, ', 'Apartement', 1, 'Douala', 'Cameroun', '+237697102596', 'Moi', 3, '9.688037988616736', '4.043006789605903'),
(2, 'Royal Hotel', 20, 250000, 'image_multivers/IMG-20240423-WA0018.jpg', 'Access a la plage', 'Apartement', 1, 'Yaounde', 'Cameroun', '+297697105519', 'Moi', 2, '', ''),
(3, 'La marseillaise', 13, 33000, 'image_multivers/IMG-20240423-WA0063.jpg', 'Meuble 3 etoile ☺', 'Apartement', 1, 'Buea', 'Cameroun', '+237659580776', 'Moi', 4, '', ''),
(4, 'Petit Pay', 5, 35000, 'image_multivers/IMG-20240423-WA0030.jpg', '2 chambres, 1 salon, 1 douches, 1 cuisine interne', 'Studios', 0, 'Paris', 'France', '+212690658807', 'Moi', 5, '', ''),
(5, 'Benedicte', 2, 150000, 'image_multivers/IMG-20240423-WA0021.jpg', 'Climatisastion integrer ♥\r\nPas de commentaire', 'Chambre', 1, 'Dschang', 'Cameroun', '+237675982596', 'Moi', 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `housesubmited`
--

CREATE TABLE `housesubmited` (
  `id` int(11) NOT NULL,
  `proprioName` varchar(50) NOT NULL,
  `proprioNumber` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `housesubmited`
--

INSERT INTO `housesubmited` (`id`, `proprioName`, `proprioNumber`, `longitude`, `latitude`, `etat`) VALUES
(6, 'odkod;old', '697102596', '9.688037988616736', '4.043006789605903', 'configure'),
(7, 'Mbatcha toguem romeo', '697845128', '9.68037988616736', '4.0006789605903', 'no-configure'),
(13, 'hjk', '7890098', '9.735373', '4.057378', 'no-configure');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `typeMessage` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `idUser`, `typeMessage`, `detail`, `etat`, `date_ajout`) VALUES
(21, 1, 'localisation', '1', 0, '27/10/2024 00:48:55'),
(22, 1, 'localisation', '2', 1, '27/10/2024 00:53:14'),
(23, 1, 'localisation', '4', 0, '28/10/2024 21:24:23'),
(24, 1, 'localisation', '4', 0, '28/10/2024 21:28:53');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `urlImage` varchar(50) DEFAULT NULL,
  `notif` text NOT NULL,
  `dateSave` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `idUser`, `title`, `urlImage`, `notif`, `dateSave`, `etat`) VALUES
(1, 1, 'A La Lune', '', 'Pour vous remercier de vos aimable participations, nous organisons une tombola pour tout nos utilisateur', '27/10/24', 0),
(2, 1, 'A La Lune', '', 'Pour vous remercier de vos emable participations, nous organisons une tombola pour tout nos utilisateur', '27/10/24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'Cameroun'),
(2, 'France'),
(3, 'Abidjan');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `id` int(11) NOT NULL,
  `images` varchar(50) NOT NULL,
  `id_house` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id`, `images`, `id_house`) VALUES
(2, 'IMG-20240423-WA0011.jpg', 1),
(5, 'IMG-20240423-WA0010.jpg', 1),
(7, 'IMG-20231223-WA0008.jpg', 2),
(8, 'IMG-20240423-WA0009.jpg', 1),
(9, 'IMG-20240423-WA0008.jpg', 1),
(10, 'IMG-20231223-WA0010.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `mode` varchar(15) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `giveAmount` int(11) NOT NULL,
  `houseId` int(11) NOT NULL,
  `dateFin` varchar(10) NOT NULL DEFAULT '0000-00-00',
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `mode`, `userId`, `totalAmount`, `giveAmount`, `houseId`, `dateFin`, `etat`) VALUES
(1, '2024-04-19', 'mtn_money', 1, 35000, 35000, 4, '0000-00-00', 0),
(2, '2024-04-18', 'mtn_money', 14, 250000, 250000, 2, '0000-00-00', 0),
(7, '0000-00-00', '12', 14, 2055, 350000, 1, '0000-00-00', 0),
(8, '2024-04-19', 'mtn_money', 14, 150000, 15000, 5, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `rigths`
--

CREATE TABLE `rigths` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rigths`
--

INSERT INTO `rigths` (`id`, `title`) VALUES
(1, 'Add'),
(2, 'Update'),
(3, 'Delette');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profileUrl` text NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `matricule`, `password`, `profileUrl`, `mail`) VALUES
(1, 'Nguetsa Donka Joly Kryss', 'SuperRoot', 'AZERTY', 'mrnguetsadonka@gmail.com.png', 'mrnguetsadonka@gmail.com'),
(4, 'NINTEDEM DONGMO OCEANNE NATHEL', 'Pk_kryss', 'Jolykryss@2004', 'N', '0'),
(7, 'NINTEDEM DONGMO OCEANNE NATHEL', 'user', 'Querty123', 'mrnguetsa@gmail.com.png', 'mrnguetsa@gmail.com'),
(9, 'KANA', 'polo', '12223', 'K', 'mail'),
(10, 'tobi', 'tobi', 'Azerty123.', 't', 'tobi@dfgh.com'),
(12, 'HELES BO LOIC L_AVENIR', 'polo1', '12223', 'H', 'mail'),
(13, 'HELES BO LOIC L_AVENIR', 'tobiu', 'Azerty123.', 'H', 'tobui@dfgh.com'),
(14, 'Ngatchuissi Raoul', 'NRboy', 'Razer.123', 'Raoul@gmail.com.png', 'Raoul@gmail.com'),
(15, 'Pablo Rayan', 'Yoop', 'Tss.1234', 'P', 'Rayan@gmail.com'),
(18, 'HELES BO LOIC L AVENIR', 'tobieu', 'Azerty123.', 'H', 'tobi@dfgh.comeu'),
(19, 'Lune', 'Lune', 'Azerty123@', 'L', 'l7204348@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `usersrigths`
--

CREATE TABLE `usersrigths` (
  `id` int(11) NOT NULL,
  `userId` int(100) NOT NULL,
  `rigthId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `usersrigths`
--

INSERT INTO `usersrigths` (`id`, `userId`, `rigthId`) VALUES
(7, 1, 1),
(8, 1, 2),
(27, 2, 3),
(48, 3, 2),
(49, 3, 2),
(50, 3, 2),
(51, 6, 2),
(52, 7, 2),
(53, 9, 2),
(54, 9, 1),
(55, 9, 3),
(56, 10, 2),
(57, 10, 1),
(58, 10, 3),
(59, 11, 2),
(60, 11, 1),
(61, 11, 3),
(62, 12, 2),
(63, 12, 1),
(64, 12, 3),
(65, 16, 2),
(66, 16, 1),
(67, 16, 3),
(68, 17, 2),
(70, 17, 3),
(71, 17, 0),
(72, 1, 0),
(73, 17, 1),
(76, 5, 1),
(77, 5, 2),
(78, 5, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `housesubmited`
--
ALTER TABLE `housesubmited`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_coordinates` (`longitude`,`latitude`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`,`houseId`,`dateFin`),
  ADD UNIQUE KEY `date_2` (`date`,`houseId`,`dateFin`,`etat`);

--
-- Index pour la table `rigths`
--
ALTER TABLE `rigths`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `usersrigths`
--
ALTER TABLE `usersrigths`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `housesubmited`
--
ALTER TABLE `housesubmited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `rigths`
--
ALTER TABLE `rigths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `usersrigths`
--
ALTER TABLE `usersrigths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
