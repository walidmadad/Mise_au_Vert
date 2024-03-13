-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2024 at 12:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la_mise_au_vert`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `box_id` int NOT NULL,
  `animal_id` int NOT NULL,
  `Date_fin` date DEFAULT NULL,
  `Regle` varchar(4) DEFAULT NULL,
  `Carnet_Vaccination` varchar(4) DEFAULT NULL,
  `Poids` varchar(50) DEFAULT NULL,
  `Age` varchar(50) DEFAULT NULL,
  `Vaccin_a_jour` varchar(4) DEFAULT NULL,
  `Vermifuge_a_jour` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`box_id`, `animal_id`, `Date_fin`, `Regle`, `Carnet_Vaccination`, `Poids`, `Age`, `Vaccin_a_jour`, `Vermifuge_a_jour`) VALUES
(3, 45, '2024-03-28', 'Oui', 'Oui', '13 kg', '3 ans et 4 mois', 'Non', 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id_Animal` int NOT NULL,
  `nom_animal` varchar(255) DEFAULT NULL,
  `id_proprietaire` int DEFAULT NULL,
  `id_espece` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id_Animal`, `nom_animal`, `id_proprietaire`, `id_espece`) VALUES
(45, 'toto', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id_box` int NOT NULL,
  `superficie` int DEFAULT NULL,
  `id_TypeGardiennage` int DEFAULT NULL,
  `id_pension` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id_box`, `superficie`, `id_TypeGardiennage`, `id_pension`) VALUES
(1, 25, 1, 5),
(2, 15, 2, 5),
(3, 20, 3, 5),
(4, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `espece`
--

CREATE TABLE `espece` (
  `id_espece` int NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `espece`
--

INSERT INTO `espece` (`id_espece`, `libelle`) VALUES
(1, 'Chien'),
(2, 'Chat');

-- --------------------------------------------------------

--
-- Table structure for table `parametres`
--

CREATE TABLE `parametres` (
  `Nom` varchar(50) DEFAULT NULL,
  `AdresseSiegeSocial` varchar(255) DEFAULT NULL,
  `NomDirigeant` varchar(255) DEFAULT NULL,
  `AdresseLogo` varchar(255) DEFAULT NULL,
  `PrixVaccin` double DEFAULT NULL,
  `PrixVermifuge` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pension`
--

CREATE TABLE `pension` (
  `id_pension` int NOT NULL,
  `ville_pension` varchar(255) DEFAULT NULL,
  `adresse_pension` varchar(255) DEFAULT NULL,
  `telephone_pension` varchar(255) DEFAULT NULL,
  `responsable_pension` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nom_pension` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pension`
--

INSERT INTO `pension` (`id_pension`, `ville_pension`, `adresse_pension`, `telephone_pension`, `responsable_pension`, `password`, `nom_pension`, `email`) VALUES
(3, 'Lambertsart', '65 rue Jean Jaures, 59130', '03 20 00 11 22', 'Lali Masse', '$2y$10$EEzdD6ll4L6ncYRSOWoW6.s3y5Gjn3dFmy5qhk/Fvsgpe8qefXJJO', 'Pension Lambertsart', 'Lamberstsart@miseauvert.fr'),
(4, 'Vincennes', '03 rue Faie Felix, 94300', '01 05 01 21 22', 'Cary Bou', '$2y$10$pGqjFFDlsBwGn7ZHK4m6gu1XAyqvqCQHo29MY8Ll/Bo/qjlVPZoiu', 'Pension Vincennes', 'Vincennes@miseauvert.fr'),
(5, 'Saran', 'Za Des Sables De Sary 53 all Georges Charpak', '04 56 62 84 55', 'Claudia Bleu de Tasmasnie', '$2y$10$xq0uRnKeRfX7BWM0mPN69ekn0CL/yNH1rZYudxI7xhyHyzMDqE.O6', 'Pension Saran', 'Saran@miseauvert.fr');

-- --------------------------------------------------------

--
-- Table structure for table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int NOT NULL,
  `nom_Propietaire` varchar(255) DEFAULT NULL,
  `prenom_Propietaire` varchar(255) DEFAULT NULL,
  `Adresse_Propietaire` varchar(255) DEFAULT NULL,
  `TELEPHONE_Propietaire` varchar(255) DEFAULT NULL,
  `email_Proprietaire` varchar(80) NOT NULL,
  `password_proprietaire` varchar(255) NOT NULL,
  `date_naissance_proprietaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom_Propietaire`, `prenom_Propietaire`, `Adresse_Propietaire`, `TELEPHONE_Propietaire`, `email_Proprietaire`, `password_proprietaire`, `date_naissance_proprietaire`) VALUES
