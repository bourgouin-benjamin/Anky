-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 30 juil. 2021 à 01:07
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anky`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `cat`) VALUES
(1, 'Actualité'),
(2, 'Les plus spoilées'),
(3, 'Pour moi'),
(4, 'Nouveautés');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210612205559', '2021-06-12 20:56:11', 43),
('DoctrineMigrations\\Version20210616213454', '2021-06-16 21:35:05', 103),
('DoctrineMigrations\\Version20210627192732', '2021-06-27 19:27:46', 66),
('DoctrineMigrations\\Version20210627192814', '2021-06-27 19:28:28', 42),
('DoctrineMigrations\\Version20210627193409', '2021-06-27 19:34:18', 176),
('DoctrineMigrations\\Version20210627194334', '2021-06-27 19:43:42', 116),
('DoctrineMigrations\\Version20210630083941', '2021-06-30 08:39:51', 388),
('DoctrineMigrations\\Version20210630095854', '2021-06-30 09:59:10', 231),
('DoctrineMigrations\\Version20210705164019', '2021-07-05 16:40:26', 157),
('DoctrineMigrations\\Version20210705165827', '2021-07-05 16:58:32', 90),
('DoctrineMigrations\\Version20210717131521', '2021-07-17 13:15:45', 138),
('DoctrineMigrations\\Version20210717135623', '2021-07-17 13:56:30', 206),
('DoctrineMigrations\\Version20210720134024', '2021-07-20 13:40:32', 95),
('DoctrineMigrations\\Version20210720141431', '2021-07-20 14:14:39', 46),
('DoctrineMigrations\\Version20210721091521', '2021-07-21 09:25:24', 93),
('DoctrineMigrations\\Version20210722100831', '2021-07-22 10:08:40', 80);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `gen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `gen`) VALUES
(1, 'Thriller'),
(5, 'Drame'),
(6, 'Policier'),
(8, 'Fantastique'),
(9, 'Comédie'),
(10, 'Action'),
(11, 'Ados'),
(12, 'Horreur'),
(13, 'Romance'),
(14, 'Science-fiction');

-- --------------------------------------------------------

--
-- Structure de la table `lock_main`
--

