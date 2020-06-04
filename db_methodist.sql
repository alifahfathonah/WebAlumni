-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Feb 2019 pada 10.54
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_methodist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `no_alumni` varchar(5) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama_alumni` varchar(50) NOT NULL,
  `judul_skripsi` longtext,
  `ipk` float DEFAULT NULL,
  `tanggal_lulus` varchar(50) DEFAULT NULL,
  `tanggal_widsuda` varchar(50) DEFAULT NULL,
  `prodi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`no_alumni`, `nim`, `nama_alumni`, `judul_skripsi`, `ipk`, `tanggal_lulus`, `tanggal_widsuda`, `prodi`) VALUES
('001', '205520001', 'Ronal Simon Sinaga', 'Sistem Informasi Mahasiswa Dan Alumni Fikom UMI Berbasis Web', 3.18, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('002', '205520003', 'Benni Sinaga', 'Perancangan Sistem Informasi perpustakaan Univ Methodist Indonesia Berbasis Web', 3.13, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('003', '205520005', 'Manmit kaur', 'Perancangan Sistem informasi Pemasaran Peralatan Golf Pada PT Mitra Adi Perkasa Berbasis Web', 3.2, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('004', '205520008', 'Johannes Manalu', 'Perancangan Sistem Informasi Kependudukan Kabupaten dairi Berbasis Web', 3.1, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('005', '205520015', 'Beni Sukmaria.G', 'Sistem LTST Linux Dengan Client Windows Tanpa Hardisk ', 3.45, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('006', '205520020', 'Edy Kurniawan S', 'Perancangan Website Pariwisata Pada Kabupaten Langkat ', 2.9, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('007', '205520022', 'Timotius Sinarta K', 'Perancangan Sistem Control billing Pada Rental Plastation', 3.04, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('008', '205520030', 'Andi Boi Sirait', 'Sistem Informasi Akademik Fikom Umi Berbasis SMS', 3.44, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('009', '205520011', 'Melwin Rumahorbo', 'Perancangan Perangkat Lunak Sistem Informasi Perhotelan Di Parapat Berbasis Web', 3.01, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('011', '205520025', 'Rina Wati Pasaribu', 'Sistem Informasi Penjualan Obat pada Apotek Damai Berbasis Web', 3.13, '26 November 2009', '08 Desember 2009', 'Sistem Informasi'),
('035', '205520024', 'Hartono', ' Perancangan Sistem Informasi Perekrutan dan Seleksi Calon Karyawan Berbasis Jaringan Pada PT.Indotera Sumatra', 3.46, '26 November 2009', '08 Desember 2009', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext,
  `tanggal` datetime DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `isi`, `tanggal`, `images`, `id_user`) VALUES
(20, 1, 'Computing', 'Computer adalah alat yang keren banget !!', '2019-02-22 16:14:29', '5c6fbd7561c48.png', 1),
(21, 1, 'The Smart Indonesia', ' Indonesia Jaya !!!', '2019-02-22 16:08:13', '5c6fbbfd6a12f.png', 1),
(22, 1, 'dbbs', ' indonesia yee', '2019-02-22 16:08:23', '5c6fbc07c1680.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sciens'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_lengkap`, `email`, `isi`) VALUES
(2, 'Gorbyno', 'bynogan@gmail.com', 'Website Nya Keren !'),
(3, 'widya', 'widya@gmail.com', 'Support penuh Methodist !');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_post` datetime DEFAULT NULL,
  `tgl_close` date DEFAULT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `perusahaan`, `lokasi`, `deskripsi`, `tgl_post`, `tgl_close`, `images`) VALUES
(11, 'Sinarmas', 'Pekanbaru', 'afjdfsfahjfa\r\nasdbkfvakhsdf\r\nsadbjhfas\r\nashjdfhjvashjf\r\njksdbdjafbfjkhasbf\r\nksdabhjfbhjasd\r\n ', '2019-02-22 12:39:55', '2019-02-23', '5c6d5d92750f1.png'),
(12, 'Djaroum', 'Pekanbaru', 'iuwgeuifguaiw\r\nguafaksdf\r\nshadukfkuasf\r\n\r\ndfkgaskfkasdfk\r\n\r\nsdgajfgaskf ', '2019-02-22 12:42:22', '2019-02-28', '5c6d5e598dc1c.png'),
(13, 'PT. Ikea', 'Pekanbaru', ' Dibutuhkan Segera ! ', '2019-02-22 16:08:46', '2019-02-15', '5c6fbc1e66e90.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `akses`) VALUES
(1, 'gorbyno', 'bynogan@gmail.com', '$2y$10$Ql/RyJKKBZZLrvlfx2jRdOn//ZjPcdXE51oDU6.AVCR3J9yQzx3pm', 'ADMIN'),
(3, 'deni', 'admin@gmail.com', '$2y$10$CPEcCwq1KxitG7YubXQl8u2ko08N5OmyBVEw2jofTDjFYE5NpGfwS', 'OPERATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`no_alumni`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
