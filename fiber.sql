-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2025 at 10:12 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.22

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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `tax_id` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `tax_id`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Maktech', 'Maktech', 'Surat', 1, '2025-06-03 00:40:55', '2025-06-03 16:58:47');

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
(1, 'Party', '2024-10-12 00:22:44', '2024-10-11 22:06:30'),
(3, 'Department', '2024-10-09 17:56:51', '2024-10-11 22:06:41'),
(4, 'Permission', '2024-10-09 17:57:00', '2024-10-11 22:07:05'),
(5, 'Category', '2024-10-09 17:57:08', '2024-10-11 22:07:17'),
(6, 'Inward', '2024-10-09 17:57:33', '2024-10-11 22:07:33'),
(8, 'User', '2024-10-17 18:37:31', '2024-10-17 18:37:31'),
(9, 'Report', '2024-10-18 17:41:25', '2024-10-18 17:41:25'),
(10, 'Sale', '2024-11-19 05:49:31', '2024-11-19 05:49:31'),
(11, 'Customer', '2024-11-25 01:08:48', '2024-11-25 01:08:48'),
(12, 'Type', '2024-12-05 06:35:20', '2024-12-05 06:35:20'),
(14, 'Account', '2024-12-14 04:02:05', '2024-12-14 04:02:05'),
(15, 'Bank', '2024-12-19 00:18:58', '2024-12-19 00:18:58'),
(16, 'Payment', '2024-12-19 00:31:51', '2024-12-19 00:31:51'),
(17, 'Expense', '2024-12-19 05:55:44', '2024-12-19 05:55:44'),
(18, 'Sale Product List', '2024-12-20 23:20:43', '2024-12-20 23:20:43'),
(20, 'Section', '2025-03-31 22:32:20', '2025-03-31 22:32:20');

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
-- Table structure for table `gst_pdf_table`
--

CREATE TABLE `gst_pdf_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_name` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `company_address` varchar(191) DEFAULT NULL,
  `company_gstin` varchar(191) DEFAULT NULL,
  `company_phno` varchar(191) DEFAULT NULL,
  `company_email` varchar(191) DEFAULT NULL,
  `company_lutno` varchar(191) DEFAULT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `c_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `invoice_no` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `place_of_supply` varchar(191) DEFAULT NULL,
  `reverse_charge` varchar(191) DEFAULT NULL,
  `gr_rr_no` varchar(191) DEFAULT NULL,
  `transport` varchar(191) DEFAULT NULL,
  `vehicle_no` varchar(191) DEFAULT NULL,
  `station` varchar(191) DEFAULT NULL,
  `e_way_bill_no` varchar(191) DEFAULT NULL,
  `billed_to` varchar(191) DEFAULT NULL,
  `billed_city` varchar(191) DEFAULT NULL,
  `billed_state` varchar(191) DEFAULT NULL,
  `billed_gstin_uin` varchar(191) DEFAULT NULL,
  `shipped_to` varchar(191) DEFAULT NULL,
  `shipped_city` varchar(191) DEFAULT NULL,
  `shipped_state` varchar(191) DEFAULT NULL,
  `shipped_gstin_uin` varchar(191) DEFAULT NULL,
  `irn` varchar(191) DEFAULT NULL,
  `ack_no` varchar(191) DEFAULT NULL,
  `ack_date` varchar(191) DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `cgst_per` varchar(255) DEFAULT NULL,
  `sgst_per` varchar(255) DEFAULT NULL,
  `igst_per` varchar(255) DEFAULT NULL,
  `cgst_amt` varchar(255) DEFAULT NULL,
  `sgst_amt` varchar(255) DEFAULT NULL,
  `igst_amt` varchar(255) DEFAULT NULL,
  `grand_total_qty` varchar(191) DEFAULT NULL,
  `grand_total_amt` varchar(255) DEFAULT NULL,
  `hsn_sac_desc` varchar(191) DEFAULT NULL,
  `tax_rate_desc` varchar(191) DEFAULT NULL,
  `taxable_amt_desc` varchar(191) DEFAULT NULL,
  `cgst_amt_desc` varchar(191) DEFAULT NULL,
  `sgst_amt_desc` varchar(191) DEFAULT NULL,
  `igst_amt_desc` varchar(191) DEFAULT NULL,
  `total_tax_desc` varchar(191) DEFAULT NULL,
  `msme_udyam_reg_number` varchar(191) DEFAULT NULL,
  `bank_details` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gst_pdf_table`
--

