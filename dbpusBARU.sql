-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 01:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nm_admin`) VALUES
(1, 'jwd', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('123', '1111', 'Wanita', 'fdsafdafdd', 'Tidak Meminjam', '123.png'),
('123123', 'asd', 'Wanita', 'sadsa', 'Tidak Meminjam', '123123.png'),
('AG001', 'Riki Subekti', 'Pria', 'Jl.Semangka No 3', 'Tidak Meminjam', ''),
('AG002', 'Aini Rahmawati', 'Wanita', 'Jl.Anggrek No 45', 'Sedang Meminjam', ''),
('AG003', 'Rudi Hartono', 'Pria', 'Jl.Manggis 98', 'Sedang Meminjam', ''),
('AG004', 'Dino Riano', 'Pria', 'Jl.Melon No 33', 'Sedang Meminjam', ''),
('AG005', 'Agus Wardoyo', 'Pria', 'Jl.Cempedak No 88', 'Tidak Meminjam', ''),
('AG006', 'Shinta Riani', 'Wanita', 'JL.Jeruk No 1', 'Sedang Meminjam', ''),
('AG007', 'Irwan Hakim', 'Pria', 'Jl.Salak No 34', 'Tidak Meminjam', ''),
('AG008', 'Indah Dian', 'Wanita', 'Jl.Semangka No 23', 'Tidak Meminjam', ''),
('AG009', 'Rina Auliah', 'Wanita', 'Jl.Merpati No 44', 'Tidak Meminjam', ''),
('AG010', 'Septi Putri', 'Wanita', 'Jl.Beringin No 2', 'Tidak Meminjam', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`, `foto`) VALUES
('123', '1234', '1', '1', '1', '1', '123.png'),
('BK002', 'Belajar HTMLS', 'Ilmu Komputer', 'Rahmat Hakim', 'Media Baca', 'Dipinjam', ''),
('BK003', 'Kumpulan Puisi', 'Karya Sastra', 'Bejo', 'Media Kita', 'Tersedia', ''),
('BK004', 'Sejarah Islam', 'Ilmu Agama', 'Sutejo', 'Media Kita', 'Dipinjam', ''),
('BK005', 'Pintar CSS', 'Ilmu Komputer', 'Anton', 'Graha Buku', 'Tersedia', ''),
('BK006', 'Kumpulan Cerpen', 'Karya Sastra', 'Rudi', 'Media Aksara', 'Dipinjam', ''),
('BK007', 'Keamanan Data', 'Ilmu Komputer', 'Nusron', 'Media Cipta', 'Dipinjam', ''),
('BK008', 'Dasar-Dasar Database', 'Ilmu Komputer', 'Andi', 'Graha Media', 'Tersedia', ''),
('BK009', 'Kumpulan Cerpen 2', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia', ''),
('BK010', 'Peradaban Islam', 'Ilmu Agama', 'Aminnudin', 'Media Baca', 'Tersedia', ''),
('BK011', 'Kumpulan Cerpen 3', 'Karya Sastra', 'Rudi', 'Media Baca', 'Tersedia', ''),
('BK012', 'Teknologi Informasi', 'Ilmu Komputer', 'Andi A', 'Media Baca', 'Tersedia', ''),
('BK013', 'Dermaga Biru', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(255) NOT NULL,
  `idanggota` varchar(255) NOT NULL,
  `idbuku` varchar(255) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`) VALUES
('ADSADASD', 'AG002', 'BK013', '2021-08-22', '2021-08-22'),
('COBA', 'AG001', 'BK013', '2021-08-22', '0000-00-00'),
('TR001', 'AG002', 'BK002', '2016-11-03', '0000-00-00'),
('TR002', 'AG003', 'BK003', '2016-11-04', '2000-08-14'),
('TR003', 'AG001', 'BK001', '2016-11-04', '2021-02-23'),
('TR004', 'AG003', 'BK003', '2016-11-04', '2016-11-04'),
('TR005', 'AG006', 'BK004', '2016-11-04', '2021-02-23'),
('TR006', 'AG003', 'BK005', '2016-11-05', '2016-11-05'),
('TR007', 'AG008', 'BK013', '2016-11-05', '2021-02-23'),
('TR031', 'AG010', 'BK003', '2017-01-22', '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
