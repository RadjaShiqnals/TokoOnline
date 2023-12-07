-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `pengarang`, `foto`, `harga`, `tag`) VALUES
(1, 'MP5', 'MP5 adalah senapan mesin sub-kompak yang dikembangkan oleh perusahaan Jerman, Heckler & Koch. Ini merupakan senjata serbaguna yang terkenal karena desainnya yang andal, akurat, dan ringan.', 'Heckler & Koch', 'MP5.png', 7920000, 'gun'),
(2, 'Hacking Guide Book', 'Ini merupakan sebuah buku berisi langkah - langkah dan cara untuk memiliki skill meretas dunia digital', 'Abhinav Ojha', 'HackGuideBook.jpg', 120000, 'book'),
(3, 'Minigun', 'The M134 Minigun is a high-speed rotary machine gun with six barrels chambered for American 7.62×51mm NATO rounds. It has a Gatling-style rotating barrel assembly powered by an external source, typically an electric motor.', 'General Electric', 'minigun.png', 2141500000, 'gun'),
(4, 'Dark Manipulation', 'Mind Hacking, How To Analyze People, Empath Healing, The Psychology Of Persuasion, Human Behaviour 101, Neuro Linguistic Brainwashing', 'John Dark', 'DarkManipulation.png', 250000, 'book');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `pengarang`, `deskripsi`, `foto`, `harga`) VALUES
(1, 'Minecraft', 'Mojang', 'Ini adalah game Minecraft', 'minecraft.png', '65.000'),
(2, 'Aura GX', 'Opera GX', 'Opera GX malas kerja, malahan jadi Vtuber', 'auragx.png', 'Free'),
(3, 'Youtube', 'Google', 'YouTube adalah sebuah situs web berbagi video yang memungkinkan pengguna untuk menyimpan, menonton, dan membagikan video secara publik', 'youtube.png', '2,807,460,000,000,000'),
(4, 'Teman Laknat', 'Rahasia', 'Dia adalah teman yang saya jual karena sudah keterlaluan', 'teman.jpg', 'Free (Ambil aja)');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman_barang`
--

CREATE TABLE `detail_peminjaman_barang` (
  `id_detail_peminjaman_barang` int(11) NOT NULL,
  `id_peminjaman_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman_barang`
--

INSERT INTO `detail_peminjaman_barang` (`id_detail_peminjaman_barang`, `id_peminjaman_barang`, `id_barang`, `qty`) VALUES
(1, 1, 2, 1),
(2, 1, 4, 3),
(4, 2, 2, 3),
(3, 2, 4, 4),
(6, 3, 2, 2),
(5, 3, 3, 3),
(7, 3, 4, 13),
(9, 4, 1, 1),
(8, 4, 2, 3),
(10, 5, 2, 2),
(11, 5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `angkatan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kelompok`, `angkatan`) VALUES
(1, '11 RPL 2', 'LARAVEL', 31),
(2, '10 TKJ 2', 'MULTIMEDIA', 32),
(3, '12 RPL 3', 'NODEJS', 30),
(4, '12 TKJ 4', 'MULTIMEDIA', 30),
(5, 'ADMIN', 'RAHASIA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id_peminjaman_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_barang`
--

INSERT INTO `peminjaman_barang` (`id_peminjaman_barang`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 3, '2023-10-11', '2023-10-16'),
(2, 3, '2023-10-11', '2023-10-16'),
(3, 3, '2023-10-11', '2023-10-16'),
(4, 1, '2023-10-16', '2023-10-21'),
(5, 6, '2023-12-06', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_barang`
--

CREATE TABLE `pengembalian_barang` (
  `id_pengembalian_barang` int(11) NOT NULL,
  `id_peminjaman_barang` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian_barang`
--

INSERT INTO `pengembalian_barang` (`id_pengembalian_barang`, `id_peminjaman_barang`, `tanggal_pengembalian`, `denda`) VALUES
(1, 4, '2023-12-06', 80000),
(2, 5, '2023-12-06', 0),
(3, 3, '2023-12-06', 105000);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `tanggal_lahir`, `gender`, `alamat`, `username`, `password`, `id_kelas`) VALUES
(1, 'Radja', '2006-04-03', 'L', 'Rahasian AJAdwadwd', 'radjagentadwa', 'ggg', 1),
(2, 'Orang Randomddds', '2005-06-29', 'L', 'Rahasiain JUGA', 'Randoming', 'daw', 1),
(66, 'Radja Genta Saputras', '2006-04-03', 'L', 'Rahasian AJA', 'radjagenta', 'dss', 2),
(68, 'Admin', '2024-01-01', 'L', 'Rahasia', 'admin', 'admin', 5),
(69, 'User', '2023-08-10', 'L', 'Rahasia', 'user', 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `specialty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `login`, `password`, `age`, `specialty`) VALUES
(1, 'Admin', 'admin', 'admin', 21, 'Full Stack Developer'),
(2, 'User', 'user', 'user', 17, 'Backend Developer'),
(3, 'Longest Username Ever', 'long', 'longest', 22, 'Secret'),
(4, 'cc', 's', 'd', 0, ''),
(5, 'akunbaru', 'baruin', 'baruinaja', 0, ''),
(6, 'NicoLee', 'Nico', 'Nico2', 17, 'Koding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman_barang`
--
ALTER TABLE `detail_peminjaman_barang`
  ADD PRIMARY KEY (`id_detail_peminjaman_barang`),
  ADD KEY `id_peminjaman_buku` (`id_peminjaman_barang`,`id_barang`,`qty`),
  ADD KEY `id_buku` (`id_barang`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id_peminjaman_barang`),
  ADD KEY `id_siswa` (`id_user`);

--
-- Indexes for table `pengembalian_barang`
--
ALTER TABLE `pengembalian_barang`
  ADD PRIMARY KEY (`id_pengembalian_barang`),
  ADD KEY `id_peminjaman_buku` (`id_peminjaman_barang`,`denda`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_peminjaman_barang`
--
ALTER TABLE `detail_peminjaman_barang`
  MODIFY `id_detail_peminjaman_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id_peminjaman_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian_barang`
--
ALTER TABLE `pengembalian_barang`
  MODIFY `id_pengembalian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman_barang`
--
ALTER TABLE `detail_peminjaman_barang`
  ADD CONSTRAINT `detail_peminjaman_barang_ibfk_1` FOREIGN KEY (`id_peminjaman_barang`) REFERENCES `peminjaman_barang` (`id_peminjaman_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD CONSTRAINT `peminjaman_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian_barang`
--
ALTER TABLE `pengembalian_barang`
  ADD CONSTRAINT `pengembalian_barang_ibfk_1` FOREIGN KEY (`id_peminjaman_barang`) REFERENCES `peminjaman_barang` (`id_peminjaman_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
