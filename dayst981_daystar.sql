-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2022 at 10:12 AM
-- Server version: 5.7.37
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dayst981_daystar`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` double NOT NULL,
  `provider` double NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `type` enum('commission','order_to_company','order_to_provider','cashing','exchange','order_to_user') NOT NULL,
  `date` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `company`, `provider`, `content`, `type`, `date`, `image`, `order_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 225, 0, '  عمولة التطبيق من الطلب رقم :1', 'order_to_company', 1596931200, NULL, 1, 2, 0, 1597005169, 0),
(2, 1, 0, 3, '  عمولة ١٪؜  من الطلب رقم :1', 'order_to_provider', 1596931200, NULL, 1, 2, 0, 1597005169, 0),
(3, 2, 450, 0, '  عمولة التطبيق من الطلب رقم :2', 'order_to_company', 1596931200, NULL, 2, 2, 0, 1597006070, 0),
(4, 1, 0, 6, '  عمولة ١٪؜  من الطلب رقم :2', 'order_to_provider', 1596931200, NULL, 2, 2, 0, 1597006070, 0),
(5, 46, 225, 0, '  عمولة التطبيق من الطلب رقم :11', 'order_to_company', 1602028800, NULL, 11, 46, 0, 1602054257, 0),
(6, 16, 187.5, 0, '  عمولة التطبيق من الطلب رقم :12', 'order_to_company', 1602028800, NULL, 12, 16, 0, 1602055868, 0);

-- --------------------------------------------------------

--
-- Table structure for table `all_orders`
--

CREATE TABLE `all_orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '0',
  `provider_id` bigint(20) NOT NULL,
  `main_service_id` bigint(20) NOT NULL,
  `sub_service_id` bigint(20) NOT NULL,
  `specialty_id` int(11) DEFAULT '0',
  `area_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` double NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_details` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_lat` double NOT NULL DEFAULT '0',
  `google_long` double NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` tinyint(4) NOT NULL COMMENT '1- cash  / vodafone cash / 3 - online pay  / 4 - aman',
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `commission_app` double NOT NULL DEFAULT '0',
  `commission_provider` double NOT NULL DEFAULT '0',
  `num_times` int(11) NOT NULL,
  `num_patients` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_orders`
--

INSERT INTO `all_orders` (`order_id`, `user_id`, `order_status`, `provider_id`, `main_service_id`, `sub_service_id`, `specialty_id`, `area_id`, `order_date`, `order_time`, `age`, `gender`, `address`, `other_details`, `google_lat`, `google_long`, `phone`, `other_phone`, `payment`, `desc`, `price`, `commission_app`, `commission_provider`, `num_times`, `num_patients`, `coupon_id`, `coupon_discount`, `created_at`, `deleted`) VALUES
(11, 62, 4, 46, 1, 31, 0, 1, 1602115200, '1602053040', 50, 3, '8 Zakareya Othman, Al Manteqah Ath Thamenah, Nasr City, Cairo Governorate, Egypt', NULL, 30.0474201, 31.3529273, '01272330316', '--', 1, 'wound', 300, 225, 75, 1, 1, NULL, 0, 1602053098, 1),
(12, 62, 4, 16, 1, 35, 0, 1, 1602115200, '1602053580', 50, 1, '8 Zakareya Othman, Al Manteqah Ath Thamenah, Nasr City, Cairo Governorate, Egypt', NULL, 30.0474201, 31.3529273, '01272330316', '--', 1, 'wound ', 250, 187.5, 62.5, 1, 1, NULL, 0, 1602053677, 1),
(14, 62, 5, 46, 1, 33, 0, 1, 1602028800, '1602055200', 60, 1, '8 Zakareya Othman, Al Manteqah Ath Thamenah, Nasr City, Cairo Governorate, Egypt', NULL, 30.0473943, 31.3528588, '01272330316', '--', 1, 'wound ', 300, 0, 0, 1, 1, NULL, 0, 1602054950, 0),
(22, 2, 6, 5, 1, 31, 1, 1, 1603497600, '1603574280', 45, 1, 'العنوان', NULL, 30.03382966418439, 31.239067550292976, '0100942578', '0100942578', 1, 'desc', 300, 0, 0, 1, 1, NULL, 0, 1603567183, 0),
(23, 2, 6, 5, 1, 31, 1, 1, 1603497600, '1603574580', 45, 1, 'العنوان', NULL, 30.052404474126103, 31.24147080957032, '0100942578', '0100942578', 1, 'desc', 300, 0, 0, 1, 1, NULL, 0, 1603567484, 0),
(24, 2, 6, 5, 1, 31, 1, 1, 1603497600, '1603574700', 45, 1, 'العنوان', NULL, 30.046163726499227, 31.238380904785163, '01009321278', '01009321278', 1, 'des', 2400, 0, 0, 8, 1, NULL, 0, 1603567599, 0),
(25, 62, 6, 5, 1, 31, 1, 1, 1603670400, '1603712580', 50, 1, '١٣ زكريا عثمان الحى الثامن مدينة نصر', NULL, 30.043489, 31.235291, '01272330316', '01229336453', 1, 'Wound', 300, 0, 0, 1, 1, NULL, 0, 1603619140, 0),
(7, 61, 2, 56, 1, 31, 2, 1, 1601942400, '1602017340', 25, 1, ' البتانون وحصتها، قسم شبين الكوم، المنوفية، مصر', NULL, 30.6220987, 30.9874528, '1855889655', '1085888555', 1, 'وصف', 400, 0, 0, 1, 2, NULL, 0, 1602017402, 1),
(27, 98, 6, 5, 1, 31, 1, 1, 1606003200, '1606057200', 45, 1, 'Katameya heights Vila 420', NULL, 30.043489, 31.235291, '0020220200274', '00201030044434', 1, 'I did a hemicolectomy laparoscopic and just need to change the dresses of one of the wounds  .', 300, 0, 0, 1, 1, NULL, 0, 1605959016, 0),
(28, 136, 0, 0, 1, 35, 1, 1, 1614211200, '1614290400', 21, 2, 'Madinaty ', NULL, 30.043489, 31.235291, '01113600833', '002348063329910', 1, '5 hour IV injection', 750, 0, 0, 3, 1, NULL, 0, 1614176836, 1),
(10, 61, 3, 46, 1, 31, 1, 1, 1601942400, '1602018960', 25, 1, ' البتانون وحصتها، قسم شبين الكوم، المنوفية، مصر', NULL, 30.6220987, 30.9874528, '0109965888', '--', 1, 'وصف', 1200, 900, 300, 2, 2, NULL, 0, 1602019008, 1),
(29, 149, 2, 12, 1, 31, 1, 1, 1625443200, '1625462520', 40, 1, '87 Rd 9, معادي السرايات الغربية، حي المعادي، محافظة القاهرة‬، مصر', NULL, 29.9505572, 31.2377569, '020111111111111', '020112111111111', 3, 'gggggghhhg', 4800, 0, 0, 4, 4, NULL, 0, 1625462630, 1),
(30, 149, 2, 12, 1, 31, 1, 1, 1625443200, '1625462520', 40, 1, '87 Rd 9, معادي السرايات الغربية، حي المعادي، محافظة القاهرة‬، مصر', NULL, 29.9505572, 31.2377569, '020111111111111', '020112111111111', 2, 'gggggghhhg', 4800, 0, 0, 4, 4, NULL, 0, 1625462668, 1),
(31, 23, -1, 0, 1, 34, 0, 1, 1627603200, '1627549222.0', 55, 1, 'Iskan Mobarak Lelshabab, Street 14, Awal Al Qahera Al Gadida, Egypt, 11351 ', '6 hour', 29.99488536876633, 31.426780521869663, '01252633500', '01025263350', 3, 'Hhhhh', 187, 0, 0, 1, 1, NULL, 0, 1627548553, 1),
(34, 7, 0, 0, 2, 46, 0, 1, 1628121600, '1628196900', 12, 1, 'تلا، مدينة تلا، تلا، المنوفية،، مدينة تلا، تلا، المنوفية،، Madinet Tala, Tala, Menofia Governorate, Egypt', NULL, 30.6832686, 30.9422747, '1009468527', '--', 1, 'Des', 1400, 0, 0, 7, 1, NULL, 0, 1628196972, 1),
(35, 23, 0, 0, 6, 69, 0, 1, 1628726400, '1628413251.0', 42, 1, 'Nasb Alley, Al Zaher, Egypt, ', '6 hour', 30.061687183762544, 31.25411666929722, '01025263350', '01025263350', 1, 'Hgdma nsmsn', 300, 0, 0, 1, 1, NULL, 0, 1628405192, 1),
(36, 93, 0, 0, 1, 37, 2, 2, 1629072000, '1628924400', 65, 2, ' زاوية عبد القادر، أول العامرية، الإسكندرية، مصر', '24', 31.0474213, 29.8259119, '01282861539', '01282861539', 1, 'حاله جلطة بالمخ بعد رعاية مركزة الحاله مستقرة\n', 5600, 0, 0, 7, 1, NULL, 0, 1628927464, 1),
(37, 2, 0, 0, 1, 31, 0, 1, 1579996800, '1579838400', 45, 3, 'global street ', NULL, 24.713552, 46.675297, '01224595726', '01224595726', 1, 'desc', 120, 0, 0, 1, 1, 1, 10, 1642362619, 0),
(38, 2, 0, 0, 1, 31, 0, 1, 1579996800, '1579838400', 45, 3, 'global street ', NULL, 24.713552, 46.675297, '01224595726', '01224595726', 1, 'desc', 120, 0, 0, 1, 1, 1, 10, 1642362705, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcer`
--

CREATE TABLE `announcer` (
  `id` int(11) NOT NULL,
  `type` enum('doctor','hospital') DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `area` varchar(500) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcer`
--

INSERT INTO `announcer` (`id`, `type`, `name`, `specialization`, `phone`, `code`, `area`, `city`, `commission`, `created_at`, `deleted`) VALUES
(1, 'hospital', 'ahmed mustafa ali samy ', '', '1039347981', '1002', 'المنطقة', 'المدينة', 10, 1642452920, 0),
(2, 'doctor', 'ahmed mustafa ali samy ', 'التخصص', '1039347981', '1002', 'المنطقة', 'المدينة', 45, 1642452960, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcer_accounts`
--

CREATE TABLE `announcer_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `announcer_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `type` enum('commission','cashing','exchange') NOT NULL,
  `date` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SA cities';

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `deleted`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `areas_trans`
--

CREATE TABLE `areas_trans` (
  `id` int(11) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas_trans`
--

INSERT INTO `areas_trans` (`id`, `lang`, `title`, `area_id`) VALUES
(1, 'ar', 'القاهرة', 1),
(2, 'en', 'cairo', 1),
(3, 'es', 'cairo', 1),
(4, 'ar', 'الاسكندرية', 2),
(5, 'en', 'Alexandria', 2),
(6, 'es', 'Alexandria', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_type` enum('doctor','market') NOT NULL,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `order_id`, `order_type`, `to_user`, `from_user`, `value`) VALUES
(1, 1, 'doctor', 1, 3, 6),
(2, 2, 'doctor', 1, 3, 9),
(3, 1, 'doctor', 1, 13, 3),
(4, 2, 'doctor', 1, 13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_replay` tinyint(4) NOT NULL DEFAULT '0',
  `replay` text COLLATE utf8mb4_unicode_ci,
  `date` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `is_replay`, `replay`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed ', 'mn@gmail.com', NULL, 'Nmmmjj', 0, NULL, 0, '2020-09-06 02:18:45', '2020-09-06 02:18:45'),
(2, 'bbb', 'bbb@gmail.com', NULL, 'Meddling ', 0, NULL, 0, '2020-09-11 02:15:17', '2020-09-11 02:15:17'),
(3, 'Mohamed Samy', 'msamy.ali@gmail.com', 'Inquiry', 'Hi, is it possible to have a medications reminder call service? ', 0, NULL, 0, '2020-11-28 01:54:21', '2020-11-28 01:54:21'),
(4, 'Mohamed Samy', 'msamy.ali@gmail.com', 'Inquiry', 'Hi, is it possible to have a medications reminder call service? ', 0, NULL, 0, '2020-11-28 01:54:33', '2020-11-28 01:54:33'),
(5, 'احمد محمد الحسنين', 'ahmedelhasanin4123@gmail.com', 'لا يوجد طلبات', 'السلام عليكم ورحمة الله وبركاته . حضرتك لا يوجد طلبات حتى الآن من ساعة اشتراك معكم في الخدمة فهل هناك مشكله ارجو الافاده . وشكرا ', 0, NULL, 0, '2021-04-19 06:15:56', '2021-04-19 06:15:56'),
(6, 'mahmoud samir', 'mahmoudsamir7996@gmail.com', '01012346798', 'انا دكتور علاج طبيعى لو محتاجين دكتور فى منطقه الهرم وفيصل والجيزه عندى خبره كبيره فى العلاج الطبيعى المنزلى ', 0, NULL, 0, '2021-06-04 11:48:41', '2021-06-04 11:48:41'),
(7, 'samy', 'samy@gmail.com', 'subject', 'hello world ', 0, NULL, 0, '2021-10-15 02:40:20', '2021-10-15 02:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id_country` int(11) NOT NULL,
  `phone_code` int(5) NOT NULL,
  `num_code` smallint(6) NOT NULL,
  `iso_two` varchar(2) NOT NULL,
  `iso_three` varchar(3) NOT NULL,
  `google_lat` varchar(80) DEFAULT NULL,
  `google_long` varchar(80) DEFAULT NULL,
  `small_flag` varchar(255) DEFAULT NULL,
  `big_flag` varchar(80) DEFAULT NULL,
  `zoom` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AVG_ROW_LENGTH=434 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id_country`, `phone_code`, `num_code`, `iso_two`, `iso_three`, `google_lat`, `google_long`, `small_flag`, `big_flag`, `zoom`, `deleted`) VALUES
(1, 93, 4, 'AF', 'AFG', '33.98299275', '66.39159363', 'AF-32.png', 'AF-128.png', 6, 1),
(2, 355, 8, 'AL', 'ALB', '41.00017358', '19.87170014', 'AL-32.png', 'AL-128.png', 7, 0),
(3, 213, 12, 'DZ', 'DZA', '27.89861690', '3.19771194', 'DZ-32.png', 'DZ-128.png', 5, 0),
(4, 376, 20, 'AD', 'AND', '42.54057088', '1.55201340', 'AD-32.png', 'AD-128.png', 11, 1),
(5, 244, 24, 'AO', 'AGO', '-12.16469683', '16.70933622', 'AO-32.png', 'AO-128.png', 6, 1),
(6, 1268, 28, 'AG', 'ATG', '17.48060423', '-61.42014426', 'AG-32.png', 'AG-128.png', 9, 1),
(7, 54, 32, 'AR', 'ARG', '-38.01529308', '-64.97897469', 'AR-32.png', 'AR-128.png', 4, 0),
(8, 374, 51, 'AM', 'ARM', '40.13475528', '45.01072318', 'AM-32.png', 'AM-128.png', 7, 0),
(9, 61, 36, 'AU', 'AUS', '-26.29594646', '133.55540944', 'AU-32.png', 'AU-128.png', 4, 0),
(10, 43, 40, 'AT', 'AUT', '47.63125476', '13.18776731', 'AT-32.png', 'AT-128.png', 7, 0),
(11, 994, 31, 'AZ', 'AZE', '40.35321757', '47.46706372', 'AZ-32.png', 'AZ-128.png', 7, 1),
(12, 1242, 44, 'BS', 'BHS', '24.45991732', '-77.68192453', 'BS-32.png', 'BS-128.png', 7, 1),
(13, 973, 48, 'BH', 'BHR', '25.90740996', '50.65932354', 'BH-32.png', 'BH-128.png', 9, 0),
(14, 880, 50, 'BD', 'BGD', '24.08273251', '90.49915527', 'BD-32.png', 'BD-128.png', 7, 1),
(15, 1246, 52, 'BB', 'BRB', '13.19383077', '-59.54319600', 'BB-32.png', 'BB-128.png', 11, 1),
(16, 375, 112, 'BY', 'BLR', '53.58628747', '27.95338900', 'BY-32.png', 'BY-128.png', 6, 1),
(17, 32, 56, 'BE', 'BEL', '50.49593874', '4.46993600', 'BE-32.png', 'BE-128.png', 8, 0),
(18, 501, 84, 'BZ', 'BLZ', '17.21153631', '-88.01424956', 'BZ-32.png', 'BZ-128.png', 8, 1),
(19, 229, 204, 'BJ', 'BEN', '9.37180859', '2.29386134', 'BJ-32.png', 'BJ-128.png', 7, 1),
(20, 975, 64, 'BT', 'BTN', '27.50752756', '90.43360300', 'BT-32.png', 'BT-128.png', 8, 1),
(21, 387, 70, 'BA', 'BIH', '44.00040856', '17.81640910', 'BA-32.png', 'BA-128.png', 7, 0),
(22, 267, 72, 'BW', 'BWA', '-22.18279485', '24.22344422', 'BW-32.png', 'BW-128.png', 6, 1),
(23, 55, 76, 'BR', 'BRA', '-11.80965046', '-53.33152600', 'BR-32.png', 'BR-128.png', 4, 0),
(24, 673, 96, 'BN', 'BRN', '4.54189364', '114.60132823', 'BN-32.png', 'BN-128.png', 9, 1),
(25, 359, 100, 'BG', 'BGR', '42.70160678', '25.48583200', 'BG-32.png', 'BG-128.png', 7, 0),
(26, 226, 854, 'BF', 'BFA', '12.22492458', '-1.56159100', 'BF-32.png', 'BF-128.png', 7, 0),
(27, 257, 108, 'BI', 'BDI', '-3.40499707', '29.88592902', 'BI-32.png', 'BI-128.png', 8, 0),
(28, 855, 116, 'KH', 'KHM', '12.83288883', '104.84814273', 'KH-32.png', 'KH-128.png', 7, 1),
(29, 237, 120, 'CM', 'CMR', '7.38622543', '12.72825915', 'CM-32.png', 'CM-128.png', 6, 0),
(30, 1, 124, 'CA', 'CAN', '60.36196817', '-106.69833150', 'CA-32.png', 'CA-128.png', 4, 0),
(31, 0, 0, 'CV', 'CPV', '15.11988711', '-23.60517010', 'CV-32.png', 'CV-128.png', 10, 1),
(32, 236, 140, 'CF', 'CAF', '6.82541830', '20.64281514', 'CF-32.png', 'CF-128.png', 6, 0),
(33, 235, 148, 'TD', 'TCD', '14.80342407', '18.78714064', 'TD-32.png', 'TD-128.png', 5, 0),
(34, 56, 152, 'CL', 'CHL', '-38.01760790', '-71.40014474', 'CL-32.png', 'CL-128.png', 4, 0),
(35, 86, 156, 'CN', 'CHN', '36.71457440', '103.55819197', 'CN-32.png', 'CN-128.png', 4, 0),
(36, 57, 170, 'CO', 'COL', '3.68182320', '-73.53927436', 'CO-32.png', 'CO-128.png', 5, 0),
(37, 269, 174, 'KM', 'COM', '-11.64529989', '43.33330200', 'KM-32.png', 'KM-128.png', 10, 0),
(38, 242, 178, 'CG', 'COG', '-0.68967806', '15.69033190', 'CG-32.png', 'CG-128.png', 6, 0),
(39, 506, 188, 'CR', 'CRI', '9.98427463', '-84.09949534', 'CR-32.png', 'CR-128.png', 8, 0),
(40, 385, 191, 'HR', 'HRV', '44.81372482', '16.29039507', 'HR-32.png', 'HR-128.png', 7, 0),
(41, 53, 192, 'CU', 'CUB', '21.54513189', '-79.00064743', 'CU-32.png', 'CU-128.png', 6, 0),
(42, 357, 196, 'CY', 'CYP', '35.12450768', '33.42986100', 'CY-32.png', 'CY-128.png', 9, 0),
(43, 0, 0, 'CZ', 'CZE', '49.76026136', '15.53888197', 'CZ-32.png', 'CZ-128.png', 7, 0),
(44, 0, 0, 'CI', 'CIV', '7.59684148', '-5.49214636', 'CI-32.png', 'CI-128.png', 7, 0),
(45, 45, 208, 'DK', 'DNK', '54.71794021', '9.41938953', 'DK-32.png', 'DK-128.png', 6, 0),
(46, 253, 262, 'DJ', 'DJI', '11.75959257', '42.65344839', 'DJ-32.png', 'DJ-128.png', 8, 1),
(47, 1767, 212, 'DM', 'DMA', '15.41473963', '-61.37097400', 'DM-32.png', 'DM-128.png', 10, 1),
(48, 1809, 214, 'DO', 'DOM', '18.73076761', '-70.16264900', 'DO-32.png', 'DO-128.png', 8, 1),
(49, 593, 218, 'EC', 'ECU', '-1.22919037', '-78.55693916', 'EC-32.png', 'EC-128.png', 6, 0),
(50, 20, 818, 'EG', 'EGY', '26.71650873', '30.80250000', 'EG-32.png', 'EG-128.png', 6, 0),
(51, 503, 222, 'SV', 'SLV', '13.79043561', '-88.89652800', 'SV-32.png', 'SV-128.png', 8, 0),
(52, 240, 226, 'GQ', 'GNQ', '1.65068442', '10.26789700', 'GQ-32.png', 'GQ-128.png', 9, 0),
(53, 291, 232, 'ER', 'ERI', '15.21227764', '39.61204792', 'ER-32.png', 'ER-128.png', 7, 1),
(54, 372, 233, 'EE', 'EST', '58.74041141', '25.38165099', 'EE-32.png', 'EE-128.png', 7, 1),
(55, 251, 231, 'ET', 'ETH', '9.10727589', '39.84148164', 'ET-32.png', 'ET-128.png', 6, 1),
(56, 679, 242, 'FJ', 'FJI', '-17.71219757', '178.06503600', 'FJ-32.png', 'FJ-128.png', 9, 1),
(57, 358, 246, 'FI', 'FIN', '64.69610892', '26.36339137', 'FI-32.png', 'FI-128.png', 5, 1),
(58, 33, 250, 'FR', 'FRA', '46.48372145', '2.60926281', 'FR-32.png', 'FR-128.png', 6, 0),
(59, 241, 266, 'GA', 'GAB', '-0.43426435', '11.43916591', 'GA-32.png', 'GA-128.png', 7, 1),
(60, 220, 270, 'GM', 'GMB', '13.15921146', '-15.35956748', 'GM-32.png', 'GM-128.png', 8, 1),
(61, 995, 268, 'GE', 'GEO', '41.82754301', '44.17329916', 'GE-32.png', 'GE-128.png', 7, 0),
(62, 49, 276, 'DE', 'DEU', '50.82871201', '10.97887975', 'DE-32.png', 'DE-128.png', 6, 0),
(63, 233, 288, 'GH', 'GHA', '7.69154199', '-1.29234904', 'GH-32.png', 'GH-128.png', 7, 0),
(64, 30, 300, 'GR', 'GRC', '38.52254746', '24.53794505', 'GR-32.png', 'GR-128.png', 6, 0),
(65, 1473, 308, 'GD', 'GRD', '12.11644807', '-61.67899400', 'GD-32.png', 'GD-128.png', 11, 1),
(66, 502, 320, 'GT', 'GTM', '15.72598421', '-89.96707712', 'GT-32.png', 'GT-128.png', 7, 1),
(67, 224, 324, 'GN', 'GIN', '9.94301472', '-11.31711839', 'GN-32.png', 'GN-128.png', 7, 1),
(68, 245, 624, 'GW', 'GNB', '11.80050682', '-15.18040700', 'GW-32.png', 'GW-128.png', 8, 1),
(69, 592, 328, 'GY', 'GUY', '4.47957059', '-58.72692293', 'GY-32.png', 'GY-128.png', 6, 1),
(70, 509, 332, 'HT', 'HTI', '19.07430861', '-72.79607526', 'HT-32.png', 'HT-128.png', 8, 1),
(71, 504, 340, 'HN', 'HND', '14.64994423', '-87.01643713', 'HN-32.png', 'HN-128.png', 7, 1),
(72, 36, 348, 'HU', 'HUN', '46.97670384', '19.35499657', 'HU-32.png', 'HU-128.png', 7, 1),
(73, 354, 352, 'IS', 'ISL', '64.99294495', '-18.57038755', 'IS-32.png', 'IS-128.png', 6, 0),
(74, 91, 356, 'IN', 'IND', '20.46549519', '78.50146222', 'IN-32.png', 'IN-128.png', 4, 0),
(75, 62, 360, 'ID', 'IDN', '-2.46229680', '121.18329789', 'ID-32.png', 'ID-128.png', 4, 0),
(76, 964, 368, 'IQ', 'IRQ', '32.90170182', '43.19590056', 'IQ-32.png', 'IQ-128.png', 6, 0),
(77, 353, 372, 'IE', 'IRL', '53.10101628', '-8.21092302', 'IE-32.png', 'IE-128.png', 6, 0),
(78, 972, 376, 'IL', 'ISR', '30.85883075', '34.91753797', 'IL-32.png', 'IL-128.png', 7, 1),
(79, 39, 380, 'IT', 'ITA', '41.77810840', '12.67725128', 'IT-32.png', 'IT-128.png', 5, 0),
(80, 1876, 388, 'JM', 'JAM', '18.10838487', '-77.29750600', 'JM-32.png', 'JM-128.png', 9, 1),
(81, 81, 392, 'JP', 'JPN', '37.51848822', '137.67066061', 'JP-32.png', 'JP-128.png', 5, 0),
(82, 962, 400, 'JO', 'JOR', '31.31616588', '36.37575510', 'JO-32.png', 'JO-128.png', 7, 0),
(83, 7, 398, 'KZ', 'KAZ', '45.38592596', '68.81334444', 'KZ-32.png', 'KZ-128.png', 4, 1),
(84, 254, 404, 'KE', 'KEN', '0.19582452', '37.97212297', 'KE-32.png', 'KE-128.png', 6, 1),
(85, 686, 296, 'KI', 'KIR', '1.87085244', '-157.36259310', 'KI-32.png', 'KI-128.png', 10, 1),
(86, 965, 414, 'KW', 'KWT', '29.43253341', '47.71798405', 'KW-32.png', 'KW-128.png', 8, 0),
(87, 996, 417, 'KG', 'KGZ', '41.11509878', '74.25524574', 'KG-32.png', 'KG-128.png', 6, 1),
(88, 0, 0, 'LA', 'LAO', '17.76075593', '103.61611347', 'LA-32.png', 'LA-128.png', 6, 1),
(89, 371, 428, 'LV', 'LVA', '56.86697515', '24.54826936', 'LV-32.png', 'LV-128.png', 7, 1),
(90, 961, 422, 'LB', 'LBN', '34.08249284', '35.66454309', 'LB-32.png', 'LB-128.png', 8, 0),
(91, 266, 426, 'LS', 'LSO', '-29.60303205', '28.23361200', 'LS-32.png', 'LS-128.png', 8, 1),
(92, 231, 430, 'LR', 'LBR', '6.44154681', '-9.39103485', 'LR-32.png', 'LR-128.png', 7, 1),
(93, 0, 0, 'LY', 'LBY', '27.06902914', '18.19513987', 'LY-32.png', 'LY-128.png', 5, 0),
(94, 423, 438, 'LI', 'LIE', '47.16587383', '9.55537700', 'LI-32.png', 'LI-128.png', 11, 1),
(95, 370, 440, 'LT', 'LTU', '55.25095948', '23.80987587', 'LT-32.png', 'LT-128.png', 7, 1),
(96, 352, 442, 'LU', 'LUX', '49.81327712', '6.12958700', 'LU-32.png', 'LU-128.png', 9, 1),
(97, 261, 450, 'MG', 'MDG', '-19.79858543', '46.97898228', 'MG-32.png', 'MG-128.png', 5, 1),
(98, 265, 454, 'MW', 'MWI', '-12.48684092', '34.14223524', 'MW-32.png', 'MW-128.png', 6, 1),
(99, 60, 458, 'MY', 'MYS', '4.97345793', '106.54609050', 'MY-32.png', 'MY-128.png', 5, 1),
(100, 960, 462, 'MV', 'MDV', '-0.64224221', '73.13373313', 'MV-32.png', 'MV-128.png', 12, 1),
(101, 223, 466, 'ML', 'MLI', '17.69385811', '-1.96368730', 'ML-32.png', 'ML-128.png', 5, 1),
(102, 356, 470, 'MT', 'MLT', '35.89706403', '14.43687877', 'MT-32.png', 'MT-128.png', 11, 1),
(103, 692, 584, 'MH', 'MHL', '7.30130732', '168.75512619', 'MH-32.png', 'MH-128.png', 10, 1),
(104, 222, 478, 'MR', 'MRT', '20.28331239', '-10.21573334', 'MR-32.png', 'MR-128.png', 5, 1),
(105, 230, 480, 'MU', 'MUS', '-20.28368188', '57.56588291', 'MU-32.png', 'MU-128.png', 10, 1),
(106, 52, 484, 'MX', 'MEX', '22.92036676', '-102.33305344', 'MX-32.png', 'MX-128.png', 5, 0),
(107, 377, 492, 'MC', 'MCO', '43.70463620', '6.75444978', 'MC-32.png', 'MC-128.png', 9, 0),
(108, 976, 496, 'MN', 'MNG', '46.80556270', '104.30808978', 'MN-32.png', 'MN-128.png', 5, 1),
(109, 0, 0, 'ME', 'MNE', '42.71699590', '19.09699321', 'ME-32.png', 'ME-128.png', 8, 1),
(110, 212, 504, 'MA', 'MAR', '31.95441758', '-7.26839325', 'MA-32.png', 'MA-128.png', 6, 0),
(111, 258, 508, 'MZ', 'MOZ', '-19.07617816', '33.81570282', 'MZ-32.png', 'MZ-128.png', 5, 1),
(112, 95, 104, 'MM', 'MMR', '19.20985380', '96.54949272', 'MM-32.png', 'MM-128.png', 5, 1),
(113, 264, 516, 'NA', 'NAM', '-22.70965620', '16.72161918', 'NA-32.png', 'NA-128.png', 6, 1),
(114, 674, 520, 'NR', 'NRU', '-0.52586763', '166.93270463', 'NR-32.png', 'NR-128.png', 13, 1),
(115, 977, 524, 'NP', 'NPL', '28.28430770', '83.98119373', 'NP-32.png', 'NP-128.png', 7, 1),
(116, 31, 528, 'NL', 'NLD', '52.33939951', '4.98914998', 'NL-32.png', 'NL-128.png', 7, 0),
(117, 64, 554, 'NZ', 'NZL', '-40.95025298', '171.76586181', 'NZ-32.png', 'NZ-128.png', 5, 0),
(118, 505, 558, 'NI', 'NIC', '12.91806226', '-84.82270352', 'NI-32.png', 'NI-128.png', 7, 1),
(119, 227, 562, 'NE', 'NER', '17.23446679', '8.23547860', 'NE-32.png', 'NE-128.png', 6, 0),
(120, 234, 566, 'NG', 'NGA', '9.02165273', '7.82933373', 'NG-32.png', 'NG-128.png', 6, 0),
(121, 47, 578, 'NO', 'NOR', '65.04680297', '13.50069228', 'NO-32.png', 'NO-128.png', 4, 0),
(122, 968, 512, 'OM', 'OMN', '20.69906846', '56.69230596', 'OM-32.png', 'OM-128.png', 6, 0),
(123, 92, 586, 'PK', 'PAK', '29.90335974', '70.34487986', 'PK-32.png', 'PK-128.png', 5, 1),
(124, 680, 585, 'PW', 'PLW', '7.49856307', '134.57291496', 'PW-32.png', 'PW-128.png', 10, 1),
(125, 507, 591, 'PA', 'PAN', '8.52135102', '-80.04603702', 'PA-32.png', 'PA-128.png', 7, 0),
(126, 675, 598, 'PG', 'PNG', '-6.62414046', '144.44993477', 'PG-32.png', 'PG-128.png', 7, 1),
(127, 595, 600, 'PY', 'PRY', '-23.38564782', '-58.29551057', 'PY-32.png', 'PY-128.png', 6, 1),
(128, 51, 604, 'PE', 'PER', '-8.50205247', '-76.15772412', 'PE-32.png', 'PE-128.png', 5, 1),
(129, 63, 608, 'PH', 'PHL', '12.82361200', '121.77401700', 'PH-32.png', 'PH-128.png', 6, 1),
(130, 48, 616, 'PL', 'POL', '52.10117636', '19.33190957', 'PL-32.png', 'PL-128.png', 6, 1),
(131, 351, 620, 'PT', 'PRT', '39.44879136', '-8.03768042', 'PT-32.png', 'PT-128.png', 6, 0),
(132, 974, 634, 'QA', 'QAT', '25.24551555', '51.24431480', 'QA-32.png', 'QA-128.png', 8, 0),
(133, 40, 642, 'RO', 'ROU', '45.56450023', '25.21945155', 'RO-32.png', 'RO-128.png', 6, 0),
(134, 70, 643, 'RU', 'RUS', '57.96812298', '102.41837137', 'RU-32.png', 'RU-128.png', 3, 0),
(135, 250, 646, 'RW', 'RWA', '-1.98589079', '29.94255855', 'RW-32.png', 'RW-128.png', 8, 1),
(136, 1869, 659, 'KN', 'KNA', '17.33453669', '-62.76411725', 'KN-32.png', 'KN-128.png', 12, 1),
(137, 1758, 662, 'LC', 'LCA', '13.90938495', '-60.97889500', 'LC-32.png', 'LC-128.png', 11, 1),
(138, 1784, 670, 'VC', 'VCT', '13.25276143', '-61.19709800', 'VC-32.png', 'VC-128.png', 11, 1),
(139, 684, 882, 'WS', 'WSM', '-13.57998954', '-172.45207363', 'WS-32.png', 'WS-128.png', 10, 1),
(140, 378, 674, 'SM', 'SMR', '43.94223356', '12.45777700', 'SM-32.png', 'SM-128.png', 11, 1),
(141, 239, 678, 'ST', 'STP', '0.23381910', '6.59935809', 'ST-32.png', 'ST-128.png', 10, 1),
(142, 966, 682, 'SA', 'SAU', '24.16687314', '42.88190638', 'SA-32.png', 'SA-128.png', 5, 0),
(143, 221, 686, 'SN', 'SEN', '14.43579003', '-14.68306489', 'SN-32.png', 'SN-128.png', 7, 0),
(144, 0, 0, 'RS', 'SRB', '44.06736041', '20.29725084', 'RS-32.png', 'RS-128.png', 7, 0),
(145, 248, 690, 'SC', 'SYC', '-4.68053204', '55.49061371', 'SC-32.png', 'SC-128.png', 11, 1),
(146, 232, 694, 'SL', 'SLE', '8.45575589', '-11.93368759', 'SL-32.png', 'SL-128.png', 8, 1),
(147, 65, 702, 'SG', 'SGP', '1.33873261', '103.83323559', 'SG-32.png', 'SG-128.png', 11, 0),
(148, 421, 703, 'SK', 'SVK', '48.66923253', '19.75396564', 'SK-32.png', 'SK-128.png', 7, 1),
(149, 386, 705, 'SI', 'SVN', '46.14315048', '14.99546300', 'SI-32.png', 'SI-128.png', 8, 1),
(150, 677, 90, 'SB', 'SLB', '-9.64554280', '160.15619400', 'SB-32.png', 'SB-128.png', 10, 1),
(151, 252, 706, 'SO', 'SOM', '2.87224619', '45.27676444', 'SO-32.png', 'SO-128.png', 7, 1),
(152, 27, 710, 'ZA', 'ZAF', '-27.17706863', '24.50856092', 'ZA-32.png', 'ZA-128.png', 5, 0),
(153, 34, 724, 'ES', 'ESP', '39.87299401', '-3.67089492', 'ES-32.png', 'ES-128.png', 6, 0),
(154, 94, 144, 'LK', 'LKA', '7.61264985', '80.83772497', 'LK-32.png', 'LK-128.png', 7, 1),
(155, 249, 736, 'SD', 'SDN', '15.96646839', '30.37145459', 'SD-32.png', 'SD-128.png', 5, 0),
(156, 597, 740, 'SR', 'SUR', '4.26470865', '-55.93988238', 'SR-32.png', 'SR-128.png', 7, 1),
(157, 268, 748, 'SZ', 'SWZ', '-26.53892570', '31.47960891', 'SZ-32.png', 'SZ-128.png', 9, 1),
(158, 46, 752, 'SE', 'SWE', '61.42370427', '16.73188991', 'SE-32.png', 'SE-128.png', 4, 0),
(159, 41, 756, 'CH', 'CHE', '46.81010721', '8.22751200', 'CH-32.png', 'CH-128.png', 8, 0),
(160, 963, 760, 'SY', 'SYR', '34.71097430', '38.66723516', 'SY-32.png', 'SY-128.png', 6, 0),
(161, 992, 762, 'TJ', 'TJK', '38.68075124', '71.23215769', 'TJ-32.png', 'TJ-128.png', 7, 1),
(162, 66, 764, 'TH', 'THA', '14.60009810', '101.38805881', 'TH-32.png', 'TH-128.png', 5, 0),
(163, 670, 0, 'TL', 'TLS', '-8.88926365', '125.99671404', 'TL-32.png', 'TL-128.png', 9, 1),
(164, 228, 768, 'TG', 'TGO', '8.68089206', '0.86049757', 'TG-32.png', 'TG-128.png', 7, 1),
(165, 676, 776, 'TO', 'TON', '-21.17890075', '-175.19824200', 'TO-32.png', 'TO-128.png', 11, 1),
(166, 1868, 780, 'TT', 'TTO', '10.43241863', '-61.22250300', 'TT-32.png', 'TT-128.png', 10, 1),
(167, 216, 788, 'TN', 'TUN', '33.88431940', '9.71878341', 'TN-32.png', 'TN-128.png', 6, 0),
(168, 90, 792, 'TR', 'TUR', '38.27069555', '36.28703317', 'TR-32.png', 'TR-128.png', 5, 0),
(169, 7370, 795, 'TM', 'TKM', '38.94915421', '59.06190323', 'TM-32.png', 'TM-128.png', 6, 1),
(170, 688, 798, 'TV', 'TUV', '-8.45968122', '179.13310944', 'TV-32.png', 'TV-128.png', 12, 1),
(171, 256, 800, 'UG', 'UGA', '1.54760620', '32.44409759', 'UG-32.png', 'UG-128.png', 7, 1),
(172, 380, 804, 'UA', 'UKR', '48.89358596', '31.10516920', 'UA-32.png', 'UA-128.png', 6, 1),
(173, 971, 784, 'AE', 'ARE', '24.64324405', '53.62261227', 'AE-32.png', 'AE-128.png', 7, 0),
(174, 598, 858, 'UY', 'URY', '-32.49342987', '-55.76583300', 'UY-32.png', 'UY-128.png', 7, 0),
(175, 998, 860, 'UZ', 'UZB', '41.30829147', '62.62970960', 'UZ-32.png', 'UZ-128.png', 6, 1),
(176, 678, 548, 'VU', 'VUT', '-15.37256614', '166.95916000', 'VU-32.png', 'VU-128.png', 8, 1),
(177, 84, 704, 'VN', 'VNM', '17.19931699', '107.14012804', 'VN-32.png', 'VN-128.png', 5, 1),
(178, 967, 887, 'YE', 'YEM', '15.60865453', '47.60453676', 'YE-32.png', 'YE-128.png', 6, 0),
(179, 260, 894, 'ZM', 'ZMB', '-13.01812188', '28.33274444', 'ZM-32.png', 'ZM-128.png', 6, 1),
(180, 263, 716, 'ZW', 'ZWE', '-19.00784952', '30.18758584', 'ZW-32.png', 'ZW-128.png', 6, 1),
(181, 682, 184, 'CK', 'COK', '-21.23673066', '-159.77766900', 'CK-32.png', 'CK-128.png', 13, 1),
(182, 0, 0, 'BO', 'BOL', '-16.74518128', '-65.19265691', 'BO-32.png', 'BO-128.png', 6, 1),
(183, 0, 0, 'CD', 'COD', '-4.05373938', '23.01110741', 'CD-32.png', 'CD-128.png', 5, 1),
(184, 0, 0, 'EU', 'EUR', '48.76380654', '14.26843140', 'EU-32.png', 'EU-128.png', 3, 1),
(185, 0, 0, 'FM', 'FSM', '6.88747377', '158.21507170', 'FM-32.png', 'FM-128.png', 12, 1),
(186, 44, 826, 'GB', 'GBR', '53.36540813', '-2.72184767', 'GB-32.png', 'GB-128.png', 6, 0),
(187, 0, 0, 'IR', 'IRN', '31.40240324', '51.28204814', 'IR-32.png', 'IR-128.png', 5, 0),
(188, 0, 0, 'KP', 'PRK', '40.00785500', '127.48812834', 'KP-32.png', 'KP-128.png', 6, 0),
(189, 0, 0, 'KR', 'KOR', '36.56344139', '127.51424646', 'KR-32.png', 'KR-128.png', 7, 0),
(190, 0, 0, 'MD', 'MDA', '47.10710437', '28.54018109', 'MD-32.png', 'MD-128.png', 7, 1),
(191, 0, 0, 'MK', 'MKD', '41.60059479', '21.74527900', 'MK-32.png', 'MK-128.png', 8, 1),
(192, 683, 570, 'NU', 'NIU', '-19.04976362', '-169.86585571', 'NU-32.png', 'NU-128.png', 11, 1),
(193, 0, 0, 'TZ', 'TZA', '-6.37551085', '34.85587302', 'TZ-32.png', 'TZ-128.png', 6, 1),
(194, 0, 0, 'VE', 'VEN', '5.98477766', '-65.94152264', 'VE-32.png', 'VE-128.png', 6, 1),
(195, 1264, 660, 'AI', 'AIA', '18.22053521', '-63.06861300', 'AI-32.png', 'AI-128.png', 12, 1),
(196, 0, 0, 'AQ', 'ATA', '-45.13806295', '10.48095703', 'AQ-32.png', 'AQ-128.png', 2, 1),
(197, 1684, 16, 'AS', 'ASM', '-14.30634641', '-170.69501750', 'AS-32.png', 'AS-128.png', 11, 1),
(198, 297, 533, 'AW', 'ABW', '12.52109661', '-69.96833800', 'AW-32.png', 'AW-128.png', 12, 1),
(199, 0, 0, 'AX', 'ALA', '60.25403213', '20.35918350', 'AX-32.png', 'AX-128.png', 9, 1),
(200, 0, 0, 'BL', 'BLM', '17.90042417', '-62.83376215', 'BL-32.png', 'BL-128.png', 13, 1),
(201, 1441, 60, 'BM', 'BMU', '32.31995785', '-64.76182765', 'BM-32.png', 'BM-128.png', 12, 1),
(202, 0, 0, 'BQ', 'BES', '12.17229702', '-68.28831170', 'BQ-32.png', 'BQ-128.png', 11, 1),
(203, 0, 0, 'BV', 'BVT', '-54.42316906', '3.41319600', 'BV-32.png', 'BV-128.png', 12, 1),
(204, 672, 0, 'CC', 'CCK', '-12.12890685', '96.84689104', 'CC-32.png', 'CC-128.png', 12, 1),
(205, 0, 0, 'CW', 'CUW', '12.20710309', '-69.02160369', 'CW-32.png', 'CW-128.png', 11, 1),
(206, 61, 0, 'CX', 'CXR', '-10.49170619', '105.68083796', 'CX-32.png', 'CX-128.png', 11, 1),
(207, 212, 732, 'EH', 'ESH', '24.79324356', '-13.67683563', 'EH-32.png', 'EH-128.png', 6, 1),
(208, 500, 238, 'FK', 'FLK', '-51.78838251', '-59.52361100', 'FK-32.png', 'FK-128.png', 8, 1),
(209, 0, 0, 'FO', 'FRO', '61.88590482', '-6.91180400', 'FO-32.png', 'FO-128.png', 8, 1),
(210, 594, 254, 'GF', 'GUF', '4.01114381', '-52.97746057', 'GF-32.png', 'GF-128.png', 7, 1),
(211, 0, 0, 'GG', 'GGY', '49.46565975', '-2.58527200', 'GG-32.png', 'GG-128.png', 12, 1),
(212, 350, 292, 'GI', 'GIB', '36.14864641', '-5.34404779', 'GI-32.png', 'GI-128.png', 12, 1),
(213, 299, 304, 'GL', 'GRL', '71.42932629', '-34.38651956', 'GL-32.png', 'GL-128.png', 3, 1),
(214, 590, 312, 'GP', 'GLP', '16.26472785', '-61.55099400', 'GP-32.png', 'GP-128.png', 10, 1),
(215, 0, 0, 'GS', 'SGS', '-54.38130284', '-36.67305304', 'GS-32.png', 'GS-128.png', 9, 1),
(216, 1671, 316, 'GU', 'GUM', '13.44410137', '144.80747791', 'GU-32.png', 'GU-128.png', 10, 1),
(217, 852, 344, 'HK', 'HKG', '22.33728531', '114.14657786', 'HK-32.png', 'HK-128.png', 11, 0),
(218, 0, 0, 'HM', 'HMD', '-53.08168847', '73.50415800', 'HM-32.png', 'HM-128.png', 11, 1),
(219, 0, 0, 'IM', 'IMN', '54.23562697', '-4.54805400', 'IM-32.png', 'IM-128.png', 10, 1),
(220, 246, 0, 'IO', 'IOT', '-7.33461519', '72.42425280', 'IO-32.png', 'IO-128.png', 12, 1),
(221, 0, 0, 'JE', 'JEY', '49.21440771', '-2.13124600', 'JE-32.png', 'JE-128.png', 12, 1),
(222, 1345, 136, 'KY', 'CYM', '19.31322102', '-81.25459800', 'KY-32.png', 'KY-128.png', 11, 1),
(223, 0, 0, 'MF', 'MAF', '18.07637107', '-63.05019106', 'MF-32.png', 'MF-128.png', 12, 1),
(224, 853, 446, 'MO', 'MAC', '22.19872287', '113.54387700', 'MO-32.png', 'MO-128.png', 12, 1),
(225, 1670, 580, 'MP', 'MNP', '15.09783636', '145.67390000', 'MP-32.png', 'MP-128.png', 11, 1),
(226, 596, 474, 'MQ', 'MTQ', '14.64128045', '-61.02417600', 'MQ-32.png', 'MQ-128.png', 10, 1),
(227, 1664, 500, 'MS', 'MSR', '16.74774077', '-62.18736600', 'MS-32.png', 'MS-128.png', 12, 1),
(228, 687, 540, 'NC', 'NCL', '-21.26104020', '165.58783760', 'NC-32.png', 'NC-128.png', 8, 1),
(229, 672, 574, 'NF', 'NFK', '-29.02801043', '167.94303023', 'NF-32.png', 'NF-128.png', 13, 1),
(230, 689, 258, 'PF', 'PYF', '-17.66243898', '-149.40683900', 'PF-32.png', 'PF-128.png', 10, 1),
(231, 508, 666, 'PM', 'SPM', '46.88469499', '-56.31590200', 'PM-32.png', 'PM-128.png', 10, 1),
(232, 0, 0, 'PN', 'PCN', '-24.37673925', '-128.32423730', 'PN-32.png', 'PN-128.png', 13, 1),
(233, 1787, 630, 'PR', 'PRI', '18.21963053', '-66.59015100', 'PR-32.png', 'PR-128.png', 9, 1),
(234, 970, 0, 'PS', 'PSE', '32.26367103', '35.21936714', 'PS-32.png', 'PS-128.png', 8, 1),
(235, 262, 638, 'RE', 'REU', '-21.11480084', '55.53638200', 'RE-32.png', 'RE-128.png', 10, 1),
(236, 0, 0, 'SH', 'SHN', '-37.10521846', '-12.27768580', 'SH-32.png', 'SH-128.png', 12, 1),
(237, 47, 744, 'SJ', 'SJM', '77.92215764', '18.99010622', 'SJ-32.png', 'SJ-128.png', 4, 1),
(238, 0, 0, 'SX', 'SXM', '18.04433885', '-63.05616320', 'SX-32.png', 'SX-128.png', 12, 1),
(239, 1649, 796, 'TC', 'TCA', '21.72816866', '-71.79654471', 'TC-32.png', 'TC-128.png', 9, 1),
(240, 0, 0, 'TF', 'ATF', '-49.27235903', '69.34856300', 'TF-32.png', 'TF-128.png', 8, 1),
(241, 0, 0, 'TK', 'TKL', '-9.16682644', '-171.83981693', 'TK-32.png', 'TK-128.png', 10, 1),
(242, 0, 0, 'TW', 'TWN', '23.71891402', '121.10884043', 'TW-32.png', 'TW-128.png', 7, 1),
(243, 1, 0, 'UM', 'UMI', '19.46305694', '177.98631092', 'UM-32.png', 'UM-128.png', 5, 1),
(244, 0, 0, 'US', 'USA', '37.66895362', '-102.39256450', 'US-32.png', 'US-128.png', 4, 0),
(245, 0, 0, 'VA', 'VAT', '41.90377810', '12.45340142', 'VA-32.png', 'VA-128.png', 16, 1),
(246, 0, 0, 'VG', 'VGB', '17.67004187', '-64.77411010', 'VG-32.png', 'VG-128.png', 10, 1),
(247, 0, 0, 'VI', 'VIR', '18.01000938', '-64.77411410', 'VI-32.png', 'VI-128.png', 9, 1),
(249, 269, 0, 'YT', 'MYT', '-12.82744522', '45.16624200', 'YT-32.png', 'YT-128.png', 11, 1),
(250, 0, 0, 'SS', 'SSD', '7.91320803', '30.15342434', 'SS-32.png', 'SS-128.png', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries_trans`
--

CREATE TABLE `countries_trans` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `name_official` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `currency` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries_trans`
--

INSERT INTO `countries_trans` (`id`, `country_id`, `lang`, `name`, `name_official`, `nationality`, `currency`) VALUES
(1, 1, 'ar', 'أفغانستان', 'جمهورية أفغانستان الإسلامية ', 'أفغانستاني', ''),
(2, 1, 'en', 'Afghanistan', 'The Islamic Republic of Afghanistan', 'Afghan', ''),
(3, 1, 'es', 'Afghanistan', 'The Islamic Republic of Afghanistan', 'Afghan', ''),
(4, 2, 'ar', 'ألبانيا', 'ألبانيا جمهورية ', 'ألباني', ''),
(5, 2, 'en', 'Albania', 'the Republic of Albania', 'Albanian', ''),
(6, 2, 'es', 'Albania', 'the Republic of Albania', 'Albanian', ''),
(7, 3, 'ar', 'الجزائر', 'الجمهورية الجزائرية الديمقراطية الشعبية ', 'جزائري', ''),
(8, 3, 'en', 'Algeria', 'the Peoples Democratic Republic of Algeria', 'Algerian', ''),
(9, 3, 'es', 'Algeria', 'the Peoples Democratic Republic of Algeria', 'Algerian', ''),
(10, 4, 'ar', 'أندورا', 'أندورا إمارة ', 'أندوري', ''),
(11, 4, 'en', 'Andorra', 'the Principality of Andorra', 'Andorran', ''),
(12, 4, 'es', 'Andorra', 'the Principality of Andorra', 'Andorran', ''),
(13, 5, 'ar', 'أنغولا', 'أنغولا جمهورية ', 'أنقولي', ''),
(14, 5, 'en', 'Angola', 'the Republic of Angola', 'Angolan', ''),
(15, 5, 'es', 'Angola', 'the Republic of Angola', 'Angolan', ''),
(16, 6, 'ar', 'أنتيغوا وبربودا ', 'أنتيغوا وبربودا ', 'بربودي', ''),
(17, 6, 'en', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antiguan or Barbudan', ''),
(18, 6, 'es', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antiguan or Barbudan', ''),
(19, 7, 'ar', 'الأرجنتين', 'جمهورية الأرجنتين ', 'أرجنتيني', ''),
(20, 7, 'en', 'Argentina', 'the Argentine Republic', 'Argentine', ''),
(21, 7, 'es', 'Argentina', 'the Argentine Republic', 'Argentine', ''),
(22, 8, 'ar', 'أرمينيا', 'أرمينيا جمهورية ', 'أرميني', ''),
(23, 8, 'en', 'Armenia', 'the Republic of Armenia', 'Armenian', ''),
(24, 8, 'es', 'Armenia', 'the Republic of Armenia', 'Armenian', ''),
(25, 9, 'ar', 'أستراليا', 'أستراليا', 'أسترالي', ''),
(26, 9, 'en', 'Australia', 'Australia', 'Australian', ''),
(27, 9, 'es', 'Australia', 'Australia', 'Australian', ''),
(28, 10, 'ar', 'النمسا', 'النمسا جمهورية ', 'نمساوي', ''),
(29, 10, 'en', 'Austria', 'the Republic of Austria', 'Austrian', ''),
(30, 10, 'es', 'Austria', 'the Republic of Austria', 'Austrian', ''),
(31, 11, 'ar', 'أذربيجان', 'الجمهورية الأذربيجانية ', 'أذربيجاني', ''),
(32, 11, 'en', 'Azerbaijan', 'the Republic of Azerbaijan', 'Azerbaijani, Azeri', ''),
(33, 11, 'es', 'Azerbaijan', 'the Republic of Azerbaijan', 'Azerbaijani, Azeri', ''),
(34, 12, 'ar', 'البهاما جزر ', 'البهاما جزر كمنولث ', 'باهاميسي', ''),
(35, 12, 'en', 'Bahamas', 'the Commonwealth of the Bahamas', 'Bahamian', ''),
(36, 12, 'es', 'Bahamas', 'the Commonwealth of the Bahamas', 'Bahamian', ''),
(37, 13, 'ar', 'البحرين', 'مملكة البحرين ', 'بحريني', ''),
(38, 13, 'en', 'Bahrain', 'the Kingdom of Bahrain', 'Bahraini', ''),
(39, 13, 'es', 'Bahrain', 'the Kingdom of Bahrain', 'Bahraini', ''),
(40, 14, 'ar', 'بنغلاديش', 'الشعبية بنغلاديش جمهورية ', 'بنغلاديشي', ''),
(41, 14, 'en', 'Bangladesh', 'the Peoples Republic of Bangladesh', 'Bangladeshi', ''),
(42, 14, 'es', 'Bangladesh', 'the Peoples Republic of Bangladesh', 'Bangladeshi', ''),
(43, 15, 'ar', 'بربادوس', 'بربادوس', 'بربادوسي', ''),
(44, 15, 'en', 'Barbados', 'Barbados', 'Barbadian', ''),
(45, 15, 'es', 'Barbados', 'Barbados', 'Barbadian', ''),
(46, 16, 'ar', 'بيلاروس', 'بيلاروس جمهورية ', 'روسي', ''),
(47, 16, 'en', 'Belarus', 'the Republic of Belarus', 'Belarusian', ''),
(48, 16, 'es', 'Belarus', 'the Republic of Belarus', 'Belarusian', ''),
(49, 17, 'ar', 'بلجيكا', 'بلجيكا مملكة ', 'بلجيكي', ''),
(50, 17, 'en', 'Belgium', 'the Kingdom of Belgium', 'Belgian', ''),
(51, 17, 'es', 'Belgium', 'the Kingdom of Belgium', 'Belgian', ''),
(52, 18, 'ar', 'بليز', 'بليز', 'بيليزي', ''),
(53, 18, 'en', 'Belize', 'Belize', 'Belizean', ''),
(54, 18, 'es', 'Belize', 'Belize', 'Belizean', ''),
(55, 19, 'ar', 'بنن', 'جمهورية بنن ', 'بنيني', ''),
(56, 19, 'en', 'Benin', 'the Republic of Benin', 'Beninese, Beninois', ''),
(57, 19, 'es', 'Benin', 'the Republic of Benin', 'Beninese, Beninois', ''),
(58, 20, 'ar', 'بوتان', 'بوتان مملكة ', 'بوتاني', ''),
(59, 20, 'en', 'Bhutan', 'the Kingdom of Bhutan', 'Bhutanese', ''),
(60, 20, 'es', 'Bhutan', 'the Kingdom of Bhutan', 'Bhutanese', ''),
(61, 21, 'ar', 'والهرسك البوسنة ', 'والهرسك البوسنة ', 'بوسني/هرسكي', ''),
(62, 21, 'en', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian', ''),
(63, 21, 'es', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian', ''),
(64, 22, 'ar', 'بوتسوانا', 'بوتسوانا جمهورية ', 'بوتسواني', ''),
(65, 22, 'en', 'Botswana', 'the Republic of Botswana', 'Motswana, Botswanan', ''),
(66, 22, 'es', 'Botswana', 'the Republic of Botswana', 'Motswana, Botswanan', ''),
(67, 23, 'ar', 'البرازيل', 'الجمهورية الاتحادية البرازيلية ', 'برازيلي', ''),
(68, 23, 'en', 'Brazil', 'the Federative Republic of Brazil', 'Brazilian', ''),
(69, 23, 'es', 'Brazil', 'the Federative Republic of Brazil', 'Brazilian', ''),
(70, 24, 'ar', 'السلام دار برونى ', 'السلام دار بروني ', 'بروني', ''),
(71, 24, 'en', 'Brunei Darussalam', 'Brunei Darussalam', 'Bruneian', ''),
(72, 24, 'es', 'Brunei Darussalam', 'Brunei Darussalam', 'Bruneian', ''),
(73, 25, 'ar', 'بلغاريا', 'جمهورية بلغاريا ', 'بلغاري', ''),
(74, 25, 'en', 'Bulgaria', 'the Republic of Bulgaria', 'Bulgarian', ''),
(75, 25, 'es', 'Bulgaria', 'the Republic of Bulgaria', 'Bulgarian', ''),
(76, 26, 'ar', 'بوركينا فاسو ', 'بوركينا فاسو ', 'بوركيني', ''),
(77, 26, 'en', 'Burkina Faso', 'Burkina Faso', 'Burkinabé', ''),
(78, 26, 'es', 'Burkina Faso', 'Burkina Faso', 'Burkinabé', ''),
(79, 27, 'ar', 'بوروندي', 'جمهورية بوروندي ', 'بورونيدي', ''),
(80, 27, 'en', 'Burundi', 'the Republic of Burundi', 'Burundian', ''),
(81, 27, 'es', 'Burundi', 'the Republic of Burundi', 'Burundian', ''),
(82, 28, 'ar', 'كمبوديا', 'مملكة كمبوديا ', 'كمبودي', ''),
(83, 28, 'en', 'Cambodia', 'the Kingdom of Cambodia', 'Cambodian', ''),
(84, 28, 'es', 'Cambodia', 'the Kingdom of Cambodia', 'Cambodian', ''),
(85, 29, 'ar', 'الكاميرون', 'جمهورية الكاميرون ', 'كاميروني', ''),
(86, 29, 'en', 'Cameroon', 'the Republic of Cameroon', 'Cameroonian', ''),
(87, 29, 'es', 'Cameroon', 'the Republic of Cameroon', 'Cameroonian', ''),
(88, 30, 'ar', 'كندا', 'كندا', 'كندي', ''),
(89, 30, 'en', 'Canada', 'Canada', 'Canadian', ''),
(90, 30, 'es', 'Canada', 'Canada', 'Canadian', ''),
(91, 31, 'ar', 'كابو فيردي ', 'جمهورية كابو فيردي ', 'كابو فيردي ', ''),
(92, 31, 'en', 'Cabo Verde', 'Republic of Cabo Verde', 'Cabo Verdean', ''),
(93, 31, 'es', 'Cabo Verde', 'Republic of Cabo Verde', 'Cabo Verdean', ''),
(94, 32, 'ar', 'افريقيا الوسطى', 'افريقيا الوسطى', 'أفريقي', ''),
(95, 32, 'en', 'Central African Republic', 'the Central African Republic', 'Central African', ''),
(96, 32, 'es', 'Central African Republic', 'the Central African Republic', 'Central African', ''),
(97, 33, 'ar', 'تشاد', 'تشاد جمهورية ', 'تشادي', ''),
(98, 33, 'en', 'Chad', 'the Republic of Chad', 'Chadian', ''),
(99, 33, 'es', 'Chad', 'the Republic of Chad', 'Chadian', ''),
(100, 34, 'ar', 'شيلى', 'جمهورية شيلى ', 'شيلي', ''),
(101, 34, 'en', 'Chile', 'the Republic of Chile', 'Chilean', ''),
(102, 34, 'es', 'Chile', 'the Republic of Chile', 'Chilean', ''),
(103, 35, 'ar', 'الصين', 'جمهورية الصين الشعبية', 'صيني', ''),
(104, 35, 'en', 'China', 'the Peoples Republic of China', 'Chinese', ''),
(105, 35, 'es', 'China', 'the Peoples Republic of China', 'Chinese', ''),
(106, 36, 'ar', 'كولومبيا', 'جمهورية كولومبيا ', 'كولومبي', ''),
(107, 36, 'en', 'Colombia', 'the Republic of Colombia', 'Colombian', ''),
(108, 36, 'es', 'Colombia', 'the Republic of Colombia', 'Colombian', ''),
(109, 37, 'ar', 'جزر القمر ', 'اتحاد جزر القمر ', 'جزر القمر', ''),
(110, 37, 'en', 'Comoros', 'the Union of the Comoros', 'Comoran, Comorian', ''),
(111, 37, 'es', 'Comoros', 'the Union of the Comoros', 'Comoran, Comorian', ''),
(112, 38, 'ar', 'الكونغو', 'الكونغو جمهورية ', 'كونغي', ''),
(113, 38, 'en', 'Congo', 'the Republic of the Congo', '', ''),
(114, 38, 'es', 'Congo', 'the Republic of the Congo', '', ''),
(115, 39, 'ar', 'كوستاريكا', 'جمهورية كوستاريكا ', 'كوستاريكي', ''),
(116, 39, 'en', 'Costa Rica', 'the Republic of Costa Rica', 'Costa Rican', ''),
(117, 39, 'es', 'Costa Rica', 'the Republic of Costa Rica', 'Costa Rican', ''),
(118, 40, 'ar', 'كرواتيا', 'جمهورية كرواتيا ', 'كوراتي', ''),
(119, 40, 'en', 'Croatia', 'the Republic of Croatia', 'Croatian', ''),
(120, 40, 'es', 'Croatia', 'the Republic of Croatia', 'Croatian', ''),
(121, 41, 'ar', 'كوبا', 'جمهورية كوبا ', 'كوبي', ''),
(122, 41, 'en', 'Cuba', 'the Republic of Cuba', 'Cuban', ''),
(123, 41, 'es', 'Cuba', 'the Republic of Cuba', 'Cuban', ''),
(124, 42, 'ar', 'قبرص', 'جمهورية قبرص ', 'قبرصي', ''),
(125, 42, 'en', 'Cyprus', 'the Republic of Cyprus', 'Cypriot', ''),
(126, 42, 'es', 'Cyprus', 'the Republic of Cyprus', 'Cypriot', ''),
(127, 43, 'ar', 'التشيك', ' الجمهورية التشيكية ', 'تشيكى', ''),
(128, 43, 'en', 'Czechia', 'the Czech Republic', 'Czech', ''),
(129, 43, 'es', 'Czechia', 'the Czech Republic', 'Czech', ''),
(130, 44, 'ar', 'كوت ديفوار ', 'جمهورية كوت ديفوار  ', 'كوتى ديفوارى', ''),
(131, 44, 'en', 'Côte dIvoire', 'the Republic of Côte dIvoire', 'Cote d\'Ivoire', ''),
(132, 44, 'es', 'Côte dIvoire', 'the Republic of Côte dIvoire', 'Cote d\'Ivoire', ''),
(133, 45, 'ar', 'الدانمرك', 'مملكة الدانمرك ', 'دنماركي', ''),
(134, 45, 'en', 'Denmark', 'the Kingdom of Denmark', 'Danish', ''),
(135, 45, 'es', 'Denmark', 'the Kingdom of Denmark', 'Danish', ''),
(136, 46, 'ar', 'جيبوتي', 'جيبوتي جمهورية ', 'جيبوتي', ''),
(137, 46, 'en', 'Djibouti', 'the Republic of Djibouti', 'Djiboutian', ''),
(138, 46, 'es', 'Djibouti', 'the Republic of Djibouti', 'Djiboutian', ''),
(139, 47, 'ar', 'دومينيكا', 'كمنولث دومينيكا ', 'دومينيكي', ''),
(140, 47, 'en', 'Dominica', 'the Commonwealth of Dominica', 'Dominican', ''),
(141, 47, 'es', 'Dominica', 'the Commonwealth of Dominica', 'Dominican', ''),
(142, 48, 'ar', 'الجمهورية الدومينيكية ', 'الجمهورية الدومينيكية ', 'دومينيكي', ''),
(143, 48, 'en', 'Dominican Republic', 'the Dominican Republic', 'Dominican', ''),
(144, 48, 'es', 'Dominican Republic', 'the Dominican Republic', 'Dominican', ''),
(145, 49, 'ar', 'إكوادور', 'إكوادور جمهورية ', 'إكوادوري', ''),
(146, 49, 'en', 'Ecuador', 'the Republic of Ecuador', 'Ecuadorian', ''),
(147, 49, 'es', 'Ecuador', 'the Republic of Ecuador', 'Ecuadorian', ''),
(148, 50, 'ar', 'مصر', 'العربية مصر جمهورية ', 'مصري', 'ج.م'),
(149, 50, 'en', 'Egypt', 'the Arab Republic of Egypt', 'Egyptian', 'EGP'),
(150, 50, 'es', 'Egypt', 'the Arab Republic of Egypt', 'Egyptian', 'EGP'),
(151, 51, 'ar', 'السلفادور', 'جمهورية السلفادور  ', 'سلفادوري', ''),
(152, 51, 'en', 'El Salvador', 'the Republic of El Salvador', 'Salvadoran', ''),
(153, 51, 'es', 'El Salvador', 'the Republic of El Salvador', 'Salvadoran', ''),
(154, 52, 'ar', 'غينيا الاستوائية  ', 'جمهورية غينيا الاستوائية  ', 'غيني', ''),
(155, 52, 'en', 'Equatorial Guinea', 'the Republic of Equatorial Guinea', 'Equatorial Guinean, Equatoguinean', ''),
(156, 52, 'es', 'Equatorial Guinea', 'the Republic of Equatorial Guinea', 'Equatorial Guinean, Equatoguinean', ''),
(157, 53, 'ar', 'إريتريا', 'إريتريا دولة ', 'إريتيري', ''),
(158, 53, 'en', 'Eritrea', 'the State of Eritrea', 'Eritrean', ''),
(159, 53, 'es', 'Eritrea', 'the State of Eritrea', 'Eritrean', ''),
(160, 54, 'ar', 'إستونيا', 'جمهورية إستونيا ', 'استوني', ''),
(161, 54, 'en', 'Estonia', 'the Republic of Estonia', 'Estonian', ''),
(162, 54, 'es', 'Estonia', 'the Republic of Estonia', 'Estonian', ''),
(163, 55, 'ar', 'إثيوبيا', 'جمهورية إثيوبيا الديمقراطية الاتحادية ', 'أثيوبي', ''),
(164, 55, 'en', 'Ethiopia', 'the Federal Democratic Republic of Ethiopia', 'Ethiopian', ''),
(165, 55, 'es', 'Ethiopia', 'the Federal Democratic Republic of Ethiopia', 'Ethiopian', ''),
(166, 56, 'ar', 'فيجي', 'جمهورية فيجي ', 'فيجي', ''),
(167, 56, 'en', 'Fiji', 'the Republic of Fiji', 'Fijian', ''),
(168, 56, 'es', 'Fiji', 'the Republic of Fiji', 'Fijian', ''),
(169, 57, 'ar', 'فنلندا', 'فنلندا جمهورية ', 'فنلندي', ''),
(170, 57, 'en', 'Finland', 'the Republic of Finland', 'Finnish', ''),
(171, 57, 'es', 'Finland', 'the Republic of Finland', 'Finnish', ''),
(172, 58, 'ar', 'فرنسا', 'الفرنسية الجمهورية ', 'فرنسي', ''),
(173, 58, 'en', 'France', 'the French Republic', 'French', ''),
(174, 58, 'es', 'France', 'the French Republic', 'French', ''),
(175, 59, 'ar', 'غابون', 'الجمهورية الغابونية ', 'غابوني', ''),
(176, 59, 'en', 'Gabon', 'the Gabonese Republic', 'Gabonese', ''),
(177, 59, 'es', 'Gabon', 'the Gabonese Republic', 'Gabonese', ''),
(178, 60, 'ar', 'غامبيا', 'الإسلامية غامبيا جمهورية ', 'غامبي', ''),
(179, 60, 'en', 'Gambia', 'Islamic Republic of the Gambia', 'Gambian', ''),
(180, 60, 'es', 'Gambia', 'Islamic Republic of the Gambia', 'Gambian', ''),
(181, 61, 'ar', 'جورجيا', 'جورجيا', 'جيورجي', ''),
(182, 61, 'en', 'Georgia', 'Georgia', 'Georgian', ''),
(183, 61, 'es', 'Georgia', 'Georgia', 'Georgian', ''),
(184, 62, 'ar', 'ألمانيا', 'ألمانيا ', 'ألماني', ''),
(185, 62, 'en', 'Germany', 'the Federal Republic of Germany', 'German', ''),
(186, 62, 'es', 'Germany', 'the Federal Republic of Germany', 'German', ''),
(187, 63, 'ar', 'غانا', 'غانا جمهورية ', 'غاني', ''),
(188, 63, 'en', 'Ghana', 'the Republic of Ghana', 'Ghanaian', ''),
(189, 63, 'es', 'Ghana', 'the Republic of Ghana', 'Ghanaian', ''),
(190, 64, 'ar', 'اليونان', 'الهيلانية الجمهورية ', 'يوناني', ''),
(191, 64, 'en', 'Greece', 'the Hellenic Republic', 'Greek, Hellenic', ''),
(192, 64, 'es', 'Greece', 'the Hellenic Republic', 'Greek, Hellenic', ''),
(193, 65, 'ar', 'غرينادا', 'غرينادا', 'غرينادي', ''),
(194, 65, 'en', 'Grenada', 'Grenada', 'Grenadian', ''),
(195, 65, 'es', 'Grenada', 'Grenada', 'Grenadian', ''),
(196, 66, 'ar', 'غواتيمالا', 'جمهورية غواتيمالا ', 'غواتيمالي', ''),
(197, 66, 'en', 'Guatemala', 'the Republic of Guatemala', 'Guatemalan', ''),
(198, 66, 'es', 'Guatemala', 'the Republic of Guatemala', 'Guatemalan', ''),
(199, 67, 'ar', 'غينيا', 'جمهورية غينيا ', 'غيني', ''),
(200, 67, 'en', 'Guinea', 'the Republic of Guinea', 'Guinean', ''),
(201, 67, 'es', 'Guinea', 'the Republic of Guinea', 'Guinean', ''),
(202, 68, 'ar', 'غينيا - بيساو ', 'جمهورية غينيا بيساو ', 'غيني', ''),
(203, 68, 'en', 'Guinea-Bissau', 'the Republic of Guinea-Bissau', 'Bissau-Guinean', ''),
(204, 68, 'es', 'Guinea-Bissau', 'the Republic of Guinea-Bissau', 'Bissau-Guinean', ''),
(205, 69, 'ar', 'غيانا', 'جمهورية غيانا ', 'غياني', ''),
(206, 69, 'en', 'Guyana', 'the Republic of Guyana', 'Guyanese', ''),
(207, 69, 'es', 'Guyana', 'the Republic of Guyana', 'Guyanese', ''),
(208, 70, 'ar', 'هايتي', 'جمهورية هايتي ', 'هايتي', ''),
(209, 70, 'en', 'Haiti', 'the Republic of Haiti', 'Haitian', ''),
(210, 70, 'es', 'Haiti', 'the Republic of Haiti', 'Haitian', ''),
(211, 71, 'ar', 'هندوراس', 'هندوراس جمهورية ', 'هندوراسي', ''),
(212, 71, 'en', 'Honduras', 'the Republic of Honduras', 'Honduran', ''),
(213, 71, 'es', 'Honduras', 'the Republic of Honduras', 'Honduran', ''),
(214, 72, 'ar', 'هنغاريا', 'هنغاريا', 'مجري', ''),
(215, 72, 'en', 'Hungary', 'Hungary', 'Hungarian, Magyar', ''),
(216, 72, 'es', 'Hungary', 'Hungary', 'Hungarian, Magyar', ''),
(217, 73, 'ar', 'آيسلندا', 'آيسلندا جمهورية ', 'آيسلندي', ''),
(218, 73, 'en', 'Iceland', 'the Republic of Iceland', 'Icelandic', ''),
(219, 73, 'es', 'Iceland', 'the Republic of Iceland', 'Icelandic', ''),
(220, 74, 'ar', 'الهند', 'جمهورية الهند ', 'هندي', ''),
(221, 74, 'en', 'India', 'the Republic of India', 'Indian', ''),
(222, 74, 'es', 'India', 'the Republic of India', 'Indian', ''),
(223, 75, 'ar', 'إندونيسيا', 'جمهورية إندونيسيا ', 'أندونيسيي', ''),
(224, 75, 'en', 'Indonesia', 'the Republic of Indonesia', 'Indonesian', ''),
(225, 75, 'es', 'Indonesia', 'the Republic of Indonesia', 'Indonesian', ''),
(226, 76, 'ar', 'العراق', 'جمهورية العراق ', 'عراقي', ''),
(227, 76, 'en', 'Iraq', 'the Republic of Iraq', 'Iraqi', ''),
(228, 76, 'es', 'Iraq', 'the Republic of Iraq', 'Iraqi', ''),
(229, 77, 'ar', 'آيرلندا', 'آيرلندا', 'إيرلندي', ''),
(230, 77, 'en', 'Ireland', 'Ireland', 'Irish', ''),
(231, 77, 'es', 'Ireland', 'Ireland', 'Irish', ''),
(232, 78, 'ar', 'إسرائيل', 'إسرائيل دولة ', 'إسرائيلي', ''),
(233, 78, 'en', 'Israel', 'the State of Israel', 'Israeli', ''),
(234, 78, 'es', 'Israel', 'the State of Israel', 'Israeli', ''),
(235, 79, 'ar', 'إيطاليا', 'الإيطالية الجمهورية ', 'إيطالي', ''),
(236, 79, 'en', 'Italy', 'the Republic of Italy', 'Italian', ''),
(237, 79, 'es', 'Italy', 'the Republic of Italy', 'Italian', ''),
(238, 80, 'ar', 'جامايكا', 'جامايكا', 'جمايكي', ''),
(239, 80, 'en', 'Jamaica', 'Jamaica', 'Jamaican', ''),
(240, 80, 'es', 'Jamaica', 'Jamaica', 'Jamaican', ''),
(241, 81, 'ar', 'اليابان', 'اليابان', 'ياباني', ''),
(242, 81, 'en', 'Japan', 'Japan', 'Japanese', ''),
(243, 81, 'es', 'Japan', 'Japan', 'Japanese', ''),
(244, 82, 'ar', 'الأردن', 'الهاشمية الأردنية المملكة ', 'أردني', ''),
(245, 82, 'en', 'Jordan', 'the Hashemite Kingdom of Jordan', 'Jordanian', ''),
(246, 82, 'es', 'Jordan', 'the Hashemite Kingdom of Jordan', 'Jordanian', ''),
(247, 83, 'ar', 'كازاخستان', 'جمهورية كازاخستان ', 'كازاخستاني', ''),
(248, 83, 'en', 'Kazakhstan', 'the Republic of Kazakhstan', 'Kazakhstani, Kazakh', ''),
(249, 83, 'es', 'Kazakhstan', 'the Republic of Kazakhstan', 'Kazakhstani, Kazakh', ''),
(250, 84, 'ar', 'كينيا', 'كينيا جمهورية ', 'كيني', ''),
(251, 84, 'en', 'Kenya', 'the Republic of Kenya', 'Kenyan', ''),
(252, 84, 'es', 'Kenya', 'the Republic of Kenya', 'Kenyan', ''),
(253, 85, 'ar', 'كيريباس', 'كيريباس  جمهورية ', 'كيريباتي', ''),
(254, 85, 'en', 'Kiribati', 'the Republic of Kiribati', 'I-Kiribati', ''),
(255, 85, 'es', 'Kiribati', 'the Republic of Kiribati', 'I-Kiribati', ''),
(256, 86, 'ar', 'الكويت', 'الكويت دولة ', 'كويتي', ''),
(257, 86, 'en', 'Kuwait', 'the State of Kuwait', 'Kuwaiti', ''),
(258, 86, 'es', 'Kuwait', 'the State of Kuwait', 'Kuwaiti', ''),
(259, 87, 'ar', 'قيرغيزستان', 'جمهورية القيرغيز ', 'قيرغيزستاني', ''),
(260, 87, 'en', 'Kyrgyzstan', 'the Kyrgyz Republic', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz', ''),
(261, 87, 'es', 'Kyrgyzstan', 'the Kyrgyz Republic', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz', ''),
(262, 88, 'ar', 'الشعبية الديمقراطية لاو جمهورية ', 'جمهورية لاو الديمقراطية الشعبية', 'جمهورية لاو الديمقراطية الشعبية', ''),
(263, 88, 'en', 'Lao Peoples Democratic Republic', 'the Lao Peoples Democratic Republic', 'جمهورية لاو الديمقراطية الشعبية', ''),
(264, 88, 'es', 'Lao Peoples Democratic Republic', 'the Lao Peoples Democratic Republic', 'جمهورية لاو الديمقراطية الشعبية', ''),
(265, 89, 'ar', 'لاتفيا', 'جمهورية لاتفيا ', 'لاتيفي', ''),
(266, 89, 'en', 'Latvia', 'the Republic of Latvia', 'Latvian', ''),
(267, 89, 'es', 'Latvia', 'the Republic of Latvia', 'Latvian', ''),
(268, 90, 'ar', 'لبنان', 'اللبنانية الجمهورية ', 'لبناني', ''),
(269, 90, 'en', 'Lebanon', 'the Lebanese Republic', 'Lebanese', ''),
(270, 90, 'es', 'Lebanon', 'the Lebanese Republic', 'Lebanese', ''),
(271, 91, 'ar', 'ليسوتو', 'ليسوتو مملكة ', 'ليوسيتي', ''),
(272, 91, 'en', 'Lesotho', 'the Kingdom of Lesotho', 'Basotho', ''),
(273, 91, 'es', 'Lesotho', 'the Kingdom of Lesotho', 'Basotho', ''),
(274, 92, 'ar', 'ليبريا', 'جمهورية ليبريا ', 'ليبيري', ''),
(275, 92, 'en', 'Liberia', 'the Republic of Liberia', 'Liberian', ''),
(276, 92, 'es', 'Liberia', 'the Republic of Liberia', 'Liberian', ''),
(277, 93, 'ar', 'ليبيا', 'ليبيا', 'ليبي', ''),
(278, 93, 'en', 'Libya', 'Libya', 'Libyan', ''),
(279, 93, 'es', 'Libya', 'Libya', 'Libyan', ''),
(280, 94, 'ar', 'لختنشتاين', 'إمارة لختنشتاين ', 'ليختنشتيني', ''),
(281, 94, 'en', 'Liechtenstein', 'the Principality of Liechtenstein', 'Liechtenstein', ''),
(282, 94, 'es', 'Liechtenstein', 'the Principality of Liechtenstein', 'Liechtenstein', ''),
(283, 95, 'ar', 'ليتوانيا', 'جمهورية ليتوانيا ', 'لتوانيي', ''),
(284, 95, 'en', 'Lithuania', 'the Republic of Lithuania', 'Lithuanian', ''),
(285, 95, 'es', 'Lithuania', 'the Republic of Lithuania', 'Lithuanian', ''),
(286, 96, 'ar', 'لكسمبرغ', 'الكبرى لكسمبرغ دوقية ', 'لوكسمبورغي', ''),
(287, 96, 'en', 'Luxembourg', 'the Grand Duchy of Luxembourg', 'Luxembourg, Luxembourgish', ''),
(288, 96, 'es', 'Luxembourg', 'the Grand Duchy of Luxembourg', 'Luxembourg, Luxembourgish', ''),
(289, 97, 'ar', 'مدغشقر', 'جمهورية مدغشقر ', 'مدغشقري', ''),
(290, 97, 'en', 'Madagascar', 'the Republic of Madagascar', 'Malagasy', ''),
(291, 97, 'es', 'Madagascar', 'the Republic of Madagascar', 'Malagasy', ''),
(292, 98, 'ar', 'ملاوي', 'جمهورية ملاوي ', 'مالاوي', ''),
(293, 98, 'en', 'Malawi', 'the Republic of Malawi', 'Malawian', ''),
(294, 98, 'es', 'Malawi', 'the Republic of Malawi', 'Malawian', ''),
(295, 99, 'ar', 'ماليزيا', 'ماليزيا', 'ماليزي', ''),
(296, 99, 'en', 'Malaysia', 'Malaysia', 'Malaysian', ''),
(297, 99, 'es', 'Malaysia', 'Malaysia', 'Malaysian', ''),
(298, 100, 'ar', 'ملديف', 'جمهورية ملديف ', 'مالديفي', ''),
(299, 100, 'en', 'Maldives', 'the Republic of Maldives', 'Maldivian', ''),
(300, 100, 'es', 'Maldives', 'the Republic of Maldives', 'Maldivian', ''),
(301, 101, 'ar', 'مالي', 'مالي جمهورية ', 'مالي', ''),
(302, 101, 'en', 'Mali', 'the Republic of Mali', 'Malian, Malinese', ''),
(303, 101, 'es', 'Mali', 'the Republic of Mali', 'Malian, Malinese', ''),
(304, 102, 'ar', 'مالطة', 'جمهورية مالطة ', 'مالطي', ''),
(305, 102, 'en', 'Malta', 'the Republic of Malta', 'Maltese', ''),
(306, 102, 'es', 'Malta', 'the Republic of Malta', 'Maltese', ''),
(307, 103, 'ar', 'جزر مارشال ', 'جمهورية جزر مارشال ', 'مارشالي', ''),
(308, 103, 'en', 'Marshall Islands', 'the Republic of the Marshall Islands', 'Marshallese', ''),
(309, 103, 'es', 'Marshall Islands', 'the Republic of the Marshall Islands', 'Marshallese', ''),
(310, 104, 'ar', 'موريتانيا', 'الجمهورية الإسلامية الموريتانية ', 'موريتانيي', ''),
(311, 104, 'en', 'Mauritania', 'the Islamic Republic of Mauritania', 'Mauritanian', ''),
(312, 104, 'es', 'Mauritania', 'the Islamic Republic of Mauritania', 'Mauritanian', ''),
(313, 105, 'ar', 'موريشيوس', 'موريشيوس جمهورية ', 'موريشيوسي', ''),
(314, 105, 'en', 'Mauritius', 'the Republic of Mauritius', 'Mauritian', ''),
(315, 105, 'es', 'Mauritius', 'the Republic of Mauritius', 'Mauritian', ''),
(316, 106, 'ar', 'المكسيك', 'المكسيكية المتحدة الولايات ', 'مكسيكي', ''),
(317, 106, 'en', 'Mexico', 'the United Mexican States', 'Mexican', ''),
(318, 106, 'es', 'Mexico', 'the United Mexican States', 'Mexican', ''),
(319, 107, 'ar', 'موناكو', 'إمارة موناكو ', 'مونيكي', ''),
(320, 107, 'en', 'Monaco', 'the Principality of Monaco', 'Monégasque, Monacan', ''),
(321, 107, 'es', 'Monaco', 'the Principality of Monaco', 'Monégasque, Monacan', ''),
(322, 108, 'ar', 'منغوليا', 'منغوليا', 'منغولي', ''),
(323, 108, 'en', 'Mongolia', 'Mongolia', 'Mongolian', ''),
(324, 108, 'es', 'Mongolia', 'Mongolia', 'Mongolian', ''),
(325, 109, 'ar', 'الأسود الجبل ', 'الأسود الجبل ', 'الجبل الأسود', ''),
(326, 109, 'en', 'Montenegro', 'Montenegro', 'Montenegrin', ''),
(327, 109, 'es', 'Montenegro', 'Montenegro', 'Montenegrin', ''),
(328, 110, 'ar', 'المغرب', 'المملكة المغربية ', 'مغربي', ''),
(329, 110, 'en', 'Morocco', 'the Kingdom of Morocco', 'Moroccan', ''),
(330, 110, 'es', 'Morocco', 'the Kingdom of Morocco', 'Moroccan', ''),
(331, 111, 'ar', 'موزامبيق', 'جمهورية موزامبيق ', 'موزمبيقي', ''),
(332, 111, 'en', 'Mozambique', 'the Republic of Mozambique', 'Mozambican', ''),
(333, 111, 'es', 'Mozambique', 'the Republic of Mozambique', 'Mozambican', ''),
(334, 112, 'ar', 'ميانمار', 'ميانمار اتحاد جمهورية ', 'ميانماري', ''),
(335, 112, 'en', 'Myanmar', 'the Republic of the Union of Myanmar', 'Burmese', ''),
(336, 112, 'es', 'Myanmar', 'the Republic of the Union of Myanmar', 'Burmese', ''),
(337, 113, 'ar', 'ناميبيا', 'جمهورية ناميبيا ', 'ناميبي', ''),
(338, 113, 'en', 'Namibia', 'the Republic of Namibia', 'Namibian', ''),
(339, 113, 'es', 'Namibia', 'the Republic of Namibia', 'Namibian', ''),
(340, 114, 'ar', 'ناورو', 'ناورو جمهورية ', 'نوري', ''),
(341, 114, 'en', 'Nauru', 'the Republic of Nauru', 'Nauruan', ''),
(342, 114, 'es', 'Nauru', 'the Republic of Nauru', 'Nauruan', ''),
(343, 115, 'ar', 'نيبال', 'الاتحادية الديمقراطية نيبال جمهورية ', 'نيبالي', ''),
(344, 115, 'en', 'Nepal', 'the Federal Democratic Republic of Nepal', 'Nepali, Nepalese', ''),
(345, 115, 'es', 'Nepal', 'the Federal Democratic Republic of Nepal', 'Nepali, Nepalese', ''),
(346, 116, 'ar', 'هولندا', 'هولندا مملكة ', 'هولندي', ''),
(347, 116, 'en', 'Netherlands', 'the Kingdom of the Netherlands', 'Dutch, Netherlandic', ''),
(348, 116, 'es', 'Netherlands', 'the Kingdom of the Netherlands', 'Dutch, Netherlandic', ''),
(349, 117, 'ar', 'نيوزيلندا', 'نيوزيلندا', 'نيوزيلندي', ''),
(350, 117, 'en', 'New Zealand', 'New Zealand', 'New Zealand, NZ', ''),
(351, 117, 'es', 'New Zealand', 'New Zealand', 'New Zealand, NZ', ''),
(352, 118, 'ar', 'نيكاراغوا', 'جمهورية  نيكاراغوا ', 'نيكاراجوي', ''),
(353, 118, 'en', 'Nicaragua', 'the Republic of Nicaragua', 'Nicaraguan', ''),
(354, 118, 'es', 'Nicaragua', 'the Republic of Nicaragua', 'Nicaraguan', ''),
(355, 119, 'ar', 'النيجر', 'جمهورية النيجر ', 'نيجيري', ''),
(356, 119, 'en', 'Niger', 'the Republic of the Niger', 'Nigerien', ''),
(357, 119, 'es', 'Niger', 'the Republic of the Niger', 'Nigerien', ''),
(358, 120, 'ar', 'نيجيريا', 'الاتحادية نيجيريا جمهورية ', 'نيجيري', ''),
(359, 120, 'en', 'Nigeria', 'the Federal Republic of Nigeria', 'Nigerian', ''),
(360, 120, 'es', 'Nigeria', 'the Federal Republic of Nigeria', 'Nigerian', ''),
(361, 121, 'ar', 'النرويج', 'النرويج مملكة ', 'نرويجي', ''),
(362, 121, 'en', 'Norway', 'the Kingdom of Norway', 'Norwegian', ''),
(363, 121, 'es', 'Norway', 'the Kingdom of Norway', 'Norwegian', ''),
(364, 122, 'ar', 'عمان', 'سلطنة عمان ', 'عماني', ''),
(365, 122, 'en', 'Oman', 'the Sultanate of Oman', 'Omani', ''),
(366, 122, 'es', 'Oman', 'the Sultanate of Oman', 'Omani', ''),
(367, 123, 'ar', 'باكستان', 'الإسلامية باكستان جمهورية ', 'باكستاني', ''),
(368, 123, 'en', 'Pakistan', 'the Islamic Republic of Pakistan', 'Pakistani', ''),
(369, 123, 'es', 'Pakistan', 'the Islamic Republic of Pakistan', 'Pakistani', ''),
(370, 124, 'ar', 'بالاو', 'جمهورية بالاو ', 'بالاوي', ''),
(371, 124, 'en', 'Palau', 'the Republic of Palau', 'Palauan', ''),
(372, 124, 'es', 'Palau', 'the Republic of Palau', 'Palauan', ''),
(373, 125, 'ar', 'بنما', 'بنما جمهورية ', 'بنمي', ''),
(374, 125, 'en', 'Panama', 'the Republic of Panama', 'Panamanian', ''),
(375, 125, 'es', 'Panama', 'the Republic of Panama', 'Panamanian', ''),
(376, 126, 'ar', 'الجديدة غينيا بابوا ', 'المستقلة الجديدة غينيا بابوا دولة ', 'بابوي', ''),
(377, 126, 'en', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'Papua New Guinean, Papuan', ''),
(378, 126, 'es', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'Papua New Guinean, Papuan', ''),
(379, 127, 'ar', 'باراغواي', 'باراغواي جمهورية ', 'بارغاوي', ''),
(380, 127, 'en', 'Paraguay', 'the Republic of Paraguay', 'Paraguayan', ''),
(381, 127, 'es', 'Paraguay', 'the Republic of Paraguay', 'Paraguayan', ''),
(382, 128, 'ar', 'بيرو', 'بيرو جمهورية ', 'بيري', ''),
(383, 128, 'en', 'Peru', 'the Republic of Peru', 'Peruvian', ''),
(384, 128, 'es', 'Peru', 'the Republic of Peru', 'Peruvian', ''),
(385, 129, 'ar', 'الفلبين', 'الفلبين جمهورية ', 'فلبيني', ''),
(386, 129, 'en', 'Philippines', 'the Republic of the Philippines', 'Philippine, Filipino', ''),
(387, 129, 'es', 'Philippines', 'the Republic of the Philippines', 'Philippine, Filipino', ''),
(388, 130, 'ar', 'بولندا', 'جمهورية بولندا ', 'بوليني', ''),
(389, 130, 'en', 'Poland', 'the Republic of Poland', 'Polish', ''),
(390, 130, 'es', 'Poland', 'the Republic of Poland', 'Polish', ''),
(391, 131, 'ar', 'البرتغال', 'البرتغال جمهورية ', 'برتغالي', ''),
(392, 131, 'en', 'Portugal', 'the Portuguese Republic', 'Portuguese', ''),
(393, 131, 'es', 'Portugal', 'the Portuguese Republic', 'Portuguese', ''),
(394, 132, 'ar', 'قطر', 'قطر دولة ', 'قطري', ''),
(395, 132, 'en', 'Qatar', 'the State of Qatar', 'Qatari', ''),
(396, 132, 'es', 'Qatar', 'the State of Qatar', 'Qatari', ''),
(397, 133, 'ar', 'رومانيا', 'رومانيا', 'روماني', ''),
(398, 133, 'en', 'Romania', 'Romania', 'Romanian', ''),
(399, 133, 'es', 'Romania', 'Romania', 'Romanian', ''),
(400, 134, 'ar', 'روسيا', 'الاتحاد الروسي ', 'روسى', ''),
(401, 134, 'en', 'Russian Federation', 'the Russian Federation', 'Russian', ''),
(402, 134, 'es', 'Russian Federation', 'the Russian Federation', 'Russian', ''),
(403, 135, 'ar', 'رواندا', 'رواندا  جمهورية ', 'رواندا', ''),
(404, 135, 'en', 'Rwanda', 'the Republic of Rwanda', 'Rwandan', ''),
(405, 135, 'es', 'Rwanda', 'the Republic of Rwanda', 'Rwandan', ''),
(406, 136, 'ar', 'ونيفيس كيتس سانت ', 'ونيفيس كيتس سانت ', 'سانت كيتس ونيفس', ''),
(407, 136, 'en', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 'Kittitian or Nevisian', ''),
(408, 136, 'es', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 'Kittitian or Nevisian', ''),
(409, 137, 'ar', 'لوسيا سانت ', 'لوسيا سانت ', 'سانت لوسيا', ''),
(410, 137, 'en', 'Saint Lucia', 'Saint Lucia', 'Saint Lucian', ''),
(411, 137, 'es', 'Saint Lucia', 'Saint Lucia', 'Saint Lucian', ''),
(412, 138, 'ar', 'سانت فنسنت وجزر غرينادين ', 'سانت فنسنت وجزر غرينادين ', 'سانت فنسنت وجزر غرينادين', ''),
(413, 138, 'en', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian', ''),
(414, 138, 'es', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian', ''),
(415, 139, 'ar', 'ساموا', 'المستقلة ساموا دولة ', 'ساموي', ''),
(416, 139, 'en', 'Samoa', 'the Independent State of Samoa', 'Samoan', ''),
(417, 139, 'es', 'Samoa', 'the Independent State of Samoa', 'Samoan', ''),
(418, 140, 'ar', 'مارينو سان ', 'مارينو سان جمهورية ', 'ماريني', ''),
(419, 140, 'en', 'San Marino', 'the Republic of San Marino', 'Sammarinese', ''),
(420, 140, 'es', 'San Marino', 'the Republic of San Marino', 'Sammarinese', ''),
(421, 141, 'ar', 'وبرنسيبي تومي سان ', 'الديمقراطية وبرنسيبي تومي سان جمهورية ', 'ساو تومي وبرينسيبي', ''),
(422, 141, 'en', 'Sao Tome and Principe', 'the Democratic Republic of Sao Tome and Principe', 'São Toméan', ''),
(423, 141, 'es', 'Sao Tome and Principe', 'the Democratic Republic of Sao Tome and Principe', 'São Toméan', ''),
(424, 142, 'ar', 'المملكة العربية السعودية', 'المملكة العربية السعودية', 'سعودي', 'ريال'),
(425, 142, 'en', 'Saudi Arabia', 'the Kingdom of Saudi Arabia', 'Saudi, Saudi Arabian', 'SAR'),
(426, 142, 'es', 'Saudi Arabia', 'the Kingdom of Saudi Arabia', 'Saudi, Saudi Arabian', 'SAR'),
(427, 143, 'ar', 'السنغال', 'السنغال جمهورية ', 'سنغالي', ''),
(428, 143, 'en', 'Senegal', 'the Republic of Senegal', 'Senegalese', ''),
(429, 143, 'es', 'Senegal', 'the Republic of Senegal', 'Senegalese', ''),
(430, 144, 'ar', 'صربيا', 'جمهورية صربيا ', 'صربي', ''),
(431, 144, 'en', 'Serbia', 'the Republic of Serbia', 'Serbian', ''),
(432, 144, 'es', 'Serbia', 'the Republic of Serbia', 'Serbian', ''),
(433, 145, 'ar', 'سيشيل', 'جمهورية سيشيل ', 'سيشيلي', ''),
(434, 145, 'en', 'Seychelles', 'the Republic of Seychelles', 'Seychellois', ''),
(435, 145, 'es', 'Seychelles', 'the Republic of Seychelles', 'Seychellois', ''),
(436, 146, 'ar', 'سيراليون', 'جمهورية سيراليون ', 'سيراليوني', ''),
(437, 146, 'en', 'Sierra Leone', 'the Republic of Sierra Leone', 'Sierra Leonean', ''),
(438, 146, 'es', 'Sierra Leone', 'the Republic of Sierra Leone', 'Sierra Leonean', ''),
(439, 147, 'ar', 'سنغافورة', 'جمهورية سنغافورة ', 'سنغافوري', ''),
(440, 147, 'en', 'Singapore', 'the Republic of Singapore', 'Singaporean', ''),
(441, 147, 'es', 'Singapore', 'the Republic of Singapore', 'Singaporean', ''),
(442, 148, 'ar', 'سلوفاكيا', 'السلوفاكية الجمهورية ', 'سولفاكي', ''),
(443, 148, 'en', 'Slovakia', 'the Slovak Republic', 'Slovak', ''),
(444, 148, 'es', 'Slovakia', 'the Slovak Republic', 'Slovak', ''),
(445, 149, 'ar', 'سلوفينيا', 'جمهورية سلوفينيا ', 'سولفيني', ''),
(446, 149, 'en', 'Slovenia', 'the Republic of Slovenia', 'Slovenian, Slovene', ''),
(447, 149, 'es', 'Slovenia', 'the Republic of Slovenia', 'Slovenian, Slovene', ''),
(448, 150, 'ar', 'جزر سليمان ', 'جزر سليمان ', 'جزر سليمان', ''),
(449, 150, 'en', 'Solomon Islands', 'Solomon Islands', 'Solomon Island', ''),
(450, 150, 'es', 'Solomon Islands', 'Solomon Islands', 'Solomon Island', ''),
(451, 151, 'ar', 'الصومال', 'جمهورية الصومال الإتحادية ', 'صومالي', ''),
(452, 151, 'en', 'Somalia', 'the Federal Republic of Somalia', 'Somali, Somalian', ''),
(453, 151, 'es', 'Somalia', 'the Federal Republic of Somalia', 'Somali, Somalian', ''),
(454, 152, 'ar', 'أفريقيا جنوب ', 'أفريقيا جنوب جمهورية ', 'أفريقي', ''),
(455, 152, 'en', 'South Africa', 'the Republic of South Africa', 'South African', ''),
(456, 152, 'es', 'South Africa', 'the Republic of South Africa', 'South African', ''),
(457, 153, 'ar', 'إسبانيا', 'مملكة إسبانيا', 'إسباني', ''),
(458, 153, 'en', 'Spain', 'the Kingdom of Spain', 'Spanish', ''),
(459, 153, 'es', 'Spain', 'the Kingdom of Spain', 'Spanish', ''),
(460, 154, 'ar', 'سري لانكا ', 'جمهورية سري لانكا الاشتراكية الديمقراطية ', 'سريلانكي', ''),
(461, 154, 'en', 'Sri Lanka', 'the Democratic Socialist Republic of Sri Lanka', 'Sri Lankan', ''),
(462, 154, 'es', 'Sri Lanka', 'the Democratic Socialist Republic of Sri Lanka', 'Sri Lankan', ''),
(463, 155, 'ar', 'السودان', 'السودان جمهورية ', 'سوداني', ''),
(464, 155, 'en', 'Sudan', 'the Republic of the Sudan', 'Sudanese', ''),
(465, 155, 'es', 'Sudan', 'the Republic of the Sudan', 'Sudanese', ''),
(466, 156, 'ar', 'سورينام', 'جمهورية سورينام ', 'سورينامي', ''),
(467, 156, 'en', 'Suriname', 'the Republic of Suriname', 'Surinamese', ''),
(468, 156, 'es', 'Suriname', 'the Republic of Suriname', 'Surinamese', ''),
(469, 157, 'ar', 'سوازيلند', 'سوازيلند مملكة ', 'سوازيلندي', ''),
(470, 157, 'en', 'Swaziland', 'the Kingdom of Swaziland', 'Swazi', ''),
(471, 157, 'es', 'Swaziland', 'the Kingdom of Swaziland', 'Swazi', ''),
(472, 158, 'ar', 'السويد', 'مملكة السويد ', 'سويدي', ''),
(473, 158, 'en', 'Sweden', 'the Kingdom of Sweden', 'Swedish', ''),
(474, 158, 'es', 'Sweden', 'the Kingdom of Sweden', 'Swedish', ''),
(475, 159, 'ar', 'سويسرا', 'الاتحاد السويسري ', 'سويسري', ''),
(476, 159, 'en', 'Switzerland', 'the Swiss Confederation', 'Swiss', ''),
(477, 159, 'es', 'Switzerland', 'the Swiss Confederation', 'Swiss', ''),
(478, 160, 'ar', 'الجمهورية العربية السورية ', 'الجمهورية العربية السورية ', 'سورى', ''),
(479, 160, 'en', 'Syrian Arab Republic', 'the Syrian Arab Republic', 'Syrian', ''),
(480, 160, 'es', 'Syrian Arab Republic', 'the Syrian Arab Republic', 'Syrian', ''),
(481, 161, 'ar', 'طاجيكستان', 'جمهورية طاجيكستان ', 'طاجيكستاني', ''),
(482, 161, 'en', 'Tajikistan', 'the Republic of Tajikistan', 'Tajikistani', ''),
(483, 161, 'es', 'Tajikistan', 'the Republic of Tajikistan', 'Tajikistani', ''),
(484, 162, 'ar', 'تايلند', 'تايلند مملكة ', 'تايلندي', ''),
(485, 162, 'en', 'Thailand', 'the Kingdom of Thailand', 'Thai', ''),
(486, 162, 'es', 'Thailand', 'the Kingdom of Thailand', 'Thai', ''),
(487, 163, 'ar', 'ليشتى تيمور- ', 'الديمقراطية ليشتى تيمور- جمهورية ', 'تيموري', ''),
(488, 163, 'en', 'Timor-Leste', 'the Democratic Republic of Timor-Leste', 'Timorese', ''),
(489, 163, 'es', 'Timor-Leste', 'the Democratic Republic of Timor-Leste', 'Timorese', ''),
(490, 164, 'ar', 'توغو', 'توغو جمهورية ', 'توغي', ''),
(491, 164, 'en', 'Togo', 'the Togolese Republic', 'Togolese', ''),
(492, 164, 'es', 'Togo', 'the Togolese Republic', 'Togolese', ''),
(493, 165, 'ar', 'تونغا', 'تونغا مملكة ', 'تونغي', ''),
(494, 165, 'en', 'Tonga', 'the Kingdom of Tonga', 'Tongan', ''),
(495, 165, 'es', 'Tonga', 'the Kingdom of Tonga', 'Tongan', ''),
(496, 166, 'ar', 'وتوباغو ترينيداد ', 'وتوباغو ترينيداد جمهورية ', 'ترينيداد وتوباغو', ''),
(497, 166, 'en', 'Trinidad and Tobago', 'the Republic of Trinidad and Tobago', 'Trinidadian or Tobagonian', ''),
(498, 166, 'es', 'Trinidad and Tobago', 'the Republic of Trinidad and Tobago', 'Trinidadian or Tobagonian', ''),
(499, 167, 'ar', 'تونس', 'الجمهورية التونسية ', 'تونسي', ''),
(500, 167, 'en', 'Tunisia', 'the Republic of Tunisia', 'Tunisian', ''),
(501, 167, 'es', 'Tunisia', 'the Republic of Tunisia', 'Tunisian', ''),
(502, 168, 'ar', 'تركيا', 'الجمهورية التركية ', 'تركي', ''),
(503, 168, 'en', 'Turkey', 'the Republic of Turkey', 'Turkish', ''),
(504, 168, 'es', 'Turkey', 'the Republic of Turkey', 'Turkish', ''),
(505, 169, 'ar', 'تركمانستان', 'تركمانستان', 'تركمانستاني', ''),
(506, 169, 'en', 'Turkmenistan', 'Turkmenistan', 'Turkmen', ''),
(507, 169, 'es', 'Turkmenistan', 'Turkmenistan', 'Turkmen', ''),
(508, 170, 'ar', 'توفالو', 'توفالو', 'توفالي', ''),
(509, 170, 'en', 'Tuvalu', 'Tuvalu', 'Tuvaluan', ''),
(510, 170, 'es', 'Tuvalu', 'Tuvalu', 'Tuvaluan', ''),
(511, 171, 'ar', 'أوغندا', 'جمهورية أوغندا ', 'أوغندي', ''),
(512, 171, 'en', 'Uganda', 'the Republic of Uganda', 'Ugandan', ''),
(513, 171, 'es', 'Uganda', 'the Republic of Uganda', 'Ugandan', ''),
(514, 172, 'ar', 'أوكرانيا', 'أوكرانيا', 'أوكراني', ''),
(515, 172, 'en', 'Ukraine', 'Ukraine', 'Ukrainian', ''),
(516, 172, 'es', 'Ukraine', 'Ukraine', 'Ukrainian', ''),
(517, 173, 'ar', 'الإمارات العربية المتحدة', 'الإمارات العربية المتحدة', 'إماراتي', ''),
(518, 173, 'en', 'United Arab Emirates', 'the United Arab Emirates', 'Emirati, Emirian, Emiri', ''),
(519, 173, 'es', 'United Arab Emirates', 'the United Arab Emirates', 'Emirati, Emirian, Emiri', ''),
(520, 174, 'ar', 'أوروغواي', 'جمهورية أوروغواي الشرقية', 'أورغواي', ''),
(521, 174, 'en', 'Uruguay', 'the Eastern Republic of Uruguay', 'Uruguayan', ''),
(522, 174, 'es', 'Uruguay', 'the Eastern Republic of Uruguay', 'Uruguayan', ''),
(523, 175, 'ar', 'أوزبكستان', 'جمهورية أوزبكستان ', 'أوزباكستاني', ''),
(524, 175, 'en', 'Uzbekistan', 'the Republic of Uzbekistan', 'Uzbekistani, Uzbek', ''),
(525, 175, 'es', 'Uzbekistan', 'the Republic of Uzbekistan', 'Uzbekistani, Uzbek', ''),
(526, 176, 'ar', 'فانواتو', 'جمهورية فانواتو ', 'فانواتي', ''),
(527, 176, 'en', 'Vanuatu', 'the Republic of Vanuatu', 'Ni-Vanuatu, Vanuatuan', ''),
(528, 176, 'es', 'Vanuatu', 'the Republic of Vanuatu', 'Ni-Vanuatu, Vanuatuan', ''),
(529, 177, 'ar', 'فييت نام ', 'جمهورية فييت نام الاشتراكية ', 'فيتنامى ', ''),
(530, 177, 'en', 'Viet Nam', 'the Socialist Republic of Viet Nam', ' Vietnamese', ''),
(531, 177, 'es', 'Viet Nam', 'the Socialist Republic of Viet Nam', ' Vietnamese', ''),
(532, 178, 'ar', 'اليمن', 'الجمهورية اليمنية ', 'يمني', ''),
(533, 178, 'en', 'Yemen', 'the Republic of Yemen', 'Yemeni', ''),
(534, 178, 'es', 'Yemen', 'the Republic of Yemen', 'Yemeni', ''),
(535, 179, 'ar', 'زامبيا', 'جمهورية زامبيا ', 'زامبياني', ''),
(536, 179, 'en', 'Zambia', 'the Republic of Zambia', 'Zambian', ''),
(537, 179, 'es', 'Zambia', 'the Republic of Zambia', 'Zambian', ''),
(538, 180, 'ar', 'زمبابوي', 'جمهورية زمبابوي ', 'زمبابوي', ''),
(539, 180, 'en', 'Zimbabwe', 'the Republic of Zimbabwe', 'Zimbabwean', ''),
(540, 180, 'es', 'Zimbabwe', 'the Republic of Zimbabwe', 'Zimbabwean', ''),
(541, 181, 'ar', 'كوك جزر ', 'كوك جزر ', 'جزر كوك', ''),
(542, 181, 'en', 'Cook Islands', 'the Cook Islands', 'Cook Island', ''),
(543, 181, 'es', 'Cook Islands', 'the Cook Islands', 'Cook Island', ''),
(544, 182, 'ar', 'بوليفيا (دولة - المتعددة القوميات)', 'دولة بوليفيا المتعددة القوميات ', 'بوليفي', ''),
(545, 182, 'en', 'Bolivia (Plurinational State of)', 'the Plurinational State of Bolivia', 'Bolivian', ''),
(546, 182, 'es', 'Bolivia (Plurinational State of)', 'the Plurinational State of Bolivia', 'Bolivian', ''),
(547, 183, 'ar', 'جمهورية الكونغو الديموقراطية', 'جمهورية الكونغو الديموقراطية', 'كونغولى', ''),
(548, 183, 'en', 'Democratic Republic of the Congo', 'the Democratic Republic of the Congo', 'Congolese', ''),
(549, 183, 'es', 'Democratic Republic of the Congo', 'the Democratic Republic of the Congo', 'Congolese', ''),
(550, 184, 'ar', 'عضو منظمة - الأوروبي الإتحاد ', 'عضو منظمة - الأوروبي الإتحاد ', 'الأوروبي ', ''),
(551, 184, 'en', 'European Union', 'European Union', 'European', ''),
(552, 184, 'es', 'European Union', 'European Union', 'European', ''),
(553, 185, 'ar', 'ميكرونيزيا', 'الموحدة ميكرونيزيا ولايات ', 'ميكرونيزي', ''),
(554, 185, 'en', 'Micronesia (Federated States of)', 'the Federated States of Micronesia', 'Micronesian', ''),
(555, 185, 'es', 'Micronesia (Federated States of)', 'the Federated States of Micronesia', 'Micronesian', ''),
(556, 186, 'ar', 'المملكة المتحدة ', 'المملكة المتحدة لبريطانيا العظمى وآيرلندا الشمالية ', 'بريطاني', ''),
(557, 186, 'en', 'United Kingdom', 'the United Kingdom of Great Britain and Northern Ireland', 'British', ''),
(558, 186, 'es', 'United Kingdom', 'the United Kingdom of Great Britain and Northern Ireland', 'British', ''),
(559, 187, 'ar', 'جمهورية إيران الإسلامية', 'جمهورية إيران الإسلامية', 'إيرانى', ''),
(560, 187, 'en', 'Iran (Islamic Republic of)', 'the Islamic Republic of Iran', 'Iranian', ''),
(561, 187, 'es', 'Iran (Islamic Republic of)', 'the Islamic Republic of Iran', 'Iranian', ''),
(562, 188, 'ar', 'جمهورية كوريا الديمقراطية االشعبية', 'جمهورية كوريا الديمقراطية االشعبية', 'كورى شمالى ', ''),
(563, 188, 'en', 'Democratic Peoples Republic of Korea', 'the Democratic Peoples Republic of Korea', 'North Korean', ''),
(564, 188, 'es', 'Democratic Peoples Republic of Korea', 'the Democratic Peoples Republic of Korea', 'North Korean', ''),
(565, 189, 'ar', 'جمهورية كوريا ', 'جمهورية كوريا ', 'كورى جنوبى ', ''),
(566, 189, 'en', 'Republic of Korea', 'the Republic of Korea', 'South Korean', ''),
(567, 189, 'es', 'Republic of Korea', 'the Republic of Korea', 'South Korean', ''),
(568, 190, 'ar', 'جمهورية مولدوفا ', 'جمهورية مولدوفا ', '', ''),
(569, 190, 'en', 'Republic of Moldova', 'the Republic of Moldova', '', ''),
(570, 190, 'es', 'Republic of Moldova', 'the Republic of Moldova', '', ''),
(571, 191, 'ar', 'جمهورية مقدونيا اليوغوسلافية السابقة ', 'جمهورية مقدونيا اليوغوسلافية السابقة ', '', ''),
(572, 191, 'en', 'The former Yugoslav Republic of Macedonia', 'The former Yugoslav Republic of Macedonia', '', ''),
(573, 191, 'es', 'The former Yugoslav Republic of Macedonia', 'The former Yugoslav Republic of Macedonia', '', ''),
(574, 192, 'ar', 'نيوى', 'نيوى', 'ني', ''),
(575, 192, 'en', 'Niue', 'Niue', 'Niuean', ''),
(576, 192, 'es', 'Niue', 'Niue', 'Niuean', ''),
(577, 193, 'ar', 'جمهورية تنزانيا المتحدة ', 'جمهورية تنزانيا المتحدة ', '', ''),
(578, 193, 'en', 'United Republic of Tanzania', 'the United Republic of Tanzania', '', ''),
(579, 193, 'es', 'United Republic of Tanzania', 'the United Republic of Tanzania', '', ''),
(580, 194, 'ar', 'البوليفارية - جمهورية - فنزويلا ', 'البوليفارية فنزويلا جمهورية ', '', ''),
(581, 194, 'en', 'Venezuela (Bolivarian Republic of)', 'the Bolivarian Republic of Venezuela', 'Venezuelan', ''),
(582, 194, 'es', 'Venezuela (Bolivarian Republic of)', 'the Bolivarian Republic of Venezuela', 'Venezuelan', ''),
(583, 195, 'ar', 'أنغويلا', '', 'أنغويلي', ''),
(584, 195, 'en', 'Anguilla', 'Anguilla', 'Anguillan', ''),
(585, 195, 'es', 'Anguilla', 'Anguilla', 'Anguillan', ''),
(586, 196, 'ar', 'أنتاركتيكا', '', 'أنتاركتيكي', ''),
(587, 196, 'en', 'Antarctica', 'Antarctica', 'Antarctic', ''),
(588, 196, 'es', 'Antarctica', 'Antarctica', 'Antarctic', ''),
(589, 197, 'ar', 'ساموا-الأمريكي', '', 'أمريكي سامواني', ''),
(590, 197, 'en', 'American Samoa', 'The United States Territory of American Samoa', 'American Samoan', ''),
(591, 197, 'es', 'American Samoa', 'The United States Territory of American Samoa', 'American Samoan', ''),
(592, 198, 'ar', 'أروبه', '', 'أوروبهيني', ''),
(593, 198, 'en', 'Aruba', 'Aruba of the Kingdom of the Netherlands', 'Aruban', ''),
(594, 198, 'es', 'Aruba', 'Aruba of the Kingdom of the Netherlands', 'Aruban', ''),
(595, 199, 'ar', '', '', 'آلاندي', ''),
(596, 199, 'en', 'Åland Islands', 'Åland Islands', 'Åland Island', ''),
(597, 199, 'es', 'Åland Islands', 'Åland Islands', 'Åland Island', ''),
(598, 200, 'ar', '', '', 'سان بارتيلمي', ''),
(599, 200, 'en', 'Saint Barthélemy', 'Territorial collectivity of Saint Barthélemy', 'Barthélemois', ''),
(600, 200, 'es', 'Saint Barthélemy', 'Territorial collectivity of Saint Barthélemy', 'Barthélemois', ''),
(601, 201, 'ar', 'جزر برمودا', '', 'برمودي', ''),
(602, 201, 'en', 'Bermuda', 'the Bermudas', 'Bermudian, Bermudan', ''),
(603, 201, 'es', 'Bermuda', 'the Bermudas', 'Bermudian, Bermudan', ''),
(604, 202, 'ar', '', '', '', ''),
(605, 202, 'en', 'Bonaire, Saint Eustatius And Saba', 'Bonaire, Saint Eustatius and Saba', '', ''),
(606, 202, 'es', 'Bonaire, Saint Eustatius And Saba', 'Bonaire, Saint Eustatius and Saba', '', ''),
(607, 203, 'ar', '', '', 'بوفيهي', ''),
(608, 203, 'en', 'Bouvet Island', 'Bouvet Island', 'Bouvet Island', ''),
(609, 203, 'es', 'Bouvet Island', 'Bouvet Island', 'Bouvet Island', ''),
(610, 204, 'ar', '', '', 'جزر كوكوس', ''),
(611, 204, 'en', 'Cocos (Keeling) Islands', 'Territory of Cocos (Keeling) Islands', 'Cocos Island', ''),
(612, 204, 'es', 'Cocos (Keeling) Islands', 'Territory of Cocos (Keeling) Islands', 'Cocos Island', ''),
(613, 205, 'ar', '', '', 'كوراساوي', ''),
(614, 205, 'en', 'Curaçao', 'Curaçao', 'Curaçaoan', ''),
(615, 205, 'es', 'Curaçao', 'Curaçao', 'Curaçaoan', ''),
(616, 206, 'ar', '', '', 'جزيرة عيد الميلاد', ''),
(617, 206, 'en', 'Christmas Island', 'Territory of Christmas Island', 'Christmas Island', ''),
(618, 206, 'es', 'Christmas Island', 'Territory of Christmas Island', 'Christmas Island', ''),
(619, 207, 'ar', 'الصحراء الغربية', '', 'صحراوي', ''),
(620, 207, 'en', 'Western Sahara', 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian', ''),
(621, 207, 'es', 'Western Sahara', 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian', ''),
(622, 208, 'ar', '', '', 'فوكلاندي', ''),
(623, 208, 'en', 'Falkland Islands (Malvinas)', 'Falkland Islands', 'Falkland Island', ''),
(624, 208, 'es', 'Falkland Islands (Malvinas)', 'Falkland Islands', 'Falkland Island', ''),
(625, 209, 'ar', 'جزر فيرويه ', 'جزر فيرويه ', '', ''),
(626, 209, 'en', 'Faroe Islands (Associate Member)', 'Faroe Islands', '', ''),
(627, 209, 'es', 'Faroe Islands (Associate Member)', 'Faroe Islands', '', ''),
(628, 210, 'ar', 'غويانا الفرنسية', '', 'غويانا الفرنسية', ''),
(629, 210, 'en', 'French Guiana', 'French Guiana', 'French Guianese', ''),
(630, 210, 'es', 'French Guiana', 'French Guiana', 'French Guianese', ''),
(631, 211, 'ar', '', '', 'غيرنزي', ''),
(632, 211, 'en', 'Guernsey', 'Bailiwick of Guernsey', 'Channel Island', ''),
(633, 211, 'es', 'Guernsey', 'Bailiwick of Guernsey', 'Channel Island', ''),
(634, 212, 'ar', 'جبل طارق', '', 'جبل طارق', ''),
(635, 212, 'en', 'Gibraltar', 'Gibraltar', 'Gibraltar', ''),
(636, 212, 'es', 'Gibraltar', 'Gibraltar', 'Gibraltar', ''),
(637, 213, 'ar', 'جرينلاند', '', 'جرينلاندي', ''),
(638, 213, 'en', 'Greenland', 'Greenland', 'Greenlandic', ''),
(639, 213, 'es', 'Greenland', 'Greenland', 'Greenlandic', ''),
(640, 214, 'ar', 'جزر جوادلوب', '', 'جزر جوادلوب', ''),
(641, 214, 'en', 'Guadeloupe', 'Department of Guadeloupe', 'Guadeloupe', ''),
(642, 214, 'es', 'Guadeloupe', 'Department of Guadeloupe', 'Guadeloupe', ''),
(643, 215, 'ar', '', '', '', ''),
(644, 215, 'en', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands', ''),
(645, 215, 'es', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands', ''),
(646, 216, 'ar', 'جوام', '', 'جوامي', ''),
(647, 216, 'en', 'Guam', 'Territory of Guam', 'Guamanian, Guambat', ''),
(648, 216, 'es', 'Guam', 'Territory of Guam', 'Guamanian, Guambat', ''),
(649, 217, 'ar', 'هونغ كونغ', '', 'هونغ كونغي', ''),
(650, 217, 'en', 'Hong Kong', 'Hong Kong Special Administrative Region of the Peoples Republic', 'Hong Kong, Hong Kongese', ''),
(651, 217, 'es', 'Hong Kong', 'Hong Kong Special Administrative Region of the Peoples Republic', 'Hong Kong, Hong Kongese', ''),
(652, 218, 'ar', '', '', '', ''),
(653, 218, 'en', 'Heard Island And McDonald Islands', 'Heard and McDonald Islands', 'Heard Island or McDonald Islands', ''),
(654, 218, 'es', 'Heard Island And McDonald Islands', 'Heard and McDonald Islands', 'Heard Island or McDonald Islands', ''),
(655, 219, 'ar', '', '', 'ماني', ''),
(656, 219, 'en', 'Isle of Man', 'The Isle of Man', 'Manx', ''),
(657, 219, 'es', 'Isle of Man', 'The Isle of Man', 'Manx', ''),
(658, 220, 'ar', '', '', 'إقليم المحيط الهندي البريطاني', ''),
(659, 220, 'en', 'British Indian Ocean Territory', 'The British Indian Ocean Territory', 'BIOT', ''),
(660, 220, 'es', 'British Indian Ocean Territory', 'The British Indian Ocean Territory', 'BIOT', ''),
(661, 221, 'ar', '', '', 'جيرزي', ''),
(662, 221, 'en', 'Jersey', 'Bailiwick of Jersey', 'Channel Island', ''),
(663, 221, 'es', 'Jersey', 'Bailiwick of Jersey', 'Channel Island', ''),
(664, 222, 'ar', '', '', 'كايماني', ''),
(665, 222, 'en', 'Cayman Islands', 'The Cayman Islands', 'Caymanian', ''),
(666, 222, 'es', 'Cayman Islands', 'The Cayman Islands', 'Caymanian', ''),
(667, 223, 'ar', '', '', '', ''),
(668, 223, 'en', 'Saint Martin', 'Saint Martin', '', ''),
(669, 223, 'es', 'Saint Martin', 'Saint Martin', '', ''),
(670, 224, 'ar', 'ماكاو', '', '', ''),
(671, 224, 'en', 'Macao', 'Macau Special Administrative Region', 'Macanese, Chinese', ''),
(672, 224, 'es', 'Macao', 'Macau Special Administrative Region', 'Macanese, Chinese', ''),
(673, 225, 'ar', 'جزر ماريانا الشمالية', '', 'ماريني', ''),
(674, 225, 'en', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'Northern Marianan', ''),
(675, 225, 'es', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'Northern Marianan', ''),
(676, 226, 'ar', 'مارتينيك', '', 'مارتينيكي', ''),
(677, 226, 'en', 'Martinique', 'Department of Martinique', 'Martiniquais, Martinican', ''),
(678, 226, 'es', 'Martinique', 'Department of Martinique', 'Martiniquais, Martinican', ''),
(679, 227, 'ar', 'مونتسيرات', '', 'مونتسيراتي', ''),
(680, 227, 'en', 'Montserrat', 'Montserrat', 'Montserratian', ''),
(681, 227, 'es', 'Montserrat', 'Montserrat', 'Montserratian', ''),
(682, 228, 'ar', 'كاليدونيا الجديدة', '', 'كاليدوني', ''),
(683, 228, 'en', 'New Caledonia', 'Territory of New Caledonia and Dependencies', 'New Caledonian', ''),
(684, 228, 'es', 'New Caledonia', 'Territory of New Caledonia and Dependencies', 'New Caledonian', ''),
(685, 229, 'ar', '', '', 'نورفوليكي', ''),
(686, 229, 'en', 'Norfolk Island', 'Norfolk Islands', 'Norfolk Island', ''),
(687, 229, 'es', 'Norfolk Island', 'Norfolk Islands', 'Norfolk Island', ''),
(688, 230, 'ar', 'بولينيزيا الفرنسية', '', 'بولينيزيي', ''),
(689, 230, 'en', 'French Polynesia', 'Territory of French Polynesia', 'French Polynesian', ''),
(690, 230, 'es', 'French Polynesia', 'Territory of French Polynesia', 'French Polynesian', ''),
(691, 231, 'ar', 'سان بيير وميكلوني', '', 'سان بيير وميكلوني', ''),
(692, 231, 'en', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais', ''),
(693, 231, 'es', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais', ''),
(694, 232, 'ar', '', '', '', ''),
(695, 232, 'en', 'Pitcairn Islands', 'Pitcairn Group of Islands', '', ''),
(696, 232, 'es', 'Pitcairn Islands', 'Pitcairn Group of Islands', '', ''),
(697, 233, 'ar', 'بورتو ريكو', '', 'بورتي', '');
INSERT INTO `countries_trans` (`id`, `country_id`, `lang`, `name`, `name_official`, `nationality`, `currency`) VALUES
(698, 233, 'en', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'Puerto Rican', ''),
(699, 233, 'es', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'Puerto Rican', ''),
(700, 234, 'ar', '', '', '', ''),
(701, 234, 'en', 'Palestinian Territory, Occupied', 'the Occupied Palestinian Territory', '', ''),
(702, 234, 'es', 'Palestinian Territory, Occupied', 'the Occupied Palestinian Territory', '', ''),
(703, 235, 'ar', '', '', '', ''),
(704, 235, 'en', 'Réunion', 'Department of Reunion', 'Réunionese, Réunionnais', ''),
(705, 235, 'es', 'Réunion', 'Department of Reunion', 'Réunionese, Réunionnais', ''),
(706, 236, 'ar', '', '', '', ''),
(707, 236, 'en', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian', ''),
(708, 236, 'es', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian', ''),
(709, 237, 'ar', '', '', 'سفالبارد ويان ماين', ''),
(710, 237, 'en', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard', ''),
(711, 237, 'es', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard', ''),
(712, 238, 'ar', '', '', '', ''),
(713, 238, 'en', 'Sint Maarten', 'Sint Maarten', '', ''),
(714, 238, 'es', 'Sint Maarten', 'Sint Maarten', '', ''),
(715, 239, 'ar', '', '', 'جزر توركس وكايكوس', ''),
(716, 239, 'en', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Island', ''),
(717, 239, 'es', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Island', ''),
(718, 240, 'ar', '', '', 'أراض فرنسية جنوبية وأنتارتيكية', ''),
(719, 240, 'en', 'French Southern and Antarctic Lands', 'Territory of the French Southern and Antarctic Lands', '', ''),
(720, 240, 'es', 'French Southern and Antarctic Lands', 'Territory of the French Southern and Antarctic Lands', '', ''),
(721, 241, 'ar', 'منتسب عضو - توكيلاو ', 'توكيلاو', '', ''),
(722, 241, 'en', 'Tokelau (Associate Member)', 'Tokelau', '', ''),
(723, 241, 'es', 'Tokelau (Associate Member)', 'Tokelau', '', ''),
(724, 242, 'ar', '', '', 'تايواني', ''),
(725, 242, 'en', 'Taiwan', 'Republic of China', '', ''),
(726, 242, 'es', 'Taiwan', 'Republic of China', '', ''),
(727, 243, 'ar', '', '', '', ''),
(728, 243, 'en', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'American', ''),
(729, 243, 'es', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'American', ''),
(730, 244, 'ar', 'الأمريكية المتحدة الولايات ', 'الأمريكية المتحدة الولايات ', '', ''),
(731, 244, 'en', 'United States of America', 'the United States of America', 'American', ''),
(732, 244, 'es', 'United States of America', 'the United States of America', 'American', ''),
(733, 245, 'ar', 'الكرسي الرسولي ', 'الكرسي الرسولي ', '', ''),
(734, 245, 'en', 'Holy See', 'Holy see', '', ''),
(735, 245, 'es', 'Holy See', 'Holy see', '', ''),
(736, 246, 'ar', '', '', '', ''),
(737, 246, 'en', 'Virgin Islands', 'British Virgin Islands', '', ''),
(738, 246, 'es', 'Virgin Islands', 'British Virgin Islands', '', ''),
(739, 247, 'ar', '', '', '', ''),
(740, 247, 'en', 'United States Virgin Islands', 'Virgin Islands of the United States', '', ''),
(741, 247, 'es', 'United States Virgin Islands', 'Virgin Islands of the United States', '', ''),
(742, 249, 'ar', '', '', 'مايوتي', ''),
(743, 249, 'en', 'Mayotte', 'Overseas Department of Mayotte', 'Mahoran', ''),
(744, 249, 'es', 'Mayotte', 'Overseas Department of Mayotte', 'Mahoran', ''),
(745, 250, 'ar', 'السودان جنوب ', 'السودان جنوب جمهورية ', 'سوادني جنوبي', ''),
(746, 250, 'en', 'South Sudan', 'the Republic of South Sudan', 'South Sudanese', ''),
(747, 250, 'es', 'South Sudan', 'the Republic of South Sudan', 'South Sudanese', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` enum('val','per') NOT NULL,
  `value` double NOT NULL,
  `limit_value` double NOT NULL DEFAULT '0',
  `from_date` int(11) NOT NULL,
  `to_date` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `limit_value`, `from_date`, `to_date`, `created_at`, `deleted`) VALUES
(1, '1501', 'val', 10, 100, 1641168000, 1643587200, 0, 0),
(2, '1002', 'per', 20, 0, 1642377600, 1643068800, 1642450129, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons_users`
--

CREATE TABLE `coupons_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('val','per') NOT NULL,
  `value` double NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons_users`
--

INSERT INTO `coupons_users` (`id`, `user_id`, `type`, `value`, `coupon_id`, `created_at`) VALUES
(2, 2, 'val', 10, 1, 1642362706);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `perant_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `image`, `icon`, `level`, `perant_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(2, '23dcdfb9fe100036dbb2d0add0836b80.jpg', NULL, 1, 0, 1593375284, 1598534181, 2, 2, 0),
(3, '33a0e5a1fdb89640712aee73dfb51f18.jpg', NULL, 1, 0, 1593375284, 1598534210, 2, 2, 0),
(4, '210cc588cbd964ed9be96ea550047443.png', NULL, 2, 2, 1593376762, 1600521139, 2, 3, 0),
(5, 'bf1a1c81289a0ffbf3e34a64e29bda27.jpg', NULL, 1, 0, 1598534279, 1598534279, 2, 0, 0),
(6, 'dfa96a35c951e1967a0c92d54d961b51.jpg', NULL, 1, 0, 1598534345, 1598534345, 2, 0, 0),
(7, '66c6989894369a943a8850b8cfa88307.jpg', NULL, 1, 0, 1598534429, 1598534429, 2, 0, 0),
(8, 'f7eac310675b462bc3cb93199e505227.jpg', NULL, 2, 2, 1600520227, 1600520227, 3, 0, 0),
(9, 'fcda3dd80d885f85ed982c3627e35444.jpg', NULL, 2, 2, 1600520314, 1600520314, 3, 0, 0),
(10, '3063cacb77c5e757982925ec4d8d826f.jpg', NULL, 2, 2, 1600520384, 1600520384, 3, 0, 0),
(11, '8ede16e5faaa11f2d6f1f69df9e6100a.jpg', NULL, 2, 2, 1600520479, 1600520479, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments_trans`
--

CREATE TABLE `departments_trans` (
  `id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `text_list` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments_trans`
--

INSERT INTO `departments_trans` (`id`, `lang`, `department_id`, `title`, `content`, `text_list`) VALUES
(33, 'es', 2, 'Medical Supplies', NULL, NULL),
(36, 'es', 3, 'Healthy products', NULL, NULL),
(35, 'en', 3, 'Healthy products', NULL, NULL),
(31, 'ar', 2, 'مستلزمات طبية', NULL, NULL),
(48, 'es', 4, 'Medical devices', NULL, NULL),
(47, 'en', 4, 'Medical devices', NULL, NULL),
(32, 'en', 2, 'Medical devices', NULL, NULL),
(46, 'ar', 4, 'اجهزة طبية ', NULL, NULL),
(34, 'ar', 3, 'منتجات صحية', NULL, NULL),
(37, 'ar', 5, 'مستحضرات التجميل', NULL, NULL),
(38, 'en', 5, 'COSMETIC', NULL, NULL),
(39, 'es', 5, 'COSMETIC', NULL, NULL),
(40, 'ar', 6, 'التغذية', NULL, NULL),
(41, 'en', 6, 'Nutrition ', NULL, NULL),
(42, 'es', 6, 'Nutrition', NULL, NULL),
(43, 'ar', 7, 'المنتجات العشبية', NULL, NULL),
(44, 'en', 7, 'Herbal Products', NULL, NULL),
(45, 'es', 7, 'Herbal Products', NULL, NULL),
(49, 'ar', 8, 'الأجهزة التشخيصية', NULL, NULL),
(50, 'en', 8, 'Diagnostic devices', NULL, NULL),
(51, 'es', 8, 'Diagnostic devices', NULL, NULL),
(52, 'ar', 9, 'الأجهزة العلاجية', NULL, NULL),
(53, 'en', 9, 'Therapeutic devices', NULL, NULL),
(54, 'es', 9, 'Therapeutic devices', NULL, NULL),
(55, 'ar', 10, 'أجهزة العلاج الطبيعي', NULL, NULL),
(56, 'en', 10, 'Physiotherapy devices', NULL, NULL),
(57, 'es', 10, 'Physiotherapy devices', NULL, NULL),
(58, 'ar', 11, 'أجهزة علاج العيون', NULL, NULL),
(59, 'en', 11, 'Eye treatment devices', NULL, NULL),
(60, 'es', 11, 'Eye treatment devices', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `user_id`, `product_id`) VALUES
(37, 2, 1),
(2, 7, 2),
(18, 24, 1),
(11, 22, 1),
(38, 2, 2),
(19, 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fire_base_tokens`
--

CREATE TABLE `fire_base_tokens` (
  `id` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `phone_token` varchar(500) NOT NULL,
  `software_type` tinyint(4) NOT NULL COMMENT '1- ios / 2-android'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fire_base_tokens`
--

INSERT INTO `fire_base_tokens` (`id`, `user_id_fk`, `phone_token`, `software_type`) VALUES
(72, 34, 'cA0P8DYxUEGgtHQU5juOmH:APA91bGRC4EUDKX1MD5lOOKWVqTR_Jba6kImVm2V3Ea92KCCsSwI7VAEPycOnyBVoe7qY9DxJKZfcbUq1uxgxniP9b9QXH4kFKw-HPamApDxXJw8jWLJRSsRBTfs9ew3b32RCYRBnKQI', 2),
(2, 98, 'dlIyLvtRPIY:APA91bHV3n_HFKcNmyZFkDn097W_IrMFEEJO6ohR0CTp3T8R2sSykp9lwOUnxtx6tVId2AYxqlj4fqqZey3JIB8pX5ahqFvD7R_mPgrTxpNl5ht3neyDhtuhEeMGECJpWEamCKXncHOK', 2),
(3, 89, 'dQ5OPr0lc7A:APA91bHlj3NIN7UjUh4f6x0y1P5eRnAIYPxBYy9fQ5bAGetLDnlPJe8L238GaAsI8StsQ0BxMWL0FXf8GQH9lXLnSyO0AjiFROlMnVvEjxgd9KeBZKg9WN1RTJXUNC5kjCrDydCtYX-X', 2),
(16, 3, 'c96av1d6yVE:APA91bF62cFKk4Fn58GgYFw3lBNXhhL7xS2r-Q71pzgYv25HevBqp41h1RkzbqPAETPsg5ltJ07vm4N_thPSpIdXoek_owcvTVh37OqBiekae9gmWYXWIOlJeiVZ48TilGiECst6masv', 2),
(17, 3, 'dwq0qvfOSQGD8zNa8bdmMp:APA91bGWxs2A2AcspgAX5yeIHIdbzL2bza3OIUwGJCPd_-YLYyH2ECZVBMYq0eLCGopD1cgPMuywjkTwdrFcqqzMIUYLiKygBYiP0jpMgo4m8GB7yiEhQbnVztS5075ib2-AMo9eFySS', 2),
(27, 6, 'cQxZmTv1WENhuPeyWZ3wY7:APA91bFHxEfPVw-JI_FnniDVYFqvBWQPHwG0ce8kdVq43QsrxxJxZ-HRxPD58Y74CXMBdBftiY2KMzFXkhx7xrINAj-lbhokrquAdyRD680-d-s1sHIBXu5rtP7kJ8YRLqD5hnLgpyJL', 1),
(18, 4, 'dCwNFpoCDh8:APA91bEJ_Q8rclNMOBAdWnqKAnrUOpzTZ9RdV1exw9O5hLdblUI_XnKiEi3p6lL30d9zDf2jpdMMA9EkmXqEdRQJ3WZ9NyVcXS-89xe0C_BvdptTm-BQaG2oTsd0ViTaHNghvVA4U7BC', 2),
(22, 5, 'cIySNKZYD1o:APA91bHH1x7eAaApuTRbErYUx9Mjk2wSh3t9rb30bSCyLVSEo4CkfLNjBMRCLZ3xJ3XaH9doudxNmS-ApPlJ5bW0oczBN_YYYt9BzYk-SMqRpG4bjeYGB5Ij37TvRNPx6RYbmcCkk7Ns', 2),
(33, 5, 'dRnREJeSQBQ:APA91bEZrTd6kCZ4Hh5JpLY0HrJg4bgTL_qvX56fXXRgKtEirRnGE2wcB8BjaSNLhKWXaoD5pa9ZrQQEFoFi933lYag1bpWk7t3Kc4VH-QK0CuNOuMlEVg8DjScZX_MVP0PssSC6I_a_', 2),
(26, 14, 'foE69Dd5VyI:APA91bHZoqfHJEIOr_c-D5RKxyr_4jcfqKEuPA-VBWgvq5795QceqIKCT64pchcrT2nh5QDRxLPAc4q-UnjdkF_babnjgXSbp9bHPccF6J8sq5WXV0p_jmlYBY1fxEAUEh5Nw9N0gPhG', 2),
(28, 6, 'dkXRB0B44ki2kpKWmg0Cq0:APA91bGSuXMDeRD5Fdx8upbbw_JgR8HmH2S8_fjJQ99UHWIkZzNEVsSYZkUkd1CRdMPkJU5CgupIK7MXJdBPq4ImJBxeKOgpiJONYliMDGvK-nRJUeu91Qz_592p8nA8xueANfpjJQqL', 1),
(39, 3, 'fwaK1zaUjU2Vs6WhvtsMvB:APA91bETQAtyVcdDHbSAf-cvyOEksdaauMnq-lPzJH9iQWt6dHIWe149_2jhCLg4u4J__OQZF0oueMChvAMvA7FAINwKSEEfZOekwDCvbaqwpR5DkDqdK6EYXI3104q_jTofDNvGuFN0', 1),
(32, 12, 'eMqJHniNiEPpg2-yH09lej:APA91bF4Io6Vx8LYM6xxI6gDJ6jcnf5k7ieitwGpYpqPCPzkUhzjb_qddPxKNL-cI9uMxyhi3g_iFJZo1rSNLVG5-KkrAQGdLRs9UqcOHGPsJ9c2LwbEqOIWx0dNZdKXHuqBQL7mdW5C', 1),
(34, 12, 'ccIS9HgMJEUSgjmLNxWPT2:APA91bGA1WJRr3geJLAJYbdyYpEKGhrZHoVKQ8lpT0vO5lilYs1-lHjlQsREdD_Za32htSJCb9IhjJ5TA47zRnkatXlAKvMit7q528almRgvn28JXfMEGgASIjs2Yv0E7xchPD3N1vqO', 1),
(160, 57, 'cgQmUW2i6Mk:APA91bGB9Xf0Z8WnwUWYT5TL_XXiULWAUNE6PmTmsjZqYgeEc6RyMo7tzcM4YLXzeCxrpeOHj78gUaBA7JInLsKf-85z8SgoUkbf71DoZpKdHxyLgGBHZugz4_WKKG5qxox2xrV8edDF', 2),
(212, 101, 'depji42FzWw:APA91bG3eUT02_MbCkJ7fMhYBdodow81COf3hL5JFH1mjZShf2HdHUOLgdrmE_ZG-3RE5AE6jEI1IawpwCTPX0avHPEKAY_CarI1c0uwDIPYyvOUqWkcyAb_E-g5G0cYNsNMVzkgib0u', 2),
(38, 12, 'fwaK1zaUjU2Vs6WhvtsMvB:APA91bETQAtyVcdDHbSAf-cvyOEksdaauMnq-lPzJH9iQWt6dHIWe149_2jhCLg4u4J__OQZF0oueMChvAMvA7FAINwKSEEfZOekwDCvbaqwpR5DkDqdK6EYXI3104q_jTofDNvGuFN0', 1),
(51, 13, 'eWnj6U7GjUY:APA91bGVA4TYc_0TpHKf-Se5Lj9N0X21JKGtJw_WmAQsKo_bnMkjuoxW-eOaTbWSZnlo9jJkJVSucpVp3axaCkTmomWvVcFWsh_-TNfK0vc0rAw5o6_rbRIaWrEYNUHcjSsi_QGTDduP', 2),
(43, 23, 'fwaK1zaUjU2Vs6WhvtsMvB:APA91bETQAtyVcdDHbSAf-cvyOEksdaauMnq-lPzJH9iQWt6dHIWe149_2jhCLg4u4J__OQZF0oueMChvAMvA7FAINwKSEEfZOekwDCvbaqwpR5DkDqdK6EYXI3104q_jTofDNvGuFN0', 1),
(44, 1, 'cQU2ro42wDw:APA91bFRzNzJn6cadiR75LEe1uVnfdxrnoXUqKjTdktljS7uXryp_-BkXiRPsNg5dlJLoqIhyAv5xopoUVMEkDDZsmo40cLQDpoAakI2Z7Rk9wLtcEm0ThnCDjbxFLRnKMrfkMMY-VQg', 2),
(45, 9, 'dkXRB0B44ki2kpKWmg0Cq0:APA91bGSuXMDeRD5Fdx8upbbw_JgR8HmH2S8_fjJQ99UHWIkZzNEVsSYZkUkd1CRdMPkJU5CgupIK7MXJdBPq4ImJBxeKOgpiJONYliMDGvK-nRJUeu91Qz_592p8nA8xueANfpjJQqL', 1),
(46, 12, 'dA49kUToAU_TkXSxAN1vxE:APA91bGP65frCspoV0vmFkoh9x65zhieaagPBnV517UGLMc5Z5CPQVlSe01cqtTOZ9TRjs3WM2FMTVmLyg0H9xZYKPr2zqKmcbz9-7-9ccsl3isjy1XAuRBfRhYN5CUnbqy8t4ZMGTUR', 1),
(47, 3, 'dA49kUToAU_TkXSxAN1vxE:APA91bGP65frCspoV0vmFkoh9x65zhieaagPBnV517UGLMc5Z5CPQVlSe01cqtTOZ9TRjs3WM2FMTVmLyg0H9xZYKPr2zqKmcbz9-7-9ccsl3isjy1XAuRBfRhYN5CUnbqy8t4ZMGTUR', 1),
(48, 2, 'dA49kUToAU_TkXSxAN1vxE:APA91bGP65frCspoV0vmFkoh9x65zhieaagPBnV517UGLMc5Z5CPQVlSe01cqtTOZ9TRjs3WM2FMTVmLyg0H9xZYKPr2zqKmcbz9-7-9ccsl3isjy1XAuRBfRhYN5CUnbqy8t4ZMGTUR', 1),
(49, 13, 'dA49kUToAU_TkXSxAN1vxE:APA91bGP65frCspoV0vmFkoh9x65zhieaagPBnV517UGLMc5Z5CPQVlSe01cqtTOZ9TRjs3WM2FMTVmLyg0H9xZYKPr2zqKmcbz9-7-9ccsl3isjy1XAuRBfRhYN5CUnbqy8t4ZMGTUR', 1),
(55, 23, 'cPMs_PMTZBg:APA91bGG_RqNLF6Fx271QdjxKefRgq1TvehqHyyN-WLfYhOLp5gxvqb5JQn-xmpwRYJ-dhS_xs8hed8ldSzhWA9w8erztxim4gxGD7-FAsGGMLB-7J7ywbeoen_L-fldSVZ_989Hgk8h', 2),
(56, 6, 'fX2djxElI8U:APA91bHBYMDQudVIVWGcwGZn2FOTenZS4K7WePIZZAIpC4LIaUxjpIzzPEehDWsH1uc8w_xrI3KTkUZPdecEF2v7Muhw96nZhgF-h87tHKR-lo9-UR8QhGGul87GpF16lbIpEytaKIkh', 2),
(58, 7, 'emO0-kegDEljoOTVxP2Jzp:APA91bGpw08PYmHTfZhjDAQRgUJQzdPD9F58QoiAKQm0muyRgpn4ObIl5Ao5-Fbwn158ps_aal68zZCPFvIh-v5p2xAriHlIctoptp6VisMV5P-ZRR6GOE3CXiH9hQJV-WQh3NKFy2MT', 1),
(59, 22, 'dM8akLomR--OqIqT4jHmzV:APA91bFx3K2zemaxyjakYmPBoD_MG0wzb8Ecw81H9lRMQf0Lm5DU7kthzIt7-ooar1U9SSEPZqr31j-_c33tH4qmGhbLwrrgJXETEHfgoZwMiyeve-8GA4WPqtmjEJylWwcbPbAiJ9ew', 2),
(60, 22, 'flEy0utwQqaxqjwde-198K:APA91bGVR7HmN8hhW6ZhRaNiMic4Nfph2reYfzZtSrUiv-0BeGx39v1kGAt3HAAmgpIlxgPQGgCvVEN35c9pUZc7d0bBwoDHXFJ2V_9I4kv9nhOBjRaye3MSaV3aOMFQtpyz_ZhAxYzZ', 2),
(61, 22, 'fXIV5_8mR2ObKYStkFG-8n:APA91bEGzPR4__5JAw5EDKHqVabuajTG0K68C3Dr5DU34zt6G9ez_R25kd8jC9L5QrgyZVyMbRAvuxJ2odWS-hX_7SeThjlkygSaINgp083Fc_2lBhD0Q_ANcp13L0T4pX_6XMjNNz05', 2),
(62, 6, 'dmXupWVVO0B7tKSO3_Iafk:APA91bE16HwiK0ya2DZ45mO1ri93CcNFJ_iJSXIJ1CYZp9TQFG8SiXjPo95DI3LFkr6cWVHO2j7_pwKwrEAhVU3mFMkxQdtXpF8JIupBV7rmTvUy-7lyxEPcRn2CN7uIBYyniq1URM4P', 1),
(65, 9, 'eybKq0eEAUfBjYkc0C9Cv7:APA91bFuCnkygZd91bTtulaKc05D-jAOGrPE40ngG8CD7TLCR9LFZUkPojwstHXdI0u_6PP_a6ZpKhagnrV31LBF_qLHpfg1jvMA05HrAWuw2Tc3WCUqTtS5PckNmm1trXEXzQKxjs_5', 1),
(64, 23, 'ekeQZ18-rUUhhyE16GQNmp:APA91bERuSUOiJxu7798Q-eDAFqdqXaBKXce5xh6-gyuB0nnLd7XRygSEQM76nFzDuN6xKFk6-B-lWqTpKSWkYRWXbliD0UTg_xmWg5IbI5W52s0kg32qESFnvxg5KpujsmXGOcxauEA', 1),
(66, 23, 'e961-_cBf067gF1kqJ5JXY:APA91bFBdKu-NbDyWMkViNFT1F7ux5D7OkUksYhOSKKqybJPwrzCecYPhnJPYwDn_rXyQL9GPWvBHGGg7dXF_llbknrwuZnsJK-VKA9Dy5PMzASbD75rdoYmg1MM7fdWqHtYIzI4dywH', 1),
(67, 22, 'cPMYuem4SwSN6WZ2X8qWIv:APA91bHZM-FCibbQ6LOeWpTcPk4oW7u4g7XSljnEAGCwkoHRJg1zrKJzubI6y8M1xScHR8Z2GtW1q-J2NhvJ-JsoqB1IAPtzodmGxRclzXhBmijWIIotK1spt0w8k4JsQscyVvtQOw6u', 2),
(69, 25, 'dNh6JDXCU7c:APA91bFfkJCXSqTicSaqzTq_DtPVTpv2yyTI24IB-E44ANDOdqZHMwE9NruS-XoMlrJcafFCsGJwbaUBPSHuDMEuaYEXMXoBPkqQ-a4tX-VPzOUUSwTYo2SrQo1iy3WTaIKc7hkVteo9', 2),
(79, 34, 'fF79jtOBRti62WpXEXuQjC:APA91bHNyG5OAblVeoEN8SITdhEA32OuHuQ6O5WeCe5qNolIyXN2F-zxSne2sAKkWv8YxCtc39U9f8mFeOOlzgjdvq5kY0HAiuTJu8flf8x50DLgdwVlWzs9N3nwKUlZy3rAL16FWtfR', 2),
(71, 26, 'd94K-FEO6khYuHcowOPuO2:APA91bG6XwBLLDLqqzSa_fY2irIvBBYpxbKSrAiCPlKqV29OSwy8lbFTpgv935Fu0CQn_EHzPB4sg9TSryXJfk9Y8pLod-0IHhdzl-40C501vsIHwrJOeWpAH2318VthJMXjXUKiDQ_N', 2),
(159, 67, 'fDNOyEqigpU:APA91bGAvL2RmfmoZ6zqnrEqbs5rvYrZCGhUmhekYgGEDMBnKWASvvFaEF1Ku4FtLOrumuw5op-tzD1ZbCPgyBgV3U-qjkxBmJIJB5VIa7Mf6el_ZZ42cLyL25TATHrtjag_wHAZiybu', 2),
(121, 34, 'c5ndzFOgWUQqjwtT0iDUlR:APA91bG5FYWp7_ldjeAqtCjGGzlUXLEEOw-fLPr4kSjZff_U7UN-FZVlIbb5nTth4sblRu38Q-S-satKDVNDJuT91rUOzPKkaXZwNabzgB2sqJuFLDO-sYepRueMrBHOe4ZPeO313eOj', 2),
(76, 7, 'e0DomBuHM5c:APA91bEGZh_WqojYexajNKHfxYzP0HZnRFkkQY77mcACwShlTx4Rliwy-K620Blue9O_AyXmI9oA0hx2WLxlYw7ClDrMv6Rclz5GDFoxUvdkHV4DYr04NND_Mx0peertkUfoN_Y9NuVc', 2),
(77, 24, 'fLzcIMgiPcQ:APA91bG9tZ8L6H5mFG8a6rCUKN0K0zjqGrMuAMFJZUqBD7qo13s9FnPJlEcyvdd4craMARbYY2jNHW4tCwYkgrZMpp68eWhWlOBqo0IlAO4X5sfdBFydMaX0oGz5V1zpSVyL4P6l_WIy', 2),
(78, 34, 'dHS-iAhYq0sViw9Hg_gtxE:APA91bEKObWUqQqTSOG-bew1Yo2PCn4iTURRtdSP9ZbjzE6TprLF3zZYz7B21wcAdB-CAJsykDJNF4Bxa_l_RTPOJJhtcLU5aEUKP5eqWh_pll78J1fsThkIaPlPtdzUn7q5J4UiSq5R', 2),
(80, 34, 'cUAwiQ9GiUXlh_F6VO912I:APA91bGxbQf5AKUqmAstt1h8946AibRl0gQNLj5tCXlNySDTTJAESo1e3X1xNpy3vimRjO9DAXfSwxcpk1W6q1DoyNMMosaWVhjSarwlniBV2kCJVIJD_36pYdx0ZXKgr7qUH3-8J24J', 2),
(81, 35, 'ca52Ij0Q8gU:APA91bF0sIRToAVfXVocW7i_fsbI01mrzFYQtKw4bCFybLP1HrzUxS8YdKidRuXEIY95ReMSVnWVYvKjRLJbnWey1LzA8XIfm-EmXW4muKB4t9UMgbi0zP-weAUhlPFYg_EYKy0n1Y1a', 2),
(82, 18, 'fH923L8m6RI:APA91bFmHe4aSR_01tvvwzedAJ64qimE5IsdObM0y-afQHJ6OZVLTsC6mmPMzfjLnpsevJNsr6RrGAGeQVCPs0-v5aQVdSde1m5cuNDJcOZTNTubeCCYp_jiX_6c2qkPSYpMv63hsUNU', 2),
(83, 13, 'elu__pVtnn8:APA91bE1K4JKMx214GFkg4HOujrCAiRehirN9MlTXlu9McbSimcbTeR3m1yigqW6N0gu7WYI7jIvILMbioIemyytSlyzmJZibKgmWnTfJlWMEyj-R8AyFUjbwyzl65vpgDfnplEhoYJX', 2),
(84, 38, 'e63lUuF-P4s:APA91bHQtSLo2MWzL8Bp0_E1P2kobpRMd4sxVjrq9Xqf4g6t8crINRrQe18-HObccxPzB3C4FdEFbtOoLH1A2UDR_hSZ71te_JMMqmrYb3z_JTtKIShMos2QIx3H6pwhRKv-kwnMngCL', 2),
(85, 41, 'eFeXeD0vyq8:APA91bHDH3MGd_LfBy_TtocoB2B12IQ1VATadS69K0MLhljCPpr_FU0-WFILIfcDDXG1uh11t0tCrOz7pr4OkjHiQYoo6q_cLPHAYrYpk5lbzomFRixLT1HOmWEh567EKrh3SbzExQq7', 2),
(86, 29, 'eIypL1CKpgE:APA91bGJcACnIOOjcLYdeD2ctgUnJ9EDvJuerVIVPqguCXn4prgIEKAOOzlSP_kA6CPwJODnIp96vIWmnJ138DfYhRU2kZNp5fWTLpRu0n2cTkusPWRtgUzaSAsVyK1s8v9QvW0MW0Hw', 2),
(87, 28, 'eW35Nxxe6HQ:APA91bHkrjSxmZoz3p0iCDq-QiVe6Sn6zVB3B1nkkeOF4T70pOOb6bgnl3EazJJCnOL_h45Klen0FgBueeZTKOhV0vBL7tzmk5wxo8imRgtELTUwpUHiuLd0Ly5S0I92UrUZd9Ld1cxE', 2),
(89, 27, 'e5Xhe1FTsTs:APA91bE8YMaBvIjoV6ZqZPIfERWyPfCDA8kwIhY_H38G84kGuLSHJJq_a7Vu2wUkfSB98hRZ5sm4CBraOKBSLwLukYBxTog0MTFbQEXZQibYvo9MhacnDy7Q-WbDe6sjm3cqK6iNUjf0', 2),
(90, 5, 'cPIvwdYjC8A:APA91bG4aUl_-CZdfnHIXXorGfpZJMnlYmY_RoxTbKQapUWjt-BPTuReile-8TZ0cf5WCmTgPs1o9cv8_ZCKL3FSiLVvfiyqlifllEKICMto2vA2ye2znoasdOntQe7w4asOc6s0rpj8', 2),
(91, 10, 'dVvte5Htz_w:APA91bFLupeTS-8-4yJbou1HhxNFYyrGu7z02LgK0vlZ5nJjxvWt4WUhtthQq-cvBdPW3n_shS_y_NGQ_XPYIaG17Sl05cYHW76VFYAWSh1NuiKCHqtJxNSJvpNvYJg4GrmqrkzlBklA', 2),
(92, 15, 'e6ZFz0M_mIE:APA91bGDyi4qImYLfXxQu9Y3Nn_mprWn7lGvZUSBoi7u9vNkXevGl8p9-PC6eXURryd5g1f-AmowIdI-p18ahsD813_53AJuCXyq6Jpu-IOLNnGCjg3rfWrVJgo7Ky9N1jRBO3HlEhNh', 2),
(93, 33, 'fJ5bqczhM7I:APA91bFBECktg9GlHGeRkIKQ3qZdzuHupngusZGT6vhtJjGD5k1VHRCMm02b9lB3Q6eQDdXBGkpmrkIJj7WldSOkItMYXAhXib-HJLTPbSgdpAGjI-nIsSDOp2Vukzt7M1LiCWSFtHCb', 2),
(94, 37, 'dN8ZLPrUwv0:APA91bGKdhG7oYtbmnks6U3gI3IhtbbnZUl0hUsQ77K6A2UERLm6LhPH7iYvMa_pYzn6Rk8KzGcrGDsiVd8EZJ8gS7tQkm7s-RLPmpBiCdT5c5Aw_ZY9_3cY3JJBHuyxWrJ3PjoVlFqP', 2),
(95, 40, 'cZvk8d3iSiI:APA91bEkQBDl9JbQamvmGhA9ZGWLPnieYGG4wHWJk2rKo_Gejk77Y6uNedY9NxOF9YYiwalj37atOqUc5wLIidhhi9b2Hi1FmAkkl9VPIWlXG7re1YbmiWLW4sBJ_wISXW7DrjUGXL00', 2),
(96, 17, 'f6uDiXsHlv8:APA91bHSLpDO000DPTyzS4iSMw8PIPl12o1OtCnZAO43gCtYTpJnWT7oScvNpaBJWFwS06jY57vfkP7Pd6OgsfZFsDbGow4tDPd5FAJv1CO0ZM4IhsooDEQlcu1OSu_a_MVY1zHqZNld', 2),
(98, 11, 'cVnqOZQ2hms:APA91bH9urJ17gQmu8XkLONHZrvibTLar8ID3ttDj2Uc8cpbG8zsR1nJhclU0dhCYGZdJ_w9gA8MrWyMvzXIErnJ9zAnpqmVzgbLmvyPZO7s36S_zcoAO6zEKzRFAFQ0Y_KnXUBGwrMv', 2),
(99, 12, 'eAlTI1N2md4:APA91bE4hw90aQnIhQcFOYHAi-yrjjfhCOqZBbMTTJtHYSYl6kdK5uZ0OeFBrrbGBLRd4Xc7SI0fJsqH4r3JwwXKdxvM9J4W-m6b5ywjXenP0bq1NrWV12ZTzglsRXP8JvtyDF_QDD69', 2),
(101, 31, 'dANspMMERM4:APA91bE3uI-DEaey7Y9mxOSCkeAjZxqt8awU9hQG7OMbTR8VIfrCg4OolUuG2F6HljhZ2NKwyY1IsE3WTswMoDcX_Ogc3fgJilf7ATTijPaYVy84o2D_Y2cp4YmjaBoRbJ_U7iW-pUsC', 2),
(104, 32, 'dIQBheOoepY:APA91bHrq-eyIGQBBFs93q58BEr8mpnnN0Lr3TGLxE0oT_N7oNQvt2oJtVBvIYcIy42Nj8WtR4ngvmBWhJ7cObBYsfHKiyuuKBVPRMZKFVzMTuisG0XuZlFRmdzWl7j-SPkHemDYesxA', 2),
(108, 4, 'frbNnL9t1EI:APA91bFTH7FCOyTqt39Lr-26KQTxvQJEBMtcxgGCMVVo9OXVRMJIcp2aLUaNDSqK7y_MdQYHhzwwHeVTXz1D0X0pzMyhpAcz_YHMhux6iadeTv2OZUSQgR43DTkg_Mz2NvOoAneC0ZBN', 2),
(111, 47, 'c75iCw9OQZ-T2tS_bXJ4nl:APA91bEfDb_ORiABlAo-xD1zf6-T496CRZ_689iovbRqcbQ8pwLTrV970PeJJgO6S0ef8dPsG2Jrln_Sato6jzIou53S_02ultO06wa2UB0LTfEU0ASnVj3AECG94Q2odq5Zsnb3Szrm', 2),
(112, 48, 'f3wZnfjv6xU:APA91bG3kHIqIpP1MiyV7suMI82epb7D_zL5a_DBSX5XNyjTYGU_8zCBuE25_RNpyUeocIRP_brtJ2LQ1CR7L0xeVpV7Ueno38aW0RzNv8RvLLyqqM4fFzxGWpNmFxSPKqP5k8qPN16T', 2),
(113, 43, 'fHifsWTsCmw:APA91bEa-twEtQB1kxyk7W_QSf8vUiQnqM3jZHzPGm2KRGvjLx2SrvInbQRS2ljMFqZeposMGAlszKBDH3ILUSpZg07F00j8fzEB11qs77z6cymMrzSrdP-y8NSa1CeDsizqPOZF8yCp', 2),
(114, 49, 'dH3PCKlLKWM:APA91bFAMFTZzdxrmqPHuwyi3lfJ1Eim_CMk38XoFkRw-89UnmePpfMM2ConvJ3IB-Lm4o5CYnCKsQW6Nein8rv8bcHQ-UO-Ng4ri71fUwxsenniVdOsLVfSjrDA-wKamU2w9RGRaO5Q', 2),
(115, 39, 'dHV3SkC-zSY:APA91bF3Irc92LoydLlF8kpQesOw0f3OU9o_96qi_EHAJapBxpjs9uXQSALBscHNfhDRdSkdTMIKgaob_JdNGIDHewnrvsfhkO_uj2Akq1lNSbyMV6wx06Yo4fTpVy7tEQvAe5VVolNj', 2),
(118, 34, 'czCqZX-5d0Pzgaqq9JsCfk:APA91bHqFp0loOTm20E5wFg1zzGIE1xg0Zn7ZFxM6g8S-b4CfNj7F8_qP2jrb1HudqftI1-21RgsSIMZOHlupJNfsf1blJY3U_zM-JZXjVA7-ULnnLPk-twe5CxL1EBnmAtEIs2DzhIk', 2),
(122, 24, 'f3sySnrpSeuN9V0g-iCVbC:APA91bELpmznuWIbiBOvmbCcDZ0g6Rbon8LowVUpqBnZ01hssMCgLe0rQsqWmqyRIRWclOHTtsOwjYR5iWBluLaFZ0lJ1uGOjvv8Q_3Pviz2zi6W3NQjyqJVWVXKFeDbmRDzlNxeg6IY', 2),
(125, 7, 'fMxmNZ9qQq2GegDOoHoxkH:APA91bH0YvLaWFiUZxO20ETtN0UsoiRmkdXP3O_pQesuQdmzHSmErtOrz31PaH8Mp_ISq6ICxtsvPEqXPFvvLdFxqXTQ3aoNED6zTEiMksaQmkjXKD2EyX5NfK-hz3NWT1aPpAnmOpt7', 2),
(126, 53, 'cYdAM-jEpkxAkIbCu2OFRo:APA91bFbl_g31nHsomSXdtiOvFxTz8BgV1_f0Q1yQ3wc6D54VnxeGH2g4fxbEPYqkhgOak8LdNQhHHwBhjQ5eXLzf3QtDkaUub_4U4IERpjXOv-B3QG2EHpd2xn_VtIMictm75GGEHSY', 2),
(127, 26, 'fhdDSz7g8EPztB211ipgyr:APA91bHFi331DIYGCvf0w9oXd__izf9r8cC0tH--WxqgyLeY6r6-lrC04O6aeALwvCwL-5LjLtnRJWTJi_OsvJJMsJOM5H98szxcX4XxBRk6irEJzWILgd6Mx3AfnBDbvtdr9qQAxF2D', 1),
(128, 26, 'dcAvX3_Y60g:APA91bFtkNmlACbSaVTUgkEzAEQxnOW-fLQEya7TLjkzrTzcXppjk1OqTkgsXxGCOBabYKK5HWKabqmCItuAiEqv1uUvy1u5i0fHIm3nCf_Ba7JqPI0xZ_nnHYbhyjrKfxZb1imxQlDY', 2),
(129, 26, 'd5sJixAug0zxmLhpNZNTfy:APA91bGsZW6o_GXBzXfg3gt7bimOKwJNd8pj4dUk6pkD-PgKAjGCt8eAGoI6cdG7mYBIZsFawg-mF_c_vbhfAE9Ectt4BykzDR-ODKCkZbJmFU5vmi1D-su81u2kRw3tay8BdjXBBbjM', 1),
(130, 10, 'dVZeB16PRMC1sdbOR_YeA5:APA91bEC_fVf7MxWgGSJOXQyLqvO2Phe_HavkUhbrXeg_GNpMkXLVSqXO2xJUBo3yCRlUsKFGD1gECs1rI2EG2It_8jDXwDuDbUAc6GgOU7zCk7F6LA-Jt65jzcudIXHjehc6Bydsv8T', 2),
(132, 26, 'cN76NCUNcUq-rcCD4jFxIg:APA91bGQ8m0qd67YdLg8d8z3PmSLBAMOFORNAHR8Q3k7RjTGM8B_vimO-WGrAw_BBM6MjsiBxyezU43-nIF1Zzi1WngX6IFYrOhkctxeTiJhchAKzKHKGBsnRhhXBdhI-5SC37kbqLD1', 1),
(133, 26, 'fmAZUcsxhEGmjMIQcF4F_Z:APA91bG_TP0GECLqwe3iKZUuq_SOeVE3Wf6QPle8LW4yXW98e0AFX8FvJ4gBFapUePyTSl66VK5pyJ7nq5UvTmTtbs03oY59DP-zbshPqJg8XE3EU42IRgFmKlH6yS4nxtGM_TWVIgcs', 1),
(134, 24, 'eN0j8h57hbs:APA91bEIBXzdEFdp4n1h7uXy4vTcuRSTFEqsMTUx4X1uzGVfJ0Gn4CGzcrixeLIeGhThBg6RknuPM4FqTZQrO17mQNNySL1ebvT_7uOD1pJVwNSda-xFhM_sdQQRNnPs61QyC6T7ZBc5', 2),
(152, 49, 'd-HMHyXnQtiNzlPIJHmovK:APA91bGC2GDisBGl1vtb7PSPUWSLDv6VgvWfgudGXTEKaxvL6GULCb2u6e55iqfAgTt0roP22yS8A3YzveSbsURL4tol0YP9yrA1ysyBAZy_05fPvFifeNoh7uGXFnxafexPwRdCit2a', 2),
(136, 58, 'dcoi7EKXRGWrG2trKuyVfi:APA91bFjL9iLqrYKkSfcNJLPFWcJdSA5QNKchXLNxgw-FCL3ef1_qEaWpj8o6hSArxBMH-DBgl5HZQuu-46uSbO33NHAQcucPja382ZnPLgxJ8pgp9bafcZSZ3mjA9CvDDTV4wjeLJXY', 2),
(137, 59, 'fl11NfqTTVaS73eajKa95t:APA91bFFQRVMlvlErKvPdHh3WbUNrasiOgSBRdZp4QOT3NYNxnBTXQXqENbqjOT3ZvJ8OgOuT5zWYsxwcYxSsAWm6UVwS9Lltd9TG9updXKaJnLdlh-TddmjJEXdqwLWLV9WrjAAHH_U', 2),
(151, 61, 'etIivDWGIjg:APA91bGLbeFOOwYfBOj2mAQX4OuveccEI2idjj8UxFWXiiXxUrKpTvdvfLw5CAJ_z-wUntQr807Aogyeif_H0MEDjx7ZMJvxEQ6EJ5pWzwKpu6R6wr0Rt1qkKhhHXNK9pO3kFibo58hD', 2),
(139, 56, 'fvb-Y5rGaZU:APA91bFqmYIPoqxCr3udlt7jlbVn_bCX3MoNsg5Uoxw_68V7vn-outH7005JCJXGazQmJj4kiJsSBg5uIh3P9hCC2UGjZKqMZ2atsNPPt9Azumx0l3Pcsyv32rhqE5HWa2cqWG4333lA', 2),
(208, 73, 'eqI3qWqLZ6E:APA91bEf50kyTk6ahSSPShRd7yAre2h7XTZNFCLgW9p8XULurFckzK8yIejEsb3g6kagy_LGDxpO1NRSm2GkVSOzmtqbN6n8TnUyfESZgo0-395hcGfzQFtWlOVGzaQK5G0bZZg-6F3d', 2),
(143, 16, 'eGJuLw6A9KM:APA91bFmKsTfOwvj6Y31ELOGT2qkf7_1Q7rWrozViR10YK3J4_vC1sBNPd60HnTK-B0NZ2cROxEUwa_OLZd-Kr6zrbeuFWYwIhRl29W8IKtFbS5ftesYuhht3zyEba6qcqzgBEy6qYw2', 2),
(162, 7, 'e4bTW2Q79y0:APA91bG8nK4sDhFY_W75yhXu64-X6PY8Fzur7qrr6XWnDUzLxjzGv_9JJSNp4tHVg-knmMjYFrRd64PpLw6bBQ7KBHmTVzzJT3dBURNsfi5jBnUcd8In60tMkvZ4c1wZ6ysR5YCwNrzs', 2),
(170, 50, 'fCoK9milYw8:APA91bFwX3jBYAV8xaVLRXdBpalCRJA9SMHB_go6ifIS7slwygRXOPpVRCmuPZgi8doR0dcOUWO4BzjflpFkM4hFs6JoYkn2q5Uw1kXZa8KudzvH6OwaJWsqgZMLKx4hqdF64aEPJFZE', 2),
(164, 76, 'ejaDC3XnRELQmG5idoPXzr:APA91bEDu6MpQy-8zFirPCzfMmDNb5YyS8hpPUv99TaThfPJ9Ydics3DrctDYWiixNjeNmTvcFsrWLZ90E9RjvUkJ-lCl166iE7-bD6ILqzHyeuskq8NnDjdQYlMRVm7ubnHMp3zyJg_', 1),
(165, 76, 'ejaDC3XnRELQmG5idoPXzr:APA91bEDu6MpQy-8zFirPCzfMmDNb5YyS8hpPUv99TaThfPJ9Ydics3DrctDYWiixNjeNmTvcFsrWLZ90E9RjvUkJ-lCl166iE7-bD6ILqzHyeuskq8NnDjdQYlMRVm7ubnHMp3zyJg_', 1),
(166, 29, 'c0aF1thd_Lo:APA91bEpnDJX3Y3n6Ucz209pLl-wH7rL2ZzwckilgAr2lKshoM8dqHBRFWT3dQa5MBwhxAQVy4FFiMJyHMlqEJhM4VEa3haSir4iMJiLgEQ31ODWqu28UbLEV5w94-v1E1L1DVX8Df2G', 2),
(167, 75, 'eII2gNgnpvM:APA91bE1JtkJY7KJQFjbJ4kB-KVUrrBA01OjAH3o3xSzIZj-yd3QTARwUidTtSy77Ha6wyKiKqTp-s-8ddSUd65B9_e3R9JAgashoqqgi9nXyGlcrusvud78Kj1cZAvbza6SMr-Jr4PV', 2),
(168, 75, 'fRCcHRn1TRG71rvoVLb2L0:APA91bHMzAOW92kKhRksCmfQz8rzDVhALWKOb5IyFrtIqADSMpPws84oBjUIIvFQWwPK_I-DSKN6jjiIa9vRWsjM09SiMAU5nziP6NZFNlWp4FOw3-tH--5jb5ZnLeLd6_gcIFPIsa2W', 2),
(171, 68, 'dk1fAPT_S2M:APA91bEJtLvYpVeYqzanwHYUQG-zFwsyyHCOTnxtar0mAhdgaEteaMNCzoKWIC6_r0CWAYfnGJ-ZQjQLJ_CwcByII9bWXkVyqJTp1D2_h4s9OhRFDsCK2EiJP-wcLggUBDlZPx6fIphU', 2),
(172, 30, 'dyqkBp0aLcw:APA91bFQHTvYu0o6liJzvgzgtnS82MNhL6yYIfKPRpmmj8ihVlKtXFY5AOuCG7A5620uXKrJyeTETMYTYL7ygM4FRRa51K71pBRowB_ttnFRj34JztEtbaVDvvHbDxeZNty8Uj4p3yxM', 2),
(173, 78, 'e_-_zUUChVY:APA91bERMPvwNwu-QgS_pX3fjFY7lAqGselXdZ5o3OurEnJMfkLHWYmlvbXkZlxULhHeVqpONwpLOTV53bP1VXTh2YB-sncqx66rahakKY2whaoQUyxzl7dEbA6vKx9DIbJhZwq7bnsq', 2),
(174, 79, 'dX_1IxxXwUI:APA91bFpxsUHcL4heEE0kZlZPjWDYMRsTbXRwR8Df7pVbfOVpqRgb5Pbw_sBV5MZ_y6qntFya8prAns1G6lMV_lReoMH3ieUv-9D8GPmvpp2H4g3Lom75bXy63Wdn57MI8-j6Rm0EO7z', 2),
(175, 56, 'd-kWfC2eRiKXJMWy-jHCfq:APA91bE44YIgJW4LtZdL8NOVuwdKPRXE1Nzqb10zDZpLcXmz773A9Dz8gsAFAskEPfo69uh2MzVQ_diWKGZj7y0OsMvUXmM2KshWiiing0AmPXRoDFVb3MgsblaNVHsZnqo3t-3fvt_a', 2),
(176, 77, 'e1KUv9MM10U:APA91bFj1dh74bi39ksw9SjoKLU9rB-wEwS3Vti0rbJeLLHljRD-mqg_Sc1uh_YtuJoTFVSxkbHRDipv8gIFFMhCB0SW_iQS2W6AneS8tL7WF2g-iNyH4nGHofODkQM5Qkv-m8l87d4u', 2),
(183, 88, 'f_O_c_ITEyg:APA91bF1VsS6LsQZKPBNjvERDYZhMmd5x_k1MgKGL9Qg13pBT1SuJVfMwZzbgqn3wdNIGpNhfk1om9dIwHHBpBbN4HXSgWTnPR-w4nr-UkFro5GcJT8EvdfG7lksoInjHfyRbjOOX2qc', 2),
(179, 82, 'ejaDC3XnRELQmG5idoPXzr:APA91bEDu6MpQy-8zFirPCzfMmDNb5YyS8hpPUv99TaThfPJ9Ydics3DrctDYWiixNjeNmTvcFsrWLZ90E9RjvUkJ-lCl166iE7-bD6ILqzHyeuskq8NnDjdQYlMRVm7ubnHMp3zyJg_', 1),
(180, 86, 'dbWdH2Vk2H4:APA91bHR2_rNzfjARzus9T3GDLfCmB_D7iQ7xjaOxEgZMo97a_N5t9W8vNUxUcCyjKgAyIxFEkMxvRWIqYe3JnSvIJNqYOqq51D1EiqCYJv3sozp5tmbqyVHjaPz0GHbd4C3VhpbpaVQ', 2),
(210, 111, 'fOi40YIgSoM:APA91bGd-2VImLyPQm2zdhUeZu3_Y1ttaxvpdgRNtMn33-H-HWdgPMGp6P1oZ4BhHt4IoQOw58P2gE9thEpi8U5zzsC2L2hsmu78a_OPS62DxIJP1mJgsA95oIc0a07bQT6etLLkaOlq', 2),
(182, 92, 'cdTfY6jVwMw:APA91bHnqNkiXo9szTA-R2NeqviIw2WfcrGdY7SY1Bh2qAZeMhsWy5zyN8qNbadwJJxJRoB0kZCehR6NMIHpeGLxU9bZIL0njGRFQ4JFmm54fDidX9WTOq_tOkiAMn3lnkim2irWmVv3', 2),
(184, 91, 'dLpqns5uhlw:APA91bEY64bjIsSIZ7XLQYHMU2bss-mn4B40RQWrylPR8TUDJ4xsMm-k0uYEoaWimOALfSCnXY7k4uHjvI5EmlXE6w2Da6cb0fVP0dHYTmHYV59Hg08Lhbgaxj1nGAG9U_hEiEadmUIS', 2),
(185, 83, 'dLjUbCwNkqY:APA91bFR52h2vnfkIUYA9fkbFl2SBfK1z1uPXfvy0MIB8_CqK1F0RDUGFWF2kDbuF7A6LtCHL3yry5CIDNNpUeIYA3u9--8UkhMsfnK4wbwnu69KWeDiAePEp2QxFSjsuH8_hhmRC39g', 2),
(186, 93, 'ckpswOAUnvw:APA91bEJdDbip6nIPjezPiQ13mzqhRk4fPFlN-eB6EfcDAWmlE8ZQNAwY4AbCaVJ09l0GKirwgLjVGnkz4iQdakDykStjJTqHNlB5ZPE3jJUgT_BZy3OtMARsJ6IhBikcfDpf2EvFR-2', 2),
(187, 93, 'cp24LNwFSRi9xLxrf4eYm1:APA91bFA6Hb1Rx7PX5mbeUOWAa-bOetokXxT70z64wC3Hyw3pwC9KwNfI1YevBZMlBDQHbtfkdr4E1SDPP6p_9Asn4XRHQXrylfr2eysbZ8z47D8cRBYE2JbHj7Hu59gK7e3XxAkQ-zE', 2),
(188, 66, 'cZe9dczPOUUPsN4QQThTcX:APA91bHw9acsLy7CQhR3WFvi_uze6IgDmDSUiSeAJKR9gp_PgavQUDOIdtuN43iszDEeMVHg7Iv8xxDUOs0xSD_bRuEKsUKqtDAux2DPLAOpkU3inwAWcPp_pgN-Y_1XWAm-o_-hKI6N', 1),
(189, 87, 'c1FokbPEl6o:APA91bHhMoveFJkKGK7J7GyZOY83TGSoL3jF5LDD8gVk2PGhIDcWmJX3Kqc3jXxFFltQX91qeBXzddwmV022lvzdmMky73ZkNmW1SyvYoTtm6WwUUsJo-79cwMevM4wyIiNqCmZXBxDN', 2),
(190, 95, 'e28qKkdyDac:APA91bGCRSrXU1gHXKKbzHLymd9NkOIAecbKFYvOfhjRbaJl-RtJhGx9AINlfxaTkRvMPrYp8bbZEP79OLEs1ex-95Onucn9oe_e2ODwLaoglohM-ejIoLhZUl2a-iQoqiMMFD_erWbI', 2),
(191, 94, 'dPpNgSU2DGs:APA91bGkofXqfwdPE4tx7pQk-VqbMctLznuiLvEG6b0_Bs9_BqGpxxL8UqNzY4aUS3BCqsC8oRDLYTTUWDPlK93ifKZZy3gjTSkM_uynU9v5Ay4wgtsP6jOyVwSCCFIBDEL0TRMcxkaM', 2),
(192, 72, 'fnEzozqDz04:APA91bEmYd7VYuOGV7R8GKpAJKyeNWNOmCw6TSzPOCFMyOungu1s4rfM00Zm3tPJGBMUxW_RyWiIbIpsGjidqKrkZP8fcbHXXWXoFkYew8NE7eMyUnw6VvbuD6cc05-D5Uz3zpzm_y8w', 2),
(193, 78, 'c0kTn0Sq3WU:APA91bHbdRVfs1-h5TEnc1xmE2xCEb5SwOBEMit2H_RtVrZzv-D5aKdeXClxRGgO-J1dik_DHuc-YtBHGHRJX_nBjKm3yGhCmb6gaf1cpX9tOsLRCpj5Hi0JBg0bMFl9YLqSD_bAzoP8', 2),
(196, 99, 'cp2tNXLJiEg:APA91bED_-v-iG8HZsp0274oCmQ-OzWqhFKfj0wHsOBBr-XaUzuxUBT10B20Ox1ni-gSXQe8iwbMIoz-nfZrt0Yb3iirw-8QU9I74unFCBYTYzrnaa8iIYeV8u5Fx6GmUluXlaplC6X4', 2),
(198, 77, 'fyedLmhk9kgesXo9tSa9lE:APA91bF1mKQSa3dl0haDaaO2tsYwfWKnzRc5bGMbHc9_MflnXnNsL6N4CaowZQsg_ROu7jXhAd_wPQFGaNmbWq4RwwpXMVVI3CPCzS8FPfGzxrY5ujjpAaWWdvp6Y_FA1JNqRqOjqC6D', 1),
(199, 77, 'feiflmLaR0dUqMYj2s8wsu:APA91bGdIJl7ULPeaWZaKlAWiIkygGKAZYbwhBqE_Ra8HUV3X2pSbCqKf6A6OpMhGmqM9pffxUJF15AKIBtzSxZQYu_zwqccQqeCTLemq8eeKuozRv-SsPh1vy7JdAI1u5y1pojX0HYu', 1),
(200, 77, 'feiflmLaR0dUqMYj2s8wsu:APA91bFFc2mqWYm2bZlNmTg5oGgw95B9XKVqByPPrLyR9-Xm8mQMXs8ctc0IoFaQxeRd0IN5K3BBVVNupgQPWBNmvMADCIslx-hlHz39FPhNkbXPGQTMhpH8lT3x4qT1mr6X5ptBicvg', 1),
(201, 101, 'f4_xGO60LkU:APA91bH2NYkN7_gGNKBfBpa5689GXWFjpYnFmLJZtSQfDsebFNatBBAuUA5s5Eh0KU114YUWM67QTXvrcCnQk4RRmMFYd4k4Qrvp2KJhzZVw6mbR_2bVShx8WzzxuEAlMwiYF__4t3vP', 2),
(202, 89, 'e5FZzKVJhdg:APA91bH766BrH5N_L-GU6-lHuBFyXAxlD6JJh7mv5X-iGZRYTYteSy8h1zin2o2p0Mear83Lc-6P3fF5d5XTFqba_-12uk0bl7g-LNyJ-KVMoHX8UC_aPZgs04zs8_kVS-dB9641-gY_', 2),
(203, 96, 'cUu3XBZjlPw:APA91bFA9vzA1HZL44hSWJznKgyTsV9G8kPkUeH1VBwIg2gkVbj7X58-I-7c3ODgeqGw-CST5T43YLFU-139CNbLx-Hb_94vAPrP49STxNOQrLqCz6_HAix59m2U7MLKmjNijT0f-Rfb', 2),
(204, 103, 'fwuTyF04XAI:APA91bGLeuy36oGFr4SOkM__BW_jw-2gXVnZ2ww4NQDDacdDt2iXkn4z1qqUNLKIjBu1a2dUCl50xn4aUQ4IfoUe1c_-z1JGxFZ7yD50Bk38J3-MvCRTxW-2-bEGLjdfn5Gauvk9UI4h', 2),
(205, 104, 'flVeawRGdkeLmPgKEHKN0U:APA91bFTs9SNtwtNKhg9YVkk9tPGLjxaT85VfMnKsSt0RsaBE8AGWviyq-nNO5jEdhOpqS2JFcTQksVhs9WsiC5WWNzJVarkYsccpzYwer7PreTiC8OTdQSsEkcnzMZMIOnOPth1tiMe', 1),
(209, 110, 'd9AkiFuuTUKrQ0foKzQp9A:APA91bHqTNKsZzhnykPKPZzQvrjyR2b26--DJVrjfSit5lKQwijaMCDNs7GA_FwNyq6oIhkwpUMefpm1go9XP5V50_UpmQw2cQWILZRH-up4I0zsUTkmqTAlpL0V-AE5Ivo6vlQGjkHe', 2),
(213, 115, 'epSNIXRQ3wc:APA91bHj3w3crIr48GQWSI-j_f6DokbD8Kn0p3irSZEIZvIvlDbyL_sLEHvRhrr_aaB-xeO3AtrR_nMou4-R-021J8ZSlnMOdIfIgJL-xWw1w_fdA5KuiijDg6Dg9W9THBeAdvNLG9_R', 2),
(214, 116, 'f-c_ObG2OZw:APA91bFWxrHGMwfy_mohQzxAR_sZYG4eMk3jhct5uhmVdi_Ny0IC7ez2YxFtLFhLIs4eIdTp6uqGN7g6JGXdp1rFJxuFTQB8JOrcmvdk4F0B_iK3boPuicn3qfX-KTiHGA2U-ZOphJF9', 2),
(215, 102, 'cWM4Hh3Zd0w5tZgxF7U90A:APA91bHCjPuhcNX3n3eeQyhEq3Xa0tawOT6hstFagzdUDw4le1CvaasubUlmufK78kRPQMjd1eSfrc2D9dgTp2X-tqxDJuSjqPWTrhXQR-bTiJQ1yP4n9BpAAkhISwn6qXwN8qk0D1Mt', 1),
(216, 102, 'cWM4Hh3Zd0w5tZgxF7U90A:APA91bHCjPuhcNX3n3eeQyhEq3Xa0tawOT6hstFagzdUDw4le1CvaasubUlmufK78kRPQMjd1eSfrc2D9dgTp2X-tqxDJuSjqPWTrhXQR-bTiJQ1yP4n9BpAAkhISwn6qXwN8qk0D1Mt', 1),
(218, 118, 'd2xK-3TBq0BmuX_lmJpwws:APA91bHUqUGz-MWe9y8COKctEFEMS0Nl3QhwfmU_WmSjINLudt5uVjWB5H2hNtLm3tRzUtwBDiPMhjExiBwglhgQjFNF9i-50tWfTW19OYJ4bv92bAqEFmXkiHEaaQf_6bjotysWEVDB', 1),
(220, 121, 'ch1pfZtOLhM:APA91bEk6xDnjKvx8fpRjk2iD-emd_CX9GZS1V8pc7fP4MibLttMhSvAHfwF4lCC9VmOLxHZDMk5kmzNBJWOFQo-Lfa37TOU7caElvyAIMaaxPBKL8cS1VIUF-82EFF7VtkhAODSvdsQ', 2),
(221, 122, 'dH0YF65wRbA:APA91bG45MWXGWp2NgnM9KyTr_Ct2hDipkWTdjIMo5x0wGl5RunK0EsrT1wbwXa9S2Tl0Bm6Lc7ToqMFxWa9WRh37VYLkTE-Ec7j8lhEas-SElOqWM7GE4RFqfGAnTOv9eyVI3Rm8SX2', 2),
(222, 124, 'd6wo0giZG9U:APA91bHSwaXE4U5cLmrURXnu4OGoZtpF5tID94yuxjW-lAtZN48H8UTXN4FxQ5O3meQJpPsCICnW0c5gI7WY_64yiu2hiNMqXRHpHKZ_DH5jrrwsDyM-J948XUq1-Wa955FwSKuwhm6u', 2),
(223, 108, 'dReGvg4iVFM:APA91bFnhJhge2cWk9M_BNzxpglYhxqSdkR22TQc0fLfzM2FT1btIEBvMYxUYKsGGnPmBt7_rm-3wI6Y4mrXIO8nKq7rylzypqjImwh8RPImN1X8jgrFTW0DZbm0CGB8ZVotkdqc82tg', 2),
(224, 65, 'fOLf8sH-CGM:APA91bHq5p7xtUeFOpGPS6wUaf28hV73okosrM5y3bCaG1WbUzJCqq_NYmUiH50sfbX3AaFFzh9O4M-JkvOUD_2rO7o1bhU1cbQTdLPB4_Uteib56g-dOZhIHw3NkCyuYTOXLobHMh9Y', 2),
(225, 125, 'fgoAdTOpaUUqoycNtofEVe:APA91bEYpNykxVIpGEoNxTGB5MgeOo5bvLObGFnJMfOo8o1QhS4OQWP7xO57mIZZcmmRtRNP4QWz4rghwfbAsyWUFoigMP3Jj2nrKE5IIW9-dvDQd0ncZFuRYL5BSSfqLuGmwDOu08C5', 1),
(226, 127, 'eR3wzUJwekw:APA91bHbwhxxuSzNKrKXYicG2aUkudQjIBFYJwyYPN5Dd7bP3zkKxg5u7uuObJkDzVU_JaMMOXtYSlw1SD73BeTgopvy2STR9BAtlzbjQhQGAi4Huc4_FUZKSgpl837krNAUoriGNKrh', 2),
(227, 133, 'cKAnJzNmr1c:APA91bHxVyYKhxIG_qrCHLPOODtHoS6EOliLD5glUmL1KjHt2HRfEVpdbZj27rRfajvYeuC1kh6j-z14CwukCzfq1taxtT_YRXqemZJJqyq9ZfxprLnFq6Vdq4UKI0dANH9zSrIKlBsS', 2),
(228, 134, 'e6rstGbHd9c:APA91bEaP0FA9ftz_QFHCkH51p7Uha1G41mCdXhz5NJzrvpvC-805S_gAeipJl88Hzvk_E0x9k2PH_CGkY-dhzSM-h0j-TkNYhlWf3nQPDd2M0jYFyDUw2XZQW9hHgX2fpSEuRs11DAx', 2),
(229, 129, 'c_FIAthdIqw:APA91bHqRehD6ZbYNA0XNd2uqJCLXowo-H3dli554zkE0vdyiLNCKmgDyeRSkTmLPrwwu4TGkVQ4oCfeLcOOjkRl3jrt0LZsqp3WioxFb7IFUqw0p3zMD3p5GMklYZHGLdSIXX0WQuhj', 2),
(230, 131, 'fNZT80eKsHY:APA91bE2ANcxmzadPjA9mjcGjWbTCnsmj-tTVal-0RgCaBYJREoBG6ekAd2SUklSodST90Za4rLTn8vQojAezHHv_raMO3GNkhNu_WLYsX7OHhFTRMAyKiLBbme9hnnJYz8KDRmNBS6U', 2),
(231, 130, 'eMsa0cn5k88:APA91bGdsS0X5MHBgaw7GS6aCw6TPpI85_OENlDfrKGKlojs_pDiiBTOVLA5DlhdNBRBQnBi7LPDI0IHpSbBXfWXif94vy1Tt3upb51t_NChU240XhqHWM4hiikv3UrTaNezgQ0SMgwn', 2),
(232, 132, 'dUlZf5aSOgk:APA91bFWwyfIHVqtPffa5zbezB7Fr4Md5waYcGtfo-DZcZSl6u7tbMe1M4DfeOKauLVlz-QvcxSqYqrdv83xs44niA81MSSG2e4xgNUYcduhGeKJ0UHhTQBmwcc4fto4y-JitfralwZ9', 2),
(233, 135, 'fTzl58gNfTs:APA91bFcCgzlGAbehPhms4rwryuePcpakR_uEi9Xm9ApNOw1Akq40VVI9AWa19iOPlctSwM74P1TSyb0VVQ7SdndlzFFAkYIdWGUD54zIJRxbx-5nv8BP0U54yboH5YEM0r5LyKC1HlT', 2),
(234, 137, 'dLIQUy5OYEuolXXdPGtdvo:APA91bHUVwc2sQAtJLiTdQJ-KLSlHsMjAVpf0h7pvLWAh0s4Et3JyzyB6aKix9J3XkGgZes0VJmcbOPz57HC1uvfcja-PrECNf02NKaOLc7JY-QwU7I2eMt039BkCvnluuZwS-KsKG1t', 1),
(235, 138, 'dUOOhWFOqkF-nNy5hk5d1Z:APA91bFV1U2d_YwGHOfXZC3TvneCqa8AavNErNQEwkbDRVjzWOgzBxIKmrQV6s2X2WN7tXv7M6csUPqAvAVg-8dSEfV2yaYGaHm5XHYIszkUvJyPN5eqk9SuCpoIX37pQSKkjNN6RsSN', 1),
(236, 138, 'dUOOhWFOqkF-nNy5hk5d1Z:APA91bFV1U2d_YwGHOfXZC3TvneCqa8AavNErNQEwkbDRVjzWOgzBxIKmrQV6s2X2WN7tXv7M6csUPqAvAVg-8dSEfV2yaYGaHm5XHYIszkUvJyPN5eqk9SuCpoIX37pQSKkjNN6RsSN', 1),
(237, 77, 'ehEk89g9XUCRp28ZkdXBSJ:APA91bFLHS6Dd_FysJFEybCUUgFby4q7fOXFSNb85t69VKNLIdypcUc6gJucPB-ZGV6dx_J7CF4tHMkgX8WY4AxN85NmKR4OseYQL8X04OG_42yAXJVsdzziAO2hzkKaXEaOwZrYbjLg', 1),
(243, 19, 'eNQWGj8foIw:APA91bH4j6JRPlEbLE_TX4OFzC8crgvJBM_B-MzhlOADLAevtc1Q9LYdA1XSYJ-qfT16kJWf1lVx0IV_384Uqthyo-0lCYz9V2us3WcLFMap2xNvUsqbACSiYXtlUX3SWlftmTFSUODs', 2),
(239, 100, 'fCmSutgE70XbneioXb5ylS:APA91bHA85SyC-0haKDkkk3lE_GjUXOpQeNmN9K_iqOB_w1uf02Yqg25iM_ixZaMk76SxCP4hJynw7RcFQ1k7BuvlZ4LHAWPCOCflH8nlhT9jC6bNJdbWqvqm3gQXXT6YhXESZ8PWVgB', 1),
(240, 71, 'fcDmcHwnzEwRpLM6JGmJ9Z:APA91bEQXLTJa-lGHUAFUpsKIf_bOquQ05D_w4UoMjS3PUHeHUoUe8jP8pw305nSdIHP_pWYddtZt1-b3Y197GaCls-jQ9xUd_a6IGboWabVBwBoeunlLhkJVVrq0ci23qzG1uBh3TYN', 1),
(241, 71, 'e10JVd2l6UeGvKDb-zi-yv:APA91bFCMU0lANsvvi7fIUDdgDUUCxnddfVgyrT4uuDXAmSEBz5bgNZKpxV7JAUyCthAHYfnaQKPse2m_Qhb7E5cD98BP97_yNg-FO-ARWeGldaovwf8p0TWXiHlYYlfFZDZZ16i-Bs3', 1),
(242, 140, 'fWNJw7lHIqo:APA91bGHKbTAO4evdmql2xespb8RCStrNFZBQbCVtYZQxoR1qZx3-ISu-FRgjA6DzZNi6WMVqU3Bwny3h4KBjZbFyMFRr3mbBRxM8ZoWbLLvr8sN1rF_TsonAlpD88QrRoNOpkvhDYAX', 2),
(244, 19, 'eLoqGZsnSby7aw5MmLX4G9:APA91bFAY8iRE1mdR5nmS5tmkx4cQkh4pg1oJrsqH8hGamZxFF-k64pDUQdWSsIKzcftGPROMbsFC4ZCrFxwPX44IX0qiArg_GqhHsqqc0kAi8FcZeSfQOdGk0bSN82d0uBGtN53xrHG', 2),
(245, 141, 'cQ4RUJTegUvrsu8EGd_9da:APA91bEmLs4iJf_G4wuczf2VL4qy-5J98jjjlyTp8-aUCn2f-UADx8z-ZdAaSCte7bS2CfQa404OAp82bu65HzvZc91cUwmqwhadzhtuc8P9MbXHd4IlMVG6CDb3ncnuhNz1TrndjeVc', 1),
(246, 141, 'cQ4RUJTegUvrsu8EGd_9da:APA91bEmLs4iJf_G4wuczf2VL4qy-5J98jjjlyTp8-aUCn2f-UADx8z-ZdAaSCte7bS2CfQa404OAp82bu65HzvZc91cUwmqwhadzhtuc8P9MbXHd4IlMVG6CDb3ncnuhNz1TrndjeVc', 1),
(247, 142, 'coWC4DGhBktMtqCcqTS48p:APA91bH21nPZr_TiY2KmrWWVVMQ4OyyeizK4DV04a_KWBAcyJPlFWC-BZl38Psf0UPlL7gv8iu0wqbVakCFNw2LN_cLXkaB3j1x-CoH7axG428SFmdrdykccx-uD9T6-CPmha4KZ5dwS', 1),
(248, 143, 'f9VHMhEMUEdvleKozksZbo:APA91bEtuxym2cy6KNdjTVzs5_9Bkodwm915b2J61a1rUsSL4XJpLIf924QD3EGEJHY8XAe9G33F-6FW1Uzil5utppmyAHDj7yinfhDOxvpmIddEzg8LZkDFuNxwtfcih217Dm1q5LYZ', 1),
(249, 146, 'dNoWPTIhx64:APA91bH7E5GHZuht_FEOIDO5ekLCVf_8sov5B47fxKDPT7LWVFp5ShMotl0lBgUi-tGGnzt7dswebcJVteq7OIJ5OFEDF6Q_L9lAVZbTXkbb-ePQRkWokuNqgNa2r22gLb9zgCMH9eMm', 2),
(250, 97, 'ef5F3p_cZE06jqXJg_V4X6:APA91bHXq6o80dMoVha7LMqlCtI3cGvTXsz97qk3vs5A_4HS2EgJ3vvlV23TwTTpoar7fO3X08DcuF4A0BhcOg8tepbwiBJaFBnxOjkb2a6RkG3DMQ--9fr2BOsSgncT3S_3Q3-84huE', 1),
(251, 97, 'cf5tq4bVokFQnDby-Iei74:APA91bGCE37BImMgRFGX6eGZT7SC5TA94eJJZZ_59JfofWQTZkAnC6AoNMxt7Z0i3G3sa6v-bt8KR7GAiYLFjVs8mvsocvpQ0oJJ2_fy1RH0TB8Fl_1XGdZcOV1jlzAhEGFzi-VmNnTf', 1),
(252, 148, 'eKZoH1Bu96Y:APA91bErc5BMRXKAfRICPlBRPb2za63bcvxy9yU7ZcPNy56dgtdIg-PkXf5jHdKvRLEagZfmo6ED7b-97iEdASpuPtW9qjV6mImWqFp644ZqnM151iF8ZeyLfORS-Y9AS4e9ZXgOp0mI', 2),
(253, 149, 'fFrWM42oUz8:APA91bEgqEPt8QTQ2gHaL7N8bMjBFk1jq6mqnvslU8ETtTE80ys4Xz-MCeKbUSH9K1I2iiug2Ja_LPF068dvC074Kl45E1w4orTHtJ5zOLzHEVKJu_9jpV604qZUKnR8uMEei8XVlRqJ', 2),
(254, 150, 'dJR1BaCG4ek:APA91bGjsuHUfGXqpj5qVRNZwjyCIbD1mXq1N_-lCtVx5GKt3hZpopdVqINbXee5eAAvUtgVLrqQLfcz-koGLrAx55LUo2JG4Kqw_G9bzi-V1YTg4ziTawoCDd8wDg5-Ea_qf9aJfYri', 2),
(255, 7, 'fJ99M3-HWEs:APA91bF-9rMozmhDjKkArfVjUoW05eZNjFfTOIsww2BPLSYC55RNFXJa9cnAPBUjvG6AKMlCoYWHy62Cl7y2fb3RGkGfkOn02HP8Xuhuog6nEXYkj4Z-imZqcC1vZzpF3YbZnz3LUTL0', 2),
(256, 1, 'sdafsdfsdgfsgfsdhdfghjdghdfhdfhdfhsasa', 1),
(257, 18, 'd7wHJx0IOnI:APA91bEeI_OzThjUy6t_uuOK7XSp5aJV5J14-NGqNI13qRpasDudX6Gwg_hg51k6z8XWDA2_A5qK9_u6zrB7vOTYUEDW-qh-SBYM-LfzLSgrD6hM9XKyv7ZWUfiJswsoP__7ClSrl2sz', 2),
(258, 101, 'fFErMZ23sAo:APA91bFiUlznQrTaLPP8o578IrEW_KGTI7yYqvYZkIcsoIfY03avEERHllQv6xFzdNv-JHNf4FhAl1YC9aAw3s6IMuz0pme_-y_OgwKRFr_8u5rXOtyGQuSwbcxf48qqY7roqSy9ipt_', 2),
(259, 159, 'cEXXYzkVd0y1pLtglEBsbJ:APA91bHfrPJsqpwGuI_s7ZFRDGYH-hi4hg5qLUO_PGgIe_4pSvz_kgiz-5JymFQja74KKsck38fZs_067lpubXcVVzaWD1B4Ug0E9526zpHvq0CikHp_6nR6UU_I9InSkp5X9GiUnSmz', 1),
(260, 159, 'cEXXYzkVd0y1pLtglEBsbJ:APA91bHfrPJsqpwGuI_s7ZFRDGYH-hi4hg5qLUO_PGgIe_4pSvz_kgiz-5JymFQja74KKsck38fZs_067lpubXcVVzaWD1B4Ug0E9526zpHvq0CikHp_6nR6UU_I9InSkp5X9GiUnSmz', 1),
(261, 161, 'ftLpFKWFdqQ:APA91bGlcy7XoejCjpUJgZ1caC41s2jvyGkkJt8D40il7oAmsDljs7YI7cgP_TSGHP4qTz5PhEDMY2wWngp_SE7t5ZJI5lGcVpNGZaElXH4_KAbbqFYFOLQfqyIJcdK4If2VLU9pLhzb', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forms_setting`
--

CREATE TABLE `forms_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_num` int(11) NOT NULL,
  `world_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fild_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms_setting`
--

INSERT INTO `forms_setting` (`id`, `order_num`, `world_key`, `page_link`, `fild_key`, `value`, `available`, `type`, `is_valid`) VALUES
(1, 1, 'website', 'main_data', 'website', 'http://www.daystar-mea.com', 1, 'text', 1),
(2, 2, 'ar_address', 'main_data', 'ar_address', 'فيلا 381 التجمع الاول المجاوره السادسه القاهره الجديده جمهوريه مصر العربيه', 1, 'text', 1),
(3, 3, 'en_address', 'main_data', 'en_address', 'Villa 381 First Settlement Six neighborhood, New Cairo, Egypt', 1, 'text', 1),
(4, 7, 'phones', 'main_data', 'phones', '00201000399408', 1, 'tag', 1),
(5, 8, 'emails', 'main_data', 'emails', 'info@daystar-mea.com', 1, 'tag', 1),
(6, 1, 'ar_about', 'about_data', 'ar_about', 'تعتبر DR CARE ميديكال تكنولوجى إحدى الشركات الرائدة في مجال الأجهزة الطبية التي بنيت على أكثر من عشرين عامًا من الخبرة وحضور قوي في منطقة الشرق الأوسط وإفريقيا.\r\nلدى داي ستار ميديكال تكنولوجى رؤية لبناء شركة تكنولوجيا طبية رائدة لدعم شبكة تواصل جيدة التنظيم بين المصنعين من كل العالم والموزعين في منطقة الشرق الأوسط وأفريقيا من خلال وجودنا في دولة الإمارات العربية المتحدة حيث يمكننا النظر إلى الأسواق والموزعين و القوانين المنظمه والتسجيل المحلي والمنافسين ومن خلال وجودنا في إسبانيا حيث يمكننا التواصل بسهولة مع الشركات المصنعة من جميع أنحاء العالم.\r\nتتضمن رؤية داي ستار ميديكال تكنولوجى إنشاء شبكة نهائية منظمة للمستخدمين ومقدمي الخدمات كهدف رئيسي لمكتبنا في القاهرة من خلال موقعنا الإلكتروني و / أو تطبيق الهاتف المحمول  لخدمات الرعايه المنزليه\r\n', 1, 'area', 1),
(7, 2, 'en_about', 'about_data', 'en_about', 'DR CARE Medical Technology is a leading company in the medical devices field that built up on more than twenty years of experience and strong presence in the area of Middle East and Africa region.\r\nDaystar Medical Technology have a vision to build up a leading Medical Technology Company to support a well-structured manufacturer and distributor network in the region of Middle East and Africa through our presence in United Arab Emirates where we can look at markets, distributors, regulations, registrations and competition and through our presence in Spain where we can easily connect with manufacturers from the whole world.\r\nDaystar Medical Technology vision include building up a well-structured end users and service providers network as a main objective for our Cairo, Egypt Office through our website and/or mobile application for home care services \r\n', 1, 'area', 1),
(8, 9, 'logo', 'main_data', 'logo', '0', 0, 'img', 1),
(9, 0, '', 'main_data', 'facebook', 'www.facebook.com', 0, 'social', 1),
(10, 0, '', 'main_data', 'twitter', 'www.twitter.com', 0, 'social', 1),
(11, 0, '', 'main_data', 'instagram', 'www.instagram.com', 0, 'social', 1),
(12, 0, '', 'main_data', 'linkedin', 'www.linkedin.com', 0, 'social', 1),
(13, 0, '', 'main_data', 'telegram', 'www.telegram.com', 0, 'social', 1),
(14, 0, '', 'main_data', 'youtube', 'www.youtybe.com', 0, 'social', 1),
(15, 0, '', 'main_data', 'google-plus', 'www.google.com', 0, 'social', 1),
(16, 0, '', 'main_data', 'snapchat-ghost', 'www.snap.com', 0, 'social', 1),
(17, 0, '', 'main_data', 'whatsapp', 'www.whatsapp.com', 0, 'social', 1),
(18, 0, '', 'main_data', 'dribbble', NULL, 0, 'social', 1),
(19, 0, '', 'main_data', 'pinterest', NULL, 0, 'social', 1),
(20, 0, 'ar_client_condition', 'terms_data', 'ar_client_condition', 'عند التسجيل للحصول على حساب والنقر لقبول شروط الخدمة ، فإنك تقر بموجب ذلك بأنك قد قرأت وفهمت الاتفاقية وتوافق على الالتزام\r\nبالشروط والأحكام الواردة هنا\r\nأنت تقر وتوافق على أننا قد نقوم بمراجعة وتحديث الاتفاقية من وقت لآخر وأن جميع التغييرات أو التحديثات على الاتفاقية تكون سارية\r\nعلى الفور عند نشرها وسيتم تطبيقها على وصولك واستخدامك للموقع و / أو التطبيق\r\nباستخدام و / أو الوصول إلى الموقع و / أو التطبيق فأنت تقر بأنك\r\n(أ) لا يقل عمرك عن 18 عامًا\r\n(ب) لك الحق والسلطة والقدرة على الدخول في هذا الاتفاق\r\n(ج) يحق لك قانونًا الدخول في هذا الاتفاق و\r\n(د) لا يحظرك القانون من الوصول إلى الموقع أو استخدامه\r\nDR Care خدمة الرعاية المنزلية\r\nيوفر الموقع منصه للمستخدمين لطلب الخدمات (مزودي الخدمات المحترفين) وفقًا لشروط هذه الاتفاقية\r\nتقوم داي ستار بتقييم مقدمي الخدمات لتوفير الخدمات بشكل عام للتأكد من أنها تفي بمتطلبات تقديم هذه الخدمات\r\nيطلق على خدمات DR Care وخدمات مزودي الخدمات مجتمعة (خدمات) ولكنها ليست خدمة إحالة أو مطابقة أو تنسيب ولا تقدم أو تشير\r\nأو تقدم أو تعرض أو تسعى للحصول على عمل أو ارتباطات لأي من مقدمي الخدمات.\r\nتقوم DR Care بتقييم كل مزود خدمة على النحو التالي: 1- إجراء مقابلة مع كل مزودي الخدمة ، 2- طلب فحص خلفية لكل مزود خدمة\r\nويمكن أن يطلب سجلًا جنائيًا ، 3- فحص جميع المراجع المقدمة من قبل مزود الخدمة ، 4- طلب التحقق أن مقدمي الخدمة مؤهلون للعمل.\r\nأنت تفهم وتوافق على أن عمليات التحقق من الخلفية التي ستقوم بها DR Care تتوافق مع جميع قوانين وقوانين البلدان\r\nDR Care ليست خدمات توظيف ولا تعمل كصاحب عمل ويكون مزود الخدمات في جميع الأوقات مقاولين مستقلين\r\nأنت تدرك وتوافق على أنه نظرًا لأن DR Care لا يمكنها التحكم في سلوك مزودي الخدمات ، يجب على العملاء ومقدمي الخدمات حل أي\r\nمشكلات أو نزاعات أو مخاوف مباشرة مع بعضهم البعض ، باستثناء أي مشكلات تتعلق بالدفع، والتي سيتم حلها وفقًا لقسم الدفع في هذا\r\nالاتفاق.\r\nأنت توافق على الإفراج عن DR  Care من أي مطالبات أو مسؤولية قد تنشأ عن أي نزاعات بينك وبين مقدمي الخدمات\r\nدون تحديد أي من الشروط والأحكام الواردة هنا كشرط للوصول إلى الموقع واستخدامه ، فإنك توافق على انك\r\nلن تستخدم الموقع والتطبيق الا لأغراض مشروعة ، ولن تستخدم الموقع والتطبيق لأي غرض يحظره هذا الاتفاق ، فأنت مسؤول عن كل\r\nنشاطك فيما يتعلق بالموقع والتطبيق ، ولن تستخدم الموقع والتطبيق للتسبب في إزعاج أو إزعاج و / أو إزعاج ، لن تحاول الإضرار\r\nبالموقع والتطبيق بأي طريقة كانت ، ولن تستخدم الموقع والتطبيق إلا لاستخدامك الشخصي ولن تتم إعادة بيع حسابك إلى طرف ثالث.\r\nمقدمي الخدمات والمواعيد وحسابك\r\nتتيح لك إحدى ميزات الموقع والتطبيق طلب موفري الخدمات في الوقت وفي اليوم ، بعد أن تسجل حسابًا ، ستتمكن من إدخال طلبات\r\nالمواعيد وسيتم الاتصال بك من قبل مزودي الخدمات المتاحة لوضع اللمسات الأخيرة على هذا الموعد طلب يجب أن يتضمن جميع\r\nالمعلومات المطلوبة في نموذج طلب الموعد.\r\nمن أجل تأمين موعد رعاية مع DR Care ، يجب عليك إنشاء حساب مع DR Care ، عند إنشاء حساب ، فإنك توافق على تقديم بيانات حقيقية\r\nودقيقة وحديثة وكاملة عن نفسك ، وتوافق على تحديث معلوماتك على الفور إذا كان أي من معلوماتك يحتاج التغيير من أجل الحفاظ عليها\r\nصحيحة وحديثة وكاملة بما في ذلك التأكد من أن لديك بطاقة ائتمان صالحة في الملف\r\n\r\nقد يكون لكل مستخدم حساب واحد فقط مع DR Care ولا يجوز لك إنشاء حسابات متعددة لفرد واحد ، إذا أنشأت حسابات متعددة لنفس\r\nالشخص أو لم تحتفظ بمعلوماتك دقيقة وحديثة بما في ذلك وجود بطاقة ائتمان غير صالحة أو منتهية الصلاحية في الملف ، فإننا قد نعلق\r\nوصولك واستخدامك للموقع ، وإلغاء تنشيط حسابك (حساباتك) و / أو إنهاء هذه الاتفاقية.\r\nأنت وحدك المسؤول عن الحفاظ على سرية حسابك ومعلوماتك ، وباستثناء ما يقتضيه القانون المعمول به ، فإنك وحدك المسؤول عن أي\r\nاستخدام لحسابك ، سواء سمحت بذلك الاستخدام أم لا.\r\nالغرض من الموقع والتطبيق هو استخدام الأشخاص الذين يرغبون في العثور على مزودي الخدمة وتحديدهم ومراجعتهم والتواصل معهم\r\nحتى يتمكنوا من تلقي خدمات الرعاية وأي استخدام لهذا الموقع والتطبيق لأي غرض آخر (بما في ذلك على سبيل المثال لا الحصر يحظر\r\nاستخدام الموقع أو المعلومات التي يتم الحصول عليها من الموقع للحصول على مزودي الخدمات أو الإعلان عنهم أو الاتصال بهم أو عملاء\r\nآخرين لأي غرض آخر)\r\nأنت توافق على إخطارنا بأي استخدام غير مصرح به لحسابك أو أي خرق آخر للأمن المتعلق باستخدام الموقع والتطبيق. على الرغم من أنه\r\nيجوز لك السماح للآخرين باستخدام حسابك لمصلحتك ، إلا أنه لا يجوز لك تعيين أو نقل حسابك لأي شخص أو كيان آخر.\r\nنقوم بجمع ثلاثة أنواع أساسية من المعلومات والبيانات: المعلومات الشخصية (مثل البريد الإلكتروني والاسم والعنوان ومعلومات بطاقة\r\nالائتمان) والمعلومات غير الشخصية والبيانات المتعلقة باستخدامك للموقع.\r\nالخصوصية والأمن\r\nتهتم DR Care بخصوصية مستخدمينا ، وأنت تدرك أنه باستخدام الموقع والتطبيق والخدمة تمت موافقتك على جمع واستخدام والكشف عن\r\nمعلومات التعريف الشخصية الخاصة بك والبيانات المجمعة على النحو المنصوص عليه في سياسة الخصوصية و لجمع معلومات التعريف\r\nالشخصية الخاصة بك واستخدامها ونقلها ومعالجتها في بلدك.\r\nأنت تفهم وتوافق على أننا سنجمع معلوماتك الشخصية ونشاركها مع مزود الخدمة الذي توظفه من خلال DR Care. سنشارك معلوماتك\r\nالشخصية مع أطراف ثالثة فقط بغرض توفير الخدمات التي تشتريها من خلال DR Care.\r\nنحن نهتم بسلامة وأمن معلوماتك الشخصية ، ومع ذلك ، فأنت تفهم وتوافق على أنه لا يمكننا ضمان أن الأطراف الثالثة غير المرخص لها\r\nلن تتمكن أبدًا من هزيمة تدابير الأمان الخاصة بنا أو استخدام معلوماتك الشخصية لأغراض غير لائقة.\r\nأنت تقر بأنك تقدم معلوماتك الشخصية على مسؤوليتك الخاصة وكما هو موضح في سياسة الخصوصية الخاصة بنا.\r\nقد تتلقى من وقت لآخر معلومات شخصية عن مقدمي الخدمات ، على سبيل المثال ، عند تأكيد موعد الرعاية ، سيتم تزويد العملاء ومقدمي\r\nالخدمات بمعلومات الاتصال الخاصة بكل منهم ، وقد يتم استخدام المعلومات الشخصية التي تتلقاها للغرض المحدد الذي تم تقديمه له لك في\r\nاتصال مع الموقع والخدمات. لا يجوز لمقدمي الخدمة الاتصال بالعملاء ، ولا يجوز للعملاء الاتصال بموفري الخدمات لأي غرض آخر\r\nغير طرح سؤال أو تقديم معلومات أو اتخاذ ترتيبات متعلقة بموعد رعاية.\r\nمن خلال تزويدنا برقم هاتفك المحمول عند التسجيل في هذا الموقع وإنشاء حساب ، فأنت تختار صراحةً تلقي الرسائل القصيرة والرسائل\r\nالنصية منا المتعلقة بالموقع\r\nالالغاء والمواعيد الفائتة\r\nبمجرد أن يقبل مقدم الخدمة طلبك للحصول على موعد للرعاية ، يمكن إلغاؤه في أي وقت قبل 6 ساعات من موعد بدء الرعاية ، على الرغم\r\nمن أننا ندرك أن الخطط تتغير ، إذا لم تتمكن من الوفاء بموعد الرعاية او لم تكن موجود في العنوان او في موعد الرعاية الخاصة بك أو\r\nالإلغاء في غضون 6 ساعات قبل وقت بدء موعد الرعاية ، سيتم محاسبتك على 75 ٪ من المجموع علي أساس الساعات المقدرة أو الحد\r\nالأدنى للدفع ؛ أيهما أعظم\r\nخطة الدفع\r\nيجب عليك تقديم معلومات عن بطاقة ائتمان واحدة صالحة على الأقل كطريقة دفع رئيسية مقبولة وبدلاً من ذلك ، يمكنك استخدام خدمة\r\nفورى أو فودافون كاش في مصر\r\n\r\nيجب تحويل جميع المبالغ المستحقة في الوقت المناسب إلى خدمة الرعاية بمجرد اكتمال موعد الرعاية وتأكيد مقدم الخدمة على الانتهاء من\r\nهذا الموعد للرعاية ، إذا كنت تعتقد أن مزود الخدمة قد أبلغ بشكل غير صحيح عن مقدار الوقت أو اذا كانت الفواتير غير صحيحة ، فقط\r\nاتصل بـ DR Care على info@hesham-mea.com\r\nستحقق DR Care بشكل مستقل من أي مطالبة تفيد بأن الوقت الذي تم الإبلاغ عنه من قِبل موفري الخدمات غير صحيح أو أن العميل قد تم\r\nإصدار فاتورة له بشكل غير صحيح ، وأن أي قرار يتم اتخاذه بواسطة DR Care فيما يتعلق بالمطالبات الموصوفة في الجملة الحالية نهائي\r\nوتوافق على تحويل المبالغ المطلوبة بواسطة DR Care في غضون يوم واحد (1) من وقت اعلامك.\r\nيجب علينا تصحيح أي أخطاء أو خطأ ارتكبه معالج الدفع التابع لجهة خارجية ، حتى لو تم بالفعل طلب الدفع أو فرض رسوم على طريقة\r\nالدفع الخاصة بك\r\nالتكلفة المعلن عنها لكل موعد للعناية في الموقع والتطبيق هو التكلفة الإجمالية لهذا الموعد للرعاية ؛ يتم تضمين الضرائب ورسوم DR Care\r\nلتوفير خدمات الرعاية وأي رسوم إضافية على طريقة الدفع الخاصة بك لهذا الموعد\r\nقد تنشئ DR Care رموزًا ترويجية قد يتم استردادها للحصول على رصيد حساب أو ميزات أو مزايا أخرى ذات صلة بموقعنا أو خدمات\r\nالرعاية ، وفقًا للشروط التي تنشئها DR Care\r\nمحتويات الموقع والتطبيق\r\nلأغراض هذه الاتفاقية ، يجب أن يكون أي محتوى ، بما في ذلك معلوماتك أو صورك أو تعليقاتك أو أي بيانات أو معلومات أخرى تقوم\r\nبتحميلها عبر الموقع (محتوى)\r\nنحن نحتفظ بالحق في إزالة أي محتوى نشعر وفقًا لتقديرنا الخاص ، أنه ينتهك هذه الاتفاقية أو إرشادات DR Care. سنكون أحرارا في\r\nاستخدام أو الكشف عن إعادة إنتاج أو ترخيص أو توزيع واستغلال أي محتوى بالكامل دون التزام أو تقييد من أي نوع بسبب حقوق الملكية\r\nالفكرية أو غير ذلك.\r\nلن تنشر على الموقع ، ولا ترسل إلى مزودي الخدمة ، أو تنقل أي محتوى (بما في ذلك الروابط إلى المحتوى) ، أو تشارك بأي نشاط على\r\nالموقع أو من خلال خدمات DR Care خاصة التي تحتوي على صور أو صور لشخص آخر ، ما لم تكن أنت والده أو وصيًا قانونيًا لهذا\r\nالشخص ، او يحتوي على محتوى محمي بحقوق الطبع والنشر لشخص آخر ما لم تكن قد حصلت على إذن كتابي من مالك حقوق الطبع\r\nوالنشر ، أو يحتوي على معلومات شخصية لشخص آخر أو يكشف عنها دون إذن كتابي منه ، أو بجمع أو التماس المعلومات الشخصية\r\nالخاصة بشخص آخر لأغراض تجارية أو غير مشروعة ، تعني ضمناً أن المحتوى يتم المصادقة عليه أو رعايته بأي طريقة من قبل داي\r\nستار ، أو أنه يعد هجومًا ضمنيًا أو صريحًا ، مثل المحتوى الذي يتضمن أو يدعم أو يروج للعنصرية أو التعصب أو التمييز أو الكراهية أو\r\nالأذى الجسدي من أي نوع كان ، او يهدف إلى مضايقة أو ازعاج أو تهديد أو تخويف أي مستخدمين آخرين للموقع ، او غير صحيح أو\r\nمضلل أو تشهيري أو غير دقيق أو مسيء أو فاحش أو بذيء أو موجه جنسيًا ، أو ينطوي على أي اعتراض ، ويشمل ذلك نقل البريد غير\r\nالهام ، وما يحتوي سلسلة الأحرف أو البريد الجماعي غير المرغوب فيه أو البريد العشوائي أو الخداع أو التصيد أو غيرها من الأنشطة\r\nالمماثلة على البرامج الضارة (بما في ذلك على سبيل المثال لا الحصر ، الفيروسات ، أو القنابل الزمنية ، أو أحصنة طروادة ، أو الديدان ،\r\nأو الرموز أو المكونات أو الأجهزة الضارة أو الضارة الأخرى) ، لا معنى لها أو يقصد بها بطريقة أخرى الإزعاج أو التدخل في استخدام\r\nالآخرين للموقع أو استخدام البرامج النصية أو برامج الروبوت أو غيرها من التقنيات الآلية للوصول إلى الموقع ، أو محاولات التحايل على\r\nأدوات المراسلة أو منصة الحجز في DR Care ، أو محاولة تجنب رسوم مقدم الخدمة السارية\r\nاسم وشعار داي ستار وجميع الأسماء والشعارات وأسماء المنتجات والخدمات والتصاميم والشعارات هي علامات تجارية أو علامات\r\nوشعارات لشركاتنا التابعة أو تراخيصنا. لا يجوز لك استخدام هذه العلامات دون إذن كتابي مسبق. جميع الأسماء والشعارات وأسماء\r\nالمنتجات والخدمات والتصاميم والشعارات على هذا الموقع هي علامات تجارية لمالكيها.\r\nيجوز لنا إنهاء وصولك إلى كل الموقع أو أي جزء منه في أي وقت ، مع أو بدون سبب ، مع أو بدون إشعار ، ويكون ساريًا على الفور ، مما\r\nقد يؤدي إلى فقدان وتدمير جميع المعلومات المرتبطة بحسابك.\r\nالتنصل من الضمانات\r\n\r\nأنت تدرك أننا لا نستطيع ولا نضمن أن الموقع والتطبيق سيكونان خاليين من الفيروسات أو غيرها من الأكواد التدميرية. أنت مسؤول عن\r\nتنفيذ الإجراءات ونقاط التفتيش الكافية لتلبية متطلباتك الخاصة للحماية من الفيروسات ودقة إدخال البيانات وإخراجها ، والحفاظ على وسيلة\r\nخارجية لموقعنا لأي إعادة بناء لأي بيانات مفقودة. لن نكون مسؤولين عن أي خسارة أو ضرر ناتج عن هجوم رفض الخدمة الموزع أو\r\nالفيروسات أو غيرها من المواد الضارة تقنيًا والتي قد تؤثر على أجهزة الكمبيوتر أو برامج الكمبيوتر أو البيانات أو مواد أخرى مملوكة لك\r\nبسبب استخدامك للموقع أو أي خدمات أو عناصر تم الحصول عليها من خلال الموقع أو على أي موقع مرتبط به.\r\nالقانون الذي يحكم\r\nقد يخضع استخدام الموقع والتطبيق لقوانين جمهورية مصر العربية ودول أخرى ؛ أنت توافق على الامتثال لجميع قوانين ولوائح التصدير\r\nوالاستيراد المعمول بها فيما يتعلق باستخدامك للموقع.', 1, 'area', 1),
(21, 0, 'en_client_condition', 'terms_data', 'en_client_condition', 'When you sign up for an account and click to accept the terms of service, you hereby\r\n    acknowledge that you have read and understand the agreement and agree to be bound\r\n    by the terms and conditions stated herein after\r\n    You acknowledge and agree that we may revise and update the agreement from time to\r\n    time and all changes or updates to the agreement are effective immediately when we\r\n    post them and will apply to your access and use of the site and/or application\r\n    By using and accessing the site and/or the application you state that you\r\n    (a) Are at least 18 years old\r\n    (b) Have the right, Authority and capacity to enter into this agreement\r\n    (c) Are legally entitled to enter into this agreement and\r\n    (d) Are not prohibited by the law from accessing or using the site\r\n    DR Care HOME CARE SERVICE\r\n    The site provides a plat form for users to request services (professional services\r\n    providers) In accordance with the terms of this agreement\r\n    DR Care evaluates services providers for generally providing the services to make\r\n    sure they are fulfilling the requirements to provide such services\r\n    DR Care services and the services providers’ services shall collectively called\r\n    services but is not a referral, matching or placement service and does not provide, refer,\r\n    place, offer or seek to obtain employment or engagements for any services providers.\r\n    DR Care shall evaluate each service provider as follows 1- Interview each service\r\n    providers, 2- Order a background check of each service provider and could ask for\r\n    criminal record, 3- Check and clear, all references provided by a service provider, 4-\r\n    Require verification that service providers are eligible to work.\r\n    You understand and agree the background checks ordered by DR Care complies with\r\n    all countries regulations and laws\r\n    DR Care is not an employment services and does not serve as an employer of any\r\n    services provider who are at all times independent contractors\r\n    You understand and agree that because DR Care cannot control the behavior of\r\n    services providers, clients and services providers must resolve any issues, disputes or\r\n    concerns directly with each other, except for any issues regarding payments, which will\r\n    be resolved in accordance with payment section of this agreement.\r\n    You agree to release DR Care from any claims or liability that may arise from any\r\n    disputes between you and services providers\r\n\r\n    Without limiting any of the terms and conditions stated Herein as a condition of your\r\n    access to and use of the site, you agree that\r\n    You will only use the site and the application for lawful purposes, you will not use the\r\n    site and the application for any purpose that prohibited by this agreement, you are\r\n    responsible for all of your activity in connection with the site and the application, you will\r\n    not use the site and the application to cause nuisance, annoyance or/and\r\n    inconvenience, you will not try to harm the site and the application in any way\r\n    whatsoever, you will only use the site and the application for your own use and will not\r\n    resell your account to a third party.\r\n    Services Providers appointments and your account\r\n    One feature of the site and the application allows you to request services providers at\r\n    the time and on the day, you choose after you set up an account, you will be able to\r\n    enter appointment requests and be contacted by available services providers for\r\n    finalizing such appointment request which have to must include all the information\r\n    required by the appointment request form.\r\n    In order to secure a care appointment with DR Care, you must create an account with\r\n    DR Care, when creating an account, you agree to provide true, accurate, current and\r\n    complete data about yourself, you agree to promptly update your information if any of\r\n    your information changes in order to keep it true, current and complete including making\r\n    sure you have a valid credit card on file\r\n    Each user may only have one account with DR Care and you may not create multiple\r\n    accounts for one individual, if you create multiple accounts for the same individual or do\r\n    not keep your information accurate and current including having an invalid or expired\r\n    credit card on file, we may suspend your access and use of the site, deactivate your\r\n    account(s) and/or terminate this agreement.\r\n    You are solely responsible for maintaining the confidentiality of your account and your\r\n    information, and, except as otherwise required by applicable law, you are solely\r\n    responsible for any use of your account, whether or not you authorize that use.\r\n    The site and the application is intended to be used by people who want to find, select,\r\n    review and connect with service providers so they can receive care services and any\r\n    use of this site and the application for any other purpose (including but not limited to\r\n    using the site or information obtained from the site to solicit, advertise to or contact\r\n    services providers or other clients for any other purpose) is prohibited\r\n    You agree to notify us of any unauthorized use of your account or any other breach of\r\n    security related to use of the site and the application. While you may be authorized\r\n    others to use your account for your benefit, you may not assign or otherwise transfer\r\n    your account to any other person or entity.\r\n\r\n    We collect three basic types of information and data: personal information (e.g. email,\r\n    name, address, and credit card information), non-personal information, and data\r\n    regarding your usage of the site.\r\n    Privacy and security\r\n    DR Care are taking care about the Privacy of our users, you understand that by using\r\n    the site and the application and the service was your consent to the collection, use and\r\n    disclosure of your personally identifiable information and aggregate data as set forth in\r\n    our privacy policy and to have your personally identifiable information collected, used,\r\n    transferred to and processed in your country.\r\n    You understand and agree that we will collect and share your personal information with\r\n    service provider that you hire through DR Care. We will only share your personal\r\n    information with third parties from the purpose of providing the services you purchase\r\n    through DR Care.\r\n    We care about the Integrity and security of your personal information, however, you\r\n    understand and agree that we cannot guarantee that unauthorized third parties will\r\n    never be able to defeat our security measures or use your personal information for\r\n    improper purposes.\r\n    You acknowledge that you provide your personal information at your own risk and as\r\n    further described in our privacy policy.\r\n    You may from time to time receive personal information about services providers, For\r\n    example, upon confirmation of a care appointment, clients and services providers will be\r\n    provide with each other’s contact information and personal information you receive may\r\n    be use for the specific purpose it was provided to you in connection with the site and the\r\n    services. Service providers may not contact clients and Clients may not contact services\r\n    providers for any purpose other than asking a question, providing information, or making\r\n    arrangements related to a care appointment.\r\n    By providing us with your mobile phone number when you sign up for this site and\r\n    create an account, you are expressly opting-in to receive SMS and text messages from\r\n    us relating to the site\r\n    Cancellation and missed appointments\r\n    once a service provider accepts your request for a care appointment it may be\r\n    cancelled any time before 6 hours prior to the care appointment start time, although we\r\n    understand that plans change, if you cannot honor a care appointment and either are\r\n    not present at the provided address for your care appointment or cancel within 6 hours\r\n    before the care appointment start time, you’ll be charged for 75% of the total that would\r\n    be due to the care appointments based on the estimated hours or the minimum\r\n    payment; whichever is greater\r\n\r\n    Payment plan\r\n    You must provide information for at least one valid credit card as main accepted\r\n    payment method and alternatively you can use fawry or Vodafone cash in Egypt\r\n    DR Care shall timely remit all amounts due to a care service once a care appointment\r\n    is successfully completed and the service provider confirms the completion of such care\r\n    appointment, if you believe that a service provider has incorrectly reported the amount\r\n    of time or you incorrectly billed, you may contact DR Care at info@Hesham-mea.com\r\n    DR Care will independently investigate any claim that the time reported by services\r\n    providers is incorrect or that a client has been billed incorrectly, any determination made\r\n    by DR Care in regard to claims described in the forgoing sentence are final and you\r\n    agree to remit the amounts requested by DR Care within one (1) day of DR Care\r\n    notifying you of its determination.\r\n    We shall correct any errors or mistake made by our third-party payment processor, even\r\n    if payment have already been requested or charged to your payment method\r\n    The cost advertised for each care appointment on the site and the application is the\r\n    total cost of that care appointment; tax and DR Care fees for providing the care\r\n    services are included and no further charges to your payment method for such care\r\n    appointment\r\n    DR Care may create promotional codes that may be redeem for account credit or\r\n    other features or benefits related to our site, or the Care Services, subject to terms that\r\n    DR Care establishes\r\n    Site and application contents\r\n    For the purposes of this agreement, any content, including your information, photos,\r\n    feedback, or any other data or information that you upload through the site shall be\r\n    (content)\r\n    We reserve the right to remove any content that we feel, in our sole discretion, violates\r\n    this agreement or DR Care guidelines. We shall be free to use, disclose reproduce,\r\n    license or otherwise distribute and exploit any content entirely without obligation or\r\n    restriction of any kind because of intellectual property rights or otherwise.\r\n    You will not post on the site, transmit to service providers, or communicate any content\r\n    (including links to content), or otherwise engage in any activity on the site or through the\r\n    DR Care services that; Contains photographs or images of another person, unless\r\n    you are that person’s parent or legal guardian, contains other’s copyrighted content\r\n    unless you have written permission from the copyright owner, contains or disclosers\r\n    another person’s personal information without his or her written permission, or collects\r\n    or solicits another person’s personal information for commercial or unlawful purposes,\r\n\r\n    implies that the content is in any way endorsed or sponsored by DR Care, is implicitly\r\n    or explicitly offensive, such as content that engages in, endorses or promotes racism,\r\n    bigotry, discrimination, hatred or physical harm of any kind, is intended to harass,\r\n    annoy, threaten or intimidate any other users of the site, is false, misleading,\r\n    defamatory, inaccurate, abusive, obscene, profane, sexually oriented, or otherwise\r\n    objectionable, involves the transmission of junk mail, chain letters, unsolicited mass\r\n    mailing or spamming, phishing, trolling or other similar activities, contains any malware\r\n    (including but not limited to viruses, time bombs, Trojan horses, worms or other harmful,\r\n    or disruptive codes, components or devices), is meaningless or otherwise intended to\r\n    annoy or interfere with other’s use of the site, uses scripts, bots or other automated\r\n    technology to access the site, attempts to circumvent DR Care messaging tools or\r\n    booking platform, or attempts to avoid applicable service provider fees\r\n    DR Care name, logo and all related names, logos, product and services names,\r\n    designs and slogans are our trademarks or its mark and logos of our affiliates, or\r\n    licensures. You may not use such marks without our prior written permission. All other\r\n    names, logos, product and services names, designs and slogans on this website are the\r\n    trademarks of their respective owners.\r\n    We may terminate your access to all or any part of the site at any time, with or without\r\n    cause, with or without notice, effective immediately, which may result in the forfeiture\r\n    and destruction of all information associated with your account.\r\n    Disclaimer of warranties\r\n    You understand that we cannot and do not guarantee or warrant that the site and the\r\n    application will be free of viruses or other destructive code. You are responsible for\r\n    implementing sufficient procedures and checkpoints to satisfy your particular\r\n    requirements for anti-virus protection and accuracy of data input and output, and for\r\n    maintaining a mean external to our site for any reconstruction of any lost data. we will\r\n    not be liable for any loss or damage caused by a distributed denial-of-service attack,\r\n    viruses or other technologically harmful material that may affect your computer\r\n    equipment, computer programs, data or other proprietary material due to your use of the\r\n    site or any services or items obtained through the site or on any website linked to it.\r\n    Governing Law\r\n    Use of the site and the application may be subject to laws of Arab Republic of Egypt\r\n    and other countries; you agree to comply with all applicable export and import laws and\r\n    regulations in connection with your use of the site.', 1, 'area', 1),
(22, 0, 'ar_provider_condition', 'terms_data', 'ar_provider_condition', 'عند التسجيل للحصول على حساب والنقر لقبول شروط الخدمة ، فإنك تقر بموجب ذلك بأنك قد قرأت وفهمت الاتفاقية وتوافق على الالتزام\r\nبالشروط والأحكام الواردة هنا\r\nأنت تقر وتوافق على أننا قد نقوم بمراجعة وتحديث الاتفاقية من وقت لآخر وأن جميع التغييرات أو التحديثات على الاتفاقية تكون سارية\r\nعلى الفور عند نشرها وسيتم تطبيقها على وصولك واستخدامك للموقع و / أو التطبيق\r\nباستخدام و / أو الوصول إلى الموقع و / أو التطبيق فأنت تقر بأنك\r\n(أ) لا يقل عمرك عن 18 عامًا\r\n(ب) لك الحق والسلطة والقدرة على الدخول في هذا الاتفاق\r\n(ج) يحق لك قانونًا الدخول في هذا الاتفاق و\r\n(د) لا يحظرك القانون من الوصول إلى الموقع أو استخدامه\r\nDR Care خدمة الرعاية المنزلية\r\nيوفر الموقع منصه للمستخدمين لطلب الخدمات (مزودي الخدمات المحترفين) وفقًا لشروط هذه الاتفاقية\r\nتقوم DR Care بتقييم مقدمي الخدمات لتوفير الخدمات بشكل عام للتأكد من أنها تفي بمتطلبات تقديم هذه الخدمات\r\nيطلق على خدمات DR Care وخدمات مزودي الخدمات مجتمعة (خدمات) ولكنها ليست خدمة إحالة أو مطابقة أو تنسيب ولا تقدم أو تشير\r\nأو تقدم أو تعرض أو تسعى للحصول على عمل أو ارتباطات لأي من مقدمي الخدمات.\r\nتقوم DR Care بتقييم كل مزود خدمة على النحو التالي: 1- إجراء مقابلة مع كل مزودي الخدمة ، 2- طلب فحص خلفية لكل مزود خدمة\r\nويمكن أن يطلب سجلًا جنائيًا ، 3- فحص جميع المراجع المقدمة من قبل مزود الخدمة ، 4- طلب التحقق أن مقدمي الخدمة مؤهلون للعمل.\r\nأنت تفهم وتوافق على أن عمليات التحقق من الخلفية التي ستقوم بها DR Care تتوافق مع جميع قوانين وقوانين البلدان\r\nDR Care ليست خدمات توظيف ولا تعمل كصاحب عمل ويكون مزود الخدمات في جميع الأوقات مقاولين مستقلين\r\nأنت تدرك وتوافق على أنه نظرًا لأن DR Care لا يمكنها التحكم في سلوك مزودي الخدمات ، يجب على العملاء ومقدمي الخدمات حل أي\r\nمشكلات أو نزاعات أو مخاوف مباشرة مع بعضهم البعض ، باستثناء أي مشكلات تتعلق بالدفع، والتي سيتم حلها وفقًا لقسم الدفع في هذا\r\nالاتفاق.\r\nأنت توافق على الإفراج عن DR Care من أي مطالبات أو مسؤولية قد تنشأ عن أي نزاعات بينك وبين مقدمي الخدمات\r\nدون تحديد أي من الشروط والأحكام الواردة هنا كشرط للوصول إلى الموقع واستخدامه ، فإنك توافق على انك\r\nلن تستخدم الموقع والتطبيق الا لأغراض مشروعة ، ولن تستخدم الموقع والتطبيق لأي غرض يحظره هذا الاتفاق ، فأنت مسؤول عن كل\r\nنشاطك فيما يتعلق بالموقع والتطبيق ، ولن تستخدم الموقع والتطبيق للتسبب في إزعاج أو إزعاج و / أو إزعاج ، لن تحاول الإضرار\r\nبالموقع والتطبيق بأي طريقة كانت ، ولن تستخدم الموقع والتطبيق إلا لاستخدامك الشخصي ولن تتم إعادة بيع حسابك إلى طرف ثالث.\r\nمقدمي الخدمات والمواعيد وحسابك\r\nتتيح لك إحدى ميزات الموقع والتطبيق طلب موفري الخدمات في الوقت وفي اليوم ، بعد أن تسجل حسابًا ، ستتمكن من إدخال طلبات\r\nالمواعيد وسيتم الاتصال بك من قبل مزودي الخدمات المتاحة لوضع اللمسات الأخيرة على هذا الموعد طلب يجب أن يتضمن جميع\r\nالمعلومات المطلوبة في نموذج طلب الموعد.\r\nمن أجل تأمين موعد رعاية مع DR Care ، يجب عليك إنشاء حساب مع DR Care ، عند إنشاء حساب ، فإنك توافق على تقديم بيانات حقيقية\r\nودقيقة وحديثة وكاملة عن نفسك ، وتوافق على تحديث معلوماتك على الفور إذا كان أي من معلوماتك يحتاج التغيير من أجل الحفاظ عليها\r\nصحيحة وحديثة وكاملة بما في ذلك التأكد من أن لديك بطاقة ائتمان صالحة في الملف\r\n\r\nقد يكون لكل مستخدم حساب واحد فقط مع DR Care ولا يجوز لك إنشاء حسابات متعددة لفرد واحد ، إذا أنشأت حسابات متعددة لنفس\r\nالشخص أو لم تحتفظ بمعلوماتك دقيقة وحديثة بما في ذلك وجود بطاقة ائتمان غير صالحة أو منتهية الصلاحية في الملف ، فإننا قد نعلق\r\nوصولك واستخدامك للموقع ، وإلغاء تنشيط حسابك (حساباتك) و / أو إنهاء هذه الاتفاقية.\r\nأنت وحدك المسؤول عن الحفاظ على سرية حسابك ومعلوماتك ، وباستثناء ما يقتضيه القانون المعمول به ، فإنك وحدك المسؤول عن أي\r\nاستخدام لحسابك ، سواء سمحت بذلك الاستخدام أم لا.\r\nالغرض من الموقع والتطبيق هو استخدام الأشخاص الذين يرغبون في العثور على مزودي الخدمة وتحديدهم ومراجعتهم والتواصل معهم\r\nحتى يتمكنوا من تلقي خدمات الرعاية وأي استخدام لهذا الموقع والتطبيق لأي غرض آخر (بما في ذلك على سبيل المثال لا الحصر يحظر\r\nاستخدام الموقع أو المعلومات التي يتم الحصول عليها من الموقع للحصول على مزودي الخدمات أو الإعلان عنهم أو الاتصال بهم أو عملاء\r\nآخرين لأي غرض آخر)\r\nأنت توافق على إخطارنا بأي استخدام غير مصرح به لحسابك أو أي خرق آخر للأمن المتعلق باستخدام الموقع والتطبيق. على الرغم من أنه\r\nيجوز لك السماح للآخرين باستخدام حسابك لمصلحتك ، إلا أنه لا يجوز لك تعيين أو نقل حسابك لأي شخص أو كيان آخر.\r\nنقوم بجمع ثلاثة أنواع أساسية من المعلومات والبيانات: المعلومات الشخصية (مثل البريد الإلكتروني والاسم والعنوان ومعلومات بطاقة\r\nالائتمان) والمعلومات غير الشخصية والبيانات المتعلقة باستخدامك للموقع.\r\nالخصوصية والأمن\r\nتهتم DR Care بخصوصية مستخدمينا ، وأنت تدرك أنه باستخدام الموقع والتطبيق والخدمة تمت موافقتك على جمع واستخدام والكشف عن\r\nمعلومات التعريف الشخصية الخاصة بك والبيانات المجمعة على النحو المنصوص عليه في سياسة الخصوصية و لجمع معلومات التعريف\r\nالشخصية الخاصة بك واستخدامها ونقلها ومعالجتها في بلدك.\r\nأنت تفهم وتوافق على أننا سنجمع معلوماتك الشخصية ونشاركها مع مزود الخدمة الذي توظفه من خلال DR Care. سنشارك معلوماتك\r\nالشخصية مع أطراف ثالثة فقط بغرض توفير الخدمات التي تشتريها من خلال DR Care.\r\nنحن نهتم بسلامة وأمن معلوماتك الشخصية ، ومع ذلك ، فأنت تفهم وتوافق على أنه لا يمكننا ضمان أن الأطراف الثالثة غير المرخص لها\r\nلن تتمكن أبدًا من هزيمة تدابير الأمان الخاصة بنا أو استخدام معلوماتك الشخصية لأغراض غير لائقة.\r\nأنت تقر بأنك تقدم معلوماتك الشخصية على مسؤوليتك الخاصة وكما هو موضح في سياسة الخصوصية الخاصة بنا.\r\nقد تتلقى من وقت لآخر معلومات شخصية عن مقدمي الخدمات ، على سبيل المثال ، عند تأكيد موعد الرعاية ، سيتم تزويد العملاء ومقدمي\r\nالخدمات بمعلومات الاتصال الخاصة بكل منهم ، وقد يتم استخدام المعلومات الشخصية التي تتلقاها للغرض المحدد الذي تم تقديمه له لك في\r\nاتصال مع الموقع والخدمات. لا يجوز لمقدمي الخدمة الاتصال بالعملاء ، ولا يجوز للعملاء الاتصال بموفري الخدمات لأي غرض آخر\r\nغير طرح سؤال أو تقديم معلومات أو اتخاذ ترتيبات متعلقة بموعد رعاية.\r\nمن خلال تزويدنا برقم هاتفك المحمول عند التسجيل في هذا الموقع وإنشاء حساب ، فأنت تختار صراحةً تلقي الرسائل القصيرة والرسائل\r\nالنصية منا المتعلقة بالموقع\r\nالالغاء والمواعيد الفائتة\r\nبمجرد أن يقبل مقدم الخدمة طلبك للحصول على موعد للرعاية ، يمكن إلغاؤه في أي وقت قبل 6 ساعات من موعد بدء الرعاية ، على الرغم\r\nمن أننا ندرك أن الخطط تتغير ، إذا لم تتمكن من الوفاء بموعد الرعاية او لم تكن موجود في العنوان او في موعد الرعاية الخاصة بك أو\r\nالإلغاء في غضون 6 ساعات قبل وقت بدء موعد الرعاية ، سيتم محاسبتك على 75 ٪ من المجموع علي أساس الساعات المقدرة أو الحد\r\nالأدنى للدفع ؛ أيهما أعظم\r\nخطة الدفع\r\nيجب عليك تقديم معلومات عن بطاقة ائتمان واحدة صالحة على الأقل كطريقة دفع رئيسية مقبولة وبدلاً من ذلك ، يمكنك استخدام خدمة\r\nفورى أو فودافون كاش في مصر\r\n\r\nيجب تحويل جميع المبالغ المستحقة في الوقت المناسب إلى خدمة الرعاية بمجرد اكتمال موعد الرعاية وتأكيد مقدم الخدمة على الانتهاء من\r\nهذا الموعد للرعاية ، إذا كنت تعتقد أن مزود الخدمة قد أبلغ بشكل غير صحيح عن مقدار الوقت أو اذا كانت الفواتير غير صحيحة ، فقط\r\nاتصل بـ DR Care على info@hesham-mea.com\r\nستحقق DR Care بشكل مستقل من أي مطالبة تفيد بأن الوقت الذي تم الإبلاغ عنه من قِبل موفري الخدمات غير صحيح أو أن العميل قد تم\r\nإصدار فاتورة له بشكل غير صحيح ، وأن أي قرار يتم اتخاذه بواسطة DR Care فيما يتعلق بالمطالبات الموصوفة في الجملة الحالية نهائي\r\nوتوافق على تحويل المبالغ المطلوبة بواسطة داي ستار في غضون يوم واحد (1) من وقت اعلامك.\r\nيجب علينا تصحيح أي أخطاء أو خطأ ارتكبه معالج الدفع التابع لجهة خارجية ، حتى لو تم بالفعل طلب الدفع أو فرض رسوم على طريقة\r\nالدفع الخاصة بك\r\nالتكلفة المعلن عنها لكل موعد للعناية في الموقع والتطبيق هو التكلفة الإجمالية لهذا الموعد للرعاية ؛ يتم تضمين الضرائب ورسوم DR Care\r\nلتوفير خدمات الرعاية وأي رسوم إضافية على طريقة الدفع الخاصة بك لهذا الموعد\r\nقد تنشئ DR Care رموزًا ترويجية قد يتم استردادها للحصول على رصيد حساب أو ميزات أو مزايا أخرى ذات صلة بموقعنا أو خدمات\r\nالرعاية ، وفقًا للشروط التي تنشئها DR Care\r\nمحتويات الموقع والتطبيق\r\nلأغراض هذه الاتفاقية ، يجب أن يكون أي محتوى ، بما في ذلك معلوماتك أو صورك أو تعليقاتك أو أي بيانات أو معلومات أخرى تقوم\r\nبتحميلها عبر الموقع (محتوى)\r\nنحن نحتفظ بالحق في إزالة أي محتوى نشعر وفقًا لتقديرنا الخاص ، أنه ينتهك هذه الاتفاقية أو إرشادات DR Care. سنكون أحرارا في\r\nاستخدام أو الكشف عن إعادة إنتاج أو ترخيص أو توزيع واستغلال أي محتوى بالكامل دون التزام أو تقييد من أي نوع بسبب حقوق الملكية\r\nالفكرية أو غير ذلك.\r\nلن تنشر على الموقع ، ولا ترسل إلى مزودي الخدمة ، أو تنقل أي محتوى (بما في ذلك الروابط إلى المحتوى) ، أو تشارك بأي نشاط على\r\nالموقع أو من خلال خدمات DR Care خاصة التي تحتوي على صور أو صور لشخص آخر ، ما لم تكن أنت والده أو وصيًا قانونيًا لهذا\r\nالشخص ، او يحتوي على محتوى محمي بحقوق الطبع والنشر لشخص آخر ما لم تكن قد حصلت على إذن كتابي من مالك حقوق الطبع\r\nوالنشر ، أو يحتوي على معلومات شخصية لشخص آخر أو يكشف عنها دون إذن كتابي منه ، أو بجمع أو التماس المعلومات الشخصية\r\nالخاصة بشخص آخر لأغراض تجارية أو غير مشروعة ، تعني ضمناً أن المحتوى يتم المصادقة عليه أو رعايته بأي طريقة من قبل داي\r\nستار ، أو أنه يعد هجومًا ضمنيًا أو صريحًا ، مثل المحتوى الذي يتضمن أو يدعم أو يروج للعنصرية أو التعصب أو التمييز أو الكراهية أو\r\nالأذى الجسدي من أي نوع كان ، او يهدف إلى مضايقة أو ازعاج أو تهديد أو تخويف أي مستخدمين آخرين للموقع ، او غير صحيح أو\r\nمضلل أو تشهيري أو غير دقيق أو مسيء أو فاحش أو بذيء أو موجه جنسيًا ، أو ينطوي على أي اعتراض ، ويشمل ذلك نقل البريد غير\r\nالهام ، وما يحتوي سلسلة الأحرف أو البريد الجماعي غير المرغوب فيه أو البريد العشوائي أو الخداع أو التصيد أو غيرها من الأنشطة\r\nالمماثلة على البرامج الضارة (بما في ذلك على سبيل المثال لا الحصر ، الفيروسات ، أو القنابل الزمنية ، أو أحصنة طروادة ، أو الديدان ،\r\nأو الرموز أو المكونات أو الأجهزة الضارة أو الضارة الأخرى) ، لا معنى لها أو يقصد بها بطريقة أخرى الإزعاج أو التدخل في استخدام\r\nالآخرين للموقع أو استخدام البرامج النصية أو برامج الروبوت أو غيرها من التقنيات الآلية للوصول إلى الموقع ، أو محاولات التحايل على\r\nأدوات المراسلة أو منصة الحجز في DR Care ، أو محاولة تجنب رسوم مقدم الخدمة السارية\r\nاسم وشعار DR Care وجميع الأسماء والشعارات وأسماء المنتجات والخدمات والتصاميم والشعارات هي علامات تجارية أو علامات\r\nوشعارات لشركاتنا التابعة أو تراخيصنا. لا يجوز لك استخدام هذه العلامات دون إذن كتابي مسبق. جميع الأسماء والشعارات وأسماء\r\nالمنتجات والخدمات والتصاميم والشعارات على هذا الموقع هي علامات تجارية لمالكيها.\r\nيجوز لنا إنهاء وصولك إلى كل الموقع أو أي جزء منه في أي وقت ، مع أو بدون سبب ، مع أو بدون إشعار ، ويكون ساريًا على الفور ، مما\r\nقد يؤدي إلى فقدان وتدمير جميع المعلومات المرتبطة بحسابك.\r\nالتنصل من الضمانات\r\n\r\nأنت تدرك أننا لا نستطيع ولا نضمن أن الموقع والتطبيق سيكونان خاليين من الفيروسات أو غيرها من الأكواد التدميرية. أنت مسؤول عن\r\nتنفيذ الإجراءات ونقاط التفتيش الكافية لتلبية متطلباتك الخاصة للحماية من الفيروسات ودقة إدخال البيانات وإخراجها ، والحفاظ على وسيلة\r\nخارجية لموقعنا لأي إعادة بناء لأي بيانات مفقودة. لن نكون مسؤولين عن أي خسارة أو ضرر ناتج عن هجوم رفض الخدمة الموزع أو\r\nالفيروسات أو غيرها من المواد الضارة تقنيًا والتي قد تؤثر على أجهزة الكمبيوتر أو برامج الكمبيوتر أو البيانات أو مواد أخرى مملوكة لك\r\nبسبب استخدامك للموقع أو أي خدمات أو عناصر تم الحصول عليها من خلال الموقع أو على أي موقع مرتبط به.\r\nالقانون الذي يحكم\r\nقد يخضع استخدام الموقع والتطبيق لقوانين جمهورية مصر العربية ودول أخرى ؛ أنت توافق على الامتثال لجميع قوانين ولوائح التصدير\r\nوالاستيراد المعمول بها فيما يتعلق باستخدامك للموقع.', 1, 'area', 1);
INSERT INTO `forms_setting` (`id`, `order_num`, `world_key`, `page_link`, `fild_key`, `value`, `available`, `type`, `is_valid`) VALUES
(23, 0, 'en_provider_condition', 'terms_data', 'en_provider_condition', 'When you sign up for an account and click to accept the terms of service, you hereby\r\n    acknowledge that you have read and understand the agreement and agree to be bound\r\n    by the terms and conditions stated herein after\r\n    You acknowledge and agree that we may revise and update the agreement from time to\r\n    time and all changes or updates to the agreement are effective immediately when we\r\n    post them and will apply to your access and use of the site and/or application\r\n    By using and accessing the site and/or the application you state that you\r\n    (a) Are at least 18 years old\r\n    (b) Have the right, Authority and capacity to enter into this agreement\r\n    (c) Are legally entitled to enter into this agreement and\r\n    (d) Are not prohibited by the law from accessing or using the site\r\n    DR Care HOME CARE SERVICE\r\n    The site provides a plat form for users to request services (professional services\r\n    providers) In accordance with the terms of this agreement\r\n    DR Care evaluates services providers for generally providing the services to make\r\n    sure they are fulfilling the requirements to provide such services\r\n    DR Care services and the services providers’ services shall collectively called\r\n    services but is not a referral, matching or placement service and does not provide, refer,\r\n    place, offer or seek to obtain employment or engagements for any services providers.\r\n    DR Care shall evaluate each service provider as follows 1- Interview each service\r\n    providers, 2- Order a background check of each service provider and could ask for\r\n    criminal record, 3- Check and clear, all references provided by a service provider, 4-\r\n    Require verification that service providers are eligible to work.\r\n    You understand and agree the background checks ordered by DR Care complies with\r\n    all countries regulations and laws\r\n    DR Care is not an employment services and does not serve as an employer of any\r\n    services provider who are at all times independent contractors\r\n    You understand and agree that because DR Care cannot control the behavior of\r\n    services providers, clients and services providers must resolve any issues, disputes or\r\n    concerns directly with each other, except for any issues regarding payments, which will\r\n    be resolved in accordance with payment section of this agreement.\r\n    You agree to release DR Care from any claims or liability that may arise from any\r\n    disputes between you and services providers\r\n\r\n    Without limiting any of the terms and conditions stated Herein as a condition of your\r\n    access to and use of the site, you agree that\r\n    You will only use the site and the application for lawful purposes, you will not use the\r\n    site and the application for any purpose that prohibited by this agreement, you are\r\n    responsible for all of your activity in connection with the site and the application, you will\r\n    not use the site and the application to cause nuisance, annoyance or/and\r\n    inconvenience, you will not try to harm the site and the application in any way\r\n    whatsoever, you will only use the site and the application for your own use and will not\r\n    resell your account to a third party.\r\n    Services Providers appointments and your account\r\n    One feature of the site and the application allows you to request services providers at\r\n    the time and on the day, you choose after you set up an account, you will be able to\r\n    enter appointment requests and be contacted by available services providers for\r\n    finalizing such appointment request which have to must include all the information\r\n    required by the appointment request form.\r\n    In order to secure a care appointment with DR Care, you must create an account with\r\n    DR Care, when creating an account, you agree to provide true, accurate, current and\r\n    complete data about yourself, you agree to promptly update your information if any of\r\n    your information changes in order to keep it true, current and complete including making\r\n    sure you have a valid credit card on file\r\n    Each user may only have one account with DR Care and you may not create multiple\r\n    accounts for one individual, if you create multiple accounts for the same individual or do\r\n    not keep your information accurate and current including having an invalid or expired\r\n    credit card on file, we may suspend your access and use of the site, deactivate your\r\n    account(s) and/or terminate this agreement.\r\n    You are solely responsible for maintaining the confidentiality of your account and your\r\n    information, and, except as otherwise required by applicable law, you are solely\r\n    responsible for any use of your account, whether or not you authorize that use.\r\n    The site and the application is intended to be used by people who want to find, select,\r\n    review and connect with service providers so they can receive care services and any\r\n    use of this site and the application for any other purpose (including but not limited to\r\n    using the site or information obtained from the site to solicit, advertise to or contact\r\n    services providers or other clients for any other purpose) is prohibited\r\n    You agree to notify us of any unauthorized use of your account or any other breach of\r\n    security related to use of the site and the application. While you may be authorized\r\n    others to use your account for your benefit, you may not assign or otherwise transfer\r\n    your account to any other person or entity.\r\n\r\n    We collect three basic types of information and data: personal information (e.g. email,\r\n    name, address, and credit card information), non-personal information, and data\r\n    regarding your usage of the site.\r\n    Privacy and security\r\n    DR Care are taking care about the Privacy of our users, you understand that by using\r\n    the site and the application and the service was your consent to the collection, use and\r\n    disclosure of your personally identifiable information and aggregate data as set forth in\r\n    our privacy policy and to have your personally identifiable information collected, used,\r\n    transferred to and processed in your country.\r\n    You understand and agree that we will collect and share your personal information with\r\n    service provider that you hire through DR Care. We will only share your personal\r\n    information with third parties from the purpose of providing the services you purchase\r\n    through DR Care.\r\n    We care about the Integrity and security of your personal information, however, you\r\n    understand and agree that we cannot guarantee that unauthorized third parties will\r\n    never be able to defeat our security measures or use your personal information for\r\n    improper purposes.\r\n    You acknowledge that you provide your personal information at your own risk and as\r\n    further described in our privacy policy.\r\n    You may from time to time receive personal information about services providers, For\r\n    example, upon confirmation of a care appointment, clients and services providers will be\r\n    provide with each other’s contact information and personal information you receive may\r\n    be use for the specific purpose it was provided to you in connection with the site and the\r\n    services. Service providers may not contact clients and Clients may not contact services\r\n    providers for any purpose other than asking a question, providing information, or making\r\n    arrangements related to a care appointment.\r\n    By providing us with your mobile phone number when you sign up for this site and\r\n    create an account, you are expressly opting-in to receive SMS and text messages from\r\n    us relating to the site\r\n    Cancellation and missed appointments\r\n    once a service provider accepts your request for a care appointment it may be\r\n    cancelled any time before 6 hours prior to the care appointment start time, although we\r\n    understand that plans change, if you cannot honor a care appointment and either are\r\n    not present at the provided address for your care appointment or cancel within 6 hours\r\n    before the care appointment start time, you’ll be charged for 75% of the total that would\r\n    be due to the care appointments based on the estimated hours or the minimum\r\n    payment; whichever is greater\r\n\r\n    Payment plan\r\n    You must provide information for at least one valid credit card as main accepted\r\n    payment method and alternatively you can use fawry or Vodafone cash in Egypt\r\n    DR Care shall timely remit all amounts due to a care service once a care appointment\r\n    is successfully completed and the service provider confirms the completion of such care\r\n    appointment, if you believe that a service provider has incorrectly reported the amount\r\n    of time or you incorrectly billed, you may contact DR Care at info@DR Care-mea.com\r\n    DR Care will independently investigate any claim that the time reported by services\r\n    providers is incorrect or that a client has been billed incorrectly, any determination made\r\n    by DR Care in regard to claims described in the forgoing sentence are final and you\r\n    agree to remit the amounts requested by DR Care within one (1) day of DR Care\r\n    notifying you of its determination.\r\n    We shall correct any errors or mistake made by our third-party payment processor, even\r\n    if payment have already been requested or charged to your payment method\r\n    The cost advertised for each care appointment on the site and the application is the\r\n    total cost of that care appointment; tax and DR Care fees for providing the care\r\n    services are included and no further charges to your payment method for such care\r\n    appointment\r\n    DR Care may create promotional codes that may be redeem for account credit or\r\n    other features or benefits related to our site, or the Care Services, subject to terms that\r\n    DR Care establishes\r\n    Site and application contents\r\n    For the purposes of this agreement, any content, including your information, photos,\r\n    feedback, or any other data or information that you upload through the site shall be\r\n    (content)\r\n    We reserve the right to remove any content that we feel, in our sole discretion, violates\r\n    this agreement or DR Care guidelines. We shall be free to use, disclose reproduce,\r\n    license or otherwise distribute and exploit any content entirely without obligation or\r\n    restriction of any kind because of intellectual property rights or otherwise.\r\n    You will not post on the site, transmit to service providers, or communicate any content\r\n    (including links to content), or otherwise engage in any activity on the site or through the\r\n    DR Care services that; Contains photographs or images of another person, unless\r\n    you are that person’s parent or legal guardian, contains other’s copyrighted content\r\n    unless you have written permission from the copyright owner, contains or disclosers\r\n    another person’s personal information without his or her written permission, or collects\r\n    or solicits another person’s personal information for commercial or unlawful purposes,\r\n\r\n    implies that the content is in any way endorsed or sponsored by DR Care, is implicitly\r\n    or explicitly offensive, such as content that engages in, endorses or promotes racism,\r\n    bigotry, discrimination, hatred or physical harm of any kind, is intended to harass,\r\n    annoy, threaten or intimidate any other users of the site, is false, misleading,\r\n    defamatory, inaccurate, abusive, obscene, profane, sexually oriented, or otherwise\r\n    objectionable, involves the transmission of junk mail, chain letters, unsolicited mass\r\n    mailing or spamming, phishing, trolling or other similar activities, contains any malware\r\n    (including but not limited to viruses, time bombs, Trojan horses, worms or other harmful,\r\n    or disruptive codes, components or devices), is meaningless or otherwise intended to\r\n    annoy or interfere with other’s use of the site, uses scripts, bots or other automated\r\n    technology to access the site, attempts to circumvent DR Care messaging tools or\r\n    booking platform, or attempts to avoid applicable service provider fees\r\n    DR Care name, logo and all related names, logos, product and services names,\r\n    designs and slogans are our trademarks or its mark and logos of our affiliates, or\r\n    licensures. You may not use such marks without our prior written permission. All other\r\n    names, logos, product and services names, designs and slogans on this website are the\r\n    trademarks of their respective owners.\r\n    We may terminate your access to all or any part of the site at any time, with or without\r\n    cause, with or without notice, effective immediately, which may result in the forfeiture\r\n    and destruction of all information associated with your account.\r\n    Disclaimer of warranties\r\n    You understand that we cannot and do not guarantee or warrant that the site and the\r\n    application will be free of viruses or other destructive code. You are responsible for\r\n    implementing sufficient procedures and checkpoints to satisfy your particular\r\n    requirements for anti-virus protection and accuracy of data input and output, and for\r\n    maintaining a mean external to our site for any reconstruction of any lost data. we will\r\n    not be liable for any loss or damage caused by a distributed denial-of-service attack,\r\n    viruses or other technologically harmful material that may affect your computer\r\n    equipment, computer programs, data or other proprietary material due to your use of the\r\n    site or any services or items obtained through the site or on any website linked to it.\r\n    Governing Law\r\n    Use of the site and the application may be subject to laws of Arab Republic of Egypt\r\n    and other countries; you agree to comply with all applicable export and import laws and\r\n    regulations in connection with your use of the site.', 1, 'area', 1),
(24, 0, 'ar_termis_condition', 'terms_data', 'ar_termis_condition', 'عند التسجيل للحصول على حساب والنقر لقبول شروط الخدمة ، فإنك تقر بموجب ذلك بأنك قد قرأت وفهمت الاتفاقية وتوافق على الالتزام\r\nبالشروط والأحكام الواردة هنا\r\nأنت تقر وتوافق على أننا قد نقوم بمراجعة وتحديث الاتفاقية من وقت لآخر وأن جميع التغييرات أو التحديثات على الاتفاقية تكون سارية\r\nعلى الفور عند نشرها وسيتم تطبيقها على وصولك واستخدامك للموقع و / أو التطبيق\r\nباستخدام و / أو الوصول إلى الموقع و / أو التطبيق فأنت تقر بأنك\r\n(أ) لا يقل عمرك عن 18 عامًا\r\n(ب) لك الحق والسلطة والقدرة على الدخول في هذا الاتفاق\r\n(ج) يحق لك قانونًا الدخول في هذا الاتفاق و\r\n(د) لا يحظرك القانون من الوصول إلى الموقع أو استخدامه\r\nDR Care خدمة الرعاية المنزلية\r\nيوفر الموقع منصه للمستخدمين لطلب الخدمات (مزودي الخدمات المحترفين) وفقًا لشروط هذه الاتفاقية\r\nتقوم DR Care بتقييم مقدمي الخدمات لتوفير الخدمات بشكل عام للتأكد من أنها تفي بمتطلبات تقديم هذه الخدمات\r\nيطلق على خدمات DR Care وخدمات مزودي الخدمات مجتمعة (خدمات) ولكنها ليست خدمة إحالة أو مطابقة أو تنسيب ولا تقدم أو تشير\r\nأو تقدم أو تعرض أو تسعى للحصول على عمل أو ارتباطات لأي من مقدمي الخدمات.\r\nتقوم DR Care بتقييم كل مزود خدمة على النحو التالي: 1- إجراء مقابلة مع كل مزودي الخدمة ، 2- طلب فحص خلفية لكل مزود خدمة\r\nويمكن أن يطلب سجلًا جنائيًا ، 3- فحص جميع المراجع المقدمة من قبل مزود الخدمة ، 4- طلب التحقق أن مقدمي الخدمة مؤهلون للعمل.\r\nأنت تفهم وتوافق على أن عمليات التحقق من الخلفية التي ستقوم بها DR Care تتوافق مع جميع قوانين وقوانين البلدان\r\nDR Care ليست خدمات توظيف ولا تعمل كصاحب عمل ويكون مزود الخدمات في جميع الأوقات مقاولين مستقلين\r\nأنت تدرك وتوافق على أنه نظرًا لأن DR Care لا يمكنها التحكم في سلوك مزودي الخدمات ، يجب على العملاء ومقدمي الخدمات حل أي\r\nمشكلات أو نزاعات أو مخاوف مباشرة مع بعضهم البعض ، باستثناء أي مشكلات تتعلق بالدفع، والتي سيتم حلها وفقًا لقسم الدفع في هذا\r\nالاتفاق.\r\nأنت توافق على الإفراج عن DR Care من أي مطالبات أو مسؤولية قد تنشأ عن أي نزاعات بينك وبين مقدمي الخدمات\r\nدون تحديد أي من الشروط والأحكام الواردة هنا كشرط للوصول إلى الموقع واستخدامه ، فإنك توافق على انك\r\nلن تستخدم الموقع والتطبيق الا لأغراض مشروعة ، ولن تستخدم الموقع والتطبيق لأي غرض يحظره هذا الاتفاق ، فأنت مسؤول عن كل\r\nنشاطك فيما يتعلق بالموقع والتطبيق ، ولن تستخدم الموقع والتطبيق للتسبب في إزعاج أو إزعاج و / أو إزعاج ، لن تحاول الإضرار\r\nبالموقع والتطبيق بأي طريقة كانت ، ولن تستخدم الموقع والتطبيق إلا لاستخدامك الشخصي ولن تتم إعادة بيع حسابك إلى طرف ثالث.\r\nمقدمي الخدمات والمواعيد وحسابك\r\nتتيح لك إحدى ميزات الموقع والتطبيق طلب موفري الخدمات في الوقت وفي اليوم ، بعد أن تسجل حسابًا ، ستتمكن من إدخال طلبات\r\nالمواعيد وسيتم الاتصال بك من قبل مزودي الخدمات المتاحة لوضع اللمسات الأخيرة على هذا الموعد طلب يجب أن يتضمن جميع\r\nالمعلومات المطلوبة في نموذج طلب الموعد.\r\nمن أجل تأمين موعد رعاية مع DR Care ، يجب عليك إنشاء حساب مع DR Care ، عند إنشاء حساب ، فإنك توافق على تقديم بيانات حقيقية\r\nودقيقة وحديثة وكاملة عن نفسك ، وتوافق على تحديث معلوماتك على الفور إذا كان أي من معلوماتك يحتاج التغيير من أجل الحفاظ عليها\r\nصحيحة وحديثة وكاملة بما في ذلك التأكد من أن لديك بطاقة ائتمان صالحة في الملف\r\n\r\nقد يكون لكل مستخدم حساب واحد فقط مع DR Care ولا يجوز لك إنشاء حسابات متعددة لفرد واحد ، إذا أنشأت حسابات متعددة لنفس\r\nالشخص أو لم تحتفظ بمعلوماتك دقيقة وحديثة بما في ذلك وجود بطاقة ائتمان غير صالحة أو منتهية الصلاحية في الملف ، فإننا قد نعلق\r\nوصولك واستخدامك للموقع ، وإلغاء تنشيط حسابك (حساباتك) و / أو إنهاء هذه الاتفاقية.\r\nأنت وحدك المسؤول عن الحفاظ على سرية حسابك ومعلوماتك ، وباستثناء ما يقتضيه القانون المعمول به ، فإنك وحدك المسؤول عن أي\r\nاستخدام لحسابك ، سواء سمحت بذلك الاستخدام أم لا.\r\nالغرض من الموقع والتطبيق هو استخدام الأشخاص الذين يرغبون في العثور على مزودي الخدمة وتحديدهم ومراجعتهم والتواصل معهم\r\nحتى يتمكنوا من تلقي خدمات الرعاية وأي استخدام لهذا الموقع والتطبيق لأي غرض آخر (بما في ذلك على سبيل المثال لا الحصر يحظر\r\nاستخدام الموقع أو المعلومات التي يتم الحصول عليها من الموقع للحصول على مزودي الخدمات أو الإعلان عنهم أو الاتصال بهم أو عملاء\r\nآخرين لأي غرض آخر)\r\nأنت توافق على إخطارنا بأي استخدام غير مصرح به لحسابك أو أي خرق آخر للأمن المتعلق باستخدام الموقع والتطبيق. على الرغم من أنه\r\nيجوز لك السماح للآخرين باستخدام حسابك لمصلحتك ، إلا أنه لا يجوز لك تعيين أو نقل حسابك لأي شخص أو كيان آخر.\r\nنقوم بجمع ثلاثة أنواع أساسية من المعلومات والبيانات: المعلومات الشخصية (مثل البريد الإلكتروني والاسم والعنوان ومعلومات بطاقة\r\nالائتمان) والمعلومات غير الشخصية والبيانات المتعلقة باستخدامك للموقع.\r\nالخصوصية والأمن\r\nتهتم DR Care بخصوصية مستخدمينا ، وأنت تدرك أنه باستخدام الموقع والتطبيق والخدمة تمت موافقتك على جمع واستخدام والكشف عن\r\nمعلومات التعريف الشخصية الخاصة بك والبيانات المجمعة على النحو المنصوص عليه في سياسة الخصوصية و لجمع معلومات التعريف\r\nالشخصية الخاصة بك واستخدامها ونقلها ومعالجتها في بلدك.\r\nأنت تفهم وتوافق على أننا سنجمع معلوماتك الشخصية ونشاركها مع مزود الخدمة الذي توظفه من خلال DR Care. سنشارك معلوماتك\r\nالشخصية مع أطراف ثالثة فقط بغرض توفير الخدمات التي تشتريها من خلال DR Care.\r\nنحن نهتم بسلامة وأمن معلوماتك الشخصية ، ومع ذلك ، فأنت تفهم وتوافق على أنه لا يمكننا ضمان أن الأطراف الثالثة غير المرخص لها\r\nلن تتمكن أبدًا من هزيمة تدابير الأمان الخاصة بنا أو استخدام معلوماتك الشخصية لأغراض غير لائقة.\r\nأنت تقر بأنك تقدم معلوماتك الشخصية على مسؤوليتك الخاصة وكما هو موضح في سياسة الخصوصية الخاصة بنا.\r\nقد تتلقى من وقت لآخر معلومات شخصية عن مقدمي الخدمات ، على سبيل المثال ، عند تأكيد موعد الرعاية ، سيتم تزويد العملاء ومقدمي\r\nالخدمات بمعلومات الاتصال الخاصة بكل منهم ، وقد يتم استخدام المعلومات الشخصية التي تتلقاها للغرض المحدد الذي تم تقديمه له لك في\r\nاتصال مع الموقع والخدمات. لا يجوز لمقدمي الخدمة الاتصال بالعملاء ، ولا يجوز للعملاء الاتصال بموفري الخدمات لأي غرض آخر\r\nغير طرح سؤال أو تقديم معلومات أو اتخاذ ترتيبات متعلقة بموعد رعاية.\r\nمن خلال تزويدنا برقم هاتفك المحمول عند التسجيل في هذا الموقع وإنشاء حساب ، فأنت تختار صراحةً تلقي الرسائل القصيرة والرسائل\r\nالنصية منا المتعلقة بالموقع\r\nالالغاء والمواعيد الفائتة\r\nبمجرد أن يقبل مقدم الخدمة طلبك للحصول على موعد للرعاية ، يمكن إلغاؤه في أي وقت قبل 6 ساعات من موعد بدء الرعاية ، على الرغم\r\nمن أننا ندرك أن الخطط تتغير ، إذا لم تتمكن من الوفاء بموعد الرعاية او لم تكن موجود في العنوان او في موعد الرعاية الخاصة بك أو\r\nالإلغاء في غضون 6 ساعات قبل وقت بدء موعد الرعاية ، سيتم محاسبتك على 75 ٪ من المجموع علي أساس الساعات المقدرة أو الحد\r\nالأدنى للدفع ؛ أيهما أعظم\r\nخطة الدفع\r\nيجب عليك تقديم معلومات عن بطاقة ائتمان واحدة صالحة على الأقل كطريقة دفع رئيسية مقبولة وبدلاً من ذلك ، يمكنك استخدام خدمة\r\nفورى أو فودافون كاش في مصر\r\n\r\nيجب تحويل جميع المبالغ المستحقة في الوقت المناسب إلى خدمة الرعاية بمجرد اكتمال موعد الرعاية وتأكيد مقدم الخدمة على الانتهاء من\r\nهذا الموعد للرعاية ، إذا كنت تعتقد أن مزود الخدمة قد أبلغ بشكل غير صحيح عن مقدار الوقت أو اذا كانت الفواتير غير صحيحة ، فقط\r\nاتصل بـ DR Care على info@hesham-mea.com\r\nستحقق DR Care بشكل مستقل من أي مطالبة تفيد بأن الوقت الذي تم الإبلاغ عنه من قِبل موفري الخدمات غير صحيح أو أن العميل قد تم\r\nإصدار فاتورة له بشكل غير صحيح ، وأن أي قرار يتم اتخاذه بواسطة DR Care فيما يتعلق بالمطالبات الموصوفة في الجملة الحالية نهائي\r\nوتوافق على تحويل المبالغ المطلوبة بواسطة DR Care في غضون يوم واحد (1) من وقت اعلامك.\r\nيجب علينا تصحيح أي أخطاء أو خطأ ارتكبه معالج الدفع التابع لجهة خارجية ، حتى لو تم بالفعل طلب الدفع أو فرض رسوم على طريقة\r\nالدفع الخاصة بك\r\nالتكلفة المعلن عنها لكل موعد للعناية في الموقع والتطبيق هو التكلفة الإجمالية لهذا الموعد للرعاية ؛ يتم تضمين الضرائب ورسوم DR Care\r\nلتوفير خدمات الرعاية وأي رسوم إضافية على طريقة الدفع الخاصة بك لهذا الموعد\r\nقد تنشئ DR Care رموزًا ترويجية قد يتم استردادها للحصول على رصيد حساب أو ميزات أو مزايا أخرى ذات صلة بموقعنا أو خدمات\r\nالرعاية ، وفقًا للشروط التي تنشئها DR Care\r\nمحتويات الموقع والتطبيق\r\nلأغراض هذه الاتفاقية ، يجب أن يكون أي محتوى ، بما في ذلك معلوماتك أو صورك أو تعليقاتك أو أي بيانات أو معلومات أخرى تقوم\r\nبتحميلها عبر الموقع (محتوى)\r\nنحن نحتفظ بالحق في إزالة أي محتوى نشعر وفقًا لتقديرنا الخاص ، أنه ينتهك هذه الاتفاقية أو إرشادات DR Care. سنكون أحرارا في\r\nاستخدام أو الكشف عن إعادة إنتاج أو ترخيص أو توزيع واستغلال أي محتوى بالكامل دون التزام أو تقييد من أي نوع بسبب حقوق الملكية\r\nالفكرية أو غير ذلك.\r\nلن تنشر على الموقع ، ولا ترسل إلى مزودي الخدمة ، أو تنقل أي محتوى (بما في ذلك الروابط إلى المحتوى) ، أو تشارك بأي نشاط على\r\nالموقع أو من خلال خدمات DR Care خاصة التي تحتوي على صور أو صور لشخص آخر ، ما لم تكن أنت والده أو وصيًا قانونيًا لهذا\r\nالشخص ، او يحتوي على محتوى محمي بحقوق الطبع والنشر لشخص آخر ما لم تكن قد حصلت على إذن كتابي من مالك حقوق الطبع\r\nوالنشر ، أو يحتوي على معلومات شخصية لشخص آخر أو يكشف عنها دون إذن كتابي منه ، أو بجمع أو التماس المعلومات الشخصية\r\nالخاصة بشخص آخر لأغراض تجارية أو غير مشروعة ، تعني ضمناً أن المحتوى يتم المصادقة عليه أو رعايته بأي طريقة من قبل داي\r\nستار ، أو أنه يعد هجومًا ضمنيًا أو صريحًا ، مثل المحتوى الذي يتضمن أو يدعم أو يروج للعنصرية أو التعصب أو التمييز أو الكراهية أو\r\nالأذى الجسدي من أي نوع كان ، او يهدف إلى مضايقة أو ازعاج أو تهديد أو تخويف أي مستخدمين آخرين للموقع ، او غير صحيح أو\r\nمضلل أو تشهيري أو غير دقيق أو مسيء أو فاحش أو بذيء أو موجه جنسيًا ، أو ينطوي على أي اعتراض ، ويشمل ذلك نقل البريد غير\r\nالهام ، وما يحتوي سلسلة الأحرف أو البريد الجماعي غير المرغوب فيه أو البريد العشوائي أو الخداع أو التصيد أو غيرها من الأنشطة\r\nالمماثلة على البرامج الضارة (بما في ذلك على سبيل المثال لا الحصر ، الفيروسات ، أو القنابل الزمنية ، أو أحصنة طروادة ، أو الديدان ،\r\nأو الرموز أو المكونات أو الأجهزة الضارة أو الضارة الأخرى) ، لا معنى لها أو يقصد بها بطريقة أخرى الإزعاج أو التدخل في استخدام\r\nالآخرين للموقع أو استخدام البرامج النصية أو برامج الروبوت أو غيرها من التقنيات الآلية للوصول إلى الموقع ، أو محاولات التحايل على\r\nأدوات المراسلة أو منصة الحجز في DR Care ، أو محاولة تجنب رسوم مقدم الخدمة السارية\r\nاسم وشعار DR Care وجميع الأسماء والشعارات وأسماء المنتجات والخدمات والتصاميم والشعارات هي علامات تجارية أو علامات\r\nوشعارات لشركاتنا التابعة أو تراخيصنا. لا يجوز لك استخدام هذه العلامات دون إذن كتابي مسبق. جميع الأسماء والشعارات وأسماء\r\nالمنتجات والخدمات والتصاميم والشعارات على هذا الموقع هي علامات تجارية لمالكيها.\r\nيجوز لنا إنهاء وصولك إلى كل الموقع أو أي جزء منه في أي وقت ، مع أو بدون سبب ، مع أو بدون إشعار ، ويكون ساريًا على الفور ، مما\r\nقد يؤدي إلى فقدان وتدمير جميع المعلومات المرتبطة بحسابك.\r\nالتنصل من الضمانات\r\n\r\nأنت تدرك أننا لا نستطيع ولا نضمن أن الموقع والتطبيق سيكونان خاليين من الفيروسات أو غيرها من الأكواد التدميرية. أنت مسؤول عن\r\nتنفيذ الإجراءات ونقاط التفتيش الكافية لتلبية متطلباتك الخاصة للحماية من الفيروسات ودقة إدخال البيانات وإخراجها ، والحفاظ على وسيلة\r\nخارجية لموقعنا لأي إعادة بناء لأي بيانات مفقودة. لن نكون مسؤولين عن أي خسارة أو ضرر ناتج عن هجوم رفض الخدمة الموزع أو\r\nالفيروسات أو غيرها من المواد الضارة تقنيًا والتي قد تؤثر على أجهزة الكمبيوتر أو برامج الكمبيوتر أو البيانات أو مواد أخرى مملوكة لك\r\nبسبب استخدامك للموقع أو أي خدمات أو عناصر تم الحصول عليها من خلال الموقع أو على أي موقع مرتبط به.\r\nالقانون الذي يحكم\r\nقد يخضع استخدام الموقع والتطبيق لقوانين جمهورية مصر العربية ودول أخرى ؛ أنت توافق على الامتثال لجميع قوانين ولوائح التصدير\r\nوالاستيراد المعمول بها فيما يتعلق باستخدامك للموقع.', 1, 'area', 1),
(25, 0, 'en_termis_condition', 'terms_data', 'en_termis_condition', 'When you sign up for an account and click to accept the terms of service, you hereby\r\n    acknowledge that you have read and understand the agreement and agree to be bound\r\n    by the terms and conditions stated herein after\r\n    You acknowledge and agree that we may revise and update the agreement from time to\r\n    time and all changes or updates to the agreement are effective immediately when we\r\n    post them and will apply to your access and use of the site and/or application\r\n    By using and accessing the site and/or the application you state that you\r\n    (a) Are at least 18 years old\r\n    (b) Have the right, Authority and capacity to enter into this agreement\r\n    (c) Are legally entitled to enter into this agreement and\r\n    (d) Are not prohibited by the law from accessing or using the site\r\n    DR Care HOME CARE SERVICE\r\n    The site provides a plat form for users to request services (professional services\r\n    providers) In accordance with the terms of this agreement\r\n    DR Care evaluates services providers for generally providing the services to make\r\n    sure they are fulfilling the requirements to provide such services\r\n    DR Care services and the services providers’ services shall collectively called\r\n    services but is not a referral, matching or placement service and does not provide, refer,\r\n    place, offer or seek to obtain employment or engagements for any services providers.\r\n    DR Care shall evaluate each service provider as follows 1- Interview each service\r\n    providers, 2- Order a background check of each service provider and could ask for\r\n    criminal record, 3- Check and clear, all references provided by a service provider, 4-\r\n    Require verification that service providers are eligible to work.\r\n    You understand and agree the background checks ordered by DR Care complies with\r\n    all countries regulations and laws\r\n    DR Care is not an employment services and does not serve as an employer of any\r\n    services provider who are at all times independent contractors\r\n    You understand and agree that because DR Care cannot control the behavior of\r\n    services providers, clients and services providers must resolve any issues, disputes or\r\n    concerns directly with each other, except for any issues regarding payments, which will\r\n    be resolved in accordance with payment section of this agreement.\r\n    You agree to release DR Care from any claims or liability that may arise from any\r\n    disputes between you and services providers\r\n\r\n    Without limiting any of the terms and conditions stated Herein as a condition of your\r\n    access to and use of the site, you agree that\r\n    You will only use the site and the application for lawful purposes, you will not use the\r\n    site and the application for any purpose that prohibited by this agreement, you are\r\n    responsible for all of your activity in connection with the site and the application, you will\r\n    not use the site and the application to cause nuisance, annoyance or/and\r\n    inconvenience, you will not try to harm the site and the application in any way\r\n    whatsoever, you will only use the site and the application for your own use and will not\r\n    resell your account to a third party.\r\n    Services Providers appointments and your account\r\n    One feature of the site and the application allows you to request services providers at\r\n    the time and on the day, you choose after you set up an account, you will be able to\r\n    enter appointment requests and be contacted by available services providers for\r\n    finalizing such appointment request which have to must include all the information\r\n    required by the appointment request form.\r\n    In order to secure a care appointment with DR Care, you must create an account with\r\n    DR Care, when creating an account, you agree to provide true, accurate, current and\r\n    complete data about yourself, you agree to promptly update your information if any of\r\n    your information changes in order to keep it true, current and complete including making\r\n    sure you have a valid credit card on file\r\n    Each user may only have one account with DR Care and you may not create multiple\r\n    accounts for one individual, if you create multiple accounts for the same individual or do\r\n    not keep your information accurate and current including having an invalid or expired\r\n    credit card on file, we may suspend your access and use of the site, deactivate your\r\n    account(s) and/or terminate this agreement.\r\n    You are solely responsible for maintaining the confidentiality of your account and your\r\n    information, and, except as otherwise required by applicable law, you are solely\r\n    responsible for any use of your account, whether or not you authorize that use.\r\n    The site and the application is intended to be used by people who want to find, select,\r\n    review and connect with service providers so they can receive care services and any\r\n    use of this site and the application for any other purpose (including but not limited to\r\n    using the site or information obtained from the site to solicit, advertise to or contact\r\n    services providers or other clients for any other purpose) is prohibited\r\n    You agree to notify us of any unauthorized use of your account or any other breach of\r\n    security related to use of the site and the application. While you may be authorized\r\n    others to use your account for your benefit, you may not assign or otherwise transfer\r\n    your account to any other person or entity.\r\n\r\n    We collect three basic types of information and data: personal information (e.g. email,\r\n    name, address, and credit card information), non-personal information, and data\r\n    regarding your usage of the site.\r\n    Privacy and security\r\n    DR Care are taking care about the Privacy of our users, you understand that by using\r\n    the site and the application and the service was your consent to the collection, use and\r\n    disclosure of your personally identifiable information and aggregate data as set forth in\r\n    our privacy policy and to have your personally identifiable information collected, used,\r\n    transferred to and processed in your country.\r\n    You understand and agree that we will collect and share your personal information with\r\n    service provider that you hire through DR Care. We will only share your personal\r\n    information with third parties from the purpose of providing the services you purchase\r\n    through DR Care.\r\n    We care about the Integrity and security of your personal information, however, you\r\n    understand and agree that we cannot guarantee that unauthorized third parties will\r\n    never be able to defeat our security measures or use your personal information for\r\n    improper purposes.\r\n    You acknowledge that you provide your personal information at your own risk and as\r\n    further described in our privacy policy.\r\n    You may from time to time receive personal information about services providers, For\r\n    example, upon confirmation of a care appointment, clients and services providers will be\r\n    provide with each other’s contact information and personal information you receive may\r\n    be use for the specific purpose it was provided to you in connection with the site and the\r\n    services. Service providers may not contact clients and Clients may not contact services\r\n    providers for any purpose other than asking a question, providing information, or making\r\n    arrangements related to a care appointment.\r\n    By providing us with your mobile phone number when you sign up for this site and\r\n    create an account, you are expressly opting-in to receive SMS and text messages from\r\n    us relating to the site\r\n    Cancellation and missed appointments\r\n    once a service provider accepts your request for a care appointment it may be\r\n    cancelled any time before 6 hours prior to the care appointment start time, although we\r\n    understand that plans change, if you cannot honor a care appointment and either are\r\n    not present at the provided address for your care appointment or cancel within 6 hours\r\n    before the care appointment start time, you’ll be charged for 75% of the total that would\r\n    be due to the care appointments based on the estimated hours or the minimum\r\n    payment; whichever is greater\r\n\r\n    Payment plan\r\n    You must provide information for at least one valid credit card as main accepted\r\n    payment method and alternatively you can use fawry or Vodafone cash in Egypt\r\n    DR Care shall timely remit all amounts due to a care service once a care appointment\r\n    is successfully completed and the service provider confirms the completion of such care\r\n    appointment, if you believe that a service provider has incorrectly reported the amount\r\n    of time or you incorrectly billed, you may contact DR Care at info@DR Care-mea.com\r\n    DR Care will independently investigate any claim that the time reported by services\r\n    providers is incorrect or that a client has been billed incorrectly, any determination made\r\n    by DR Care in regard to claims described in the forgoing sentence are final and you\r\n    agree to remit the amounts requested by DR Care within one (1) day of DR Care\r\n    notifying you of its determination.\r\n    We shall correct any errors or mistake made by our third-party payment processor, even\r\n    if payment have already been requested or charged to your payment method\r\n    The cost advertised for each care appointment on the site and the application is the\r\n    total cost of that care appointment; tax and DR Care fees for providing the care\r\n    services are included and no further charges to your payment method for such care\r\n    appointment\r\n    DR Care may create promotional codes that may be redeem for account credit or\r\n    other features or benefits related to our site, or the Care Services, subject to terms that\r\n    DR Care establishes\r\n    Site and application contents\r\n    For the purposes of this agreement, any content, including your information, photos,\r\n    feedback, or any other data or information that you upload through the site shall be\r\n    (content)\r\n    We reserve the right to remove any content that we feel, in our sole discretion, violates\r\n    this agreement or DR Care guidelines. We shall be free to use, disclose reproduce,\r\n    license or otherwise distribute and exploit any content entirely without obligation or\r\n    restriction of any kind because of intellectual property rights or otherwise.\r\n    You will not post on the site, transmit to service providers, or communicate any content\r\n    (including links to content), or otherwise engage in any activity on the site or through the\r\n    DR Care services that; Contains photographs or images of another person, unless\r\n    you are that person’s parent or legal guardian, contains other’s copyrighted content\r\n    unless you have written permission from the copyright owner, contains or disclosers\r\n    another person’s personal information without his or her written permission, or collects\r\n    or solicits another person’s personal information for commercial or unlawful purposes,\r\n\r\n    implies that the content is in any way endorsed or sponsored by DR Care, is implicitly\r\n    or explicitly offensive, such as content that engages in, endorses or promotes racism,\r\n    bigotry, discrimination, hatred or physical harm of any kind, is intended to harass,\r\n    annoy, threaten or intimidate any other users of the site, is false, misleading,\r\n    defamatory, inaccurate, abusive, obscene, profane, sexually oriented, or otherwise\r\n    objectionable, involves the transmission of junk mail, chain letters, unsolicited mass\r\n    mailing or spamming, phishing, trolling or other similar activities, contains any malware\r\n    (including but not limited to viruses, time bombs, Trojan horses, worms or other harmful,\r\n    or disruptive codes, components or devices), is meaningless or otherwise intended to\r\n    annoy or interfere with other’s use of the site, uses scripts, bots or other automated\r\n    technology to access the site, attempts to circumvent DR Care messaging tools or\r\n    booking platform, or attempts to avoid applicable service provider fees\r\n    DR Care name, logo and all related names, logos, product and services names,\r\n    designs and slogans are our trademarks or its mark and logos of our affiliates, or\r\n    licensures. You may not use such marks without our prior written permission. All other\r\n    names, logos, product and services names, designs and slogans on this website are the\r\n    trademarks of their respective owners.\r\n    We may terminate your access to all or any part of the site at any time, with or without\r\n    cause, with or without notice, effective immediately, which may result in the forfeiture\r\n    and destruction of all information associated with your account.\r\n    Disclaimer of warranties\r\n    You understand that we cannot and do not guarantee or warrant that the site and the\r\n    application will be free of viruses or other destructive code. You are responsible for\r\n    implementing sufficient procedures and checkpoints to satisfy your particular\r\n    requirements for anti-virus protection and accuracy of data input and output, and for\r\n    maintaining a mean external to our site for any reconstruction of any lost data. we will\r\n    not be liable for any loss or damage caused by a distributed denial-of-service attack,\r\n    viruses or other technologically harmful material that may affect your computer\r\n    equipment, computer programs, data or other proprietary material due to your use of the\r\n    site or any services or items obtained through the site or on any website linked to it.\r\n    Governing Law\r\n    Use of the site and the application may be subject to laws of Arab Republic of Egypt\r\n    and other countries; you agree to comply with all applicable export and import laws and\r\n    regulations in connection with your use of the site.', 1, 'area', 1),
(26, 3, 'es_about', 'about_data', 'es_about', 'DR CARE Medical Technology es una compañía líder en el campo de los dispositivos médicos que se basó en más de veinte años de experiencia y una fuerte presencia en el área de la región de Medio Oriente y África.\r\nDaystar Medical Technology tiene la visión de crear una empresa líder en tecnología médica para respaldar una red bien estructurada de fabricantes y distribuidores en la región de Medio Oriente y África a través de nuestra presencia en Emiratos Árabes Unidos, donde podemos ver mercados, distribuidores, regulaciones, registros y competencia y a través de nuestra presencia en España, donde podemos conectarnos fácilmente con fabricantes de todo el mundo.\r\nLa visión de la TECNOLOGÍA MÉDICA DE Daystar incluye la creación de una red bien estructurada de usuarios finales y proveedores de servicios como un objetivo principal para nuestra oficina de El Cairo, Egipto a través de nuestro sitio web y / o aplicación móvil para servicios de atención domiciliaria', 1, 'area', 1),
(27, 4, 'ar_Our_Mission', 'about_data', 'ar_Our_Mission', 'تقديم خدمات عالية الجودة لمستخدمينا النهائيين مع التأكد من توفر احدث ابتكارات الأجهزة الطبية في منطقة الشرق الأوسط وأفريقيا', 1, 'area', 1),
(28, 5, 'en_Our_Mission', 'about_data', 'en_Our_Mission', 'Delivering High quality services to our end users making sure of the availability of up to date medical devices innovations in the region of Middle East and Africa ', 1, 'area', 1),
(29, 6, 'es_Our_Mission', 'about_data', 'es_Our_Mission', 'Brindando servicios de alta calidad a nuestros usuarios finales asegurándonos de la disponibilidad de innovaciones actualizadas de dispositivos médicos en la región de Medio Oriente y África', 1, 'area', 1),
(30, 7, 'ar_Our_Vision', 'about_data', 'ar_Our_Vision', 'بناء شركة طبية رائدة لدعم شبكة ربط منظمه بين المستخدمين النهائيين ومقدمي الخدمات بالاضافه الي تكوين شبكة ربط بين الشركات المصنعة والموزعين في منطقة الشرق الأوسط وأفريقيا', 1, 'area', 1),
(31, 8, 'en_Our_Vision', 'about_data', 'en_Our_Vision', 'Building up a leading Medical Technology Company to support a well-structured end users and service providers network in addition to manufacturer and distributor network in the region of Middle East and Africa', 1, 'area', 1),
(32, 9, 'es_Our_Vision', 'about_data', 'es_Our_Vision', 'Creación de una empresa líder en tecnología médica para respaldar una red bien estructurada de usuarios finales y proveedores de servicios, además de una red de fabricantes y distribuidores en la región de Oriente Medio y África', 1, 'area', 1),
(33, 10, 'ar_Our_Values', 'about_data', 'ar_Our_Values', '1- العاطفة: لإحداث فرق في مجال الرعاية الصحية والتكنولوجيا الطبية في منطقة الشرق الأوسط وأفريقيا\r\n\r\n2- الالتزام: طريقة واضحة ومتسقة للعمل مع المستخدمين النهائيين والشركاء\r\n\r\n3- جودة الخدمات: تطبيق المعيار الذهبي في توصيل المستخدمين النهائيين والموزعين مع مزودي الخدمة والمصنعين\r\n\r\n4- الإنسانية والثقة: بناء شراكة موثوقة طويلة الأجل تقوم على الإنسانية والأخلاق مع مستخدمينا وشركائنا', 1, 'area', 1),
(34, 11, 'en_Our_Values', 'about_data', 'en_Our_Values', '1- Passion: To make difference in health care and medical technology field in Middle East and Africa region  \r\n\r\n2- Commitment: Clear and consistent way of work with our end users and partners\r\n\r\n3- Quality of Services: Applying the gold standard in connecting our end users and distributors with service providers and manufacturers \r\n\r\n4- Humanity and Trust: Building up a long term trustful partnership based on humanity and ethics with our end users and partners\r\n', 1, 'area', 1),
(35, 12, 'es_Our_Values', 'about_data', 'es_Our_Values', '1- Pasión: marcar la diferencia en el campo de la atención médica y la tecnología médica en la región de Medio Oriente y África\r\n\r\n2- Compromiso: forma de trabajo clara y coherente con nuestros usuarios finales y socios\r\n\r\n3- Calidad de los servicios: aplicar el estándar de oro para conectar a nuestros usuarios finales y distribuidores con proveedores y fabricantes de servicios\r\n\r\n4- Humanidad y confianza: construir una asociación confiable a largo plazo basada en la humanidad y la ética con nuestros usuarios finales y socios', 1, 'area', 1),
(36, 3, 'es_address', 'main_data', 'es_address', 'Villa 381 Primer asentamiento Barrio Seis, Nuevo Cairo, Egipto', 1, 'text', 1),
(37, 4, 'ar_address_other', 'main_data', 'ar_address_other', 'ب س 1301423 منطقة عجمان الحره الامارات العربيه المتحده', 1, 'text', 1),
(38, 5, 'en_address_other', 'main_data', 'en_address_other', 'B.C. 1301423 Ajman Free Zone United Arab Emirates', 1, 'text', 1),
(39, 6, 'es_address_other', 'main_data', 'es_address_other', 'B.C. 1301423 Ajman Free Zone Emiratos Árabes Unidos', 1, 'text', 1),
(40, 6, 'App_Store', 'main_data', 'App_Store', 'https://apps.apple.com/eg/app/dr-care/id1501666581', 1, 'text', 1),
(41, 6, 'Play_Store', 'main_data', 'Play_Store', 'https://play.google.com/store/apps/details?id=com.day.star.apps.homecare', 1, 'text', 1),
(42, 20, 'ar_about_market', 'market_data', 'ar_about_market', 'يسمح لك التطبيق بالتصفح والشراء من أكثر من 6000 منتج بخصومات كبيرة في جميع فئات الطبية', 1, 'text', 1),
(43, 20, 'en_about_market', 'market_data', 'en_about_market', 'The app allows browsing and purchasing from more than 6000 products with big discounts in all medical categories', 1, 'text', 1),
(44, 20, 'ar_terms_market', 'market_data', 'ar_terms_market', ' تنص هذه الشروط والأحكام (شروط الموقع) على كيفية استخدامكم لخدماتنا من أجل بيع بضائعكم (المنتجات) عبر موقعنا التجاري، أو الجزء ذي الصلة من (الموقع). ولكي يتم استخدام الموقع أو أي من خدماتنا (خدماتنا) لبيع المنتجات، يتعين عليكم إنشاء حساب بائع ', 1, 'text', 1),
(45, 20, 'en_terms_market', 'market_data', 'en_terms_market', 'These terms and conditions (website terms) state how you use our services in order to sell your goods (products) through our commercial website, or the related part of (the website). In order to use the site or any of our services (our services) to sell products, you must create a seller account', 1, 'text', 1);

-- --------------------------------------------------------

--
-- Table structure for table `market_notifications`
--

CREATE TABLE `market_notifications` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `process_id_fk` bigint(20) NOT NULL,
  `process_type` tinyint(4) NOT NULL DEFAULT '0',
  `from_user_id` bigint(20) NOT NULL,
  `to_user_id` bigint(20) NOT NULL,
  `notification_type` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `action_type` tinyint(4) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `notification_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_body` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `from_to_type` tinyint(4) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `market_orders`
--

CREATE TABLE `market_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` enum('new','order_accept','old','ready') NOT NULL DEFAULT 'new',
  `delivery_date` int(11) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `payment_type` enum('cash','paypal') NOT NULL,
  `total_cost` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_lat` double NOT NULL,
  `address_long` double NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_orders`
--

INSERT INTO `market_orders` (`id`, `user_id`, `order_status`, `delivery_date`, `delivery_time`, `payment_type`, `total_cost`, `shop_id`, `address`, `address_lat`, `address_long`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 25, 'new', 1585699200, 2147483647, 'cash', 312, 1, 'الريض', 30.5606, 31.01091, 1601322884, 1601322884, 0, 0),
(2, 25, 'old', 1585699200, 2147483647, 'cash', 312, 1, 'الريض', 30.5606, 31.01091, 1601322900, 1602533558, 0, 0),
(3, 25, 'new', 1603497600, 2147483647, 'cash', 312, 1, '8 زكريا عثمان، المنطقة الثامنة، مدينة نصر، محافظة القاهرة‬، مصر', 31.3528899, 31.3528899, 1603353056, 1603353056, 0, 0),
(4, 24, 'new', 1604016000, 1604062800, 'cash', 312, 0, '13 شارع زكريا عثمان - مدينة نصر', 30.043489, 31.235291, 1603353716, 1603353716, 62, 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_orders_details`
--

CREATE TABLE `market_orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cost` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_orders_details`
--

INSERT INTO `market_orders_details` (`id`, `order_id`, `product_id`, `partner_id`, `amount`, `cost`) VALUES
(1, 1, 1, 1, 1, 12),
(2, 1, 3, 1, 1, 108),
(3, 2, 1, 1, 1, 12),
(4, 2, 3, 1, 1, 108),
(5, 3, 1, 1, 1, 12),
(6, 3, 2, 1, 1, 300),
(7, 4, 1, 0, 1, 12),
(8, 4, 2, 0, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `market_orders_details_offers`
--

CREATE TABLE `market_orders_details_offers` (
  `id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  `offer_type` enum('per','value') NOT NULL,
  `offer_value` double NOT NULL,
  `old_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_orders_details_offers`
--

INSERT INTO `market_orders_details_offers` (`id`, `details_id`, `offer_type`, `offer_value`, `old_price`) VALUES
(1, 2, 'per', 10, 120),
(2, 4, 'per', 10, 120);

-- --------------------------------------------------------

--
-- Table structure for table `market_orders_partner`
--

CREATE TABLE `market_orders_partner` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` enum('new','order_accept','old') NOT NULL DEFAULT 'new',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_orders_partner`
--

INSERT INTO `market_orders_partner` (`id`, `order_id`, `partner_id`, `cost`, `user_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 120, 25, 'old', 1601322884, 1601322884),
(2, 2, 1, 120, 25, 'old', 1601322900, 1601322900),
(3, 3, 1, 312, 25, 'new', 1603353056, 1603353056);

-- --------------------------------------------------------

--
-- Table structure for table `medical_tourism`
--

CREATE TABLE `medical_tourism` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medical_tourism_order` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_tourism`
--

INSERT INTO `medical_tourism` (`id`, `medical_tourism_order`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 1578952514, 1578952514, 0),
(2, 2, 1578952541, 1578952541, 0),
(3, 3, 1578952592, 1578952592, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medical_tourism_trans`
--

CREATE TABLE `medical_tourism_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medical_tourism_id` bigint(20) NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_tourism_trans`
--

INSERT INTO `medical_tourism_trans` (`id`, `medical_tourism_id`, `lang`, `title`, `content`) VALUES
(1, 1, 'ar', 'الطب الرياضي', NULL),
(2, 1, 'en', 'Sport Medicine', NULL),
(3, 1, 'es', 'Medicina deportiva', NULL),
(4, 2, 'ar', 'إعادة التأهيل البدني والعصبي', NULL),
(5, 2, 'en', 'Phisical and Neurological Rehabilitation', NULL),
(6, 2, 'es', 'Rehabilitación Física y Neurológica', NULL),
(7, 3, 'ar', 'طب القلب', NULL),
(8, 3, 'en', ' Cardiology', NULL),
(9, 3, 'es', 'Cardiología', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_date` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `news_date`, `created_at`, `updated_at`, `deleted`) VALUES
(1, '2ff8337fa9ccfe209a182534a04e426b.jpeg', 1595030400, 1595099026, 1595099026, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_trans`
--

CREATE TABLE `news_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `lang` enum('ar','en','es') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_trans`
--

INSERT INTO `news_trans` (`id`, `news_id`, `lang`, `title`, `content`) VALUES
(1, 1, 'ar', 'علماء يبتكرون خلايا عصبية صناعية لعلاج مرض الزهايمر', 'تمكّن علماء من اختراع خلايا عصبية صناعية قابلة للزراعة في الدماغ، بمقدورها إصلاح الأضرار الناجمة عن مرض الزهايمر أو غيرها من الأمراض العصبية.\r\n\r\nوطوّر فريق في جامعة باث البريطانية وعلماء دوليين خلايا إلكترونية تم تثبيتها على شريحة سيليكون، تحاكي استجابات الخلايا العصبية البيولوجية عندما يتم تشغيلها بواسطة الجهاز العصبي.'),
(2, 1, 'en', ' Scientists create artificial nerve cells to treat Alzheimer\'s disease', 'Scientists have been able to invent artificial neurons that can be implanted in the brain, which can repair the damage caused by Alzheimer\'s or other neurological diseases.\r\n\r\nA team at British University of Bath and international scientists developed electronic cells that have been attached to a silicon slide, which mimics the responses of biological neurons when triggered by the nervous system.'),
(3, 1, 'es', ' Scientists create artificial nerve cells to treat Alzheimer\'s disease', 'Scientists have been able to invent artificial neurons that can be implanted in the brain, which can repair the damage caused by Alzheimer\'s or other neurological diseases.\r\n\r\nA team at British University of Bath and international scientists developed electronic cells that have been attached to a silicon slide, which mimics the responses of biological neurons when triggered by the nervous system.');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `process_id_fk` bigint(20) NOT NULL,
  `from_user_id` bigint(20) NOT NULL,
  `to_user_id` bigint(20) NOT NULL,
  `notification_type` tinyint(4) NOT NULL,
  `action_type` tinyint(4) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `notification_msg_id` bigint(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `process_id_fk`, `from_user_id`, `to_user_id`, `notification_type`, `action_type`, `is_read`, `notification_msg_id`, `created_at`, `deleted`) VALUES
(36, 11, 62, 51, 9, 1, 0, 1, 1602053098, 1),
(35, 11, 62, 4, 9, 1, 0, 1, 1602053098, 1),
(38, 11, 62, 32, 9, 1, 0, 1, 1602053098, 1),
(37, 11, 62, 30, 9, 1, 0, 1, 1602053098, 1),
(40, 11, 62, 57, 9, 1, 0, 1, 1602053098, 1),
(39, 11, 62, 36, 9, 1, 0, 1, 1602053098, 1),
(42, 12, 62, 57, 9, 1, 0, 1, 1602053677, 1),
(41, 12, 62, 32, 9, 1, 0, 1, 1602053677, 1),
(44, 11, 62, 46, 9, 0, 0, 3, 1602054257, 0),
(43, 11, 46, 62, 15, 2, 0, 2, 1602054229, 1),
(152, 23, 2, 5, 9, 1, 0, 1, 1603567484, 1),
(151, 22, 2, 68, 9, 1, 0, 1, 1603567183, 1),
(13, 7, 61, 20, 9, 1, 0, 1, 1602017402, 1),
(14, 7, 61, 21, 9, 1, 0, 1, 1602017402, 1),
(15, 7, 61, 27, 9, 1, 0, 1, 1602017402, 1),
(16, 7, 61, 37, 9, 1, 0, 1, 1602017402, 1),
(17, 7, 61, 56, 9, 1, 0, 1, 1602017402, 1),
(55, 12, 62, 16, 9, 0, 0, 3, 1602055868, 0),
(54, 12, 16, 62, 15, 2, 0, 2, 1602055828, 1),
(53, 14, 62, 57, 9, 1, 0, 1, 1602054950, 1),
(52, 14, 62, 32, 9, 1, 0, 1, 1602054950, 1),
(22, 10, 61, 5, 9, 1, 0, 1, 1602019008, 1),
(23, 10, 61, 6, 9, 1, 0, 1, 1602019008, 1),
(24, 10, 61, 8, 9, 1, 0, 1, 1602019008, 1),
(25, 10, 61, 49, 9, 1, 0, 1, 1602019008, 1),
(26, 10, 61, 12, 9, 1, 0, 1, 1602019008, 1),
(27, 10, 61, 13, 9, 1, 0, 1, 1602019008, 1),
(28, 10, 61, 15, 9, 1, 0, 1, 1602019008, 1),
(29, 10, 61, 31, 9, 1, 0, 1, 1602019008, 1),
(30, 10, 61, 35, 9, 1, 0, 1, 1602019008, 1),
(31, 10, 61, 41, 9, 1, 0, 1, 1602019008, 1),
(32, 10, 61, 42, 9, 1, 0, 1, 1602019008, 1),
(33, 10, 61, 46, 9, 1, 0, 1, 1602019008, 1),
(34, 10, 61, 60, 9, 1, 0, 1, 1602019008, 1),
(51, 10, 46, 61, 15, 2, 0, 2, 1602054818, 0),
(150, 22, 2, 60, 9, 1, 0, 1, 1603567183, 1),
(149, 22, 2, 46, 9, 1, 0, 1, 1603567183, 1),
(148, 22, 2, 42, 9, 1, 0, 1, 1603567183, 1),
(147, 22, 2, 41, 9, 1, 0, 1, 1603567183, 1),
(146, 22, 2, 35, 9, 1, 0, 1, 1603567183, 1),
(145, 22, 2, 31, 9, 1, 0, 1, 1603567183, 1),
(144, 22, 2, 15, 9, 1, 0, 1, 1603567183, 1),
(143, 22, 2, 13, 9, 1, 0, 1, 1603567183, 1),
(142, 22, 2, 12, 9, 1, 0, 1, 1603567183, 1),
(141, 22, 2, 49, 9, 1, 0, 1, 1603567183, 1),
(140, 22, 2, 8, 9, 1, 0, 1, 1603567183, 1),
(139, 22, 2, 6, 9, 1, 0, 1, 1603567183, 1),
(138, 22, 2, 5, 9, 1, 0, 1, 1603567183, 1),
(153, 23, 2, 6, 9, 1, 0, 1, 1603567484, 1),
(154, 23, 2, 8, 9, 1, 0, 1, 1603567484, 1),
(155, 23, 2, 49, 9, 1, 0, 1, 1603567484, 1),
(156, 23, 2, 12, 9, 1, 0, 1, 1603567484, 1),
(157, 23, 2, 13, 9, 1, 0, 1, 1603567484, 1),
(158, 23, 2, 15, 9, 1, 0, 1, 1603567484, 1),
(159, 23, 2, 31, 9, 1, 0, 1, 1603567484, 1),
(160, 23, 2, 35, 9, 1, 0, 1, 1603567484, 1),
(161, 23, 2, 41, 9, 1, 0, 1, 1603567484, 1),
(162, 23, 2, 42, 9, 1, 0, 1, 1603567484, 1),
(163, 23, 2, 46, 9, 1, 0, 1, 1603567484, 1),
(164, 23, 2, 60, 9, 1, 0, 1, 1603567484, 1),
(165, 23, 2, 68, 9, 1, 0, 1, 1603567484, 1),
(166, 24, 2, 5, 9, 1, 0, 1, 1603567599, 1),
(167, 24, 2, 6, 9, 1, 0, 1, 1603567599, 1),
(168, 24, 2, 8, 9, 1, 0, 1, 1603567599, 1),
(169, 24, 2, 49, 9, 1, 0, 1, 1603567599, 1),
(170, 24, 2, 12, 9, 1, 0, 1, 1603567599, 1),
(171, 24, 2, 13, 9, 1, 0, 1, 1603567599, 1),
(172, 24, 2, 15, 9, 1, 0, 1, 1603567599, 1),
(173, 24, 2, 31, 9, 1, 0, 1, 1603567599, 1),
(174, 24, 2, 35, 9, 1, 0, 1, 1603567599, 1),
(175, 24, 2, 41, 9, 1, 0, 1, 1603567599, 1),
(176, 24, 2, 42, 9, 1, 0, 1, 1603567599, 1),
(177, 24, 2, 46, 9, 1, 0, 1, 1603567599, 1),
(178, 24, 2, 60, 9, 1, 0, 1, 1603567599, 1),
(179, 24, 2, 68, 9, 1, 0, 1, 1603567599, 1),
(180, 25, 62, 5, 9, 1, 0, 1, 1603619140, 1),
(181, 25, 62, 6, 9, 1, 0, 1, 1603619140, 1),
(182, 25, 62, 8, 9, 1, 0, 1, 1603619140, 1),
(183, 25, 62, 49, 9, 1, 0, 1, 1603619140, 1),
(184, 25, 62, 12, 9, 1, 0, 1, 1603619140, 1),
(185, 25, 62, 13, 9, 1, 0, 1, 1603619140, 1),
(186, 25, 62, 15, 9, 1, 0, 1, 1603619140, 1),
(187, 25, 62, 31, 9, 1, 0, 1, 1603619140, 1),
(188, 25, 62, 35, 9, 1, 0, 1, 1603619140, 1),
(189, 25, 62, 41, 9, 1, 0, 1, 1603619140, 1),
(190, 25, 62, 42, 9, 1, 0, 1, 1603619140, 1),
(191, 25, 62, 46, 9, 1, 0, 1, 1603619140, 1),
(192, 25, 62, 60, 9, 1, 0, 1, 1603619140, 1),
(193, 25, 62, 68, 9, 1, 0, 1, 1603619140, 1),
(223, 29, 149, 6, 9, 1, 0, 1, 1625462630, 1),
(222, 29, 149, 5, 9, 1, 0, 1, 1625462630, 1),
(221, 28, 136, 83, 9, 1, 0, 1, 1614176836, 0),
(220, 28, 136, 78, 9, 1, 0, 1, 1614176836, 0),
(219, 28, 136, 66, 9, 1, 0, 1, 1614176836, 0),
(218, 27, 98, 75, 9, 1, 0, 1, 1605959016, 1),
(217, 27, 98, 41, 9, 1, 0, 1, 1605959016, 1),
(216, 27, 98, 35, 9, 1, 0, 1, 1605959016, 1),
(215, 27, 98, 31, 9, 1, 0, 1, 1605959016, 1),
(214, 27, 98, 15, 9, 1, 0, 1, 1605959016, 1),
(213, 27, 98, 13, 9, 1, 0, 1, 1605959016, 1),
(212, 27, 98, 12, 9, 1, 0, 1, 1605959016, 1),
(211, 27, 98, 49, 9, 1, 0, 1, 1605959016, 1),
(210, 27, 98, 6, 9, 1, 0, 1, 1605959016, 1),
(209, 27, 98, 5, 9, 1, 0, 1, 1605959016, 1),
(224, 29, 149, 49, 9, 1, 0, 1, 1625462630, 1),
(225, 29, 149, 12, 9, 1, 0, 1, 1625462630, 1),
(226, 29, 149, 13, 9, 1, 0, 1, 1625462630, 1),
(227, 29, 149, 15, 9, 1, 0, 1, 1625462630, 1),
(228, 29, 149, 31, 9, 1, 0, 1, 1625462630, 1),
(229, 29, 149, 35, 9, 1, 0, 1, 1625462630, 1),
(230, 29, 149, 41, 9, 1, 0, 1, 1625462630, 1),
(231, 29, 149, 75, 9, 1, 0, 1, 1625462630, 1),
(232, 30, 149, 5, 9, 1, 0, 1, 1625462668, 1),
(233, 30, 149, 6, 9, 1, 0, 1, 1625462668, 1),
(234, 30, 149, 49, 9, 1, 0, 1, 1625462668, 1),
(235, 30, 149, 12, 9, 1, 0, 1, 1625462668, 1),
(236, 30, 149, 13, 9, 1, 0, 1, 1625462668, 1),
(237, 30, 149, 15, 9, 1, 0, 1, 1625462668, 1),
(238, 30, 149, 31, 9, 1, 0, 1, 1625462668, 1),
(239, 30, 149, 35, 9, 1, 0, 1, 1625462668, 1),
(240, 30, 149, 41, 9, 1, 0, 1, 1625462668, 1),
(241, 30, 149, 75, 9, 1, 0, 1, 1625462668, 1),
(242, 34, 7, 32, 9, 1, 0, 1, 1628196972, 0),
(243, 34, 7, 57, 9, 1, 0, 1, 1628196972, 0),
(244, 34, 7, 72, 9, 1, 0, 1, 1628196972, 0),
(245, 34, 7, 96, 9, 1, 0, 1, 1628196972, 0),
(246, 34, 7, 107, 9, 1, 0, 1, 1628196972, 0),
(247, 38, 2, 4, 9, 1, 0, 1, 1642362705, 0),
(248, 38, 2, 5, 9, 1, 0, 1, 1642362705, 0),
(249, 38, 2, 6, 9, 1, 0, 1, 1642362705, 0),
(250, 38, 2, 77, 9, 1, 0, 1, 1642362705, 0),
(251, 38, 2, 49, 9, 1, 0, 1, 1642362705, 0),
(252, 38, 2, 10, 9, 1, 0, 1, 1642362705, 0),
(253, 38, 2, 51, 9, 1, 0, 1, 1642362705, 0),
(254, 38, 2, 12, 9, 1, 0, 1, 1642362705, 0),
(255, 38, 2, 13, 9, 1, 0, 1, 1642362705, 0),
(256, 38, 2, 14, 9, 1, 0, 1, 1642362705, 0),
(257, 38, 2, 15, 9, 1, 0, 1, 1642362705, 0),
(258, 38, 2, 16, 9, 1, 0, 1, 1642362705, 0),
(259, 38, 2, 17, 9, 1, 0, 1, 1642362705, 0),
(260, 38, 2, 18, 9, 1, 0, 1, 1642362705, 0),
(261, 38, 2, 19, 9, 1, 0, 1, 1642362705, 0),
(262, 38, 2, 20, 9, 1, 0, 1, 1642362705, 0),
(263, 38, 2, 21, 9, 1, 0, 1, 1642362705, 0),
(264, 38, 2, 27, 9, 1, 0, 1, 1642362705, 0),
(265, 38, 2, 28, 9, 1, 0, 1, 1642362705, 0),
(266, 38, 2, 29, 9, 1, 0, 1, 1642362705, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_trans`
--

CREATE TABLE `notifications_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id_fk` bigint(20) NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications_trans`
--

INSERT INTO `notifications_trans` (`id`, `notification_id_fk`, `lang`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'طلب جديد ', 'لديك طلب جديد ', 1572566400, 1572566400),
(2, 1, 'en', 'New Order', 'you have new order ', 1572566400, 1572566400),
(3, 2, 'ar', 'خدمة منتهية ', 'تم انهاء الخدمة يرجى تقييم مقدم الخدمة ', 1572566400, 1572566400),
(4, 2, 'en', 'Expired service', 'Service completed, please rate the service provider', 1572566400, 1572566400),
(5, 3, 'ar', 'تم تقييمك', 'تم تقييمك من العميل', 1572566400, 1572566400),
(6, 3, 'en', 'Your rating', 'You have been rated by the customer', 1572566400, 1572566400);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_page_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_page_title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_link` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `perant_id` int(11) NOT NULL,
  `level` tinyint(4) DEFAULT '0',
  `page_order` tinyint(4) DEFAULT '0',
  `page_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `image`, `link`, `created_at`, `updated_at`, `deleted`) VALUES
(1, '34063ab6ec8d53e22b1d515775876cb7.png', 'http://www.maxiflexllc.com/', 1580577801, 1580577801, 0),
(2, 'cae6cbe19582c3081dbf633e242c1adf.png', 'https://www.corkmedical.com/', 1580578292, 1580578292, 0),
(3, '104e3ea1f3a4b7fdb284a9a763e1d0db.png', 'https://www.pharmaplast-online.net/', 1580578932, 1580578932, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partners_trans`
--

CREATE TABLE `partners_trans` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners_trans`
--

INSERT INTO `partners_trans` (`id`, `partner_id`, `title`, `content`, `lang`) VALUES
(1, 3, 'فارما بلاست ', 'تؤمن هذه الشركة بالابتكار المستمر وضمان الجودة وانتاج منتجات جديده للعناية بالجروح وجعلها متاحة للعاملين في القطاع الصحي ', 'ar'),
(2, 3, 'Pharmaplast', 'Pharmaplast believes in consistent innovation, quality assurance and the generation of making new wound care products available to medical professionals', 'en'),
(3, 3, 'Pharmaplast', 'Esta empresa cree en la innovación constante, el aseguramiento de la calidad y la generación de poner a disposición de los profesionales médicos nuevos productos para el cuidado de heridas.', 'es'),
(9, 2, 'Cork Medical ', '                Cork Medical es un fabricante de dispositivos médicos y superficies de soporte que se especializa en el diseño y la fabricación de productos innovadores para el tratamiento y la prevención de heridas.            ', 'es'),
(8, 2, 'Cork Medical ', '                Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds            ', 'en'),
(7, 2, 'كورك ميديكال', '                كورك ميديكال هي شركة مصنّعة للأجهزة الطبية ومراتب الدعم متخصصة في تصميم وتصنيع منتجات مبتكرة لعلاج الجروح والوقاية منها            ', 'ar'),
(10, 1, 'ماكسي فليكس ش م م ', 'تأسست ماكسي فلكس في عام 2002 ، ويقود الشركه فريق الإدارة ذو الخبرة والمهندسون الذين لديهم معرفة واسعة في تطوير وتسويق الأجهزة الطبية في تخصص المسالك البولية', 'ar'),
(11, 1, 'MaxiFlex LLC', 'MaxiFlex Founded in 2002, MaxiFlex is led by our experienced management team and engineers who have an extensive knowledge in the development and commercialization of Urological medical devices', 'en'),
(12, 1, 'MaxiFlex LLC', 'MaxiFlex Fundada en 2002, MaxiFlex está dirigida por nuestro experimentado equipo de gestión e ingenieros que tienen un amplio conocimiento en el desarrollo y comercialización de dispositivos médicos urológicos.', 'es'),
(13, 2, 'كورك ميديكال ', 'كورك ميديكال هي شركة مصنّعة للأجهزة الطبية واسطح الدعم متخصصة في تصميم وتصنيع منتجات مبتكرة لعلاج الجروح والوقاية منها ومن اهم منتجات الشركة مضخة علاج الجروح بالضغط السالب ، مراتب خاصة والوسائد', 'ar'),
(14, 2, 'Cork Medical ', 'Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds. The company products consist of Negative Pressure Wound Therapy, Specialty Mattresses, Overlays, and Cushions', 'en'),
(15, 2, 'Cork Medical ', 'Cork Medical es un fabricante de dispositivos médicos y superficies de soporte que se especializa en el diseño y fabricación de productos innovadores para el tratamiento y prevención de heridas. Los productos de la compañía consisten en terapia de heridas de presión negativa, colchones especiales, revestimientos y cojines', 'es'),
(16, 3, 'فارما بلاست ', 'تؤمن فارمابلاست بالابتكار المستمر وضمان الجودة وتطوير منتجات جديده للعناية بالجروح واتاحتها للمهنيين الطبيين وكذلك نؤمن أيضًا بتوفير أقصى درجات جودة الرعاية الصحيه للمريض مع الحفاظ على الأسعار منخفضة التكلفة', 'ar'),
(17, 3, 'Pharmaplast', 'Pharmaplast believes in consistent innovation, quality assurance, and the generation of making new wound care products available to medical professionals who also believe in providing maximum patient quality of care while keeping prices cost-efficient', 'en'),
(18, 3, 'Pharmaplast', 'Pharmaplast cree en la innovación constante, el aseguramiento de la calidad y la generación de poner a disposición de los profesionales médicos nuevos productos para el cuidado de heridas que también creen en proporcionar la máxima calidad de atención al paciente y mantener los precios rentables.', 'es');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `add_btn` tinyint(4) DEFAULT '1',
  `edit_btn` tinyint(4) DEFAULT '1',
  `delete_btn` tinyint(4) DEFAULT '1',
  `approve_btn` tinyint(4) DEFAULT '1',
  `details_btn` tinyint(4) DEFAULT '1',
  `print_btn` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `medical_tourism_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `medical_tourism_id`, `image`, `link`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, '114080a2c7eb408b503ff4de4f8ba7a5.png', 'www.mymedholiday.com', 1578952838, 1578954321, 0),
(2, 2, 'e69b584bff9c2cbfceca0d68537a11e7.png', 'mediterraneanhealthcare.com', 1578953060, 1578954336, 0);

-- --------------------------------------------------------

--
-- Table structure for table `places_trans`
--

CREATE TABLE `places_trans` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places_trans`
--

INSERT INTO `places_trans` (`id`, `place_id`, `title`, `address`, `content`, `lang`) VALUES
(9, 1, 'Mediterranean Health Care', 'España', '                Mediterranean Health Care es una asociación sin fines de lucro que agrupa a ocho de los hospitales privados y clínicas de salud más prestigiosos de la provincia de Alicante, España.            ', 'es'),
(8, 1, ' Health Care', 'Spain', '                Mediterranean Health Care is a non-profit association that groups together eight of the most prestigious private hospitals and health clinics in the province of Alicante, Spain.\r\n            ', 'en'),
(7, 1, 'ميداترنال هيلسى كار ', 'اسبانيا', '                هي جمعية غير ربحية تجمع بين ثمانية من أرقى المستشفيات والعيادات الصحية الخاصة في مقاطعة اليكانتي ، إسبانيا.            ', 'ar'),
(12, 2, 'VISSUM Madrid Santa Hortensia', 'España', '                La vista es uno de los sentidos más importantes. Sin embargo, su declive puede afectarnos a lo largo de nuestras vidas. Cuando llegue ese momento, la mejor recompensa es saber que tienes razón con los profesionales que cuidan tus ojos.            ', 'es'),
(11, 2, 'VISSUM', 'Spain', '                The view is one of the most important senses. However, its decline can affect us along our lives. When that time comes, the best reward is knowing that you are right with the professionals who care for your eyes.            ', 'en'),
(10, 2, 'مدريد سانتا هورتينسيا', 'اسبانيا', '                وجهة النظر هي واحدة من أهم الحواس. ومع ذلك ، يمكن أن يؤثر انخفاضنا على حياتنا. عندما يأتي ذلك الوقت ، فإن أفضل مكافأة هي معرفة أنك على صواب مع المهنيين الذين يهتمون بعينيك.            ', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `prices_countries`
--

CREATE TABLE `prices_countries` (
  `shop_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_first` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prices_countries`
--

INSERT INTO `prices_countries` (`shop_id`, `country_id`, `is_first`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`) VALUES
(1, 50, 'yes', 1593462929, 2, 1593462929, 0, 0),
(2, 142, 'no', 1593791309, 2, 1593791309, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `main_dep_id` int(11) NOT NULL,
  `sub_dep_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `stock` double NOT NULL DEFAULT '0',
  `campany_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `license_image` varchar(255) NOT NULL,
  `license_num` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `main_dep_id`, `sub_dep_id`, `image`, `icon`, `stock`, `campany_id`, `country_id`, `partner_id`, `license_image`, `license_num`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 2, 4, 'cb4f96ee91e64d09c094c8d962820f4d.jpg', NULL, 12, 1, 2, 1, '1d2cc16089d82fc1ffa446cd9f13c5f8.png', '3213213', 1593636795, 1600540105, 2, 3, 0),
(2, 2, 4, '61c6bc3c249027cb3b0d41efcc33a8f8.jpg', NULL, 12, 1, 7, 1, '4ec49060d5efe20dc2f0b5520dac1692.png', '4325342545234', 1593791195, 1600540344, 2, 3, 0),
(3, 2, 4, '064ed2b38963aa525d438115b8e61b34.jpg', NULL, 212, 1, 3, 1, 'b5a02a80d1884ff135b3cdbe81414016.png', '212121234123', 1593791698, 1600540020, 2, 3, 0),
(4, 2, 9, 'e0a1738c0a4a9d2f4813bba752f7141b.jpg', NULL, 20, 1, 50, 1, '88866d9edf07e77f4a2ac2ec2d03ad1c.jpg', '25252', 1600521059, 1600540511, 3, 3, 0),
(5, 2, 4, '714751a3b09fc71eefdc640b3c9c7a2c.jpg', NULL, 12, 1, 23, 2, '064d28cbf1da75dbb902cd61abd6f8f4.png', '65254821', 1600539227, 1600539227, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_campanies`
--

CREATE TABLE `products_campanies` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_campanies`
--

INSERT INTO `products_campanies` (`id`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, NULL, 1593380865, 1593381155, 2, 2, 0),
(2, NULL, 1607333290, 1607333290, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_campanies_trans`
--

CREATE TABLE `products_campanies_trans` (
  `id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `campany_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_campanies_trans`
--

INSERT INTO `products_campanies_trans` (`id`, `lang`, `campany_id`, `title`, `content`) VALUES
(6, 'es', 1, 'Super Care', NULL),
(5, 'en', 1, 'Super Care', NULL),
(4, 'ar', 1, 'سوبر كاير', NULL),
(7, 'ar', 2, 'اكسترا-ميل للتجارة', NULL),
(8, 'en', 2, 'Extra-Mile Trading', NULL),
(9, 'es', 2, 'Extra-Mile Trading', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`) VALUES
(3, 1, '45b7b0bf5f9e43e6d04dfc49720c7b87.jpg'),
(4, 2, '7df9b40253ff11bb4848f3980f12aea6.jpg'),
(5, 2, '44f40e916c3647dd7f2fa7281b2a55c7.jpg'),
(6, 3, '2d475a48557d216db77f56f160bac3de.jpg'),
(13, 4, 'e45e4dd118a5c5a81ff0842f00133cce.jpg'),
(12, 4, '6052c63215887abe571a3844982c3e9d.jpg'),
(9, 5, 'a4854d1afb1563c1ae70ff98aad8f1ae.jpg'),
(10, 5, 'abe2242ecc35b0f44c9872cf5a0deb22.jpg'),
(11, 5, 'd1befdad9bfc54a7be23f529e2d0e6e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_lang`
--

CREATE TABLE `products_lang` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_lang`
--

INSERT INTO `products_lang` (`id`, `product_id`, `shop_id`) VALUES
(14, 1, 1),
(15, 2, 1),
(13, 3, 2),
(12, 3, 1),
(17, 4, 2),
(16, 4, 1),
(11, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_partners`
--

CREATE TABLE `products_partners` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_partners`
--

INSERT INTO `products_partners` (`id`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, '11902c3106e99a2b3a552d94681bacdb.png', 1598818304, 1598818304, 5, 0, 0),
(2, NULL, 1600537971, 1600537971, 3, 0, 0),
(3, 'f679af34bc96e1e082d2e46af18900ea.jpeg', 1602010718, 1602010718, 6, 0, 0),
(4, '04f3868594144300966961a93fbe66cc.jpeg', 1602010720, 1602010720, 0, 0, 0),
(5, '0', 1603021859, 1603021859, 7, 0, 0),
(6, '7dc9d18d14c1ddd9f04c358eb90ef7c2.jpg', 1603224155, 1603224155, 8, 0, 0),
(7, '0', 1614758643, 1614758643, 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_partners_trans`
--

CREATE TABLE `products_partners_trans` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_partners_trans`
--

INSERT INTO `products_partners_trans` (`id`, `partner_id`, `lang`, `title`, `content`) VALUES
(1, 1, 'ar', 'هوم كير', NULL),
(2, 1, 'en', 'home care', NULL),
(3, 1, 'es', 'home care', NULL),
(4, 2, 'ar', 'شركة الفاطمية لتجارة وتوزيع الأجهزة الطبية', NULL),
(5, 2, 'en', 'Al Fatimia Company for the trade and distribution of medical devices', NULL),
(6, 2, 'es', 'Al Fatimia Company for the trade and distribution of medical devices', NULL),
(7, 3, 'ar', 'اكسترا ميل للتجاره', NULL),
(8, 3, 'en', 'EXTRAMILE TRADING ', NULL),
(9, 4, 'ar', 'اكسترا ميل للتجاره', NULL),
(10, 4, 'en', 'EXTRAMILE TRADING ', NULL),
(11, 5, 'ar', 'اكسترا ميل للتجاره', NULL),
(12, 5, 'en', 'Extramile Trading ', NULL),
(13, 6, 'ar', 'المتحدة ', NULL),
(14, 6, 'en', 'home care', NULL),
(15, 7, 'ar', 'ASHRAF KHAIRY', NULL),
(16, 7, 'en', 'ASHRAF KHAIRY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_prices`
--

CREATE TABLE `products_prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `main_dep_id` int(11) NOT NULL,
  `sub_dep_id` int(11) NOT NULL,
  `campany_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `old_price` double NOT NULL DEFAULT '0',
  `sell_count` int(11) NOT NULL DEFAULT '0',
  `have_offer` enum('on','off') NOT NULL DEFAULT 'off',
  `offer_type` enum('per','value') NOT NULL DEFAULT 'per',
  `offer_value` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_prices`
--

INSERT INTO `products_prices` (`id`, `product_id`, `shop_id`, `main_dep_id`, `sub_dep_id`, `campany_id`, `country_id`, `partner_id`, `price`, `old_price`, `sell_count`, `have_offer`, `offer_type`, `offer_value`) VALUES
(14, 1, 1, 2, 4, 1, 2, 1, 12, 12, 0, 'off', 'per', 0),
(15, 2, 1, 2, 4, 1, 7, 1, 300, 300, 0, 'off', 'per', 0),
(13, 3, 2, 2, 4, 1, 3, 1, 63, 63, 0, 'off', 'per', 0),
(12, 3, 1, 2, 4, 1, 3, 1, 108, 108, 0, 'off', 'per', 0),
(17, 4, 2, 2, 9, 1, 50, 1, 600, 600, 0, 'off', 'per', 0),
(16, 4, 1, 2, 9, 1, 50, 1, 2000, 2000, 0, 'off', 'per', 0),
(11, 5, 1, 2, 4, 1, 23, 2, 600, 600, 0, 'off', 'value', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_trans`
--

CREATE TABLE `products_trans` (
  `id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `text_list` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_trans`
--

INSERT INTO `products_trans` (`id`, `lang`, `product_id`, `title`, `content`, `text_list`) VALUES
(37, 'ar', 1, 'جهاز قياص الضغط', 'جهاز قياس ضغط الدم من أعلى الذراع من بيورير BM40 هو جهاز متطور لمراقبة ضغط الدم في أعلى الذراع وهو دقيق ومبتكر وسهل الاستخدام. تصميم سهل الاستخدام سينبه المستخدم في حالة حدوث خطأ في التطبيق ولديه مفتاح إيقاف تلقائي. يتميز بالوظيفة المفيدة المتمثلة في قراءة القيمة المتوسطة لجميع القياسات المخزنة ، بما في ذلك نتائج ضغط الدم في الصباح والمساء خلال آخر 7 أيام. قياس ضغط الدم والنبض أوتوماتيكيًا بالكامل في أعلى الذراع مع الكفة ليناسب الأشخاص الذين يبلغ محيطهم 23-35 سم. يحتوي BM40 على قناتين ذاكرة x مع 60 مساحة ذاكرة في كل منهما. يأتي أيضًا مع حقيبة تخزين عملية مريحة للسفر أو التخزين ودليل المستخدم سهل المتابعة. تشمل الملحقات الاختيارية المتوفرة وحدة إمداد طاقة وكفة مقاس XL (30-42 سم).', NULL),
(40, 'ar', 2, 'ماتش شرائط قياس السكر بالدم - 50 قطعة', 'نطاق قياس الجلوكوز 20-600 مجم / ديسيلتر\r\nنوع العينة شعري الدم الكامل\r\nمعايرة ضد (نوع العينة) البلازما- مكافئ\r\nزمن الاختبار 6 ثوان\r\nحجم العينة 0.7 ماي\r\nعينة تأثير التطبيق الشعري\r\nدرجة حرارة التشغيل 10-40 (50 ~ 104)\r\nرطوبة التشغيل 20-80٪ RH', NULL),
(34, 'ar', 3, 'مصحح لعلاج الم إبهام القدم', 'إعادة ضبط مبدأ الرافعة ، التصحيح العلمي ، الحزام السحري لإنتاج الضغط ، من خلال مبدأ الإبهام لإعادة ضبط الإبهام ، آمن وفعال.\r\nأسنان ثابتة دقيقة ، يمكن إصلاحها بشكل فعال. الفيلكرو مع تشكيل الجهد ، دقيق ودائم ، دائم.\r\nتصميم مريح ، لصق منحنى القدم ، قوة لامركزية ، لتجنب الضغط على الجانب ، وارتداء أكثر راحة.\r\nمريحة وناعمة ، صحية ومريحة ، ترس ثابت الضغط ، لمنع الانزلاق. وسادة مشط القدم القابلة للتعديل تخفف آلام مفاصل أصابع القدم ، وتحسن توزيع الضغط.', NULL),
(43, 'ar', 4, 'جرانزيا 2305-AD جهاز إستنشاق نقي - أبيض / أزرق', 'جهاز فعال\r\nزر واحد للتشغيل\r\nسهل الحمل\r\nمثالي لجميع الأعمار\r\nغرفة تخزين واحدة\r\nخالية من اللاتكس\r\nسهل التنظيف\r\nعلاج الجهاز التنفسي', NULL),
(31, 'ar', 5, 'مرتبة هوائية سوبر كير', 'تعتبر دعامات المراتب العلاجية الأساسية مفيدة لعلاج قرحة الضغط والتي تتضمن مضخة قابلة للتعديل تسمح بالرعاية الفردية وتوفر إعدادات الراحة. الوسادة الثقيلة ذات نمط الفقاعات محكمة الغلق بالحرارة بواسطة أدوات موحدة تجعل الوسادة أكثر متانة', NULL),
(32, 'en', 5, 'Super Care Air Mattress', 'Basic therapeutic mattress supports is a good for pressure ulcer therapy which includes an adjustable pump that allows for individual care give comfort settings .heavy -duty , bubble-style pad is heat sealed by uniform tooling make pad more durable', NULL),
(33, 'es', 5, 'Super Care Air Mattress', 'Basic therapeutic mattress supports is a good for pressure ulcer therapy which includes an adjustable pump that allows for individual care give comfort settings .heavy -duty , bubble-style pad is heat sealed by uniform tooling make pad more durable', NULL),
(35, 'en', 3, ' Corrector for thumb pain', 'Lever principle reset, scientific correction, the magic belt to produce pressure, through the principle of the thumb to reset the thumb, safe and effective.\r\nFine fixed teeth, can be effectively fixed. Velcro with voltage forming, delicate and durable, durable.\r\nErgonomic design, paste the foot curve, decentralized force, to avoid squeezing the side, wearing more comfortable.\r\nComfortable soft, healthy and comfortable, pressure fixed gear, to prevent sliding.Adjustable metatarsal pad relieves pain of toe joints, optimizing pressure distribution.', NULL),
(36, 'es', 3, ' Corrector for thumb pain', 'Lever principle reset, scientific correction, the magic belt to produce pressure, through the principle of the thumb to reset the thumb, safe and effective.\r\nFine fixed teeth, can be effectively fixed. Velcro with voltage forming, delicate and durable, durable.\r\nErgonomic design, paste the foot curve, decentralized force, to avoid squeezing the side, wearing more comfortable.\r\nComfortable soft, healthy and comfortable, pressure fixed gear, to prevent sliding.Adjustable metatarsal pad relieves pain of toe joints, optimizing pressure distribution.', NULL),
(38, 'en', 1, ' Blood pressure device', 'The Beurer BM40 Upper Arm Blood Pressure Monitor is a sophisticated upper arm blood pressure monitor that is accurate and innovative, whilst simple to use. Easy to use design will alert the user in case of an application error and has an automatic switch off. Features the useful function of an average value reading of all stored measurements, including morning and evening blood pressure results over the last 7 days. Fully automatic blood pressure and pulse measurement on the upper arm with cuff to fit people with 23-35 cm arm circumference. The BM40 has 2 x memory channels with 60 memory spaces on each. Also comes with a convenient practical storage pouch for travel or storage and an easy to follow user manual. Optional accessories available include a power supply unit and an XL cuff (30-42cm).', NULL),
(39, 'es', 1, ' Blood pressure device', 'The Beurer BM40 Upper Arm Blood Pressure Monitor is a sophisticated upper arm blood pressure monitor that is accurate and innovative, whilst simple to use. Easy to use design will alert the user in case of an application error and has an automatic switch off. Features the useful function of an average value reading of all stored measurements, including morning and evening blood pressure results over the last 7 days. Fully automatic blood pressure and pulse measurement on the upper arm with cuff to fit people with 23-35 cm arm circumference. The BM40 has 2 x memory channels with 60 memory spaces on each. Also comes with a convenient practical storage pouch for travel or storage and an easy to follow user manual. Optional accessories available include a power supply unit and an XL cuff (30-42cm).', NULL),
(41, 'en', 2, 'Match Blood Glucose Strips - 50 Pcs', 'Range of Glucose Measurement 20-600 mg/dL \r\nSample Type Capillary Whole Blood\r\nCalibration against (sample type) Plasma- Equivalent\r\nTest Time 6 seconds\r\nSample Volume 0.7 uL\r\nSample Application Capillary Effect\r\nOperating Temperature 10-40 (50~104)\r\nOperating Humidity 20-80% RH', NULL),
(42, 'es', 2, 'Match Blood Glucose Strips - 50 Pcs', 'Range of Glucose Measurement 20-600 mg/dL \r\nSample Type Capillary Whole Blood\r\nCalibration against (sample type) Plasma- Equivalent\r\nTest Time 6 seconds\r\nSample Volume 0.7 uL\r\nSample Application Capillary Effect\r\nOperating Temperature 10-40 (50~104)\r\nOperating Humidity 20-80% RH', NULL),
(44, 'en', 4, 'Granzia 2305-AD Pure Nebulizer - White/blue', 'Effective device\r\nOne button for playback\r\nEasy to carry\r\nIdeal for all ages\r\nOne storage room\r\nFree of latex\r\nEasy to clean\r\nTreatment of respiratory system', NULL),
(45, 'es', 4, 'Granzia 2305-AD Pure Nebulizer - White/blue', 'Effective device\r\nOne button for playback\r\nEasy to carry\r\nIdeal for all ages\r\nOne storage room\r\nFree of latex\r\nEasy to clean\r\nTreatment of respiratory system', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_trans`
--

CREATE TABLE `project_trans` (
  `id` int(11) NOT NULL,
  `world_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `es_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_trans`
--

INSERT INTO `project_trans` (`id`, `world_key`, `ar_title`, `en_title`, `es_title`) VALUES
(1, 'contact_us', 'اتصل بنا', 'Contact Us', ' llama nos'),
(2, 'emails', 'البريد الإلكتروني', 'Email', 'Correo electrónico'),
(3, 'location', 'الموقع', 'Location', ''),
(4, 'main_menu', 'القائمة الرئيسية', 'Main menu', ''),
(5, 'home', 'الرئيسية', 'Home', ' Inicio'),
(6, 'our_vision', 'رؤيتنا', 'Our vision', 'Nuestra vision'),
(7, 'products', 'المنتجات', 'Products', ''),
(8, 'our_clients', 'عملائنا', 'Our clients', ''),
(9, 'search', 'بحث...', 'search ...', ''),
(10, 'phone_number', 'هاتف رقم', 'Phone number', ''),
(11, 'copy_right', 'جميع الحقوق محفوظة لدى', 'Copy right', ''),
(12, 'download', 'تحميل', 'Download now', 'Descargar ahora'),
(13, 'our_news', 'أخبار ', 'Our news', ''),
(14, 'follow_all_new', ' تابع كل ماهو جديد', 'Follow all new', ''),
(15, 'more', 'المزيد', 'More', ''),
(16, 'read_more', 'إقرا المزيد', 'Read more', ' Leer mas'),
(17, 'name', 'الإسم ', 'Name', 'El nombre'),
(18, 'phone', 'الهاتف', 'Phone', ' El telefono'),
(19, 'message', 'الرسالة', 'Message', ' El mensaje'),
(20, 'send_now', 'أرسل الأن', 'Send now', ' Enviar ahora'),
(21, 'last_news', 'اخر الاخباار', 'last news', ''),
(22, 'since', 'منذ', 'Since', ''),
(23, 'days', 'أيام', 'Days', ''),
(24, 'hours', 'ساعات', 'Hours', ''),
(25, 'minuts', 'دقائق', 'Minuts', ''),
(26, 'second', 'ثوانى ', 'Seconds', ''),
(27, 'availability', 'التوافر', 'Availability', ''),
(28, 'no_data', 'لا  يوجد بيانات', 'No data found', ''),
(29, 'login', 'تسجيل الدخول', 'Login', ''),
(30, 'logout', 'تسجيل الخروج', 'Logout', 'Cerrar sesión'),
(31, 'Remember_me', 'تذكرنى', 'Remember me', ''),
(32, 'Forget_Password', 'نسيت كلمة المرور', 'Forget Password ?', ''),
(33, 'user_name', 'اسم المستخدم ', 'User Name', ' Nombre de usuario'),
(34, 'password', 'كلمة المرور', 'Password', 'Contraseña'),
(35, 'correct_message', 'تاكد من إدخال البيانات الصحيحة ', 'correct User name or Password', ''),
(36, 'Select_your_language', 'اختر لغتك', 'Select your language', ''),
(37, 'arabic', 'العربية', 'Arabic', ''),
(38, 'english', 'الانجليزية', 'English', ''),
(39, 'user', 'مستخدم ', 'User', ''),
(40, 'my_profile', 'حسابى ', 'My Profile', 'Mi perfil'),
(41, 'Inbox', 'صندوق الوارد', 'Inbox', ''),
(42, 'last_login', 'اخر دخول', 'Last Login', ''),
(43, 'basic_information', 'البيانات الاساسية ', 'Basic Information', ''),
(44, 'website', 'الموقع الالكترونى', 'Website', ''),
(45, 'address', 'العنوان', 'Address', ' la dirección'),
(46, 'en_address', 'العنوان (en)', 'Address in English', ''),
(47, 'ar_address', 'العنوان (ar)', 'Address in Arabic', ''),
(48, 'phones', 'أرقام الاتصال', 'Phones', ''),
(49, 'ar_about', 'نبذه عن الشركة (ar)', 'Company Profile in Arabic', ''),
(50, 'en_about', 'نبذه عن الشركة (en)', 'Company Profile in English', ''),
(51, 'logo', 'الشعار', 'Logo', ''),
(52, 'Social_media', 'وسائل التواصل الاجتماعى', 'Social media', ''),
(53, 'about_us', 'من نحن', 'About Us', 'Sobre'),
(54, 'ar_about_us', 'من نحن (ar)', 'About Us in Arabic', ''),
(55, 'en_about_us', 'من نحن (en)', 'About Us in English', ''),
(56, 'ar_Terms', ' الشروط و الاحكام (ar) ', 'Terms and Conditions in Arabic', ''),
(57, 'en_Terms', 'الشروط و الاحكام (en)', 'Terms and Conditions in English', ''),
(58, 'Our_Departments', 'أقسـامنا', 'Our Departments', 'Nuestros departamentos'),
(59, 'WHY_CHOOSE_US', 'لماذا أخترتنا', 'WHY CHOOSE US', 'POR QUÉ ELEGIRNOS'),
(60, 'Our_Values', 'قيمنا', 'Our Values', 'Nuestros valores'),
(61, 'Our_Mission', 'مهمتنا', 'Our Mission', 'Nuestra misión'),
(62, 'Subscribe_to_our_newsletter', 'اشترك في نشرتنا الإخبارية', 'Subscribe to our newsletter', 'Suscríbete a nuestro boletín'),
(63, 'Subscribe', 'الإشتراك', 'Subscribe', 'Suscribir'),
(64, 'Parteners', 'شركائنا', 'Parteners', 'Socias'),
(65, 'Suppliers', 'الموزعين ', 'Distributors', 'Distribuidoras'),
(66, 'medical_tourism', 'سياحة علاجية', 'Medical Tourism', 'Turismo médico'),
(67, 'home_care', 'دكتور كير ', 'DR CARE', 'DR CARE'),
(68, 'Trading', 'تجارة', 'Trading', 'Comercio'),
(69, 'close', 'إغلاق', 'close', 'cerca'),
(70, 'es_address', 'العنوان (es)', 'Address in spanch', 'Dirección en español'),
(71, 'ar_address_other', 'العنوان الثانى (ar)', 'Address in Arabic', 'Dirección en árabe'),
(72, 'en_address_other', 'العنوان الثانى (en)', 'Address in English', 'Dirección en ingles'),
(73, 'es_address_other', 'العنوان الثانى (es)', 'Address in spanch', 'Dirección en español'),
(74, 'es_about', 'نبذه عن الشركة (es)', 'Company Profile in spanish', 'Perfil de la empresa en español'),
(75, 'ar_Our_Mission', 'مهمتنا (ar)', 'Our Mission (ar)', 'Nuestra misión (ar)'),
(76, 'en_Our_Mission', 'مهمتنا (en)', 'Our Mission (en)', 'Nuestra misión (en)'),
(77, 'es_Our_Mission', 'مهمتنا (es)', 'Our Mission (es)', 'Nuestra misión (es)'),
(78, 'Usefull_Links', 'روابط مفيدة', 'Usefull Links', 'Enlaces útiles'),
(79, 'Make_Order', 'إضف طلبك', 'Make Order', 'Hacer orden'),
(80, 'Make_Order_new', 'إضف طلبك', 'Make Your order now', 'Haz tu pedido ahora'),
(81, 'No_of_times', 'عدد المرات ', 'No-of-times', 'No de tiempos'),
(82, 'choose_your_date', 'اختر تاريخك', 'choose your date', 'elige tu fecha'),
(83, 'Age', 'العمر', 'Age', 'Años'),
(84, 'No_of_Patients', 'عدد المرضى', 'No-of-Patients', 'Nombrador de pacientes'),
(85, 'Gender', 'النوع', 'Gender', 'Género'),
(86, 'Male', 'ذكر', 'Male', 'masculino'),
(87, 'Female', 'أنثى', 'Female', '\r\nHembra'),
(88, 'Any', 'أى شخص', 'Any', '\r\nNinguna'),
(89, 'payment_way', 'طريقة الدفع', 'payment way', 'forma de pago'),
(90, 'phone_other', 'هاتف اخر ', 'Other Phone', 'Otro teléfono'),
(91, 'Description', 'الوصف', 'Description', 'Descripción'),
(92, 'Total', 'إجمالى ', 'Total', 'Total'),
(93, 'Send_Order', 'ارسال الطلب', 'Send Order', 'Enviar orden'),
(94, 'register', 'تسجيل', 'Register', 'Registrarse'),
(95, 'register_msg', 'من فضلك سجل بياناتك لانشاء حساب جديد!', 'Please log in to create a new account!', '¡Inicia sesión para crear una nueva cuenta!'),
(96, 'client', 'عميل', 'client', 'cliente'),
(97, 'service_provider', 'مقدم خدمة', 'provider', 'proveedor'),
(98, 'Create_New_Account', 'انشاء حساب جديد', 'Create New Account', 'Crear una nueva cuenta'),
(99, 'Register_Now', 'سجل الان', 'Register Now', 'Regístrate ahora'),
(100, 'Experience', 'خبرة', 'Experience', 'Experiencia'),
(101, 'Department', 'القسم', 'Department', 'departamento'),
(102, 'About_Me', 'عني', 'About Me', 'Sobre mí'),
(103, 'Photo', 'الصورة', 'Photo', 'Foto'),
(104, 'User Information', 'معلومات المستخدم', 'User Information', 'informacion del usuario'),
(105, 'Orders', 'الطلبات', 'Orders', 'Pedidos'),
(106, 'Notification', 'الاشعارات', 'Notification', 'Notificación'),
(107, 'Update_Account', 'تعديل الحساب', 'Update Account', 'Actualizar cuenta'),
(108, 'Change_Password', 'تعديل كلمة المرور', 'Change Password', 'Cambia la contraseña'),
(109, 'Personal_Information', 'معلومات شخصية', 'Personal Information', 'Informacion personal'),
(110, 'Order_Number', 'رقم الطلب ', 'Order Number', 'Número de orden'),
(111, 'Save_Changes', 'حفظ التغييرات ', 'Save Changes', 'Guardar cambios'),
(112, 'Current_Password', 'كلمة المرور الحالية', 'Current Password', 'contraseña actual'),
(113, 'New_Password', 'كلمة مرور جديدة', 'New Password', 'Nueva contraseña'),
(114, 'Confirm_New_Password', 'تأكيد كلمة المرور الجديدة', 'Confirm New Password', 'Confirmar nueva contraseña'),
(115, 'login_msg', 'يرجى تسجيل الدخول للعثور على طلبك!', 'Please log in to find your request !', 'Inicia sesión para encontrar tu solicitud!'),
(116, 'make_regster_msg', 'هل تريد إنشاء حساب جديد؟', 'Do you want to create a new account?', 'Quieres crear una nueva cuenta?'),
(117, 'web_name', 'داي ستار للتكنولوجيا الطبية', 'Daystar Medical Technology', 'Daystar Medical Technology'),
(118, 'banner_title', 'تعرف معنا على الخدمات', 'KNOW WITH US THE SERVICES', 'CONOZCA CON NOSOTROS LOS SERVICIOS'),
(119, 'banner_text', 'لدينا شركاء متخصصون وعلماء فيزيائيون متاحون طوال الوقت لتقديم تشخيصات عند الطلب وخدمات أخرى متعلقة بالصحة.', 'We have Professional Parteners and physicists who are available at all time to deliver on-demand diagnoses and other health related services.', '\r\nTenemos partes profesionales y físicos que están disponibles en todo momento para brindar diagnósticos a pedido y otros servicios relacionados con la salud.'),
(120, 'Emergency', 'حالة طوارئ', 'Emergency', 'Emergencia'),
(121, 'Contact_Info', 'معلومات الاتصال', 'Contact Info', 'Datos de contacto'),
(122, 'Opening_Hours', 'ساعات العمل', 'Opening Hours', 'Horario de apertura'),
(123, 'Get_in_Touch', 'ابقى على تواصل', 'Get in Touch', 'Ponerse en contacto'),
(124, 'Subject', 'الموضوع', 'Subject', 'Tema'),
(125, 'Opening_Hours_tr', '\r\n<li> الاثنين - الخميس <span> 8.00 - 19.00 </span> </li>\r\n                        <li> الجمعة <span> 8.00 - 18.30 </span> </li>\r\n                        <li> السبت <span> 9.30 - 17.00 </span> </li>\r\n                        <li> الأحد <span> 9.30 - 15.00 </span> </li>', '  <li>Monday - Thursday <span>8.00 - 19.00</span></li>\r\n                        <li>Friday <span>8.00 - 18.30</span></li>\r\n                        <li>Saturday <span>9.30 - 17.00</span></li>\r\n                        <li>Sunday <span>9.30 - 15.00</span></li>', '<li> lunes - jueves <span> 8.00 - 19.00 </span> </li>\r\n                        <li> viernes <span> 8.00 - 18.30 </span> </li>\r\n                        <li> Sábado <span> 9.30 - 17.00 </span> </li>\r\n                        <li> domingo <span> 9.30 - 15.00 </span> </li>'),
(126, 'order_empty_msg', 'لا يوجد لديك طلبات', 'You have no requests', 'No tienes solicitudes'),
(127, 'note_empty_msg', 'لا يوجد لديك إشعارات', 'You have no notifications', 'No tienes notificaciones'),
(128, 'accept', 'قبول', 'accept', 'aceptar'),
(129, 'refuse', 'رفض', 'refuse', 'negar'),
(130, 'end_order', 'انهاء الطلب\r\n', 'End order', 'Orden final'),
(131, 'ar_client_condition', 'شروط التسجيل كعميل (ar)', 'Terms of registration as a customer (ar)', 'Términos de registro como cliente (ar)'),
(132, 'en_client_condition', 'شروط التسجيل كعميل (en)', 'Terms of registration as a customer (en)', 'Términos de registro como cliente (en)'),
(133, 'ar_provider_condition', 'شروط التسجيل كمقدم خدمة (ar)', 'Conditions for registration as a service provider (ar)', 'Condiciones para registrarse como proveedor de servicios (ar)'),
(134, 'en_provider_condition', 'شروط التسجيل كمقدم خدمة (en)', 'Conditions for registration as a service provider (en)', 'Condiciones para registrarse como proveedor de servicios (en)'),
(135, 'ar_termis_condition', 'الشروط و الاحكام(ar)', 'Terms and Conditions (ar)', 'Términos y Condiciones(ar)'),
(136, 'en_termis_condition', 'الشروط و الاحكام(en)', 'Terms and Conditions (en)', 'Términos y Condiciones(en)'),
(137, 'download_app_text', 'يمكنك الآن تنزيل آخر التحديثات من التطبيق الذي يتم من خلاله ،\r\n<br />\r\n                               قم بتسجيل الدخول إلى Google-play إذا كان هاتفك Android أو من خلال App-Store\r\nإذا كان هاتفك هو iPhone', 'You can now download the latest updates from the application they are through,\r\n								 <br />\r\n                               Login to Google-play if your phone is Android or through the App-Store \r\n								if your phone is iPhone', 'Ahora puede descargar las últimas actualizaciones de la aplicación a través de la cual se encuentran,\r\n<br />\r\n                               Inicie sesión en Google-play si su teléfono es Android o a través de App-Store\r\nsi tu teléfono es iPhone'),
(138, 'Available_on_the', 'متوفر على', 'Available on the', 'Disponible en el'),
(139, 'App_Store', 'Application App Store link', 'App Store', 'App Store'),
(140, 'Play_Store', 'Application Play Store link', 'Play Store', 'Play Store'),
(141, 'Order_status', 'حالة الطلب ', 'Order status', 'Estado del pedido'),
(142, 'pending', 'قيد الانتظار', 'pending', 'pendiente'),
(143, 'accepted', 'قبلت', 'accepted', 'aceptada'),
(144, 'previous', 'سابق', 'Previous', 'Anterior'),
(145, 'price', 'السعر', 'price', 'precio'),
(146, 'date', 'التاريخ', 'date', 'fecha'),
(147, 'Specialization', 'التخصص', 'Specialization', 'Specialization'),
(148, 'Service provider code', 'كود مقدم الخدمه', 'Service provider code', 'Service provider code'),
(149, 'Registration by another service provider Service provide code', 'التسجيل عن طريق مقدم خدمه اخر\r\nكود مقدم الخدمه', 'Registration by another service provider Service provide code', 'Registration by another service provider Service provide code'),
(150, 'Region', 'المنطقه', 'Region', 'Region'),
(151, 'ar_about_market', 'عن المتجر', 'About the store', ''),
(152, 'en_about_market', '(en )عن المتجر', 'About the store (en)', ''),
(153, 'en_terms_market', '(en )شروط واحكام المتجر', 'Terms and conditions of the store (en)', ''),
(154, 'ar_terms_market', 'شروط واحكام المتجر', 'Terms and conditions of the store', ''),
(155, 'All', 'الكل ', 'All', 'All'),
(156, 'market', 'المتجر', 'Market', 'market'),
(157, 'Favorite', 'المفضلة', 'Favorite', 'Favorito'),
(158, 'Successfully added to the cart', 'تم الاضافة للسلة بنجاح', 'Successfully added to the cart', 'Añadido a la cesta'),
(159, 'My Cart', 'السلة', 'My Cart', 'My Cart'),
(160, 'successfully', 'تم بنجاح', 'Successfully', 'successfully'),
(161, 'login first', 'سجل الدخول أولا', 'login first', 'Inicie sesión primero'),
(162, 'image', 'صورة', 'image', 'imagen'),
(163, 'product name', 'اسم المنتج', 'product name', 'nombre del producto'),
(164, 'quantity', 'كمية', 'quantity', 'cantidad'),
(165, 'action', 'تحكم', 'action', 'acción'),
(166, 'total price', 'الاجمالى', 'total price', 'precio total'),
(167, 'continue shopping', 'مواصلة التسوق', 'continue shopping', 'seguir comprando'),
(168, 'check out', 'الدفع', 'check out', 'revisa'),
(169, 'Billing Details', 'تفاصيل الفاتورة', 'Billing Details', 'Detalles de facturación'),
(170, 'Cash On Delivery', '', 'Cash On Delivery', 'primero'),
(171, 'go to  shopping', 'الذهاب للتسوق', 'go to  shopping', 'ir de compras'),
(172, 'List is empty', 'القائمة فارغة', 'List is empty', 'La lista esta vacía'),
(173, 'product details', 'تفاصيل المنتج', 'product details', 'Detalles de producto'),
(174, 'view detail', 'عرض التفاصيل', 'view detail', 'Ver Detalle'),
(175, 'Company Name', 'اسم الشركة', 'Company Name', 'nombre de empresa'),
(176, 'Offer', 'عرض', 'Offer', 'Oferta'),
(177, 'Main Category', 'الفئة الرئيسية', 'Main Category', 'categoria principal'),
(178, 'Sub Category', 'تصنيف فرعي', 'Sub Category', 'Subcategoría'),
(179, 'Partner', 'وكيل', 'Partner', 'Compañero'),
(180, 'Made in', 'صنع في', 'Made in', 'Hecho en'),
(181, 'Registered according to the specifications of the Ministry of Health Number', 'مسجلة حسب مواصفات وزارة الصحة برقم', 'Registered according to the specifications of the Ministry of Health Number', 'Registrado según las especificaciones del Ministerio de Salud Número'),
(182, 'add to wishlist', 'اضف الى المفضلة', 'add to wishlist', 'añadir a la lista de deseos'),
(183, 'add to cart', 'أضف إلى السلة', 'add to cart', 'Añadir al carrito');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `rate_num` varchar(100) CHARACTER SET latin1 NOT NULL,
  `rate_comment` varchar(500) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `order_id`, `from_id`, `to_id`, `rate_num`, `rate_comment`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 11, 46, 62, '4.0', 'عميل جيد', 1602054229, 1602054229, 0),
(2, 11, 62, 46, '5.0', 'ممرض محترم', 1602054257, 1602054257, 0),
(3, 10, 46, 61, '4.5', '', 1602054818, 1602054818, 0),
(4, 12, 16, 62, '0.0', '', 1602055828, 1602055828, 0),
(5, 12, 62, 16, '5.0', 'ممتازة', 1602055868, 1602055868, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `be_provider` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `advertiser_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_id` int(11) DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_lat` double NOT NULL DEFAULT '0',
  `google_long` double NOT NULL DEFAULT '0',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `exper` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_person_count` int(11) NOT NULL DEFAULT '0',
  `rating_num_count` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_login` tinyint(4) NOT NULL DEFAULT '1',
  `soft_type` tinyint(4) NOT NULL,
  `signup_by` enum('web','homecare','market','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'homecare',
  `rest_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`user_id`, `user_type`, `phone_code`, `phone`, `service_id`, `be_provider`, `name`, `user_code`, `area_id`, `advertiser_code`, `specialty_id`, `email`, `password`, `about`, `address`, `google_lat`, `google_long`, `logo`, `banner`, `gender`, `exper`, `rating_person_count`, `rating_num_count`, `is_active`, `is_login`, `soft_type`, `signup_by`, `rest_code`, `created_at`, `updated_at`, `available`, `deleted`) VALUES
(79, 1, '0020', '1140563193', 0, 0, 'walaa', 'nUFjvMO2o0', NULL, NULL, 0, 'walaaaelfatah520@gmail.com', '3987574c0e81f3707bee3babd0459b16e5aa10d8', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 1, 'homecare', '0', 1604488691, 1604488691, 1, 0),
(2, 1, '0020', '1009528930', 0, 0, 'ahmed mustafa ', 'gJ9RsffT79', NULL, NULL, 0, 'ahmd@php09.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 2, 'market', '0', 1597253818, 1603566247, 1, 0),
(4, 2, '0020', '1227208886', 2, 1, 'أمنية عاطف أحمد حسن ', 'f4XjZjN2A7', 1, NULL, 0, 'omniaatefahmed1992@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة برعاية المسنين               ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1597304716, 1599387158, 1, 0),
(5, 2, '0020', '1120442471', 1, 1, 'محسن محمد محمد', 'cFsbkqOpxv', 1, NULL, 1, 'm.mohsen95@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالعناية المركزة                ', NULL, 0, 0, '0', NULL, 1, '3', 0, 0, 1, 0, 4, 'admin', '0', 1597304941, 1603495521, 1, 0),
(6, 2, '0020', '1120708026', 1, 1, 'مصطفى على ابراهيم', 'NXnONQkJVX', 1, NULL, 1, 'mostafa_a1995@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خريج المعهد الفنى الشرطى                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 0, 4, 'admin', '0', 1597305181, 1597355197, 1, 0),
(7, 1, '0020', '1009428727', 0, 0, 'samy ali ', 'rEhHNxkwIU', NULL, NULL, 0, 'emadmagdy.developer@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '972227', 1597306352, 1628196870, 1, 0),
(77, 2, '0020', '1091197013', 8, 1, 'رباب ابراهيم سليمان', 'ilm8ZBAfQ6', 1, NULL, 0, 'nrjsazhar7@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', ' خبرة 5 سنين               ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1604481490, 1604512431, 1, 0),
(49, 2, '0020', '1210788496', 1, 1, 'مينا صبرى زاهر', '5cONml9pSU', 1, NULL, 1, 'menasociety@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالحالات الحرجة                ', NULL, 0, 0, '0', NULL, 1, '3', 0, 0, 1, 1, 4, 'admin', '0', 1599636861, 1602065068, 1, 0),
(22, 1, '0020', '1017357658', 0, 0, 'EmAd Magdy ', 'ObDi70Bh9r', NULL, NULL, 0, 'emad@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1597501624, 1598999173, 1, 0),
(10, 2, '0020', '1141167608', 1, 1, 'محمد مدنى دسوقى', 'd64RmKRvax', 1, NULL, 3, 'mmadany59@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنين                ', NULL, 0, 0, '0', NULL, 1, '12', 0, 0, 1, 1, 4, 'admin', '0', 1597306977, 1600850530, 1, 0),
(51, 2, '0020', '1205917839', 2, 1, 'رانيا صلاح امين', 'lZrOF6kySQ', 1, NULL, 0, 'mran-aca11@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 15 عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1600094663, 1600094663, 1, 0),
(12, 2, '0020', '1148048818', 1, 1, 'محمد بسيونى محمد', 'WhlTpDW9Oa', 1, NULL, 1, 'basuoniimohamed98@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 20 عام                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1597307532, 1599140647, 1, 0),
(13, 2, '0020', '1207056845', 1, 1, 'كريم كرم محمد خليل', 'DaaPPsWRuJ', 1, NULL, 1, 'karimkaram620@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالطوارئ و العناية المركزة                ', NULL, 0, 0, '0', NULL, 1, '3', 0, 0, 1, 1, 4, 'admin', '0', 1597307615, 1599118910, 1, 0),
(14, 2, '0020', '1220603322', 1, 1, 'رشا يحيى سعيد', 'iePxZqvnbK', 1, NULL, 3, 'rshayhyyyhyysyd@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 20 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1597307736, 1597307736, 1, 0),
(15, 2, '0020', '1101102039', 1, 1, 'عماد طه عبد الحميد', 'cJz5Q2brxH', 1, NULL, 1, 'emadtaha3623@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خريج المعهد الفنى الشرطى                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 0, 4, 'admin', '0', 1597307815, 1601813249, 1, 0),
(16, 2, '0020', '1112844155', 1, 1, 'دنيا خالد عبد الله', 'ecit4UsWb5', 1, NULL, 2, 'dodadoda651@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنوات                ', NULL, 0, 0, '0', NULL, 2, '11', 1, 5, 1, 1, 4, 'admin', '0', 1597307891, 1601816763, 1, 0),
(17, 2, '0020', '1062812483', 1, 1, 'هبه حسن عواد', 'KzbKdXoep8', 1, NULL, 3, 'tammezo123@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 15 عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1597307989, 1599134306, 1, 0),
(18, 2, '0020', '1118403525', 1, 1, 'احمد محمد ربيع', 'b4sGAGEjGQ', 1, NULL, 3, 'ahmed.rabee.mida@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنوات                ', NULL, 0, 0, '0', NULL, 1, '12', 0, 0, 1, 1, 4, 'admin', '0', 1597308074, 1634645578, 1, 0),
(19, 2, '0020', '1027136004', 1, 1, 'احمد محمد الحسنين', '53S8ztsg5O', 1, NULL, 3, 'ahmedelhasanin4123@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 20 عام                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1597308154, 1618893342, 1, 0),
(20, 2, '0020', '1030926480', 1, 1, 'فرحات عكاشة جمعة', '7MUJmR8k65', 1, NULL, 2, '01065375762@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 10 سنوات                ', NULL, 0, 0, '0', NULL, 1, '11', 0, 0, 1, 1, 4, 'admin', '0', 1597309511, 1597309511, 1, 0),
(21, 2, '0020', '1066859356', 1, 1, 'احمد ابراهيم بدوى', 'rbxH1B35Zs', 1, NULL, 2, 'ahmedelbeheir98@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بمكافحة العدوى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1597309641, 1597309641, 1, 0),
(23, 1, '0020', '1025263350', 0, 0, 'Mohamed Bahnasy', 'nZWNENgLWo', NULL, NULL, 0, 'mbahnasy@yahoo.com', 'e3e782772a6d37981be8b1de0029b82f19384540', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 0, 1, 'homecare', '0', 1597596323, 1602010508, 1, 0),
(24, 1, '0020', '1099347981', 0, 0, 'محمد', 'p6qAXhKKpj', NULL, NULL, 0, 'mohamedelashry@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1597750481, 1634250852, 1, 0),
(25, 1, '0020', '1018335162', 0, 0, 'حسين السيد', 'Zqgj8Fu5nA', NULL, NULL, 0, 'ibrahim.tawfik123456@gmail.com', 'aa7d45c540bac8756ce7a07dc7c1968ce6d68772', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1597868695, 1597868695, 1, 0),
(26, 1, '0020', '1285716499', 0, 0, 'محمد الن طلال', 'EHeKw5ISFe', NULL, NULL, 0, 'mohamedawad55563@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 1, 'market', '167435', 1598037715, 1601246959, 1, 0),
(27, 2, '0020', '1156487935', 1, 1, 'عبد الحفيظ حاتم المدبولى', 'y2qRzrZ7Qx', 1, NULL, 2, 'bebodandsh301@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالطوارئ      ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1598263066, 1599121624, 1, 0),
(28, 2, '0020', '1148874109', 1, 1, 'ثريا خالد بشندى', 'QsWqkcaOtS', 1, NULL, 2, 'Shaahdmohamed504@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنوات', NULL, 0, 0, '0', NULL, 2, '12', 0, 0, 1, 1, 4, 'admin', '0', 1598263271, 1599120622, 1, 0),
(29, 2, '0020', '1148860256', 1, 1, 'الاء عبد الناصر السيد', 'gfM0uzRrsD', 1, NULL, 2, 'twklmohmed4@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بحالات العناية المركزة                ', NULL, 0, 0, '0', NULL, 2, '2', 0, 0, 1, 1, 4, 'admin', '0', 1598263676, 1604411778, 1, 0),
(30, 2, '0020', '1113669364', 8, 1, 'نهى محمد عنانى', 'QhQWvaoUdk', 1, NULL, 0, 'nohaelanany364@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالتعامل مع الاطفال بالضافة انها بكالريوس تربية                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1598264004, 1604484326, 1, 0),
(31, 2, '0020', '1022736341', 1, 1, 'اسلام عماد محمد الخطيب', 'gM1wHHm4wb', 1, NULL, 1, 'islamelkhatib6@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بحالات العناية                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1598264109, 1599213304, 1, 0),
(32, 2, '0020', '1022619004', 2, 1, 'محمد حسن خليل', 'tAihB5FURn', 1, NULL, 0, 'mohakh004@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 20 سنة                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1598270888, 1599321711, 1, 0),
(33, 2, '0020', '1027897916', 1, 1, 'حنان امين عبد النبى', 'pOQ70DuxgH', 1, NULL, 3, 'hananamin117@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة عشرين عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1598271090, 1599123329, 1, 0),
(34, 1, '0020', '1069328758', 0, 0, 'تيمون', 'HXZvdWGAxf', NULL, NULL, 0, 'temoon@gmail.com', '', NULL, NULL, 0, 0, '5fa554511713aecd5fe274c1364b4018.jpeg', NULL, 0, '', 0, 0, 1, 1, 2, 'market', '0', 1598307722, 1600443099, 1, 0),
(35, 2, '0020', '1101593017', 1, 1, 'شعبان رمضان على', 'LOhPSPCD5X', 1, NULL, 1, 'shabannano1996@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بالرعاية المنزلية                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1598344308, 1604814318, 1, 0),
(36, 2, '0020', '1143555367', 2, 1, 'جيهان كمال الدين سيد', 'EEfdLMeijA', 1, NULL, 0, 'nwranjy11@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 20 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1598344792, 1598344792, 1, 0),
(37, 2, '0020', '1156770205', 1, 1, 'احمد عبد المحسن عبد الموجود', 'r6J4LcnIBB', 1, NULL, 2, 'aborodiena55@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنين                ', NULL, 0, 0, '0', NULL, 1, '12', 0, 0, 1, 1, 4, 'admin', '0', 1598345525, 1599126208, 1, 0),
(38, 2, '0020', '1120683588', 6, 1, 'د/محمد هانى غنيم', 'gWzPSFPvGr', 1, NULL, 4, 'mohamedhany561@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1599031210, 1599119071, 1, 0),
(39, 2, '0020', '1060158824', 6, 1, 'د/حياة امجد حماد', 'YxyVHzX2bX', 1, NULL, 4, 'hamadhayah@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 2, '2', 0, 0, 1, 1, 4, 'admin', '0', 1599031315, 1599660179, 1, 0),
(40, 2, '0020', '1116315192', 6, 1, 'د/يوسف اسامة خليل', 'ZkTRx1k4lR', 1, NULL, 4, 'youssef_osama@live.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1599031455, 1599128390, 1, 0),
(41, 2, '0020', '1118780744', 1, 1, 'محمد سيد عبد الله', '4zIYTk1OOe', 1, NULL, 1, 'mohoood12@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة خمس سنوات                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 1, 4, 'admin', '0', 1599031555, 1599119617, 1, 0),
(87, 2, '0020', '1140339302', 8, 1, 'منة الله محمود الشحات', 'ucsR52xYdi', 1, NULL, 0, 'randeabdo@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة جيدة فى التعامل مع الاطفال                ', NULL, 0, 0, '0', NULL, 2, '3', 0, 0, 1, 1, 4, 'admin', '0', 1605086383, 1605462541, 1, 0),
(43, 2, '0020', '1225381730', 6, 1, 'د/مفدى صلاح شاكر', 'fQKTYTEkXq', 1, NULL, 4, 'dr.mafdi@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1599116859, 1599558122, 1, 0),
(44, 2, '0020', '1123631047', 1, 1, 'بدر صبحى امين', 'NyAeW8vPV0', 1, NULL, 3, 'du7eti680@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 3 سنوات                ', NULL, 0, 0, '0', NULL, 1, '3', 0, 0, 1, 1, 4, 'admin', '0', 1599119519, 1599119519, 1, 0),
(45, 2, '0020', '1226962309', 1, 1, 'سحر فاروق حسين', 'V7nrlkd5VW', 1, NULL, 3, 'saherfarook70@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1599120393, 1599120393, 1, 0),
(88, 2, '0020', '1019813782', 3, 1, 'ضحى احمد عليوة', '75ZccxBENQ', 1, NULL, 0, 'dody7002@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة فى التعامل مع حالات التوحد و حالات الداون و الأوتيزم\r\nExperience in working as a shadow teacher                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1605086677, 1605101320, 1, 0),
(47, 1, '0020', '1094305750', 0, 0, 'ahmed emad', 'XzYpejZsWE', NULL, NULL, 0, 'ahmedemadsal@gmail.com', '7d118c1789616fb0124cf6d836d3399225e6de6b', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1599518719, 1599518922, 1, 0),
(48, 1, '0020', '1028300037', 0, 0, 'Amr Ashry', 'TOXNlvb4Wp', NULL, NULL, 0, 'amrashri2016@gmail.com', '1e697d056907ba37f4b842cf601bf65c65b2a4e5', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1599554832, 1599554832, 1, 0),
(50, 2, '0020', '1558562283', 6, 1, 'محمود رزق ', 'OsTPOB5gPK', 1, NULL, 4, 'mahmoudrizk73082@hotmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'أخصائي علاج طبيعي \nدكتوراه الاكلينيكيه كليه علاج طبيعي جامعه القاهره \nمدرب معتمد من therasuit الأمريكيه \nو adeli Suit الروسيه \nمسجل بالهيئه التخصصات الصحيه السعوديه \nمسجل نقابه العلاج الطبيعي بمصر \n  ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1599637158, 1604482807, 1, 0),
(52, 1, '0060', '122549924', 0, 0, 'dff', 'i06ooZvfw4', NULL, NULL, 0, 'dffrxplusklmy@gmail.com', '3bfa48679c30ab7ae67a576c3e73296fe1547d71', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 0, 1, 'market', '0', 1600235733, 1600235811, 1, 0),
(53, 1, '001', '4084766514', 0, 0, 'John ', 'a3hJKwlO6i', NULL, NULL, 0, 'gracegarcia76@icloud.com', 'dc648492c177f519f7ef1b5e2634f6124c6e3335', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 2, 'market', '0', 1600608676, 1600608676, 1, 0),
(54, 1, '0020', '1285716499', 0, 0, 'Mohamed ', 'ysoDoHs4Ko', NULL, NULL, 0, 'user55@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, 'def23e6b9f019f8f9561734355bb99f3.jpeg', NULL, 1, '', 0, 0, 1, 0, 2, 'homecare', '0', 1600634916, 1600634989, 1, 0),
(55, 2, '0020', '1111822822', 6, 1, 'احمد فهمى عبد الحميد', 'Ec2HY6QQVi', 1, NULL, 4, 'ahmedelsawalhey@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1600775471, 1600775471, 1, 0),
(56, 2, '0020', '1225996694', 1, 1, 'عماد رشاد حامد', '5YOkbClDiR', 1, NULL, 2, 'rashadhamd48@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1600775584, 1604504192, 1, 0),
(57, 2, '0020', '1005440557', 2, 1, 'مصطفى احمد محمود', '7TacEFOCDy', 1, NULL, 0, 'mostafa_khatib2003@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1600775721, 1603633068, 1, 0),
(58, 1, '00966', '570771170', 0, 0, 'هيثم السعيد', 'sQhpnAgjxF', NULL, NULL, 0, 'hytham.net@gmail.com', 'f9110295cf77155faece42ace9fa1a6ad6d7b3ae', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1601414280, 1601414280, 1, 0),
(59, 1, '00966', '558293231', 0, 0, 'احمد', 'vggqBuwbLR', NULL, NULL, 0, 'azubaidi@hotmail.com', 'c9c531f2aa9f8d375d9310b91971d926401a2402', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1601415207, 1601415207, 1, 0),
(63, 2, '0020', '1099347999', 1, 0, 'محمد', 'Wa7uymbTiI', 1, '', 2, 'mohamedelashry321@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'تفاصيل', NULL, 0, 0, '0', NULL, 1, '1 سنة', 0, 0, 1, 0, 1, 'homecare', '0', 1602013331, 1602013483, 1, 0),
(61, 1, '0020', '1021335088', 0, 0, 'Reham Nassef', '6vyc66rnkc', NULL, NULL, 0, 'rehamnasf@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 0, 1, 'homecare', '0', 1601813408, 1602019297, 1, 0),
(86, 1, '0020', '1064010636', 0, 0, 'rehab', 'JNjOhe47ud', NULL, NULL, 0, 'modther.ahmed2017@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 1, 'homecare', '0', 1605028002, 1605028002, 1, 0),
(64, 2, '0020', '1061678120', 6, 1, 'عبد الرحمن عادل جعفر', 'CCKr5KF2MC', 1, NULL, 5, 'abdo9271@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة بمختلف مجالات العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 1, 4, 'admin', '0', 1602588462, 1602588462, 1, 0),
(65, 2, '0020', '1100697540', 1, 1, 'محمد عبد الخالق الصياد', 'L6qlAriMCq', 1, NULL, 3, 'abdoelsayed48@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 15 سنة                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1602588639, 1610136354, 1, 0),
(66, 2, '0020', '1026358388', 1, 1, 'علياء عصام صلاح', 'Km9cpieA10', 1, NULL, 1, 'aliaaessam.19876@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنوات                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1602588795, 1605452374, 1, 0),
(67, 2, '0020', '1068438958', 6, 1, 'تامر مصطفى حسين', 'yEmXTm4Msa', 1, NULL, 5, 'tamermustafa787878@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 20 عام                ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1602589105, 1603626541, 1, 0),
(78, 2, '0020', '1033034490', 1, 1, 'هدى مهنى سيد', 'TIboxfeW4N', 1, NULL, 1, 'dodaelking1@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنين                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1604485105, 1606052534, 1, 0),
(69, 2, '0020', '1156545800', 1, 1, 'محمود خالد صابر', 'EB1M3ufjyH', 1, NULL, 2, 'mahmodselim91@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنوات                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 1, 4, 'admin', '0', 1602589552, 1602589552, 1, 0),
(72, 2, '0020', '1067772039', 2, 1, 'محمد خالد عبد المرضى', 'LOSM3NhM6r', 1, NULL, 0, 'nwraa9155@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 5 سنين                ', NULL, 0, 0, '0', NULL, 1, '5', 0, 0, 1, 1, 4, 'admin', '0', 1603625426, 1603625426, 1, 0),
(71, 2, '0020', '1149367219', 1, 1, 'نهى فاروق حسين', 'AAjWCJKdpg', 1, NULL, 3, 'mostafasalem52@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 20 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1602589935, 1602589935, 1, 0),
(73, 2, '0020', '1011930944', 2, 1, 'دعاء محمد رجب', '9d2dyvgize', 1, NULL, 0, 'doaaa7558@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 10 سنين                ', NULL, 0, 0, '0', NULL, 2, '10', 0, 0, 1, 1, 4, 'admin', '0', 1603626888, 1606890644, 1, 0),
(74, 2, '0020', '1026660458', 1, 1, 'ايمان محمد حسن', '73nIWuVJFR', 1, NULL, 3, 'emanm4590@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 15 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1603627034, 1603627034, 1, 0),
(75, 2, '0020', '1551448612', 1, 1, 'هانى عبده محمد', 'JH8fPlYq77', 1, NULL, 1, 'hanyhodhod49@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', ' خبرة اكثر من 15 سنة               ', NULL, 0, 0, '0', NULL, 1, '15', 0, 0, 1, 1, 4, 'admin', '0', 1603627499, 1604412134, 1, 0),
(82, 2, '0020', '1117116013', 6, 1, 'اسلام جمال السايس', 'XlAvKneofW', 1, NULL, 4, 'es.elsayes@hotmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنوات فى العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '6', 0, 0, 1, 1, 4, 'admin', '0', 1605011116, 1605012908, 1, 0),
(81, 2, '0020', '1118805355', 8, 1, 'رحاب جمعة لبيب', 'dZJfgDuW6o', 1, NULL, 0, 'modtherahmed2017@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 15 عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605010881, 1605010881, 1, 0),
(83, 2, '0020', '1223235098', 1, 1, 'منى عاشور حسن', 'nEaIku3HmV', 1, NULL, 1, 'shamsabuzeid51@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'حاصلة على ماجستير التمريض\r\nخبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605011353, 1605190225, 1, 0),
(84, 2, '0020', '1202892760', 2, 1, 'سعدية رشدى عزوز', 'dK8IEJWBaq', 1, NULL, 0, 'sh2369848@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنوات برعاية كبار السن                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 0, 4, 'admin', '0', 1605011512, 1607123409, 1, 0),
(85, 2, '0020', '1013129576', 3, 1, 'كريمة حسن مغربى', 'EU9E65qNEl', 1, NULL, 0, 'krymhhsn92@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة فى التعامل مع مختلف حالات ذوى الاحتياجات الخاصة.                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605013411, 1605013411, 1, 0),
(89, 2, '0020', '1060509661', 6, 1, 'مؤمن النجدى شحاتة', 'DoULGzXogt', 1, NULL, 4, 'alnjdi965@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', ' بكالريوس العلاج الطبيعى               ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1605086817, 1606461257, 1, 0),
(92, 2, '0020', '1148350130', 8, 1, 'سحر محمد شبل', 'cT0jTHsBsJ', 1, NULL, 0, 'dollyhashash@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة فى رعاية الاطفال                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605088663, 1605099682, 1, 0),
(91, 2, '0020', '1030226591', 6, 1, 'مهاب مجدى عبد الله', 'SbuczkESgg', 1, NULL, 4, 'heavymrshehata@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '814365bcea325eaa4dca7443c33efc67.png', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1605087274, 1609275648, 1, 0),
(93, 1, '0020', '1282861539', 0, 0, 'amr mgahed', '4Eu5oj6cph', NULL, NULL, 0, 'amrmgahed13@gmail.com', '1f35a29a76c429222fd268898f766821697df9ef', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1605300316, 1605300493, 1, 0),
(94, 2, '0020', '1285301402', 1, 1, 'هبه امام محمود', '4n1ni4UkTT', 1, NULL, 3, 'hobamero@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605526148, 1605611356, 1, 0),
(95, 2, '0020', '1273710955', 2, 1, 'منى عبد العزيز حافظ', '26KceJDPcB', 1, NULL, 0, 'mabdelazez375@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 سنة                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1605526260, 1605541603, 1, 0),
(96, 2, '0020', '1149063513', 2, 1, 'محمد محمود اسماعيل', '0BZEYYKNbR', 1, NULL, 0, 'mohamedhamomohamedhamomohamed@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة فى التعامل مع المسنين                ', NULL, 0, 0, '0', NULL, 1, '4', 0, 0, 1, 0, 4, 'admin', '0', 1605526411, 1606724499, 1, 0),
(97, 1, '0020', '1228811059', 0, 0, 'mohammed Abdou', 'JEHxRHCnd1', NULL, NULL, 0, 'mabdou79@gmail.com', '2465e154682f91fe0116c312b50041b84a1bf213', NULL, NULL, 0, 0, '85c78003abad31112e3a1b3ca44fd09e.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1605872522, 1605872522, 1, 0),
(98, 1, '0020', '1030044434', 0, 0, 'jarismar', 'wliT9O6nmw', NULL, NULL, 0, 'jarisfor@hotmail.com', '91135c93a8465503115f92508da31328bcea4e41', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1605958642, 1606033228, 1, 0),
(99, 1, '0020', '1030635130', 0, 0, 'Mohamed gh', '0qOqEfxd7D', NULL, NULL, 0, 'Ghghjkkj@yahoo.com', 'a4fa40613886e03a08ca0d2f95add3d43de1476c', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1606157055, 1606157079, 1, 0),
(100, 1, '00961', '3182462', 0, 0, 'Darine', 'iVJd0U7yiF', NULL, NULL, 0, 'darine.chahine@outlook.com', '3602ae8c4f57541157e71368a09af404a37abc2e', NULL, NULL, 0, 0, 'e0b5ac51405de5d2d8ba21b028ccb94b.jpeg', NULL, 2, '', 0, 0, 1, 1, 2, 'homecare', '0', 1606170234, 1606170234, 1, 0),
(101, 2, '0020', '1550228909', 6, 1, 'عبد الرحمن مجدى خليل', 'mwvilzQ20k', 1, NULL, 4, 'abdelrhmanmagdy927@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1606377320, 1636149395, 1, 0),
(102, 1, '0020', '1274700751', 0, 0, 'ahmedgamal', 'y6CfxfY3ay', NULL, NULL, 0, 'ahmedgamal20992099@gmail.com', '181631908c9fc45c1813f6d2c75a453fa24e5283', NULL, NULL, 0, 0, '8d58369f07582db15cac20670ad55738.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1606424097, 1606424097, 1, 0),
(103, 1, '0020', '1002221139', 0, 0, 'Mohamed Samy', 'vkqHjf49Wx', NULL, NULL, 0, 'msamy.ali@gmail.com', 'a9d8e19844d147d9d05220dcdb2afd73bef6e903', NULL, NULL, 0, 0, '8957901f0b59c2780ac33d2a205ae2f0.jpg', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1606510070, 1606510329, 1, 0),
(104, 1, '0020', '1289118822', 0, 0, 'Ahmeddmansourr', 'MTF75GYjrq', NULL, NULL, 0, 'ahmed.mansour8799@yahoo.com', '5ace3d56edaf1ade79ab77d449850832c73f62be', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1606659875, 1606659988, 1, 0),
(105, 2, '0020', '1007800234', 2, 1, 'وفاء مختار حمدى', '29JlBlNWSQ', 1, NULL, 0, '36xnxnznx@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 5 سنوات برعاية كبار السن                ', NULL, 0, 0, '0', NULL, 2, '5', 0, 0, 1, 1, 4, 'admin', '0', 1606725202, 1606725202, 1, 0),
(106, 2, '0020', '1228204795', 2, 1, 'صفاء صلاح الدين سيد', 'qPtLRBWgd1', 1, NULL, 0, 'safaasalah556@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 10 سنوات بمجال رعاية المسنين                ', NULL, 0, 0, '0', NULL, 2, '10', 0, 0, 1, 1, 4, 'admin', '0', 1606725333, 1606725333, 1, 0),
(107, 2, '0020', '1092497902', 2, 1, 'صلاح محمد بليدى', 'shRl6M5zP3', 1, NULL, 0, 'siaf7966@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة برعاية كبار السن                ', NULL, 0, 0, '0', NULL, 1, '3', 0, 0, 1, 1, 4, 'admin', '0', 1606725479, 1606725479, 1, 0),
(108, 2, '0020', '1116021297', 8, 1, 'سماح صادق احمد', 'X7GwLl5T23', 1, NULL, 0, 'sadiekahmed2020@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة 10 سنوات فى التعامل مع الاطفال                ', NULL, 0, 0, '0', NULL, 2, '10', 0, 0, 1, 1, 4, 'admin', '0', 1606725607, 1610042316, 1, 0),
(109, 2, '0020', '1146657001', 1, 1, 'مى جمال حسين', 'SFW9OfgjE4', 1, NULL, 3, 'mai97705@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1606725705, 1606725705, 1, 0),
(110, 1, '0020', '1011048012', 0, 0, 'ahmed', 'ySk5E8L32S', NULL, NULL, 0, 'chemistahmed88@gmail.com', '37165c870ea6bc015efa5a2e6c58103889a62e76', NULL, NULL, 0, 0, '0', NULL, 0, '', 0, 0, 1, 1, 1, 'market', '0', 1606901159, 1606901159, 1, 0),
(111, 2, '0020', '01019185810', 1, 0, 'محمدصبحي', 'yYW3y3bP1g', 1, '', 4, 'sbhy5521@gmail.com', 'ab686589db7b3ae28f990e1fe8ec6012dbd9b3c4', 'الجيزه', NULL, 0, 0, '0', NULL, 1, '5 سنة', 0, 0, 1, 1, 1, 'homecare', '0', 1607253012, 1607253012, 1, 0),
(113, 1, '0020', '1273985603', 0, 0, 'ahmed ali', 'd8NWb0Ob5Y', NULL, NULL, 0, 'gaberahmeda@gmail.com', '1132de768ab34b1fdf8f9fadded8c6a059656589', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1607428844, 1607428844, 1, 0),
(114, 1, '0020', '1273300821', 0, 0, 'Remon Botros ', 'tDsbtUzFe2', NULL, NULL, 0, 'remonbotros86@gmail.com', '55c3b5386c486feb662a0785f340938f518d547f', NULL, NULL, 0, 0, '88fd0c0574d2a14b054324fff8a7ed5e.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1607606748, 1607606748, 1, 0),
(115, 1, '0052', '4425949630', 0, 0, 'Rocio De Santiago', 'NdGCDAFqCT', NULL, NULL, 0, 'chio_081091@hotmail.com', '10023993283c3766f439bee6ca97ddef342e641c', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 1, 'homecare', '0', 1607988795, 1607988795, 1, 0),
(116, 1, '0052', '4481143079', 0, 0, 'Pérez', 'VBxjPbCUTI', NULL, NULL, 0, 'u4481216029@gmail.com', '61e94650e717b0e503430d260e684599c98c32cf', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1608017221, 1608017221, 1, 0),
(117, 1, '0020', '3153321185', 0, 0, 'Mohamedtsalem@gmail.com', 'hKsBOdlMSb', NULL, NULL, 0, 'mohamedtsalem@gmail.com', '5b21b582bdd57cf849214685905335eee9831cfc', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1608813109, 1608813109, 1, 0),
(118, 1, '0052', '5526854846', 0, 0, 'jmonarres', 'zaAIsiuCTc', NULL, NULL, 0, 'jmonarres@hotmail.com', '7b24cb89603b65e234206992d5261ad3162a8fa0', NULL, NULL, 0, 0, 'fae10131886f1a5290fb85b54d0a8be4.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1608857010, 1608857010, 1, 0),
(119, 1, '0020', '1003893194', 0, 0, 'ibrahim khaled', 'nNYxgR3PZ5', NULL, NULL, 0, 'ibrahimkhaled156@gmail.com', '7010b35d09018238d9a733c3e87c4abcf26df246', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1609143753, 1609143753, 1, 0),
(120, 1, '0020', '+101064005829', 0, 0, 'Mahmoud M Elsayed', 'y0JgZ5g9sm', NULL, NULL, 0, 'mmelsayed746@gmail.com', 'f9581863119e093c9c704a623ac65ae8d3aaaebf', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 0, 1, 'homecare', '0', 1609253504, 1609274469, 1, 0),
(121, 1, '0020', '1001741238', 0, 0, 'Mahmoud El Bendary ', 'v4tsxFQn40', NULL, NULL, 0, 'm.a.bendary@gmail.com', '437fb4e3e74a62c425cb4e483f31679ee60f5c3f', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1609327185, 1609327185, 1, 0),
(122, 1, '0020', '1229336453', 0, 0, 'Tarek Elgebily ', 'Mqg9d7H15Z', NULL, NULL, 0, 'tarek.elgebily@outlook.com', 'b625163011ab78fe532234bba5b7a5f14d2feefa', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1609328315, 1609328315, 1, 0),
(123, 2, '0020', '01555485414', 1, 0, 'Mahmoud Mohamed Elsayed', 'aH8eLbk8Ko', 1, '', 1, 'mahmoud175438@bue.edu.eg', 'f9581863119e093c9c704a623ac65ae8d3aaaebf', 'h', NULL, 0, 0, '0', NULL, 1, '2 سنة', 0, 0, 1, 1, 1, 'homecare', '0', 1609795557, 1609795557, 1, 0),
(124, 1, '0020', '1006388965', 0, 0, 'Ahmed Farouk', 'sk5i1pYewA', NULL, NULL, 0, 'a.farouk.m@gmail.com', '71f14878994c9ad6bec38554a98e4c056d2eae03', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1609837271, 1609837271, 1, 0),
(125, 1, '0020', '1221174377', 0, 0, 'marina', 'hreDgiy0og', NULL, NULL, 0, 'marina_ishak266@yahoo.com', 'ded813319a2df9c3cb3c719678b6561a0790139c', NULL, NULL, 0, 0, '84d2740d2d5a469d2ef1ecc1f3cbd402.jpeg', NULL, 2, '', 0, 0, 1, 1, 2, 'homecare', '0', 1610190256, 1610190256, 1, 0),
(126, 1, '0020', '1124272149', 0, 0, 'Sara', 'rD6wa9wu7n', NULL, NULL, 0, 'tahasoliman1972@gmail.com', '77d45319a80247fd42c14138d5675f4a6d502063', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 3, 'web', '0', 1610192310, 1610192310, 1, 0),
(129, 2, '0020', '1207077299', 6, 1, 'سالى سمير', 'zJxoxE40SR', 1, NULL, 4, 'sallyrezkallah@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 15 عام                ', NULL, 0, 0, '0', NULL, 2, '15', 0, 0, 1, 1, 4, 'admin', '0', 1610539058, 1610882159, 1, 0),
(128, 2, '0020', '1004454358', 6, 0, 'Mariam', 'j43oyClDEQ', 1, '', 4, 'mariammeshref@yahoo.com', 'a8dbba6cec12b0ca49eb56e0c7e8a63b4a2e0eef', 'About Me', NULL, 30.043489, 31.235291, '0', NULL, 2, '1', 0, 0, 1, 1, 0, 'web', '0', 1610466579, 1610466579, 1, 0),
(130, 2, '0020', '1202645964', 6, 1, 'اسلام ممدوح', 'QcYm7LFS97', 1, NULL, 4, 'eslammamdouh882@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1610539157, 1610887542, 1, 0),
(131, 2, '0020', '1016340871', 6, 1, 'محمد التريسى', '85JBAjvteN', 1, NULL, 4, 'meltresy555@yahoo.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'بكالريوس العلاج الطبيعى                ', NULL, 0, 0, '0', NULL, 1, '2', 0, 0, 1, 1, 4, 'admin', '0', 1610539276, 1610882249, 1, 0),
(132, 2, '0020', '1113741020', 6, 1, 'محمد شكشوك', 'YOWRdx1OL0', 1, NULL, 4, 'drshakshook@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'خبرة اكثر من 10 سنوات                ', NULL, 0, 0, '0', NULL, 1, '11', 0, 0, 1, 1, 4, 'admin', '0', 1610539382, 1610975989, 1, 0),
(133, 1, '0020', '1121258444', 0, 0, 'وفيق محمد ', 'dYcjHw3bvp', NULL, NULL, 0, 'wafiqnour@yahoo.com', '09d6945de4bdbd61cd97b57af4b021eed510d1e2', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1610565977, 1610565977, 1, 0),
(134, 2, '0020', '01068032582', 6, 0, 'PT Tarek Taha', 'kJWsSYEw95', 1, '', 4, 'tarekfathy4545@gmail.com', 'ba6d39ab3c026481fbd225a1f578c255763cce7f', 'د/طارق طه اخصائي العلاج الطبيعي والتأهيل \nخبره سنتين في مجال العلاج الطبيعي  وتاهيل ما بعد الجلطات والكسور والعمليات الجراحيه.. ', NULL, 0, 0, '0', NULL, 1, '2 Year', 0, 0, 1, 1, 1, 'homecare', '0', 1610620025, 1610620025, 1, 0),
(135, 1, '0020', '1122696797', 0, 0, 'احمد محمد', 'UjTHHs2KrE', NULL, NULL, 0, 'abdalwhab.wakeel@yahoo.com', 'd7a6a84e55545f5579717a1dc80a0b5f975326d0', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1613168665, 1613168665, 1, 0),
(136, 1, '0020', '1113600833', 0, 0, 'Rahama Bala', 'oL4fQrSQGW', NULL, NULL, 0, 'fahadmohammeddankabo@hotmail.com', '1676242d295570735903a8e5b673bfcfe7ec2a9e', NULL, NULL, 0, 0, '52cbfcfe14a644ac2ab294569dd12844.jpg', NULL, 2, '', 0, 0, 1, 1, 3, 'web', '0', 1614176485, 1614176485, 1, 0),
(137, 1, '0020', '1093555987', 0, 0, 'Nour Nammar', 'KYwFjvXR6L', NULL, NULL, 0, 'info@marketopia.co', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, NULL, 0, 0, '6277773aa47b21e28cd78ba85196721d.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1614206321, 1614206321, 1, 0),
(138, 1, '0020', '1211114988', 0, 0, 'Eslam Ali', 'BSWmNwLCeV', NULL, NULL, 0, 'eslamali2000@gmail.com', '2c1d29d434ba7216dd9791128f2e257bdf8dd2c7', NULL, NULL, 0, 0, '886f5e4e2ce2c947589bafd9853eeace.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1614460693, 1614460693, 1, 0),
(139, 1, '0020', '1223968779', 0, 0, 'Ashraf', 'Xfioet9ZNG', NULL, NULL, 0, 'ashrafkhairy@gmail.com', '04afb3c77c7a7046e2a1a5ed268f47bed6bf3b37', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1614758579, 1614758579, 1, 0),
(140, 1, '0084', '983233920', 0, 0, 'VKING', 'NqmZpuZvnT', NULL, NULL, 0, 'viethp1401@gmail.com', '650ce1e25af0dde3a300b9021dca9f53ef353d80', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1618399173, 1618399173, 1, 0),
(141, 1, '0020', '1274270888', 0, 0, 'Ebnhahsem', 'ExRLnoXac6', NULL, NULL, 0, 'mohamed.elnazer@advandcons.com', '7df2efc83878c39e691e531786cc3bc6bb772249', NULL, NULL, 0, 0, '9360859a458260d2a8ec7a700cb99fcc.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1621722425, 1621722425, 1, 0),
(142, 1, '0020', '1066577000', 0, 0, 'sameh', 'gAKe81R2AO', NULL, NULL, 0, 'sameh7700@yahoo.com', '45fac15a7dc0020c1b9ed1f04fdef66722badcae', NULL, NULL, 0, 0, 'fdd4fe7712a4d794cd407a7b6b2bd406.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1622635589, 1622635589, 1, 0),
(143, 1, '0020', '1012346798', 0, 0, 'mahmoud', 'PFJCbtfsFl', NULL, NULL, 0, 'mahmoudsamir7996@gmail.com', '7f35a3f6769e7eb6e10ea666a549d38945ab0483', NULL, NULL, 0, 0, 'ab5501372b77dc8be89cd6b8409b88ff.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1622792657, 1622792657, 1, 0),
(144, 1, '0020', '1098835354', 0, 0, 'eman', 'MZ9kTiJkiW', NULL, NULL, 0, 'egameel33@gmail.com', 'b85cb7a2e096cc9c555169dfc44f88adfb795142', NULL, NULL, 0, 0, '004438811fcda03c8b2d4bd5dbba149d.jpeg', NULL, 2, '', 0, 0, 1, 1, 2, 'homecare', '0', 1622829595, 1622829595, 1, 0),
(145, 1, '0020', '1091519283', 0, 0, 'mo_sayed', 'fMgMIbXk01', NULL, NULL, 0, 'melsayed556@yahoo.com', '29ea77cef33632439cb388758468283db5e2cc84', NULL, NULL, 0, 0, 'dbff9cfbceda2fc28ff38892b08fc618.jpeg', NULL, 1, '', 0, 0, 1, 1, 2, 'homecare', '0', 1622831256, 1622831256, 1, 0),
(146, 1, '0020', '1272330316', 0, 0, 'Tarek', '2r5L0QJh9a', NULL, NULL, 0, 'tarek.elgebily@gmail.com', 'b625163011ab78fe532234bba5b7a5f14d2feefa', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1622930173, 1622930173, 1, 0),
(147, 1, '0020', '1009767870', 0, 0, 'Ahmed Galal', 'ZoJ7rDZytX', NULL, NULL, 0, 'nounajackson@gmail.com', '2c778975a7edd2855597d3bfd53f4f59b16e27f9', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 3, 'web', '0', 1623355686, 1623355686, 1, 0),
(148, 1, '0020', '1285653336', 0, 0, 'menna magdy', 'GeKrQy7eiA', NULL, NULL, 0, 'menna.magdy182@gmail.com', '09e4bd9063db2ea158f819637f33f2f832b4100e', NULL, NULL, 0, 0, '0', NULL, 2, '', 0, 0, 1, 1, 1, 'homecare', '0', 1625266975, 1625266975, 1, 0),
(149, 1, '0020', '1111111111', 0, 0, 'mo', '5GQnthLXLC', NULL, NULL, 0, 'mo@g.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1625462456, 1625462456, 1, 0),
(150, 1, '0020', '1019990144', 0, 0, 'Medhat Helal', 'xbZ0qNnaPv', NULL, NULL, 0, 'mhelal.business@gmail.com', '422d39d2c1fb3fe7f1f5397b06e5d5452492c064', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1626349911, 1626349911, 1, 0),
(151, 1, '0020', '01225684572', 0, 0, 'samy', '3BcDCsT05c', NULL, NULL, 0, 'samy@ahmed05.com', 'b262843d9e02baa9453a0608c948baf06b764ee7', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634287821, 1634287821, 1, 0),
(152, 1, '0020', '1095770591', 0, 0, 'eslam', 'poyxUu27Ua', NULL, NULL, 0, 'es@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '112f60aa8a2a89f26dcaa7579cc6c0f5.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288215, 1634288215, 1, 0),
(153, 1, '0020', '1095770595', 0, 0, 'eslam', 'HWMdwzXRT5', NULL, NULL, 0, 'esa@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '8333538e90521371739e96b22694318d.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288287, 1634288287, 1, 0),
(154, 1, '0020', '1095770590', 0, 0, 'eslam', 'iHit1w3Cea', NULL, NULL, 0, 'esaw@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '8797e3f31105e020cc8c839accad3ea9.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288411, 1634288411, 1, 0),
(155, 1, '0020', '1095770590', 0, 0, 'eslam', '30ciJr43EB', NULL, NULL, 0, 'esar@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, 'da300b8229e8ccdf2ef676e22224bd20.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288575, 1634288575, 1, 0),
(156, 1, '0020', '1095770590', 0, 0, 'eslam', 'Vt3cGBnJZR', NULL, NULL, 0, 'esaef@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, '8531461c1562ec22d9648050944d0768.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288707, 1634288707, 1, 0),
(157, 1, '0020', '1095770590', 0, 0, 'eslam', 'Gq9TWcJHKg', NULL, NULL, 0, 'esapf@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, 'f20d34cf58ca652a67a4ca701a98aeff.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634288779, 1634288779, 1, 0),
(158, 1, '0020', '1095770590', 0, 0, 'eslam', 'x3BGIzdHX2', NULL, NULL, 0, 'esaqpf@es.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, 0, 0, 'ff03cabfd6bdf0c0439facc82042853d.jpeg', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1634289509, 1634289509, 1, 0),
(159, 1, '0084', '899163536', 0, 0, 'phạm minh thư', 'BfvcLNjYvX', NULL, NULL, 0, 'luulananh1605@gmail.com', 'b1a16730dd85b3e43131ab3fd152c3e31d4a9882', NULL, NULL, 0, 0, '9b7b1632d11c563d3de99566e6e1674f.jpeg', NULL, 2, '', 0, 0, 1, 1, 2, 'homecare', '0', 1642307099, 1642307099, 1, 0),
(160, 1, '0020', '01555684574', 0, 0, 'adel', 'DmJ64vdbQq', NULL, 'Wa7uymbTiI', 0, 'ady@ahmed05.com', '332355f7e55bfa00968a87d46f79cf9dffddfd93', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1642363516, 1642363516, 1, 0),
(161, 1, '00234', '8078433667', 0, 0, 'Uwajega Godfrey', 'jjUO8Le8Dk', NULL, NULL, 0, 'godfreyuwajega698@gmail.com', '9147d177ce610c236282624d789fe4e21d1d40e7', NULL, NULL, 0, 0, '0', NULL, 1, '', 0, 0, 1, 1, 1, 'homecare', '0', 1642606394, 1642606394, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `perant_id` bigint(20) NOT NULL DEFAULT '0',
  `cost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_order` int(11) NOT NULL,
  `other_details` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `perant_id`, `cost`, `logo`, `web_logo`, `service_order`, `other_details`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 0, '120', '58ba2fa4dda235497ea9c4cf44c018f7.png', '58ba2fa4dda235497ea9c4cf44c018f7.png', 1, NULL, 1572566400, 1604662664, 0),
(2, 0, '120', '3a88db6c18c91edea0c6034545433538.png', '3a88db6c18c91edea0c6034545433538.png', 2, NULL, 1572566400, 1575883204, 0),
(3, 0, '120', '8d049d838d1f8025f4bc220e12d86dcb.png', '8d049d838d1f8025f4bc220e12d86dcb.png', 3, NULL, 1572566400, 1575883320, 0),
(4, 0, '0', '9730120eac425e4f53b7d7c8cd75cf4e.png', '9730120eac425e4f53b7d7c8cd75cf4e.png', 10, NULL, 1575838741, 1578925561, 1),
(5, 0, '0', '170e78de2c5fc7af51ba96ba4885bcfc.png', '170e78de2c5fc7af51ba96ba4885bcfc.png', 8, NULL, 1575839048, 1575883345, 1),
(6, 0, '0', '9d1b1ed630c395aa17e9f63eb72b4c56.png', '9d1b1ed630c395aa17e9f63eb72b4c56.png', 6, NULL, 1575839152, 1575883360, 0),
(7, 0, '0', '6572d9729b62103f1afd449e4034b73e.png', '6572d9729b62103f1afd449e4034b73e.png', 7, NULL, 1575839291, 1578925549, 1),
(8, 0, '0', '34c2e21f6f59c278ca030df3ecfaeb81.jpg', '34c2e21f6f59c278ca030df3ecfaeb81.jpg', 4, NULL, 1575839361, 1575911708, 1),
(9, 0, '0', '967cf68ea6ac0d6e9bfba64ac1b08d0c.png', '967cf68ea6ac0d6e9bfba64ac1b08d0c.png', 9, NULL, 1575839433, 1575911973, 1),
(10, 0, '0', '40aec8079f96e79de482d63b994c98bc.png', '40aec8079f96e79de482d63b994c98bc.png', 5, NULL, 1575839433, 1575911748, 1),
(30, 1, '150', '', '', 0, NULL, 1575840348, 1575840348, 1),
(31, 1, '150', '', '', 0, NULL, 1575840412, 1587372938, 0),
(32, 1, '120', '', '', 0, NULL, 1575840463, 1586791870, 0),
(33, 1, '150', '', '', 0, NULL, 1575840510, 1587372117, 0),
(34, 1, '150', '', '', 0, NULL, 1575840553, 1587372221, 0),
(35, 1, '150', '', '', 0, NULL, 1575840600, 1587372305, 0),
(36, 1, '120', '', '', 0, '[6,12,24]', 1575840669, 1587373023, 0),
(37, 1, '450', '', '', 0, '[6,12,24]', 1575840824, 1587372063, 0),
(38, 1, '200', '', '', 0, NULL, 1575840893, 1587373001, 0),
(39, 10, '100', '', '', 0, NULL, 1575840938, 1580545987, 1),
(40, 10, '60', '', '', 0, NULL, 1575841009, 1580545693, 1),
(41, 10, '91', '', '', 0, NULL, 1575841054, 1580545473, 1),
(42, 10, '70', '', '', 0, NULL, 1575841142, 1580545228, 1),
(43, 10, '80', '', '', 0, NULL, 1575841206, 1580544888, 1),
(44, 2, '300', '', '', 0, '[6,12,24]', 1575841316, 1587372703, 0),
(45, 2, '90', '', '', 0, NULL, 1575841357, 1580544420, 1),
(46, 2, '120', '', '', 0, NULL, 1575841402, 1587372927, 0),
(47, 2, '100', '', '', 0, '[6,12,24]', 1575841437, 1591093062, 0),
(48, 2, '56', '', '', 0, NULL, 1575841478, 1580547227, 1),
(49, 3, '150', '', '', 0, '[6,12,24]', 1575841555, 1586794778, 0),
(50, 3, '90', '', '', 0, NULL, 1575841593, 1580548031, 1),
(51, 8, '70', '', '', 0, NULL, 1575841669, 1586796090, 1),
(52, 8, '150', '', '', 0, NULL, 1575841725, 1587372874, 1),
(53, 3, '90', '', '', 0, NULL, 1575841767, 1586795038, 0),
(54, 3, '250', '', '', 0, NULL, 1575841812, 1587372834, 0),
(55, 3, '100', '', '', 0, NULL, 1575841853, 1580548644, 1),
(56, 3, '800', '', '', 0, NULL, 1575841918, 1580548720, 1),
(57, 4, '600', '', '', 0, NULL, 1575842008, 1587372385, 1),
(58, 4, '200', '', '', 0, NULL, 1575842050, 1587372435, 1),
(59, 4, '150', '', '', 0, NULL, 1575842092, 1587372468, 1),
(60, 4, '400', '', '', 0, NULL, 1575842127, 1587372529, 1),
(61, 4, '300', '', '', 0, NULL, 1575842171, 1575842171, 1),
(62, 4, '100', '', '', 0, NULL, 1575842212, 1575842212, 1),
(63, 5, '90', '', '', 0, NULL, 1575842320, 1576749768, 1),
(64, 5, '150', '', '', 0, NULL, 1575842377, 1576749811, 1),
(65, 5, '90', '', '', 0, NULL, 1575842438, 1576749868, 1),
(66, 5, '80', '', '', 0, NULL, 1575842479, 1576749908, 1),
(67, 5, '84', '', '', 0, NULL, 1575842561, 1576749947, 1),
(68, 6, '150', '', '', 0, NULL, 1575842697, 1587372619, 0),
(69, 6, '600', '', '', 0, NULL, 1575842734, 1586795609, 0),
(70, 6, '63', '', '', 0, NULL, 1575842769, 1586795628, 1),
(71, 6, '150', '', '', 0, NULL, 1575842833, 1586795719, 0),
(72, 6, '200', '', '', 0, NULL, 1575842956, 1587372906, 0),
(73, 6, '250', '', '', 0, NULL, 1575842999, 1587372675, 0),
(74, 6, '90', '', '', 0, NULL, 1575843035, 1586795797, 1),
(75, 7, '69', '', '', 0, NULL, 1575843126, 1580552410, 1),
(76, 7, '94', '', '', 0, NULL, 1575843169, 1580552497, 1),
(77, 7, '95', '', '', 0, NULL, 1575843210, 1580552725, 1),
(78, 8, '150', '', '', 0, '[6,12,24]', 1575843338, 1587372777, 1),
(79, 8, '84', '', '', 0, NULL, 1575843441, 1580553034, 1),
(80, 8, '48', '', '', 0, NULL, 1575843487, 1586795899, 1),
(81, 8, '80', '', '', 0, NULL, 1575843520, 1586795956, 1),
(82, 8, '80', '', '', 0, NULL, 1575843603, 1580553546, 1),
(83, 9, '81', '', '', 0, NULL, 1575843822, 1575843822, 1),
(84, 9, '84', '', '', 0, NULL, 1575843869, 1576748671, 1),
(85, 9, '74', '', '', 0, NULL, 1575843908, 1576748755, 1),
(86, 9, '84', '', '', 0, NULL, 1575843966, 1576748804, 1),
(87, 9, '71', '', '', 0, NULL, 1575844027, 1576748863, 1),
(88, 9, '76', '', '', 0, NULL, 1575844072, 1576748906, 1),
(89, 9, '84', '', '', 0, NULL, 1575844190, 1576748961, 1),
(90, 9, '98', '', '', 0, NULL, 1575844413, 1575844413, 1),
(91, 9, '97', '', '', 0, NULL, 1575844457, 1576749066, 1),
(92, 9, '87', '', '', 0, NULL, 1575844499, 1576749110, 1),
(93, 9, '68', '', '', 0, NULL, 1575844535, 1576749151, 1),
(94, 9, '68', '', '', 0, NULL, 1575844570, 1575844570, 1),
(95, 9, '98', '', '', 0, NULL, 1575844610, 1576749247, 1),
(96, 9, '280', '', '', 0, NULL, 1575844659, 1576749285, 1),
(97, 4, '850', '', '', 0, NULL, 1576751309, 1587372645, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_prices`
--

CREATE TABLE `services_prices` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_prices`
--

INSERT INTO `services_prices` (`id`, `service_id`, `area_id`, `specialty_id`, `price`) VALUES
(1, 37, 1, 1, 600),
(2, 37, 2, 1, 500),
(3, 37, 1, 2, 500),
(4, 37, 2, 2, 400),
(5, 37, 1, 3, 400),
(6, 37, 2, 3, 300),
(7, 47, 1, 0, 700),
(8, 47, 2, 0, 500),
(9, 46, 1, 0, 200),
(10, 46, 2, 0, 150),
(11, 31, 1, 1, 300),
(12, 31, 2, 1, 200),
(13, 31, 1, 2, 200),
(14, 31, 2, 2, 150),
(15, 31, 1, 3, 150),
(16, 31, 2, 3, 100),
(17, 32, 1, 1, 400),
(18, 32, 2, 1, 300),
(19, 32, 1, 2, 300),
(20, 32, 2, 2, 200),
(21, 32, 1, 3, 200),
(22, 32, 2, 3, 150),
(23, 38, 1, 1, 350),
(24, 38, 2, 1, 300),
(25, 38, 1, 2, 250),
(26, 38, 2, 2, 200),
(27, 38, 1, 3, 200),
(28, 38, 2, 3, 150),
(29, 44, 1, 0, 600),
(30, 44, 2, 0, 500),
(31, 36, 1, 1, 600),
(32, 36, 2, 1, 500),
(33, 36, 1, 2, 500),
(34, 36, 2, 2, 400),
(35, 36, 1, 3, 400),
(36, 36, 2, 3, 300),
(37, 35, 1, 1, 250),
(38, 35, 2, 1, 200),
(39, 35, 1, 2, 200),
(40, 35, 2, 2, 150),
(41, 35, 1, 3, 150),
(42, 35, 2, 3, 100),
(43, 34, 1, 1, 250),
(44, 34, 2, 1, 200),
(45, 34, 1, 2, 200),
(46, 34, 2, 2, 150),
(47, 34, 1, 3, 150),
(48, 34, 2, 3, 100),
(49, 33, 1, 1, 300),
(50, 33, 2, 1, 250),
(51, 33, 1, 2, 250),
(52, 33, 2, 2, 200),
(53, 33, 1, 3, 200),
(54, 33, 2, 3, 150),
(55, 52, 1, 0, 200),
(56, 52, 2, 0, 150),
(57, 49, 1, 0, 1000),
(58, 49, 2, 0, 800),
(59, 50, 1, 0, 1000),
(60, 50, 2, 0, 800),
(61, 51, 1, 0, 250),
(62, 51, 2, 0, 200),
(63, 53, 1, 0, 200),
(64, 53, 2, 0, 150),
(65, 54, 1, 0, 200),
(66, 54, 2, 0, 150),
(67, 68, 1, 4, 400),
(68, 68, 2, 4, 350),
(69, 68, 1, 5, 350),
(70, 68, 2, 5, 300),
(71, 69, 1, 4, 400),
(72, 69, 2, 4, 350),
(73, 69, 1, 5, 350),
(74, 69, 2, 5, 300),
(75, 71, 1, 4, 450),
(76, 71, 2, 4, 400),
(77, 71, 1, 5, 400),
(78, 71, 2, 5, 350),
(79, 72, 1, 4, 450),
(80, 72, 2, 4, 400),
(81, 72, 1, 5, 400),
(82, 72, 2, 5, 350),
(83, 73, 1, 4, 500),
(84, 73, 2, 4, 450),
(85, 73, 1, 5, 450),
(86, 73, 2, 5, 400),
(87, 78, 1, 0, 1000),
(88, 78, 2, 0, 800);

-- --------------------------------------------------------

--
-- Table structure for table `services_trans`
--

CREATE TABLE `services_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id_fk` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_trans`
--

INSERT INTO `services_trans` (`id`, `service_id_fk`, `lang`, `title`, `content`, `created_at`, `updated_at`) VALUES
(82, 30, 'ar', 'رعاية المسنين', '', 1575840348, 1575840348),
(83, 30, 'en', 'Elderly Care', '', 1575840348, 1575840348),
(84, 30, 'es', ' Cuidado de los ancianos', '', 1575840348, 1575840348),
(175, 61, 'ar', 'جهاز بخار', '', 1575842171, 1575842171),
(176, 61, 'en', 'Nebulizer system ', '', 1575842171, 1575842171),
(177, 61, 'es', 'Sistema nebulizador', '', 1575842171, 1575842171),
(178, 62, 'ar', ' سماعات الأدن', '', 1575842212, 1575842212),
(179, 62, 'en', 'Hearing Aids', '', 1575842212, 1575842212),
(180, 62, 'es', ' Audífonos', '', 1575842212, 1575842212),
(241, 83, 'ar', 'الرجال برامج التجميل والعناية بالبشرة ', '', 1575843822, 1575843822),
(242, 83, 'en', 'Males  Aesthetician & Skin Care Programs', '', 1575843822, 1575843822),
(243, 83, 'es', ' Programas de cuidado de la piel y esteticista masculino', '', 1575843822, 1575843822),
(262, 90, 'ar', 'خدمات قص الشعرللنساء ', '', 1575844413, 1575844413),
(263, 90, 'en', 'Females Hair Cutting Service', '', 1575844413, 1575844413),
(264, 90, 'es', 'Servicio de corte de cabello para mujeres', '', 1575844413, 1575844413),
(274, 94, 'ar', 'الحنه والتاتو للنساء', '', 1575844570, 1575844570),
(275, 94, 'en', 'Females Henna and Tattoos', '', 1575844570, 1575844570),
(276, 94, 'es', ' Hembras henna y tatuajes', '', 1575844570, 1575844570),
(283, 2, 'ar', 'رعاية كبار السن', '', 1575883204, 1575883204),
(284, 2, 'en', 'Elderly Care', '', 1575883204, 1575883204),
(285, 2, 'es', 'Cuidado de los ancianos', '', 1575883204, 1575883204),
(286, 3, 'ar', 'رعاية ذوي الاحتياجات الخاصة', '', 1575883320, 1575883320),
(287, 3, 'en', 'Special Need Care', '', 1575883320, 1575883320),
(288, 3, 'es', 'Necesidad especial', '', 1575883320, 1575883320),
(322, 10, 'ar', 'الأطباء', '', 1575911748, 1575911748),
(323, 10, 'en', 'Physicians', '', 1575911748, 1575911748),
(324, 10, 'es', 'Médicas', '', 1575911748, 1575911748),
(409, 5, 'ar', 'التدريب', '', 1576624529, 1576624529),
(410, 5, 'en', 'Training Body Fit Services', '', 1576624529, 1576624529),
(411, 5, 'es', 'Servicios de entrenamiento Body Fit', '', 1576624529, 1576624529),
(412, 9, 'ar', 'العناية بالجمال ', '', 1576624543, 1576624543),
(413, 9, 'en', 'Beauty Care Services', '', 1576624543, 1576624543),
(414, 9, 'es', 'Servicios de cuidado de belleza', '', 1576624543, 1576624543),
(436, 84, 'ar', 'الرجال الحلاقون وخدمات قص الشعر ', 'مع فريق المؤهلين لدينا ، سوف نقدم مجموعة واسعة من الخدمات الأساسية ، بما في ذلك تصفيف الشعر وعلاجات البشرة وعلاجات الوجه والأظافر                            ', 1576748671, 1576748671),
(437, 84, 'en', 'Males  Barbers & Hair Cutting Services', 'With Our Qualified Team will provide a wide variety of essential services, including hair styling, skin treatments, facials, pedicures and manicures.                            ', 1576748671, 1576748671),
(438, 84, 'es', 'Machos Barberos y Servicios de Corte de Cabello', 'Con nuestro equipo calificado brindará una amplia variedad de servicios esenciales, que incluyen peinado, tratamientos de la piel, tratamientos faciales, pedicuras y manicuras.               ', 1576748671, 1576748671),
(439, 85, 'ar', 'الرجال صالونات التجميل ', 'سيقوم فريق داي ستار الحصري بتزويد العملاء بصالون تجميل مثالي حيث ستجدون كل شيء بدءًا من علاجات الوجه وحتى رشاشات الشعر                            ', 1576748755, 1576748755),
(440, 85, 'en', 'Males Beauty Salons', 'Daystar exclusive team will provides clients with perfect beauty salon where you will find everything from facials to spray tans                            ', 1576748755, 1576748755),
(441, 85, 'es', 'Salones de belleza masculinos', 'El equipo exclusivo de Daystar proporcionará a los clientes un salón de belleza perfecto donde encontrará de todo, desde tratamientos faciales hasta bronceadores en aerosol                   ', 1576748755, 1576748755),
(442, 86, 'ar', 'الرجال - تسريحات الشعر  ', 'سيقوم فريق داي ستار من الحلاقين بتزويدك بأحدث تصميمات الشعر التي ستكون متوافقة مع كل عميل                            ', 1576748804, 1576748804),
(443, 86, 'en', 'Males Hair Designs', 'DAYSTAR team of barbers will provide you with latest Hair designs that will be Corresponds with every Client                              ', 1576748804, 1576748804),
(444, 86, 'es', ' Males Hair Designs', 'El equipo de barberos de DAYSTAR le proporcionará los últimos diseños de cabello que se corresponderán con cada cliente                            ', 1576748804, 1576748804),
(445, 87, 'ar', ' خدمات العناية باأ ضافر الايد والارجل  للرجال', 'سيقوم فنيو الأظافر المؤهلون بتزويد العملاء بأصابع ناعمة للغاية مع أشكال مريحه                            ', 1576748863, 1576748863),
(446, 87, 'en', 'Males Nail Technician', 'Qualified   Nail Technicians will provide Clients with A very Smooth Fingers with Comfort Shapes                            ', 1576748863, 1576748863),
(447, 87, 'es', ' Técnico de uñas masculinas', 'Los técnicos de uñas calificados proporcionarán a los clientes unos dedos muy suaves con formas cómodas                            ', 1576748863, 1576748863),
(448, 88, 'ar', 'مستحضرات التجميل المؤقته والدائمه والوشم  للرجال ', 'سيضع فريقنا المؤهل أحدث أشكال وأنواع (فن الجسم ، التركيب الدائم ، الوشم والحناء)                            ', 1576748906, 1576748906),
(449, 88, 'en', 'Males Permanent & Temporary Cosmetics & Tattoos   ', 'Our Qualified Team will put latest Shapes and types (body art, permanent makeup, tattoos and henna)                            ', 1576748906, 1576748906),
(450, 88, 'es', 'Cosméticos y tatuajes permanentes y temporales para hombres', 'Nuestro equipo calificado colocará las últimas formas y tipos (arte corporal, maquillaje permanente, tatuajes y henna)                            ', 1576748906, 1576748906),
(451, 89, 'ar', 'برامج التجميل والعناية بالبشرة  للنساء', 'خدمات الحلاقين و قص الشعر بما في ذلك تصفيف الشعر ، علاجات البشرة ، العناية بالوجه ، تجميل الأظافر و عمليات تجميل الأظافر. ، أخصائيو التجميل ، تركيب وتلوين الشعر                            ', 1576748961, 1576748961),
(452, 89, 'en', 'Females Aesthetician & Skin Care Programs', 'Barbers & Hair Cutting Services including hair styling, skin treatments, facials, pedicures and manicures. , cosmetologists, fitting hairpieces and coloring hair                            ', 1576748961, 1576748961),
(453, 89, 'es', 'Programas de esteticista y cuidado de la piel para mujeres', 'Servicios de peluquería y corte de cabello que incluyen peinados, tratamientos de la piel, tratamientos faciales, pedicuras y manicuras. , cosmetólogos, postizos ajustados y tintes para el ca', 1576748961, 1576748961),
(454, 91, 'ar', 'صالونات التجميل للنساء', 'سيقوم فريق داي ستار الحصري بتزويد العملاء بصالون تجميل مثالي حيث ستجدون كل شيء بدءًا من علاجات الوجه وحتى رشاشات الشعر إلى امتدادات الشعر                            ', 1576749066, 1576749066),
(455, 91, 'en', 'Females Beauty Salons', ' Daystar exclusive team will provides clients with perfect beauty salon where you will find everything from facials to spray tans to lash extensions Hair Designs.                           ', 1576749066, 1576749066),
(456, 91, 'es', 'Salones de belleza para mujeres', 'El equipo exclusivo de Daystar proporcionará a los clientes un salón de belleza perfecto donde encontrarás de todo, desde tratamientos faciales hasta bronceadores en aerosol y extensiones de ', 1576749066, 1576749066),
(457, 92, 'ar', 'تسريحات الشعر المختلفة  للنساء ', 'سيقوم فريق داي ستار من الحلاقين بتزويدك بأحدث تصميمات الشعر التي تتوافق مع كل عميل                            ', 1576749110, 1576749110),
(458, 92, 'en', 'Females Hair Designs', 'Daystar team of barbers will provide you with latest hair designs that will be correspond with every Client                             ', 1576749110, 1576749110),
(459, 92, 'es', ' Diseños de cabello para mujeres', 'El equipo de barberos de Daystar le proporcionará los últimos diseños de cabello que se corresponderán con cada cliente                            ', 1576749110, 1576749110),
(460, 93, 'ar', 'خدمات العناية بالأضافر للنساء', 'سيقوم فنيو الأظافر المؤهلون بتزويد العملاء بأصابع ناعمة جدًا بأشكال مريحة باستخدام أحدث ألوان عمليات تجميل الأظافر                            ', 1576749151, 1576749151),
(461, 93, 'en', 'Females Nail Technician', 'Qualified   Nail technicians will provide clients with a very Smooth Fingers with comfort shapes using latest colors of Manicures                               ', 1576749151, 1576749151),
(462, 93, 'es', 'Técnico de uñas femenino', 'Los técnicos de uñas calificados proporcionarán a los clientes unos dedos muy suaves con formas cómodas utilizando los últimos colores de manicura                            ', 1576749151, 1576749151),
(463, 95, 'ar', 'فناني المكياج للنساء ', 'فنانو الماكياج المحترفون هم المسؤولون عن صنع مظهر مكياج فريد وثقة ملهمة لعملائنا                            ', 1576749247, 1576749247),
(464, 95, 'en', 'Females Makeup Artist', 'Professional makeup artists are responsible for creating unique makeup looks and inspiring confidence to our clients                            ', 1576749247, 1576749247),
(465, 95, 'es', 'Hembras Maquilladoras', 'Los maquilladores profesionales son responsables de crear looks de maquillaje únicos e inspirar confianza a nuestros clientes.                            ', 1576749247, 1576749247),
(466, 96, 'ar', 'برامج الليزر للنساء  ', 'سيقوم فريقنا بتزويد عملائنا بجميع أنواع الليزر باستخدام أحدث التقنيات والنتائج المثالية لإرضاء وتزويد العملاء بشرة ناعمة                            ', 1576749285, 1576749285),
(467, 96, 'en', 'Females Laser Programs', 'Our team will provide our Clients with all of types of laser using Latest technology and perfect results to satisfy and provide clients with smooth skin                            ', 1576749285, 1576749285),
(468, 96, 'es', 'Programas de láser para mujeres', 'Nuestro equipo proporcionará a nuestros clientes todos los tipos de láser utilizando la última tecnología y resultados perfectos para satisfacer y proporcionar a los clientes una piel suave  ', 1576749285, 1576749285),
(496, 63, 'ar', ' برامج التمارين القلبيه التنفسيه', 'مع المدربين الحصريين لدينا ، تقوم بنشاط إيقاعي يرفع معدل ضربات القلب إلى المعدل المستهدف حتي تستطيع حرق معظم الدهون والسعرات الحرارية.                            ', 1576749768, 1576749768),
(497, 63, 'en', 'Cardio Training Programs', ' With our exclusive Trainers, you are doing a rhythmic activity that raises your heart rate into your target heart rate zone, the zone where you will burn the most fat and calories.          ', 1576749768, 1576749768),
(498, 63, 'es', ' Programas de entrenamiento cardiovascular', 'Con nuestros entrenadores exclusivos, está realizando una actividad rítmica que eleva su frecuencia cardíaca a su zona de frecuencia cardíaca objetivo, la zona donde quemará la mayor cantidad', 1576749768, 1576749768),
(499, 64, 'ar', ' برامج تمارين القوه', 'مع المدربين الحصريين لدينا ، ستعمل على تحسين اللياقة البدنية عن طريق ممارسة عضله معينه او مجموعة معينة من العضلات ضد المقاومة الخارجية ؛ بما في ذلك الأوزان الحرة ، أو وزن جسمك                ', 1576749811, 1576749811),
(500, 64, 'en', 'Strength Programs', 'With our exclusive Trainers, you will improve muscular fitness by exercising a specific muscle or muscle group against external resistance; including free-weights, or your own body weight    ', 1576749811, 1576749811),
(501, 64, 'es', ' Programas de fuerza', 'Con nuestros entrenadores exclusivos, mejorará la aptitud muscular al ejercitar un músculo o grupo muscular específico contra la resistencia externa; incluyendo pesas libres o su propio peso ', 1576749811, 1576749811),
(502, 65, 'ar', ' برامج تمارين الليونه', 'مع المدربين الحصريين ، ستزيد من نطاق الحركة ، وتحسن من نطاق حركة المفاصل والعضلات مما سيقلل من خطر الإصابة ويقلل من الام العضلات                            ', 1576749868, 1576749868),
(503, 65, 'en', 'Flexibility Programs', ' With our Exclusive Trainers You Will increases range of motion, improve the range of motion of your joints and muscles, Will decreases your risk of injury and reduce muscle soreness         ', 1576749868, 1576749868),
(504, 65, 'es', ' Programas de flexibilidad', ' Con nuestros Entrenadores exclusivos, usted aumentará el rango de movimiento, mejorará el rango de movimiento de sus articulaciones y músculos, disminuirá su riesgo de lesiones y reducirá el', 1576749868, 1576749868),
(505, 66, 'ar', 'برامج الزومبا', 'مع مدربين داي ستار ستقوم بإجراء تمرين شامل ، يجمع بين جميع عناصر اللياقة البدنية ، وأمراض القلب ، وتكييف العضلات ، والتوازن والمرونة ، والطاقة المعززة                            ', 1576749908, 1576749908),
(506, 66, 'en', 'Zumba Programs', 'With Daystar trainers You Will, make a total workout, combining all elements of fitness, cardio, muscle conditioning, balance and flexibility, boosted energy                            ', 1576749908, 1576749908),
(507, 66, 'es', 'Programas de zumba', 'Con los entrenadores Daystar You Will, haga un entrenamiento total, combinando todos los elementos de acondicionamiento físico, cardio, acondicionamiento muscular, equilibrio y flexibilidad, ', 1576749908, 1576749908),
(508, 67, 'ar', 'مدرب خاص', 'يمكننا توفير ودعم العملاء مع مدربين خاصين مؤهلين سبعة أيام في الأسبوع وفقًا لاحتياجاتهم المحددة والوقت الذي يحتاجون إليه                             ', 1576749947, 1576749947),
(509, 67, 'en', 'Private Trainer ', 'We Can Provide and support clients with qualified Private trainers seven days a week according to their specific needs and how long time they need                            ', 1576749947, 1576749947),
(510, 67, 'es', 'Entrenador privado', 'Podemos proporcionar y apoyar a los clientes con entrenadores privados calificados los siete días de la semana de acuerdo con sus necesidades específicas y por cuánto tiempo necesitan        ', 1576749947, 1576749947),
(520, 8, 'ar', 'رعاية الأطفال ', '', 1578408527, 1578408527),
(521, 8, 'en', 'Children Care ', '', 1578408527, 1578408527),
(522, 8, 'es', ' Servicios de cuidado de niños', '', 1578408527, 1578408527),
(652, 6, 'ar', 'العلاج الطبيعي', '', 1578917314, 1578917314),
(653, 6, 'en', 'Physiotherapy', '', 1578917314, 1578917314),
(654, 6, 'es', 'Fisioterapia', '', 1578917314, 1578917314),
(685, 7, 'ar', 'الرعايه الغذائيه', '', 1578925549, 1578925549),
(686, 7, 'en', 'Nutritional Care', '', 1578925549, 1578925549),
(687, 7, 'es', 'Cuidados Nutricionales', '', 1578925549, 1578925549),
(688, 4, 'ar', 'أجهزة طبية', '', 1578925561, 1578925561),
(689, 4, 'en', 'Medical Devices', '', 1578925561, 1578925561),
(690, 4, 'es', ' Dispositivos médicos', '', 1578925561, 1578925561),
(703, 45, 'ar', 'رعاية مرض الزهايمر', 'مرضى الزهايمر من الأفضل لهم البقاء في المنزل في بيئة مألوفة وتحت اشراف أفضل مقدمي الرعاية لهم', 1580544420, 1580544420),
(704, 45, 'en', 'Alzheimer\'s Care', 'Alzheimer’s patients, it is best for them to stay at home within a familiar environment and engaging best caregivers for them', 1580544420, 1580544420),
(705, 45, 'es', 'Cuidado de Alzheimer', 'Pacientes con Alzheimer, lo mejor es que se queden en casa dentro de un entorno familiar e involucren a los mejores cuidadores para ellos ', 1580544420, 1580544420),
(712, 43, 'ar', 'طبيب نساء وتوليد  ', '                طبيب نساء وتوليد للمساعده في الاستشارات الاوليه والطارئه            ', 1580544888, 1580544888),
(713, 43, 'en', 'Gynecologist ', '                gynecologist to support on primary and urgent cases             ', 1580544888, 1580544888),
(714, 43, 'es', 'Ginecólogo', '                gynecologist to support on primary and urgent cases             ', 1580544888, 1580544888),
(715, 42, 'ar', 'طبيب اطفال', 'طبيب اطفال متخصص لمتابعة حالة طفلك بالمنزل كلما تسندعي الحاله ', 1580545228, 1580545228),
(716, 42, 'en', 'Pediatrician  ', 'specialized pediatrician to follow up your child medical condition at home whenever it is needed', 1580545228, 1580545228),
(717, 42, 'es', 'Pediatra ', 'pediatra especializado para hacer un seguimiento de la condición médica de su hijo en el hogar cuando sea necesario', 1580545228, 1580545228),
(718, 41, 'ar', 'طبيب باطني', 'أخصائي الطب الباطني الذي يمكنه زيارة المرضى في المنازل', 1580545473, 1580545473),
(719, 41, 'en', 'Internal Medicine', 'Internal medicine specialist who can visit patients at homes', 1580545473, 1580545473),
(720, 41, 'es', 'Medicina Interna', 'Especialista en medicina interna que puede visitar pacientes en sus hogares.', 1580545473, 1580545473),
(721, 40, 'ar', 'طبيب جراحة عامة', 'الجراح العام الذي يمكنه زيارة المرضى في المنازل لدعم الحالات البسيطة والعاجلة', 1580545693, 1580545693),
(722, 40, 'en', 'General Surgery', 'General Surgeon who can visit patients at homes to support with simple and urgent cases', 1580545693, 1580545693),
(723, 40, 'es', 'Cirugía General', 'Cirujano general que puede visitar a los pacientes en el hogar para ayudar con casos simples y urgentes', 1580545693, 1580545693),
(724, 39, 'ar', 'طبيب عام', 'ممارس عام يمكنه زيارة المرضى في المنزل ومساعدتهم في الحصول على استشارة طبية عامة', 1580545987, 1580545987),
(725, 39, 'en', 'General Practitioner ', 'General Practitioner can visit patients for general medical consultation ', 1580545987, 1580545987),
(726, 39, 'es', 'Médico general', 'El médico general puede visitar a los pacientes para una consulta médica general', 1580545987, 1580545987),
(748, 48, 'ar', 'الرعاية الاجتماعية والتوعية', 'مقدمي الرعاية المتعلمين الذين يمكنهم دعم المرضى المسنين للمشاركة في المجتمع', 1580547227, 1580547227),
(749, 48, 'en', 'Social & Awareness Care ', 'Well educated caregivers that can support elderly patient to be engaged in the society', 1580547227, 1580547227),
(750, 48, 'es', 'Atención social y de sensibilización', 'Un equipo calificado de enfermeras a su paciente con la inserción de nuevos catéteres o el cambio de los viejos', 1580547227, 1580547227),
(754, 50, 'ar', 'رعاية مرضي التوحد ', 'سيقوم فريق التمريض داي ستار بدعم الأطفال الذين يعانون من اضطراب طيف التوحد (ASD) للتغلب على تحدياتهم بالإضافة إلى تقديم النصائح للآباء والأمهات حول العلاج والمتابعه', 1580548031, 1580548031),
(755, 50, 'en', 'Autism Care', 'Daystar nursing team will support children with Autism Spectrum Disorder (ASD) to overcome their challenges in addition they will give advices to parents about treatments', 1580548031, 1580548031),
(756, 50, 'es', 'Cuidado del autismo', 'El equipo de enfermería de Daystar ayudará a los niños con Trastorno del espectro autista (TEA) a superar sus desafíos, además de dar consejos a los padres sobre los tratamientos.', 1580548031, 1580548031),
(769, 55, 'ar', 'رعاية مرضي متلازمة داون', 'فريق التمريض المتخصص لتوفير الرعايه اللازمه للحالة الوراثية ,والتي تؤدي إلى مجموعة واسعة من التأخير المعرفي والبدني', 1580548644, 1580548644),
(770, 55, 'en', 'Patient With Down Syndrome', 'Specialized nursing team to provide the necessary care for genetic condition that result in a broad range of cognitive and physical delays', 1580548644, 1580548644),
(771, 55, 'es', 'Paciente con síndrome de Down', 'Equipo de enfermería especializado para brindar la atención necesaria para la afección genética que resulta en una amplia gama de retrasos cognitivos y físicos', 1580548644, 1580548644),
(772, 56, 'ar', 'رعاية مصابي الشلل الدماغي', 'نحن نقدم تمريض متخصص مع خبرة طويلة لمساعدة ورعاية المريض  ومراقبته عن كثب', 1580548720, 1580548720),
(773, 56, 'en', 'Patient with Cerebral palsy ', 'We offers dedicated nurses with long experience to assist and care for your patient and monitor them up closely', 1580548720, 1580548720),
(774, 56, 'es', 'Paciente con parálisis cerebral', 'Ofrecemos enfermeras dedicadas con una larga experiencia para ayudar y cuidar a su paciente y monitorearlos de cerca', 1580548720, 1580548720),
(802, 75, 'ar', 'التغذية العلاجيه', 'يتضمن التقييم والتشخيص والتخطيط ومراقبة الصحة الجسدية ، وسيقوم أخصائي التغذية لدينا بالعمل معك عن كثب لوضع خطة غذائية تناسب صحتك', 1580552410, 1580552410),
(803, 75, 'en', 'Nutrition Care', 'Includes assessment, diagnosis, planning, and physical health monitoring, our nutritionist will work closely with you to create a nutritional plan that is best suited your health', 1580552410, 1580552410),
(804, 75, 'es', ' Cuidados Nutricionales', 'Incluye evaluación, diagnóstico, planificación y monitoreo de la salud física, nuestro nutricionista trabajará estrechamente con usted para crear un plan nutricional que se adapte mejor a su', 1580552410, 1580552410),
(805, 76, 'ar', 'برامج تخفيف الوزن', 'فقدان الوزن هو العنصر الرئيسي في برامج انقاص الوزن وسوف يعمل اختصاصي التغذية التابع لنا عن كثب لمساعدتك في إدارة برنامج فقدان الوزن المخطط لك                        ', 1580552497, 1580552497),
(806, 76, 'en', 'Weight Loss Programs', 'Weight loss is the main component of weight loss programs; our care nutritionist will work closely with you to help you manage your planned weight loss program                        ', 1580552497, 1580552497),
(807, 76, 'es', 'Programas de pérdida de peso', 'La pérdida de peso es el componente principal de los programas de pérdida de peso; nuestro nutricionista de atención trabajará estrechamente con usted para ayudarlo a administ', 1580552497, 1580552497),
(808, 77, 'ar', 'برامج زيادة الوزن ', 'أخصائي تغذية متمرس يمكن أن يساعدك من خلال برنامج التغذية الصحية لزيادة الوزن وهذا يمكن أن ينطوي على زيادة في كتلة العضلات ، الدهون والسوائل مثل الماء أو عوامل أخرى', 1580552725, 1580552725),
(809, 77, 'en', 'Weight Gain Programs', 'Experienced nutritionist that can help you via healthy nutrition program to gain weight and this can involve an increase in muscle mass, fat, fluids such as water or other factors', 1580552725, 1580552725),
(810, 77, 'es', 'Programas de aumento de peso', 'Nutricionista experimentado que puede ayudarlo a través de un programa de nutrición saludable para aumentar de peso y esto puede implicar un aumento en la masa muscular, la gr', 1580552725, 1580552725),
(820, 79, 'ar', 'برامج الرعاية والتعليم', '                نحن ملتزمون بتوفير تجارب تعليمية عالية الجودة للأطفال الصغار من خلال مقدمي رعاية الأطفال المتعلمين تعليماً جيدا            ', 1580553034, 1580553034),
(821, 79, 'en', 'Quality Care and Education Programs', '                We are committed to provide high-quality learning experiences for young children through our well-educated children care providers            ', 1580553034, 1580553034),
(822, 79, 'es', 'Programas de atención y educación de calidad', '                Estamos comprometidos a proporcionar experiencias de aprendizaje de alta calidad para niños pequeños a través de nuestros proveedores de cuidado infantil bien educados        ', 1580553034, 1580553034),
(832, 82, 'ar', 'تشجيع العقول الإبداعية والوعي ببرامج الثقافات والقيم المتنوعة', 'سيقوم مزودي الرعاية المؤهلين بممارسة هذه البرامج مع الأطفال لتطوير هويتهم ومواقفهم من خلال التجارب مع انفسهم، والبيئات الاجتماعية ومراحل تطورهم المعرفية', 1580553546, 1580553546),
(833, 82, 'en', 'Encourage Creative Minds & Awareness of diverse Cultures and Values Programs', 'Qualified Caregivers will practice these programs with Children to develop their identity and attitudes through experiences with themselves, social environments, and their cognitive developme', 1580553546, 1580553546),
(834, 82, 'es', 'Fomentar las mentes creativas y la conciencia de diversos programas de cultura y valores', 'Los cuidadores calificados practicarán estos programas con niños para desarrollar su identidad y actitudes a través de experiencias con ellos mismos, entornos sociales y sus etapas de desarro', 1580553546, 1580553546),
(919, 32, 'ar', 'رعاية فتحات المفاغره (ستوما)', 'ستدعم الممرضات المتعلمات والمجهزات تجهيزًا جيدًا المريض على تغيير كيس الفغر بعنايه تامه                                    ', 1586791870, 1586791870),
(920, 32, 'en', 'Ostomy Care', 'Educated well-equipped nurses will support the patient to change the ostomy bag with complete care                                                ', 1586791870, 1586791870),
(921, 32, 'es', 'Cuidado de ostomía', 'Enfermeras educadas y bien equipadas ayudarán al paciente a cambiar la bolsa de ostomía con cuidado completo                                    ', 1586791870, 1586791870),
(952, 49, 'ar', 'مناوبات وساعات العمل ', '                فريق التمريض المتخصص على استعداد للاستجابة لطلبات المناوبة الفردية أو المتعددة، نحن هنا لزيادة مستوى راحتك                     ', 1586794778, 1586794778),
(953, 49, 'en', 'Home Shifts', 'Specialist nursing team ready to respond to your single, multiple or full shift requests, we are here to maximize your comfort level                          ', 1586794778, 1586794778),
(954, 49, 'es', 'Turnos de casa', 'Equipo de enfermería especializado listo para responder a sus solicitudes de turnos individuales, múltiples o completos, estamos aquí para maximizar su nivel de comodidad                 ', 1586794778, 1586794778),
(958, 53, 'ar', ' الرعاية بالنظافة الشخصية للمرضي', 'سوف يساعدهم مقدمو الرعاية بسعادة أثناء عملية الاستحمام  لجعلها مريحة قدر الإمكان            ', 1586795038, 1586795038),
(959, 53, 'en', 'Personal Care', 'Caregivers will happily assist them during their bathing process, in order to make it as relaxing as possible            ', 1586795038, 1586795038),
(960, 53, 'es', 'Cuidado personal', 'Los cuidadores los ayudarán encantados durante su proceso de baño, para que sea lo más relajante posible            ', 1586795038, 1586795038),
(979, 69, 'ar', 'العناية بالرقبه والوجه', 'يمكن لأخصائيو العلاج الطبيعي تقييم آلام الرقبة  والوجه والتخطيط لأفضل علاج حسب احتياج المريض لمساعدتهم على الشفاء            ', 1586795609, 1586795609),
(980, 69, 'en', 'Neck and Face Care', 'Physiotherapists can assess face or neck pains and planning the best treatment according to patient needs to help them recover', 1586795609, 1586795609),
(981, 69, 'es', 'Cuidado de cuello y cara', '                Los fisioterapeutas pueden evaluar los dolores de cara o cuello y planificar el mejor tratamiento de acuerdo con las necesidades del paciente para ayudarlos a recuperarse     ', 1586795609, 1586795609),
(982, 70, 'ar', 'العناية بالظهر والكتف', '                يمكن لأخصائيي العلاج الطبيعي تطوير عدد من أنواع العلاجات المختلفة بناءً على الفترة التي قضيتها مع الام الظهر والعوامل الرئيسية التي تسبب الألم                                 ', 1586795628, 1586795628),
(983, 70, 'en', 'Back and Shoulder Care', '                Physiotherapists can develop number of different types of treatments depending on the period your back has been in pain and the main factors that are causing the pain         ', 1586795628, 1586795628),
(984, 70, 'es', ' Cuidado de espalda y hombros', '                Los fisioterapeutas pueden desarrollar diferentes tipos de tratamientos dependiendo del período en que su espalda haya tenido dolor y los principales factores que causan el do', 1586795628, 1586795628),
(985, 71, 'ar', 'رعاية الأطراف السفلية والعلويه', 'يمكن لأخصائيي العلاج الطبيعي دعم المرضى في مرحلة إعادة التأهيل وتوفير الرعاية والتمارين اللازمة لاستعادة نشاطه الكامل            ', 1586795719, 1586795719),
(986, 71, 'en', 'Lower and Upper Limbs Care', 'Physiotherapists can Support patients in the rehabilitation phase and provide the necessary care and exercises to restore his full activity            ', 1586795719, 1586795719),
(987, 71, 'es', ' Cuidado de miembros inferiores y superiores', 'Los fisioterapeutas pueden apoyar a los pacientes en la fase de rehabilitación y proporcionar la atención y los ejercicios necesarios para restablecer su actividad completa            ', 1586795719, 1586795719),
(991, 74, 'ar', 'مصابي السكتة الدماغية', '                يمكن لأخصائيي العلاج الطبيعي مراقبة ودعم المريض من خلال أنواع مختلفة من الخدمات مثل التمارين والعلاج الطبيعي وبرامج التأهيل            ', 1586795797, 1586795797),
(992, 74, 'en', 'Cerebrovascular Accident (Stroke) ', '                Physiotherapists can monitor and support the patient through different types of services such as exercises and physical therapy and rehabilitation programs            ', 1586795797, 1586795797),
(993, 74, 'es', ' Accidente cerebrovascular (accidente cerebrovascular)', '                Los fisioterapeutas pueden monitorear y apoyar al paciente a través de diferentes tipos de servicios, como ejercicios y fisioterapia y programas de rehabilitación            ', 1586795797, 1586795797),
(1000, 80, 'ar', 'برامج  المهارات الاجتماعية والتنمية البدنية', '                                سيقوم مقدمو الرعاية المؤهلون لدينا بدعم الأطفال من خلال أحدث برامج برامج المهارات الاجتماعية والتنمية البدنية                                    ', 1586795899, 1586795899),
(1001, 80, 'en', 'Social Skills and Physical Development Programs', '                                Qualified care providers to Support children with latest programs of Social skills and physical development programs                        ', 1586795899, 1586795899),
(1002, 80, 'es', ' Habilidades sociales y programas de desarrollo físico', '                                Proveedores de atención calificados para apoyar a los niños con los últimos programas de habilidades sociales y programas de desarrollo físico                 ', 1586795899, 1586795899),
(1003, 81, 'ar', ' برامج التغذية', 'مقدمي الرعاية المؤهلين لرعاية الأطفال من خلال تزويدهم ببرامج التغذية الصحية القائمة على الاغذائية الصحية            ', 1586795956, 1586795956),
(1004, 81, 'en', 'Nutrition Programs', '                Qualified Care Providers to take good care of children by providing them with healthy nutritional programs based on health food            ', 1586795956, 1586795956),
(1005, 81, 'es', 'Programas de nutricion', '                Proveedores de atención calificados para cuidar bien a los niños proporcionándoles programas nutricionales saludables basados en alimentos saludables            ', 1586795956, 1586795956),
(1006, 51, 'ar', 'التخاطب والاتصال ', 'فريق متخصص لمساعدة الطفل على إجراء محادثات مفيدة وفهم الآخرين وقراءة الأفكار والتعبير عنها من خلال الكلمات المنطوقة أو المكتوبة                        ', 1586796090, 1586796090),
(1007, 51, 'en', 'Speech and Communication', 'Specialized Team helping child\'s ability to hold meaningful conversations, understand others, read and express thoughts through spoken or written words                        ', 1586796090, 1586796090),
(1008, 51, 'es', ' Discurso / comunicación', 'Equipo especializado que ayuda a la capacidad del niño para mantener conversaciones significativas, comprender a otros, leer y expresar pensamientos a través de palabras habla            ', 1586796090, 1586796090),
(1012, 37, 'ar', 'مناوبات وساعات العمل', '                تتطلع داي ستار إلى دعم وتزويد المرضى بممرضين مؤهلين سبعة أيام في الأسبوع وفقًا لاحتياجات المرضى المحددة والوقت الذي يحتاجون فيه إلى مقدمي الرعاية الصحية                       ', 1587372063, 1587372063),
(1013, 37, 'en', 'Home Shifts', '                                Daystar looking to support and provide patients with qualified nurses seven days a week according to patients specific needs and how long time they need the he', 1587372063, 1587372063),
(1014, 37, 'es', 'Turnos de casa', '                                Daystar busca apoyar y brindar a los pacientes enfermeras calificadas los siete días de la semana de acuerdo con las necesidades específicas de los pacientes y', 1587372063, 1587372063),
(1015, 33, 'ar', 'تركيب القساطر', '                سيقوم فريق مؤهل من الممرضات بمساعدة المريض الخاص بك في إدراج القسطرة الجديدة أو تغيير القديمة                                                            ', 1587372117, 1587372117),
(1016, 33, 'en', 'Applying Catheters', '                                Qualified team of nurses will assist your patient with insertions of new catheters or changing old ones                        ', 1587372117, 1587372117),
(1017, 33, 'es', 'Aplicación de catéteres', '                                Un equipo calificado de enfermeras ayudará a su paciente con la inserción de nuevos catéteres o el cambio de los viejos                        ', 1587372117, 1587372117),
(1021, 34, 'ar', 'مرضى السكري', '                قراءة العلامات الحيوية وفحص الأطراف السفلية يمكن أن تعطي مؤشرات أولية عن الحالة الصحية وتساعد في التقييم الشامل والرعاية الأفضل لمرضى السكري بالاضافه الي العنايه بالتغذيه الصح', 1587372221, 1587372221),
(1022, 34, 'en', 'Diabetic Patients ', '                Reading vital signs and inspections for lower limbs that can gives initial indications of health status and helps in overall assessment and better care for diabetic patients i', 1587372221, 1587372221),
(1023, 34, 'es', 'Pacientes diabéticos', '                La lectura de los signos vitales y las inspecciones de las extremidades inferiores que pueden dar indicaciones iniciales del estado de salud y ayuda en la evaluación general y', 1587372221, 1587372221),
(1027, 35, 'ar', 'خدمات سريعة', '                كلما احتجت إلى ممرض مُدرَّب تدريباً جيداً للمساعده في اعطاء الحقن ، وإدخال الكانيولا ، واعطاء المحاليل، سنكون هنا لتقديم الدعم الكامل              ', 1587372305, 1587372305),
(1028, 35, 'en', 'Quick services', '                Whenever you need a dedicated well-trained nurse to support on injection, cannula insertion, fluid exchange we will be here to support             ', 1587372305, 1587372305),
(1029, 35, 'es', 'Servicios rápidos', '                Siempre que necesite una enfermera especializada y bien entrenada para apoyar la inyección, la inserción de la cánula y el intercambio de líquidos, estaremos aquí para ayudarl', 1587372305, 1587372305),
(1030, 57, 'ar', ' أجهزة قياس ضغط الدم ', '                أجهزة قياس ضغط الدم                         ', 1587372385, 1587372385),
(1031, 57, 'en', 'Blood Pressure Devices', '                Blood Pressure Devices            ', 1587372385, 1587372385),
(1032, 57, 'es', ' Dispositivos de presión arterial', '                Dispositivos de presión arterial                        ', 1587372385, 1587372385),
(1033, 58, 'ar', 'اجهزة قياس السكر ', '                اجهزة قياس السكر                         ', 1587372435, 1587372435),
(1034, 58, 'en', 'Glucometers Devices', '                Glucometers Devices                        ', 1587372435, 1587372435),
(1035, 58, 'es', 'Dispositivos Glucómetros', '                Dispositivos Glucómetros                        ', 1587372435, 1587372435),
(1036, 59, 'ar', 'شرائط اجهزة قياس السكر', '                شرائط اجهزة قياس السكر                        ', 1587372468, 1587372468),
(1037, 59, 'en', 'Glucometer Strips', '                Glucometer Strips                        ', 1587372468, 1587372468),
(1038, 59, 'es', ' Tiras de Glucómetro', '                Tiras de Glucómetro                        ', 1587372468, 1587372468),
(1039, 60, 'ar', ' الاطراف الصناعية', '                 الاطراف الصناعية            ', 1587372529, 1587372529),
(1040, 60, 'en', 'Artificial Limbs', '                Artificial Limbs            ', 1587372529, 1587372529),
(1041, 60, 'es', 'Extremidades artificiales', '                Extremidades artificiales            ', 1587372529, 1587372529),
(1042, 68, 'ar', 'اعادة التاهيل والرعاية بعد الكسور', '                يقوم أخصائي العلاج الطبيعي بدعم ومتابعة صحتك من خلال برامج إعادة التأهيل والتي تشمل مساعدة المريض في العلاج الطبيعى بعد الإصابات والكسور                                    ', 1587372619, 1587372619),
(1043, 68, 'en', 'Rehabilitation and Post Fracture Care', '                Physiotherapists design and apply rehabilitation programs, which include patient assistance with physical therapy post injuries and fracture             ', 1587372619, 1587372619),
(1044, 68, 'es', 'Rehabilitación y cuidado posterior a la fractura', '                Los fisioterapeutas diseñan y aplican programas de rehabilitación, que incluyen asistencia al paciente con fisioterapia después de lesiones y fracturas.            ', 1587372619, 1587372619),
(1045, 97, 'ar', 'كرسي متحرك', '                كرسي متحرك                                             ', 1587372645, 1587372645),
(1046, 97, 'en', 'Wheel chair', '                Wheel chair            ', 1587372645, 1587372645),
(1047, 97, 'es', 'Silla de ruedas', '                Silla de ruedas            ', 1587372645, 1587372645),
(1048, 73, 'ar', 'صعوبة الحركة', '                أخصائيو العلاج الطبيعي الذين يضمنون توفير الرعاية اللازمة لتحقيق أفضل النتائج من خلال التمارين والحركات الخاصة            ', 1587372675, 1587372675),
(1049, 73, 'en', 'Movement Difficulty Care', '                Physiotherapists who guarantee providing the required care to achieve the best results through exercises and special movements            ', 1587372675, 1587372675),
(1050, 73, 'es', 'Movimiento Dificultad Cuidado', '                Fisioterapeutas que garantizan proporcionar la atención necesaria para lograr los mejores resultados a través de ejercicios y movimientos especiales            ', 1587372675, 1587372675),
(1051, 44, 'ar', 'مناوبات وساعات العمل  ', '                                  مقدمو رعاية مؤهلون للتعامل مع المرضى المسنين الذين يحتاجون إلى مختلف احتياجات وخدمات الرعاية الصحية تحت إشراف كامل من أطبائهم عند الحاجة                     ', 1587372703, 1587372703),
(1052, 44, 'en', 'Home Shifts', '                Qualified caregivers to deal with elderly patients who require various health care needs and services under complete supervision of their doctors when needed                  ', 1587372703, 1587372703),
(1053, 44, 'es', 'Turnos de casa', '                Cuidadores calificados para tratar con pacientes de edad avanzada que requieren diversas necesidades y servicios de atención médica bajo la supervisión completa de sus médicos', 1587372703, 1587372703),
(1054, 78, 'ar', 'مناوبات وساعات العمل', '                عند طلب هذه الخدمة سوف تحصل على مقدم رعاية محترف لرعاية طفلك في الوقت المطلوب وفقًا لاحتياجاتك الخاصة                        ', 1587372777, 1587372777),
(1055, 78, 'en', 'Home Shifts', '                By requesting this service, you will get a professional caregiver to take care of your child for the requested time according to your specific need                        ', 1587372777, 1587372777),
(1056, 78, 'es', 'Turnos de casa', '                Al solicitar este servicio, obtendrá un cuidador profesional para cuidar a su hijo durante el tiempo solicitado de acuerdo con sus necesidades específicas                     ', 1587372777, 1587372777),
(1057, 54, 'ar', 'رعاية مرضي صعوبات المشي ', '                                خبراء سوف يخططون لبرنامج المشي الأنسب ويساعدونهم خلال العملية برمتها ، والتأكد من التزامهم ببرنامجهم                                    ', 1587372834, 1587372834),
(1058, 54, 'en', 'Walking Difficulties ', '                                Experts who will plan the walking program that is best suited and assist them through the whole process, making sure they stick to their program               ', 1587372834, 1587372834),
(1059, 54, 'es', 'Dificultades para caminar', '                                Expertos que planificarán el programa de caminata que mejor se adapte y los ayudarán durante todo el proceso, asegurándose de que cumplan con su programa      ', 1587372834, 1587372834),
(1063, 52, 'ar', 'صعوبات التعلم', '                فريق متخصص لدعم تعلم المهارات الأساسية مثل القراءة والكتابة                        ', 1587372874, 1587372874),
(1064, 52, 'en', 'Learning difficulties', '                Specialized team to support learning basic skills such as reading and writing                        ', 1587372874, 1587372874),
(1065, 52, 'es', 'Dificultades de aprendizaje', '                Equipo especializado para apoyar el aprendizaje de habilidades básicas como la lectura y la escritura.                        ', 1587372874, 1587372874),
(1066, 72, 'ar', 'رعاية الانزلاق الغضروف', '                أخصائيو العلاج الطبيعي على استعداد تام لتقديم الدعم لك وتوفير الرعاية اللازمة من خلال التمارين والحركات الخاصة                                                ', 1587372906, 1587372906),
(1067, 72, 'en', 'Cartilage Slide Care', '                Physiotherapists who are fully prepared to support you and provide the necessary care through exercises and special movements                        ', 1587372906, 1587372906),
(1068, 72, 'es', ' Cuidado del portaobjetos de cartílago', '                Fisioterapeutas que están completamente preparados para apoyarlo y brindarle la atención necesaria a través de ejercicios y movimientos especiales                        ', 1587372906, 1587372906),
(1069, 46, 'ar', 'الاستحمام و الرعاية ', '                سوف يساعدهم مقدمو الرعاية لدينا بكل سرور في عملية الاستحمام  لجعلها مريحة قدر الإمكان                                                                                          ', 1587372927, 1587372927),
(1070, 46, 'en', 'Shower and Bath Care ', '                Our Care Providers will happily assist them during their bathing process, in order to make it relaxing as possible                        ', 1587372927, 1587372927),
(1071, 46, 'es', 'Ducha / Baño', '                                Nuestros proveedores de atención estarán encantados de ayudarlos durante su proceso de baño para que sea lo más relajante posible.                        ', 1587372927, 1587372927),
(1072, 31, 'ar', 'تضميد الجروح', '                قد يكون تغيير ضمادات الجرح القديمة أمرًا صعبًا بعض الشيء لأنك تحتاج إلى معرفة متى يجب تغييره ، وكيفية إزالته ، وكيفية تنظيف الجرح ، وكيفية تطبيق الضمادة الجديدة               ', 1587372938, 1587372938),
(1073, 31, 'en', 'Wound Dressings ', '                Changing an old wound dressing can be a little tricky as you need to know when to change it, how to remove it, how to clean the wound and how to apply the new dressing        ', 1587372938, 1587372938),
(1074, 31, 'es', 'Gasas de heridas', '                Cambiar un vendaje para heridas viejo puede ser un poco complicado ya que necesita saber cuándo cambiarlo, cómo quitarlo, cómo limpiar la herida y cómo aplicar el nuevo vendaj', 1587372938, 1587372938),
(1075, 38, 'ar', 'رعاية اصابات النخاع الشوكي', '                                                يمكن أن تمنع الرعاية التمريضية أو تخفف من المزيد من الإصابات وتعزز من أفضل النتائج الممكنة للمرضى وهذا هو ما نسعى لتحقيقه مع مرضانا            ', 1587373001, 1587373001),
(1076, 38, 'en', 'Spinal Cord Injury Care', '                                                                Nursing care can prevent or mitigate further injury and promote the best possible patient outcome and this is what we aiming to', 1587373001, 1587373001),
(1077, 38, 'es', 'Cuidado de lesiones de la médula espinal', '                                                                La atención de enfermería puede prevenir o mitigar más lesiones y promover el mejor resultado posible para el paciente y esto e', 1587373001, 1587373001),
(1078, 36, 'ar', 'رعاية ما بعد الجراحة ', '                سيقوم فريق من الممرضات المؤهلين بمساعدة المريض طوال العملية من البداية إلى النهاية وتزويد المريض بالعناية اللازمة بعد الجراحة                                    ', 1587373023, 1587373023),
(1079, 36, 'en', 'Post-operative Care', '                                                qualified team of nurses will assist patient through the whole process from beginning to end and providing the patient with necessary post-oper', 1587373023, 1587373023),
(1080, 36, 'es', 'Cuidados postoperatorios', '                                                Un equipo calificado de enfermeras ayudará al paciente durante todo el proceso de principio a fin y le brindará al paciente la atención postope', 1587373023, 1587373023),
(1087, 47, 'ar', 'مرضى الأمراض المزمنة', '                                                لدينا مقدمو الرعاية الذين سيعلمونك كيفية العيش والتعامل مع المرض المزمن وسوف يساعدون أيضًا في اعطائك الأدوية الخاصة بك ومراقبة علاماتك الحيوية ', 1591093062, 1591093062),
(1088, 47, 'en', 'Chronic Disease patients ', '                                Our Care Providers who will teach you how to live and cope with a chronic disease, they will also support with your medicines and monitoring your vital signs  ', 1591093062, 1591093062),
(1089, 47, 'es', 'Pacientes con enfermedades crónicas', '                                                Nuestros proveedores de atención que le enseñarán cómo vivir y hacer frente a una enfermedad crónica, también lo ayudarán con sus medicamentos ', 1591093062, 1591093062),
(1093, 1, 'ar', ' الرعاية التمريضية', '', 1612344416, 1612344416),
(1094, 1, 'en', 'Nursing Care', '', 1612344416, 1612344416),
(1095, 1, 'es', 'Cuidado de la salud', '', 1612344416, 1612344416);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `type` enum('web','app') NOT NULL DEFAULT 'web',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `link`, `type`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'dda1a823743ffcf6a9ee858f83e48079.png', 'home-care', 'web', 1578404271, 1579901304, 1),
(2, '2000cd5bf7abb68edb476de82cd6360b.png', 'parteners', 'web', 1578404474, 1580579461, 1),
(3, '971549271d9e8e18e187243d24feb12e.png', 'medical-tourism', 'web', 1578404615, 1578913181, 1),
(4, '51a7bd09228d4781c0d005a4bb794021.jpg', '', 'app', 1593024189, 1600535636, 0),
(5, '163037fcba5d096d8e78471bd1bb7d6e.jpg', '', 'app', 1600535733, 1600535733, 0),
(6, '63ae76ad52678c88ff934351b015fefe.jpg', '', 'app', 1600535753, 1600535753, 0),
(7, 'bf546ae5820ec5187dca03db0aba4ab5.png', 'market', 'web', 1602325595, 1602325830, 1),
(8, '64d16e17d290e7281bd8d0a04f2e3b45.jpg', 'http://www.daystar-mea.com/', 'web', 1606375994, 1606376637, 0),
(9, '6d8e2d26ce49437851b9b627edc0fe29.png', 'http://www.daystar-mea.com/home-care', 'web', 1606376212, 1606376677, 0),
(10, '7f00657772819dcb3a6821b88fddd78e.png', 'http://www.daystar-mea.com/market', 'web', 1606376561, 1606376707, 0),
(11, 'f32b9142f165a382f530fd70665cd730.png', 'http://www.daystar-mea.com/parteners', 'web', 1606377231, 1606377231, 0),
(12, '52e602d523e8511471570bd4f4aaacc1.png', 'http://www.daystar-mea.com/medical-tourism', 'web', 1606377623, 1606377623, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_trans`
--

CREATE TABLE `slider_trans` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_trans`
--

INSERT INTO `slider_trans` (`id`, `slider_id`, `title`, `content`, `lang`) VALUES
(34, 1, 'دكتور كير ', 'لدينا مقدمي خدمه محترفون بما في ذلك الممرضات والأطباء ومقدمي الرعاية المتوفرين طوال الوقت لتقديم التشخيص والعلاج وخدمات الرعاية المنزلية الأخرى عند الطلب', 'ar'),
(35, 1, 'DR CARE', 'We have professional service providers including nurses, doctors and caregivers available to deliver on-demand diagnosis, treatment and other home care services ', 'en'),
(40, 2, 'تجاره', '                هدف داي ستار ميديكال تكنولوجي الاساسي هو توصيل الشركات المصنعة من جميع أنحاء العالم بالموزع المحلي في منطقة الشرق الأوسط وإفريقيا                        ', 'ar'),
(42, 2, 'Comercio', '                DAYSTAR Medical Technology tiene el objetivo principal de conectar a los fabricantes de todo el mundo con un distribuidor local en la región de Medio Oriente y África            ', 'es'),
(41, 2, 'Trading', '                DAYSTAR Medical Technology have a main goal to connect manufacturers from all over the world with local distributor in Middle East and Africa region            ', 'en'),
(30, 3, 'Turismo médico', 'Esperamos construir una red completa de conocidos centros de rehabilitación y hospitales para proporcionar una experiencia extra ordinaria a nuestros usuarios finales', 'es'),
(28, 3, 'سياحة علاجيه', 'نتطلع إلى بناء شبكة كاملة من مراكز إعادة التأهيل والمستشفيات المعروفة لتوفير تجربة اكثر من عادية للمستخدمين النهائيين', 'ar'),
(29, 3, 'Medical Tourism', 'We are looking forward to build a complete network of well known rehabilitation centers and hospitals to provide an extra ordinary experience to our end users', 'en'),
(36, 1, 'DR CARE', 'Tenemos proveedores de servicios profesionales que incluyen enfermeras, médicos y cuidadores que están disponibles todo el tiempo para brindar diagnósticos, tratamientos y otros servicios de atención domiciliaria a pedido', 'es'),
(46, 7, 'سوق داى ستار', 'لدينا جميع الاجهزة الطبيه بمختلف انواعها وشركاتها المنتجه باختلاف بلدان المنشأ', 'ar'),
(47, 7, 'DAYSTAR MARKET', 'We have all kinds of medical devices and their producing companies in different countries of origin                       ', 'en'),
(48, 7, 'DAYSTAR MARKET', 'Contamos con todo tipo de dispositivos médicos y sus empresas productoras en diferentes países de origen                          ', 'es'),
(59, 8, 'Home Page', '                        DR CARE Medical Technology is a leading company in the medical devices field that built up on more than twenty years of experience and strong presence in the area of Middle East and Africa region                                ', 'en'),
(60, 8, 'Home Page', '                DR CARE Medical Technology es una compañía líder en el campo de los dispositivos médicos que se basó en más de veinte años de experiencia y una fuerte presencia en el área de la región de Medio Oriente y África                         ', 'es'),
(58, 8, 'الرئيسية', '                تعتبر DR CARE ميديكال تكنولوجى إحدى الشركات الرائدة في مجال الأجهزة الطبية التي بنيت على أكثر من عشرين عامًا من الخبرة وحضور قوي في منطقة الشرق الأوسط وإفريقيا. لدى داي ستار ميديكال تكنولوجى رؤية لبناء شركة تكنولوجيا طبية رائدة لدعم شبكة تواصل جيدة التنظيم بين المصنعين من كل العالم والموزعين في منطقة الشرق الأوسط وأفريقيا            ', 'ar'),
(63, 9, 'DR CARE', '                  Contamos con proveedores de servicios profesionales que incluyen médicos, enfermeras y cuidadores disponibles en todo momento.                                      ', 'es'),
(62, 9, 'DR CARE', '                We have professional service providers including doctors, nurses and caregivers available at all times            ', 'en'),
(61, 9, 'دكتور كير', '                لدينا مقدمى خدمات محترفين بما فى ذلك الاطباء والممرضين ومقدمى الرعاية المتوفرين طوال الوقت            ', 'ar'),
(65, 10, 'Daystar Market', '                We have all medical equipment of various kinds            ', 'en'),
(64, 10, 'داى ستار ماركت', '                لدينا جميع الاجهزة الطبية بمختلف انواعها\r\n            ', 'ar'),
(66, 10, 'Daystar Market', '                Disponemos de todo el equipamiento médico de diversa índole                                     ', 'es'),
(67, 11, 'تجارة', 'هدف داى ستار ميديكال تكنولوجى الاساسي هو توصيل الشركات المصنعة الى التجار المحليين', 'ar'),
(68, 11, 'Trading', 'Dstar Medical Technology\'s main goal is to connect manufacturers to local dealers                            ', 'en'),
(69, 11, 'comercio', 'El principal objetivo de Dstar Medical Technology es conectar a los fabricantes con los distribuidores locales                      ', 'es'),
(70, 12, 'سياحة علاجية', 'نتطلع الى بناء شبكة متكامله من مراكز اعادة التاهيل والمستشفيات المتكاملة', 'ar'),
(71, 12, 'Medical tourism', 'We are looking forward to building an integrated network of rehabilitation centers and integrated hospitals', 'en'),
(72, 12, 'Turismo médico', 'Esperamos construir una red integrada de centros de rehabilitación y hospitales integrados', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `service_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 1595268986, 1595268986, 0),
(2, 1, 1595269022, 1595269022, 0),
(3, 1, 1595269050, 1595269208, 0),
(4, 6, 1595269248, 1595269248, 0),
(5, 6, 1595269268, 1595269268, 0);

-- --------------------------------------------------------

--
-- Table structure for table `specialties_trans`
--

CREATE TABLE `specialties_trans` (
  `id` int(11) NOT NULL,
  `lang` enum('ar','en','es') NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `specialty_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties_trans`
--

INSERT INTO `specialties_trans` (`id`, `lang`, `title`, `content`, `specialty_id`) VALUES
(1, 'ar', 'اخصائى تمريض ', NULL, 1),
(2, 'en', 'Specialist Nursing', NULL, 1),
(3, 'es', 'Specialist Nursing', NULL, 1),
(4, 'ar', 'فنى تمريض', NULL, 2),
(5, 'en', 'Nursing technician', NULL, 2),
(6, 'es', 'Nursing technician', NULL, 2),
(11, 'en', 'Nursing assistant', NULL, 3),
(10, 'ar', 'مساعد تمريض ', NULL, 3),
(12, 'es', 'Nursing assistant', NULL, 3),
(13, 'ar', 'اخصائى', NULL, 4),
(14, 'en', 'specialist', NULL, 4),
(15, 'es', 'specialist', NULL, 4),
(16, 'ar', 'فنى', NULL, 5),
(17, 'en', 'Technical', NULL, 5),
(18, 'es', 'Technical', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `image`, `link`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'a012bd3ad2ca9cbc56ef18677806836f.png', 'http://maxiflexllc.com', 1578777712, 1578777712, 1),
(2, '9c3f39bcb9ec64a38dd747511fbe1575.PNG', 'https://www.corkmedical.com/products', 1578777958, 1578777958, 1),
(3, 'ba06ccea5ba650b2938284a508bb6e48.png', 'http://www.pharmaplast-online.net/', 1578778196, 1578778196, 1),
(4, 'dfdb3c3882f0200201cb5e05fed3fce4.png', 'https://www.corkmedical.com/', 1580576734, 1580576734, 1),
(5, 'b59ee6bc16182952388e2b035e4eef8d.png', 'Extra-mile.net', 1607333021, 1607333021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_trans`
--

CREATE TABLE `suppliers_trans` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers_trans`
--

INSERT INTO `suppliers_trans` (`id`, `supplier_id`, `title`, `address`, `content`, `lang`) VALUES
(1, 1, 'MaxiFlex LLC', 'MaxiFlex LLC', 'MaxiFlex ™ يقودها فريق الإدارة ذو الخبرة والمهندسين الذين لديهم معرفة واسعة في تطوير وتسويق الأجهزة الطبية المسالك البولية. يركز MaxiFlex ™ على تصنيع أجهزة باطنة ذات تكلفة معقولة وسهلة الاستخدام وأقل صدمة وأكثر فعالية من حيث التكلفة.\r\nأطلقت MaxiFlex ™ منتجين ، منظار الحالب المرن SemiFlex Scope ™ وخط من ألياف ليزر الهولميوم بأسعار معقولة.', 'ar'),
(2, 1, 'MaxiFlex LLC', 'MaxiFlex LLC', 'MaxiFlex™ Leaded by our experienced management team and engineers who have an extensive knowledge in the development and commercialization of Urological medical devices. MaxiFlex™ focuses on the manufacture of affordable endourology devices that are easy to use, less traumatic, and more cost-effective.\r\nMaxiFlex™ has launched two products, the SemiFlex Scope™ Flexible Ureteroscope and a line of affordable holmium laser fibers.\r\n', 'en'),
(3, 1, 'MaxiFlex LLC', 'MaxiFlex LLC', 'MaxiFlex ™ Liderado por nuestro experimentado equipo de gestión e ingenieros que tienen un amplio conocimiento en el desarrollo y comercialización de dispositivos médicos urológicos. MaxiFlex ™ se centra en la fabricación de dispositivos de endourología asequibles que son fáciles de usar, menos traumáticos y más rentables.\r\nMaxiFlex ™ ha lanzado dos productos, el ureteroscopio flexible SemiFlex Scope ™ y una línea de fibras láser de holmio asequibles.', 'es'),
(4, 2, 'Cork Medical  ', 'Cork Medical  ', 'Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds. The company products consist of Negative Pressure Wound Therapy, Specialty Mattresses, Overlays, and Cushions.\r\n\r\nCork Medical founded in Indianapolis, Indiana, in 2007 as a distributor of mattresses and cushions. As relationships developed with a clear focus on “Putting Patients First”, demand expanded and the company quickly transitioned from a distributor, to a national manufacturer of its own product line. Today, Cork Medical’s products sold across the United States in hospitals, nursing homes and homecare settings\r\n                            ', 'ar'),
(5, 2, 'Cork Medical  ', 'Cork Medical  ', '      Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds. The company products consist of Negative Pressure Wound Therapy, Specialty Mattresses, Overlays, and Cushions.\r\n\r\nCork Medical founded in Indianapolis, Indiana, in 2007 as a distributor of mattresses and cushions. As relationships developed with a clear focus on “Putting Patients First”, demand expanded and the company quickly transitioned from a distributor, to a national manufacturer of its own product line. Today, Cork Medical’s products sold across the United States in hospitals, nursing homes and homecare settings\r\n                      ', 'en'),
(6, 2, 'Cork Medical  ', 'Cork Medical  ', 'Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds. The company products consist of Negative Pressure Wound Therapy, Specialty Mattresses, Overlays, and Cushions.\r\n\r\nCork Medical founded in Indianapolis, Indiana, in 2007 as a distributor of mattresses and cushions. As relationships developed with a clear focus on “Putting Patients First”, demand expanded and the company quickly transitioned from a distributor, to a national manufacturer of its own product line. Today, Cork Medical’s products sold across the United States in hospitals, nursing homes and homecare settings\r\n                            ', 'es'),
(7, 3, 'Pharmaplast ', 'Pharmaplast ', 'تؤمن هذه الشركة بالابتكار المستمر وضمان الجودة وتوليد منتجات العناية بالجروح الجديدة المتاحة للمهنيين الطبيين الذين يؤمنون أيضًا بتوفير أقصى قدر من جودة رعاية المرضى مع الحفاظ على الأسعار منخفضة التكلفة                            ', 'ar'),
(8, 3, 'Pharmaplast ', 'Pharmaplast ', 'This company believes in consistent innovation, quality assurance, and the generation of making new wound care products available to medical professionals who also believe in providing maximum patient quality of care while keeping prices cost-efficient                            ', 'en'),
(9, 3, 'Pharmaplast ', 'Pharmaplast ', 'Esta empresa cree en la innovación constante, el aseguramiento de la calidad y la generación de poner a disposición de los profesionales médicos nuevos productos para el cuidado de heridas que también creen en proporcionar la máxima calidad de atención al paciente y mantener los precios rentables                            ', 'es'),
(10, 4, 'كورك ميديكال', 'كورك ميديكال', 'كورك ميديكال هي شركة مصنّعة للأجهزة الطبية واسطح الدعم متخصصة في تصميم وتصنيع منتجات مبتكرة لعلاج الجروح والوقاية منها', 'ar'),
(11, 4, 'Cork Medical ', 'Cork Medical ', 'Cork Medical is a Medical Device and Support Surface Manufacturer that specializes in designing and manufacturing innovative products for the treatment and prevention of wounds', 'en'),
(12, 4, 'Cork Medical ', 'Cork Medical ', 'Cork Medical es un fabricante de dispositivos médicos y superficies de soporte que se especializa en el diseño y la fabricación de productos innovadores para el tratamiento y la prevención de heridas.', 'es'),
(13, 5, 'اكسترا-ميل للتجارة', 'طارق الجبيلى', 'مستلزمات طبية عالية الجودة                            ', 'ar'),
(14, 5, 'Extra-Mile Trading', 'Tarek Elgebily', '                            High quality medical equipment', 'en'),
(15, 5, 'Extra-Mile Trading', 'Tarek Elgebily', 'High quality medical equipment', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `user_type` enum('admin','agent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `is_confirm` enum('new','no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `partner_id` int(11) NOT NULL DEFAULT '0',
  `is_developer` tinyint(4) NOT NULL DEFAULT '0',
  `is_login` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `password`, `name`, `email`, `phone`, `image`, `role`, `user_type`, `is_confirm`, `partner_id`, `is_developer`, `is_login`, `last_login`, `available`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ahmed@php07.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ahmed@php07.com', 'ahmed@php2020.com', '', '6234f0d0ab1c8288293bf7aa09e78ead.png', 1, 'admin', 'yes', 0, 1, 0, 1642447149, 1, NULL, NULL, '2022-01-18 01:57:40'),
(3, 'admin02@daystar.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'مدير التطبيق ', 'admin02@daystar.com', '', 'fc2809743e9ebe533303d37fce98b444.png', 1, 'admin', 'yes', 1, 0, 1, 1634025889, 1, NULL, '2020-05-09 19:28:26', '2021-10-12 12:04:49'),
(5, 'trader@trader.com', '', 'home care', 'trader@trader.com', '', '11902c3106e99a2b3a552d94681bacdb.png', 1, 'agent', 'yes', 2, 0, 0, 1602536018, 1, NULL, '2020-08-31 00:11:44', '2020-10-13 00:59:51'),
(6, 'extramile ', 'e3e782772a6d37981be8b1de0029b82f19384540', 'اكسترا ميل للتجاره', 'mohamed.bahnasy@extra-mile.net', NULL, 'f679af34bc96e1e082d2e46af18900ea.jpeg', 1, 'agent', 'new', 3, 0, 1, 1602010718, 1, NULL, '2020-10-06 22:58:38', '2020-10-06 22:58:38'),
(7, 'extramiletrading ', 'e3e782772a6d37981be8b1de0029b82f19384540', 'اكسترا ميل للتجاره', 'info@extra-mile.net', NULL, '0', 1, 'agent', 'new', 5, 0, 1, 1603021859, 1, NULL, '2020-10-18 15:50:59', '2020-10-18 15:50:59'),
(8, 'admin1@cv.com', '040bd08a4290267535cd247b8ba2eca129d9fe9f', 'المتحدة ', 'admin1@cv.com', NULL, '7dc9d18d14c1ddd9f04c358eb90ef7c2.jpg', 1, 'agent', 'new', 6, 0, 0, 1603224155, 1, NULL, '2020-10-21 00:02:35', '2020-10-21 00:02:42'),
(9, 'Ashrafkhairy', '04afb3c77c7a7046e2a1a5ed268f47bed6bf3b37', 'ASHRAF KHAIRY', 'ashrafkhairy@gmail.com', NULL, '0', 1, 'agent', 'new', 7, 0, 1, 1614758643, 1, NULL, '2021-03-03 13:04:03', '2021-03-03 13:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `web_count` int(11) NOT NULL DEFAULT '0',
  `android_count` int(11) NOT NULL DEFAULT '0',
  `ios_count` int(11) NOT NULL DEFAULT '0',
  `day_string` varchar(20) NOT NULL,
  `day_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `web_count`, `android_count`, `ios_count`, `day_string`, `day_date`) VALUES
(1, 1, 0, 0, '2020-07-21', 1595289600),
(2, 23, 2, 0, '2020-07-22', 1595376000),
(3, 26, 2, 0, '2020-07-23', 1595462400),
(4, 29, 0, 0, '2020-07-24', 1595548800),
(5, 19, 5, 0, '2020-07-25', 1595635200),
(6, 23, 2, 0, '2020-07-26', 1595721600),
(7, 34, 4, 0, '2020-07-27', 1595808000),
(8, 26, 4, 0, '2020-07-28', 1595894400),
(9, 25, 2, 0, '2020-07-29', 1595980800),
(10, 24, 0, 0, '2020-07-30', 1596067200),
(11, 26, 0, 0, '2020-07-31', 1596153600),
(12, 20, 1, 0, '2020-08-01', 1596240000),
(13, 24, 0, 0, '2020-08-02', 1596326400),
(14, 30, 2, 0, '2020-08-03', 1596412800),
(15, 26, 3, 0, '2020-08-04', 1596499200),
(16, 18, 3, 0, '2020-08-05', 1596585600),
(17, 35, 1, 0, '2020-08-06', 1596672000),
(18, 22, 1, 0, '2020-08-07', 1596758400),
(19, 56, 3, 0, '2020-08-08', 1596844800),
(20, 17, 1, 0, '2020-08-09', 1596931200),
(21, 29, 2, 0, '2020-08-10', 1597017600),
(22, 41, 1, 0, '2020-08-11', 1597104000),
(23, 45, 1, 0, '2020-08-12', 1597190400),
(24, 23, 1, 0, '2020-08-13', 1597276800),
(25, 24, 2, 0, '2020-08-14', 1597363200),
(26, 42, 1, 0, '2020-08-15', 1597449600),
(27, 63, 1, 0, '2020-08-16', 1597536000),
(28, 34, 0, 0, '2020-08-17', 1597622400),
(29, 1, 0, 0, '2020-08-17', 1597622400),
(30, 1, 0, 0, '2020-08-17', 1597622400),
(31, 15, 0, 0, '2020-08-18', 1597708800),
(32, 24, 1, 0, '2020-08-19', 1597795200),
(33, 17, 0, 0, '2020-08-20', 1597881600),
(34, 45, 0, 0, '2020-08-21', 1597968000),
(35, 22, 0, 0, '2020-08-22', 1598054400),
(36, 11, 0, 0, '2020-08-23', 1598140800),
(37, 30, 0, 0, '2020-08-24', 1598227200),
(38, 27, 0, 0, '2020-08-25', 1598313600),
(39, 30, 1, 0, '2020-08-26', 1598400000),
(40, 25, 0, 0, '2020-08-27', 1598486400),
(41, 30, 1, 0, '2020-08-28', 1598572800),
(42, 24, 0, 0, '2020-08-29', 1598659200),
(43, 17, 0, 0, '2020-08-30', 1598745600),
(44, 38, 0, 0, '2020-08-31', 1598832000),
(45, 26, 4, 0, '2020-09-01', 1598918400),
(46, 38, 0, 0, '2020-09-02', 1599004800),
(47, 31, 24, 0, '2020-09-03', 1599091200),
(48, 26, 11, 0, '2020-09-04', 1599177600),
(49, 39, 8, 0, '2020-09-05', 1599264000),
(50, 18, 7, 0, '2020-09-06', 1599350400),
(51, 28, 10, 0, '2020-09-07', 1599436800),
(52, 35, 8, 0, '2020-09-08', 1599523200),
(53, 27, 7, 0, '2020-09-09', 1599609600),
(54, 29, 5, 0, '2020-09-10', 1599696000),
(55, 37, 3, 0, '2020-09-11', 1599782400),
(56, 44, 3, 0, '2020-09-12', 1599868800),
(57, 32, 3, 0, '2020-09-13', 1599955200),
(58, 22, 3, 0, '2020-09-14', 1600041600),
(59, 38, 3, 0, '2020-09-15', 1600128000),
(60, 45, 2, 0, '2020-09-16', 1600214400),
(61, 48, 3, 0, '2020-09-17', 1600300800),
(62, 48, 2, 0, '2020-09-18', 1600387200),
(63, 36, 3, 0, '2020-09-19', 1600473600),
(64, 38, 2, 0, '2020-09-20', 1600560000),
(65, 44, 5, 0, '2020-09-21', 1600646400),
(66, 35, 4, 0, '2020-09-22', 1600732800),
(67, 35, 6, 0, '2020-09-23', 1600819200),
(68, 20, 3, 0, '2020-09-24', 1600905600),
(69, 46, 0, 0, '2020-09-25', 1600992000),
(70, 52, 0, 0, '2020-09-26', 1601078400),
(71, 36, 2, 0, '2020-09-27', 1601164800),
(72, 28, 5, 0, '2020-09-28', 1601251200),
(73, 42, 3, 0, '2020-09-29', 1601337600),
(74, 37, 3, 0, '2020-09-30', 1601424000),
(75, 32, 1, 0, '2020-10-01', 1601510400),
(76, 44, 1, 0, '2020-10-02', 1601596800),
(77, 39, 1, 0, '2020-10-03', 1601683200),
(78, 38, 6, 0, '2020-10-04', 1601769600),
(79, 26, 5, 0, '2020-10-05', 1601856000),
(80, 27, 12, 0, '2020-10-06', 1601942400),
(81, 32, 15, 0, '2020-10-07', 1602028800),
(82, 41, 5, 0, '2020-10-08', 1602115200),
(83, 45, 5, 0, '2020-10-09', 1602201600),
(84, 42, 2, 0, '2020-10-10', 1602288000),
(85, 38, 1, 0, '2020-10-11', 1602374400),
(86, 29, 5, 0, '2020-10-12', 1602460800),
(87, 35, 9, 0, '2020-10-13', 1602547200),
(88, 32, 9, 0, '2020-10-14', 1602633600),
(89, 29, 3, 0, '2020-10-15', 1602720000),
(90, 28, 1, 0, '2020-10-16', 1602806400),
(91, 30, 1, 0, '2020-10-17', 1602892800),
(92, 20, 2, 0, '2020-10-18', 1602979200),
(93, 41, 2, 0, '2020-10-19', 1603065600),
(94, 29, 3, 0, '2020-10-20', 1603152000),
(95, 31, 1, 0, '2020-10-21', 1603238400),
(96, 43, 6, 0, '2020-10-22', 1603324800),
(97, 20, 1, 0, '2020-10-23', 1603411200),
(98, 38, 6, 0, '2020-10-24', 1603497600),
(99, 31, 7, 0, '2020-10-25', 1603584000),
(100, 17, 1, 0, '2020-10-26', 1603670400),
(101, 65, 1, 0, '2020-10-27', 1603756800),
(102, 64, 5, 0, '2020-10-28', 1603843200),
(103, 50, 3, 0, '2020-10-29', 1603929600),
(104, 39, 1, 0, '2020-10-30', 1604016000),
(105, 42, 1, 0, '2020-10-31', 1604102400),
(106, 33, 1, 0, '2020-11-01', 1604188800),
(107, 43, 13, 0, '2020-11-02', 1604275200),
(108, 1, 0, 0, '2020-11-02', 1604275200),
(109, 64, 9, 0, '2020-11-03', 1604361600),
(110, 50, 10, 0, '2020-11-04', 1604448000),
(111, 70, 5, 0, '2020-11-05', 1604534400),
(112, 33, 5, 0, '2020-11-06', 1604620800),
(113, 53, 7, 0, '2020-11-07', 1604707200),
(114, 27, 6, 0, '2020-11-08', 1604793600),
(115, 21, 2, 0, '2020-11-09', 1604880000),
(116, 49, 5, 0, '2020-11-10', 1604966400),
(117, 55, 8, 0, '2020-11-11', 1605052800),
(118, 46, 5, 0, '2020-11-12', 1605139200),
(119, 74, 5, 0, '2020-11-13', 1605225600),
(120, 67, 5, 0, '2020-11-14', 1605312000),
(121, 91, 4, 0, '2020-11-15', 1605398400),
(122, 105, 3, 0, '2020-11-16', 1605484800),
(123, 116, 4, 0, '2020-11-17', 1605571200),
(124, 157, 7, 0, '2020-11-18', 1605657600),
(125, 68, 2, 0, '2020-11-19', 1605744000),
(126, 114, 5, 0, '2020-11-20', 1605830400),
(127, 79, 8, 0, '2020-11-21', 1605916800),
(128, 83, 12, 0, '2020-11-22', 1606003200),
(129, 83, 7, 0, '2020-11-23', 1606089600),
(130, 68, 6, 0, '2020-11-24', 1606176000),
(131, 44, 1, 0, '2020-11-25', 1606262400),
(132, 50, 4, 0, '2020-11-26', 1606348800),
(133, 56, 6, 0, '2020-11-27', 1606435200),
(134, 82, 4, 0, '2020-11-28', 1606521600),
(135, 76, 5, 0, '2020-11-29', 1606608000),
(136, 85, 6, 0, '2020-11-30', 1606694400),
(137, 92, 3, 0, '2020-12-01', 1606780800),
(138, 106, 4, 0, '2020-12-02', 1606867200),
(139, 58, 5, 0, '2020-12-03', 1606953600),
(140, 92, 3, 0, '2020-12-04', 1607040000),
(141, 110, 2, 0, '2020-12-05', 1607126400),
(142, 96, 4, 0, '2020-12-06', 1607212800),
(143, 84, 2, 0, '2020-12-07', 1607299200),
(144, 77, 0, 0, '2020-12-08', 1607385600),
(145, 80, 2, 0, '2020-12-09', 1607472000),
(146, 57, 1, 0, '2020-12-10', 1607558400),
(147, 43, 0, 0, '2020-12-11', 1607644800),
(148, 73, 1, 0, '2020-12-12', 1607731200),
(149, 73, 1, 0, '2020-12-13', 1607817600),
(150, 92, 1, 0, '2020-12-14', 1607904000),
(151, 73, 4, 0, '2020-12-15', 1607990400),
(152, 101, 0, 0, '2020-12-16', 1608076800),
(153, 87, 2, 0, '2020-12-17', 1608163200),
(154, 67, 2, 0, '2020-12-18', 1608249600),
(155, 54, 1, 0, '2020-12-19', 1608336000),
(156, 88, 1, 0, '2020-12-20', 1608422400),
(157, 72, 1, 0, '2020-12-21', 1608508800),
(158, 80, 1, 0, '2020-12-22', 1608595200),
(159, 90, 2, 0, '2020-12-23', 1608681600),
(160, 114, 3, 0, '2020-12-24', 1608768000),
(161, 95, 1, 0, '2020-12-25', 1608854400),
(162, 63, 0, 0, '2020-12-26', 1608940800),
(163, 74, 1, 0, '2020-12-27', 1609027200),
(164, 93, 0, 0, '2020-12-28', 1609113600),
(165, 90, 4, 0, '2020-12-29', 1609200000),
(166, 89, 4, 0, '2020-12-30', 1609286400),
(167, 92, 0, 0, '2020-12-31', 1609372800),
(168, 82, 2, 0, '2021-01-01', 1609459200),
(169, 127, 0, 0, '2021-01-02', 1609545600),
(170, 89, 0, 0, '2021-01-03', 1609632000),
(171, 83, 1, 0, '2021-01-04', 1609718400),
(172, 93, 1, 0, '2021-01-05', 1609804800),
(173, 109, 1, 0, '2021-01-06', 1609891200),
(174, 100, 4, 0, '2021-01-07', 1609977600),
(175, 113, 3, 0, '2021-01-08', 1610064000),
(176, 81, 1, 0, '2021-01-09', 1610150400),
(177, 91, 1, 0, '2021-01-10', 1610236800),
(178, 82, 3, 0, '2021-01-11', 1610323200),
(179, 95, 2, 0, '2021-01-12', 1610409600),
(180, 112, 3, 0, '2021-01-13', 1610496000),
(181, 85, 3, 0, '2021-01-14', 1610582400),
(182, 76, 5, 0, '2021-01-15', 1610668800),
(183, 69, 1, 0, '2021-01-16', 1610755200),
(184, 66, 5, 0, '2021-01-17', 1610841600),
(185, 63, 2, 0, '2021-01-18', 1610928000),
(186, 66, 3, 0, '2021-01-19', 1611014400),
(187, 61, 2, 0, '2021-01-20', 1611100800),
(188, 57, 4, 0, '2021-01-21', 1611187200),
(189, 56, 3, 0, '2021-01-22', 1611273600),
(190, 92, 5, 0, '2021-01-23', 1611360000),
(191, 81, 1, 0, '2021-01-24', 1611446400),
(192, 51, 3, 0, '2021-01-25', 1611532800),
(193, 42, 3, 0, '2021-01-26', 1611619200),
(194, 66, 4, 0, '2021-01-27', 1611705600),
(195, 36, 0, 0, '2021-01-28', 1611792000),
(196, 50, 0, 0, '2021-01-29', 1611878400),
(197, 62, 1, 0, '2021-01-30', 1611964800),
(198, 62, 2, 0, '2021-01-31', 1612051200),
(199, 73, 2, 0, '2021-02-01', 1612137600),
(200, 66, 1, 0, '2021-02-02', 1612224000),
(201, 46, 3, 0, '2021-02-03', 1612310400),
(202, 58, 2, 0, '2021-02-04', 1612396800),
(203, 54, 3, 0, '2021-02-05', 1612483200),
(204, 134, 1, 0, '2021-02-06', 1612569600),
(205, 44, 1, 0, '2021-02-07', 1612656000),
(206, 64, 2, 0, '2021-02-08', 1612742400),
(207, 57, 1, 0, '2021-02-09', 1612828800),
(208, 54, 1, 0, '2021-02-10', 1612915200),
(209, 48, 2, 0, '2021-02-11', 1613001600),
(210, 68, 2, 0, '2021-02-12', 1613088000),
(211, 49, 2, 0, '2021-02-13', 1613174400),
(212, 56, 2, 0, '2021-02-14', 1613260800),
(213, 77, 1, 0, '2021-02-15', 1613347200),
(214, 65, 0, 0, '2021-02-16', 1613433600),
(215, 74, 1, 0, '2021-02-17', 1613520000),
(216, 60, 0, 0, '2021-02-18', 1613606400),
(217, 60, 0, 0, '2021-02-19', 1613692800),
(218, 84, 0, 0, '2021-02-20', 1613779200),
(219, 75, 1, 0, '2021-02-21', 1613865600),
(220, 81, 1, 0, '2021-02-22', 1613952000),
(221, 79, 1, 0, '2021-02-23', 1614038400),
(222, 115, 1, 0, '2021-02-24', 1614124800),
(223, 140, 3, 0, '2021-02-25', 1614211200),
(224, 87, 1, 0, '2021-02-26', 1614297600),
(225, 140, 1, 0, '2021-02-27', 1614384000),
(226, 89, 1, 0, '2021-02-28', 1614470400),
(227, 93, 0, 0, '2021-03-01', 1614556800),
(228, 99, 1, 0, '2021-03-02', 1614643200),
(229, 95, 1, 0, '2021-03-03', 1614729600),
(230, 107, 0, 0, '2021-03-04', 1614816000),
(231, 82, 0, 0, '2021-03-05', 1614902400),
(232, 140, 0, 0, '2021-03-06', 1614988800),
(233, 95, 1, 0, '2021-03-07', 1615075200),
(234, 87, 0, 0, '2021-03-08', 1615161600),
(235, 81, 0, 0, '2021-03-09', 1615248000),
(236, 85, 0, 0, '2021-03-10', 1615334400),
(237, 117, 2, 0, '2021-03-11', 1615420800),
(238, 63, 0, 0, '2021-03-12', 1615507200),
(239, 66, 0, 0, '2021-03-13', 1615593600),
(240, 87, 1, 0, '2021-03-14', 1615680000),
(241, 177, 2, 0, '2021-03-15', 1615766400),
(242, 108, 0, 0, '2021-03-16', 1615852800),
(243, 107, 0, 0, '2021-03-17', 1615939200),
(244, 96, 0, 0, '2021-03-18', 1616025600),
(245, 98, 0, 0, '2021-03-19', 1616112000),
(246, 58, 0, 0, '2021-03-20', 1616198400),
(247, 60, 1, 0, '2021-03-21', 1616284800),
(248, 61, 0, 0, '2021-03-22', 1616371200),
(249, 87, 1, 0, '2021-03-23', 1616457600),
(250, 89, 0, 0, '2021-03-24', 1616544000),
(251, 79, 0, 0, '2021-03-25', 1616630400),
(252, 69, 2, 0, '2021-03-26', 1616716800),
(253, 54, 0, 0, '2021-03-27', 1616803200),
(254, 50, 0, 0, '2021-03-28', 1616889600),
(255, 36, 1, 0, '2021-03-29', 1616976000),
(256, 92, 1, 0, '2021-03-30', 1617062400),
(257, 70, 0, 0, '2021-03-31', 1617148800),
(258, 60, 0, 0, '2021-04-01', 1617235200),
(259, 40, 0, 0, '2021-04-02', 1617321600),
(260, 63, 0, 0, '2021-04-03', 1617408000),
(261, 48, 0, 0, '2021-04-04', 1617494400),
(262, 59, 0, 0, '2021-04-05', 1617580800),
(263, 52, 1, 0, '2021-04-06', 1617667200),
(264, 53, 0, 0, '2021-04-07', 1617753600),
(265, 56, 0, 0, '2021-04-08', 1617840000),
(266, 73, 1, 0, '2021-04-09', 1617926400),
(267, 62, 1, 0, '2021-04-10', 1618012800),
(268, 44, 0, 0, '2021-04-11', 1618099200),
(269, 57, 1, 0, '2021-04-12', 1618185600),
(270, 46, 0, 0, '2021-04-13', 1618272000),
(271, 45, 1, 0, '2021-04-14', 1618358400),
(272, 83, 0, 0, '2021-04-15', 1618444800),
(273, 88, 0, 0, '2021-04-16', 1618531200),
(274, 91, 0, 0, '2021-04-17', 1618617600),
(275, 84, 1, 0, '2021-04-18', 1618704000),
(276, 52, 2, 0, '2021-04-19', 1618790400),
(277, 48, 1, 0, '2021-04-20', 1618876800),
(278, 49, 1, 0, '2021-04-21', 1618963200),
(279, 79, 0, 0, '2021-04-22', 1619049600),
(280, 92, 0, 0, '2021-04-23', 1619136000),
(281, 69, 0, 0, '2021-04-24', 1619222400),
(282, 70, 0, 0, '2021-04-25', 1619308800),
(283, 74, 0, 0, '2021-04-26', 1619395200),
(284, 62, 1, 0, '2021-04-27', 1619481600),
(285, 44, 0, 0, '2021-04-28', 1619568000),
(286, 70, 0, 0, '2021-04-29', 1619654400),
(287, 58, 0, 0, '2021-04-30', 1619740800),
(288, 51, 1, 0, '2021-05-01', 1619827200),
(289, 51, 0, 0, '2021-05-02', 1619913600),
(290, 77, 0, 0, '2021-05-03', 1620000000),
(291, 82, 0, 0, '2021-05-04', 1620086400),
(292, 86, 0, 0, '2021-05-05', 1620172800),
(293, 65, 1, 0, '2021-05-06', 1620259200),
(294, 75, 0, 0, '2021-05-07', 1620345600),
(295, 96, 0, 0, '2021-05-08', 1620432000),
(296, 56, 0, 0, '2021-05-09', 1620518400),
(297, 69, 0, 0, '2021-05-10', 1620604800),
(298, 155, 0, 0, '2021-05-11', 1620691200),
(299, 47, 1, 0, '2021-05-12', 1620777600),
(300, 64, 0, 0, '2021-05-13', 1620864000),
(301, 42, 0, 0, '2021-05-14', 1620950400),
(302, 190, 0, 0, '2021-05-15', 1621036800),
(303, 63, 0, 0, '2021-05-16', 1621123200),
(304, 64, 0, 0, '2021-05-17', 1621209600),
(305, 74, 2, 0, '2021-05-18', 1621296000),
(306, 41, 0, 0, '2021-05-19', 1621382400),
(307, 129, 0, 0, '2021-05-20', 1621468800),
(308, 54, 0, 0, '2021-05-21', 1621555200),
(309, 75, 1, 0, '2021-05-22', 1621641600),
(310, 41, 4, 0, '2021-05-23', 1621728000),
(311, 85, 0, 0, '2021-05-24', 1621814400),
(312, 85, 0, 0, '2021-05-25', 1621900800),
(313, 86, 0, 0, '2021-05-26', 1621987200),
(314, 82, 0, 0, '2021-05-27', 1622073600),
(315, 90, 0, 0, '2021-05-28', 1622160000),
(316, 65, 0, 0, '2021-05-29', 1622246400),
(317, 53, 0, 0, '2021-05-30', 1622332800),
(318, 64, 0, 0, '2021-05-31', 1622419200),
(319, 115, 0, 0, '2021-06-01', 1622505600),
(320, 207, 0, 0, '2021-06-02', 1622592000),
(321, 93, 0, 0, '2021-06-03', 1622678400),
(322, 178, 0, 0, '2021-06-04', 1622764800),
(323, 126, 2, 0, '2021-06-05', 1622851200),
(324, 58, 1, 0, '2021-06-06', 1622937600),
(325, 199, 0, 0, '2021-06-07', 1623024000),
(326, 1, 0, 0, '2021-06-07', 1623024000),
(327, 136, 0, 0, '2021-06-08', 1623110400),
(328, 97, 1, 0, '2021-06-09', 1623196800),
(329, 69, 1, 0, '2021-06-10', 1623283200),
(330, 83, 0, 0, '2021-06-11', 1623369600),
(331, 58, 0, 0, '2021-06-12', 1623456000),
(332, 63, 0, 0, '2021-06-13', 1623542400),
(333, 57, 0, 0, '2021-06-14', 1623628800),
(334, 92, 1, 0, '2021-06-15', 1623715200),
(335, 90, 0, 0, '2021-06-16', 1623801600),
(336, 127, 1, 0, '2021-06-17', 1623888000),
(337, 43, 0, 0, '2021-06-18', 1623974400),
(338, 47, 0, 0, '2021-06-19', 1624060800),
(339, 68, 0, 0, '2021-06-20', 1624147200),
(340, 60, 0, 0, '2021-06-21', 1624233600),
(341, 56, 0, 0, '2021-06-22', 1624320000),
(342, 46, 0, 0, '2021-06-23', 1624406400),
(343, 49, 0, 0, '2021-06-24', 1624492800),
(344, 67, 0, 0, '2021-06-25', 1624579200),
(345, 46, 0, 0, '2021-06-26', 1624665600),
(346, 52, 1, 0, '2021-06-27', 1624752000),
(347, 83, 1, 0, '2021-06-28', 1624838400),
(348, 94, 0, 0, '2021-06-29', 1624924800),
(349, 58, 0, 0, '2021-06-30', 1625011200),
(350, 42, 1, 0, '2021-07-01', 1625097600),
(351, 64, 1, 0, '2021-07-02', 1625184000),
(352, 75, 1, 0, '2021-07-03', 1625270400),
(353, 53, 2, 0, '2021-07-04', 1625356800),
(354, 65, 4, 0, '2021-07-05', 1625443200),
(355, 48, 0, 0, '2021-07-06', 1625529600),
(356, 107, 0, 0, '2021-07-07', 1625616000),
(357, 36, 0, 0, '2021-07-08', 1625702400),
(358, 124, 0, 0, '2021-07-09', 1625788800),
(359, 58, 0, 0, '2021-07-10', 1625875200),
(360, 53, 1, 0, '2021-07-11', 1625961600),
(361, 52, 1, 0, '2021-07-12', 1626048000),
(362, 53, 1, 0, '2021-07-13', 1626134400),
(363, 51, 1, 0, '2021-07-14', 1626220800),
(364, 86, 1, 0, '2021-07-15', 1626307200),
(365, 133, 0, 0, '2021-07-16', 1626393600),
(366, 60, 2, 0, '2021-07-17', 1626480000),
(367, 47, 0, 0, '2021-07-18', 1626566400),
(368, 44, 0, 0, '2021-07-19', 1626652800),
(369, 81, 0, 0, '2021-07-20', 1626739200),
(370, 63, 0, 0, '2021-07-21', 1626825600),
(371, 55, 0, 0, '2021-07-22', 1626912000),
(372, 60, 0, 0, '2021-07-23', 1626998400),
(373, 61, 0, 0, '2021-07-24', 1627084800),
(374, 65, 0, 0, '2021-07-25', 1627171200),
(375, 69, 0, 0, '2021-07-26', 1627257600),
(376, 83, 0, 0, '2021-07-27', 1627344000),
(377, 53, 0, 0, '2021-07-28', 1627430400),
(378, 69, 0, 0, '2021-07-29', 1627516800),
(379, 56, 0, 0, '2021-07-30', 1627603200),
(380, 71, 0, 0, '2021-07-31', 1627689600),
(381, 62, 0, 0, '2021-08-01', 1627776000),
(382, 64, 0, 0, '2021-08-02', 1627862400),
(383, 51, 0, 0, '2021-08-03', 1627948800),
(384, 54, 0, 0, '2021-08-04', 1628035200),
(385, 57, 2, 0, '2021-08-05', 1628121600),
(386, 71, 0, 0, '2021-08-06', 1628208000),
(387, 67, 0, 0, '2021-08-07', 1628294400),
(388, 84, 0, 0, '2021-08-08', 1628380800),
(389, 63, 0, 0, '2021-08-09', 1628467200),
(390, 58, 0, 0, '2021-08-10', 1628553600),
(391, 57, 0, 0, '2021-08-11', 1628640000),
(392, 63, 0, 0, '2021-08-12', 1628726400),
(393, 43, 0, 0, '2021-08-13', 1628812800),
(394, 74, 1, 0, '2021-08-14', 1628899200),
(395, 55, 0, 0, '2021-08-15', 1628985600),
(396, 40, 0, 0, '2021-08-16', 1629072000),
(397, 151, 1, 0, '2021-08-17', 1629158400),
(398, 65, 0, 0, '2021-08-18', 1629244800),
(399, 101, 0, 0, '2021-08-19', 1629331200),
(400, 57, 1, 0, '2021-08-20', 1629417600),
(401, 93, 0, 0, '2021-08-21', 1629504000),
(402, 46, 1, 0, '2021-08-22', 1629590400),
(403, 49, 0, 0, '2021-08-23', 1629676800),
(404, 57, 0, 0, '2021-08-24', 1629763200),
(405, 53, 0, 0, '2021-08-25', 1629849600),
(406, 86, 0, 0, '2021-08-26', 1629936000),
(407, 81, 1, 0, '2021-08-27', 1630022400),
(408, 45, 0, 0, '2021-08-28', 1630108800),
(409, 48, 1, 0, '2021-08-29', 1630195200),
(410, 50, 0, 0, '2021-08-30', 1630281600),
(411, 42, 0, 0, '2021-08-31', 1630368000),
(412, 137, 0, 0, '2021-09-01', 1630454400),
(413, 56, 0, 0, '2021-09-02', 1630540800),
(414, 45, 0, 0, '2021-09-03', 1630627200),
(415, 89, 0, 0, '2021-09-04', 1630713600),
(416, 55, 0, 0, '2021-09-05', 1630800000),
(417, 35, 0, 0, '2021-09-06', 1630886400),
(418, 93, 0, 0, '2021-09-07', 1630972800),
(419, 56, 0, 0, '2021-09-08', 1631059200),
(420, 54, 0, 0, '2021-09-09', 1631145600),
(421, 46, 0, 0, '2021-09-10', 1631232000),
(422, 50, 0, 0, '2021-09-11', 1631318400),
(423, 128, 0, 0, '2021-09-12', 1631404800),
(424, 68, 0, 0, '2021-09-13', 1631491200),
(425, 57, 0, 0, '2021-09-14', 1631577600),
(426, 45, 0, 0, '2021-09-15', 1631664000),
(427, 50, 0, 0, '2021-09-16', 1631750400),
(428, 56, 0, 0, '2021-09-17', 1631836800),
(429, 80, 0, 0, '2021-09-18', 1631923200),
(430, 64, 0, 0, '2021-09-19', 1632009600),
(431, 78, 0, 0, '2021-09-20', 1632096000),
(432, 70, 0, 0, '2021-09-21', 1632182400),
(433, 50, 0, 0, '2021-09-22', 1632268800),
(434, 77, 0, 0, '2021-09-23', 1632355200),
(435, 38, 0, 0, '2021-09-24', 1632441600),
(436, 47, 0, 0, '2021-09-25', 1632528000),
(437, 28, 1, 0, '2021-09-26', 1632614400),
(438, 42, 0, 0, '2021-09-27', 1632700800),
(439, 78, 0, 0, '2021-09-28', 1632787200),
(440, 154, 0, 0, '2021-09-29', 1632873600),
(441, 65, 0, 0, '2021-09-30', 1632960000),
(442, 49, 0, 0, '2021-10-01', 1633046400),
(443, 45, 0, 0, '2021-10-02', 1633132800),
(444, 48, 0, 0, '2021-10-03', 1633219200),
(445, 46, 0, 0, '2021-10-04', 1633305600),
(446, 82, 0, 0, '2021-10-05', 1633392000),
(447, 76, 0, 0, '2021-10-06', 1633478400),
(448, 70, 0, 0, '2021-10-07', 1633564800),
(449, 57, 1, 0, '2021-10-08', 1633651200),
(450, 40, 0, 0, '2021-10-09', 1633737600),
(451, 90, 0, 0, '2021-10-10', 1633824000),
(452, 58, 0, 0, '2021-10-11', 1633910400),
(453, 56, 0, 0, '2021-10-12', 1633996800),
(454, 50, 0, 0, '2021-10-13', 1634083200),
(455, 39, 0, 0, '2021-10-14', 1634169600),
(456, 50, 0, 0, '2021-10-15', 1634256000),
(457, 43, 0, 0, '2021-10-16', 1634342400),
(458, 50, 0, 0, '2021-10-17', 1634428800),
(459, 124, 0, 0, '2021-10-18', 1634515200),
(460, 54, 1, 0, '2021-10-19', 1634601600),
(461, 54, 0, 0, '2021-10-20', 1634688000),
(462, 68, 0, 0, '2021-10-21', 1634774400),
(463, 85, 0, 0, '2021-10-22', 1634860800),
(464, 37, 0, 0, '2021-10-23', 1634947200),
(465, 49, 0, 0, '2021-10-24', 1635033600),
(466, 46, 0, 0, '2021-10-25', 1635120000),
(467, 60, 0, 0, '2021-10-26', 1635206400),
(468, 64, 0, 0, '2021-10-27', 1635292800),
(469, 56, 0, 0, '2021-10-28', 1635379200),
(470, 72, 0, 0, '2021-10-29', 1635465600),
(471, 33, 0, 0, '2021-10-30', 1635552000),
(472, 45, 0, 0, '2021-10-31', 1635638400),
(473, 62, 0, 0, '2021-11-01', 1635724800),
(474, 64, 0, 0, '2021-11-02', 1635811200),
(475, 55, 0, 0, '2021-11-03', 1635897600),
(476, 44, 0, 0, '2021-11-04', 1635984000),
(477, 60, 2, 0, '2021-11-05', 1636070400),
(478, 35, 1, 0, '2021-11-06', 1636156800),
(479, 57, 0, 0, '2021-11-07', 1636243200),
(480, 71, 0, 0, '2021-11-08', 1636329600),
(481, 78, 0, 0, '2021-11-09', 1636416000),
(482, 74, 1, 0, '2021-11-10', 1636502400),
(483, 67, 1, 0, '2021-11-11', 1636588800),
(484, 40, 1, 0, '2021-11-12', 1636675200),
(485, 41, 0, 0, '2021-11-13', 1636761600),
(486, 34, 0, 0, '2021-11-14', 1636848000),
(487, 53, 0, 0, '2021-11-15', 1636934400),
(488, 45, 0, 0, '2021-11-16', 1637020800),
(489, 117, 0, 0, '2021-11-17', 1637107200),
(490, 47, 0, 0, '2021-11-18', 1637193600),
(491, 47, 0, 0, '2021-11-19', 1637280000),
(492, 59, 0, 0, '2021-11-20', 1637366400),
(493, 39, 0, 0, '2021-11-21', 1637452800),
(494, 80, 0, 0, '2021-11-22', 1637539200),
(495, 214, 0, 0, '2021-11-23', 1637625600),
(496, 84, 0, 0, '2021-11-24', 1637712000),
(497, 38, 0, 0, '2021-11-25', 1637798400),
(498, 51, 0, 0, '2021-11-26', 1637884800),
(499, 53, 0, 0, '2021-11-27', 1637971200),
(500, 31, 0, 0, '2021-11-28', 1638057600),
(501, 54, 0, 0, '2021-11-29', 1638144000),
(502, 43, 0, 0, '2021-11-30', 1638230400),
(503, 67, 0, 0, '2021-12-01', 1638316800),
(504, 40, 0, 0, '2021-12-02', 1638403200),
(505, 49, 0, 0, '2021-12-03', 1638489600),
(506, 46, 1, 0, '2021-12-04', 1638576000),
(507, 60, 0, 0, '2021-12-05', 1638662400),
(508, 72, 0, 0, '2021-12-06', 1638748800),
(509, 120, 0, 0, '2021-12-07', 1638835200),
(510, 41, 1, 0, '2021-12-08', 1638921600),
(511, 35, 0, 0, '2021-12-09', 1639008000),
(512, 37, 0, 0, '2021-12-10', 1639094400),
(513, 27, 0, 0, '2021-12-11', 1639180800),
(514, 51, 0, 0, '2021-12-12', 1639267200),
(515, 32, 0, 0, '2021-12-13', 1639353600),
(516, 56, 0, 0, '2021-12-14', 1639440000),
(517, 34, 0, 0, '2021-12-15', 1639526400),
(518, 62, 0, 0, '2021-12-16', 1639612800),
(519, 38, 1, 0, '2021-12-17', 1639699200),
(520, 52, 0, 0, '2021-12-18', 1639785600),
(521, 51, 0, 0, '2021-12-19', 1639872000),
(522, 36, 0, 0, '2021-12-20', 1639958400),
(523, 114, 0, 0, '2021-12-21', 1640044800),
(524, 52, 0, 0, '2021-12-22', 1640131200),
(525, 37, 0, 0, '2021-12-23', 1640217600),
(526, 28, 0, 0, '2021-12-24', 1640304000),
(527, 61, 0, 0, '2021-12-25', 1640390400),
(528, 29, 0, 0, '2021-12-26', 1640476800),
(529, 38, 0, 0, '2021-12-27', 1640563200),
(530, 35, 0, 0, '2021-12-28', 1640649600),
(531, 52, 0, 0, '2021-12-29', 1640736000),
(532, 60, 0, 0, '2021-12-30', 1640822400),
(533, 99, 0, 0, '2021-12-31', 1640908800),
(534, 63, 0, 0, '2022-01-01', 1640995200),
(535, 39, 0, 0, '2022-01-02', 1641081600),
(536, 75, 0, 0, '2022-01-03', 1641168000),
(537, 114, 0, 0, '2022-01-04', 1641254400),
(538, 104, 0, 0, '2022-01-05', 1641340800),
(539, 61, 0, 0, '2022-01-06', 1641427200),
(540, 43, 1, 0, '2022-01-07', 1641513600),
(541, 44, 0, 0, '2022-01-08', 1641600000),
(542, 40, 1, 0, '2022-01-09', 1641686400),
(543, 57, 0, 0, '2022-01-10', 1641772800),
(544, 56, 0, 0, '2022-01-11', 1641859200),
(545, 61, 0, 0, '2022-01-12', 1641945600),
(546, 31, 0, 0, '2022-01-13', 1642032000),
(547, 44, 0, 0, '2022-01-14', 1642118400),
(548, 47, 0, 0, '2022-01-15', 1642204800),
(549, 27, 1, 0, '2022-01-16', 1642291200),
(550, 42, 2, 0, '2022-01-17', 1642377600),
(551, 116, 0, 0, '2022-01-18', 1642464000),
(552, 53, 1, 0, '2022-01-19', 1642550400),
(553, 86, 0, 0, '2022-01-20', 1642636800),
(554, 39, 1, 0, '2022-01-21', 1642723200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_orders`
--
ALTER TABLE `all_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `announcer`
--
ALTER TABLE `announcer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcer_accounts`
--
ALTER TABLE `announcer_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD UNIQUE KEY `id` (`area_id`);

--
-- Indexes for table `areas_trans`
--
ALTER TABLE `areas_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`),
  ADD UNIQUE KEY `idx_countries_code3l` (`iso_three`),
  ADD UNIQUE KEY `idx_countries_code2l` (`iso_two`);

--
-- Indexes for table `countries_trans`
--
ALTER TABLE `countries_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments_trans`
--
ALTER TABLE `departments_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_base_tokens`
--
ALTER TABLE `fire_base_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms_setting`
--
ALTER TABLE `forms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_notifications`
--
ALTER TABLE `market_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `market_orders`
--
ALTER TABLE `market_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_orders_details`
--
ALTER TABLE `market_orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_orders_details_offers`
--
ALTER TABLE `market_orders_details_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_orders_partner`
--
ALTER TABLE `market_orders_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_tourism`
--
ALTER TABLE `medical_tourism`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_tourism_trans`
--
ALTER TABLE `medical_tourism_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_trans`
--
ALTER TABLE `news_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notifications_trans`
--
ALTER TABLE `notifications_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners_trans`
--
ALTER TABLE `partners_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD KEY `permissions_user_id_foreign` (`user_id`),
  ADD KEY `permissions_page_id_foreign` (`page_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_trans`
--
ALTER TABLE `places_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices_countries`
--
ALTER TABLE `prices_countries`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_campanies`
--
ALTER TABLE `products_campanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_campanies_trans`
--
ALTER TABLE `products_campanies_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_lang`
--
ALTER TABLE `products_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_partners`
--
ALTER TABLE `products_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_partners_trans`
--
ALTER TABLE `products_partners_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_prices`
--
ALTER TABLE `products_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_trans`
--
ALTER TABLE `products_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_trans`
--
ALTER TABLE `project_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_trans_world_key_unique` (`world_key`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `registrations_email_unique` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `services_prices`
--
ALTER TABLE `services_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_trans`
--
ALTER TABLE `services_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id_fk` (`service_id_fk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_trans`
--
ALTER TABLE `slider_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties_trans`
--
ALTER TABLE `specialties_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_trans`
--
ALTER TABLE `suppliers_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_username_unique` (`user_username`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `all_orders`
--
ALTER TABLE `all_orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `announcer`
--
ALTER TABLE `announcer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcer_accounts`
--
ALTER TABLE `announcer_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `areas_trans`
--
ALTER TABLE `areas_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `countries_trans`
--
ALTER TABLE `countries_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons_users`
--
ALTER TABLE `coupons_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments_trans`
--
ALTER TABLE `departments_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fire_base_tokens`
--
ALTER TABLE `fire_base_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `forms_setting`
--
ALTER TABLE `forms_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `market_notifications`
--
ALTER TABLE `market_notifications`
  MODIFY `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market_orders`
--
ALTER TABLE `market_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `market_orders_details`
--
ALTER TABLE `market_orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `market_orders_details_offers`
--
ALTER TABLE `market_orders_details_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `market_orders_partner`
--
ALTER TABLE `market_orders_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_tourism`
--
ALTER TABLE `medical_tourism`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_tourism_trans`
--
ALTER TABLE `medical_tourism_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_trans`
--
ALTER TABLE `news_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `notifications_trans`
--
ALTER TABLE `notifications_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partners_trans`
--
ALTER TABLE `partners_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `places_trans`
--
ALTER TABLE `places_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prices_countries`
--
ALTER TABLE `prices_countries`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_campanies`
--
ALTER TABLE `products_campanies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_campanies_trans`
--
ALTER TABLE `products_campanies_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_lang`
--
ALTER TABLE `products_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_partners`
--
ALTER TABLE `products_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_partners_trans`
--
ALTER TABLE `products_partners_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_prices`
--
ALTER TABLE `products_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_trans`
--
ALTER TABLE `products_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `project_trans`
--
ALTER TABLE `project_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `services_prices`
--
ALTER TABLE `services_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `services_trans`
--
ALTER TABLE `services_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1096;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_trans`
--
ALTER TABLE `slider_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialties_trans`
--
ALTER TABLE `specialties_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers_trans`
--
ALTER TABLE `suppliers_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `services_trans`
--
ALTER TABLE `services_trans`
  ADD CONSTRAINT `services_trans_ibfk_1` FOREIGN KEY (`service_id_fk`) REFERENCES `services` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
