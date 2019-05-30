-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2019 at 06:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zo`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `name`, `key`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'zenueapps', 'WCxjCXql2HB0PbaVnhlIqxhknHQS4ryaspEJD2PV1WHaXbgOcWBnKL7iOEttzXFZ', 1, '2019-05-18 21:15:53', '2019-05-18 21:15:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_key_access_events`
--

CREATE TABLE `api_key_access_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `api_key_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_key_admin_events`
--

CREATE TABLE `api_key_admin_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `api_key_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_key_admin_events`
--

INSERT INTO `api_key_admin_events` (`id`, `api_key_id`, `ip_address`, `event`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'created', '2019-05-18 21:15:53', '2019-05-18 21:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `avalables`
--

CREATE TABLE `avalables` (
  `id` int(11) NOT NULL,
  `avail_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesan_id` bigint(20) NOT NULL,
  `renter_id` bigint(20) NOT NULL,
  `jenis_layanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsep_acara` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_acara` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tamu` bigint(20) NOT NULL,
  `tanggal_acara` datetime NOT NULL,
  `informasi` text COLLATE utf8mb4_unicode_ci,
  `is_accepted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eos`
--

CREATE TABLE `eos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_eo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_profil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kate_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_resets_table', 2),
(69, '2016_12_28_111110_create_api_keys_table', 2),
(70, '2016_12_28_111111_create_api_key_access_events_table', 2),
(71, '2016_12_28_111112_create_api_key_admin_events_table', 2),
(72, '2019_04_16_042110_create_eos_table', 2),
(73, '2019_04_16_050652_create_transactions_table', 2),
(74, '2019_04_16_052840_create_bookings_table', 2),
(76, '2019_05_14_075521_create_users_table', 2),
(77, '2019_05_14_121702_create_verify_users_table', 2),
(78, '2019_04_27_052755_create_pakets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE `pakets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_eo` int(11) NOT NULL,
  `gambar_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id`, `id_eo`, `gambar_paket`, `nama_paket`, `kategori`, `available`, `deskripsi`, `harga_paket`, `created_at`, `updated_at`) VALUES
(2, 1, '[\"produk_bt.jpg\",\"produk_jco.jpg\"]', 'Kue Kering', 'Wedding', 'Tersedia', 'kue kering menggugah selera', 10, '2019-05-14 19:28:00', '2019-05-14 19:28:00'),
(3, 1, '[\"salon_js.jpg\"]', 'Make Up by Ananta Vinnie', '2', 'Tersedia', 'lakukan makeup untuk pernikahan dengan sentuhan yang mengejutkan oleh ananta vinnie', 10000000, '2019-05-17 23:35:13', '2019-05-17 23:35:13'),
(4, 1, '[\"produk_js.jpg\"]', 'Make Up by Tasya Farasya', 'Concert', 'Tersedia', 'Datang ke Konser dengan tampilan yang menawan dan tahan lama hingga 24 jam serta terlihat flawless', 10, '2019-05-17 23:38:31', '2019-05-17 23:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_eo` int(11) NOT NULL DEFAULT '0',
  `is_renter` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified`, `no_telp`, `password`, `is_eo`, `is_renter`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Little Things', 'littlethings@gmail.com', 0, '085811515975', '$2y$10$/uBq2tD/bhv8NYmYCH97Ie6fhSU7vyL5OE5YXqB3yEYPKH2kIR6rm', 1, 0, 'SG1JGUZKM7R6gDCKpJ5P9vPubJIlHGEL6pAOBl81pBvorEIS6dYsJBG0LAEj', '2019-05-14 18:28:46', '2019-05-14 18:28:46'),
(3, 'Rara A.', 'raraayunita@gmail.com', 0, '081298472187', '$2y$10$14Y2iRoRdzw/RVlyVWKy0uNZGPGz01IqapihVdv5kFVdqOXiYg.AG', 0, 1, 'zGRM7K7q4fLW14Mdb8M2ob5lIZIHyXzGf8PcthFxuC1k9xlDLjR8r6Zcc8nH', '2019-05-18 01:00:02', '2019-05-18 01:00:02'),
(4, 'Regita A.', 'regitaazizah@gmail.com', 0, '081380242481', '$2y$10$OH3xu.pf0poHHIvZvIBFr.KBThAiPFCbqwKbM5D4RMcuMotgsDPCe', 0, 1, '8t65Iaas52eNTQvxPABucIXJNYqYU5kKeG6z8J4zNQyRwIposetd2Hstr7GY', '2019-05-18 01:04:00', '2019-05-18 01:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_keys_name_index` (`name`),
  ADD KEY `api_keys_key_index` (`key`);

--
-- Indexes for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_key_access_events_ip_address_index` (`ip_address`),
  ADD KEY `api_key_access_events_api_key_id_foreign` (`api_key_id`);

--
-- Indexes for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_key_admin_events_ip_address_index` (`ip_address`),
  ADD KEY `api_key_admin_events_event_index` (`event`),
  ADD KEY `api_key_admin_events_api_key_id_foreign` (`api_key_id`);

--
-- Indexes for table `avalables`
--
ALTER TABLE `avalables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eos`
--
ALTER TABLE `eos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakets`
--
ALTER TABLE `pakets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avalables`
--
ALTER TABLE `avalables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eos`
--
ALTER TABLE `eos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pakets`
--
ALTER TABLE `pakets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  ADD CONSTRAINT `api_key_access_events_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`);

--
-- Constraints for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  ADD CONSTRAINT `api_key_admin_events_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