CREATE TABLE `lock_main` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lock_main`
--

INSERT INTO `lock_main` (`id`, `title`, `text`) VALUES
(1, 'Lock va vous aider', 'Coucou toi !\r\nJe suis Lock, ton ChatBot sur mesure pour t\'aider à te repérer dans notre application, Anky. Comment puis-je t\'aider ?'),
(18, 'Présentation & Tutoriel', 'Je connais Anky sur le bout des doigts, que veux-tu apprendre à propos de l\'application ?'),
(19, 'Anky, qu\'est-ce que c\'est ?', 'Anky est une application anti-spoil. En utilisant Anky, tu peux bloquer des mots-clés relatifs aux séries que tu veux afin que des messages contenant ces mots-clés et donc un spoil potentiel soient masqués.'),
(20, 'Tutoriels guidés', 'Je peux te montrer comment utiliser notre application, je possède de nombreux tutoriels dans ma base de données ! \r\nQue voudrais-tu apprendre ?'),
(21, 'Tutoriel', 'Je suis désolé, le tutoriel n\'est pas encore disponible. Moi et l\'équipe de Anky travaillons fort pour t\'offrir la meilleur expérience !'),
(22, 'Mon compte', 'Je peux te diriger vers différentes pages concernant ton compte.\r\nOù veux-tu que je t\'emmène ?'),
(23, 'Mes informations', 'Normalement, je suis censée te rediriger vers la page de tes informations personnelles. Cette page n\'existe pas encore, elle arrive très bientôt !'),
(24, 'Ma formule d\'abonnement', 'Normalement, je suis censée te rediriger vers la page de ta formule d\'abonnement. Cette page n\'existe pas encore, elle arrive très bientôt !'),
(25, 'Ma liste de mots bloqués', 'Normalement, je suis censée te rediriger vers la page de tes mots bloqués. Cette page n\'existe pas encore, elle arrive très bientôt !'),
(26, 'Méthodes de blocage', 'Je vais te conduire sur les pages concernant le blocage anti-spoil imaginé par Anky.\r\nQue veux-tu faire ?'),
(27, 'Bloquer des séries', 'Tu aimerais que je t\'emmène sur la page où tu pourras bloquer des séries, ou bien que je te montre comment t\'y prendre ?'),
(28, 'Ma formule d\'abonnement', 'Normalement, je suis censée te rediriger vers la page de ta formule d\'abonnement. Cette page n\'existe pas encore, elle arrive très bientôt !'),
(29, 'Paramètres du blocage', 'Normalement, je suis censée te rediriger vers la page des paramètres du blocage. Cette page n\'existe pas encore, elle arrive très bientôt !'),
(30, 'Besoin d\'aide ?', 'Moi, Lock, promet de t\'apporter les meilleures informations dont tu as besoin ! \r\nDonne moi juste une dernière précision sur ta demande s\'il te plaît.'),
(31, 'F.A.Q.', 'Voici les questions qui nous sont le plus fréquemment posées, mais tu peux aussi te rendre sur notre page F.A.Q. pour accéder à tout ce qui pourrait être sujet à un questionnement de ta part.'),
(32, 'Contacter le support', 'Plusieurs moyens sont à ta disposition, en voici une liste : \r\n\r\nPar mail \r\nsupport@anky.fr \r\n\r\nPar téléphone (de 10h à 17h30 du lundi au vendredi)\r\n01 23 45 67 89 \r\n\r\nTu peux également nous envoyer un message grâce au formulaire que tu trouveras en cliquant sur le liens suivant.');

-- --------------------------------------------------------

--
-- Structure de la table `lock_question`
--

CREATE TABLE `lock_question` (
  `id` int(11) NOT NULL,
  `main_id_id` int(11) NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lock_question`
--

