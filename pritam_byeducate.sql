-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2023 at 02:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pritam_byeducate`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `page_content` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `page_name`, `page_content`) VALUES
(1, 'About Us', '&lt;p&gt;&lt;span style=&quot;color:null;&quot;&gt;From analysis to result. From science to sensitivity. High quality diagnostics are an imperative for better treatment and patient care. Apollo Hospitals Group, India&amp;rsquo;s leading healthcare system, has thus far been delivering 3.5 million high-quality diagnostic tests every year, through its Hospitals and Clinics earning an &amp;lsquo;excellent&amp;rsquo; rating from 95% of its patients.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;color:null;&quot;&gt;M.Star Diagnostics is the result of the &amp;lsquo;good health for all&amp;rsquo; mission that is spurring the Apollo Hospitals Group to touch a billion lives. Following the corporate credo of bringing quality, affordable healthcare closer to the consumer, 2015 saw 100+ M.Star Diagnostics centres, which has now grown to 1500 Patient Care Centres and 120 Labs in 2022 , springing up in neighbourhoods across India, delivering expertise that is empowering to doctors and patients alike.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;color:null;&quot;&gt;M.Star Diagnostics expert technicians and state-of-the-art diagnostic equipment are constantly guided by Apollo&amp;rsquo;s 39-years legacy of excellence to ensure the accuracy and timeliness of test results.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;color:null;&quot;&gt;M.Star Diagnostics has already earned for itself the reputation of being the most preferred, one-stop destination for all common to complex pathology tests. Initiatives such as ongoing skill development &amp;amp; enhancement programs for the teams, regular auditing of processes and implementing patient feedback, enable a seamless experience for all stakeholders of M.Star Diagnostics.&lt;/span&gt;&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_type` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `password`, `login_type`, `status`) VALUES
(1, 'admin', '$2y$10$juS.dH9w.VhvnjpVzuhps.1V8dyZIV0AiE5nAuh9mjJa/wSfHgAem', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discord_links`
--

DROP TABLE IF EXISTS `discord_links`;
CREATE TABLE IF NOT EXISTS `discord_links` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `ac_name` varchar(255) DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discord_links`
--

INSERT INTO `discord_links` (`id`, `user_id`, `ac_name`, `url_link`, `status`) VALUES
(5, '1', 'sdsdfsdfsfwefwed', 'https://discord.com/invite/TGw2xAgnFt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

DROP TABLE IF EXISTS `ebooks`;
CREATE TABLE IF NOT EXISTS `ebooks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `ebook_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `prod_id`, `language`, `book_title`, `ebook_file`) VALUES
(3, '6', 'English', 'ABO Patreon book v0.1', 'Abo_patreon_689769.pdf'),
(4, '6', 'English', 'ABO Patreon book v0.2', 'Abo_patreon_95636617.pdf'),
(5, '6', 'English', 'ABO Patreon book v0.3', 'Abo_patreon_90689394.pdf'),
(6, '6', 'German', 'ABO Patreon-Buch v0.1', 'Abo_patreon_87059241.pdf'),
(7, '6', 'German', 'ABO Patreon-Buch v0.2', 'Abo_patreon_43342002.pdf'),
(8, '6', 'German', 'ABO Patreon-Buch v0.3', 'Abo_patreon_342047.pdf'),
(9, '8', 'English', 'sample Ebook 1', 'Sample_74789857.pdf'),
(10, '8', 'German', 'sample Ebook 1', 'Sample_5087754.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribers`
--

DROP TABLE IF EXISTS `email_subscribers`;
CREATE TABLE IF NOT EXISTS `email_subscribers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `accept_trms` varchar(100) DEFAULT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_subscribers`
--

INSERT INTO `email_subscribers` (`id`, `name`, `email`, `accept_trms`, `dates`) VALUES
(3, 'Sanjay Natta', 'natta.sanjay@gmail.com', 'on', '2023-04-08 00:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `isd_codes`
--

DROP TABLE IF EXISTS `isd_codes`;
CREATE TABLE IF NOT EXISTS `isd_codes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(100) DEFAULT NULL,
  `phone_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `isd_codes`
--

INSERT INTO `isd_codes` (`id`, `country_code`, `phone_code`) VALUES
(1, 'AF', '+93'),
(2, 'AL', '+355'),
(3, 'DZ', '+213'),
(4, 'AS', '+1-684'),
(5, 'AD', '+376'),
(6, 'AO', '+244'),
(7, 'AI', '+1-264'),
(8, 'AQ', '+672'),
(9, 'AG', '+1-268'),
(10, 'AR', '+54'),
(11, 'AM', '+374'),
(12, 'AW', '+297'),
(13, 'AU', '+61'),
(14, 'AT', '+43'),
(15, 'AZ', '+994'),
(16, 'BS', '+1-242'),
(17, 'BH', '+973'),
(18, 'BD', '+880'),
(19, 'BB', '+1-246'),
(20, 'BY', '+375'),
(21, 'BE', '+32'),
(22, 'BZ', '+501'),
(23, 'BJ', '+229'),
(24, 'BM', '+1-441'),
(25, 'BT', '+975'),
(26, 'BO', '+591'),
(27, 'BA', '+387'),
(28, 'BW', '+267'),
(29, 'BV', '55'),
(30, 'BR', '+55'),
(31, 'IO', '246'),
(32, 'BN', '+673'),
(33, 'BG', '+359'),
(34, 'BF', '+226'),
(35, 'BI', '+257'),
(36, 'KH', '+855'),
(37, 'CM', '+237'),
(38, 'CA', '+1'),
(39, 'CV', '+238'),
(40, 'KY', '+1-345'),
(41, 'CF', '+236'),
(42, 'TD', '+235'),
(43, 'CL', '+56'),
(44, 'CN', '+86'),
(45, 'CX', '+53'),
(46, 'CC', '+61'),
(47, 'CO', '+57'),
(48, 'KM', '+269'),
(49, 'CD', '+243'),
(50, 'CG', '+242'),
(51, 'CK', '+682'),
(52, 'CR', '+506'),
(53, 'CI', '+225'),
(54, 'HR', '+385'),
(55, 'CU', '+53'),
(56, 'CY', '+357'),
(57, 'CZ', '+420'),
(58, 'DK', '+45'),
(59, 'DJ', '+253'),
(60, 'DM', '+1-767'),
(61, 'TP', '+670'),
(62, 'EC', '+593 '),
(63, 'EG', '+20'),
(64, 'SV', '+503'),
(65, 'GQ', '+240'),
(66, 'ER', '+291'),
(67, 'EE', '+372'),
(68, 'ET', '+251'),
(69, 'FK', '+500'),
(70, 'FO', '+298'),
(71, 'FJ', '+679'),
(72, 'FI', '+358'),
(73, 'FR', '+33'),
(74, 'GF', '+594'),
(75, 'PF', '+689'),
(76, 'GA', '+241'),
(77, 'GM', '+220'),
(78, 'GE', '+995'),
(79, 'DE', '+49'),
(80, 'GH', '+233'),
(81, 'GI', '+350'),
(82, 'GR', '+30'),
(83, 'GL', '+299'),
(84, 'GD', '+1-473'),
(85, 'GP', '+590'),
(86, 'GU', '+1-671'),
(87, 'GT', '+502'),
(88, 'GN', '+224'),
(89, 'GW', '+245'),
(90, 'GY', '+592'),
(91, 'HT', '+509'),
(92, 'HN', '+504'),
(93, 'HK', '+852'),
(94, 'HU', '+36'),
(95, 'IS', '+354'),
(96, 'IN', '+91'),
(97, 'ID', '+62'),
(98, 'IR', '+98'),
(99, 'IQ', '+964'),
(100, 'IE', '+353'),
(101, 'IL', '+972'),
(102, 'IT', '+39'),
(103, 'JM', '+1-876'),
(104, 'JP', '+81'),
(105, 'JO', '+962'),
(106, 'KZ', '+7'),
(107, 'KE', '+254'),
(108, 'KI', '+686'),
(109, 'KP', '+850'),
(110, 'KR', '+82'),
(111, 'KW', '+965'),
(112, 'KG', '+996'),
(113, 'LA', '+856'),
(114, 'LV', '+371'),
(115, 'LB', '+961'),
(116, 'LS', '+266'),
(117, 'LR', '+231'),
(118, 'LY', '+218'),
(119, 'LI', '+423'),
(120, 'LT', '+370'),
(121, 'LU', '+352'),
(122, 'MO', '+853'),
(123, 'MK', '+389'),
(124, 'MG', '+261'),
(125, 'MW', '+265'),
(126, 'MY', '+60'),
(127, 'MV', '+960'),
(128, 'ML', '+223'),
(129, 'MT', '+356'),
(130, 'MH', '+692'),
(131, 'MQ', '+596'),
(132, 'MR', '+222'),
(133, 'MU', '+230'),
(134, 'YT', '+269'),
(135, 'MX', '+52'),
(136, 'FM', '+691'),
(137, 'MD', '+373'),
(138, 'MC', '+377'),
(139, 'MN', '+976'),
(140, 'MS', '+1-664'),
(141, 'MA', '+212'),
(142, 'MZ', '+258'),
(143, 'MM', '+95'),
(144, 'NA', '+264'),
(145, 'NR', '+674'),
(146, 'NP', '+977'),
(147, 'NL', '+31'),
(148, 'AN', '+599'),
(149, 'NC', '+687'),
(150, 'NZ', '+64'),
(151, 'NI', '+505'),
(152, 'NE', '+227'),
(153, 'NG', '+234'),
(154, 'NU', '+683'),
(155, 'NF', '+672'),
(156, 'MP', '+1-670'),
(157, 'NO', '+47'),
(158, 'OM', '+968'),
(159, 'PK', '+92'),
(160, 'PW', '+680'),
(161, 'PS', '+970'),
(162, 'PA', '+507'),
(163, 'PG', '+675'),
(164, 'PY', '+595'),
(165, 'PE', '+51'),
(166, 'PH', '+63'),
(167, 'PL', '+48'),
(168, 'PT', '+351'),
(169, 'QA', '+974 '),
(170, 'RE', '+262'),
(171, 'RO', '+40'),
(172, 'RU', '+7'),
(173, 'RW', '+250'),
(174, 'SH', '+290'),
(175, 'KN', '+1-869'),
(176, 'LC', '+1-758'),
(177, 'PM', '+508'),
(178, 'VC', '+1-784'),
(179, 'WS', '+685'),
(180, 'SM', '+378'),
(181, 'ST', '+239'),
(182, 'SA', '+966'),
(183, 'SN', '+221'),
(184, 'SC', '+248'),
(185, 'SL', '+232'),
(186, 'SG', '+65'),
(187, 'SK', '+421'),
(188, 'SI', '+386'),
(189, 'SB', '+677'),
(190, 'SO', '+252'),
(191, 'ZA', '+27'),
(192, 'ES', '+34'),
(193, 'LK', '+94'),
(194, 'SD', '+249'),
(195, 'SR', '+597'),
(196, 'SZ', '+268'),
(197, 'SE', '+46'),
(198, 'CH', '+41'),
(199, 'SY', '+963'),
(200, 'TW', '+886'),
(201, 'TJ', '+992'),
(202, 'TZ', '+255'),
(203, 'TH', '+66'),
(204, 'TK', '+690'),
(205, 'TO', '+676'),
(206, 'TT', '+1-868'),
(207, 'TN', '+216'),
(208, 'TR', '+90'),
(209, 'TM', '+993'),
(210, 'TC', '+1-649'),
(211, 'TV', '+688'),
(212, 'UG', '+256'),
(213, 'UA', '+380'),
(214, 'AE', '+971'),
(215, 'GB', '+44'),
(216, 'US', '+1'),
(217, 'UY', '+598'),
(218, 'UZ', '+998'),
(219, 'VU', '+678'),
(220, 'VA', '+418'),
(221, 'VE', '+58'),
(222, 'VN', '+84'),
(223, 'VI', '+1-284'),
(224, 'VQ', '+1-340'),
(225, 'WF', '+681'),
(226, 'YE', '+967'),
(227, 'ZM', '+260'),
(228, 'ZW', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `mem_plans`
--

DROP TABLE IF EXISTS `mem_plans`;
CREATE TABLE IF NOT EXISTS `mem_plans` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `plan_title` varchar(255) DEFAULT NULL,
  `plan_slug` varchar(255) DEFAULT NULL,
  `intervals` varchar(100) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` decimal(65,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_plans`
--

INSERT INTO `mem_plans` (`id`, `plan_title`, `plan_slug`, `intervals`, `duration`, `price`) VALUES
(1, 'Silver Planss', 'silver-planss', 'D', '30', '199.00'),
(2, 'Golden Plan', 'golden-plan', 'D', '90', '750.00'),
(3, 'Short Plan', 'short-plan', 'D', '1', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `my_courses`
--

DROP TABLE IF EXISTS `my_courses`;
CREATE TABLE IF NOT EXISTS `my_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `ord_date` date NOT NULL,
  `duration` int(100) NOT NULL DEFAULT 365,
  `types` varchar(100) NOT NULL DEFAULT 'buy',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `my_courses`
--

INSERT INTO `my_courses` (`id`, `user_id`, `txn_id`, `prod_id`, `status`, `ord_date`, `duration`, `types`) VALUES
(5, '4', '6JM879625X712031U', '6', 1, '2023-04-06', 30, 'buy'),
(4, '1', '1UM76659V19336416', '6', 1, '2023-02-03', 30, 'buy'),
(3, '1', NULL, '5', 1, '0000-00-00', 365, 'subscr');

-- --------------------------------------------------------

--
-- Table structure for table `online_meet_link`
--

DROP TABLE IF EXISTS `online_meet_link`;
CREATE TABLE IF NOT EXISTS `online_meet_link` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `dates` date NOT NULL,
  `times` varchar(100) DEFAULT NULL,
  `appoint_for` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_meet_link`
--

INSERT INTO `online_meet_link` (`id`, `user_id`, `link_url`, `dates`, `times`, `appoint_for`, `status`) VALUES
(8, '4', NULL, '2023-04-20', '15:31', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(100) NOT NULL,
  `ord_date` date NOT NULL,
  `plan_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipn_track_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `product_id`, `user_id`, `txn_id`, `payment_gross`, `currency_code`, `payer_name`, `payer_email`, `status`, `duration`, `ord_date`, `plan_id`, `txn_type`, `ipn_track_id`) VALUES
(7, 0, 1, '3S6470774T179770H', 199.00, 'USD', 'test buyer', 'natta.sanjay-buyer@gmail.com', 'Completed', 1, '2023-02-03', '1', 'subscr_payment', 'f25674008aa9e'),
(8, 0, 1, '33S26528XU5723407', 1.00, 'USD', 'test buyer', 'natta.sanjay-buyer@gmail.com', 'Completed', 1, '2023-02-03', '3', 'subscr_payment', 'f83888828950c'),
(9, 6, 1, '1UM76659V19336416', 30.00, 'USD', 'test buyer', 'natta.sanjay-buyer@gmail.com', 'Completed', 30, '2023-02-03', NULL, 'web_accept', NULL),
(10, 6, 4, '6JM879625X712031U', 30.00, 'USD', 'test buyer', 'natta.sanjay-buyer@gmail.com', 'Completed', 30, '2023-04-06', NULL, 'web_accept', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_notify_test`
--

DROP TABLE IF EXISTS `payment_notify_test`;
CREATE TABLE IF NOT EXISTS `payment_notify_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(100) NOT NULL,
  `ord_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

DROP TABLE IF EXISTS `plan_features`;
CREATE TABLE IF NOT EXISTS `plan_features` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(100) DEFAULT NULL,
  `features` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `features`) VALUES
(1, '1', 'Features 1'),
(2, '1', 'Features 2'),
(3, '1', 'Features 3'),
(10, '1', 'asasdasda'),
(5, '2', 'Features 1'),
(6, '2', 'Features 2'),
(7, '2', 'Features 3'),
(8, '2', 'Features 4'),
(9, '3', 'Features 1'),
(11, '1', 'asdcasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `plan_products`
--

DROP TABLE IF EXISTS `plan_products`;
CREATE TABLE IF NOT EXISTS `plan_products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(100) DEFAULT NULL,
  `plan_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan_products`
--

INSERT INTO `plan_products` (`id`, `prod_id`, `plan_id`) VALUES
(2, '5', '2'),
(3, '3', '2'),
(4, '5', '3'),
(11, '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

DROP TABLE IF EXISTS `policy`;
CREATE TABLE IF NOT EXISTS `policy` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `policy_name` varchar(100) NOT NULL,
  `policy_details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `policy_name`, `policy_details`) VALUES
(1, 'privacy', '&lt;h2&gt;Disclaimer&lt;/h2&gt;\r\n\r\n&lt;p&gt;Disclaimer: As with any business, your results may vary, and will be based on your individual capacity, business experience, expertise, and level of desire. There are no guarantees concerning the level of success you may experience. The testimonials and examples used are exceptional results, which do not apply to the average purchaser, and are not intended to represent or guarantee that anyone will achieve the same or similar results. Each individual&amp;#39;s success depends on his or her background, dedication, desire and motivation. The course is for educational purposes only and there&amp;#39;s a high chance that you could lose money, do not take it as financial advice or a regulated advice. CFDs are complex instruments and come with a high risk of losing money rapidly due to leverage.&amp;nbsp;&lt;strong&gt;75% of retail investor accounts lose money when trading CFDs .&lt;/strong&gt;&amp;nbsp;researchers in the U.S. found that about a third of U.S. day traders between 1992 and 2006 had some level of profitability after costs.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Privacy Policy&lt;/h2&gt;\r\n\r\n&lt;p&gt;This Privacy Policy governs the manner in which the School collects, uses, maintains and discloses information collected from users (each, a &amp;ldquo;Student&amp;rdquo;) of the School. This Privacy Policy applies to the School and all Courses offered by the School.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Personal identification information&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;We may collect personal identification information from Students in a variety of ways, including, but not limited to, when Students enroll in the School or a Course within the School, subscribe to a newsletter, and in connection with other activities, services, features, or resources we make available in our School. Students may visit the School anonymously. We will collect personal identification information from Students only if they voluntarily submit such information to us. Students can refuse to supply personal identification information but doing so may prevent them from engaging in certain School related activities.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;How we use collected information&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;The School may collect and use Students&amp;rsquo; personal identification information for the following purposes:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;em&gt;To improve customer service&lt;/em&gt;&lt;/li&gt;\r\n	&lt;li&gt;Information you provide helps us respond to your customer service requests and support needs more efficiently.&lt;/li&gt;\r\n	&lt;li&gt;&lt;em&gt;To personalize user experience&lt;/em&gt;&lt;/li&gt;\r\n	&lt;li&gt;We may use information in the aggregate to understand how our Students as a group use the services and resources provided in our School.&lt;/li&gt;\r\n	&lt;li&gt;&lt;em&gt;To send periodic emails&lt;/em&gt;&lt;/li&gt;\r\n	&lt;li&gt;We may use Student email addresses to send Students information and updates pertaining to their order. Student email addresses may also be used to respond to Student inquiries, questions, or other requests.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Sharing your personal information&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;We do not sell, trade, or rent Student personal identification information to others.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Third party websites&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Student may find advertising or other content in our School that link to the websites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these websites and are not responsible for the practices employed by websites linked to or from our School. In addition, these websites or services, including their content and links, may be constantly changing. These websites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Student, is subject to that website&amp;#39;s own terms and policies.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Changes to this Privacy Policy&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;The School has the discretion to update this Privacy Policy at any time. We encourage Students to frequently check this page for any changes. You acknowledge and agree that it is your responsibility to review this Privacy Policy periodically and become aware of modifications.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Your acceptance of these terms&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;By enrolling in the School, you signify your acceptance of this Privacy Policy. If you do not agree to this Privacy Policy, please do not enroll in the School. Your continued enrollment in the School following the posting of changes to this Privacy Policy will be deemed your acceptance of those changes.&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_slug` varchar(255) DEFAULT NULL,
  `price` decimal(65,2) NOT NULL,
  `duration` int(100) NOT NULL,
  `descr` text DEFAULT NULL,
  `online_links` varchar(255) DEFAULT NULL,
  `community_access` int(10) NOT NULL DEFAULT 0,
  `saminar_link` varchar(255) DEFAULT NULL,
  `saminar_day` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `prod_slug`, `price`, `duration`, `descr`, `online_links`, `community_access`, `saminar_link`, `saminar_day`) VALUES
(1, '12 weeks mentoring / seminars', '12-weeks-mentoring-seminars', '499.00', 84, '12 online seminars &amp; Community Access + 60 min 1 to 1', NULL, 0, NULL, 0),
(2, 'Complete Course', 'complete-course', '499.00', 30, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\n', NULL, 0, NULL, 0),
(3, 'Compact ', 'compact', '149.00', 30, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, 0, NULL, 0),
(4, 'Complete Mentoring', 'complete-mentoring', '899.00', 84, 'Compact, ebook + online course + 12 online seminars + 60 min 1 to 1', NULL, 0, NULL, 0),
(5, '60 min 1 to 1 Online Seminar', '60-min-1-to-1-online-seminar', '80.00', 30, '60 min 1 to 1', 'yes', 0, NULL, 0),
(6, 'ABO Patreon', 'abo-patreon', '30.00', 30, 'Trades + Community Access, as long as subscribed, if no further product purchase entitles to stay in Discord beta', 'https://discord.com/invite/TGw2xAgnFt', 1, 'https://example.com', 4),
(7, 'ABO  Patreon Plus', 'abo-patreon-plus', '40.00', 30, 'Trades + Community Access, as long as subscribed, if no further product purchase entitles to stay in the Discord beta +10 min 1 to 1', NULL, 0, NULL, 0),
(8, 'sample', 'sample', '800.00', 30, 'ksdbkbsn kdbnf ksn', NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prod_features`
--

DROP TABLE IF EXISTS `prod_features`;
CREATE TABLE IF NOT EXISTS `prod_features` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prod_features`
--

INSERT INTO `prod_features` (`id`, `prod_id`, `name`) VALUES
(5, '3', 'ebook'),
(29, '3', 'Community Access'),
(7, '2', 'Compact Course'),
(8, '2', 'ebook'),
(9, '2', 'Online Course'),
(10, '2', '60 min 1 to 1'),
(11, '1', '12 online seminars'),
(31, '1', 'Community Access'),
(13, '1', '60 min 1 to 1'),
(14, '4', 'Compact Course'),
(15, '4', 'ebook'),
(16, '4', 'online course'),
(17, '4', '12 online seminars'),
(18, '4', '60 min 1 to 1'),
(19, '6', 'Trades'),
(26, '6', 'Community Access'),
(21, '7', 'Trades'),
(27, '7', 'Community Access'),
(23, '5', '60 min 1 to 1 online class'),
(24, '8', 'Feature1'),
(25, '8', 'Feature 2'),
(28, '4', 'Community Access'),
(30, '2', 'Community Access');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terms_all` varchar(100) NOT NULL,
  `terms_details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `terms_all`, `terms_details`) VALUES
(2, 'terms_condition', '&lt;h4&gt;&lt;strong&gt;TERMS &amp;amp; CONDITIONS&lt;/strong&gt;&lt;/h4&gt;\r\n\r\n&lt;p&gt;When booking or browsing through Yourhotel.in, we will assume that you have agreed to comply with all the terms and conditions of our portal.&lt;br /&gt;\r\nThe hotel authorities must see your identity card when taking your room such as voter card, Aadhaar card, driving license or passport and 2 copies of passport size photo.&lt;br /&gt;\r\nIf the child is between the ages of 1-10 years, his birth certificate should be kept with his guardian.&lt;br /&gt;\r\nCharges :&lt;br /&gt;\r\nThe total price displayed on the site includes all applicable government taxes.&lt;br /&gt;\r\nService Charge, Cancellation Charge, Reschedule charge are aplicable.&lt;br /&gt;\r\nModes of payment available at yourhotel.in for online bookings are:&lt;br /&gt;\r\nDirect Bank account transfer, Credit or Debit Cards,Visa, Master, Net Banking , paytm, PhonePe, GooglePay, UPI. are processed through an online payment gateway system.&lt;/p&gt;\r\n\r\n&lt;h4&gt;&lt;strong&gt;Cancellation &amp;amp; Refund:&lt;/strong&gt;&lt;/h4&gt;\r\n\r\n&lt;p&gt;If a hotel has a free cancellation policy, there is no charge for canceling a booking. On the other hand, if a hotel does not have a refund policy, the hotel will charge you something for canceling the booking.&lt;br /&gt;\r\nThere is one charge for one hotel. Please read the individual hotel policy before booking or call the hotel number for details on cancellations. If necessary, you can contact us via email. We will try to solve&lt;br /&gt;\r\nyour problem within 24 hours.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you want to cancel after booking a tour package, your tour is on the scheduled date:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled 30 days in advance, the rest of the money will be refunded after deducting 5% of the total amount.&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled 20 days in advance, the rest of the money will be refunded after deducting 10% of the total amount&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled 15 days in advance, the rest of the money will be refunded after deducting 20% ??of the total amount&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled 7 days in advance, the rest of the money will be refunded after deducting 50% of the total amount&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled 3 day in advance, the rest of the money will be refunded after deducting 80% of the total money&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;If canceled same day , no refund your booking amount.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;You are required to pay the entire amount prior to the confirmation of your booking.&lt;br /&gt;\r\nIf you have canceled your tour packages booking, we will transfer your money within 7-14 working days.&lt;br /&gt;\r\nIf you book a room and then cancel, 2% of your total booked money will be deducted and your balance money refunded within 7-14 working days.&lt;br /&gt;\r\nYour booking confirmation date will be fixed till the check in and check out time of that hotel.&lt;/p&gt;\r\n\r\n&lt;h4&gt;Data Terms&lt;/h4&gt;\r\n\r\n&lt;p&gt;Communication Policy of the Website or Mobile App:&lt;br /&gt;\r\nWhen transacting with this site, you will receive an email from Yourhotel.in to confirm your transaction and booking status . The email will be sent to the email address you provided.&lt;br /&gt;\r\nYourhotel.in is not responsible for not receiving emails in your inbox. Be careful when giving the email id. It is not mandatory to provide SMS service alerts to customers. If you do not&lt;br /&gt;\r\nreceive any SMS for any reason, your hotel.in is not responsible for it. please contact our coustomer support.&lt;/p&gt;\r\n\r\n&lt;p&gt;We may modify our Terms and Condition Policy as required through the website.&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `unsubs_paypal`
--

DROP TABLE IF EXISTS `unsubs_paypal`;
CREATE TABLE IF NOT EXISTS `unsubs_paypal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `same_email` int(10) NOT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unsubs_paypal`
--

INSERT INTO `unsubs_paypal` (`id`, `email`, `same_email`, `dates`, `status`) VALUES
(8, 'natta.sanjay@gmail.com', 1, '2023-04-08 00:14:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isd` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isd`, `phone`, `address`, `city`, `country`, `token`, `status`) VALUES
(1, 'Sanjay Natta', 'natta.sanjay@gmail.com', '$2y$10$svJz74GBoDE.uc7N3apwReeKadCCKqFscPKyJYsIxFA5NGvyqQ96O', '+91', '7063245845', 'Ranjanpalli', 'chakdaha', 'India', NULL, 1),
(2, 'Pritam', 'pm@gmail.com', '$2y$10$F7G8M.t3kCxw0w0FiZGTUOkFgsM21hfdxjtXkUVwutSTfRDaTGmzi', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Amit Kumar', 'wmsn.web@gmail.com', '$2y$10$lehqBXEzaYG.yA5GNJY37ORi.CArrNPawk7eFN2fmPuF7jkWGTgLi', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

DROP TABLE IF EXISTS `user_subscriptions`;
CREATE TABLE IF NOT EXISTS `user_subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'foreign key of "users" table',
  `plan_id` int(5) DEFAULT NULL COMMENT 'foreign key of "plans" table',
  `paypal_subscr_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscr_interval` char(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'D=Days | W=Weeks | M=Months | Y=Years',
  `subscr_interval_count` int(5) DEFAULT NULL,
  `valid_from` datetime NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ipn_track_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'for internal use',
  `plan_status` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_id`, `plan_id`, `paypal_subscr_id`, `txn_id`, `subscr_interval`, `subscr_interval_count`, `valid_from`, `paid_amount`, `payer_name`, `payer_email`, `payment_status`, `ipn_track_id`, `plan_status`) VALUES
(8, 1, 3, 'I-M6HJE2G3DXWH', '33S26528XU5723407', 'D', 1, '2023-02-03 10:53:46', 1.00, 'test buyer', 'natta.sanjay-buyer@gmail.com', 'Completed', 'f83888828950c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(255) DEFAULT NULL,
  `video_title` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `vid_file` varchar(255) DEFAULT NULL,
  `vid_slug` varchar(255) DEFAULT NULL,
  `video_type` varchar(100) DEFAULT NULL,
  `subs_member` int(10) NOT NULL DEFAULT 0,
  `plan_id` varchar(255) DEFAULT NULL,
  `vid_descr` text DEFAULT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `prod_id`, `video_title`, `thumbnail`, `vid_file`, `vid_slug`, `video_type`, `subs_member`, `plan_id`, `vid_descr`, `dates`) VALUES
(8, '4', 'Complete course V1', '2.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'HUI2nM5NwKo90391E8u3y8CSf', 'daily', 0, NULL, NULL, '2023-04-06 13:00:45'),
(3, '6', 'Made for each other', 'trading2.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'WKGF1z65736o81w5Vp6NL7n49', 'daily', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-05 02:19:27'),
(4, '6', 'Made for each other', 'trading3.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'Qy24C3sH421Ae0p78FvNWT16n', 'daily', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-05 02:19:30'),
(5, '6', 'Made for each other', 'trading4.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'G3911YQt7L9ZkM77182aX1r5f', 'daily', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-05 02:21:12'),
(6, '6', 'Weekly 1', 'ask.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'L7T8Y6E04J205747F918W6G0S', 'weekly', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-05 02:21:55'),
(7, '6', 'Weekly 2', 'Top-banner-Image.png', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', '1K3w9X78Gpt2v42EforV5h954', 'weekly', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-05 02:22:37'),
(9, '4', 'ABO vol 1', '6.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', '236d7b7v1p2uD4e3TiK42Y8U4', 'webinar', 0, NULL, NULL, '2023-04-06 16:21:44'),
(10, '6', 'ABO vol 1', '61.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'DE428q7divozs8Upb22154a5f', 'webinar', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-06 16:22:38'),
(11, '6', 'ABO vol 1', '21.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', '5379ha2P895n15ij6S84AT724', 'webinar', 0, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&lt;br&gt;&lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2023-04-06 16:53:11'),
(15, NULL, 'Made for each other', '4.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'G52Q7THS8dX1016YM94RAjVuL', 'weekly', 1, '3', 'dfgdfgdfg', '2023-04-07 00:29:58'),
(14, NULL, 'Complete course V1', '11.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', 'SYw4j7719R6359le197yT456b', 'webinar', 1, '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '2023-04-07 00:28:13'),
(13, NULL, 'ABO vol 1', '1.jpg', 'https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4', '5LD5sh4xMiF27yP8nm119OC2B', 'daily', 1, '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '2023-04-07 00:12:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
