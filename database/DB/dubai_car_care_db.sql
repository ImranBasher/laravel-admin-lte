-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2025 at 05:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dubai_car_care_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `description_start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_middle` text COLLATE utf8mb4_unicode_ci,
  `description_end` text COLLATE utf8mb4_unicode_ci,
  `mechanics_title_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mechanics_title_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mechanics_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description_start`, `description_middle`, `description_end`, `mechanics_title_start`, `mechanics_title_end`, `mechanics_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience with us is pleasant and efficient.When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience with us is pleasant and efficient.When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands.', 'We understand that wellbeing is a multifaceted concept, which is why we offer holistic solutions that integrate physical, mental, and spiritual fitness.', 'When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience with us is pleasant and efficient.', 'Meet Our Expert Car', 'Mechanics', 'When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience', 1, '2025-07-05 13:42:37', '2025-07-27 20:40:08'),
(2, 'ttt', 'ttt', 'tttt', 'ttt', 'ttt', 'tttt', 1, '2025-07-05 13:50:39', '2025-07-05 13:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_1` text COLLATE utf8mb4_unicode_ci,
  `description_2` text COLLATE utf8mb4_unicode_ci,
  `description_3` text COLLATE utf8mb4_unicode_ci,
  `description_4` text COLLATE utf8mb4_unicode_ci,
  `description_5` text COLLATE utf8mb4_unicode_ci,
  `description_6` text COLLATE utf8mb4_unicode_ci,
  `description_7` text COLLATE utf8mb4_unicode_ci,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_title`, `author`, `description_1`, `description_2`, `description_3`, `description_4`, `description_5`, `description_6`, `description_7`, `author_id`, `published_at`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Car AC Immediate Repair', NULL, NULL, '<p>As temperatures rise and the summer sun beats down, a car AC (air conditioning) system becomes less of a luxury and more of a necessity. Yet, when your car&rsquo;s AC suddenly stops working its magic, it can disrupt your daily routine and even pose risks to your vehicle. Understanding the early signs of car AC malfunction can save you from sweaty commutes and costly repairs. For advanced and fast repair, we are here at&nbsp;<a href=\"https://carfixingdubai.com/\">Car Fixing Dubai</a>.</p>', '<h2>1. Strange Sounds&mdash;Not the Good Kind You&rsquo;d Like to Hear</h2>\r\n\r\n<p>Did you ever turn on your car AC and hear weird noises&mdash;louder noises like grinding or squealing? The first time it happened to me, I assumed it was a simple matter of the car warming up, but it was something else altogether. I drove the car in, and the mechanic told me it was probably a compressor or condenser gone bad. Those parts work hard, and when they begin to wear, they get noisy. If you do hear something out of the ordinary, get it checked out early to prevent larger and more expensive repairs.</p>', '<h2>2. Horrible Odors&mdash;When Your Car Pongs and It Smells Like Something&rsquo;s Growing in There</h2>\r\n\r\n<p>This is one I certainly wasn&rsquo;t expecting. I turned on the car AC on my way to work, and BAM&mdash;this disgusting, musty smell just hit me. It probably was just the air freshener, I rationalized. But after a visit to the repair shop, I discovered that it was mold or mildew in the air conditioner. It is totally possible that the moisture that was trapped in the system causes that. If you smell something fishy, don&rsquo;t just open a window and let it out. Get the AC cleaned professionally &mdash; it&rsquo;s both an easy fix and, if not addressed, will only get worse.</p>', '<h2>3. Poor Airflow&mdash; car AC Not Blowing Cold Air</h2>\r\n\r\n<p>You know the sensation when you turn on the air conditioner, and it feels more like a light breeze than a rush of cool air? I&rsquo;ve had that in the summer. It&rsquo;s frustrating. I switched it on, anticipating a cool blast, and got a soft puff of air instead. It turned out the filter was clogged and the fan wasn&rsquo;t working right. This is an easy one to correct, but many forget about it until they&rsquo;re madly sweltering in their car. If you&rsquo;re not getting enough airflow, have your&nbsp; car AC inspected before it does more harm than good.</p>\r\n\r\n<h2>4. NOT Cool&mdash;And Not Even The Slightest Bit Warm</h2>\r\n\r\n<p>This one is a no-brainer. Your&nbsp; car AC should not be blowing warm air, period. If it is, something is absolutely off. The time I was driving, and on a hot day my AC went from its cold to just warm. Talk about a disappointment. It was low on refrigerant, which didn&rsquo;t mean anything to me. After a refill, the&nbsp; car AC was as good as new. When you&rsquo;re receiving warm air from your AC, have it checked out as soon as possible &mdash; it is a quick fix and can help avoid much bigger issues.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-25 20:28:09', '2025-07-25 20:28:09'),
(3, 'A', NULL, NULL, '<p>D</p>', '<p>E</p>', '<p>F</p>', '<p>G</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-25 20:50:46', '2025-07-25 20:50:46'),
(4, 'A', 'B', 'C', '<p>ghjjhr</p>', '<p>rtrur</p>', '<p>fgjfj</p>', '<p>thrtyh</p>', '<p>ghth</p>', '<p>fgjfytjh</p>', '<p>jyhjj</p>', NULL, NULL, NULL, NULL, NULL, 1, '2025-07-26 19:15:34', '2025-07-26 19:17:01'),
(5, 'PPPPPPPP', 'FFFFFFFF', 'YYYYYYY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-26 20:36:49', '2025-07-26 20:36:49'),
(6, 'yyyyyyy', 'jjjjjjjjjjjjj', 'uuuuuuuuuu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-26 20:37:16', '2025-07-26 20:37:16'),
(7, 'ttttttt', 'tttttttt', 'ttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-26 20:37:35', '2025-07-26 20:37:35'),
(8, 'gggggggg', 'ggggg', 'ggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-26 20:37:53', '2025-07-26 20:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'A', 'a@email.com', '<p>hello</p>', 1, '2025-07-05 06:59:51', '2025-07-05 07:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL DEFAULT '5',
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `customer_name`, `place`, `customer_message`, `rating`, `company`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ashley Jonathon', 'Toronto', 'I am extremely grateful to Ducatibox Visa Consultancy for making my dream true. The helped me process my visa for Canada. It has accepted in record time. Ducatibox are amazing so I Highly recommend them.', 5, NULL, 1, '2025-07-05 14:56:02', '2025-07-23 12:52:53'),
(3, 'Bob Garrison', 'Sydney', 'I am extremely grateful to Ducatibox Visa Consultancy for making my dream true. The helped me process my visa for Canada. It has accepted in record time. Ducatibox are amazing so I Highly recommend them.', 5, NULL, 1, '2025-07-23 13:09:33', '2025-07-23 13:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_banners`
--

