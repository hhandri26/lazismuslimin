-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 03:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parmusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesstoken`
--

CREATE TABLE `accesstoken` (
  `id` varchar(255) NOT NULL,
  `ttl` int(11) DEFAULT NULL,
  `scopes` text,
  `created` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `id` int(11) NOT NULL,
  `model` varchar(512) DEFAULT NULL,
  `property` varchar(512) DEFAULT NULL,
  `accessType` varchar(512) DEFAULT NULL,
  `permission` varchar(512) DEFAULT NULL,
  `principalType` varchar(512) DEFAULT NULL,
  `principalId` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_piso`
--

CREATE TABLE `tbl_piso` (
  `id` int(11) NOT NULL,
  `name` text,
  `catagory` text,
  `p` decimal(8,2) DEFAULT NULL,
  `l` decimal(8,2) DEFAULT NULL,
  `t` decimal(8,2) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_piso`
--

INSERT INTO `tbl_piso` (`id`, `name`, `catagory`, `p`, `l`, `t`, `description`, `created_at`, `updated_at`) VALUES
(1, '1-E', 'E-MAILER', '23.50', '19.50', '4.50', '', NULL, NULL),
(2, '2-E', 'E-MAILER', '33.50', '24.50', '7.50', '', NULL, NULL),
(3, '3-E', 'E-MAILER', '28.50', '19.50', '9.50', '', NULL, NULL),
(4, '4-E', 'E-MAILER', '25.00', '25.00', '10.00', '', NULL, NULL),
(5, '5-E', 'E-MAILER', '18.50', '19.50', '4.50', '', NULL, NULL),
(6, '6-E*', 'E-MAILER', '20.50', '21.50', '7.50', 'Buka depan', NULL, NULL),
(7, '7-E*', 'E-MAILER', '20.00', '20.00', '10.00', 'Buka depan (bisa copot)', NULL, NULL),
(8, '8-E', 'E-MAILER', '26.00', '15.50', '6.00', '', NULL, NULL),
(9, '9-E*', 'E-MAILER', '17.50', '18.50', '9.50', 'Mika 2 jendela', NULL, NULL),
(10, '10-E', 'E-MAILER', '28.50', '24.50', '4.50', '', NULL, NULL),
(11, '11-E', 'E-MAILER', '15.50', '22.50', '7.50', '', NULL, NULL),
(12, '12-E', 'E-MAILER', '20.00', '20.00', '5.00', '', NULL, NULL),
(13, '13-E*', 'E-MAILER', '19.50', '20.50', '6.50', 'Full mika + buka depan', NULL, NULL),
(14, '14-E', 'E-MAILER', '22.00', '22.00', '6.00', '', NULL, NULL),
(15, '15-E', 'E-MAILER', '20.50', '14.50', '4.50', '', NULL, NULL),
(16, '16-E', 'E-MAILER', '10.00', '10.00', '5.00', '', NULL, NULL),
(17, '17-E', 'E-MAILER', '15.00', '15.00', '5.00', '', NULL, NULL),
(18, '18-E', 'E-MAILER', '18.00', '18.00', '5.00', '', NULL, NULL),
(19, '19-E', 'E-MAILER', '20.00', '15.00', '10.00', '', NULL, NULL),
(20, '20-E', 'E-MAILER', '23.50', '19.50', '9.50', '', NULL, NULL),
(21, '21-E', 'E-MAILER', '25.00', '20.00', '5.00', '', NULL, NULL),
(22, '22-E', 'E-MAILER', '41.00', '29.00', '6.00', '', NULL, NULL),
(23, '23-E', 'E-MAILER', '15.00', '9.50', '4.50', '', NULL, NULL),
(24, '24-E*', 'E-MAILER', '18.50', '13.50', '7.00', 'Potongan kembang atas', NULL, NULL),
(25, '25-E', 'E-MAILER', '20.00', '20.00', '7.00', '', NULL, NULL),
(26, '26-E', 'E-MAILER', '45.00', '35.00', '5.00', '', NULL, NULL),
(27, '27-E*', 'E-MAILER', '18.00', '24.50', '7.00', '', NULL, NULL),
(28, '28-E', 'E-MAILER', '23.50', '24.50', '9.50', '', NULL, NULL),
(29, '34-E', 'E-MAILER', '3.50', '9.50', '4.50', '', NULL, NULL),
(30, '43-E*', 'E-MAILER', '21.50', '21.50', '7.00', 'Mika 16 x 16 + Bukaan depan', NULL, NULL),
(31, '44-E', 'E-MAILER', '23.00', '11.00', '5.50', '', NULL, NULL),
(32, '45-E', 'E-MAILER', '38.00', '25.00', '4.00', '', NULL, NULL),
(33, '46-E', 'E-MAILER', '23.00', '23.00', '5.50', '', NULL, NULL),
(34, '47-E', 'E-MAILER', '23.50', '19.50', '7.00', '', NULL, NULL),
(35, '48-E', 'E-MAILER', '30.00', '26.00', '10.00', '', NULL, NULL),
(36, '49-E', 'E-MAILER', '15.00', '9.50', '5.50', '', NULL, NULL),
(37, '50-E', 'E-MAILER', '11.00', '23.00', '5.00', '', NULL, NULL),
(38, '52-E', 'E-MAILER', '22.50', '22.50', '7.50', '', NULL, NULL),
(39, '53-E*', 'E-MAILER', '24.00', '24.00', '5.00', 'Mika 18.5 x 18.5', NULL, NULL),
(40, '54-E', 'E-MAILER', '20.00', '10.00', '5.00', '', NULL, NULL),
(41, '55-E', 'E-MAILER', '25.50', '17.00', '3.00', '', NULL, NULL),
(42, '56-E', 'E-MAILER', '29.00', '22.00', '6.00', '', NULL, NULL),
(43, '57-E', 'E-MAILER', '25.00', '25.00', '4.00', '', NULL, NULL),
(44, '58-E', 'E-MAILER', '32.00', '18.00', '5.00', '', NULL, NULL),
(45, '59-E', 'E-MAILER', '26.00', '19.00', '5.00', '', NULL, NULL),
(46, '60-E*', 'E-MAILER', '23.00', '15.00', '8.00', 'Mika 20 x 11.5', NULL, NULL),
(47, '61-E', 'E-MAILER', '26.00', '26.00', '10.00', '', NULL, NULL),
(48, '62-E', 'E-MAILER', '20.00', '15.00', '5.00', '', NULL, NULL),
(49, '63-E', 'E-MAILER', '30.00', '20.00', '7.00', '', NULL, NULL),
(50, '64-E', 'E-MAILER', '24.50', '16.70', '8.00', '', NULL, NULL),
(51, '65-E*', 'E-MAILER', '16.00', '16.00', '9.00', 'Buka Depan (bisa copot)', NULL, NULL),
(52, '66-E', 'E-MAILER', '32.50', '21.50', '11.50', '', NULL, NULL),
(53, '67-E', 'E-MAILER', '33.50', '27.00', '6.00', '', NULL, NULL),
(54, '68-E', 'E-MAILER', '30.00', '30.00', '5.00', '', NULL, NULL),
(55, '69-E', 'E-MAILER', '33.50', '21.50', '11.50', '', NULL, NULL),
(56, '76-E', 'E-MAILER', '49.00', '35.00', '5.00', '', NULL, NULL),
(57, '29-TB/A', 'TOP/ BOTTOM', '41.00', '25.00', '10.00', 'Total buah', NULL, NULL),
(58, '29-TB/B', 'TOP/ BOTTOM', '41.00', '25.00', '10.00', 'Total buah', NULL, NULL),
(59, '30-TB/A', 'TOP/ BOTTOM', '20.00', '20.00', '5.00', '', NULL, NULL),
(60, '30-TB/B', 'TOP/ BOTTOM', '19.50', '19.50', '19.80', '', NULL, NULL),
(61, '31-TB/A', 'TOP/ BOTTOM', '35.00', '35.00', '4.50', '', NULL, NULL),
(62, '31-TB/B', 'TOP/ BOTTOM', '35.00', '35.00', '10.00', '', NULL, NULL),
(63, '32-SL/A+B*', 'TOP/ BOTTOM', '21.00', '10.50', '9.50', '1 Piso dengan selongsong(sloped) alfons', NULL, NULL),
(64, '33-SL/A', 'TOP/ BOTTOM', '35.00', '30.00', '10.00', '', NULL, NULL),
(65, '33-SL/B', 'TOP/ BOTTOM', '35.00', '30.00', '10.00', '', NULL, NULL),
(66, '35-SL/A+B', 'TOP/ BOTTOM', '24.00', '12.00', '10.00', '', NULL, NULL),
(67, '36-SL/A', 'TOP/ BOTTOM', '26.50', '17.50', '12.50', '', NULL, NULL),
(68, '36-SL/B', 'TOP/ BOTTOM', '26.50', '17.50', '12.50', '', NULL, NULL),
(69, '77-SL/A', 'TOP/ BOTTOM', '29.00', '29.10', '6.00', '', NULL, NULL),
(70, '77-SL/B', 'TOP/ BOTTOM', '28.00', '28.00', '5.00', '', NULL, NULL),
(71, '37*-REG', 'REGULER', '13.00', '12.00', '13.00', 'Wonderful', NULL, NULL),
(72, '38*-REG', 'REGULER', '13.00', '10.00', '14.50', 'Piso + sekat', NULL, NULL),
(73, '39-C', 'REGULER', '26.50', '26.50', '15.00', '', NULL, NULL),
(74, '40-C', 'REGULER', '27.80', '27.80', '17.00', '', NULL, NULL),
(75, '41-C', 'REGULER', '24.50', '24.50', '13.00', '', NULL, NULL),
(76, '42-TT', 'TUCK TOP', '28.50', '19.00', '9.70', '', NULL, NULL),
(77, '70-HB', 'HANDLE BOX', '14.00', '11.00', '20.00', 'Tinggi Handle 4.5', NULL, NULL),
(78, '71-HB', 'HANDLE BOX', '13.00', '13.00', '25.00', 'Tinggi Handle 5.5 & Mika 12 x 10', NULL, NULL),
(79, '72-HB', 'HANDLE BOX', '23.00', '12.00', '11.00', 'Tinggi Handle 5.5', NULL, NULL),
(80, '73-HB', 'HANDLE BOX', '16.00', '16.00', '17.50', 'Tinggi Handle 5.5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_benefit`
--

CREATE TABLE `t_benefit` (
  `id` int(11) NOT NULL,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_benefit`
--

INSERT INTO `t_benefit` (`id`, `img`, `title`, `desc`, `desc_eng`, `adddate`) VALUES
(1, 'icon_box-01.png', 'LOW MINIMUM ORDER 2 ', 'Order as Low as 25 Pcs.  ', 'English version   ', '2020-04-10 21:36:07'),
(2, 'icon_box-04.png', 'MOST COST EFFICIENTS', 'Our corrugated packaging solution offers the most strength at the most minimum cost.', 'English version ', NULL),
(3, 'icon_box-03.png', 'FREE SAMPLE', 'Experience our premium material hands-on free charge!.', 'English version ', NULL),
(4, 'icon_box-02.png', 'ECO FRIENDLY', 'Our Products are recyclable. reusable and biodegradable Let\'s give more love to our home.', 'English version ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_contact_info`
--

CREATE TABLE `t_contact_info` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `title_desc` text,
  `desc` text,
  `title_desc_eng` text,
  `desc_eng` text,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_contact_info`
--

INSERT INTO `t_contact_info` (`id`, `title`, `title_desc`, `desc`, `title_desc_eng`, `desc_eng`, `link`) VALUES
(1, 'Eco Pack edit', 'High quality  boxes', 'in packs of 25 Pcs.', 'english version', 'english version', 'https://api.whatsapp.com/send?phone=6281298634040&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20High-Quality%20Boxes%21&source=&data='),
(2, 'Custom Packaging', 'Create your very own packaging', 'with customized logo and Models.', 'english version', 'english version', 'https://api.whatsapp.com/send?phone=6281293798353&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20packaging%20for%20my%20brand%21&source=&data='),
(3, 'Chat with us', 'Got a question to ask?', 'We will be happy to assist you', 'english version', 'english version', 'https://api.whatsapp.com/send?phone=6281293798353&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20some%20packaging%21&source=&data=');

-- --------------------------------------------------------

--
-- Table structure for table `t_gallery`
--

CREATE TABLE `t_gallery` (
  `id` int(11) NOT NULL,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_gallery`
--

INSERT INTO `t_gallery` (`id`, `img`, `title`, `desc`, `desc_eng`, `adddate`) VALUES
(9, '9_1shampo.jpg', '1', NULL, NULL, '2020-05-27 10:03:07'),
(10, '10_2biokusuma.jpg', '2', NULL, NULL, '2020-05-27 10:03:14'),
(11, '11_bio lation.jpg', '3', NULL, NULL, '2020-05-27 10:03:23'),
(12, '12_two way cake.png', '4', NULL, NULL, '2020-05-27 10:03:31'),
(13, '13_02fa2a2cf7ddd96de4d054eea1d7d9fd.png', '5', NULL, NULL, '2020-05-27 10:03:46'),
(14, '14_13e3eb958269049162bdd0a93e611482.png', '6', NULL, NULL, '2020-05-27 10:03:55'),
(15, '15_a7f028daad193499c11d7aa9ea82be60.jpeg', '7', NULL, NULL, '2020-05-27 10:04:04'),
(16, '16_cebe67c7293d66ac0aaaa2f2afb05d6c.jpg', '8', NULL, NULL, '2020-05-27 10:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `t_icon`
--

CREATE TABLE `t_icon` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_icon`
--

INSERT INTO `t_icon` (`id`, `value`) VALUES
(1, 'fa fa-book'),
(2, 'fa fa-users'),
(3, 'fa fa-eye'),
(4, 'fa fa-gears '),
(5, 'fa fa-picture-o'),
(6, 'fa fa-calendar-check-o'),
(7, 'fa fa-question-circle'),
(8, 'fa fa-dropbox'),
(9, 'fa fa-home'),
(10, 'fa fa-shopping-bag');

-- --------------------------------------------------------

--
-- Table structure for table `t_member`
--

CREATE TABLE `t_member` (
  `id` int(11) NOT NULL,
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone_number` text,
  `password` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `provinsi_id` varchar(45) DEFAULT NULL,
  `kota_id` varchar(45) DEFAULT NULL,
  `kecamatan_id` varchar(45) DEFAULT NULL,
  `provinsi_name` varchar(45) DEFAULT NULL,
  `kota_name` varchar(45) DEFAULT NULL,
  `kecamatan_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_member`
--

INSERT INTO `t_member` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `updated_at`, `created_at`, `provinsi_id`, `kota_id`, `kecamatan_id`, `provinsi_name`, `kota_name`, `kecamatan_name`, `address`) VALUES
(6, 'handri 3', 'putra', 'handrisaeputra@gmail.com', '081808784785', '123', '2020-05-28 09:18:51', '2020-05-28 09:18:51', '3', '455', NULL, NULL, NULL, NULL, 'Kedaung baru');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `addby` int(11) DEFAULT NULL,
  `adddate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id`, `menu_name`, `icon`, `sort`, `addby`, `adddate`) VALUES
(1, 'Configuration', 'fa fa-gears', 10, NULL, NULL),
(22, 'Piso', 'fa fa-dropbox', 1, 1, '2020-03-09 23:39:05'),
(23, 'Home Page', 'fa fa-home', 1, 1, '2020-04-02 00:27:40'),
(24, 'Transaksi', 'fa fa-shopping-bag', 3, 1, '2020-04-02 00:35:38'),
(25, 'Member', 'fa fa-users', 4, 1, '2020-04-10 22:09:55'),
(26, 'Sample Request', 'fa fa-picture-o', 5, 1, '2020-04-10 22:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `t_past_project`
--

CREATE TABLE `t_past_project` (
  `id` int(11) NOT NULL,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_past_project`
--

INSERT INTO `t_past_project` (`id`, `img`, `title`, `desc`, `desc_eng`, `adddate`) VALUES
(1, '01.jpg', 'Indomilk : e Mailers Box', 'Sebar 5.000 kebaikan projetcs', 'English version ', NULL),
(2, '02.jpg', 'Total Buah : Top Bottom Box', 'Full color Fruit Box with Waterproof Laminating', 'English version ', NULL),
(3, '03.jpg', 'Gaudi : e Mailers Box', 'Apparels Mailer Box.', 'English version ', NULL),
(4, '04.jpg', 'Yuna & Co. : Slide Box ', 'Monthly Subscription Box', 'English version ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_post_project`
--

CREATE TABLE `t_post_project` (
  `id` int(11) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `title` text,
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `desc_eng` text,
  `location` text,
  `location_eng` text,
  `type` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_post_project`
--

INSERT INTO `t_post_project` (`id`, `img`, `title`, `desc`, `created_at`, `desc_eng`, `location`, `location_eng`, `type`, `active`) VALUES
(26, 'product-1607970248.png', 'ZAKAT', 'Ribuan Sahabat Dermawan telah banyak membantu Ribuan mustahik. Saatnya Anda bergabung bersama kami. \"Dan apa yang kamu berikan berupa zakat yang kamu maksudkan untuk mencapai keridhaan Allah, maka (yang berbuat demikian) itulah orang-orang yang melipat gandakan (pahalanya)“. (QS. Ar-Rum :39)', '2021-01-24 14:17:10', 'Ribuan Sahabat Dermawan telah banyak membantu Ribuan mustahik. Saatnya Anda bergabung bersama kami.', 'http://lazismuslimin.org/public/images/product/product-1607970248.png', 'product-1607970249.png', 'SEDEKAH', NULL),
(27, 'product-1608000954.png', 'INFAQ', 'Memberi itu kedudukannya lebih mulia dibandingkan orang yang meminta. Dan barang siapa yang menahan diri (dari meminta-minta), maka Allah SWT akan mencukupkan kebutuhannya dan barang siapa yang merasa kaya (terhadap apa yang ada), maka Allah SWT akan membuatnya kaya.', '2021-01-09 21:36:28', '\"Allah memusnahkan riba dan menyuburkan sedekah. Allah tidak menyukai setiap orang yang tetap dalam kekafiran dan bergelimang dosa. (QS: Al-Baqarah-276).\"', 'http://lazismuslimin.org/public/images/product/product-1608000954.png', 'product-1608912836.png', 'SEDEKAH', NULL),
(28, 'product-1608878127.png', 'SEDEKAH', 'Satu sedekah yang tulus sama dengan seribu langkah menuju Surga dan Sedekah dapat menghapus dosa seperti air yang mematikan api.', '2021-01-09 22:01:53', '\"Allah memusnahkan riba dan menyuburkan sedekah. Allah tidak menyukai setiap orang yang tetap dalam kekafiran dan bergelimang dosa. (QS: Al-Baqarah-276).\"', 'http://lazismuslimin.org/public/images/product/product-1608878127.png', 'product-1608910626.png', 'SEDEKAH', NULL),
(31, 'product-1608001070.png', 'QURBAN', 'Lewat program ini, hewan qurban akan dibeli langsung dari peternak binaan di desa, disembelih dan kemudian didistribusikan di desa. Jadi di samping aspek ketauhidan terhadap Allah SWT, program qurban dapat berdampak di berbagai sektor kehidupan, terutama ekonomi.', '2020-12-15 09:58:53', 'Lewat program ini, hewan qurban akan dibeli langsung dari peternak binaan di desa, disembelih dan kemudian didistribusikan di desa. Jadi di samping aspek ketauhidan terhadap Allah SWT, program qurban dapat berdampak di berbagai sektor kehidupan, terutama ekonomi.', 'http://lazismuslimin.org/public/images/product/product-1608001070.png', 'product-1608001076.png', 'SEDEKAH', NULL),
(32, 'product-1608976551.png', 'PARMUSI Sambas Berikan bantuan kepada warga terdampak covid-19', 'Parmusi Sambas Berikan Bantuan kepada Warga Terdampak Covid-19\nMinggu, 29 Maret 20 | 13:41 WIB\nJakarta, Muslim Obsession – Wabah virus Corona (Covid-19) yang merebak di Tanah Air tidak hanya berdampak pada kesehatan, melainkan juga perekonomian warga.\nSaat ini warga merasa makin sulit untuk memperoleh penghasilan, ditambah semakin tingginya harga sembako. Atas pertimbangan itu, Parmusi (Persaudaraan Muslim Indonesia) Kabupaten Sambas melakukan kegiatan sosial yang dilaksanakan di Desa Sulung Kecamatan Sejangkung, Dusun Sebataan Desa Tambatan Kecamatan Teluk Keramat, dan di Desa Tebas Kuala Kecamatan Tebas Kab Sambas, Ahad (29/03/2020). Dai Parmusi Sambas, Ustadz Satono mengatakan, kegiatan sosial ini dimaksudkan dalam rangka membantu warga masyarakat ekonomi kelas bawah yang sangat terdampak wabah virus Corona.\n“Alhamdulillah pada hari ini Tim Sosial Peduli Parmusi Sambas mendistribusikan bantuan sembako berupa beras. Ini hal kecil yang bisa kami lakukan, semoga menjadi wasilah untuk keberkahan,” kata Ustadz Satono kepada Muslim Obsession. Menurutnya, bantuan yang diberikan dalam kegiatan sosial tersebut merupakan sumbangan para donatur dari berbagai kalangan, termasuk Ketum PP Parmusi H. Usamah Hisyam.\nKegiatan sosial Parmusi Sambas disambut sangat baik warga setempat. Sebagai bentuk syukur dan terima kasih, warga mendoakan para donatur agar senantiasa sehat, kuat, serta dalam lindungan Allah subhanahu wa ta’ala. “Kami juga mengucapkan terima kasih kepada para donator, terutama Bapak Usamah yang telah berkontribusi dalam kegiatan ini. Jazakumullah khairan..,” pungkasnya. (Fath)', '2021-01-24 14:36:14', 'Kegiatan ini di lakukan untuk membantu warga yang terdampak covid-19 di desa sulung kecamatan sajangkung', 'http://lazismuslimin.org/public/images/product/product-1608976551.png', 'product-1608976552.png', 'ACARA', 'active'),
(33, 'product-1608976997.png', 'PARMUSI #SaveHelp Salurkan bantuan untuk korban banjir Tebet', 'Parmusi #SaveHelp Salurkan Bantuan untuk Korban Banjir di Tebet\nJumat, 3 Januari 20 | 12:08 WIB\nJakarta, Muslim Obsession – Tim Parmusi #SaveHelp kembali menyalurkan bantuan kepada warga korban banjir. Setelah semalam memberikan bantuan kepada warga di kawasan Kebon Pala dan Condet, hari ini tim Parmusi #SaveHelp menyalurkan bantuan ke sejumlah warga korban banjir di kawasan Kebon Baru, Tebet, Jakarta Selatan.\nSalah seorang penerima bantuan, Paula, mengaku senang menerima bantuan dari Persaudaraan Muslimin Indonesia (Parmusi). Apalagi sejak banjir menggenangi rumah mereka pada 1-3 Januari 2020, sebagian besar warga masih tinggal di tempat-tempat pengungsian sehingga mereka sangat membutuhkan bantuan.\n“Kami mengucapkan banyak terima kasih kepada Parmusi yang begitu suport kami yang menjadi korban banjir berupa air mineral dan nasi 200 box,” kata Paula yang juga pengurus PKK Kebon Baru, Jumat (3/1/2020). Warga tinggal di tempat pengungsian dengan kondisi memprihatinkan. Mereka sangat membutuhkan bantuan baik berupa pakaian, makanan siap saji, air minum kemasan, obat-obatan, maupun selimut, dan makanan bayi.\nBanyak di antara korban banjir belum bisa kembali ke rumah dan memilih bertahan di tempat pengungsian untuk menghindari banjir susulan, karena rumah mereka belum layak ditempati. “Alhamdulillah kita sudah menerima bantuan dari Parmusi, semoga ini menjadi berkah dan kalau bisa kami berharap ada kelanjutan ke depannya,” imbuh Paula.\nParmusi menggelar aksi kemanusiaan melalui Parmusi #SaveHelp sebagai respons atas musibah banjir yang terjadi di kawasan Jakarta dan sekitarnya. Parmusi menggagas kegiatan ini untuk memberikan tanda kasih, sekaligus ungkapan rasa keprihatinan kepada warga yang menjadi korban.\nAksi ini sudah memasuki hari kedua dan akan terus berlanjut ke depannya. Pada hari pertama, aksi bagi-bagi bantuan dilakukan di dua posko banjir di kawasan Jakarta Timur, yakni Masjid Al-Hidayah di Jalan Kamboja, RW 01, Kelurahan Kebon Pala, Kecamatan Makasar, dan di kawasan Condet, Kramatjati.\nPembaca Muslim Obsession juga dapat menyalurkan donasi uang dengan melakukan transfer ke No. Rekening 888078873 (BNI Syariah) a/n Persaudaraan Muslimin Indonesia.\nAdapun bantuan makanan maupun alat-alat kebutuhan rumah tangga bisa dikirimkan ke Sekretariat PARMUSI CENTRE Jl. Sagu No.6, Kebagusan Raya, Jagakarsa, Jakarta Selatan 12620. Informasi lebih lanjut dapat menghubungi nomor +62 813-1405-4465 (sdri Rismaya). (Fath)', '2021-01-10 14:40:07', 'Tim Parmusi #SaveHelp bergerak untuk memberi bantuan kepada korban banjir di tebet.', 'http://lazismuslimin.org/public/images/product/product-1608976997.png', 'product-1608976999.png', 'ACARA', NULL),
(34, 'product-1608977233.png', 'Peduli Wamena, Parmusi kirim bantuan bahan pokok untuk para pengungsi di Wamena, Papua.', 'Peduli Wamena, Parmusi Kirim Bantuan Bahan Pokok untuk Para Pengungsi\nRabu, 2 Oktober 19 | 20:27 WIB\n\nWamena, Muslim Obsession – Pengurus Pusat (PP) Persaudaraan Muslimin Indonesia (Parmusi) menugaskan Dai Parmusi asli Papua, \nbernama Ustaz Hamka Yeli Pali untuk ikut terlibat dalam aksi kemanusian para korban kerusuhan di Wamena. Parmusi terlibat dalam misi kemanusian ini dengan memberikan bantuan bahan makanan pokok. Ustaz Hamka mengatakan, bahwa pihaknya bersama empat dai Parmusi yang lain sudah terjun melakukan aksi kemanusian dengan turut mengevakuasi para korban kerusuhan ke tempat-tempat yang lebih aman sejak kerusuhan itu terjadi. Termasuk membersihkan sampah atau meterial yang berserakam di tempat umum.\n\nKini melalui gerakan aksi #ParmusiSaveHelpWamena, Parmusi terus bergerak menggalang dana kemanusian untuk para korban. Beberapa uang yang dihimpun sudah dibelanjakan oleh Ustaz Hamka guna membeli bahan-bahan pokok di Jayapura. Bahan pokok sengaja dibeli di Jayapura karena toko-toko dan pasar di Wamena masih banyak yang tutup. “Bantuan yang kami terima sudah dibelanjakan untuk membeli makanan bahan pokok. Kita beli di Jayapura karena toko-toko masih banyak tutup. Selain itu, harga di Jayapura juga lebih murah, jadi bahan yang kita beli bisa lebih banyak,” ujar Hamka saat dihubungi, Rabu (2/10/2019).\n\nUztaz Hamka selalu berkoordinasi dan bekerja sama dengan aparat TNI dalam menjalankan misi kemanusian ini. Terutama dalam membawa bahan makanan menggunakan pesawat hercules milik TNI secara gratis dari Jayapura ke Wamena. Bahkan Ustaz Hamka turut mendapatkan pengawalan yang ketat dari aparat. Adapun bahan makanan yang dibeli berupa beras, mie instan, roti biskuit, sayuran, minyak, susu, gula, kopi, teh, air mineral, terigu, sabun mandi, sabun cuci, pasta gigi dan lain-lain. Bahan makanan pokok itu akan dikirim ketiga tempat pengungsian, yakni Kantor Kodam, Kantor Polres Wamena, dan Asrama Polisi di Wamena.\n\n“Di tiga tempat itu masih banyak ribuan warga mengungsi. Mereka masih sangat trauma dan belum berani pulang,” jelasnya.\nSelain karena trauma, para pengungsi tidak pulang karena memang mereka tidak lagi punya rumah karena dibakar massa. Ribuan masyarakat lain memilih melakuka gerakan eksodus dengan kembali pulang ke kampung halaman. Mereka adalah masyarakat pendatang dari Jawa, Sunda, Madura, Padang Sumatera Barat, dan juga Sulawesi. “Yang bertahan ini karena mereka trauma takut pulang. Ada juga yang tidak pulang karena rumah mereka pada dibakar. Tidak punya rumah lagi. Sebagian lagi memilih pulang ke daerah asalnya,” jelas ustaz Hamka.\n\nSebelumnya, Ketua Umum PP Parmusi H. Usamah Hisyam menyerukan kepada kader Parmusi untuk bahu membahu mengulurkan tangan guna membantu para korban kerusuhuan di Wamena. Ia menyatakan, persoalan ini bukan hanya tanggung jawab pemerintah saja, tapi menjadi tanggung jawab seluruh masyarakat Indonesia. “Karena kita dengan masyarakat Papua itu satu. Satu saudara sebangsa dan setanah air. Jadi kesulitan itu menjadi kesulitan bersama untuk saling membantu,” ujar Usamah sekaligus menyerukan gerakan #ParmusiSaveHelpWamena di acara Muswil Parmusi Jateng, Minggu (29/9).\n\nUsamah kembali menegaskan, bahwa kader-kader Parmusi harus menjadi seorang muzakki, yakni orang mau berkorban mengeluarkan hartanya untuk kebaikan, berapapun nilai uangnya tidak ditentukan oleh besar kecilnya, tapi keikhlasannya. Alhamdulillah, dari penggalanan dana itu terkumpul Rp 50 juta untuk dikirim ke Wamena. “Prinsip lebih baik tangan di atas dari pada di bawah itu harus diterapkan oleh kader Parmusi, menjadi seorang muzakki, bukan menjadi seorang yang meminta-minta. Kerja mengurus Parmusi memang tidak ada yang bayar, tapi kalau ikhlas, Insya Allah Rahmat Allah turun dari langit dan bumi untuk kalian,” tegas Usamah.\n\nTerakhir Usamah berpesan, kerusuhan di Wamena ini terjadi karena dibarengi dengan isu rasis yang bisa saja berpotensi untuk memecah belah keutuhan negara. Karena itu, ia meminta kepada kader Parmusi agar tidak memperkeruh suasana dengan menebar kebencian, mencacimaki, atau menyebar kabar bohong di media sosial. \n“Tugas Parmusi adalah mempererat persaudaraan dan persatuan, jadi tinggalkan fitnah dan cacian karena itu bisa memecah persatuan. Kader Parmusi harus bisa melahirkan solusi bukan melahirkan masalah,” jelasnya.\n(Albar)', '2021-01-10 14:17:13', 'mbah saiyah dan wakijo adalah 2 dari ribuan lansia yang kesulitan untuk memenuhi hari-hari mereka. Mari Bantu Ringankan beban mereka', 'http://lazismuslimin.org/public/images/product/product-1608977233.png', 'product-1608977237.png', 'ACARA', NULL),
(35, 'product-1611405138.png', 'Dirikan Posko, Dai-Dai Parmusi Bantu Korban Bencana di Mamuju dan Majene', 'Para Dai Parmusi Kota Palu bergerak memberikan bantuan bagi warga korban bencana alam di Mamuju dan Majene, Sulawesi Barat. Sejak mendirikan Posko Parmusi pada Senin (18/1/2021) hingga saat ini, para Dai Parmusi terus memberikan bantuan kepada para korban bencana.\n\nKoordinator Lapangan Posko Parmusi Ustadz Afdhal Zainal mengatakan, Parmusi turut memberikan bantuan bersama komunitas dakwah dan relawan peduli bencana yang ada di Sulawesi Barat.\n\n“Selain saya, juga ada Ust. Ns. Arief Zakman, Ust. Asnidar, dan Ust. H. Haris Kasim yang terlibat dalam kegiatan ini. Kali ini Parmusi bersinergi dengan komunitas dakwah dan relawan peduli bencana dari Berkah Mutiara Qolbu (BMQ) Sulteng, Rumah Sehat Berkah AA (RSBAA), Al Habbah, Makanan Untuk Semua (MUS), Bikers Subuhan Palu, Maxxio, Risma Pemuda Silae, Majlis Subuh Berkah, Gerakan Sejadah Masjid, PMPB Balaesang,” ujar Ust. Afdhal kepada Muslim Obsession, Sabtu (23/1/2021).\n\nMenurutnya, paket bantuan diangkut dengan 6 mobil armada bantuan dari Palu, dimana 500 paket lebih termasuk di antaranya 20 karung pakaian disebarkan di beberapa titik lokasi pengungsian.\n\nBantuan yang telah disalurkan, antara lain kebutuhan bayi (popok, susu bayi, minyak telon, pakaian bayi, dan sabun), kebutuhan mandi dan mencuci (sabun mandi, sabun cuci, pasta gigi, sampo), obat-obatan, sembako (beras, air mineral, mie instan, telur, kecap, ikan kaleng, susu, minyak, dan lainnya), kebutuhan trauma healing (permainan dan snack), serta kebutuhan wanita (pembalut dan pakaian dalam).\n\n“Saat ini yang dibutuhkan pasca bencana adalah pemulihan, baik ekonomi maupun mental. Ada beberapa jenis barang yang sangat dibutuhkan, seperti terpal karena banyak rumah yang sudah tidak layak ditempati, obat-obatan, selimut, juga sembako,” ungkap Ustadz Afdhal.\n\nIa mengisahkan, Posko Parmusi Kota Palu terbentuk atas bantuan mantan Ketua Parmusi Sulbar, Ustadz Haris Kasim yang juga pernah menjadi anggota DPRD Mamuju selama dua periode. Dengan adanya posko tersebut, aksi kemanusiaan Parmusi berikutnya akan dilakukan pada pertengahan Februari nanti.\n\n“Posko Parmusi tersebut ada di Jl. Kakatua, tidak jauh dari kantor Bupati. Kami bersyukur Ustadz Haris sangat merespon kami pas melihat logo dan rompi Parmusi yang kami kenakan saat ia melintas di jalan. Beliau lalu menawarkan rumahnya yang cukup besar sehingga bisa menampung hingga 100 relawan untuk di jadikan posko,” kisah Ustadz Afdhal.', '2021-01-23 19:34:45', 'mbah saiyah dan wakijo adalah 2 dari ribuan lansia yang kesulitan untuk memenuhi hari-hari mereka. Mari Bantu Ringankan beban mereka', 'http://lazismuslimin.org/public/images/product/product-1611405138.png', 'product-1606297734.png', 'ACARA', NULL),
(38, 'product-1608879401.png', 'YATIM DAN DHUAFA', '\"Tahukah Kamu orang yang mendustakan agama, itulah orang yang menghardik anak yatim, dan tidak menganjurkan memberi makan kepada orang miskin.\" (QS. Al-Maun :1-3)', '2021-01-09 16:49:47', '\"Tahukah Kamu orang yang mendustakan agama, itulah orang yang menghardik anak yatim, dan tidak menganjurkan memberi makan kepada orang miskin.\" (QS. Al-Maun :1-3)', 'http://lazismuslimin.org/public/images/product/product-1608879401.png', 'product-1608879398.png', 'SEDEKAH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_privileges`
--

CREATE TABLE `t_privileges` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_privileges`
--

INSERT INTO `t_privileges` (`id`, `role_id`, `menu_id`, `user_id`) VALUES
(193, 9, 22, NULL),
(207, 1, 22, NULL),
(208, 1, 23, NULL),
(209, 1, 24, NULL),
(210, 1, 25, NULL),
(211, 1, 26, NULL),
(212, 1, 1, NULL),
(213, 10, 23, NULL),
(214, 10, 24, NULL),
(215, 10, 25, NULL),
(216, 10, 1, NULL),
(223, 11, 23, NULL),
(224, 11, 24, NULL),
(225, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_privileges_sub`
--

CREATE TABLE `t_privileges_sub` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `add` int(11) DEFAULT NULL,
  `edit` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_privileges_sub`
--

INSERT INTO `t_privileges_sub` (`id`, `role_id`, `menu_id`, `sub_menu_id`, `add`, `edit`, `deleted`) VALUES
(515, 9, 22, 68, 1, 1, 1),
(547, 1, 22, 68, 1, 1, 1),
(548, 1, 23, 69, 1, 1, 1),
(549, 1, 23, 70, 1, 1, 1),
(550, 1, 23, 71, 1, 1, 1),
(551, 1, 23, 72, 1, 1, 1),
(552, 1, 23, 73, 1, 1, 1),
(553, 1, 23, 74, 1, 1, 1),
(554, 1, 23, 75, 1, 1, 1),
(555, 1, 24, 76, 1, 1, 1),
(556, 1, 25, 77, 1, 1, 1),
(557, 1, 26, 78, 1, 1, 1),
(558, 1, 1, 1, 1, 1, 1),
(559, 1, 1, 2, 1, 1, 1),
(560, 1, 1, 10, 1, 1, 1),
(561, 1, 1, 41, 1, 1, 1),
(562, 10, 22, 69, 1, 1, 1),
(563, 10, 23, 70, 1, 1, 1),
(564, 10, 23, 74, 1, 1, 1),
(565, 10, 23, 75, 1, 1, 1),
(566, 10, 23, 76, 1, 1, 1),
(567, 10, 23, 77, 1, 1, 1),
(568, 10, 23, 1, 1, 1, 1),
(569, 10, 23, 2, 1, 1, 1),
(570, 10, 24, 10, 1, 1, 1),
(571, 10, 25, 41, 1, 1, 1),
(582, 11, 22, 69, 1, 1, 1),
(583, 11, 23, 70, 1, 1, 1),
(584, 11, 23, 71, 1, 1, 1),
(585, 11, 23, 72, 1, 1, 1),
(586, 11, 23, 73, 1, 1, 1),
(587, 11, 23, 74, 1, 1, 1),
(588, 11, 23, 75, 1, 1, 1),
(589, 11, 23, 76, 1, 1, 1),
(590, 11, 24, 10, 1, 1, 1),
(591, 11, 25, 41, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_product_gallery`
--

CREATE TABLE `t_product_gallery` (
  `id` int(11) NOT NULL,
  `id_product` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `title` text,
  `location` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product_gallery`
--

INSERT INTO `t_product_gallery` (`id`, `id_product`, `img`, `title`, `location`) VALUES
(10, '26', 'product-1611472625.png', 'ok', 'http://localhost/parmusi/public/images/gallery_product/product-1611472625.png'),
(12, '32', 'product-1611473769.png', 'des', 'http://localhost/parmusi/public/images/gallery_product/product-1611473769.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_product_harga`
--

CREATE TABLE `t_product_harga` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `berat` decimal(8,2) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty_grosir` int(11) DEFAULT NULL,
  `harga_grosir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product_harga`
--

INSERT INTO `t_product_harga` (`id`, `product_id`, `berat`, `harga`, `qty_grosir`, `harga_grosir`) VALUES
(3, 2, '0.20', 3000, 50, 2500),
(4, 3, '0.20', 2000, 50, 1500),
(5, 20, '7.20', 500, 5000, 5000),
(7, 1, '0.20', 5000, 50, 4000),
(8, 22, '30.00', 100000, 100, 100000),
(9, 23, '100.00', 75000, 100, 75000),
(10, 24, '10.00', 110000, 100, 110000),
(11, 25, '200.00', 80000, 100, 80000),
(14, 21, '30.00', 110000, 100, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE `t_request` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `address` text,
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `id_member`, `id_product`, `id_size`, `address`, `province`, `city`, `note`) VALUES
(1, 1, 1, 7, 'gg', 'Bali', 'Badung', 'tse'),
(2, 1, 1, 7, 'gg', 'Bali', 'Badung', 'tse'),
(3, 1, 4, 7, 'gh', 'Bengkulu', 'Bengkulu', 'gf');

-- --------------------------------------------------------

--
-- Table structure for table `t_role_user`
--

CREATE TABLE `t_role_user` (
  `id` int(11) NOT NULL,
  `name_role` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role_user`
--

INSERT INTO `t_role_user` (`id`, `name_role`, `desc`, `date_created`) VALUES
(1, 'Admin', 'All Privileges Menu', '2020-04-10 22:13:33'),
(9, 'Piso', 'Khusus Admin Piso', '2020-03-10 03:02:19'),
(10, 'Admin kusuma', 'Khusus Admin Kusuma', '2020-05-29 13:19:34'),
(11, 'admin_laziz', 'khusus untuk laziz', '2020-11-25 13:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `t_slideshow`
--

CREATE TABLE `t_slideshow` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_slideshow`
--

INSERT INTO `t_slideshow` (`id`, `title`, `img`, `adddate`) VALUES
(14, 'img2', '14_cebe67c7293d66ac0aaaa2f2afb05d6c.jpg', '2020-05-26 13:45:14'),
(15, 'img3', '15_02fa2a2cf7ddd96de4d054eea1d7d9fd.png', '2020-05-26 13:45:25'),
(16, 'img4', '16_13e3eb958269049162bdd0a93e611482.png', '2020-05-26 13:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `t_sub_menu`
--

CREATE TABLE `t_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` varchar(45) DEFAULT NULL,
  `sub_menu_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `addby` int(11) DEFAULT NULL,
  `adddate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sub_menu`
--

INSERT INTO `t_sub_menu` (`id`, `id_menu`, `sub_menu_name`, `url`, `addby`, `adddate`) VALUES
(1, '1', 'Group Menu', 'menu_table', NULL, NULL),
(2, '1', 'Sub Menu', 'sub_menu_table', NULL, NULL),
(10, '1', 'User', 'user_table', 1, '2019-04-10 07:33:26'),
(41, '1', 'Role User', 'role_table', 1, '2019-11-08 15:18:49'),
(68, '22', 'List piso ', 'list_piso', 1, '2020-03-10 00:18:20'),
(69, '23', 'Slide Show', 'slideshow', 1, '2020-04-02 00:29:07'),
(70, '23', 'Product', 'product', 1, '2020-04-02 00:32:12'),
(71, '23', 'Why Us', 'why_us', 1, '2020-04-02 00:32:31'),
(72, '23', 'Binefit', 'binefit', 1, '2020-04-02 00:33:02'),
(73, '23', 'Project', 'project', 1, '2020-04-02 00:33:18'),
(74, '23', 'Gallery', 'gallery', 1, '2020-04-02 00:33:36'),
(75, '23', 'Contact Info', 'contact_info', 1, '2020-04-02 00:33:51'),
(76, '24', 'New Order', 'new_order', 1, '2020-04-02 00:37:00'),
(77, '25', 'List Member', 'member', 1, '2020-04-10 22:12:08'),
(78, '26', 'Request List', 'sample', 1, '2020-04-10 22:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaction_detail`
--

CREATE TABLE `t_transaction_detail` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_transaction_detail`
--

INSERT INTO `t_transaction_detail` (`id`, `id_transaction`, `qty`, `berat`, `harga`, `sub_total`, `product_id`) VALUES
(2, 2, 1, 100, 75000, 75000, 23),
(3, 3, 1, 30, 110000, 110000, 21);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaction_header`
--

CREATE TABLE `t_transaction_header` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `address` text,
  `note` text,
  `email` varchar(45) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `snap_token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nomor_transaksi` varchar(45) DEFAULT NULL,
  `id_donasi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_transaction_header`
--

INSERT INTO `t_transaction_header` (`id`, `first_name`, `last_name`, `amount`, `address`, `note`, `email`, `qty`, `phone`, `status`, `snap_token`, `created_at`, `updated_at`, `nomor_transaksi`, `id_donasi`) VALUES
(1, 'handri', '', 200000, NULL, 'semoga amanah', 'handrisaeputra@gmail.com', 1, NULL, 'pending', '3947375d-75f8-4e3c-a90c-442116e1e8ba', '2020-11-25 13:45:39', '2020-11-25 13:45:40', '5352579954', '26'),
(2, 'handri', '', 100000, NULL, 'test', 'handrisaeputra@gmail.com', 1, NULL, 'pending', '6b1fe8f2-4dbf-415f-b6e8-300ca01a9807', '2020-11-25 16:54:22', '2020-11-25 16:54:22', '5350975657', '33'),
(8, 'indra', '', 20000, NULL, 'Semoga Bermanfaat', 'indranurp98@gmail.com', 1, NULL, 'pending', '319c87fc-5e4f-414d-8485-d921430ab611', '2020-11-26 14:44:06', '2020-11-26 14:44:06', '5410299549', '26'),
(9, 'indra', '', 20000, NULL, 'Semoga Bermanfaat', 'indranurp98@gmail.com', 1, NULL, 'pending', '840f4ea9-184c-41f2-9d22-eb9db0626634', '2020-11-26 14:44:06', '2020-11-26 14:44:07', '5298561019', '26'),
(10, 'indra', '', 20000, NULL, 'Semoga Bermanfaat', 'indranurp98@gmail.com', 1, NULL, 'pending', '2010aaa9-ed28-488f-9d07-a39896afe1c1', '2020-11-26 14:44:06', '2020-11-26 14:44:07', '5054529853', '26'),
(11, 'indra', '', 20000, NULL, 'Semoga Bermanfaat', 'indranurp98@gmail.com', 1, NULL, 'pending', 'c5533d75-db58-40ee-b98b-d848e1851804', '2020-11-26 14:44:07', '2020-11-26 14:44:07', '5748515210', '26'),
(18, 'indra', '', 20000, NULL, 'Makasih', 'indraindra@gmail.com', 1, NULL, 'pending', 'a9522ac1-3c0e-4185-abd0-f3a871ae6165', '2020-11-26 21:10:16', '2020-11-26 21:10:16', '5099999855', '26'),
(26, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', 'bf6193f8-da8c-44b9-9053-1f9bc19981bd', '2020-11-26 22:36:55', '2020-11-26 22:36:56', '9757485098', '26'),
(27, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', '158b33f6-7b3d-4602-8abd-c7ab96028bc1', '2020-11-26 22:36:58', '2020-11-26 22:36:58', '9849485454', '26'),
(28, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', 'cabd5670-aea2-4104-a190-d7928e8bfa37', '2020-11-26 22:37:00', '2020-11-26 22:37:00', '9751485097', '26'),
(40, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', '90ac832d-190b-431d-990a-e446c49311f6', '2020-11-26 22:37:24', '2020-11-26 22:37:25', '9710057981', '26'),
(41, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', '8f44d66f-3189-4594-bf33-b51cd50170fc', '2020-11-26 22:37:28', '2020-11-26 22:37:28', '4997515249', '26'),
(42, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', 'aba2b069-fe78-4c20-ab51-663c64774861', '2020-11-26 22:37:28', '2020-11-26 22:37:29', '1029797535', '26'),
(43, 'indra', '', 20000, NULL, 'makasih', 'indrapras@gmail.com', 1, NULL, 'pending', '849f358d-d262-409b-921a-a119b050c985', '2020-11-26 22:37:30', '2020-11-26 22:37:31', '4951525310', '26'),
(44, 'agus', '', 20000, NULL, 'oke', 'agus22@gmail.com', 1, NULL, 'pending', '29811afd-0ad8-482e-92a3-051b1b75780c', '2020-12-01 23:58:50', '2020-12-01 23:58:50', '9850505557', '26'),
(45, 'Ika Mulyati', '', 50000, NULL, 'oke', 'ikamulyati96@gmail.com', 1, NULL, 'pending', 'ae23a3ff-0fb8-4ce4-b5df-946b87cae838', '2020-12-12 23:21:19', '2020-12-12 23:21:19', '5097511025', '26'),
(48, 'indra nur prasetya', '', 50000, NULL, 'Semoga Membantu', 'indraprasetya99@gmail.com', 1, NULL, 'pending', '3e9b8c40-76e2-4cea-8b51-0209799d3d5f', '2021-01-07 03:54:47', '2021-01-07 03:54:47', '9810250575', '26'),
(61, 'Indra', '', 100000, NULL, 'makasih', 'indraprasetya99@gmail.com', 1, NULL, 'pending', 'b01e9049-0272-463e-beba-2684b635a645', '2021-01-11 14:40:01', '2021-01-11 14:40:01', '5397525199', '26'),
(62, 'handri', '', 10000, NULL, 'semoga', 'handrisaeputra@gmail.com', 1, NULL, 'pending', 'e30060cb-a790-4d4a-9a04-9e94d05e08c9', '2021-01-11 14:49:56', '2021-01-11 14:49:57', '5051574910', '27'),
(66, 'Indra Nur Prasetya', '', 10000, NULL, 'Semoga Bermanfaat', 'indraprasetya99@gmail.com', 1, NULL, 'pending', 'c0af8ff9-a848-40cd-8a60-4cd5345879c5', '2021-01-11 14:54:23', '2021-01-11 14:54:23', '5053515456', '26'),
(67, 'Hadi Zakaria', '', 50000, NULL, 'Barakallah', 'hadhiezacky@gmail.com', 1, NULL, 'pending', '8c676d55-9b2e-4546-a649-750e816ceff0', '2021-01-11 14:57:40', '2021-01-11 14:57:40', '1021015548', '26'),
(68, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'hadhiezacky@gmail.com', 1, NULL, 'pending', '755a3d78-6557-49c5-a29f-ca92bf51f2cf', '2021-01-11 15:02:55', '2021-01-11 15:02:56', '4998995799', '26'),
(69, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'hadhiezacky@gmail.com', 1, NULL, 'pending', '5b3c3436-2595-40a7-97c8-d7f5edf95c33', '2021-01-11 15:02:56', '2021-01-11 15:02:56', '9755565448', '26'),
(70, 'Ika Mulyanti', '', 10000, NULL, 'Barakallah', 'ikamulyanti02@gmail.com', 1, NULL, 'pending', '73a4446e-e551-4d44-b02b-b53b539c9a0b', '2021-01-11 15:04:01', '2021-01-11 15:04:01', '5153999799', '26'),
(71, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'hadhiezacky@gmail.com', 1, NULL, 'pending', '619eb295-2184-4e00-8fd1-1959c200d5be', '2021-01-11 15:07:06', '2021-01-11 15:07:07', '5110050985', '26'),
(72, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'b7b0f23f-943c-415c-b733-3ec563cb03f4', '2021-01-11 15:13:43', '2021-01-11 15:13:43', '1029999575', '28'),
(73, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '4bdff0e4-ba8a-4bab-8cde-ec5c5a861cc1', '2021-01-11 15:16:13', '2021-01-11 15:16:13', '5110053101', '28'),
(74, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '611b8413-2bd5-4b14-b26e-d25315e7f292', '2021-01-11 16:06:51', '2021-01-11 16:06:51', '4950489851', '28'),
(75, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '1b0374d3-e3b2-45a9-8e68-a03248191f93', '2021-01-11 16:16:00', '2021-01-11 16:16:00', '9750534857', '28'),
(76, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'cbb8d474-d0c8-4880-8c90-c5c512f92b2c', '2021-01-11 16:18:40', '2021-01-11 16:18:41', '4855101484', '28'),
(77, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'e9af8a13-f02b-4be2-8f79-35b50cced6f5', '2021-01-11 16:22:05', '2021-01-11 16:22:05', '9956549753', '28'),
(78, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '97fa9440-e34e-4889-9ac8-3ce0208f0276', '2021-01-11 16:23:07', '2021-01-11 16:23:07', '1014848544', '28'),
(79, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'bcaa3058-bf86-4ffc-9982-0d17ac77c74c', '2021-01-11 16:24:07', '2021-01-11 16:24:07', '5310049995', '28'),
(80, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '5e41b518-d900-4175-96aa-dc2a8769b90d', '2021-01-11 16:25:30', '2021-01-11 16:25:31', '5657535352', '28'),
(81, 'Ika mulyanti', '', 10000, NULL, 'Bismillah', 'ikamulyanti02@gmail.com', 1, NULL, 'pending', '8b5fb867-cd3e-4f50-9bc4-003a62a2abe0', '2021-01-11 16:33:36', '2021-01-11 16:33:36', '5756101971', '38'),
(82, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '280256ac-2705-4470-8881-02f66ca84979', '2021-01-11 16:42:13', '2021-01-11 16:42:13', '4953495451', '26'),
(83, 'Ika mulyanti', '', 10000, NULL, 'Bismillah', 'ikamulyanti02@gmail.com', 1, NULL, 'pending', 'd05eeca9-7fe7-4d3d-856b-8eea026fb227', '2021-01-11 16:43:44', '2021-01-11 16:43:44', '1014854101', '38'),
(84, 'Hadi Zakaria', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'ba28324b-c8d3-4386-b367-415c99995ea4', '2021-01-11 16:45:04', '2021-01-11 16:45:05', '4999489955', '26'),
(100, 'Ika mulyanti', '', 10000, NULL, 'Bismillah', 'ikamulyanti02@gmail.com', 1, NULL, 'pending', '4cc57368-4894-4e95-8b07-885cab84b586', '2021-01-11 16:51:39', '2021-01-11 16:51:40', '1009999545', '38'),
(101, 'Hadi Z', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '49b488b9-71cf-41f7-89c3-285d2c00440b', '2021-01-11 16:51:44', '2021-01-11 16:51:45', '5710297514', '26'),
(102, 'Ika mulyanti', '', 10000, NULL, 'Bismillah', 'ikamulyanti02@gmail.com', 1, NULL, 'pending', 'e88ddca7-a3ba-4132-b861-75240e3ad9da', '2021-01-11 16:51:46', '2021-01-11 16:51:46', '1019752575', '38'),
(110, 'Hadi ZS', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'c110554d-7ce9-4741-9a3d-a3b7c7985d95', '2021-01-11 17:04:17', '2021-01-11 17:04:17', '4910299101', '26'),
(111, 'Hadi ZS', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '2370cf13-3ec6-4ad3-b2e7-eb01baf1f0e2', '2021-01-11 17:12:18', '2021-01-11 17:12:18', '5010055561', '26'),
(112, 'Hadi', '', 20000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'f0145ce0-21aa-4edd-aca5-161cd26323a8', '2021-01-11 22:14:24', '2021-01-11 22:14:24', '5697489710', '27'),
(113, 'Indra Nur Prasetya', '', 10000, NULL, 'Barakallah', 'indraprasetya99@gmail.com', 1, NULL, 'pending', 'd3787f07-7405-40a2-833e-b2c4381df33e', '2021-01-11 22:49:29', '2021-01-11 22:49:29', '9855564954', '27'),
(114, 'test midtrans', '', 20000, NULL, NULL, 'dinid1436@gmail.com', 1, NULL, 'pending', '66c2e4bf-a7ae-47b8-ba7e-b8aef58f814b', '2021-01-12 10:14:24', '2021-01-12 10:14:24', '1021015254', '26'),
(117, 'Hamba Allah', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'e800560d-b14c-47b8-a659-f0903432dcf1', '2021-01-12 14:38:59', '2021-01-12 14:38:59', '5753985355', '26'),
(118, 'Hamba Allah', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'f369ba1c-4a0d-4251-b089-3fe01a9f4724', '2021-01-12 14:39:54', '2021-01-12 14:39:54', '1025799559', '26'),
(119, 'Hamba Allah', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', 'c484babe-6076-4223-992f-25f56ee47283', '2021-01-12 14:41:01', '2021-01-12 14:41:01', '5552101525', '26'),
(120, 'Hamba Allah', '', 10000, NULL, 'Barakallah', 'didy.zacky@gmail.com', 1, NULL, 'pending', '7d5a4ccc-acb7-40da-88aa-66ef0af91b3c', '2021-01-12 14:42:39', '2021-01-12 14:42:39', '1011005497', '27'),
(121, 'Indra Nur Prasetya', '', 10000, NULL, 'asdasd', 'indraprasetya99@gmail.com', 1, NULL, 'pending', 'fe297c83-f2a7-4da4-a5f5-189f1394d069', '2021-01-19 12:24:31', '2021-01-19 12:24:31', '5752549955', '26'),
(127, NULL, '', 10949, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-24 09:37:54', '2021-01-24 09:37:54', '2147483647', '26'),
(128, NULL, '', 10489, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-24 09:39:00', '2021-01-24 09:39:00', '2147483647', '26'),
(129, NULL, '', 10910, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-24 09:47:04', '2021-01-24 09:47:04', '2147483647', '26'),
(130, NULL, '', 10235, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-24 09:48:25', '2021-01-24 09:48:25', '2147483647', '26'),
(131, NULL, '', 10229, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-24 10:00:14', '2021-01-24 10:00:14', '2147483647', '26'),
(132, NULL, '', 10725, NULL, NULL, NULL, 1, NULL, 'success', NULL, '2021-01-24 10:00:32', '2021-01-24 10:00:32', '2147483647', '26'),
(133, NULL, '', 10705, NULL, NULL, NULL, 1, NULL, 'success', NULL, '2021-01-24 10:01:17', '2021-01-24 10:01:17', '2147483647', '26'),
(139, NULL, '', 10948, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-01-24 12:54:14', '2021-01-24 12:54:14', '2147483647', '26'),
(140, NULL, '', 10537, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-26 20:17:51', '2021-01-26 20:17:51', '2147483647', '34'),
(141, NULL, '', 10800, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-26 20:18:07', '2021-01-26 20:18:07', '2147483647', '34'),
(142, 'handri', '', 10750, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-01-31 23:53:32', '2021-01-31 23:53:32', '2147483647', '26'),
(143, NULL, '', 10222, NULL, NULL, NULL, 1, NULL, 'pending', NULL, '2021-02-07 16:14:43', '2021-02-07 16:14:43', '1021015448', '26');

-- --------------------------------------------------------

--
-- Table structure for table `t_why_us`
--

CREATE TABLE `t_why_us` (
  `id` int(11) NOT NULL,
  `title` text,
  `title_number` varchar(45) DEFAULT NULL,
  `title_desc` text,
  `desc` text,
  `desc_eng` text,
  `bg` varchar(45) DEFAULT NULL,
  `img` text,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_why_us`
--

INSERT INTO `t_why_us` (`id`, `title`, `title_number`, `title_desc`, `desc`, `desc_eng`, `bg`, `img`, `adddate`) VALUES
(1, 'Why Kusuma Clinic Beuty   ', '01     ', 'EXPERIENCES    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s     ', 'English version      ', 'bg', '1_our_journey.png', '2020-05-27 09:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `realm` varchar(512) DEFAULT NULL,
  `username` varchar(512) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `company_id` varchar(45) DEFAULT NULL,
  `area_id` varchar(45) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `gender` varchar(512) DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `user_group_name` varchar(512) DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `mobile` varchar(512) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_crated` datetime DEFAULT NULL,
  `emailVerified` tinyint(1) DEFAULT NULL,
  `real_password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `verificationToken` varchar(512) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `token_api` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `realm`, `username`, `name`, `password`, `company_id`, `area_id`, `email`, `gender`, `user_group_id`, `user_group_name`, `phone`, `mobile`, `address`, `dob`, `hometown`, `group`, `team`, `status`, `date_crated`, `emailVerified`, `real_password`, `active`, `verificationToken`, `remember_token`, `role`, `user_type`, `token_api`) VALUES
(1, 'server', 'admin', 'admin', '$2y$10$sGcFROD2ze.JkXz5av7u/OIULmf/ds5lJ6hR6y858l6U3GgOV0FI.', NULL, NULL, 'admin@admin.com', NULL, 1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '1', NULL, 'ZuZv8lCc1Q72rVKXrBbFsmGOey4eWpRCj9yAXs4jwZhGONA9U7Y8tSzpY4bP', '1', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvdmlydHVzLXdlYi9hcGkvYXV0aC9zaWduaW4iLCJpYXQiOjE1NzUxOTM4NjEsImV4cCI6MTU3NTc5ODY2MSwibmJmIjoxNTc1MTkzODYxLCJqdGkiOiJjaG5VVEw3ODRmdnA0WEJ4In0.vcF5BeQhSh3kaH6_L6qtHbfsdEJFza8x4PRGzWtDbdQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesstoken`
--
ALTER TABLE `accesstoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_piso`
--
ALTER TABLE `tbl_piso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_benefit`
--
ALTER TABLE `t_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_contact_info`
--
ALTER TABLE `t_contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gallery`
--
ALTER TABLE `t_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_icon`
--
ALTER TABLE `t_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_member`
--
ALTER TABLE `t_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_past_project`
--
ALTER TABLE `t_past_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_post_project`
--
ALTER TABLE `t_post_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_privileges`
--
ALTER TABLE `t_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_privileges_sub`
--
ALTER TABLE `t_privileges_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_gallery`
--
ALTER TABLE `t_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_harga`
--
ALTER TABLE `t_product_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_request`
--
ALTER TABLE `t_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_role_user`
--
ALTER TABLE `t_role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_slideshow`
--
ALTER TABLE `t_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sub_menu`
--
ALTER TABLE `t_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaction_header`
--
ALTER TABLE `t_transaction_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_why_us`
--
ALTER TABLE `t_why_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_piso`
--
ALTER TABLE `tbl_piso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `t_benefit`
--
ALTER TABLE `t_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_contact_info`
--
ALTER TABLE `t_contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_gallery`
--
ALTER TABLE `t_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_icon`
--
ALTER TABLE `t_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_member`
--
ALTER TABLE `t_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t_past_project`
--
ALTER TABLE `t_past_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_post_project`
--
ALTER TABLE `t_post_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `t_privileges`
--
ALTER TABLE `t_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `t_privileges_sub`
--
ALTER TABLE `t_privileges_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT for table `t_product_gallery`
--
ALTER TABLE `t_product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_product_harga`
--
ALTER TABLE `t_product_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_role_user`
--
ALTER TABLE `t_role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_slideshow`
--
ALTER TABLE `t_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_sub_menu`
--
ALTER TABLE `t_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_transaction_header`
--
ALTER TABLE `t_transaction_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `t_why_us`
--
ALTER TABLE `t_why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
