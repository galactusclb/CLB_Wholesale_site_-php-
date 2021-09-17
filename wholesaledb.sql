-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 07:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wholesaledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `Pid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `img_name` varchar(400) NOT NULL,
  `img_dir` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`Pid`, `Tid`, `img_name`, `img_dir`) VALUES
(3, 17, 'for-iphone-11-pro-max-xs-max-xr-8-7-plus-tempered-glass-samsung-m10-a10e-a20-lg-stylo-5-k40-screen-protector', 'img/products_img/for-iphone-11-pro-max-xs-max-xr-8-7-plus-tempered-glass-samsung-m10-a10e-a20-lg-stylo-5-k40-screen-protector.jpg'),
(4, 2, 'tempered-glass-for-iphone-x-xr-xs-max-iphone-7-8-plus-screen-protector-for-metropcs-models-samsung-j3-j7-prime-lg-q7-plus-stylo-4-alcatel-7', 'img/products_img/tempered-glass-for-iphone-x-xr-xs-max-iphone-7-8-plus-screen-protector-for-metropcs-models-samsung-j3-j7-prime-lg-q7-plus-stylo-4-alcatel-7.jpg'),
(10, 13, 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg', 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg'),
(11, 14, 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg', 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg'),
(12, 16, 'https://www.dhresource.com/300x300s/f2-albu-g7-M00-B2-F3-rBVaSVtWwYeAZ9ImAAOWsUscnV8453.jpg/teen-men-backpack-boys-school-bags-for-teenagers.jpg', 'https://www.dhresource.com/300x300s/f2-albu-g7-M00-B2-F3-rBVaSVtWwYeAZ9ImAAOWsUscnV8453.jpg/teen-men-backpack-boys-school-bags-for-teenagers.jpg'),
(13, 17, 'https://www.dhresource.com/260x260/f2/albu/g10/M00/24/F8/rBVaWV2K3gWAAcqbAAKB7dews4M935.jpg', 'https://www.dhresource.com/260x260/f2/albu/g10/M00/24/F8/rBVaWV2K3gWAAcqbAAKB7dews4M935.jpg'),
(14, 18, 'https://www.dhresource.com/260x260/f2/albu/g10/M00/B0/95/rBVaVlzVg1-AGa6FAAHG_5MxY_E775.jpg', 'https://www.dhresource.com/260x260/f2/albu/g10/M00/B0/95/rBVaVlzVg1-AGa6FAAHG_5MxY_E775.jpg'),
(15, 19, 'https://www.dhresource.com/260x260/f2/albu/g8/M01/9F/A5/rBVaV11NQ8SATmhDAAGKZz8s4zk738.jpg', 'https://www.dhresource.com/260x260/f2/albu/g8/M01/9F/A5/rBVaV11NQ8SATmhDAAGKZz8s4zk738.jpg'),
(16, 20, 'https://www.dhresource.com/260x260/f2/albu/g8/M01/9B/F0/rBVaVFwAtUqAIx9wAAopXSFivzw176.jpg', 'https://www.dhresource.com/260x260/f2/albu/g8/M01/9B/F0/rBVaVFwAtUqAIx9wAAopXSFivzw176.jpg'),
(17, 21, 'https://www.dhresource.com/200x200/f2/albu/g8/M01/EF/94/rBVaVFy9vY2Ab-LcAAKR2_qJ_bM451.jpg', 'https://www.dhresource.com/200x200/f2/albu/g8/M01/EF/94/rBVaVFy9vY2Ab-LcAAKR2_qJ_bM451.jpg'),
(19, 23, 'https://www.dhresource.com/200x200/f2/albu/g8/M00/CF/80/rBVaVFwY0reABpPwAAa0o2t4-EQ619.jpg', 'https://www.dhresource.com/200x200/f2/albu/g8/M00/CF/80/rBVaVFwY0reABpPwAAa0o2t4-EQ619.jpg'),
(20, 25, 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g7-M01-D8-AB-rBVaSlugBPWAUs2zAAHcHOJGv_E248.jpg/mara-039;s-dream-men-backpack-hiking-camping-bag-traveling-trekking-bag-tactical-back-pack-male-camouflage-rucksacks.jpg', 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g7-M01-D8-AB-rBVaSlugBPWAUs2zAAHcHOJGv_E248.jpg/mara-039;s-dream-men-backpack-hiking-camping-bag-traveling-trekking-bag-tactical-back-pack-male-camouflage-rucksacks.jpg'),
(21, 26, 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g5-M01-C6-40-rBVaJFjCS7uAQFWjAAG-hiExqJI852.jpg/local-lion-50l-waterproof-nylon-travel-backpack-hike-men-climb-bagpack-camp-mochilas-masculina-laptop-back-bags-rucksack-420.jpg', 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g5-M01-C6-40-rBVaJFjCS7uAQFWjAAG-hiExqJI852.jpg/local-lion-50l-waterproof-nylon-travel-backpack-hike-men-climb-bagpack-camp-mochilas-masculina-laptop-back-bags-rucksack-420.jpg'),
(22, 27, 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g8-M01-FE-98-rBVaVFy5ogCAYrXeAAKyL5VBN0M735.jpg/dropship-hot-selling-strings-canvas-leather-backpacks-back-pack-large-capacity-traveling-rucksacks-students-laptop-daypacks.jpg', 'https://www.dhresource.com/webp/m/0x0s/f2-albu-g8-M01-FE-98-rBVaVFy5ogCAYrXeAAKyL5VBN0M735.jpg/dropship-hot-selling-strings-canvas-leather-backpacks-back-pack-large-capacity-traveling-rucksacks-students-laptop-daypacks.jpg'),
(23, 28, 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwi87_SxusnlAhUEjuYKHfhoDFYQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.bbcgoodfood.com%2Frecipes%2Fcollection%2Fclassic-cake&psig=AOvVaw210j1Lts-e2Ms3JfLP-oAB&ust=1572712911634777', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwi87_SxusnlAhUEjuYKHfhoDFYQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.bbcgoodfood.com%2Frecipes%2Fcollection%2Fclassic-cake&psig=AOvVaw210j1Lts-e2Ms3JfLP-oAB&ust=1572712911634777'),
(24, 31, 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg', 'https://ld-prestashop.template-help.com/sale_one/img/p/1/4/2/142-home_default.jpg'),
(25, 32, 'img/products_img/7-SubCategory-Grid-View.jpg', 'img/products_img/7-SubCategory-Grid-View.jpg'),
(35, 40, '14145451_310185946002461_1114574726_n', 'img/products_img/14145451_310185946002461_1114574726_n.jpg'),
(36, 41, 'Dota 2 Drawing 9', 'img/products_img/dota-2-drawing-9.jpg'),
(38, 2, 'Tempered Glass For Iphone X Xr Xs Max Iphone 7 8 Plus Screen Protector For Metropcs Models Samsung J3 J7 Prime Lg Q7 Plus Stylo 4 Alcatel 8', 'img/products_img/tempered-glass-for-iphone-x-xr-xs-max-iphone-7-8-plus-screen-protector-for-metropcs-models-samsung-j3-j7-prime-lg-q7-plus-stylo-4-alcatel-8.jpg'),
(39, 2, 'Tempered Glass For Iphone X Xr Xs Max Iphone 7 8 Plus Screen Protector For Metropcs Models Samsung J3 J7 Prime Lg Q7 Plus Stylo 4 Alcatel 9', 'img/products_img/tempered-glass-for-iphone-x-xr-xs-max-iphone-7-8-plus-screen-protector-for-metropcs-models-samsung-j3-j7-prime-lg-q7-plus-stylo-4-alcatel-9.jpg'),
(40, 12, 'Asus Rog Zephyrus S Gx502g Waz123t Gaming Laptop Chenchen89 1910 10 F1769729_3', 'img/products_img/asus-rog-zephyrus-s-gx502g-waz123t-gaming-laptop-chenchen89-1910-10-F1769729_3.jpg'),
(42, 12, 'ROG_Strix_G_G731_GlacierBlue_06', 'img/products_img/ROG_Strix_G_G731_GlacierBlue_06.png'),
(47, 12, 'G731GW_promo2_650x447', 'img/products_img/g731GW_promo2_650x447.png'),
(49, 37, '25eed4107400b63f1b5550d0ece6ea0b', 'img/products_img/25eed4107400b63f1b5550d0ece6ea0b.jpg'),
(50, 37, 'ASUS VivoBook S14_S15_First VivoBook With An IR Camera For Facial Login And Up To Wi Fi 6 802', 'img/products_img/ASUS-VivoBook-S14_S15_First-VivoBook-with-an-IR-camera-for-facial-login-and-up-to-Wi-Fi-6-802.11ax-for-superfast-connections.png'),
(51, 37, 'ASUS VivoBook S14_S15_Frameless Four Sided NanoEdge Display With 88 Screen To Body Ratio For Immersive Viewing', 'img/products_img/ASUS-VivoBook-S14_S15_Frameless-four-sided-NanoEdge-display-with-88-screen-to-body-ratio-for-immersive-viewing.png'),
(52, 37, 'ASUS VivoBook S14_S15_The Worlds First Colorful Ultraportable With ScreenPad 2', 'img/products_img/ASUS-VivoBook-S14_S15_The-worlds-first-colorful-Ultraportable-with-ScreenPad-2.0.png'),
(53, 37, 'ASUS VivoBook S14_S15_Unique Color Blocking Design With A Tactile Textured Finish', 'img/products_img/ASUS-VivoBook-S14_S15_Unique-color-blocking-design-with-a-tactile-textured-finish.png'),
(69, 13, '144 Large_default', 'img/products_img/144-large_default.jpg'),
(70, 13, '145 Large_default', 'img/products_img/145-large_default.jpg'),
(71, 13, '146 Large_default', 'img/products_img/146-large_default.jpg'),
(75, 16, 'Teen Men Backpack Boys School Bags For Teenagers Back Pack Cristiano Ronaldo Backpacfashion Bookbags For Children Traveling (1)', 'img/products_img/teen-men-backpack-boys-school-bags-for-teenagers-back-pack-cristiano-ronaldo-backpacfashion-bookbags-for-children-traveling (1).png'),
(77, 16, 'Teen Men Backpack Boys School Bags For Teenagers Back Pack Cristiano Ronaldo Backpacfashion Bookbags For Children Traveling', 'img/products_img/teen-men-backpack-boys-school-bags-for-teenagers-back-pack-cristiano-ronaldo-backpacfashion-bookbags-for-children-traveling.jpg'),
(78, 16, 'Teen Men Backpack Boys School Bags For Teenagers Back Pack Cristiano Ronaldo Backpacfashion Bookbags For Children Traveling (2)', 'img/products_img/teen-men-backpack-boys-school-bags-for-teenagers-back-pack-cristiano-ronaldo-backpacfashion-bookbags-for-children-traveling (2).jpg'),
(79, 35, '42fcc0782566d13846725e60bbed796f', 'img/products_img/42fcc0782566d13846725e60bbed796f.jfif'),
(82, 42, '24e3741e874c4935126cdee58ca3646a', 'img/products_img/24e3741e874c4935126cdee58ca3646a.jpg'),
(83, 2, '14', 'img/products_img/14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_sold`
--

