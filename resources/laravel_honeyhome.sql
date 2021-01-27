-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 04:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_honeyhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Interior Design', 'interior-design', 'Published', '2021-01-20 10:40:26', '2021-01-22 08:42:11'),
(5, 'Home Building', 'home-building', 'Published', '2021-01-20 10:40:32', '2021-01-22 08:41:56'),
(6, 'Work Planing', 'work-planing', 'Published', '2021-01-20 10:40:41', '2021-01-22 08:41:37'),
(7, 'Architecture', 'architecture', 'Published', '2021-01-22 08:42:26', '2021-01-22 08:42:26'),
(8, 'Renovation', 'renovation', 'Published', '2021-01-22 08:42:37', '2021-01-22 08:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(12, 5, 7, NULL, NULL),
(19, 4, 8, NULL, NULL),
(20, 6, 8, NULL, NULL),
(21, 6, 9, NULL, NULL),
(22, 7, 9, NULL, NULL),
(23, 6, 10, NULL, NULL),
(24, 7, 10, NULL, NULL),
(25, 4, 11, NULL, NULL),
(26, 8, 11, NULL, NULL),
(27, 5, 12, NULL, NULL),
(28, 8, 12, NULL, NULL);

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
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sliders` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_setup` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Projects` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Testimonials` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Clients` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contact_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `sliders`, `home_setup`, `services`, `about_us`, `Projects`, `prices`, `Testimonials`, `Clients`, `Contact_us`, `created_at`, `updated_at`) VALUES
(1, '{\"slider\":[{\"slide_code\":\"2487\",\"title\":\"ARCHITECTURE\",\"sub_title\":\"Lorem Ipsum has been the industry\'s standard dummy text ever since, when unknown printer\",\"btn_text\":\"Read More\",\"btn_link\":\"facebook\",\"photo\":\"\"},{\"slide_code\":\"3905\",\"title\":\"PLANING\",\"sub_title\":\"Lorem Ipsum has been the industry\'s standard dummy text ever since, when unknown printer\",\"btn_text\":\"Read More\",\"btn_link\":\"facebook\",\"photo\":\"\"},{\"slide_code\":\"2980\",\"title\":\"Laravel\",\"sub_title\":\"fyre  nhguthr bihruthrt\",\"btn_text\":\"Read More\",\"btn_link\":\"#\",\"photo\":\"\"}]}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-26 12:35:04');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_01_19_142836_create_categories_table', 2),
(11, '2021_01_20_035640_create_tags_table', 3),
(13, '2021_01_20_045824_create_posts_table', 4),
(14, '2021_01_20_145530_create_category_post_table', 5),
(15, '2021_01_24_014529_create_settings_table', 6),
(16, '2021_01_24_083844_create_home_pages_table', 7);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feat_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Uncategorized',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `content`, `feat_img`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'CONSTRUCTION', 'construction', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut pretium sem, et tincidunt quam. Suspendisse ac felis quam. Praesent vulputate odio vel viverra ultrices. Cras porta dictum tempor. Quisque sit amet lacus erat. Aliquam erat volutpat. Cras ultrices vitae arcu a euismod. Suspendisse est risus, varius in pellentesque vel, posuere at nibh. Aliquam sed tellus sed odio blandit varius. Quisque hendrerit cursus iaculis.</p>', 'b8b04298cf539e8b72c0d0e9082117c3.jpg', 'Uncategorized', 'Published', '2021-01-22 08:36:44', '2021-01-22 08:47:30'),
(9, 'DESIGN', 'design', 1, '<p><span style=\"background-color:#ffffff; color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px\">Nulla euismod aliquam enim a blandit. Fusce et arcu augue. Sed venenatis congue diam ac aliquet. Praesent sit amet nibh rutrum tortor tincidunt efficitur. Donec bibendum justo felis, ut lacinia justo scelerisque nec. Vivamus id accumsan quam. Ut ac purus placerat, sagittis sem quis, feugiat ante. Duis ullamcorper ipsum ac mi malesuada maximus</span></p>', 'd2b51a8e5f0e1f3ce8d47bd67de030ee.jpg', 'Uncategorized', 'Published', '2021-01-22 08:48:01', '2021-01-22 08:48:01'),
(10, 'PLANING', 'planing', 1, '<p><span style=\"background-color:#ffffff; color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px\">Aliquam erat sem, interdum ut sapien in, sagittis ullamcorper tellus. Duis vitae dapibus ex. Donec varius dignissim nunc vel tristique. Nulla volutpat molestie est a maximus. Nullam euismod ultrices erat, nec pretium metus pretium in. Nullam at arcu eget orci pulvinar elementum quis at enim. Etiam eros libero, efficitur at pretium sed, vulputate in urna. Ut sed sagittis odio, at euismod mi. Pellentesque condimentum arcu eu nisl porta, a sodales nibh lacinia. Morbi facilisis viverra fringilla. Morbi eleifend, tortor id maximus maximus, dui diam tincidunt odio, sed rhoncus libero purus sit amet tellus. Donec in felis auctor, facilisis risus et, ultrices neque. Phasellus id bibendum lectus. Aenean id porttitor ipsum.</span></p>', '45655572cb2372eb0e12056da29ab2fc.jpg', 'Uncategorized', 'Published', '2021-01-22 08:48:42', '2021-01-22 08:48:42'),
(11, 'ARCHITECTURE', 'architecture', 1, '<p><span style=\"background-color:#ffffff; color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px\">Aliquam erat sem, interdum ut sapien in, sagittis ullamcorper tellus. Duis vitae dapibus ex. Donec varius dignissim nunc vel tristique. Nulla volutpat molestie est a maximus. Nullam euismod ultrices erat, nec pretium metus pretium in. Nullam at arcu eget orci pulvinar elementum quis at enim. Etiam eros libero, efficitur at pretium sed, vulputate in urna. Ut sed sagittis odio, at euismod mi. Pellentesque condimentum arcu eu nisl porta, a sodales nibh lacinia. Morbi facilisis viverra fringilla. Morbi eleifend, tortor id maximus maximus, dui diam tincidunt odio, sed rhoncus libero purus sit amet tellus. Donec in felis auctor, facilisis risus et, ultrices neque. Phasellus id bibendum lectus. Aenean id porttitor ipsum.</span></p>', '5ef5c12e3db7a1b078f1298d8e1701f0.jpg', 'Uncategorized', 'Published', '2021-01-22 08:49:09', '2021-01-22 08:49:09'),
(12, 'MANAGEMENT', 'management', 1, '<p><span style=\"background-color:#ffffff; color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px\">Cras fringilla odio sit amet convallis ultrices. Sed vel neque ultricies, ultricies erat eu, euismod est. Vestibulum neque ipsum, dignissim eu dignissim ac, mollis eu felis. Phasellus malesuada nunc a dolor condimentum pellentesque. In et tellus in enim iaculis fringilla sed in nulla. Mauris ac pellentesque est, at cursus tortor. Ut ullamcorper neque felis, eget luctus augue posuere ut. Vivamus risus erat, lacinia ac sem a, maximus rutrum tellus. Quisque suscipit odio quis dignissim mollis. Suspendisse potenti. Morbi a nunc ante. In blandit cursus est, eu lobortis arcu varius nec. Nam at facilisis mi.</span></p>', '34ab252e64ee409835e6e979b6baf5b3.jpg', 'Uncategorized', 'Published', '2021-01-22 08:49:42', '2021-01-22 08:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '105px',
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '60px',
  `slider` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '©Copyright 2016. All rights reserved by',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo_name`, `width`, `height`, `slider`, `social`, `clients`, `crt`, `created_at`, `updated_at`) VALUES
