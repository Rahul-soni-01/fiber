-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiber`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Party', '2024-10-12 05:52:44', '2024-10-12 03:36:30'),
(3, 'Department', '2024-10-09 23:26:51', '2024-10-12 03:36:41'),
(4, 'Permission', '2024-10-09 23:27:00', '2024-10-12 03:37:05'),
(5, 'Category', '2024-10-09 23:27:08', '2024-10-12 03:37:17'),
(6, 'Inward', '2024-10-09 23:27:33', '2024-10-12 03:37:33'),
(8, 'User', '2024-10-18 00:07:31', '2024-10-18 00:07:31'),
(9, 'Report', '2024-10-18 23:11:25', '2024-10-18 23:11:25');

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
-- Table structure for table `manage_permission`
--

CREATE TABLE `manage_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `d_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`d_id`)),
  `p_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`p_id`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_permission`
--

INSERT INTO `manage_permission` (`id`, `uid`, `d_id`, `p_id`, `created_at`, `updated_at`) VALUES
(6, 4, '[\"1\",\"3\",\"4\",\"5\",\"6\",\"8\"]', '{\"1\":[\"1\",\"2\",\"3\"],\"3\":[\"1\",\"2\",\"3\",\"4\"],\"4\":[\"1\",\"2\",\"3\",\"4\"],\"5\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\",\"2\",\"3\",\"4\"],\"8\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-16 05:21:49', '2024-10-16 03:51:24'),
(7, 5, '[\"1\",\"3\",\"4\",\"5\",\"6\"]', '{\"1\":[\"1\",\"3\"],\"3\":[\"1\",\"2\",\"3\"],\"4\":[\"1\",\"4\"],\"5\":[\"3\",\"4\"],\"6\":[\"2\",\"4\"]}', '2024-10-16 05:21:56', '2024-10-16 05:21:52'),
(8, 6, '[\"1\",\"5\"]', '{\"1\":[\"2\"],\"5\":[\"1\"]}', '2024-10-16 05:22:00', '2024-10-16 05:21:58'),
(9, 9, '[\"1\",\"3\",\"5\",\"6\"]', '{\"1\":[\"1\"],\"3\":[\"1\",\"2\"],\"5\":[\"1\"],\"6\":[\"1\"]}', '2024-10-16 05:21:39', '2024-10-16 05:22:02'),
(15, 14, '[\"4\",\"5\",\"6\",\"8\",\"9\"]', '{\"4\":[\"1\"],\"5\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\"],\"8\":[\"1\",\"2\",\"3\"],\"9\":[\"1\",\"2\"]}', '2024-10-16 04:40:00', '2024-10-16 04:40:00'),
(16, 17, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-24 07:12:23', '2024-10-24 07:12:23'),
(17, 18, '[\"9\"]', '{\"9\":[\"1\",\"3\",\"4\"]}', '2024-10-25 05:18:04', '2024-10-25 05:18:04');

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
(6, '2024_10_01_102500_create_tbl_purchases_table', 2),
(10, '2024_10_01_111630_create_tbl_users_table', 3),
(12, '0001_01_01_000000_create_users_table', 4),
(13, '0001_01_01_000001_create_cache_table', 4),
(14, '0001_01_01_000002_create_jobs_table', 4),
(15, '2024_10_01_101957_create_tbl_users_table', 4),
(16, '2024_10_01_102441_create_tbl_parties_table', 4),
(17, '2024_10_01_102521_create_tbl_purchase_items_table', 4),
(18, '2024_10_01_102546_create_tbl_categories_table', 4),
(19, '2024_10_01_102556_create_tbl_sub_categories_table', 4),
(20, '2024_10_02_050305_create_tbl_purchases_table', 4),
(22, '2024_10_08_114747_create_permissions_table', 6),
(23, '2024_10_09_104410_create_departments_table', 7),
(24, '2024_10_10_043753_create_manage_permission_table', 8),
(25, '2024_10_12_054434_add_invoice_no_to_tbl_stock', 9),
(26, '2024_10_15_070534_add_tax_to_tbl_purchase_items_table', 10),
(32, '2024_10_05_120730_create_tbl_stock_table', 14),
(35, '2024_10_19_092629_create_tbl_leds_table', 16),
(38, '2024_10_17_095721_create_tbl_report_table', 17),
(40, '2024_10_24_115103_create_tbl_cards_table', 18);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'view', NULL, '2024-10-09 04:28:34'),
(2, 'add', NULL, '2024-10-09 04:28:39'),
(3, 'edit', NULL, '2024-10-09 04:28:44'),
(4, 'delete', NULL, '2024-10-09 04:28:49');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cards`
--

