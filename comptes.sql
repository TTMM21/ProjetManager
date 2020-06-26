-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 juin 2020 à 17:08
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id_compte` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `malvoyant` tinyint(1) NOT NULL DEFAULT 0,
  `id_statuts` int(1) NOT NULL,
  `id_equipes` int(1) DEFAULT NULL,
  `id_langues` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id_compte`, `nom`, `prenom`, `email`, `mdp`, `actif`, `malvoyant`, `id_statuts`, `id_equipes`, `id_langues`) VALUES
(5, 'Utilisateur', 'client', 'utilisateur.client@ConceptEtCo.com', 'utilisateur1234', 1, 0, 1, 28, 1),
(6, 'Employe', 'Utilisateur', 'Utilisateur.Employe@ConceptEtCo', 'utilisateur1234', 1, 0, 2, 28, 1),
(7, 'ADM', 'Utilisateur', 'Utilisateur.ADM@ConsptEtCo.com', 'utilisateur1234', 1, 0, 3, 28, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id_compte`),
  ADD KEY `COMPTES_STATUTS_FK` (`id_statuts`),
  ADD KEY `COMPTES_EQUIPES_FK` (`id_equipes`),
  ADD KEY `COMPTES_LANGUES_FK` (`id_langues`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `COMPTES_EQUIPES_FK` FOREIGN KEY (`id_equipes`) REFERENCES `equipes` (`id_equipes`),
  ADD CONSTRAINT `COMPTES_LANGUES_FK` FOREIGN KEY (`id_langues`) REFERENCES `langues` (`id_langues`),
  ADD CONSTRAINT `COMPTES_STATUTS_FK` FOREIGN KEY (`id_statuts`) REFERENCES `statuts` (`id_statuts`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
