-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dbpus.tbanggota
CREATE TABLE IF NOT EXISTS `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbpus.tbanggota: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbanggota` DISABLE KEYS */;
INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`) VALUES
	('202', 'Ali Ahmadi', 'Pria', 'ddd', 'Sedang Meminjam'),
	('AG001', 'Riki Subekti', 'Pria', 'Jl.Semangka No 3', 'Tidak Meminjam'),
	('AG002', 'Aini Rahmawati', 'Wanita', 'Jl.Anggrek No 45', 'Sedang Meminjam'),
	('AG003', 'Rudi Hartono', 'Pria', 'Jl.Manggis 98', 'Sedang Meminjam'),
	('AG004', 'Dino Riano', 'Pria', 'Jl.Melon No 33', 'Sedang Meminjam'),
	('AG005', 'Agus Wardoyo', 'Pria', 'Jl.Cempedak No 88', 'Tidak Meminjam'),
	('AG006', 'Shinta Riani', 'Wanita', 'JL.Jeruk No 1', 'Sedang Meminjam'),
	('AG007', 'Irwan Hakim', 'Pria', 'Jl.Salak No 34', 'Tidak Meminjam'),
	('AG008', 'Indah Dian', 'Wanita', 'Jl.Semangka No 23', 'Tidak Meminjam'),
	('AG009', 'Rina Auliah', 'Wanita', 'Jl.Merpati No 44', 'Tidak Meminjam'),
	('AG010', 'Septi Putri', 'Wanita', 'Jl.Beringin No 2', 'Tidak Meminjam'),
	('AG014', 'Rangga', 'Pria', 'Jl.Manggis No 41', 'Tidak Meminjam');
/*!40000 ALTER TABLE `tbanggota` ENABLE KEYS */;

-- Dumping structure for table dbpus.tbbuku
CREATE TABLE IF NOT EXISTS `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbpus.tbbuku: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbbuku` DISABLE KEYS */;
INSERT INTO `tbbuku` (`idbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`) VALUES
	('BK001', 'Belajar PHP', 'Ilmu Komputer', 'Candra', 'Media Baca', 'Dipinjam'),
	('BK002', 'Belajar HTML', 'Ilmu Komputer', 'Rahmat Hakim', 'Media Baca', 'Dipinjam'),
	('BK003', 'Kumpulan Puisi', 'Karya Sastra', 'Bejo', 'Media Kita', 'Tersedia'),
	('BK004', 'Sejarah Islam', 'Ilmu Agama', 'Sutejo', 'Media Kita', 'Dipinjam'),
	('BK005', 'Pintar CSS', 'Ilmu Komputer', 'Anton', 'Graha Buku', 'Tersedia'),
	('BK006', 'Kumpulan Cerpen', 'Karya Sastra', 'Rudi', 'Media Aksara', 'Dipinjam'),
	('BK007', 'Keamanan Data', 'Ilmu Komputer', 'Nusron', 'Media Cipta', 'Dipinjam'),
	('BK008', 'Dasar-Dasar Database', 'Ilmu Komputer', 'Andi', 'Graha Media', 'Tersedia'),
	('BK009', 'Kumpulan Cerpen 2', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia'),
	('BK010', 'Peradaban Islam', 'Ilmu Agama', 'Aminnudin', 'Media Baca', 'Tersedia'),
	('BK011', 'Kumpulan Cerpen 3', 'Karya Sastra', 'Rudi', 'Media Baca', 'Tersedia'),
	('BK012', 'Teknologi Informasi', 'Ilmu Komputer', 'Andi A', 'Media Baca', 'Tersedia'),
	('BK013', 'Dermaga Biru', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia');
/*!40000 ALTER TABLE `tbbuku` ENABLE KEYS */;

-- Dumping structure for table dbpus.tbtransaksi
CREATE TABLE IF NOT EXISTS `tbtransaksi` (
  `idtransaksi` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbpus.tbtransaksi: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbtransaksi` DISABLE KEYS */;
INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`) VALUES
	('TR001', 'AG002', 'BK002', '2016-11-03', '0000-00-00'),
	('TR002', 'AG003', 'BK003', '2016-11-04', '2016-11-04'),
	('TR003', 'AG001', 'BK001', '2016-11-04', '2021-02-23'),
	('TR004', 'AG003', 'BK003', '2016-11-04', '2016-11-04'),
	('TR005', 'AG006', 'BK004', '2016-11-04', '2021-02-23'),
	('TR006', 'AG003', 'BK005', '2016-11-05', '2016-11-05'),
	('TR007', 'AG008', 'BK013', '2016-11-05', '2021-02-23'),
	('TR031', 'AG010', 'BK003', '2017-01-22', '2021-02-23');
/*!40000 ALTER TABLE `tbtransaksi` ENABLE KEYS */;

-- Dumping structure for table dbpus.tbuser
CREATE TABLE IF NOT EXISTS `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbpus.tbuser: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbuser` DISABLE KEYS */;
INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
	('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');
/*!40000 ALTER TABLE `tbuser` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
