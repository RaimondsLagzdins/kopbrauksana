-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 06:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopbrauksana`
--
CREATE DATABASE IF NOT EXISTS `kopbrauksana` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kopbrauksana`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `reg_nr` varchar(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `seats` int(1) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `image_name` varchar(100) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `reg_nr`, `color`, `make`, `model`, `seats`, `owner_id`, `image_name`) VALUES
(1, 'lh470', 'zila', 'fiat', 'multipla', 1, 18, 'default.jpg'),
(4, 'gs6470', 'melna', 'opel', 'astra', 4, 18, 'default.jpg'),
(6, 'AB1234', 'brūna', 'audi', 'a4', 3, 23, 'default.jpg'),
(7, 'test', 'balta', 'bmw', '530', 4, 27, 'default.jpg'),
(8, 'lh470d', 'asdasd', 'asdasdas', 'dasdasdas', 4, 27, 'default.jpg'),
(9, 'gs6470asd', 'asdsad', 'dasdasda', 'dasdas', 2, 27, 'default.jpg'),
(10, 'ADDSAD', 'asdasd', 'asdasdasd', 'asdas', 4, 27, 'default.jpg'),
(11, 'abcdef', 'zoila', 'das', 'd', 3, 27, 'default.jpg'),
(12, 'gs6470', 'asd', 'dsada', 'dasd', 5, 27, 'default.jpg'),
(13, 'wedas', 'dasdas', 'dasd', 'ddd', 3, 27, 'default.jpg'),
(14, 'wedas', 'dasdas', 'dasd', 'ddd', 3, 27, 'default.jpg'),
(15, 'wedas', 'dasdas', 'dasd', 'ddd', 3, 27, 'default.jpg'),
(16, 'gs6470', 'melna', 'dacia', '530', 3, 27, 'default.jpg'),
(17, 'gs6470', 'asdasd', 'fiat', 'multipla', 3, 27, 'default.jpg'),
(18, 'lh470d', 'asd', 'ddddd', 'teast', 4, 18, 'default.jpg'),
(19, 'lh470d', 'asdasd', 'ddddddddddd', 'dddddd', 2, 29, 'audi1589361919.jpg'),
(20, 'asdsadas', 'dasdsadas', 'sadasdsad', 'asdasdsa', 2, 29, 'default.jpg'),
(21, 'dasddd', 'ddddd', 'dasdasd', 'saaaa', 5, 29, 'lambo1589360571.jpg'),
(22, 'ADDSAD', 'qweqweqe', 'eeqweqwe', 'qweqweqwe', 2, 29, 'audi1589360601.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `name` varchar(22) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`name`, `id`) VALUES
('Rīga', 10000),
('Daugavpils', 50000),
('Jelgava', 90000),
('Jēkabpils', 110000),
('Jūrmala', 130000),
('Liepāja', 170000),
('Rēzekne', 210000),
('Valmiera', 250000),
('Ventspils', 270000),
('Aizkraukles pilsēta', 320201),
('Jaunjelgavas pilsēta', 321007),
('Pļaviņu pilsēta', 321413),
('Alūksnes pilsēta', 360201),
('Apes pilsēta', 360805),
('Balvu pilsēta', 380201),
('Viļakas pilsēta', 381615),
('Bauskas pilsēta', 400201),
('Cēsu pilsēta', 420201),
('Līgatnes pilsēta', 421211),
('Ilūkstes pilsēta', 440807),
('Subates pilsēta', 440815),
('Dobeles pilsēta', 460201),
('Auces pilsēta', 460805),
('Gulbenes pilsēta', 500201),
('Aknīstes pilsēta', 560805),
('Viesītes pilsēta', 561815),
('Krāslavas pilsēta', 600201),
('Dagdas pilsēta', 601009),
('Kuldīgas pilsēta', 620201),
('Skrundas pilsēta', 621209),
('Aizputes pilsēta', 640605),
('Durbes pilsēta', 640807),
('Grobiņas pilsēta', 641009),
('Pāvilostas pilsēta', 641413),
('Priekules pilsēta', 641615),
('Limbažu pilsēta', 660201),
('Alojas pilsēta', 661007),
('Staiceles pilsēta', 661017),
('Ainažu pilsēta', 661405),
('Salacgrīvas pilsēta', 661415),
('Ludzas pilsēta', 680201),
('Kārsavas pilsēta', 681009),
('Zilupes pilsēta', 681817),
('Madonas pilsēta', 700201),
('Cesvaines pilsēta', 700807),
('Lubānas pilsēta', 701413),
('Varakļānu pilsēta', 701817),
('Ogres pilsēta', 740201),
('Ikšķiles pilsēta', 740605),
('Ķeguma pilsēta', 741009),
('Lielvārdes pilsēta', 741413),
('Preiļu pilsēta', 760201),
('Līvānu pilsēta', 761211),
('Viļānu pilsēta', 781817),
('Baldones pilsēta', 800605),
('Baložu pilsēta', 800807),
('Olaines pilsēta', 801009),
('Salaspils pilsēta', 801211),
('Saulkrastu pilsēta', 801413),
('Siguldas pilsēta', 801615),
('Vangažu pilsēta', 801817),
('Saldus pilsēta', 840201),
('Brocēnu pilsēta', 840605),
('Talsu pilsēta', 880201),
('Sabiles pilsēta', 880213),
('Stendes pilsēta', 880215),
('Valdemārpils pilsēta', 880217),
('Tukuma pilsēta', 900201),
('Kandavas pilsēta', 901211),
('Valkas pilsēta', 940201),
('Smiltenes pilsēta', 941615),
('Sedas pilsēta', 941813),
('Strenču pilsēta', 941817),
('Mazsalacas pilsēta', 961011),
('Rūjienas pilsēta', 961615),
('Piltenes pilsēta', 980213);

-- --------------------------------------------------------

--
-- Table structure for table `password_change`
--

CREATE TABLE `password_change` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSKEY` varchar(30) DEFAULT NULL,
  `TIME_CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_change`
--

INSERT INTO `password_change` (`ID`, `EMAIL`, `PASSKEY`, `TIME_CREATED`) VALUES
(1, 'test@test.lv', 'l9wZbqb9BHPZmuv6agMpHERTQGU88-', '2020-05-11 09:37:05'),
(2, 'test@test.lv', 'yvQZROROWPc5a6ev8AguwjE-ajLilD', '2020-05-11 09:37:38'),
(3, 'test@test.lv', 'aSTJscfvLNatfbEgnnd9k_B5lYmMZ0', '2020-05-11 09:41:01'),
(4, 'test@test.lv', 'jnP9SSCPxTAcn4GSdSarQLIhzpSjEK', '2020-05-11 09:41:13'),
(5, 'testasd@test.lv', 'OPk8wd6xnkr5WDyO9DWKG_LUOX3ySx', '2020-05-11 09:57:16'),
(6, 'test@test.lv', 'kqE7rU78V1HsOHXZ0d2zKy5CKQHMwy', '2020-05-11 09:59:19'),
(7, 'test@test.lv', 'XDU1Me3RALqn-E7XN6chotPoExdXAg', '2020-05-11 09:59:52'),
(8, 'test@test.lv', 'jAt0-UuNDrUuG8BNeV3iM2lI3tUzX-', '2020-05-11 10:00:11'),
(9, 'testst@test.lv', 'B7S1Fs2_lMvO7626rcmVVJh05rJwws', '2020-05-11 10:33:31'),
(10, 'test@test.lv', 'TsUI_XjOLiRk83LIQZLcy2jfQ1qKH1', '2020-05-11 10:50:36'),
(11, 'paroletest@paroletest.lv', 'HGu35ltpHtFQlI1qpvlL_cZlfwYn82', '2020-05-11 14:03:27'),
(12, 'paroletest@paroletest.lv', 'cGkoURz6llxrG7Ird-9Ljt-asWFB6-', '2020-05-11 14:04:46'),
(13, 'paroletest@paroletest.lv', 'asArtnDqKYj8343oC3CVuqGigNIg77', '2020-05-11 18:21:27'),
(14, 'raimondsl99@gmail.com', 'vVcTcMG77HYWK1hVFBtUjbmMkIcgX7', '2020-05-16 15:50:06'),
(15, 'raimondsl99@gmail.com', 'eeznKwe93Lwg0eXYh_BHtv0Q383vGB', '2020-05-16 15:51:19'),
(16, 'raimondsl99@gmail.com', 'TRbYUVuCT4mzesTXGC9ScUsL9wJV5m', '2020-05-16 15:52:03'),
(17, 'raimondsl99@gmail.com', 'ujja9HpuPRT0CO_IGcl0diQ_m1Ze5F', '2020-05-16 15:54:31'),
(18, 'raimondsl99@gmail.com', 'chQyvUK2JUYR9sCElFSYyZZUpeLesP', '2020-05-16 15:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `ID` int(11) NOT NULL,
  `CITY_FROM_ID` int(11) NOT NULL,
  `CITY_TO_ID` int(11) NOT NULL,
  `DRIVER_ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `NOTES` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ID`, `CITY_FROM_ID`, `CITY_TO_ID`, `DRIVER_ID`, `DATE`, `CAR_ID`, `NOTES`) VALUES
(1, 10000, 10000, 18, '2020-03-25 00:00:00', 1, ''),
(4, 10000, 10000, 18, '2020-03-05 00:00:00', 1, ''),
(5, 10000, 10000, 18, '2020-03-13 00:00:00', 1, ''),
(6, 10000, 10000, 18, '2020-03-02 00:00:00', 1, ''),
(7, 10000, 10000, 18, '2020-02-11 00:00:00', 1, ''),
(21, 270000, 700807, 23, '2020-05-14 00:00:00', 6, 'Brauciens bez pieturvietām'),
(22, 661405, 661405, 18, '2020-05-09 00:00:00', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(23, 661405, 661405, 18, '2020-05-15 00:00:00', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(24, 661405, 661405, 18, '2020-05-09 00:00:00', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(25, 460201, 661405, 18, '2020-05-22 00:00:00', 1, ' Lorem ipsum dolor sit amet, consectetur adipiscing em tortor massa, bibendum vel mattis non, varius ac eros. Nunc urna enim, consequat interdum leo sed, blandit vulputate nisi. Phasellus ut libero non orci laoreet sagittis a ut justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis magna lacus, sollicitudin eu risus et, tempor ullamcorper erat. Etiam et augue lacinia dolor.'),
(26, 460805, 380201, 18, '2020-05-14 00:00:00', 1, ''),
(27, 640605, 270000, 18, '2020-05-12 00:00:00', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(28, 661405, 661405, 18, '2020-05-12 00:00:00', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(29, 661405, 800807, 27, '2020-05-12 00:00:00', 17, 'asdasd asdsad'),
(30, 661405, 661405, 29, '2020-05-15 00:00:00', 21, ''),
(31, 661405, 400201, 29, '2020-05-14 00:00:00', 22, ''),
(32, 460805, 250000, 18, '2020-05-17 00:00:00', 4, ''),
(33, 661405, 661405, 18, '2020-05-21 00:00:00', 1, ''),
(34, 661405, 661405, 18, '2020-05-29 00:00:00', 1, ''),
(35, 661405, 661405, 18, '2020-05-30 08:37:18', 1, ''),
(36, 661405, 661405, 18, '2020-06-03 00:00:00', 1, ''),
(37, 661405, 661405, 18, '2020-05-24 00:00:00', 1, ''),
(38, 661405, 661405, 18, '2020-05-30 03:12:29', 1, ''),
(39, 661405, 661405, 18, '2020-05-27 00:00:00', 1, ''),
(40, 661405, 661405, 18, '2020-05-26 00:00:00', 1, ''),
(41, 661405, 661405, 18, '2020-05-24 00:00:00', 1, ''),
(42, 661405, 661405, 18, '2020-05-27 00:00:00', 1, ''),
(43, 661405, 661405, 18, '2020-05-30 00:00:00', 1, ''),
(44, 661405, 661405, 18, '2020-05-18 00:00:00', 1, ''),
(45, 661405, 880215, 18, '1970-01-01 01:01:00', 1, ''),
(46, 661405, 661405, 18, '2020-05-30 19:05:00', 1, ''),
(47, 661405, 661405, 18, '2020-05-30 19:05:00', 1, ''),
(48, 661405, 661405, 18, '2020-05-30 15:05:00', 1, ''),
(49, 661405, 661405, 18, '2020-05-30 19:05:00', 1, ''),
(50, 661405, 661405, 18, '2020-05-30 10:30:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `SURNAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(200) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `REG_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ACCESSTOKEN` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `AUTHKEY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ROLE` int(4) DEFAULT NULL,
  `BLOCKED` int(1) NOT NULL DEFAULT 0,
  `PHONE` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `NAME`, `SURNAME`, `PASSWORD`, `EMAIL`, `REG_DATE`, `ACCESSTOKEN`, `AUTHKEY`, `ROLE`, `BLOCKED`, `PHONE`) VALUES