CREATE TABLE `footer_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frequently_asked_questions`
--

CREATE TABLE `frequently_asked_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_service_category_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frequently_asked_questions`
--

INSERT INTO `frequently_asked_questions` (`id`, `question`, `answer`, `sub_service_category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Who are you?', 'I\'m John F Cannidy.', 1, 1, '2025-07-05 08:20:50', '2025-07-05 08:20:50'),
(2, 'Who are you?', 'i am F', 1, 1, '2025-07-05 08:21:30', '2025-07-05 08:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_middle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `working_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `company_name_start`, `company_name_middle`, `company_name_end`, `phone`, `contact_title`, `email`, `address`, `working_time`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `map_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', 'B', 'C', '01781619409', 'Contact Us', 'dubai@admin.com', 'Dubai, Abu Dhabi', '9am -9pm', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com', 1, '2025-06-30 03:36:07', '2025-06-30 12:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_data` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `name`, `email`, `phone`, `subject`, `message`, `read_data`, `created_at`, `updated_at`) VALUES
(2, 'ggg', 'admin@gmail.com', NULL, 'yyyyyyyy', 'hhhh', 1, '2025-07-28 19:52:57', '2025-07-28 20:46:11'),
(3, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 1, '2025-07-28 19:55:26', '2025-07-28 20:46:26'),
(4, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 1, '2025-07-28 19:56:07', '2025-07-28 20:49:00'),
(5, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:01:39', '2025-07-28 20:01:39'),
(6, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:02:18', '2025-07-28 20:02:18'),
(7, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:02:58', '2025-07-28 20:02:58'),
(8, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:03:29', '2025-07-28 20:03:29'),
(9, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'll', 0, '2025-07-28 20:04:05', '2025-07-28 20:04:05'),
(10, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:07:20', '2025-07-28 20:07:20'),
(11, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:08:07', '2025-07-28 20:08:07'),
(12, 'hello', 'admin@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 0, '2025-07-28 20:08:23', '2025-07-28 20:08:23'),
(13, 'hhhhhhhhhhhhhhhh', 'adminn@gmail.com', NULL, 'yyyyyyyy', 'bgbbbbbbbbb', 1, '2025-07-28 20:09:19', '2025-07-29 13:17:23'),
(14, 'FAhim', 'fa@gmail.com', NULL, 'Something', 'Som,ething something', 1, '2025-07-29 13:26:02', '2025-07-29 13:26:19'),
(15, 'Test', 'test@admin.com', NULL, 'yyyyyyyy', 'ggggg', 0, '2025-08-05 18:57:15', '2025-08-05 18:57:15'),
(16, 'gggg', 'ggg@gmail.com', NULL, 'gggg', 'gbnn n', 0, '2025-08-05 18:59:52', '2025-08-05 18:59:52'),
(17, 'good', 'good@gmail.com', NULL, 'gooo', 'goods', 0, '2025-08-05 19:02:23', '2025-08-05 19:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `main_banners`
--

CREATE TABLE `main_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_banners`
--

INSERT INTO `main_banners` (`id`, `short_title`, `long_title`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Anything', 'B', 1, '2025-07-02 20:24:40', '2025-07-29 13:21:27'),
(6, 'dubai car care', 'dubai car care dubai car care dubai car care', 1, '2025-07-06 13:12:16', '2025-07-06 13:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_06_24_195927_create_general_settings_table', 2),
(7, '2025_06_24_195929_create_main_banners_table', 3),
(8, '2025_06_24_195934_create_service_sections_table', 4),
(9, '2025_06_24_195931_create_service_categories_table', 5),
(10, '2025_06_24_195932_create_sub_service_categories_table', 6),
(11, '2025_06_24_195938_create_motivations_table', 7),
(12, '2025_06_24_195940_create_scrolling_headings_table', 8),
(13, '2025_06_24_195942_create_why_chooses_table', 9),
(14, '2025_06_24_200004_create_authors_table', 10),
(15, '2025_06_24_195955_create_blogs_table', 11),
(16, '2025_06_24_200006_create_comments_table', 12),
(17, '2025_06_24_195957_create_mails_table', 13),
(18, '2025_06_24_200010_create_frequently_ask_questions_table', 14),
(19, '2025_06_24_200011_create_workers_table', 15),
(20, '2025_06_24_200013_create_products_table', 16),
(21, '2025_06_24_200002_create_about_us_table', 17),
(22, '2025_06_24_195959_create_footer_banners_table', 18),
(23, '2025_06_24_195953_create_customer_reviews_table', 19),
(24, '2025_07_06_181840_create_profiles_table', 20),
(25, '2025_08_06_015413_create_pricing_packages_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `motivations`
--

CREATE TABLE `motivations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motivations`
--

INSERT INTO `motivations` (`id`, `title`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'We care for Your Car just Like You do', 'When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience with us is pleasant and efficient.', NULL, 1, '2025-07-04 13:10:32', '2025-07-04 13:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_images`
--

CREATE TABLE `multiple_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `sort_order` int DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `general_setting_id` bigint UNSIGNED DEFAULT NULL,
  `main_banner_id` bigint UNSIGNED DEFAULT NULL,
  `service_category_id` bigint UNSIGNED DEFAULT NULL,
  `sub_service_category_id` bigint UNSIGNED DEFAULT NULL,
  `service_section_id` bigint UNSIGNED DEFAULT NULL,
  `motivation_id` bigint UNSIGNED DEFAULT NULL,
  `scrolling_heading_id` bigint UNSIGNED DEFAULT NULL,
  `why_choose_id` bigint UNSIGNED DEFAULT NULL,
  `facility_id` bigint UNSIGNED DEFAULT NULL,
  `service_price_package_id` bigint UNSIGNED DEFAULT NULL,
  `blog_id` bigint UNSIGNED DEFAULT NULL,
  `footer_banner_id` bigint UNSIGNED DEFAULT NULL,
  `my_company_page_banner_id` bigint UNSIGNED DEFAULT NULL,
  `about_us_id` bigint UNSIGNED DEFAULT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `worker_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `customer_review_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `multiple_images`
--

INSERT INTO `multiple_images` (`id`, `image`, `type`, `purpose`, `sort_order`, `user_id`, `general_setting_id`, `main_banner_id`, `service_category_id`, `sub_service_category_id`, `service_section_id`, `motivation_id`, `scrolling_heading_id`, `why_choose_id`, `facility_id`, `service_price_package_id`, `blog_id`, `footer_banner_id`, `my_company_page_banner_id`, `about_us_id`, `author_id`, `worker_id`, `product_id`, `customer_review_id`, `created_at`, `updated_at`) VALUES
(5, 'images/general_settings/logo/1751307224-6862d3d8acb3e.svg', 'logo', 'general_setting', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-30 12:13:44', '2025-06-30 12:13:44'),
(6, 'images/general_settings/banner/1751307224-6862d3d8b0741.jpg', 'blog_header_banner', 'general_setting', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-30 12:13:44', '2025-06-30 12:13:44'),
(15, 'images/main_banner/banner_image/1751509480-6865e9e8c2d95.jpg', 'banner_image', 'general_setting', 0, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-02 20:24:40', '2025-07-02 20:24:40'),
(16, 'images/main_banner/animation_banner_image/1751509480-6865e9e8cba6a.png', 'animation_banner_image', 'general_setting', 0, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-02 20:24:40', '2025-07-02 20:24:40'),
(17, 'images/service_category/logo_first/1751611343-686777cf342d9.png', 'logo_first', 'logo_first', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 00:42:23', '2025-07-04 00:42:23'),
(19, 'images/service_category/logo_first/1751611774-6867797e3438b.png', 'logo_first', 'logo_first', 0, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 00:49:34', '2025-07-04 00:49:34'),
(20, 'images/sub_service_categories/logo/1751653359-68681bef83492.png', 'logo', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(21, 'images/sub_service_categories/banner/1751653360-68681bf01a53e.png', 'banner', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(22, 'images/sub_service_categories/quantity_logo/1751653360-68681bf01ccf0.png', 'quantity_logo', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(23, 'images/sub_service_categories/key_service_images/1751653360-68681bf01ea35.png', 'key_service_images', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(24, 'images/sub_service_categories/expected_result_images/1751653360-68681bf020ffe.png', 'expected_result_images', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(25, 'images/sub_service_categories/expected_result_images/1751653360-68681bf02373b.png', 'expected_result_images', 'sub_service_category', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:22:40', '2025-07-04 12:22:40'),
(26, 'images/motivation/images/1751656232-6868272884958.png', 'motivation_image', 'motivation', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 13:10:32', '2025-07-04 13:10:32'),
(29, 'images/why_choose/images/1751664372-686846f4ae439.jpg', 'why_choose_image', 'why_choose', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 15:26:12', '2025-07-04 15:26:12'),
(37, 'images/products/product_image/1751733731-686955e3a227a.jpg', 'product_image', 'product', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-05 10:42:11', '2025-07-05 10:42:11'),
(38, 'images/products/product_image/1751733731-686955e3a91fe.png', 'product_image', 'product', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-05 10:42:11', '2025-07-05 10:42:11'),
(41, 'images/customer_reviews/images/1751748738-6869908227f14.jpg', 'customer_image', 'customer_review', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-05 14:52:18', '2025-07-05 14:52:18'),
(43, 'images/main_banner/banner_image/1751829136-686aca903621d.jpg', 'banner_image', 'general_setting', 0, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-06 13:12:16', '2025-07-06 13:12:16'),
(44, 'images/main_banner/animation_banner_image/1751829136-686aca90c901e.png', 'animation_banner_image', 'general_setting', 0, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-06 13:12:16', '2025-07-06 13:12:16'),
(45, 'images/admin/profile/images/1752378495-68732c7f9a7b3.jpg', 'profile_image', 'admin_profile', 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-12 21:48:16', '2025-07-12 21:48:16'),
(46, 'images/customer_reviews/images/1753296773-68812f859ee8b.jpg', 'customer_image', 'customer_review', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025-07-23 12:52:53', '2025-07-23 12:52:53'),
(47, 'images/customer_reviews/images/1753297773-6881336d469b5.jpg', 'customer_image', 'customer_review', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2025-07-23 13:09:33', '2025-07-23 13:09:33'),
(48, 'images/blogs/blog_images/1753496890-68843d3a04642.png', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:10', '2025-07-25 20:28:10'),
(49, 'images/blogs/description_1_images/1753496890-68843d3af139d.jpg', 'blog_description_1_images', 'blog_description_1_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:10', '2025-07-25 20:28:10'),
(50, 'images/blogs/description_3_images/1753496891-68843d3b001ad.jpg', 'blog_description_3_images', 'blog_description_3_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:11', '2025-07-25 20:28:11'),
(51, 'images/blogs/description_3_images/1753496891-68843d3b032e8.jpg', 'blog_description_3_images', 'blog_description_3_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:11', '2025-07-25 20:28:11'),
(52, 'images/blogs/description_5_images/1753496891-68843d3b05522.jpg', 'blog_description_5_images', 'blog_description_5_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:11', '2025-07-25 20:28:11'),
(53, 'images/blogs/description_5_images/1753496891-68843d3b07869.jpg', 'blog_description_5_images', 'blog_description_5_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:28:11', '2025-07-25 20:28:11'),
(54, 'images/blogs/blog_images/1753498246-68844286e95ed.png', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:46', '2025-07-25 20:50:46'),
(55, 'images/blogs/description_1_images/1753498246-68844286f28c9.jpg', 'blog_description_1_images', 'blog_description_1_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:46', '2025-07-25 20:50:46'),
(56, 'images/blogs/description_3_images/1753498247-6884428700303.jpg', 'blog_description_3_images', 'blog_description_3_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(57, 'images/blogs/description_2_images/1753498247-6884428701db1.jpg', 'blog_description_2_images', 'blog_description_2_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(58, 'images/blogs/description_4_images/1753498247-68844287039af.jpg', 'blog_description_4_images', 'blog_description_4_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(59, 'images/blogs/description_5_images/1753498247-688442870620f.jpg', 'blog_description_5_images', 'blog_description_5_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(60, 'images/blogs/description_6_images/1753498247-6884428708513.jpg', 'blog_description_6_images', 'blog_description_6_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(61, 'images/blogs/description_7_images/1753498247-688442870a5cf.jpg', 'blog_description_7_images', 'blog_description_7_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 20:50:47', '2025-07-25 20:50:47'),
(62, 'images/blogs/blog_images/1753579021-68857e0dedba2.png', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 19:17:02', '2025-07-26 19:17:02'),
(63, 'images/blogs/description_1_images/1753579022-68857e0e797a5.jpg', 'blog_description_1_images', 'blog_description_1_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 19:17:02', '2025-07-26 19:17:02'),
(64, 'images/blogs/description_3_images/1753579022-68857e0e7b0bc.jpg', 'blog_description_3_images', 'blog_description_3_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 19:17:02', '2025-07-26 19:17:02'),
(65, 'images/blogs/description_2_images/1753579022-68857e0e7c5e9.jpg', 'blog_description_2_images', 'blog_description_2_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 19:17:02', '2025-07-26 19:17:02'),
(66, 'images/blogs/description_5_images/1753579022-68857e0e7f205.jpg', 'blog_description_5_images', 'blog_description_5_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 19:17:02', '2025-07-26 19:17:02'),
(67, 'images/blogs/blog_images/1753583809-688590c1b3ae2.jpg', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 20:36:49', '2025-07-26 20:36:49'),
(68, 'images/blogs/blog_images/1753583836-688590dc088c6.jpg', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 20:37:16', '2025-07-26 20:37:16'),
(69, 'images/blogs/blog_images/1753583855-688590efb84f3.jpg', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 20:37:35', '2025-07-26 20:37:35'),
(70, 'images/blogs/blog_images/1753583873-688591013e955.jpg', 'blog_images', 'blog_images', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-26 20:37:53', '2025-07-26 20:37:53'),
(71, 'images/about_us/image/1753634695-688657873cef2.jpg', 'about_us_image', 'about_us', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2025-07-27 10:44:55', '2025-07-27 10:44:55'),
(72, 'images/workers/photo/1753671101-6886e5bd1d2bc.jpg', 'photo', 'worker_profile', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2025-07-27 20:51:41', '2025-07-27 20:51:41'),
(73, 'images/workers/photo/1753671153-6886e5f1f3655.jpg', 'photo', 'worker_profile', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2025-07-27 20:52:34', '2025-07-27 20:52:34'),
(74, 'images/workers/photo/1753671190-6886e616ac7c1.jpg', 'photo', 'worker_profile', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, '2025-07-27 20:53:10', '2025-07-27 20:53:10'),
(75, 'images/workers/photo/1753671227-6886e63b866a6.jpg', 'photo', 'worker_profile', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, '2025-07-27 20:53:47', '2025-07-27 20:53:47'),
(76, 'images/workers/photo/1753671258-6886e65a5062a.jpg', 'photo', 'worker_profile', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-07-27 20:54:18', '2025-07-27 20:54:18');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing_packages`
--

CREATE TABLE `pricing_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_price` decimal(8,2) NOT NULL,
  `yearly_price` decimal(8,2) NOT NULL,
  `features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `tag_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_packages`
--

INSERT INTO `pricing_packages` (`id`, `name`, `subtitle`, `monthly_price`, `yearly_price`, `features`, `is_popular`, `tag_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Detailing BASIC', 'Basic Car Detailing Package', '250.00', '2700.00', '[\"Ceramic Coating\",\"Color Changing Indoor Light\",\"Heavy Duty Bumper\",\"Tinting & Polish\",\"Water Proofing\",\"hhhh\"]', 1, 'Most Popular', 1, '2025-08-05 20:57:52', '2025-08-05 20:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qqqqqqqqq', '200.00', 'mmmmmmmm', 1, '2025-07-05 10:42:11', '2025-07-05 10:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `profession`, `image`, `phone`, `bio`, `created_at`, `updated_at`) VALUES
(1, 2, 'Manager', NULL, '01781619403', 'text', '2025-07-12 21:01:51', '2025-07-12 21:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `scrolling_headings`
--

CREATE TABLE `scrolling_headings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scrolling_headings`
--

INSERT INTO `scrolling_headings` (`id`, `name`, `color`, `background`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Installation', 'White', 'red', 1, '2025-07-04 14:37:33', '2025-07-04 14:37:33'),
(2, 'Aaaaa', 'red', 'yellow', 1, '2025-07-04 14:59:03', '2025-07-04 14:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `service_name`, `short_title`, `long_title`, `description`, `quantity`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Car Repairs', 'Take advantage of our spacious gym equipped with a wide range of gym fitness machines so you can achieve the maximum benefits from', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-04 00:42:23', '2025-07-27 11:33:11'),
(3, 'Body & Exterior Services', 'General services are window, light, tyre,  denting and painting repair', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-04 00:49:34', '2025-07-04 00:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_middle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `title`, `title_start`, `title_middle`, `title_end`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Providing All Types of', 'Car', 'Maintenance', 'Services', NULL, 1, '2025-07-03 23:56:05', '2025-07-19 20:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_service_categories`
--

CREATE TABLE `sub_service_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `service_category_id` bigint UNSIGNED NOT NULL,
  `sub_service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_long_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci,
  `service_introduction_description` text COLLATE utf8mb4_unicode_ci,
  `key_services_list` text COLLATE utf8mb4_unicode_ci,
  `key_service_description` text COLLATE utf8mb4_unicode_ci,
  `features_and_benefit_list` text COLLATE utf8mb4_unicode_ci,
  `features_and_benefit_description` text COLLATE utf8mb4_unicode_ci,
  `how_do_we_work_list` text COLLATE utf8mb4_unicode_ci,
  `how_do_we_work_description` text COLLATE utf8mb4_unicode_ci,
  `expected_result_list` text COLLATE utf8mb4_unicode_ci,
  `expected_result_description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int DEFAULT NULL,
  `svg_icon` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_service_categories`
--

INSERT INTO `sub_service_categories` (`id`, `service_category_id`, `sub_service_name`, `banner_short_title`, `banner_long_title`, `banner_description`, `service_introduction_description`, `key_services_list`, `key_service_description`, `features_and_benefit_list`, `features_and_benefit_description`, `how_do_we_work_list`, `how_do_we_work_description`, `expected_result_list`, `expected_result_description`, `quantity`, `svg_icon`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'AC Repair & Gas Fillinggg', 'Professional Car AC Repair & Maintenance for Every Vehicle', 'Reliable Car AC Repair in Al Mankhool, Dubai – Stay Cool on the Road!', 'Does the air conditioning in your car not cool the way it should? Choose Car AC Repair Al Mankhool – Dubai for your vehicle service. You’ll receive high-quality diagnostics, repairs, and maintenance. This way, your car’s AC stays in top shape. We use top-quality tools and skilled professionals to fix your car’s cooling system. We do this quickly and ensure you’re satisfied—all at a fair price. Against the heat, you will feel quite comfortable even if the temperature is extremely high!', '<p>Car AC Repair Al Mankhool &ndash; Dubai specializes in complete air conditioning repair and maintenance. We ensure a steady and smooth driving experience. Whether it is only a small gas refill or the system needs to be completely rebuilt, we will be there to provide the necessary high-quality work.</p>', 'Our Key Car AC Repair Services:', '<ul>\r\n	<li>AC Gas Refilling &amp; Leak Detection</li>\r\n	<li>AC Compressor Repair &amp; Replacement</li>\r\n	<li>AC Condenser &amp; Evaporator Repair</li>\r\n	<li>AC Blower &amp; Fan Repair</li>\r\n	<li>Climate Control System Diagnostics</li>\r\n	<li>Cabin Air Filter Replacement</li>\r\n	<li>Refrigerant &amp; Cooling System Inspection</li>\r\n	<li>Electrical Fault Diagnosis &amp; Repair</li>\r\n</ul>\r\n\r\n<p>By our highly skilled technicians, you will have the peace of mind that your car&rsquo;s AC system is performing at its best, regardless of the outside heat!</p>', 'Features & Benefits of Our Car AC Repair Service', '<ul>\r\n	<li>Enhanced Cooling Performance: Get your car all chilled up more than usual with a breeze of cool air on the scorching day in Dubai.</li>\r\n	<li>AC Repair Efficiency: A well-maintained AC improves fuel use and boosts car performance.</li>\r\n	<li>Regular servicing extends system life cycles. It helps catch minor and major breakdowns, saving costs.</li>\r\n	<li>Increased Indoor Air Quality: The air in the room would be clean all the time if the AC system is not causing any problems or spreading dust or bacteria.</li>\r\n	<li>Environment: We only use environmentally-friendly refrigerants for our AC services.</li>\r\n	<li>Cost Repairs and Maintenance: Get the right maintenance and pay less for the services you need. We aim to keep your comfort high during extreme temperatures.</li>\r\n</ul>\r\n\r\n<p>That is why we provide the most advanced and tailored repair services for Dubai&rsquo;s weather-like no other company on the market!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'How do we work?', '<p><strong>Step 1</strong><br />\r\nAC System DiagnosisOur skilled engineers conduct a thorough AC check-up. The inspection will check for potential pollutants, discharge issues, and electrical problems. This includes looking for broken or loose compressor parts.</p>\r\n\r\n<p><strong>Step 2</strong><br />\r\nProblem Detection and Repair After diagnostics, our tech team fixes or replaces damaged parts.<br />\r\nWhile doing the repairs, they will also recharge the refrigerant and make sure the system works to the best of its potential.</p>\r\n\r\n<p><strong>Step 3</strong><br />\r\nSystem Testing and Quality Check When we return your car, our technicians will test it thoroughly. This ensures everything is working properly.</p>', 'Expected Results After Our Service:', '<ul>\r\n	<li>Getting the coolest air even during hot summer days.</li>\r\n	<li>No strange sounds or smells such as bad ones coming from the AC.</li>\r\n	<li>We are reducing the system obstruction by cleaning, which means that both the airflow as well as the power will be improved.</li>\r\n	<li>As the car is operating at its optimum, fuel consumption is down. Why Choose Us for Car AC Repair in Al Mankhool?</li>\r\n	<li>Certified &amp; Experienced Technicians: Our experts know the latest car AC repair techniques.</li>\r\n	<li>Advanced Diagnostic Tools: Our modern equipment lets us diagnose and fix any AC issue.</li>\r\n	<li>Affordable Pricing: Pay less for the same high-quality service you can get from others.</li>\r\n	<li>Fast &amp; Efficient Service: We can complete most repairs within one day.</li>\r\n	<li>100% Customer Satisfaction: Your comfort and vehicle performance are our utmost concern.</li>\r\n	<li>Genuine Spare Parts: Our experts only use high-quality, genuine parts that are approved by the manufacturer.</li>\r\n</ul>', 5, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"68\" height=\"69\" viewBox=\"0 0 68 69\" fill=\"none\">\r\n                                                <rect width=\"68\" height=\"68\" transform=\"translate(0 0.5)\" fill=\"white\" fill-opacity=\"0.2\"/>\r\n                                                <path d=\"M34.5 8C20.478 8 9 19.4815 9 33.5C9 47.522 20.4815 59 34.5 59C48.522 59 60 47.5185 60 33.5C60 19.478 48.5185 8 34.5 8ZM47.0212 52.1989L45.5057 49.5745L42.9182 51.0686L44.4353 53.697C41.8594 54.9689 39.0069 55.7627 35.9941 55.9607V52.9238H33.0059V55.9607C29.9931 55.7623 27.1406 54.9689 24.5647 53.697L26.0818 51.0686L23.4943 49.5745L21.9788 52.1989C19.5407 50.5612 17.4388 48.4593 15.8011 46.0212L18.4255 44.5057L16.9314 41.9178L14.303 43.4353C13.0311 40.8594 12.2377 38.0069 12.0393 34.9941H15.0762V32.0059H12.0393C12.2377 28.9931 13.0311 26.1406 14.303 23.5647L16.9314 25.0818L18.4255 22.4939L15.8011 20.9788C17.4388 18.5403 19.5407 16.4388 21.9788 14.8007L23.4943 17.4255L26.0818 15.9314L24.5647 13.303C27.1406 12.0311 29.9931 11.2377 33.0059 11.0393V14.0762H35.9941V11.0393C39.0069 11.2377 41.8594 12.0311 44.4353 13.3034L42.9182 15.9314L45.5057 17.4255L47.0212 14.8011C49.4593 16.4388 51.5612 18.5407 53.1989 20.9788L50.5745 22.4943L52.0686 25.0822L54.697 23.5647C55.9689 26.1406 56.7627 28.9931 56.9607 32.0059H53.9238V34.9743H56.9607C56.7623 37.9871 55.9689 40.8594 54.697 43.4353L52.0686 41.9182L50.5745 44.5061L53.1989 46.0212C51.5612 48.4593 49.4593 50.5612 47.0212 52.1989Z\" fill=\"white\"/>\r\n                                                <path d=\"M34.5 17C25.402 17 18 24.1777 18 33C18 41.8223 25.402 49 34.5 49C43.598 49 51 41.8223 51 33C51 24.1777 43.598 17 34.5 17ZM48 33C48 33.817 47.9219 34.6167 47.7734 35.3924L44.966 33.8208C44.9887 33.5477 45 33.2739 45 33C45 32.7261 44.9887 32.4523 44.966 32.1792L47.7734 30.6076C47.9219 31.3833 48 32.183 48 33ZM39 20.658C40.577 21.2 42.0195 22.0186 43.2664 23.0534L40.4637 24.6227C39.9984 24.3102 39.5098 24.0356 39 23.8008V20.658ZM30 20.658V23.8008C29.4902 24.0356 29.0016 24.3102 28.5363 24.6227L25.7336 23.0534C26.9805 22.0186 28.423 21.2 30 20.658ZM24.034 33.8208L21.2266 35.3924C21.0781 34.6167 21 33.817 21 33C21 32.183 21.0781 31.3833 21.2266 30.6076L24.034 32.1792C23.9887 32.7261 23.9887 33.2739 24.034 33.8208ZM30 45.342C28.423 44.8 26.9805 43.9814 25.7336 42.9466L28.5363 41.3773C29.0016 41.6898 29.4902 41.9644 30 42.1992V45.342ZM33 46.0095V40.2011C30.643 39.3909 30.541 39.2822 28.8242 37.8572L23.6359 40.7617C23.0434 39.9841 22.5375 39.1402 22.132 38.2447L27.3188 35.3409C26.8543 32.9117 26.9164 32.7636 27.3188 30.6591L22.132 27.7553C22.5375 26.8598 23.0434 26.0163 23.6359 25.2383L28.8242 28.1428C30.7484 26.5458 30.898 26.5216 33 25.7989V19.9905C33.4926 19.9375 33.993 19.9091 34.5 19.9091C35.007 19.9091 35.5074 19.9375 36 19.9905V25.7989C38.3922 26.6212 38.4895 26.7432 40.1758 28.1428L45.3641 25.2383C45.9566 26.0163 46.4625 26.8598 46.868 27.7553L41.6812 30.6591C42.1457 33.0883 42.0836 33.2364 41.6812 35.3409L46.868 38.2447C46.4625 39.1402 45.9566 39.9837 45.3641 40.7617L40.1758 37.8572C38.2516 39.4542 38.102 39.4788 36 40.2011V46.0095C35.5074 46.0629 35.007 46.0909 34.5 46.0909C33.993 46.0909 33.4926 46.0629 33 46.0095ZM43.2664 42.9466C42.0195 43.9814 40.577 44.8 39 45.342V42.1992C39.5098 41.9644 39.9984 41.6898 40.4637 41.3773L43.2664 42.9466Z\" fill=\"white\"/>\r\n                                                <path d=\"M39 33C39 30.7944 36.9813 29 34.5 29C32.0187 29 30 30.7944 30 33C30 35.2056 32.0187 37 34.5 37C36.9813 37 39 35.2056 39 33ZM33 33C33 32.2649 33.673 31.6667 34.5 31.6667C35.327 31.6667 36 32.2649 36 33C36 33.7351 35.327 34.3333 34.5 34.3333C33.673 34.3333 33 33.7351 33 33Z\" fill=\"white\"/>\r\n                                            </svg>', NULL, NULL, NULL, 1, '2025-07-04 12:22:39', '2025-07-19 21:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'First Test', 'test@admin.com', NULL, '$2y$10$usaVRcmia2mblkTQPrM21OSgi/jv77fFvHU3By5EK7j9z42otN04G', NULL, NULL, '2025-06-24 12:40:18', '2025-06-24 12:40:18'),
(2, 'Fahim Nur', 'admin@admin.com', NULL, '$2y$10$U691mUmxmwKymmgnkhIk3eqYBWuf3byZ/FzrCxyW//cy9hXNRccRS', 'admin', 'CHZUCg5Q1HVGNytmsxnrKhWU2R51Hca1LT6KPyiX5ENYDUxkLwvxl0haFGRy', '2025-07-05 15:18:16', '2025-07-12 21:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `why_chooses`
--

CREATE TABLE `why_chooses` (
  `id` bigint UNSIGNED NOT NULL,
  `title_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_chooses`
--

INSERT INTO `why_chooses` (`id`, `title_start`, `title_end`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Why Choose Ducatiiiiiiiiii', 'box', 'https://www.youtube.com/watch?v=SF4aHwxHtZ0', 1, '2025-07-04 15:26:12', '2025-07-21 12:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `email`, `phone`, `designation`, `facebook`, `instagram`, `twitter`, `linkedin`, `bio`, `status`, `created_at`, `updated_at`) VALUES
(1, 'David Brandon', 'a@email.com', '01781619410', 'Chief Mechanic', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'helloooooo', 1, '2025-07-05 08:47:30', '2025-07-27 20:54:18'),
(3, 'Sarah Smith', NULL, NULL, 'Chief Mechanic', NULL, NULL, NULL, NULL, NULL, 1, '2025-07-27 20:51:41', '2025-07-27 20:51:41'),
(4, 'Helen Mirren', NULL, NULL, 'Consultant', NULL, NULL, NULL, NULL, NULL, 1, '2025-07-27 20:52:33', '2025-07-27 20:52:33'),
(5, 'Hazel Grace', NULL, NULL, 'Consultant', NULL, NULL, NULL, NULL, NULL, 1, '2025-07-27 20:53:10', '2025-07-27 20:53:10'),
(6, 'Jackson Miller', NULL, NULL, 'Assistant', NULL, NULL, NULL, NULL, NULL, 1, '2025-07-27 20:53:47', '2025-07-27 20:53:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_author_id_foreign` (`author_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_banners`
--
ALTER TABLE `footer_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequently_asked_questions`
--
ALTER TABLE `frequently_asked_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frequently_asked_questions_sub_service_category_id_foreign` (`sub_service_category_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_banners`
--
ALTER TABLE `main_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motivations`
--
ALTER TABLE `motivations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_images`
--
ALTER TABLE `multiple_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pricing_packages`
--
ALTER TABLE `pricing_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `scrolling_headings`
--
ALTER TABLE `scrolling_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_service_categories`
--
ALTER TABLE `sub_service_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_service_categories_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_chooses`
--
ALTER TABLE `why_chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_banners`
--
ALTER TABLE `footer_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frequently_asked_questions`
--
ALTER TABLE `frequently_asked_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `main_banners`
--
ALTER TABLE `main_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `motivations`
--
ALTER TABLE `motivations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `multiple_images`
--
ALTER TABLE `multiple_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing_packages`
--
ALTER TABLE `pricing_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scrolling_headings`
--
ALTER TABLE `scrolling_headings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_service_categories`
--
ALTER TABLE `sub_service_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_chooses`
--
ALTER TABLE `why_chooses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `frequently_asked_questions`
--
ALTER TABLE `frequently_asked_questions`
  ADD CONSTRAINT `frequently_asked_questions_sub_service_category_id_foreign` FOREIGN KEY (`sub_service_category_id`) REFERENCES `sub_service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_service_categories`
--
ALTER TABLE `sub_service_categories`
  ADD CONSTRAINT `sub_service_categories_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
