-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 08 juin 2023 à 09:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medical_data`
--

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `pkeyPatients` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `num_secu` varchar(15) NOT NULL,
  `num_tel` varchar(15) DEFAULT NULL,
  `antecedents` text DEFAULT NULL,
  `a_un_RDV` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`pkeyPatients`, `prenom`, `nom`, `birthdate`, `num_secu`, `num_tel`, `antecedents`, `a_un_RDV`) VALUES
(1, 'paul', 'tardieu', '2003-03-31', '0123456789', '31415926535897', 'test voyons voir', 0);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `pkeyRDV` int(11) NOT NULL,
  `pkey_patients` int(11) DEFAULT NULL,
  `Date_RDV` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `pkey_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `pkeyUsers` int(10) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pkeyUsers`, `prenom`, `nom`, `email`, `password`, `status`, `admin`) VALUES
(2, 'tardieu', 'paul', 'tardieu.paul@gmail.com', '$2y$10$.itCOECJXHB5D0k4dqedHe/', 'pole1', NULL),
(3, 'test', 'test', 'test@gmail.com', '$2y$10$PdTbtlN7yJ2U4M/MlbZ7WO3', 'pole4', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pkeyPatients`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`pkeyRDV`),
  ADD KEY `pkey_patients` (`pkey_patients`),
  ADD KEY `pkey_users` (`pkey_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pkeyUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `pkeyPatients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `pkeyRDV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `pkeyUsers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`pkey_patients`) REFERENCES `patients` (`pkeyPatients`),
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`pkey_users`) REFERENCES `users` (`pkeyUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
