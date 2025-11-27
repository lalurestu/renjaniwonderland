-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2025 pada 20.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_valley_rinjani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `route` varchar(255) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `min_age` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `image`, `title`, `duration`, `price`, `description`, `route`, `difficulty`, `min_age`) VALUES
(4, 'assets/images/tandem_rinjani.png', 'Tandem Paragliding at Mount Rinjani', '1 Hari, 1 Malam', '$100', 'Experience the majestic beauty of Mount Rinjani with our 3-day, 2-night trekking package. This journey takes you through lush forests and up to the stunning crater rim, offering breathtaking views of the turquoise Segara Anak lake. You\'ll spend a night camping under the stars, waking up to a spectacular sunrise. Perfect for adventurers seeking a rewarding and memorable challenge. This all-inclusive package covers an experienced guide, porters, and all necessary gear, ensuring a safe and unforgettable adventure', 'Sembalun-Pelawangan-Peak-Lake-Sembalun', 'Hard', '7 Years Old');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
