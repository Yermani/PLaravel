-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 nov. 2021 à 13:20
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel8`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alert_table` varchar(50) COLLATE utf8_bin NOT NULL,
  `element_id` int(11) NOT NULL,
  `val_encours` varchar(256) COLLATE utf8_bin NOT NULL,
  `categorie` varchar(100) COLLATE utf8_bin NOT NULL,
  `alert_route` varchar(256) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(256) COLLATE utf8_bin NOT NULL,
  `etat` varchar(10) COLLATE utf8_bin DEFAULT 'nonlu',
  `typealert` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Bureautique'),
(2, 'Produit informatique'),
(3, 'cosmetique');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_bin NOT NULL,
  `connection` text COLLATE utf8_bin NOT NULL,
  `queue` text COLLATE utf8_bin NOT NULL,
  `payload` longtext COLLATE utf8_bin NOT NULL,
  `exception` longtext COLLATE utf8_bin NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_bin NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_04_091957_laratrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `lien` varchar(256) NOT NULL,
  `visible` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `date`, `note`, `lien`, `visible`) VALUES
(1, '2021-10-30', 'dsfh sqdlfkjqshdfl qsdkjfhslq fkjqsh fkjqsdf', '1635501194.JPG', 'oui'),
(3, '2021-11-12', 'jkhkljhkj  fk lzkfjhz efkjezlfekjhzekjf', '1636103693.JPG', 'oui'),
(4, '2020-03-05', 'hgkjhlkj', '1636106307.png', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('elkefi@gmail.com', '$2y$10$sSZLNDypsMSMygqmocGBCO3z7TySHcD4yv4/4voji3zkgKscWapIG', '2021-05-06 12:52:23');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `display_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `categorie_id`) VALUES
(3, 'stylooo', 'bonn', 130, 1),
(4, 'tel', 'jhze fkezfez lkjhfkez fkjzehfze fzelk jhfk zelkfjhze lkzj zef', 120320, 3),
(5, 'prise', 'kjeh dzekjfh zefkjzeh lfkzjef', 10, NULL),
(6, 'datshow', 'jkel dkzed lezkjhld ezkjzdhe kzej d', 1200, NULL),
(7, 'oo', 'lkjl kjklkhkj kjkj', 125, NULL),
(8, 'test', 'test', 10, 1),
(9, 'cos test', 'lkhjezlkj dlkejkjzef', 150, 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `display_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Adminstrateur', 'Adminstrateur', '2021-05-05 12:53:04', '2021-07-13 19:47:11'),
(2, 'user', 'Utilisateur avec accès limité', 'Utilisateur avec accès limité', '2021-05-05 12:53:04', '2021-07-13 19:53:53'),
(16, 'client', 'Client', 'client', '2021-10-29 08:41:17', '2021-10-29 08:41:17');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\\App\\Models\\User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, '\\App\\Models\\User'),
(16, 376, '\\App\\Models\\User'),
(2, 376, '\\App\\Models\\User');

-- --------------------------------------------------------

--
-- Structure de la table `securites`
--

CREATE TABLE `securites` (
  `id` bigint(20) NOT NULL,
  `alerte` text NOT NULL,
  `nomtable` varchar(50) DEFAULT NULL,
  `nomelement` varchar(50) DEFAULT NULL,
  `element` varchar(256) NOT NULL,
  `ancien` varchar(256) DEFAULT NULL,
  `nouveau` varchar(256) DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `etat` varchar(20) DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `securites`
--

INSERT INTO `securites` (`id`, `alerte`, `nomtable`, `nomelement`, `element`, `ancien`, `nouveau`, `date`, `user_id`, `niveau`, `type`, `commentaire`, `etat`) VALUES
(1, ' ', 'users', 'Name', 'ali()', 'ali', 'salah', '2021-10-29 10:06:51', 1, 'moyen', 'Edition', NULL, 'en attente'),
(2, 'URL : http://localhost/Laravel8_vierge_auth_versionPourCommencerUnProjetAvecAuthEtRole/public/admin/users', ' ', ' ', ' ', ' ', ' ', '2021-10-29 10:07:42', 376, 'haut', 'Acces non autorisé', NULL, 'en attente'),
(3, ' ', 'users', 'Name', 'salah()', 'salah', 'salah_ali', '2021-11-10 09:25:18', 1, 'moyen', 'Edition', NULL, 'en attente'),
(4, 'URL : http://localhost/laravel8/public/admin/users', ' ', ' ', ' ', ' ', ' ', '2021-11-10 09:26:27', 376, 'haut', 'Acces non autorisé', '2021-11-10 09:28:08 :<b> Administrator </b>: verifiée<br/>', 'traite');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `naissance` date DEFAULT NULL,
  `tel` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `cin` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `passport` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `cnss` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `banque` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `rib` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `actif` varchar(10) COLLATE utf8_bin NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `naissance`, `tel`, `cin`, `passport`, `cnss`, `banque`, `rib`, `actif`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@sarost.tn', '1980-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 'oui', NULL, '$2y$10$/./DSkYvCHASdCd7.S2vQeidQDWDX2K20VoxpxiJYsr1j6CP5CrEq', NULL, '2021-05-05 12:55:00', '2021-10-29 09:13:52'),
(376, 'salah_ali', 'client1@projet.tn', '2021-12-31', '5465', '4654654', '46', '465465', '4646', '464654', 'oui', NULL, '$2y$10$r6yLyReM.jcJ7EGJqeNpfuKnqAcTNVs5DjYS4XxWPNTkWqzyp830q', NULL, '2021-10-29 08:50:34', '2021-11-10 08:25:18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `securites`
--
ALTER TABLE `securites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `securites`
--
ALTER TABLE `securites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
