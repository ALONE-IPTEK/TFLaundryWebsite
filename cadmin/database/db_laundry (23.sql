-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2022 pada 11.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(1, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 8000),
(2, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', 10000),
(4, 'Cuci Gosok', 8000),
(5, 'Gosok Aja', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis2`
--

CREATE TABLE `jenis2` (
  `id` int(10) NOT NULL,
  `jenis2` varchar(100) NOT NULL,
  `harga2` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis2`
--

INSERT INTO `jenis2` (`id`, `jenis2`, `harga2`) VALUES
(1, 'Karpet Standard', 65000),
(2, 'Karpet Besar', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Karyawan','Konsumen') NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` enum('Laki laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `username`, `password`, `level`, `nik`, `alamat`, `telp`, `gender`) VALUES
(1, 'Rudiyanto', 'rudi', '1755e8df56655122206c7c1d16b1c7e3', 'Konsumen', '', 'Jl. Kenangan RT 001 09', '081383205359', 'Laki laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Karyawan','Konsumen') NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` enum('Laki laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`, `nik`, `alamat`, `telp`, `gender`) VALUES
(2, 'Anisa Putri', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 'Karyawan', '4172939182', 'Jl prima', '9823918309', 'Perempuan'),
(4, 'Tio Irfan Antoni', 'tyoy', '902856808887ae856c34962084afdf5a', 'Administrator', '3175030401010006', 'Jl. Prima', '081383205359', 'Laki laki'),
(5, 'fer', 'fer', '90eb8760c187a2097884ed4c9ffbb6a4', 'Karyawan', '231312312', 'ajsdkajskdj', '081230', 'Laki laki'),
(6, 'Dimas', 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'Administrator', '87878787', 'kkk', '08', 'Laki laki'),
(8, 'Rudiyanto', 'rudi', '1755e8df56655122206c7c1d16b1c7e3', 'Konsumen', '', 'Jl. Kenangan RT 001 09', '081383205359', 'Laki laki'),
(9, '4dkwj', 'sityoy', '902856808887ae856c34962084afdf5a', 'Karyawan', '213123', 'djasldkj', '08213810', 'Laki laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jenis2` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL,
  `tarif2` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `diskon` int(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` varchar(250) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `berat2` int(11) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `konsumen` varchar(100) NOT NULL,
  `nota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`, `jenis2`, `tarif`, `tarif2`, `jumlah`, `diskon`, `tgl_transaksi`, `tgl_ambil`, `berat`, `berat2`, `pengguna`, `konsumen`, `nota`) VALUES
(14, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 'Karpet Standard', 256000, 0, 256000, 0, '2022-03-20', '2022-03-22', '32', 0, 'Tio Irfan Antoni', 'Anisa', '000001'),
(15, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 256000, 0, 256000, 0, '2022-03-20', '2022-03-22', '32', 0, 'Tio Irfan Antoni', 'nisa', '000002'),
(16, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', '', 80000, 0, 80000, 0, '2022-03-20', '2022-03-23', '8', 0, 'fer', 'Suapay', '000003'),
(17, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 72000, 0, 72000, 0, '2022-03-20', '20222022-03-23', '9', 0, 'Tio Irfan Antoni', 'ASDSA', '000004'),
(18, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 72000, 0, 72000, 0, '2022-03-20', '20222022-03-23', '9', 0, 'Tio Irfan Antoni', 'ASDSA', '000004'),
(19, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 80000, 0, 80000, 0, '2022-03-20', '2022-03-23', '10', 0, 'Tio Irfan Antoni', 'asdas', '000005'),
(20, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 360000, 0, 360000, 0, '2022-03-21', '03/11/2022', '45', 3, 'Tio Irfan Antoni', 'Asd', '000006'),
(21, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 280000, 0, 280000, 0, '2022-03-21', '2022-03-24', '35', 5, 'Tio Irfan Antoni', 'asd', '000006'),
(22, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 'Karpet Standard', 65600, 0, 65600, 0, '2022-03-26', '', '8.2', 0, 'Tio Irfan Antoni', 'Anisa', '000007'),
(23, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', '', 78400, 0, 78400, 0, '2022-03-26', '2022-03-29', '9.8', 0, 'Tio Irfan Antoni', 'Anisajaj', '000008'),
(24, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 'Karpet Standard', 69600, 65000, 134600, 0, '2022-03-26', '2022-03-29', '8.7', 1, 'Tio Irfan Antoni', '32sad', '000009'),
(25, '', '', 0, 0, 0, 0, '2022-03-26', '2022-03-29', '1', 0, 'Tio Irfan Antoni', 'ksak', '000010'),
(26, '', '', 0, 0, 0, 0, '2022-03-26', '2022-03-29', '1', 0, 'Tio Irfan Antoni', '1ewq', '000011'),
(27, '', '', 0, 0, 0, 0, '2022-03-26', '2022-03-29', '1', 0, 'Tio Irfan Antoni', '1ewq', '000011'),
(28, '', '', 0, 0, 0, 0, '2022-03-26', '2022-03-29', '1', 0, 'Tio Irfan Antoni', 'adasd', '000012');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis2`
--
ALTER TABLE `jenis2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota` (`nota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis2`
--
ALTER TABLE `jenis2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
