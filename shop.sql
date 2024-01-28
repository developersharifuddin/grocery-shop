-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 07:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_english`, `name_bangla`, `description`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pran', 'Pran', 'Pran Brand', 'default.png', 1, '2024-01-28 05:24:42', '2024-01-28 05:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(100) UNSIGNED DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_status` tinyint(1) NOT NULL DEFAULT 0,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category.png',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Parent_id categories table id';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_english`, `name_bangla`, `slug`, `parent_id`, `meta_title`, `meta_description`, `descriptions`, `home_status`, `logo`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Groceries', 'Groceries', 'groceries', NULL, 'Groceries Product', 'Groceries Product', 'Groceries', 1, 'category.png', NULL, 1, '2024-01-28 05:28:34', '2024-01-28 05:28:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name_english`, `name_bangla`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blue', 'Blue', 'Blue', 'Blue color', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_confirmation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `slug`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `password_confirmation`, `gst_number`, `tax_number`, `country`, `state`, `city`, `postcode`, `address`, `previous_due`, `created_at`, `updated_at`) VALUES
(1, 'sharif-ahmed', 'Sharif Ahmed', 'sharif.uddin.9977@gmail.com', '01965674161', NULL, NULL, NULL, NULL, '9332', '233', NULL, NULL, 'Benuar char', '2020', 'dhaka', NULL, '2024-01-28 05:53:10', '2024-01-28 05:53:10'),
(2, 'liton-mahmud', 'Liton Mahmud', 'litoncse15@gmail.com', '01771677083', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, 'Benuar char', '2020', 'dhaka', NULL, '2024-01-28 05:53:34', '2024-01-28 05:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `daily_expenses`
--

CREATE TABLE `daily_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `approved_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_expenses`
--

INSERT INTO `daily_expenses` (`id`, `expense_name`, `expense_group`, `company`, `store`, `expense_date`, `amount`, `approved_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Current bill', 'Bill', 'Rabbi Grocery Shop', 'Main-Store', '2024-01-28', '100.00', 'Approved', NULL, '2024-01-28 06:45:28', '2024-01-28 06:45:28');

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
-- Table structure for table `item_infos`
--

CREATE TABLE `item_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `min_qty` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trans_uom` int(80) DEFAULT NULL,
  `stock_uom` int(50) DEFAULT NULL,
  `sales_uom` int(50) DEFAULT NULL,
  `brand` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `published_price` double DEFAULT 0,
  `sell_price` int(11) NOT NULL DEFAULT 0,
  `purchase_price` int(11) NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `discount_type` int(11) DEFAULT NULL,
  `tax_amount` decimal(10,0) DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `stock_status` int(11) NOT NULL DEFAULT 1,
  `sub_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 0,
  `approved` tinyint(1) DEFAULT 0,
  `meta_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `approval_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_infos`
--

INSERT INTO `item_infos` (`id`, `name`, `name_bangla`, `slug`, `category_id`, `code`, `min_qty`, `trans_uom`, `stock_uom`, `sales_uom`, `brand`, `weight`, `published_price`, `sell_price`, `purchase_price`, `discount`, `discount_type`, `tax_amount`, `tax`, `current_stock`, `images`, `thumbnail`, `attachment`, `published`, `status`, `stock_status`, `sub_title`, `summary`, `request_status`, `approved`, `meta_name`, `meta_title`, `meta_description`, `meta_image`, `meta_keyword`, `created_at`, `updated_at`, `deleted_at`, `approval_at`) VALUES
(1, 'Arla Dano Daily Pushti Milk Powder', 'Arla Dano Daily Pushti Milk Powder', 'arla-dano-daily-pushti-milk-powder', 1, 'ITM162815', '1', 1, 1, 1, '1', '1', 500, 400, 300, 100, 1, NULL, NULL, 15, NULL, 'default.png', NULL, 1, 1, 5, 'Arla Dano Daily Pushti Milk Powder', 'Arla Dano Daily Pushti Milk Powder', 0, 1, 'Arla Dano Daily Pushti Milk Powder', NULL, NULL, NULL, NULL, '2024-01-28 05:38:13', '2024-01-28 06:08:42', NULL, NULL),
(2, 'Nestle KITKAT 4 Finger Chocolate Wafer', 'Nestle KITKAT 4 Finger Chocolate Wafer', 'nestle-kitkat-4-finger-chocolate-wafer', 1, 'ITM294597', '1', 1, 1, 1, '1', '.25', 200, 150, 100, 25, 2, NULL, NULL, 13, NULL, 'default.png', NULL, 1, 1, 10, 'Nestle KITKAT 4 Finger Chocolate Wafer', 'Nestle KITKAT 4 Finger Chocolate Wafer', 0, 0, 'Nestle KITKAT 4 Finger Chocolate Wafer', 'Nestle KITKAT 4 Finger Chocolate Wafer', 'Nestle KITKAT 4 Finger Chocolate Wafer', NULL, 'Nestle KITKAT 4 Finger Chocolate Wafer', '2024-01-28 05:51:16', '2024-01-28 06:09:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `money_lendings`
--

CREATE TABLE `money_lendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(22) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `to_amount` double(20,2) NOT NULL,
  `recv_amount` double(20,2) DEFAULT NULL,
  `due_amount` double(20,2) DEFAULT NULL,
  `monthly_profit` double(20,2) DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_lendings`
--

INSERT INTO `money_lendings` (`id`, `name`, `name_bangla`, `email`, `phone`, `nid`, `country`, `division`, `district`, `city`, `Area`, `postcode`, `parent_address`, `permanent_address`, `from_date`, `to_date`, `to_amount`, `recv_amount`, `due_amount`, `monthly_profit`, `is_closed`, `created_at`, `updated_at`) VALUES
(1, 'Zohir Raihan', 'Zohir Raihan', 'zahir@gmail.com', '01965674161', 111132332, 'Bangladesh', 'Dhaka', 'Uttara', 'Benuar char', 'Azampur', '2020', 'Benuar-char ', 'Dhaka', '2024-01-28', '2024-02-07', 2000.00, 0.00, 2000.00, 0.00, 0, '2024-01-28 06:29:41', '2024-01-28 06:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sell_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_payable_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `total_paid_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `total_due_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `payment_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `sell_id`, `customer_id`, `total_payable_amount`, `total_paid_amount`, `total_due_amount`, `payment_details`, `payment_method`, `payment_type`, `payment_note`, `txn_code`, `created_at`, `updated_at`) VALUES
(6, 6, 1, 400.00, 400.00, 0.00, 'Cash', NULL, 'Cash', 'Cash', 'TX-65SYGR9Z0', '2024-01-28 06:23:37', '2024-01-28 06:23:37'),
(7, 7, 2, 150.00, 150.00, 0.00, 'Cash', NULL, 'Cash', 'Cash', 'TX-7SR843QFM', '2024-01-28 06:24:35', '2024-01-28 06:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_to_suppliers`
--

CREATE TABLE `payment_to_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `spo_id` bigint(20) UNSIGNED NOT NULL,
  `payable_amount` double NOT NULL,
  `due_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `is_closed` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_to_suppliers`
--

INSERT INTO `payment_to_suppliers` (`id`, `supplier_id`, `spo_id`, `payable_amount`, `due_amount`, `paid_amount`, `is_closed`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 30010, NULL, 30010, 1, '2024-01-28 06:08:42', '2024-01-28 06:08:42'),
(2, 1, 8, 10010, NULL, 10010, 1, '2024-01-28 06:09:17', '2024-01-28 06:09:17');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_purchase_qty` int(11) NOT NULL,
  `total_received_qty` int(11) NOT NULL,
  `total_purchase_amount` double(20,2) NOT NULL,
  `is_purchased` tinyint(1) NOT NULL DEFAULT 0,
  `is_received` tinyint(1) NOT NULL DEFAULT 0,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `purchased_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `supplier_id`, `total_purchase_qty`, `total_received_qty`, `total_purchase_amount`, `is_purchased`, `is_received`, `is_closed`, `purchased_by`, `created_at`, `updated_at`) VALUES
(7, 1, 10, 10, 30010.00, 1, 1, 1, 1, '2024-01-28 06:08:42', '2024-01-28 06:08:42'),
(8, 1, 10, 10, 10010.00, 1, 1, 1, 1, '2024-01-28 06:09:17', '2024-01-28 06:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders_children`
--

CREATE TABLE `purchase_orders_children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `total-amount` double(20,2) NOT NULL,
  `is_received` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sells_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Pennding',
  `process_status` int(11) DEFAULT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid',
  `payment_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_wrap` double(20,2) DEFAULT 0.00,
  `grand_total` double(20,2) DEFAULT 0.00,
  `discount` double(20,2) DEFAULT 0.00,
  `offer` double DEFAULT NULL,
  `payable` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `sale_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_status` int(11) NOT NULL DEFAULT 0,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_sms` tinyint(2) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `customer_id`, `shipping_address`, `phone`, `email`, `additional_info`, `sells_status`, `process_status`, `payment_type`, `payment_status`, `payment_details`, `gift_wrap`, `grand_total`, `discount`, `offer`, `payable`, `paid`, `due`, `sale_code`, `sale_status`, `ref_no`, `sent_sms`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 1, 'dhaka', '01965674161', NULL, NULL, '1', NULL, 'Cash', '1', 'Cash', 0.00, 0.00, 0.00, NULL, 400, NULL, NULL, 'SC-7', 0, '1', 0, 1, NULL, '2024-01-28 06:23:36', '2024-01-28 06:23:36'),
(7, 2, 'dhaka', '01771677083', NULL, NULL, '1', NULL, 'Cash', '1', 'Cash', 0.00, 0.00, 0.00, NULL, 150, NULL, NULL, 'SC-8', 0, '1', 0, 1, NULL, '2024-01-28 06:24:35', '2024-01-28 06:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `sells_items`
--

CREATE TABLE `sells_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `sell_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `bar_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `published_price` double NOT NULL,
  `sell_price` double(20,2) DEFAULT NULL,
  `tax` double(20,2) NOT NULL DEFAULT 0.00,
  `sub_total` double DEFAULT NULL,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `payment_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `delivery_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `shipping_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sells_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells_items`
--

INSERT INTO `sells_items` (`id`, `store_id`, `sell_id`, `product_id`, `product_qty`, `bar_code`, `qr_code`, `discount_amount`, `published_price`, `sell_price`, `tax`, `sub_total`, `shipping_cost`, `quantity`, `payment_status`, `delivery_status`, `shipping_type`, `product_referral_code`, `sells_status`, `created_at`, `updated_at`) VALUES
(6, 1, 6, 1, NULL, NULL, NULL, NULL, 500, 400.00, 0.00, NULL, 0.00, 1, 'unpaid', 'pending', NULL, NULL, 0, '2024-01-28 06:23:37', '2024-01-28 06:23:37'),
(7, 1, 7, 2, NULL, NULL, NULL, NULL, 200, 150.00, 0.00, NULL, 0.00, 1, 'unpaid', 'pending', NULL, NULL, 0, '2024-01-28 06:24:35', '2024-01-28 06:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7E1baMmdfFvJDlqbr32Me24gkyS7uqK24mhkhFEA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWmYzS0FzNm5FUHREYzlnc2VuWHJ3ODg4Z1B2Sm5DdWVuTkh3aTJadiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRnbkMvc1NvUkNLc2UwV2ZaNXU5N3Vla2VBQWdVL294TzZFYlQxYlA4RUhGY09FbkQ0bGRvYSI7fQ==', 1706425122);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'size.png',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name_en`, `name_bn`, `size`, `description`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Small', 'Small', 2.00, 'small size', 'size.png', 1, '2024-01-28 05:22:12', '2024-01-27 18:00:00'),
(2, 'Small', 'Small', 1.10, 'Small', 'size.png', 1, '2024-01-28 05:22:12', '2024-01-28 05:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_confirmation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `slug`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `password_confirmation`, `gst_number`, `tax_number`, `country`, `state`, `city`, `postcode`, `address`, `previous_due`, `created_at`, `updated_at`) VALUES
(1, 'sajid-mahmud', 'Sajid Mahmud', 'sajidmahmud@gmail.com', 'Sajid Mahmud', NULL, NULL, NULL, NULL, '22233', '2323', NULL, NULL, 'Dhaka', '1230', 'uttara', NULL, '2024-01-28 05:55:32', '2024-01-28 05:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Company\'s Team', 1, '2024-01-28 05:06:48', '2024-01-28 05:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trns00g_order_master`
--

CREATE TABLE `trns00g_order_master` (
  `id` int(255) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `courier_id` int(10) UNSIGNED DEFAULT NULL,
  `issue_master_id` int(10) UNSIGNED DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `order_type_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `store_id` smallint(5) UNSIGNED DEFAULT NULL,
  `floor_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `room_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `customer_phone` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `program_session_id` tinyint(4) DEFAULT NULL,
  `program_type_id` tinyint(4) DEFAULT NULL,
  `program_name` varchar(100) DEFAULT NULL,
  `program_name_bn` varchar(100) DEFAULT NULL,
  `program_date` date DEFAULT NULL,
  `program_start_time` timestamp NULL DEFAULT NULL,
  `program_end_time` timestamp NULL DEFAULT NULL,
  `number_of_guest` tinyint(3) UNSIGNED DEFAULT NULL,
  `total_amount_without_vat` decimal(15,2) UNSIGNED DEFAULT NULL,
  `total_discount_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `total_vat_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `total_amount_with_vat` decimal(15,2) UNSIGNED DEFAULT NULL,
  `total_est_time` varchar(45) DEFAULT NULL,
  `waiter_user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_status` varchar(20) DEFAULT 'pending',
  `status` int(11) NOT NULL DEFAULT 0,
  `offer` decimal(15,2) DEFAULT NULL,
  `payable` decimal(15,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `is_print` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trns00g_order_master_addl_info`
--

CREATE TABLE `trns00g_order_master_addl_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_master_id` int(10) UNSIGNED DEFAULT NULL,
  `additional_info` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` float UNSIGNED DEFAULT NULL,
  `payment_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `gift_wrap` float UNSIGNED DEFAULT 0,
  `is_ping` tinyint(1) NOT NULL DEFAULT 0,
  `tracking_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delivery_viewed` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_commission_calculated` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trns00h_order_child`
--

CREATE TABLE `trns00h_order_child` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_master_id` int(10) UNSIGNED NOT NULL,
  `branch_id` smallint(5) UNSIGNED DEFAULT NULL,
  `publisher_id` int(10) UNSIGNED DEFAULT NULL,
  `item_info_id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) UNSIGNED DEFAULT NULL,
  `uom_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `uom_short_code` varchar(12) DEFAULT NULL,
  `relative_factor` decimal(9,9) UNSIGNED DEFAULT NULL,
  `item_rate` decimal(9,2) UNSIGNED DEFAULT NULL,
  `vat_payment_method_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `item_cat_for_retail_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `order_qty` decimal(6,2) UNSIGNED NOT NULL,
  `order_qty_adjt` decimal(6,2) UNSIGNED DEFAULT NULL,
  `mrp_value` decimal(15,2) UNSIGNED DEFAULT NULL,
  `discount_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `discount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `item_value_tran_curr` decimal(15,2) UNSIGNED DEFAULT NULL,
  `item_value_local_curr` decimal(15,2) UNSIGNED DEFAULT NULL,
  `vat_rate_type_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `is_fixed_rate` tinyint(1) UNSIGNED DEFAULT 0,
  `cd_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `cd_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `rd_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `rd_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `sd_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `sd_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `vat_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `fixed_rate_uom_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `fixed_rate` decimal(6,2) UNSIGNED DEFAULT NULL,
  `vat_amount` decimal(15,2) UNSIGNED DEFAULT NULL,
  `vds_percent` decimal(2,2) UNSIGNED DEFAULT NULL,
  `total_amount_local_curr` decimal(15,2) UNSIGNED DEFAULT NULL,
  `item_estimated_time` float DEFAULT 0,
  `process_status` tinyint(1) UNSIGNED DEFAULT NULL,
  `is_supplimentary` tinyint(1) UNSIGNED DEFAULT NULL,
  `note` text DEFAULT NULL,
  `spo_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `uom_set_id` tinyint(3) UNSIGNED NOT NULL,
  `uom_short_code` varchar(12) NOT NULL,
  `uom_desc` varchar(50) NOT NULL,
  `local_desc` varchar(50) DEFAULT NULL,
  `relative_factor` float NOT NULL,
  `fraction_allow` varchar(50) NOT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `uom_set_id`, `uom_short_code`, `uom_desc`, `local_desc`, `relative_factor`, `fraction_allow`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'PCS', 'PCS', 'PCS', 1, '1', 1, '2024-01-28 05:15:16', '2024-01-28 05:16:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uomsets`
--

CREATE TABLE `uomsets` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `uom_set` varchar(12) NOT NULL,
  `uom_set_desc` varchar(50) NOT NULL,
  `local_uom_set_desc` varchar(50) NOT NULL,
  `is_active` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uomsets`
--

INSERT INTO `uomsets` (`id`, `uom_set`, `uom_set_desc`, `local_uom_set_desc`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'PCS', 'PCS', '1', 1, '2024-01-28 05:13:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Company Admin', 'admin@gmail.com', 'admin', '2024-01-28 05:07:24', '$2y$10$gnC/sSoRCKse0WfZ5u97uekeAAgU/oxO6EbT1bP8EHFcOEnD4ldoa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-28 05:06:48', '2024-01-28 05:06:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_slug_unique` (`slug`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_infos`
--
ALTER TABLE `item_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_lendings`
--
ALTER TABLE `money_lendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_to_suppliers`
--
ALTER TABLE `payment_to_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders_children`
--
ALTER TABLE `purchase_orders_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells_items`
--
ALTER TABLE `sells_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sells_items_sell_id_foreign` (`sell_id`),
  ADD KEY `sells_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_slug_unique` (`slug`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `trns00g_order_master`
--
ALTER TABLE `trns00g_order_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cust_odrmst_idx` (`customer_id`),
  ADD KEY `fk_courier_order_idx` (`courier_id`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_uomset_uom` (`uom_set_id`);

--
-- Indexes for table `uomsets`
--
ALTER TABLE `uomsets`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_infos`
--
ALTER TABLE `item_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `money_lendings`
--
ALTER TABLE `money_lendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_to_suppliers`
--
ALTER TABLE `payment_to_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_orders_children`
--
ALTER TABLE `purchase_orders_children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sells_items`
--
ALTER TABLE `sells_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uomsets`
--
ALTER TABLE `uomsets`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sells_items`
--
ALTER TABLE `sells_items`
  ADD CONSTRAINT `sells_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `item_infos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sells_items_sell_id_foreign` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