(1, '4a079d1b07aaa7be736867f354a41fa5.png', '105px', '60px', NULL, '{\"fb\":\"https:\\/\\/www.facebook.com\\/\",\"tw\":\"https:\\/\\/www.facebook.com\\/\",\"link\":\"https:\\/\\/www.facebook.com\\/\",\"inst\":\"https:\\/\\/www.facebook.com\\/\",\"drib\":\"https:\\/\\/www.facebook.com\\/\",\"yout\":\"https:\\/\\/www.facebook.com\\/\"}', NULL, '©Copyright 2016. All rights reserved by', NULL, '2021-01-24 00:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Planing', 'planing', 'Published', '2021-01-21 02:03:17', '2021-01-22 08:44:36'),
(4, 'Fixing', 'fixing', 'Published', '2021-01-22 08:44:47', '2021-01-22 08:44:47'),
(5, 'Design', 'design', 'Published', '2021-01-22 08:44:57', '2021-01-22 08:44:57'),
(6, 'Tips', 'tips', 'Published', '2021-01-22 08:45:06', '2021-01-22 08:45:06'),
(7, 'Architecture', 'architecture', 'Published', '2021-01-22 08:45:17', '2021-01-22 08:45:17'),
(8, 'Building', 'building', 'Published', '2021-01-22 08:45:26', '2021-01-22 08:45:26'),
(9, 'Constructin', 'constructin', 'Published', '2021-01-22 08:45:39', '2021-01-22 08:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ruhul',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `roll_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Ruhul Amin', 1, 'ruhul', 'ruhul_amin@gmail.com', NULL, '$2y$10$PQN8mtM3yMpTDYLuee/L..xcLOqgTRJUoPRObHVPQlal6H8CN68v2', NULL, '2021-01-19 02:18:04', '2021-01-19 02:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
