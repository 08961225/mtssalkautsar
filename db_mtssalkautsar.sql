-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 22 Bulan Mei 2022 pada 14.52
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mtssalkautsar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `motto` varchar(100) NOT NULL,
  `motivasi` varchar(500) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nuptk`, `nama_guru`, `email`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_hp`, `motto`, `motivasi`) VALUES
('71003801', '-', 'Muhammad Afifuddin', 'muhamadafifuddin1997@gmail.com', 'Cimanggu Pesantren', 'Laki-Laki', 'Bogor', '1997-11-20', 'Islam', '089612258418', 'Never Surender', 'Teruslah menginjak bumi'),
('71003802', '-', 'Syahrul Mubarok, S.Pd', 'syahrulmb92@gmail.com', 'KEDUNG HALANG PONCOL ', 'Laki-Laki', 'Bogor', '1989-06-21', 'Islam', '0895344159406', 'Bertambah tua itu bukan berarti kehilangan masa muda', 'Jangan menunggu.'),
('71003803', '-', 'Ahmad Husen, S.Pd.I', 'ahhusen98@gmail.com', 'KEDUNG HALANG PONCOL ', 'Laki-Laki', 'Bogor', '1983-10-29', 'Islam', '08179187365', 'Berjuanglah seakan-akan nyawamu sedang dipertaruhkan.', 'Jangan biarkan hari kemarin merenggut banyak hal hari ini.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(50) NOT NULL,
  `id_periode` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_ruangan`, `id_periode`) VALUES
(1, 'Kelas 7', '3'),
(2, 'Kelas 8', '2'),
(3, 'Kelas 9', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id_mata_pelajaran` int(5) NOT NULL AUTO_INCREMENT,
  `kode_pelajaran` varchar(10) NOT NULL,
  `nama_pelajaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode_pelajaran`, `nama_pelajaran`) VALUES
