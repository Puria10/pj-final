-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2025 at 04:23 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footballnews`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_asli`
--

DROP TABLE IF EXISTS `news_asli`;
CREATE TABLE IF NOT EXISTS `news_asli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(2555) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news_asli`
--

INSERT INTO `news_asli` (`id`, `title`, `text`, `imageurl`) VALUES
(36, 'فوتبال ایران', '                لیگ برتر خلیج فارس یا لیگ برتر فوتبال ایران مسابقات لیگ حرفه‌ای و بالاترین سطح باشگاهی لیگ فوتبال ایران است که پس از جام آزادگان آغاز به کار کرد و در حال حاضر با حضور ۱۶ تیم برگزار می‌شود. نخستین دورهٔ این رقابت‌ها در تاریخ ۱۱ آبان ۱۳۸۰ با حضور ۱۴ تیم برگزار شد.\r\n                در این لیگ طی بیست و دو دوره گذشته، تیم‌های پرسپولیس (هشت بار)، سپاهان (پنج بار)، استقلال (چهار بار)، فولاد خوزستان (دو بار) و پاس تهران، سایپا و استقلال خوزستان (هر کدام یک بار) به مقام قهرمانی رسیده‌اند.\r\n                در رده‌بندی اعلام شده از سوی فدراسیون بین‌المللی تاریخ و آمار فوتبال در سال ۲۰۱۲ این لیگ، به عنوان «سی و ششمین لیگ قدرتمند جهان» و «چهارمین لیگ قدرتمند آسیا» انتخاب شده‌است. افزون بر این در رده‌بندی اعلام شده توسط این فدراسیون، لیگ برتر ایران رده چهل و هفتم جهان و چهارم آسیا را در قرن ۲۱ میلادی (۲۰۰۱ تا ۲۰۱۲) کسب کرده‌است.\r\n', 'images/IPL_Logo.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `news_asli1`
--

DROP TABLE IF EXISTS `news_asli1`;
CREATE TABLE IF NOT EXISTS `news_asli1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `text` text NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news_asli1`
--

INSERT INTO `news_asli1` (`id`, `title`, `text`, `imageurl`) VALUES
(4, 'نقل و انتقالات گران‌قیمت تابستان 2023', '        در تابستان 2024، دنیای فوتبال شاهد جابجایی‌های بزرگ و نقل و انتقالات گران‌قیمت بود که تغییرات زیادی در ترکیب تیم‌ها به وجود آورد.         در این صفحه به بررسی مهم‌ترین و پرهزینه‌ترین نقل و انتقالات پرداخته‌ایم.', 'images/transf.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phonenumber` int NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `phonenumber`, `email`, `role`) VALUES
(77, 'pp', 'pp', 256252, 'q@gamil.com', 'user'),
(78, 'ضض', 'ظزظزظسز', 624678668, 's@gamil.com', 'user'),
(79, 'pp', 'ppp', 256252, 'q@gamil.com', 'user'),
(80, 'pp', '11', 256252, 'q@gamil.com', 'user'),
(81, 'puria', '12', 256252, 'q@gamil.com', 'user'),
(75, 'admin_user', '123456789', 0, '', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
