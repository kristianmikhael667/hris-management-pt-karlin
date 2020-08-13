-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2020 pada 09.47
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
-- Struktur dari tabel `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_karyawan` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_karyawan`, `tanggal_masuk`, `jam_masuk`, `lokasi`) VALUES
(666, '2020-08-13', '08:58:30', 'DepokWest JavaIndonesia');

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
  `id_karyawan` int(10) NOT NULL,
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `alasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_karyawan` int(10) NOT NULL,
  `nomor_sppd` int(50) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `bln_keberangkatan` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `status` enum('DISETUJUI','MENUNGGU','DITOLAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`id_karyawan`, `nomor_sppd`, `tgl_keberangkatan`, `bln_keberangkatan`, `tujuan`, `alasan`, `status`) VALUES
(666, 1122, '2020-08-14', '2020-08-14', 'Raja Ampat', 'Gak Tau', 'MENUNGGU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jumlah_cuti`
--

CREATE TABLE `tbl_jumlah_cuti` (
  `id_karyawan` int(10) NOT NULL,
  `jumlah_cuti_cuti` int(10) NOT NULL,
  `jumlah_cuti_izin` int(2) NOT NULL,
  `jumlah_cuti_sakit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jumlah_cuti`
--

INSERT INTO `tbl_jumlah_cuti` (`id_karyawan`, `jumlah_cuti_cuti`, `jumlah_cuti_izin`, `jumlah_cuti_sakit`) VALUES
(666, 7, 7, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kode_bagian` int(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('AKTIF','NONE') NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `jenis_kelamin`, `kode_bagian`, `alamat`, `nomor_telepon`, `email`, `tanggal_lahir`, `password`, `status`, `role_id`, `foto`) VALUES
(221, 'admin', 'L', 1, 'Kamboja ', '0898765', 'kristianmikhael@gmail.com', '2020-08-02', '123', 'AKTIF', 2, '7d9f924f58b70ac5361011298751c016.gif'),
(666, 'Mikhael Kristian', 'L', 4, 'Depok ', '089668997397', 'kristianmikhael667@gmail.com', '2020-07-29', '123', 'AKTIF', 3, '9e49eb537ed030d6ef326c219298ad05.png'),
(2020, 'Manajemen', 'L', 64, 'Curug', '0898765', 'magangsemester6@gmail.com', '2020-08-02', '123', 'AKTIF', 1, '');

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

--
-- Dumping data untuk tabel `tbl_kehadiran`
--

INSERT INTO `tbl_kehadiran` (`id_karyawan`, `jumlah_hadir`, `jumlah_cuti`, `jumlah_izin`, `jumlah_sakit`) VALUES
(666, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manage_barang`
--

CREATE TABLE `tbl_manage_barang` (
  `id_purchase_request` int(11) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` longtext NOT NULL,
  `status` enum('DISETUJUI','MENUNGGU','DITOLAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_manage_barang`
--

INSERT INTO `tbl_manage_barang` (`id_purchase_request`, `id_barang`, `nama_barang`, `harga`, `status`) VALUES
(1122, 321, 'Mobil Kijang Inova', '500', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_medical`
--

CREATE TABLE `tbl_medical` (
  `id_karyawan` int(10) NOT NULL,
  `klaim_id` int(10) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_pengajuan` enum('DISETUJUI','MENUNGGU','DITOLAK') NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `jumlah_diajukan` longtext NOT NULL,
  `jumlah_disetujui` longtext NOT NULL,
  `struck` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_medical`
--

INSERT INTO `tbl_medical` (`id_karyawan`, `klaim_id`, `tanggal_pengajuan`, `status_pengajuan`, `tanggal_disetujui`, `jumlah_diajukan`, `jumlah_disetujui`, `struck`, `ket`) VALUES
(666, 222, '2020-08-13', 'DISETUJUI', '2020-08-13', '1234', '23', '23bc14524859e6105dcf7ff9615b6766.png', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan_biaya`
--

CREATE TABLE `tbl_pengajuan_biaya` (
  `id_karyawan` int(10) NOT NULL,
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
  `nomor_sppd` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya_transportasi` longtext NOT NULL,
  `ket` varchar(200) NOT NULL,
  `uang_makan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perjalanan_dinas`
--

INSERT INTO `tbl_perjalanan_dinas` (`nomor_sppd`, `tanggal`, `biaya_transportasi`, `ket`, `uang_makan`) VALUES
(1122, '2020-08-14', '50000000', 'lolos', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purcase_request`
--

CREATE TABLE `tbl_purcase_request` (
  `id_karyawan` int(10) NOT NULL,
  `id_purchase_request` int(20) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_purcase_request`
--

INSERT INTO `tbl_purcase_request` (`id_karyawan`, `id_purchase_request`, `tgl_permintaan`, `keterangan`) VALUES
(666, 1122, '2020-08-12', 'tolol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transportasi`
--

CREATE TABLE `tbl_transportasi` (
  `id_karyawan` int(10) NOT NULL,
  `uang_bensin` longtext NOT NULL,
  `uang_parkir` longtext NOT NULL,
  `status` enum('DISETUJUI','MENUNGGU','DITOLAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transportasi`
--

INSERT INTO `tbl_transportasi` (`id_karyawan`, `uang_bensin`, `uang_parkir`, `status`) VALUES
(666, '70000', '90000', 'DISETUJUI');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`kode_bagian`);

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`nomor_sppd`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_jumlah_cuti`
--
ALTER TABLE `tbl_jumlah_cuti`
  ADD KEY `id_karyawan` (`id_karyawan`);

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
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_purchase_request` (`id_purchase_request`);

--
-- Indeks untuk tabel `tbl_medical`
--
ALTER TABLE `tbl_medical`
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `klaim_id` (`klaim_id`);

--
-- Indeks untuk tabel `tbl_pengajuan_biaya`
--
ALTER TABLE `tbl_pengajuan_biaya`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_perjalanan_dinas`
--
ALTER TABLE `tbl_perjalanan_dinas`
  ADD KEY `nomor_sppd` (`nomor_sppd`);

--
-- Indeks untuk tabel `tbl_purcase_request`
--
ALTER TABLE `tbl_purcase_request`
  ADD PRIMARY KEY (`id_purchase_request`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_transportasi`
--
ALTER TABLE `tbl_transportasi`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `kode_bagian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT untuk tabel `tbl_jumlah_cuti`
--
ALTER TABLE `tbl_jumlah_cuti`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021;

--
-- AUTO_INCREMENT untuk tabel `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT untuk tabel `tbl_manage_barang`
--
ALTER TABLE `tbl_manage_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT untuk tabel `tbl_medical`
--
ALTER TABLE `tbl_medical`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_biaya`
--
ALTER TABLE `tbl_pengajuan_biaya`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_purcase_request`
--
ALTER TABLE `tbl_purcase_request`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT untuk tabel `tbl_transportasi`
--
ALTER TABLE `tbl_transportasi`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `tbl_absen_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_kehadiran` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD CONSTRAINT `tbl_bagian_ibfk_1` FOREIGN KEY (`kode_bagian`) REFERENCES `tbl_karyawan` (`kode_bagian`);

--
-- Ketidakleluasaan untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD CONSTRAINT `tbl_cuti_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD CONSTRAINT `tbl_dinas_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`);

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
  ADD CONSTRAINT `tbl_perjalanan_dinas_ibfk_1` FOREIGN KEY (`nomor_sppd`) REFERENCES `tbl_dinas` (`nomor_sppd`);

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
