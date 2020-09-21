-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Sep 2020 pada 17.14
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(5) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_stat_hbkel` varchar(18) NOT NULL,
  `no_rt` int(5) NOT NULL,
  `tanggal_create` date NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_penduduk`
--

INSERT INTO `data_penduduk` (`id_penduduk`, `no_kk`, `nik`, `nama_lengkap`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `id_stat_hbkel`, `no_rt`, `tanggal_create`, `tanggal_update`) VALUES
(10, 'ececce', 'decec', 'ecec', '2020-08-31', 68, 'Perempuan', '', 0, '2020-09-28', '2020-09-27'),
(12, '6403062111120002', '6403064902130001', 'AISYAH MUMTAZAH', '2013-02-09', 7, 'Perempuan', 'Anak', 1, '2016-09-19', '2020-09-21'),
(13, '6403062407080042', '6403064107710003', 'AINUN ZARIAH', '1971-07-01', 49, 'Perempuan', 'Istri', 1, '2016-09-19', '2020-09-21'),
(14, '6403062609130003', '6403062804140001', 'AHMAD IMAM AL HAFIZH', '2014-04-28', 6, 'Laki-laki', 'Anak', 1, '2016-09-19', '2020-09-21'),
(15, '6403062307080036', '6403060107670002', 'AHMAD', '1967-07-01', 53, 'Laki-laki', 'Kepala Keluarga', 1, '2016-09-19', '2020-09-21'),
(16, '6403062307080058', '6403061307850001', 'AGUS RIADI', '1985-07-13', 35, 'Laki-laki', 'Famili Lain', 1, '2016-09-19', '2020-09-21'),
(17, '6403062407080057', '6403061907080001', 'AFGHAN AL-BANNA', '2008-07-19', 12, 'Laki-laki', 'Anak', 1, '2016-09-19', '2020-09-15'),
(18, '6403061211150002', '6403064209980001', 'ADE MARPINA', '1998-09-02', 22, 'Perempuan', 'Istri', 28, '2016-09-19', '2020-09-21'),
(19, '6403060211090003', '6403060702100001', 'ABDUL WAHID SAPARUDDIN', '2010-02-07', 10, 'Laki-laki', 'Anak', 3, '2020-09-21', '2020-09-21'),
(20, '6403062407080023', '6403062007040001', 'ABDUL RAHMAN', '2004-07-20', 16, 'Laki-laki', 'Anak', 1, '2016-09-19', '2020-09-21'),
(21, '6403062407080010', '6403061801610001', 'ABDUL RAHMAN', '1961-01-18', 59, 'Laki-laki', 'Famili Lain', 1, '2016-09-19', '2020-09-21'),
(22, '6403062407080079', '6403061503770001', 'ABDUL MUIS', '1977-03-15', 43, 'Laki-laki', 'Kepala Keluarga', 1, '2016-09-19', '2020-09-21'),
(23, '6403062407080001', '6403060101670001', 'ABDUL MAJID', '1967-01-01', 53, 'Laki-laki', 'Kepala Keluarga', 10, '2016-09-19', '2020-09-21'),
(24, '6403060211090003', '6403060902140001', 'ABDUL HABIB MAULANA', '2014-02-09', 6, 'Laki-laki', 'Anak', 1, '2016-09-19', '2016-09-19'),
(25, '6403061702150001', '6403060709150001', 'ABDIAN SYAH PRATAMA', '2015-09-07', 5, 'Laki-laki', 'Anak', 1, '2016-09-19', '2016-09-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungan_keluarga`
--

CREATE TABLE `hubungan_keluarga` (
  `id_stat_hbkel` int(11) NOT NULL,
  `stat_hbkel` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungan_keluarga`
--

INSERT INTO `hubungan_keluarga` (`id_stat_hbkel`, `stat_hbkel`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Istri'),
(4, 'Anak'),
(5, 'Menantu'),
(6, 'Cucu'),
(7, 'Orang Tua'),
(8, 'Mertua'),
(9, 'Famili Lain'),
(10, 'Pembantu'),
(11, 'Lainnya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  ADD PRIMARY KEY (`id_stat_hbkel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  MODIFY `id_stat_hbkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
