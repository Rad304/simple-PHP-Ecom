-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 19 mai 2019 à 16:27
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `type` varchar(32) NOT NULL,
  `reference` varchar(32) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `prixnormal` decimal(10,0) NOT NULL,
  `prixpromo` decimal(10,0) NOT NULL,
  `photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`type`, `reference`, `designation`, `prixnormal`, `prixpromo`, `photo`) VALUES
('chemise', '12-304E', 'CHEMISE SATINE ANTHONY OF LONDON', '120', '0', 'm12-12-304e-wh_12.jpg'),
('veston', '122600', 'VESTON JACK VICTOR', '595', '549', 'j02-122600-chb.jpg'),
('veston', '2203621', 'VESTON SPORT ORVIETO', '249', '199', 'l05-2203621-ol.jpg'),
('veston', '2203622', 'VESTON SPORT ORVIETO', '249', '199', 'l15-2203622-cha.jpg'),
('veston', '2203633', 'VESTON SPORT ANTHONY OF LONDON', '199', '149', 'd07-2203633-bk.jpg'),
('blouson', '2204981', 'MANTEAU ORVIETO GLACIER', '209', '199', 'm23-2204981-ch.jpg'),
('blouson', '2204982', 'MANTEAU ORVIETO', '199', '129', 'm23-2204982-ice.jpg'),
('blouson', '2204989', 'PARDESSUS ANTHONY OF LONDON', '309', '199', 'd06-2204989-bk.jpg'),
('chemise', '2212780', 'CHEMISE MARCO FERRERA', '59', '39', 'w10-2212780-ny.jpg'),
('chemise', '2212800E', 'CHEMISE ANTHONY OF LONDON', '95', '0', 'm12-2212800e-pr.jpg'),
('chemise', '2212802DE', 'CHEMISE PAOLETTI', '98', '0', 'm12-2212802de-bk.jpg'),
('chemise', '2212807DE', 'CHEMISE ANTHONY OF LONDON', '109', '79', 's17-2212807de-ny.jpg'),
('chemise', '2212808DE', 'CHEMISE ANTHONY OF LONDON', '124', '79', 's17-2212808de-ny.jpg'),
('chemise', '2212899E', 'CHEMISE ANTHONY OF LONDON', '98', '0', 'm12-2212899e-ry.jpg'),
('veston', '22651-02', 'VESTON SPORT ORVIETO', '199', '99', 'b30-22651-02-ny.jpg'),
('veston', '22665-14', 'VESTON SPORT ORVIETO', '149', '0', 'b30-22665-10-gy.jpg'),
('veston', '22671-01', 'VESTON SPORT ORVIETO', '199', '0', 'b30-22671-01-bka.jpg'),
('blouson', '3317', 'MANTEAU RAINFOREST', '325', '0', 'r03-3317-br.jpg'),
('blouson', '3960', 'MANTEAU QUARTZ NATURE', '425', '0', 'q00-3960-rd_1.jpg'),
('blouson', '5418151', 'MANTEAU POINT ZERO', '150', '129', 'p18-5418151-zz.jpg'),
('blouson', '5418285', 'BLOUSON POINT ZERO', '79', '59', 'p18-5418285-bl.jpg'),
('blouson', '5418297', 'BLOUSON POINT ZERO', '79', '59', 'p18-5418297-ice.jpg'),
('chemise', '781153757008', 'CHEMISE LIPSON', '124', '79', 'l14-781153757008-bk.jpg'),
('chemise', '781253757008', 'CHEMISE LIPSON', '125', '79', 'l14-781253757008-bl.jpg'),
('veston', '7JY0062', 'VESTON CALVIN KLEIN', '275', '199', 'p13-7jy0062-bk.jpg'),
('chemise', 'C844564', 'chemise homme', '230', '190', 'GA322D05L-K12@10.jpg'),
('blouson', 'CJK31115', 'BLOUSON SCALA MILANO', '159', '0', 'l02-cjk31115-bka.jpg'),
('chemise', 'HR72734', 'CHEMISE FIL ? FIL H?RST', '88', '0', 'h09-hr72734-brp.jpg'),
('veston', 'V95646', 'Veston avec une fine structure', '540', '490', 'Veston_fine_456486.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@test.com', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 0),
(2, 'guest@gmail.com', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 1),
(3, 'test@test.com', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 1),
(7, 'test6@test.com', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`reference`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
