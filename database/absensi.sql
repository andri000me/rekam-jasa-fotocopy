-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Jan 2021 pada 02.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `idabsen` int(11) NOT NULL,
  `tahun_pelajaran_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `hadir` tinyint(1) DEFAULT NULL,
  `sakit` tinyint(1) DEFAULT NULL,
  `ijin` tinyint(1) DEFAULT NULL,
  `alpa` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`idabsen`, `tahun_pelajaran_id`, `mata_pelajaran_id`, `siswa_id`, `tanggal`, `hadir`, `sakit`, `ijin`, `alpa`, `keterangan`, `pengguna_id`) VALUES
(1, 1, 1, 4, '2021-01-22', 1, 0, 0, 0, '', 3),
(2, 1, 1, 5, '2021-01-22', 0, 1, 0, 0, '', 3),
(3, 1, 1, 6, '2021-01-22', 0, 0, 1, 0, '', 3),
(4, 1, 1, 1, '2021-01-22', 0, 0, 0, 1, '', 3),
(9, 1, 2, 7, '2021-01-22', 1, 0, 0, 0, '', 3),
(14, 1, 4, 4, '2021-01-22', 1, 0, 0, 0, '', 4),
(15, 1, 4, 5, '2021-01-22', 1, 0, 0, 0, '', 4),
(16, 1, 4, 6, '2021-01-22', 0, 1, 0, 0, '', 4),
(17, 1, 4, 1, '2021-01-22', 0, 0, 0, 1, '', 4),
(18, 1, 3, 3, '2021-01-22', 0, 0, 1, 0, '', 4),
(19, 1, 1, 4, '2021-01-01', 1, 0, 0, 0, '', 3),
(20, 1, 1, 5, '2021-01-01', 1, 0, 0, 0, '', 3),
(21, 1, 1, 6, '2021-01-01', 1, 0, 0, 0, '', 3),
(22, 1, 1, 1, '2021-01-01', 1, 0, 0, 0, '', 3),
(23, 1, 1, 4, '2021-01-02', 1, 0, 0, 0, '', 3),
(24, 1, 1, 5, '2021-01-02', 1, 0, 0, 0, '', 3),
(25, 1, 1, 6, '2021-01-02', 1, 0, 0, 0, '', 3),
(26, 1, 1, 1, '2021-01-02', 1, 0, 0, 0, '', 3),
(27, 1, 1, 4, '2021-01-03', 0, 1, 0, 0, '', 3),
(28, 1, 1, 5, '2021-01-03', 0, 1, 0, 0, '', 3),
(29, 1, 1, 6, '2021-01-03', 0, 1, 0, 0, '', 3),
(30, 1, 1, 1, '2021-01-03', 0, 1, 0, 0, '', 3),
(31, 1, 1, 4, '2021-01-04', 0, 0, 1, 0, '', 3),
(32, 1, 1, 5, '2021-01-04', 0, 0, 1, 0, '', 3),
(33, 1, 1, 6, '2021-01-04', 0, 0, 1, 0, '', 3),
(34, 1, 1, 1, '2021-01-04', 0, 0, 1, 0, '', 3),
(35, 1, 1, 4, '2021-01-05', 0, 0, 0, 1, '', 3),
(36, 1, 1, 5, '2021-01-05', 0, 0, 0, 1, '', 3),
(37, 1, 1, 6, '2021-01-05', 0, 0, 0, 1, '', 3),
(38, 1, 1, 1, '2021-01-05', 0, 0, 0, 1, '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `idguru` int(11) NOT NULL,
  `guru_nip` varchar(45) DEFAULT NULL,
  `guru_nama` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`idguru`, `guru_nip`, `guru_nama`) VALUES
(1, '123456789', 'Eka Saputra, A.Md'),
(3, '987654321', 'Nama Lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `kelas_kode` varchar(5) DEFAULT NULL,
  `kelas_nama` varchar(45) DEFAULT NULL,
  `wali_kelas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas_kode`, `kelas_nama`, `wali_kelas`) VALUES
(2, '1A', 'Kelas 1 A', NULL),
(3, '1B', 'Kelas 1 B', NULL),
(4, '2A', 'Kelas 2 A', NULL),
(5, '2B', 'Kelas 2 B', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `idmata_pelajaran` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_kode` varchar(5) DEFAULT NULL,
  `mapel_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`idmata_pelajaran`, `kelas_id`, `guru_id`, `mapel_kode`, `mapel_nama`) VALUES
(1, 2, 1, 'MTK', 'Matematika'),
(2, 4, 1, 'IPA', 'Ilmu Pengetahuan Alam'),
(3, 3, 3, 'MTK', 'Matematika'),
(4, 2, 3, 'IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(128) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `level` enum('guru','wali_kelas','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Operator Sekolah', 'admin', '$2y$10$E33mbIeZc665JZiGOIwCMunuLcI.YnlIzMvGoqgPWflEykvFGFTAK', 'admin'),
(3, 'Eka Saputra, A.Md', '123456789', '$2y$10$/KYbEqEY3IX77sFZhZc0tuHPz2AjpivZZwFTu4GKNCrDjSfBaOOkO', 'guru'),
(4, 'Nama Lengkap', '987654321', '$2y$10$UXqZERDotfWHhbdmzkjbCuWk68c0p1B8HB0BH6g1xIpI.2vDLgbt2', 'guru'),
(5, 'Wali Kelas', 'wali', '$2y$10$.6/fOteCKF/nBn1apdx..ek6BtMTfzqipkKpp0LHeAeSkQCOWuN5.', 'wali_kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `siswa_nisn` varchar(10) DEFAULT NULL,
  `siswa_nis` varchar(45) DEFAULT NULL,
  `siswa_nama` varchar(128) DEFAULT NULL,
  `siswa_jk` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `kelas_id`, `siswa_nisn`, `siswa_nis`, `siswa_nama`, `siswa_jk`) VALUES
(1, 2, '12345', '12345', 'Eka Saputra', 'L'),
(3, 3, '54321', '54321', 'Eka Saputra', 'P'),
(4, 2, '12', '12', '12', 'L'),
(5, 2, '23', '23', '23', 'L'),
(6, 2, '34', '34', '34', 'P'),
(7, 4, '45', '45', '45', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `idtahun_pelajaran` int(11) NOT NULL,
  `nama_tapel` varchar(10) DEFAULT NULL,
  `semester_tapel` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`idtahun_pelajaran`, `nama_tapel`, `semester_tapel`) VALUES
(1, '2020-2021', 'Ganjil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`idabsen`),
  ADD KEY `fk_absen_siswa1_idx` (`siswa_id`),
  ADD KEY `fk_absen_mata_pelajaran1_idx` (`mata_pelajaran_id`),
  ADD KEY `fk_absen_pengguna1_idx` (`pengguna_id`),
  ADD KEY `fk_absen_tahun_pelajaran1_idx` (`tahun_pelajaran_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`idmata_pelajaran`),
  ADD KEY `fk_mata_pelajaran_guru1_idx` (`guru_id`),
  ADD KEY `fk_mata_pelajaran_kelas1_idx` (`kelas_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_siswa_kelas1_idx` (`kelas_id`);

--
-- Indeks untuk tabel `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`idtahun_pelajaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `idabsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `idmata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `idtahun_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_absen_mata_pelajaran1` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`idmata_pelajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_absen_pengguna1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`idpengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_absen_siswa1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`idsiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_absen_tahun_pelajaran1` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`idtahun_pelajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `fk_mata_pelajaran_guru1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`idguru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mata_pelajaran_kelas1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`idkelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`idkelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
