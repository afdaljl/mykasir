-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2024 pada 05.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_rpl2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `detailID` int(11) UNSIGNED NOT NULL,
  `penjualanID` int(11) NOT NULL,
  `produkID` int(11) NOT NULL,
  `jumlahProduk` int(11) NOT NULL,
  `SubTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-01-04-000926', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1704328472, 1),
(2, '2024-01-04-003818', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1704329809, 2),
(3, '2024-01-04-003829', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1704329809, 2),
(4, '2024-01-04-005757', 'App\\Database\\Migrations\\DetailPenjualan', 'default', 'App', 1704330191, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelangganID` int(11) UNSIGNED NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(1, 'Afdal Djuliansyah', 'Kesamben', '082267543986'),
(10, 'cello', 'jsjskdjsk', '6327653426'),
(12, 'piki', 'turus', '755355425748'),
(13, 'mei', 'kalipare', '7665343'),
(14, 'jhjvjhv', 'jhvhvvvk', '65758758'),
(15, 'saya', 'mana', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualanID` int(11) UNSIGNED NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produkID` int(11) UNSIGNED NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produkID`, `NamaProduk`, `Harga`, `Stok`) VALUES
(20, 'indomie', '3000.00', 100),
(24, 'sikat gigi', '5000.00', 10),
(25, 'sampo kucing', '9000.00', 11),
(27, 'pasta gigi', '10000.00', 20),
(28, 'rinso', '1000.00', 9);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`detailID`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualanID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produkID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `detailID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelangganID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualanID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produkID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
