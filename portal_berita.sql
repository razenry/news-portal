-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc41.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2025 at 07:49 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirations`
--

CREATE TABLE `aspirations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `description` text NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tags`)),
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `type` enum('Blog','Aspirasi') NOT NULL DEFAULT 'Blog',
  `comments_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspirations`
--

INSERT INTO `aspirations` (`id`, `title`, `slug`, `thumbnail`, `body`, `description`, `tags`, `published`, `type`, `comments_enabled`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `category_id`, `unit_id`) VALUES
(1, 'TEST JUDULTEST JUDULTEST JUDULTEST JUDULTEST JUDUL', 'test-judultest-judultest-judultest-judultest-judul', 'blogs/01JSM30AX5CJ9CS9E2JY2J83CQ.jpg', '<p><a title=\"Tambah Berita\" href=\"/admin/berita/tambah\" target=\"_blank\" rel=\"noopener\">Tambah Berita</a></p>\n<hr>\n<p style=\"text-align: center;\"><iframe style=\"width: 620px; height: 348px;\" src=\"https://www.youtube.com/embed/GBG1Gs6XAYM?si=WhbZf016Ikrmpigg\" width=\"880\" height=\"494\" allowfullscreen=\"allowfullscreen\"></iframe></p>\n<h1 style=\"text-align: center;\"><strong>Halo Geng</strong></h1>\n<p style=\"text-align: center;\"><img src=\"/storage/uploads/Mn2SZLWgTtnHmc4kcqlWTUrXlvWf107XkjiDWHpw.jpg\" alt=\"Kurumi\" width=\"621\" height=\"348\"></p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<ol>\n<li style=\"text-align: left;\">Gaboleh hina jawa</li>\n<li style=\"text-align: left;\">Gaboleh Rasing</li>\n</ol>\n<blockquote>\n<p style=\"text-align: left;\">Test</p>\n</blockquote>', 'TEST DESKRIPSITEST DESKRIPSITEST DESKRIPSITEST DESKRIPSITEST DESKRIPSI', '[\"test\",\"halo\",\"new\"]', 1, 'Aspirasi', 1, '2025-04-24 18:25:09', '2025-04-26 12:46:35', NULL, 1, 1, 1),
(2, 'Hallo', 'hallo', 'blogs/01JSRHRYJW4SJYYGCHQZ6AW5CG.jpg', '<p>&nbsp;</p>\n<p><strong>Test</strong></p>\n<blockquote>Halo</blockquote>\n<h2>Mantap</h2>\n<p>&nbsp;</p>\n<pre>echo \"Hellow\";</pre>', 'Hallo', '[\"tag\"]', 1, 'Blog', 1, '2025-04-26 12:00:13', '2025-04-29 06:25:54', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('portalberita_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1745897287),
('portalberita_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1745897287;', 1745897287),
('portalberita_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1745893594),
('portalberita_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1745893594;', 1745893594),
('portalberita_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:68:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:15:\"view_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:19:\"view_any_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:17:\"create_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:17:\"update_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:18:\"restore_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:22:\"restore_any_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:20:\"replicate_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:18:\"reorder_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:17:\"delete_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:21:\"delete_any_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:23:\"force_delete_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:27:\"force_delete_any_aspiration\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"restore_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"restore_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:18:\"replicate_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:16:\"reorder_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:21:\"force_delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:25:\"force_delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:10:\"view_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"view_any_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"create_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"update_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:13:\"restore_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:17:\"restore_any_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:15:\"replicate_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:13:\"reorder_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"delete_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:16:\"delete_any_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:18:\"force_delete_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:22:\"force_delete_any_slide\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:9:\"view_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:13:\"view_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:11:\"create_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:11:\"update_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:12:\"restore_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:16:\"restore_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:14:\"replicate_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"reorder_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"delete_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"delete_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:17:\"force_delete_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:21:\"force_delete_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:20:\"page_EditProfilePage\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:24:\"widget_DashboardOverview\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"editor\";s:1:\"c\";s:3:\"web\";}}}', 1745979936);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TEST KATEGORI', 'ikon-kategori/01JSM2QN13PB0A5Q9RGNHN075R.png', 'test-kategori', '<pre>KEREN DAH POKOKNYA</pre>', '2025-04-24 18:20:25', '2025-04-24 18:20:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_aspirations`
--