CREATE TABLE `tbl_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scid` varchar(255) DEFAULT NULL,
  `report_id` varchar(255) DEFAULT NULL,
  `sr_card` varchar(255) DEFAULT NULL,
  `amp_card` varchar(255) DEFAULT NULL,
  `volt_card` varchar(255) DEFAULT NULL,
  `watt_card` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cards`
--

INSERT INTO `tbl_cards` (`id`, `scid`, `report_id`, `sr_card`, `amp_card`, `volt_card`, `watt_card`, `created_at`, `updated_at`) VALUES
(1, '20', '23', '0', 'Dolorum veniam plac', 'Maxime suscipit vero', 'Veniam aute deserun', '2024-10-26 07:33:30', '2024-10-26 07:33:30'),
(2, '20', '24', '0', 'amp 0', 'VOLT 0', 'WATT 0', '2024-10-26 10:09:35', '2024-10-26 10:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'LD', '2024-10-03 00:28:02', '2024-10-03 00:28:02'),
(6, 'HR', '2024-10-22 05:59:53', '2024-10-22 05:59:53'),
(7, 'CARD', '2024-10-22 06:09:31', '2024-10-22 06:09:31'),
(8, 'ISOLATOR', '2024-10-22 06:09:41', '2024-10-22 06:09:41'),
(9, 'AOM', '2024-10-22 06:10:05', '2024-10-22 06:10:05'),
(10, 'Fiber', '2024-10-22 06:10:51', '2024-10-22 06:27:54'),
(11, 'COMBINER', '2024-10-22 06:12:56', '2024-10-22 06:12:56'),
(12, 'COUPLAR', '2024-10-22 06:13:46', '2024-10-22 06:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leds`
--

CREATE TABLE `tbl_leds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scid` varchar(255) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `sr_led` varchar(255) NOT NULL,
  `amp_led` varchar(255) NOT NULL,
  `volt_led` varchar(255) NOT NULL,
  `watt_led` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_leds`
--

INSERT INTO `tbl_leds` (`id`, `scid`, `report_id`, `sr_led`, `amp_led`, `volt_led`, `watt_led`, `created_at`, `updated_at`) VALUES
(1, '2', '23', 'Ut est rerum dolore', 'Dignissimos anim opt', 'Voluptates ut et adi', 'Quibusdam qui nulla', '2024-10-26 07:33:30', '2024-10-26 07:33:30'),
(2, '1', '24', '100', '1', '1', 'watt 1', '2024-10-26 10:09:36', '2024-10-26 10:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parties`
--

CREATE TABLE `tbl_parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_parties`
--

