-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 07:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i3741066_ci1`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_pk_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_pin` int(10) NOT NULL,
  `area_status` int(2) NOT NULL,
  `area_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_pk_id`, `area_name`, `area_pin`, `area_status`, `area_added_on`, `city_id`) VALUES
(1, 'koregaon park', 411001, 1, '2017-02-02 10:38:59', 2),
(5, 'Katraj', 411046, 1, '2017-07-19 08:22:42', 2),
(7, 'Dekkan', 411047, 2, '2017-07-28 06:53:21', 2),
(8, 'Shivaji nagar', 411005, 1, '2017-07-29 07:48:10', 2),
(9, 'Dadar', 400014, 1, '2017-07-29 08:59:06', 4),
(10, 'Sangavi', 411027, 1, '2017-07-29 09:00:01', 2),
(11, 'Hadapsar', 411028, 1, '2017-07-29 09:28:27', 2),
(12, 'Juhu', 400049, 1, '2017-07-29 09:29:05', 4),
(13, 'Akurdi', 411035, 1, '2017-07-29 09:30:55', 2),
(14, 'Karve Nagar', 411052, 1, '2017-08-12 11:06:29', 2),
(15, 'Pandharpur', 413304, 1, '2017-08-14 09:31:43', 9),
(16, 'Mohol', 413303, 1, '2017-08-14 09:32:00', 9),
(17, 'Shahupalac', 411089, 1, '2017-08-14 12:05:27', 10);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_pk_id` int(25) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_pk_id`, `brand_name`, `brand_status`) VALUES
(1, 'Pepe', 1),
(2, 'Gravityedification', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_pk_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_type_fk_id` int(11) NOT NULL,
  `category_status` int(2) NOT NULL,
  `category_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_pk_id`, `category_name`, `category_type_fk_id`, `category_status`, `category_added_date`) VALUES
(1, 'Women', 1, 1, '2017-12-02 11:00:23'),
(2, 'Men', 1, 1, '2017-12-02 11:00:29'),
(3, 'Kids', 1, 1, '2017-12-02 11:00:36'),
(4, 'Foods', 1, 1, '2017-12-02 11:00:44'),
(5, 'Mobiles & Accessories', 2, 1, '2018-06-04 10:59:38'),
(6, 'Sports', 2, 1, '2018-06-05 12:55:16'),
(7, 'Books', 2, 1, '2018-06-05 13:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_size`
--

CREATE TABLE `category_size` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `sub_sub_category_id` int(10) NOT NULL,
  `size` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_size`
--

INSERT INTO `category_size` (`id`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `size`, `status`) VALUES
(1, 1, 1, 1, '28', 1),
(2, 1, 1, 1, '30', 1),
(3, 1, 1, 1, '32', 1),
(4, 2, 4, 12, '26', 1),
(5, 2, 4, 12, '28', 1),
(6, 2, 4, 12, '30', 1),
(7, 2, 4, 12, '32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `category_type_pk_id` int(11) NOT NULL,
  `category_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`category_type_pk_id`, `category_type`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `catfirst`
--

CREATE TABLE `catfirst` (
  `slid_id` int(20) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catfirst`
--

INSERT INTO `catfirst` (`slid_id`, `cat`, `slide`) VALUES
(13, 'food', '1510910005img_15for4-pr-image_text.jpg'),
(14, 'food', '1510910005img_2Food-Advertisements-30.jpg'),
(35, 'kids', '1511593942img_1kdsi-seven.jpg'),
(33, 'womens', '1511593926img_1women-three.jpg'),
(34, 'womens', '1511593926img_2women-firu.jpg'),
(32, 'mens', '1511522699img_1images (2).jpg'),
(31, 'mens', '1511522699img_2images.jpg'),
(30, 'sports', '1511593967img_1SKXP24191_EcomPerformance_14_M_On-the-GO_1060x470_4bb7a31eb65b.jpg'),
(29, 'sports', '1511593967img_2new.jpeg'),
(36, 'kids', '1511593942img_2kids-eight.jpg'),
(37, 'electronics', '1511593989img_1ecommerce slider.png'),
(38, 'electronics', '1511593989img_2moto-e4.png');

-- --------------------------------------------------------

--
-- Table structure for table `catfive`
--

CREATE TABLE `catfive` (
  `slid_id` int(20) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catfive`
--

INSERT INTO `catfive` (`slid_id`, `cat`, `slide`) VALUES
(25, 'mens', '1511523106img_1groom-wedding-3 (1).jpg'),
(29, 'mens', '1511522773img_2images (1).jpg'),
(27, 'mens', '1511522773img_3images (2).jpg'),
(28, 'mens', '1511522949img_4men-advertising-photography.jpg'),
(30, 'womens', ''),
(31, 'womens', ''),
(32, 'womens', ''),
(33, 'womens', ''),
(34, 'kids', ''),
(35, 'kids', ''),
(36, 'kids', ''),
(37, 'kids', ''),
(38, 'electronics', ''),
(39, 'electronics', ''),
(40, 'electronics', ''),
(41, 'electronics', ''),
(42, 'sports', ''),
(43, 'sports', ''),
(44, 'sports', ''),
(45, 'sports', ''),
(46, 'food', ''),
(47, 'food', ''),
(48, 'food', ''),
(49, 'food', '');

-- --------------------------------------------------------

--
-- Table structure for table `catfourth`
--

CREATE TABLE `catfourth` (
  `slid_id` int(25) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catfourth`
--

INSERT INTO `catfourth` (`slid_id`, `cat`, `slide`) VALUES
(13, 'electronics', ''),
(14, 'electronics', ''),
(15, 'womens', '1511523436img_1women-three.jpg'),
(16, 'womens', '1511523437img_2women-firu.jpg'),
(17, 'kids', ''),
(18, 'kids', ''),
(19, 'mens', ''),
(20, 'mens', ''),
(21, 'sports', '1511594118img_1sports-shoe-predator-small-12842.jpg'),
(22, 'sports', '1511594118img_2original.jpg'),
(23, 'food', ''),
(24, 'food', '');

-- --------------------------------------------------------

--
-- Table structure for table `catsecond`
--

CREATE TABLE `catsecond` (
  `slid_id` int(20) NOT NULL,
  `cat` varchar(220) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catsecond`
--

INSERT INTO `catsecond` (`slid_id`, `cat`, `slide`) VALUES
(7, 'food', '1511175927img_1dominos-uk-delivers-donuts.jpg'),
(9, 'womens', '1511175560img_1pantaloon-slider_two.jpg'),
(11, 'mens', '1511175482img_1pantaloon-slider.jpg'),
(13, 'kids', '1511175671img_1Kids_Main.jpg'),
(14, 'electronics', '1511179068img_1maxresdefault.jpg'),
(15, 'sports', '1511175912img_1slider_new.png');

-- --------------------------------------------------------

--
-- Table structure for table `catslider`
--

CREATE TABLE `catslider` (
  `slid_id` int(25) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catslider`
--

INSERT INTO `catslider` (`slid_id`, `cat`, `slide`) VALUES
(29, 'womens', '1510750296img_1won5.jpg'),
(30, 'womens', '1510750296img_2won7.jpg'),
(31, 'womens', '1510750296img_3won5.jpg'),
(32, 'womens', '1510750296img_4wo.jpg'),
(33, 'Mens', '1510749676img_1slide_one.jpg'),
(34, 'Mens', '1510749676img_2slider_two.jpg'),
(35, 'Mens', '1510749784img_3one.jpg'),
(36, 'Mens', '1510749676img_4slide_four.jpg'),
(37, 'kids', '1510750458img_1kid1.jpg'),
(38, 'kids', '1510750458img_2kid2.jpg'),
(39, 'kids', '1510750458img_3kid3.jpg'),
(40, 'kids', '1510750458img_4kid4.jpg'),
(41, 'electronics', '1511180535img_1PREMIUMBEAUTYdesktop_slideshow.jpg'),
(42, 'electronics', '1511180535img_2reebok-desktop-banner.jpg'),
(43, 'electronics', ''),
(44, 'electronics', ''),
(45, 'sports', '1510911184img_1facebook.jpg'),
(46, 'sports', '1510911184img_2original.jpg'),
(47, 'sports', '1510911185img_3sports-shoe-predator-small-12842.jpg'),
(48, 'sports', '1510911185img_4SKXP24191_EcomPerformance_14_M_On-the-GO_1060x470_4bb7a31eb65b.jpg'),
(49, 'food', '1510910637img_15for4-pr-image_text.jpg'),
(50, 'food', '1510910637img_2Food-Advertisements-30.jpg'),
(51, 'food', '1510910637img_3dominos-uk-delivers-donuts.jpg'),
(52, 'food', '1510910637img_4max).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `catthird`
--

CREATE TABLE `catthird` (
  `slid_id` int(20) NOT NULL,
  `cat` varchar(220) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catthird`
--

INSERT INTO `catthird` (`slid_id`, `cat`, `slide`) VALUES
(31, 'mens', '1511179592img_1men-foru.jpg'),
(30, 'sports', '1511594156img_181z7A8GqgAL._UX395_'),
(29, 'sports', '1511594156img_227112940_l.jpg'),
(32, 'mens', '1511179592img_2men-three.jpg'),
(33, 'mens', '1511179592img_3men-two.jpg'),
(34, 'mens', '1511179593img_4mes-one.jpg'),
(35, 'womens', '1511180024img_1women-firu.jpg'),
(36, 'womens', '1511180025img_2women-five.jpg'),
(37, 'womens', '1511180025img_3women-one.jpg'),
(38, 'womens', '1511180025img_4women-three.jpg'),
(39, 'kids', '1511180337img_1kdsi-seven.jpg'),
(40, 'kids', '1511180337img_2kids-eight.jpg'),
(41, 'kids', '1511180337img_3kids-five.jpg'),
(42, 'kids', '1511180337img_4kids-four.jpg'),
(43, 'electronics', '1511938169img_1gbs-images-.jpg'),
(44, 'electronics', '1511938170img_2gbs-images.jpg'),
(45, 'electronics', '1511938170img_3ashim-d-silva-162286.jpg'),
(46, 'electronics', ''),
(47, 'sports', '1511594156img_3adidas_neo_vs_easy_vulc_sea_grey.jpg'),
(48, 'sports', '1511594156img_4exsis-i.jpeg'),
(49, 'food', ''),
(50, 'food', ''),
(51, 'food', ''),
(52, 'food', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_pk_id` int(20) NOT NULL,
  `city_name` varchar(222) NOT NULL,
  `city_status` tinyint(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_pk_id`, `city_name`, `city_status`) VALUES
(2, 'Pune', 1),
(4, 'Mumbai', 1),
(5, 'Satara', 1),
(7, 'Bhandara', 1),
(8, 'Nagpur', 1),
(9, 'Solapur', 1),
(10, 'Kolhapur', 1),
(11, 'Latur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL,
  `cms_page_name` varchar(100) NOT NULL,
  `cms_meta_title` text NOT NULL,
  `cms_meta_Keywords` text NOT NULL,
  `cms_meta_description` text NOT NULL,
  `cms_page_content` text NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `cms_page_name`, `cms_meta_title`, `cms_meta_Keywords`, `cms_meta_description`, `cms_page_content`, `create_date`, `modify_date`) VALUES
(2, 'Help', 'Help', 'Help', 'Help', '<h2>How can we help you</h2>\r\n\r\n<h2>Top 10 Frequently asked questions(FAQ)</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#one\">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p>The standard Lorem Ipsum passage Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices ? Consectetuer adipiscing elit Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices? Dincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#two\">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#three\">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#four\">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#five\">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p><a href=\"http://project1.inncrotech.site/help.php#six\">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>sfsdfdff</p>\r\n', '0000-00-00 00:00:00', '2017-08-11 14:04:58'),
(4, 'Testimonials', 'Testimonials', 'Testimonials', 'Testimonials', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing e', '0000-00-00 00:00:00', '2017-08-09 14:37:50'),
(5, 'About ', 'About ', 'About ', 'About ', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Our Mission</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p><strong>Our History</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '0000-00-00 00:00:00', '2018-05-28 09:26:43'),
(6, 'Gravity BS', 'Gravity BS', 'Gravity BS', 'Gravity BS', '<p><a href=\"http://project1.inncrotech.site/help.php#one\">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ? </a></p>\r\n\r\n<p>The standard Lorem Ipsum passage Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices ? Consectetuer adipiscing elit Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices? Dincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipisc</p>\r\n\r\n<p>&nbsp;</p>\r\n', '0000-00-00 00:00:00', '2017-08-11 07:53:40'),
(8, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '0000-00-00 00:00:00', '2017-08-11 10:10:30'),
(9, 'About Us ', 'About', 'About', 'gravity business', '<p>Gravity Business Services is a business development company using IT at it&rsquo;s best! We help you from idea to realisation. We provide all digital marketing services under one roof. It includes On Page and Off Page SEO, Social media marketing, Website development, Mobile app development, etc. We are also working on creating an E-commerce platform for SME sector.</p>\r\n\r\n<p>Our director Mr. Chittaranjan Deo has 20+ years of experience in IT combined with Marketing Education and Business Development.</p>\r\n\r\n<p>GBS Team consists of Consultants in the field of IT, Sales Executives, Content writers, Website developers, Mobile App Developers and Admin Staff. The team is proud of the services they provide, and they participate in various exhibitions and seminars demonstrating their work and sharing knowledge with entrepreneurs.</p>\r\n', '0000-00-00 00:00:00', '2017-11-08 06:22:34'),
(10, 'Demo Page', 'Demo Page', 'Demo Page', 'Demo Page', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing e</p>\r\n', '0000-00-00 00:00:00', '2017-11-08 06:24:12'),
(11, 'FAQ', 'FAQ', 'FAQ', 'FAQ', '<p>FAQ</p>\r\n', '0000-00-00 00:00:00', '2017-11-08 06:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `serial` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `deladdress` text COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `user_fk_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homesecondsection`
--

CREATE TABLE `homesecondsection` (
  `slid_id` int(20) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homesecondsection`
--

INSERT INTO `homesecondsection` (`slid_id`, `slide`) VALUES
(6, '1510829268img_1xiaomi-mi-a1-sale.jpg'),
(7, '1510829392img_2moto-e4.png'),
(8, '1510829410img_3mi.jpeg'),
(9, '1510829410img_4lenovo_a5000_white.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `homeslider`
--

CREATE TABLE `homeslider` (
  `slid_id` int(20) NOT NULL,
  `slide_sub_sub_cat` int(20) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeslider`
--

INSERT INTO `homeslider` (`slid_id`, `slide_sub_sub_cat`, `slide`) VALUES
(5, 21, '1510820040img_1maxresdefault.jpg'),
(6, 22, '1510825736img_2slider-img-1.jpg'),
(7, 23, '1510825736img_3slider-img-2.jpg'),
(8, 24, '1510825774img_4slider-img-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `homethirdsection`
--

CREATE TABLE `homethirdsection` (
  `slid_id` int(20) NOT NULL,
  `slide` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homethirdsection`
--

INSERT INTO `homethirdsection` (`slid_id`, `slide`) VALUES
(7, '1510829532img_1wo1.jpg'),
(8, '1510829552img_2won.jpg'),
(9, '1510829595img_3won2.jpg'),
(10, '1510829595img_4won8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `country` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `amount` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivarycharge` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `orderdate` datetime DEFAULT NULL,
  `order_status` enum('Pending','Delivered','Shipping','Packing','Completed','Cancelled') COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `mrp` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `color` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` int(20) NOT NULL,
  `orderID` int(20) NOT NULL,
  `ord_status` int(11) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_track_status`
--

CREATE TABLE `order_track_status` (
  `statusId` int(22) NOT NULL,
  `trackstatus` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_pk_id` int(11) NOT NULL,
  `SUK` varchar(255) NOT NULL,
  `pro_vendor_id` int(25) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `area_fk_id` text NOT NULL,
  `category_fk_id` int(2) NOT NULL,
  `sub_category_fk_id` int(11) NOT NULL,
  `product_status` int(2) NOT NULL,
  `product_image` text NOT NULL,
  `product_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `care` text NOT NULL,
  `brand` int(25) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `size_category_fk_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_pk_id`, `SUK`, `pro_vendor_id`, `product_name`, `product_desc`, `area_fk_id`, `category_fk_id`, `sub_category_fk_id`, `product_status`, `product_image`, `product_added_on`, `care`, `brand`, `product_color`, `size_category_fk_id`) VALUES
(1, 'G1', 1, 'Wrangler Skinny Men\'s Light Blue Jeans', 'Wrangler Skinny Men\'s Light Blue Jeans\r\n', '', 2, 4, 1, 'c48f81dde87c9098e0f12d1d83193e87.jpg', '2018-08-10 09:10:02', '', 1, '', 12),
(2, 'G2', 1, 'Levi\'s Skinny Women\'s Black Jeans', 'Levi\'s Skinny Women\'s Black Jeans\r\n', '', 1, 1, 1, 'ea2bc387a5ff36b2b07204d225ce9db3.jpg', '2018-08-10 09:25:51', '', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_area`
--

CREATE TABLE `product_area` (
  `PA_id` int(25) NOT NULL,
  `pa_areaID` int(25) NOT NULL,
  `Pa_product_id` int(25) NOT NULL,
  `delivery_charges` int(25) NOT NULL,
  `city_id` int(11) NOT NULL,
  `no_of_days` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_area`
--

INSERT INTO `product_area` (`PA_id`, `pa_areaID`, `Pa_product_id`, `delivery_charges`, `city_id`, `no_of_days`) VALUES
(1, 1, 1, 50, 2, '10'),
(3, 1, 2, 50, 2, '10');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `color_pk_id` int(11) NOT NULL,
  `color_code` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `prod_img_pk_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `product_fk_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`prod_img_pk_id`, `file_name`, `product_fk_id`, `added_on`) VALUES
(1, '4687df98f1132bdba814aa385aa061cf.jpg', 1, '2018-08-10 09:10:02'),
(2, '4fa499c7809e7b2ff04b4b1822d0c727.jpg', 1, '2018-08-10 09:10:02'),
(3, 'c48f81dde87c9098e0f12d1d83193e87.jpg', 1, '2018-08-10 09:10:02'),
(4, 'f8de03a0c1b54b6bf0a5773d75a9b6e6.jpg', 2, '2018-08-10 09:25:52'),
(5, '6f85459f2b7e11285699fa9f05245ee2.jpg', 2, '2018-08-10 09:25:52'),
(6, 'ea2bc387a5ff36b2b07204d225ce9db3.jpg', 2, '2018-08-10 09:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `ps_id` int(25) NOT NULL,
  `size_name` varchar(255) NOT NULL DEFAULT '0',
  `size_prize` int(25) NOT NULL,
  `size_descount` varchar(250) NOT NULL DEFAULT '0',
  `product_id` int(25) NOT NULL,
  `size_qty` int(11) NOT NULL,
  `size_descprice` varchar(250) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`ps_id`, `size_name`, `size_prize`, `size_descount`, `product_id`, `size_qty`, `size_descprice`) VALUES
(1, '4', 933, '', 1, 10, '933'),
(2, '5', 1033, '', 1, 10, '1033'),
(3, '6', 1133, '', 1, 10, '1133'),
(4, '7', 1233, '', 1, 10, '1233'),
(10, '3', 999, '', 2, 10, '999'),
(9, '2', 899, '', 2, 10, '899'),
(8, '1', 799, '', 2, 5, '799');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `stockid` int(25) NOT NULL,
  `product_id` int(25) NOT NULL,
  `QTY` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`stockid`, `product_id`, `QTY`) VALUES
(1, 1, 40),
(2, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `reciver`
--

CREATE TABLE `reciver` (
  `rid` int(20) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `rmob` bigint(25) NOT NULL,
  `radd1` text NOT NULL,
  `radd2` text NOT NULL,
  `remail` text NOT NULL,
  `rcon` varchar(255) NOT NULL,
  `rcity` varchar(255) NOT NULL,
  `rpin` int(20) NOT NULL,
  `rmsgC` text NOT NULL,
  `txnid` text NOT NULL,
  `amount` int(25) NOT NULL,
  `orderid` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size_categories`
--

CREATE TABLE `size_categories` (
  `sz_pk_id` int(20) NOT NULL,
  `sz_sc_category_fk_id` int(20) NOT NULL,
  `sz_category_name` varchar(255) NOT NULL,
  `size_category_status` tinyint(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_categories`
--

INSERT INTO `size_categories` (`sz_pk_id`, `sz_sc_category_fk_id`, `sz_category_name`, `size_category_status`) VALUES
(1, 1, 'Jeans', 1),
(2, 1, 'Dresses', 1),
(3, 1, 'Dress Material', 1),
(4, 1, 'Kurtis', 1),
(5, 1, 'Tops', 1),
(6, 1, 'Shirts', 1),
(7, 1, 'Sarees', 1),
(8, 1, 'Leggings', 1),
(9, 2, 'Artificial', 1),
(10, 2, 'Semi-Precious', 1),
(11, 2, 'Silver', 1),
(12, 4, 'Jeans', 1),
(13, 4, 'T-Shirts', 1),
(14, 4, 'Shirts', 1),
(15, 4, 'Kurtas', 1),
(16, 4, 'Trousers', 1),
(17, 5, 'School Bags', 1),
(18, 8, 'Backpacks', 1),
(19, 9, 'Veg Burger', 1),
(20, 11, 'Flats', 1),
(21, 11, 'Heels', 1),
(22, 12, 'Kurta ', 1),
(23, 13, 'VIVO V9', 1),
(24, 14, 'Apple iPhone 6', 1),
(25, 15, 'Bat', 1),
(26, 16, 'Love', 1),
(27, 6, 'Education Toys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `sub_cat` int(10) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `sub_cat`, `addedon`) VALUES
(81, 16, '2018-06-05 13:06:00'),
(80, 15, '2018-06-05 12:56:00'),
(79, 14, '2018-06-05 07:14:18'),
(78, 13, '2018-06-04 11:00:24'),
(77, 12, '2018-06-04 07:28:20'),
(76, 11, '2018-05-31 10:53:03'),
(75, 10, '2018-05-29 12:38:35'),
(74, 9, '2018-05-29 12:38:26'),
(73, 9, '2017-12-04 06:11:37'),
(72, 8, '2017-12-02 11:55:52'),
(71, 7, '2017-12-02 11:52:01'),
(70, 6, '2017-12-02 11:51:51'),
(69, 5, '2017-12-02 11:51:38'),
(68, 4, '2017-12-02 11:49:31'),
(67, 3, '2017-12-02 11:47:29'),
(66, 2, '2017-12-02 11:44:37'),
(65, 1, '2017-12-02 11:11:49'),
(64, 29, '2017-12-02 11:03:11'),
(63, 28, '2017-11-27 09:09:31'),
(62, 27, '2017-11-25 05:58:42'),
(61, 26, '2017-11-21 06:31:36'),
(60, 25, '2017-11-21 06:29:50'),
(59, 24, '2017-11-21 06:25:59'),
(58, 23, '2017-11-21 06:23:49'),
(57, 22, '2017-11-21 06:22:48'),
(56, 21, '2017-11-16 05:18:19'),
(55, 20, '2017-11-16 05:18:14'),
(54, 19, '2017-11-16 05:18:06'),
(53, 18, '2017-11-16 05:18:01'),
(52, 17, '2017-11-16 05:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(20) NOT NULL,
  `slider_id` int(20) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slider_id`, `slide_image`) VALUES
(230, 58, '1511593067img_1banner-2.png'),
(229, 58, '1511593067img_2SF-sugar free banner.jpg'),
(227, 57, '1511518244img_1wons3.jpg'),
(225, 57, '1511518244img_2won8.jpg'),
(228, 57, '1511518244img_3won7.jpg'),
(226, 57, '1511518245img_4won5.jpg'),
(224, 56, '1510831477img_1lyra-winter-banner.jpg'),
(223, 56, '1510831477img_2leggings-guide-banner.jpg'),
(222, 56, '1510831477img_3Leggings-and-Jeggings_Banner_2x.jpg'),
(221, 56, '1511512939img_4Biba WHite Kurtis for Women (1).jpg'),
(220, 55, '1510906917img_1new-arrivals.jpg'),
(219, 55, '1510906918img_2silk-collections.jpg'),
(218, 55, '1510906918img_3women-collections_1.jpg'),
(217, 55, '1510906918img_4wo.jpg'),
(216, 54, '1510907294img_1banner3.jpg'),
(215, 54, '1510907294img_2Biba WHite Kurtis for Women (1).jpg'),
(214, 54, '1510907294img_3Kurtis-under-700.jpg'),
(213, 54, '1510907294img_4won.jpg'),
(212, 53, '1510908063img_1slider-Our-Shoplist.jpg'),
(210, 53, '1510908063img_250331-A-(Draftv5).jpg'),
(208, 52, '1510830660img_1jeans-.jpg'),
(206, 52, '1510830661img_2Main-Slider.jpg'),
(211, 53, '1510908064img_3Davinci.jpg'),
(209, 53, '1510908064img_4MissSelfridge-SIS-Slider.jpg'),
(207, 52, '1511512557img_3pantaloon-slider.jpg'),
(205, 52, '1511512557img_4leggings-guide-banner.jpg'),
(231, 58, '1511593067img_3quest-nutrition-chips-banner.jpg'),
(232, 58, '1511593067img_4main-banner-party-4-min.jpg'),
(233, 59, '1511518726img_1baby-doll-for-the-bath.jpg'),
(234, 59, '1511518727img_2d.jpg'),
(235, 59, '1511518727img_3slider-new.jpg'),
(236, 59, '1511518727img_4toys-slider.png'),
(237, 60, '1511518610img_1Engagement-Ring-slider.jpg'),
(238, 60, '1511518610img_2diamond-jewellery.jpg'),
(239, 60, '1511518610img_3home-slider1.jpg'),
(240, 60, '1511518610img_4slider_slide_1_image.jpg'),
(241, 61, '1511518366img_13D Architectural Bungalow Animations.jpg'),
(242, 61, '1511518366img_23D Panoramic  Bungalow Visualization.jpg'),
(243, 61, '1511518366img_34d3mti4510uf5z8u.jpg'),
(244, 61, '1511518366img_48427970619_303cd6fc64_b.jpg'),
(245, 62, '1511592553img_1Main-Slider.jpg'),
(246, 62, '1511592553img_2layer-template-3.png'),
(247, 62, '1511592553img_3sarees_banner.jpg'),
(248, 62, '1511592553img_4kid3.jpg'),
(249, 63, ''),
(250, 63, ''),
(251, 63, ''),
(252, 63, ''),
(253, 64, ''),
(254, 64, ''),
(255, 64, ''),
(256, 64, ''),
(257, 65, '1512217010img_1Kids_Main.jpg'),
(258, 65, '1512217010img_2wildechilde-BRIDAL-SLIDER.png'),
(259, 65, '1512217010img_3layer-template-3.png'),
(260, 65, '1512217011img_4fashion-slider2.jpg'),
(261, 66, '1512217164img_11501572904img_3image11(22).jpeg'),
(262, 66, '1512217164img_21501564214img_3Artificial_jewellery_and_fashion_jewellery_online_shopping.jpg'),
(263, 66, '1512217164img_31501573128img_4Antique-Jewellery-Banner.jpg'),
(264, 66, '1512217164img_41501573128img_157eb20540a4abc438f631b36f0ad2d7b.jpg'),
(265, 67, ''),
(266, 67, ''),
(267, 67, ''),
(268, 67, ''),
(269, 68, ''),
(270, 68, ''),
(271, 68, ''),
(272, 68, ''),
(273, 69, ''),
(274, 69, ''),
(275, 69, ''),
(276, 69, ''),
(277, 70, ''),
(278, 70, ''),
(279, 70, ''),
(280, 70, ''),
(281, 71, ''),
(282, 71, ''),
(283, 71, ''),
(284, 71, ''),
(285, 72, '1512367385img_1BANNER-B.png'),
(286, 72, '1512367386img_2ergobag-banner-wide.jpg'),
(287, 72, '1512367386img_3gee 5.jpg'),
(288, 72, '1512367386img_4Smiggle_Website-Banner.jpg'),
(289, 73, ''),
(290, 73, ''),
(291, 73, ''),
(292, 73, ''),
(293, 74, ''),
(294, 74, ''),
(295, 74, ''),
(296, 74, ''),
(297, 75, ''),
(298, 75, ''),
(299, 75, ''),
(300, 75, ''),
(301, 76, ''),
(302, 76, ''),
(303, 76, ''),
(304, 76, ''),
(305, 77, ''),
(306, 77, ''),
(307, 77, ''),
(308, 77, ''),
(309, 78, ''),
(310, 78, ''),
(311, 78, ''),
(312, 78, ''),
(313, 79, ''),
(314, 79, ''),
(315, 79, ''),
(316, 79, ''),
(317, 80, ''),
(318, 80, ''),
(319, 80, ''),
(320, 80, ''),
(321, 81, ''),
(322, 81, ''),
(323, 81, ''),
(324, 81, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_pk_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_pk_id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `subcription`
--

CREATE TABLE `subcription` (
  `subc__id` int(20) NOT NULL,
  `subc__title` varchar(255) NOT NULL,
  `subc_value` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcription`
--

INSERT INTO `subcription` (`subc__id`, `subc__title`, `subc_value`) VALUES
(1, 'Golden', 15000),
(2, 'Sliver', 10000),
(3, 'Copper', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sc_pk_id` int(11) NOT NULL,
  `sc_category_fk_id` int(11) NOT NULL,
  `sc_category_name` varchar(255) NOT NULL,
  `sc_category_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sub_category_status` smallint(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sc_pk_id`, `sc_category_fk_id`, `sc_category_name`, `sc_category_added_on`, `sub_category_status`) VALUES
(1, 1, 'Clothing', '2017-12-02 11:11:49', 1),
(2, 1, 'Jewellery', '2017-12-02 11:44:37', 1),
(3, 1, 'Bags', '2017-12-02 11:47:29', 1),
(4, 2, 'Clothing', '2017-12-02 11:49:31', 1),
(5, 3, 'Bags', '2017-12-02 11:51:38', 1),
(6, 3, 'Toys', '2017-12-02 11:51:51', 1),
(7, 3, 'Stationary', '2017-12-02 11:52:01', 1),
(8, 2, 'Bags', '2017-12-02 11:55:52', 1),
(9, 4, 'Veg', '2018-05-29 12:38:26', 1),
(10, 4, 'Nonveg', '2018-05-29 12:38:35', 1),
(11, 1, 'Footwear', '2018-05-31 10:53:03', 1),
(12, 3, 'Boys-Clothing', '2018-06-04 07:28:20', 1),
(13, 5, 'Mi', '2018-06-04 11:00:24', 1),
(14, 5, 'Apple', '2018-06-05 07:14:18', 1),
(15, 6, 'Cricket', '2018-06-05 12:56:00', 1),
(16, 7, 'Educational And Professional Books', '2018-06-05 13:06:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdelvaddress`
--

CREATE TABLE `userdelvaddress` (
  `uda_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `uda_address1` text NOT NULL,
  `uda_address2` text NOT NULL,
  `uda_city` varchar(255) NOT NULL,
  `uda_pincode` int(20) NOT NULL,
  `uda_country` varchar(255) NOT NULL,
  `uda_state` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_pk_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` text NOT NULL,
  `user_contact` bigint(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_address1` text NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL,
  `user_status` int(2) NOT NULL,
  `profile_image` text NOT NULL,
  `user_last_login_time` datetime NOT NULL,
  `first_time_user` int(2) NOT NULL DEFAULT '2',
  `user_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OTP` smallint(4) NOT NULL DEFAULT '0',
  `LOTP` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_pk_id`, `user_first_name`, `user_last_name`, `user_password`, `user_email`, `user_contact`, `user_address`, `user_address1`, `pincode`, `state`, `city`, `country`, `user_type`, `user_status`, `profile_image`, `user_last_login_time`, `first_time_user`, `user_added_on`, `OTP`, `LOTP`) VALUES
(71, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 8275370391, 'demo', '', '', '', '', '', 1, 1, '', '2018-11-24 16:11:35', 2, '2017-07-13 10:47:57', 0, 0),
(99, 'Rutuja Nashikar', '', '', 'rutu@gmail.com', 7896541230, 'Pune', '', '', '', '', '', 3, 1, '1533627592user_photoTechnicalSupportRepresentative_Female_Light.png', '0000-00-00 00:00:00', 2, '2018-08-07 07:39:52', 0, 0),
(102, 'Ganesh Singare', '', 'e6e061838856bf47e1de730719fb2609', 'singare.ansh@gmail.com', 7387801383, '', '', '', '', '', '', 0, 1, '', '2018-09-06 16:09:57', 2, '2018-09-06 11:04:23', 0, 5011);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_pk_id` int(20) NOT NULL,
  `User_fk_id` int(20) NOT NULL,
  `vendorcode` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `reg_no` int(25) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ven_subcription` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_pk_id`, `User_fk_id`, `vendorcode`, `bus_name`, `reg_no`, `addedon`, `ven_subcription`) VALUES
(1, 99, 'VEN3991', 'Rutuja Cloths Center', 0, '2018-08-07 07:39:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `w_pro_id` int(11) NOT NULL,
  `wishlist_title` text,
  `w_color` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `user_id`, `w_pro_id`, `wishlist_title`, `w_color`, `create_date`, `status`) VALUES
(1, 100, 1, NULL, '#0023b2', '2018-08-10 17:09:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_pk_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_pk_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_pk_id`);

--
-- Indexes for table `category_size`
--
ALTER TABLE `category_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`category_type_pk_id`);

--
-- Indexes for table `catfirst`
--
ALTER TABLE `catfirst`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `catfive`
--
ALTER TABLE `catfive`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `catfourth`
--
ALTER TABLE `catfourth`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `catsecond`
--
ALTER TABLE `catsecond`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `catslider`
--
ALTER TABLE `catslider`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `catthird`
--
ALTER TABLE `catthird`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_pk_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `homesecondsection`
--
ALTER TABLE `homesecondsection`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `homeslider`
--
ALTER TABLE `homeslider`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `homethirdsection`
--
ALTER TABLE `homethirdsection`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track_status`
--
ALTER TABLE `order_track_status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_pk_id`);

--
-- Indexes for table `product_area`
--
ALTER TABLE `product_area`
  ADD PRIMARY KEY (`PA_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`color_pk_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`prod_img_pk_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `reciver`
--
ALTER TABLE `reciver`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `size_categories`
--
ALTER TABLE `size_categories`
  ADD PRIMARY KEY (`sz_pk_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_pk_id`);

--
-- Indexes for table `subcription`
--
ALTER TABLE `subcription`
  ADD PRIMARY KEY (`subc__id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sc_pk_id`);

--
-- Indexes for table `userdelvaddress`
--
ALTER TABLE `userdelvaddress`
  ADD PRIMARY KEY (`uda_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_pk_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_pk_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_pk_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_size`
--
ALTER TABLE `category_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `category_type_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catfirst`
--
ALTER TABLE `catfirst`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `catfive`
--
ALTER TABLE `catfive`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `catfourth`
--
ALTER TABLE `catfourth`
  MODIFY `slid_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `catsecond`
--
ALTER TABLE `catsecond`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `catslider`
--
ALTER TABLE `catslider`
  MODIFY `slid_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `catthird`
--
ALTER TABLE `catthird`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_pk_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homesecondsection`
--
ALTER TABLE `homesecondsection`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `homeslider`
--
ALTER TABLE `homeslider`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `homethirdsection`
--
ALTER TABLE `homethirdsection`
  MODIFY `slid_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_track_status`
--
ALTER TABLE `order_track_status`
  MODIFY `statusId` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_area`
--
ALTER TABLE `product_area`
  MODIFY `PA_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `color_pk_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `prod_img_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `ps_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stockid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reciver`
--
ALTER TABLE `reciver`
  MODIFY `rid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `size_categories`
--
ALTER TABLE `size_categories`
  MODIFY `sz_pk_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subcription`
--
ALTER TABLE `subcription`
  MODIFY `subc__id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sc_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `userdelvaddress`
--
ALTER TABLE `userdelvaddress`
  MODIFY `uda_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_pk_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
