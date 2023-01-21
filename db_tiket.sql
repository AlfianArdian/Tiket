-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 04:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'asekasek', 1, 0, 0, NULL, 1),
(2, 2, 'asiyap', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(3, 'uri:api/pesawat/index:get', 1, 1574089845, 'asiyap'),
(4, 'uri:api/kapal/index:get', 2, 1574087015, 'asiyap'),
(5, 'uri:api/kapal/index:post', 1, 1574087629, 'asiyap'),
(6, 'uri:api/cms_alamat/index:get', 1, 1574096737, 'asiyap'),
(7, 'uri:api/cms_pembayaran/index:get', 3, 1574097558, 'asiyap'),
(8, 'uri:api/cms_pengaturan/index:get', 4, 1574097808, 'asiyap'),
(9, 'uri:api/komplain_masukan/index:get', 1, 1574098259, 'asiyap'),
(10, 'uri:api/tiket_kapal/index:get', 1, 1574098833, 'asiyap'),
(11, 'uri:api/tiket_pesawat/index:get', 3, 1574099085, 'asiyap'),
(12, 'uri:api/users/index:get', 1, 1574126905, 'asiyap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_alamat`
--

CREATE TABLE `tb_cms_alamat` (
  `id` int(11) NOT NULL,
  `nama_kantor` text NOT NULL,
  `telepon` text NOT NULL,
  `hp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cms_alamat`
--

INSERT INTO `tb_cms_alamat` (`id`, `nama_kantor`, `telepon`, `hp`) VALUES
(1, 'Jl Cengger Ayam No 25 Malang', '(003) 767688', '083862333330');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_pembayaran`
--

CREATE TABLE `tb_cms_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` text NOT NULL,
  `atas_nama` text NOT NULL,
  `img_bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cms_pembayaran`
--

INSERT INTO `tb_cms_pembayaran` (`id`, `nama_bank`, `no_rekening`, `atas_nama`, `img_bank`) VALUES
(3, 'BCA', '3810155271', 'Pujo Hastowo Ardi', 'bca.png'),
(4, 'BRI', '140005069563', 'Pujo Hastowo Ardi', 'bri.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_pengaturan`
--

CREATE TABLE `tb_cms_pengaturan` (
  `id` int(11) NOT NULL,
  `id_users_pengaturan` int(11) NOT NULL,
  `nama_admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cms_pengaturan`
--

INSERT INTO `tb_cms_pengaturan` (`id`, `id_users_pengaturan`, `nama_admin`) VALUES
(1, 3, 'admin pujo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kapal`
--

CREATE TABLE `tb_kapal` (
  `id` int(11) NOT NULL,
  `nama_kapal` varchar(40) NOT NULL,
  `kode_kapal` varchar(25) NOT NULL,
  `pelabuhan_asal` varchar(40) NOT NULL,
  `pelabuhan_tujuan` varchar(40) NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `harga` float NOT NULL,
  `tersedia` tinyint(1) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kapal`
--

INSERT INTO `tb_kapal` (`id`, `nama_kapal`, `kode_kapal`, `pelabuhan_asal`, `pelabuhan_tujuan`, `jam_keberangkatan`, `jam_tiba`, `harga`, `tersedia`, `stok`) VALUES
(1, 'Sinabung', 'SB01', 'Semarang', 'Surabaya', '08:00:00', '11:00:00', 400000, 1, 90),
(3, 'Dobonsolo', 'D01', 'Surabaya', 'Sorong', '19:00:00', '04:00:00', 600000, 1, 69),
(4, 'KM Ngapulu', 'KMN01', 'Jayapura', 'Makasar', '15:00:00', '02:00:00', 700000, 1, 80),
(5, 'KM Ciremai', 'KMC01', 'Jayapura', 'Sorong', '08:00:00', '02:00:00', 550000, 1, 100),
(6, 'KM Ngapulu', 'KMN01', 'Biak', 'Makasar', '05:00:00', '12:00:00', 680000, 1, 120),
(7, 'KM Ngapulu', 'KMN01', 'Jayapura', 'Surabaya', '14:00:00', '22:00:00', 1000000, 1, 120),
(8, 'Dobonsolo', 'D01', 'Jayapura', 'Surabaya', '17:00:00', '01:00:00', 1200000, 1, 100),
(9, 'KM Ciremai', 'KMC02', 'Jayapura', 'Surabaya', '11:00:00', '03:30:00', 1150000, 1, 80),
(10, 'KM Ngapulu', 'KMN01', 'Biak', 'Makasar', '15:00:00', '00:00:13', 670000, 1, 100),
(11, 'Dobonsolo', 'D01', 'Biak', 'Makasar', '12:30:00', '02:00:00', 700000, 1, 80),
(12, 'KM Ciremai', 'KMC03', 'Biak', 'Makasar', '08:00:00', '17:00:00', 800000, 1, 200),
(14, 'Ngapulu', 'NG01', 'Surabaya', 'Semarang', '07:00:00', '09:00:00', 200000, 1, 100),
(15, 'Dobonsolo', 'D02', 'Makasar', 'Surabaya', '09:00:00', '13:00:00', 400000, 1, 120),
(16, 'Binaiya ', 'B01', 'Surabaya', 'Sorong', '08:00:00', '02:00:00', 620000, 1, 95),
(17, 'Gunung Dempo', 'GD01', 'Surabaya', 'Sorong', '00:00:12', '17:00:00', 900000, 1, 120),
(18, 'Dobonsolo', 'D03', 'Semarang', 'Surabaya', '09:00:00', '11:00:00', 200000, 1, 96),
(19, 'KM Ciremai', 'KMC04', 'Semarang', 'Surabaya', '07:00:00', '09:00:00', 200000, 1, 199),
(20, 'Dobonsolo', 'DB08', 'Surabaya', 'Makasar', '09:00:00', '05:00:00', 1000000, 1, 80),
(21, 'Sinabung', 'SB99', 'Papua', 'Papua', '09:00:00', '24:00:00', 70000, 1, 340),
(22, 'Sinabung', 'Coba123', 'Jakarta', 'Papua', '04:00:00', '07:00:00', 200000, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komplain_masukan`
--

CREATE TABLE `tb_komplain_masukan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komplain_masukan`
--

INSERT INTO `tb_komplain_masukan` (`id`, `jenis`, `nama_lengkap`, `email`, `no_telpon`, `pesan`) VALUES
(19, 'Komplain', 'dbjabdjka', 'askxn@hdjkshjk.cjds', '72198e7', 'bagus'),
(20, 'Masukan', 'Vanzaka Musyafa', 'Vanjaka@gmail.com', '085291928876', 'untuk konfirmasi pemabyaran harusnya langsung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesawat`
--

CREATE TABLE `tb_pesawat` (
  `id` int(11) NOT NULL,
  `nama_pesawat` varchar(40) NOT NULL,
  `kode_pesawat` varchar(40) NOT NULL,
  `keberangkatan` varchar(40) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `kelas_penerbangan` varchar(20) NOT NULL,
  `harga` float NOT NULL,
  `tersedia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesawat`
--

INSERT INTO `tb_pesawat` (`id`, `nama_pesawat`, `kode_pesawat`, `keberangkatan`, `tujuan`, `jam_keberangkatan`, `jam_tiba`, `kelas_penerbangan`, `harga`, `tersedia`) VALUES
(18, 'Lion Air', 'LN01', 'Jakarta', 'Bandung', '07:00:00', '07:30:00', 'Ekonomi', 800000, 1),
(20, 'Sriwijaya Air', 'SWJ01', 'Surabaya', 'Jakarta', '07:00:00', '08:00:00', 'Ekonomi', 600000, 1),
(21, 'Garuda', 'GD01', 'Jakarta', 'Bali', '16:00:00', '17:30:00', 'Ekonomi', 600000, 1),
(22, 'Garuda', 'GD02', 'Bali', 'Jakarta', '12:30:00', '14:00:00', 'Ekonomi', 700000, 1),
(23, 'Citilink', 'CT01', 'Jakarta', 'Surabaya', '09:00:00', '08:00:00', 'Ekonomi', 600000, 1),
(24, 'Citilink', 'CT02', 'Surabaya', 'Lampung', '00:00:12', '13:45:00', 'Ekonomi', 800000, 1),
(25, 'Lion Air', 'LN03', 'Surabaya', 'Jakarta', '08:00:00', '09:30:00', 'Ekonomi', 900000, 1),
(26, 'Nam Air', 'NMA21', 'JogjaJakarta', 'Lombok', '15:00:00', '17:10:00', 'Bisnis', 864000, 1),
(27, 'Lion Air', 'LN02', 'Jakarta', 'Bandung', '19:15:00', '19:50:00', 'Bisnis', 400000, 1),
(28, 'Lion Air', 'LN03', 'Surabaya', 'Jakarta', '12:30:00', '13:45:00', 'Bisnis', 450000, 1),
(29, 'Citilink', 'CT03', 'Surabaya', 'Makasar', '21:25:00', '23:10:00', 'Ekonomi', 680000, 1),
(30, 'Citilink', 'CT04', 'Surabaya', 'Makasar', '17:30:00', '19:00:00', 'Bisnis', 900000, 1),
(31, 'Citilink', 'CT05', 'Surabaya', 'Makasar', '19:25:00', '20:10:00', 'Bisnis', 870000, 1),
(32, 'Lion Air', 'LN01', 'Surabaya', 'Makasar', '14:10:00', '16:00:00', 'Ekonomi', 600000, 1),
(33, 'Garuda', 'GD03', 'Surabaya', 'Makasar', '05:00:00', '07:00:00', 'Bisnis', 900000, 1),
(34, 'Citilink', 'CT01', 'Jakarta', 'Bandung', '08:00:00', '09:00:00', 'Ekonomi', 500000, 1),
(35, 'Citilink', 'CT02', 'Jakarta', 'Bandung', '06:00:00', '07:00:00', 'Ekonomi', 400000, 1),
(36, 'Garuda', 'GD01', 'Jakarta', 'Bandung', '10:00:00', '11:00:00', 'Ekonomi', 500000, 1),
(37, 'Garuda', 'GD02', 'Jakarta', 'Bali', '09:00:00', '10:00:00', 'Bisnis', 800000, 1),
(38, 'Citilink', 'CT03', 'Jakarta', 'Bali', '19:00:00', '21:00:00', 'Bisnis', 1500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket_kapal`
--

CREATE TABLE `tb_tiket_kapal` (
  `id` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `harga_total` float NOT NULL,
  `bayar` tinyint(1) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `kode_transaksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket_kapal`
--

INSERT INTO `tb_tiket_kapal` (`id`, `id_kapal`, `id_user`, `tgl_keberangkatan`, `jumlah_tiket`, `harga_total`, `bayar`, `tgl_pemesanan`, `kode_transaksi`) VALUES
(17, 19, 26, '2019-11-19', 1, 200000, 1, '2019-11-18', 'PS01841'),
(18, 1, 26, '2019-11-19', 2, 800000, 1, '2019-11-18', 'PS01848'),
(19, 1, 26, '2019-11-20', 4, 1600000, 1, '2019-11-19', 'PS01958'),
(20, 7, 93, '2023-01-22', 2, 2000000, 0, '2023-01-21', 'PS02160'),
(21, 1, 93, '2023-01-22', 0, 0, 0, '2023-01-21', 'PS02157');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket_pesawat`
--

CREATE TABLE `tb_tiket_pesawat` (
  `id` int(11) NOT NULL,
  `id_pesawat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `harga_total` float NOT NULL,
  `bayar` tinyint(1) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `penerbangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket_pesawat`
--

INSERT INTO `tb_tiket_pesawat` (`id`, `id_pesawat`, `id_user`, `tgl_keberangkatan`, `jumlah_tiket`, `harga_total`, `bayar`, `tgl_pemesanan`, `kode_transaksi`, `penerbangan`) VALUES
(20, 26, 26, '2019-11-20', 1, 864000, 1, '2019-11-19', 'PS01983', ''),
(21, 23, 26, '2019-11-21', 4, 2400000, 1, '2019-11-19', 'PS01979', ''),
(22, 25, 93, '2023-01-22', 0, 0, 0, '2023-01-21', 'PS02185', '0'),
(23, 27, 93, '2023-01-23', 0, 0, 0, '2023-01-21', 'PS02168', '0'),
(24, 37, 93, '2023-01-23', 0, 0, 0, '2023-01-21', 'PS02121', '0'),
(25, 37, 93, '2023-01-23', 2, 1600000, 0, '2023-01-21', 'PS02120', '0'),
(26, 36, 93, '2023-01-22', 1, 500000, 0, '2023-01-21', 'PS02156', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `alamat` text,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `email`, `username`, `nama_lengkap`, `no_telp`, `no_ktp`, `alamat`, `password`, `status`, `hak_akses`) VALUES
(3, 'admin@gmail.com', 'admin', 'admin', '08886876238', '567532159519', 'malang', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(26, 'ardi@gmail.com', 'ardi', 'ardi hastowo', '085291939908', '330617882893179', 'malang', 'b623a7cebe5be1abc1409e528f6b4451', 1, 'user'),
(91, 'asd@gmail.com', 'asd', 'asdasd', '06958', '54353', 'alamak', '4b998a36d748e294d1554254e37a77cd', 1, 'user'),
(92, 'alfian@gmail.com', 'alfian', 'alfianardi', '43134', '456', 'alamre', '9c70933aff6b2a6d08c687a6cbb6b765', 1, 'user'),
(93, 'alfianluvandroid@gmail.com', 'GlintSteel', 'alfian ardiansyah', '0895621095201', '3513051307970001', 'sumbersari malang 89a', 'af81dbaf5f0acd617431e65b100de7fb', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cms_alamat`
--
ALTER TABLE `tb_cms_alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cms_pembayaran`
--
ALTER TABLE `tb_cms_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cms_pengaturan`
--
ALTER TABLE `tb_cms_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kapal`
--
ALTER TABLE `tb_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komplain_masukan`
--
ALTER TABLE `tb_komplain_masukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesawat`
--
ALTER TABLE `tb_pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tiket_kapal`
--
ALTER TABLE `tb_tiket_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tiket_pesawat`
--
ALTER TABLE `tb_tiket_pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_cms_alamat`
--
ALTER TABLE `tb_cms_alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cms_pembayaran`
--
ALTER TABLE `tb_cms_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_cms_pengaturan`
--
ALTER TABLE `tb_cms_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kapal`
--
ALTER TABLE `tb_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_komplain_masukan`
--
ALTER TABLE `tb_komplain_masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_pesawat`
--
ALTER TABLE `tb_pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_tiket_kapal`
--
ALTER TABLE `tb_tiket_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_tiket_pesawat`
--
ALTER TABLE `tb_tiket_pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