(14, 'Madad', 'Walid', '62200, BOULOGNE-SUR-MER', '0600112233', 'walidmadad10@gmail.com', '$2y$10$I.ESNsvQCOT93xqfGoIcrecZgPm1NCnWbreajjCostsMznHjnIJ1G', '2003-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `tarification`
--

CREATE TABLE `tarification` (
  `Pension_id` int NOT NULL,
  `Type_Gardiennage_id` int NOT NULL,
  `Tarif` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tarification`
--

INSERT INTO `tarification` (`Pension_id`, `Type_Gardiennage_id`, `Tarif`) VALUES
(5, 1, 37),
(5, 2, 14),
(5, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `typegardiennage`
--

CREATE TABLE `typegardiennage` (
  `id_TypeGardiennage` int NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `typegardiennage`
--

INSERT INTO `typegardiennage` (`id_TypeGardiennage`, `Libelle`) VALUES
(1, 'Hôtel canin'),
(2, 'Camping canin'),
(3, 'Pension féline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`box_id`,`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_Animal`),
  ADD KEY `id_proprietaire` (`id_proprietaire`),
  ADD KEY `id_espece` (`id_espece`);

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id_box`),
  ADD KEY `id_TypeGardiennage` (`id_TypeGardiennage`),
  ADD KEY `id_pension` (`id_pension`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`id_espece`);

--
-- Indexes for table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id_pension`);

--
-- Indexes for table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`);

--
-- Indexes for table `tarification`
--
ALTER TABLE `tarification`
  ADD PRIMARY KEY (`Pension_id`,`Type_Gardiennage_id`),
  ADD KEY `Type_Gardiennage_id` (`Type_Gardiennage_id`);

--
-- Indexes for table `typegardiennage`
--
ALTER TABLE `typegardiennage`
  ADD PRIMARY KEY (`id_TypeGardiennage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_Animal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id_box` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `espece`
--
ALTER TABLE `espece`
  MODIFY `id_espece` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pension`
--
ALTER TABLE `pension`
  MODIFY `id_pension` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_proprietaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `typegardiennage`
--
ALTER TABLE `typegardiennage`
  MODIFY `id_TypeGardiennage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id_box`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id_Animal`);

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`id_espece`) REFERENCES `espece` (`id_espece`);

--
-- Constraints for table `box`
--
ALTER TABLE `box`
  ADD CONSTRAINT `box_ibfk_1` FOREIGN KEY (`id_TypeGardiennage`) REFERENCES `typegardiennage` (`id_TypeGardiennage`),
  ADD CONSTRAINT `box_ibfk_2` FOREIGN KEY (`id_pension`) REFERENCES `pension` (`id_pension`);

--
-- Constraints for table `tarification`
--
ALTER TABLE `tarification`
  ADD CONSTRAINT `tarification_ibfk_1` FOREIGN KEY (`Pension_id`) REFERENCES `pension` (`id_pension`),
  ADD CONSTRAINT `tarification_ibfk_2` FOREIGN KEY (`Type_Gardiennage_id`) REFERENCES `typegardiennage` (`id_TypeGardiennage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
