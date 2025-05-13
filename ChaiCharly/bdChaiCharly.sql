DROP DATABASE IF EXISTS bdChaiCharly;
CREATE DATABASE IF NOT EXISTS bdChaiCharly;
USE bdChaiCharly;

CREATE TABLE Abonne
(
	id    int auto_increment, 
	pseudo 	VARCHAR(25) NOT NULL,
	mail	VARCHAR(30) NOT NULL,
    tel		VARCHAR(30),
	mdp		VARCHAR(30) NOT NULL,
    dateAbo date,
	PRIMARY KEY(id)
)
ENGINE=InnoDB;
desc Abonne;

ALTER TABLE Abonne MODIFY mdp VARCHAR(255);
ALTER TABLE Abonne ADD CONSTRAINT unique_mail UNIQUE (mail);

CREATE TABLE Contact
(
	id int auto_increment, 
	mail VARCHAR(30),
    nom VARCHAR(30),
    prenom VARCHAR(30),
    message VARCHAR(30),
    date date,
    heure time,
	PRIMARY KEY(id)
)
ENGINE=InnoDB;
desc Contact;

insert into Contact values (null,null,'paul','gabriel',null,null,null);

ALTER TABLE Contact ADD CONSTRAINT unique_mail_contact UNIQUE (mail);

CREATE TABLE Admin
(
	id int auto_increment,
    mdp VARCHAR(60),
    login varchar(30),
    PRIMARY KEY (id)
)
ENGINE=InnoDB;
desc Admin;

ALTER TABLE Admin MODIFY mdp VARCHAR(255);

CREATE TABLE Categorie
(
	code VARCHAR(10),
    libelle VARCHAR(20),
    PRIMARY KEY (code)
)
ENGINE=InnoDB;
desc Categorie;

CREATE TABLE Type
(
	code VARCHAR(10),
    libelle VARCHAR(20),
    PRIMARY KEY (code)
)
ENGINE=InnoDB;
desc Type;

CREATE TABLE Produit
(
	id int auto_increment,
    codeCat VARCHAR(10),
    codeType VARCHAR(10),
    nom VARCHAR(120),
    annee date,
    tarifUnit VARCHAR(10),
    tarifCart VARCHAR(10),
    stock boolean,
    imgUrl VARCHAR(255),
    aspect VARCHAR(20),
    descCourt VARCHAR(250),
    descLong text,
    medaille VARCHAR(20),
    PRIMARY KEY (id),
    FOREIGN KEY (codeCat) REFERENCES Categorie(code),
    FOREIGN KEY (codeType) REFERENCES Type(code)
)
ENGINE=InnoDB;
desc Produit;



-- Insertion table Admin
INSERT INTO Admin VALUES ("",'$2y$10$ix4Xn9zBwsRBTG6k3zJ8m.Kwq/4ViIXj8lU8nueNhX/vuyM9TLLHi','Gabriel');
INSERT INTO Admin VALUES ("",'$2y$10$VOaqZikN0TIpvwsjenK/VOsDx6QLtACv5WQLnlf3/WuRwx9gNJpMS','Julien');
INSERT INTO Admin VALUES ("",'$2y$10$/6SCBq8Ng70sgbkwymvqMOm0i4PC65cKS4UQ6ACDR5PQi7lzDCx/a','Hugo');

-- Insertion table Categorie
INSERT INTO Categorie VALUES ('RG','Rouge');
INSERT INTO Categorie VALUES ('RO','Rosé');
INSERT INTO Categorie VALUES ('BL','Blanc');
INSERT INTO Categorie VALUES ('BIO','BIOS');
INSERT INTO Categorie VALUES ('MO','Mousseux');
INSERT INTO Categorie VALUES ('BIB','Bag in Box');

