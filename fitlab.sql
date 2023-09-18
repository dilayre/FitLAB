-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Haz 2023, 17:41:28
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `fitlab`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diyet`
--

CREATE TABLE `diyet` (
  `kalori` int(11) NOT NULL,
  `sabah` text NOT NULL,
  `oglen` text NOT NULL,
  `aksam` text NOT NULL,
  `rand` text NOT NULL,
  `hedef` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `diyet`
--

INSERT INTO `diyet` (`kalori`, `sabah`, `oglen`, `aksam`, `rand`, `hedef`) VALUES
(548, 'Açık Çay(şekersiz)<br>\n1 tane haşlanmış yumurta <br> \n1 ince dilim ekmek <br>\nDomates, salatalık, yeşillik (serbest)', '3 köfte büyüklüğü kadar et/tavuk/hindi/balık<br>\n1 ince dilim ekmek<br>\n4 yemek kaşığı yoğurt <br>\nSınırsız yağsız salata <br>', 'sebze yemeği <br>\nbulgur pilavı <br>\n2 ince dilim ekmek <br>\nSalata (serbest) <br>', '1', 'ver'),
(564, 'Açık çay (şekersiz)\r\n2 tane haşlanmış yumurta\r\n4-5 adet zeytin\r\nDomates, salatalık, limonlu nane-maydanoz', '6-8 yemek kaşığı kabak sote\r\n1 ince dilim ekmek \r\n4 yemek kaşığı yoğurt veya 2 su bardağı ayran', '10 yemek kaşığı lor peynirli, nohut veya mercimek salatası\r\n200 ml ayran', '2', 'ver'),
(1142, '1 dilim peynir\r\n1 adet yumurta (menemen veya omlet veya haşlama)\r\n5-6 adet zeytin veya 1 tatlı kaşığı zeytin ezmesi\r\n1 tatlı kaşığı bal veya reçel veya pekmez\r\n1 tatlı kaşığı tereyağı veya kaymak\r\n3-4 dilim ekmek\r\n1 bardak süt', '1 porsiyon ızgara kırmızı et veya tavuk veya balık\r\n1 porsiyon pilav veya makarna veya börek\r\n1 kase kaymaksız yoğurt\r\n2 dilim ekmek\r\n1 porsiyon tatlı', '1 kase çorba\r\n1 porsiyon etli sebze yemeği veya etli kuru baklagil yemeği\r\n1 porsiyon pilav veya makarna veya börek\r\n1 kase kaymaksız yoğurt\r\n2 dilim ekmek\r\n1 porsiyon tatlı', '1', 'al'),
(1256, '1 yumurta ile hazırlanmış kaşarlı omlet\r\n1 tane simit\r\nLimonlu zeytin\r\n1 tane domates\r\n2 tatlı kaşığı bal, tereyağı', '1 adet yumurtalı peynirli pide\r\n1 kase cacık\r\nZeytinyağlı havuç.', '1 tabak kıymalı mercimek\r\n1 adet peynirli pide\r\n1 bardak limonata\r\nMaydanozlu soğanlı ve limonlu salata.', '2', 'al');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `signup`
--

CREATE TABLE `signup` (
  `Ad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `Soyad` text NOT NULL,
  `antrenor` text NOT NULL,
  `cinsiyet` text NOT NULL,
  `boy` text NOT NULL,
  `kilo` text NOT NULL,
  `yas` text NOT NULL,
  `hedef` text NOT NULL,
  `email` text NOT NULL,
  `mailonay` text NOT NULL,
  `username` text NOT NULL,
  `sifre` text NOT NULL,
  `tarih` text NOT NULL,
  `yetki` text NOT NULL,
  `diyet` text NOT NULL,
  `degisiklik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `diyet`
--
ALTER TABLE `diyet`
  ADD UNIQUE KEY `id` (`kalori`,`sabah`,`oglen`,`aksam`,`rand`,`hedef`) USING HASH;

--
-- Tablo için indeksler `signup`
--
ALTER TABLE `signup`
  ADD UNIQUE KEY `Ad` (`Ad`) USING HASH,
  ADD UNIQUE KEY `Ad_2` (`Ad`,`Soyad`,`email`,`username`,`sifre`,`tarih`,`yetki`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
