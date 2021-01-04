-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 07.01
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novelku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `created_at`, `updated_at`, `soft_delete`) VALUES
(1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'romance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Thriller', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'sci-fi', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'cartoon', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Novel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Drama', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 'anime', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre_follow`
--

CREATE TABLE `genre_follow` (
  `id_genre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `novel`
--

CREATE TABLE `novel` (
  `id_novel` int(11) NOT NULL,
  `judul_novel` varchar(255) NOT NULL,
  `file_cover` varchar(255) NOT NULL,
  `file_novel` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `tgl_terbit` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `novel_genre`
--

CREATE TABLE `novel_genre` (
  `id_novel` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_novel` int(11) NOT NULL,
  `isi_review` text NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `soft_delete` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_follow`
--

CREATE TABLE `user_follow` (
  `id_user` int(11) NOT NULL,
  `id_user_followed` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `soft_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `genre_follow`
--
ALTER TABLE `genre_follow`
  ADD PRIMARY KEY (`id_genre`,`id_user`);

--
-- Indeks untuk tabel `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id_novel`);

--
-- Indeks untuk tabel `novel_genre`
--
ALTER TABLE `novel_genre`
  ADD PRIMARY KEY (`id_novel`,`id_genre`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_follow`
--
ALTER TABLE `user_follow`
  ADD PRIMARY KEY (`id_user`,`id_user_followed`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `novel`
--
ALTER TABLE `novel`
  MODIFY `id_novel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_follow`
--
ALTER TABLE `user_follow`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