-- Insertion table Type
INSERT INTO Type VALUES ('AB','AOC Bergerac');
INSERT INTO Type VALUES ('AC','AOC Côte de Bergerac');
INSERT INTO Type VALUES ('IBR','IGP Bergerac');
INSERT INTO Type VALUES ('IBB','IGP Bergerac Blanc');
INSERT INTO Type VALUES ('ACB','AOC Côte de Bergerac');
INSERT INTO Type VALUES ('BIO','BIO Jus');
INSERT INTO Type VALUES ('M','Vins pétillants');
INSERT INTO Type VALUES ('BIB','Bag In Box');

-- Insertion table Produit Rouge
INSERT INTO Produit VALUES (null,"RG","AB",'Pélissiére','2021-01-01','6,80€','34,50€',0,'../public/img/vins/pelissiere.png',null,'Desc courte',
'Robe de couleur pourpre. Le nez gourmand de petits fruits rouges et noirs mûrs
(Griotte et cassis). On retrouve en bouche une aromatique qui reste sur le fruit, des
tannins mesurés et une finale modérée.',null);

INSERT INTO Produit VALUES (null,"RG","AB",'Doméa','2021-01-01','7,50€','39,00€',0,'../public/img/vins/domea.png',null,'Desc courte',
'Sous sa robe pourpre sombre, il révèle un nez de fruits rouges toastés avec
des notes de vanille. La bouche est ample avec des tannins fondants et une
finale complexe entre fruits et arômes de torréfaction.',"Médaille d'or Concours Bordeaux 2023" );

INSERT INTO Produit VALUES (null,"RG","AB",'Rose de sigoules','2019-01-01','9,20€','47,50€',1,'../public/img/vins/Rose-Rouge.jpg',null,'Fût de chêne 12mois',
'Avec sa robe profonde, ce vin révèle dès les premières notes au nez, la puissance 
tout en finesse du millésime, encore dominée par les notes d’élevage. La
bouche est franche et propose des tanins encore sur la jeunesse mais qui
promettent un bel avenir. La finale révèle les notes de fruits encore en retrait mais
qui ne demanderont qu’à s’exprimer avec le temps.',null);

INSERT INTO Produit VALUES (null,"RG","AB","Clos D'Yvigne",'2018-01-01','25,50€',null,0,"../public/img/vins/clos-d'yvigne.png",null,'Magnum 150cl',
'La robe est rouge pourpre, le nez de fruits rouges mûrs avec des notes de pruneaux. 
La bouche est ample, charnue, avec une finale vanillée, des notes de réglisse et de café torréfié. 
Des tannins puissants apportant une belle complexité.',"Médaille d'or Paris 2020");

INSERT INTO Produit VALUES (null,"RG","AC","Château La Besage Prestige",'2019-01-01','10,20€','53,00€',1,'../public/img/vins/chateau.png',null,'Desc courte',
'La robe est grenat, soutenue, avec des reflets pourpres. Le nez est dominé par des
arômes de fruits noirs bien mûrs (cerises guigne, mûres). La bouche ample et suave,
laisse transparaitre des notes torréfiées et vanillées apportées par l’élevage. Une
belle longueur termine cette cuvée prometteuse qui saura se faire attendre quelques
années.',"Medaille d'or Sud Ouest 2023");

INSERT INTO Produit VALUES (null,"RG","AC","Audace",null,'19,80€','102,00€',0,'../public/img/vins/audace.png',null,'Fût de chêne 12mois',
'Ce vin présente une robe grenat soutenue aux reflets brillants. Un nez riche et
complexe où s’expriment d’abord des notes de torréfaction et de réglisse,
rapidement rejoint par des flaveurs plus gourmandes de fruits rouges mûrs et de
fruits confits (pruneaux). La bouche est ample et fraîche, tout en finesse, portées
par des tanins soyeux qui confèrent une belle longueur.',null);

-- Insertion table Produit Rosé
INSERT INTO Produit VALUES (null,"RO","IBR","Original",'2023-01-01','7,00€','36,00€',1,'../public/img/vins/Original-Rosé.jpg',null,'Merlot capsule à vis IGP (pays du Périgord)',
'La robe est rose pâle. Le nez est gourmand, particulièrement explosif, et dominé par des arômes sucrés, bonbons anglais. La bouche, ronde et bien équilibrée avec une
légère acidité, présente des arômes de fruits rouges. Une belle persistance en fin de bouche.',null);

-- Insertion table Produit Blanc sec
INSERT INTO Produit VALUES (null,"BL","IBB","Original",'2024-01-01','7,00€','36,00€',1,'../public/img/vins/sec.png','Sec','Sauvignon capsule à vis IGP (pays du Périgord)',
'Nez puissant, intense et complexe où dominent les notes minérales, de buis en fleur
et de pamplemousse. La bouche ample et équilibrée, sans excès de fraicheur (la
vivacité du Sauvignon est balancée par une subtile édulcoration avant mise suivant
les millésimes), laisse apparaitre une belle persistance aromatique avec des arômes
gourmands d’agrumes et de fruits exotiques.',null);

-- Insertion table Produit Blanc demi-sec/doux
INSERT INTO Produit VALUES (null,"BL","ACB","Antidote",'2022-01-01','7,90€','41,00€',1,'../public/img/vins/Antidote
.png','Demi-sec','Demi-Sec IGP (pays du Périgord)',
'Vin d’une couleur jaune pâle. Explosion de saveurs, au nez, une palette aromatique
qui s’étend des fruits à chair blanche aux agrumes. La bouche est gourmande entre
pêches blanches et pommes chantecler conclue par un équilibre subtil entre vivacité
et douceur.',"Médaille d'argent concours de Bordeaux");

INSERT INTO Produit VALUES (null,"BL","ACB","Rose de Sigoules doux",'2019-01-01','10,30€','53,50€',1,'../public/img/vins/rose-doux.png','Doux','Vendanges Tardives',
'Une robe or brillant limpide. Un nez charmeur dominé par des fruits à chairs blanches
(poires et pommes confits). La bouche est ample et suave, révélant la complexité de
ce vin. Des notes de pêche de vigne et d’agrumes viennent s’ajouter. Un bel
équilibre entre sucrosité et fraîcheur en fait un « Côtes de Bergerac Blanc » très
original.',"Médaille d'or Bordeaux 2021");

-- Insertion table Produit Jus de raisin BIO
INSERT INTO Produit VALUES (null,"BIO","BIO","100% pur jus 70cl",null,'6,60€','33,50€',1,'../public/img/vins/.png','SA','100% pur jus de raisain 70cl',
'D’une jolie couleur jaune paille brillante, sa robe illustre sa dénomination sans arôme
artificiel, sans colorant. A la dégustation, on appréciera tous les arômes du fruit sucré
naturellement sans ajout, et ses bienfaits pour tous.',null);

-- Insertion table Produit Mousseux
INSERT INTO Produit VALUES (null,"MO","M","Bulles de Foncaussade",null,'11,00€','56,00€',0,null,'Brut','Vins pétillants méthode traditionnelle',
"De couleur jaune clair, le vin laisse s'échapper de fines bulles qui soutiennent des
senteurs de fruits à chair blanche où dominent les arômes de pêches et de pomme
granit. Brut sans agressivité, équilibré !",null);

-- Insertion table Produit Bag in Box (BIB)
INSERT INTO Produit VALUES (null,"BIB","BIB","BIB 20L - Bergerac AOC rouge",null,'61,00€',null,0,null,null,'Desc courte',
"Robe de couleur pourpre. Le nez est fait d’arômes de petits fruits rouges. La
bouche est ronde et propose des parfums persistants.",null);

INSERT INTO Produit VALUES (null,"BIB","BIB","BIB 10L - Bergerac AOC rouge ou rosé",null,'33,00€',null,0,null,null,'Desc courte','Desc Longue',null);

INSERT INTO Produit VALUES (null,"BIB","BIB","BIB 5L - Bergerac blanc sec,rouge merlot ou rosé",null,'22,50€',null,0,null,null,'Desc courte','Desc Longue',null);

select nom || prenom from Contact



