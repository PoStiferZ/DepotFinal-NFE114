-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2024 at 10:39 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapala`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapala_appel`
--

CREATE TABLE `lapala_appel` (
  `id_appel` smallint(6) NOT NULL,
  `libelle` varchar(250) DEFAULT NULL,
  `id_groupe` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapala_appel`
--

INSERT INTO `lapala_appel` (`id_appel`, `libelle`, `id_groupe`) VALUES
(1, 'Maths - 12/02/2024', 1),
(2, 'Anglais - 12/02/2024', 1),
(3, 'Prog Python - 13/02/2024', 1),
(4, 'Prog Python - 13/02/2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lapala_etudiant`
--

CREATE TABLE `lapala_etudiant` (
  `id_etudiant` smallint(6) NOT NULL,
  `id_groupe` smallint(6) DEFAULT NULL,
  `infos` varchar(500) DEFAULT NULL,
  `id_utilisateur` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapala_etudiant`
--

INSERT INTO `lapala_etudiant` (`id_etudiant`, `id_groupe`, `infos`, `id_utilisateur`) VALUES
(1, 1, 'yop yop coincoin', 'barduche'),
(2, 1, 'yop yop coincoin', 'bourg'),
(3, 1, 'yop yop coincoin', 'chardoit'),
(4, 1, 'yop yop coincoin', 'delander'),
(5, 1, 'yop yop coincoin', 'duroux'),
(6, 1, 'yop yop coincoin', 'ermana'),
(7, 1, 'yop yop coincoin', 'gardon'),
(8, 1, 'yop yop coincoin', 'marino'),
(9, 1, 'yop yop coincoin', 'nanda'),
(10, 1, 'yop yop coincoin', 'nordahl'),
(11, 1, 'yop yop coincoin', 'reana'),
(12, 1, 'yop yop coincoin', 'ridek'),
(13, 1, 'yop yop coincoin', 'rouaud'),
(14, 1, 'yop yop coincoin', 'selda'),
(15, 1, 'yop yop coincoin', 'thibaut'),
(16, 1, 'yop yop coincoin', 'verdier'),
(17, 1, 'yop yop coincoin', 'villard');

-- --------------------------------------------------------

--
-- Table structure for table `lapala_feuille`
--

CREATE TABLE `lapala_feuille` (
  `id_appel` smallint(6) NOT NULL,
  `id_etudiant` smallint(6) NOT NULL,
  `present` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapala_feuille`
--

INSERT INTO `lapala_feuille` (`id_appel`, `id_etudiant`, `present`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, NULL),
(1, 6, NULL),
(1, 7, NULL),
(1, 8, NULL),
(1, 9, 1),
(1, 10, NULL),
(1, 11, NULL),
(1, 12, 1),
(1, 13, 1),
(1, 14, NULL),
(1, 15, NULL),
(1, 16, NULL),
(1, 17, NULL),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 5, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(3, 4, NULL),
(3, 5, 1),
(3, 6, 1),
(3, 7, 1),
(3, 8, NULL),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(3, 13, 1),
(3, 14, 1),
(3, 15, NULL),
(3, 16, NULL),
(3, 17, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 1),
(4, 4, NULL),
(4, 5, 1),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(4, 10, 1),
(4, 11, 1),
(4, 12, 1),
(4, 13, 1),
(4, 14, 1),
(4, 15, 1),
(4, 16, 1),
(4, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lapala_groupe`
--

CREATE TABLE `lapala_groupe` (
  `id_groupe` smallint(6) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapala_groupe`
--

INSERT INTO `lapala_groupe` (`id_groupe`, `nom`) VALUES
(1, 'A1 G2');

-- --------------------------------------------------------

--
-- Table structure for table `lapala_utilisateur`
--

CREATE TABLE `lapala_utilisateur` (
  `login` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `droits` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `courriel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapala_utilisateur`
--

INSERT INTO `lapala_utilisateur` (`login`, `pass`, `droits`, `nom`, `prenom`, `courriel`) VALUES
('barduche', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'BARDUCHE', 'Quentin', 'barduche@test.fr'),
('bourg', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'BOURG', 'Yacine', 'bourg@test.fr'),
('chardoit', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'CHARDOIT', 'Matthieu', 'chardoit@test.fr'),
('delander', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'DELANDER', 'Quentin', 'delander@test.fr'),
('duroux', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'DUBOIS', 'Alexandre', 'duroux@test.fr'),
('ermana', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'ERMANA', 'Valerian', 'ermana@test.fr'),
('gardon', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'GARDON', 'Timothe', 'gardon@test.fr'),
('graft', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'prof', 'GRAFT', 'Emlien', 'graft@test.fr'),
('marino', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'MARINO', 'Florent', 'marino@test.fr'),
('nanda', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'NANDA', 'Vanelle', 'nanda@test.fr'),
('nath', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'scolaire', 'GROUDON', 'Nathalie', 'scolaire@scolaire.fr'),
('nordahl', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'NORDAHL', 'Lisot', 'nordahl@test.fr'),
('reana', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'REANA', 'Nicolas', 'reana@test.fr'),
('ridek', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'RIDEK', 'Quentin', 'ridek@test.fr'),
('rouaud', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'ROUAUD', 'Gael', 'rouaud@test.fr'),
('selda', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'SELDA', 'Mathieu', 'selda@test.fr'),
('thibaut', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'THIBAUT', 'Thomas', 'thibaut@test.fr'),
('verdier', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'VERDIER', 'Johan', 'verdier@test.fr'),
('villard', '$2y$10$va9GjgSQlQyyd.PQmyi8.O8/1KvUswUeYWia.KYcaSL8A/2ez9aey', 'etudiant', 'VILLARD', 'Kevin', 'villard@test.fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapala_appel`
--
ALTER TABLE `lapala_appel`
  ADD PRIMARY KEY (`id_appel`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Indexes for table `lapala_etudiant`
--
ALTER TABLE `lapala_etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_groupe` (`id_groupe`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `lapala_feuille`
--
ALTER TABLE `lapala_feuille`
  ADD PRIMARY KEY (`id_appel`,`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Indexes for table `lapala_groupe`
--
ALTER TABLE `lapala_groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Indexes for table `lapala_utilisateur`
--
ALTER TABLE `lapala_utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lapala_appel`
--
ALTER TABLE `lapala_appel`
  ADD CONSTRAINT `lapala_appel_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `lapala_groupe` (`id_groupe`);

--
-- Constraints for table `lapala_etudiant`
--
ALTER TABLE `lapala_etudiant`
  ADD CONSTRAINT `lapala_etudiant_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `lapala_groupe` (`id_groupe`),
  ADD CONSTRAINT `lapala_etudiant_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `lapala_utilisateur` (`login`);

--
-- Constraints for table `lapala_feuille`
--
ALTER TABLE `lapala_feuille`
  ADD CONSTRAINT `lapala_feuille_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `lapala_etudiant` (`id_etudiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
