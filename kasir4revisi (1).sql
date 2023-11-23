-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 01:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir4revisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `id`, `satuan`, `harga_beli`, `stok`, `harga_jual`, `profit`) VALUES
('09998714452891', 'Buku kata', 3, 'PCS', 12000, 151, 20000, 8000),
('23467045658768', 'Pepsodent', 2, 'PCS', 10000, 43, 15000, 5000),
('43543647675332', 'Biskuit', 4, 'PCS', 5000, 124, 8000, 3000),
('55438900245756', 'Galon', 3, 'PCS', 25000, 59, 35000, 10000),
('65286526916631', 'Spons', 2, 'PCS', 5000, 1, 10000, 5000),
('72164883455472', 'Sanitazer Softies', 8, 'PCS', 9900, 191, 15000, 5100),
('78395729846598', 'Lays', 1, 'PCS', 8700, 162, 12000, 3300),
('78712466577728', 'Vitalis Green', 8, 'PCS', 33000, 181, 38000, 5000),
('86548376534287', 'Tissue Tessa', 9, 'PCS', 7000, 160, 13000, 6000),
('89574839758966', 'Shampoo', 7, 'PCS', 9000, 82, 14000, 5000),
('89957574120031', 'Puccle', 2, 'PCS', 8000, 49, 12000, 4000),
('99918288287789', 'Rinso', 2, 'PCS', 24500, 82, 30000, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id` int(11) NOT NULL,
  `nofaktur` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id`, `nofaktur`, `tanggal`) VALUES
(35, 'TP35', '2022-01-15'),
(37, 'TP37', '2022-01-13'),
(38, 'TP38', '2022-01-14'),
(39, 'TP39', '2022-01-15'),
(40, 'TP40', '2022-01-15'),
(41, 'TP41', '2022-01-14'),
(43, 'TP43', '2022-01-15'),
(44, 'TP44', '2022-01-13'),
(45, 'TP45', '2022-01-12'),
(46, 'TP46', '2022-01-15'),
(47, 'TP47', '2022-01-15'),
(48, 'TP48', '2022-01-31'),
(49, 'TP-09E60201202216390', '2022-02-01'),
(50, 'TP-A11I02012022174027476600', '2022-02-02'),
(51, 'TP-DF9B02022022031202477900', '2022-02-02'),
(52, 'TP-G3H602022022164455041600', '2022-02-02'),
(53, 'TP-CA3C02022022213111299700', '2022-02-03'),
(54, 'TP-F1I002032022003239087200', '2022-02-03'),
(55, 'TP-9IH602032022003404381200', '2022-02-03'),
(56, 'TP-E51802032022003425915100', '2022-02-03'),
(57, 'TP-DC2102032022003447658900', '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `nofaktur` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah_beli` int(30) NOT NULL,
  `harga_beli` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`id_pembelian_detail`, `nofaktur`, `nama_supplier`, `kode_barcode`, `jumlah_beli`, `harga_beli`) VALUES
