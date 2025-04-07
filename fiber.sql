-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2025 at 09:18 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.15

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

--
-- Dumping data for table `replacements`
--

INSERT INTO `replacements` (`id`, `sale_id`, `old_item_id`, `new_item_id`, `date`, `old_sr_no`, `new_sr_no`, `note`, `created_at`, `updated_at`) VALUES
(3, '2', '3', '6', '2025-04-02', 'M25150001', 'M25150002', 'MBA', '2025-04-02 22:02:20', '2025-04-02 22:02:20');

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
(1, '1', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(2, '2', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(3, '3', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(4, '15', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(5, '16', '4', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(6, '18', '109', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(7, '19', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(8, '20', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(9, '21', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(10, '22', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(11, '23', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(12, '26', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(13, '30', '3', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(14, '31', '8', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(15, '32', '8', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(16, '33', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(17, '34', '109', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(18, '35', '2', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(19, '37', '4', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(20, '38', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(21, '39', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(22, '40', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03'),
(23, '41', '1', '2025-04-04 22:54:03', '2025-04-04 22:54:03');

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
(18, '30010', 'Accrued Expenses', 'Current Liabilities', '20004', 3, '2024-12-16 02:16:25', '2024-12-16 02:16:25'),
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
(34, '30016', 'Cash at Bank', 'Current Asset', '20001', 3, '2024-12-16 05:53:34', '2024-12-16 05:53:34'),
(35, '40012', 'Bank 1', 'Cash at Bank', '30016', 4, '2024-12-16 05:54:47', '2024-12-16 05:54:47'),
(36, '30017', 'Purchase Account', 'Cost of Goods Sold', '20005', 3, '2024-12-16 06:31:44', '2024-12-16 06:31:44'),
(37, '20006', 'Direct Income', 'Assets', '10001', 2, '2024-12-16 06:32:46', '2024-12-16 06:32:46'),
(38, '20007', 'Indirect Income', 'Assets', '10001', 2, '2024-12-16 06:32:59', '2024-12-16 06:32:59'),
(39, '30018', 'Sales Accounts', 'Direct Income', '20006', 3, '2024-12-16 06:33:13', '2024-12-16 06:33:13'),
(40, '30019', 'Construction Income', 'Direct Income', '20006', 3, '2024-12-16 06:33:25', '2024-12-16 06:33:25'),
(41, '30020', 'Reimbursement Income', 'Direct Income', '20006', 3, '2024-12-16 06:33:42', '2024-12-16 06:33:42'),
(42, '30021', 'Tax', 'Current Liabilities', '20004', 3, '2024-12-16 06:38:12', '2024-12-16 06:38:12'),
(43, '30022', 'Machinery', 'Fixed Assets', '20002', 3, '2024-12-17 05:46:56', '2024-12-17 05:46:56'),
(44, '40013', 'Customer Taksh', 'Accounts Receivable', '30013', 4, '2024-12-25 01:20:53', '2024-12-25 01:20:53'),
(45, '40001', 'Cruz Becker', 'Sales Accounts', '30018', 4, '2024-12-25 06:15:42', '2024-12-25 06:15:42'),
(49, '40014', 'Rahim Mathews', 'Accounts Receivable', '30013', 4, '2025-01-07 07:13:47', '2025-01-07 07:13:47');

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

INSERT INTO `tbl_acc_predefine_account` (`id`, `cashCode`, `bankCode`, `advance`, `fixedAsset`, `purchaseCode`, `salesCode`, `serviceCode`, `customerCode`, `supplierCode`, `costs_of_good_solds`, `vat`, `tax`, `inventoryCode`, `CPLCode`, `LPLCode`, `salary_code`, `emp_npf_contribution`, `empr_npf_contribution`, `emp_icf_contribution`, `empr_icf_contribution`, `prov_state_tax`, `state_tax`, `prov_npfcode`, `created_at`, `updated_at`) VALUES
(1, 30002, 30016, 30014, 20002, 30017, 30018, 3010401, 30013, 30009, 30005, 30021, 30021, 1020401, 2010201, 2010202, 4020501, 4020502, 4020503, 4021201, 0, 5020101, 4021101, 5020102, NULL, '2024-12-17 05:26:12');

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

INSERT INTO `tbl_bank` (`id`, `bank_name`, `branch`, `account_type`, `account_number`, `ifsc_code`, `account_holder_name`, `opening_balance`, `created_at`, `updated_at`) VALUES
(1, 'State Bank Of India', 'Katargam', 'CC', '4132464345', 'SBIN0016040', 'Shri DenisBhai Vora', '20000', '2024-12-18 01:54:15', '2024-12-18 01:54:15'),
(2, 'Reserve Bank Of India', 'Katargam', 'CC', '4132412364345', 'RBIN0016040', 'Shri DenisBhai Vora RBI', '8000', '2024-12-18 07:10:29', '2024-12-18 07:10:29');

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
(1, '20', '23', '0', 'Dolorum veniam plac', 'Maxime suscipit vero', 'Veniam aute deserun', '2024-10-26 02:03:30', '2024-10-26 02:03:30'),
(2, '20', '24', '0', 'amp 0', 'VOLT 0', 'WATT 0', '2024-10-26 04:39:35', '2024-10-26 04:39:35'),
(3, '20', '25', '1', '1', '1', '1', '2024-11-16 01:07:11', '2024-11-16 01:07:11'),
(4, '21', '26', '0', '1', '1', '1', '2024-11-17 23:51:12', '2024-11-17 23:51:12'),
(5, '20', '28', '0', '1', '1', '1', '2024-11-23 00:22:55', '2024-11-23 00:22:55'),
(6, '20', '28', '0', '1', '1', '1', '2024-11-23 00:22:55', '2024-11-23 00:22:55'),
(7, '20', '31', '0', 'Laborum fuga Culpa', 'Aut sit esse volupt', 'Neque quas sit et et', '2024-11-23 02:07:13', '2024-11-23 02:07:13'),
(8, '21', '32', '0', 'Aute obcaecati accus', 'Reprehenderit est u', 'Lorem molestiae mole', '2024-11-23 02:07:59', '2024-11-23 02:07:59'),
(9, '20', '33', '0', 'Nostrud vel qui susc', 'Culpa mollit dolores', 'Dolore qui qui facer', '2024-11-23 02:15:44', '2024-11-23 02:15:44'),
(15, '20', '34', '0', '11', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(16, '20', '34', '0', '11', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(17, '20', '34', '0', '11', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(18, '20', '34', '0', '11', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(19, '20', '35', '0', '0', '0', '0', '2024-11-28 03:56:58', '2024-11-28 03:56:58'),
(20, '20', '35', '0', '0', '0', '0', '2024-11-28 03:56:58', '2024-11-28 03:56:58'),
(21, '20', '36', '0', '0', '0', '0', '2024-11-28 04:13:04', '2024-11-28 04:13:04'),
(22, '20', '36', '0', '0', '0', '0', '2024-11-28 04:13:04', '2024-11-28 04:13:04');

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
(6, 'Jignesh Ramoliya', '0', 'SAHAJANAND TECHNOLOGIES PRIVATE LIMITED DTA, GROUND AND 1ST FLOOR PLOT NO 5526 ROAD NO 55, SACHIN GIDC', '394230', 'Surat', 'Gujarat', '11', 'Abigail Jordan', '36AAACH7409R1Z1', '162, parvati nagar -1,', '395004', 'Surat', 'Gujarat', '2025-01-02 11:27:47', '2025-03-07 17:49:54'),
(9, 'Rahim Mathews', '40014', 'Doloremque provident', '395004', 'Surat', 'GJ', '245435456565', 'Alika Terry', '29GGGGG1314R9Z6', 'Laborum Fugiat vel', '400001', 'Mumbai', 'MH', '2025-01-07 07:13:47', '2025-01-07 07:13:47');

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
(1, 6, '[\"101\"]', 8000.00, NULL, '2025-03-08', 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8k cash,2k reamaing', '2025-03-08 19:42:35', '2025-03-08 19:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expensive`
--

CREATE TABLE `tbl_expensive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) DEFAULT NULL,
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
(1, '2', '23', 'Ut est rerum dolore', 'Dignissimos anim opt', 'Voluptates ut et adi', 'Quibusdam qui nulla', '2024-10-26 02:03:30', '2024-10-26 02:03:30'),
(2, '1', '24', '100', '1', '1', 'watt 1', '2024-10-26 04:39:36', '2024-10-26 04:39:36'),
(3, '1', '25', '93', '1', '11', '1', '2024-11-16 01:07:11', '2024-11-16 01:07:11'),
(4, '2', '26', '74', '1', '1', '1', '2024-11-17 23:51:12', '2024-11-17 23:51:12'),
(5, '1', '28', '45', '1', '1', '1', '2024-11-23 00:22:55', '2024-11-23 00:22:55'),
(6, '1', '28', '80', '1', '1', '1', '2024-11-23 00:22:55', '2024-11-23 00:22:55'),
(7, '2', '31', 'Reprehenderit exerc', 'Eiusmod libero omnis', 'Ipsa labore id amet', 'Non et dolorem in ex', '2024-11-23 02:07:13', '2024-11-23 02:07:13'),
(8, '3', '32', 'Ut quam enim molesti', 'Accusamus consectetu', 'Expedita vitae asper', 'Autem modi corporis', '2024-11-23 02:07:59', '2024-11-23 02:07:59'),
(9, '1', '33', 'Tempore nulla commo', 'Molestiae quam cupid', 'Doloremque qui ea ip', 'Ex hic dolores eum o', '2024-11-23 02:15:44', '2024-11-23 02:15:44'),
(13, '1', '34', '1501', '1', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(14, '1', '34', '1505', '1', '1', '1', '2024-11-25 06:24:49', '2024-11-25 06:24:49'),
(15, '1', '35', '15', '0', '0', '0', '2024-11-28 03:56:58', '2024-11-28 03:56:58'),
(16, '1', '35', '27', '0', '0', '0', '2024-11-28 03:56:58', '2024-11-28 03:56:58'),
(17, '1', '36', '67', '0', '0', '0', '2024-11-28 04:13:04', '2024-11-28 04:13:04'),
(18, '2', '36', '74', '1', '0', '0', '2024-11-28 04:13:04', '2024-11-28 04:13:04');

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
(5, 'opening stock', '24165464', '45454545', 'dfsdfs', '2024-10-22 00:48:40', '2024-10-22 00:48:40'),
(8, 'OPTO TUNE', 'CHINA', '987465467', 'DENIS', '2025-03-01 17:27:12', '2025-03-01 17:27:12');

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
(1, NULL, '2025-03-05', '1', 8, 40000, 12.00, '480000.00', '0', '0', '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(2, 'Electronic', '2025-03-07', '2', 8, 2000, 12.00, '24000.00', '1000', '0', '2025-03-08 00:45:06', '2025-03-08 00:45:06'),
(3, 'Optical', '2025-03-11', '4', 8, 24000, 12.00, '288000.00', '0', '0', '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(4, 'Consumable', '2025-03-11', '5', 8, 900, 12.00, '10800.00', '200', '0', '2025-03-11 22:22:07', '2025-03-11 22:22:07'),
(5, 'Consumable', '2025-03-11', '6', 8, 1300, 12.00, '15600.00', '200', '0', '2025-03-11 22:45:27', '2025-03-11 22:45:27'),
(6, 'Electronic', '2025-03-17', '3', 8, 1800, 12.00, '21600.00', '0', '0', '2025-03-17 16:59:04', '2025-03-17 16:59:04'),
(7, 'Electronic', '2025-03-17', '7', 8, 1000, 12.00, '12000.00', '0', '0', '2025-03-17 18:58:34', '2025-03-17 18:58:34'),
(8, 'Mechanical', '2025-03-24', '8', 8, 18000, 12.00, '216000.00', '0', '0', '2025-03-24 17:23:20', '2025-03-24 17:23:20'),
(9, 'Optical', '2025-03-25', '109', 8, 610000, 2.00, '1220000.00', '0', '0', '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(10, 'Optical', '2025-04-03', '11', 8, 200000, 80.00, '16000000.00', '0', '0', '2025-04-03 22:51:36', '2025-04-03 22:51:36');

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
(1, '1', '1', '1', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(2, '1', '1', '2', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(3, '1', '1', '3', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(5, '1', '7', '20', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(6, '1', '7', '21', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(7, '1', '7', '30', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(8, '1', '8', '22', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(9, '1', '8', '33', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(10, '1', '9', '15', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(11, '1', '10', '16', 500, 'Mtr', 10.00, '0', 5000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(12, '1', '10', '26', 500, 'Mtr', 10.00, '0', 5000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(14, '1', '11', '34', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(15, '1', '12', '23', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(18, '1', '26', '31', 10, 'Pic', 150.00, '0', 1500.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(19, '1', '26', '32', 10, 'Pic', 150.00, '0', 1500.00, '2025-03-05 22:53:22', '2025-03-05 22:53:22'),
(20, '2', '7', '20', 100, 'Pic', 10.00, '0', 1000.00, '2025-03-08 00:45:06', '2025-03-08 00:45:06'),
(21, '2', '25', '35', 100, 'Pic', 10.00, '0', 1000.00, '2025-03-08 00:45:06', '2025-03-08 00:45:06'),
(22, '4', '1', '1', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(23, '4', '6', '19', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(24, '4', '8', '22', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(25, '4', '10', '16', 1000, 'Mtr', 8.00, '0', 8000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(26, '4', '10', '37', 1000, 'Mtr', 12.00, '0', 12000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(27, '4', '9', '15', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-11 18:43:28', '2025-03-11 18:43:28'),
(28, '5', '27', '38', 10, 'Pic', 25.00, '0', 250.00, '2025-03-11 22:22:07', '2025-03-11 22:22:07'),
(29, '5', '27', '39', 10, 'Pic', 35.00, '0', 350.00, '2025-03-11 22:22:07', '2025-03-11 22:22:07'),
(30, '5', '27', '40', 10, 'Pic', 30.00, '0', 300.00, '2025-03-11 22:22:07', '2025-03-11 22:22:07'),
(31, '6', '27', '38', 10, 'Pic', 25.00, '0', 250.00, '2025-03-11 22:45:27', '2025-03-11 22:45:27'),
(32, '6', '27', '39', 10, 'Pic', 35.00, '0', 350.00, '2025-03-11 22:45:27', '2025-03-11 22:45:27'),
(33, '6', '27', '40', 10, 'Pic', 30.00, '0', 300.00, '2025-03-11 22:45:27', '2025-03-11 22:45:27'),
(34, '6', '27', '41', 10, 'Pic', 40.00, '0', 400.00, '2025-03-11 22:45:27', '2025-03-11 22:45:27'),
(35, '3', '7', '30', 25, 'Pic', 100.00, '0', 1000.00, '2025-03-17 16:59:04', '2025-03-17 16:59:04'),
(36, '3', '25', '35', 10, 'Pic', 80.00, '0', 800.00, '2025-03-17 16:59:04', '2025-03-17 16:59:04'),
(37, '7', '25', '35', 10, 'Pic', 100.00, '0', 1000.00, '2025-03-17 18:58:34', '2025-03-17 18:58:34'),
(38, '8', '26', '32', 100, 'Pic', 100.00, '0', 10000.00, '2025-03-24 17:23:20', '2025-03-24 17:23:20'),
(39, '8', '26', '31', 100, 'Pic', 80.00, '0', 8000.00, '2025-03-24 17:23:20', '2025-03-24 17:23:20'),
(40, '109', '1', '1', 100, 'Pic', 400.00, '0', 40000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(41, '109', '1', '2', 100, 'Pic', 500.00, '0', 50000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(42, '109', '1', '3', 100, 'Pic', 600.00, '0', 60000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(43, '109', '8', '22', 100, 'Pic', 700.00, '0', 70000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(44, '109', '8', '33', 100, 'Pic', 800.00, '0', 80000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(45, '109', '6', '19', 100, 'Pic', 900.00, '0', 90000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(46, '109', '9', '15', 100, 'Pic', 1000.00, '0', 100000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(47, '109', '10', '16', 5000, 'Mtr', 5.00, '0', 25000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(48, '109', '10', '26', 3000, 'Mtr', 5.00, '0', 15000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(49, '109', '10', '37', 4000, 'Mtr', 5.00, '0', 20000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(50, '109', '11', '18', 100, 'Pic', 300.00, '0', 30000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(51, '109', '11', '34', 100, 'Pic', 200.00, '0', 20000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(52, '109', '12', '23', 100, 'Pic', 100.00, '0', 10000.00, '2025-03-25 20:13:13', '2025-03-25 20:13:13'),
(53, '11', '1', '3', 200, 'Pic', 1000.00, '0', 200000.00, '2025-04-03 22:51:36', '2025-04-03 22:51:36');

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
  `stock_status` varchar(191) DEFAULT '0',
  `sale_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`id`, `part`, `f_status`, `worker_name`, `sr_no_fiber`, `m_j`, `type`, `note1`, `note2`, `section`, `remark`, `status`, `temp`, `r_status`, `party_name`, `final_amount`, `stock_status`, `sale_status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'DENIS', 'M25150001', 'MJ', '1', 'ELE DONE', 'User DONE', '3', NULL, 1, '0', 1, NULL, 4640, '1', '1', '2025-04-01 18:41:44', '2025-04-04 00:14:32'),
(2, 0, 1, 'Parth', 'M25210001', 'P', '3', NULL, NULL, '4', NULL, 1, NULL, 0, NULL, 1500, '0', '1', '2025-04-01 22:21:56', '2025-04-02 23:57:58'),
(4, 1, 1, 'DENIS 3', 'M25150001', 'MJ', '1', NULL, NULL, '3', NULL, 1, NULL, 1, NULL, 300, '1', '0', '2025-04-02 01:00:57', '2025-04-04 00:14:32'),
(6, 0, 1, 'DENIS 2', 'M25150002', NULL, '1', NULL, NULL, '4', NULL, 1, NULL, 0, NULL, 5044, '1', '1', '2025-04-02 19:31:49', '2025-04-02 22:02:20'),
(7, 1, 0, 'D 1', 'M22150001', 'MJ', '1', 'Repair Third Party', NULL, '4', NULL, 1, NULL, 1, NULL, 248, '0', '1', '2025-04-04 18:22:02', '2025-04-04 19:09:34'),
(10, 0, 1, 'D 2', 'M25180001', 'MJ', '2', 'Diovde 18', NULL, '0', NULL, 1, NULL, 0, NULL, 2300, '1', '0', '2025-04-04 22:22:36', '2025-04-06 00:17:24'),
(11, 0, 1, NULL, NULL, NULL, NULL, 'M25260001', 'M25260001', '1', NULL, NULL, NULL, 0, NULL, 562, '0', '0', '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(12, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 250, '0', '0', '2025-04-05 17:53:10', '2025-04-05 17:53:10');

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
(59, '21', 'Pic', '1', '0', '100', '0', '1', NULL, NULL, NULL, '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(58, '35', 'Pic', '1', '0', '131', '0', '1', NULL, NULL, NULL, '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(57, '2', 'Pic', '1', '0', '1', 'ZXHZBB2330', '1', '1.2', '2.1', '6', '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(56, '16', 'Mtr', '1', '0', '127', '0', '5', NULL, NULL, NULL, '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(53, '19', 'Pic', '1', '0', '89', 'HRAAAB3001', '1', '1.0', '3.1', '15', '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(54, '31', 'Pic', '1', '0', '233', '0', '1', NULL, NULL, NULL, '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(55, '15', 'Pic', '1', '1', '114', 'AOMQSW5001', '1', '10', '4.1', '10', '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(52, '1', 'Pic', '1', '0', '11', 'ZXHZBA9278', '1', '1.2', '2.2', '2.3', '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(51, '23', 'Pic', '1', '0', '125', '0', '1', NULL, NULL, NULL, '2025-04-01 18:56:51', '2025-04-01 18:56:51'),
(133, '1', 'Pic', '2', '0', '12', 'ZXHZBB5555', '1', '14', '44', '4', '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(132, '31', 'Pic', '2', '0', '233', '0', '1', NULL, NULL, NULL, '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(131, '21', 'Pic', '2', '0', '100', '0', '1', NULL, NULL, NULL, '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(130, '30', 'Pic', '2', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(129, '20', 'Pic', '2', '0', '99', '0', '1', NULL, NULL, NULL, '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(128, '35', 'Pic', '2', '0', '131', '0', '1', NULL, NULL, NULL, '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(73, '19', 'Pic', '5', '0', '90', 'HRAAAB3002', '1', '10', '4.1', '1.5', '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(74, '2', 'Pic', '5', '0', '4', 'ZXHZBB2571', '1', '5.1', '16', '2.4', '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(71, '2', 'Pic', '4', '0', '3', 'ZXHZBB2307', '1', '10', '4.1', '1.5', '2025-04-02 01:00:57', '2025-04-02 01:00:57'),
(72, '1', 'Pic', '4', '0', '15', 'ZXHZBA9063', '1', '4.2', '10', '1.5', '2025-04-02 01:00:57', '2025-04-02 01:00:57'),
(75, '22', 'Pic', '5', '0', '79', 'ISAAAB2008', '1', '7.45', '4.5', '1.6', '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(76, '31', 'Pic', '5', '0', '233', '0', '1', NULL, NULL, NULL, '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(77, '30', 'Pic', '5', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(78, '16', 'Mtr', '5', '0', '127', '0', '7', NULL, NULL, NULL, '2025-04-02 19:24:12', '2025-04-02 19:24:12'),
(126, '35', 'Pic', '6', '0', '131', '0', '1', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(125, '23', 'Pic', '6', '0', '125', '0', '3', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(124, '2', 'Pic', '6', '0', '6', 'ZXHZBB2456', '1', '4.2', '4.2', '42', '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(123, '1', 'Pic', '6', '0', '13', 'ZXHZBB5550', '1', '4.2', '4.1', '1.5', '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(122, '34', 'Pic', '6', '0', '62', '0', '1', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(121, '22', 'Pic', '6', '0', '87', 'ISAAAB2010', '1', '10', '4.1', '10', '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(120, '31', 'Pic', '6', '0', '233', '0', '1', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(119, '21', 'Pic', '6', '0', '100', '0', '1', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(118, '15', 'Pic', '6', '0', '115', 'AOMQSW5002', '1', '7.2', '6.4', '5.7', '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(117, '16', 'Mtr', '6', '0', '127', '0', '7', NULL, NULL, NULL, '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(127, '19', 'Pic', '6', '0', '91', 'HRAAAB3003', '1', '8.4', '7.5', '6.4', '2025-04-02 19:47:10', '2025-04-02 19:47:10'),
(134, '2', 'Pic', '2', '0', '2', 'ZXHZBB2663', '1', '14', '44', '4', '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(135, '19', 'Pic', '2', '0', '92', 'HRAAAB3004', '1', '14', '44', '4', '2025-04-02 23:53:24', '2025-04-02 23:53:24'),
(136, '1', 'Pic', '7', '0', '11', 'ZXHZBA9278', '1', '10', '10', '42', '2025-04-04 18:22:02', '2025-04-04 18:22:02'),
(137, '16', 'Mtr', '7', '0', '127', '0', '10', NULL, NULL, NULL, '2025-04-04 18:22:02', '2025-04-04 18:22:02'),
(138, '30', 'Pic', '7', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-04 18:22:02', '2025-04-04 18:22:02'),
(139, '1', 'Pic', '8', '0', '14', 'ZXHZBB5560', '1', '4.2', '10', '1.5', '2025-04-04 22:06:38', '2025-04-04 22:06:38'),
(188, '23', 'Pic', '10', '0', '125', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(187, '15', 'Pic', '10', '0', '122', 'AOMQSW5009', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(186, '35', 'Pic', '10', '0', '435', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(185, '35', 'Pic', '10', '1', '435', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(184, '32', 'Pic', '10', '0', '132', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(183, '30', 'Pic', '10', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(181, '22', 'Pic', '10', '0', '78', 'ISAAAB2007', '1', '8.1', '64', '51', '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(182, '1', 'Pic', '10', '0', '15', 'ZXHZBA9063', '1', '4.2', '4.1', '1.5', '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(180, '32', 'Pic', '10', '0', '132', '0', '1', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(189, '18', 'Pic', '10', '0', '436', '0', '0', NULL, NULL, NULL, '2025-04-04 22:54:09', '2025-04-04 22:54:09'),
(190, '1', 'Pic', '11', '0', '16', 'ZXHZBA9277', '1', '1.0', '2.2', '2.3', '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(191, '19', 'Pic', '11', '1', '89', 'HRAAAB3001', '1', '4', '2.2', '6', '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(192, '37', 'Mtr', '11', '1', '234', '0', '7.5', NULL, NULL, NULL, '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(193, '26', 'Mtr', '11', '0', '124', '0', '7.5', NULL, NULL, NULL, '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(194, '32', 'Pic', '11', '0', '132', '0', '1', NULL, NULL, NULL, '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(195, '30', 'Pic', '11', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(196, '20', 'Pic', '11', '0', '99', '0', '1', NULL, NULL, NULL, '2025-04-05 17:45:26', '2025-04-05 17:45:26'),
(197, '20', 'Pic', '12', '0', '99', '0', '1', NULL, NULL, NULL, '2025-04-05 17:53:10', '2025-04-05 17:53:10'),
(198, '1', 'Pic', '12', '0', '102', 'ZXHZBA9011', '1', '1', '2.2', '2.3', '2025-04-05 17:53:10', '2025-04-05 17:53:10'),
(199, '35', 'Pic', '12', '0', '435', '0', '1', NULL, NULL, NULL, '2025-04-05 17:53:10', '2025-04-05 17:53:10'),
(200, '30', 'Pic', '12', '0', '129', '0', '1', NULL, NULL, NULL, '2025-04-05 17:53:10', '2025-04-05 17:53:10');

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
(1, '1', '2025-04-01', 6, '0', '0', 105000.00, 0.00, 0.00, 105000.00, NULL, '2025-04-01 21:36:48', '2025-04-01 21:37:33'),
(2, '2', '2025-04-02', 6, '0', '1', 0.00, 0.00, 0.00, 0.00, NULL, '2025-04-02 18:32:50', '2025-04-02 18:32:50'),
(3, '3', '2025-04-02', 6, '1', '0', 105000.00, 0.00, 0.00, 105000.00, NULL, '2025-04-02 23:55:51', '2025-04-02 23:57:58'),
(4, '4', '2025-04-04', 9, '0', '1', 4100.00, 0.00, 0.00, 4100.00, NULL, '2025-04-04 19:09:34', '2025-04-04 19:09:34');

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
(2, '1', '1', '1', '1', '4', 'Pic', 'M25150001', '1', '105000', '0', 105000.00, '0', '2025-04-01 21:37:33', '2025-04-01 21:37:33'),
(3, '2', '2', '1', '1', '4', 'Pic', 'M25150001', '1', '0', '0', 0.00, '1', '2025-04-02 18:32:50', '2025-04-02 22:02:20'),
(8, '3', '3', '2', '1', '4', 'Pic', 'M25210001', '1', '105000', '0', 105000.00, '0', '2025-04-02 23:57:58', '2025-04-02 23:57:58'),
(6, '2', '2', '6', '1', '4', 'Pic', 'M25150002', '1', '0', '0', 0.00, '0', '2025-04-02 22:02:20', '2025-04-02 22:02:20'),
(9, '4', '4', '7', '1', '4', 'Pic', 'M22150001', '1', '4100', '0', 4100.00, '0', '2025-04-04 19:09:34', '2025-04-04 19:09:34');

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
(1, 'Fiber', '1', '2024-12-20 01:23:37', '2024-12-20 01:28:19');

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
(7, 1, '26', 'Pic', 1, '2024-12-20 06:39:27', '2024-12-20 06:39:27');

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
(2, '2025-04-01', '6', '1', 'M25150001', '1', '4', 1, 'Pic', 105000.00, 'LD', '2025-04-02 00:10:59', '2025-04-02 00:10:59'),
(3, '2025-04-02', '6', '2', 'M25150001', '1', '4', 1, 'Pic', 0.00, '14 Gaya.', '2025-04-02 18:45:59', '2025-04-02 18:45:59');

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
(1, '2025-03-05', '1', 1, 2, 'ZXHZBB2330', 1, 1000.00, 100.00, '0', '0', '2025-03-06 00:07:27', '2025-04-04 01:07:08'),
(2, '2025-03-05', '1', 1, 2, 'ZXHZBB2663', 1, 1000.00, 100.00, '1', '0', '2025-03-06 00:07:27', '2025-04-03 22:23:36'),
(3, '2025-03-05', '1', 1, 2, 'ZXHZBB2307', 1, 1000.00, 100.00, '0', '0', '2025-03-06 00:07:27', '2025-04-04 00:14:32'),
(4, '2025-03-05', '1', 1, 2, 'ZXHZBB2571', 1, 1000.00, 100.00, '1', '0', '2025-03-06 00:07:27', '2025-04-02 19:24:12'),
(5, '2025-03-05', '1', 1, 2, 'ZXHZBA9053', 1, 1000.00, 100.00, '0', '0', '2025-03-06 00:07:27', '2025-03-29 01:25:33'),
(6, '2025-03-05', '1', 1, 2, 'ZXHZBB2456', 1, 1000.00, 100.00, '1', '0', '2025-03-06 00:07:27', '2025-04-02 19:47:10'),
(104, '2025-03-05', '1', 8, 33, 'ISOTRA3001', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-11 01:00:09'),
(9, '2025-03-05', '1', 1, 2, 'ZXHZAZ2222', 1, 1000.00, 100.00, '0', '0', '2025-03-06 00:07:27', '2025-03-06 00:07:27'),
(10, '2025-03-05', '1', 1, 2, 'ZXHZBA9394', 1, 1000.00, 100.00, '0', '0', '2025-03-06 00:07:27', '2025-03-06 00:07:27'),
(11, '2025-03-05', '1', 1, 1, 'ZXHZBA9278', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:13:30', '2025-04-04 18:22:02'),
(12, '2025-03-05', '1', 1, 1, 'ZXHZBB5555', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:13:30', '2025-04-02 23:53:24'),
(13, '2025-03-05', '1', 1, 1, 'ZXHZBB5550', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:13:30', '2025-04-02 19:47:10'),
(14, '2025-03-05', '1', 1, 1, 'ZXHZBB5560', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:13:30', '2025-04-04 22:06:38'),
(15, '2025-03-05', '1', 1, 1, 'ZXHZBA9063', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:13:30', '2025-04-04 22:54:09'),
(16, '2025-03-05', '1', 1, 1, 'ZXHZBA9277', 1, 1000.00, 200.00, '1', '0', '2025-03-06 00:30:04', '2025-04-05 17:45:26'),
(102, '2025-03-05', '1', 1, 1, 'ZXHZBA9011', 1, 1000.00, 100.00, '1', '0', '2025-03-06 23:14:52', '2025-04-05 17:53:10'),
(103, '2025-03-05', '1', 1, 1, 'ZXHZAZ0750', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:14:52', '2025-03-29 23:48:25'),
(19, '2025-03-05', '1', 1, 1, 'ZXHZBA9351', 1, 1000.00, 200.00, '0', '0', '2025-03-06 00:30:04', '2025-03-30 00:49:11'),
(20, '2025-03-05', '1', 1, 1, 'ZXHZBB5557', 1, 1000.00, 200.00, '0', '0', '2025-03-06 00:30:04', '2025-03-06 00:30:04'),
(22, '2025-03-05', '1', 10, 16, '0', 500, 5000.00, 10.00, '0', '0', '2025-03-06 00:34:42', '2025-04-03 22:17:56'),
(52, '2025-03-05', '1', 1, 3, 'ZXHZBC0389', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-17 18:56:18'),
(53, '2025-03-05', '1', 1, 3, 'ZXHZBC0241', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-17 19:01:15'),
(54, '2025-03-05', '1', 1, 3, 'ZXHZBA9408', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-24 19:15:58'),
(55, '2025-03-05', '1', 1, 3, 'ZXHZAY7615', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-06 18:07:09'),
(56, '2025-03-05', '1', 1, 3, 'ZXHZBD3709', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-06 18:07:09'),
(57, '2025-03-05', '1', 1, 3, 'ZXHZBB5580', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-06 18:07:09'),
(58, '2025-03-05', '1', 1, 3, 'ZXHZBB2375', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:09', '2025-03-29 23:48:25'),
(59, '2025-03-05', '1', 1, 3, 'ZXHZBB8072', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:51', '2025-03-06 18:07:51'),
(60, '2025-03-05', '1', 1, 3, 'ZXHZBC0807', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:51', '2025-03-06 18:07:51'),
(61, '2025-03-05', '1', 1, 3, 'ZXHZBC0380', 1, 1000.00, 100.00, '0', '0', '2025-03-06 18:07:51', '2025-03-24 19:34:44'),
(62, '2025-03-05', '1', 11, 34, '0', 10, 1000.00, 100.00, '1', '0', '2025-03-06 18:09:33', '2025-04-02 19:31:49'),
(87, '2025-03-05', '1', 8, 22, 'ISAAAB2010', 1, 1000.00, 100.00, '1', '0', '2025-03-06 19:53:01', '2025-04-02 19:47:10'),
(79, '2025-03-05', '1', 8, 22, 'ISAAAB2008', 1, 1000.00, 100.00, '1', '0', '2025-03-06 19:31:57', '2025-04-02 19:24:12'),
(78, '2025-03-05', '1', 8, 22, 'ISAAAB2007', 1, 1000.00, 100.00, '1', '0', '2025-03-06 19:31:57', '2025-04-04 22:54:09'),
(77, '2025-03-05', '1', 8, 22, 'ISAAAB2006', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-06 19:30:53'),
(76, '2025-03-05', '1', 8, 22, 'ISAAAB2005', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-06 19:30:53'),
(75, '2025-03-05', '1', 8, 22, 'ISAAAB2004', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-06 19:30:53'),
(74, '2025-03-05', '1', 8, 22, 'ISAAAB2003', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-06 19:30:53'),
(73, '2025-03-05', '1', 8, 22, 'ISAAAB2002', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-06 19:30:53'),
(72, '2025-03-05', '1', 8, 22, 'ISAAAB2001', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:30:53', '2025-03-19 19:00:54'),
(86, '2025-03-05', '1', 8, 22, 'ISAAAB2009', 1, 1000.00, 100.00, '0', '0', '2025-03-06 19:53:01', '2025-03-06 19:53:01'),
(88, '2025-03-05', '1', 7, 30, '0', 10, 1000.00, 100.00, '0', '0', '2025-03-06 20:20:20', '2025-03-11 01:00:09'),
(89, '2025-03-05', '1', 6, 19, 'HRAAAB3001', 1, 1000.00, 100.00, '1', '1', '2025-03-06 20:20:40', '2025-04-05 17:45:26'),
(90, '2025-03-05', '1', 6, 19, 'HRAAAB3002', 1, 1000.00, 100.00, '1', '0', '2025-03-06 20:20:40', '2025-04-02 19:24:12'),
(91, '2025-03-05', '1', 6, 19, 'HRAAAB3003', 1, 1000.00, 100.00, '1', '0', '2025-03-06 20:20:40', '2025-04-02 19:47:10'),
(92, '2025-03-05', '1', 6, 19, 'HRAAAB3004', 1, 1000.00, 100.00, '1', '0', '2025-03-06 20:20:40', '2025-04-02 23:53:24'),
(93, '2025-03-05', '1', 6, 19, 'HRAAAB3005', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-24 17:24:04'),
(94, '2025-03-05', '1', 6, 19, 'HRAAAB3006', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-06 20:21:48'),
(95, '2025-03-05', '1', 6, 19, 'HRAAAB3007', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-06 20:21:48'),
(96, '2025-03-05', '1', 6, 19, 'HRAAAB3008', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-06 20:21:48'),
(97, '2025-03-05', '1', 6, 19, 'HRAAAB3009', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-06 20:21:48'),
(98, '2025-03-05', '1', 6, 19, 'HRAAAB3010', 1, 1000.00, 100.00, '0', '0', '2025-03-06 20:21:48', '2025-03-06 20:21:48'),
(99, '2025-03-05', '1', 7, 20, '0', 10, 1000.00, 100.00, '1', '0', '2025-03-06 20:22:44', '2025-04-01 22:21:56'),
(100, '2025-03-05', '1', 7, 21, '0', 10, 1000.00, 100.00, '0', '0', '2025-03-06 20:24:25', '2025-04-04 00:14:32'),
(101, '2025-03-05', '1', 26, 32, '0', 10, 1500.00, 150.00, '0', '0', '2025-03-06 22:15:25', '2025-03-07 00:38:05'),
(105, '2025-03-05', '1', 8, 33, 'ISOTRA3002', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-22 19:24:43'),
(106, '2025-03-05', '1', 8, 33, 'ISOTRA3003', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(107, '2025-03-05', '1', 8, 33, 'ISOTRA3004', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(108, '2025-03-05', '1', 8, 33, 'ISOTRA3005', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(109, '2025-03-05', '1', 8, 33, 'ISOTRA3006', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(110, '2025-03-05', '1', 8, 33, 'ISOTRA3007', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(111, '2025-03-05', '1', 8, 33, 'ISOTRA3008', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(112, '2025-03-05', '1', 8, 33, 'ISOTRA3009', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(113, '2025-03-05', '1', 8, 33, 'ISOTRA3010', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:46:41', '2025-03-06 23:46:41'),
(114, '2025-03-05', '1', 9, 15, 'AOMQSW5001', 1, 1000.00, 100.00, '0', '1', '2025-03-06 23:47:00', '2025-04-04 00:14:32'),
(115, '2025-03-05', '1', 9, 15, 'AOMQSW5002', 1, 1000.00, 100.00, '1', '0', '2025-03-06 23:47:00', '2025-04-02 19:47:10'),
(116, '2025-03-05', '1', 9, 15, 'AOMQSW5003', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-03-24 17:24:04'),
(117, '2025-03-05', '1', 9, 15, 'AOMQSW5004', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-03-06 23:47:00'),
(118, '2025-03-05', '1', 9, 15, 'AOMQSW5005', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-03-29 01:25:34'),
(119, '2025-03-05', '1', 9, 15, 'AOMQSW5006', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-03-07 17:10:24'),
(120, '2025-03-05', '1', 9, 15, 'AOMQSW5007', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-04-03 22:19:24'),
(121, '2025-03-05', '1', 9, 15, 'AOMQSW5008', 1, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:00', '2025-03-06 23:47:00'),
(122, '2025-03-05', '1', 9, 15, 'AOMQSW5009', 1, 1000.00, 100.00, '1', '0', '2025-03-06 23:47:00', '2025-04-04 22:54:09'),
(123, '2025-03-05', '1', 9, 15, 'AOMQSW5010', 1, 1000.00, 100.00, '1', '0', '2025-03-06 23:47:00', '2025-04-04 22:24:15'),
(124, '2025-03-05', '1', 10, 26, '0', 500, 5000.00, 10.00, '1', '0', '2025-03-06 23:47:14', '2025-04-05 17:45:26'),
(125, '2025-03-05', '1', 12, 23, '0', 10, 1000.00, 100.00, '0', '0', '2025-03-06 23:47:32', '2025-03-07 00:38:05'),
(126, '2025-03-05', '1', 26, 31, '0', 10, 1500.00, 150.00, '0', '0', '2025-03-06 23:47:36', '2025-03-06 23:47:36'),
(127, '2025-03-11', '4', 10, 16, '0', 1000, 8000.00, 8.00, '1', '0', '2025-03-13 18:09:19', '2025-04-04 18:22:02'),
(129, '2025-03-17', '3', 7, 30, '0', 25, 2500.00, 40.00, '1', '0', '2025-03-17 17:42:36', '2025-04-01 22:21:56'),
(130, '2025-03-17', '7', 25, 35, '0', 10, 1000.00, 100.00, '0', '0', '2025-03-17 19:01:15', '2025-03-17 19:01:15'),
(131, '2025-03-17', '3', 25, 35, '0', 10, 800.00, 80.00, '0', '0', '2025-03-18 01:13:54', '2025-04-04 00:14:32'),
(132, '2025-03-24', '8', 26, 32, '0', 100, 10000.00, 100.00, '1', '0', '2025-03-24 17:24:04', '2025-04-04 22:22:36'),
(133, '2025-03-25', '109', 1, 1, 'LDZHCB1501', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(134, '2025-03-25', '109', 1, 1, 'LDXJVR1502', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(135, '2025-03-25', '109', 1, 1, 'LDQWYT1503', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(136, '2025-03-25', '109', 1, 1, 'LDPZBC1504', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(137, '2025-03-25', '109', 1, 1, 'LDMKLQ1505', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(138, '2025-03-25', '109', 1, 1, 'LDRTYU1506', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(139, '2025-03-25', '109', 1, 1, 'LDASDF1507', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(140, '2025-03-25', '109', 1, 1, 'LDZXCV1508', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(141, '2025-03-25', '109', 1, 1, 'LDPOIU1509', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(142, '2025-03-25', '109', 1, 1, 'LDLKJH1510', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(143, '2025-03-25', '109', 1, 1, 'LDMNBV1511', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(144, '2025-03-25', '109', 1, 1, 'LDQAZX1512', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(145, '2025-03-25', '109', 1, 1, 'LDWSXE1513', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(146, '2025-03-25', '109', 1, 1, 'LDEDCR1514', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(147, '2025-03-25', '109', 1, 1, 'LDRFVT1515', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(148, '2025-03-25', '109', 1, 1, 'LDTGBY1516', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(149, '2025-03-25', '109', 1, 1, 'LDYHNU1517', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(150, '2025-03-25', '109', 1, 1, 'LDUJMI1518', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(151, '2025-03-25', '109', 1, 1, 'LDIKOL1519', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(152, '2025-03-25', '109', 1, 1, 'LDOLPW1520', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(153, '2025-03-25', '109', 1, 1, 'LDPLMN1521', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(154, '2025-03-25', '109', 1, 1, 'LDZXSD1522', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(155, '2025-03-25', '109', 1, 1, 'LDQWER1523', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(156, '2025-03-25', '109', 1, 1, 'LDASDE1524', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(157, '2025-03-25', '109', 1, 1, 'LDFGHY1525', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(158, '2025-03-25', '109', 1, 1, 'LDBVCM1526', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(159, '2025-03-25', '109', 1, 1, 'LDNMBT1527', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(160, '2025-03-25', '109', 1, 1, 'LDLKOP1528', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(161, '2025-03-25', '109', 1, 1, 'LDPLKI1529', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(162, '2025-03-25', '109', 1, 1, 'LDZXCV1530', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(163, '2025-03-25', '109', 1, 1, 'LDQWER1531', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(164, '2025-03-25', '109', 1, 1, 'LDASDF1532', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(165, '2025-03-25', '109', 1, 1, 'LDZXCQ1533', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(166, '2025-03-25', '109', 1, 1, 'LDWSXE1534', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(167, '2025-03-25', '109', 1, 1, 'LDRFVT1535', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(168, '2025-03-25', '109', 1, 1, 'LDTGBY1536', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(169, '2025-03-25', '109', 1, 1, 'LDYHNU1537', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(170, '2025-03-25', '109', 1, 1, 'LDUJMI1538', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(171, '2025-03-25', '109', 1, 1, 'LDIKOL1539', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(172, '2025-03-25', '109', 1, 1, 'LDOLPL1540', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(173, '2025-03-25', '109', 1, 1, 'LDPLMN1541', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(174, '2025-03-25', '109', 1, 1, 'LDZXSD1542', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(175, '2025-03-25', '109', 1, 1, 'LDQWER1543', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(176, '2025-03-25', '109', 1, 1, 'LDASDE1544', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(177, '2025-03-25', '109', 1, 1, 'LDFGHU1545', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(178, '2025-03-25', '109', 1, 1, 'LDBVCN1546', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(179, '2025-03-25', '109', 1, 1, 'LDNMBU1547', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(180, '2025-03-25', '109', 1, 1, 'LDLKIO1548', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(181, '2025-03-25', '109', 1, 1, 'LDPLKY1549', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(182, '2025-03-25', '109', 1, 1, 'LDZXCV1550', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(183, '2025-03-25', '109', 1, 1, 'LDQWER1551', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(184, '2025-03-25', '109', 1, 1, 'LDASDF1552', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(185, '2025-03-25', '109', 1, 1, 'LDZXCQ1553', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(186, '2025-03-25', '109', 1, 1, 'LDWSXE1554', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(187, '2025-03-25', '109', 1, 1, 'LDRFVT1555', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(188, '2025-03-25', '109', 1, 1, 'LDTGBY1556', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(189, '2025-03-25', '109', 1, 1, 'LDYHNU1557', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(190, '2025-03-25', '109', 1, 1, 'LDUJMI1558', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(191, '2025-03-25', '109', 1, 1, 'LDIKOL1559', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(192, '2025-03-25', '109', 1, 1, 'LDOLPQ1560', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(193, '2025-03-25', '109', 1, 1, 'LDPLMN1561', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(194, '2025-03-25', '109', 1, 1, 'LDZXSD1562', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(195, '2025-03-25', '109', 1, 1, 'LDQWER1563', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(196, '2025-03-25', '109', 1, 1, 'LDASDE1564', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(197, '2025-03-25', '109', 1, 1, 'LDFGHU1565', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(198, '2025-03-25', '109', 1, 1, 'LDBVNC1566', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(199, '2025-03-25', '109', 1, 1, 'LDNMBS1567', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(200, '2025-03-25', '109', 1, 1, 'LDLKIT1568', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(201, '2025-03-25', '109', 1, 1, 'LDPLKI1569', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(202, '2025-03-25', '109', 1, 1, 'LDZXCV1570', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(203, '2025-03-25', '109', 1, 1, 'LDQWER1571', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(204, '2025-03-25', '109', 1, 1, 'LDASDF1572', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(205, '2025-03-25', '109', 1, 1, 'LDZXCQ1573', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(206, '2025-03-25', '109', 1, 1, 'LDWSXE1574', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(207, '2025-03-25', '109', 1, 1, 'LDRFVT1575', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(208, '2025-03-25', '109', 1, 1, 'LDTGBY1576', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(209, '2025-03-25', '109', 1, 1, 'LDYHNU1577', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(210, '2025-03-25', '109', 1, 1, 'LDUJMI1578', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(211, '2025-03-25', '109', 1, 1, 'LDIKOL1579', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(212, '2025-03-25', '109', 1, 1, 'LDOLPQ1580', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(213, '2025-03-25', '109', 1, 1, 'LDPLMN1581', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(214, '2025-03-25', '109', 1, 1, 'LDZXSD1582', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(215, '2025-03-25', '109', 1, 1, 'LDQWER1583', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(216, '2025-03-25', '109', 1, 1, 'LDASDE1584', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(217, '2025-03-25', '109', 1, 1, 'LDFGHU1585', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(218, '2025-03-25', '109', 1, 1, 'LDBVNM1586', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(219, '2025-03-25', '109', 1, 1, 'LDNMBS1587', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(220, '2025-03-25', '109', 1, 1, 'LDLKIT1588', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(221, '2025-03-25', '109', 1, 1, 'LDPLKI1589', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(222, '2025-03-25', '109', 1, 1, 'LDZXCV1590', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(223, '2025-03-25', '109', 1, 1, 'LDQWER1591', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(224, '2025-03-25', '109', 1, 1, 'LDASDF1592', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(225, '2025-03-25', '109', 1, 1, 'LDZXCQ1593', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(226, '2025-03-25', '109', 1, 1, 'LDWSXE1594', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(227, '2025-03-25', '109', 1, 1, 'LDRFVT1595', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(228, '2025-03-25', '109', 1, 1, 'LDTGBY1596', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(229, '2025-03-25', '109', 1, 1, 'LDYHNU1597', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(230, '2025-03-25', '109', 1, 1, 'LDUJMI1598', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(231, '2025-03-25', '109', 1, 1, 'LDIKOL1599', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(232, '2025-03-25', '109', 1, 1, 'LDOLPQ1600', 1, 40000.00, 400.00, '0', '0', '2025-03-25 20:18:06', '2025-03-25 20:18:06'),
(233, '2025-03-24', '8', 26, 31, '0', 100, 8000.00, 80.00, '0', '0', '2025-03-29 01:25:34', '2025-04-04 00:14:32'),
(234, '2025-03-11', '4', 10, 37, '0', 1000, 12000.00, 12.00, '1', '0', '2025-03-29 01:25:34', '2025-04-05 17:45:26'),
(235, '2025-04-03', '11', 1, 3, 'AXHZAE7859', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(236, '2025-04-03', '11', 1, 3, 'AXHZAE7763', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(237, '2025-04-03', '11', 1, 3, 'AXHZAE7773', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(238, '2025-04-03', '11', 1, 3, 'AXHZAE7949', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(239, '2025-04-03', '11', 1, 3, 'AXHZAF0639', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(240, '2025-04-03', '11', 1, 3, 'AXHZAE8059', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(241, '2025-04-03', '11', 1, 3, 'AXHZAF0751', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(242, '2025-04-03', '11', 1, 3, 'AXHZAF0060', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(243, '2025-04-03', '11', 1, 3, 'AXHZAE7931', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(244, '2025-04-03', '11', 1, 3, 'AXHZAH6169', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(245, '2025-04-03', '11', 1, 3, 'AXHZAE7820', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(246, '2025-04-03', '11', 1, 3, 'AXHZAF3390', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(247, '2025-04-03', '11', 1, 3, 'AXHZAE8082', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(248, '2025-04-03', '11', 1, 3, 'AXHZAE5991', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(249, '2025-04-03', '11', 1, 3, 'AXHZAE7775', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(250, '2025-04-03', '11', 1, 3, 'AXHZAE8390', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(251, '2025-04-03', '11', 1, 3, 'AXHZAF1305', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(252, '2025-04-03', '11', 1, 3, 'AXHZAF0026', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(253, '2025-04-03', '11', 1, 3, 'AXHZAE7872', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(254, '2025-04-03', '11', 1, 3, 'AXHZAF1303', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(255, '2025-04-03', '11', 1, 3, 'AXHZAE8797', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(256, '2025-04-03', '11', 1, 3, 'AXHZAF1368', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(257, '2025-04-03', '11', 1, 3, 'AXHZAE8520', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(258, '2025-04-03', '11', 1, 3, 'AXHZAE7779', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(259, '2025-04-03', '11', 1, 3, 'AXHZAF0127', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(260, '2025-04-03', '11', 1, 3, 'AXHZAF0146', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(261, '2025-04-03', '11', 1, 3, 'AXHZAE6059', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(262, '2025-04-03', '11', 1, 3, 'AXHZAE6055', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(263, '2025-04-03', '11', 1, 3, 'AXHZAF0147', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(264, '2025-04-03', '11', 1, 3, 'AXHZAF0091', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(265, '2025-04-03', '11', 1, 3, 'AXHZAA4582', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(266, '2025-04-03', '11', 1, 3, 'AXHZAE6720', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(267, '2025-04-03', '11', 1, 3, 'AXHZAE7860', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(268, '2025-04-03', '11', 1, 3, 'AXHZAE7873', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(269, '2025-04-03', '11', 1, 3, 'AXHZAE7925', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(270, '2025-04-03', '11', 1, 3, 'AXHZAE7870', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(271, '2025-04-03', '11', 1, 3, 'AXHZAE7760', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(272, '2025-04-03', '11', 1, 3, 'AXHZAE7768', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(273, '2025-04-03', '11', 1, 3, 'AXHZAE7865', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(274, '2025-04-03', '11', 1, 3, 'AXHZAE7787', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(275, '2025-04-03', '11', 1, 3, 'AXHZAE8062', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(276, '2025-04-03', '11', 1, 3, 'AXHZAE7951', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(277, '2025-04-03', '11', 1, 3, 'AXHZAE7937', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(278, '2025-04-03', '11', 1, 3, 'AXHZAE7086', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(279, '2025-04-03', '11', 1, 3, 'AXHZAE8074', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(280, '2025-04-03', '11', 1, 3, 'AXHZAF0173', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(281, '2025-04-03', '11', 1, 3, 'AXHZAE7940', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(282, '2025-04-03', '11', 1, 3, 'AXHZAE7938', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(283, '2025-04-03', '11', 1, 3, 'AXHZAA5933', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(284, '2025-04-03', '11', 1, 3, 'AXHZAA4547', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(285, '2025-04-03', '11', 1, 3, 'AXHZAA5942', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(286, '2025-04-03', '11', 1, 3, 'AXHZAA6226', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(287, '2025-04-03', '11', 1, 3, 'AXHZAA4671', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(288, '2025-04-03', '11', 1, 3, 'AXHZAE6570', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(289, '2025-04-03', '11', 1, 3, 'AXHZAA4568', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(290, '2025-04-03', '11', 1, 3, 'AXHZAE7094', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(291, '2025-04-03', '11', 1, 3, 'AXHZAF3511', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(292, '2025-04-03', '11', 1, 3, 'AXHZAF3483', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(293, '2025-04-03', '11', 1, 3, 'AXHZAA9364', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(294, '2025-04-03', '11', 1, 3, 'AXHZAF0964', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(295, '2025-04-03', '11', 1, 3, 'AXHZAA9025', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(296, '2025-04-03', '11', 1, 3, 'AXHZAF3438', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(297, '2025-04-03', '11', 1, 3, 'AXHZAF0567', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(298, '2025-04-03', '11', 1, 3, 'AXHZAF1605', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(299, '2025-04-03', '11', 1, 3, 'AXHZAC2183', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(300, '2025-04-03', '11', 1, 3, 'AXHZAA8386', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:49', '2025-04-03 22:51:49'),
(301, '2025-04-03', '11', 1, 3, 'AXHZAA6317', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(302, '2025-04-03', '11', 1, 3, 'AXHZAA4760', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(303, '2025-04-03', '11', 1, 3, 'AXHZAC1942', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(304, '2025-04-03', '11', 1, 3, 'AXHZAE6620', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(305, '2025-04-03', '11', 1, 3, 'AXHZAA4581', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(306, '2025-04-03', '11', 1, 3, 'AXHZAC2713', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(307, '2025-04-03', '11', 1, 3, 'AXHZAE6573', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(308, '2025-04-03', '11', 1, 3, 'AXHZAA4775', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(309, '2025-04-03', '11', 1, 3, 'AXHZAC1947', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(310, '2025-04-03', '11', 1, 3, 'AXHZAA4765', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(311, '2025-04-03', '11', 1, 3, 'AXHZAA6063', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(312, '2025-04-03', '11', 1, 3, 'AXHZAA4585', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(313, '2025-04-03', '11', 1, 3, 'AXHZAA4475', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(314, '2025-04-03', '11', 1, 3, 'AXHZAA5931', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(315, '2025-04-03', '11', 1, 3, 'AXHZAA4392', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(316, '2025-04-03', '11', 1, 3, 'AXHZAA4759', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(317, '2025-04-03', '11', 1, 3, 'AXHZAA4772', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(318, '2025-04-03', '11', 1, 3, 'AXHZAC2714', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(319, '2025-04-03', '11', 1, 3, 'AXHZAA4432', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(320, '2025-04-03', '11', 1, 3, 'AXHZAA4580', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(321, '2025-04-03', '11', 1, 3, 'AXHZAF3399', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(322, '2025-04-03', '11', 1, 3, 'AXHZAA4761', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(323, '2025-04-03', '11', 1, 3, 'AXHZAA3987', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(324, '2025-04-03', '11', 1, 3, 'AXHZAA9028', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(325, '2025-04-03', '11', 1, 3, 'AXHZAA8403', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(326, '2025-04-03', '11', 1, 3, 'AXHZAA8338', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(327, '2025-04-03', '11', 1, 3, 'AXHZAB0942', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(328, '2025-04-03', '11', 1, 3, 'AXHZAB0969', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(329, '2025-04-03', '11', 1, 3, 'AXHZAA8352', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(330, '2025-04-03', '11', 1, 3, 'AXHZAA8317', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(331, '2025-04-03', '11', 1, 3, 'AXHZAE8708', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(332, '2025-04-03', '11', 1, 3, 'AXHZAE8730', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(333, '2025-04-03', '11', 1, 3, 'AXHZAE7784', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(334, '2025-04-03', '11', 1, 3, 'AXHZAF0629', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(335, '2025-04-03', '11', 1, 3, 'AXHZAG6736', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(336, '2025-04-03', '11', 1, 3, 'AXHZAG6737', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(337, '2025-04-03', '11', 1, 3, 'AXHZAG6740', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(338, '2025-04-03', '11', 1, 3, 'AXHZAG6758', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(339, '2025-04-03', '11', 1, 3, 'AXHZAG6756', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(340, '2025-04-03', '11', 1, 3, 'AXHZAG6749', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(341, '2025-04-03', '11', 1, 3, 'AXHZAG6763', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(342, '2025-04-03', '11', 1, 3, 'AXHZAG6757', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(343, '2025-04-03', '11', 1, 3, 'AXHZAG6755', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(344, '2025-04-03', '11', 1, 3, 'AXHZAG6754', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(345, '2025-04-03', '11', 1, 3, 'AXHZAG6735', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(346, '2025-04-03', '11', 1, 3, 'AXHZAG6759', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(347, '2025-04-03', '11', 1, 3, 'AXHZAG6744', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(348, '2025-04-03', '11', 1, 3, 'AXHZAA5906', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(349, '2025-04-03', '11', 1, 3, 'AXHZAB9961', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(350, '2025-04-03', '11', 1, 3, 'AXHZAA4589', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(351, '2025-04-03', '11', 1, 3, 'AXHZAC2711', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(352, '2025-04-03', '11', 1, 3, 'AXHZAE7117', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(353, '2025-04-03', '11', 1, 3, 'AXHZAC2028', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(354, '2025-04-03', '11', 1, 3, 'AXHZAE6576', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(355, '2025-04-03', '11', 1, 3, 'ZXHZBD4918', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(356, '2025-04-03', '11', 1, 3, 'AXHZAA9299', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(357, '2025-04-03', '11', 1, 3, 'AXHZAA8404', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(358, '2025-04-03', '11', 1, 3, 'AXHZAA4438', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(359, '2025-04-03', '11', 1, 3, 'AXHZAA9258', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(360, '2025-04-03', '11', 1, 3, 'AXHZAF1286', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(361, '2025-04-03', '11', 1, 3, 'AXHZAF3436', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(362, '2025-04-03', '11', 1, 3, 'AXHZAC2723', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(363, '2025-04-03', '11', 1, 3, 'AXHZAC2725', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(364, '2025-04-03', '11', 1, 3, 'AXHZAC2708', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(365, '2025-04-03', '11', 1, 3, 'AXHZAC2036', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(366, '2025-04-03', '11', 1, 3, 'AXHZAA4757', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(367, '2025-04-03', '11', 1, 3, 'AXHZAA4774', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(368, '2025-04-03', '11', 1, 3, 'AXHZAA4442', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(369, '2025-04-03', '11', 1, 3, 'AXHZAF3512', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(370, '2025-04-03', '11', 1, 3, 'AXHZAA4459', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(371, '2025-04-03', '11', 1, 3, 'AXHZAA4513', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(372, '2025-04-03', '11', 1, 3, 'ZXHZBD3673', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(373, '2025-04-03', '11', 1, 3, 'AXHZAE6595', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(374, '2025-04-03', '11', 1, 3, 'AXHZAC2017', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(375, '2025-04-03', '11', 1, 3, 'AXHZAA4377', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(376, '2025-04-03', '11', 1, 3, 'AXHZAA4190', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(377, '2025-04-03', '11', 1, 3, 'AXHZAA9254', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(378, '2025-04-03', '11', 1, 3, 'AXHZAA9432', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(379, '2025-04-03', '11', 1, 3, 'AXHZAA9487', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(380, '2025-04-03', '11', 1, 3, 'AXHZAA9472', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(381, '2025-04-03', '11', 1, 3, 'AXHZAA9386', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(382, '2025-04-03', '11', 1, 3, 'AXHZAA9408', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(383, '2025-04-03', '11', 1, 3, 'AXHZAA9436', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(384, '2025-04-03', '11', 1, 3, 'AXHZAA6312', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(385, '2025-04-03', '11', 1, 3, 'AXHZAA8306', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(386, '2025-04-03', '11', 1, 3, 'AXHZAA8433', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(387, '2025-04-03', '11', 1, 3, 'AXHZAA8322', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(388, '2025-04-03', '11', 1, 3, 'AXHZAA9421', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(389, '2025-04-03', '11', 1, 3, 'AXHZAA8319', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(390, '2025-04-03', '11', 1, 3, 'AXHZAA8299', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(391, '2025-04-03', '11', 1, 3, 'AXHZAA8277', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(392, '2025-04-03', '11', 1, 3, 'AXHZAA4355', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(393, '2025-04-03', '11', 1, 3, 'AXHZAA9301', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(394, '2025-04-03', '11', 1, 3, 'AXHZAA8295', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(395, '2025-04-03', '11', 1, 3, 'AXHZAA9294', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(396, '2025-04-03', '11', 1, 3, 'AXHZAA8400', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(397, '2025-04-03', '11', 1, 3, 'AXHZAA4403', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(398, '2025-04-03', '11', 1, 3, 'AXHZAA4571', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(399, '2025-04-03', '11', 1, 3, 'AXHZAA9327', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(400, '2025-04-03', '11', 1, 3, 'AXHZAA4103', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(401, '2025-04-03', '11', 1, 3, 'AXHZAA9381', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(402, '2025-04-03', '11', 1, 3, 'AXHZAA8323', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(403, '2025-04-03', '11', 1, 3, 'AXHZAA8270', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(404, '2025-04-03', '11', 1, 3, 'AXHZAA8375', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(405, '2025-04-03', '11', 1, 3, 'AXHZAA9293', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(406, '2025-04-03', '11', 1, 3, 'AXHZAA9292', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(407, '2025-04-03', '11', 1, 3, 'AXHZAA8262', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(408, '2025-04-03', '11', 1, 3, 'AXHZAG6748', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(409, '2025-04-03', '11', 1, 3, 'AXHZAG6738', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(410, '2025-04-03', '11', 1, 3, 'AXHZAG6745', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(411, '2025-04-03', '11', 1, 3, 'AXHZAG6761', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(412, '2025-04-03', '11', 1, 3, 'AXHZAG6751', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(413, '2025-04-03', '11', 1, 3, 'AXHZAG6750', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(414, '2025-04-03', '11', 1, 3, 'AXHZAG6742', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(415, '2025-04-03', '11', 1, 3, 'AXHZAG6743', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(416, '2025-04-03', '11', 1, 3, 'AXHZAG6746', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(417, '2025-04-03', '11', 1, 3, 'AXHZAA4541', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(418, '2025-04-03', '11', 1, 3, 'AXHZAC1953', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(419, '2025-04-03', '11', 1, 3, 'AXHZAE6723', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(420, '2025-04-03', '11', 1, 3, 'AXHZAG6752', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(421, '2025-04-03', '11', 1, 3, 'AXHZAG6760', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(422, '2025-04-03', '11', 1, 3, 'AXHZAA4773', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(423, '2025-04-03', '11', 1, 3, 'AXHZAE6629', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(424, '2025-04-03', '11', 1, 3, 'AXHZAF3400', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(425, '2025-04-03', '11', 1, 3, 'AXHZAA4425', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(426, '2025-04-03', '11', 1, 3, 'AXHZAF3408', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(427, '2025-04-03', '11', 1, 3, 'AXHZAF3922', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(428, '2025-04-03', '11', 1, 3, 'AXHZAE6726', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(429, '2025-04-03', '11', 1, 3, 'AXHZAA4348', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(430, '2025-04-03', '11', 1, 3, 'AXHZAA4539', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(431, '2025-04-03', '11', 1, 3, 'AXHZAE6602', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(432, '2025-04-03', '11', 1, 3, 'AXHZAG6734', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(433, '2025-04-03', '11', 1, 3, 'AXHZAG6762', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(434, '2025-04-03', '11', 1, 3, 'AXHZAG6741', 1, 200000.00, 1000.00, '0', NULL, '2025-04-03 22:51:50', '2025-04-03 22:51:50'),
(435, '2025-03-07', '2', 25, 35, '0', 100, 1000.00, 10.00, '1', NULL, '2025-04-04 22:47:48', '2025-04-05 17:53:10'),
(436, '2025-03-25', '109', 11, 18, '0', 100, 30000.00, 300.00, '0', NULL, '2025-04-04 22:53:28', '2025-04-04 22:53:28'),
(437, '2025-03-25', '109', 11, 34, '0', 100, 20000.00, 200.00, '0', NULL, '2025-04-04 22:53:40', '2025-04-04 22:53:40');

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
(18, 11, '3*1 (20*130)', 'Pic', 0, 0, '2024-10-22 00:43:20', '2025-03-06 22:55:02'),
(19, 6, 'HR', 'Pic', 1, 0, '2024-10-22 00:52:07', '2024-10-22 00:52:07'),
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
(35, 25, 'Card', 'Pic', 0, 0, '2025-03-05 22:41:52', '2025-03-15 18:01:19'),
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
(4, '26', '2025-03-15 17:35:55', '2025-03-15 17:35:55');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selected_invoices`
--
ALTER TABLE `selected_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_acc_coa`
--
ALTER TABLE `tbl_acc_coa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer_payments`
--
ALTER TABLE `tbl_customer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expensive`
--
ALTER TABLE `tbl_expensive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leds`
--
ALTER TABLE `tbl_leds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_purchase_items`
--
ALTER TABLE `tbl_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_reports_items`
--
ALTER TABLE `tbl_reports_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sale_product_category`
--
ALTER TABLE `tbl_sale_product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
