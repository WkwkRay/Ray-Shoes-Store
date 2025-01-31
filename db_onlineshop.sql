-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 01:58 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_onlineshop_20241`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Eka Praja Wiyata Mandala');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `idanggota` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`idanggota`, `email`, `password`, `nama`, `jk`, `tgllahir`, `alamat`, `nohp`, `foto`, `tgldaftar`) VALUES
(1, 'member@gmail.com', 'member123', 'Member Baru', 'L', '1985-01-02', 'Lubuk Begalung', '081234567890', '8.jpg', '2025-01-02 13:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL,
  `tglcart` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `jasakirim`
--

CREATE TABLE IF NOT EXISTS `jasakirim` (
  `idjasa` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `detail` text NOT NULL,
  `tarif` double NOT NULL,
  PRIMARY KEY (`idjasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jasakirim`
--

INSERT INTO `jasakirim` (`idjasa`, `idadmin`, `nama`, `logo`, `detail`, `tarif`) VALUES
(1, 1, 'JNE', 'jne.jpg', 'Perusahaan yang berdiri sejak 1990 ini menawarkan 4 jenis layanan pengiriman barang, antara lain OKE (Ongkos Kirim Ekonomis), REG (Reguler), YES (Yakin Esok Sampai), dan SS (Super Speed)', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkat` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `namakat` varchar(40) NOT NULL,
  `ketkat` text NOT NULL,
  `tglkat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkat`, `idadmin`, `namakat`, `ketkat`, `tglkat`) VALUES
(1, 1, 'Handphone', 'Semua produk yang berkaitan dengan handphone', '2024-12-09 10:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `idorder` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `idjasa` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `noorder` double NOT NULL,
  `idanggota` int(11) NOT NULL,
  `alamatkirim` text NOT NULL,
  `total` double NOT NULL,
  `tglorder` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statusorder` varchar(20) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `detail` text NOT NULL,
  `diskon` int(11) NOT NULL,
  `berat` float NOT NULL,
  `isikotak` text NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `tglproduk` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkat`, `idadmin`, `nama`, `harga`, `stok`, `spesifikasi`, `detail`, `diskon`, `berat`, `isikotak`, `foto1`, `foto2`, `tglproduk`) VALUES