INSERT INTO `lock_question` (`id`, `main_id_id`, `question`, `link`) VALUES
(18, 1, 'Présentation & Tutoriels', '/lock/18'),
(19, 1, 'Mon compte', '/lock/22'),
(20, 1, 'Blocage anti-spoil', '/lock/26'),
(21, 1, 'Besoin d\'aide ?', '/lock/30'),
(22, 18, 'Anky, qu\'est-ce que c\'est ?', '/lock/19'),
(23, 18, 'Tutoriels guidés', '/lock/20'),
(24, 20, 'Tutoriel #1', '/lock/21'),
(25, 20, 'Tutoriel #2', '/lock/21'),
(26, 20, 'Tutoriel #ETC', '/lock/21'),
(27, 22, 'Mes informations', '/lock/23'),
(28, 22, 'Ma formule d\'abonnement', '/lock/24'),
(29, 22, 'Ma liste de mots bloqués', '/lock/25'),
(30, 26, 'Bloquer des séries', '/lock/27'),
(31, 26, 'Voir ma formule d\'abonnement', '/lock/28'),
(32, 26, 'Paramètres du blocage', '/lock/29'),
(33, 27, 'Je veux bloquer des séries', '/anky'),
(34, 27, 'Tutoriel : Bloquer des mots', '/lock/21'),
(35, 30, 'Tutoriels guidés', '/lock/20'),
(36, 30, 'F.A.Q.', '/lock/31'),
(37, 30, 'Contacter le support', '/lock/32'),
(38, 31, 'Question fréquente #1', '/lock/1'),
(39, 31, 'Question fréquente #2', '/lock/1'),
(40, 31, 'Question fréquente #3', '/lock/1'),
(41, 31, 'Page F.A.Q.', '/lock/1'),
(42, 32, 'Formulaire de contact', '/lock/1'),
(43, 19, 'Merci Lock !', '/lock/1'),
(44, 21, 'Merci Lock !', '/lock/1'),
(46, 23, 'Merci Lock !', '/lock/1'),
(47, 24, 'Merci Lock !', '/lock/1'),
(48, 25, 'Merci Lock !', '/lock/1'),
(49, 28, 'Merci Lock !', '/lock/1'),
(50, 29, 'Merci Lock !', '/lock/1');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashtag` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `username`, `hashtag`, `post`) VALUES
(5, 'Paquito del Pepitas', '[\"rick\",\"morty\",\"s4e3\",\"beth\"]', 'Ceci est une magnifique publication qui spoil de ouf un plot twist énorme dans l\'avant-dernière saison de Rick et Morty, et oui je gagne des lignes en racontant ma vie, quelle dinguerie !'),
(6, 'GrandM', '[\"StrangerThings\",\"scifi\"]', 'La meuf avec ses pouvoir la, trop cheatée'),
(7, 'pepito', '[\"pepito\",\"pascal\"]', 'Ohlala ya Berlin qui meurt ohmagad'),
(8, 'Risitas', '[\"breakingbad\",\"walterwhite\"]', 'Walter White quand il tue Barry sans même lui lancé un regard... J\'en ai des frissons !'),
(9, 'Lia', '[\"StrangerThings\",\"Fiction\"]', 'Wah so strange'),
(10, 'Daniel de Papel', '[\"Casa\",\"Papel\",\"Berlin\"]', 'Un giga spoil de la casa de papel damn'),
(11, 'Firmad', '[\"CasadePapel\",\"mort\"]', 'oh oh, je \'y attendais pas'),
(12, 'Saes', '[\"Rick\",\"Morty\",\"Science\"]', 'Saison 5 en approche !'),
(13, 'El-Coquino', '[\"RicketMorty\",\"AdultSwim\"]', 'L\'épisode 3 de la saison 5 de Rick et Morty...'),
(14, 'iWantIt', '[\"WalkingDead\",\"Zombie\"]', 'Survivre s’annonce plus difficile que prévu dans la saison 11 de The Walking Dead'),
(15, 'King Teums', '[\"BreakingBad\"]', 'Dans un monde où breaking bad n\'existe pas'),
(16, 'FDE Trevor', '[\"BreakingBad\",\"drogue\"]', 'Y a des humains qui sont persuadés que Prison Break est la meilleure série au monde alors que Breaking Bad et Murder existent'),
(17, 'Falémayé', '[\"Strange\",\"SciFi\"]', 'C\'était quoi ce dernier épisode !!!'),
(18, 'DarkLover69', '[\"Dark\",\"suspence\"]', 'J\'y comprend rien du tout'),
(19, 'Milice', '[\"Dark\",\"peur\",\"scary\"]', 'Dark meilleure série Netflix'),
(20, 'S H I R O', '[\"Loki\",\"MCU\"]', 'Le dernier épisode de Loki est une des meilleures choses qui soit arrivée dans le MCU'),
(21, 'ppau', '[\"Loki\",\"MCU\",\"Disney\"]', 'Go se retaper toute la saison ce soir !'),
(22, 'Thomas news', '[\"BrooklynNineNine\",\"Brooklyn\",\"serie\"]', 'Nous le 13 août devant la dernière saison de Brooklyn nine nine'),
(23, 'Ash', '[\"BrooklinNineNine\",\"Generique\"]', 'à partir de l\'épisode 5 de la saison 6 de Brooklyn Nine-Nine, le générique change, et Gina est remplacée par Hitchcock et Scully, et elle n\'est plus sur l\'image de groupe non plus'),
(24, 'Infos séries', '[\"SweetTooth\",\"New\",\"s2\"]', 'Netflix renouvelle officiellement Sweet Tooth pour une saison 2.'),
(25, 'BloodRat', '[\"SweetTooth\",\"Netflix\"]', 'Ok, alors, là nouvelle série netflix « Sweet Tooth » elle est INCROYABLE'),
(26, 'xX_Leorio1234_Xx', '[\"MesPremieresFoi\",\"Netflix\"]', 'jajzjzjz dans mes première fois ils parlent de zayn et gigi, harry, twilight et bts pq j’ai pas regardé plus tôt'),
(27, 'Océane', '[\"LoveVictor\",\"Victor\",\"serie\"]', 'Non mais entre Young Royals et la saison 2 de Love Victor j’ai compris que j’allais souffrir'),
(28, 'Jojo-DisneyDream', '[\"LoveVictor\",\"Netflix\",\"s2\"]', 'Cette saison 2 de Love Victor est juste exceptionnelle !'),
(29, 'Star wars holo side', '[\"TheMandalorian\",\"StarWars\"]', 'Le talentueux artiste deepfake Shamook a été embauché en tant qu\'artiste principal de capture faciale chez Lucasfilm. Le YouTuber a attiré la notoriété en décembre dernier après que sa version améliorée du vieillissement de Mark Hamill. Bonne nouvelle'),
(30, 'Drole2savoir', '[\"TheMandalorian\",\"Disney\",\"StarWars\"]', 'Durant le tournage de «The Mandalorian», en 2019, ils avaient plus de costumes de Stormtrooper. Ils ont donc contacté des fans de Star Wars, pour jouer dans l\'épisode avec leurs propres costumes fait maison.'),
(31, 'Aynur', '[\"WandaVision\",\"MCU\"]', 'J\'ai fini Wanda Vision... bof'),
(32, 'Coléo', '[\"WandaVision\",\"MCU\",\"Spoil\"]', 'Wanda quand elle a commencer à comprendre qu\'elle avait créer sa propre réalité en emprisonnant des milliers de personne pour vivre avec vision');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci,
  `resume` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `nom`, `keywords`, `resume`, `image`) VALUES
(5, 'Wanda Vision', '[\"Wanda\",\"Maximoff\",\"Vision\",\"MCU\",\"Marvel\",\"Sorci\\u00e8re Rouge\",\"WandaVision\"]', 'Produite par les studios Marvel, “WandaVision” mélange le style des sitcoms classiques avec l\'univers Marvel. Wanda Maximoff (Elizabeth Olsen) et Vision (Paul Bettany), deux super-héros menant une vie des plus normales, commencent à se douter que celle-ci n\'est pas aussi parfaite qu’elle en a l\'air. Une nouvelle série réalisée par Matt Shakman avec Jac Shaeffer comme scénariste principale.', '60f9496b5b9b6.jpg'),
(16, 'Rick & Morty', '[\"Rick\",\"Morty\",\"AdultSwim\"]', 'Rick, chercheur brillant, mais porté sur la bouteille, emmène son petit-fils timoré Morty dans d\'autres mondes et dimensions où il lui fait vivre de folles escapades.', '60f948c0a97ce.jpg'),
(19, 'Stranger Things', '[\"Stranger\",\"Things\",\"Stranger Things\",\"strangerthings\",\"Will Byers\",\"Byers\",\"strange\"]', 'Quand un jeune garçon disparaît, une petite ville découvre une affaire mystérieuse, des expériences secrètes, des forces surnaturelles terrifiantes... et une fillette.', '60f9498f03a72.jpg'),
(22, 'Sweet Tooth', '[\"Sweet Tooth\",\"Sweet\",\"Tooth\",\"Gus\",\"Jappered\"]', 'Dans un monde post-apocalyptique rempli de dangers, une adorable créature mi-cerf, mi-garçon aspire à un nouveau départ aux côtés d\'un protecteur bourru.', '60f949edadeb0.jpg'),
(24, 'Breaking Bad', '[\"Breaking Bad\",\"Breaking\",\"Bad\",\"Walther White\",\"Walther\",\"White\"]', 'Un professeur de chimie atteint d\'un cancer s\'associe à un ancien élève pour fabriquer et vendre de la méthamphétamine afin d\'assurer l\'avenir financier de sa famille.', '61005545564cb.png'),
(25, 'La casa de papel', '[\"Casa De Papel\",\"Papel\",\"Casa\",\"Professeur\",\"Berlin\",\"Tokyo\",\"Nairobi\",\"Denver\",\"Helsinki\",\"CasadePapel\"]', 'Huit voleurs font une prise d\'otages dans la Maison royale de la Monnaie d\'Espagne, tandis qu\'un génie du crime manipule la police pour mettre son plan à exécution.', '610055f6c7c03.jpg'),
(26, 'Brooklyn Nine-Nine', '[\"Brooklyn Nine-Nine\",\"Brooklyn\",\"Nine-Nine\",\"99\",\"Jake Peralta\",\"Peralta\"]', 'L’arrivée au commissariat d\'un capitaine très strict force Jake Peralta, jeune flic de Brooklyn brillant mais immature, à enfin obéir aux règles et travailler en équipe.', '61005697e2329.jpg'),
(27, 'The Walking Dead', '[\"Walking Dead\",\"Walking\",\"Dead\",\"Rodeurs\",\"Rick Grimes\",\"Grimes\",\"Negan\"]', 'Dans un monde apocalyptique sous l\'emprise des zombies, des rescapés se rassemblent afin de lutter pour leur survie et de préserver leur humanité.', '610057ddb458a.jpg'),
(30, 'Mes premières fois', '[\"Premi\\u00e8res Fois\",\"mespremieresfois\",\"premi\\u00e8re\",\"Never Have I Ever\",\"Devi Vishwakumar\",\"Vishwakuma\"]', 'Après une année traumatisante, une ado indo-américaine intello transparente décide de devenir hyper populaire. Mais rien, ni personne, ne lui facilite la tâche.', '61005a675ef38.jpg'),
(31, 'Loki', '[\"Loki\",\"Thanos\",\"Tesseract\",\"Marvel\",\"Thor\",\"Odin\",\"Tom Hiddleston\",\"Hiddleston\"]', 'Le méchant lunatique Loki (Tom Hiddleston) reprend son rôle de dieu de la malice dans \"Loki\", la nouvelle série des studios Marvel qui se déroule après \"Avengers : Endgame\". Kate Herron en est la réalisatrice et Michael Waldron le principal scénariste.', '61005ca19e27c.jpg'),
(32, 'Love, Victor', '[\"Love Victor\",\"Victor\",\"Benjy\",\"Victor Salazar\",\"Salazar\",\"Michael Cimino\",\"Cimino\"]', 'Quand la famille de Victor Salazar quitte le Texas rural pour s\'installer à Atlanta, il espère que son nouveau lycée dans une grande ville sera un endroit propice à sa quête identitaire et lui permettra de prendre un nouveau départ. Mais le jour de son arrivée au lycée de Creekwood, Victor se rend compte que les choses ne seront pas aussi simples et il prend contact avec Simon pour lui demander conseil.', '61005d2b5501b.jpg'),
(33, 'The Mandalorian', '[\"Mandalorian\",\"Star Wars\",\"StarWars\",\"Empire\",\"Din Djarin\",\"Djarin\",\"Pedro Pascal\",\"Baby Yoda\",\"Yoda\",\"Sith\",\"Jedi\",\"Lucasfilm\"]', 'Après la chute de l\'Empire, un chasseur de primes solitaire parcourt une galaxie sans foi ni loi.', '61005ed359de1.jpg'),
(34, 'Dark', '[\"Dark\",\"Jonas Kahnwald\",\"Kahnwald\",\"Mikkel\",\"Ulrich Nielsen\",\"Nielsen\",\"Marta\"]', 'Quatre familles affolées par la disparition d\'un enfant cherchent des réponses et tombent sur un mystère impliquant trois générations qui finit de les déstabiliser.', '610151a998f9e.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `series_categorie`
--

CREATE TABLE `series_categorie` (
  `series_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series_categorie`
--

INSERT INTO `series_categorie` (`series_id`, `categorie_id`) VALUES
(5, 1),
(16, 3),
(19, 2),
(22, 1),
(22, 3),
(24, 3),
(25, 1),
(26, 2),
(27, 2),
(30, 3),
(30, 4),
(31, 1),
(31, 2),
(31, 3),
(32, 4),
(33, 4),
(34, 2),
(34, 3);

-- --------------------------------------------------------

--
-- Structure de la table `series_genre`
--

CREATE TABLE `series_genre` (
  `series_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series_genre`
--

INSERT INTO `series_genre` (`series_id`, `genre_id`) VALUES
(5, 8),
(5, 10),
(16, 9),
(16, 11),
(16, 14),
(19, 12),
(19, 14),
(22, 5),
(22, 8),
(24, 1),
(24, 5),
(24, 6),
(25, 1),
(25, 5),
(25, 6),
(26, 6),
(26, 9),
(27, 5),
(27, 8),
(27, 12),
(30, 5),
(30, 9),
(30, 11),
(30, 13),
(31, 8),
(31, 9),
(31, 10),
(32, 9),
(32, 11),
(32, 13),
(33, 8),
(33, 10),
(33, 14),
(34, 5),
(34, 14);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_bloque` longtext COLLATE utf8mb4_unicode_ci,
  `series_bloque` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `pseudo`, `keywords_bloque`, `series_bloque`) VALUES
