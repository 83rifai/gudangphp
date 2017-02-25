-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Feb 2017 pada 12.24
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` varchar(25) NOT NULL,
  `id_satuan` varchar(25) DEFAULT NULL,
  `id_jenis` int(25) DEFAULT NULL,
  `nm_jenis` varchar(100) DEFAULT NULL,
  `id_warna` int(25) DEFAULT NULL,
  `nm_warna` varchar(100) DEFAULT NULL,
  `id_merk` int(25) DEFAULT NULL,
  `nm_merk` varchar(100) DEFAULT NULL,
  `jml_stok` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_satuan`, `id_jenis`, `nm_jenis`, `id_warna`, `nm_warna`, `id_merk`, `nm_merk`, `jml_stok`) VALUES
('HA1.P1.N1.S3.S2.K2', 'S3.S2.K2', 0, 'HVS_A4', 0, 'Putih', 0, 'Putih', 9),
('HA1.P1.N1.S3.S2.K3', 'S3.S2.K3', 0, 'HVS_A4', 0, 'Putih', 0, 'Putih', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `besar`
--

CREATE TABLE IF NOT EXISTS `besar` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `besar`
--

INSERT INTO `besar` (`id`, `nama`, `jumlah`) VALUES
('S1', 'Satuan Besar', 1),
('S2', 'dus', 1),
('S3', 'box', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id` varchar(25) NOT NULL,
  `nm_jenis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nm_jenis`) VALUES
('HA1', 'HVS_A4'),
('J1', 'Jenis 1'),
('P1', 'Pulpen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecil`
--

CREATE TABLE IF NOT EXISTS `kecil` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecil`
--

INSERT INTO `kecil` (`id`, `nama`, `jumlah`) VALUES
('K1', 'Satuan Kecil', 100),
('K2', 'rim', 5),
('K3', 'rim', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `id` varchar(25) NOT NULL,
  `nm_merk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `nm_merk`) VALUES
('M1', 'Merk 1'),
('N1', 'Natural'),
('P1', 'Pilot');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(25) NOT NULL,
  `nm_pelanggan` varchar(250) NOT NULL,
  `almt_pelanggan` varchar(250) NOT NULL,
  `no_telp` int(25) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nm_pelanggan`, `almt_pelanggan`, `no_telp`, `email`) VALUES
(1, 'PT Axibis', 'Jl. Kanggotan No 2 Jebres Surakarta', 2147483647, 'fatoni.work@gmail.com'),
(2, 'candra', 'cilegon', 123456, 'vgvgvgvgu7'),
(3, 'aaaa', 'aaaaa', 1235, 'asdfg'),
(4, 'asasa', 'asasa', 123456, 'gdgdgd'),
(5, 'dfd', 'ffdf', 1234566, 'wewe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` varchar(25) NOT NULL,
  `st_besar` varchar(10) DEFAULT NULL,
  `st_sedang` varchar(10) DEFAULT NULL,
  `st_kecil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `st_besar`, `st_sedang`, `st_kecil`) VALUES
('S1.S1.K1', 'S1', 'S1', 'K1'),
('S3.S2.K2', 'S3', 'S2', 'K2'),
('S3.S2.K3', 'S3', 'S2', 'K3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sedang`
--

CREATE TABLE IF NOT EXISTS `sedang` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sedang`
--

INSERT INTO `sedang` (`id`, `nama`, `jumlah`) VALUES
('S1', 'Satuan Sedang', 10),
('S2', 'box', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id` int(25) NOT NULL,
  `nm_suplier` varchar(250) NOT NULL,
  `almt_suplier` varchar(250) NOT NULL,
  `no_telp` int(25) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `td_brg_keluar`
--

CREATE TABLE IF NOT EXISTS `td_brg_keluar` (
  `kd_tr` varchar(25) DEFAULT NULL,
  `id` varchar(25) DEFAULT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `kd_satuan` varchar(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `jml_konversi` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `td_brg_keluar`
--

INSERT INTO `td_brg_keluar` (`kd_tr`, `id`, `kd_barang`, `satuan`, `kd_satuan`, `jumlah`, `jml_konversi`) VALUES
('BM-1602170011', 'BM-160217001', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', 2, 2),
('BM-2402170021', 'BM-240217002', 'HA1.P1.N1.S3.S2.K3', 'rim', 'K3', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `td_brg_masuk`
--

CREATE TABLE IF NOT EXISTS `td_brg_masuk` (
  `kd_tr` varchar(25) DEFAULT NULL,
  `id` varchar(25) DEFAULT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `kd_satuan` varchar(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `jml_konversi` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `td_brg_masuk`
--

INSERT INTO `td_brg_masuk` (`kd_tr`, `id`, `kd_barang`, `satuan`, `kd_satuan`, `jumlah`, `jml_konversi`) VALUES
('BM-1602170011', 'BM-160217001', 'HA1.P1.N1.S3.S2.K2', 'box', 'S2', 1, 5),
('BM-1602170021', 'BM-160217002', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', 5, 5),
('BM-1602170031', 'BM-160217003', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', 1, 1),
('BM-2402170041', 'BM-240217004', 'HA1.P1.N1.S3.S2.K3', 'rim', 'K3', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_brg_keluar`
--

CREATE TABLE IF NOT EXISTS `tr_brg_keluar` (
  `id` varchar(15) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `no_po` varchar(100) NOT NULL,
  `id_pelanggan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_brg_keluar`
--

INSERT INTO `tr_brg_keluar` (`id`, `tgl_keluar`, `no`, `no_po`, `id_pelanggan`) VALUES
('BM-160217001', '2017-02-16', '1abc', '1234', '2'),
('BM-240217002', '2017-02-24', '12345', '123456', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_brg_masuk`
--

CREATE TABLE IF NOT EXISTS `tr_brg_masuk` (
  `id` varchar(15) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `no` int(20) DEFAULT NULL,
  `id_suplier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_brg_masuk`
--

INSERT INTO `tr_brg_masuk` (`id`, `tgl_masuk`, `no`, `id_suplier`) VALUES
('BM-160217001', '2017-02-16', 1, ''),
('BM-160217002', '2017-02-16', 2, ''),
('BM-160217003', '2017-02-16', 3, ''),
('BM-240217004', '2017-02-24', 4, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', ''),
(3, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'user', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE IF NOT EXISTS `warna` (
  `id` varchar(25) NOT NULL,
  `nm_warna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id`, `nm_warna`) VALUES
('M1', 'Merah'),
('P1', 'Putih'),
('W1', 'Warna 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `besar`
--
ALTER TABLE `besar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecil`
--
ALTER TABLE `kecil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sedang`
--
ALTER TABLE `sedang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_brg_keluar`
--
ALTER TABLE `tr_brg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_brg_masuk`
--
ALTER TABLE `tr_brg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
