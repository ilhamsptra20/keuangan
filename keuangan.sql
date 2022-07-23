-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2022 pada 05.46
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_catatan`
--

CREATE TABLE `tbl_catatan` (
  `id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jenis` tinyint(1) NOT NULL,
  `nominal` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_catatan`
--

INSERT INTO `tbl_catatan` (`id`, `user_id`, `keterangan`, `jenis`, `nominal`, `saldo`, `tanggal`) VALUES
(2, 1, 'keluar', 0, 100000, 9900000, '2022-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`id`, `user_id`, `saldo`) VALUES
(1, 9, 0),
(2, 1, 9900000),
(3, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'ilham', 'ilham@email.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'saputra', 'saputra@email.com', '8d33fa88d7bd2018e822f4d29488a910');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD CONSTRAINT `tbl_catatan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