(4, 'benjamin_admin@mail.com', '[\"ROLE_ADMIN\"]', '$2y$13$O5OVxMg7iQnuZojRYdji2Og0kDDzZmigbTbll75yLIn3zQNQXaWri', 'Pepito', '[]', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `user_genre`
--

CREATE TABLE `user_genre` (
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_genre`
--

INSERT INTO `user_genre` (`user_id`, `genre_id`) VALUES
(4, 1),
(4, 5),
(4, 6),
(4, 8),
(4, 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lock_main`
--
ALTER TABLE `lock_main`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lock_question`
--
ALTER TABLE `lock_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5FF4C160DC182D11` (`main_id_id`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series_categorie`
--
ALTER TABLE `series_categorie`
  ADD PRIMARY KEY (`series_id`,`categorie_id`),
  ADD KEY `IDX_D991203D5278319C` (`series_id`),
  ADD KEY `IDX_D991203DBCF5E72D` (`categorie_id`);

--
-- Index pour la table `series_genre`
--
ALTER TABLE `series_genre`
  ADD PRIMARY KEY (`series_id`,`genre_id`),
  ADD KEY `IDX_F6DFD7E55278319C` (`series_id`),
  ADD KEY `IDX_F6DFD7E54296D31F` (`genre_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `user_genre`
--
ALTER TABLE `user_genre`
  ADD PRIMARY KEY (`user_id`,`genre_id`),
  ADD KEY `IDX_6192C8A0A76ED395` (`user_id`),
  ADD KEY `IDX_6192C8A04296D31F` (`genre_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `lock_main`
--
ALTER TABLE `lock_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `lock_question`
--
ALTER TABLE `lock_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lock_question`
--
ALTER TABLE `lock_question`
  ADD CONSTRAINT `FK_5FF4C160DC182D11` FOREIGN KEY (`main_id_id`) REFERENCES `lock_main` (`id`);

--
-- Contraintes pour la table `series_categorie`
--
ALTER TABLE `series_categorie`
  ADD CONSTRAINT `FK_D991203D5278319C` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D991203DBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `series_genre`
--
ALTER TABLE `series_genre`
  ADD CONSTRAINT `FK_F6DFD7E54296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F6DFD7E55278319C` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_genre`
--
ALTER TABLE `user_genre`
  ADD CONSTRAINT `FK_6192C8A04296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6192C8A0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
