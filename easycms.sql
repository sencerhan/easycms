-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Mar 2022, 16:40:01
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `easycms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-03-08 08:20:27', '2022-03-08 08:20:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_details`
--

CREATE TABLE `gallery_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `gallery_details`
--

INSERT INTO `gallery_details` (`id`, `gallery_id`, `language_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anasayfa Galeri', NULL, '2022-03-08 08:20:27', '2022-03-08 08:20:42'),
(2, 1, 3, NULL, NULL, '2022-03-08 08:20:27', '2022-03-08 08:20:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `language_id`, `src`, `title`, `description`, `link`, `created_at`, `updated_at`) VALUES
(109, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.16%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(110, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.16%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(111, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.15.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(112, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.15%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(113, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.14%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(114, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(115, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(116, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(117, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(118, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(119, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(120, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(121, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(122, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(123, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(124, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(125, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(4).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(126, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(127, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(128, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(129, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(130, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(131, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(132, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.03.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(133, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.02.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(134, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.02%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(135, 1, 1, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.01.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(136, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.16%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(137, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.16%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(138, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.15.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(139, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.15%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(140, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.14%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(141, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(142, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(143, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(144, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.13%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(145, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(146, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(147, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.12%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(148, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(149, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(150, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.09%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(151, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(152, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(4).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(153, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(3).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(154, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(155, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.08%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(156, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(157, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07%20(2).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(158, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.07%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(159, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.03.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(160, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.02.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(161, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.02%20(1).jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42'),
(162, 1, 3, 'http://127.0.0.1:8000/uploads/files/galeri/WhatsApp%20Image%202022-03-08%20at%2012.33.01.jpeg', NULL, NULL, NULL, '2022-03-08 08:20:42', '2022-03-08 08:20:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `flag`, `default`, `created_at`, `updated_at`) VALUES
(1, 'Türkçe', 'tr', 'assets/img/tr.png', 1, NULL, NULL),
(3, 'English', 'en', 'assets/img/en.png', NULL, '2022-03-07 09:16:07', '2022-03-07 09:16:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_12_123537_create_posts_table', 1),
(6, '2022_01_12_123917_create_post_details_table', 1),
(7, '2022_01_12_124536_create_modules_table', 1),
(8, '2022_01_12_125806_create_pages_table', 1),
(9, '2022_01_12_125940_create_page_details_table', 1),
(10, '2022_01_12_133829_create_site_settings_table', 1),
(11, '2022_01_12_134242_create_galleries_table', 1),
(12, '2022_01_12_134337_create_gallery_details_table', 1),
(13, '2022_01_12_134637_create_gallery_images_table', 1),
(14, '2022_01_12_135119_create_sliders_table', 1),
(15, '2022_01_12_135233_create_slider_details_table', 1),
(16, '2022_01_12_135310_create_slider_images_table', 1),
(17, '2022_01_12_135647_create_languages_table', 1),
(18, '2022_01_12_141539_create_permission_tables', 1),
(19, '2022_01_15_154023_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `slider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `modules`
--

INSERT INTO `modules` (`id`, `page_id`, `sort_order`, `post_id`, `gallery_id`, `slider_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, NULL, NULL, '2022-03-01 14:12:46', '2022-03-01 14:19:51'),
(3, 4, NULL, 2, NULL, NULL, '2022-03-01 17:02:27', '2022-03-01 17:02:27'),
(10, 5, NULL, 3, NULL, NULL, '2022-03-07 09:55:56', '2022-03-07 09:55:56'),
(11, 3, 0, NULL, NULL, 1, '2022-03-07 11:36:36', '2022-03-08 08:21:45'),
(12, 3, 2, NULL, 1, NULL, '2022-03-08 08:20:53', '2022-03-08 08:21:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `main_menu` int(11) DEFAULT NULL,
  `footer_menu` int(11) DEFAULT NULL,
  `home_page` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `sort_order`, `main_menu`, `footer_menu`, `home_page`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 1, 0, '2022-03-01 14:10:18', '2022-03-07 11:40:32'),
(4, 2, 1, 1, 0, 0, '2022-03-01 17:01:28', '2022-03-07 11:40:40'),
(5, 4, 1, 1, 0, 0, '2022-03-07 09:27:31', '2022-03-07 11:40:46'),
(6, 3, 1, 1, 0, 0, '2022-03-07 11:39:37', '2022-03-07 11:40:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_details`
--

CREATE TABLE `page_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `page_details`
--

INSERT INTO `page_details` (`id`, `page_id`, `language_id`, `slug`, `title`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 'anasayfa', 'Anasayfa', 'Anasayfa', 'Anasayfa', 'Anasayfa', '2022-03-01 14:10:18', '2022-03-01 14:10:18'),
(4, 3, 2, 'homepage', 'Homepage', 'Homepage', 'Homepage', 'Homepage', '2022-03-01 14:10:18', '2022-03-01 14:10:18'),
(5, 4, 1, 'hakkimizda', 'Hakkımızda', 'Hakkımızda', 'Hakkımızda', 'Hakkımızda', '2022-03-01 17:01:28', '2022-03-01 17:01:28'),
(6, 4, 2, 'about-us', 'About-Us', 'About-Us', 'About-Us', 'About-Us', '2022-03-01 17:01:28', '2022-03-01 17:01:28'),
(7, 5, 1, 'iletisim', 'İletişim', 'İletişim', 'İletişim', 'İletişim', '2022-03-07 09:27:31', '2022-03-07 09:27:31'),
(8, 5, 3, 'contact', 'Contact', 'Contact', 'Contact', 'Contact', '2022-03-07 09:27:31', '2022-03-07 09:27:31'),
(9, 4, 3, 'about-us', 'About Us', 'About Us', 'About Us', 'About Us', '2022-03-07 09:33:35', '2022-03-07 09:34:45'),
(10, 3, 3, 'homepage', 'Homepage', 'Homepage', 'Homepage', 'Homepage', '2022-03-07 09:33:55', '2022-03-07 09:34:27'),
(11, 6, 1, 'hizmetlerimiz', 'Hizmetlerimiz', 'Hizmetlerimiz', 'Hizmetlerimiz', 'Hizmetlerimiz', '2022-03-07 11:39:37', '2022-03-07 11:40:27'),
(12, 6, 3, 'our-services', 'Our Services', 'Our Services', 'Our Services', 'Our Services', '2022-03-07 11:39:37', '2022-03-07 11:40:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `module_id`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2022-03-01 14:12:28', '2022-03-01 14:12:28'),
(2, NULL, NULL, '2022-03-01 17:02:15', '2022-03-01 17:02:15'),
(3, NULL, NULL, '2022-03-07 09:55:39', '2022-03-07 09:55:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_details`
--

CREATE TABLE `post_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `post_details`
--

INSERT INTO `post_details` (`id`, `post_id`, `language_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anasayfa', '<h2>Lorem Ipsum Nedir?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n\r\n<h2>Nereden Gelir?</h2>\r\n\r\n<p>Yaygın inancın tersine, Lorem Ipsum rastgele s&ouml;zc&uuml;klerden oluşmaz. K&ouml;kleri M.&Ouml;. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir ge&ccedil;mişi vardır. Virginia&#39;daki Hampden-Sydney College&#39;dan Latince profes&ouml;r&uuml; Richard McClintock, bir Lorem Ipsum pasajında ge&ccedil;en ve anlaşılması en g&uuml;&ccedil; s&ouml;zc&uuml;klerden biri olan &#39;consectetur&#39; s&ouml;zc&uuml;ğ&uuml;n&uuml;n klasik edebiyattaki &ouml;rneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, &Ccedil;i&ccedil;ero tarafından M.&Ouml;. 45 tarihinde kaleme alınan &quot;de Finibus Bonorum et Malorum&quot; (İyi ve K&ouml;t&uuml;n&uuml;n U&ccedil; Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı b&ouml;l&uuml;mlerinden gelmektedir. Bu kitap, ahlak kuramı &uuml;zerine bir tezdir ve R&ouml;nesans d&ouml;neminde &ccedil;ok pop&uuml;ler olmuştur. Lorem Ipsum pasajının ilk satırı olan &quot;Lorem ipsum dolor sit amet&quot; 1.10.32 sayılı b&ouml;l&uuml;mdeki bir satırdan gelmektedir.</p>\r\n\r\n<p>1500&#39;lerden beri kullanılmakta olan standard Lorem Ipsum metinleri ilgilenenler i&ccedil;in yeniden &uuml;retilmiştir. &Ccedil;i&ccedil;ero tarafından yazılan 1.10.32 ve 1.10.33 b&ouml;l&uuml;mleri de 1914 H. Rackham &ccedil;evirisinden alınan İngilizce s&uuml;r&uuml;mleri eşliğinde &ouml;zg&uuml;n bi&ccedil;iminden yeniden &uuml;retilmiştir.</p>', '2022-03-01 14:12:28', '2022-03-01 14:12:28'),
(2, 1, 2, 'Homepage', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-03-01 14:12:28', '2022-03-01 14:12:28'),
(3, 2, 1, 'Hakkımızda', '<p>Hakkımızda</p>', '2022-03-01 17:02:15', '2022-03-01 17:02:15'),
(4, 2, 2, 'About-Us', '<p>About-Us</p>', '2022-03-01 17:02:15', '2022-03-01 17:02:15'),
(5, 2, 3, 'About Us', '<p>About Us</p>', '2022-03-07 09:32:38', '2022-03-07 09:32:55'),
(6, 1, 3, 'Homepage', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-03-07 09:36:37', '2022-03-07 09:55:09'),
(7, 3, 1, 'İletişim', '<ul>\r\n	<li>\r\n	<p>Gensa Yalıtım Buca/İzmir</p>\r\n	</li>\r\n</ul>', '2022-03-07 09:55:39', '2022-03-07 09:55:39'),
(8, 3, 3, 'Contact', '<ul>\r\n	<li>\r\n	<p>Gensa Yalıtım Buca/İzmir</p>\r\n	</li>\r\n</ul>', '2022-03-07 09:55:39', '2022-03-07 09:55:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-03-01 13:59:53', '2022-03-01 13:59:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_left_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_center_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_left_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_center_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_menu_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `site_settings`
--

INSERT INTO `site_settings` (`id`, `language_id`, `meta_title`, `meta_keywords`, `meta_description`, `facebook`, `twitter`, `instagram`, `google`, `whatsapp`, `address`, `phone`, `gsm`, `fax`, `email`, `footer_left_content`, `footer_center_content`, `footer_left_title`, `footer_center_title`, `footer_menu_title`, `site_logo`, `created_at`, `updated_at`, `favicon`) VALUES
(1, 1, NULL, NULL, NULL, 'https://www.facebook.com/Sayfa.Kurucusu.EmrahPARLAR/', NULL, NULL, NULL, NULL, 'Gensa Yalıtım Buca/İzmir', NULL, NULL, NULL, NULL, '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır.&nbsp;</p>', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır.</p>', NULL, NULL, NULL, 'http://127.0.0.1:8000/uploads/files/logo%20(1).png', NULL, '2022-03-08 09:01:49', 'http://127.0.0.1:8000/uploads/files/fav.png'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gensa Yalıtım Buca/İzmir', NULL, NULL, NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', NULL, NULL, NULL, 'http://127.0.0.1:8000/uploads/files/logo%20(1).png', NULL, '2022-03-07 08:47:22', ''),
(3, 3, 'Site Meta Title', NULL, NULL, 'https://www.facebook.com/Sayfa.Kurucusu.EmrahPARLAR/', NULL, NULL, NULL, NULL, 'Gensa Yalıtım Buca/İzmir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://127.0.0.1:8000/uploads/files/logo%20(1).png', '2022-03-07 09:35:24', '2022-03-08 09:01:49', 'http://127.0.0.1:8000/uploads/files/fav.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-03-01 14:19:21', '2022-03-01 14:19:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_details`
--

CREATE TABLE `slider_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `slider_details`
--

INSERT INTO `slider_details` (`id`, `slider_id`, `language_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anasayfa Slayt', 'Anasayfa Slayt', '2022-03-01 14:19:21', '2022-03-01 14:19:21'),
(2, 1, 2, 'Homepage Slider', 'Homepage Slider', '2022-03-01 14:19:21', '2022-03-01 14:19:21'),
(3, 1, 3, NULL, NULL, '2022-03-07 09:35:04', '2022-03-07 09:35:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `slider_images`
--

INSERT INTO `slider_images` (`id`, `slider_id`, `language_id`, `src`, `title`, `description`, `link`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide1.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(14, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide2.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(15, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide3.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(16, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide4.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(17, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide5.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(18, 1, 1, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide6.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(19, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide1.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(20, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide2.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(21, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide3.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(22, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide4.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(23, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide5.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30'),
(24, 1, 3, 'http://127.0.0.1:8000/uploads/files/slaytlar/slide6.jpg', NULL, NULL, NULL, '2022-03-08 07:08:30', '2022-03-08 07:08:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sencerhan', 'admin@admin.com', NULL, '$2y$10$QCc/IoRryTS/8d.o7GsRR.19djZIpMTHwwXL3H/wS3ZY2MQOPggKe', NULL, '2022-03-01 13:23:28', '2022-03-01 13:23:28');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_details`
--
ALTER TABLE `gallery_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_details`
--
ALTER TABLE `page_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider_details`
--
ALTER TABLE `slider_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_details`
--
ALTER TABLE `gallery_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Tablo için AUTO_INCREMENT değeri `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `page_details`
--
ALTER TABLE `page_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `post_details`
--
ALTER TABLE `post_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider_details`
--
ALTER TABLE `slider_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
