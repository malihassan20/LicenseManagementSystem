-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 08:10 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_table_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_field_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_field_old_value` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_table_pk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_id` int(10) UNSIGNED NOT NULL,
  `license_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_03_16_101226_create_users_table', 1),
(2, '2017_03_16_101910_create_user_sessions_table', 1),
(11, '2017_03_16_101955_create_activity_logs_table', 2),
(4, '2017_03_16_102100_create_clients_table', 1),
(5, '2017_03_16_102149_create_projects_table', 1),
(6, '2017_03_16_102225_create_licenses_table', 1),
(7, '2017_03_30_101640_create_types_table', 1),
(8, '2017_03_30_101751_create_project_types_table', 1),
(9, '2017_03_30_101832_create_technologies_table', 1),
(10, '2017_03_30_101911_create_project_technologies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Not Available',
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_technologies`
--

CREATE TABLE `project_technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_id` int(10) UNSIGNED NOT NULL,
  `tech_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `technology_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technology_name`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '2017-04-04 02:14:30', '2017-04-04 02:14:30'),
(2, 'CSS', '2017-04-04 02:14:36', '2017-04-04 02:14:36'),
(3, 'JavaScript', '2017-04-04 02:14:47', '2017-04-04 02:14:47'),
(4, 'JQuery', '2017-04-04 02:14:55', '2017-04-04 02:14:55'),
(5, 'PHP', '2017-04-04 02:15:03', '2017-04-04 02:15:03'),
(6, 'Laravel', '2017-04-04 02:15:14', '2017-04-04 02:15:14'),
(7, 'Ajax', '2017-04-04 02:15:24', '2017-04-04 02:15:24'),
(8, 'Codeigniter', '2017-04-04 02:15:37', '2017-04-04 02:15:37'),
(9, 'C', '2017-04-04 02:15:44', '2017-04-04 02:15:44'),
(10, 'C#', '2017-04-04 02:15:52', '2017-04-04 02:15:52'),
(11, 'C++', '2017-04-04 02:15:58', '2017-04-04 02:15:58'),
(12, 'Java', '2017-04-04 02:16:05', '2017-04-04 02:16:05'),
(13, 'Google Maps API', '2017-04-04 02:16:19', '2017-04-04 02:16:19'),
(14, 'Pusher API', '2017-04-04 02:16:28', '2017-04-04 02:16:28'),
(15, 'Bootstrap', '2017-04-04 02:16:44', '2017-04-04 02:16:44'),
(16, 'MySQL', '2017-04-04 02:17:11', '2017-04-04 02:17:11'),
(17, 'MSSQL', '2017-04-04 02:17:18', '2017-04-04 02:17:18'),
(18, 'Database development', '2017-04-04 02:17:29', '2017-04-04 02:17:29'),
(19, 'WordPress', '2017-04-04 02:17:39', '2017-04-04 02:17:39'),
(20, 'Stripe', '2017-04-04 02:17:59', '2017-04-04 02:17:59'),
(21, 'Vue.js', '2017-04-04 02:18:09', '2017-04-04 02:18:09'),
(22, 'AngularJS', '2017-04-04 02:18:17', '2017-04-04 02:18:17'),
(23, 'ASP.NET MVC', '2017-04-04 02:18:26', '2017-04-04 02:18:26'),
(24, 'ASP.NET Webforms', '2017-04-04 02:18:36', '2017-04-04 02:18:36'),
(25, 'ASP', '2017-04-04 02:18:44', '2017-04-04 02:18:44'),
(26, 'WPF', '2017-04-04 02:18:54', '2017-04-04 02:18:54'),
(27, 'WCF', '2017-04-04 02:19:01', '2017-04-04 02:19:01'),
(28, 'Backbone.js', '2017-04-04 02:19:17', '2017-04-04 02:19:17'),
(29, 'Node.js', '2017-04-04 02:19:25', '2017-04-04 02:19:25'),
(30, 'Ruby On Rails', '2017-04-04 02:19:35', '2017-04-04 02:19:35'),
(31, 'Express.js', '2017-04-04 02:19:46', '2017-04-04 02:19:46'),
(32, 'MongoDB', '2017-04-04 02:19:53', '2017-04-04 02:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Application', '2017-04-04 01:58:46', '2017-04-04 01:58:46'),
(3, 'Android Application', '2017-04-04 02:13:34', '2017-04-04 02:13:34'),
(4, 'iOS Application', '2017-04-04 02:13:46', '2017-04-04 02:13:46'),
(5, 'Desktop Application', '2017-04-04 02:13:57', '2017-04-04 02:13:57'),
(6, 'Cross Platform Mobile Application', '2017-04-04 02:14:20', '2017-04-04 02:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'Hassan', 'admin@gmail.com', 'eyJpdiI6Im81WDd5R2R3OW03R0p1MHV6bjR1Nmc9PSIsInZhbHVlIjoidDhCd2phUGNseGYzNHFnV1JGZGVpQT09IiwibWFjIjoiZjdhOGRmNjBiZDVlODRiNTlhNDRmZDM4YTEyYjkzZTI2NTIxNmUzYjM4YWRmZTM3ZmJjYzk2ZDQ1YmE3ZThmMyJ9', 'Not Available', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_session_id_foreign` (`session_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licenses_proj_id_foreign` (`proj_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`);

--
-- Indexes for table `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_technologies_proj_id_foreign` (`proj_id`),
  ADD KEY `project_technologies_tech_id_foreign` (`tech_id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_types_proj_id_foreign` (`proj_id`),
  ADD KEY `project_types_type_id_foreign` (`type_id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sessions_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_technologies`
--
ALTER TABLE `project_technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`id`);

--
-- Constraints for table `licenses`
--
ALTER TABLE `licenses`
  ADD CONSTRAINT `licenses_proj_id_foreign` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD CONSTRAINT `project_technologies_proj_id_foreign` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_technologies_tech_id_foreign` FOREIGN KEY (`tech_id`) REFERENCES `technologies` (`id`);

--
-- Constraints for table `project_types`
--
ALTER TABLE `project_types`
  ADD CONSTRAINT `project_types_proj_id_foreign` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
