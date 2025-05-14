DROP DATABASE IF EXISTS bdchaicharly;
CREATE DATABASE IF NOT EXISTS bdchaicharly;
USE bdchaicharly;


--
-- Base de données : `bdchaicharly`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

DROP TABLE IF EXISTS `abonne`;
CREATE TABLE IF NOT EXISTS `abonne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `dateAbo` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mdp` varchar(255) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mdp`, `login`) VALUES
(1, '$2y$10$qHlEdwTwn56msq6dkeQIB.wC/0pRA69tvbt4sQ0v8a7TNS0BLCkrW', 'Gabriel'),
(2, '$2y$10$uYKsMYJjEdVH0ij.JM.YjOgQC2SWHaYBRCG.l756b5uQ6DrrJwKpq', 'Julien'),
(3, '$2y$10$QakmCET0mb/9dGLJulVPj.8189LB7.2HygkBjQyLVBp9GecOPfiFW', 'Hugo');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `code` varchar(10) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`code`, `libelle`) VALUES
('BIB', 'Bag in Box'),
('BIO', 'BIOS'),
('BL', 'Blanc'),
('MO', 'Mousseux'),
('RG', 'Rouge'),
('RO', 'Rosé');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `message` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_mail_contact` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `mail`, `nom`, `prenom`, `message`, `date`, `heure`) VALUES
(1, NULL, 'paul', 'gabriel', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codeCat` varchar(10) DEFAULT NULL,
  `codeType` varchar(10) DEFAULT NULL,
  `nom` varchar(120) DEFAULT NULL,
  `annee` date DEFAULT NULL,
  `tarifUnit` varchar(10) DEFAULT NULL,
  `tarifCart` varchar(10) DEFAULT NULL,
  `stock` tinyint(1) DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `aspect` varchar(20) DEFAULT NULL,
  `descCourt` varchar(250) DEFAULT NULL,
  `descLong` text,
  `medaille` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codeCat` (`codeCat`),
  KEY `codeType` (`codeType`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `codeCat`, `codeType`, `nom`, `annee`, `tarifUnit`, `tarifCart`, `stock`, `imgUrl`, `aspect`, `descCourt`, `descLong`, `medaille`) VALUES
(1, 'RG', 'AB', 'Pélissiére', '2021-01-01', '6,80€', '34,50€', 1, '../public/img/vins/pelissiere.png', NULL, 'Desc courte', 'Robe de couleur pourpre. Le nez gourmand de petits fruits rouges et noirs mûrs\n(Griotte et cassis). On retrouve en bouche une aromatique qui reste sur le fruit, des\ntannins mesurés et une finale modérée.', NULL),
(2, 'RG', 'AB', 'Doméa', '2021-01-01', '7,50€', '39,00€', 0, '../public/img/vins/domea.png', NULL, 'Desc courte', 'Sous sa robe pourpre sombre, il révèle un nez de fruits rouges toastés avec\ndes notes de vanille. La bouche est ample avec des tannins fondants et une\nfinale complexe entre fruits et arômes de torréfaction.', 'Médaille d\'or Concou'),
(3, 'RG', 'AB', 'Rose de sigoules', '2019-01-01', '9,20€', '47,50€', 1, '../public/img/vins/Rose-Rouge.jpg', NULL, 'Fût de chêne 12mois', 'Avec sa robe profonde, ce vin révèle dès les premières notes au nez, la puissance \ntout en finesse du millésime, encore dominée par les notes d’élevage. La\nbouche est franche et propose des tanins encore sur la jeunesse mais qui\npromettent un bel avenir. La finale révèle les notes de fruits encore en retrait mais\nqui ne demanderont qu’à s’exprimer avec le temps.', NULL),
(4, 'RG', 'AB', 'Clos D\'Yvigne', '2018-01-01', '25,50€', NULL, 0, '../public/img/vins/clos-d\'yvigne.png', NULL, 'Magnum 150cl', 'La robe est rouge pourpre, le nez de fruits rouges mûrs avec des notes de pruneaux. \nLa bouche est ample, charnue, avec une finale vanillée, des notes de réglisse et de café torréfié. \nDes tannins puissants apportant une belle complexité.', 'Médaille d\'or Paris '),
(5, 'RG', 'AC', 'Château La Besage Prestige', '2019-01-01', '10,20€', '53,00€', 1, '../public/img/vins/chateau.png', NULL, 'Desc courte', 'La robe est grenat, soutenue, avec des reflets pourpres. Le nez est dominé par des\narômes de fruits noirs bien mûrs (cerises guigne, mûres). La bouche ample et suave,\nlaisse transparaitre des notes torréfiées et vanillées apportées par l’élevage. Une\nbelle longueur termine cette cuvée prometteuse qui saura se faire attendre quelques\nannées.', 'Medaille d\'or Sud Ou'),
(6, 'RG', 'AC', 'Audace', NULL, '19,80€', '102,00€', 0, '../public/img/vins/audace.png', NULL, 'Fût de chêne 12mois', 'Ce vin présente une robe grenat soutenue aux reflets brillants. Un nez riche et\ncomplexe où s’expriment d’abord des notes de torréfaction et de réglisse,\nrapidement rejoint par des flaveurs plus gourmandes de fruits rouges mûrs et de\nfruits confits (pruneaux). La bouche est ample et fraîche, tout en finesse, portées\npar des tanins soyeux qui confèrent une belle longueur.', NULL),
(7, 'RO', 'IBR', 'Original', '2023-01-01', '7,00€', '36,00€', 1, '../public/img/vins/Original-Rosé.jpg', NULL, 'Merlot capsule à vis IGP (pays du Périgord)', 'La robe est rose pâle. Le nez est gourmand, particulièrement explosif, et dominé par des arômes sucrés, bonbons anglais. La bouche, ronde et bien équilibrée avec une\nlégère acidité, présente des arômes de fruits rouges. Une belle persistance en fin de bouche.', NULL),
(8, 'BL', 'IBB', 'Original', '2024-01-01', '7,00€', '36,00€', 1, '../public/img/vins/sec.png', 'Sec', 'Sauvignon capsule à vis IGP (pays du Périgord)', 'Nez puissant, intense et complexe où dominent les notes minérales, de buis en fleur\net de pamplemousse. La bouche ample et équilibrée, sans excès de fraicheur (la\nvivacité du Sauvignon est balancée par une subtile édulcoration avant mise suivant\nles millésimes), laisse apparaitre une belle persistance aromatique avec des arômes\ngourmands d’agrumes et de fruits exotiques.', NULL),
(9, 'BL', 'ACB', 'Antidote', '2022-01-01', '7,90€', '41,00€', 1, '../public/img/vins/Antidote\n.png', 'Demi-sec', 'Demi-Sec IGP (pays du Périgord)', 'Vin d’une couleur jaune pâle. Explosion de saveurs, au nez, une palette aromatique\nqui s’étend des fruits à chair blanche aux agrumes. La bouche est gourmande entre\npêches blanches et pommes chantecler conclue par un équilibre subtil entre vivacité\net douceur.', 'Médaille d\'argent co'),
(10, 'BL', 'ACB', 'Rose de Sigoules doux', '2019-01-01', '10,30€', '53,50€', 1, '../public/img/vins/rose-doux.png', 'Doux', 'Vendanges Tardives', 'Une robe or brillant limpide. Un nez charmeur dominé par des fruits à chairs blanches\n(poires et pommes confits). La bouche est ample et suave, révélant la complexité de\nce vin. Des notes de pêche de vigne et d’agrumes viennent s’ajouter. Un bel\néquilibre entre sucrosité et fraîcheur en fait un « Côtes de Bergerac Blanc » très\noriginal.', 'Médaille d\'or Bordea'),
(11, 'BIO', 'BIO', '100% pur jus 70cl', NULL, '6,60€', '33,50€', 1, '../public/img/vins/.png', 'SA', '100% pur jus de raisain 70cl', 'D’une jolie couleur jaune paille brillante, sa robe illustre sa dénomination sans arôme\nartificiel, sans colorant. A la dégustation, on appréciera tous les arômes du fruit sucré\nnaturellement sans ajout, et ses bienfaits pour tous.', NULL),
(12, 'MO', 'M', 'Bulles de Foncaussade', NULL, '11,00€', '56,00€', 0, NULL, 'Brut', 'Vins pétillants méthode traditionnelle', 'De couleur jaune clair, le vin laisse s\'échapper de fines bulles qui soutiennent des\nsenteurs de fruits à chair blanche où dominent les arômes de pêches et de pomme\ngranit. Brut sans agressivité, équilibré !', NULL),
(13, 'BIB', 'BIB', 'BIB 20L - Bergerac AOC rouge', NULL, '61,00€', NULL, 0, NULL, NULL, 'Desc courte', 'Robe de couleur pourpre. Le nez est fait d’arômes de petits fruits rouges. La\nbouche est ronde et propose des parfums persistants.', NULL),
(14, 'BIB', 'BIB', 'BIB 10L - Bergerac AOC rouge ou rosé', NULL, '33,00€', NULL, 0, NULL, NULL, 'Desc courte', 'Desc Longue', NULL),
(15, 'BIB', 'BIB', 'BIB 5L - Bergerac blanc sec,rouge merlot ou rosé', NULL, '22,50€', NULL, 0, NULL, NULL, 'Desc courte', 'Desc Longue', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `code` varchar(10) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`code`, `libelle`) VALUES
('AB', 'AOC Bergerac'),
('AC', 'AOC Côte de Bergerac'),
('ACB', 'AOC Côte de Bergerac'),
('BIB', 'Bag In Box'),
('BIO', 'BIO Jus'),
('IBB', 'IGP Bergerac Blanc'),
('IBR', 'IGP Bergerac'),
('M', 'Vins pétillants');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`codeCat`) REFERENCES `categorie` (`code`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`codeType`) REFERENCES `type` (`code`);
COMMIT;

