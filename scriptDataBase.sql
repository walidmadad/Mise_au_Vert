CREATE TABLE Parametres(
Nom VARCHAR(50),
AdresseSiegeSocial VARCHAR(255),
NomDirigeant VARCHAR(255),
AdresseLogo VARCHAR(255),
PrixVaccin DOUBLE,
PrixVermifuge DOUBLE);

CREATE TABLE Box(
id_box INT AUTO_INCREMENT PRIMARY KEY,
superficie INT);

CREATE TABLE Date(
Date DATE PRIMARY KEY);

CREATE TABLE Espece(
id_espece INT AUTO_INCREMENT PRIMARY KEY,
libelle VARCHAR(255));

CREATE TABLE Animal(
id_Animal INT AUTO_INCREMENT PRIMARY KEY,
nom_animal VARCHAR(255));

CREATE TABLE Proprietaire(
id_proprietaire INT AUTO_INCREMENT PRIMARY KEY,
nom_Propietaire VARCHAR(255), 
prenom_Propietaire VARCHAR(255), 
Adresse_Propietaire VARCHAR(255),
TELEPHONE_Propietaire VARCHAR(255));

CREATE TABLE TypeGardiennage(
id_TypeGardiennage INT AUTO_INCREMENT PRIMARY KEY,
Libelle VARCHAR(255));

CREATE TABLE Pension(
id_pension INT AUTO_INCREMENT PRIMARY KEY,
ville_pension VARCHAR(255),
adresse_pension VARCHAR(255),
telephone_pension VARCHAR(255),
responsable_pension VARCHAR(255));

CREATE TABLE Affectation(
box_id INT,
animal_id INT,
Date_fin Date,
Regle BOOLEAN,
Carnet_Vaccination BOOLEAN,
Poids DOUBLE,
Age INT,
Vaccin_a_jour BOOLEAN,
Vermifuge_a_jour BOOLEAN,
PRIMARY KEY(box_id, animal_id));

CREATE TABLE Tarification(
Pension_id INT,
Type_Gardiennage_id INT,
Tarif DOUBLE,
PRIMARY KEY(pension_id, Type_Gardiennage_id));
