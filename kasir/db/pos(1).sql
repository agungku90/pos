-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 11:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Yoga Permana', 'pemimpin', '8c0d069bd57dd91767a9df11e9a5a731', '1', 'Aktif'),
(2, 'Yoga', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'Aktif'),
(3, 'agung kurniawan', 'kasir', 'c7911af3adbd12a035b289556d96470a', '3', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_b` varchar(200) NOT NULL,
  `harga_awal_b` int(15) NOT NULL,
  `harga_jual_b` int(15) NOT NULL,
  `stok_min_b` int(10) NOT NULL,
  `stok_b` int(5) NOT NULL,
  `unit_b` varchar(20) NOT NULL,
  `hide` enum('x','v') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_b`, `harga_awal_b`, `harga_jual_b`, `stok_min_b`, `stok_b`, `unit_b`, `hide`) VALUES
(68, 'AXIS 1 GB', 11500, 14000, 4, 10, 'PCS', 'x'),
(69, 'AXIS 2 GB', 20500, 23000, 4, 6, 'PCS', 'x'),
(70, 'AXIS 3 GB', 26500, 30000, 2, 5, 'PCS', 'x'),
(71, 'AXIS 5 GB', 39500, 44000, 1, 3, 'PCS', 'x'),
(72, 'VC AXIS 1 GB 5 HARI', 8750, 10000, 5, 8, 'PCS', 'x'),
(73, 'VC AXIS 1 GB', 13600, 16000, 5, 3, 'PCS', 'x'),
(74, 'VC AXIS 2 GB', 23000, 26000, 5, 10, 'PCS', 'x'),
(75, 'VC AXIS 3 GB', 29000, 32000, 3, 10, 'PCS', 'x'),
(76, 'VC AXIS 5 GB', 43250, 46000, 2, 4, 'PCS', 'x'),
(77, 'VC AXIS 8 GB', 59000, 64000, 1, 3, 'PCS', 'x'),
(78, 'VC AXIS 4 GB OWSEM', 18000, 23000, 2, 5, 'PCS', 'x'),
(79, 'VC AXIS 8 GB OWSEM', 30000, 35000, 2, 3, 'PCS', 'x'),
(80, 'VC AXIS 16 GB OWSEM', 47000, 52000, 1, 3, 'PCS', 'x'),
(81, 'XL 4,5 GB', 27000, 30000, 5, 18, 'PCS', 'x'),
(82, 'XL 8 GB', 37000, 40000, 5, 10, 'PCS', 'x'),
(83, 'XL 15 GB', 57500, 60000, 3, 7, 'PCS', 'x'),
(84, 'XL 25 GB', 85000, 90000, 1, 1, 'PCS', 'x'),
(85, 'ISAT 1 GB MINI', 13250, 15000, 3, 4, 'PCS', 'x'),
(86, 'ISAT 2 GB MINI', 29250, 31000, 3, 4, 'PCS', 'x'),
(87, 'ISAT 1 GB UNLIMITED', 18250, 21000, 3, 3, 'PCS', 'x'),
(88, 'ISAT 2 GB UNLIMITED', 30000, 33000, 3, 1, 'PCS', 'x'),
(89, 'ISAT 3 GB UNLIMITED', 42500, 45000, 1, 2, 'PCS', 'x'),
(90, 'ISAT 7GB UNLIMITED', 58500, 62000, 1, 3, 'PCS', 'x'),
(91, 'ISAT 10 UNLIMITED', 75500, 79000, 1, -1, 'PCS', 'x'),
(92, 'VC ISAT 1 GB 7 HARI', 8250, 9000, 5, 7, 'PCS', 'x'),
(93, 'VC ISAT 1 GB 7 HARI YOUTUBE', 12000, 14000, 3, 8, 'PCS', 'x'),
(94, 'VC ISAT 1GB 15 HARI', 11000, 13000, 3, 4, 'PCS', 'x'),
(95, 'VC ISAT 1GB MINI', 14400, 17000, 4, 19, 'PCS', 'x'),
(96, 'VC ISAT 2GB MINI', 31000, 33000, 4, 10, 'PCS', 'x'),
(97, 'VC ISAT 1GB UNLIMITED', 20250, 22000, 4, 1, 'PCS', 'x'),
(98, 'VC ISAT 2GB UNLIMITED', 32250, 35000, 3, 19, 'PCS', 'x'),
(99, 'VC ISAT 3GB UNLIMITED', 44000, 46000, 3, 9, 'PCS', 'x'),
(100, 'VC ISAT 7GB UNLIMITED', 61000, 64000, 2, 2, 'PCS', 'x'),
(101, 'VC ISAT 10GB UNLIMITED', 77500, 81000, 1, 4, 'PCS', 'x'),
(102, 'VC ISAT 30GB', 59000, 70000, 1, 4, 'PCS', 'x'),
(103, 'SIMPATI REGULER', 13000, 20000, 2, 7, 'PCS', 'x'),
(104, 'SMARTFREN 16GB', 35500, 40000, 2, 4, 'PCS', 'x'),
(105, 'SMARTFREN UNLIMITED', 62000, 75000, 2, 5, 'PCS', 'x'),
(106, 'VC SMARTFREN 3GB', 10500, 12000, 2, 4, 'PCS', 'x'),
(107, 'VC SMARTFREN 10GB', 23750, 27000, 3, 5, 'PCS', 'x'),
(108, 'VC SMARTFREN 16GB', 34250, 40000, 2, 4, 'PCS', 'x'),
(109, 'VC SMARTFREN 30GB', 54750, 60000, 1, 2, 'PCS', 'x'),
(110, 'VC SMARTFREN UNLIMITED', 61000, 65000, 2, 3, 'PCS', 'x'),
(111, 'TELKOMSEL 4GB', 18000, 27000, 4, 7, 'PCS', 'x'),
(112, 'TELKOMSEL 7,5GB', 35000, 45000, 4, 3, 'PCS', 'x'),
(113, 'TELKOMSEL 10GB', 35000, 50000, 4, 0, 'PCS', 'x'),
(114, 'VC TELKOMSEL 5GB', 60000, 65000, 1, 0, 'PCS', 'x'),
(115, 'TRI AON 1GB', 17000, 20000, 1, 2, 'PCS', 'x'),
(116, 'TRI AON 2GB', 30000, 34000, 1, 3, 'PCS', 'x'),
(117, 'TRI AON 3GB', 44000, 49000, 1, 1, 'PCS', 'x'),
(118, 'TRI BM 1GB', 13000, 15000, 1, 3, 'PCS', 'x'),
(119, 'TRI BM 3GB', 24000, 28000, 1, 1, 'PCS', 'x'),
(120, 'VC TRI AON 1GB', 17000, 20000, 2, 5, 'PCS', 'x'),
(121, 'VC TRI AON 2GB', 30000, 34000, 2, 3, 'PCS', 'x'),
(122, 'VC TRI AON 3GB', 44000, 49000, 1, 2, 'PCS', 'x'),
(123, 'VC TRI BM 1GB', 12250, 16000, 2, 5, 'PCS', 'x'),
(124, 'VC TRI GM 2GB NEW', 19000, 22000, 2, 3, 'PCS', 'x'),
(125, 'VC TRI BM 3GB', 23500, 28000, 2, 3, 'PCS', 'x'),
(126, 'VC TRI GM 4GB', 33500, 38000, 1, 2, 'PCS', 'x'),
(127, 'INDOSAT REGULER', 3000, 7000, 3, 10, 'PCS', 'x'),
(128, 'AXIS REGULER', 1000, 3000, 1, 4, 'PCS', 'x'),
(129, 'AS REGULER', 15000, 18000, 2, 6, 'PCS', 'x'),
(130, 'XL REGULER', 0, 3000, 1, 9, 'PCS', 'x'),
(131, 'TRI REGULER', 3000, 5000, 1, 0, 'PCS', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailpembelian`
--

CREATE TABLE `tb_detailpembelian` (
  `id_detailbeli` int(11) NOT NULL,
  `id_pembelian` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_awal` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailpembelian`
--

INSERT INTO `tb_detailpembelian` (`id_detailbeli`, `id_pembelian`, `id_barang`, `harga_awal`, `harga_jual`, `qty`, `subtotal`) VALUES
(3, 'TRS-050119142029', 73, 13600, 16000, 1, 16000),
(4, 'TRS-050119142029', 73, 13600, 16000, 1, 16000),
(5, 'TRS-050119142029', 73, 13600, 16000, 1, 16000),
(6, 'TRS-050119142111', 106, 10500, 12000, 1, 12000),
(7, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(8, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(9, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(10, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(11, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(12, 'TRS-050119145850', 69, 20500, 23000, 1, 23000),
(13, 'TRS-050119145901', 88, 30000, 33000, 1, 33000),
(14, 'TRS-050119145901', 88, 30000, 33000, 1, 33000),
(15, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(16, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(17, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(18, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(19, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(20, 'TRS-050119145914', 74, 23000, 26000, 1, 26000),
(21, 'TRS-050119150022', 77, 59000, 64000, 1, 64000),
(22, 'TRS-050119150255', 73, 13600, 16000, 1, 16000),
(23, 'TRS-050119150255', 75, 29000, 32000, 1, 32000),
(24, 'TRS-050119150255', 91, 75500, 79000, 1, 79000),
(25, 'TRS-050119150255', 85, 13250, 15000, 1, 15000),
(26, 'TRS-050119150255', 86, 29250, 31000, 1, 31000),
(27, 'TRS-050119150255', 87, 18250, 21000, 1, 21000),
(28, 'TRS-050119150255', 88, 30000, 33000, 1, 33000),
(29, 'TRS-050119150255', 89, 42500, 45000, 1, 45000),
(30, 'TRS-050119150255', 90, 58500, 62000, 1, 62000),
(31, 'TRS-050119150255', 81, 27000, 30000, 1, 30000),
(32, 'TRS-050119150255', 82, 37000, 40000, 1, 40000),
(33, 'TRS-050119150255', 83, 57500, 60000, 1, 60000),
(34, 'TRS-050119150255', 84, 85000, 90000, 1, 90000),
(35, 'TRS-050119150255', 130, 0, 3000, 1, 3000),
(36, 'TRS-050119150255', 116, 30000, 34000, 1, 34000),
(37, 'TRS-050119150255', 115, 17000, 20000, 1, 20000),
(38, 'TRS-050119150255', 117, 44000, 49000, 1, 49000),
(39, 'TRS-050119150255', 118, 13000, 15000, 1, 15000),
(40, 'TRS-050119150255', 119, 24000, 28000, 1, 28000),
(41, 'TRS-050119150255', 120, 17000, 20000, 1, 20000),
(42, 'TRS-050119150556', 111, 18000, 27000, 1, 27000),
(43, 'TRS-050119150556', 112, 35000, 45000, 1, 45000),
(44, 'TRS-050119150556', 113, 35000, 50000, 1, 50000),
(45, 'TRS-050119150556', 114, 60000, 65000, 1, 65000),
(46, 'TRS-050119150556', 127, 3000, 7000, 1, 7000),
(47, 'TRS-050119150556', 92, 8250, 9000, 1, 9000),
(48, 'TRS-050119150556', 93, 12000, 14000, 1, 14000),
(49, 'TRS-050119150556', 94, 11000, 13000, 1, 13000),
(50, 'TRS-050119150556', 95, 14400, 17000, 1, 17000),
(51, 'TRS-050119150556', 96, 31000, 33000, 1, 33000),
(52, 'TRS-050119150556', 97, 20250, 22000, 1, 22000),
(53, 'TRS-200120093121', 109, 54750, 60000, 1, 60000),
(54, 'TRS-200120093121', 86, 29250, 31000, 1, 31000),
(55, 'TRS-220620154309', 68, 11500, 14000, 1, 14000);

--
-- Triggers `tb_detailpembelian`
--
DELIMITER $$
CREATE TRIGGER `Kurang_Stok` AFTER INSERT ON `tb_detailpembelian` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok_b=stok_b-NEW.qty
    where id_barang=NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `tb_detailpembelian` FOR EACH ROW BEGIN
	UPDATE tb_barang set stok_b = stok_b + OLD.qty WHERE
    id_barang = OLD.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `jenis_level` enum('Kasir','Admin','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `jenis_level`) VALUES
(1, 'Pimpinan'),
(2, 'Admin'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_beli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user`, `tanggal_beli`) VALUES
('TRS-050119142029', 10, '2019-01-05 14:20:29'),
('TRS-050119142111', 10, '2019-01-05 14:21:11'),
('TRS-050119145850', 10, '2019-01-05 14:58:50'),
('TRS-050119145901', 10, '2019-01-05 14:59:01'),
('TRS-050119145914', 10, '2019-01-05 14:59:14'),
('TRS-050119150022', 10, '2019-01-05 15:00:22'),
('TRS-050119150255', 10, '2019-01-05 15:02:55'),
('TRS-050119150556', 10, '2019-01-05 15:05:56'),
('TRS-200120093121', 10, '2020-01-20 09:31:21'),
('TRS-220620154309', 10, '2020-06-22 15:43:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detailpembelian`
--
ALTER TABLE `tb_detailpembelian`
  ADD PRIMARY KEY (`id_detailbeli`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_detailpembelian`
--
ALTER TABLE `tb_detailpembelian`
  MODIFY `id_detailbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detailpembelian`
--
ALTER TABLE `tb_detailpembelian`
  ADD CONSTRAINT `tb_detailpembelian_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `tb_pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
