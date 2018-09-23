-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 17 fév. 2018 à 01:39
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catclinic_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADVICES`
--

CREATE TABLE `ADVICES` (
  `ID_ADVICE` int(11) NOT NULL,
  `TYPES` varchar(250) DEFAULT NULL,
  `SHOWED` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ADVICES`
--

INSERT INTO `ADVICES` (`ID_ADVICE`, `TYPES`, `SHOWED`) VALUES
(1, 'Maladies et vaccination', '\n<h3>Votre chat compte sur vous pour être protégé</h3>		\n<p>L\'un des meilleurs moyens de permettre à votre chat de vivre en santé pendant de nombreuses années est de le\nfaire <em>vacciner</em> contre les maladies félines les plus répandues. Au cours des premières semaines de son\nexistence, votre chat a reçu, par le lait de sa mère, des <em>anticorps</em> qui l\'ont immunisé contre certaines maladies.</p>\n<p>Après cette période, <strong>c\'est à vous qu\'il revient de protéger votre compagnon, avec l\'aide et les conseils de votre\nvétérinaire</strong>.</p>\n\n<h3>Comment un vaccin fonctionne t-il ?</h3>\n<p>Un vaccin contient une <strong>petite quantité de virus</strong>, de bactéries ou d\'autres organismes causant des maladies. Ceux-ci ont été soit atténués soit « tués ». Lorsque ces organismes sont administrés à votre chat, ils <em>stimulent son système immunitaire</em> qui produit des cellules et des protéines qui combattent la maladie « les anticorps », et protègent votre animal contre certaines maladies.</p>\n\n<h3>Quand dois-je faire vacciner mon chat ?</h3>\n<p>En général, l\'immunité que reçoit un chaton à sa naissance commence à s\'estomper après <em>neuf semaines</em>. C\'est alors le moment, habituellement, de lui administrer ses premiers vaccins. Il doit recevoir un rappel de 3 à 4\nsemaines plus tard. Par la suite, votre chat devra <strong>se faire vacciner régulièrement toute sa vie</strong>. Bien sûr, ce ne sont que des lignes directrices. Votre vétérinaire sera en mesure de <em>déterminer le programme de vaccination</em> qui répondra parfaitement aux besoins de votre compagnon félin.</p>\n'),
(2, 'Les dangers domestiques', '\n<p>Comment faire de votre maison un	endroit sûr pour vos animaux domestiques</p>\n<p>Tout comme les parents rendent leur maison à l’épreuve de leurs enfants, les propriétaires d’animaux domestiques devraient faire de même pour leur animal domestique. Nos compagnons à quatre pattes sont comme les bébés et les bambins	: curieux de nature, ils sont à explorer leur environnement avec leurs pattes et leurs griffes et à goûter à tout.	</p>\n'),
(3, 'Administration des medicaments', '\n<p>Tout comme vous, votre animal sera malade et il est probable que vous deviez lui administrer des médicaments prescrits par votre vétérinaire. L’emploi d’une <em>bonne méthode<em> facilitera la vie de tout le monde.</p>\n\n<table>\n    <thead>\n    <tr>\n        <th>Mode de prise</th>\n        <th>Posologie</th>\n        <th>Protocole</th>\n    </tr>\n    <tbody>\n    <tr>\n        <td>Les comprimés ou gelules</td>\n        <td>C\'est le seul médicament qu\'on puisse lui administrer sans problème. Contrairement à ce qu\'on croit, votre animal est parfaitement capable d\'avaler des gros comprimés</td>\n        <td>\n            <ol>\n                <li>re Etape\n                    <ul>\n                        <li>Placez le comprimé entre vos doigts.</li>\n                        <li>De l’autre main, tenez sa tête par derrière. Le menton doit passer à la verticale.</li>\n                    </ul>\n                </li>\n                <li>e Etape\n                    <ul>\n                        <li>Maintenant, ses yeux fixent le plafond, la lèvre inférieure baille spontanément.</li>\n                        <li>Si votre animal n’ouvre pas la gueule, exercez une légère pression sur sa mâchoire inférieure à l’aide de votre majeur.</li>\n                    </ul>\n                </li>\n                <li>e Etape\n                    <ul>\n                        <li>Laissez votre majeur sur les petites incisives de votre animal afin que sa gueule reste ouverte.</li>\n                        <li>Déposez le comprimé le plus loin possible dans la gueule.</li>\n                        <li>Refermez la gueule.</li>\n                    </ul>\n                </li>\n                <li>e Etape\n                    <ul>\n                        <li>Masser sa gorge ou soufflez sur son nez pour l’inciter à déglutir.</li>\n                    </ul>\n                </li>\n            </ol></td>\n    </tr>\n    <tr>\n        <td>Les liquides</td>\n        <td>Agitez le flacon si cela est demandé./td>\n        <td>\n        <ol>\n            <li>re Etape\n                <ul>\n                    <li>Tout d’abord, remplissez une seringue du médicament.</li>\n                </ul>\n            </li>\n            <li>e Etape\n                <ul>\n                    <li>Le médicament liquide doit être versé dans l\'espace entre la canine et les molaires.</li>\n                </ul>\n            </li>\n            <li>e Etape\n                <ul>\n                    <li>Tenez les mâchoires de votre animal fermées et renversez légèrement sa tête vers l’arrière.</li>\n                </ul>\n            </li>\n        </ol>\n    </td>\n    </tr>\n    </tbody>\n    </thead>\n</table>\n\n<h3>Conseil Pratiques</h3>\n\nLisez attentivement l\'étiquette.	\n\nDemandez à votre vétérinaire à quel moment du repas le médicament peut être donné.	\n	\n<ul>\n<li>Cacher le comprimé dans un morceau d\'aliment appétent (viande hachée, fromage).</li>\n<li>Demandez à un ami ou à un membre de la famille de vous aider.</li>\n<li>Lorsque la taille de l\'animal le permet, il est plus facile d\'administrer des médicaments si l\'animal est placé sur une table.</li>\n<li>Lorsque vous donnez un médicament, demeurez calme, car votre animal peut sentir votre nervosité, ce	\nqui rendra votre tâche plus difficile. Vous devez toujours le féliciter et le récompenser avec une gâterie.</li>	\n<li>Pour	éviter de mettre vos doigts dans la gueule de votre compagnon, vous pouvez utiliser une seringue	 spéciale.	Il s’agit d’un tube en plastique similaire à une seringue qui permet de déposer le comprimé ou la	\ncapsule dans la gueule de l’animal.	</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Structure de la table `ADVICES_COMMENTS`
--

CREATE TABLE `ADVICES_COMMENTS` (
  `ID_ADVICE` int(11) NOT NULL,
  `ID_COMMENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `COMMENTS`
--

CREATE TABLE `COMMENTS` (
  `ID_COMMENT` int(11) NOT NULL,
  `COMMENTED` text,
  `COMMENTEDDATE` datetime DEFAULT NULL,
  `AUTHOR` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `DAYS`
--

CREATE TABLE `DAYS` (
  `ID_DAY` int(11) NOT NULL,
  `DAYNAME` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DAYS`
--

INSERT INTO `DAYS` (`ID_DAY`, `DAYNAME`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `DAYS_HOURS`
--

CREATE TABLE `DAYS_HOURS` (
  `ID_DAY` int(11) NOT NULL,
  `ID_HOUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DAYS_HOURS`
--

INSERT INTO `DAYS_HOURS` (`ID_DAY`, `ID_HOUR`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(7, 3),
(6, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `DOCTORS`
--

CREATE TABLE `DOCTORS` (
  `ID_DOCTOR` int(11) NOT NULL,
  `LASTNAME` varchar(40) DEFAULT NULL,
  `FIRSTNAME` varchar(40) DEFAULT NULL,
  `PHONENUMBER` int(11) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `TYPEDOCTOR` varchar(25) NOT NULL,
  `PORTRAIT` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DOCTORS`
--

INSERT INTO `DOCTORS` (`ID_DOCTOR`, `LASTNAME`, `FIRSTNAME`, `PHONENUMBER`, `MAIL`, `TYPEDOCTOR`, `PORTRAIT`, `PASSWORD`) VALUES
(1, 'Remain', 'André', 421230668, 'andre.remain@catclinic.com', 'Médecin', '../../public/img/dummy1.jpg', 'remain'),
(2, 'Burlotte', 'Sylvie', 421230669, 'sylvie.burlotte@catclinic.com', 'Médecin', '../../public/img/dummy2.jpg', 'burlotte'),
(3, 'Abeauveaux', 'Jérôme', 421230667, 'jerome.abeauveaux@catclinic.com', 'ASV', '../../public/img/dummy3.jpg', 'abeauveaux');

-- --------------------------------------------------------

--
-- Structure de la table `DOCTORS_DAYS`
--

CREATE TABLE `DOCTORS_DAYS` (
  `ID_DOCTOR` int(11) NOT NULL,
  `ID_DAY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DOCTORS_DAYS`
--

INSERT INTO `DOCTORS_DAYS` (`ID_DOCTOR`, `ID_DAY`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `DOCTORS_SPECIALITIES`
--

CREATE TABLE `DOCTORS_SPECIALITIES` (
  `ID_DOCTOR` int(11) NOT NULL,
  `ID_SPECIALITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DOCTORS_SPECIALITIES`
--

INSERT INTO `DOCTORS_SPECIALITIES` (`ID_DOCTOR`, `ID_SPECIALITY`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4),
(2, 5),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `HOURS`
--

CREATE TABLE `HOURS` (
  `ID_HOUR` int(11) NOT NULL,
  `HOURS` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `HOURS`
--

INSERT INTO `HOURS` (`ID_HOUR`, `HOURS`) VALUES
(1, '08:30:00'),
(2, '10:00:00'),
(3, '12:00:00'),
(4, '18:00:00'),
(5, '19:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `SPECIALITIES`
--

CREATE TABLE `SPECIALITIES` (
  `ID_SPECIALITY` int(11) NOT NULL,
  `SPECIALITY` varchar(50) DEFAULT NULL,
  `SPECIALITY_DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `SPECIALITIES`
--

INSERT INTO `SPECIALITIES` (`ID_SPECIALITY`, `SPECIALITY`, `SPECIALITY_DESCRIPTION`) VALUES
(1, 'Radiologie', '<h3>Well, thanks to the Internet, I\'m now bored with sex. Is there a place on the web that panders to my lust for violence?</h3>\r\n<p>That\'s not soon enough! Kids don\'t turn rotten just from watching TV. Good man. Nixon\'s pro-war and pro-family. Hello Morbo, how\'s the family? Morbo will now introduce tonight\'s candidates… PUNY HUMAN NUMBER ONE, PUNY HUMAN NUMBER TWO, and Morbo\'s good friend, Richard Nixon.</p>'),
(2, 'Echographie', '<p>Leela, Bender, we\'re going grave robbing. That\'s not soon enough! Michelle, I don\'t regret this, but I both rue and lament it. Daylight and everything. No, just a regular mistake.</p>\r\n<ol>\r\n\r\n    <li>I\'m just glad my fat, ugly mama isn\'t alive to see this day.</li><li>You\'ll have all the Slurm you can drink when you\'re partying with Slurms McKenzie!</li><li>All I want is to be a monkey of moderate intelligence who wears a suit… that\'s why I\'m transferring to business school!</li>\r\n\r\n</ol>'),
(3, 'Analyses sanguines', '<p>Sorry, checking all the water in this area; there\'s an escaped fish. I hate yogurt. It\'s just stuff with bits in. I\'m nobody\'s taxi service; I\'m not gonna be there to catch you every time you feel like jumping out of a spaceship.</p>\r\n<ul>\r\n\r\n    <li>Did I mention we have comfy chairs?</li><li>I\'m the Doctor. Well, they call me the Doctor. I don\'t know why. I call me the Doctor too. I still don\'t know why.</li><li>No… It\'s a thing; it\'s like a plan, but with more greatness.</li>\r\n\r\n</ul>'),
(4, 'Laboratoire et cytologie', 'ILTY'),
(5, 'Dentisterie', 'ETZHEZTTHZHTE'),
(6, 'Chirurgie', '\"\'gh(\'hz\'(h(\'zh'),
(7, 'Hospitalisation', 'Voici votre article');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADVICES`
--
ALTER TABLE `ADVICES`
  ADD PRIMARY KEY (`ID_ADVICE`);

--
-- Index pour la table `ADVICES_COMMENTS`
--
ALTER TABLE `ADVICES_COMMENTS`
  ADD PRIMARY KEY (`ID_ADVICE`,`ID_COMMENT`),
  ADD KEY `FK_ADVICES_COMMENTS_ID_COMMENT` (`ID_COMMENT`);

--
-- Index pour la table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  ADD PRIMARY KEY (`ID_COMMENT`);

--
-- Index pour la table `DAYS`
--
ALTER TABLE `DAYS`
  ADD PRIMARY KEY (`ID_DAY`);

--
-- Index pour la table `DAYS_HOURS`
--
ALTER TABLE `DAYS_HOURS`
  ADD PRIMARY KEY (`ID_DAY`,`ID_HOUR`),
  ADD KEY `FK_DAYS_HOURS_ID_HOUR` (`ID_HOUR`);

--
-- Index pour la table `DOCTORS`
--
ALTER TABLE `DOCTORS`
  ADD PRIMARY KEY (`ID_DOCTOR`);

--
-- Index pour la table `DOCTORS_DAYS`
--
ALTER TABLE `DOCTORS_DAYS`
  ADD PRIMARY KEY (`ID_DOCTOR`,`ID_DAY`),
  ADD KEY `FK_DOCTORS_DAYS_ID_DAY` (`ID_DAY`);

--
-- Index pour la table `DOCTORS_SPECIALITIES`
--
ALTER TABLE `DOCTORS_SPECIALITIES`
  ADD PRIMARY KEY (`ID_DOCTOR`,`ID_SPECIALITY`),
  ADD KEY `FK_DOCTORS_SPECIALITIES_ID_SPECIALITY` (`ID_SPECIALITY`);

--
-- Index pour la table `HOURS`
--
ALTER TABLE `HOURS`
  ADD PRIMARY KEY (`ID_HOUR`);

--
-- Index pour la table `SPECIALITIES`
--
ALTER TABLE `SPECIALITIES`
  ADD PRIMARY KEY (`ID_SPECIALITY`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADVICES`
--
ALTER TABLE `ADVICES`
  MODIFY `ID_ADVICE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `DAYS`
--
ALTER TABLE `DAYS`
  MODIFY `ID_DAY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `DOCTORS`
--
ALTER TABLE `DOCTORS`
  MODIFY `ID_DOCTOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `HOURS`
--
ALTER TABLE `HOURS`
  MODIFY `ID_HOUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `SPECIALITIES`
--
ALTER TABLE `SPECIALITIES`
  MODIFY `ID_SPECIALITY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ADVICES_COMMENTS`
--
ALTER TABLE `ADVICES_COMMENTS`
  ADD CONSTRAINT `FK_ADVICES_COMMENTS_ID_ADVICE` FOREIGN KEY (`ID_ADVICE`) REFERENCES `ADVICES` (`ID_ADVICE`),
  ADD CONSTRAINT `FK_ADVICES_COMMENTS_ID_COMMENT` FOREIGN KEY (`ID_COMMENT`) REFERENCES `COMMENTS` (`ID_COMMENT`);

--
-- Contraintes pour la table `DAYS_HOURS`
--
ALTER TABLE `DAYS_HOURS`
  ADD CONSTRAINT `FK_DAYS_HOURS_ID_DAY` FOREIGN KEY (`ID_DAY`) REFERENCES `DAYS` (`ID_DAY`),
  ADD CONSTRAINT `FK_DAYS_HOURS_ID_HOUR` FOREIGN KEY (`ID_HOUR`) REFERENCES `HOURS` (`ID_HOUR`);

--
-- Contraintes pour la table `DOCTORS_DAYS`
--
ALTER TABLE `DOCTORS_DAYS`
  ADD CONSTRAINT `FK_DOCTORS_DAYS_ID_DAY` FOREIGN KEY (`ID_DAY`) REFERENCES `DAYS` (`ID_DAY`),
  ADD CONSTRAINT `FK_DOCTORS_DAYS_ID_DOCTOR` FOREIGN KEY (`ID_DOCTOR`) REFERENCES `DOCTORS` (`ID_DOCTOR`);

--
-- Contraintes pour la table `DOCTORS_SPECIALITIES`
--
ALTER TABLE `DOCTORS_SPECIALITIES`
  ADD CONSTRAINT `FK_DOCTORS_SPECIALITIES_ID_DOCTOR` FOREIGN KEY (`ID_DOCTOR`) REFERENCES `DOCTORS` (`ID_DOCTOR`),
  ADD CONSTRAINT `FK_DOCTORS_SPECIALITIES_ID_SPECIALITY` FOREIGN KEY (`ID_SPECIALITY`) REFERENCES `SPECIALITIES` (`ID_SPECIALITY`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
