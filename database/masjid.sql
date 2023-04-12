-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2021 pada 09.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pemasukan`
--

CREATE TABLE `jenis_pemasukan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pemasukan`
--

INSERT INTO `jenis_pemasukan` (`id`, `jenis`) VALUES
(1, 'Keropak Masjid'),
(2, 'Donatur'),
(3, 'Sumbangan Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id`, `jenis`) VALUES
(1, 'Pembangunan/Renovasi Masjid'),
(2, 'Operasional Masjid'),
(3, 'Santunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(3) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal`, `bulan`, `tahun`, `jenis`, `uraian`, `jumlah`, `status`) VALUES
(1, '29', '06', '2021', '2', 'Donatur dari Hamba Allah', '17000000', 'aktif'),
(2, '1', '07', '2021', '3', 'Sumbangan lain', '3000000', 'aktif'),
(3, '2', '07', '2021', '2', 'Santunan Anak Yatim', '7000000', 'hapus'),
(4, '04', '07', '2021', '3', 'Sumbangan dari pengusaha', '50000000', 'aktif'),
(5, '04', '07', '2021', '2', 'Donasi dari Youtuber', '12000000', 'aktif'),
(6, '04', '07', '2021', '', '', '', 'hapus'),
(7, '04', '07', '2021', '', '', '', 'hapus'),
(8, '04', '07', '2021', '2', 'Tes', '1', 'hapus'),
(9, '04', '07', '2021', '2', 'tes', '12', 'hapus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(3) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `bulan`, `tahun`, `jenis`, `uraian`, `jumlah`, `status`) VALUES
(1, '29', '06', '2021', '2', 'Gaji Imam', '2000000', 'aktif'),
(2, '1', '07', '2021', '1', 'renovasi', '15000000', 'aktif'),
(3, '3', '07', '2021', '2', 'Santunan Anak Yatim', '7000000', 'aktif'),
(4, '04', '07', '2021', '2', 'tes', '1', 'hapus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `last_login`) VALUES
(1, 'Ashif Ahmad Hakim', 'ashifahmadhakim@gmail.com', '$2y$10$1naFIkA06dOeZUq.Zd9CIub5T4veaVxZeigNlylHmRav9Nhctv6FK', 'admin', '2021-07-07 14:46:00'),
(2, 'Fahmi', 'fahmi@gmail.com', '$2y$10$1naFIkA06dOeZUq.Zd9CIub5T4veaVxZeigNlylHmRav9Nhctv6FK', 'user', '2021-07-03 12:09:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_pemasukan`
--
ALTER TABLE `jenis_pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_pemasukan`
--
ALTER TABLE `jenis_pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
