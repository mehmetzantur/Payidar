-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 13 Oca 2018, 23:22:22
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mhmtxyz_payidar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '0',
  `TrackingNumber` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`Id`, `UserId`, `ProductId`, `Amount`, `Price`, `Time`, `Status`, `TrackingNumber`) VALUES
(43, 24, 1, 2, 22.3, '2018-01-08 18:39:35', -1, NULL),
(44, 24, 160, 1, 99, '2018-01-08 18:39:37', 1, NULL),
(45, 24, 1, 2, 22.3, '2018-01-08 19:03:56', 1, '3232'),
(46, 24, 155, 1, 1, '2018-01-08 19:05:04', -1, NULL),
(47, 24, 3, 1, 43.33, '2018-01-08 19:05:25', -1, NULL),
(83, 24, 147, 4, 11, '2018-01-08 20:35:06', -1, NULL),
(85, 24, 3, 3, 43.33, '2018-01-08 20:48:01', 2, NULL),
(86, 24, 155, 1, 1, '2018-01-08 20:51:31', 2, NULL),
(87, 24, 1, 1, 22.3, '2018-01-08 21:49:27', 2, '3333'),
(88, 24, 1, 1, 22.3, '2018-01-08 21:50:10', -1, NULL),
(89, 24, 1, 1, 22.3, '2018-01-08 21:51:13', -1, NULL),
(90, 24, 1, 1, 22.3, '2018-01-08 21:52:03', 1, '3234343432'),
(91, 24, 1, 3, 22.3, '2018-01-08 21:54:54', 1, '777'),
(106, 24, 147, 1, 11, '2018-01-13 17:25:59', 0, NULL),
(107, 29, 164, 3, 45.68, '2018-01-13 22:27:08', -1, NULL),
(108, 29, 170, 2, 12.44, '2018-01-13 22:27:17', -1, NULL),
(109, 28, 174, 1, 249.9, '2018-01-13 22:31:37', 1, NULL),
(110, 28, 171, 1, 6, '2018-01-13 22:35:16', 2, NULL),
(111, 29, 164, 1, 45.68, '2018-01-13 22:35:17', -1, NULL),
(112, 29, 169, 1, 7.65, '2018-01-13 22:35:50', 0, NULL),
(114, 24, 170, 2, 12.44, '2018-01-13 22:56:08', 0, NULL),
(115, 24, 164, 1, 45.68, '2018-01-13 22:56:28', 0, NULL),
(116, 24, 163, 1, 55.99, '2018-01-13 23:06:55', 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand`
--

CREATE TABLE `brand` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brand`
--

INSERT INTO `brand` (`Id`, `Name`, `Image`, `Order`) VALUES
(1, 'Eti', 'c7e1859b616631f14b03eea14f48d537.jpg', 1),
(2, 'Sarp', '580721a081255f8853be80c5e7290100.jpg', 2),
(3, 'Syrox', '74e079f94aaafecb94fd6f47120c3c2e.jpg', 1),
(4, 'Inovaxis', 'f1acc0507bea695aa92021557863f6c0.jpg', 2),
(5, 'S-Link', '936708d7831fec27eddf7aaeb4a12f8a.png', 3),
(6, 'Pets', '13c3ce46a20fbb5fc1e98ca2510f9543.png', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `ParentId` int(11) DEFAULT NULL,
  `Order` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`Id`, `ParentId`, `Order`, `Name`, `Image`) VALUES
(9, 0, '1', 'Kokular', ''),
(10, 0, '2', 'Elektronik', ''),
(11, 0, '3', 'Oyuncak', ''),
(12, 0, '4', 'Oto Bakım', ''),
(14, 10, '1', 'Şarj Cihazı', ''),
(15, 10, '2', 'Powerbank', ''),
(16, 9, '2', 'Kolonya', ''),
(22, 9, '2', 'Parfüm', ''),
(25, 16, '1', 'Limon Kolonyası', ''),
(27, 16, '2', 'Tütün Kolonyası', ''),
(28, 16, '3', 'Parfümlü Kolonya', '1e311196845d58bd04da6e7eef893a4e.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Vote` int(11) DEFAULT NULL,
  `Comment` text COLLATE utf8_turkish_ci,
  `IsActive` tinyint(1) DEFAULT '0',
  `VoteTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`Id`, `UserId`, `ProductId`, `Vote`, `Comment`, `IsActive`, `VoteTime`) VALUES
(1, 1, 1, 4, 'ürünü beğendim', 1, '2017-11-13 17:45:18'),
(3, 23, 1, 5, 'süper', 1, '2017-11-11 17:45:18'),
(11, 24, 1, 4, 'ccc', 1, '2017-12-29 18:37:48'),
(13, 24, 1, 2, 'qqqq', 1, '2017-12-29 19:03:36'),
(14, 24, 1, 3, 'z', 1, '2017-12-29 19:08:03'),
(15, 24, 1, 0, 'ddd', 1, '2017-12-29 19:23:11'),
(17, 24, 160, 5, 'tdfgdsd', 1, '2017-12-30 20:23:18'),
(19, 24, 1, 5, 'cx', 1, '2018-01-12 18:38:08'),
(20, 24, 174, 5, 'Ürün gayet güzel. Kargo da hızlıydı. Teşekkürler...', 1, '2018-01-13 22:20:16'),
(21, 28, 174, 3, 'Üründe tüy dökülmesi var!', 1, '2018-01-13 22:23:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE `gallery` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gallery`
--

INSERT INTO `gallery` (`Id`, `ProductId`, `Image`) VALUES
(10, 1, '93ccff3d12cd751d0fecdc800b2f3571.jpg'),
(11, 161, '58cf21127ac4a3497a69f09ad1240852.jpg'),
(13, 161, 'be9fb29b1d417e661ec1f84f72a94714.jpg'),
(14, 165, '7eb7d2612cfe4e6431582feb606b6b6e.jpg'),
(15, 165, 'bd3ae201493894c3e68aa048dcf43780.jpg'),
(16, 165, '1068bd0d1065dbcd894f55e086ed02d1.jpg'),
(17, 165, '8e3b2eb006e58b762e09b77dbd3b0c66.jpg'),
(18, 166, 'e85af2ea0e85c4abe5bc0e2f08e27e5d.jpg'),
(19, 166, 'b684ba6211ce9bcdc70b5e74b137955d.jpg'),
(20, 169, '482ea95276c431b38487ffdf22bebfe8.jpg'),
(21, 171, '189c97e8b9654f3137d0ab96c0f34a1b.jpg'),
(22, 172, 'da59ce241ff8b3566c1f09bee0b905b2.jpg'),
(23, 173, '681fd9c8e2832fac38d6804ea3cbcf89.jpg'),
(24, 174, '7357cd48314bd121eb5a7882ee664f1e.jpg'),
(25, 174, '0cb401ffe76a3680f264be00e9c019f2.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iller`
--

CREATE TABLE `iller` (
  `il_no` int(11) NOT NULL,
  `isim` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iller`
--

INSERT INTO `iller` (`il_no`, `isim`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elâzığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkâri'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `issue_question`
--

CREATE TABLE `issue_question` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `issue_question`
--

INSERT INTO `issue_question` (`Id`, `UserId`, `Title`, `Time`, `Status`) VALUES
(12, 24, 'İlk Sorum', '2018-01-04 21:08:41', 2),
(13, 23, 'deneme', '2018-01-04 21:22:28', 2),
(14, 24, 'merhaba', '2018-01-06 17:10:34', 2),
(15, 24, 'eeee', '2018-01-06 18:26:11', 2),
(16, 23, 'fdds dsdssd sddsfds ds fdsf dsfdsfdsfdsfsd sdfdsfsd sd sd sd', '2018-01-06 18:28:39', 2),
(17, 24, 'dsadas', '2018-01-07 01:14:43', 2),
(18, 24, 'hh', '2018-01-07 01:16:27', 1),
(19, 24, 'dd', '2018-01-07 20:06:41', 1),
(20, 24, 'Kargo', '2018-01-13 22:43:32', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `issue_reply`
--

CREATE TABLE `issue_reply` (
  `Id` int(11) NOT NULL,
  `QuestionId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Message` text COLLATE utf8_turkish_ci,
  `Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `issue_reply`
--

INSERT INTO `issue_reply` (`Id`, `QuestionId`, `UserId`, `Message`, `Time`) VALUES
(3, 12, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad, amet architecto aspernatur assumenda delectus error expedita inventore non obcaecati, rerum sunt tempora tempore ut veniam. Illo quidem totam', '2018-01-04 21:08:41'),
(4, 13, 23, 'deneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriği\r\n\r\n\r\n\r\ndeneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriğideneme başşlıklı sorunun içeriği', '2018-01-04 21:22:28'),
(5, 13, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad, amet architecto aspernatur assumenda delectus error expedita inventore non obcaecati, rerum sunt tempora tempore ut veniam. Illo quidem totam\r\n', '2018-01-04 21:22:28'),
(6, 14, 24, 'dasdsa d sa das', '2018-01-06 17:10:34'),
(7, 14, 0, 'cevapppp', '2018-01-06 17:10:34'),
(9, 14, 24, 'talip şuan türkü paylaşıyor sayın admin', '2018-01-06 18:01:32'),
(10, 14, 24, 'qqq', '2018-01-06 18:09:00'),
(11, 12, 24, 'aaa', '2018-01-06 18:18:12'),
(12, 15, 24, 'ddddd', '2018-01-06 18:26:11'),
(13, 15, 24, 'dsa', '2018-01-06 18:26:16'),
(14, 16, 23, 'fdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as dfdsffsdf sdf aasdas sad sa dasraewdasd as sa as d', '2018-01-06 18:28:39'),
(15, 17, 24, 'dsadddd', '2018-01-07 01:14:43'),
(16, 17, 24, 'dddd', '2018-01-07 01:15:14'),
(17, 18, 24, 'hh', '2018-01-07 01:16:27'),
(18, 18, 24, 'd', '2018-01-07 01:33:28'),
(19, 19, 24, 'aa', '2018-01-07 20:06:41'),
(24, 16, 1, 'aaaaa', '2018-01-07 20:38:51'),
(25, 16, 23, 'bbbbb', '2018-01-07 20:44:16'),
(26, 19, 1, 'adadadada', '2018-01-07 21:36:19'),
(27, 18, 1, 'zczxcz', '2018-01-07 22:38:37'),
(28, 20, 24, 'Ürünümün kargosu ne zaman gelir?', '2018-01-13 22:43:32'),
(29, 19, 1, 'qqqq', '2018-01-13 22:46:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`) VALUES
(1, NULL, 'Item 0', 'glyphicon glyphicon-user', 'Item-0', 1),
(2, NULL, 'Item 1', 'glyphicon glyphicon-remove', 'Item-1', 2),
(3, NULL, 'Item 2', '', 'Item-2', 3),
(4, NULL, 'Item 3', '', 'Item-3', 4),
(5, NULL, 'Item 4', '', 'Item-4', 5),
(6, NULL, 'Item 5', '', 'Item-5', 6),
(7, NULL, 'Item 6', '', 'Item-6', 7),
(8, 1, 'Item 0.1', '', 'item-0.1', 1),
(9, 1, 'Item 0.2', 'glyphicon glyphicon-search', 'item-0-2', 2),
(10, 8, 'Item 0.1.1', '', 'item-0-1-1', 1),
(11, 8, 'Item 0.1.2', '', 'Item-0-1-2', 2),
(12, 10, 'Item 0.1.1.1', '', 'Item-0-1-1-1', 1),
(13, 10, 'Item 0.1.1.2', '', 'Item-0-1-1-2', 2),
(14, 2, 'Item 1.1', '', 'item-1-1', 1),
(15, 2, 'Item 1.2', '', 'item-1-2', 2),
(16, 3, 'Item 2.2', '', 'item-2-2', 2),
(17, 3, 'Item 2.1', '', 'item-2.1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Categories` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `BrandId` int(11) DEFAULT NULL,
  `Order` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_turkish_ci,
  `Price` double DEFAULT NULL,
  `OldPrice` double DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `LastTime` datetime DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`Id`, `CategoryId`, `Categories`, `BrandId`, `Order`, `Name`, `Detail`, `Price`, `OldPrice`, `Image`, `LastTime`, `Amount`) VALUES
(1, 16, '16,9', 1, '1', 'Eti Limon Kolonyası 200 cc', '<p>weweww</p>', 22.3, 33.45, '4f0b5b1cfe91ce7fa28dcef88ceb3e0b.jpg', '2018-01-09 01:58:38', 1),
(161, 25, '25,16,9', 1, '1', 'Eti Limon Kolonyası 500 ml', '<h3><strong>Eti Limon Kolonyası 500 ml</strong></h3><p>&nbsp;</p><p>Ürün 500 ml olup 80 derecedir.</p>', 29.99, 35.99, '8c9e23aa69a00fabdeb8a81777eef4b0.jpg', '2018-01-13 19:10:43', 50),
(162, 27, '27,16,9', 1, '1', 'Eti Tütün Kolonyası 500 ml', '<h3>Eti Tütün Kolonyası 500 ml</h3><p>&nbsp;</p><p>dsadsadasdsa</p>', 21.99, 30.99, 'f68cdb802ac1a7e20a93716a2c31173b.jpg', '2018-01-13 19:26:36', 40),
(163, 25, '25,16,9', 1, '1', 'Eti Limon Kolonyası 1L', '<h3>dsadsadsa sa dasd as</h3>', 55.99, 65.99, '1ef428cde4fe8d208a194c60b691bb23.jpg', '2018-01-13 19:30:52', 70),
(164, 27, '27,16,9', 1, '1', 'Eti Tütün Kolonyası 1L', '<h3><strong>dasdas a sa &nbsp;sasda sa das</strong></h3><p>&nbsp;</p><ul><li>dsadas&nbsp;</li><li>sadsadasd as</li><li>asdasasda s as</li><li>dsadsa</li></ul>', 45.68, 68.78, '90e64412d94ae95e370f67c1ca03d866.jpg', '2018-01-13 19:33:01', 30),
(165, 22, '22,9', 1, '1', 'Etty Oda Spreyi Çeşitleri', '<p>&nbsp;</p><h3>Etty Oda Sprey Çeşitleri</h3><p>&nbsp;</p><p><i>Hem ev hem de araç içerisinde kullanılabilir.</i></p><p>&nbsp;</p>', 25.47, 0, 'bbcb9d05ab8bb5969df0459fa7ee318f.jpg', '2018-01-13 20:33:51', 12),
(166, 28, '28,16,9', 1, '1', 'Eti Hatırla Beni Çeşitleri', '<p>&nbsp;</p><h3>Eti Hatırla Beni Çeşitleri</h3><p>&nbsp;</p>', 9.99, 0, '99c2ece7cada47932a1ba42b3f3819d6.jpg', '2018-01-13 20:40:31', 13),
(167, 9, '9,0', 1, '1', 'Eti Gül Suyu 400 ml', '<h3>Eti Gül Suyu 400 ml</h3>', 6.45, 0, 'ad34f936b2a2e107478e7a09465c3d46.jpg', '2018-01-13 20:42:22', 55),
(168, 25, '25,16,9', 1, '1', 'Eti Limon Cam Şişe', '<h3>Eti Limon Kolonyası Cam şişe</h3>', 11.95, 0, '0a96f2b4d6ecac3a091231c63c881110.jpg', '2018-01-13 20:43:38', 66),
(169, 16, '16,9', 1, '1', 'Eti Tıraş Kolonyası Çeşitleri', '<p>&nbsp;</p><h3>Eti Tıraş Kolonyası</h3><p>dsadsa dsa dsadsadsad sadsadsadsa d sad</p><p>&nbsp;sadsa&nbsp;</p><p>sadsadsadad</p><p>sadsadsadsadsadsadsa</p><p>dsadsadsadsadsadsa</p><p>&nbsp;</p>', 7.65, 0, '82d6b2f62e06d2a9b07fa7a722c76433.jpg', '2018-01-13 20:48:11', 33),
(170, 16, '16,9', 1, '1', 'Eti Bebe Kolonyası', '<h3>Eti Bebe Kolonyası</h3><ul><li>Tahriş etmez</li><li>Alkolsüzdür</li><li>Yoğun olmayan bir kokusu vardır</li><li>dsadsadsadsa</li><li>dsadasdasdas</li></ul>', 12.44, 23.99, '2efc83082b32d7a9c63b33d9b69ce2e3.jpg', '2018-01-13 20:57:03', NULL),
(171, 14, '14,10', 3, '1', 'Syrox Syrox Cep Telefonu Şarj Aleti 2Amp. - Syx-J1', '<h3><i><strong>Syrox Syrox Cep Telefonu Şarj Aleti 2Amp. - Syx-J15</strong></i></h3>', 6, 9, '829080991452e045fa117114f94efb5e.jpg', '2018-01-13 21:04:16', NULL),
(172, 14, '14,10', 4, '2', 'Inovaxıs ( A Kalite ) Ekstra Power Inv-700 Samsung', '<p>&nbsp;</p><p>Inovaxıs ( A Kalite ) Ekstra Power Inv-700 Samsung Micro USB Güçlü Şarj Aleti</p><p>&nbsp;</p>', 14.99, 0, 'a6523709447494af3fb6cb6fa73ff572.jpg', '2018-01-13 21:09:44', NULL),
(173, 15, '15,10', 5, '1', 'S-Link Ip-M42 4200Mah 2100Ma Çıkış Pembe Pilli Şar', '<h3>S-Link Ip-M42 4200Mah 2100Ma Çıkış Pembe Pilli Şarj Cihazı Şarj Aleti Taşınabilir Pil Şarj Cihazı</h3>', 45.99, 0, '977a4a2275c0df18d7be174c517e46f0.jpg', '2018-01-13 21:13:13', NULL),
(174, 11, '11,0', 6, '1', 'Little Live Pets', '<p>&nbsp;</p><p><a href=\"http://www.hepsiburada.com/littlelivepets\">Little Live Pets</a></p><p>&nbsp;</p><p>oyuncak peluş köpek</p><p>&nbsp;</p>', 249.9, 299.99, 'b3f50357e5af9f1c73ca98b2e683d052.jpg', '2018-01-13 21:44:37', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_turkish_ci,
  `Image` text COLLATE utf8_turkish_ci,
  `IsPage` tinyint(1) DEFAULT NULL,
  `PageOrder` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`Id`, `Name`, `Detail`, `Image`, `IsPage`, `PageOrder`) VALUES
(4, 'Title', '<p>Motocar Oto Bakım Ürünleri</p>', NULL, NULL, NULL),
(5, 'Telefon', '<p>0537 311 47 57</p>', NULL, NULL, NULL),
(6, 'Email', '<p>info@motocar.com</p>', NULL, NULL, NULL),
(10, 'Logo', '<p>&nbsp;</p>', 'b57e5b13d6b466d61bc2ccac88c41abf.png', NULL, NULL),
(11, 'Logo-Mobile', '<p>&nbsp;</p>', '2d5a102f449f537b77cf5b6951ddad6d.png', NULL, NULL),
(12, 'Kargo', '<p>15</p>', NULL, NULL, NULL),
(13, 'Keywords', 'eticaret,oto bakım,kolonya,motocar', NULL, NULL, NULL),
(14, 'Açıklama', 'Motocar Oto Bakım Ürünleri', NULL, NULL, NULL),
(15, 'Yardım', '<h3>bu bir yardım sayfasıdır</h3><p>&nbsp;</p><p>dadsa dsadsa as dsa as sa</p><ul><li>dasdsadsadas as a</li><li>dadwewe we we w ew</li><li>dsadsad as dsad</li><li>dasdasdsa</li></ul><p>&nbsp;</p><p>dasdsadas dsa sa</p><p>&nbsp;ad ad<strong>d sad as as as da s</strong> sa as &nbsp; <a href=\"www.google.com\">www.google.com</a></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', NULL, 1, 1),
(16, 'Hakkımızda', '<h3>Bu sayfa Hakkımızda sayfasıdır</h3><p>das as&nbsp;</p><p>sad</p><p>asdsadasdasdasdas</p><ol><li>dsadsa</li><li>das</li><li>dsad</li><li>asdsa</li></ol><p>&nbsp;</p><p>&nbsp;</p>', NULL, 1, 2),
(17, 'Adres', '<p>Kastamonu Yolu Demir Çelik Kampüsü, 78050 Kılavuzlar Köyü/Karabük Merkez/Karabük</p>', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`Id`, `Title`, `Image`, `Url`, `IsActive`) VALUES
(1, 'Süper Fırsatlar', '11.jpg', 'http://www.m3hm3t.xyz/payidar/Urunler/SuperFirsatlar', 1),
(3, 'En Yeniler', '2.jpg', 'http://www.m3hm3t.xyz/payidar/Urunler/EnYeniler', 1),
(12, 'Çok Satanlar', '3.jpg', 'http://www.m3hm3t.xyz/payidar/Urunler/CokSatanlar', 1),
(14, 'Kolonyalar', '772ff546bbe984a9db73e5b3013c8527.jpg', 'http://www.m3hm3t.xyz/payidar/Urunler/Kolonya/16', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `Id` int(255) NOT NULL,
  `Email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `LastName` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `City` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Address` text COLLATE utf8_turkish_ci,
  `Authority` tinyint(255) DEFAULT '10',
  `Time` datetime DEFAULT NULL,
  `LastTime` datetime DEFAULT NULL,
  `LastIp` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Telephone` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `PostCode` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`Id`, `Email`, `Password`, `FirstName`, `LastName`, `City`, `Address`, `Authority`, `Time`, `LastTime`, `LastIp`, `Telephone`, `PostCode`, `Image`) VALUES
(1, 'Admin@admin.com', '111111', 'Admin', 'Motocar', NULL, 'asd', 100, '2017-11-13 17:45:18', '2017-11-13 17:45:22', '23232', '32323232323232', '32323232', 'fef57ed4321bd2b48e50c3044d438f29.jpg'),
(23, 'deneme@a.com', '222222', 'deneme2', 'user', NULL, 'dadadsadas', 10, NULL, NULL, NULL, '11111111111', '22222222', '56bf39f03aff1c308f3fd6de0aae7b0f.png'),
(24, 'mehmetzantur@gmail.com', '111111', 'Mehmet', 'Zantur', 'Antalya', 'dsadasr fdfsd fds sdfsd', 10, '2017-12-18 23:24:05', '2018-01-13 22:43:03', '78.163.37.48', '5365914107', '07050', '0de6f74da23b4cd9fa2be6e3e1e1008e.jpg'),
(25, 'z@z.com', '111111', 'qq', 'ww', NULL, 'dsa', 10, '2018-01-12 20:16:49', '2018-01-12 20:16:49', '::1', '111', '2222', NULL),
(26, 'c@c.cc', '111111', 'c', 'v', NULL, 'dfsa', 10, '2018-01-12 20:19:08', '2018-01-12 20:19:08', '::1', '3333', '343', NULL),
(27, 'vv@ff.xxx', '111111', 'fffffff', 'vvvvvv', 'Kars', 'dasdasdas', 10, '2018-01-12 20:26:47', '2018-01-12 20:26:47', '::1', '323232', '32', NULL),
(28, 's@s.com', '111111', 'eeeddd', 'rrr', 'Amasya', 'dsadsadsa', 10, '2018-01-13 22:23:34', '2018-01-13 22:40:11', '78.163.37.48', '4545545', '454554', NULL),
(29, 'okkes_karatas@parksuit.com', '123123', 'Mustafa', 'KARATAŞ', 'Adana', 'Merkezzzzzzzzzzzzzz patlıyor herkezzzzzzzzzzzzzzzzzzzzz', 10, '2018-01-13 22:26:42', '2018-01-13 22:28:50', '78.163.37.48', '0555 555 55 55', '460100', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `iller`
--
ALTER TABLE `iller`
  ADD PRIMARY KEY (`il_no`);

--
-- Tablo için indeksler `issue_question`
--
ALTER TABLE `issue_question`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `issue_reply`
--
ALTER TABLE `issue_reply`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- Tablo için AUTO_INCREMENT değeri `brand`
--
ALTER TABLE `brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `gallery`
--
ALTER TABLE `gallery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Tablo için AUTO_INCREMENT değeri `issue_question`
--
ALTER TABLE `issue_question`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Tablo için AUTO_INCREMENT değeri `issue_reply`
--
ALTER TABLE `issue_reply`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