(1, 1, 1, 'Samsung Galaxy J5 2016 - 16GB - Emas', 2500000, 4, 'Layar 5.2" Super AMOLED<br />\r\nSistem Operasi Android<br />\r\nDual Kamera 13MP + 5 MP<br />\r\n2 GB RAM + 16 GB ROM<br />\r\nQuad-core 1.2 GHz', 'Kombinasi antara performa optimal disertai dengan desain elegan nan premium. Keduanya bisa didapatkan dari Samsung Galaxy J5 satu ini. Meluncurkan smartphone dengan platform Android, Samsung menghadirkan ponsel cerdas dengan kualitas dapur pacu mengagumkan untuk beragam kebutuhan Anda setiap hari: RAM mumpuni sebesar 2 GB yang ditandem dengan prosesor Quad-Core 1,2 GHz. Dilengkapi pula dengan desain yang ergonomis, Samsung Galaxy J5 bisa jadi pilihan untuk melengkapi segala kegiatan Anda.<br />\r\n<br />\r\nOptimalisasi Dapur Pacu<br />\r\nSamsung Galaxy J5 hadir dengan kemampuan dapur pacu luar biasa. Untuk menunjang kebutuhan Anda, ponsel cerdas besutan Samsung ini dibekali dengan prosesor QuadCore 1,2 GHz. Rasakan kemulusan operasi saat membuka berbagai macam aplikasi tanpa hambatan. Didukung pula dengan RAM sebesar 2 GB, membuka beragam aplikasi dalam waktu bersamaan juga tetap lancar tanpa lagging. Anda bisa melakukan multitasking menjelajah internet sembari mengakses email dan mendengarkan lagu dengan mulus tanpa hambatan.<br />\r\n<br />\r\nKapasitas Besar<br />\r\nRatusan foto, video, aplikasi, hingga banyaknya unduhan bukan masalah dengan ponsel yang satu ini. Ponsel cerdas Samsung ini kapasitas memori internal 16 GB yang dibenamkan di dalamnya memastikan penyimpanan beragam data yang besar dan mudah. Dilengkapi pula dengan slot microSD hingga 128 GB, Anda bisa perbesar kapasitas simpan dengan mudah. Ambil semua foto, rekam semua video dan unduh semua data tanpa ragu!<br />\r\n<br />\r\nLayar Luas nan Jernih<br />\r\nHadir dengan layar jernih sebesar 5.2", Samsung Galaxy J5 memberikan keleluasaan bagi jemari Anda untuk bergerak bebas di atas layar. Jutaan warna yang nyata siap menemani Anda menjelajah berbagai konten dengan nyaman. Dibekali pula dengan layar Super AMOLED dengan resolusi HD 720 x 1280p, Samsung memastikan Anda akan menikmati kualitas gambar yang jernih dan tajam dalam mengkases berbagai konten visual yang akan memanjakan mata Anda.<br />\r\n<br />\r\nTahan Seharian!<br />\r\nSamsung Galaxy J5 dibekali dengan baterai berkapasitas sebesar 3100 mAh. Kapasitasnya yang besar membuatnya mampu bertahan seharian tanpa masalah. Cukup dengan satu kali pengisian selama 2 jam, akses dunia dalam genggaman selama sehari penuh tanpa pengisian ulang. Dilengkapi pula dengan moda pengatur kecerahan, Anda bisa mengatur ketahanan baterai sesuai dengan kebutuhan Anda sehari-hari.<br />\r\n<br />\r\nKamera Impresif<br />\r\nRekam setiap jejak kehidupan yang begitu menyenangkan bersama orang-orang terdekat Anda! Melengkapi kebutuhan Anda untuk setiap kesempatan, Samsung hadir dengan kualitas kamera yang begitu impresif. Kamera belakang dengan resolusi 13 megapiksel dengan sensor CMOS membuat hasil jepretan yang lebih tajam sekalipun dalam kondisi minim cahaya berkat fitur lampu kilat LED. Selain itu, pengaturan kamera yang mudah dalam satu sentuhan juga memastikan Anda dapat menangkap beragam foto terbaik dengan mudah. Sementara bagi penggemar selfie dan pengguna video call, Samsung Galaxy J5 juga hadir dengan kamera depan sebesar 5 megapiksel untuk hasil gambar yang tetap jernih dan tajam. Dan bagi Anda yang ingin merekam momen lebih utuh, rekam video berkualits HD 1080p/30 fps dengan Samsung Galaxy J5.<br />\r\n<br />\r\nOS Teranyar<br />\r\nHadir dengan OS Android, Samsung Galaxy J5 dioptimalisasikan untuk memberi pengalaman terbaik saat menggunakan Android. Nikmati jutaan aplikasi lifestyle, games, hingga bisnis dan hiburan dengan satu sentuhan di Google PlayStore. Dengan ponsel Samsung, lengkapi segala kebutuhan Anda dengan dunia dalam genggaman.<br />\r\n<br />\r\nDesain Ergonomis<br />\r\nTipis nan kokoh. Samsung Galaxy J5 menawarkan perpaduan desain premium dalam balutan bodi yang kokoh. Menggunakan material yang dipilih khusus serta presisi kelas satu, Samsung mempersembahkan ponsel yang tangguh sekaligus tetap terasa nyaman dalam genggaman. Ukurannya sebesar 5.2" memastikan ia tetap terasa tipis dan pas di tangan. Hadir dengan pilihan warna yang elegan, Samsung Galaxy J5 bukan hanya sekedar alat komunikasi, namun cerminan ekspresi diri Anda!', 5, 1, '1 x Samsung Galaxy J5 2016 - 16GB<br />\r\n1 x Charger<br />\r\n1 x Panduan Penggunaan<br />\r\n1 x Kartu', 'samsung-galaxy-j5-2016-16gb-emas-3636-4945968-4ebaf8b5e780aa.jpg', 'samsung-galaxy-j5-2016-16gb-emas-3636-4945968-4ebaf8b5e780aa.jpg', '2024-12-09 10:57:27');
