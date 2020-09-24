-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 02:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `so_reklame`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilboard`
--

CREATE TABLE `bilboard` (
  `id_bilboard` int(10) UNSIGNED NOT NULL,
  `alamat_bil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kab_bil` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_owner` int(10) UNSIGNED NOT NULL,
  `tipe_bil` enum('Elektronik','Non Elektronik') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Elektronik',
  `jumlah_muka` int(11) NOT NULL,
  `ukuran_lebar` double(8,2) NOT NULL,
  `ukuran_tinggi` double(8,2) NOT NULL,
  `tinggi_papan` double(8,2) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `gambar1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ijin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_PIC_cli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perusahaan_cli` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kab_cli` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp_cli` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_web_cli` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_email_cli` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_03_162419_table_user', 1),
(2, '2020_04_03_162516_table_owner', 1),
(3, '2020_04_03_162557_table_bilboard', 1),
(4, '2020_04_03_162622_table_client', 1),
(5, '2020_04_03_162643_table_transaksi', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan_owner` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_PIC` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kab` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_web` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `nama_perusahaan_owner`, `nama_PIC`, `alamat`, `kota_kab`, `no_tlp`, `alamat_web`, `alamat_email`, `created_at`, `updated_at`) VALUES
(25, 'hikma', 'ade', 'mmmmokoko', 'lll', '082121654396', 'coding.com', 'aalolxyz@gmail.com', '2020-04-09 09:37:24', '2020-04-09 23:37:45');

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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `code_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `id_bilboard` int(10) UNSIGNED NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','manager','SuperAdmin','goest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ade', 'aalolxyz@gmail.com', NULL, '$2y$10$LtlOGpZxRUgEhX7jO6DtbuOedW4iVj2udnHPK0pT/bx2B/AHMyrqa', 'SuperAdmin', NULL, '2020-04-18 19:44:15', '2020-04-18 19:44:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilboard`
--
ALTER TABLE `bilboard`
  ADD PRIMARY KEY (`id_bilboard`),
  ADD KEY `bilboard_id_owner_foreign` (`id_owner`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_client_foreign` (`id_client`),
  ADD KEY `transaksi_id_bilboard_foreign` (`id_bilboard`);

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
-- AUTO_INCREMENT for table `bilboard`
--
ALTER TABLE `bilboard`
  MODIFY `id_bilboard` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilboard`
--
ALTER TABLE `bilboard`
  ADD CONSTRAINT `bilboard_id_owner_foreign` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_bilboard_foreign` FOREIGN KEY (`id_bilboard`) REFERENCES `bilboard` (`id_bilboard`),
  ADD CONSTRAINT `transaksi_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
