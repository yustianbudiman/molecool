-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 04:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(62, '2019_12_31_065155_create_users_table', 1),
(63, '2020_01_02_033655_create_menu_table', 1),
(64, '2020_01_02_035422_create_role_table', 1),
(65, '2020_01_03_123142_create_user_role_table', 1),
(66, '2020_01_03_123614_create_role_menu_table', 1),
(67, '2020_02_27_060413_create_news_table', 1),
(68, '2020_02_27_111145_create_news_detail_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `content`, `image`, `created_by`, `created_ip`, `updated_by`, `updated_ip`, `created_at`, `updated_at`) VALUES
(3, 'hello word', 'image.jpg', '', '', '', '', '2020-02-27 15:00:59', '2020-02-27 15:00:59'),
(4, 'hello word 2', 'image2.jpg', '', '', '', '', '2020-02-27 15:01:07', '2020-02-27 15:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `news_detail`
--

CREATE TABLE `news_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_news` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_detail`
--

INSERT INTO `news_detail` (`id`, `id_news`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'commnet hello word', '2020-02-26 17:00:00', '2020-02-26 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `create_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`, `icon_menu`, `link_menu`, `deskripsi`, `type_menu`, `ordering`, `id_parent`, `create_ip`, `create_by`, `update_ip`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'news', 'fa fa-news-letter', 'http://localhost:8000/news', '', 'left', '1', 0, '', 0, '', 0, '2020-02-27 07:21:04', '2020-02-27 07:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `nama_role`, `deskripsi`, `create_ip`, `create_by`, `update_ip`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user biasa', '', 0, '', 0, '2020-02-27 07:15:55', '2020-02-27 07:15:55'),
(2, 'administrator', 'user admin', '', 0, '', 0, '2020-02-27 07:16:27', '2020-02-27 07:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_menu`
--

CREATE TABLE `tbl_role_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `action_create` int(11) NOT NULL,
  `action_read` int(11) NOT NULL,
  `action_update` int(11) NOT NULL,
  `action_delete` int(11) NOT NULL,
  `create_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_menu`
--

INSERT INTO `tbl_role_menu` (`id`, `id_role`, `id_menu`, `action_create`, `action_read`, `action_update`, `action_delete`, `create_ip`, `create_by`, `update_ip`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 0, 0, '', 0, '', 0, '2020-02-27 07:24:05', '2020-02-27 07:24:05'),
(2, 2, 1, 1, 1, 1, 1, '', 0, '', 0, '2020-02-27 07:24:17', '2020-02-27 07:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `id_user`, `id_role`, `deskripsi`, `create_ip`, `create_by`, `update_ip`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '', '', 0, '', 0, '2020-02-27 07:17:39', '2020-02-27 07:17:39'),
(2, 1, 2, '', '', 0, '', 0, '2020-02-27 07:17:47', '2020-02-27 07:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$W4FyJQLAzlzz1p1LrK2NAeF99iNdwVR4DoGB1dQtEpDNodUOu9Hyq', 'VUUwckJyRGhjaURpZWE5YXFiYlZ0djBSMG8wS0JFeHdTVEhLZGV6dg==', '2020-02-27 06:30:36', '2020-02-27 10:36:34'),
(2, 'user', 'user@gmail.com', '$2y$10$8JaONwISJbwshREPbxJeye7KbZmmzYTkIiuwxXhnqDXaexXF3wHZ2', 'TlI4R1dJb0hEN2NWRTdxRHpOTU5LUFZFb0l2QnZVazRWa0hrVGJWTw==', '2020-02-27 06:31:04', '2020-02-27 06:42:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_detail`
--
ALTER TABLE `news_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role_menu`
--
ALTER TABLE `tbl_role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_detail`
--
ALTER TABLE `news_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role_menu`
--
ALTER TABLE `tbl_role_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
