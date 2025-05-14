DROP DATABASE IF EXISTS bdGsb;
CREATE DATABASE IF NOT EXISTS bdGsb;
USE bdGsb;

CREATE TABLE Questionnaire
(
	cle VARCHAR(15) PRIMARY KEY,
	name	VARCHAR(40),
    displayName VARCHAR(60),
    description VARCHAR(124)
)
ENGINE=InnoDB;
desc Questionnaire;

CREATE TABLE Questions (
    id_question VARCHAR(22) PRIMARY KEY,
    cle_questionnaire VARCHAR(15),
    rang VARCHAR(6),
    typeQ VARCHAR(5),
    name VARCHAR(20),
    text VARCHAR(60),
    reponse1 VARCHAR(31),
    reponse2 VARCHAR(31),
    reponse3 VARCHAR(31),
    reponse4 VARCHAR(31),
    reponse5 VARCHAR(31),
    FOREIGN KEY (cle_questionnaire) REFERENCES questionnaire(cle) ON DELETE CASCADE
)
ENGINE=InnoDB;
desc Questions;

ALTER TABLE Questions ADD `default` VARCHAR(1);