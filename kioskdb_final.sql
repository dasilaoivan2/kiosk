-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 05:23 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kioskdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Junel Jig G. Jimenez', 'juneljigjimenez@gmail.com', '$2y$10$lV8zDxNbUdLczu//MNLNTeBTSNho1vEUBbzB33w6t8wsjVL4unQSG', 0, NULL, '2019-12-12 00:31:11', '2019-12-12 00:31:11'),
(2, 'Ivan Dasilao', 'dasilaoivan2@gmail.com', '$2y$10$Bq2GP72.JOHily2Azal8zOR0Be2W4movUS4BQl/jTDrV3psa7WwYy', 0, NULL, '2019-12-12 00:31:11', '2019-12-12 00:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AGUSAN CANYON', NULL, NULL),
(2, 'ALAE', NULL, NULL),
(3, 'DAHILAYAN', NULL, NULL),
(4, 'DALIRIG', NULL, NULL),
(5, 'DAMILAG', NULL, NULL),
(6, 'DICKLUM', NULL, NULL),
(7, 'GUILANG-GUILANG', NULL, NULL),
(8, 'KALUGMANAN', NULL, NULL),
(9, 'LINDABAN', NULL, NULL),
(10, 'LINGION', NULL, NULL),
(11, 'LUNOCAN', NULL, NULL),
(12, 'MALUKO', NULL, NULL),
(13, 'MAMBATANGAN', NULL, NULL),
(14, 'MAMPAYAG', NULL, NULL),
(15, 'MANTIBUGAO', NULL, NULL),
(16, 'MINSURO', NULL, NULL),
(17, 'SAN MIGUEL', NULL, NULL),
(18, 'SANKANAN', NULL, NULL),
(19, 'SANTIAGO', NULL, NULL),
(20, 'STO. NINO', NULL, NULL),
(21, 'TANKULAN', NULL, NULL),
(22, 'TICALA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sl_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `priority_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `sl_no`, `name`, `contact_no`, `barangay_id`, `status`, `priority_no`, `created_at`, `updated_at`) VALUES
(1, '22-1', 'jig', '09055740562', 6, 1, '1', '2020-09-21 04:59:55', '2020-09-21 08:45:47'),
(2, '6-2', 'Ivan Dasilao', '09367446046', 21, 0, '1', '2020-09-21 07:38:33', '2020-09-21 07:38:33'),
(3, '7-3', 'Kirsten Hyacinth E. Dasilao', '09367446046', 21, 0, '2', '2020-09-21 07:39:46', '2020-09-21 07:39:46'),
(4, '23-4', 'Ivan Dasilao', '09367446046', 21, 0, '2', '2020-09-21 07:41:42', '2020-09-21 07:41:42'),
(5, '3-5', 'Kirsten Hyacinth E. Dasilao', '0955555555', 15, 0, '1', '2020-09-22 01:00:45', '2020-09-22 01:00:45'),
(6, '23-6', 'Kirsten Hyacinth E. Dasilao', '0955555555', 13, 0, '1', '2020-09-22 01:01:06', '2020-09-22 08:56:18'),
(7, '29-7', 'Aniza Marie Aguro', '09367446046', 18, 0, '2', '2020-09-22 01:27:15', '2020-09-22 08:40:14'),
(8, '32-8', 'jigs', '09055740562', 2, 0, '1', '2020-09-22 06:31:10', '2020-09-22 06:31:10'),
(9, '31-9', 'asdfa', 'asdf', 9, 0, '2', '2020-09-22 06:32:07', '2020-09-22 06:32:07'),
(10, '31-10', 'asdf', 'adf', 3, 0, '3', '2020-09-22 08:56:44', '2020-09-22 08:56:44'),
(11, '23-11', 'Ivan Dasilao', '09355185553', 21, 0, '1', '2020-09-22 23:50:01', '2020-09-22 23:50:01'),
(12, '1-12', 'Ivan dasilao', '9887772', 12, 0, '1', '2020-09-23 00:08:19', '2020-09-23 00:08:19'),
(13, '21-13', 'Kirsten Hyacinth E. Dasilao', '0992884732', 15, 0, '2', '2020-09-23 05:45:01', '2020-09-23 05:45:01'),
(14, '24-14', 'Aniza Marie Aguro', '0992884732', 21, 0, '3', '2020-09-23 05:45:56', '2020-09-23 05:45:56'),
(15, '23-15', 'dsdasda', 'dasddasd', 15, 0, '4', '2020-09-23 06:03:43', '2020-09-23 06:03:43'),
(16, '23-16', 'Ivan Dasilao', '0955555555', 19, 0, '1', '2020-09-23 23:45:01', '2020-09-23 23:45:01'),
(17, '1-17', 'Kirsten Hyacinth E. Dasilao', '0955555555', 20, 0, '1', '2020-09-24 02:51:09', '2020-09-24 02:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `clientservices`
--

CREATE TABLE `clientservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `nowserving` tinyint(1) NOT NULL DEFAULT '0',
  `playsound` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientservices`
--

INSERT INTO `clientservices` (`id`, `service_id`, `client_id`, `office_id`, `nowserving`, `playsound`, `created_at`, `updated_at`) VALUES
(1, 22, 1, 3, 0, 0, '2020-09-21 04:59:55', '2020-09-22 01:43:49'),
(2, 6, 2, 2, 0, 0, '2020-09-21 07:38:34', '2020-09-21 07:38:34'),
(3, 7, 3, 2, 0, 0, '2020-09-21 07:39:46', '2020-09-21 07:39:46'),
(4, 23, 4, 3, 0, 0, '2020-09-21 07:41:42', '2020-09-22 01:43:49'),
(5, 3, 5, 1, 0, 0, '2020-09-22 01:00:45', '2020-09-22 01:00:45'),
(6, 23, 6, 3, 0, 0, '2020-09-22 01:01:07', '2020-09-23 05:43:11'),
(7, 29, 7, 3, 0, 0, '2020-09-22 01:27:15', '2020-09-23 05:43:11'),
(8, 32, 8, 7, 0, 0, '2020-09-22 06:31:12', '2020-09-23 05:43:11'),
(9, 31, 9, 7, 0, 0, '2020-09-22 06:32:07', '2020-09-23 05:43:11'),
(10, 31, 10, 7, 0, 0, '2020-09-22 08:56:45', '2020-09-22 08:56:45'),
(11, 23, 11, 3, 0, 0, '2020-09-22 23:50:02', '2020-09-23 08:51:17'),
(12, 1, 12, 1, 0, 0, '2020-09-23 00:08:20', '2020-09-23 08:54:32'),
(13, 21, 13, 3, 0, 0, '2020-09-23 05:45:01', '2020-09-23 08:41:08'),
(14, 24, 14, 3, 0, 0, '2020-09-23 05:45:57', '2020-09-23 08:51:30'),
(15, 23, 15, 3, 0, 0, '2020-09-23 06:03:43', '2020-09-23 08:53:20'),
(16, 23, 16, 3, 0, 0, '2020-09-23 23:45:01', '2020-09-24 02:58:39'),
(17, 1, 17, 1, 0, 0, '2020-09-24 02:51:10', '2020-09-24 02:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gif` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_resets_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2020_07_07_052555_create_offices_table', 1),
(56, '2020_07_07_052850_create_barangays_table', 1),
(57, '2020_07_07_052919_create_admins_table', 1),
(58, '2020_07_07_052939_create_clients_table', 1),
(59, '2020_07_07_053000_create_services_table', 1),
(60, '2020_07_07_053022_create_locations_table', 1),
(61, '2020_07_16_003744_create_userservices_table', 1),
(62, '2020_07_16_004105_create_clientservices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `window` int(11) DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `code`, `window`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'MUNICIPAL TREASURERS OFFICE', 'MTO', 1, '2020092154-treasurer-icon.png', '2020-09-21 01:07:55', '2020-09-21 01:07:55'),
(2, 'LICENSE AND PERMITS DIVISION', 'LAPD', 2, '2020092120-license-icon.png', '2020-09-21 01:08:20', '2020-09-21 01:08:20'),
(3, 'MUNICIPAL ASSESSORS OFFICE', 'MASSO', 3, '2020092148-assessor-icon.png', '2020-09-21 01:08:48', '2020-09-21 01:08:48'),
(4, 'MAYORS OFFICE', 'MO', 5, '2020092143-Untitled-1.png', '2020-09-21 01:12:31', '2020-09-21 05:03:43'),
(5, 'GENERAL SERVICES DIVISION', 'GSD', 4, '2020092149-gsn-icon.png', '2020-09-21 01:12:51', '2020-09-21 05:27:49'),
(6, 'MUNICIPAL SOCIAL WELFARE AND DEVELOPMENT OFFICE', 'MSWD', 6, '2020092126-mswd-icon.png', '2020-09-21 01:13:33', '2020-09-21 05:50:27'),
(7, 'MUNICIPAL PLANNING AND DEVELOPMENT OFFICE', 'MDPO', 7, '2020092133-planning-icon.png', '2020-09-21 01:14:16', '2020-09-21 01:14:33'),
(8, 'CONGRESSIONAL OFFICE', 'CO', 9, '2020092158-congressional-icon.png', '2020-09-21 01:15:07', '2020-09-24 02:44:16'),
(9, 'MUNICIPAL ENGINEERS OFFICE', 'MEO', 10, '2020092155-engineer-icon.png', '2020-09-21 01:15:55', '2020-09-24 02:10:12'),
(10, 'MUNICIPAL CIVIL REGISTRARS OFFICE', 'MCR', NULL, '2020092117-registrar-icon.png', '2020-09-21 01:16:17', '2020-09-21 01:16:17'),
(11, 'MUNICIPAL ENVIRONMENT AND NATURAL RESOURCES OFFICE', 'MENRO', 8, '2020092439-menro-icon.png', '2020-09-24 02:16:51', '2020-09-24 02:29:31');

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_vernacular` text COLLATE utf8mb4_unicode_ci,
  `location_id` int(11) DEFAULT NULL,
  `office_id` int(11) NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `description`, `desc_vernacular`, `location_id`, `office_id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Tax Payment', 'Magbayad og buhis', NULL, 1, NULL, '2020-09-21 01:17:21', '2020-09-21 01:17:21'),
(2, 'Securing for Cedula', 'Magkuha og Cedula', NULL, 1, NULL, '2020-09-21 01:18:13', '2020-09-21 01:18:13'),
(3, 'Weekly salary withdrawal', 'Magkuha og senimana nga sweldo', NULL, 1, NULL, '2020-09-21 01:18:49', '2020-09-21 01:18:49'),
(4, 'Payment for LCR/MCR Documents', 'Magbayad og dokumento gikan sa LCR/MCR', NULL, 1, NULL, '2020-09-21 01:20:06', '2020-09-21 01:20:06'),
(5, 'Citation Ticket Payment', 'Magbayad og Citation Ticket', NULL, 1, NULL, '2020-09-21 01:20:57', '2020-09-21 01:20:57'),
(6, 'Business Permit Payment', 'Magbayad og Business Permit', NULL, 2, NULL, '2020-09-21 01:22:24', '2020-09-21 01:22:24'),
(7, 'Business License Payment', 'Magbayad og Business License', NULL, 2, NULL, '2020-09-21 01:22:53', '2020-09-21 01:22:53'),
(8, 'For renewal of Business Permit', 'Pagbag-o sa Business Permit', NULL, 2, NULL, '2020-09-21 01:23:49', '2020-09-21 01:23:49'),
(9, 'Securing for License Permit', 'Magkuha og Business License', NULL, 2, NULL, '2020-09-21 01:24:51', '2020-09-21 01:24:51'),
(10, 'Inquiring for Business Permit requirement', 'Pag-ingkitar sa mga rekihitos sa Business Permit', NULL, 2, NULL, '2020-09-21 01:25:53', '2020-09-21 01:25:53'),
(11, 'Inquiring for the status on requested materials', 'Pag-ingkitar sa estado sa gipango nga materyalis', NULL, 5, NULL, '2020-09-21 01:26:37', '2020-09-21 01:26:37'),
(12, 'Processing for Financial, Medical and Burial Assistance', 'Magproseso/mangayo og pinansyal, medical ug burial nga hinabang', NULL, 4, NULL, '2020-09-21 01:27:45', '2020-09-21 01:27:45'),
(13, 'Concerns regarding legal matters', 'Magpaabot sa mga katuyuan sa legal nga hisgutanan', NULL, 4, NULL, '2020-09-21 01:28:41', '2020-09-21 01:28:41'),
(14, 'Appointment for Mayor\'s Visitor', 'Magpakigtakda og alang sa pakigkita sa Mayor', NULL, 4, NULL, '2020-09-21 01:29:29', '2020-09-21 01:29:29'),
(15, 'Deliver/send/hand carry of important letters/documents', 'Maghatag/maghatud og importanting mga sulat/dokumento sa buhatan sa Mayor', NULL, 4, NULL, '2020-09-21 01:32:38', '2020-09-21 01:32:38'),
(16, 'Securing for Building Permit', 'Magkuha og Building Permit', NULL, 9, NULL, '2020-09-21 01:33:43', '2020-09-21 01:33:43'),
(17, 'To submit Building Permit Application', 'Pagsumiter og aplikasyon sa Building Permit', NULL, 9, NULL, '2020-09-21 01:35:43', '2020-09-21 01:35:43'),
(18, 'To ask for consultation to a Cluster Engineer', 'Magpakunsulta/makighinabi sa usa ka Cluster Engineer', NULL, 9, NULL, '2020-09-21 01:37:17', '2020-09-21 01:37:17'),
(19, 'To submit and ask for Building Permit Evaluation', 'Magpasa ug magpa-ebalwar sa Building Permit', NULL, 9, NULL, '2020-09-21 01:38:57', '2020-09-21 01:38:57'),
(20, 'Waiting for the Building Permit to be release', 'Pagpaabot sa aprobado nga Building Permit', NULL, 9, NULL, '2020-09-21 01:41:01', '2020-09-21 01:41:01'),
(21, 'Process of Tax Declaration', 'Pagproseso sa Tax Declaration', NULL, 3, NULL, '2020-09-21 01:44:37', '2020-09-21 01:44:37'),
(22, 'Inquiry of Land Title', 'Pag-ingkitar sa Titulo sa Yuta', NULL, 3, NULL, '2020-09-21 01:45:56', '2020-09-21 01:45:56'),
(23, 'Securing certification on real property assessment (Tax Declaration/Property Holdings and no landholding)', 'Magkuha og sertipikasyon sa yuta', NULL, 3, NULL, '2020-09-21 01:50:28', '2020-09-21 01:50:28'),
(24, 'Transfer of Real Property Ownership', NULL, NULL, 3, NULL, '2020-09-21 02:48:16', '2020-09-21 02:48:16'),
(25, 'Assessment of Newly Discovered Real Property (Land/Building/Machinery, etc.)', NULL, NULL, 3, NULL, '2020-09-21 02:49:12', '2020-09-21 02:49:12'),
(26, 'Cancellation of Real Property Assessment', NULL, NULL, 3, NULL, '2020-09-21 02:49:41', '2020-09-21 02:49:41'),
(27, 'Correction and segregation of real property assessment', NULL, NULL, 3, NULL, '2020-09-21 02:50:02', '2020-09-21 02:50:02'),
(28, 'Verifying history of real property assessment or tax declaration', NULL, NULL, 3, NULL, '2020-09-21 02:50:23', '2020-09-21 02:50:23'),
(29, 'Verifying real property location and vicinity', NULL, NULL, 3, NULL, '2020-09-21 02:50:36', '2020-09-21 02:50:36'),
(30, 'Verifying  Tax Declaration Number (For reference in the computation of real property taxes)', NULL, NULL, 3, NULL, '2020-09-21 02:51:39', '2020-09-21 02:51:45'),
(31, 'Securing Zoning Certification and Classification', 'Magkuha og Zoning Certification and Classification', NULL, 7, NULL, '2020-09-21 03:08:53', '2020-09-21 03:08:53'),
(32, 'Securing Locational Clearance for New Projects', NULL, NULL, 7, NULL, '2020-09-21 03:11:32', '2020-09-21 03:11:32'),
(33, 'Settlement for Notice of Negative Findings', NULL, NULL, 11, NULL, '2020-09-24 02:23:00', '2020-09-24 02:23:00'),
(34, 'Settlement for Notice of Violation', NULL, NULL, 11, NULL, '2020-09-24 02:23:36', '2020-09-24 02:23:36'),
(35, 'Complaints or Report of Noisance', NULL, NULL, 11, NULL, '2020-09-24 02:24:00', '2020-09-24 02:24:00'),
(36, 'Securing MENRO Clearance', NULL, NULL, 11, NULL, '2020-09-24 02:24:22', '2020-09-24 02:28:22'),
(37, 'Request for Garbage Collection', NULL, NULL, 11, NULL, '2020-09-24 02:24:42', '2020-09-24 02:24:42'),
(38, 'Request for Tree Seedling', NULL, NULL, 11, NULL, '2020-09-24 02:25:07', '2020-09-24 02:25:07');

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
(1, 'Municipal Treasurers Office', 'lgumf_treasurer@gmail.com', NULL, '$2y$10$/z.6kmAe8GkD7ZH4HcLTnuB7A2rxGDbRUSQ4z0DxHWNZKLp3aXphC', NULL, '2020-09-21 01:55:45', '2020-09-21 01:55:45'),
(2, 'License and Permits Division', 'lgumf_lapd@gmail.com', NULL, '$2y$10$kjw0.69er1D7qGRNchgQf.M.vZgUF37oBPmJQvhP/Q.uxsypryM/W', NULL, '2020-09-21 01:59:58', '2020-09-21 01:59:58'),
(3, 'General Services Division', 'lgumf_gsd@gmail.com', NULL, '$2y$10$vj6m6K97itgPVjnG7omIueXasvpaCEzdNyxDWCHx5bl0VZy9p15LO', NULL, '2020-09-21 02:03:48', '2020-09-21 02:03:48'),
(4, 'Mayors Office', 'lgumf_mo@gmail.com', NULL, '$2y$10$rYzqb4JAMxSvCLsCq.LOO.weiK88BFELmmoXuX8hCzXlpujSs5ZfK', NULL, '2020-09-21 02:36:09', '2020-09-21 02:36:09'),
(5, 'Municipal Engineering Office', 'lgumf_meo@gmail.com', NULL, '$2y$10$HXNeJ90olSXGmeTNvk.gWe9rTflInDAxryXRObvPoATcIfAtZS3Wu', NULL, '2020-09-21 02:41:20', '2020-09-21 02:41:20'),
(6, 'Municipal Assessors Office', 'lgumf_masso@gmail.com', NULL, '$2y$10$hmoZm/dua6OMGMeoiiike.k0XTJzdkNL1PnEmxvE292C0szsdWCGG', NULL, '2020-09-21 02:43:03', '2020-09-21 02:43:03'),
(7, 'Municipal Planning and Development Office', 'lgumf_mpdo@gmail.com', NULL, '$2y$10$umUU9D4Onxc3ZIHSi9giPObXsmnS1cW0dn3E4Zq/nvIAvCKaNQ31C', NULL, '2020-09-21 03:09:48', '2020-09-21 03:09:48'),
(8, 'Municipal Environment and Natural Resources Office', 'lgumf_menro@gmail.com', NULL, '$2y$10$1ekxcugHPNdExTRQhrNHIuDDj/Pw4lnxcGWZozeVzcQAb0HuXeCIa', NULL, '2020-09-24 02:27:08', '2020-09-24 02:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `userservices`
--

CREATE TABLE `userservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userservices`
--

INSERT INTO `userservices` (`id`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-09-21 01:55:45', '2020-09-21 01:55:45'),
(2, 1, 2, '2020-09-21 01:55:52', '2020-09-21 01:55:52'),
(3, 1, 3, '2020-09-21 01:56:11', '2020-09-21 01:56:11'),
(4, 1, 4, '2020-09-21 01:56:18', '2020-09-21 01:56:18'),
(5, 1, 5, '2020-09-21 01:56:25', '2020-09-21 01:56:25'),
(6, 2, 6, '2020-09-21 01:59:58', '2020-09-21 01:59:58'),
(7, 2, 7, '2020-09-21 02:00:50', '2020-09-21 02:00:50'),
(8, 2, 8, '2020-09-21 02:00:59', '2020-09-21 02:00:59'),
(9, 2, 9, '2020-09-21 02:01:17', '2020-09-21 02:01:17'),
(10, 2, 10, '2020-09-21 02:01:39', '2020-09-21 02:01:39'),
(11, 3, 11, '2020-09-21 02:03:48', '2020-09-21 02:03:48'),
(12, 4, 12, '2020-09-21 02:36:09', '2020-09-21 02:36:09'),
(13, 4, 13, '2020-09-21 02:39:11', '2020-09-21 02:39:11'),
(14, 4, 14, '2020-09-21 02:40:06', '2020-09-21 02:40:06'),
(15, 4, 15, '2020-09-21 02:40:17', '2020-09-21 02:40:17'),
(16, 5, 16, '2020-09-21 02:41:20', '2020-09-21 02:41:20'),
(17, 5, 17, '2020-09-21 02:41:30', '2020-09-21 02:41:30'),
(18, 5, 18, '2020-09-21 02:41:45', '2020-09-21 02:41:45'),
(19, 5, 19, '2020-09-21 02:42:07', '2020-09-21 02:42:07'),
(20, 5, 20, '2020-09-21 02:42:15', '2020-09-21 02:42:15'),
(21, 6, 21, '2020-09-21 02:43:03', '2020-09-21 02:43:03'),
(22, 6, 22, '2020-09-21 02:43:09', '2020-09-21 02:43:09'),
(23, 6, 23, '2020-09-21 02:43:17', '2020-09-21 02:43:17'),
(24, 6, 24, '2020-09-21 03:00:15', '2020-09-21 03:00:15'),
(25, 6, 25, '2020-09-21 03:00:25', '2020-09-21 03:00:25'),
(26, 6, 26, '2020-09-21 03:00:37', '2020-09-21 03:00:37'),
(27, 6, 27, '2020-09-21 03:00:46', '2020-09-21 03:00:46'),
(28, 6, 28, '2020-09-21 03:00:52', '2020-09-21 03:00:52'),
(29, 6, 29, '2020-09-21 03:01:02', '2020-09-21 03:01:02'),
(30, 6, 30, '2020-09-21 03:01:10', '2020-09-21 03:01:10'),
(31, 7, 31, '2020-09-21 03:09:48', '2020-09-21 03:09:48'),
(32, 7, 32, '2020-09-21 03:11:43', '2020-09-21 03:11:43'),
(33, 8, 33, '2020-09-24 02:27:09', '2020-09-24 02:27:09'),
(34, 8, 34, '2020-09-24 02:27:31', '2020-09-24 02:27:31'),
(35, 8, 35, '2020-09-24 02:27:43', '2020-09-24 02:27:43'),
(36, 8, 36, '2020-09-24 02:28:36', '2020-09-24 02:28:36'),
(37, 8, 37, '2020-09-24 02:28:47', '2020-09-24 02:28:47'),
(38, 8, 38, '2020-09-24 02:29:02', '2020-09-24 02:29:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientservices`
--
ALTER TABLE `clientservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userservices`
--
ALTER TABLE `userservices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clientservices`
--
ALTER TABLE `clientservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userservices`
--
ALTER TABLE `userservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
