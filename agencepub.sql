-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 juin 2020 à 01:39
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agencepub`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(56, 'khaoula comment', 3, 1, 'App\\Publication', '2020-06-03 14:19:56', '2020-06-03 14:19:56'),
(58, 'merci', 3, 3, 'App\\Publication', '2020-06-07 19:06:17', '2020-06-07 19:06:17'),
(60, 'de rien khaoula', 3, 58, 'App\\Comment', '2020-06-07 19:12:08', '2020-06-07 19:12:08');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `pub_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `titre`, `body`, `debut`, `fin`, `pub_id`, `created_at`, `updated_at`) VALUES
(13, 'premier cv khaoula kanboua', 'khaoula', '2020-06-12', '2020-06-18', 1, '2020-06-04 18:45:46', '2020-06-04 18:48:23'),
(16, 'premier cv khaoula kanboua', 'khaoula', '2020-06-12', '2020-06-18', 1, '2020-06-04 18:48:24', '2020-06-04 18:48:24'),
(17, 'premierkhaoual', 'dfghjklmù', '2020-06-14', '2020-06-23', 4, '2020-06-04 19:08:33', '2020-06-04 19:10:35'),
(18, 'premier', 'dfghjklmù', '2020-06-14', '2020-06-23', 4, '2020-06-04 19:08:39', '2020-06-04 19:08:39'),
(19, 'premiercv', 'dfghjklmù', '2020-06-14', '2020-06-23', 4, '2020-06-04 19:10:22', '2020-06-04 19:10:22'),
(20, 'premierkhaoual', 'dfghjklmù', '2020-06-14', '2020-06-23', 4, '2020-06-04 19:10:35', '2020-06-04 19:10:35'),
(25, 'ayman este', 'dcfgvbhjnk,l;m:!', '2020-06-14', '2020-06-20', 8, '2020-06-04 19:25:13', '2020-06-04 19:25:13'),
(26, 'commande 2', 'il reste une semaine pour la fin de votre commande dans la date suivant', '2020-06-18', '2020-06-25', 14, '2020-06-07 18:27:45', '2020-06-07 18:27:45');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_05_03_153243_create_pub_table', 2),
(9, '2020_05_11_044849_create_experiences_table', 7),
(10, '2020_05_11_162051_add_column_user_id', 8),
(16, '2020_05_15_194610_create_social_providers_table', 14),
(17, '2020_05_16_003949_add_column_google_id', 15),
(18, '2020_05_16_015859_add_column_provider', 16),
(19, '2020_05_16_020011_add_column_provider_id', 17),
(22, '2020_05_29_040717_create_likes_table', 20),
(23, '2020_05_29_041555_create_likes_table', 21),
(24, '2020_06_01_131902_create_likes_table', 22),
(25, '2020_06_01_135630_create_likes_table', 23),
(27, '2014_10_12_000000_create_users_table', 24),
(28, '2014_10_12_100000_create_password_resets_table', 24),
(29, '2019_08_19_000000_create_failed_jobs_table', 24),
(30, '2020_05_03_164432_create_pubs_table', 24),
(31, '2020_05_04_020156_add_column_deletedat_pubs', 24),
(32, '2020_05_06_015901_add_column_photo_pubs', 24),
(33, '2020_05_07_174302_add_column_isadmin_users', 24),
(34, '2020_05_15_063124_create_experiences_table', 24),
(35, '2020_05_15_063341_add_column_user_id', 24),
(36, '2020_05_15_065205_create_users_activations_table', 24),
(37, '2020_05_15_065316_add_column_is_activated', 24),
(38, '2020_05_16_023313_add_column_google_id', 25),
(39, '2020_05_21_184533_create_publications_table', 25),
(40, '2020_06_01_144521_create_social_accounts_table', 25),
(41, '2020_06_02_234613_create_comments_table', 26),
(42, '2020_06_03_021310_create_notifications_table', 27),
(43, '2020_06_03_031747_add_column_publication_id', 28),
(44, '2020_06_05_155753_add_column_photo_publications', 29),
(45, '2020_06_07_023947_add_column_tel', 30);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khaoulakanboua@gmail.com', '$2y$10$89.jsmrcaEgK8f1YqWMxcOeKN0kINLabWyUcNiJ2b4FcLk21DsGVG', '2020-06-04 00:38:55');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `user_id`, `titre`, `explication`, `photo`, `created_at`, `updated_at`) VALUES
(3, 3, 'khaoula kanboua', 'khaoula kanboua pub', 'image/9d0JuwgxlFrJxT9mPlwkpnDYRgboo2fj4E2LFfyB.jpeg', '2020-06-05 16:07:44', '2020-06-07 19:01:52');