CREATE TABLE `product_sold` (
  `Sid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `uid` varchar(33) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `trackId` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sold`
--

INSERT INTO `product_sold` (`Sid`, `Tid`, `uid`, `amount`, `date`, `time`, `price`, `trackId`, `status`) VALUES
(7, 2, 'UA0001', 5, '2019/11/04', '07:17:57pm', 235, NULL, 'pending'),
(8, 37, 'chana', 3, '2019/11/05', '05:08:29am', 3040, 'T0010', 'finished'),
(9, 12, 'chana', 2, '2019/11/05', '05:08:36am', 1010, NULL, 'pending'),
(10, 2, 'chana', 18, '2019/11/05', '05:08:48am', 820, NULL, 'pending'),
(11, 1, 'UA0001', 1, '2019/11/05', '08:24:47pm', 0, '0', 'pending'),
(12, 1, 'UA0001', 1, '2019/11/05', '08:24:48pm', 0, '1', 'pending'),
(13, 1, 'UA0001', 1, '2019/11/05', '08:24:49pm', 60, NULL, 'delivering'),
(14, 1, 'UA0001', 1, '2019/11/05', '08:24:56pm', 60, 'T001', 'delivering'),
(15, 1, 'UA0001', 1, '2019/11/05', '08:25:37pm', 0, NULL, 'pending'),
(16, 2, 'chana', 3, '2019/11/06', '03:07:51am', 160, 'T002', 'delivering'),
(17, 2, 'ggg', 2, '2019/11/07', '06:11:05pm', 100, NULL, 'pending'),
(18, 19, 'man', 3, '2019/11/07', '06:12:38pm', 70, NULL, 'pending'),
(19, 2, 'man', 2, '2019/11/07', '09:25:39pm', 100, NULL, 'pending'),
(20, 1, 'man', 5, '2019/11/07', '09:25:39pm', 260, NULL, 'pending'),
(21, 17, 'man', 3, '2019/11/07', '09:25:39pm', 160, NULL, 'pending'),
(22, 16, 'ban', 10, '2019/11/07', '09:28:48pm', 200, NULL, 'pending'),
(23, 22, 'ban', 5, '2019/11/07', '09:28:48pm', 110, NULL, 'pending'),
(24, 18, 'ban', 4, '2019/11/07', '09:28:48pm', 90, NULL, 'pending'),
(25, 27, 'ban', 2, '2019/11/07', '09:28:48pm', 210, NULL, 'pending'),
(26, 12, 'bb', 3, '2019/11/07', '09:32:41pm', 1510, NULL, 'pending'),
(27, 21, 'bb', 4, '2019/11/07', '09:32:41pm', 90, NULL, 'pending'),
(28, 35, 'gf', 3, '2019/11/07', '10:08:18pm', 38.8, NULL, 'pending'),
(40, 35, '', 1, '2019/11/08', '07:20:09pm', 0, NULL, 'pending'),
(41, 1, 'chana', 3, '2019/11/08', '07:31:21pm', 160, NULL, 'pending'),
(42, 18, 'chana', 3, '2019/11/08', '07:31:21pm', 70, NULL, 'pending'),
(43, 17, 'UA0001', 2, '2019/11/08', '07:32:47pm', 109, NULL, 'pending'),
(44, 12, 'UA0001', 3, '2019/11/08', '07:32:47pm', 1510, NULL, 'pending'),
(45, 25, 'UA0001', 3, '2019/11/08', '07:32:47pm', 10, NULL, 'pending'),
(46, 17, 'chana', 2, '2019/11/09', '09:58:18am', 109, NULL, 'pending'),
(47, 12, 'chana', 3, '2019/11/09', '09:58:18am', 1510, NULL, 'pending'),
(48, 2, 'chana', 3, '2019/11/09', '09:58:18am', 145, NULL, 'pending'),
(49, 2, 'chana', 2, '2019/11/09', '10:08:56am', 100, NULL, 'pending'),
(50, 2, 'chana', 2, '2019/11/09', '10:09:02am', 100, NULL, 'pending'),
(51, 2, 'chana', 2, '2019/11/09', '10:09:22am', 100, NULL, 'pending'),
(52, 2, 'chana', 2, '2019/11/09', '10:10:07am', 100, NULL, 'pending'),
(53, 2, 'chana', 2, '2019/11/09', '10:11:01am', 100, NULL, 'pending'),
(54, 2, 'chana', 2, '2019/11/09', '10:12:01am', 100, NULL, 'pending'),
(55, 2, 'chana', 2, '2019/11/09', '10:15:11am', 100, NULL, 'pending'),
(56, 2, 'chana', 2, '2019/11/09', '10:48:02am', 1012, NULL, 'pending'),
(57, 2, 'chana', 2, '2019/11/09', '10:49:55am', 100, NULL, 'pending'),
(58, 2, 'chana', 4, '2019/11/09', '10:49:55am', 190, NULL, 'pending'),
(59, 2, 'chana', 3, '2019/11/09', '10:51:59am', 145, NULL, 'pending'),
(60, 12, 'chana', 1, '2019/11/09', '10:51:59am', 510, NULL, 'pending'),
(61, 1, 'chana', 6, '2019/11/09', '10:53:03am', 310, NULL, 'pending'),
(62, 12, 'chana', 3, '2019/11/09', '10:53:35am', 1510, NULL, 'pending'),
(63, 13, 'chana', 3, '2019/11/09', '10:54:08am', 70, NULL, 'pending'),
(64, 12, 'chana', 3, '2019/11/09', '11:33:34am', 1510, NULL, 'pending'),
(65, 14, '', 2, '2019/11/09', '05:43:55pm', 48, NULL, 'pending'),
(66, 12, 'UA0001', 1, '2019/11/09', '05:53:26pm', 0, NULL, 'pending'),
(67, 12, 'chana', 3, '2019/11/09', '05:54:11pm', 1510, NULL, 'pending'),
(68, 18, 'chana', 3, '2019/11/09', '05:54:29pm', 0, NULL, 'pending'),
(69, 14, 'UA0001', 2, '2019/11/09', '05:57:19pm', 48, NULL, 'pending'),
(70, 2, 'UA0001', 1, '2019/11/09', '05:57:19pm', 0, NULL, 'pending'),
(71, 12, 'UA0001', 2, '2019/11/09', '05:58:42pm', 1010, NULL, 'pending'),
(72, 1, 'asd', 3, '2019/11/09', '06:03:09pm', 160, NULL, 'pending'),
(73, 16, 'asd', 2, '2019/11/09', '06:09:10pm', 48, NULL, 'pending'),
(74, 14, '', 2, '2019/11/09', '06:09:28pm', 48, NULL, 'pending'),
(75, 12, 'GF', 2, '2019/11/09', '06:10:52pm', 1010, 't100098', 'delivering'),
(76, 1, 'bb', 2, '2019/11/09', '06:50:38pm', 110, NULL, 'pending'),
(77, 12, 'bb', 1, '2019/11/09', '06:50:38pm', 510, NULL, 'pending'),
(78, 35, 'bb', 1, '2019/11/09', '06:50:38pm', 19.6, NULL, 'pending'),
(79, 2, 'GF', 1, '2019/11/09', '06:54:51pm', 0, NULL, 'pending'),
(80, 2, 'GF', 1, '2019/11/09', '06:54:52pm', 0, NULL, 'pending'),
(81, 2, 'GF', 1, '2019/11/09', '06:54:53pm', 0, NULL, 'pending'),
(82, 2, 'GF', 1, '2019/11/09', '06:54:54pm', 0, NULL, 'pending'),
(83, 2, 'GF', 1, '2019/11/09', '06:54:58pm', 0, NULL, 'pending'),
(84, 2, 'GF', 1, '2019/11/09', '06:55:00pm', 55, NULL, 'pending'),
(85, 37, 'bb', 2, '2019/11/10', '02:09:20am', 1525, NULL, 'pending'),
(86, 2, 'chana', 2, '2019/11/10', '03:40:51am', 100, NULL, 'pending'),
(87, 2, 'bb', 1, '2019/11/10', '03:46:52am', 55, NULL, 'pending'),
(88, 2, 'chana', 1, '2019/11/10', '03:55:54am', 55, NULL, 'pending'),
(89, 1, 'chana', 3, '2019/11/10', '04:25:03am', 160, NULL, 'pending'),
(90, 1, 'chana', 2, '2019/11/10', '04:27:07am', 110, NULL, 'pending'),
(91, 2, 'GF', 2, '2019/11/10', '05:23:18am', 100, NULL, 'pending'),
(92, 12, 'chana', 1, '2019/11/10', '06:25:09am', 510, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviewitem`
--

CREATE TABLE `reviewitem` (
  `RId` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `sellerId` varchar(150) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewitem`
--

INSERT INTO `reviewitem` (`RId`, `Tid`, `sellerId`, `rating`, `review`) VALUES
(1, 12, 'chanaka', 2, 'sdffsd'),
(5, 2, 'chanaka', 1, 'fg'),
(6, 1, 'chanaka', 5, 'sd'),
(7, 13, 'chanaka', 4, 'dfg'),
(8, 14, 'chanaka', 4, 'sdfsdf'),
(9, 13, 'chanaka', 4, 'as'),
(10, 13, 'chanaka', 2, 'ssda'),
(11, 13, 'chanaka', 1, 'as'),
(12, 1, 'chanaka', 3, 'asax'),
(13, 2, 'chanaka', 4, 'dfgds'),
(14, 2, 'chanaka', 5, 'dfgds'),
(15, 2, 'chanaka', 3, 'dfgds'),
(16, 12, 'chanaka', 3, 'sdfsdf'),
(17, 12, 'chanaka', 5, 'sdfsdf'),
(18, 12, 'chanaka', 2, 'sdvs'),
(19, 12, 'chanaka', 2, 'dfc'),
(20, 2, 'chanaka', 2, 'asx'),
(21, 2, 'chanaka', 1, 'sad'),
(22, 2, 'chanaka', 5, 'Good seller fast shipping'),
(23, 16, 'chanaka', 3, 'Great service.â¤â¤'),
(24, 1, 'chanaka', 3, 'ascascccccccc ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `pass` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `pass`, `role`) VALUES
(1, 'chana', 'clb', 'admin'),
(5, 'asd', 'asd', 'user'),
(7, 'GF', 'SD', 'user'),
(11, 'lak', 'lak', 'user'),
(12, 'man', 'Man', 'user'),
(13, 'UA0001', 'u1', 'user'),
(14, 'bb', 'Bb', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wholesaleitem`
--

CREATE TABLE `wholesaleitem` (
  `Tid` int(11) NOT NULL,
  `sellerId` varchar(50) DEFAULT NULL,
  `itemName` varchar(350) NOT NULL,
  `itemType` varchar(100) NOT NULL,
  `itemPrice` varchar(100) NOT NULL,
  `itemRange` varchar(150) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `itemSold` int(11) DEFAULT NULL,
  `itemDiscount` double DEFAULT NULL,
  `cashdelivery` tinyint(1) NOT NULL,
  `itemStatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wholesaleitem`
--

INSERT INTO `wholesaleitem` (`Tid`, `sellerId`, `itemName`, `itemType`, `itemPrice`, `itemRange`, `itemQuantity`, `itemSold`, `itemDiscount`, `cashdelivery`, `itemStatus`) VALUES
(2, 'UA0001', 'High Quality LCD Screen For iPhone 8 LCD Display Touch', 'Mobile phone', '50,40,30,20', '100,200,300,400', 136, 274, 10, 0, NULL),
(12, 'UA0001', 'Asus Laptop', 'Mobile phone', '1000,950,925,820', '10,10,10,50', 91, 11, 50, 0, NULL),
(13, 'UA0001', 'Sweets and Treats Gift Basket', 'Mobile phone', '50,40,30,20', '0,0,0,0', 20, 2, 0, 0, NULL),
(14, 'UA0001', 'Samsung M10 A10E', 'Foods', '50,40,30,20', '0,0,0,0', 19, 4, 5, 0, NULL),
(16, 'UA0001', 'Teen Men Backpack Boys School Bags for Teenagers Back Pack', 'Bag', '50,40,30,20', '0,0,0,0', 40, 7, 5, 0, NULL),
(17, 'UA0001', 'For iPhone 11 Pro Max XS MAX XR Clear TPU Phone Case Shockproof Soft Transparent Back Cover For Samsung Note10 S9 S10 Plus', 'Mobile phone', '50,40,30,20', '10,20,30,0', 13, 10, 1, 0, NULL),
(18, 'UA0001', 'S10+ Type C Data Cable 1m 3ft OEM Quality Fast', 'Mobile phone', '50,40,30,20', '0,0,0,0', 64, 3, NULL, 0, NULL),
(19, 'UA0001', 'Premium SPACE Transparent Rugged Cell Phone Case', 'Mobile phone', '50,40,30,20', '0,0,0,0', 42, 3, NULL, 0, NULL),
(20, 'UA0001', 'For iPhone XS MAX XR X 8 7 Plus Retro Flip Stand Wallet', 'Mobile phone', '50,40,30,20', '0,0,0,0', 1009, 0, NULL, 0, NULL),
(21, 'UA0001', 'Back For Iphone XR XS MAX X 10 8 Plus Tempered Glass', 'Mobile phone', '50,40,30,20', '0,0,0,0', 234, 0, NULL, 0, NULL),
(23, 'UA0001', 'fgkkkkkkkkkkk', 'Mobile phone', '50,40,30,20', '0,0,0,0', 45, 0, NULL, 0, NULL),
(24, 'UA0001', 'gg', 'Foods', '50,40,30,20', '0,0,0,0', 454, 0, NULL, 0, NULL),
(25, 'UA0001', 'xxx', 'Bag', '0,0,0,0', '50,50,50,50', 200, 0, NULL, 0, NULL),
(26, 'UA0001', 'fff', 'Bag', '50,45,40,30', '10,20,30,45', 5555, 0, NULL, 0, NULL),
(27, 'UA0001', 'bag 1', 'Mobile phone', '100,100,100,100', '50,50,50,50', 1005, 0, 1, 0, NULL),
(28, 'UA0001', 'DFSVSD', 'Foods', '100,80,75,70', '5,10,20,40', 100, 0, NULL, 0, NULL),
(31, 'UA0001', 'sale', 'Foods', '12,12,12,12', '12,12,12,12', 12, 0, NULL, 0, NULL),
(32, 'UA0001', 'gggggggg', 'Foods', '12,12,12,12', '12,12,12,12', 12, 0, NULL, 0, NULL),
(35, 'UA0001', 'Hoodie Navi Yellow Black 2016 DOTA2 DOTA 2 CSGO CS LOL PUBG', 'Mobile phone', '12,12,12,12', '12,12,12,12', 11, 1, 20, 0, NULL),
(37, 'UA0001', 'Asus Vivobook S531fl / I7-8565u /Mx250, 2gb/8gb /512gb /15.6fhd ', 'Laptop', '1010,990,900,850', '2,4,8,20', 49, 3, 25, 0, NULL),
(40, 'asd', 'sd', 'Foods', '12,1212,12,12', '12,12,12,1212', 12, 0, NULL, 0, NULL),
(41, 'chana', 'gggggggg', 'Mobile phone', '12,12,12,12', '12,12,12,12', 9, 0, NULL, 0, NULL),
(42, 'chana', 'gf', 'Bag', '12,12,12,12', '12,12,12,12', 12, 0, NULL, 0, NULL),
(43, 'chana', 'asdasd', 'Mobile phone', '12,12,12,12', '12,12,12,12', 12, 0, NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `product_sold`
--
ALTER TABLE `product_sold`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `reviewitem`
--
ALTER TABLE `reviewitem`
  ADD PRIMARY KEY (`RId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wholesaleitem`
--
ALTER TABLE `wholesaleitem`
  ADD PRIMARY KEY (`Tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `product_sold`
--
ALTER TABLE `product_sold`
  MODIFY `Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `reviewitem`
--
ALTER TABLE `reviewitem`
  MODIFY `RId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wholesaleitem`
--
ALTER TABLE `wholesaleitem`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
