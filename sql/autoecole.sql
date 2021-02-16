#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# CREATION DATBASE
#------------------------------------------------------------

DROP DATABASE IF EXISTS autoecole;
CREATE DATABASE autoecole;
USE autoecole;

#------------------------------------------------------------
# Table: etudiant
#------------------------------------------------------------

CREATE TABLE etudiant
(
    idetudiant      Int Auto_increment NOT NULL,
    nomEtudiant     Varchar(50)  NOT NULL,
    prenomEtudiant  Varchar(50)  NOT NULL,
    adresseEtudiant Varchar(100) NOT NULL,
    dateNaissance   Date         NOT NULL,
    telephone       Varchar(20)  NOT NULL,
    niveauxEtudes   Int          NOT NULL,
    reduction       Float        NOT NULL,
    CONSTRAINT etudiant_PK PRIMARY KEY (idetudiant)
);

#------------------------------------------------------------
# Table: cours
#------------------------------------------------------------

CREATE TABLE cours
(
    idcours    Int Auto_increment NOT NULL,
    dateCours  Date  NOT NULL,
    heureCours Time  NOT NULL,
    tarifHeure Float NOT NULL,
    CONSTRAINT cours_PK PRIMARY KEY (idcours)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: dateheuredebut
#------------------------------------------------------------

CREATE TABLE dateheuredebut
(
    dateheuredebut Int Auto_increment NOT NULL,
    CONSTRAINT dateheuredebut_PK PRIMARY KEY (dateheuredebut)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: moniteur
#------------------------------------------------------------

CREATE TABLE moniteur
(
    idmoniteur     Int Auto_increment NOT NULL,
    nomMoniteur    Varchar(20) NOT NULL,
    prenomMoniteur Varchar(20) NOT NULL,
    typeMoniteur   Varchar(50) NOT NULL,
    dateEmbauche   Date        NOT NULL,
    CONSTRAINT moniteur_PK PRIMARY KEY (idmoniteur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: vehicule
#------------------------------------------------------------

CREATE TABLE vehicule
(
    idvehicule         Int Auto_increment NOT NULL,
    nomVehicule        Varchar(50)  NOT NULL,
    typeVehicule       Varchar(50)  NOT NULL,
    anneeVehicule      Date         NOT NULL,
    numImmatriculation Varchar(20)  NOT NULL,
    nbKilometre        Varchar(100) NOT NULL,
    typeConso          Varchar(50)  NOT NULL,
    puissance          Varchar(50)  NOT NULL,
    idmoniteur         Int,
    CONSTRAINT vehicule_PK PRIMARY KEY (idvehicule),
    CONSTRAINT vehicule_moniteur_FK FOREIGN KEY (idmoniteur) REFERENCES moniteur (idmoniteur)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etablissement
#------------------------------------------------------------

CREATE TABLE etablissement
(
    idetablissement      Int Auto_increment NOT NULL,
    degreEtablissement   Varchar(50)  NOT NULL,
    nomEtablissement     Varchar(50)  NOT NULL,
    adresseEtablissement Varchar(100) NOT NULL,
    idetudiant           Int          NOT NULL,
    CONSTRAINT etablissement_PK PRIMARY KEY (idetablissement),
    CONSTRAINT etablissement_etudiant_FK FOREIGN KEY (idetudiant) REFERENCES etudiant (idetudiant)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: examen
#------------------------------------------------------------

CREATE TABLE examen
(
    idexamen       Int Auto_increment NOT NULL,
    typeExamen     Varchar(50) NOT NULL,
    dateExamen     Date        NOT NULL,
    heureExamen    Time        NOT NULL,
    resultatExamen Varchar(50) NOT NULL,
    idetudiant     Int         NOT NULL,
    CONSTRAINT examen_PK PRIMARY KEY (idexamen),
    CONSTRAINT examen_etudiant_FK FOREIGN KEY (idetudiant) REFERENCES etudiant (idetudiant)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: planning
#------------------------------------------------------------

CREATE TABLE planning
(
    idetudiant       Int  NOT NULL,
    dateheuredebut   Int  NOT NULL,
    idmoniteur       Int  NOT NULL,
    idcours          Int  NOT NULL,
    dateheurefinetat Date NOT NULL,
    CONSTRAINT planning_PK PRIMARY KEY (idetudiant, dateheuredebut, idmoniteur, idcours),
    CONSTRAINT planning_etudiant_FK FOREIGN KEY (idetudiant) REFERENCES etudiant (idetudiant)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT planning_dateheuredebut0_FK FOREIGN KEY (dateheuredebut) REFERENCES dateheuredebut (dateheuredebut)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT planning_moniteur1_FK FOREIGN KEY (idmoniteur) REFERENCES moniteur (idmoniteur)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT planning_cours2_FK FOREIGN KEY (idcours) REFERENCES cours (idcours)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur
(
    idutilisateur INT(3) NOT NULL AUTO_INCREMENT,
    nom           VARCHAR(30),
    prenom        VARCHAR(30),
    email         VARCHAR(100),
    mdp           VARCHAR(255),
    droits        ENUM ("etudiant", "admin", "moniteur"),
    PRIMARY KEY (idutilisateur)
);

#------------------------------------------------------------
# Table: INSERT INTO UTILISATEUR
#------------------------------------------------------------

INSERT INTO utilisateur VALUES (null, "Adber", "chouaki", "a@gmail.com", "123", "admin");
INSERT INTO utilisateur
VALUES (null, "Sacha", "MOUCHON", "s@gmail.com", "123", "etudiant");
INSERT INTO utilisateur
VALUES (null, "Oka", "Ben", "o@gmail.com", "123", "moniteur");

#------------------------------------------------------------
# Table: INSERT INTO ETUDIANTS
#------------------------------------------------------------

INSERT INTO etudiant values(null, "Mouchon", "Sacha", "29 rue Mauregard", STR_TO_DATE('07-11-2001', '%m-%d-%Y'), "0679156502", 2, 0);
INSERT INTO etudiant
values (null, "Oraby", "Ihab", "10 rue de la saule", STR_TO_DATE('10-10-1998', '%m-%d-%Y'), "0789765467", 1, 50);

#------------------------------------------------------------
# Table: INSERT INTO ETABLISSEMENT
#------------------------------------------------------------

INSERT INTO etablissement VALUES(null, "1st", "Jean-Jacques-Rousseau",  "10 rue de la route", 1);
INSERT INTO etablissement
VALUES (null, "2nd", "Boris-Vian", "13bis rue de la Saule", 2);

#------------------------------------------------------------
# Table: INSERT INTO EXAMEN
#------------------------------------------------------------

INSERT INTO examen VALUES(null, "CODE DE LA ROUTE", CURDATE(), CURTIME(), "admis", 1);
INSERT INTO examen
VALUES (null, "PERMIS DE CONDUIRE", CURDATE(), CURTIME(), "non-admis", 2);

#------------------------------------------------------------
# Table: INSERT INTO MONITEUR
#------------------------------------------------------------

INSERT INTO moniteur VALUES(null, "Okacha", "Ben Ahmed", "Voiture", STR_TO_DATE('01-01-1990', '%m-%d-%Y'));
INSERT INTO moniteur
VALUES (null, "Chouaky", "Abderaman", "Moto", STR_TO_DATE('01-01-1990', '%m-%d-%Y'));

#------------------------------------------------------------
# Table: INSERT INTO DATEHEUREDEBUT
#------------------------------------------------------------

INSERT INTO dateheuredebut VALUES(null);
INSERT INTO dateheuredebut
VALUES (null);

#------------------------------------------------------------
# Table: INSERT INTO COURS
#------------------------------------------------------------

INSERT INTO cours VALUES(null, STR_TO_DATE('01-01-2020', '%m-%d-%Y'), "02:00:00", 10.50);
INSERT INTO cours
VALUES (null, STR_TO_DATE('01-01-2020', '%m-%d-%Y'), "04:00:00", 20.50);

#------------------------------------------------------------
# Table: INSERT INTO PLANNING
#------------------------------------------------------------

INSERT INTO planning VALUES(1, 1, 1, 1, CURDATE());
INSERT INTO planning
VALUES (2, 2, 2, 2, CURDATE());

#------------------------------------------------------------
# Table: INSERT INTO VEHICULE
#------------------------------------------------------------

INSERT INTO vehicule VALUES(null, "RENAULT Clio", "Voiture", CURDATE(), "AB-123-CD", "0km", "Diesel", "90cv", 1);
INSERT INTO vehicule
VALUES (null, "YAMAHA MT-125", "Moto", CURDATE(), "AB-123-CD", "0km", "Essence", "15cv", 2);


#------------------------------------------------------------
# VIEW : VIEW LePlanning
#------------------------------------------------------------

CREATE VIEW LePlanning as
(
SELECT e.prenomEtudiant
     , e.nomEtudiant
     , e.telephone
     , m.prenomMoniteur
     , m.nomMoniteur
     , m.typeMoniteur
     , c.idcours
     , c.dateCours
     , c.heureCours
     , c.tarifHeure
     , d.dateheuredebut
FROM planning AS p
         INNER JOIN etudiant AS e ON e.idetudiant = p.idetudiant
         INNER JOIN moniteur AS m ON m.idmoniteur = p.idmoniteur
         INNER JOIN cours AS c ON c.idcours = p.idcours
         INNER JOIN dateheuredebut AS d ON d.dateheuredebut = p.dateheuredebut
    );
#------------------------------------------------------------
# VIEW : VIEW lesVehicules
#------------------------------------------------------------

CREATE VIEW lesVehicules as
(
SELECT v.idvehicule,
       v.nomVehicule,
       v.typeVehicule,
       v.anneeVehicule,
       v.numImmatriculation,
       v.nbKilometre,
       v.typeConso,
       v.puissance,
       m.idmoniteur,
       m.prenomMoniteur,
       m.nomMoniteur
FROM vehicule v,
     moniteur m
WHERE m.idmoniteur = v.idmoniteur
    );

#------------------------------------------------------------
# VIEW : VIEW lesExamens
#------------------------------------------------------------

CREATE VIEW lesExamens as
(
SELECT e.idexamen,
       e.typeExamen,
       e.dateExamen,
       e.heureExamen,
       e.resultatExamen,
       s.idetudiant,
       s.prenomEtudiant,
       s.nomEtudiant
FROM examen e,
     etudiant s
WHERE s.idetudiant = e.idetudiant
    );