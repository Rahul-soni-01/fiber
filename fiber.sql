-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 10:01 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.20

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
(18, 19, '[\"9\",\"10\",\"11\",\"14\",\"15\",\"16\",\"17\",\"18\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"],\"10\":[\"1\",\"2\",\"3\",\"4\"],\"11\":[\"1\",\"2\",\"3\",\"4\"],\"14\":[\"1\",\"2\",\"3\",\"4\"],\"15\":[\"1\",\"2\",\"3\",\"4\"],\"16\":[\"1\",\"2\",\"3\",\"4\"],\"17\":[\"1\",\"2\",\"3\",\"4\"],\"18\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-11-18 00:24:42', '2024-11-18 00:24:42'),
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
(5, '28 May', '3', '0', 'New 21 layout', 4, 1, '2025-05-28 21:40:00', '2025-05-29 20:10:18');

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
(7, 1, 'type', 'LD-15', 1, 8, '2025-04-12 06:54:41', '2025-05-29 20:10:18'),
(8, 1, 'demo_1', 'LD-30', 1, 9, '2025-04-12 06:54:41', '2025-05-29 20:10:18'),
(9, 2, 'part', 'AOM-QSWITCH', 1, 11, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(10, 2, 'temp_no', 'Fiber-10/130 (S)', 1, 12, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(11, 2, 'employee_name', 'COMBINER-3*1 (10*130)', 1, 13, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(12, 2, 'sr_fiber', 'HR-HR', 1, 14, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(13, 2, 'mj', 'CARD-Power PCB', 1, 15, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(14, 2, 'warranty', 'CARD-Control Card', 1, 16, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(15, 2, 'type', 'COUPLAR-2*2', 1, 18, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(16, 2, 'LD 15', 'Fiber-30/250 (L)', 1, 19, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(17, 2, 'LD 30', 'CARD-Thermal Cabel', 1, 20, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(18, 2, 'LD 45', 'BODY-SMALL BODY', 1, 21, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(19, 2, 'AOM QSWITCH', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(20, 2, 'Fiber 10/130 (S)', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
(21, 2, 'COMBINER 3*1 (10*130)', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:34', '2025-05-29 20:10:18'),
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
(116, 5, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(75, 4, 'demo_1', 'Demo 1', 1, 31, '2025-04-16 01:34:44', '2025-04-25 00:55:38'),
(76, 4, '32', 'BODY-BIG BODY', 1, 22, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(77, 4, '33', 'ISOLATOR-30/250', 1, 23, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(78, 4, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(79, 4, '35', 'RF-Rf Card', 1, 25, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(80, 4, '37', 'Fiber-20/125 (M)', 1, 26, '2025-04-16 01:34:44', '2025-04-16 01:34:44'),
(113, 5, 'part', 'Part', 1, 1, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(114, 5, 'temp', 'Temp no.', 1, 2, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(115, 5, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(135, 5, 'Demo 1', 'LD-30 (2)', 1, 26, '2025-05-29 20:10:18', '2025-05-29 20:10:18'),
(129, 5, '26', 'Fiber-30/250 (L)', 1, 19, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(128, 5, '23', 'COUPLAR-2*2', 1, 18, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(127, 5, '21', 'CARD-Control Card', 1, 16, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(126, 5, '20', 'CARD-Power PCB', 1, 15, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(125, 5, '19', 'HR-HR', 1, 14, '2025-05-28 21:40:00', '2025-05-28 21:40:00'),
(117, 5, 'mj', 'M.J', 1, 5, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(118, 5, 'warranty', 'Warranty', 1, 6, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
(119, 5, 'type', 'Type', 1, 7, '2025-05-28 21:40:00', '2025-05-29 20:10:18'),
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
(134, 5, '35', 'RF-Rf Card', 1, 25, '2025-05-28 21:40:00', '2025-05-28 21:40:00');

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
(1, '1', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(2, '2', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(3, '3', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(4, '15', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(5, '16', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(6, '18', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(7, '19', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(8, '20', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(9, '21', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(10, '22', '502', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(11, '23', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(12, '26', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(13, '30', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(14, '31', '4', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(15, '32', '4', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(16, '33', '2', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(17, '34', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(18, '35', '124', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(19, '37', '3', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(20, '38', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(21, '39', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(22, '40', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28'),
(23, '41', '1', '2025-05-29 18:39:28', '2025-05-29 18:39:28');

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
(50, '40015', 'Jignesh Ramoliya', 'Accounts Receivable', '30013', 4, '2025-04-09 01:16:51', '2025-04-09 01:16:51'),
(52, '40017', 'STPL', 'Accounts Receivable', '30013', 4, '2025-05-14 00:03:23', '2025-05-14 00:03:23'),
(55, '40020', 'Amit Shukla ji', 'Accounts Payable', '30009', 4, '2025-05-14 01:19:06', '2025-05-15 17:50:10'),
(56, '40021', 'Office Expenses', 'Expenses', '30022', 4, '2025-05-14 22:07:34', '2025-05-14 22:07:34'),
(57, '40022', 'Rent Expenses', 'Expenses', '30022', 4, '2025-05-14 22:59:31', '2025-05-14 22:59:31'),
(59, '40024', 'YES BANK 12', 'Bank', '30016', 4, '2025-05-15 01:01:53', '2025-05-15 17:25:13'),
(61, '40025', 'AMAR SHUKLA', 'Accounts Payable', '30009', 4, '2025-05-16 01:19:35', '2025-05-16 01:19:35'),
(62, '40026', 'Bhawan Body', 'Accounts Payable', '30009', 4, '2025-05-16 01:22:28', '2025-05-16 01:22:28'),
(63, '40027', 'OPTO TUNE', 'Accounts Payable', '30009', 4, '2025-05-16 01:23:06', '2025-05-16 01:23:06');

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
(6, '0', 'CV-3', 'CV', '1', '2025-03-08', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 8000.00, '6', 1, 4, '2025-03-08 07:00:00', NULL, '2025-03-08 19:42:35', '2025-03-08 19:42:35');

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
(27, 'Glue', 'Consumable', 0, '2025-03-07 23:42:44', '2025-03-07 23:42:44');

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
(1, 'Jignesh Ramoliya', '40015', 'SAHAJANAND TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'Surat', 'Gujrat', '123', 'JR RCV', '36AAACH7409R1Z1', 'KATARGAM', '395004', 'SURAT', 'GUJRAT', '2025-04-09 01:16:51', '2025-04-09 01:16:51'),
(2, 'STPL', '40017', 'STPL', '395002', 'Surat', 'Gujrat', '93434578798', 'STPL', '36AAACH7409R1Z1', 'Surat', '395002', 'Surat', 'Gujrat', '2025-05-14 00:03:23', '2025-05-14 00:03:23');

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
(5, 'opening stock', NULL, '24165464', '45454545', 'dfsdfs', '2024-10-22 00:48:40', '2024-10-22 00:48:40'),
(8, 'OPTO TUNE', '40027', 'CHINA', '987465467', 'DENIS', '2025-03-01 17:27:12', '2025-03-01 17:27:12'),
(10, 'AMAR SHUKLA', '40025', 'ABAD, GUJARAT', '1232131213', 'AMAR', '2025-04-07 17:48:44', '2025-04-07 17:48:44'),
(11, 'Bhawan Body', '40026', 'ABAD, GUJARAT', '789415631', 'Bhawanbhai', '2025-04-07 17:49:41', '2025-04-07 17:49:41'),
(12, 'Other', '40004 ', 'Other', '874932749', 'Not Available', '2025-04-07 20:29:01', '2025-04-07 20:29:01'),
(14, 'STICK WELL', '40019', 'SURAT, GUJARAT', '1231231234', 'MEHUL BHAI', '2025-05-14 00:23:23', '2025-05-14 00:23:23'),
(15, 'Amit Shukla ji', '40020', 'surat', '7987546138', 'Mehulbhai', '2025-05-14 01:19:06', '2025-05-15 17:50:10');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
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

INSERT INTO `tbl_purchases` (`id`, `main_category`, `date`, `invoice_no`, `pid`, `amount`, `inr_rate`, `inr_amount`, `shipping_cost`, `round_amount`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', '2025-04-01', '1', 10, 280000, 1.00, '280000.00', '0', '0', '2025-04-07 17:53:59', '2025-04-07 17:53:59'),
(2, 'Optical', '2025-04-01', '2', 8, 362000, 12.00, '4344000.00', '0', '0', '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(3, 'Optical', '2025-04-01', '3', 8, 20700, 12.00, '248400.00', '0', '0', '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(4, 'Mechanical', '2025-04-01', '4', 11, 18000, 12.00, '216000.00', '0', '0', '2025-04-07 20:04:09', '2025-04-07 20:04:09'),
(5, 'Electronic', '2025-04-08', '123', 10, 27000, 1.00, '27000.00', '0', '0', '2025-04-08 22:50:21', '2025-04-08 22:50:21'),
(6, 'Electronic', '2025-05-01', '501', 10, 362000, 1.00, '362000.00', '0', '0', '2025-05-01 18:59:23', '2025-05-01 18:59:23'),
(7, 'Electronic', '2025-05-21', '124', 10, 90000, 1.00, '90000.00', '0', '0', '2025-05-21 20:11:13', '2025-05-21 20:11:13'),
(8, 'Optical', '2025-05-01', '502', 14, 180000, 12.00, '2160000.00', '0', '0', '2025-05-29 18:31:10', '2025-05-29 18:31:10');

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
(1, '1', '7', '20', 100, 'Pic', 1100.00, '0', 110000.00, '2025-04-07 17:53:59', '2025-04-07 17:53:59'),
(2, '1', '7', '21', 100, 'Pic', 900.00, '0', 90000.00, '2025-04-07 17:53:59', '2025-04-07 17:53:59'),
(3, '1', '25', '35', 100, 'Pic', 800.00, '0', 80000.00, '2025-04-07 17:53:59', '2025-04-07 17:53:59'),
(4, '2', '1', '1', 100, 'Pic', 250.00, '0', 25000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(5, '2', '1', '2', 100, 'Pic', 410.00, '0', 41000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(6, '2', '1', '3', 100, 'Pic', 540.00, '0', 54000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(7, '2', '11', '18', 200, 'Pic', 260.00, '0', 52000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(8, '2', '6', '19', 100, 'Pic', 500.00, '0', 50000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(9, '2', '8', '33', 100, 'Pic', 600.00, '0', 60000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(10, '2', '9', '15', 100, 'Pic', 800.00, '0', 80000.00, '2025-04-07 19:06:51', '2025-04-07 19:06:51'),
(11, '3', '10', '16', 1000, 'Mtr', 5.00, '0', 5000.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(12, '3', '10', '26', 1000, 'Mtr', 7.00, '0', 7000.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(13, '3', '10', '37', 1000, 'Mtr', 6.00, '0', 6000.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(14, '3', '11', '18', 100, 'Pic', 8.00, '0', 800.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(15, '3', '11', '34', 100, 'Pic', 9.00, '0', 900.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(16, '3', '12', '23', 100, 'Pic', 10.00, '0', 1000.00, '2025-04-07 20:02:16', '2025-04-07 20:02:16'),
(17, '4', '26', '31', 100, 'Pic', 80.00, '0', 8000.00, '2025-04-07 20:04:09', '2025-04-07 20:04:09'),
(18, '4', '26', '32', 100, 'Pic', 100.00, '0', 10000.00, '2025-04-07 20:04:09', '2025-04-07 20:04:09'),
(19, '1', '7', '30', 100, 'Pic', 1000.00, '0', 100000.00, '2025-04-08 19:04:00', '2025-04-08 19:04:00'),
(20, '123', '7', '20', 10, 'Pic', 1100.00, '0', 11000.00, '2025-04-08 22:50:21', '2025-04-08 22:50:21'),
(21, '123', '7', '21', 10, 'Pic', 900.00, '0', 9000.00, '2025-04-08 22:50:21', '2025-04-08 22:50:21'),
(22, '123', '25', '35', 10, 'Pic', 700.00, '0', 7000.00, '2025-04-08 22:50:21', '2025-04-08 22:50:21'),
(23, '501', '7', '20', 100, 'Pic', 1100.00, '0', 110000.00, '2025-05-01 18:59:23', '2025-05-01 18:59:23'),
(24, '501', '7', '21', 100, 'Pic', 2500.00, '0', 250000.00, '2025-05-01 18:59:23', '2025-05-01 18:59:23'),
(25, '501', '7', '30', 100, 'Pic', 20.00, '0', 2000.00, '2025-05-01 18:59:23', '2025-05-01 18:59:23'),
(26, '124', '25', '35', 100, 'Pic', 900.00, '0', 90000.00, '2025-05-21 20:11:13', '2025-05-21 20:11:13'),
(27, '502', '8', '22', 100, 'Pic', 800.00, '0', 80000.00, '2025-05-29 18:31:10', '2025-05-29 18:31:10'),
(28, '502', '8', '33', 100, 'Pic', 1000.00, '0', 100000.00, '2025-05-29 18:31:10', '2025-05-29 18:31:10');

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
(1, 0, 1, NULL, 'DENIS 2', NULL, 'MJ', '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 790, NULL, '0', NULL, '0', '2025-04-08 01:21:02', '2025-04-08 01:21:02'),
(3, 0, 1, NULL, 'D-1, D-2', 'M25150002', 'MJ', '1', 'S KVT OUT 1.38W\r\nQ SW OUT 750W\r\n2*2 OUT 1.38W\r\n3*1 OUT 403W\r\nS 3*1 540W\r\n2*2 B (240WATT)(0.09 WALT)', NULL, '0', NULL, 1, '0', 1, NULL, 44019, NULL, '1', NULL, '1', '2025-04-08 19:39:14', '2025-05-12 19:30:57'),
(4, 0, 1, NULL, NULL, NULL, NULL, NULL, '130', NULL, '1', NULL, NULL, '130', 0, NULL, 4425, NULL, '0', NULL, '0', '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(5, 1, 1, NULL, 'DENIS 2', 'M25150001', 'MJ', '1', 'M25150001 M25150001', 'M25150001 M25150001', '2', NULL, NULL, 'M25150001', 1, NULL, 540, NULL, '0', NULL, '0', '2025-04-09 00:50:39', '2025-04-09 00:50:39'),
(6, 1, 0, NULL, 'visu,mira,rashmi', 'C24210162', 'MJ', '3', 'Final o/p :-20w, 20amp', '45-45 change, 30-30 Replace', '2', NULL, NULL, NULL, 1, NULL, 1335, NULL, '0', NULL, '0', '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(7, 1, 1, NULL, 'KOMAL,VISU ELE', 'C12308095', NULL, NULL, '30 WATT LD:-19.33WATT\r\n45 LD:-28.12 WATT & 8.76WALT', NULL, '2', NULL, NULL, NULL, 1, NULL, 908, NULL, '0', NULL, '0', '2025-04-09 17:47:41', '2025-04-09 17:47:42'),
(8, 0, 1, '2025-03-25', 'MIRA', 'C25250003', 'NA', '4', 'FINAL O/P:- 23.3W / 9 AMP', 'LOSS 0.25 & 1.03', '4', NULL, 1, '0', 0, NULL, 12720, NULL, '0', '2025-05-26', '1', '2025-04-09 17:59:33', '2025-05-27 22:55:33'),
(9, 0, 1, NULL, 'D 2', '123', 'MJ', '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 3475, NULL, '0', NULL, '0', '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(10, 1, 1, NULL, 'Olympia Hudson', 'M24150004', 'Est autem ullam sun', '1', 'Rerum dolor veniam', 'Et tenetur officia o', '4', NULL, NULL, 'Quis maiores ut enim', 1, NULL, 1666, '{\"demo_2\":\"Fugiat ullamco dolo\",\"demo_3\":null,\"demo_1\":\"Aut qui nisi est in\"}', '0', '2025-05-26', '1', '2025-04-25 21:40:13', '2025-05-27 22:55:33'),
(11, 0, 1, '2025-05-10', 'DENIS 2', 'M24150004', 'asda', '3', 'SACSA57D1', '1AS7D17 S6AD71', '0', NULL, 1, NULL, 0, NULL, 1415, '{\"demo_2\":\"ASDSA\",\"demo_3\":\"ASDASD\",\"demo_1\":\"CXZCZXCAS\"}', '1', NULL, '1', '2025-04-25 21:40:21', '2025-05-10 19:11:19'),
(12, 0, 1, '2025-03-30', 'Mira, Rashmi', 'C25250002', NULL, '4', '23W / 9A', NULL, '4', NULL, 1, '0', 1, NULL, 21024, '[]', '0', '2025-05-26', '1', '2025-04-28 19:58:17', '2025-05-27 23:56:16'),
(13, 1, 0, '2025-04-30', 'DENIZA', 'C25210256', 'MJ', '3', 'A+1 Fiber', '23.2 w/ 9 amp', '0', 'Verify By Acc.', 1, NULL, 0, NULL, 30, '[]', '1', NULL, '0', '2025-05-10 19:01:55', '2025-05-10 19:03:43'),
(14, 1, 0, NULL, 'Dharm', 'M24210121', 'mj', '3', '19.9 W/ 10.50 amp', NULL, '2', NULL, NULL, NULL, 1, NULL, 500, '[]', '0', NULL, '0', '2025-05-10 19:29:20', '2025-05-10 19:29:20'),
(15, 1, 0, NULL, 'Dhruvi', 'M25210239', 'mj', '3', 'big cavity punchers, Hr burn', NULL, '2', NULL, NULL, NULL, 1, NULL, 500, '[]', '0', NULL, '0', '2025-05-10 19:34:11', '2025-05-10 19:34:11'),
(16, 1, 0, NULL, 'Dharm', 'C24210150', 'MJ', '3', 'Final O-p- 24w, 10.50 amp.', 'Coupler Re-Joint', '2', NULL, NULL, NULL, 1, NULL, NULL, '[]', '0', NULL, '0', '2025-05-10 19:38:37', '2025-05-10 19:38:37'),
(17, 1, 1, '2025-03-30', 'Visu, Dhruvi', 'K25210290', NULL, '3', '20W / 11.5A', NULL, '2', NULL, 1, 'K25210290', 0, NULL, 34908, '[]', '1', NULL, '0', '2025-05-21 00:16:38', '2025-05-25 00:36:36'),
(18, 0, 1, '2025-05-23', 'Anjali, Sweta', 'K25210289', NULL, '3', 'New Q-switch', NULL, '0', NULL, 1, 'K25210289', 1, NULL, 16739, '[]', '1', '2025-05-26', '1', '2025-05-21 00:34:28', '2025-05-28 00:03:09'),
(19, 0, 1, NULL, NULL, NULL, NULL, NULL, '20W / 11.50 A', NULL, '1', NULL, 0, 'K25210288', 1, NULL, 17180, '[]', '0', NULL, '0', '2025-05-21 00:43:44', '2025-05-24 21:36:09'),
(20, 0, 1, '2025-03-29', 'Anjali, Sweta', 'K25210287', 'mj', '3', '20W/ 11 A', NULL, '0', NULL, 1, '0', 0, NULL, 10360, '[]', '1', NULL, '0', '2025-05-21 00:59:49', '2025-05-23 21:55:46'),
(21, 0, 1, '2025-04-03', 'Priya, Sweta', 'C25250004', NULL, '4', '22.8W/11.2A', NULL, '0', NULL, 1, '0', 0, NULL, 12340, '[]', '1', '2025-05-25', '0', '2025-05-21 19:08:52', '2025-05-27 22:14:35'),
(23, 0, 1, '2025-03-29', 'Visu, Mira, Rashmi', 'K25210286', NULL, '3', '20W/11.3 A', NULL, '0', NULL, 1, '0', 0, NULL, 10640, '[]', '1', NULL, '0', '2025-05-21 21:56:27', '2025-05-23 23:35:27'),
(24, 0, 1, NULL, 'Visu, Komal', 'K25210285', NULL, '3', '20W/11.5A', NULL, '1', NULL, 0, '0', 0, NULL, 9181, '[]', '0', NULL, '0', '2025-05-21 22:04:30', '2025-05-23 00:20:47'),
(25, 0, 1, NULL, 'Visu. Komal', 'K25210284', NULL, '3', '20W. 11.5 A', NULL, '1', NULL, 0, '0', 0, NULL, 8833, '[]', '0', NULL, '0', '2025-05-21 22:35:33', '2025-05-23 00:51:06'),
(26, 1, 1, '2025-05-26', 'Visu | Denis', 'C25210291', NULL, '4', 'error', 'DONE SMALL CAVITY', '2', '20 w. temp 45c', 1, '0', 1, NULL, 25103, '[]', '1', '2025-05-26', '1', '2025-05-26 18:53:16', '2025-05-27 20:13:32'),
(27, 1, 0, '2025-04-18', 'Visu Dhruvi', 'M25180029', NULL, '2', 'Cavity Punchers, M25210238 (21 W) convert to M25180029 (18 W).', '17 w final Op,11 Amp', '0', NULL, 1, '0', 0, 2, 3354, '[]', '1', NULL, '0', '2025-05-28 01:11:17', '2025-05-28 01:19:47'),
(28, 1, 1, NULL, NULL, 'M-24', NULL, '4', 'Marking 24', NULL, '1', NULL, 0, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-05-28 23:41:08', '2025-05-28 23:41:08'),
(29, 1, 1, NULL, NULL, 'K25210261', NULL, '3', 'Fiber Issue During Testing', NULL, '1', NULL, 0, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-05-28 23:55:03', '2025-05-28 23:55:03'),
(30, 1, 0, NULL, NULL, 'M2403210037', NULL, '3', 'Off Beam', NULL, '1', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-05-28 23:56:23', '2025-05-28 23:56:23'),
(31, 1, 0, NULL, NULL, 'K24210186', NULL, '3', 'Beam Off', NULL, '1', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-05-28 23:57:05', '2025-05-28 23:57:05'),
(32, 1, 0, NULL, NULL, 'C24210216', NULL, '4', 'Beam Mode Off', NULL, '1', NULL, 0, NULL, 0, 2, NULL, '[]', '0', NULL, '0', '2025-05-29 00:00:36', '2025-05-29 00:00:36'),
(33, 1, 0, NULL, NULL, '14CC02070', NULL, '3', '20w || 10.50Amp', NULL, '1', NULL, 0, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-05-29 00:02:08', '2025-05-29 00:02:08'),
(34, 1, 0, NULL, NULL, 'C24210156', NULL, '3', 'Loss:- 0.05 Beam Mode Off', NULL, '1', NULL, 0, NULL, 0, 2, NULL, '[]', '0', NULL, '0', '2025-05-29 00:04:15', '2025-05-29 00:04:15'),
(35, 1, 1, NULL, NULL, 'C22302027', NULL, '3', 'Beam Mode Off', NULL, '1', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-05-29 00:13:50', '2025-05-29 00:13:50'),
(36, 1, 0, NULL, NULL, 'C02201067', NULL, '1', 'Power Off', NULL, '1', NULL, 0, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-05-29 00:21:33', '2025-05-29 00:21:33');

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
(1, '1', 'Pic', '1', '0', '103', 'ZXCBLD1600', '1', '4.2', '4.2', '1.5', '2025-04-08 01:21:02', '2025-04-08 01:21:02'),
(2, '3', 'Pic', '1', '0', '303', 'ZXCBLD4600', '1', '10', '4.1', '5.7', '2025-04-08 01:21:02', '2025-04-08 01:21:02'),
(3, '32', 'Pic', '2', '0', '513', '0', '1', NULL, NULL, NULL, '2025-04-08 19:31:15', '2025-04-08 19:31:15'),
(4, '35', 'Pic', '2', '0', '3', '0', '1', NULL, NULL, NULL, '2025-04-08 19:31:15', '2025-04-08 19:31:15'),
(124, '2', 'Pic', '6', '0', '526', 'ZXHZBB7711', '1', '7.9', '7.54', '14.30', '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(123, '16', 'Mtr', '3', '0', '506', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(122, '3', 'Pic', '3', '0', '521', 'ZXHZAY1458', '1', NULL, NULL, '22.40', '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(121, '15', 'Pic', '3', '0', '517', 'GA241129FQ278381', '1', NULL, NULL, '750', '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(13, '32', 'Pic', '4', '0', '513', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(14, '35', 'Pic', '4', '0', '3', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(15, '20', 'Pic', '4', '0', '1', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(16, '21', 'Pic', '4', '0', '2', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(17, '30', 'Pic', '4', '0', '514', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(18, '18', 'Pic', '4', '0', '509', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(19, '23', 'Pic', '4', '0', '511', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(20, '19', 'Pic', '4', '0', '305', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(21, '26', 'Mtr', '4', '0', '507', '0', '1', NULL, NULL, NULL, '2025-04-08 19:44:12', '2025-04-08 19:44:12'),
(120, '3', 'Pic', '3', '0', '522', 'ZXHZBB1186', '1', '7.83', '11.53', '21.25', '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(119, '1', 'Pic', '3', '1', '515', 'ZHHZAY8592', '1', '2.76', '2.83', '2.30', '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(117, '35', 'Pic', '3', '0', '525', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(118, '32', 'Pic', '3', '0', '513', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(115, '30', 'Pic', '3', '0', '514', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(116, '21', 'Pic', '3', '0', '2', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(113, '18', 'Pic', '3', '0', '509', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(114, '23', 'Pic', '3', '0', '511', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(112, '20', 'Pic', '3', '0', '1', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(111, '19', 'Pic', '3', '0', '305', '0', '1', NULL, NULL, NULL, '2025-04-09 01:03:32', '2025-04-09 01:03:32'),
(110, '3', 'Pic', '5', '0', '524', 'ZXHZBB1188', '1', '4.2', '4.1', '1.5', '2025-04-09 00:50:39', '2025-04-09 00:50:39'),
(125, '2', 'Pic', '6', '0', '527', 'ZXHZBB8134', '1', '14.28', NULL, NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(126, '18', 'Pic', '6', '0', '509', '0', '1', NULL, NULL, NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(127, '19', 'Pic', '6', '0', '305', '0', '1', NULL, NULL, NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(128, '26', 'Mtr', '6', '0', '507', '0', '1', NULL, NULL, NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(129, '21', 'Pic', '7', '0', '2', '0', '1', NULL, NULL, NULL, '2025-04-09 17:47:42', '2025-04-09 17:47:42'),
(130, '18', 'Pic', '7', '0', '509', '0', '1', NULL, NULL, NULL, '2025-04-09 17:47:42', '2025-04-09 17:47:42'),
(464, '18', 'Pic', '8', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(463, '26', 'Mtr', '8', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(462, '16', 'Mtr', '8', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(461, '33', 'Pic', '8', '0', '531', 'EBBC16796', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(460, '3', 'Pic', '8', '0', '530', 'ZXHZAY5473', '1', NULL, NULL, '24.30', '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(459, '1', 'Pic', '8', '0', '529', 'ZXHZBA4694', '1', '2.66', '2.47', '2.24', '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(458, '3', 'Pic', '8', '0', '528', 'ZXHZAY5453', '1', '8.23', '11.58', '24.17', '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(457, '20', 'Pic', '8', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(456, '21', 'Pic', '8', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(455, '30', 'Pic', '8', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(454, '35', 'Pic', '8', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(453, '32', 'Pic', '8', '0', '513', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(145, '1', 'Pic', '9', '0', '546', 'ZXHZBB2456', '1', '1.', '10', '10', '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(146, '16', 'Mtr', '9', '0', '506', '0', '1', NULL, NULL, NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(147, '31', 'Pic', '9', '0', '512', '0', '1', NULL, NULL, NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(148, '35', 'Pic', '9', '0', '525', '0', '1', NULL, NULL, NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(149, '30', 'Pic', '9', '0', '514', '0', '1', NULL, NULL, NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(150, '21', 'Pic', '9', '0', '2', '0', '1', NULL, NULL, NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(151, '3', 'Pic', '9', '0', '547', 'ZXHZBB2457', '1', '4.2', '1.1', '12', '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(152, '32', 'Pic', '10', '0', '513', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(153, '33', 'Pic', '10', '1', '548', 'Perferendis nostrud', '1', 'Aliquid sunt amet q', 'Id omnis autem qui q', 'A aut asperiores dig', '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(154, '34', 'Pic', '10', '0', '1', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(155, '35', 'Pic', '10', '0', '525', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(156, '37', 'Mtr', '10', '0', '508', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(157, '32', 'Pic', '11', '0', '513', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(158, '33', 'Pic', '11', '0', '549', NULL, '1', '1', '1', '1', '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(159, '34', 'Pic', '11', '0', '1', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(160, '35', 'Pic', '11', '0', '525', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(161, '37', 'Mtr', '11', '0', '508', '0', '1', NULL, NULL, NULL, '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(564, '15', 'Pic', '12', '0', '588', 'GA241129FQ278400', '1', NULL, NULL, '830', '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(565, '16', 'Mtr', '12', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(563, '33', 'Pic', '12', '0', '587', 'EBBD16095', '1', NULL, NULL, '23', '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(562, '3', 'Pic', '12', '0', '586', 'ZXHZBB1210', '1', '8.2', '11.57', '24.04', '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(174, '18', 'Pic', '13', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-10 19:02:41', '2025-05-10 19:02:41'),
(173, '26', 'Mtr', '13', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-10 19:02:41', '2025-05-10 19:02:41'),
(175, '19', 'Pic', '14', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-10 19:29:20', '2025-05-10 19:29:20'),
(176, '19', 'Pic', '15', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-10 19:34:11', '2025-05-10 19:34:11'),
(551, '15', 'Pic', '18', '0', '580', 'GA241129FQ278333', '1', NULL, NULL, '620', '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(537, '23', 'Pic', '17', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(536, '26', 'Mtr', '17', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(535, '15', 'Pic', '17', '0', '578', 'GA24112FQ278393', '1', NULL, NULL, NULL, '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(534, '19', 'Pic', '17', '0', '305', '0', '2', NULL, NULL, NULL, '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(533, '1', 'Pic', '17', '0', '551', 'ZXHZAZ5323', '1', '2.72', '2.48', '20', '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(532, '20', 'Pic', '17', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(550, '16', 'Mtr', '18', '0', '506', '0', '4.5', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(549, '19', 'Pic', '18', '0', '305', '0', '6', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(548, '31', 'Pic', '18', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(546, '23', 'Pic', '18', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(547, '18', 'Pic', '18', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(545, '30', 'Pic', '18', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(544, '1', 'Pic', '18', '0', '554', 'ZXHZAW3736', '1', '2.66', '2.8', '2.2', '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(581, '33', 'Pic', '19', '0', '581', 'EBBD16130', '1', NULL, NULL, '20', '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(580, '18', 'Pic', '19', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(578, '26', 'Mtr', '19', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(579, '19', 'Pic', '19', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(577, '16', 'Mtr', '19', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(575, '35', 'Pic', '19', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(576, '23', 'Pic', '19', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(427, '20', 'Pic', '20', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(426, '35', 'Pic', '20', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(425, '2', 'Pic', '20', '0', '562', 'ZXHZBB9026', '1', '10.80', '7.66', '21.5', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(424, '2', 'Pic', '20', '0', '561', 'ZXHZBD3433', '1', '10.80', '7.66', '21.5', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(423, '1', 'Pic', '20', '0', '560', 'ZXHZAZ4614', '1', '2.9', '2.49', '2.13', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(444, '30', 'Pic', '21', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(443, '20', 'Pic', '21', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(442, '32', 'Pic', '21', '0', '513', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(441, '35', 'Pic', '21', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(440, '3', 'Pic', '21', '0', '565', 'ZXHZAY5482', '1', '9.23', '8.75', '18.00', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(439, '2', 'Pic', '21', '0', '564', 'ZXHZBA9071', '1', '3.09', '4.74', '18.23', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(438, '1', 'Pic', '21', '0', '563', 'ZXHZBA3431', '1', '3.09', '4.74', '2.1', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(566, '26', 'Mtr', '12', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(561, '32', 'Pic', '12', '0', '513', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(560, '1', 'Pic', '12', '0', '545', 'ZXHZBA9053', '1', '1.2', '2.2', '2.3', '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(488, '30', 'Pic', '23', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(487, '21', 'Pic', '23', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(486, '20', 'Pic', '23', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(485, '2', 'Pic', '23', '0', '570', 'ZXHZAB7707', '1', '10.44', '7.56', '21.11', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(484, '2', 'Pic', '23', '0', '569', 'ZXHZBB7737', '1', '10.44', '7.56', '19.55', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(483, '1', 'Pic', '23', '0', '568', 'ZXHZAV5093', '1', '2.75', '2.45', '2.19', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(502, '21', 'Pic', '24', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(501, '20', 'Pic', '24', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(500, '3', 'Pic', '24', '0', '573', 'ZXHZBC5280', '1', '8.2', '7.59', '18.02', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(499, '2', 'Pic', '24', '0', '572', 'ZXHZBC5315', '1', '8.2', '7.59', '17.56', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(498, '1', 'Pic', '24', '0', '571', 'ZXHZAV7780', '1', '2.7', '3.01', '2.32', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(517, '20', 'Pic', '25', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(516, '31', 'Pic', '25', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(515, '2', 'Pic', '25', '0', '576', 'ZXHZBD3897', '1', '10.5', '7.5', '20.00', '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(514, '2', 'Pic', '25', '0', '575', 'ZXHZBB9040', '1', '10.55', '7.59', '20.25', '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(513, '1', 'Pic', '25', '0', '574', 'ZXHZAZ4565', '1', '2.6', '2.48', '2.05', '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(531, '30', 'Pic', '17', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(530, '35', 'Pic', '17', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(529, '2', 'Pic', '17', '0', '552', 'ZXHZBB9136', '1', '10.80', '7.43', '20', '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(528, '16', 'Mtr', '17', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(527, '2', 'Pic', '17', '0', '553', 'ZXHZBD4794', '1', NULL, NULL, '20.44', '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(526, '21', 'Pic', '17', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(525, '31', 'Pic', '17', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 18:57:08', '2025-05-23 18:57:08'),
(543, '2', 'Pic', '18', '0', '555', 'ZXHZBD3383', '1', '8.64', '7.58', '16.30', '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(542, '2', 'Pic', '18', '0', '556', 'ZXHZBB9139', '1', '8.92', '8.42', '17.06', '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(541, '20', 'Pic', '18', '0', '1', '0', '2', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(540, '21', 'Pic', '18', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(539, '35', 'Pic', '18', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(574, '30', 'Pic', '19', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(573, '1', 'Pic', '19', '0', '557', 'ZXHZAV9887', '1', '2.9', '2.5', '2', '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(572, '2', 'Pic', '19', '0', '558', 'ZXHZBB9156', '1', '11.13', '7.57', '20', '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(571, '2', 'Pic', '19', '0', '559', 'ZXHZBC5484', '1', '11.13', '7.57', '21.7', '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(570, '20', 'Pic', '19', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(569, '21', 'Pic', '19', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(428, '21', 'Pic', '20', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(429, '30', 'Pic', '20', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(430, '23', 'Pic', '20', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(431, '31', 'Pic', '20', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(432, '33', 'Pic', '20', '0', '583', 'EBBD16133', '1', NULL, NULL, '20', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(433, '15', 'Pic', '20', '0', '584', 'GA241129FQ278428', '1', NULL, NULL, '640', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(434, '16', 'Mtr', '20', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(435, '26', 'Mtr', '20', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(436, '18', 'Pic', '20', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(437, '19', 'Pic', '20', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(445, '21', 'Pic', '21', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(446, '15', 'Pic', '21', '0', '566', 'GA241129FQ278376', '1', NULL, NULL, '800', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(447, '23', 'Pic', '21', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(448, '33', 'Pic', '21', '0', '585', 'EBBD166134', '1', NULL, NULL, '23', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(449, '16', 'Mtr', '21', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(450, '26', 'Mtr', '21', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(451, '18', 'Pic', '21', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(452, '19', 'Pic', '21', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(465, '23', 'Pic', '8', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(466, '19', 'Pic', '8', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-22 23:12:00', '2025-05-22 23:12:00'),
(559, '16', 'Mtr', '12', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(558, '21', 'Pic', '12', '1', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(557, '2', 'Pic', '12', '0', '550', 'ZXHZBA9011', '1', '8.5', '11.5', '24.81', '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(556, '30', 'Pic', '12', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(555, '16', 'Mtr', '12', '1', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(554, '30', 'Pic', '12', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(553, '35', 'Pic', '12', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(489, '31', 'Pic', '23', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(490, '35', 'Pic', '23', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(491, '23', 'Pic', '23', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(492, '33', 'Pic', '23', '0', '589', 'EBBD16132', '1', NULL, NULL, '20', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(493, '16', 'Mtr', '23', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(494, '26', 'Mtr', '23', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(495, '15', 'Pic', '23', '0', '590', 'GA241129FQ278337', '1', NULL, NULL, '700', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(496, '18', 'Pic', '23', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(497, '19', 'Pic', '23', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(503, '30', 'Pic', '24', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(504, '31', 'Pic', '24', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(505, '23', 'Pic', '24', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(506, '31', 'Pic', '24', '0', '512', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(507, '33', 'Pic', '24', '0', '591', 'EBBD16063', '1', NULL, NULL, '1.33', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(508, '15', 'Pic', '24', '0', '592', 'GA241129FQ278350', '1', NULL, NULL, '670', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(509, '16', 'Mtr', '24', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(510, '26', 'Mtr', '24', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(511, '34', 'Pic', '24', '0', '510', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(512, '19', 'Pic', '24', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(518, '21', 'Pic', '25', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(519, '30', 'Pic', '25', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(520, '23', 'Pic', '25', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(521, '15', 'Pic', '25', '0', '593', 'GA241129FQ278372', '1', NULL, NULL, '680', '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(522, '16', 'Mtr', '25', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(523, '18', 'Pic', '25', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(524, '19', 'Pic', '25', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(538, '33', 'Pic', '17', '0', '579', 'EBBD16135', '1', NULL, NULL, NULL, '2025-05-23 18:57:09', '2025-05-23 18:57:09'),
(552, '26', 'Mtr', '18', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-23 19:03:12', '2025-05-23 19:03:12'),
(567, '19', 'Pic', '12', '0', '305', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(568, '23', 'Pic', '12', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-23 22:05:58', '2025-05-23 22:05:58'),
(582, '15', 'Pic', '19', '0', '582', 'GA241129FQ278338', '1', NULL, NULL, '730', '2025-05-24 21:36:09', '2025-05-24 21:36:09'),
(633, '26', 'Mtr', '26', '0', '507', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(632, '33', 'Pic', '26', '0', '598', 'EBBD16064', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(629, '35', 'Pic', '26', '0', '567', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(630, '23', 'Pic', '26', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(631, '15', 'Pic', '26', '0', '597', 'GA241129FQ278380', '1', NULL, NULL, '700', '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(628, '32', 'Pic', '26', '0', '513', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(627, '3', 'Pic', '26', '0', '596', 'ZXHZAY5460', '1', '7.75', '11.73', '22', '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(626, '3', 'Pic', '26', '0', '595', 'ZXHZAY1409', '1', '7.75', '11.73', '21.0', '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(625, '1', 'Pic', '26', '0', '594', 'ZXHZAV7901', '1', '2.60', '2.49', '2.22', '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(624, '30', 'Pic', '26', '0', '514', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(623, '21', 'Pic', '26', '0', '2', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(622, '20', 'Pic', '26', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(621, '16', 'Mtr', '26', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(620, '19', 'Pic', '26', '0', '305', '0', '2', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(619, '18', 'Pic', '26', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-26 19:03:59', '2025-05-26 19:03:59'),
(643, '16', 'Mtr', '27', '0', '506', '0', '1', NULL, NULL, NULL, '2025-05-28 01:19:01', '2025-05-28 01:19:01'),
(642, '23', 'Pic', '27', '0', '511', '0', '1', NULL, NULL, NULL, '2025-05-28 01:19:01', '2025-05-28 01:19:01'),
(641, '20', 'Pic', '27', '0', '1', '0', '1', NULL, NULL, NULL, '2025-05-28 01:19:01', '2025-05-28 01:19:01'),
(640, '18', 'Pic', '27', '0', '509', '0', '1', NULL, NULL, NULL, '2025-05-28 01:19:01', '2025-05-28 01:19:01');

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
(1, '1', '2025-04-08', 1, '1', '0', 105000.00, 0.00, 0.00, 105000.00, NULL, '2025-04-09 01:17:21', '2025-04-09 01:17:21'),
(2, '2', '2025-05-26', 1, '0', '0', 95000.00, 0.00, 0.00, 95000.00, NULL, '2025-05-25 01:18:58', '2025-05-26 18:42:04'),
(3, '107', '2025-05-26', 1, '0', '0', 95000.00, 0.00, 0.00, 95000.00, NULL, '2025-05-26 19:05:49', '2025-05-26 19:07:41'),
(5, '3', '2025-05-26', 2, '1', '0', 2000.00, 0.00, 0.00, 2000.00, NULL, '2025-05-27 22:55:33', '2025-05-27 22:55:33'),
(6, '4', '2025-05-26', 2, '0', '0', 220000.00, 0.00, 0.00, 220000.00, NULL, '2025-05-27 23:56:16', '2025-05-27 23:56:16');

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
(1, '1', '1', '3', '1', '4', 'Pic', 'M25150002', '1', '105000', '0', 105000.00, '0', '2025-04-09 01:17:21', '2025-04-09 01:17:21'),
(16, '2', '2', '8', '1', '4', 'Pic', 'C25250003', '1', '95000', '0', 95000.00, '0', '2025-05-26 18:42:04', '2025-05-26 18:42:04'),
(19, '3', '107', '26', '1', '6', 'Pic', 'C25210291', '1', '95000', '0', 95000.00, '0', '2025-05-26 19:07:42', '2025-05-26 19:07:42'),
(24, '5', '3', '8', '1', '7', 'Pic', 'C25250003', '1', '2000', '0', 2000.00, '0', '2025-05-27 22:55:33', '2025-05-27 22:55:33'),
(25, '6', '4', '18', '1', '6', 'Pic', 'K25210289', '1', '110000', '0', 110000.00, '0', '2025-05-27 23:56:16', '2025-05-27 23:56:16'),
(26, '6', '4', '12', '1', '7', 'Pic', 'C25250002', '1', '110000', '0', 110000.00, '0', '2025-05-27 23:56:16', '2025-05-27 23:56:16');

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
(1, '2025-05-12', '1', '1', 'M25150002', '1', '4', 1, 'Pic', 105000.00, 'Not Working Properly', '2025-05-12 19:30:57', '2025-05-12 19:30:57'),
(2, '2025-05-27', '1', '107', 'C25210291', '1', '6', 1, 'Pic', 95000.00, 'Watt Down', '2025-05-27 20:12:56', '2025-05-27 20:12:56'),
(3, '2025-05-27', '2', '4', 'K25210289', '1', '6', 1, 'Pic', 110000.00, 'Watt Down', '2025-05-28 00:03:09', '2025-05-28 00:03:09');

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
(1, '2025-04-01', '1', 7, 20, '0', 100, 110000.00, 1100.00, '1', NULL, '2025-04-08 01:01:17', '2025-04-08 19:39:14'),
(2, '2025-04-01', '1', 7, 21, '0', 100, 90000.00, 900.00, '1', NULL, '2025-04-08 01:01:34', '2025-04-08 19:39:14'),
(3, '2025-04-01', '1', 25, 35, '0', 100, 80000.00, 800.00, '1', NULL, '2025-04-08 01:01:52', '2025-04-08 19:31:15'),
(304, '2025-04-01', '2', 11, 18, '0', 200, 52000.00, 260.00, '1', NULL, '2025-04-08 01:06:23', '2025-04-25 21:40:13'),
(305, '2025-04-01', '2', 6, 19, '0', 100, 50000.00, 500.00, '1', NULL, '2025-04-08 01:06:29', '2025-04-08 19:39:14'),
(598, '2025-04-01', '2', 8, 33, 'EBBD16064', 1, 60000.00, 600.00, '1', '0', '2025-05-26 19:02:08', '2025-05-26 19:03:59'),
(597, '2025-04-01', '2', 9, 15, 'GA241129FQ278380', 1, 80000.00, 800.00, '1', '0', '2025-05-26 18:57:49', '2025-05-26 19:03:59'),
(596, '2025-04-01', '2', 1, 3, 'ZXHZAY5460', 1, 54000.00, 540.00, '1', '0', '2025-05-26 18:53:16', '2025-05-26 19:03:59'),
(595, '2025-04-01', '2', 1, 3, 'ZXHZAY1409', 1, 54000.00, 540.00, '1', '0', '2025-05-26 18:53:16', '2025-05-26 19:03:59'),
(594, '2025-04-01', '2', 1, 1, 'ZXHZAV7901', 1, 25000.00, 250.00, '1', '0', '2025-05-26 18:53:16', '2025-05-26 19:03:59'),
(593, '2025-04-01', '2', 9, 15, 'GA241129FQ278372', 1, 80000.00, 800.00, '1', '0', '2025-05-23 00:51:06', '2025-05-23 00:51:06'),
(592, '2025-04-01', '2', 9, 15, 'GA241129FQ278350', 1, 80000.00, 800.00, '1', '0', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(591, '2025-04-01', '2', 8, 33, 'EBBD16063', 1, 60000.00, 600.00, '1', '0', '2025-05-23 00:20:47', '2025-05-23 00:20:47'),
(590, '2025-04-01', '2', 9, 15, 'GA241129FQ278337', 1, 80000.00, 800.00, '1', '0', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(589, '2025-04-01', '2', 8, 33, 'EBBD16132', 1, 60000.00, 600.00, '1', '0', '2025-05-23 00:10:44', '2025-05-23 00:10:44'),
(588, '2025-04-01', '2', 9, 15, 'GA241129FQ278400', 1, 80000.00, 800.00, '1', '0', '2025-05-22 23:21:03', '2025-05-23 22:05:58'),
(587, '2025-04-01', '2', 8, 33, 'EBBD16095', 1, 60000.00, 600.00, '1', '0', '2025-05-22 23:21:03', '2025-05-23 22:05:58'),
(586, '2025-04-01', '2', 1, 3, 'ZXHZBB1210', 1, 54000.00, 540.00, '1', '0', '2025-05-22 23:21:03', '2025-05-23 22:05:58'),
(585, '2025-04-01', '2', 8, 33, 'EBBD166134', 1, 60000.00, 600.00, '1', '0', '2025-05-22 22:42:24', '2025-05-22 22:42:24'),
(584, '2025-04-01', '2', 9, 15, 'GA241129FQ278428', 1, 80000.00, 800.00, '1', '0', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(583, '2025-04-01', '2', 8, 33, 'EBBD16133', 1, 60000.00, 600.00, '1', '0', '2025-05-22 22:26:47', '2025-05-22 22:26:47'),
(582, '2025-04-01', '2', 9, 15, 'GA241129FQ278338', 1, 80000.00, 800.00, '1', '0', '2025-05-22 22:12:08', '2025-05-24 21:36:09'),
(581, '2025-04-01', '2', 8, 33, 'EBBD16130', 1, 60000.00, 600.00, '1', '0', '2025-05-22 22:12:08', '2025-05-24 21:36:09'),
(580, '2025-04-01', '2', 9, 15, 'GA241129FQ278333', 1, 80000.00, 800.00, '1', '0', '2025-05-22 22:07:32', '2025-05-23 19:03:12'),
(579, '2025-04-01', '2', 8, 33, 'EBBD16135', 1, 60000.00, 600.00, '1', '0', '2025-05-21 23:37:30', '2025-05-23 18:57:09'),
(578, '2025-04-01', '2', 9, 15, 'GA24112FQ278393', 1, 80000.00, 800.00, '1', '0', '2025-05-21 23:36:30', '2025-05-23 18:57:09'),
(577, '2025-04-01', '2', 9, 15, 'GA241129FQ278373', 1, 80000.00, 800.00, '1', '0', '2025-05-21 23:34:21', '2025-05-21 23:34:21'),
(576, '2025-04-01', '2', 1, 2, 'ZXHZBD3897', 1, 41000.00, 410.00, '1', '0', '2025-05-21 22:35:33', '2025-05-23 00:51:06'),
(575, '2025-04-01', '2', 1, 2, 'ZXHZBB9040', 1, 41000.00, 410.00, '1', '0', '2025-05-21 22:35:33', '2025-05-23 00:51:06'),
(574, '2025-04-01', '2', 1, 1, 'ZXHZAZ4565', 1, 25000.00, 250.00, '1', '0', '2025-05-21 22:35:33', '2025-05-23 00:51:06'),
(573, '2025-04-01', '2', 1, 3, 'ZXHZBC5280', 1, 54000.00, 540.00, '1', '0', '2025-05-21 22:04:30', '2025-05-23 00:20:47'),
(572, '2025-04-01', '2', 1, 2, 'ZXHZBC5315', 1, 41000.00, 410.00, '1', '0', '2025-05-21 22:04:30', '2025-05-23 00:20:47'),
(571, '2025-04-01', '2', 1, 1, 'ZXHZAV7780', 1, 25000.00, 250.00, '1', '0', '2025-05-21 22:04:30', '2025-05-23 00:20:47'),
(570, '2025-04-01', '2', 1, 2, 'ZXHZAB7707', 1, 41000.00, 410.00, '1', '0', '2025-05-21 21:56:27', '2025-05-23 00:10:44'),
(569, '2025-04-01', '2', 1, 2, 'ZXHZBB7737', 1, 41000.00, 410.00, '1', '0', '2025-05-21 21:56:27', '2025-05-23 00:10:44'),
(568, '2025-04-01', '2', 1, 1, 'ZXHZAV5093', 1, 25000.00, 250.00, '1', '0', '2025-05-21 21:56:27', '2025-05-23 00:10:44'),
(567, '2025-05-21', '124', 25, 35, '0', 100, 90000.00, 900.00, '1', NULL, '2025-05-21 20:27:07', '2025-05-21 21:56:27'),
(566, '2025-04-01', '2', 9, 15, 'GA241129FQ278376', 1, 80000.00, 800.00, '1', '0', '2025-05-21 19:08:52', '2025-05-22 22:42:24'),
(565, '2025-04-01', '2', 1, 3, 'ZXHZAY5482', 1, 54000.00, 540.00, '1', '0', '2025-05-21 19:08:52', '2025-05-22 22:42:24'),
(564, '2025-04-01', '2', 1, 2, 'ZXHZBA9071', 1, 41000.00, 410.00, '1', '0', '2025-05-21 19:08:52', '2025-05-22 22:42:24'),
(563, '2025-04-01', '2', 1, 1, 'ZXHZBA3431', 1, 25000.00, 250.00, '1', '0', '2025-05-21 19:08:52', '2025-05-22 22:42:24'),
(562, '2025-04-01', '2', 1, 2, 'ZXHZBB9026', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:59:49', '2025-05-22 22:26:47'),
(561, '2025-04-01', '2', 1, 2, 'ZXHZBD3433', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:59:49', '2025-05-22 22:26:47'),
(560, '2025-04-01', '2', 1, 1, 'ZXHZAZ4614', 1, 25000.00, 250.00, '1', '0', '2025-05-21 00:59:49', '2025-05-22 22:26:47'),
(559, '2025-04-01', '2', 1, 2, 'ZXHZBC5484', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:43:44', '2025-05-24 21:36:09'),
(558, '2025-04-01', '2', 1, 2, 'ZXHZBB9156', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:43:44', '2025-05-24 21:36:09'),
(557, '2025-04-01', '2', 1, 1, 'ZXHZAV9887', 1, 25000.00, 250.00, '1', '0', '2025-05-21 00:43:44', '2025-05-24 21:36:09'),
(556, '2025-04-01', '2', 1, 2, 'ZXHZBB9139', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:34:28', '2025-05-23 19:03:12'),
(555, '2025-04-01', '2', 1, 2, 'ZXHZBD3383', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:34:28', '2025-05-23 19:03:12'),
(554, '2025-04-01', '2', 1, 1, 'ZXHZAW3736', 1, 25000.00, 250.00, '1', '0', '2025-05-21 00:34:28', '2025-05-23 19:03:12'),
(553, '2025-04-01', '2', 1, 2, 'ZXHZBD4794', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:16:38', '2025-05-23 18:57:08'),
(552, '2025-04-01', '2', 1, 2, 'ZXHZBB9136', 1, 41000.00, 410.00, '1', '0', '2025-05-21 00:16:38', '2025-05-23 18:57:08'),
(551, '2025-04-01', '2', 1, 1, 'ZXHZAZ5323', 1, 25000.00, 250.00, '1', '0', '2025-05-21 00:16:38', '2025-05-23 18:57:09'),
(550, '2025-04-01', '2', 1, 2, 'ZXHZBA9011', 1, 41000.00, 410.00, '1', '0', '2025-04-28 19:58:17', '2025-05-23 22:05:58'),
(549, '2025-04-01', '2', 8, 33, NULL, 100, 60000.00, 600.00, '1', NULL, '2025-04-25 21:40:21', '2025-04-25 21:40:21'),
(548, '2025-04-01', '2', 8, 33, 'Perferendis nostrud', 100, 60000.00, 600.00, '1', NULL, '2025-04-25 21:40:13', '2025-04-25 21:40:13'),
(547, '2025-04-01', '2', 1, 3, 'ZXHZBB2457', 1, 54000.00, 540.00, '1', NULL, '2025-04-09 22:43:26', '2025-04-09 22:43:26'),
(546, '2025-04-01', '2', 1, 1, 'ZXHZBB2456', 1, 25000.00, 250.00, '1', NULL, '2025-04-09 22:36:58', '2025-04-09 22:43:26'),
(545, '2025-04-01', '2', 1, 1, 'ZXHZBA9053', 1, 25000.00, 250.00, '1', '0', '2025-04-09 22:36:58', '2025-05-23 22:05:58'),
(544, '2025-04-01', '2', 1, 1, 'ZXHZBB2571', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(543, '2025-04-01', '2', 1, 1, 'ZXHZBB2307', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(542, '2025-04-01', '2', 1, 1, 'ZXHZBB2663', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(541, '2025-04-01', '2', 1, 1, 'ZXHZBB2330', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(540, '2025-04-01', '2', 1, 1, 'ZXHZBB2522', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(539, '2025-04-01', '2', 1, 1, 'ZXHZBB2598', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(538, '2025-04-01', '2', 1, 1, 'ZXHZBA9059', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(537, '2025-04-01', '2', 1, 1, 'ZXHZBB5551', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(536, '2025-04-01', '2', 1, 1, 'ZXHZBA9056', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(535, '2025-04-01', '2', 1, 1, 'ZXHZBB2672', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(534, '2025-04-01', '2', 1, 1, 'ZXHZBB2610', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(533, '2025-04-01', '2', 1, 1, 'ZXHZBB2382', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(532, '2025-04-01', '2', 1, 1, 'ZXHZBA9007', 1, 25000.00, 250.00, '0', NULL, '2025-04-09 22:36:58', '2025-04-09 22:36:58'),
(531, '2025-04-01', '2', 8, 33, 'EBBC16796', 1, 60000.00, 600.00, '1', '0', '2025-04-09 17:59:33', '2025-05-22 23:12:00'),
(530, '2025-04-01', '2', 1, 3, 'ZXHZAY5473', 1, 54000.00, 540.00, '1', '0', '2025-04-09 17:59:33', '2025-05-22 23:12:00'),
(529, '2025-04-01', '2', 1, 1, 'ZXHZBA4694', 1, 25000.00, 250.00, '1', '0', '2025-04-09 17:59:33', '2025-05-22 23:12:00'),
(528, '2025-04-01', '2', 1, 3, 'ZXHZAY5453', 1, 54000.00, 540.00, '1', '0', '2025-04-09 17:59:33', '2025-05-22 23:12:00'),
(527, '2025-04-01', '2', 1, 2, 'ZXHZBB8134', 1, 41000.00, 410.00, '1', NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(526, '2025-04-01', '2', 1, 2, 'ZXHZBB7711', 1, 41000.00, 410.00, '1', NULL, '2025-04-09 17:44:21', '2025-04-09 17:44:21'),
(525, '2025-04-08', '123', 25, 35, '0', 10, 7000.00, 700.00, '1', NULL, '2025-04-09 01:03:32', '2025-04-09 17:59:33'),
(524, '2025-04-01', '2', 1, 3, 'ZXHZBB1188', 1, 54000.00, 540.00, '1', NULL, '2025-04-09 00:50:39', '2025-04-09 00:50:39'),
(522, '2025-04-01', '2', 1, 3, 'ZXHZBB1186', 1, 54000.00, 540.00, '1', '0', '2025-04-08 22:05:05', '2025-04-09 01:03:32'),
(521, '2025-04-01', '2', 1, 3, 'ZXHZAY1458', 1, 54000.00, 540.00, '1', '0', '2025-04-08 22:05:05', '2025-04-09 01:03:32'),
(517, '2025-04-01', '2', 9, 15, 'GA241129FQ278381', 100, 80000.00, 800.00, '1', '0', '2025-04-08 19:50:41', '2025-04-09 01:03:32'),
(523, '2025-04-01', '2', 1, 3, 'ZXHZBB1187', 1, 54000.00, 540.00, '1', NULL, '2025-04-09 00:15:28', '2025-04-09 00:15:28'),
(515, '2025-04-01', '2', 1, 1, 'ZHHZAY8592', 100, 25000.00, 250.00, '1', '1', '2025-04-08 19:48:08', '2025-04-09 01:03:32'),
(514, '2025-04-01', '1', 7, 30, '0', 100, 100000.00, 1000.00, '1', NULL, '2025-04-08 19:39:14', '2025-04-08 19:39:14'),
(506, '2025-04-01', '3', 10, 16, '0', 1000, 5000.00, 5.00, '1', NULL, '2025-04-08 01:18:37', '2025-04-09 17:59:33'),
(507, '2025-04-01', '3', 10, 26, '0', 1000, 7000.00, 7.00, '1', NULL, '2025-04-08 01:18:46', '2025-04-08 19:44:12'),
(508, '2025-04-01', '3', 10, 37, '0', 1000, 6000.00, 6.00, '1', NULL, '2025-04-08 01:18:52', '2025-04-25 21:40:13'),
(509, '2025-04-01', '3', 11, 18, '0', 100, 800.00, 8.00, '1', NULL, '2025-04-08 01:18:59', '2025-04-08 19:39:14'),
(510, '2025-04-01', '3', 11, 34, '0', 100, 900.00, 9.00, '1', NULL, '2025-04-08 01:19:07', '2025-04-25 21:40:21'),
(511, '2025-04-01', '3', 12, 23, '0', 100, 1000.00, 10.00, '1', NULL, '2025-04-08 01:19:16', '2025-04-08 19:39:14'),
(512, '2025-04-01', '4', 26, 31, '0', 100, 8000.00, 80.00, '1', NULL, '2025-04-08 01:19:29', '2025-04-09 22:43:26'),
(513, '2025-04-01', '4', 26, 32, '0', 100, 10000.00, 100.00, '1', NULL, '2025-04-08 01:19:35', '2025-04-08 19:31:15');

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
(15, 9, 'QSWITCH', 'Pic', 1, 0, '2024-10-22 00:40:33', '2024-10-22 00:40:33'),
(16, 10, '10/130 (S)', 'Mtr', 0, 0, '2024-10-22 00:41:18', '2025-03-06 22:34:24'),
(18, 11, '3*1 (10*130)', 'Pic', 0, 0, '2024-10-22 00:43:20', '2025-04-08 19:30:44'),
(19, 6, 'HR', 'Pic', 0, 0, '2024-10-22 00:52:07', '2025-04-07 19:10:36'),
(20, 7, 'Power PCB', 'Pic', 0, 0, '2024-10-22 00:53:17', '2024-10-22 00:53:17'),
(21, 7, 'Control card', 'Pic', 0, 0, '2024-10-22 00:53:34', '2024-10-22 00:53:34'),
(22, 8, '20/130', 'Pic', 1, 0, '2024-10-22 00:54:16', '2025-03-05 22:24:15'),
(23, 12, '2*2', 'Pic', 0, 0, '2024-10-22 00:55:10', '2024-10-22 00:55:10'),
(26, 10, '30/250 (L)', 'Mtr', 0, 0, '2024-12-02 04:17:44', '2025-03-06 22:34:42'),
(30, 7, 'Thermal Cabel', 'Pic', 0, 0, '2025-03-04 00:53:11', '2025-03-06 23:12:54'),
(31, 26, 'SMALL BODY', 'Pic', 0, 0, '2025-03-05 22:25:33', '2025-03-05 22:25:33'),
(32, 26, 'BIG BODY', 'Pic', 0, 0, '2025-03-05 22:25:47', '2025-03-05 22:25:47'),
(33, 8, '30/250', 'Pic', 1, 0, '2025-03-05 22:26:47', '2025-03-06 23:39:39'),
(34, 11, '3*1(30/250)', 'Pic', 0, 0, '2025-03-05 22:30:28', '2025-03-05 22:30:28'),
(35, 25, 'rf card', 'Pic', 0, 0, '2025-03-05 22:41:52', '2025-04-08 01:00:53'),
(37, 10, '20/125 (M)', 'Mtr', 0, 0, '2025-03-06 22:34:02', '2025-03-06 22:34:02'),
(38, 27, 'Index Glue', 'Pic', 0, 0, '2025-03-08 00:36:43', '2025-03-08 00:36:43'),
(39, 27, 'Cavity Glue', 'Pic', 0, 0, '2025-03-08 00:37:02', '2025-03-08 00:37:02'),
(40, 27, 'Sealing Glue', 'Pic', 0, 0, '2025-03-08 00:37:20', '2025-03-08 00:37:20'),
(41, 27, 'Heat Sink Glue', 'Pic', 0, 0, '2025-03-08 00:42:01', '2025-03-08 00:42:01');

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
(20, 'Godown', 'godown', 'godown@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 8, '2024-11-22 23:45:11', '2024-11-22 23:45:11');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manufacture_report_layout_fields`
--
ALTER TABLE `manufacture_report_layout_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_acc_coa`
--
ALTER TABLE `tbl_acc_coa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_payments`
--
ALTER TABLE `tbl_customer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_purchase_returns`
--
ALTER TABLE `tbl_purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_return_items`
--
ALTER TABLE `tbl_purchase_return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_reports_items`
--
ALTER TABLE `tbl_reports_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=644;

--
-- AUTO_INCREMENT for table `tbl_report_permission`
--
ALTER TABLE `tbl_report_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- AUTO_INCREMENT for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