(1, 'MTK', 'Matematika'),
(2, 'AGM', 'Agama'),
(3, 'SJR', 'Sejarah'),
(4, 'ENG', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(5) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `id_mata_pelajaran` int(2) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `id_periode` int(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_mata_pelajaran`, `nip`, `nilai`, `id_periode`) VALUES
(6, '210001', 1, '12345678', '10', 1),
(7, '210001', 2, '12345678', '10', 1),
(8, '210001', 1, '12345678', '10', 1),
(9, '210001', 2, '12345678', '10', 1),
(10, '210001', 1, '12345678', '10', 1),
(11, '210001', 1, '12345678', '100', 1),
(12, '210001', 2, '12345678', '10', 1),
(13, '210001', 2, '12345678', '100', 1),
(14, '210001', 1, '12345678', '120', 1),
(15, '210001', 1, '71003801', '100', 1),
(16, '210002', 2, '71003801', '80', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` char(18) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan_pegawai` varchar(100) NOT NULL,
  `motto` varchar(250) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `jabatan_pegawai`, `motto`) VALUES
('325001', 'test pegawai', 'bendahara', 'hiduplah sesuai dengan hatimu'),
('325004', 'AHMAD FAHMI, S.Pd', 'KEPALA SEKOLAH', 'Never Surender'),
('325002', 'Khaeruddin, S.Pd.I', 'Bendahara', 'Kehidupan adalah sementara'),
('325003', 'Muhammad Afifuddin', 'Operator Madrasah', 'Never Giveup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `no_invoice` varchar(50) NOT NULL,
  `nis` varchar(18) NOT NULL,
  `nama_bendahara` varchar(50) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` varchar(50) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  PRIMARY KEY (`no_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_invoice`, `nis`, `nama_bendahara`, `id_periode`, `nama_bulan`, `tanggal_pembayaran`, `jumlah_pembayaran`, `status_pembayaran`) VALUES
('INV202101', '210001', 'APIP', 1, 'Januari', '2014-08-21', '400000', 'Lunas'),
('INV202102', '210001', 'APIP', 1, 'Februari', '2014-08-21', '400000', 'Lunas'),
('INV202103', '210001', 'APIP', 1, 'Maret', '2014-08-21', '400000', 'Lunas'),
('INV202104', '210001', 'APIP', 1, 'April', '2014-08-21', '400000', 'Lunas'),
('INV202105', '210001', 'test', 1, 'Januari', '2004-12-21', '400000', 'Lunas'),
('INV202201', '210001', 'khaeruddin', 2, 'Desember', '2022-03-23', '23000', 'Lunas'),
('INV202216', '210001', 'khaeruddin', 1, 'Januari', '2016-03-22', '20000', 'Lunas'),
('INV202217', '210001', 'khaeruddin', 1, 'Januari', '2023-03-22', '20000', 'Lunas'),
('INV202218', '210001', 'khaeruddin', 1, 'April', '0000-00-00', '20000', 'Lunas'),
('INV202219', '210001', 'khaeruddin', 1, 'September', '2022-03-23', '20000', 'Lunas'),
('INV202220', '210001', 'khaeruddin', 2, 'Januari', '2022-03-23', '23000', 'Lunas'),
('INV202221', '210001', 'khaeruddin', 3, 'Januari', '2022-03-23', '25000', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL,
  `biaya` varchar(20) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `tahun_ajaran`, `biaya`) VALUES
(1, '2019/2020', '20000'),
(2, '2020/2021', '23000'),
(3, '2021/2022', '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(20) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `motto` varchar(100) NOT NULL,
  `motivasi` varchar(500) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `id_periode`, `name`, `email`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_hp`, `motto`, `motivasi`, `id_kelas`) VALUES
('210001', 2, 'Naufal Suhail', 'naufalsuhail@gmail.com', 'Pomad, negeri sejuta umat', 'Laki-Laki', 'BOGOR', '1998-01-14', 'Islam', '08131000082', 'Skidipapap Uyeeee', '', 2),
('210002', 1, 'MUHAMMAD AFIFUDDIN', 'muhamadafifuddin1@gmail.com', 'cimanggu', 'Laki-Laki', 'BOGOR', '1997-11-20', 'Islam', '087654231234', 'hidupKU', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `no_induk` varchar(18) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`no_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no_induk`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
('210001', '$2y$10$PqrqUSkzAhfi.v9stHhwt.q7/w9moB4nnNOGy9xwh7tDYKDS5nEPm', 'test1.png', 13, 1, '2021-12-04'),
('210002', '$2y$10$SPdwEbYkKmzWZddD3/zbTOcxP57LS4Dz.iFg2erv5lJZMSxLK69a2', 'default.jpg', 13, 1, '0000-00-00'),
('325002', '$2y$10$PqrqUSkzAhfi.v9stHhwt.q7/w9moB4nnNOGy9xwh7tDYKDS5nEPm', 'default', 12, 1, '2021-12-21'),
('325003', '$2y$10$SPdwEbYkKmzWZddD3/zbTOcxP57LS4Dz.iFg2erv5lJZMSxLK69a2', 'default.jpg', 12, 1, '2022-01-13'),
('325004', '$2y$10$PqrqUSkzAhfi.v9stHhwt.q7/w9moB4nnNOGy9xwh7tDYKDS5nEPm', 'default', 1, 1, '2021-12-12'),
('71003801', '$2y$10$9FdPF.AlLq.Rd4APMZ3rgOlzMCZaMPhjAUZ3Lf0goypl9supM/nRW', 'default.jpg', 11, 1, '0000-00-00'),
('71003802', '$2y$10$OzlV35CifbaWTAtERpHR0OT7pHT1syl03P9nxaCmYUa1M8jScufH.', 'default.jpg', 11, 1, '0000-00-00'),
('71003803', '$2y$10$53nxm52qrZtoCdZ224Kd0uoI.GnoKaQHHszDtVtIJRXSToenNtfCO', 'default.jpg', 11, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(51, 1, 2),
(57, 1, 15),
(58, 1, 14),
(59, 13, 14),
(61, 13, 2),
(66, 11, 17),
(67, 1, 17),
(69, 11, 2),
(70, 11, 18),
(71, 1, 3),
(72, 1, 4),
(73, 1, 19),
(74, 1, 20),
(75, 1, 5),
(76, 1, 7),
(77, 13, 6),
(78, 11, 4),
(79, 12, 2),
(80, 12, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Data'),
(4, 'Penilaian'),
(5, 'Pembayaran'),
(6, 'History'),
(7, 'Menu'),
(21, 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'suadmin'),
(11, 'guru'),
(12, 'tatausaha'),
(13, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 7, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 7, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(22, 3, 'Siswa', 'data', 'fas fa-database', 1),
(24, 3, 'Guru', 'data/guru', 'fas fa-user', 1),
(25, 4, 'Penilaian Siswa', 'penilaian', 'fas fa-user-friends', 1),
(27, 5, 'Pembayaran Siswa', 'pembayaran', 'fas fa-dollar-sign', 1),
(28, 6, 'Transaksi Pembayaran', 'history', 'fas fa-search-dollar', 1),
(29, 6, 'Nilai', 'history/nilai', 'fas fa-list-ol', 1),
(30, 3, 'Periode', 'data/periode', '	fas fa-database', 1),
(31, 3, 'Pegawai', 'data/pegawai', 'fas fa-user-friends', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
