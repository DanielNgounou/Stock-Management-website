create database c_gestionStock;
use c_gestionStock;
CREATE TABLE `Adresse` (
  `ID_Adresse` int auto_increment,
  `N0_rue` int,
  `Ligne d'Adresse` varchar(20),
  `Ville` varchar(20),
  `Region` varchar(20),
  `Code_postal` varchar(20),
  `Pays` varchar(20),
  PRIMARY KEY (`ID_Adresse`)
);

CREATE TABLE `QuantiteStock` (
  `ID_Quantite` int auto_increment,
  `Nbre_Groupe` int ,
  `Nbre_Unitaire` int ,
  `Nbre_produit_present` int,
  PRIMARY KEY (`ID_Quantite`)
);

create table  `ADMIN` (
  `ID_Admin` varchar(20),
  `Email` varchar(20),
  `Telephone` int,
  `Mot_de_passe` varchar(1000),
  PRIMARY KEY (`ID_Admin`)
);

CREATE TABLE `Famille` (
  `ID_Famille` varchar(20),
  `Nom_Famille` varchar(20),
  `ID_Admin` varchar(20),
  PRIMARY KEY (`ID_Famille`),
  FOREIGN KEY (`ID_Admin`) REFERENCES `ADMIN`(`ID_Admin`)
);

CREATE TABLE `Produit` (
  `ID_Produit` varchar(20),
  `ID_Famille` varchar(20),
  `Libelle` varchar(20),
  `description` varchar(40),
  `ID_Admin` varchar(20),
  `ID_Quantite` int,
  PRIMARY KEY (`ID_Produit`),
  FOREIGN KEY (`ID_Quantite`) REFERENCES `QuantiteStock`(`ID_Quantite`),
  FOREIGN KEY (`ID_Famille`) REFERENCES `Famille`(`ID_Famille`),
  FOREIGN KEY (`ID_Admin`) REFERENCES `ADMIN`(`ID_Admin`)
);

CREATE TABLE `Fournisseur` (
  `ID_Fournisseur` varchar(20),
  `Nom` varchar(20),
  `email` varchar(40),
  `ID_Admin` varchar(20),
  PRIMARY KEY (`ID_Fournisseur`),
  FOREIGN KEY (`ID_Admin`) REFERENCES `ADMIN`(`ID_Admin`)
);

CREATE TABLE `Fournir` (
  `ID_Produit` varchar(20),
  `ID_Fournisseur` varchar(20),
  `Date_fourni` Date,
  `Nbre_produit` int,
  FOREIGN KEY (`ID_Produit`) REFERENCES `Produit`(`ID_Produit`),
  FOREIGN KEY (`ID_Fournisseur`) REFERENCES `Fournisseur`(`ID_Fournisseur`)
);

CREATE TABLE `Etat` (
  `ID_Etat` int auto_increment,
  `Nom_Etat` varchar(20),
  PRIMARY KEY (`ID_Etat`)
);

CREATE TABLE `Client` (
  `ID_Client` varchar(20),
  `Email` varchar(20),
  `Telephone` int,
  `Mot_de_passe` varchar(1000),
  PRIMARY KEY (`ID_Client`)
);

CREATE TABLE `Panier_Achat` (
  `ID_Panier` int auto_increment,
  `ID_Client` varchar(20),
  PRIMARY KEY (`ID_Panier`),
  FOREIGN KEY (`ID_Client`) REFERENCES `Client`(`ID_Client`)
);

CREATE TABLE `Article_panier_Achat` (
  `ID_APA` int auto_increment,
  `ID_Panier` int,
  `ID_produit` varchar(20),
  `Quantite` int,
  PRIMARY KEY (`ID_APA`),
  FOREIGN KEY (`ID_Panier`) REFERENCES `Panier_Achat`(`ID_Panier`),
  FOREIGN KEY (`ID_produit`) REFERENCES `Produit`(`ID_Produit`)
);

CREATE TABLE `Mode_Paiements` (
  `ID_Paiements` int auto_increment,
  `Nom_Paiements` varchar(20),
  PRIMARY KEY (`ID_Paiements`)
);

CREATE TABLE `Commande` (
  `ID_commande` varchar(20),
  `ID_Panier` int,
  `Date_commande` date,
  PRIMARY KEY (`ID_commande`),
  FOREIGN KEY (`ID_Panier`) REFERENCES `Panier_Achat`(`ID_Panier`)
);

CREATE TABLE `Facture` (
  `ID_Facture` varchar(20),
  `ID_Client` varchar(20),
  `ID_Commande` varchar(20),
  `ID_Etat` int,
  `ID_paiements` int,
  `Montant _Facture` int,
  PRIMARY KEY (`ID_Facture`),
  FOREIGN KEY (`ID_Client`) REFERENCES `Client`(`ID_Client`),
  FOREIGN KEY (`ID_Commande`) REFERENCES `Commande`(`ID_commande`),
  FOREIGN KEY (`ID_Etat`) REFERENCES `Etat`(`ID_Etat`),
  FOREIGN KEY (`ID_paiements`) REFERENCES `Mode_Paiements`(`ID_Paiements`)
);

CREATE TABLE `Detenir` (
  `ID_Client` varchar(20),
  `ID_Adresse` int,
  FOREIGN KEY (`ID_Client`) REFERENCES `Client`(`ID_Client`),
  FOREIGN KEY (`ID_Adresse`) REFERENCES `Adresse`(`ID_Adresse`)
);


use c_gestionStock;

DELIMITER $$

CREATE TRIGGER insertion_Facture
BEFORE INSERT ON facture for each row
BEGIN
	declare counter int;
    select count(*) into counter from facture;
	set new.ID_Facture = concat('FACT',counter);
END$$

use c_gestionStock;
DELIMITER $$

-- drop trigger insertion_famille;
CREATE TRIGGER insertion_famille
BEFORE INSERT ON famille for each row
BEGIN
	declare counter int;
    select count(*) into counter from famille;
    set new.ID_Famille = concat('FAM',counter);
END$$

-- insert into famille values ('','Chaussures');
-- select * from famille;
-- delete from famille where id_famille = 'FAM0';
-- drop trigger insertion_Fournisseur;
DELIMITER $$
CREATE TRIGGER insertion_Fournisseur
BEFORE INSERT ON fournisseur for each row
BEGIN
	declare counter int;
    select count(*) into counter from fournisseur;
	set new.ID_Fournisseur = concat('FOURN',counter);
END$$

CREATE TRIGGER insertion_Client
BEFORE INSERT ON Client for each row
BEGIN
	declare counter int;
    select count(*) into counter from Client;
	set new.ID_Client = concat('CL',counter);
END$$

CREATE TRIGGER insertion_Commande
BEFORE INSERT ON Commande for each row
BEGIN
	declare counter int;
    select count(*) into counter from Commande;
	set new.ID_commande = concat('COMM',counter);
END$$

CREATE TRIGGER insertion_Produit
BEFORE INSERT ON Produit for each row
BEGIN
	declare counter int;
    select count(*) into counter from Produit;
	set new.ID_Produit = concat('PROD',counter);
END$$

CREATE TRIGGER insertion_Admin
BEFORE INSERT ON ADMIN for each row
BEGIN
	declare counter int;
    select count(*) into counter from ADMIN;
	set new.ID_Admin = concat('ADMIN',counter);
END$$



