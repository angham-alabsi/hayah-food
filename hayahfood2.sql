-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 06:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayahfood2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_name_en` varchar(100) NOT NULL,
  `brand_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_name_en`, `brand_status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'بسمة', 'Basma', 'متوفر', '2020-03-23 06:11:45', '2020-04-11 06:02:09', 4),
(2, 'البستان', 'Albustan', 'متوفر', '2020-03-23 06:14:00', '2020-03-23 06:14:00', 4),
(3, 'اجواد', 'Ajwad', 'متوفر', '2020-03-23 06:14:40', '2020-03-23 06:14:40', 4),
(4, 'الاسكا', 'Alaska', 'متوفر', '2020-03-23 06:16:03', '2020-03-23 06:16:03', 4),
(5, 'السهول', 'Alsuhoul', 'متوفر', '2020-03-23 06:16:49', '2020-03-23 06:16:49', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `cate_name_en` varchar(100) NOT NULL,
  `cate_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `cate_description` text NOT NULL,
  `cate_description_en` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_name_en`, `cate_status`, `created_at`, `updated_at`, `cate_description`, `cate_description_en`, `user_id`) VALUES
(1, 'تونة', 'Tuna', 'متوفر', '2020-04-12 03:27:51', '2024-04-29 04:56:09', 'hjhkjkhkhkhmn', 'jkhjkhjkhjkhjkh', 26),
(2, 'زيوت', 'Oil', 'متوفر', '2024-04-29 05:11:43', '2024-04-29 05:11:43', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(3, 'بقوليات', 'bean', 'متوفر', '2024-04-29 05:14:45', '2024-04-29 05:14:45', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(4, 'دقيق', 'flour', 'متوفر', '2024-04-29 05:16:04', '2024-04-29 05:16:04', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(5, 'أجبان', 'Cheeses', 'متوفر', '2024-04-29 05:17:58', '2024-04-29 05:17:58', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(6, 'حليب', 'Milk', 'متوفر', '2024-04-29 05:18:58', '2024-04-29 05:18:58', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(7, 'عسل', 'honey', 'متوفر', '2024-04-29 05:22:09', '2024-04-29 05:22:09', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(8, 'فواكهة معلبة', 'Canned fruits', 'متوفر', '2024-04-29 05:27:40', '2024-04-29 05:27:40', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(9, 'جام', 'Jam', 'متوفر', '2024-04-29 05:28:52', '2024-04-29 05:28:52', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(10, 'شاي', 'Tea', 'متوفر', '2024-04-29 05:29:39', '2024-04-29 05:29:39', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(11, 'رز', 'Rice', 'متوفر', '2024-04-29 05:30:07', '2024-04-29 05:30:07', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(12, 'مكرونة', 'Pasta', 'متوفر', '2024-04-29 05:31:36', '2024-04-29 05:31:36', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(13, 'صلصة', 'Sauce', 'متوفر', '2024-04-29 05:33:58', '2024-04-29 05:33:58', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gal_id` int(11) NOT NULL,
  `gal_exten` varchar(50) NOT NULL,
  `gal_reference` int(11) NOT NULL,
  `gal_reference_id` int(11) NOT NULL,
  `gal_name` varchar(100) NOT NULL,
  `gal_size` int(11) NOT NULL,
  `gal_status` varchar(50) NOT NULL,
  `gal_type` varchar(50) NOT NULL,
  `gal_path` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hf_info`
--

CREATE TABLE `hf_info` (
  `info_id` int(11) NOT NULL,
  `user_count` int(11) DEFAULT NULL,
  `cate_count` int(11) DEFAULT NULL,
  `brand_count` int(11) DEFAULT NULL,
  `product_count` int(11) DEFAULT NULL,
  `db_size` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hf_info`
--

INSERT INTO `hf_info` (`info_id`, `user_count`, `cate_count`, `brand_count`, `product_count`, `db_size`) VALUES
(1, 3, 13, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(100) NOT NULL,
  `lang_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_status`) VALUES
(1, 'Arabic', 'active'),
(2, 'English', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `media_brands`
--

CREATE TABLE `media_brands` (
  `media_id` int(11) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_path` varchar(100) NOT NULL,
  `media_status` varchar(50) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_exten` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_brands`
--

INSERT INTO `media_brands` (`media_id`, `media_name`, `media_path`, `media_status`, `media_size`, `media_exten`, `created_at`, `updated_at`, `brand_id`, `type_id`, `user_id`) VALUES
(1, 'brandLogo1.png', 'storage/img/brandLogo1.png', 'متوفر', 75000, 'png', '2020-04-11 09:04:23', '2020-04-11 09:04:23', 1, 1, 4),
(2, 'brandLogo5.png', 'storage/img/brandLogo5.png', 'متوفر', 92355, 'png', '2020-03-23 09:14:00', '2020-03-23 09:14:00', 2, 1, 4),
(3, 'brandLogo2.png', 'storage/img/brandLogo2.png', 'متوفر', 86161, 'png', '2020-03-23 09:14:40', '2020-03-23 09:14:40', 3, 1, 4),
(4, 'brandLogo4.png', 'storage/img/brandLogo4.png', 'متوفر', 63158, 'png', '2020-03-23 09:16:03', '2020-03-23 09:16:03', 4, 1, 4),
(5, 'brandLogo3.png', 'storage/img/brandLogo3.png', 'متوفر', 73073, 'png', '2020-03-23 09:16:49', '2020-03-23 09:16:49', 5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

CREATE TABLE `media_categories` (
  `media_id` int(11) NOT NULL,
  `media_path` varchar(200) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_status` varchar(50) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_exten` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `cate_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_categories`
--

INSERT INTO `media_categories` (`media_id`, `media_path`, `media_name`, `media_status`, `media_size`, `media_exten`, `created_at`, `updated_at`, `cate_id`, `type_id`, `user_id`) VALUES
(2, 'storage/img/product_tuna.jpg', 'product_tuna.jpg', 'متوفر', 31487, 'jpeg', '2020-03-23 07:22:49', '2020-03-23 07:22:49', 1, 1, 4),
(27, 'storage/img/honey_bg.jpg', 'honey_bg.jpg', 'متوفر', 27657, 'jpeg', '2020-03-25 10:47:24', '2020-03-25 10:47:24', 7, 4, 4),
(28, 'storage/img/rice_bg.jpg', 'rice_bg.jpg', 'متوفر', 34796, 'jpeg', '2020-03-25 10:53:54', '2020-04-01 10:53:54', 11, 4, 4),
(29, 'storage/img/flour_bg.jpg', 'flour_bg.jpg', 'متوفر', 24385, 'jpeg', '2020-03-25 10:54:45', '2020-04-01 10:54:45', 4, 4, 4),
(30, 'storage/img/cheese1_bg.jpg', 'cheese1_bg.jpg', 'غير متوفر', 15595, 'jpeg', '2020-03-25 10:55:32', '2020-03-25 10:55:32', 12, 4, 4),
(31, 'storage/img/oil_bg.jpg', 'oil_bg.jpg', 'متوفر', 35464, 'jpeg', '2020-03-25 10:56:51', '2020-03-25 10:56:51', 2, 4, 4),
(33, 'storage/img/ketchup_bg.jpg', 'ketchup_bg.jpg', 'غير متوفر', 25121, 'jpeg', '2020-03-25 11:11:43', '2020-03-25 11:11:43', 16, 4, 4),
(34, 'storage/img/home_slide3.jpg', 'home_slide3.jpg', 'متوفر', 62827, 'jpeg', '2020-03-26 04:49:30', '2020-03-26 04:49:30', 7, 3, 4),
(35, 'storage/img/home_slide2.jpg', 'home_slide2.jpg', 'متوفر', 60617, 'jpeg', '2020-03-26 04:52:13', '2020-03-26 04:52:13', 13, 3, 4),
(36, 'storage/img/home_slide4.jpg', 'home_slide4.jpg', 'متوفر', 73673, 'jpeg', '2020-03-26 04:55:35', '2020-03-26 04:55:35', 10, 3, 4),
(37, 'storage/img/cheese2_bg.jpg', 'cheese2_bg.jpg', 'متوفر', 21366, 'jpeg', '2020-03-26 08:56:48', '2020-03-26 08:56:48', 5, 4, 4),
(38, 'storage/img/media1.jpg', 'media1.jpg', 'متوفر', 59371, 'jpeg', '2020-04-02 08:10:09', '2020-04-02 08:10:09', 3, 2, 4),
(39, 'storage/img/product_oil.jpg', 'product_oil.jpg', 'متوفر', 29802, 'jpg', '2024-04-29 08:11:44', '2024-04-29 08:11:44', 2, 1, 4),
(40, 'storage/img/product_cannes.jpg', 'product_cannes.jpg', 'متوفر', 33192, 'jpg', '2024-04-29 08:14:45', '2024-04-29 08:14:45', 3, 1, 4),
(41, 'storage/img/product_flour.jpg', 'product_flour.jpg', 'متوفر', 29792, 'jpg', '2024-04-29 08:16:05', '2024-04-29 08:16:05', 4, 1, 4),
(42, 'storage/img/product_cheese.jpg', 'product_cheese.jpg', 'متوفر', 26558, 'jpg', '2024-04-29 08:17:58', '2024-04-29 08:17:58', 5, 1, 4),
(43, 'storage/img/product_milk.jpg', 'product_milk.jpg', 'متوفر', 28715, 'jpg', '2024-04-29 08:18:59', '2024-04-29 08:18:59', 6, 1, 4),
(44, 'storage/img/product_honey.jpg', 'product_honey.jpg', 'متوفر', 26515, 'jpg', '2024-04-29 08:22:09', '2024-04-29 08:22:09', 7, 1, 4),
(45, 'storage/img/product_fruit.jpg', 'product_fruit.jpg', 'متوفر', 28440, 'jpg', '2024-04-29 08:27:40', '2024-04-29 08:27:40', 8, 1, 4),
(46, 'storage/img/product_jam.jpg', 'product_jam.jpg', 'متوفر', 21012, 'jpg', '2024-04-29 08:28:52', '2024-04-29 08:28:52', 9, 1, 4),
(47, 'storage/img/product_tea.jpg', 'product_tea.jpg', 'متوفر', 30166, 'jpg', '2024-04-29 08:29:39', '2024-04-29 08:29:39', 10, 1, 4),
(48, 'storage/img/product_rice.jpg', 'product_rice.jpg', 'متوفر', 24794, 'jpg', '2024-04-29 08:30:08', '2024-04-29 08:30:08', 11, 1, 4),
(49, 'storage/img/product_pasta.jpg', 'product_pasta.jpg', 'متوفر', 71037, 'jpg', '2024-04-29 08:31:36', '2024-04-29 08:31:36', 12, 1, 4),
(50, 'storage/img/product_tomato.jpg', 'product_tomato.jpg', 'متوفر', 30933, 'jpg', '2024-04-29 08:33:58', '2024-04-29 08:33:58', 13, 1, 4),
(51, 'storage/img/can_bg.jpg', 'can_bg.jpg', 'متوفر', 24280, 'jpg', '2024-04-30 11:27:07', '2024-04-30 11:27:07', 3, 4, 4),
(52, 'storage/img/honey1.jpg', 'honey1.jpg', 'متوفر', 531553, 'jpg', '2024-04-30 11:28:02', '2024-04-30 11:28:02', 7, 4, 4),
(53, 'storage/img/jam_bg.jpg', 'jam_bg.jpg', 'متوفر', 49261, 'jpg', '2024-04-30 11:32:10', '2024-04-30 11:32:10', 9, 4, 4),
(54, 'storage/img/pasta_bg.jpg', 'pasta_bg.jpg', 'متوفر', 34075, 'jpg', '2024-04-30 11:33:36', '2024-04-30 11:33:36', 12, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `media_products`
--

CREATE TABLE `media_products` (
  `media_id` int(11) NOT NULL,
  `media_path` varchar(200) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_status` varchar(50) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_exten` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_products`
--

INSERT INTO `media_products` (`media_id`, `media_path`, `media_name`, `media_status`, `media_size`, `media_exten`, `created_at`, `updated_at`, `pro_id`, `type_id`, `user_id`) VALUES
(2, 'storage/img/oil2.png', 'oil2.png', 'متوفر', 168292, 'png', '2024-04-29 08:41:58', '2024-04-29 08:41:58', 6, 1, 4),
(3, 'storage/img/oil1.png', 'oil1.png', 'متوفر', 150573, 'png', '2024-04-30 14:52:25', '2024-04-30 14:52:25', 7, 1, 4),
(4, 'storage/img/oil5.png', 'oil5.png', 'متوفر', 165766, 'png', '2024-04-30 14:53:38', '2024-04-30 14:53:38', 8, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `media_types`
--

CREATE TABLE `media_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_types`
--

INSERT INTO `media_types` (`type_id`, `type_name`, `type_status`) VALUES
(1, 'اساسية', 'متوفر'),
(2, 'اعلان', 'متوفر'),
(3, 'سلايد', 'متوفر'),
(4, 'ايحائية', 'متوفر');

-- --------------------------------------------------------

--
-- Table structure for table `media_user`
--

CREATE TABLE `media_user` (
  `media_id` int(11) NOT NULL,
  `media_path` varchar(200) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_status` varchar(50) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_user`
--

INSERT INTO `media_user` (`media_id`, `media_path`, `media_name`, `media_status`, `media_size`, `media_type`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'storage/img/ppp.png', 'ppp1.png', 'متوفر', 75000, 'png', '2020-04-11 09:50:01', '2020-04-11 09:47:09', 4);

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
(1, '2020_03_02_072803_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_name_en` varchar(100) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_description_en` text NOT NULL,
  `pro_status` varchar(50) NOT NULL,
  `pro_unit` varchar(50) NOT NULL,
  `pro_weight` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_name_en`, `pro_description`, `pro_description_en`, `pro_status`, `pro_unit`, `pro_weight`, `created_at`, `updated_at`, `user_id`, `cate_id`, `brand_id`) VALUES
(6, 'زيت بسمة', 'Basma oil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'متوفر', 'لتر', 250, '2024-04-29 05:41:58', '2024-04-29 05:41:58', 4, 2, 1),
(7, 'زيت بسمة أ', 'A Basma oil', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'متوفر', 'لتر', 1, '2024-04-30 11:52:25', '2024-04-30 11:54:04', 4, 2, 1),
(8, 'زيت بسمة ب', 'Basma oil B', 'لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'متوفر', 'لتر', 5, '2024-04-30 11:53:38', '2024-04-30 11:53:38', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receivedemails`
--

CREATE TABLE `receivedemails` (
  `email_id` int(11) NOT NULL,
  `email_sender` varchar(200) NOT NULL,
  `email_receiver` varchar(200) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_msg` text NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `email_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivedemails`
--

INSERT INTO `receivedemails` (`email_id`, `email_sender`, `email_receiver`, `email_subject`, `email_msg`, `email_status`, `email_type`, `created_at`, `updated_at`) VALUES
(1, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'زةةةةةةةةةةةةةةةةةةةة', 'متوفر', 'استقبال', '2020-04-02 13:41:33', '2020-04-02 13:41:33'),
(2, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'زةةةةةةةةةةةةةةةةةةةة', 'غير متوفر', 'استقبال', '2020-04-02 13:42:45', '2020-04-02 13:42:45'),
(3, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'زةةةةةةةةةةةةةةةةةةةة', 'متوفر', 'استقبال', '2020-04-02 13:43:32', '2020-04-02 13:43:32'),
(4, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'متوفر', 'استقبال', '2020-04-04 05:16:59', '2020-04-04 05:16:59'),
(5, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'متوفر', 'استقبال', '2020-04-04 05:23:50', '2020-04-04 05:23:50'),
(6, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'متوفر', 'استقبال', '2020-04-04 05:24:55', '2020-04-04 05:24:55'),
(7, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'متوفر', 'استقبال', '2020-04-04 05:25:54', '2020-04-04 05:25:54'),
(8, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:44:07', '2020-04-04 10:44:07'),
(9, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:45:00', '2020-04-04 10:45:00'),
(10, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:46:31', '2020-04-04 10:46:31'),
(11, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:47:30', '2020-04-04 10:47:30'),
(12, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:50:09', '2020-04-04 10:50:09'),
(13, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'kljklhlhjlhjl', 'متوفر', 'استقبال', '2020-04-04 10:55:47', '2020-04-04 10:55:47'),
(14, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', '.knkklnlk', 'متوفر', 'استقبال', '2020-04-04 10:56:52', '2020-04-04 10:56:52'),
(15, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', '.knkklnlk', 'متوفر', 'استقبال', '2020-04-04 11:00:22', '2020-04-04 11:00:22'),
(16, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', ';lk;ojkjlhjbghvjgchvhbjnkml,', 'متوفر', 'استقبال', '2020-04-04 11:04:04', '2020-04-04 11:04:04'),
(17, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', ';lk;ojkjlhjbghvjgchvhbjnkml,', 'متوفر', 'استقبال', '2020-04-04 11:05:19', '2020-04-04 11:05:19'),
(18, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'klhljghfghcgvhkbjnklml', 'متوفر', 'استقبال', '2020-04-04 11:06:37', '2020-04-04 11:06:37'),
(19, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', ';ljkhljkhvjg', 'متوفر', 'استقبال', '2020-04-04 11:11:36', '2020-04-04 11:11:36'),
(20, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', ';ljkhljkhvjg', 'متوفر', 'استقبال', '2020-04-04 11:13:17', '2020-04-04 11:13:17'),
(21, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'xvzvzvzzzzzzzzzzzz', 'متوفر', 'استقبال', '2020-04-04 11:17:44', '2020-04-04 11:17:44'),
(22, 'angham@gmail.com', 'import@hayahfood.com', 'dddd', ';lj;khjbvhgchfg', 'متوفر', 'استقبال', '2020-04-04 11:27:37', '2020-04-04 11:27:37'),
(23, 'angham@gmail.com', 'import@hayahfood.com', 'dddd', ';lj;khjbvhgchfg', 'متوفر', 'استقبال', '2020-04-04 11:29:42', '2020-04-04 11:29:42'),
(24, 'angham@gmail.com', 'import@hayahfood.com', 'dddd', ';lj;lkhbgvhcf', 'متوفر', 'استقبال', '2020-04-04 11:32:30', '2020-04-04 11:32:30'),
(25, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'lkjhgfgh', 'متوفر', 'استقبال', '2020-04-04 11:34:36', '2020-04-04 11:34:36'),
(26, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'kjkhghhjkl', 'lkjhjkl', 'متوفر', 'استقبال', '2020-04-04 11:44:23', '2020-04-04 11:44:23'),
(27, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'dddd', 'xzcvbnvcxz', 'متوفر', 'استقبال', '2020-04-04 11:55:36', '2020-04-04 11:55:36'),
(28, 'angham@gmail.com', 'import@hayahfood.com', 'asdfa', 'asxdfghnmnbvcx', 'متوفر', 'استقبال', '2020-04-04 12:03:07', '2020-04-04 12:03:07'),
(29, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', '\\;lk', '.l,kjhgfghjkl', 'متوفر', 'استقبال', '2020-04-04 12:07:46', '2020-04-04 12:07:46'),
(30, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'No Subject', 'angham alabsi', 'متوفر', 'استقبال', '2020-04-04 12:22:11', '2020-04-04 12:22:11'),
(31, 'anghamalabsi22@gmail.com', 'import@hayahfood.com', 'No Subject', 'angham alabsi', 'متوفر', 'استقبال', '2020-04-04 12:23:24', '2020-04-04 12:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `sendedemails`
--

CREATE TABLE `sendedemails` (
  `email_id` int(11) NOT NULL,
  `email_sender` varchar(200) NOT NULL,
  `email_receiver` varchar(200) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_msg` text NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `email_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sendedemails`
--

INSERT INTO `sendedemails` (`email_id`, `email_sender`, `email_receiver`, `email_subject`, `email_msg`, `email_status`, `email_type`, `created_at`, `updated_at`) VALUES
(1, 'import@hayahfood.com', 'anghamalabsi22@gmail.com', 'anghamalabsi22@gmail.com', 'l;faldklfsdmkg;lsdfmgfdv', 'متوفر', 'ارسال', '2020-04-10 19:14:04', '2020-04-10 19:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_type`, `user_status`, `created_at`, `updated_at`) VALUES
(4, 'angham', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'angham@gmail.com', 'مسؤول', 'مفعل', '2020-02-27 06:27:30', '2020-04-11 06:51:48'),
(26, 'angham2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'anghamalabsi22@gmail.com', 'مسؤول', 'مفعل', '2020-04-11 06:50:49', '2020-04-11 09:35:51'),
(27, 'sama', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'anghamalabsi22@gmail.com', 'مسؤول', 'مفعل', '2020-04-11 09:34:49', '2020-04-11 09:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `detail_id` int(11) NOT NULL,
  `user_gander` varchar(100) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_exten` varchar(50) NOT NULL,
  `media_path` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`detail_id`, `user_gander`, `user_birthday`, `user_fullname`, `media_name`, `media_size`, `media_exten`, `media_path`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'انثئ', '2020-04-02', 'angham alabsi', 'ppp.png', 1851, 'png', 'storage/img/ppp.png', '2020-04-11 06:50:49', '2020-04-11 09:35:51', 26),
(2, 'انثئ', '2020-04-29', 'angham', 'ppp2.png', 1851, 'png', 'storage/img/ppp2.png', '2020-04-11 09:34:49', '2020-04-11 09:34:49', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hf_info`
--
ALTER TABLE `hf_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `media_brands`
--
ALTER TABLE `media_brands`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `media_categories`
--
ALTER TABLE `media_categories`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `media_products`
--
ALTER TABLE `media_products`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `pro_id` (`pro_id`,`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `media_types`
--
ALTER TABLE `media_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `media_user`
--
ALTER TABLE `media_user`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `products_ibfk_2` (`brand_id`),
  ADD KEY `products_ibfk_3` (`cate_id`);

--
-- Indexes for table `receivedemails`
--
ALTER TABLE `receivedemails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `sendedemails`
--
ALTER TABLE `sendedemails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_user_id_unique` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hf_info`
--
ALTER TABLE `hf_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_brands`
--
ALTER TABLE `media_brands`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media_categories`
--
ALTER TABLE `media_categories`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `media_products`
--
ALTER TABLE `media_products`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media_types`
--
ALTER TABLE `media_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media_user`
--
ALTER TABLE `media_user`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receivedemails`
--
ALTER TABLE `receivedemails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sendedemails`
--
ALTER TABLE `sendedemails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `media_brands`
--
ALTER TABLE `media_brands`
  ADD CONSTRAINT `media_brands_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `media_brands_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `media_types` (`type_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `media_products`
--
ALTER TABLE `media_products`
  ADD CONSTRAINT `media_products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `media_types` (`type_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `media_products_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
