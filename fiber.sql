-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2025 at 08:51 PM
-- Server version: 10.6.22-MariaDB-cll-lve
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
(16, 17, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-24 01:42:23', '2024-10-24 01:42:23'),
(17, 18, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-10-24 23:48:04', '2024-10-24 23:48:04'),
(18, 19, '[\"1\",\"6\",\"9\",\"10\",\"11\",\"14\",\"15\",\"16\",\"17\",\"18\",\"20\"]', '{\"1\":[\"1\",\"2\",\"3\",\"4\"],\"6\":[\"1\",\"2\",\"3\",\"4\"],\"9\":[\"1\",\"2\",\"3\",\"4\"],\"10\":[\"1\",\"2\",\"3\",\"4\"],\"11\":[\"1\",\"2\",\"3\",\"4\"],\"14\":[\"1\",\"2\",\"3\",\"4\"],\"15\":[\"1\",\"2\",\"3\",\"4\"],\"16\":[\"1\",\"2\",\"3\",\"4\"],\"17\":[\"1\",\"2\",\"3\",\"4\"],\"18\":[\"1\",\"2\",\"3\",\"4\"],\"20\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-11-18 00:24:42', '2024-11-18 00:24:42'),
(19, 20, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2024-11-22 23:45:33', '2024-11-22 23:45:33'),
(20, 15, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2025-03-03 23:24:42', '2025-03-03 23:24:42'),
(21, 21, '[\"9\"]', '{\"9\":[\"1\",\"2\",\"3\",\"4\"]}', '2025-07-17 22:02:07', '2025-07-17 22:02:07');

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
(3, 'Report 26', '4', '0', 'Description Report 26', 4, 0, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(4, 'Manufacturing Report 21', '3', '0', 'Report 21 Description', 4, 0, '2025-04-16 01:34:44', '2025-05-28 21:40:09'),
(5, '28 May', '3', '0', 'New 21 layout', 4, 0, '2025-05-28 21:40:00', '2025-07-14 18:05:04'),
(6, 'JULY 14-2025', '3', '0', 'NCH', 4, 0, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(7, '14 july 2025 (25)', '4', '0', 'asdsa', 4, 1, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(8, '21 Report', '3', '0', 'All Field Data for User Side, 21W file Data inserted.', 4, 1, '2025-07-22 17:20:07', '2025-07-22 17:52:23');

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
(7, 1, 'type', 'LD-15', 1, 8, '2025-04-12 06:54:41', '2025-07-22 17:52:23'),
(8, 1, 'demo_1', 'AOM-AOM', 1, 11, '2025-04-12 06:54:41', '2025-07-22 17:52:23'),
(9, 2, 'part', 'Fiber-10/130 (S)', 1, 12, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(10, 2, 'temp_no', 'HR-HR', 1, 14, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(11, 2, 'employee_name', 'CARD-Power PCB', 1, 15, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(12, 2, 'sr_fiber', 'CARD-Control Card', 1, 16, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(13, 2, 'mj', 'COUPLAR-2*2', 1, 18, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(14, 2, 'warranty', 'Fiber-30/250 CJA+', 1, 19, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(15, 2, 'type', 'CARD-THERMAL CABLE', 1, 20, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(16, 2, 'LD 15', 'BODY-SMALL BODY', 1, 21, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(17, 2, 'LD 30', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(18, 2, 'LD 45', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(19, 2, 'AOM QSWITCH', 'RF-RF', 1, 25, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(20, 2, 'Fiber 10/130 (S)', 'Fiber-30/250 Regular', 1, 26, '2025-04-14 10:15:34', '2025-07-22 17:52:23'),
(21, 2, 'COMBINER 3*1 (10*130)', 'BODY-BIG BODY', 1, 22, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(22, 2, 'HR HR', 'ISOLATOR-30/250', 1, 23, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(23, 2, 'CARD Power PCB', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(24, 2, 'CARD Control card', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(25, 2, 'ISOLATOR 20/130', 'Fiber-20/125 (M)', 1, 26, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(26, 2, 'COUPLAR 2*2', 'Glue-Index Glue', 1, 27, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(27, 2, 'Fiber 30/250 (L)', 'Glue-Cavity Glue', 1, 28, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(28, 2, 'CARD Thermal Cabel', 'Glue-Sealing Glue', 1, 29, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(29, 2, 'BODY SMALL BODY', 'Glue-Heat Sink Glue', 1, 30, '2025-04-14 10:15:34', '2025-07-15 01:20:03'),
(30, 2, 'ISOLATOR 30/250', 'LD-30 (2)', 1, 26, '2025-04-14 10:15:35', '2025-05-29 19:59:42'),
(31, 2, 'COMBINER 3*1(30/250)', 'COMBINER-3*1(30/250)', 1, 24, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(32, 2, 'RF rf card', 'RF-Rf Card', 1, 25, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(33, 2, 'Fiber 20/125 (M)', 'Fiber-20/125 (M)', 1, 26, '2025-04-14 10:15:35', '2025-04-14 10:15:35'),
(34, 3, 'part', 'Part', 1, 1, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(35, 3, 'temp', 'Temp no.', 1, 2, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(36, 3, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(37, 3, 'sr_no_fiber', 'SR (FIBER)', 0, 4, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(38, 3, 'mj', 'M.J', 1, 5, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(39, 3, 'warranty', 'Warranty', 1, 6, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
(40, 3, 'type', 'Type', 1, 7, '2025-04-15 07:26:03', '2025-07-15 01:20:03'),
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
(150, 7, 'temp', 'Temp no.', 1, 2, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(136, 6, 'part', 'Part', 1, 1, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(137, 6, 'temp', 'Temp no.', 1, 2, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(138, 6, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(139, 6, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(140, 6, 'mj', 'M.J', 1, 5, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(141, 6, 'warranty', 'Warranty', 1, 6, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(142, 6, 'type', 'Type', 1, 7, '2025-07-14 18:04:29', '2025-07-22 17:20:39'),
(143, 6, '22', 'ISOLATOR-20/130', 1, 17, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(144, 6, '26', 'Fiber-30/250 (L)', 1, 19, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(145, 6, '31', 'BODY-SMALL BODY', 1, 21, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(146, 6, '32', 'BODY-BIG BODY', 1, 22, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(147, 6, '33', 'ISOLATOR-30/250', 1, 23, '2025-07-14 18:04:29', '2025-07-14 18:04:29'),
(149, 7, 'part', 'Part', 1, 1, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(151, 7, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(152, 7, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(153, 7, 'mj', 'M.J', 1, 5, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(154, 7, 'warranty', 'Warranty', 1, 6, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(155, 7, 'type', 'Type', 1, 7, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(156, 7, '26', 'Fiber-30/250 (L)', 1, 19, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(157, 7, '32', 'BODY-BIG BODY', 1, 22, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(158, 7, '33', 'ISOLATOR-30/250', 1, 23, '2025-07-15 01:21:17', '2025-07-15 01:21:17'),
(159, 8, 'part', 'Part', 1, 1, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(160, 8, 'temp', 'Temp no.', 1, 2, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(161, 8, 'worker_name', 'EMPLOYEE NAME', 1, 3, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(162, 8, 'sr_no_fiber', 'SR (FIBER)', 1, 4, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(163, 8, 'mj', 'M.J', 1, 5, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(164, 8, 'warranty', 'Warranty', 1, 6, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(165, 8, 'type', 'Type', 1, 7, '2025-07-22 17:20:07', '2025-07-22 17:52:23'),
(166, 8, '1', 'LD-15', 1, 8, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(167, 8, '15', 'AOM-AOM', 1, 11, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(168, 8, '16', 'Fiber-10/130 (S)', 1, 12, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(169, 8, '19', 'HR-HR', 1, 14, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(170, 8, '20', 'CARD-Power PCB', 1, 15, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(171, 8, '21', 'CARD-Control Card', 1, 16, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(172, 8, '23', 'COUPLAR-2*2', 1, 18, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(173, 8, '26', 'Fiber-30/250 CJA+', 1, 19, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(174, 8, '30', 'CARD-THERMAL CABLE', 1, 20, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(175, 8, '31', 'BODY-SMALL BODY', 1, 21, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(176, 8, '33', 'ISOLATOR-30/250', 1, 23, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(177, 8, '34', 'COMBINER-3*1(30/250)', 1, 24, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(178, 8, '35', 'RF-RF', 1, 25, '2025-07-22 17:20:07', '2025-07-22 17:20:07'),
(179, 8, '37', 'Fiber-30/250 Regular', 1, 26, '2025-07-22 17:20:07', '2025-07-22 17:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `mark_as_read` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `mark_as_read`, `created_at`, `updated_at`) VALUES
(1, 4, 15, 'Bhai log... tumhe kab pata chala ki aap ki pass magaj nahi hia', 1, '2025-07-22 23:02:37', '2025-07-23 00:41:59'),
(2, 4, 21, 'All Done, Please carry On', 0, '2025-07-22 23:34:07', '2025-07-22 23:34:07'),
(3, 15, 4, 'HELLOO', 1, '2025-07-23 00:42:05', '2025-07-23 00:43:41'),
(4, 15, 4, 'COME HERE FOR SEC', 1, '2025-07-23 00:42:13', '2025-07-23 00:43:41'),
(5, 15, 4, 'HURRY', 1, '2025-07-23 00:42:17', '2025-07-23 00:43:41'),
(6, 15, 4, 'NOW', 1, '2025-07-23 00:42:21', '2025-07-23 00:43:41'),
(7, 15, 4, 'EYOOO', 1, '2025-07-23 00:42:55', '2025-07-23 00:43:41'),
(8, 15, 4, 'BROOO', 1, '2025-07-23 00:42:58', '2025-07-23 00:43:41'),
(9, 15, 4, 'HDGFUSYGUERGTIESUHSEO', 1, '2025-07-23 00:43:36', '2025-07-23 00:43:41'),
(10, 15, 4, 'KWDIUWHUBCJUUI', 1, '2025-07-23 00:43:37', '2025-07-23 00:43:41'),
(11, 15, 4, 'IDUYDIWKDNIUP', 1, '2025-07-23 00:43:39', '2025-07-23 00:43:41'),
(12, 15, 4, 'KRINKNOIR', 1, '2025-07-23 00:43:45', '2025-07-23 01:04:58'),
(13, 15, 4, 'KDUWHDJN', 1, '2025-07-23 00:43:46', '2025-07-23 01:04:58'),
(14, 15, 4, 'HIWFIWKWNOWJ', 1, '2025-07-23 00:43:48', '2025-07-23 01:04:58'),
(15, 15, 4, 'OIIIII', 1, '2025-07-23 01:03:56', '2025-07-23 01:04:58'),
(16, 15, 4, 'NSCHDCHSDV', 1, '2025-07-23 01:03:58', '2025-07-23 01:04:58'),
(17, 15, 4, 'SUKGUKB', 1, '2025-07-23 01:04:00', '2025-07-23 01:04:58'),
(18, 4, 15, 'Hlo', 1, '2025-07-23 01:05:18', '2025-07-23 01:08:46'),
(19, 4, 15, 'hu 6e', 1, '2025-07-23 01:05:48', '2025-07-23 01:08:46');

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
(1, '1', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(2, '2', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(3, '3', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(4, '15', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(5, '16', '3', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(6, '18', '3', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(7, '19', '10', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(8, '20', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(9, '21', '11', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(10, '22', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(11, '23', '12', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(12, '26', '3', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(13, '30', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(14, '31', '9', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(15, '32', '9', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(16, '33', '8', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(17, '34', '3', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(18, '35', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(19, '37', '3', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(20, '38', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(21, '39', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(22, '40', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(23, '41', '2', '2025-07-21 22:41:17', '2025-07-21 22:41:17'),
(24, '42', '7', '2025-07-21 22:41:17', '2025-07-21 22:41:17');

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
(72, '40036', 'Priteshbhai Bhungadiya', 'Accounts Receivable', '30013', 4, '2025-07-14 17:36:21', '2025-07-14 17:36:21'),
(73, '40037', 'HIREN DADA', 'Accounts Receivable', '30013', 4, '2025-07-14 19:32:15', '2025-07-14 19:32:15'),
(74, '40038', 'HIREN DADA', 'Accounts Receivable', '30013', 4, '2025-07-14 19:33:14', '2025-07-14 19:33:14'),
(75, '40039', 'HIREN DADA', 'Accounts Receivable', '30013', 4, '2025-07-14 19:33:43', '2025-07-14 19:33:43'),
(76, '40040', 'HIREN DADA', 'Accounts Receivable', '30013', 4, '2025-07-14 19:34:13', '2025-07-14 19:34:13'),
(77, '40041', 'PDS', 'Accounts Receivable', '30013', 4, '2025-07-17 18:59:11', '2025-07-17 18:59:11'),
(78, '40042', 'PERFECT', 'Accounts Receivable', '30013', 4, '2025-07-17 19:02:37', '2025-07-17 19:02:37'),
(79, '40043', 'Sanket Pote', 'Accounts Receivable', '30013', 4, '2025-07-17 19:04:06', '2025-07-17 19:04:06'),
(80, '40044', 'Paresh', 'Accounts Receivable', '30013', 4, '2025-07-18 22:25:20', '2025-07-18 22:25:20'),
(81, '40045', 'DINESH CRYSTAL', 'Accounts Receivable', '30013', 4, '2025-07-21 18:31:06', '2025-07-21 18:31:06'),
(82, '40046', 'KARTIK MAXWIN', 'Accounts Receivable', '30013', 4, '2025-07-21 18:43:51', '2025-07-21 18:43:51'),
(83, '40047', 'HirenBhai', 'Accounts Receivable', '30013', 4, '2025-07-22 01:20:06', '2025-07-22 01:20:06');

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
(7, '0', 'CV-4', 'CV', '1', '2025-06-20', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 90000.00, '1', 1, 4, '2025-06-20 07:00:00', NULL, '2025-06-20 18:38:06', '2025-06-20 18:38:06'),
(8, '0', 'CV-5', 'CV', '2', '2025-07-15', 30002, 'Payment Voucher', 'Payment Voucher for customer', 0.00, 150000.00, '1', 1, 19, '2025-07-15 07:00:00', NULL, '2025-07-16 01:17:03', '2025-07-16 01:17:03');

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
(11, 'Priteshbhai Bhungadiya', '40036', 'NA', '394230', 'Surat', 'Gujrat', '9788713523', 'Priteshbhai', NULL, 'NA', '394230', 'Surat', 'Gujrat', '2025-07-14 17:36:21', '2025-07-14 17:36:21'),
(12, 'HIREN DADA', '40040', 'BHANAGAR', '395006', 'BHAVNAGAR', 'GUJARAT', '01234567890', 'HIREN DADA', NULL, NULL, NULL, NULL, NULL, '2025-07-14 19:34:13', '2025-07-14 19:34:13'),
(13, 'PDS', '40041', 'N/A', '395004', 'Surat', 'GUJ', '7874578545', 'PD', NULL, NULL, NULL, NULL, NULL, '2025-07-17 18:59:11', '2025-07-17 18:59:11'),
(14, 'PERFECT', '40042', 'Not Availble', '395004', 'Surat', 'Gujrat', '9877896547', 'Perfect', NULL, NULL, NULL, NULL, NULL, '2025-07-17 19:02:37', '2025-07-17 19:02:37'),
(15, 'Sanket Pote', '40043', 'Not Avble.', '395004', 'Surat', 'Gujrat', '4561238756', 'SanketBhai', NULL, NULL, NULL, NULL, NULL, '2025-07-17 19:04:06', '2025-07-17 19:04:06'),
(16, 'Paresh', '40044', 'N/A', '395004', 'Surat', 'Gujrat', '7894659874', 'Paresh', NULL, NULL, NULL, NULL, NULL, '2025-07-18 22:25:20', '2025-07-18 22:25:20'),
(17, 'DINESH CRYSTAL', '40045', 'NA', '395006', 'SURAT', 'GUJARAT', '01234567890', 'DINESH CRYSTAL', NULL, NULL, NULL, NULL, NULL, '2025-07-21 18:31:06', '2025-07-21 18:31:06'),
(18, 'KARTIK MAXWIN', '40046', 'NA', '395006', 'SURAT', 'GUJARAT', '01234567890', 'KARTIK MAXWIN', NULL, NULL, NULL, NULL, NULL, '2025-07-21 18:43:51', '2025-07-21 18:43:51'),
(19, 'HirenBhai', '40047', 'N/A', '395004', 'Surat', 'Gujrat', '978659874', 'HirenBhai', NULL, NULL, NULL, NULL, NULL, '2025-07-22 01:20:06', '2025-07-22 01:20:06');

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
(1, 1, '[\"1\"]', 90000.00, NULL, '2025-06-20', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-20 18:38:06', '2025-06-20 18:38:06'),
(2, 1, '[\"1\"]', 150000.00, NULL, '2025-07-15', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-16 01:17:03', '2025-07-16 01:17:03');

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
(4, '2025-07-17', '40021', 'Keyurbhai Upad', 29500.00, 'Cash', NULL, NULL, NULL, NULL, '2025-07-20 01:38:27', '2025-07-20 01:38:27'),
(3, '2025-07-18', '40021', 'Office Expenses', 2400.00, 'Cash', NULL, NULL, NULL, '5mm Cutter, Drill panu', '2025-07-19 23:54:17', '2025-07-19 23:54:17'),
(5, '2025-07-17', '40021', 'Mehulbhai china', 183000.00, 'Cash', NULL, NULL, NULL, 'Mehulbhai china teaching', '2025-07-20 01:39:11', '2025-07-20 01:39:40');

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
(10, 'Optical', '2025-07-09', '8', '₹', 8, 0, 1.00, '0.00', '0', '0', '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(12, 'Mechanical', '2025-07-02', '9', '₹', 11, 20000, 1.00, '20000.00', '0', '0', '2025-07-14 21:53:43', '2025-07-15 20:17:23'),
(13, 'Optical', '2025-07-09', '10', '₹', 8, 0, 1.00, '0.00', '0', '0', '2025-07-15 00:58:39', '2025-07-18 00:15:49'),
(14, 'Electronic', '2025-07-01', '11', '₹', 10, 180000, 1.00, '180000.00', '0', '0', '2025-07-21 21:42:25', '2025-07-21 21:42:25'),
(15, 'Optical', '2025-07-21', '12', '₹', 8, 1100000, 1.00, '1100000.00', '0', '0', '2025-07-21 22:39:36', '2025-07-21 22:39:36');

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
(68, '8', '8', '22', 100, 'Pic', 0.00, '0', 0.00, '2025-07-09 23:48:23', '2025-07-09 23:48:23'),
(76, '9', '7', '31', 100, 'Pic', 100.00, '0', 10000.00, '2025-07-15 20:17:23', '2025-07-15 20:17:23'),
(77, '9', '7', '32', 100, 'Pic', 100.00, '0', 10000.00, '2025-07-15 20:17:23', '2025-07-15 20:17:23'),
(78, '10', '6', '19', 1000, 'Pic', 0.00, '0', 0.00, '2025-07-18 00:15:49', '2025-07-18 00:15:49'),
(79, '11', '7', '21', 150, 'Pic', 1200.00, '0', 180000.00, '2025-07-21 21:42:25', '2025-07-21 21:42:25'),
(80, '12', '12', '23', 500, 'Pic', 2200.00, '0', 1100000.00, '2025-07-21 22:39:36', '2025-07-21 22:39:36');

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
(3, 0, 1, '2025-07-03', 'D 2', 'K25210291', NULL, '3', NULL, NULL, '4', NULL, 0, '131', 0, NULL, 27500, '[]', '0', '2025-07-03', '1', '2025-06-13 18:13:25', '2025-07-03 19:45:47'),
(5, 0, 1, '2025-07-03', 'ABC', 'C25250001', NULL, '4', NULL, NULL, '4', NULL, 1, '96', 0, NULL, 11500, '[]', '0', '2025-07-03', '1', '2025-06-17 02:01:36', '2025-07-03 19:45:47'),
(6, 0, 1, '2025-06-18', 'ISHITA', 'C25210292', NULL, '3', '19.7 w', NULL, '0', NULL, 1, '0', 1, NULL, 34300, '[]', '1', '2025-06-18', '1', '2025-06-17 22:49:45', '2025-06-27 17:41:33'),
(7, 1, 1, '2025-07-03', 'D1, DENIZ', 'C24210162', NULL, '3', 'CHANGE FAN, COMBINER WATT 53', 'FAN CHANGE, NOW DONE', '4', 'USER SIDE THI DONE CHE.\r\nFAN CHANGE KARO', 1, '0', 0, NULL, 29380, '[]', '0', '2025-07-02', '1', '2025-07-02 18:14:38', '2025-07-02 18:54:47'),
(17, 0, 1, '2025-07-09', 'N1,Komal,D1', 'K25210307', NULL, '3', 'QS:- 301811', NULL, '0', 'LD SR-no  AOM SWITCH SR NO BAKI 6E...', 1, '0', 1, NULL, 89200, '[]', '1', NULL, '0', '2025-07-09 22:10:54', '2025-07-09 22:41:42'),
(18, 0, 1, '2025-07-09', 'VISUU, N1,Komal', 'K25210322', NULL, '3', 'ELECTRIC Side OK\r\nCAVITY OK\r\nBIG CAVITY OK', NULL, '0', 'ZXHZBB2522  Wrong 6e...', 1, '0', 1, NULL, 69250, '[]', '1', NULL, '0', '2025-07-09 23:09:03', '2025-07-09 23:14:41'),
(19, 0, 1, '2025-07-12', 'Anjali/Dhruvi', 'K25210251', NULL, '3', 'Cavity ok', NULL, '0', NULL, 1, '0', 1, NULL, 47428, '[]', '1', NULL, '0', '2025-07-09 23:51:01', '2025-07-13 00:03:43'),
(20, 0, 1, '2025-07-14', 'Sweta', 'K25210252', NULL, '3', 'k.v.t ok', NULL, '0', NULL, 1, '0', 1, NULL, 37852, '[]', '1', NULL, '0', '2025-07-10 00:10:51', '2025-07-14 22:34:13'),
(21, 0, 1, '2025-07-14', 'MIRA', 'K25210253', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 33278, '[]', '1', NULL, '0', '2025-07-10 00:19:53', '2025-07-14 22:34:26'),
(22, 0, 1, '2025-07-14', 'MIRA', 'K25210254', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 47428, '[]', '1', NULL, '0', '2025-07-10 00:27:00', '2025-07-14 22:34:31'),
(23, 0, 1, '2025-07-14', 'MIRA', 'C25210255', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 33302, '[]', '1', NULL, '0', '2025-07-10 00:33:41', '2025-07-14 22:34:35'),
(24, 0, 1, '2025-07-14', 'MIRA', 'K25210259', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 32852, '[]', '1', NULL, '0', '2025-07-10 00:39:50', '2025-07-14 22:34:40'),
(25, 0, 1, '2025-07-14', 'VAISHU/DHRUVI', 'K25210260', NULL, '3', 'kvt ok', NULL, '0', 'ISOLATOR(REMOVE)-EBBD16070', 1, '0', 1, NULL, 32852, '[]', '1', NULL, '0', '2025-07-10 00:46:32', '2025-07-14 22:34:44'),
(26, 0, 1, '2025-07-14', 'MANSI', 'K25210261', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 48680, '[]', '1', NULL, '0', '2025-07-10 00:53:28', '2025-07-14 22:34:48'),
(27, 0, 1, '2025-07-14', 'PRIYA/SWETA/RASHMI', 'C25210262', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 51078, '[]', '1', NULL, '0', '2025-07-10 00:59:44', '2025-07-14 22:34:51'),
(28, 0, 1, '2025-07-14', 'Anjali/Dhruvi', 'K25210264', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 32052, '[]', '1', NULL, '0', '2025-07-10 01:05:14', '2025-07-14 22:35:04'),
(29, 0, 1, '2025-07-14', 'MIRA/PRIYA', 'K25210265', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 37082, '[]', '1', NULL, '0', '2025-07-10 01:13:55', '2025-07-14 22:35:19'),
(30, 0, 1, '2025-07-14', 'Anjali/Dhruvi', 'K25210266', NULL, '3', 'kvt ok', NULL, '0', NULL, 1, '0', 1, NULL, 37052, '[]', '1', NULL, '0', '2025-07-10 01:20:36', '2025-07-14 22:35:23'),
(31, 0, 1, '2025-07-15', 'KETAN/SWETA', 'K25210267', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 27976, '[]', '1', NULL, '0', '2025-07-10 18:46:34', '2025-07-15 23:35:12'),
(32, 0, 1, '2025-07-15', 'KETAN/DHRUVI', 'K25210268', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 19350, '[]', '1', NULL, '0', '2025-07-10 19:07:22', '2025-07-15 23:35:19'),
(33, 0, 1, '2025-07-15', 'VAISHU/KOMAL', 'K25210269', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 27076, '[]', '1', NULL, '0', '2025-07-10 19:18:05', '2025-07-15 23:35:28'),
(34, 0, 1, '2025-07-15', 'MIRA/PRIYA/RASHMI', 'C25210271', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 46576, '[]', '1', NULL, '0', '2025-07-10 19:25:40', '2025-07-15 23:35:37'),
(35, 0, 1, '2025-07-15', 'KETAN/KOMAL', 'C25210273', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 31076, '[]', '1', NULL, '0', '2025-07-10 19:33:46', '2025-07-15 23:35:43'),
(36, 0, 1, '2025-07-15', 'MIRA', 'C25210274', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 30676, '[]', '1', NULL, '0', '2025-07-10 19:51:01', '2025-07-15 23:35:49'),
(37, 0, 1, '2025-07-15', 'KOMAL', 'C25210275', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 52476, '[]', '1', NULL, '0', '2025-07-10 20:05:25', '2025-07-15 23:36:00'),
(38, 0, 1, '2025-07-15', 'ANJALI/MIRA', 'K25210276', NULL, '3', 'THERE IS NO ISOLATOR NO. IN REPORT', 'k.v.t ok', '0', '20W/10.80A', 1, '0', 1, NULL, 67802, '[]', '1', NULL, '0', '2025-07-10 20:16:32', '2025-07-15 23:36:15'),
(39, 0, 1, '2025-07-15', 'DHRUVI', 'K25210277', NULL, '3', 'k.v.t ok', NULL, '0', NULL, 1, '0', 1, NULL, 27076, '[]', '1', NULL, '0', '2025-07-10 20:23:06', '2025-07-15 23:36:25'),
(40, 0, 1, '2025-07-15', 'V/S', 'K25210278', NULL, '3', 'NEED TO CHECK(14.5W,11.7A)k.v.t ok', NULL, '0', NULL, 1, '0', 1, NULL, 26676, '[]', '1', NULL, '0', '2025-07-10 20:28:09', '2025-07-15 23:36:33'),
(41, 1, 0, '2025-07-17', 'D/I', '10BK02B50', NULL, '1', 'Watt Down[14.50W, 12.50A]', 'k.v.t ok', '0', NULL, 1, '0', 0, 7, 0, '[]', '1', NULL, '0', '2025-07-10 22:05:25', '2025-07-18 01:13:34'),
(42, 1, 1, '2025-07-17', NULL, 'C02309007', NULL, '1', 'BEAM OFF[ 20.0W, 11.3A]', 'k.v.t ok', '4', NULL, 1, '0', 0, 1, NULL, '[]', '0', '2025-07-22', '1', '2025-07-11 19:52:37', '2025-07-23 00:08:30'),
(43, 1, 1, '2025-07-19', 'N1/D2/IDI', 'K25210187', NULL, '3', 'Beam off, 20.0W/10.0A', 'k.v.t ok', '4', NULL, 1, '0', 0, 1, 19278, '[]', '0', '2025-07-22', '1', '2025-07-11 20:10:18', '2025-07-23 00:08:30'),
(44, 1, 1, '2025-07-17', 'N1/K1/D1/I2', 'K24210207', NULL, '3', 'Watt Down,20W/10.8A', 'k.v.t ok', '4', '20W/10.8A', 1, '0', 0, 1, 6600, '[]', '0', '2025-07-22', '1', '2025-07-11 20:14:22', '2025-07-23 00:08:30'),
(45, 1, 1, '2025-07-11', 'D-1/I-2', 'C24210149', NULL, '3', 'Watt Down 7 Time Repeat', NULL, '4', '20W/8.50A', 1, '0', 0, 1, 1200, '[]', '0', '2025-07-11', '1', '2025-07-12 00:21:33', '2025-07-12 01:41:04'),
(46, 1, 1, '2025-07-11', 'D-1/I-2', 'M24210083', NULL, '4', 'Fan Off', NULL, '4', '20W/10.60A', 1, '0', 0, 1, 2191, '[]', '0', '2025-07-22', '1', '2025-07-12 00:22:26', '2025-07-23 00:08:31'),
(47, 1, 0, '2025-07-11', 'D-1/I-2', '10BK19C18', NULL, '1', 'Beam Mode Change', NULL, '4', '14.3W/12.70A', 1, '0', 0, 8, 6326, '[]', '0', '2025-07-11', '1', '2025-07-12 00:24:46', '2025-07-12 20:27:59'),
(48, 1, 0, '2025-07-11', 'D-1/I-2', 'C02112009', NULL, '1', 'Beam Off', NULL, '0', '14WATT/11A\r\nCOUPLER JOINT ONLY', 1, '0', 0, 2, NULL, '[]', '1', NULL, '0', '2025-07-12 00:26:20', '2025-07-12 01:38:28'),
(49, 1, 1, '2025-07-19', 'KOMAL/D1/I2', 'M2404210051', NULL, '3', 'WATT down, 11.50A/20.3W', 'k.v.t ok', '4', NULL, 1, '0', 0, 1, 30, '[]', '0', '2025-07-22', '1', '2025-07-12 17:49:31', '2025-07-23 00:08:31'),
(50, 1, 1, '2025-07-19', 'D/I', 'K25210284', NULL, '3', 'Beam Off/Power Off,    20.5W/12.50A', 'k.v.t ok', '4', '20.5W/12.50A', 1, '0', 0, 1, 1800, '[]', '0', '2025-07-22', '1', '2025-07-12 20:13:54', '2025-07-23 00:08:31'),
(51, 1, 0, '2025-07-19', 'N1', '10262115B1103', NULL, '1', 'BEAM OFF,11.3A/14.0W[POWER OFF,CHANGE FUSE ONLY]', 'k.v.t ok', '0', NULL, 1, '0', 0, 9, NULL, '[]', '1', NULL, '0', '2025-07-12 21:50:38', '2025-07-19 17:42:29'),
(53, 1, 1, '2025-07-19', NULL, 'M24180018', NULL, '2', 'Watt down', NULL, '0', NULL, 1, '0', 0, 10, NULL, '[]', '1', NULL, '0', '2025-07-14 17:37:32', '2025-07-19 17:42:32'),
(54, 1, 1, '2025-07-19', NULL, 'C02201067', NULL, '1', 'Chalu maa bEAm vayu jai che  8 var Repeat  k.v.t ok,  14.0W/11.80A', NULL, '0', NULL, 1, '0', 0, 11, 15, '[]', '1', NULL, '0', '2025-07-14 17:43:51', '2025-07-19 17:42:35'),
(55, 0, 1, '2025-07-15', 'K/M/D1', 'K25210279', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, NULL, 1, NULL, 22352, '[]', '1', NULL, '0', '2025-07-14 18:58:29', '2025-07-15 23:43:18'),
(56, 0, 1, '2025-07-15', 'V/S/M', 'K25210280', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, NULL, 1, NULL, 22352, '[]', '1', NULL, '0', '2025-07-14 19:02:12', '2025-07-15 23:44:30'),
(57, 0, 1, '2025-07-15', 'PRIYA/KOMAL', 'K25210281', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, NULL, 1, NULL, 22352, '[]', '1', NULL, '0', '2025-07-14 19:04:23', '2025-07-15 23:45:30'),
(58, 0, 1, '2025-07-15', 'PRIYA/DHRUVI', 'K25210282', NULL, '3', 'k.v.t oK\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 34802, '[]', '1', NULL, '0', '2025-07-14 19:08:12', '2025-07-15 23:45:42'),
(59, 0, 1, '2025-07-15', 'V/K', 'K25210285', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '106', 1, NULL, 22352, '[]', '1', NULL, '0', '2025-07-14 19:29:47', '2025-07-15 23:46:25'),
(61, 0, 1, '2025-07-15', 'V/M/R', 'K25210286', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '122', 1, NULL, 25052, '[]', '1', NULL, '0', '2025-07-14 19:33:37', '2025-07-15 23:46:41'),
(64, 1, 1, '2025-07-19', 'D1', 'C150329220519', NULL, '1', 'Surface comes k.v.t ok, 13.20A/15.0W[ONLY CHECK]', NULL, '4', NULL, 1, '0', 0, 12, NULL, '[]', '0', '2025-07-22', '1', '2025-07-14 19:41:42', '2025-07-23 01:18:59'),
(67, 0, 1, '2025-07-15', 'ANJALI/SWETA', 'K25210287', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 28378, '[]', '1', NULL, '0', '2025-07-14 19:58:54', '2025-07-15 23:46:55'),
(69, 0, 1, '2025-07-15', 'ANJALI/SWETA', 'K25210289', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 25228, '[]', '1', NULL, '0', '2025-07-14 20:00:02', '2025-07-15 23:47:22'),
(83, 0, 1, '2025-07-15', 'VISHU/DHRUVI', 'K25210290', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 16652, '[]', '1', NULL, '0', '2025-07-14 22:17:43', '2025-07-15 23:47:38'),
(84, 0, 1, '2025-07-15', 'ANJALI/SWETA', 'K25210288', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 20602, '[]', '1', NULL, '0', '2025-07-14 22:19:17', '2025-07-15 23:47:07'),
(85, 0, 1, '2025-07-17', 'VISHU/SWETA', 'C25210291', NULL, '3', 'ISOLATOR NO. IS NOT AVAILABLEk.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '131', 1, NULL, 22552, '[]', '1', NULL, '0', '2025-07-14 22:33:46', '2025-07-18 01:15:14'),
(86, 0, 1, '2025-07-15', 'NARESH/DHARM', 'K25210293', NULL, '3', 'kvt ok\r\nELE OK', NULL, '0', NULL, 1, '212', 1, NULL, 17352, '[]', '1', NULL, '0', '2025-07-14 22:36:11', '2025-07-16 00:27:09'),
(87, 0, 1, '2025-07-15', 'RASHMI/KOMAL', 'K25210294', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '119', 1, NULL, 37354, '[]', '1', NULL, '0', '2025-07-14 22:38:23', '2025-07-16 00:27:46'),
(88, 0, 1, '2025-07-15', 'VISU/KOMAL', 'K25210295', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '213', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 22:39:55', '2025-07-16 00:27:59'),
(89, 0, 1, '2025-07-15', 'N1/KOMAL', 'K25210296', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '209', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 22:44:20', '2025-07-16 00:29:30'),
(90, 0, 1, '2025-07-15', 'NARESH/KOMAL', 'K25210297', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '135', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 22:57:51', '2025-07-16 00:29:54'),
(91, 0, 1, '2025-07-15', 'NARESH/DHARM', 'K25210298', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '139', 1, NULL, 17152, '[]', '1', '2025-07-15', '1', '2025-07-14 22:59:55', '2025-07-19 19:00:40'),
(92, 0, 1, '2025-07-15', 'VISU/KOMAL', 'K25210299', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '144', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:01:32', '2025-07-16 00:30:47'),
(93, 0, 1, '2025-07-15', 'MIRA', 'K25210300', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '61', 1, NULL, 23352, '[]', '1', NULL, '0', '2025-07-14 23:03:38', '2025-07-16 00:31:01'),
(94, 0, 1, '2025-07-15', 'NARESH/KOMAL', 'K25210301', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '141', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:06:06', '2025-07-16 00:31:09'),
(95, 0, 1, '2025-07-15', 'NARESH/KOMAL', 'K25210302', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '142', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:07:07', '2025-07-16 00:31:31'),
(96, 0, 1, '2025-07-15', 'NARESH/DHARM', 'K25210303', NULL, '3', 'SPOT IN ISOLATOR (NEED TO CHECK CUTTING)', 'k.v.t ok\r\nELE OK', '0', NULL, 1, '143', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:08:44', '2025-07-16 00:32:43'),
(97, 0, 1, '2025-07-15', 'NARESH/KOMAL', 'K25210304', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 37004, '[]', '1', NULL, '0', '2025-07-14 23:09:40', '2025-07-16 00:37:35'),
(98, 0, 1, '2025-07-15', 'NARESH/VISU', 'K25210305', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '0', 1, NULL, 27078, '[]', '1', NULL, '0', '2025-07-14 23:10:44', '2025-07-16 00:36:44'),
(99, 0, 1, '2025-07-17', 'NARESH/DHARM', 'K25210306', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '140', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:12:45', '2025-07-18 01:14:36'),
(100, 0, 1, '2025-07-17', 'NARESH/KOMAL', 'K25210308', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '202', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:13:44', '2025-07-18 01:14:41'),
(101, 0, 1, '2025-07-17', 'NARESH/KOMAL', 'K25210309', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '214', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:14:51', '2025-07-18 01:14:42'),
(102, 0, 1, '2025-07-17', 'VISU/DHARM', 'K25210310', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '136', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:15:48', '2025-07-18 01:14:47'),
(103, 0, 1, '2025-07-17', 'NARESH/VISU', 'K25210311', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '208', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:17:05', '2025-07-18 01:14:50'),
(104, 0, 1, '2025-07-17', 'NARESH/DHARM', 'K25210312', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '201', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:18:18', '2025-07-18 01:15:36'),
(105, 0, 1, '2025-07-17', 'NARESH/VISU', 'K25210313', NULL, '3', 'k.v.t ok\r\nELE OK', NULL, '0', NULL, 1, '211', 1, NULL, 17152, '[]', '1', NULL, '0', '2025-07-14 23:20:15', '2025-07-18 01:15:39'),
(106, 0, 1, '2025-07-17', 'VISU/KOMAL', 'K25210314', NULL, '3', 'k.v.t oK\r\nELE OK', NULL, '0', NULL, 1, '138', 1, NULL, 18502, '[]', '1', NULL, '0', '2025-07-14 23:21:55', '2025-07-18 01:15:42'),
(107, 0, 1, '2025-07-17', 'NARESH/VISU', 'K25210315', '2.1', '3', 'k.v.t ok Ele Ok', NULL, '0', NULL, 1, '0', 1, NULL, 34128, '[]', '1', NULL, '0', '2025-07-14 23:23:06', '2025-07-18 01:15:46'),
(108, 0, 1, '2025-07-17', 'DI', 'K25210318', NULL, '3', 'k.v.t ok Ele ok', NULL, '0', NULL, 1, '0', 1, NULL, 22452, '[]', '1', NULL, '0', '2025-07-14 23:24:24', '2025-07-18 01:15:49'),
(109, 0, 1, '2025-07-17', 'NARESH/VISU', 'K25210317', NULL, '3', 'k.v.t ok Ele Ok 19.4W/11.5 A', NULL, '0', NULL, 1, '0', 1, NULL, 25278, '[]', '1', NULL, '0', '2025-07-14 23:25:41', '2025-07-18 01:16:11'),
(110, 0, 1, '2025-07-15', 'NARESH/KOMAL', 'K25210316', NULL, '3', '11AMP, 20WATT', NULL, '0', NULL, 1, '216', 0, NULL, 10476, '[]', '1', '2025-07-15', '0', '2025-07-14 23:26:41', '2025-07-16 01:08:36'),
(111, 0, 1, '2025-07-17', 'NARESH/DHARM', 'K25210319', NULL, '3', 'k.v.t ok  ELe Ok 20W/11A', NULL, '0', NULL, 1, '0', 1, NULL, 17902, '[]', '1', NULL, '0', '2025-07-14 23:27:46', '2025-07-18 01:16:14'),
(112, 0, 1, '2025-07-17', 'VISU/KOMAL', 'K25210320', '2.1', '3', 'k.v.t ok ELE OK, 20W/11A', NULL, '0', NULL, 1, '0', 1, NULL, 22928, '[]', '1', NULL, '0', '2025-07-14 23:31:47', '2025-07-18 01:16:16'),
(113, 0, 1, '2025-07-17', NULL, 'K25210321', NULL, '3', '20W/9.50A', 'SR NO. HAS BEEN CHANGED FROM (M252180031) TO (K25210321)', '0', NULL, 1, NULL, 0, NULL, NULL, '[]', '1', NULL, '0', '2025-07-14 23:34:48', '2025-07-18 01:16:20'),
(114, 0, 1, '2025-07-17', 'PRIYA/KOMAL', 'C25210326', NULL, '3', '20W/ 7.10A', NULL, '0', NULL, 1, '0', 1, NULL, 17352, '[]', '1', NULL, '0', '2025-07-14 23:36:56', '2025-07-18 01:16:23'),
(115, 0, 1, NULL, 'VISU/PRIYANKA', 'C25210256', NULL, '4', '25W FIBER (SERIAL NO. DID NOT CHANGE)\r\nISOLATOR CHANGE (BIG BEAM)', NULL, '1', NULL, 0, '0', 0, NULL, 5800, '[]', '0', NULL, '0', '2025-07-14 23:48:37', '2025-07-17 22:27:15'),
(116, 0, 1, NULL, NULL, 'C25210255', NULL, '3', '20W/11A (RE-JOINT OF ISO AND COUPLER) BCZ OF TEMP.', NULL, '1', NULL, NULL, NULL, 0, NULL, 100, '[]', '0', NULL, '0', '2025-07-14 23:50:51', '2025-07-14 23:50:51'),
(117, 0, 1, '2025-07-17', 'VARSHA/KOMAL', 'K24210188', NULL, '3', '21.0 W', NULL, '0', NULL, 1, '0', 1, NULL, 16252, '[]', '1', NULL, '0', '2025-07-14 23:52:28', '2025-07-18 01:18:43'),
(118, 0, 1, NULL, 'KOMAL', 'C24210161', '2.1', '3', '21.0 W', NULL, '1', NULL, 0, '0', 1, NULL, 15952, '[]', '0', NULL, '0', '2025-07-14 23:54:04', '2025-07-18 00:03:28'),
(119, 0, 1, NULL, 'KOMAL', 'C24210202', '2.1', '3', '21W', NULL, '1', NULL, 0, '0', 1, NULL, 38252, '[]', '0', NULL, '0', '2025-07-14 23:55:58', '2025-07-18 17:41:07'),
(120, 0, 1, NULL, 'SWETA', 'C25210263', NULL, '4', NULL, NULL, '1', NULL, 0, '0', 1, NULL, 5450, '[]', '0', NULL, '0', '2025-07-14 23:58:38', '2025-07-18 17:56:03'),
(121, 0, 1, NULL, 'PRIYA/KOMAL', 'C25210328', NULL, '4', 'ELE OK', NULL, '1', NULL, 0, '0', 1, NULL, 29100, '[]', '0', NULL, '0', '2025-07-15 00:01:26', '2025-07-18 18:04:43'),
(122, 0, 1, NULL, 'PRIYA/KOMAL', 'C25210258', NULL, '4', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 1100, '[]', '0', NULL, '0', '2025-07-15 00:02:55', '2025-07-15 01:28:48'),
(125, 0, 1, NULL, 'KOMAL/DHRUVI', 'C25250014', NULL, '4', 'CHANGE ISOLATOR', NULL, '1', NULL, 0, '0', 0, NULL, 900, '[]', '0', NULL, '0', '2025-07-15 01:01:06', '2025-07-15 01:03:15'),
(126, 0, 1, NULL, 'DHURUVI/ISHA', 'C25250004', NULL, '4', 'CHANGE ISOLATOR', NULL, '1', NULL, 0, '0', 0, NULL, 1800, '[]', '0', NULL, '0', '2025-07-15 01:05:09', '2025-07-21 22:57:34'),
(127, 0, 1, NULL, 'SWETA', 'C25250017', NULL, '4', 'CHANGE ISOLATOR', NULL, '1', NULL, NULL, 'D-72', 0, NULL, 900, '[]', '0', NULL, '0', '2025-07-15 01:17:29', '2025-07-15 01:17:29'),
(128, 0, 1, NULL, 'VISU/SWETA', 'C25250011', NULL, '4', NULL, NULL, '1', NULL, NULL, '129', 0, NULL, 900, '[]', '0', NULL, '0', '2025-07-15 01:19:10', '2025-07-15 01:19:10'),
(129, 0, 1, NULL, 'VISU/DHARM', 'C25250012', NULL, '4', NULL, NULL, '1', NULL, NULL, '134', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 01:23:32', '2025-07-15 01:23:32'),
(130, 0, 1, NULL, 'KOMAL', 'C25210272', NULL, '3', NULL, NULL, '1', NULL, NULL, '92', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 01:25:18', '2025-07-15 01:25:18'),
(131, 0, 1, NULL, 'MIRA', 'C25210270', NULL, '4', NULL, NULL, '1', NULL, NULL, '90', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 01:27:18', '2025-07-15 01:27:18'),
(138, 0, 1, NULL, 'PRIYA/DHRUVI', '24', NULL, '4', '34 Watt fiber, 12.5 Amp', 'MARKING FIBER', '1', NULL, NULL, '0', 0, NULL, 450, '[]', '0', NULL, '0', '2025-07-15 18:41:16', '2025-07-15 18:41:16'),
(139, 0, 1, NULL, 'K/M/D1', 'C25250013', NULL, '4', '24WATT/10AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 18:43:49', '2025-07-15 18:43:49'),
(140, 0, 1, NULL, 'M', 'C25250003', NULL, '4', NULL, NULL, '1', NULL, NULL, '93', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 18:45:08', '2025-07-15 18:45:08'),
(141, 0, 1, NULL, 'M/R', 'C25250002', NULL, '4', NULL, NULL, '1', NULL, NULL, '83', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 18:46:32', '2025-07-15 18:46:32'),
(142, 0, 1, NULL, 'P/D1/D2', 'C25250001', NULL, '4', NULL, NULL, '1', NULL, NULL, '132', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 18:48:13', '2025-07-15 18:48:13'),
(143, 0, 1, NULL, 'K', 'D-73', NULL, '3', NULL, NULL, '1', NULL, NULL, '85', 0, NULL, 550, '[]', '0', NULL, '0', '2025-07-15 18:50:00', '2025-07-15 18:50:00'),
(144, 0, 1, NULL, NULL, NULL, NULL, NULL, 'ELE OK', NULL, '1', NULL, NULL, 'K25210283', 0, NULL, 3350, '[]', '0', NULL, '0', '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(145, 1, 0, '2025-07-19', NULL, '1520092544', NULL, '1', 'Watt Down[RETURN AS IT IS]', NULL, '0', NULL, 1, '0', 0, 7, NULL, '[]', '1', NULL, '0', '2025-07-17 18:51:59', '2025-07-19 17:42:40'),
(146, 1, 1, '2025-07-19', 'N1', 'C22301016', NULL, '2', 'BEAM NOT COME, 17.0W/12.80A', NULL, '0', NULL, 1, '0', 0, NULL, 2200, '[]', '1', NULL, '0', '2025-07-17 19:35:12', '2025-07-19 17:42:41'),
(147, 1, 0, '2025-07-19', 'N/IDI', '1520061906', NULL, '1', 'BEAM OFF, 14.2.W/12.30A', NULL, '0', NULL, 1, NULL, 1, NULL, 950, '[]', '1', NULL, '0', '2025-07-17 19:41:01', '2025-07-19 17:43:31'),
(149, 1, 0, '2025-07-19', 'V/DI', '1520100960', NULL, '1', 'BEAM OFF ,  [14W/13A]', NULL, '0', NULL, 1, NULL, 1, NULL, 5050, '[]', '1', NULL, '0', '2025-07-17 19:53:31', '2025-07-19 17:43:35'),
(150, 1, 1, '2025-07-19', 'D/I', 'M24210107', NULL, '3', 'WATT DOWN , [20.0W/9.50A]   { WATT OK / BEAM OK }', NULL, '0', NULL, 1, NULL, 1, NULL, NULL, '[]', '1', NULL, '0', '2025-07-17 19:56:43', '2025-07-19 17:43:37'),
(151, 1, 0, '2025-07-19', 'NARESH/DHRUVI', 'C22209021', NULL, '2', 'BEAM OFF WHILE RUNNING , [16.5W/12.50A]', NULL, '0', NULL, 1, NULL, 1, NULL, 15, '[]', '1', NULL, '0', '2025-07-17 19:59:05', '2025-07-19 17:43:39'),
(152, 1, 1, '2025-07-19', 'D/I2', 'C22301044', NULL, '2', 'BEAM OFF / WATT DOWN [17W/13A]   {AMP FLCTUATION NEED TO CHECK}', NULL, '0', NULL, 1, NULL, 1, NULL, 890, '[]', '1', NULL, '0', '2025-07-17 20:23:04', '2025-07-19 17:43:41'),
(153, 1, 0, '2025-07-19', NULL, 'C02112009', NULL, '1', 'BEAM DOES NOT COME [14W/11A]', 'COUPLER JOINT', '0', NULL, 1, NULL, 1, NULL, NULL, '[]', '1', NULL, '0', '2025-07-17 20:26:54', '2025-07-19 17:43:43'),
(154, 1, 0, '2025-07-19', 'D1/K', '10BK19C18', NULL, '1', 'BEAM MODE CHANGE 8WATT O/P [14.3W/12.70A]', NULL, '0', NULL, 1, NULL, 1, NULL, 6126, '[]', '1', NULL, '0', '2025-07-17 20:29:27', '2025-07-19 17:43:45'),
(156, 1, 1, '2025-07-19', 'N1/P1/D2', 'M24210083', NULL, '3', 'BEAM OFF, 20.0W/10.60A', NULL, '0', NULL, 1, '0', 0, NULL, 4291, '[]', '1', NULL, '0', '2025-07-17 21:49:26', '2025-07-19 17:43:49'),
(157, 1, 1, '2025-07-19', 'N1', 'C24210149', NULL, '3', 'WATT DOWN[7 TIMES REPEAT], 20.0W/8.50A', NULL, '0', NULL, 1, NULL, 1, NULL, 1200, '[]', '1', NULL, '0', '2025-07-17 22:09:02', '2025-07-19 17:43:51'),
(158, 1, 1, '2025-07-19', 'V/K', 'C32305022', NULL, '3', NULL, NULL, '0', NULL, 1, '0', 0, NULL, 3400, '[]', '1', NULL, '0', '2025-07-17 22:12:05', '2025-07-19 17:43:54'),
(159, 1, 1, NULL, NULL, 'C12302045', NULL, '3', 'TESTING OK/NO PROBLEM/WATT OK/BEAM OK', NULL, '2', NULL, NULL, NULL, 1, NULL, NULL, '[]', '0', NULL, '0', '2025-07-17 22:16:23', '2025-07-17 22:16:23'),
(160, 1, 0, NULL, 'N1/D2', 'CY2303013', NULL, '3', 'BEAM OFF, 20.5W/8.50A', NULL, '2', NULL, NULL, NULL, 1, NULL, 4600, '[]', '0', NULL, '0', '2025-07-17 22:19:33', '2025-07-17 22:19:33'),
(161, 1, 1, NULL, 'D2', 'M2404210061', NULL, '3', 'BEAM OFF IN WORKING, 20.0W/11.50A', NULL, '2', NULL, NULL, NULL, 1, NULL, 6150, '[]', '0', NULL, '0', '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(162, 1, 1, NULL, NULL, 'M25180032', NULL, '2', 'Watt down', NULL, '2', NULL, 0, NULL, 0, 15, NULL, '[]', '0', NULL, '0', '2025-07-18 22:20:11', '2025-07-18 22:20:11'),
(163, 1, 1, NULL, NULL, 'C12308095', NULL, '4', 'Bim nathi aavtu', NULL, '2', NULL, 0, NULL, 0, 13, NULL, '[]', '0', NULL, '0', '2025-07-18 22:22:14', '2025-07-18 22:22:14'),
(164, 1, 1, '2025-07-22', NULL, 'M2404210059', NULL, '3', 'Watt down bhreking aave che', NULL, '4', NULL, 1, NULL, 0, 1, NULL, '[]', '0', '2025-07-22', '1', '2025-07-18 22:24:31', '2025-07-23 00:08:31'),
(165, 1, 0, NULL, NULL, 'C12302046', NULL, '4', 'Bim nathi aavtu', NULL, '2', NULL, 0, NULL, 0, 16, NULL, '[]', '0', NULL, '0', '2025-07-18 22:27:08', '2025-07-18 22:27:08'),
(166, 1, 1, NULL, NULL, 'C22301044', NULL, '2', 'Wat varition', NULL, '2', NULL, 0, NULL, 0, 14, NULL, '[]', '0', NULL, '0', '2025-07-19 18:06:40', '2025-07-19 18:06:40'),
(167, 1, 1, '2025-07-22', NULL, 'C25210218', NULL, '3', 'Pawar off', NULL, '4', NULL, 1, NULL, 0, 1, NULL, '[]', '0', '2025-07-22', '1', '2025-07-19 19:49:40', '2025-07-23 00:08:31'),
(168, 1, 1, NULL, NULL, 'M25180034', NULL, '2', '12.60A/17.0W(CHANGE COUPLER POSITION ONLY)', NULL, '2', NULL, NULL, NULL, 1, NULL, NULL, '[]', '0', NULL, '0', '2025-07-19 21:51:48', '2025-07-19 21:51:48'),
(169, 1, 1, NULL, 'KOMAL', 'K25210332', NULL, '3', '20W/11.50A', NULL, '2', NULL, 0, '0', 0, NULL, 7900, '[]', '0', NULL, '0', '2025-07-19 21:55:48', '2025-07-19 22:02:18'),
(170, 1, 1, NULL, 'N-1/DHARM', 'K25210329', NULL, '3', NULL, NULL, '2', NULL, 0, '0', 0, NULL, 19852, '[]', '0', NULL, '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(171, 1, 1, NULL, 'DHARM/KOMAL', 'K25210330', NULL, '3', '20W/12AMP', NULL, '2', NULL, 0, '0', 0, NULL, 7900, '[]', '0', NULL, '0', '2025-07-19 22:35:52', '2025-07-19 22:36:11'),
(172, 0, 1, NULL, 'komal,i1,i2', 'M24180020', NULL, '1', '14W,12AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 440, '[]', '0', NULL, '0', '2025-07-19 23:32:08', '2025-07-19 23:32:08'),
(173, 0, 1, NULL, 'N/A', 'M25150034', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 3200, '[]', '0', NULL, '0', '2025-07-19 23:45:03', '2025-07-19 23:45:03'),
(174, 0, 1, NULL, 'SWETA', 'M25150032', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 9916, '[]', '0', NULL, '0', '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(175, 0, 1, NULL, 'RASHMI', 'M24210141', NULL, '1', 'FIBER 21W CONVERT INTO 15W', NULL, '1', NULL, NULL, NULL, 0, NULL, 1115, '[]', '0', NULL, '0', '2025-07-20 00:13:16', '2025-07-20 00:13:16'),
(176, 0, 1, NULL, 'SURESHBHAI', 'M25150035', NULL, '1', '12 A,15.7W', NULL, '1', NULL, NULL, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-07-20 00:17:26', '2025-07-20 00:17:26'),
(177, 0, 1, NULL, 'MIRA', 'M25150031', NULL, '1', '15.2W,12AMP', 'AXIS OFFSET : 0.01DB\r\n                       0.01DB\r\n                       15DB', '1', NULL, 0, '0', 0, NULL, 40220, '[]', '0', NULL, '0', '2025-07-20 00:30:03', '2025-07-20 00:57:49'),
(179, 0, 1, NULL, 'MIRA', 'M25150029', NULL, '2', '15.30W,11.20AMP', NULL, '1', NULL, 0, '0', 0, NULL, 29848, '[]', '0', NULL, '0', '2025-07-20 01:07:05', '2025-07-21 22:52:44'),
(180, 0, 1, NULL, 'SURESH/NA', 'M25150028', NULL, '1', '15.20W,12.50AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 9531, '[]', '0', NULL, '0', '2025-07-20 01:20:03', '2025-07-20 01:20:04'),
(181, 0, 1, NULL, 'MANSI', 'M25150024', NULL, NULL, '14.68W,11.50AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 9916, '[]', '0', NULL, '0', '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(182, 0, 1, NULL, 'MIRA', 'M25150023', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 9916, '[]', '0', NULL, '0', '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(183, 0, 1, NULL, 'MIRA', 'M25150022', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 9916, '[]', '0', NULL, '0', '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(184, 0, 1, NULL, 'KOMAL', 'M24150021', NULL, '1', '15.00WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(185, 0, 1, NULL, 'MITALI', 'M24150020', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(186, 0, 1, NULL, 'MIRA', 'M24150019', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(187, 1, 1, NULL, NULL, 'M24180009', NULL, '2', 'Bim nathi aavtu', NULL, '2', NULL, 0, NULL, 0, 17, NULL, '[]', '0', NULL, '0', '2025-07-21 18:33:04', '2025-07-21 18:33:04'),
(188, 0, 1, NULL, 'MITALI', 'M24150018', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(189, 0, 1, NULL, 'KOMAL', 'M24150017', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(190, 0, 1, NULL, 'ARVI', 'M24150016', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(191, 0, 1, NULL, 'MITALI', 'M24150015', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(192, 0, 1, NULL, 'KOMAL', 'M24150014', NULL, '1', 'AMP-13.00', NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(193, 0, 1, NULL, 'MITALI', 'M24150013', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(194, 0, 1, NULL, 'MITALI', 'M24150012', NULL, '1', '15WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(195, 0, 1, NULL, 'MITALI', 'M24150011', NULL, '1', '15WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(196, 0, 1, NULL, 'MIRA', 'M24150010', NULL, '1', 'AMP-13,15.00 WATT', NULL, '1', NULL, 0, '0', 0, NULL, 15332, '[]', '0', NULL, '0', '2025-07-21 19:35:11', '2025-07-21 19:37:17'),
(197, 0, 1, NULL, 'MITALI', 'M24150009', NULL, '1', '15 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7666, '[]', '0', NULL, '0', '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(198, 0, 1, NULL, 'MITALI', 'M24150008', NULL, '1', 'K.V.T OK', NULL, '1', NULL, 0, '0', 0, NULL, 15432, '[]', '0', NULL, '0', '2025-07-21 19:46:10', '2025-07-21 22:07:28'),
(212, 0, 1, NULL, 'MIRA', 'M24150007', NULL, '1', 'M24150007M24150007', 'K.V.T OK', '1', NULL, 0, '0', 0, NULL, 61902, '[]', '0', NULL, '0', '2025-07-21 21:46:02', '2025-07-22 00:17:18'),
(213, 0, 1, NULL, 'KOMAL/DHARM', 'M25150040', NULL, '2', '17 WATT,12.80 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-07-21 22:04:22', '2025-07-21 22:04:22'),
(214, 0, 1, NULL, 'PRIYANKA', 'M25180036', NULL, '2', '17 WATT,12.70 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 450, '[]', '0', NULL, '0', '2025-07-21 22:07:37', '2025-07-21 22:07:37'),
(215, 0, 1, NULL, 'NARESH', 'M25180033', NULL, '2', '17 WATT,13 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 15, '[]', '0', NULL, '0', '2025-07-21 22:11:56', '2025-07-21 22:11:56'),
(216, 0, 1, NULL, 'DHARM', 'M25180031', NULL, '2', '17 WATT,8.80 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-07-21 22:14:26', '2025-07-21 22:14:26'),
(217, 0, 1, NULL, 'MIRA', 'M25210238', NULL, '2', '21.50 WATT,11.50 AMP', NULL, '1', NULL, 0, '0', 0, NULL, 16942, '[]', '0', NULL, '0', '2025-07-21 22:17:01', '2025-07-21 22:25:25'),
(218, 0, 1, NULL, NULL, 'M24150006', 'MITALI', '1', 'K.V.T OK', NULL, '1', NULL, 0, '0', 0, NULL, 34674, '[]', '0', NULL, '0', '2025-07-21 22:22:56', '2025-07-22 00:17:05'),
(221, 1, 1, NULL, 'VISU/DHRUVI', 'M25180029', NULL, '2', '17 WATT,11 AMP', NULL, '2', NULL, 0, '0', 0, NULL, 25504, '[]', '0', NULL, '0', '2025-07-21 22:35:50', '2025-07-21 22:45:07'),
(222, 0, 1, NULL, NULL, 'M24150005', 'MANSI', '1', 'K.V.T OK', NULL, '1', NULL, 0, '0', 0, NULL, 26008, '[]', '0', NULL, '0', '2025-07-21 22:49:53', '2025-07-22 00:16:52'),
(223, 0, 1, NULL, 'RASHMI', 'M25180028', NULL, '2', '15.80 WATT, 13.50 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(225, 0, 1, NULL, 'VAISHU/SWETA', 'M25180027', NULL, '2', '16.22 WATT/9.50 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 9616, '[]', '0', NULL, '0', '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(227, 1, 1, NULL, NULL, '10Bk49c14', NULL, '1', 'Watt down', NULL, '2', NULL, 0, '0', 0, 8, NULL, '[]', '0', NULL, '0', '2025-07-21 23:05:03', '2025-07-21 23:42:18'),
(228, 0, 1, NULL, 'PRIYA/MIRA', 'M25180026', NULL, '2', '16.39 WATT,9 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 13116, '[]', '0', NULL, '0', '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(229, 0, 1, NULL, 'MITALI', 'M2403150004', NULL, '1', 'K.V.T OK', 'ISOLATOR NUMBER NOT AVAILABLE', '1', NULL, 0, '0', 0, NULL, 52562, '[]', '0', NULL, '0', '2025-07-21 23:08:50', '2025-07-22 00:16:40'),
(230, 0, 1, NULL, NULL, 'M2403150003', NULL, '1', 'K.V.T OK', 'ISOLATOR NUMBER NOT AVAILABLE', '1', NULL, 0, '0', 0, NULL, 31084, '[]', '0', NULL, '0', '2025-07-21 23:19:00', '2025-07-22 00:16:25'),
(231, 0, 1, NULL, 'RASHMI/KETAN/SWETA', 'M25180025', NULL, '2', '19.50 WATT,9 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(234, 0, 1, NULL, 'RASHMI/VISU/SWETA', 'M25180024', NULL, '2', '16.60 WATT,10.50 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 9616, '[]', '0', NULL, '0', '2025-07-21 23:28:29', '2025-07-21 23:28:30'),
(235, 0, 1, NULL, 'MIRA', 'M25180022', NULL, '2', '18 WATT,11.50 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(236, 0, 1, NULL, 'RASHMI', 'M24180019', NULL, '2', '18 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(237, 0, 1, NULL, NULL, 'M2403150002', NULL, '1', 'K.V.T OK', 'ISOLATOR NUMBER NOT AVAILABLE\r\nLD15 SR NO. ALREADY USED IN ANTHOR FIBER NUMBER', '1', NULL, 0, '0', 0, NULL, 23308, '[]', '0', NULL, '0', '2025-07-21 23:41:45', '2025-07-22 00:16:07'),
(238, 0, 1, NULL, 'KOMAL', 'M24180018', NULL, '2', '18 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(239, 0, 1, NULL, NULL, 'M2402150001', NULL, '1', 'K.V.T OK', NULL, '1', NULL, 0, '0', 0, NULL, 23308, '[]', '0', NULL, '0', '2025-07-21 23:47:54', '2025-07-22 00:15:37'),
(240, 0, 1, NULL, 'NEHA', 'M24180017', NULL, '2', '13.50 AMP', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(241, 0, 1, NULL, 'MIRA', 'M2404180017', NULL, '2', '350 MTR,21WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-21 23:53:25', '2025-07-21 23:53:26'),
(242, 0, 1, NULL, 'MITALI', 'M24180013', NULL, '2', '13.50 AMP,18 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(243, 0, 1, NULL, 'MIRA', 'M24180012', NULL, '2', '13.00 AMP,18.00 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(244, 0, 1, '2025-07-21', 'N/A', 'C22301037', NULL, '2', 'C22301037 No Item, 21-July gone for StandBy', NULL, '4', NULL, 1, NULL, 0, NULL, NULL, '[]', '0', '2025-07-21', '1', '2025-07-22 00:01:10', '2025-07-22 00:07:32'),
(245, 0, 1, '2025-07-21', 'N/A', 'C02201003', '1.5', '1', 'C02201003, 21 July Stand By', NULL, '4', NULL, 1, NULL, 0, NULL, NULL, '[]', '0', '2025-07-21', '1', '2025-07-22 00:01:53', '2025-07-22 18:55:23'),
(246, 0, 1, NULL, 'KOMAL', 'M24180011', NULL, '2', '13,50 AMP,18.00 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(247, 1, 1, NULL, 'IDI', 'C24210168', 'DHARM', '3', NULL, 'CAVITY CHANGE \r\nISOLATOR CHANGE', '2', NULL, 0, '0', 0, NULL, 900, '[]', '0', NULL, '0', '2025-07-22 00:06:48', '2025-07-22 00:18:39'),
(248, 0, 1, NULL, 'NEHA', 'M24180009', NULL, '2', '14.00 AMP,18.00 WATT', NULL, '1', NULL, NULL, NULL, 0, NULL, 7766, '[]', '0', NULL, '0', '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(249, 0, 1, NULL, 'MIRA', 'M2404180008', NULL, '2', '18 WATT', NULL, '1', NULL, 0, '0', 0, NULL, 15532, '[]', '0', NULL, '0', '2025-07-22 00:13:30', '2025-07-22 00:16:07'),
(252, 1, 1, NULL, 'KOMAL', 'C25210221', 'DHRUVI', '4', 'K.V.T OK', NULL, '2', NULL, NULL, '39', 1, NULL, 10442, '[]', '0', NULL, '0', '2025-07-22 00:35:03', '2025-07-22 00:35:04'),
(255, 0, 1, NULL, NULL, 'M2404180005', NULL, '2', '18 WATT', NULL, '1', 'SHAILESH KHENI SALE', 0, '0', 0, NULL, 20024, '[]', '0', NULL, '0', '2025-07-22 00:50:45', '2025-07-22 01:00:38'),
(256, 0, 1, NULL, NULL, 'K25210250', 'MANSI', '3', 'K.V.T OK', NULL, '1', NULL, 0, '0', 0, NULL, 60096, '[]', '0', NULL, '0', '2025-07-22 00:56:44', '2025-07-22 01:03:45'),
(257, 0, 1, NULL, 'SWETA', 'K25210249', 'MIRA', '3', 'K.V.T OK', NULL, '1', NULL, NULL, '63', 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(258, 1, 1, '2025-07-22', NULL, 'K25210245', NULL, '3', 'U s B chodi dey che', NULL, '0', NULL, 1, NULL, 0, 1, NULL, '[]', '1', NULL, '0', '2025-07-22 01:17:29', '2025-07-22 23:59:41'),
(259, 0, 1, NULL, NULL, 'K25210248', 'SWETA', '3', 'K.V.T OK', NULL, '1', NULL, NULL, '51', 0, NULL, 10456, '[]', '0', NULL, '0', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(261, 0, 1, NULL, NULL, 'K25210247', 'SWETA', '3', 'K.V.T OK', NULL, '1', NULL, NULL, '60', 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-22 01:25:13', '2025-07-22 01:25:14'),
(262, 0, 1, NULL, NULL, 'M2405210072', NULL, '3', NULL, NULL, '1', NULL, 0, '0', 0, NULL, 20032, '[]', '0', NULL, '0', '2025-07-22 22:03:01', '2025-07-22 22:52:30'),
(264, 0, 1, NULL, NULL, 'M2405210073', NULL, '3', 'YXHZAO4965, M2405210073', NULL, '1', NULL, 0, '0', 0, NULL, 0, '[]', '0', NULL, '0', '2025-07-22 22:26:43', '2025-07-22 22:40:21'),
(265, 0, 1, NULL, 'MANSI', 'M24210151', NULL, '3', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 9916, '[]', '0', NULL, '0', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(273, 1, 1, NULL, NULL, 'K25210207', NULL, '3', 'Watt down and cutting problem', NULL, '2', NULL, 0, NULL, 0, 1, NULL, '[]', '0', NULL, '0', '2025-07-22 23:57:40', '2025-07-22 23:57:40'),
(274, 0, 1, NULL, 'MIRA', 'M24210076', NULL, '3', 'NO ISOLATOR NUMBER', NULL, '1', NULL, NULL, NULL, 0, NULL, 10016, '[]', '0', NULL, '0', '2025-07-23 00:35:37', '2025-07-23 00:35:38'),
(278, NULL, 1, NULL, NULL, 'M24210078', NULL, '3', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, NULL, '[]', '0', NULL, '0', '2025-07-23 01:11:56', '2025-07-23 01:11:56');

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
(40, '26', 'Mtr', '7', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(43, '42', 'Pic', '7', '1', '24', '0', '4', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(44, '42', 'Pic', '7', '0', '24', '0', '4', NULL, NULL, NULL, '2025-07-02 18:46:50', '2025-07-02 18:46:50'),
(45, '1', 'Pic', '4', '0', '7', 'ZXHZBB2382', '1', NULL, NULL, NULL, '2025-07-02 19:37:42', '2025-07-02 19:37:42'),
(52, '15', 'Pic', '3', '0', '26', 'GA241129FQ278380', '1', NULL, NULL, NULL, '2025-07-03 19:26:56', '2025-07-03 19:26:56'),
(1873, '23', 'Pic', '69', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1726, '19', 'Pic', '56', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1727, '16', 'Mtr', '56', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1711, '16', 'Mtr', '55', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1710, '19', 'Pic', '55', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1743, '16', 'Mtr', '57', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1872, '18', 'Pic', '69', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1887, '16', 'Mtr', '83', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1886, '19', 'Pic', '83', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1843, '18', 'Pic', '67', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1109, '32', 'Pic', '75', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-14 20:15:42', '2025-07-14 20:15:42'),
(1855, '16', 'Mtr', '84', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1854, '19', 'Pic', '84', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1838, '33', 'Pic', '67', '0', '180', 'EBBD16133', '1', '11', NULL, '20', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1108, '32', 'Pic', '73', '0', '57', '0', '1', NULL, NULL, NULL, '2025-07-14 20:11:27', '2025-07-14 20:11:27'),
(1801, '18', 'Pic', '61', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1799, '19', 'Pic', '61', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1759, '16', 'Mtr', '58', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1758, '19', 'Pic', '58', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1800, '16', 'Mtr', '61', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1104, '26', 'Mtr', '60', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 19:31:47', '2025-07-14 19:31:47'),
(1784, '16', 'Mtr', '59', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 19:53:03', '2025-07-15 19:53:03'),
(1783, '19', 'Pic', '59', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 19:53:03', '2025-07-15 19:53:03'),
(1103, '31', 'Pic', '60', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-14 19:31:47', '2025-07-14 19:31:47'),
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
(1901, '16', 'Mtr', '85', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
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
(738, '26', 'Mtr', '21', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-12 22:55:16', '2025-07-12 22:55:16'),
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
(1144, '31', 'Pic', '31', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1143, '15', 'Pic', '31', '0', '110', 'GA241129FQ278366', '1', NULL, NULL, '620', '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1142, '20', 'Pic', '31', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1141, '20', 'Pic', '31', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1140, '21', 'Pic', '31', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1139, '30', 'Pic', '31', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(900, '2', 'Pic', '32', '0', '113', 'ZXHZBC7083', '1', NULL, NULL, '16.0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(899, '2', 'Pic', '32', '0', '112', 'ZXHZBC9570', '1', '8.70', '7.55', '16.0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(898, '1', 'Pic', '32', '0', '111', 'ZXHZAV5131', '1', '2.75', '2.46', '2.1', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(897, '35', 'Pic', '32', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(896, '30', 'Pic', '32', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(895, '21', 'Pic', '32', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(894, '20', 'Pic', '32', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(893, '20', 'Pic', '32', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(1174, '31', 'Pic', '33', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1173, '15', 'Pic', '33', '0', '118', 'GA241129FQ278341', '1', NULL, NULL, '610', '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1172, '20', 'Pic', '33', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1171, '21', 'Pic', '33', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1170, '30', 'Pic', '33', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1169, '35', 'Pic', '33', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1192, '33', 'Pic', '34', '0', '164', 'EBBC10606', '1', '7.50', NULL, '20.1', '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1191, '26', 'Mtr', '34', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1190, '3', 'Pic', '34', '0', '120', 'ZXHZBA0949', '1', '9.00', '11.66', '23.00', '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1189, '1', 'Pic', '34', '0', '119', 'ZXHZBA6558', '1', '2.80', '2.50', '2.14', '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1188, '20', 'Pic', '34', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1187, '20', 'Pic', '34', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1186, '21', 'Pic', '34', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1206, '26', 'Mtr', '35', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1205, '15', 'Pic', '35', '0', '126', 'GA241129FQ278395', '1', NULL, NULL, '680', '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1204, '3', 'Pic', '35', '0', '125', 'ZXHZAY5479', '1', '9.30', '8.87', '24.60', '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1203, '32', 'Pic', '35', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1202, '35', 'Pic', '35', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1201, '30', 'Pic', '35', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1200, '21', 'Pic', '35', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1223, '15', 'Pic', '36', '0', '130', 'GA241129FQ278405', '1', NULL, NULL, '870', '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1222, '3', 'Pic', '36', '0', '129', 'ZXHZAZ9028', '1', NULL, NULL, '24.30', '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1221, '32', 'Pic', '36', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1220, '35', 'Pic', '36', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1219, '30', 'Pic', '36', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1218, '21', 'Pic', '36', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1240, '15', 'Pic', '37', '0', '134', 'GA241129FQ278396', '1', NULL, NULL, '710', '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1238, '3', 'Pic', '37', '0', '133', 'ZXHZAZ2455', '1', NULL, NULL, '24.31', '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1239, '32', 'Pic', '37', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1237, '35', 'Pic', '37', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1236, '30', 'Pic', '37', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1235, '21', 'Pic', '37', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1234, '20', 'Pic', '37', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1368, '26', 'Mtr', '38', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1370, '23', 'Pic', '38', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1369, '2', 'Pic', '38', '0', '136', 'ZXHZBC5481', '1', '10.06', '7.58', '18.17', '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1367, '20', 'Pic', '38', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1366, '1', 'Pic', '38', '0', '135', 'ZXHZAV0022', '1', '2.66', '3.90', '3.15', '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1365, '21', 'Pic', '38', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1364, '30', 'Pic', '38', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1352, '15', 'Pic', '39', '0', '142', 'GA240719FQ258447', '1', NULL, NULL, '690', '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1351, '2', 'Pic', '39', '0', '141', 'ZXHZBC5331', '1', NULL, NULL, '18.80', '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1350, '31', 'Pic', '39', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1349, '35', 'Pic', '39', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1348, '30', 'Pic', '39', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1347, '21', 'Pic', '39', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1381, '33', 'Pic', '40', '0', '170', 'EBBD16065', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1380, '35', 'Pic', '40', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1379, '3', 'Pic', '40', '0', '144', 'ZXHZBC0334', '1', '12.01', '5.70', '32.02', '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1378, '30', 'Pic', '40', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1377, '21', 'Pic', '40', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1376, '31', 'Pic', '40', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(2421, '21', 'Pic', '146', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 19:37:35', '2025-07-17 19:37:35'),
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
(2419, '26', 'Mtr', '50', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 19:26:56', '2025-07-17 19:26:56'),
(2569, '33', 'Pic', '112', '0', '209', 'EBBE08428', '1', '11', NULL, '20', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2437, '20', 'Pic', '44', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 20:01:51', '2025-07-17 20:01:51'),
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
(1138, '1', 'Pic', '31', '0', '107', 'ZXHZAV1432', '1', '2.35', '2.51', '2.25', '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1137, '2', 'Pic', '31', '0', '108', 'ZXHZBC0787', '1', '8.86', '7.58', '16.00', '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1136, '2', 'Pic', '31', '0', '109', 'ZXHZBB7801', '1', NULL, NULL, '16.00', '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(901, '15', 'Pic', '32', '0', '114', 'GA241129FQ278355', '1', NULL, NULL, '710', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(902, '31', 'Pic', '32', '0', '56', '0', '1', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(903, '26', 'Mtr', '32', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(904, '33', 'Pic', '32', '0', '162', 'EBBC17639', '1', '11.50', NULL, '20.3', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(1168, '1', 'Pic', '33', '0', '115', 'ZXHZAV5001', '1', '3.01', '3.05', '2.10', '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1167, '2', 'Pic', '33', '0', '116', 'ZXHBB7907', '1', '8.44', '7.56', '15.01', '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1166, '2', 'Pic', '33', '0', '117', 'ZXHZAB8581', '1', NULL, NULL, '16.00', '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1184, '35', 'Pic', '34', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1185, '30', 'Pic', '34', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1183, '32', 'Pic', '34', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1182, '3', 'Pic', '34', '0', '121', 'ZXHZAY5446', '1', NULL, NULL, '23.00', '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1181, '15', 'Pic', '34', '0', '122', 'GA241129FQ278404', '1', NULL, NULL, '820', '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1199, '20', 'Pic', '35', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1198, '1', 'Pic', '35', '0', '123', 'ZXHZAV3704', '1', '3.12', '2.49', '2.35', '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1197, '2', 'Pic', '35', '0', '124', 'ZXHZBC5300', '1', NULL, NULL, '16.06', '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1217, '20', 'Pic', '36', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1216, '1', 'Pic', '36', '0', '127', 'ZXHZAZ7078', '1', '2.90', '2.51', '2.23', '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1215, '3', 'Pic', '36', '0', '128', 'ZXHZBA0748', '1', '7.50', '11.54', '24.37', '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1232, '3', 'Pic', '37', '0', '132', 'ZXHZAZ2471', '1', '8.70', '11.66', '24.66', '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1233, '1', 'Pic', '37', '0', '131', 'ZXHZBA4662', '1', '2.72', '2.50', '2.11', '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1230, '33', 'Pic', '37', '0', '167', 'EBBD16102', '1', '8.50', NULL, '20', '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1231, '26', 'Mtr', '37', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1363, '35', 'Pic', '38', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1362, '31', 'Pic', '38', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1361, '15', 'Pic', '38', '0', '138', 'GA241129FQ278336', '1', NULL, NULL, '930', '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1346, '20', 'Pic', '39', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1345, '1', 'Pic', '39', '0', '139', 'ZXHZAU9984', '1', '2.75', '2.84', '2.02', '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1344, '2', 'Pic', '39', '0', '140', 'ZXHZBB7726', '1', '9.35', '7.62', '19.40', '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1375, '15', 'Pic', '40', '0', '145', 'GA241129FQ278476', '1', NULL, NULL, '650', '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1742, '19', 'Pic', '57', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1374, '1', 'Pic', '40', '0', '143', 'ZXHZBA3179', '1', '2.80', '2.69', '2.22', '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1373, '20', 'Pic', '40', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1916, '16', 'Mtr', '86', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1915, '19', 'Pic', '86', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1937, '18', 'Pic', '87', '1', '18', '0', '2', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1934, '23', 'Pic', '87', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1935, '19', 'Pic', '87', '1', '219', '0', '5', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1145, '26', 'Mtr', '31', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1146, '33', 'Pic', '31', '0', '161', 'EBBD16104', '1', '11.50', NULL, '20.4', '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1147, '19', 'Pic', '31', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1148, '23', 'Pic', '31', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1149, '34', 'Pic', '31', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1150, '16', 'Mtr', '31', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 22:39:32', '2025-07-14 22:39:32'),
(1953, '16', 'Mtr', '88', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1952, '19', 'Pic', '88', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1968, '16', 'Mtr', '89', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1967, '19', 'Pic', '89', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1983, '16', 'Mtr', '90', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1982, '19', 'Pic', '90', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1998, '16', 'Mtr', '91', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(1997, '19', 'Pic', '91', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2013, '16', 'Mtr', '92', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2012, '19', 'Pic', '92', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(1175, '26', 'Mtr', '33', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1176, '33', 'Pic', '33', '0', '163', 'EBBB03849', '1', '11.50', NULL, '20.2', '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1177, '16', 'Mtr', '33', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1178, '23', 'Pic', '33', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1179, '34', 'Pic', '33', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1180, '19', 'Pic', '33', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 23:02:03', '2025-07-14 23:02:03'),
(1193, '16', 'Mtr', '34', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1194, '23', 'Pic', '34', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1195, '34', 'Pic', '34', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1196, '19', 'Pic', '34', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 23:03:05', '2025-07-14 23:03:05'),
(1207, '33', 'Pic', '35', '0', '165', 'EBBD16103', '1', '9.50', NULL, '20', '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1208, '19', 'Pic', '35', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1209, '34', 'Pic', '35', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1210, '23', 'Pic', '35', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(1211, '16', 'Mtr', '35', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 23:03:37', '2025-07-14 23:03:37'),
(2028, '16', 'Mtr', '93', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2027, '19', 'Pic', '93', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(1224, '26', 'Mtr', '36', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1225, '33', 'Pic', '36', '0', '166', 'EBBD16097', '1', '9', NULL, '22', '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1226, '19', 'Pic', '36', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1227, '16', 'Mtr', '36', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1228, '18', 'Pic', '36', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1229, '23', 'Pic', '36', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:04', '2025-07-14 23:04:04'),
(1241, '19', 'Pic', '37', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1242, '16', 'Mtr', '37', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1243, '23', 'Pic', '37', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(1244, '34', 'Pic', '37', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-14 23:04:41', '2025-07-14 23:04:41'),
(2044, '16', 'Mtr', '94', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2043, '19', 'Pic', '94', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2059, '16', 'Mtr', '95', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2058, '19', 'Pic', '95', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2074, '16', 'Mtr', '96', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2073, '19', 'Pic', '96', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2159, '15', 'Pic', '97', '0', '142', 'GA240719FQ258447', '1', NULL, NULL, '670', '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2157, '33', 'Pic', '97', '0', '194', 'EBBE08418', '1', '11', NULL, '20.4', '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2140, '20', 'Pic', '98', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2141, '1', 'Pic', '98', '0', '322', 'ZXHZAY9448', '1', '2.80', '2.91', '2.00', '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2164, '16', 'Mtr', '99', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2163, '19', 'Pic', '99', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2194, '16', 'Mtr', '100', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2193, '19', 'Pic', '100', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2209, '16', 'Mtr', '101', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2208, '19', 'Pic', '101', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02');
INSERT INTO `tbl_reports_items` (`id`, `scid`, `unit`, `report_id`, `dead_status`, `tblstock_id`, `sr_no`, `used_qty`, `amp`, `volt`, `watt`, `created_at`, `updated_at`) VALUES
(2224, '16', 'Mtr', '102', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2223, '19', 'Pic', '102', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2239, '16', 'Mtr', '103', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2238, '19', 'Pic', '103', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2254, '16', 'Mtr', '104', '0', '58', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2253, '19', 'Pic', '104', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2269, '16', 'Mtr', '105', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2268, '19', 'Pic', '105', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2287, '23', 'Pic', '106', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2288, '19', 'Pic', '106', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2286, '34', 'Pic', '106', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2285, '16', 'Mtr', '106', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2477, '34', 'Pic', '107', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2478, '23', 'Pic', '107', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2476, '2', 'Pic', '107', '0', '362', 'ZXHZBC0245', '1', '8.38', '7.50', '15.00', '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2485, '34', 'Pic', '108', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2484, '18', 'Pic', '108', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2525, '30', 'Pic', '109', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2526, '15', 'Pic', '109', '0', '376', 'GA250418FQ301812', '1', NULL, NULL, '650', '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2177, '33', 'Pic', '110', '0', '207', 'EBBE08455', '1', '11', NULL, '20', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2176, '31', 'Pic', '110', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2175, '26', 'Mtr', '110', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2551, '19', 'Pic', '111', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2552, '16', 'Mtr', '111', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2553, '34', 'Pic', '111', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2566, '34', 'Pic', '112', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2567, '26', 'Mtr', '112', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2568, '31', 'Pic', '112', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2583, '23', 'Pic', '114', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2581, '16', 'Mtr', '114', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2582, '34', 'Pic', '114', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2536, '32', 'Pic', '115', '0', '256', '0', '1', NULL, NULL, NULL, '2025-07-17 22:27:15', '2025-07-17 22:27:15'),
(2537, '26', 'Mtr', '115', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 22:27:15', '2025-07-17 22:27:15'),
(2539, '33', 'Pic', '115', '0', '211', 'EBBE08444', '1', '8.20', NULL, '23.5', '2025-07-17 22:27:15', '2025-07-17 22:27:15'),
(1311, '32', 'Pic', '116', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-14 23:50:51', '2025-07-14 23:50:51'),
(2595, '16', 'Mtr', '117', '0', '58', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2594, '19', 'Pic', '117', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2608, '16', 'Mtr', '118', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2665, '3', 'Pic', '119', '0', '404', 'ZXHZAP0380', '1', NULL, NULL, '30.0', '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2664, '2', 'Pic', '119', '0', '403', 'ZXHZAI3884', '1', NULL, NULL, '22.40', '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2667, '32', 'Pic', '120', '0', '256', '0', '1', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2668, '33', 'Pic', '120', '0', '215', 'EBBC14162', '1', '9.50', NULL, '23', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2704, '3', 'Pic', '121', '0', '411', 'ZXHZAV5465', '1', NULL, NULL, '28.20', '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2705, '15', 'Pic', '121', '0', '412', 'GA241129FQ278360', '1', NULL, NULL, '780', '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(1658, '33', 'Pic', '122', '0', '217', 'EBBC16989', '1', '11.50', NULL, '23.7', '2025-07-15 01:28:48', '2025-07-15 01:28:48'),
(1657, '32', 'Pic', '122', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 01:28:48', '2025-07-15 01:28:48'),
(1656, '26', 'Mtr', '122', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 01:28:48', '2025-07-15 01:28:48'),
(1360, '2', 'Pic', '38', '0', '137', 'ZXHZBC5376', '1', NULL, NULL, '18.00', '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1359, '16', 'Mtr', '38', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1353, '26', 'Mtr', '39', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1354, '33', 'Pic', '39', '0', '169', 'EBBD16059', '1', '11.10', NULL, '20', '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1355, '19', 'Pic', '39', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1356, '16', 'Mtr', '39', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1357, '34', 'Pic', '39', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1358, '23', 'Pic', '39', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 00:18:02', '2025-07-15 00:18:02'),
(1371, '19', 'Pic', '38', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1372, '18', 'Pic', '38', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 00:19:01', '2025-07-15 00:19:01'),
(1382, '26', 'Mtr', '40', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1383, '19', 'Pic', '40', '0', '16', '0', '2', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1384, '16', 'Mtr', '40', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1385, '18', 'Pic', '40', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1386, '23', 'Pic', '40', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 00:20:35', '2025-07-15 00:20:35'),
(1709, '33', 'Pic', '55', '0', '171', 'EBBD16064', '1', '11.50', NULL, '20', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1708, '26', 'Mtr', '55', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1707, '31', 'Pic', '55', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1725, '33', 'Pic', '56', '0', '172', 'EBBD16105', '1', '11.70', NULL, '20', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1724, '31', 'Pic', '56', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1723, '26', 'Mtr', '56', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1741, '26', 'Mtr', '57', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1740, '33', 'Pic', '57', '0', '173', 'EBBD16096', '1', '12', NULL, '19.6', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1739, '31', 'Pic', '57', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1760, '34', 'Pic', '58', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1757, '26', 'Mtr', '58', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1756, '31', 'Pic', '58', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1755, '33', 'Pic', '58', '0', '174', 'EBBD16137', '1', '11.50', NULL, '20', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1785, '34', 'Pic', '59', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1782, '31', 'Pic', '59', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:03', '2025-07-15 19:53:03'),
(1781, '26', 'Mtr', '59', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 19:53:03', '2025-07-15 19:53:03'),
(1780, '33', 'Pic', '59', '0', '175', 'EBBD16063', '1', '11.50', NULL, '20', '2025-07-15 19:53:03', '2025-07-15 19:53:03'),
(1798, '31', 'Pic', '61', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1797, '33', 'Pic', '61', '0', '176', 'EBBD16132', '1', '11.30', NULL, '20', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1796, '26', 'Mtr', '61', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1842, '16', 'Mtr', '67', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1841, '19', 'Pic', '67', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1840, '31', 'Pic', '67', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1853, '33', 'Pic', '84', '0', '179', 'EBBD16130', '1', '11.50', NULL, '20', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1852, '31', 'Pic', '84', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1851, '26', 'Mtr', '84', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1871, '33', 'Pic', '69', '0', '182', 'EBBC10432', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1869, '31', 'Pic', '69', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1870, '26', 'Mtr', '69', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1868, '26', 'Mtr', '69', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1885, '33', 'Pic', '83', '0', '181', 'EBBD16135', '1', '11.50', NULL, '20', '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1884, '26', 'Mtr', '83', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1883, '31', 'Pic', '83', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1902, '18', 'Pic', '85', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1900, '19', 'Pic', '85', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1899, '26', 'Mtr', '85', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1898, '32', 'Pic', '85', '0', '256', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1867, '19', 'Pic', '69', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1866, '16', 'Mtr', '69', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1917, '34', 'Pic', '86', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1914, '26', 'Mtr', '86', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1913, '31', 'Pic', '86', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1912, '33', 'Pic', '86', '0', '183', 'EBBE08432', '1', '12', NULL, '20', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(2538, '26', 'Mtr', '115', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 22:27:15', '2025-07-17 22:27:15'),
(1933, '18', 'Pic', '87', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(3939, '19', 'Pic', '274', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3938, '16', 'Mtr', '274', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(1500, '26', 'Mtr', '124', '1', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 00:58:47', '2025-07-15 00:58:47'),
(1501, '26', 'Mtr', '124', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 00:58:47', '2025-07-15 00:58:47'),
(1502, '26', 'Mtr', '125', '1', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 01:03:15', '2025-07-15 01:03:15'),
(1503, '26', 'Mtr', '125', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 01:03:15', '2025-07-15 01:03:15'),
(1504, '33', 'Pic', '125', '0', '218', 'EBBE08442', '1', '9', NULL, '23.5', '2025-07-15 01:03:15', '2025-07-15 01:03:15'),
(1936, '16', 'Mtr', '87', '1', '58', '0', '9', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1932, '16', 'Mtr', '87', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1931, '19', 'Pic', '87', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1930, '26', 'Mtr', '87', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1929, '33', 'Pic', '87', '0', '184', 'EBBD16126', '1', '11.60', NULL, '19.8', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1928, '26', 'Mtr', '87', '1', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1927, '31', 'Pic', '87', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(3282, '33', 'Pic', '126', '0', '220', 'EBBE08445', '1', '7.80', NULL, '23.5', '2025-07-21 22:57:34', '2025-07-21 22:57:34'),
(3281, '26', 'Mtr', '126', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-21 22:57:34', '2025-07-21 22:57:34'),
(3280, '26', 'Mtr', '126', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-21 22:57:34', '2025-07-21 22:57:34'),
(1954, '34', 'Pic', '88', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1951, '26', 'Mtr', '88', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1950, '31', 'Pic', '88', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1949, '33', 'Pic', '88', '0', '185', 'EBBE08431', '1', '12', NULL, '20', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1969, '34', 'Pic', '89', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1966, '26', 'Mtr', '89', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1965, '31', 'Pic', '89', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1964, '33', 'Pic', '89', '0', '186', 'EBBE08425', '1', '11.50', NULL, '20', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1984, '34', 'Pic', '90', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1981, '26', 'Mtr', '90', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1980, '31', 'Pic', '90', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1979, '33', 'Pic', '90', '0', '187', 'EBBE08430', '1', '10', NULL, '20', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1999, '34', 'Pic', '91', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(1996, '26', 'Mtr', '91', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(1995, '31', 'Pic', '91', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(1994, '33', 'Pic', '91', '0', '188', 'EBBE08434', '1', '10.30', NULL, '20', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2014, '34', 'Pic', '92', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2011, '26', 'Mtr', '92', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2010, '31', 'Pic', '92', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2009, '33', 'Pic', '92', '0', '189', 'EBBE08436', '1', '11.20', NULL, '20', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2029, '34', 'Pic', '93', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2026, '26', 'Mtr', '93', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2025, '31', 'Pic', '93', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2024, '33', 'Pic', '93', '0', '190', 'EBBD16084', '1', '8', NULL, '21.50', '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2045, '34', 'Pic', '94', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2042, '26', 'Mtr', '94', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2041, '31', 'Pic', '94', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2040, '33', 'Pic', '94', '0', '191', 'EBBE08438', '1', '11', NULL, '20.2', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(1571, '26', 'Mtr', '127', '1', '23', '0', '6.50', NULL, NULL, NULL, '2025-07-15 01:17:29', '2025-07-15 01:17:29'),
(1572, '33', 'Pic', '127', '0', '221', 'EBBE08423', '1', '9', NULL, '23.5', '2025-07-15 01:17:29', '2025-07-15 01:17:29'),
(1573, '26', 'Mtr', '127', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 01:17:29', '2025-07-15 01:17:29'),
(2060, '34', 'Pic', '95', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2057, '26', 'Mtr', '95', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2056, '31', 'Pic', '95', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2055, '33', 'Pic', '95', '0', '192', 'EBBE08440', '1', '11', NULL, '20', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(1581, '26', 'Mtr', '128', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 01:19:10', '2025-07-15 01:19:10'),
(1582, '26', 'Mtr', '128', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 01:19:10', '2025-07-15 01:19:10'),
(1583, '33', 'Pic', '128', '0', '222', 'EBBE08424', '1', '10', NULL, '23.5', '2025-07-15 01:19:10', '2025-07-15 01:19:10'),
(2075, '34', 'Pic', '96', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2072, '26', 'Mtr', '96', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2071, '31', 'Pic', '96', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2070, '33', 'Pic', '96', '0', '193', 'EBBE08441', '1', '11', NULL, '19.8', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2158, '2', 'Pic', '97', '0', '321', 'ZXHZBC9765', '1', NULL, NULL, '17.00', '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2156, '31', 'Pic', '97', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2155, '26', 'Mtr', '97', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2154, '19', 'Pic', '97', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2142, '2', 'Pic', '98', '0', '323', 'ZXHZBC5468', '1', '8.36', '7.47', '15.00', '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2139, '21', 'Pic', '98', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2138, '30', 'Pic', '98', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2137, '35', 'Pic', '98', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(1605, '26', 'Mtr', '129', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 01:23:32', '2025-07-15 01:23:32'),
(1606, '32', 'Pic', '129', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 01:23:32', '2025-07-15 01:23:32'),
(1607, '33', 'Pic', '129', '0', '223', 'HPW-JL3620D06H2', '1', '10', NULL, '23.7', '2025-07-15 01:23:32', '2025-07-15 01:23:32'),
(2165, '34', 'Pic', '99', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2162, '26', 'Mtr', '99', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2161, '31', 'Pic', '99', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2160, '33', 'Pic', '99', '0', '196', 'EBBE08435', '1', '11.3', NULL, '19.7', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(1615, '26', 'Mtr', '130', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 01:25:18', '2025-07-15 01:25:18'),
(1616, '32', 'Pic', '130', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 01:25:18', '2025-07-15 01:25:18'),
(1617, '33', 'Pic', '130', '0', '224', 'EBBD16101', '1', '7.70', NULL, '20', '2025-07-15 01:25:18', '2025-07-15 01:25:18'),
(2195, '34', 'Pic', '100', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2192, '26', 'Mtr', '100', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2191, '31', 'Pic', '100', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2190, '33', 'Pic', '100', '0', '197', 'EBBE08421', '1', '11.44', NULL, '20.2', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2210, '34', 'Pic', '101', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2207, '26', 'Mtr', '101', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:01', '2025-07-16 01:02:01'),
(2206, '31', 'Pic', '101', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:01', '2025-07-16 01:02:01'),
(2205, '33', 'Pic', '101', '0', '198', 'EBBE08415', '1', '11', NULL, '20', '2025-07-16 01:02:01', '2025-07-16 01:02:01'),
(1632, '26', 'Mtr', '131', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-15 01:27:18', '2025-07-15 01:27:18'),
(1633, '32', 'Pic', '131', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 01:27:18', '2025-07-15 01:27:18'),
(1634, '33', 'Pic', '131', '0', '225', 'EBBD16106', '1', '10', NULL, '23', '2025-07-15 01:27:18', '2025-07-15 01:27:18'),
(2225, '34', 'Pic', '102', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2222, '26', 'Mtr', '102', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2221, '31', 'Pic', '102', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2220, '33', 'Pic', '102', '0', '199', 'EBBE08420', '1', '11', NULL, '20', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2669, '26', 'Mtr', '120', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2240, '34', 'Pic', '103', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2237, '26', 'Mtr', '103', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2236, '31', 'Pic', '103', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2235, '33', 'Pic', '103', '0', '200', 'EBBE08414', '1', '11', NULL, '19', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2255, '34', 'Pic', '104', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2252, '26', 'Mtr', '104', '0', '23', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2251, '31', 'Pic', '104', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2250, '33', 'Pic', '104', '0', '201', 'EBBE08433', '1', '11.80', NULL, '20', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2270, '34', 'Pic', '105', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2267, '26', 'Mtr', '105', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2266, '31', 'Pic', '105', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2265, '33', 'Pic', '105', '0', '202', 'EBBE08427', '1', '11', NULL, '20.4', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2284, '19', 'Pic', '106', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2283, '26', 'Mtr', '106', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2282, '26', 'Mtr', '106', '1', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2281, '31', 'Pic', '106', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2280, '33', 'Pic', '106', '0', '203', 'EBBE08437', '1', '11.20', NULL, '20', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(1694, '32', 'Pic', '139', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 18:43:49', '2025-07-15 18:43:49'),
(1693, '26', 'Mtr', '139', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:43:49', '2025-07-15 18:43:49'),
(1692, '26', 'Mtr', '138', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:41:16', '2025-07-15 18:41:16'),
(1695, '26', 'Mtr', '140', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:45:08', '2025-07-15 18:45:08'),
(1696, '32', 'Pic', '140', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 18:45:08', '2025-07-15 18:45:08'),
(1697, '33', 'Pic', '140', '0', '227', 'EBBC16796', '1', '9', NULL, '23.3', '2025-07-15 18:45:08', '2025-07-15 18:45:08'),
(1698, '26', 'Mtr', '141', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:46:32', '2025-07-15 18:46:32'),
(1699, '32', 'Pic', '141', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 18:46:32', '2025-07-15 18:46:32'),
(1700, '33', 'Pic', '141', '0', '228', 'EBBD16095', '1', '9', NULL, '23', '2025-07-15 18:46:32', '2025-07-15 18:46:32'),
(1701, '26', 'Mtr', '142', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:48:13', '2025-07-15 18:48:13'),
(1702, '32', 'Pic', '142', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 18:48:13', '2025-07-15 18:48:13'),
(1703, '33', 'Pic', '142', '0', '229', 'EBBD16131', '1', '8.50', NULL, '23', '2025-07-15 18:48:13', '2025-07-15 18:48:13'),
(1704, '26', 'Mtr', '143', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-15 18:50:00', '2025-07-15 18:50:00'),
(1705, '32', 'Pic', '143', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-15 18:50:00', '2025-07-15 18:50:00'),
(1706, '33', 'Pic', '143', '0', '230', 'EBBD16062', '1', '9', NULL, '21.6', '2025-07-15 18:50:00', '2025-07-15 18:50:00'),
(1712, '34', 'Pic', '55', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1713, '23', 'Pic', '55', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1714, '31', 'Pic', '55', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1715, '35', 'Pic', '55', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1716, '30', 'Pic', '55', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1717, '21', 'Pic', '55', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1718, '20', 'Pic', '55', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1719, '1', 'Pic', '55', '0', '231', 'ZXHZAU7484', '1', '2.80', '3.01', '2.30', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1720, '2', 'Pic', '55', '0', '232', 'ZXHZBC5365', '1', '9.20', '7.57', '16.00', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1721, '2', 'Pic', '55', '0', '233', 'ZXHZBC5571', '1', NULL, NULL, '16.00', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1722, '15', 'Pic', '55', '0', '234', 'GA241129FQ278364', '1', NULL, NULL, '700', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(1728, '23', 'Pic', '56', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1729, '34', 'Pic', '56', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1730, '31', 'Pic', '56', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1731, '35', 'Pic', '56', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1732, '30', 'Pic', '56', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1733, '21', 'Pic', '56', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1734, '20', 'Pic', '56', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1735, '1', 'Pic', '56', '0', '235', 'ZXHZAU9974', '1', '2.95', '2.48', '2.10', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1736, '2', 'Pic', '56', '0', '236', 'ZXHZBC5355', '1', '10.96', '7.56', '20.21', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1737, '2', 'Pic', '56', '0', '237', 'ZXHZBC7689', '1', NULL, NULL, '20.75', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1738, '15', 'Pic', '56', '0', '238', 'GA241129FQ278334', '1', NULL, NULL, '700', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(1744, '34', 'Pic', '57', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1745, '23', 'Pic', '57', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1746, '31', 'Pic', '57', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1747, '35', 'Pic', '57', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1748, '30', 'Pic', '57', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1749, '21', 'Pic', '57', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1750, '20', 'Pic', '57', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1751, '1', 'Pic', '57', '0', '239', 'ZXHZAU9878', '1', '2.80', '2.91', '2.10', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1752, '2', 'Pic', '57', '0', '240', 'ZXHZBB9113', '1', '10.10', '8.50', '20.60', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1753, '2', 'Pic', '57', '0', '241', 'ZXHZAI3899', '1', NULL, NULL, '18.64', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1754, '15', 'Pic', '57', '0', '242', 'GA241129FQ278344', '1', NULL, NULL, '720', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(1761, '23', 'Pic', '58', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1762, '31', 'Pic', '58', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1763, '35', 'Pic', '58', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1764, '30', 'Pic', '58', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1765, '21', 'Pic', '58', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1766, '20', 'Pic', '58', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1767, '1', 'Pic', '58', '0', '243', 'ZXHZAZ4489', '1', '2.80', '2.49', '2.15', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1768, '2', 'Pic', '58', '0', '39', 'ZXHZBD5033', '1', '11.10', '7.52', '20.00', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1769, '2', 'Pic', '58', '0', '40', 'ZXHZBD5064', '1', NULL, NULL, '20.00', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1770, '15', 'Pic', '58', '0', '244', 'GA241129FQ278339', '1', NULL, NULL, '800', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(1771, '31', 'Pic', '144', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1772, '35', 'Pic', '144', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1773, '30', 'Pic', '144', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1774, '21', 'Pic', '144', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1775, '20', 'Pic', '144', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1776, '1', 'Pic', '144', '0', '245', 'ZXHZAU7741', '1', '2.52', '2.90', '1.45', '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1777, '3', 'Pic', '144', '0', '246', 'ZXHZBC0793', '1', '11.90', '5.64', '26.00', '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1778, '3', 'Pic', '144', '0', '247', 'ZXHZAA7814', '1', NULL, NULL, '26.00', '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1779, '15', 'Pic', '144', '0', '248', 'GA241129FQ27825', '1', NULL, NULL, NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(1786, '23', 'Pic', '59', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1787, '31', 'Pic', '59', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1788, '35', 'Pic', '59', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1789, '30', 'Pic', '59', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1790, '21', 'Pic', '59', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1791, '20', 'Pic', '59', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1792, '1', 'Pic', '59', '0', '249', 'ZXHZAU7780', '1', '2.70', '3.01', '2.32', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1793, '2', 'Pic', '59', '0', '250', 'ZXHZBC5315', '1', '8.20', '7.59', '17.56', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1794, '2', 'Pic', '59', '0', '251', 'ZXHZBC5280', '1', NULL, NULL, '18.02', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1795, '15', 'Pic', '59', '0', '252', 'GA241129FQ278350', '1', NULL, NULL, '670', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(1802, '23', 'Pic', '61', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1803, '31', 'Pic', '61', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1804, '35', 'Pic', '61', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1805, '30', 'Pic', '61', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1806, '21', 'Pic', '61', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1807, '20', 'Pic', '61', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1808, '1', 'Pic', '61', '0', '253', 'ZXHZAV5093', '1', '2.75', '2.45', '2.19', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1809, '2', 'Pic', '61', '0', '38', 'ZXHZBB7737', '1', '10.44', '7.56', '19.55', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1810, '2', 'Pic', '61', '0', '254', 'ZXHZABB7707', '1', NULL, NULL, '21.11', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1811, '15', 'Pic', '61', '0', '255', 'GA241129FQ278337', '1', NULL, NULL, '700', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(1839, '23', 'Pic', '67', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1837, '26', 'Mtr', '67', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1836, '35', 'Pic', '67', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1844, '30', 'Pic', '67', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1845, '21', 'Pic', '67', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1846, '20', 'Pic', '67', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1847, '1', 'Pic', '67', '0', '258', 'ZXHZAA4614', '1', '2.90', '2.49', '2.13', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1848, '2', 'Pic', '67', '0', '37', 'ZXHZBD3433', '1', '10.80', '7.66', '20.00', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1849, '2', 'Pic', '67', '0', '259', 'ZXHZBB9026', '1', NULL, NULL, '20.00', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1850, '15', 'Pic', '67', '0', '260', 'GA241129FQ278428', '1', NULL, NULL, '640', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(1856, '18', 'Pic', '84', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1857, '23', 'Pic', '84', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1858, '35', 'Pic', '84', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1859, '30', 'Pic', '84', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1860, '21', 'Pic', '84', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1861, '20', 'Pic', '84', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1862, '1', 'Pic', '84', '0', '261', 'ZXHZAV9887', '1', '2.90', '2.51', '2.05', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1863, '2', 'Pic', '84', '0', '42', 'ZXHZBB9156', '1', '11.13', '7.57', '20.50', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1864, '2', 'Pic', '84', '0', '262', 'ZXHZBC5484', '1', '11.13', '7.57', '21.70', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1865, '15', 'Pic', '84', '0', '263', 'GA241129FQ278338', '1', NULL, NULL, '730', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(1874, '19', 'Pic', '69', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1875, '35', 'Pic', '69', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1876, '30', 'Pic', '69', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1877, '21', 'Pic', '69', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1878, '20', 'Pic', '69', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1879, '1', 'Pic', '69', '0', '264', 'ZXHZAW3736', '1', '2.66', '2.80', '2.20', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1880, '2', 'Pic', '69', '0', '265', 'ZXHZBD3383', '1', '8.64', '7.58', '16.00', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1881, '2', 'Pic', '69', '0', '266', 'ZXHZBB9139', '1', NULL, NULL, '16.00', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1882, '15', 'Pic', '69', '0', '267', 'GA241129FQ278333', '1', NULL, NULL, '620', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(1888, '18', 'Pic', '83', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:01', '2025-07-15 22:32:01'),
(1889, '23', 'Pic', '83', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1890, '35', 'Pic', '83', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1891, '30', 'Pic', '83', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1892, '21', 'Pic', '83', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1893, '20', 'Pic', '83', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1894, '1', 'Pic', '83', '0', '268', 'ZXHZA2523', '1', '2.72', '2.48', '2.00', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1895, '2', 'Pic', '83', '0', '269', 'ZXHZBB9136', '1', '10.80', '7.43', '19.02', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1896, '2', 'Pic', '83', '0', '270', 'ZXHZBD4794', '1', NULL, NULL, '19.01', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1897, '15', 'Pic', '83', '0', '271', 'GA241129FQ278373', '1', NULL, NULL, '650', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(1903, '23', 'Pic', '85', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1904, '35', 'Pic', '85', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1905, '30', 'Pic', '85', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1906, '21', 'Pic', '85', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1907, '20', 'Pic', '85', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1908, '1', 'Pic', '85', '0', '272', 'ZXHZAV7901', '1', '2.60', '2.49', '2.11', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1909, '3', 'Pic', '85', '0', '273', 'ZXHZAY1409', '1', '7.75', '11.73', '21.00', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1910, '3', 'Pic', '85', '0', '274', 'ZXHZAY5460', '1', NULL, NULL, '21.00', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1911, '15', 'Pic', '85', '0', '26', 'GA241129FQ278380', '1', NULL, NULL, '700', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(1918, '23', 'Pic', '86', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1919, '35', 'Pic', '86', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1920, '30', 'Pic', '86', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1921, '21', 'Pic', '86', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1922, '20', 'Pic', '86', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1923, '1', 'Pic', '86', '0', '275', 'ZXHZAZ4147', '1', '2.71', '2.93', '2.10', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1924, '2', 'Pic', '86', '0', '276', 'ZXHZBC5342', '1', '8.11', '7.46', '15.05', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1925, '2', 'Pic', '86', '0', '277', 'ZXHZBC5275', '1', NULL, NULL, '15.00', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1926, '15', 'Pic', '86', '0', '278', 'GA250418FQ301817', '1', NULL, NULL, '840', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(1938, '23', 'Pic', '87', '1', '17', '0', '2', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1939, '34', 'Pic', '87', '1', '21', '0', '3', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1940, '35', 'Pic', '87', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1941, '30', 'Pic', '87', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1942, '21', 'Pic', '87', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1943, '20', 'Pic', '87', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1944, '20', 'Pic', '87', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1945, '1', 'Pic', '87', '0', '279', 'ZXHZAU9938', '1', '2.80', '2.48', '2.04', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1946, '2', 'Pic', '87', '0', '280', 'ZXHZBB7722', '1', '11.03', '7.55', '20.30', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1947, '2', 'Pic', '87', '0', '281', 'ZXHZBC5273', '1', NULL, NULL, '20.40', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1948, '15', 'Pic', '87', '0', '282', 'GA241129FQ278335', '1', NULL, NULL, NULL, '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(1955, '23', 'Pic', '88', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1956, '35', 'Pic', '88', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1957, '30', 'Pic', '88', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1958, '21', 'Pic', '88', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1959, '20', 'Pic', '88', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1960, '1', 'Pic', '88', '0', '283', 'ZXHZAY8673', '1', '2.84', '2.97', '1.96', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1961, '2', 'Pic', '88', '0', '284', 'ZXHZBD5014', '1', '8.30', '7.52', '15.00', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1962, '2', 'Pic', '88', '0', '285', 'ZXHZBC9592', '1', NULL, NULL, '16.00', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1963, '15', 'Pic', '88', '0', '286', 'GA250418FQ301814', '1', NULL, NULL, '680', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(1970, '23', 'Pic', '89', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1971, '35', 'Pic', '89', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1972, '30', 'Pic', '89', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1973, '21', 'Pic', '89', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1974, '20', 'Pic', '89', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1975, '1', 'Pic', '89', '0', '287', 'ZXHZAY5543', '1', '3.04', '2.80', '2.35', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1976, '2', 'Pic', '89', '0', '288', 'ZXHZAY5543', '1', '8.53', '7.59', '15.00', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1977, '2', 'Pic', '89', '0', '289', 'ZXHZBC9637', '1', NULL, NULL, '15.00', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1978, '15', 'Pic', '89', '0', '290', 'GA250418FQ301820', '1', NULL, NULL, '700', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(1985, '23', 'Pic', '90', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1986, '35', 'Pic', '90', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1987, '30', 'Pic', '90', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1988, '21', 'Pic', '90', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1989, '20', 'Pic', '90', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1990, '1', 'Pic', '90', '0', '291', 'ZXHZABA3305', '1', '2.90', '2.97', '2.14', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1991, '2', 'Pic', '90', '0', '292', 'ZXHZBC5287', '1', '8.40', '7.52', '15.00', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1992, '2', 'Pic', '90', '0', '293', 'ZXHZBC7151', '1', NULL, NULL, '15.00', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(1993, '15', 'Pic', '90', '0', '294', 'GA241129FQ278393', '1', NULL, NULL, '600', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(2000, '23', 'Pic', '91', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2001, '35', 'Pic', '91', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2002, '30', 'Pic', '91', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2003, '21', 'Pic', '91', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2004, '20', 'Pic', '91', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2005, '1', 'Pic', '91', '0', '295', 'ZXHZAZ7077', '1', '2.80', '2.92', '2.10', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2006, '2', 'Pic', '91', '0', '296', 'ZXHZBC9754', '1', '9.07', '7.55', '17.00', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2007, '2', 'Pic', '91', '0', '297', 'ZXHZBC8937', '1', NULL, NULL, '17.00', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2008, '15', 'Pic', '91', '0', '298', 'GA230926FQ209399', '1', NULL, NULL, '680', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(2015, '23', 'Pic', '92', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2016, '35', 'Pic', '92', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2017, '30', 'Pic', '92', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2018, '21', 'Pic', '92', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2019, '20', 'Pic', '92', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2020, '1', 'Pic', '92', '0', '299', 'ZXHZAY9609', '1', '2.90', '2.92', '2.10', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2021, '2', 'Pic', '92', '0', '300', 'ZXHZBD3453', '1', '8.89', '7.48', '17.00', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2022, '2', 'Pic', '92', '0', '301', 'ZXHZBD3645', '1', NULL, NULL, '17.00', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2023, '15', 'Pic', '92', '0', '302', 'GA241129FQ278383', '1', NULL, NULL, '760', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(2030, '23', 'Pic', '93', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2031, '18', 'Pic', '93', '0', '18', '0', '2', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2032, '35', 'Pic', '93', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2033, '30', 'Pic', '93', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2034, '21', 'Pic', '93', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2035, '20', 'Pic', '93', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2036, '1', 'Pic', '93', '0', '303', 'ZXHZAV4519', '1', '2.95', '2.85', '2.03', '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2037, '2', 'Pic', '93', '0', '304', 'ZXHZAV4540', '1', '8.75', '11.45', '23.50', '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(2038, '2', 'Pic', '93', '0', '305', 'ZXHZAV4601', '1', NULL, NULL, '22.60', '2025-07-15 23:43:39', '2025-07-15 23:43:39'),
(2039, '15', 'Pic', '93', '0', '306', 'GA24071FQ258475', '1', NULL, NULL, '800', '2025-07-15 23:43:39', '2025-07-15 23:43:39'),
(2046, '23', 'Pic', '94', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2047, '35', 'Pic', '94', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2048, '30', 'Pic', '94', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2049, '21', 'Pic', '94', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2050, '20', 'Pic', '94', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2051, '1', 'Pic', '94', '0', '307', 'ZXHZAY9388', '1', '2.65', '2.93', '2.1', '2025-07-15 23:53:13', '2025-07-15 23:53:13');
INSERT INTO `tbl_reports_items` (`id`, `scid`, `unit`, `report_id`, `dead_status`, `tblstock_id`, `sr_no`, `used_qty`, `amp`, `volt`, `watt`, `created_at`, `updated_at`) VALUES
(2052, '2', 'Pic', '94', '0', '308', 'ZXHZBC7021', '1', '9.25', '7.55', '18.00', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2053, '2', 'Pic', '94', '0', '309', 'ZXHZBB7671', '1', NULL, NULL, '16.00', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2054, '15', 'Pic', '94', '0', '310', 'GA241129FQ278387', '1', NULL, NULL, '600', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(2061, '23', 'Pic', '95', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2062, '35', 'Pic', '95', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2063, '30', 'Pic', '95', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2064, '21', 'Pic', '95', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2065, '20', 'Pic', '95', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2066, '1', 'Pic', '95', '0', '311', 'ZXHZAY9565', '1', '2.86', '2.97', '2.03', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2067, '2', 'Pic', '95', '0', '312', 'ZXHZBC9799', '1', '9.10', '7.53', '17.00', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2068, '2', 'Pic', '95', '0', '313', 'ZXHZBC8328', '1', NULL, NULL, '17.00', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2069, '15', 'Pic', '95', '0', '314', 'GA241129FQ278386', '1', NULL, NULL, '600', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(2076, '23', 'Pic', '96', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2077, '35', 'Pic', '96', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2078, '30', 'Pic', '96', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2079, '21', 'Pic', '96', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2080, '20', 'Pic', '96', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2081, '1', 'Pic', '96', '0', '315', 'ZXHZAY9414', '1', '2.88', '2.88', '2.10', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2082, '2', 'Pic', '96', '0', '316', 'ZXHZBB5588', '1', '8.68', '7.48', '15.00', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2083, '2', 'Pic', '96', '0', '317', 'ZXHZBC5486', '1', NULL, NULL, '15.05', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2084, '15', 'Pic', '96', '0', '318', 'GA241129FQ278385', '1', NULL, NULL, '750', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(2153, '16', 'Mtr', '97', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2152, '34', 'Pic', '97', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2151, '23', 'Pic', '97', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2150, '35', 'Pic', '97', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2149, '30', 'Pic', '97', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2148, '21', 'Pic', '97', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2147, '20', 'Pic', '97', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2146, '2', 'Pic', '97', '0', '320', 'ZXHZBC1532', '1', '9.55', '7.52', '17.00', '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2145, '1', 'Pic', '97', '0', '319', 'ZXHZAZ5270', '1', '2.92', '2.96', '2.00', '2025-07-16 00:37:20', '2025-07-16 00:37:20'),
(2136, '23', 'Pic', '98', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2135, '33', 'Pic', '98', '0', '195', 'EBBE08416', '1', '11', NULL, '20', '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2134, '31', 'Pic', '98', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2133, '26', 'Mtr', '98', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2132, '34', 'Pic', '98', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2131, '19', 'Pic', '98', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2130, '16', 'Mtr', '98', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2143, '2', 'Pic', '98', '0', '324', 'ZXHZBC5265', '1', NULL, NULL, '15.00', '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2144, '15', 'Pic', '98', '0', '325', 'GA240407FQ239058', '1', NULL, NULL, '670', '2025-07-16 00:36:30', '2025-07-16 00:36:30'),
(2166, '23', 'Pic', '99', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2167, '35', 'Pic', '99', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2168, '30', 'Pic', '99', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2169, '21', 'Pic', '99', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2170, '20', 'Pic', '99', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2171, '1', 'Pic', '99', '0', '326', 'ZXHZAY9529', '1', '2.62', '2.90', '2.00', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2172, '2', 'Pic', '99', '0', '327', 'ZXHZBC9786', '1', '8.15', '7.49', '15.00', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2173, '2', 'Pic', '99', '0', '328', 'ZXHZBC9794', '1', NULL, NULL, '15', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2174, '15', 'Pic', '99', '0', '329', 'GA240719FQ258439', '1', NULL, NULL, '620', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(2178, '35', 'Pic', '110', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2179, '30', 'Pic', '110', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2180, '21', 'Pic', '110', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2181, '20', 'Pic', '110', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2182, '1', 'Pic', '110', '0', '330', 'ZXHZBA6400', '1', '2.57', '2.96', '2.34', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2183, '2', 'Pic', '110', '0', '331', 'ZXHZBD5062', '1', '8.51', '7.55', '15.00', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2184, '2', 'Pic', '110', '0', '332', 'ZXHZBB7706', '1', NULL, NULL, '16.00', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2185, '15', 'Pic', '110', '0', '333', 'GA250418FQ301813', '1', NULL, NULL, '620', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2186, '16', 'Mtr', '110', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2187, '34', 'Pic', '110', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2188, '23', 'Pic', '110', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2189, '19', 'Pic', '110', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(2196, '23', 'Pic', '100', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2197, '35', 'Pic', '100', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2198, '30', 'Pic', '100', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2199, '21', 'Pic', '100', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2200, '20', 'Pic', '100', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2201, '1', 'Pic', '100', '0', '334', 'ZXHZAY2622', '1', '2.83', '2.95', '2.07', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2202, '2', 'Pic', '100', '0', '335', 'ZXHZBD3571', '1', '8.40', '7.56', '16.00', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2203, '2', 'Pic', '100', '0', '336', 'ZXHZBD3891', '1', NULL, NULL, '15.00', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2204, '15', 'Pic', '100', '0', '337', 'GA241129FQ278388', '1', NULL, NULL, '680', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(2211, '23', 'Pic', '101', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2212, '35', 'Pic', '101', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2213, '30', 'Pic', '101', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2214, '21', 'Pic', '101', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2215, '20', 'Pic', '101', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2216, '1', 'Pic', '101', '0', '338', 'ZXHZAY9467', '1', '2.49', '2.95', '1.18', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2217, '2', 'Pic', '101', '0', '339', 'ZXHZBC9776', '1', '8.27', '7.53', '15.00', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2218, '2', 'Pic', '101', '0', '340', 'ZXHZBC5037', '1', NULL, NULL, '15.00', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2219, '15', 'Pic', '101', '0', '341', 'GA250418FQ301816', '1', NULL, NULL, '650', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(2226, '23', 'Pic', '102', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2227, '35', 'Pic', '102', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2228, '30', 'Pic', '102', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2229, '21', 'Pic', '102', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2230, '20', 'Pic', '102', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2231, '1', 'Pic', '102', '0', '275', 'ZXHZAZ4147', '1', '2.78', '2.91', '1.90', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2232, '2', 'Pic', '102', '0', '342', 'ZXHZBC5473', '1', '8.28', '7.47', '15.00', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2233, '2', 'Pic', '102', '0', '343', 'ZXHZBC4514', '1', NULL, NULL, '15.00', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2234, '15', 'Pic', '102', '0', '344', 'GA241129FQ278353', '1', NULL, NULL, '730', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(2241, '23', 'Pic', '103', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2242, '35', 'Pic', '103', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2243, '30', 'Pic', '103', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2244, '21', 'Pic', '103', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2245, '20', 'Pic', '103', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2246, '1', 'Pic', '103', '0', '345', 'ZXHZAY7217', '1', '2.89', '2.89', '2.05', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2247, '2', 'Pic', '103', '0', '346', 'ZXHZBC4656', '1', '9.06', '7.52', '16.00', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2248, '2', 'Pic', '103', '0', '347', 'ZXHZBC9589', '1', NULL, NULL, '15.00', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2249, '15', 'Pic', '103', '0', '348', 'GA250418FQ301832', '1', NULL, NULL, '600', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(2256, '23', 'Pic', '104', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2257, '35', 'Pic', '104', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2258, '30', 'Pic', '104', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2259, '21', 'Pic', '104', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2260, '20', 'Pic', '104', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2261, '1', 'Pic', '104', '0', '349', 'ZXHZAY8849', '1', '2.91', '2.91', '2.00', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2262, '2', 'Pic', '104', '0', '350', 'ZXHZBC0397', '1', '9.25', '7.51', '17.00', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2263, '2', 'Pic', '104', '0', '351', 'ZXHZBC9649', '1', NULL, NULL, '17.00', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2264, '15', 'Pic', '104', '0', '352', 'GA241129FQ278384', '1', NULL, NULL, '670', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(2271, '23', 'Pic', '105', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2272, '35', 'Pic', '105', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2273, '30', 'Pic', '105', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2274, '21', 'Pic', '105', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2275, '20', 'Pic', '105', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2276, '1', 'Pic', '105', '0', '353', 'ZXHZAY5078', '1', '2.70', '2.93', '2.00', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2277, '2', 'Pic', '105', '0', '354', 'ZXHZBC0623', '1', '8.22', '7.51', '15.00', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2278, '2', 'Pic', '105', '0', '355', 'ZXHZBC9862', '1', NULL, NULL, '16.00', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2279, '15', 'Pic', '105', '0', '356', 'GA250418FQ301824', '1', NULL, NULL, '710', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(2289, '35', 'Pic', '106', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2290, '30', 'Pic', '106', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2291, '21', 'Pic', '106', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2292, '20', 'Pic', '106', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2293, '1', 'Pic', '106', '0', '357', 'ZXHZAY9418', '1', '2.87', '2.92', '2.06', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2294, '2', 'Pic', '106', '0', '358', 'ZXHZBB8078', '1', '10.07', '7.64', '18.00', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2295, '2', 'Pic', '106', '0', '359', 'ZXHZBC9679', '1', NULL, NULL, '18.00', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2296, '15', 'Pic', '106', '0', '360', 'GA23092FQ209373', '1', NULL, NULL, '660', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(2487, '19', 'Pic', '108', '1', '219', '0', '5', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2475, '1', 'Pic', '107', '0', '361', 'ZXHZAY3972', '1', '2.88', '2.95', '1.90', '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2474, '20', 'Pic', '107', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2473, '21', 'Pic', '107', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2472, '30', 'Pic', '107', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2471, '35', 'Pic', '107', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2470, '26', 'Mtr', '107', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2469, '31', 'Pic', '107', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2468, '33', 'Pic', '107', '0', '204', 'EBBE08426', '1', '11', NULL, '20', '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2466, '15', 'Pic', '107', '0', '364', 'GA250418FQ301787', '1', NULL, NULL, '740', '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2467, '2', 'Pic', '107', '0', '363', 'ZXHZBC7096', '1', NULL, NULL, '15.00', '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2465, '16', 'Mtr', '107', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2464, '19', 'Pic', '107', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 22:03:58', '2025-07-17 22:03:58'),
(2486, '23', 'Pic', '108', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2483, '16', 'Mtr', '108', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2482, '19', 'Pic', '108', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2481, '26', 'Mtr', '108', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2480, '31', 'Pic', '108', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2479, '33', 'Pic', '108', '0', '205', 'EBBE08439', '1', '11.50', NULL, '19.7', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2527, '1', 'Pic', '109', '0', '377', 'ZXHZAZ4435', '1', '2.7', '2.92', '2.22', '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2524, '21', 'Pic', '109', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2522, '23', 'Pic', '109', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2523, '20', 'Pic', '109', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2550, '26', 'Mtr', '111', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2549, '33', 'Pic', '111', '0', '208', 'EBBE08460', '1', '11', NULL, '20', '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2548, '31', 'Pic', '111', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2565, '19', 'Pic', '112', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2563, '23', 'Pic', '112', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2564, '16', 'Mtr', '112', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2580, '19', 'Pic', '114', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2579, '32', 'Pic', '114', '0', '256', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2578, '26', 'Mtr', '114', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2577, '33', 'Pic', '114', '0', '210', 'EBBE08454', '1', '7.10', NULL, '20', '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2596, '34', 'Pic', '117', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2593, '26', 'Mtr', '117', '0', '23', '0', '6.5', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2592, '31', 'Pic', '117', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2591, '33', 'Pic', '117', '0', '212', 'EBBD05541', '1', NULL, NULL, '21', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2609, '34', 'Pic', '118', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2607, '19', 'Pic', '118', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2606, '26', 'Mtr', '118', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2605, '33', 'Pic', '118', '0', '213', 'EBBD04824', '1', NULL, NULL, '21', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2442, '26', 'Mtr', '43', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2441, '23', 'Pic', '43', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2440, '19', 'Pic', '43', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2436, '26', 'Mtr', '44', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 20:01:51', '2025-07-17 20:01:51'),
(2439, '16', 'Mtr', '43', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2435, '42', 'Pic', '49', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-17 20:01:13', '2025-07-17 20:01:13'),
(2438, '34', 'Pic', '43', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2418, '42', 'Pic', '54', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-17 19:26:20', '2025-07-17 19:26:20'),
(2422, '35', 'Pic', '147', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-17 19:41:01', '2025-07-17 19:41:01'),
(2423, '30', 'Pic', '147', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 19:41:01', '2025-07-17 19:41:01'),
(3936, '1', 'Pic', '274', '0', '659', 'YXHZA04973', '1', NULL, NULL, '2.65', '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(2426, '20', 'Pic', '149', '1', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2427, '1', 'Pic', '149', '0', '365', 'ZXHZAM3590', '1', NULL, '3.07', '2.21', '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2428, '3', 'Pic', '149', '0', '366', 'AXHZAC2708', '1', NULL, '5.65', '27', '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2429, '15', 'Pic', '149', '0', '367', 'GA25418FQ301765', '1', NULL, NULL, '680', '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2430, '20', 'Pic', '149', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2431, '26', 'Mtr', '149', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2432, '23', 'Pic', '149', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2433, '19', 'Pic', '149', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(2434, '42', 'Pic', '151', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-17 19:59:05', '2025-07-17 19:59:05'),
(2443, '1', 'Pic', '43', '0', '368', 'ZXHZAZ4271', '1', '2.71', '2.46', '2.30', '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2444, '3', 'Pic', '43', '0', '369', 'AXHZZK6122', '1', '10.23', NULL, '2.94', '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(2445, '26', 'Mtr', '152', '1', '23', '0', '6.6', NULL, NULL, NULL, '2025-07-17 20:23:04', '2025-07-17 20:23:04'),
(2446, '37', 'Mtr', '152', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-17 20:23:04', '2025-07-17 20:23:04'),
(2447, '19', 'Pic', '154', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-17 20:29:27', '2025-07-17 20:29:27'),
(2448, '16', 'Mtr', '154', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 20:29:27', '2025-07-17 20:29:27'),
(2449, '23', 'Pic', '154', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 20:29:27', '2025-07-17 20:29:27'),
(2450, '34', 'Pic', '154', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 20:29:27', '2025-07-17 20:29:27'),
(2451, '42', 'Pic', '155', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-17 21:44:53', '2025-07-17 21:44:53'),
(2452, '21', 'Pic', '155', '1', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 21:44:53', '2025-07-17 21:44:53'),
(2453, '21', 'Pic', '155', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 21:44:53', '2025-07-17 21:44:53'),
(2454, '20', 'Pic', '155', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 21:44:53', '2025-07-17 21:44:53'),
(2455, '42', 'Pic', '156', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2456, '21', 'Pic', '156', '1', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2457, '21', 'Pic', '156', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2458, '20', 'Pic', '156', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2459, '3', 'Pic', '156', '0', '147', 'XXHXAH3386', '1', '9.11', '11.66', '20.0', '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2460, '3', 'Pic', '156', '0', '148', 'WXHXAV0741', '1', NULL, NULL, '30', '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2461, '16', 'Mtr', '156', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2462, '19', 'Pic', '156', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2463, '26', 'Mtr', '156', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 21:53:06', '2025-07-17 21:53:06'),
(2488, '20', 'Pic', '108', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2489, '30', 'Pic', '108', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2490, '21', 'Pic', '108', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2491, '1', 'Pic', '108', '0', '371', 'ZXHZBA9741', '1', NULL, '16.05', '3', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2492, '2', 'Pic', '108', '0', '372', 'ZXHZBC5461', '1', '2.9', '1.73', '16.00', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2493, '2', 'Pic', '108', '0', '373', 'ZXHZBC9604', '1', '2.9', '3.03', '16', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(2494, '20', 'Pic', '157', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:09:02', '2025-07-17 22:09:02'),
(2495, '21', 'Pic', '158', '1', '2', '0', '2', NULL, NULL, NULL, '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(2496, '21', 'Pic', '158', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(2497, '3', 'Pic', '158', '0', '374', 'ZXHZAY7595', '1', NULL, '10.58', '19', '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(2498, '3', 'Pic', '158', '0', '375', 'WXHXAV6195', '1', NULL, NULL, '19', '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(2499, '20', 'Pic', '158', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(2500, '21', 'Pic', '160', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:19:33', '2025-07-17 22:19:33'),
(2501, '34', 'Pic', '160', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:19:33', '2025-07-17 22:19:33'),
(2521, '33', 'Pic', '109', '0', '206', 'EBBE08457', '1', '11.50', NULL, '19.4', '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2520, '31', 'Pic', '109', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2519, '26', 'Mtr', '109', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2518, '34', 'Pic', '109', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2517, '19', 'Pic', '109', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2516, '16', 'Mtr', '109', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2528, '2', 'Pic', '109', '0', '378', 'ZXHZBC9569', '1', '8.23', '7.54', '16.00', '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2529, '2', 'Pic', '109', '0', '379', 'ZXHZBC9632', '1', '8.23', '7.54', '16.0', '2025-07-17 22:26:04', '2025-07-17 22:26:04'),
(2530, '3', 'Pic', '161', '0', '380', 'XXHXAI1095', '1', NULL, NULL, '30', '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2531, '15', 'Pic', '161', '0', '381', 'GA250418FQ301756', '1', NULL, NULL, '880', '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2532, '19', 'Pic', '161', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2533, '23', 'Pic', '161', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2534, '34', 'Pic', '161', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2535, '26', 'Mtr', '161', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(2540, '26', 'Mtr', '115', '1', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-17 22:27:15', '2025-07-17 22:27:15'),
(2706, '18', 'Pic', '121', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2554, '23', 'Pic', '111', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2555, '20', 'Pic', '111', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:39', '2025-07-17 22:33:39'),
(2556, '21', 'Pic', '111', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2557, '30', 'Pic', '111', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2558, '21', 'Pic', '111', '1', '2', '0', '2', NULL, NULL, NULL, '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2559, '1', 'Pic', '111', '0', '382', 'ZXHZAY9621', '1', '2.64', '2.9', '2.25', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2560, '2', 'Pic', '111', '0', '383', 'ZXHZBC9657', '1', '8.33', '7.5', '17', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2561, '2', 'Pic', '111', '0', '384', 'ZXHZBC0790', '1', NULL, NULL, '16.00', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2562, '15', 'Pic', '111', '0', '356', 'GA250418FQ301824', '1', NULL, NULL, '660', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(2570, '20', 'Pic', '112', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2571, '21', 'Pic', '112', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2572, '30', 'Pic', '112', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2573, '1', 'Pic', '112', '0', '385', 'ZXHZAY7512', '1', '2.75', '2.99', '2.27', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2574, '2', 'Pic', '112', '0', '386', 'ZXHZBC4646', '1', '7.58', '7.56', '16.00', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2575, '2', 'Pic', '112', '0', '387', 'ZXHZBC5488', '1', NULL, NULL, '16.00', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2576, '15', 'Pic', '112', '0', '388', 'GA250418FQ301818', '1', NULL, NULL, '620', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(2584, '20', 'Pic', '114', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:18', '2025-07-17 23:00:18'),
(2585, '21', 'Pic', '114', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2586, '30', 'Pic', '114', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2587, '1', 'Pic', '114', '0', '389', 'ZXHZBB5551', '1', '2.66', '2.94', '2.15', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2588, '3', 'Pic', '114', '0', '390', 'ZXHZBB5551', '1', '7.89', '11.45', '23.00', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2589, '3', 'Pic', '114', '0', '391', 'ZXHZBB2598', '1', NULL, NULL, '22.0', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2590, '15', 'Pic', '114', '0', '392', 'ZXHZBB5551', '1', NULL, NULL, '690', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(2597, '23', 'Pic', '117', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2598, '20', 'Pic', '117', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2599, '21', 'Pic', '117', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2600, '30', 'Pic', '117', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2601, '3', 'Pic', '117', '0', '393', 'WXHXA6656', '1', NULL, NULL, '25', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2602, '1', 'Pic', '117', '0', '394', 'ZXHZAN9213', '1', NULL, NULL, '2.5', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2603, '2', 'Pic', '117', '0', '395', 'ZXHZAH9226', '1', NULL, NULL, '16', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2604, '15', 'Pic', '117', '0', '396', 'GA240729FQ260159', '1', NULL, NULL, '730', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(2610, '23', 'Pic', '118', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2611, '20', 'Pic', '118', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2612, '21', 'Pic', '118', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2613, '30', 'Pic', '118', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2614, '1', 'Pic', '118', '0', '397', 'ZXHZAM3602', '1', NULL, NULL, '3.7', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2615, '2', 'Pic', '118', '0', '398', 'ZXHZAH9263', '1', NULL, NULL, '19.27', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2616, '3', 'Pic', '118', '0', '399', 'ZXHZAP6910', '1', NULL, NULL, '29.5', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2617, '15', 'Pic', '118', '0', '400', 'GA240407FQ239040', '1', NULL, NULL, '730', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(2663, '1', 'Pic', '119', '0', '402', 'ZXHZAN8707', '1', NULL, NULL, '2.21', '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2662, '16', 'Mtr', '119', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2661, '15', 'Pic', '119', '0', '401', 'GA240729FQ260146', '1', NULL, NULL, '600', '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2659, '26', 'Mtr', '119', '0', '23', '0', '6.5', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2660, '34', 'Pic', '119', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2658, '33', 'Pic', '119', '0', '214', 'EBBD05538', '1', NULL, NULL, '21', '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2657, '26', 'Mtr', '119', '1', '23', '0', '6.50', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2656, '19', 'Pic', '119', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2655, '20', 'Pic', '119', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2654, '30', 'Pic', '119', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2653, '21', 'Pic', '119', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2652, '34', 'Pic', '119', '1', '21', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2666, '23', 'Pic', '119', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-18 17:41:07', '2025-07-18 17:41:07'),
(2670, '35', 'Pic', '120', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2671, '30', 'Pic', '120', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2672, '21', 'Pic', '120', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2673, '20', 'Pic', '120', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2674, '1', 'Pic', '120', '0', '405', 'ZXHZBA4762', '1', '2.92', '2.83', '2.52', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2675, '3', 'Pic', '120', '0', '406', 'ZXHZAY5469', '1', '8.80', '11.59', '25.24', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2676, '3', 'Pic', '120', '0', '407', 'ZXHZA2218', '1', NULL, NULL, '24.25', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2677, '15', 'Pic', '120', '0', '408', 'GA241129FQ278390', '1', NULL, NULL, '840', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(2703, '2', 'Pic', '121', '0', '410', 'ZXHZBB7674', '1', '10.58', '8.81', '20.74', '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2702, '1', 'Pic', '121', '0', '409', 'ZXHZAV3852', '1', '3.18', '2.50', '2.06', '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2701, '20', 'Pic', '121', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2700, '21', 'Pic', '121', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2699, '30', 'Pic', '121', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2698, '35', 'Pic', '121', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2697, '33', 'Pic', '121', '0', '216', 'HPW-JL3621D06H2', '1', '11.70', NULL, '23.3', '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2696, '26', 'Mtr', '121', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2695, '26', 'Mtr', '121', '1', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2694, '32', 'Pic', '121', '0', '256', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2707, '34', 'Pic', '121', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2708, '23', 'Pic', '121', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2709, '19', 'Pic', '121', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-18 18:04:43', '2025-07-18 18:04:43'),
(2715, '3', 'Pic', '169', '0', '414', 'XXHXAG9857', '1', '11.83', '11.54', '24', '2025-07-19 22:02:18', '2025-07-19 22:02:18'),
(2714, '26', 'Mtr', '169', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-19 22:02:18', '2025-07-19 22:02:18'),
(2713, '34', 'Pic', '169', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-19 22:02:18', '2025-07-19 22:02:18'),
(2741, '26', 'Mtr', '170', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2740, '16', 'Mtr', '170', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2739, '15', 'Pic', '170', '0', '418', 'GA250418FQ301815', '1', NULL, NULL, '630', '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2738, '2', 'Pic', '170', '0', '417', 'ZXHZBC5343', '1', '8.41', '7.54', '15.5', '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2737, '2', 'Pic', '170', '0', '416', 'ZXHZBC5309', '1', '8.41', '7.54', '15', '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2736, '1', 'Pic', '170', '0', '415', 'ZXHZAY7659', '1', '2.76', '2.92', '2.35', '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2735, '20', 'Pic', '170', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2734, '21', 'Pic', '170', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2733, '30', 'Pic', '170', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2732, '35', 'Pic', '170', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2731, '31', 'Pic', '170', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2742, '34', 'Pic', '170', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2743, '23', 'Pic', '170', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2744, '19', 'Pic', '170', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2745, '33', 'Pic', '170', '0', '419', 'EBBE08463', '1', '11.30', NULL, '20', '2025-07-19 22:32:26', '2025-07-19 22:32:26'),
(2749, '26', 'Mtr', '171', '0', '23', '0', '7.50', NULL, NULL, NULL, '2025-07-19 22:36:11', '2025-07-19 22:36:11'),
(2748, '34', 'Pic', '171', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-19 22:36:11', '2025-07-19 22:36:11'),
(2750, '15', 'Pic', '172', '0', '420', 'GA250418FQ301767', '1', NULL, NULL, '610', '2025-07-19 23:32:08', '2025-07-19 23:32:08'),
(2751, '37', 'Mtr', '172', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-19 23:32:08', '2025-07-19 23:32:08'),
(2752, '33', 'Pic', '173', '0', '421', 'EBBB04994', '1', NULL, NULL, NULL, '2025-07-19 23:45:03', '2025-07-19 23:45:03'),
(2753, '32', 'Pic', '173', '0', '178', '0', '10', NULL, NULL, NULL, '2025-07-19 23:45:03', '2025-07-19 23:45:03'),
(2754, '18', 'Pic', '173', '0', '18', '0', NULL, NULL, NULL, NULL, '2025-07-19 23:45:03', '2025-07-19 23:45:03'),
(2755, '31', 'Pic', '174', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2756, '35', 'Pic', '174', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2757, '30', 'Pic', '174', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2758, '21', 'Pic', '174', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2759, '20', 'Pic', '174', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2760, '1', 'Pic', '174', '0', '422', 'ZXHZAZ2920', '1', '3.09', '3.01', '2.25', '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2761, '3', 'Pic', '174', '0', '423', 'ZXHZAY7615', '1', '9.10', '5.94', '23.70', '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2762, '33', 'Pic', '174', '0', '424', 'FBBD16087', '1', '12.5', NULL, '15', '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2763, '15', 'Pic', '174', '0', '425', 'GA241129FQ278421', '1', NULL, NULL, '700', '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2764, '16', 'Mtr', '174', '0', '58', '0', '4.50MTR', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2765, '37', 'Mtr', '174', '0', '370', '0', '5 MTR', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2766, '34', 'Pic', '174', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2767, '23', 'Pic', '174', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2768, '19', 'Pic', '174', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(2769, '21', 'Pic', '175', '0', '2', '0', 'M25150040', NULL, NULL, NULL, '2025-07-20 00:13:16', '2025-07-20 00:13:16'),
(2770, '42', 'Pic', '175', '0', '24', '0', '14W,11.50', NULL, NULL, NULL, '2025-07-20 00:13:16', '2025-07-20 00:13:16'),
(2863, '37', 'Mtr', '177', '0', '370', '0', '5', NULL, NULL, NULL, '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(2862, '16', 'Mtr', '177', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2861, '20', 'Pic', '177', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2860, '30', 'Pic', '177', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2858, '1', 'Pic', '177', '0', '426', 'ZXHZBA3320', '1', '2.84', '2.52', '2.1', '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2859, '31', 'Pic', '177', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2857, '35', 'Pic', '177', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2856, '21', 'Pic', '177', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2855, '3', 'Pic', '177', '0', '427', 'ZXHZBB2375', '1', '8.44', '5.65', '23.05', '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2854, '15', 'Pic', '177', '0', '428', 'GA241129FQ278419', '1', NULL, NULL, '630', '2025-07-20 00:57:48', '2025-07-20 00:57:48'),
(2864, '18', 'Pic', '177', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(2865, '23', 'Pic', '177', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(2866, '19', 'Pic', '177', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(2867, '33', 'Pic', '177', '0', '429', 'EBBD16090', '1', NULL, NULL, NULL, '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(3275, '19', 'Pic', '179', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3273, '35', 'Pic', '179', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3274, '23', 'Pic', '179', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3272, '30', 'Pic', '179', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3271, '21', 'Pic', '179', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3270, '20', 'Pic', '179', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3269, '1', 'Pic', '179', '0', '430', 'ZXHZAV7817', '1', '2.40', '2.49', '2.20', '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3268, '3', 'Pic', '179', '0', '431', 'ZXHZBD3709', '1', '8.40', '5.69', '25.26', '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3267, '15', 'Pic', '179', '0', '432', 'GA241129FQ278424', '1', NULL, NULL, '790', '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3266, '33', 'Pic', '179', '0', '433', 'EBBD16119', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3265, '16', 'Mtr', '179', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3264, '37', 'Mtr', '179', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3263, '34', 'Pic', '179', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(2899, '31', 'Pic', '180', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2900, '35', 'Pic', '180', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2901, '30', 'Pic', '180', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2902, '21', 'Pic', '180', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2903, '20', 'Pic', '180', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2904, '1', 'Pic', '180', '0', '434', 'ZXHZAM9893', '1', '2.84', '2.52', '2.10', '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2905, '3', 'Pic', '180', '0', '435', 'VXHXKY8287', '1', '8.44', '5.65', '23.05', '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2906, '33', 'Pic', '180', '0', '436', 'EBBD16109', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2907, '15', 'Pic', '180', '0', '437', 'GA230926FQ203999', '1', NULL, NULL, '630', '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2908, '16', 'Mtr', '180', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2909, '37', 'Mtr', '180', '0', '370', '0', '7.5', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2910, '18', 'Pic', '180', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2911, '23', 'Pic', '180', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2912, '19', 'Pic', '180', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(2913, '42', 'Pic', '180', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-20 01:20:04', '2025-07-20 01:20:04'),
(2914, '31', 'Pic', '181', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2915, '35', 'Pic', '181', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2916, '30', 'Pic', '181', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2917, '21', 'Pic', '181', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2918, '20', 'Pic', '181', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2919, '1', 'Pic', '181', '0', '438', 'ZXHZAV7705', '1', '2.10', '2.49', '1.70', '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2920, '3', 'Pic', '181', '0', '439', 'YXHZAI9581', '1', '10.89', '5.67', '30.01', '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2921, '33', 'Pic', '181', '0', '440', 'EBBD16074', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2922, '15', 'Pic', '181', '0', '441', 'GA241129FQ278423', '1', NULL, NULL, '800', '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2923, '16', 'Mtr', '181', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2924, '37', 'Mtr', '181', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2925, '34', 'Pic', '181', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2926, '23', 'Pic', '181', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2927, '19', 'Pic', '181', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(2928, '31', 'Pic', '182', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2929, '35', 'Pic', '182', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2930, '30', 'Pic', '182', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2931, '21', 'Pic', '182', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2932, '20', 'Pic', '182', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2933, '1', 'Pic', '182', '0', '442', 'ZXHZAV9900', '1', '2.90', '2.49', '1.84', '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2934, '3', 'Pic', '182', '0', '443', 'ZXHZAY1410', '1', '11.40', '5.72', '31.4', '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2935, '33', 'Pic', '182', '0', '444', 'EBBD05561', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2936, '15', 'Pic', '182', '0', '445', 'GA240719FQ258444', '1', NULL, NULL, '700', '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2937, '16', 'Mtr', '182', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2938, '37', 'Mtr', '182', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2939, '34', 'Pic', '182', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2940, '23', 'Pic', '182', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2941, '19', 'Pic', '182', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(2942, '31', 'Pic', '183', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2943, '35', 'Pic', '183', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2944, '30', 'Pic', '183', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2945, '21', 'Pic', '183', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2946, '20', 'Pic', '183', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2947, '1', 'Pic', '183', '0', '446', 'ZXHZAV3716', '1', '2.50', '2.50', '1.60', '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2948, '3', 'Pic', '183', '0', '447', 'ZXJZAY1479', '1', '10.90', '5.67', '31.04', '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2949, '33', 'Pic', '183', '0', '448', 'EBBD05553', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2950, '15', 'Pic', '183', '0', '449', 'GA240719FQ258443', '1', NULL, NULL, '640', '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2951, '16', 'Mtr', '183', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2952, '37', 'Mtr', '183', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2953, '34', 'Pic', '183', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09');
INSERT INTO `tbl_reports_items` (`id`, `scid`, `unit`, `report_id`, `dead_status`, `tblstock_id`, `sr_no`, `used_qty`, `amp`, `volt`, `watt`, `created_at`, `updated_at`) VALUES
(2954, '23', 'Pic', '183', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2955, '19', 'Pic', '183', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(2956, '21', 'Pic', '184', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2957, '1', 'Pic', '184', '0', '450', 'ZXHZAO3221', '1', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2958, '3', 'Pic', '184', '0', '451', 'ZXHZAN8350', '1', NULL, NULL, '31.16', '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2959, '33', 'Pic', '184', '0', '452', 'ebbd04859', '1', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2960, '15', 'Pic', '184', '0', '453', 'GA240407FQ239031', '1', NULL, NULL, '600', '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2961, '16', 'Mtr', '184', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2962, '37', 'Mtr', '184', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2963, '34', 'Pic', '184', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2964, '23', 'Pic', '184', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2965, '19', 'Pic', '184', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(2966, '21', 'Pic', '185', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2967, '3', 'Pic', '185', '0', '454', 'ZXHZAP0338', '1', NULL, NULL, '28.17', '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2968, '1', 'Pic', '185', '0', '455', 'ZXHZAO3055', '1', NULL, NULL, '2.57', '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2969, '33', 'Pic', '185', '0', '456', 'EBBD04858', '1', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2970, '15', 'Pic', '185', '0', '457', 'GA240407FQ239081', '1', NULL, NULL, '670', '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2971, '16', 'Mtr', '185', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2972, '37', 'Mtr', '185', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2973, '34', 'Pic', '185', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2974, '23', 'Pic', '185', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2975, '19', 'Pic', '185', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(2976, '21', 'Pic', '186', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2977, '3', 'Pic', '186', '0', '458', 'ZXHZAP6901', '1', NULL, NULL, '23.71', '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2978, '1', 'Pic', '186', '0', '459', 'ZXHZAO4055', '1', NULL, NULL, '2.50', '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2979, '33', 'Pic', '186', '0', '460', 'EBBD05576', '1', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2980, '15', 'Pic', '186', '0', '461', 'GA240407FQ239030', '1', NULL, NULL, '720', '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2981, '16', 'Mtr', '186', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2982, '37', 'Mtr', '186', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2983, '34', 'Pic', '186', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2984, '23', 'Pic', '186', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2985, '19', 'Pic', '186', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2986, '19', 'Pic', '186', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(2987, '21', 'Pic', '188', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2988, '3', 'Pic', '188', '0', '462', 'ZXHZAP049', '1', NULL, NULL, '28.12', '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2989, '1', 'Pic', '188', '0', '463', 'ZXHZAM9714', '1', NULL, NULL, '2.70', '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2990, '33', 'Pic', '188', '0', '464', 'EBBD05572', '1', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2991, '15', 'Pic', '188', '0', '465', 'GA240407FQ239033', '1', NULL, NULL, '600', '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2992, '16', 'Mtr', '188', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2993, '37', 'Mtr', '188', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2994, '34', 'Pic', '188', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2995, '23', 'Pic', '188', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2996, '19', 'Pic', '188', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(2997, '21', 'Pic', '189', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(2998, '1', 'Pic', '189', '0', '466', 'ZXHZAL9640', '1', NULL, NULL, '2.80', '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(2999, '3', 'Pic', '189', '0', '467', 'ZXHZAP6852', '1', NULL, NULL, '28.00', '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3000, '33', 'Pic', '189', '0', '468', 'EBBD05569', '1', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3001, '15', 'Pic', '189', '0', '469', 'GA240407FQ239037', '1', NULL, NULL, '650', '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3002, '16', 'Mtr', '189', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3003, '37', 'Mtr', '189', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3004, '34', 'Pic', '189', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3005, '23', 'Pic', '189', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3006, '19', 'Pic', '189', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(3007, '21', 'Pic', '190', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3008, '3', 'Pic', '190', '0', '470', 'ZXHZAP0373', '1', NULL, NULL, '28.05', '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3009, '1', 'Pic', '190', '0', '471', 'ZXHZAO2009', '1', NULL, NULL, '4.00', '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3010, '33', 'Pic', '190', '0', '472', 'EBBD05571', '1', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3011, '15', 'Pic', '190', '0', '473', 'GA240407FQ239032', '1', NULL, NULL, '700', '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3012, '16', 'Mtr', '190', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3013, '37', 'Mtr', '190', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3014, '34', 'Pic', '190', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3015, '23', 'Pic', '190', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3016, '19', 'Pic', '190', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(3017, '21', 'Pic', '191', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3018, '3', 'Pic', '191', '0', '474', 'ZXHZAP0395', '1', NULL, NULL, '27.00', '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3019, '1', 'Pic', '191', '0', '475', 'ZXHZAO3561', '1', NULL, NULL, '2.70', '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3020, '33', 'Pic', '191', '0', '476', 'EBBD05570', '1', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3021, '15', 'Pic', '191', '0', '477', 'GA240407FQ239052', '1', NULL, NULL, '800', '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3022, '16', 'Mtr', '191', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3023, '37', 'Mtr', '191', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3024, '34', 'Pic', '191', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3025, '23', 'Pic', '191', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3026, '19', 'Pic', '191', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(3027, '21', 'Pic', '192', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3028, '1', 'Pic', '192', '0', '478', 'ZXHZAL9161', '1', NULL, NULL, '4.00', '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3029, '3', 'Pic', '192', '0', '479', 'ZXHZAN8397', '1', NULL, NULL, '28.59', '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3030, '33', 'Pic', '192', '0', '480', 'EBBD05574', '1', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3031, '15', 'Pic', '192', '0', '481', 'GA240407FQ239035', '1', NULL, NULL, '840', '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3032, '16', 'Mtr', '192', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3033, '37', 'Mtr', '192', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3034, '34', 'Pic', '192', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3035, '23', 'Pic', '192', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3036, '19', 'Pic', '192', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(3037, '21', 'Pic', '193', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3038, '3', 'Pic', '193', '0', '482', 'ZXHZAP0382', '1', NULL, NULL, '31.4', '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3039, '1', 'Pic', '193', '0', '483', 'ZXHZAL9621', '1', NULL, NULL, '2.47', '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3040, '33', 'Pic', '193', '0', '484', 'EBBD05575', '1', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3041, '15', 'Pic', '193', '0', '485', 'GA240407FQ239080', '1', NULL, NULL, '860', '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3042, '16', 'Mtr', '193', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3043, '37', 'Mtr', '193', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3044, '34', 'Pic', '193', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3045, '23', 'Pic', '193', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3046, '19', 'Pic', '193', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(3047, '21', 'Pic', '194', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3048, '3', 'Pic', '194', '0', '486', 'ZXHZAP4227', '1', NULL, NULL, '26.00', '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3049, '1', 'Pic', '194', '0', '487', 'ZXHZAO3381', '1', NULL, NULL, '2.43', '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3050, '33', 'Pic', '194', '0', '488', 'EBBD04834', '1', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3051, '15', 'Pic', '194', '0', '489', 'GA240407FQ239082', '1', NULL, NULL, '820', '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3052, '16', 'Mtr', '194', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3053, '37', 'Mtr', '194', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3054, '34', 'Pic', '194', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3055, '23', 'Pic', '194', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3056, '19', 'Pic', '194', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(3057, '21', 'Pic', '195', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3058, '1', 'Pic', '195', '0', '490', 'YXHDAD3387', '1', NULL, NULL, '2.44', '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3059, '3', 'Pic', '195', '0', '491', 'ZXHZAB2915', '1', NULL, NULL, '27.21', '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3060, '33', 'Pic', '195', '0', '492', 'EBBD05573', '1', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3061, '15', 'Pic', '195', '0', '493', 'GA240407FQ239043', '1', NULL, NULL, '750', '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3062, '16', 'Mtr', '195', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3063, '37', 'Mtr', '195', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3064, '34', 'Pic', '195', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3065, '23', 'Pic', '195', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3066, '19', 'Pic', '195', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(3084, '23', 'Pic', '196', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3083, '34', 'Pic', '196', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3082, '37', 'Mtr', '196', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3081, '16', 'Mtr', '196', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3080, '15', 'Pic', '196', '0', '497', 'GA240407FQ239044', '1', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3079, '33', 'Pic', '196', '0', '496', 'HPW-JI2557D06H2', '1', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3078, '3', 'Pic', '196', '0', '495', 'ZXHZAB5516', '1', NULL, NULL, '28.4', '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3077, '21', 'Pic', '196', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3085, '19', 'Pic', '196', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3086, '1', 'Pic', '196', '0', '498', 'XXHXAI3268 (LD-12)', '1', NULL, NULL, '2.88', '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(3087, '21', 'Pic', '197', '0', '2', '0', '1', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3088, '3', 'Pic', '197', '0', '499', 'ZXHDAA3843', '1', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3089, '1', 'Pic', '197', '0', '500', 'YXHDAB6693', '1', NULL, NULL, '2.57', '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3090, '33', 'Pic', '197', '0', '501', 'HPW-JI2611D06H2', '1', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3091, '15', 'Pic', '197', '0', '502', 'GA240527FQ247910', '1', NULL, NULL, '660', '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3092, '16', 'Mtr', '197', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3093, '37', 'Mtr', '197', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3094, '34', 'Pic', '197', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3095, '23', 'Pic', '197', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3096, '19', 'Pic', '197', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(3125, '37', 'Mtr', '198', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3124, '16', 'Mtr', '198', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3123, '15', 'Pic', '198', '0', '506', 'GA240527FQ247911', '1', NULL, NULL, '840', '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3122, '33', 'Pic', '198', '0', '505', 'HPW-JI2614D06H2', '1', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3121, '1', 'Pic', '198', '0', '504', 'YXHZAO4951', '1', '2.26', '3.02', '2.86', '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3120, '3', 'Pic', '198', '0', '503', 'ZXHDAA3839', '1', '10.95', '5.66', '29.8', '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3119, '21', 'Pic', '198', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3685, '1', 'Pic', '212', '0', '508', 'YXHZAO3784', '1', '2.83', '3.01', '2.60', '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3686, '33', 'Pic', '212', '0', '511', 'HPW-J12586D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3687, '37', 'Mtr', '212', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3688, '21', 'Pic', '212', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3689, '23', 'Pic', '212', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3690, '34', 'Pic', '212', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3691, '35', 'Pic', '212', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3692, '16', 'Mtr', '212', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3693, '15', 'Pic', '212', '0', '510', 'GA240527FQ247922', '1', NULL, NULL, '810', '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3126, '34', 'Pic', '198', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3127, '23', 'Pic', '198', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3128, '19', 'Pic', '198', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 22:07:28', '2025-07-21 22:07:28'),
(3129, '26', 'Mtr', '214', '0', '23', '0', '7.5', NULL, NULL, NULL, '2025-07-21 22:07:37', '2025-07-21 22:07:37'),
(3694, '19', 'Pic', '212', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3141, '42', 'Pic', '215', '0', '24', '0', '3', NULL, NULL, NULL, '2025-07-21 22:11:56', '2025-07-21 22:11:56'),
(3181, '21', 'Pic', '217', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3180, '30', 'Pic', '217', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3179, '35', 'Pic', '217', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3178, '31', 'Pic', '217', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3682, '19', 'Pic', '218', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3681, '34', 'Pic', '218', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3680, '37', 'Mtr', '218', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3679, '16', 'Mtr', '218', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3678, '15', 'Pic', '218', '0', '515', 'GA240527FQ247916', '1', NULL, NULL, '900', '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3677, '33', 'Pic', '218', '0', '514', 'HPW-J12499D06H2', '1', NULL, NULL, '16', '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3182, '20', 'Pic', '217', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3183, '1', 'Pic', '217', '0', '516', 'ZXHZBA3051', '1', '3.40', '2.48', '2.60', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3184, '2', 'Pic', '217', '0', '517', 'ZXHZAH9983', '1', '9.10', '7.64', '18.10', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3185, '2', 'Pic', '217', '0', '518', 'ZXHZAH9251', '1', NULL, NULL, '17.10', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3186, '33', 'Pic', '217', '0', '519', 'EBBD16120', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3187, '15', 'Pic', '217', '0', '520', 'GA241129FQ278412', '1', NULL, NULL, '710', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3188, '16', 'Mtr', '217', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3189, '37', 'Mtr', '217', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3190, '34', 'Pic', '217', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3191, '23', 'Pic', '217', '0', '17', '0', '1', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3192, '19', 'Pic', '217', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(3193, '20', 'Pic', '219', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 22:29:23', '2025-07-21 22:29:23'),
(3194, '16', 'Mtr', '219', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 22:29:23', '2025-07-21 22:29:23'),
(3195, '18', 'Pic', '219', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-21 22:29:23', '2025-07-21 22:29:23'),
(3196, '21', 'Pic', '220', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3197, '3', 'Pic', '220', '0', '521', 'ZXHZA03657', '1', '11.07', '5.57', '30', '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3198, '1', 'Pic', '220', '0', '522', 'YXHZA03657', '1', '2.40', '2.94', '3', '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3199, '33', 'Pic', '220', '0', '523', 'HPW-J12203D06H2', '1', NULL, NULL, '16', '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3200, '15', 'Pic', '220', '0', '524', 'GA240527FQ247914', '1', NULL, NULL, '840', '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3201, '16', 'Mtr', '220', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3202, '37', 'Mtr', '220', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3203, '34', 'Pic', '220', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 22:31:14', '2025-07-21 22:31:14'),
(3237, '18', 'Pic', '221', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-21 22:45:07', '2025-07-21 22:45:07'),
(3235, '23', 'Pic', '221', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 22:45:07', '2025-07-21 22:45:07'),
(3236, '19', 'Pic', '221', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 22:45:07', '2025-07-21 22:45:07'),
(3234, '16', 'Mtr', '221', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-21 22:45:07', '2025-07-21 22:45:07'),
(3233, '20', 'Pic', '221', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 22:45:07', '2025-07-21 22:45:07'),
(3670, '23', 'Pic', '222', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3669, '21', 'Pic', '222', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3668, '3', 'Pic', '222', '0', '526', 'ZXHDAA3798', '1', '11.07', '5.57', '30', '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3667, '1', 'Pic', '222', '0', '527', 'YXHZA03657', '1', '2.40', '2.94', '3', '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3666, '33', 'Pic', '222', '0', '528', 'HPW-J12203D06H2', '1', NULL, NULL, '16', '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3665, '15', 'Pic', '222', '0', '529', 'GA240527FQ247914', '1', NULL, NULL, '840', '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3664, '16', 'Mtr', '222', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3249, '31', 'Pic', '223', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3250, '35', 'Pic', '223', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3251, '30', 'Pic', '223', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3252, '21', 'Pic', '223', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3253, '20', 'Pic', '223', '0', '1', '0', '2', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3254, '1', 'Pic', '223', '0', '530', 'ZXHZBA3116', '1', NULL, '2.99', '1.70', '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3255, '3', 'Pic', '223', '0', '531', 'ZXHZBC0388', '1', NULL, '5.73', '30.00', '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3256, '33', 'Pic', '223', '0', '532', 'EBBD03286', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3257, '15', 'Pic', '223', '0', '533', 'GA241129FQ278410', '1', NULL, NULL, '610', '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3258, '16', 'Mtr', '223', '0', '58', '0', '5', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3259, '37', 'Mtr', '223', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3260, '34', 'Pic', '223', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3261, '23', 'Pic', '223', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3262, '19', 'Pic', '223', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(3276, '31', 'Pic', '179', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-21 22:52:44', '2025-07-21 22:52:44'),
(3277, '21', 'Pic', '224', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 22:56:17', '2025-07-21 22:56:17'),
(3278, '3', 'Pic', '224', '0', '534', 'YXHZAJ9533', '1', NULL, NULL, NULL, '2025-07-21 22:56:17', '2025-07-21 22:56:17'),
(3279, '1', 'Pic', '224', '0', '535', 'YXHZAO4938', '1', NULL, NULL, NULL, '2025-07-21 22:56:17', '2025-07-21 22:56:17'),
(3283, '31', 'Pic', '225', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3284, '35', 'Pic', '225', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3285, '30', 'Pic', '225', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3286, '21', 'Pic', '225', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3287, '20', 'Pic', '225', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3288, '1', 'Pic', '225', '0', '536', 'ZXHZAV5082', '1', '2.75', '2.50', '2.15', '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3289, '2', 'Pic', '225', '0', '537', 'ZXHZBC9749', '1', '8.46', '7.48', '16.62', '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3290, '2', 'Pic', '225', '0', '538', 'ZXHZBB8122', '1', NULL, NULL, '16.10', '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3291, '33', 'Pic', '225', '0', '539', 'EBBD16069', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3292, '15', 'Pic', '225', '0', '540', 'GA241129FQ278354', '1', NULL, NULL, '630', '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3293, '16', 'Mtr', '225', '0', '58', '0', '5', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3294, '37', 'Mtr', '225', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3295, '18', 'Pic', '225', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3296, '23', 'Pic', '225', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3297, '19', 'Pic', '225', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(3298, '21', 'Pic', '226', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:03:57', '2025-07-21 23:03:57'),
(3299, '3', 'Pic', '226', '0', '541', 'YXHZAJ9533', '1', NULL, NULL, NULL, '2025-07-21 23:03:57', '2025-07-21 23:03:57'),
(3300, '1', 'Pic', '226', '0', '542', 'YXHZAO4938', '1', NULL, NULL, NULL, '2025-07-21 23:03:57', '2025-07-21 23:03:57'),
(3301, '31', 'Pic', '228', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3302, '35', 'Pic', '228', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3303, '30', 'Pic', '228', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3304, '21', 'Pic', '228', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3305, '20', 'Pic', '228', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3306, '1', 'Pic', '228', '0', '543', 'ZXHZAV5121', '1', '3.10', '2.86', '3.09', '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3307, '2', 'Pic', '228', '0', '544', 'ZXHZBC9879', '1', '8.86', '7.52', '16.50', '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3308, '2', 'Pic', '228', '0', '545', 'ZXHZBB9122', '1', NULL, NULL, '17.00', '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3309, '33', 'Pic', '228', '0', '546', 'EBBD16067', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3310, '15', 'Pic', '228', '0', '547', 'GA241129FQ278356', '1', NULL, NULL, '740', '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3311, '16', 'Mtr', '228', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3312, '37', 'Mtr', '228', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3313, '18', 'Pic', '228', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3314, '34', 'Pic', '228', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3315, '23', 'Pic', '228', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3316, '19', 'Pic', '228', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(3653, '16', 'Mtr', '230', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3661, '34', 'Pic', '229', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3660, '3', 'Pic', '229', '0', '548', 'YXHZAJ9533', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3659, '1', 'Pic', '229', '0', '549', 'YXHZAO4938', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3655, '23', 'Pic', '229', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3656, '16', 'Mtr', '229', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3657, '21', 'Pic', '229', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3658, '15', 'Pic', '229', '0', '550', 'GA230926FQ209337', '1', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3654, '37', 'Mtr', '229', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:16:40', '2025-07-22 00:16:40'),
(3652, '15', 'Pic', '230', '0', '553', 'GA230926FQ209342', '1', NULL, NULL, '350', '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3651, '1', 'Pic', '230', '0', '552', 'YXHZAP5675', '1', NULL, NULL, '2.06', '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3649, '21', 'Pic', '230', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3650, '3', 'Pic', '230', '0', '551', 'XXHXAI1948', '1', NULL, NULL, '29.05', '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3358, '31', 'Pic', '231', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3359, '35', 'Pic', '231', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3360, '30', 'Pic', '231', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3361, '21', 'Pic', '231', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3362, '20', 'Pic', '231', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3363, '1', 'Pic', '231', '0', '554', 'ZXHZAV9973', '1', '2.63', '2.48', '2.22', '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3364, '2', 'Pic', '231', '0', '555', 'ZXHZBD3404', '1', '8.81', '7.50', '18.24', '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3365, '2', 'Pic', '231', '0', '556', 'ZXHZBC9620', '1', NULL, NULL, '18.03', '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3366, '33', 'Pic', '231', '0', '557', 'EBBD03259', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3367, '15', 'Pic', '231', '0', '558', 'GA240407FQ239069', '1', NULL, NULL, '620', '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3368, '16', 'Mtr', '231', '0', '58', '0', '5', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3369, '37', 'Mtr', '231', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3370, '34', 'Pic', '231', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3371, '23', 'Pic', '231', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3372, '19', 'Pic', '231', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(3647, '37', 'Mtr', '230', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3648, '34', 'Pic', '230', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3646, '23', 'Pic', '230', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:25', '2025-07-22 00:16:25'),
(3381, '21', 'Pic', '232', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:24:02', '2025-07-21 23:24:02'),
(3382, '3', 'Pic', '232', '0', '559', 'YXHZAJ9272', '1', NULL, NULL, NULL, '2025-07-21 23:24:02', '2025-07-21 23:24:02'),
(3383, '21', 'Pic', '233', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:26:37', '2025-07-21 23:26:37'),
(3384, '3', 'Pic', '233', '0', '560', 'YXHZAJ9272', '1', NULL, NULL, NULL, '2025-07-21 23:26:37', '2025-07-21 23:26:37'),
(3385, '31', 'Pic', '234', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:29', '2025-07-21 23:28:29'),
(3386, '35', 'Pic', '234', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:29', '2025-07-21 23:28:29'),
(3387, '30', 'Pic', '234', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3388, '21', 'Pic', '234', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3389, '20', 'Pic', '234', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3390, '1', 'Pic', '234', '0', '561', 'ZXHZAV6545', '1', '2.92', '3.01', '2.51', '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3391, '2', 'Pic', '234', '0', '562', 'ZXHZBB7802', '1', '8.90', '7.47', '18.30', '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3392, '2', 'Pic', '234', '0', '563', 'ZXHZBC0261', '1', NULL, NULL, '18.51', '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3393, '33', 'Pic', '234', '0', '564', 'EBBD16060', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3394, '15', 'Pic', '234', '0', '565', 'GA241129FQ278367', '1', NULL, NULL, '610', '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3395, '16', 'Mtr', '234', '0', '58', '0', '5', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3396, '37', 'Mtr', '234', '0', '370', '0', '7.5', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3397, '18', 'Pic', '234', '0', '18', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3398, '23', 'Pic', '234', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3399, '19', 'Pic', '234', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(3400, '31', 'Pic', '235', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3401, '35', 'Pic', '235', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3402, '30', 'Pic', '235', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3403, '21', 'Pic', '235', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3404, '20', 'Pic', '235', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3405, '1', 'Pic', '235', '0', '566', 'ZXHZBA3040', '1', '3.05', '2.50', '1.90', '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3406, '2', 'Pic', '235', '0', '567', 'ZXHZAI3795', '1', '10.30', '7.53', '18.35', '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3407, '2', 'Pic', '235', '0', '568', 'ZXHZAI3771', '1', NULL, NULL, '18.30', '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3408, '33', 'Pic', '235', '0', '569', 'EBBD16122', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3409, '15', 'Pic', '235', '0', '570', 'GA241129FQ278411', '1', NULL, NULL, '670', '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3410, '16', 'Mtr', '235', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3411, '37', 'Mtr', '235', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3412, '34', 'Pic', '235', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3413, '23', 'Pic', '235', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3414, '19', 'Pic', '235', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(3415, '21', 'Pic', '236', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3416, '3', 'Pic', '236', '0', '571', 'YXHZAD8496', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3417, '1', 'Pic', '236', '0', '572', 'YXHZAN7298', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3418, '33', 'Pic', '236', '0', '573', 'EBBB07596', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3419, '15', 'Pic', '236', '0', '574', 'GA230926FQ209367', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3420, '16', 'Mtr', '236', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3421, '34', 'Pic', '236', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3422, '23', 'Pic', '236', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3423, '19', 'Pic', '236', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3424, '37', 'Mtr', '236', '0', '370', '0', '6', NULL, NULL, NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(3644, '34', 'Pic', '237', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3642, '3', 'Pic', '237', '0', '575', 'YXHZAJ9272', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3643, '21', 'Pic', '237', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3641, '15', 'Pic', '237', '0', '576', 'GA230926FQ209340', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3640, '16', 'Mtr', '237', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3432, '21', 'Pic', '238', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3433, '1', 'Pic', '238', '0', '577', 'ZXHZAO3961', '1', NULL, NULL, '2.79', '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3434, '3', 'Pic', '238', '0', '578', 'ZXHZAB5154', '1', NULL, NULL, '30', '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3435, '33', 'Pic', '238', '0', '579', 'EBBD04870', '1', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3436, '15', 'Pic', '238', '0', '580', 'GA240407FQ239087', '1', NULL, NULL, '850', '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3437, '16', 'Mtr', '238', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3438, '37', 'Mtr', '238', '0', '370', '0', '13', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3439, '34', 'Pic', '238', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3440, '23', 'Pic', '238', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3441, '19', 'Pic', '238', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3442, '19', 'Pic', '238', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(3628, '34', 'Pic', '239', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3626, '37', 'Mtr', '239', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3627, '23', 'Pic', '239', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3624, '3', 'Pic', '239', '0', '581', 'YXHZAK1983', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3625, '21', 'Pic', '239', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3623, '1', 'Pic', '239', '0', '582', 'YXHZAO3635', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3622, '33', 'Pic', '239', '0', '583', 'I-J01547D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3452, '21', 'Pic', '240', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3453, '1', 'Pic', '240', '0', '585', 'YXHXAA0858', '1', NULL, NULL, '2.35', '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3454, '3', 'Pic', '240', '0', '586', 'ZXHZAB5526', '1', NULL, NULL, '27.50', '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3455, '33', 'Pic', '240', '0', '587', 'HPW-JI2425D06H2', '1', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3456, '15', 'Pic', '240', '0', '588', 'GA240407FQ239046', '1', NULL, NULL, '680', '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3457, '16', 'Mtr', '240', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3458, '37', 'Mtr', '240', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3459, '34', 'Pic', '240', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3460, '23', 'Pic', '240', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3461, '19', 'Pic', '240', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(3462, '21', 'Pic', '241', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3463, '1', 'Pic', '241', '0', '589', 'YXHZAP2318', '1', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3464, '3', 'Pic', '241', '0', '590', 'YXHZAJ9451', '1', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3465, '33', 'Pic', '241', '0', '591', 'HPW-JG2046D06H2', '1', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3466, '15', 'Pic', '241', '0', '592', 'GA230926FQ209343', '1', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3467, '16', 'Mtr', '241', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(3468, '37', 'Mtr', '241', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 23:53:26', '2025-07-21 23:53:26'),
(3469, '34', 'Pic', '241', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:53:26', '2025-07-21 23:53:26'),
(3470, '23', 'Pic', '241', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:53:26', '2025-07-21 23:53:26'),
(3471, '19', 'Pic', '241', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-21 23:53:26', '2025-07-21 23:53:26'),
(3472, '21', 'Pic', '242', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3473, '1', 'Pic', '242', '0', '593', 'YXHDAD3502', '1', NULL, NULL, '2.85', '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3474, '3', 'Pic', '242', '0', '594', 'ZXHZAB2954', '1', NULL, NULL, '27.4', '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3475, '33', 'Pic', '242', '0', '595', 'HPW-JI2641D6H2', '1', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3476, '15', 'Pic', '242', '0', '596', 'GA240407FQ239045', '1', NULL, NULL, '860', '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3477, '16', 'Mtr', '242', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3478, '37', 'Mtr', '242', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3479, '34', 'Pic', '242', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3480, '23', 'Pic', '242', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3481, '19', 'Pic', '242', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(3482, '21', 'Pic', '243', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3483, '3', 'Pic', '243', '0', '597', 'ZXHDAA3834', '1', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3484, '1', 'Pic', '243', '0', '598', '1', '1', NULL, NULL, '2.90', '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3485, '33', 'Pic', '243', '0', '599', 'GI2583D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3486, '15', 'Pic', '243', '0', '600', 'GA240527FQ247909', '1', NULL, NULL, '700', '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3487, '16', 'Mtr', '243', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3488, '37', 'Mtr', '243', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3489, '34', 'Pic', '243', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3490, '23', 'Pic', '243', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3491, '19', 'Pic', '243', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(3492, '21', 'Pic', '246', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3493, '3', 'Pic', '246', '0', '601', 'ZXHZAB5034', '1', NULL, NULL, '28.30', '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3494, '1', 'Pic', '246', '0', '602', 'YXHXAA0074', '1', NULL, NULL, '2.50', '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3495, '33', 'Pic', '246', '0', '603', 'GI2526D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3496, '15', 'Pic', '246', '0', '604', 'GA240407FQ239047', '1', NULL, NULL, '650', '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3497, '16', 'Mtr', '246', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3498, '37', 'Mtr', '246', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3499, '34', 'Pic', '246', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3500, '23', 'Pic', '246', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3501, '19', 'Pic', '246', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(3696, '33', 'Pic', '247', '0', '605', 'EBBE08446', '1', '10.20', NULL, '23.5', '2025-07-22 00:18:39', '2025-07-22 00:18:39'),
(3695, '26', 'Mtr', '247', '0', '23', '0', NULL, NULL, NULL, NULL, '2025-07-22 00:18:39', '2025-07-22 00:18:39'),
(3621, '15', 'Pic', '239', '0', '584', 'GA230926FQ209338', '1', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3620, '16', 'Mtr', '239', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:15:37', '2025-07-22 00:15:37'),
(3639, '37', 'Mtr', '237', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3663, '37', 'Mtr', '222', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3662, '34', 'Pic', '222', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3547, '21', 'Pic', '248', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3548, '3', 'Pic', '248', '0', '606', 'ZXHDAA3838', '1', NULL, NULL, '27.66', '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3549, '1', 'Pic', '248', '0', '607', 'YXHZAB5492', '1', NULL, NULL, '2.60', '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3550, '33', 'Pic', '248', '0', '608', 'HPW-JI2604D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3551, '15', 'Pic', '248', '0', '609', 'GA240527FQ247915', '1', NULL, NULL, '820', '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3552, '16', 'Mtr', '248', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3553, '37', 'Mtr', '248', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3554, '34', 'Pic', '248', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3555, '23', 'Pic', '248', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3556, '19', 'Pic', '248', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3557, '19', 'Pic', '248', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(3676, '1', 'Pic', '218', '0', '513', 'YXHDAD3381', '1', '2.44', '2.89', '2.32', '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3674, '21', 'Pic', '218', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:04', '2025-07-22 00:17:04'),
(3675, '3', 'Pic', '218', '0', '512', 'ZXHZAA78914', '1', '10.93', '5.71', '30', '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3673, '23', 'Pic', '218', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:04', '2025-07-22 00:17:04'),
(3684, '3', 'Pic', '212', '0', '509', 'ZXHZAB7052', '1', '10.30', '6.01', '28.30', '2025-07-22 00:17:18', '2025-07-22 00:17:18'),
(3635, '37', 'Mtr', '249', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3634, '16', 'Mtr', '249', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3633, '15', 'Pic', '249', '0', '613', 'GA230926FQ209339', '1', NULL, NULL, '400', '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3632, '33', 'Pic', '249', '0', '612', 'HPW-101524D06H2', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3631, '1', 'Pic', '249', '0', '611', 'YXHZAO4996', '1', '2.81', '2.59', '2.03', '2025-07-22 00:16:07', '2025-07-22 00:16:07');
INSERT INTO `tbl_reports_items` (`id`, `scid`, `unit`, `report_id`, `dead_status`, `tblstock_id`, `sr_no`, `used_qty`, `amp`, `volt`, `watt`, `created_at`, `updated_at`) VALUES
(3630, '3', 'Pic', '249', '0', '610', 'YXHZAJ9532', '1', '10.40', '5.65', '30.07', '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3629, '21', 'Pic', '249', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3636, '34', 'Pic', '249', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3637, '23', 'Pic', '249', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3638, '19', 'Pic', '249', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3645, '23', 'Pic', '237', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:07', '2025-07-22 00:16:07'),
(3671, '19', 'Pic', '222', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3672, '35', 'Pic', '222', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 00:16:52', '2025-07-22 00:16:52'),
(3683, '35', 'Pic', '218', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 00:17:05', '2025-07-22 00:17:05'),
(3697, '21', 'Pic', '250', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:21:29', '2025-07-22 00:21:29'),
(3698, '3', 'Pic', '250', '0', '589', 'YXHZAP2318', '1', NULL, NULL, '27.00', '2025-07-22 00:21:29', '2025-07-22 00:21:29'),
(3699, '1', 'Pic', '250', '0', '590', 'YXHZAJ9451', '1', NULL, NULL, '2.00', '2025-07-22 00:21:29', '2025-07-22 00:21:29'),
(3700, '21', 'Pic', '251', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:26:04', '2025-07-22 00:26:04'),
(3701, '32', 'Pic', '252', '0', '178', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3702, '35', 'Pic', '252', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3703, '30', 'Pic', '252', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3704, '21', 'Pic', '252', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3705, '1', 'Pic', '252', '0', '616', 'ZXHZAV00489', '1', '3.21', '2.50', '2.50', '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3706, '3', 'Pic', '252', '0', '617', 'ZXHZAY1480', '1', '8.40', '11.40', '23', '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3707, '3', 'Pic', '252', '0', '618', 'ZXHZAY0485', '1', '8.40', '11.40', '23.11', '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3708, '33', 'Pic', '252', '0', '619', 'EBBE08447', '1', '8.50', NULL, '23.5', '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3709, '15', 'Pic', '252', '0', '620', 'GA240719FQ258455', '1', NULL, NULL, '710', '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3710, '16', 'Mtr', '252', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3711, '37', 'Mtr', '252', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3712, '23', 'Pic', '252', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(3713, '34', 'Pic', '252', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:04', '2025-07-22 00:35:04'),
(3714, '19', 'Pic', '252', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 00:35:04', '2025-07-22 00:35:04'),
(3715, '20', 'Pic', '252', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:04', '2025-07-22 00:35:04'),
(3716, '19', 'Pic', '252', '1', '219', '0', '1', NULL, NULL, NULL, '2025-07-22 00:35:04', '2025-07-22 00:35:04'),
(3717, '16', 'Mtr', '252', '1', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 00:35:04', '2025-07-22 00:35:04'),
(3777, '21', 'Pic', '255', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3775, '23', 'Pic', '255', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3776, '19', 'Pic', '255', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3774, '23', 'Pic', '255', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3724, '21', 'Pic', '254', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 00:47:25', '2025-07-22 00:47:25'),
(3725, '3', 'Pic', '254', '0', '598', '1', '1', NULL, NULL, NULL, '2025-07-22 00:47:25', '2025-07-22 00:47:25'),
(3773, '37', 'Mtr', '255', '0', '370', '0', '6.5', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3772, '21', 'Pic', '255', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3771, '16', 'Mtr', '255', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-22 01:00:38', '2025-07-22 01:00:38'),
(3816, '1', 'Pic', '256', '0', '623', 'ZXHZAV3840', '1', '3.02', '2.51', '2.50', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3817, '3', 'Pic', '256', '0', '273', 'ZXHZAY1409', '1', '8.75', '11.45', '24.20', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3818, '33', 'Pic', '256', '0', '625', 'EBBD16077', '1', '8.50', NULL, '20', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3815, '34', 'Pic', '256', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3814, '37', 'Mtr', '256', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3813, '20', 'Pic', '256', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3812, '16', 'Mtr', '256', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3811, '21', 'Pic', '256', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3810, '35', 'Pic', '256', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3809, '30', 'Pic', '256', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3807, '3', 'Pic', '256', '0', '624', 'ZXHZAX8666', '1', '8.75', '11.45', '22.90', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3808, '31', 'Pic', '256', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3806, '19', 'Pic', '256', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3805, '23', 'Pic', '256', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3819, '15', 'Pic', '256', '0', '626', 'GA240719FQ258487', '1', NULL, NULL, '590', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(3820, '31', 'Pic', '257', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3821, '35', 'Pic', '257', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3822, '30', 'Pic', '257', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3823, '21', 'Pic', '257', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3824, '20', 'Pic', '257', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3825, '1', 'Pic', '257', '0', '627', 'ZXHZAV4397', '1', '3.50', '2.51', '2.50', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3826, '3', 'Pic', '257', '0', '628', 'ZXHZAY1392', '1', '7.40', '11.56', '25', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3827, '3', 'Pic', '257', '0', '629', 'ZXHZAY1446', '1', '7.40', '11.56', '25.11', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3828, '33', 'Pic', '257', '0', '630', 'EBBC05696', '1', '9.50', NULL, '20', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3829, '15', 'Pic', '257', '0', '631', 'GA240729FQ260166', '1', NULL, NULL, '900', '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3830, '16', 'Mtr', '257', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3831, '37', 'Mtr', '257', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3832, '34', 'Pic', '257', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3833, '23', 'Pic', '257', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3834, '19', 'Pic', '257', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(3835, '31', 'Pic', '259', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3836, '35', 'Pic', '259', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3837, '30', 'Pic', '259', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3838, '21', 'Pic', '259', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3839, '20', 'Pic', '259', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3840, '1', 'Pic', '259', '0', '632', 'ZXHZAV3847', '1', '2.89', '2.51', '2.05', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3841, '3', 'Pic', '259', '0', '633', 'ZXHZAY1412', '1', '8.70', '11.63', '23.15', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3842, '3', 'Pic', '259', '0', '634', 'ZXHZAY1373', '1', '8.70', '11.63', '23.32', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3843, '33', 'Pic', '259', '0', '635', 'EBBD16108', '1', '9', NULL, '21.20', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3844, '15', 'Pic', '259', '0', '636', 'GA240719FQ258486', '1', NULL, NULL, '630', '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3845, '16', 'Mtr', '259', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3846, '37', 'Mtr', '259', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3847, '34', 'Pic', '259', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3848, '23', 'Pic', '259', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3849, '19', 'Pic', '259', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3850, '37', 'Mtr', '259', '1', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(3851, '31', 'Pic', '261', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:13', '2025-07-22 01:25:13'),
(3852, '35', 'Pic', '261', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3853, '30', 'Pic', '261', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3854, '21', 'Pic', '261', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3855, '20', 'Pic', '261', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3856, '1', 'Pic', '261', '0', '637', 'ZXHZAV4435', '1', '2.90', '2.48', '2.04', '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3857, '3', 'Pic', '261', '0', '638', 'ZXHZAV4550', '1', '8.72', '11.53', '23.60', '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3858, '3', 'Pic', '261', '0', '639', 'ZXHZAV4518', '1', '8.72', '11.53', '22', '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3859, '33', 'Pic', '261', '0', '640', 'EBBD16082', '1', '8', NULL, '21.50', '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3860, '15', 'Pic', '261', '0', '641', 'GA240719FQ258472', '1', NULL, NULL, '730', '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3861, '16', 'Mtr', '261', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3862, '37', 'Mtr', '261', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3863, '34', 'Pic', '261', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3864, '23', 'Pic', '261', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3865, '19', 'Pic', '261', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(3921, '34', 'Pic', '262', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3920, '33', 'Pic', '262', '0', '644', 'HPW-JG1992D06H2', '1', NULL, NULL, '22', '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3919, '31', 'Pic', '262', '0', '257', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3918, '30', 'Pic', '262', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3917, '23', 'Pic', '262', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3916, '21', 'Pic', '262', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3915, '20', 'Pic', '262', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:29', '2025-07-22 22:52:29'),
(3914, '19', 'Pic', '262', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:29', '2025-07-22 22:52:29'),
(3913, '16', 'Mtr', '262', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:52:29', '2025-07-22 22:52:29'),
(3912, '15', 'Pic', '262', '0', '643', 'Q209335', '1', NULL, NULL, '650', '2025-07-22 22:52:29', '2025-07-22 22:52:29'),
(3911, '1', 'Pic', '262', '0', '642', 'YXHZAO4965', '1', NULL, NULL, '3.50', '2025-07-22 22:52:29', '2025-07-22 22:52:29'),
(3897, '20', 'Pic', '265', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3896, '19', 'Pic', '265', '0', '219', '0', '2', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3895, '16', 'Mtr', '265', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3894, '15', 'Pic', '265', '0', '651', 'GA240527FQ247931', '1', NULL, NULL, '720', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3893, '1', 'Pic', '265', '0', '650', 'YXHZAP3656', '1', NULL, NULL, '2.75', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3940, '20', 'Pic', '274', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3941, '21', 'Pic', '274', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3898, '21', 'Pic', '265', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3899, '23', 'Pic', '265', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3900, '30', 'Pic', '265', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3901, '33', 'Pic', '265', '0', '652', 'EBBD05580', '1', NULL, NULL, '21', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3902, '34', 'Pic', '265', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3903, '37', 'Mtr', '265', '0', '370', '0', '6.50', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3904, '2', 'Pic', '265', '0', '653', 'ZXHZAI7521', '1', NULL, NULL, '19', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3905, '3', 'Pic', '265', '0', '654', 'ZXHZAB6466', '1', NULL, NULL, '29', '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3906, '35', 'Pic', '265', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(3907, '1', 'Pic', '266', '0', '655', 'ZXHZAM3597', '1', NULL, NULL, '2.63', '2025-07-22 22:48:40', '2025-07-22 22:48:40'),
(3908, '15', 'Pic', '266', '0', '656', 'GA240407FQ239039', '1', NULL, NULL, '730', '2025-07-22 22:48:40', '2025-07-22 22:48:40'),
(3909, '16', 'Mtr', '266', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:48:40', '2025-07-22 22:48:40'),
(3910, '16', 'Mtr', '267', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:52:13', '2025-07-22 22:52:13'),
(3922, '35', 'Pic', '262', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3923, '37', 'Mtr', '262', '0', '370', '0', '7.50', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3924, '3', 'Pic', '262', '0', '645', 'YXHDA64092', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3925, '2', 'Pic', '262', '0', '657', 'ZXHZA60067', '1', NULL, NULL, NULL, '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(3926, '16', 'Mtr', '268', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:53:41', '2025-07-22 22:53:41'),
(3927, '1', 'Pic', '269', '0', '658', 'YXHZAP6220', '1', NULL, NULL, NULL, '2025-07-22 22:55:34', '2025-07-22 22:55:34'),
(3928, '16', 'Mtr', '270', '0', '58', '0', '4.50', NULL, NULL, NULL, '2025-07-22 22:57:25', '2025-07-22 22:57:25'),
(3937, '15', 'Pic', '274', '0', '660', 'GA240527FQ247937', '1', NULL, NULL, '600', '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3942, '23', 'Pic', '274', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3943, '30', 'Pic', '274', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3944, '31', 'Pic', '274', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3945, '34', 'Pic', '274', '0', '21', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3946, '35', 'Pic', '274', '0', '4', '0', '1', NULL, NULL, NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(3947, '37', 'Mtr', '274', '0', '370', '0', '7.5', NULL, NULL, NULL, '2025-07-23 00:35:38', '2025-07-23 00:35:38'),
(3970, '31', 'Pic', '276', '0', '177', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3969, '30', 'Pic', '276', '0', '3', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3968, '23', 'Pic', '276', '0', '525', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3967, '21', 'Pic', '276', '0', '507', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3966, '20', 'Pic', '276', '0', '1', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3965, '19', 'Pic', '276', '0', '219', '0', '1', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3964, '16', 'Mtr', '276', '0', '58', '0', '4.5', NULL, NULL, NULL, '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3963, '15', 'Pic', '276', '0', '666', 'GA230926FQ205347', '1', NULL, NULL, '500', '2025-07-23 01:03:08', '2025-07-23 01:03:08'),
(3962, '1', 'Pic', '276', '0', '665', 'YXHZAP6120', '1', NULL, NULL, '2.21', '2025-07-23 01:03:08', '2025-07-23 01:03:08');

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
(5, '5', '2025-07-11', 8, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-12 20:27:59', '2025-07-12 20:27:59'),
(8, '6', '2025-07-15', 1, '0', '0', 180000.00, 0.00, 0.00, 180000.00, NULL, '2025-07-16 01:07:43', '2025-07-16 01:07:43'),
(9, '7', '2025-07-22', 8, '2', '0', 0.00, 0.00, 0.00, 0.00, 'Back Proper', '2025-07-22 00:02:59', '2025-07-22 18:55:23'),
(10, '8', '2025-07-21', 17, '2', '0', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-22 00:07:32', '2025-07-22 00:07:32'),
(11, '9', '2025-07-22', 1, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-23 00:08:30', '2025-07-23 00:08:30'),
(12, '10', '2025-07-22', 19, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-07-23 01:18:59', '2025-07-23 01:18:59');

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
(6, '5', '5', '47', '1', '4', 'Pic', '10BK19C18', '1', '0', '0', 0.00, '0', '2025-07-12 20:27:59', '2025-07-12 20:27:59'),
(9, '8', '6', '91', '1', '6', 'Pic', 'K25210298', '1', '90000', '0', 90000.00, '0', '2025-07-16 01:07:43', '2025-07-16 01:07:43'),
(10, '8', '6', '110', '1', '6', 'Pic', 'K25210316', '1', '90000', '0', 90000.00, '0', '2025-07-16 01:07:43', '2025-07-16 01:07:43'),
(11, '9', '7', '245', '1', '4', 'Pic', 'C02201003', '1', '0', '0', 0.00, '0', '2025-07-22 00:02:59', '2025-07-22 00:02:59'),
(13, '10', '8', '244', '1', '5', 'Pic', 'C22301037', '1', '0', '0', 0.00, '0', '2025-07-22 00:07:32', '2025-07-22 00:07:32'),
(14, '11', '9', '42', '1', '4', 'Pic', 'C02309007', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:30', '2025-07-23 00:08:30'),
(15, '11', '9', '43', '1', '6', 'Pic', 'K25210187', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:30', '2025-07-23 00:08:30'),
(16, '11', '9', '44', '1', '6', 'Pic', 'K24210207', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(17, '11', '9', '46', '1', '6', 'Pic', 'M24210083', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(18, '11', '9', '49', '1', '6', 'Pic', 'M2404210051', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(19, '11', '9', '50', '1', '6', 'Pic', 'K25210284', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(20, '11', '9', '164', '1', '6', 'Pic', 'M2404210059', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(21, '11', '9', '167', '1', '6', 'Pic', 'C25210218', '1', '0', '0', 0.00, '0', '2025-07-23 00:08:31', '2025-07-23 00:08:31'),
(22, '12', '10', '64', '1', '4', 'Pic', 'C150329220519', '1', '0', '0', 0.00, '0', '2025-07-23 01:18:59', '2025-07-23 01:18:59');

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
(1, '2025-06-27', '1', '1', 'C25210292', '1', '6', 1, 'Pic', 90000.00, 'abc', '2025-06-27 17:41:33', '2025-06-27 17:41:33'),
(2, '2025-07-19', '1', '6', 'K25210298', '1', '6', 1, 'Pic', 90000.00, 'Oower Off', '2025-07-19 19:00:40', '2025-07-19 19:00:40');

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
(1, '2025-06-09', '2', 7, 20, '0', 181, 217200.00, 1200.00, '1', '0', '2025-06-17 01:45:52', '2025-07-14 23:36:56'),
(2, '2025-06-09', '2', 7, 21, '0', 107, 117700.00, 1100.00, '1', NULL, '2025-06-17 01:47:16', '2025-06-17 02:01:36'),
(3, '2025-06-09', '2', 7, 30, '0', 419, 20950.00, 50.00, '1', NULL, '2025-06-17 01:47:30', '2025-06-17 02:01:36'),
(4, '2025-06-09', '2', 25, 35, '0', 103, 92700.00, 900.00, '1', NULL, '2025-06-17 01:47:38', '2025-06-17 02:01:36'),
(5, '2025-06-13', '3', 1, 1, 'ZXHZAZ7629', 1, 122500.00, 2500.00, '1', '0', '2025-06-17 02:01:36', '2025-07-03 19:27:42'),
(6, '2025-06-16', '5', 1, 1, 'ZXHZBA9007', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-06-17 22:59:24'),
(185, '2025-07-09', '8', 8, 33, 'EBBE08431', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:39:55', '2025-07-15 22:58:48'),
(183, '2025-07-09', '8', 8, 33, 'EBBE08432', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:36:11', '2025-07-15 22:47:35'),
(181, '2025-07-09', '8', 8, 33, 'EBBD16135', 1, 0.00, 0.00, '1', '0', '2025-07-14 22:29:49', '2025-07-15 22:32:01'),
(179, '2025-07-09', '8', 8, 33, 'EBBD16130', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:19:17', '2025-07-15 22:09:12'),
(177, '2025-07-14', '9', 26, 31, '0', 50, 5000.00, 100.00, '1', NULL, '2025-07-14 22:05:21', '2025-07-14 22:17:43'),
(13, '2025-06-16', '5', 1, 1, 'ZXHZBB2598', 1, 25000.00, 2500.00, '1', '0', '2025-06-17 02:11:12', '2025-07-09 22:40:26'),
(14, '2025-06-16', '5', 1, 1, 'ZXHZBB2522', 1, 25000.00, 2500.00, '0', '0', '2025-06-17 02:11:12', '2025-07-09 23:12:35'),
(15, '2025-06-16', '5', 1, 1, 'ZXHZBB2330', 1, 25000.00, 2500.00, '0', NULL, '2025-06-17 02:11:12', '2025-06-17 02:11:12'),
(16, '2025-06-13', '3', 6, 19, '0', 72, 14400.00, 200.00, '1', NULL, '2025-06-17 22:49:45', '2025-06-17 22:49:45'),
(17, '2025-06-13', '3', 12, 23, '0', 100, 220000.00, 2200.00, '1', '1', '2025-06-17 22:56:12', '2025-07-14 23:55:58'),
(18, '2025-06-13', '3', 11, 18, '0', 307, 951700.00, 3100.00, '1', NULL, '2025-06-17 22:56:12', '2025-07-19 23:45:03'),
(19, '2025-06-13', '3', 9, 15, 'GA250429FQ3904656', 1, 492000.00, 6000.00, '1', '0', '2025-06-17 22:56:12', '2025-06-17 22:59:24'),
(20, '2025-06-13', '3', 8, 33, 'ISOLATER7894549', 1, 707000.00, 7000.00, '1', '0', '2025-06-17 22:59:24', '2025-06-17 22:59:24'),
(21, '2025-06-13', '3', 11, 34, '0', 307, 1074500.00, 3500.00, '1', NULL, '2025-07-02 18:14:38', '2025-07-02 18:14:38'),
(22, '2025-06-13', '3', 8, 33, 'EBBD0826', 1, 707000.00, 7000.00, '1', '0', '2025-07-02 18:19:59', '2025-07-02 18:46:50'),
(23, '2025-06-13', '3', 10, 26, '0', 2223, 1000350.00, 450.00, '1', NULL, '2025-07-02 18:19:59', '2025-07-14 18:58:29'),
(24, '2025-07-02', '7', 28, 42, '0', 1000, 15000.00, 15.00, '1', NULL, '2025-07-02 18:46:50', '2025-07-17 19:59:05'),
(25, '2025-06-13', '3', 1, 1, 'ZXHZBA0955', 1, 122500.00, 2500.00, '1', '0', '2025-07-03 19:25:40', '2025-07-03 19:26:56'),
(26, '2025-06-13', '3', 9, 15, 'GA241129FQ278380', 1, 492000.00, 6000.00, '1', '0', '2025-07-03 19:25:40', '2025-07-03 19:26:56'),
(172, '2025-07-09', '8', 8, 33, 'EBBD16105', 100, 0.00, 0.00, '1', '0', '2025-07-14 19:02:12', '2025-07-15 19:12:33'),
(173, '2025-07-09', '8', 8, 33, 'EBBD16096', 100, 0.00, 0.00, '1', '0', '2025-07-14 19:04:23', '2025-07-15 19:26:27'),
(184, '2025-07-09', '8', 8, 33, 'EBBD16126', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:38:23', '2025-07-15 22:52:43'),
(182, '2025-07-09', '8', 8, 33, 'EBBC10432', 1, 0.00, 0.00, '1', '0', '2025-07-14 22:31:52', '2025-07-15 22:16:38'),
(180, '2025-07-09', '8', 8, 33, 'EBBD16133', 1, 0.00, 0.00, '1', '0', '2025-07-14 22:27:55', '2025-07-15 22:00:50'),
(178, '2025-07-14', '9', 26, 32, '0', 50, 5000.00, 100.00, '1', NULL, '2025-07-14 22:05:32', '2025-07-14 22:33:46'),
(174, '2025-07-09', '8', 8, 33, 'EBBD16137', 100, 0.00, 0.00, '1', '0', '2025-07-14 19:08:12', '2025-07-15 19:31:51'),
(171, '2025-07-09', '8', 8, 33, 'EBBD16064', 100, 0.00, 0.00, '1', '0', '2025-07-14 18:58:29', '2025-07-15 19:05:17'),
(176, '2025-07-09', '8', 8, 33, 'EBBD16132', 1, 0.00, 0.00, '1', '0', '2025-07-14 19:33:38', '2025-07-15 20:04:26'),
(175, '2025-07-09', '8', 8, 33, 'EBBD16063', 1, 0.00, 0.00, '1', '0', '2025-07-14 19:29:47', '2025-07-15 19:53:03'),
(37, '2025-06-13', '3', 1, 2, 'ZXHZBD3433', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-09 22:40:26'),
(38, '2025-06-13', '3', 1, 2, 'ZXHZBB7737', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-09 22:40:26'),
(39, '2025-06-13', '3', 1, 2, 'ZXHZBD5033', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-15 19:31:51'),
(40, '2025-06-13', '3', 1, 2, 'ZXHZBD5064', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-15 19:31:51'),
(41, '2025-06-13', '3', 1, 2, 'ZXHZBB9018', 1, 101500.00, 3500.00, '0', NULL, '2025-07-08 19:33:42', '2025-07-08 19:33:42'),
(42, '2025-06-13', '3', 1, 2, 'ZXHZBB9156', 1, 101500.00, 3500.00, '1', '0', '2025-07-08 19:33:42', '2025-07-15 22:09:12'),
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
(58, '2025-06-13', '3', 10, 16, '0', 1000, 426000.00, 426.00, '1', NULL, '2025-07-09 17:55:44', '2025-07-17 20:29:27'),
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
(107, '2025-07-09', '8', 1, 1, 'ZXHZAV1432', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-14 22:39:32'),
(108, '2025-07-09', '8', 1, 2, 'ZXHZBC0787', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-14 22:39:32'),
(109, '2025-07-09', '8', 1, 2, 'ZXHZBB7801', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-14 22:39:32'),
(110, '2025-07-09', '8', 9, 15, 'GA241129FQ278366', 1, 0.00, 0.00, '1', '0', '2025-07-10 18:46:34', '2025-07-14 22:39:32'),
(111, '2025-07-09', '8', 1, 1, 'ZXHZAV5131', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(112, '2025-07-09', '8', 1, 2, 'ZXHZBC9570', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(113, '2025-07-09', '8', 1, 2, 'ZXHZBC7083', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(114, '2025-07-09', '8', 9, 15, 'GA241129FQ278355', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:07:22', '2025-07-12 23:34:31'),
(115, '2025-07-09', '8', 1, 1, 'ZXHZAV5001', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-14 23:02:03'),
(116, '2025-07-09', '8', 1, 2, 'ZXHBB7907', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-14 23:02:03'),
(117, '2025-07-09', '8', 1, 2, 'ZXHZAB8581', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-14 23:02:03'),
(118, '2025-07-09', '8', 9, 15, 'GA241129FQ278341', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:18:05', '2025-07-14 23:02:03'),
(119, '2025-07-09', '8', 1, 1, 'ZXHZBA6558', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-14 23:03:05'),
(120, '2025-07-09', '8', 1, 3, 'ZXHZBA0949', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-14 23:03:05'),
(121, '2025-07-09', '8', 1, 3, 'ZXHZAY5446', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-14 23:03:05'),
(122, '2025-07-09', '8', 9, 15, 'GA241129FQ278404', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:25:40', '2025-07-14 23:03:05'),
(123, '2025-07-09', '8', 1, 1, 'ZXHZAV3704', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-14 23:03:37'),
(124, '2025-07-09', '8', 1, 2, 'ZXHZBC5300', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-14 23:03:37'),
(125, '2025-07-09', '8', 1, 3, 'ZXHZAY5479', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-14 23:03:37'),
(126, '2025-07-09', '8', 9, 15, 'GA241129FQ278395', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:33:46', '2025-07-14 23:03:37'),
(127, '2025-07-09', '8', 1, 1, 'ZXHZAZ7078', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-14 23:04:04'),
(128, '2025-07-09', '8', 1, 3, 'ZXHZBA0748', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-14 23:04:04'),
(129, '2025-07-09', '8', 1, 3, 'ZXHZAZ9028', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-14 23:04:04'),
(130, '2025-07-09', '8', 9, 15, 'GA241129FQ278405', 1, 0.00, 0.00, '1', '0', '2025-07-10 19:51:01', '2025-07-14 23:04:04'),
(131, '2025-07-09', '8', 1, 1, 'ZXHZBA4662', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-14 23:04:41'),
(132, '2025-07-09', '8', 1, 3, 'ZXHZAZ2471', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-14 23:04:41'),
(133, '2025-07-09', '8', 1, 3, 'ZXHZAZ2455', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-14 23:04:41'),
(134, '2025-07-09', '8', 9, 15, 'GA241129FQ278396', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:05:25', '2025-07-14 23:04:41'),
(135, '2025-07-09', '8', 1, 1, 'ZXHZAV0022', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-15 00:19:01'),
(136, '2025-07-09', '8', 1, 2, 'ZXHZBC5481', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-15 00:19:01'),
(137, '2025-07-09', '8', 1, 2, 'ZXHZBC5376', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-15 00:19:01'),
(138, '2025-07-09', '8', 9, 15, 'GA241129FQ278336', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:16:32', '2025-07-15 00:19:01'),
(139, '2025-07-09', '8', 1, 1, 'ZXHZAU9984', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-15 00:18:02'),
(140, '2025-07-09', '8', 1, 2, 'ZXHZBB7726', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-15 00:18:02'),
(141, '2025-07-09', '8', 1, 2, 'ZXHZBC5331', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-15 00:18:02'),
(142, '2025-07-09', '8', 9, 15, 'GA240719FQ258447', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:23:06', '2025-07-16 00:37:20'),
(143, '2025-07-09', '8', 1, 1, 'ZXHZBA3179', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-15 00:20:35'),
(144, '2025-07-09', '8', 1, 3, 'ZXHZBC0334', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-15 00:20:35'),
(145, '2025-07-09', '8', 9, 15, 'GA241129FQ278476', 1, 0.00, 0.00, '1', '0', '2025-07-10 20:28:09', '2025-07-15 00:20:35'),
(146, '2025-07-09', '8', 8, 33, 'GGYGWFGWG', 1, 0.00, 0.00, '0', '0', '2025-07-11 19:49:24', '2025-07-17 19:31:02'),
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
(161, '2025-07-09', '8', 8, 33, 'EBBD16104', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:30:47', '2025-07-14 22:39:32'),
(162, '2025-07-09', '8', 8, 33, 'EBBC17639', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:34:31', '2025-07-12 23:34:31'),
(163, '2025-07-09', '8', 8, 33, 'EBBB03849', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:40:22', '2025-07-14 23:02:03'),
(164, '2025-07-09', '8', 8, 33, 'EBBC10606', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:42:32', '2025-07-14 23:03:05'),
(165, '2025-07-09', '8', 8, 33, 'EBBD16103', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:45:09', '2025-07-14 23:03:37'),
(166, '2025-07-09', '8', 8, 33, 'EBBD16097', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:47:54', '2025-07-14 23:04:04'),
(167, '2025-07-09', '8', 8, 33, 'EBBD16102', 1, 0.00, 0.00, '1', '0', '2025-07-12 23:59:08', '2025-07-14 23:04:41'),
(168, '2025-07-09', '8', 8, 33, NULL, 1, 0.00, 0.00, '1', '0', '2025-07-13 00:05:09', '2025-07-13 00:05:09'),
(169, '2025-07-09', '8', 8, 33, 'EBBD16059', 1, 0.00, 0.00, '1', '0', '2025-07-13 00:11:39', '2025-07-15 00:18:02'),
(170, '2025-07-09', '8', 8, 33, 'EBBD16065', 1, 0.00, 0.00, '1', '0', '2025-07-14 17:41:17', '2025-07-15 00:20:35'),
(186, '2025-07-09', '8', 8, 33, 'EBBE08425', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:44:20', '2025-07-15 23:10:24'),
(187, '2025-07-09', '8', 8, 33, 'EBBE08430', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:57:51', '2025-07-15 23:16:57'),
(188, '2025-07-09', '8', 8, 33, 'EBBE08434', 100, 0.00, 0.00, '1', '0', '2025-07-14 22:59:55', '2025-07-15 23:23:22'),
(189, '2025-07-09', '8', 8, 33, 'EBBE08436', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:01:32', '2025-07-15 23:33:23'),
(190, '2025-07-09', '8', 8, 33, 'EBBD16084', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:03:38', '2025-07-15 23:43:38'),
(191, '2025-07-09', '8', 8, 33, 'EBBE08438', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:06:06', '2025-07-15 23:53:13'),
(192, '2025-07-09', '8', 8, 33, 'EBBE08440', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:07:07', '2025-07-15 23:58:03'),
(193, '2025-07-09', '8', 8, 33, 'EBBE08441', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:08:44', '2025-07-16 00:03:08'),
(194, '2025-07-09', '8', 8, 33, 'EBBE08418', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:09:40', '2025-07-16 00:37:20'),
(195, '2025-07-09', '8', 8, 33, 'EBBE08416', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:10:44', '2025-07-16 00:36:30'),
(196, '2025-07-09', '8', 8, 33, 'EBBE08435', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:12:45', '2025-07-16 00:42:56'),
(197, '2025-07-09', '8', 8, 33, 'EBBE08421', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:13:44', '2025-07-16 00:56:20'),
(198, '2025-07-09', '8', 8, 33, 'EBBE08415', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:14:51', '2025-07-16 01:02:01'),
(199, '2025-07-09', '8', 8, 33, 'EBBE08420', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:15:48', '2025-07-16 01:06:25'),
(200, '2025-07-09', '8', 8, 33, 'EBBE08414', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:17:06', '2025-07-16 01:13:42'),
(201, '2025-07-09', '8', 8, 33, 'EBBE08433', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:18:18', '2025-07-16 01:18:16'),
(202, '2025-07-09', '8', 8, 33, 'EBBE08427', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:20:15', '2025-07-16 01:23:27'),
(203, '2025-07-09', '8', 8, 33, 'EBBE08437', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:21:55', '2025-07-16 17:06:40'),
(204, '2025-07-09', '8', 8, 33, 'EBBE08426', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:23:06', '2025-07-17 22:03:58'),
(205, '2025-07-09', '8', 8, 33, 'EBBE08439', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:24:24', '2025-07-17 22:08:36'),
(206, '2025-07-09', '8', 8, 33, 'EBBE08457', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:25:41', '2025-07-17 22:26:04'),
(207, '2025-07-09', '8', 8, 33, 'EBBE08455', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:26:41', '2025-07-16 00:48:41'),
(208, '2025-07-09', '8', 8, 33, 'EBBE08460', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:27:46', '2025-07-17 22:33:39'),
(209, '2025-07-09', '8', 8, 33, 'EBBE08428', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:31:47', '2025-07-17 22:55:21'),
(210, '2025-07-09', '8', 8, 33, 'EBBE08454', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:36:56', '2025-07-17 23:00:18'),
(211, '2025-07-09', '8', 8, 33, 'EBBE08444', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:48:37', '2025-07-17 22:27:15'),
(212, '2025-07-09', '8', 8, 33, 'EBBD05541', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:52:28', '2025-07-18 00:00:15'),
(213, '2025-07-09', '8', 8, 33, 'EBBD04824', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:54:04', '2025-07-18 00:03:28'),
(214, '2025-07-09', '8', 8, 33, 'EBBD05538', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:55:58', '2025-07-18 17:41:07'),
(215, '2025-07-09', '8', 8, 33, 'EBBC14162', 100, 0.00, 0.00, '1', '0', '2025-07-14 23:58:38', '2025-07-18 17:56:03'),
(216, '2025-07-09', '8', 8, 33, 'HPW-JL3621D06H2', 100, 0.00, 0.00, '1', '0', '2025-07-15 00:01:26', '2025-07-18 18:04:43'),
(217, '2025-07-09', '8', 8, 33, 'EBBC16989', 100, 0.00, 0.00, '1', '0', '2025-07-15 00:02:55', '2025-07-15 01:28:48'),
(218, '2025-07-09', '8', 8, 33, 'EBBE08442', 1, 0.00, 0.00, '0', '0', '2025-07-15 00:56:45', '2025-07-22 23:02:12'),
(219, '2025-07-14', '10', 6, 19, '0', 1000, 0.00, 0.00, '1', NULL, '2025-07-15 00:58:47', '2025-07-17 19:53:31'),
(220, '2025-07-09', '8', 8, 33, 'EBBE08445', 1, 0.00, 0.00, '1', '0', '2025-07-15 01:05:09', '2025-07-21 22:57:34'),
(221, '2025-07-09', '8', 8, 33, 'EBBE08423', 1, 0.00, 0.00, '1', NULL, '2025-07-15 01:17:29', '2025-07-15 01:17:29'),
(222, '2025-07-09', '8', 8, 33, 'EBBE08424', 1, 0.00, 0.00, '1', NULL, '2025-07-15 01:19:10', '2025-07-15 01:19:10'),
(223, '2025-07-09', '8', 8, 33, 'HPW-JL3620D06H2', 100, 0.00, 0.00, '1', NULL, '2025-07-15 01:23:32', '2025-07-15 01:23:32'),
(224, '2025-07-09', '8', 8, 33, 'EBBD16101', 100, 0.00, 0.00, '1', NULL, '2025-07-15 01:25:18', '2025-07-15 01:25:18'),
(225, '2025-07-09', '8', 8, 33, 'EBBD16106', 100, 0.00, 0.00, '1', NULL, '2025-07-15 01:27:18', '2025-07-15 01:27:18'),
(226, '2025-07-09', '8', 8, 33, 'HPW-JL2618D06H2', 100, 0.00, 0.00, '1', NULL, '2025-07-15 18:25:25', '2025-07-15 18:25:25'),
(227, '2025-07-09', '8', 8, 33, 'EBBC16796', 100, 0.00, 0.00, '1', NULL, '2025-07-15 18:45:08', '2025-07-15 18:45:08'),
(228, '2025-07-09', '8', 8, 33, 'EBBD16095', 100, 0.00, 0.00, '1', NULL, '2025-07-15 18:46:32', '2025-07-15 18:46:32'),
(229, '2025-07-09', '8', 8, 33, 'EBBD16131', 100, 0.00, 0.00, '1', NULL, '2025-07-15 18:48:13', '2025-07-15 18:48:13'),
(230, '2025-07-09', '8', 8, 33, 'EBBD16062', 100, 0.00, 0.00, '1', NULL, '2025-07-15 18:50:00', '2025-07-15 18:50:00'),
(231, '2025-07-09', '8', 1, 1, 'ZXHZAU7484', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(232, '2025-07-09', '8', 1, 2, 'ZXHZBC5365', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(233, '2025-07-09', '8', 1, 2, 'ZXHZBC5571', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(234, '2025-07-09', '8', 9, 15, 'GA241129FQ278364', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:05:17', '2025-07-15 19:05:17'),
(235, '2025-07-09', '8', 1, 1, 'ZXHZAU9974', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(236, '2025-07-09', '8', 1, 2, 'ZXHZBC5355', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(237, '2025-07-09', '8', 1, 2, 'ZXHZBC7689', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(238, '2025-07-09', '8', 9, 15, 'GA241129FQ278334', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:12:33', '2025-07-15 19:12:33'),
(239, '2025-07-09', '8', 1, 1, 'ZXHZAU9878', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(240, '2025-07-09', '8', 1, 2, 'ZXHZBB9113', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(241, '2025-07-09', '8', 1, 2, 'ZXHZAI3899', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(242, '2025-07-09', '8', 9, 15, 'GA241129FQ278344', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:26:27', '2025-07-15 19:26:27'),
(243, '2025-07-09', '8', 1, 1, 'ZXHZAZ4489', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(244, '2025-07-09', '8', 9, 15, 'GA241129FQ278339', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:31:51', '2025-07-15 19:31:51'),
(245, '2025-07-09', '8', 1, 1, 'ZXHZAU7741', 1, 0.00, 0.00, '1', NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(246, '2025-07-09', '8', 1, 3, 'ZXHZBC0793', 1, 0.00, 0.00, '1', NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(247, '2025-07-09', '8', 1, 3, 'ZXHZAA7814', 1, 0.00, 0.00, '1', NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(248, '2025-07-09', '8', 9, 15, 'GA241129FQ27825', 1, 0.00, 0.00, '1', NULL, '2025-07-15 19:44:19', '2025-07-15 19:44:19'),
(249, '2025-07-09', '8', 1, 1, 'ZXHZAU7780', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(250, '2025-07-09', '8', 1, 2, 'ZXHZBC5315', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(251, '2025-07-09', '8', 1, 2, 'ZXHZBC5280', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(252, '2025-07-09', '8', 9, 15, 'GA241129FQ278350', 1, 0.00, 0.00, '1', '0', '2025-07-15 19:53:04', '2025-07-15 19:53:04'),
(253, '2025-07-09', '8', 1, 1, 'ZXHZAV5093', 1, 0.00, 0.00, '1', '0', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(254, '2025-07-09', '8', 1, 2, 'ZXHZABB7707', 1, 0.00, 0.00, '1', '0', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(255, '2025-07-09', '8', 9, 15, 'GA241129FQ278337', 1, 0.00, 0.00, '1', '0', '2025-07-15 20:04:26', '2025-07-15 20:04:26'),
(256, '2025-07-02', '9', 7, 32, '0', 100, 10000.00, 100.00, '0', NULL, '2025-07-15 20:20:54', '2025-07-15 20:20:54'),
(257, '2025-07-02', '9', 7, 31, '0', 100, 10000.00, 100.00, '0', NULL, '2025-07-15 20:21:02', '2025-07-15 20:21:02'),
(258, '2025-07-09', '8', 1, 1, 'ZXHZAA4614', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(259, '2025-07-09', '8', 1, 2, 'ZXHZBB9026', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(260, '2025-07-09', '8', 9, 15, 'GA241129FQ278428', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:00:50', '2025-07-15 22:00:50'),
(261, '2025-07-09', '8', 1, 1, 'ZXHZAV9887', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(262, '2025-07-09', '8', 1, 2, 'ZXHZBC5484', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(263, '2025-07-09', '8', 9, 15, 'GA241129FQ278338', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:09:12', '2025-07-15 22:09:12'),
(264, '2025-07-09', '8', 1, 1, 'ZXHZAW3736', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(265, '2025-07-09', '8', 1, 2, 'ZXHZBD3383', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(266, '2025-07-09', '8', 1, 2, 'ZXHZBB9139', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(267, '2025-07-09', '8', 9, 15, 'GA241129FQ278333', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:16:38', '2025-07-15 22:16:38'),
(268, '2025-07-09', '8', 1, 1, 'ZXHZA2523', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(269, '2025-07-09', '8', 1, 2, 'ZXHZBB9136', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(270, '2025-07-09', '8', 1, 2, 'ZXHZBD4794', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(271, '2025-07-09', '8', 9, 15, 'GA241129FQ278373', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:32:02', '2025-07-15 22:32:02'),
(272, '2025-07-09', '8', 1, 1, 'ZXHZAV7901', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(273, '2025-07-09', '8', 1, 3, 'ZXHZAY1409', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:39:37', '2025-07-22 01:03:45'),
(274, '2025-07-09', '8', 1, 3, 'ZXHZAY5460', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:39:37', '2025-07-15 22:39:37'),
(275, '2025-07-09', '8', 1, 1, 'ZXHZAZ4147', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(276, '2025-07-09', '8', 1, 2, 'ZXHZBC5342', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(277, '2025-07-09', '8', 1, 2, 'ZXHZBC5275', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(278, '2025-07-09', '8', 9, 15, 'GA250418FQ301817', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:47:35', '2025-07-15 22:47:35'),
(279, '2025-07-09', '8', 1, 1, 'ZXHZAU9938', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(280, '2025-07-09', '8', 1, 2, 'ZXHZBB7722', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(281, '2025-07-09', '8', 1, 2, 'ZXHZBC5273', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(282, '2025-07-09', '8', 9, 15, 'GA241129FQ278335', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:52:43', '2025-07-15 22:52:43'),
(283, '2025-07-09', '8', 1, 1, 'ZXHZAY8673', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(284, '2025-07-09', '8', 1, 2, 'ZXHZBD5014', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(285, '2025-07-09', '8', 1, 2, 'ZXHZBC9592', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(286, '2025-07-09', '8', 9, 15, 'GA250418FQ301814', 1, 0.00, 0.00, '1', '0', '2025-07-15 22:58:48', '2025-07-15 22:58:48'),
(287, '2025-07-09', '8', 1, 1, 'ZXHZAY5543', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(288, '2025-07-09', '8', 1, 2, 'ZXHZAY5543', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(289, '2025-07-09', '8', 1, 2, 'ZXHZBC9637', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(290, '2025-07-09', '8', 9, 15, 'GA250418FQ301820', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:10:24', '2025-07-15 23:10:24'),
(291, '2025-07-09', '8', 1, 1, 'ZXHZABA3305', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(292, '2025-07-09', '8', 1, 2, 'ZXHZBC5287', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(293, '2025-07-09', '8', 1, 2, 'ZXHZBC7151', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(294, '2025-07-09', '8', 9, 15, 'GA241129FQ278393', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:16:57', '2025-07-15 23:16:57'),
(295, '2025-07-09', '8', 1, 1, 'ZXHZAZ7077', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(296, '2025-07-09', '8', 1, 2, 'ZXHZBC9754', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(297, '2025-07-09', '8', 1, 2, 'ZXHZBC8937', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(298, '2025-07-09', '8', 9, 15, 'GA230926FQ209399', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:23:22', '2025-07-15 23:23:22'),
(299, '2025-07-09', '8', 1, 1, 'ZXHZAY9609', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(300, '2025-07-09', '8', 1, 2, 'ZXHZBD3453', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(301, '2025-07-09', '8', 1, 2, 'ZXHZBD3645', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(302, '2025-07-09', '8', 9, 15, 'GA241129FQ278383', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:33:23', '2025-07-15 23:33:23'),
(303, '2025-07-09', '8', 1, 1, 'ZXHZAV4519', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(304, '2025-07-09', '8', 1, 2, 'ZXHZAV4540', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:43:38', '2025-07-15 23:43:38'),
(305, '2025-07-09', '8', 1, 2, 'ZXHZAV4601', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:43:39', '2025-07-15 23:43:39'),
(306, '2025-07-09', '8', 9, 15, 'GA24071FQ258475', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:43:39', '2025-07-15 23:43:39'),
(307, '2025-07-09', '8', 1, 1, 'ZXHZAY9388', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(308, '2025-07-09', '8', 1, 2, 'ZXHZBC7021', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(309, '2025-07-09', '8', 1, 2, 'ZXHZBB7671', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(310, '2025-07-09', '8', 9, 15, 'GA241129FQ278387', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:53:13', '2025-07-15 23:53:13'),
(311, '2025-07-09', '8', 1, 1, 'ZXHZAY9565', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(312, '2025-07-09', '8', 1, 2, 'ZXHZBC9799', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(313, '2025-07-09', '8', 1, 2, 'ZXHZBC8328', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(314, '2025-07-09', '8', 9, 15, 'GA241129FQ278386', 1, 0.00, 0.00, '1', '0', '2025-07-15 23:58:03', '2025-07-15 23:58:03'),
(315, '2025-07-09', '8', 1, 1, 'ZXHZAY9414', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(316, '2025-07-09', '8', 1, 2, 'ZXHZBB5588', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(317, '2025-07-09', '8', 1, 2, 'ZXHZBC5486', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(318, '2025-07-09', '8', 9, 15, 'GA241129FQ278385', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:03:08', '2025-07-16 00:03:08'),
(319, '2025-07-09', '8', 1, 1, 'ZXHZAZ5270', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:09:18', '2025-07-16 00:37:20'),
(320, '2025-07-09', '8', 1, 2, 'ZXHZBC1532', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:09:18', '2025-07-16 00:37:20'),
(321, '2025-07-09', '8', 1, 2, 'ZXHZBC9765', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:09:18', '2025-07-16 00:37:20'),
(322, '2025-07-09', '8', 1, 1, 'ZXHZAY9448', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:29:10', '2025-07-16 00:36:30'),
(323, '2025-07-09', '8', 1, 2, 'ZXHZBC5468', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:29:10', '2025-07-16 00:36:30'),
(324, '2025-07-09', '8', 1, 2, 'ZXHZBC5265', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:29:10', '2025-07-16 00:36:30'),
(325, '2025-07-09', '8', 9, 15, 'GA240407FQ239058', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:29:10', '2025-07-16 00:36:30'),
(326, '2025-07-09', '8', 1, 1, 'ZXHZAY9529', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(327, '2025-07-09', '8', 1, 2, 'ZXHZBC9786', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(328, '2025-07-09', '8', 1, 2, 'ZXHZBC9794', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(329, '2025-07-09', '8', 9, 15, 'GA240719FQ258439', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:42:56', '2025-07-16 00:42:56'),
(330, '2025-07-09', '8', 1, 1, 'ZXHZBA6400', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(331, '2025-07-09', '8', 1, 2, 'ZXHZBD5062', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(332, '2025-07-09', '8', 1, 2, 'ZXHZBB7706', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(333, '2025-07-09', '8', 9, 15, 'GA250418FQ301813', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:48:41', '2025-07-16 00:48:41'),
(334, '2025-07-09', '8', 1, 1, 'ZXHZAY2622', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(335, '2025-07-09', '8', 1, 2, 'ZXHZBD3571', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(336, '2025-07-09', '8', 1, 2, 'ZXHZBD3891', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(337, '2025-07-09', '8', 9, 15, 'GA241129FQ278388', 1, 0.00, 0.00, '1', '0', '2025-07-16 00:56:20', '2025-07-16 00:56:20'),
(338, '2025-07-09', '8', 1, 1, 'ZXHZAY9467', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(339, '2025-07-09', '8', 1, 2, 'ZXHZBC9776', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(340, '2025-07-09', '8', 1, 2, 'ZXHZBC5037', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(341, '2025-07-09', '8', 9, 15, 'GA250418FQ301816', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:02:02', '2025-07-16 01:02:02'),
(342, '2025-07-09', '8', 1, 2, 'ZXHZBC5473', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(343, '2025-07-09', '8', 1, 2, 'ZXHZBC4514', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(344, '2025-07-09', '8', 9, 15, 'GA241129FQ278353', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:06:25', '2025-07-16 01:06:25'),
(345, '2025-07-09', '8', 1, 1, 'ZXHZAY7217', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(346, '2025-07-09', '8', 1, 2, 'ZXHZBC4656', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(347, '2025-07-09', '8', 1, 2, 'ZXHZBC9589', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(348, '2025-07-09', '8', 9, 15, 'GA250418FQ301832', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:13:42', '2025-07-16 01:13:42'),
(349, '2025-07-09', '8', 1, 1, 'ZXHZAY8849', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(350, '2025-07-09', '8', 1, 2, 'ZXHZBC0397', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(351, '2025-07-09', '8', 1, 2, 'ZXHZBC9649', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(352, '2025-07-09', '8', 9, 15, 'GA241129FQ278384', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:18:16', '2025-07-16 01:18:16'),
(353, '2025-07-09', '8', 1, 1, 'ZXHZAY5078', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(354, '2025-07-09', '8', 1, 2, 'ZXHZBC0623', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(355, '2025-07-09', '8', 1, 2, 'ZXHZBC9862', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(356, '2025-07-09', '8', 9, 15, 'GA250418FQ301824', 1, 0.00, 0.00, '1', '0', '2025-07-16 01:23:27', '2025-07-16 01:23:27'),
(357, '2025-07-09', '8', 1, 1, 'ZXHZAY9418', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(358, '2025-07-09', '8', 1, 2, 'ZXHZBB8078', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(359, '2025-07-09', '8', 1, 2, 'ZXHZBC9679', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(360, '2025-07-09', '8', 9, 15, 'GA23092FQ209373', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:06:40', '2025-07-16 17:06:40'),
(361, '2025-07-09', '8', 1, 1, 'ZXHZAY3972', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:14:24', '2025-07-17 22:03:58'),
(362, '2025-07-09', '8', 1, 2, 'ZXHZBC0245', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:14:24', '2025-07-17 22:03:58'),
(363, '2025-07-09', '8', 1, 2, 'ZXHZBC7096', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:14:24', '2025-07-17 22:03:58'),
(364, '2025-07-09', '8', 9, 15, 'GA250418FQ301787', 1, 0.00, 0.00, '1', '0', '2025-07-16 17:14:24', '2025-07-17 22:03:58'),
(365, '2025-07-09', '8', 1, 1, 'ZXHZAM3590', 1, 0.00, 0.00, '1', NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(366, '2025-07-09', '8', 1, 3, 'AXHZAC2708', 1, 0.00, 0.00, '1', NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(367, '2025-07-09', '8', 9, 15, 'GA25418FQ301765', 1, 0.00, 0.00, '1', NULL, '2025-07-17 19:53:31', '2025-07-17 19:53:31'),
(368, '2025-07-09', '8', 1, 1, 'ZXHZAZ4271', 1, 0.00, 0.00, '1', '0', '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(369, '2025-07-09', '8', 1, 3, 'AXHZZK6122', 1, 0.00, 0.00, '1', '0', '2025-07-17 20:04:50', '2025-07-17 20:04:50'),
(370, '2025-06-13', '3', 10, 37, '0', 500, 220000.00, 440.00, '1', NULL, '2025-07-17 20:23:04', '2025-07-17 20:23:04'),
(371, '2025-07-09', '8', 1, 1, 'ZXHZBA9741', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(372, '2025-07-09', '8', 1, 2, 'ZXHZBC5461', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(373, '2025-07-09', '8', 1, 2, 'ZXHZBC9604', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:08:36', '2025-07-17 22:08:36'),
(374, '2025-07-09', '8', 1, 3, 'ZXHZAY7595', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(375, '2025-07-09', '8', 1, 3, 'WXHXAV6195', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:15:19', '2025-07-17 22:15:19'),
(376, '2025-07-09', '8', 9, 15, 'GA250418FQ301812', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:25:06', '2025-07-17 22:26:04'),
(377, '2025-07-09', '8', 1, 1, 'ZXHZAZ4435', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:25:06', '2025-07-17 22:26:04'),
(378, '2025-07-09', '8', 1, 2, 'ZXHZBC9569', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:25:06', '2025-07-17 22:26:04'),
(379, '2025-07-09', '8', 1, 2, 'ZXHZBC9632', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:25:06', '2025-07-17 22:26:04'),
(380, '2025-07-09', '8', 1, 3, 'XXHXAI1095', 1, 0.00, 0.00, '1', NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(381, '2025-07-09', '8', 9, 15, 'GA250418FQ301756', 1, 0.00, 0.00, '1', NULL, '2025-07-17 22:26:42', '2025-07-17 22:26:42'),
(382, '2025-07-09', '8', 1, 1, 'ZXHZAY9621', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(383, '2025-07-09', '8', 1, 2, 'ZXHZBC9657', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(384, '2025-07-09', '8', 1, 2, 'ZXHZBC0790', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:33:40', '2025-07-17 22:33:40'),
(385, '2025-07-09', '8', 1, 1, 'ZXHZAY7512', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(386, '2025-07-09', '8', 1, 2, 'ZXHZBC4646', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(387, '2025-07-09', '8', 1, 2, 'ZXHZBC5488', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(388, '2025-07-09', '8', 9, 15, 'GA250418FQ301818', 1, 0.00, 0.00, '1', '0', '2025-07-17 22:55:21', '2025-07-17 22:55:21'),
(389, '2025-07-09', '8', 1, 1, 'ZXHZBB5551', 1, 0.00, 0.00, '1', '0', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(390, '2025-07-09', '8', 1, 3, 'ZXHZBB5551', 1, 0.00, 0.00, '1', '0', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(391, '2025-07-09', '8', 1, 3, 'ZXHZBB2598', 1, 0.00, 0.00, '1', '0', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(392, '2025-07-09', '8', 9, 15, 'ZXHZBB5551', 1, 0.00, 0.00, '1', '0', '2025-07-17 23:00:19', '2025-07-17 23:00:19'),
(393, '2025-07-09', '8', 1, 3, 'WXHXA6656', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(394, '2025-07-09', '8', 1, 1, 'ZXHZAN9213', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(395, '2025-07-09', '8', 1, 2, 'ZXHZAH9226', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(396, '2025-07-09', '8', 9, 15, 'GA240729FQ260159', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:00:15', '2025-07-18 00:00:15'),
(397, '2025-07-09', '8', 1, 1, 'ZXHZAM3602', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(398, '2025-07-09', '8', 1, 2, 'ZXHZAH9263', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(399, '2025-07-09', '8', 1, 3, 'ZXHZAP6910', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(400, '2025-07-09', '8', 9, 15, 'GA240407FQ239040', 1, 0.00, 0.00, '1', '0', '2025-07-18 00:03:28', '2025-07-18 00:03:28'),
(401, '2025-07-09', '8', 9, 15, 'GA240729FQ260146', 1, 0.00, 0.00, '1', '0', '2025-07-18 01:09:53', '2025-07-18 17:41:07'),
(402, '2025-07-09', '8', 1, 1, 'ZXHZAN8707', 1, 0.00, 0.00, '1', '0', '2025-07-18 01:11:47', '2025-07-18 17:41:07'),
(403, '2025-07-09', '8', 1, 2, 'ZXHZAI3884', 1, 0.00, 0.00, '1', '0', '2025-07-18 01:11:47', '2025-07-18 17:41:07'),
(404, '2025-07-09', '8', 1, 3, 'ZXHZAP0380', 1, 0.00, 0.00, '1', '0', '2025-07-18 01:11:47', '2025-07-18 17:41:07'),
(405, '2025-07-09', '8', 1, 1, 'ZXHZBA4762', 1, 0.00, 0.00, '1', '0', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(406, '2025-07-09', '8', 1, 3, 'ZXHZAY5469', 1, 0.00, 0.00, '1', '0', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(407, '2025-07-09', '8', 1, 3, 'ZXHZA2218', 1, 0.00, 0.00, '1', '0', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(408, '2025-07-09', '8', 9, 15, 'GA241129FQ278390', 1, 0.00, 0.00, '1', '0', '2025-07-18 17:56:03', '2025-07-18 17:56:03'),
(409, '2025-07-09', '8', 1, 1, 'ZXHZAV3852', 1, 0.00, 0.00, '1', '0', '2025-07-18 18:03:34', '2025-07-18 18:04:43'),
(410, '2025-07-09', '8', 1, 2, 'ZXHZBB7674', 1, 0.00, 0.00, '1', '0', '2025-07-18 18:03:34', '2025-07-18 18:04:43'),
(411, '2025-07-09', '8', 1, 3, 'ZXHZAV5465', 1, 0.00, 0.00, '1', '0', '2025-07-18 18:03:34', '2025-07-18 18:04:43'),
(412, '2025-07-09', '8', 9, 15, 'GA241129FQ278360', 1, 0.00, 0.00, '1', '0', '2025-07-18 18:03:34', '2025-07-18 18:04:43'),
(413, '2025-07-09', '8', 1, 3, 'XXHXAG98', 1, 0.00, 0.00, '0', NULL, '2025-07-19 21:55:48', '2025-07-19 22:02:18'),
(414, '2025-07-09', '8', 1, 3, 'XXHXAG9857', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:02:18', '2025-07-19 22:02:18'),
(415, '2025-07-09', '8', 1, 1, 'ZXHZAY7659', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(416, '2025-07-09', '8', 1, 2, 'ZXHZBC5309', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(417, '2025-07-09', '8', 1, 2, 'ZXHZBC5343', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(418, '2025-07-09', '8', 9, 15, 'GA250418FQ301815', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(419, '2025-07-09', '8', 8, 33, 'EBBE08463', 1, 0.00, 0.00, '1', '0', '2025-07-19 22:13:17', '2025-07-19 22:32:26'),
(420, '2025-07-09', '8', 9, 15, 'GA250418FQ301767', 1, 0.00, 0.00, '1', NULL, '2025-07-19 23:32:08', '2025-07-19 23:32:08'),
(421, '2025-07-09', '8', 8, 33, 'EBBB04994', 1, 0.00, 0.00, '1', NULL, '2025-07-19 23:45:03', '2025-07-19 23:45:03'),
(422, '2025-07-09', '8', 1, 1, 'ZXHZAZ2920', 1, 0.00, 0.00, '1', NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(423, '2025-07-09', '8', 1, 3, 'ZXHZAY7615', 1, 0.00, 0.00, '1', NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(424, '2025-07-09', '8', 8, 33, 'FBBD16087', 1, 0.00, 0.00, '1', NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(425, '2025-07-09', '8', 9, 15, 'GA241129FQ278421', 1, 0.00, 0.00, '1', NULL, '2025-07-20 00:09:54', '2025-07-20 00:09:54'),
(426, '2025-07-09', '8', 1, 1, 'ZXHZBA3320', 1, 0.00, 0.00, '1', '0', '2025-07-20 00:39:28', '2025-07-20 00:57:48'),
(427, '2025-07-09', '8', 1, 3, 'ZXHZBB2375', 1, 0.00, 0.00, '1', '0', '2025-07-20 00:49:52', '2025-07-20 00:57:48'),
(428, '2025-07-09', '8', 9, 15, 'GA241129FQ278419', 1, 0.00, 0.00, '1', '0', '2025-07-20 00:49:52', '2025-07-20 00:57:48'),
(429, '2025-07-09', '8', 8, 33, 'EBBD16090', 1, 0.00, 0.00, '1', '0', '2025-07-20 00:57:49', '2025-07-20 00:57:49'),
(430, '2025-07-09', '8', 1, 1, 'ZXHZAV7817', 1, 0.00, 0.00, '1', '0', '2025-07-20 01:07:05', '2025-07-21 22:52:44'),
(431, '2025-07-09', '8', 1, 3, 'ZXHZBD3709', 1, 0.00, 0.00, '1', '0', '2025-07-20 01:07:05', '2025-07-21 22:52:44'),
(432, '2025-07-09', '8', 9, 15, 'GA241129FQ278424', 1, 0.00, 0.00, '1', '0', '2025-07-20 01:07:05', '2025-07-21 22:52:44'),
(433, '2025-07-09', '8', 8, 33, 'EBBD16119', 1, 0.00, 0.00, '1', '0', '2025-07-20 01:07:05', '2025-07-21 22:52:44'),
(434, '2025-07-09', '8', 1, 1, 'ZXHZAM9893', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(435, '2025-07-09', '8', 1, 3, 'VXHXKY8287', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(436, '2025-07-09', '8', 8, 33, 'EBBD16109', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(437, '2025-07-09', '8', 9, 15, 'GA230926FQ203999', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:20:03', '2025-07-20 01:20:03'),
(438, '2025-07-09', '8', 1, 1, 'ZXHZAV7705', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(439, '2025-07-09', '8', 1, 3, 'YXHZAI9581', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(440, '2025-07-09', '8', 8, 33, 'EBBD16074', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11'),
(441, '2025-07-09', '8', 9, 15, 'GA241129FQ278423', 1, 0.00, 0.00, '1', NULL, '2025-07-20 01:27:11', '2025-07-20 01:27:11');
INSERT INTO `tbl_stock` (`id`, `date`, `invoice_no`, `cid`, `scid`, `serial_no`, `qty`, `price`, `priceofUnit`, `status`, `dead_status`, `created_at`, `updated_at`) VALUES
(442, '2025-07-09', '8', 1, 1, 'ZXHZAV9900', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(443, '2025-07-09', '8', 1, 3, 'ZXHZAY1410', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(444, '2025-07-09', '8', 8, 33, 'EBBD05561', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(445, '2025-07-09', '8', 9, 15, 'GA240719FQ258444', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:26:49', '2025-07-21 17:26:49'),
(446, '2025-07-09', '8', 1, 1, 'ZXHZAV3716', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(447, '2025-07-09', '8', 1, 3, 'ZXJZAY1479', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(448, '2025-07-09', '8', 8, 33, 'EBBD05553', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(449, '2025-07-09', '8', 9, 15, 'GA240719FQ258443', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:34:09', '2025-07-21 17:34:09'),
(450, '2025-07-09', '8', 1, 1, 'ZXHZAO3221', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(451, '2025-07-09', '8', 1, 3, 'ZXHZAN8350', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(452, '2025-07-09', '8', 8, 33, 'ebbd04859', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(453, '2025-07-09', '8', 9, 15, 'GA240407FQ239031', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:41:55', '2025-07-21 17:41:55'),
(454, '2025-07-09', '8', 1, 3, 'ZXHZAP0338', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(455, '2025-07-09', '8', 1, 1, 'ZXHZAO3055', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(456, '2025-07-09', '8', 8, 33, 'EBBD04858', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(457, '2025-07-09', '8', 9, 15, 'GA240407FQ239081', 1, 0.00, 0.00, '1', NULL, '2025-07-21 17:47:21', '2025-07-21 17:47:21'),
(458, '2025-07-09', '8', 1, 3, 'ZXHZAP6901', 1, 0.00, 0.00, '1', NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(459, '2025-07-09', '8', 1, 1, 'ZXHZAO4055', 1, 0.00, 0.00, '1', NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(460, '2025-07-09', '8', 8, 33, 'EBBD05576', 1, 0.00, 0.00, '1', NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(461, '2025-07-09', '8', 9, 15, 'GA240407FQ239030', 1, 0.00, 0.00, '1', NULL, '2025-07-21 18:14:50', '2025-07-21 18:14:50'),
(462, '2025-07-09', '8', 1, 3, 'ZXHZAP049', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(463, '2025-07-09', '8', 1, 1, 'ZXHZAM9714', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(464, '2025-07-09', '8', 8, 33, 'EBBD05572', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(465, '2025-07-09', '8', 9, 15, 'GA240407FQ239033', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:03:48', '2025-07-21 19:03:48'),
(466, '2025-07-09', '8', 1, 1, 'ZXHZAL9640', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(467, '2025-07-09', '8', 1, 3, 'ZXHZAP6852', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(468, '2025-07-09', '8', 8, 33, 'EBBD05569', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(469, '2025-07-09', '8', 9, 15, 'GA240407FQ239037', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:07:50', '2025-07-21 19:07:50'),
(470, '2025-07-09', '8', 1, 3, 'ZXHZAP0373', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(471, '2025-07-09', '8', 1, 1, 'ZXHZAO2009', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(472, '2025-07-09', '8', 8, 33, 'EBBD05571', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(473, '2025-07-09', '8', 9, 15, 'GA240407FQ239032', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:10:41', '2025-07-21 19:10:41'),
(474, '2025-07-09', '8', 1, 3, 'ZXHZAP0395', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(475, '2025-07-09', '8', 1, 1, 'ZXHZAO3561', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(476, '2025-07-09', '8', 8, 33, 'EBBD05570', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(477, '2025-07-09', '8', 9, 15, 'GA240407FQ239052', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:14:15', '2025-07-21 19:14:15'),
(478, '2025-07-09', '8', 1, 1, 'ZXHZAL9161', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(479, '2025-07-09', '8', 1, 3, 'ZXHZAN8397', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(480, '2025-07-09', '8', 8, 33, 'EBBD05574', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(481, '2025-07-09', '8', 9, 15, 'GA240407FQ239035', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:17:44', '2025-07-21 19:17:44'),
(482, '2025-07-09', '8', 1, 3, 'ZXHZAP0382', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(483, '2025-07-09', '8', 1, 1, 'ZXHZAL9621', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(484, '2025-07-09', '8', 8, 33, 'EBBD05575', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(485, '2025-07-09', '8', 9, 15, 'GA240407FQ239080', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:20:39', '2025-07-21 19:20:39'),
(486, '2025-07-09', '8', 1, 3, 'ZXHZAP4227', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(487, '2025-07-09', '8', 1, 1, 'ZXHZAO3381', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(488, '2025-07-09', '8', 8, 33, 'EBBD04834', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(489, '2025-07-09', '8', 9, 15, 'GA240407FQ239082', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:23:45', '2025-07-21 19:23:45'),
(490, '2025-07-09', '8', 1, 1, 'YXHDAD3387', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(491, '2025-07-09', '8', 1, 3, 'ZXHZAB2915', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(492, '2025-07-09', '8', 8, 33, 'EBBD05573', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(493, '2025-07-09', '8', 9, 15, 'GA240407FQ239043', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:29:43', '2025-07-21 19:29:43'),
(494, '2025-07-09', '8', 1, 1, 'XXHXAI3268(12-LD)', 1, 0.00, 0.00, '0', NULL, '2025-07-21 19:35:12', '2025-07-21 19:37:17'),
(495, '2025-07-09', '8', 1, 3, 'ZXHZAB5516', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:35:12', '2025-07-21 19:37:17'),
(496, '2025-07-09', '8', 8, 33, 'HPW-JI2557D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:35:12', '2025-07-21 19:37:17'),
(497, '2025-07-09', '8', 9, 15, 'GA240407FQ239044', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:35:12', '2025-07-21 19:37:17'),
(498, '2025-07-09', '8', 1, 1, 'XXHXAI3268 (LD-12)', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:37:17', '2025-07-21 19:37:17'),
(499, '2025-07-09', '8', 1, 3, 'ZXHDAA3843', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(500, '2025-07-09', '8', 1, 1, 'YXHDAB6693', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(501, '2025-07-09', '8', 8, 33, 'HPW-JI2611D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(502, '2025-07-09', '8', 9, 15, 'GA240527FQ247910', 1, 0.00, 0.00, '1', NULL, '2025-07-21 19:42:04', '2025-07-21 19:42:04'),
(503, '2025-07-09', '8', 1, 3, 'ZXHDAA3839', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:46:10', '2025-07-21 22:07:28'),
(504, '2025-07-09', '8', 1, 1, 'YXHZAO4951', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:46:10', '2025-07-21 22:07:28'),
(505, '2025-07-09', '8', 8, 33, 'HPW-JI2614D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:46:10', '2025-07-21 22:07:28'),
(506, '2025-07-09', '8', 9, 15, 'GA240527FQ247911', 1, 0.00, 0.00, '1', '0', '2025-07-21 19:46:10', '2025-07-21 22:07:28'),
(507, '2025-07-01', '11', 7, 21, '0', 150, 180000.00, 1200.00, '1', NULL, '2025-07-21 21:44:36', '2025-07-21 21:46:02'),
(508, '2025-07-09', '8', 1, 1, 'YXHZAO3784', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:03:20', '2025-07-22 00:17:18'),
(509, '2025-07-09', '8', 1, 3, 'ZXHZAB7052', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:03:20', '2025-07-22 00:17:18'),
(510, '2025-07-09', '8', 9, 15, 'GA240527FQ247922', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:03:20', '2025-07-22 00:17:18'),
(511, '2025-07-09', '8', 8, 33, 'HPW-J12586D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:03:20', '2025-07-22 00:17:18'),
(512, '2025-07-09', '8', 1, 3, 'ZXHZAA78914', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:22:56', '2025-07-22 00:17:04'),
(513, '2025-07-09', '8', 1, 1, 'YXHDAD3381', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:22:56', '2025-07-22 00:17:05'),
(514, '2025-07-09', '8', 8, 33, 'HPW-J12499D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:22:56', '2025-07-22 00:17:05'),
(515, '2025-07-09', '8', 9, 15, 'GA240527FQ247916', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:22:56', '2025-07-22 00:17:05'),
(516, '2025-07-09', '8', 1, 1, 'ZXHZBA3051', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(517, '2025-07-09', '8', 1, 2, 'ZXHZAH9983', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(518, '2025-07-09', '8', 1, 2, 'ZXHZAH9251', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(519, '2025-07-09', '8', 8, 33, 'EBBD16120', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(520, '2025-07-09', '8', 9, 15, 'GA241129FQ278412', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:25:25', '2025-07-21 22:25:25'),
(528, '2025-07-09', '8', 8, 33, 'HPW-J12203D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:49:53', '2025-07-22 00:16:52'),
(527, '2025-07-09', '8', 1, 1, 'YXHZA03657', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:49:53', '2025-07-22 00:16:52'),
(526, '2025-07-09', '8', 1, 3, 'ZXHDAA3798', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:49:53', '2025-07-22 00:16:52'),
(525, '2025-07-21', '12', 12, 23, '0', 500, 1100000.00, 2200.00, '1', NULL, '2025-07-21 22:40:59', '2025-07-21 22:49:53'),
(529, '2025-07-09', '8', 9, 15, 'GA240527FQ247914', 1, 0.00, 0.00, '1', '0', '2025-07-21 22:49:53', '2025-07-22 00:16:52'),
(530, '2025-07-09', '8', 1, 1, 'ZXHZBA3116', 1, 0.00, 0.00, '1', NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(531, '2025-07-09', '8', 1, 3, 'ZXHZBC0388', 1, 0.00, 0.00, '1', NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(532, '2025-07-09', '8', 8, 33, 'EBBD03286', 1, 0.00, 0.00, '1', NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(533, '2025-07-09', '8', 9, 15, 'GA241129FQ278410', 1, 0.00, 0.00, '1', NULL, '2025-07-21 22:51:57', '2025-07-21 22:51:57'),
(537, '2025-07-09', '8', 1, 2, 'ZXHZBC9749', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(536, '2025-07-09', '8', 1, 1, 'ZXHZAV5082', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(538, '2025-07-09', '8', 1, 2, 'ZXHZBB8122', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(539, '2025-07-09', '8', 8, 33, 'EBBD16069', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(540, '2025-07-09', '8', 9, 15, 'GA241129FQ278354', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:00:17', '2025-07-21 23:00:17'),
(544, '2025-07-09', '8', 1, 2, 'ZXHZBC9879', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(543, '2025-07-09', '8', 1, 1, 'ZXHZAV5121', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(545, '2025-07-09', '8', 1, 2, 'ZXHZBB9122', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(546, '2025-07-09', '8', 8, 33, 'EBBD16067', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(547, '2025-07-09', '8', 9, 15, 'GA241129FQ278356', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:08:06', '2025-07-21 23:08:06'),
(548, '2025-07-09', '8', 1, 3, 'YXHZAJ9533', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:08:50', '2025-07-22 00:16:40'),
(549, '2025-07-09', '8', 1, 1, 'YXHZAO4938', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:11:04', '2025-07-22 00:16:40'),
(550, '2025-07-09', '8', 9, 15, 'GA230926FQ209337', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:11:04', '2025-07-22 00:16:40'),
(551, '2025-07-09', '8', 1, 3, 'XXHXAI1948', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:19:00', '2025-07-22 00:16:25'),
(552, '2025-07-09', '8', 1, 1, 'YXHZAP5675', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:19:00', '2025-07-22 00:16:25'),
(553, '2025-07-09', '8', 9, 15, 'GA230926FQ209342', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:19:00', '2025-07-22 00:16:25'),
(554, '2025-07-09', '8', 1, 1, 'ZXHZAV9973', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(555, '2025-07-09', '8', 1, 2, 'ZXHZBD3404', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(556, '2025-07-09', '8', 1, 2, 'ZXHZBC9620', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(557, '2025-07-09', '8', 8, 33, 'EBBD03259', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(558, '2025-07-09', '8', 9, 15, 'GA240407FQ239069', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:19:50', '2025-07-21 23:19:50'),
(561, '2025-07-09', '8', 1, 1, 'ZXHZAV6545', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(562, '2025-07-09', '8', 1, 2, 'ZXHZBB7802', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(563, '2025-07-09', '8', 1, 2, 'ZXHZBC0261', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(564, '2025-07-09', '8', 8, 33, 'EBBD16060', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(565, '2025-07-09', '8', 9, 15, 'GA241129FQ278367', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:28:30', '2025-07-21 23:28:30'),
(566, '2025-07-09', '8', 1, 1, 'ZXHZBA3040', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(567, '2025-07-09', '8', 1, 2, 'ZXHZAI3795', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(568, '2025-07-09', '8', 1, 2, 'ZXHZAI3771', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(569, '2025-07-09', '8', 8, 33, 'EBBD16122', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(570, '2025-07-09', '8', 9, 15, 'GA241129FQ278411', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:32:47', '2025-07-21 23:32:47'),
(571, '2025-07-09', '8', 1, 3, 'YXHZAD8496', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(572, '2025-07-09', '8', 1, 1, 'YXHZAN7298', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(573, '2025-07-09', '8', 8, 33, 'EBBB07596', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(574, '2025-07-09', '8', 9, 15, 'GA230926FQ209367', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:38:10', '2025-07-21 23:38:10'),
(575, '2025-07-09', '8', 1, 3, 'YXHZAJ9272', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:41:45', '2025-07-22 00:16:07'),
(576, '2025-07-09', '8', 9, 15, 'GA230926FQ209340', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:41:45', '2025-07-22 00:16:07'),
(577, '2025-07-09', '8', 1, 1, 'ZXHZAO3961', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(578, '2025-07-09', '8', 1, 3, 'ZXHZAB5154', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(579, '2025-07-09', '8', 8, 33, 'EBBD04870', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(580, '2025-07-09', '8', 9, 15, 'GA240407FQ239087', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:42:25', '2025-07-21 23:42:25'),
(581, '2025-07-09', '8', 1, 3, 'YXHZAK1983', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:47:54', '2025-07-22 00:15:37'),
(582, '2025-07-09', '8', 1, 1, 'YXHZAO3635', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:47:54', '2025-07-22 00:15:37'),
(583, '2025-07-09', '8', 8, 33, 'I-J01547D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:47:54', '2025-07-22 00:15:37'),
(584, '2025-07-09', '8', 9, 15, 'GA230926FQ209338', 1, 0.00, 0.00, '1', '0', '2025-07-21 23:47:54', '2025-07-22 00:15:37'),
(585, '2025-07-09', '8', 1, 1, 'YXHXAA0858', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(586, '2025-07-09', '8', 1, 3, 'ZXHZAB5526', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(587, '2025-07-09', '8', 8, 33, 'HPW-JI2425D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(588, '2025-07-09', '8', 9, 15, 'GA240407FQ239046', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:49:06', '2025-07-21 23:49:06'),
(589, '2025-07-09', '8', 1, 1, 'YXHZAP2318', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(590, '2025-07-09', '8', 1, 3, 'YXHZAJ9451', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(591, '2025-07-09', '8', 8, 33, 'HPW-JG2046D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(592, '2025-07-09', '8', 9, 15, 'GA230926FQ209343', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:53:25', '2025-07-21 23:53:25'),
(593, '2025-07-09', '8', 1, 1, 'YXHDAD3502', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(594, '2025-07-09', '8', 1, 3, 'ZXHZAB2954', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(595, '2025-07-09', '8', 8, 33, 'HPW-JI2641D6H2', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(596, '2025-07-09', '8', 9, 15, 'GA240407FQ239045', 1, 0.00, 0.00, '1', NULL, '2025-07-21 23:57:04', '2025-07-21 23:57:04'),
(597, '2025-07-09', '8', 1, 3, 'ZXHDAA3834', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(598, '2025-07-09', '8', 1, 1, '1', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(599, '2025-07-09', '8', 8, 33, 'GI2583D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(600, '2025-07-09', '8', 9, 15, 'GA240527FQ247909', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:00:50', '2025-07-22 00:00:50'),
(601, '2025-07-09', '8', 1, 3, 'ZXHZAB5034', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(602, '2025-07-09', '8', 1, 1, 'YXHXAA0074', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(603, '2025-07-09', '8', 8, 33, 'GI2526D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(604, '2025-07-09', '8', 9, 15, 'GA240407FQ239047', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:04:59', '2025-07-22 00:04:59'),
(605, '2025-07-09', '8', 8, 33, 'EBBE08446', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:06:48', '2025-07-22 00:18:39'),
(606, '2025-07-09', '8', 1, 3, 'ZXHDAA3838', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(607, '2025-07-09', '8', 1, 1, 'YXHZAB5492', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(608, '2025-07-09', '8', 8, 33, 'HPW-JI2604D06H2', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(609, '2025-07-09', '8', 9, 15, 'GA240527FQ247915', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:09:11', '2025-07-22 00:09:11'),
(610, '2025-07-09', '8', 1, 3, 'YXHZAJ9532', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:13:30', '2025-07-22 00:16:07'),
(611, '2025-07-09', '8', 1, 1, 'YXHZAO4996', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:13:30', '2025-07-22 00:16:07'),
(612, '2025-07-09', '8', 8, 33, 'HPW-101524D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:13:30', '2025-07-22 00:16:07'),
(613, '2025-07-09', '8', 9, 15, 'GA230926FQ209339', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:13:30', '2025-07-22 00:16:07'),
(617, '2025-07-09', '8', 1, 3, 'ZXHZAY1480', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(616, '2025-07-09', '8', 1, 1, 'ZXHZAV00489', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(618, '2025-07-09', '8', 1, 3, 'ZXHZAY0485', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(619, '2025-07-09', '8', 8, 33, 'EBBE08447', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(620, '2025-07-09', '8', 9, 15, 'GA240719FQ258455', 1, 0.00, 0.00, '1', NULL, '2025-07-22 00:35:03', '2025-07-22 00:35:03'),
(623, '2025-07-09', '8', 1, 1, 'ZXHZAV3840', 1, 0.00, 0.00, '1', '0', '2025-07-22 00:58:26', '2025-07-22 01:03:45'),
(624, '2025-07-09', '8', 1, 3, 'ZXHZAX8666', 1, 0.00, 0.00, '1', '0', '2025-07-22 01:00:48', '2025-07-22 01:03:45'),
(625, '2025-07-09', '8', 8, 33, 'EBBD16077', 1, 0.00, 0.00, '1', '0', '2025-07-22 01:01:52', '2025-07-22 01:03:45'),
(626, '2025-07-09', '8', 9, 15, 'GA240719FQ258487', 1, 0.00, 0.00, '1', '0', '2025-07-22 01:03:45', '2025-07-22 01:03:45'),
(627, '2025-07-09', '8', 1, 1, 'ZXHZAV4397', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(628, '2025-07-09', '8', 1, 3, 'ZXHZAY1392', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(629, '2025-07-09', '8', 1, 3, 'ZXHZAY1446', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(630, '2025-07-09', '8', 8, 33, 'EBBC05696', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(631, '2025-07-09', '8', 9, 15, 'GA240729FQ260166', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:10:52', '2025-07-22 01:10:52'),
(632, '2025-07-09', '8', 1, 1, 'ZXHZAV3847', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(633, '2025-07-09', '8', 1, 3, 'ZXHZAY1412', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(634, '2025-07-09', '8', 1, 3, 'ZXHZAY1373', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(635, '2025-07-09', '8', 8, 33, 'EBBD16108', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(636, '2025-07-09', '8', 9, 15, 'GA240719FQ258486', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:18:57', '2025-07-22 01:18:57'),
(637, '2025-07-09', '8', 1, 1, 'ZXHZAV4435', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(638, '2025-07-09', '8', 1, 3, 'ZXHZAV4550', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(639, '2025-07-09', '8', 1, 3, 'ZXHZAV4518', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(640, '2025-07-09', '8', 8, 33, 'EBBD16082', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(641, '2025-07-09', '8', 9, 15, 'GA240719FQ258472', 1, 0.00, 0.00, '1', NULL, '2025-07-22 01:25:14', '2025-07-22 01:25:14'),
(642, '2025-07-09', '8', 1, 1, 'YXHZAO4965', 1, 0.00, 0.00, '1', '0', '2025-07-22 22:03:01', '2025-07-22 23:03:46'),
(643, '2025-07-09', '8', 9, 15, 'Q209335', 1, 0.00, 0.00, '1', '0', '2025-07-22 22:03:01', '2025-07-22 22:52:29'),
(644, '2025-07-09', '8', 8, 33, 'HPW-JG1992D06H2', 1, 0.00, 0.00, '1', '0', '2025-07-22 22:03:01', '2025-07-22 22:52:30'),
(645, '2025-07-09', '8', 1, 3, 'YXHDA64092', 1, 0.00, 0.00, '1', '0', '2025-07-22 22:03:01', '2025-07-22 22:52:30'),
(650, '2025-07-09', '8', 1, 1, 'YXHZAP3656', 1, 0.00, 0.00, '1', NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(651, '2025-07-09', '8', 9, 15, 'GA240527FQ247931', 1, 0.00, 0.00, '1', NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(652, '2025-07-09', '8', 8, 33, 'EBBD05580', 1, 0.00, 0.00, '1', NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(653, '2025-07-09', '8', 1, 2, 'ZXHZAI7521', 1, 0.00, 0.00, '1', NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(654, '2025-07-09', '8', 1, 3, 'ZXHZAB6466', 1, 0.00, 0.00, '1', NULL, '2025-07-22 22:40:39', '2025-07-22 22:40:39'),
(657, '2025-07-09', '8', 1, 2, 'ZXHZA60067', 1, 0.00, 0.00, '1', '0', '2025-07-22 22:52:30', '2025-07-22 22:52:30'),
(659, '2025-07-09', '8', 1, 1, 'YXHZA04973', 1, 0.00, 0.00, '1', NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37'),
(660, '2025-07-09', '8', 9, 15, 'GA240527FQ247937', 1, 0.00, 0.00, '1', NULL, '2025-07-23 00:35:37', '2025-07-23 00:35:37');

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
(26, 10, '30/250 CJA+', 'Mtr', 0, 0, '2024-12-02 04:17:44', '2025-07-17 20:13:41'),
(30, 7, 'THERMAL CABLE', 'Pic', 0, 0, '2025-03-04 00:53:11', '2025-06-10 00:21:48'),
(31, 26, 'SMALL BODY', 'Pic', 0, 0, '2025-03-05 22:25:33', '2025-03-05 22:25:33'),
(32, 26, 'BIG BODY', 'Pic', 0, 0, '2025-03-05 22:25:47', '2025-03-05 22:25:47'),
(33, 8, '30/250', 'Pic', 1, 0, '2025-03-05 22:26:47', '2025-03-06 23:39:39'),
(34, 11, '3*1(30/250)', 'Pic', 0, 0, '2025-03-05 22:30:28', '2025-03-05 22:30:28'),
(35, 25, 'RF', 'Pic', 0, 0, '2025-03-05 22:41:52', '2025-06-10 00:22:28'),
(37, 10, '30/250 Regular', 'Mtr', 0, 0, '2025-03-06 22:34:02', '2025-07-17 20:12:53'),
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
(4, 'Admin', 'admin', 'admin@gmail.com', '$2y$12$fbic1t01sswnXm9H1bw7H.kr6AYMPL3BEQg0tCQ8CC3g7nexq9fXK', 1, '2024-10-08 01:41:21', '2025-03-01 19:17:54'),
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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `manufacture_report_layouts`
--
ALTER TABLE `manufacture_report_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manufacture_report_layout_fields`
--
ALTER TABLE `manufacture_report_layout_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer_payments`
--
ALTER TABLE `tbl_customer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expensive`
--
ALTER TABLE `tbl_expensive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `tbl_reports_items`
--
ALTER TABLE `tbl_reports_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3971;

--
-- AUTO_INCREMENT for table `tbl_report_permission`
--
ALTER TABLE `tbl_report_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
