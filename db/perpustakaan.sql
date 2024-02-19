-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 04:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `BukuID` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `TahunTerbit` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `KategoriID`, `Stok`, `Gambar`) VALUES
(1, 'ok', '23', '828', 82882, 0, 100, ''),
(7, 'Harry Potter', 'Jj', 'Lor', 2013, 1, 69, 'Harry Potter And The Goblet Of Fire.jpg'),
(8, 'Lord Of The ring', 'jrr', 'jrr tolkien', 2015, 1, 50, 'lotr.jpg'),
(9, 'The Hobbit', 'Jrr Tolkien', 'Tolkien Univers', 2006, 1, 30, 'the hobbit.jpg'),
(10, 'Hantu Rumah Kos', 'Dika ', 'Kim Universe', 2018, 5, 30, 'hantu.jpg'),
(11, 'Bleach', 'Tite Kubo', 'Tite', 2019, 7, 4, 'bleach.jpg'),
(12, 'Vagabond', 'Tito', 'Murasaki Corp', 2009, 7, 40, 'vagabond.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`KategoriID`, `NamaKategori`) VALUES
(1, 'Fiksis'),
(5, 'Horors'),
(6, 'ok'),
(7, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `BukuID`, `KategoriID`) VALUES
(1, 0, 1),
(2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`koleksiID`, `UserID`, `BukuID`) VALUES
(3, 0, 7),
(9, 20, 9),
(10, 20, 7),
(11, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `TanggalPeminjaman` date NOT NULL,
  `TanggalPengembalian` date NOT NULL,
  `StatusPeminjaman` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`, `Jumlah`, `Denda`) VALUES
(32, 20, 7, '2024-02-18', '2024-02-29', 'selesai', 20, 20000),
(33, 20, 7, '2024-02-19', '2024-02-19', 'dipinjam', 1, 0),
(34, 20, 11, '2024-02-19', '2024-02-19', 'dipesan', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `Ulasan` text NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`UlasanID`, `UserID`, `BukuID`, `Ulasan`, `Rating`) VALUES
(1, 6, 4, 'AKU BENCI buku ini semuanya jelek isinya jelek qodnqndjqndjqnoqndjnqondqondqndjwqndoqndonqowdnqondoqndoqnoqnjq\r\n', 5),
(2, 6, 4, 'okkkk\r\n', 4),
(3, 6, 4, 'bagus', 0),
(4, 6, 4, 'ok', 0),
(5, 6, 4, 'caa', 0),
(6, 6, 4, 'kimak', 1),
(7, 6, 4, 'ok', 2),
(8, 6, 4, 'keren\r\n\r\n', 5),
(9, 20, 4, 'jelek', 5),
(10, 20, 8, 'keren', 5),
(11, 20, 7, 'Baguss', 5),
(12, 20, 11, 'Bagus Banget', 5),
(13, 20, 8, 'Bagus', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `Level`) VALUES
(1, 'andis', 'ok', '345@gmail.comm', 'AndiSulaiman', 'bojonegoroo', ''),
(6, 'Dolwosss', '202cb962ac59075b964b07152d234b70', '123@gmail.com', '123', '123', 'user'),
(7, '7', '123', '29393', 'ok', 'oke', 'user'),
(12, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ok', '123', 'admin'),
(14, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'ok', 'ok', 'ok', 'petugas'),
(15, 'ok', '24b43fb034a10d78bec71274033b4096', '30929', 'Okiei', '292mks\r\n', 'petugas'),
(16, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin@gmail.com', 'admin123', 'kenjeran\r\n', 'user'),
(17, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'ok', 'ok', 'ok', 'admin'),
(18, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '28', '8', '882', 'admin'),
(19, 'petugas', '202cb962ac59075b964b07152d234b70', '124', '124', '123\r\n', 'petugas'),
(20, 'user', 'ef7d9bb8ab1d658266294bfbb1937c6a', 'user@gmail.com', 'userrrr', 'kamboja', 'user'),
(21, '121', 'd41d8cd98f00b204e9800998ecf8427e', '212@gmail.com', '121', '21', 'user'),
(22, '121', '4a716f7ba05468f225127f29aa2040c5', '212@gmail.com', '121', '21', 'user'),
(23, '121', '4a716f7ba05468f225127f29aa2040c5', '212@gmail.com', '121', '21', 'user'),
(24, '121', '4a716f7ba05468f225127f29aa2040c5', '212@gmail.com', '121', '21', 'user'),
(25, 'user1', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', 'ww iqiqi', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