(1, 'TP-09E60201202216390', 'PT. Gumaya', '72164883455472', 9900, 5),
(2, 'TP-09E60201202216390', 'PT. Jaya Sentosa', '09998714452891', 12000, 6),
(3, 'TP-A11I02012022174027476600', 'PT. Gunung Sumber Murni', '89574839758966', 5, 9566),
(4, 'TP-A11I02012022174027476600', 'PT. Jaya Sentosa', '09998714452891', 6, 12000),
(5, 'TP-A11I02012022174027476600', 'PT. Indonesia Merdeka', '43543647675332', 8, 6666),
(6, 'TP-DF9B02022022031202477900', 'PT. Bahagia Selalu', '23467045658768', 5, 10000),
(7, 'TP-DF9B02022022031202477900', 'PT. Gunung Sumber Murni', '89574839758966', 3, 9000),
(8, 'TP-G3H602022022164455041600', 'PT. Jaya Sentosa', '09998714452891', 22, 12000),
(9, 'TP-G3H602022022164455041600', 'PT. Marina Jaya', '78395729846598', 12, 8700),
(10, 'TP-CA3C02022022213111299700', 'PT. Bahagia Selalu', '23467045658768', 4, 10000),
(11, 'TP-F1I002032022003239087200', 'PT. Gunung Sumber Murni', '89574839758966', 2, 9000),
(12, 'TP-F1I002032022003239087200', 'PT. Jaya Sentosa', '09998714452891', 20, 12000),
(13, 'TP-9IH602032022003404381200', 'PT. Tunggal Putra', '86548376534287', 30, 7000),
(14, 'TP-E51802032022003425915100', 'PT. Marina Jaya', '78395729846598', 20, 8700),
(15, 'TP-DC2102032022003447658900', 'PT. Gunung Sumber Murni', '89574839758966', 40, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `tgl_penjualan`, `bayar`, `kembali`) VALUES
(78, 'PJ-ICE1C065F402012022144934931600', '2022-02-01', 444444, 317724),
(79, 'PJ-DI3F02022022031330924700', '2022-02-02', 40000, 5000),
(80, 'PJ-DI3F02022022031330924700', '2022-02-02', 10000, 2000),
(81, 'PJ-9D7I02022022165624091500', '2022-02-02', 40000, 10000),
(82, 'PJ-BF0602032022003514742700', '2022-02-03', 40000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `id`, `kode_barcode`, `jumlah`, `diskon`, `potongan`, `total`, `tgl_buat`) VALUES
('PJ-42A2FGB62202012022095621946500', 89, '89574839758966', 9, 0, 0, 126000, '2022-02-01 14:48:04'),
('PJ-42A2FGB62202012022095621946500', 90, '43543647675332', 2, 0, 0, 16000, '2022-02-01 14:48:04'),
('PJ-42A2FGB62202012022095621946500', 91, '65286526916631', 3, 0, 0, 30000, '2022-02-01 14:48:04'),
('PJ-42A2FGB62202012022095621946500', 92, '89957574120031', 9, 1, 1080, 106920, '2022-02-01 14:49:42'),
('PJ-ICE1C065F402012022144934931600', 93, '89957574120031', 9, 1, 1080, 106920, '2022-02-01 14:57:34'),
('PJ-ICE1C065F402012022144934931600', 94, '65286526916631', 2, 1, 200, 19800, '2022-02-01 14:57:34'),
('PJ-DI3F02022022031330924700', 95, '55438900245756', 1, 0, 0, 35000, '2022-02-02 03:16:35'),
('PJ-DI3F02022022031330924700', 96, '43543647675332', 1, 0, 0, 8000, '2022-02-02 03:18:40'),
('PJ-9D7I02022022165624091500', 97, '65286526916631', 3, 0, 0, 30000, '2022-02-02 16:58:00'),
('PJ-BF0602032022003514742700', 98, '89957574120031', 3, 0, 0, 36000, '2022-02-03 00:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_retur`
--

CREATE TABLE `tb_retur` (
  `id` int(11) NOT NULL,
  `kode_retur` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tanggal_retur` varchar(255) NOT NULL,
  `nama_supplier` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_retur`
--

INSERT INTO `tb_retur` (`id`, `kode_retur`, `tanggal_retur`, `nama_supplier`, `kode_barcode`, `jumlah_retur`, `status`, `keterangan`) VALUES
(19, 'RT019', '15 Januari 2022', 'PT. Gumaya', '72164883455472', 20, 'Yes', 'Bocor'),
(20, 'RT020', '15 Januari 2022', 'PT. Gumaya', '78712466577728', 16, 'no', 'Pecah'),
(22, 'RT022', '15 Januari 2022', 'PT. Jaya Sentosa', '09998714452891', 5, 'Yes', 'Rusak'),
(24, 'RT024', '15 Januari 2022', 'PT. Marina Jaya', '78395729846598', 5, 'Yes', 'Rusak'),
(26, 'RT025', '17 Januari 2022', 'PT. Gumaya', '72164883455472', 1, 'no', 'Rusak'),
(27, 'RT027', '02 Februari 2022', 'PT. Jaya Sentosa', '09998714452891', 1, 'Yes', 'rusak'),
(28, 'RT028', '02 Februari 2022', 'PT. Jaya Sentosa', '09998714452891', 5, 'Yes', 'Rusak'),
(29, 'RT029', '02 Februari 2022', 'PT. Jaya Sentosa', '09998714452891', 3, 'Yes', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
(1, 'PT. Marina Jaya', '085786452680', 'Jl. Raya Magelang-Purworejo KM 12 Kab. Magelang'),
(2, 'PT. Bahagia Selalu', '085787764333', 'Jl. Raya Karangjati KM 25 Gembongan'),
(3, 'PT. Jaya Sentosa', '089573638682', 'Jl. Raya Kaligawe KM.7 No.303 Kec. Genuk Kota Semarang'),
(4, 'PT. Indonesia Merdeka', '088763672867', 'Jl. Pandean Lamper IV / 16 Kota Semarang '),
(7, 'PT. Gunung Sumber Murni', '087733224453', 'Jl. Pemuda No. 74 Kota Semarang'),
(8, 'PT. Gumaya', '082211334455', 'Jl. Gajahmada No. 99 Kec. Semarang Tengah Kota Semarang'),
(9, 'PT. Tunggal Putra', '082238576728', 'Jl. Simongan No. 98 Kota Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
(1, 'maudy', 'maudy', '12345', 'kasir'),
(2, 'lutri', 'lutri', '12345', 'kasir'),
(3, 'reza', 'reza', '12345', 'admin'),
(4, 'Shinta', 'Shinta', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_retur`
--
ALTER TABLE `tb_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tb_retur`
--
ALTER TABLE `tb_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