CREATE TABLE `comment_aspirations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspiration_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_aspirations`
--

INSERT INTO `comment_aspirations` (`id`, `aspiration_id`, `user_id`, `content`, `parent_id`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Halo\n', NULL, 1, '2025-04-26 11:54:17', '2025-04-26 11:54:17'),
(2, 2, 1, 'Test\n', NULL, 1, '2025-04-26 17:48:51', '2025-04-26 17:48:51'),
(3, 2, 1, 'Halo', 2, 1, '2025-04-26 17:49:00', '2025-04-26 17:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_07_053942_create_permission_tables', 1),
(5, '2025_03_07_061059_add_custom_fields_to_users_table', 1),
(6, '2025_03_08_072445_create_categories_table', 1),
(7, '2025_03_08_103254_create_units_table', 1),
(8, '2025_03_28_051046_create_slides_table', 1),
(9, '2025_03_28_103329_create_aspirations_table', 1),
(10, '2025_04_06_133736_create_comment_aspirations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(2, 'view_any_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(3, 'create_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(4, 'update_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(5, 'restore_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(6, 'restore_any_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(7, 'replicate_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(8, 'reorder_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(9, 'delete_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(10, 'delete_any_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(11, 'force_delete_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(12, 'force_delete_any_aspiration', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(13, 'view_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(14, 'view_any_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(15, 'create_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(16, 'update_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(17, 'restore_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(18, 'restore_any_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(19, 'replicate_category', 'web', '2025-04-13 10:48:36', '2025-04-13 10:48:36'),
(20, 'reorder_category', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(21, 'delete_category', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(22, 'delete_any_category', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(23, 'force_delete_category', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(24, 'force_delete_any_category', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(25, 'view_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(26, 'view_any_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(27, 'create_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(28, 'update_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(29, 'delete_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(30, 'delete_any_role', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(31, 'view_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(32, 'view_any_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(33, 'create_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(34, 'update_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(35, 'restore_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(36, 'restore_any_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(37, 'replicate_slide', 'web', '2025-04-13 10:48:37', '2025-04-13 10:48:37'),
(38, 'reorder_slide', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(39, 'delete_slide', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(40, 'delete_any_slide', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(41, 'force_delete_slide', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(42, 'force_delete_any_slide', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(43, 'view_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(44, 'view_any_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(45, 'create_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(46, 'update_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(47, 'restore_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(48, 'restore_any_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(49, 'replicate_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(50, 'reorder_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(51, 'delete_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(52, 'delete_any_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(53, 'force_delete_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(54, 'force_delete_any_unit', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(55, 'view_user', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(56, 'view_any_user', 'web', '2025-04-13 10:48:38', '2025-04-13 10:48:38'),
(57, 'create_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(58, 'update_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(59, 'restore_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(60, 'restore_any_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(61, 'replicate_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(62, 'reorder_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(63, 'delete_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(64, 'delete_any_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(65, 'force_delete_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(66, 'force_delete_any_user', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(67, 'page_EditProfilePage', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39'),
(68, 'widget_DashboardOverview', 'web', '2025-04-13 10:48:39', '2025-04-13 10:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-04-13 10:47:30', '2025-04-13 10:47:30'),
(2, 'editor', 'web', '2025-04-13 11:23:01', '2025-04-13 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(67, 2),
(68, 1),
(68, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VVC25Kah9PETkS1mmGcCZ9dLrWGNfPM66PvMLGJ7', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoid2lBUWlBaE56TGRRY2MwRjA4bjN6R0pRODRaUnd4T0NQZ3VVT1VSbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91bml0L3Ntay1hbC1hbWFuYWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJHlFRDBNNkk1NUpkNnNsOGVaUmJxZE8xTzVyZEQ1VHVxdEZUYTQ4ckNzdFo5WTlQajJtVmY2IjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1745910420);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slug`, `title`, `description`, `image`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tim-paskibra-smk-al-amanah-kembali-mengukir-prestasi-di-kota-tangerang-selatan', 'Tim Paskibra SMK Al Amanah Kembali Mengukir Prestasi di Kota Tangerang Selatan', 'SMK AL AMANAH', 'uploads/slides/01JSZSB4EDVN2FFCEEEQKBENH4.jpg', 1, '2025-04-29 07:27:10', '2025-04-29 07:27:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `logo`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMK AL AMANAH', 'logos/01JSS6K7SQY9C1W3576HDVJSXK.png', 'smk-al-amanah', '<h1><strong>SMK AL AMANAH AL BANTANI</strong></h1>\n<p><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://assets-a2.kompasiana.com/items/album/2023/06/26/20230626-213246-6499a28c08a8b55ae97c9cf2.jpeg?t=o&amp;v=500\" alt=\"\" width=\"476\" height=\"268\">&nbsp; </strong></p>\n<p><strong>VIDEO</strong></p>\n<p><strong><iframe style=\"display: table; margin-left: auto; margin-right: auto; width: 667px; height: 376px;\" src=\"https://www.youtube.com/embed/hpFClIOr8j0?si=m3VqfrVKg9ipJtIa\" width=\"667\" height=\"376\" allowfullscreen=\"allowfullscreen\"></iframe></strong></p>\n<p><strong>JURUSAN</strong></p>\n<ul>\n<li><strong>REKAYASA PERANGKAT LUNAK</strong></li>\n<li><strong>AKUNTANSI</strong></li>\n<li><strong>Bisnis Daring dan Pemasaran</strong></li>\n<li><strong>Perbangkan Syariah</strong></li>\n<li><strong>Otomatisasi dan Tata Kelola Perkantoran</strong></li>\n</ul>', '2025-04-24 18:18:24', '2025-04-29 07:36:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `custom_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_fields`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `custom_fields`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$12$yED0M6I55Jd6sl8eZRbqdO1O5rdD5TuqtFTa48rCstZ9Y9Pj2mVf6', 'f3rtB7ZJ6KS9IWVp3QxXjdQ718VKPmyiKdD83nsZR9eL8le7LLFqLGZKB42x', '2025-04-13 10:47:30', '2025-04-27 11:40:19', NULL, NULL),
(2, 'Editor', 'editor@gmail.com', NULL, '$2y$12$eLgJ8nJj057vGzZ/II1EkOsNEfgozguhHn33Dgg2olv6Bt8o003hC', '97msdiWqyMfc55bnBpQVu5yAwScMmNOKOyrRzVUaNFuvV4kvtC7RBgRYlo3U', '2025-04-13 11:23:42', '2025-04-13 11:23:42', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirations`
--
ALTER TABLE `aspirations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aspirations_slug_unique` (`slug`),
  ADD KEY `aspirations_user_id_foreign` (`user_id`),
  ADD KEY `aspirations_category_id_foreign` (`category_id`),
  ADD KEY `aspirations_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_aspirations`
--
ALTER TABLE `comment_aspirations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_aspirations_aspiration_id_foreign` (`aspiration_id`),
  ADD KEY `comment_aspirations_user_id_foreign` (`user_id`),
  ADD KEY `comment_aspirations_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slides_slug_unique` (`slug`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `aspirations`
--
ALTER TABLE `aspirations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_aspirations`
--
ALTER TABLE `comment_aspirations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirations`
--
ALTER TABLE `aspirations`
  ADD CONSTRAINT `aspirations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `aspirations_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `aspirations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment_aspirations`
--
ALTER TABLE `comment_aspirations`
  ADD CONSTRAINT `comment_aspirations_aspiration_id_foreign` FOREIGN KEY (`aspiration_id`) REFERENCES `aspirations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_aspirations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comment_aspirations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_aspirations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