INSERT INTO `tbl_parties` (`id`, `party_name`, `address`, `telephone_no`, `sender_name`, `created_at`, `updated_at`) VALUES
(1, 'Madeline Schroeder', 'Unde rerum delectus', 'Dolore cumque cumque', 'Zelenia Spears', '2024-10-03 00:14:01', '2024-10-03 00:14:01'),
(2, 'Eve Rodriquez', 'Non exercitationem v', '1012321', 'Whilemina', '2024-10-03 06:01:54', '2024-10-16 06:42:25'),
(3, 'Deniz Buraq', '162, parvati nagar -1,', '0987654321', 'Denis Vora', '2024-10-16 06:16:56', '2024-10-21 06:06:49'),
(5, 'opening stock', '24165464', '45454545', 'dfsdfs', '2024-10-22 06:18:40', '2024-10-22 06:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `inr_rate` decimal(4,2) NOT NULL,
  `inr_amount` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `round_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`id`, `date`, `invoice_no`, `pid`, `amount`, `inr_rate`, `inr_amount`, `shipping_cost`, `round_amount`, `created_at`, `updated_at`) VALUES
(18, '2024-10-22', 103, 5, 11000, 1.00, '11000.00', '0', NULL, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(19, '2024-10-22', 33, 3, 190, 80.00, '15228.80', '0', NULL, '2024-10-22 13:41:37', '2024-10-22 13:41:37'),
(20, '2024-10-23', 104, 5, 200, 8.00, '1600.00', '0', '0', '2024-10-23 09:07:05', '2024-10-23 09:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_items`
--

CREATE TABLE `tbl_purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `scid` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_purchase_items`
--

INSERT INTO `tbl_purchase_items` (`id`, `invoice_no`, `cid`, `scid`, `qty`, `unit`, `price`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(20, 103, '1', '1', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(21, 103, '1', '2', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(22, 103, '1', '3', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(23, 103, '6', '19', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(24, 103, '7', '20', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(25, 103, '7', '21', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(26, 103, '8', '22', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(27, 103, '9', '15', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(28, 103, '10', '16', 1000, 'Mtr', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(29, 103, '11', '18', 1000, 'Mtr', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(30, 103, '12', '23', 1000, 'Pic', 1.00, NULL, 1000.00, '2024-10-22 06:32:14', '2024-10-22 06:32:14'),
(31, 33, '1', '1', 11, 'Pic', 11.00, NULL, 121.00, '2024-10-22 13:41:37', '2024-10-22 13:41:37'),
(32, 33, '7', '21', 22, 'Pic', 2.00, NULL, 44.88, '2024-10-22 13:41:37', '2024-10-22 13:41:37'),
(33, 33, '11', '18', 12, 'Mtr', 2.00, NULL, 24.48, '2024-10-22 13:41:37', '2024-10-22 13:41:37'),
(34, 104, '10', '16', 200, 'Mtr', 1.00, NULL, 200.00, '2024-10-23 09:07:05', '2024-10-23 09:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part` int(11) DEFAULT NULL,
  `f_status` int(11) DEFAULT NULL,
  `worker_name` varchar(255) DEFAULT NULL,
  `sr_no_fiber` varchar(255) DEFAULT NULL,
  `m_j` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sr_card` varchar(255) DEFAULT NULL,
  `sr_isolator` varchar(255) DEFAULT NULL,
  `sr_aom_qswitch` varchar(255) DEFAULT NULL,
  `amp_aom_qswitch` varchar(255) DEFAULT NULL,
  `volt_aom_qswitch` varchar(255) DEFAULT NULL,
  `watt_aom_qswitch` varchar(255) DEFAULT NULL,
  `sr_cavity_nani` varchar(255) DEFAULT NULL,
  `sr_cavity_moti` varchar(255) DEFAULT NULL,
  `sr_combiner_3_1` varchar(255) DEFAULT NULL,
  `amp_combiner_3_1` varchar(255) DEFAULT NULL,
  `volt_combiner_3_1` varchar(255) DEFAULT NULL,
  `watt_combiner_3_1` varchar(255) DEFAULT NULL,
  `sr_couplar_2_2` varchar(255) DEFAULT NULL,
  `amp_couplar_2_2` varchar(255) DEFAULT NULL,
  `volt_couplar_2_2` varchar(255) DEFAULT NULL,
  `watt_couplar_2_2` varchar(255) DEFAULT NULL,
  `sr_hr` varchar(255) DEFAULT NULL,
  `sr_fiber_nano` varchar(255) DEFAULT NULL,
  `sr_fiber_moto` varchar(255) DEFAULT NULL,
  `output_amp` varchar(255) DEFAULT NULL,
  `output_volt` varchar(255) DEFAULT NULL,
  `output_watt` varchar(255) DEFAULT NULL,
  `nani_cavity` varchar(255) DEFAULT NULL,
  `final_cavity` varchar(255) DEFAULT NULL,
  `note1` text DEFAULT NULL,
  `note2` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL,
  `r_status` int(11) DEFAULT NULL,
  `party_name` int(11) DEFAULT NULL,
  `final_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`id`, `part`, `f_status`, `worker_name`, `sr_no_fiber`, `m_j`, `type`, `sr_card`, `sr_isolator`, `sr_aom_qswitch`, `amp_aom_qswitch`, `volt_aom_qswitch`, `watt_aom_qswitch`, `sr_cavity_nani`, `sr_cavity_moti`, `sr_combiner_3_1`, `amp_combiner_3_1`, `volt_combiner_3_1`, `watt_combiner_3_1`, `sr_couplar_2_2`, `amp_couplar_2_2`, `volt_couplar_2_2`, `watt_couplar_2_2`, `sr_hr`, `sr_fiber_nano`, `sr_fiber_moto`, `output_amp`, `output_volt`, `output_watt`, `nani_cavity`, `final_cavity`, `note1`, `note2`, `remark`, `status`, `temp`, `r_status`, `party_name`, `final_amount`, `created_at`, `updated_at`) VALUES
(23, 0, 1, 'Mara Buckner', 'Nihil dicta non lore', 'Impedit commodi eiu', '15', NULL, NULL, '49', 'Harum adipisicing te', 'Ut commodo eligendi', 'Qui perspiciatis co', 'Dolore dolor tempori', 'Incidunt ullam in m', 'Fugiat sed ut repre', 'Adipisci nostrum vel', 'Ipsum dolores digni', 'Blanditiis ut aut re', 'Amet qui sunt in p', 'Qui vitae voluptatum', 'Rerum tempor sint s', 'Nulla nostrum sunt', '50', '2', '1', 'Ipsam incidunt quae', 'Ex praesentium nostr', NULL, 'Nobis et sunt esse', 'Quia aliquam exercit', 'Admin Ok', NULL, NULL, NULL, 111, 1, NULL, 7, '2024-10-26 07:33:30', '2024-10-26 07:33:30'),
(24, 0, NULL, 'Oprah Chavez', NULL, NULL, NULL, NULL, NULL, '47', 'aom amp', 'aom volt', 'aom watt', 'Nulla officiis eu es', 'Exercitationem incid', 'Sint adipisci disti', 'Irure dolor earum di', 'Lorem non provident', 'Nisi labore alias es', 'Anim dolor voluptate', 'Maiores anim nihil s', 'Neque sunt maxime ra', 'Quis et aut rerum ev', 'Rerum praesentium pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed saepe nisi accus', 'Est cupiditate lorem', NULL, NULL, 112, 0, NULL, 3, '2024-10-26 10:09:35', '2024-10-26 12:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL,
  `scid` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `priceofUnit` decimal(10,2) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `date`, `invoice_no`, `cid`, `scid`, `serial_no`, `qty`, `price`, `priceofUnit`, `status`, `created_at`, `updated_at`) VALUES
(14, '2024-10-22', '33', 1, 1, '74', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 11:19:45'),
(15, '2024-10-22', '33', 1, 1, '15', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 11:19:45'),
(16, '2024-10-22', '33', 1, 1, '93', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 12:05:57'),
(17, '2024-10-22', '33', 1, 1, '27', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 12:05:57'),
(18, '2024-10-22', '33', 1, 1, '100', 1, 716.00, 1.51, '1', '2024-10-23 07:56:52', '2024-10-26 10:09:35'),
(19, '2024-10-22', '33', 1, 1, '67', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 12:43:51'),
(20, '2024-10-22', '33', 1, 1, '60', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-24 12:43:51'),
(21, '2024-10-22', '33', 1, 1, '45', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-25 05:07:49'),
(22, '2024-10-22', '33', 1, 1, '30', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-23 07:56:52'),
(23, '2024-10-22', '33', 1, 1, '80', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-23 07:56:52'),
(24, '2024-10-22', '33', 1, 1, '57', 1, 716.00, 1.51, '0', '2024-10-23 07:56:52', '2024-10-23 07:56:52'),
(25, '2024-10-22', '103', 10, 16, '0', 1000, 1000.00, 1.00, '0', '2024-10-23 09:05:19', '2024-10-23 09:57:16'),
(26, '2024-10-23', '104', 10, 16, '0', 200, 200.00, 1.00, '0', '2024-10-23 09:07:14', '2024-10-23 09:07:14'),
(27, '2024-10-22', '103', 1, 3, 'Fugiat incididunt de', 1, 1.00, 1.00, '0', '2024-10-23 09:55:23', '2024-10-23 09:55:23'),
(33, '2024-10-22', '103', 7, 20, '0', 1000, 1000.00, 1.00, '0', '2024-10-24 12:03:27', '2024-10-24 12:03:27'),
(34, '2024-10-22', '103', 1, 3, '74', 1, 1.00, 1.00, '0', '2024-10-24 12:05:57', '2024-10-24 12:05:57'),
(35, '2024-10-22', '103', 7, 1, '0', 1, 1.00, 1.00, '0', '2024-10-24 12:43:51', '2024-10-24 12:43:51'),
(36, '2024-10-22', '103', 7, 21, '1', 1, 1.00, 1.00, '0', '2024-10-24 13:14:44', '2024-10-24 13:14:44'),
(37, '2024-10-22', '103', 1, 3, '21312', 1, 1.00, 1.00, '0', '2024-10-24 13:14:44', '2024-10-24 13:14:44'),
(38, '2024-10-22', '103', 1, 2, 'Perferendis unde mol', 1, 1.00, 1.00, '0', '2024-10-25 09:24:13', '2024-10-25 09:24:13'),
(39, '2024-10-22', '103', 1, 2, '74', 1, 1.00, 1.00, '0', '2024-10-25 12:03:15', '2024-10-25 12:03:15'),
(40, '2024-10-22', '103', 8, 22, '2201', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(41, '2024-10-22', '103', 8, 22, '2202', 7, 7.00, 1.00, '1', '2024-10-26 05:45:14', '2024-10-26 07:33:30'),
(42, '2024-10-22', '103', 8, 22, '2203', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(43, '2024-10-22', '103', 8, 22, '2204', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(44, '2024-10-22', '103', 8, 22, '2205', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(45, '2024-10-22', '103', 8, 22, '2206', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(46, '2024-10-22', '103', 8, 22, '2207', 7, 7.00, 1.00, '0', '2024-10-26 05:45:14', '2024-10-26 05:45:14'),
(47, '2024-10-22', '103', 9, 15, '150901', 3, 3.00, 1.00, '0', '2024-10-26 06:21:00', '2024-10-26 06:21:00'),
(48, '2024-10-22', '103', 9, 15, '150902', 3, 3.00, 1.00, '0', '2024-10-26 06:21:00', '2024-10-26 06:21:00'),
(49, '2024-10-22', '103', 9, 15, '150903', 3, 3.00, 1.00, '0', '2024-10-26 06:21:00', '2024-10-26 06:21:00'),
(50, '2024-10-22', '103', 6, 19, '190601', 3, 3.00, 1.00, '1', '2024-10-26 06:53:56', '2024-10-26 07:33:30'),
(51, '2024-10-22', '103', 6, 19, '190602', 3, 3.00, 1.00, '0', '2024-10-26 06:53:56', '2024-10-26 06:53:56'),
(52, '2024-10-22', '103', 6, 19, '190603', 3, 3.00, 1.00, '0', '2024-10-26 06:53:56', '2024-10-26 06:53:56'),
(53, '2024-10-22', '103', 1, 2, 'Ut est rerum dolore', 1, 1.00, 1.00, '1', '2024-10-26 07:33:30', '2024-10-26 07:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_categories`
--

CREATE TABLE `tbl_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cid` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `sr_no` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sub_categories`
--

INSERT INTO `tbl_sub_categories` (`id`, `cid`, `sub_category_name`, `unit`, `sr_no`, `created_at`, `updated_at`) VALUES
(1, 1, '15', 'Pic', 1, '2024-10-03 00:28:08', '2024-10-03 00:28:08'),
(2, 1, '30', 'Pic', 1, '2024-10-03 00:28:14', '2024-10-03 00:28:14'),
(3, 1, '45', 'Pic', 1, '2024-10-03 00:28:22', '2024-10-03 00:28:22'),
(15, 9, 'QSWITCH', 'Pic', 1, '2024-10-22 06:10:33', '2024-10-22 06:10:33'),
(16, 10, 'Fiber', 'Mtr', 0, '2024-10-22 06:11:18', '2024-10-22 06:28:14'),
(18, 11, '3*1', 'Mtr', 0, '2024-10-22 06:13:20', '2024-10-22 06:13:30'),
(19, 6, 'HR', 'Pic', 1, '2024-10-22 06:22:07', '2024-10-22 06:22:07'),
(20, 7, 'Power PCB', 'Pic', 0, '2024-10-22 06:23:17', '2024-10-22 06:23:17'),
(21, 7, 'Control card', 'Pic', 0, '2024-10-22 06:23:34', '2024-10-22 06:23:34'),
(22, 8, 'ISOLATOR', 'Pic', 1, '2024-10-22 06:24:16', '2024-10-22 06:24:25'),
(23, 12, '2*2', 'Pic', 0, '2024-10-22 06:25:10', '2024-10-22 06:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `type`, `email`, `password`, `d_id`, `created_at`, `updated_at`) VALUES
(4, 'John Doe', 'admin', 'john@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 1, '2024-10-08 07:11:21', '2024-10-08 07:11:21'),
(5, 'Jane Smith', 'admin', 'jane@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 1, '2024-10-08 07:11:21', '2024-10-08 07:11:21'),
(6, 'Alice Johnson', 'moderator', 'alice@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 1, '2024-10-08 07:11:21', '2024-10-08 07:11:21'),
(9, 'Eve White', 'user', 'eve@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 4, '2024-10-08 07:11:21', '2024-10-08 07:11:21'),
(14, 'Dawood', 'user', 'dawood@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 3, NULL, '2024-10-18 05:21:16'),
(15, 'Kasaab123', 'user', 'kasaab@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 4, NULL, '2024-10-18 23:54:56'),
(17, 'Electric', 'electric', 'electric@gmail.com', '$2y$12$imvlRnbr7ToA0OU2L1bliu3/JjYKEbm5QzUPz9jhbA2yvOxblv4D2', 8, '2024-10-24 07:11:37', '2024-10-24 07:11:37'),
(18, 'Cavity', 'cavity', 'cavity@gmail.com', '$2y$12$usznGZs.L0oJpNKZdvxICezM4WQF39I5StNGmS.rh5KygfEmGPDC6', 9, '2024-10-25 05:17:15', '2024-10-25 05:17:15');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

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
-- Indexes for table `manage_permission`
--
ALTER TABLE `manage_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manage_permission_uid_foreign` (`uid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leds`
--
ALTER TABLE `tbl_leds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_stock_cid_foreign` (`cid`),
  ADD KEY `tbl_stock_scid_foreign` (`scid`);

--
-- Indexes for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `manage_permission`
--
ALTER TABLE `manage_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_leds`
--
ALTER TABLE `tbl_leds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manage_permission`
--
ALTER TABLE `manage_permission`
  ADD CONSTRAINT `manage_permission_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_stock_scid_foreign` FOREIGN KEY (`scid`) REFERENCES `tbl_sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
