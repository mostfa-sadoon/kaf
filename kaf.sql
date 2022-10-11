-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 01:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadimicyears`
--

CREATE TABLE `acadimicyears` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acadimicyears`
--

INSERT INTO `acadimicyears` (`id`, `created_at`, `updated_at`) VALUES
(6, '2022-10-05 10:21:19', '2022-10-05 10:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `acadimicyearstranslations`
--

CREATE TABLE `acadimicyearstranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `acadimicyear_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acadimicyearstranslations`
--

INSERT INTO `acadimicyearstranslations` (`id`, `acadimicyear_id`, `locale`, `name`) VALUES
(9, 6, 'en', 'grade one'),
(10, 6, 'ar', 'العام الاول ff');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT 3,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `national_id`, `Bank_account_number`, `usertype`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'tawajood', 'mostafa_sadoon', 'admin@app.com', '05523552846', '$2y$10$Ero7.X/xpxxSnJ.aXKIxDeHFNxl6PNBnqZVjbQc0kj45x1RXSE7dG', '165416523', '654512', 3, NULL, '2022-10-04 06:32:47', '2022-10-04 06:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategories`
--

CREATE TABLE `bookcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookcategories`
--

INSERT INTO `bookcategories` (`id`, `created_at`, `updated_at`) VALUES
(3, '2022-10-06 14:52:32', '2022-10-06 14:52:32'),
(4, '2022-10-06 14:52:49', '2022-10-06 14:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategorytranslations`
--

CREATE TABLE `bookcategorytranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `bookcategory_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookcategorytranslations`
--

INSERT INTO `bookcategorytranslations` (`id`, `bookcategory_id`, `locale`, `name`) VALUES
(3, 3, 'en', 'Arts'),
(4, 3, 'ar', 'فني'),
(5, 4, 'en', 'hostorica'),
(6, 4, 'ar', 'تاريخي');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','certificied') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `bookcategory_id` int(10) UNSIGNED NOT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL,
  `fileextension_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `acadimicyear_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `owner_type`, `owner_id`, `file`, `img`, `status`, `price`, `price_id`, `bookcategory_id`, `classe_id`, `fileextension_id`, `subject_id`, `semester_id`, `acadimicyear_id`, `created_at`, `updated_at`) VALUES
(1, 'الامتحان', 'App\\Models\\Admin', '1', 'file_1665094687.pdf', 'file_1665094687.jpg', 'new', NULL, 3, 3, 7, 1, 11, 12, NULL, '2022-10-06 20:18:07', '2022-10-06 20:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `created_at`, `updated_at`) VALUES
(7, '2022-10-05 11:18:29', '2022-10-05 11:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `classestranslations`
--

CREATE TABLE `classestranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classestranslations`
--

INSERT INTO `classestranslations` (`id`, `classe_id`, `locale`, `name`) VALUES
(9, 7, 'en', 'grade one'),
(10, 7, 'ar', 'الصف الاول');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fileextensions`
--

CREATE TABLE `fileextensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fileextensions`
--

INSERT INTO `fileextensions` (`id`, `name`) VALUES
(1, 'pdf'),
(2, 'word');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_02_110009_create_admins_table', 1),
(6, '2022_10_02_133547_usertype', 1),
(11, '2014_10_12_000000_create_users_table', 3),
(12, '2022_09_28_130555_teacher', 3),
(16, '2022_10_04_124653_subject', 4),
(17, '2022_10_05_080122_classes', 4),
(18, '2022_10_05_080211_semesters', 4),
(19, '2022_10_05_080310_acadimicyears', 4),
(20, '2022_10_05_084539_acadimicyearstranslations', 4),
(25, '2022_10_05_084613_classestranslations', 7),
(26, '2022_10_05_084601_semesterstranslations', 8),
(27, '2022_10_05_084932_subjecttranslation', 9),
(30, '2022_10_06_130128_bookcategory', 10),
(31, '2022_10_06_130137_bookcategorytranslations', 10),
(32, '2022_10_06_150957_fileextension', 11),
(42, '2022_09_28_132908_pricesettings', 12),
(44, '2022_10_06_151510_pricesettingstranslation', 12),
(49, '2022_09_28_134044_books', 13);

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
-- Table structure for table `pricesettings`
--

CREATE TABLE `pricesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricesettings`
--

INSERT INTO `pricesettings` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, '2022-10-06 15:26:05', NULL),
(2, NULL, '2022-10-06 15:26:05', NULL),
(3, 15, '2022-10-06 15:26:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricesettingtranslations`
--

CREATE TABLE `pricesettingtranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `pricesetting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricesettingtranslations`
--

INSERT INTO `pricesettingtranslations` (`id`, `pricesetting_id`, `locale`, `name`) VALUES
(1, 1, 'ar', 'مجانا'),
(2, 2, 'ar', ' سعر مقيد الرجاء التواصل مع الإدارة\r\n'),
(3, 3, 'ar', 'ريال');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `created_at`, `updated_at`) VALUES
(12, '2022-10-05 11:23:10', '2022-10-05 11:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `semestertranslations`
--

CREATE TABLE `semestertranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestertranslations`
--

INSERT INTO `semestertranslations` (`id`, `semester_id`, `locale`, `name`) VALUES
(9, 12, 'en', 'first year'),
(10, 12, 'ar', 'الفصل الدراسي الاول');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `created_at`, `updated_at`) VALUES
(11, NULL, NULL),
(13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjecttranslations`
--

CREATE TABLE `subjecttranslations` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjecttranslations`
--

INSERT INTO `subjecttranslations` (`id`, `subject_id`, `locale`, `name`) VALUES
(7, 11, 'ar', 'لغه عربيه'),
(8, 11, 'en', 'arabic'),
(11, 13, 'en', 'English'),
(12, 13, 'ar', 'لغه انجليزيه');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_id` tinyint(1) DEFAULT NULL COMMENT '0 for android, 1 for ios',
  `usertype` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `national_id`, `Bank_account_number`, `photo`, `fcm_token`, `mobile_id`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'محمد', 'احمد', 'moGgstfa_sadoon', 'vfdevd@gmail.com', NULL, '$2y$10$wUfTzMSpSi6BQBgID7cVw.dcWljpX0NwoClmgdtR0f82wjrznmX.6', '57852', '2727427257', NULL, NULL, NULL, 2, '2022-10-05 11:48:49', '2022-10-05 11:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT 1,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_id` tinyint(1) DEFAULT NULL COMMENT '0 for android, 1 for ios',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'طالب', NULL, NULL),
(2, 'معلم', NULL, NULL),
(3, 'مدير', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadimicyears`
--
ALTER TABLE `acadimicyears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acadimicyearstranslations`
--
ALTER TABLE `acadimicyearstranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acadimicyearstranslations_acadimicyear_id_locale_unique` (`acadimicyear_id`,`locale`),
  ADD KEY `acadimicyearstranslations_locale_index` (`locale`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_bank_account_number_unique` (`Bank_account_number`);

--
-- Indexes for table `bookcategories`
--
ALTER TABLE `bookcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcategorytranslations`
--
ALTER TABLE `bookcategorytranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookcategorytranslations_bookcategory_id_locale_unique` (`bookcategory_id`,`locale`),
  ADD KEY `bookcategorytranslations_locale_index` (`locale`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_file_unique` (`file`),
  ADD UNIQUE KEY `books_img_unique` (`img`),
  ADD KEY `books_price_id_foreign` (`price_id`),
  ADD KEY `books_bookcategory_id_foreign` (`bookcategory_id`),
  ADD KEY `books_classe_id_foreign` (`classe_id`),
  ADD KEY `books_fileextension_id_foreign` (`fileextension_id`),
  ADD KEY `books_subject_id_foreign` (`subject_id`),
  ADD KEY `books_semester_id_foreign` (`semester_id`),
  ADD KEY `books_acadimicyear_id_foreign` (`acadimicyear_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classestranslations`
--
ALTER TABLE `classestranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classestranslations_classe_id_locale_unique` (`classe_id`,`locale`),
  ADD KEY `classestranslations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileextensions`
--
ALTER TABLE `fileextensions`
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
-- Indexes for table `pricesettings`
--
ALTER TABLE `pricesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricesettingtranslations`
--
ALTER TABLE `pricesettingtranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pricesettingtranslations_pricesetting_id_locale_unique` (`pricesetting_id`,`locale`),
  ADD KEY `pricesettingtranslations_locale_index` (`locale`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestertranslations`
--
ALTER TABLE `semestertranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semestertranslations_semester_id_locale_unique` (`semester_id`,`locale`),
  ADD KEY `semestertranslations_locale_index` (`locale`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjecttranslations`
--
ALTER TABLE `subjecttranslations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjecttranslations_subject_id_locale_unique` (`subject_id`,`locale`),
  ADD KEY `subjecttranslations_locale_index` (`locale`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_username_unique` (`username`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`),
  ADD UNIQUE KEY `teachers_bank_account_number_unique` (`Bank_account_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_bank_account_number_unique` (`Bank_account_number`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acadimicyears`
--
ALTER TABLE `acadimicyears`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `acadimicyearstranslations`
--
ALTER TABLE `acadimicyearstranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookcategories`
--
ALTER TABLE `bookcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookcategorytranslations`
--
ALTER TABLE `bookcategorytranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classestranslations`
--
ALTER TABLE `classestranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileextensions`
--
ALTER TABLE `fileextensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pricesettings`
--
ALTER TABLE `pricesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricesettingtranslations`
--
ALTER TABLE `pricesettingtranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semestertranslations`
--
ALTER TABLE `semestertranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjecttranslations`
--
ALTER TABLE `subjecttranslations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acadimicyearstranslations`
--
ALTER TABLE `acadimicyearstranslations`
  ADD CONSTRAINT `acadimicyearstranslations_acadimicyear_id_foreign` FOREIGN KEY (`acadimicyear_id`) REFERENCES `acadimicyears` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookcategorytranslations`
--
ALTER TABLE `bookcategorytranslations`
  ADD CONSTRAINT `bookcategorytranslations_bookcategory_id_foreign` FOREIGN KEY (`bookcategory_id`) REFERENCES `bookcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_acadimicyear_id_foreign` FOREIGN KEY (`acadimicyear_id`) REFERENCES `acadimicyears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_bookcategory_id_foreign` FOREIGN KEY (`bookcategory_id`) REFERENCES `bookcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_fileextension_id_foreign` FOREIGN KEY (`fileextension_id`) REFERENCES `fileextensions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `pricesettings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classestranslations`
--
ALTER TABLE `classestranslations`
  ADD CONSTRAINT `classestranslations_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pricesettingtranslations`
--
ALTER TABLE `pricesettingtranslations`
  ADD CONSTRAINT `pricesettingtranslations_pricesetting_id_foreign` FOREIGN KEY (`pricesetting_id`) REFERENCES `pricesettings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semestertranslations`
--
ALTER TABLE `semestertranslations`
  ADD CONSTRAINT `semestertranslations_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjecttranslations`
--
ALTER TABLE `subjecttranslations`
  ADD CONSTRAINT `subjecttranslations_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
