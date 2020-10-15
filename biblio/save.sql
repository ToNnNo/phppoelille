-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 14 oct. 2020 à 12:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(75) NOT NULL,
  `resume` text,
  `publication` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `resume`, `publication`) VALUES
(1, 'Harry Potter à l\'école de sorcier', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, la célèbre école de sorcellerie où une place l\'attend depuis toujours. Voler sur des balais, jeter des sorts, combattre les Trolls : Harry Potter se révèle un sorcier vraiment doué. Mais quel mystère entoure donc sa naissance et qui est l\'effroyable V..., le mage dont personne n\'ose prononcer le nom ?', '1997-06-26'),
(2, 'Harry Potter et la chambre des secrets', 'Harry Potter fait une deuxième rentrée fracassante en voiture volante à l\'école des sorciers. Cette deuxième année ne s\'annonce pas de tout repos… surtout depuis qu\'une étrange malédiction s\'est abattue sur les élèves. Entre les cours de potion magique, les matchs de quidditch et les combats de mauvais sorts, Harry trouvera-t-il le temps de percer le mystère de la Chambre des Secrets ? Un livre magique pour sorciers et sorcières confirmés !', '1998-07-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