-- --------------------------------------------------------

--
-- Structure de la table `pubs`
--

CREATE TABLE `pubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pubs`
--

INSERT INTO `pubs` (`id`, `titre`, `presentation`, `tel`, `photo`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'khoula', 'khaoula zwina oghzala', NULL, 'image/ofTsl506ukemPWGA1KjzXUliIBHsK4cDUCJRwk71.jpeg', '2020-06-01 15:34:50', '2020-06-04 19:00:22', '2020-06-04 19:00:22', 3),
(2, 'khaoula kanboua pub', 'khaoula kanboua pub', NULL, 'image/NlLa4SsZpH22JCFpHeMJpX1votXL6bmhbBbtHPvi.png', '2020-06-04 15:36:27', '2020-06-04 19:02:41', '2020-06-04 19:02:41', 3),
(3, 'premier cv', 'khaoula khaoual', NULL, NULL, '2020-06-04 19:03:06', '2020-06-04 19:03:11', '2020-06-04 19:03:11', 3),
(4, 'khaoula kanboua pub', 'khaoual pib hdjc', NULL, 'image/Aioi9ecnSCP4iEb1bpO4k3jChZdmJKKcPxErRHgV.jpeg', '2020-06-04 19:03:30', '2020-06-04 19:16:05', '2020-06-04 19:16:05', 3),
(5, 'fcgvbhjn,k', ';dfghjklmù', NULL, 'image/lXjcGoKeSCyjMc6GcWyfbsHI1j0zJ9cJ9LhMGQJN.jpeg', '2020-06-04 19:16:16', '2020-06-04 19:18:29', '2020-06-04 19:18:29', 3),
(6, 'dghjkl', 'tghjklmùjnk', NULL, NULL, '2020-06-04 19:18:46', '2020-06-04 19:19:37', '2020-06-04 19:19:37', 3),
(7, 'dfgbhjn,k;', 'fghjnk,l;m:', NULL, 'image/dbmzv2IWpc67nmt4bzn4BXp39OOK4pR0P6zjsNDk.jpeg', '2020-06-04 19:19:49', '2020-06-04 19:20:27', '2020-06-04 19:20:27', 3),
(8, 'hjklmhjn,kmhjk;lm', 'sdfghjklmmlkdfghj', NULL, 'image/RCfyid11g1SfuBgCl7yxk2SVUwYxl9dooqIzVWBz.png', '2020-06-04 19:20:45', '2020-06-06 00:13:56', '2020-06-06 00:13:56', 3),
(9, 'khaoula kanboua pub', 'hello publication', NULL, 'image/qY5GUtGsnmUkmXQZ4xGVkEEV41sMFLf1pAQ4ASK9.jpeg', '2020-06-05 16:09:26', '2020-06-05 16:09:26', NULL, 1),
(10, 'premier cv', 'seghbjnk,l', NULL, 'image/hkjJnQELqyuRdfRquYcI4iPdOiZZ4slhGt5UZX47.png', '2020-06-07 02:55:17', '2020-06-07 02:55:17', NULL, 1),
(11, 'khadija commande', 'kjhgfsdfvbn^plkjnb', NULL, 'image/m2jhpBuVILYdQpJn4Q4JbrY7O2o1rjwvDEbesEXq.png', '2020-06-07 02:58:04', '2020-06-07 02:58:04', NULL, 1),
(12, 'hajar', 'hajar bahra', NULL, 'image/1S17dAlJvUvTCxxeFiFmnj6yjj7qpK9J2SMLDgFx.jpeg', '2020-06-07 03:02:08', '2020-06-07 03:05:20', '2020-06-07 03:05:20', 3),
(13, 'khaoula kanboua pub', 'khaoula kanboua pub', '0697677911', 'image/XqYK2viFFfSOjTX2qxftReXOAi6EVqAIZKwouVyc.jpeg', '2020-06-07 03:05:53', '2020-06-07 03:06:45', NULL, 3),
(14, 'commande 2', 'cette commande doit contient les caractéristiques suivant', '0697677900', 'image/wUkKUz92IgJYmKdkFFR8p6YuGNhJIzO9KFvSUnS8.png', '2020-06-07 18:11:47', '2020-06-07 18:22:20', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `social_accounts`
--

INSERT INTO `social_accounts` (`user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(5, '2568585470074178', 'facebook', '2020-06-02 16:44:20', '2020-06-02 16:44:20'),
(3, '115255622705446308617', 'google', '2020-06-02 16:54:22', '2020-06-02 16:54:22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `publication_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `is_activated`, `publication_id`) VALUES
(1, 'asmaabrach', 'asmaabrach@gmail.com', NULL, '$2y$10$BXD6n5twLWtGXuRuZywlg.JI1gyfH5Md6P2pxWprOZ9Vf.dgXaiEK', NULL, '2020-06-01 15:29:22', '2020-06-01 15:30:40', 0, 1, NULL),
(2, 'baba', 'baba@gmail.com', NULL, '$2y$10$wV90j.RthGrRq0WsMcf2ruzvtxYNCcfOwnFCdbbETU3oj0dxYJWTm', NULL, '2020-06-01 15:31:48', '2020-06-01 15:38:38', 0, 1, NULL),
(3, 'khoula', 'khaoulakanboua@gmail.com', NULL, '$2y$10$OZ8/tKuRU8pg0W331mLqTurZRkrNlZu./Y8/3buA3yG8b133rxtsi', NULL, '2020-06-01 15:32:53', '2020-06-04 13:52:48', 1, 1, NULL),
(5, 'Khaoula Kan', NULL, NULL, '', NULL, '2020-06-02 16:44:20', '2020-06-02 16:44:20', 0, 1, NULL),
(6, 'FatimaEn', 'fatima@gmail.com', NULL, '$2y$10$.2zwbCD.pKihVZQRuRSQT.TvgIJjstn8MRCXpgwV/8iZ.oCxu.YwK', NULL, '2020-06-02 16:44:58', '2020-06-02 16:45:17', 0, 1, NULL),
(7, 'oussama', 'oussamakan@gmail.com', NULL, '$2y$10$FoGrbV0AI.ptzO7j/4100u5qmB2yWVZMY4SNJW0wMqEoZd1F4Un56', NULL, '2020-06-02 18:59:06', '2020-06-02 18:59:35', 0, 1, NULL),
(9, 'omar', 'omarkan@gmail.com', NULL, '$2y$10$fW9Bx8r4gHQa1sq/2K9kH.PtuQKdyC5q6CknYCACvbhGQsdV5JgJm', NULL, '2020-06-02 19:25:00', '2020-06-02 19:25:00', 0, 0, NULL),
(10, 'ayman', 'aymankan@gmail.com', NULL, '$2y$10$FpK/UtZuGhJz9rfQWnqdjeVTHP86JeyOsVR4xjjAk2GuLjG15B6oa', NULL, '2020-06-03 23:19:44', '2020-06-03 23:23:26', 0, 1, NULL),
(11, 'aycha', 'aychakan@gmail.com', NULL, '$2y$10$DfApWH5lF16MVO2MW2A0bOY8xpYWlPakuGyZhvza5eoJljx0RuXR.', NULL, '2020-06-03 23:41:42', '2020-06-03 23:42:38', 0, 1, NULL),
(12, 'hajar', 'hajarkan@gmail.com', NULL, '$2y$10$vibPSE6LEdzA93nvMEwWuO.6gOlY9YvVtr.e9/cFJC6O.AXnSx26y', NULL, '2020-06-03 23:51:12', '2020-06-03 23:51:12', 0, 0, NULL),
(13, 'khadija', 'khadijakan@gmail.com', NULL, '$2y$10$l4iRy0tKE/zP1GboUbNq7.SruEemx2yDTEVTEqDNTtWc9f68Sk12a', NULL, '2020-06-05 17:50:25', '2020-06-05 17:52:55', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_activations`
--

CREATE TABLE `users_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_activations`
--

INSERT INTO `users_activations` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(6, 9, 'CRtsYL2lFbc5VwS5arpXNKstkGLybi', NULL, NULL),
(9, 12, 'unK4PuLUYUBnALcIQffx2M7VtuDjFN', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_pub_id_foreign` (`pub_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_user_id_foreign` (`user_id`);

--
-- Index pour la table `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pubs_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `users_activations`
--
ALTER TABLE `users_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_activations_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pubs`
--
ALTER TABLE `pubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users_activations`
--
ALTER TABLE `users_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_pub_id_foreign` FOREIGN KEY (`pub_id`) REFERENCES `pubs` (`id`);

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `pubs`
--
ALTER TABLE `pubs`
  ADD CONSTRAINT `pubs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users_activations`
--
ALTER TABLE `users_activations`
  ADD CONSTRAINT `users_activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
