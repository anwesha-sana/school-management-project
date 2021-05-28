-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 05:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(6, 18, NULL, 5, 3, 2, 1, '2021-05-22 16:30:44', '2021-05-24 08:45:03'),
(7, 19, NULL, 5, 3, 2, 1, '2021-05-22 16:51:43', '2021-05-22 16:51:43'),
(8, 20, 1, 6, 4, 1, 1, '2021-05-22 19:01:42', '2021-05-22 19:01:42'),
(9, 20, NULL, 7, 6, 1, 1, '2021-05-24 18:41:21', '2021-05-24 18:41:21'),
(10, 18, NULL, 6, 4, 2, 1, '2021-05-24 18:42:25', '2021-05-24 18:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` varchar(255) NOT NULL,
  `pass_mark` varchar(255) NOT NULL,
  `subjective_mark` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(3, 5, 2, '100', '30', '100', '2021-05-18 18:49:08', '2021-05-18 18:49:08'),
(4, 5, 3, '100', '30', '100', '2021-05-18 18:49:08', '2021-05-18 18:49:08'),
(5, 6, 1, '100', '30', '100', '2021-05-18 18:50:49', '2021-05-18 18:50:49'),
(6, 6, 2, '100', '30', '50', '2021-05-18 18:50:49', '2021-05-18 18:50:49'),
(7, 6, 3, '100', '30', '100', '2021-05-18 18:50:49', '2021-05-18 18:50:49'),
(8, 6, 4, '100', '30', '100', '2021-05-18 18:50:49', '2021-05-18 18:50:49'),
(14, 4, 1, '90', '30', '50', '2021-05-20 04:12:52', '2021-05-20 04:12:52'),
(15, 4, 2, '80', '30', '55', '2021-05-20 04:12:52', '2021-05-20 04:12:52'),
(16, 4, 4, '100', '30', '100', '2021-05-20 04:12:52', '2021-05-20 04:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', '2021-05-20 17:17:06', '2021-05-20 17:20:13'),
(2, 'Assistant Teacher', '2021-05-20 17:17:23', '2021-05-20 17:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` int(11) NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 200, '2021-05-22 16:30:44', '2021-05-22 16:30:44'),
(2, 7, 1, 11, '2021-05-22 16:51:43', '2021-05-22 16:51:43'),
(3, 8, 1, 1000, '2021-05-22 19:01:42', '2021-05-23 14:03:12'),
(4, 9, 1, 1000, '2021-05-24 18:41:21', '2021-05-24 18:41:21'),
(5, 10, 1, 200, '2021-05-24 18:42:25', '2021-05-24 18:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', '2021-05-16 14:16:35', '2021-05-16 14:29:03'),
(2, '2nd Semester', '2021-05-16 14:16:54', '2021-05-16 14:16:54'),
(3, '3rd  Semester', '2021-05-16 14:17:10', '2021-05-16 14:17:10'),
(5, '4th Semester', '2021-05-16 14:47:26', '2021-05-16 14:47:26'),
(6, '5th Sem', '2021-05-16 17:41:08', '2021-05-16 17:41:20');

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
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fees', '2021-05-13 17:43:03', '2021-05-13 18:33:46'),
(3, 'Hostel Fee', '2021-05-13 18:35:13', '2021-05-13 18:36:24'),
(4, 'Transport Fee', '2021-05-13 18:38:05', '2021-05-13 18:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 100, '2021-05-15 16:32:22', '2021-05-15 16:32:22'),
(4, 4, 4, 111, '2021-05-15 16:32:58', '2021-05-15 16:32:58'),
(5, 4, 5, 122, '2021-05-15 16:32:58', '2021-05-15 16:32:58'),
(6, 4, 6, 150, '2021-05-15 16:32:58', '2021-05-15 16:32:58'),
(7, 1, 4, 1111, '2021-05-15 16:35:51', '2021-05-15 16:35:51'),
(8, 1, 5, 111, '2021-05-15 16:35:51', '2021-05-15 16:35:51'),
(9, 1, 4, 100, '2021-05-16 06:29:52', '2021-05-16 06:29:52'),
(10, 1, 4, 1111, '2021-05-16 06:29:52', '2021-05-16 06:29:52'),
(11, 1, 5, 111, '2021-05-16 06:29:52', '2021-05-16 06:29:52'),
(12, 1, 6, 400, '2021-05-16 06:29:52', '2021-05-16 06:29:52'),
(16, 3, 4, 120, '2021-05-16 08:05:37', '2021-05-16 08:05:37'),
(17, 3, 5, 134, '2021-05-16 08:05:37', '2021-05-16 08:05:37');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_08_171600_create_sessions_table', 1);

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
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', '2021-05-18 13:24:07', '2021-05-18 13:56:26'),
(2, 'Physics', '2021-05-18 13:24:19', '2021-05-18 13:24:19'),
(3, 'Chemistry', '2021-05-18 13:24:30', '2021-05-18 13:24:30'),
(4, 'English', '2021-05-18 13:24:53', '2021-05-18 13:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nkh5Y4Q0lSC0BEotAkDlKVZOdH97zjQL8wO1pBHX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYWZBUEJNcG9iMUFtd0pmQ3IzREsyZDhndnJuRDk2VGY4S09JSG5zcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHJ4N1dHLkxKendXSEViLkVBZXpPU3UvRU14RkxRNktqODhvbVZXSUpJTGV1Lnp6azRRaGRHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRyeDdXRy5MSnp3V0hFYi5FQWV6T1N1L0VNeEZMUTZLajg4b21WV0lKSUxldS56ems0UWhkRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9yZWdpc3RyYXRpb24vZmVlL3ZpZXciO319', 1622192860),
('QX6hh7IUtSDIndMKa7ZbgfKf6BFuaMmDY49Pdu5V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMUVuZ3VPekowME1LSXhTS3kxVmlENjFUQThtUHRvRHdkcHFWMDQwdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9yZWdpc3RyYXRpb24vZmVlL3ZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkcng3V0cuTEp6d1dIRWIuRUFlek9TdS9FTXhGTFE2S2o4OG9tVldJSklMZXUuenprNFFoZEciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHJ4N1dHLkxKendXSEViLkVBZXpPU3UvRU14RkxRNktqODhvbVZXSUpJTGV1Lnp6azRRaGRHIjt9', 1622215272);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Class one', '2021-05-13 06:03:17', '2021-05-13 06:09:18'),
(5, 'Class two', '2021-05-13 06:09:33', '2021-05-13 06:09:33'),
(6, 'Class three', '2021-05-13 06:10:57', '2021-05-13 06:10:57'),
(7, 'Class Four', '2021-05-24 18:41:03', '2021-05-24 18:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2021-05-13 13:25:35', '2021-05-13 13:25:35'),
(2, 'Arts', '2021-05-13 14:14:45', '2021-05-13 14:14:45'),
(4, 'Commerce', '2021-05-13 14:16:46', '2021-05-13 14:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Day', '2021-05-13 14:49:12', '2021-05-13 14:52:23'),
(2, 'Morning', '2021-05-13 14:49:31', '2021-05-13 14:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2011', '2021-05-13 08:30:52', '2021-05-13 12:25:43'),
(3, '2012', '2021-05-13 12:18:34', '2021-05-13 12:18:34'),
(4, '2013', '2021-05-13 12:25:53', '2021-05-13 12:25:53'),
(6, '2014', '2021-05-24 18:40:49', '2021-05-24 18:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=inactive, 1= active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '9007086217', 'kolkata', 'male', '1620796895download.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 0, NULL, '$2y$10$rx7WG.LJzwWHEb.EAezOSu/EMxFLQ6Kj88omVWIJILeu.zzk4QhdG', NULL, NULL, NULL, NULL, 'profile-photos/PIXri9IQzVqlCVPBcmy4UeOkOYGwiXGYeKWsvl36.jpg', '2021-05-08 11:56:40', '2021-05-12 01:32:32'),
(2, 'User', 'Anwesha dutta', 'anwesha.dutta@gmail.com', '98098787671222', 'Howrahavcx', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 0, NULL, '$2y$10$37jR/NUOIuIyESL4la5zgeo3C7gSX2.gdVqYpMNOkmy4Q075uFFPW', NULL, NULL, NULL, NULL, NULL, '2021-05-10 07:09:27', '2021-05-11 13:35:17'),
(8, 'Admin', 'Subhajit pal', 'subhajit@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 0, NULL, '$2y$10$19C.YFExwC.4EzYOQqszMe2RdHzmJ1PlDNBBehXupPZ/cf5U85yCK', NULL, NULL, NULL, NULL, NULL, '2021-05-10 12:50:58', '2021-05-10 12:51:17'),
(9, 'Admin', 'sana', 'sana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8536', 'Operator', NULL, NULL, NULL, 1, NULL, '$2y$10$NTuiQgO3JgQYxRrd65xzo.cRfy6hePx/ZSo4XMVvjKimx7w/6tQpq', NULL, NULL, NULL, NULL, NULL, '2021-05-21 12:10:50', '2021-05-21 12:10:50'),
(12, 'Admin', 'sana', 'sana2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8536', 'Operator', NULL, NULL, NULL, 1, NULL, '$2y$10$NTuiQgO3JgQYxRrd65xzo.cRfy6hePx/ZSo4XMVvjKimx7w/6tQpq', NULL, NULL, NULL, NULL, NULL, '2021-05-21 12:10:50', '2021-05-21 12:10:50'),
(18, 'student', 'Smriti Dey', 'sm@pixelsolutionz.com', '1234567890', 'Howrah', 'Female', '1621845903thumb-1920-344761.jpg', 'Anup Dey', 'Maya Dey', 'Hindu', 20110001, '2003-01-22', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$46F1LofEtbkAuUeD1EFZauA.UxpfWHOcPMDmuWanAAetGc58K3Wu.', NULL, NULL, NULL, NULL, NULL, '2021-05-22 11:00:44', '2021-05-24 03:15:03'),
(19, 'student', 'Abir', NULL, '5656789999', 'kolkata', 'Male', '1621702303stu.jpg', 'Atunu', 'Mala', 'Hindu', 20120019, '2017-06-06', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$lO1qLfImtPKBbo3VT/Ylk.mFTXGthy0kHg/vJDXzQZefbp/7sSob.', NULL, NULL, NULL, NULL, NULL, '2021-05-22 11:21:43', '2021-05-22 11:21:43'),
(20, 'student', 'Sonali pal', NULL, '9007086200', 'Kestopur', 'Male', '1621710102student.jpg', 'Subhajit pal', 'Anwesha Pal', 'Hindu', 20130020, '2010-06-01', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$lLJuOfS5w/8iyGBAqSEtpe/4ozT7enUiaNq1Qb/XiGweSALOJf8w.', NULL, NULL, NULL, NULL, NULL, '2021-05-22 13:31:42', '2021-05-23 08:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
