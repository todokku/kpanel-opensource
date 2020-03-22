# THIS SQL FILE IS THE ORIGINAL ONE, OTHER VERSION OF THE SQL OF KPANEL IS NOT THE ORIGINAL
# IF YOU USE THIS SQL FILE, YOU CAN BE SURE THERE IS NO MALICIOUS CODE IN IT
# THE PASSWORD OF "admin" IS "admin"


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eradium_ripeuped`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `content`) VALUES
(47159, '<p class=\'text-primary\'>[16/03/2020 Ã  17:39:10]&nbsp;<i class=\'fa fa-plus\'></i>&nbsp;Le nouvel utilisateur MyDDOS Ã  Ã©tÃ© mis en attente</p>'),
(47160, '<p class=\'text-primary\'>[16/03/2020 Ã  23:49:05]&nbsp;<i class=\'fa fa-plus\'></i>&nbsp;Le nouvel utilisateur Eradium Ã  Ã©tÃ© mis en attente</p>'),
(47161, '<p class=\'text-primary\'>[16/03/2020 Ã  23:49:47]&nbsp;<i class=\'fa fa-plus\'></i>&nbsp;Le nouvel utilisateur MyDDOS Ã  Ã©tÃ© validÃ©</p>'),
(47162, '<p class=\'text-danger\'>[18/03/2020 Ã  14:04:19]&nbsp;<i class=\'fa fa-close\'></i>&nbsp;L\'utilisateur  s\'est deconnectÃ©</p>'),
(47163, '<p class=\'text-primary\'>[18/03/2020 Ã  14:04:28]&nbsp;<i class=\'fa fa-plus\'></i>&nbsp;Le nouvel utilisateur admin Ã  Ã©tÃ© mis en attente</p>');

-- --------------------------------------------------------

--
-- Structure de la table `params`
--

CREATE TABLE `params` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `params`
--

INSERT INTO `params` (`name`, `value`) VALUES
('timer_call', '5');

-- --------------------------------------------------------

--
-- Structure de la table `payload`
--

CREATE TABLE `payload` (
  `id` int(11) NOT NULL,
  `payload_name` text NOT NULL,
  `payload_content` longtext NOT NULL,
  `payload_comment` text NOT NULL,
  `payload_owner` text NOT NULL,
  `glol` varchar(3) NOT NULL DEFAULT 'yay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


------------------------------------

--
-- Structure de la table `server_list`
--

CREATE TABLE `server_list` (
  `id` int(11) NOT NULL,
  `server_name` text NOT NULL,
  `server_ip` varchar(25) NOT NULL,
  `server_users` text NOT NULL,
  `payload_call` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  `server_owner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL,
  `role` int(11) DEFAULT '0',
  `pp` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `ban` int(11) NOT NULL DEFAULT '0',
  `fuckkey` varchar(10) NOT NULL,
  `validationtoken` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `role`, `pp`, `active`, `ban`, `fuckkey`, `validationtoken`) VALUES
(38, 'admin', 'a46e68728d92cd2e39613f168767f87a9298cbfd05b164b3c20cdcdc372d66d0:8d92bf026db04a4d882e73fd0d8dddf8fa399a2f', 'admin', 2, 'https://kpanel.cz/imgs/kalysianewpart.png', 1, 0, 'gSLxXPgRnS', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `payload`
--
ALTER TABLE `payload`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `server_list`
--
ALTER TABLE `server_list`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47164;

--
-- AUTO_INCREMENT pour la table `payload`
--
ALTER TABLE `payload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39396;

--
-- AUTO_INCREMENT pour la table `server_list`
--
ALTER TABLE `server_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
