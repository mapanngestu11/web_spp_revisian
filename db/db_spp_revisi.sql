-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2023 pada 18.07
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp_revisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `mapel`, `no_hp`, `email`, `foto`) VALUES
(1, 'Ustadz Abdurrahman', 'laki-laki', 'KBM Harian', '', '', '0048e6107d38292986e84db751004bba.jpg'),
(2, 'Ustadz Aldi', 'laki-laki', 'KBM Harian', '', '', '2834c84a9d78d05f94db04a0333e5037.jpg'),
(3, 'Ustadz Jamal', 'laki-laki', 'KBM Harian', '', '', 'acec582aae840c69e63caad61fd72b35.jpg'),
(4, 'Ustadz Kayyis', 'laki-laki', 'KBM Harian', '', '', 'e6c33df99274ac83f2dd8bd553535998.jpg'),
(5, 'Ustadz Reva', 'laki-laki', 'KBM Harian', '', '', 'ad72d7e88b353d52c27c6c090f1e2d85.jpg'),
(6, 'Ustadz Soleh', 'laki-laki', 'KBM Harian', '', '', '28228f79fd4329db6c535b0a66cc9476.jpg'),
(7, 'Ustadz Umar', 'laki-laki', 'KBM Harian', '', '', '59f09a8893e6535a8e0135f537c1ce87.jpg'),
(8, 'Ustadz Wahid', 'laki-laki', 'KBM Harian', '', '', '9d9c90f8b80ec9d5a677194fe5c1fa3f.jpg'),
(9, 'Ustadzah Ade', 'perempuan', 'KBM Harian', '', '', '38415fdd6427197159552b553fcaa988.png'),
(10, 'Ustadzah Aisyah', 'perempuan', 'KBM Harian', '', '', '389dce42894e5bb519540f7c95af032a.png'),
(11, 'Ustadzah Bayinah', 'perempuan', 'KBM Harian', '', '', '807584b9a2f9e00fd1bc0969cffe1e73.png'),
(12, 'Ustadzah Desi', 'perempuan', 'KBM Harian', '', '', '3248652187e4e37251fec46e20606575.png'),
(13, 'Ustadzah Eka', 'perempuan', 'KBM Harian', '', '', 'efe6bec4b32cae419975d487c543cd26.png'),
(14, 'Ustadzah Elin', 'perempuan', 'KBM Harian', '', '', '5aa82a6f308ac4b833c15179ab800237.png'),
(15, 'Ustadzah Evi', 'perempuan', 'KBM Harian', '', '', 'e5caed010a7c3354522e72c5402cb665.png'),
(16, 'Ustadzah Fatimah', 'perempuan', 'KBM Harian', '', '', '0d2c78ea119dc2cc39c01174d1a75318.png'),
(17, 'Ustadzah Ummu Faiqo', 'perempuan', 'KBM Harian', '', '', '3afe27ed489e0d0124794860996ae36f.png'),
(18, 'Ustadzah Hani', 'perempuan', 'KBM Harian', '', '', '7bc317dc20635468d42891e09f058ef8.png'),
(19, 'Ustadzah Hikmah', 'perempuan', 'KBM Harian', '', '', '8d68dc8453c2f748336938db78925b32.png'),
(20, 'Ustadzah Ida Kamidah', 'perempuan', 'KBM Harian', '', '', '9615703250040fc1bd20a907949d4fe3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info_bayar`
--

CREATE TABLE `tbl_info_bayar` (
  `id_info_bayar` int(11) NOT NULL,
  `jumlah_bayar` varchar(50) NOT NULL,
  `tahun_angkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_info_bayar`
--

INSERT INTO `tbl_info_bayar` (`id_info_bayar`, `jumlah_bayar`, `tahun_angkatan`) VALUES
(1, '100000', '2020'),
(2, '100000', '2021'),
(3, '100000', '2022'),
(4, '100000', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `foto` text NOT NULL,
  `waktu` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `foto`, `waktu`, `id_user`) VALUES
(6, 'Parade Tasmi 3', 'Acara kenaikan kelas santri dengan menampilkan karya dan bakat santri', 'b751dad2660ecfd2ad625dcae8c4be97.jpeg', '2023-09-20', 1),
(7, 'Pembagian Raport Santri', 'Pembagian raport dihadiri oleh orang tua/ wali santri ', 'f345eaa66fbbc74f3925dc390036f40a.jpeg', '2023-09-20', 1),
(8, 'Ikrar Santri', 'Ikrar santri yang diucapkan oleh seluruh santri sebelum melakukan kegiatan belajar-mengajar', 'ac3039fbd3f239610ab25d76da912570.jpeg', '2023-09-20', 1),
(9, 'Cerita Kisah Nabi dan Rasul', 'Menceritakan kisah nabi dan rasul dan hikmah yang bisa diambil', 'd4512aa9fa3f5e58c89360aa82d8ef1c.jpeg', '2023-09-20', 1),
(10, 'Pidato Santri', 'Santri melakukan belajar pidato di depan teman-teman santri lainnya', '0daeaef9018a43c31875a3ffc66eb793.jpeg', '2023-09-20', 1),
(11, 'Pengenalan Santri Baru', 'Sambutan kepala rumah qur\'an sekaligus pengenalan santri baru', '36f860de04fad8fa33d1cf9eb0e4f26a.png', '2023-09-20', 1),
(12, 'Belajar Baca Al-Qur\'an', 'Kegiatan belajar mengajar baca al-qur\'an', 'eb82d5b5775166c8689217228252103f.png', '2023-09-20', 1),
(13, 'Rapat Orang tua/Wali Santri', 'Rapat orang tua/wali santri bersama kepala rumah qur\'an', '9467bec5adcd91bb9fbb12d8e19ff9c5.png', '2023-09-20', 1),
(14, 'Muroja\'ah', 'Kegiatan Muroja\'ah bersama, sebelum masuk kelas', '0c35a30858e87567c41c454c24cd963c.jpeg', '2023-09-20', 9),
(15, 'Ikrar Santri', 'Ikrar santri bersama-sama', '4eb2ace82413169e567e65666618172a.jpeg', '2023-09-20', 9),
(16, 'KBM Harian', 'Kegiatan KBM Harian di kelas, belajar tahsin, tahfidz dan hadits', '1906fe13a8298f9a53ab7525449bd684.jpeg', '2023-09-20', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `tahun_angkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `tahun_angkatan`) VALUES
(5, 'Ustadzah Ade', '2023'),
(6, 'Ustadz Abdurrahman', '2023'),
(7, 'Ustadz Aldi', '2023'),
(8, 'Ustadz Jamal', '2023'),
(9, 'Ustadz Kayyis', '2023'),
(10, 'Ustadz Reva', '2023'),
(11, 'Ustadz Sholeh', '2023'),
(12, 'Ustadz Umar', '2023'),
(13, 'Ustadz Wahid', '2023'),
(14, 'Ustadzah Aisyah', '2023'),
(15, 'Ustadzah Bayinah', '2023'),
(16, 'Ustadzah Desi', '2023'),
(17, 'Ustadzah Eka', '2023'),
(18, 'Ustadzah Elin', '2023'),
(19, 'Ustadzah Evi', '2023'),
(20, 'Ustadzah Fatimah', '2023'),
(21, 'Ustadzah Fatimah Umm', '2023'),
(22, 'Ustadzah Hani', '2023'),
(23, 'Ustadzah Hikmah', '2023'),
(24, 'Ustadzah Ida Kamidah', '2023'),
(25, 'Ustadzah Wardah', '2023'),
(26, 'Ustadzah Wardah', '2023'),
(27, 'Ustadzah Lia', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id_kontak` int(11) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(2) NOT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id_kontak`, `nis`, `nama_santri`, `no_hp`, `pesan`, `status`, `waktu`) VALUES
(1, 0, 'Dewanta Prasetya', '089574975848', 'lupa password', '', '2023-09-22 01:13:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `no_hp_ortu` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `jumlah_bayar` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `order_id`, `nis`, `nama_santri`, `nama_kelas`, `no_hp_ortu`, `pesan`, `jumlah_bayar`, `email`, `alamat`, `bulan`, `tanggal_upload`) VALUES
(3, '', 2147483647, 'Fhadlahtul Kamilah', 'Ustadzah Eka', '089114255332', 'bayar', '100000', 'fhadlahtul23@gmail.com', 'Tangerang', 'September', '2023-09-19'),
(4, '22983', 2147483622, 'Dewanta Prasetya', 'Ustadz Kayyis', '087617253927', 'Bayar SPP bulan september', '100000', 'hafprasetya12@gmail.com', 'Tangerang', 'September', '2023-09-23'),
(5, '3060', 2147483622, 'Dewanta Prasetya', 'Ustadz Kayyis', '087617253927', '', '100000', 'hafprasetya12@gmail.com', 'Tangerang', 'October', '2023-09-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan_wa`
--

CREATE TABLE `tbl_pesan_wa` (
  `id_pesan` int(11) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `no_hp_ortu` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_santri`
--

CREATE TABLE `tbl_santri` (
  `id_santri` int(11) NOT NULL,
  `nis` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `tahun_angkatan` varchar(5) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `no_hp_ortu` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_santri`
--

INSERT INTO `tbl_santri` (`id_santri`, `nis`, `password`, `nama_santri`, `nama_kelas`, `tahun_angkatan`, `jenis_kelamin`, `no_hp`, `email`, `alamat`, `nama_ayah`, `nama_ibu`, `no_hp_ortu`, `foto`, `tanggal`, `hak_akses`) VALUES
(10, 2147483647, 'e10adc3949ba59abbe56e057f20f883e', 'Fhadlahtul Kamilah', 'Ustadzah Eka', '2023', 'P', '089574975848', 'fhadlahtul23@gmail.com', 'Tangerang', 'Anwar', 'Sri', '089114255332', '1e29076d0c0805d7c9c1f7a629768c09.jpeg', '2023-07-11 19:35:58', 'santri'),
(390, 2147483622, '25d55ad283aa400af464c76d713c07ad', 'Dewanta Prasetya', 'Ustadz Kayyis', '2023', 'L', '087724601281', 'hafprasetya12@gmail.com', 'Tangerang', 'budi', 'nani', '087617253927', '54452c3db0c4c382b43c76ff38db05b7.jpeg', '2023-08-06 14:54:30', 'santri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status_pembayaran`
--

CREATE TABLE `tbl_status_pembayaran` (
  `id_status_pembayaran` int(10) NOT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `nis` int(10) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `tahun_angkatan` varchar(5) DEFAULT NULL,
  `gross_amount` varchar(100) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `bank` varchar(10) DEFAULT NULL,
  `va_number` varchar(30) DEFAULT NULL,
  `pdf_url` text,
  `status_code` varchar(3) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `foto` text,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status_pembayaran`
--

INSERT INTO `tbl_status_pembayaran` (`id_status_pembayaran`, `order_id`, `nis`, `nama_santri`, `nama_kelas`, `tahun_angkatan`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `bulan`, `tahun`, `foto`, `tanggal_upload`) VALUES
(1, '19222', 2147483647, 'Fhadlahtul Kamilah', 'Ustadzah Eka', '2023', '100000.00', 'bank_transfer', '2023-09-19 03:30:40', 'bca', '57287557990', 'https://app.sandbox.midtrans.com/snap/v1/transactions/37fb4d7b-5143-483f-8166-f74bd93ae3be/pdf', '200', 'September', '2023', NULL, '2023-09-19'),
(2, '22983', 2147483622, 'Dewanta Prasetya', 'Ustadz Kayyis', '2023', '100000.00', 'bank_transfer', '2023-09-23 03:37:36', 'bca', '57287442849', 'https://app.sandbox.midtrans.com/snap/v1/transactions/564558d6-2205-4126-9f76-b4c386182764/pdf', '200', 'September', '2023', NULL, '2023-09-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `hak_akses`, `waktu`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-04-10 07:09:00'),
(9, 'tanti', 'tanti', '25d55ad283aa400af464c76d713c07ad', 'admin', '2023-09-20 02:29:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_info_bayar`
--
ALTER TABLE `tbl_info_bayar`
  ADD PRIMARY KEY (`id_info_bayar`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_pesan_wa`
--
ALTER TABLE `tbl_pesan_wa`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tbl_santri`
--
ALTER TABLE `tbl_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `tbl_status_pembayaran`
--
ALTER TABLE `tbl_status_pembayaran`
  ADD PRIMARY KEY (`id_status_pembayaran`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_info_bayar`
--
ALTER TABLE `tbl_info_bayar`
  MODIFY `id_info_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan_wa`
--
ALTER TABLE `tbl_pesan_wa`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_santri`
--
ALTER TABLE `tbl_santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT untuk tabel `tbl_status_pembayaran`
--
ALTER TABLE `tbl_status_pembayaran`
  MODIFY `id_status_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
