-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2020 pada 17.19
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `kode_bagian` int(10) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `alasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`mulai_cuti`, `akhir_cuti`, `jenis_cuti`, `alasan`) VALUES
('2020-07-14', '2020-07-24', '03', 'hati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `nomor_sppd` int(50) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `bln_keberangkatan` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `alasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`nomor_sppd`, `tgl_keberangkatan`, `bln_keberangkatan`, `tujuan`, `alasan`) VALUES
(2147483647, '2020-07-10', '2020-08-01', 'Raja Ampat', 'Mau refresing capek ngoding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jumlah_cuti`
--

CREATE TABLE `tbl_jumlah_cuti` (
  `id_karyawan` int(3) NOT NULL,
  `jumlah_cuti_izin` int(2) NOT NULL,
  `jumlah_cuti_sakit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kode_bagian` int(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `jenis_kelamin`, `kode_bagian`, `alamat`, `nomor_telepon`, `email`, `tanggal_lahir`, `password`, `role_id`, `foto`) VALUES
(111, 'DANANG AJI MUSTOF', 'L', 3, 'dere', '089668997397', 'haekal@gmail.com', '2020-07-31', '111', 3, 'e8a0e903b92951f4f463ff2bef9615a0.png'),
(221, 'admin', 'L', 1, 'Ciseeng ', '0898765', 'kristianmikhael@gmail.com', '2020-07-26', '9c1c01dc3ac1445a500251fc34a15d3e75a849df', 2, '472cbcc880a565b3464070077e66875c.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kehadiran`
--

CREATE TABLE `tbl_kehadiran` (
  `id_karyawan` int(10) NOT NULL,
  `jumlah_hadir` int(11) NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `jumlah_izin` int(11) NOT NULL,
  `jumlah_sakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manage_barang`
--

CREATE TABLE `tbl_manage_barang` (
  `id_purchase_request` int(10) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_medical`
--

CREATE TABLE `tbl_medical` (
  `id_karyawan` int(3) NOT NULL,
  `klaim_id` int(10) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_pengajuan` varchar(20) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `jumlah_diajukan` longtext NOT NULL,
  `jumlah_disetujui` longtext NOT NULL,
  `struck` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan_biaya`
--

CREATE TABLE `tbl_pengajuan_biaya` (
  `id_karyawan` int(3) NOT NULL,
  `kode_bagian` int(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `jumlah_barang` longtext NOT NULL,
  `harga_barang` longtext NOT NULL,
  `total_barang` longtext NOT NULL,
  `atribut_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perjalanan_dinas`
--

CREATE TABLE `tbl_perjalanan_dinas` (
  `id_karyawan` int(3) NOT NULL,
  `lampiran` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya_transportasi` longtext NOT NULL,
  `ket` varchar(200) NOT NULL,
  `uang_makan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purcase_request`
--

CREATE TABLE `tbl_purcase_request` (
  `id_karyawan` int(3) NOT NULL,
  `id_purchase_request` int(10) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transportasi`
--

CREATE TABLE `tbl_transportasi` (
  `id_karyawan` int(10) NOT NULL,
  `uang_bensin` longtext NOT NULL,
  `uang_parkir` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`kode_bagian`);

--
-- Indeks untuk tabel `tbl_jumlah_cuti`
--
ALTER TABLE `tbl_jumlah_cuti`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `kode_bagian` (`kode_bagian`) USING BTREE;

--
-- Indeks untuk tabel `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_manage_barang`
--
ALTER TABLE `tbl_manage_barang`
  ADD PRIMARY KEY (`id_purchase_request`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tbl_medical`
--
ALTER TABLE `tbl_medical`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_pengajuan_biaya`
--
ALTER TABLE `tbl_pengajuan_biaya`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_perjalanan_dinas`
--
ALTER TABLE `tbl_perjalanan_dinas`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_purcase_request`
--
ALTER TABLE `tbl_purcase_request`
  ADD PRIMARY KEY (`id_karyawan`,`id_purchase_request`),
  ADD UNIQUE KEY `id_purchase_request` (`id_purchase_request`);

--
-- Indeks untuk tabel `tbl_transportasi`
--
ALTER TABLE `tbl_transportasi`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `kode_bagian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_jumlah_cuti`
--
ALTER TABLE `tbl_jumlah_cuti`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT untuk tabel `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT untuk tabel `tbl_manage_barang`
--
ALTER TABLE `tbl_manage_barang`
  MODIFY `id_purchase_request` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_medical`
--
ALTER TABLE `tbl_medical`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_biaya`
--
ALTER TABLE `tbl_pengajuan_biaya`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_perjalanan_dinas`
--
ALTER TABLE `tbl_perjalanan_dinas`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_purcase_request`
--
ALTER TABLE `tbl_purcase_request`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transportasi`
--
ALTER TABLE `tbl_transportasi`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD CONSTRAINT `tbl_bagian_ibfk_1` FOREIGN KEY (`kode_bagian`) REFERENCES `tbl_karyawan` (`kode_bagian`);

--
-- Ketidakleluasaan untuk tabel `tbl_jumlah_cuti`
--
ALTER TABLE `tbl_jumlah_cuti`
  ADD CONSTRAINT `tbl_jumlah_cuti_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_kehadiran` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  ADD CONSTRAINT `tbl_kehadiran_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_manage_barang`
--
ALTER TABLE `tbl_manage_barang`
  ADD CONSTRAINT `tbl_manage_barang_ibfk_1` FOREIGN KEY (`id_purchase_request`) REFERENCES `tbl_purcase_request` (`id_purchase_request`);

--
-- Ketidakleluasaan untuk tabel `tbl_medical`
--
ALTER TABLE `tbl_medical`
  ADD CONSTRAINT `tbl_medical_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengajuan_biaya`
--
ALTER TABLE `tbl_pengajuan_biaya`
  ADD CONSTRAINT `tbl_pengajuan_biaya_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_perjalanan_dinas`
--
ALTER TABLE `tbl_perjalanan_dinas`
  ADD CONSTRAINT `tbl_perjalanan_dinas_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_purcase_request`
--
ALTER TABLE `tbl_purcase_request`
  ADD CONSTRAINT `tbl_purcase_request_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_transportasi`
--
ALTER TABLE `tbl_transportasi`
  ADD CONSTRAINT `tbl_transportasi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
