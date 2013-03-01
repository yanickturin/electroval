-- phpMyAdmin SQL Dump
-- version 2.11.9.5
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 12 Septembre 2009 à 10:04
-- Version du serveur: 5.0.45
-- Version de PHP: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `electroval_ch_-_electroval`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonnes_affaires`
--

CREATE TABLE `bonnes_affaires` (
  `id` int(11) NOT NULL auto_increment,
  `titre` mediumtext NOT NULL,
  `description` text NOT NULL,
  `date` tinytext NOT NULL,
  `categorie` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `bonnes_affaires`
--

INSERT INTO `bonnes_affaires` (`id`, `titre`, `description`, `date`, `categorie`) VALUES
(7, 'Po&ecirc;le Fero H9090', '<br />\r\n[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/Poele_Fero_H9090.jpg[/image]<br />\r\n<br />\r\n<br />\r\nPo&ecirc;le multi-usage avec rev&ecirc;tement anti-adh&eacute;rant, couvercle en verre. <br />\r\nSurface utile 40 cm de diam&egrave;tre et 4 cm de profondeur. <br />\r\nR&eacute;glage de la temp&eacute;rature en continu, thermostat.<br />\r\n<br />\r\n[souligne]Prix:[/souligne] [bold]75.- CHF[/bold]<br />\r\n<br />\r\n<br />\r\n<br />\r\n', '14-07-09', 'Petits &eacute;lectrom&eacute;nagers'),
(8, 'Soupi&egrave;re Fero H9310', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/Soupiere_Fero_H9310.jpg[/image]<br />\r\n<br />\r\nSoupi&egrave;re noire.<br />\r\n34 cm de diam&egrave;tre et 35 cm de haut.<br />\r\n<br />\r\n[souligne]Prix:[/souligne] [bold]190.- CHF[/bold]<br />\r\n<br />\r\n<br />\r\n<br />\r\n', '14-07-09', 'Petits &eacute;lectrom&eacute;nagers'),
(25, ' BaByliss Lisseur Pro 230 tr&egrave;s haute temp&eacute;rature', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/cloe_pro230.jpg[/image]<br />\r\n<br />\r\nAdvanced Ceramic TechnologyTM <br />\r\nPlaques rev&ecirc;tement Ceramic-Tourmaline<br />\r\nLargeur : 30 mm – Longueur 110 mm<br />\r\n• Variateur de temp&eacute;rature 130&deg;C – 230&deg;C<br />\r\n• Embout isolant<br />\r\n• Cordon rotatif<br />\r\n• Tapis isolant<br />\r\n<br />\r\nColoris  : noir <br />\r\n<br />\r\n[bold]Action Frs 89.-[/bold]', '17-08-09', 'Petits &eacute;lectrom&eacute;nagers'),
(26, 'Soda-Club Genesis ', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/sc_genesis_black_shiny.jpg[/image]<br />\r\n<br />\r\n1 appareil &agrave; gaz&eacute;ifier Soda-Club Genesis <br />\r\n1 cylindre Alco2Jet60 - en location <br />\r\n1 certificat d\\&#039;utilisateur autoris&eacute; <br />\r\n1 bouteille PET <br />\r\n1 manuel d\\&#039;instruction et la garantie <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/titre_genesis.jpg[/image]', '17-08-09', 'Petits &eacute;lectrom&eacute;nagers'),
(10, 'Machine &agrave; caf&eacute; Gaggia rouge', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/Machine_a_cafe_Gaggia_Amante_Rouge.jpg[/image]<br />\r\n<br />\r\n<br />\r\n[bold]Machine &agrave; capsule Gaggia Amante de couleur rouge[/bold]<br />\r\n<br />\r\n- Ejection automatique de la capsule<br />\r\n- R&eacute;servoir d\\&#039;eau de 1.2 litre<br />\r\n- Tension/puissance 230/240 V /1050 W<br />\r\n- Dimension (HxLxP) 35 x 26.5 x 34 cm<br />\r\n- Poids 5.0 kg<br />\r\n- Pression pompe 15 bars<br />\r\n- Porte capsule m&eacute;tallique<br />\r\n- Collecteur pour 8 &agrave; 10 capsules<br />\r\n- Buse Cappuccino<br />\r\n- Bo&icirc;tier ABS<br />\r\n<br />\r\n[bold]Seulement Frs 520.- au de 629.-[/bold]<br />\r\n<br />\r\n', '14-07-09', 'Petits &eacute;lectrom&eacute;nagers'),
(13, 'Robot m&eacute;nager KitchenAid artisan KSM150 ', '[image]http://www.electroval.ch/media/nouvelle_gamme_kitchenaid_1232982247133.jpg[/image]<br />\r\n<br />\r\nPlus gros, plus puissant, plus chic <br />\r\n <br />\r\nDepuis plus de 80 ans, il donne le ton – le robot de cuisine universel de KitchenAid. Pour cela, il n’a pas seulement un look resplendissant, il est aussi d’une aide pr&eacute;cieuse dans la cuisine. Son design incomparable et sa garantie qualit&eacute; de 5 ans en ont fait le robot m&eacute;nager le plus vendu au monde. Son moteur &agrave; commande directe et son m&eacute;langeur Plan&egrave;te participent &eacute;galement largement &agrave; ce succ&egrave;s: il est ainsi possible de travailler jusqu’&agrave; 1,2 kg de farine avec seulement 300 watt. Si silencieux et puissant qu’aucun autre robot n’a r&eacute;ussi &agrave; l’&eacute;galer. <br />\r\n<br />\r\nAccessories inclus: <br />\r\n- Batteur plat <br />\r\n- Fouet &agrave; fils <br />\r\n- Crochet p&eacute;trisseur <br />\r\n- bol de 4.83 l en acier poli avec poign&eacute;e   ergonomique  <br />\r\n- verseur/protecteur<br />\r\n <br />\r\n [bold]Seulement Frs. 699.-[/bold] au lieu de Frs 899.-<br />\r\n<br />\r\n <br />\r\n<br />\r\n <br />\r\n', '14-07-09', 'Petits &eacute;lectrom&eacute;nagers'),
(15, 'Machine &agrave; caf&eacute; Nespresso Capri automatique', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/8444_0.jpg[/image] <br />\r\n<br />\r\n<br />\r\nLa machine &agrave; Nespresso la plus compacte qui soit sur le march&eacute;. Avec programmation de quantit&eacute; automatique. <br />\r\n <br />\r\nInformations produit<br />\r\nPetite, compact et astucieuse<br />\r\n<br />\r\nProgrammation &eacute;letronique de la quantit&eacute; et arr&ecirc;t automatique<br />\r\n <br />\r\nInsertion ergonomique de la capsule, maniement ais&eacute;<br />\r\n <br />\r\nEjection automatique de la capsule usag&eacute;e dans le bac de r&eacute;ception (pouvant accueillir 14 capsules), pratique et propre <br />\r\n <br />\r\nR&eacute;servoir d\\&#039;eau amovible avec valve anti-goutte<br />\r\nSyst&egrave;me Thermobloc<br />\r\nDimensions (L/H/P): 17 x 25 x 29 cm<br />\r\nPoids: 3 kg<br />\r\nCordon: 1 m<br />\r\nPuissance: 1260 watts<br />\r\nR&eacute;servoir d\\&#039;eau: 1 litr <br />\r\n19 Bar<br />\r\n <br />\r\nPrix de vente public Fr. 299.-  <br />\r\n[bold]Action Fr. 249.-[/bold]<br />\r\n<br />\r\n<br />\r\n', '14-07-09', 'Petits &eacute;lectrom&eacute;nagers'),
(17, 'T&eacute;l&eacute;phone Swissvoice Vintage 20', '[image]http://www.electroval.ch/media/VINTAGE_20_NOIR.jpg[/image]<br />\r\n<br />\r\n[bold]Prix: 49.-[/bold]<br />\r\n<br />\r\nT&eacute;l&eacute;phone analogique - Design r&eacute;tro avec inserts dor&eacute;s - C&acirc;bles combin&eacute; et raccordement tress&eacute;s - Contr&ocirc;le du volume de la sonnerie - Recomposition du dernier num&eacute;ro', '14-07-09', 'T&eacute;l&eacute;com'),
(18, 'Epilateur BRAUN Silk-epil X\\&#039;elle', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/img14760.jpg[/image]<br />\r\n<br />\r\n[bold]Prix: 99.-[/bold]<br />\r\n<br />\r\nEpilateur secteur. 2 vitesses. <br />\r\nSyst&egrave;me X\\&#039;pert : 40 pincettes pour retirer plus de poils en un seul passage. <br />\r\nSyst&egrave;me SoftLift : Les extr&ecirc;mit&eacute;s soulevent les poils couch&eacute;s sur la peau, m&ecirc;me les plus courts (0,5 mm) et les dirigent vers les pincettes. <br />\r\nSmartLight : Eclaire la surface &agrave; &eacute;piler de sorte que m&ecirc;me les poils les plus courts et les plus fins sont visibles. <br />\r\nAccessoire efficacit&eacute; : Pour une &eacute;pilation plus efficace et plus rapide. <br />\r\nSyst&egrave;me anti-douleur 4 directions : Stimulation de la peau avant et apr&egrave;s le retrait du poil avec une fr&eacute;quence de vibrations accrue (135 - 170 Hz) des rouleaux de massage, pour att&eacute;nuer la sensation de l\\&#039;&eacute;pilation. <br />\r\nSyst&egrave;me Easy Start : T&ecirc;te d\\&#039;&eacute;pilation sp&eacute;ciale d&eacute;butante.<br />\r\nGant applicateur de froid. <br />\r\nTrousse de rangement. Finition : vert.', '17-06-09', 'Petits &eacute;lectrom&eacute;nagers'),
(24, 'V-Zug Combair-Steam S ', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/CS_S_60_g_220px.jpg[/image]<br />\r\n<br />\r\n- Efficacit&eacute; &eacute;nerg&eacute;tique [bold]A[/bold]<br />\r\n– Electronic Steam System (ESS)<br />\r\n  avec g&eacute;n&eacute;rateur de vapeur externe<br />\r\n– Air chaud + vapeur<br />\r\n– Sonde d’atmosph&egrave;re<br />\r\n– Indicateur automatique de d&eacute;tartrage<br />\r\n– Eclairage: 2 lampes &agrave; incandescence<br />\r\n– Enceinte de cuisson en DualEmail<br />\r\n– 1 plaque &agrave; g&acirc;teaux DualEmail<br />\r\n– 1 plaque en acier inox<br />\r\n– 1 bac de cuisson perfor&eacute;<br />\r\n– 1 grille<br />\r\n– Livre de recettes<br />\r\n<br />\r\n[souligne]Commande &eacute;lectronique[/souligne]<br />\r\n–Horloge et minuterie<br />\r\n– Programmateur dur&eacute;e et fin de cuisson<br />\r\n– Temp&eacute;rature conseill&eacute;e<br />\r\n– R&eacute;gulation de la temp&eacute;rature &agrave; coeur<br />\r\n– R&eacute;gulateur &eacute;lectronique<br />\r\n  de la temp&eacute;rature du four<br />\r\n– Pr&eacute;chauffage rapide<br />\r\n– Proc&eacute;d&eacute; &eacute;conomique automatique<br />\r\n  stand-by (0 watt selon norme<br />\r\n  SN/EN 62301)<br />\r\n– OEil ZUG<br />\r\n<br />\r\n(appareil d\\&#039;exposition)<br />\r\n<br />\r\n[bold]Seulement Frs 3700.- livraison instalation et &eacute;vacuation de l\\&#039;ancien appareil inclu[/bold]', '15-07-09', 'Appareils incorpor&eacute;s'),
(23, 'T&eacute;l&eacute;phone Swissvoice Avena 247 duo', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/avena_247_big.jpg[/image]<br />\r\n[bold]<br />\r\nPrix de vente au lieu de CHF 218.00 seulment CHF 149.00[/bold]<br />\r\n<br />\r\n• Afficheur graphique &agrave; 5 lignes r&eacute;tro&eacute;clair&eacute;<br />\r\n• Pr&eacute;sentation du num&eacute;ro et nom de<br />\r\nl‘appelant (CLIP)<br />\r\n• SMS jusqu‘&agrave; 612 caract&egrave;res (avec<br />\r\nmod&egrave;les)<br />\r\n• R&eacute;pertoire pour 150 entr&eacute;es<br />\r\n• Lecteur/enregistreur de cartes SIM<br />\r\n• 10 m&eacute;lodies de sonnerie polyphoniques<br />\r\n• Autonomie en veille de pr&egrave;s de 170 h<br />\r\n• Autonomie en conversation de pr&egrave;s de 17 h<br />\r\n', '14-07-09', 'T&eacute;l&eacute;com'),
(21, 'Lave-linge Bauknecht WA 9597 blanc STEAM', '[image]http://www.electroval.ch/media/bonnes_affaires/Electromenager/Lave_Linge_WA9597.jpg[/image]<br />\r\n<br />\r\n• Capacit&eacute; jusqu &agrave; 7 kg<br />\r\n• Classe d\\&#039;efficacit&eacute; de lavage A<br />\r\n• Classe d\\&#039;efficacit&eacute; &eacute;nerg&eacute;tique A+<br />\r\n• Classe d\\&#039;efficacit&eacute; d\\&#039;essorage B<br />\r\n• R&eacute;gimes d\\&#039;essorage 1200, 1000, 800, 400 UpM<br />\r\nEquipement<br />\r\n• DYNAMIC INTELLIGENCE pour des gains d\\&#039;eau, d\\&#039;&eacute;nergie et de temps<br />\r\n• Display LCD pour tous programmes, cycles suppl&eacute;mentaires et horaire<br />\r\n• Programmes principaux: cuisson, couleurs, lingerie<br />\r\nfine, mixte, textiles modernes, \\&quot;main\\&quot;, lainages,<br />\r\nprogramme court 30 min, SuperEco<br />\r\n• Technologie STEAM: lavage, intensif, rafra&icirc;chissement, auto-nettoyage<br />\r\n• Programmes suppl&eacute;mentaires: pr&eacute;lavage, rin&ccedil;age-stop,<br />\r\nrin&ccedil;age intensif, &eacute;co<br />\r\n• Fonctions compl&eacute;mentaires: r&eacute;duction du r&eacute;gime d\\&#039;essorage,<br />\r\nchoix des temp&eacute;ratures, pr&eacute;programmation jusqu\\&#039;&agrave; 23<br />\r\nh<br />\r\n• Compte &agrave; rebours affich&eacute;<br />\r\n• Affichage porte libre<br />\r\n• S&eacute;curit&eacute;-enfants<br />\r\n<br />\r\n[bold]En promotion &agrave; Frs 1990.- livraison et &eacute;vacuation de l\\&#039;encien appareil inclu[/bold]', '14-07-09', 'Grands &eacute;lectrom&eacute;nagers');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL auto_increment,
  `nom` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(12, 'Grands &eacute;lectrom&eacute;nagers'),
(11, 'Petits &eacute;lectrom&eacute;nagers'),
(13, 'Appareils incorpor&eacute;s'),
(14, 'T&eacute;l&eacute;com'),
(15, 'Appareils d occasion');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL auto_increment,
  `titre` mediumtext NOT NULL,
  `description` text NOT NULL,
  `date` tinytext NOT NULL,
  `dossier` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `galerie`
--

INSERT INTO `galerie` (`id`, `titre`, `description`, `date`, `dossier`) VALUES
(3, '25&egrave;me Anniversaire Electroval SA', 'Journ&eacute;e du 25&egrave;me anniversaire d\\&#039;Electroval en tant que Soci&eacute;t&eacute; Anonyme le 30 Mai 2008 avec les clients', '06-05-09', 'media/galerie_photos/25eme_anniversaire/'),
(4, 'F&ecirc;te familiale du 25&egrave;me anniversaire', 'F&ecirc;te familiale &agrave; l\\&#039;occasion du 25&egrave;me anniversaire d\\&#039;Electroval SA le samedi 5 Juillet 2008 &agrave; la cantine des planches', '06-05-09', 'media/galerie_photos/fete_familiale/'),
(7, 'Tournoi de Foot Inter Entreprise', 'Tournoi interentreprise <br />\r\n<br />\r\nFini 4&egrave;me sur 16', '23-06-09', 'media/galerie_photos/Puisoir/');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `titre` mediumtext NOT NULL,
  `description` text NOT NULL,
  `date` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `news`
--


-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL auto_increment,
  `titre` mediumtext NOT NULL,
  `description` text NOT NULL,
  `date` tinytext NOT NULL,
  `annee` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `reference`
--

INSERT INTO `reference` (`id`, `titre`, `description`, `date`, `annee`) VALUES
(11, 'Colombière, Nyon', '[bold]Maison de maître, Nyon [/bold]<br />\r\n<br />\r\nTransformation maison de maître<br />\r\n<br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2008/Colombiere_Nyon/Photo_015.jpg[/image] [image]http://www.electroval.ch/media/2008/Colombiere_Nyon/Photo_017.jpg[/image] [image]http://www.electroval.ch/media/2008/Colombiere_Nyon/Photo_019.jpg[/image]', '06-01-09', '2008'),
(12, 'Nestlé PTC, Orbe', '[bold]Nestlé PTC, Orbe[/bold]<br />\r\n<br />\r\nAlimentation et modification des câblages pour un nouveau groupe électrogène <br />\r\n', '17-11-08', '2008'),
(10, 'Auberge Communale - Bretonnières', '[bold]Auberge Communale - Bretonnières[/bold]<br />\r\n<br />\r\nRénovation d\\&#039;un café – Restaurant, salle de réception et 1 appartement<br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2008/Auberge_Communale_Bretonnieres/IMG_0101.JPG[/image] [image]http://www.electroval.ch/media/2008/Auberge_Communale_Bretonnieres/IMG_0109.JPG[/image] [image]http://www.electroval.ch/media/2008/Auberge_Communale_Bretonnieres/IMG_0105.JPG[/image]', '17-11-08', '2008'),
(13, 'Emma Yverdon', '[bold]Emma, Yverdon-les-Bains[/bold] <br />\r\n<br />\r\nConstruction de deux immeubles locatifs de 12 appartements chacun <br />\r\n<br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2007/Emma_Yverdon/Photo_023.jpg[/image] [image]http://www.electroval.ch/media/2007/Emma_Yverdon/Photo_024.jpg[/image] [image]http://www.electroval.ch/media/2007/Emma_Yverdon/Photo_021.jpg[/image]', '17-11-08', '2007'),
(14, 'Manoir, Valeyres-sous-Rances', 'Rénovation d\\&#039;un ensemble de 11 appartements <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2008/Manoir/Photo_120.jpg[/image] [image]http://www.electroval.ch/media/2008/Manoir/Photo_123.jpg[/image] [image]http://www.electroval.ch/media/2008/Manoir/Photo_122.jpg[/image]', '10-09-09', '2008'),
(15, 'Krioc, Orbe', 'Rénovation d\\&#039;un bar-restaurant et de trois appartements <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2007/Krioc/Photo_015.jpg[/image] [image]http://www.electroval.ch/media/2007/Krioc/Photo_011.jpg[/image] [image]http://www.electroval.ch/media/2007/Krioc/carioca.jpg[/image]', '10-09-09', '2007'),
(16, 'Nestlé PTC ORBE', 'Alimentation et modification des câblages pour un nouveau groupée électrogène ', '18-02-09', '2007'),
(17, 'Grunderco, Mathod', 'Transformation d’une halle en magasin libre service vente matériel agricole ', '18-02-09', '2007'),
(18, 'Hilcona, Orbe', 'Transformation de locaux <br />\r\n<br />\r\nTransformation complète du câblage et du tableau de la machine à laver industrielle <br />\r\n', '18-02-09', '2007'),
(19, 'Nagravision, Cheseaux', 'Installation d’un nouveau câblage de vanne sur le site ', '18-02-09', '2007'),
(20, 'Sicpa, Chavornay', 'Alimentation d’une nouvelle distribution 630A dans les locaux ', '18-02-09', '2007'),
(21, 'Crêt de la Forge, Montcherand ', 'Création d’appartements', '18-02-09', '2006'),
(22, 'Les Grebeires, Mathod', 'Construction d\\&#039;un immeuble locatif de 6 appartements  ', '18-02-09', '2006'),
(23, 'Au Coin, Agiez ', 'Transformation d\\&#039;un rural en une PPE de 3 appartements   ', '18-02-09', '2006'),
(24, 'Lougilloux, Chavornay ', 'Construction de 2 immeubles locatif de 11 appartements  <br />\r\n<br />\r\n', '18-02-09', '2006'),
(25, 'Nestlé, Orbe ', 'Echange de l’ensemble des tableaux dans le bâtiment A', '18-02-09', '2006'),
(26, 'Château, Montcherand ', 'Rénovation château', '18-02-09', '2005'),
(27, 'Fondation Grain de Blé', 'Installation cuisine industrielle dans le centre ', '18-02-09', '2005'),
(28, 'Nagravision, Cheseaux', 'Extension des bureaux dans les anciens garages', '18-02-09', '2005'),
(29, 'Venoge Parc ', 'Transformation pour centre de tri postal', '18-02-09', '2005'),
(30, 'Bâtiment Vallorbe ', 'Rénovation d’appartements ', '18-02-09', '2005'),
(31, 'Goumoens-la-Ville', 'Construction immeuble neuf de 6 appartements', '18-02-09', '2004'),
(32, 'Boucherie, Orbe', 'Construction d\\&#039;une boucherie avec laboratoire et magasin <br />\r\n', '18-02-09', '2004'),
(33, 'Chantemerle, Orbe ', 'Transformation câblage informatique', '18-02-09', '2004'),
(34, 'Hilcona, Orbe', 'Extension usine', '18-02-09', '2004'),
(35, 'Caserne, Chamblon', 'Câblage complet informatique', '18-02-09', '2004'),
(36, 'Transformation, Penthalaz', 'Transformation immeuble<br />\r\n', '18-02-09', '2004'),
(37, 'Venoge Parc, Penthalaz', 'Installation système de comptage  à distance ', '18-02-09', '2003'),
(38, 'Nestlé, Orbe', 'Construction d\\&#039;une usine production à café <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2003/DSC_0017.jpg[/image]', '18-02-09', '2003'),
(39, 'Nestlé, Orbe', 'Installation Egron 7000 <br />\r\n<br />\r\nEchange armoire informatique <br />\r\n<br />\r\nInstallation système contrôle accès sur l’ensemble des sites Nestlé<br />\r\n', '18-02-09', '2003'),
(40, 'Grand-Rue, Orbe', 'Transformation immeuble', '18-02-09', '2003'),
(41, 'Fondation la Rochette, Orbe ', 'Construction immeuble résidence surveillée ', '18-02-09', '2003'),
(42, 'Grand-Pont, Orbe', 'Réfection de l’éclairage ', '18-02-09', '2003'),
(43, 'Til Logistique, Orbe ', 'Construction d\\&#039;une hall bureau dépôt ', '18-02-09', '2002'),
(44, 'Nestlé, Orbe', 'Installation d’un système dect dans l’usine<br />\r\n<br />\r\nCréation salle de cours CINO', '18-02-09', '2002'),
(45, 'NCPP, Orbe', 'Construction d\\&#039;une usine laboratoire et recherche ', '18-02-09', '2002'),
(46, 'Metalor, Cossonay', 'Extension courant fort et faible ', '18-02-09', '2002'),
(47, 'Ancien Hôtel la Couronne, Orbe', 'Transformation immeuble', '18-02-09', '2002'),
(48, 'Hilcona, Orbe', 'Extension de l’usine', '18-02-09', '2002'),
(49, 'Douanes, Vallorbe ', 'Pavillon RPLP<br />\r\n', '18-02-09', '2002'),
(50, 'CPNV, Yverdon-les-Bains ', 'Installation salle de classe et bibliothèque ', '18-02-09', '2002'),
(51, 'Maison de Maître, Grandson', 'Rénovation maison de Maître ', '18-02-09', '2002'),
(52, 'Camping, Orbe', 'Rénovation de l’ensemble sanitaire', '18-02-09', '2002'),
(53, 'Grande Salle, Valeyres', 'Transformation de la salle polyvalente ', '18-02-09', '1997'),
(54, 'Grande Salle, Sergey', 'Transformation et création d\\&#039;une cuisine ménagère, d\\&#039;une salle de classe et d\\&#039;un abri PC  ', '18-02-09', '1994'),
(55, 'Vilas Jumelles à Villars Burquin ', 'Constuction de 4 villas jumelles à Villars Burquin <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2009/Photo_200.jpg[/image]', '15-05-09', '2009'),
(56, 'Immeubles à Bonvillars', 'Construction de trois immeubles PPE à Bonvillars<br />\r\n<br />\r\n<br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2009/Photo_197.jpg[/image]', '15-05-09', '2009'),
(57, 'Immeuble Yverdon-les-Bains', 'Construction d\\&#039;un immeuble de 18 appartements <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2009/Photo_195.jpg[/image]', '15-05-09', '2009'),
(58, 'Immeubles Yverdon-les-Bains \\&quot;Les Iles\\&quot;', 'Construction de 4 immeubles locatif quartier les Iles à Yverdon-les-Bains <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2009/Photo_192.jpg[/image]', '15-05-09', '2009'),
(59, 'Le Shop, Chavornay ', 'Création d\\&#039;une station essence avec shop <br />\r\n<br />\r\n[image]http://www.electroval.ch/media/2009/Shop/Photo_230.jpg[/image]  [image]http://www.electroval.ch/media/2009/Shop/Photo_232.jpg[/image]', '10-09-09', '2009');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `login` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `id_session` text NOT NULL,
  `autorisation` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `id_session`, `autorisation`) VALUES
(1, 'admin', 'f355304410319e54cdcfdc86c47a0ee3', 'ncbf8lsbr9d05o799qikomm8c4', 'administrator'),
(2, 'admin2', '0eb02d5e3ce1dc8b2e9e78812091876f', 'gvo9jvcaimuufigncvp5cmakd6', 'administrator'),
(3, 'employe', '2a7a0c5189c458d974151ab42b2c873a', '427jp3lvu83sp2n9631ips0rh6', 'user');
