-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2023 pada 08.41
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logoutlet`
--

CREATE TABLE `tb_logoutlet` (
  `id_log_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `nama_outletbaru` varchar(100) DEFAULT NULL,
  `alamat_outlet` text NOT NULL,
  `alamat_outletbaru` text DEFAULT NULL,
  `tlp_outlet` varchar(15) NOT NULL,
  `tlp_outletbaru` varchar(15) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_logoutlet`
--

INSERT INTO `tb_logoutlet` (`id_log_outlet`, `nama_outlet`, `nama_outletbaru`, `alamat_outlet`, `alamat_outletbaru`, `tlp_outlet`, `tlp_outletbaru`, `created_by`, `created_at`) VALUES
(48, 'Laundry Dian', 'Laundry Dian', 'Jln. Rancabentang No. 205', 'Jln. Rancabentang No. 208', '089786675467', '089786675467', '', '2023-03-18 06:54:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logpaket`
--

CREATE TABLE `tb_logpaket` (
  `id_logpaket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `nama_paketbaru` varchar(100) DEFAULT NULL,
  `harga_paket` int(100) NOT NULL,
  `harga_paketbaru` int(100) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_logpaket`
--

INSERT INTO `tb_logpaket` (`id_logpaket`, `nama_paket`, `nama_paketbaru`, `harga_paket`, `harga_paketbaru`, `created_by`, `created_at`) VALUES
(5, 'Tas', 'Tas', 15000, 15000, '', '2023-03-18 06:56:18'),
(6, 'Tas', 'Tas', 15000, 15000, '', '2023-03-18 06:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tlp_member` varchar(15) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `tlp_member`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(80, 'member2', 'Jln. Mawar', 'Pria', '08768955678', 'AdminAnnisa', NULL, '2023-03-18 06:56:52', '2023-03-18 06:56:52'),
(81, 'member3', 'Jln. Melati', 'Wanita', '089786675436', 'AdminAnnisa', NULL, '2023-03-18 07:06:18', '2023-03-18 07:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `tlp_outlet` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `tlp_outlet`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(32, 'Laundry Dian', 'Jln. Rancabentang No. 208', '089786675467', 1, 'AdminAnnisa', '2023-03-18 06:54:29', 'AdminAnnisa', '2023-03-18 06:54:29'),
(33, 'Laundry Annisa', 'Jln. Mahar Martanegara No. 51', '087656784535', 1, 'AdminAnnisa', '2023-03-18 06:53:34', NULL, '2023-03-18 06:53:34'),
(34, 'Laundry Fadillah', 'Jln. Permana No. 32', '078967546786', 1, 'AdminAnnisa', '2023-03-18 06:54:19', NULL, '2023-03-18 06:54:19');

--
-- Trigger `tb_outlet`
--
DELIMITER $$
CREATE TRIGGER `update_oultet` BEFORE UPDATE ON `tb_outlet` FOR EACH ROW BEGIN INSERT INTO tb_logoutlet set 
    nama_outlet=old.nama_outlet,
    nama_outletbaru=new.nama_outlet,
    alamat_outlet=old.alamat_outlet,
    alamat_outletbaru=new.alamat_outlet,
    tlp_outlet=old.tlp_outlet,
    tlp_outletbaru=new.tlp_outlet,
    created_by=created_by,
   created_at = NOW(); 
   END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga_paket`, `status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(4, 'Tas', 15000, 0, 'AdminAnnisa', 'AdminAnnisa', '2023-03-18 06:56:18', '2023-03-18 06:56:19'),
(5, 'Pakaian', 8000, 1, 'AdminAnnisa', NULL, '2023-03-18 06:56:00', '2023-03-18 06:56:00'),
(6, 'Selimut', 10000, 1, 'AdminAnnisa', NULL, '2023-03-18 06:56:11', '2023-03-18 06:56:11');

--
-- Trigger `tb_paket`
--
DELIMITER $$
CREATE TRIGGER `update_paket` BEFORE UPDATE ON `tb_paket` FOR EACH ROW BEGIN INSERT INTO tb_logpaket set 
    nama_paket=old.nama_paket,
    nama_paketbaru=new.nama_paket,
    harga_paket=old.harga_paket,
    harga_paketbaru=new.harga_paket,
    created_by=created_by,
   created_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tarif` int(100) NOT NULL,
  `berat` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `status` enum('Baru','Proses','Selesai','Diambil') NOT NULL DEFAULT 'Baru',
  `dibayar` enum('Dibayar','Belum Dibayar') NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `batas_waktu` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `id_paket`, `tarif`, `berat`, `total`, `tgl_pesan`, `tgl_bayar`, `status`, `dibayar`, `id_user`, `created_by`, `created_at`, `updated_by`, `updated_at`, `batas_waktu`) VALUES
(103, 32, 'k1', 80, 5, 8000, 3, 24000, '2023-03-17 00:00:00', NULL, 'Proses', 'Belum Dibayar', 10, 'AdminAnnisa', '2023-03-18 07:34:40', 'AdminAnnisa', '2023-03-18 07:34:40', '2023-03-18 14:34:40'),
(104, 33, 'k2', 81, 6, 10000, 2, 20000, '2023-03-17 00:00:00', '2023-03-22 00:00:00', 'Baru', 'Dibayar', 10, 'AdminAnnisa', '2023-03-18 07:34:19', NULL, '2023-03-18 07:34:19', '2023-03-18 00:00:00'),
(105, 34, 'k3', 80, 6, 10000, 2, 20000, '2023-03-16 00:00:00', '2023-03-25 00:00:00', 'Baru', 'Dibayar', 12, 'KasirAnnisa', '2023-03-18 07:37:49', NULL, '2023-03-18 07:37:49', '2023-03-24 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `role` enum('Admin','Kasir','Owner') DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email`, `password`, `foto_user`, `id_outlet`, `role`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `remember_token`) VALUES
(10, 'AdminAnnisa', 'dayensaadmin@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$aVpEV3dic29jZm1zeWtxNQ$GONqZhvRwkv07MfZvWTU1KrhQ4eZwdp9p3AzAp26Kqk', '/foto_user/1679112571.jpg', 32, 'Admin', 1, '', '2023-03-18 07:38:43', '', '2023-03-18 11:09:31', NULL),
(12, 'KasirAnnisa', 'dayensakasir@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$U1p3dU8vNE1sQTRwNVdhRw$aQR+FTU06RspwMMHAC6W0CnDTGjrZL0awmn68b79aeQ', '/foto_user/1679036555.png', 33, 'Kasir', 1, 'AdminAnnisa', '2023-03-18 07:38:43', 'AdminAnnisa', '2023-03-17 14:02:35', NULL),
(13, 'OwnerAnnisa', 'dayensaowner@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$RWtyUXFzRmF3a0Q3TW56Uw$uttwo8/c8Fx2KgLdk12yBRu6KR5fDkoNCDGyWfIp33Q', '/foto_user/1679036530.png', 34, 'Owner', 1, 'AdminAnnisa', '2023-03-18 07:38:43', 'AdminAnnisa', '2023-03-17 14:02:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_logoutlet`
--
ALTER TABLE `tb_logoutlet`
  ADD PRIMARY KEY (`id_log_outlet`);

--
-- Indeks untuk tabel `tb_logpaket`
--
ALTER TABLE `tb_logpaket`
  ADD PRIMARY KEY (`id_logpaket`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_logoutlet`
--
ALTER TABLE `tb_logoutlet`
  MODIFY `id_log_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_logpaket`
--
ALTER TABLE `tb_logpaket`
  MODIFY `id_logpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_5` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
