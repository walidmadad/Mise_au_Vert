
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
) ENGINE=InnoDB;

CREATE TABLE `animal` (
  `id_Animal` int NOT NULL,
  `nom_animal` varchar(255) DEFAULT NULL,
  `id_proprietaire` int DEFAULT NULL,
  `id_espece` int DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE `box` (
  `id_box` int NOT NULL,
  `superficie` int DEFAULT NULL,
  `id_TypeGardiennage` int DEFAULT NULL,
  `id_pension` int DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE `date` (
  `Date` date NOT NULL
) ENGINE=InnoDB;


CREATE TABLE `espece` (
  `id_espece` int NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

INSERT INTO `espece` (`id_espece`, `libelle`) VALUES
(1, 'Chien'),
(2, 'Chat');

CREATE TABLE `parametres` (
  `Nom` varchar(50) DEFAULT NULL,
  `AdresseSiegeSocial` varchar(255) DEFAULT NULL,
  `NomDirigeant` varchar(255) DEFAULT NULL,
  `AdresseLogo` varchar(255) DEFAULT NULL,
  `PrixVaccin` double DEFAULT NULL,
  `PrixVermifuge` double DEFAULT NULL
) ENGINE=InnoDB;


CREATE TABLE `pension` (
  `id_pension` int NOT NULL,
  `ville_pension` varchar(255) DEFAULT NULL,
  `adresse_pension` varchar(255) DEFAULT NULL,
  `telephone_pension` varchar(255) DEFAULT NULL,
  `responsable_pension` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nom_pension` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE `proprietaire` (
  `id_proprietaire` int NOT NULL,
  `nom_Propietaire` varchar(255) DEFAULT NULL,
  `prenom_Propietaire` varchar(255) DEFAULT NULL,
  `Adresse_Propietaire` varchar(255) DEFAULT NULL,
  `TELEPHONE_Propietaire` varchar(255) DEFAULT NULL,
  `email_Proprietaire` varchar(80) NOT NULL,
  `password_proprietaire` varchar(255) NOT NULL,
  `date_naissance_proprietaire` date DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE `tarification` (
  `Pension_id` int NOT NULL,
  `Type_Gardiennage_id` int NOT NULL,
  `Tarif` double DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE `typegardiennage` (
  `id_TypeGardiennage` int NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

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


INSERT INTO `pension` (`id_pension`, `ville_pension`, `adresse_pension`, `telephone_pension`, `responsable_pension`, `password`, `nom_pension`, `email`) VALUES
(8, 'Lambertsart', '65 rue jean Jaures', '03 20 00 11 22', 'Lali Masse', '$2y$10$yTcwS2jaVQC4McgcChXCYOOEckMBOEhbDo8asETg8A22wLRsIEPcm', 'Lambertsart', 'lambertsart@miseauvert.fr'),
(9, 'Vincennes', '03 rue Faie Felix', '01 05 01 21 22', 'Cary Bou', '$2y$10$8fZ9J75LI8TTZXYG1sL9N.9nSSi395XjtvTHWTkiJvRJXCJLbx/m6', 'Vincennes', 'vincennes@miseauvert.fr'),
(10, 'Les Echets', '1707 ch Rosarges', '04 54 12 25 78', 'Cathy Greu', '$2y$10$.9dF5L64h239j5FGvTrM9ORjnUH/uZxWraYeKX7KbvQ/cQ2jzhEci', 'Les Echets', 'lesechets@miseauvert.fr'),
(11, 'Saran', 'Za Des Sables De Sary 53 all Georges Charpak', '04 56 62 84 55', 'Claudia Bleu de Tasmasnie', '$2y$10$pHWy5kiOwJXt4KGW58Z5keSiTiCBriiisUXhA68XWsFYI2IXQJN02', 'Saran', 'saran@miseauvert.fr'),
(12, 'Coulmiers', 'Les Basses Fontaines', '05 77 44 51 84', 'Filippo Potame', '$2y$10$CXrRORGedlfbNhFGIRZevuhbECklZ/V2Xb94UlXXxeF/F7OROLkze', 'Coulmiers', 'coulmiers@miseauvert.fr'),
(13, 'Norges la ville', '7 r Sources', '07 63 22 25 74', 'Salah Mandre', '$2y$10$CR6rkOig46VTpjLefCoMke.GTy6TNWCK/PyKnTMcvvIO7FHvrQpnm', 'Norges la ville', 'norgeslaville@miseauvert.fr'),
(14, 'Landujan', 'Le Plessix Coudray', '02 95 72 85 86', 'Odin Don', '$2y$10$c9lR953iVSradhaSKcjZWuK.yXY4yK5alcC0vh5Zc7MF4qeHOktcy', 'Landujan', 'landujan@miseauvert.fr'),
(15, 'Ormes', 'rte de Dormans RD 980', '09 47 21 25 66', 'Lucie Ole', '$2y$10$sAWC7lxs9M66/3BBmyfAXuQGR.StXQ.L/E4svwKz0PYccpSA3Ji.O', 'Ormes', 'ormes@miseauvert.fr'),
(16, 'Lezoux', 'rte de Ravel', '05 54 63 77 15', 'Camel Eon', '$2y$10$XSJUIAZBcMy.0xrQ6ldWLep.0CrWhc973RE4x2IIdupFz7J4CuUle', 'Lezoux', 'lezoux@miseauvert.fr'),
(17, 'Vabres l’abbaye', '11 r Montcamp', '04 56 28 36 58', 'Bernard Val', '$2y$10$00xzVRsgp.TwRYLm06pq0uDMs9wqm3KRpcRvKSAqPmxbTMhSIygyu', 'Vabres l’abbaye', 'vabreslabbaye@miseauvert.fr'),
(18, 'Saint Sauveur', '590 chem Saint Vaast', '03 10 12 57 38', 'Lou Treux De Mer', '$2y$10$g34wX0kV2PP0M/SeAG1JCO9q5.AoCN1zqKaYsTie1LTbbPJW1MXw2', 'Saint Sauveur', 'saintsauveur@miseauvert.fr');


INSERT INTO `typegardiennage` (`id_TypeGardiennage`, `Libelle`) VALUES
(1, 'Hôtel canin'),
(2, 'Camping canin'),
(3, 'Pension féline');


INSERT INTO `box` (`id_box`, `superficie`, `id_TypeGardiennage`, `id_pension`) VALUES
(5, 20, 1, 8),
(6, 15, 2, 8),
(7, 15, 3, 8),
(8, NULL, 1, 9),
(9, NULL, 2, 9),
(10, NULL, 3, 9),
(11, NULL, 1, 10),
(12, NULL, 2, 10),
(13, NULL, 3, 10),
(14, NULL, 1, 11),
(15, NULL, 2, 11),
(16, NULL, 3, 11),
(17, NULL, 1, 12),
(18, NULL, 2, 12),
(19, NULL, 3, 12),
(20, NULL, 1, 13),
(21, NULL, 2, 13),
(22, NULL, 3, 13),
(23, NULL, 1, 14),
(24, NULL, 2, 14),
(25, NULL, 3, 14),
(26, NULL, 1, 15),
(27, NULL, 2, 15),
(28, NULL, 3, 15),
(29, NULL, 1, 16),
(30, NULL, 2, 16),
(31, NULL, 3, 16),
(32, NULL, 1, 17),
(33, NULL, 2, 17),
(34, NULL, 3, 17),
(35, NULL, 1, 18),
(36, NULL, 2, 18),
(37, NULL, 3, 18);





INSERT INTO `tarification` (`Pension_id`, `Type_Gardiennage_id`, `Tarif`) VALUES
(8, 1, 18),
(8, 2, 11),
(8, 3, 10),
(9, 1, NULL),
(9, 2, NULL),
(9, 3, NULL),
(10, 1, NULL),
(10, 2, NULL),
(10, 3, NULL),
(11, 1, NULL),
(11, 2, NULL),
(11, 3, NULL),
(12, 1, NULL),
(12, 2, NULL),
(12, 3, NULL),
(13, 1, NULL),
(13, 2, NULL),
(13, 3, NULL),
(14, 1, NULL),
(14, 2, NULL),
(14, 3, NULL),
(15, 1, NULL),
(15, 2, NULL),
(15, 3, NULL),
(16, 1, NULL),
(16, 2, NULL),
(16, 3, NULL),
(17, 1, NULL),
(17, 2, NULL),
(17, 3, NULL),
(18, 1, NULL),
(18, 2, NULL),
(18, 3, NULL);


