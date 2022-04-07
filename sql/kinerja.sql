-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2022 at 09:27 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `360`
--

CREATE TABLE `360` (
  `id_form_360` int(15) NOT NULL,
  `id_karyawan` int(15) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `id_karyawan_penilai` int(15) DEFAULT NULL,
  `id_pertanyaan` int(15) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `masukan` varchar(255) DEFAULT NULL,
  `kode_form` varchar(255) DEFAULT NULL,
  `jenis_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_activity_log`
--

CREATE TABLE `ci_activity_log` (
  `id` int(11) NOT NULL,
  `activity_id` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_activity_log`
--

INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES
(1, 1, 0, 25, '2019-11-27 06:00:00'),
(2, 2, 0, 26, '2019-11-27 06:00:00'),
(3, 1, 0, 31, '2019-11-25 09:33:27'),
(4, 5, 0, 31, '2019-11-25 09:40:35'),
(5, 7, 0, 31, '2019-11-26 09:19:45'),
(6, 7, 0, 31, '2019-11-26 09:41:48'),
(7, 7, 0, 31, '2019-11-26 09:42:50'),
(8, 7, 0, 31, '2019-11-26 09:43:42'),
(9, 3, 0, 31, '2021-06-06 18:21:32'),
(10, 1, 0, 31, '2021-06-07 18:47:38'),
(11, 4, 0, 31, '2021-06-27 08:50:06'),
(12, 6, 0, 25, '2021-06-27 10:35:53'),
(13, 6, 0, 25, '2021-06-27 10:35:58'),
(14, 6, 0, 25, '2021-06-27 10:36:01'),
(15, 5, 0, 31, '2021-07-04 15:57:47'),
(16, 6, 0, 31, '2021-07-04 15:57:53'),
(17, 6, 0, 31, '2021-07-04 15:57:57'),
(18, 6, 0, 31, '2021-07-04 15:58:04'),
(19, 5, 0, 31, '2021-07-04 15:58:31'),
(20, 5, 0, 2, '2022-02-27 04:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `ci_activity_status`
--

CREATE TABLE `ci_activity_status` (
  `id` int(11) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_activity_status`
--

INSERT INTO `ci_activity_status` (`id`, `description`) VALUES
(1, 'User Created'),
(2, 'User Edited'),
(3, 'User Deleted'),
(4, 'Admin Created'),
(5, 'Admin Edited'),
(6, 'Admin Deleted'),
(7, 'Invoice Created'),
(8, 'Invoice Edited'),
(9, 'Invoice Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

CREATE TABLE `ci_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_supper` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_supper`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'superadmin', 'Ade', 'Jonatan', 'adejonatan@gmail.com', '082299465250', '', '$2y$10$cOTKTWhWOrWzDXldeXZKf.uxdCZLyYfftM8mSz3z63dBaTPJSXytO', '0000-00-00 00:00:00', 1, 1, 1, 1, '', '', '', '2019-01-16 06:01:58', '2021-07-04 00:00:00'),
(2, 2, 'admin', 'Ade', 'Yonatan', 'adeyonatan@gmail.com', '085156460250', '', '$2y$10$oVZjdXSQenXixfNog61Ui.GhzS1D6LJeaAPJr7LENxP7//F.3RR7e', '2019-01-09 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2022-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin_roles`
--

CREATE TABLE `ci_admin_roles` (
  `admin_role_id` int(11) NOT NULL,
  `admin_role_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin_role_status` int(11) NOT NULL,
  `admin_role_created_by` int(1) NOT NULL,
  `admin_role_created_on` datetime NOT NULL,
  `admin_role_modified_by` int(11) NOT NULL,
  `admin_role_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin_roles`
--

INSERT INTO `ci_admin_roles` (`admin_role_id`, `admin_role_title`, `admin_role_status`, `admin_role_created_by`, `admin_role_created_on`, `admin_role_modified_by`, `admin_role_modified_on`) VALUES
(1, 'Super Admin', 1, 0, '2018-03-15 12:48:04', 0, '2018-03-17 12:53:16'),
(2, 'Admin', 1, 0, '2018-03-15 12:53:19', 0, '2019-01-26 08:27:34'),
(3, 'HRD', 1, 0, '2021-06-27 08:49:22', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_general_settings`
--

CREATE TABLE `ci_general_settings` (
  `id` int(11) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `default_language` int(11) NOT NULL,
  `copyright` tinytext DEFAULT NULL,
  `email_from` varchar(100) NOT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `recaptcha_site_key` varchar(255) DEFAULT NULL,
  `recaptcha_lang` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_general_settings`
--

INSERT INTO `ci_general_settings` (`id`, `favicon`, `logo`, `application_name`, `timezone`, `currency`, `default_language`, `copyright`, `email_from`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `facebook_link`, `twitter_link`, `google_link`, `youtube_link`, `linkedin_link`, `instagram_link`, `recaptcha_secret_key`, `recaptcha_site_key`, `recaptcha_lang`, `created_date`, `updated_date`) VALUES
(1, 'assets/img/854f3427a0f2522a4c4ac9846580bc65.jpg', 'assets/img/854f3427a0f2522a4c4ac9846580bc65.jpg', 'Assessment Center', 'Asia/Jakarta', 'RP', 2, 'PINC Group @ 2021', 'info@domain.com', 'smtp.domain.com', 567, 'info@domain.com', '123456789', 'https://facebook.com', 'https://twitter.com', 'https://google.com', 'https://youtube.com', 'https://linkedin.com', 'https://instagram.com', '', '', 'en', '2021-07-04 00:00:00', '2021-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_language`
--

CREATE TABLE `ci_language` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_language`
--

INSERT INTO `ci_language` (`id`, `name`, `short_name`, `status`, `created_at`) VALUES
(2, 'English', 'en', 1, '2019-09-16 01:13:17'),
(3, 'French', 'fr', 1, '2019-09-16 08:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.com', '12345', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '27 new jersey - Level 58 - CA 444 \r\nUnited State ', 1, 1, 1, 1, '', '', '', '2017-09-29 10:09:44', '2017-12-14 10:12:41'),
(32, 'user', 'user', 'user', 'user@user.com', '44897866462', '$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS', '', 1, 1, 1, 0, '352fe25daf686bdb4edca223c921acea', '', '', '2018-04-24 07:04:07', '2019-01-26 03:01:30'),
(33, 'john123', 'john', 'smith', 'johnsmith@gmail.com', '445889654656', '$2y$10$CcBiQrcW597s5muOP2blhOev48gzBv2VvAVp83NsXbLo7cZM7tjGm', 'USA', 7, 1, 0, 0, '', '', '', '2018-04-25 06:04:25', '2019-01-24 04:01:33'),
(38, 'john', 'smith', 'johan', 'johnsmith@gmail.com', '123456', '$2y$10$5wXvKkhMTEatZ7aUHE/RU.lQbeXdURME8Br9Noxn802epBPoFz7wu', 'asdfdasfdsfds', 1, 1, 0, 0, '', '', '', '2019-07-15 09:07:24', '2019-07-15 09:07:24'),
(41, 'Muhamad Idris', 'Muhamad', 'Idris', 'idris@itpln.ac.id', '085719211998', '$2y$10$Xv06SKm3T916GDFaxIh7xeBKwxL2wHeLL80A2wcByb6RrmEvaLW.a', 'Duri Kosambi', 1, 1, 0, 0, '', '', '', '2021-06-07 00:00:00', '2021-06-07 00:00:00'),
(40, 'techesprit', 'zain', 'khan', 'zain@gmail.com', '03004596000', '$2y$10$UbljVrMhHmqRYhJBumzmVOfXYmaOeZRMAEkBn0uF68Nj3VL4ACiHC', '111asdfasd', 1, 1, 0, 0, '', '', '', '2019-11-25 00:00:00', '2019-11-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(5) NOT NULL,
  `kode_departemen` varchar(255) DEFAULT NULL,
  `nama_departemen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `kode_departemen`, `nama_departemen`) VALUES
(1, '1', 'FINANCE & ACCOUNTING'),
(2, '2', 'DIREKSI'),
(3, '3', 'DESIGN'),
(4, '4', 'PAN DIGITAL'),
(5, '5', 'Direksi'),
(6, '6', 'DIREKSI'),
(7, '7', 'Master Budget PAN'),
(8, '8', 'Master Budget PMA'),
(9, '9', 'Master Budget W3P'),
(10, '10', 'GA'),
(11, '11', 'GA'),
(12, '12', 'ACCOUNT'),
(13, '13', 'KOL MANAGEMENT'),
(14, '14', 'ACCOUNT'),
(15, '15', 'GA'),
(16, '16', 'IT'),
(17, '17', 'HRGA'),
(18, '18', 'KEUANGAN'),
(19, '19', 'DIREKSI'),
(20, '20', 'SENIOR PARTNER'),
(21, '21', 'PARTNER'),
(22, '22', 'SUPPORT'),
(23, '23', 'STRATEGIC PLANNING'),
(24, '24', 'STRATEGIC PLANNING'),
(25, '25', 'INDOSAT - ACCOUNT B2B'),
(26, '26', 'INDOSAT - CREATIVE B2B'),
(27, '27', 'INDOSAT - SOCIAL MEDIA B2B'),
(28, '28', 'INDOSAT - ACCOUNT DIGITAL'),
(29, '29', 'INDOSAT - CREATVIE DIGITAL'),
(30, '30', 'INDOSAT - CREATIVE B2C'),
(31, '31', 'INDOSAT - ACCOUNT B2C'),
(32, '32', 'INDOSAT - SOCIAL MEDIA'),
(33, '33', 'INDOSAT - CREATIVE'),
(34, '34', 'FINANCE'),
(35, '35', 'FINANCE'),
(36, '36', 'PINC'),
(37, '37', 'PRODUCTION'),
(38, '38', 'PAN-MULTI'),
(39, '39', 'PAN-TRI'),
(40, '40', 'IT'),
(41, '41', 'MULTIBRAND'),
(42, '42', 'BOD'),
(43, '43', 'HUMAN RESOURCE'),
(44, '44', 'GA/IT & PROCUREMENT'),
(45, '45', 'FIELD MARKETING'),
(46, '46', 'PRODUCTION'),
(47, '47', 'DESIGN'),
(48, '48', 'INDOSAT - DIGITAL'),
(49, '49', 'DIREKSI'),
(50, '50', 'PAN 2'),
(51, '51', 'PAN 4'),
(52, '52', 'Keuangan'),
(53, '53', 'Traffic'),
(54, '54', 'PAN-TRI'),
(55, '55', 'PAN'),
(56, '56', 'DIGITAL'),
(57, '57', 'Creative'),
(58, '58', 'Direksi'),
(59, '59', 'Creative');

-- --------------------------------------------------------

--
-- Table structure for table `departemen_old`
--

CREATE TABLE `departemen_old` (
  `id` int(5) NOT NULL,
  `kode_departemen` varchar(255) DEFAULT NULL,
  `nama_departemen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen_old`
--

INSERT INTO `departemen_old` (`id`, `kode_departemen`, `nama_departemen`) VALUES
(1, '3', 'FINANCE & ACCOUNTING'),
(2, '10', 'DIREKSI'),
(3, '3', 'DESIGN'),
(4, '40', 'PAN DIGITAL'),
(5, '10', 'Direksi'),
(6, '10', 'DIREKSI'),
(7, '0', 'Master Budget PAN'),
(8, '0', 'Master Budget PMA'),
(9, '0', 'Master Budget W3P'),
(10, '55', 'GA'),
(11, '55', 'GA'),
(12, '20', 'ACCOUNT'),
(13, '4', 'KOL MANAGEMENT'),
(14, '20', 'ACCOUNT'),
(15, '55', 'GA'),
(16, '56', 'IT'),
(17, '57', 'HRGA'),
(18, '53', 'KEUANGAN'),
(19, '10', 'DIREKSI'),
(20, '91', 'SENIOR PARTNER'),
(21, '92', 'PARTNER'),
(22, '93', 'SUPPORT'),
(23, '66', 'STRATEGIC PLANNING'),
(24, '66', 'STRATEGIC PLANNING'),
(25, '91', 'INDOSAT - ACCOUNT B2B'),
(26, '92', 'INDOSAT - CREATIVE B2B'),
(27, '93', 'INDOSAT - SOCIAL MEDIA B2B'),
(28, '94', 'INDOSAT - ACCOUNT DIGITAL'),
(29, '95', 'INDOSAT - CREATVIE DIGITAL'),
(30, '96', 'INDOSAT - CREATIVE B2C'),
(31, '97', 'INDOSAT - ACCOUNT B2C'),
(32, '98', 'INDOSAT - SOCIAL MEDIA'),
(33, '99', 'INDOSAT - CREATIVE'),
(34, '52', 'FINANCE'),
(35, '52', 'FINANCE'),
(36, '87', 'PINC'),
(37, '94', 'PRODUCTION'),
(38, '67', 'PAN-MULTI'),
(39, '68', 'PAN-TRI'),
(40, '56', 'IT'),
(41, '67', 'MULTIBRAND'),
(42, '1', 'BOD'),
(43, '2', 'HUMAN RESOURCE'),
(44, '4', 'GA/IT & PROCUREMENT'),
(45, '5', 'FIELD MARKETING'),
(46, '6', 'PRODUCTION'),
(47, '7', 'DESIGN'),
(48, '90', 'INDOSAT - DIGITAL'),
(49, '10', 'DIREKSI'),
(50, '21', 'PAN 2'),
(51, '22', 'PAN 4'),
(52, '53', 'Keuangan'),
(53, '54', 'Traffic'),
(54, '55', 'GA'),
(55, '23', 'PAN'),
(56, '24', 'DIGITAL'),
(57, '30', 'Creative'),
(58, '10', 'Direksi'),
(59, '30', 'Creative');

-- --------------------------------------------------------

--
-- Table structure for table `final_appraisal`
--

CREATE TABLE `final_appraisal` (
  `id_final_appraisal` int(15) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `next_action` varchar(255) DEFAULT NULL,
  `increstmen` varchar(255) DEFAULT NULL,
  `id_karyawan` int(15) DEFAULT NULL,
  `tgl_input` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_360`
--

CREATE TABLE `form_360` (
  `id_form_360` int(15) NOT NULL,
  `inisial` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `rekan` varchar(255) DEFAULT NULL,
  `id_pertanyaan` int(15) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `masukan` varchar(255) DEFAULT NULL,
  `kode_form` varchar(255) DEFAULT NULL,
  `jenis_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_360`
--

INSERT INTO `form_360` (`id_form_360`, `inisial`, `posisi`, `team`, `tgl_appraisal`, `rekan`, `id_pertanyaan`, `nilai`, `masukan`, `kode_form`, `jenis_form`) VALUES
(1, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-02-27', 'ASL', 3, '4', '', '2022-03-01ALXASL', '360'),
(2, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-02-27', 'ASL', 4, '4', '', '2022-03-01ALXASL', '360'),
(3, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-02-27', 'ASL', 5, '4', '', '2022-03-01ALXASL', '360'),
(4, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-02-27', 'ASL', 6, '4', '', '2022-03-01ALXASL', '360'),
(5, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-02-27', 'ASL', 7, '4', '', '2022-03-01ALXASL', '360'),
(6, 'SPS', 'GRAPHIC DESIGNER', 'GA', '2022-03-01', 'MWD', 3, '5', '', '2022-03-01SPSMWD', '360'),
(7, 'SPS', 'GRAPHIC DESIGNER', 'GA', '2022-03-01', 'MWD', 4, '3', '', '2022-03-01SPSMWD', '360'),
(8, 'SPS', 'GRAPHIC DESIGNER', 'GA', '2022-03-01', 'MWD', 5, '3.5', '', '2022-03-01SPSMWD', '360'),
(9, 'SPS', 'GRAPHIC DESIGNER', 'GA', '2022-03-01', 'MWD', 6, '4', '', '2022-03-01SPSMWD', '360'),
(10, 'SPS', 'GRAPHIC DESIGNER', 'GA', '2022-03-01', 'MWD', 7, '5', '', '2022-03-01SPSMWD', '360'),
(11, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-01', 'EDL', 3, '5', '', '2022-03-01AMLEDL', '360'),
(12, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-01', 'EDL', 4, '5', '', '2022-03-01AMLEDL', '360'),
(13, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-01', 'EDL', 5, '5', '', '2022-03-01AMLEDL', '360'),
(14, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-01', 'EDL', 6, '5', '', '2022-03-01AMLEDL', '360'),
(15, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-01', 'EDL', 7, '5', '', '2022-03-01AMLEDL', '360'),
(16, 'APW', 'IT SUPPORT', 'IT', '2022-03-01', 'AJO', 3, '4', '', '2022-03-01APWAJO', '360'),
(17, 'APW', 'IT SUPPORT', 'IT', '2022-03-01', 'AJO', 4, '4', '', '2022-03-01APWAJO', '360'),
(18, 'APW', 'IT SUPPORT', 'IT', '2022-03-01', 'AJO', 5, '4', '', '2022-03-01APWAJO', '360'),
(19, 'APW', 'IT SUPPORT', 'IT', '2022-03-01', 'AJO', 6, '4', '', '2022-03-01APWAJO', '360'),
(20, 'APW', 'IT SUPPORT', 'IT', '2022-03-01', 'AJO', 7, '4', '', '2022-03-01APWAJO', '360'),
(21, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'LNH', 3, '2.5', 'Harus lebih banyak mengenal hal baru dan belajar mau tau ', '2022-03-01APWLNH', '360'),
(22, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'LNH', 4, '2', 'Harus lebih banyak mengenal hal baru dan belajar mau tau ', '2022-03-01APWLNH', '360'),
(23, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'LNH', 5, '4', 'Harus lebih banyak mengenal hal baru dan belajar mau tau ', '2022-03-01APWLNH', '360'),
(24, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'LNH', 6, '2', 'Harus lebih banyak mengenal hal baru dan belajar mau tau ', '2022-03-01APWLNH', '360'),
(25, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'LNH', 7, '3', 'Harus lebih banyak mengenal hal baru dan belajar mau tau ', '2022-03-01APWLNH', '360'),
(26, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'GTA', 3, '3.5', 'tingkatkan lagi kemampuan komunikasi juga kepercayaan diri dalam diskusi group dan saat presentasi. adi memiliki potensi yg baik.', '2022-03-01APWGTA', '360'),
(27, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'GTA', 4, '3.5', 'tingkatkan lagi kemampuan komunikasi juga kepercayaan diri dalam diskusi group dan saat presentasi. adi memiliki potensi yg baik.', '2022-03-01APWGTA', '360'),
(28, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'GTA', 5, '3.7', 'tingkatkan lagi kemampuan komunikasi juga kepercayaan diri dalam diskusi group dan saat presentasi. adi memiliki potensi yg baik.', '2022-03-01APWGTA', '360'),
(29, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'GTA', 6, '3.5', 'tingkatkan lagi kemampuan komunikasi juga kepercayaan diri dalam diskusi group dan saat presentasi. adi memiliki potensi yg baik.', '2022-03-01APWGTA', '360'),
(30, 'APW', 'IT SUPPORT', 'IT', '2022-03-02', 'GTA', 7, '3.8', 'tingkatkan lagi kemampuan komunikasi juga kepercayaan diri dalam diskusi group dan saat presentasi. adi memiliki potensi yg baik.', '2022-03-01APWGTA', '360'),
(31, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-02', 'YRA', 3, '3', '', '2022-03-01ADFYRA', '360'),
(32, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-02', 'YRA', 4, '3', '', '2022-03-01ADFYRA', '360'),
(33, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-02', 'YRA', 5, '3', '', '2022-03-01ADFYRA', '360'),
(34, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-02', 'YRA', 6, '3', '', '2022-03-01ADFYRA', '360'),
(35, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-02', 'YRA', 7, '3', '', '2022-03-01ADFYRA', '360'),
(36, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-02', 'MFK', 3, '4', '', '2022-03-01ALXMFK', '360'),
(37, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-02', 'MFK', 4, '5', '', '2022-03-01ALXMFK', '360'),
(38, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-02', 'MFK', 5, '4', '', '2022-03-01ALXMFK', '360'),
(39, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-02', 'MFK', 6, '4', '', '2022-03-01ALXMFK', '360'),
(40, 'ALX', 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-02', 'MFK', 7, '4', '', '2022-03-01ALXMFK', '360'),
(41, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-04', 'SAD', 3, '4', '', '2022-03-01ADFSAD', '360'),
(42, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-04', 'SAD', 4, '4', '', '2022-03-01ADFSAD', '360'),
(43, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-04', 'SAD', 5, '5', '', '2022-03-01ADFSAD', '360'),
(44, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-04', 'SAD', 6, '4', '', '2022-03-01ADFSAD', '360'),
(45, 'ADF', 'TRAFFIC & PRODUCTION EXECUTIVE', 'PAN-TRI', '2022-03-04', 'SAD', 7, '5', '', '2022-03-01ADFSAD', '360'),
(46, 'MHU', 'ACCOUNT MANAGER', 'GA', '2022-03-04', 'SAD', 3, '5', '', '2022-03-01MHUSAD', '360'),
(47, 'MHU', 'ACCOUNT MANAGER', 'GA', '2022-03-04', 'SAD', 4, '5', '', '2022-03-01MHUSAD', '360'),
(48, 'MHU', 'ACCOUNT MANAGER', 'GA', '2022-03-04', 'SAD', 5, '5', '', '2022-03-01MHUSAD', '360'),
(49, 'MHU', 'ACCOUNT MANAGER', 'GA', '2022-03-04', 'SAD', 6, '5', '', '2022-03-01MHUSAD', '360'),
(50, 'MHU', 'ACCOUNT MANAGER', 'GA', '2022-03-04', 'SAD', 7, '5', '', '2022-03-01MHUSAD', '360'),
(51, 'ADP', 'GRAPHIC DESIGNER', 'Creative', '2022-03-04', 'CGE', 3, '5', 'Stay strong.', '2022-03-01ADPCGE', '360'),
(52, 'ADP', 'GRAPHIC DESIGNER', 'Creative', '2022-03-04', 'CGE', 4, '5', 'Stay strong.', '2022-03-01ADPCGE', '360'),
(53, 'ADP', 'GRAPHIC DESIGNER', 'Creative', '2022-03-04', 'CGE', 5, '5', 'Stay strong.', '2022-03-01ADPCGE', '360'),
(54, 'ADP', 'GRAPHIC DESIGNER', 'Creative', '2022-03-04', 'CGE', 6, '4', 'Stay strong.', '2022-03-01ADPCGE', '360'),
(55, 'ADP', 'GRAPHIC DESIGNER', 'Creative', '2022-03-04', 'CGE', 7, '5', 'Stay strong.', '2022-03-01ADPCGE', '360'),
(56, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-07', 'SMT', 3, '5', 'Amanda shows that her experience goes a long way in her performance as a client servicing team. She shows great leadership and organizational skills that is imperative to her job. On top of that, her strategic thinking is also good despite this not being ', '2022-03-01AMLSMT', '360'),
(57, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-07', 'SMT', 4, '4', 'Amanda shows that her experience goes a long way in her performance as a client servicing team. She shows great leadership and organizational skills that is imperative to her job. On top of that, her strategic thinking is also good despite this not being ', '2022-03-01AMLSMT', '360'),
(58, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-07', 'SMT', 5, '4', 'Amanda shows that her experience goes a long way in her performance as a client servicing team. She shows great leadership and organizational skills that is imperative to her job. On top of that, her strategic thinking is also good despite this not being ', '2022-03-01AMLSMT', '360'),
(59, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-07', 'SMT', 6, '5', 'Amanda shows that her experience goes a long way in her performance as a client servicing team. She shows great leadership and organizational skills that is imperative to her job. On top of that, her strategic thinking is also good despite this not being ', '2022-03-01AMLSMT', '360'),
(60, 'AML', 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-07', 'SMT', 7, '5', 'Amanda shows that her experience goes a long way in her performance as a client servicing team. She shows great leadership and organizational skills that is imperative to her job. On top of that, her strategic thinking is also good despite this not being ', '2022-03-01AMLSMT', '360');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(5) NOT NULL,
  `kode_golongan` varchar(255) DEFAULT NULL,
  `nama_golongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `kode_golongan`, `nama_golongan`) VALUES
(1, '6', 'A'),
(2, '7', 'B1'),
(3, '8', 'B2'),
(4, '9', 'C1'),
(5, '10', 'C2'),
(6, '11', 'D1'),
(7, '12', 'E'),
(8, '13', 'F'),
(9, '18', 'D2');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(5) NOT NULL,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`) VALUES
(5, '5', 'HRGA STAFF'),
(6, '6', 'ACCOUNT EXECUTIVE'),
(13, '13', 'SENIOR ACCOUNT EXECUTIVE'),
(14, '14', 'ACCOUNT MANAGER'),
(15, '15', 'SENIOR ACCOUNT MANAGER'),
(16, '16', 'ASSOCIATE ACCOUNT DIRECTOR'),
(17, '17', 'ACCOUNT DIRECTOR'),
(18, '18', 'BUSINESS DIRECTOR'),
(19, '19', 'CHIEF OPERATING OFFICER'),
(20, '20', 'CHIEF FINANCE OFFICER'),
(21, '21', 'CHIEF EXECUTIVE OFFICER'),
(22, '22', 'CHIEF CREATIVE OFFICER'),
(23, '23', 'DEPUTY CFO'),
(24, '24', 'ART DIRECTOR'),
(25, '25', 'SENIOR ART DIRECTOR'),
(26, '26', 'COPYWRITER'),
(27, '27', 'SENIOR COPYWRITER'),
(28, '28', 'GRAPHIC DESIGNER'),
(29, '29', 'SENIOR GRAPHIC DESIGNER'),
(30, '30', 'CREATIVE GROUP HEAD'),
(31, '31', 'SENIOR CREATIVE GROUP HEAD'),
(32, '32', 'ASSOCIATE CREATIVE DIRECTOR'),
(33, '33', 'CREATIVE DIRECTOR'),
(34, '34', 'HRGA SPECIALIST'),
(35, '35', 'SENIOR HRGA SPECIALIST'),
(36, '36', 'HRGA GROUP HEAD'),
(37, '37', 'FINANCE & ACCOUNTING STAFF'),
(38, '38', 'SENIOR FINANCE & ACCOUNTING STAFF'),
(39, '39', 'FINANCE & ACCOUNTING MANAGER'),
(40, '40', 'SENIOR FINANCE & ACCOUNTING MANAGER'),
(41, '41', 'GA STAFF'),
(42, '42', 'RECEPTIONIST & GA STAFF'),
(43, '43', 'IT SUPPORT'),
(44, '44', 'IT PROGRAMMER'),
(45, '45', 'SENIOR IT PROGRAMMER'),
(46, '46', 'IT MANAGER'),
(47, '47', 'SENIOR IT PROGRAMER'),
(48, '48', 'DIGITAL ART DIRECTOR'),
(49, '49', 'SENIOR DIGITAL ART DIRECTOR'),
(50, '50', 'DIGITAL GRAPHIC DESIGNER'),
(51, '51', 'SENIOR DIGITAL GRAPHIC DESIGNER'),
(52, '52', 'DIGITAL COPYWRITER'),
(53, '53', 'SENIOR DIGITAL COPYWRITER'),
(54, '54', 'DIGITAL CREATIVE GROUP HEAD'),
(55, '55', 'DIGITAL CREATIVE DIRECTOR'),
(56, '56', 'DPT/ FA ARTIST'),
(57, '57', 'TRAFFIC & PRODUCTION EXECUTIVE'),
(58, '58', 'SENIOR TRAFFIC & PRODUCTION EXECUTIVE'),
(59, '59', 'SOCIAL MEDIA ADMIN'),
(60, '60', 'SOCIAL MEDIA SPECIALIST'),
(61, '61', 'SOCIAL MEDIA GROUP HEAD'),
(62, '62', 'COMMUNITY MANAGER'),
(63, '63', 'JUNIOR ACCOUNT EXECUTIVE'),
(64, '64', 'PRODUCER'),
(65, '65', 'EXECUTIVE SECRETARY'),
(66, '66', 'SOCIAL MEDIA & CONTENT ADMIN'),
(67, '67', 'IT SUPERVISOR'),
(68, '68', 'DIGITAL STRATEGIST'),
(69, '69', 'CONTENT WRITER'),
(70, '70', 'OFFICE BOY'),
(71, '71', 'HRGA INTERN'),
(72, '72', 'CREATIVE INTERN'),
(73, '73', 'ACCOUNT INTERN'),
(74, '74', 'SECURITY'),
(75, '75', 'PROJECT OFFICER'),
(76, '76', 'JUNIOR GRAPHIC DESIGNER'),
(77, '77', 'MANAGING PARTNER'),
(78, '78', 'GENERAL MANAGER'),
(79, '79', 'FINANCE INTERN'),
(80, '80', 'EXECUTIVE CREATIVE DIRECTOR'),
(81, '81', 'CHIEF MARKETING OFFICER'),
(82, '82', 'HEAD OF SALES'),
(83, '83', 'SALES MANAGER'),
(84, '84', 'PROJECT MANAGER'),
(85, '85', 'KOL DATA SUPPORT'),
(86, '86', 'ADMIN STAFF'),
(87, '87', 'MOTION GRAPHIC'),
(88, '88', 'VIDEOGRAPHER & EDITOR'),
(89, '89', 'DIGITAL ANALYST'),
(90, '90', 'SOCIAL MEDIA OFFICER'),
(91, '91', 'SOCIAL MEDIA MANAGER'),
(92, '92', 'PRESIDENT DIRECTOR'),
(93, '93', 'EXECUTIVE PRODUCER'),
(94, '94', 'TECHNICAL ADVISOR'),
(95, '95', 'TALENT & HUMAN CAPITAL ADVISOR'),
(96, '96', 'STRATEGIC PLANNER'),
(97, '97', 'PLANNING DIRECTOR'),
(98, '98', 'STRATEGIC PLANNER'),
(99, '99', 'WEBADMIN'),
(100, '100', 'RECEPTION & GA STAFF'),
(101, '101', 'ASSOCIATE BUSINESS DIRECTOR'),
(102, '102', 'DIREKTUR UTAMA'),
(103, '103', 'DIREKTUR'),
(104, '104', 'HR-LEGAL MANAGER'),
(105, '105', 'HR GENERALIS STAFF'),
(106, '106', 'FINANCE MANAGER'),
(107, '107', 'ADMIN FINANCE'),
(108, '108', 'ACCOUNTING MANAGER'),
(109, '109', 'ADMIN ACCOUNTING'),
(110, '110', 'GA/IT & PROCUREMENT MANAGER'),
(111, '111', 'GA- OFFICE BOY'),
(112, '112', 'HEAD OF BUSINESS UNIT'),
(113, '113', 'ADMIN PROJECT'),
(114, '114', 'AREA COORDINATOR'),
(115, '115', 'NATIONAL PROJECT COORDINATOR'),
(116, '116', 'PRODUCTION SUPERVISOR'),
(117, '117', 'OPERATION MANAGER'),
(118, '118', 'JUNIOR STRATEGIC PLANNER');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(5) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `inisial` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  `id_departemen` int(15) DEFAULT NULL,
  `id_jabatan` int(15) DEFAULT NULL,
  `id_golongan` int(15) DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `rekan_kerja` varchar(255) DEFAULT NULL,
  `rekan_kerja2` varchar(255) DEFAULT NULL,
  `rekan_kerja3` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tgl_appraisal` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `mark` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `nik`, `inisial`, `jenis_kelamin`, `agama`, `tgl_masuk`, `tgl_keluar`, `id_perusahaan`, `id_departemen`, `id_jabatan`, `id_golongan`, `atasan`, `rekan_kerja`, `rekan_kerja2`, `rekan_kerja3`, `email`, `tgl_appraisal`, `status`, `mark`) VALUES
(1, 'Michael D. Sudarto', '20110', 'MDS', 'L', 'Katolik', '1997-12-18', NULL, 6, 20, 21, 13, 'MDS', NULL, NULL, NULL, 'michael@pinc.group', '2017-01-01', 1, 0),
(2, 'Irawan Soemardjo', '20111', 'IRW', 'L', 'Islam', '2002-02-18', NULL, 6, 20, 19, 12, 'MSD', NULL, NULL, NULL, 'irawan@pinc.group', '2021-02-18', 1, 0),
(3, 'Hermanto Soerjanto', '20112', 'HER', 'L', 'Protestan', '2005-01-05', NULL, 6, 20, 22, 13, 'MDS', NULL, NULL, NULL, 'hermanto@pinc.group', '2021-01-04', 1, 0),
(4, 'Hermanto Soerjanto', '5945', 'HMN', 'L', 'Katolik', '2005-01-05', NULL, 1, 36, 22, 12, 'MDS', NULL, NULL, NULL, 'hermanto@pantarei-ad.com', '1970-01-01', 1, 0),
(5, 'Aditiyawarman', '5932', 'AYW', 'L', 'Islam', '2005-01-10', NULL, 2, 41, 17, 11, 'ELN', 'YOM', 'IPS', 'ALR', 'aditiyawarman@mataangin.co.id', '2022-01-01', 1, 0),
(6, 'Agus Gunawan', '7212', 'AGG', 'L', 'Islam', '2007-05-07', NULL, 1, 39, 56, 8, 'NSA', 'SAM', 'MHU', 'ADF', 'agus.gunawan@pantarei-ad.com', '2022-05-01', 1, 0),
(7, 'Rani Indriani', '10113', 'RAN', 'P', 'Islam', '2007-10-17', NULL, 6, 35, 23, 11, 'IRW', 'DWI', 'TQN', 'MFS', 'rani@pinc.group', '2022-01-01', 1, 0),
(8, 'Elizabeth Inkan', '8331', 'ELN', 'P', 'Katolik', '2008-04-28', NULL, 2, 58, 21, 12, 'IRO', NULL, NULL, NULL, 'elizabeth.inkan@mataangin.co.id', '2017-06-01', 1, 0),
(9, 'Suryani Asikin', '9398', 'SYA', 'P', 'Islam', '2009-02-25', NULL, 1, 49, 102, 12, 'IRO', NULL, NULL, NULL, 'suryani@pantarei-ad.com', '2017-01-01', 1, 0),
(10, 'Yohannes Muliady', '11010', 'YOM', 'L', 'Katolik', '2011-06-08', NULL, 2, 58, 80, 12, 'HER', NULL, NULL, NULL, 'yohannes.muliady@mataangin.co.id', '2017-07-01', 1, 0),
(11, 'Dwi Wicaksono Wibowo', '20114', 'DWI', 'L', 'Islam', '2014-11-03', NULL, 6, 17, 95, 11, 'IRW', 'RAI', 'ADJ', 'CIN', 'ino@pinc.group', '2022-01-01', 1, 0),
(12, 'Dewi Kemalasari', '20107', 'KML', 'P', 'Islam', '2014-11-17', NULL, 6, 15, 65, 10, 'DWI', 'RAN', 'GNS', 'CIN', 'mala@pinc.group', '2022-06-01', 1, 0),
(13, 'Tri Muttaqin', '20115', 'TQN', 'L', 'Islam', '2015-05-01', NULL, 6, 35, 39, 10, 'RAN', 'DWI', 'MFS', 'IGY', 'tri.muttaqin@pinc.group', '2022-09-01', 1, 0),
(14, 'M. Feariansyah S', '15066', 'MFS', 'L', 'Islam', '2015-11-16', NULL, 2, 11, 38, 8, 'RAI', 'DWW', 'TRM', 'IYS', 'm.feariansyah@mataangin.co.id', '2022-07-01', 1, 0),
(15, 'Sartika Dwiputri', '16059', 'SAD', 'P', 'Islam', '2016-01-12', NULL, 1, 39, 29, 9, 'NSA', 'MIC', 'KAM', 'SAM', 'sartika.dwiputri@pantarei-ad.com', '2022-06-01', 1, 0),
(16, 'Willy Tanujoyo', '16008', 'WTO', 'L', 'Budha', '2016-02-01', NULL, 3, 5, 21, 12, 'WTO', NULL, NULL, NULL, 'willy@w3p.digital', '1970-01-01', 1, 0),
(17, 'Muhamad Nurdin', '16029', 'MUN', 'L', 'Islam', '2016-07-11', NULL, 3, 59, 44, 8, 'WTO', 'DEY', 'RNL', 'TPM', 'nurdin@w3p.digital', '2022-10-01', 1, 0),
(18, 'Cynthia Anggraini Sudarto', '17005', 'CAS', 'P', 'Katolik', '2017-02-16', NULL, 1, 36, 64, 9, 'AJO', 'ADJ', 'ADJ', 'ADJ', 'cynthia@pantarei-ad.com', '2017-01-01', 1, 0),
(19, 'Cynthia Anggraini Sudarto', '99995', 'CYN', 'P', 'Katolik', '2017-02-16', NULL, 3, 5, 64, 9, 'WTO', NULL, NULL, NULL, 'cynthia@w3p.digital', '2017-05-16', 1, 0),
(20, 'Sukoco', '17301', 'SKC', 'L', 'Islam', '2017-05-04', NULL, 1, 36, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '2017-08-03', 1, 0),
(21, 'Bobby Ferry', '17022', 'BOF', 'L', 'Islam', '2017-05-04', NULL, 1, 53, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '2017-07-03', 1, 0),
(22, 'Solikun', '17303', 'SLK', 'L', 'Islam', '2017-05-04', NULL, 1, 36, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '2017-08-03', 1, 0),
(23, 'Teguh Pandirian Mashara', '17040', 'TPM', 'L', 'Islam', '2017-10-16', NULL, 3, 59, 48, 8, 'WTO', 'DLA', 'MRL', 'AJO', 'teguh@w3p.digital', '2022-06-01', 1, 0),
(24, 'Pirli Abi Saputra', '17204', 'PIR', 'L', 'Islam', '2018-01-01', NULL, 1, 36, 70, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '2018-03-31', 1, 0),
(25, 'Bramanzah Anandityo', '18018', 'BAN', 'L', 'Islam', '2018-05-02', NULL, 1, 39, 24, 8, 'NSA', 'PMG', 'SAD', 'ADF', 'bramanzah.anandityo@pantarei-ad.com', '2022-08-01', 1, 0),
(26, 'Eko Hadi Cahyono', '18048', 'EHC', 'L', 'Islam', '2018-07-01', NULL, 2, 7, 41, 6, 'NAS', NULL, NULL, NULL, 'eko.cahyono@mataangin.co.id', '2019-06-30', 1, 0),
(27, 'Yori Rizki Akbar', '18036', 'YRA', 'L', 'Islam', '2018-10-15', NULL, 1, 39, 27, 9, 'BAM', 'ALO', 'YAP', 'ADF', 'yori.akbar@pantarei-ad.com', '2022-02-01', 1, 0),
(28, 'Cynthia Anggraini Sudarto', '20138', 'CYS', 'P', 'Protestan', '2019-01-01', NULL, 6, 37, 93, 18, 'MDS', NULL, NULL, NULL, 'cynthia@pinc.group', '2020-12-31', 1, 0),
(29, 'Abdul Azis', '19001', 'ABA', 'L', 'Islam', '2019-01-02', NULL, 2, 57, 56, 8, 'AYW', 'FLP', 'AKR', 'CHS', 'abdul.azis@mataangin.co.id', '2022-02-01', 1, 0),
(30, 'TB. Liswan Mulyana', '19017', 'TLM', 'L', 'Islam', '2019-04-01', NULL, 2, 57, 28, 8, 'NPR', 'YKG', 'YKH', 'XHS', 'liswan.mulyana@mataangin.co.id', '2022-07-01', 1, 0),
(31, 'Nugroho Nurarifin', '20146', 'NUG', 'L', 'Islam', '2019-04-08', NULL, 6, 20, 94, 18, 'MDS', NULL, NULL, NULL, 'nugi@pinc.group', '2021-07-08', 1, 0),
(32, 'Raymond Iskandar', '19020', 'RIS', 'L', 'Katolik', '2019-04-29', NULL, 1, 55, 25, 9, 'MCM', 'AAM', 'SNA', 'TES', 'raymond.iskandar@pantarei-ad.com', '2021-06-04', 1, 0),
(33, 'Raymond Iskandar', '19020', 'RIS', 'L', 'Katolik', '2019-04-29', NULL, 1, 55, 25, 9, 'MCM', 'AAM', 'SNA', 'TES', 'raymond.iskandar@pantarei-ad.com', '2022-01-01', 1, 0),
(34, 'Riessang NPA', '19602', 'RNP', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 81, 11, NULL, NULL, NULL, NULL, NULL, '2019-07-31', 1, 0),
(35, 'Jatiwaluyo', '19603', 'JTW', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 82, 10, 'BAG', NULL, NULL, NULL, NULL, '2021-02-01', 1, 0),
(36, 'Bayu Agustianto', '19605', 'BAG', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 84, 11, NULL, NULL, NULL, NULL, NULL, '2019-07-31', 1, 0),
(37, 'Wijaya Hadikusuma', '19606', 'WIH', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 14, 9, NULL, NULL, NULL, NULL, 'wijaya@imadi.id', '2019-07-31', 1, 0),
(38, 'Arief Abiromo', '19607', 'AAB', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 14, 9, 'BAG', NULL, NULL, NULL, 'abi@imadi.id', '2019-02-01', 1, 0),
(39, 'Muhammad Junaidi Suswandi', '19608', 'MJS', 'L', 'Islam', '2019-05-01', NULL, 5, 13, 85, 8, NULL, NULL, NULL, NULL, NULL, '2019-07-31', 1, 0),
(40, 'Dhedy Suhendra Purba', '19060', 'DHY', 'L', 'Protestan', '2019-05-01', NULL, 5, 13, 44, 8, 'BAG', NULL, NULL, NULL, NULL, '2021-12-31', 1, 0),
(41, 'Indra Bayu Prasta', '19021', 'IBP', 'L', 'Islam', '2019-05-02', NULL, 1, 39, 28, 8, 'NSA', 'ADF', 'BAN', 'CNT', 'indra.bayu@pantarei-ad.com', '2022-08-01', 1, 0),
(42, 'Meltrin Hutabarat', '19027', 'MHU', 'P', 'Protestan', '2019-05-20', NULL, 1, 39, 14, 9, 'SYA', 'YAP', 'SAD', 'PMG', 'meltrin.hutabarat@pantarei-ad.com', '2022-03-01', 1, 1),
(43, 'Ahmad Syauqi', '19028', 'AHS', 'L', 'Islam', '2019-06-17', NULL, 1, 39, 28, 8, 'NSA', 'ADF', 'PMG', 'KAM', 'ahmad.syauqi@pantarei-ad.com', '2022-10-01', 1, 0),
(44, 'Albenna Reevo', '19030', 'ALR', 'L', 'Islam', '2019-07-01', NULL, 2, 14, 15, 9, 'ELN', 'BFW', 'JCH', 'ASW', 'albenna.reevo@mataangin.co.id', '2022-10-01', 1, 0),
(45, 'Faritz Hanif Fadillah', '19611', 'FHF', 'L', 'Islam', '2019-07-15', NULL, 5, 13, 14, 9, 'BAG', NULL, NULL, NULL, NULL, '2021-11-01', 1, 0),
(46, 'Ratri Indah Wijayanti', '19612', 'RIW', 'P', 'Islam', '2019-07-16', NULL, 5, 13, 86, 8, 'BAG', NULL, NULL, NULL, 'ratri@imadi.id', '2021-10-01', 1, 0),
(47, 'Cindy Marcela', '20116', 'CIN', 'P', 'Islam', '2019-07-24', NULL, 6, 36, 42, 8, 'KML', 'DWI', 'GNS', 'RAN', 'cindy@pinc.group', '2021-11-01', 1, 0),
(48, 'Cindy Marcela', '19036', 'CMA', 'P', 'Islam', '2019-07-25', NULL, 1, 36, 42, 8, 'DEK', 'RAI', 'ETC', 'VSK', 'cindy.marcela@pantarei-ad.com', '2022-11-01', 1, 0),
(49, 'Ade Jonatan', '19045', 'AJO', 'L', 'Protestan', '2019-08-02', NULL, 1, 36, 43, 8, 'DWW', 'LNH', 'GSE', 'DEK', 'it@pantarei.id', '2022-01-01', 1, 0),
(50, 'Ayu Ammalia Pertiwi', '19040', 'AAM', 'P', 'Islam', '2019-08-12', NULL, 1, 55, 26, 8, 'MCM', 'SNA', 'RIS', 'TES', 'ayu.ammalia@pantarei-ad.com', '2022-11-01', 1, 0),
(51, 'Ade Jonatan', '20085', 'ADJ', 'L', 'Protestan', '2019-09-12', NULL, 6, 16, 43, 8, 'DWI', 'RAN', 'GSE', 'LNH', 'adejonatan@pinc.group', '2022-12-01', 1, 0),
(52, 'Khansya Ayu Meiliani', '19046', 'KAM', 'P', 'Islam', '2019-09-23', NULL, 1, 39, 13, 9, 'MHU', 'YAP', 'ADF', 'CNT', 'khansya.ayu@pantarei-ad.com', '2022-01-01', 1, 0),
(53, 'Deddy Setiawan', '19048', 'DES', 'L', 'Katolik', '2019-10-01', NULL, 1, 39, 25, 9, 'NSA', 'PMG', 'MHU', 'KAM', 'deddy.setiawan@pantarei-ad.com', '2022-01-01', 1, 0),
(54, 'Reja Rizaldi', '19202', 'RER', 'L', 'Islam', '2019-11-01', NULL, 1, 36, 70, 18, 'DEK', 'GSE', 'CMA', NULL, NULL, '2020-01-01', 1, 0),
(55, 'M.Kurnia Sandi', '19201', 'MKS', 'L', 'Islam', '2019-11-01', NULL, 1, 36, 70, 7, 'DEK', 'GSE', 'CMA', NULL, NULL, '2020-01-01', 1, 0),
(56, 'Yudhistira Adhi Pratama', '19052', 'YAP', 'L', 'Islam', '2019-11-11', NULL, 1, 39, 6, 8, 'MHU', 'KAM', 'DSR', 'BAN', 'yudhistira.adhi@pantarei-ad.com', '2022-02-01', 1, 0),
(57, 'Novia Satyawati Achmadi', '19047', 'NSA', 'P', 'Islam', '2019-11-12', NULL, 1, 55, 30, 10, 'AAL', 'SMT', 'DNS', 'FKK', 'novia.achmadi@pantarei-ad.com', '2022-02-01', 1, 0),
(58, 'Adi Prasetio Pamuji', '19056', 'APP', 'L', 'Islam', '2019-12-02', '0000-00-00', 2, 57, 87, 8, 'IPS', 'AYW', 'RPE', 'YKG', 'adi.prasetio@mataangin.co.id', '2022-03-01', 1, 0),
(59, 'Tenri Esa Suyoto', '19057', 'TES', 'P', 'Islam', '2019-12-02', NULL, 1, 55, 13, 8, 'AML', 'SNA', 'RIS', 'AAM', 'tenri.esa@pantarei-ad.com', '2022-12-01', 1, 0),
(60, 'Nugroho Nurarifin', '19018', 'NUN', 'L', 'Islam', '2020-01-01', NULL, 1, 36, 80, 18, 'HER', 'IRO', 'SYA', NULL, 'nugroho.nurarifin@pantarei-ad.com', '2019-07-05', 1, 0),
(61, 'Irawan Soemardjo', '2715', 'IRO', 'L', 'Islam', '2020-01-01', NULL, 1, 36, 19, 12, 'MDS', NULL, NULL, NULL, 'irawan@pantarei-ad.com', '1970-01-01', 1, 0),
(62, 'Tri Muttaqin', '15006', 'TRM', 'L', 'Islam', '2020-01-01', NULL, 1, 36, 38, 9, 'RAI', NULL, NULL, NULL, 'tri.muttaqin@pantarei-ad.com', '2017-09-01', 1, 0),
(63, 'Rani Indriani', '7274', 'RAI', 'P', 'Islam', '2020-01-01', NULL, 1, 36, 23, 18, 'IRO', NULL, NULL, NULL, 'rani.indriani@pantarei-ad.com', '2017-01-01', 1, 0),
(64, 'Dewi Kemalasari', '14036', 'DEK', 'P', 'Islam', '2020-01-01', NULL, 1, 36, 65, 9, 'DWW', 'RAI', 'GSE', 'CMA', 'dewi.kemalasari@pantarei-ad.com', '2017-06-01', 1, 0),
(65, 'Dwi Wicaksono Wibowo', '14034', 'DWW', 'L', 'Islam', '2020-01-01', NULL, 1, 36, 36, 11, 'IRO', NULL, NULL, NULL, 'dwi.wicaksono@pantarei-ad.com', '2017-01-01', 1, 0),
(66, 'Michael D. Sudarto', '97452', 'MDS', 'L', 'Katolik', '2020-01-01', NULL, 1, 36, 21, 13, NULL, NULL, NULL, NULL, 'michael@pantarei-ad.com', '1970-01-01', 1, 0),
(67, 'Xenia Heptapami Susetyo', '20006', 'XHS', 'P', 'Protestan', '2020-01-02', NULL, 2, 57, 57, 8, 'AGP', 'JCH', 'RAI', 'BTM', 'xenia.susetyo@mataangin.co.id', '2022-04-01', 1, 0),
(68, 'Aidil Akbar Latief', '20007', 'AAL', 'L', 'Islam', '2020-01-02', NULL, 1, 49, 33, 12, 'NUN', NULL, NULL, NULL, 'aidil.akbar@pantarei-ad.com', '2021-02-01', 1, 0),
(69, 'Eko Sumarno', '20009', 'ESU', 'L', 'Islam', '2020-01-02', NULL, 2, 57, 56, 8, 'ESU', 'XHS', 'BTM', 'DWP', 'eko.sumarno@mataangin.co.id', '2022-02-01', 1, 0),
(70, 'Ibnu Syech', '20011', 'NAY', 'L', 'Islam', '2020-01-02', NULL, 2, 57, 29, 9, 'NPR', 'AGP', 'YKH', 'HPA', 'ibnu.syech@mataangin.co.id', '2022-04-01', 1, 0),
(71, 'Selvi Wennelia Rieni', '20016', 'SWR', 'P', 'Islam', '2020-01-06', NULL, 2, 57, 26, 8, 'BTM', 'AGP', 'TMP', 'MID', 'selvi.wennelia@mataangin.co.id', '2022-04-01', 1, 0),
(72, 'Rheza Pramudita', '20005', 'RHP', 'L', 'Islam', '2020-01-06', NULL, 2, 57, 88, 9, 'NPR', 'DWP', 'BTM', 'BAK', 'rheza.pramudita@mataangin.co.id', '2022-02-01', 1, 0),
(73, 'Syamsudin', '20030', 'SAM', 'L', 'Islam', '2020-02-03', NULL, 1, 39, 56, 8, 'NSA', 'MHU', 'KAM', 'MIC', 'syamsudin@pantarei-ad.com', '2022-05-01', 1, 0),
(74, 'Ignasius Yudhi Subiyarto', '20032', 'IYS', 'L', 'Katolik', '2020-02-03', NULL, 2, 7, 37, 8, 'DWW', NULL, NULL, NULL, 'yudhi.subiyarto@mataangin.co.id', '2020-05-31', 1, 0),
(75, 'Diva Efriza Genio', '20018', 'DEG', 'L', 'Islam', '2020-02-03', NULL, 1, 55, 28, 8, 'MCM', 'RIS', 'AAM', 'TES', 'efriza.genio@pantarei-ad.com', '2022-01-01', 1, 0),
(76, 'Ignasius Yudhi Subiyarto', '20117', 'IGY', 'L', 'Katolik', '2020-02-03', NULL, 6, 35, 37, 8, 'RAN', 'TQN', 'MFS', 'DWI', 'yudhi@pinc.group', '2022-05-01', 1, 0),
(77, 'Santi Mantika Irsani', '20038', 'SMI', 'P', 'Islam', '2020-02-10', NULL, 2, 14, 6, 8, 'NPI', 'JSS', 'XHS', 'SWR', 'santi.mantika@mataangin.co.id', '2022-02-01', 1, 0),
(78, 'Muhammad Harish Soewandi', '20034', 'HRS', 'L', 'Islam', '2020-02-11', NULL, 2, 57, 87, 8, 'AGP', 'BTM', 'XHS', 'RHP', 'harish.soewandi@mataangin.co.id', '2023-02-01', 1, 0),
(79, 'Pandega', '20053', 'PDG', 'L', 'Islam', '2020-02-19', NULL, 2, 7, 41, 8, 'DWW', 'ELN', 'YOM', 'DEK', 'pandega@mataangin.co.id', '2021-06-01', 1, 0),
(80, 'Lukman Nul Hakim', '20052', 'LNH', 'L', 'Islam', '2020-02-19', NULL, 2, 11, 43, 8, 'DWW', 'DWW', 'PDG', 'GSE', 'lukman.hakim@mataangin.co.id', '2022-06-01', 1, 0),
(81, 'Ni Desak Gde Gayatri F', '20047', 'NDG', 'P', 'Hindu', '2020-02-24', NULL, 1, 39, 87, 8, 'NSA', 'CHN', 'YAP', 'MIC', 'desak.gayatri@pantarei-ad.com', '2022-06-01', 1, 0),
(82, 'M F Khadafi', '20056', 'MFK', 'L', 'Islam', '2020-02-25', NULL, 1, 55, 28, 8, 'AHT', 'CFF', 'SKD', 'SNA', 'muhammad.khadafi@pantarei-ad.com', '2022-06-01', 1, 0),
(83, 'Safira Nur Alifah', '20049', 'SNA', 'P', 'Islam', '2020-02-27', NULL, 1, 55, 57, 8, 'DMN', 'AHT', 'TES', 'RAN', 'safira.alifah@pantarei-ad.com', '2022-09-01', 1, 0),
(84, 'Arif Ramadani', '20058', 'ARA', 'L', 'Islam', '2020-02-28', NULL, 2, 57, 28, 8, 'DWP', 'SMI', 'DZN', 'XHS', 'arif.ramadani@mataangin.co.id', '2022-06-01', 1, 0),
(85, 'Yusuf Kenang Hidayat', '20075', 'YKH', 'L', 'Islam', '2020-03-01', NULL, 2, 57, 25, 8, 'NPR', 'NAY', 'HPA', 'MZA', 'yusuf.kenang@mataangin.co.id', '2022-04-01', 1, 0),
(86, 'Rangga Indra Pratama', '20057', 'RAP', 'L', 'Islam', '2020-03-02', NULL, 1, 55, 26, 8, 'MCM', 'TES', 'DMN', 'SNA', 'rangga.indra@pantarei-ad.com', '2022-12-01', 1, 0),
(87, 'Ardika Pradnya', '20055', 'APD', 'L', 'Islam', '2020-03-06', '0000-00-00', 2, 57, 27, 8, 'BFW', 'JCH', 'AKR', 'CHS', 'ardika.pradnya@mataangin.co.id', '2022-06-01', 1, 0),
(88, 'Nesya Prinsesva Putri', '20066', 'NPI', 'P', 'Islam', '2020-03-10', NULL, 2, 14, 14, 18, 'ELN', 'DWP', 'XHS', 'ACH', 'nesya.putri@mataangin.co.id', '2022-03-01', 1, 1),
(89, 'Adeprianto Nugroho', '20046', 'ADP', 'L', 'Islam', '2020-03-11', NULL, 2, 57, 28, 8, 'BTM', 'XHS', 'CGE', 'MHM', 'ade.prianto@mataangin.co.id', '2022-03-01', 1, 1),
(90, 'Balya Kretarta', '20067', 'BAK', 'L', 'Islam', '2020-03-16', NULL, 2, 57, 87, 9, 'DWP', 'HRS', 'XHS', 'LKP', 'balya.kretarta@mataangin.co.id', '2022-04-01', 1, 0),
(91, 'Cherlita Christanti', '20063', 'CHS', 'P', 'Katolik', '2020-03-16', '0000-00-00', 2, 57, 24, 8, 'AYW', 'AKR', 'APD', 'AGT', 'cherlita.christanti@mataangin.co.id', '2022-06-01', 1, 0),
(92, 'Christa Gabriella Emma M', '20077', 'CGE', 'P', 'Protestan', '2020-05-04', NULL, 2, 57, 27, 9, 'NPR', 'XHS', 'YKM', 'NAY', 'christa.emma@mataangin.co.id', '2022-09-01', 1, 0),
(93, 'Andhika Paramita', '20079', 'ANP', 'P', 'Islam', '2020-05-11', NULL, 2, 23, 68, 9, 'KYS', 'OTE', 'RAH', 'XHS', 'andhika.paramita@mataangin.co.id', '2022-08-01', 1, 0),
(94, 'Nurman Prasetyo', '20089', 'NPR', 'L', 'Islam', '2020-06-02', NULL, 2, 57, 32, 18, 'YOM', 'YKM', 'BTM', 'CGE', 'nurman.prasetyo@mataangin.co.id', '2022-01-01', 1, 0),
(95, 'Daniel Adi Putro Nugroho', '20094', 'DNP', 'L', 'Islam', '2020-06-08', NULL, 1, 55, 29, 8, 'AHT', 'SNA', 'RIS', 'TES', 'daniel.adi@pantarei-ad.com', '2022-09-01', 1, 0),
(96, 'Benny Oetama', '20098', 'BTM', 'L', 'Budha', '2020-06-22', NULL, 2, 57, 30, 10, 'NPR', 'TMP', 'XHS', 'YKM', 'benny.oetama@mataangin.co.id', '2022-10-01', 1, 0),
(97, 'Sekar Lenggo Geni', '20103', 'SLG', 'P', 'Islam', '2020-07-15', NULL, 3, 12, 13, 8, 'WTO', 'DLA', 'TPM', 'JAP', 'sekar@w3p.digital', '2022-08-01', 1, 0),
(98, 'Sismita', '20121', 'SMT', 'P', 'Islam', '2020-08-18', NULL, 1, 55, 96, 18, 'SYA', 'AML', 'RYN', 'AHT', 'sismita@pantarei-ad.com', '2022-09-01', 1, 0),
(99, 'Algesta Oktrivalda', '20122', 'ALO', 'L', 'Islam', '2020-08-24', NULL, 1, 39, 28, 8, 'NSA', 'MHU', 'IBP', 'HZG', 'algesta.oktrivalda@pantarei-ad.com', '2022-11-01', 1, 0),
(100, 'Akhmad Ilyas Rivani', '20129', 'AKR', 'L', 'Islam', '2020-09-21', NULL, 2, 57, 54, 10, 'BFW', 'ALR', 'JCH', 'IKN', 'akhmad.ilyas@mataangin.co.id', '2022-10-01', 1, 0),
(101, 'Lukman Prayogo', '20133', 'LKP', 'L', 'Islam', '2020-10-02', NULL, 2, 57, 87, 8, 'BTM', 'XHS', 'RHP', 'BAK', 'lukman.prayogo@mataangin.co.id', '2022-01-01', 1, 0),
(102, 'Dadang Zulian', '20134', 'DZN', 'L', 'Islam', '2020-10-05', NULL, 2, 57, 24, 8, 'DWP', 'SWR', 'XHS', 'ARA', 'dadang.zulian@mataangin.co.id', '2022-01-01', 1, 0),
(103, 'Dwiarto Purnomo Otten', '20140', 'DWP', 'L', 'Islam', '2020-11-19', NULL, 2, 26, 30, 10, 'YOM', 'NPI', 'DZN', 'XHS', 'dwiarto.otten@mataangin.co.id', '2022-11-01', 1, 0),
(104, 'Nissa Triafni', '20141', 'NTR', 'P', 'Islam', '2020-11-23', NULL, 1, 39, 90, 8, 'MHU', 'DFR', 'CNT', 'NDG', 'nissa.triafni@pantarei-ad.com', '2022-03-01', 1, 1),
(105, 'Satrio Pamungkas', '20143', 'SPS', 'L', 'Katolik', '2020-12-01', NULL, 1, 39, 28, 8, 'BAM', 'ADF', 'MWD', 'YAP', 'satrio.pamungkas@pantarei-ad.com', '2022-03-01', 1, 1),
(106, 'Veby Puspita', '21601', 'VBP', 'P', 'Islam', '2021-01-01', NULL, 5, 13, 14, 10, 'BAG', NULL, NULL, NULL, 'veby@imadi.id', '2021-02-01', 1, 0),
(107, 'Puti Ambang Gemilang', '21006', 'PMG', 'P', 'Islam', '2021-01-07', NULL, 1, 39, 27, 9, 'NSA', 'MIC', 'MHU', 'AHS', 'puti.ambang@pantarei-ad.com', '2022-04-01', 1, 0),
(108, 'Fauzan Gozali', '21010', 'FGI', 'L', 'Islam', '2021-02-01', NULL, 1, 56, 68, 8, 'SMT', 'NTR', 'TES', 'NSA', 'fauzan.gozali@pantarei-ad.com', '2022-02-01', 1, 0),
(109, 'Jasiman', '21015', 'JSM', 'L', 'Islam', '2021-02-01', NULL, 6, 36, 41, 8, 'DEK', NULL, NULL, NULL, 'jasiman@pinc.group', '2022-02-01', 1, 0),
(110, 'Marlin Akbar Nasution', '21012', 'MRL', 'L', 'Islam', '2021-02-01', NULL, 3, 59, 28, 8, 'TPM', 'JAP', 'SLG', 'GJT', 'marlin@w3p.digital', '2022-08-01', 1, 0),
(111, 'Yasmine Kristanti.M', '21011', 'YKM', 'P', 'Islam', '2021-02-08', NULL, 2, 14, 17, 11, 'ELN', 'NPR', 'YRE', 'TDR', 'yasmine.kristanti@mataangin.co.id', '2022-05-01', 1, 0),
(112, 'Amanda Lestari', '21016', 'AML', 'P', 'Katolik', '2021-03-01', NULL, 1, 55, 16, 18, 'SYA', 'SMT', 'EDL', 'NSA', 'amanda.lestari@pantarei-ad.com', '2022-03-01', 1, 3),
(113, 'Bramantyo F. Wibowo', '21017', 'BFW', 'L', 'Islam', '2021-03-01', NULL, 2, 57, 33, 11, 'YOM', 'ALR', 'AYW', 'AKR', 'fauke.bramantyo@mataangin.co.id', '2022-06-01', 1, 0),
(114, 'Viska Septivi Narni', '21020', 'VSK', 'P', 'Islam', '2021-03-25', NULL, 2, 11, 41, 8, 'DWW', 'CMA', 'GSE', 'DEK', 'viska.septivi@mataangin.co.id', '2022-07-01', 1, 0),
(115, 'Ciko Septyani', '21024', 'CSN', 'P', 'Islam', '2021-05-03', NULL, 3, 12, 101, 11, 'WTO', 'ARJ', 'DLA', 'TPM', 'chicco@w3p.digital', '2022-08-01', 1, 0),
(116, 'Desti Srikandi Fatimah', '21025', 'DSR', 'P', 'Islam', '2021-05-03', NULL, 1, 39, 69, 8, 'NSA', 'ADF', 'YAP', 'DES', 'desti.srikandi@pantarei-ad.com', '2022-05-01', 1, 0),
(117, 'Ranti Indraswari', '21029', 'RNT', 'P', 'Islam', '2021-06-07', NULL, 6, 35, 117, 13, 'RAI', NULL, NULL, NULL, 'ranti@pinc.group', '2021-09-01', 1, 0),
(118, 'Amira Syifa Wijaksana', '21039', 'ASW', 'P', 'Islam', '2021-07-11', NULL, 2, 14, 6, 8, 'ALR', 'JCH', 'AKR', 'APD', 'amira.syifa@mataangin.co.id', '2022-10-01', 1, 0),
(119, 'Daniel Ferryansyah', '21041', 'DFR', 'L', 'Islam', '2021-07-13', NULL, 1, 55, 25, 9, 'NSA', 'YAP', 'NDG', 'ADF', 'daniel.ferryansyah@pantarei-ad.com', '2022-10-01', 1, 0),
(120, 'Francini Yollandara', '21043', 'FRY', 'L', 'Islam', '2021-07-19', NULL, 1, 55, 28, 8, 'NSA', 'IBP', 'CNT', 'PMG', 'francini.yollandara@pantarei-ad.com', '2022-11-01', 1, 0),
(121, 'Esmaralda Doraldina', '21046', 'EDL', 'P', 'Islam', '2021-07-19', NULL, 1, 55, 6, 8, 'AML', 'RIS', 'AAM', 'SNA', 'esmaralda.doraldina@pantarei-ad.com', '2022-11-01', 1, 0),
(122, 'Bagus Priyo Sasmito', '21047', 'BPS', 'L', 'Islam', '2021-07-21', NULL, 2, 57, 24, 8, 'BFW', 'RDT', 'AKR', 'ALV', 'bagus.priyo@mataangin.co.id', '2022-08-01', 1, 0),
(123, 'Andy Raharjo', '21050', 'ARJ', 'L', 'Islam', '2021-07-26', NULL, 3, 12, 17, 11, 'WTO', NULL, NULL, NULL, 'andy@w3p.digital', '2022-11-01', 1, 0),
(124, 'Muhammad Rifqi Ilhami', '21055', 'MRQ', 'L', 'Islam', '2021-08-02', '0000-00-00', 2, 41, 90, 8, 'AKR', 'ALR', 'RVF', 'IKN', 'muhammad.rifqi@mataangin.co.id', '2022-11-01', 1, 0),
(125, 'Bagas Setiawan', '21056', 'BSN', 'L', 'Islam', '2021-08-02', NULL, 2, 41, 87, 8, 'BFW', 'RDT', 'APP', 'BPS', 'bagas.setiawan@mataangin.co.id', '2022-08-01', 1, 0),
(126, 'Muhammad Islam', '21057', 'MHM', 'L', 'Islam', '2021-08-04', NULL, 2, 28, 13, 9, 'ARL', 'RDO', 'XHS', 'CGE', 'muhammad.islam@mataangin.co.id', '2022-08-01', 1, 0),
(127, 'Rinesa Diola Audrina', '21058', 'RDA', 'P', 'Islam', '2021-08-04', NULL, 2, 27, 90, 8, 'NPI', 'DKN', 'SMI', NULL, 'nesa.diola@mataangin.co.id', '2022-11-01', 1, 0),
(128, 'Arnold Retno Leopold', '21059', 'ARL', 'L', 'Budha', '2021-08-05', NULL, 2, 28, 14, 9, 'YKM', 'CGE', 'RDO', 'XHS', 'arnold.leopold@mataangin.co.id', '2022-11-01', 1, 0),
(129, 'Dhaifina Iken Mazaya', '21060', 'DKN', 'P', 'Islam', '2021-08-09', NULL, 2, 23, 96, 8, 'NPI', 'XHS', 'DWP', 'RDA', 'dhaifina.iken@mataangin.co.id', '2022-11-01', 1, 0),
(130, 'Rido Prasetyo', '21061', 'RDO', 'L', 'Islam', '2021-08-09', '0000-00-00', 2, 28, 13, 9, 'YKM', 'XHS', 'MHM', 'ARL', 'rido.prasetyo@mataangin.co.id', '2022-11-01', 1, 0),
(131, 'Muhammad Wildan', '21063', 'MWD', 'L', 'Islam', '2021-08-23', NULL, 1, 39, 90, 8, 'FGI', 'MHU', 'YAP', 'NTR', 'muhammad.wildan@pantarei-ad.com', '2022-09-01', 1, 0),
(132, 'Tiara Larasati', '21064', 'TLS', 'P', 'Islam', '2021-08-23', NULL, 2, 31, 6, 8, 'RFK', 'XHS', 'ADP', NULL, 'tiara.larasati@mataangin.co.id', '2022-09-01', 1, 0),
(133, 'Gita Galantari', '21069', 'GTA', 'P', 'Islam', '2021-09-01', NULL, 6, 36, 36, 10, 'DWW', 'GSE', 'ELN', 'SYA', 'gita@pinc.group', '2023-09-01', 1, 0),
(134, 'Septaria Bernita', '21070', 'SBT', 'P', 'Islam', '2021-09-01', NULL, 6, 36, 5, 9, 'GTA', NULL, NULL, NULL, 'tata@pinc.group', '2021-12-01', 1, 0),
(135, 'Dini Octavia Anggraeni', '21071', 'DNO', 'P', 'Islam', '2021-09-20', NULL, 2, 26, 26, 8, 'DWP', 'SWR', 'XHS', 'SMI', 'dini.ocatvia@mataangin.co.id', '2022-10-01', 1, 0),
(136, 'Riddo Tandian', '21072', 'RDT', 'L', 'Budha', '2021-09-27', NULL, 2, 41, 57, 8, 'AYW', 'ALR', 'BFW', 'AKR', 'riddo.tandian@mataangin.co.id', '2022-01-01', 1, 0),
(137, 'Umar Hamdan', '21075', 'UMR', 'L', 'Islam', '2021-10-01', NULL, 2, 32, 90, 8, 'ANP', 'RAH', 'PAU', 'ALK', 'umar.hamdan@mataangin.co.id', '2022-01-01', 1, 0),
(138, 'Farly Putra Pratama', '21076', 'FLP', 'L', 'Islam', '2021-10-01', NULL, 2, 41, 24, 8, 'BFW', 'RDT', 'SDF', 'ADP', 'farly.pratama@mataangin.co.id', '2022-01-01', 1, 0),
(139, 'Vebyana Yongky', '20178', 'VBY', 'P', 'Budha', '2021-10-01', NULL, 1, 38, 28, 8, 'MCM', 'SNA', 'RIS', 'TES', 'vebyana.yongky@pantarei-ad.com', '2022-01-01', 1, 0),
(140, 'Dilla Naharul Mumtazh', '21602', 'DNM', 'P', 'Islam', '2021-10-01', NULL, 5, 13, 26, 8, 'BAG', NULL, NULL, NULL, NULL, '2021-12-31', 1, 0),
(141, 'Athalika Mediana Azzahra', '21078', 'ALK', 'L', 'Islam', '2021-10-23', NULL, 2, 14, 90, 8, 'ANP', 'CGE', 'UMR', 'MHM', 'athalika.mediana@mataangin.co.id', '2022-02-01', 1, 0),
(142, 'Conny Natasya Tampubolon', '20179', 'CNT', 'P', 'Protestan', '2021-10-25', NULL, 1, 39, 6, 8, 'MHU', 'ADF', 'FRY', 'AGG', 'conny.natasya@pantarei-ad.com', '2022-02-01', 1, 0),
(143, 'Fina Camelia Putri', '21077', 'FCP', 'P', 'Islam', '2021-10-25', NULL, 2, 14, 13, 9, 'ALR', 'APD', 'BPS', 'RDT', 'fina.camelia@mataangin.co.id', '2022-02-01', 1, 0),
(144, 'Dyan Surapati', '20180', 'DNS', 'L', 'Islam', '2021-11-01', '0000-00-00', 1, 38, 25, 9, 'NSA', 'SNA', 'MFK', 'ALX', 'dyan.surapati@pantarei-ad.com', '2022-02-01', 1, 0),
(145, 'Ferry Senowandhani', '21079', 'FSN', 'L', 'Islam', '2021-11-01', NULL, 2, 14, 6, 8, 'AYW', 'RDT', 'APP', 'CHS', 'ferry.seno@mataangin.co.id', '2022-02-01', 1, 0),
(146, 'Jonathan Lesmana', '21080', 'JLE', 'L', 'Protestan', '2021-11-01', NULL, 2, 23, 96, 10, 'ALR', 'APD', 'ASW', 'BPS', 'jonathan.lesmana@mataangin.co.id', '2022-02-01', 1, 0),
(147, 'Fransisca Chrisnatiawaty Karo Karo', '20181', 'FKK', 'P', 'Protestan', '2021-11-08', NULL, 1, 38, 16, 11, 'SYA', 'SNA', 'SMT', 'NSA', 'fransisca.karokaro@pantarei-ad.com', '2022-02-01', 1, 0),
(148, 'Josua Sakti Suryanto', '21081', 'JSS', 'L', 'Katolik', '2021-11-08', NULL, 2, 26, 28, 8, 'DWP', 'SMI', 'ARA', 'XHS', 'josua.suryanto@mataangin.co.id', '2022-12-01', 1, 0),
(149, 'Alexander Kusumapradja', '20183', 'ALX', 'L', 'Islam', '2021-11-22', NULL, 1, 38, 27, 8, 'NSA', 'MFK', 'SNA', 'ASL', 'alexander.kusumapradja@pantarei-ad.com', '2022-03-01', 1, 3),
(150, 'Adi Purwanto', '21086', 'APW', 'L', 'Islam', '2021-11-22', NULL, 6, 16, 43, 8, 'DWW', 'LNH', 'AJO', 'GTA', 'adi.purwanto@pinc.group', '2022-03-01', 1, 4),
(151, 'Andhika Fadillah', '20184', 'ADF', 'L', 'Islam', '2021-12-01', NULL, 1, 39, 57, 8, 'MHU', 'YAP', 'SAD', 'YRA', 'andhika.fadillah@pantarei-ad.com', '2022-03-01', 1, 2),
(152, 'Ellen Trecia', '21087', 'ETC', 'P', 'Islam', '2021-12-06', NULL, 6, 17, 105, 8, 'GTA', 'CMA', 'MFS', 'AJO', 'ellen@pinc.group', '2022-03-01', 1, 0),
(153, 'Amelia Oktavianti', '20188', 'AMO', 'P', 'Islam', '2021-12-20', NULL, 2, 7, 73, 13, 'ALR', NULL, NULL, NULL, 'amelia.oktavianti@mataangin.co.id', '2022-07-01', 1, 0),
(154, 'Annisa Chairiyanti', '20039', 'ACH', 'P', 'Islam', '2022-01-01', NULL, 2, 14, 6, 8, 'ALR', 'ELN', 'TPM', 'XHS', 'annisa.chairiyanti@mataangin.co.id', '2023-01-01', 1, 0),
(155, 'Ben Arya Mahendra', '22185', 'BAM', 'L', 'Islam', '2022-01-03', NULL, 1, 39, 32, 11, 'AAL', NULL, NULL, NULL, 'ben.mahendra@pantarei-ad.com', '2022-04-01', 1, 0),
(156, 'Taufik Imam Fauzi', '22010', 'TIF', 'L', 'Islam', '2022-01-03', NULL, 6, 35, 37, 8, 'RAI', 'TQN', 'IGY', 'MFS', 'taufik@pinc.group', '2022-04-01', 1, 0),
(157, 'Kurnia Ramadhan', '22101', 'KRA', 'L', 'Islam', '2022-01-03', NULL, 2, 57, 29, 9, 'BFW', NULL, NULL, NULL, 'kurnia.ramadhan@mataangin.co.id', '2022-04-01', 1, 0),
(158, 'Elzariana Muchlis', '22102', 'ELM', 'P', 'Islam', '2022-01-05', NULL, 2, 14, 13, 9, 'YKM', NULL, NULL, NULL, 'elzariana.muchlis@mataangin.co.id', '2022-04-01', 1, 0),
(159, 'Gabriel Levito D Pelupessy', '22186', 'GLP', 'L', 'Protestan', '2022-01-10', NULL, 1, 38, 24, 8, 'NSA', NULL, NULL, NULL, 'gabriel.levito@pantarei-ad.com', '2022-04-01', 1, 0),
(160, 'Dwi Ilham', '22187', 'DIM', 'L', 'Islam', '2022-01-10', NULL, 1, 38, 28, 8, 'NSA', NULL, NULL, NULL, 'dwi.ilham@pantarei-ad.com', '2022-04-01', 1, 0),
(161, 'Jane Charissa Adelaide', '22105', 'JAC', 'P', 'Protestan', '2022-01-13', NULL, 2, 32, 90, 8, 'ANP', NULL, NULL, NULL, 'jane.adelaide@mataangin.co.id', '2022-04-01', 1, 0),
(162, 'Ariana Dyah Atisomya', '22103', 'ARD', 'P', 'Islam', '2022-01-19', NULL, 2, 41, 90, 8, 'AKR', 'ALR', NULL, NULL, 'ariana.dyah@mataangin.co.id', '2022-05-01', 1, 0),
(163, 'Ayu Suci Lestari', '21082', 'ASL', 'P', 'Islam', '2022-01-24', NULL, 1, 38, 6, 8, 'FKK', NULL, NULL, NULL, 'ayu.suci@pantarei-ad.com', '2022-05-01', 1, 0),
(164, 'Indri Aryani', '22106', 'IDA', 'P', 'Islam', '2022-01-25', NULL, 2, 31, 15, 10, 'YKM', NULL, NULL, NULL, 'indri.aryani@mataangin.co.id', '2022-05-01', 1, 0),
(165, 'Ivanajie Wahab', '22107', 'IVN', 'L', 'Islam', '2022-02-08', NULL, 2, 41, 25, 9, 'AYW', NULL, NULL, NULL, 'ivan.adjie@mataangin.co.id', '2022-05-01', 1, 0),
(166, 'Zahra Ardhistya Adjie', '22109', 'ZAR', 'P', 'Islam', '2022-02-14', NULL, 2, 41, 90, 8, 'AKR', NULL, NULL, NULL, 'zahra.adjie@mataangin.co.id', '2022-05-01', 1, 0),
(167, 'Beryl Artesian Girsang', '22108', 'BER', 'L', 'Protestan', '2022-02-14', NULL, 2, 57, 24, 8, 'BTM', NULL, NULL, NULL, 'beryl.girsang@mataangin.co.id', '2022-05-01', 1, 0),
(168, 'Fitrohza Gilang Nurzamsyah', '22188', 'FIG', 'L', 'Islam', '2022-02-14', NULL, 1, 55, 118, 7, 'SBT', NULL, NULL, NULL, 'fitrohza@pantarei-ad.com', '2022-05-01', 1, 0),
(169, 'Sara Putrikita Rostanti Jans', '22011', 'SAR', 'P', 'Katolik', '2022-02-21', NULL, 6, 17, 105, 8, 'GTA', NULL, NULL, NULL, 'sara@pincgroup.id', '2022-06-01', 1, 0),
(170, 'Amelia Ananda Putri', '22110', 'AMA', 'P', 'Islam', '2022-02-21', NULL, 2, 48, 90, 8, 'ANP', NULL, NULL, NULL, 'amelia.putri@mataangin.agency', '2022-06-01', 1, 0),
(171, 'Regina Gerhana Amarta Bunga', '22111', 'RGA', 'P', 'Islam', '2022-02-21', NULL, 2, 11, 41, 8, 'DEK', NULL, NULL, NULL, 'regina.bunga@mataangin.agency', '2022-06-01', 1, 0),
(172, 'Yolanda Nuraini', '22112', 'YOL', 'P', 'Islam', '2022-03-01', NULL, 2, 23, 119, 8, 'ANP', NULL, NULL, NULL, 'yolanda.nuraini@mataangin.agency', '2022-06-01', 1, 0),
(173, 'Priyo Trilaksono', '22113', 'PRY', 'L', 'Islam', '2022-03-02', NULL, 2, 41, 28, 8, 'AKR', NULL, NULL, NULL, 'priyo.trilaksono@mataangin.agency', '2022-06-01', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_17122021`
--

CREATE TABLE `karyawan_17122021` (
  `id` int(5) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `inisial` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  `id_departemen` int(15) DEFAULT NULL,
  `id_jabatan` int(15) DEFAULT NULL,
  `id_golongan` int(15) DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `rekan_kerja` varchar(255) DEFAULT NULL,
  `rekan_kerja2` varchar(255) DEFAULT NULL,
  `rekan_kerja3` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tgl_appraisal` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_17122021`
--

INSERT INTO `karyawan_17122021` (`id`, `nama_karyawan`, `nik`, `inisial`, `jenis_kelamin`, `agama`, `tgl_masuk`, `tgl_keluar`, `id_perusahaan`, `id_departemen`, `id_jabatan`, `id_golongan`, `atasan`, `rekan_kerja`, `rekan_kerja2`, `rekan_kerja3`, `email`, `tgl_appraisal`, `status`) VALUES
(1, 'Agus Gunawan', '7212', 'AGG', 'Laki-Laki', 'Islam', '2007-05-07', '0000-00-00', 1, 23, 56, 8, 'MFS', 'DEK', 'DWW', 'RAI', 'adejonatan@gmail.com', '2022-05-01', 1),
(2, 'Dewi Kemalasari', '14036', 'DEK', 'Perempuan', 'Islam', '2014-11-17', '0000-00-00', 1, 55, 65, 9, 'DWW', 'RAI', 'GSE', 'CMA', 'sistmikpgri@gmail.com', '2017-06-01', 1),
(3, 'Dwi Wicaksono Wibowo', '14034', 'DWW', 'Laki-Laki', 'Islam', '2014-11-03', '0000-00-00', 1, 55, 36, 11, 'IRO', '(NULL)', '(NULL)', '(NULL)', 'adejonatan44@gmail.com', '2017-01-01', 1),
(4, 'M. Feariansyah S', '15066', 'MFS', 'Laki-Laki', 'Islam', '2015-11-16', '0000-00-00', 2, 55, 37, 8, 'RAI', 'DWW', 'TRM', 'IYS', 'adeyonatan@gmail.com', '2021-07-01', 1),
(5, 'Rani Indriani', '7274', 'RAI', 'Perempuan', 'Islam', '2007-10-17', '0000-00-00', 1, 53, 23, 18, 'IRO', '(NULL)', '(NULL)', '(NULL)', 'ajo@haidejo.com', '2017-01-01', 1),
(6, 'Suryani Asikin', '9398', 'SYA', 'Perempuan', 'Islam', '2009-02-25', '0000-00-00', 1, 10, 102, 12, 'IRO', '(NULL)', '(NULL)', '(NULL)', 'suryani@pantarei-ad.com', '2017-01-01', 1),
(7, 'Tri Muttaqin', '15006', 'TRM', 'Laki-Laki', 'Islam', '2015-05-01', '0000-00-00', 1, 53, 38, 9, 'RAI', '(NULL)', '(NULL)', '(NULL)', 'tri.muttaqin@pantarei-ad.com', '2017-09-01', 1),
(8, 'Sartika Dwiputri', '16059', 'SAD', 'Perempuan', 'Islam', '2016-01-12', '0000-00-00', 1, 23, 29, 9, 'NSA', 'MIC', 'KAM', 'SAM', 'sartika.dwiputri@pantarei-ad.com', '2021-06-01', 1),
(9, 'Cynthia Anggraini Sudarto', '17005', 'CAS', 'Perempuan', 'Katolik', '2017-02-16', '0000-00-00', 1, 23, 64, 9, 'AJO', 'ADJ', 'ADJ', 'ADJ', 'cynthia@pantarei-ad.com', '2017-01-01', 1),
(10, 'Irawan Soemardjo', '2715', 'IRO', 'Laki-Laki', 'Islam', '2002-02-18', '0000-00-00', 1, 10, 19, 12, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'irawan@pantarei-ad.com', '1970-01-01', 1),
(11, 'Teguh Pandirian Mashara', '17040', 'TPM', 'Laki-Laki', 'Islam', '2017-10-16', '0000-00-00', 3, 30, 48, 8, 'WTO', 'DLA', 'MRL', 'AJO', 'teguh@w3p.digital', '2021-06-01', 1),
(12, 'Bramanzah Anandityo', '18018', 'BAN', 'Laki-Laki', 'Islam', '2018-05-02', '0000-00-00', 1, 23, 28, 8, 'NSA', 'AAL', 'SAD', 'MIC', 'bramanzah.anandityo@pantarei-ad.com', '2022-08-01', 1),
(13, 'Pirli Abi Saputra', '17204', 'PIR', 'Laki-Laki', 'Islam', '2018-01-01', '0000-00-00', 1, 55, 70, 6, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'pantarei.sob@gmail.com', '2018-03-31', 1),
(14, 'Sukoco', '17301', 'SKC', 'Laki-Laki', 'Islam', '2017-05-04', '0000-00-00', 1, 55, 74, 6, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'pantarei.sob@gmail.com', '2017-08-03', 1),
(15, 'Bobby Ferry', '17022', 'BOF', 'Laki-Laki', 'Islam', '2017-05-04', '0000-00-00', 1, 55, 74, 6, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'pantarei.sob@gmail.com', '2017-07-03', 1),
(16, 'Solikun', '17303', 'SLK', 'Laki-Laki', 'Islam', '2017-05-04', '0000-00-00', 1, 55, 74, 6, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'pantarei.sob@gmail.com', '2017-08-03', 1),
(17, 'Muhammad Indra Cahya', '18027', 'MIC', 'Laki-Laki', 'Islam', '2018-07-02', '0000-00-00', 1, 54, 57, 8, 'SYA', 'NSA', 'MHU', 'DES', 'indra.cahya@pantarei-ad.com', '2021-10-01', 1),
(18, 'Yori Rizki Akbar', '18036', 'YRA', 'Laki-Laki', 'Islam', '2018-10-15', '0000-00-00', 1, 23, 27, 9, 'NSA', 'AHS', 'IBP', 'MHU', 'yori.akbar@pantarei-ad.com', '2022-02-01', 1),
(19, 'Jasmine Poetri', '18043', 'JAP', 'Perempuan', 'Islam', '2018-11-12', '0000-00-00', 3, 20, 59, 8, 'RNL', 'RDE', 'SLG', 'WTO', 'jasmine@w3p.digital', '2021-11-01', 1),
(20, 'Eko Hadi Cahyono', '18048', 'EHC', 'Laki-Laki', 'Islam', '2018-07-01', '0000-00-00', 2, 55, 41, 6, 'NAS', '(NULL)', '(NULL)', '(NULL)', 'eko.cahyono@mataangin.co.id', '2019-06-30', 1),
(21, 'Abdul Azis', '19001', 'ABA', 'Laki-Laki', 'Islam', '2019-01-02', '0000-00-00', 2, 30, 56, 8, 'IPS', 'AYW', 'RPE', 'SAS', 'abdul.azis@mataangin.co.id', '2021-02-01', 1),
(22, 'Iqbal Noviandy', '19010', 'IQN', 'Laki-Laki', 'Islam', '2019-02-18', '0000-00-00', 2, 30, 24, 8, 'IPS', 'AYW', 'RPE', 'SAS', 'iqbal.noviandy@mataangin.co.id', '2021-04-15', 1),
(23, 'Andi Fadilah', '19012', 'ANF', 'Laki-Laki', 'Islam', '2019-03-04', '0000-00-00', 1, 23, 24, 8, 'AHT', 'TRD', 'PTE', 'SNA', 'andi.fadilah@pantarei-ad.com', '2022-06-01', 1),
(24, 'Cynthia Anggraini Sudarto', '99995', 'CYN', 'Perempuan', 'Katolik', '2017-02-16', '0000-00-00', 3, 10, 64, 9, 'WTO', '(NULL)', '(NULL)', '(NULL)', 'cynthia@w3p.digital', '2017-05-16', 1),
(25, 'TB. Liswan Mulyana', '19017', 'TLM', 'Laki-Laki', 'Islam', '2019-04-01', '0000-00-00', 2, 30, 28, 8, 'NPR', 'YKG', 'YKH', 'XHS', 'liswan.mulyana@mataangin.co.id', '2021-07-01', 1),
(26, 'Nugroho Nurarifin', '19018', 'NUN', 'Laki-Laki', 'Islam', '2019-04-08', '0000-00-00', 1, 23, 80, 18, 'HER', 'IRO', 'SYA', '(NULL)', 'nugroho.nurarifin@pantarei-ad.com', '2019-07-05', 1),
(27, 'Raymond Iskandar', '19020', 'RIS', 'Laki-Laki', 'Katolik', '2019-04-29', '0000-00-00', 1, 23, 25, 9, 'AHT', 'AAL', 'AAM', 'TES', 'raymond.iskandar@pantarei-ad.com', '2022-01-01', 1),
(28, 'Indra Bayu Prasta', '19021', 'IBP', 'Laki-Laki', 'Islam', '2019-05-02', '0000-00-00', 1, 23, 28, 8, 'NSA', 'MIC', 'BAN', 'ERM', 'indra.bayu@pantarei-ad.com', '2022-08-01', 1),
(29, 'Meltrin Hutabarat', '19027', 'MHU', 'Perempuan', 'Protestan', '2019-05-20', '0000-00-00', 1, 23, 14, 9, 'SYA', 'MIC', 'NSA', 'KAM', 'meltrin.hutabarat@pantarei-ad.com', '2021-06-01', 1),
(30, 'Riessang NPA', '19602', 'RNP', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 81, 11, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2019-07-31', 1),
(31, 'Jatiwaluyo', '19603', 'JTW', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 82, 10, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2021-02-01', 1),
(32, 'Bayu Agustianto', '19605', 'BAG', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 84, 10, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2019-07-31', 1),
(33, 'Wijaya Hadikusuma', '19606', 'WIH', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 14, 9, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'wijaya@imadi.id', '2019-07-31', 1),
(34, 'Arief Abiromo', '19607', 'AAB', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 14, 9, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'abi@imadi.id', '2019-02-01', 1),
(35, 'Muhammad Junaidi Suswandi', '19608', 'MJS', 'Laki-Laki', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 85, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2019-07-31', 1),
(36, 'Putri Indah Sari', '19609', 'PIS', 'Perempuan', 'Islam', '2019-05-01', '0000-00-00', 5, 4, 14, 9, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2021-02-01', 1),
(37, 'Ahmad Syauqi', '19028', 'AHS', 'Laki-Laki', 'Islam', '2019-06-17', '0000-00-00', 1, 23, 28, 8, 'NSA', 'MIC', 'PMG', 'ERM', 'ahmad.syauqi@pantarei-ad.com', '2021-10-01', 1),
(38, 'Gani Setiadi', '19032', 'GSE', 'Laki-Laki', 'Islam', '2019-07-01', '0000-00-00', 1, 55, 5, 8, 'GTA', 'AJO', 'AJO', 'AJO', 'gani.setiadi@pantarei-ad.com', '2021-01-01', 1),
(39, 'Albenna Reevo', '19030', 'ALR', 'Laki-Laki', 'Islam', '2019-07-01', '0000-00-00', 2, 20, 14, 9, 'ELN', 'BFW', 'JCH', 'ASW', 'albenna.reevo@mataangin.co.id', '2021-10-01', 1),
(40, 'Faritz Hanif Fadillah', '19611', 'FHF', 'Laki-Laki', 'Islam', '2019-07-15', '0000-00-00', 5, 4, 14, 9, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'admin@imadi.id', '2021-11-01', 1),
(41, 'Ratri Indah Wijayanti', '19612', 'RIW', 'Perempuan', 'Islam', '2019-07-16', '0000-00-00', 5, 4, 86, 8, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'ratri@imadi.id', '2021-10-01', 1),
(42, 'Cindy Marcela', '19036', 'CMA', 'Perempuan', 'Islam', '2019-07-25', '0000-00-00', 1, 55, 42, 8, 'DEK', 'RAI', 'GSE', 'VSK', 'cindy.marcela@pantarei-ad.com', '2022-11-01', 1),
(43, 'Ayu Ammalia Pertiwi', '19040', 'AAM', 'Perempuan', 'Islam', '2019-08-12', '0000-00-00', 1, 23, 26, 8, 'MCM', 'SNA', 'RIS', 'TES', 'ayu.ammalia@pantarei-ad.com', '2022-11-01', 1),
(44, 'Eska Haris', '19041', 'ESK', 'Laki-Laki', 'Katolik', '2019-09-10', '0000-00-00', 2, 30, 26, 8, 'IPS', 'AYW', 'RPE', 'SAS', 'eska.haris@mataangin.co.id', '2021-01-01', 1),
(45, 'Hanasheila Fitria', '19613', 'HAF', 'Perempuan', 'Islam', '2019-08-01', '0000-00-00', 5, 4, 6, 8, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'sheila@imadi.id', '2021-11-01', 1),
(46, 'Ade Jonatanx', '19045', 'AJO', 'Laki-Laki', 'Protestan', '2019-08-02', '0000-00-00', 1, 23, 43, 8, 'ADJ', 'AJO', 'ADJ', 'AJO', 'ade.jonatan@pantarei-ad.com', '2022-01-01', 1),
(47, 'Khansya Ayu Meiliani', '19046', 'KAM', 'Perempuan', 'Islam', '2019-09-23', '0000-00-00', 1, 23, 13, 9, 'MHU', 'YAP', 'MIC', 'ERM', 'khansya.ayu@pantarei-ad.com', '2021-12-22', 1),
(48, 'Deddy Setiawan', '19048', 'DES', 'Laki-Laki', 'Katolik', '2019-10-01', '0000-00-00', 1, 23, 25, 9, 'NSA', 'AAL', 'MHU', 'ERM', 'deddy.setiawan@pantarei-ad.com', '2022-01-01', 1),
(49, 'Yocie Kumala Gayatri', '19049', 'YKG', 'Perempuan', 'Islam', '2019-10-15', '0000-00-00', 2, 20, 6, 8, 'AYW', 'IQN', 'RPE', 'ESK', 'yocie.kumala@mataangin.co.id', '2021-01-01', 1),
(50, 'Yudhistira Adhi Pratama', '19052', 'YAP', 'Laki-Laki', 'Islam', '2019-11-11', '0000-00-00', 1, 23, 6, 8, 'MHU', 'KAM', 'NTR', 'CHN', 'yudhistira.adhi@pantarei-ad.com', '2022-02-01', 1),
(51, 'Novia Satyawati Achmadi', '19047', 'NSA', 'Perempuan', 'Islam', '2019-11-12', '0000-00-00', 1, 23, 30, 10, 'AAL', 'MHU', 'DES', 'CHN', 'novia.achmadi@pantarei-ad.com', '2021-02-01', 1),
(52, 'Adi Prasetio Pamuji', '19056', 'APP', 'Laki-Laki', 'Islam', '2019-12-02', '0000-00-00', 2, 30, 87, 8, 'IPS', 'AYW', 'RPE', 'YKG', 'adi.prasetio@mataangin.co.id', '2021-03-01', 1),
(53, 'Tenri Esa Suyoto', '19057', 'TES', 'Perempuan', 'Islam', '2019-12-02', '0000-00-00', 1, 23, 13, 8, 'AML', 'SNA', 'RIS', 'AAM', 'tenri.esa@pantarei-ad.com', '2021-12-01', 1),
(54, 'Rheza Pramudita', '20005', 'RHP', 'Laki-Laki', 'Islam', '2020-01-06', '0000-00-00', 2, 30, 88, 8, 'AGP', 'NPR', 'BTM', 'LKP', 'rheza.pramudita@mataangin.co.id', '2021-04-01', 1),
(55, 'Xenia Heptapami Susetyo', '20006', 'XHS', 'Perempuan', 'Protestan', '2020-01-02', '0000-00-00', 2, 30, 57, 8, 'AGP', 'JCH', 'RAI', 'BTM', 'xenia.susetyo@mataangin.co.id', '2021-04-01', 1),
(56, 'Aidil Akbar Latief', '20007', 'AAL', 'Laki-Laki', 'Islam', '2020-01-02', '0000-00-00', 1, 10, 33, 11, 'NUN', '(NULL)', '(NULL)', '(NULL)', 'aidil.akbar@pantarei-ad.com', '2021-02-01', 1),
(57, 'Eko Sumarno', '20009', 'ESU', 'Laki-Laki', 'Islam', '2020-01-02', '0000-00-00', 2, 30, 56, 8, 'ESU', 'XHS', 'BTM', 'MID', 'eko.sumarno@mataangin.co.id', '2021-02-01', 1),
(58, 'Selvi Wennelia Rieni', '20016', 'SWR', 'Perempuan', 'Islam', '2020-01-06', '0000-00-00', 2, 30, 26, 8, 'BTM', 'AGP', 'TMP', 'MID', 'selvi.wennelia@mataangin.co.id', '2021-04-01', 1),
(59, 'Ibnu Syech', '20011', 'NAY', 'Laki-Laki', 'Islam', '2020-01-02', '0000-00-00', 2, 30, 28, 8, 'NPR', 'AGP', 'YKH', 'HPA', 'ibnu.syech@mataangin.co.id', '2021-04-01', 1),
(60, 'Yodsa Rienaldo', '20025', 'YRE', 'Perempuan', 'Islam', '2019-02-10', '0000-00-00', 2, 30, 68, 10, 'ELN', 'NPR', 'YKM', 'ANP', 'yodsa.reinaldo@mataangin.co.id', '2021-05-31', 1),
(61, 'Syamsudin', '20030', 'SAM', 'Laki-Laki', 'Islam', '2020-02-03', '0000-00-00', 1, 23, 56, 8, 'NSA', 'MHU', 'KAM', 'MIC', 'syamsudin@pantarei-ad.com', '2022-05-01', 1),
(62, 'Ignasius Yudhi Subiyarto', '20032', 'IYS', 'Laki-Laki', 'Katolik', '2020-02-03', '0000-00-00', 2, 55, 37, 8, 'DWW', '(NULL)', '(NULL)', '(NULL)', 'yudhi.subiyarto@mataangin.co.id', '2020-05-31', 1),
(63, 'Muhammad Harish Soewandi', '20034', 'HRS', 'Laki-Laki', 'Islam', '2020-02-11', '0000-00-00', 2, 30, 87, 8, 'AGP', 'BTM', 'XHS', 'RHP', 'harish.soewandi@mataangin.co.id', '2021-05-01', 1),
(64, 'Santi Mantika Irsani', '20038', 'SMI', 'Perempuan', 'Islam', '2020-02-10', '0000-00-00', 2, 20, 6, 8, 'NPI', 'ZKA', 'XHS', 'DWP', 'santi.mantika@mataangin.co.id', '2021-05-01', 1),
(65, 'Annisa Chairiyanti', '20039', 'ACH', 'Perempuan', 'Islam', '2020-03-02', '0000-00-00', 2, 20, 6, 8, 'ALR', 'ELN', 'TPM', 'XHS', 'annisa.chairiyanti@mataangin.co.id', '2021-06-01', 1),
(66, 'Diva Efriza Genio', '20018', 'DEG', 'Laki-Laki', 'Islam', '2020-02-03', '0000-00-00', 1, 23, 28, 8, 'AHT', 'RIS', 'AAM', 'TES', 'efriza.genio@pantarei-ad.com', '2021-05-01', 1),
(67, 'Dina Meylani', '20045', 'DMN', 'Perempuan', 'Islam', '2020-02-20', '0000-00-00', 1, 23, 16, 9, 'SYA', 'AHT', 'MND', 'SHF', 'dina.meylani@pantarei-ad.com', '2022-01-01', 1),
(68, 'Adeprianto Nugroho', '20046', 'ADP', 'Laki-Laki', 'Islam', '2020-03-11', '0000-00-00', 2, 30, 28, 8, 'BTM', 'XHS', 'DFE', 'MID', 'ade.prianto@mataangin.co.id', '2021-06-01', 1),
(69, 'Ni Desak Gde Gayatri F', '20047', 'NDG', 'Perempuan', 'Hindu', '2020-02-24', '0000-00-00', 1, 23, 87, 8, 'NSA', 'CHN', 'YAP', 'MIC', 'desak.gayatri@pantarei-ad.com', '2022-06-01', 1),
(70, 'Safira Nur Alifah', '20049', 'SNA', 'Perempuan', 'Islam', '2020-02-27', '0000-00-00', 1, 23, 57, 8, 'DMN', 'AHT', 'TES', 'RAN', 'safira.alifah@pantarei-ad.com', '2021-09-12', 1),
(71, 'Lukman Nul Hakim', '20052', 'LNH', 'Laki-Laki', 'Islam', '2020-02-19', '0000-00-00', 2, 55, 43, 8, 'DWW', 'DWW', 'PDG', 'GSE', 'lukman.hakim@mataangin.co.id', '2021-06-01', 1),
(72, 'Sadewa Kristianto Darta', '20054', 'SKD', 'Laki-Laki', 'Islam', '2020-01-29', '0000-00-00', 1, 23, 28, 8, 'AHT', 'AAL', 'DMN', 'TRD', 'sadewa.kristianto@pantarei-ad.com', '2021-12-01', 1),
(73, 'Ardika Pradnya', '20055', 'APD', 'Laki-Laki', 'Islam', '2020-03-06', '0000-00-00', 2, 30, 26, 8, 'BFW', 'JCH', 'AKR', 'CHS', 'ardika.pradnya@mataangin.co.id', '2022-06-01', 1),
(74, 'M F Khadafi', '20056', 'MFK', 'Laki-Laki', 'Islam', '2020-02-25', '0000-00-00', 1, 23, 28, 8, 'AHT', 'DMN', 'SKD', 'SNA', 'muhammad.khadafi@pantarei-ad.com', '2022-06-01', 1),
(75, 'Rangga Indra Pratama', '20057', 'RAP', 'Laki-Laki', 'Islam', '2020-03-02', '0000-00-00', 1, 23, 26, 8, 'MCM', 'TES', 'DMN', 'SNA', 'rangga.indra@pantarei-ad.com', '2021-12-01', 1),
(76, 'Arif Ramadani', '20058', 'ARA', 'Laki-Laki', 'Islam', '2020-02-28', '0000-00-00', 2, 30, 28, 8, 'DWP', 'SMI', 'DZN', 'XHS', 'arif.ramadani@mataangin.co.id', '2021-06-01', 1),
(77, 'Cherlita Christanti', '20063', 'CHS', 'Perempuan', 'Katolik', '2020-03-16', '0000-00-00', 2, 30, 24, 8, 'AYW', 'AKR', 'APD', 'AGT', 'cherlita.christanti@mataangin.co.id', '2021-06-11', 1),
(78, 'Milka Yuliana Haryono', '20065', 'MYH', 'Laki-Laki', 'Protestan', '2020-03-09', '0000-00-00', 2, 30, 26, 8, 'DWP', 'SMI', 'DZN', 'XHS', 'milka.yuliana@mataangin.co.id', '2021-06-01', 1),
(79, 'Nesya Prinsesva Putri', '20066', 'NPI', 'Perempuan', 'Islam', '2020-03-10', '0000-00-00', 2, 20, 14, 10, 'ELN', 'DWP', 'YKM', 'SMI', 'nesya.putri@mataangin.co.id', '2021-06-01', 1),
(80, 'Balya Kretarta', '20067', 'BAK', 'Laki-Laki', 'Islam', '2020-03-16', '0000-00-00', 2, 30, 87, 9, 'BTM', 'HRS', 'XHS', 'LKP', 'balya.kretarta@mataangin.co.id', '2021-07-01', 1),
(81, 'Rabiatul Aini Harahap', '20069', 'RAH', 'Laki-Laki', 'Islam', '2020-03-16', '0000-00-00', 2, 98, 59, 8, 'YRE', 'ANM', 'ZTP', 'PAU', 'aini.harahap@mataangin.co.id', '2021-07-01', 1),
(82, 'Yusuf Kenang Hidayat', '20075', 'YKH', 'Laki-Laki', 'Islam', '2020-03-01', '0000-00-00', 2, 30, 25, 8, 'NPR', 'NAY', 'HPA', 'MZA', 'yusuf.kenang@mataangin.co.id', '2021-04-08', 1),
(83, 'Christa Gabriella Emma M', '20077', 'CGE', 'Perempuan', 'Protestan', '2020-05-04', '0000-00-00', 2, 30, 27, 9, 'NPR', 'XHS', 'YKM', 'NAY', 'christa.emma@mataangin.co.id', '2021-09-08', 1),
(84, 'Andhika Paramita', '20079', 'ANP', 'Perempuan', 'Islam', '2020-05-11', '0000-00-00', 2, 66, 89, 9, 'KYS', 'OTE', 'RAH', 'XHS', 'andhika.paramita@mataangin.co.id', '2021-08-01', 1),
(85, 'Ade Jonatan', '20085', 'ADJ', 'Laki-Laki', 'Protestan', '2019-09-12', '0000-00-00', 6, 56, 43, 8, 'DWI', 'RAN', 'GSE', 'LNH', 'adejonatan@pinc.group', '2021-12-03', 1),
(86, 'Gani Setiadi', '20086', 'GNS', 'Laki-Laki', 'Islam', '2019-07-01', '0000-00-00', 6, 57, 5, 8, 'GTA', 'KML', 'ADJ', 'DWI', 'gani@pinc.group', '2021-10-01', 1),
(87, 'Nurman Prasetyo', '20089', 'NPR', 'Laki-Laki', 'Islam', '2020-06-02', '0000-00-00', 2, 30, 54, 10, 'YOM', 'YKM', 'BTM', 'CGE', 'nurman.prasetyo@mataangin.co.id', '2021-09-01', 1),
(88, 'Elsya Ramadhani', '20090', 'ERM', 'Perempuan', 'Islam', '2020-06-02', '0000-00-00', 1, 23, 6, 8, 'MHU', 'KAM', 'IBP', 'MIC', 'elsya.ramadhani@pantarei-ad.com', '2022-09-01', 1),
(89, 'Daniel Adi Putro Nugroho', '20094', 'DNP', 'Laki-Laki', 'Islam', '2020-06-08', '0000-00-00', 1, 23, 29, 8, 'AHT', 'SNA', 'RIS', 'TES', 'daniel.adi@pantarei-ad.com', '2022-09-01', 1),
(90, 'Benny Oetama', '20098', 'BTM', 'Laki-Laki', 'Budha', '2020-06-22', '0000-00-00', 2, 30, 30, 10, 'NPR', 'TMP', 'XHS', 'YKM', 'benny.oetama@mataangin.co.id', '2021-10-01', 1),
(91, 'Sekar Lenggo Geni', '20103', 'SLG', 'Perempuan', 'Islam', '2020-07-15', '0000-00-00', 3, 20, 13, 8, 'WTO', 'DLA', 'TPM', 'JAP', 'sekar@w3p.digital', '2021-08-14', 1),
(92, 'Alvian', '20106', 'ALV', 'Laki-Laki', 'Protestan', '2020-07-13', '0000-00-00', 2, 30, 28, 8, 'BFW', 'JCH', 'APD', 'APP', 'alvian@mataangin.co.id', '2021-10-10', 1),
(93, 'Dewi Kemalasari', '20107', 'KML', 'Perempuan', 'Islam', '2014-11-17', '0000-00-00', 6, 57, 65, 10, 'DWI', 'RAN', 'GNS', 'CIN', 'mala@pinc.group', '2021-06-01', 1),
(94, 'Michael D. Sudarto', '20110', 'MSD', 'Laki-Laki', 'Katolik', '1997-12-18', '0000-00-00', 6, 91, 21, 13, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'michael@pinc.group', '2017-01-01', 1),
(95, 'Irawan Soemardjo', '20111', 'IRW', 'Laki-Laki', 'Islam', '2002-02-18', '0000-00-00', 6, 91, 19, 12, 'MSD', '(NULL)', '(NULL)', '(NULL)', 'irawan@pinc.group', '2021-02-18', 1),
(96, 'Hermanto Soerjanto', '20112', 'HER', 'Laki-Laki', 'Protestan', '2005-01-05', '0000-00-00', 6, 91, 22, 13, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'hermanto@pinc.group', '2021-01-04', 1),
(97, 'Rani Indriani', '10113', 'RAN', 'Perempuan', 'Islam', '2007-10-17', '0000-00-00', 6, 52, 23, 11, 'IRW', 'DWI', 'TQN', 'MFS', 'rani@pinc.group', '2022-01-01', 1),
(98, 'Dwi Wicaksono Wibowo', '20114', 'DWI', 'Laki-Laki', 'Islam', '2014-11-03', '0000-00-00', 6, 57, 95, 11, 'IRW', 'RAN', 'GNS', 'KML', 'ino@pinc.group', '2022-01-01', 1),
(99, 'Tri Muttaqin', '20115', 'TQN', 'Laki-Laki', 'Islam', '2015-05-01', '0000-00-00', 6, 52, 38, 10, 'RAN', 'DWI', 'MFS', 'IGY', 'tri.muttaqin@pinc.group', '2021-09-01', 1),
(100, 'Cindy Marcela', '20116', 'CIN', 'Perempuan', 'Islam', '2019-07-24', '0000-00-00', 6, 55, 42, 8, 'KML', 'DWI', 'GNS', 'RAN', 'cindy@pinc.group', '2021-11-01', 1),
(101, 'Ignasius Yudhi Subiyarto', '20117', 'IGY', 'Laki-Laki', 'Katolik', '2020-02-03', '0000-00-00', 6, 52, 37, 8, 'RAN', 'TQN', 'MFS', 'DWI', 'yudhi@pinc.group', '2021-05-01', 1),
(102, 'Sismita', '20121', 'SMT', 'Perempuan', 'Islam', '2020-08-18', '0000-00-00', 1, 23, 96, 8, 'SYA', 'AML', 'RYN', 'AHT', 'sismita@pantarei-ad.com', '2021-09-20', 1),
(103, 'Algesta Oktrivalda', '20122', 'ALO', 'Laki-Laki', 'Islam', '2020-08-24', '0000-00-00', 1, 23, 28, 8, 'NSA', 'MHU', 'IBP', 'HZG', 'algesta.oktrivalda@pantarei-ad.com', '2021-11-01', 1),
(104, 'Ahdiyat Nur Hartarta', '20128', 'AHT', 'Laki-Laki', 'Islam', '2020-09-16', '0000-00-00', 1, 23, 30, 10, 'AAL', 'DMN', 'RIS', 'TRD', 'ahdiyat@pantarei-ad.com', '2022-01-01', 1),
(105, 'Akhmad Ilyas Rivani', '20129', 'AKR', 'Laki-Laki', 'Islam', '2020-09-21', '0000-00-00', 2, 30, 24, 8, 'BFW', 'ALR', 'JCH', 'IKN', 'akhmad.ilyas@mataangin.co.id', '2021-10-01', 1),
(106, 'Lukman Prayogo', '20133', 'LKP', 'Laki-Laki', 'Islam', '2020-10-02', '0000-00-00', 2, 30, 87, 8, 'BTM', 'AGP', 'RHP', 'HRS', 'lukman.prayogo@mataangin.co.id', '2021-01-01', 1),
(107, 'Dadang Zulian', '20134', 'DZN', 'Laki-Laki', 'Islam', '2020-10-05', '0000-00-00', 2, 30, 24, 8, 'IPS', 'AYW', 'RPE', 'SAS', 'dadang.zulian@mataangin.co.id', '2021-01-01', 1),
(108, 'Devi Lia Rinada', '20137', 'DLA', 'Perempuan', 'Islam', '2020-10-21', '0000-00-00', 3, 20, 14, 10, 'RNL', 'WTO', 'RDE', 'SLG', 'delia@w3p.digital', '2021-02-01', 1),
(109, 'Cynthia Anggraini Sudarto', '20138', 'CYS', 'Perempuan', 'Protestan', '2019-01-01', '0000-00-00', 6, 94, 93, 18, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'cynthia@pinc.group', '2020-12-31', 1),
(110, 'Ronald Kevin Alfian', '20637', 'RKA', 'Laki-Laki', 'Katolik', '2020-11-02', '0000-00-00', 5, 4, 68, 8, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'ronald@imadi.id', '2021-02-01', 1),
(111, 'Dwiarto Purnomo Otten', '20140', 'DWP', 'Laki-Laki', 'Islam', '2020-11-19', '0000-00-00', 2, 92, 30, 10, 'YOM', 'NPI', 'DZN', 'XHS', 'dwiarto.otten@mataangin.co.id', '2021-11-01', 1),
(112, 'Nissa Triafni', '20141', 'NTR', 'Perempuan', 'Islam', '2020-11-23', '0000-00-00', 1, 23, 90, 8, 'MHU', 'CHN', 'YAP', 'MIC', 'nissa.triafni@pantarei-ad.com', '2022-03-01', 1),
(113, 'Satrio Pamungkas', '20143', 'SPS', 'Laki-Laki', 'Katolik', '2020-12-01', '0000-00-00', 1, 23, 28, 8, 'NSA', 'AAL', 'GHY', 'YAP', 'satrio.pamungkas@pantarei-ad.com', '2022-03-01', 1),
(114, 'Nugroho Nurarifin', '20146', 'NUG', 'Laki-Laki', 'Islam', '2019-04-08', '0000-00-00', 6, 91, 94, 18, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'nugi@pinc.group', '2021-07-08', 1),
(115, 'Puti Ambang Gemilang', '21006', 'PMG', 'Perempuan', 'Islam', '2021-01-07', '0000-00-00', 1, 68, 27, 9, 'NSA', 'MIC', 'MHU', 'AHS', 'puti.ambang@pantarei-ad.com', '2022-04-01', 1),
(116, 'Veby Puspita', '21601', 'VBP', 'Perempuan', 'Islam', '2021-01-01', '0000-00-00', 5, 4, 14, 10, 'BAG', '(NULL)', '(NULL)', '(NULL)', 'veby@imadi.id', '2021-02-01', 1),
(117, 'Nuke Amalia Lutfianti', '21007', 'NAL', 'Perempuan', 'Islam', '2021-01-15', '0000-00-00', 2, 97, 13, 9, 'ALR', 'ACH', 'MID', 'XHS', 'nuke.amalia@mataangin.co.id', '2021-04-01', 1),
(118, 'Fauzan Gozali', '21010', 'FGI', 'Laki-Laki', 'Islam', '2021-02-01', '0000-00-00', 1, 24, 68, 8, 'FGI', 'NTR', 'YAP', 'NSA', 'fauzan.gozali@pantarei-ad.com', '2021-05-01', 1),
(119, 'Yasmine Kristanti.M', '21011', 'YKM', 'Perempuan', 'Islam', '2021-02-08', '0000-00-00', 2, 20, 17, 11, 'ELN', 'NPR', 'YRE', 'TDR', 'yasmine.kristanti@mataangin.co.id', '2021-05-07', 1),
(120, 'M Ryan Nugraha', '21013', 'RYN', 'Laki-Laki', 'Islam', '2021-02-15', '0000-00-00', 1, 23, 96, 10, 'SYA', 'TES', 'MHU', 'DMN', 'ryan@pantarei-ad.com', '2021-05-28', 1),
(121, 'Patricia Elle Kristiyanti S', '21014', 'PTE', 'Perempuan', 'Protestan', '2021-02-22', '0000-00-00', 1, 23, 6, 8, 'DMN', 'ANF', 'SKD', 'SNA', 'patricia.elle@pantarei-ad.com', '2021-06-01', 1),
(122, 'Jasiman', '21015', 'JSM', 'Laki-Laki', 'Islam', '2021-02-01', '0000-00-00', 6, 55, 41, 8, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'jasiman@pinc.group', '2022-02-01', 1),
(123, 'Amanda Lestari', '21016', 'AML', 'Perempuan', 'Katolik', '2021-03-01', '0000-00-00', 1, 23, 16, 11, 'SYA', 'AHT', 'TES', 'SNA', 'amanda.lestari@pantarei-ad.com', '2022-06-01', 1),
(124, 'Bramantyo F. Wibowo', '21017', 'BFW', 'Laki-Laki', 'Islam', '2021-03-01', '0000-00-00', 2, 30, 33, 11, 'YOM', 'ALR', 'AYW', 'AKR', 'fauke.bramantyo@mataangin.co.id', '2021-06-06', 1),
(125, 'Viska Septivi Narni', '21020', 'VSK', 'Perempuan', 'Islam', '2021-03-25', '0000-00-00', 2, 55, 41, 8, 'DWW', 'CMA', 'GSE', 'DEK', 'viska.septivi@mataangin.co.id', '2021-07-01', 1),
(126, 'Herzuginandha', '21021', 'HZG', 'Laki-Laki', 'Islam', '2021-03-29', '0000-00-00', 1, 23, 30, 10, 'AAL', 'NSA', 'MIC', 'MHU', 'herzugi.nandha@pantarei-ad.com', '2021-07-01', 1),
(127, 'Ciko Septyani', '21024', 'CSN', 'Perempuan', 'Islam', '2021-05-03', '0000-00-00', 3, 20, 101, 11, 'WTO', 'ARJ', 'DLA', 'TPM', 'chicco@w3p.digital', '2021-08-01', 1),
(128, 'Desti Srikandi Fatimah', '21025', 'DSR', 'Perempuan', 'Islam', '2021-05-03', '0000-00-00', 1, 23, 69, 8, 'NSA', 'MIC', 'YAP', 'DES', 'desti.srikandi@pantarei-ad.com', '2021-08-01', 1),
(129, 'Praharani Elok Perdana W', '21026', 'PRN', 'Perempuan', 'Islam', '2021-05-06', '0000-00-00', 2, 67, 6, 8, 'AYW', 'JCH', 'AGT', 'LNN', 'praharani.elok@mataangin.co.id', '2021-08-01', 1),
(130, 'Anggit Gita Parikesit', '21027', 'AGT', 'Laki-Laki', 'Islam', '2021-05-17', '0000-00-00', 2, 30, 24, 8, 'AYW', 'JCH', 'PRN', 'LNN', 'anggit.parikesit@mataangin.co.id', '2021-09-01', 1),
(131, 'Gardhika Jatikusuma', '21028', 'GJT', 'Laki-Laki', 'Islam', '2021-06-01', '0000-00-00', 3, 30, 24, 8, 'TPM', 'MRL', 'DLA', 'JAP', 'gardhika@w3p.digital', '2021-09-01', 1),
(132, 'Raymond Iskandar', '19020', 'RIS', 'Laki-Laki', 'Katolik', '2019-04-29', '0000-00-00', 1, 23, 25, 9, 'AHT', 'AAL', 'AAM', 'TES', 'raymond.iskandar@pantarei-ad.com', '2021-06-04', 1),
(133, 'Muji Taba', '21902', 'MUT', 'Laki-Laki', 'Islam', '1970-01-01', '0000-00-00', 7, 1, 103, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'muji@batubata.co.id', '1970-01-01', 1),
(134, 'Herni Diana', '21909', 'HED', 'Perempuan', 'Islam', '2019-11-05', '0000-00-00', 7, 2, 105, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'herni@batubata.co.id', '1970-07-01', 1),
(135, 'Arman Firmansyah', '21901', 'AFH', 'Laki-Laki', 'Islam', '2020-11-21', '0000-00-00', 7, 4, 70, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'arman@batubata.co.id', '1970-07-01', 1),
(136, 'Yodia Anggiani', '21914', 'YDA', 'Perempuan', 'Islam', '2020-01-14', '0000-00-00', 7, 5, 6, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'yodia@batubata.co.id', '1970-01-01', 1),
(137, 'Asep Imron Mubarok', '21921', 'AIM', 'Laki-Laki', 'Islam', '2020-04-21', '0000-00-00', 7, 3, 108, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'asep@batubata.co.id', '1970-01-01', 1),
(138, 'Yayan Hariansyah', '21903', 'YHS', 'Laki-Laki', 'Islam', '2019-09-24', '0000-00-00', 7, 5, 115, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'yayan@batubata.co.id', '1970-01-01', 1),
(139, 'Reza Firmansyah', '21904', 'RFY', 'Laki-Laki', 'Islam', '2019-10-07', '0000-00-00', 7, 5, 115, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'reza@batubata.co.id', '1970-01-01', 1),
(140, 'Abdul Malik Rachman', '21913', 'AMR', 'Laki-Laki', 'Islam', '2019-01-02', '0000-00-00', 7, 5, 114, 11, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'malik@batubata.co.id', '1970-01-01', 1),
(141, 'Renny Latifah', '21916', 'RYL', 'Perempuan', 'Islam', '2019-12-02', '0000-00-00', 7, 5, 114, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'renny@batubata.co.id', '1970-01-01', 1),
(142, 'Agny Arma Ratrika Sari', '21918', 'AGR', 'Perempuan', 'Islam', '2020-01-06', '0000-00-00', 7, 5, 114, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'agny@batubata.co.id', '1970-01-01', 1),
(143, 'febri sri Suwariani', '21919', 'FSS', 'Perempuan', 'Islam', '2020-02-11', '0000-00-00', 7, 5, 114, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'febri@batubata.co.id', '1970-01-01', 1),
(144, 'Agus Irfansyah', '21927', 'AGI', 'Laki-Laki', 'Islam', '2020-12-21', '0000-00-00', 7, 5, 114, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'agus@batubata.co.id', '1970-01-01', 1),
(145, 'Tito Ibnu Aziz', '21924', 'TIZ', 'Laki-Laki', 'Islam', '2020-07-21', '0000-00-00', 7, 6, 116, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'titoibazs@batubata.co.id', '1970-01-01', 1),
(146, 'Ari Sulaiman', '21907', 'ASA', 'Laki-Laki', 'Islam', '2019-09-24', '0000-00-00', 7, 6, 114, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'ari@batubata.co.id', '1970-01-01', 1),
(147, 'Septaria Bernita', '21999', 'SEB', 'Perempuan', 'Islam', '2021-03-22', '0000-00-00', 7, 2, 104, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'tata@batubata.co.id', '1970-01-01', 1),
(148, 'Ranti Indraswari', '21029', 'RNT', 'Perempuan', 'Islam', '2021-06-07', '0000-00-00', 6, 52, 117, 13, 'RAI', '(NULL)', '(NULL)', '(NULL)', 'ranti@pinc.group', '2021-09-01', 1),
(149, 'Ranti Indraswari', '21925', 'RAS', 'Perempuan', 'Islam', '2021-06-07', '0000-00-00', 7, 3, 117, 8, 'RAI', '(NULL)', '(NULL)', '(NULL)', 'ranti@batubata.co.id', '2021-09-01', 1),
(150, 'Nofriwan', '21900', 'NOF', 'Laki-Laki', 'Islam', '2021-06-04', '0000-00-00', 7, 1, 102, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'nofriwan@batubata.co.id', '1970-01-01', 1),
(151, 'Siswi Dewita', '21991', 'SID', 'Perempuan', 'Islam', '2019-09-24', '0000-00-00', 7, 3, 107, 8, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'siswi@batubata.co.id', '1970-01-01', 1),
(152, 'Poppy Anggia Utami Putri', '21030', 'PAU', 'Perempuan', 'Islam', '2021-06-21', '0000-00-00', 2, 98, 90, 8, 'OTE', 'RAH', 'ANM', 'ANP', 'poppy.utami@mataangin.co.id', '2021-09-01', 1),
(153, 'Muhammad Lintang Lazuardi', '21031', 'MLL', 'Laki-Laki', 'Islam', '2021-06-24', '0000-00-00', 2, 94, 6, 8, 'YKM', '(NULL)', '(NULL)', '(NULL)', 'lintang.lazuardi@mataangin.co.id', '2021-10-01', 1),
(154, 'Putri Ramadhani Aditya', '21036', 'PRA', 'Perempuan', 'Islam', '2021-07-05', '0000-00-00', 2, 20, 13, 13, 'YKM', '(NULL)', '(NULL)', '(NULL)', 'putri.ramadhani@mataangin.co.id', '2021-10-05', 1),
(155, 'Rafika', '21037', 'RFK', 'Perempuan', 'Islam', '2021-07-09', '0000-00-00', 2, 20, 14, 10, 'YKM', 'TLS', 'PDD', 'ADP', 'rafika@mataangin.co.id', '2021-10-01', 1),
(156, 'Amira Syifa Wijaksana', '21039', 'ASW', 'Perempuan', 'Islam', '2021-07-11', '0000-00-00', 2, 20, 6, 8, 'ALR', 'JCH', 'AKR', 'APD', 'amira.syifa@mataangin.co.id', '2021-10-01', 1),
(157, 'Daniel Ferryansyah', '21041', 'DFR', 'Laki-Laki', 'Islam', '2021-07-13', '0000-00-00', 1, 23, 25, 9, 'NSA', 'YAP', 'NDG', 'MIC', 'daniel.ferryansyah@pantarei-ad.com', '2021-10-01', 1),
(158, 'Octavianus Tri Endiarto', '21042', 'OTE', 'Laki-Laki', 'Protestan', '2021-07-01', '0000-00-00', 2, 66, 68, 9, 'YKM', 'RAH', 'ANP', 'PAU', 'octavianus.endiarto@mataangin.co.id', '2021-10-01', 1),
(159, 'Francini Yollandara', '21043', 'FRY', 'Laki-Laki', 'Islam', '2021-07-19', '0000-00-00', 1, 23, 28, 8, 'NSA', 'IBP', 'ERM', 'PMG', 'francini.yollandara@pantarei-ad.com', '2021-11-01', 1),
(160, 'Esmaralda Doraldina', '21046', 'EDL', 'Perempuan', 'Islam', '2021-07-19', '0000-00-00', 1, 23, 6, 8, 'AML', 'RIS', 'AAM', 'SNA', 'esmaralda.doraldina@pantarei-ad.com', '2021-11-01', 1),
(161, 'Bagus Priyo Sasmito', '21047', 'BPS', 'Laki-Laki', 'Islam', '2021-07-21', '0000-00-00', 2, 30, 24, 8, 'BFW', 'RDT', 'AKR', 'ALV', 'bagus.priyo@mataangin.co.id', '2021-11-01', 1),
(162, 'ELZARIANA MUCHLIS', '21048', 'EZM', 'Perempuan', 'Islam', '2021-07-21', '0000-00-00', 1, 23, 13, 9, 'MHU', '(NULL)', '(NULL)', '(NULL)', 'elza.riana@pantarei-ad.com', '2021-12-31', 1),
(163, 'Rosvian Fathurrahman', '21049', 'RVF', 'Laki-Laki', 'Islam', '2021-07-23', '0000-00-00', 2, 67, 90, 8, 'AKR', 'ALR', 'MRQ', 'IKN', 'rosvian.faturrahman@mataangin.co.id', '2021-11-01', 1),
(164, 'Andy Raharjo', '21050', 'ARJ', 'Laki-Laki', 'Islam', '2021-07-26', '0000-00-00', 3, 20, 17, 11, 'WTO', '(NULL)', '(NULL)', '(NULL)', 'andy@w3p.digital', '2021-11-01', 1),
(165, 'Yohanes Adriel W', '21054', 'YDR', 'Laki-Laki', 'Protestan', '2021-08-02', '0000-00-00', 2, 67, 89, 8, 'ALR', 'AKR', 'IKN', '(NULL)', 'yohanes.adriel@mataangin.co.id', '2021-11-01', 1),
(166, 'Muhammad Rifqi Ilhami', '21055', 'MRQ', 'Laki-Laki', 'Islam', '2021-08-02', '0000-00-00', 2, 67, 90, 8, 'AKR', 'ALR', 'RVF', 'IKN', 'muhammad.rifqi@mataangin.co.id', '2021-11-01', 1),
(167, 'Bagas Setiawan', '21056', 'BSN', 'Laki-Laki', 'Protestan', '2021-08-02', '0000-00-00', 2, 67, 87, 8, 'BFW', 'RDT', 'APP', 'BPS', 'bagas.setiawan@mataangin.co.id', '2021-11-01', 1),
(168, 'Muhammad Islam', '21057', 'MHM', 'Laki-Laki', 'Islam', '2021-08-04', '0000-00-00', 2, 94, 13, 9, 'ARL', 'RDO', 'XHS', 'CGE', 'muhammad.islam@mataangin.co.id', '2021-11-01', 1),
(169, 'Rinesa Diola Audrina', '21058', 'RDA', 'Perempuan', 'Islam', '2021-08-04', '0000-00-00', 2, 93, 90, 8, 'NPI', 'DKN', 'SMI', '(NULL)', 'nesa.diola@mataangin.co.id', '2021-11-01', 1),
(170, 'Arnold Retno Leopold', '21059', 'ARL', 'Laki-Laki', 'Budha', '2021-08-05', '0000-00-00', 2, 94, 14, 9, 'YKM', 'CGE', 'RDO', 'XHS', 'arnold.leopold@mataangin.co.id', '2021-11-01', 1),
(171, 'Dhaifina Iken Mazaya', '21060', 'DKN', 'Perempuan', 'Islam', '2021-08-09', '0000-00-00', 2, 66, 96, 8, 'NPI', 'XHS', 'DWP', 'RDA', 'dhaifina.iken@mataangin.co.id', '2021-11-01', 1),
(172, 'Rido Prasetyo', '21061', 'RDO', 'Laki-Laki', 'Islam', '2021-08-09', '0000-00-00', 2, 94, 13, 9, 'YKM', 'XHS', 'MHM', 'ARL', 'rido.prasetyo@mataangin.co.id', '2021-11-01', 1),
(173, 'Agung Suksma Putra P.', '21062', 'ASP', 'Laki-Laki', 'Islam', '2021-07-09', '0000-00-00', 2, 96, 24, 8, 'BTM', 'ADP', 'XHS', 'RFK', 'agung.suksma@mataangin.co.id', '2021-11-01', 1),
(174, 'Muhammad Wildan', '21063', 'MWD', 'Laki-Laki', 'Islam', '2021-08-23', '0000-00-00', 1, 23, 90, 8, 'FGI', 'MHU', 'YAP', 'NTR', 'muhammad.wildan@pantarei-ad.com', '2021-12-01', 1),
(175, 'Tiara Larasati', '21064', 'TLS', 'Perempuan', 'Islam', '2021-08-23', '0000-00-00', 2, 97, 6, 8, 'RFK', 'XHS', 'ADP', '(NULL)', 'tiara.larasati@mataangin.co.id', '2021-12-01', 1),
(176, 'Mochamad Iksan Hermana', '20165', 'IKN', 'Laki-Laki', 'Islam', '2021-08-30', '0000-00-00', 2, 30, 69, 8, 'BFW', 'AKR', 'ALR', 'RVF', 'iksan.hermana@mataangin.co.id', '2021-12-01', 1),
(177, 'Nadia Fi Silmi', '21066', 'NFS', 'Laki-Laki', 'Islam', '2021-08-30', '0000-00-00', 2, 30, 26, 8, 'AYW', 'FSN', 'RDT', 'AGT', 'nadia.silmi@mataangin.co.id', '2021-12-01', 1),
(178, 'Satya Dwipayana Farma', '21067', 'SDF', 'Laki-Laki', 'Islam', '2021-09-01', '0000-00-00', 2, 30, 28, 8, 'BFW', '(NULL)', '(NULL)', '(NULL)', 'satya.dwifarma@mataangin.co.id', '2021-12-01', 1),
(179, 'Irbramsyah', '21987', 'IMS', 'Laki-Laki', 'Islam', '2021-08-01', '0000-00-00', 7, 6, 115, 6, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'bba@pinc.group', '2022-09-03', 1),
(180, 'Dini Octavia Anggraeni', '21071', 'DNO', 'Perempuan', 'Islam', '2021-09-20', '0000-00-00', 2, 92, 26, 8, 'DWP', 'SWR', 'XHS', 'SMI', 'dini.ocatvia@mataangin.co.id', '2021-12-01', 1),
(181, 'Riddo Tandian', '21072', 'RDT', 'Laki-Laki', 'Budha', '2021-09-27', '0000-00-00', 2, 67, 57, 8, 'AYW', '(NULL)', '(NULL)', '(NULL)', 'riddo.tandian@mataangin.co.id', '2022-01-01', 1),
(182, 'Marcella Mutia', '21074', 'MCM', 'Perempuan', 'Katolik', '2021-09-30', '0000-00-00', 1, 40, 30, 10, 'AAL', 'HUS', 'NSA', 'MHU', 'marcella.mutia@pantarei-ad.com', '2022-01-01', 1),
(183, 'Umar Hamdan', '21075', 'UMR', 'Laki-Laki', 'Islam', '2021-10-01', '0000-00-00', 2, 98, 90, 8, 'OTE', '(NULL)', '(NULL)', '(NULL)', 'umar.hamdan@mataangin.co.id', '2022-01-01', 1),
(184, 'Gita Galantari', '21069', 'GTA', 'Perempuan', 'Islam', '2021-09-01', '0000-00-00', 6, 57, 36, 10, 'DWW', 'GSE', 'ELN', 'SYA', 'gita@pinc.group', '2021-12-01', 1),
(185, 'Septaria Bernita', '21070', 'SBT', 'Perempuan', 'Islam', '2021-09-01', '0000-00-00', 6, 57, 5, 9, 'GTA', '(NULL)', '(NULL)', '(NULL)', 'tata@pinc.group', '2021-12-01', 1),
(186, 'Rahayu Oktavianti', '21073', 'RHO', 'Perempuan', 'Islam', '2021-09-27', '0000-00-00', 2, 67, 13, 9, 'ALR', '(NULL)', '(NULL)', '(NULL)', 'rahayu.oktavianti@mataangin.co.id', '2022-01-01', 1),
(187, 'Farly Putra Pratama', '21076', 'FLP', 'Laki-Laki', 'Islam', '2021-10-01', '0000-00-00', 2, 67, 24, 8, 'BFW', '(NULL)', '(NULL)', '(NULL)', 'farly.pratama@mataangin.co.id', '2022-01-01', 1),
(188, 'Heru Saputra', '20177', 'HUS', 'Laki-Laki', 'Islam', '2021-10-06', '0000-00-00', 1, 68, 57, 8, 'MHU', 'KAM', 'DES', 'YRA', 'heru.saputra@pantarei-ad.com', '2022-01-06', 1),
(189, 'Vebyana Yongki', '20178', 'VBY', 'Perempuan', 'Budha', '2021-10-01', '0000-00-00', 1, 67, 28, 8, 'MCM', 'HUS', 'EDL', 'AAM', 'vebyana.yongky@pantarei-ad.com', '2022-01-01', 1),
(190, 'Conny Natasya Tampubolon', '20179', 'CNT', 'Perempuan', 'Protestan', '2021-10-25', '0000-00-00', 1, 68, 6, 8, 'MHU', 'HUS', 'KAM', 'DES', 'conny.natasya@pantarei-ad.com', '2022-01-25', 1),
(191, 'Fina Camelia Putri', '21077', 'FCP', 'Perempuan', 'Islam', '2021-10-25', '0000-00-00', 2, 20, 13, 9, 'ALR', '(NULL)', '(NULL)', '(NULL)', 'fina.camelia@mataangin.co.id', '2022-02-01', 1),
(192, 'Athalika Mediana', '21078', 'ALK', 'Laki-Laki', 'Islam', '2021-10-23', '0000-00-00', 2, 20, 90, 8, 'OTE', '(NULL)', '(NULL)', '(NULL)', 'athalika.mediana@mataangin.co.id', '2022-02-01', 1),
(193, 'Dyan Surapati', '20180', 'DNS', 'Laki-Laki', 'Islam', '2021-11-01', '0000-00-00', 1, 67, 25, 9, 'AAL', '(NULL)', '(NULL)', '(NULL)', 'dyan.surapati@pantarei-ad.com', '2022-02-01', 1),
(194, 'Ferry Senowandhani', '21079', 'FSN', 'Laki-Laki', 'Islam', '2021-11-01', '0000-00-00', 2, 20, 6, 8, 'AYW', '(NULL)', '(NULL)', '(NULL)', 'ferry.seno@mataangin.co.id', '2022-02-01', 1),
(195, 'Jonathan Lesmana', '21080', 'JLE', 'Laki-Laki', 'Protestan', '2021-11-01', '0000-00-00', 2, 66, 96, 10, 'ELN', '(NULL)', '(NULL)', '(NULL)', 'jonathan.lesmana@mataangin.co.id', '2022-02-01', 1),
(196, 'Fransisca Chrisnatiawaty Karo Karo', '20181', 'FKK', 'Perempuan', 'Protestan', '2021-11-08', '0000-00-00', 1, 67, 16, 11, 'SYA', '(NULL)', '(NULL)', '(NULL)', 'fransisca.karokaro@pantarei-ad.com', '2022-02-08', 1),
(197, 'Christofer Felix', '20182', 'CFF', 'Laki-Laki', 'Katolik', '2021-11-08', '0000-00-00', 1, 67, 63, 7, 'FKK', '(NULL)', '(NULL)', '(NULL)', 'christofer.felix@pantarei-ad.com', '2022-02-08', 1),
(198, 'Josua Sakti Suryanto', '21081', 'JSS', 'Laki-Laki', 'Katolik', '2021-11-08', '0000-00-00', 2, 92, 28, 8, 'DWP', 'SMI', 'ARA', 'XHS', 'josua.suryanto@mataangin.co.id', '2021-12-01', 1),
(199, 'Ayu Suci Lestari', '21082', 'ASL', 'Perempuan', 'Islam', '2021-11-08', '0000-00-00', 2, 97, 6, 13, 'RFK', '(NULL)', '(NULL)', '(NULL)', 'ayu.suci@mataangin.co.id', '2022-01-08', 1),
(200, 'Alexander Kusumapradja', '20183', 'ALX', 'Laki-Laki', 'Islam', '2021-11-22', '0000-00-00', 1, 67, 26, 8, 'AAL', '(NULL)', '(NULL)', '(NULL)', 'alexander.kusumapradja@pantarei-ad.com', '2022-02-22', 1),
(201, 'Rifqa Nikita', '21084', 'NKT', 'Perempuan', 'Islam', '2021-11-15', '0000-00-00', 2, 97, 27, 9, 'BTM', '(NULL)', '(NULL)', '(NULL)', 'rifqa.nikita@mataangin.co.id', '2022-02-01', 1),
(202, 'Fauziah Ulfah', '21085', 'ZZI', 'Perempuan', 'Islam', '2021-11-17', '0000-00-00', 6, 93, 65, 8, 'DEK', '(NULL)', '(NULL)', '(NULL)', 'fauziah.ulfah@pinc.group', '2022-03-18', 1),
(203, 'Adi Purwanto', '21086', 'APW', 'Laki-Laki', 'Islam', '2021-11-22', '0000-00-00', 6, 56, 43, 8, 'AJO', '(NULL)', '(NULL)', '(NULL)', 'adi.purwanto@pinc.group', '2022-03-01', 1),
(204, 'Muhamad Nurdin', '16029', 'MUN', 'Laki-Laki', 'Islam', '2016-07-11', '0000-00-00', 3, 30, 44, 8, 'WTO', 'DEY', 'RNL', 'TPM', 'nurdin@w3p.digital', '2021-10-01', 1),
(205, 'Aditiyawarman', '5932', 'AYW', 'Laki-Laki', 'Islam', '2005-01-10', '0000-00-00', 2, 67, 17, 11, 'ELN', 'YOM', 'IPS', 'ALR', 'aditiyawarman@mataangin.co.id', '2021-01-01', 1),
(206, 'Marlin Akbar Nasution', '21012', 'MRL', 'Laki-Laki', 'Islam', '2021-02-01', '0000-00-00', 3, 30, 28, 8, 'TPM', 'JAP', 'SLG', 'GJT', 'marlin@w3p.digital', '2021-08-01', 1),
(207, 'Yohannes Muliady', '11010', 'YOM', 'Laki-Laki', 'Katolik', '2011-06-08', '0000-00-00', 2, 10, 80, 18, 'HER', '(NULL)', '(NULL)', '(NULL)', 'yohannes.muliady@mataangin.co.id', '2017-07-01', 1),
(208, 'Hermanto Soerjanto', '5945', 'HMN', 'Laki-Laki', 'Katolik', '2005-01-05', '0000-00-00', 1, 10, 22, 12, 'MDS', '(NULL)', '(NULL)', '(NULL)', 'hermanto@pantarei-ad.com', '1970-01-01', 1),
(209, 'Andhika Librasky', '21001', 'ALB', 'Laki-Laki', 'Islam', '2021-01-04', '0000-00-00', 1, 68, 27, 9, 'AHT', 'SNA', 'DMN', 'TRD', 'andhika.librasky@pantarei-ad.com', '2022-04-01', 1),
(210, 'Yessi B Priscillia M', '21009', 'YBP', 'Perempuan', 'Protestan', '2021-01-21', '0000-00-00', 3, 20, 14, 10, 'WTO', 'TPM', 'DLA', 'SLG', 'yessi@w3p.digital', '2021-05-31', 1),
(211, 'Elizabeth Inkan', '8331', 'ELN', 'Perempuan', 'Katolik', '2008-04-28', '0000-00-00', 2, 10, 21, 18, 'IRO', '(NULL)', '(NULL)', '(NULL)', 'elizabeth.inkan@mataangin.co.id', '2017-06-01', 1),
(212, 'Michael D. Sudarto', '97452', 'MDS', 'Laki-Laki', 'Katolik', '1997-12-18', '0000-00-00', 1, 10, 21, 13, '(NULL)', '(NULL)', '(NULL)', '(NULL)', 'michael@pantarei-ad.com', '1970-01-01', 1),
(213, 'Willy Tanujoyo', '16008', 'WTO', 'Laki-Laki', 'Budha', '2016-02-01', '0000-00-00', 3, 10, 21, 12, 'WTO', '(NULL)', '(NULL)', '(NULL)', 'willy@w3p.digital', '1970-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_fix`
--

CREATE TABLE `karyawan_fix` (
  `id` int(5) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `inisial` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  `id_departemen` int(15) DEFAULT NULL,
  `id_jabatan` int(15) DEFAULT NULL,
  `id_golongan` int(15) DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `rekan_kerja` varchar(255) DEFAULT NULL,
  `rekan_kerja2` varchar(255) DEFAULT NULL,
  `rekan_kerja3` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tgl_appraisal` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_fix`
--

INSERT INTO `karyawan_fix` (`id`, `nama_karyawan`, `nik`, `inisial`, `jenis_kelamin`, `agama`, `tgl_masuk`, `tgl_keluar`, `id_perusahaan`, `id_departemen`, `id_jabatan`, `id_golongan`, `atasan`, `rekan_kerja`, `rekan_kerja2`, `rekan_kerja3`, `email`, `tgl_appraisal`, `status`) VALUES
(1, 'Agus Gunawan', '7212', 'AGG', 'Laki-Laki', 'Islam', '5/7/2007', NULL, 1, 55, 56, 8, 'NSA', 'SAM', 'MHU', 'ADF', 'agus.gunawan@pantarei-ad.com', '5/1/2022', 1),
(2, 'Dewi Kemalasari', '14036', 'DEK', 'Perempuan', 'Islam', '11/17/2014', NULL, 1, 54, 65, 9, 'DWW', 'RAI', 'GSE', 'CMA', 'dewi.kemalasari@pantarei-ad.com', '6/1/2017', 1),
(3, 'Dwi Wicaksono Wibowo', '14034', 'DWW', 'Laki-Laki', 'Islam', '11/3/2014', NULL, 1, 54, 36, 11, 'IRO', NULL, NULL, NULL, 'dwi.wicaksono@pantarei-ad.com', '1/1/2017', 1),
(4, 'M. Feariansyah S', '15066', 'MFS', 'Laki-Laki', 'Islam', '11/16/2015', NULL, 2, 11, 38, 8, 'RAI', 'DWW', 'TRM', 'IYS', 'm.feariansyah@mataangin.co.id', '7/1/2022', 1),
(5, 'Rani Indriani', '7274', 'RAI', 'Perempuan', 'Islam', '10/17/2007', NULL, 1, 52, 23, 18, 'IRO', NULL, NULL, NULL, 'rani.indriani@pantarei-ad.com', '1/1/2017', 1),
(6, 'Suryani Asikin', '9398', 'SYA', 'Perempuan', 'Islam', '2/25/2009', NULL, 1, 49, 102, 12, 'IRO', NULL, NULL, NULL, 'suryani@pantarei-ad.com', '1/1/2017', 1),
(7, 'Tri Muttaqin', '15006', 'TRM', 'Laki-Laki', 'Islam', '5/1/2015', NULL, 1, 52, 38, 9, 'RAI', NULL, NULL, NULL, 'tri.muttaqin@pantarei-ad.com', '9/1/2017', 1),
(8, 'Sartika Dwiputri', '16059', 'SAD', 'Perempuan', 'Islam', '1/12/2016', NULL, 1, 55, 29, 9, 'NSA', 'MIC', 'KAM', 'SAM', 'sartika.dwiputri@pantarei-ad.com', '6/1/2022', 1),
(9, 'Cynthia Anggraini Sudarto', '17005', 'CAS', 'Perempuan', 'Katolik', '2/16/2017', NULL, 1, 55, 64, 9, 'AJO', 'ADJ', 'ADJ', 'ADJ', 'cynthia@pantarei-ad.com', '1/1/2017', 1),
(10, 'Irawan Soemardjo', '2715', 'IRO', 'Laki-Laki', 'Islam', '2/18/2002', NULL, 1, 49, 19, 12, 'MDS', NULL, NULL, NULL, 'irawan@pantarei-ad.com', '1/1/1970', 1),
(11, 'Teguh Pandirian Mashara', '17040', 'TPM', 'Laki-Laki', 'Islam', '10/16/2017', NULL, 3, 59, 48, 8, 'WTO', 'DLA', 'MRL', 'AJO', 'teguh@w3p.digital', '6/1/2022', 1),
(12, 'Bramanzah Anandityo', '18018', 'BAN', 'Laki-Laki', 'Islam', '5/2/2018', NULL, 1, 55, 24, 8, 'NSA', 'PMG', 'SAD', 'ADF', 'bramanzah.anandityo@pantarei-ad.com', '8/1/2022', 1),
(13, 'Pirli Abi Saputra', '17204', 'PIR', 'Laki-Laki', 'Islam', '1/1/2018', NULL, 1, 54, 70, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '3/31/2018', 1),
(14, 'Sukoco', '17301', 'SKC', 'Laki-Laki', 'Islam', '5/4/2017', NULL, 1, 54, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '8/3/2017', 1),
(15, 'Bobby Ferry', '17022', 'BOF', 'Laki-Laki', 'Islam', '5/4/2017', NULL, 1, 54, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '7/3/2017', 1),
(16, 'Solikun', '17303', 'SLK', 'Laki-Laki', 'Islam', '5/4/2017', NULL, 1, 54, 74, 6, 'DEK', NULL, NULL, NULL, 'pantarei.sob@gmail.com', '8/3/2017', 1),
(17, 'Yori Rizki Akbar', '18036', 'YRA', 'Laki-Laki', 'Islam', '10/15/2018', NULL, 1, 55, 27, 9, 'NSA', 'AHS', 'IBP', 'MHU', 'yori.akbar@pantarei-ad.com', '2/1/2022', 1),
(18, 'Eko Hadi Cahyono', '18048', 'EHC', 'Laki-Laki', 'Islam', '7/1/2018', NULL, 2, 11, 41, 6, 'NAS', NULL, NULL, NULL, 'eko.cahyono@mataangin.co.id', '6/30/2019', 1),
(19, 'Abdul Azis', '19001', 'ABA', 'Laki-Laki', 'Islam', '1/2/2019', NULL, 2, 57, 56, 8, 'IPS', 'AYW', 'RPE', 'SAS', 'abdul.azis@mataangin.co.id', '2/1/2022', 1),
(20, 'Cynthia Anggraini Sudarto', '99995', 'CYN', 'Perempuan', 'Katolik', '2/16/2017', NULL, 3, 5, 64, 9, 'WTO', NULL, NULL, NULL, 'cynthia@w3p.digital', '5/16/2017', 1),
(21, 'TB. Liswan Mulyana', '19017', 'TLM', 'Laki-Laki', 'Islam', '4/1/2019', NULL, 2, 57, 28, 8, 'NPR', 'YKG', 'YKH', 'XHS', 'liswan.mulyana@mataangin.co.id', '7/1/2022', 1),
(22, 'Nugroho Nurarifin', '19018', 'NUN', 'Laki-Laki', 'Islam', '4/8/2019', NULL, 1, 55, 80, 18, 'HER', 'IRO', 'SYA', NULL, 'nugroho.nurarifin@pantarei-ad.com', '7/5/2019', 1),
(23, 'Raymond Iskandar', '19020', 'RIS', 'Laki-Laki', 'Katolik', '4/29/2019', NULL, 1, 55, 25, 9, 'MCM', 'AAM', 'SNA', 'TES', 'raymond.iskandar@pantarei-ad.com', '1/1/2022', 1),
(24, 'Indra Bayu Prasta', '19021', 'IBP', 'Laki-Laki', 'Islam', '5/2/2019', NULL, 1, 55, 28, 8, 'NSA', 'ADF', 'BAN', 'CNT', 'indra.bayu@pantarei-ad.com', '8/1/2022', 1),
(25, 'Meltrin Hutabarat', '19027', 'MHU', 'Perempuan', 'Protestan', '5/20/2019', NULL, 1, 55, 14, 9, 'SYA', 'ADF', 'NSA', 'KAM', 'meltrin.hutabarat@pantarei-ad.com', '6/1/2022', 1),
(26, 'Riessang NPA', '19602', 'RNP', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 81, 11, NULL, NULL, NULL, NULL, NULL, '7/31/2019', 1),
(27, 'Jatiwaluyo', '19603', 'JTW', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 82, 10, 'BAG', NULL, NULL, NULL, NULL, '2/1/2021', 1),
(28, 'Bayu Agustianto', '19605', 'BAG', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 84, 10, NULL, NULL, NULL, NULL, NULL, '7/31/2019', 1),
(29, 'Wijaya Hadikusuma', '19606', 'WIH', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 14, 9, NULL, NULL, NULL, NULL, 'wijaya@imadi.id', '7/31/2019', 1),
(30, 'Arief Abiromo', '19607', 'AAB', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 14, 9, 'BAG', NULL, NULL, NULL, 'abi@imadi.id', '2/1/2019', 1),
(31, 'Muhammad Junaidi Suswandi', '19608', 'MJS', 'Laki-Laki', 'Islam', '5/1/2019', NULL, 5, 13, 85, 8, NULL, NULL, NULL, NULL, NULL, '7/31/2019', 1),
(32, 'Putri Indah Sari', '19609', 'PIS', 'Perempuan', 'Islam', '5/1/2019', NULL, 5, 13, 14, 9, 'BAG', NULL, NULL, NULL, NULL, '2/1/2021', 1),
(33, 'Ahmad Syauqi', '19028', 'AHS', 'Laki-Laki', 'Islam', '6/17/2019', NULL, 1, 55, 28, 8, 'NSA', 'ADF', 'PMG', 'KAM', 'ahmad.syauqi@pantarei-ad.com', '10/1/2022', 1),
(34, 'Gani Setiadi', '19032', 'GSE', 'Laki-Laki', 'Islam', '7/1/2019', NULL, 1, 54, 5, 8, 'GTA', 'AJO', 'AJO', 'AJO', 'gani.setiadi@pantarei-ad.com', '1/1/2021', 1),
(35, 'Albenna Reevo', '19030', 'ALR', 'Laki-Laki', 'Islam', '7/1/2019', NULL, 2, 14, 15, 9, 'ELN', 'BFW', 'JCH', 'ASW', 'albenna.reevo@mataangin.co.id', '10/1/2022', 1),
(36, 'Faritz Hanif Fadillah', '19611', 'FHF', 'Laki-Laki', 'Islam', '7/15/2019', NULL, 5, 13, 14, 9, 'BAG', NULL, NULL, NULL, NULL, '11/1/2021', 1),
(37, 'Ratri Indah Wijayanti', '19612', 'RIW', 'Perempuan', 'Islam', '7/16/2019', NULL, 5, 13, 86, 8, 'BAG', NULL, NULL, NULL, 'ratri@imadi.id', '10/1/2021', 1),
(38, 'Cindy Marcela', '19036', 'CMA', 'Perempuan', 'Islam', '7/25/2019', NULL, 1, 54, 42, 8, 'DEK', 'RAI', 'ETC', 'VSK', 'cindy.marcela@pantarei-ad.com', '11/1/2022', 1),
(39, 'Ayu Ammalia Pertiwi', '19040', 'AAM', 'Perempuan', 'Islam', '8/12/2019', NULL, 1, 55, 26, 8, 'MCM', 'SNA', 'RIS', 'TES', 'ayu.ammalia@pantarei-ad.com', '11/1/2022', 1),
(40, 'Hanasheila Fitria', '19613', 'HAF', 'Perempuan', 'Islam', '8/1/2019', NULL, 5, 13, 6, 8, 'BAG', NULL, NULL, NULL, 'sheila@imadi.id', '11/1/2021', 1),
(41, 'Ade Jonatan', '19045', 'AJO', 'Laki-Laki', 'Protestan', '8/2/2019', NULL, 1, 55, 43, 8, 'DWW', 'LNH', 'GSE', 'DEK', 'ade.jonatan@pantarei-ad.com', '1/1/2022', 1),
(42, 'Khansya Ayu Meiliani', '19046', 'KAM', 'Perempuan', 'Islam', '9/23/2019', NULL, 1, 55, 13, 9, 'MHU', 'YAP', 'ADF', 'CNT', 'khansya.ayu@pantarei-ad.com', '1/1/2022', 1),
(43, 'Deddy Setiawan', '19048', 'DES', 'Laki-Laki', 'Katolik', '10/1/2019', NULL, 1, 55, 25, 9, 'NSA', 'PMG', 'MHU', 'KAM', 'deddy.setiawan@pantarei-ad.com', '1/1/2022', 1),
(44, 'Yudhistira Adhi Pratama', '19052', 'YAP', 'Laki-Laki', 'Islam', '11/11/2019', NULL, 1, 55, 6, 8, 'MHU', 'KAM', 'NTR', 'CHN', 'yudhistira.adhi@pantarei-ad.com', '2/1/2022', 1),
(45, 'M.Kurnia Sandi', '19201', 'MKS', 'Laki-Laki', 'Islam', '11/1/2019', NULL, 1, 54, 70, 7, 'DEK', 'GSE', 'CMA', NULL, NULL, '1/1/2020', 1),
(46, 'Novia Satyawati Achmadi', '19047', 'NSA', 'Perempuan', 'Islam', '11/12/2019', NULL, 1, 55, 30, 10, 'AAL', 'MHU', 'DES', 'CHN', 'novia.achmadi@pantarei-ad.com', '2/1/2022', 1),
(47, 'Adi Prasetio Pamuji', '19056', 'APP', 'Laki-Laki', 'Islam', '12/2/2019', NULL, 2, 57, 87, 8, 'IPS', 'AYW', 'RPE', 'YKG', 'adi.prasetio@mataangin.co.id', '3/1/2022', 1),
(48, 'Tenri Esa Suyoto', '19057', 'TES', 'Perempuan', 'Islam', '12/2/2019', NULL, 1, 55, 13, 8, 'AML', 'SNA', 'RIS', 'AAM', 'tenri.esa@pantarei-ad.com', '12/1/2021', 1),
(49, 'Rheza Pramudita', '20005', 'RHP', 'Laki-Laki', 'Islam', '1/6/2020', NULL, 2, 57, 88, 9, 'AGP', 'NPR', 'BTM', 'LKP', 'rheza.pramudita@mataangin.co.id', '4/1/2022', 1),
(50, 'Xenia Heptapami Susetyo', '20006', 'XHS', 'Perempuan', 'Protestan', '1/2/2020', NULL, 2, 57, 57, 8, 'AGP', 'JCH', 'RAI', 'BTM', 'xenia.susetyo@mataangin.co.id', '4/1/2022', 1),
(51, 'Aidil Akbar Latief', '20007', 'AAL', 'Laki-Laki', 'Islam', '1/2/2020', NULL, 1, 49, 33, 11, 'NUN', NULL, NULL, NULL, 'aidil.akbar@pantarei-ad.com', '2/1/2021', 1),
(52, 'Eko Sumarno', '20009', 'ESU', 'Laki-Laki', 'Islam', '1/2/2020', NULL, 2, 57, 56, 8, 'ESU', 'XHS', 'BTM', 'MID', 'eko.sumarno@mataangin.co.id', '2/1/2022', 1),
(53, 'Selvi Wennelia Rieni', '20016', 'SWR', 'Perempuan', 'Islam', '1/6/2020', NULL, 2, 57, 26, 8, 'BTM', 'AGP', 'TMP', 'MID', 'selvi.wennelia@mataangin.co.id', '4/1/2022', 1),
(54, 'Ibnu Syech', '20011', 'NAY', 'Laki-Laki', 'Islam', '1/2/2020', NULL, 2, 57, 29, 9, 'NPR', 'AGP', 'YKH', 'HPA', 'ibnu.syech@mataangin.co.id', '4/1/2022', 1),
(55, 'Reja Rizaldi', '19202', 'RER', 'Laki-Laki', 'Islam', '11/1/2019', NULL, 1, 54, 70, 18, 'DEK', 'GSE', 'CMA', NULL, NULL, '1/1/2020', 1),
(56, 'Syamsudin', '20030', 'SAM', 'Laki-Laki', 'Islam', '2/3/2020', NULL, 1, 55, 56, 8, 'NSA', 'MHU', 'KAM', 'MIC', 'syamsudin@pantarei-ad.com', '5/1/2022', 1),
(57, 'Ignasius Yudhi Subiyarto', '20032', 'IYS', 'Laki-Laki', 'Katolik', '2/3/2020', NULL, 2, 11, 37, 8, 'DWW', NULL, NULL, NULL, 'yudhi.subiyarto@mataangin.co.id', '5/31/2020', 1),
(58, 'Muhammad Harish Soewandi', '20034', 'HRS', 'Laki-Laki', 'Islam', '2/11/2020', '0000-00-00', 2, 57, 87, 8, 'AGP', 'BTM', 'XHS', 'RHP', 'harish.soewandi@mataangin.co.id', '12/1/2021', 1),
(59, 'Santi Mantika Irsani', '20038', 'SMI', 'Perempuan', 'Islam', '2/10/2020', NULL, 2, 14, 6, 8, 'NPI', 'ZKA', 'XHS', 'DWP', 'santi.mantika@mataangin.co.id', '5/22/2022', 1),
(60, 'Annisa Chairiyanti', '20039', 'ACH', 'Perempuan', 'Islam', '1/1/2022', NULL, 2, 14, 6, 8, 'ALR', 'ELN', 'TPM', 'XHS', 'annisa.chairiyanti@mataangin.co.id', '1/1/2023', 1),
(61, 'Diva Efriza Genio', '20018', 'DEG', 'Laki-Laki', 'Islam', '2/3/2020', NULL, 1, 55, 28, 8, 'MCM', 'RIS', 'AAM', 'TES', 'efriza.genio@pantarei-ad.com', '1/1/2022', 1),
(62, 'Adeprianto Nugroho', '20046', 'ADP', 'Laki-Laki', 'Islam', '3/11/2020', NULL, 2, 57, 28, 8, 'BTM', 'XHS', 'DFE', 'MID', 'ade.prianto@mataangin.co.id', '6/1/2022', 1),
(63, 'Ni Desak Gde Gayatri F', '20047', 'NDG', 'Perempuan', 'Hindu', '2/24/2020', NULL, 1, 55, 87, 8, 'NSA', 'CHN', 'YAP', 'MIC', 'desak.gayatri@pantarei-ad.com', '6/1/2022', 1),
(64, 'Safira Nur Alifah', '20049', 'SNA', 'Perempuan', 'Islam', '2/27/2020', NULL, 1, 55, 57, 8, 'DMN', 'AHT', 'TES', 'RAN', 'safira.alifah@pantarei-ad.com', '9/12/2022', 1),
(65, 'Pandega', '20053', 'PDG', 'Laki-Laki', 'Islam', '2/19/2020', '0000-00-00', 2, 11, 41, 8, 'DWW', 'ELN', 'YOM', 'DEK', 'pandega@mataangin.co.id', '6/1/2021', 1),
(66, 'Lukman Nul Hakim', '20052', 'LNH', 'Laki-Laki', 'Islam', '2/19/2020', NULL, 2, 11, 43, 8, 'DWW', 'DWW', 'PDG', 'GSE', 'lukman.hakim@mataangin.co.id', '6/1/2022', 1),
(67, 'Sadewa Kristianto Darta', '20054', 'SKD', 'Laki-Laki', 'Islam', '1/29/2020', NULL, 1, 55, 28, 8, 'AHT', 'AAL', 'DMN', 'TRD', 'sadewa.kristianto@pantarei-ad.com', '12/1/2021', 1),
(68, 'Ardika Pradnya', '20055', 'APD', 'Laki-Laki', 'Islam', '3/6/2020', NULL, 2, 57, 27, 8, 'BFW', 'JCH', 'AKR', 'CHS', 'ardika.pradnya@mataangin.co.id', '6/1/2022', 1),
(69, 'M F Khadafi', '20056', 'MFK', 'Laki-Laki', 'Islam', '2/25/2020', NULL, 1, 55, 28, 8, 'AHT', 'CFF', 'SKD', 'SNA', 'muhammad.khadafi@pantarei-ad.com', '6/1/2022', 1),
(70, 'Rangga Indra Pratama', '20057', 'RAP', 'Laki-Laki', 'Islam', '3/2/2020', NULL, 1, 55, 26, 8, 'MCM', 'TES', 'DMN', 'SNA', 'rangga.indra@pantarei-ad.com', '12/1/2022', 1),
(71, 'Arif Ramadani', '20058', 'ARA', 'Laki-Laki', 'Islam', '2/28/2020', NULL, 2, 57, 28, 8, 'DWP', 'SMI', 'DZN', 'XHS', 'arif.ramadani@mataangin.co.id', '6/1/2022', 1),
(72, 'Cherlita Christanti', '20063', 'CHS', 'Perempuan', 'Katolik', '3/16/2020', NULL, 2, 57, 24, 8, 'AYW', 'AKR', 'APD', 'AGT', 'cherlita.christanti@mataangin.co.id', '6/1/2022', 1),
(73, 'Nesya Prinsesva Putri', '20066', 'NPI', 'Perempuan', 'Islam', '3/10/2020', NULL, 2, 14, 14, 10, 'ELN', 'DWP', 'YKM', 'SMI', 'nesya.putri@mataangin.co.id', '6/1/2022', 1),
(74, 'Balya Kretarta', '20067', 'BAK', 'Laki-Laki', 'Islam', '3/16/2020', NULL, 2, 57, 87, 9, 'DWP', 'HRS', 'XHS', 'LKP', 'balya.kretarta@mataangin.co.id', '7/1/2022', 1),
(75, 'Rabiatul Aini Harahap', '20069', 'RAH', 'Laki-Laki', 'Islam', '3/16/2020', '0000-00-00', 2, 32, 59, 8, 'YRE', 'ANM', 'ZTP', 'PAU', 'aini.harahap@mataangin.co.id', '7/1/2021', 1),
(76, 'Yusuf Kenang Hidayat', '20075', 'YKH', 'Laki-Laki', 'Islam', '3/1/2020', NULL, 2, 57, 25, 8, 'NPR', 'NAY', 'HPA', 'MZA', 'yusuf.kenang@mataangin.co.id', '4/1/2022', 1),
(77, 'Christa Gabriella Emma M', '20077', 'CGE', 'Perempuan', 'Protestan', '5/4/2020', NULL, 2, 57, 27, 9, 'NPR', 'XHS', 'YKM', 'NAY', 'christa.emma@mataangin.co.id', '9/1/2022', 1),
(78, 'Andhika Paramita', '20079', 'ANP', 'Perempuan', 'Islam', '5/11/2020', NULL, 2, 23, 89, 9, 'KYS', 'OTE', 'RAH', 'XHS', 'andhika.paramita@mataangin.co.id', '8/1/2022', 1),
(79, 'Ade Jonatan', '20085', 'ADJ', 'Laki-Laki', 'Protestan', '9/12/2019', NULL, 6, 16, 43, 8, 'DWI', 'RAN', 'GSE', 'LNH', 'adejonatan@pinc.group', '12/1/2022', 1),
(80, 'Gani Setiadi', '20086', 'GNS', 'Laki-Laki', 'Islam', '7/1/2019', NULL, 6, 17, 5, 8, 'GTA', 'KML', 'ADJ', 'DWI', 'gani@pinc.group', '10/1/2021', 1),
(81, 'Nurman Prasetyo', '20089', 'NPR', 'Laki-Laki', 'Islam', '6/2/2020', NULL, 2, 57, 54, 11, 'YOM', 'YKM', 'BTM', 'CGE', 'nurman.prasetyo@mataangin.co.id', '1/1/2022', 1),
(82, 'Daniel Adi Putro Nugroho', '20094', 'DNP', 'Laki-Laki', 'Islam', '6/8/2020', NULL, 1, 55, 29, 8, 'AHT', 'SNA', 'RIS', 'TES', 'daniel.adi@pantarei-ad.com', '9/1/2022', 1),
(83, 'Benny Oetama', '20098', 'BTM', 'Laki-Laki', 'Budha', '6/22/2020', NULL, 2, 57, 30, 10, 'NPR', 'TMP', 'XHS', 'YKM', 'benny.oetama@mataangin.co.id', '10/1/2022', 1),
(84, 'Sekar Lenggo Geni', '20103', 'SLG', 'Perempuan', 'Islam', '7/15/2020', NULL, 3, 12, 13, 8, 'WTO', 'DLA', 'TPM', 'JAP', 'sekar@w3p.digital', '8/1/2022', 1),
(85, 'Dewi Kemalasari', '20107', 'KML', 'Perempuan', 'Islam', '11/17/2014', NULL, 6, 15, 65, 10, 'DWI', 'RAN', 'GNS', 'CIN', 'mala@pinc.group', '6/1/2022', 1),
(86, 'Michael D. Sudarto', '20110', 'MSD', 'Laki-Laki', 'Katolik', '12/18/1997', NULL, 6, 20, 21, 13, 'MDS', NULL, NULL, NULL, 'michael@pinc.group', '1/1/2017', 1),
(87, 'Irawan Soemardjo', '20111', 'IRW', 'Laki-Laki', 'Islam', '2/18/2002', NULL, 6, 20, 19, 12, 'MSD', NULL, NULL, NULL, 'irawan@pinc.group', '2/18/2021', 1),
(88, 'Hermanto Soerjanto', '20112', 'HER', 'Laki-Laki', 'Protestan', '1/5/2005', NULL, 6, 20, 22, 13, 'MDS', NULL, NULL, NULL, 'hermanto@pinc.group', '1/4/2021', 1),
(89, 'Rani Indriani', '10113', 'RAN', 'Perempuan', 'Islam', '10/17/2007', NULL, 6, 35, 23, 11, 'IRW', 'DWI', 'TQN', 'MFS', 'rani@pinc.group', '1/1/2022', 1),
(90, 'Dwi Wicaksono Wibowo', '20114', 'DWI', 'Laki-Laki', 'Islam', '11/3/2014', NULL, 6, 17, 95, 11, 'IRW', 'RAN', 'GTA', 'KML', 'ino@pinc.group', '1/1/2022', 1),
(91, 'Tri Muttaqin', '20115', 'TQN', 'Laki-Laki', 'Islam', '5/1/2015', NULL, 6, 35, 39, 10, 'RAN', 'DWI', 'MFS', 'IGY', 'tri.muttaqin@pinc.group', '9/1/2022', 1),
(92, 'Cindy Marcela', '20116', 'CIN', 'Perempuan', 'Islam', '7/24/2019', NULL, 6, 15, 42, 8, 'KML', 'DWI', 'GNS', 'RAN', 'cindy@pinc.group', '11/1/2021', 1),
(93, 'Ignasius Yudhi Subiyarto', '20117', 'IGY', 'Laki-Laki', 'Katolik', '2/3/2020', NULL, 6, 35, 37, 8, 'RAN', 'TQN', 'MFS', 'DWI', 'yudhi@pinc.group', '5/1/2022', 1),
(94, 'Sismita', '20121', 'SMT', 'Perempuan', 'Islam', '8/18/2020', NULL, 1, 55, 96, 8, 'SYA', 'AML', 'RYN', 'AHT', 'sismita@pantarei-ad.com', '9/1/2022', 1),
(95, 'Algesta Oktrivalda', '20122', 'ALO', 'Laki-Laki', 'Islam', '8/24/2020', NULL, 1, 55, 28, 8, 'NSA', 'MHU', 'IBP', 'HZG', 'algesta.oktrivalda@pantarei-ad.com', '11/1/2022', 1),
(96, 'Akhmad Ilyas Rivani', '20129', 'AKR', 'Laki-Laki', 'Islam', '9/21/2020', NULL, 2, 57, 30, 10, 'BFW', 'ALR', 'JCH', 'IKN', 'akhmad.ilyas@mataangin.co.id', '10/1/2022', 1),
(97, 'Lukman Prayogo', '20133', 'LKP', 'Laki-Laki', 'Islam', '10/2/2020', NULL, 2, 57, 87, 8, 'BTM', 'XHS', 'RHP', 'BAK', 'lukman.prayogo@mataangin.co.id', '1/1/2022', 1),
(98, 'Dadang Zulian', '20134', 'DZN', 'Laki-Laki', 'Islam', '10/5/2020', NULL, 2, 57, 24, 8, 'DWP', 'SWR', 'XHS', 'ARA', 'dadang.zulian@mataangin.co.id', '1/1/2022', 1),
(99, 'Cynthia Anggraini Sudarto', '20138', 'CYS', 'Perempuan', 'Protestan', '1/1/2019', NULL, 6, 37, 93, 18, 'MDS', NULL, NULL, NULL, 'cynthia@pinc.group', '12/31/2020', 1),
(100, 'Ronald Kevin Alfian', '20637', 'RKA', 'Laki-Laki', 'Katolik', '11/2/2020', NULL, 5, 13, 68, 8, 'BAG', NULL, NULL, NULL, 'ronald@imadi.id', '2/1/2021', 1),
(101, 'Dwiarto Purnomo Otten', '20140', 'DWP', 'Laki-Laki', 'Islam', '11/19/2020', NULL, 2, 26, 30, 10, 'YOM', 'NPI', 'DZN', 'XHS', 'dwiarto.otten@mataangin.co.id', '11/1/2022', 1),
(102, 'Nissa Triafni', '20141', 'NTR', 'Perempuan', 'Islam', '11/23/2020', NULL, 1, 55, 90, 8, 'MHU', 'CHN', 'YAP', 'MIC', 'nissa.triafni@pantarei-ad.com', '3/1/2022', 1),
(103, 'Satrio Pamungkas', '20143', 'SPS', 'Laki-Laki', 'Katolik', '12/1/2020', NULL, 1, 55, 28, 8, 'NSA', 'AAL', 'GHY', 'YAP', 'satrio.pamungkas@pantarei-ad.com', '3/1/2022', 1),
(104, 'Nugroho Nurarifin', '20146', 'NUG', 'Laki-Laki', 'Islam', '4/8/2019', NULL, 6, 20, 94, 18, 'MDS', NULL, NULL, NULL, 'nugi@pinc.group', '7/8/2021', 1),
(105, 'Puti Ambang Gemilang', '21006', 'PMG', 'Perempuan', 'Islam', '1/7/2021', NULL, 1, 39, 27, 9, 'NSA', 'MIC', 'MHU', 'AHS', 'puti.ambang@pantarei-ad.com', '4/1/2022', 1),
(106, 'Veby Puspita', '21601', 'VBP', 'Perempuan', 'Islam', '1/1/2021', NULL, 5, 13, 14, 10, 'BAG', NULL, NULL, NULL, 'veby@imadi.id', '2/1/2021', 1),
(107, 'Fauzan Gozali', '21010', 'FGI', 'Laki-Laki', 'Islam', '2/1/2021', NULL, 1, 56, 68, 8, 'MHU', 'NTR', 'YAP', 'NSA', 'fauzan.gozali@pantarei-ad.com', '2/1/2022', 1),
(108, 'Yasmine Kristanti.M', '21011', 'YKM', 'Perempuan', 'Islam', '2/8/2021', NULL, 2, 14, 17, 11, 'ELN', 'NPR', 'YRE', 'TDR', 'yasmine.kristanti@mataangin.co.id', '5/1/2022', 1),
(109, 'M Ryan Nugraha', '21013', 'RYN', 'Laki-Laki', 'Islam', '2/15/2021', NULL, 1, 55, 96, 10, 'SYA', 'TES', 'MHU', 'SMT', 'ryan@pantarei-ad.com', '5/28/2022', 1),
(110, 'Jasiman', '21015', 'JSM', 'Laki-Laki', 'Islam', '2/1/2021', NULL, 6, 15, 41, 8, 'DEK', NULL, NULL, NULL, 'jasiman@pinc.group', '2/1/2022', 1),
(111, 'Amanda Lestari', '21016', 'AML', 'Perempuan', 'Katolik', '3/1/2021', NULL, 1, 55, 16, 11, 'SYA', 'SMT', 'TES', 'SNA', 'amanda.lestari@pantarei-ad.com', '6/1/2022', 1),
(112, 'Bramantyo F. Wibowo', '21017', 'BFW', 'Laki-Laki', 'Islam', '3/1/2021', NULL, 2, 57, 33, 11, 'YOM', 'ALR', 'AYW', 'AKR', 'fauke.bramantyo@mataangin.co.id', '6/1/2022', 1),
(113, 'Viska Septivi Narni', '21020', 'VSK', 'Perempuan', 'Islam', '3/25/2021', NULL, 2, 11, 41, 8, 'DWW', 'CMA', 'GSE', 'DEK', 'viska.septivi@mataangin.co.id', '7/1/2022', 1),
(114, 'Herzuginandha', '21021', 'HZG', 'Laki-Laki', 'Islam', '3/29/2021', NULL, 1, 55, 30, 10, 'AAL', 'NSA', 'MIC', 'MHU', 'herzugi.nandha@pantarei-ad.com', '7/1/2021', 1),
(115, 'Ciko Septyani', '21024', 'CSN', 'Perempuan', 'Islam', '5/3/2021', NULL, 3, 12, 101, 11, 'WTO', 'ARJ', 'DLA', 'TPM', 'chicco@w3p.digital', '8/1/2022', 1),
(116, 'Desti Srikandi Fatimah', '21025', 'DSR', 'Perempuan', 'Islam', '5/3/2021', NULL, 1, 55, 69, 8, 'NSA', 'ADF', 'YAP', 'DES', 'desti.srikandi@pantarei-ad.com', '8/1/2021', 1),
(117, 'Anggit Gita Parikesit', '21027', 'AGT', 'Laki-Laki', 'Islam', '5/17/2021', NULL, 2, 57, 24, 8, 'AYW', 'JCH', 'PRN', 'LNN', 'anggit.parikesit@mataangin.co.id', '9/1/2021', 1),
(118, 'Raymond Iskandar', '19020', 'RIS', 'Laki-Laki', 'Katolik', '4/29/2019', NULL, 1, 55, 25, 9, 'MCM', 'AAM', 'SNA', 'TES', 'raymond.iskandar@pantarei-ad.com', '6/4/2021', 1),
(119, 'Muji Taba', '21902', 'MUT', 'Laki-Laki', 'Islam', '1/1/1970', NULL, 7, 42, 103, 8, NULL, NULL, NULL, NULL, 'muji@batubata.co.id', '1/1/1970', 1),
(120, 'Herni Diana', '21909', 'HED', 'Perempuan', 'Islam', '11/5/2019', NULL, 7, 43, 105, 8, NULL, NULL, NULL, NULL, 'herni@batubata.co.id', '7/1/1970', 1),
(121, 'Arman Firmansyah', '21901', 'AFH', 'Laki-Laki', 'Islam', '11/21/2020', NULL, 7, 44, 70, 8, NULL, NULL, NULL, NULL, 'arman@batubata.co.id', '7/1/1970', 1),
(122, 'Yodia Anggiani', '21914', 'YDA', 'Perempuan', 'Islam', '1/14/2020', NULL, 7, 45, 6, 8, NULL, NULL, NULL, NULL, 'yodia@batubata.co.id', '1/1/1970', 1),
(123, 'Asep Imron Mubarok', '21921', 'AIM', 'Laki-Laki', 'Islam', '4/21/2020', NULL, 7, 42, 108, 8, NULL, NULL, NULL, NULL, 'asep@batubata.co.id', '1/1/1970', 1),
(124, 'Yayan Hariansyah', '21903', 'YHS', 'Laki-Laki', 'Islam', '9/24/2019', NULL, 7, 45, 115, 8, NULL, NULL, NULL, NULL, 'yayan@batubata.co.id', '1/1/1970', 1),
(125, 'Reza Firmansyah', '21904', 'RFY', 'Laki-Laki', 'Islam', '10/7/2019', NULL, 7, 45, 115, 8, NULL, NULL, NULL, NULL, 'reza@batubata.co.id', '1/1/1970', 1),
(126, 'Abdul Malik Rachman', '21913', 'AMR', 'Laki-Laki', 'Islam', '1/2/2019', NULL, 7, 45, 114, 11, NULL, NULL, NULL, NULL, 'malik@batubata.co.id', '1/1/1970', 1),
(127, 'Renny Latifah', '21916', 'RYL', 'Perempuan', 'Islam', '12/2/2019', NULL, 7, 45, 114, 8, NULL, NULL, NULL, NULL, 'renny@batubata.co.id', '1/1/1970', 1),
(128, 'Agny Arma Ratrika Sari', '21918', 'AGR', 'Perempuan', 'Islam', '1/6/2020', NULL, 7, 45, 114, 8, NULL, NULL, NULL, NULL, 'agny@batubata.co.id', '1/1/1970', 1),
(129, 'febri sri Suwariani', '21919', 'FSS', 'Perempuan', 'Islam', '2/11/2020', NULL, 7, 45, 114, 8, NULL, NULL, NULL, NULL, 'febri@batubata.co.id', '1/1/1970', 1),
(130, 'Agus Irfansyah', '21927', 'AGI', 'Laki-Laki', 'Islam', '12/21/2020', NULL, 7, 45, 114, 8, NULL, NULL, NULL, NULL, 'agus@batubata.co.id', '1/1/1970', 1),
(131, 'Tito Ibnu Aziz', '21924', 'TIZ', 'Laki-Laki', 'Islam', '7/21/2020', NULL, 7, 46, 116, 8, NULL, NULL, NULL, NULL, 'titoibazs@batubata.co.id', '1/1/1970', 1),
(132, 'Ari Sulaiman', '21907', 'ASA', 'Laki-Laki', 'Islam', '9/24/2019', NULL, 7, 46, 114, 8, NULL, NULL, NULL, NULL, 'ari@batubata.co.id', '1/1/1970', 1),
(133, 'Septaria Bernita', '21999', 'SEB', 'Perempuan', 'Islam', '3/22/2021', NULL, 7, 43, 104, 8, NULL, NULL, NULL, NULL, 'tata@batubata.co.id', '1/1/1970', 1),
(134, 'Ranti Indraswari', '21029', 'RNT', 'Perempuan', 'Islam', '6/7/2021', NULL, 6, 35, 117, 13, 'RAI', NULL, NULL, NULL, 'ranti@pinc.group', '9/1/2021', 1),
(135, 'Ranti Indraswari', '21925', 'RAS', 'Perempuan', 'Islam', '6/7/2021', NULL, 7, 42, 117, 8, 'RAI', NULL, NULL, NULL, 'ranti@batubata.co.id', '9/1/2021', 1),
(136, 'Nofriwan', '21900', 'NOF', 'Laki-Laki', 'Islam', '6/4/2021', NULL, 7, 42, 102, 8, NULL, NULL, NULL, NULL, 'nofriwan@batubata.co.id', '1/1/1970', 1),
(137, 'Siswi Dewita', '21991', 'SID', 'Perempuan', 'Islam', '9/24/2019', NULL, 7, 42, 107, 8, NULL, NULL, NULL, NULL, 'siswi@batubata.co.id', '1/1/1970', 1),
(138, 'Poppy Anggia Utami Putri', '21030', 'PAU', 'Perempuan', 'Islam', '6/21/2021', NULL, 2, 32, 90, 8, 'OTE', 'RAH', 'ANM', 'ANP', 'poppy.utami@mataangin.co.id', '9/1/2022', 1),
(139, 'Rafika', '21037', 'RFK', 'Perempuan', 'Islam', '7/9/2021', NULL, 2, 14, 14, 10, 'YKM', 'TLS', 'PDD', 'ADP', 'rafika@mataangin.co.id', '10/1/2022', 1),
(140, 'Amira Syifa Wijaksana', '21039', 'ASW', 'Perempuan', 'Islam', '7/11/2021', NULL, 2, 14, 6, 8, 'ALR', 'JCH', 'AKR', 'APD', 'amira.syifa@mataangin.co.id', '10/1/2022', 1),
(141, 'Daniel Ferryansyah', '21041', 'DFR', 'Laki-Laki', 'Islam', '7/13/2021', NULL, 1, 55, 25, 9, 'NSA', 'YAP', 'NDG', 'ADF', 'daniel.ferryansyah@pantarei-ad.com', '10/1/2022', 1),
(142, 'Francini Yollandara', '21043', 'FRY', 'Laki-Laki', 'Islam', '7/19/2021', NULL, 1, 55, 28, 8, 'NSA', 'IBP', 'CNT', 'PMG', 'francini.yollandara@pantarei-ad.com', '11/1/2022', 1),
(143, 'Esmaralda Doraldina', '21046', 'EDL', 'Perempuan', 'Islam', '7/19/2021', NULL, 1, 55, 6, 8, 'AML', 'RIS', 'AAM', 'SNA', 'esmaralda.doraldina@pantarei-ad.com', '11/1/2022', 1),
(144, 'Bagus Priyo Sasmito', '21047', 'BPS', 'Laki-Laki', 'Islam', '7/21/2021', NULL, 2, 57, 24, 8, 'BFW', 'RDT', 'AKR', 'ALV', 'bagus.priyo@mataangin.co.id', '11/1/2021', 1),
(145, 'ELZARIANA MUCHLIS', '21048', 'EZM', 'Perempuan', 'Islam', '7/21/2021', '0000-00-00', 1, 55, 13, 9, 'MHU', NULL, NULL, NULL, 'elza.riana@pantarei-ad.com', '12/31/2021', 1),
(146, 'Rosvian Fathurrahman', '21049', 'RVF', 'Laki-Laki', 'Islam', '7/23/2021', NULL, 2, 41, 90, 8, 'AKR', 'ALR', 'MRQ', 'IKN', 'rosvian.faturrahman@mataangin.co.id', '11/1/2021', 1),
(147, 'Andy Raharjo', '21050', 'ARJ', 'Laki-Laki', 'Islam', '7/26/2021', NULL, 3, 12, 17, 11, 'WTO', NULL, NULL, NULL, 'andy@w3p.digital', '11/1/2022', 1),
(148, 'Muhammad Rifqi Ilhami', '21055', 'MRQ', 'Laki-Laki', 'Islam', '8/2/2021', NULL, 2, 41, 90, 8, 'AKR', 'ALR', 'RVF', 'IKN', 'muhammad.rifqi@mataangin.co.id', '11/1/2022', 1),
(149, 'Bagas Setiawan', '21056', 'BSN', 'Laki-Laki', 'Protestan', '8/2/2021', NULL, 2, 41, 87, 8, 'BFW', 'RDT', 'APP', 'BPS', 'bagas.setiawan@mataangin.co.id', '11/1/2021', 1),
(150, 'Muhammad Islam', '21057', 'MHM', 'Laki-Laki', 'Islam', '8/4/2021', NULL, 2, 28, 13, 9, 'ARL', 'RDO', 'XHS', 'CGE', 'muhammad.islam@mataangin.co.id', '11/1/2022', 1),
(151, 'Rinesa Diola Audrina', '21058', 'RDA', 'Perempuan', 'Islam', '8/4/2021', NULL, 2, 27, 90, 8, 'NPI', 'DKN', 'SMI', NULL, 'nesa.diola@mataangin.co.id', '11/1/2022', 1),
(152, 'Arnold Retno Leopold', '21059', 'ARL', 'Laki-Laki', 'Budha', '8/5/2021', NULL, 2, 28, 14, 9, 'YKM', 'CGE', 'RDO', 'XHS', 'arnold.leopold@mataangin.co.id', '11/1/2022', 1),
(153, 'Dhaifina Iken Mazaya', '21060', 'DKN', 'Perempuan', 'Islam', '8/9/2021', NULL, 2, 23, 96, 8, 'NPI', 'XHS', 'DWP', 'RDA', 'dhaifina.iken@mataangin.co.id', '11/1/2022', 1),
(154, 'Rido Prasetyo', '21061', 'RDO', 'Laki-Laki', 'Islam', '8/9/2021', NULL, 2, 28, 13, 9, 'YKM', 'XHS', 'MHM', 'ARL', 'rido.prasetyo@mataangin.co.id', '11/1/2022', 1),
(155, 'Agung Suksma Putra P.', '21062', 'ASP', 'Laki-Laki', 'Islam', '7/9/2021', '0000-00-00', 2, 57, 24, 8, 'BTM', 'ADP', 'XHS', 'RFK', 'agung.suksma@mataangin.co.id', '11/1/2021', 1),
(156, 'Muhammad Wildan', '21063', 'MWD', 'Laki-Laki', 'Islam', '8/23/2021', NULL, 1, 55, 90, 8, 'FGI', 'MHU', 'YAP', 'NTR', 'muhammad.wildan@pantarei-ad.com', '12/1/2021', 1),
(157, 'Tiara Larasati', '21064', 'TLS', 'Perempuan', 'Islam', '8/23/2021', NULL, 2, 31, 6, 8, 'RFK', 'XHS', 'ADP', NULL, 'tiara.larasati@mataangin.co.id', '12/1/2021', 1),
(158, 'Mochamad Iksan Hermana', '20165', 'IKN', 'Laki-Laki', 'Islam', '8/30/2021', NULL, 2, 57, 69, 8, 'BFW', 'AKR', 'ALR', 'RVF', 'iksan.hermana@mataangin.co.id', '12/1/2021', 1),
(159, 'Satya Dwipayana Farma', '21067', 'SDF', 'Laki-Laki', 'Islam', '9/1/2021', '0000-00-00', 2, 57, 28, 8, 'BFW', NULL, NULL, NULL, 'satya.dwifarma@mataangin.co.id', '12/1/2021', 1),
(160, 'Irbramsyah', '21987', 'IMS', 'Laki-Laki', 'Islam', '8/1/2021', NULL, 7, 46, 115, 6, NULL, NULL, NULL, NULL, NULL, '9/3/2022', 1),
(161, 'Dini Octavia Anggraeni', '21071', 'DNO', 'Perempuan', 'Islam', '9/20/2021', NULL, 2, 26, 26, 8, 'DWP', 'SWR', 'XHS', 'SMI', 'dini.ocatvia@mataangin.co.id', '12/1/2021', 1),
(162, 'Riddo Tandian', '21072', 'RDT', 'Laki-Laki', 'Budha', '9/27/2021', NULL, 2, 41, 57, 8, 'AYW', 'ALR', 'BFW', 'AKR', 'riddo.tandian@mataangin.co.id', '1/1/2022', 1),
(163, 'Marcella Mutia', '21074', 'MCM', 'Perempuan', 'Katolik', '9/30/2021', NULL, 1, 4, 30, 10, 'AAL', 'RIS', 'TES', 'AML', 'marcella.mutia@pantarei-ad.com', '1/1/2022', 1),
(164, 'Umar Hamdan', '21075', 'UMR', 'Laki-Laki', 'Islam', '10/1/2021', NULL, 2, 32, 90, 8, 'ANP', 'RAH', 'PAU', 'ALK', 'umar.hamdan@mataangin.co.id', '1/1/2022', 1),
(165, 'Gita Galantari', '21069', 'GTA', 'Perempuan', 'Islam', '9/1/2021', NULL, 6, 17, 36, 10, 'DWW', 'GSE', 'ELN', 'SYA', 'gita@pinc.group', '12/1/2022', 1),
(166, 'Septaria Bernita', '21070', 'SBT', 'Perempuan', 'Islam', '9/1/2021', NULL, 6, 17, 5, 9, 'GTA', NULL, NULL, NULL, 'tata@pinc.group', '12/1/2021', 1),
(167, 'Farly Putra Pratama', '21076', 'FLP', 'Laki-Laki', 'Islam', '10/1/2021', NULL, 2, 41, 24, 8, 'BFW', 'RDT', 'SDF', 'ADP', 'farly.pratama@mataangin.co.id', '1/1/2022', 1),
(168, 'Vebyana Yongky', '20178', 'VBY', 'Perempuan', 'Budha', '10/1/2021', NULL, 1, 38, 28, 8, 'MCM', 'SNA', 'RIS', 'TES', 'vebyana.yongky@pantarei-ad.com', '1/1/2022', 1),
(169, 'Conny Natasya Tampubolon', '20179', 'CNT', 'Perempuan', 'Protestan', '10/25/2021', NULL, 1, 39, 6, 8, 'MHU', 'ADF', 'IBP', 'AGG', 'conny.natasya@pantarei-ad.com', '1/25/2022', 1),
(170, 'Fina Camelia Putri', '21077', 'FCP', 'Perempuan', 'Islam', '10/25/2021', NULL, 2, 14, 13, 9, 'ALR', NULL, NULL, NULL, 'fina.camelia@mataangin.co.id', '2/1/2022', 1),
(171, 'Athalika Mediana', '21078', 'ALK', 'Laki-Laki', 'Islam', '10/23/2021', NULL, 2, 14, 90, 8, 'OTE', NULL, NULL, NULL, 'athalika.mediana@mataangin.co.id', '2/1/2022', 1),
(172, 'Dyan Surapati', '20180', 'DNS', 'Laki-Laki', 'Islam', '11/1/2021', NULL, 1, 38, 25, 9, 'AAL', 'SNA', 'MFK', 'ALX', 'dyan.surapati@pantarei-ad.com', '2/1/2022', 1),
(173, 'Ferry Senowandhani', '21079', 'FSN', 'Laki-Laki', 'Islam', '11/1/2021', NULL, 2, 14, 6, 8, 'AYW', NULL, NULL, NULL, 'ferry.seno@mataangin.co.id', '2/1/2022', 1),
(174, 'Jonathan Lesmana', '21080', 'JLE', 'Laki-Laki', 'Protestan', '11/1/2021', NULL, 2, 23, 96, 10, 'ELN', NULL, NULL, NULL, 'jonathan.lesmana@mataangin.co.id', '2/1/2022', 1),
(175, 'Fransisca Chrisnatiawaty Karo Karo', '20181', 'FKK', 'Perempuan', 'Protestan', '11/8/2021', NULL, 1, 38, 16, 11, 'SYA', 'CFF', 'SMT', 'MCM', 'fransisca.karokaro@pantarei-ad.com', '2/8/2022', 1),
(176, 'Christofer Felix', '20182', 'CFF', 'Laki-Laki', 'Katolik', '11/8/2021', NULL, 1, 38, 63, 7, 'FKK', 'ALX', 'SNA', 'DNS', 'christofer.felix@pantarei-ad.com', '2/8/2022', 1),
(177, 'Josua Sakti Suryanto', '21081', 'JSS', 'Laki-Laki', 'Katolik', '11/8/2021', NULL, 2, 26, 28, 8, 'DWP', 'SMI', 'ARA', 'XHS', 'josua.suryanto@mataangin.co.id', '12/1/2022', 1),
(178, 'Ayu Suci Lestari', '21082', 'ASL', 'Perempuan', 'Islam', '11/8/2021', '0000-00-00', 2, 31, 6, 13, 'RFK', NULL, NULL, NULL, 'ayu.suci@mataangin.co.id', '1/8/2022', 1),
(179, 'Alexander Kusumapradja', '20183', 'ALX', 'Laki-Laki', 'Islam', '11/22/2021', NULL, 1, 38, 26, 8, 'AAL', 'SNA', 'MFK', 'DNS', 'alexander.kusumapradja@pantarei-ad.com', '2/22/2022', 1),
(180, 'Rifqa Nikita', '21084', 'NKT', 'Perempuan', 'Islam', '11/15/2021', NULL, 2, 31, 27, 9, 'BTM', NULL, NULL, NULL, 'rifqa.nikita@mataangin.co.id', '2/1/2022', 1),
(181, 'Adi Purwanto', '21086', 'APW', 'Laki-Laki', 'Islam', '11/22/2021', NULL, 6, 16, 43, 8, 'AJO', NULL, NULL, NULL, 'adi.purwanto@pinc.group', '3/1/2022', 1),
(182, 'Andhika Fadillah', '20184', 'ADF', 'Laki-Laki', 'Islam', '12/1/2021', NULL, 1, 39, 57, 8, 'MHU', 'NSA', 'KAM', 'DES', 'andhika.fadillah@pantarei-ad.com', '3/1/2022', 1),
(183, 'Ellen Trecia', '21087', 'ETC', 'Perempuan', 'Islam', '12/6/2021', NULL, 6, 17, 105, 8, 'GTA', NULL, NULL, NULL, 'ellen@pinc.group', '3/1/2022', 1),
(184, 'Muhamad Nurdin', '16029', 'MUN', 'Laki-Laki', 'Islam', '7/11/2016', NULL, 3, 59, 44, 8, 'WTO', 'DEY', 'RNL', 'TPM', 'nurdin@w3p.digital', '10/1/2022', 1),
(185, 'Aditiyawarman', '5932', 'AYW', 'Laki-Laki', 'Islam', '1/10/2005', NULL, 2, 41, 17, 11, 'ELN', 'YOM', 'IPS', 'ALR', 'aditiyawarman@mataangin.co.id', '1/1/2021', 1),
(186, 'Marlin Akbar Nasution', '21012', 'MRL', 'Laki-Laki', 'Islam', '2/1/2021', NULL, 3, 59, 28, 8, 'TPM', 'JAP', 'SLG', 'GJT', 'marlin@w3p.digital', '8/1/2022', 1),
(187, 'Yohannes Muliady', '11010', 'YOM', 'Laki-Laki', 'Katolik', '6/8/2011', NULL, 2, 58, 80, 18, 'HER', NULL, NULL, NULL, 'yohannes.muliady@mataangin.co.id', '7/1/2017', 1),
(188, 'Hermanto Soerjanto', '5945', 'HMN', 'Laki-Laki', 'Katolik', '1/5/2005', NULL, 1, 49, 22, 12, 'MDS', NULL, NULL, NULL, 'hermanto@pantarei-ad.com', '1/1/1970', 1),
(189, 'Elizabeth Inkan', '8331', 'ELN', 'Perempuan', 'Katolik', '4/28/2008', NULL, 2, 58, 21, 18, 'IRO', NULL, NULL, NULL, 'elizabeth.inkan@mataangin.co.id', '6/1/2017', 1),
(190, 'Michael D. Sudarto', '97452', 'MDS', 'Laki-Laki', 'Katolik', '12/18/1997', NULL, 1, 49, 21, 13, NULL, NULL, NULL, NULL, 'michael@pantarei-ad.com', '1/1/1970', 1),
(191, 'Willy Tanujoyo', '16008', 'WTO', 'Laki-Laki', 'Budha', '2/1/2016', NULL, 3, 5, 21, 12, 'WTO', NULL, NULL, NULL, 'willy@w3p.digital', '1/1/1970', 1),
(192, 'nm_karyawan', 'nik', 'inisial', 'jenis_kelamin', 'kd_agama', 'tgl_masuk', '0000-00-00', 0, 0, 0, 0, 'inisial_atasan1', 'inisial_atasan3', 'inisial_atasan4', 'inisial_atasan5', 'email_kantor', 'tgl_appraisal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_old`
--

CREATE TABLE `karyawan_old` (
  `id` int(5) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `rekan_kerja` varchar(255) DEFAULT NULL,
  `id_departemen` int(15) DEFAULT NULL,
  `id_jabatan` int(15) DEFAULT NULL,
  `id_golongan` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_old`
--

INSERT INTO `karyawan_old` (`id`, `nama_karyawan`, `nik`, `email`, `tempat_lahir`, `tgl_lahir`, `npwp`, `no_rek`, `agama`, `jenis_kelamin`, `phone`, `alamat`, `no_ktp`, `tgl_masuk`, `tgl_keluar`, `tgl_appraisal`, `atasan`, `rekan_kerja`, `id_departemen`, `id_jabatan`, `id_golongan`) VALUES
(22, 'Ade Jonatan', '19045', 'adeyonatan@gmail.com', 'Jakarta', '1993-01-07', '000.000.0-000.000', '6627271', 'protestan', 'pria', '082299465250', 'Kampung Melayu Tangerang', '36000000111111219291', '2019-09-05', '0000-00-00', '2021-12-01', 'Michael D. Sudarto', 'Sartika Dwiputri', 7, 1, 3),
(23, 'Michael D. Sudarto', '97452', 'juststupidcode@gmail.com', 'Jakarta', '2012-01-03', '000.000.0-000.000', '6627271', 'protestan', 'pria', '082299465259', 'Pondok Indah', '36000000111111219291', '1994-03-01', '0000-00-00', '2021-08-05', 'Ade Jonatan', 'Ade Jonatan', 6, 2, 4),
(24, 'Dwi Wicaksono Wibowo', '14034', 'adejonatan@gmail.com', 'Jakarta', '1993-06-04', '000.000.0-000.000', '6627271', 'islam', 'pria', '082299465259', 'Depok', '36000000111111219291', '2014-03-19', '0000-00-00', '2021-08-20', 'Michael D. Sudarto', 'Ade Jonatan', 6, 2, 4),
(25, 'Sartika Dwiputri', '16059', 'adejonatan@gmail.com', 'Jakarta', '1993-01-07', '000.000.0-000.000', '6627271', 'islam', 'wanita', '082299465259', 'Bogor', '36000000111111219291', '2017-07-05', '0000-00-00', '2021-08-12', 'Michael D. Sudarto', 'Ade Jonatan', 5, 5, 3),
(26, 'Abdul Azis', '19001', 'adejonatan@gmail.com', 'Jakarta', '2012-01-03', '000.000.0-000.000', '6627271', 'islam', 'pria', '082299465259', 'Kampung Melayu Tangerang', '36000000111111219291', '2015-04-10', '0000-00-00', '2021-08-20', 'Michael D. Sudarto', 'Ade Jonatan', 5, 5, 3),
(27, 'Christa Gabriella Emma M', '20077', 'adejonatan@gmail.com', 'Jakarta', '1993-01-22', '000.000.0-000.000', '6627271', 'protestan', 'wanita', '082299465259', 'Pondok Indah', '36000000111111219291', '2019-09-20', '0000-00-00', '2021-08-28', 'Abdul Azis', 'Sartika Dwiputri', 5, 5, 2),
(28, 'Ade Jonatan', '19045', 'adeyonatan@gmail.com', 'Jakarta', '1993-01-07', '000.000.0-000.000', '6627271', 'protestan', 'pria', '082299465250', 'Kampung Melayu Tangerang', '36000000111111219291', '2019-09-05', '0000-00-00', '2021-12-01', 'Dwi Wicaksono Wibowo', 'Sartika Dwiputri', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_form`
--

CREATE TABLE `master_form` (
  `id` int(15) NOT NULL,
  `id_jabatan` int(15) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `kondisi1` varchar(255) DEFAULT NULL,
  `kondisi2` varchar(255) DEFAULT NULL,
  `kondisi3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_form`
--

INSERT INTO `master_form` (`id`, `id_jabatan`, `nama_jabatan`, `kondisi1`, `kondisi2`, `kondisi3`) VALUES
(1, 5, 'HRGA STAFF', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(2, 6, 'ACCOUNT EXECUTIVE', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(3, 13, 'SENIOR ACCOUNT EXECUTIVE', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(4, 14, 'ACCOUNT MANAGER', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(5, 15, 'SENIOR ACCOUNT MANAGER', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(6, 16, 'ASSOCIATE ACCOUNT DIRECTOR', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(7, 17, 'ACCOUNT DIRECTOR', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(8, 18, 'BUSINESS DIRECTOR', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(9, 19, 'CHIEF OPERATING OFFICER', 'self_know_bod', 'self_know_bod', 'self_know_bod'),
(10, 20, 'CHIEF FINANCE OFFICER', 'self_know_bod', 'self_know_bod', 'self_know_bod'),
(11, 21, 'CHIEF EXECUTIVE OFFICER', 'self_know_bod', 'self_know_bod', 'self_know_bod'),
(12, 22, 'CHIEF CREATIVE OFFICER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(13, 23, 'DEPUTY CFO', 'self_know_fin', 'self_skills_fin', 'self_attitude_fin'),
(14, 24, 'ART DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(15, 25, 'SENIOR ART DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(16, 26, 'COPYWRITER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(17, 27, 'SENIOR COPYWRITER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(18, 28, 'GRAPHIC DESIGNER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(19, 29, 'SENIOR GRAPHIC DESIGNER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(20, 30, 'CREATIVE GROUP HEAD', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(21, 31, 'SENIOR CREATIVE GROUP HEAD', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(22, 32, 'ASSOCIATE CREATIVE DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(23, 33, 'CREATIVE DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(24, 34, 'HRGA SPECIALIST', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(25, 35, 'SENIOR HRGA SPECIALIST', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(26, 36, 'HRGA GROUP HEAD', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(27, 37, 'FINANCE & ACCOUNTING STAFF', 'self_know_fin', 'self_skills_fin', 'self_attitude_fin'),
(28, 38, 'SENIOR FINANCE & ACCOUNTING STAFF', 'self_know_fin', 'self_skills_fin', 'self_attitude_fin'),
(29, 39, 'FINANCE & ACCOUNTING MANAGER', 'self_know_fin', 'self_skills_fin', 'self_attitude_fin'),
(30, 40, 'SENIOR FINANCE & ACCOUNTING MANAGER', 'self_know_fin', 'self_skills_fin', 'self_attitude_fin'),
(31, 41, 'GA STAFF', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(32, 42, 'RECEPTIONIST & GA STAFF', 'self_know_hrga', 'self_skills_hrga', 'self_attitude_hrga'),
(33, 43, 'IT SUPPORT', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(34, 44, 'IT PROGRAMMER', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(35, 45, 'SENIOR IT PROGRAMMER', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(36, 46, 'IT MANAGER', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(37, 47, 'SENIOR IT PROGRAMER', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(38, 48, 'DIGITAL ART DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(39, 49, 'SENIOR DIGITAL ART DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(40, 50, 'DIGITAL GRAPHIC DESIGNER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(41, 51, 'SENIOR DIGITAL GRAPHIC DESIGNER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(42, 52, 'DIGITAL COPYWRITER', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(43, 53, 'SENIOR DIGITAL COPYWRITER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(44, 54, 'DIGITAL CREATIVE GROUP HEAD', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(45, 55, 'DIGITAL CREATIVE DIRECTOR', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(46, 56, 'DPT/ FA ARTIST', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(47, 57, 'TRAFFIC & PRODUCTION EXECUTIVE', 'self_know_traffic', 'self_skills_traffic', 'self_attitude_traffic'),
(48, 58, 'SENIOR TRAFFIC & PRODUCTION EXECUTIVE', 'self_know_traffic', 'self_skills_traffic', 'self_attitude_traffic'),
(49, 59, 'SOCIAL MEDIA ADMIN', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(50, 60, 'SOCIAL MEDIA SPECIALIST', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(51, 61, 'SOCIAL MEDIA GROUP HEAD', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(52, 62, 'COMMUNITY MANAGER', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(53, 63, 'JUNIOR ACCOUNT EXECUTIVE', 'self_know_acc', 'self_skills_acc', 'self_attitude_acc'),
(54, 64, 'PRODUCER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(55, 65, 'EXECUTIVE SECRETARY', 'self_know_sec', 'self_know_sec', 'self_know_sec'),
(56, 66, 'SOCIAL MEDIA & CONTENT ADMIN', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(57, 67, 'IT SUPERVISOR', 'self_know_it', 'self_skills_it', 'self_attitude_it'),
(58, 68, 'DIGITAL STRATEGIST', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital'),
(59, 69, 'CONTENT WRITER', 'self_know_creative', 'self_skills_creative', 'self_attitude_creative'),
(60, 90, 'SOCIAL MEDIA OFFICER', 'self_know_digital', 'self_skills_digital', 'self_attitude_digital');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `operation` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `controller_name`, `fa_icon`, `operation`, `sort_order`) VALUES
(1, 'admin', 'admin', 'fa-pie-chart', 'view|add|edit|delete|change_status|access', 3),
(2, 'role_and_permissions', 'admin_roles', 'fa-book', 'view|add|edit|delete|change_status|access', 4),
(3, 'users', 'users', 'fa-users', 'view|add|edit|delete|change_status|access', 4),
(7, 'backup_and_export', 'export', 'fa-database', 'access', 12),
(8, 'settings', 'general_settings', 'fa-cogs', 'view|add|edit|access', 13),
(9, 'dashboard', 'dashboard', 'fa-dashboard', 'view|index_2|index_3|access', 1),
(10, 'codeigniter_examples', 'example', 'fa-snowflake-o', 'access', 6),
(11, 'invoicing_system', 'invoices', 'fa-files-o', 'access', 9),
(12, 'database_joins_example', 'joins', 'fa-external-link-square', 'access', 7),
(13, 'language_setting', 'languages', 'fa-language', 'access', 14),
(14, 'locations', 'location', 'fa-map-pin', 'access', 11),
(15, 'widgets', 'widgets', 'fa-th', 'access', 19),
(16, 'charts', 'charts', 'fa-line-chart', 'access', 17),
(17, 'ui_elements', 'ui', 'fa-tree', 'access', 18),
(18, 'forms', 'forms', 'fa-edit', 'access', 20),
(19, 'tables', 'tables', 'fa-table', 'access', 21),
(21, 'mailbox', 'mailbox', 'fa-envelope-o', 'access', 23),
(22, 'pages', 'pages', 'fa-book', 'access', 24),
(23, 'extras', 'extras', 'fa-plus-square-o', 'access', 25),
(25, 'profile', 'profile', 'fa-user', 'access', 2),
(26, 'activity_log', 'activity', 'fa-flag-o', 'access', 11);

-- --------------------------------------------------------

--
-- Table structure for table `module_access`
--

CREATE TABLE `module_access` (
  `id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_access`
--

INSERT INTO `module_access` (`id`, `admin_role_id`, `module`, `operation`) VALUES
(1, 1, 'users', 'view'),
(2, 1, 'users', 'add'),
(3, 1, 'users', 'edit'),
(5, 1, 'users', 'access'),
(6, 1, 'users', 'change_status'),
(7, 1, 'export', 'access'),
(8, 1, 'general_settings', 'view'),
(9, 1, 'general_settings', 'add'),
(10, 1, 'general_settings', 'edit'),
(11, 1, 'general_settings', 'access'),
(27, 2, 'dashboard', 'access'),
(28, 2, 'profile', 'access'),
(29, 2, 'dashboard', 'view'),
(34, 2, 'tables', 'access'),
(35, 2, 'forms', 'access'),
(36, 2, 'calendar', 'access'),
(37, 2, 'mailbox', 'access'),
(38, 2, 'pages', 'access'),
(39, 2, 'extras', 'access'),
(40, 2, 'ui', 'access'),
(41, 2, 'charts', 'access'),
(42, 2, 'widgets', 'access'),
(43, 2, 'users', 'view'),
(44, 2, 'users', 'add'),
(45, 2, 'users', 'edit'),
(46, 2, 'users', 'change_status'),
(47, 2, 'users', 'access'),
(48, 2, 'example', 'access'),
(49, 2, 'joins', 'access'),
(50, 2, 'invoices', 'access'),
(51, 2, 'location', 'access'),
(52, 2, 'activity', 'access'),
(53, 2, 'export', 'access'),
(54, 5, 'dashboard', 'view'),
(55, 5, 'dashboard', 'index_2'),
(56, 5, 'dashboard', 'index_3'),
(57, 5, 'dashboard', 'access'),
(58, 5, 'admin', 'view'),
(59, 5, 'admin', 'change_status'),
(60, 5, 'admin', 'add'),
(61, 5, 'admin', 'edit'),
(62, 5, 'admin', 'delete'),
(63, 5, 'admin_roles', 'delete'),
(64, 5, 'admin_roles', 'edit'),
(65, 5, 'admin_roles', 'access'),
(66, 5, 'admin_roles', 'add'),
(67, 5, 'admin_roles', 'view'),
(68, 5, 'admin_roles', 'change_status'),
(69, 2, 'admin', 'view'),
(70, 2, 'admin', 'edit'),
(71, 2, 'admin', 'delete'),
(72, 2, 'admin', 'access'),
(73, 2, 'admin', 'change_status'),
(74, 2, 'admin', 'add'),
(75, 2, 'admin_roles', 'change_status'),
(76, 2, 'admin_roles', 'view'),
(77, 2, 'admin_roles', 'add'),
(78, 2, 'admin_roles', 'access'),
(79, 2, 'admin_roles', 'edit'),
(80, 2, 'admin_roles', 'delete'),
(81, 5, 'pages', 'access'),
(82, 5, 'extras', 'access'),
(83, 5, 'mailbox', 'access'),
(84, 5, 'users', 'view'),
(85, 5, 'users', 'change_status'),
(86, 5, 'users', 'add'),
(87, 5, 'users', 'access'),
(88, 5, 'users', 'edit'),
(89, 5, 'users', 'delete'),
(90, 5, 'example', 'access'),
(91, 5, 'joins', 'access'),
(92, 5, 'invoices', 'access'),
(93, 5, 'location', 'access'),
(94, 5, 'activity', 'access'),
(95, 5, 'export', 'access'),
(96, 5, 'general_settings', 'view'),
(97, 5, 'general_settings', 'add'),
(98, 5, 'general_settings', 'edit'),
(99, 5, 'general_settings', 'access'),
(100, 5, 'languages', 'access'),
(101, 5, 'lowongan', 'add'),
(102, 5, 'ui', 'access'),
(103, 5, 'widgets', 'access'),
(104, 5, 'forms', 'access'),
(105, 5, 'tables', 'access'),
(106, 5, 'lowongan', 'view'),
(107, 5, 'lowongan', 'edit'),
(108, 5, 'lowongan', 'access'),
(109, 5, 'lowongan', 'delete'),
(110, 2, 'dashboard', 'access'),
(111, 2, 'dashboard', 'add'),
(112, 2, 'dashboard', 'edit'),
(113, 2, 'dashboard', 'delete'),
(115, 5, 'admin', 'access');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(15) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `s_knowledge` varchar(255) DEFAULT NULL,
  `s_skills` varchar(255) DEFAULT NULL,
  `s_attitude` varchar(255) DEFAULT NULL,
  `s_individual` varchar(255) DEFAULT NULL,
  `s_total` varchar(255) DEFAULT NULL,
  `w_knowledge` varchar(255) DEFAULT NULL,
  `w_skills` varchar(255) DEFAULT NULL,
  `w_attitude` varchar(255) DEFAULT NULL,
  `w_individual` varchar(255) DEFAULT NULL,
  `w_total` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nik`, `s_knowledge`, `s_skills`, `s_attitude`, `s_individual`, `s_total`, `w_knowledge`, `w_skills`, `w_attitude`, `w_individual`, `w_total`, `tanggal`) VALUES
(1, '19045', '2.00', '2.00', '2.00', '2.00', '8.00', '0.50', '0.50', '1.10', '0.10', '2.20', '2022-02-26'),
(2, '20046', '3', '3', '3', '3', '12', '3', '3', '3', '3', '12', '2022-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(15) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `nama_karyawan`, `nik`, `jenis`, `nama`, `email`, `status`) VALUES
(1, 'Amanda Lestari', '21016', '360', 'SMT', 'sismita@pantarei-ad.com', 1),
(2, 'Amanda Lestari', '21016', '360', 'EDL', 'esmaralda.doraldina@pantarei-ad.com', 1),
(3, 'Amanda Lestari', '21016', '360', 'NSA', 'novia.achmadi@pantarei-ad.com', 1),
(4, 'Amanda Lestari', '21016', 'self', 'AML', 'amanda.lestari@pantarei-ad.com', 1),
(5, 'Adi Purwanto', '21086', '360', 'AJO', 'it@pantarei.id', 2),
(6, 'Adi Purwanto', '21086', '360', 'LNH', 'lukman.hakim@mataangin.co.id', 2),
(7, 'Adi Purwanto', '21086', '360', 'GTA', 'gita@pinc.group', 1),
(8, 'Adi Purwanto', '21086', 'self', 'APW', 'adi.purwanto@pinc.group', 2),
(9, 'Ellen Trecia', '21087', '360', 'CMA', 'cindy.marcela@pantarei-ad.com', 1),
(10, 'Ellen Trecia', '21087', '360', 'MFS', 'm.feariansyah@mataangin.co.id', 1),
(11, 'Ellen Trecia', '21087', '360', 'AJO', 'it@pantarei.id', 1),
(12, 'Ellen Trecia', '21087', 'self', 'ETC', 'ellen@pinc.group', 1),
(13, 'Adeprianto Nugroho', '20046', '360', 'XHS', 'xenia.susetyo@mataangin.co.id', 1),
(14, 'Adeprianto Nugroho', '20046', '360', 'CGE', 'christa.emma@mataangin.co.id', 1),
(15, 'Adeprianto Nugroho', '20046', '360', 'MHM', 'muhammad.islam@mataangin.co.id', 1),
(16, 'Adeprianto Nugroho', '20046', 'self', 'ADP', 'ade.prianto@mataangin.co.id', 1),
(17, 'Nesya Prinsesva Putri', '20066', '360', 'DWP', 'dwiarto.otten@mataangin.co.id', 1),
(18, 'Nesya Prinsesva Putri', '20066', '360', 'XHS', 'xenia.susetyo@mataangin.co.id', 1),
(19, 'Nesya Prinsesva Putri', '20066', '360', 'ACH', 'annisa.chairiyanti@mataangin.co.id', 1),
(20, 'Nesya Prinsesva Putri', '20066', 'self', 'NPI', 'nesya.putri@mataangin.co.id', 1),
(21, 'Alexander Kusumapradja', '20183', '360', 'MFK', 'muhammad.khadafi@pantarei-ad.com', 1),
(22, 'Alexander Kusumapradja', '20183', '360', 'SNA', 'safira.alifah@pantarei-ad.com', 1),
(23, 'Alexander Kusumapradja', '20183', '360', 'ASL', 'ayu.suci@pantarei-ad.com', 1),
(24, 'Alexander Kusumapradja', '20183', 'self', 'ALX', 'alexander.kusumapradja@pantarei-ad.com', 1),
(25, 'Andhika Fadillah', '20184', '360', 'YAP', 'yudhistira.adhi@pantarei-ad.com', 1),
(26, 'Andhika Fadillah', '20184', '360', 'SAD', 'sartika.dwiputri@pantarei-ad.com', 1),
(27, 'Andhika Fadillah', '20184', '360', 'YRA', 'yori.akbar@pantarei-ad.com', 1),
(28, 'Andhika Fadillah', '20184', 'self', 'ADF', 'andhika.fadillah@pantarei-ad.com', 1),
(29, 'Meltrin Hutabarat', '19027', '360', 'YAP', 'yudhistira.adhi@pantarei-ad.com', 1),
(30, 'Meltrin Hutabarat', '19027', '360', 'SAD', 'sartika.dwiputri@pantarei-ad.com', 1),
(31, 'Meltrin Hutabarat', '19027', '360', 'PMG', 'puti.ambang@pantarei-ad.com', 1),
(32, 'Meltrin Hutabarat', '19027', 'self', 'MHU', 'meltrin.hutabarat@pantarei-ad.com', 1),
(33, 'Nissa Triafni', '20141', '360', 'DFR', 'daniel.ferryansyah@pantarei-ad.com', 1),
(34, 'Nissa Triafni', '20141', '360', 'CNT', 'conny.natasya@pantarei-ad.com', 1),
(35, 'Nissa Triafni', '20141', '360', 'NDG', 'desak.gayatri@pantarei-ad.com', 1),
(36, 'Nissa Triafni', '20141', 'self', 'NTR', 'nissa.triafni@pantarei-ad.com', 1),
(37, 'Satrio Pamungkas', '20143', '360', 'ADF', 'andhika.fadillah@pantarei-ad.com', 1),
(38, 'Satrio Pamungkas', '20143', '360', 'MWD', 'muhammad.wildan@pantarei-ad.com', 1),
(39, 'Satrio Pamungkas', '20143', '360', 'YAP', 'yudhistira.adhi@pantarei-ad.com', 1),
(40, 'Satrio Pamungkas', '20143', 'self', 'SPS', 'satrio.pamungkas@pantarei-ad.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(5) NOT NULL,
  `kategori_pertanyaan` varchar(255) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `kategori_pertanyaan`, `pertanyaan`) VALUES
(3, '360_per', 'Bagaimana ketrampilan ybs terhadap posisi nya saat ini? (skill)'),
(4, '360_per', 'Bagaimana pengetahuan ybs terhadap posisi nya saat ini? (knowledge)			'),
(5, '360_att', 'Apakah ybs memberikan kerjasama tim yang baik?			'),
(6, '360_att', 'Bagaimana ybs menghadapi situasi sulit dalam pekerjaan?			'),
(7, '360_att', 'bagaimana daya dan upaya ybs dalam menyelesaikan pekerjaan?'),
(26, 'spv', 'current news and trend are related or didn’t related to the job'),
(27, 'spv', 'understanding of pantarei work flow in cross divisions'),
(28, 'spv', 'related to main task : hardware for support, programming for programmer'),
(29, 'spv', 'IT Applications (Email, Website, another Apps.)'),
(30, 'spv', 'Work Speed'),
(31, 'spv', 'Negotiation'),
(32, 'spv', 'Languange'),
(33, 'spv', 'Hardware & Software troubleshooting'),
(34, 'spv', 'Leadership & Team Work'),
(35, 'spv', 'Vendor Management'),
(36, 'spv', 'Understanding & Managing User Expectation'),
(37, 'spv', 'Passion towards to the job'),
(38, 'spv', 'Eagerness to learn'),
(39, 'spv', 'Respect towards peers, superiors, partners/ vendors, clients'),
(40, 'spv', 'CAN-DO, Positivity'),
(41, 'spv', 'Sense of belonging to the company'),
(42, 'spv', 'Perseverance'),
(43, 'spv', 'Honesty'),
(44, 'self_know_creative', 'General Knowledge (current news and trends, directly or indirectly related to the job)'),
(45, 'self_know_creative', 'Basic Workflow (understanding of pantarei work flow a cross divisions)'),
(46, 'self_know_creative', 'Communication theory'),
(47, 'self_know_creative', 'Branding and communication strategy'),
(48, 'self_know_creative', 'Client + Competitor Brands Dan Products in the market'),
(49, 'self_know_creative', 'Creative Process (from brief to final idea)'),
(50, 'self_know_creative', 'Production Process'),
(51, 'self_know_creative', 'Understanding of the media neutral concept'),
(52, 'self_skills_creative', 'Work Speed'),
(53, 'self_skills_creative', 'Time Management'),
(54, 'self_skills_creative', 'Computer (ability to use software Dan hardware related to the job)'),
(55, 'self_skills_creative', 'Languange (Bahasa Dan Basic English)'),
(56, 'self_skills_creative', 'Presentation (related to the job)'),
(57, 'self_skills_creative', 'Creative Thinking (Ability to come up with Ideas)'),
(58, 'self_skills_creative', 'Craftmanship'),
(59, 'self_attitude_creative', 'Passion towards to the job'),
(60, 'self_attitude_creative', 'Eagerness to learn'),
(61, 'self_attitude_creative', 'Respect towards peers, superiors, partners/ vendors, clients'),
(62, 'self_attitude_creative', 'CAN-DO, Positivity'),
(63, 'self_attitude_creative', 'Sense of belonging to the company'),
(64, 'self_attitude_creative', 'Perseverance'),
(65, 'self_attitude_creative', 'Company Compliance'),
(66, 'self_attitude_creative', 'Resourcefulnes (willingness to be part of the solution)'),
(67, 'self_attitude_creative', 'Honesty'),
(68, 'self_know_hrga', 'General Knowledge (current news and trends, directly or indirectly related to the job)'),
(69, 'self_know_hrga', '\"Basic Workflow (understanding of pantarei work flow a cross divisions)\"'),
(70, 'self_know_hrga', 'Clerical & Office Administration'),
(71, 'self_know_it', 'current news and trend are related or didn’t related to the job'),
(72, 'self_know_it', 'understanding of pantarei work flow in cross divisions'),
(73, 'self_know_it', 'related to main task : hardware for support, programming for programmer'),
(74, 'self_know_it', 'IT Applications (Email, Website, another Apps.)'),
(75, 'self_skills_it', 'Work Speed'),
(76, 'self_skills_it', 'Negotiation'),
(77, 'self_skills_it', 'Languange'),
(78, 'self_skills_it', 'Hardware & Software troubleshooting'),
(79, 'self_skills_it', 'Leadership & Team Work'),
(80, 'self_skills_it', 'Vendor Management'),
(81, 'self_skills_it', 'Understanding & Managing User Expectation'),
(82, 'self_attitude_it', 'Passion towards to the job'),
(83, 'self_attitude_it', 'Eagerness to learn'),
(84, 'self_attitude_it', 'Respect towards peers, superiors, partners/ vendors, clients'),
(85, 'self_attitude_it', 'CAN-DO, Positivity'),
(86, 'self_attitude_it', 'Sense of belonging to the company'),
(87, 'self_attitude_it', 'Perseverance'),
(88, 'self_attitude_it', 'Honesty'),
(89, 'self_know_hrga', 'Office Management'),
(90, 'self_know_hrga', 'General Affair'),
(91, 'self_skills_hrga\r\n', 'Work Speed'),
(92, 'self_skills_hrga\r\n', 'Negotiation'),
(93, 'self_skills_hrga', 'Computer (ability to use software & hardware related to the job)'),
(94, 'self_skills_hrga', 'Language (Bahasa & Basic English)'),
(95, 'self_skills_hrga', '\"Administration & Documentation (daily mail, delivery notes, and Office Supplies)\"'),
(96, 'self_skills_hrga', '\"GA Management (Building Maintenance, Electrical Maintenance)\"'),
(97, 'self_skills_hrga', '\"Managing Reception Task (daily mail, delivery, incoming & outgoing call, couriers)\"'),
(98, 'self_skills_hrga', '\"Visitors Services (greeting, welcoming, directing, and announching them appropriately)\"'),
(99, 'self_skills_hrga', '\"Handling non staff personel (Office Boy, Messenger, Security, Technicians)\"'),
(100, 'self_attitude_hrga', 'Passion towards to the job'),
(101, 'self_attitude_hrga', 'Eagerness to learn'),
(102, 'self_attitude_hrga', 'Respect towards peers, superiors, partners/ vendors, clients'),
(103, 'self_attitude_hrga', 'CAN-DO, Positivity'),
(104, 'self_attitude_hrga', 'Sense of belonging to the company'),
(105, 'self_attitude_hrga', 'Resourcefulnes (willingness to be part of the solution)'),
(106, 'self_attitude_hrga', 'Perseverance'),
(107, 'self_attitude_hrga', 'Honesty'),
(108, 'self_know_acc', '\"General Knowledge (current news and trends, directly or indirectly related to the job)\"'),
(109, 'self_know_acc', '\"Basic Workflow (understanding of pantarei work flow a cross divisions)\"'),
(110, 'self_know_acc', 'Basic Communication theory'),
(111, 'self_know_acc', 'Basic Branding and communication strategy'),
(112, 'self_know_acc', 'Client\'s + Competitor\'s Brands & Products in the market'),
(113, 'self_know_acc', 'Creative Process'),
(114, 'self_know_acc', 'Production Process'),
(115, 'self_know_acc', 'Media'),
(116, 'self_know_acc', 'Digital General Knowledge'),
(117, 'self_know_acc', 'Understanding of the media neutral concept'),
(118, 'self_skills_acc', 'Work Speed'),
(119, 'self_skills_acc', 'Negotiation'),
(120, 'self_skills_acc', 'Time/ Project Management'),
(121, 'self_skills_acc', 'Computer (ability to use software & hardware related to the job)'),
(122, 'self_skills_acc', '\"Languange (Bahasa & Basic English)\"'),
(123, 'self_skills_acc', '\"Presentation Skill (related to the job)\"'),
(124, 'self_skills_acc', 'Deck Preparation'),
(125, 'self_skills_acc', 'Craftmanship'),
(126, 'self_skills_acc', 'Ability to develop good brief (CBS / CWP)'),
(127, 'self_skills_acc', 'Ability to stimulate and adding value to the thinking process'),
(128, 'self_skills_acc', 'Strategy Development'),
(129, 'self_skills_acc', 'Reporting & Administration'),
(130, 'self_attitude_acc', 'Passion towards to the job'),
(131, 'self_attitude_acc', 'Eagerness to learn'),
(132, 'self_attitude_acc', 'Respect towards peers, superiors, partners/ vendors, clients'),
(133, 'self_attitude_acc', 'CAN-DO, Positivity'),
(134, 'self_attitude_acc', 'Sense of belonging to the company'),
(135, 'self_attitude_acc', 'Perseverance'),
(136, 'self_attitude_acc', 'Resourcefulnes (willingness to be part of the solution)'),
(137, 'self_attitude_acc', 'Honesty'),
(138, 'self_know_fin', '\"General Knowledge (current news and trend are related or didn’t related to the job)\"'),
(139, 'self_know_fin', '\"Basic Workflow (understanding of pantarei work flow in cross divisions)\"'),
(140, 'self_know_fin', 'Finance & Administration'),
(141, 'self_know_fin', 'Accounting & auditing'),
(142, 'self_know_fin', 'Tax (ppn, pph)'),
(143, 'self_know_fin', 'Financial Planning'),
(144, 'self_skills_fin', 'Work Speed'),
(145, 'self_skills_fin', 'Negotiation'),
(146, 'self_skills_fin', 'Computer (ability to use software & hardware related to the job)'),
(147, 'self_skills_fin', '\"Languange (Bahasa & Basic English)\"'),
(148, 'self_skills_fin', 'Zero Mistake / Attention to detail'),
(149, 'self_skills_fin', 'Finance & Accounting Analytical Thinking'),
(150, 'self_skills_fin', 'Smart Work (Effective & Efficient)'),
(151, 'self_skills_fin', 'Task Management'),
(152, 'self_attitude_fin', 'Passion towards to the job'),
(153, 'self_attitude_fin', 'Eagerness to learn'),
(154, 'self_attitude_fin', 'Respect towards peers, superiors, partners/ vendors, clients'),
(155, 'self_attitude_fin', 'CAN-DO, Positivity'),
(156, 'self_attitude_fin', 'Sense of belonging to the company'),
(157, 'self_attitude_fin', 'Perseverance'),
(158, 'self_attitude_fin', 'Honesty'),
(159, 'self_know_digital', '\"General Knowledge (current news and trends, directly or indirectly related to the job)\"'),
(160, 'self_know_digital', '\"Basic Workflow (understanding of pantarei work flow a cross divisions)\"'),
(161, 'self_know_digital', 'Communication theory'),
(162, 'self_know_digital', 'Branding and communication strategy'),
(163, 'self_know_digital', 'Client\'s + Competitor\'s Brands & Products in the market'),
(164, 'self_know_digital', 'Research'),
(165, 'self_know_digital', '\"Digital Media (function, usage and users)\"'),
(166, 'self_know_digital', '\"Production Process (website, content plan, digital ads, vendors relation)\"'),
(167, 'self_know_digital', 'Understanding of the media neutral concept'),
(168, 'self_skills_digital\r\n', 'Work Speed'),
(169, 'self_skills_digital\r\n', 'Negotiation'),
(170, 'self_skills_digital', 'Computer (ability to use software & hardware related to the job)'),
(171, 'self_skills_digital\r\n', '\"Languange (Bahasa & Basic English)\"'),
(172, 'self_skills_digital\r\n', '\"Presentation Skill (related to the job)\"'),
(173, 'self_skills_digital\r\n', 'Analytics'),
(174, 'self_skills_digital\r\n', 'Strategy Development'),
(175, 'self_skills_digital\r\n', 'Reporting & Administration'),
(176, 'self_attitude_digital', 'Passion towards to the job'),
(177, 'self_attitude_digital', 'Eagerness to learn'),
(178, 'self_attitude_digital', 'Respect towards peers, superiors, partners/ vendors, clients'),
(179, 'self_attitude_digital', 'CAN-DO, Positivity'),
(180, 'self_attitude_digital', 'Sense of belonging to the company'),
(181, 'self_attitude_digital', 'Perseverance'),
(182, 'self_attitude_digital', 'Company Compliance'),
(183, 'self_attitude_digital', 'Resourcefulnes (willingness to be part of the solution)'),
(184, 'self_attitude_digital', 'Honesty'),
(185, 'self_know_traffic', '\"General Knowledge (current news and trend are related or didn’t related to the job)\"'),
(186, 'self_know_traffic', '\"Basic Workflow (understanding of pantarei work flow in cross divisions)\"'),
(187, 'self_know_traffic', 'Finance & Administration'),
(188, 'self_know_traffic', 'Production Process'),
(189, 'self_know_traffic', 'Creative Process'),
(190, 'self_know_traffic', 'Media/ Digital Media'),
(191, 'self_know_traffic', '\"Vendor/ Partner Specification (vendor specialist, budget, portfolio)\"'),
(192, 'self_know_traffic', 'Project Management'),
(193, 'self_skills_traffic', 'Work Speed'),
(194, 'self_skills_traffic', 'Negotiation'),
(195, 'self_skills_traffic', 'Computer (ability to use software & hardware related to the job)'),
(196, 'self_skills_traffic', '\"Languange (Bahasa & Basic English)\"'),
(197, 'self_skills_traffic', 'Cost Control'),
(198, 'self_skills_traffic', 'Zero Mistake / Attention to detail'),
(199, 'self_skills_traffic', 'Smart Work (Effective & Efficient)'),
(200, 'self_skills_traffic', 'Vendor/ Partner Management'),
(201, 'self_skills_traffic', '\"Multitasking (handling multiple project)\"'),
(202, 'self_attitude_traffic', 'Passion towards to the job'),
(203, 'self_attitude_traffic', 'Eagerness to learn'),
(204, 'self_attitude_traffic', 'Respect towards peers, superiors, partners/ vendors, clients'),
(205, 'self_attitude_traffic', 'CAN-DO, Positivity'),
(206, 'self_attitude_traffic', 'Sense of belonging to the company'),
(207, 'self_attitude_traffic', 'Perseverance'),
(208, 'self_attitude_traffic', 'Honesty'),
(209, 'self_know_sec', 'General Knowledge (current news and trends, directly or indirectly related to the job)'),
(210, 'self_know_sec', 'Basic Workflow (understanding of pantarei work flow a cross divisions)'),
(211, 'self_know_sec', 'Clerical & Administration Support'),
(212, 'self_know_sec', 'Office Management'),
(213, 'self_know_sec', 'Executives Routinty'),
(214, 'self_skills_sec', 'Work Speed'),
(215, 'self_skills_sec', 'Negotiation'),
(216, 'self_skills_sec', 'Computer (ability to use software & hardware related to the job)'),
(217, 'self_skills_sec', 'Language (Bahasa & Basic English)'),
(218, 'self_skills_sec', 'Managing conflicting demands, priorities tasks & workload'),
(219, 'self_skills_sec', 'Maintain executive’s agenda (assist in planning appointments, board meetings, conferences etc)'),
(220, 'self_skills_sec', 'Filling & Keeping Executive\'s Documents (confidential & sensitive doc)'),
(221, 'self_attitude_sec', 'Passion towards to the job'),
(222, 'self_attitude_sec', 'Eagerness to learn'),
(223, 'self_attitude_sec', 'Respect towards peers, superiors, partners/ vendors, clients'),
(224, 'self_attitude_sec', 'CAN-DO, Positivity'),
(225, 'self_attitude_sec', 'Sense of belonging to the company'),
(226, 'self_attitude_sec', 'Resourcefulnes (willingness to be part of the solution)'),
(227, 'self_attitude_sec', 'Perseverance'),
(228, 'self_attitude_sec', 'Honesty'),
(229, '112_individual', 'Work with less supervision'),
(230, '112_individual', 'Delegate work and building team'),
(231, '112_individual', 'Taking bigger role');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(15) NOT NULL,
  `id_perusahaan` int(15) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `id_perusahaan`, `nama_perusahaan`) VALUES
(1, 1, 'PT. PARIWARANIAGA NUSANTARA'),
(2, 2, 'PT. PILAR MATA ANGIN'),
(3, 3, 'PT. WAHANA TRI OPTIMA PANTAREI'),
(4, 4, 'PT. BERMUDA NIAGA PANTAREI'),
(5, 5, 'PT. GAGAS DESAIN CEMERLANG'),
(6, 6, 'PT. PARAGON INTI CIPTA'),
(7, 7, 'PT. PRAJNA NARA PARAHITA'),
(8, 8, 'PT PARAGON MATA ANGIN');

-- --------------------------------------------------------

--
-- Table structure for table `self_appraisal`
--

CREATE TABLE `self_appraisal` (
  `id_self_appraisal` int(15) NOT NULL,
  `id_karyawan` int(15) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `id_pertanyaan` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `kode_form` varchar(255) DEFAULT NULL,
  `jenis_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `self_appraisal`
--

INSERT INTO `self_appraisal` (`id_self_appraisal`, `id_karyawan`, `posisi`, `team`, `tgl_appraisal`, `atasan`, `id_pertanyaan`, `nilai`, `summary`, `action`, `kode_form`, `jenis_form`) VALUES
(1, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '71', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_know_it'),
(2, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '72', '2.5', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_know_it'),
(3, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '73', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_know_it'),
(4, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '74', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_know_it'),
(5, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '75', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(6, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '76', '2', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(7, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '77', '2.7', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(8, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '78', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(9, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '79', '2.6', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(10, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '80', '2', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(11, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '81', '2.5', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_skills_it'),
(12, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '82', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(13, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '83', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(14, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '84', '3', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(15, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '85', '2.8', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(16, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '86', '2.9', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(17, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '87', '3.5', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(18, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '88', '3.5', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'self_attitude_it'),
(19, 150, 'IT SUPPORT', 'IT', '2022-03-02', 'DWW', '', '', 'Selama ini belum ada kendala mengenai pekerjaan yang di berikan.', '1. Belajar lebih baik dalam support IT \r\n2. Perencanaan membuat mobile apps dan web untuk HR dan Karyawan.', '2022-03-01Adi PurwantoDWW', 'other'),
(20, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '108', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(21, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '109', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(22, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '110', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(23, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '111', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(24, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '112', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(25, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '113', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(26, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '114', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(27, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '115', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(28, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '116', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(29, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '117', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_know_acc'),
(30, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '118', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(31, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '119', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(32, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '120', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(33, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '121', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(34, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '122', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(35, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '123', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(36, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '124', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(37, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '125', '3', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(38, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '126', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(39, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '127', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(40, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '128', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(41, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '129', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_skills_acc'),
(42, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '130', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(43, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '131', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(44, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '132', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(45, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '133', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(46, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '134', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(47, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '135', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(48, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '136', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(49, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '137', '4', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'self_attitude_acc'),
(50, 88, 'ACCOUNT MANAGER', 'ACCOUNT', '2022-03-03', 'ELN', '', '', '', '', '2022-03-01Nesya Prinsesva PutriELN', 'other'),
(51, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '44', '4', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(52, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '45', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(53, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '46', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(54, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '47', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(55, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '48', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(56, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '49', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(57, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '50', '2', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(58, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '51', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_know_creative'),
(59, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '52', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(60, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '53', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(61, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '54', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(62, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '55', '4', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(63, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '56', '2', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(64, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '57', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(65, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '58', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_skills_creative'),
(66, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '59', '1', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(67, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '60', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(68, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '61', '4', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(69, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '62', '2', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(70, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '63', '2', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(71, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '64', '2', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(72, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '65', '4', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(73, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '66', '3', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(74, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '67', '4', '', '', '2022-03-01Alexander KusumapradjaNSA', 'self_attitude_creative'),
(75, 149, 'SENIOR COPYWRITER', 'PAN-MULTI', '2022-03-04', 'NSA', '', '', '', '', '2022-03-01Alexander KusumapradjaNSA', 'other'),
(76, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '108', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(77, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '109', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(78, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '110', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(79, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '111', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(80, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '112', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(81, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '113', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(82, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '114', '4', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(83, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '115', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(84, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '116', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(85, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '117', '3.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_know_acc'),
(86, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '118', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(87, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '119', '3.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(88, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '120', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(89, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '121', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(90, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '122', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(91, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '123', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(92, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '124', '2', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(93, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '125', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(94, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '126', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(95, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '127', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(96, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '128', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(97, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '129', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_skills_acc'),
(98, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '130', '4', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(99, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '131', '3.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(100, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '132', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(101, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '133', '4', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(102, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '134', '3.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(103, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '135', '4', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(104, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '136', '4', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(105, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', '137', '3.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'self_attitude_acc'),
(106, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', 'Work with less supervision', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'other'),
(107, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', 'Delegate work and building team', '2.5', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'other'),
(108, 112, 'ASSOCIATE ACCOUNT DIRECTOR', 'PAN', '2022-03-08', 'SYA', 'Taking bigger role', '3', 'Happy to work within Pantarei, but there are still a few room for self and skill improvement. :)', '1. Need to improve strategic thinking ability, deck crafting and presentation.\r\n2. Nurturing team member\r\n3. Keep looking to win new account in order to meet the target', '2022-03-01Amanda LestariSYA', 'other'),
(109, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '159', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(110, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '160', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(111, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '161', '2', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(112, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '162', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(113, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '163', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(114, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '164', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(115, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '165', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(116, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '166', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(117, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '167', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_know_digital'),
(118, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '170', '4', '', '', '2022-03-01Nissa TriafniMHU', 'self_skills_digital'),
(119, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '176', '2', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(120, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '177', '2', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(121, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '178', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(122, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '179', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(123, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '180', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(124, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '181', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(125, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '182', '3', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(126, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '183', '2', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(127, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '184', '4', '', '', '2022-03-01Nissa TriafniMHU', 'self_attitude_digital'),
(128, 104, 'SOCIAL MEDIA OFFICER', 'GA', '2022-03-09', 'MHU', '', '', '', '', '2022-03-01Nissa TriafniMHU', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `spv_appraisal`
--

CREATE TABLE `spv_appraisal` (
  `id_self_appraisal` int(15) NOT NULL,
  `id_karyawan` int(15) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `atasan` varchar(255) DEFAULT NULL,
  `id_pertanyaan` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `kode_form` varchar(255) DEFAULT NULL,
  `jenis_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spv_appraisal_old`
--

CREATE TABLE `spv_appraisal_old` (
  `id_spv_appraisal` int(15) NOT NULL,
  `id_karyawan` int(15) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `tgl_appraisal` date DEFAULT NULL,
  `id_karyawan_penilai` int(15) DEFAULT NULL,
  `id_pertanyaan` int(15) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `masukan` varchar(255) DEFAULT NULL,
  `kode_form` varchar(255) DEFAULT NULL,
  `jenis_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spv_appraisal_old`
--

INSERT INTO `spv_appraisal_old` (`id_spv_appraisal`, `id_karyawan`, `posisi`, `team`, `tgl_appraisal`, `id_karyawan_penilai`, `id_pertanyaan`, `nilai`, `masukan`, `kode_form`, `jenis_form`) VALUES
(1, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 71, '2', NULL, '01', '360'),
(2, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 72, '3', NULL, '01', '360'),
(3, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 73, '3', NULL, '01', '360'),
(4, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 74, '4', NULL, '01', '360'),
(5, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 75, '3', NULL, '01', '360'),
(6, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 76, '2', NULL, '01', '360'),
(7, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 77, '2', NULL, '01', '360'),
(8, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 78, '2', NULL, '01', '360'),
(9, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 79, '2', NULL, '01', '360'),
(10, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 80, '2', NULL, '01', '360'),
(11, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 81, '2', NULL, '01', '360'),
(12, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 82, '2', NULL, '01', '360'),
(13, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 83, '2', NULL, '01', '360'),
(14, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 84, '2', NULL, '01', '360'),
(15, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 85, '3', NULL, '01', '360'),
(16, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 86, '3', NULL, '01', '360'),
(17, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 87, '3', NULL, '01', '360'),
(18, 41, 'IT SUPPORT', 'PAN', '2022-01-17', 41, 88, '3', NULL, '01', '360');

-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`id`, `parent`, `name`, `link`, `sort_order`) VALUES
(2, 2, 'module_setting', 'module', 1),
(3, 2, 'role_and_permissions', '', 2),
(4, 1, 'add_new_admin', 'add', 2),
(6, 1, 'admin_list', '', 1),
(26, 9, 'dashboard_v1', '', 1),
(27, 9, 'dashboard_v2', 'index_2', 2),
(28, 9, 'dashboard_v3', 'index_3', 3),
(30, 3, 'users_list', '', 1),
(31, 3, 'add_new_user', 'add', 2),
(32, 10, 'simple_datatable', 'simple_datatable', 1),
(33, 10, 'ajax_datatable', 'ajax_datatable', 2),
(34, 10, 'pagination', 'pagination', 3),
(35, 10, 'advance_search', 'advance_search', 4),
(36, 10, 'file_upload', 'file_upload', 5),
(37, 11, 'invoice_list', '', 1),
(38, 11, 'add_new_invoice', 'add', 2),
(39, 12, 'serverside_join', '', 1),
(40, 12, 'simple_join', 'simple', 2),
(41, 14, 'country', '', 1),
(42, 14, 'state', 'state', 2),
(43, 14, 'city', 'city', 3),
(44, 16, 'charts_js', 'chartjs', 1),
(45, 16, 'charts_flot', 'flot', 2),
(46, 16, 'charts_inline', 'inline', 3),
(47, 17, 'general', 'general', 1),
(48, 17, 'icons', 'icons', 2),
(49, 17, 'buttons', 'buttons', 3),
(50, 18, 'general_elements', 'general', 1),
(51, 18, 'advanced_elements', 'advanced', 2),
(52, 18, 'editors', 'editors', 3),
(53, 19, 'simple_tables', 'simple', 1),
(54, 19, 'data_tables', 'data', 2),
(55, 21, 'inbox', 'inbox', 1),
(56, 21, 'compose', 'compose', 2),
(57, 21, 'read', 'read_mail', 3),
(58, 22, 'invoice', 'invoice', 1),
(59, 22, 'profile', 'profile', 2),
(60, 22, 'login', 'login', 3),
(61, 22, 'register', 'register', 4),
(62, 22, 'lock_screen', 'Lockscreen', 4),
(63, 23, 'error_404', 'error404', 1),
(64, 23, 'error_500', 'error500', 2),
(65, 23, 'blank_page', 'blank', 3),
(66, 23, 'starter_page', 'starter', 4),
(67, 8, 'general_settings', '', 1),
(68, 8, 'email_template_settings', 'email_templates', 2),
(69, 25, 'view_profile', '', 1),
(70, 25, 'change_password', 'change_pwd', 2),
(71, 10, 'multiple_files_upload', 'multi_file_upload', 6),
(72, 10, 'dynamic_charts', 'charts', 7),
(73, 10, 'locations', 'locations', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `360`
--
ALTER TABLE `360`
  ADD PRIMARY KEY (`id_form_360`);

--
-- Indexes for table `ci_activity_log`
--
ALTER TABLE `ci_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_activity_status`
--
ALTER TABLE `ci_activity_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ci_admin_roles`
--
ALTER TABLE `ci_admin_roles`
  ADD PRIMARY KEY (`admin_role_id`);

--
-- Indexes for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_language`
--
ALTER TABLE `ci_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen_old`
--
ALTER TABLE `departemen_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_appraisal`
--
ALTER TABLE `final_appraisal`
  ADD PRIMARY KEY (`id_final_appraisal`);

--
-- Indexes for table `form_360`
--
ALTER TABLE `form_360`
  ADD PRIMARY KEY (`id_form_360`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_17122021`
--
ALTER TABLE `karyawan_17122021`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_fix`
--
ALTER TABLE `karyawan_fix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_old`
--
ALTER TABLE `karyawan_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_form`
--
ALTER TABLE `master_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_access`
--
ALTER TABLE `module_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RoleId` (`admin_role_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_appraisal`
--
ALTER TABLE `self_appraisal`
  ADD PRIMARY KEY (`id_self_appraisal`);

--
-- Indexes for table `spv_appraisal`
--
ALTER TABLE `spv_appraisal`
  ADD PRIMARY KEY (`id_self_appraisal`);

--
-- Indexes for table `spv_appraisal_old`
--
ALTER TABLE `spv_appraisal_old`
  ADD PRIMARY KEY (`id_spv_appraisal`);

--
-- Indexes for table `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Parent Module ID` (`parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `360`
--
ALTER TABLE `360`
  MODIFY `id_form_360` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_activity_log`
--
ALTER TABLE `ci_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ci_activity_status`
--
ALTER TABLE `ci_activity_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ci_admin`
--
ALTER TABLE `ci_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_admin_roles`
--
ALTER TABLE `ci_admin_roles`
  MODIFY `admin_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_language`
--
ALTER TABLE `ci_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `departemen_old`
--
ALTER TABLE `departemen_old`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `final_appraisal`
--
ALTER TABLE `final_appraisal`
  MODIFY `id_final_appraisal` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_360`
--
ALTER TABLE `form_360`
  MODIFY `id_form_360` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `karyawan_17122021`
--
ALTER TABLE `karyawan_17122021`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `karyawan_fix`
--
ALTER TABLE `karyawan_fix`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `karyawan_old`
--
ALTER TABLE `karyawan_old`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `master_form`
--
ALTER TABLE `master_form`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `module_access`
--
ALTER TABLE `module_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `self_appraisal`
--
ALTER TABLE `self_appraisal`
  MODIFY `id_self_appraisal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `spv_appraisal`
--
ALTER TABLE `spv_appraisal`
  MODIFY `id_self_appraisal` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spv_appraisal_old`
--
ALTER TABLE `spv_appraisal_old`
  MODIFY `id_spv_appraisal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
