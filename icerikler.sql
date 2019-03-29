-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Mar 2019, 19:20:10
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerikler`
--

CREATE TABLE `icerikler` (
  `icerik_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `seo` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `metin` varchar(5000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `icerikler`
--

INSERT INTO `icerikler` (`icerik_tarih`, `id`, `seo`, `img`, `konu`, `metin`) VALUES
('2019-03-26 22:58:08', 1, 'ornek-icerik-buraya-tikla-yaziya-git', 'http://localhost/tarihi_kategori/img/likes.jpg', 'Örnek İçerik Buraya Tıkla Yazıya Git', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d '),
('2018-04-26 22:58:08', 2, 'web-site-nasil-yapilir', 'http://localhost/tarihi_kategori/img/site.jpg', 'Web Site Nasıl Yapılıraaaa', 'Kontrol yazısıdır dikkate almayınız. Deneme Devam '),
('2018-03-26 22:58:08', 4, 'ornek', 'http://localhost/tarihi_kategori/img/likes.jpg', 'ornek', 'Örnek yazı.Örnek yazı.Örnek yazı.Örnek yazı.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `icerikler`
--
ALTER TABLE `icerikler`
  ADD PRIMARY KEY (`id`),