(18, 'raimonds', 'raimonds', 'raimonds', '$argon2i$v=19$m=65536,t=4,p=1$WWFZY05BNk93bkE0R0ZmQQ$oodMEiuXitZRQ6l2KIw+6oapdzyjuT8YpV9XOMuWvnA', 'raimonds', '2020-05-16 12:18:47', '$2y$10$Jciov2I8Q2RLXuXdnbugl.cuM7bycOtyNsOM3cx75J2wmbGd/F8y6', '8ea95b8208d1e271447333a613655ca4', 20, 0, ''),
(19, 'admin', 'admin', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$VEV1WHY5MGVCOThINENDQw$MHUQt567unXeNW/y9wqsUvEawvNi7gBdt7+A71uG8Ag', 'admin', '2019-12-05 17:51:49', '$2y$10$uvqb/X02O8.sooidx3qxY.bzMw3qg2zuyZXmV0oqoJDvr9gLVgsZG', 'debf6aab389bd2c2d2c3d00a1c9ae366', NULL, 0, ''),
(22, 'vaditajs2', 'vaditajs2', 'vaditajs2', '$argon2i$v=19$m=65536,t=4,p=1$aWMwTDJmM3VKYlkyLkREUQ$XHc5EmFJJrqHM5WydE8AQ/mDcC/EQlCf+vm5fgJX9Nc', 'vaditajs2@vaditajs2.lv', '2020-03-22 13:04:50', '$2y$10$OnHOuxFbfPYTjKzXaMRTC.Ua16Kbc9Kg9RnqbD84Hvt3Cr5S.BnkC', 'f0d71b4a98d80b85f9d791b540e2242f', 10, 0, ''),
(23, 'raimonds2', 'raimonds2', 'raimonds2', '$argon2i$v=19$m=65536,t=4,p=1$YmFGdjcxc3JQV2g5MUZzcg$TVHXcbPHUfP6DmeFh33coNLUHY2bXLrzFFNdPZUVOSg', 'raimonds2@raimonds2.lv', '2020-05-16 12:34:44', '$2y$10$ZdWNPowUGVIQcbQ3H37LEON//bl9MrdQbUYOxjz5Y1VuY8Kk./5kC', '2331e1ccb14c8b5701302835a18164a0', 10, 0, ''),
(25, 'raimonds23', 'Raimonds', 'raimonds2', '$argon2i$v=19$m=65536,t=4,p=1$T2MydkFLcmxCVWdZbU5wNg$et+Zq4m/f4hlIbF3EeiVlVjdLO8lg9NUEojHGkkkWQA', 'epasts@epasssts.lv', '2020-05-10 09:04:56', '$2y$10$bhfo4xNwBTtZPfIZqqc6du2VM.0rj4.b9kJJFOJ6/EJHaNj2cf4CW', '777d5113ec3dad4191f3b3608f052a2e', 10, 0, ''),
(26, 'test123', 'test123', 'test123', '$argon2i$v=19$m=65536,t=4,p=1$WGdrODJLb3VwYTE1RkU0dA$NCw9P/nieuMYjsQz6Pe59n5YmrUxB+wdEnPAzh/xJsU', 'test123@test123.lv', '2020-05-11 05:19:03', '$2y$10$bh5M2WefAdnfUhk.35Owr.CaxCCsemf4Y1ldn1zsPGdDn31VVj6Dy', 'aa82263eeebafb210612d685d68b4f1f', 10, 0, ''),
(27, 'paroletest', 'paroletest', 'paroletest', '$argon2i$v=19$m=65536,t=4,p=1$VEZuVWNEV25SOUlQMEZjQQ$dptkWlLC6tqqUTP1kV7uNrqq7jYcwW8dcvr+Lc+VDk0', 'paroletest@paroletest.lv', '2020-05-11 15:25:36', '$2y$10$0LfKezzAm7Ib7MPMPzpSieHVu6GR1CgP0sJGyhiPwr0.Qn3JFbqD.', '82e9c1db86ecec98ac2b0e3ef1e860f9', 10, 0, ''),
(28, 'rasdasdsas', 'rasdasdsas', 'rasdasdsas', '$argon2i$v=19$m=65536,t=4,p=1$QlBNWEdrNjdrWW5Pd0loTQ$Xlw/3tk/ci0QQXjSmyrrTDy1O8e4mP3+I3Z/9azWqiw', 'rasdasdsas@asd.lv', '2020-05-12 06:02:05', '$2y$10$9XPIIdiqlC.pCKX7fusqO.zXX1oIC8Qf0zTypyeDhKwbmughcMrse', '439f9ac6888fe5f5326900eaa5c425f8', 10, 0, ''),
(29, 'lietotajs23', 'lietotajs23', 'lietotajs23', '$argon2i$v=19$m=65536,t=4,p=1$dG1vY0lNY3NDcW1qZXZwTA$DRwO5yYUxl8qaqyT3Lh7/byuaDE30HQHXKlSmPM4nuY', 'lietotajs23@lietotajs23.lv', '2020-05-12 19:37:05', '$2y$10$LVwsZgSVG8EQVFf0.nevvOUmFGth4.72dAqT4JzgAaz/mX9gw8hYW', '4d3ca4d135128023fa8c183c4f022a29', 10, 0, ''),
(30, 'raimonds123', 'raimonds123', 'raimonds123', '$argon2i$v=19$m=65536,t=4,p=1$UHVjbGtSZDFyWU1DZm5rcg$Zj/HHA7Ejs0EoiKip4Eb2yILz2NxWfYOqGabr3c+sQo', 'raimondsl99@gmail.com', '2020-05-16 11:49:47', '$2y$10$pldCZP1j4dQtF8z180pw8ewMWHG7odB9BR4JBf0ESeMgvtyzX4bq6', 'b5d46f9996c596a28133705bd9f5358c', 10, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_rides`
--

CREATE TABLE `user_rides` (
  `USER_ID` int(11) NOT NULL,
  `RIDE_ID` int(11) NOT NULL,
  `JOIN_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `CANCELLED` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_rides`
--

INSERT INTO `user_rides` (`USER_ID`, `RIDE_ID`, `JOIN_DATE`, `CANCELLED`) VALUES
(18, 21, '2020-05-05 12:11:01', 0),
(23, 22, '2020-05-08 12:58:55', 0),
(23, 25, '2020-05-18 13:22:32', 1),
(23, 32, '2020-05-16 14:36:57', 1),
(23, 34, '2020-05-21 21:47:51', 1),
(23, 36, '2020-05-21 21:49:12', 0),
(23, 37, '2020-05-21 21:48:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `ID` int(11) NOT NULL,
  `USERTYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_change`
--
ALTER TABLE `password_change`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CITY_FROM_ID` (`CITY_FROM_ID`),
  ADD KEY `CITY_TO_ID` (`CITY_TO_ID`),
  ADD KEY `CAR_ID` (`CAR_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_rides`
--
ALTER TABLE `user_rides`
  ADD PRIMARY KEY (`USER_ID`,`RIDE_ID`),
  ADD KEY `RIDE_ID` (`RIDE_ID`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980295;

--
-- AUTO_INCREMENT for table `password_change`
--
ALTER TABLE `password_change`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`CITY_FROM_ID`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`CITY_TO_ID`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `rides_ibfk_3` FOREIGN KEY (`CAR_ID`) REFERENCES `car` (`id`);

--
-- Constraints for table `user_rides`
--
ALTER TABLE `user_rides`
  ADD CONSTRAINT `user_rides_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_rides_ibfk_2` FOREIGN KEY (`RIDE_ID`) REFERENCES `rides` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
