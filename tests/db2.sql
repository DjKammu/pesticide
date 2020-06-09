-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 02:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vip_auction_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Aruba', 'AW'),
(2, 'Afghanistan', 'AF'),
(3, 'Angola', 'AO'),
(4, 'Anguilla', 'AI'),
(5, 'Åland', 'AX'),
(6, 'Albania', 'AL'),
(7, 'Andorra', 'AD'),
(8, 'United Arab Emirates', 'AE'),
(9, 'Argentina', 'AR'),
(10, 'Armenia', 'AM'),
(11, 'American Samoa', 'AS'),
(12, 'Antarctica', 'AQ'),
(13, 'French Southern Territories', 'TF'),
(14, 'Antigua and Barbuda', 'AG'),
(15, 'Australia', 'AU'),
(16, 'Austria', 'AT'),
(17, 'Azerbaijan', 'AZ'),
(18, 'Burundi', 'BI'),
(19, 'Belgium', 'BE'),
(20, 'Benin', 'BJ'),
(21, 'Bonaire', 'BQ'),
(22, 'Burkina Faso', 'BF'),
(23, 'Bangladesh', 'BD'),
(24, 'Bulgaria', 'BG'),
(25, 'Bahrain', 'BH'),
(26, 'Bahamas', 'BS'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Saint Barthélemy', 'BL'),
(29, 'Belarus', 'BY'),
(30, 'Belize', 'BZ'),
(31, 'Bermuda', 'BM'),
(32, 'Bolivia', 'BO'),
(33, 'Brazil', 'BR'),
(34, 'Barbados', 'BB'),
(35, 'Brunei', 'BN'),
(36, 'Bhutan', 'BT'),
(37, 'Bouvet Island', 'BV'),
(38, 'Botswana', 'BW'),
(39, 'Central African Republic', 'CF'),
(40, 'Canada', 'CA'),
(41, 'Cocos [Keeling] Islands', 'CC'),
(42, 'Switzerland', 'CH'),
(43, 'Chile', 'CL'),
(44, 'China', 'CN'),
(45, 'Ivory Coast', 'CI'),
(46, 'Cameroon', 'CM'),
(47, 'Democratic Republic of the Congo', 'CD'),
(48, 'Republic of the Congo', 'CG'),
(49, 'Cook Islands', 'CK'),
(50, 'Colombia', 'CO'),
(51, 'Comoros', 'KM'),
(52, 'Cape Verde', 'CV'),
(53, 'Costa Rica', 'CR'),
(54, 'Cuba', 'CU'),
(55, 'Curacao', 'CW'),
(56, 'Christmas Island', 'CX'),
(57, 'Cayman Islands', 'KY'),
(58, 'Cyprus', 'CY'),
(59, 'Czech Republic', 'CZ'),
(60, 'Germany', 'DE'),
(61, 'Djibouti', 'DJ'),
(62, 'Dominica', 'DM'),
(63, 'Denmark', 'DK'),
(64, 'Dominican Republic', 'DO'),
(65, 'Algeria', 'DZ'),
(66, 'Ecuador', 'EC'),
(67, 'Egypt', 'EG'),
(68, 'Eritrea', 'ER'),
(69, 'Western Sahara', 'EH'),
(70, 'Spain', 'ES'),
(71, 'Estonia', 'EE'),
(72, 'Ethiopia', 'ET'),
(73, 'Finland', 'FI'),
(74, 'Fiji', 'FJ'),
(75, 'Falkland Islands', 'FK'),
(76, 'France', 'FR'),
(77, 'Faroe Islands', 'FO'),
(78, 'Micronesia', 'FM'),
(79, 'Gabon', 'GA'),
(80, 'United Kingdom', 'GB'),
(81, 'Georgia', 'GE'),
(82, 'Guernsey', 'GG'),
(83, 'Ghana', 'GH'),
(84, 'Gibraltar', 'GI'),
(85, 'Guinea', 'GN'),
(86, 'Guadeloupe', 'GP'),
(87, 'Gambia', 'GM'),
(88, 'Guinea-Bissau', 'GW'),
(89, 'Equatorial Guinea', 'GQ'),
(90, 'Greece', 'GR'),
(91, 'Grenada', 'GD'),
(92, 'Greenland', 'GL'),
(93, 'Guatemala', 'GT'),
(94, 'French Guiana', 'GF'),
(95, 'Guam', 'GU'),
(96, 'Guyana', 'GY'),
(97, 'Hong Kong', 'HK'),
(98, 'Heard Island and McDonald Islands', 'HM'),
(99, 'Honduras', 'HN'),
(100, 'Croatia', 'HR'),
(101, 'Haiti', 'HT'),
(102, 'Hungary', 'HU'),
(103, 'Indonesia', 'ID'),
(104, 'Isle of Man', 'IM'),
(105, 'India', 'IN'),
(106, 'British Indian Ocean Territory', 'IO'),
(107, 'Ireland', 'IE'),
(108, 'Iran', 'IR'),
(109, 'Iraq', 'IQ'),
(110, 'Iceland', 'IS'),
(111, 'Israel', 'IL'),
(112, 'Italy', 'IT'),
(113, 'Jamaica', 'JM'),
(114, 'Jersey', 'JE'),
(115, 'Jordan', 'JO'),
(116, 'Japan', 'JP'),
(117, 'Kazakhstan', 'KZ'),
(118, 'Kenya', 'KE'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Cambodia', 'KH'),
(121, 'Kiribati', 'KI'),
(122, 'Saint Kitts and Nevis', 'KN'),
(123, 'South Korea', 'KR'),
(124, 'Kuwait', 'KW'),
(125, 'Laos', 'LA'),
(126, 'Lebanon', 'LB'),
(127, 'Liberia', 'LR'),
(128, 'Libya', 'LY'),
(129, 'Saint Lucia', 'LC'),
(130, 'Liechtenstein', 'LI'),
(131, 'Sri Lanka', 'LK'),
(132, 'Lesotho', 'LS'),
(133, 'Lithuania', 'LT'),
(134, 'Luxembourg', 'LU'),
(135, 'Latvia', 'LV'),
(136, 'Macao', 'MO'),
(137, 'Saint Martin', 'MF'),
(138, 'Morocco', 'MA'),
(139, 'Monaco', 'MC'),
(140, 'Moldova', 'MD'),
(141, 'Madagascar', 'MG'),
(142, 'Maldives', 'MV'),
(143, 'Mexico', 'MX'),
(144, 'Marshall Islands', 'MH'),
(145, 'Macedonia', 'MK'),
(146, 'Mali', 'ML'),
(147, 'Malta', 'MT'),
(148, 'Myanmar [Burma]', 'MM'),
(149, 'Montenegro', 'ME'),
(150, 'Mongolia', 'MN'),
(151, 'Northern Mariana Islands', 'MP'),
(152, 'Mozambique', 'MZ'),
(153, 'Mauritania', 'MR'),
(154, 'Montserrat', 'MS'),
(155, 'Martinique', 'MQ'),
(156, 'Mauritius', 'MU'),
(157, 'Malawi', 'MW'),
(158, 'Malaysia', 'MY'),
(159, 'Mayotte', 'YT'),
(160, 'Namibia', 'NA'),
(161, 'New Caledonia', 'NC'),
(162, 'Niger', 'NE'),
(163, 'Norfolk Island', 'NF'),
(164, 'Nigeria', 'NG'),
(165, 'Nicaragua', 'NI'),
(166, 'Niue', 'NU'),
(167, 'Netherlands', 'NL'),
(168, 'Norway', 'NO'),
(169, 'Nepal', 'NP'),
(170, 'Nauru', 'NR'),
(171, 'New Zealand', 'NZ'),
(172, 'Oman', 'OM'),
(173, 'Pakistan', 'PK'),
(174, 'Panama', 'PA'),
(175, 'Pitcairn Islands', 'PN'),
(176, 'Peru', 'PE'),
(177, 'Philippines', 'PH'),
(178, 'Palau', 'PW'),
(179, 'Papua New Guinea', 'PG'),
(180, 'Poland', 'PL'),
(181, 'Puerto Rico', 'PR'),
(182, 'North Korea', 'KP'),
(183, 'Portugal', 'PT'),
(184, 'Paraguay', 'PY'),
(185, 'Palestine', 'PS'),
(186, 'French Polynesia', 'PF'),
(187, 'Qatar', 'QA'),
(188, 'Réunion', 'RE'),
(189, 'Romania', 'RO'),
(190, 'Russia', 'RU'),
(191, 'Rwanda', 'RW'),
(192, 'Saudi Arabia', 'SA'),
(193, 'Sudan', 'SD'),
(194, 'Senegal', 'SN'),
(195, 'Singapore', 'SG'),
(196, 'South Georgia and the South Sandwich Islands', 'GS'),
(197, 'Saint Helena', 'SH'),
(198, 'Svalbard and Jan Mayen', 'SJ'),
(199, 'Solomon Islands', 'SB'),
(200, 'Sierra Leone', 'SL'),
(201, 'El Salvador', 'SV'),
(202, 'San Marino', 'SM'),
(203, 'Somalia', 'SO'),
(204, 'Saint Pierre and Miquelon', 'PM'),
(205, 'Serbia', 'RS'),
(206, 'South Sudan', 'SS'),
(207, 'São Tomé and Príncipe', 'ST'),
(208, 'Suriname', 'SR'),
(209, 'Slovakia', 'SK'),
(210, 'Slovenia', 'SI'),
(211, 'Sweden', 'SE'),
(212, 'Swaziland', 'SZ'),
(213, 'Sint Maarten', 'SX'),
(214, 'Seychelles', 'SC'),
(215, 'Syria', 'SY'),
(216, 'Turks and Caicos Islands', 'TC'),
(217, 'Chad', 'TD'),
(218, 'Togo', 'TG'),
(219, 'Thailand', 'TH'),
(220, 'Tajikistan', 'TJ'),
(221, 'Tokelau', 'TK'),
(222, 'Turkmenistan', 'TM'),
(223, 'East Timor', 'TL'),
(224, 'Tonga', 'TO'),
(225, 'Trinidad and Tobago', 'TT'),
(226, 'Tunisia', 'TN'),
(227, 'Turkey', 'TR'),
(228, 'Tuvalu', 'TV'),
(229, 'Taiwan', 'TW'),
(230, 'Tanzania', 'TZ'),
(231, 'Uganda', 'UG'),
(232, 'Ukraine', 'UA'),
(233, 'U.S. Minor Outlying Islands', 'UM'),
(234, 'Uruguay', 'UY'),
(235, 'United States', 'US'),
(236, 'Uzbekistan', 'UZ'),
(237, 'Vatican City', 'VA'),
(238, 'Saint Vincent and the Grenadines', 'VC'),
(239, 'Venezuela', 'VE'),
(240, 'British Virgin Islands', 'VG'),
(241, 'U.S. Virgin Islands', 'VI'),
(242, 'Vietnam', 'VN'),
(243, 'Vanuatu', 'VU'),
(244, 'Wallis and Futuna', 'WF'),
(245, 'Samoa', 'WS'),
(246, 'Kosovo', 'XK'),
(247, 'Yemen', 'YE'),
(248, 'South Africa', 'ZA'),
(249, 'Zambia', 'ZM'),
(250, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 5, 'avatars', 'logo', 'logo.png', 'image/png', 'public', 52662, '[]', '[]', '[]', 1, '2019-12-09 23:19:21', '2019-12-09 23:19:21'),
(3, 'App\\User', 6, 'avatars', 'logo', 'logo.jpg', 'image/jpeg', 'public', 137270, '[]', '[]', '[]', 2, '2019-12-10 07:53:08', '2019-12-10 07:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `languages` text COLLATE utf8mb4_unicode_ci,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breast_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eye_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hair_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desirable_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` longtext COLLATE utf8mb4_unicode_ci,
  `medical_checkup` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `user_id`, `country`, `number`, `dob`, `languages`, `currency`, `height`, `weight`, `breast_size`, `eye_color`, `hair_color`, `desirable_amount`, `about_me`, `medical_checkup`, `created_at`, `updated_at`) VALUES
(16, 5, 'AW', 9784033571, '1993-03-01', '[\"English\"]', 'USD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 05:06:56', '2019-12-10 05:06:56'),
(17, 6, 'AW', 9784033571, '1970-01-01', '[\"English\"]', NULL, 'Not selected', 'Not selected', 'Not selected', 'Not selected', 'Not selected', '9784033571', NULL, NULL, '2019-12-10 07:49:11', '2019-12-10 07:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
