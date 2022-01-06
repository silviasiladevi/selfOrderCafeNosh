-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 09:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victorious_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailtrxes`
--

CREATE TABLE `detailtrxes` (
  `kode_trx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `harga_trx` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtrxes`
--

INSERT INTO `detailtrxes` (`kode_trx`, `user_id`, `harga_trx`, `total_bayar`, `kembalian`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('TRX00001', 1, 100000, 0, 0, 'menunggu pembayaran', '2021-12-18 09:01:51', '2021-12-19 00:46:13', '2021-12-19 00:46:13'),
('TRX00002', 1, 64000, 0, 0, 'menunggu pembayaran', '2021-12-18 09:04:17', '2021-12-18 09:04:17', NULL),
('TRX00003', 2, 63000, 0, 0, 'menunggu pembayaran', '2021-12-19 02:16:13', '2021-12-19 02:16:13', NULL);

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `nama_menu`, `type`, `desc`, `price`, `pic`, `updated_at`, `deleted_at`) VALUES
(1, 'beef bulgogi rice', 'makanan', 'daging sapi bulgogi dengan nasi', 50000, 'assets/images/FxEyC28M62y0ihWhCj493Lrf3xxDcztx6clZO08V.jpg', '2021-12-18 08:56:53', NULL),
(2, 'capucino', 'minuman', 'Kopo Cappucino', 18000, 'assets/images/9Max8oSH91SsUPjpbyi1W41dvPzrU4ImnuORF4Ub.jpg', '2021-12-18 09:02:40', NULL),
(3, 'Double Espresso', 'minuman', 'Expresso 2 kali lipat', 20000, 'assets/images/5mCphIihdDyBl30PoNHs2lKb4X1hHaNqBOpPLjLM.jpg', '2021-12-18 09:03:14', NULL),
(4, 'Blanket Sausage', 'dessert', 'Sosis yang diselimuti dengan roti yang lembut didalam, crunchy di luar', 23000, 'assets/images/RPkR34kIiBcN3dybLwlinJxLOdoezM3slNFWpw3R.jpg', '2021-12-18 09:03:43', NULL),
(5, 'Fish And Chips', 'makanan', 'Ikan tanpa tulangyang crispy dipadukan dengan ketang goreng yang gurih', 28000, 'assets/images/uxN2ALVTGsDdMEenqhYgJULBu3gInD8wfsVgG1Qc.jpg', '2021-12-19 02:08:15', NULL),
(6, 'Singkong Ala Thailand', 'dessert', 'Singkong rebus yang disajikan dengan saus khas Thailand', 26000, 'assets/images/vlq1nrXewKHIP8KrzIYj9YORNrrWg52RwBxaDNoG.jpg', '2021-12-19 02:08:58', NULL),
(7, 'Betutu Fried Rice', 'makanan', 'Sajian nasi goreng dengan rempah ayam betutu disajikan dengan urap dan telur', 35000, 'assets/images/qPkfmDPgLNgn3bSSJN9mpUtPXc77REHt65vHICJw.jpg', '2021-12-19 02:09:34', NULL),
(8, 'Coffe Latte', 'minuman', 'Kopi ala Nosh dengan Latte (Vanilla, Caramel, Hazelnut, Banana)', 27000, 'assets/images/3u9iBvfahIUnbor1enccS3ztOQuo86X8sNwRSsNk.jpg', '2021-12-19 02:10:13', NULL),
(9, 'Sunset Beach, Blue Lagoon, Blue Fantasy, Orange Squash, Lychee Squash', 'minuman', 'Aneka minuman ringan yang menyejukkan', 24000, 'assets/images/xVy7yrzkDvcaArAMaSqjoSonsR34XlPFSTrgAcai.jpg', '2021-12-19 02:10:58', NULL),
(10, 'Flat White', 'makanan', 'Kopi Flat White ala Nosh', 27000, 'assets/images/sDXJS2zGewiCcXk2xXCEHu8ElJJ7tv8V6pLO4AvJ.jpg', '2021-12-19 02:11:48', NULL),
(11, 'Mochacino', 'minuman', 'Kopi rasa Moka', 28000, 'assets/images/F0SqLUi7WyJwyAtqSz9z0ImeUn9I87AID9mx5W84.jpg', '2021-12-19 02:12:25', NULL),
(12, 'Ice Cream Goreng', 'dessert', 'Ice cream yang digoreng, crispy diluar dingin didalam', 26000, 'assets/images/ex1KDf5sMtYRoUlmrKxLvAYa1yFKd0HrEY9M44rr.jpg', '2021-12-19 02:13:15', NULL),
(13, 'White Cream Frappucino', 'makanan', 'Kopi Frapucino dengan white cream lembut', 32000, 'assets/images/NbXPbtEibJcMK0Iatc9cVfnoRAqieiug1pRk3Vaz.jpg', '2021-12-19 02:14:05', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_08_104952_create_menus_table', 1),
(5, '2021_09_08_155301_create_carts_table', 1),
(6, '2021_11_17_235850_add_soft_delete_to_menus', 1),
(7, '2021_11_24_011017_add_soft_delete_to_users', 1),
(8, '2021_12_17_162126_drop_detailtrxs_table', 1),
(9, '2021_12_17_162808_create_detailtrxes_table', 1),
(10, '2021_12_17_163840_add_soft_delete_to_detailtrxes', 1),
(11, '2021_12_18_074810_create_transactions_table', 1),
(12, '2021_12_19_034454_add_soft_delete_to_transactions', 1);

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `No_trx` bigint(20) UNSIGNED NOT NULL,
  `kode_trx` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`No_trx`, `kode_trx`, `menu_id`, `jml_beli`, `total_harga`, `deleted_at`) VALUES
(2, 'TRX00001', 1, 2, 100000, '2021-12-19 00:46:13'),
(3, 'TRX00002', 4, 2, 46000, NULL),
(4, 'TRX00002', 2, 1, 18000, NULL),
(5, 'TRX00003', 5, 1, 28000, NULL),
(6, 'TRX00003', 7, 1, 35000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `nomor_hp`, `jabatan`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$5A0KQ2ECrUv37k9kVAX7g.UuCqotfhjcSkX6AYSzXwmJQodNqjskG', 'Silvia Siladevi', 'silvia.spt123@gmail.com', '0823829492', 'admin', NULL, NULL, '2021-12-18 08:55:30', '2021-12-18 08:55:30', NULL),
(2, 'kasir', '$2y$10$qknz/jnmO1U9C21wspYJjutq/wLl3AAvFRlz5fAG34XaOra7feP7.', 'Sada dwi', 'sada@gmail.com', '081500020948', 'customer', NULL, NULL, '2021-12-19 02:15:01', '2021-12-19 02:15:01', NULL),
(3, 'customer1', '$2y$10$neFWz2gR1uYEsZJgA35aIuktvx4sV/fit.jQ.ghl1mk.1a5jNUL4S', 'Tina K', 'tina@gmail.com', '08124573648', 'customer', NULL, NULL, '2021-12-19 02:17:08', '2021-12-19 02:17:08', NULL),
(4, 'customer2', '$2y$10$cniImFYNttprWNRXXHaSqOAyhds1wTy5NzswzDzqd1YcdKybaZqTK', 'Angellita Novianti', 'angel@gmail.com', '081273782819', 'customer', NULL, NULL, '2021-12-19 02:19:01', '2021-12-19 02:19:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_id_unique` (`id`),
  ADD KEY `carts_menu_id_foreign` (`menu_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `detailtrxes`
--
ALTER TABLE `detailtrxes`
  ADD PRIMARY KEY (`kode_trx`),
  ADD KEY `detailtrxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `menus_id_menu_unique` (`id_menu`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`No_trx`),
  ADD UNIQUE KEY `transactions_no_trx_unique` (`No_trx`),
  ADD KEY `transactions_menu_id_foreign` (`menu_id`),
  ADD KEY `transactions_kode_trx_foreign` (`kode_trx`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nomor_hp_unique` (`nomor_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `No_trx` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id_menu`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detailtrxes`
--
ALTER TABLE `detailtrxes`
  ADD CONSTRAINT `detailtrxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_kode_trx_foreign` FOREIGN KEY (`kode_trx`) REFERENCES `detailtrxes` (`kode_trx`),
  ADD CONSTRAINT `transactions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
