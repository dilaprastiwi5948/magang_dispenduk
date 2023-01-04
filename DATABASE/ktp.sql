-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 03:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktp`
--

-- --------------------------------------------------------

--
-- Table structure for table `explanation_types`
--

CREATE TABLE `explanation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explanation_types`
--

INSERT INTO `explanation_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Online', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(2, 'Dinas', NULL, '2022-10-27 20:04:00', '2022-11-10 23:46:29'),
(3, 'Kelurahan', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(4, 'MMP', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 1),
(48, '2019_08_19_000000_create_failed_jobs_table', 1),
(49, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(50, '2022_10_04_165908_create_user_details_table', 1),
(51, '2022_10_04_174219_create_reporting_types_table', 1),
(52, '2022_10_04_174247_create_submission_types_table', 1),
(53, '2022_10_04_174339_create_explanation_types_table', 1),
(54, '2022_10_04_174427_create_reporting_id_cards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reporting_id_cards`
--

CREATE TABLE `reporting_id_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportingtype_id` bigint(20) UNSIGNED NOT NULL,
  `submissiontype_id` bigint(20) UNSIGNED NOT NULL,
  `explanationtype_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_districts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `districts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reporting_id_cards`
--

INSERT INTO `reporting_id_cards` (`id`, `reportingtype_id`, `submissiontype_id`, `explanationtype_id`, `nik`, `name`, `birthdate`, `birthplace`, `address`, `sub_districts`, `districts`, `city`, `province`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 3, '3505145003000325', 'Jennie', '2002-10-19', 'Malang', 'Jl. Kucing', 'Kesatrian', 'Blimbing', 'Kota Malang', 'Jawa Timur', 1, '2022-10-27 21:11:05', '2022-10-27 21:11:05'),
(9, 1, 4, 2, '3505145003000563', 'lalisa', '2000-03-13', 'Malang', 'Jl. Sama', 'Bunulrejo', 'Blimbing', 'Kota Malang', 'Jawa Timur', 2, '2022-11-07 05:01:46', '2022-11-07 05:01:46'),
(11, 1, 3, 2, '3505145003000457', 'Dila Tiwi', '2000-05-05', 'Blitar', 'Jl. Kesumba', 'Kidul Dalem', 'Klojen', 'Kota Malang', 'Jawa Timur', 1, '2022-11-07 05:08:57', '2022-11-07 05:08:57'),
(12, 1, 3, 2, '3505145003000538', 'Riri Rianti', '2002-02-02', 'Malang', 'Jl. Melati', 'Bunulrejo', 'Blimbing', 'Kota Malang', 'Jawa Timur', 3, '2022-11-07 05:10:57', '2022-11-07 05:10:57'),
(13, 1, 4, 1, '3505145003000235', 'Gibran', '2000-02-04', 'Malang', 'Jl. Remujung', 'Kidul Dalem', 'Klojen', 'Kota Malang', 'Jawa Timur', 1, '2022-11-07 05:18:27', '2022-11-07 05:18:27'),
(14, 1, 2, 1, '3505145003000564', 'Rika Rianti', '2002-03-03', 'Malang', 'Jl. Kesumba', 'Kidul Dalem', 'Klojen', 'Kota Malang', 'Jawa Timur', 4, '2022-11-07 07:34:55', '2022-11-07 07:34:55'),
(18, 1, 4, 1, '1111111111111111', 'Rosi Mirna', '2002-11-08', 'Malang', 'Jl. Melati', 'Oro Oro Dowo', 'Klojen', 'Kota Malang', 'Jawa Timur', 1, '2022-11-09 08:45:19', '2022-11-10 23:33:55'),
(19, 1, 3, 3, '3505145003000327', 'Mila Karmila', '2000-11-08', 'Blitar', 'Jl. Kalimantan', 'Kauman', 'Klojen', 'Kota Malang', 'Jawa Timur', 2, '2022-11-09 08:58:01', '2022-11-09 08:58:01'),
(20, 1, 3, 3, '1111111111111346', 'Rosmi', '2022-11-07', 'Blitar', 'ferrfgr', 'Sijunjung', 'Sijunjung', 'Kabupaten Sijunjung', 'Sumatera Barat', 2, '2022-11-09 08:58:53', '2022-11-09 08:58:53'),
(22, 1, 7, 1, '1111111111115393', 'Riri', '2002-11-01', 'Jombang', 'Jl. Semeru', 'Kesatrian', 'Blimbing', 'Kota Malang', 'Jawa Timur', 1, '2022-11-10 23:48:30', '2022-11-10 23:48:30'),
(23, 1, 1, 2, '1111111111111135', 'Robi Purba', '2000-11-16', 'Malang', 'Jl. Sesama', 'Kidul Dalem', 'Klojen', 'Kota Malang', 'Jawa Timur', 1, '2022-11-14 05:35:52', '2022-11-14 05:40:13'),
(24, 1, 2, 2, '1111111111113443', 'Dila', '2000-11-14', 'Malang', 'Jl kesambi', 'Bandungrejosari', 'Sukun', 'Kota Malang', 'Jawa Timur', 1, '2022-11-14 18:16:02', '2022-11-14 18:16:02'),
(25, 1, 2, 3, '3505145003000764', 'Roki', '2000-11-14', 'Malang', 'Jl. Dalam', 'Sukoharjo', 'Klojen', 'Kota Malang', 'Jawa Timur', 8, '2022-11-14 18:29:56', '2022-11-14 18:29:56'),
(26, 1, 3, 2, '1111111111111235', 'Kiki', '2000-11-09', 'Malang', 'Jl. Semanggi', 'Kidul Dalem', 'Klojen', 'Kota Malang', 'Jawa Timur', 1, '2022-11-22 03:53:40', '2022-11-22 03:53:40'),
(27, 1, 4, 3, '3505145003000735', 'Riki', '2001-10-31', 'Malang', 'Jl. Minang', 'Ciptomulyo', 'Sukun', 'Kota Malang', 'Jawa Timur', 2, '2022-11-22 03:57:13', '2022-11-22 03:57:13'),
(28, 1, 5, 3, '3505145003008464', 'Ana Lia', '2002-11-11', 'Malang', 'Jl. Kemangi', 'Sukoharjo', 'Klojen', 'Kota Malang', 'Jawa Timur', 3, '2022-11-22 04:04:58', '2022-11-22 04:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `reporting_types`
--

CREATE TABLE `reporting_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reporting_types`
--

INSERT INTO `reporting_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dalam daerah', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(2, 'Luar Daerah', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `submission_types`
--

CREATE TABLE `submission_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submission_types`
--

INSERT INTO `submission_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rusak', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(2, 'Hilang', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(3, 'Pemula', NULL, '2022-10-27 20:04:00', '2022-11-10 23:42:08'),
(4, 'Perubahan Data', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(5, 'Paket', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(6, 'Surat Keterangan', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(7, 'KTP', '2022-11-14 05:38:02', '2022-11-07 04:20:05', '2022-11-14 05:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: admin, 0: pelapor',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$WU8cB61nyg6R.7MBVJqaJeZ3S9pe/8vEK1q9nMFUDUFGHvhwVJY3m', 1, NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(2, 'lalisa', '$2y$10$Pahez0fR7s1EE7s3Rxv7R.notvRG0iVtl2cg4JpQdzy05jjc0MIIS', 0, NULL, '2022-10-27 20:15:19', '2022-12-03 06:54:59'),
(3, 'mina12', '$2y$10$eti3EYTWLRre7iPBewKTSuE0x6HY4YBkf8wSp1iLW1s/t5eT0g7S2', 0, NULL, '2022-10-28 17:34:55', '2022-10-28 17:36:11'),
(4, 'sufi', '$2y$10$9CB7bfAS/q8boRFSV3.VweZQxWS02uDHzAIly1JxPAGhXhx2FhUHa', 0, NULL, '2022-11-07 05:59:11', '2022-11-07 18:22:39'),
(5, 'rian', '$2y$10$mM6jvqJXtQcjf/6VyNYlw.tvajiRja1LhGCfcxnXgG/NOFL4i3Poi', 0, NULL, '2022-11-08 05:08:02', '2022-11-08 05:08:02'),
(6, 'bina', '$2y$10$JaXLO1iOCpIZ4e5a08iRQeM4qILedDWrbcxlRu1lAhOpYfCTjY2pe', 1, NULL, '2022-11-08 05:15:05', '2022-11-10 23:39:19'),
(7, 'robet', '$2y$10$JVSKJoUrvFiqnpiMzAGXj.Gfr4DUKpjIjaSPZGnS.RZkHARm8u77m', 0, NULL, '2022-11-14 07:36:32', '2022-11-14 17:13:34'),
(8, 'mian', '$2y$10$zgWpwtqkH0ANwc7TH87Wle45dDGOcxmoRb9PPUv2nZfB6v3AMXY8y', 0, '2022-11-14 18:36:51', '2022-11-14 18:21:48', '2022-11-14 18:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `nik`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wallace Welch', '97929118350552178', 'Admin', NULL, '2022-10-27 20:04:00', '2022-10-27 20:04:00'),
(2, 2, 'Lalisa', '3505145003000123', 'operator', NULL, '2022-10-27 20:15:19', '2022-12-03 06:54:59'),
(3, 3, 'Mina', '3505145003007493', 'staf', NULL, '2022-10-28 17:34:55', '2022-10-28 17:36:11'),
(4, 4, 'Sufi', '3505145003000358', 'staf', NULL, '2022-11-07 05:59:11', '2022-11-07 05:59:11'),
(5, 5, 'Rian', '3505145003000648', 'operator', NULL, '2022-11-08 05:08:02', '2022-11-08 05:08:02'),
(6, 6, 'Bina', '3505145003006382', 'operator', NULL, '2022-11-08 05:15:05', '2022-11-10 23:39:19'),
(7, 7, 'Robet Mika', '1111111111114543', 'operator', NULL, '2022-11-14 07:36:32', '2022-11-14 07:36:32'),
(8, 8, 'Mian Roki', '3505145003000746', 'operator', NULL, '2022-11-14 18:21:48', '2022-11-14 18:21:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explanation_types`
--
ALTER TABLE `explanation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reporting_id_cards`
--
ALTER TABLE `reporting_id_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporting_id_cards_reportingtype_id_foreign` (`reportingtype_id`),
  ADD KEY `reporting_id_cards_submissiontype_id_foreign` (`submissiontype_id`),
  ADD KEY `reporting_id_cards_explanationtype_id_foreign` (`explanationtype_id`),
  ADD KEY `reporting_id_cards_created_by_foreign` (`created_by`);

--
-- Indexes for table `reporting_types`
--
ALTER TABLE `reporting_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_types`
--
ALTER TABLE `submission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explanation_types`
--
ALTER TABLE `explanation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reporting_id_cards`
--
ALTER TABLE `reporting_id_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reporting_types`
--
ALTER TABLE `reporting_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submission_types`
--
ALTER TABLE `submission_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reporting_id_cards`
--
ALTER TABLE `reporting_id_cards`
  ADD CONSTRAINT `reporting_id_cards_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reporting_id_cards_explanationtype_id_foreign` FOREIGN KEY (`explanationtype_id`) REFERENCES `explanation_types` (`id`),
  ADD CONSTRAINT `reporting_id_cards_reportingtype_id_foreign` FOREIGN KEY (`reportingtype_id`) REFERENCES `reporting_types` (`id`),
  ADD CONSTRAINT `reporting_id_cards_submissiontype_id_foreign` FOREIGN KEY (`submissiontype_id`) REFERENCES `submission_types` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