INSERT INTO `gst_pdf_table` (`id`, `invoice_name`, `company_name`, `company_address`, `company_gstin`, `company_phno`, `company_email`, `company_lutno`, `sale_id`, `c_id`, `name`, `invoice_no`, `date`, `place_of_supply`, `reverse_charge`, `gr_rr_no`, `transport`, `vehicle_no`, `station`, `e_way_bill_no`, `billed_to`, `billed_city`, `billed_state`, `billed_gstin_uin`, `shipped_to`, `shipped_city`, `shipped_state`, `shipped_gstin_uin`, `irn`, `ack_no`, `ack_date`, `items`, `cgst_per`, `sgst_per`, `igst_per`, `cgst_amt`, `sgst_amt`, `igst_amt`, `grand_total_qty`, `grand_total_amt`, `hsn_sac_desc`, `tax_rate_desc`, `taxable_amt_desc`, `cgst_amt_desc`, `sgst_amt_desc`, `igst_amt_desc`, `total_tax_desc`, `msme_udyam_reg_number`, `bank_details`, `account_number`, `ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 'TAX INVOICE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'CUS ABC', 'IN-1', '2025-01-13', 'Voluptatem assumenda', 'Adipisci quia ea rat', 'Aut error vero eaque', 'In suscipit rerum es', 'Error eos odio molli', 'Rerum eveniet eaque', 'Nobis facere et simi', 'Eu suscipit ex adipi', 'Dolore odit minima p', 'Architecto omnis ius', 'Maxime autem qui ut', 'Est eu consequat I', 'Natus minima at aspe', 'Dolore eum est ea v', 'Nesciunt autem cons', 'Proident cum ut inc', 'Ut facere quibusdam', '2025-11-24', '[{\"sn\": \"11\", \"qty\": \"442\", \"unit\": \"Voluptas in ut ad in\", \"price\": \"294\", \"total\": \"42\", \"hsn_code\": \"Repellendus Distinc\", \"description\": \"Nesciunt aute ex od\"}, {\"sn\": \"92\", \"qty\": \"885\", \"unit\": \"Quia impedit veniam\", \"price\": \"269\", \"total\": \"97\", \"hsn_code\": \"Dolores in esse maxi\", \"description\": \"Nostrum id autem et\"}]', NULL, NULL, NULL, NULL, NULL, NULL, '100', '53100', 'Non vel modi est pro', '41', '57', '4', '46', '28', '22', '863', 'Repellendus Fugiat', '919', 'Veniam ut deserunt', '2025-01-11 07:22:49', '2025-01-11 07:22:49'),
(3, 'Cade Brennan', 'MAKTECH', 'GROOUND FLOOR, 541, VASTADEWADI ROAD OPP, JAIN MANDIR HIRABEN NI WADI DIGAMBER JAIN MANDIR, KATARGAM, SURAT', '24AAZFM7679J1Z7', '9727432806', 'maktech41@gmail.com', 'AD240921009829V', NULL, NULL, NULL, 'Sit sint incidunt', '1972-06-08', 'Corporis aut incidun', 'Ipsum ut explicabo', 'Voluptas beatae aute', 'Velit totam est id', 'Ipsum ea quo et repu', 'Ad enim sint labore', 'Rem maiores est duci', 'Eiusmod vel vel esse', 'Quisquam provident', 'Quis optio voluptat', 'Voluptatem doloribus', 'Et ratione duis cupi', 'Proident maxime vol', 'Enim reprehenderit', 'Dolore voluptas eos', 'Mollitia aliqua Ill', 'Et quas consectetur', '1993-11-03 00:00:00', '[{\"sn\": \"43\", \"qty\": \"203\", \"unit\": \"Nulla sequi assumend\", \"price\": \"247\", \"total\": \"89\", \"hsn_code\": \"Quia recusandae Tem\", \"description\": \"Ipsam omnis quod et\"}]', '11', '67', '79', '30', '83', '59', '203', '37', 'Error deserunt lauda', '47', '25', '44', '100', '67', '29', '825', 'Ipsum nulla fugiat', '822', 'Maiores officia ipsu', '2025-01-13 09:44:23', '2025-01-13 12:56:04'),
(4, 'Damon Sanchez', 'MAKTECH', 'GROOUND FLOOR, 541, VASTADEWADI ROAD OPP, JAIN MANDIR HIRABEN NI WADI DIGAMBER JAIN MANDIR, KATARGAM, SURAT', '24AAZFM7679J1Z7', '9727432806', 'maktech41@gmail.com', 'AD240921009829V', NULL, NULL, NULL, '22', NULL, 'Est quia explicabo', 'Yes', '78754456', 'Self', 'GJ 05 2054', 'Taksh Godown', '168', 'Meet', 'Rathod', 'Godhara', '24AADCS4343N1Z6', 'Taksh', 'TARI PARI', 'SURAT', '24AAZFM7679J1Z7', '45216sdfd1vf6g54fd11b5f1d564g61fd21g5fd4g4f', '48', NULL, '[{\"sn\": \"1\", \"qty\": \"1\", \"unit\": \"Pcs\", \"price\": \"45000\", \"total\": \"45000\", \"hsn_code\": \"84569200\", \"description\": \"18 Plused Fiber Laser\"}, {\"sn\": \"2\", \"qty\": \"1\", \"unit\": \"Pcs\", \"price\": \"45000\", \"total\": \"45000\", \"hsn_code\": \"64574100\", \"description\": \"21 Plused Fiber Laser\"}, {\"sn\": \"3\", \"qty\": \"2\", \"unit\": \"Pcs\", \"price\": \"45000\", \"total\": \"90000\", \"hsn_code\": \"76876575\", \"description\": \"15 Fiber\"}]', '9', '9', NULL, '18200', '18200', NULL, '4', '106200', '84569200', '18', '180000', '18200', '18200', NULL, '32400', 'UDYAM -GJ-22-263565', 'SBI', '1051116905215', 'SBIN0016040', '2025-01-13 11:05:25', '2025-01-16 05:09:51');

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
  `d_id` longtext NOT NULL,
  `p_id` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_permission`
--

INSERT INTO `manage_permission` (`id`, `uid`, `d_id`, `p_id`, `created_at`, `updated_at`) VALUES
(6, 4, '[\"1\",\"3\",\"4\",\"5\",\"6\",\"8\",\"12\"]', '{\"1\":[\"1\",\"2\",\"3\"],\"3\":[\"1\",\"2\",\"3\",\"4\"],\"4\":[\"1\",\"2\",\"3\",\"4\"],\"5\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\",\"2\",\"3\",\"4\"],\"8\":[\"1\",\"2\",\"3\",\"4\"],\"12\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-15 23:51:49', '2024-10-15 22:21:24'),
(15, 14, '[\"4\",\"5\",\"6\",\"8\",\"9\"]', '{\"4\":[\"1\"],\"5\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\"],\"8\":[\"1\",\"2\",\"3\"],\"9\":[\"1\",\"2\"]}', '2024-10-15 23:10:00', '2024-10-15 23:10:00'),
(16, 17, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-24 01:42:23', '2024-10-24 01:42:23'),
(17, 18, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-24 23:48:04', '2024-10-24 23:48:04'),
(18, 19, '[\"1\",\"6\",\"9\",\"10\",\"11\",\"14\",\"15\",\"16\",\"17\",\"18\"]', '{\"1\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\",\"2\",\"3\",\"4\"],\"9\":[\"1\",\"2\",\"3\",\"4\"],\"10\":[\"1\",\"2\",\"3\",\"4\"],\"11\":[\"1\",\"2\",\"3\",\"4\"],\"14\":[\"1\",\"2\",\"3\",\"4\"],\"15\":[\"1\",\"2\",\"3\",\"4\"],\"16\":[\"1\",\"2\",\"3\",\"4\"],\"17\":[\"1\",\"2\",\"3\",\"4\"],\"18\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-11-18 00:24:42', '2024-11-18 00:24:42'),
(19, 20, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-11-22 23:45:33', '2024-11-22 23:45:33'),
(20, 15, '[\"6\",\"8\",\"9\",\"10\"]', '{\"6\":[\"1\"],\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2025-03-03 23:24:42', '2025-03-03 23:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_report_layouts`
--

CREATE TABLE `manufacture_report_layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `part` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacture_report_layouts`
--

INSERT INTO `manufacture_report_layouts` (`id`, `name`, `type`, `part`, `description`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Report 30', '1', NULL, 'Report 30 Manufacturing Layout', 4, 0, '2025-04-14 10:15:34', '2025-04-16 23:52:35'),
(3, 'Report 26', '4', '0', 'Description Report 26', 4, 1, '2025-04-15 07:26:03', '2025-04-17 00:09:36'),
(4, 'Manufacturing Report 21', '3', '0', 'Report 21 Description', 4, 0, '2025-04-16 01:34:44', '2025-05-28 21:40:09'),
(5, '28 May', '3', '0', 'New 21 layout', 4, 0, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(6, 'JULY 14-2025', '3', '0', 'NCH', 4, 1, '2025-07-14 18:04:29', '2025-07-14 18:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_report_layout_fields`
--

CREATE TABLE `manufacture_report_layout_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layout_id` bigint(20) UNSIGNED NOT NULL,
  `field_key` varchar(191) NOT NULL,
  `label` varchar(191) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacture_report_layout_fields`
--

INSERT INTO `manufacture_report_layout_fields` (`id`, `layout_id`, `field_key`, `label`, `visible`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'part', 'Temp no.', 1, 2, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(2, 1, 'employee_name', 'EMPLOYEE NAME', 1, 3, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(3, 1, 'temp_no', 'SR (FIBER)', 1, 4, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(4, 1, 'sr_fiberd', 'M.J', 1, 5, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(5, 1, 'mj', 'Warranty', 1, 6, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(6, 1, 'warranty', 'Type', 1, 7, '2025-04-12 06:54:40', '2025-05-29 19:59:42'),
(7, 1, 'type', 'ISOLATOR-20/130', 1, 17, '2025-04-12 06:54:41', '2025-07-14 18:06:52'),
(8, 1, 'demo_1', 'Fiber-30/250 (L)', 1, 19, '2025-04-12 06:54:41', '2025-07-14 18:06:52'),
(9, 2, 'part', 'BODY-SMALL BODY', 1, 21, '2025-04-14 10:15:34', '2025-07-14 18:06:52'),
(10, 2, 'temp_no', 'BODY-BIG BODY', 1, 22, '2025-04-14 10:15:34', '2025-07-14 18:06:52'),
(11, 2, 'employee_name', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-07-14 18:06:52'),
(12, 2, 'sr_fiber', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-07-14 18:05:21'),
(13, 2, 'mj', 'CARD-Power PCB', 1, 15, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(14, 2, 'warranty', 'CARD-Control Card', 1, 16, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(15, 2, 'type', 'COUPLAR-2*2', 1, 18, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(16, 2, 'LD 15', 'Fiber-30/250 (L)', 1, 19, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(17, 2, 'LD 30', 'CARD-Thermal Cabel', 1, 20, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(18, 2, 'LD 45', 'BODY-SMALL BODY', 1, 21, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(19, 2, 'AOM QSWITCH', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(20, 2, 'Fiber 10/130 (S)', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(21, 2, 'COMBINER 3*1 (10*130)', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:34', '2025-07-14 18:05:04'),
(22, 2, 'HR HR', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(23, 2, 'CARD Power PCB', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(24, 2, 'CARD Control card', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(25, 2, 'ISOLATOR 20/130', 'Fiber-20/125 (M)', 1, 26, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(26, 2, 'COUPLAR 2*2', 'Glue-Index Glue', 1, 27, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(27, 2, 'Fiber 30/250 (L)', 'Glue-Cavity Glue', 1, 28, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(28, 2, 'CARD Thermal Cabel', 'Glue-Sealing Glue', 1, 29, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(29, 2, 'BODY SMALL BODY', 'Glue-Heat Sink Glue', 1, 30, '2025-04-14 10:15:34', '2025-04-17 00:09:37'),
(30, 2, 'ISOLATOR 30/250', 'LD-30 (2)', 1, 26, '2025-04-14 10:15:35', '2025-05-29 19:59:42'),
(31, 2, 'COMBINER 3*1(30/250)', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(32, 2, 'RF rf card', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(33, 2, 'Fiber 20/125 (M)', 'Fiber-20/125 (M)', 1, 26, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(34, 3, 'part', 'Part', 1, 1, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(35, 3, 'temp', 'Temp no.', 1, 2, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(36, 3, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(37, 3, 'sr_no_fiber', 'SR (FIBER)', 0, 4, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(38, 3, 'mj', 'M.J', 1, 5, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(39, 3, 'warranty', 'Warranty', 1, 6, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(40, 3, 'type', 'Type', 1, 7, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(41, 3, '1', 'LD-15', 1, 8, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(42, 3, '2', 'LD-30', 1, 9, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(43, 3, '3', 'LD-45', 1, 10, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(44, 3, '15', 'AOM-QSWITCH', 1, 11, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(45, 3, '16', 'Fiber-10/130 (S)', 1, 12, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(46, 3, '18', 'COMBINER-3*1 (10*130)', 1, 13, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(47, 3, '19', 'HR-HR', 1, 14, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(48, 3, '20', 'CARD-Power PCB', 1, 15, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(49, 3, '21', 'CARD-Control Card', 1, 16, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(50, 3, '22', 'ISOLATOR-20/130', 1, 17, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(51, 3, '23', 'COUPLAR-2*2', 1, 18, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(52, 3, '26', 'Fiber-30/250 (L)', 1, 19, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(53, 3, '30', 'CARD-Thermal Cabel', 1, 20, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(54, 3, '31', 'BODY-SMALL BODY', 1, 21, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(55, 3, '32', 'BODY-BIG BODY', 1, 22, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(56, 3, '33', 'ISOLATOR-30/250', 1, 23, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(57, 3, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(58, 3, '35', 'RF-Rf Card', 1, 25, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(59, 3, '37', 'Fiber-20/125 (M)', 1, 26, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(60, 3, '38', 'Glue-Index Glue', 1, 27, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(61, 3, '39', 'Glue-Cavity Glue', 1, 28, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(62, 3, '40', 'Glue-Sealing Glue', 1, 29, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(63, 3, '41', 'Glue-Heat Sink Glue', 1, 30, '2025-04-15 07:26:03', '2025-04-15 07:26:03'),
(64, 4, 'part', 'Part', 1, 1, '2025-04-16 01:34:44', '2025-04-25 00:55:38'),
(65, 4, 'temp_no', 'Temp no.', 1, 2, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(66, 4, 'employee_name', 'EMPLOYEE NAME', 1, 3, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(67, 4, 'sr_fiber', 'SR (FIBER)', 1, 4, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(68, 4, 'mj', 'M.J', 1, 5, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(69, 4, 'warranty', 'Warranty', 1, 6, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(70, 4, 'type', 'Type', 1, 7, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(124, 5, '18', 'COMBINER-3*1 (10*130)', 1, 13, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(116, 5, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(75, 4, 'demo_1', 'Demo 1', 1, 31, '2025-04-16 01:34:44', '2025-04-25 00:55:38'),
(76, 4, '32', 'BODY-BIG BODY', 1, 22, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(77, 4, '33', 'ISOLATOR-30/250', 1, 23, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(78, 4, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(79, 4, '35', 'RF-Rf Card', 1, 25, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(80, 4, '37', 'Fiber-20/125 (M)', 1, 26, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(113, 5, 'part', 'Part', 1, 1, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(114, 5, 'temp', 'Temp no.', 1, 2, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(115, 5, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(135, 5, 'Demo 1', 'LD-30 (2)', 1, 26, '2025-05-29 20:10:18', '2025-07-14 18:05:04'),
(129, 5, '26', 'Fiber-30/250 (L)', 1, 19, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(128, 5, '23', 'COUPLAR-2*2', 1, 18, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(127, 5, '21', 'CARD-Control Card', 1, 16, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(126, 5, '20', 'CARD-Power PCB', 1, 15, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(125, 5, '19', 'HR-HR', 1, 14, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(117, 5, 'mj', 'M.J', 1, 5, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(118, 5, 'warranty', 'Warranty', 1, 6, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(119, 5, 'type', 'Type', 1, 7, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(120, 5, '1', 'LD-15', 1, 8, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(121, 5, '2', 'LD-30', 1, 9, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(122, 5, '15', 'AOM-QSWITCH', 1, 11, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(123, 5, '16', 'Fiber-10/130 (S)', 1, 12, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(111, 4, 'demo_2', 'Demo 2', 1, 27, '2025-04-25 00:55:38', '2025-04-25 00:55:38'),
(112, 4, 'demo_3', 'Demo 3', 1, 28, '2025-04-25 00:55:38', '2025-04-25 00:55:38'),
(130, 5, '30', 'CARD-Thermal Cabel', 1, 20, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(131, 5, '31', 'BODY-SMALL BODY', 1, 21, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(132, 5, '33', 'ISOLATOR-30/250', 1, 23, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(133, 5, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(134, 5, '35', 'RF-Rf Card', 1, 25, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(136, 6, 'part', 'Part', 1, 1, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(137, 6, 'temp', 'Temp no.', 1, 2, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(138, 6, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(139, 6, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(140, 6, 'mj', 'M.J', 1, 5, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(141, 6, 'warranty', 'Warranty', 1, 6, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(142, 6, 'type', 'Type', 1, 7, '2025-07-14 18:04:29', '2025-07-14 18:06:52'),
(143, 6, '22', 'ISOLATOR-20/130', 1, 17, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(144, 6, '26', 'Fiber-30/250 (L)', 1, 19, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(145, 6, '31', 'BODY-SMALL BODY', 1, 21, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(146, 6, '32', 'BODY-BIG BODY', 1, 22, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(147, 6, '33', 'ISOLATOR-30/250', 1, 23, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(148, 6, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-07-14 18:04:29', '2025-07-14 18:04:29');

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
(35, '2024_10_19_092629_create_tbl_leds_table', 16),
(38, '2024_10_17_095721_create_tbl_report_table', 17),
(40, '2024_10_24_115103_create_tbl_cards_table', 18),
(47, '2024_11_26_123248_create_tbl_purchase_returns_table', 25),
(49, '2024_11_26_125230_create_tbl_purchase_return_items_table', 26),
(63, '2024_10_05_120730_create_tbl_stock_table', 27),
(67, '2024_12_05_171216_create_tbltypes_table', 29),
(77, '2024_12_14_111805_create_tbl_acc_vaucher_table', 30),
(78, '2024_12_14_125527_create_tbl_acc_coa_table', 31),
(79, '2024_12_16_103502_create_tbl_acc_predefine_account_table', 32),
(80, '2024_12_17_155727_create_tbl_acc_transaction_table', 33),
(83, '2024_12_18_110529_create_tbl_bank_table', 34),
(84, '2024_12_10_164222_create_tbl_payments_table', 35),
(86, '2024_12_11_160151_create_tbl_customer_payments_table', 36),
(88, '2024_12_20_102925_create_tbl_sale_product_category_table', 38),
(89, '2024_12_20_132633_create_tbl_sale_product_subcategory_table', 39),
(90, '2024_11_19_131300_create_tbl_sales_table', 40),
(93, '2024_11_19_131446_create_tbl_sales_items_table', 41),
(96, '2024_11_25_180742_create_tbl_sale_returns_table', 42),
(97, '2024_11_21_111024_create_tbl_customers_table', 43),
(99, '2024_12_26_110413_create_web_settings_table', 44),
(102, '2024_12_02_153326_create_tbl_reports_items_table', 45),
(107, '2025_01_07_191651_create_gst_pdf_table', 46),
(109, '2024_12_19_164807_create_tbl_expensive_table', 47),
(111, '2024_11_20_181353_add_sale_status_to_tbl_reports', 48);

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
(1, 'view', NULL, '2024-10-08 22:58:34'),
(2, 'add', NULL, '2024-10-08 22:58:39'),
(3, 'edit', NULL, '2024-10-08 22:58:44'),
(4, 'delete', NULL, '2024-10-08 22:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `replacements`
--

CREATE TABLE `replacements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` varchar(191) NOT NULL,
  `old_item_id` varchar(191) NOT NULL,
  `new_item_id` varchar(191) NOT NULL,
  `date` date NOT NULL DEFAULT '2025-03-29',
  `old_sr_no` varchar(191) NOT NULL,
  `new_sr_no` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selected_invoices`
--

CREATE TABLE `selected_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scid` varchar(191) DEFAULT NULL,
  `invoice_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selected_invoices`
--

INSERT INTO `selected_invoices` (`id`, `scid`, `invoice_no`, `created_at`, `updated_at`) VALUES
(1, '1', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(2, '2', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(3, '3', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(4, '15', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(5, '16', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(6, '18', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(7, '19', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(8, '20', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(9, '21', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(10, '22', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(11, '23', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(12, '26', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(13, '30', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(14, '31', '4', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(15, '32', '4', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(16, '33', '8', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(17, '34', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(18, '35', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(19, '37', '3', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(20, '38', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(21, '39', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(22, '40', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(23, '41', '2', '2025-07-09 23:48:53', '2025-07-09 23:48:53'),
(24, '42', '7', '2025-07-09 23:48:53', '2025-07-09 23:48:53');

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
-- Table structure for table `tbl_acc_coa`
--

CREATE TABLE `tbl_acc_coa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `HeadCode` varchar(255) DEFAULT NULL,
  `HeadName` varchar(255) DEFAULT NULL,
  `PHeadName` varchar(255) DEFAULT NULL,
  `PHeadCode` varchar(255) DEFAULT NULL,
  `HeadLevel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_acc_coa`
--

INSERT INTO `tbl_acc_coa` (`id`, `HeadCode`, `HeadName`, `PHeadName`, `PHeadCode`, `HeadLevel`, `created_at`, `updated_at`) VALUES
(1, '10001', 'Assets', 'COA', '0', 1, '2024-12-14 07:38:03', '2024-12-14 07:38:03'),
(2, '10002', 'Liabilities', 'COA', '0', 1, '2024-12-14 07:38:12', '2024-12-14 07:38:12'),
(3, '20001', 'Current Asset', 'Assets', '10001', 2, '2024-12-14 07:38:26', '2024-12-14 07:38:26'),
(4, '20002', 'Fixed Assets', 'Assets', '10001', 2, '2024-12-14 07:38:38', '2024-12-14 07:38:38'),
(5, '20003', 'Long Term Liabilities', 'Liabilities', '10002', 2, '2024-12-14 07:38:59', '2024-12-14 07:38:59'),
(6, '20004', 'Current Liabilities', 'Liabilities', '10002', 2, '2024-12-14 07:39:07', '2024-12-14 07:39:07'),
(7, '30001', 'Goodwill', 'Fixed Assets', '20002', 3, '2024-12-14 07:52:55', '2024-12-14 07:52:55'),
(8, '30002', 'Cash', 'Current Asset', '20001', 3, '2024-12-14 07:53:21', '2024-12-14 07:53:21'),
(9, '40001', 'Cash In Hand', 'Cash', '30002', 4, '2024-12-14 07:53:35', '2024-12-16 01:32:02'),
(10, '30003', 'Prepaid Expenses', 'Current Asset', '20001', 3, '2024-12-16 02:03:55', '2024-12-16 02:03:55'),
(11, '30004', 'Inventory', 'Current Asset', '20001', 3, '2024-12-16 02:04:16', '2024-12-16 02:04:16'),
(12, '20005', 'Cost of Goods Sold', 'Liabilities', '10002', 2, '2024-12-16 02:08:13', '2024-12-16 02:08:13'),
(13, '30005', 'Cost of Goods Sold', 'Cost of Goods Sold', '20005', 3, '2024-12-16 02:08:34', '2024-12-16 02:08:34'),
(14, '30006', 'Depreciations', 'Current Liabilities', '20004', 3, '2024-12-16 02:15:03', '2024-12-16 02:15:03'),
(15, '30007', 'Long-Term Debt', 'Long Term Liabilities', '20003', 3, '2024-12-16 02:15:15', '2024-12-16 02:15:15'),
(16, '30008', 'Other Long-Term  Liabilities', 'Long Term Liabilities', '20003', 3, '2024-12-16 02:15:53', '2024-12-16 02:15:53'),
(17, '30009', 'Accounts Payable', 'Current Liabilities', '20004', 3, '2024-12-16 02:16:12', '2024-12-16 02:16:12'),
(18, '30022', 'Expenses', 'Current Liabilities', '20004', 3, '2024-12-16 02:16:25', '2025-05-14 22:06:26'),
(19, '30011', 'Provisions', 'Current Liabilities', '20004', 3, '2024-12-16 02:18:47', '2024-12-16 02:18:47'),
(20, '40002', 'Provision for State Income Tax', 'Provisions', '30011', 4, '2024-12-16 02:19:08', '2024-12-16 02:19:08'),
(21, '40003', 'Depreciation of Goodwill', 'Depreciations', '30006', 4, '2024-12-16 02:19:34', '2024-12-16 02:19:34'),
(22, '40004', 'Supplier Payable', 'Accounts Payable', '30009', 4, '2024-12-16 02:19:53', '2024-12-16 02:19:53'),
(23, '30012', 'Unearned Revenue', 'Current Liabilities', '20004', 3, '2024-12-16 02:20:21', '2024-12-16 02:20:21'),
(24, '40005', 'property sales', 'Unearned Revenue', '30012', 4, '2024-12-16 02:20:40', '2024-12-16 02:20:40'),
(25, '30013', 'Accounts Receivable', 'Current Asset', '20001', 3, '2024-12-16 02:22:51', '2024-12-16 02:22:51'),
(26, '30014', 'Advance', 'Current Asset', '20001', 3, '2024-12-16 02:22:58', '2024-12-16 02:22:58'),
(27, '30015', 'Inventory', 'Current Asset', '20001', 3, '2024-12-16 02:23:11', '2024-12-16 02:23:11'),
(28, '40006', 'Advance against Employee', 'Advance', '30014', 4, '2024-12-16 02:24:54', '2024-12-16 02:24:54'),
(29, '40007', 'Advance Against Customer', 'Advance', '30014', 4, '2024-12-16 02:25:08', '2024-12-16 02:25:08'),
(30, '40008', 'Customer Receivable', 'Accounts Receivable', '30013', 4, '2024-12-16 02:25:52', '2024-12-16 02:25:52'),
(31, '40009', 'Employee Receivable', 'Accounts Receivable', '30013', 4, '2024-12-16 02:26:26', '2024-12-16 02:26:26'),
(32, '40010', 'Inventory account', 'Inventory', '30004', 4, '2024-12-16 02:26:55', '2024-12-16 02:26:55'),
(33, '40011', 'Customer instants', 'Prepaid Expenses', '30003', 4, '2024-12-16 02:29:52', '2024-12-16 02:29:52'),
(34, '30016', 'Bank', 'Current Asset', '20001', 3, '2024-12-16 05:53:34', '2025-05-14 23:53:35'),
(35, '40012', 'Bank 1', 'Bank', '30016', 4, '2024-12-16 05:54:47', '2024-12-16 05:54:47'),
(36, '30017', 'Purchase Account', 'Cost of Goods Sold', '20005', 3, '2024-12-16 06:31:44', '2024-12-16 06:31:44'),
(37, '20006', 'Direct Income', 'Assets', '10001', 2, '2024-12-16 06:32:46', '2024-12-16 06:32:46'),
(38, '20007', 'Indirect Income', 'Assets', '10001', 2, '2024-12-16 06:32:59', '2024-12-16 06:32:59'),
(39, '30018', 'Sales Accounts', 'Direct Income', '20006', 3, '2024-12-16 06:33:13', '2024-12-16 06:33:13'),
(40, '30019', 'Construction Income', 'Direct Income', '20006', 3, '2024-12-16 06:33:25', '2024-12-16 06:33:25'),
(41, '30020', 'Reimbursement Income', 'Direct Income', '20006', 3, '2024-12-16 06:33:42', '2024-12-16 06:33:42'),
(51, '40016', 'Pretty Cash', 'Cash', '30002', 4, '2025-05-13 23:58:52', '2025-05-13 23:58:52'),
(43, '30023', 'Machinery', 'Fixed Assets', '20002', 3, '2024-12-17 05:46:56', '2024-12-17 05:46:56'),
(54, '40019', 'STICK WELL', 'Accounts Payable', '30009', 4, '2025-05-14 00:23:23', '2025-05-14 00:23:23'),
(45, '40001', 'Cruz Becker', 'Sales Accounts', '30018', 4, '2024-12-25 06:15:42', '2024-12-25 06:15:42'),
(50, '40015', 'JIGNESH RAMOLIYA', 'Accounts Receivable', '30013', 4, '2025-04-09 01:16:51', '2025-06-09 19:48:30'),
(52, '40017', 'STPL', 'Accounts Receivable', '30013', 4, '2025-05-14 00:03:23', '2025-05-14 00:03:23'),
(55, '40020', 'Amit Shukla ji', 'Accounts Payable', '30009', 4, '2025-05-14 01:19:06', '2025-05-15 17:50:10'),
(56, '40021', 'Office Expenses', 'Expenses', '30022', 4, '2025-05-14 22:07:34', '2025-05-14 22:07:34'),
(57, '40022', 'Rent Expenses', 'Expenses', '30022', 4, '2025-05-14 22:59:31', '2025-05-14 22:59:31'),
(59, '40024', 'YES BANK 12', 'Bank', '30016', 4, '2025-05-15 01:01:53', '2025-05-15 17:25:13'),
(61, '40025', 'AMAR SHUKLA', 'Accounts Payable', '30009', 4, '2025-05-16 01:19:35', '2025-05-16 01:19:35'),
(62, '40026', 'BHAWAN BODY', 'Accounts Payable', '30009', 4, '2025-05-16 01:22:28', '2025-06-09 19:59:55'),
(63, '40027', 'OPTOTUNE', 'Accounts Payable', '30009', 4, '2025-05-16 01:23:06', '2025-06-09 20:02:19'),
(64, '40028', 'DHARMESH CREATIVE', 'Accounts Receivable', '30013', 4, '2025-06-06 00:39:09', '2025-06-09 19:49:00'),
(65, '40029', 'PHOTON', 'Accounts Receivable', '30013', 4, '2025-06-06 00:42:40', '2025-06-09 19:48:02'),
(66, '40030', 'BHAVESH BHAI', 'Accounts Receivable', '30013', 4, '2025-06-06 00:44:51', '2025-06-09 19:52:14'),
(67, '40031', 'VRUNDAVAN', 'Accounts Receivable', '30013', 4, '2025-06-09 19:30:24', '2025-06-09 19:52:34'),
(68, '40032', 'Sunilbhai', 'Accounts Receivable', '30013', 4, '2025-07-10 22:03:29', '2025-07-10 22:03:29'),
(69, '40033', 'PRAYOSHA', 'Accounts Receivable', '30013', 4, '2025-07-12 00:24:07', '2025-07-12 00:24:07'),
(70, '40034', 'BHARATBHAI', 'Accounts Receivable', '30013', 4, '2025-07-12 21:49:15', '2025-07-12 21:49:15'),
(71, '40035', 'Arpit Bhai', 'Accounts Receivable', '30013', 4, '2025-07-14 17:35:14', '2025-07-14 17:35:14'),
(72, '40036', 'Priteshbhai Bhungadiya', 'Accounts Receivable', '30013', 4, '2025-07-14 17:36:21', '2025-07-14 17:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc_financial_years`
--

CREATE TABLE `tbl_acc_financial_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_acc_financial_years`
--

INSERT INTO `tbl_acc_financial_years` (`id`, `name`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2023-24', '2023-04-01', '2024-03-31', 0, '2025-05-16 00:29:00', '2025-05-16 00:37:35'),
(2, '2024-25', '2024-04-01', '2025-03-31', 0, '2025-05-16 00:37:58', '2025-05-16 00:38:32'),
(3, '2025-26', '2025-04-01', '2026-03-31', 1, '2025-05-16 00:38:21', '2025-05-16 00:38:32'),
(4, '2026-27', '2025-04-01', '2026-03-31', 0, '2025-05-16 00:41:25', '2025-05-16 00:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc_predefine_account`
--

CREATE TABLE `tbl_acc_predefine_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cashCode` int(11) DEFAULT NULL,
  `bankCode` int(11) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  `fixedAsset` int(11) DEFAULT NULL,
  `purchaseCode` int(11) DEFAULT NULL,
  `salesCode` int(11) DEFAULT NULL,
  `serviceCode` int(11) DEFAULT NULL,
  `customerCode` int(11) DEFAULT NULL,
  `supplierCode` int(11) DEFAULT NULL,
  `ExpenseCode` varchar(191) DEFAULT NULL,
  `costs_of_good_solds` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `inventoryCode` int(11) DEFAULT NULL,
  `CPLCode` int(11) DEFAULT NULL,
  `LPLCode` int(11) DEFAULT NULL,
  `salary_code` int(11) DEFAULT NULL,
  `emp_npf_contribution` int(11) DEFAULT NULL,
  `empr_npf_contribution` int(11) DEFAULT NULL,
  `emp_icf_contribution` int(11) DEFAULT NULL,
  `empr_icf_contribution` int(11) DEFAULT NULL,
  `prov_state_tax` int(11) DEFAULT NULL,
  `state_tax` int(11) DEFAULT NULL,
  `prov_npfcode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_acc_predefine_account`
--

INSERT INTO `tbl_acc_predefine_account` (`id`, `cashCode`, `bankCode`, `advance`, `fixedAsset`, `purchaseCode`, `salesCode`, `serviceCode`, `customerCode`, `supplierCode`, `ExpenseCode`, `costs_of_good_solds`, `vat`, `tax`, `inventoryCode`, `CPLCode`, `LPLCode`, `salary_code`, `emp_npf_contribution`, `empr_npf_contribution`, `emp_icf_contribution`, `empr_icf_contribution`, `prov_state_tax`, `state_tax`, `prov_npfcode`, `created_at`, `updated_at`) VALUES
(1, 30002, 30016, 30014, 20002, 30017, 30018, 3010401, 30013, 30009, '30022', 30005, 30021, 30021, 1020401, 2010201, 2010202, 4020501, 4020502, 4020503, 4021201, 0, 5020101, 4021101, 5020102, NULL, '2025-05-15 00:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc_transaction`
--

CREATE TABLE `tbl_acc_transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vid` varchar(255) DEFAULT NULL,
  `fyear` varchar(255) DEFAULT NULL,
  `VNo` varchar(255) DEFAULT NULL,
  `Vtype` varchar(255) DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` bigint(20) UNSIGNED DEFAULT NULL,
  `Narration` text DEFAULT NULL,
  `chequeNo` varchar(255) DEFAULT NULL,
  `chequeDate` date DEFAULT NULL,
  `ledgerComment` text DEFAULT NULL,
  `Debit` decimal(15,2) DEFAULT NULL,
  `Credit` decimal(15,2) DEFAULT NULL,
  `IsAppove` tinyint(1) NOT NULL DEFAULT 0,
  `RevCodde` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc_vaucher`
--

CREATE TABLE `tbl_acc_vaucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fyear` varchar(255) DEFAULT NULL,
  `VNo` varchar(255) DEFAULT NULL,
  `Vtype` varchar(255) DEFAULT NULL,
  `referenceNo` varchar(255) DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` bigint(20) UNSIGNED DEFAULT NULL,
  `Narration` text DEFAULT NULL,
  `ledgerComment` text DEFAULT NULL,
  `Debit` decimal(15,2) DEFAULT NULL,
  `Credit` decimal(15,2) DEFAULT NULL,
  `RevCodde` varchar(255) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `approvedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `approvedDate` timestamp NULL DEFAULT NULL,
  `isyearClosed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_acc_vaucher`
--

INSERT INTO `tbl_acc_vaucher` (`id`, `fyear`, `VNo`, `Vtype`, `referenceNo`, `VDate`, `COAID`, `Narration`, `ledgerComment`, `Debit`, `Credit`, `RevCodde`, `isApproved`, `approvedBy`, `approvedDate`, `isyearClosed`, `created_at`, `updated_at`) VALUES
(1, '0', 'JV-1', 'JV', '4', '2024-12-17', 30002, 'Sale Voucher', 'Sale Voucher for customer', 0.00, 1000.00, '2', 1, 4, '2024-12-16 13:00:00', NULL, NULL, NULL),
(2, '0', 'JV-2', 'JV', '7', '2024-12-18', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 10000.00, '3', 1, 4, '2024-12-17 13:00:00', NULL, NULL, NULL),
(3, '0', 'JV-3', 'JV', '8', '2024-12-18', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 4000.00, '2', 1, 4, '2024-12-17 13:00:00', NULL, NULL, NULL),
(4, '0', 'CV-1', 'CV', '9', '2024-12-25', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 100000.00, '2', 1, 4, '2024-12-24 13:00:00', NULL, '2024-12-25 02:17:29', '2024-12-25 02:17:29'),
(5, '0', 'CV-2', 'CV', '10', '2025-01-13', 30016, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 900.00, '6', 1, 4, '2025-01-12 18:30:00', NULL, '2025-01-13 13:16:21', '2025-01-13 13:16:21'),
(6, '0', 'CV-3', 'CV', '1', '2025-03-08', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 8000.00, '6', 1, 4, '2025-03-08 07:00:00', NULL, '2025-03-08 19:42:35', '2025-03-08 19:42:35'),
(7, '0', 'CV-4', 'CV', '1', '2025-06-20', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 90000.00, '1', 1, 4, '2025-06-20 07:00:00', NULL, '2025-06-20 18:38:06', '2025-06-20 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `HeadCode` varchar(255) NOT NULL,
  `bank_name` varchar(191) NOT NULL,
  `branch` varchar(191) DEFAULT NULL,
  `account_type` enum('HSS','CD','CC','OD') DEFAULT NULL,
  `account_number` varchar(191) NOT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `account_holder_name` varchar(191) DEFAULT NULL,
  `opening_balance` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id`, `HeadCode`, `bank_name`, `branch`, `account_type`, `account_number`, `ifsc_code`, `account_holder_name`, `opening_balance`, `created_at`, `updated_at`) VALUES
(1, '0', 'State Bank Of India', 'Katargam', 'CC', '4132464345', 'SBIN0016040', 'Shri DenisBhai Vora', '20000', '2024-12-18 01:54:15', '2024-12-18 01:54:15'),
(2, '0', 'Reserve Bank Of India', 'Katargam', 'CC', '4132412364345', 'RBIN0016040', 'Shri DenisBhai Vora RBI', '8000', '2024-12-18 07:10:29', '2024-12-18 07:10:29'),
(4, '40024', 'YES BANK 12', 'Nemo odit omnis fugi', 'OD', '864', 'Cum praesentium sit', 'Hiroko Gillespie', '78', '2025-05-15 01:03:43', '2025-05-15 17:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `main_category` varchar(191) DEFAULT NULL,
  `is_sellable` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `main_category`, `is_sellable`, `created_at`, `updated_at`) VALUES
(1, 'LD', 'Optical', 0, '2024-10-02 18:58:02', '2024-10-02 18:58:02'),
(6, 'HR', 'Optical', 0, '2024-10-22 00:29:53', '2024-10-22 00:29:53'),
(7, 'CARD', 'Electronic', 0, '2024-10-22 00:39:31', '2024-10-22 00:39:31'),
(8, 'ISOLATOR', 'Optical', 0, '2024-10-22 00:39:41', '2024-10-22 00:39:41'),
(9, 'AOM', 'Optical', 0, '2024-10-22 00:40:05', '2024-10-22 00:40:05'),
(10, 'Fiber', 'Optical', 0, '2024-10-22 00:40:51', '2024-10-22 00:57:54'),
(11, 'COMBINER', 'Optical', 0, '2024-10-22 00:42:56', '2024-10-22 00:42:56'),
(12, 'COUPLAR', 'Optical', 0, '2024-10-22 00:43:46', '2024-10-22 00:43:46'),
(25, 'RF', 'Electronic', 0, '2025-03-04 00:33:59', '2025-03-04 00:33:59'),
(26, 'BODY', 'Mechanical', 0, '2025-03-05 22:25:08', '2025-03-05 22:25:08'),
(27, 'Glue', 'Consumable', 0, '2025-03-07 23:42:44', '2025-03-07 23:42:44'),
(28, 'FAN', 'Electronic', 0, '2025-07-02 18:32:52', '2025-07-02 18:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) NOT NULL,
  `HeadCode` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `telephone_no` varchar(191) NOT NULL,
  `receiver_name` varchar(191) NOT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_pincode` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `customer_name`, `HeadCode`, `address`, `pincode`, `city`, `state`, `telephone_no`, `receiver_name`, `gst_no`, `ship_address`, `ship_pincode`, `ship_city`, `ship_state`, `created_at`, `updated_at`) VALUES
(1, 'JIGNESH RAMOLIYA', '40015', 'JR', '394230', 'Surat', 'Gujrat', '123', 'JIGNESH RAMOLIYA', NULL, 'VARACHHA', NULL, 'SURAT', 'GUJRAT', '2025-04-09 01:16:51', '2025-06-09 20:04:26'),
(2, 'STPL', '40017', 'SAHAJANAND TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '395002', 'SURAT', 'GUJARAT', '93434578798', 'STPL', '36AAACH7409R1Z1', 'Surat', '395002', 'SURAT', 'GUJARAT', '2025-05-14 00:03:23', '2025-06-09 20:05:39'),
(3, 'DHARMESH CREATIVE', '40028', 'KATARGAM', '395004', 'SURAT', 'GUJARAT', '721873615', 'DHARMESH CREATIVE', NULL, 'CREATIVE TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'SURAT', 'GUJARAT', '2025-06-06 00:39:09', '2025-06-09 20:06:31'),
(4, 'PHOTON', '40029', 'Phontom TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'SURAT', 'GUJARAT', '9874578', 'PHOTON', NULL, 'Phontom TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'SURATT', 'GUJARAT', '2025-06-06 00:42:40', '2025-06-09 20:08:06'),
(5, 'BHAVESH BHAI', '40030', 'SURAT, GUJARAT', '394230', 'SURAT', 'GUJARAT', '987564312', 'BHAVESH BHAI', NULL, 'BHAVESH TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'SURAT', 'GUJARAT', '2025-06-06 00:44:51', '2025-06-09 20:08:41'),
(6, 'VRUNDAVAN', '40031', 'SURAT, GUJARAT', '395004', 'SURAT', 'GUJARAT', '876613134', 'VRUNDAVAN', NULL, 'KATARGAM', '687201', 'SURAT', 'GUJARAT', '2025-06-09 19:30:24', '2025-06-09 20:09:25'),
(7, 'Sunilbhai', '40032', 'N/A', '364001', 'BHAWANAGAR', 'GUJRAT', '78954646', 'Sunilbhai', NULL, 'N/A', '364001', 'BHAWANAGAR', 'GUJRAT', '2025-07-10 22:03:29', '2025-07-10 22:03:29'),
(8, 'PRAYOSHA', '40033', 'N/A', '394230', 'Surat', 'Gujrat', '7895221456', 'PRAYOSHA', NULL, 'N/A', '394230', 'Surat', 'Gujrat', '2025-07-12 00:24:07', '2025-07-12 00:24:07'),
(9, 'BHARATBHAI', '40034', 'NA', '395006', 'SURAT', 'GUJARAT', '1234567890', 'MAKTECH', NULL, 'SURAT', '687201', 'SURAT', 'GUJARAT', '2025-07-12 21:49:15', '2025-07-12 21:49:15'),
(10, 'Arpit Bhai', '40035', 'NA', '394230', 'Surat', 'Gujrat', '4587611548', 'Arpit Bhai', '36AAACH7409R1Z1', 'NA', '394230', 'Surat', 'Gujrat', '2025-07-14 17:35:14', '2025-07-14 17:35:14'),
(11, 'Priteshbhai Bhungadiya', '40036', 'NA', '394230', 'Surat', 'Gujrat', '9788713523', 'Priteshbhai', NULL, 'NA', '394230', 'Surat', 'Gujrat', '2025-07-14 17:36:21', '2025-07-14 17:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_payments`
--

CREATE TABLE `tbl_customer_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sell_id` varchar(191) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `remaining_amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `transaction_type` varchar(191) DEFAULT NULL,
  `bank_id` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_holder_name` varchar(191) DEFAULT NULL,
  `branch_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `account_type` enum('HSS','CD','CC','OD') DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `cheque_no` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_payments`
--

INSERT INTO `tbl_customer_payments` (`id`, `customer_id`, `sell_id`, `amount_paid`, `remaining_amount`, `payment_date`, `payment_method`, `transaction_type`, `bank_id`, `bank_name`, `account_holder_name`, `branch_name`, `account_number`, `account_type`, `ifsc_code`, `cheque_no`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"1\"]', 90000.00, NULL, '2025-06-20', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-20 18:38:06', '2025-06-20 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expensive`
--

CREATE TABLE `tbl_expensive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) DEFAULT NULL,
  `HeadCode` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_type` enum('Cash','Bank') DEFAULT NULL,
  `transaction_type` varchar(191) DEFAULT NULL,
  `bank_id` varchar(191) DEFAULT NULL,
  `cheque_no` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_expensive`
--

INSERT INTO `tbl_expensive` (`id`, `date`, `HeadCode`, `name`, `amount`, `payment_type`, `transaction_type`, `bank_id`, `cheque_no`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2025-05-12', NULL, 'Chai', 50.00, 'Cash', NULL, NULL, NULL, NULL, '2025-05-12 19:39:48', '2025-05-12 19:39:48'),
(2, '2025-05-15', '40022', 'Rent', 60000.00, 'Bank', 'UPI', '2', '7821674541585', 'Rent Office', '2025-05-15 18:44:27', '2025-05-15 18:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opening_balances`
--

CREATE TABLE `tbl_opening_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance_date` date NOT NULL,
  `cash_on_hand` decimal(15,2) NOT NULL DEFAULT 0.00,
  `petty_cash` decimal(15,2) NOT NULL DEFAULT 0.00,
  `bank` decimal(15,2) NOT NULL DEFAULT 0.00,
  `investment_accounts` decimal(15,2) NOT NULL DEFAULT 0.00,
  `trade_receivables` decimal(15,2) NOT NULL DEFAULT 0.00,
  `loans_receivable` decimal(15,2) NOT NULL DEFAULT 0.00,
  `allowance_doubtful` decimal(15,2) NOT NULL DEFAULT 0.00,
  `raw_materials` decimal(15,2) NOT NULL DEFAULT 0.00,
  `work_in_progress` decimal(15,2) NOT NULL DEFAULT 0.00,
  `finished_goods` decimal(15,2) NOT NULL DEFAULT 0.00,
  `trade_payables` decimal(15,2) NOT NULL DEFAULT 0.00,
  `short_term_loans` decimal(15,2) NOT NULL DEFAULT 0.00,
  `long_term_loans` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax_payable` decimal(15,2) NOT NULL DEFAULT 0.00,
  `owners_capital` decimal(15,2) NOT NULL DEFAULT 0.00,
  `partners_capital` decimal(15,2) NOT NULL DEFAULT 0.00,
  `current_profit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_opening_balances`
--

INSERT INTO `tbl_opening_balances` (`id`, `balance_date`, `cash_on_hand`, `petty_cash`, `bank`, `investment_accounts`, `trade_receivables`, `loans_receivable`, `allowance_doubtful`, `raw_materials`, `work_in_progress`, `finished_goods`, `trade_payables`, `short_term_loans`, `long_term_loans`, `tax_payable`, `owners_capital`, `partners_capital`, `current_profit`, `created_at`, `updated_at`) VALUES
(1, '2025-04-01', 17.00, 67.00, 80.00, 97.00, 97.00, 10.00, 57.00, 3.00, 87.00, 74.00, 61.00, 24.00, 5.00, 95.00, 24.00, 34.00, 90.00, '2025-05-13 19:42:15', '2025-05-13 19:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parties`
--

CREATE TABLE `tbl_parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `HeadCode` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_parties`
--

INSERT INTO `tbl_parties` (`id`, `party_name`, `HeadCode`, `address`, `telephone_no`, `sender_name`, `created_at`, `updated_at`) VALUES
(8, 'OPTOTUNE', '40027', 'SHANGHAI, CHINA', '8615555151447', 'SHING CHANG', '2025-03-01 17:27:12', '2025-06-09 20:02:19'),
(10, 'AMAR SHUKLA', '40025', 'ADI, GUJARAT', '919879588265', 'AMAR SHUKLA', '2025-04-07 17:48:44', '2025-06-09 20:00:26'),
(11, 'BHAWAN BODY', '40026', 'ADI, GUJARAT', '919913068426', 'BHAWAN PATEL', '2025-04-07 17:49:41', '2025-06-09 20:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_id` varchar(191) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `remaining_amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `transaction_type` varchar(191) DEFAULT NULL,
  `bank_id` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_holder_name` varchar(191) DEFAULT NULL,
  `branch_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `account_type` enum('HSS','CD','CC','OD') DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `cheque_no` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `supplier_id`, `purchase_id`, `amount_paid`, `remaining_amount`, `payment_date`, `payment_method`, `transaction_type`, `bank_id`, `bank_name`, `account_holder_name`, `branch_name`, `account_number`, `account_type`, `ifsc_code`, `cheque_no`, `notes`, `created_at`, `updated_at`) VALUES
(1, 10, 'null', 20000.00, NULL, '2025-06-12', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RF, Card', '2025-06-12 22:22:50', '2025-06-12 22:22:50'),
(2, 11, 'null', 100000.00, NULL, '2025-06-19', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-19 18:44:22', '2025-06-19 18:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
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

INSERT INTO `tbl_purchases` (`id`, `main_category`, `date`, `invoice_no`, `currency`, `pid`, `amount`, `inr_rate`, `inr_amount`, `shipping_cost`, `round_amount`, `created_at`, `updated_at`) VALUES
(2, 'Electronic', '2025-06-09', '2', '₹', 10, 448550, 1.00, '448550.00', '0', '0', '2025-06-10 00:34:24', '2025-06-17 01:43:59'),
(3, 'Optical', '2025-06-13', '3', '¥', 8, 6499950, 12.30, '79949385.00', '7000', '0', '2025-06-13 17:38:52', '2025-06-18 20:08:41'),
(4, 'Mechanical', '2025-06-01', '4', '₹', 11, 300000, 80.00, '24000000.00', '0', '0', '2025-06-13 17:45:59', '2025-06-17 22:42:52'),
(7, 'Optical', '2025-06-16', '5', '₹', 8, 25000, 1.00, '25000.00', '0', '0', '2025-06-17 02:05:29', '2025-06-17 02:05:29'),
(8, 'Consumable', '2025-06-18', '6', '₹', 8, 186500, 1.00, '186500.00', '0', '0', '2025-06-18 20:11:55', '2025-06-18 20:11:55'),
(9, 'Electronic', '2025-07-02', '7', '₹', 8, 15000, 1.00, '15000.00', '0', '0', '2025-07-02 18:34:28', '2025-07-02 18:34:28'),
(10, 'Optical', '2025-07-09', '8', '₹', 8, 0, 1.00, '0.00', '0', '0', '2025-07-09 23:48:23', '2025-07-09 23:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_items`
--

CREATE TABLE `tbl_purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
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
(38, '2', '7', '20', 181, 'Pic', 1200.00, '0', 217200.00, '2025-06-17 01:43:59', '2025-06-17 01:43:59'),
(39, '2', '7', '21', 107, 'Pic', 1100.00, '0', 117700.00, '2025-06-17 01:43:59', '2025-06-17 01:43:59'),
(40, '2', '7', '30', 419, 'Pic', 50.00, '0', 20950.00, '2025-06-17 01:43:59', '2025-06-17 01:43:59'),
(41, '2', '25', '35', 103, 'Pic', 900.00, '0', 92700.00, '2025-06-17 01:43:59', '2025-06-17 01:43:59'),
(42, '5', '1', '1', 10, 'Pic', 2500.00, '0', 25000.00, '2025-06-17 02:05:29', '2025-06-17 02:05:29'),
(43, '4', '26', '31', 25, 'Pic', 5000.00, '0', 125000.00, '2025-06-17 22:42:52', '2025-06-17 22:42:52'),
(44, '4', '26', '32', 25, 'Pic', 7000.00, '0', 175000.00, '2025-06-17 22:42:52', '2025-06-17 22:42:52'),
(45, '3', '1', '1', 49, 'Pic', 2500.00, '0', 122500.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(46, '3', '1', '2', 29, 'Pic', 3500.00, '0', 101500.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(47, '3', '1', '3', 198, 'Pic', 5000.00, '0', 990000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(48, '3', '6', '19', 72, 'Pic', 200.00, '0', 14400.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(49, '3', '8', '33', 101, 'Pic', 7000.00, '0', 707000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(50, '3', '10', '16', 1000, 'Mtr', 426.00, '0', 426000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(51, '3', '11', '18', 307, 'Pic', 3100.00, '0', 951700.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(52, '3', '12', '23', 100, 'Pic', 2200.00, '0', 220000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(53, '3', '9', '15', 82, 'Pic', 6000.00, '0', 492000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(54, '3', '8', '22', 30, 'Pic', 6000.00, '0', 180000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(55, '3', '10', '26', 2223, 'Mtr', 450.00, '0', 1000350.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(56, '3', '11', '34', 307, 'Pic', 3500.00, '0', 1074500.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(57, '3', '10', '37', 500, 'Mtr', 440.00, '0', 220000.00, '2025-06-18 20:08:41', '2025-06-18 20:08:41'),
(58, '6', '27', '38', 3, 'Pic', 30000.00, '0', 90000.00, '2025-06-18 20:11:55', '2025-06-18 20:11:55'),
(59, '6', '27', '39', 565, 'Pic', 100.00, '0', 56500.00, '2025-06-18 20:11:55', '2025-06-18 20:11:55'),
(60, '6', '27', '40', 3, 'Pic', 10000.00, '0', 30000.00, '2025-06-18 20:11:55', '2025-06-18 20:11:55'),
(61, '6', '27', '41', 5, 'Pic', 2000.00, '0', 10000.00, '2025-06-18 20:11:55', '2025-06-18 20:11:55'),
(62, '7', '28', '42', 1000, 'Pic', 15.00, '0', 15000.00, '2025-07-02 18:34:28', '2025-07-02 18:34:28'),
(63, '8', '1', '1', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(64, '8', '1', '2', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(65, '8', '1', '3', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(66, '8', '9', '15', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(67, '8', '8', '33', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(68, '8', '8', '22', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_returns`
--

CREATE TABLE `tbl_purchase_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `p_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_purchase_returns`
--

INSERT INTO `tbl_purchase_returns` (`id`, `date`, `p_id`, `invoice_no`, `created_at`, `updated_at`) VALUES
(1, '2025-06-19', 11, '4', '2025-06-19 18:42:10', '2025-06-19 18:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_return_items`
--

CREATE TABLE `tbl_purchase_return_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `cid` bigint(20) UNSIGNED DEFAULT NULL,
  `scid` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_purchase_return_items`
--

INSERT INTO `tbl_purchase_return_items` (`id`, `invoice_no`, `cid`, `scid`, `qty`, `unit`, `price`, `reason`, `created_at`, `updated_at`) VALUES
(1, '4', 26, 31, 2, 'Pic', 5000.00, 'scretch', '2025-06-19 18:42:10', '2025-06-19 18:42:10'),
(2, '4', 26, 32, 5, 'Pic', 7000.00, 'scretch', '2025-06-19 18:42:46', '2025-06-19 18:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part` int(11) DEFAULT NULL,
  `f_status` int(11) DEFAULT NULL,
  `indate` date DEFAULT NULL,
  `worker_name` varchar(255) DEFAULT NULL,
  `sr_no_fiber` varchar(255) DEFAULT NULL,
  `m_j` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note1` text DEFAULT NULL,
  `note2` text DEFAULT NULL,
  `section` varchar(191) DEFAULT '0',
  `remark` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `temp` varchar(191) DEFAULT NULL,
  `r_status` int(11) DEFAULT NULL,
  `party_name` int(11) DEFAULT NULL,
  `final_amount` int(11) DEFAULT NULL,
  `extra_line` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_line`)),
  `stock_status` varchar(191) DEFAULT '0',
  `outdate` date DEFAULT NULL,
  `sale_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`id`, `part`, `f_status`, `indate`, `worker_name`, `sr_no_fiber`, `m_j`, `type`, `note1`, `note2`, `section`, `remark`, `status`, `temp`, `r_status`, `party_name`, `final_amount`, `extra_line`, `stock_status`, `outdate`, `sale_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-12', NULL, 'C24210215', NULL, '3', 'Beam Off', 'PCB CHANGE', '0', NULL, 1, NULL, 0, 6, 1250, '[]', '1', NULL, '0', '2025-06-09 22:27:10', '2025-07-12 22:54:05'),
(3, 0, 1, '2025-07-03', 'D 2', 'K25210291', NULL, '3', NULL, NULL, '4', NULL, 0, '131', 0, NULL, 27500, '[]', '0', '2025-07-03', '1', '2025-06-13 18:13:25', '2025-07-03 19:45:47'),
(4, 1, 1, NULL, NULL, 'K24210186', NULL, '3', 'Watt Down', NULL, '2', NULL, 0, NULL, 0, 1, 3400, '[]', '0', NULL, '0', '2025-06-16 17:52:04', '2025-07-02 19:37:42'),
(5, 0, 1, '2025-07-03', 'ABC', 'C25250001', NULL, '4', NULL, NULL, '4', NULL, 1, '96', 0, NULL, 11500, '[]', '0', '2025-07-03', '1', '2025-06-17 02:01:36', '2025-07-03 19:45:47'),
(6, 0, 1, '2025-06-18', 'ISHITA', 'C25210292', NULL, '3', '19.7 w', NULL, '0', NULL, 1, '0', 1, NULL, 34300, '[]', '1', '2025-06-18', '1', '2025-06-17 22:49:45', '2025-06-27 17:41:33'),
(7, 1, 1, '2025-07-03', 'D1, DENIZ', 'C24210162', NULL, '3', 'CHANGE FAN, COMBINER WATT 53', 'FAN CHANGE, NOW DONE', '4', 'USER SIDE THI DONE CHE.\r\nFAN CHANGE KARO', 1, '0', 0, NULL, 29380, '[]', '0', '2025-07-02', '1', '2025-07-02 18:14:38', '2025-07-02 18:54:47'),
(8, 1, 1, NULL, NULL, 'C25250004', NULL, '4', 'POWER PCB PROBLEM', NULL, '2', NULL, 0, NULL, 0, 1, 4800, '[]', '0', NULL, '0', '2025-07-04 18:33:45', '2025-07-04 19:46:04'),
(9, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '108', 0, NULL, 4600, '[]', '0', NULL, '0', '2025-07-06 00:24:13', '2025-07-06 00:24:13'),
(10, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '215', 0, NULL, 14300, '[]', '0', NULL, '0', '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(11, 0, 1, NULL, NULL, NULL, NULL, NULL, 'C24210156', NULL, '1', NULL, NULL, 'C24210156', 0, NULL, 16350, '[]', '0', NULL, '0', '2025-07-08 20:24:18', '2025-07-08 20:24:18'),
(12, 0, 1, NULL, NULL, NULL, NULL, NULL, 'NEW', NULL, '1', NULL, NULL, '101', 0, NULL, 8300, '[]', '0', NULL, '0', '2025-07-09 00:11:19', '2025-07-09 00:11:19'),
(13, 0, 1, '2025-07-09', 'N1/I1', 'K25210329', NULL, '3', 'fiber small 4.5', 'Final fiber out watt:20,amp:11', '0', NULL, 1, '0', 1, NULL, 65826, '[]', '1', NULL, '0', '2025-07-09 17:49:05', '2025-07-09 18:22:45'),
(14, 0, 1, NULL, NULL, NULL, NULL, NULL, '20 W/ 11A', NULL, '1', NULL, NULL, '222', 0, NULL, 17900, '[]', '0', NULL, '0', '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(15, 1, 1, NULL, NULL, 'K25210186', NULL, '3', 'BEAM OFF', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-09 19:25:41', '2025-07-09 19:25:41'),
(16, 0, 1, NULL, NULL, 'K25210323', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 35550, '[]', '0', NULL, '0', '2025-07-09 20:03:03', '2025-07-10 17:36:04'),
(17, 0, 1, '2025-07-09', 'N1,Komal,D1', 'K25210307', NULL, '3', 'QS:- 301811', NULL, '0', 'LD SR-no  AOM SWITCH SR NO BAKI 6E...', 1, '0', 1, NULL, 89200, '[]', '1', NULL, '0', '2025-07-09 22:10:54', '2025-07-09 22:41:42'),
(18, 0, 1, '2025-07-09', 'VISUU, N1,Komal', 'K25210322', NULL, '3', 'ELECTRIC Side OK\r\nCAVITY OK\r\nBIG CAVITY OK', NULL, '0', 'ZXHZBB2522  Wrong 6e...', 1, '0', 1, NULL, 69250, '[]', '1', NULL, '0', '2025-07-09 23:09:03', '2025-07-09 23:14:41'),
(19, 0, 1, '2025-07-12', 'Anjali/Dhruvi', 'K25210251', NULL, '3', 'Cavity ok', NULL, '0', NULL, 1, '0', 1, NULL, 47428, '[]', '1', NULL, '0', '2025-07-09 23:51:01', '2025-07-13 00:03:43'),
(20, 0, 1, NULL, 'Sweta', 'K25210252', NULL, '3', 'k.v.t ok', NULL, '1', NULL, 0, '0', 1, NULL, 37852, '[]', '0', NULL, '0', '2025-07-10 00:10:51', '2025-07-12 22:53:38'),
(21, 0, 1, NULL, 'MIRA', 'K25210253', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 33278, '[]', '0', NULL, '0', '2025-07-10 00:19:53', '2025-07-12 22:55:16'),
(22, 0, 1, NULL, 'MIRA', 'K25210254', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 47428, '[]', '0', NULL, '0', '2025-07-10 00:27:00', '2025-07-12 22:56:22'),
(23, 0, 1, NULL, 'MIRA', 'C25210255', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 33302, '[]', '0', NULL, '0', '2025-07-10 00:33:41', '2025-07-12 22:59:41'),
(24, 0, 1, NULL, 'MIRA', 'K25210259', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 32852, '[]', '0', NULL, '0', '2025-07-10 00:39:50', '2025-07-12 23:01:33'),
(25, 0, 1, NULL, 'VAISHU/DHRUVI', 'K25210260', NULL, '3', 'kvt ok', NULL, '1', 'ISOLATOR(REMOVE)-EBBD16070', 0, '0', 1, NULL, 32852, '[]', '0', NULL, '0', '2025-07-10 00:46:32', '2025-07-12 23:09:58'),
(26, 0, 1, NULL, 'MANSI', 'K25210261', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 48680, '[]', '0', NULL, '0', '2025-07-10 00:53:28', '2025-07-12 23:12:09'),
(27, 0, 1, NULL, 'PRIYA/SWETA/RASHMI', 'C25210262', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 51078, '[]', '0', NULL, '0', '2025-07-10 00:59:44', '2025-07-12 23:21:20'),
(28, 0, 1, NULL, 'Anjali/Dhruvi', 'K25210264', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 32052, '[]', '0', NULL, '0', '2025-07-10 01:05:14', '2025-07-12 23:24:15'),
(29, 0, 1, NULL, 'MIRA/PRIYA', 'K25210265', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 37082, '[]', '0', NULL, '0', '2025-07-10 01:13:55', '2025-07-12 23:26:18'),
(30, 0, 1, NULL, 'Anjali/Dhruvi', 'K25210266', NULL, '3', 'kvt ok', NULL, '1', NULL, 0, '0', 1, NULL, 37052, '[]', '0', NULL, '0', '2025-07-10 01:20:36', '2025-07-12 23:28:17'),
(31, 0, 1, NULL, 'KETAN/SWETA', 'K25210267', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 17550, '[]', '0', NULL, '0', '2025-07-10 18:46:34', '2025-07-12 23:30:47'),
(32, 0, 1, NULL, 'KETAN/DHRUVI', 'K25210268', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 19350, '[]', '0', NULL, '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(33, 0, 1, NULL, 'VAISHU/KOMAL', 'K25210269', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 16950, '[]', '0', NULL, '0', '2025-07-10 19:18:05', '2025-07-12 23:40:22'),
(34, 0, 1, NULL, 'MIRA/PRIYA/RASHMI', 'C25210271', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 35250, '[]', '0', NULL, '0', '2025-07-10 19:25:40', '2025-07-12 23:42:49'),
(35, 0, 1, NULL, 'KETAN/KOMAL', 'C25210273', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 20950, '[]', '0', NULL, '0', '2025-07-10 19:33:46', '2025-07-12 23:45:09'),
(36, 0, 1, NULL, 'MIRA', 'C25210274', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 20950, '[]', '0', NULL, '0', '2025-07-10 19:51:01', '2025-07-12 23:47:54'),
(37, 0, 1, NULL, 'KOMAL', 'C25210275', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 42350, '[]', '0', NULL, '0', '2025-07-10 20:05:25', '2025-07-13 00:07:53'),
(38, 0, 1, NULL, 'ANJALI/MIRA', 'K25210276', NULL, '3', 'THERE IS NO ISOLATOR NO. IN REPORT', NULL, '1', '20W/10.80A', 0, '0', 0, NULL, 39650, '[]', '0', NULL, '0', '2025-07-10 20:16:32', '2025-07-13 00:07:13'),
(39, 0, 1, NULL, 'DHRUVI', 'K25210277', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 16950, '[]', '0', NULL, '0', '2025-07-10 20:23:06', '2025-07-13 00:11:39'),
(40, 0, 1, NULL, 'V/S', 'K25210278', NULL, '3', 'NEED TO CHECK(14.5W,11.7A)', NULL, '1', NULL, 0, '0', 0, NULL, 16950, '[]', '0', NULL, '0', '2025-07-10 20:28:09', '2025-07-14 17:41:17'),
(41, 1, 0, NULL, 'D/I', '10BK02B50', NULL, '1', 'Watt Down', NULL, '2', NULL, 0, '0', 0, 7, NULL, '[]', '0', NULL, '0', '2025-07-10 22:05:25', '2025-07-11 19:49:24'),
(42, 1, 1, NULL, NULL, 'C02309007', NULL, '1', 'BEAM OFF', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-11 19:52:37', '2025-07-11 19:52:37'),
(43, 1, 1, NULL, NULL, 'K24210187', NULL, '3', 'Beam off', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-11 20:10:18', '2025-07-11 20:10:18'),
(44, 1, 1, NULL, NULL, 'K24210207', NULL, '3', 'Watt Down', NULL, '2', '20W/10.8A', 0, '0', 0, 1, 1650, '[]', '0', NULL, '0', '2025-07-11 20:14:22', '2025-07-12 22:43:14'),
(45, 1, 1, '2025-07-11', 'D-1/I-2', 'C24210149', NULL, '3', 'Watt Down 7 Time Repeat', NULL, '4', '20W/8.50A', 1, '0', 0, 1, 1200, '[]', '0', '2025-07-11', '1', '2025-07-12 00:21:33', '2025-07-12 01:41:04'),
(46, 1, 1, '2025-07-11', 'D-1/I-2', 'M24210083', NULL, '4', 'Fan Off', NULL, '0', '20W/10.60A', 1, '0', 0, 1, 2191, '[]', '1', NULL, '0', '2025-07-12 00:22:26', '2025-07-12 01:39:39'),
(47, 1, 0, '2025-07-11', 'D-1/I-2', '10BK19C18', NULL, '1', 'Beam Mode Change', NULL, '4', '14.3W/12.70A', 1, '0', 0, 8, 6326, '[]', '0', '2025-07-11', '1', '2025-07-12 00:24:46', '2025-07-12 20:27:59'),
(48, 1, 0, '2025-07-11', 'D-1/I-2', 'C02112009', NULL, '1', 'Beam Off', NULL, '0', '14WATT/11A\r\nCOUPLER JOINT ONLY', 1, '0', 0, 2, NULL, '[]', '1', NULL, '0', '2025-07-12 00:26:20', '2025-07-12 01:38:28'),
(49, 1, 1, NULL, NULL, 'M2404210051', NULL, '3', 'Woot down', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-12 17:49:31', '2025-07-12 17:49:31'),
(50, 1, 1, NULL, 'D/I', 'K25210284', NULL, '3', 'Beam Off/Power Off', NULL, '2', '20.5W/12.50A', 0, '0', 0, 1, 900, '[]', '0', NULL, '0', '2025-07-12 20:13:54', '2025-07-12 22:46:20'),
(51, 1, 0, NULL, NULL, '10262115B1103', NULL, '1', 'BEAM OFF', NULL, '2', NULL, 0, '0', 0, 9, NULL, '[]', '0', NULL, '0', '2025-07-12 21:50:38', '2025-07-12 21:57:50'),
(52, 1, 1, NULL, NULL, 'K25210187', NULL, '3', 'Watt down', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-12 22:20:50', '2025-07-12 22:21:39'),
(53, 1, 1, NULL, NULL, 'M,24180018', NULL, '2', 'Watt down', NULL, '2', NULL, 0, NULL, 0, 10, NULL, '[]', '0', NULL, '0', '2025-07-14 17:37:32', '2025-07-14 17:37:32'),
(54, 1, 1, NULL, NULL, 'C02201067', NULL, '1', 'Chalu maa bim vayu jai che  8 var Repeat', NULL, '2', NULL, 0, NULL, 0, 11, NULL, '[]', '0', NULL, '0', '2025-07-14 17:43:51', '2025-07-14 17:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports_items`
--

CREATE TABLE `tbl_reports_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scid` varchar(191) DEFAULT NULL,
  `unit` varchar(191) DEFAULT NULL,
  `report_id` varchar(191) DEFAULT NULL,
  `dead_status` varchar(191) DEFAULT NULL,
  `tblstock_id` varchar(191) DEFAULT NULL,
  `sr_no` varchar(191) DEFAULT NULL,
  `used_qty` varchar(191) DEFAULT NULL,
  `amp` varchar(191) DEFAULT NULL,
  `volt` varchar(191) DEFAULT NULL,
  `watt` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_reports_items`
--

INSERT INTO `tbl_reports_items` (`id`, `scid`, `unit`, `report_id`, `dead_status`, `tblstock_id`, `sr_no`, `used_qty`, `amp`, `volt`, `watt`, `created_at`, `updated_at`) VALUES
(55, '21', 'Pic', '3', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(56, '20', 'Pic', '3', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(53, '20', 'Pic', '3', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(54, '1', 'Pic', '3', '0', '25', 'ZXHZBA0955', '1', '4.2', '1.2', '2.10', '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(61, '1', 'Pic', '5', '0', '5', 'ZXHZAZ7629', '1', '12.4', '12.3', '12.2', '2025-07-03 19:27:42', '2025-07-03 19:27:42'),
(60, '30', 'Pic', '5', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-03 19:27:42', '2025-07-03 19:27:42'),
(59, '21', 'Pic', '5', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-03 19:27:42', '2025-07-03 19:27:42'),
(58, '20', 'Pic', '5', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-03 19:27:42', '2025-07-03 19:27:42'),
(57, '35', 'Pic', '5', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-03 19:27:42', '2025-07-03 19:27:42'),
(31, '15', 'Pic', '6', '0', '19', 'GA250429FQ3904656', '1', '231', '2.524', '14', '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(30, '18', 'Pic', '6', '0', '18', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(29, '23', 'Pic', '6', '0', '17', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(28, '21', 'Pic', '6', '0', '2', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(27, '1', 'Pic', '6', '0', '6', 'ZXHZBA9007', '1', '7.5', '1.4', '2.1', '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(26, '19', 'Pic', '6', '0', '16', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(25, '20', 'Pic', '6', '0', '1', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(24, '35', 'Pic', '6', '0', '4', '0', '1', NULL, NULL, NULL, '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(32, '33', 'Pic', '6', '0', '20', 'ISOLATER7894549', '1', '15', '15', '12', '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(42, '34', 'Pic', '7', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(41, '33', 'Pic', '7', '0', '22', 'EBBD0826', '1', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(40, '26', 'Mtr', '7', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(43, '42', 'Pic', '7', '1', '24', '0', '4', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(44, '42', 'Pic', '7', '0', '24', '0', '4', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(45, '1', 'Pic', '4', '0', '7', 'ZXHZBB2382', '1', NULL, NULL, NULL, '2025-07-02 19:37:42', '2025-07-02 19:37:42'),
(46, '35', 'Pic', '4', '0', '4', '0', '5', NULL, NULL, NULL, '2025-07-02 19:37:42', '2025-07-02 19:37:42'),
(52, '15', 'Pic', '3', '0', '26', 'GA241129FQ278380', '1', NULL, NULL, NULL, '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(65, '20', 'Pic', '8', '1', '1', '0', '3', NULL, NULL, NULL, '2025-07-04 19:46:04', '2025-07-04 19:46:04'),
(64, '20', 'Pic', '8', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-04 19:46:04', '2025-07-04 19:46:04'),
(66, '1', 'Pic', '9', '0', '8', 'ZXHZBB2610', '1', '10', '4.1', '1.5', '2025-07-06 00:24:13', '2025-07-06 00:24:13'),
(67, '20', 'Pic', '9', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-06 00:24:13', '2025-07-06 00:24:13'),
(68, '35', 'Pic', '9', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-06 00:24:13', '2025-07-06 00:24:13'),
(69, '2', 'Pic', '10', '0', '27', 'ZXHZBB7722', '1', '2.9', '2.48', '2.3', '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(70, '2', 'Pic', '10', '0', '34', 'ZXHZBC5376', '1', '4', '2.8', '1.5', '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(71, '20', 'Pic', '10', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(72, '21', 'Pic', '10', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(73, '31', 'Pic', '10', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(1054, '20', 'Pic', '11', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(1053, '32', 'Pic', '11', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(1052, '2', 'Pic', '11', '0', '29', 'ZXHZBC5481', '1', '1.0', '2.49', '3.2', '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(1051, '2', 'Pic', '11', '0', '28', 'ZXHZBC5355', '1', '1.0', '2.48', '2.3', '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(80, '2', 'Pic', '12', '0', '30', 'ZXHZBB7707', '1', '2.9', '2.1', '1', '2025-07-09 00:11:19', '2025-07-09 00:11:19'),
(81, '1', 'Pic', '12', '0', '9', 'ZXHZBB2672', '1', '1.0', '2.48', '1.5', '2025-07-09 00:11:19', '2025-07-09 00:11:19'),
(82, '20', 'Pic', '12', '1', '1', '0', '2', NULL, NULL, NULL, '2025-07-09 00:11:19', '2025-07-09 00:11:19'),
(83, '21', 'Pic', '12', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-09 00:11:19', '2025-07-09 00:11:19'),
(130, '26', 'Mtr', '13', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(129, '20', 'Pic', '13', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(128, '1', 'Pic', '13', '0', '10', 'ZXHZBA9056', '1', '8', '5', '4', '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(127, '21', 'Pic', '13', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(126, '30', 'Pic', '13', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(124, '34', 'Pic', '13', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(125, '2', 'Pic', '13', '0', '31', 'ZXHZBC5273', '1', '1', '5', '2', '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(123, '23', 'Pic', '13', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-09 18:08:29', '2025-07-09 18:08:29'),
(131, '1', 'Pic', '14', '0', '11', 'ZXHZBB5551', '1', '2.96', '2.97', '2.22', '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(132, '2', 'Pic', '14', '0', '32', 'ZXHZBC5484', '1', '8.34', '7.53', '16.00', '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(133, '2', 'Pic', '14', '0', '33', 'ZXHZBC5311', '1', '8.34', '7.53', '16.00', '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(134, '35', 'Pic', '14', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(135, '19', 'Pic', '14', '0', '16', '0', '1', NULL, NULL, NULL, '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(136, '20', 'Pic', '14', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(137, '21', 'Pic', '14', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(138, '31', 'Pic', '14', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-09 19:15:21', '2025-07-09 19:15:21'),
(364, '1', 'Pic', '16', '0', '12', 'ZXHZBA9059', '1', '2.78', '2.91', '2.24', '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(365, '21', 'Pic', '16', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(361, '2', 'Pic', '16', '0', '36', 'ZXHZBB9113', '1', '8.31', '7.98', '17', '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(362, '20', 'Pic', '16', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(363, '2', 'Pic', '16', '0', '35', 'ZXHZBB9026', '1', '8.31', '7.98', '17', '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(360, '30', 'Pic', '16', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-10 17:36:04', '2025-07-10 17:36:04'),
(215, '31', 'Pic', '17', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(214, '19', 'Pic', '17', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(213, '23', 'Pic', '17', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(212, '35', 'Pic', '17', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(211, '30', 'Pic', '17', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(210, '1', 'Pic', '17', '0', '13', 'ZXHZBB2598', '1', '4', '4', '4', '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(209, '2', 'Pic', '17', '0', '37', 'ZXHZBD3433', '1', '7', '7', '7', '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(208, '2', 'Pic', '17', '0', '38', 'ZXHZBB7737', '1', '8', '8', '8', '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(207, '20', 'Pic', '17', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(206, '21', 'Pic', '17', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(205, '34', 'Pic', '17', '1', '21', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(204, '34', 'Pic', '17', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-09 22:40:26', '2025-07-09 22:40:26'),
(256, '31', 'Pic', '18', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(255, '35', 'Pic', '18', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(254, '30', 'Pic', '18', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(253, '21', 'Pic', '18', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(252, '20', 'Pic', '18', '1', '1', '0', '3', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(251, '2', 'Pic', '18', '0', '40', 'ZXHZBD5064', '1', '8.31', '7.98', '17.00', '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(250, '2', 'Pic', '18', '1', '39', 'ZXHZBD5033', '1', '8.31', '7.98', '17.00', '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(249, '20', 'Pic', '18', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(248, '2', 'Pic', '18', '0', '42', 'ZXHZBB9156', '1', '8.31', '7.98', '17.00', '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(247, '23', 'Pic', '18', '0', '17', '0', '2', NULL, NULL, NULL, '2025-07-09 23:13:18', '2025-07-09 23:13:18'),
(257, '20', 'Pic', '1', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-09 23:15:25', '2025-07-09 23:15:25'),
(258, '30', 'Pic', '1', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-09 23:15:25', '2025-07-09 23:15:25'),
(708, '30', 'Pic', '19', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(707, '35', 'Pic', '19', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(706, '2', 'Pic', '19', '0', '61', 'ZXHZBB7747', '1', '9.07', '7.55', '18.24', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(705, '1', 'Pic', '19', '0', '59', 'ZXHZAV4338', '1', '3.01', '3.00', '2.36', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(702, '20', 'Pic', '19', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(703, '31', 'Pic', '19', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(721, '16', 'Mtr', '20', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(720, '31', 'Pic', '20', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(719, '15', 'Pic', '20', '0', '66', 'GA241129FQ278417', '1', NULL, NULL, '760', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(718, '20', 'Pic', '20', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(717, '21', 'Pic', '20', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(716, '30', 'Pic', '20', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(715, '35', 'Pic', '20', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(738, '26', 'Mtr', '21', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(737, '19', 'Pic', '21', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(736, '3', 'Pic', '21', '0', '68', 'ZXHZAV4479', '1', '10.40', '11.53', '28.60', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(735, '1', 'Pic', '21', '0', '67', 'ZXHZAW2358', '1', '2.50', '2.47', '1.60', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(734, '35', 'Pic', '21', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(733, '30', 'Pic', '21', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(753, '19', 'Pic', '22', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(752, '3', 'Pic', '22', '0', '72', 'ZXHZAY1372', '1', '8.55', '11.25', '24.00', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(751, '1', 'Pic', '22', '0', '71', 'ZXHZAV4456', '1', '3.35', '2.95', '2.11', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(750, '35', 'Pic', '22', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(749, '30', 'Pic', '22', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(748, '21', 'Pic', '22', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(767, '23', 'Pic', '23', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(766, '16', 'Mtr', '23', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(765, '31', 'Pic', '23', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(764, '15', 'Pic', '23', '0', '78', 'GA241129FQ278399', '1', NULL, NULL, '900', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(763, '3', 'Pic', '23', '0', '77', 'ZXHZBB7721', '1', '8.38', '11.65', '24.52', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(762, '20', 'Pic', '23', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(783, '23', 'Pic', '24', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(782, '16', 'Mtr', '24', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(781, '31', 'Pic', '24', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(780, '15', 'Pic', '24', '0', '82', 'GA240719FQ258462', '1', NULL, NULL, '990', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(779, '3', 'Pic', '24', '0', '81', 'ZXHZAY1415', '1', '8.33', '11.65', '22.28', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(778, '20', 'Pic', '24', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(798, '23', 'Pic', '25', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(797, '16', 'Mtr', '25', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(796, '31', 'Pic', '25', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(795, '15', 'Pic', '25', '0', '86', 'GA24040FQ239069', '1', NULL, NULL, '740', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(794, '2', 'Pic', '25', '0', '85', 'ZXHZBC5324', '1', '8.33', '7.57', '15.00', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(793, '20', 'Pic', '25', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(816, '19', 'Pic', '26', '1', '16', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(815, '16', 'Mtr', '26', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(814, '34', 'Pic', '26', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(813, '3', 'Pic', '26', '0', '88', 'ZXHZAY1360', '1', '8.80', '11.49', '23.70', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(812, '1', 'Pic', '26', '0', '87', 'ZXHZAV7875', '1', '3.20', '2.50', '2.73', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(811, '35', 'Pic', '26', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(831, '32', 'Pic', '27', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(830, '3', 'Pic', '27', '0', '92', 'ZXHZBB5555', '1', '8.70', '11.63', '24.23', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(829, '1', 'Pic', '27', '0', '91', 'ZXHZAV7893', '1', '3.13', '2.48', '2.25', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(828, '35', 'Pic', '27', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(827, '30', 'Pic', '27', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(826, '21', 'Pic', '27', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(846, '23', 'Pic', '28', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(845, '16', 'Mtr', '28', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(844, '31', 'Pic', '28', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(843, '15', 'Pic', '28', '0', '98', 'GA241129FQ278357', '1', NULL, NULL, '780', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(842, '2', 'Pic', '28', '0', '97', 'ZXHZBC0329', '1', NULL, NULL, '16.00', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(841, '20', 'Pic', '28', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(861, '23', 'Pic', '29', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(860, '16', 'Mtr', '29', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(859, '31', 'Pic', '29', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(858, '15', 'Pic', '29', '0', '102', 'GA241129FQ278358', '1', NULL, NULL, '640', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(857, '20', 'Pic', '29', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(856, '21', 'Pic', '29', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(855, '30', 'Pic', '29', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(876, '16', 'Mtr', '30', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(875, '31', 'Pic', '30', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(874, '15', 'Pic', '30', '0', '106', 'GA241129FQ278332', '1', NULL, NULL, '800', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(873, '20', 'Pic', '30', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(872, '21', 'Pic', '30', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(871, '30', 'Pic', '30', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(870, '35', 'Pic', '30', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(704, '2', 'Pic', '19', '0', '60', 'ZHHZBC0272', '1', '9.07', '7.55', '18.27', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(701, '15', 'Pic', '19', '0', '62', 'GA241129FQ278369', '1', NULL, NULL, '680', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(700, '23', 'Pic', '19', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(699, '16', 'Mtr', '19', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(698, '19', 'Pic', '19', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(697, '34', 'Pic', '19', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(714, '1', 'Pic', '20', '0', '63', 'ZXHZBA3341', '1', '2.78', '2.84', '2.02', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(713, '3', 'Pic', '20', '0', '64', 'ZXHZBC0318', '1', '8.04', '5.73', '24.38', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(712, '2', 'Pic', '20', '0', '65', 'ZXHZAC447', '1', '8.04', '5.73', '19.2', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(732, '21', 'Pic', '21', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(731, '20', 'Pic', '21', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(730, '3', 'Pic', '21', '0', '69', 'ZXHZAV4480', '1', '10.40', '11.53', '28.90', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(729, '15', 'Pic', '21', '0', '70', 'GA240719FQ258476', '1', NULL, NULL, '770', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(728, '16', 'Mtr', '21', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(727, '23', 'Pic', '21', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(747, '20', 'Pic', '22', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(746, '3', 'Pic', '22', '0', '73', 'ZXHZAY0343', '1', '8.55', '11.25', '24.04', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(745, '15', 'Pic', '22', '0', '74', 'GA240719FQ258471', '1', NULL, NULL, '940', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(744, '31', 'Pic', '22', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(743, '16', 'Mtr', '22', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(742, '23', 'Pic', '22', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(761, '21', 'Pic', '23', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(760, '30', 'Pic', '23', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(759, '35', 'Pic', '23', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(758, '1', 'Pic', '23', '0', '75', 'ZXHZBA6443', '1', '3.50', '2.50', '3,00', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(757, '3', 'Pic', '23', '0', '76', 'ZXHZBC0399', '1', '8.38', '11.65', '24.66', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(777, '21', 'Pic', '24', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(776, '30', 'Pic', '24', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(775, '35', 'Pic', '24', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(774, '1', 'Pic', '24', '0', '79', 'ZXHZAV4432', '1', '3.33', '2.48', '2.46', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(773, '3', 'Pic', '24', '0', '80', 'ZXHZAY1310', '1', '8.33', '11.65', '22.10', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(792, '21', 'Pic', '25', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(791, '30', 'Pic', '25', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(790, '35', 'Pic', '25', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(789, '1', 'Pic', '25', '0', '83', 'ZXHZAV4375', '1', '2.75', '2.48', '2.01', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(788, '2', 'Pic', '25', '0', '84', 'ZXHZBC5465', '1', '8.33', '7.57', '15.00', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(810, '30', 'Pic', '26', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(809, '21', 'Pic', '26', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(808, '20', 'Pic', '26', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(807, '3', 'Pic', '26', '0', '89', 'ZXHZAY1457', '1', '8.80', '11.49', '24.26', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(806, '15', 'Pic', '26', '0', '90', 'GA240719FQ258484', '1', NULL, NULL, '570', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(825, '20', 'Pic', '27', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(824, '3', 'Pic', '27', '0', '93', 'ZXHZBA9278', '1', NULL, NULL, '24.50', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(823, '15', 'Pic', '27', '0', '94', 'GA241129FQ278402', '1', NULL, NULL, '900', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(822, '16', 'Mtr', '27', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(805, '31', 'Pic', '26', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(804, '16', 'Mtr', '26', '1', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(803, '19', 'Pic', '26', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(821, '23', 'Pic', '27', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(820, '19', 'Pic', '27', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(840, '21', 'Pic', '28', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(839, '30', 'Pic', '28', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(838, '35', 'Pic', '28', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(837, '1', 'Pic', '28', '0', '95', 'ZXHZAV5081', '1', '2.88', '2.84', '2.22', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(836, '2', 'Pic', '28', '0', '96', 'ZXHZBD3379', '1', '8.49', '7.65', '16.00', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(854, '35', 'Pic', '29', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(853, '1', 'Pic', '29', '0', '99', 'ZXHZAV5065', '1', '2.75', '2.84', '2.36', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(852, '2', 'Pic', '29', '0', '100', 'ZXHZBD4356', '1', '8.84', '7.40', '18.24', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(851, '2', 'Pic', '29', '0', '101', 'ZXHZBD4876', '1', NULL, NULL, '16.72', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(869, '1', 'Pic', '30', '0', '103', 'ZXHZAU9899', '1', '2.61', '2.84', '2.20', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(868, '2', 'Pic', '30', '0', '104', 'ZXHZBC9458', '1', '8.44', '7.49', '16.0', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(867, '2', 'Pic', '30', '0', '105', 'ZXHZBC9471', '1', NULL, NULL, '16.0', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(888, '2', 'Pic', '31', '0', '109', 'ZXHZBB7801', '1', NULL, NULL, '16.00', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(887, '2', 'Pic', '31', '0', '108', 'ZXHZBC0787', '1', '8.86', '7.58', '16.00', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(886, '1', 'Pic', '31', '0', '107', 'ZXHZAV1432', '1', '2.35', '2.51', '2.25', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(885, '30', 'Pic', '31', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(884, '21', 'Pic', '31', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(883, '20', 'Pic', '31', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(882, '20', 'Pic', '31', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(900, '2', 'Pic', '32', '0', '113', 'ZXHZBC7083', '1', NULL, NULL, '16.0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(899, '2', 'Pic', '32', '0', '112', 'ZXHZBC9570', '1', '8.70', '7.55', '16.0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(898, '1', 'Pic', '32', '0', '111', 'ZXHZAV5131', '1', '2.75', '2.46', '2.1', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(897, '35', 'Pic', '32', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(896, '30', 'Pic', '32', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(895, '21', 'Pic', '32', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(894, '20', 'Pic', '32', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(893, '20', 'Pic', '32', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(911, '2', 'Pic', '33', '0', '117', 'ZXHZAB8581', '1', NULL, NULL, '16.00', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(910, '2', 'Pic', '33', '0', '116', 'ZXHBB7907', '1', '8.44', '7.56', '15.01', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(909, '1', 'Pic', '33', '0', '115', 'ZXHZAV5001', '1', '3.01', '3.05', '2.10', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(908, '35', 'Pic', '33', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(907, '30', 'Pic', '33', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(906, '21', 'Pic', '33', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(905, '20', 'Pic', '33', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(937, '15', 'Pic', '34', '0', '122', 'GA241129FQ278404', '1', NULL, NULL, '820', '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(936, '3', 'Pic', '34', '0', '121', 'ZXHZAY5446', '1', NULL, NULL, '23.00', '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(935, '32', 'Pic', '34', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(934, '35', 'Pic', '34', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(933, '30', 'Pic', '34', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(932, '21', 'Pic', '34', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(931, '20', 'Pic', '34', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(946, '2', 'Pic', '35', '0', '124', 'ZXHZBC5300', '1', NULL, NULL, '16.06', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(945, '1', 'Pic', '35', '0', '123', 'ZXHZAV3704', '1', '3.12', '2.49', '2.35', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(944, '20', 'Pic', '35', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(943, '21', 'Pic', '35', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(942, '30', 'Pic', '35', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(941, '35', 'Pic', '35', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(940, '32', 'Pic', '35', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(957, '3', 'Pic', '36', '0', '128', 'ZXHZBA0748', '1', '7.50', '11.54', '24.37', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(956, '1', 'Pic', '36', '0', '127', 'ZXHZAZ7078', '1', '2.90', '2.51', '2.23', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(955, '20', 'Pic', '36', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(954, '21', 'Pic', '36', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(953, '30', 'Pic', '36', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(952, '35', 'Pic', '36', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(951, '32', 'Pic', '36', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(1015, '33', 'Pic', '37', '0', '167', 'EBBD16102', '1', '8.50', NULL, '20', '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1014, '26', 'Mtr', '37', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1013, '3', 'Pic', '37', '0', '132', 'ZXHZAZ2471', '1', '8.70', '11.66', '24.66', '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1012, '1', 'Pic', '37', '0', '131', 'ZXHZBA4662', '1', '2.72', '2.50', '2.11', '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1011, '20', 'Pic', '37', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1010, '21', 'Pic', '37', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1009, '30', 'Pic', '37', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1003, '15', 'Pic', '38', '0', '138', 'GA241129FQ278336', '1', NULL, NULL, '930', '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1002, '2', 'Pic', '38', '0', '34', 'ZXHZBC5376', '1', NULL, NULL, '18.00', '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1001, '31', 'Pic', '38', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1000, '35', 'Pic', '38', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(999, '30', 'Pic', '38', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(998, '21', 'Pic', '38', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1022, '2', 'Pic', '39', '0', '140', 'ZXHZBB7726', '1', '9.35', '7.62', '19.40', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1021, '1', 'Pic', '39', '0', '139', 'ZXHZAU9984', '1', '2.75', '2.84', '2.02', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1020, '20', 'Pic', '39', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1019, '21', 'Pic', '39', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1018, '30', 'Pic', '39', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1017, '35', 'Pic', '39', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1016, '31', 'Pic', '39', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1072, '20', 'Pic', '40', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1071, '1', 'Pic', '40', '0', '143', 'ZXHZBA3179', '1', '2.80', '2.69', '2.22', '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1070, '15', 'Pic', '40', '0', '145', 'GA241129FQ278476', '1', NULL, NULL, '650', '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1069, '31', 'Pic', '40', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1066, '21', 'Pic', '40', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1068, '30', 'Pic', '40', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(680, '33', 'Pic', '41', '0', '146', 'GGYGWFGWG', '1', '12.5', NULL, '15.0', '2025-07-11 19:49:24', '2025-07-11 19:49:24'),
(681, '19', 'Pic', '47', '0', '16', '0', '1', NULL, NULL, NULL, '2025-07-12 00:34:06', '2025-07-12 00:34:06'),
(682, '16', 'Mtr', '47', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 00:34:06', '2025-07-12 00:34:06'),
(683, '23', 'Pic', '47', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 00:34:06', '2025-07-12 00:34:06'),
(684, '34', 'Pic', '47', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 00:34:06', '2025-07-12 00:34:06'),
(685, '20', 'Pic', '45', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 00:35:42', '2025-07-12 00:35:42'),
(686, '42', 'Pic', '46', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(687, '21', 'Pic', '46', '0', '2', '0', '2', NULL, NULL, NULL, '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(688, '3', 'Pic', '46', '0', '147', 'XXHXAH3386', '1', '9.0', '11.66', '17', '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(689, '3', 'Pic', '46', '0', '148', 'WXHXAV0741', '1', '9.0', '11.66', '15', '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(690, '19', 'Pic', '46', '0', '16', '0', '1', NULL, NULL, NULL, '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(691, '16', 'Mtr', '46', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(692, '26', 'Mtr', '46', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(696, '26', 'Mtr', '50', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:46:20', '2025-07-12 22:46:20'),
(694, '20', 'Pic', '44', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 22:43:14', '2025-07-12 22:43:14'),
(695, '26', 'Mtr', '44', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:43:14', '2025-07-12 22:43:14'),
(709, '21', 'Pic', '19', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(710, '26', 'Mtr', '19', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(711, '33', 'Pic', '19', '0', '149', 'EBBDI6061', '1', '12.50', NULL, '20', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(722, '23', 'Pic', '20', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(723, '19', 'Pic', '20', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(724, '34', 'Pic', '20', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(725, '26', 'Mtr', '20', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(726, '33', 'Pic', '20', '0', '150', 'EBBD16125', '1', '11.70', NULL, '20', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(739, '31', 'Pic', '21', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(740, '26', 'Mtr', '21', '0', '23', '0', '6.5', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(741, '33', 'Pic', '21', '0', '151', 'EBBD16081', '1', '8', NULL, '21.5', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(754, '34', 'Pic', '22', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(755, '26', 'Mtr', '22', '0', '23', '0', '6.5', NULL, NULL, NULL, '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(756, '33', 'Pic', '22', '0', '152', 'EBBD16080', '1', '8.30', NULL, '20', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(768, '19', 'Pic', '23', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(769, '34', 'Pic', '23', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(770, '26', 'Mtr', '23', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(771, '33', 'Pic', '23', '0', '153', 'EBBD16088', '1', NULL, NULL, '25', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(772, '26', 'Mtr', '23', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(784, '19', 'Pic', '24', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(785, '34', 'Pic', '24', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(786, '26', 'Mtr', '24', '0', '23', '0', '6.50', NULL, NULL, NULL, '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(787, '33', 'Pic', '24', '0', '154', 'EBBD16085', '1', '8.50', NULL, '22', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(799, '34', 'Pic', '25', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(800, '19', 'Pic', '25', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(801, '26', 'Mtr', '25', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(802, '33', 'Pic', '25', '0', '155', 'EBBC16901', '1', '11.20', NULL, '22.40', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(817, '23', 'Pic', '26', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(818, '26', 'Mtr', '26', '0', '23', '0', '6.50', NULL, NULL, NULL, '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(819, '33', 'Pic', '26', '0', '156', 'EBBD16118', '1', '9', NULL, '20', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(832, '18', 'Pic', '27', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(833, '26', 'Mtr', '27', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(834, '26', 'Mtr', '27', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(835, '33', 'Pic', '27', '0', '157', 'EBBC07981', '1', '10.20', NULL, '22', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(847, '18', 'Pic', '28', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(848, '19', 'Pic', '28', '0', '16', '0', '1', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(849, '26', 'Mtr', '28', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(850, '33', 'Pic', '28', '0', '158', 'EBBC08032', '1', '11.50', NULL, '21.3', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(862, '19', 'Pic', '29', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(863, '18', 'Pic', '29', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(864, '42', 'Pic', '29', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(865, '26', 'Mtr', '29', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(866, '33', 'Pic', '29', '0', '159', 'EBBC09762', '1', '11.50', NULL, '20.4', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(877, '23', 'Pic', '30', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(878, '18', 'Pic', '30', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(879, '19', 'Pic', '30', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(880, '26', 'Mtr', '30', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(881, '33', 'Pic', '30', '0', '160', 'EBBC09471', '1', '11.70', NULL, '20.1', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(889, '15', 'Pic', '31', '0', '110', 'GA241129FQ278366', '1', NULL, NULL, '620', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(890, '31', 'Pic', '31', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(891, '26', 'Mtr', '31', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(892, '33', 'Pic', '31', '0', '161', 'EBBD16104', '1', '11.50', NULL, '20.4', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(901, '15', 'Pic', '32', '0', '114', 'GA241129FQ278355', '1', NULL, NULL, '710', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(902, '31', 'Pic', '32', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(903, '26', 'Mtr', '32', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(904, '33', 'Pic', '32', '0', '162', 'EBBC17639', '1', '11.50', NULL, '20.3', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(912, '15', 'Pic', '33', '0', '118', 'GA241129FQ278341', '1', NULL, NULL, '610', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(913, '31', 'Pic', '33', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(914, '26', 'Mtr', '33', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(915, '33', 'Pic', '33', '0', '163', 'EBBB03849', '1', '11.50', NULL, '20.2', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(930, '20', 'Pic', '34', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(929, '1', 'Pic', '34', '0', '119', 'ZXHZBA6558', '1', '2.80', '2.50', '2.14', '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(928, '3', 'Pic', '34', '0', '120', 'ZXHZBA0949', '1', '9.00', '11.66', '23.00', '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(938, '26', 'Mtr', '34', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(939, '33', 'Pic', '34', '0', '164', 'EBBC10606', '1', '7.50', NULL, '20.1', '2025-07-12 23:42:49', '2025-07-12 23:42:49'),
(947, '3', 'Pic', '35', '0', '125', 'ZXHZAY5479', '1', '9.30', '8.87', '24.60', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(948, '15', 'Pic', '35', '0', '126', 'GA241129FQ278395', '1', NULL, NULL, '680', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(949, '26', 'Mtr', '35', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(950, '33', 'Pic', '35', '0', '165', 'EBBD16103', '1', '9.50', NULL, '20', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(958, '3', 'Pic', '36', '0', '129', 'ZXHZAZ9028', '1', NULL, NULL, '24.30', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(959, '15', 'Pic', '36', '0', '130', 'GA241129FQ278405', '1', NULL, NULL, '870', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(960, '26', 'Mtr', '36', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(961, '33', 'Pic', '36', '0', '166', 'EBBD16097', '1', '9', NULL, '22', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(1008, '35', 'Pic', '37', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1006, '3', 'Pic', '37', '0', '133', 'ZXHZAZ2455', '1', NULL, NULL, '24.31', '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1007, '32', 'Pic', '37', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(1005, '15', 'Pic', '37', '0', '134', 'GA241129FQ278396', '1', NULL, NULL, '710', '2025-07-13 00:07:53', '2025-07-13 00:07:53'),
(997, '20', 'Pic', '38', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(996, '1', 'Pic', '38', '0', '135', 'ZXHZAV0022', '1', '2.66', '3.90', '3.15', '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(995, '2', 'Pic', '38', '0', '29', 'ZXHZBC5481', '1', '10.06', '7.58', '18.17', '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1004, '26', 'Mtr', '38', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-13 00:07:13', '2025-07-13 00:07:13'),
(1023, '2', 'Pic', '39', '0', '141', 'ZXHZBC5331', '1', NULL, NULL, '18.80', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1024, '15', 'Pic', '39', '0', '142', 'GA240719FQ258447', '1', NULL, NULL, '690', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1025, '26', 'Mtr', '39', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1026, '33', 'Pic', '39', '0', '169', 'EBBD16059', '1', '11.10', NULL, '20', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(1067, '3', 'Pic', '40', '0', '144', 'ZXHZBC0334', '1', '12.01', '5.70', '32.02', '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1065, '35', 'Pic', '40', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1055, '30', 'Pic', '11', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(1056, '21', 'Pic', '11', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 17:32:53', '2025-07-14 17:32:53'),
(1073, '33', 'Pic', '40', '0', '170', 'EBBD16065', '1', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17'),
(1074, '26', 'Mtr', '40', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 17:41:17', '2025-07-14 17:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_permission`
--

CREATE TABLE `tbl_report_permission` (
  `id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `field_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`field_name`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_report_permission`
--

INSERT INTO `tbl_report_permission` (`id`, `user_type`, `field_name`, `created_at`, `updated_at`) VALUES
(1, 'electric', '[\"part\",\"temp\"]', '2025-05-18 00:44:46', '2025-05-19 18:53:45'),
(2, 'godown', '[\"sr_no_fiber\",\"warranty\",\"type\"]', '2025-05-19 18:55:55', '2025-05-19 18:55:55'),
(3, 'user', '[\"part\",\"temp\",\"worker_name\",\"sr_no_fiber\",\"mj\",\"warranty\",\"type\"]', '2025-05-28 21:41:20', '2025-05-28 21:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` varchar(191) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `repair_status` varchar(191) DEFAULT '0',
  `amount_r` decimal(12,2) DEFAULT NULL,
  `shipping_cost` decimal(12,2) DEFAULT NULL,
  `round_total` decimal(12,2) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `sale_id`, `sale_date`, `customer_id`, `status`, `repair_status`, `amount_r`, `shipping_cost`, `round_total`, `amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1', '2025-06-18', 1, '0', '0', 90000.00, 0.00, 0.00, 90000.00, NULL, '2025-06-18 19:17:22', '2025-06-18 19:17:22'),
(2, '2', '2025-07-02', 2, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-02 18:54:47', '2025-07-02 18:54:47'),
(3, '3', '2025-07-03', 6, '0', '0', 240000.00, 0.00, 0.00, 240000.00, NULL, '2025-07-03 19:45:47', '2025-07-03 19:45:47'),
(4, '4', '2025-07-11', 1, '0', '1', 1100.00, 0.00, 0.00, 1100.00, NULL, '2025-07-12 01:41:04', '2025-07-12 01:41:04'),
(5, '5', '2025-07-11', 8, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-12 20:27:59', '2025-07-12 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_items`
--

CREATE TABLE `tbl_sales_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sid` varchar(191) DEFAULT NULL,
  `sale_id` varchar(191) DEFAULT NULL,
  `report_id` varchar(191) DEFAULT NULL,
  `cname` varchar(191) DEFAULT NULL,
  `scname` varchar(191) DEFAULT NULL,
  `unit` varchar(191) DEFAULT NULL,
  `sr_no` varchar(191) DEFAULT NULL,
  `qty` varchar(191) DEFAULT NULL,
  `rate` varchar(191) DEFAULT NULL,
  `p_tax` varchar(191) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sales_items`
--

INSERT INTO `tbl_sales_items` (`id`, `sid`, `sale_id`, `report_id`, `cname`, `scname`, `unit`, `sr_no`, `qty`, `rate`, `p_tax`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '6', '1', '6', 'Pic', 'C25210292', '1', '90000', '0', 90000.00, '0', '2025-06-18 19:17:22', '2025-06-18 19:17:22'),
(2, '2', '2', '7', '1', '6', 'Pic', 'C24210162', '1', '0', '0', 0.00, '0', '2025-07-02 18:54:47', '2025-07-02 18:54:47'),
(3, '3', '3', '5', '1', '7', 'Pic', 'C25250001', '1', '145000', '0', 145000.00, '0', '2025-07-03 19:45:47', '2025-07-03 19:45:47'),
(4, '3', '3', '3', '1', '6', 'Pic', 'K25210291', '1', '95000', '0', 95000.00, '0', '2025-07-03 19:45:47', '2025-07-03 19:45:47'),
(5, '4', '4', '45', '1', '6', 'Pic', 'C24210149', '1', '1100', '0', 1100.00, '0', '2025-07-12 01:41:04', '2025-07-12 01:41:04'),
(6, '5', '5', '47', '1', '4', 'Pic', '10BK19C18', '1', '0', '0', 0.00, '0', '2025-07-12 20:27:59', '2025-07-12 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_product_category`
--

CREATE TABLE `tbl_sale_product_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sale_product_category`
--

INSERT INTO `tbl_sale_product_category` (`id`, `name`, `is_type`, `created_at`, `updated_at`) VALUES
(1, 'Fiber', '1', '2024-12-20 01:23:37', '2024-12-20 01:28:19'),
(5, 'Key Chain', NULL, '2025-05-15 00:00:24', '2025-05-15 00:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_product_subcategory`
--

CREATE TABLE `tbl_sale_product_subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `spcid` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `unit` varchar(191) DEFAULT NULL,
  `sr_no` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sale_product_subcategory`
--

INSERT INTO `tbl_sale_product_subcategory` (`id`, `spcid`, `name`, `unit`, `sr_no`, `created_at`, `updated_at`) VALUES
(4, 1, '15', 'Pic', 1, '2024-12-20 06:37:00', '2024-12-20 06:39:58'),
(5, 1, '18', 'Pic', 1, '2024-12-20 06:37:08', '2024-12-20 06:39:52'),
(6, 1, '21', 'Pic', 1, '2024-12-20 06:37:24', '2024-12-20 06:39:46'),
(7, 1, '25', 'Pic', 1, '2024-12-20 06:39:27', '2025-05-25 01:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_returns`
--

CREATE TABLE `tbl_sale_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `customer_id` varchar(191) DEFAULT NULL,
  `sale_id` varchar(191) DEFAULT NULL,
  `sr_no` varchar(191) DEFAULT NULL,
  `cid` varchar(191) DEFAULT NULL,
  `scid` varchar(191) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(191) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `reason` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sale_returns`
--

INSERT INTO `tbl_sale_returns` (`id`, `date`, `customer_id`, `sale_id`, `sr_no`, `cid`, `scid`, `qty`, `unit`, `price`, `reason`, `created_at`, `updated_at`) VALUES
(1, '2025-06-27', '1', '1', 'C25210292', '1', '6', 1, 'Pic', 90000.00, 'abc', '2025-06-27 17:41:33', '2025-06-27 17:41:33');

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
  `dead_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `date`, `invoice_no`, `cid`, `scid`, `serial_no`, `qty`, `price`, `priceofUnit`, `status`, `dead_status`, `created_at`, `updated_at`) VALUES
(1, '2025-06-09', '2', 7, 20, '0', 181, 217200.00, 1200.00, '1', NULL, '2025-06-17 01:45:52', '2025-06-17 02:01:36'),
(2, '2025-06-09', '2', 7, 21, '0', 107, 117700.00, 1100.00, '1', NULL, '2025-06-17 01:47:16', '2025-06-17 02:01:36'),
(3, '2025-06-09', '2', 7, 30, '0', 419, 20950.00, 50.00, '1', NULL, '2025-06-17 01:47:30', '2025-06-17 02:01:36'),
(4, '2025-06-09', '2', 25, 35, '0', 103, 92700.00, 900.00, '1', NULL, '2025-06-17 01:47:38', '2025-06-17 02:01:36'),
(5, '2025-06-13', '3', 1, 1, 'ZXHZAZ7629', 1, 122500.00, 2500.00, '1', '0', '2025-06-17 02:01:36', '2025-07-03 19:27:42'),
(6, '2025-06-16', '5', 1, 1, 'ZXHZBA9007', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-06-17 22:59:24'),
(7, '2025-06-16', '5', 1, 1, 'ZXHZBB2382', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-07-02 19:37:42'),
(8, '2025-06-16', '5', 1, 1, 'ZXHZBB2610', 1, 25000.00, 2500.00, '1', NULL, '2025-06-17 02:11:12', '2025-07-06 00:24:13'),
(9, '2025-06-16', '5', 1, 1, 'ZXHZBB2672', 1, 25000.00, 2500.00, '1', NULL, '2025-06-17 02:11:12', '2025-07-09 00:11:19'),
(10, '2025-06-16', '5', 1, 1, 'ZXHZBA9056', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-07-09 18:08:29'),
(11, '2025-06-16', '5', 1, 1, 'ZXHZBB5551', 1, 25000.00, 2500.00, '1', NULL, '2025-06-17 02:11:12', '2025-07-09 19:15:21'),
(12, '2025-06-16', '5', 1, 1, 'ZXHZBA9059', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-07-10 17:36:04'),
(13, '2025-06-16', '5', 1, 1, 'ZXHZBB2598', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-07-09 22:40:26'),
(14, '2025-06-16', '5', 1, 1, 'ZXHZBB2522', 1, 25000.00, 2500.00, '0', '0', '2025-06-17 02:11:12', '2025-07-09 23:12:35'),
(15, '2025-06-16', '5', 1, 1, 'ZXHZBB2330', 1, 25000.00, 2500.00, '0', NULL, '2025-06-17 02:11:12', '2025-06-17 02:11:12'),
(16, '2025-06-13', '3', 6, 19, '0', 72, 14400.00, 200.00, '1', NULL, '2025-06-17 22:49:45', '2025-06-17 22:49:45'),
(17, '2025-06-13', '3', 12, 23, '0', 100, 220000.00, 2200.00, '0', NULL, '2025-06-17 22:56:12', '2025-06-17 22:56:12'),
(18, '2025-06-13', '3', 11, 18, '0', 307, 951700.00, 3100.00, '0', NULL, '2025-06-17 22:56:12', '2025-06-17 22:56:12'),
(19, '2025-06-13', '3', 9, 15, 'GA250429FQ3904656', 1, 492000.00, 6000.00, '1', '0', '2025-06-17 22:56:12', '2025-06-17 22:59:24'),
(20, '2025-06-13', '3', 8, 33, 'ISOLATER7894549', 1, 707000.00, 7000.00, '1', '0', '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(21, '2025-06-13', '3', 11, 34, '0', 307, 1074500.00, 3500.00, '1', NULL, '2025-07-02 18:14:38', '2025-07-02 18:14:38'),
(22, '2025-06-13', '3', 8, 33, 'EBBD0826', 1, 707000.00, 7000.00, '1', '0', '2025-07-02 18:19:59', '2025-07-02 18:46:50'),
(23, '2025-06-13', '3', 10, 26, '0', 2223, 1000350.00, 450.00, '0', NULL, '2025-07-02 18:19:59', '2025-07-02 18:19:59'),
(24, '2025-07-02', '7', 28, 42, '0', 1000, 15000.00, 15.00, '0', NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(25, '2025-06-13', '3', 1, 1, 'ZXHZBA0955', 1, 122500.00, 2500.00, '1', '0', '2025-07-03 19:25:40', '2025-07-03 19:26:56'),
(26, '2025-06-13', '3', 9, 15, 'GA241129FQ278380', 1, 492000.00, 6000.00, '1', '0', '2025-07-03 19:25:40', '2025-07-03 19:26:56'),
(27, '2025-06-13', '3', 1, 2, 'ZXHZBB7722', 1, 101500.00, 3500.00, '1', NULL, '2025-07-08 19:33:42', '2025-07-08 20:21:04'),
(28, '2025-06-13', '3', 1, 2, 'ZXHZBC5355', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-14 17:32:53'),
(29, '2025-06-13', '3', 1, 2, 'ZXHZBC5481', 1, 101500.00, 3500.00, '0', '0', '2025-07-08 19:33:42', '2025-07-14 17:32:53'),
(30, '2025-06-13', '3', 1, 2, 'ZXHZBB7707', 1, 101500.00, 3500.00, '1', NULL, '2025-07-08 19:33:42', '2025-07-09 00:11:19'),
(31, '2025-06-13', '3', 1, 2, 'ZXHZBC5273', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-09 18:08:29'),
(32, '2025-06-13', '3', 1, 2, 'ZXHZBC5484', 1, 101500.00, 3500.00, '1', NULL, '2025-07-08 19:33:42', '2025-07-09 19:15:21'),
(33, '2025-06-13', '3', 1, 2, 'ZXHZBC5311', 1, 101500.00, 3500.00, '1', NULL, '2025-07-08 19:33:42', '2025-07-09 19:15:21'),
(34, '2025-06-13', '3', 1, 2, 'ZXHZBC5376', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-13 00:07:13'),
(35, '2025-06-13', '3', 1, 2, 'ZXHZBB9026', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-10 17:36:04'),
(36, '2025-06-13', '3', 1, 2, 'ZXHZBB9113', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-10 17:36:04'),
(37, '2025-06-13', '3', 1, 2, 'ZXHZBD3433', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-09 22:40:26'),
(38, '2025-06-13', '3', 1, 2, 'ZXHZBB7737', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-09 22:40:26'),
(39, '2025-06-13', '3', 1, 2, 'ZXHZBD5033', 1, 101500.00, 3500.00, '0', '1', '2025-07-08 19:33:42', '2025-07-09 23:13:18'),
(40, '2025-06-13', '3', 1, 2, 'ZXHZBD5064', 1, 101500.00, 3500.00, '0', '0', '2025-07-08 19:33:42', '2025-07-09 23:13:18'),
(41, '2025-06-13', '3', 1, 2, 'ZXHZBB9018', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(42, '2025-06-13', '3', 1, 2, 'ZXHZBB9156', 1, 101500.00, 3500.00, '0', '0', '2025-07-08 19:33:42', '2025-07-09 23:13:18'),
(43, '2025-06-13', '3', 1, 2, 'ZXHZBC2407', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(44, '2025-06-13', '3', 1, 2, 'ZXHZBB7901', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(45, '2025-06-13', '3', 1, 2, 'ZXHZBC5346', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(46, '2025-06-13', '3', 1, 2, 'ZXHZBB8134', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(47, '2025-06-13', '3', 1, 2, 'ZXHZBB7670', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(48, '2025-06-13', '3', 1, 2, 'ZXHZBC2338', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(49, '2025-06-13', '3', 1, 2, 'ZXHZBB7689', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(50, '2025-06-13', '3', 1, 2, 'ZXHZBB7711', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(51, '2025-06-13', '3', 1, 2, 'ZXHZBD3818', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(52, '2025-06-13', '3', 1, 2, 'ZXHZBD3596', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(53, '2025-06-13', '3', 1, 2, 'ZXHZBD3399', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(54, '2025-06-13', '3', 1, 2, 'ZXHZBC5457', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(55, '2025-06-13', '3', 1, 2, 'ZXHZBD4895', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(56, '2025-06-01', '4', 26, 31, '0', 25, 125000.00, 5000.00, '1', NULL, '2025-07-08 20:21:04', '2025-07-08 20:21:04'),
(57, '2025-06-01', '4', 26, 32, '0', 25, 175000.00, 7000.00, '1', NULL, '2025-07-08 20:24:18', '2025-07-08 20:24:18'),
(58, '2025-06-13', '3', 10, 16, '0', 1000, 426000.00, 426.00, '0', NULL, '2025-07-09 17:55:44', '2025-07-09 17:55:44'),
(59, '2025-07-09', '8', 1, 1, 'ZXHZAV4338', 1, 0.00, 0.00, '1', '0', '2025-07-09 23:51:01', '2025-07-12 22:50:55'),
(60, '2025-07-09', '8', 1, 2, 'ZHHZBC0272', 1, 0.00, 0.00, '1', '0', '2025-07-09 23:51:01', '2025-07-12 22:50:55'),
(61, '2025-07-09', '8', 1, 2, 'ZXHZBB7747', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:02:51', '2025-07-12 22:50:55'),
(62, '2025-07-09', '8', 9, 15, 'GA241129FQ278369', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:02:51', '2025-07-12 22:50:55'),
(63, '2025-07-09', '8', 1, 1, 'ZXHZBA3341', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:10:51', '2025-07-12 22:53:38'),
(64, '2025-07-09', '8', 1, 3, 'ZXHZBC0318', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:10:51', '2025-07-12 22:53:38'),
(65, '2025-07-09', '8', 1, 2, 'ZXHZAC447', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:10:51', '2025-07-12 22:53:38'),
(66, '2025-07-09', '8', 9, 15, 'GA241129FQ278417', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:10:51', '2025-07-12 22:53:38'),
(67, '2025-07-09', '8', 1, 1, 'ZXHZAW2358', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:19:53', '2025-07-12 22:55:16'),
(68, '2025-07-09', '8', 1, 3, 'ZXHZAV4479', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:19:53', '2025-07-12 22:55:16'),
(69, '2025-07-09', '8', 1, 3, 'ZXHZAV4480', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:19:53', '2025-07-12 22:55:16'),
(70, '2025-07-09', '8', 9, 15, 'GA240719FQ258476', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:19:53', '2025-07-12 22:55:16'),
(71, '2025-07-09', '8', 1, 1, 'ZXHZAV4456', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:27:00', '2025-07-12 22:56:22'),
(72, '2025-07-09', '8', 1, 3, 'ZXHZAY1372', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:27:00', '2025-07-12 22:56:22'),
(73, '2025-07-09', '8', 1, 3, 'ZXHZAY0343', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:27:00', '2025-07-12 22:56:22'),
(74, '2025-07-09', '8', 9, 15, 'GA240719FQ258471', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:27:00', '2025-07-12 22:56:22'),
(75, '2025-07-09', '8', 1, 1, 'ZXHZBA6443', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:33:41', '2025-07-12 22:59:41'),
(76, '2025-07-09', '8', 1, 3, 'ZXHZBC0399', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:33:41', '2025-07-12 22:59:41'),
(77, '2025-07-09', '8', 1, 3, 'ZXHZBB7721', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:33:41', '2025-07-12 22:59:41'),
(78, '2025-07-09', '8', 9, 15, 'GA241129FQ278399', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:33:41', '2025-07-12 22:59:41'),
(79, '2025-07-09', '8', 1, 1, 'ZXHZAV4432', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:39:50', '2025-07-12 23:01:33'),
(80, '2025-07-09', '8', 1, 3, 'ZXHZAY1310', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:39:50', '2025-07-12 23:01:33'),
(81, '2025-07-09', '8', 1, 3, 'ZXHZAY1415', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:39:50', '2025-07-12 23:01:33'),
(82, '2025-07-09', '8', 9, 15, 'GA240719FQ258462', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:39:50', '2025-07-12 23:01:33'),
(83, '2025-07-09', '8', 1, 1, 'ZXHZAV4375', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:46:32', '2025-07-12 23:09:58'),
(84, '2025-07-09', '8', 1, 2, 'ZXHZBC5465', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:46:32', '2025-07-12 23:09:58'),
(85, '2025-07-09', '8', 1, 2, 'ZXHZBC5324', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:46:32', '2025-07-12 23:09:58'),
(86, '2025-07-09', '8', 9, 15, 'GA24040FQ239069', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:46:32', '2025-07-12 23:09:58'),
(87, '2025-07-09', '8', 1, 1, 'ZXHZAV7875', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:53:28', '2025-07-12 23:12:09'),
(88, '2025-07-09', '8', 1, 3, 'ZXHZAY1360', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:53:28', '2025-07-12 23:12:09'),
(89, '2025-07-09', '8', 1, 3, 'ZXHZAY1457', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:53:28', '2025-07-12 23:12:09'),
(90, '2025-07-09', '8', 9, 15, 'GA240719FQ258484', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:53:28', '2025-07-12 23:12:09'),
(91, '2025-07-09', '8', 1, 1, 'ZXHZAV7893', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:59:44', '2025-07-12 23:21:20'),
(92, '2025-07-09', '8', 1, 3, 'ZXHZBB5555', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:59:44', '2025-07-12 23:21:20'),
(93, '2025-07-09', '8', 1, 3, 'ZXHZBA9278', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:59:44', '2025-07-12 23:21:20'),
(94, '2025-07-09', '8', 9, 15, 'GA241129FQ278402', 1, 0.00, 0.00, '1', '0', '2025-07-10 00:59:44', '2025-07-12 23:21:20'),
(95, '2025-07-09', '8', 1, 1, 'ZXHZAV5081', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:05:14', '2025-07-12 23:24:15'),
(96, '2025-07-09', '8', 1, 2, 'ZXHZBD3379', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:05:14', '2025-07-12 23:24:15'),
(97, '2025-07-09', '8', 1, 2, 'ZXHZBC0329', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:05:14', '2025-07-12 23:24:15'),
(98, '2025-07-09', '8', 9, 15, 'GA241129FQ278357', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:05:14', '2025-07-12 23:24:15'),
(99, '2025-07-09', '8', 1, 1, 'ZXHZAV5065', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:13:55', '2025-07-12 23:26:18'),
(100, '2025-07-09', '8', 1, 2, 'ZXHZBD4356', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:13:55', '2025-07-12 23:26:18'),
(101, '2025-07-09', '8', 1, 2, 'ZXHZBD4876', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:13:55', '2025-07-12 23:26:18'),
(102, '2025-07-09', '8', 9, 15, 'GA241129FQ278358', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:13:55', '2025-07-12 23:26:18'),
(103, '2025-07-09', '8', 1, 1, 'ZXHZAU9899', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:20:36', '2025-07-12 23:28:17'),
(104, '2025-07-09', '8', 1, 2, 'ZXHZBC9458', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:20:36', '2025-07-12 23:28:17'),
(105, '2025-07-09', '8', 1, 2, 'ZXHZBC9471', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:20:36', '2025-07-12 23:28:17'),
(106, '2025-07-09', '8', 9, 15, 'GA241129FQ278332', 1, 0.00, 0.00, '1', '0', '2025-07-10 01:20:36', '2025-07-12 23:28:17'),
(107, '2025-07-09', '8', 1, 1, 'ZXHZAV1432', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-12 23:30:47'),
(108, '2025-07-09', '8', 1, 2, 'ZXHZBC0787', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-12 23:30:47'),
(109, '2025-07-09', '8', 1, 2, 'ZXHZBB7801', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-12 23:30:47'),
(110, '2025-07-09', '8', 9, 15, 'GA241129FQ278366', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-12 23:30:47'),
(111, '2025-07-09', '8', 1, 1, 'ZXHZAV5131', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(112, '2025-07-09', '8', 1, 2, 'ZXHZBC9570', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(113, '2025-07-09', '8', 1, 2, 'ZXHZBC7083', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(114, '2025-07-09', '8', 9, 15, 'GA241129FQ278355', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(115, '2025-07-09', '8', 1, 1, 'ZXHZAV5001', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-12 23:40:22'),
(116, '2025-07-09', '8', 1, 2, 'ZXHBB7907', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-12 23:40:22'),
(117, '2025-07-09', '8', 1, 2, 'ZXHZAB8581', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-12 23:40:22'),
(118, '2025-07-09', '8', 9, 15, 'GA241129FQ278341', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-12 23:40:22'),
(119, '2025-07-09', '8', 1, 1, 'ZXHZBA6558', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-12 23:42:49'),
(120, '2025-07-09', '8', 1, 3, 'ZXHZBA0949', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-12 23:42:49'),
(121, '2025-07-09', '8', 1, 3, 'ZXHZAY5446', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-12 23:42:49'),
(122, '2025-07-09', '8', 9, 15, 'GA241129FQ278404', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-12 23:42:49'),
(123, '2025-07-09', '8', 1, 1, 'ZXHZAV3704', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-12 23:45:09'),
(124, '2025-07-09', '8', 1, 2, 'ZXHZBC5300', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-12 23:45:09'),
(125, '2025-07-09', '8', 1, 3, 'ZXHZAY5479', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-12 23:45:09'),
(126, '2025-07-09', '8', 9, 15, 'GA241129FQ278395', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-12 23:45:09'),
(127, '2025-07-09', '8', 1, 1, 'ZXHZAZ7078', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-12 23:47:54'),
(128, '2025-07-09', '8', 1, 3, 'ZXHZBA0748', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-12 23:47:54'),
(129, '2025-07-09', '8', 1, 3, 'ZXHZAZ9028', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-12 23:47:54'),
(130, '2025-07-09', '8', 9, 15, 'GA241129FQ278405', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-12 23:47:54'),
(131, '2025-07-09', '8', 1, 1, 'ZXHZBA4662', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-13 00:07:53'),
(132, '2025-07-09', '8', 1, 3, 'ZXHZAZ2471', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-13 00:07:53'),
(133, '2025-07-09', '8', 1, 3, 'ZXHZAZ2455', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-13 00:07:53'),
(134, '2025-07-09', '8', 9, 15, 'GA241129FQ278396', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-13 00:07:53'),
(135, '2025-07-09', '8', 1, 1, 'ZXHZAV0022', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-13 00:07:13'),
(136, '2025-07-09', '8', 1, 2, 'ZXHZBC5481', 1, 0.00, 0.00, '1', NULL, '2025-07-10 20:16:32', '2025-07-10 20:16:32'),
(137, '2025-07-09', '8', 1, 2, 'ZXHZBC5376', 1, 0.00, 0.00, '1', NULL, '2025-07-10 20:16:32', '2025-07-10 20:16:32'),
(138, '2025-07-09', '8', 9, 15, 'GA241129FQ278336', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-13 00:07:13'),
(139, '2025-07-09', '8', 1, 1, 'ZXHZAU9984', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-13 00:11:39'),
(140, '2025-07-09', '8', 1, 2, 'ZXHZBB7726', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-13 00:11:39'),
(141, '2025-07-09', '8', 1, 2, 'ZXHZBC5331', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-13 00:11:39'),
(142, '2025-07-09', '8', 9, 15, 'GA240719FQ258447', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-13 00:11:39'),
(143, '2025-07-09', '8', 1, 1, 'ZXHZBA3179', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-14 17:41:17'),
(144, '2025-07-09', '8', 1, 3, 'ZXHZBC0334', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-14 17:41:17'),
(145, '2025-07-09', '8', 9, 15, 'GA241129FQ278476', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-14 17:41:17'),
(146, '2025-07-09', '8', 8, 33, 'GGYGWFGWG', 1, 0.00, 0.00, '1', '0', '2025-07-11 19:49:24', '2025-07-11 19:49:24'),
(147, '2025-07-09', '8', 1, 3, 'XXHXAH3386', 1, 0.00, 0.00, '1', '0', '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(148, '2025-07-09', '8', 1, 3, 'WXHXAV0741', 1, 0.00, 0.00, '1', '0', '2025-07-12 00:39:40', '2025-07-12 00:39:40'),
(149, '2025-07-09', '8', 8, 33, 'EBBDI6061', 1, 0.00, 0.00, '1', '0', '2025-07-12 22:50:55', '2025-07-12 22:50:55'),
(150, '2025-07-09', '8', 8, 33, 'EBBD16125', 1, 0.00, 0.00, '1', '0', '2025-07-12 22:53:38', '2025-07-12 22:53:38'),
(151, '2025-07-09', '8', 8, 33, 'EBBD16081', 1, 0.00, 0.00, '1', '0', '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
(152, '2025-07-09', '8', 8, 33, 'EBBD16080', 1, 0.00, 0.00, '1', '0', '2025-07-12 22:56:22', '2025-07-12 22:56:22'),
(153, '2025-07-09', '8', 8, 33, 'EBBD16088', 1, 0.00, 0.00, '1', '0', '2025-07-12 22:59:41', '2025-07-12 22:59:41'),
(154, '2025-07-09', '8', 8, 33, 'EBBD16085', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:01:33', '2025-07-12 23:01:33'),
(155, '2025-07-09', '8', 8, 33, 'EBBC16901', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:09:58', '2025-07-12 23:09:58'),
(156, '2025-07-09', '8', 8, 33, 'EBBD16118', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:12:09', '2025-07-12 23:12:09'),
(157, '2025-07-09', '8', 8, 33, 'EBBC07981', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:21:20', '2025-07-12 23:21:20'),
(158, '2025-07-09', '8', 8, 33, 'EBBC08032', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:24:15', '2025-07-12 23:24:15'),
(159, '2025-07-09', '8', 8, 33, 'EBBC09762', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:26:18', '2025-07-12 23:26:18'),
(160, '2025-07-09', '8', 8, 33, 'EBBC09471', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:28:17', '2025-07-12 23:28:17'),
(161, '2025-07-09', '8', 8, 33, 'EBBD16104', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:30:47', '2025-07-12 23:30:47'),
(162, '2025-07-09', '8', 8, 33, 'EBBC17639', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(163, '2025-07-09', '8', 8, 33, 'EBBB03849', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:40:22', '2025-07-12 23:40:22'),
(164, '2025-07-09', '8', 8, 33, 'EBBC10606', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:42:32', '2025-07-12 23:42:49'),
(165, '2025-07-09', '8', 8, 33, 'EBBD16103', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:45:09', '2025-07-12 23:45:09'),
(166, '2025-07-09', '8', 8, 33, 'EBBD16097', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:47:54', '2025-07-12 23:47:54'),
(167, '2025-07-09', '8', 8, 33, 'EBBD16102', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:59:08', '2025-07-13 00:07:53'),
(168, '2025-07-09', '8', 8, 33, NULL, 1, 0.00, 0.00, '1', '0', '2025-07-13 00:05:09', '2025-07-13 00:05:09'),
(169, '2025-07-09', '8', 8, 33, 'EBBD16059', 1, 0.00, 0.00, '1', '0', '2025-07-13 00:11:39', '2025-07-13 00:11:39'),
(170, '2025-07-09', '8', 8, 33, 'EBBD16065', 1, 0.00, 0.00, '1', '0', '2025-07-14 17:41:17', '2025-07-14 17:41:17');

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
  `is_sellable` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sub_categories`
--

INSERT INTO `tbl_sub_categories` (`id`, `cid`, `sub_category_name`, `unit`, `sr_no`, `is_sellable`, `created_at`, `updated_at`) VALUES
(1, 1, '15', 'Pic', 1, 0, '2024-10-02 18:58:08', '2025-03-08 00:08:36'),
(2, 1, '30', 'Pic', 1, 0, '2024-10-02 18:58:14', '2024-10-02 18:58:14'),
(3, 1, '45', 'Pic', 1, 0, '2024-10-02 18:58:22', '2024-10-02 18:58:22'),
(15, 9, 'AOM', 'Pic', 1, 0, '2024-10-22 00:40:33', '2025-06-10 00:22:06'),
(16, 10, '10/130 (S)', 'Mtr', 0, 0, '2024-10-22 00:41:18', '2025-03-06 22:34:24'),
(18, 11, '3*1 (10*130)', 'Pic', 0, 0, '2024-10-22 00:43:20', '2025-04-08 19:30:44'),
(19, 6, 'HR', 'Pic', 0, 0, '2024-10-22 00:52:07', '2025-04-07 19:10:36'),
(20, 7, 'Power PCB', 'Pic', 0, 0, '2024-10-22 00:53:17', '2024-10-22 00:53:17'),
(21, 7, 'Control card', 'Pic', 0, 0, '2024-10-22 00:53:34', '2024-10-22 00:53:34'),
(22, 8, '20/130', 'Pic', 1, 0, '2024-10-22 00:54:16', '2025-03-05 22:24:15'),
(23, 12, '2*2', 'Pic', 0, 0, '2024-10-22 00:55:10', '2024-10-22 00:55:10'),
(26, 10, '30/250 (L)', 'Mtr', 0, 0, '2024-12-02 04:17:44', '2025-03-06 22:34:42'),
(30, 7, 'THERMAL CABLE', 'Pic', 0, 0, '2025-03-04 00:53:11', '2025-06-10 00:21:48'),
(31, 26, 'SMALL BODY', 'Pic', 0, 0, '2025-03-05 22:25:33', '2025-03-05 22:25:33'),
(32, 26, 'BIG BODY', 'Pic', 0, 0, '2025-03-05 22:25:47', '2025-03-05 22:25:47'),
(33, 8, '30/250', 'Pic', 1, 0, '2025-03-05 22:26:47', '2025-03-06 23:39:39'),
(34, 11, '3*1(30/250)', 'Pic', 0, 0, '2025-03-05 22:30:28', '2025-03-05 22:30:28'),
(35, 25, 'RF', 'Pic', 0, 0, '2025-03-05 22:41:52', '2025-06-10 00:22:28'),
(37, 10, '20/125 (M)', 'Mtr', 0, 0, '2025-03-06 22:34:02', '2025-03-06 22:34:02'),
(38, 27, 'LOW INDEX GLUE', 'Pic', 0, 0, '2025-03-08 00:36:43', '2025-06-10 00:20:46'),
(39, 27, 'HC - 705', 'Pic', 0, 0, '2025-03-08 00:37:02', '2025-06-10 00:21:01'),
(40, 27, 'RED TUBE', 'Pic', 0, 0, '2025-03-08 00:37:20', '2025-06-10 00:21:15'),
(41, 27, 'HIGH INDEX GLUE', 'Pic', 0, 0, '2025-03-08 00:42:01', '2025-06-10 00:21:27'),
(42, 28, 'Fan', 'Pic', 0, 0, '2025-07-02 18:33:42', '2025-07-02 18:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types`
--

CREATE TABLE `tbl_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_types`
--

INSERT INTO `tbl_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '15', '2025-03-15 17:35:39', '2025-03-15 17:35:39'),
(2, '18', '2025-03-15 17:35:44', '2025-03-15 17:35:44'),
(3, '21', '2025-03-15 17:35:49', '2025-03-15 17:35:49'),
(4, '25', '2025-03-15 17:35:55', '2025-05-22 22:42:41');

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
(4, 'Deniz', 'admin', 'admin@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 1, '2024-10-08 01:41:21', '2025-03-01 19:17:54'),
(14, 'Dawood', 'user', 'dawood@example.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 3, NULL, '2024-10-17 23:51:16'),
(15, 'User', 'user', 'user@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 4, NULL, '2024-12-06 05:05:35'),
(17, 'Electric', 'electric', 'electric@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 8, '2024-10-24 01:41:37', '2024-10-24 01:41:37'),
(18, 'Cavity', 'cavity', 'cavity@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 9, '2024-10-24 23:47:15', '2024-10-24 23:47:15'),
(19, 'Account', 'account', 'account@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 8, '2024-11-18 00:24:18', '2024-11-18 00:24:18'),
(20, 'Godown', 'godown', 'godown@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 8, '2024-11-22 23:45:11', '2024-11-22 23:45:11'),
(21, 'Big Cavity', 'user', 'bigcavity@gmail.com', '$2y$12$9fV9LtsLuqwiluQvHxVF..l2TOAkkw1zZyciLzcYd/XwskBhiNd5G', 8, '2025-07-05 16:46:41', '2025-07-05 16:46:41');

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

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `company_address` varchar(191) DEFAULT NULL,
  `PAN_no` varchar(191) DEFAULT NULL,
  `GSTIN_no` varchar(191) DEFAULT NULL,
  `cgst` varchar(255) DEFAULT NULL,
  `sgst` varchar(255) DEFAULT NULL,
  `igst` varchar(255) DEFAULT NULL,
  `phno` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `lutno` varchar(191) DEFAULT NULL,
  `invoice_logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `currency` varchar(191) NOT NULL DEFAULT 'INR',
  `timezone` varchar(191) NOT NULL DEFAULT 'UTC',
  `footer_text` text DEFAULT NULL,
  `language` varchar(191) NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `company_name`, `logo`, `company_address`, `PAN_no`, `GSTIN_no`, `cgst`, `sgst`, `igst`, `phno`, `email`, `lutno`, `invoice_logo`, `favicon`, `currency`, `timezone`, `footer_text`, `language`, `created_at`, `updated_at`) VALUES
(1, 'MAKTECH', 'storage/logo/67724997a42f8.jpg', 'GROOUND FLOOR, 541, VASTADEWADI ROAD OPP, JAIN MANDIR HIRABEN NI WADI DIGAMBER JAIN MANDIR, KATARGAM, SURAT', 'AAZFM7679J', '24AAZFM7679J1Z7', '9', '9', '18', '9727432806', 'maktech41@gmail.com', 'AD240921009829V', 'storage/invoice_logo/67724997a481f.png', 'storage/favicon/67724997a4d65.png', 'INR', 'Asia/Dhaka', '©2025 Maktech Reserved All Right', 'EN', NULL, '2025-04-05 20:30:26');

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `gst_pdf_table`
--
ALTER TABLE `gst_pdf_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gst_pdf_table_invoice_no_unique` (`invoice_no`);

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
-- Indexes for table `manufacture_report_layouts`
--
ALTER TABLE `manufacture_report_layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture_report_layout_fields`
--
ALTER TABLE `manufacture_report_layout_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacture_report_layout_fields_layout_id_foreign` (`layout_id`);

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
-- Indexes for table `replacements`
--
ALTER TABLE `replacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_invoices`
--
ALTER TABLE `selected_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_acc_coa`
--
ALTER TABLE `tbl_acc_coa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acc_financial_years`
--
ALTER TABLE `tbl_acc_financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acc_predefine_account`
--
ALTER TABLE `tbl_acc_predefine_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acc_transaction`
--
ALTER TABLE `tbl_acc_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acc_vaucher`
--
ALTER TABLE `tbl_acc_vaucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_bank_account_number_unique` (`account_number`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_payments`
--
ALTER TABLE `tbl_customer_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_customer_payments_sell_id_foreign` (`sell_id`);

--
-- Indexes for table `tbl_expensive`
--
ALTER TABLE `tbl_expensive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_opening_balances`
--
ALTER TABLE `tbl_opening_balances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_opening_balances_balance_date_unique` (`balance_date`);

--
-- Indexes for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_payments_purchase_id_foreign` (`purchase_id`);

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
-- Indexes for table `tbl_purchase_returns`
--
ALTER TABLE `tbl_purchase_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_return_items`
--
ALTER TABLE `tbl_purchase_return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reports_items`
--
ALTER TABLE `tbl_reports_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report_permission`
--
ALTER TABLE `tbl_report_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_sales_sale_id_unique` (`sale_id`);

--
-- Indexes for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_product_category`
--
ALTER TABLE `tbl_sale_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_product_subcategory`
--
ALTER TABLE `tbl_sale_product_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_returns`
--
ALTER TABLE `tbl_sale_returns`
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
-- Indexes for table `tbl_types`
--
ALTER TABLE `tbl_types`
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
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst_pdf_table`
--
ALTER TABLE `gst_pdf_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_permission`
--
ALTER TABLE `manage_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manufacture_report_layouts`
--
ALTER TABLE `manufacture_report_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacture_report_layout_fields`
--
ALTER TABLE `manufacture_report_layout_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replacements`
--
ALTER TABLE `replacements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selected_invoices`
--
ALTER TABLE `selected_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_acc_coa`
--
ALTER TABLE `tbl_acc_coa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_acc_financial_years`
--
ALTER TABLE `tbl_acc_financial_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_acc_predefine_account`
--
ALTER TABLE `tbl_acc_predefine_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_acc_transaction`
--
ALTER TABLE `tbl_acc_transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_acc_vaucher`
--
ALTER TABLE `tbl_acc_vaucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customer_payments`
--
ALTER TABLE `tbl_customer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expensive`
--
ALTER TABLE `tbl_expensive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_opening_balances`
--
ALTER TABLE `tbl_opening_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_purchase_returns`
--
ALTER TABLE `tbl_purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_purchase_return_items`
--
ALTER TABLE `tbl_purchase_return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_reports_items`
--
ALTER TABLE `tbl_reports_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1075;

--
-- AUTO_INCREMENT for table `tbl_report_permission`
--
ALTER TABLE `tbl_report_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sale_product_category`
--
ALTER TABLE `tbl_sale_product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sale_product_subcategory`
--
ALTER TABLE `tbl_sale_product_subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sale_returns`
--
ALTER TABLE `tbl_sale_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
