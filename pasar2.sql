-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 11:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasar2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `kategori` enum('Buah','Sayur') NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `gambar` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `id_toko`, `kategori`, `stok`, `harga`, `kondisi`, `satuan`, `gambar`) VALUES
('2', 'Jambu Air', 'T-001', 'Buah', 86, '10000', 'Baik', 'kg', 'gambar-buah-jambu-air.jpg'),
('3', 'Pare', 'T-001', 'Sayur', 68, '5000', 'Ijo', 'Kresek Cilik', 'courgette-cucumber-food-128420.jpg'),
('4', 'Tomat', 'T-001', 'Sayur', 59, '5000', 'Segar', 'kg', 'tomat.jpg'),
('6', 'semangka', 'T-001', 'Buah', 94, '100000', 'Busuk', 'perpohon', 'b3.png'),
('7', 'yyy', 'T-001', 'Sayur', 12, '100', 'apik', '100gram', 'carrots-1082251_6401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_beli`
--

CREATE TABLE `detil_beli` (
  `id_detil` int(11) NOT NULL,
  `id_beli` varchar(10) NOT NULL,
  `id_toko` varchar(20) NOT NULL,
  `id_kurir` varchar(20) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `sub_total` varchar(50) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_pengiriman` varchar(50) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `rating_produk` float NOT NULL,
  `komen` text NOT NULL,
  `tanggal_komen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_beli`
--

INSERT INTO `detil_beli` (`id_detil`, `id_beli`, `id_toko`, `id_kurir`, `id_produk`, `jumlah`, `harga`, `sub_total`, `status_pembayaran`, `status_pengiriman`, `status_transaksi`, `rating_produk`, `komen`, `tanggal_komen`) VALUES
(18, '5190', 'T-001', '', '6', 1, '100000', '100000', 'Selesai', 'Terkirim', 'Selesai', 5, 'mantapppp', '2019-07-30 10:50:17'),
(19, '3782654', 'T-001', '', '4', 1, '5000', '5000', 'Selesai', 'Terkirim', 'Selesai', 2, 'segerrrrr', '2019-09-18 14:21:06'),
(21, '789536', 'T-001', '', '6', 1, '100000', '100000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', ''),
(22, '8143284', 'T-001', '', '6', 2, '100000', '200000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', ''),
(23, '125505', 'T-001', '', '6', 1, '100000', '100000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', ''),
(24, '3699377', 'T-001', '', '6', 1, '100000', '100000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', ''),
(25, '1592141', 'T-001', '', '4', 1, '5000', '5000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', ''),
(26, '6142190', 'T-001', '', '2', 1, '10000', '10000', 'Belum Bayar', 'Sedang di proses', 'Proses', 0, '', '');

--
-- Triggers `detil_beli`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` BEFORE INSERT ON `detil_beli` FOR EACH ROW BEGIN
	UPDATE barang set stok=stok-new.jumlah WHERE id = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER DELETE ON `detil_beli` FOR EACH ROW BEGIN
	UPDATE barang set stok=stok+old.jumlah WHERE id = old.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
('1', 'buah'),
('2', 'sayur');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_detil` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `id_toko` varchar(20) NOT NULL,
  `rating_produk` float NOT NULL,
  `komen` text NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_detil`, `id_produk`, `id_toko`, `rating_produk`, `komen`, `tanggal`) VALUES
(1, '4', 'T-001', 1, '9', ''),
(2, '1', 'T-002', 3, 'a', ''),
(3, '4', 'T-001', 1, 'a', ''),
(4, '4', 'T-001', 5, 'aaa', ''),
(5, '4', 'T-001', 5, 'a', ''),
(6, '2', 'T-001', 5, 'a', ''),
(7, '4', 'T-001', 0, '', ''),
(8, '3', 'T-001', 5, 'gubluk', ''),
(9, '2', 'T-001', 5, '', ''),
(10, '4', 'T-001', 3, 'hahaha', ''),
(11, '4', 'T-001', 4, 'wenak', ''),
(12, '4', 'T-001', 5, 'mantul', ''),
(13, '4', 'T-001', 5, 'mantap', ''),
(14, '4', 'T-001', 3, 'buruk', ''),
(15, '3', 'T-001', 5, 'mantul', ''),
(16, '2', 'T-001', 4, 'hahha', ''),
(17, '2', 'T-001', 0, '', ''),
(18, '4', 'T-001', 0, '', ''),
(19, '2', 'T-001', 0, '', ''),
(20, '3', 'T-001', 0, '', ''),
(21, '4', 'T-001', 0, '', ''),
(22, '2', 'T-001', 0, '', ''),
(23, '3', 'T-001', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(10) NOT NULL,
  `id_toko` varchar(20) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kendaraan` varchar(20) NOT NULL,
  `nopol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `id_toko`, `id_user`, `nama`, `kendaraan`, `nopol`) VALUES
('5444', 'T-001', '787687', 'iblis', 'mobil', 'N 9990 KI'),
('566', 'T-001', '99', 'saipul', 'sepeda', 'N 001 HY'),
('577', 'T-001', '990', 'junaedi', 'motor', 'S 660 IJ'),
('578', 'T-001', '0', 'aku', 'mobil', 'N 0889 KKI');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` varchar(10) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `batas_bayar` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `pengiriman` text NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` text NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `bukti` varchar(5000) NOT NULL,
  `status_pengiriman` varchar(50) NOT NULL,
  `status_transaksi` enum('Selesai','Proses','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `nik`, `nama_penerima`, `telepon`, `tanggal`, `batas_bayar`, `total`, `pembayaran`, `pengiriman`, `alamat`, `wilayah`, `kodepos`, `status_pembayaran`, `bukti`, `status_pengiriman`, `status_transaksi`) VALUES
('125505', '2345687', 'Galang', '089625810423', '2019-11-12 07:08:45', '2019-11-13 07:08:45', '100000', 'Online', 'Dikirim', 'Kepuharjo', 'Malanggggg', '65152', 'Belum Bayar', '', 'Sedang di proses', 'Proses'),
('1264472', '2345687', 'Manusia Setengah Dewa', '0987654321', '2019-08-10 14:25:37', '2019-08-11 14:25:37', '200000', 'Ditempat', 'Dikirim', 'Jl. Kramat No. 1999', 'Karangploso/Malang', '65152', 'Dibatalkan', '', 'Dibatalkan', 'Batal'),
('1592141', '2345687', 'Galang', '089625810423', '2020-01-02 13:18:22', '2020-01-03 13:18:22', '5000', '-Pilih Metode Pembayaran-', '-Pilih Metode Pengiriman-', 'Kepuharjo1', 'Malang', '65152', 'Belum Bayar', '', 'Sedang di proses', 'Proses'),
('3699377', '2345687', 'Galang', '089625810423', '2019-11-12 07:14:38', '2019-11-13 07:14:38', '100000', 'Online', 'Diambil', 'Kepuharjo', 'Malang', '65152', 'Belum Bayar', '', 'Sedang di proses', 'Proses'),
('3782654', '2345687', 'Manusia', '0987654321', '2019-07-30 11:11:47', '2019-07-31 11:11:47', '5000', 'Ditempat', 'Dikirim', 'jl jalan', 'Malang', '65152', 'Selesai', '', 'Terkirim', 'Selesai'),
('5190', '2345687', 'Galang Frastyo ', '082232197805', '2019-07-30 10:31:42', '2019-07-31 10:31:42', '100000', 'Ditempat', 'Dikirim', 'Jl.Pulau Mas II , Wringin Anom , Kepuharjo Utara', 'Karangploso / Malang / Jawa Timur', '65152', 'Selesai', '6a583acb1d7e96943e5048a8702348c111.jpg', 'Terkirim', 'Selesai'),
('6142190', '2345687', 'Galang', '089625810423', '2020-01-04 11:48:10', '2020-01-05 11:48:10', '10000', '-Pilih Metode Pembayaran-', '-Pilih Metode Pengiriman-', 'Kepuharjo', 'Malang', '65152', 'Belum Bayar', '', 'Sedang di proses', 'Proses'),
('789536', '2345687', 'Manusia Jadi-Jadian', '0987654321', '2019-08-10 14:26:30', '2019-08-11 14:26:30', '100000', 'Online', 'Diambil', 'jl jalan', 'Malang', '65152', 'Selesai', '', 'Terkirim', 'Selesai'),
('8143284', '2345687', 'Galang', '089625810423', '2019-09-18 14:18:00', '2019-09-19 14:18:00', '210000', 'Ditempat', 'Dikirim', 'Kepuharjo', 'Malang', '65152', 'Belum Bayar', '', 'Sedang di proses', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(10) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `alamat_toko` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_user`, `nama_toko`, `alamat_toko`, `kota`, `kode_pos`, `kontak`, `keterangan`, `logo`) VALUES
('T-001', '2345687', 'dhea_shop', 'tunjungtirto', 'malang', '66413', '009987766', 'toko baik baik saja jangan khawatir', 'rrrrrrr.jpg'),
('T-002', '990', 'Engas Shop', 'Kepuharjo', 'Malang', '65213', '09876566', 'Punya Ortu', 'buah.jpg'),
('T-24305', '3456789', 'Barokah', 'Porong', 'malang', '654321', '98765467', 'baik', 'eagle-garuda-vector-2754766.jpg'),
('T-688', '99', 'Bunda Shop', 'Klampok', 'Malang', '65212', '09876544', 'Baik', 'GTZBYmDyJD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `foto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nik`, `nama_user`, `alamat`, `kota`, `kode_pos`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kontak`, `role_id`, `foto`) VALUES
('admin', 'admin', '0', '', '', '', 0, '', '', '2019-07-16', '', 1, ''),
('Bambang', 'hahaha', '1234567890', 'Bambang', 'Malang', 'Malang', 65152, 'Laki-Laki', '', '0000-00-00', '0987654321', 2, 'icon1.png'),
('manusia', 'human', '222', 'manusiaaa', 'bumi', 'melbourne', 4444, 'Laki-Laki', '', '0000-00-00', '07657658658', 2, 'grapes-690230_640.jpg'),
('aku', 'kamu', '2345687', 'Galang', 'Kepuharjo', 'Malang', 65152, '1', 'Malang', '2001-09-10', '089625810423', 2, 'icon1.png'),
('aku', 'kamulah', '3456789', 'Aku', 'shjksncka', 'Malang', 65152, 'L', '', '2019-07-02', '234567890', 2, ''),
('Dhea', '44444', '787687', 'Dhea Suksuk Maulidya', 'Njuwet', 'Wakanda', 65121, 'Laki-Laki', '', '2019-07-03', '080997986', 2, 'a.jpg'),
('Dimas', '12345', '99', 'Dimas Tod', 'kelampok', 'malang', 76543, 'Laki-Laki', '', '2011-11-11', '0876543567', 2, ''),
('Galang', '55555', '990', 'Galang Tod', 'kepuh', 'malang', 65432, 'Perempuan', '', '2019-07-05', '98756', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `detil_beli`
--
ALTER TABLE `detil_beli`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `idbeli` (`id_beli`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_detil`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`) USING BTREE,
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_beli`
--
ALTER TABLE `detil_beli`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_beli`
--
ALTER TABLE `detil_beli`
  ADD CONSTRAINT `id_beli` FOREIGN KEY (`id_beli`) REFERENCES `pembelian` (`id_beli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kurir`
--
ALTER TABLE `kurir`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `nik` FOREIGN KEY (`nik`) REFERENCES `user` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
