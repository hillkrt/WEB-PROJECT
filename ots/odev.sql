-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Oca 2024, 14:02:55
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odev`
--

CREATE TABLE `odev` (
  `odev_uyeid` int(11) NOT NULL,
  `odev_id` int(11) NOT NULL,
  `odev_ad` text NOT NULL,
  `odev_tgun` int(2) NOT NULL,
  `odev_tay` int(2) NOT NULL,
  `odev_tyil` int(4) NOT NULL,
  `odev_onem` enum('1','0') NOT NULL DEFAULT '0',
  `odev_vurgu` enum('1','0') NOT NULL DEFAULT '0',
  `odev_vurgurenk` varchar(11) NOT NULL,
  `odev_yapildi` enum('1','0') NOT NULL DEFAULT '0',
  `odev_sil` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `uye_id` int(11) NOT NULL,
  `uye_ad` varchar(100) NOT NULL,
  `uye_soyad` varchar(100) NOT NULL,
  `uye_kadi` varchar(50) NOT NULL,
  `uye_email` text NOT NULL,
  `uye_sifre` varchar(50) NOT NULL,
  `uye_no` int(4) NOT NULL,
  `uye_rutbe` varchar(50) NOT NULL DEFAULT 'uye'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`uye_id`, `uye_ad`, `uye_soyad`, `uye_kadi`, `uye_email`, `uye_sifre`, `uye_no`, `uye_rutbe`) VALUES
(1, 'Yusuf', 'Abacık', 'Nepcen', 'yusufabacik@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, 'superadmin'),
(3, 'hilal', 'kartal', 'hk', 'hk@gk.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, 'uye');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odev`
--
ALTER TABLE `odev`
  ADD PRIMARY KEY (`odev_id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `odev`
--
ALTER TABLE `odev`
  MODIFY `odev_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
