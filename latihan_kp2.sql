-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_kp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `data_file` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(11) NOT NULL,
  `updated_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `data_file`, `caption`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '1659689210252-michael-dam-mEZ3PoFGs_k-unsplash.jpg', 'bismillah', '2022-08-05 08:46:50', '2022-08-05 08:46:50', '1', '1'),
(2, '1659689385051-toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'alhamdulillah', '2022-08-05 08:49:45', '2022-08-05 08:49:45', '2', '2'),
(3, '1659927937903-profile.jpg', 'dicoba aja', '2022-08-08 03:05:38', '2022-08-08 03:05:38', '1', '1'),
(4, '1659928172898-michael-dam-mEZ3PoFGs_k-unsplash.jpg', 'dicoba lagi', '2022-08-08 03:09:32', '2022-08-08 03:09:32', '1', '1'),
(5, '1659944215082-purbo.jpg', 'gagal', '2022-08-08 07:36:55', '2022-08-08 07:36:55', '1', '1'),
(6, '1659945415570-toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'akhirnya', '2022-08-08 07:56:55', '2022-08-08 07:56:55', '1', '1'),
(7, '1660015539706-purbo2.jpg', 'dicoba lago dhe', '2022-08-09 03:25:39', '2022-08-09 03:25:39', '2', '2'),
(8, '1660024681578-toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'cek', '2022-08-09 05:58:01', '2022-08-09 05:58:01', '1', '1'),
(9, '1660024699648-toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'cek', '2022-08-09 05:58:19', '2022-08-09 05:58:19', '1', '1'),
(10, '1660109991157-michael-dam-mEZ3PoFGs_k-unsplash.jpg', 'dicoba pokonya', '2022-08-10 05:39:51', '2022-08-10 05:39:51', '2', '2'),
(14, '1660533957818-rayul-_M6gy9oHgII-unsplash.jpg', 'dicoba pokoknya', '2022-08-15 03:25:57', '2022-08-15 03:25:57', '1', '1'),
(15, '1660550679922-Dedicated-server.jpg', 'dicoba upload lewat localhost', '2022-08-15 08:04:39', '2022-08-15 08:04:39', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `bio` text NOT NULL,
  `file_profile` varchar(255) DEFAULT NULL,
  `file_sampul` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nama`, `nik`, `email`, `alamat`, `jabatan`, `bio`, `file_profile`, `file_sampul`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Ujang Rodrigos', '2021010024111', 'arya@gmail.com', 'losangeles', 'Web Designer', 'Front End Developer', 'LD3P3IXtOWiHfXyosb9nJ37Xj4Eo5eUZgKICsjlK.jpg', 'StG2aERDBoPkfS54Mp9VqYJ0g3HSA6Zhpyroubof.jpg', '2022-07-29 06:24:20', '2022-08-14 20:15:35', 1),
(2, 'Alexander Grah', '2021010024123', 'alex@gmail.com', 'lasvegas', 'Product Manager', 'i like theword', 'zQwyJ9HeHbbXcKGaaoDwfAOoqLZBgRLZMWuslw1b.jpg', 'gF3EuQEDRCU1czFST170rboK6owkpydQblVItIvC.jpg', '2022-08-01 23:14:27', '2022-08-08 07:21:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_26_160703_create_data_karyawans_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arya', 'arya@gmail.com', NULL, '$2y$10$fF53oas4SK2QHn1fSPJD3.shn.GyTAbRCD54WHFWXLT7TUltDfrrC', NULL, NULL, NULL),
(2, 'Alex Graham', 'alex@gmail.com', NULL, '$2y$10$fF53oas4SK2QHn1fSPJD3.shn.GyTAbRCD54WHFWXLT7TUltDfrrC', NULL, '2022-08-01 17:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
