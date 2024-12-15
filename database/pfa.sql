-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 12:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`) VALUES
(2, 54),
(3, 55),
(4, 56),
(6, 69),
(7, 71),
(8, 72),
(13, 83);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `article_id` int(11) NOT NULL,
  `article` mediumtext NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`article_id`, `article`, `admin_id`) VALUES
(1, 'Une bonne nutrition est essentielle pour maintenir la santé, soutenir la croissance et prévenir les maladies. Une alimentation équilibrée fournit au corps les nutriments clés : glucides pour l\'énergie, protéines pour la réparation des tissus, graisses saines pour la protection des organes, vitamines et minéraux pour le bon fonctionnement du corps, et eau pour l\'hydratation. Manger une variété d\'aliments complets, comme des fruits, légumes, protéines maigres et céréales complètes, favorise le bien-être général et renforce l\'immunité.', 2),
(2, 'Le fitness est crucial pour le bien-être physique et mental. L\'exercice régulier renforce les muscles, améliore la santé cardiovasculaire, augmente l\'endurance et aide à gérer le poids. Il libère également des endorphines, améliorant l\'humeur et réduisant le stress. Une routine équilibrée comprend des exercices cardio, de musculation et de flexibilité. Que ce soit par la course, la musculation ou le yoga, rester actif favorise un meilleur sommeil, une immunité renforcée et une vitalité générale.', 2),
(3, 'Le sport joue un rôle essentiel dans le maintien de la santé physique et mentale. Pratiquer une activité physique régulière renforce le cœur, améliore la circulation sanguine et aide à prévenir des maladies comme l\'hypertension et le diabète. En plus de renforcer les muscles et les os, le sport favorise une meilleure gestion du poids et réduit le stress. Il améliore également la qualité du sommeil et booste le système immunitaire. Intégrer le sport dans la vie quotidienne contribue à une meilleure longévité et à un bien-être général durable.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`) VALUES
(30, 63),
(31, 64),
(33, 80),
(34, 81),
(35, 86);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `cour_id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `jour` varchar(40) NOT NULL,
  `horaire` time NOT NULL,
  `nb max` int(11) NOT NULL,
  `nb act` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`cour_id`, `nom`, `jour`, `horaire`, `nb max`, `nb act`, `trainer_id`) VALUES
(71, 'kick-boxing', 'jeudi', '12:00:00', 2, 2, 30),
(75, 'sprint', 'mardi', '13:00:00', 22, 1, 30),
(82, 'musclation', 'mercredi', '12:00:00', 22, 1, 30),
(83, 'cardio', 'lundi', '12:00:00', 23, 1, 30),
(84, 'yoga', 'samedi', '12:00:00', 22, 1, 30),
(89, 'musclation', 'mardi', '13:00:00', 2, 0, 37);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `inscription_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `cour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`inscription_id`, `client_id`, `cour_id`) VALUES
(84, 31, 75),
(90, 33, 71),
(91, 30, 75),
(93, 35, 84),
(94, 35, 82),
(95, 35, 83);

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

CREATE TABLE `tarifs` (
  `Id` int(40) NOT NULL,
  `period` varchar(40) NOT NULL,
  `Tarifs par personne` varchar(40) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`Id`, `period`, `Tarifs par personne`, `admin_id`) VALUES
(39, '1 Mois', '90 DT', 2),
(41, '2 Mois', '140 DT', 2),
(43, '3 Mois', '190 DT', 2),
(44, '6 Mois', '360 DT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `user_id`) VALUES
(30, 65),
(35, 82),
(36, 84),
(37, 85);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `typee` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `typee`) VALUES
(54, 'monir', 'monir555@gmail.com', 'azertyui', 'admin'),
(55, 'yassinee', 'benyeddjcdjncderyassine7@gmail.com', '$2y$10$gl071EQ7XqsMFpIjM4Jzze7oKxXuJzfcEs0q6NPXD5LMDmRrI0Gz2', 'admin'),
(56, 'nacerr', 'nacer@gmail.com', '$2y$10$LQ3qJszHVTEHvD6tfTv.p.lPFkwWxNtaJaa8kDHTe0hDXnpTsJwry', 'admin'),
(63, 'hamza', 'hamza@gmail.com', '$2y$10$DCFVGUelnKJFrabRxdNIBeB9.LlOZS.dxslUXP.MIRmizXySr/UJy', 'client'),
(64, 'aziz', 'aziz@gmail.com', 'azertyui', 'client'),
(65, 'yassine', 'hamzewi@gmail.com', 'azertyui', 'trainer'),
(69, 'ayoub', 'ayoub@gmail.com', '$2y$10$..V0yKso/5n9KlEg0HUkEO/S4Nb3xMXntAxrRB3TblAqHAUNKeDXK', 'admin'),
(71, 'mohamed', 'mohamed@gmail.com', 'azertyui', 'admin'),
(72, 'hamoda', 'hamoda@gmail.com', '$2y$10$HxhMQXHkGCK17hE2r9Hh9OQEn8GovjIJplGzvy2LJbCicn4N4MNMi', 'admin'),
(80, 'nimo', 'nimo@gmail.com', '$2y$10$ogQn0FLqw3GUatzyyJIys.PNGZyF7yzGQ3Ow8L1pB.HkWX8Ej2kQa', 'client'),
(81, 'yasireeeeee', 'yasir@gmail.com', 'azertyui', 'client'),
(82, 'hamza', 'hamza1@gmail.com', 'azertyui', 'trainer'),
(83, 'nourchene', 'nourchen@gmail.com', 'azertyui', 'admin'),
(84, 'monir', 'monir55h5@gmail.com', 'azertyui', 'trainer'),
(85, 'aloi', 'aloi@gmail.com', '$2y$10$.PnXnCEYF02QYbtvy7ST/e6cKzheZjDtTSJz0zmMOWl5DBQ0TC/f.', 'trainer'),
(86, 'yassine', 'yassine@gmail.com', '$2y$10$mX8WdnKFj3dFLjv9sOgLm.4C1D4J9ONbWeluVMf2sucCXrvLY6hHW', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `constraint_admin` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `blog_admin` (`admin_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `constraint_client` (`user_id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`cour_id`),
  ADD KEY `cour_trainer` (`trainer_id`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`inscription_id`),
  ADD KEY `inscription_cl` (`client_id`),
  ADD KEY `inscription_cr` (`cour_id`);

--
-- Indexes for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `admin_tarifs` (`admin_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`),
  ADD KEY `constraint_trainer` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `cour_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `inscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `Id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `constraint_admin` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `constraint_client` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cour_trainer` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`trainer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_cl` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_cr` FOREIGN KEY (`cour_id`) REFERENCES `cours` (`cour_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD CONSTRAINT `admin_tarifs` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `constraint_trainer` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
